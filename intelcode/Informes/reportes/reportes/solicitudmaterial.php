<?php
require('../fpdf/fpdf.php');
include "../functions.php";
conexion("localhost","root","danae","evya");
$contrato=$_GET['sContrato'];
$orden=$_GET['sNumeroOrden'];
$id=$_GET['sIdSolicitud'];
$qry=consulta("*","anexo_psolicitud","sIdSolicitud=".$id." and sContrato='".$contrato."'");
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
	$w=array('35','15','18','25','187');
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
		$this->Cell($w[0],5,$data[$j++],"T",0,'L',$fill);
		$this->Cell($w[1],5,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[2],5,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[3],5,$data[$j++],"T",0,'C',$fill);
		$this->SetFont('Arial','I',7);
		$this->Multicell($w[4],5,$data[$j++],"T","L",$fill);
//		$this->Ln();
		$fill=!$fill;
	}
	$this->Cell(280,0,'','T');
}
function Header()
{
    //Logo
$contrato=$_GET['sContrato'];
$orden=$_GET['sNumeroOrden'];
$id=$_GET['sIdSolicitud'];
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
$contrato=$_GET['sContrato'];
$orden=$_GET['sNumeroOrden'];
$id=$_GET['sIdSolicitud'];
    //Posición: a 1,5 cm del final
    $this->SetY(-23);
    //Arial italic 8
    $this->SetFont('Helvetica','',5);
	$this->SetTextColor(60);
    //Número de página
	$this->Cell(14,3,"ORIGINAL:","LT",0,'L',0);
	$this->Cell(15,3,"COMPRAS","TR",0,'L',0);
	$this->Cell(251,3,"OBSERVACIONES: ","TR",1,'L',0);
	$this->Cell(14,3,"COPIA:","L",0,'L',0);
	$this->Cell(15,3,"ALMACEN","R",0,'L',0);
	$qry=consulta("*","anexo_solicitud","sContrato='".$contrato."' and sIdSolicitud=".$id." and sNumeroOrden='".$orden."'");
	while($row_f=mysql_fetch_array($qry)){
		$this->Multicell(251,3,$row_f['mComentarios'],"R","L",0);
		$this->Cell(14,3,"COPIA:","LB",0,'LB',0);
		$this->Cell(15,3,"REQUISITOR","RB",0,'L',0);
		$this->Multicell(251,3,"","RB","LB",0);
		$this->SetFont('Helvetica','',6);
		$this->Cell(140,5,"SOLICITO",0,0,'C',0);
		$this->Cell(140,5,"AUTORIZO",0,1,'C',0);
		$qry2=consulta("*","usuarios","sIdUsuario='".$row_f['sIdUsuarioCreador']."'");
		$row2=mysql_fetch_array($qry2);
		$this->Cell(140,3,$row2['sNombre'],0,0,'C',0);
		$qry2=consulta("*","usuarios","sIdUsuario='".$row_f['sIdUsuarioAutoriza']."'");
		$row2=mysql_fetch_array($qry2);
		$this->Cell(140,3,$row2['sNombre'],0,1,'C',0);
	}
	$this->SetFont('Arial','I',8);
	$this->Cell(0,4,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
//Creación del objeto de la clase heredada
$qry2=consulta("*","anexo_solicitud","sContrato='".$contrato."' and sIdSolicitud=".$id." and sNumeroOrden='".$orden."'");
while($rows=mysql_fetch_array($qry2)){
	$pdf=new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->Cell(200,5,"",0,0,'C');
	$pdf->SetFillColor(20,155,20);
	$pdf->SetTextColor(255);
	$pdf->SetFont('Arial','B',8);
	$pdf->Cell(80,5,"SOLICITUD DE MATERIALES",0,0,'C',1);
	$pdf->Ln();
	$pdf->SetTextColor(0);
	$pdf->SetFont('Arial','I',8);
	$pdf->SetTextColor(255);
	$pdf->SetFillColor(100,100,255);
	$pdf->Cell(40,4,"Contrato: ",0,0,'L',1);
	$pdf->SetFillColor(220,220,220);
	$pdf->SetTextColor(0);
	$pdf->Cell(160,4,$rows['sContrato'],0,0,'L',1);
	$pdf->SetFillColor(100,100,255);
	$pdf->SetTextColor(255);
	$pdf->Cell(40,4,"Solicitud No.: ",0,0,'R',1);
	$pdf->SetFillColor(220,220,220);
	$pdf->SetTextColor(0);
	$pdf->Cell(40,4,$rows['sIdSolicitud'],0,1,'L',1);
	$pdf->SetFillColor(100,100,255);
	$pdf->SetTextColor(255);
	$pdf->Cell(40,4,"Referencia: ",0,0,'L',1);
	$pdf->SetFillColor(220,220,220);
	$pdf->SetTextColor(0);
	$pdf->Cell(160,4,$rows['sReferencia'],0,0,'L',1);
	$pdf->SetFillColor(100,100,255);
	$pdf->SetTextColor(255);
	$pdf->Cell(40,4,"Fecha de Solicitud: ",0,0,'R',1);
	$pdf->SetFillColor(220,220,220);
	$pdf->SetTextColor(0);
	$pdf->Cell(40,4,$rows['dFechaSolicitud'],0,1,'L',1);
	$pdf->SetFillColor(100,100,255);
	$pdf->SetTextColor(255);
	$pdf->Cell(40,4,"Solicitante: ",0,0,'L',1);
	$pdf->SetFillColor(220,220,220);
	$pdf->SetTextColor(0);
	$qry2=consulta("*","usuarios","sIdUsuario='".$rows['sIdUsuarioCreador']."'");
	$row2=mysql_fetch_array($qry2);
	$pdf->Cell(160,4,$row2['sNombre'],0,0,'L',1);
	$pdf->SetFillColor(100,100,255);
	$pdf->SetTextColor(255);
	$pdf->Cell(40,4,"Numero de Orden: ",0,0,'R',1);
	$pdf->SetFillColor(220,220,220);
	$pdf->SetTextColor(0);
	$pdf->Cell(40,4,$rows['sNumeroOrden'],0,1,'L',1);
}
$header=array('Clave','Medida','Cantidad','Status','Descripcion');
$dato=array();
$i=-1;
while($row=mysql_fetch_array($qry)){
	$dato[$i++]=$row['sIdInsumo'];
	$dato[$i++]=$row['sMedida'];
	$dato[$i++]=$row['dCantidad'];
	$dato[$i++]=$row['lStatus'];
	$dato[$i++]=$row['mDescripcion'];
}
$num_rows=mysql_num_rows($qry);
$pdf->FancyTable($header,$dato,$num_rows);
$pdf->Output();
?>