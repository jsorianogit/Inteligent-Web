<?php
session_cache_limiter("must-revalidate"); 
session_start();
?>
<html>
<head>
<?php
require ("../../include/formulario.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
   $valuebutton ="Enviar Consulta";
?>
</head>
<body>
<center>
<p>
<!--<h4>
<font color="#895E34">
Migrar la Informacion de una Base de Datos a Otra Con Estructura Similar.
</font>
</h4>-->
</p>
</center>
<center>
<form action="migrar.php" method="POST">
<table class="enhancedtablerowhover">
<caption>
Migrar la Informacion de una Base de Datos a Otra Con Estructura Similar.
</caption>
<tr><th class="title" colspan = 2><center>Procesar</center></th></tr>
<tr>
   <th>
      Base de Datos Fuente (Contenedora de la Informacion)
   </th>
   <td>
         <input type="text" name="dbFuente"/>
   </td>
</tr>
<tr>
   <th>
      Servidor de Datos Fuente 
   </th>
   <td>
         <input type="text" name="servidorf"/>
  </td>
</tr>
<tr>
   <th>
      Usuario de Datos Fuente 
   </th>
   <td>
         <input type="text" name="usuariof"/>
  </td>
</tr>
<tr>
   <th>
      Contraseña
   </th>
   <td>
         <input type="password" name="passwordf"/>
  </td>
</tr>
<tr>
   <th>
      Base de Datos Destino (Nueva Estructura y Destino de la Informacion)
   </th>
   <td>
         <input type="text" name="dbDestino"/>
  </td>
</tr>
<tr>
   <th>
      Servidor de Datos Destino 
   </th>
   <td>
         <input type="text" name="servidord"/>
  </td>
</tr>
<tr>
   <th>
      Usuario de Datos Destino 
   </th>
   <td>
         <input type="text" name="usuariod"/>
  </td>
</tr>
<tr>
   <th>
      Contraseña
   </th>
   <td>
         <input type="password" name="passwordd"/>
  </td>
</tr>
   <tr>
      <td colspan=2>
         <center>
               <input type="submit" value ="aceptar"/>
         </center>  
      </td>
</tr>
</table>
</form>
</center>
</body>
</html>