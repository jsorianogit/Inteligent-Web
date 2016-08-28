<?php
include "../fpdf153/fpdf.php";
include "../../../../Servidor.php";

$sContrato='418235943';	 
$dIdFecha = '2007/01/21' ;
$sIdConvenio = 'A-04' ;
$sIdTurno = 'A' ;
$sNumeroOrden = '418235943-AKAL-C-PP' ;
$lStatus = 'Autorizado' ;

include "utilGeneral.php";

class PDF extends FPDF
{
   function fnImprimeTitulo()
   {
      global $pdf ; 	
      global $arTitulos, $link;

	  // Cabecera de las Partidas
	  $yFilaCabecera = $pdf->getY() + 2 ;
	  if(!isset($xContrato))$xContrato=0.1;
	  
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato);

	  $height = 5 ;	
	  $anchoPaquete = 9.9 ;
	  $anchoPartida = 11.5 ;
   	  $anchoDescripcion = 75.6;
	  $anchoUnidad = 12.2 ;
	  $anchoCantidadAnexo = 14.6 ;
	  $anchoDescripcionAct = $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoCantidadAnexo ;

	  $anchoCantAnterior = $anchoCantActual = $anchoCantAcum = 13.1 ;
	  $anchoAvAnterior = $anchoAvActual = $anchoAvAcum = 10.7 ;
	  $anchoDescripcAv = $anchoCantAnterior + $anchoCantActual + $anchoCantAcum + $anchoAvAnterior + $anchoAvActual + $anchoAvAcum ;

      RoundedRect(10.1, $yFilaCabecera, $anchoDescripcionAct + $anchoDescripcAv, $height * 2 , 3.50, '1111');

      $pdf->SetFont('Arial','B',9) ;
	  $pdf->SetFillColor(255,255,255) ;
      $pdf->setY($yFilaCabecera - 1.5) ;
      $pdf->cell($xContrato + 2);
	  $pdf->Cell( 45 ,3,'DETALLE DE MOVIMIENTOS',0 , 0,'L',1);

