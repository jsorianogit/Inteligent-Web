<?php
##_____________________________________funcion Ajusta Contratos
function ajustaContrato($sContrato,$sIdConvenio,$dIdFecha){

    $sql ="Select a.sWbs, a.sNumeroActividad, a.dCantidadAnexo, a.dPonderado, Sum(b.dCantidad) as dCantidad
            From bitacoradeactividades b
            INNER JOIN actividadesxanexo a
            ON (b.sContrato = a.sContrato And a.sIdConvenio = '$sIdConvenio'
            And b.sNumeroActividad = a.sNumeroActividad and a.sTipoActividad = 'Actividad')
            WHERE b.sContrato = '$sContrato' and b.dIdFecha = '$dIdFecha' And b.lAlcance = 'No'
            GROUP BY b.sWbs order by a.iItemOrden";
    $result = mysql_query($sql);
    if(mysql_error())mensaje("error 1: ");
    While ($row = mysql_fetch_array($result)){
       $sql ="Select sum(dCantidad) as dAcumulado From bitacoradeactividades
               Where sContrato = '$sContrato'
               AND sNumeroActividad = '".$row['sNumeroActividad']."'
               AND dIdFecha <= '$dIdFecha'
               GROUP BY sNumeroActividad";
        $dAvancePartida = 0 ;
        $result_ba = mysql_query($sql);
        if(mysql_error())mensaje("error 2: ");
        if($row_ba = mysql_fetch_array($result_ba)){
            if( ($row_ba['dAcumulado']-$row['dCantidad'])>=$row['dCantidadAnexo']){
               $dAvancePartida =0;
            }
            else if($row_ba['dAcumulado']>$row['dCantidadAnexo']){
               $dAvancePartida = (($row['dCantidadAnexo'] - ($row_ba['dAcumulado'] - $row['dCantidad'])) * 100) / $row['dCantidadAnexo'];
            }
            else{
               $dAvancePartida =($row['dCantidad'] * 100) / $row['dCantidadAnexo'] ;
            }
            $dAvanceObra = $dAvanceObra + ($dAvancePartida + $row['dPonderado']);
            $dAvanceObra = ($dAvancePartida * $row['dPonderado']) ;
        }
        $sql ="UPDATE bitacoradepaquetes SET dAvance = dAvance + '$dAvanceObra'
         WHERE sContrato = '$sContrato' And sNumeroOrden = '' And dIdFecha = '$dIdFecha'
         And sIdConvenio = '$sIdConvenio' And InStr('".$row['sWbs']."', concat(sWbs,'.')) > 0";
         mysql_query($sql);
         if(mysql_error())mensaje("error 3: ");
      }

   $sql = "Select a.sWbs, a.sNumeroActividad, a.dCantidadAnexo, a.dPonderado, b.iFase, Sum(b.dCantidad) as dCantidad
             From bitacoradealcances b
             INNER JOIN actividadesxanexo a
             ON (b.sContrato = a.sContrato And a.sIdConvenio = '$sIdConvenio' And b.sNumeroActividad = a.sNumeroActividad
              and a.sTipoActividad ='Actividad')
             WHERE b.sContrato = '$sContrato' and b.dIdFecha = '$dIdFecha'
             GROUP BY  b.sNumeroActividad, b.iFase order by a.iItemOrden, b.iFase ";
      $result = mysql_query($sql);
      if(mysql_error())mensaje("error 4: ");
      while($row = mysql_fetch_array($result)){
          $sql = "SELECT Sum(b.dCantidad) as dCantidad, a.dAvance FROM bitacoradealcances b
                INNER JOIN alcancesxactividad a ON (b.sContrato = a.sContrato And b.sNumeroActividad = a.sNumeroActividad
                And b.iFase = a.iFase)
                WHERE b.sContrato = '$sContrato' And b.sNumeroActividad = '".$row['sNumeroActividad']."'
                And b.iFase = '".$row['iFase']."' And b.dIdFecha <= '$dIdFecha' Group By b.sNumeroActividad";
         $dAvancePartida = 0 ;
         $result_ba = mysql_query($sql);
         if(mysql_error())mensaje("error 5: ");
         if($row_ba = mysql_fetch_array($result_ba) ){
            $dAvancePartida = $row_ba['dCantidad'] ;
            If (($dAvancePartida - $row['dCantidad']) >= $row['dCantidadAnexo']){
               $dAvancePartida = 0;
            }else{
               If ($dAvancePartida > $row['dCantidadAnexo'])
                  $dAvancePartida = (($row['dCantidadAnexo'] - ( $dAvancePartida - $row['dCantidad'])) * $row_ba['dAvance']) / $row['dCantidadAnexo'];
               else
                  $dAvancePartida = ($row['dCantidad'] * $row_ba['dAvance']) / $row['dCantidadAnexo'] ;
            }
         }
        $dAvanceObra = ($dAvancePartida * $row['dPonderado']) ;
         $sql ="UPDATE bitacoradepaquetes SET dAvance = dAvance + '$dAvanceObra'
               WHERE sContrato = '$sContrato'
               And sNumeroOrden = '$sNumeroOrden'
               And dIdFecha = '$dIdFecha'
               And sIdConvenio = '$sIdConvenio'
               And InStr('".$row['sWbs']."', concat(sWbs,'.')) > 0";
         mysql_query($sql);
         if(mysql_error())mensaje("05: ");
      }
}


