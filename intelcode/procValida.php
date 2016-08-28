<?php
#__________________________Iniciando el proceso de validacion de reportes diarios
$lStatus=$status;

$sIdUsuarioValida = ($_SESSION['usuarioValida']!="")?$_SESSION['usuarioValida']:$_SESSION['ssUsuario'];
//$sPassword=(isset($_POST['sPassword']))?$_POST['sPassword']:'';
//$Aceptar=(isset($_POST['aceptar']))?$_POST['aceptar']:NULL;
#__________________________Proceso

#iniciar transaccion
mysql_query("begin");

#--1: Primero Elimino todo de la Bitacora de Paquetes de ese dia ...
$sql = "DELETE FROM bitacoradepaquetes
        WHERE sContrato='$sContrato' AND sIdConvenio='$sIdConvenio'
        AND sNumeroOrden='$sNumeroOrden' AND dIdFecha='$dIdFecha'";
queryTransaccion($sql);

$cadena = "### 1: $sql \n Error: " . mysql_error();
GuardaQuery($cadena);

#--2: Inserccion de todos los paquetes en 0 a la fecha seleccionada ....
$sql = "SELECT sContrato,sIdConvenio,'$dIdFecha' as dIdFecha, sNumeroOrden,sWbs,sNumeroActividad,0
        FROM actividadesxorden
        WHERE sContrato = '$sContrato' AND sIdConvenio='$sIdConvenio' AND sNumeroOrden='$sNumeroOrden' AND sTipoActividad='Paquete'";
$result = queryTransaccion($sql);

$cadena = "### 2: $sql \n Error: " . mysql_error();
GuardaQuery($cadena);

while($row = mysql_fetch_array($result)){
   $sql ="INSERT INTO bitacoradepaquetes
          (sContrato,sIdConvenio,dIdFecha,sNumeroOrden,sWbs,sNumeroActividad,dAvance)
         VALUES('".$row['sContrato']."','".$row['sIdConvenio']."','".$row['dIdFecha']."','".$row['sNumeroOrden']."','".$row['sWbs']."','".$row['sNumeroActividad']."','0')";
   queryTransaccion($sql);

   $cadena = "### 3: $sql \n Error: " . mysql_error();
   GuardaQuery($cadena);

}


#--3: Inicia Proceso de Reajuste de Paquetes ....bitacora de alcances
  # querys 4 - 7
AjustaBitacoraAlcances ($sContrato,$sNumeroOrden,$sIdTurno,$dIdFecha);


#--4: Inicia Proceso de Reajuste de Paquetes ....bitacora de actividades
   #querys 8-13
AjustaBitacoraActividades ($sContrato,$sNumeroOrden,$sIdTurno,$sIdConvenio,$dIdFecha);

#--5:
$sql = "UPDATE bitacoradepaquetes SET dAvance = dAvance / 100
         WHERE sContrato = '$sContrato' And dIdFecha = '$dIdFecha' And sIdConvenio = '$sIdConvenio'
         And sNumeroOrden = '$sNumeroOrden'";
queryTransaccion($sql);

$cadena = "### 14: $sql \n Error: " . mysql_error();
GuardaQuery($cadena);

# --6: Primero Elimino todo de la Bitacora de Paquetes de ese dia ...

$sql = "Delete from bitacoradepaquetes where sContrato = '$sContrato'
            And sIdConvenio = '$sIdConvenio'
            And sNumeroOrden = ''
            And dIdFecha = '$dIdFecha';";
queryTransaccion($sql);

$cadena = "### 15: $sql \n Error: " . mysql_error();
GuardaQuery($cadena);

#--7: Avances del Contrato ....
$sql ="Insert Into bitacoradepaquetes (sContrato, sIdConvenio, dIdFecha, sNumeroOrden, sWbs, sNumeroActividad, dAvance)
       Select sContrato, sIdConvenio, '$dIdFecha', '', sWbs, sNumeroActividad, 0
       From actividadesxanexo
       Where sContrato = '$sContrato' And sIdConvenio = '$sIdConvenio' And sTipoActividad = 'Paquete'";
queryTransaccion($sql);

$cadena = "### 16: $sql \n Error: " . mysql_error();
GuardaQuery($cadena);

#--8: llama el p rocedimiento de ajusta contrato
   #querys 17-22
ajustaContrato($sContrato, $sIdConvenio, $dIdFecha) ;

#--9:
$sql = "UPDATE bitacoradepaquetes SET dAvance = dAvance / 100
        WHERE sContrato = '$sContrato' And dIdFecha = '$dIdFecha' And sIdConvenio = '$sIdConvenio'
        And sNumeroOrden = '' ";
queryTransaccion($sql);
   $cadena = "### 23: $sql \n Error: " . mysql_error();
   GuardaQuery($cadena);

