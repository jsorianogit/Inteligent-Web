<?php

function fnTitulos($sContrato,$sIdConvenio){
      #$sContrato='428237819';
      #$sIdConvenio='A-01';
      global $pdf;
      $SepEntreLineas = 12;
      #INFORMACION DEL CONTRATO

      #titulo de la tabla de contrato
      #amarillo
      $pdf->SetFillColor(255,255,128);
/*      #morado
      $pdf->SetFillColor(189,184,248);
      #cafe
     $pdf->SetFillColor(215,217,200);
     #verde claro
     $pdf->SetFillColor(237,243,216) ;
*/
   $pdf->Cell(15,$SepEntreLineas,"CONCEPTO",1,0,'C',1);
   $pdf->Cell(65,$SepEntreLineas,"DESCRIPCION",1,0,'C',1);
   $pdf->Cell(20,$SepEntreLineas,"ANEXO",1,0,'C',1);
   $pdf->Cell(15,$SepEntreLineas,"MEDIDA",1,0,'C',1);
   $pdf->Cell(15,$SepEntreLineas,"POND",1,0,'C',1);

   $xPeriodoEjecucion = $pdf->getX();
   $yPeriodoEjecucion = $pdf->getY();
   $pdf->Cell(45,$SepEntreLineas-3,"PERIODO DE EJECUCION",1,0,'C',1);
   $pdf->setY($yPeriodoEjecucion+6);
   $pdf->setX($xPeriodoEjecucion);
   $pdf->Cell(15,$SepEntreLineas-6,"INICIO",1,0,'C',1);
   $pdf->setY($yPeriodoEjecucion+6);
   $pdf->setX($xPeriodoEjecucion+15);
   $pdf->Cell(15,$SepEntreLineas-6,"TERMINO",1,0,'C',1);
   $pdf->setY($yPeriodoEjecucion+6);
   $pdf->setX($xPeriodoEjecucion+30);
   $pdf->Cell(15,$SepEntreLineas-6,"RETRASO",1,0,'C',1);

   $pdf->setY($pdf->getY()-6);
   $pdf->setX($xPeriodoEjecucion+45);
   $xPeriodoEjecucion = $pdf->getX();
   $yPeriodoEjecucion = $pdf->getY();
   $pdf->MultiCell(45,$SepEntreLineas-9,"SUMINISTRO E INSTALACION PROGRAMADO DE MATERIALES",1,'C',1,1);
   $pdf->setY($yPeriodoEjecucion+6);
   $pdf->setX($xPeriodoEjecucion);
   $pdf->Cell(15,$SepEntreLineas-6,"VOLUMEN",1,0,'C',1);
   $pdf->setY($yPeriodoEjecucion+6);
   $pdf->setX($xPeriodoEjecucion+15);
   $pdf->Cell(15,$SepEntreLineas-6,"AVANCE",1,0,'C',1);
   $pdf->setY($yPeriodoEjecucion+6);
   $pdf->setX($xPeriodoEjecucion+30);
   $pdf->Cell(15,$SepEntreLineas-6,"AV.FINANC.",1,0,'C',1);

   $pdf->setY($pdf->getY()-6);
   $pdf->setX($xPeriodoEjecucion+45);
   $xPeriodoEjecucion = $pdf->getX();
   $yPeriodoEjecucion = $pdf->getY();
   $pdf->MultiCell(45,$SepEntreLineas-9,"SUMINISTRO E INSTALACION REAL DE MATERIALES",1,'C',1,1);
   $pdf->setY($yPeriodoEjecucion+6);
   $pdf->setX($xPeriodoEjecucion);
   $pdf->Cell(15,$SepEntreLineas-6,"VOLUMEN",1,0,'C',1);
   $pdf->setY($yPeriodoEjecucion+6);
   $pdf->setX($xPeriodoEjecucion+15);
   $pdf->Cell(15,$SepEntreLineas-6,"AVANCE",1,0,'C',1);
   $pdf->setY($yPeriodoEjecucion+6);
   $pdf->setX($xPeriodoEjecucion+30);
   $pdf->Cell(15,$SepEntreLineas-6,"AV.FINANC.",1,0,'C',1);
   $pdf->setY($pdf->getY()+6);
}
 #contrato
