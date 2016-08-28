<?php
function listar_directorios_ruta($ruta){
   // abrir un directorio y listarlo recursivo
   if (is_dir($ruta)) {
      if ($dh = opendir($ruta)) {
      while (($file = readdir($dh)) !== false) {
            //esta línea la utilizaríamos si queremos listar todo lo que hay en el directorio
            //mostraría tanto archivos como directorios
            //echo "\n<br>Nombre de archivo: $file : Es un: " . filetype($ruta . $file);
            if ( $file!="." && $file!=".."){
		$archivo = explode(".",$file);
		if($archivo[count($archivo)-1]=="jpg"){
               		echo "\n<br>Eliminando: $ruta$file";
			unlink($ruta.$file);
		}
            }
         }
      closedir($dh);
      }
   }else
      echo "<br>No es ruta valida";
} 

$file = fopen("limpiezas.log","a+");
fwrite($file,date("d/m/Y H:i:s"));
fclose($file);

listar_directorios_ruta("./"); 
?>
