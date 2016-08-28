<?php
session_start();
//Obtener las variables POST del formulario
require ("../../../include/formulario.inc.php");

if(isset($_REQUEST['sNumeroOrden']))
	$sNumeroOrden= $_REQUEST['sNumeroOrden'] ;
	
if(isset($_REQUEST['dIdFecha']))
	$fecha = $_REQUEST['dIdFecha'] ;

 $sql = "DELETE  FROM firmas WHERE sContrato='$sContrato' AND dIdFecha='$fecha' AND sNumeroOrden='$sNumeroOrden' ;";
		mysql_query($sql);
		if(mysql_error())
			mensaje(mysql_error());
location("mostrar.php");
?>
