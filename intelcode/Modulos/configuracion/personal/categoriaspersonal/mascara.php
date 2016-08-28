<?php
//require ("../../../include/formulario.inc.php");
mysql_connect("localhost","root","danae");
mysql_select_db("intelcode");
$sqlM = "select sMascara from tiposdepersonal where sMascara<>'' limit 1;";
$rsM = mysql_query($sqlM);
if($rowM = mysql_fetch_array($rsM)){
	echo $rowM['sMascara'];
}
?>