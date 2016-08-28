<?php
$_SESSION['errorTransaccion']="";
$_SESSION['errorMySql']="";
mysql_query("begin");
   $autorizo = false;
   $usuarioValida = ($_SESSION['usuarioAEstimacion']=="")?$_SESSION['ssUsuario']:$_SESSION['usuarioAEstimacion'];
   $sql = "select sContrato from estimaciones where sContrato='$sContrato'
            and iNumeroEstimacion='$iNumeroEstimacion' and lStatus<>'Autorizado'";
   $rs = queryTransaccion($sql);

   if($rw = mysql_fetch_array($rs)){
      //$this->loadgrid();
      $this->Memo1->Color="#F7C8DE";
      $this->Memo1->Text=$this->Memo1->Text."
         Existen Generadores Pertenecientes a la Estimación en status [PENDIENTE DE APLICAR]
         Favor de Aplicar dichos Generadores.
      ";
   }
   else{
      #ajuste de monto de estimaciones
      $sql =   "update actividadesxestimacion set dMontoAcumuladoAnteriorMN=(dAcumuladoAnterior*dVentaMN),
                dMontoAcumuladoAnteriorDLL=(dAcumuladoAnterior*dVentaDLL),
                dMontoMN = (dCantidad*dVentaMN),
                dMontoDLL = (dCantidad*dVentaDLL)
                where sContrato='$sContrato' and iNumeroEstimacion='$iNumeroEstimacion' and sTipoActividad='Actividad'";
      queryTransaccion($sql);


      $sql =   "update actividadesxestimacion set dMontoAcumuladoMN = (dMontoAcumuladoAnteriorMN+dMontoMN),
                dMontoAcumuladoDLL = (dMontoAcumuladoAnteriorDLL+dMontoDLL)
                where sContrato='$sContrato' and iNumeroEstimacion='$iNumeroEstimacion' and sTipoActividad='Actividad'";
      queryTransaccion($sql);


      $sql =   "select distinct(sWbs) from actividadesxestimacion
                where sContrato='$sContrato' and iNumeroEstimacion='$iNumeroEstimacion' and sTipoactividad='Paquete'
                order by iNivel desc";
      $rs = queryTransaccion($sql);

      while($rowsup = mysql_fetch_array()){
         #_#
         $sqlanidado_1 = "select sum(dMontoAcumuladoAnteriorMN) as dMontoAnteriorMN, sum(dMontoAcumuladoAnteriorDLL) as dMontoAnteriorDLL,
                          sum(dMontoMN) as dMontoMN,sum(dMontoDLL) as dMontoDLL from actividadesxestimacion
                          where sContrato='$sContrato' and iNumeroEstimacion='$iNumeroEstimacion' and sWbsAnterior='".$rowsup['sWbs']."'";
         $rsanidado_1 = queryTransaccion($sqlanidado_1);


         if($rowanidado_1 = mysql_fetch_array($rsanidado_1)){
            $sql =   "update actividadesxestimacion set
                        dMontoAcumuladoAnteriorMN='".$rowanidado_1['dMontoAnteriorMN']."',
                        dMontoAcumuladoAnteriorDLL='".$rowanidado_1['dMontoAnteriorDLL']."',
                        dMontoMN='".$rowanidado_1['dMontoMN']."',
                        dMontoDLL='".$rowanidado_1['dMontoDLL']."',
                        dMontoAcumuladoMN='".($rowanidado_1['dMontoMN']+$rowanidado_1['dMontoAnteriorMN'])."',
                        dMontoAdumuladoDLL='".($rowanidado_1['dMontoDLL']+$rowanidado_1['dMontoAnteriorDLL'])."'
                      where
                        sContrato='$sContrato'
                        and iNumeroEstimacion='$iNumeroEstimacion'
                        and sWbs='".$rowsup['sWbs']."'";

            queryTransaccion($sql);
         }
      }
      #_#
      $dMontoEstimacionMN=$dMontoEstimacionDLL=0;
      $dMontoEstimacionAcumMN=$dMontoEstimacionAcumDLL=0;
      $sql =   "select
                  sum(dMontoAcumuladoAnteriorMN) as dMontoAnteriorMn,
                  sum(dMontoAcumuladoAnteriorDLL) as dMontoAnteriorDLL,
                  sum(dMontoMN) as dMontoMN,
                  sum(dMontoDLL) as dMontoDLL
                from
                  actividadesxestimacion
                where
                  sContrato='$sContrato'
                  and iNumeroEstimacion='$iNumeroEstimacion'
                  and sTipoActividad='Paquete'
                  and iNivel=0
                group by sContrato";
      $rs = queryTransaccion($sql);

      if($rw = mysql_fetch_array($rw)){
         $dMontoEstimacionMN=$rw['dMontoMN'];
         $dMontoEstimacionDLL=$rw['dMontoDLL'];
         $dMontoEstimacionAcumMN=$rw['dMontoAnteriorMN'];
         $dMontoEstimacionAcumDLL=$rw['dMontoAnteriorDLL'];
      }
      #_#
      $dMontoGeneradoMN=$dMontoGeneradoDLL=0;
      $sql =   "select
                  sum(dMontoMN) as dMontoMN,
                  sum(dMontoDLL) as dMontoDLL
                from
                  estimaciones
                where
                  sContrato='$sContrato'
                  and iNumeroEstimacion='$iNumeroEstimacion'
                  and lStatus='Autorizado'
                group by sContrato";
      $rs = queryTransaccion($sql);

      if($rw = mysql_fetch_array($rw)){
         $dMontoGeneradoMN=$rw['dMontoMN'];
         $dMontoGeneradoDLL=$rw['dMontoDLL'];
      }
      $sql = "update estimacionperiodo set
               lEstimado='Si',
               dMontoMNGeneradores='$dMontoGeneradoMN',
               dMontoDLLGeneradores='$dMontoGeneradoDLL',
               dMontoMN='$dMontoEstimacionMN',
               dMontoDLL='$dMontoEstimacionDLL',
               dMontoAcumuladoMN='$dMontoEstimacionAcumMN',
               dMontoAcumuladoDLL='$dMontoEstimacionAcumDLL',
               sIdUsuarioAutoriza='$usuarioValida'
              where
               sContrato='$sContrato'
               and iNumeroEstimacion='$iNumeroEstimacion'";
      queryTransaccion($sql);

      $this->Memo1->Color="#C7CCFC";
      $this->Memo1->Text=$this->Memo1->Text."----:Autorizada\n";
      $this->loadgrid();
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
if($finalizado){
      $this->Memo1->Color="#C7CCFC";
      $this->Memo1->Text=$this->Memo1->Text."----:Autorizada\n";
}
else{
      $this->Memo1->Color="#F7C8DE";
      $this->Memo1->Text=$_SESSION['errorMySql'];
}
?>

