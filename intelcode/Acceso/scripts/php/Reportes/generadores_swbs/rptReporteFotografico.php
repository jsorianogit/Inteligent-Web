<?php
require("../../../../../Modulos/include/mysql.inc.php");
require_once("../../../../../fnUtilerias.php");



define('FPDF_FONTPATH','../fpdf153/font/');
include "../fpdf153/fpdf.php";
include "rpt_encabezado_Pie.php";

class PDF2 extends PDF{
   //Pie de pagina
   function Footer()
   {
     global $sContrato,$Orden,$FechaFinal;
     global $sIdTurno,$sIdConvenio;
     $sql = " select lStatus,sIdUsuario,sIdUsuarioAutoriza,sIdUsuarioValida,sIdUsuarioResidente
              from reportediario
              where sContrato='$sContrato' and dIdFecha ='$FechaFinal' and sNumeroOrden='$Orden'
              and sIdTurno='$sIdTurno'";
      $result = mysql_query($sql);
      if($row = mysql_fetch_array($result)){
         $lStatus = $row['lStatus'];
         $sIdUsuarioAutoriza = $row['sIdUsuarioAutoriza'];
         $sIdUsuarioValida = $row['sIdUsuarioValida'];
      }
     //Consultas
     $sql="SELECT * FROM firmas WHERE sContrato='$sContrato' AND sNumeroOrden='$Orden' AND dIdFecha = '$FechaFinal'";
     $result=mysql_query($sql);
     if ($row=mysql_fetch_array($result))
     {
         $sFirmante1=$row['sFirmante1'];
         $sFirmante2=$row['sFirmante2'];
         $sFirmante5=$row['sFirmante5'];
         $sPuesto1=$row['sPuesto1'];
         $sPuesto2=$row['sPuesto2'];
         $sPuesto5=$row['sPuesto5'];
     }
   else
   {
      $sql="SELECT * FROM firmas WHERE sContrato='$sContrato' AND sNumeroOrden='$Orden' AND dIdFecha<='$FechaFinal' order by dIdFecha DESC;";
      $result=mysql_query($sql);
      if ($row=mysql_fetch_array($result))
      {
         $sFirmante1=$row['sFirmante1'];
         $sFirmante2=$row['sFirmante2'];
         $sFirmante5=$row['sFirmante5'];
         $sPuesto1=$row['sPuesto1'];
         $sPuesto2=$row['sPuesto2'];
         $sPuesto5=$row['sPuesto5'];
      }
   }
    // Firmas
     $yFilaFirmas = -30 ;
     $xContrato=0.1;
     $this->SetFillColor(237,243,216);
        $this->setY($yFilaFirmas);
     $this->Cell($xContrato);
      $this->SetFont('Arial','',5);
     $this->Cell(50,3,'POR LA CONTRATISTA' ,0,0,'C',0);
        $this->setY($yFilaFirmas + 3);
     $this->Cell(50,3,'REALIZO' ,0,0,'C',0);
      $this->SetFont('Arial','BU',5);
        $this->setY($yFilaFirmas + 6);
     $this->MultiCell(50,3,$sFirmante1 ,0,'C',0);
      $this->SetFont('Arial','',5);
        $this->setY($yFilaFirmas + 9);
     $this->MultiCell(50,3,$sPuesto1 ,0,'C',0);



        $this->setY($yFilaFirmas);
     $this->Cell($xContrato + 140);
     $this->Cell(50,3,'POR PEMEX' ,0,0,'C',0);
        $this->setY($yFilaFirmas + 3);
     $this->Cell($xContrato + 140);
     $this->Cell(50,3,'REVISO' ,0,0,'C',0);
      $this->SetFont('Arial','BU',5);
        $this->setY($yFilaFirmas + 6);
     $this->Cell($xContrato + 140);
     $this->MultiCell(50,3,$sFirmante2,0,'C',0);
      $this->SetFont('Arial','',5);
        $this->setY($yFilaFirmas + 9);
     $this->Cell($xContrato + 140);
     $this->MultiCell(50,3,$sPuesto5 ,0,'C',0);


       //Go to 1.5 cm from bottom
       $this->SetY(-15);
       //Select Arial italic 8
       $this->SetFont('Arial','I',8);
       //Print centered page number
      // $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
       $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');

   }

}
$pdf=new PDF2('P','mm','Letter');

