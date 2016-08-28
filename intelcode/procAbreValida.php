<?php
$sIdUsuario = ($_SESSION['usuario']!="")?$_SESSION['usuario']:$_SESSION['ssUsuario'];
#iniciar transaccion
mysql_query("begin");

#--: Variables requeridas en el proceso: $sContrato,$sNumeroOrden,$sIdConvenio,$dIdFecha,$sIdTurno,$status
#--1: Verificar que el convenio sea igual al acutal y que el status sea igual a Validado

#--2: Elimino los Tiempo Muertos Reales del Contrato
$sql = "UPDATE reportediario SET sTiempoMuertoReal = '00:00', iPersonal = 0
       Where sContrato = '$sContrato' And dIdFecha = '$dIdFecha'" ;
queryTransaccion($sql);

#--3: Primero Elimino todo de la Bitacora de Paquetes de ese dia ...
$sql = "Delete from bitacoradepaquetes
       where sContrato = '$sContrato' And sIdConvenio = '$sIdConvenio'
       And sNumeroOrden = '$sNumeroOrden' and dIdFecha = '$dIdFecha'";
queryTransaccion($sql);

$sql = "Update reportediario SET lStatus = 'Pendiente', sIdUsuarioValida = '',
       iPersonal = 0, sOperacionInicio = '00:00', sOperacionFinal = '00:00',
                 sTiempoAdicional = '00:00', sTiempoEfectivo = '00:00',sTiempoMuertoReal = '00:00'
       Where sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden'
             And dIdFecha = '$dIdFecha' And sIdTurno = '$sIdTurno'";
queryTransaccion($sql);

#--4: Actualizo Kardex del Sistema ....
$sql = "Insert Into kardex_sistema (sContrato, sIdUsuario, dIdFecha, sHora, sDescripcion, lOrigen) ";
$sql .= " Values ('$sContrato', '$sIdUsuario','".date('Y-m-d')."','".date('H:i:s')."',";
$sql .= "'Apertura del Reporte Diario No. $sNumeroReporte VALIDA $sIdUsuario', 'Reporte Diario')";
queryTransaccion($sql);

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
