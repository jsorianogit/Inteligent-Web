<?php
/**
 * @author Adalberto Reyes Valenzuela
 * @copyright 2007
 */
if(isset($_REQUEST['dFecha']))$dFecha=$_REQUEST['dFecha'];
if(isset($_REQUEST['sNumeroOrden']))$sNumeroOrden=$_REQUEST['sNumeroOrden'];
include "../../../../../include/mysql.inc.php";
define('FPDF_FONTPATH','../../../../../fpdf153/font/');
include "../../../../../fpdf153/fpdf.php";
require("rpt_encabezado_Pie.php");
require("rpt_comentarios.php");
$pdf=new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',6);
Comentario($_REQUEST['sContrato'],$_REQUEST['sNumeroOrden'],$_REQUEST['sIdConvenio'],$_REQUEST['iFolio']);
$pdf->Output(); 

?>