#--10: Determino la jornada a laborar en el dia ...
$sql= "select iJornada
       from ordenesdetrabajo
       Where sContrato='$sContrato' and sNumeroOrden='$sNumeroOrden'";
$result = queryTransaccion($sql);
   $cadena = "### 24: $sql \n Error: " . mysql_error();
   GuardaQuery($cadena);
if($row = mysql_fetch_array($result)){
   $iJornadaxOrden = $row['iJornada'];
}
if($iJornadaxOrden == 0 ){
   $iJornadas = Jornadas();
   $JornadasxDia = JornadasDia($_SESSION['dIdFecha'],$iJornadas);
}
else
   $JornadasxDia = $iJornadaxOrden;
$JornadasxDia = (int)$JornadasxDia;
#Crear formato en horas de las jornadas de trabajo
if($JornadasxDia < 10)
   $sJornada = "0$JornadasxDia:00";
else
   $sJornada = "$JornadasxDia:00";

$CantidadDeOrdenes = 0;
$sql= "select count(sNumeroOrden) as dTotal from ordenesdetrabajo Where sContrato='$sContrato'";
$result = queryTransaccion($sql);
   $cadena = "### 25: $sql \n Error: " . mysql_error();
   GuardaQuery($cadena);
if($row = mysql_fetch_array($result)){
   $CantidadDeOrdenes = $row['dTotal'];
}
#avances globales del contrato y de la orden
   #QUERYS 26-41
If ($CantidadDeOrdenes > 1 ){
 $avanceGlobal = cfnCalculaAvances($sContrato,$sNumeroOrden,NULL,$sIdTurno,true,$dIdFecha,"Avanzada");
 }
else{
 $avanceGlobal = cfnCalculaAvances($sContrato,$sNumeroOrden,NULL,$sIdTurno,false,$dIdFecha,"Avanzada");
 }

#--11: Proceso para actualizacion de avances ...
#querys 42-55
If ($CantidadDeOrdenes > 1 )
   AvancesHistorico ($sContrato, $sNumeroOrden, $sIdConvenio, $sIdTurno, $dIdFecha, True );
Else
   AvancesHistorico ($sContrato, $sNumeroOrden, $sIdConvenio, $sIdTurno, $dIdFecha, False ) ;
#--12:
   //este paso esta incluido en la funcion AvancesHistoricos();
#--13: Actualizo los avances globales de todos reportes del dia ....
   //este paso esta incluido en la funcion AvancesHistoricos();
#--14: Termino de Identificar la Jornada
$sql =" select * from turnos where sContrato='$sContrato' and sIdTurno='$sIdTurno';";
$result = queryTransaccion($sql);
      $cadena = "### 56: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);

if($row = mysql_fetch_array($result)){
   $sOrigenTierra = $row['sOrigenTierra'];
}

if($sOrigenTierra == "No" ){
   #querys 57-61
   InicializaJornadas( $sContrato, $sNumeroOrden, $sIdTurno, $sJornada, $dIdFecha ) ;
   #querys 62-64
   ActualizaJornadas ( $sContrato, $sNumeroOrden,$dIdFecha ) ;
}

$sql = "select sNumeroReporte from reportediario where sContrato='$sContrato'
and sNumeroOrden='$sNumeroOrden' and dIdFecha='$dIdFecha' and sIdTurno='$sIdTurno'
and sIdConvenio='$sIdConvenio' and sIdTurno='$sIdTurno'";
$result = queryTransaccion($sql);
$cadena = "### 65: $sql \n Error: " . mysql_error();
GuardaQuery($cadena);

if($row = mysql_fetch_array($result)){
   $sNumeroReporte=$row[0];
}

#poner la hora de inicio y cierre de actividades
#querys 66-67
horaInicioCierre($sContrato,$dIdFecha,$sNumeroOrden,$sIdTurno);
#--15: Termina Proceso de Actualizacion de Avances ......


$sql ="insert Into kardex_sistema (sContrato, sIdUsuario, dIdFecha, sHora, sDescripcion, lOrigen)
      Values ('$sContrato', '$sIdUsuarioValida', '".date('Y-m-d')."','".date('H:i:s')."','Validación del Reporte Diario No. $sNumeroReporte VALIDA $sIdUsuarioValida','Reporte Diario')";
   queryTransaccion($sql);
      $cadena = "### 68: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);
#ejcutar transaccion
$finalizado = true;
    if($_SESSION['errorTransaccion']!=true){
       mysql_query("commit");
       $_SESSION['errorTransaccion']="";
       $finalizado = true;
    }
    else{
      mysql_query("rollback");
      $_SESSION['errorMySql'];
      $_SESSION['errorTransaccion']="";
      $finalizado = false;
    }
?>
