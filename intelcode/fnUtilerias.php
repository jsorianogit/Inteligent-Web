<?php
# devuelve un array con as jornadas a trabajar en cada dia, tomadas de la tabla configuracion
   function Jornadas(){
      global $sContrato;
      setlocale(LC_TIME,"es_ES");
      //la fecha 05 - 11 - 2006 es domingo, es la semilla para iniciar el nombre del dia
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
      //obtener las jornadas  por dia de la semana
      $sql ="SELECT iJLunes,iJMartes,iJMiercoles,iJJueves,iJViernes,iJSabado,iJDomingo,txtMaterialAutomatico  FROM configuracion WHERE sContrato='$sContrato'";
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
      return $iJornadas;
   }
# regresa la jornada trabajada en X dia
function JornadasDia($fecha,$iJornadas){
   setlocale(LC_TIME,"es_ES");
   if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("/", $fecha);
   if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("-",$fecha);
   $seconds = mktime(0,0,0,$mes,$dia,$ano);
   $NomDia = strftime("%A",$seconds);
   foreach($iJornadas as $dia => $jornada){
      if($dia == $NomDia){
         $Tjornada = explode(".",$jornada);
         return $Tjornada[0];
      }
   }
   return 0;
}

# Formato de 12 horas
function formatoHoras($hora){
   switch($hora){
      case (13):return '01';break;
      case (14):return '02';break;
      case (15):return '03';break;
      case (16):return '04';break;
      case (17):return '05';break;
      case (18):return '06';break;
      case (19):return '07';break;
      case (20):return '08';break;
      case (21):return '09';break;
      case (22):return '10';break;
      case (23):return '11';break;
      case (00):return '12';break;
   }
}
# resta horas : $horaini - $horafin
function RestarHoras($horaini,$horafin)
{

    $horai=substr($horaini,0,2);
    $mini=substr($horaini,3,2);

    $horaf=substr($horafin,0,2);
    $minf=substr($horafin,3,2);

    $ini=((($horai*60)*60)+($mini*60));
    $fin=((($horaf*60)*60)+($minf*60));

    $dif=$fin-$ini;

    $difh=floor($dif/3600);
    $difm=floor(($dif-($difh*3600))/60);
    return date("H:i",mktime($difh,$difm));
}
# Suma la hora $horafin a $horaini
function SumarHoras($horaini,$horafin)
{
    $horai=substr($horaini,0,2);
    $mini=substr($horaini,3,2);

    $horaf=substr($horafin,0,2);
    $minf=substr($horafin,3,2);

    $ini=((($horai*60)*60)+($mini*60));
    $fin=((($horaf*60)*60)+($minf*60));

    $dif=$fin+$ini;

    $difh=floor($dif/3600);
    $difm=floor(($dif-($difh*3600))/60);
    return date("H:i",mktime($difh,$difm));
}
# devuelve true si fechaini es mayor o igual que fecha fin
function CompararHoras($horaini,$horafin)
{
    $horai=substr($horaini,0,2);
    $mini=substr($horaini,3,2);

    $horaf=substr($horafin,0,2);
    $minf=substr($horafin,3,2);

    $ini=((($horai*60)*60)+($mini*60));
    $fin=((($horaf*60)*60)+($minf*60));

    if($fin >= $ini)
      return false ;
    else
      return true ;
}
# convierte un numero entero o decimal a hora

function NumberToHour($sDecimal){
   //solo dejar dos decimales
   $sDecimal = round($sDecimal*100)/100;
   $sDecimalA =explode(".",$sDecimal);
   //si en los minutos hay un decimal desaparecerlo
   if(strlen($sDecimalA[1]) == 1)$sDecimalA[1]=$sDecimalA[1]."0";
   $sDecimalA[1] = (($sDecimalA[1]*60)/100);
   $sDecimalA[1] = round($sDecimalA[1]*1)/1;
   //si solo es un decimal agregarle el complemento cero de la izquierda
   if($sDecimalA[0] < 10)$sDecimalA[0]="0".$sDecimalA[0];
   if($sDecimalA[1] < 10)$sDecimalA[1]="0".$sDecimalA[1];
   if($sDecimalA[0] =="")$sDecimalA[0]="00";
   if($sDecimalA[1] =="")$sDecimalA[1]="00";
   //unir y crear completamente la fecha
   return ($sDecimalA[0] . ":" .$sDecimalA[1]);
}
# convierte una hora a minutos
function HourToMinutes($sHora){
   //dividir la hora de los minutos
   $sHoraMinuto = explode(":",$sHora);
   //Total de Minutos Muerto
   $Minutos=($sHoraMinuto[0]*60)+$sHoraMinuto[1];
   return $Minutos;
}

