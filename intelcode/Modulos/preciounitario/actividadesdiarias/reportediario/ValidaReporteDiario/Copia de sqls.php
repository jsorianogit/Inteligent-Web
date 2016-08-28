<?php
require("../jornadas/functions.php");//sqls.php
require ("../../../../include/mysql.inc.php");
//funcion Ajusta Contratos
function ajustaContrato($sContrato,$sIdConvenio,$dIdFecha){

   $sql ="Select a.sWbs, a.sNumeroActividad, a.dCantidadAnexo, a.dPonderado, Sum(b.dCantidad) as dCantidad 
                         From bitacoradeactividades b 
                         INNER JOIN actividadesxanexo a 
                         ON (b.sContrato = a.sContrato And a.sIdConvenio = '$sIdConvenio' 
                         And b.sNumeroActividad = a.sNumeroActividad and a.sTipoActividad = 'Actividad') 
                         WHERE b.sContrato = '$sContrato' and b.dIdFecha = '$dIdFecha' And b.lAlcance = 'No' 
                         GROUP BY b.sWbs order by a.iItemOrden";
    $result = mysql_query($sql);
    if(mysql_error())mensaje("1: ".mysql_error());
    While ($row = mysql_fetch_array($result)){
         $sql ="Select sum(dCantidad) as dAcumulado From bitacoradeactividades 
               Where sContrato = '$sContrato'
               AND sNumeroActividad = '".$row['sNumeroActividad']."'
               AND dIdFecha <= '$dIdFecha'
               GROUP BY sNumeroActividad";
        $dAvancePartida = 0 ;
        $result_ba = mysql_query($sql);
        if(mysql_error())mensaje("2: ".mysql_error());
        if($row_ba = mysql_fetch_array($result_ba)){
            if( ($row_ba['dAcumulado']-$row_ba['dCantidad'])>=$row_ba['dCantidadAnexo']){
               $dAvancePartida =0;
            }
            else if($row_ba['dAcumulado']>$row_ba['dCantidadAnexo']){
               $dAvancePartida = (($row_ba['dCantidadAnexo'] - ($row_ba['dAcumulado'] - $row_ba['dCantidad'])) * 100) / $row_ba['dCantidadAnexo'];
            }
            else{
               $dAvancePartida =($row_ba['dCantidad'] * 100) / $row_ba['dCantidadAnexo'] ;;
            }
            $dAvanceObra = $dAvanceObra + ($dAvancePartida + $row_ba['dPonderado']);
            $dAvanceObra = ($dAvancePartida * $row_ba['dPonderado']) ;
        }
        //:Avance
         echo "<br>".
         $sql ="UPDATE bitacoradepaquetes SET dAvance = dAvance + $dAvanceObra
         WHERE sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden' And dIdFecha = '$dIdFecha' 
         And sIdConvenio = '$sIdConvenio' And InStr('".$row['sWbs']."', concat(sWbs,'.')) > 0";
         mysql_query($sql);
         if(mysql_error())mensaje("3: ".mysql_error());
      }
      
     $sql = "Select a.sWbs, a.sNumeroActividad, a.dCantidadAnexo, a.dPonderado, b.iFase, Sum(b.dCantidad) as dCantidad 
             From bitacoradealcances b 
             INNER JOIN actividadesxanexo a 
             ON (b.sContrato = a.sContrato And a.sIdConvenio = '$sIdConvenio' And b.sNumeroActividad = a.sNumeroActividad 
              and a.sTipoActividad ='Actividad')
             WHERE b.sContrato = '$sContrato' and b.dIdFecha = '$dIdFecha' 
             GROUP BY  b.sNumeroActividad, b.iFase order by a.iItemOrden, b.iFase ";
      $result = mysql_query($sql);
      if(mysql_error())mensaje("4: ".mysql_error());
      while($row = mysql_fetch_array($result)){
         $sql = "SELECT Sum(b.dCantidad) as dCantidad, a.dAvance FROM bitacoradealcances b 
                INNER JOIN alcancesxactividad a ON (b.sContrato = a.sContrato And b.sNumeroActividad = a.sNumeroActividad
                And b.iFase = a.iFase)
                WHERE b.sContrato = '$sContrato' And b.sNumeroActividad = '".$row['sNumeroActividad']."' 
                And b.iFase = '".$row['iFase']."' And b.dIdFecha <= '$dIdFecha' Group By b.sNumeroActividad";
         $dAvancePartida = 0 ;
         $result_ba = mysql_query($sql);
         if(mysql_error())mensaje("5: ".mysql_error());
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
         $dAvanceObra = (dAvancePartida * $row['dPonderado']) ;
         $sql ="UPDATE bitacoradepaquetes SET dAvance = dAvance + $dAvanceObra  
               WHERE sContrato = '$sContrato'; 
               And sNumeroOrden = '$sNumeroOrden' 
               And dIdFecha = '$dIdFecha' 
               And sIdConvenio = '$sIdConvenio' 
               And InStr('".$row['sWbs']."', concat(sWbs,'.')) > 0')";
         mysql_query($sql);
         if(mysql_error())mensaje("5: ".mysql_error());
      }
}


