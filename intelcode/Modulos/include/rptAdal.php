<?php require("formulario.inc.php"); ?>
<html>
<head>
<?php
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
//get values
$fecha=$_POST['fecha'];
$sIdTurno=$_POST['sIdTurno'];
$numeroFolio=$_POST['numeroFolio'];
$EstadoTiempo=$_POST['EstadoTiempo'];
$horaInicio=$_POST['horaInicio'];
$horaTermino=$_POST['horaTermino'];
$tema=$_POST['tema'];
?>
<title>
</title>
</head>
<body>
<center>
<!-- Numero de Orden -->
<form name='sNumeroOrden' action="<?php echo $PHP_SELF?>"  method="post">
<?php
$sNumeroOrden=$_SESSION['sNumeroOrden'];
$sql ="SELECT sNumeroOrden  FROM ordenesdetrabajo  WHERE sContrato='$sContrato'  ORDER BY sNumeroOrden";
$result = mysql_query($sql);
print ("Numero de Orden<select name='sNumeroOrden' onChange='document.sNumeroOrden.submit()'>");
print ("<option></option>");
while ($row=mysql_fetch_array($result)){
	$seleccionar = ($sNumeroOrden==$row[0]) ?"selected":"";
	print ("<option $seleccionar >$row[0]</option>");	
}
print ("</select>");
?>
</form>
</tr>
</table>
<!-- Formulario de Almacenamiento -->
<table>
<form name='salvar' action="<?php echo $PHP_SELF ?>" method="post">
<tr>
	<td>
		Fecha
	</td>
	<td>
		<label for="fecha"><input class="fecha rang10" type="text" id="fecha" name="fecha" size="17" ></label>
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
		Numero de Folio
	</td>
	<td>
		<input type="text" name="numeroFolio" >
	</td>
	<td>
		Estado del Tiempo
	</td>
	<td>
		<input type="text" name="EstadoTiempo" >
	</td>
</tr>
<tr>
	<td>
		Platicas de Seguridad
	</td>
	<td>
		<input type="text" name="horaInicio" size="6" value ="00:00"> a
		<input type="text" name="horaTermino" size="6" value ="00:00">
	</td>
	<td>
		Tema
	</td>
	<td>
		<input type="text" name="tema" >
	</td>
</tr>
<tr>
	<td colspan="4">
		<center>
			<input type = "submit" value = "Guardar" >
		</center>
	</td>
</tr>
</table>
</form>
<?php

//Guardar el reporte diario
if(isset($sContrato) and 
	isset($fecha) and 
		isset($sNumeroOrden) and 
				isset($numeroFolio) and 
					isset($sIdTurno) and 
						isset($EstadoTiempo) and 
							isset($horaInicio) and 
								isset($horaTermino) and 
									isset($tema)){
	$sql ="INSERT INTO reportediario (sContrato,dIdFecha,sNumeroOrden,sIdConvenio,sNumeroReporte,sIdTurno,sTiempo	,sInicioPlatica,sFinalPlatica,sTema,sIdUsuario ) VALUES ('$sContrato','$fecha','$sNumeroOrden','$sIdConvenioAct','	$numeroFolio','$sIdTurno','$EstadoTiempo','$horaInicio','$horaTermino','$tema','".strtoupper($_SESSION['ssUsuario'])."')";
	mysql_query($sql);
}

//lista de campos que permaneceran bloqueados en insert o update
$bloqueados =array("reportediario.sContrato");

//lista de campos que no deben mostrarse en el grid
$ocultos =array("reportediario.sContrato","reportediario.sNumeroOrden","reportediario.sIdTurno");

//campos con los valores que deben contener en el formulario
//de insertar
$valdefaults = array("reportediario.sContrato"=>$sContrato);

//lista de tablas relacionadas con la actual, para efectos de 
//update y delete
$tablasrelaciones = array ("bitacoradeactividades");

//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("reportediario.sContrato","reportediario.dIdFecha","reportediario.sNumeroOrden","reportediario.sIdTurno");

//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
$sqlGeneral="SELECT
 reportediario.sContrato,
 reportediario.dIdFecha,
 reportediario.sNumeroOrden,
 reportediario.sIdTurno,
 turnos.sDescripcion,
 convenios.sDescripcion,
 reportediario.sNumeroReporte,
 reportediario.lStatus,
 reportediario.sIdUsuario,
 reportediario.sIdUsuarioAutoriza
FROM reportediario inner join convenios on (reportediario.sContrato=convenios.sContrato and reportediario.sIdConvenio=convenios.sIdConvenio) inner join configuracion on (convenios.sContrato=configuracion.sContrato and convenios.sIdConvenio=configuracion.sIdConvenio) inner join turnos on (reportediario.sContrato=turnos.sContrato) where reportediario.sContrato ='$sContrato'";

	
//formulario objeto
$form = new formulario($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);

//verifica las ralaciones
//$tablas = $form->relaciones("cuentas");
//foreach($tablas as $tabla)
//	echo "<br> $tabla";
	
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
	if(strpos($sqlGeneral,'WHERE') or strpos($sqlGeneral,'where'))
	{
		$sqlFiltro=$sqlGeneral." and ".$Filtro;
	}
	else
	{
		$sqlFiltro=$sqlGeneral." where ".$Filtro;
	}
}
/*Validar Segun enlace seguido*/
if ( isset($_REQUEST['operacion'])){
	 switch($_REQUEST['operacion']){
		case ('a'):
		    //crea el formulario para insertar
			$_SESSION['sOperacion']="Insertar";
			$form->CreaFormulario();
			break;
		case ('m'):
		    //crea el formulario para modificar
		   $_SESSION['sOperacion']="Modificar";
    	 	$form->CreaFormulario($sqlFiltro);
			break;
		case ('b'):
		   //hace un delete segun link seguido 
			$form->crearDelete( $_SESSION['sCondicion'] );
		   break;
	}
}

/*Realizar accion segun tipo de formulario (insert, update)*/
if(isset($_POST['aceptar'])){
 switch ($_POST['aceptar']){
	case "Insertar":
	   //hace un insert
		$form->crearInsert( $_POST , $HTTP_POST_FILES );
		$_POST['aceptar']=$_SESSION['sOperacion']="";
		break;
	case "Modificar":
	   //hace un update
		$form->crearUpdate( $_SESSION['sCondicion'] , $_POST , $HTTP_POST_FILES); 
		$_POST['aceptar']=$_SESSION['sOperacion']="";
		break;
}
	
}
$_SESSION['sOperacion']="Insertar";
echo "\n<center><a href='".$_SERVER[PHP_SELF]."?operacion=a'>".$_SESSION['sOperacion']."</a>";
//recoge la pagina actual para el paginador
if(isset($_REQUEST['pag'])){
	$_SESSION['pagActual']=$_REQUEST['pag'];
	$pag=$_REQUEST['pag'];
}
elseif(isset($_SESSION['pagActual']))
	$pag=$_SESSION['pagActual'];
elseif(!isset($pag))
	$pag=1;
//Recoge el campo para el ORDER BY
if(isset($_REQUEST['order'])){
	$_SESSION['OrdenarPor'] = $_REQUEST['order'];
}

//mostrar grid	
//unset($_REQUEST);
//unset($_REQUEST);
//unset($HTTP_POST_FILES);
//unset($_POST);
//unset($HTTP_POST_VARS);
$form->visualizar($pag,$_SESSION['OrdenarPor']);
mysql_close();
?>
</table>
</center>
</body>
</html>