<?php
include "../functions.php";
/*$contrato=$_GET['contrato'];
conexion("localhost","root","danae","evya");
$qry=consulta("*","configuracion","sContrato='".$contrato."'");
header("Content-Type: image/jpeg");
while($row=mysql_fetch_array($qry)){
	echo $row['bImagen'];
}*/
$location = "";
conexion("localhost","root","danae","evya");
$nombre='imagen1';
$qry=consulta("*","configuracion","");
if (!$qry) {
    echo "<br />";
    die("Error al ejecutar consulta $sql" . mysql_error());
}
echo "<h2>Exportando en: $location</h2>";
$counter=0;
// Recorro el resultado de la consulta
while($row=mysql_fetch_object($qry)){
	$filename=$location.$row->$nombre;
	echo $filename;
	$file=fopen($filename,'w+');
	if (fwrite($file,$row->contenido)){
		echo $filename. "d<br />";
	}
}
?>