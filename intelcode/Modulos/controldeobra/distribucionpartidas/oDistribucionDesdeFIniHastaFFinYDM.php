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
   $sql = "SELECT dFechaInicio,dFechaFinal  FROM actividadesxorden WHERE sContrato='$Contrato' AND sIdConvenio='$sIdConvenio' AND  sWbs = '$sWbs' AND sNumeroOrden='$sNumeroOrden' ";  
   $result = mysql_query($sql);
   while ($row = mysql_fetch_array($result)){
      $dFechaInicio = $row['dFechaInicio'];
      $dFechaFinal = $row['dFechaFinal'];
   }
}
//Leer la Cantidad a instalar en cada meses
function cantidadMeses($sWbs){
   global $Contrato,$sIdConvenio,$CantidadxMes,$sNumeroOrden;
   echo "<br>".   $sql = "SELECT dIdFecha,DT  FROM ordenes_programamensual WHERE sContrato='$Contrato' AND sIdConvenio='$sIdConvenio' AND  sWbs = '$sWbs' AND sNumeroOrden='$sNumeroOrden'  ORDER BY dIdFecha";   
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
echo "<center><h2>Distribucion de Conceptos / Partidas de Ordenes de Trabajo ( Desde la Fecha de Inicio Hasta la Fecha Final del Concepto  y Hacer Distribucion Mensual)</h2>";
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
//Numero de Orden
if(isset($_SESSION['sNumeroOrden']))
   $sNumeroOrden =$_SESSION['sNumeroOrden'];
echo "<br>Numero de Orden: ".$sNumeroOrden ;
//obtener el convenio actual

$sql="SELECT c.sIdConvenio FROM configuracion c INNER JOIN convenios c2 ON (c.sContrato=c2.sContrato AND c.sIdConvenio=c2.sIdConvenio) WHERE c.sContrato='$Contrato' ";
$resultado=mysql_query($sql,$link);
if($row=mysql_fetch_array($resultado)){
   $sIdConvenio=$row['sIdConvenio'];
}


mysql_query("begin");


echo "<br>Iniciando el Proceso a las ".date("G:i:s");
echo "<br>Borrando Registros Antiguos...";

mysql_query("delete from  distribuciondeactividades where sContrato = '$Contrato' AND sIdConvenio='$sIdConvenio' AND sNumeroOrden='$sNumeroOrden' ;");
   
//Numero Total de sWbs
echo "<br>Distribuyendo...";
$sqlC = "select count(sWbs) from actividadesxorden  where sContrato ='$Contrato' and sIdConvenio ='$sIdConvenio' and sTipoActividad='Actividad' AND sNumeroOrden='$sNumeroOrden' ";
$resultC = mysql_query($sqlC);
if($rowC=mysql_fetch_array($resultC))
   $cantidadsWbs = $rowC[0];
   
$avance = 100/$cantidadsWbs;
$sum =$avance;    
flush();
ob_flush ();   

$sql = "select sWbs,sNumeroActividad,sMedida,dCantidad,dFechaInicio,dFechaFinal from actividadesxorden  where sContrato ='$Contrato' and sIdConvenio ='$sIdConvenio' and sTipoActividad='Actividad' AND sNumeroOrden='$sNumeroOrden' ;";
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
// $sWbs ="A.01.4.00";
// $sNumeroActividad = "4.00";
   //Obneter la fecha de inicio y termino de la partida/concepto
   //fIniTerm($sWbs);
   #echo "<font color='blue'><br> Fecha Inicio : ". $dFechaInicio = $row['dFechaInicio'];
   #echo "<br> Fecha Termino: ". $dFechaFinal = $row['dFechaFinal'];
   $dFechaInicio = $row['dFechaInicio'];
   $dFechaFinal = $row['dFechaFinal'];
   #echo "</font>";
   //optiene la cantidad a instalar en cada mes
   //cantidadMeses($sWbs);
   //optiene cuantas horas se trabajan por dia
   jornadas();
   //hacer el calculo de cuanto se instala por dia
   //fIniTerm($sWbs);
   #echo "<br>Wbs = $sWbs";
   #echo "<br>Numero de Actividad= $sNumeroActividad";
   $desdeFecha=$dFechaInicio;
   $HastaFecha = $dFechaFinal;
    while($desdeFecha<=$HastaFecha){
         $jornadatotal += JornadasDia($desdeFecha);
         //incrementar la fecha en un dia
         $desdeFecha = incFechas($desdeFecha);
   }
   while($dFechaInicio<=$dFechaFinal){
      //Jornadas totales tomando en cuenta las horas por dia
      if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$dFechaInicio))
         list($ano,$mes,$dia)=split("/", $dFechaInicio);
      if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$dFechaInicio))
         list($ano,$mes,$dia)=split("-",$dFechaInicio);
   
