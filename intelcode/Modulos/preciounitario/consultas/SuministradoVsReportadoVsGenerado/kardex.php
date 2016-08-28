<?php
require ("../../../include/reporteador.inc.php");
?>
<html>
<head>
<?php
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
  echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
</head>
<?php
if(isset($_REQUEST['sNumeroActividad'])) $sNumeroActividad=$_REQUEST['sNumeroActividad'];
if($sNumeroActividad!="")$_SESSION['actividad']=$sNumeroActividad;
/*	$opciones= 	array(
			array("../reportediario.php","Validar Reporte Diario","","sContrato,dIdFecha,sNumeroOrden"),
			array("../reportediario.php","Autoriza Reporte Diario","","sContrato,dIdFecha,sNumeroOrden")
		);
	*/	
$sql = "SELECT an.dFechaAviso,an.sNumeroOrden,an.sReferencia,ap.dCantidad
		FROM anexo_psuministro ap
			inner join anexo_suministro an on (ap.sContrato=an.sContrato and ap.iFolio=an.iFolio)
			inner join movimientosdealmacen ti on (ti.sIdTipo = an.sIdTipo)
		WHERE ap.sContrato='$sContrato' and ap.sNumeroActividad='".$_SESSION['actividad']."'
		ORDER BY an.dFechaAviso,ap.iFolio;";
		
$titulos = array ("Fecha","Numero de Orden","Referencia","Cantidad");
$reporte = new reporte();
$reporte->opciones($opciones);
$reporte->ponerconsulta($sql,1,$titulos,"");
?>
<body>
<?php
echo "<center>";
if(mysql_fetch_array(mysql_query($sql)))
$reporte->visualizar();
$totalSuministrado=0;
$sql = "SELECT sum(ap.dCantidad)
		FROM anexo_psuministro ap
			inner join anexo_suministro an on (ap.sContrato=an.sContrato and ap.iFolio=an.iFolio)
			inner join movimientosdealmacen ti on (ti.sIdTipo = an.sIdTipo)
		WHERE ap.sContrato='$sContrato' and ap.sNumeroActividad='".$_SESSION['actividad']."'
		ORDER BY an.dFechaAviso,ap.iFolio;";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
	$totalSuministrado = $row[0];
}
echo "Total Suministrado : <input type='text' value='$totalSuministrado' readonly>";
echo "<center>";
?>
</body>
</html>