<?php
session_start();
require ("../../../../include/formulario.inc.php");   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
   echo "<center><h3>Cargando Descripcion, Espere</h3></center>";
   $sIdEquipo = $_REQUEST['sIdEquipo'];
   $sql = "SELECT sDescripcion FROM equipos WHERE sContrato ='$sContrato' AND sIdEquipo='$sIdEquipo' ";
   $result = mysql_query($sql);
   if($row = mysql_fetch_array($result)){
		$descripcion = trim($row[0]);   
		$descripcion =str_replace("\n"," ",trim($descripcion));
		$descripcion =str_replace("<br>"," ",trim($descripcion));
		$descripcion = strip_tags(trim(str_replace(chr(13),'\\n', $descripcion)));
   }
   else
   	$descripcion = ".";
echo "<script language='JavaScript' >
		window.opener.document.bitacoradeequipos.sDescripcion.value='$descripcion';
		window.close();	
	</script>";

?>
