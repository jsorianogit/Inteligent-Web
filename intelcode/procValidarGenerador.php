<?php
mysql_query("begin");
$usuarioValida = ($_SESSION['usuarioVGenerador']=="")?$_SESSION['ssUsuario']:$_SESSION['usuarioVGenerador'];
$lPoder = true;
// Verificar que no exista ningun generador inferior al que se quiere validar que este en status de pendiente ....
$sql = "select
         count(sContrato) as iGeneradoresSinValid
       from estimaciones
       where
         sContrato = '$sContrato'
         and iConsecutivo < '$iConsecutivoGrid'
         and lStatus = 'Pendiente'";

$rs = queryTransaccion($sql);
if($row = mysql_fetch_array($rs)){
   if($row[0]>0){
      $alerta = "\rExisten un total de $row[0] generador(es) pendientes de validar inferiores al generador actual,
             \rvalide todos los generadores anteriores antes de poder validar el generador actual.";
      $this->memoMensajes->Text .= "\n". $alerta;
      $this->memoMensajes->Color="#F7C8DE";
      $lPoder = False;
   }
}
$sql ="select count(sNumeroReporte) as iReportesSinValid
       from reportediario
       where sContrato = '$sContrato'
       and sNumeroOrden ='$sNumeroOrden'
       and dIdFecha >= '$dFechaInicio'
       and dIdFecha <= '$dFechaFinal'
       and lStatus = 'Pendiente'";
