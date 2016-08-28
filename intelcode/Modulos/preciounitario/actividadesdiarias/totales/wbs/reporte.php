<?php 
session_start();
?>
<html>
<head>
<body>
<center>
<table border="4" bgcolor="#000000">
<tr><td>
<?php
require ("../../../../include/reporteador.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";


$fechaInicio = $_POST['fechaini'];
$fechaFinal = $_POST['fechafin'];
$sNumeroOrden = $_POST['sNumeroOrden'];
$ordenar = $_POST['ordenar'];
if($ordenar == "Si"){
	$CompletarSql="AND b.sNumeroOrden='$sNumeroOrden'";
}
else{
	$CompletarSql="";
}
/*
$sNumeroOrden='425026939';
$fechaInicio='2007-05-01';
$fechaFinal='2007-05-31';
*/
$reporte = new reporte();

/*########################## BITACORA DE ACTIVIDADES ##########################*/
echo "<table><tr><td>";
$dCostototal=0;
$totales = array("Costo Total");
$personal = array("Fecha","Wbs","Descripcion","Cantidad","UM","Precio Unitario","Total MN");
//obtener el total de bitacora de actividades
$sql = "SELECT sum(a.dVentaMN * b.dCantidad) FROM bitacoradeactividades b INNER JOIN actividadesxorden a ON (b.sWbs=a.sWbs AND b.sContrato=a.sContrato and b.sNumeroOrden=a.sNumeroOrden and b.dCantidad>0) AND b.sContrato='$sContrato' $CompletarSql AND b.dIdFecha>='$fechaInicio' AND b.dIdFecha<='$fechaFinal'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
	$dCostototal=$row[0];
}
$dCostototal=number_format($dCostototal,2,'.',',');
//obtener los registros
$sql = "SELECT b.dIdFecha,b.sWbs, b.mDescripcion,sum(b.dCantidad),a.sMedida,a.dVentaMN,(a.dVentaMN * sum(b.dCantidad)) as dCostoConcepto FROM bitacoradeactividades b INNER JOIN actividadesxorden a ON (b.sWbs=a.sWbs AND b.sContrato=a.sContrato and b.sNumeroOrden=a.sNumeroOrden ) AND b.sContrato='$sContrato' $CompletarSql AND b.dIdFecha>='$fechaInicio' AND b.dIdFecha<='$fechaFinal' group by b.sWbs order by b.dIdFecha";
//imprimir resultados
$reporte->ponerconsulta($sql,1,$personal,'Conceptos/Partidas del Contrato');
$reporte->imprimir();
$reporte->ponerconsulta("SELECT '$dCostototal' as dCostototal FROM dual",1,$totales,'Total Generado en el Periodo');
$reporte->imprimir();
echo "</td></tr></table>";
echo "</td></tr>";
echo "<tr><td>";
/*########################## BITACORA DE PERSONAL ##########################*/
echo "<table><tr><td>";
$dCostototal=0;
$dVentatotal=0;
$totales = array("Costo Total","Venta Total");
$personal = array("Fecha","Descripcion","UM","Costo MN","Venta MN","Cantidad","Costo MN Total","Venta MN Total");
//obtener el total de bitacora de actividades
$sql = "SELECT sum(p.dCostoMN *b.dCantidad),sum(p.dVentaMN * b.dCantidad) FROM bitacoradepersonal b INNER JOIN personal p on (b.sContrato=p.sContrato AND b.sIdPersonal=p.sIdPersonal ) AND b.sContrato='$sContrato' AND b.dIdFecha>='$fechaInicio' AND b.dIdFecha<='$fechaFinal' ";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
	$dCostototal=$row[0];
	$dVentatotal=$row[1];
}
$dCosto=number_format($dCostototal,2,'.',',');
$dVenta=number_format($dVentatotal,2,'.',',');
//obtener los registros
$sql = "SELECT b.dIdFecha,p.sDescripcion,p.sMedida,p.dCostoMN,p.dVentaMN,sum(b.dCantidad),(p.dCostoMN*sum(b.dCantidad)),(p.dVentaMN*sum(b.dCantidad)) FROM bitacoradepersonal b INNER JOIN personal p on (b.sContrato=p.sContrato AND b.sIdPersonal=p.sIdPersonal ) AND b.sContrato='$sContrato' AND b.dIdFecha>='$fechaInicio' AND b.dIdFecha<='$fechaFinal' group by b.sIdPersonal order by b.dIdFecha";
//imprimir resultados
$reporte->ponerconsulta($sql,1,$personal,'Personal de Construccion');
$reporte->imprimir();
$reporte->ponerconsulta("SELECT '$dCosto' as dCostototal,'$dVenta' as dVentatotal FROM dual",1,$totales,'Costo Total del Periodo');
$reporte->imprimir();
echo "</td></tr></table>";
echo "</td></tr>";
echo "<tr><td>";
/*########################## BITACORA DE EQUIPO ##########################*/
echo "<table><tr><td colspan=2>";
$personal = array("Fecha","Descripcion","Cantidad","UM","Costo MN","Venta MN");
$totales = array("Costo Total","Venta Total");
$dCostoequipo=$dCostototal;
$dVentaequipo=$dVentatotal;
$dCosto=0;
$dVenta=0;
//obtener el total de bitacora de actividades
$sql = "SELECT sum(e.dCostoMN *b.dCantidad),sum(e.dVentaMN * b.dCantidad) FROM equipos e INNER JOIN bitacoradeequipos b ON (b.sContrato=e.sContrato AND b.sIdEquipo = e.sIdEquipo) AND b.sContrato='$sContrato' AND b.dIdFecha >='$fechaInicio' AND b.dIdFecha<='$fechaFinal'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
	$dCosto=$row[0];
	$dVenta=$row[1];
}
$dCostoequipo=$dCostoequipo+$dCosto;
$dVentaequipo=$dVentaequipo+$dVenta;
$dCostoequipo=number_format($dCostoequipo,2,'.',',');
$dVentaequipo=number_format($dVentaequipo,2,'.',',');
//obtener los registros
$sql = "SELECT b.dIdFecha,e.sDescripcion,sum(b.dCantidad),e.sMedida,e.dCostoMN,e.dVentaMN FROM equipos e INNER JOIN bitacoradeequipos b ON (b.sContrato=e.sContrato AND b.sIdEquipo = e.sIdEquipo) AND b.sContrato='$sContrato' AND b.dIdFecha >='$fechaInicio' AND b.dIdFecha<='$fechaFinal'  group by b.sIdEquipo order by b.dIdFecha ";
//imprimir resultados
$reporte->ponerconsulta($sql,1,$personal,'Equipo de Construccion');
$reporte->imprimir();
echo "</td></tr><tr><td>";
$reporte->ponerconsulta("SELECT '$dCosto' as dCostototal,'$dVenta' as dVentatotal FROM dual",1,$totales,'Costo Total del Periodo');
$reporte->imprimir();
echo "</td><td>";
$reporte->ponerconsulta("SELECT '$dCostoequipo' as dCostoequipo,'$dVentaequipo' as dVentaequipo FROM dual",1,$totales,'Costo del Equipo en el Periodo');
$reporte->imprimir();
echo "</td></tr></table>";
mysql_close();
?>
</td></tr>
</table>
</center>
</body>
</html>