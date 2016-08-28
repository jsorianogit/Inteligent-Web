<?php session_start();session_register('sOperacion','ssTipo');?>
<html>
<head>
<!-- para el grid -->
<script src="../../../../ActiveWidgets/runtime/lib/aw.js"></script>
<link href="../../../../ActiveWidgets/runtime/styles/xp/aw.css" rel="stylesheet"></link>
<!-- fin grid -->
<style type='text/css'>@import '../../../estilos/estilo1.css';</style>
<script language="javascript" src="../../../estilos/domtableenhance.js"></script>
<link rel="stylesheet" href="../../../estilos/emx_nav_left.css" type="text/css" />
<script language="javascript" src="funciones.js"></script>
<script language="javascript">
function ventanaSecundaria (URL){
   var w = window.open(URL,"ventana1","width=900,height=800,scrollbars=NO");
}
</script> 
	<title>Calagos de Permisos de Seguridad</title>
</head>
<body>
<center>
<table>
<tr>
<td>
<center>
<?php
require ("../../../include/mysql.inc.php");
  if(file_exists("Grafica.png"))
      unlink("Grafica.png");
//Acumulado
$Acumulado=0;
//_Get convenio
$sql="SELECT c.sIdConvenio,c2.dFechaInicio,c2.dFechaFinal,c2.dMontoMN FROM configuracion c INNER JOIN convenios c2 ON (c.sContrato=c2.sContrato AND c.sIdConvenio=c2.sIdConvenio) WHERE c.sContrato='$sContrato'";
$resultado=mysql_query($sql,$link);
if($row=mysql_fetch_array($resultado)){
	$sIdConvenio=$row['sIdConvenio'];
	$dFechaIni=$row['dFechaInicio'];
	$dFechaFin=$row['dFechaFinal'];
	$dMonto=$row['dMontoMN'];
}

$consulta="SELECT dIdFecha,dAvancePonderadoDia,dAvancePonderadoGlobal FROM avancesglobales WHERE 
sContrato='$sContrato' AND sNumeroOrden='' AND sIdConvenio ='$sIdConvenio' ORDER BY dIdFecha";
	$result=mysql_query($consulta,$link);
	?>
<!--		<table class='enhancedtablerowhover'>
	<caption>Avance Progamado/Fisico del Contrato</caption>
		<thead>
		<tr>
			<th scope="col" >Fecha</th>
			<th scope="col" >Av.Pon.del dia</th>
			<th scope="col" >Av. Global</th>
			<th scope="col" >Av.</th>
			<th scope="col" >Ac.</th>
		</tr>
		</thead>
		<tbody>-->
	<?php
/*	echo "<tr>";
	while ($row = mysql_fetch_row($result)) {

		for ($i = 0; $i < mysql_num_fields($result); $i++){
			echo "<td>".$row[$i]."</td>";
	
		}
		 $consulta="SELECT sum(dAvance) as dAvance FROM avancesglobalesxorden WHERE sContrato='$sContrato' AND sNumeroOrden='$sNumeroOrden' AND dIdFecha = '$row[0]' AND sIdConvenio='$sIdConvenio' GROUP BY sNumeroOrden";

		$resultado=mysql_query($consulta,$link);
		if($rowOrden=mysql_fetch_array($resultado))
		{
			echo "<td>".$rowOrden[0]."</td>";
			$Acumulado+=$rowOrden[0];
		}
		else
			echo "<td>0</td>";
		echo "<td>$Acumulado</td>";
		echo "</tr>";
	}
	echo "</tbody><tfoot></tfoot></table>";*/
?>
	<style>
		.aw-grid-control {height: 350; width: 400   ; margin: 0px; border: none; font: menu;}
		.aw-row-selector {text-align: center}
		.aw-column-0 {width:  70px;}
		.aw-column-1 {width: 75px;text-align: right;}
		.aw-column-2 {width: 75px;text-align: right;}
		.aw-column-3 {width: 65px;text-align: right;}
		.aw-column-4 {width: 65px;text-align: right;}
	</style>
	<table>
   <caption>Avance Progamado/Fisico del Contrato</caption>
   </table>
