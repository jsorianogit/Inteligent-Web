<?php
session_cache_limiter("must-revalidate"); 
session_start();
?>
<html>
<head>
<?php
require ("../../../../include/formulario.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
</head>
<body>
<?php
if(isset($_REQUEST['Sql'])){
	$sql=$_REQUEST['Sql'];
	$_SESSION['sql']=$sql;
}
$bloqueados =array("sContrato","sNumeroOrden","sIdTurno","dIdFecha");
//lista de campos que no deben mostrarse en el grid
$ocultos =array("sContrato");
//campos con los valores que deben contener en el formulario
//de insertar
$valdefaults = array("sContrato"=>$sContrato);
//lista de tablas relacionadas con la actual, para efectos de 
//update y delete
$tablasrelaciones = array ("none");
//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","dIdFecha","sNumeroOrden","sIdTurno","sIdTipoPermiso");
//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
$sqlGeneral="SELECT * FROM dual ";
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
if( isset($_SESSION['sql'])){
   $Filtro=encrypt($_SESSION['sql'],1);
	$_SESSION['sCondicion']=$Filtro=$form->limpiar($Filtro);
	$condicion = explode("AND",$Filtro);
	$Filtro2='';
	foreach($condicion as $con){
      if(strpos($con,"iFase")===false)
      $Filtro2.=" $con AND";
   }
   $Filtro2.="<";
   $Filtro2=str_replace("AND<","",$Filtro2);
	$_SESSION['sCondicionBA']=$Filtro2;
}
$sql ="SELECT mDescripcion,sReferencia from bitacoradealcances WHERE  $Filtro"; 
$result = mysql_query($sql);
if($row = mysql_fetch_array($result))
	$comentarios = $row['mDescripcion'];
	$sReferencias = $row['sReferencia'];
?>
<center>
<form name="comentario" action="" method="post">
<br>Escriba los comentarios:<br>
<textarea name="comentario" rows=15 cols=60   onKeyUp="document.comentario.comentario.value=document.comentario.comentario.value.toUpperCase();" onKeyPress='return NoComillas(event);'><?php echo $comentarios ?></textarea>
<br>Referencias:
<input type="text" name="sReferencia" size=50 onKeyUp="document.comentario.sReferencia.value=document.comentario.sReferencia.value.toUpperCase();" onKeyPress='return NoComillas(event);' value="<?php echo $sReferencias; ?>">
<br><input type="submit" name="Guardar" value="Guardar" >
<input type="button" name="Cancelar" value="Cancelar" onClick="window.close();" > 
</form>
</center>
<?php

if(isset($_POST['comentario']) or isset($_POST['sReferencia']))
{
$sReferencia=$_POST['sReferencia'];
$mDescripcion=$_POST['comentario'];
$sql = "UPDATE bitacoradealcances SET mDescripcion='$mDescripcion' , sReferencia='$sReferencia' WHERE  $Filtro"; 
mysql_query($sql);
if(mysql_error())
	mensaje(mysql_error());
$sql = "UPDATE bitacoradeactividades SET mDescripcion='$mDescripcion' WHERE  $Filtro2"; 
mysql_query($sql);
if(mysql_error())
	mensaje(mysql_error());

?>
	<script language="javascript">window.close();</script>
<?php
}
mysql_close();
?>
</body>
</html>