<?php
session_start();
#$_SESSION['ssUsuario']='adal2404';
#$_SESSION['ssContrasena']='28112002';

require("../../../../../Modulos/include/mysql.inc.php");
require("../../../../../fnUtilerias.php");
require("../../../../../fnContrato.php");
require("../fpdf153/fpdf.php");
#include de partes del reporte
include "rpt_infoContratoGerencial.php";
include "rpt_encabezado_Pie.php";

define ('FPDF_FONTPATH','../fpdf153/font/');
class pdfGerencial extends PDF {
   function PrintImage()
   {
      global $nameFile,$dFecha,$sNumeroOrden;
      $PosX=13;
      $x=$PosX;
      $y=$this->GetY()+1;
      $Ancho=43;
      $Alto=7;
      $NumImg=0;
      $Tamanio=sizeof($nameFile);
      while($NumImg<$Tamanio)
      {
         $NumImg++;
         if(file_exists("photo/".$nameFile[$NumImg][0]))
            $this->image("photo/".$nameFile[$NumImg][0],$x,$y,$Ancho,$Alto);
         if(file_exists("photo/".$nameFile[$NumImg][1]))
            $this->image("photo/".$nameFile[$NumImg][1],$x+210,$y,$Ancho,$Alto);
         $this->Cell(265,22,"",1,1,'C');
         $this->setY($y);
         $this->cell(55);
         $this->MultiCell(160,3,$nameFile[$NumImg][2],0,'C');
         $this->setY($y+15);
         $this->cell(55);
         $this->MultiCell(160,3,"CONTRATO No.: ".$nameFile[$NumImg][3],0,'C');
         $this->SetFont('Arial','',4);
         $this->cell(0.1);
         $this->MultiCell(60,3,""/*"FECHA: ".date("d/m/Y")*/,0,'L');
         $this->cell(0.1);
         $this->MultiCell(60,3,"FECHA DE REPORTE: ".formatoFecha($dFecha),0,'L');
         $this->setY($y+22);
         $this->cell(0.1);
         $this->SetFont('Arial','',4);
         $this->setY($y+19);

      }
   }
   function footer(){
       $this->SetY(-10);
       $this->SetFont('Arial','I',8);
       $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
   }
}
//$dFecha="2007-07-16";
if(isset($_REQUEST['sContrato']))$sContrato=$_REQUEST['sContrato'];
if(isset($_REQUEST['lista']))$Ordenes=$_REQUEST['lista'];
if(isset($_REQUEST['dFecha']))$dFecha=formatoFechaPer($_REQUEST['dFecha'],"Y-m-d");
if(isset($_REQUEST['sIdTurno']))$sIdTurno=$_REQUEST['sIdTurno'];
if(isset($_REQUEST['sIdConvenio']))$sIdConvenio=$_REQUEST['sIdConvenio'];

$pdf=new pdfGerencial('L','mm','Letter');

#Agregar pagina
$pdf->AliasNbPages();
$pdf->AddPage();
#Poner fuente

$pdf->SetFont('Arial','',6);

$pdf->SetFillColor(153,230,172);
#tomar el convenio de el dia de el reporte seleccionado
$sqlConReporte = "select
      sIdConvenio
   from
      reportediario
   where sContrato='$sContrato'
   and dIdFecha='$dFecha'
   and sIdTurno='$sIdTurno'
   and sIdConvenio<>''
   limit 1";
$rs = mysql_query($sqlConReporte);
if($row = mysql_fetch_array($rs)){
   $sIdConvenio = $row['sIdConvenio'];
}
#leer la configuracion para el reporte gerencial
$sqlConfiguracionGerencial = "
   select
      lIncluyeGrafica,
      lIncluyeAvanceOrdenes,
      lIncluyeAvanceContrato,
      lComentariosReporte
   from
      configuracion
   where
      sContrato='$sContrato'
";
$rsConfiguracion = mysql_query($sqlConfiguracionGerencial);
if($rowConfiguracion = mysql_fetch_array($rsConfiguracion)){
      $lIncluyeGrafica = $rowConfiguracion['lIncluyeGrafica'];
      $lIncluyeAvancesOrdenes = $rowConfiguracion['lIncluyeAvanceOrdenes'];
      $lIncluyeAvancesContrato = $rowConfiguracion['lIncluyeAvanceContrato'];
      $lComentariosReporte = $rowConfiguracion['lComentariosReporte'];
}
#informacion del contrato
infoContratoGerencial($sContrato,$sIdConvenio);
$LastY = $pdf->getY();

#responsables de ejecucion de trabajos
responsables($LastY,$sContrato,$Ordenes,$dFecha);
$LastYfirmas = $pdf->getY();
#personal de todas las ordenes

$LastYpersonal=personal($LastY,$sContrato,$dFecha,$sIdConvenio,$Ordenes);
$LastY = ($LastYfirmas>$LastYpersonal)?$LastYfirmas:$LastYpersonal;

#avances de la obra
if($lIncluyeAvancesContrato=='Si'){
   $LastY = avancesObra($LastY,$sContrato,$dFecha,$sIdConvenio,$sIdTurno);
   if($LastY < $pdf->getY())$LastY = $pdf->getY();
}

#avances por todas las ordenes seleccionadas
if($lIncluyeAvancesOrdenes=='Si'){
   $LastY = avancesxOrden($LastY,$sContrato,$dFecha,$sIdConvenio,$sIdTurno,$Ordenes);
   if($LastY < $pdf->getY())$LastY = $pdf->getY();
}

#permisos utilizados por las ordenes
$LastY = permisosPlaticas($LastY,$sContrato,$dFecha,$sIdConvenio,$Ordenes);
if($LastY < $pdf->getY())$LastY = $pdf->getY();

#acciones relevantes
$LastY = relevantesAcciones($LastY,$sContrato,$dFecha,$sIdConvenio,$Ordenes);
if($LastY < $pdf->getY())$LastY = $pdf->getY();

#fotos de todas las ordenes
GetImageFotografico($sContrato,$dFecha,$Ordenes,$sIdTurno);

#tiempos muertos de todas las ordenes
tiemposMuertos($sContrato,$dFecha,$Ordenes,$sIdTurno,$sIdConvenio);

#avisos de embarques de las ordenes
avisosEmbarques($sContrato,$dFecha,$Ordenes,$sIdTurno,$sIdConvenio);

#comentarios dle dia para las ordenes
if($lComentariosReporte =='Si')
   comentarios($sContrato,$dFecha,$sIdConvenio,$Ordenes);

#Grafica comparativa
if($lIncluyeGrafica=='Si')
   grafica($sContrato,$dFecha,$sIdConvenio);
$pdf->Output();

?>
