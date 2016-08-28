<?php
session_start();
$_SESSION['ssUsuario']="imolina";
$_SESSION['ssContrasena']="danae";
echo "<style type='text/css'>@import '../Modulos/estilos/estilo1.css';</style>";

require ("formulario.inc.php");


$nomostrar =array("sContrato");
$valdefaults = array("sContrato"=>$sContrato);
//$sql="SELECT * FROM contratos  where sContrato='$sContrato'";
$sql="SELECT * FROM ordenesdetrabajo";
//$sql="SELECT sIdGrupo,sDescripcion FROM gruposisometrico WHERE sContrato='$sContrato'";
$form = new formulario($sql,$nomostrar,$valdefaults);


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
switch($_REQUEST['operacion']){
	case ('a'):
		$form->CreaFormulario();
		$_SESSION['sOperacion']="Insertar";
		break;
	case ('m'):
	   $_SESSION['sOperacion']="Modificar";
	   $Filtro=$_REQUEST['Sql'];
	   $Filtro=encrypt($Filtro,1);
	   $_SESSION['sCondicion']=$Filtro=$form->limpiar($Filtro);
	   if(stripos($sql,'WHERE')!==false)
		{
		$sqlFiltro=$sql."\n and ".$Filtro;
	  	}
	   else
		   $sqlFiltro=$sql."\n where ".$Filtro;
	   $form->CreaFormulario($sqlFiltro);
	   break;
	case ('b'):
	   $Filtro=encrypt($_REQUEST['Sql'],1);
	   $_SESSION['sCondicion']=$Filtro=$form->limpiar($Filtro);
		if(stripos($sql,'WHERE')!==false)
	   	$Filtro;
	   else
		   $Filtro;
	   $form->crearDelete($_SESSION['sCondicion']);
	   break;
}
$_SESSION['sOperacion']="Insertar";
echo "<center><a href='".$_SERVER[PHP_SELF]."?operacion=a'>".$_SESSION['sOperacion']."</a>";
$form->visualizar();
mysql_close();
?>