$rs =queryTransaccion($sql);  
if($row = mysql_fetch_array($rs)){
   if($row[0]>0){

      $alerta = "\rEn el periodo de generacion se encuentran un total de : $row[0] reportes diarios sin autorizar,
             \rautorize los reportes diarios para poder ejecutar esta opcion.";
      $this->memoMensajes->Text .= "\n".$alerta;
      $this->memoMensajes->Color="#F7C8DE";
      $lPoder = False;
   }
}
If ($lPoder)
{
   // Proceso que valida que todas las partidas generadas se encuentren amparadas en reportes diarios....
   $sql = "
      Select
         sIsometrico,
         sPrefijo,
         sNumeroActividad,
         sWbs,
         dCantidad,
         sIsometricoReferencia,
         sInstalacion,
         iOrdenCambio,
         mComentarios
      from
         estimacionxpartida
      where
         sContrato = '$sContrato'
         and sNumeroOrden = '$sNumeroOrden'
         And sNumeroGenerador = '$sNumeroGenerador'
      Order By sNumeroActividad, sWbs" ;

   $sPartida = '' ;
   $rs = queryTransaccion($sql);
   while ( $lPoder and $rowGenerado = mysql_fetch_array($rs))
   {
      // Generacion Automatica de Generadores de Obra Adicionales ......
      $lPoder = True ;
      if (configuracion($sContrato,'sTipoGeneracion') == 'Generación Independiente' )
      {
         if ($sPartida <> $rowGenerado['sNumeroActividad'] )
         {
            $sPartida = $rowGenerado['sNumeroActividad'] ;
            if(configuracion($sContrato,'sTipoGeneracion')=='Contrato Original')
               $tmpConvenio = '';
            else
               $tmpConvenio = $sIdConvenioAct;
            $sql = "
               select
                  dCantidadAnexo,
                  lExtraordinario
               from
                  actividadesxanexo
               Where
                  sContrato = '$sContrato'
                  and sIdConvenio = '$tmpConvenio'
                  and sNumeroActividad = '".$rowGenerado['sNumeroActividad']."'
                  And sTipoActividad = 'Actividad'";

            $rsBuscar = queryTransaccion($sql);
            If ($rowBusca = mysql_fetch_array($rsBuscar))
            {
               $dPartidaAnexo = $rowBusca['dCantidadAnexo'] ;
               If ($rowBusca['lExtraordinario'] == 'Si' )
                  $sPrefijo = '-E';
               Else
                  $sPrefijo = '-A';
            }
            Else
            {
               $dPartidaAnexo= 0 ;
               $sPrefijo='E' ;
            }
            $dPartidaGenerado = dfnGeneradoAnterior($sContrato, $rowGenerado['sNumeroActividad'], $iConsecutivo) ;
         } ;
         // Detecto que la partida es adicional, ahora hay que determinar que tipo de adicional es ...
         // Si el acumulado anterior > es superior a la cantidad anexo entonces tipo es "A" solo debo verificar que
            //tenga orden de cambio y despues registra
         // si el acumulado anterior es igual a la cantidad anexo entonces el tipo es "A" solo debo verificar que tenga
            //orden de cambio y despues registra
         if (($dPartidaGenerado + $rowGenerado['dCantidad']) > $dPartidaAnexo)
            if (strpos($sNumeroGenerador,'A') !== false and strpos($sNumeroGenerador,'E') !==false) {
               // Si el acumulado anterior es inferior a la cantidad anexo pero el acumulado actual
               //es superior a la cantidad anexo. entonces
               If($dPartidaGenerado >= $dPartidaAnexo){
                  $dCantidad=0;
                  $dCantidadAdicional= $rowGenerado['dCantidad'];
               }
               else{
                  $dCantidad = $dPartidaAnexo - $dPartidaGenerado ;
                  $dCantidadAdicional = $rowGenerado['dCantidad'] - $dCantidad ;
               }
               // 1. actualizo el registro actual a la cantidad necesaria para cubrir el anexo
               $sql = "
                  update
                     estimacionxpartida
                  SET
                     dCantidad = '$dCantidad'
                  Where
                     sContrato = '$sContrato'
                     and sNumeroOrden = '$sNumeroOrden'
                     and sNumeroGenerador = '$sNumeroGenerador'
                     and sWbs = ".$rowGenerado['sWbs']."
                     and sNumeroActividad = '".$rowGenerado['sWbs']."'
                     And sIsometrico = '".$rowGenerado['sIsometrico']."'
                     and sPrefijo = '".$rowGenerado['sPrefijo']."'";

               queryTransaccion($sql);
               if($dCantidadAdicional > 0 ){
                  // 2. Verifico si existe un generador Generador-Prefijo  ...
                  $sqlExisteGen = "select
                              sContrato
                          from
                              estimaciones
                          where
                              sContrato = '$sContrato'
                              and sNumeroOrden ='$sNumeroOrden'
                              and sNumeroGenerador = '$sNumeroGenerador'";

                  $rsExisteGen = queryTransaccion($sqlExisteGen);
                  if ($rowExisteGen = mysql_fetch_array($sqlExisteGen)){
                     // ItemOrden Maximo de generadores .....
                     $sqlItemMax = "
                        Select
                           Max(iConsecutivo) as iConsecutivo
                        From
                           estimaciones
                        Where
                           sContrato = '$sContrato'
                        Group By sContrato";

                     $rsItemMax = queryTransaccion($sqlItemMax);
                     if ($rowItemMax = mysql_fetch_array($rsItemMax))
                           $iConsecutivo = $rowItemMax['iConsecutivo'] + 1;
                     else
                           $iConsecutivo = 1 ;
                     $SQLextraeEstimacion = "
                        select
                           *
                        from
                           estimaciones
                        where
                           sContrato='$sContrato'
                           and sNumeroGenerador='$sNumeroGenerador'
                           and sNumeroOrden='$sNumeroOrden' ";

                     $rsextraeEstimaccion = queryTransaccion($SQLextraeEstimacion);
                     if($rowextraeEstimaccion = mysql_fetch_array($rsextraeEstimaccion)){
                        $cadenaCampos = "INSERT INTO estimaciones (";
                        $cadenaValores = "VALUES (";
                        for($iNumField = 0; $iNumField<mysql_num_fields($rsextraeEstimaccion);$iNumField++){
                           if(mysql_field_name($rsextraeEstimaccion,$iNumField )=="sNumeroGenerador"){
                              $rowextraeEstimaccion['sNumeroGenerador']=$rowextraeEstimaccion['sNumeroGenerador'].$sPrefijo;
                           }
                           if(mysql_field_name($rsextraeEstimaccion,$iNumField)=="iConsecutivo"){
                              $rowextraeEstimaccion['iConsecutivo']=$iConsecutivo;
                           }
                           if($iNumField<mysql_num_fields($rsextraeEstimaccion) -1){
                              $cadenaCampos.=mysql_field_name($rsextraeEstimaccion,$iNumField).",";
                              $cadenaValores.="'".$rowextraeEstimaccion[mysql_field_name($rsextraeEstimaccion,$iNumField)]."',";
                           }
                           else{
                              $cadenaCampos.=mysql_field_name($rsextraeEstimaccion,$iNumField).")";
                              $cadenaValores.="'".$rowextraeEstimaccion[mysql_field_name($rsextraeEstimaccion,$iNumField)]."')";
                           }
                        }
                        $SQLgeneradorExedecente = $cadenaCampos." ".$cadenaValores;
                        queryTransaccion($SQLgeneradorExedecente);

                     }

                  } ;

                  // Ahora se insertan las partidas adicionales ....

                  $sql = "
                     INSERT INTO estimacionxpartida (
                        sContrato ,
                        sNumeroOrden,
                        sNumeroGenerador,
                        sWbs,
                        sNumeroActividad,
                        sIsometrico,
                        sPrefijo,
                        dCantidad,
                        dAcumulado,
                        iOrdenCambio,
                        sIsometricoReferencia,
                        sInstalacion,
                        mComentarios,
                        lEstima )
                     VALUES (
                        '$sContrato',
                        '$sNumeroOrden',
                        '".$sNumeroGenerador.$sPrefijo."',
                        '".$rowGenerado['sWbs']."',
                        '".$rowGenerado['sNumeroActividad']."',
                        '".$rowGenerado['sIsometrico']."',
                        '".$rowGenerado['sPrefijo']."',
                         '$dCantidadAdicional',
                          0,
                          0,
                         '".$rowGenerado['sIsometricoReferencia']."',
                         '".$rowGenerado['sInstalacion']."',
                         '".$rowGenerado['sWbs']." Partida Generada Automaticamente',
                         'Si')";

                  queryTransaccion($sql);
               // Termino de insertar la partida adicional
               } ;
               $dPartidaGenerado = $dPartidaGenerado + $rowGenerado['dCantidad'];
            }
            else
            {
               if ($rowGenerado['iOrdenCambio'] == 0 ){
                  if(configuracion($sContrato,'sBaseGeneracion') == 'Contrato Original' )
                     $msg = "La configuracion del sistema indica la emision de generadores de obra independientes,
                      usted debera separar los Generadores de Obra segun la volumetria, si esta excede a la Cantidad
                      por Ejecutar segun el Contrato Original, toda el volumen excedente debera capturarse en un Generador Adicional
                      $sNumeroGenerador -A, y adicionar una orden de cambio que ampare la realizacion de la volumentria
                      adicional o extraordinaria al Contrato Original.Concepto Excedido ..: ". $rowGenerado['sNumeroActividad'] .".";
                  else
                     $msg = "La configuracion del sistema indica la emision de generadores de obra independientes,
                     usted debera separar los Generadores de Obra segun la volumetria, si esta excede a la Cantidad
                     por Ejecutar segun el Convenio Actual, toda el volumen excedente debera capturarse en un Generador
                     Adicional " . $sNumeroGenerador . "-A y adicionar una orden de cambio que ampare la realizacion
                     de la volumentria adicional o extraordinaria al Convenio Actual.
                     Concepto Excedido ..: " .  $rowGenerado['sNumeroActividad'] . '.';
                  $this->memoMensajes->Text = $msg ;
                  $this->memoMensajes->Color="#F7C8DE";

                  $lPoder = False;
               }
               $dPartidaGenerado = $dPartidaGenerado + $rowGenerado['dCantidad'];
            }
      } ;

      if($lPoder)
      {
         $iResp = 21 ;
         $lPoder = False ;
         global $dCantidadReportada;
         global $dCantidadGenerada;
         While ($iResp == 21)
         {
            $iResp = lVerificaGenerador($sContrato, $sIdConvenioAct, $sNumeroOrden, $rowGenerado['sNumeroActividad'],'', $dFechaFinal, $iConsecutivoGrid,0);
            if ( $iResp == 1 )
               $lPoder = True;
            else if ( $iResp == 0 ){
                 $alerta = "\rLa cantidad acumulada en los generadores de obra es superior a la cantidad manifestada en los reportes diarios.
                            \rCantidad acumulada hasta el Generador de Obra en la partida  ".$rowGenerado['sNumeroActividad']." (Acumulado + Cantidad a Generar): ".
                            "\t".($dCantidadGenerada + $dCantidad)
                            ."\rCantidad Manifestada en Reportes Diarios: $dCantidadReportada
                            \rnecesita reportar la cantidad de : ".(($dCantidadGenerada + $dCantidad) - $dCantidadReportada)
                           ."\rDebe ir a la bitacora de actividades y reportar el faltante !!";
               $this->memoMensajes->Text = $alerta;
               $this->memoMensajes->Color="#F7C8DE";
               $lPoder = False;
            }

         }
      }
   }
}

