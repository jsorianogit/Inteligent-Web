<?php require("reportediario.inc.php"); ?>
<html>
<head>
<?php
function quitarValor(){
	global $_POST,$_REQUEST,$_SESSION;
	unset($_SESSION['accion']);
	unset($_SESSION['sNumeroOrden']);
	unset($_SESSION['dIdFecha']);
	unset($_SESSION['sIdTurno']);
	unset($_REQUEST['sNumeroOrden']);
	unset($_REQUEST['dIdFecha']);
	unset($_REQUEST['sIdTurno']);
	$_REQUEST['sIdTurno']=$_REQUEST['dIdFecha']=$_REQUEST['sNumeroOrden']=NULL;
}
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
   $form = new reportediario();
//get values
if(isset($_POST['fecha']) and isset($_POST['sIdTurno']) and
		isset($_POST['numeroFolio']) and isset($_POST['EstadoTiempo']) and 
			isset($_POST['horaInicio']) and isset($_POST['horaTermino']) and 
				isset($_POST['tema'])){
				$fecha=$_POST['fecha'];
				$sIdTurno=$_POST['sIdTurno'];
				$numeroFolio=$_POST['numeroFolio'];
				$EstadoTiempo=$_POST['EstadoTiempo'];
				$horaInicio=$_POST['horaInicio'];
				$horaTermino=$_POST['horaTermino'];
				$tema=$_POST['tema'];
				$Guardar=$_POST['Guardar'];
}else if(isset($_REQUEST['sNumeroOrden']) and isset($_REQUEST['dIdFecha']) and isset($_REQUEST['sIdTurno'])){
	$sql = "SELECT sNumeroORden,dIdFecha,sIdTurno,sNumeroReporte,sTiempo,sInicioPlatica,sFinalPlatica,sTema FROM reportediario WHERE sContrato='$sContrato' AND sNumeroOrden='".$_REQUEST['sNumeroOrden']."' and dIdFecha='".$_REQUEST['dIdFecha']."' and sIdTurno='".$_REQUEST['sIdTurno']."'";
	$result = mysql_query($sql);
	if($row = mysql_fetch_array($result)){
			echo "<center><br><h3>Modificando</h3><br></center>";
		$fecha = $row['dIdFecha'];
		$sIdTurno = $row['sIdTurno'];
		$numeroFolio = $row['sNumeroReporte'];
		$EstadoTiempo = $row['sTiempo'];
		$horaInicio = $row['sInicioPlatica'];
		$horaTermino = $row['sFinalPlatica'];
		$tema = $row['sTema'];
		$_SESSION['accion']=$accion = "Modificar";
		$_SESSION['sNumeroOrden']=$_REQUEST['sNumeroOrden'];
		$_SESSION['dIdFecha']=$_REQUEST['dIdFecha'];
		$_SESSION['sIdTurno']=$_REQUEST['sIdTurno'];
	}
	unset($_REQUEST['sNumeroOrden']);
	unset($_REQUEST['dIdFecha']);
	unset($_REQUEST['sIdTurno']);
}
/*obtener el filtro*/
if( isset($_REQUEST['Sql'])){
   $Filtro=encrypt($_REQUEST['Sql'],1);
   $_SESSION['sCondicion']=$Filtro=$form->limpiar($Filtro);
}
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
print ("Numero de Orden<select name='sNumeroOrden'>");
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
		<label for="fecha"><input class="fecha rang10" type="text" id="fecha" name="fecha" size="17" value="<?php echo $fecha?>"></label>
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
				$seleccionar = ($sIdTurno==$row[0])?"selected":"";
				print("<option value=$row[0] $seleccionar>$row[1]</option>");
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
		<input type="text" name="numeroFolio" value="<?php echo $numeroFolio?>">
	</td>
	<td>
		Estado del Tiempo
	</td>
	<td>
		<input type="text" name="EstadoTiempo" value="<?php echo $EstadoTiempo?>">
	</td>
</tr>
<tr>
	<td>
		Platicas de Seguridad
	</td>
	<td>
		<?php
			$v1 = ($horaInicio=="")?"00:00":$horaInicio;
			$v2 = ($horaTermino=="")?"00:00":$horaTermino;
		?>
		<input type="text" name="horaInicio" size="6" value ="<?php echo $v1 ?>"> a
		<input type="text" name="horaTermino" size="6" value ="<?php echo $v2 ?>">
	</td>
	<td>
		Tema
	</td>
	<td>
		<input type="text" name="tema" value ="<?php echo $tema?>">
	</td>
</tr>
<tr>
	<td colspan="4">
		<center>
			
			<input type = "submit" name="Guardar" value="Guardar" >
		</center>
	</td>
