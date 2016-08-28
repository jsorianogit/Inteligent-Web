<?php
require ("../../../../include/mysql.inc.php");
$sql = "UPDATE jornadasdiarias SET
 sTipo = '".$_POST['sTipo']."' ,
 sIdPernocta = '".$_POST['sIdPernocta']."' ,
 sHoraSalida = '".$_POST['sHoraSalida']."' ,
 sIdPlataforma = '".$_POST['sIdPlataforma']."' ,
 sIdEmbarcacion = '".$_POST['sIdEmbarcacion']."' ,
 sHoraLlegada = '".$_POST['sHoraLlegada']."' ,
 sHoraInicio = '".$_POST['sHoraInicio']."' ,
 sHoraFinal = '".$_POST['sHoraFinal']."' ,
 sTiempoComida = '".$_POST['sTiempoComida']."' ,
 dFrente = '".$_POST['dFrente']."' ,
 sIdTipoMovimiento = '".$_POST['sIdTipoMovimiento']."' ,
 sArea = '".$_POST['sArea']."' ,
 mDescripcion = '".$_POST['mDescripcion']."'
 WHERE sContrato='".$sContrato."' AND dIdFecha = '".$_SESSION['dIdFecha']."' AND    sNumeroOrden = '".$_SESSION['sNumeroOrden']."' AND sIdTurno = '".$_SESSION['sIdTurno']."' AND sTipo='".$_SESSION['sTipo']."' AND sIdPernocta='".$_SESSION['sIdPernocta']."' AND sIdEmbarcacion='".$_SESSION['sIdEmbarcacion']."' AND sHoraInicio='".$_SESSION['sHoraInicio']."' AND sHoraFinal = '".$_SESSION['sHoraFinal']."' ; ";
 mysql_query($sql);
 if(mysql_error())
   mensaje(mysql_error());
location("mostrar.php");
?>