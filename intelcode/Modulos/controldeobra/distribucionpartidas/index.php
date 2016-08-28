<?php
session_start();
?>
<html>
<head>
<?php
require ("../../include/formulario.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
</head>
<body>
<center>
<table><tr>
<th class='normal'>
	<form name='contrato' action='index.php' method = 'post'>
	Contrato:
	</th>
	<td>
		<?php
		if (isset($_POST['Contrato']))
			$_SESSION['Contrato'] = $_POST['Contrato'];
	
		$sql = " select DISTINCT sContrato from contratosxusuario where sIdUsuario='".$_SESSION['sIdUsuario']."'";
		$result = mysql_query($sql);
		echo " <select name='Contrato' onChange='document.contrato.submit();'>";
		while($row = mysql_fetch_array($result)){
					if($_SESSION['Contrato']=="")$_SESSION['Contrato'] = $row[0];
					if($_SESSION['Contrato'] == $row[0]) $selected ="selected";
					else  $selected ="";
				echo "<option $selected>$row[0]</option>";
		}
		echo "</select>";
		?>
	</form>
	</td>
	</tr><tr>
	<th>
	<form name='sNumeroOrden' action='index.php' method = 'post'>
	Numero de Orden:
	</th>
	<td>
		<?php
		if (isset($_POST['sNumeroOrden']))
			$_SESSION['sNumeroOrden'] = $_POST['sNumeroOrden'];
	
		$sql = " select DISTINCT sNumeroOrden from actividadesxorden where sContrato='".$_SESSION['Contrato'] ."'";
		$result = mysql_query($sql);
		echo " <select name='sNumeroOrden' onChange='document.sNumeroOrden.submit();'>";
		echo "<option></option>";
		while($row = mysql_fetch_array($result)){
					if($_SESSION['sNumeroOrden']=="")$_SESSION['sNumeroOrden'] = $row[0];
					if($_SESSION['sNumeroOrden'] == $row[0]) $selected ="selected";
					else  $selected ="";
				echo "<option $selected>$row[0]</option>";
		}
		echo "</select>";
		?>
	</form>
	</td>
	</tr>

	<tr>
	<th >
	Grafica
	</th>
	<td>
		<form action="funciones.php" method="post">
			<input type="submit" name="enviar" value="Crear" />
		</form>
		Solo del Contrato Seleccionado en el Menu Principal de la Pagina
	</td>
	</tr>
	
	<tr>
	<td colspan =2>
	<center>
	<form action="cDistribucionAPartirDeMensual.php" method="post">
			<font color=RED>
			<h3>Distribucion de Conceptos / Partidas ( A partir de una Programacion Mensual)</h3>
			Esta Opcion no toma en cuenta el Numero de Orden, solo el Contrato<br>
			<input type="submit" name="enviar" value="Distribuir" />
			</font>
	</form>
	</center>
	</td>
	<!--
	</tr>
	<tr>
	<td colspan =2>
	<center>
	<form action="cDistribucionDesdeFIniHastaFFin.php" method="post">
			<font color=RED>
			<h3>Distribucion de Conceptos / Partidas  ( Desde la Fecha de Inicio Hasta la Fecha Final del Conceptos )</h3>
			Esta Opcion no toma en cuenta el Numero de Orden, solo el Contrato<br>
			<input type="submit" name="enviar" value="Distribuir" />
			</font>
	</form>
   </center>	
	</td>
	</tr>
	<tr>
	<td colspan =2>
	<center>
	<form action="cDistribucionFIniHastaFFinYDM.php" method="post">
			<font color=RED>
			<h3>Distribucion de Conceptos / Partidas  ( Desde la Fecha de Inicio Hasta la Fecha Final del Conceptos Y Crear Distribucion Mensual)</h3>
			Esta Opcion no toma en cuenta el Numero de Orden, solo el Contrato<br>
			<input type="submit" name="enviar" value="Distribuir" />
			</font>
	</form>
   </center>	
	</td>
	</tr>	
	-->
	<tr>
	<td colspan =2>
	<center>
	<form action="oDistribucionAPartirDeMensual.php" method="post">
				<h3>Distribucion de Conceptos / Partidas de Ordenes de Trabajo ( A partir de una  Distribucion Mensual)</h3><br>
		<input type="submit" name="enviar" value="Distribuir" />
	</form>
	</center>
	</td>
	</tr>
	<!--
	<tr>
	<td colspan =2>
	<center>
	<form action="oDistribucionFIniHastaFFin.phpp" method="post">
			<h3>Distribucion de Conceptos / Partidas de Ordenes de Trabajo ( Desde la Fecha de Inicio Hasta la Fecha Final del Conceptos )</h3><br>
		<input type="submit" name="enviar" value="Distribuir" />
	</form>
	</center>
	</td>
	</tr>
	<tr>
	<td colspan =2>
	<center>
	<form action="oDistribucionDesdeFIniHastaFFinYDM.php" method="post">
			<font color=blue>
			<h3>Distribucion de Conceptos / Partidas De Ordenes de Trabajo ( Desde la Fecha de Inicio Hasta la Fecha Final del Conceptos Y Crear Distribucion Mensual)</h3>
			<input type="submit" name="enviar" value="Distribuir" />
			</font>
	</form>
   </center>	
	</td>
	</tr>
	-->
</table>
</center>
</body>
</html>	