<?php
$lPoder=true;
$this->Memo1->Color="#C7CCFC";
global $sIdConvenioAct;

#iniciar transaccion
mysql_query("begin");

#obtener el limite de reportes sin validar
#cechar que el reporte pertenezca al convenio actual y que este validado
if($status!='Autorizado' or $Convenio!=$sIdConvenioAct){
   $this->Memo1->Color="#FF8080";
   $this->Memo1->Text="El Reporte Diario: $sNumeroReporte se encuentra en estado de VALIDADO\n\n";
   $lPoder=false;
}
#Checar que no exista un generador autorizado que abarque la fecha del reporte diarios
$sql = "select sNumeroGenerador, dFechaInicio, dFechaFinal
        from estimaciones
        Where sContrato = '$sContrato' and sNumeroOrden = '$sNumeroOrden'
        and dFechaInicio <= '$dIdFecha' and dFechaFinal >= '$dIdFecha' And lStatus = 'Autorizado'";
$rs = queryTransaccion($sql);
if($row = mysql_fetch_array($rs)){
   $this->Memo1->Color="#FF8080";
   $this->Memo1->Text="No es posible realizar la apertura de un Reporte Diario que pertenezca al periodo de generacion del
                       $row[1] al $row[2]  del generador de obra No. $row[0] Realiza la DesAutorizacion del generador de
                       obra para poder realizar esta accion.\n\n";
  $lPoder=false;

}

if($lPoder){
   #Abrir la autorizacion del reporte diario
   $sql = "Update reportediario SET lStatus = 'Validado' , sIdUsuarioAutoriza = ''
           Where sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden'
           And dIdFecha = '$dIdFecha' And sIdTurno = '$sIdTurno'";
   queryTransaccion($sql);
   #Actualizo Kardex del Sistema ....
$sIdUsuario = ($_SESSION['usuario']!="")?$_SESSION['usuario']:$_SESSION['ssUsuario'];
   $sql = "Insert Into kardex_sistema (sContrato, sIdUsuario, dIdFecha, sHora, sDescripcion, lOrigen)
            Values ('$sContrato', '$sIdUsuario','".date('Y-m-d')."','". date('H:i:s')."',
            'Apertura del Reporte Diario No. $sNumeroReporte AUTORIZA $sIdUsuario', 'Reporte Diario')";
   queryTransaccion($sql);
   $this->Memo1->Text=$this->Memo1->Text."----:Autorizacin Abierta\n";
}

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
