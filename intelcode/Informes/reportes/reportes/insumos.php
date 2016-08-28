<?php
require('../fpdf/fpdf.php');
include "../functions.php";
conexion("localhost","root","danae","evya");
$req=$_GET['sIdAlmacen'];
$contrato=$_GET['sContrato'];
$tipoQ=$_GET['tipoQ'];
switch($tipoQ){
	case "sMax":
$qry=consulta("*","insumos","sIdAlmacen='".$req."' and sContrato='".$contrato."'");
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
	$w=array('40','15','20','35','35','135');
	//Restauración de colores y fuentes
	$this->SetFillColor(225,225,225);
	$this->SetTextColor(80);
	//Datos
	$fill=false;
	$j=-1;
	for($i=1;$i<=$num_rows;$i++)
	{
		$this->SetFont('Arial','I',8);
		$this->Cell($w[0],4,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[1],4,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[2],4,$data[$j++],"T",0,'R',$fill);
		$this->Cell($w[3],4,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[4],4,$data[$j++],"T",0,'C',$fill);
		$this->SetFont('Arial','I',7.5);
		$this->Multicell($w[5],4,$data[$j++],"T","L",$fill);
//		$this->Ln();
		$fill=!$fill;
	}
	$this->Cell(280,0,'','T');
}
function Header()
{
    //Logo
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
	$qry2=consulta("*","contratos","sContrato=".$contrato);
	while($rows=mysql_fetch_array($qry2)){
		$this->SetDrawColor(0,0,0);
		$this->SetLineWidth(.1);
		$this->SetFont('Arial','',8);
		$this->Ln();
		$this->Cell(260,4,"Fecha: ",0,0,'R');
		$mes=array(1=>'ENE',2=>'FEB',3=>'MAR',4=>'ABR',5=>'MAY',6=>'JUN',7=>'JUL',8=>'AGO',9=>'SEP',10=>'OCT',11=>'NOV',12=>'DIC');
		$m=date('n');
		$this->Cell(20,4,date('d-').$mes[$m].date('-Y'),0,1,'L');
		$this->Cell(10,3,"",0,0,'C',0);
		$this->SetFont('Arial','B',7);
		$this->SetTextColor(50);
		$this->SetFillColor(0,200,255);
		$this->Cell(40,3,"Reporte de Insumos",1,1,'C',1);
		$this->SetFont('Arial','',8);
		$this->SetTextColor(50);
		$this->SetFillColor(255,255,255);
		$this->Cell(280,12,$rows['mDescripcion'],1,1,'C',1);
		$this->Cell(280,4,"","T",1,'C',1);
	}
}
    //Salto de línea
	$w=array('40','15','20','35','35','135');
	$this->SetFont('Arial','',8);
		$this->SetTextColor(255);
		$this->SetFillColor(0,0,255);
	$header=array('CLAVE','UNIDAD','PRECIO','EXISTENCIAS','STOCK MAXIMO','DESCRIPCION');
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],6,$header[$i],1,0,'C',1);
    $this->Ln(6);
}

