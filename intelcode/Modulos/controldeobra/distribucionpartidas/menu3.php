<?php
session_start();
require_once("../../include/reporteador.inc.php");
?>
<center>
<h2>Distribucion de Conceptos / Partidas de Ordenes de Trabajo ( Desde la Fecha de Inicio Hasta la Fecha Final del de Conceptos / Partidas)</h2>
<form name='sNumeroOrden'  action='menu3.php' method='POST'>
	<br><br>
	<p>	
	Numero de Orden:
	<?php
	if (isset($_POST['sNumeroOrden']))
		$_SESSION['sNumeroOrden'] = $_POST['sNumeroOrden'];
		
	$sql = " select DISTINCT sNumeroOrden from actividadesxorden where sContrato='$sContrato'";
	$result = mysql_query($sql);
	echo " <select name='sNumeroOrden' onChange='document.sNumeroOrden.submit();'>";
	while($row = mysql_fetch_array($result)){
				if($_SESSION['sNumeroOrden']=="")$_SESSION['sNumeroOrden'] = $row[0];
				if($_SESSION['sNumeroOrden'] == $row[0]) $selected ="selected";
				else  $selected ="";
			echo "<option $selected>$row[0]</option>";
	}
	echo "</select>";
	?>
	</p>
</form>
<form action='conceptos3.php' method='POST'>
	<input type="submit" value="Aceptar">
</form>
</center>