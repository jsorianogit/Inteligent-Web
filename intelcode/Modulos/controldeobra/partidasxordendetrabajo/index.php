<?php
session_cache_limiter("must-revalidate"); 
session_start();
?>
<html>
<head>
<?php
require ("../../include/formulario.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
</head>
<body>
<?php
#cachar el numero de orden seleccionada
if(isset($_POST['ordenSeleccionada'])){
	$_SESSION['ordenSeleccionada'] = $_POST['ordenSeleccionada'];
}
#crear el combo para seleccionar el numero de orden
$sql = "select sNumeroOrden from ordenesdetrabajo where sContrato='$sContrato'";
$rs = mysql_query($sql);
echo "<center>Numero de Orden : <form name='selNumOrden' method='POST' action='$_SERVER[PHP_SELF]'>";
echo "<select name='ordenSeleccionada' onChange=\"document.selNumOrden.submit();\">";
	echo "<option></option";
while($row = mysql_fetch_array($rs)){
	if($row[0] == $_SESSION['ordenSeleccionada'])$selected = "selected";
	else $selected = "";
	echo "<option value='$row[0]' $selected>$row[0]</option>";
}
echo "</select>";
echo "</form></center>";

//lista de campos que permaneceran bloqueados en insert o update
$bloqueados =array("sContrato","sIdConvenio","sNumeroOrden");
$hidden = array("sContrato","sIdConvenio","sNumeroOrden","iItemOrden","sSimbolo","sWbs","sWbsAnterior","sPaquete","iNivel");
//lista de campos que no deben mostrarse en el grid
$ocultos =array("sContrato","sSimbolo","iNivel","sWbsAnterior","sPaquete","iItemOrden","sIdConvenio","lCancelada",
 "mDescripcion",
 "dDuracion",
 "sTipoActividad",
 "sIdPlataforma",
 "sIdPernocta",
 "mComentarios",
 "lGerencial",
 "lCalculo",
 "iColor",
 "lGenerado",
 "sMedida",
 "dCantidad",
 "dCargado",
 "dInstalado",
 "dExcedente");
//campos con los valores que deben contener en el formulario
//de insertar
$valdefaults = array("sContrato"=>$sContrato,"sNumeroOrden"=>$_SESSION['ordenSeleccionada'],"sIdConvenio"=>$sIdConvenioAct);

//lista de tablas relacionadas con la actual, para efectos de 
//update y delete
$tablasrelaciones = array ("");

//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","sIdConvenio","sNumeroOrden","sNumeroActividad","sTipoActividad","sWbs");

//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
$sqlGeneral="
		SELECT * 
		FROM actividadesxorden 
		WHERE 
			sContrato='$sContrato' 
			and sNumeroOrden ='".$_SESSION['ordenSeleccionada']."' 
			and sIdConvenio='".$sIdConvenioAct."' 
			and sTipoActividad='Actividad'
		ORDER BY iItemOrden";

//formulario objeto
$form = new formulario($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);
$form->fcampoHidden($hidden);
//verifica las ralaciones
//$tablas = $form->relaciones("actividadesxorden");
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
   $orderBy="";
	if(strpos($sqlGeneral,'ORDER BY') or strpos($sqlGeneral,'order by')){
		$ordenar = explode('ORDER BY',$sqlGeneral);
		$orderBy = "ORDER BY ".$ordenar[1];
		$sqlGeneral = $ordenar[0];
	}
	if(strpos($sqlGeneral,'WHERE') or strpos($sqlGeneral,'where'))
	{
		$sqlFiltro=$sqlGeneral." and ".$Filtro .$orderBy;
	}
	else
	{
	 	$sqlFiltro=$sqlGeneral." where ".$Filtro.$orderBy;
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
?>
<center>
<input type="button" value="<?php echo $_SESSION['sOperacion'] ?>" onClick="document.location='<?php echo $_SERVER[PHP_SELF]."?operacion=a'"?>">
<?php
//echo "\n<center><a href='".$_SERVER[PHP_SELF]."?operacion=a'>".$_SESSION['sOperacion']."</a>";
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