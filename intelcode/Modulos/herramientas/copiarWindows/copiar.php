<?php
#Caso Windows
#   Compiar a unidad en red, si el servidor se esta
#   ejecutando en un sistema windows
#   La unidad destino debe tener permisos de escritura

function copiant($nombreArchivo,$Destino){
   if(!copy($nombreArchivo,$Destino))
      print("\n<br>Ocurrio un error mientras se intentaba copiar el archivo $nombreArchivo !!");
   else 
      print("\n<br>El archivo $nombreArchivo Se Copio Correctamente");
}
$archivo = "../extrae/sql/intelcode.428236863.sql";
$destino = "\\\\192.168.1.64\\adal\\";
$fechaCopia = date("Y_m_d_G.i.s");
if(strpos($archivo,"/")!==false){
	$nombres = explode("/",$archivo);
	$nombre = $nombres[count($nombres)-1];
}
echo "Nombre correcto :".$nombre;
mkdir($destino.$fechaCopia);
copiant($archivo,$destino."\\".$fechaCopia."\\".$nombre);
?>