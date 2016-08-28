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
      if($dia == $NomDia)
         return $jornada;
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
# devuelve true si fechaini es mayor o igual que fecha fin
function CompararHoras2($horaini,$horafin)
{
    $horai=substr($horaini,0,2);
    $mini=substr($horaini,3,2);

    $horaf=substr($horafin,0,2);
    $minf=substr($horafin,3,2);

    $ini=((($horai*60)*60)+($mini*60));
    $fin=((($horaf*60)*60)+($minf*60));

    if($ini > $fin)
      return "mayor" ;
    else if($ini == $fin)
      return "igual" ;
    else if($ini < $fin)
      return "menor";
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
function sTiempoMuertoTMDS($sJornada,$iTotalPersonal, $iTotalFrente, $iFrente )
{
   $sMinutosJornada  = HourToMinutes($sJornada);
   $sMinutosMuertos = $sMinutosJornada * $iFrente;
   if($sMinutosMuertos >0 and $iTotalPersonal>0)
      $sMinutosMuertos = $sMinutosMuertos / $iTotalPersonal;
   else if($iTotalPersonal<=0 and $iTotalFrente>0)
      $sMinutosMuertos = $sMinutosMuertos / $iTotalFrente;
   else
      $sMinutosMuertos = 0;


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
?>
