<?php session_start();?>
<html>
   <head>
      <style type='text/css'>@import 'estilo1.css';</style>
	</head>
<body>
<center>
<table>
<?php
require ("../../../include/reporteador.inc.php");
$orden=$_REQUEST['orden'];
$wbs = $_REQUEST['wbs'];
$actividad=$_REQUEST['actividad'];
$fecha = $_REQUEST['fecha'];
$consolidar = $_REQUEST['consolidar'];
//get convenio
$sIdConvenio='';
$sql="	SELECT c.sIdConvenio,c2.dFechaInicio,c2.dFechaFinal,c2.dMontoMN 
			FROM configuracion c INNER JOIN convenios c2 ON (c.sContrato=c2.sContrato AND c.sIdConvenio=c2.sIdConvenio) 
			WHERE c.sContrato='$sContrato'";
$resultado=mysql_query($sql,$link);
if($row=mysql_fetch_array($resultado)){
	$sIdConvenio=$row['sIdConvenio'];
}
$reporte = new reporte();
$tablaReporte = "<font size=2 color='black'><h4><center>Reportes Diarios</center><h4></font>";
$tablaGenerador ="<font size=2 color='black'><h4><center>Generadores de Obra</center><h4></font>";
$tituloReportes = array("Fecha","Numero de Orden","Numero de Reporte","Turno","Paquetes","Cantidad","Avance","Status");
$tituloGenera = array("Numero de Orden","Numero Estimacion","Numero Generador","Fecha Inicio","Fecha Fin.","Status","Isometrico","Prefijo","Cantidad");
if($consolidar=="si")
{
	//Generado Total
	$totalGenerado=0;
	$sql = "Select sum(e.dCantidad) as dCantidad 
				From estimacionxpartida e 
				INNER JOIN estimaciones e1 
					ON (e.sContrato = e1.sContrato And e.sNumeroOrden = e1.sNumeroOrden And e.sNumeroGenerador = e1.sNumeroGenerador 
						And e1.lStatus = 'Autorizado') 
				where e.sContrato = '$sContrato' And e.sNumeroActividad = '$actividad' And e1.dFechaFinal <= '$fecha' And e.lEstima = 'Si' 
				Group By e.sNumeroActividad";
	$result = mysql_query($sql);
	if($row=mysql_fetch_array($result)){
		$totalGenerado =$row[0];
	}
	//Reportado Total
	$totalReportado=0;
	$sql = "	Select Sum(dCantidad) as dCantidad 
				From bitacoradeactividades 
				Where sContrato = '$sContrato' And sNumeroActividad = '$actividad' And dIdFecha <= '$fecha' 
				Group By sNumeroActividad";
	$result = mysql_query($sql);
	if($row=mysql_fetch_array($result)){
		$totalReportado =$row[0];
	}

	$sql = "	Select  b.dIdFecha, b.sNumeroOrden, r.sNumeroReporte,b.sIdTurno, b.sPaquete, b.dCantidad, b.dAvance,r.lStatus 	
				From bitacoradeactividades b 
				INNER JOIN tiposdemovimiento t ON (b.sContrato = t.sContrato And b.sIdTipoMovimiento = t.sIdTipoMovimiento 
						And t.sClasificacion <> 'Notas' And t.sClasificacion <> 'Tiempo Muerto') 
					INNER JOIN reportediario r ON (r.sContrato = b.sContrato And r.sNumeroOrden = b.sNumeroOrden 
						And r.dIdFecha = b.dIdFecha And r.sIdTurno = b.sIdTurno) 
					INNER JOIN turnos tu ON (r.sContrato = tu.sContrato And r.sIdTurno = tu.sIdTurno) 
					Where b.sContrato = '$sContrato' And b.sNumeroActividad = '$actividad' And b.dIdFecha <= '$fecha' And b.dCantidad > 0 ";
	$result = mysql_query ($sql);
	echo "<tr><td  valign='top'>";
	echo $tablaReporte;
	echo "<table class='enhancedtablerowhover'>";
	echo "<tr>";
	foreach($tituloReportes as $titulo)
		echo "<th>$titulo</th>";
	echo "</tr>";
	while ($row =mysql_fetch_array($result)){
		echo "<tr>";
		for($i=0;$i<mysql_num_fields($result);$i++){
			echo "<td><a href=\"../../../../Acceso/scripts/php/Reportes/generadores/rptReporteDiario.php?sContrato=".$sContrato."&sNumeroOrden=$row[sNumeroOrden]&dFecha=$row[dIdFecha]&sIdTurno=$row[sIdTurno]&sIdConvenio=$sIdConvenio&lStatus=$row[lStatus]\" target=_blank >$row[$i]</a></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	echo "</td>";	
	/*	$reporte->ponerconsulta($sql,1,$tituloReportes) ;
		echo "<tr><td  valign='top'>";
		echo $tablaReporte;
		$reporte->imprimir();
		echo "</td>";*/
		
	$sql = "	Select  e2.sNumeroOrden,e2.iNumeroEstimacion,e2.sNumeroGenerador,e2.dFechaInicio, e2.dFechaFinal, e2.lStatus,e.sIsometrico,
					e.sPrefijo,e.dCantidad 
				From estimacionxpartida e 
				inner join estimaciones e2 on (e.sContrato = e2.sContrato 
					And e.sNumeroOrden = e2.sNumeroOrden And e.sNumeroGenerador = e2.sNumeroGenerador) 
				where e.sContrato = '$sContrato' And e.sNumeroActividad = '$actividad' And e2.dFechaFinal <= '$fecha' 
				Order By e2.iConsecutivo, e.sIsometrico ";
	$result = mysql_query ($sql);
	echo "<td  valign='top'>";
	echo $tablaGenerador;
	echo "<table class='enhancedtablerowhover'>";
	echo "<tr>";
	foreach($tituloGenera as $titulo)
		echo "<th>$titulo</th>";
	echo "</tr>";
	while ($row =mysql_fetch_array($result)){
		echo "<tr>";
		for($i=0;$i<mysql_num_fields($result);$i++){
			echo "<td><a href=\"../../../../Acceso/scripts/php/Reportes/generadores/rptCaratulaGenerador.php?sContrato=".$sContrato."&sNumeroOrden=$row[sNumeroOrden]&sNumeroGenerador=$row[sNumeroGenerador]\" target=_blank >$row[$i]</a></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	echo "</td><tr>";	
	
}
else
{
	//Generado Total
	$totalGenerado=0;
	$sql = "Select sum(e.dCantidad) as dCantidad 
				From estimacionxpartida e INNER JOIN estimaciones e1 ON (e.sContrato = e1.sContrato And e.sNumeroOrden = e1.sNumeroOrden 
					And e.sNumeroGenerador = e1.sNumeroGenerador And e1.lStatus = 'Autorizado') 
				where e.sContrato = '$sContrato' And e.sNumeroActividad = '$actividad' And e1.dFechaFinal <= '$fecha' And e.lEstima = 'Si' 
				Group By  e.sNumeroActividad";
	$result = mysql_query($sql);
	if($row=mysql_fetch_array($result)){
		$totalGenerado =$row[0];
	}
		//Reportado Total
	$totalReportado=0;
	$sql = "	Select Sum(dCantidad) as dCantidad From bitacoradeactividades 
				Where sContrato = '$sContrato' And sNumeroActividad = '$actividad' And dIdFecha <= '$fecha' 
				Group By sNumeroActividad";
	$result = mysql_query($sql);
	if($row=mysql_fetch_array($result)){
		$totalReportado =$row[0];
	}
	$sql = "	Select b.dIdFecha, b.sNumeroOrden, r.sNumeroReporte,b.sIdTurno, b.sPaquete, b.dCantidad, b.dAvance,r.lStatus   
				From bitacoradeactividades b 
				INNER JOIN tiposdemovimiento t ON (b.sContrato = t.sContrato And b.sIdTipoMovimiento = t.sIdTipoMovimiento 
					And t.sClasificacion <> 'Notas' And t.sClasificacion <> 'Tiempo Muerto') 
				INNER JOIN reportediario r ON (r.sContrato = b.sContrato And r.sNumeroOrden = b.sNumeroOrden And r.dIdFecha = b.dIdFecha 
					And r.sIdTurno = b.sIdTurno) INNER JOIN turnos tu ON (r.sContrato = tu.sContrato And r.sIdTurno = tu.sIdTurno) 
				Where b.sContrato =  '$sContrato'  And b.sNumeroOrden = '$orden' And b.sPaquete = '$wbs' And b.sNumeroActividad = '$actividad' 
					And b.dIdFecha <= '$fecha' And b.dCantidad > 0";
	$result = mysql_query ($sql);
	echo "<tr><td  valign='top'>";
	echo $tablaReporte;
	echo "<table class='enhancedtablerowhover'>";
	echo "<tr>";
	foreach($tituloReportes as $titulo)
		echo "<th>$titulo</th>";
	echo "</tr>";
	while ($row =mysql_fetch_array($result)){
		echo "<tr>";
		for($i=0;$i<mysql_num_fields($result);$i++){
			echo "<td><a href=\"../../../../Acceso/scripts/php/Reportes/generadores/rptReporteDiario.php?sContrato=".$sContrato."&sNumeroOrden=$row[sNumeroOrden]&dFecha=$row[dIdFecha]&sIdTurno=$row[sIdTurno]&sIdConvenio=$sIdConvenio&lStatus=$row[lStatus]\" target=_blank >$row[$i]</a></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	echo "</td>";	
	if($_SESSION['database']=="intel-code") $paquete = "sWbs";
	else $paquete ="sPaquete";

	$sql = "	Select e2.sNumeroOrden,e2.iNumeroEstimacion,e2.sNumeroGenerador,e2.dFechaInicio, e2.dFechaFinal, 
				e2.lStatus,e.sIsometrico,e.sPrefijo,e.dCantidad  
				From estimacionxpartida e 
				inner join estimaciones e2 on (e.sContrato = e2.sContrato And e.sNumeroOrden = e2.sNumeroOrden 
					And e.sNumeroGenerador = e2.sNumeroGenerador) where e.sContrato = '$sContrato' And e.sNumeroOrden = '$orden' And e.$paquete= '$wbs' 
					And e.sNumeroActividad = '$actividad' And e2.dFechaFinal <= '$fecha' 
				Order By e2.iConsecutivo, e.sIsometrico ";
	if($wbs !="" )
	   $result = mysql_query ($sql);
	echo "<td  valign='top'>";
	echo $tablaGenerador;
	echo "<table class='enhancedtablerowhover'>";
	echo "<tr>";
	foreach($tituloGenera as $titulo)
		echo "<th>$titulo</th>";
	echo "</tr>";
	if($wbs !="" )
	while ($row =mysql_fetch_array($result)){
		echo "<tr>";
		for($i=0;$i<mysql_num_fields($result);$i++){
			echo "<td><a href=\"../../../../Acceso/scripts/php/Reportes/generadores/rptCaratulaGenerador.php?sContrato=".$sContrato."&sNumeroOrden=$row[sNumeroOrden]&sNumeroGenerador=$row[sNumeroGenerador]\" target=_blank >$row[$i]</a></td>";
		}
		echo "</tr>";
	}
	echo "</table>";
	echo "</td><tr>";	
}
?>
<script language="javascript">
	parent.frames[0].document.resultado.reportado.value=<?php echo $totalReportado ?> ;
	parent.frames[0].document.resultado.generado.value=<?php echo $totalGenerado ?> ;
	parent.frames[0].document.resultado.porgenerado.value=<?php echo $totalReportado-$totalGenerado ?> ;

//window.frames[1].window.document.bgColor
//window.frames[1].self.document.bgColor 
</script>
</table>
</body>
</html>