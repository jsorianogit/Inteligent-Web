<?php
require_once("../../include/mysql.inc.php"); 
$tiempo = microtime();
$tiempo = explode(" ",$tiempo);
$tiempo = $tiempo[1] + $tiempo[0];
$tiempoInicio = $tiempo; 
flush();
ob_flush ();
//Leer jornadas diarias para el contrato
?>
<style type='text/css'>@import 'progreso.css';</style>
<script language="javascript" src="progreso.js"></script>
<?php
//Leer jornadas diarias para el contrato
function Jornadas(){
   global $iJornadas,$Contrato,$txtMaterialAutomatico;
   setlocale(LC_TIME,"es_ES");
   //la fecha 05 - 11 - 2006 es domingo
   $ano = 2006;
  $mes = 11;
  $dia = 5; 
   //lunes
   $nueva = mktime(0,0,0,$mes,$dia+1,$ano);
   $lunes = strftime("%A",$nueva);
   //martes
   $nueva = mktime(0,0,0,$mes,$dia+2,$ano);
   $martes = strftime("%A",$nueva);
   //miercoles
   $nueva = mktime(0,0,0,$mes,$dia+3,$ano);
   $miercoles = strftime("%A",$nueva);
   //jueves
   $nueva = mktime(0,0,0,$mes,$dia+4,$ano);
   $jueves = strftime("%A",$nueva);
   //viernes
   $nueva = mktime(0,0,0,$mes,$dia+5,$ano);
   $viernes = strftime("%A",$nueva);
   //sabado
   $nueva = mktime(0,0,0,$mes,$dia+6,$ano);
   $sabado = strftime("%A",$nueva);
   //domingo
   $nueva = mktime(0,0,0,$mes,$dia+7,$ano);
   $domingo = strftime("%A",$nueva);
   $sql ="SELECT iJLunes,iJMartes,iJMiercoles,iJJueves,iJViernes,iJSabado,iJDomingo,txtMaterialAutomatico  FROM configuracion WHERE sContrato='$Contrato'";
   $result = mysql_query($sql);
   while ($row = mysql_fetch_array($result)){
      $iJornadas[$lunes] = $row['iJLunes'];
      $iJornadas[$martes] = $row['iJMartes'];
      $iJornadas[$miercoles] = $row['iJMiercoles'];
      $iJornadas[$jueves] = $row['iJJueves'];
      $iJornadas[$viernes] = $row['iJViernes'];
      $iJornadas[$sabado] = $row['iJSabado'];
      $iJornadas[$domingo] = $row['iJDomingo'];
   }
}

//Leer fecha de inicio y termino para el Wbs en proceso
function fIniTerm($sWbs){
   global $Contrato,$sIdConvenio,$dFechaInicio,$dFechaFinal,$sNumeroOrden;
   $sql = "SELECT dFechaInicio,dFechaFinal  FROM actividadesxanexo WHERE sContrato='$Contrato' AND sIdConvenio='$sIdConvenio' AND  sWbs = '$sWbs' ";  
   $result = mysql_query($sql);
   while ($row = mysql_fetch_array($result)){
      $dFechaInicio = $row['dFechaInicio'];
      $dFechaFinal = $row['dFechaFinal'];
   }
}
//Leer la Cantidad a instalar en cada meses
function cantidadMeses($sWbs){
   global $Contrato,$sIdConvenio,$CantidadxMes,$sNumeroOrden;
   echo "<br>".   $sql = "SELECT dIdFecha,DT  FROM anexosmensuales WHERE sContrato='$Contrato' AND sIdConvenio='$sIdConvenio' AND  sWbs = '$sWbs'  ORDER BY dIdFecha";  
   $result = mysql_query($sql);
   while ($row = mysql_fetch_array($result))
      $CantidadxMes[$row['dIdFecha']]=$row['DT'];
}
//Obtiene la cantidad a instalar de un mes 
function cantidadMes($fecha){
   global $CantidadxMes;
   $aFecha = explode("-",$fecha);
   if(count($CantidadxMes)<=0){
      mensaje("No existen programaciones mensuales para este Wbs");
      exit(0);
   }
   foreach($CantidadxMes as $f => $cantidad){
       $afecha = explode("-",$f);
      if($afecha[0] == $aFecha[0] AND $afecha[1]==$aFecha[1])
         return $cantidad;
   }
}
//regresa la jornada trabajada en X dia
function JornadasDia($fecha){
   global $iJornadas;
   setlocale(LC_TIME,"es_ES");
   if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("/", $fecha);
   if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("-",$fecha);
   $seconds = mktime(0,0,0,$mes,$dia,$ano);
   $NomDia = strftime("%A",$seconds);
   foreach($iJornadas as $dia => $jornada){
      if($dia == $NomDia)
         return $jornada;
   }
}
//incremente una fecha en un dia
function incFechas($fecha){
  if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("/", $fecha);
  if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("-",$fecha);
      
 $nueva = mktime(0,0,0,$mes,$dia+1,$ano);
 return date("Y-m-d",$nueva);
}
//regresa el ultimo dia de un mes