<script>
    var myCells = [
    <?php
    while ($row = mysql_fetch_array($result)){
    	$consulta="SELECT sum(dAvance) as dAvance FROM avancesglobalesxorden WHERE sContrato='$sContrato' AND sNumeroOrden='$sNumeroOrden' AND dIdFecha = '$row[0]' AND sIdConvenio='$sIdConvenio' GROUP BY sNumeroOrden";
		$resultado=mysql_query($consulta,$link);
		if($rowOrden=mysql_fetch_array($resultado))
		{
			$value = $rowOrden[0];
			$Acumulado+=$rowOrden[0];
		}
		else
			$value='0.0000';

    	print ("['".$row[0]."' ,  '".$row[1]."' ,'".$row[2]."' , '$value', '$Acumulado'],");
   }
    ?>
    ];

    var myHeaders = ["Fecha", "Av.Pon.del dia", "Av. Global","Av.","Ac."];

    // create grid object
    var grid = new AW.UI.Grid;
    
    //	enable row selectors
	 grid.setSelectorVisible(true);
    grid.setSelectorText(function(i){return this.getRowPosition(i)+1});
	 //	set headers width/height
	 grid.setSelectorWidth(28);
    grid.setHeaderHeight(20);
    // assign cells and headers text
    grid.setCellText(myCells);
    grid.setHeaderText(myHeaders);
	 // Use setControlLink(url) method.
 	 grid.setControlLink("http://www.google.com");
	 // set number of columns/rows
    grid.setColumnCount(5);
    grid.setRowCount(<?php echo mysql_num_rows($result) ?>);

    // write grid to the page
    
    document.write(grid);

</script>
<?php
//Acumulado
$Acumulado=0;
//_Get convenio
$sql="SELECT c.sIdConvenio,c2.dFechaInicio,c2.dFechaFinal,c2.dMontoMN FROM configuracion c INNER JOIN convenios c2 ON (c.sContrato=c2.sContrato AND c.sIdConvenio=c2.sIdConvenio) WHERE c.sContrato='$sContrato'";
$resultado=mysql_query($sql,$link);
if($row=mysql_fetch_array($resultado)){
	$sIdConvenio=$row['sIdConvenio'];
	$dFechaIni=$row['dFechaInicio'];
	$dFechaFin=$row['dFechaFinal'];
	$dMonto=$row['dMontoMN'];

}
if(!isset($_SESSION['ssContrato']))
	exit();
//Obtener datos
$sql="SELECT max(dIdFecha) as dIdFecha FROM reportediario WHERE sContrato = '$sContrato' AND sNumeroOrden = '' ";
$result=mysql_query($sql,$link);
if($row=mysql_fetch_array($result))
	$FecUltimoReporte =  $row['dIdFecha'];

$ultimo_avance = "select max(dIdFecha) as dIdFecha from avancesglobales Where sContrato = '$sContrato' and sNumeroOrden = '' and sIdConvenio = '$sIdConvenio'" ;
$result=mysql_query($ultimo_avance ,$link);
if($row=mysql_fetch_array($result))
	$FecUltimoAvance =  $row['dIdFecha'];

$inicio_grafica = "select min(dIdFecha) as dIdFecha from avancesglobales Where sContrato = '$sContrato' and sNumeroOrden = '' and sIdConvenio = '$sIdConvenio'" ;
$result=mysql_query($inicio_grafica ,$link);
if($row=mysql_fetch_array($result))
	$FecInicioAvance =  $row['dIdFecha'];

if($FecUltimoReporte>$FecUltimoAvance)
	$FecFinal=$FecUltimoReporte;
else
	$FecFinal=$FecUltimoAvance;

$i=0;
$Fechas[]="";

