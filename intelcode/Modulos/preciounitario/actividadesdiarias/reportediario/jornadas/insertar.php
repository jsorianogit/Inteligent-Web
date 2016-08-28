<?php
require ("../../../../include/mysql.inc.php");
//incluir funciones de obtencion de jornadas diarias
require ("functions.php");
#verifica si es Tiempo Inactivo y si tiene tipo de Movimiento
if($_POST['sTipo']=="Tiempo Inactivo"){
   if($_POST['sIdTipoMovimiento']==""){
      mensaje("Debe de especificar una clasificacion , Para el Tiempo Inactivo!!");
      location("menu.php");
      exit(0);
   }
}
if($_POST['mDescripcion']=="" )
   $_POST['mDescripcion'] = "*";

mysql_query("begin");
#OBTENER LA JORNADA DE DIAS ESPECIALES SI EXISTE
$sql = "select iJornada from diasespeciales where sContrato='$sContrato' and dIdFecha='".$_SESSION['dIdFecha']."';";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $iJornadaDiaEspecial = $row['iJornada'];

}

#OBTENER LAS JORNADAS A TRABAJAR EN EL DIA
$sql = "select iJornada from ordenesdetrabajo where sContrato='$sContrato' and sNumeroOrden = '".$_SESSION['sNumeroOrden']."';";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $iJornadaOrdenesdeTrabajo = $row['iJornada'];

}

if($iJornadaDiaEspecial){
  
   if($iJornadaDiaEspecial >= 10){
      $JornadaDiariaFormat = $iJornadaDiaEspecial.":00";
   }
   else{
      $JornadaDiariaFormat = "0".$iJornadaDiaEspecial.":00";
   }
}
else if($iJornadaOrdenesdeTrabajo <1){
   #Si las jornadas de ordenes de trabajo es igual a cero, sacar
   #las jornadas de la configuracion
   $iJornadas = Jornadas();
   #Obtener la jornada de la fecha 
   $JornadasxDia = JornadasDia($_SESSION['dIdFecha'],$iJornadas);
   #convertirlo a formato de hora
   $arrayHora = explode(".",$JornadasxDia);
   $hora = $arrayHora[0];
   $minuto = ($arrayHora[1]*60)/100;
   if($hora < 10) $hora = "0$hora";
   if($minuto < 10)$minuto = "0$minuto";
   $JornadaDiariaFormat = $hora.":".$minuto;
}
else{

   if($iJornadaOrdenesdeTrabajo >= 10){
      $JornadaDiariaFormat = $iJornadaOrdenesdeTrabajo.":00";
   }
   else{
      $JornadaDiariaFormat = "0".$iJornadaOrdenesdeTrabajo.":00";
   }
}



$iJornadas = Jornadas();
//Obtener la jornada de la fecha
$JornadasxDia = JornadasDia($_SESSION['dIdFecha'],$iJornadas);
 //Aplicables para ambos casos(Disponibilidad de Sitio ó Tiempos Muertos)

  //Verificar que la hora de inicio ingresada es menor que la hora final ingresada
   if(CompararHoras($_POST['sHoraInicio'],$_POST['sHoraFinal'])){
      mensaje("La hora de fin de actividades es menor que la hora de inicio !!");
      location("menu.php");
      exit(0);
   }
   //Calcular el tiempo inhabil desde la hora de inicio hast la hora final
 $JornadaHabil = RestarHoras($_POST['sHoraInicio'],$_POST['sHoraFinal']);
 //Verificar que las jornadas trabajadas, son mayores a lor tiempos de comida
   if(!CompararHoras($JornadaHabil,$_POST['sTiempoComida'])){
      mensaje("La Hora de Comida es Mayor que la Disponibilidad / Tiempo Inactivo!!");
      location("menu.php");
      exit(0);
   }
//Jornadas habiles menos tiempo de comida
$JornadaHabil = RestarHoras($_POST['sTiempoComida'],$JornadaHabil);

#verificar que las horas de inicio y fin esten dentro del rango de disponibilidades existentes
if($_POST['sTipo']!="Disponibilidad del Sitio"){
   require("fnVerificarRango.php");
}

#verificar que si existe tiempo muerto, si existen checkar que la disponibilidad caiga en el rango del tiempo inactivo
if($_POST['sTipo']=="Disponibilidad del Sitio"){
   require("fnVerificarJornada.php");
}
 
//Aplicable solo a Disponibilidad de Sitio