function ultimodia($ayno,$mes){
   $ultimodia = mktime(0, 0, 0,$mes+1, 0, $ayno);
   return $ultimo = strftime("%d", $ultimodia);
}
/*
function ultimodia($anho,$mes){
   if (( fmod($anho,4)==0 or fmod($anho,400)==0) and fmod($anho,100)!=0 ) {
       $dias_febrero = 29;
   } else {
       $dias_febrero = 28;
   }
   switch($mes) {
       case 1: return 31; break;
       case 2: return $dias_febrero; break;
       case 3: return 31; break;
       case 4: return 30; break;
       case 5: return 31; break;
       case 6: return 30; break;
       case 7: return 31; break;
       case 8: return 31; break;
       case 9: return 30; break;
       case 10: return 31; break;
       case 11: return 30; break;
       case 12: return 31; break;
   }
}
*/
//recorta una cadena de texto  a partir de un punto
function recortar($cadena,$numCarac){
   $newString = explode(".",$cadena);
   $final="";
   if($newString[1]!=""){
      $cad = $newString[1];
      $final.=substr($cad, 0,$numCarac); 
   }
   return $newString[0].".".$final;
}
//separa decimales de enteros
function decimales($cadena){
   $newString = explode(".",$cadena);
   return "0.".$newString[1];
}
//separa enteros de decimales
function enteros($cadena){
   $newString = explode(".",$cadena);
   return $newString[0];
}


ini_set("memory_limit","20M");
set_time_limit(0);
setlocale(LC_TIME,"es");
echo "<center><h2>Distribucion de Conceptos / Partidas  ( Desde la Fecha de Inicio Hasta la Fecha Final del Concepto)</h2>";
//barra de progreso
echo '<div class="barra-progreso">         ';
echo '<div id="texto" class="texto-progreso"> ...<br>0%</div>';         
echo '<div id="pos1" class="vacio"></div>         <div id="pos2" class="vacio"></div>   ';
echo '<div id="pos3" class="vacio"></div>         <div id="pos4" class="vacio"></div>   ';      
echo '<div id="pos5" class="vacio"></div>         <div id="pos6" class="vacio"></div>   ';
echo '<div id="pos7" class="vacio"></div>         <div id="pos8" class="vacio"></div>   ';     
echo '<div id="pos9" class="vacio"></div>         <div id="pos10" class="vacio"></div>    ';
echo '</div></center>';

//optebner el contratro
if(isset($_SESSION['Contrato']))
   $Contrato = $_SESSION['Contrato']; 
echo "<br>Contrato: ".$Contrato ;

//obtener el convenio actual

$sql="SELECT c.sIdConvenio FROM configuracion c INNER JOIN convenios c2 ON (c.sContrato=c2.sContrato AND c.sIdConvenio=c2.sIdConvenio) WHERE c.sContrato='$Contrato' ";
$resultado=mysql_query($sql,$link);
if($row=mysql_fetch_array($resultado)){
   $sIdConvenio=$row['sIdConvenio'];
}


mysql_query("begin");


echo "<br>Iniciando el Proceso a las ".date("G:i:s");

echo "<br>Borrando Registros Antiguos...";
mysql_query("delete from  distribuciondeanexo where sContrato = '$Contrato' AND sIdConvenio='$sIdConvenio'  ;");
   
echo "<br>Distribuyendo...";

//Numero Total de sWbs
$sqlC = "select count(sWbs) from actividadesxanexo  where sContrato ='$Contrato' and sIdConvenio ='$sIdConvenio' and sTipoActividad='Actividad';";
$resultC = mysql_query($sqlC);
if($rowC=mysql_fetch_array($resultC))
   $cantidadsWbs = $rowC[0];

//Calculo de porcentaje por cada Wbs   
$avance = 100/$cantidadsWbs;
$sum =$avance;    

flush();
ob_flush ();   

