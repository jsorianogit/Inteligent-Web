<?php session_start();?>
<html>
   <head>
   <script src="../../../../ActiveWidgets/runtime/lib/aw.js"></script>
   <link href="../../../../ActiveWidgets/runtime/styles/xp/aw.css" rel="stylesheet"></link>
      <!-- grid format -->
      <!-- 
      
      width: 30%; 
	-->
	<style>
      .aw-column-0 {width:  170px;}
      .aw-column-1 {width: 100px;text-align:right;}
      .aw-column-2 {text-align: right;}
      .aw-grid-row {border-bottom: 1px solid threedlightshadow;}
	</style>
      <style type='text/css'>@import 'estilo1.css';</style>
      <script language="javascript" src="../../../estilos/domtableenhance.js"></script>
      <link rel="stylesheet" href="../../../estilos/emx_nav_left.css" type="text/css" />
      <title></title>
   </head>
   <body onload="document.formulario.actividad.focus();">
<table border=3 >
<tr>
<td style="vertical-align: top" width="30%">
<table>
<form name = "formulario" action="<?php echo $PHP_SELF?>" method="post">
   <tr>
      <th><font color='#D58000'>
         Numero de partida
      </th>
      <td>
         <input type = "text" name = "actividad" value = "" />
      </td>
   </tr>
</form>
</table>
</td>
</tr>
<tr>
<td style="vertical-align: left"  width="100% " >
<?php
//$_SESSION['ssUsuario']='IMOLINA';
//$_SESSION['ssContrasena']='DANAE';
require ("../../../include/formulario.inc.php");
//$sContrato ='425026939';
$sIdConvenio='';
$actividad = $_POST['actividad'];
//obtener el numero de orden
$sql="SELECT c.sIdConvenio,c2.dFechaInicio,c2.dFechaFinal,c2.dMontoMN FROM configuracion c INNER JOIN convenios c2 ON (c.sContrato=c2.sContrato AND c.sIdConvenio=c2.sIdConvenio) WHERE c.sContrato='$sContrato'";
$resultado=mysql_query($sql,$link);
if($row=mysql_fetch_array($resultado)){
   $sIdConvenio=$row['sIdConvenio'];
}

//visualizaciones
$sql="SELECT a2.iFase, a2.dAvance AS dPonderado, a2.sDescripcion, Sum(b.dCantidad) AS dCantidad  
      FROM alcancesxactividad a2
      LEFT JOIN bitacoradealcances b 
      ON (b.sContrato = a2.sContrato AND b.sNumeroActividad = a2.sNumeroActividad AND b.iFase = a2.iFase) 
      WHERE a2.sContrato = '$sContrato' And a2.sNumeroActividad = '$actividad' Group By a2.iFase";
$result = mysql_query($sql);
/*print ("<table class='enhancedtablerowhover'>");
   print ("<thead><tr>");
   print ("<th>Fase</th>");
   print ("<th>%</th>");
   print ("<th>Cantidad</th>");
   print ("</tr></thead><tbody>");
while ($row = mysql_fetch_array($result)){
   print ("<tr>");
   print ("<td>$row[2]</td>");
   print ("<td>$row[1]</td>");
   print ("<td>$row[3]</td>");
   print ("</tr>");
}
print ("</tbody></table>");*/
?>
   <style>
      .aw-grid-control {height: 100;  width: 400; margin: 0px; border: 2; font: menu;}
      .aw-row-selector {text-align: center}

   </style>
<script>
    var myCells = [
    <?php
    while ($row = mysql_fetch_array($result))
      print ("['".$row[2]."','".$row[1]." %','".$row[3]."'],");
    ?>
    ];

    var myHeaders = ["Fase", "%", "Cantidad"];

    // create grid object
    var grid = new AW.UI.Grid;
    
    // enable row selectors
    grid.setSelectorVisible(true);
    grid.setSelectorText(function(i){return this.getRowPosition(i)+1});
    // set headers width/height
    grid.setSelectorWidth(20);
    grid.setHeaderHeight(20);
    // assign cells and headers text
    grid.setCellText(myCells);
    grid.setHeaderText(myHeaders);
    // Use setControlLink(url) method.
    // set number of columns/rows
    grid.setColumnCount(3);
    grid.setRowCount(<?php echo mysql_num_rows($result) ?>);

    // write grid to the page
    
    document.write(grid);

