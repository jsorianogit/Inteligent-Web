<?php
//$ruta = "./";
/*$ruta = getcwd();
$enlace = $ruta.$_REQUEST['name'];
header("Content-Disposition: attachment; filename=".$enlace);
header("Content-Type: application/octet-stream");
header("Content-Length: ".filesize($_REQUEST['name']));
readfile($_REQUEST['name']);
*/
$ruta = getcwd();
$nombre=$_REQUEST['name'];
$enlace = $ruta."/".$_REQUEST['name'];
header ("Content-Disposition: attachment; filename=".$nombre."\n\n");           
header ("Content-Type: application/octet-stream");
header ("Content-Length: ".filesize($enlace));
readfile($enlace);

?>