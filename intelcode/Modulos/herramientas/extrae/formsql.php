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
   <script>
      function enviar(){
         opener.document.write("<center>");
         opener.document.write("<font size='10'>");
         opener.document.write("\nSe ha procesado la informacion\n");
         opener.document.write("Cierre esta ventana\n");
         opener.document.write("</font>");
         opener.document.write("</center>");
         opener.document.close();
         document.sql.submit();
      }
      function restar(){
         window.setTimeout("restar();",1000);
         var actual = document.sql.segundos.value ;
         document.sql.segundos.value = actual-1;
      }
      window.setTimeout("restar();",1000);
      window.setTimeout("enviar();",<?php echo $SecondsAutoSubmit ; ?>);   
      
   </script>
</head>
<body>
<center>
<form name="sql" action="contrato.php" method="POST" >
<table border=1>
<thead>
<tr>
   <th>
      Crear Archivos SQL's
   </th>
</tr>
</thead>
<tbody>
<tr>
   <td>
      <ul>
         <li>Database
         	<?php 
         		$result = mysql_query("show databases like 'intel%'");
         		echo "<select name='database'>";
         		echo "<option value='' selected></option>";
         		while($row=mysql_fetch_array($result)){
					echo "<option value='$row[0]'>$row[0]</option>";
				}
				echo "</select>";
         	?>
            
         </li>
         <li>Contrato
         	<?php 
         		$result = mysql_query("select sContrato from contratosxusuario where sIdUsuario ='".$_SESSION['ssUsuario']."'");
         		echo "<select name='contrato'>";
         		echo "<option value='' selected></option>";
         		while($row=mysql_fetch_array($result)){
					echo "<option value='$row[0]'>$row[0]</option>";
				}
				echo "</select>";
         	?>
            
         </li>
         <li>
            <?php
                 $nueva = mktime(0,0,0,date('m'),date('d')-$defaultDaysPost,date('Y'));
                 $nuevafecha=date("Y-m-d",$nueva);
            ?>
	        	<label for="dIdFecha">
			      <input class="fecha rang100" type="text" id="dIdFecha" name="fecha" value="<?php echo  $nuevafecha?>">
	        	</label>
         </li>
      </ul>
      </ul>
   </td>
</tr>
</tbody>
<tr>
   <th>
      <input type="submit" value="Aceptar" />
   </th>
</tr>
<tr>
<td>
Enviar Formulario en :
 <input type="text" name = "segundos" value = "<?php echo $SecondsAutoSubmit/1000 ; ?> " readonly size = 10>
 Segundos
</td>
</tr>

</table>
</form>

</center>
</body>
</html>