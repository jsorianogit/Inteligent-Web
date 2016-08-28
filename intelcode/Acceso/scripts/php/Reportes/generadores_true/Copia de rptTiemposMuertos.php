<?php
session_start();
require("../../../../../Modulos/include/mysql.inc.php");
include "../fpdf153/fpdf.php";
//include "../../../../Servidor.php";
//if (isset($_POST['sContra']))    $sContrato=$_POST['sContra'] ;
if (isset($_SESSION['ssContrato'])) $sContrato=$_SESSION['ssContrato'] ;
if ( isset($_POST['fechaIni']))  $dFechaInicio=$_POST['fechaIni'];
if ( isset($_POST['fechaTerm'])) $dFechaFinal=$_POST['fechaTerm'] ;
/*
//if(isset($_REQUEST['sContrato']))$sContrato=$_REQUEST['sContrato'];
//if(isset($_REQUEST['dFechaInicio']))$dFechaInicio=$_REQUEST['dFechaInicio'];
//if(isset($_REQUEST['dFechaFinal']))$dFechaFinal=$_REQUEST['dFechaFinal'];
*/
/*
//$sContrato='418235943';	 
//$dFechaInicio = '2007/01/01' ;
//$dFechaFinal = '2007/01/31' ;
*/
/*
//echo $_REQUEST['sContrato']."<br>";
//echo $_REQUEST['dFechaInicio']."<br>"; 
//echo $_REQUEST['dFechaFinal']."<br>"; 
*/
/*
//echo $sContrato."<br>"; 
//echo $dFechaInicio."<br>"; 
//echo $dFechaFinal."<br>"; 
*/

$sIdConvenio = '' ;
include "../generadores/utilGeneral.php";

class PDF extends FPDF
{

   var $configExiste;

   function checaExistencia()
   {
      return $this->configExiste;
   }
   function fnLeeConfiguracion($sContrato)
   {
      global $arTitulos,$link;
      $sqlTitulo = "SELECT c.bImagen, c.sContrato, c.sNombre, c.sPiePagina, c.sEmail, c.sWeb, c.sSlogan, c.sFirmasElectronicas, c2.mDescripcion, c2.mCliente, c2.bImagen AS bImagenPEP FROM  contratos c2 INNER JOIN configuracion c ON (c.sContrato = c2.sContrato) Where c2.sContrato = '$sContrato'";
      
      $qryTitulos = mysql_query($sqlTitulo,$link);
	$this->configExiste="no";
      while($rowTitulos = mysql_fetch_array($qryTitulos))
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
   }

   function fnImprimeTitulo()
   {
      global $pdf ; 	
      global $arTitulos, $link, $sContrato, $dFechaInicio, $dFechaFinal, $sIdConvenio;
	  global $sFirmante1, $sFirmante2, $sFirmante3, $sFirmante4, $sFirmante5, $sFirmante6, $sFirmante7, $sFirmante8, $sFirmante9, $sFirmante10 ;
	  global $sPuesto1, $sPuesto2, $sPuesto3, $sPuesto4, $sPuesto5,  $sPuesto6,  $sPuesto7,  $sPuesto8,  $sPuesto9, $sPuesto10 ;
      
      
      // busco el convenio activo cuando se imprimio el generador ...
  	  $sqlReporteDiario = "Select sIdConvenio from reportediario where sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden' And dIdFecha = '$dFechaFinal'" ;
	  $QryReporteDiario = mysql_query($sqlReporteDiario,$link);
	  if($rowReporteDiario = mysql_fetch_array($QryReporteDiario))
	  	  $sIdConvenio = $rowReporteDiario[0] ;
	  else
	  {
    	  $sqlConfiguracion = "SELECT sIdConvenio FROM configuracion Where sContrato = '$sContrato'";
		  $QryConfiguracion = mysql_query($sqlConfiguracion,$link);		
  		  if($rowConfiguracion = mysql_fetch_array($QryConfiguracion))		
		  	  $sIdConvenio = $rowConfiguracion[0] ;
  	  }
  	
      $x=13;
	  $y = 11 ;	
      $tmpLimiteHoja = 278;
      $tmpAnchoImagen=35;
      $tmpAltoImagen=10;
      $saltopag = 12 ;

      $pdf->SetFont('Arial','B',7);          	   
      $pdf->image("photo/".$arTitulos[1][0],$x,$y,$tmpAnchoImagen,$tmpAltoImagen);
      $pdf->image("photo/".$arTitulos[1][1],$tmpLimiteHoja - $tmpAnchoImagen ,$y,$tmpAnchoImagen,$tmpAltoImagen);

      $pdf->Cell($tmpLimiteHoja,$tmpAltoImagen + 7,"",1,1,'C');

      $pdf->setY($y);
      $pdf->cell($tmpAnchoImagen + 20);
      $pdf->MultiCell(($tmpLimiteHoja - ($tmpAnchoImagen + $tmpAnchoImagen + 40)),3,$arTitulos[1][4],0,'C');
      $pdf->SetFont('Arial','',5);         	   
      $pdf->setY($y + $tmpAltoImagen + 1);
      $pdf->cell($tmpLimiteHoja - ($tmpAnchoImagen + 20));
      $pdf->MultiCell($tmpAnchoImagen + 20,2,$arTitulos[1][5],0,'C');

      $ysContrato = $pdf->getY() + 6;
      $pdf->setY($ysContrato);
      
	  if(!isset($xContrato))$xContrato=0.1;
      RoundedRect(10, $pdf->getY(), $tmpLimiteHoja - 91, 9, 3.50, '1111');

      $pdf->SetFont('Arial','B',7);          	   
      $pdf->SetFillColor(189,184,248);
      $pdf->setY($ysContrato - 1.5) ;
      $pdf->cell(2);
	  $pdf->Cell( 54 ,3,'CONCENTRATO DE TIEMPOS INACTIVOS',1 , 0,'L',1);
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
	  }
	
