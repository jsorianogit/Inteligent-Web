<?php
require ("reporteador.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
$reporte = new reporte();
/*$sql=" select 
 sContrato, dIdFecha, iIdDiario, sIdTurno, sIdDepartamento, sNumeroOrden, sWbs, sPaquete, sNumeroActividad,
 sIdTipoMovimiento, sHoraInicio, sHoraFinal, sFactor, dCantidad, dAvance, lGenerado, lAlcance, mDescripcion,
 sIsometrico, dCantidadAnterior, dAvanceAnterior, dCantidadActual, dAvanceActual
from bitacoradeactividades where sContrato ='939' and dIdFecha='2007-05-18'";
*/
$sql=" select 
*
from bitacoradeactividades where sContrato ='939' and sNumeroOrden='425026939' and dIdFecha='2007-05-18'";
$titulotabla="bitacoradeactividades";
$reporte->ponerconsulta($sql,1,$nomcampos,$titulotabla);
$reporte->imprimir();

$sql ="select 
*
 from actividadesxorden where sContrato ='939' and sNumeroOrden='425026939' and sTipoActividad='Actividad' order by dFechaFinal";
 $titulotabla="actividadesxorden ";
$reporte->ponerconsulta($sql,1,$nomcampos,$titulotabla);
$reporte->imprimir();

$sql ="select * from ordenesdetrabajo where sContrato ='939' and sNumeroOrden='425026939'";
 $titulotabla="actividadesxorden ";
$reporte->ponerconsulta($sql,1,$nomcampos,$titulotabla);
$reporte->imprimir();
//SELECT sNumeroOrden  FROM ordenesdetrabajo  WHERE sContrato='939'  ORDER BY sNumeroOrden
?>