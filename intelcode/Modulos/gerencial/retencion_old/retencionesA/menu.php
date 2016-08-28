<?php 
   session_start();
?>
<html>
<head>
<?
require ("../../../include/mysql.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
</head>
<body>
<center><BR><font color="blue"><h5>Contrato y Convenio</h5></font></center>
<font size="4">
<form name="contrato" action="menu.php" method="post">
Contrato:<br>	
<select name='Contrato' onChange="document.contrato.submit();">
<?php
if(isset($_POST['Contrato']))
	$_SESSION['Contrato']=$_POST['Contrato'];
else
	$_SESSION['Contrato']=$sContrato;
$sql ="select sContrato from contratos";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
	$seleccionar = ($_SESSION['Contrato']==$row[0])?"selected":"";
	echo "\n<option $seleccionar>$row[0]</option>";
}
?>
</select>
</form>
<form name ="form1" action="morepage.php" method ="post" target="derecho">

Convenio:
<select name='sIdConvenio'>
<?php
$sql ="select sIdConvenio,sDescripcion from convenios Where sContrato ='".$_SESSION['Contrato']."'";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
	echo "<option value=\"$row[0]\">$row[1]</option>";
}
?>
</select>
<center><BR><font color="blue"><h5>Fecha Final</h5></font></center>
año: 
<select name='anyo'>
<?php
	for($i=date('Y')-100;$i<=date('Y')+100;$i++){
		$seleccionar = date('Y')==$i ?"selected":"";
		echo "<option $seleccionar>$i</option>";
	}
?>
</select>
<br>Mes: 
<select name='mes'>
	<option VALUE="01">ENERO</option>
	<option VALUE="02">FEBRERO</option>
	<option VALUE="03">MARZO</option>
	<option VALUE="04">ABRIL</option>
	<option VALUE="05">MAYO</option>
	<option VALUE="06">JUNIO</option>
	<option VALUE="07">JULIO</option>
	<option VALUE="08">AGOSTO</option>
	<option VALUE="09">SEPTIEMBRE</option>
	<option VALUE="10">OCTUBRE</option>
	<option VALUE="12">NOVIEMBRE</option>
	<option VALUE="13">DICIEMBRE</option>
</select>
<center><font color="blue"><h5>Configuracion de Hoja</h5></font></center>
Tamaño de Papel:
<select name='sizepapper'>
	<option>A3</option>
	<option>A4</option>
	<option  selected  >Letter</option>
	<option>Legal</option>
</select><BR>

<center>
<input type="submit" value="Aceptar" />
</center>
</form>
</font>
</body>
</html>