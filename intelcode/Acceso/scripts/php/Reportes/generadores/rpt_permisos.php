<?php
/**
 * @author Adalberto Reyes Valenzuela
 * @copyright 2007
 */
 /*
include "../fpdf153/fpdf.php";
include "Servidor.php";
include "Encabezado_Pie.php";*/
function Permisos($sContrato,$dFecha,$sNumeroOrden,$sIdTurno)
{
	global $pdf,$link;
	//Verificar Existencia de registros en tabla bitacoradepersonal y personal
	$sql="SELECT trp.sContrato, trp.sFolios, tip.sDescripcion 
	FROM tramitedepermisos trp 
	INNER JOIN tiposdepermiso tip ON (trp.sIdTipoPermiso = tip.sIdTipoPermiso)
	WHERE trp.sContrato = '$sContrato' AND trp.dIdFecha = '$dFecha' AND trp.sNumeroOrden = '$sNumeroOrden' AND trp.sIdTurno = '$sIdTurno' 
	ORDER BY trp.sIdTipoPermiso";
	$result=mysql_query($sql,$link);
	if($row=mysql_fetch_array($result))
	{
	   if(($pdf->getY())>=220)$pdf->AddPage();
	   $pdf->ln(10);
	   $PosY=$pdf->getY()-4;
	   $PosX=$pdf->getX();
	   $pdf->SetFillColor(215,217,200);
	   $pdf->SetTextColor(0,0,0);
	   $pdf->SetFont('Arial','B',7);
	   $pdf->Cell(22,3,"CLASE",1,0,'C',1);
	   $pdf->Cell(173,3,"FOLIOS",1,1,'C',1);
	   $posy=$pdf->getY();
	   $Alto=$posy-$PosY;
	   $pdf->RoundedRect($PosX, $PosY, 195, $Alto, 3.50, '1001');
	   $pdf->SetY($PosY-1);
	   $pdf->Cell(4);
	   $pdf->SetFillColor(255,255,255);
	   $pdf->SetTextColor(50,100,255);
	   $pdf->SetFont('Arial','B',7);
	   $pdf->MultiCell(31,3,"PERMISOS UTILIZADOS",0,'C',1);
	   $pdf->SetY($posy);
	}
	$result=mysql_query($sql,$link);
	while($row=mysql_fetch_array($result))
	{
	   if(($pdf->getY())>=220)$pdf->AddPage();
	   $PosY=$pdf->getY();
	   $pdf->SetFillColor(215,217,200);
	   $pdf->SetTextColor(0,0,0);
	   $pdf->SetFont('Arial','',6);
	   $pdf->SetY($PosY);
	   $pdf->Cell(22,3,$row[2],1,0,'L');
	   $pdf->Cell(173,3,$row[1],1,1,'L');
	  
	}
	$pdf->ln(2);
}

/*$pdf=new PDF();*/
/*Agregar pagina*/
/*$pdf->AddPage();*/
/*Poner fuente*/
/*$pdf->SetFont('Arial','',6);*/
/*Permisos("418235943","418235943-AKAL-C1","2007-03-29","A");*/
/*$pdf->Output();*/ 
?>
