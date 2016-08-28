<?php session_start();session_register('sOperacion','ssTipo');?>
<html>
<head>
</head>
<body>

<center>
<p>
<?php
require ("../../../include/reporteador.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
//obtener el convenio
$sql="SELECT c.sIdConvenio,c2.dFechaInicio,c2.dFechaFinal,c2.dMontoMN FROM configuracion c INNER JOIN convenios c2 ON (c.sContrato=c2.sContrato AND c.sIdConvenio=c2.sIdConvenio) WHERE c.sContrato='$sContrato'";
$resultado=mysql_query($sql,$link);
if($row=mysql_fetch_array($resultado)){
	$sIdConvenio=$row['sIdConvenio'];
}
//crear el reporte
$titulos = array ("Numero de Actividad","Descripcion","F. Inicio","F. Termino", "Cantidad","Unidad","PU MN","Total MN","%");
$reporte = new reporte();
$reporte->ponerconsulta("select 
sNumeroActividad,mDescripcion,dFechaInicio,dFechaFinal,dCantidadAnexo,sMedida,dVentaMN,(dVentaMN*dCantidadAnexo),dPonderado from 
actividadesxanexo where sContrato='$sContrato' and sIdConvenio='$sIdConvenio'",0,$titulos);
$reporte->imprimir();
?>
</center>
</p>
<p>
<?php
//imprimir el total de la actividad
$titulos = array ("Total Anexo \"C\" Sin Iva");
$reporte->ponerconsulta("select SUM(dVentaMN*dCantidadAnexo) as sVentaMN from actividadesxanexo where sContrato='$sContrato'  and sIdConvenio='$sIdConvenio'  group by sContrato",2,$titulos);
$reporte->imprimir();
?>
</p>

</body>
</html>
