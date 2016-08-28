<?php
require("config.inc.php");

if(isset($_SESSION['database']))
   $BaseDatos=$_SESSION['database'];
else
   $BaseDatos="intelcode";


#Defeinir cual reporte diario va a usarse
#si el de inteligent o el de intelcode
if($_SESSION['database'] =="inteligent")
   $rptDiario = "generadores_paquete";
else
   $rptDiario = "generadores_swbs";

//ini_set ("error_reporting", "~E_ALL & ~E_NOTICE");
$link=mysql_connect($Servidor,$Usuario,$Clave);
if($Servidor=="127.0.0.1" or $Servidor=="localhost")
   {
      $ipTmp=$Servidor;
      $ip = $HTTP_SERVER_VARS['SERVER_ADDR'];
      /*echo "ip: ".$ip."<br>";
      $nombredeip= gethostbyaddr($ip);
      echo $nombredeip."<br>";*/
      $Servidor=$ip;
   }
   if($Servidor=="")
     $Servidor="localhost";
mysql_select_db($BaseDatos, $link);
 if(mysql_error()){
    echo "<script languaje=\"javascript\">
         alert('No se pudo seleccionar la base de datos');
         window.location.href='".$PathModulos."Login/login.php';
         </script>";
 }

if(!$Acceso){
   require("users.php");
}
//paginador de consultas
/******************************************************/
/* Funcion paginar
 * actual:          Pagina actual
 * total:           Total de registros
 * por_pagina:      Registros por pagina
 * enlace:          Texto del enlace
 * Devuelve un texto que representa la paginacion
 */
function paginar($actual, $total, $por_pagina, $enlace) {
  $_SESSION['pagActual']=$actual;
  $total_paginas = ceil($total/$por_pagina);
  $anterior = $actual - 1;
  $posterior = $actual + 1;
  if ($actual>1)
    $texto .= "<a href=\"$enlace$anterior\">&laquo;</a> ";
  else
    $texto .= "<b>&laquo;</b> ";
  for ($i=1; $i<$actual; $i++)
    $texto .= "<a href=\"$enlace$i\">$i</a> ";
  $texto .= "<b>$actual</b> ";
  for ($i=$actual+1; $i<=$total_paginas; $i++)
    $texto .= "<a href=\"$enlace$i\">$i</a> ";
  if ($actual<$total_paginas)
    $texto .= "<a href=\"$enlace$posterior\">&raquo;</a>";
  else
    $texto .= "<b>&raquo;</b>";
  return $texto;
}
//get sContrato
if(isset($_SESSION['ssContrato']))
   $sContrato=$_SESSION['ssContrato'];
//get sIdConvenio
if(isset($_SESSION['ssIdConvenio']))
   $sIdConvenioAct=$_SESSION['ssIdConvenio'];
//get sIdConvenio
if(isset($_SESSION['ssIdTurno']))
   $sIdTurnoAct=$_SESSION['ssIdTurno'];
function location($destino){
   echo "<script language = 'javascript'>location.href = '$destino'</script>";
}
function closewindow(){
   echo "<script language = 'javascript'>close();</script>";
}
function mensaje($mensaje){
   echo "<script language = 'javascript'>alert(\"$mensaje\");</script>";
}
//ini_set ("error_reporting", "E_ALL & ~E_NOTICE");
?>