	  // Cabecera de las Partidas
	  $yFilaCabecera = $pdf->getY() + 1 ;
	  if(!isset($xContrato))$xContrato=0.1;
	  
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato);
	  $pdf->SetFont('Arial','B',6);          	   
//	  $pdf->SetFillColor(237,243,216);
      $pdf->SetFillColor(189,184,248);

	  $anchoFecha = 10 ;
	  $anchoReportes = 25 ;
	  $anchoAutorizo = 13 ;
	  $anchoHora = 9 ;
	  $anchoTituloReportes = 66;

	  $anchoSuspensiones = 155.5;
	  $anchoTipo = 30;
   	  $anchoDescripcion = 87.5 ;
	  
   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato);
	  $pdf->MultiCell($anchoFecha,6,"FECHA",1,'C',1);

   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoFecha);
	  $pdf->Cell($anchoTituloReportes,3,"REPORTES DIARIOS",1,0,'C',1);
	  
   	  $pdf->setY($yFilaCabecera + 3);	  
	  $pdf->Cell($xContrato + $anchoFecha );
	  $pdf->Cell($anchoReportes,3,"NUMERO",1,0,'C',1);
	  
   	  $pdf->setY($yFilaCabecera + 3);	  
	  $pdf->Cell($xContrato + $anchoFecha + $anchoReportes);
	  $pdf->Cell($anchoAutorizo,3,"AUTORIZO",1,0,'C',1);

   	  $pdf->setY($yFilaCabecera + 3);	  
	  $pdf->Cell($xContrato + $anchoFecha + $anchoReportes + $anchoAutorizo);
	  $pdf->Cell($anchoHora,3,"INICIO",1,0,'C',1);
	  
   	  $pdf->setY($yFilaCabecera + 3);	  
	  $pdf->Cell($xContrato + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora);
	  $pdf->Cell($anchoHora,3,"FINAL",1,0,'C',1);

   	  $pdf->setY($yFilaCabecera + 3);	  
	  $pdf->Cell($xContrato + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora);
	  $pdf->Cell($anchoHora,3,"EFECT.",1,0,'C',1);

   	  $pdf->setY($yFilaCabecera);	  
	  $pdf->Cell($xContrato + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora);
	  $pdf->Cell($anchoSuspensiones,3,"TIEMPOS INACTIVOS",1,0,'C',1);

   	  $pdf->setY($yFilaCabecera + 3);	  
	  $pdf->Cell($xContrato + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora);
	  $pdf->Cell($anchoTipo,3,"CAUSA DE SUSPENSION",1,0,'C',1);

   	  $pdf->setY($yFilaCabecera + 3);	  
	  $pdf->Cell($xContrato + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo);
	  $pdf->Cell($anchoHora,3,"INICIO",1,0,'C',1);

   	  $pdf->setY($yFilaCabecera + 3);	  
	  $pdf->Cell($xContrato + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo + $anchoHora);
	  $pdf->Cell($anchoHora,3,"FINAL",1,0,'C',1);

   	  $pdf->setY($yFilaCabecera + 3);	  
	  $pdf->Cell($xContrato + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo + $anchoHora + $anchoHora);
	  $pdf->Cell($anchoHora,3,"T. INAC.",1,0,'C',1);

   	  $pdf->setY($yFilaCabecera + 3);	  
	  $pdf->Cell($xContrato + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo + $anchoHora + $anchoHora + $anchoHora);
	  $pdf->Cell($anchoHora,3,"P.AFECT",1,0,'C',1);

   	  $pdf->setY($yFilaCabecera + 3);	  
	  $pdf->Cell($xContrato + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo + $anchoHora + $anchoHora + $anchoHora+ $anchoHora);
	  $pdf->Cell($anchoDescripcion,3,"DESCRIPCIÓN",1,0,'C',1);
	  
   	  $pdf->setY($yFilaCabecera );	  
	  $pdf->Cell($xContrato + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo + $anchoHora + $anchoHora + $anchoHora + $anchoHora + $anchoDescripcion);
	  $pdf->MultiCell($anchoHora,2,"T/M DEL SITIO",1,'C',1);

   	  $pdf->setY($yFilaCabecera );	  
	  $pdf->Cell($xContrato + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo + $anchoHora + $anchoHora + $anchoHora + $anchoHora + $anchoDescripcion+ $anchoHora );
	  $pdf->MultiCell($anchoHora + 4.5 ,2,"PERS. EN ORD. DE TRAB.",1,'C',1);

   	  $pdf->setY($yFilaCabecera );	  
	  $pdf->Cell($xContrato + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo + $anchoHora + $anchoHora + $anchoHora + $anchoHora + $anchoDescripcion+ $anchoHora + $anchoHora + 4.5 );
	  $pdf->MultiCell($anchoHora + 4.5 ,2,"PERS. X CONTRATO",1,'C',1);
	  
   	  $pdf->setY($yFilaCabecera );	  
	  $pdf->Cell($xContrato + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo + $anchoHora + $anchoHora + $anchoHora + $anchoHora + $anchoDescripcion+ $anchoHora + $anchoHora + 4.5 + $anchoHora + 4.5 );
	  $pdf->MultiCell($anchoHora + 4.5 ,2,"T. INAC. X CONTRATO",1,'C',1);
	  
       fnFirmasAutorizadas ( $sContrato, '', $dFechaFinal, 172, 'L') ;
 	    
   }

   function fnImprimePartidas()
   {
      global $pdf ; 	
      global $arTitulos, $link, $sContrato, $dFechaInicio, $dFechaFinal, $sIdConvenio, $pdf;
	  global $sfnResultHoras ;
      
	  $anchoFecha = 10 ;
	  $anchoReportes = 25 ;
	  $anchoAutorizo = 13 ;
	  $anchoHora = 9 ;
	  $anchoTipo = 30;
   	  $anchoDescripcion = 87.5;

      $tmpLimiteHoja = 278 ;

	  $yLineaAnterior= $yLinea = 46 ;
	  if(!isset($xColumna))$xColumna =0.1;	  
      $pdf->SetFont('Arial','',5) ;          	   
	  $pdf->SetFillColor(237,243,216) ;
	  $dImporteTotal = 0 ;
	  $TotalPartida = 0.0000 ;
	  $CuerpoPartida = 168 ;
      $anchoCaracter = 10 ;
      $Incremento = 0 ;
      $sTiempoTotal = '00:00' ;
  	  $sqlReportesDiarios = "Select sNumeroOrden, sNumeroReporte, dIdFecha, sIdTurno, sIdUsuarioAutoriza, sOperacionInicio, sOperacionFinal, sTiempoAdicional, sTiempoEfectivo, sTiempoMuerto, sTiempoMuertoReal, iPersonal From reportediario where sContrato = '$sContrato' And dIdFecha >= '$dFechaInicio' And dIdFecha <= '$dFechaFinal' And lStatus = 'Autorizado' And sTiempoMuertoReal <> '00:00' Order By dIdFecha, sNumeroOrden" ;      
      $qryReportes = mysql_query($sqlReportesDiarios,$link);
      while($rowReportes = mysql_fetch_array($qryReportes))
      {
          If (($yLinea + $anchoCaracter) > $CuerpoPartida) 
          {
	//		  echo ($yLinea + $anchoCaracter) ;
			  $pdf->AddPage('L');
			  $pdf->fnLeeConfiguracion($sContrato);
			  $pdf->fnImprimeTitulo();
			  $yLineaAnterior = $yLinea = 46 ;				
		      $pdf->SetFont('Arial','',5) ;          	   
		  }

		  sfnSumaHoras ( $sTiempoTotal, $rowReportes['sTiempoMuertoReal'] ) ;
		  $sTiempoTotal = $sfnResultHoras ;

	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna);
		  $pdf->Cell($anchoFecha,4,$rowReportes['dIdFecha'],0,0,'L',0);
	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna + $anchoFecha);
		  $pdf->Cell($anchoReportes,4,$rowReportes['sNumeroReporte'],0,0,'L',0);
	
	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna + $anchoFecha + $anchoReportes);
		  $pdf->Cell($anchoAutorizo,4,$rowReportes['sIdUsuarioAutoriza'],0,0,'L',0);
	
	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna + $anchoFecha + $anchoReportes + $anchoAutorizo);
		  $pdf->Cell($anchoHora,4,$rowReportes['sOperacionInicio'],0,0,'C',0);
	
	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora);
		  $pdf->Cell($anchoHora,4,$rowReportes['sOperacionFinal'],0,0,'C',0);
	
	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora);
		  $pdf->Cell($anchoHora,4,$rowReportes['sTiempoEfectivo'],0,0,'C',0);
		  
	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo + $anchoHora + $anchoHora + $anchoHora + $anchoHora + $anchoDescripcion);
		  $pdf->Cell($anchoHora,4,$rowReportes['sTiempoMuerto'],0,0,'C',0);
	
	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo + $anchoHora +	$anchoHora + $anchoHora + $anchoHora + $anchoDescripcion+ $anchoHora );
		  $pdf->Cell($anchoHora + 4.5 ,4,$rowReportes['iPersonal'],0,0,'C',0);
	
		  //Personal Real en el dia ....
		  $PersonalDiario = 0 ;
	  	  $sqlPersonal = "Select SUM(b.dCantidad) as dTotal From bitacoradepersonal b INNER JOIN bitacoradeactividades b2 ON (b.sContrato = b2.sContrato And b.dIdFecha = b2.dIdFecha and b.iIdDiario = b2.iIdDiario) INNER JOIN turnos t ON (b2.sContrato = t.sContrato And b2.sIdTurno = t.sIdTurno And t.sOrigenTierra = 'No') Where b.sContrato = '$sContrato' And b.dIdFecha = '$rowReportes[2]' Group By b2.sContrato" ;      
	      $qryPersonal = mysql_query($sqlPersonal,$link);
	  	  if($rowPersonal = mysql_fetch_array($qryPersonal))		  
	  	  		$PersonalDiario = $rowPersonal['dTotal'] ;
	   	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo + $anchoHora + $anchoHora + $anchoHora + $anchoHora + $anchoDescripcion+ $anchoHora + $anchoHora + 4.5 );
		  $pdf->Cell($anchoHora + 4.5 ,4,$PersonalDiario,0,0,'C',0);		  

	  
  	 	  $pdf->setY($yLinea);	  
		  $pdf->Cell($xColumna + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo + $anchoHora + $anchoHora + $anchoHora + $anchoHora + $anchoDescripcion+ $anchoHora + $anchoHora + 4.5 + $anchoHora + 4.5 );
		  $pdf->Cell($anchoHora + 4.5 ,4,$rowReportes['sTiempoMuertoReal'],0,0,'C',0);
		  
		  // Insertar detalle de tiempos inactivos ....