function fnPartidas($sContrato,$sIdConvenio,$dIdFecha,$imprimirPartidasCon){
   global $pdf;
   #calculo de avances programados
   $sql = "Select Sum(dAvancePonderadoDia) as dProgramado From avancesglobales
           where sContrato = '$sContrato' And sIdConvenio = '$sIdConvenio' And sNumeroOrden = '' and dIdFecha <= '$dIdFecha' Group By sNumeroOrden";
   $rs = mysql_query($sql);
   if($row = mysql_fetch_array($rs)){
      $avProgramado = $row['dProgramado'];
   }
   #calculo de avances reales
   $sql = "Select Sum(dAvance) as dReal From avancesglobalesxorden
            where sContrato ='$sContrato' And sIdConvenio = '$sIdConvenio' And sNumeroOrden = '' and dIdFecha <= '$dIdFecha' Group By sContrato";
   $rs = mysql_query($sql);
   if($row = mysql_fetch_array($rs)){
      $avFisico = $row['dProgramado'];
   }

   #obtener las partidas
   $sql = "Select
               @nivel:=a.iNivel,
               a.sTipoActividad,
               a.sWbsAnterior,
               a.sWbs,
               if(sTipoActividad='Paquete',CONCAT(REPEAT(' ', @nivel),a.sWbs),CONCAT(REPEAT(' ', @nivel),a.sNumeroActividad)) as sNumeroActividad,
               a.sNumeroActividad as actividad,
               substr(a.mDescripcion,1,30) as mDescripcion,
               a.sMedida,
               a.dCantidadAnexo,
               a.dInstalado,
               a.dExcedente,
               a.dVentaMN as dVentaMN,
               a.dVentaDLL,
               a.dPonderado,
               a.dFechaInicio,
               a.dFechaFinal,
               sum(d.dCantidad) as dProgramado
            From actividadesxanexo a LEFT JOIN distribuciondeanexo d ON (
               a.sContrato = d.sContrato
               And a.sIdConvenio = d.sIdConvenio
               And a.sWbs = d.sWbs
               And a.sNumeroActividad = d.sNumeroActividad
               And d.dIdFecha <= '$dIdFecha') Where
            a.sContrato = '$sContrato' And a.sIdConvenio = '$sIdConvenio'
            Group By a.sWbs, a.sNumeroActividad Order By a.iItemOrden";
   $rs = mysql_query($sql);
   while($row = mysql_fetch_array($rs)){
      $iRetraso=0;
      if(comparaFecha($dIdFecha, $row['dIdFecha']) =="Mayor" ){
         if($row['dInstalado']+$row['dExcedente'] < $row['dCantidadAnexo']){
             $iRetraso =restarFecha($row['dFechaFinal'],$dIdFecha);
         }
      }

      if($imprimirPartidasCon=='CON RETRAZO' and $iRetraso<=0){
         continue;
      }
      if($imprimirPartidasCon=='DESFASADAS' and $iRetraso!=0){
         continue;
      }
      if($pdf->getY()>190){
         $pdf->addPage();
         fnTitulos($sContrato,$sIdConvenio);
      }
      if($row['sTipoActividad']=="Paquete"){
         $pdf->SetFillColor(189,184,248);
      }
      else{
         $pdf->SetFillColor(237,243,216) ;
      }

      if( (($row['dProgramado'] / $row['dCantidadAnexo']) * $row['dPonderado']) > 0 )
         $dAvanceProgramado=(($row['dProgramado'] / $row['dCantidadAnexo']) * $row['dPonderado'] ) ;
      else
         $dAvanceProgramado=0;

      $y = $pdf->getY();
      $alto=3;
      $pdf->setY($y);
      $pdf->Cell(0.1);
      if(strlen($row['sNumeroActividad'])>13)$row['sNumeroActividad']=trim($row['sNumeroActividad']);
      $pdf->MultiCell(15,$alto,$row['sNumeroActividad'],1,'L',1);
      $pdf->setY($y);
      $pdf->Cell(25-10);
      $pdf->MultiCell(65,$alto,$row['mDescripcion'],1,'L',1);
      $pdf->setY($y);
      $pdf->Cell(80);
      $pdf->MultiCell(20,$alto,$row['dCantidadAnexo'],1,'C',1);
      $pdf->setY($y);
      $pdf->Cell(100);
      $pdf->MultiCell(15,$alto,$row['sMedida'],1,'C',1);
      $pdf->setY($y);
      $pdf->Cell(115);
      $pdf->MultiCell(15,$alto,$row['dPonderado']." %",1,'C',1);
      $pdf->setY($y);
      $pdf->Cell(130);
      $pdf->MultiCell(15,$alto,formatoFecha($row['dFechaInicio']),1,'C',1);
      $pdf->setY($y);
      $pdf->Cell(145);
      $pdf->MultiCell(15,$alto,formatoFecha($row['dFechaFinal']),1,'C',1);
      $pdf->setY($y);
      $pdf->Cell(160);
      $pdf->MultiCell(15,$alto,$iRetraso,1,'R',1);

      /*suministro programado*/
      $pdf->setY($y);
      $pdf->Cell(175);
      $pdf->MultiCell(15,$alto,$row['dProgramado'],1,'R',1);
      $pdf->setY($y);
      $pdf->Cell(190);
      $pdf->MultiCell(15,$alto,($dAvanceProgramado*100/$row['dPonderado'])."%",1,'R',1);
      $pdf->setY($y);
      $pdf->Cell(205);
      $pdf->SetFont('Arial','',6);
      $af=((( $dAvanceProgramado * 100 ) / $row['dPonderado']) * ($row['dCantidadAnexo']*$row['dVentaMN'])) /  100;
      $pdf->MultiCell(15,$alto,"$".number_format($af,2,'.',','),1,'R',1);
      $pdf->SetFont('Arial','',7);

      /*suministro real*/
      $pdf->setY($y);
      $pdf->Cell(220);
      $pdf->MultiCell(15,$alto,$row['dInstalado']+$row['dExcedente'],1,'R',1);
      $pdf->setY($y);
      $pdf->Cell(235);
      $dAv = 0;
      if($row['dInstalado']+$row['dExcedente'] < $row['dCantidadAnexo']){
         $sql = "Select sum(b.dAvance) as dAvance, a.dCantidadAnexo, a2.dCantidad
                  From bitacoradeactividades b
                  INNER JOIN actividadesxorden a2 ON (
                    a2.sContrato = b.sContrato And a2.sPaquete = b.sPaquete
                    And a2.sNumeroActividad = b.sNumeroActividad And a2.sIdConvenio = '$sIdConvenio'
                    And a2.sTipoActividad = 'Actividad' )
                  INNER JOIN actividadesxanexo a ON (
                    a.sContrato = b.sContrato And a.sNumeroActividad = b.sNumeroActividad
                    And a.sIdConvenio = a2.sIdConvenio)
                  Where
                    b.sContrato = '$sContrato' And b.sNumeroActividad = '".$row['actividad']."'
                    And b.dIdFecha <='$dIdFecha' Group By b.sPaquete";
         $rsAv = mysql_query($sql);

         while($rowAv = mysql_fetch_array($rsAv)){
           $dAv += ($rowAv['dAvance']*$rowAv['dCantidad'])/$rowAv['dCantidadAnexo'];
         }
      }
      else
         $dAv = 100;
      if ($dAv == 0 And ($row['dInstalado']+$row['dExcedente']) > 0 )
         if($row['dCantidadAnexo'] > 0)
           $dAv= (($row['dInstalado']+$row['dExcedente']) / $row['dCantidadAnexo']) * 100 ;

      $pdf->MultiCell(15,$alto,(number_format($dAv,2,'.',','))."%",1,'R',1);
      $pdf->SetFont('Arial','',6);
      $pdf->setY($y);
      $pdf->Cell(250);
      $avF = ($dAv* ($row['dCantidadAnexo']*$row['dVentaMN'])) / 100;
      $pdf->MultiCell(15,$alto,"$".number_format($avF,2,'.',','),1,'R',1);
       $pdf->SetFont('Arial','',7);
   }
}