</script>
</td>
<td>
<span id="myGrid"></span>

<?php
if($_SESSION['database']=="intelcode")$paquete ="and sTipoActividad='Actividad'";
else $paquete ="";
$sql ="
select 
   dPonderado,sMedida,dVentaMN,dCostoMN,sWbs,dCantidadAnexo,dInstalado,
   dExcedente,(dCantidadAnexo-dInstalado) as dPendiente
from actividadesxanexo
where
   sContrato='$sContrato'
   and sIdConvenio='$sIdConvenio'
   and sNumeroActividad='$actividad'
   $spaquete;";

//         and sTipoActividad ='Actividad'";
$result=mysql_query($sql);
$row = mysql_fetch_array($result);
print ("<table class='enhancedtablerowhover'>");
//print ("<caption>Actividad Anexo</caption>");
   print ("<thead><tr>");
   print ("<tr><th colspan='4'><center>Actividad Anexo</center></th></tr>\n");
   print ("<tr>\n");
      
    print ("<th><font color='#D58000'>Ponderado</th>\n");
    print ("<td><input type='text' value='".$row['dPonderado']."' readonly></td>\n");
    
    print ("<th><font color='#D58000'>Cant. Anexo</font></th>\n");
    print ("<td><input type='text' value='".$row['dCantidadAnexo']."' readonly></td>\n");
    
    print ("</tr>\n");
   
    print ("<tr>\n");
   
    print ("<th><font color='#D58000'>Medida</font></th>\n");
    print ("<td><input type='text' value='".$row['sMedida']."' readonly></td>\n");
    
    print ("<th><font color='#D58000'>Instalado</font></th>\n");
    print ("<td><input type='text' value='".$row['dInstalado']."' readonly></td>\n");
    
   print ("</tr>\n");
   
   print ("<tr>\n");
   
    print ("<th><font color='#D58000'>Precio MN</font></th>\n");
    print ("<td><input type='text' value='$ ".number_format($row['dVentaMN'],2,'.',',')."' readonly></td>\n");

    print ("<th><font color='#D58000'>Pendiente</font></th>\n");
    print ("<td><input type='text' value='".$row['dPendiente']."' readonly></td>\n");      
    
   print ("</tr>\n");
   
   print ("<tr>\n");
   
    print ("<th><font color='#D58000'>WBS</font></th>\n");
    print ("<td><input type='text' value='".$row['sWbs']."' readonly></td>\n");
    
    print ("<th><font color='#D58000'>Excedente</font></th>\n");
    print ("<td><input type='text' value='".$row['dExcedente']."' readonly></td>\n");
    
   print ("</tr>\n");
   

print ("</table>");


?>
<!--
   <style>
      .aw-grid-control {height: 100; width: 400   ; margin: 0px; border: none; font: menu;}
      .aw-row-selector {text-align: center}

      
   </style>
<script>
    var myCells = [
    <?php
    while ($row = mysql_fetch_array($result))
      print ("['".$row['sIdConvenio']."' ,  '".$row['sNumeroActividad']."' ,'".$row['dPonderado']."' , '".$row['sMedida']."'],");
    ?>
    ];

    var myHeaders = ["Convenio", "Numero de Actividad", "Ponderado","Medida"];

    // create grid object
    var grid = new AW.UI.Grid;
    
    //   enable row selectors
    grid.setSelectorVisible(true);
    grid.setSelectorText(function(i){return this.getRowPosition(i)+1});
    //   set headers width/height
    grid.setSelectorWidth(20);
    grid.setHeaderHeight(20);
    // assign cells and headers text
    grid.setCellText(myCells);
    grid.setHeaderText(myHeaders);
    // Use setControlLink(url) method.
    grid.setControlLink("http://www.google.com");
    // set number of columns/rows
    grid.setColumnCount(4);
    grid.setRowCount(<?php echo mysql_num_rows($result) ?>);

    // write grid to the page
    
    document.write(grid);

</script>
-->
</td>
</tr>
<tr >
<td colspan=2 align="justify" width="100% ">
<?php
//
if($_SESSION['database']=="intelcode"){
   $paquete ="sWbs";
   $medida =",sMedida";
   $venta =",dVentaMN";
}
else {
   $paquete ="sPaquete";
   $medida ="";
   $venta ="";
}  

