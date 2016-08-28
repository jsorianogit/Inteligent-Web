<?php
require('../fpdf/fpdf.php');
include "../functions.php";
conexion("localhost","root","danae","evya");
$contrato='428238909';
$qry=consulta("*","actividadesxanexo","sContrato='".$contrato."' and sTipoActividad='Actividad' ORDER BY sWbs ASC");
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
	$w=array('30','15','15','17','15','18','18','15','15','32','90');
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
		$this->SetFont('Arial','I',7);
		$this->Cell($w[0],4,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[1],4,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[2],4,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[3],4,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[4],4,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[5],4,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[6],4,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[7],4,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[8],4,$data[$j++],"T",0,'C',$fill);
		$this->Cell($w[9],4,$data[$j++],"T",0,'C',$fill);
		$this->SetFont('Arial','I',7);
		$this->Multicell($w[10],4,$data[$j++],"T","L",$fill);
		$fill=!$fill;
	}
	$this->Cell(280,0,'','T',1);
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
	}
    //Salto de línea
    $this->Ln(11);
}

//Pie de página
function Footer()
{
    //Posición: a 1,5 cm del final
    $this->SetY(-19);
    //Arial italic 8
    //Número de página
	$this->SetFont('Arial','I',8);
	$this->Cell(0,5,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}
//Creación del objeto de la clase heredada
	$pdf=new PDF('L','mm','A4');
	$pdf->AliasNbPages();
	$pdf->AddPage();
while($rows=mysql_fetch_array($qry)){
	$pdf->SetFont('Arial','',8);
	$pdf->SetTextColor(50);
	$pdf->SetFillColor(105,105,255);
	$pdf->Cell(40,5,"Partida",1,0,'C',1);
	$pdf->Cell(40,5,"Cantidad Reportada",1,0,'C',1);
	$pdf->Cell(40,5,"Cantidad por Anexo",1,1,'C',1);
	$pdf->SetTextColor(50);
	$pdf->SetFillColor(255,255,255);
	$pdf->Cell(40,5,$rows['sNumeroActividad'],1,0,'C',1);
	$pdf->Cell(40,5,$rows['dInstalado'],1,0,'C',1);
	$pdf->Cell(40,5,$rows['dCantidadAnexo'],1,1,'C',1);
	$pdf->SetFillColor(105,105,255);
	$pdf->Cell(280,4,"Descripcion",1,1,'C',1);
	$pdf->SetFont('Arial','',5);
	$pdf->Multicell(280,3,$rows['mDescripcion'],1,'L');
	$header=array('Insumo','F. Compra','Medida','Cant. Anexo', 'Total Real','Costo Anexo','Costo Real','Diferencia','Total','Referencia','Descripcion Tecnica Detallada');
	$dato=array();
	$qry2=consulta("*","recursosanexo","sContrato='".$contrato."' and sWbs='".$rows['sWbs']."'");
	$i=-1;
	$cont=0;
	while($row=mysql_fetch_array($qry2)){
		$qry3=consulta("*","anexo_ppedido","sContrato='".$contrato."' and sIdInsumo='".$row['sIdInsumo']."'");
		while($row3=mysql_fetch_array($qry3)){
			if($row3['sIdInsumo']==$row['sIdInsumo']){
				$dato[$i++]=$row['sIdInsumo'];
				$dato[$i++]=$row3['iFolioPedido'];
				$qry4=consulta("*","insumos","sContrato='".$contrato."' and sIdInsumo='".$row['sIdInsumo']."'");
				$row4=mysql_fetch_array($qry4);
				$dato[$i++]=$row4['sMedida'];
				$dato[$i++]=($row['dCantidad']*1);
				$dato[$i++]=($row3['dCantidad']*1);
				$dato[$i++]=$row['dCostoMN'];
				$dato[$i++]=$row3['dCosto'];
				$dato[$i++]=($row['dCostoMN']-$row3['dCosto']);
				$dato[$i++]=($row3['dCosto']*$row3['dCantidad']);
				$qry5=consulta("*","anexo_pedidos","sContrato='".$contrato."' and iFolioPedido='".$row3['iFolioPedido']."'");
				$row5=mysql_fetch_array($qry5);
				$dato[$i++]=$row5['sReferencia'];
				$dato[$i++]=$row3['mDescripcion'];
				$cont=$cont+1;
			}
		}
	}
	$pdf->FancyTable($header,$dato,$cont);
//	$num_rows=mysql_num_rows($qry2);
}
$pdf->Output();
?>