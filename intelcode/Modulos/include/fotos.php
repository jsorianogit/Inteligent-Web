<?php
require ("reporteador.inc.php");
	
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";

	$opciones= 	array(
			array("../reportediario.php","Validar Reporte Diario","","sContrato,dIdFecha,sNumeroOrden"),
			array("../reportediario.php","Autoriza Reporte Diario","","sContrato,dIdFecha,sNumeroOrden")
		);
$titulos = array ("Contrato","Fotos");
$reporte = new reporte();
$reporte->opciones($opciones);
$reporte->ponerconsulta("SELECT sContrato,bImagen FROM reportefotografico;",1,$titulos,"Validar Reportes Diarios");

$reporte->visualizar();
?>