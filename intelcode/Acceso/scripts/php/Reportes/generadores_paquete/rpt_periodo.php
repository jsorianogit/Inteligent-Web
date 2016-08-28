<?php
/**
 * @author Adalberto Reyes Valenzuela
 * @copyright 2007
 */
include "../fpdf153/fpdf.php";
include "Servidor.php";
include "Encabezado_Pie.php";
function Permisos($sContrato,$dFecha,$sNumeroOrden,$sIdTurno)
{
	global $pdf,$link;
	//Periodos
	$sql="SELECT rd.sOperacionInicio,rd.sOperacionFinal,rd.sTiempoEfectivo,rd.sTiempoMuerto,rd.sTiempoMuertoReal,con.dFechaInicio, con.dFechaFinal		
			FROM reportediario rd 
			INNER JOIN convenios con ON (rd.sContrato=con.sContrato AND rd.sIdConvenio=con.sIdConvenio) 
			WHERE rd.sContrato='$sContrato' AND rd.dIdFecha='$dFecha' AND rd.sIdTurno='$sIdTurno' AND rd.sNumeroOrden='$sNumeroOrden'";
	$result=mysql_query($sql,$link);
	if($row=mysql_fetch_array($result))
	{
		if(!isset($xPeriodo))$xPeriodo=0.1;
	   if(($pdf->getY())>=220)$pdf->AddPage();
	   $PosY=$pdf->getY()-5;
	   $PosX=$pdf->getX();
	   $pdf->SetFillColor(250,250,220);
	   
	      $pdf->Cell($xPeriodo);
	   $pdf->Cell(80,3,$row['dFechaInicio']." AL ".$row['dFechaFinal'],1,1,'C',1);
	   $pdf->SetFillColor(215,217,200);
   	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(40,3,"PERIODO DE CONTRATO",1,0,'L',1);
	   $pdf->Cell(40,3,$row['dFechaInicio']." AL ".$row['dFechaFinal'],1,1,'L',0);
   	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(40,3,"INICIO DE ACTIVIDADES",1,0,'L',1);
	   $pdf->Cell(40,3,$row['sOperacionInicio'],1,1,'L',0);
   	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(40,3,"CIERRE DE ACTIVIDADES",1,0,'L',1);
	   $pdf->Cell(40,3,$row['sOperacionFinal'],1,1,'L',0);
     	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(40,3,"TIEMPO EFECTIVO DE LA ORDEN",1,0,'L',1);
	   $pdf->Cell(40,3,$row['sTiempoEfectivo'],1,1,'L',0);
     	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(40,3,"TIEMPO MUERTO DE LA ORDEN",1,0,'L',1);
	   $pdf->MultiCell(40,3,$row['sTiempoMuerto'],1,1,'L',0);
     	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(40,3,"TIEMPO MUERTO DEL CONTRATO",1,0,'L',1);
	   $pdf->MultiCell(40,3,$row['sTiempoMuertoReal'],1,1,'L',0);

	}
}

$pdf=new PDF();
/*Agregar pagina*/
$pdf->AddPage();
/*Poner fuente*/
$pdf->SetFont('Arial','',6);
Permisos("418235943","2007-03-29","A");
$pdf->Output(); 
?>