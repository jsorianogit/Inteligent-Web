<?php
session_cache_limiter("must-revalidate"); 
session_start();
?>
<html>
<head>
<?php
require ("../../../../include/formulario.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
</head>
<body>
<?php

//incremente una fecha en un dia
/*
function suma_fechas($fecha,$ndias){
  if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("/", $fecha);
  if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("-",$fecha);
  $nueva = mktime(0,0,0,$mes,$dia+$ndias,$ano);
  $nuevafecha=date("Y-m-d",$nueva);
  return $nuevafecha;
}
  */
if(isset($_REQUEST['sNumeroOrden']))
   $sNumeroOrden=$_REQUEST['sNumeroOrden'];
if(isset($_REQUEST['sIdTurno']))
   $sIdTurno=$_REQUEST['sIdTurno'];
if(isset($_REQUEST['dIdFecha']))
   $fecha=$_REQUEST['dIdFecha'];

//IdDiario
$sql="SELECT MAX(iIdDiario) FROM bitacoradeactividades WHERE sContrato='$sContrato' AND sNumeroOrden='$sNumeroOrden' ";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $iIdDiario = $row[0];
   $iIdDiario = $iIdDiario + 1;
}
   
//Comentarios
$sql = "SELECT max(b.dIdFecha),t.sIdTipoMovimiento,b.mDescripcion 
FROM bitacoradeactividades b INNER JOIN tiposdemovimiento t 
ON(b.sContrato=t.sContrato 
AND b.sIdTipoMovimiento=t.sIdTipoMovimiento) 
WHERE b.sContrato='$sContrato' AND b.sNumeroOrden='$sNumeroOrden' 
AND t.sClasificacion='Notas' 
GROUP BY b.sContrato;"; 
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $dIdFecha = $row[0];
   //$FechaSiguiente = suma_fechas($dIdFecha,1);
   $FechaSiguiente = $dIdFecha;
   if($fecha == $FechaSiguiente){
      mensaje("Ya existe un comentario para esta fecha : $fecha");   
   }
   else{
      $sIdTipoMovimiento = $row[1];
      $mDescripcion = $row[2];
      echo "<br><b><center>Cargando Informacion Necesaria</center></b>";
      echo "<br><b>Contrato:</b> $sContrato";
      echo "<br><b>Numero de Orden:</b> $sNumeroOrden";
      echo "<br><b>Fecha Anterior:</b> $FechaSiguiente";
      echo "<br><b>Id Tipo de Movimiento:</b> $sIdTipoMovimiento";
      echo "<br><b>Id Diario:</b> $iIdDiario";
      echo "<br><b>Comentarios:</b> $mDescripcion";
      echo "<br><b>Turno:</b> $sIdTurno";
      echo $sql ="INSERT INTO bitacoradeactividades (iIdDiario,sContrato,dIdFecha,sIdTurno,sNumeroOrden,sNumeroActividad,sWbs,sIdTipoMovimiento,dCantidad,mDescripcion,dAvance) 
      VALUES ($iIdDiario,'$sContrato','$fecha','$sIdTurno','$sNumeroOrden','','','$sIdTipoMovimiento','','$mDescripcion','')";
      mysql_query($sql); 
      if(mysql_error())
         mensaje(mysql_error());
   }
}
else
   mensaje("No se pudo cargar la Informacion");
if(mysql_error())
   mensaje(mysql_error());

?>
   <script language="javascript">
      opener.document.location='volumenes.php';
      window.close();
   </script>
<?php
mysql_close();
?>
</body>
</html>
