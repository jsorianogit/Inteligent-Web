<?php
/**
/media/hda1/wamp/www/html/intelcode/Acceso/scripts/php/Reportes/generadores_swbs/rpt_relacionPersonalEquipo.php
 * @author Adalberto Reyes Valenzuela
 * @copyright 2007
 */

/*define('FPDF_FONTPATH','../fpdf153/font/');
include "../fpdf153/fpdf.php";
require("../../../../../Modulos/include/mysql.inc.php");
require("../../../../../fnUtilerias.php");
require("../../../../../fnContrato.php");
//include "Servidor.php";
include "rpt_encabezado_Pie.php";
*/
function controlAcarreo($sContrato,$sNumeroOrden,$sIdConvenio,$dIdFecha,$sNumeroReporte,$sIdTurno)
{
        global $pdf,$link;
        $lExisteFlete = false;
        $lExisteSuministro = false;
        $sqlFletes ="
          select
                *
           from    a_controlacarreo
           where
                sContrato='$sContrato' and
                sNumeroOrden='$sNumeroOrden' and
                sIdConvenio='$sIdConvenio' and
                dIdFecha='$dIdFecha' and
                sNumeroReporte='$sNumeroReporte' and
                sIdTurno='$sIdTurno' and
                iIdAcarreo<>'' and
                sTipo='Flete';";

        $rsFletes=mysql_query($sqlFletes,$link);
        if($rwFletes=mysql_fetch_array($rsFletes))
        {
            $lExisteFlete = true;
        }
        $sqlSuministros ="
           select
                *
           from    a_controlacarreo
           where
                sContrato='$sContrato' and
                sNumeroOrden='$sNumeroOrden' and
                sIdConvenio='$sIdConvenio' and
                dIdFecha='$dIdFecha' and
                sNumeroReporte='$sNumeroReporte' and
                sIdTurno='$sIdTurno' and
                iIdAcarreo<>'' and
                sTipo='Suministro'  ;";

        $rsSuministros=mysql_query($sqlSuministros,$link);
        if($rwSuministros=mysql_fetch_array($rsSuministros))
        {
            $lExisteSuministro = true;
        }
        $pdf->ln(10);
        $pdf->SetFillColor(215,217,230);
        if($lExisteFlete or $lExisteSuministro){
           $pdf->SetFont('Arial','B',7);
           $pdf->RoundedRect($pdf->getX(), $pdf->getY()-3, 195, 6, 3.50, '1001');
           $pdf->MultiCell(195,3,"CONTROL DE ACARREO DE MATERIAL ",0,'C',1,1);
		    $pdf->SetFont('Arial','',6);			
		}
		$pdf->SetFillColor(215,217,200);
        while($lExisteFlete or $lExisteSuministro){
        	$pdf->SetFillColor(215,217,200);
           if(($pdf->getY())>=220){
           	$pdf->AddPage();
			$pdf->ln(10);
		  }
           if($lExisteFlete){
				$rellenof = 1;
				$marcof   = 1;	
		   }else{
				$rellenof = 0;
				$marcof   = 0;
		   }		
           if($lExisteSuministro){
				$rellenos = 1;
				$marcos   = 1;	
		   }else{
				$rellenos = 0;
				$marcos   = 0;
		   }		     
           
           #titulos
           $PosY=$pdf->getY()-4;
           $PosX=$pdf->getX();
           
           $pdf->SetTextColor(0,0,0);
           $pdf->SetFont('Arial','',6);
           $pdf->SetFont('Arial','B',7);
           $pdf->Cell(75,3,"FLETES",1,0,'C',1);//173,3
           $pdf->Cell(45,3,"FIRMAS",1,0,'C',1);
           $pdf->Cell(75,3,"SUMINISTROS",1,1,'C',1);
           $pdf->SetFont('Arial','',6);

           $yInfo = $pdf->getY();

           #Fletes

           $pdf->Cell(17,3,($marcof==1)?"Material":"",$marcof,0,'L',$rellenof);
           $pdf->Cell(75-17,3,$rwFletes['sMaterial'],$marcof,1,'L',0);

           $pdf->Cell(17,3,($marcof==1)?"Origen":"",$marcof,0,'L',$rellenof);
           $pdf->Cell(75-17,3,$rwFletes['sOrigen'],$marcof,1,'L',0);

           $pdf->Cell(17,3,($marcof==1)?"Propietario":"",$marcof,0,'L',$rellenof);
           $pdf->Cell(75-17,3,$rwFletes['sPropietario'],$marcof,1,'L',0);

           $pdf->Cell(17,3,($marcof==1)?"Destino":"",$marcof,0,'L',$rellenof);
           $pdf->Cell(75-17,3,$rwFletes['sDestino'],$marcof,1,'L',0);

           #Viaje de Flete
           $pdf->Cell(50);
           $pdf->Cell(25,3,($marcof==1)?"VIAJES":"",$marcof,0,'C',$rellenof);
           #Viaje de Suministro
           $pdf->Cell(95);
           $pdf->Cell(25,3,($rellenos==1)?"VIAJES":"",$marcos,1,'C',$rellenos);
           #info de Viaje de Flete
           $pdf->Cell(50);
           $pdf->Cell(12.5,3,($marcof==1)?"No.":"",$marcof,0,'C',$rellenof);
           $pdf->Cell(12.5,3,($marcof==1)?"M3":"",$marcof,0,'C',$rellenof);
           #info de viaje de Suministro
           $pdf->Cell(95);
           $pdf->Cell(12.5,3,($rellenos==1)?"No.":"",$marcos,0,'C',$rellenos);
           $pdf->Cell(12.5,3,($rellenos==1)?"M3":"",$marcos,1,'C',$rellenos);

           $yFirmas = $pdf->getY();
           #firmas
           $pdf->setY($yFirmas-18);
           $pdf->Cell(75);
           $pdf->Cell(45,3,/*$rwFletes['sFirmanteOrigen']*/"______________________________" ,0,0,'C',0);

           $pdf->setY($yFirmas-15);
           $pdf->Cell(75);
           $pdf->Cell(45,3,"CHECADOR ORIGEN",0,0,'C',0);
           
           $pdf->setY($yFirmas-10.5);
           $pdf->Cell(75);
           $pdf->Cell(45,3,/*$rwFletes['sFirmanteDestino']*/"______________________________",0,0,'C',0);

           $pdf->setY($yFirmas-7.5);
           $pdf->Cell(75);
           $pdf->Cell(45,3,"CHECADOR DESTINO",0,0,'C',0);

           $sqlInfoFlete = "select
  								av.dCantidadViajes,
  								am.dUnidad
							from
  								a_viajes av inner join a_medidasxviaje am on (av.iIdMedida = am.iIdMedida)
							where
  								av.sContrato='$sContrato'
  								and av.sNumeroOrden='$sNumeroOrden'
  								and av.sIdConvenio='$sIdConvenio'
  								and av.dIdFecha='$dIdFecha'
  								and av.sNumeroReporte='$sNumeroReporte'
  								and av.sIdTurno='$sIdTurno' and av.iIdAcarreo = '".$rwFletes['iIdAcarreo']."' ";

			
           #informacion de los fletes 
           $pdf->setY($yFirmas);
           $rsInfoFlete = mysql_query($sqlInfoFlete);
           while($rwInfoFlete = mysql_fetch_array($rsInfoFlete)){
                   #info de Viaje de Flete
                   $pdf->Cell(50);
                   $pdf->Cell(12.5,3,$rwInfoFlete["dCantidadViajes"],1,0,'C',0);
                   $pdf->Cell(12.5,3,$rwInfoFlete["dUnidad"],1,1,'C',0);
           }
           $yInfoFinal1 = $pdf->getY();
           $sqlInfoSuministro= "select
  								av.dCantidadViajes,
  								am.dUnidad
							from
  								a_viajes av inner join a_medidasxviaje am on (av.iIdMedida = am.iIdMedida)
							where
  								av.sContrato='$sContrato'
  								and av.sNumeroOrden='$sNumeroOrden'
  								and av.sIdConvenio='$sIdConvenio'
  								and av.dIdFecha='$dIdFecha'
  								and av.sNumeroReporte='$sNumeroReporte'
  								and av.sIdTurno='$sIdTurno' and av.iIdAcarreo = '".$rwSuministros['iIdAcarreo']."' ";           
           #informacion de los  suministros
           $pdf->setY($yFirmas);
           $rsInfoSuministro = mysql_query($sqlInfoSuministro);
           while($rwInfoSuministro= mysql_fetch_array($rsInfoSuministro)){
                   #info de viaje de Suministro
                   $pdf->Cell(170);
                   $pdf->Cell(12.5,3,$rwInfoSuministro["dCantidadViajes"],1,0,'C',0);
                   $pdf->Cell(12.5,3,$rwInfoSuministro["dUnidad"],1,1,'C',0);
                   $i++;
           }           
		   $yInfoFinal2 = $pdf->getY();
		   
		   ($yInfoFinal2>$yInfoFinal1)? $posy= $yInfoFinal2:$posy = $yInfoFinal1	;
           //$posy=$pdf->getY();

           $pdf->setY($yInfo);

           #Suministros
           $pdf->cell(120);
           $pdf->Cell(17,3,($rellenos==1)?"Material":"",$marcos,0,'L',$rellenos);
           $pdf->Cell(75-17,3,$rwSuministros['sMaterial'],$marcos,1,'L',0);

           $pdf->cell(120);
           $pdf->Cell(17,3,($rellenos==1)?"Origen":"",$marcos,0,'L',$rellenos);
           $pdf->Cell(75-17,3,$rwSuministros['sOrigen'],$marcos,1,'L',0);

           $pdf->cell(120);
           $pdf->Cell(17,3,($rellenos==1)?"Propietario":"",$marcos,0,'L',$rellenos);
           $pdf->Cell(75-17,3,$rwSuministros['sPropietario'],$marcos,1,'L',0);

           $pdf->cell(120);
           $pdf->Cell(17,3,($rellenos==1)?"Destino":"",$marcos,0,'L',$rellenos);
           $pdf->Cell(75-17,3,$rwSuministros['sDestino'],$marcos,1,'L',0);

           #Titulo del cuadro
           $Alto=$posy-$PosY;

           $pdf->RoundedRect($PosX, $PosY+4, 195, $Alto-4, 3.50, '0000');
           $pdf->SetY($PosY-1);
           $pdf->Cell(4);
           $pdf->SetFillColor(255,255,255);
           $pdf->SetTextColor(50,100,255);
          /* $pdf->SetFont('Arial','B',7);
           $pdf->RoundedRect($PosX, $PosY+4, 195, $Alto-4, 3.50, '0000');
           $pdf->MultiCell(51,3,"CONTROL DE ACARREO DE MATERIAL  ",0,'C',1);*/
           $pdf->SetY($posy);

           
           #recoger siguiente fila de cada consulta
           if($rwFletes=mysql_fetch_array($rsFletes)){
				$lExisteFlete = true;	
		   }else{
				$lExisteFlete = false;
		   }
		   if($rwSuministros=mysql_fetch_array($rsSuministros)){
				$lExisteSuministro=true;
		   }else{
				$lExisteSuministro=false;
		   }
      }
      $pdf->ln(2);
}
/*
$link = mysql_connect("127.0.0.1","root","danae");
mysql_select_db("geotechAdal",$link);
$pdf=new PDF();
//Agregar pagina
$pdf->AddPage();
//Poner fuente
$pdf->SetFont('Arial','',6);
controlAcarreo("425027849","JAGUARIN","AC-01","2008-04-30","JAGUARIN-052","A","1");
$pdf->Output(); 
*/
?>
