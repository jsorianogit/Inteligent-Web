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
//$sql = " select iNumeroEstimacion,sNumeroOrden,sNumeroGenerador,lStatus,dFechaInicio,dFechaFinal from estimaciones where sContrato='$sContrato' ;";
/*
$sql = "select  a.iNumeroEstimacion,e.sNumeroOrden,e.sNumeroGenerador,a.lStatus,a.dFechaInicio,a.dFechaFinal,e.dCantidad,e.sIsometricoReferencia,
				e.sPrefijo
		from estimaciones a inner join estimacionxpartida e on (a.sContrato=e.sContrato and e.sNumeroGenerador=a.sNumeroGenerador) 
		where a.sContrato='$sContrato' and e.sNumeroActividad='".$_SESSION['actividad']."';";
*/		
$sql = "Select e2.iConsecutivo, e2.iNumeroEstimacion,e.sNumeroOrden,e.sNumeroGenerador,e2.lStatus, e2.dFechaInicio, e2.dFechaFinal,
					 e.dCantidad,e.sIsometrico,e.sPrefijo
				From estimacionxpartida e inner join estimaciones e2 
					on (e.sContrato = e2.sContrato And e.sNumeroOrden = e2.sNumeroOrden And e.sNumeroGenerador = e2.sNumeroGenerador) 
				where e.sContrato = '$sContrato' And e.sNumeroActividad = '".$_SESSION['actividad']."'
				Order By e2.iConsecutivo, e.sIsometrico ";
$titulos = array ("#","Estimacion","Numero de Orden","Generador","Status","F.Inicio","F.Final","Cantidad","Isometrico","Prefijo");
$reporte = new reporte();
$reporte->opciones($opciones);
$reporte->ponerconsulta($sql,1,$titulos,"");
?>
<body>
<?php
echo "<center>";
if(mysql_fetch_array(mysql_query($sql)))
$reporte->visualizar();
$totalGenerado=0;
$sql = "select  sum(e.dCantidad)
		from estimaciones a inner join estimacionxpartida e on (a.sContrato=e.sContrato and e.sNumeroGenerador=a.sNumeroGenerador) 
		where a.sContrato='$sContrato' and e.sNumeroActividad='".$_SESSION['actividad']."';";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
	$totalGenerado = $row[0];
}
echo "Total Generado : <input type='text' value='$totalGenerado' readonly>";
echo "<center>";
?>
</body>
</html>