      $pdf->SetFont('Arial','B',7);          	   
	  $pdf->SetFillColor(237,243,216) ;
   	  $yFilaCabecera = $yFilaCabecera + ($height / 2) ;	  
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato);
	  $pdf->Cell($anchoDescripcionAct,$height , "DESCRIPCION DE ACTIVIDADES",1,0,'C',1);

   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoDescripcionAct);
	  $pdf->Cell($anchoDescripcAv ,$height / 2 ,"AVANCES DE LA OBRA",1,0,'C',1);

   	  $yFilaCabecera = $yFilaCabecera + ($height / 2);	  
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad);
	  $pdf->Cell($anchoCantAnterior + $anchoAvAnterior,$height / 2,"ANTERIOR",1,0,'C',1);

   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad + $anchoCantAnterior + $anchoAvAnterior);
	  $pdf->Cell($anchoCantActual + $anchoAvActual,$height / 2,"ACTUAL",1,0,'C',1);
	  
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad + $anchoCantAnterior + $anchoAvAnterior + $anchoCantActual + $anchoAvActual);
	  $pdf->Cell($anchoCantAcum + $anchoAvAcum,$height / 2,"ACUMULADO",1,0,'C',1);

   	  $yFilaCabecera = $yFilaCabecera + ($height / 2);	  
   	  
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato);
	  $pdf->Cell($anchoPartida,$height,"PQ",1,0,'C',1);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPaquete);
	  $pdf->Cell($anchoPartida,$height,"PARTIDA",1,0,'C',1);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida);
	  $pdf->Cell($anchoDescripcion,$height,"DESCRIPCION",1,0,'C',1);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion);
	  $pdf->MultiCell($anchoCantidadAnexo,$height / 2,"CANT. A INST.",1,'C',1);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo);
	  $pdf->Cell($anchoUnidad,$height,"UNIDAD",1,0,'C',1);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad);
	  $pdf->Cell($anchoCantAnterior,$height,"CANTIDAD",1,0,'C',1);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad + $anchoCantAnterior);
	  $pdf->Cell($anchoAvAnterior,$height,"#",1,0,'C',1);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad + $anchoCantAnterior + $anchoAvAnterior);
	  $pdf->Cell($anchoCantActual,$height,"CANTIDAD",1,0,'C',1);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad + $anchoCantAnterior + $anchoAvAnterior + $anchoCantActual);
	  $pdf->Cell($anchoAvActual,$height,"#",1,0,'C',1);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad + $anchoCantAnterior + $anchoAvAnterior + $anchoCantActual + $anchoAvActual);
	  $pdf->Cell($anchoCantAcum,$height,"CANTIDAD",1,0,'C',1);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad + $anchoCantAnterior + $anchoAvAnterior + $anchoCantActual + $anchoAvActual + $anchoCantAcum);
	  $pdf->Cell($anchoAvAcum,$height,"%",1,0,'C',1);

   }

   function fnImprimePartidas()
   {
      global $pdf ; 	
      global $arTitulos, $link, $sContrato, $dIdFecha, $sNumeroOrden, $sIdTurno, $sIdConvenio, $lStatus, $pdf;
      

	  if(!isset($xContrato))$xContrato=0.1;
	  $pdf->Cell($xContrato);

	  $anchoPaquete = 9.9 ;
	  $anchoPartida = 11.5 ;
   	  $anchoDescripcion = 75.6;
	  $anchoUnidad = 12.2 ;
	  $anchoCantidadAnexo = 14.6 ;

	  $anchoCantAnterior = $anchoCantActual = $anchoCantAcum = 13.1 ;
	  $anchoAvAnterior = $anchoAvActual = $anchoAvAcum = 10.7 ;

      $pdf->SetFont('Arial','',6) ;          	   
	  $pdf->SetFillColor(255,255,255) ;
	  $dImporteTotal = 0 ;
	  $TotalPartida = 0.0000 ;
	  $CuerpoPartida = 200 ;
      $anchoCaracter = 3 ;
	  $sPaquete = '' ;	      
	  $height = 4.5 ;	
	  $yFilaInicial = $pdf->getY() + $height + .5 ;
	  $yLineaAnterior = $yFila = $yFilaInicial ;	      
      $tmpLimiteHoja = 195.19 ;
      
  	  $sqlConfiguracion = "Select sTipoPartida, lImprimeExtraordinario from configuracion Where sContrato = '$sContrato'" ;      
      $qryConfiguracion = mysql_query($sqlConfiguracion,$link);
      if ($rowConfiguracion = mysql_fetch_array($qryConfiguracion))
      		If ($rowConfiguracion['sTipoPartida'] == 'Todas')
	      		If ($rowConfiguracion['lImprimeExtraordinario'] == 'Si')
	      			$sqlPartidas = "Select b.sPaquete, b.sNumeroActividad, b.mDescripcion, sum(b.dCantidad) as dCantidad, sum(b.dAvance) as dAvance,a2.sActividadAnterior, a2.sMedida, a.dCantidad as dCantidadAnexo, b.dCantidadAnterior, b.dAvanceAnterior, b.dCantidadActual, b.dAvanceActual From bitacoradeactividades b INNER JOIN actividadesxorden a ON (b.sContrato = a.sContrato And b.sNumeroOrden = a.sNumeroOrden And b.sPaquete = a.sPaquete And b.sNumeroActividad = a.sNumeroActividad And a.sIdConvenio = '$sIdConvenio') INNER JOIN actividadesxanexo a2 ON (a.sContrato = a2.sContrato And a.sIdConvenio = a2.sIdConvenio and a.sNumeroActividad = a2.sNumeroActividad) Where b.sContrato =  '$sContrato' And b.sNumeroOrden =  '$sNumeroOrden' And b.dIdFecha =  '$dIdFecha' And b.sIdTurno =  '$sIdTurno' Group By b.sPaquete, b.sNumeroActividad Order By a.iItemOrden" ;
	      		Else
	      			$sqlPartidas = "Select b.sPaquete, b.sNumeroActividad, b.mDescripcion, sum(b.dCantidad) as dCantidad, sum(b.dAvance) as dAvance,a2.sActividadAnterior, a2.sMedida, a.dCantidad as dCantidadAnexo, b.dCantidadAnterior, b.dAvanceAnterior, b.dCantidadActual, b.dAvanceActual From bitacoradeactividades b INNER JOIN actividadesxorden a ON (b.sContrato = a.sContrato And b.sNumeroOrden = a.sNumeroOrden And b.sPaquete = a.sPaquete And b.sNumeroActividad = a.sNumeroActividad And a.sIdConvenio = '$sIdConvenio') INNER JOIN actividadesxanexo a2 ON (a.sContrato = a2.sContrato And a.sIdConvenio = a2.sIdConvenio and a.sNumeroActividad = a2.sNumeroActividad And a2.lExtraordinario = 'No') Where b.sContrato =  '$sContrato' And b.sNumeroOrden =  '$sNumeroOrden' And b.dIdFecha =  '$dIdFecha' And b.sIdTurno =  '$sIdTurno' Group By b.sPaquete, b.sNumeroActividad Order By a.iItemOrden" ;
	      	Else
	      		If ($rowConfiguracion['lImprimeExtraordinario'] == 'Si')
	      			$sqlPartidas = "Select b.sPaquete, b.sNumeroActividad, b.mDescripcion, sum(b.dCantidad) as dCantidad, sum(b.dAvance) as dAvance,a2.sActividadAnterior, a2.sMedida, a.dCantidad as dCantidadAnexo, b.dCantidadAnterior, b.dAvanceAnterior, b.dCantidadActual, b.dAvanceActual From bitacoradeactividades b INNER JOIN actividadesxorden a ON (b.sContrato = a.sContrato And b.sNumeroOrden = a.sNumeroOrden And b.sPaquete = a.sPaquete And b.sNumeroActividad = a.sNumeroActividad And a.sIdConvenio = '$sIdConvenio') INNER JOIN actividadesxanexo a2 ON (a.sContrato = a2.sContrato And a.sIdConvenio = a2.sIdConvenio and a.sNumeroActividad = a2.sNumeroActividad) Where b.sContrato =  '$sContrato' And b.sNumeroOrden =  '$sNumeroOrden' And b.dIdFecha =  '$dIdFecha' And b.sIdTurno =  '$sIdTurno' And b.dCantidad > 0 Group By b.sPaquete, b.sNumeroActividad Order By a.iItemOrden" ;
	      		Else
	      			$sqlPartidas = "Select b.sPaquete, b.sNumeroActividad, b.mDescripcion, sum(b.dCantidad) as dCantidad, sum(b.dAvance) as dAvance,a2.sActividadAnterior, a2.sMedida, a.dCantidad as dCantidadAnexo, b.dCantidadAnterior, b.dAvanceAnterior, b.dCantidadActual, b.dAvanceActual From bitacoradeactividades b INNER JOIN actividadesxorden a ON (b.sContrato = a.sContrato And b.sNumeroOrden = a.sNumeroOrden And b.sPaquete = a.sPaquete And b.sNumeroActividad = a.sNumeroActividad And a.sIdConvenio = '$sIdConvenio') INNER JOIN actividadesxanexo a2 ON (a.sContrato = a2.sContrato And a.sIdConvenio = a2.sIdConvenio and a.sNumeroActividad = a2.sNumeroActividad And a2.lExtraordinario = 'No') Where b.sContrato =  '$sContrato' And b.sNumeroOrden =  '$sNumeroOrden' And b.dIdFecha =  '$dIdFecha' And b.sIdTurno =  '$sIdTurno' And b.dCantidad > 0 Group By b.sPaquete, b.sNumeroActividad Order By a.iItemOrden" ;
      $qryPartidas = mysql_query($sqlPartidas,$link);
      while($rowPartidas = mysql_fetch_array($qryPartidas))
      {
          If (($yLinea + $anchoCaracter) > $CuerpoPartida) 
          {
			  $pdf->AddPage('');
			  $pdf->fnImprimeTitulo();
			  $yLineaAnterior = $yLinea = 50 ;				
		  }
		  
		  If ($sPaquete != $rowPartidas['sPaquete'])
		  {
		  	  $sPaquete = $rowPartidas['sPaquete'] ;
			  $sBkPaquete = $sPaquete ;
			  $lEncontrato = False ;
			  While (($lEncontrato == False) And ($sBkPaquete != '')) 
			  {
     				$sqlGerencial = "Select lGerencial, mDescripcion, sPaquete From actividadesxorden Where sContrato = '$sContrato' And sIdConvenio = '$sIdConvenio' And sNumeroOrden = '$sNumeroOrden' And sNumeroActividad = '$sBkPaquete' And sTipoActividad <> 'Actividad' " ;
				    $qryGerencial = mysql_query($sqlGerencial,$link);
				    If ($rowGerencial = mysql_fetch_array($qryGerencial))
				    	If ($rowGerencial['lGerencial'] == 'Si')
					    {
						    $pdf->SetFont('Arial','B',6) ;  
						    $pdf->SetTextColor(0,0,255) ;  
							        	   
							$lEncontrato = True ;
					   	    $pdf->setY($yFila);	  
						    $pdf->Cell($xContrato);
						    $pdf->MultiCell($anchoPartida,$height,$sPaquete,0,	'C',0);
						   	$pdf->setY($yFila);	  
						    $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida);
					 		$yLineaAnterior = $pdf->getY() ;
						    $pdf->MultiCell($anchoDescripcion,$height,$rowGerencial['mDescripcion'] ,0,'J',0);
					  	    $yIncremento = $pdf->getY() - $yLineaAnterior ;   

							$pdf->setY($yLineaAnterior) ;
						    $pdf->Cell($xContrato + 0.01 );
					  		$pdf->Cell($tmpLimiteHoja, $yIncremento,"",1,1,'C');

				      	    $yFila = $yFila + $yIncremento ;	
						    $pdf->SetTextColor(0,0,0) ;  
						    $pdf->SetFont('Arial','',6) ;          	   
						    
						}
					$sBkPaquete = $rowGerencial['sPaquete'] ;
			  }
		}
		$pdf->setY($yFila);	  
		$pdf->Cell($xContrato + $anchoPaquete);
		$pdf->Cell($anchoPartida,$height,$rowPartidas['sNumeroActividad'],0,0,'C',0);
		$pdf->setY($yFila);	  
		$pdf->Cell($xContrato + $anchoPaquete + $anchoPartida);
 		$yLineaAnterior = $pdf->getY() ;
		$pdf->MultiCell($anchoDescripcion,$height,$rowPartidas['mDescripcion'],0,'J',0);
  	    $yIncremento = $pdf->getY() - $yLineaAnterior ;   
		
		$pdf->setY($yFila);	  
		$pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion);
		$pdf->Cell($anchoCantidadAnexo,$height ,$rowPartidas['dCantidadAnexo'],0,0,'R',0);
		$pdf->setY($yFila);	  
		$pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo);
		$pdf->Cell($anchoUnidad,$height,$rowPartidas['sMedida'],0,0,'C',0);

		If ($lStatus == 'Pendiente')
		{
		 
			$dCantAnt = 0 ;
			$dAvAnt = 0 ;
     		$sqlAnterior = "Select sum(dCantidad) as dCantidad from bitacoradeactividades where sContrato = '$sContrato' and dIdFecha < '$dIdFecha' And sNumeroOrden = '$sNumeroOrden' And sPaquete = '$rowPartidas[0]' And sNumeroActividad = '$rowPartidas[1]' Group By sPaquete, sNumeroActividad" ;
			$qryAnterior = mysql_query($sqlAnterior,$link);
		    If ($rowAnterior = mysql_fetch_array($qryAnterior))
				$dCantAnt =	$rowAnterior['dCantidad'] ;

     		$sqlAnterior = "Select sum(dAvance) as dAvance from bitacoradeactividades where sContrato = '$sContrato' and dIdFecha < '$dIdFecha' And sNumeroOrden = '$sNumeroOrden' And sPaquete = '$rowPartidas[0]' And sNumeroActividad = '$rowPartidas[1]' Group By sPaquete, sNumeroActividad" ;
			$qryAnterior = mysql_query($sqlAnterior,$link);
		    If ($rowAnterior = mysql_fetch_array($qryAnterior))
				$dAvAnt = $rowPartidas['dAvance'] ;
				
			$dCantAct = $rowPartidas['dCantidad'] ;
			$dAvAct = $rowPartidas['dAvance'] ;
			$dCantAcum = $dCantAnt + $dCantAct ;
			$dAvAcum = $dAvAnt + $dAvAct ;
			
			
		}
		else
		{
			$dCantAnt =	$rowPartidas['dCantidadAnterior'] ;
			$dAvAnt = $rowPartidas['dAvanceAnterior'] ;
			$dCantAct = $rowPartidas['dCantidadActual'] ;
			$dAvAct = $rowPartidas['dAvanceActual'] ;
			$dCantAcum = $dCantAnt + $dCantAct ;
			$dAvAcum = $dAvAnt + $dAvAct ;
		}
		
		$pdf->setY($yFila);	  
	    $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad);
	    $pdf->Cell($anchoCantAnterior,$height, $dCantAnt ,0,0,'C',0);
     	$pdf->setY($yFila);	  

 	    $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad + $anchoCantAnterior)		;
	    $pdf->Cell($anchoAvAnterior,$height, $dAvAnt . '%',0,0,'R',0);
   	    $pdf->setY($yFila);	  
	    $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad + $anchoCantAnterior + $anchoAvAnterior);
	    $pdf->Cell($anchoCantActual,$height, $dCantAct ,0,0,'R',0);
   	    $pdf->setY($yFila);	  
	    $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad + $anchoCantAnterior + $anchoAvAnterior + $anchoCantActual);
	    $pdf->Cell($anchoAvActual,$height, $dAvAct . '%' ,0,0,'R',0);
   	    $pdf->setY($yFila);	  
	    $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad + $anchoCantAnterior + $anchoAvAnterior + $anchoCantActual + $anchoAvActual);
	    $pdf->Cell($anchoCantAcum,$height, $dCantAcum ,0,0,'R',0);
   	    $pdf->setY($yFila);	  
	    $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad + $anchoCantAnterior + $anchoAvAnterior + $anchoCantActual + $anchoAvActual + $anchoCantAcum);
	    $pdf->Cell($anchoAvAcum,$height, $dAvAcum . '%' ,0,0,'R',0);

    	$yFila = $yFila + $yIncremento ;			  
		
		// Detalle de Alcances ....
   		If ($rowConfiguracion['sTipoPartida'] == 'Todas')
   		{
			$sqlAlcances = "Select b.dCantidad, b.dAvance, b.iFase, b.sReferencia, a.sDescripcion, dCantidadAnterior, dAvanceAnterior, dCantidadActual, dAvanceActual From bitacoradealcances b INNER JOIN alcancesxactividad a ON (b.sContrato = a.sContrato And b.sNumeroActividad = a.sNumeroActividad And b.iFase = a.iFase) Where b.sContrato = '$sContrato' And b.dIdFecha = '$dIdFecha' And b.sIdTurno = '$sIdTurno' And b.sNumeroOrden = '$sNumeroOrden' And b.sPaquete = '$rowPartidas[0]' And b.sNumeroActividad = '$rowPartidas[1]' Order By b.iFase" ;
			$qryAlcances = mysql_query($sqlAlcances,$link);
		    While ($rowAlcances = mysql_fetch_array($qryAlcances))	
		    {
			    $pdf->SetFont('Arial','B',6) ;  
			    $pdf->SetTextColor(0,0,255) ;  
				        	   
				$pdf->setY($yFila);	  
				$pdf->Cell($xContrato + $anchoPaquete + $anchoPartida);
				If ($rowAlcances['sReferencia'] != '')	
					$pdf->Cell($anchoDescripcion,$height,$rowAlcances ['sDescripcion'] . ' [REFERENCIA: ' . $rowAlcances ['sReferencia'] . ']',0 ,0,'L',0);
				Else
					$pdf->Cell($anchoDescripcion,$height,$rowAlcances ['sDescripcion'],0,0,'L',0);
							
			    $pdf->SetFont('Arial','',6) ;          	   
				If ($lStatus == 'Pendiente')
				{
					$dCantAnt = 0 ;
					$dAvAnt = 0 ;
		     		$sqlAnterior = "Select sum(dCantidad) as dCantidad from bitacoradealcances where sContrato = '$sContrato' and dIdFecha < '$dIdFecha' And sNumeroOrden = '$sNumeroOrden' And sPaquete = '$rowPartidas[0]' And sNumeroActividad = '$rowPartidas[1]' and iFase = '$rowAlcances[2]' Group By sPaquete, sNumeroActividad" ;
					$qryAnterior = mysql_query($sqlAnterior,$link);
				    If ($rowAnterior = mysql_fetch_array($qryAnterior))
						$dCantAnt =	$rowAnterior['dCantidad'] ;

		     		$sqlAnterior = "Select sum(dAvance) as dAvance from bitacoradealcances where sContrato = '$sContrato' and dIdFecha < '$dIdFecha' And sNumeroOrden = '$sNumeroOrden' And sPaquete = '$rowPartidas[0]' And sNumeroActividad = '$rowPartidas[1]' and iFase = '$rowAlcances[2]' Group By sPaquete, sNumeroActividad" ;
					$qryAnterior = mysql_query($sqlAnterior,$link);
				    If ($rowAnterior = mysql_fetch_array($qryAnterior))
						$dAvAnt = $rowPartidas['dAvance'] ;
				
						$dCantAct = $rowAlcances['dCantidad'] ;
					$dAvAct = $rowAlcances['dAvance'] ;
					$dCantAcum = $dCantAnt + $dCantAct ;
					$dAvAcum = $dAvAnt + $dAvAct ;
				}
				else
				{
					$dCantAnt =	$rowAlcances['dCantidadAnterior'] ;
					$dAvAnt = $rowAlcances['dAvanceAnterior'] ;
					$dCantAct = $rowAlcances['dCantidadActual'] ;
					$dAvAct = $rowAlcances['dAvanceActual'] ;
					$dCantAcum = $dCantAnt + $dCantAct ;
					$dAvAcum = $dAvAnt + $dAvAct ;
				}
							
				$pdf->setY($yFila);	  
			    $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad);
			    $pdf->Cell($anchoCantAnterior,$height, $dCantAnt ,0,0,'C',0);

		     	$pdf->setY($yFila);	  
		 	    $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad + $anchoCantAnterior)		;
			    $pdf->Cell($anchoAvAnterior,$height, $dAvAnt . '%',0,0,'R',0);
		   	    $pdf->setY($yFila);	  
			    $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad + $anchoCantAnterior + $anchoAvAnterior);
			    $pdf->Cell($anchoCantActual,$height, $dCantAct ,0,0,'R',0);
		   	    $pdf->setY($yFila);	  
			    $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad + $anchoCantAnterior + $anchoAvAnterior + $anchoCantActual);
			    $pdf->Cell($anchoAvActual,$height, $dAvAct . '%' ,0,0,'R',0);
		   	    $pdf->setY($yFila);	  
			    $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad + $anchoCantAnterior + $anchoAvAnterior + $anchoCantActual + $anchoAvActual);
			    $pdf->Cell($anchoCantAcum,$height, $dCantAcum ,0,0,'R',0);
		   	    $pdf->setY($yFila);	  
			    $pdf->Cell($xContrato + $anchoPaquete + $anchoPartida + $anchoDescripcion + $anchoCantidadAnexo + $anchoUnidad + $anchoCantAnterior + $anchoAvAnterior + $anchoCantActual + $anchoAvActual + $anchoCantAcum);
			    $pdf->Cell($anchoAvAcum,$height, $dAvAcum . '%' ,0,0,'R',0);
		    	$yFila = $yFila + $height ;	
				$pdf->setY($yFila);	  
			    $pdf->SetTextColor(0,0,0) ;  
			}
		}
  	    $yIncremento = $pdf->getY() - $yLineaAnterior ;   
		$pdf->setY($yLineaAnterior) ;
	    $pdf->Cell($xContrato + 0.01 );
      	$pdf->Cell($tmpLimiteHoja, $yIncremento,"",1,1,'C');


//		  If ($yIncremento > $yIncrementoFolios)
//	      	  $yLinea = $yLinea + $yIncremento ;			  
//	      Else
//	      	  $yLinea = $yLinea + $yIncrementoFolios ;			  
		  	
// 	   	  $pdf->setY($yLineaAnterior);	  
//	      $pdf->Cell($tmpLimiteHoja, $yLinea - $yLineaAnterior ,"",1,1,'C');				
	   }	
	
   }
}
 
$pdf=new PDF();
$pdf->AddPage('');
$pdf->fnImprimeTitulo();
$pdf->fnImprimePartidas();
$pdf->Output(); 

?>
