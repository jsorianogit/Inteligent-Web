<?php
require ("../../../include/reporteador.inc.php");
?>
<html>
<head>
<?php
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
  echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
</head>
<?php
if(isset($_REQUEST['sNumeroActividad'])) $sNumeroActividad=$_REQUEST['sNumeroActividad'];
if($sNumeroActividad!="")$_SESSION['actividad']=$sNumeroActividad;
/*	$opciones= 	array(
			array("../reportediario.php","Validar Reporte Diario","","sContrato,dIdFecha,sNumeroOrden"),
			array("../reportediario.php","Autoriza Reporte Diario","","sContrato,dIdFecha,sNumeroOrden")
		);
	*/	
//$sql = " select iNumeroEstimacion,sNumeroOrden,sNumeroGenerador,lStatus,dFechaInicio,dFechaFinal from estimaciones where sContrato='$sContrato' ;";

 $sql = "SELECT  b.dIdFecha, 
		b.iIdDiario, 
		b.sNumeroOrden, 
		r.sNumeroReporte,
		b.sIdTurno, 
		b.sWbs, 
		b.dCantidad, 
		b.dAvance 	
FROM bitacoradeactividades b
	INNER JOIN tiposdemovimiento t
		ON (b.sContrato = t.sContrato And b.sIdTipoMovimiento = t.sIdTipoMovimiento And t.sClasificacion <> 'Notas'
		And t.sClasificacion <> 'Tiempo Muerto')
	INNER JOIN reportediario r
		ON (r.sContrato = b.sContrato And r.sNumeroOrden = b.sNumeroOrden And r.dIdFecha = b.dIdFecha And r.sIdTurno = b.sIdTurno)
		INNER JOIN turnos tu
	ON (r.sContrato = tu.sContrato And r.sIdTurno = tu.sIdTurno) WHERE b.sContrato = '$sContrato' And b.sNumeroActividad ='".$_SESSION['actividad']."'
	And b.dIdFecha <= '".date('Y-m-d')."' And b.dCantidad > 0";
		
$titulos = array ("Fecha","Id Diario","Numero de Orden","Numero de Reporte","Turno","Wbs","Cantidad","Avance");
$reporte = new reporte();
$reporte->opciones($opciones);
$reporte->ponerconsulta($sql,1,$titulos,"");
?>
<body>
<?php
echo "<center>";
if(mysql_fetch_array(mysql_query($sql)))
$reporte->visualizar();
$totalReportado=0;
$sql = "
Select  sum(b.dCantidad)
From bitacoradeactividades b
	INNER JOIN tiposdemovimiento t
		ON (b.sContrato = t.sContrato And b.sIdTipoMovimiento = t.sIdTipoMovimiento And t.sClasificacion <> 'Notas'
		And t.sClasificacion <> 'Tiempo Muerto')
	INNER JOIN reportediario r
		ON (r.sContrato = b.sContrato And r.sNumeroOrden = b.sNumeroOrden And r.dIdFecha = b.dIdFecha And r.sIdTurno = b.sIdTurno)
		INNER JOIN turnos tu
	ON (r.sContrato = tu.sContrato And r.sIdTurno = tu.sIdTurno) Where b.sContrato = '$sContrato' And b.sNumeroActividad ='".$_SESSION['actividad']."'
	And b.dIdFecha <= '".date('Y-m-d')."' And b.dCantidad > 0";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
	$totalReportado = $row[0];
}
echo "Total Reportado : <input type='text' value='$totalReportado' readonly>";
echo "<center>";
?>
</body>
</html>