<?php

//echo $ruta = realpath("./");

include "../fpdf153/fpdf.php";
require("../../../../../Modulos/include/mysql.inc.php");
//require("../../../../Servidor.php");
if (isset($_SESSION['ssContrato'])) $sContrato=$_SESSION['ssContrato'] ;
if(isset($_REQUEST['sContrato']))$sContrato=$_REQUEST['sContrato'];
if(isset($_REQUEST['sNumeroOrden']))$sNumeroOrden=$_REQUEST['sNumeroOrden'];
if(isset($_REQUEST['sNumeroGenerador']))$sNumeroGenerador =$_REQUEST['sNumeroGenerador'];

//$sContrato='418235943';	 
//$sNumeroOrden='418235943-AKAL-C-PP';
//$sNumeroGenerador = '81' ;


include "utilGeneral.php";

class PDF extends FPDF
{
   var $configExiste;
   function fnLeeConfiguracion($sContrato)
   {

      global $sContrato ;	
	  global $arTitulos,$link;

    $sqlTitulo = "SELECT c.bImagen, c.sContrato, c.sNombre, c.sPiePagina, c.sEmail, c.sWeb, c.sSlogan, c.sFirmasElectronicas, c2.mDescripcion, c2.mCliente, c2.bImagen AS bImagenPEP FROM  contratos c2 INNER JOIN configuracion c ON (c.sContrato = c2.sContrato) Where c2.sContrato = '$sContrato'";
      
      $qryTitulos = mysql_query($sqlTitulo,$link);


      If ($rowTitulos = mysql_fetch_array($qryTitulos))
      {
         $this->configExiste="si";
	      $arTitulos[1][0]= $rowTitulos[1]."_Cliente.jpg"; 
	      $fp = fopen("./photo/".$arTitulos[1][0],"w+");
	      fwrite($fp, $rowTitulos[10]);
	      
    	  fclose($fp); 
	      $arTitulos[1][1]=$rowTitulos[1]."_Contratista.jpg";
	      $fp = fopen("./photo/".$arTitulos[1][1],"w+");
    	  fwrite($fp, $rowTitulos[0]);
	      
	      fclose($fp); 
	      $arTitulos[1][2]=$rowTitulos['mDescripcion'];
    	  $arTitulos[1][3]=$rowTitulos['sContrato'];
	      $arTitulos[1][4]=$rowTitulos['mCliente'];
    	  $arTitulos[1][5]=$rowTitulos['sNombre'];
    	  
    	  $arTitulos[1][6]=$rowTitulos['sEmail'];
    	  $arTitulos[1][7]=$rowTitulos['sWeb'];
    	  $arTitulos[1][8]=$rowTitulos['sSlogan'];
    	  
       }
      else
         $this->configExiste="no";

	mysql_free_result($qryTitulos);
   }