#sTiempoMuerto
function sTiempoMuerto($iTotalPersonal, $iTotalFrente, $iFrente, $Fecha,$sHoraInicio,$sHoraFinal,$sTiempoComida,$sContrato,$sOrden )
{

   #OBTENER LAS JORNADAS A TRABAJAR EN EL DIA
   $sql = "select iJornada from ordenesdetrabajo where sContrato='$sContrato' and sNumeroOrden = '$sOrden';";
   $result = mysql_query($sql);
   if($row = mysql_fetch_array($result)){
      $iJornadaOrdenesdeTrabajo = $row['iJornada'];
   }
   if($iJornadaOrdenesdeTrabajo <= 0){
      #Si las jornadas de ordenes de trabajo es igual a cero, sacar
      #las jornadas de la configuracion
      $iJornadas = Jornadas();
      #Obtener la jornada de la fecha
      $JornadasxDia = JornadasDia($Fecha,$iJornadas);
      #convertirlo a formato de hora
      $JornadaDiariaFormat = NumberToHour($JornadasxDia);
   }
   else{
      $JornadaDiariaFormat = NumberToHour($iJornadaOrdenesdeTrabajo);
   }

   #DETERMINAR LAS HORAS TRABAJADAS
   $sJornadasHechas = RestarHoras($sHoraInicio,$sHoraFinal);
   if($sTiempoComida != "00:00"){
      $sJornadasHechas = RestarHoras($sTiempoComida,$sJornadasHechas);
   }

   #DETERMINAR LAS HORAS NO TRABAJADAS
   $sTiempoInactivo  ="00:00";
   if($JornadaDiariaFormat != "00:00"){
      $sTiempoInactivo = RestarHoras($sJornadasHechas,$JornadaDiariaFormat);
   }

   #CONVERTIR LAS HORAS NO TRABAJADAS EN MINUTOS
   $sTiempoInactivoMin = HourToMinutes($sJornadasHechas);
   #DETERMINAR EL TIEMPO INACTIVO POR DISPONIBILIDAD DE SITIO
   if($iTotalPersonal>0){
      $sTiempoMuerto = ($sTiempoInactivoMin * $iFrente) / $iTotalPersonal;
   }
   else{
      $sTiempoMuerto = ($sTiempoInactivoMin * $iFrente) / $iTotalFrente;
   }
   #CONVERTIR EL TIEMPO MUERTO DE MINUTOS A HORAS
   $sTiempoMuerto = $sTiempoMuerto / 60;
   $sTiempoMuerto = NumberToHour($sTiempoMuerto);
   $sTiempoMuerto = SumarHoras($sTiempoMuerto,"00:00");
   return $sTiempoMuerto;
}
//Tiempo Muerto para un TMDS
function sTiempoMuertoTMDS($sJornada,$iTotalPersonal,$iFrente )
{

   #parametros
   if($iFrente=="" or $iFrente==0)$iFrente=1;
   if($iTotalPersonal=="" or $iTotalPersonal==0)$iTotalPersonal=$iFrente;

   #convertir la jornada a minutos
   $sMinutosJornada  = HourToMinutes($sJornada);

   #multiplicar los minutos de la jornada por el frente
   $sMinutosMuertos = $sMinutosJornada * $iFrente;

   #calcular el tiempo muerto o tiempo efectivo
   if($sMinutosMuertos>0){
      $sMinutosMuertos = $sMinutosMuertos / $iTotalPersonal;
   }
   else{
      $sMinutosMuertos = 0;
   }
/*
   if($sMinutosMuertos >0 and $iTotalPersonal>0)
      $sMinutosMuertos = $sMinutosMuertos / $iTotalPersonal;
   else if($iTotalPersonal<=0 and $iTotalFrente>0)
      $sMinutosMuertos = $sMinutosMuertos / $iTotalFrente;
   else
      $sMinutosMuertos = 0;
*/

   #CONVERTIR EL TIEMPO MUERTO DE MINUTOS A HORAS
   $sTiempoMuerto = $sMinutosMuertos / 60;
   $sTiempoMuerto = NumberToHour($sTiempoMuerto);
   $sTiempoMuerto = SumarHoras($sTiempoMuerto,"00:00");

   return $sTiempoMuerto;
}
//sfnTiempoEfectivo
function sTiempoInactivo($iTotalPersonal, $iTotalFrente, $iFrente, $sHoraInicio,$sHoraFinal,$sTiempoComida )
{

   #DETERMINAR LAS HORAS INACTIVAS
   $sJornadasInactiva = RestarHoras($sHoraInicio,$sHoraFinal);
   if($sTiempoComida != "00:00"){
      $sJornadasInactiva = RestarHoras($sTiempoComida,$sJornadasInactiva);
   }

   #CONVERTIR LAS HORAS TRABAJADAS EN MINUTOS
   $sTiempoInactivoMin  = HourToMinutes($sJornadasInactiva);
   #DETERMINAR EL TIEMPO TRABAJADO REAL
   if($iTotalPersonal!=0){
      $sTiempoMuerto = ($sTiempoInactivoMin * $iFrente) / $iTotalPersonal;
   }
   else{
      $sTiempoMuerto = ($sTiempoInactivoMin * $iFrente) / $iTotalFrente;
   }
   #CONVERTIR EL TIEMPO MUERTO DE MINUTOS A HORAS
   $sTiempoMuerto = $sTiempoMuerto / 60;
   $sTiempoMuerto = NumberToHour($sTiempoMuerto);
   $sTiempoMuerto = SumarHoras($sTiempoMuerto,"00:00");
   return $sTiempoMuerto;
}

