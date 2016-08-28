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
    $result = queryTransaccion($sql);
    $cadena = "### 17: $sql \n Error: " . mysql_error();
    GuardaQuery($cadena);
    While ($row = mysql_fetch_array($result)){
        $sql ="Select sum(dCantidad) as dAcumulado From bitacoradeactividades
               Where sContrato = '$sContrato'
               AND sNumeroActividad = '".$row['sNumeroActividad']."'
               AND dIdFecha <= '$dIdFecha'
               GROUP BY sNumeroActividad";
        $dAvancePartida = 0 ;
        $result_ba = queryTransaccion($sql);
        $cadena = "### 18: $sql \n Error: " . mysql_error();
        GuardaQuery($cadena);
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
         queryTransaccion($sql);
         $cadena = "### 19: $sql \n Error: " . mysql_error();
         GuardaQuery($cadena);
       }

   $sql = "Select a.sWbs, a.sNumeroActividad, a.dCantidadAnexo, a.dPonderado, b.iFase, Sum(b.dCantidad) as dCantidad
             From bitacoradealcances b
             INNER JOIN actividadesxanexo a
             ON (b.sContrato = a.sContrato And a.sIdConvenio = '$sIdConvenio' And b.sNumeroActividad = a.sNumeroActividad
              and a.sTipoActividad ='Actividad')
             WHERE b.sContrato = '$sContrato' and b.dIdFecha = '$dIdFecha'
             GROUP BY  b.sNumeroActividad, b.iFase order by a.iItemOrden, b.iFase ";
      $result = queryTransaccion($sql);
      $cadena = "### 20: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);
      while($row = mysql_fetch_array($result)){
          $sql = "SELECT Sum(b.dCantidad) as dCantidad, a.dAvance FROM bitacoradealcances b
                INNER JOIN alcancesxactividad a ON (b.sContrato = a.sContrato And b.sNumeroActividad = a.sNumeroActividad
                And b.iFase = a.iFase)
                WHERE b.sContrato = '$sContrato' And b.sNumeroActividad = '".$row['sNumeroActividad']."'
                And b.iFase = '".$row['iFase']."' And b.dIdFecha <= '$dIdFecha' Group By b.sNumeroActividad";
         $dAvancePartida = 0 ;
         $result_ba = queryTransaccion($sql);
         $cadena = "### 21: $sql \n Error: " . mysql_error();
         GuardaQuery($cadena);
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
         queryTransaccion($sql);
         $cadena = "### 22: $sql \n Error: " . mysql_error();
         GuardaQuery($cadena);

      }
}


##_____________________________________AvancesHistorico
function AvancesHistorico($sContrato,$sNumeroOrden,$sIdConvenio,$sIdTurno ,$dIdFecha , $lParamMultiple){
 $dProgramadoOrdenAnterior = 0;
 $dProgramadoOrdenActual = 0;
 $dRealOrdenAnterior = 0;
 $dRealOrdenActual = 0;
 $dProgramadoGlobalAnterior = 0;
 $dProgramadoGlobalActual = 0;
 $dRealGlobalAnterior = 0;
 $dRealGlobalActual = 0;
  If (!lParamMultiple)
  {
      // busco el avance global actual
      $sql = "Select dAvancePonderadoDia, dAvancePonderadoGlobal from avancesglobales where sContrato = '$sContrato'
              and sIdConvenio = '$sIdConvenio' And dIdFecha = $sIdFecha and sNumeroOrden = '' ";
      $result = queryTransaccion($sql);
      $cadena = "### 42: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);
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
          $result = queryTransaccion($sql);
         $cadena = "### 43: $sql \n Error: " . mysql_error();
         GuardaQuery($cadena);

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
      $result = queryTransaccion($sql);
      $cadena = "### 44: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);

      If ($row = mysql_fetch_array($result))
          $dRealGlobalAnterior = $row['dAvanceGlobal'] ;

      $sql = "SELECT sum(dAvance) as dAvance
              FROM avancesglobalesxorden
              WHERE sContrato = '$sContrato' and sIdConvenio = '$sIdConvenio' And dIdFecha = '$dIdFecha' and sNumeroOrden = ''
              GROUP BY sContrato" ;
      $result = queryTransaccion($sql);
      $cadena = "### 45: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);

      If ($row = mysql_fetch_array($result))
           $dRealGlobalActual = $row['dAvance'] ;

      $dRealGlobalAcumulado = $dRealGlobalAnterior + $dRealGlobalActual ;
  }
  Else
  {
      // busco el avance global anterior
     $sql ="Select dAvancePonderadoDia, dAvancePonderadoGlobal from avancesglobales where sContrato = '$sContrato' and
             sIdConvenio = '$sIdConvenio' And dIdFecha = '$dIdFecha' and sNumeroOrden = '' ";
      $result = queryTransaccion($sql);
      $cadena = "### 46_AVG: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);

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
         $result = queryTransaccion($sql);
      $cadena = "### 47: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);

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

      // busco el avance global real anterior
      $sql = "Select Sum(dAvance) as dAvanceGlobal from avancesglobalesxorden where sContrato = '$sContrato'
              and sIdConvenio = '$sIdConvenio' And sNumeroOrden = '' And dIdFecha < '$dIdFecha' Group By sContrato " ;
      $result = queryTransaccion($sql);
      $cadena = "### 48: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);

      If ($row = mysql_fetch_array($result))
          $dRealGlobalAnterior = $row['dAvanceGlobal'] ;
      // busco el avance global real actual
      $sql = "SELECT Sum(dAvance) as dAvance
              FROM avancesglobalesxorden WHERE sContrato = '$sContrato' and sIdConvenio = '$sIdConvenio'
                     And dIdFecha = '$dIdFecha' and sNumeroOrden = ''
            GROUP BY sContrato" ;
      $result = queryTransaccion($sql);
      $cadena = "### 49: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);

      If ($row = mysql_fetch_array($result))
          $dRealGlobalActual = $row['dAvance'] ;

      $dRealGlobalAcumulado = $dRealGlobalAnterior + $dRealGlobalActual ;

      #Vamos con los avances de la orden
      #buscar avances programados (anterior, actual y acumulado)
     $sql = "SELECT dAvancePonderadoDia, dAvancePonderadoGlobal
               FROM avancesglobales where sContrato  =  '$sContrato'
                  and sIdConvenio = '$sIdConvenio' And dIdFecha = '$dIdFecha' and sNumeroOrden = '$sNumeroOrden' ";
      $result = queryTransaccion($sql);
      $cadena = "### 50: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);

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
         $result = queryTransaccion($sql);
      $cadena = "### 51: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);

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

     # buscar el avance real anterior de la orden
     $sql = " SELECT Sum(dAvance) as dAvanceGlobal
               FROM avancesglobalesxorden
               WHERE sContrato = '$sContrato' and sIdConvenio = '$sIdConvenio' And sNumeroOrden = '$sNumeroOrden'
                     And dIdFecha < '$dIdFecha' Group By sContrato ";
      $result = queryTransaccion($sql);
      $cadena = "### 52: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);

      If ($row = mysql_fetch_array($result))
          $dRealOrdenAnterior = $row['dAvanceGlobal'] ;
     # buscar el avance real actual de la orden
      $sql = " SELECT Sum(dAvance) as dAvance
               FROM avancesglobalesxorden
               WHERE sContrato = '$sContrato' and sIdConvenio = '$sIdConvenio'
                  And dIdFecha = '$dIdFecha' and sNumeroOrden = '$sNumeroOrden' Group By sContrato";
      $result = queryTransaccion($sql);
      $cadena = "### 53: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);

      If ($row = mysql_fetch_array($result))
          $dRealOrdenActual = $row['dAvance'] ;
      # obtener el avance acumulado de la orden
      $dRealOrdenAcumulado = $dRealOrdenAnterior + $dRealOrdenActual ;
 }

   $sql="UPDATE reportediario SET
      lStatus = 'Validado',
      sIdUsuarioValida = '".$_SESSION['ssUsuario']."',
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
queryTransaccion($sql);
      $cadena = "### 54: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);


 $sql = "Update reportediario SET
         dAvProgAnteriorContrato = '$dProgramadoGlobalAnterior',
         dAvProgActualContrato = '$dProgramadoGlobalActual',
         dAvRealAnteriorContrato = '$dRealGlobalAnterior',
         dAvRealActualContrato = '$dRealGlobalActual'
         WHERE sContrato = '$sContrato' And dIdFecha = '$dIdFecha' ";
queryTransaccion($sql);
      $cadena = "### 55: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);


}

