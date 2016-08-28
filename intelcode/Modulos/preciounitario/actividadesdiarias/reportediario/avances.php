<?php
require("../../../include/mysql.inc.php");
function avances($sContrato,$sNumeroOrden,$sIdConvenio,$dIdFecha,$sIdTurno,$sParamSeguridad){
   //Obtener el estatus del reporte y el convenio al que pertenece
   $sqlStatus =  "SELECT lStatus, sIdConvenio 
                  FROM reportediario 
                  WHERE sContrato = '$sContrato' AND dIdFecha = '$dIdFecha' 
                     AND sNumeroOrden = '$sNumeroOrden' AND sIdTurno = '$sIdTurno'";
   $resultStatus = mysql_query($sqlStatus);
   if($rowStatus = mysql_fetch_array($resultStatus))
   {
      if(!isset($sIdConvenio)){
         if($rowStatus['sIdConvenio'] =="Pendiente"){
            $lContinua=true;
         }
         else{
            $lContinua=false;
            $sIdConvenio = $rowStatus['sIdConvenio'];
         }
      }
      else{
         $lContinua = true;
      }
      
   }
   if($lContinua){
      // Partidas canceladas ....
      // Avance por Plataforma ...     
      $sqlPlataforma = "SELECT SUM(( b.dAvance * a.dPonderado) / 100 ) as dAvance 
              FROM actividadescanceladas b 
              INNER JOIN actividadesxorden a ON (b.sContrato = a.sContrato AND b.sNumeroOrden = a.sNumeroOrden AND 
              a.sIdConvenio = '$sIdConvenio' AND b.sWbs = a.sWbs AND b.sNumeroActividad = a.sNumeroActividad) 
              WHERE b.sContrato = '$sContrato' AND b.sNumeroOrden = '$sNumeroOrden' AND b.dIdFecha = '$dIdFecha' 
              GROUP BY b.sNumeroOrden";
      $resultPlataforma = mysql_query($sqlPlataforma);
      if($rowPlataforma = mysql_fetch_array($resultPlataforma)){
         $dAvancePlataforma = $dAvancePlataforma + $rowPlataforma['dAvance'];
      }
      if($sParamSeguridad = 'Avanzada'){ #Tipo  de Seguridad
         $sqlContrato = "SELECT  a.sNumeroActividad, a.dPonderado, a.dCantidadAnexo, Sum(b.dCantidad) as dCantidad From actividadescanceladas b 
                         INNER JOIN actividadesfcanceladas af ON (af.sContrato = b.sContrato And af.dIdFecha = b.dIdFecha And af.lAfectaContrato = 'Si') 
                         INNER JOIN actividadesxanexo a ON (b.sContrato = a.sContrato And a.sIdConvenio = '$sIdConvenio' And b.sNumeroActividad = a.sNumeroActividad and a.sTipoActividad = 'Actividad')
                         WHERE b.sContrato = '$sContrato' and b.dIdFecha = '$dIdFecha' group by b.sNumeroActividad";
         $resultContrato = mysql_query($sqlContrato);
         while($rowContrato=mysql_fetch_array($resultContrato)){
               $sqlAuxiliar = "SELECT sum(dCantidad) as dAcumulado 
                               FROM bitacoradeactividades 
                               WHERE sContrato = '$sContrato' And sNumeroActividad = '".$rowContrato['sNumeroActividad']."' 
                                 AND dIdFecha <= '$dIdFecha 
                               GROUP BY sNumeroActividad";
               $resultAuxiliar = mysql_query($sqlAuxiliar);
               $dAvancePartida = 0 ;
               if($rowAuxiliar = mysql_fetch_array($resutAuxiliar)){
                  If (($rowAuxiliar['dAcumulado'] - $rowContrato['dCantidad']) >= $rowContrato['dCantidadAnexo'])
                      $dAvancePartida = 0;
                  Else{
                      If ($rowAuxiliar['dAcumulado'] > $rowContrato['dCantidadAnexo'])
                          $dAvancePartida = (($rowContrato['dCantidadAnexo'] - ($rowAuxiliar['dAcumulado'] - $rowContrato['dCantidad'])) * 100) / $rowContrato['dCantidadAnexo'];
                      Else
                          $dAvancePartida = ($rowContrato['dCantidad'] * 100) / $rowContrato['dCantidadAnexo'] ;
                      $dAvanceObra  = $dAvanceObra  + ($dAvancePartida * $rowContrato['dPonderado']) ;
                  }
               }
         }
      }#Fin Tipo  de Seguridad
        // Avance de Partidas Reportadas ....
            // por Plataforma
      $sqlPlataforma ="SELECT Sum(( b.dAvance * a.dPonderado) / 100 ) as dAvance From bitacoradeactividades b 
                        INNER JOIN actividadesxorden a ON (b.sContrato = a.sContrato AND b.sNumeroOrden = a.sNumeroOrden 
                           AND a.sIdConvenio = '$sIdConvenio' AND b.sWbs = a.sWbs And b.sNumeroActividad = a.sNumeroActividad) 
                        WHERE b.sContrato = '$sContrato' and b.dIdFecha = '$dIdFecha' And b.sNumeroOrden = '$sNumeroOrden'
                        GROUP BY b.sNumeroOrden" ;
      $resultPlataforma = mysql_query($sqlPlataforma);
      If ($resultPlataforma = mysql_fetch_array($resultPlataforma)) 
            $dAvancePlataforma = $dAvancePlataforma + $rowPlataforma['dAvance'] ;
        // Por Contrato de Partidas reportadas en bitacora
        // Por Contrato de Partidas reportadas por Alcances
      if($sParamSeguridad = 'Avanzada'){
          $sqlContrato="Select a.sNumeroActividad, a.dCantidadAnexo, a.dPonderado, Sum(b.dCantidad) as dCantidad From bitacoradeactividades b 
                        INNER JOIN actividadesxanexo a ON (b.sContrato = a.sContrato And a.sIdConvenio = '$sIdConvenio' 
                        AND b.sNumeroActividad = a.sNumeroActividad and a.sTipoActividad = 'Actividad') 
                        WHERE b.sContrato = '$sContrato' and b.dIdFecha = '$dIdFecha' And b.lAlcance = 'No' 
                        GROUP BY b.sNumeroActividad 
                        ORDER BY a.iItemOrden";
          $resultContrato = mysql_query($sqlContrato);
          while ($rowContrato = mysql_fetch_array($resultContrato))
          {
              $sqlAuxiliar="SELECT sum(dCantidad) as dAcumulado From bitacoradeactividades 
                            WHERE sContrato = '$sContrato' And sNumeroActividad = '".$rowContrato['sNumeroActividad']."' 
                              AND dIdFecha <= '$dIdFecha' Group By sNumeroActividad";
              $dAvancePartida = 0 ;
              $resultAuxiliar = mysql_query($sqlAuxiliar);
              if($rowAuxiliar = mysql_fetch_array($resultAuxiliar)){
               If(($rowAuxiliar['dAcumulado'] - $rowContrato['dCantidad']) >= $rowContrato['dCantidadAnexo']) 
                  $dAvancePartida = 0;
               else
                  If ($rowAuxiliar['dAcumulado'] > $rowContrato['dCantidadAnexo'] )
                      $dAvancePartida = (($rowContrato['dCantidadAnexo'] - ($rowAuxiliar['dAcumulado'] - $rowContrato['dCantidad'])) * 100) / $rowContrato['dCantidadAnexo'];
                  Else
                      $dAvancePartida = ($rowContrato['dCantidad'] * 100) / $rowContrato['dCantidadAnexo'] ;
              } 
              $dAvanceObra = $dAvanceObra + ($dAvancePartida * $rowContrato['dPonderado']) ;
          }
          $sqlContrato="SELECT a.sNumeroActividad, a.dCantidadAnexo, a.dPonderado, b.iFase, Sum(b.dCantidad) AS dCantidad 
                        FROM bitacoradealcances b 
                        INNER JOIN actividadesxanexo a ON (b.sContrato = a.sContrato AND a.sIdConvenio = '$sIdConvenio' 
                           AND b.sNumeroActividad = a.sNumeroActividad AND a.sTipoActividad ='Actividad') 
                        WHERE b.sContrato = '$sContrato' AND b.dIdFecha = '$dIdFecha' 
                        GROUP BY b.sNumeroActividad, b.iFase order by a.iItemOrden, b.iFase";
         $resultContrato = mysql_query($sqlContrato);
         while($rowContrato = mysql_fetch_array($resultContrato))
         {
            $sqlAuxiliar = "SELECT Sum(b.dCantidad) as dCantidad, a.dAvance 
                    FROM bitacoradealcances b
                    INNER JOIN alcancesxactividad a ON (b.sContrato = a.sContrato AND b.sNumeroActividad = a.sNumeroActividad 
                     AND b.iFase = a.iFase) 
                    WHERE b.sContrato = '$sContrato' And b.sNumeroActividad = '".$rowContrato['sNumeroActividad']."' 
                     AND b.iFase = '".$rowContrato['iFase']."' And b.dIdFecha <= '$dIdFecha'  
                    GROUP BY b.sNumeroActividad" ;

            $dAvancePartida = 0 ;
            $resultAuxiliar = mysql_query($sqlAuxiliar);
            if($rowAuxiliar = mysql_fetch_array($resultAuxiliar))
            {
               $dAvancePartida = $rowAuxiliar['dCantidad'] ;
               If ( $dAvancePartida - $rowContrato['dCantidad'] >= $rowContrato['dCantidadAnexo'] )
                  $dAvancePartida = 0;
               else{
                  If ($dAvancePartida > $rowContrato['dCantidadAnexo'] )
                     $dAvancePartida = (($rowContrato['dCantidadAnexo'] - ( $dAvancePartida - $rowContrato['dCantidad'])) * $rowAuxiliar['dAvance']) / $rowContrato['dCantidadAnexo'];
                  else
                     $dAvancePartida = ($rowContrato['dCantidad'] * $rowAuxiliar['dAvance']) / $rowContrato['dCantidadAnexo'] ;
               }
            }
            $dAvanceObra = $dAvanceObra + ($dAvancePartida * $rowContrato['dPonderado']) ;
          }
          $dAvanceObra = $dAvanceObra / 100 ;
      }
        // Almacenamiento de Avances ...
        // Primero se ajusta tanto el avance x programa de trabajo ...
        If ($lParamMultiple)
        {
            $sqlAuxiliar = "SELECT sum(dAvance) AS dAvance 
                    FROM avancesglobalesxorden 
                    WHERE sContrato = '$sContrato' AND sIdConvenio = '$sIdConvenio' AND dIdFecha < '$dIdFecha' 
                     AND sNumeroOrden = '$sNumeroOrden' 
                    GROUP BY sNumeroOrden";
            $resultAuxiliar = mysql_query(sqlAuxiliar);
            if($rowAuxiliar = mysql_fetch_array($resultAuxiliar))
               If ( ($rowAuxiliar['dAvance'] + $dAvancePlataforma ) > 100 )
                    $dAvancePlataforma = 100 - $rowAuxiliar['dAvance'] ;

            $sqlAuxiliar ="INSERT INTO avancesglobalesxorden (sContrato, sNumeroOrden, dIdFecha, sIdConvenio, sIdTurno, dAvance) 
                           Values ('$sContrato,'$sNumeroOrden,'$dIdFecha','$sIdConvenio, 'A', '$dAvancePlataforma')
                           ON DUPLICATE KEY UPDATE dAvance = '$dAvancePlataforma'" ;
            $resultAuxiliar = mysql_query($sqlAuxiliar);
        }
        // Avances del Contrato ...
        If ($sParamSeguridad = 'Avanzada')
        {
            $sqlAuxiliar = "SELECT sum(dAvance) as dAvance 
                            FROM avancesglobalesxorden 
                            WHERE sContrato = '$sContrato' and sIdConvenio = '$sIdConvenio' 
                              AND dIdFecha < '$dIdFecha' and sNumeroOrden = '' 
                            GROUP BY sContrato";
            $resultAuxiliar = mysql_query($sqlAuxiliar);
            if($rowAuxiliar = mysql_fetch_array($resultAuxiliar))
                If ( ($rowAuxiliar['dAvance'] + $dAvanceObra ) > 100 )
                     $dAvanceObra = 100 - $rowAuxiliar['dAvance']  ;

            $sqlAuxiliar = "INSERT INTO avancesglobalesxorden (sContrato, sNumeroOrden, dIdFecha, sIdConvenio, sIdTurno, dAvance) 
                            VALUES ('$sContrato', '', '$dIdFecha', '$sIdConvenio', 'A', '$dAvanceObra')
                            ON DUPLICATE KEY UPDATE dAvance='$dAvanceObra'";
            $resultAuxiliar = mysql_query($sqlAuxiliar);
        }
   }
   
   $Result = $dAvanceObra ;
  return $Result = round($Result*10000)/10000;
}
echo avances('428237819','428237819-CI','','2007-07-08','A','Avazanda');
?> 