<?php
require ("reporteador.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";

//Guardar Nuevo Registro
function guardar(){
		echo "<br>Guardando ";
	$error=false;
	mysql_query("begin");
	global $fecha,$sIdTurno,$sNumeroOrden,$sNumeroActividad,$swbs,$sIdTipoMovimiento;
	global $cantidad,$cantidadIns,$dPonderado,$comentarios,$dAvance,$sContrato;
	global $sIdConvenioAct,$dExcedente;
	$sql="SELECT MAX(iIdDiario) FROM bitacoradeactividades WHERE sContrato='$sContrato'";
	$result = mysql_query($sql);
	if($row = mysql_fetch_array($result)){
		$iIdDiario = $row[0];
		$iIdDiario = $iIdDiario + 1;
	}
	$sql ="INSERT INTO bitacoradeactividades (iIdDiario,sContrato,dIdFecha,sIdTurno,sNumeroOrden,sNumeroActividad,sWbs,sIdTipoMovimiento,dCantidad,mDescripcion,dAvance) VALUES ($iIdDiario,'$sContrato','$fecha','$sIdTurno','$sNumeroOrden','$sNumeroActividad','$swbs','$sIdTipoMovimiento',$cantidadIns,'$comentarios','$dAvance')";	
	mysql_query($sql);
	if(mysql_error())$error=true ;
	
		//Buscar coincidencias
	$sql = "SELECT dInstalado,dExcedente  FROM actividadesxorden  WHERE sContrato='$sContrato' AND sWbs='$swbs' AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sIdConvenio='$sIdConvenioAct' AND sIdConvenio='$sIdConvenioAct'";
	$result=mysql_query($sql);
	if($row = mysql_fetch_array($result)){
		$dInstaladoActual = $row[0];
		$dExcedenteActual = $row[1];
		$dInstaladoActual = $dInstaladoActual + $cantidadIns;
		$dExcedenteActual = $dExcedenteActual + $dExcedente;
	}
	
	$sql ="UPDATE actividadesxorden SET 
			dInstalado = $dInstaladoActual,
			dExcedente = $dExcedenteActual
			WHERE sContrato='$sContrato' AND sWbs='$swbs' AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sIdConvenio='$sIdConvenioAct'";	
	mysql_query($sql);
	if(mysql_error())$error=true ;
	if($error==true){
			mysql_query("rollback");
	}
	else{
		mysql_query("commit");
	}

}
//Actualizar Registro
function actualizar(){
	echo "<br>Actualizando lso registros ";
	$error=false;
	mysql_query("begin");
	global $fecha,$sIdTurno,$sNumeroOrden,$sNumeroActividad,$swbs,$sIdTipoMovimiento;
	global $cantidad,$cantidadIns,$dPonderado,$comentarios,$dAvance,$sContrato;
	global $sIdConvenioAct;
   //Actualizar en bitacoradeactividades
	$sql ="SELECT dCantidad FROM bitacoradeactividades WHERE sContrato='$sContrato' AND dIdFecha='$fecha' AND sIdTurno='$sIdTurno' AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sWbs='$swbs'";	
	$result = mysql_query($sql);
	if($row = mysql_fetch_array($result)){
      $dCantidadAct = $row[0];
   }
   $cantidadTotal=$cantidadIns+$dCantidadAct;

	$sql ="UPDATE bitacoradeactividades SET dCantidad=$cantidadTotal ,dAvance=$dAvance WHERE sContrato='$sContrato' AND dIdFecha='$fecha' AND sIdTurno='$sIdTurno' AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sWbs='$swbs' LIMIT 1";	
	$result = mysql_query($sql);
	if(mysql_error())$error=true ;

	//Buscar coincidencias en actividadesxorden
	$sql = "SELECT dInstalado,dExcedente  FROM actividadesxorden  WHERE sContrato='$sContrato' AND sWbs='$swbs' AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sIdConvenio='$sIdConvenioAct' AND sIdConvenio='$sIdConvenioAct' ";
	$result=mysql_query($sql);
	if(mysql_error())$error=true ;
	if($row = mysql_fetch_array($result)){
		$dInstaladoActual = $row[0];
		$dExcedenteActual = $row[1];
		$dInstaladoActual = $dInstaladoActual + $cantidadIns;
		$dExcedenteActual = $dExcedenteActual + $dExcedente;
	}
	
$sql ="UPDATE actividadesxorden SET dInstalado = $dInstaladoActual,dExcedente =$dExcedenteActual WHERE sContrato='$sContrato' AND sWbs='$swbs' AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sIdConvenio='$sIdConvenioAct' LIMIT 1";	
	mysql_query($sql);
	if(mysql_error())$error=true ;
	if($error==true){
			mysql_query("rollback");
	}
	else{
		mysql_query("commit");
	}
}
function retornarMenu(){
   $_SESSION['consolidar']="";
   $_SESSION['volumen']="";
   echo "<script language='javascript'>location.href='volumenes.php'</script>";
   //print("<center><a href='volumenes.php'>[Regresar]</a></center>");
}
//Obtener variables POST
//if(isset($_POST['fecha']))	
 //  $_SESSION['fecha']=$_POST['fecha'];
$fecha=$_SESSION['fecha'];
if(isset($_POST['sIdTurno']))
   $_SESSION['sIdTurno']=$_POST['sIdTurno'];
$sIdTurno=$_SESSION['sIdTurno'];
if(isset($_POST['sNumeroOrden']))
   $_SESSION['sNumeroOrden']=$_POST['sNumeroOrden'];  
$sNumeroOrden=$_SESSION['sNumeroOrden'];
if(isset($_POST['sNumeroActivdad']))
   $_SESSION['sNumeroActivdad']=$_POST['sNumeroActivdad']; 
$sNumeroActividad=$_SESSION['sNumeroActivdad'];
if(isset($_POST['swbs']))
   $_SESSION['swbs']=$_POST['swbs'];
$swbs=$_SESSION['swbs'];
if(isset($_POST['sIdTipoMovimiento']))
   $_SESSION['sIdTipoMovimiento']=$_POST['sIdTipoMovimiento'];
$sIdTipoMovimiento=$_SESSION['sIdTipoMovimiento'];
if(isset($_POST['cantidad']))
   $_SESSION['cantidad']=$_POST['cantidad'];
$cantidad=$_SESSION['cantidad'];
if(isset($_POST['cantidadIns']))
   $_SESSION['cantidadIns']=$_POST['cantidadIns'];
$cantidadIns=$_SESSION['cantidadIns'];
if(isset($_POST['dPonderado']))
   $_SESSION['dPonderado']=$_POST['dPonderado'];   
$dPonderado=$_SESSION['dPonderado'];
if(isset($_POST['comentarios']))
   $_SESSION['comentarios']=$_POST['comentarios'];
$comentarios=$_SESSION['comentarios'];
$dExcedente=0;
if($cantidadIns>0)
	$dAvance = ($cantidadIns*100)/$cantidad;
else
	$dAvance = 0;

if(isset($_POST['volumen']))
   $_SESSION['volumen']=$_POST['volumen'];
$volumen=$_SESSION['volumen'];

if(isset($_POST['consolidar']))
   $_SESSION['consolidar']=$_POST['consolidar'];
$consolidar=$_SESSION['consolidar'];


if ($fecha =="" or $sIdTurno=="" or
		$sNumeroOrden=="" or $sNumeroActividad=="" or
			$swbs=="" or $sIdTipoMovimiento=="" or $cantidad=="" or
				$cantidadIns=="" or $dPonderado=="" or $comentarios==""){
					print("<center><h3>Faltan Datos</h3></center>");
					print("<center><a href='volumenes.php'>[Regresar]</a></center>");
}
else{
   //Buscar numero de actividades a instalar
	$sql = "SELECT dInstalado FROM actividadesxorden WHERE sContrato='$sContrato' AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sWbs='$swbs' AND sIdConvenio='$sIdConvenioAct'";
	$result=mysql_query($sql);
	if($row = mysql_fetch_array($result)){
		$dInstalado = $row[0];
		if($consolidar=="Si" and $volumen==""){
			if($cantidadIns+$dInstalado>0){
				$dAvance = (($dInstalado+$cantidadIns)*100)/$cantidad;
			}
			else
			$dAvance = 0;
		}
	
	   if(($dInstalado+$cantidadIns) > $cantidad AND $volumen==""){
	   	   	$dExcedente =($dInstalado+$cantidadIns) - $cantidad ;
     		print("\n<center>\nNo se puede asignar una cantidad mayor a la estipulada en el contrato vigente, Cantidad a Instalar segun Contrato = $dInstalado , Cantidad Instalada=$cantidadIns, si continua se creara un volumen adicional, desea Continuar ?");
   		print("\n<form action='".$PHP_SELF."' method='post'>");
   		print("\n<input type = 'submit' value = 'No' name='volumen'>");
   		print("\n<input type = 'submit' value = 'Si' name='volumen'>");
   		print("\n</form>\n</center>"); 
         exit(0);
      }
	}

   	//Buscar coincidencias
	$sql = "SELECT sum(dAvance) FROM bitacoradeactividades WHERE sContrato='$sContrato' AND dIdFecha='$fecha' AND sIdTurno='$sIdTurno' AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sWbs='$swbs'";
	$result=mysql_query($sql);
	if($row = mysql_fetch_array($result)){
   		$actualAvance=$row[0];
   		$actualCantidad=$row[1];
   	}
	if($volumen!="" and $consolidar=="Si" ){
    	$dAvance=$actualAvance - $dAvance;
    	if($dAvance<0)$dAvance=0;
    	if($dAvance>$dInstalado)$dAvance=$dAvance-$dInstalado;
    	if($actualAvance>=100)$dAvance=100;
 
   	}
   if($volumen!="" and ($consolidar=="No" or $consolidar=="")){
		if($cantidadIns>0)
			$dAvance = ($cantidadIns*100)/$cantidad;
		if($actualAvance>=100)$dAvance=0;

	}
   if($volumen!="No"){
   	//Buscar coincidencias
   	$sql = "SELECT sContrato,dIdFecha,sIdTurno,sNumeroOrden,sNumeroActividad,sWbs FROM bitacoradeactividades WHERE sContrato='$sContrato' AND dIdFecha='$fecha' AND sIdTurno='$sIdTurno' AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sWbs='$swbs'";
	  $result=mysql_query($sql);
   	if($row = mysql_fetch_array($result) and $consolidar==""){
   		print("\n<center>\nSe encontro una coincidencia del Wbs-Partida en los registros de la Fecha y la Orden    seleccionada, ¿Desea Consolidar el Movimiento ?");
   		print("\n<form action='".$PHP_SELF."' method='post'>");
   		print("\n<input type = 'submit' value = 'No' name='consolidar'>");
   		print("\n<input type = 'submit' value = 'Si' name='consolidar'>");
   		print("\n</form>\n</center>");
   		exit(0);
   	}
   	else if($consolidar=="Si"){
   	   actualizar();
   	}
   	else if($consolidar=="No" or $consolidar==""){
  	   guardar();
   	}	
   }
//exit(0);
   retornarMenu();
   
}
?>