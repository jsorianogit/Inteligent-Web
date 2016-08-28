<?php session_start();session_register('sOperacion','ssTipo');
if(isset($_POST['fecha'])){
    $fecha = $_POST['fecha'];
}
?>
<html>
<head>
</head>
<body>
<div id="pagecell1">
 <div id="pageNav">
 <p>
 <center>
   <form action ="<?php $PHP_SELF ?>" action ="POST">
		 Fecha:
       	<label for='fecha'>
			   <input class='fecha rang100' name='fecha' id='fecha' type='text' value="<?php echo $fecha ?>"
               onKeyPress="return solonumeros(event);"   
               onfocus="style.backgroundColor='$#FFCC99'"
               onblur="style.backgroundColor='white'">
            </label>
         <input type="submit" value="Aceptar" />
   </form>
   </p>
 </div>
<div id="content">
<center>
<p>
<?php
require ("../../../include/reporteador.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
//obtener el convenio
$sql="SELECT c.sIdConvenio,c2.dFechaInicio,c2.dFechaFinal,c2.dMontoMN FROM configuracion c INNER JOIN convenios c2 ON (c.sContrato=c2.sContrato AND c.sIdConvenio=c2.sIdConvenio) WHERE c.sContrato='$sContrato'";
$resultado=mysql_query($sql,$link);
if($row=mysql_fetch_array($resultado)){
	$sIdConvenio=$row['sIdConvenio'];
}
//crear el reporte.

$titulos = array ("Partida","Descripcion","F. Inicio","F. Termino", "Cantidad","Unidad","PU MN","Total MN","%","Reportado","Costo Reportado");
$reporte = new reporte();
$reporte->ponerconsulta( "select a.sWbs,a.mDescripcion,a.dFechaInicio,a.dFechaFinal,a.dCantidadAnexo,a.sMedida,a.dVentaMN,(a.dVentaMN*a.dCantidadAnexo),a.dPonderado,SUM(b.dCantidad),SUM(b.dCantidad * a.dVentaMN) as dCostoInstalado from actividadesxanexo a INNER JOIN bitacoradeactividades b ON (a.sContrato=b.sContrato and a.sNumeroActividad=b.sNumeroActividad and b.dIdFecha <='$fecha') WHERE a.sContrato='$sContrato' and a.sIdConvenio='$sIdConvenio' AND sTipoActividad ='Actividad' GROUp by a.sWbs,a.sNumeroActividad ORDER BY a.iItemOrden,a.sNumeroActividad",0,$titulos);
$reporte->imprimir();

?>
</center>
</p>
<p>
<?php
if(isset($fecha) and $fecha!=""){
   //capturar los totales reportados
   $total=0;
    $sql = "select SUM(b.dCantidad*a.dVentaMN) as dCostoInstalado from actividadesxanexo a INNER JOIN bitacoradeactividades b ON (a.sContrato=b.sContrato and a.sNumeroActividad=b.sNumeroActividad and b.dIdFecha <='$fecha') WHERE a.sContrato='$sContrato' and a.sIdConvenio='$sIdConvenio' AND a.sTipoActividad ='Actividad' ";
   $result = $reporte->query($sql);
   while($row = mysql_fetch_array($result)){
     $total += $row[0];
   }
   $total+=0.0001;
   //print ($reporte->tipoCampo($result,0));
   //capturar el total de la actividad
   $totalContrato=0;
   $sql = "select SUM(dVentaMN*dCantidadAnexo) as sVentaMN from actividadesxanexo where sContrato='$sContrato'  and sIdConvenio='$sIdConvenio' AND sTipoActividad = 'Actividad' group by sContrato";
   $result= $reporte->query($sql);
   if($row = mysql_fetch_array($result)){
     $totalContrato += $row[0];
   }
   $totalContrato+=0.00001;
   //imprimir el total de los reportados
   $titulos = array ("Total Reportado","Total Anexo \"C\" Sin Iva");
   $reporte->ponerconsulta("select $total as dCostoReportado, $totalContrato as dCostoContrato from  DUAL",2,$titulos);
   $reporte->imprimir();
}
?>
</p>
</div>
</div>
</body>
</html>
