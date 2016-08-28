<?php
require("../../../../../Modulos/include/mysql.inc.php");
#require("../../../../../Modulos/include/escalarImagen.php");
/**
 * @author Adalberto Reyes Valenzuela
 * @copyright 2007
 */
define('FPDF_FONTPATH','../fpdf153/font/');
include "../fpdf153/fpdf.php";
//include "../../../../Servidor.php";
if(isset($_REQUEST['sContrato']))$sContrato=$_REQUEST['sContrato'];
if(isset($_REQUEST['sNumeroOrden']))$sNumeroOrden=$_REQUEST['sNumeroOrden'];
if(isset($_REQUEST['dFecha']))$dFecha=$_REQUEST['dFecha'];
if(isset($_REQUEST['sIdTurno']))$sIdTurno=$_REQUEST['sIdTurno'];
if(isset($_REQUEST['sIdConvenio']))$sIdConvenio=$_REQUEST['sIdConvenio'];
if(isset($_REQUEST['lStatus']))$sIdStatus=$_REQUEST['lStatus'];
/*
$sContrato='418235943';	 
$sNumeroOrden='418235943-AKAL-C1';
//$sNumeroReporte='418235943-AKAL-C-PP-134';
$dFecha="2007-03-29";
$sIdTurno="A";
$noMostrar="EQ-S";
$sIdConvenio="C-01";*/
include "rpt_encabezado_Pie.php";
$pdf=new PDF('P','mm','Letter');
//$pdf->$sContrato=$sContrato;
/*
incluir tablas faltantes
*/
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
include "rpt_periodo_fecha.php";
include "rpt_partidas.php";
include "rpt_avances.php" ;
include "rpt_tiemposMuertos.php";
include "rpt_permisos.php";
include "rpt_comentarios.php";
include "rpt_reporte.php";
include "rpt_imagen.php";


/*Agregar pagina*/
$pdf->AliasNbPages();
$pdf->AddPage();
/*Poner fuente*/

$pdf->SetFont('Arial','',6);
if(isset($_REQUEST['sContrato']))$sContrato=$_REQUEST['sContrato'];
if(isset($_REQUEST['sNumeroOrden']))$sNumeroOrden=$_REQUEST['sNumeroOrden'];
if(isset($_REQUEST['dFecha']))$dFecha=$_REQUEST['dFecha'];
if(isset($_REQUEST['sIdTurno']))$sIdTurno=$_REQUEST['sIdTurno'];
if(isset($_REQUEST['sIdConvenio']))$sIdConvenio=$_REQUEST['sIdConvenio'];
if(isset($_REQUEST['lStatus']))$sIdStatus=$_REQUEST['lStatus'];
Periodos_Fechas($sContrato,$dFecha,$sNumeroOrden,$sIdTurno,$sIdConvenio);
fnImprimeTitulo();
fnImprimePartidas($sContrato,$dFecha,$sNumeroOrden,$sIdTurno,$sIdConvenio,$sIdStatus) ;
fnImprimeAvances($sContrato,$dFecha,$sNumeroOrden,$sIdTurno,$sIdConvenio,$sIdStatus) ;
if($TodosAutorizado==0)	{
		$pdf->ln(5);
		$pdf->SetFont('Arial','',5);
		$pdf->SetFillColor(187,187,255);
		$pdf->SetTextColor(0,0,251);
		$pdf->Cell(0,3,"EXISTEN REPORTES DIARIOS DE OTRAS ORDENES DE TRABAJO SIN VALIDAR/AUTORIZAR EN EL DIA, POR TAL NO SE PUEDE REFLEJAR EL AVANCE REAL Y LOS TIEMPOS 
MUERTOS REALES DEL CONTRATO.",1,1,'C',1);
		$pdf->ln(2);
	}
Permisos($sContrato,$dFecha,$sNumeroOrden,$sIdTurno);
if($TodosAutorizado!=0)
	fnImprimeTiemposMuertos($sContrato,$dFecha,$sNumeroOrden,$sIdTurno,$sIdConvenio,$sIdStatus);
Comentario($sContrato,$dFecha,$sNumeroOrden,$sIdTurno);
Tablas($sContrato,$dFecha,$sNumeroOrden,$sIdTurno);
GetImageFotografico($sContrato,$dFecha,$sNumeroOrden,$sIdTurno);

//$pdf->Output($sContrato.'.pdf'); 
$pdf->Output(); 

?>