   function fnImprimeTitulo()
   {
      global $pdf ; 	
      global $arTitulos, $link, $sContrato, $sNumeroOrden, $sNumeroGenerador;
	  global $sFirmante1, $sFirmante2, $sFirmante3, $sFirmante4, $sFirmante5, $sFirmante6, $sFirmante7, $sFirmante8, $sFirmante9, $sFirmante10 ;
	  global $sPuesto1, $sPuesto2, $sPuesto3, $sPuesto4, $sPuesto5,  $sPuesto6,  $sPuesto7,  $sPuesto8,  $sPuesto9, $sPuesto10 ;
      global $MultiOrdenes ;
      
      $x=13;
	  $y = 11 ;	
      $tmpLimiteHoja = 278 ;
      $tmpAnchoImagen=42;
      $tmpAltoImagen=12;
      $saltopag = 12 ;

      $pdf->SetFont('Arial','B',8);          	   
      if(isset($arTitulos[1][0]) and isset($arTitulos[1][1]))
      {
         $pdf->image("photo/".$arTitulos[1][0],$x,$y,$tmpAnchoImagen,$tmpAltoImagen);
         $pdf->image("photo/".$arTitulos[1][1],$tmpLimiteHoja - $tmpAnchoImagen ,$y,$tmpAnchoImagen,$tmpAltoImagen);
      }
      $pdf->Cell($tmpLimiteHoja,$tmpAltoImagen + 7,"",1,1,'C');

      $pdf->setY($y);
      $pdf->cell($tmpAnchoImagen + 20);
      $pdf->MultiCell(($tmpLimiteHoja - ($tmpAnchoImagen + $tmpAnchoImagen + 40)),3,$arTitulos[1][4],0,'C');
      $pdf->SetFont('Arial','',5);         	   
      $pdf->setY($y + $tmpAltoImagen + 1);
      $pdf->cell($tmpLimiteHoja - ($tmpAnchoImagen + 20));
      $pdf->MultiCell($tmpAnchoImagen + 20,2,$arTitulos[1][5],0,'C');
      $pdf->setY($tmpAltoImagen + 7 + $saltopag );
      
      // Datos del Contrato

	  $PosYContrato=$pdf->getY();
	  if(!isset($xContrato))$xContrato=0.1;

      $pdf->Cell(0.1) ;
	  $pdf->setY($PosYContrato);
      $pdf->Cell($xContrato) ;
      $pdf->SetFillColor(189,184,248);
	  $pdf->Cell(20,15,'',1,0,'',1);
      $pdf->Cell( $tmpLimiteHoja - 110 ,15,"",1,0,'',0);

      // Detecto el tipo de contrato, si existen multiples ordenes lo divido, si no es normal ....
      $MultiOrdenes = 'No' ;
  	  $sqlOrdenesActivas = "Select count(o.sNumeroOrden) as iTotalOrden from ordenesdetrabajo o inner join configuracion c on (c.sContrato = o.sContrato) where o.sContrato = '$sContrato' and o.cIdStatus = c.cStatusProceso group by o.sContrato" ;
	  $QryOrdenes = mysql_query($sqlOrdenesActivas,$link);
	  if($rowOrdenes = mysql_fetch_array($QryOrdenes))
 	  		If ($rowOrdenes ['iTotalOrden'] > 1)
			     $MultiOrdenes = 'Si' ;
          mysql_free_result($QryOrdenes);

	  $pdf->setY($PosYContrato);
   	  $pdf->Cell($xContrato);
      	  $pdf->SetFont('Arial','B',7); 
	  $pdf->Cell(20,3,"CONTRATO",0,0,'L',0);
    	  $pdf->SetFont('Arial','',7);          	   
	  $pdf->Cell( $tmpLimiteHoja - 110 ,3,$arTitulos[1][3],0,1,'L',0);
	  
	  If ($MultiOrdenes == 'Si' ) 
	  {
	   	  $pdf->Cell($xContrato);
	      $pdf->SetFont('Arial','B',7);          	   
		  $pdf->Cell(20,3,"No. DE ORDEN",0,0,'L',0);
	      $pdf->SetFont('Arial','',7);          	   
		  $pdf->Cell( $tmpLimiteHoja - 110 ,3,$sNumeroOrden,0,1,'L',0);
	  }
   	  $pdf->Cell($xContrato);
          $pdf->SetFont('Arial','B',7);          	   
	  $pdf->Cell(20,6,"OBRA",0,0,'L',0);
          $pdf->SetFont('Arial','',7);          	   
	  $pdf->MultiCell( $tmpLimiteHoja - 110 ,6,$arTitulos[1][2],0,1,'J',0);

	  //Datos del Generador
  	  $sqlCaratulaGenerador = "Select e.sNumeroGenerador, e.dFechaInicio, e.dFechaFinal, e2.iNumeroEstimacion, e2.sMoneda, e2.dFechaInicio as   dFechaInicioEst, e2.dFechaFinal as dFechaFinalEst from estimaciones e inner join estimacionperiodo e2 on (e.sContrato =  e2.sContrato And e.iNumeroEstimacion = e2.iNumeroEstimacion) where e.sContrato = '$sContrato' And e.sNumeroOrden = '$sNumeroOrden' And e.sNumeroGenerador = '$sNumeroGenerador'" ;
	  $QryCaratulaGenerador = mysql_query($sqlCaratulaGenerador,$link);
	  if($rowCaratula = mysql_fetch_array($QryCaratulaGenerador))
 	  {
	      $pdf->setY($PosYContrato);	      
    	      if(!isset($xGenerador))$xGenerador = $tmpLimiteHoja - 90;
	      $pdf->SetFillColor(189,184,248);
	      $pdf->Cell($xGenerador);
	      $pdf->SetFont('Arial','B',7);          	   
	      $pdf->Cell(40,3,"No. ESTIMACION",1,0,'L',1);
	      $pdf->SetFont('Arial','',7);          	   
	      $pdf->Cell(50,3,$rowCaratula['iNumeroEstimacion'],1,1,'L',0);
	      $pdf->Cell($xGenerador);
	      $pdf->SetFont('Arial','B',7);          	   
	      $pdf->Cell(40,3,"PERIODO DE LA ESTIMACION",1,0,'L',1);
	      $pdf->SetFont('Arial','',7);          	   
	      $pdf->Cell(50,3,$rowCaratula['dFechaInicioEst']." AL ".$rowCaratula['dFechaFinalEst'],1,1,'L',0);
	      $pdf->Cell($xGenerador);
	      $pdf->SetFont('Arial','B',7);          	   
	      $pdf->Cell(40,3,"TIPO DE MONEDA",1,0,'L',1);
	      $pdf->SetFont('Arial','',7);          	   
	      $pdf->Cell(50,3,$rowCaratula['sMoneda'],1,1,'L',0);
	      $pdf->Cell($xGenerador);
	      $pdf->SetFont('Arial','B',7);          	   
              $pdf->Cell(40,3,"No. DE GENERADOR",1,0,'L',1);
	      $pdf->SetFont('Arial','',7);          	   
              $pdf->Cell(50,3,$rowCaratula['sNumeroGenerador'],1,1,'L',0);
	      $pdf->Cell($xGenerador);
	      $pdf->SetFont('Arial','B',7);          	   
              $pdf->Cell(40,3,"PERIODO DE GENERACION",1,0,'L',1);
	      $pdf->SetFont('Arial','',7);          	   
	      $pdf->MultiCell(50,3,$rowCaratula['dFechaInicio']." AL ".$rowCaratula['dFechaFinal'],1,1,'L',0);
	  }
          mysql_free_result($QryCaratulaGenerador);	
	
	  // Cabecera de las Partidas
	  $yFilaCabecera = $pdf->getY() + 2 ;
	  if(!isset($xContrato))$xContrato=0.1;

	  If ($MultiOrdenes == 'Si')	
	  {
		  $anchoPartida = 13 ;
	   	  $anchoDescripcion = 123 ;
		  $anchoUnidad = 12 ;
		  $anchoIsometrico = 30 ;
		  $anchoCantidad = 20 ;
	  }		  
	  Else
	  {
		  $anchoPartida = 13 ;
	   	  $anchoDescripcion = 153 ;
		  $anchoUnidad = 12 ;
		  $anchoIsometrico = 40 ;
		  $anchoCantidad = 20 ;
	  }		  

	  
	  $pdf->SetFont('Arial','B',7);          	   
	  $pdf->SetFillColor(237,243,216);
	  
	  $pdf->Cell($xContrato);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->MultiCell($anchoPartida,4,"PARTIDA ANEXO",1,'C',1);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPartida);
	  $pdf->MultiCell($anchoDescripcion,8,"CONCEPTO/DESCRIPCION",1,'C',1);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion);
	  $pdf->MultiCell($anchoUnidad,8,"UNIDAD",1,'C',1);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion + $anchoUnidad);
	  $pdf->MultiCell($anchoIsometrico,4,"ISOMETRICO DE REFERENCIA",1,'C',1);
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico);
	  $pdf->MultiCell($anchoCantidad,8,"CANTIDAD",1,'C',1);

	  If ($MultiOrdenes == 'Si')	
	  {
	   	  $pdf->setY($yFilaCabecera);	  
		  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico + $anchoCantidad);
		  $pdf->MultiCell(($anchoCantidad * 2),4,"ACUMULADO",1,'C',1);	  
	   	  $pdf->setY($yFilaCabecera + 4);	  
		  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico + $anchoCantidad);
		  $pdf->MultiCell($anchoCantidad,4,"POR ORDEN",1,'C',1);	  
	   	  $pdf->setY($yFilaCabecera + 4);	  
		  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico + $anchoCantidad + $anchoCantidad);
		  $pdf->MultiCell($anchoCantidad,4,"POR ANEXO",1,'C',1);	  

	   	  $pdf->setY($yFilaCabecera);	  
		  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico + $anchoCantidad + ($anchoCantidad * 2));
		  $pdf->MultiCell(($anchoCantidad * 2),4,"VOLUMEN A EJECUTAR",1,'C',1);	  
	   	  $pdf->setY($yFilaCabecera + 4);	  
		  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico + $anchoCantidad + ($anchoCantidad * 2));
		  $pdf->MultiCell($anchoCantidad,4,"POR ORDEN",1,'C',1);	  
	   	  $pdf->setY($yFilaCabecera + 4);	  
		  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico + $anchoCantidad + ($anchoCantidad * 2) + $anchoCantidad);
		  $pdf->MultiCell($anchoCantidad,4,"POR ANEXO",1,'C',1);	  
	  }
	  else	  
	  {
	   	  $pdf->setY($yFilaCabecera);	  
		  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico + $anchoCantidad);
		  $pdf->MultiCell($anchoCantidad,4,"CANTIDAD ACUMULADA",1,'C',1);	  
	   	  $pdf->setY($yFilaCabecera);	  
		  $pdf->Cell($xContrato + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico + $anchoCantidad + $anchoCantidad);
		  $pdf->MultiCell($anchoCantidad,4,"CANTIDAD ANEXO",1,'C',1);	  

	  }
   }


   function fnImprimePartidas()
   {
      global $pdf ; 	
      global $arTitulos, $link, $sContrato, $sNumeroOrden, $sNumeroGenerador, $pdf;
      global $MultiOrdenes ;
      
	  If ($MultiOrdenes == 'Si')	
	  {
		  $anchoPartida = 13 ;
	   	  $anchoDescripcion = 123 ;
		  $anchoUnidad = 12 ;
		  $anchoIsometrico = 30 ;
		  $anchoCantidad = 20 ;
	  }		  
	  Else
	  {
		  $anchoPartida = 13 ;
	   	  $anchoDescripcion = 153 ;
		  $anchoUnidad = 12 ;
		  $anchoIsometrico = 40 ;
		  $anchoCantidad = 20 ;
	  }		  
      $tmpLimiteHoja = 278 ;
      
      // busco el convenio activo cuando se imprimio el generador ...
  	  $sqlFechaGenerador = "Select dFechaFinal from estimaciones where sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden' And sNumeroGenerador = '$sNumeroGenerador'" ;
	  $QryFechaGenerador = mysql_query($sqlFechaGenerador,$link);
	  if($rowFechaGenerador = mysql_fetch_array($QryFechaGenerador))
	  {
	  	  $sqlReporteDiario = "Select sIdConvenio from reportediario where sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden' And dIdFecha = '$rowFechaGenerador[0]'" ;
		  $QryReporteDiario = mysql_query($sqlReporteDiario,$link);
		  if($rowReporteDiario = mysql_fetch_array($QryReporteDiario))
		  	  $sIdConvenio = $rowReporteDiario[0] ;
		  else
		  {
      		  $sqlConfiguracion = "SELECT sIdConvenio FROM  configuracion Where sContrato = '$sContrato'";
			  $QryConfiguracion = mysql_query($sqlConfiguracion,$link);		
  		      if($rowConfiguracion = mysql_fetch_array($QryConfiguracion))		
			  	  $sIdConvenio = $rowConfiguracion[0] ;
 		  }
  	  }
          mysql_free_result($QryFechaGenerador);

	  $yLineaOriginal = $pdf->getY() + 0.0 ;
	  $yLineaAnterior= $yLinea = $yLineaOriginal ;
	  if(!isset($xColumna))$xColumna =0.1;	  
          $pdf->SetFont('Arial','',6) ;          	   
	  $pdf->SetFillColor(237,243,216) ;
	  $sNumeroActividad = '' ;
	  $TotalPartida = 0.0000 ;
	  $CuerpoPartida = 160 ;
      	  $anchoCaracter = 0 ;
          $height = 4.5 ;
  	  $sqlPartidasGenerador = "Select e.iConsecutivo, a.sNumeroActividad, a.sMedida, a.dCantidadAnexo, a.mDescripcion, e1.sIsometrico, e1.sPrefijo, e1.dCantidad, e1.iOrdenCambio from estimaciones e INNER JOIN estimacionxpartida e1 ON (e.sContrato = e1.sContrato And e.sNumeroOrden = e1.sNumeroOrden And e.sNumeroGenerador = e1.sNumeroGenerador) INNER JOIN estimacionperiodo e2 on (e.sContrato =  e2.sContrato And e.iNumeroEstimacion = e2.iNumeroEstimacion) INNER JOIN actividadesxanexo a ON (e1.sContrato = a.sContrato and e1.sNumeroActividad = a.sNumeroActividad and a.sIdConvenio = '$sIdConvenio') where e.sContrato = '$sContrato' And e.sNumeroOrden = '$sNumeroOrden' And e.sNumeroGenerador = '$sNumeroGenerador' Order By a.iItemOrden, e1.sIsometrico, e1.sPrefijo" ;      
          $qryPartidas = mysql_query($sqlPartidasGenerador,$link);
          while($rowPartidas = mysql_fetch_array($qryPartidas))
          {
  	 	If ($sNumeroActividad != $rowPartidas['sNumeroActividad']) 
   	      	{
		  	If ($sNumeroActividad != "")     
		  	{
		      		$pdf->SetFont('Arial','B',6);          	   
	  		  	$pdf->SetFillColor(237,243,216) ;
			     	If ($yLineaIsometrico >= $yLinea )
			     	{
				  	$pdf->setY($yLineaIsometrico);	  
		 		  	$pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad  );
				  	$pdf->Cell($anchoIsometrico,$height,'TOTAL A GENERAR' ,1,1,'C',1);
				     	$pdf->setY($yLineaIsometrico);	  
				  	$pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico );
					$pdf->Cell($anchoCantidad,$height,$TotalPartida,1,1,'R',1);
				  	$pdf->setY($yLineaAnterior) ;
				  	$pdf->Cell($tmpLimiteHoja, $yLineaIsometrico - $yLineaAnterior + $height,"",1,1,'C');
				  	$yLinea = $yLineaIsometrico + $height ;
				}
			  	else	
			   	{
				  	$pdf->setY($yLinea - $height);	  
				  	$pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad  );
					$pdf->Cell($anchoIsometrico,$height,'TOTAL A GENERAR' ,1,1,'C',1);
				   	$pdf->setY($yLinea - $height);	  
					$pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico );
					$pdf->Cell($anchoCantidad,$height,$TotalPartida,1,1,'R',1);	
					$pdf->setY($yLineaAnterior) ;
					$pdf->Cell($tmpLimiteHoja, $yLinea - $yLineaAnterior,"",1,1,'C');
				}
	   			$TotalPartida = 0 ;
				//Verificar si es nueva pagina ...
		          	If (($yLinea + (strlen(trim($rowPartidas['mDescripcion'])) * $anchoCaracter)) > $CuerpoPartida) 
	    	      		{
					$pdf->AddPage('L');
					$pdf->fnLeeConfiguracion($sContrato);
					$pdf->fnImprimeTitulo();
					$yLineaIsometrico = $yLineaAnterior = $yLinea = $yLineaOriginal ; ;				
  				}
  			}	

    			$yLineaIsometrico = $yLinea ;
			$sNumeroActividad = $rowPartidas['sNumeroActividad'] ;	   	   

              		$pdf->SetFont('Arial','',6);          	   
		     	$pdf->setY($yLinea);	  
		  	$pdf->Cell($xColumna);
			$pdf->Cell($anchoPartida,$height,$rowPartidas['sNumeroActividad'],0,0,'C',0);
		   	$pdf->setY($yLinea);	  
			$pdf->Cell($xColumna + $anchoPartida);
    		  	$yLineaAnterior = $pdf->getY() ;
			$pdf->MultiCell($anchoDescripcion,$height,trim($rowPartidas['mDescripcion']),0,'J',0);
     	      		$yIncremento = $pdf->getY() - $yLineaAnterior ;   
	   	      	If ($anchoCaracter == 0 )
				$anchoCaracter = ($yIncremento / strlen(trim($rowPartidas['mDescripcion']))) ;
			  
		   	$pdf->setY($yLinea);	  
			$pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion);
			$pdf->Cell($anchoUnidad,$height,$rowPartidas['sMedida'],0,0,'C',0);


			// Acumulado de Partidas por Orden y por Contrato ...
			If ($MultiOrdenes == 'Si')	
			{
		    		$sqlAcumPartida = "Select sum(dCantidad) as dCantidad From actividadesxorden Where sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden' And sIdConvenio = '$sIdConvenio' And sNumeroActividad = '$rowPartidas[1]' And sTipoActividad = 'Actividad' group by sNumeroActividad" ;
				$QryAcumPartida = mysql_query($sqlAcumPartida,$link);
				if($rowAcumPartida = mysql_fetch_array($QryAcumPartida))
				  	$AcumPartida = $rowAcumPartida['dCantidad'] ;
				else	
				  	$AcumPartida = 0 ;			  
				mysql_free_result($QryAcumPartida);
			   	$pdf->setY($yLinea);	  
				$pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico + $anchoCantidad + $anchoCantidad + $anchoCantidad);
				$pdf->Cell($anchoCantidad,$height,$AcumPartida ,0,0,'R',0);	  
		  	}
			  
			$pdf->setY($yLinea);	  
			If ($MultiOrdenes == 'Si')	
				$pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico + $anchoCantidad + $anchoCantidad + $anchoCantidad + $anchoCantidad);
			Else
				$pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico + $anchoCantidad + $anchoCantidad);
			$pdf->Cell($anchoCantidad,$height,$rowPartidas['dCantidadAnexo'],0,0,'R',0);	
  
		      	$pdf->SetFont('Arial','B',6);          	   
			If ($MultiOrdenes == 'Si')	
			{
				// Acumulado Generado de la Orden de Trabajo	
		    	  	$sqlAcumxOrden = "Select Sum(e1.dCantidad) as dAcumulado From estimaciones e INNER JOIN estimacionxpartida e1 ON (e.sContrato = e1.sContrato And e.sNumeroOrden = e1.sNumeroOrden And e.sNumeroGenerador = e1.sNumeroGenerador And e1.sNumeroActividad = '$rowPartidas[1]') Where e.sContrato = '$sContrato' And e.sNumeroOrden = '$sNumeroOrden' And e.iConsecutivo <= '$rowPartidas[0]' Group By e1.sNumeroActividad" ;
				$QryAcumxOrden = mysql_query($sqlAcumxOrden,$link);
				if($rowAcumxOrden = mysql_fetch_array($QryAcumxOrden))
					$AcumxOrden = $rowAcumxOrden['dAcumulado'] ;
				else	
			  		$AcumxOrden = 0 ;
				mysql_free_result($QryAcumxOrden);
			   	$pdf->setY($yLinea);	  
				$pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico + $anchoCantidad);
				If ($AcumxOrden >= $AcumPartida ) 
					$pdf->SetTextColor(255,0,0) ;
				$pdf->Cell($anchoCantidad,$height,$AcumxOrden,0,0,'R',0);	  
				$pdf->SetTextColor(0,0,0) ;		
				  
			}
			  
			// Acumulado Generado por Todo el Contrato
	    	  	$sqlAcumxContrato = "Select Sum(e1.dCantidad) as dAcumulado From estimaciones e INNER JOIN estimacionxpartida e1 ON (e.sContrato = e1.sContrato And e.sNumeroOrden = e1.sNumeroOrden And e.sNumeroGenerador = e1.sNumeroGenerador And e1.sNumeroActividad = '$rowPartidas[1]') Where e.sContrato = '$sContrato' And e.iConsecutivo <= '$rowPartidas[0]' Group By e1.sNumeroActividad" ;
			$QryAcumxContrato = mysql_query($sqlAcumxContrato,$link);
			if($rowAcumxContrato = mysql_fetch_array($QryAcumxContrato))
				$AcumxContrato = $rowAcumxContrato['dAcumulado'] ;
			else	
			  	$AcumxContrato = 0 ;			  
			mysql_free_result($QryAcumxContrato);  		
			If ($AcumxContrato >= $rowPartidas['dCantidadAnexo'] ) 
				$pdf->SetTextColor(255,0,0) ;

		   	$pdf->setY($yLinea);	  
			If ($MultiOrdenes == 'Si')	
				$pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico + $anchoCantidad + $anchoCantidad);
			Else
				$pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico + $anchoCantidad );
			$pdf->Cell($anchoCantidad,$height,$AcumxContrato,0,0,'C',0);	  

			$pdf->SetTextColor(0,0,0) ;		
			$pdf->SetFont('Arial','',6);          	   
        	  	$yLinea = $yLinea + $yIncremento ;			  
	      	}
	      	else
		{
	    		//Verificamos si es ya otra pagina ...
	          	If ($yLineaIsometrico >= $CuerpoPartida) 
	          	{
				$pdf->setY($yLineaAnterior) ;	    	       
				$pdf->Cell($tmpLimiteHoja, $yLineaIsometrico - $yLineaAnterior + $height,"",1,1,'C');				
				$pdf->AddPage('L');
				$pdf->fnLeeConfiguracion($sContrato);
				$pdf->fnImprimeTitulo();
				$yLineaIsometrico = $yLineaAnterior = $yLinea = $yLineaOriginal ;				
  			}
   		}
	      
	      	$pdf->SetFont('Arial','I',6);
	      
	   	$pdf->setY($yLineaIsometrico);	  
		$pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad  );
		If ($rowPartidas['sPrefijo'] != '') 
			$pdf->Cell($anchoIsometrico,$height,$rowPartidas['sIsometrico'] . '-' . $rowPartidas['sPrefijo'],0,0,'L',1) ;
		Else
			$pdf->Cell($anchoIsometrico,$height,$rowPartidas['sIsometrico'] ,0,0,'L',0);
	   	
		$pdf->setY($yLineaIsometrico);	  
		$pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico );
		$pdf->Cell($anchoCantidad,$height,$rowPartidas['dCantidad'],0,0,'R',0);	
		$TotalPartida = $TotalPartida + $rowPartidas['dCantidad'] ;
		$yLineaIsometrico = $yLineaIsometrico + $height ;      
		$pdf->SetFont('Arial','',6);
	}	
	
	// Cerramos el cuadro de la ultima partida
	if ( $TotalPartida <> 0 )	   	       
	{
		$pdf->SetFont('Arial','B',6);          	   
		$pdf->SetFillColor(237,243,216) ;

		If ($yLineaIsometrico >= $yLinea)
		{
			  $pdf->setY($yLineaIsometrico);	  
			  $pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad  );
			  $pdf->Cell($anchoIsometrico,$height,'TOTAL A GENERAR' ,1,0,'C',1);
		   	  $pdf->setY($yLineaIsometrico);	  
			  $pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico );
			  $pdf->Cell($anchoCantidad,$height,$TotalPartida,1,0,'R',1);
			  $pdf->setY($yLineaAnterior) ;
			  $pdf->Cell($tmpLimiteHoja, $yLineaIsometrico - $yLineaAnterior + $height,"",1,1,'C');
		    }
   		    else	
 	   	    {
			  $pdf->setY($yLinea - $height);	  
			  $pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad  );
			  $pdf->Cell($anchoIsometrico,$height,'TOTAL A GENERAR' ,1,0,'C',1);
		   	  $pdf->setY($yLinea - $height);	  
			  $pdf->Cell($xColumna + $anchoPartida + $anchoDescripcion + $anchoUnidad + $anchoIsometrico );
			  $pdf->Cell($anchoCantidad,$height,$TotalPartida,1,0,'R',1);	
			  $pdf->setY($yLineaAnterior) ;
			  $pdf->Cell($tmpLimiteHoja, $yLinea - $yLineaAnterior,"",1,1,'C');
		    }
	     }
	     mysql_free_result($qryPartidas);	   
   }

   function fnEliminaConfiguracion()
   {
      global $arTitulos;
      if(isset($arTitulos[1][0]) and isset($arTitulos[1][1]))
      {
    	   unlink("photo/".$arTitulos[1][0]);
         unlink("photo/".$arTitulos[1][1]); 
      }
   }


   function Footer()
   {	
        global $pdf, $sContrato, $sNumeroOrden, $sNumeroGenerador, $link ;     
	    global $arTitulos ; 
	  // Firmas del Generador
	  $yFilaFirmas = 160 ;
      $sqlFechaGenerador = "Select dFechaFinal from estimaciones where sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden' And sNumeroGenerador = '$sNumeroGenerador'" ;
	    $QryFechaGenerador = mysql_query($sqlFechaGenerador,$link);
 	    if($rowFechaGenerador = mysql_fetch_array($QryFechaGenerador))
 	         fnFirmasAutorizadas ( $sContrato, $sNumeroOrden, $rowFechaGenerador['dFechaFinal'], 172, 'L') ;

	    $pdf->SetFont('Arial','I',5);
		$pdf->SetY(-15);
	    $pdf->Cell(0,3,$arTitulos[1][6],0,0,'L',0);
		$pdf->SetY(-12);
	    $pdf->Cell(0,3,$arTitulos[1][7],0,0,'L',0);
		$pdf->SetY(-15);
	    $pdf->Cell(0,3,$arTitulos[1][8],0,0,'R',0);
		$pdf->SetY(-10);
   	    $pdf->Cell(0,3,'Pagina '.$pdf->pageno().' de {nb}',0,0,'C',0);
	}
   function checaExistencia()
   {
      return $this->configExiste;
   }
}
 
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage('L');
$pdf->fnLeeConfiguracion($sContrato);
if($pdf->checaExistencia()=="si")
{
   $pdf->fnImprimeTitulo();
   $pdf->fnImprimePartidas();
   $pdf->fnEliminaConfiguracion();
}
else
{
   $pdf->SetFont('Arial','B',28);          	   
   $pdf->cell(50);
   $pdf->Cell(190,150,'NO EXISTE CONFIGURACION' ,1,0,'C',0);
}
//$pdf->Output('CaratuladeGenerador.pdf','D'); 
$pdf->Output(); 

?>
