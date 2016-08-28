<?php
session_start();
require("config.inc.php");
session_destroy();
$ruta = $pathAbsolute."actualizada/login/login.php";
header("Location:$ruta");
//echo "<SCRIPT LANGUAGE=\"javascript\">top.location.href ='$ruta';</SCRIPT>";
?>