##_____________________________________InicializaJornadas
function InicializaJornadas( $sContrato,$sNumeroOrden, $sIdTurno, $sJornada,$dIdFecha )
{
$sql = "Select
            r.sNumeroOrden,
            r.dIdFecha,
            r.sIdTurno
       From reportediario r
       INNER JOIN turnos t ON (
         r.sContrato = t.sContrato
         And r.sIdTurno = t.sIdTurno
         And t.sOrigenTierra = 'No'
       )
       Where
         r.sContrato = '$sContrato'
         And r.dIdFecha = '$dIdFecha';";
       $rs = queryTransaccion($sql);
   while($rowOrdenes = mysql_fetch_array($rs)){
      $sNumeroOrden = $rowOrdenes['sNumeroOrden'];
      $iPersonal = 0 ;
       //Primero el Total de Personal de la Orden (Excluye Turnos en Tierra)....
       $sql ="Select SUM(b.dCantidad) as dTotal From bitacoradepersonal b
            INNER JOIN bitacoradeactividades b2 ON (b.sContrato = b2.sContrato And b.dIdFecha = b2.dIdFecha and b.iIdDiario = b2.iIdDiario)
            INNER JOIN reportediario r on (b2.sContrato = r.sContrato and b2.sNumeroOrden = r.sNumeroOrden And b2.dIdFecha = r.dIdFecha And b2.sIdTurno = r.sIdTurno And r.sNumeroOrden = '$sNumeroOrden' And r.sIdTurno = '$sIdTurno')
            INNER JOIN turnos t on (r.sContrato = t.sContrato and r.sIdTurno = t.sIdTurno And t.sOrigenTierra = 'No')
            WHERE b.sContrato = '$sContrato' And b.dIdFecha = '$dIdFecha' Group By b2.sContrato" ;
      $result = queryTransaccion($sql);
         $cadena = "### 57: $sql \n Error: " . mysql_error();
         GuardaQuery($cadena);

      If ($row = mysql_fetch_array($result))
         $iPersonal = $row['dTotal'] ;

       //Ahora Actualizo las Jornadas del Dia ...
       // Proceso correcto para el calculo de los tiempos muertos ...
       // Tiempos involucrados en la orden de trabajo ...
       $sTiempoDisponible = '00:00' ;
       $sTiempoMuerto1    = '00:00' ;
       $sTiempoMuerto2    = '00:00' ;
       $sMuerto           = '00:00' ;
       /*$sql ="SELECT SUM(dFrente) as dFrenteTotal
              FROM jornadasdiarias
              WHERE sContrato = '$sContrato' And dIdFecha = '$dIdFecha' And sNumeroOrden = '$sNumeroOrden' And sIdTurno = '$sIdTurno'
               AND sIdTipoMovimiento<>'TMDS' AND sTipo!='Tiempo Inactivo';";
       $result = queryTransaccion($sql);
         $cadena = "### 58: $sql \n Error: " . mysql_error();
         GuardaQuery($cadena);
       $dFrenteTotal =0;
       if($row = mysql_fetch_array($result)){
         $dFrenteTotal = $row['dFrenteTotal'];
       }  */
       $sql ="SELECT sContrato, dIdFecha, sNumeroOrden, sIdTurno, sArea, sTipo, sIdTipoMovimiento,sIdPernocta,
                     sHoraSalida, sIdEmbarcacion, sHoraInicio, sHoraFinal, sTiempoComida, dFrente, sJornada
              FROM jornadasdiarias
              WHERE sContrato = '$sContrato' And dIdFecha = '$dIdFecha' And sNumeroOrden = '$sNumeroOrden' And sIdTurno = '$sIdTurno' ";
       $result = queryTransaccion($sql);
         $cadena = "### 59: $sql \n Error: " . mysql_error();
         GuardaQuery($cadena);

       While ($row = mysql_fetch_array($result))
       {
         $sTiempo="00:00";
         //$sTiempo = sTiempoMuertoTMDS($row['sJornada'],$iPersonal,$dFrenteTotal,$row['dFrente']);
         $sTiempo = sTiempoMuertoTMDS($row['sJornada'],$iPersonal,$row['dFrente']);

         if($row['sTipo'] <> 'Tiempo Inactivo'){
               $sTiempoDisponible = SumarHoras ($sTiempoDisponible , $sTiempo );
         }
         else
         if($row['sIdTipoMovimiento']!="TMDS"){
               $sTiempoMuerto2 = SumarHoras ($sTiempoMuerto2 , $sTiempo );

         }
         else
               $sTiempoMuerto1 = SumarHoras ($sTiempoMuerto1 , $sTiempo );

         $sql ="UPDATE jornadasdiarias SET dPersonal = '$iPersonal', sTiempoMuerto = '$sTiempo'
               WHERE (sContrato = '".$row['sContrato']."' And dIdFecha = '".$row['dIdFecha']."' And sNumeroOrden = '".$row['sNumeroOrden']."'
                  And sIdTurno = '".$row['sIdTurno']."' And sArea = '".$row['sArea']."' And sTipo = '".$row['sTipo']."'
                  And sIdTipoMovimiento = '".$row['sIdTipoMovimiento']."' And sIdPernocta = '".$row['sIdPernocta']."'
                  And sHoraSalida = '".$row['sHoraSalida']."' And sIdEmbarcacion = '".$row['sIdEmbarcacion']."'
                  And sHoraInicio = '".$row['sHoraInicio']."' And sHoraFinal = '".$row['sHoraFinal']."')";
            queryTransaccion($sql);
         $cadena = "### 60: $sql \n Error: " . mysql_error();
         GuardaQuery($cadena);


       }

       $sTiempoEfectivoReal = '00:00' ;
       $sTiempoMuertoReal = '00:00' ;
       $sTiempoAdicional = '00:00' ;
       $sTiempoEfectivo = ($sJornada!="")?$sJornada:"00:00" ;
       $sTiempoMuertoReal = SumarHoras ($sTiempoMuerto2,$sTiempoMuerto1) ;

       #GuardaQuery("\nsTiempoMuerto2=$sTiempoMuerto2","tiempoMuerto.log");
       #GuardaQuery("\nsTiempoMuerto1=$sTiempoMuerto","tiempoMuerto.log");
       #GuardaQuery("\nsTiempoMuertoReal=$sTiempoMuertoReal","tiempoMuerto.log");
       #GuardaQuery("\nsTiempoDisponible=$sTiempoDisponible ","tiempoMuerto.log");
       #GuardaQuery("\nsTiempoEfectivo=$sTiempoEfectivo","tiempoMuerto.log");


       // Si mi tiempo muerto es mayor que la jornada ( 8 o 12 horas) entonces lo igualo a la jornada
       if(CompararHoras($sTiempoMuertoReal,$sTiempoEfectivo)){
           $sTiempoMuertoReal = $sTiempoEfectivo ;
           #GuardaQuery("\n1. sTiempoMuertoReal = sTiempoEfectivo ;$sTiempoMuertoReal = $sTiempoEfectivo ","tiempoMuerto.log");
       }
       else{
           if(!CompararHoras($sTiempoEfectivo,$sTiempoDisponible))#si el tiempo disponible es mayor que el de configuracion
           {
               #GuardaQuery("\n2. sTiempoEfectivoReal =sTiempoDisponible ;$sTiempoEfectivoReal =$sTiempoDisponible ; ","tiempoMuerto.log");
               $sTiempoEfectivoReal = RestarHoras( $sTiempoMuertoReal,$sTiempoDisponible) ; #$sTiempoDisponible ;
               $sTiempoAdicional = RestarHoras($sJornada,$sTiempoDisponible); # RestarHoras( $sTiempoEfectivo,$sTiempoDisponible );
               #GuardaQuery("\n2. sTiempoAdicional = RestarHoras( sTiempoDisponible ,sTiempoEfectivo);;$sTiempoAdicional = RestarHoras( $sTiempoDisponible ,$sTiempoEfectivo); ","tiempoMuerto.log");

           }
           Else{
               $sTiempoEfectivoReal = RestarHoras ( $sTiempoMuertoReal,$sTiempoEfectivo ) ;
               #GuardaQuery("\n3. sTiempoEfectivoReal = RestarHoras ( sTiempoMuertoReal,sTiempoEfectivo ) ;$sTiempoEfectivoReal = RestarHoras ( $sTiempoMuertoReal,$sTiempoEfectivo ) ;","tiempoMuerto.log");
           }
         }

       #
       if (CompararHoras($sTiempoEfectivoReal,$sTiempoEfectivo)){
           GuardaQuery("\n1. CompararHoras(sTiempoEfectivoReal,sTiempoEfectivo) ; CompararHoras($sTiempoEfectivoReal,$sTiempoEfectivo)","tiempoMuerto.log");
           $sTiempoMuertoReal = '00:00';
       }
       else{
           GuardaQuery("\n1. $sTiempoMuertoReal = RestarHoras( sTiempoEfectivoReal,sTiempoEfectivo ) ;$sTiempoMuertoReal = RestarHoras( $sTiempoEfectivoReal,$sTiempoEfectivo ) ;","tiempoMuerto.log");
           $sTiempoMuertoReal = RestarHoras( $sTiempoEfectivoReal,$sTiempoEfectivo ) ;
           GuardaQuery("\n2. $sTiempoMuertoReal","tiempoMuerto.log");
       }

       If (CompararHoras($sTiempoMuertoReal,$sJornada)){
           GuardaQuery("\n2. sTiempoMuertoReal = sJornada; $sTiempoMuertoReal = $sJornada;","tiempoMuerto.log");
           $sTiempoMuertoReal = $sJornada;
       }
      #

       $sql = "Update reportediario SET sTiempoMuerto = '$sTiempoMuertoReal',
                                        sTiempoEfectivo = '$sTiempoEfectivoReal',
                                        sTiempoAdicional = '$sTiempoAdicional',
                                        iPersonal = '$iPersonal'
               WHERE sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden' And dIdFecha = '$dIdFecha' And sIdTurno = '$sIdTurno'";
      queryTransaccion($sql);

         $cadena = "### 61: $sql \n Error: " . mysql_error();
         GuardaQuery($cadena);
  }
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

    $result = queryTransaccion($sql);
      $cadena = "### 62: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);

    If ($row = mysql_fetch_array($result))
         $iPersonalTotal = $row['dTotal'] ;

   $sql = "SELECT r.sNumeroOrden, r.dIdFecha, r.sIdTurno, r.sTiempoMuerto, r.iPersonal
            FROM reportediario r
            INNER JOIN turnos t ON (r.sContrato = t.sContrato And r.sIdTurno = t.sIdTurno And t.sOrigenTierra = 'No')
            WHERE r.sContrato = '$sContrato' And r.dIdFecha = '$dIdFecha' ";
    $result = queryTransaccion($sql);
      $cadena = "### 63: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);

    While ($row = mysql_fetch_array($result))
    {
         $sMuertoReal  = sTiempoMuertoTMDS($row['sTiempoMuerto'],$iPersonalTotal,$row['iPersonal']);

         $sql = "UPDATE reportediario SET sTiempoMuertoReal = '$sMuertoReal'
                 WHERE sContrato = '$sContrato' And sNumeroOrden = '".$row['sNumeroOrden']."' And dIdFecha = '".$row['dIdFecha']."'
                 And sIdTurno = '".$row['sIdTurno']."' ";
         queryTransaccion($sql);
      $cadena = "### 64: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);

    }
}