while($FecInicioAvance < $FecFinal){

	$cadena=explode("-",$FecInicioAvance);
	$anyo=$cadena[0];
	$mes=$cadena[1];
	$mesActual=$mes+1;
	$ultimo=mktime(0,0,0,$mesActual,0,$anyo);
	$ultimodia=strftime("%d",$ultimo);
	
    $Fechas[$i]=$anyo."-".$mes."-".$ultimodia;
	if($mes<12){
		if($mes+1<10){$FecInicioAvance=$anyo."-0".($mes+1)."-01";}
		else {$FecInicioAvance=$anyo."-".($mes+1)."-01";}
	}
	else {$FecInicioAvance=($anyo+1)."-01-01";}
	
	$i++;
}
$ultimo_programado=0;
$arregloavanceprogramado[]=0;
for($cont=0;$cont<=$i-1;$cont++)
{
	$qryProgramado = "select max(dAvancePonderadoGlobal) as dAvancePonderadoGlobal from avancesglobales Where sContrato = '$sContrato' and sNumeroOrden = '' and dIdFecha <= '$Fechas[$cont]' and sIdConvenio ='$sIdConvenio' order by dIdFecha DESC";
	$result=mysql_query($qryProgramado,$link);
	if ($row=mysql_fetch_array($result)){
			$ultimo_programado = $row[0];
	}
	$arregloavanceprogramado[$cont] = $ultimo_programado;

}

$ultimo_fisico=0;
$arregloavancefisico[]=0;
for($cont=0;$cont<=$i-1;$cont++)
{
	$qryProgramado = "select sum(dAvance) as dAvance from avancesglobalesxorden Where sContrato = '$sContrato' and sNumeroOrden = '' and dIdFecha <= '$Fechas[$cont]' and sIdConvenio ='$sIdConvenio' group by sNumeroOrden";
	$result=mysql_query($qryProgramado,$link);
	if ($row=mysql_fetch_array($result)){
			$ultimo_fisico = $row[0];
	}
	$arregloavancefisico[$cont] = $ultimo_fisico;

}
//financiero
$MontoOrden=0;
$ultimo_financiero=0;
$arregloavancefinanciero[]=0;
$Sql="SELECT sum(a.dCantidad * b.dVentaMN) FROM actividadesxorden a INNER JOIN actividadesxanexo b ON (a.sContrato=b.sContrato AND a.sIdConvenio=b.sIdConvenio AND a.sNumeroActividad=b.sNumeroActividad AND a.sTipoActividad='Actividad') WHERE a.sContrato = '$sContrato' and a.sNumeroOrden = '' and a.sIdConvenio ='$sIdConvenio'  GROUP BY a.sNumeroOrden";
$result=mysql_query($Sql,$link);
if($row=mysql_fetch_array($result))
{
	 $MontoOrden=$row[0];
}
for($cont=0;$cont<=$i-1;$cont++)
{
	$qryProgramado = "select (sum(dMontoMN)/$MontoOrden)*100 as dAvance from estimaciones Where sContrato = '$sContrato' and sNumeroOrden = '$sNumeroOrden' and dFechaFinal <= '$Fechas[$cont]' AND lStatus='Autorizado' group by sNumeroOrden";
	$result=mysql_query($qryProgramado,$link);
	if ($row=mysql_fetch_array($result)){
			$ultimo_financiero = $row[0];
	}
	$arregloavancefinanciero[$cont] = $ultimo_financiero;

}
//Tamaño de la imagen
include "../infoempresa.php"; 
$Ancho=600;
$Alto=400;
include "../graficaDos.php"; 
?>
</center>
</td>
<td valign='top'>
<center>
<a href="javascript:ventanaSecundaria('imagen.php')"> 	
<img src="Grafica.png" height="<?php echo $Alto?>" width="<?php echo $Ancho?>">
</a>
</center>
</td>
</tr>
</table>
</center>
</body>
</html>
