<?php
session_cache_limiter("must-revalidate"); 
session_start();
require ("../../include/formulario.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
<html>
<head>
<center>
 <!--target="_blank"-->
<form action="contrato.php" method="POST">
<table border=1 class='enhancedtablerowhover'>
<thead>
<caption>
   Exportar Contrato
</caption>
<tr>
   <th>
      <center>
         Tipo de Exportacion
      </center>
   </th>
</tr>
</thead>
<tbody>
<tr>
   <td>
      <ul>
         <li>Contrato
         	<?php 
         		$result = mysql_query("select sContrato from contratosxusuario where sIdUsuario ='".$_SESSION['ssUsuario']."'");
         		echo "<select name='contrato'>";
         		while($row=mysql_fetch_array($result)){
					echo "<option value='$row[0]'>$row[0]</option>";
				}
				echo "</select>";
         	?>
            
         </li>
         <li>
            <input type="radio" value="contrato" align="LEFT" checked="checked" name="exportar"/>
            Convenio Actual del Contrato
         </li>
         <li>
            <input type="radio" value="db" align="LEFT" name="exportar"/>
            Todos los Convenios del contrato
         </li>
      </ul>
      </ul>
   </td>
</tr>
</tbody>
<tr>
   <th>
      <center>
      <input type="submit" value="Aceptar" />
      </center>
   </th>
</tr>
</table>
</form>
</center>
</body>
</html>