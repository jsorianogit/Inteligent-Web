<?php
   function fnImprimeAvances($sContrato,$dIdFecha,$sNumeroOrden,$sIdTurno,$sIdConvenio,$lStatus)
   {
      global $pdf ; 	
      global $link, $pdf;
    
    
      $MultiOrdenes = 'No' ;
  	  $sqlOrdenesActivas = "Select count(o.sNumeroOrden) as iTotalOrden from ordenesdetrabajo o inner join configuracion c on (c.sContrato = o.sContrato) where o.sContrato = '$sContrato' and o.cIdStatus = c.cStatusProceso group by o.sContrato" ;
	  $QryOrdenes = mysql_query($sqlOrdenesActivas,$link);
	  if($rowOrdenes = mysql_fetch_array($QryOrdenes))
 	  		If ($rowOrdenes ['iTotalOrden'] > 1)
			     $MultiOrdenes = 'Si' ;
	  

	  if(!isset($xContrato))$xContrato=0.1;
	  $pdf->Cell($xContrato);

	  $LineaAvance = $pdf->getY() + 3 ;
      $anchoAvance = 15 ;
      $anchoTAvance = 33 ;
      $height = 3.5 ;
      
      $pdf->SetFont('Arial','',6) ;          	   
	  $dAvanceProgObraAnterior = 0 ;
	  $dAvanceProgOrdenAnterior = 0 ;
	  $dAvanceProgObraActual = 0 ;
	  $dAvanceProgOrdenActual = 0 ;
	  $dAvanceProgObraAcum = 0 ;
	  $dAvanceProgOrdenAcum = 0 ;
	  
	  $dAvanceRealObraAnterior = 0 ;
	  $dAvanceRealOrdenAnterior = 0 ;
	  $dAvanceRealObraActual = 0 ;
	  $dAvanceRealOrdenActual = 0 ;
	  $dAvanceRealObraAcum = 0 ;
	  $dAvanceRealOrdenAcum = 0 ;
	  
      $tmpLimiteHoja = 195.19 ;

      If ($MultiOrdenes == 'Si')
      {
       	  $posOrdenX = 15 ;
		  $posContratoX = 100 ;

		  $sqlAvance = "Select sum(dAvance) as dAvance from avancesglobalesxorden where sContrato = '$sContrato' and sNumeroOrden = '$sNumeroOrden' and dIdFecha < '$dIdFecha' and sIdConvenio = '$sIdConvenio' and sIdTurno = '$sIdTurno' group by sContrato" ;
	      $qryAvance = mysql_query($sqlAvance,$link);
    	  If ($rowAvance = mysql_fetch_array($qryAvance))
    	  		$dAvanceRealOrdenAnterior = $rowAvance['dAvance'] ;
    	  	  
		  $sqlAvance = "Select sum(dAvance) as dAvance from avancesglobalesxorden where sContrato = '$sContrato' and sNumeroOrden = '$sNumeroOrden' and dIdFecha = '$dIdFecha' and sIdConvenio = '$sIdConvenio' and sIdTurno = '$sIdTurno' group by sContrato" ;
	      $qryAvance = mysql_query($sqlAvance,$link);
    	  If ($rowAvance = mysql_fetch_array($qryAvance))
    	  		$dAvanceRealOrdenActual = $rowAvance['dAvance'] ;
		  $dAvanceRealOrdenAcum = $dAvanceRealOrdenActual + $dAvanceRealOrdenAnterior ;

		  $sqlAvance = "Select sum(dAvancePonderadoDia) as dAvance from avancesglobales where sContrato = '$sContrato' and sNumeroOrden = '$sNumeroOrden' and dIdFecha < '$dIdFecha' and sIdConvenio = '$sIdConvenio' group by sContrato" ;
	      $qryAvance = mysql_query($sqlAvance,$link);
    	  If ($rowAvance = mysql_fetch_array($qryAvance))
    	  		$dAvanceProgOrdenAnterior = $rowAvance['dAvance'] ;
    	  	  
		  $sqlAvance = "Select sum(dAvancePonderadoDia) as dAvance from avancesglobales where sContrato = '$sContrato' and sNumeroOrden = '$sNumeroOrden' and dIdFecha = '$dIdFecha' and sIdConvenio = '$sIdConvenio' group by sContrato" ;
	      $qryAvance = mysql_query($sqlAvance,$link);
    	  If ($rowAvance = mysql_fetch_array($qryAvance))
    	  		$dAvanceProgOrdenActual = $rowAvance['dAvance'] ;
		  $dAvanceProgOrdenAcum = $dAvanceProgOrdenActual + $dAvanceProgOrdenAnterior ;
      }
   	  else
      {
       	  $posOrdenX = 0 ;
		  $posContratoX = 50 ;
   	  }
		  
		  
	  $sqlAvance = "Select sum(dAvance) as dAvance from avancesglobalesxorden where sContrato = '$sContrato' and sNumeroOrden = '' and dIdFecha < '$dIdFecha' and sIdConvenio = '$sIdConvenio' group by sContrato" ;
	  $qryAvance = mysql_query($sqlAvance,$link);
      If ($rowAvance = mysql_fetch_array($qryAvance))
      	  $dAvanceRealObraAnterior = $rowAvance['dAvance'] ;
    	  	  
	  $sqlAvance = "Select sum(dAvance) as dAvance from avancesglobalesxorden where sContrato = '$sContrato' and sNumeroOrden = '' and dIdFecha = '$dIdFecha' and sIdConvenio = '$sIdConvenio' group by sContrato" ;
      $qryAvance = mysql_query($sqlAvance,$link);
   	  If ($rowAvance = mysql_fetch_array($qryAvance))
 	   	  $dAvanceRealObraActual = $rowAvance['dAvance'] ;
	  $dAvanceRealObraAcum = $dAvanceRealObraActual + $dAvanceRealObraAnterior ;


  	  $sqlAvance = "Select sum(dAvancePonderadoDia) as dAvance from avancesglobales where sContrato = '$sContrato' and sNumeroOrden = '' and dIdFecha < '$dIdFecha' and sIdConvenio = '$sIdConvenio' group by sContrato" ;
	  $qryAvance = mysql_query($sqlAvance,$link);
      If ($rowAvance = mysql_fetch_array($qryAvance))
      	  $dAvanceProgObraAnterior = $rowAvance['dAvance'] ;
    	  	  
	  $sqlAvance = "Select sum(dAvancePonderadoDia) as dAvance from avancesglobales where sContrato = '$sContrato' and sNumeroOrden = '' and dIdFecha = '$dIdFecha' and sIdConvenio = '$sIdConvenio' group by sContrato" ;
	  $qryAvance = mysql_query($sqlAvance,$link);
      If ($rowAvance = mysql_fetch_array($qryAvance))
    	  $dAvanceProgObraActual = $rowAvance['dAvance'] ;
	  $dAvanceProgObraAcum = $dAvanceProgObraActual + $dAvanceProgObraAnterior ;

      If ($MultiOrdenes == 'Si')
      {
	    $pdf->SetFillColor(255,255,152) ;
        $pdf->SetFont('Arial','B',6) ;          	   

	    $sDescripcionCorta = '' ;
	  $sqlOrden = "Select sDescripcionCorta from ordenesdetrabajo where sContrato = '$sContrato' and sNumeroOrden = '$sNumeroOrden'" ;
	  $qryOrden = mysql_query($sqlOrden,$link);
      If ($rowOrden = mysql_fetch_array($qryOrden))
    	  $sDescripcionCorta = $rowOrden['sDescripcionCorta'] ;

	    $Linea = $LineaAvance ;
		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posOrdenX + $anchoTAvance);
		$pdf->Cell($anchoAvance * 3 ,$height ,$sDescripcionCorta,1,0,'C',1);

	    $pdf->SetFillColor(237,243,216) ;
        $pdf->SetFont('Arial','B',6) ;          	   
	    $Linea = $Linea + $height ;
		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posOrdenX + $anchoTAvance);
		$pdf->Cell($anchoAvance ,$height ,'ANTERIOR',1,0,'C',1);

		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posOrdenX + $anchoTAvance + $anchoAvance);
		$pdf->Cell($anchoAvance ,$height ,'ACTUAL',1,0,'C',1);

		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posOrdenX + $anchoTAvance + $anchoAvance + $anchoAvance);
		$pdf->Cell($anchoAvance ,$height ,'ACUMULADO',1,0,'C',1);
		
	    $Linea = $Linea + $height ;
		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posOrdenX);
		$pdf->Cell($anchoTAvance ,$height ,'AVANCE REAL',1,0,'L',1);

	    $pdf->SetFillColor(255,255,255) ;
        $pdf->SetFont('Arial','',6) ;          	   
		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posOrdenX + $anchoTAvance);
		$pdf->Cell($anchoAvance ,$height ,$dAvanceRealOrdenAnterior . '%',1,0,'R',0);

		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posOrdenX + $anchoTAvance + $anchoAvance);
		$pdf->Cell($anchoAvance ,$height ,$dAvanceRealOrdenActual . '%',1,0,'R',0);

		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posOrdenX + $anchoTAvance + $anchoAvance + $anchoAvance);
		$pdf->Cell($anchoAvance ,$height ,$dAvanceRealOrdenAcum . '%',1,0,'R',0);
		
	    $pdf->SetFillColor(237,243,216) ;
        $pdf->SetFont('Arial','B',6) ;          	   
	    $Linea = $Linea + $height ;
		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posOrdenX);
		$pdf->Cell($anchoTAvance ,$height ,'AVANCE PROGRAMADO',1,0,'L',1);

	    $pdf->SetFillColor(255,255,255) ;
        $pdf->SetFont('Arial','',6) ;          	   
		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posOrdenX + $anchoTAvance);
		$pdf->Cell($anchoAvance ,$height ,$dAvanceProgOrdenAnterior . '%',1,0,'R',0);

		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posOrdenX + $anchoTAvance + $anchoAvance);
		$pdf->Cell($anchoAvance ,$height ,$dAvanceProgOrdenActual . '%',1,0,'R',0);

		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posOrdenX + $anchoTAvance + $anchoAvance + $anchoAvance);
		$pdf->Cell($anchoAvance ,$height ,$dAvanceProgOrdenAcum . '%',1,0,'R',0);
		
	   }	
     
	    $pdf->SetFillColor(255,255,152) ;
        $pdf->SetFont('Arial','B',6) ;          	   
	    $Linea = $LineaAvance ;
		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posContratoX + $anchoTAvance);
		$pdf->Cell($anchoAvance * 3 ,$height ,'AVANCES DE LA OBRA',1,0,'C',1);

	    $pdf->SetFillColor(237,243,216) ;
        $pdf->SetFont('Arial','B',6) ;          	   
	    $Linea = $Linea + $height ;
		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posContratoX + $anchoTAvance);
		$pdf->Cell($anchoAvance ,$height ,'ANTERIOR',1,0,'C',1);

		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posContratoX + $anchoTAvance + $anchoAvance);
		$pdf->Cell($anchoAvance ,$height ,'ACTUAL',1,0,'C',1);

		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posContratoX + $anchoTAvance + $anchoAvance + $anchoAvance);
		$pdf->Cell($anchoAvance ,$height ,'ACUMULADO',1,0,'C',1);

	    $Linea = $Linea + $height ;
		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posContratoX);
		$pdf->Cell($anchoTAvance ,$height ,'AVANCE REAL',1,0,'L',1);

	    $pdf->SetFillColor(255,255,255) ;
        $pdf->SetFont('Arial','',6) ;          	   
		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posContratoX + $anchoTAvance);
		$pdf->Cell($anchoAvance ,$height ,$dAvanceRealObraAnterior . '%',1,0,'R',0);

		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posContratoX + $anchoTAvance + $anchoAvance);
		$pdf->Cell($anchoAvance ,$height ,$dAvanceRealObraActual . '%',1,0,'R',0);

		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posContratoX + $anchoTAvance + $anchoAvance + $anchoAvance);
		$pdf->Cell($anchoAvance ,$height ,$dAvanceRealObraAcum . '%',1,0,'R',0);

	    $pdf->SetFillColor(237,243,216) ;
        $pdf->SetFont('Arial','B',6) ;          	   
	    $Linea = $Linea + $height ;
		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posContratoX);
		$pdf->Cell($anchoTAvance ,$height ,'AVANCE PROGRAMADO',1,0,'L',1);
		
	    $pdf->SetFillColor(255,255,255) ;
        $pdf->SetFont('Arial','',6) ;          	   
		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posContratoX + $anchoTAvance);
		$pdf->Cell($anchoAvance ,$height ,$dAvanceProgObraAnterior . '%',1,0,'R',0);

		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posContratoX + $anchoTAvance + $anchoAvance);
		$pdf->Cell($anchoAvance ,$height ,$dAvanceProgObraActual . '%',1,0,'R',0);

		$pdf->setY($Linea);	  
		$pdf->Cell($xContrato + $posContratoX + $anchoTAvance + $anchoAvance + $anchoAvance);
		$pdf->Cell($anchoAvance ,$height ,$dAvanceProgObraAcum . '%',1,0,'R',0);
}
?>