if($_POST['sTipo']=="Disponibilidad del Sitio"){

 //Verificar que la hora de salida es mayor o igual a la hora de llegada
   if(CompararHoras($_POST['sHoraSalida'],$_POST['sHoraLlegada'])){
      mensaje("La hora de salida no puede ser mayor a la hora de llegada!!");
      location("menu.php");
      exit(0);
   }
 //Verificar que la hora de salida es mayor o igual a la hora de salida
   if(CompararHoras($_POST['sHoraLlegada'],$_POST['sHoraInicio'])){
      mensaje("La hora de llegada no puede ser mayor a la hora de inicio de actividades !!");
      location("menu.php");
      exit(0);
   }

   //Sacar el total de personal actual almacenado
   $sql = " SELECT SUM(dFrente) 
            FROM jornadasdiarias 
            WHERE sContrato='$sContrato' AND sNumeroOrden='".$_SESSION['sNumeroOrden']."' 
               AND dIdFecha='".$_SESSION['dIdFecha']."' AND sIdTurno='".$_SESSION['sIdTurno']."' AND sTipo<>'Tiempo Inactivo'";
   $result = mysql_query($sql);
   if ($row = mysql_fetch_array($result)){
      $TotalPersonal=$row[0];
   }
      
     if(($TotalPersonal+$_POST['dFrente']) > 0){
      //recalcular las jornadas habiles para las disponibilidades ya guardadas
      $SumadorJornada=0;
      $SumadorPersonal=0;
      $sql = "SELECT * 
              FROM jornadasdiarias 
              WHERE sContrato='$sContrato' AND sNumeroOrden='".$_SESSION['sNumeroOrden']."' 
              AND dIdFecha='".$_SESSION['dIdFecha']."' AND sIdTurno='".$_SESSION['sIdTurno']."' AND sTipo<>'Tiempo Inactivo'";
      $result = mysql_query($sql);
      while($row = mysql_fetch_array($result)) {
         //Total de Minutos habiles
         $MinutosJornada=HourToMinutes($row['sJornada']);
         $Tiempo=( $row['dFrente'] * ($MinutosJornada) ) / ($TotalPersonal+$_POST['dFrente']);
         $SumadorJornada += $Tiempo;
         $SumadorPersonal += $row['dFrente'];
      }
      
      //Calcular la jornada habil que se esta registrando
        $MinutosJornada=HourToMinutes($JornadaHabil);
      $Tiempo = ( $_POST['dFrente'] * $MinutosJornada ) / ($TotalPersonal+$_POST['dFrente']);
      $SumadorJornada += $Tiempo ;
      $SumadorPersonal += $_POST['dFrente'];
      //convertir los minutos a hora
      $sTotalHoraHabil = $SumadorJornada /60;
      //darle formato de hora
      $sHoraHabil = NumberToHour($sTotalHoraHabil);
      //Si la jornada total laborada es menor que la jornada de configuracion, insertar un TMDS
      if(!CompararHoras($sHoraHabil,$JornadaDiariaFormat)){
         $sTiempoMuerto = RestarHoras($sHoraHabil,$JornadaDiariaFormat);
            if($sTiempoMuerto!="00:00"){
            if($_POST['motivo']=="" OR $_POST['motivo']=="*")
                $Descripcion = "Tiempo Inactivo Por Ajuste de Jornada";
            else
                $Descripcion = $_POST['motivo'];
            $sql ="INSERT INTO
               jornadasdiarias
               (sContrato,dIdFecha,sNumeroOrden,sIdTurno,sTipo,dFrente,sIdTipoMovimiento,mDescripcion,sJornada)
               VALUES ('$sContrato','".$_SESSION['dIdFecha']."',
                  '".$_SESSION['sNumeroOrden']."','".$_SESSION['sIdTurno']."','Tiempo Inactivo',
                  '$SumadorPersonal' ,'TMDS' ,'".$Descripcion."','$sTiempoMuerto' )
               ON DUPLICATE KEY UPDATE dFrente=dFrente + '".$_POST['dFrente']."' , sJornada='$sTiempoMuerto';";
            mysql_query($sql);
            if(mysql_error()){
               mensaje(mysql_error());
               mysql_query("rollback");
               location("mostrar.php");
               exit(0);
            }
         }
      }else{//Si la jornada total a laborar es mayor que la jornada de configuracion, no hay TMDS
         mysql_query("DELETE FROM jornadasdiarias 
                     WHERE sContrato='$sContrato' AND dIdFecha='".$_SESSION['dIdFecha']."' AND sNumeroOrden='".$_SESSION['sNumeroOrden']."' 
                        AND sIdTurno='".$_SESSION['sIdTurno']."' AND sIdTipo='Tiempo Inactivo' AND sIdTipoMovimiento='TMDS'");
      }
   }
}

//Insertar la disponibilidad o Tiempo inactivo
$sql = "
INSERT INTO 
jornadasdiarias (sContrato,dIdFecha,sNumeroOrden,sIdTurno,sTipo,sIdPernocta,sHoraSalida,sIdPlataforma,sIdEmbarcacion,sHoraLlegada,sHoraInicio,sHoraFinal,sTiempoComida,dFrente,sIdTipoMovimiento,sArea,mDescripcion,sJornada) 
VALUES ('".$sContrato."','".$_SESSION['dIdFecha']."','".$_SESSION['sNumeroOrden']."','".$_SESSION['sIdTurno']."','".$_POST['sTipo']."','".$_POST['sIdPernocta']."','".$_POST['sHoraSalida']."','".$_POST['sIdPlataforma']."' ,'".$_POST['sIdEmbarcacion']."' ,'".$_POST['sHoraLlegada']."' ,'".$_POST['sHoraInicio']."' ,'".$_POST['sHoraFinal']."' ,'".$_POST['sTiempoComida']."' ,'".$_POST['dFrente']."' ,'".$_POST['sIdTipoMovimiento']."' ,'".$_POST['sArea']."' ,'".$_POST['mDescripcion']."','$JornadaHabil')";
mysql_query($sql);
if(mysql_error()){
   mensaje(mysql_error());
   mysql_query("rollback");
   location("mostrar.php");
   exit(0);
}

mysql_query("commit");

location("mostrar.php");
?>
