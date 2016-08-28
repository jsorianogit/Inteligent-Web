<?php require("volumenes.inc.php"); 
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
/*Obtener los datos del reporte diario*/
$form = new reportediario();

/*obtener el filtro*/
//$Filtro=encrypt($_REQUEST['Sql'],1);
$sContrato;
$_REQUEST['sNumeroOrden'];
if(isset($_REQUEST['dIdFecha']))
	$_SESSION['fecha']=$_REQUEST['dIdFecha'];
//}
?>
<html>
<head>
<title>
</title>
</head>
<body>
<center>
<!-- Numero de Orden -->
<form name='sNumeroOrden' action="<?php echo $PHP_SELF?>"  method="post">
<?php
if(isset($_REQUEST['sNumeroOrden']))
	$_SESSION['sNumeroOrden']=$_REQUEST['sNumeroOrden'];
$sNumeroOrden=$_SESSION['sNumeroOrden'];
?>
</form>
<!-- Numero de Actividad -->
<form name='actividad' action="<?php echo $PHP_SELF?>"  method="post">
<?php
if(isset($_POST['sNumeroActividad']))
	$_SESSION['sNumeroActividad']=$_POST['sNumeroActividad'];
$sNumeroActividad=$_SESSION['sNumeroActividad'];
$sql ="select DISTINCT sNumeroActividad from actividadesxorden where sContrato ='$sContrato' and sNumeroOrden='$sNumeroOrden' and sTipoActividad='Actividad'";
$result = mysql_query($sql);
print ("Numero de Activiad<select name='sNumeroActividad' onChange='document.actividad.submit()'>");
print ("<option></option>");
while ($row=mysql_fetch_array($result)){
	$seleccionar = ($sNumeroActividad==$row[0]) ?"selected":"";
	print ("<option $seleccionar >$row[0]</option>");	
}
print ("</select>");
?>
</form>
<table>
<tr>
<td>
<!-- sWbs -->
<form name='wbs' action="<?php echo $PHP_SELF?>" method="post">
<?php
$swbs=$_POST['swbs'];
$sql ="select sWbs,dCantidad,dPonderado,mDescripcion from actividadesxorden where sContrato ='$sContrato' and sNumeroOrden='$sNumeroOrden'  and sNumeroActividad='$sNumeroActividad' and sTipoActividad='Actividad'";
$result = mysql_query($sql);
print ("Concepto<select name='swbs' onChange='document.wbs.submit()'>");
print ("<option></option>");
while ($row=mysql_fetch_array($result)){
	if($swbs==$row[0]){
		$seleccionar="selected";
		$dCantidad=$row[1];	
		$dPonderado=$row[2];
		$mDescripcion=$row[3];
	}
	else
		$seleccionar="";
	print ("<option $seleccionar>$row[0]</option>");	
}
print ("</select>");
?>
</td>
<!-- Descripcion del sWbs -->
<td>
<?php
	$reporte = new reporte();
	$sql="select sWbs,sNumeroActividad,dCantidad,sMedida,dInstalado,dExcedente,(dCantidad-dInstalado),dPonderado from actividadesxorden where sContrato ='$sContrato' and sNumeroOrden='$sNumeroOrden'  and sNumeroActividad='$sNumeroActividad' and sTipoActividad='Actividad' and sWbs = '$swbs'";
	$titulotabla="Detalles de la Actividad";
	$nomcampos = array("sWbs","Partida","Cantidad","Medida","Instalado","Excedente","Restante","Ponderado");
	$reporte->ponerconsulta($sql,1,$nomcampos,$titulotabla);
	$reporte->imprimir();
?>
</td>
</tr>
</form>


</table>
<!-- Formulario de Almacenamiento -->
<table>
<form name='salvar' action="salvarvolumenes.php" method="post">
<tr>
	<td>
		Fecha
	</td>
	<td>
		<input type="text" name="fecha" value="<?php echo $_SESSION['fecha']?>"  readonly>
	</td>
	<td>
		Turno
	</td>
	<td>
		<?php
			$sql =" select sIdTurno,sDescripcion from turnos where sContrato='$sContrato'";
			$result = mysql_query($sql);
			print("<select name='sIdTurno'>");
			while($row=mysql_fetch_array($result)){
				print("<option value=$row[0]>$row[1]</option>");
			}
			print("</select>");
		?>
	</td>
</tr>
<tr>
	<td>
		Numero de Orden
	</td>
	<td>
		<input type="text" name="sNumeroOrden" value="<?php echo $sNumeroOrden?>" readonly>
	</td>
	<td>
		Numero de Actividad
	</td>
	<td>
		<input type="text" name="sNumeroActivdad" value="<?php echo $sNumeroActividad?>" readonly>
	</td>
