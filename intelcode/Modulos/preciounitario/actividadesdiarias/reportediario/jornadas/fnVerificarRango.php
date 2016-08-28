<?php
#verificar si existen jornadas
$logico = true;
$existenJornadas = false;
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
                     and sTipo='Disponibilidad del Sitio'";

$rsVerificaJornada = mysql_query($sqlVerificaJor);
while($rowVerificaJornada = mysql_fetch_array($rsVerificaJornada)){

   $chInicio = CompararHoras2($_POST['sHoraInicio'],$rowVerificaJornada['sHoraInicio']);
   $cpFinal  = CompararHoras2($_POST['sHoraFinal'],$rowVerificaJornada['sHoraFinal']);
   $existenJornadas = true;
   if(($chInicio=="mayor" or  $chInicio=="igual") and ($cpFinal=="menor" or $cpFinal=="igual") ){
        $logico = true;
        break;
   }
   else {
        $logico = false;
   }

}
if(!$logico){
      mensaje("Error:\\nLa hora de inicio o termino del tiempo inactivo no concuerdan con la hora de inicio o termino de las disponibilidades existentes!!");
      location("menu.php");
      exit(0);
}
if(!$existenJornadas){
      mensaje("Advertencia :\\nNo existen Disponibilidades de Sitio.\\n Si posteriormente ingresara una disponibilidad de sitio, tendra que eliminar el tiempo inactivo!!");
}
?>
