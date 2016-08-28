<?php
include "../fpdf153/fpdf.php";
include "rpt_encabezado_Pie.php";
//require("../../../../Servidor.php");
require("../../../../../Modulos/include/escalarImagen.php");
require("../../../../../Modulos/include/mysql.inc.php");
if (isset($_SESSION['ssContrato'])) $sContrato=$_SESSION['ssContrato'] ;
if(isset($_REQUEST['sContrato']))$sContrato=$_REQUEST['sContrato'];
if(isset($_REQUEST['sNumeroOrden']))$sNumeroOrden=$_REQUEST['sNumeroOrden'];
if(isset($_REQUEST['sNumeroGenerador']))$sNumeroGenerador=$_REQUEST['sNumeroGenerador'];
$sIdConvenio = '' ;
include "utilGeneral.php";

class numeroGeneradoresCiaPDF extends PDF
{
   var $configExiste;

   function header(){}

   function checaExistencia()
   {
      return $this->configExiste;
   }

   function fnLeeConfiguracion($sContrato)
   {
      global $arTitulos,$link;
      global $sContrato ;
      $sqlTitulo = "SELECT c.bImagen, c.sContrato, c.sNombre, c.sPiePagina, c.sEmail, c.sWeb, c.sSlogan, c.sFirmasElectronicas, c2.mDescripcion, c2.mCliente, c2.bImagen AS bImagenPEP FROM  contratos c2 INNER JOIN configuracion c ON (c.sContrato = c2.sContrato) Where c2.sContrato = '$sContrato'";
      
      $qryTitulos = mysql_query($sqlTitulo,$link);
      $this->configExiste="no";
      while($rowTitulos = mysql_fetch_array($qryTitulos))
      {
          $recorteAlto = 1200;
             $recorteAncho = 200 ;
         $this->configExiste="si";
         $arTitulos[1][0]= $rowTitulos[1]."_Cliente.jpg"; 
         $fp = fopen("./photo/".$arTitulos[1][0],"w+");
         fwrite($fp, $rowTitulos[10]);
         thumbjpegXY("./photo/".$arTitulos[1][0],$recorteAlto, $recorteAncho,"./photo/".$arTitulos[1][0]);
        fclose($fp); 
         $arTitulos[1][1]=$rowTitulos[1]."_Contratista.jpg";
         $fp = fopen("./photo/".$arTitulos[1][1],"w+");
        fwrite($fp, $rowTitulos[0]);
         thumbjpegXY("./photo/".$arTitulos[1][1],$recorteAlto, $recorteAncho,"./photo/".$arTitulos[1][1]);
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
      global $arTitulos, $link, $sContrato, $sNumeroOrden, $sNumeroGenerador, $sIdConvenio;
     global $sFirmante1, $sFirmante2, $sFirmante3, $sFirmante4, $sFirmante5, $sFirmante6, $sFirmante7, $sFirmante8, $sFirmante9, $sFirmante10 ;
     global $sPuesto1, $sPuesto2, $sPuesto3, $sPuesto4, $sPuesto5,  $sPuesto6,  $sPuesto7,  $sPuesto8,  $sPuesto9, $sPuesto10 ;
      
      
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
   
     $sDescripcion = '' ;
     $sqlActa = "SELECT sDescripcion FROM  convenios Where sContrato = '$sContrato' and sIdConvenio = '$sIdConvenio'";
     $qryActa = mysql_query($sqlActa,$link);    
     if($rowActa = mysql_fetch_array($qryActa))    
        $sDescripcion = $rowActa[0] ;
   

      
      $x=13;
     $y = 11 ; 
      $tmpLimiteHoja = 195;
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

      $pdf->setY($pdf->getY() + 3);
     $PosYContrato=$pdf->getY();
           
      $pdf->SetFont('Arial','B',8);                
      $pdf->SetFillColor(189,184,248);
      $pdf->Cell(60, 6 ,"NUMEROS GENERADORES",1,0,'C',1);
      $pdf->setY($PosYContrato);
      $pdf->Cell(60) ;
      $pdf->SetFont('Arial','B',6);                
      $pdf->MultiCell($tmpLimiteHoja - 60, 6 ,$arTitulos[1][8],1,'R',0);

      $pdf->setY($pdf->getY() + 1);
     $PosYContrato=$pdf->getY();
     if(!isset($xContrato))$xContrato=0.1 ;

     $yDescripcion = $pdf->getY();
     $pdf->MultiCell( $tmpLimiteHoja - 90 ,3/*13.5*/ ,$arTitulos[1][2],0,'L',0);
     $pdf->Rect(10,$yDescripcion,110,27);

      $pdf->Cell(0.1) ;
     $pdf->setY($PosYContrato);


     //Datos del Generador
     $sqlCaratulaGenerador = "Select e.iSemana, e.sNumeroGenerador, e.dFechaInicio, e.dFechaFinal, e2.iNumeroEstimacion, e2.sMoneda, e2.dFechaInicio as   dFechaInicioEst, e2.dFechaFinal as dFechaFinalEst from estimaciones e inner join estimacionperiodo e2 on (e.sContrato =  e2.sContrato And e.iNumeroEstimacion = e2.iNumeroEstimacion) where e.sContrato = '$sContrato' And e.sNumeroOrden = '$sNumeroOrden' And e.sNumeroGenerador = '$sNumeroGenerador'" ;
     $QryCaratulaGenerador = mysql_query($sqlCaratulaGenerador,$link);
     if($rowCaratula = mysql_fetch_array($QryCaratulaGenerador))
     {
         $pdf->setY($PosYContrato);
        if(!isset($xGenerador))$xGenerador = $tmpLimiteHoja - 90;
         $pdf->SetFillColor(189,184,248);
           $pdf->Cell($xGenerador);
         $pdf->SetFont('Arial','B',6);                
        $pdf->Cell(40,3,"No. ESTIMACION",1,0,'L',1);
         $pdf->SetFont('Arial','',6);              
        $pdf->Cell(50,3,$rowCaratula['iNumeroEstimacion'],1,1,'L',0);
           $pdf->Cell($xGenerador);
         $pdf->SetFont('Arial','B',6);                
        $pdf->Cell(40,3,"PERIODO DE LA ESTIMACION",1,0,'L',1);
         $pdf->SetFont('Arial','',6);              
        $pdf->Cell(50,3,$rowCaratula['dFechaInicioEst']." AL ".$rowCaratula['dFechaFinalEst'],1,1,'L',0);
           $pdf->Cell($xGenerador);
         $pdf->SetFont('Arial','B',5);
        $pdf->Cell(8,3,"ANEXO",1,0,'L',1);
         $pdf->SetFont('Arial','',5);
        $pdf->Cell(42,3,$sDescripcion,1,0,'L',0);
         $pdf->SetFont('Arial','B',5);
        $pdf->Cell(20,3,"TIPO DE MONEDA",1,0,'L',1);
         $pdf->SetFont('Arial','',5);
        $pdf->Cell(20,3,$rowCaratula['sMoneda'],1,1,'L',0);
           $pdf->Cell($xGenerador);
         $pdf->SetFont('Arial','B',6);                
        $pdf->Cell(40,3,"No. DE ORDEN",1,0,'L',1);
         $pdf->SetFont('Arial','',6);              
        $pdf->Cell(50,3,$sNumeroOrden,1,1,'L',0);
           $pdf->Cell($xGenerador);
         $pdf->SetFont('Arial','B',6);                
        $pdf->Cell(40,6,"SEMANA",1,0,'L',1);
         $pdf->SetFont('Arial','',6);              
        $pdf->MultiCell(50,3,"SEMANA #" . $rowCaratula['iSemana'] . " GENERADOR No. " . $sNumeroGenerador . " DEL " .$rowCaratula['dFechaInicio']." AL ".$rowCaratula['dFechaFinal'],1,1,'L',0);
           $pdf->Cell($xGenerador);
         $pdf->SetFont('Arial','B',6);                
        $pdf->Cell(40,6,"FASE DE LA OBRA",1,0,'L',1);
         $pdf->SetFont('Arial','',6);              
        $pdf->MultiCell(50,6,"",1,'L',0);
           $pdf->Cell($xGenerador);
         $pdf->SetFont('Arial','B',6);                
        $pdf->Cell(40,3,"DIBUJO DE REFERENCIA",1,0,'L',1);
         $pdf->SetFont('Arial','',6);    
        $pdf->Cell(50,3,"",1,1,'L',0);
        
     }
   
     // Cabecera de las Partidas
     $yFilaCabecera = $pdf->getY() + 2 ;
     if(!isset($xContrato))$xContrato=0.1;
     
        $pdf->setY($yFilaCabecera);   
     $pdf->Cell($xContrato);
     $pdf->SetFont('Arial','B',7);              
     $pdf->SetFillColor(237,243,216);

     $anchoPartida = 13 ;
        $anchoDescripcion = 125;
     $anchoUnidad = 12 ;
     $anchoIsometrico = 30 ;
     $anchoCantidad = 15 ;
     
        $pdf->setY($yFilaCabecera);   
     $pdf->Cell($xContrato);
     $pdf->MultiCell($anchoIsometrico,3,"PLANO REFERENCIA PEMEX",1,'C',1);
        $pdf->setY($yFilaCabecera);   
     $pdf->Cell($xContrato + $anchoIsometrico);
     $pdf->MultiCell($anchoPartida,3,"PARTIDA ANEXO",1,'C',1);
        $pdf->setY($yFilaCabecera);   
     $pdf->Cell($xContrato + $anchoIsometrico + $anchoPartida);
     $pdf->Cell($anchoDescripcion,6,"CONCEPTO/DESCRIPCION",1,0,'C',1);
        $pdf->setY($yFilaCabecera);   
     $pdf->Cell($xContrato + $anchoIsometrico + $anchoPartida + $anchoDescripcion);
     $pdf->Cell($anchoUnidad,6,"UNIDAD",1,0,'C',1);
        $pdf->setY($yFilaCabecera);   
     $pdf->Cell($xContrato + $anchoIsometrico + $anchoPartida + $anchoDescripcion + $anchoUnidad );
     $pdf->Cell($anchoCantidad,6,"CANTIDAD",1,0,'C',1);
   }


   function fnImprimePartidas()
   {
      global $pdf ;  
      global $arTitulos, $link, $sContrato, $sNumeroOrden, $sNumeroGenerador, $sIdConvenio, $pdf;
      
     $anchoPartida = 13 ;
        $anchoDescripcion = 125;
     $anchoUnidad = 12 ;
     $anchoIsometrico = 30 ;
     $anchoCantidad = 15 ;
      $tmpLimiteHoja = 195 ;

     $yLineaOriginal = $pdf->getY() + 6 ;
     $yLineaAnterior= $yLinea = $yLineaOriginal ;
     if(!isset($xColumna))$xColumna =0.1;   
      $pdf->SetFont('Arial','',5) ;                
     $pdf->SetFillColor(237,243,216) ;
     $sIsometricoReferencia = '' ;
     $sNumeroActividad = '' ;
     $sIsometricos = '' ;
     $dCantidad = 0 ;
     $TotalPartida = 0.0000 ;
     $CuerpoPartida = 230 ;
      $anchoCaracter = 0 ;
     $sqlPartidasGenerador = "Select e.iConsecutivo, e.mComentarios, e.sFaseObra, a.sNumeroActividad, a.sMedida, a.dCantidadAnexo, a.mDescripcion, e1.sIsometrico, e1.sPrefijo, e1.sIsometricoReferencia, e1.dCantidad, e1.iOrdenCambio from estimaciones e 
INNER JOIN estimacionxpartida e1 ON (e.sContrato = e1.sContrato And e.sNumeroOrden = e1.sNumeroOrden And e.sNumeroGenerador = e1.sNumeroGenerador) 
INNER JOIN estimacionperiodo e2 on (e.sContrato =  e2.sContrato And e.iNumeroEstimacion = e2.iNumeroEstimacion) 
INNER JOIN actividadesxanexo a ON (e1.sContrato = a.sContrato and e1.sNumeroActividad = a.sNumeroActividad and a.sIdConvenio = '$sIdConvenio' and a.sTipoActividad = 
'Actividad') 
where e.sContrato = '$sContrato' And e.sNumeroOrden = '$sNumeroOrden' And e.sNumeroGenerador = '$sNumeroGenerador' Order By  e1.sIsometrico, e1.sPrefijo, a.iItemOrden, e1.sIsometricoReferencia" ;      
      $qryPartidas = mysql_query($sqlPartidasGenerador,$link);
      while($rowPartidas = mysql_fetch_array($qryPartidas))
      {
           If ($sIsometricoReferencia != ($rowPartidas['sIsometrico'] . ' ' . $rowPartidas['sPrefijo'])) 
            {
            If ($sIsometricoReferencia != "")
            {
               If ($sIsometricos != "")
               {
                  $pdf->setY($yLineaAnterior);    
                   $pdf->Cell($xColumna);
                  $pdf->MultiCell($anchoIsometrico,3,$sIsometricos ,0,'L',0) ;
                  
                      $pdf->setY($yLineaAnterior);   
                   $pdf->Cell($xColumna + $anchoIsometrico + $anchoPartida + $anchoDescripcion + $anchoUnidad);
                   $pdf->Cell($anchoCantidad,3,$dCantidad,0,0,'R',0);   
                  
                  $sIsometricos = '' ;
                  $dCantidad = 0 ;
               }

               $pdf->AddPage('');
               $pdf->fnLeeConfiguracion($sContrato);
               $pdf->fnImprimeTitulo();
               $yLineaAnterior = $yLinea = $yLineaOriginal ;      
            }
              $pdf->SetFont('Arial','',5);    
            $pdf->setY($yLineaOriginal - 17) ;
                $pdf->Cell(145);
             $pdf->MultiCell(50,3,$rowPartidas['sFaseObra'],0,'L',0);

            $pdf->setY($yLineaOriginal - 11) ;
                $pdf->Cell(145);
             $pdf->Cell(50,3,($rowPartidas['sIsometrico'] . ' ' . $rowPartidas['sPrefijo']) ,0,0,'L',0);

              $pdf->SetFont('Arial','',6);    

            $sIsometricoReferencia = ($rowPartidas['sIsometrico'] . ' ' . $rowPartidas['sPrefijo']) ;
             $sIsometricos = '' ;
            $sNumeroActividad = '' ;
        }             
            If ($sNumeroActividad != $rowPartidas['sNumeroActividad'])   
            {
             //Ve rificamos si es ya otra pagina ...
             If (($yLinea + (strlen(trim($rowPartidas['mDescripcion'])) * $anchoCaracter)) > $CuerpoPartida) 
             {
              If ($sIsometricos != "")
              {
                $pdf->setY($yLineaAnterior);   
                $pdf->Cell($xColumna);
               $pdf->MultiCell($anchoIsometrico,3,$sIsometricos ,0,'L',0) ;
               
                   $pdf->setY($yLineaAnterior);   
                $pdf->Cell($xColumna + $anchoIsometrico + $anchoPartida + $anchoDescripcion + $anchoUnidad);
                $pdf->Cell($anchoCantidad,3,$dCantidad,0,0,'R',0);   
               
               $sIsometricos = '' ;
               $dCantidad = 0 ;
               
              }

              $pdf->AddPage('');
              $pdf->fnLeeConfiguracion($sContrato);
              $pdf->fnImprimeTitulo();
              $yLineaAnterior = $yLinea =  $yLineaOriginal ;            
               $pdf->SetFont('Arial','',5);    
              $pdf->setY($yLineaOriginal - 17) ;
                 $pdf->Cell(145);
              $pdf->MultiCell(50,3,$rowPartidas['sFaseObra'],0,'L',0);

              $pdf->setY($yLineaOriginal - 11) ;
                 $pdf->Cell(145);
              $pdf->Cell(50,3,($rowPartidas['sIsometrico'] . ' ' . $rowPartidas['sPrefijo']),0,0,'L',0);
                $pdf->SetFont('Arial','',6);    
              
           }
           else
              If ($sIsometricos != "")
              {
                    $pdf->setY($yLineaAnterior);     
                 $pdf->Cell($xColumna);
                 $pdf->MultiCell($anchoIsometrico,3,$sIsometricos ,0,'L',0) ;
                 
                     $pdf->setY($yLineaAnterior);    
                  $pdf->Cell($xColumna + $anchoIsometrico + $anchoPartida + $anchoDescripcion + $anchoUnidad);
                  $pdf->Cell($anchoCantidad,3,$dCantidad,0,0,'R',0); 
              }   
             $pdf->SetFont('Arial','',6);                
              $pdf->setY($yLinea);    
           $pdf->Cell($xColumna + $anchoIsometrico);
           $pdf->Cell($anchoPartida,3,$rowPartidas['sNumeroActividad'],0,0,'C',0);
   
              $pdf->setY($yLinea);    
           $pdf->Cell($xColumna + $anchoIsometrico + $anchoPartida);
           $yLineaAnterior = $pdf->getY() ;
           $pdf->MultiCell($anchoDescripcion,3,trim($rowPartidas['mDescripcion']),0,'J',0);
               $yIncremento = $pdf->getY() - $yLineaAnterior ;   
               If ($anchoCaracter == 0 )
              $anchoCaracter = ($yIncremento / strlen(trim($rowPartidas['mDescripcion']))) ;
                       
              
              $pdf->setY($yLinea);    
           $pdf->Cell($xColumna + $anchoIsometrico + $anchoPartida + $anchoDescripcion);
           $pdf->Cell($anchoUnidad,3,$rowPartidas['sMedida'],0,0,'C',0);
              
              $yLinea = $yLinea + $yIncremento ;           
              $pdf->setY($yLineaAnterior);     
            $pdf->Cell($tmpLimiteHoja, $yIncremento ,"",1,1,'C');          
            $sNumeroActividad = $rowPartidas['sNumeroActividad'] ;
            $sIsometricos = '' ;
            $dCantidad = 0 ;
         } 
         
         $dCantidad = $dCantidad + $rowPartidas['dCantidad'] ;
         
          If ($sIsometricos != '') 
            $sIsometricos = $sIsometricos . ', ' . $rowPartidas['sIsometricoReferencia']  ;
         Else
               $sIsometricos = $rowPartidas['sIsometricoReferencia']  ;
      }  
           If ($sIsometricos != "")
           {
                $pdf->setY($yLineaAnterior);
                $pdf->Cell($xColumna);
                                                $pdf->MultiCell($anchoIsometrico,3,$sIsometricos ,0,'L',0) ;

                                            $pdf->setY($yLineaAnterior);
                                            $pdf->Cell($xColumna + $anchoIsometrico + $anchoPartida + $anchoDescripcion + $anchoUnidad);
                                            $pdf->Cell($anchoCantidad,3,$dCantidad,0,0,'R',0);

                                                $sIsometricos = '' ;
                                                $dCantidad = 0 ;
                                        }

   }

   function fnEliminaConfiguracion()
   {
      global $arTitulos;
     unlink("photo/".$arTitulos[1][0]);
        unlink("photo/".$arTitulos[1][1]); 
   }


   function Footer()
   {  
        global $pdf, $sContrato, $sNumeroOrden, $sNumeroGenerador, $link ;     
       global $arTitulos ; 
     // Firmas del Generador
      $sqlFechaGenerador = "Select lStatus,dFechaFinal from estimaciones where sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden' And sNumeroGenerador = '$sNumeroGenerador'" ;
       $QryFechaGenerador = mysql_query($sqlFechaGenerador,$link);
       if($rowFechaGenerador = mysql_fetch_array($QryFechaGenerador)){
            $lStatus =$rowFechaGenerador['lStatus'];
            fnFirmasAutorizadas ( $sContrato, $sNumeroOrden, $rowFechaGenerador['dFechaFinal'], 262, 'N') ;
       }
       $pdf->SetFont('Arial','I',5);
      $pdf->SetY(-15);
       $pdf->Cell(0,3,$arTitulos[1][6],0,0,'L',0);
      $pdf->SetY(-12);
       $pdf->Cell(0,3,$arTitulos[1][7],0,0,'L',0);
      $pdf->SetY(-15);
       $pdf->Cell(0,3,$arTitulos[1][8],0,0,'R',0);
      $pdf->SetY(-10);
      #imprimir leyenda si no estan validados/autorizados
      if($lStatus  == "Pendiente"){
         $this->SetFont('Arial','',14);
         $this->SetTextColor(130,130,130);
         $this->TextWithRotation(20,270,'Sin Validacion',30,-30);
         $this->SetTextColor(0,0,0);
      }
      if($lStatus != "Autorizado"){
         $this->SetFont('Arial','',14);
         $this->SetTextColor(130,130,130);
         $this->TextWithRotation(96,270,'Sin Autorizacion',30,-30);
          $this->SetTextColor(0,0,0);
      }
          $pdf->Cell(0,3,'Pagina '.$pdf->pageno().' de {nb}',0,0,'C',0);
   }
}
 
$pdf=new numeroGeneradoresCiaPDF();
$pdf->AliasNbPages();
$pdf->AddPage('');
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
   $pdf->Cell(160,150,'NO EXISTE CONFIGURACION' ,1,0,'C',0);
}
//$pdf->Output('Numeros Generadores CIA.pdf','D');
$name = "reports/Numeros_Generadores_CIA_$sContrato";
if(file_exists($name.".pdf")){
   $existe = true;
   $next = 1;
   while($existe){

      if(file_exists($name."_$next.pdf")){
         $next++;
      }
      else{
         $name = $name."_$next";
         $existe=false;
      }
   }
}

$pdf->Output($name.".pdf", 'F');
location($name.".pdf");
?>