$sql = "Select
  a.sNumeroOrden,
  a.sWbs,
  a.sWbsAnterior,
  a.sNumeroActividad,
  (select concat(substring(a2.mDescripcion,1,30),'...') from actividadesxorden a2 where a2.sContrato ='$sContrato' And a2.sIdConvenio='$sIdConvenio'  and a2.sWbs=a.sWbsAnterior and a2.sTipoActividad='Paquete' limit 1) as mDescripcion,
  concat(substring(a.mDescripcion,1,30),'...') as mDesActiviad,
  a.sMedida,
  a.dCantidad ,
  a.dVentaMN,
  a.dFechaInicio,
  a.dFechaFinal,
  a.dInstalado,
  a.dExcedente,
  a.dPonderado
From
  actividadesxorden a
Where
  a.sContrato = '$sContrato'
  And a.sIdConvenio = '$sIdConvenio' 
  and a.sNumeroActividad = '$actividad'
  and a.sTipoActividad='Actividad'
order by a.sNumeroOrden, a.iItemOrden;";

$result = mysql_query($sql);
echo "<center>";
//print("<script>parent.coincidencias.location.reload();</script>");
print("<script>parent.coincidencias.location.href='coincidencias.php?0=0'</script>");
print ("<table class='enhancedtablerowhover'>");
//print ("<caption>Concepto / Partida x Ordendes de Trabajo</caption>");
   print ("<thead><tr>");
   print ("<th class='title' colspan = 10 align=center>Concepto / Partida x Ordendes de Trabajo</th></tr>");
   print ("<tr><th><font color='#D58000'>Orden</th>");
   print ("<th><font color='#D58000'>Wbs</th>");
   print ("<th><font color='#D58000'>Descripcion</th>");
   print ("<th><font color='#D58000'>Actividad</th>");	
   print ("<th><font color='#D58000'>Cantidad</th>");
   if($_SESSION['database']=="intelcode"){
     print ("<th><font color='#D58000'>Um</th>");
     print ("<th><font color='#D58000'>Pu</th>");
  }//
   print ("<th><font color='#D58000'>Instalado</th>");
   print ("<th><font color='#D58000'>Pendiente</th>");
   print ("<th><font color='#D58000'>Exedente</th>");
   print ("<th><font color='#D58000'>Ponderado</th>");
   print ("</tr></thead><tbody>");
   $k=0;
while ($row = mysql_fetch_array($result)){
   if($k==0){
      print ("<script>
         parent.coincidencias.location.href='coincidencias.php?sNumeroOrden=".$row['sNumeroOrden']."&sWbs=$row[1]&sNumeroActividad=$row[sNumeroActividad]&sContrato=$sContrato';
       </script>");//   parent.coincidencias.location.reload();
   }
   $k++;
   print ("<tr>");
   $pendiente = $row['dCantidad'] - $row['dInstalado'];
   print ("<td>".$row['sNumeroOrden']."</td>");
   print ("<td><a href = 
'coincidencias.php?sNumeroOrden=$row[sNumeroOrden]&sWbs=$row[1]&sNumeroActividad=$row[sNumeroActividad]&sContrato=$sContrato' 
target='coincidencias'>".$row[1]."</td></a>");
 //  print ("<td>".substr($row['mDescripcion'], 1,50).(strlen($row['mDescripcion'])>50 ?"...":"")."</td>");
   print ("<td>".$row['mDescripcion']."</td>");
   print ("<td>".$row['mDesActiviad']."</td>");   
   print ("<td>".$row['dCantidad']."</td>");
   if($_SESSION['database']=="intelcode") {
   print ("<td>".$row['sMedida']."</td>");
      print ("<td>$ ".number_format($row['dVentaMN'],2,'.',',')."</td>");
  }
   print ("<td>".$row['dInstalado']."</td>");
   print ("<td>".($pendiente)."</td>");
   print ("<td>".$row['dExcedente']."</td>");
   print ("<td>".$row['dPonderado']." %</td>");
   print ("</tr>");
}
print ("</tbody></table>");
echo "</center>";
mysql_close($link);
?>
</td>
</tr>
</table>
   </body>
</head>