function sTiempoMuertoIri($sMuerto, $iTotalPersonal, $iFrente, $iJornada )
{
    $MinutosMuerto = HourToMinutes($sMuerto);
    $iMinutosMuerto = $MinutosMuerto * $iFrente ;

    If ($iMinutosMuerto > 0 )
      $PorcMuerto = $iMinutosMuerto / $iTotalPersonal;
    Else
      $PorcMuerto = 0 ;
    $PorcMuerto = $PorcMuerto * $iJornada ;
    $PorcMuerto = $PorcMuerto / 60;
    $sTiempoMuerto  = NumberToHour($PorcMuerto);
    return $sTiempoMuerto = $sMuerto ;
}

#entero = año-mes-dia - año-mes-dia
function restarFecha($dFecIni, $dFecFin){
   #fecha inicial
   if(strpos($dFecIni,"/")!==false)
      list($anoini,$mesini,$diaini) = explode('/',$dFecIni);
   else if(strpos($dFecIni,"-")!==false)
      list($anoini,$mesini,$diaini) = explode('-',$dFecIni);

   #fecha final
   if(strpos($dFecFin,"/")!==false)
      list($anofin,$mesfin,$diafin) = explode('/',$dFecFin);
   else if(strpos($dFecFin,"-")!==false)
      list($anofin,$mesfin,$diafin) = explode('-',$dFecFin);

   $date1 = mktime(0,0,0,$mesini,$diaini, $anoini);
   $date2 = mktime(0,0,0,$mesfin,$diafin, $anofin);

   return round(($date2 - $date1) / (60 * 60 * 24));
}
#compara fechas
function comparaFecha($dFecIni, $dFecFin){
   #fecha inicial
   if(strpos($dFecIni,"/")!==false)
      list($anoini,$mesini,$diaini) = explode('/',$dFecIni);
   else if(strpos($dFecIni,"-")!==false)
      list($anoini,$mesini,$diaini) = explode('-',$dFecIni);

   #fecha final
   if(strpos($dFecFin,"/")!==false)
      list($anofin,$mesfin,$diafin) = explode('/',$dFecFin);
   else if(strpos($dFecFin,"-")!==false)
      list($anofin,$mesfin,$diafin) = explode('-',$dFecFin);

   $date1 = mktime(0,0,0,$mesini,$diaini, $anoini);
   $date2 = mktime(0,0,0,$mesfin,$diafin, $anofin);

   if($date1 > $date2)
      return "Mayor";
   else if($date1 < $date2)
      return "Menor";
   else if($date1 == $date2)
      return "Iguales";
}
//semanas entre fechas
function semanasEntreFechas($fechaA,$fechaB){
   $diasEntreFechas = restarFecha($fechaA, $fechaB);
   $semanas = $diasEntreFechas / 7;
   return round($semanas);

}
//incremente una fecha en n dia
function fecha_mas_dias($fecha,$ndias){
  if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("/", $fecha);
  if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("-",$fecha);
  $nueva = mktime(0,0,0,$mes,$dia,$ano) + $ndias * 24 * 60 * 60;
  $nuevafecha=date("Y-m-d",$nueva);
  return $nuevafecha;
}
//incremente una fecha en un mes
function suma_fechas($fecha,$ndias){
  if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("/", $fecha);
  if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("-",$fecha);
  $nueva = mktime(0,0,0,$mes,$dia,$ano) + $ndias * 24 * 60 * 60;
  $nuevafecha=date("Y-m-d",$nueva);
  $ultimoDia = ultimodia($ano,$mes+1);
  $nueva = mktime(0,0,0,$mes+1,$ultimoDia,$ano);
  $nuevafecha=date("Y-m-d",$nueva);
  return $nuevafecha;
}
#regresa el ultimo dia de un mes
function ultimodia($ayno,$mes){
   $ultimodia = mktime(0, 0, 0,$mes+1, 0, $ayno);
   return $ultimo = strftime("%d", $ultimodia);
}
#function ultimodia($anho,$mes){
#   if (( fmod($anho,4)==0 or fmod($anho,400)==0) and fmod($anho,100)!=0 ) {
#       $dias_febrero = 29;
#   } else {
#       $dias_febrero = 28;
#   }
#   switch($mes) {
#       case 1: return 31; break;
#       case 2: return $dias_febrero; break;
#       case 3: return 31; break;
#       case 4: return 30; break;
#       case 5: return 31; break;
#       case 6: return 30; break;
#       case 7: return 31; break;
#       case 8: return 31; break;
#       case 9: return 30; break;
#       case 10: return 31; break;
#       case 11: return 30; break;
#       case 12: return 31; break;
#   }
#}

