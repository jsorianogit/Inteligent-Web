<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<html>
<head>
<title></title>
<style type='text/css'>@import '../../../../../Modulos/estilos/estilo1.css';</style>
<script type="text/javascript" src="acc_calendar/acc_calendar.js">
</script>
</head>
<body class=forma>
<center>
<?php
echo "<center><table border=2><td><font size=4>Detalles de Instalacion por Periodo</font></td></table></center><br>";
session_register('ssUsuario','ssContrasena','ssContrato','dFechaInicio','dFechaTermino');
require("../../../../../Modulos/include/mysql.inc.php");
if(isset($_SESSION['ssUsuario']) and isset($_SESSION['ssContrasena']))
{
	$sqlContrato="SELECT sContrato
				  FROM contratosxusuario 
				  WHERE sIdUsuario='".$_SESSION['ssUsuario']."'";
	$resultadoContrato=mysql_query($sqlContrato,$link);
	echo "<form action=rptDetalledeInstalacionxPeriodo.php  method=post target='_blank'>";/*Contrato<br><select name=sContra>";
	while($rowContrato=mysql_fetch_array($resultadoContrato))
	{	
		echo "<option>".$rowContrato['sContrato']."</option>";
	}
	echo "</select>";*/
}
	?>
	<br>
Seleccione el rango de fechas, use los calendarios para mayor comodidad

	<div>
		<p>
		<label for="fecha3">
			<span>
				Fecha  de  inicio
			</span>
			<input class="fecha prev rang100" type="text" id="fecha3" name="fechaIni" value="" />
		</label>
		</p>
	</div>
	<div>
		<p>
		<label for="fecha4">
			<span>
				Fecha de termino
			 </span>
			 <input class="fecha prev rang100" type="text" id="fecha4" name="fechaTerm" value="" /> 
		</label>
		</p>
	</div>
	

	<input type=submit value='Seleccionar'/></form>
<?php
?>
</center>
</body>
</html>