</tr>
<tr>
	<td>
		Partida
	</td>
	<td>
		<input type="text" name="swbs" value="<?php echo $swbs?>" readonly>
	</td>
	<td>
		Tipo
	</td>
	<td>
		<?php
			$sql ="select sIdTipoMovimiento , sDescripcion from tiposdemovimiento where sContrato='$sContrato'
			and (sClasificacion like 'Tiempo en Operacion' OR sClasificacion like 'Notas') order by sDescripcion";
			$result = mysql_query($sql);
			print("<select name = 'sIdTipoMovimiento'>\n");
			while($row = mysql_fetch_array($result)){
				$seleccionar =(trim($row[1])=="VOLUMEN DE OBRA")?"selected":"";
				print("<option $seleccionar value='$row[0]'>$row[1]</option>\n");
			}
			print("</select>\n");
		?>
	</td>
</tr>
<tr>
	<td>
		Cantidad 
	</td>
	<td>
		<input type="text" name="cantidad" value="<?php echo $dCantidad?>" readonly>
	</td>
	<td>
		Cantidad a Instalar
	</td>
	<td>
		<input type="text" name="cantidadIns" value="0">
	</td>
</tr>
<tr>
	<td>
		Ponderado
	</td>
	<td>
		<input type="text" name="dPonderado" value="<?php echo $dPonderado?>" readonly>
	</td>
	<td>
		Comentarios
	</td>
	<td>
		<textarea name="comentarios"   rows="3" cols="80"><?php echo $mDescripcion?></textarea>
	</td>
</tr>
<tr>
	<td colspan="4">
		<center>
			<input type="submit" value="Aceptar">
		</center>
	</td>
</tr>
</table>
</form>
<?php
$ocultos = array ("sContrato","sPaquete","sNumeroOrden");
//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","iIdDiario","sWbs","sNumeroActividad","sNumeroOrden","dIdFecha");
$tablasrelaciones = array ("none");
//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
$sqlGeneral="select 
bitacoradeactividades.sContrato,
bitacoradeactividades.sNumeroOrden,
bitacoradeactividades.dIdFecha,
bitacoradeactividades.iIdDiario,
bitacoradeactividades.sWbs,
bitacoradeactividades.sPaquete,
bitacoradeactividades.sNumeroActividad,
turnos.sDescripcion,
tiposdemovimiento.sDescripcion,
bitacoradeactividades.dCantidad,
bitacoradeactividades.dAvance,
actividadesxorden.sMedida,
actividadesxorden.dVentaMN as dVentaMN,
(bitacoradeactividades.dCantidad*actividadesxorden.dVentaMN) as dCostoMN 
from bitacoradeactividades  INNER JOIN  turnos  on (bitacoradeactividades.sContrato=turnos.sContrato AND bitacoradeactividades.sIdTurno=turnos.sIdTurno) INNER JOIN actividadesxorden  ON(bitacoradeactividades.sContrato=actividadesxorden.sContrato AND bitacoradeactividades.sNumeroActividad=actividadesxorden.sNumeroActividad AND bitacoradeactividades.sWbs=actividadesxorden.sWbs) INNER JOIN tiposdemovimiento  ON (bitacoradeactividades.sContrato=tiposdemovimiento.sContrato AND bitacoradeactividades.sIdTipoMovimiento=tiposdemovimiento.sIdTipoMovimiento) where bitacoradeactividades.sContrato ='$sContrato' and bitacoradeactividades.dIdFecha='".$_SESSION['fecha']."'";

//formulario objeto
$form->formulario($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);

	
/*si se ha iniciado una nueva consulta, destruir la actual*/
if (!isset($_SESSION['sqlAnterior'])){
	$_SESSION['sqlAnterior']=$sqlGeneral;
}
else if ($_SESSION['sqlAnterior'] != $sqlGeneral){
	$_SESSION['sqlAnterior']=$sqlGeneral;
   unset($_SESSION['OrdenarPor']);
	unset($_REQUEST);
	unset($_REQUEST);
	unset($_POST);
}

/*obtener el filtro*/
if( isset($_REQUEST['Sql'])){
   $Filtro=encrypt($_REQUEST['Sql'],1);
   $_SESSION['sCondicion']=$Filtro=$form->limpiar($Filtro);
}
/*Validar Segun enlace seguido para Eliminar bitacora*/
if ( isset($_REQUEST['operacion'])){
	 switch($_REQUEST['operacion']){
		case ('b'):
		   //hace un delete segun link seguido 
			$form->crearDelete( $_SESSION['sCondicion'] );
		   break;
	}
}

	
//recoge la pagina actual para el paginador
if(isset($_REQUEST['pag'])){
	$_SESSION['pagActual']=$_REQUEST['pag'];
	$pag=$_REQUEST['pag'];
}
elseif(isset($_SESSION['pagActual']))
	$pag=$_SESSION['pagActual'];
elseif(!isset($pag))
	$pag=1;
//Recoge el campo para el ORDER BY (En esta Seccion no es Aplicable)
if(isset($_REQUEST['order'])){
	$_SESSION['OrdenarPor'] = $_REQUEST['order'];
}
$nombres = array("Fecha","Id","Wbs","Concepto","Turno/Origen","Movimiento","Cantidad","Avance","Unidad","P. Unitario","Total");
echo "<center><a href ='reportediario.php'>[Regresar]</a></center>";
$form->visualizar($pag,$_SESSION['OrdenarPor'],$nombres);
unset($_REQUEST);
mysql_close();
?>
</table>
</center>
</body>
</html>