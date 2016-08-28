<?php
session_cache_limiter("must-revalidate"); 
session_start();
require ("../../../../include/formulario.inc.php");
if(isset($_REQUEST['fecha']) AND $_REQUEST['fecha']!=""){
	$fecha=$_REQUEST['fecha'];
	$_SESSION['fecha']=$fecha;
	
} 
if(isset($_SESSION['fecha'])){
	$fecha =$_SESSION['fecha'];
}
//obtener numero de orden	
if(isset($_REQUEST['orden']) AND $_REQUEST['orden']!=""){
	$orden=$_REQUEST['orden'];
	$_SESSION['orden']=$orden;
	
}
if(isset($_SESSION['orden'])){
	$orden=$_SESSION['orden'];
}
//obtener numero de turno
	
if(isset($_REQUEST['turno']) AND $_REQUEST['turno']!=""){
	$turno=$_REQUEST['turno'];
	$_SESSION['turno']=$_REQUEST['turno'];
}	
if(isset($_SESSION['turno'])){
	$turno=$_SESSION['turno'];
}
?>
<html>
<head>
<script language="javascript">
function Deshabilitar(){
	if(document.jornadasdiarias.sTipo.value=="Tiempo Inactivo"){
	   document.jornadasdiarias.sHoraSalida.value="";
	   document.jornadasdiarias.sHoraSalida.disabled=true;
	   document.jornadasdiarias.sIdEmbarcacion.selectedIndex = -1;
	   document.jornadasdiarias.sIdEmbarcacion.disabled=true;
	   document.jornadasdiarias.sIdPlataforma.selectedIndex = -1;
	   document.jornadasdiarias.sIdPlataforma.disabled=true;
   	document.jornadasdiarias.sIdTipoMovimiento.disabled=false;
   	document.jornadasdiarias.sArea.value="";
   	document.jornadasdiarias.sArea.disabled=false;
	}
	else{
   	document.jornadasdiarias.sArea.value="";
   	document.jornadasdiarias.sArea.disabled=true;
   	document.jornadasdiarias.sHoraLlegada.value="";
   	document.jornadasdiarias.sHoraSalida.disabled=false;
   	document.jornadasdiarias.sIdEmbarcacion.disabled=false;
   	document.jornadasdiarias.sIdPlataforma.disabled=false;
   	document.jornadasdiarias.sHoraLlegada.disabled=false;
   	document.jornadasdiarias.sIdTipoMovimiento.selectedIndex = -1;
   	document.jornadasdiarias.sIdTipoMovimiento.disabled=true;
   	
	}

}

</script>
<?php

   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
</head>
<body>
<?php
if($fecha !="" and $orden!="")
{
	?>
	<center>
	<table>
		<tr>
			<td>
				<br>Numero de Orden
			</td>
			<td>
				<input type="text" value="<?php echo $orden ?>" readonly >
			</td>
		</tr>
			<td>
				<br>Fecha
			</td>
			<td>
				<input type="text" value="<?php echo $fecha ?>" readonly >
			</td>
	</table>
	</center>
	<?php
}
//lista de campos que permaneceran bloqueados en insert o update
$bloqueados =array("sContrato","sNumeroOrden","dIdFecha","sIdTurno");

//lista de campos que no deben mostrarse en el grid
$ocultos =array("sContrato","dIdFecha","sNumeroOrden","sTiempoComida","mDescripcion","sTomo","sIdTipoMovimiento","iPagina","sIdPernocta","dFrente","sIdPlataforma","sIdEmbarcacion");

//campos con los valores que deben contener en el formulario
//de insertar
$valdefaults = array("sContrato"=>$sContrato,"sNumeroOrden"=>$orden,"dIdFecha"=>$fecha,"sIdTurno"=>$turno);

//lista de tablas relacionadas con la actual, para efectos de 
//update y delete
$tablasrelaciones = array ("none");

//Array de campos llaves que relacinan a las tablas

$camposrelaciones = array ("sContrato","dIdFecha","sNumeroOrden","sIdTurno","sTipo","sArea","sIdPernocta","sIdEmbarcacion","sHoraInicio","sHoraFinal","sHoraSalida");

//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
$sqlGeneral="SELECT * FROM jornadasdiarias WHERE sContrato='$sContrato' AND dIdFecha='$fecha' AND sNumeroOrden='$orden'";

//formulario objeto
$form = new formulario($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);
$opciones = array("sTipo"=>"onChange='Deshabilitar();' ");
$form-> OpcionesExtras($opciones);
$sql ="SELECT sIdTipoMovimiento,sDescripcion FROM tiposdemovimiento WHERE sContrato='$sContrato' AND sClasificacion='Tiempo Muerto' ORDER BY sDescripcion";
$selects = array("sIdTipoMovimiento"=>$sql);
$form->ponerselectPersonalizado($selects);
//$form->selectPersonalizado();
//verifica las ralaciones
//$tablas = $form->relaciones("jornadasdiarias");
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
//echo ("<br><br>$sqlFiltro");
//exit();
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
echo "\n<center><a href='".$_SERVER[PHP_SELF]."?operacion=a'>[".$_SESSION['sOperacion']."]</a>";
echo "\n<a href='../'>[Regresar]</a>";
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
</body>
</html>