//Pie de página
function Footer()
{
    //Posición: a 1,5 cm del final
    $this->SetY(-10);
    //Arial italic 8
    $this->SetFont('Helvetica','',5);
	$this->SetTextColor(60);
    //Número de página
	$this->SetFont('Arial','I',8);
	$this->Cell(0,5,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
//Creación del objeto de la clase heredada
$pdf=new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true,12);
$pdf->AddPage();
$dato=array();
$i=-1;
while($row=mysql_fetch_array($qry)){
	$dato[$i++]=$row['sIdInsumo'];
	$dato[$i++]=($row['sMedida']);
	$dato[$i++]=$row['dCostoMN'];
	$dato[$i++]=($row['dCantidad']*1);
	$dato[$i++]=($row['dStockMax']*1);
	$dato[$i++]=$row['mDescripcion'];
}
$num_rows=mysql_num_rows($qry);
$pdf->FancyTable($header,$dato,$num_rows);
$pdf->Output();
	break;
	case "sMin":
$qry=consulta("*","insumos","sIdAlmacen='".$req."' and sContrato='".$contrato."'");
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
	$w=array('40','15','20','35','35','135');
	//Restauración de colores y fuentes
	$this->SetFillColor(225,225,225);
	$this->SetTextColor(80);
	//Datos
	$fill=false;
	$j=-1;
	for($i=1;$i<=$num_rows;$i++)
	{
		$this->SetFont('Arial','I',8);
		$this->Cell($w[0],4,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[1],4,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[2],4,$data[$j++],"T",0,'R',$fill);
		$this->Cell($w[3],4,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[4],4,$data[$j++],"T",0,'C',$fill);
		$this->SetFont('Arial','I',7.5);
		$this->Multicell($w[5],4,$data[$j++],"T","L",$fill);
//		$this->Ln();
		$fill=!$fill;
	}
	$this->Cell(280,0,'','T');
}
function Header()
{
    //Logo
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
	$qry2=consulta("*","contratos","sContrato=".$contrato);
	while($rows=mysql_fetch_array($qry2)){
		$this->SetDrawColor(0,0,0);
		$this->SetLineWidth(.1);
		$this->SetFont('Arial','',8);
		$this->Ln();
		$this->Cell(260,4,"Fecha: ",0,0,'R');
		$mes=array(1=>'ENE',2=>'FEB',3=>'MAR',4=>'ABR',5=>'MAY',6=>'JUN',7=>'JUL',8=>'AGO',9=>'SEP',10=>'OCT',11=>'NOV',12=>'DIC');
		$m=date('n');
		$this->Cell(20,4,date('d-').$mes[$m].date('-Y'),0,1,'L');
		$this->Cell(10,3,"",0,0,'C',0);
		$this->SetFont('Arial','B',7);
		$this->SetTextColor(50);
		$this->SetFillColor(0,200,255);
		$this->Cell(40,3,"Reporte de Insumos",1,1,'C',1);
		$this->SetFont('Arial','',8);
		$this->SetTextColor(50);
		$this->SetFillColor(255,255,255);
		$this->Cell(280,12,$rows['mDescripcion'],1,1,'C',1);
		$this->Cell(280,4,"","T",1,'C',1);
	}
}
    //Salto de línea
	$w=array('40','15','20','35','35','135');
	$this->SetFont('Arial','',8);
		$this->SetTextColor(255);
		$this->SetFillColor(0,0,255);
	$header=array('CLAVE','UNIDAD','PRECIO','EXISTENCIAS','STOCK MINIMO','DESCRIPCION');
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],6,$header[$i],1,0,'C',1);
    $this->Ln(6);
}

