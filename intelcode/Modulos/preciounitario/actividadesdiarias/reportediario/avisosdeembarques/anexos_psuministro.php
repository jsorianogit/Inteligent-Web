<!--<html>
<head> -->
<?php
#require ("../../../../include/formulario.inc.php");
   #echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   #echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   #echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   #echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
</head>
<body>
<?php
//obtener fecha
//$_REQUEST['sNumeroOrden'];

//lista de campos que permaneceran bloqueados en insert o update
$bloqueados =array("sContrato","iFolio");

//lista de campos que no deben mostrarse en el grid
$ocultos =array("sContrato");

//Recoger los Valores para el formulario
$fecha = date('Y/m/d');
/*$sql = "SELECT MAX(iFolio)  FROM anexo_psuministro  WHERE sContrato='$sContrato' ";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result))
	$folio = $row[0] + 1;
else
	$folio = 1;
	*/
if(isset($iFolioSuministro))
	$folio=$iFolioSuministro;
echo "<center> <h3>";
echo "Folio Seleccionado :".( ($folio=="")?"<FONT COLOR='RED'>Ninguno, Seleccione un Folio En la pestaña Folios de Salida de Material</FONT>".mensaje("Seleccione un Folio En la pestaña Folios de Salida de Material, Para Poder Insertar Partidas"):$folio );
echo "</h3></center>";
//campos con los valores que deben contener en el formulario
//de insertar
$valdefaults = array("sContrato"=>$sContrato,"iFolio"=>$folio);

//lista de tablas relacionadas con la actual, para efectos de 
//update y delete
$tablasrelaciones = array ("none");

//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","iFolio","sNumeroActividad");

//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
$sqlGeneral="SELECT * FROM anexo_psuministro  WHERE sContrato='$sContrato' AND iFolio='$folio' ";

//formulario objeto
$form = new formulario($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);
$sql ="SELECT sNumeroActividad,CONCAT(sNumeroActividad,'->',mDescripcion) as mDescripcion 
				FROM actividadesxorden 
				WHERE sContrato='$sContrato' AND sIdConvenio='$sIdConvenioAct'  AND sNumeroOrden='$orden' AND  sTipoActividad ='Actividad' 
				ORDER BY iItemOrden,sNumeroActividad";
$selects = array("sNumeroActividad"=>$sql);
$form->ponerselectPersonalizado($selects);
//verifica las ralaciones
#$tablas = $form->relaciones("jornadasdiarias");
#foreach($tablas as $tabla)
#	echo "<br> $tabla";
	
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
			    if(isset($folio) and $folio!=""){
					    //crea el formulario para insertar
						$_SESSION['sOperacion']="Insertar";
						$form->CreaFormulario();
				}
				else{	
						mensaje("Aun no selecciona un Folio, Seleccione uno de  la pestaña 'Folios de Salida de Material' para poder Agregar Registros");
					}
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
//echo "\n<center><a href='".$_SERVER[PHP_SELF]."?operacion=a'>[".$_SESSION['sOperacion']."]</a>";
//echo "\n<a href='../'>[Regresar]</a>";
?>
   <input type ="button" onClick="document.location='<?php $_SERVER[PHP_SELF] ?>?operacion=a'" value="Insertar" title="Inserta Registro">
   <?php if (isset($orden)){ ?>
   <input type ="button" onClick="document.location='../'" value="Regresar" title="Regresar a Reporte Diario">
	
<?php
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
//mysql_close();
?>
<!--</body>
</html> -->
