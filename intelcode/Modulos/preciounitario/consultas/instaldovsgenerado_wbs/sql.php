<?php
require ("../../../include/mysql.inc.php");
 $sql = "SELECT a.sContrato,a.sWbs,a.sNumeroActividad,b.dIdFecha,b.sNumeroOrden ,b.dCantidad as bdCantidad,e.dCantidad as edCantidad
        FROM actividadesxanexo a 
        INNER JOIN bitacoradeactividades b ON (a.sContrato=b.sContrato AND a.sNumeroActividad=b.sNumeroActividad AND a.sWbs=b.sWbs)
        INNER JOIN estimacionxpartida e ON (a.sContrato=e.sContrato AND a.sNumeroActividad=e.sNumeroActividad AND a.sWbs=e.sWbs) 
        WHERE a.sContrato='428237808' 
        AND a.sIdConvenio='$sIdConvenioAct' 
        AND b.sWbs=e.sWbs 
        AND b.sNumeroOrden=e.sNumeroOrden
        AND b.sIdTipoMovimiento<>'A'
        ORDER BY b.dIdFecha DESC";

$result = mysql_query($sql);
echo "<table cellspalding=2 border=2><tr>";
echo "<th>Fecha</td>";
echo "<th>Numero de Actividad</th>";
echo "<th>Wbs</th>";
echo "<th>Numero de Orden</th>";
echo "<th>Cantidad Instalada</th>";
echo "<th>Cantidad Generada</th>";
echo "<th>Por Generar</th>";
echo "<th>Por Instalar</th>";
echo "</tr>";
while($row = mysql_fetch_array($result)){
   echo "<tr>";
   echo "<td>".$row['dIdFecha']."</td>";
   echo "<td>".$row['sNumeroActividad']."</td>";
   echo "<td>".$row['sWbs']."</td>";
   echo "<td>".$row['sNumeroOrden']."</td>";
   echo "<td>".$row['bdCantidad']."</td>";
   echo "<td>".$row['edCantidad']."</td>";
   echo "<td>".(($row['bdCantidad']>$row['edCantidad'])?($row['bdCantidad']-$row['edCantidad']):"0")."</td>";
   echo "<td>".(($row['bdCantidad']<$row['edCantidad'])?($row['edCantidad']-$row['bdCantidad']):"0")."</td>";
   echo "</tr>";
}
   echo "</table>";
?>