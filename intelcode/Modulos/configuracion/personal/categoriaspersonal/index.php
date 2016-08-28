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
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>

<script type="text/javascript">
function idPersonal(){
	var igualdades=document.getElementById("mascara").value.split(";");
	for(var i =0;i<igualdades.length;i++){
		var Pos = igualdades[i].indexOf(document.personal.sIdTipoPersonal.value)
		if(Pos>=0){
			var mascara = igualdades[i].split("=");
			document.personal.sIdPersonal.value=mascara[1] + document.personal.iItemOrden.value
		}
	}
}
</script>
</head>
<body>
<?php
//lista de campos que permaneceran bloqueados en insert o update
$bloqueados =array("sContrato","iItemOrden");

//lista de campos que no deben mostrarse en el grid
$ocultos =array("sContrato");

//campos con los valores que deben contener en el formulario
//de insertar
$sql = "select max(iItemOrden) as iItemOrden from personal WHERE sContrato='$sContrato' ";
$rs = mysql_query($sql);
if($row = mysql_fetch_array($rs)){
	$iItemOrden = $row['iItemOrden']+1	;
}
$valdefaults = array("sContrato"=>$sContrato,"iItemOrden"=>$iItemOrden );

//lista de tablas relacionadas con la actual, para efectos de 
//update y delete
$tablasrelaciones = array ("bitacoradepersonal","distribuciondepersonal","empleados","equiposxpersonal","estimacionxpersonal","estimapersonal","paquetesdepersonal","recursospersonal");

//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","sIdPersonal");

//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
$sqlGeneral="SELECT 
					sContrato,
					sIdTipoPersonal,
					iItemOrden,
					sIdPersonal,
					sDescripcion,
					sMedida,
					dCantidad,
					dFechaInicio,
					dFechaFinal,
					dVentaMN,
					dVentaDLL,
					dCostoMN,
					dCostoDLL,
					lProrrateo,
					iJornada,
					lDistribuye 
				FROM personal WHERE sContrato='$sContrato' ";

//formulario objeto
$form = new formulario($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);
$form->fcampoHidden(array("sContrato"));
$form->ordenarXsql(true);
$jsCode="";
$form->jsCodeCharge($jsCode,"codigo");
$form->OpcionesExtras(array("sIdTipoPersonal"=>"onChange=idPersonal()"));
$sqlM = "select sIdTipoPersonal,sMascara from tiposdepersonal;";
$rsM = mysql_query($sqlM);
while($rowM = mysql_fetch_array($rsM)){
	$mascara.=$rowM['sIdTipoPersonal']."=".$rowM['sMascara'].";";
}
echo "<input type='hidden' name='mascara' id='mascara' value='$mascara'>";
//verifica las ralaciones
//$tablas = $form->relaciones("personal");
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