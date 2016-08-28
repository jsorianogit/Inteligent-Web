<?php
require('../fpdf/fpdf.php');
include "../functions.php";
conexion("localhost","root","danae","evya");
$req=$_GET['iFolioRequisicion'];
$NumeroOrden=$_GET['NumeroOrden'];
$contrato=$_GET['sContrato'];
$qry=consulta("*","anexo_prequisicion","iFolioRequisicion=".$req." and sContrato='".$contrato."' and sNumeroOrden='".$NumeroOrden."'");
class PDF extends FPDF
{
//Cabecera de página
function FancyTable($header,$data,$num_rows)
{
	//Colores, ancho de línea y fuente en negrita
	$this->SetFillColor(0,0,255);
	$this->SetTextColor(255);
	$this->SetDrawColor(0,0,0);
	$this->SetLineWidth(.1);
	$this->SetFont('Arial','B',8);
	//Cabecera
	$w=array('15','15','18','55','177');
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],6,$header[$i],"TB",0,'C',2);
	$this->Ln();
	//Restauración de colores y fuentes
	$this->SetFillColor(225,225,225);
	$this->SetTextColor(80);
	//Datos
	$fill=false;
	$j=-1;
	for($i=1;$i<=$num_rows;$i++)
	{
		$this->SetFont('Arial','I',8);
		$this->Cell($w[0],5,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[1],5,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[2],5,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[3],5,$data[$j++],"T",0,'C',$fill);
		$this->SetFont('Arial','I',5);
		$this->Multicell($w[4],5,$data[$j++],"T","L",$fill);
//		$this->Ln();
		$fill=!$fill;
	}
	$this->Cell(280,0,'','T');
}
function Header()
{
    //Logo
$req=$_GET['iFolioRequisicion'];
$NumeroOrden=$_GET['NumeroOrden'];
$contrato=$_GET['sContrato'];
	$qry_head=consulta("*","configuracion","sContrato='".$contrato."'");
    //Arial bold 15
    $this->SetFont('Helvetica','B',14);
	$this->SetDrawColor(0,100,0);
	$this->SetLineWidth(.4);
    //Movernos a la derecha
    $this->Cell(40,20,"","LT");
    //Título
	while($rowh=mysql_fetch_array($qry_head)){
	    $this->Image('images/compania.jpg',17,15,32);
		$this->SetTextColor(0,0,150);
	    $this->Cell(200,20,$rowh['sNombre'],"T",0,'C',0);
		$this->Cell(40,20,"","RT",1);
		$this->SetTextColor(0);
		$this->SetFont('Arial','',12);
		$this->Cell(280,10,"Contrato: ".$rowh['sContrato'],"LBR",0,'C',0);
	}
    //Salto de línea
    $this->Ln(11);
}

