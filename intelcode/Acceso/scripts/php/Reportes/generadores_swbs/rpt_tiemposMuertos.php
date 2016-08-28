<?php
//if (isset($_POST['sContra']))    $sContrato=$_POST['sContra'] ;
if (isset($_SESSION['ssContrato'])) $sContrato=$_SESSION['ssContrato'] ;
if ( isset($_POST['fechaIni']))  $dFechaInicio=$_POST['fechaIni'];
if ( isset($_POST['fechaTerm'])) $dFechaFinal=$_POST['fechaTerm'] ;
$sIdConvenio = '' ;

include "../generadores/utilGeneral.php";

   function fnImprimeTituloTiemposMuertos()
   {
      global $pdf ;  
      global $arTitulos, $link, $sContrato, $dFechaInicio, $dFechaFinal, $sIdConvenio;
     global $sFirmante1, $sFirmante2, $sFirmante3, $sFirmante4, $sFirmante5, $sFirmante6, $sFirmante7, $sFirmante8, $sFirmante9, $sFirmante10 ;
     global $sPuesto1, $sPuesto2, $sPuesto3, $sPuesto4, $sPuesto5,  $sPuesto6,  $sPuesto7,  $sPuesto8,  $sPuesto9, $sPuesto10 ;


      $x=13;
      $y = 11 ;
      $tmpLimiteHoja = 278;
      $saltopag = 12 ;
      $xContrato = 0.1;
      $pdf->SetFont('Arial','B',7);
            if($pdf->getY()>240){
               $pdf->addPage();
            }
      $pdf->ln(5);
     // Cabecera de las Partidas
     $yFilaCabecera = $pdf->getY() + 1 ;
     $PosY=$pdf->getY();     
     $pdf->setY($yFilaCabecera);   
     $pdf->Cell($xContrato);
     $pdf->SetFont('Arial','B',6);              
     $pdf->SetFillColor(189,184,248);
     $pdf->SetFillColor(215,217,200);

       $pdf->setY($yFilaCabecera + 3);   
     $pdf->Cell($xContrato);
     $pdf->MultiCell(15,6,"AREA",1,'C',1);
       $pdf->setY($yFilaCabecera + 3);   
     $pdf->Cell($xContrato+15);
     $pdf->MultiCell(20,6,"CLASIFICACION",1,'C',1);     
        $pdf->setY($yFilaCabecera + 3);     
     $pdf->Cell($xContrato+35);
     $pdf->MultiCell(10,3,"HORA INICIO",1,'C',1);
        $pdf->setY($yFilaCabecera + 3);     
     $pdf->Cell($xContrato+45);
     $pdf->MultiCell(10,3,"HORA FINAL",1,'C',1);
        $pdf->setY($yFilaCabecera + 3);     
     $pdf->Cell($xContrato+55);
     $pdf->MultiCell(15,3,"TOTAL PERSONAL",1,'C',1);
         $pdf->setY($yFilaCabecera + 3);    
     $pdf->Cell($xContrato+70);
     $pdf->MultiCell(15,3,"PERSONAL AFECTADO",1,'C',1);
         $pdf->setY($yFilaCabecera + 3);    
     $pdf->Cell($xContrato+85);
     $pdf->MultiCell(15,3,"TIEMPO MUERTO",1,'C',1);
         $pdf->setY($yFilaCabecera + 3);    
     $pdf->Cell($xContrato+100);
     $pdf->MultiCell(95,6,"DESCRIPCION",1,'C',1);
         $posy=$pdf->getY();
      $Alto=$posy-$PosY;
      $pdf->RoundedRect(10, $PosY, 195, $Alto, 3.50, '1001');
      $pdf->SetY($PosY-1);
      $pdf->Cell(4);
      $pdf->SetFillColor(255,255,255);
      $pdf->SetTextColor(50,100,255);
      $pdf->SetFont('Arial','B',7);
      $pdf->MultiCell(31,3,"TIEMPOS MUERTOS",0,'C',1);
      $pdf->SetTextColor(0,0,0);
      //$pdf->SetY($posy);
    $pdf->ln(8);
  }

   function fnImprimeTiemposMuertos($sContrato,$dFecha,$sNumeroOrden,$sIdTurno,$sIdConvenio,$sIdStatus)
   {
      global $pdf ;  
      global $arTitulos, $link, $sContrato, $dFechaInicio, $dFechaFinal, $sIdConvenio, $pdf;
      global $sfnResultHoras ;
      

     $xColumna =0.1;   
     $pdf->SetFillColor(237,243,216) ;
       // detalle de tiempos inactivos ....

        $sqlTiempos = "Select t.sArea,t.sHoraInicio, t.sHoraFinal, t.dPersonal, t.dFrente, t.sTiempoMuerto, t.mDescripcion as Descripcion, tm.sDescripcion as tmDescripcion From jornadasdiarias t INNER JOIN tiposdemovimiento tm on (t.sContrato = tm.sContrato And t.sIdTipoMovimiento = tm.sIdTipoMovimiento) Where t.sContrato = '$sContrato' And t.sNumeroOrden = '$sNumeroOrden' And t.dIdFecha = '$dFecha' And t.sIdTurno = '$sIdTurno' And t.sTipo = 'Tiempo Inactivo'" ;      
         $qryTiempos = mysql_query($sqlTiempos,$link);
        fnImprimeTituloTiemposMuertos();
        $pdf->SetFont('Arial','',5) ;
        $yLineaAnterior = $pdf->getY();
        while($rowTiempos = mysql_fetch_array($qryTiempos))
         {

            if($pdf->getY()>240){
               $pdf->addPage();
               $yLineaAnterior = $pdf->getY();
            }
           $pdf->setY($yLineaAnterior);
           $pdf->Cell($xColumna);
           $pdf->MultiCell(15,3 ,$rowTiempos['sArea'],0,'L',0);
           $yArea = $pdf->getY();
           
              $pdf->setY($yLineaAnterior);     
           $pdf->Cell($xColumna+15);
           $pdf->MultiCell(20,2 ,$rowTiempos['tmDescripcion'],0,'L',0);
           $ytmDescripcion = $pdf->getY();
           
              $pdf->setY($yLineaAnterior);     
           $pdf->Cell($xColumna+35);
           $pdf->MultiCell(10,3 ,$rowTiempos['sHoraInicio'],0,'C',0);

              $pdf->setY($yLineaAnterior);     
           $pdf->Cell($xColumna+45);
           $pdf->MultiCell(10,3 ,$rowTiempos['sHoraFinal'],0,'C',0);

              $pdf->setY($yLineaAnterior);     
           $pdf->Cell($xColumna+55);
           $pdf->MultiCell(15,3 ,$rowTiempos['dPersonal'],0,'C',0);

              $pdf->setY($yLineaAnterior);     
           $pdf->Cell($xColumna+70);
           $pdf->MultiCell(15,3 ,$rowTiempos['dFrente'],0,'C',0);

              $pdf->setY($yLineaAnterior);     
           $pdf->Cell($xColumna+85);
           $pdf->MultiCell(15,3 ,$rowTiempos['sTiempoMuerto'],0,'C',0);

              $pdf->setY($yLineaAnterior);     
           $pdf->Cell($xColumna+100);
           $pdf->MultiCell(95,3 ,$rowTiempos['Descripcion'],0,'L',0);
           $yDescripcion = $pdf->getY();

           $alto = 0;
           /*
           if($yArea > $alto)
               $alto = $yArea - $yLineaAnterior;
           if($yDescripcion > $alto)
              $alto = $yDescripcion - $yLineaAnterior;
           if($ytmDescripcion > $alto)
              $alto = $ytmDescripcion - $yLineaAnterior;
            */
            $Mayor=0;

           if($yDescripcion > $ytmDescripcion){
               $Mayor = $yDescripcion;
           }
           else{
               $Mayor = $ytmDescripcion;
           }
           if($yArea > $Mayor ){
               $Mayor = $yArea;
           }

           $alto =  $Mayor- $yLineaAnterior;
           $pdf->setY($Mayor);
        $pdf->rect(10,$yLineaAnterior,15,$alto);
        $pdf->rect(25,$yLineaAnterior,20,$alto);
        $pdf->rect(45,$yLineaAnterior,10,$alto);
        $pdf->rect(55,$yLineaAnterior,10,$alto);
        $pdf->rect(65.1,$yLineaAnterior,15,$alto);
        $pdf->rect(80.1,$yLineaAnterior,15,$alto);
        $pdf->rect(95.1,$yLineaAnterior,15,$alto);
        $pdf->rect(110.1,$yLineaAnterior,95,$alto);
        $yLineaAnterior =$pdf->getY();
      }
      /*
          //($sContrato,$dFecha,$sNumeroOrden,$sIdTurno,$sIdConvenio,$sIdStatus)
        $sSemilla ="00:00";
        $sqlTiempos = "Select sTiempoMuerto From jornadasdiarias Where sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden' And dIdFecha = '$dFecha' And sIdTurno = '$sIdTurno' And sTipo = 'Tiempo Inactivo'" ;
         $qryTiempos = mysql_query($sqlTiempos,$link);
         while($row = mysql_fetch_array($qryTiempos)){
            $sTiempoTotal = $row[0];  
            $sql = "SELECT ADDTIME('$sSemilla','$sTiempoTotal') as suma";          
            $result = mysql_query($sql);
            if($rowSuma = mysql_fetch_array($result)){
               $sSemilla = $rowSuma[0];   
            }
         }
      #verificar que el tiempomuerto no sea mayor que la jornada de trabajo diaria
      $sql= "select iJornada
          from ordenesdetrabajo
          Where sContrato='$sContrato' and sNumeroOrden='$sNumeroOrden'";
      $result = mysql_query($sql);
      if($row = mysql_fetch_array($result)){
         $iJornadaxOrden = $row['iJornada'];
      }
      if($iJornadaxOrden == 0 ){
         $iJornadas = Jornadas();
         $JornadasxDia = JornadasDia($dFecha,$iJornadas);
      }
      else
         $JornadasxDia = $iJornadaxOrden;
      $JornadasxDia = (int)$JornadasxDia;
      #Crear formato en horas de las jornadas de trabajo
      if($JornadasxDia < 10)
         $sJornada = "0$JornadasxDia:00";
      else
         $sJornada = "$JornadasxDia:00";

      if(CompararHoras($sSemilla,$sJornada)){
              $sSemilla = $sJornada;
      }
      */
         $sTiempoAdicional = "00:00";
        $sql = "select
                  sTiempoAdicional,
                  sTiempoMuerto
               from
                  reportediario
               where
                  sContrato = '$sContrato'
                  And sNumeroOrden = '$sNumeroOrden'
                  And dIdFecha = '$dFecha'
                  And sIdTurno = '$sIdTurno'
                  And sIdConvenio='$sIdConvenio'
               ";
        $rs = mysql_query($sql);
        if($row = mysql_fetch_array($rs)){
            $sTiempoMuertoReal = $row[1];
            $sTiempoAdicional = $row[0];
        }
     // Termina detalle de Tiempos Inactivos ...

      #TIEMPO ADICIONAL
      $pdf->setY($yLineaAnterior);
     $pdf->Cell($xColumna+15);
     $pdf->SetFillColor(215,217,200);
     $pdf->Cell(70 ,4,"TIEMPO ADICIONAL",1,1,1,1);
      $pdf->SetFillColor(255,255,255);

        $pdf->setY($yLineaAnterior);
     $pdf->Cell(85);
     $pdf->Cell(15.1,4,$sTiempoAdicional/*$sSemilla*/,1,0,'C',1);
     #TIEMPO MUERTO
     $pdf->setY($yLineaAnterior+4);
     $pdf->Cell($xColumna+15);
     $pdf->SetFillColor(215,217,200);
     $pdf->Cell(70 ,4,"TIEMPO MUERTO REAL",1,1,1,1);
     $pdf->SetFillColor(255,255,255);


     $pdf->setY($yLineaAnterior+4);
     $pdf->Cell(85);
     $pdf->Cell(15.1,4,$sTiempoMuertoReal/*$sSemilla*/,1,0,'C',1);

     $pdf->ln(5);
     
   }



?>
