<?php
include "../fpdf153/fpdf.php";
require("../../../../Servidor.php");

$sContrato='418235943';	 
$dFechaInicio = '2007/01/01' ;
$dFechaFinal = '2007/03/01' ;
$sIdConvenio = '' ;
include "utilGeneral.php";

class PDF extends FPDF
{
   function fnLeeConfiguracion($sContrato)
   {
      global $arTitulos,$link;
      $sqlTitulo = "SELECT mCliente, bImagen FROM  contratos Where sContrato = '$sContrato' ";
      
      $qryTitulos = mysql_query($sqlTitulo,$link);

      If ($rowTitulos = mysql_fetch_array($qryTitulos))
      {
	      $arTitulos[1][0]= $rowTitulos[1]."_Cliente.jpg"; 
	      $fp = fopen("./photo/".$arTitulos[1][0],"w+");
	      fwrite($fp, $rowTitulos[10]);
	      
	      fclose($fp); 
	      $arTitulos[1][1]=$rowTitulos['mDescripcion'];
       }
   }

   function fnImprimeTitulo()
   {
      global $pdf ; 	
      global $arTitulos, $link;

	  global $sFirmante1, $sFirmante2, $sFirmante3, $sFirmante4, $sFirmante5, $sFirmante6, $sFirmante7, $sFirmante8, $sFirmante9, $sFirmante10 ;
	  global $sPuesto1, $sPuesto2, $sPuesto3, $sPuesto4, $sPuesto5,  $sPuesto6,  $sPuesto7,  $sPuesto8,  $sPuesto9, $sPuesto10 ;
      
      $x=13;
      $tmpLimiteHoja = 278;
      $tmpAnchoImagen=35;
      $tmpAltoImagen=10;
      $saltopag = 12 ;

      $pdf->Cell($tmpLimiteHoja,$tmpAltoImagen + 7,"",1,1,'C');

	  $ysContrato = $pdf->getY() ;
      $pdf->setY($ysContrato);

      $pdf->SetFont('Arial','B',7);          	   
      $pdf->SetFillColor(189,184,248);
      $pdf->setY($ysContrato - 1.5) ;
      $pdf->cell(2);
	  $pdf->Cell( 80 ,3,'REPORTE DE INSTALACION DE CONCEPTOS POR PERIODO',1 , 0,'L',1);
      $pdf->SetFont('Arial','B',6);          	   
	  
      $pdf->setY($ysContrato) ;
      $pdf->cell(0.1);
	  $pdf->MultiCell( $tmpLimiteHoja - 91 ,9,$arTitulos[1][2],0,'L',0);

      $pdf->setY($ysContrato);
   	  if(!isset($xGenerador))$xGenerador = $tmpLimiteHoja - 90;


	  //Datos del Generador
  	  $sqlConvenio = "Select dFechaInicio, dFechaFinal, dMontoMN, sDescripcion from convenios where sContrato = '$sContrato' And sIdConvenio = '$sIdConvenio'" ;
	  $QryConvenio = mysql_query($sqlConvenio,$link);
	  if($rowConvenio = mysql_fetch_array($QryConvenio))
 	  {
	      $pdf->SetFillColor(189,184,248);
	   	  $pdf->Cell($xGenerador);
	      $pdf->SetFont('Arial','B',6);          	   
		  $pdf->Cell(40,3,"PERIODO DE IMPRESION",1,0,'L',1);
	      $pdf->SetFont('Arial','',6);          	   
		  $pdf->Cell(50,3,$dFechaInicio . ' AL ' . $dFechaFinal,1,1,'L',0);
	   	  $pdf->Cell($xGenerador);
	      $pdf->SetFont('Arial','B',6);          	   
		  $pdf->Cell(40,3,"CONVENIO/ACTA CIRCUNS. VIGENTE",1,0,'L',1);
	      $pdf->SetFont('Arial','',6);          	   
		  $pdf->Cell(50,3,$rowConvenio['sDescripcion'],1,1,'L',0);
	   	  $pdf->Cell($xGenerador);
	      $pdf->SetFont('Arial','B',6);          	   
		  $pdf->Cell(40,3,"VIGENCIA DEL CONTRATO",1,0,'L',1);
	      $pdf->SetFont('Arial','',6);          	   
		  $pdf->Cell(50,3,$rowConvenio['dFechaInicio'] ." AL ".$rowConvenio['dFechaFinal'],1,1,'L',0);
	   	  $pdf->Cell($xGenerador);
	      $pdf->SetFont('Arial','B',6);          	   
		  $pdf->Cell(40,3,"MONTO AUTORIZADO",1,0,'L',1);
	      $pdf->SetFont('Arial','',6);          	   
		  $pdf->Cell(50,3,$rowConvenio['dMontoMN'],1,0,'L',0);
	  }
	
	  // Cabecera de las Partidas
	  $yFilaCabecera = $pdf->getY() + 5 ;
	  if(!isset($xContrato))$xContrato=0.1;
	  
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato);
	  $pdf->SetFont('Arial','B',7);          	   
	  $pdf->SetFillColor(237,243,216);

