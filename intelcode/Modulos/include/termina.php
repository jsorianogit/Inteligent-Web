<?php
session_start();
require("config.inc.php");
session_destroy();
$ruta = str_replace("intelcode/","",$pathAbsolute);
echo "Cerrando todas las sesiones...";
//mysql_close();
//header($ruta);
echo "<SCRIPT LANGUAGE=\"javascript\">top.location.href ='$ruta';</SCRIPT>";
#echo "<SCRIPT LANGUAGE=\"javascript\">top.location.href ='".$pathAbsolute."intelcode/frmLogin.php'</SCRIPT>;";
//echo "<SCRIPT LANGUAGE=\"javascript\">parent.location.href = \"http://intelcode.dyndns.org\";</SCRIPT>;";
#echo "<SCRIPT LANGUAGE=\"javascript\">window.location ='$ruta';</SCRIPT>";
?>