##    if($band != $mes){
##          $band = $mes;
##       $jornadatotal=0;
##          $desdeFecha=$dFechaInicio;
##          //$HastaFecha = $ano."-".$mes."-".ultimodia($ayno,$mes);
##          //if($HastaFecha > $dFechaFinal)
##          $HastaFecha = $dFechaFinal;
##        while($desdeFecha<=$HastaFecha){
##             $jornadatotal += JornadasDia($desdeFecha);
##             //incrementar la fecha en un dia
##             $desdeFecha = incFechas($desdeFecha);
##          }
##    }
       
      #echo "<br><br>Cantidad Total : ".$row['dCantidad'];
      #echo "<br>Jornadas del dia : ".JornadasDia($dFechaInicio); 
      #echo "<br>Jornadas Totales :  ".$jornadatotal;
      //Hace el calculo si la medida No es entera
      if($txtMaterialAutomatico=="")$txtMaterialAutomatico="?";
      if($sMedida=="")$sMedida="/";
      if(strpos($txtMaterialAutomatico,$sMedida)===false){
         #echo "<br><font color='red'>Las cantidades NO son enteras</font>";
         if($dFechaInicio==$dFechaFinal){
         #  echo "<br><font color='Blue'><b>Ultimo Dia </b></font>";
         #  echo "<br><font color='Blue'><b>Acumulador ".$sumadorJor."</b></font>";
            if($sumadorJor<$row['dCantidad'])
               $cantidadDelDia = $row['dCantidad']-$sumadorJor;
           #echo "<br><font color='Blue'><b>Final ".$cantidadDelDia ."</b></font>";
           $cantidadDelDia = round($cantidadDelDia * 100000) / 100000;
           $cantidadDelDia = recortar($cantidadDelDia,5);
          # echo "<br><font color='Blue'><b>Final Rcordado ".$cantidadDelDia ."</b></font>";
           $sumadorJor=0;
         }
         else{
            $cantidadDelDia = ($row['dCantidad']/ $jornadatotal) * JornadasDia($dFechaInicio);;
            $cantidadDelDia= recortar($cantidadDelDia,5);
            $sumadorJor+=$cantidadDelDia;
            
            
         }
      }//Hace el calculo si la medida es entera
      else{
      #echo "<br>Las cantidades son enteras";
         if($dFechaInicio==$dFechaFinal){
            #echo "<br><font color='Blue'><b>Ultimo Dia</b></font>";
            #echo "<br><font color='red'>Decimales : ".$decimales."</font>";
            #echo "<br><font color='red'>Cantidad Dia : ".$cantidadDelDia."</font>";
            if($decimales>0)
               $cantidadDelDia = $cantidadDelDia + $decimales;
            if($sumadorJor<$row['dCantidad'])
               $cantidadDelDia = $row['dCantidad']-$sumadorJor;
            $cantidadDelDia = recortar($cantidadDelDia,5);
            #echo "<br><font color='red'>Cantidad Dia + Decimales : ".$cantidadDelDia."</font>";
            $decimales = 0;//decimales($cantidadDelDia);
            #echo "<br><font color='red'>Nuevos Decimales : ".$decimales."</font>";
            //$cantidadDelDia = enteros($cantidadDelDia);
            $sumadorJor=0;
         }
         else{
               $cantidadDelDia = ($row['dCantidad']/ $jornadatotal) * JornadasDia($dFechaInicio);;
               $cantidadDelDia = recortar($cantidadDelDia,5);
               #echo "<br><font color='red'>Decimales : ".$decimales."</font>";
               #echo "<br><font color='red'>Cantidad Dia : ".$cantidadDelDia."</font>";
               if($decimales>0)
                  $cantidadDelDia = $cantidadDelDia + $decimales; 
               #echo "<br><font color='red'>Cantidad Dia + Decimales : ".$cantidadDelDia."</font>";
               $decimales = decimales($cantidadDelDia);
               #echo "<br><font color='red'>Nuevos Decimales : ".$decimales."</font>";
               $cantidadDelDia = enteros($cantidadDelDia);
               $sumadorJor+=$cantidadDelDia;

         }
      
      }
      #echo "<br>$dFechaInicio = $cantidadDelDia";
      $sql = "insert into distribuciondeactividades (sContrato,sIdConvenio,dIdFecha,sWbs,sNumeroActividad,dCantidad,sNumeroOrden) values ('$Contrato','$sIdConvenio','$dFechaInicio','$sWbs','$sNumeroActividad','$cantidadDelDia','$sNumeroOrden'); ";
      if($cantidadDelDia>0.00000)
         mysql_query($sql);
      if(mysql_error()){
         mensaje("¡¡¡¡¡¡ Ocurrio un error, no se completo la operacion !!!!! : ".mysql_error());
         echo "<br><br><a href='index.php'>Regresar</a>"; 
         mysql_query("rollback");
         exit(0);
      }
      //incrementar la fecha en un dia
      $dFechaInicio = incFechas($dFechaInicio);
   }
      echo "<script languaje='javascript'>progreso($avance)</script>";
   $avance+=$sum;       
}