//AvancesHistorico
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

//InicializaJornadas
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
#__________________________Iniciando el proceso de validacion de reportes diarios
$sContrato=(isset($_REQUEST['sContrato']))?$_REQUEST['sContrato']:$_POST['sContrato'] ; //'428236843';
$sNumeroOrden = (isset($_REQUEST['sNumeroOrden']))?$_REQUEST['sNumeroOrden']:$_POST['sNumeroOrden']; //'428236843';
$sIdTurno = (isset($_REQUEST['sIdTurno']))?$_REQUEST['sIdTurno']:$_POST['sIdTurno']; //'A';
$sIdConvenio=(isset($_REQUEST['sIdConvenio']))?$_REQUEST['sIdConvenio']:$_POST['sIdConvenio'] ;//'A-03';
$dIdFecha=(isset($_REQUEST['dIdFecha']))?$_REQUEST['dIdFecha']:$_POST['dIdFecha'] ;//'2007-06-13';
$lStatus=(isset($_REQUEST['lStatus']))?$_REQUEST['lStatus']:$_POST['lStatus'] ;//'2007-06-13';

$sIdUsuarioValida = (isset($_POST['sIdUsuarioValida']))?$_POST['sIdUsuarioValida']:$_SESSION['ssUsuario'];
$sPassword=(isset($_POST['sPassword']))?$_POST['sPassword']:'';
$Aceptar=(isset($_POST['aceptar']))?$_POST['aceptar']:NULL;

if($lStatus == "Validado" or $lStatus == "Autorizado"){
   mensaje("Ya ha sido validado o Autorizado : Contrato: $sContrato - Numero de Orden: $sNumeroOrden - Feha: $dIdFecha ");
   location("../?sNumeroOrden=$sNumeroOrden");
   exit(0);
}


##Verificar el tipo de seguridad
$sql = "SELECT sTipoSeguridad FROM configuracion WHERE sContrato='$sContrato'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   if($row[0]=="Avanzada" AND !isset($Aceptar)){
   ?>
      <script>
        var url = "FormValida.php?sContrato=<?php echo $sContrato ?>&sNumeroOrden=<?php echo $sNumeroOrden ?>&sIdTurno=<?php echo $sIdTurno ?>&sIdConvenio=<?php echo $sIdConvenio ?>&dIdFecha=<?php echo $dIdFecha ?>&lStatus=<?php echo $lStatus ?>";
        window.open(url,"Valida","width=300,height=150,scrollbars=NO,Top=300,Left=450");
      </script>
      <center>
      <h3>Es necesario la autenficacion para realizar esta accion<h3><br>
      </center>   
   <?php
   exit(0);
   }

   if(isset($sIdUsuarioValida) and isset($sPassword) and isset($Aceptar) and $Aceptar!="")
   {
      $sql = "SELECT u.sIdUsuario FROM usuarios u INNER JOIN contratosxusuario c ON (u.sIdUsuario = c.sIdUsuario AND u.lValida='Si')
              WHERE c.sContrato='$sContrato' AND u.sPassword='$sPassword' AND u.sIdUsuario='$sIdUsuarioValida'";
      $result_user = mysql_query($sql);

      if(!$row_user = mysql_fetch_array($result_user)){
         mensaje("El nombre de usuario y/o contraseña son incorrectos o no tiene permitido el acceso al contrato");
            if(isset($_POST['aceptar']) and $_POST['aceptar']=="Aceptar")
               echo "<script>window.close()</script>";
            else
               location("../?sNumeroOrden=$sNumeroOrden");
         exit(0);
      }
   }
   
}

