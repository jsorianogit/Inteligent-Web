<?php
#verificar si existen jornadas
$logico = true;
$sqlVerificaJor = "select
                     sHoraInicio,
                     sHoraFinal
                    from
                     jornadasdiarias
                    where
                     sContrato='$sContrato'
                     and dIdFecha='".$_SESSION['dIdFecha']."'
                     and sNumeroOrden='".$_SESSION['sNumeroOrden']."'
                     and sIdTurno='".$_SESSION['sIdTurno']."'
                     and sTipo='Tiempo Inactivo'
                     and sIdTipoMovimiento<>'TMDS'";
$rsVerificaJornada = mysql_query($sqlVerificaJor);
if($rowVerificaJornada = mysql_fetch_array($rsVerificaJornada)){
   $logico = false;
}
if(!$logico){
      mensaje("Error :\\nExiste uno o mas tiempos inactivos, para poder insertar la disponibilidad del sitio debera hacer lo siguiente,\\n 1. primero deberá eliminar los tiempos inactivos.\\n2. Despues insertar las disponibilidades.\\n 3. posteriormente insertar los tiempos inactivos de nuevo!!");
      location("menu.php");
      exit(0);
}
?>