//		  $pdf->SetFillColor(237,243,216);
   		  $yLineaAnterior = $yLinea ;
	  	  $sqlTiempos = "Select t.sHoraInicio, t.sHoraFinal, t.dPersonal, t.dFrente, t.sTiempoMuerto, t.mDescripcion, tm.sDescripcion From jornadasdiarias t INNER JOIN tiposdemovimiento tm on (t.sContrato = tm.sContrato And t.sIdTipoMovimiento = tm.sIdTipoMovimiento) Where t.sContrato = '$sContrato' And t.sNumeroOrden = '$rowReportes[0]' And t.dIdFecha = '$rowReportes[2]' And t.sIdTurno = '$rowReportes[3]' And t.sTipo = 'Tiempo Inactivo'" ;      
	      $qryTiempos = mysql_query($sqlTiempos,$link);
    	  while($rowTiempos = mysql_fetch_array($qryTiempos))
	      {
			  If (( $yLineaAnterior  + $anchoCaracter) > $CuerpoPartida) 
          	  {
          	   
				  If ( $yLineaAnterior > $yLinea ) 		  
				      $Incremento = $yLineaAnterior - $yLinea ;
				  Else  
				      $Incremento = 4 ;
          	   
		 	   	  $pdf->setY($yLinea);	  
	    		  $pdf->Cell($tmpLimiteHoja, $Incremento ,"",1,0,'C');		
				  		
				  $pdf->AddPage('L');
				  $pdf->fnLeeConfiguracion($sContrato);
				  $pdf->fnImprimeTitulo();
				  $yLineaAnterior = $yLinea = 46 ;				
			      $pdf->SetFont('Arial','',5) ;          	   
			  }
	       
	       
		   	  $pdf->setY($yLineaAnterior);	  
			  $pdf->Cell($xColumna + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora );
			  $pdf->MultiCell($anchoTipo ,3 ,$rowTiempos['sDescripcion'],0,'L',0);

		   	  $pdf->setY($yLineaAnterior);	  
			  $pdf->Cell($xColumna + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo);
			  $pdf->Cell($anchoHora ,3 ,$rowTiempos['sHoraInicio'],0,0,'C',0);
			  
		   	  $pdf->setY($yLineaAnterior);	  
			  $pdf->Cell($xColumna + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo + $anchoHora);
			  $pdf->Cell($anchoHora ,3 ,$rowTiempos['sHoraFinal'],0,0,'C',0);

		   	  $pdf->setY($yLineaAnterior);	  
			  $pdf->Cell($xColumna + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo + $anchoHora + $anchoHora);
			  $pdf->Cell($anchoHora ,3 ,$rowTiempos['sTiempoMuerto'],0,0,'C',0);

		   	  $pdf->setY($yLineaAnterior);	  
			  $pdf->Cell($xColumna + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo + $anchoHora + $anchoHora + $anchoHora);
			  $pdf->Cell($anchoHora ,3 ,$rowTiempos['dFrente'],0,0,'C',0);

		   	  $pdf->setY($yLineaAnterior);	  
			  $pdf->Cell($xColumna + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo + $anchoHora + $anchoHora + $anchoHora + $anchoHora);
			  $pdf->MultiCell($anchoDescripcion ,3 ,trim($rowTiempos['mDescripcion']),0,'J',0);
			  
    		  $yLineaAnterior = $pdf->getY();
    		  
		  }	
		  // Termina detalle de Tiempos Inactivos ...
		
		  If ( $yLineaAnterior > $yLinea ) 		  
		      $Incremento = $yLineaAnterior - $yLinea ;
		  Else  
		      $Incremento = 4 ;

 	   	  $pdf->setY($yLinea);	  
	      $pdf->Cell($tmpLimiteHoja, $Incremento ,"",1,0,'C');				
		  $yLinea = $yLinea + $Incremento;		  	
	   }	

   	  $pdf->setY($yLinea );	  
	  $pdf->Cell($xContrato + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo + $anchoHora + $anchoHora + $anchoHora + $anchoHora + $anchoDescripcion+ $anchoHora );
	  $pdf->Cell($anchoHora + 4.5 + $anchoHora + 4.5 ,4,"TOTAL DE TIEMPO MUERTO",1,0,'C',1);

	  
   	  $pdf->setY($yLinea );	  
	  $pdf->Cell($xContrato + $anchoFecha + $anchoReportes + $anchoAutorizo + $anchoHora + $anchoHora + $anchoHora + $anchoTipo + $anchoHora + $anchoHora + $anchoHora + $anchoHora + $anchoDescripcion+ $anchoHora + $anchoHora + 4.5 + $anchoHora + 4.5 );
	  $pdf->Cell($anchoHora + 4.5 ,4,$sTiempoTotal,1,0,'C',1);
	
	
   }

   function fnEliminaConfiguracion()
   {
      global $arTitulos;
 	  unlink("photo/".$arTitulos[1][0]);
   	  unlink("photo/".$arTitulos[1][1]); 
   }


   function Footer()
   {	
        global $pdf ;     
	    global $arTitulos ; 
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
   $pdf->cell(10);             
   $pdf->Cell(250,150,'NO EXISTE CONFIGURACION' ,1,0,'C',0);
}
//$pdf->Output('TiemposMuertos.pdf','D'); 
$pdf->Output(); 

?>
