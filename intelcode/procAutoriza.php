<?php
$gobal_inicio =1000;
# autorizar reportes diarios

#--1: Al Autorizar un reporte el sistema debera crear las notas automaticamente de los avisos de embarque recibidos
  // procDelInsAvEmbarque (global_contrato, FieldValues['sNumeroOrden'], FieldValues['sIdTurno'], FieldValues['dIdFecha']) ;

#Borramos todas las notas de los avisos de embarques
$sql = "delete from bitacoradeactividades where sContrato='$sContrato' and sIdTurno='$sIdTurno' and dIdFecha='$dIdFecha' and sIdTipoMovimiento='AE'";
queryTransaccion($sql);

$sql = "select iFolio, sReferencia, dFechaAviso from anexo_suministro where sContrato='$sContrato' and dIdFecha='$dIdFecha' and sNumeroOrden='CONTRATO NO. $sContrato' order by sReferencia";
$rs = queryTransaccion($sql);

if(mysql_num_rows($rs)>0){
   #crear los encabezados de la lista
   if($global_title_embarque==''){
      $textGen = "CON ESTA FECHA SE VERIFICAN Y VALIDAN LAS LISTAS DE VERIFICACIÓN DE LOS SIGUIENTES AVISOS DE EMBARQUE.\n";
      $textGen .= "  No         AVISO DE EMB.                           FECHA DE RECEPCIÓN\n";
   }
   else{
      $textGen = "$global_title_embarque\n";
      $textGen .= "  No         No. DE ENTRADA                          FECHA DE RECEPCIÓN\n";
   }
   #crear la lista
   while($row = mysql_fetch_array($rs)){
      $textGen .= "  ".$row['iFolio']."         ".$row['sReferencia']."                          ".$row['dFechaAviso']."\n";
   }

   $cStatusProceso = $this->cStatusProceso($sContrato);
   $sql = "select sNumeroOrden from ordenesdetrabajo where sContrato='$sContrato' and cIdStatus='$cStatusProceso'";
   $result = queryTransaccion($sql);
   while ($filas = mysql_fetch_array($result)){
      $textOrden="";
      $sql = "select iFolio,sReferencia,dFechaAviso from anexo_suministro where sContrato='$sContrato' and dIdfecha='$dIdFecha' and sNumeroOrden='$filas[0]' order by sReferencia";
      $result2 = queryTransaccion($sql);
      while($filas2 = mysql_fetch_array($result2)){
         $textOrden .= "  ".$filas2['iFolio']."         ".$filas2['sReferencia']."                          ".$filas2['dFechaAviso']."\n";
      }

      if(strpos($sNumeroOrden,"TIERRA")!==false){
         $global_inicio = $global_inicio + 8000;
      }

      $sql = "select max(iIdDiario) as TotalDiario from bitacoradeactividades where sContrato='$sContrato' and dIdFecha='$dIdFecha' group by sContrato";
      $result2 = queryTransaccion($sql);
      if($filas2=mysql_fetch_array($result2)){
         $iDiario = $filas2[0] + 1;
      }
      else{
         $iDiario=$gobal_inicio + 1;
      }
      $Depto = $this->departamento();
      $sql = "Insert Into bitacoradeactividades (sContrato, dIdFecha, iIdDiario, sIdTurno, sIdDepartamento, sNumeroOrden, sIdTipoMovimiento, mDescripcion)
                Values ('$sContrato', '$dIdFecha', '$iDiario', '$sIdTurno', '$Depto', '$filas[0]', 'AE','$textGen $texOrden')";
      queryTransaccion($sql);

   }

}
else{
   $sql = "Select iFolio, sReferencia, dFechaAviso From anexo_suministro Where sContrato = '$sContrato' And dIdFecha = '$dIdFecha' And sNumeroOrden = '$sNumeroOrden' Order By sReferencia";
   $result = queryTransaccion($sql);
   if(mysql_num_rows($result)){
      if($global_title_embarque == '')
              {
                   If(mysql_num_rows($result) > 1)
                        $textGen = 'CON ESTA FECHA SE VERIFICAN Y VALIDAN LAS LISTAS DE VERIFICACIÓN DE LOS SIGUIENTES AVISOS DE EMBARQUE.\n';
                   Else
                        $textGen = 'CON ESTA FECHA SE VERIFICA Y VALIDA LA LISTA DE VERIFICACIÓN DEL SIGUIENTE AVISO DE EMBARQUE.\n';
                   $textGen.= '  No         AVISO DE EMB.                             FECHA DE RECEPCIÓN \n' ;
              }
              Else
              {
                   $textGen = "$global_title_embarque.\n";
                   $textGen .= "  No         No. DE ENTRADA                           FECHA DE RECEPCIÓN\n";
              }
   }

   while($row = mysql_fetch_array($result)){
      $textGen .= "  ".$row['iFolio']."         ".$row['sReferencia']."                           ".$row['dFechaAviso'];
   }

   if(strpos($sNumeroOrden,"TIERRA")!==false){
      $global_inicio = $global_inicio + 8000;
   }

   $sql = "select max(iIdDiario) as TotalDiario from bitacoradeactividades where sContrato='$sContrato' and dIdFecha='$dIdFecha' group by sContrato";
   $result2 = queryTransaccion($sql);
   if($filas2=mysql_fetch_array($result2)){
      $iDiario = $filas2[0] + 1;

   }
   else{
      $iDiario=$gobal_inicio + 1;
   }
   $Depto = $this->departamento();
   $sql = "Insert Into bitacoradeactividades (sContrato, dIdFecha, iIdDiario, sIdTurno, sIdDepartamento, sNumeroOrden, sIdTipoMovimiento, mDescripcion)
            Values ('$sContrato','$dIdFecha', '$iDiario', '$sIdTurno', '$Depto','$sNumeroOrden', 'AE', '$textGen')";
    queryTransaccion($sql);
}

?>