//Iniciando Distribucion Mensual
echo "<br>Distribucion Mensual";
$dVentaxHoraMN = 0;
$dVentaxHoraDLL = 0;
$sql = "DELETE FROM ordenes_programamensual WHERE sContrato='$Contrato' AND sIdConvenio= '$sIdConvenio' AND sNumeroOrden='$sNumeroOrden'";
mysql_query($sql);
$sqlG = "SELECT distinct(sWbs) FROM distribuciondeactividades WHERE sContrato = '$Contrato' AND sIdConvenio = '$sIdConvenio'  AND sNumeroOrden='$sNumeroOrden' "; 
$resultG = mysql_query($sqlG);
while($rowG = mysql_fetch_array($resultG)){
   $sWbs = $rowG[0];
   #echo "<br><br>Wbs : ".$sWbs;
   $acumuladoMN=0;
   $acumuladoDLL=0;
   $contsWbs=0;
   $sql = "SELECT sWbs, sNumeroActividad,year(dIdFecha), month(dIdfecha), sum(dCantidad) as dDT FROM distribuciondeactividades WHERE sContrato = '$Contrato' and sIdConvenio = '$sIdConvenio'  AND sNumeroOrden='$sNumeroOrden' AND sWbs='$sWbs' GROUP BY sWbs, sNumeroActividad, year(dIdFecha), month(dIdfecha)";
   $result = mysql_query($sql);
   while($row = mysql_fetch_array($result)){
      $dCantidadMes = $row['dDT'];
      $sqlC = "SELECT dVentaMN,dVentaDLL,dVentaMN*dCantidad as dVentaMNtotal,dVentaDLL*dCantidad as dVentaDLLtotal  FROM actividadesxorden  WHERE sContrato ='$Contrato' AND sIdConvenio ='$sIdConvenio' AND sTipoActividad='Actividad' AND sWbs ='$row[0]'  AND sNumeroOrden='$sNumeroOrden';";
      $resultC = mysql_query($sqlC);
      if($rowC = mysql_fetch_array($resultC)){
            //sacar el precio de partida por mes
            $dVentaxHoraMN = $rowC['dVentaMN']*$dCantidadMes;
            $dVentaxHoraMN = round($dVentaxHoraMN  * 100) / 100;
   
            $dVentaxHoraDLL = $rowC['dVentaDLL']*$dCantidadMes;
            $dVentaxHoraDLL = round($dVentaxHoraDLL * 100) / 100 ;
            if($contsWbs == mysql_num_rows($result)-1){
               #Capturar
               $dVentaMNtotal = $rowC['dVentaMNtotal'];
               $dVentaDLLtotal = $rowC['dVentaDLLtotal'];
               # Calcular
               $dVentaxHoraMN  = $dVentaMNtotal - $acumuladoMN; 
               $dVentaxHoraDLL = $dVentaDLLtotal - $acumuladoDLL;
               # Redondear
               $dVentaxHoraMN = round($dVentaxHoraMN  * 100) / 100;
               $dVentaxHoraDLL = round($dVentaxHoraDLL * 100) / 100 ;
               
               $acumuladoMN=0;
               $acumuladoDLL=0;
               $contsWbs=0;
            }
            else{
               $acumuladoMN+=$dVentaxHoraMN;
               $acumuladoDLL+=$dVentaxHoraDLL;
            }
      }
      $contsWbs++;
      $f = $row[2]."-".$row[3]."-".ultimodia($row[2],$row[3]);
      $sql = "INSERT INTO ordenes_programamensual (sContrato,sIdConvenio,sWbs,sNumeroActividad,dIdFecha,DT,DEmn,DEdll,sNumeroOrden) VALUES ('$Contrato', '$sIdConvenio','$row[0]','$row[1]','$f','$row[4]',$dVentaxHoraMN,$dVentaxHoraDLL, '$sNumeroOrden')";
      mysql_query($sql);
      if(mysql_error()){
            mensaje("No se Realizo la Distribucion Mensual, se Anulara Todo !!! ".mysql_error());
            echo "<br><br><a href='index.php'>Regresar</a>"; 
            mysql_query("rollback");
            exit(0);
      }
   }
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
