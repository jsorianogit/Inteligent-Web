<?php session_start(); $Fecha = $_POST['Fecha']; $actividad= $_POST['actividad']; $consolidar= $_POST['consolidar']; 
require ("../../../include/reporteador.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
  echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
<html>
	<head>
		<script type="text/javascript" src="acc_calendar/acc_calendar.js"></script>
		<style type="text/css">@import 'estilo1.css';</style>
		<script language="javascript" >
			//parent.frames[1].document.location="coincidencias.php";
			function enviarNumeroActividad(){
				try {
					parent.frames.fases.document.location.href="fases.php?sNumeroActividad=" + document.formulario.actividad.value;
					parent.frames.reportado.document.location.href="reportado.php?sNumeroActividad=" + document.formulario.actividad.value;
					parent.frames.kardex.document.location.href="kardex.php?sNumeroActividad=" + document.formulario.actividad.value;
					parent.frames.generado.document.location.href="generado.php?sNumeroActividad=" + document.formulario.actividad.value;
				}
				catch(error){}
			}
		</script>
	</head>
<body onLoad="document.formulario.actividad.focus();document.formulario.actividad.select();">
<center> 	
<table border=2  class='enhancedtablerowhover'  bgcolor="#D0DDF0"> <!-- class='normalTable'-->
<tr>
<td style="vertical-align: top" >
   <table border=3 class='enhancedtablerowhover' >
      <form name = "formulario" action="<?php echo $PHP_SELF?>" method="post" onSubmit="enviarNumeroActividad();">
      <tr>
         <th><font color='#D58000'>Num. de Partida</font></th><td><input type = "text" name = "actividad" size=10  value="<?php echo $actividad ?>"></td>
      </tr>
      <tr>
      	<td colspan=2>
           <center>
      	  <input type="button" value="Aceptar" onClick='enviarNumeroActividad();'>
      	  </center>
      	</td>
      </tr>
      </form>
   </table>

   </body>
</head>
</html>