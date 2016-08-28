<?php
require ("../../../include/formulario.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";

#reporte diario
if(isset($_REQUEST['reportediario']) AND $_REQUEST['reportediario']!=""){
   $reportediario=$_REQUEST['reportediario'];
   $_SESSION['reportediario']=$reportediario;
   
} 

#obtener las variables pasadas desde la captura del reporte diario
if(isset($_REQUEST['fecha']) AND $_REQUEST['fecha']!=""){
   $fecha=$_REQUEST['fecha'];
   $_SESSION['fecha']=$fecha;
   
} 
if(isset($_SESSION['fecha'])){
   $fecha =$_SESSION['fecha'];
}
//obtener numero de orden  
if(isset($_REQUEST['orden']) AND $_REQUEST['orden']!=""){
   $orden=$_REQUEST['orden'];
   $_SESSION['orden']=$orden;
   
}
if(isset($_SESSION['orden']) and $_SESSION['orden']!=""){
 $orden=$_SESSION['orden'];
}
else{
   if(isset($_POST['selNumeroOrden']) and $_POST['selNumeroOrden']!=""){
       $orden=$_SESSION['orden']=$_POST['selNumeroOrden'];
   }else{
      echo "<center>seleccione un numero de orden:<br>";
      echo "<form name='NumeroOrden' method='post'>";
      echo "<select name='selNumeroOrden' onChange='document.NumeroOrden.submit()'>";
      echo "<option></option>";
      $sql = "select sNumeroOrden from ordenesdetrabajo where sContrato='$sContrato';";
      $rs = mysql_query($sql);
      while($rw = mysql_fetch_array($rs)){
         echo "<option vale='".trim($rw[0])."'>".trim($rw[0])."</option>";
      }
      echo "</select>";
      echo "</form></center>";
   }
}

#Paginar los Resultados
//Contar el total de registros
if (!isset($_REQUEST['pag'])) $pag = 1;
else $pag = $_REQUEST['pag'];

$result = mysql_query("SELECT COUNT(sContrato) FROM firmas WHERE sContrato='$sContrato'  AND sNumeroOrden='$orden'");
list($total) = mysql_fetch_row($result);
$tampag = 10;
$reg1 = ($pag-1) * $tampag;

if(isset($_SESSION['reportediario']) and $_SESSION['reportediario']=="si")
   $sql="SELECT * FROM firmas WHERE sContrato='$sContrato'  AND sNumeroOrden='$orden' order by dIdFecha desc LIMIT $reg1, $tampag"; //and dIdFecha='$fecha'
else
   $sql="SELECT * FROM firmas WHERE sContrato='$sContrato'  AND sNumeroOrden='$orden' order by dIdFecha desc  LIMIT $reg1, $tampag";

$result = mysql_query($sql);
echo "<center><form action='menu.php' methoc='post' name='menu'>";
?>
<input type ="submit" onClick="document.location.href='<?php echo $pathAbsolute ?>intelcode/Modulos/preciounitario/actividadesdiarias/firmantes/menu.php?Operacion=a&sContrato=<?php echo $sContrato ?>&sNumeroOrden=<?php echo $orden ?>&dIdFecha=<?php echo $fecha ?>'" value="Insertar" title="Insertar Registro">
<?php
//echo "<a href='menu.php?Operacion=a' title='Insertar Firmas'><img src='".$PathImagenes."inserta.png' width=50></a>";
if(isset($_SESSION['reportediario']) and $_SESSION['reportediario']=="si"){
   //echo "<a href='../reportediario?' title='Regresa al menu de Captura de Reportes Diario'>[Regresar]</a>";
   ?>
     <input type ="button" onClick="document.location='../reportediario?'" value="Regresar" title="Regresar a Reporte Diario">
   <?php
}
?></form><?php
echo "<br>".paginar($pag, $total, $tampag, "?pag=")."<br>";
echo "<table border=1 class='enhancedtablerowhover'>";
echo "<caption>Firmantes del Dia</caption>";
echo "<tr>";
echo "<th></th>";
echo "<th></th>";
echo "<th>Fecha</th>";
echo "<th>Firmante 1</th>";
echo "<th>Firmante 2</th>";
echo "<th>Firmante 3</th>";
echo "<th>Firmante 4</th>";
echo "<th>Firmante 5</th>";
echo "<th>Firmante 6</th>";
echo "<th>Firmante 7</th>";
echo "<th>Firmante 8</th>";
echo "<th>Firmante 9</th>";
echo "<th>Firmante 10</th>";
echo "</tr>";
while($row = mysql_fetch_array($result)){
   echo "<tr>";
   echo "<td>";
      echo "<a href='menu.php?sContrato=".$row['sContrato']."&sNumeroOrden=".$row['sNumeroOrden']."&dIdFecha=".$row['dIdFecha']."&Operacion=m' title='Modificar el Registro'> <img src='../../../imagenes/editar.png'> </a>";
   echo "</td>";   
   echo "<td>";   
      echo "<a href='borrar.php?sContrato=".$row['sContrato']."&sNumeroOrden=".$row['sNumeroOrden']."&dIdFecha=".$row['dIdFecha']."&Operacion=b' title='Eliminar el Registro'> <img src='../../../imagenes/eliminar.png'> </a>";
   echo "</td>";
   echo "<td>";   
   echo ($row['dIdFecha']=="")?"-":formatoFecha($row['dIdFecha']);
   echo "</td>";  
   echo "<td>";   
   echo ($row['sFirmante1']=="")?"-":$row['sFirmante1'];
   echo "</td>";   
   echo "<td>";   
   echo ($row['sFirmante2']=="")?"-":$row['sFirmante2'];
   echo "</td>";   
   echo "<td>";   
   echo ($row['sFirmante3']=="")?"-":$row['sFirmante3'];
   echo "</td>";   
   echo "<td>";   
   echo ($row['sFirmante4']=="")?"-":$row['sFirmante4'];
   echo "</td>";   
   echo "<td>";   
   echo ($row['sFirmante5']=="")?"-":$row['sFirmante5'];
   echo "</td>";   
   echo "<td>";   
   echo ($row['sFirmante6']=="")?"-":$row['sFirmante6'];
   echo "</td>";   
   echo "<td>";   
   echo ($row['sFirmante7']=="")?"-":$row['sFirmante7'];
   echo "</td>";   
   echo "<td>";   
   echo ($row['sFirmante8']=="")?"-":$row['sFirmante8'];
   echo "</td>";   
   echo "<td>";   
   echo ($row['sFirmante9']=="")?"-":$row['sFirmante9'];
   echo "</td>";   
   echo "<td>";   
   echo ($row['sFirmante10']=="")?"-":$row['sFirmante10'];
   echo "</td>";   
   echo "</tr>";   
}
echo "</table>";   
echo "<br>".paginar($pag, $total, $tampag, "?pag=")."<br>";
?>
