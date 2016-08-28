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
//recoge la pagina actual para el paginador
if(isset($_REQUEST['pag'])){
        $_SESSION['pagActual']=$_REQUEST['pag'];
        $pag=$_REQUEST['pag'];
}
elseif(isset($_SESSION['pagActual']))
        $pag=$_SESSION['pagActual'];
elseif(!isset($pag))
        $pag=1;
        
if(isset($_REQUEST['fecha']) AND $_REQUEST['fecha']!=""){
        $fecha=$_REQUEST['fecha'];
        $_SESSION['fecha']=$fecha;
        
} 
if(isset($_SESSION['fecha'])){
        $fecha =$_SESSION['fecha'];
}
//obtener numero de orden       
if(isset($_REQUEST['orden']) AND $_REQUEST['orden']!=""){
        $orden=$_REQUEST['orden'];
        $_SESSION['orden']=$orden;
        
}
if(isset($_SESSION['orden'])){
        $orden=$_SESSION['orden'];
}

//obtener numero de turno
        
if(isset($_REQUEST['turno']) AND $_REQUEST['turno']!=""){
        $turno=$_REQUEST['turno'];
        $_SESSION['turno']=$_REQUEST['turno'];
}       
if(isset($_SESSION['turno'])){
        $turno=$_SESSION['turno'];
}
//lista de campos que permaneceran bloqueados en insert o update
if(isset($_SESSION['fecha']))
        $bloqueados =array("sContrato","sNumeroOrden","sIdTurno","dIdFecha");
else
        $bloqueados =array("sContrato","sIdTurno");

//lista de campos que no deben mostrarse en el grid
$ocultos =array("sContrato","sIdTurno");
//campos con los valores que deben contener en el formulario
//de insertar
$valdefaults = array("sContrato"=>$sContrato,"sNumeroOrden"=>$orden,"sIdTurno"=>$sIdTurnoAct,"dIdFecha"=>$fecha);

//lista de tablas relacionadas con la actual, para efectos de 
//update y delete
$tablasrelaciones = array ("none");

//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","dIdFecha","sNumeroOrden","sIdTurno","sIdTipoPermiso");

//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
if(isset($_SESSION['fecha']))
        $sqlGeneral="SELECT * FROM tramitedepermisos WHERE sContrato='$sContrato' AND dIdFecha='".$_SESSION['fecha']."'";
else
        $sqlGeneral="SELECT * FROM tramitedepermisos WHERE sContrato='$sContrato'";

//formulario objeto
$form = new formulario($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);
$hidden = array("sHoraInicio","sHoraFinal","iCantidad","sIdTurno");
$form->fcampoHidden($hidden);
//verifica las ralaciones
//$tablas = $form->relaciones("cuentas");
//foreach($tablas as $tabla)
//      echo "<br> $tabla";
        
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
<input type ="button" onClick="document.location='<?php $_SERVER[PHP_SELF] ?>?operacion=a'" value="Insertar" title="Inserta Registro">
<?php
//echo "\n<center><a href='".$_SERVER[PHP_SELF]."?operacion=a'>[".$_SESSION['sOperacion']."]</a>";
if(isset($fecha) and isset($orden)){
   ?>
      <!--<input type ="button" onClick="document.location='../actividadesdiarias/reportediario'" value="Regresar" title="Regresar a Reporte Diario">-->
      <input type ="button" onClick="document.location='../../../frmReporteDiario.php'" value="Regresar" title="Regresar a Reporte Diario">
   <?php
        //echo "\n<a href='../actividadesdiarias/reportediario'>[Regresar]</a>";
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
$form->visualizar($pag,$_SESSION['OrdenarPor']);
mysql_close();
?>
</body>
</html>