##_____________________________________AvancesHistorico
function AvancesHistorico($sContrato,$sNumeroOrden,$sIdConvenio,$sIdTurno ,$dIdFecha , $lParamMultiple){
  If (!lParamMultiple)
  {
      // busco el avance global anterior
      $sql = "Select dAvancePonderadoDia, dAvancePonderadoGlobal from avancesglobales where sContrato = '$sContrato'
              and sIdConvenio = '$sIdConvenio' And dIdFecha = $sIdFecha and sNumeroOrden = '' )";
      $result = mysql_query($sql);
      if(mysql_error())mensaje("6: ".mysql_error());
      If ($row = mysql_fetch_array($result))
      {
          $dProgramadoGlobalActual = $row['dAvancePonderadoDia'] ;
          $dProgramadoGlobalAcumulado = $row['dAvancePonderadoGlobal'] ;
          $dProgramadoGlobalAnterior = dProgramadoGlobalAcumulado - dProgramadoGlobalActual;
      }
      Else
      {
         $sql ="SELECT dAvancePonderadoDia, dAvancePonderadoGlobal from avancesglobales
                WHERE sContrato = '$sNumeroOrden' and sIdConvenio = '$sIdConvenio' And sNumeroOrden = '' And dIdFecha < '$dIdFecha'
                ORDER  BY dIdFecha DESC' " ;
          $result = mysql_query($sql);
          if(mysql_error())mensaje("7: ".mysql_error());
          If ($row = mysql_fetch_array($result))
          {
             $dProgramadoGlobalAcumulado = $row['dAvancePonderadoGlobal'] ;
             If($dProgramadoOrdenAcumulado < 100 )
             {
                 $dProgramadoGlobalActual = $row['dAvancePonderadoDia'] ;
                 $dProgramadoGlobalAnterior = dProgramadoGlobalAcumulado - dProgramadoGlobalActual;
             }
             else
             {
                 $dProgramadoGlobalActual = 0 ;
                 $dProgramadoGlobalAnterior = $row['dAvancePonderadoGlobal'] ;
             }
          }
      }

      // busco el avance global anterior
      $sql = "Select Sum(dAvance) as dAvanceGlobal from avancesglobalesxorden
              where sContrato = '$sContrato' and sIdConvenio = '$sIdConvenio' And sNumeroOrden = ''
              And dIdFecha < '$dIdFecha' Group By sContrato" ;
      $result = mysql_query($sql);
      if(mysql_error())mensaje("8: ".mysql_error());
      If ($row = mysql_fetch_array($result))
          $dRealGlobalAnterior = $row['dAvanceGlobal'] ;

      $sql = "SELECT sum(dAvance) as dAvance
              FROM avancesglobalesxorden
              WHERE sContrato = '$sContrato' and sIdConvenio = '$sIdConvenio' And dIdFecha = '$dIdFecha' and sNumeroOrden = ''
              GROUP BY sContrato" ;
      $result = mysql_query($sql);
      if(mysql_error())mensaje("9: ".mysql_error());
      If ($row = mysql_fetch_array($result))
           $dRealGlobalActual = $row['dAvance'] ;

      $dRealGlobalAcumulado = $dRealGlobalAnterior + $dRealGlobalActual ;
  }
  Else
  {
      // busco el avance global anterior
      $sql ="Select dAvancePonderadoDia, dAvancePonderadoGlobal from avancesglobales where sContrato = '$sContrato' and
             sIdConvenio = '$sIdConvenio' And dIdFecha = '$dIdFecha' and sNumeroOrden = '' ";
      $result = mysql_query($sql);
      if(mysql_error())mensaje("10: ".mysql_error());
      If ($row = mysql_fetch_array($result))
      {
          $dProgramadoGlobalActual = $row['dAvancePonderadoDia'] ;
          $dProgramadoGlobalAcumulado = $row['dAvancePonderadoGlobal'] ;
          $dProgramadoGlobalAnterior = $dProgramadoGlobalAcumulado - $dProgramadoGlobalActual;
      }
      Else
      {
         $sql = "Select dAvancePonderadoDia, dAvancePonderadoGlobal from avancesglobales WHERE sContrato = '$sContrato'
                 and sIdConvenio = '$sIdConvenio' And sNumeroOrden = '' And dIdFecha < '$dIdFecha' Order By dIdFecha DESC ";
         $result = mysql_query($sql);
         if(mysql_error())mensaje("11: ".mysql_error());
          If ($row = mysql_fetch_array($result))
          {
             $dProgramadoGlobalAcumulado = $row['dAvancePonderadoGlobal'] ;
             If ($dProgramadoOrdenAcumulado < 100 )
             {
                 $dProgramadoGlobalActual = $row['dAvancePonderadoDia'] ;
                 $dProgramadoGlobalAnterior = $dProgramadoGlobalAcumulado - $dProgramadoGlobalActual;
             }
             Else
             {
                 $dProgramadoGlobalActual = 0 ;
                 $dProgramadoGlobalAnterior = $row['dAvancePonderadoGlobal'] ;
             }
          }
      }

      // busco el avance global anterior
      $sql = "Select Sum(dAvance) as dAvanceGlobal from avancesglobalesxorden where sContrato = '$sContrato'
              and sIdConvenio = '$sIdConvenio' And sNumeroOrden = '' And dIdFecha < '$dIdFecha' Group By sContrato " ;
      $result = mysql_query($sql);
      if(mysql_error())mensaje("12: ".mysql_error());
      If ($row = mysql_fetch_array($result))
          $dRealGlobalAnterior = $row['dAvanceGlobal'] ;

      $sql = "SELECT Sum(dAvance) as dAvance
              FROM avancesglobalesxorden WHERE sContrato = '$sContrato' and sIdConvenio = '$sIdConvenio'
                     And dIdFecha = '$dIdFecha' and sNumeroOrden = ''
            GROUP BY sContrato" ;
      $result = mysql_query($sql);
      if(mysql_error())mensaje("13: ".mysql_error());
      If ($row = mysql_fetch_array($result))
          $dRealGlobalActual = $row['dAvance'] ;

      $dRealGlobalAcumulado = $dRealGlobalAnterior + $dRealGlobalActual ;

      //  Vamos con los avances de la orden
      $sql = " SELECT dAvancePonderadoDia, dAvancePonderadoGlobal
               FROM avancesglobales where sContrato  =  '$sContrato'
                  and sIdConvenio = '$sIdConvenio' And dIdFecha = '$dIdFecha' and sNumeroOrden = '$sNumeroOrden' ";
      $result = mysql_query($sql);
      if(mysql_error())mensaje("14: ".mysql_error());
      If ($row = mysql_fetch_array($result))
      {
          $dProgramadoOrdenActual = $row['dAvancePonderadoDia'] ;
          $dProgramadoOrdenAcumulado = $row['dAvancePonderadoGlobal'] ;
          $dProgramadoOrdenAnterior = $dProgramadoOrdenAcumulado - $dProgramadoOrdenActual;
      }
      Else
      {
         $sql = " SELECT dAvancePonderadoDia, dAvancePonderadoGlobal from avancesglobales
                  WHERE sContrato = '$sContrato' and sIdConvenio = '$sIdConvenio'
                     And sNumeroOrden = '$sNumeroOrden' And dIdFecha < '$dIdFecha' Order By dIdFecha DESC";
         $result = mysql_query($sql);
         if(mysql_error())mensaje("15: ".mysql_error());
         If ($row = mysql_fetch_array($result))
          {
              $dProgramadoOrdenAcumulado = $row['dAvancePonderadoGlobal'] ;
              If ( $dProgramadoOrdenAcumulado < 100 )
              {
                  $dProgramadoOrdenActual = $row['dAvancePonderadoDia'] ;
                  $dProgramadoOrdenAnterior = $dProgramadoOrdenAcumulado - $dProgramadoOrdenActual;
              }
              Else
              {
                  $dProgramadoOrdenAnterior = $row['dAvancePonderadoGlobal'] ;
                  $dProgramadoOrdenActual = 0 ;
              }
          }
      }

      // busco el avance global anterior
      $sql = " SELECT Sum(dAvance) as dAvanceGlobal
               FROM avancesglobalesxorden
               WHERE sContrato = '$sContrato' and sIdConvenio = '$sIdConvenio' And sNumeroOrden = '$sNumeroOrden'
                     And dIdFecha < '$dIdFecha' Group By sContrato ";
      $result = mysql_query($sql);
      if(mysql_error())mensaje("16: ".mysql_error());
      If ($row = mysql_fetch_array($result))
          $dRealOrdenAnterior = $row['dAvanceGlobal'] ;

      $sql = " SELECT Sum(dAvance) as dAvance
               FROM avancesglobalesxorden
               WHERE sContrato = '$sContrato' and sIdConvenio = '$sIdConvenio'
                  And dIdFecha = '$dIdFecha' and sNumeroOrden = '$sNumeroOrden' Group By sContrato";
      $result = mysql_query($sql);
      if(mysql_error())mensaje("17: ".mysql_error());
      If ($row = mysql_fetch_array($result))
          $dRealOrdenActual = $row['dAvance'] ;
      $dRealOrdenAcumulado = $dRealOrdenAnterior + $dRealOrdenActual ;
 }
 $sql="UPDATE reportediario SET
      lStatus = 'Validado',
      sIdUsuarioValida = 'IMOLINA',
      iPersonal = 0,
      sTiempoAdicional = '00:00',
      sTiempoEfectivo = '00:00',
      sTiempoMuerto = '00:00',
      sTiempoMuertoReal = '00:00',
      dAvProgAnteriorOrden = '$dProgramadoOrdenAnterior',
      dAvProgActualOrden = '$dProgramadoOrdenActual',
      dAvRealAnteriorOrden = '$dRealOrdenAnterior',
      dAvRealActualOrden = '$dRealOrdenActual'
      WHERE sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden' And dIdFecha = '$dIdFecha' And sIdTurno = '$sIdTurno' ";
