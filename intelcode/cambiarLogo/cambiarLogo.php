<?php
session_cache_limiter("must-revalidate"); 
session_start();
?>
<html>
<head>
<?php
require ("../Modulos/include/formulario.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";

?>
</head>
<!--  onUnLoad="opener.document.location='../frmConfiguracion.php';-->
<body">
<?php
//$_SESSION['ssUsuario']="imolina";
//$_SESSION['ssContrasena']="danae";

//$sContrato='418235943';

//recoge la pagina actual para el paginador
if(isset($_REQUEST['pag'])){
   $_SESSION['pagActual']=$_REQUEST['pag'];
   $pag=$_REQUEST['pag'];
}
elseif(isset($_SESSION['pagActual']))
   $pag=$_SESSION['pagActual'];
elseif(!isset($pag))
   $pag=1;
if(isset($_REQUEST['numeroFolio']))
   $_SESSION['numeroFolio']=$_REQUEST['numeroFolio'];
if(isset($_REQUEST['Fecha']))
   $_SESSION['fecha']=$_REQUEST['Fecha'];
if(isset($_REQUEST['sIdTurno']))
   $_SESSION['turno']=$_REQUEST['sIdTurno'];

//lista de campos que permaneceran bloqueados en insert o update
$bloqueados =array("sContrato");

//campos con los valores que deben contener en el formulario

//de insertar
$valdefaults = array("sContrato"=>$sContrato);
//lista de campos que no deben mostrarse en el grid
$ocultos =array("sContrato");

$bloqueados =array("sContrato");
//lista de tablas relacionadas con la actual, para efectos de 
//update y delete
//$tablasrelaciones = array ("bitacoradepersonal","distribuciondepersonal","equiposxpersonal","estimacionxpersonal","estimapersonal","paquetesdepersonal","personal","recursospersonal");

//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato");

//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
$sqlGeneral="SELECT sContrato,bImagen FROM configuracion WHERE sContrato='$sContrato' ";

//formulario objeto
$form = new formulario($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);
$form->ordenarXsql(true);
$form->borrar(0);
$form->fhidden(array("sContrato"));
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
<center>
<input type="button" value ="Cerrar Ventana" onclick="cerrar();">
</center>
<?php

$_SESSION['sOperacion']="Insertar";
//echo "\n<center><a href='".$_SERVER[PHP_SELF]."?operacion=a'>".$_SESSION['sOperacion']."</a>";
$rs = mysql_query($sqlGeneral);
$row = mysql_fetch_array($rs);
if($row['bImagen']=="")
{
?>
   <center>
      <input type ="button" onClick="document.location='<?php $_SERVER[PHP_SELF] ?>?operacion=a'" value="Insertar" title="Inserta Registro">
   </center>
<?php
}
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
?>
<center>
<?php
if($row['bImagen']!="")
   $form->visualizar($pag,$_SESSION['OrdenarPor']);
mysql_close();
?>
</body>
</html>
