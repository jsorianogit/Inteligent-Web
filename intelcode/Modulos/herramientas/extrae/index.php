<?php
session_cache_limiter("must-revalidate"); 
session_start();
require ("../../include/formulario.inc.php");
require ("config.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
<html>
<head>
   <script language = "javascript">
      var tiempo = <?php echo $SecondsAutoSubmit ; ?>;
      ventanaExportar=window.open("formsql.php",'','width=600,height=350');
   </script>
</head>
<body>
<center> 
</center>
</body>
</html>