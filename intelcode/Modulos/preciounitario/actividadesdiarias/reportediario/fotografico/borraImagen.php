<?php
require ("../../../../include/formulario.inc.php");
	$sContrato = "".$_REQUEST['sContrato']."";
	$directorio=dir("./");
	while ($archivo = $directorio->read())
	{
	 	$Archivo = explode(".",$archivo);
		if(is_file($path.$archivo) and strpos($Archivo[count($Archivo)-1],"jpg") !==false  and strpos($archivo ,$sContrato) !==false ){
			unlink($path.$archivo);
		}
	}
?>
<script>window.close();</script>