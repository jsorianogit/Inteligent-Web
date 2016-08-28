<?php
/**
 * @author Adalberto Reyes Valenzuela
 * @copyright 2007
 */
/*include "../fpdf153/fpdf.php";
include "Servidor.php";
include "Encabezado_Pie.php";*/
function Periodos_Fechas($sContrato,$dFecha,$sNumeroOrden,$sIdTurno,$sIdConvenio)
{
	global $pdf,$link;
	//Periodos
	$sql="SELECT rd.sOperacionInicio,rd.sOperacionFinal,rd.sTiempoEfectivo,rd.sTiempoMuerto,rd.sTiempoMuertoReal,con.dFechaInicio, con.dFechaFinal,ot.sDescripcionCorta
			FROM reportediario rd 
			INNER JOIN ordenesdetrabajo ot ON (rd.sContrato=ot.sContrato AND rd.sNumeroOrden=ot.sNumeroOrden) 
			INNER JOIN convenios con ON (rd.sContrato=con.sContrato AND rd.sNumeroOrden='$sNumeroOrden') 
			WHERE rd.sContrato='$sContrato' AND rd.dIdFecha='$dFecha' AND rd.sIdTurno='$sIdTurno' AND rd.sIdConvenio = '$sIdConvenio'";
	$result=mysql_query($sql,$link);
	$PosY=$pdf->getY();
	if($row=mysql_fetch_array($result))
	{
		if(!isset($xPeriodo))$xPeriodo=0.1;
		$pdf->setY($PosY);
	   /*if(($pdf->getY())>=220)$pdf->AddPage();*/
	   $pdf->SetFillColor(250,250,220);
	      $pdf->Cell($xPeriodo);
	   $pdf->Cell(70,3,$row['sDescripcionCorta'],1,1,'C',1);
	   $pdf->SetFillColor(215,217,200);
   	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(40,3,"PERIODO DE CONTRATO",1,0,'L',1);
	   $pdf->Cell(30,3,$row['dFechaInicio']." AL ".$row['dFechaFinal'],1,1,'L',0);
   	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(40,3,"INICIO DE ACTIVIDADES",1,0,'L',1);
	   $pdf->Cell(30,3,$row['sOperacionInicio'],1,1,'L',0);
   	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(40,3,"CIERRE DE ACTIVIDADES",1,0,'L',1);
	   $pdf->Cell(30,3,$row['sOperacionFinal'],1,1,'L',0);
     	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(40,3,"TIEMPO EFECTIVO DE LA ORDEN",1,0,'L',1);
	   $pdf->Cell(30,3,$row['sTiempoEfectivo'],1,1,'L',0);
     	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(40,3,"TIEMPO MUERTO DE LA ORDEN",1,0,'L',1);
	   $pdf->Cell(30,3,$row['sTiempoMuerto'],1,1,'L',0);
     	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(40,3,"TIEMPO MUERTO DEL CONTRATO",1,0,'L',1);
	   $pdf->Cell(30,3,$row['sTiempoMuertoReal'],1,1,'L',0);

	}
	$yPeriodo=$pdf->getY();
	//Fecha
	$sql="SELECT * 
			FROM reportediario 
			WHERE sContrato='$sContrato' AND dIdFecha='$dFecha' AND sIdTurno='$sIdTurno' AND sNumeroOrden='$sNumeroOrden'";
	$result=mysql_query($sql,$link);
	if($row=mysql_fetch_array($result))
	{
	   /*if(($pdf->getY())>=220)$pdf->AddPage();*/
	   $pdf->setY($PosY);
	   if(!isset($xFecha))$xFecha=125;
	   $pdf->SetFillColor(215,217,200);
   	   $pdf->Cell($xFecha);
	   $pdf->Cell(30,3,"FECHA",1,0,'L',1);
	   $pdf->Cell(40,3,$row['dIdFecha'],1,1,'L',0);
   	   $pdf->Cell($xFecha);
	   $pdf->Cell(30,3,"REPORTE",1,0,'L',1);
	   $pdf->Cell(40,3,$row['sNumeroReporte'],1,1,'L',0);
   	   $pdf->Cell($xFecha);
	   $pdf->Cell(30,3,"ESTADO DEL TIEMPO",1,0,'L',1);
	   $pdf->Cell(40,3,$row['sTiempo'],1,1,'L',0);
     	   $pdf->Cell($xFecha);
	   $pdf->Cell(30,3,"PLATICAS DE SEGURIDAD",1,0,'L',1);
	   $pdf->Cell(40,3,$row['sInicioPlatica']." a ".$row['sFinalPlatica'],1,1,'L',0);
     	   $pdf->Cell($xFecha);
           $yTema = $pdf->getY() ; 		
	   $pdf->MultiCell(30,6,"TEMA",1,'L',1);
           $pdf->setY($yTema);  
           $pdf->Cell($xFecha + 30);  
	   $pdf->MultiCell(40,6,$row['sTema'],1,'L',0);

	}
	$yFecha=$pdf->getY();
	if($yPeriodo>$yFecha)$pdf->setY($yPeriodo+3);
	else if($yFecha>$yPeriodo)$pdf->setY($yFecha+3);
	else if($yFecha==$yPeriodo)$pdf->setY($yFecha+3);
}

//$pdf=new PDF();
/*Agregar pagina*/
//$pdf->AddPage();
/*Poner fuente*/
//$pdf->SetFont('Arial','',6);
//Periodos_Fechas("418235943","2007-03-29","A");
//$pdf->Cell(30,3,$pdf->getY(),1,0,'L',1);
//$pdf->Output(); 
?>