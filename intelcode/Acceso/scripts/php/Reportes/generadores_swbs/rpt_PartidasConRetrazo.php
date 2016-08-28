<?php
session_start();
/*
$_SESSION['ssUsuario']='adal2404';
$_SESSION['ssContrasena']='28112002';
*/
require("../../../../../Modulos/include/mysql.inc.php");
require("../../../../../fnUtilerias.php");
require("../../../../../fnContrato.php");
require("../fpdf153/fpdf.php");
#include de partes del reporte
include "rpt_infoPartidasConRetrazo.php";
include "rpt_encabezado_Pie.php";

define ('FPDF_FONTPATH','../fpdf153/font/');
class pdfRetrazos extends PDF {
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
         $this->SetFont('Arial','',6);
         $this->cell(0.1);
         $this->MultiCell(60,3,""/*"FECHA: ".date("d/m/Y")*/,0,'L');
         $this->cell(0.1);

         if($this->PageNo()==1){
            $this->MultiCell(70,3,"INFORME PROGRAMADO DE AVANCE DE OBRA AL DIA: ".formatoFecha($dFecha),1,'L');
            $this->setY($y+24);
            $this->cell(0.1);

            $this->SetFont('Arial','',8);
            $sql = "select mDescripcion from contratos where sContrato='".$nameFile[$NumImg][3]."'";
            $rs = mysql_query($sql);
            if($row = mysql_fetch_array($rs)){
                  $this->MultiCell(265,3,$row[0],1,'L',0,0);
               $y = $this->getY();
               $this->cell(0.1);
            }
         }
         else{
                     $y +=24;
         }
         $this->SetFont('Arial','',4);
         $this->setY($y);


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
if(isset($_REQUEST['sNumeroOrden']))$sNumeroOrden=$_REQUEST['sNumeroOrden'];
if(isset($_REQUEST['dFecha']))$dFecha=$_REQUEST['dFecha'];//formatoFechaPer($_REQUEST['dFecha'],"Y-m-d");
if(isset($_REQUEST['sIdTurno']))$sIdTurno=$_REQUEST['sIdTurno'];
if(isset($_REQUEST['sIdConvenio']))$sIdConvenio=$_REQUEST['sIdConvenio'];
if(isset($_REQUEST['ordenarPor']))$ordenarPor=$_REQUEST['ordenarPor'];
if(isset($_REQUEST['filtrarPor']))$filtrarPor=$_REQUEST['filtrarPor'];

/*
echo "<br>sContrato:".$sContrato;
echo "<br>sNumeroOrden:".$sNumeroOrden;
echo "<br>dFecha:".$dFecha;
echo "<br>sIdTurno:".$sIdTurno;
echo "<br>sIdConvenio:".$sIdConvenio;
echo "<br>ordenarPor:".$ordenarPor;
echo "<br>filtrarPor:".$filtrarPor;
exit();

$sContrato='428237813';
$sNumeroOrden='428237813-C';
$dFecha='2007-12-31';
$sIdConvenio='A-03';
$sIdTurno='A';
*/
$pdf=new pdfRetrazos('L','mm','Letter');

#Agregar pagina
$pdf->AliasNbPages();
$pdf->AddPage();
#Poner fuente

$pdf->SetFont('Arial','',7);

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

#partidas con retrazo
if(strpos($filtrarPor,"RETRAZO")!==false)$filtrarPor="CON RETRAZO";

fnTitulos($sContrato,$sIdConvenio);
if(strpos($sNumeroOrden,"CONTRATO")===false)
   fnPartidasOrden($sContrato,$sNumeroOrden,$sIdConvenio,$dFecha,$filtrarPor);
else
   fnPartidas($sContrato,$sIdConvenio,$dFecha,$filtrarPor);

$pdf->Output();

?>