	  $anchoPartida = 13 ;
   	  $anchoDescripcion = 103;
	  $anchoUnidad = 12 ;
	  $anchoCantidadAnexo = 15 ;
	  $anchoCantidad = 18 ;
	  $anchoPrecio = 15 ;
	  $anchoReportes = 30 ;
	  $anchoTituloReportes = $anchoCantidad * 5 + $anchoReportes;
	  
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato);
	  $pdf->MultiCell($anchoPartida,3,"PARTIDA ANEXO",1,'C',1);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPartida);
	  $pdf->Cell($anchoDescripcion,6,"CONCEPTO/DESCRIPCION",1,0,'C',1);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion);
	  $pdf->Cell($anchoUnidad,6,"UNIDAD",1,0,'C',1);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion + $anchoUnidad);
	  $pdf->MultiCell($anchoCantidadAnexo,3,"CANTIDAD ANEXO",1,'C',1);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoCantidadAnexo);
	  $pdf->MultiCell($anchoPrecio,3,"PRECIO UNITARIO",1,'R',1);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoCantidadAnexo + $anchoPrecio);
	  $pdf->Cell($anchoTituloReportes,3,"REPORTES DIARIOS",1,0,'C',1);
	  
   	  $pdf->setY($yFilaCabecera + 3);	  
	  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoCantidadAnexo + $anchoPrecio);
	  $pdf->Cell($anchoCantidad,3,"ANTERIOR",1,0,'C',1);
   	  $pdf->setY($yFilaCabecera + 3);	  
	  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoCantidadAnexo + $anchoPrecio + $anchoCantidad);
	  $pdf->Cell($anchoCantidad,3,"REPORTADO",1,0,'C',1);
   	  $pdf->setY($yFilaCabecera + 3);	  
	  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoCantidadAnexo + $anchoPrecio + $anchoCantidad + $anchoCantidad);
	  $pdf->Cell($anchoReportes,3,"FOLIO DE REPORTES",1,0,'C',1);
   	  $pdf->setY($yFilaCabecera + 3);	  
	  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoCantidadAnexo + $anchoPrecio + $anchoCantidad + $anchoCantidad + $anchoReportes);
	  $pdf->Cell($anchoCantidad,3,"IMPORTE",1,0,'C',1);
   	  $pdf->setY($yFilaCabecera + 3);	  
	  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoCantidadAnexo + $anchoPrecio + $anchoCantidad + $anchoCantidad + $anchoReportes + $anchoCantidad);
	  $pdf->Cell($anchoCantidad,3,"ACUMULADO",1,0,'C',1);
   	  $pdf->setY($yFilaCabecera + 3);	  
	  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoCantidadAnexo + $anchoPrecio + $anchoCantidad + $anchoCantidad + $anchoReportes + $anchoCantidad + $anchoCantidad);
	  $pdf->Cell($anchoCantidad,3,"PEND./EXCED.",1,0,'C',1);
	  
       fnFirmasAutorizadas ( $sContrato, '', $dFechaFinal, 172, 'L') ;
 	    
   }


   function fnImprimePartidas()
   {
      global $pdf ; 	
      global $arTitulos, $link, $sContrato, $dFechaInicio, $dFechaFinal, $sIdConvenio, $pdf;
      
	  $anchoPartida = 13 ;
   	  $anchoDescripcion = 103;
	  $anchoUnidad = 12 ;
	  $anchoCantidadAnexo = 15 ;
	  $anchoCantidad = 18 ;
	  $anchoPrecio = 15 ;
	  $anchoReportes = 30 ;
      $tmpLimiteHoja = 278 ;

	  $yLineaAnterior= $yLinea = 50 ;
	  if(!isset($xColumna))$xColumna =0.1;	  
      $pdf->SetFont('Arial','',6) ;          	   
	  $pdf->SetFillColor(237,243,216) ;
	  $dImporteTotal = 0 ;
	  $TotalPartida = 0.0000 ;
	  $CuerpoPartida = 120 ;
      $anchoCaracter = 3 ;
  	  $sqlPartidasReportadas = "Select a.sNumeroActividad, a.sMedida, a.dCantidadAnexo, a.mDescripcion, a.dVentaMN,  sum(b.dCantidad) as dCantidad from bitacoradeactividades b INNER JOIN reportediario r ON (b.sContrato = r.sContrato And b.sNumeroOrden = r.sNumeroOrden And b.dIdFecha = r.dIdFecha and b.sIdTurno = r.sIdTurno and r.lStatus = 'Autorizado') INNER JOIN actividadesxanexo a ON (b.sContrato = a.sContrato and b.sNumeroActividad = a.sNumeroActividad and a.sIdConvenio = '$sIdConvenio') where b.sContrato = '$sContrato' And b.dIdFecha >= '$dFechaInicio' And b.dIdFecha <= '$dFechaFinal' And b.dCantidad > 0 Group By b.sNumeroActividad Order By a.iItemOrden" ;      
      $qryPartidas = mysql_query($sqlPartidasReportadas,$link);
      while($rowPartidas = mysql_fetch_array($qryPartidas))
      {
          If (($yLinea + $anchoCaracter) > $CuerpoPartida) 
          {
	//		  echo ($yLinea + $anchoCaracter) ;
			  $pdf->AddPage('L');
			  $pdf->fnLeeConfiguracion($sContrato);
			  $pdf->fnImprimeTitulo();
			  $yLineaAnterior = $yLinea = 50 ;				
		  }
		  
          $pdf->SetFont('Arial','',6);          	   
	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna);
		  $pdf->Cell($anchoPartida,3,$rowPartidas['sNumeroActividad'],0,0,'C',0);
	
	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna + $anchoPartida);
    	  $yLineaAnterior = $pdf->getY() ;
	//			  $pdf->MultiCell($anchoDescripcion,3,substr(trim($rowPartidas['mDescripcion']),1,300),0,'L',0);
		  $pdf->MultiCell($anchoDescripcion,3,trim($rowPartidas['mDescripcion']),0,'J',0);
   	      $yIncremento = $pdf->getY() - $yLineaAnterior ;   
	//			  $anchoCaracter = ($yIncremento / (strlen(trim($rowPartidas['mDescripcion']))))
				    		  
				  
	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion);
		  $pdf->Cell($anchoUnidad,3,$rowPartidas['sMedida'],0,0,'C',0);
				  
	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad);
		  $pdf->Cell($anchoCantidadAnexo,3,$rowPartidas['dCantidadAnexo'],0,0,'R',0);
		  
	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoCantidadAnexo);
		  $pdf->Cell($anchoPrecio,3,$rowPartidas['dVentaMN'],0,0,'R',0);

		  //Acumulado Reportado ...
  		  $dAcumulado = 0 ;
		  $sqlAcumulado = "Select sum(b.dCantidad) as dCantidad from bitacoradeactividades b INNER JOIN reportediario r ON (b.sContrato = r.sContrato And b.sNumeroOrden = r.sNumeroOrden And b.dIdFecha = r.dIdFecha and b.sIdTurno = r.sIdTurno and r.lStatus = 'Autorizado') INNER JOIN actividadesxanexo a ON (b.sContrato = a.sContrato and b.sNumeroActividad = a.sNumeroActividad and a.sIdConvenio = '$sIdConvenio' and b.sNumeroActividad = '$rowPartidas[0]') where b.sContrato = '$sContrato' And b.dIdFecha < '$dFechaInicio'  Group By b.sNumeroActividad" ;
        
	  	  $qryAcumulado = mysql_query($sqlAcumulado,$link);
		  if($rowAcumulado = mysql_fetch_array($qryAcumulado))
		  		$dAcumulado = $rowAcumulado['dCantidad'] ;
	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoCantidadAnexo + $anchoPrecio);
		  $pdf->Cell($anchoCantidad,3,$dAcumulado ,0,0,'R',0);
		  	
	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoCantidadAnexo + $anchoPrecio + $anchoCantidad);
		  $pdf->Cell($anchoCantidad,3,$rowPartidas['dCantidad'] ,0,0,'R',0);

		  // Folio de Reportes Diarios ...
		  $sFolios = '' ;
		  $sqlFolios = "Select r.sNumeroReporte from bitacoradeactividades b INNER JOIN reportediario r ON (b.sContrato = r.sContrato And b.sNumeroOrden = r.sNumeroOrden And b.dIdFecha = r.dIdFecha and b.sIdTurno = r.sIdTurno and r.lStatus = 'Autorizado') INNER JOIN actividadesxanexo a ON (b.sContrato = a.sContrato and b.sNumeroActividad = a.sNumeroActividad and a.sIdConvenio = '$sIdConvenio' and b.sNumeroActividad = '$rowPartidas[0]') where b.sContrato = '$sContrato' And b.dIdFecha >= '$dFechaInicio' And b.dIdFecha <= '$dFechaFinal' And b.dCantidad > 0 Order By r.sNumeroOrden, r.dIdFecha" ;
	  	  $qryFolios = mysql_query($sqlFolios,$link);
	      while($rowFolios = mysql_fetch_array($qryFolios))
    	  {
		  		If ($sFolios != '')
		  			$sFolios = $sFolios . ', ' . $rowFolios['sNumeroReporte'] ;
		  		Else
		  			$sFolios = $rowFolios['sNumeroReporte'] ;
		  }
		  
	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoCantidadAnexo + $anchoPrecio +  $anchoCantidad + $anchoCantidad );
		  $pdf->MultiCell($anchoReportes,3,$sFolios,0,'L',0);
   	      $yIncrementoFolios = $pdf->getY() - $yLineaAnterior ;   
		  
	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoCantidadAnexo + $anchoPrecio + $anchoCantidad + $anchoCantidad + $anchoReportes);
		  $pdf->Cell($anchoCantidad,3,$rowPartidas['dCantidad'] * $rowPartidas['dVentaMN'],0,0,'R',0);

	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoCantidadAnexo + $anchoPrecio + $anchoCantidad + $anchoCantidad + $anchoCantidad + $anchoReportes);
		  $pdf->Cell($anchoCantidad,3,$rowPartidas['dCantidad'] + $dAcumulado,0,0,'R',0);

	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoCantidadAnexo + $anchoPrecio + $anchoCantidad + $anchoCantidad + $anchoCantidad + $anchoCantidad + $anchoReportes);
		  $pdf->Cell($anchoCantidad,3,$rowPartidas['dCantidadAnexo'] - ($rowPartidas['dCantidad'] + $dAcumulado),0,0,'R',0);

		  $dImporteTotal = $dImporteTotal + $rowPartidas['dCantidad'] * $rowPartidas['dVentaMN'] ;
		  If ($yIncremento > $yIncrementoFolios)
	      	  $yLinea = $yLinea + $yIncremento ;			  
	      Else
	      	  $yLinea = $yLinea + $yIncrementoFolios ;			  
		  	
 	   	  $pdf->setY($yLineaAnterior);	  
	      $pdf->Cell($tmpLimiteHoja, $yLinea - $yLineaAnterior ,"",1,1,'C');				
	   }	


      $pdf->SetFont('Arial','B',7);    
	  $pdf->SetFillColor(170,196,162) ;
   	  $pdf->setY($yLinea);	  
	  $pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoCantidadAnexo + $anchoPrecio + $anchoCantidad + $anchoCantidad + $anchoReportes);
	  $pdf->MultiCell($anchoCantidad + $anchoCantidad + $anchoCantidad ,4,"ACUMULADO POR PERIODO" ,1,'C',1);	
	  $pdf->setY($yLinea + 4);	  
	  $pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoCantidadAnexo + $anchoPrecio + $anchoCantidad + $anchoCantidad + $anchoReportes);
	  $pdf->Cell($anchoCantidad,3,'T O T A L',1,0,'L',1);

   	  $pdf->setY($yLinea + 4);	  
	  $pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoCantidadAnexo + $anchoPrecio + $anchoCantidad + $anchoCantidad + $anchoReportes + $anchoCantidad );
	  $pdf->Cell($anchoCantidad + $anchoCantidad,3,$dImporteTotal,1,0,'R',0);
	
   }

   function fnEliminaConfiguracion()
   {
      global $arTitulos;
 	  unlink("photo/".$arTitulos[1][0]);
   }


   function Footer()
   {	
        global $pdf ;     
   	    $pdf->Cell(0,3,'Pagina '.$pdf->pageno().'/{nb}',0,0,'C',0);
	}
}
 
$pdf=new PDF();
$pdf->AddPage('L');
$pdf->fnLeeConfiguracion($sContrato);
$pdf->fnImprimeTitulo();
//$pdf->fnImprimePartidas();
$pdf->fnEliminaConfiguracion();
$pdf->Output(); 

?>
