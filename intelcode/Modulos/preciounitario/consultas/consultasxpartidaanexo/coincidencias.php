<?php session_start();?>
<html>
   <head>
      <style type='text/css'>@import 'estilo1.css';</style>
     <!-- <script language="javascript" src="../../estilos/domtableenhance.js"></script>-->
      <!-- <link rel="stylesheet" href="../../estilos/emx_nav_left.css" type="text/css" />-->
      <title></title>
   </head>

   <center>
<?php
require ("../../../include/formulario.inc.php");
function tipoAlcance($sTipoAlcance,$sContrato,$dIdFecha,$dIdDiario){
    $sql = "SELECT sTipoAlcance FROM  configuracion WHERE sContrato='$sContrato'";
    $result = mysql_query($sql);
    if($row = mysql_fetch_array($result)){
     if($row[0]==$sTipoAlcance){
      $sql ="Select a.sDescripcion From bitacoradealcances b INNER JOIN alcancesxactividad a ON (b.sContrato = a.sContrato And b.sNumeroActividad = a.sNumeroActividad And b.iFase = a.iFase) Where b.sContrato = '$sContrato' And b.dIdFecha = '$dIdFecha' And b.iIdDiario = '$dIdDiario'";
      $r = mysql_query($sql);
      if($row = mysql_fetch_array($r)){
          return $row['sDescripcion'];
      }
   }
   else{
      return  "Volumen de Obra";
   }
   }
}
$sNumeroOrden = $_REQUEST['sNumeroOrden'];
$sContrato = $_REQUEST['sContrato'];
$sWbs = $_REQUEST['sWbs'];
$sNumeroActividad = $_REQUEST['sNumeroActividad'];
?>
<table cellspacing="10" border =2>
<tr><td>
<?php
if($_SESSION['database']=="intelcode")$paquete="sWbs";
else $paquete ="sPaquete";

$sql = "select   b.sContrato, b.dIdFecha, b.iIdDiario, b.sIdTurno, b.sNumeroOrden,   b.$paquete, b.sNumeroActividad, b.dCantidad,
 b.dAvance, b.sIdTipoMovimiento, b.lAlcance, r.sNumeroReporte, r.sIdConvenio, tu.sOrigenTierra, tu.sDescripcion as sDescripcionTurno,
r.lStatus 
from   bitacoradeactividades b INNER JOIN reportediario r 
ON (r.sContrato = b.sContrato And r.sNumeroOrden = b.sNumeroOrden And r.dIdFecha = b.dIdFecha And r.sIdTurno = b.sIdTurno) 
INNER JOIN  turnos tu ON (r.sContrato = tu.sContrato And r.sIdTurno = tu.sIdTurno) 
Where  b.sContrato = '$sContrato' and b.sNumeroOrden =  '$sNumeroOrden' and b.$paquete = '$sWbs' 
and b.sNumeroActividad= '$sNumeroActividad ' Order By   b.dIdFecha, b.iIdDiario asc";

$result = mysql_query($sql) ;
print ("<table class='enhancedtablerowhover'>");
//print ("<caption>Coincidencias en contradas en los siguientes reportes diarios</caption>");
   print ("<thead><tr>");
   print ("<th class='title' colspan = 10 align=center>Coincidencias en contradas en los siguientes reportes diarios</th></tr>");
   print ("<th><font color='#D58000'>Fecha</th>");
   print ("<th><font color='#D58000'>Id</th>");
   print ("<th><font color='#D58000'>Turno</th>");
   print ("<th><font color='#D58000'>Descripcion</th>");
   print ("<th><font color='#D58000'>Cantidad</th>");
   print ("<th><font color='#D58000'>Avance</th>");  
 /*  for ($i=0;$i<mysql_num_fields($result);$i++)
         print ("<td>".mysql_field_name($result,$i)."</td>");  */
   print ("</tr></thead><tbody>");
while ($row = mysql_fetch_array($result)){
   $des=tipoAlcance($row['sIdTipoMovimiento'],$row['sContrato'],$row['dIdFecha'],$row['iIdDiario']);
   print ("<tr>");
   print ("<td><a 
href='../../../../Acceso/scripts/php/Reportes/generadores/rptReporteDiario.php?sContrato=".$row['sContrato']."&sNumeroOrden=".$row['sNumeroOrden']."&dFecha=".$row['dIdFecha']."&sIdTurno=".$row['sIdTurno']."&sIdConvenio=".$row['sIdConvenio']."&lStatus=".$row['lStatus']."' 
target=_blank>");
   print ("".$row['dIdFecha']."</a></td>");  
   print ("<td>".$row['iIdDiario']."</td>"); 
   print ("<td>".$row['sDescripcionTurno']."</td>"); 
   print ("<td>".$des."</td>"); 
   print ("<td>".$row['dCantidad']."</td>"); 
   print ("<td>".$row['dAvance']."</td>"); 
   print ("</tr>");

/*   print ("<tr>");
   for ($i=0;$i<mysql_num_fields($result);$i++)
         print ("<td>".$row[$i]."</td>");  
   print ("</tr>");*/
}
print ("</tbody></table>");

?>
</td>
<td>

   <table class="tablas">
      <tr>
      
         <th class="title" colspan=2>
            Concepto/Partida Seleccionado
         </th>
      </tr>      
      <tr>
      
         <th ><font color='#D58000'>
            Wbs : 
         </th>
         <td>
            <?php echo $sWbs ?>
         </td>
      </tr>
      <tr>
         <th><font color='#D58000'>
            Numero de Actividad : 
         </th>
         <td>
            <?php echo $sNumeroActividad ?>
         </td>
      </tr>

   </table>
</td>
</tr>
</table>

</body>
</html>
