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

 $consulta="SELECT dIdFecha,dAvancePonderadoDia,dAvancePonderadoGlobal FROM avancesglobales LIMIT 20";
	$result=mysql_query($consulta,$link);
	?>
	<style>
		.aw-grid-control {height: 350; width: 800   ; margin: 0px; border: none; font: menu;}
		.aw-row-selector {text-align: center;color: #2A8000;}
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
    	$i=0;
    	while($row = mysql_fetch_array($result))
    	print ("['<a href=\"http://intel-code.com.mx.\"><img src=\"../../../imagenes/acroba2t.gif\" width=17></a>' ,  '".$i++."' ,'".$row[2]."' , '$value', '$Acumulado'],");
    	
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

</body>
</html>
