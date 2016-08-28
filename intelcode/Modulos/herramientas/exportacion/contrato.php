<?php
session_start();
require("../../include/contrato.inc.php");
set_time_limit(0); 

$tipoExportacion = $_POST['exportar'];
$con = $_POST['contrato'];
//$tablas = array ("avancesxactividad","contratos","actividadesxanexo","actividadesxorden","avancesglobales","distribuciondeactividades","distribuciondeanexo","convenios","anexosmensuales");

$contrato = new contrato();

if($tipoExportacion=="contrato"){
	$tablas = array ("avancesxactividad","actividadesxanexo","actividadesxorden","avancesglobales","distribuciondeactividades","distribuciondeanexo","convenios","anexosmensuales");
	$contrato->nuevaexportacion($con,$tablas);
   $contrato->exportaContrato();
}
else if($tipoExportacion=="db"){
	$tablas = array ("avancesxactividad","contratos","configuracion","ordenesdetrabajo","actividadesxanexo","actividadesxorden",
	"avancesglobales","distribuciondeactividades","distribuciondeanexo","convenios","anexosmensuales","personal","equipos","tiposdemovimiento",
	"turnos","estimacionperiodo","estimaciones","estimacionxpartida","actividadesxestimacion","anexo_suministro","anexo_psuministro",
	"reportediario","bitacoradeactividades","bitacoradealcances","bitacoradeequipos","bitacoradepaquetes","bitacoradepersonal",
	"jornadasdiarias","tramitedepermisos",	"avancesglobalesxorden");
	$contrato->nuevaexportacion($con,$tablas);	
	//$contrato->exportaContrato();
   $contrato->exportaDB();
}
location("index.php");
?>