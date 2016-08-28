<?php
#Caso Windows
#   Compiar a unidad en red, si el servidor se esta
#   ejecutando en un sistema windows
#   La unidad destino debe tener permisos de escritura

function copiant($nombreArchivo,$Destino){
   if(!copy($nombreArchivo,$Destino)){
      print("\n<br><br>Ocurrio un error mientras se intentaba copiar el archivo $nombreArchivo !!");
	}  
  else {
      print("<br><br>El archivo $nombreArchivo Se Copio Correctamente");
      print("<br>en el directorio $Destino");
    }
}
$archivo = "../extrae/sql/intelcode.00009057-001-07.sql";
$destino = "\\\\192.168.1.67\\compartidos\\";
$fechaCopia = date("Y_m_d_G.i.s");
if(strpos($archivo,"/")!==false){
	$nombre = explode("/",$archivo);
	$nombreReal = $nombre[count($nombre)-1];
}
echo "<br>Nombre correcto :".$nombreReal;
echo "<br>Creando $destino$fechaCopia<br> 	";
mkdir($destino.$fechaCopia);
copiant($archivo,$destino.$nombreReal);
?>