#regresa el nombre de un mes a partir de una fecha
function nombre_mes($fecha){
  setlocale(LC_TIME,"es_MX");
     if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
             list($ano,$mes,$dia)=split("/", $fecha);
     if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
             list($ano,$mes,$dia)=split("-",$fecha);
  $iFecha = mktime(0,0,0,$mes,$dia,$ano);
  $nombreMes = strftime("%b",$iFecha);
  return $nombreMes;
}
//regresa el año a partir de una fecha completa
function anio($fecha){
  setlocale(LC_TIME,"es_MX");
     if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
             list($ano,$mes,$dia)=split("/", $fecha);
     if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
             list($ano,$mes,$dia)=split("-",$fecha);
    return $ano;
}
#redondea a dos decimales una cantidad tipo real
function redondear_dos_decimal($valor) {
   $float_redondeado=round($valor * 100) / 100;
   return $float_redondeado;
}
#regresa una fecha dada en formato dd/mm/yyyy
function formatoFecha($fecha){
  if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("/", $fecha);
  if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("-",$fecha);
  $nueva = mktime(0,0,0,$mes,$dia,$ano);
  $nuevafecha = date("d/m/Y",$nueva);
  return $nuevafecha;
}
#regresa una fecha dada en formato
function formatoFechaPer($fecha,$formato){
               //2007/10/31
  if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha)){
      list($dia,$mes,$ano)=split("/", $fecha);
  }
  else         //2007-10-31
  if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha)){
      list($dia,$mes,$ano)=split("-",$fecha);
  }
  else        //31-10-2007
  if (preg_match("/[0-9]{1,2}\/[0-9]{1,2}\/([0-9][0-9]){1,2}/",$fecha)){
      list($dia,$mes,$ano)=split("/", $fecha);
   }
  else      //31/10/2007
  if (preg_match("/[0-9]{1,2}-[0-9]{1,2}-([0-9][0-9]){1,2}/",$fecha)){
      list($dia,$mes,$ano)=split("-",$fecha);
  }


  if($formato=="Y-m-d"){
      $nueva = mktime(0,0,0,$mes,$dia,$ano);
      $nuevafecha = date("Y-m-d",$nueva);
  }
  if($formato=="Y/m/d"){
      $nueva = mktime(0,0,0,$mes,$dia,$ano);
      $nuevafecha = date("Y/m/d",$nueva);
  }
  if($formato=="d/m/Y"){
      $nueva = mktime(0,0,0,$mes,$dia,$ano);
      $nuevafecha = date("d/m/Y",$nueva);
  }
  if($formato=="d-m-Y"){
      $nueva = mktime(0,0,0,$mes,$dia,$ano);
      $nuevafecha = date("d-m-Y",$nueva);
  }
  return $nuevafecha;
}
#incremente una fecha en un dia
function suma_fechas_dias($fecha,$ndias){
  if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("/", $fecha);
  if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("-",$fecha);
  $nueva = mktime(0,0,0,$mes,$dia+$ndias,$ano);
  $nuevafecha=date("Y-m-d",$nueva);
  return $nuevafecha;
}
#incremente una fecha en un dia
function incFechas($fecha){
  if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("/", $fecha);
  if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("-",$fecha);

 $nueva = mktime(0,0,0,$mes,$dia+1,$ano);
 return date("Y-m-d",$nueva);
}
function nombre_mes_espanol($fecha){
  setlocale(LC_TIME,"es_MX");
     if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
             list($ano,$mes,$dia)=split("/", $fecha);
     if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
             list($ano,$mes,$dia)=split("-",$fecha);
   switch($mes){
      case '01':return "Enero";break;
      case '02':return "Febrero";break;
      case '03':return "Marzo";break;
      case '04':return "Abril";break;
      case '05':return "Mayo";break;
      case '06':return "Junio";break;
      case '07':return "Julio";break;
      case '08':return "Agosto";break;
      case '09':return "Septiembre";break;
      case '10':return "Octubre";break;
      case '11':return "Noviembre";break;
      case '12':return "Diciembre";break;
   }
}
function nombreDia($fecha){
      setlocale(LC_TIME,"es_ES");
      //la fecha 05 - 11 - 2006 es domingo, es la semilla para iniciar el nombre del dia
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

      if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
         list($ano,$mes,$dia)=split("/", $fecha);
      if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
         list($ano,$mes,$dia)=split("-",$fecha);

      $seconds = mktime(0,0,0,$mes,$dia,$ano);
      $NomDia = strftime("%A",$seconds);

      if($NomDia==$lunes){return "Lunes"; }
      if($NomDia==$martes){return "Martes"; }
      if($NomDia==$miercoles){return "Miercoles"; }
      if($NomDia==$jueves){return "Jueves"; }
      if($NomDia==$viernes){return "Viernes"; }
      if($NomDia==$sabado){return "Sabado"; }
      if($NomDia==$domingo){return "Domingo"; }
}
function obtener_dia_numerico($fecha){
     if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
             list($ano,$mes,$dia)=split("/", $fecha);
     if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
             list($ano,$mes,$dia)=split("-",$fecha);
     return $dia;
}
#elimina el carater (Alt + 255) = " "
function deleteAlt255($word){
   for($i=0;$i<strlen($word);$i++){
      if($word[$i]==" ")$word[$i]="^";
      if($word[$i]=="^")$word[$i]=" ";
   }
   $word=trim($word);
   return $word;
}
#firmantes
function firmantes($sContrato,$sNumeroOrden,$dFecha){
global $sSuperintendente;
global $sSuperintendentePatio;
global $sRepresentanteTecnico;
global $sSupervisor;
global $sSupervisorPatio;
global $sSupervisorGenerador;
global $sSupervisorEstimacion;
global $sSupervisorTierra;
global $sResidente;
global $sSupervisorSubContratista;

global $sPuestoSuperintendente;
global $sPuestoSuperintendentePatio;
global $sPuestoRepresentanteTecnico;
global $sPuestoSupervisor;
global $sPuestoSupervisorPatio;
global $sPuestoSupervisorGenerador;
global $sPuestoSupervisorEstimacion;
global $sPuestoSupervisorTierra;
global $sPuestoResidente;
global $sPuestoSupervisorSubContratista;
   if($sNumeroOrden!="")
      $andNumeroOrden = " and sNumeroOrden='$sNumeroOrden' ";
      $sql="Select *
      from firmas
      where sContrato = '$sContrato' $andNumeroOrden And dIdFecha = '$dFecha';";
   $rs = mysql_query($sql);
   if($row = mysql_fetch_array($rs)){
      $sSuperintendente = $row['sFirmante1'] ;
      $sSuperintendentePatio = $row['sFirmante7'] ;
      $sRepresentanteTecnico = $row['sFirmante9'] ;
      $sSupervisor = $row['sFirmante2'] ;
      $sSupervisorPatio = $row['sFirmante8'] ;
      $sSupervisorGenerador = $row['sFirmante3'] ;
      $sSupervisorEstimacion = $row['sFirmante4'] ;
      $sSupervisorTierra = $row['sFirmante5'] ;
      $sResidente = $row['sFirmante6'] ;
      $sSupervisorSubContratista = $row['sFirmante10'] ;

      $sPuestoSuperintendente = $row['sPuesto1'] ;
      $sPuestoSuperintendentePatio = $row['sPuesto7'] ;
      $sPuestoRepresentanteTecnico = $row['sPuesto9'] ;
      $sPuestoSupervisor = $row['sPuesto2'] ;
      $sPuestoSupervisorPatio = $row['sPuesto8'] ;
      $sPuestoSupervisorGenerador = $row['sPuesto3'] ;
      $sPuestoSupervisorEstimacion = $row['sPuesto4'] ;
      $sPuestoSupervisorTierra = $row['sPuesto5'] ;
      $sPuestoResidente = $row['sPuesto6'] ;
      $sPuestoSupervisorSubContratista= $row['sPuesto10'] ;
   }
   else{
      $sql="Select *
         from firmas where sContrato = '$sContrato' $andNumeroOrden and dIdFecha <= '$dFecha' Order By dIdFecha DESC";
      $rs = mysql_query($sql);
      if($row = mysql_fetch_array($rs)){
         $sSuperintendente = $row['sFirmante1'] ;
         $sSuperintendentePatio = $row['sFirmante7'] ;
         $sRepresentanteTecnico = $row['sFirmante9'] ;
         $sSupervisor = $row['sFirmante2'] ;
         $sSupervisorPatio = $row['sFirmante8'] ;
         $sSupervisorGenerador = $row['sFirmante3'] ;
         $sSupervisorEstimacion = $row['sFirmante4'] ;
         $sSupervisorTierra = $row['sFirmante5'] ;
         $sResidente = $row['sFirmante6'] ;
         $sSupervisorSubContratista = $row['sFirmante10'] ;

         $sPuestoSuperintendente = $row['sPuesto1'] ;
         $sPuestoSuperintendentePatio = $row['sPuesto7'] ;
         $sPuestoRepresentanteTecnico = $row['sPuesto9'] ;
         $sPuestoSupervisor = $row['sPuesto2'] ;
         $sPuestoSupervisorPatio = $row['sPuesto8'] ;
         $sPuestoSupervisorGenerador = $row['sPuesto3'] ;
         $sPuestoSupervisorEstimacion = $row['sPuesto4'] ;
         $sPuestoSupervisorTierra = $row['sPuesto5'] ;
         $sPuestoResidente = $row['sPuesto6'] ;
         $sPuestoSupervisorSubContratista= $row['sPuesto10'] ;
      }
   }

}
#verifica campos de la configuracion
function configuracion($sContrato,$campo){
   $sql = "select $campo from configuracion where sContrato='$sContrato'";
   $rs = mysql_query($sql);
   if($row = mysql_fetch_array($rs)){
      return $row[0];
   }
   else{
      return ;
   }

}
function configuracion_frentes($campo, $contrato, $frente) {
        $sql = "SELECT $campo FROM ordenesdetrabajo WHERE sContrato = '$contrato' AND sNumeroOrden = '$frente'";
        $rs = mysql_query($sql);
        if($row = mysql_fetch_array($rs)) {
                return $row[0];
        }       else    {
                return 'Nothing Found';
        }
}

