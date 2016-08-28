<?php
session_start();
$_SESSION['ssUsuario']="imolina";
$_SESSION['ssContrasena']="danae";
echo "<style type='text/css'>@import '../Modulos/estilos/estilo1.css';</style>";

require ("formulario.inc.php");

$sqlformulario="SELECT * FROM embarcaciones ";

$form = new formulario($sqlformulario);
echo "<a href='$_SERVER[PHP_SELF]?$_SESSION[sOperacion]'?>".$_SESSION['sOperacion']."</a>";

/*Realizar segun formulario*/
if(isset($_POST['aceptar'])){
 switch ($_POST['aceptar']){
	case "Insertar":
		$form->crearInsert(&$_POST);
		$_SESSION['sOperacion']="";
		break;
	case "Modificar":
		$form->crearUpdate($_SESSION['sCondicion'],&$_POST);
		$_SESSION['sOperacion']="";
		break;
}
	
}
/*Validar Segun enlace seguido*/
if($_REQUEST['opcion']=="a"){
	$form->CreaFormulario($sqlformulario,&$sqlselect);
	$_SESSION['sOperacion']="Insertar";
}
if($_REQUEST['operacion']=="m"){
   $_SESSION['sOperacion']="Modificar";
   $Filtro=encrypt($_REQUEST['Sql'],1);
   $_SESSION['sCondicion']=$Filtro=$form->limpiar($Filtro);
   $sqlFinal=$sqlformulario."\n where ".$Filtro;
   $form->CreaFormulario($sqlFinal,&$sqlselect);	
  
}
else
	$form->visualizar($sqlformulario);

mysql_close();
?>