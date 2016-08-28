<?php
session_cache_limiter("must-revalidate");
session_start();
?>
<html>
<head>
<style type='text/css'>@import 'menu.css';</style>
<script type='text/javascript' src='menu.js'></script>
<?php
require_once ("../../../include/formulario.inc.php");
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
   echo "Seleccion el Numero de Orden:<select name='NumberOrder' onChange='document.NumeroOrden.submit();'>";
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

<div id="menu">
   <ul>
      <li id='menu1'><a href="#?division=1" onclick="viewSection('1','2');">Informacion del Generador</a></li>
      <li id='menu2'><a href="#?division=2" onclick="viewSection('2','2');">Partidas del Generador</a></li>
   </ul>
</div>
<div id="contenido1">
   <p>
     <br><center>
      <h3>Información del Generador</h3>
      <h4><font color="blue">Para agregar Partidas al Generador, de clic sobre el generador, despues seleccione la pestaña "Partidas del Generador"</font></h4>
      <script>
         wz=(window.screen.width) -30;
         hz= window.screen.height -50; //290
         document.write('<iframe  src="generadores.php" id="generadores" name="generadores" frameborder="0" framespacing="0" scrolling="auto" border="1" style="position:absolute; left:0px; top:140px; width:'+wz+'; height:'+hz+'; z-index:5"></iframe>');
      </script>
   </p>
</div>
<div id="contenido2">
   <p>
     <br><center>
         <h3>Partidas del Generador </h3>
      <script>
         wz=(window.screen.width) -30;
         hz= window.screen.height -50; //290
         document.write('<iframe  src="estimacionxpartida.php" id="estimacionxpartida" name="estimacionxpartida" frameborder="0" framespacing="0" scrolling="auto" border="1" style="position:absolute; left:0px; top:140px; width:'+wz+'; height:'+hz+'; z-index:5"></iframe>');
      </script>
   </p>
</div>
<?php
if(!isset($_REQUEST['division']))
{
?>
<script language='javascript'>
               document.location='#?division=1' ;
               viewSection('1','2');
</script> 
<?php
}
?>
</center>
</body>
</html>
