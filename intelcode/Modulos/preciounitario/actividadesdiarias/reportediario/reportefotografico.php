<?php
session_cache_limiter("must-revalidate"); 
session_start();
?>
<html>
<head>
<?php
require ("../../../include/formulario.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";

?>
</head>
<body onUnLoad="window.open('borraImagen.php?sContrato=<?php echo $sContrato ?>','CIERRE','heigth=10,width=10');" >
<?php
//$_SESSION['ssUsuario']="imolina";
//$_SESSION['ssContrasena']="danae";

//$sContrato='418235943';

if(isset($_REQUEST['numeroFolio']))
	$_SESSION['numeroFolio']=$_REQUEST['numeroFolio'];
if(isset($_REQUEST['Fecha']))
	$_SESSION['fecha']=$_REQUEST['Fecha'];
if(isset($_REQUEST['sIdTurno']))
	$_SESSION['turno']=$_REQUEST['sIdTurno'];

//lista de campos que permaneceran bloqueados en insert o update
//$bloqueados =array("sContrato");

$sql = "SELECT MAX(iImagen) FROM reportefotografico WHERE sContrato='$sContrato' AND sNumeroReporte='".$_SESSION['numeroFolio']."' ";
$result= mysql_query($sql);
if($row = mysql_fetch_array($result)){
	$imagen = $row[0]+1;
}
//campos con los valores que deben contener en el formulario

//de insertar
$valdefaults = array("sContrato"=>$sContrato,"sNumeroReporte"=>$_SESSION['numeroFolio'],"iImagen"=>$imagen,"dIdFecha"=>$_SESSION['fecha'],"sIdTurno"=>$_SESSION['turno']);
//lista de campos que no deben mostrarse en el grid
$ocultos =array("");

$bloqueados =array("sContrato","sIdTurno","dIdFecha","sNumeroReporte","iImagen");
//lista de tablas relacionadas con la actual, para efectos de 
//update y delete
//$tablasrelaciones = array ("bitacoradepersonal","distribuciondepersonal","equiposxpersonal","estimacionxpersonal","estimapersonal","paquetesdepersonal","personal","recursospersonal");

//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","sNumeroReporte","iImagen");

//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
//$sqlGeneral="SELECT * FROM reportefotografico WHERE sContrato='$sContrato' AND sNumeroReporte='".$_SESSION['numeroFolio']."' ";
$sqlGeneral="SELECT * FROM reportefotografico WHERE sContrato='$sContrato' AND sNumeroReporte='".$_SESSION['numeroFolio']."' and dIdFecha='".$_SESSION['fecha']."' and sIdTurno='".$_SESSION['turno']."'";

//formulario objeto
$form = new formulario($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);

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
	if(strpos($sqlGeneral,'WHERE'))
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
?>
<script language="javascript">
function cerrar(){
//opener.location.reload();
window.close();
}
</script>
<input type="button" value ="Cerrar Ventana" onclick="cerrar();">
<?php

$_SESSION['sOperacion']="Insertar";
//echo "\n<center><a href='".$_SERVER[PHP_SELF]."?operacion=a'>".$_SESSION['sOperacion']."</a>";
?>
<center>
<input type ="button" onClick="document.location='<?php $_SERVER[PHP_SELF] ?>?operacion=a'" value="Insertar" title="Inserta Registro">
<?php
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
