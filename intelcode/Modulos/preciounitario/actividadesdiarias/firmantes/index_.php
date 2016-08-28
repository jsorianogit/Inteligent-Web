<?php
session_cache_limiter("must-revalidate"); 
session_start();
require ("../../../include/formulario.inc.php");
?>
<html>
<head>
<?php
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
</head>
<body>
<?php

if((isset($_REQUEST['reportediario'])  and $_REQUEST['reportediario']!="") or  $_SESSION['reportediario']!=""){
	if(isset($_REQUEST['reportediario'])  and $_REQUEST['reportediario']!="") 
	 	$_SESSION['reportediario']=$_REQUEST['reportediario'];
	#obtener la fecha
	if(isset($_REQUEST['fecha']) AND $_REQUEST['fecha']!=""){
		$fecha=$_REQUEST['fecha'];
		$_SESSION['fecha']=$fecha;
	} 
	if(isset($_SESSION['fecha'])){
	$fecha =$_SESSION['fecha'];
	}
	#obtener numero de orden
	if(isset($_REQUEST['orden']) AND $_REQUEST['orden']!=""){
		$orden=$_REQUEST['orden'];
		$_SESSION['orden']=$orden;
	}
	if(isset($_SESSION['orden'])){
		$orden=$_SESSION['orden'];
	}
	#obtener numero de turno
	if(isset($_REQUEST['turno']) AND $_REQUEST['turno']!=""){
		$turno=$_REQUEST['turno'];
		$_SESSION['turno']=$_REQUEST['turno'];
	}	
	if(isset($_SESSION['turno'])){
		$turno=$_SESSION['turno'];
	}
	//mensaje($fecha);
	#lista de campos que permaneceran bloqueados en insert o update
	$bloqueados =array("sContrato","sNumeroOrden","dIdFecha");
	#campos con los valores que deben contener en el formulario
	#de insertar
	$valdefaults = array("sContrato"=>$sContrato,"sNumeroOrden"=>$orden,"dIdFecha"=>$fecha);
	#consulta sql de donde tomar los campos para el formulario
	#solo puede tener clausula where
	$sqlGeneral="SELECT * FROM firmas WHERE sContrato='$sContrato'  AND sNumeroOrden='$orden' ";
}
else{
	#lista de campos que permaneceran bloqueados en insert o update
	$bloqueados =array("sContrato");
	#campos con los valores que deben contener en el formulario
	#de insertar
	$valdefaults = array("sContrato"=>$sContrato);
	#consulta sql de donde tomar los campos para el formulario
	#solo puede tener clausula where
	$sqlGeneral="SELECT * FROM firmas WHERE sContrato='$sContrato'";

}	 


//lista de campos que no deben mostrarse en el grid
$ocultos =array("sContrato","sPuesto1","sPuesto2","sPuesto3","sPuesto4","sPuesto5","sPuesto6","sPuesto7","sPuesto8","sPuesto9","sPuesto10");

//lista de tablas relacionadas con la actual, para efectos de 
//update y delete
$tablasrelaciones = array ("none");

//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","sNumeroOrden","dIdFecha");


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
echo "\n<center><a href='".$_SERVER[PHP_SELF]."?operacion=a'>[".$_SESSION['sOperacion']."]</a>";
if(isset($_SESSION['reportediario']) and $_SESSION['reportediario'] =="si")
	echo "\n<a href='../reportediario'>[Regresar]</a>";
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
$form->visualizar($pag,$_SESSION['OrdenarPor']);
mysql_close();
?>
</body>
</html>
