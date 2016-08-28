<?php
/**
/media/hda1/wamp/www/html/intelcode/Acceso/scripts/php/Reportes/generadores_swbs/rpt_relacionPersonalEquipo.php
 * @author Adalberto Reyes Valenzuela
 * @copyright 2007
 */
/*
define('FPDF_FONTPATH','../fpdf153/font/');
include "../fpdf153/fpdf.php";
require("../../../../../Modulos/include/mysql.inc.php");
require("../../../../../fnUtilerias.php");
require("../../../../../fnContrato.php");
//include "Servidor.php";
include "rpt_encabezado_Pie.php";
*/
function relacionPersonalEquipo($sContrato,$sNumeroOrden,$sIdConvenio,$dIdFecha,$sNumeroReporte,$sIdTurno)
{
	global $pdf,$link;
	 $sql ="
	select 		
		a.sNombrePersonal,
		a.dInicioHorometraje,
		a.dFinHorometraje,
		a.mObservacion,
		p.sDescripcion as perDescripcion,
		e.sDescripcion as eqDescripcion from 
	a_relacionpersonalequipo a 
	inner join personal p on (
      		a.sContrato=p.sContrato and a.sIdPersonal=p.sIdPersonal
	)
	inner join equipos e on(
		e.sContrato=a.sContrato and e.sIdEquipo=a.sIdEquipo
	)
	where
		a.sContrato='$sContrato' and
		a.sNumeroOrden='$sNumeroOrden' and
		a.sIdConvenio='$sIdConvenio' and
		a.dIdFecha='$dIdFecha' and
		a.sNumeroReporte='$sNumeroReporte' and
		a.sIdTurno='$sIdTurno'";
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
	   $pdf->Cell(7,6,"#",1,0,'C',1);//173,3
		$pdf->Cell(30,6,"Nombre",1,0,'C',1);
		$pdf->Cell(30,6,"Categoria",1,0,'C',1);
	   $pdf->Cell(30,6,"Equipo",1,0,'C',1);
	   $pdf->Cell(26,3,"Horom. o Kilom.",1,0,'C',1);
	   $pdf->setY($pdf->getY()+3);
	   $pdf->Cell(97);
	   $pdf->Cell(13,3,"Inicio",1,0,'C',1);
	   $pdf->Cell(13,3,"Final",1,0,'C',1);
	   $pdf->setY($pdf->getY()-3);
	   $pdf->Cell(123);	   
		$pdf->Cell(72,6,"Observacion",1,1,'C',1);
	   $posy=$pdf->getY();
	   $Alto=$posy-$PosY;
	   $pdf->RoundedRect($PosX, $PosY, 195, $Alto, 3.50, '1001');
	   $pdf->SetY($PosY-1);
	   $pdf->Cell(4);
	   $pdf->SetFillColor(255,255,255);
	   $pdf->SetTextColor(50,100,255);
	   $pdf->SetFont('Arial','B',7);
	   $pdf->MultiCell(51,3,"RELACION DE PERSONAL Y EQUIPO",0,'C',1);
	   $pdf->SetY($posy);
	}
	$result=mysql_query($sql,$link);
	$i=0;
	while($row=mysql_fetch_array($result))
	{
		$i++;
	   if(($pdf->getY())>=220)$pdf->AddPage();
	   $PosY=$pdf->getY();
	   $pdf->SetFillColor(215,217,200);
	   $pdf->SetTextColor(0,0,0);
	   $pdf->SetFont('Arial','',6);
	   $Y =$PosY;
	   $pdf->SetY($PosY);
	   $pdf->MultiCell(7,3,$i,0,0,'L');
	   
	   $pdf->SetY($PosY);
	   $pdf->Cell(7);
		$pdf->MultiCell(30,3,$row["sNombrePersonal"],0,1,'L');
			if($pdf->getY()>$Y)$Y=$pdf->getY();
		$pdf->SetY($PosY);
		$pdf->Cell(37);
	   $pdf->MultiCell(30,3,$row["perDescripcion"],0,1,'L');
	   	if($pdf->getY()>$Y)$Y=$pdf->getY();
	   $pdf->SetY($PosY);
	   $pdf->Cell(67);
	   $pdf->MultiCell(30,3,$row["eqDescripcion"],0,1,'L');
	   	if($pdf->getY()>$Y)$Y=$pdf->getY();
	   $pdf->SetY($PosY);
	   $pdf->Cell(97);
	   $pdf->MultiCell(13,3,$row["dInicioHorometraje"],0,1,'L');
	   	if($pdf->getY()>$Y)$Y=$pdf->getY();	   
	   $pdf->SetY($PosY);
	   $pdf->Cell(110);
	   $pdf->MultiCell(13,3,$row["dFinHorometraje"],0,1,'L');
	   	if($pdf->getY()>$Y)$Y=$pdf->getY();	   
	   $pdf->SetY($PosY);
	   $pdf->Cell(123);
	   $pdf->MultiCell(72,3,$row["mObservacion"],0,1,'L');
	   	  if($pdf->getY()>$Y)$Y=$pdf->getY();
	   $pdf->setY($Y);	  
	   
	   $pdf->RoundedRect(10, $PosY, 7,$Y-$PosY, 3.50, '0000');
		$pdf->RoundedRect(17, $PosY, 30,$Y-$PosY, 3.50, '0000');
		$pdf->RoundedRect(47, $PosY, 30,$Y-$PosY, 3.50, '0000');
		$pdf->RoundedRect(77, $PosY, 30,$Y-$PosY, 3.50, '0000');
		$pdf->RoundedRect(107, $PosY,13,$Y-$PosY, 3.50, '0000');
		$pdf->RoundedRect(120, $PosY,13,$Y-$PosY, 3.50, '0000');
		$pdf->RoundedRect(133, $PosY,72,$Y-$PosY, 3.50, '0000');
	  
	}
	$pdf->ln(2);
}
/*
$link = mysql_connect("127.0.0.1","root","danae");
mysql_select_db("geotechAdal",$link);
$pdf=new PDF();
//Agregar pagina
$pdf->AddPage();
//Poner fuente
$pdf->SetFont('Arial','',6);
relacionPersonalEquipo("425027849","JAGUARIN","AC-01","2008-04-30","JAGUARIN-052","A");
$pdf->Output(); */
?>