#Verificar que el usuario tenga permisos para validar el reporte diario
      $sql="SELECT u.lValida FROM usuarios u WHERE u.sIdUsuario='$sIdUsuarioValida '";
      $result_user = mysql_query($sql);
      if($row_user = mysql_fetch_array($result_user)){
         if($row_user[0]!="Si"){
            mensaje("No tiene Permitido Validar");
            if(isset($_POST['aceptar']) and $_POST['aceptar']=="Aceptar")
               echo "<script>window.close()</script>";
            else
               location("../?sNumeroOrden=$sNumeroOrden");
            exit(0);
         }
      }
      
##
echo "
<br>
<center>
   <h3>Espere...</h3>
</center>   
";
#primero borramos todo lo de bitracoradepaquete del contrato, convenio, fecha y numero de orden
mysql_query("DELETE FROM bitacoradepaquetes
             WHERE sContrato='$sContrato' AND sIdConvenio='$sIdConvenio'
             AND sNumeroOrden='$sNumeroOrden' AND dIdFecha='$dIdFecha'");
if(mysql_error())mensaje(mysql_error());

#reingresamos los paquetes en la bitacoradepaquetes
$sql = "SELECT sContrato,sIdConvenio,'$dIdFecha' as dIdFecha, sNumeroOrden,sWbs,sNumeroActividad,0 
        FROM actividadesxorden 
        WHERE sContrato = '$sContrato' AND sIdConvenio='$sIdConvenio' AND sNumeroOrden='$sNumeroOrden' AND sTipoActividad='Paquete'";
$result = mysql_query($sql);
if(mysql_error())mensaje("29: ".mysql_error()); 
while($row = mysql_fetch_array($result)){
   $sql ="INSERT INTO bitacoradepaquetes 
          (sContrato,sIdConvenio,dIdFecha,sNumeroOrden,sWbs,sNumeroActividad,dAvance)
         VALUES('".$row['sContrato']."','".$row['sIdConvenio']."','".$row['dIdFecha']."','".$row['sNumeroOrden']."','".$row['sWbs']."','".$row['sNumeroActividad']."','0')";
   mysql_query($sql);   
   if(mysql_error())mensaje("29.1: ".mysql_error());
}



##bitacora de alcances:  actualzar las cantidades y avances anteriores y acuales
## Contrato, Orden, Fecha, Turno
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


##bitacora de actividades:
## Contrato, Orden, Fecha, Turno, convenio
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
####----------------------------------------------------------------------------------------------------------------------------------------###
$sql = "UPDATE bitacoradepaquetes SET dAvance = dAvance / 100  
         WHERE sContrato = '$sContrato' And dIdFecha = '$dIdFecha' And sIdConvenio = '$sIdConvenio'
         And sNumeroOrden = '$sNumeroOrden'";
mysql_query($sql);
if(mysql_error())mensaje("38: ".mysql_error());
# 1:
// Primero Elimino todo de la Bitacora de Paquetes de ese dia ...
$sql = "Delete from bitacoradepaquetes where sContrato = '$sContrato'
            And sIdConvenio = '$sIdConvenio'
            And sNumeroOrden = '$sNumeroOrden'
            And dIdFecha = '$dIdFecha';";
mysql_query($sql);
if(mysql_error())mensaje("39: ".mysql_error());
exit();
// Avances del Contrato ....
$sql ="insert into bitacoradepaquetes (sContrato, sIdConvenio, dIdFecha, sNumeroOrden, sWbs, sNumeroActividad, dAvance)
      select sContrato, sIdConvenio, '$dIdFecha', '', sWbs, sNumeroActividad, 0
      FROM actividadesxanexo
      WHERE sContrato = '$sContrato' And sIdConvenio = '$sIdConvenio' And sTipoActividad = 'Paquete'";
mysql_query($sql);
exit();
if(mysql_error())mensaje("40: ".mysql_error());
############################################################
      //llama el procedimiento de ajusta contrato
      ajustaContrato($sContrato, $sIdConvenio, $dIdFecha) ;
      //fin llama el procedimiento de ajusta contrato
############################################################
$sql = "UPDATE bitacoradepaquetes SET dAvance = dAvance / 100  
        WHERE sContrato = '$sContrato' And dIdFecha = '$dIdFecha' And sIdConvenio = '$sIdConvenio' And sNumeroOrden = '$sNumeroOrden' ";
mysql_query($sql);
if(mysql_error())mensaje("41: ".mysql_error());

$sql= " select iJornada from ordenesdetrabajo Where sContrato='$sContrato' and sNumeroOrden='$sNumeroOrden'";
$result = mysql_query($sql);
if(mysql_error())mensaje("42: ".mysql_error());
if($row = mysql_fetch_array($result)){
   $iJornadaxOrden = $row['iJornada'];
}
$CantidadDeOrdenes = 0;
$sql= " select sum(sNumeroOrden) as dTotal from ordenesdetrabajo Where sContrato='$sContrato'";
$result = mysql_query($sql);
if(mysql_error())mensaje("43: ".mysql_error());
if($row = mysql_fetch_array($result)){
   $CantidadDeOrdenes = $row['dTotal'];
}
#Obtener las jorandas a trabajar en el dia
if($iJornadaxOrden == 0 ){
   $iJornadas = Jornadas();
   $JornadasxDia = JornadasDia($_SESSION['dIdFecha'],$iJornadas);
}
else
   $JornadasxDia = $iJornadaxOrden;
#Crear formato en horas de las jornadas de trabajo
if($JornadasxDia < 10)
   $sJornada = "0$JornadasxDia:00";
else
   $sJornada = "$JornadasxDia:00";
##################################################################
// Proceso para actualizacion de avances .....
If ($CantidadDeOrdenes > 1 )
   AvancesHistorico ($sContrato, $sNumeroOrden, $sIdConvenio, $sIdTurno, $dIdFecha, True );
Else
   AvancesHistorico ($sContrato, $sNumeroOrden, $sIdConvenio, $sIdTurno, $dIdFecha, False ) ;


//Termino de Identificar la Jornada
$sql =" select * from turnos where sContrato='$sContrato' and sIdTurno='$sIdTurno';";
$result = mysql_query($sql);
if(mysql_error())mensaje("44: ".mysql_error());
if($row = mysql_fetch_array($result)){
   $sOrigenTierra = $row['$sOrigenTierra'];
}
############################################################
If($sOrigenTierra = 'No' ){
   InicializaJornadas( $sContrato, $sNumeroOrden, $sIdTurno, $sJornada, $dIdFecha ) ;
   ActualizaJornadas ( $sContrato, $sNumeroOrden,$dIdFecha ) ;
}
############################################################
$sql = "select sNumeroReporte from reportediario where sContrato='$sContrato' and sNumeroOrden='$sNumeroOrden' and dIdFecha='$dIdFecha' and sIdTurno='$sIdTurno' and sIdConvenio='$sIdConvenio' and sIdTurno='$sIdTurno'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $sNumeroReporte=$row[0];
}
 // Termina Proceso de Actualizacion de Avances ......
$sql ="insert Into kardex_sistema (sContrato, sIdUsuario, dIdFecha, sHora, sDescripcion, lOrigen)
      Values ('$sContrato', '$sIdUsuarioValida', '".date('Y-m-d')."','".date('H:i:s')."','Validación del Reporte Diario No. $sNumeroReporte VALIDA $sIdUsuarioValida','Reporte Diario')";
   mysql_query($sql);
mensaje("Ha finalizado la operacion !!");
/*
if(isset($_POST['aceptar']) and $_POST['aceptar']=="Aceptar")
   echo "<script>window.close()</script>";
else
   location("../?sNumeroOrden=$sNumeroOrden");
*/
?>