#orden de trabajo
function fnPartidasOrden($sContrato,$sNumeroOrden,$sIdConvenio,$dIdFecha,$imprimirPartidasCon){
   global $pdf;
   #calculo de avances programados
   $sql = "Select Sum(dAvancePonderadoDia) as dProgramado From avancesglobales
           where sContrato = '$sContrato' And sIdConvenio = '$sIdConvenio' And sNumeroOrden = '' and dIdFecha <= '$dIdFecha' Group By sNumeroOrden";
   $rs = mysql_query($sql);
   if($row = mysql_fetch_array($rs)){
      $avProgramado = $row['dProgramado'];
   }
   #calculo de avances reales
   $sql = "Select Sum(dAvance) as dReal From avancesglobalesxorden
            where sContrato ='$sContrato' And sIdConvenio = '$sIdConvenio' And sNumeroOrden = '' and dIdFecha <= '$dIdFecha' Group By sContrato";
   $rs = mysql_query($sql);
   if($row = mysql_fetch_array($rs)){
      $avFisico = $row['dProgramado'];
   }

   #obtener las partidas
   $sql = "Select
               @nivel:=a.iNivel,
               a.sTipoActividad,
               a.sWbsAnterior,
               a.sWbs,
               if(sTipoActividad='Paquete',CONCAT(REPEAT(' ', @nivel),a.sWbs),CONCAT(REPEAT(' ', @nivel),a.sNumeroActividad)) as sNumeroActividad,
               a.sNumeroActividad as actividad,
               a.mDescripcion,
               a.sMedida,
               a.dCantidad,
               a.dInstalado,
               a.dExcedente,
               a.dVentaMN as dVentaMN,
               a.dVentaDLL,
               a.dPonderado,
               a.dFechaInicio,
               a.dFechaFinal,
               sum(d.dCantidad) as dProgramado
            From
              actividadesxorden a LEFT JOIN distribuciondeactividades d ON (
               a.sContrato = d.sContrato
               And a.sIdConvenio = d.sIdConvenio
               And a.sNumeroOrden = d.sNumeroOrden
               And a.sWbs = d.sWbs
               And a.sNumeroActividad = d.sNumeroActividad
               And d.dIdFecha <= '$dIdFecha'
              )
            Where
               a.sContrato = '$sContrato'
               And a.sIdConvenio = '$sIdConvenio'
               And a.sNumeroOrden = '$sNumeroOrden'
            Group By a.sWbs, a.sNumeroActividad Order By a.iItemOrden";
   $rs = mysql_query($sql);
   while($row = mysql_fetch_array($rs)){
      $iRetraso=0;
      if(comparaFecha($dIdFecha, $row['dIdFecha']) =="Mayor" ){
         if($row['dInstalado']+$row['dExcedente'] < $row['dCantidad']){
             $iRetraso =restarFecha($row['dFechaFinal'],$dIdFecha);
         }
      }

      if($imprimirPartidasCon=='CON RETRAZO' and $iRetraso<=0){
         continue;
      }
      if($imprimirPartidasCon=='DESFASADAS' and $iRetraso!=0){
         continue;
      }
      if($pdf->getY()>190){
         $pdf->addPage();
         fnTitulos($sContrato,$sIdConvenio);
      }
      if($row['sTipoActividad']=="Paquete"){
         $pdf->SetFillColor(189,184,248);
      }
      else{
         $pdf->SetFillColor(237,243,216) ;
      }

      if( (($row['dProgramado'] / $row['dCantidad']) * $row['dPonderado']) > 0 )
         $dAvanceProgramado=(($row['dProgramado'] / $row['dCantidad']) * $row['dPonderado'] ) ;
      else
         $dAvanceProgramado=0;

      $y = $pdf->getY();
      $alto=3;
      $pdf->setY($y);
      $pdf->Cell(0.1);
      $pdf->SetFont('Arial','',5);
      $pdf->MultiCell(15,$alto,$row['sNumeroActividad'],1,'L',1);
      $pdf->SetFont('Arial','',7);
      $pdf->setY($y);
      $pdf->Cell(25-10);
      $pdf->MultiCell(65,$alto,$row['mDescripcion'],1,'L',1);
      $pdf->setY($y);
      $pdf->Cell(80);
      $pdf->MultiCell(20,$alto,$row['dCantidad'],1,'C',1);
      $pdf->setY($y);
      $pdf->Cell(100);
      $pdf->MultiCell(15,$alto,$row['sMedida'],1,'C',1);
      $pdf->setY($y);
      $pdf->Cell(115);
      $pdf->MultiCell(15,$alto,$row['dPonderado']." %",1,'C',1);
      $pdf->setY($y);
      $pdf->Cell(130);
      $pdf->MultiCell(15,$alto,formatoFecha($row['dFechaInicio']),1,'C',1);
      $pdf->setY($y);
      $pdf->Cell(145);
      $pdf->MultiCell(15,$alto,formatoFecha($row['dFechaFinal']),1,'C',1);
      $pdf->setY($y);
      $pdf->Cell(160);
      $pdf->MultiCell(15,$alto,$iRetraso,1,'R',1);

      /*suministro programado*/
      $pdf->setY($y);
      $pdf->Cell(175);
      $pdf->MultiCell(15,$alto,$row['dProgramado'],1,'R',1);
      $pdf->setY($y);
      $pdf->Cell(190);
      $pdf->MultiCell(15,$alto,($dAvanceProgramado*100/$row['dPonderado'])."%",1,'R',1);
      $pdf->setY($y);
      $pdf->Cell(205);
      $pdf->SetFont('Arial','',6);
      $af=((( $dAvanceProgramado * 100 ) / $row['dPonderado']) * ($row['dCantidad']*$row['dVentaMN'])) /  100;
      $pdf->MultiCell(15,$alto,"$".number_format($af,2,'.',','),1,'R',1);
      $pdf->SetFont('Arial','',7);

      /*suministro real*/
      $pdf->setY($y);
      $pdf->Cell(220);
      $pdf->MultiCell(15,$alto,$row['dInstalado']+$row['dExcedente'],1,'R',1);
      $pdf->setY($y);
      $pdf->Cell(235);
      $dAv = 0;
      if($row['dInstalado']+$row['dExcedente'] < $row['dCantidad']){
         $sql = "Select
                    sum(b.dAvance) as dAvance
                  From bitacoradeactividades b
                  INNER JOIN actividadesxorden a2 ON (
                    a2.sContrato = b.sContrato And a2.sWbs = b.sWbs
                    And a2.sNumeroActividad = b.sNumeroActividad
                    And a2.sIdConvenio = '$sIdConvenio' And a2.sTipoActividad = 'Actividad'
                   )
                  Where
                    b.sContrato = '$sContrato'
                    And b.sWbs = '$row[sWbs]'
                    And b.sNumeroActividad = '$row[sNumeroActividad]'
                    And b.dIdFecha <= '$dIdFecha'
                  Group By b.sWbs, b.sNumeroActividad";
         $rsAv = mysql_query($sql);

         while($rowAv = mysql_fetch_array($rsAv)){
           $dAv += $rowAv['dAvance'];
         }
      }
      else
         $dAv = 100;
      if ($dAv == 0 And ($row['dInstalado']+$row['dExcedente']) > 0 )
         if($row['dCantidad'] > 0)
           $dAv= (($row['dInstalado']+$row['dExcedente']) / $row['dCantidad']) * 100 ;

      $pdf->MultiCell(15,$alto,(number_format($dAv,2,'.',','))."%",1,'R',1);
      $pdf->SetFont('Arial','',6);
      $pdf->setY($y);
      $pdf->Cell(250);
      $avF = ($dAv* ($row['dCantidad']*$row['dVentaMN'])) / 100;
      $pdf->MultiCell(15,$alto,"$".number_format($avF,2,'.',','),1,'R',1);
       $pdf->SetFont('Arial','',7);
   }
}
?>