</tr>
</table>
</form>
<?php
echo "<br>".$_POST['Guardar'];

//Guardar el reporte diario
if(isset($sContrato) and 
	isset($fecha) and 
		isset($sNumeroOrden) and 
				isset($numeroFolio) and 
					isset($sIdTurno) and 
						isset($EstadoTiempo) and 
							isset($horaInicio) and 
								isset($horaTermino) and 
									isset($tema) and
										$_SESSION['accion']!="Modificar"){
	$sql ="INSERT INTO reportediario (sContrato,dIdFecha,sNumeroOrden,sIdConvenio,sNumeroReporte,sIdTurno,sTiempo	,sInicioPlatica,sFinalPlatica,sTema,sIdUsuario ) VALUES ('$sContrato','$fecha','$sNumeroOrden','$sIdConvenioAct','	$numeroFolio','$sIdTurno','$EstadoTiempo','$horaInicio','$horaTermino','$tema','".strtoupper($_SESSION['ssUsuario'])."')";
	mysql_query($sql);
}
else //Guardar el reporte diario
if(isset($sContrato) and 
	isset($fecha) and 
		isset($sNumeroOrden) and 
				isset($numeroFolio) and 
					isset($sIdTurno) and 
						isset($EstadoTiempo) and 
							isset($horaInicio) and 
								isset($horaTermino) and 
									isset($tema) and
										$_SESSION['accion']=="Modificar" and
											$Guardar=="Guardar"){
	//update reportediario
 $sql ="UPDATE reportediario SET sContrato='$sContrato',dIdFecha='$fecha',sNumeroOrden='$sNumeroOrden',sIdConvenio='$sIdConvenioAct',sNumeroReporte='$numeroFolio',sIdTurno='$sIdTurno',sTiempo='$EstadoTiempo',sInicioPlatica='$horaInicio',sFinalPlatica='$horaTermino',sTema='$tema' WHERE sContrato = '$sContrato' and sNumeroOrden='".$_SESSION['sNumeroOrden']."' and dIdFecha='".$_SESSION['dIdFecha']."' and sIdTurno='".$_SESSION['sIdTurno']."' and sIdConvenio='$sIdConvenioAct'";
	mysql_query($sql);
	//Update bitacoradeactividades
$sql ="UPDATE bitacoradeactividades SET dIdFecha='$fecha',sNumeroOrden='$sNumeroOrden',sIdTurno='$sIdTurno' WHERE sContrato = '$sContrato' and sNumeroOrden='".$_SESSION['sNumeroOrden']."' and dIdFecha='".$_SESSION['dIdFecha']."' and sIdTurno='".$_SESSION['sIdTurno']."'";
	mysql_query($sql);
	$_SESSION['accion']="";
}


//lista de campos que permaneceran bloqueados en insert o update
$bloqueados =array("sContrato");

//lista de campos que no deben mostrarse en el grid
$ocultos =array("sContrato","sNumeroOrden","sIdTurno");

//campos con los valores que deben contener en el formulario
//de insertar
$valdefaults = array("sContrato"=>$sContrato);

//lista de tablas relacionadas con la actual, para efectos de 
//update y delete
$tablasrelaciones = array ("bitacoradeactividades");

//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","dIdFecha","sNumeroOrden","sIdTurno");

//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
$sql="select 
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
from reportediario inner join convenios on (reportediario.sContrato=convenios.sContrato and reportediario.sIdConvenio=convenios.sIdConvenio) inner join configuracion on (convenios.sContrato=configuracion.sContrato and convenios.sIdConvenio=configuracion.sIdConvenio) inner join turnos on (reportediario.sContrato=turnos.sContrato) where reportediario.sContrato ='$sContrato'";

	

$form->formulario($sql,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);
	
/*si se ha iniciado una nueva consulta, destruir la actual*/
if (!isset($_SESSION['sqlAnterior'])){
	$_SESSION['sqlAnterior']=$sql;
}
else if ($_SESSION['sqlAnterior'] != $sql){
	$_SESSION['sqlAnterior']=$sql;
   unset($_SESSION['OrdenarPor']);
	unset($_REQUEST);
	unset($_REQUEST);
	unset($_POST);
}


/*Validar Segun enlace seguido para Eliminar bitacora*/
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
$nombres = array("Fecha","Turno","Convenio","No. Reporte","Status","Creator","Autoriza");
$form->visualizar($pag,$_SESSION['OrdenarPor'],$nombres);
unset($_REQUEST);
mysql_close();



?>
</table>
</center>
</body>
</html>