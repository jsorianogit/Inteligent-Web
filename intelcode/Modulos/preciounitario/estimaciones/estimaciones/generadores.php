<?php
require ("../../../include/reporteador.inc.php");
	
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";

if(isset($_REQUEST['Contrato']))$Contrato = $_REQUEST['Contrato'];
if(isset($_REQUEST['iNumeroEstimacion']))$iNumeroEstimacion = $_REQUEST['iNumeroEstimacion'];
/*	$opciones= 	array(
			array("../reportediario.php","Validar Reporte Diario","","sContrato,dIdFecha,sNumeroOrden"),
			array("../reportediario.php","Autoriza Reporte Diario","","sContrato,dIdFecha,sNumeroOrden")
		);*/
$sql = "SELECT iConsecutivo,sNumeroOrden,iSemana,sNumeroGenerador,lStatus,dFechaInicio,dFechaFinal,dMontoMN,dMontoDLL,sFaseObra FROM estimaciones WHERE sContrato='$sContrato' and iNumeroEstimacion='$iNumeroEstimacion';";
$titulos = array ("#","Numero de Orden","Sem.","Gen.","Status","F.Inicio","F.Final","MontoMN","MontoDLL","Fases Ob...");
$reporte = new reporte();
$reporte->opciones($opciones);
$reporte->ponerconsulta($sql,1,$titulos,"Detalles de Generadores Pertenecientes a la Estimacion [ $iNumeroEstimacion]");
?>
<center>
<?php
if(mysql_fetch_array(mysql_query($sql)))
	$reporte->visualizar();
?>