#Capturar las variables request
if(isset($_REQUEST['lista']))$lista=$_REQUEST['lista'];
if(isset($_REQUEST['FechaInicio']))$FechaInicio=$_REQUEST['FechaInicio'];
if(isset($_REQUEST['FechaFinal']))$FechaFinal=$_REQUEST['FechaFinal'];
if(isset($_REQUEST['sIdTurno']))$sIdTurno=$_REQUEST['sIdTurno'];
if(isset($_REQUEST['sIdConvenio']))$sIdConvenio=$_REQUEST['sIdConvenio'];
if(isset($_REQUEST['lStatus']))$sIdStatus=$_REQUEST['lStatus'];
if(isset($_REQUEST['sContrato']))$sContrato=$_REQUEST['sContrato'];

#numeros de ordenes
$listaOrdenes = explode("*",$lista);
$Orden =$listaOrdenes[0];

#Verificar que en el dia las ordenes de trabajo en el dia fueron ya autorizados
$TodosAutorizado = 1;
$_sqlStatus = "select lStatus from reportediario where sContrato='$sContrato' and dIdFecha='$dFecha'; ";
$_resultStatus = mysql_query($_sqlStatus);
while($_rowStatus = mysql_fetch_array($_resultStatus)){
   if($_rowStatus['lStatus']!="Autorizado"){
      $TodosAutorizado = 0;
      break;
   }
}

include "rpt_imagen.php";

/*Agregar pagina*/
$pdf->AliasNbPages();
$pdf->AddPage();




#formatear fechas
$FechaInicio = formatoFechaPer($FechaInicio,"Y-m-d");
$FechaFinal = formatoFechaPer($FechaFinal,"Y-m-d");

#Poner fuente
$pdf->SetFont('Arial','B',14);
#imprimir portada
$ancho = 195;
$alto = 9;
$borde = 0;

$pdf->ln(20);
$texto = "PERIODO DE GENERACIÒN :";
$pdf->MultiCell($ancho,$alto,$texto,$borde,$alineacion='C',$relleno=0);

$pdf->SetFont('Arial','B',12);
$texto =  "Del ".nombreDia($FechaInicio)." ".obtener_dia_numerico($FechaInicio)." DE ".nombre_mes_espanol($FechaInicio). " DEL ".  anio($FechaInicio) ;
$texto .= " AL ".nombreDia($FechaFinal)."  ".obtener_dia_numerico($FechaFinal)." DE ".nombre_mes_espanol($FechaFinal). " DEL ".  anio($FechaFinal);
$pdf->MultiCell($ancho,$alto,strtoupper($texto),$borde,$alineacion='C',$relleno=0);

$pdf->ln(20);
$pdf->SetFont('Arial','B',14);
$texto = "ORDENES DE TRABAJO SELECIONADAS :";
$pdf->MultiCell($ancho,$alto,$texto,$borde,$alineacion='C',$relleno=0);

$pdf->SetFont('Arial','B',12);
$texto = str_replace("*",",",$lista);
$pdf->MultiCell($ancho,$alto,$texto,$borde,$alineacion='C',$relleno=0);

/*Poner fuente*/
$pdf->SetFont('Arial','',6);
$FechaFinal =  suma_fechas_dias($FechaFinal,1);
$fotografico = 1;
foreach($listaOrdenes as $sNumeroOrden){
   #inicializar la fecha de inicio
   $dFecha  = $FechaInicio;
   while(comparaFecha($dFecha, $FechaFinal) != "Iguales"){
      unset($Foto);
      GetImageFotografico($sContrato,$dFecha,$sNumeroOrden,$sIdTurno);
      $dFecha = suma_fechas_dias($dFecha ,1);
   }
}
$fotografico = 0;
#asignar nombre
$name = "reports/$sContrato.rptFotografico";
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
#$pdf->Output();
location($name.".pdf");

?>
