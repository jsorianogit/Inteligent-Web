<?php
require ("../../include/mysql.inc.php");
require ("ftp.inc.php");
$ftp = new ftp();
$ftp->info("ftp","28112002","127.0.0.1","21");
$ftp->conectarFTP();
$ftp->moveraRuta("descargas");
/*$ftp->limpiarDir();
$ftp->SubirArchivos("../extrae/sql/");
$ftp->listar();*/
$ftp->obtenerArchivos("./descargasFTP/");
$ftp->cerrarFTP();
location('../menu');
?>