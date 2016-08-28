<?php
session_cache_limiter("must-revalidate"); 
session_start();
require ("../../../include/formulario.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
	echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
	echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
	echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
//lista de campos que permaneceran bloqueados en insert o update
$bloqueados =array("sContrato","sNumeroReporte","iImagen");
//lista de campos que no deben mostrarse en el grid
$ocultos =array("");


if($numeroFolio!="")
	$_SESSION['numeroFolio']=$numeroFolio;

$sql = "SELECT MAX(iImagen) FROM reportefotografico WHERE sContrato='$sContrato' AND sNumeroReporte='".$_SESSION['numeroFolio']."' ";
$result= mysql_query($sql);
if($row = mysql_fetch_array($result)){
	$imagen = $row[0]+1;
}
//campos con los valores que deben contener en el formulario

//de insertar
$valdefaults = array("sContrato"=>$sContrato,"sNumeroReporte"=>$_SESSION['numeroFolio'],"iImagen"=>$imagen);

//lista de tablas relacionadas con la actual, para efectos de 
//update y delete
//$tablasrelaciones = array ("bitacoradepersonal","distribuciondepersonal","equiposxpersonal","estimacionxpersonal","estimapersonal","paquetesdepersonal","personal","recursospersonal");

//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","sNumeroReporte","iImagen");

//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where	//$numeroFolio ="428236843-AKAL/L-292";
$sqlGen="SELECT * FROM reportefotografico WHERE sContrato='$sContrato' AND sNumeroReporte='$numeroFolio' ";

//formulario objeto
$forma = new formulario($sqlGen,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);

/*si se ha iniciado una nueva consulta, destruir la actual*/
if (!isset($_SESSION['sqlAnterior'])){
	$_SESSION['sqlAnterior']=$sqlGen;
}
else if ($_SESSION['sqlAnterior'] != $sqlGen){
	$_SESSION['sqlAnterior']=$sqlGen;
   unset($_SESSION['OrdenarPor']);
	unset($_REQUEST);
	unset($_REQUEST);
	unset($_POST);
}

/*obtener el filtro*/
if( isset($_REQUEST['Sql'])){
   $Filtrado=encrypt($_REQUEST['Sql'],1);
	$_SESSION['sCondicion']=$Filtrado=$forma->limpiar($Filtrado);
	if(stripos($sqlGen,'WHERE'))
	{
		$sqlFil=$sqlGen." and ".$Filtrado;
	}
	else
	{
		$sqlFil=$sqlGen." where ".$Filtrado;
	}
}
/*Validar Segun enlace seguido*/
if ( isset($Oper)){
	 switch($Oper){
		case ('a'):
			 //crea el formulario para insertar
			$_SESSION['sOper']="Insertar";
			$forma->CreaFormulario();
			break;
		case ('m'):
		    //crea el formulario para modificar
		   $_SESSION['sOper']="Modificar";
		   $forma->CreaFormulario($sqlFil);
		   break;
		case ('b'):
		   //hace un delete segun link seguido 
			$forma->crearDelete( $_SESSION['sCondicion'] );
		   break;
	}
}

/*Realizar accion segun tipo de formulario (insert, update)*/
if(isset($_POST['aceptar'])){
 switch ($_POST['aceptar']){
	case "Insertar":
	   //hace un insert
		$_SESSION['sOper']="";
		$forma->crearInsert( $_POST , $HTTP_POST_FILES );
		$_POST['aceptar']=$_SESSION['sOper']="";
		
		break;
	case "Modificar":
	   //hace un update
	   $_SESSION['sOper']="";
		$forma->crearUpdate( $_SESSION['sCondicion'] , $_POST , $HTTP_POST_FILES); 
		$_POST['aceptar']=$_SESSION['sOper']="";
		break;
}
	
}
$_SESSION['sOper']="Insertar";
echo "\n<center><a href='".$_SERVER[PHP_SELF]."?Oper=a'>".$_SESSION['sOper']."</a>";
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
$forma->visualizar($pag,$_SESSION['OrdenarPor']);
mysql_close();
?>
