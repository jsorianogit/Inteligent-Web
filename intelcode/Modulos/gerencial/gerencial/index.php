<?php
session_start();
session_cache_limiter("must-revalidate"); 
?>
<html>
<head>
<?php
require ("../../include/formulario.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
//get MontoProgramado
function montoProgramado($sContrato,$sNumeroOrden,$sIdConvenio,$dIdFecha,$sWbs){
$sql ="  Select sum(a.dVentaMN * e.dCantidad) as dMontoMN 
         From distribuciondeactividades e 
         INNER JOIN actividadesxorden a 
         ON (e.sContrato = a.sContrato And a.sIdConvenio = e.sIdConvenio And a.sNumeroOrden = e.sNumeroOrden And e.sWbs = a.sWbs and e.sNumeroActividad = a.sNumeroActividad) 
         Where e.sContrato = '$sContrato' And e.sNumeroOrden =  '$sNumeroOrden' And e.sIdConvenio = '$sIdConvenio' And e.dIdFecha <= '$dIdFecha' And e.sWbs Like '$sWbs.%' Group By e.sContrato";
   $result = mysql_query ($sql);
   if($row = mysql_fetch_array($result)){
    return $row[0];
   }
   else {
       return "0";
   }

}
//get MontoReal
function montoReal($sContrato,$sNumeroOrden,$sIdConvenio,$dIdFecha,$sWbs){
$sql =" Select sum(a.dVentaMN * e.dCantidad) as dMontoMN From estimacionxpartida e INNER JOIN actividadesxorden a ON (e.sContrato = a.sContrato And a.sIdConvenio = '$sIdConvenio' And a.sNumeroOrden = e.sNumeroOrden And e.sWbs = a.sWbs and e.sNumeroActividad = a.sNumeroActividad)INNER JOIN estimaciones e2 ON (e.sContrato = e2.sContrato And e.sNumeroOrden = e2.sNumeroOrden And e.sNumeroGenerador = e2.sNumeroGenerador And e2.dFechaFinal <= '$dIdFecha' And e2.lStatus = 'Autorizado') Where e.sContrato = '$sContrato' And e2.sNumeroOrden =  '$sNumeroOrden' And e.sWbs Like '$sWbs.%' Group By e.sContrato";
   $result = mysql_query ($sql);
   if($row = mysql_fetch_array($result)){
      return $row[0];
   }
   else {
       return "0";
   }
}
//get Avance Programado
function avanceProgramado($sContrato,$sNumeroOrden,$sIdConvenio,$dIdFecha,$sWbs){
$sql =" Select Sum(dPonderadoDiario) as dPonderadoGlobal From avancesxactividad Where sContrato = '$sContrato' And sIdConvenio = '$sIdConvenio' And sNumeroOrden =  '$sNumeroOrden' And sWbs = '$sWbs' And dIdFecha <= '$dIdFecha' Group By sContrato";
   $result = mysql_query ($sql);
   if($row = mysql_fetch_array($result)){
    return $row[0];
   }
   else {
       return "0";
   }

}
//get Avence Real
function avanceReal($sContrato,$sNumeroOrden,$sIdConvenio,$dIdFecha,$sWbs){
$sql ="Select Sum(dAvance) as dAvanceGlobal From bitacoradepaquetes Where sContrato ='$sContrato' And sIdConvenio = '$sIdConvenio' And sNumeroOrden = '$sNumeroOrden' And sWbs Like '$sWbs' And dIdFecha <= '$dIdFecha' Group By sContrato";
   $result = mysql_query ($sql);
   if($row = mysql_fetch_array($result)){
    return $row[0];
   }
   else {
       return "0";
   }

}

?>
</head>
<body>
<form action = "<?php echo $PHP_SELF?>" method="post" name="form1">
Contrato
   <?php
      //catch the order number
      if(isset($_POST['sNumeroOrden']))
         $sNumeroOrden = $_POST['sNumeroOrden'];
      //catch date
      if(isset($_POST['fecha']))
         $fecha = $_POST['fecha'];
      //catch contrato
      if(isset($_POST['Contrato']))
         $Contrato = $_POST['Contrato'];      

      //listar contratos
      $sql = "SELECT sContrato from contratosxusuario WHERE sIdUsuario ='".$_SESSION['ssUsuario']."'";
      $result = mysql_query($sql);
      print ("<select name='Contrato' onchange='document.form1.submit();'>");
      print ("<option></option>");
      while($row=mysql_fetch_array($result)){
         $selecionado = ($Contrato == $row['sContrato']) ? "selected" : "";
         print("<option $selecionado >".$row['sContrato']."</option>");
      }
      print ("</select>");
?>
Numero de Orden
<?php
      //listar numeros de ordenes
      $sql = "SELECT sNumeroOrden from ordenesdetrabajo WHERE sContrato ='$Contrato'";
      $result = mysql_query($sql);
      print ("<select name='sNumeroOrden'>");
   //   print ("<option></option>");
      while($row=mysql_fetch_array($result)){
         $selecionado = ($sNumeroOrden == $row['sNumeroOrden']) ? "selected" : "";
         print("<option $selecionado >".$row['sNumeroOrden']."</option>");
      }
      print ("</select>");
?>
Fecha
<label for='fecha'>
	<?php
		 $fech = ($fecha==""?date('Y/m/d'):$fecha);
   ?>
   <input class='fecha rang100' id='fecha' type='text' value='<?php echo $fech ?>'onKeyPress='return solonumeros(event);' name='fecha'>
</label>


<input type="submit" value = "Aceptar"/>

</form>
<center>
<?php

//obtener el numero de orden
$sql="SELECT c.sIdConvenio FROM configuracion c INNER JOIN convenios c2 ON (c.sContrato=c2.sContrato AND c.sIdConvenio=c2.sIdConvenio) WHERE c.sContrato='$Contrato'";
$resultado=mysql_query($sql,$link);
if($row=mysql_fetch_array($resultado)){
	$sIdConvenio=$row['sIdConvenio'];
}


$sql = "select	sWbs,sNumeroActividad,dFechaInicio,dFechaFinal,dPonderado,dVentaMN,iNivel  from actividadesxorden where sContrato ='$Contrato' and sNumeroOrden ='$sNumeroOrden' and sTipoActividad='Paquete' and sIdConvenio = '$sIdConvenio' order by iItemOrden,sNumeroActividad";
   $result = mysql_query($sql);
   print ("<table class='enhancedtablerowhover'>");
   print ("<tr>");
      print ("<th>Wbs</th>");
      print ("<th>Concepto</th>");
      print ("<th>Inicio</th>");
      print ("<th>Termino</th>");
      print ("<th>%</th>"); 
      print ("<th>$ MN</th>");
      print ("<th>$ Programado</th>");
      print ("<th>$ Ejecutado</th>");
      print ("<th>% Programado</th>");
      print ("<th>% Fisico</th>");
      print ("</tr>");
   while ($row = mysql_fetch_array($result)){
      print ("<tr>");
      for ($i=0 ; $i<mysql_num_fields($result)-2; $i++){
          if ($i == 0){
             // $nivel = explode(".", $row[$i]);
             $numnivel = $row[6];//count ($nivel);
             $espacios = ($numnivel) * 4;
             $tam = strlen($row[$i]);
             $row[$i] = str_pad($row[$i], $espacios+$tam, " ", STR_PAD_LEFT); //alt + 255 ->caracter en blanco
         }
          print ("<td>");
          print ($row[$i]);
          print ("</td>");
      }
      print ("<td>");
      print ("$ ".number_format($row[5],4));
      print ("</td>");
      print ("<td>");
      print ("$ ".number_format(montoProgramado($sContrato,$sNumeroOrden,$sIdConvenio,$fecha,$row['sWbs']),4));
      print ("</td>");
      print ("<td>");
      print ("$ ".number_format(montoReal($sContrato,$sNumeroOrden,$sIdConvenio,$fecha,$row['sWbs']),4));
      print ("</td>");
      print ("<td>");
      print (number_format(avanceProgramado($sContrato,$sNumeroOrden,$sIdConvenio,$fecha,$row['sWbs']),4)."  %");
      print ("</td>");
      print ("<td>");
      print (number_format(avanceReal($sContrato,$sNumeroOrden,$sIdConvenio,$fecha,$row['sWbs']  ),4)."  %");
      print ("</td>");
      print ("</tr>");
   }
   print "</table>";
mysql_close();
?>
</body>
</html>
