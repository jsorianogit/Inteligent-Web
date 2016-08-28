<?php
require("Modulos/include/config.inc.php");
/*
$Servidor="localhost";
$Usuario="root";
$Clave="danae";
$sContrato="428237826";
$_SESSION['database']='intelcode';*/
$link = mysql_connect($Servidor,$Usuario,$Clave);
mysql_select_db($_SESSION['database']);
?>