#guarda procesos en archivos
function GuardaQuery($contenido,$nameLogFile="Procesos.log",$salvar=false){
   if(!$salvar)return;
   $file = fopen($nameLogFile,"a+");
   fwrite($file,"\n\n$contenido");
   fclose($file);
   return 0;
};
#separa decimales de enteros
function decimales($cadena){
   $newString = explode(".",$cadena);
   return "0.".$newString[1];
}

#separa enteros de decimales
function enteros($cadena){
   $newString = explode(".",$cadena);
   return $newString[0];
}
#recorta una cadena de texto  a partir de un punto
function recortar($cadena,$numCarac){
   $newString = explode(".",$cadena);
   $final="";
   if($newString[1]!=""){
      $cad = $newString[1];
      $final.=substr($cad, 0,$numCarac);
   }
   return $newString[0].".".$final;
}
#hacer transacciones
function queryTransaccion($sql){
      $query = mysql_query($sql);
      if(mysql_error()){
         $_SESSION['errorTransaccion']=true;
         $_SESSION['errorMySql']=mysql_error();
         GuardaQuery($sql,"ErrorTransaccionSQL.log",true);
      }
      else if($_SESSION['errorTransaccion']!=true){
         $_SESSION['errorTransaccion']=false;
      }
      return $query;
}
#01/octubre/2011 9:38 am- adal2404
#verificar permiso de botones de accion (insertar, editar, eliminar, imprimir)
function fnPrivilegiosBotones($sIdGrupo,$sIdPrograma,$sOpcionVerificar="insertar"){
    $sql="select
            eInsertar,
            eEditar,
            eEliminar,
            eImprimir,
        sFormatos
        from
          gruposxprograma
        where
            sIdPrograma = '$sIdPrograma'
            and sIdGrupo = '$sIdGrupo'";
    $rs = mysql_query($sql);
    if($rw = mysql_fetch_array($rs)){
      switch($sOpcionVerificar){
          case "insertar":
                      return $rw["eInsertar"];
                      break;
          case "editar":
                      return $rw["eEditar"];
                      break;
          case "eliminar":
                      return $rw["eEliminar"];
                      break;
          case "imprimir":
                      return $rw["eImprimir"];
                      break;

      }
    }

}

