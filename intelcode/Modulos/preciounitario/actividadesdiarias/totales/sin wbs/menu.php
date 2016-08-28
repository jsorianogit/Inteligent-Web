<?php 
   session_start();
?>
<head>
<?
require ("../../../include/formulario.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
</head>
<html>
<body>
<center>
<form name ="form1" action="reporte.php" method ="post" target="derecho">
<table  class='enhancedtablerowhover'><tr><td>
<center>
<?php
for($i=0;$i<50;$i++)
 echo "&nbsp;";
?>
<label  for="fechaini">Desde<input type="text" class="fecha rang10" name="fechaini" id="fechaini" size="11"></label >
</center>
</tr></td>
<tr><td>
<center>
<?php
for($i=0;$i<50;$i++)
 echo "&nbsp;";
?>
<label  for="fechafin">Hasta<input type="text" class="fecha rang10" name="fechafin" id="fechafin" size="11"></label >
</center>
</tr></td>
<tr><td>
<center>
Agrupar la Informacion por Numero de Orden? :
<?php
switch ($ordenar){
    case('Si'):$si = "selected";break;
    case('No'):$no = "selected";break;
}
?>
<select name="ordenar" onChange="desabilitar();">
   <option value="Si" <? echo $si ?> >Si</option>
   <option value="No" <? echo $no ?> >no</option>
</select>
</center>
</tr></td>
<tr><td>
<center>
<?php
	$sqlOrden="SELECT sNumeroOrden
				  FROM ordenesdetrabajo
				  WHERE sContrato='$sContrato'
				  ORDER BY sNumeroOrden";
	$resultadoOrden=mysql_query($sqlOrden,$link);
	echo "
				<table class='enhancedtablerowhover'><tr><th>Seleccionar No. de Orden</th><td>
					<select name='sNumeroOrden'>";
					echo "<option></option>";
	while($rowOrden=mysql_fetch_array($resultadoOrden))
	{	
		echo "<option>".$rowOrden['sNumeroOrden']."</option>";
	}
	echo "</select></td></tr></table>";
?>
</center>
</tr></td>
<tr><td>
<center>
<input type="submit" value="Aceptar" />
</center>
</td>
</tr>
</table>
</form>

</center>
</body>

</html>