//Pie de página
function Footer()
{
    //Posición: a 1,5 cm del final
    $this->SetY(-10);
    //Arial italic 8
    $this->SetFont('Helvetica','',5);
	$this->SetTextColor(60);
    //Número de página
	$this->SetFont('Arial','I',8);
	$this->Cell(0,5,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
//Creación del objeto de la clase heredada
$pdf=new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true,12);
$pdf->AddPage();
$dato=array();
$i=-1;
while($row=mysql_fetch_array($qry)){
	$dato[$i++]=$row['sIdInsumo'];
	$dato[$i++]=($row['sMedida']);
	$dato[$i++]=$row['dCostoMN'];
	$dato[$i++]=($row['dCantidad']*1);
	$dato[$i++]=($row['dStockMin']*1);
	$dato[$i++]=$row['mDescripcion'];
}
$num_rows=mysql_num_rows($qry);
$pdf->FancyTable($header,$dato,$num_rows);
$pdf->Output();
	break;
	case "Todos":
	$qry=consulta("*","insumos","sIdAlmacen='".$req."' and sContrato='".$contrato."'");
class PDF extends FPDF
{
//Cabecera de página
function FancyTable($data,$num_rows)
{
	//Colores, ancho de línea y fuente en negrita
	$this->SetFillColor(0,0,255);
	$this->SetTextColor(255);
	$this->SetDrawColor(0,0,0);
	$this->SetLineWidth(.1);
	$this->SetFont('Arial','B',8);
	//Cabecera
	$w=array('40','15','20','35','35','35','100');
	//Restauración de colores y fuentes
	$this->SetFillColor(225,225,225);
	$this->SetTextColor(80);
	//Datos
	$fill=false;
	$j=-1;
	for($i=1;$i<=$num_rows;$i++)
	{
		$this->SetFont('Arial','I',8);
		$this->Cell($w[0],4,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[1],4,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[2],4,$data[$j++],"T",0,'R',$fill);
		$this->Cell($w[3],4,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[4],4,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[5],4,$data[$j++],"T",0,'C',$fill);
		$this->SetFont('Arial','I',7.5);
		$this->Multicell($w[6],4,$data[$j++],"T","L",$fill);
//		$this->Ln();
		$fill=!$fill;
	}
	$this->Cell(280,0,'','T');
}
function Header()
{
    //Logo
$contrato='428238909';
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
	$qry2=consulta("*","contratos","sContrato=".$contrato);
	while($rows=mysql_fetch_array($qry2)){
		$this->SetDrawColor(0,0,0);
		$this->SetLineWidth(.1);
		$this->SetFont('Arial','',8);
		$this->Ln();
		$this->Cell(260,4,"Fecha: ",0,0,'R');
		$mes=array(1=>'ENE',2=>'FEB',3=>'MAR',4=>'ABR',5=>'MAY',6=>'JUN',7=>'JUL',8=>'AGO',9=>'SEP',10=>'OCT',11=>'NOV',12=>'DIC');
		$m=date('n');
		$this->Cell(20,4,date('d-').$mes[$m].date('-Y'),0,1,'L');
		$this->Cell(10,3,"",0,0,'C',0);
		$this->SetFont('Arial','B',7);
		$this->SetTextColor(50);
		$this->SetFillColor(0,200,255);
		$this->Cell(40,3,"Reporte de Insumos",1,1,'C',1);
		$this->SetFont('Arial','',8);
		$this->SetTextColor(50);
		$this->SetFillColor(255,255,255);
		$this->Cell(280,12,$rows['mDescripcion'],1,1,'C',1);
		$this->Cell(280,4,"","T",1,'C',1);
	}
}
    //Salto de línea
	$w=array('40','15','20','35','35','35','100');
	$this->SetFont('Arial','',8);
		$this->SetTextColor(255);
		$this->SetFillColor(0,0,255);
	$header=array('CLAVE','UNIDAD','PRECIO','EXISTENCIAS','STOCK MAXIMO','STOCK MINIMO','DESCRIPCION');
		for($i=0;$i<count($header);$i++)
			$this->Cell($w[$i],6,$header[$i],1,0,'C',1);
    $this->Ln(6);
}

//Pie de página
function Footer()
{
    //Posición: a 1,5 cm del final
    $this->SetY(-10);
    //Arial italic 8
    $this->SetFont('Helvetica','',5);
	$this->SetTextColor(60);
    //Número de página
	$this->SetFont('Arial','I',8);
	$this->Cell(0,5,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
//Creación del objeto de la clase heredada
$pdf=new PDF('L','mm','A4');
$pdf->AliasNbPages();
$pdf->SetAutoPageBreak(true,12);
$pdf->AddPage();
$dato=array();
$i=-1;
while($row=mysql_fetch_array($qry)){
	$dato[$i++]=$row['sIdInsumo'];
	$dato[$i++]=($row['sMedida']);
	$dato[$i++]=$row['dCostoMN'];
	$dato[$i++]=($row['dCantidad']*1);
	$dato[$i++]=($row['dStockMax']*1);
	$dato[$i++]=($row['dStockMin']*1);
	$dato[$i++]=$row['mDescripcion'];
}
$num_rows=mysql_num_rows($qry);
$pdf->FancyTable($dato,$num_rows);
$pdf->Output();
	break;
	default:
		echo "Intente nuevamente";
		break;
}
?>