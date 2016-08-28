<?php 
session_start();
//$_SESSION['ssUsuario']="imolina";
//$_SESSION['ssContrasena']="danae";
$anyo = $_POST['anyo'];
$mes = $_POST['mes'];
$odenar= $_POST['ordenar'];
$info = $_POST['info'];
?>
<html>
<head>
<body>

<?php
function NombreMes($numMes){
 switch($numMes){
    case ('01'):return "Enero";break;
    case ('02'):return "Febrero";break;
    case ('03'):return "Marzo";break;
    case ('04'):return "Abril";break;
    case ('05'):return "Mayo";break;
    case ('06'):return "Junio";break;
    case ('07'):return "Julio";break;
    case ('08'):return "Agosto";break;
    case ('09'):return "Septiembre";break;
    case ('10'):return "Octubre";break;
    case ('11'):return "Noviembre";break;
    case ('12'):return "Diciembre";break;

}
    
}
if (isset($_SESSION['ssContrato']))
   $sContrato = $_SESSION['ssContrato'];
$ultimodia = mktime(0, 0, 0, $mes+1, 0, 2000);
$diaultimo = strftime("%d", $ultimodia);
$arraySuma[]=0;
require ("../../../include/formulario.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
if($mes < 10)
   $mes = "0$mes";
$FechaInicio = "$anyo-$mes-01";
$FechaFinal = "$anyo-$mes-$diaultimo";
//$sContrato = '425026939';
//$status='p';
$sql = "select cStatusProceso from configuracion where sContrato ='$sContrato'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
    $status = $row['cStatusProceso'];
}
if ($ordenar == 'Si'){
   if ($info == 'volumenes')
     $sql = "Select a.sContrato, a.iItemOrden, a.sIdPersonal, a.sDescripcion, a.sMedida, a.dVentaMN, a.dCostoMN, bp.dIdFecha, Sum(bp.dCantidad) as dCantidad from personal a inner join bitacoradepersonal bp on (a.sContrato = bp.sContrato And a.sIdPersonal = bp.sIdPersonal and (bp.dIdFecha >= '$FechaInicio' and bp.dIdFecha <= '$FechaFinal')) inner join bitacoradeactividades b ON (b.sContrato = bp.sContrato and b.dIdFecha = bp.dIdFecha And b.iIdDiario = bp.iIdDiario) inner join ordenesdetrabajo o ON (b.sContrato = o.sContrato and b.sNumeroOrden = o.sNumeroOrden And o.cIdStatus = '$status') INNER JOIN turnos t ON (b.sContrato = t.sContrato and b.sIdTurno = t.sIdTurno and t.sOrigenTierra = 'No')  Where a.sContrato = '$sContrato' Group By bp.sContrato, bp.sIdPersonal, bp.dIdFecha Order By a.iItemOrden, bp.sIdPersonal, bp.dIdFecha";
else
        $sql = "Select a.sContrato, a.iItemOrden, a.sIdPersonal, a.sDescripcion, a.sMedida, a.dVentaMN, a.dCostoMN, bp.dIdFecha, Sum(bp.dCantidad * bp.dCostoMN) as dCantidad from personal a inner join bitacoradepersonal bp on (a.sContrato = bp.sContrato And a.sIdPersonal = bp.sIdPersonal and (bp.dIdFecha >= '$FechaInicio' and bp.dIdFecha <= '$FechaFinal')) inner join bitacoradeactividades b ON (b.sContrato = bp.sContrato and b.dIdFecha = bp.dIdFecha And b.iIdDiario = bp.iIdDiario) inner join ordenesdetrabajo o ON (b.sContrato = o.sContrato and b.sNumeroOrden = o.sNumeroOrden And o.cIdStatus = '$status') INNER JOIN turnos t ON (b.sContrato = t.sContrato and b.sIdTurno = t.sIdTurno and t.sOrigenTierra = 'No')  Where a.sContrato = '$sContrato' Group By bp.sContrato, bp.sIdPersonal, bp.dIdFecha Order By a.iItemOrden, bp.sIdPersonal, bp.dIdFecha";
         

         $celdas=0;
         for($i = $FechaInicio ; $i <= $FechaFinal ;$i++){
             $celdas++;
         }
   $result = mysql_query($sql);
   print ("<table class='enhancedtablerowhover'>");
         print ("<th class=title  colspan =".($celdas+4)."><font size = 2 > ".NombreMes($mes)." / $anyo </th>");
         print ("<col/><tr>");
         print ("<th>Contrato</th>");
         print ("<th>Descripcion</th>");
         print ("<th>Costo MN</th>");
         print ("<th>UM</th>");
         $arrayFechas[]="";
         $cont=0;
         for($i = $FechaInicio ; $i <= $FechaFinal ;$i++){
             ++$cont;
             $arrayFechas[$cont]=$i;
             print ("<th>$cont</th>");
         }
   $sIdPersonal='';
   $ini = 1;
   $recorre = 0;
   while($row = mysql_fetch_array($result)){
      $recorre++;
      if($sIdPersonal !=$row['sIdPersonal']) {
         if($sIdPersonal !="")
         {
            for($i = $ini; $i <= $cont ; $i++){
               print ("<td>0</td>");    
          
            }
            print ("</tr>"); 
         }
         $sIdPersonal = $row['sIdPersonal'];
         print ("<tr>");
         print ("<td>".$row['sContrato']."</td>");
         print ("<td nowrap>".$row['sDescripcion']."</td>");//style='width: 100.6em'
         print ("<td>".$row['dCostoMN']."</td>");
         print ("<td>".$row['sMedida']."</td>");
         $ini = 1;
      }
      $i = $ini ;  
      $band =false;
      while (!$band){
         
         if($row['dIdFecha'] == $arrayFechas[$i]){
             $band = true ;
            if($info == 'costos')    
                $cantidad = "$ ".number_format($row['dCantidad'],2);
            else
                $cantidad =  $row['dCantidad'];
             $arraySuma[$i] += $row['dCantidad'];
             print ("<td>".$cantidad."</td>");
         }
         else if($row['dIdFecha'] > $arrayFechas[$i])   
             print ("<td>0</td>");
         $i++;
     }
     $ini = $i;
     
    
   }
   
if ($recorre >0){
   if ($ini < $cont ){
      for($i = $ini; $i <= $cont ; $i++){
         print ("<td>0</td>");    
      }
      print ("</tr>"); 
   }
   else{
      print ("</tr>"); 
   }
if($info == 'costos' )   {
      print ("<td colspan=4></td>");
    for($i = 1; $i <=$celdas ; $i++){
            print ("<td>$ ".number_format($arraySuma[$i],2)."</td>");   
      }
   
   
}
}
 

   print ("</table>");
   print ("</br><br>");
   if ($info == 'volumenes')
   $sql = "Select a.sContrato, a.iItemOrden, a.sIdEquipo, a.sDescripcion, a.sMedida, a.dVentaMN, a.dCostoMN, bp.  dIdFecha, Sum(bp.dCantidad) as dCantidad from equipos a inner join bitacoradeequipos bp on (a.sContrato = bp.sContrato And a.sIdEquipo = bp.sIdEquipo and bp.dIdFecha >= '$FechaInicio' And bp.dIdFecha <= '$FechaFinal') inner join bitacoradeactividades b ON (b.sContrato = bp.sContrato and b.dIdFecha = bp.dIdFecha And b.iIdDiario = bp.iIdDiario) inner join ordenesdetrabajo o ON (b.sContrato = o.sContrato and b.sNumeroOrden = o.sNumeroOrden And o.cIdStatus = '$status') INNER JOIN turnos t ON (b.sContrato = t.sContrato and b.sIdTurno = t.sIdTurno and t.sOrigenTierra = 'No') Where a.sContrato = '$sContrato'  Group By bp.sContrato, bp.sIdEquipo, bp.dIdFecha Order By a.iItemOrden, bp.sIdEquipo, bp.dIdFecha";
   else
     $sql = "Select a.sContrato, a.iItemOrden, a.sIdEquipo, a.sDescripcion, a.sMedida, a.dVentaMN, a.dCostoMN, bp.  dIdFecha, Sum(bp.dCantidad * bp.dCostoMN)  as dCantidad from equipos a inner join bitacoradeequipos bp on (a.sContrato = bp.sContrato And a.sIdEquipo = bp.sIdEquipo and bp.dIdFecha >= '$FechaInicio' And bp.dIdFecha <= '$FechaFinal') inner join bitacoradeactividades b ON (b.sContrato = bp.sContrato and b.dIdFecha = bp.dIdFecha And b.iIdDiario = bp.iIdDiario) inner join ordenesdetrabajo o ON (b.sContrato = o.sContrato and b.sNumeroOrden = o.sNumeroOrden And o.cIdStatus = '$status') INNER JOIN turnos t ON (b.sContrato = t.sContrato and b.sIdTurno = t.sIdTurno and t.sOrigenTierra = 'No') Where a.sContrato = '$sContrato'  Group By bp.sContrato, bp.sIdEquipo, bp.dIdFecha Order By a.iItemOrden, bp.sIdEquipo, bp.dIdFecha";
     unset($arraySuma);
     
            $celdas=0;
         for($i = $FechaInicio ; $i <= $FechaFinal ;$i++){
             $celdas++;
         }

  
   $result = mysql_query($sql);
   print ("<table class='enhancedtablerowhover'>");
   
         print ("<tr><th class=title colspan =".($celdas+4)."><font size = 2 > ".NombreMes($mes)." / $anyo</th></tr>");
         print ("<tr><th>Contrato</th>");
         print ("<th >Descripcion</th>");//width='10%'
         print ("<th>Costo MN</th>");
         print ("<th>UM</th>");
         $arrayFechas[]="";
         $cont=0;
         for($i = $FechaInicio ; $i <= $FechaFinal ;$i++){
             ++$cont;
             $arrayFechas[$cont]=$i;
             print ("<th>$cont</th>");
         }
   $sIdPersonal='';
   $ini = 1;
    $recorre = 0;
   while($row = mysql_fetch_array($result)){
    $recorre++;
      if($sIdPersonal !=$row['sIdEquipo']) {
         if($sIdPersonal !="")
         {
            for($i = $ini; $i <= $cont ; $i++){
               print ("<td>0</td>");    
          
            }
            print ("</tr>"); 
         }
         $sIdPersonal = $row['sIdEquipo'];
         print ("<tr>");
         print ("<td>".$row['sContrato']."</td>");
         print ("<td>".$row['sDescripcion']."</td>");// style='width: 100.6em'
         print ("<td>".$row['dCostoMN']."</td>");
         print ("<td>".$row['sMedida']."</td>");
         $ini = 1;
      }
      $i = $ini ;  
      $band =false;
      while (!$band){
         
         if($row['dIdFecha'] == $arrayFechas[$i]){
               $band = true ;   
            if($info == 'costos')    
                $cantidad = "$ ".number_format($row['dCantidad'],2);
            else
                $cantidad =  $row['dCantidad'];
             $arraySuma[$i] += $row['dCantidad'];
             print ("<td>".$cantidad."</td>");
         }
         else if($row['dIdFecha'] > $arrayFechas[$i])   
             print ("<td>0</td>");
         $i++;
     }
     $ini = $i;
     
    
   }
if ($recorre >0){
   if ($ini < $cont ){
      for($i = $ini; $i <= $cont ; $i++){
         print ("<td>0</td>");    
      }
      print ("</tr>"); 
   }
   else{
      print ("</tr>"); 
   }
if($info == 'costos' )   {
      print ("<td colspan=4></td>");
    for($i = 1; $i <=$celdas ; $i++){
            print ("<td>$ ".number_format($arraySuma[$i],2)."</td>");   
      }
   
   
}
}
 
    
      
   print ("</table>");
   print ("</br><br>");
   
}
else{
 unset($arraySuma);
 if($info == 'volumenes')
   $sql = "Select a.sContrato, a.iItemOrden, a.sIdPersonal, a.sDescripcion, a.sMedida, a.dVentaMN, a.dCostoMN, bp.dIdFecha, Sum(bp.dCantidad) as dCantidad from personal a inner join bitacoradepersonal bp on (a.sContrato = bp.sContrato And a.sIdPersonal = bp.sIdPersonal and (bp.dIdFecha >= '$FechaInicio' and bp.dIdFecha <= '$FechaFinal')) inner join bitacoradeactividades b ON (b.sContrato = bp.sContrato and b.dIdFecha = bp.dIdFecha And b.iIdDiario = bp.iIdDiario) inner join ordenesdetrabajo o ON (b.sContrato = o.sContrato and b.sNumeroOrden = o.sNumeroOrden And o.cIdStatus = '$status') INNER JOIN turnos t ON (b.sContrato = t.sContrato and b.sIdTurno = t.sIdTurno and t.sOrigenTierra = 'No')  Where a.sContrato = '$sContrato'  Group By b.sNumeroOrden, bp.sIdPersonal, bp.dIdFecha Order By a.iItemOrden, bp.sIdPersonal, bp.dIdFecha";

else
      $sql = "Select a.sContrato, a.iItemOrden, a.sIdPersonal, a.sDescripcion, a.sMedida, a.dVentaMN, a.dCostoMN, bp.dIdFecha, Sum(bp.dCantidad * bp.dCostoMN)  as dCantidad from personal a inner join bitacoradepersonal bp on (a.sContrato = bp.sContrato And a.sIdPersonal = bp.sIdPersonal and (bp.dIdFecha >= '$FechaInicio' and bp.dIdFecha <= '$FechaFinal')) inner join bitacoradeactividades b ON (b.sContrato = bp.sContrato and b.dIdFecha = bp.dIdFecha And b.iIdDiario = bp.iIdDiario) inner join ordenesdetrabajo o ON (b.sContrato = o.sContrato and b.sNumeroOrden = o.sNumeroOrden And o.cIdStatus = '$status') INNER JOIN turnos t ON (b.sContrato = t.sContrato and b.sIdTurno = t.sIdTurno and t.sOrigenTierra = 'No')  Where a.sContrato = '$sContrato'  Group By b.sNumeroOrden, bp.sIdPersonal, bp.dIdFecha Order By a.iItemOrden, bp.sIdPersonal, bp.dIdFecha";

         $celdas=0;
         for($i = $FechaInicio ; $i <= $FechaFinal ;$i++){
             $celdas++;
         }
   $result = mysql_query($sql);
   print ("<table class='enhancedtablerowhover'>");
      
         print ("<th class=title  colspan =".($celdas+4)."><font size = 2 > ".NombreMes($mes)."/ $anyo </th>");
         print ("<col ><tr>");
         print ("<th>Contrato</th>");
         print ("<th >Descripcion</th>");//width='10%'
         print ("<th>Costo MN</th>");
         print ("<th>UM</th>");
         $arrayFechas[]="";
         $cont=0;
         for($i = $FechaInicio ; $i <= $FechaFinal ;$i++){
             ++$cont;
             $arrayFechas[$cont]=$i;
             print ("<th>$cont</th>");
         }
   $sIdPersonal='';
   $ini = 1;
    $recorre = 0;
   while($row = mysql_fetch_array($result)){
      $recorre++;
      if($sIdPersonal !=$row['sIdPersonal']) {
         if($sIdPersonal !="")
         {
            for($i = $ini; $i <= $cont ; $i++){
               print ("<td>0</td>");    
          
            }
            print ("</tr>"); 
         }
         $sIdPersonal = $row['sIdPersonal'];
         print ("<tr>");
         print ("<td>".$row['sContrato']."</td>");
         print ("<td >".$row['sDescripcion']."</td>");//style='width: 100.6em'
         print ("<td>".$row['dCostoMN']."</td>");
         print ("<td>".$row['sMedida']."</td>");
         $ini = 1;
      }
      $i = $ini ;  
      $band =false;
      while (!$band){
         
         if($row['dIdFecha'] == $arrayFechas[$i]){
               $band = true ;   
            if($info == 'costos')    
                $cantidad = "$ ".number_format($row['dCantidad'],2);
            else
                $cantidad =  $row['dCantidad'];
            $arraySuma[$i] += $row['dCantidad'];  
             print ("<td>".$cantidad."</td>");
         }
         else if($row['dIdFecha'] > $arrayFechas[$i])   
             print ("<td>0</td>");
         $i++;
     }
     $ini = $i;
     
    
   }
if ($recorre >0){
   if ($ini < $cont ){
      for($i = $ini; $i <= $cont ; $i++){
         print ("<td>0</td>");    
      }
      print ("</tr>"); 
   }
   else{
      print ("</tr>"); 
   }
if($info == 'costos' )   {
      print ("<td colspan=4></td>");
    for($i = 1; $i <=$celdas ; $i++){
            print ("<td>$ ".number_format($arraySuma[$i],2)."</td>");   
      }
   
   
}
}
  
  
   print ("</table>");
   print ("</br><br>");
     if($info == 'volumenes')
   $sql = "Select a.sContrato, a.iItemOrden, a.sIdEquipo, a.sDescripcion, a.sMedida, a.dVentaMN, a.dCostoMN, bp.  dIdFecha, Sum(bp.dCantidad) as dCantidad from equipos a inner join bitacoradeequipos bp on (a.sContrato = bp.sContrato And a.sIdEquipo = bp.sIdEquipo and bp.dIdFecha >= '$FechaInicio' And bp.dIdFecha <= '$FechaFinal') inner join bitacoradeactividades b ON (b.sContrato = bp.sContrato and b.dIdFecha = bp.dIdFecha And b.iIdDiario = bp.iIdDiario) inner join ordenesdetrabajo o ON (b.sContrato = o.sContrato and b.sNumeroOrden = o.sNumeroOrden And o.cIdStatus = '$status') INNER JOIN turnos t ON (b.sContrato = t.sContrato and b.sIdTurno = t.sIdTurno and t.sOrigenTierra = 'No') Where a.sContrato = '$sContrato' Group By b.sNumeroOrden, bp.sIdEquipo, bp.dIdFecha  Order By a.iItemOrden, bp.sIdEquipo, bp.dIdFecha";
   else
      $sql = "Select a.sContrato, a.iItemOrden, a.sIdEquipo, a.sDescripcion, a.sMedida, a.dVentaMN, a.dCostoMN, bp.  dIdFecha, Sum(bp.dCantidad * bp.dCostoMN) as dCantidad from equipos a inner join bitacoradeequipos bp on (a.sContrato = bp.sContrato And a.sIdEquipo = bp.sIdEquipo and bp.dIdFecha >= '$FechaInicio' And bp.dIdFecha <= '$FechaFinal') inner join bitacoradeactividades b ON (b.sContrato = bp.sContrato and b.dIdFecha = bp.dIdFecha And b.iIdDiario = bp.iIdDiario) inner join ordenesdetrabajo o ON (b.sContrato = o.sContrato and b.sNumeroOrden = o.sNumeroOrden And o.cIdStatus = '$status') INNER JOIN turnos t ON (b.sContrato = t.sContrato and b.sIdTurno = t.sIdTurno and t.sOrigenTierra = 'No') Where a.sContrato = '$sContrato' Group By b.sNumeroOrden, bp.sIdEquipo, bp.dIdFecha  Order By a.iItemOrden, bp.sIdEquipo, bp.dIdFecha";
     unset($arraySuma);       
         $celdas=0;
         for($i = $FechaInicio ; $i <= $FechaFinal ;$i++){
             $celdas++;
         }

   $result = mysql_query($sql);
   print ("<table class='enhancedtablerowhover'>");
          print ("<tr><th class=title  colspan =".($celdas+4)."><font size = 2 >".NombreMes($mes)." / $anyo</th></tr>");
         print ("<th>Contrato</th>");
         print ("<th >Descripcion</th>");//width='10%'
         print ("<th>Costo MN</th>");
         print ("<th>UM</th>");
         $arrayFechas[]="";
         $cont=0;
         for($i = $FechaInicio ; $i <= $FechaFinal ;$i++){
             ++$cont;
             $arrayFechas[$cont]=$i;
             print ("<th>$cont</th>");
         }
   $sIdPersonal='';
   $ini = 1;
    $recorre = 0;
   while($row = mysql_fetch_array($result)){
         $recorre++;
      if($sIdPersonal !=$row['sIdEquipo']) {
         if($sIdPersonal !="")
         {
            for($i = $ini; $i <= $cont ; $i++){
               print ("<td>0</td>");    
          
            }
            print ("</tr>"); 
         }
         $sIdPersonal = $row['sIdEquipo'];
         print ("<tr>");
         print ("<td>".$row['sContrato']."</td>");
         print ("<td >".$row['sDescripcion']."</td>");//style='width: 100.6em'
         print ("<td>".$row['dCostoMN']."</td>");
         print ("<td>".$row['sMedida']."</td>");
         $ini = 1;
      }
      $i = $ini ;  
      $band =false;
      while (!$band){
         
         if($row['dIdFecha'] == $arrayFechas[$i]){
               $band = true ; 
            if($info == 'costos')    
                $cantidad = "$ ".number_format($row['dCantidad'],2);
            else
                $cantidad =  $row['dCantidad'];
             $arraySuma[$i] += $row['dCantidad'];
             print ("<td>".$cantidad."</td>");
         }
         else if($row['dIdFecha'] > $arrayFechas[$i])   
             print ("<td>0</td>");
         $i++;
     }
     $ini = $i;
     
    
   }
if ($recorre >0){
   if ($ini < $cont ){
      for($i = $ini; $i <= $cont ; $i++){
         print ("<td>0</td>");    
      }
      print ("</tr>"); 
   }
   else{
      print ("</tr>"); 
   }
if($info == 'costos' )   {
      print ("<td colspan=4></td>");
    for($i = 1; $i <=$celdas ; $i++){
            print ("<td>$ ".number_format($arraySuma[$i],2)."</td>");   
      }
   
   
}
}
   
   print ("</table>");
   print ("</br><br>");
   
}
mysql_close();
?>
</body>
</html>