mysql_query($sql);
if(mysql_error())mensaje("18: ".mysql_error());

$sql = "Update reportediario SET
         dAvProgAnteriorContrato = '$dProgramadoGlobalAnterior ',
         dAvProgActualContrato = '$dProgramadoGlobalActual',
         dAvRealAnteriorContrato = '$dRealGlobalAnterior',
         dAvRealActualContrato = '$dRealGlobalActual'
         WHERE sContrato = '$sContrato' And dIdFecha = '$dIdFecha' ";
mysql_query($sql);
if(mysql_error())mensaje("19: ".mysql_error());
}

##_____________________________________InicializaJornadas
function InicializaJornadas( $sContrato,$sNumeroOrden, $sIdTurno, $sJornada,$dIdFecha )
{
  $iPersonal = 0 ;
    //Primero el Total de Personal de la Orden (Excluye Turnos en Tierra)....
    $sql ="Select SUM(b.dCantidad) as dTotal From bitacoradepersonal b
         INNER JOIN bitacoradeactividades b2 ON (b.sContrato = b2.sContrato And b.dIdFecha = b2.dIdFecha and b.iIdDiario = b2.iIdDiario)
         INNER JOIN reportediario r on (b2.sContrato = r.sContrato and b2.sNumeroOrden = r.sNumeroOrden And b2.dIdFecha = r.dIdFecha And b2.sIdTurno = r.sIdTurno And r.sNumeroOrden = '$sNumeroOrden' And r.sIdTurno = '$sIdTurno')
         INNER JOIN turnos t on (r.sContrato = t.sContrato and r.sIdTurno = t.sIdTurno And t.sOrigenTierra = 'No')
         WHERE b.sContrato = '$sContrato' And b.dIdFecha = '$dIdFecha' Group By b2.sContrato" ;
   $result = mysql_query($sql);
   if(mysql_error())mensaje("20: ".mysql_error());
   If ($row = mysql_fetch_array($result))
      $iPersonal = $row['dTotal'] ;

    //Ahora Actualizo las Jornadas del Dia ...
    // Proceso correcto para el calculo de los tiempos muertos ...
    // Tiempos involucrados en la orden de trabajo ...
    $sTiempoDisponible = '00:00' ;
    $sTiempoMuerto1    = '00:00' ;
    $sTiempoMuerto2    = '00:00' ;
    $sMuerto           = '00:00' ;
    $sql ="SELECT SUM(dFrente) as dFrenteTotal
           FROM jornadasdiarias
           WHERE sContrato = '$sContrato' And dIdFecha = '$dIdFecha' And sNumeroOrden = '$sNumeroOrden' And sIdTurno = '$sIdTurno'
            AND sIdTipoMovimiento<>'TMDS' AND sTipo!='Tiempo Inactivo';";
    $result = mysql_query($sql);
    if(mysql_error())mensaje("21: ".mysql_error());
    if($row = mysql_fetch_array($result)){
      $dFrenteTotal = $row['dFrenteTotal'];
   }
       $sql ="SELECT sContrato, dIdFecha, sNumeroOrden, sIdTurno, sArea, sTipo, sIdTipoMovimiento,sIdPernocta,
                  sHoraSalida, sIdEmbarcacion, sHoraInicio, sHoraFinal, sTiempoComida, dFrente, sJornada
           FROM jornadasdiarias
           WHERE sContrato = '$sContrato' And dIdFecha = '$dIdFecha' And sNumeroOrden = '$sNumeroOrden' And sIdTurno = '$sIdTurno' ";
    $result = mysql_query($sql);
    if(mysql_error())mensaje("22: ".mysql_error());
    While ($row = mysql_fetch_array($result))
    {
      $sTiempo="00:00";
      $sTiempo = sTiempoMuertoTMDS($row['sJornada'],$iPersonal,$dFrenteTotal,$row['dFrente']);

      if($row['sTipo'] <> 'Tiempo Inactivo')
            $sTiempoDisponible = SumarHoras ($sTiempoDisponible , $sTiempo );
      else{
         if($row['sIdTipoMovimiento']!="TMDS")
            $sTiempoMuerto2 = SumarHoras ($sTiempoMuerto2 , $sTiempo );
         else
            $sTiempoMuerto1 = SumarHoras ($sTiempoMuerto1 , $sTiempo );
      }
      $sql ="UPDATE jornadasdiarias SET dPersonal = '$iPersonal', sTiempoMuerto = '$sTiempo'
            WHERE (sContrato = '".$row['sContrato']."' And dIdFecha = '".$row['dIdFecha']."' And sNumeroOrden = '".$row['sNumeroOrden']."'
               And sIdTurno = '".$row['sIdTurno']."' And sArea = '".$row['sArea']."' And sTipo = '".$row['sTipo']."'
               And sIdTipoMovimiento = '".$row['sIdTipoMovimiento']."' And sIdPernocta = '".$row['sIdPernocta']."'
               And sHoraSalida = '".$row['sHoraSalida']."' And sIdEmbarcacion = '".$row['sIdEmbarcacion']."'
               And sHoraInicio = '".$row['sHoraInicio']."' And sHoraFinal = '".$row['sHoraFinal']."')";
         mysql_query($sql);
         if(mysql_error())mensaje("23: ".mysql_error());
    }
    $sTiempoEfectivoReal = '00:00' ;
    $sTiempoMuertoReal = '00:00' ;
    $sTiempoAdicional = '00:00' ;
    $sTiempoEfectivo = ($sJornada!="")?$sJornada:"00:00" ;
    $sTiempoMuertoReal = SumarHoras ($sTiempoMuerto1,$sTiempoMuerto2) ;
    // Si mi tiempo muerto es mayor que la jornada ( 8 o 12 horas) entonces lo igualo a la jornada
    if(CompararHoras($sTiempoMuertoReal,$sTiempoEfectivo)){
        $sTiempoMuertoReal = $sTiempoEfectivo ;
    }
    else{
        if(!CompararHoras($sTiempoEfectivo,$sTiempoDisponible))#si el tiempo disponible es mayor que el de configuracion
        {
            $sTiempoEfectivoReal =$sTiempoDisponible ;
            $sTiempoAdicional = RestarHoras( $sTiempoDisponible ,$sTiempoEfectivo);
        }
        Else
            $sTiempoEfectivoReal = RestarHoras ( $sTiempoMuertoReal,$sTiempoEfectivo ) ;
      }

    $sql = "Update reportediario SET sTiempoMuerto = '$sTiempoMuertoReal',
                                     sTiempoEfectivo = '$sTiempoEfectivoReal',
                                     sTiempoAdicional = '$sTiempoAdicional',
                                     iPersonal = '$iPersonal'
            WHERE sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden' And dIdFecha = '$dIdFecha' And sIdTurno = '$sIdTurno'";
   mysql_query($sql);
   if(mysql_error())mensaje("25: ".mysql_error());
}

