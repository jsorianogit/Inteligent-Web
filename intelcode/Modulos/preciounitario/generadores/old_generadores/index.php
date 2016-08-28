<?php
session_cache_limiter("must-revalidate"); 
session_start();
?>
<html>
<head>
<?php
require ("../../../include/formulario.inc.php");
   //echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   //echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   //echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   //echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";

?>
</head>
<body   >
<center>

<form name='NumeroOrden' method='post'>
<?php
if($_REQUEST['operacion']!='a' and $_REQUEST['operacion']!='m'){
	if(isset($_POST['NumberOrder']))$_SESSION['NumberOrder']=$_POST['NumberOrder'];
	$sql = "SELECT sNumeroOrden,sNumeroOrden FROM ordenesdetrabajo WHERE sContrato='$sContrato' ORDER BY sNumeroOrden";
	$result = mysql_query($sql);
	echo "Numero de Orden:<select name='NumberOrder' onChange='document.NumeroOrden.submit();'>";
	echo "<option></option>";
	while ($row = mysql_fetch_array($result)){
		if($_SESSION['NumberOrder'] == $row[0]) $selected = "selected";
		else $selected = "";
		echo "<option $selected>".$row[0]."</option>";
	}
	echo "</select>";
}
mysql_close();
?>
</form>
<script>
wz=(window.screen.width/2) -2;
hz= 290;//window.screen.height / 2 -50;
document.write('<iframe  src="generadores.php" id="generadores" name="generadores" frameborder="0" framespacing="0" scrolling="auto" border="1" style="position:absolute; left:0px; top:40px; width:'+wz+'; height:'+hz+'; z-index:5"></iframe>');
document.write('<iframe  src="estimacionxpartida.php" id="estimacionxpartida" name="estimacionxpartida" frameborder="0" framespacing="0" scrolling="auto" border="1" style="position:absolute; left:'+wz+'px; top:200px; width:'+wz+'; height:'+hz+'; z-index:5"></iframe>');
</script>
</center>
</body>
</html>