function formatFecha($fecha,$formato){

  if($formato=="Y-m-d"){
                //2007/10/31
        if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha)){
                list($ano,$mes,$dia)=split("/", $fecha);
                //echo ' '.$dia.' '.$mes.' '.$ano.' ';
        }
        else         //2007-10-31
        if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha)){
                list($dia,$mes,$ano)=split("-",$fecha);
                //echo ' '.$dia.' '.$mes.' '.$ano.' ';
        }
      $nuevafecha = $dia.'-'.$mes.'-'.$ano;
  }
  /*
  if($formato=="Y/m/d"){
      $nueva = mktime(0,0,0,$mes,$dia,$ano);
      $nuevafecha = date("Y/m/d",$nueva);
  }
  if($formato=="d/m/Y"){
      $nueva = mktime(0,0,0,$mes,$dia,$ano);
      $nuevafecha = date("d/m/Y",$nueva);
  }
  if($formato=="d-m-Y"){
      $nueva = mktime(0,0,0,$mes,$dia,$ano);
      $nuevafecha = date("d-m-Y",$nueva);
  }
  */
  return $nuevafecha;
}

        function Acortar($variable)
        {
        $longitud=80;
        $cont=0;
        $variablen="";
        if(strlen($variable)>$longitud){
                for($i=0;$i<strlen($variable);$i++)
                {
                        if($j==$longitud){
                                $agregar=$variable[$i]."\n";
                                $j=0;
                        }
                        else{
                                $agregar=$variable[$i];
                        }
                        $variablen.=$agregar;
                        $j++;
                }
        return $variable=$variablen;
        }

        }
?>
