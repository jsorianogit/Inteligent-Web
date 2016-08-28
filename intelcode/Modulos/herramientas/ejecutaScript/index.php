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
   <form  action="ejecutar.php" method="post" enctype="multipart/form-data">
      <center>
   <table class='enhancedtablerowhover'>
         <caption>Ejecutar Script SQL</caption>
         <tr>
            <th>
               Etiqueta
            </th>
            <th>
               Valor
            </th>
         </tr>
         <tr>
            <td>
               Usuario
            </td>
            <td>
               <input name="usuario" type="text" value="root">
            </td>
         </tr>
         <tr>
            <td>
               Contrasenia
            </td>
            <td>
             <input name="clave" type="password" value="danae">
            </td>
         </tr>
         <tr>
            <td>
               Servidor
            </td>
            <td>
               <input name="host" type="text" value="localhost">
            </td>
         </tr>
         <tr>
            <td>
               Script
            </td>
            <td>
               <input name="archivo" type="file" id="archivo">
         </td>
         </tr>
      </table>
     <p align="center"><input name="boton" type="submit" id="boton" value="Ejecutar"></p>
      </center>
   </form>
</body>
</html>
