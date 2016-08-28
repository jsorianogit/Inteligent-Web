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
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
   $valuebutton ="Enviar Consulta";
?>
</head>
<body>
<center>
<table class="enhancedtablerowhover">
<tr><th class="title" colspan = 2><center><h3>Importar Anexos</h3></center></th></tr>
<tr>
   <th>
      Anexo C
   </th>
   <td>
      <form action="importaranexoc.php" method="POST" target="_self" enctype="multipart/form-data">
         <input type="file" accept="xls" name="excelfile" size="20" />
         <input type="submit" value ="<?php echo $valuebutton ?>" >
      </form>
   </td>
</tr>
<tr>
   <th>
      Anexo DT
   </th>
   <td>
      <form action="importaranexodt.php" method="POST" target="_self" enctype="multipart/form-data">
         <input type="file" accept="xls" name="excelfile" size="20" />
         <input type="button" value ="<?php echo $valuebutton ?>" onclick='javascript:alert("En Construccion")'>
      </form>
   </td>
</tr>
<tr>
   <th>
      Anexo De MN
   </th>
   <td>
      <form action="importaranexomn.php" method="POST" target="_self" enctype="multipart/form-data">
         <input type="file" accept="xls" name="excelfile" size="20" />
         <input type="button" value ="<?php echo $valuebutton ?>" onclick='javascript:alert("En Construccion")'>
      </form>
   </td>
</tr>
<tr>
   <th>
      Anexo De DLL
   </th>
   <td>
      <form action="importaranexodll.php" method="POST" target="_self" enctype="multipart/form-data">
         <input type="file" accept="xls" name="excelfile" size="20" />
         <input type="button" value ="<?php echo $valuebutton ?>" onclick='javascript:alert("En Construccion")'>
      </form>
   </td>
</tr>
<tr>
   <th>
      Programa de Trabajo
   </th>
   <td>
      <form action="importarprogramatrabajo.php" method="POST" target="_self" enctype="multipart/form-data">
         <input type="file" accept="xls" name="excelfile" size="20" />
         <input type="button" value ="<?php echo $valuebutton ?>" onclick='javascript:alert("En Construccion")'>
      </form>
   </td>
</tr>
<tr>
   <th>
      Anexo "A"
   </th>
   <td>
      <form action="importaranexoa.php" method="POST" target="_self" enctype="multipart/form-data">
         <input type="file" accept="xls" name="excelfile" size="20" />
         <input type="button" value ="<?php echo $valuebutton ?>" onclick='javascript:alert("En Construccion")'>
      </form>
   </td>
</tr>
<tr>
   <th>
      Actualiza Desc. Anexo
   </th>
   <td>
      <form action="importardesanexo.php" method="POST" target="_self" enctype="multipart/form-data">
         <input type="file" accept="xls" name="excelfile" size="20" />
         <input type="button" value ="<?php echo $valuebutton ?>" onclick='javascript:alert("En Construccion")'>
      </form>
   </td>
</tr>
</table>
</center>
</body>
</html>