##_____________________________________Ajusta bitacora de alcances
function AjustaBitacoraAlcances ($sContrato,$sNumeroOrden,$sIdTurno,$dIdFecha){
   $sql = "UPDATE bitacoradealcances SET
            dCantidadAnterior=0 ,
            dAvanceAnterior=0,
            dCantidadActual=0,
            dAvanceActual=0
           WHERE
            sContrato='$sContrato'
            AND sNumeroOrden='$sNumeroOrden'
            AND dIdFecha='$dIdFecha'
            AND sIdTurno='$sIdTurno'";
   queryTransaccion($sql);
   $cadena = "### 4: $sql \n Error: " . mysql_error();
   GuardaQuery($cadena);

   $sql = "SELECT
               iIdDiario,
               sWbs,
               sNumeroActividad,
               iFase,
               dCantidad,
               dAvance
           FROM bitacoradealcances
           WHERE
               sContrato = '$sContrato'
               AND dIdFecha = '$dIdFecha'
               AND sNumeroOrden = '$sNumeroOrden'
               AND sIdTurno = '$sIdTurno'
           ORDER BY sWbs, sNumeroActividad ASC ;";
   $result = queryTransaccion($sql);
   $cadena = "### 5: $sql \n Error: " . mysql_error();
   GuardaQuery($cadena);

   while($row = mysql_fetch_array($result))
   {
      $sql = "SELECT
                  sum(dCantidad) as dInstalado,
                  sum(dAvance) as dAvance
              FROM bitacoradealcances
              WHERE
                  sContrato = '$sContrato'
                  AND dIdFecha < '$dIdFecha'
                  AND sNumeroOrden = '$sNumeroOrden'
                  AND sWbs = '".$row['sWbs']."'
                  AND sNumeroActividad = '".$row['sNumeroActividad']."'
                  AND iFase = '".$row['iFase']."'
              GROUP BY sWbs, sNumeroActividad ";
     $result2 = queryTransaccion($sql);

      $cadena = "### 6: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);

      $dCantidadAnterior = 0 ;
      $dAvanceAnterior = 0 ;
      If($row2 = mysql_fetch_array($result2))
      {
         $dCantidadAnterior = $row2['dInstalado'] ;
         $dAvanceAnterior = $row2['dAvance'] ;
      }

      $sql = "UPDATE bitacoradealcances SET
               dCantidadAnterior = '$dCantidadAnterior',
               dAvanceAnterior = '$dAvanceAnterior',
               dCantidadActual = '".$row['dCantidad']."' ,
               dAvanceActual = '".$row['dAvance']."'
             WHERE sContrato = '$sContrato' AND dIdFecha = '$dIdFecha' AND iIdDiario = '".$row['iIdDiario']."' ";
      queryTransaccion($sql);

     $cadena = "### 7: $sql \n Error: " . mysql_error();
     GuardaQuery($cadena);

   }
}
##_____________________________________Ajusta Bitacora de Activades
function AjustaBitacoraActividades ($sContrato,$sNumeroOrden,$sIdTurno,$sIdConvenio,$dIdFecha){
  $sql="UPDATE bitacoradeactividades SET
               dCantidadAnterior = 0,dAvanceAnterior = 0,
               dCantidadActual = 0,dAvanceActual = 0
             WHERE sContrato ='$sContrato'  And sNumeroOrden = '$sNumeroOrden'
                And dIdFecha = '$dIdFecha' And sIdTurno = '$sIdTurno' ";
   queryTransaccion($sql);

   $cadena = "### 8: $sql \n Error: " . mysql_error();
   GuardaQuery($cadena);

    $sql="SELECT b.iIdDiario, b.sWbs, b.sNumeroActividad, Sum(b.dCantidad) as dCantidadActual, Sum(b.dAvance) as dAvanceActual
                        FROM bitacoradeactividades b
                        INNER JOIN actividadesxorden a
                              ON (b.sContrato = a.sContrato
                              And a.sIdConvenio ='$sIdConvenio'  And b.sNumeroOrden = a.sNumeroOrden
                              And b.sWbs = a.sWbs And b.sNumeroActividad = a.sNumeroActividad)
                        WHERE b.sContrato = '$sContrato' and b.dIdFecha = '$dIdFecha' And b.sNumeroOrden = '$sNumeroOrden' And b.sIdTurno = '$sIdTurno'
                        GROUP BY b.sWbs, b.sNumeroActividad
                        ORDER BY a.iItemOrden, a.sNumeroActividad asc"  ;
   $result = queryTransaccion($sql) ;

   $cadena = "### 9: $sql \n Error: " . mysql_error();
   GuardaQuery($cadena);

   while($row = mysql_fetch_array($result)){
        $sql ="SELECT sum(dCantidad) as dInstalado, sum(dAvance) as dAvance
          FROM bitacoradeactividades
          WHERE sContrato = '$sContrato' and dIdFecha < '$dIdFecha' And sNumeroOrden = '$sNumeroOrden'
            And sWbs = '".$row['sWbs']."' And sNumeroActividad = '".$row['sNumeroActividad']."'
          GROUP BY sWbs, sNumeroActividad";
      $dCantidadAnterior = 0 ;
      $dAvanceAnterior = 0 ;
      $result2 = queryTransaccion($sql);

      $cadena = "### 10: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);

      if($row2 = mysql_fetch_array($result2)){
          $dCantidadAnterior = $row2['dInstalado'] ;
          $dAvanceAnterior = $row2['dAvance'] ;
      }

      $sql="UPDATE bitacoradeactividades SET
               dCantidadAnterior = '$dCantidadAnterior',
               dAvanceAnterior = '$dAvanceAnterior',
               dCantidadActual = '".$row['dCantidadActual']."',
               dAvanceActual = '".$row['dAvanceActual']."'
               WHERE sContrato = '$sContrato' And dIdFecha = '$dIdFecha'
               And iIdDiario = '".$row['iIdDiario']."'";
     queryTransaccion($sql);
     $cadena = "### 11: $sql \n Error: " . mysql_error();
     GuardaQuery($cadena);

   }
   ##Bitacora de Paquetes ...
   $sql = "SELECT b.sWbs, sum((b.dAvance * a.dPonderado)) as dAvanceReal
         FROM bitacoradeactividades b
         INNER JOIN actividadesxorden a
         ON (b.sContrato = a.sContrato And a.sIdConvenio = '$sIdConvenio' And b.sNumeroOrden = a.sNumeroOrden
               And b.sWbs = a.sWbs And b.sNumeroActividad = a.sNumeroActividad)
         WHERE b.sContrato = '$sContrato' and b.dIdFecha = '$dIdFecha' And b.sNumeroOrden = '$sNumeroOrden'
         GROUP BY b.sWbs order by b.sWbs, a.iNivel DESC";
   $result = queryTransaccion($sql);

   $cadena = "### 12: $sql \n Error: " . mysql_error();
   GuardaQuery($cadena);

   while ($row = mysql_fetch_array($result)){
      $sql ="UPDATE bitacoradepaquetes SET
               dAvance = dAvance + '".$row['dAvanceReal']."'
             WHERE sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden'
             And dIdFecha = '$dIdFecha' And sIdConvenio = '$sIdConvenio'
             And InStr('".$row['sWbs']."' , concat(sWbs,'.')) > 0 ";
   queryTransaccion($sql);
   $cadena = "### 13: $sql \n Error: " . mysql_error();
   GuardaQuery($cadena);
   }
}
##______________________________________Verifica Generador
function verificaGenerador($sContrato,$sIdConvenio,$sNumeroOrden,$sWbs,$sNumeroActividad,$Fecha,$Consecutivo,$dCantidad){
   $cantidadReportada = 0;
   $cantidadGenerada = 0;
   $Fecha =  formatoFechaPer($Fecha,"Y-m-d");
   #obtener el tipo de seguridad desde configuracion
   $sql = "select sSeguridadGenerador from configuracion where sContrato='$sContrato'";
   $rs = queryTransaccion($sql);
   if($row = mysql_fetch_array($rs)){
      $seguridadGenerador = $row['sSeguridadGenerador'];
   }

   #obtener la cantidad reportada
   if($sWbs != ""){
      $sql = "Select Sum(dCantidad) as dReportado from bitacoradeactividades
              Where sContrato = '$sContrato' and sNumeroOrden = '$sNumeroOrden' And sWbs = '$sWbs' And
              sNumeroActividad = '$sNumeroActividad' And dIdFecha <= '$Fecha' Group By sContrato";
   }
   else{
      $sql = "Select Sum(dCantidad) as dReportado from bitacoradeactividades
              Where sContrato = '$sContrato' and sNumeroOrden = '$sNumeroOrden' And
              sNumeroActividad = '$sNumeroActividad' And dIdFecha <= '$Fecha' Group By sContrato";
   }
   $rs = queryTransaccion($sql);
   if($row = mysql_fetch_array($rs)){
      $cantidadReportada = $row['dReportado'];
   }
   GuardaQuery($sql,$nameLogFile="reportado.log")   ;
   #obtener la cantidad generada
   if($sWbs != ""){
      $sql = "Select Sum(e.dCantidad) as dGenerado from estimacionxpartida e
              inner join estimaciones e2 on (e.sContrato = e2.sContrato and e.sNumeroOrden = e2.sNumeroOrden And e2.sNumeroGenerador = e.sNumeroGenerador And e2.iConsecutivo <= '$Consecutivo')
              Where e.sContrato = '$sContrato' and e.sNumeroOrden = '$sNumeroOrden' And e.sWbs = '$sWbs' And e.sNumeroActividad = '$sNumeroActividad'  Group By e.sContrato";
   }
   else{
      $sql = "Select Sum(e.dCantidad) as dGenerado from estimacionxpartida e
              inner join estimaciones e2 on (e.sContrato = e2.sContrato and e.sNumeroOrden = e2.sNumeroOrden And e2.sNumeroGenerador = e.sNumeroGenerador And e2.iConsecutivo <= '$Consecutivo')
              Where e.sContrato = '$sContrato' and e.sNumeroOrden = '$sNumeroOrden' And e.sNumeroActividad = '$sNumeroActividad'  Group By e.sContrato";
   }
   GuardaQuery($sql,$nameLogFile="generado.log")     ;
   $rs = queryTransaccion($sql);
   if($row = mysql_fetch_array($rs)){
      $cantidadGenerada = $row['dGenerado'];
   }
   #comparar los resultados
   if( ($cantidadGenerada + $dCantidad) > $cantidadReportada ){
       if($seguridadGenerador=="Con Seguridad"){
         $msg = "La cantidad acumulada en los generadores de obra es superior a la cantidad manifestada en los reportes diarios. Cantidad acumulada hasta el Momento de la actividad [$sNumeroActividad] (Acumulado + Cantidad a Generar) = ".($cantidadGenerada + $dCantidad).", Cantidad Manifestada en Reportes Diarios = $cantidadReportada, necesita reportar la cantidad de ".(($cantidadGenerada + $dCantidad) - $cantidadReportada) .". Debe ir a reporte diario y reportar la cantidad necesaria, No se guardara la información!!.";
         $msg=str_replace("\n"," ",$msg);
         mensaje($msg);
         $valRetorno = 0;
       }
       else
         $valRetorno = 1;
   }
   else
      $valRetorno = 1;

   return $valRetorno ;

}
function horaInicioCierre($sContrato,$dIdFecha,$sNumeroOrden,$sIdTurno){
$sHoraInicio=$sHoraFinal='00:00';
   $sql = "Select Min(sHoraInicio) as sHoraInicio,  Max(sHoraFinal) as sHoraFinal
           From jornadasdiarias Where sContrato = '$sContrato' And dIdFecha = '$dIdFecha' And
           sNumeroOrden = '$sNumeroOrden' And sTipo = 'Disponibilidad del Sitio' And sIdTurno = '$sIdTurno' Group By sNumeroOrden" ;
   $rs = queryTransaccion($sql);
         $cadena = "### 66: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);

   if($row = mysql_fetch_array($rs)){
      $sHoraInicio = $row['sHoraInicio'] ;
      $sHoraFinal= $row['sHoraFinal'] ;
   }
   $sql = "Update reportediario SET sOperacionInicio = '$sHoraInicio', sOperacionFinal = '$sHoraFinal'
           Where sContrato = '$sContrato'
           And sNumeroOrden = '$sNumeroOrden'
           And dIdFecha = '$dIdFecha'
           And sIdTurno = '$sIdTurno'";
   queryTransaccion($sql);
         $cadena = "### 67: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);

   return;
}
function  cfnCalculaAvances($sContrato,$sNumeroOrden,$sIdConvenio,$sIdTurno,$lMultiple,$dIdFecha,$sSeguridad){
  $sql = "Select lStatus, sIdConvenio
           From reportediario
           Where
           sContrato = '$sContrato'
           and dIdFecha = '$dIdFecha'
           And sNumeroOrden = '$sNumeroOrden'
           And sIdTurno = '$sIdTurno'";
   $rs = queryTransaccion($sql);
   $cadena = "### 26: $sql \n Error: " . mysql_error();
   GuardaQuery($cadena);
   if($row = mysql_fetch_array($rs)){
        if (!isset($sIdConvenio)){
            If ($row['lStatus'] == 'Pendiente' )
                $lContinua = True;
            Else
                $lContinua = False ;
            $sIdConvenio = $row['sIdConvenio'] ;
        }
        Else
            $lContinua = True ;
   }
   Else{
        $lContinua = True ;
   }
   if($lContinua)
    {
      #Partidas canceladas ....
      #Avance por Plataforma ...
      $dAvancePlataforma=0;
      $sql = "Select Sum(( b.dAvance * a.dPonderado) / 100 ) as dAvance
              From actividadescanceladas b
              INNER JOIN actividadesxorden a ON (
               b.sContrato = a.sContrato
               And b.sNumeroOrden = a.sNumeroOrden
               And a.sIdConvenio = '$sIdConvenio'
               And b.sWbs = a.sWbs
               And b.sNumeroActividad = a.sNumeroActividad
              )
              Where b.sContrato = '$sContrato'
              and b.sNumeroOrden = '$sNumeroOrden'
              and b.dIdFecha = '$dIdFecha'
              group by b.sNumeroOrden";
      $rs = queryTransaccion($sql);
      $cadena = "### 27: $sql \n Error: " . mysql_error();
      GuardaQuery($cadena);
      if($row = mysql_fetch_array($rs)){
           $dAvancePlataforma = $dAvancePlataforma + $row['dAvance'] ;
      }

      #Avance por Contrato ...
      if ($sSeguridad == 'Avanzada')
      {
        $sql = "Select
                  a.sNumeroActividad,
                  a.dPonderado,
                  a.dCantidadAnexo,
                  Sum(b.dCantidad) as dCantidad
                 From actividadescanceladas b
                 INNER JOIN actividadesfcanceladas af ON (
                     af.sContrato = b.sContrato
                     And af.dIdFecha = b.dIdFecha
                     And af.lAfectaContrato = 'Si'
                 )
                 INNER JOIN actividadesxanexo a ON (
                     b.sContrato = a.sContrato
                     And a.sIdConvenio = '$sIdConvenio'
                     And b.sNumeroActividad = a.sNumeroActividad
                     and a.sTipoActividad = 'Actividad'
                 )
                 Where
                  b.sContrato = '$sContrato'
                  and b.dIdFecha = '$dIdFecha'
                  group by b.sNumeroActividad";
         $rs = queryTransaccion($sql);
         $cadena = "### 27_2 $sql \n Error: " . mysql_error();
         GuardaQuery($cadena);
         while($row = mysql_fetch_array($rs))
         {
             $sql="  Select sum(dCantidad) as dAcumulado
                     From bitacoradeactividades
                     Where
                     sContrato = '$sContrato'
                     And sNumeroActividad = '".$row['sNumeroActividad']."'
                     And dIdFecha <= '$dIdFecha'
                     Group By sNumeroActividad' ";
             $dAvancePartida = 0 ;
             $rsAux = queryTransaccion($sql);
             $cadena = "### 28: $sql \n Error: " . mysql_error();
             GuardaQuery($cadena);
             if($rowAux = mysql_fetch_array($rsAux)){
                if (($rowAux['dAcumulado'] - $row['dCantidad']) >= $row['dCantidadAnexo'])
                    $dAvancePartida = 0;
                elseif ($rowAux['dAcumulado'] > $row['dCantidadAnexo'])
                     $dAvancePartida = (($row['dCantidadAnexo'] - ($rowAux['dAcumulado'] -$row['dCantidad'])) * 100) / $row['dCantidadAnexo'];
                else
                  $dAvancePartida = ($row['dCantidad'] * 100) / $row['dCantidadAnexo'] ;
             }
            $dAvanceObra  = $dAvanceObra  + ($dAvancePartida * $row['dPonderado']) ;
         }

        #Avance de Partidas Reportadas ....
        #por Plataforma
        $sql ="Select Sum(( b.dAvance * a.dPonderado) / 100 ) as dAvance
               From bitacoradeactividades b
               INNER JOIN actividadesxorden a ON (
                  b.sContrato = a.sContrato
                  And b.sNumeroOrden = a.sNumeroOrden
                  And a.sIdConvenio = '$sIdConvenio'
                  And b.sWbs = a.sWbs
                  And b.sNumeroActividad = a.sNumeroActividad
               )
               Where
               b.sContrato = '$sContrato'
               and b.dIdFecha = '$dIdFecha'
               And b.sNumeroOrden = '$sNumeroOrden'
               group by b.sNumeroOrden";
         $rs = queryTransaccion($sql);
         $cadena = "### 29: $sql \n Error: " . mysql_error();
         GuardaQuery($cadena);
         if($row = mysql_fetch_array($rs))
            $dAvancePlataforma = $dAvancePlataforma + $row['dAvance'] ;

        #Por Contrato de Partidas reportadas en bitacora
        #Por Contrato de Partidas reportadas por Alcances
        if ($sSeguridad == 'Avanzada' )
        {
            $sql="Select a.sNumeroActividad, a.dCantidadAnexo, a.dPonderado, Sum(b.dCantidad) as dCantidad
                  From bitacoradeactividades b
                  INNER JOIN actividadesxanexo a ON (
                     b.sContrato = a.sContrato
                     And a.sIdConvenio = '$sIdConvenio'
                     And b.sNumeroActividad = a.sNumeroActividad
                     and a.sTipoActividad = 'Actividad')
                  Where
                     b.sContrato = '$sContrato'
                     and b.dIdFecha = '$dIdFecha'
                     And b.lAlcance = 'No'
                  group by b.sNumeroActividad
                  order by a.iItemOrden";
            $rs = queryTransaccion($sql);
            $cadena = "### 30: $sql \n Error: " . mysql_error();
            GuardaQuery($cadena);
            while($row = mysql_fetch_array($rs))
            {
                $sql ="Select sum(dCantidad) as dAcumulado
                       From bitacoradeactividades
                       Where sContrato = '$sContrato'
                       And sNumeroActividad = '".$row['sNumeroActividad']."'
                       And dIdFecha <= '$dIdFecha'
                       Group By sNumeroActividad";
                $rsAux = queryTransaccion($sql);
                $cadena = "### 31: $sql \n Error: " . mysql_error();
                GuardaQuery($cadena);
                $dAvancePartida = 0;
                if($rowAux = mysql_fetch_array($rsAux)){
                  if (($rowAux['dAcumulado'] - $row['dCantidad']) >= $row['dCantidadAnexo'])
                       $dAvancePartida = 0;
                   elseif ($rowAux['dAcumulado'] > $row['dCantidadAnexo'])
                      $dAvancePartida = (($row['dCantidadAnexo'] - ($rowAux['dAcumulado'] - $row['dCantidad'])) * 100) / $row['dCantidadAnexo'];
                   else
                    $dAvancePartida = ($row['dCantidad'] * 100) / $row['dCantidadAnexo'] ;
                 }
                    GuardaQuery("avance de la partida $dAvancePartida");
               $dAvanceObra = $dAvanceObra + ($dAvancePartida * $row['dPonderado']) ;
            }
           $sql = "Select
                        a.sNumeroActividad,
                        a.dCantidadAnexo,
                        a.dPonderado,
                        b.iFase,
                        Sum(b.dCantidad) as dCantidad
                    From bitacoradealcances b
                    INNER JOIN actividadesxanexo a ON (
                        b.sContrato = a.sContrato
                        And a.sIdConvenio = '$sIdConvenio'
                        And b.sNumeroActividad = a.sNumeroActividad
                        and a.sTipoActividad = 'Actividad'
                    )
                    Where
                        b.sContrato = '$sContrato'
                        and b.dIdFecha = '$dIdFecha'
                    group by b.sNumeroActividad, b.iFase
                    order by a.iItemOrden, b.iFase";
            $rs = queryTransaccion($sql);
            $cadena = "### 32: $sql \n Error: " . mysql_error();
            GuardaQuery($cadena);
            while($row = mysql_fetch_array($rs))
            {

             $sql = "Select Sum(b.dCantidad) as dCantidad, a.dAvance
                       From bitacoradealcances b
                       INNER JOIN alcancesxactividad a ON (
                           b.sContrato = a.sContrato
                           And b.sNumeroActividad = a.sNumeroActividad
                           And b.iFase = a.iFase
                       )
                       Where
                           b.sContrato = '$sContrato'
                           And b.sNumeroActividad = '".$row['sNumeroActividad']."'
                           And b.iFase ='".$row['iFase']."'
                           And b.dIdFecha <= '$dIdFecha'
                           Group By b.sNumeroActividad";
               $dAvancePartida = 0 ;
               $rsAux = queryTransaccion($sql);
               $cadena = "### 33: $sql \n Error: " . mysql_error();
               GuardaQuery($cadena);
               if($rowAux = mysql_fetch_array($rsAux))
               {
                    $dAvancePartida = $rowAux['dCantidad'] ;
                    if (($dAvancePartida - $row['dCantidad']) >= $row['dCantidadAnexo'])
                        $dAvancePartida = 0;
                    else if ($dAvancePartida > $row['dCantidadAnexo'])
                        $dAvancePartida = (($row['dCantidadAnexo'] - ( $dAvancePartida - $row['dCantidad'])) * $rowAux['dAvance']) / $row['dCantidadAnexo'];
                    else
                        $dAvancePartida = ($row['dCantidad'] * $rowAux['dAvance']) / $row['dCantidadAnexo'] ;

               }
               $dAvanceObra = $dAvanceObra + ($dAvancePartida * $row['dPonderado']) ;

            }
           $dAvanceObra = $dAvanceObra / 100 ;
         }

        # Almacenamiento de Avances ...
        # Primero se ajusta tanto el avance x programa de trabajo ...
        #avances de la orden de trabajo
        if ($lMultiple)
        {
            $sql = " Select sum(dAvance) as dAvance
                     from avancesglobalesxorden
                     where
                        sContrato = '$sContrato'
                        and sIdConvenio = '$sIdConvenio'
                        And dIdFecha < '$dIdFecha'
                        and sNumeroOrden = '$sNumeroOrden'
                     Group By sNumeroOrden";
             $rs = queryTransaccion($sql);
             $cadena = "### 34: $sql \n Error: " . mysql_error();
             GuardaQuery($cadena);
             if ($row = mysql_fetch_array($rs)){
                If ( ($row['dAvance'] + $dAvancePlataforma ) > 100)
                    $dAvancePlataforma = 100 - $row['dAvance'] ;
             }
            $sql = " Select dIdFecha
                     from avancesglobalesxorden
                     where
                        sContrato = '$sContrato'
                        and sIdConvenio = '$sIdConvenio'
                        And dIdFecha = '$dIdFecha'
                        and sNumeroOrden = '$sNumeroOrden'
                        And sIdTurno = 'A'
                     Group By sNumeroOrden";
            //$sIdTurno
            $rs = queryTransaccion($sql);
            $cadena = "### 35: $sql \n Error: " . mysql_error();
            GuardaQuery($cadena);
            if($row = mysql_fetch_array($rs))
            {
               $sql="Update avancesglobalesxorden SET
                        dAvance = '$dAvancePlataforma'
                     Where
                        sContrato = '$sContrato'
                        And dIdFecha = '$dIdFecha'
                        And sNumeroOrden = '$sNumeroOrden'
                        And sIdConvenio = '$sIdConvenio'
                        And sIdTurno = 'A'";
               queryTransaccion($sql);
               $cadena = "### 36: $sql \n Error: " . mysql_error();
               GuardaQuery($cadena);
             }
             Else
             {
                $sql = "INSERT INTO avancesglobalesxorden (
                           sContrato,
                           sNumeroOrden,
                           dIdFecha,
                           sIdConvenio,
                           sIdTurno,
                           dAvance
                      )
                      Values (
                        '$sContrato',
                        '$sNumeroOrden',
                        '$dIdFecha',
                        '$sIdConvenio',
                        'A',
                        '$dAvancePlataforma'
                      )";
               queryTransaccion($sql);
               $cadena = "### 37: $sql \n Error: " . mysql_error();
               GuardaQuery($cadena);
             }
        } ;

        #Avances del Contrato ...
        If ($sSeguridad == 'Avanzada')
        {

           $sql="Select
                     sum(dAvance) as dAvance
                  from
                     avancesglobalesxorden
                  where
                     sContrato = '$sContrato'
                     and sIdConvenio = '$sIdConvenio'
                     And dIdFecha < '$dIdFecha'
                     and sNumeroOrden = ''
                  Group By sContrato";
            $rs = queryTransaccion($sql);
            $cadena = "### 38: $sql \n Error: " . mysql_error();
            GuardaQuery($cadena);
            if($row = mysql_fetch_array($rs)){
                if ( ($row['dAvance'] + $dAvanceObra ) > 100)
                     $dAvanceObra = 100 - $row['dAvance']  ;
            }
            $sql = " Select
                        dIdFecha
                     from
                        avancesglobalesxorden
                     where
                        sContrato = '$sContrato'
                        and sIdConvenio = '$sIdConvenio'
                        And dIdFecha = '$dIdFecha'
                        and sNumeroOrden = ''
                        And sIdTurno = 'A'
                     Group By sContrato";
            $rs = queryTransaccion($sql);
            $cadena = "### 39: $sql \n Error: " . mysql_error();
            GuardaQuery($cadena);
            if($row = mysql_fetch_array($rs))
            {
              $sql="update avancesglobalesxorden SET
                        dAvance = '$dAvanceObra'
                     Where
                        sContrato = '$sContrato'
                        And dIdFecha = '$dIdFecha'
                        And sNumeroOrden = ''
                        And sIdConvenio = '$sIdConvenio'
                        And sIdTurno = 'A'";
               queryTransaccion($sql);
               $cadena = "### 40: $sql \n Error: " . mysql_error();
               GuardaQuery($cadena);
            }
            else
            {
               $sql="INSERT INTO avancesglobalesxorden (
                        sContrato,
                        sNumeroOrden,
                        dIdFecha,
                        sIdConvenio,
                        sIdTurno,
                        dAvance)
                     Values (
                        '$sContrato',
                        '',
                        '$dIdFecha',
                        '$sIdConvenio',
                        'A',
                        '$dAvanceObra')";
               queryTransaccion($sql);
               $cadena = "### 41: $sql \n Error: " . mysql_error();
               GuardaQuery($cadena);
            }
        }
    }

    return $dAvanceObra ;
   }

}
function lVerificaGenerador($sContrato, $sIdConvenio, $sNumeroOrden,$sNumeroActividad,$sWbs, $dIdFecha, $iConsecutivo,$dCantidad)
{
    global $dCantidadReportada;
    global $dCantidadGenerada;
    If ($sWbs != "")
        $SQLReportada = "Select Sum(dCantidad) as dReportado from bitacoradeactividades
                Where sContrato = '$sContrato' and sNumeroOrden = '$sNumeroOrden' And sWbs = '$sWbs' And 
                sNumeroActividad = '$sNumeroActividad' And dIdFecha <= '$dIdFecha' Group By sContrato";
    Else
        $SQLReportada = "Select Sum(dCantidad) as dReportado from bitacoradeactividades
                Where sContrato = '$sContrato' and sNumeroOrden = '$sNumeroOrden' And
                sNumeroActividad = '$sNumeroActividad' And dIdFecha <= '$dIdFecha' Group By sContrato";
    GuardaQuery("\n#################9:\n".$SQLReportada);
    $rsReportada = queryTransaccion($SQLReportada);
    $dCantidadReportada = 0;
    if($rowReportada  = mysql_fetch_array($rsReportada))
        $dCantidadReportada = $rowReportada['dReportado'];

        

    If ($sWbs != "" )
        $SQLGenerada = "Select Sum(e.dCantidad) as dGenerado 
                        from 
                           estimacionxpartida e 
                        inner join estimaciones e2 on (
                              e.sContrato = e2.sContrato 
                              and e.sNumeroOrden = e2.sNumeroOrden 
                              And e2.sNumeroGenerador = e.sNumeroGenerador 
                              And e2.iConsecutivo <= '$iConsecutivo')
                        Where
                           e.sContrato = '$sContrato'
                           and e.sNumeroOrden = '$sNumeroOrden'
                           And e.sWbs = '$sWbs'
                           And e.sNumeroActividad = '$sNumeroActividad'
                        Group By e.sContrato";
    else
        $SQLGenerada = "Select
                           Sum(e.dCantidad) as dGenerado
                        from
                           estimacionxpartida e
                        inner join estimaciones e2 on (
                           e.sContrato = e2.sContrato
                           and e.sNumeroOrden = e2.sNumeroOrden
                           And e2.sNumeroGenerador = e.sNumeroGenerador
                           And e2.iConsecutivo <= '$iConsecutivo')
                        Where
                           e.sContrato = '$sContrato'
                           and e.sNumeroOrden = '$sNumeroOrden'
                           And e.sNumeroActividad = '$sNumeroActividad'
                        Group By e.sContrato";

    $rsGenerada = queryTransaccion($SQLGenerada);
    $dCantidadGenerada = 0 ;
    if($rowGenerada = mysql_fetch_array($rsGenerada))
        $dCantidadGenerada = $rowGenerada['dGenerado'];


    if ( ($dCantidadGenerada + $dCantidad) > $dCantidadReportada ){
         if (configuracion($sContrato,'sSeguridadGenerador') == 'Con Seguridad' ){
              $result = 0;
         }
         else{
              $result = 1;
         }
    }
    else{
        $result = 1;
   }
   return $result ;
}

function dfnGeneradoAnterior ($sContrato, $sNumeroActividad ,$iConsecutivo)
{
    $SQL ="Select Sum(e.dCantidad) as dGenerado
           from estimacionxpartida e
           inner join estimaciones e2 on (
               e.sContrato = e2.sContrato
               and e.sNumeroOrden = e2.sNumeroOrden
               And e2.sNumeroGenerador = e.sNumeroGenerador
               And e2.iConsecutivo <= '$iConsecutivo'
               And e2.lStatus = 'Validado')
           Where
            e.sContrato = '$sContrato'
            And e.sNumeroActividad = '$sNumeroActividad'
           Group By e.sContrato";
         GuardaQuery("\n#################2.1:\n".$SQL);
      $rs = queryTransaccion($SQL);
      if($row = mysql_fetch_array($rs))
         return $row['dGenerado'];
      else
         return 0 ;
}
?>