//Pie de página
function Footer()
{
$req=$_GET['iFolioRequisicion'];
$NumeroOrden=$_GET['NumeroOrden'];
$contrato=$_GET['sContrato'];
//Posición: a 1,5 cm del final
    $this->SetY(-23);
    //Arial italic 8
    $this->SetFont('Helvetica','',5);
	$this->SetTextColor(60);
    //Número de página
	$this->Cell(14,2,"ORIGINAL:","LT",0,'L',0);
	$this->Cell(15,2,"COMPRAS","TR",0,'L',0);
	$this->Cell(251,2,"OBSERVACIONES: ","TR",1,'L',0);
	$this->Cell(14,2,"COPIA:","L",0,'L',0);
	$this->Cell(15,2,"ALMACEN","R",0,'L',0);
	$qry=consulta("*","anexo_requisicion","sContrato='".$contrato."' and iFolioRequisicion=".$req." and sNumeroOrden='".$NumeroOrden."'");
	while($row_f=mysql_fetch_array($qry)){
		$this->Multicell(251,2,$row_f['mComentarios'],"R","L",0);
		$this->Cell(14,2,"COPIA:","LB",0,'L',0);
		$this->Cell(15,2,"REQUISITOR","RB",0,'L',0);
		$this->Multicell(251,2,"","RB","L",0);
		$this->Cell(70,4,"SOLICITO","LR",0,'C',0);
		$this->Cell(70,4,"AUTORIZO","LR",0,'C',0);
		$this->Cell(70,4,"VERIFICACION DE ALMACEN","LR",0,'C',0);
		$this->Cell(70,4,"RECIBIDO POR COMPRAS","LR",1,'C',0);
		$qry2=consulta("*","usuarios","sIdUsuario='".$row_f['sIdUsuarioCreador']."'");
		$row2=mysql_fetch_array($qry2);
		$this->Cell(70,2,$row2['sNombre'],"LR",0,'C',0);
		$qry2=consulta("*","usuarios","sIdUsuario='".$row_f['sIdUsuarioAutoriza']."'");
		$row2=mysql_fetch_array($qry2);
		$this->Cell(70,2,$row2['sNombre'],"LR",0,'C',0);
		$qry2=consulta("*","usuarios","sIdUsuario='".$row_f['sIdUsuarioVerifica']."'");
		$row2=mysql_fetch_array($qry2);
		$this->Cell(70,2,$row2['sNombre'],"LR",0,'C',0);
		$qry2=consulta("*","usuarios","sIdUsuario='".$row_f['sIdUsuarioRecibio']."'");
		$row2=mysql_fetch_array($qry2);
		$this->Cell(70,2,$row2['sNombre'],"LR",1,'C',0);
		$this->Cell(70,4,"CONTROL DE CONTRATOS","LTR",0,'C',0);
		$this->Cell(70,4,"CONTROL DE CONTRATOS","LTR",0,'C',0);
		$this->Cell(70,4,"CONTROL DE CONTRATOS","LTR",0,'C',0);
		$this->Cell(70,4,"CONTROL DE CONTRATOS","LTR",1,'C',0);
		$this->Cell(70,2,"Puesto, Nombre y Firma","LBR",0,'C',0);
		$this->Cell(70,2,"Puesto, Nombre y Firma","LBR",0,'C',0);
		$this->Cell(70,2,"Puesto, Nombre y Firma","LBR",0,'C',0);
		$this->Cell(70,2,"Puesto, Nombre y Firma","LBR",1,'C',0);
	}
	$this->SetFont('Arial','I',8);
	$this->Cell(0,5,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
//Creación del objeto de la clase heredada
$qry2=consulta("*","anexo_requisicion","sContrato='".$contrato."' and iFolioRequisicion=".$req." and sNumeroOrden='".$NumeroOrden."'");
while($rows=mysql_fetch_array($qry2)){
	$pdf=new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetFont('Arial','',8);
	$pdf->Cell(280,5,"COEV-413-244",0,1,'R');
	$pdf->Cell(260,5,"Rev.: ",0,0,'R');
	$pdf->Cell(20,5,"000",0,1,'L');
	$pdf->Cell(260,5,"Fecha: ",0,0,'R');
	$pdf->Cell(20,5,date('d-m-Y'),0,1,'L');
	$pdf->SetFont('Arial','',10);
	$pdf->SetTextColor(50);
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(40,5,"Contrato: ","TL",0,'L',1);
	$pdf->SetFillColor(220,220,220);
	$pdf->Cell(50,5,$rows['sContrato'],"T",0,'L',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(60,5,"","T",0,'R');
	$pdf->Cell(110,5,"Numero de Requisicion: ","T",0,'R',1);
	$pdf->SetFillColor(220,220,220);
	$pdf->Cell(20,5,$rows['iFolioRequisicion'],"TR",1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(40,5,"Numero de Orden: ","L",0,'L',1);
	$pdf->SetFillColor(220,220,220);
	$pdf->Cell(50,5,$rows['sNumeroOrden'],0,0,'L',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(60,5,"",0,0,'C');
	$pdf->Cell(110,5,"Fecha de Solicitud: ",0,0,'R',1);
	$pdf->SetFillColor(220,220,220);
	$pdf->Cell(20,5,$rows['dFechaSolicitado'],"R",1,'C',1);
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(260,5,"Fecha requerida: ","LB",0,'R',1);
	$pdf->SetFillColor(220,220,220);
	$pdf->Cell(20,5,$rows['dFechaRequerido'],"BR",1,'C',1);
}
$header=array('Partida','Medida','Cantidad','Modelo, # Parte y/o # Catalogo','Descripcion Tecnica Detallada');
$dato=array();
$i=-1;
while($row=mysql_fetch_array($qry)){
	$dato[$i++]=$row['sNumeroActividad'];
	$dato[$i++]=$row['sMedida'];
	$dato[$i++]=$row['dCantidad'];
	$dato[$i++]=$row['sModelo'];
	$dato[$i++]=$row['mDescripcion'];
}
$num_rows=mysql_num_rows($qry);
$pdf->FancyTable($header,$dato,$num_rows);
$pdf->Output();
?>