If ($lPoder) {
   $lRecordChange = True ;
   $SQLmontos = "Select
                     Sum(g.dCantidad * a.dVentaMN) as dMontoMN,
                     Sum(g.dCantidad * a.dVentaDLL) as dMontoDLL
                  From estimacionxpartida g
                  INNER JOIN actividadesxanexo a ON (
                        g.sContrato = a.sContrato
                        And a.sIdConvenio = '$sIdConvenioAct'
                        And g.sNumeroActividad = a.sNumeroActividad
                        and a.sTipoActividad = 'Actividad')
                 Where
                        g.sContrato = '$sContrato'
                        And g.sNumeroOrden = '$sNumeroOrden'
                        And g.sNumeroGenerador = '$sNumeroGenerador'
                        And g.lEstima = 'Si'
                 Group By g.sContrato, g.sNumeroOrden ";

   $dFinancieroGenerador = 0 ;
   $dMontoMN = 0 ;
   $dMontoDLL = 0 ;
   $rsMontos = queryTransaccion($SQLmontos);
   if ($rowMontos = mysql_fetch_array($rsMontos)){
     $dMontoMN = $rowMontos['dMontoMN'] ;
     $dMontoDLL = $rowMontos['dMontoDLL'] ;
   }

   $SQLestimaciones ="Update estimaciones
                     SET
                        lStatus = 'Validado' ,
                        dFinancieroGenerador = '$dFinancieroGenerador',
                        dMontoMN = '$dMontoMN',
                        dMontoDLL = '$dMontoDLL',
                        sIdUsuarioValida = '$usuarioValida'
                      Where
                        sContrato = '$sContrato'
                        And sNumeroOrden = '$sNumeroOrden'
                        And iNumeroEstimacion = '$iNumeroEstimacion'
                        And sNumeroGenerador = '$sNumeroGenerador'";

   queryTransaccion($SQLestimaciones);
   // Actualizo Kardex del Sistema ....
   $SQLkardex = "Insert Into kardex_sistema (sContrato, sIdUsuario, dIdFecha, sHora, sDescripcion, lOrigen)
                 Values (
                     '$sContrato',
                     '$usuarioValida',
                     '".date("Y-m-d")."',
                     '".date("h:i:s")."',
                     'Validación del Generador No. [$sNumeroGenerador] de la Orden [$sNumeroOrden]. VALIDA $usuarioValida ',
                     'Generadores'
                  )";

   queryTransaccion($SQLkardex);
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
