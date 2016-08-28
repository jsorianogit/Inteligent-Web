<?php session_start(); $Fecha = $_POST['Fecha']; $actividad= $_POST['actividad']; $consolidar= $_POST['consolidar']; 
require ("../../../include/reporteador.inc.php");
?>
<html>
	<head>
		<link href="estilos.css" rel="stylesheet" type="text/css" media="screen" />
		<script type="text/javascript" src="acc_calendar/acc_calendar.js"></script>
		<style type="text/css">@import 'estilo1.css';</style>
		<script language="javascript" >
			parent.frames[1].document.location="coincidencias.php";
		</script>
	</head>
<body >
<center> 	
<table border=1 >
<tr>
<td style="vertical-align: top" >
<table border=1 >
<form name = "formulario" action="<?php echo $PHP_SELF?>" method="post">
<tr>
      <th>Numero de Concepto</th><td><input type = "text" name = "actividad" value="<?php echo $actividad ?>"></td>
</tr>
<tr>
    <th>Fecha</th>
	<td>
		<label for="Fecha"><input class="fecha rang10" type="text" id="Fecha" name="Fecha" value="<?php echo $Fecha ?>" /></label>
	</td>
</tr>
<tr>
    <th>Consolidar por Partida Anexo</th>
	<td>
		
		<input type="checkbox" value="si" <?php echo $consolidar=="si" ? "checked":""; ?> name="consolidar" >
	</td>
</tr>

<tr>
	<td>
		<input type="submit" value="Aceptar">
	</td>
</tr>
</form>
</table>
<td>
<form name="resultado">
<table>
	<tr>
		<td>
			Reportado
		</td>
		<td>
			<input type="text" name="reportado" readonly>
		</td>

	</tr>
	<tr>
		<td>
			Generado
		</td>
		<td>
			<input type="text" name="generado" readonly>
		</td>

	</tr>
	<tr>
		<td>
			Por Generar
		</td>
		<td>
			<input type="text" name="porgenerado" readonly>
		</td>

	</tr>
</table>
</form>
</td>

<?php

//get convenio
$sIdConvenio='';
$sql="SELECT c.sIdConvenio,c2.dFechaInicio,c2.dFechaFinal,c2.dMontoMN FROM configuracion c INNER JOIN convenios c2 ON (c.sContrato=c2.sContrato AND c.sIdConvenio=c2.sIdConvenio) WHERE c.sContrato='$sContrato'";
$resultado=mysql_query($sql,$link);
if($row=mysql_fetch_array($resultado)){
	$sIdConvenio=$row['sIdConvenio'];
}
//create the object
$resultado = new reporte();
//imprime los detalles de la actividad
$sql="Select sWbs, dCantidadAnexo, sMedida, dVentaMN, dPonderado, dInstalado, dExcedente , (dCantidadAnexo-dInstalado) from actividadesxanexo Where sContrato = '$sContrato' and sIdConvenio = '$sIdConvenio' and sNumeroActividad='$actividad' and sTipoActividad = 'Actividad'";
$titulo = array("sWbs","Cantidad","Medida","Precio MN","Ponderado",
"Instalado","Excedente","Pendiente");
$resultado->ponerconsulta($sql,1,$titulo);
echo "<td valign='top' align='rigth'>";
$resultado->imprimir();
echo "</td></tr>";

//imprime las actividades segun la fecha
$sql="Select sNumeroOrden, sWbsAnterior, sWbs, sNumeroActividad, mDescripcion, sMedida, dCantidad, dVentaMN, dFechaInicio, dFechaFinal, dInstalado, dExcedente,(dCantidad-dInstalado) as dPendiente, dPonderado
From actividadesxorden Where sContrato ='$sContrato' And sIdConvenio = '$sIdConvenio' And sNumeroActividad = '$actividad' and sTipoActividad = 'Actividad' order by sNumeroOrden, iItemOrden";
$titulo = array("Orden","sWbs Anterior","Wbs","Actividad","Descripcion",
"Medida","Cantidad","Precio MN","Fecha Inicio","Fecha Final","Instalado","Excedente","Pendiente","Ponderado");
$result = mysql_query($sql);
echo "<tr><td colspan='2' valign='top' align='center'>";
echo "<table class='enhancedtablerowhover'>\n";
echo "<th>Orden</th>\n";
echo "<th>Wbs</th>\n";
echo "<th>Descripcion</th>\n";
echo "<th>Medida</th>\n";
echo "<th>Cantidad</th>\n";
echo "<th>Precio MN</th>\n";
echo "<th>Instalado</th>\n";
echo "<th>Excedente</th>\n";
echo "<th>Pendiente</th>\n";
echo "<th>Ponderado</th>\n";
while($row = mysql_fetch_array($result)){
	echo "<tr>\n";
	echo "<td>".$row['sNumeroOrden']."</td>\n";
	echo "<td><a href='coincidencias.php?orden=".$row['sNumeroOrden']."&wbs=".$row['sWbs']."&actividad=".$actividad."&fecha=".$Fecha."&consolidar=$consolidar' target='coincidencias'>".$row['sWbs']."</a></td>\n";
	echo "<td>".$row['mDescripcion']."</td>\n";
	echo "<td>".$row['sMedida']."</td>\n";
	echo "<td>".$row['dCantidad']."</td>\n";
	echo "<td>".$row['dVentaMN']."</td>\n";
	echo "<td>".$row['dInstalado']."</td>\n";
	echo "<td>".$row['dExcedente']."</td>\n";
	echo "<td>".$row['dPendiente']."</td>\n";
	echo "<td>".$row['dPonderado']."</td>\n";
	echo "<tr>\n";
}
echo "</table>\n";

 

mysql_close($link);
?>
</td>
</tr>
</table>
</center>
   </body>
</head>
</html>