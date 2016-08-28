<?php 
   session_start();
?>
<html>
<head>
<?php
require ("../../include/mysql.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
</head>
<body>
<form name ="form1" action="morepage.php" method ="post" target="derecho">
Numero Estimacion:
<?php
 $sql ="  select iNumeroEstimacion from estimacionperiodo where sContrato='$sContrato'";
 $result = mysql_query($sql);
 echo "<select name='iNumeroEstimacion'>";
 while ($row = mysql_fetch_array($result)){
      echo "<option>$row[0]</option>";
   }
 echo "</select>";   
?>
<input type="submit" value="Aceptar" />
</form>
</body>
</html>