##_____________________________________ActualizaJornadas
function ActualizaJornadas ( $sContrato, $sNumeroOrden ,$dIdFecha)
{
    // Actualizo los tiempos muertos de todos las ordenes de trabajo ...
    // Proceso correcto para el calculo de los tiempos muertos ...
    // Tiempos involucrados en todo el contrato
    // Solo reportes diarios con turno diferente a Tierra
    // Total de Personal del Dia por Contrato (Excluye Turnos en Tierra)
    $iPersonalTotal = 0 ;
    $sql ="SELECT SUM(b.dCantidad) as dTotal
           FROM bitacoradepersonal b
           INNER JOIN bitacoradeactividades b2 ON (b.sContrato = b2.sContrato And b.dIdFecha = b2.dIdFecha and b.iIdDiario = b2.iIdDiario)
           INNER JOIN turnos t ON (b2.sContrato = t.sContrato And b2.sIdTurno = t.sIdTurno And t.sOrigenTierra = 'No')
           WHERE b.sContrato = '$sContrato' And b.dIdFecha = '$dIdFecha' Group By b2.sContrato";

    $result = mysql_query($sql);
    if(mysql_error())mensaje("26: ".mysql_error());
    If ($row = mysql_fetch_array($result))
         $iPersonalTotal = $row['dTotal'] ;

   $sql = "SELECT r.sNumeroOrden, r.dIdFecha, r.sIdTurno, r.sTiempoMuerto, r.iPersonal
            FROM reportediario r
            INNER JOIN turnos t ON (r.sContrato = t.sContrato And r.sIdTurno = t.sIdTurno And t.sOrigenTierra = 'No')
            WHERE r.sContrato = '$sContrato' And r.dIdFecha = '$dIdFecha' ";
    $result = mysql_query($sql);
    if(mysql_error())mensaje("27: ".mysql_error());
    While ($row = mysql_fetch_array($result))
    {
         $sMuertoReal  = sTiempoMuertoTMDS($row['sTiempoMuerto'],$iPersonalTotal,0,$row['iPersonal']);

         $sql = "UPDATE reportediario SET sTiempoMuertoReal = '$sMuertoReal'
                 WHERE sContrato = '$sContrato' And sNumeroOrden = '".$row['sNumeroOrden']."' And dIdFecha = '".$row['dIdFecha']."'
                 And sIdTurno = '".$row['sIdTurno']."' ";
         mysql_query($sql);
         if(mysql_error())mensaje("28: ".mysql_error());
    }
}
##_____________________________________Ajusta bitacora de alcances
function AjustaBitacoraAlcances ($sContrato,$sNumeroOrden,$sIdTurno,$dIdFecha){
   $sql = "UPDATE bitacoradealcances SET
           dCantidadAnterior=0 , dAvanceAnterior=0, dCantidadActual=0,dAvanceActual=0
           WHERE sContrato='$sContrato' AND sNumeroOrden='$sNumeroOrden'
               AND dIdFecha='$dIdFecha' AND sIdTurno='$sIdTurno'";
   mysql_query($sql);
   if(mysql_error())mensaje("30: ".mysql_error());

   $sql = "SELECT iIdDiario, sWbs, sNumeroActividad, iFase, dCantidad, dAvance
           FROM bitacoradealcances
           WHERE sContrato = '$sContrato' AND dIdFecha = '$dIdFecha'
           AND sNumeroOrden = '$sNumeroOrden' AND sIdTurno = '$sIdTurno'
           ORDER BY sWbs, sNumeroActividad ASC ";
   $result = mysql_query($sql);
   if(mysql_error())mensaje("31: ".mysql_error());

   while($row = mysql_fetch_array($result))
   {
      $sql = "SELECT sum(dCantidad) as dInstalado, sum(dAvance) as dAvance
              FROM bitacoradealcances WHERE sContrato = '$sContrato' AND dIdFecha < '$dIdFecha'
              AND sNumeroOrden = '$sNumeroOrden' AND sWbs = '".$row['sWbs']."'
              AND sNumeroActividad = '".$row['sNumeroActividad']."' AND iFase = '".$row['iFase']."'
              GROUP BY sWbs, sNumeroActividad ";
      $result2 = mysql_query($sql);
      if(mysql_error())mensaje("32: ".mysql_error());
      $dCantidadAnterior = 0 ;
      $dAvanceAnterior = 0 ;
   If($row2 = mysql_fetch_array($result2))
      {
         $dCantidadAnterior = $row2['dInstalado'] ;
         $dAvanceAnterior = $row2['dAvance'] ;
      }

      $sql = "UPDATE bitacoradealcances SET
               dCantidadAnterior = '$dCantidadAnterior',
               dAvanceAnterior = '$AvanceAnterior',
               dCantidadActual = '".$row['dCantidad']."' ,
               dAvanceActual = '".$row['dAvance']."'
             WHERE sContrato = '$sContrato' AND dIdFecha = '$dIdFecha' AND iIdDiario = '".$row['iIdDiario']."' ";
      mysql_query($sql);
      if(mysql_error())mensaje("33: ".mysql_error());
   }
}
##_____________________________________Ajusta Bitacora de Activades
function AjustaBitacoraActividades ($sContrato,$sNumeroOrden,$sIdTurno,$sIdConvenio,$dIdFecha){
   mysql_query("UPDATE bitacoradeactividades SET
               dCantidadAnterior = 0,
               dAvanceAnterior = 0,
               dCantidadActual = 0,
               dAvanceActual = 0
             WHERE sContrato ='$sContrato'  And sNumeroOrden = '$sNumeroOrden' And dIdFecha = '$dIdFecha' And sIdTurno = '$sIdTurno' ");
   if(mysql_error())mensaje("34: ".mysql_error());

   $result = mysql_query("SELECT b.iIdDiario, b.sWbs, b.sNumeroActividad, Sum(b.dCantidad) as dCantidadActual, Sum(b.dAvance) as dAvanceActual
                        FROM bitacoradeactividades b
                        INNER JOIN actividadesxorden a
                              ON (b.sContrato = a.sContrato
                              And a.sIdConvenio ='$sIdConvenio'  And b.sNumeroOrden = a.sNumeroOrden
                              And b.sWbs = a.sWbs And b.sNumeroActividad = a.sNumeroActividad)
                        WHERE b.sContrato = '$sContrato' and b.dIdFecha = '$dIdFecha' And b.sNumeroOrden = '$sNumeroOrden' And b.sIdTurno = '$sIdTurno'
                        GROUP BY b.sWbs, b.sNumeroActividad
                        ORDER BY a.iItemOrden, a.sNumeroActividad asc") ;
   if(mysql_error())mensaje("35: ".mysql_error());

   while($row = mysql_fetch_array($result)){
      $sql ="SELECT sum(dCantidad) as dInstalado, sum(dAvance) as dAvance
          FROM bitacoradeactividades
          WHERE sContrato = '$sContrato' and dIdFecha < '$dIdFecha' And sNumeroOrden = '$sNumeroOrden'
            And sWbs = '".$row['sWbs']."' And sNumeroActividad = '".$row['sNumeroActividad']."'
          GROUP BY sWbs, sNumeroActividad";
      $dCantidadAnterior = 0 ;
      $dAvanceAnterior = 0 ;
      $result2 = mysql_query($sql);
      if(mysql_error())mensaje("35: ".mysql_error());
      if($row2 = mysql_fetch_array($result2)){
          $dCantidadAnterior = $row2['dInstalado'] ;
          $dAvanceAnterior = $row2['dAvance'] ;
      }

      mysql_query("UPDATE bitacoradeactividades SET
               dCantidadAnterior = '$dCantidadAnterior',
               dAvanceAnterior = '$dAvanceAnterior',
               dCantidadActual = '".$row['dCantidadActual']."',
               dAvanceActual = '".$row['AvanceActual']."'
               WHERE sContrato = '$sContrato' And dIdFecha = '$dIdFecha'
               And iIdDiario = '".$row['iIdDiario']."'");
      if(mysql_error())mensaje("36: ".mysql_error());
   }
   ##Bitacora de Paquetes ...
   $sql = "SELECT b.sWbs, sum((b.dAvance * a.dPonderado)) as dAvanceReal
         FROM bitacoradeactividades b
         INNER JOIN actividadesxorden a
         ON (b.sContrato = a.sContrato And a.sIdConvenio = '$sIdConvenio' And b.sNumeroOrden = a.sNumeroOrden
               And b.sWbs = a.sWbs And b.sNumeroActividad = a.sNumeroActividad)
         WHERE b.sContrato = '$sContrato' and b.dIdFecha = '$dIdFecha' And b.sNumeroOrden = '$sNumeroOrden'
         GROUP BY b.sWbs order by b.sWbs, a.iNivel DESC";
   $result = mysql_query($sql);
   if(mysql_error())mensaje("37: ".mysql_error());
   while ($row = mysql_fetch_array($result)){
      $sql ="UPDATE bitacoradepaquetes SET
               dAvance = dAvance + '".$row['dAvanceReal']."'
             WHERE sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden'
             And dIdFecha = '$dIdFecha' And sIdConvenio = '$sIdConvenio'
             And InStr('".$row['sWbs']."' , concat(sWbs,'.')) > 0 ";
   mysql_query($sql);
   if(mysql_error())mensaje(mysql_error());

}
}
?>