$sql = "select sWbs,sNumeroActividad,sMedida,dCantidadAnexo,dFechaInicio,dFechaFinal from actividadesxanexo  where sContrato ='$Contrato' and sIdConvenio ='$sIdConvenio' and sTipoActividad='Actividad' ;";
$result = mysql_query($sql);
while ($row = mysql_fetch_array($result)){
   flush();
   ob_flush ();
   unset($iJornadas);
   unset($CantidadxMes);
   unset($dFechaInicio);
   unset($dFechaFinal);
   unset($txtMaterialAutomatico);
   $decimales = 0.0;
   $band = "";
   $sumadorJor = 0;
   $jornadatotal =0 ;
   $sWbs = $row['sWbs'];
   $sNumeroActividad = $row['sNumeroActividad'];
   $sMedida = $row['sMedida'];

   $dFechaInicio = $row['dFechaInicio'];
   $dFechaFinal = $row['dFechaFinal'];

   jornadas();

   $desdeFecha=$dFechaInicio;
   $HastaFecha = $dFechaFinal;
    while($desdeFecha<=$HastaFecha){
         $jornadatotal += JornadasDia($desdeFecha);
         #incrementar la fecha en un dia
         $desdeFecha = incFechas($desdeFecha);
   }
   while($dFechaInicio<=$dFechaFinal){
      #Jornadas totales tomando en cuenta las horas por dia
      if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$dFechaInicio))
         list($ano,$mes,$dia)=split("/", $dFechaInicio);
      if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$dFechaInicio))
         list($ano,$mes,$dia)=split("-",$dFechaInicio);
   
      #Hace el calculo si la medida No es entera
      if(strpos($txtMaterialAutomatico,$sMedida)===false){
         if($dFechaInicio==$dFechaFinal){
            if($sumadorJor<$row['dCantidadAnexo'])
               $cantidadDelDia = $row['dCantidadAnexo']-$sumadorJor;
           $cantidadDelDia = round($cantidadDelDia * 100000) / 100000;
           $cantidadDelDia = recortar($cantidadDelDia,5);
           $sumadorJor=0;
         }
         else{
            $cantidadDelDia = ($row['dCantidadAnexo']/ $jornadatotal) * JornadasDia($dFechaInicio);;
            $cantidadDelDia= recortar($cantidadDelDia,5);
            $sumadorJor+=$cantidadDelDia;          
         }
      }#Hace el calculo si la medida es entera
      else{
         if($dFechaInicio==$dFechaFinal){
            if($decimales>0)
               $cantidadDelDia = $cantidadDelDia + $decimales;
            if($sumadorJor<$row['dCantidadAnexo'])
               $cantidadDelDia = $row['dCantidadAnexo']-$sumadorJor;
            $cantidadDelDia = recortar($cantidadDelDia,5);
            $decimales = 0;
            $sumadorJor=0;
         }
         else{
               $cantidadDelDia = ($row['dCantidadAnexo']/ $jornadatotal) * JornadasDia($dFechaInicio);;
               $cantidadDelDia = recortar($cantidadDelDia,5);
               if($decimales>0)
                  $cantidadDelDia = $cantidadDelDia + $decimales; 
               $decimales = decimales($cantidadDelDia);
               $sumadorJor+=$cantidadDelDia;             
               $cantidadDelDia = enteros($cantidadDelDia);
         }
      
      }
      $sql = "insert into distribuciondeanexo (sContrato,sIdConvenio,dIdFecha,sWbs,sNumeroActividad,dCantidad) values ('$Contrato','$sIdConvenio','$dFechaInicio','$sWbs','$sNumeroActividad','$cantidadDelDia'); ";
      if($cantidadDelDia>0.00000)
         mysql_query($sql);
      if(mysql_error()){
         mensaje("¡¡¡¡¡¡ Ocurrio un error, no se completo la operacion !!!!! : ".mysql_error());
         echo "<br><br><a href='index.php'>Regresar</a>"; 
         mysql_query("rollback");
         exit(0);
      }
      #incrementar la fecha en un dia
      $dFechaInicio = incFechas($dFechaInicio);
   }
      echo "<script languaje='javascript'>progreso($avance)</script>";
   $avance+=$sum;
   //exit(0);        
}
echo "<br>Proceso Finalizo a las ".date("G:i:s");
mysql_query("commit");
mysql_close();
$tiempo = microtime();
$tiempo = explode(" ",$tiempo);
$tiempo = $tiempo[1] + $tiempo[0];
$tiempoFin = $tiempo;
$tiempoReal = ($tiempoFin - $tiempoInicio);
echo "<br><br>El tiempo de proceso es ". $tiempoReal ." Segundos";
mensaje("¡¡ La operacion ha finalizado  !!");
echo "<br><br><a href='index.php'>Regresar</a>"; 
?>
