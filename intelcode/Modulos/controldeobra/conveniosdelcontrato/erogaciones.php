<?php
session_cache_limiter("must-revalidate"); 
session_start();
?>
<html>
<head>
<?php
require ("erogaciones.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
</head>
<body>
<?php
//lista de campos que permaneceran bloqueados en insert o update
$bloqueados =array("sContrato","sIdConvenio");

//lista de campos que no deben mostrarse en el grid
$ocultos =array("sContrato");



//lista de tablas relacionadas con la actual, para efectos de 
//update y delete
//$tablasrelaciones = array ("convenios");
$tablasrelaciones = array ("");

//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","sIdConvenio","dIdFecha");
//$camposrelaciones = array ("");
//obtener el filtro del convenio y contrato
$sql="SELECT * FROM erogacionesmensuales WHERE sContrato='$sContrato' AND sIdConvenio='$sIdConvenioAct' LIMIT 1";
$f = new formulario($sql,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);

if( isset($_REQUEST['Sql']) and isset($_REQUEST['operacion']) and $_REQUEST['operacion']=="e"){
   $Filtro=encrypt($_REQUEST['Sql'],1);
   $_SESSION['convenio']=$convenio=$f->limpiar($Filtro);
	
}
$convenioContrato = explode("AND",$_SESSION['convenio']);
$aContrato = explode("=",trim($convenioContrato[0]));
$Contrato = trim(str_replace("'","",$aContrato[1]));
$aConvenio = explode("=",trim($convenioContrato[1]));
$Convenio = trim(str_replace("'","",$aConvenio[1]));

unset($f);

//campos con los valores que deben contener en el formulario
//de insertar
$valdefaults = array("sContrato"=>$Contrato,"sIdConvenio"=>$Convenio);
//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
$sqlGeneral="SELECT * FROM erogacionesmensuales WHERE ".$_SESSION['convenio'];

//formulario objeto
$form = new formErogaciones($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);

//verifica las ralaciones
//$tablas = $form->relaciones("convenios");
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
//echo $sqlFiltro;
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
echo "\n<center><a href='".$_SERVER[PHP_SELF]."?operacion=a'><font size='2'>[".$_SESSION['sOperacion']."]</font></a>&nbsp;&nbsp;&nbsp;&nbsp;";
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

echo "<a href ='index.php'><font size='2'>[regresar]</font></a><br>";
$form->visualizar($pag,$_SESSION['OrdenarPor']);

mysql_close();
?>

</body>
</html>