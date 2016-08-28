<?php
	require_once("../../../../include/mysql.inc.php");
	if(isset($_POST['Fecha']))
		$Fecha = $_POST['Fecha'];
	if(isset($_POST['IdDiario']))
		$IdDiario = $_POST['IdDiario'];
	if(isset($_POST['Contrato']))
		$Contrato =$_POST['Contrato'];
	$sql = "DELETE FROM bitacoradeequipos WHERE sContrato='$Contrato' AND dIdFecha='$Fecha' AND iIdDiario='$IdDiario' ;";
	mysql_query($sql);
	if(mysql_error())
		mensaje(mysql_error());	
	location("index.php");
?>