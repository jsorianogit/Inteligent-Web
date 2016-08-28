<?php
require ("../../../../include/reporteador.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";

//Guardar Nuevo Registro
function guardar(){
		echo "<br>Guardando ";
		
	$error=false;
	mysql_query("begin");
	global $fecha,$sIdTurno,$sNumeroOrden,$sNumeroActividad,$swbs;
	global $cantidad,$cantidadIns,$dPonderado,$comentarios,$dAvance,$sContrato;
	global $convenio	,$dExcedente,$iFase;

	$sql="SELECT MAX(iIdDiario) FROM bitacoradeactividades WHERE sContrato='$sContrato' and sNumeroOrden='$sNumeroOrden' ";
	$result = mysql_query($sql);
	if($row = mysql_fetch_array($result)){
		$iIdDiarioBA = $row[0];
		$iIdDiarioBA = $iIdDiarioBA + 1;
	}

	$sql="SELECT MAX(iIdDiario) FROM bitacoradealcances WHERE sContrato='$sContrato' and sNumeroOrden='$sNumeroOrden' ";
	$result = mysql_query($sql);
	if($row = mysql_fetch_array($result)){
		$iIdDiario = $row[0];
		$iIdDiario = $iIdDiario + 1;
	}

	//para efectos de la fase
   $sql ="  SELECT max(iFase) as iFase FROM bitacoradealcances  WHERE sContrato='$sContrato' AND sNumeroActividad='$sNumeroActividad' 
         AND sWbs='$swbs'  AND dIdFecha='$fecha' AND sNumeroOrden='$sNumeroOrden'";
//   exit();
   $result = mysql_query($sql);
   if($row = mysql_fetch_array($result)){
      $iUltimaFase = $row['iFase'];
      
   }
   
   $sql ="SELECT * FROM alcancesxactividad WHERE sContrato='$sContrato' AND sNumeroActividad='$sNumeroActividad';";
   $result=mysql_query($sql);
   
   while($row = mysql_fetch_array($result)){
   	$iFases[$row['iFase']]=$row['dAvance'];
   }
  //si la cantidad a instalar es mayor que las anteriores, hacer el ajuste de cantidades 
  $controlador = 0;
   if($iFase >= $iUltimaFase and $iUltimaFase!=""){
   	mensaje("Entro aca");
     $sql = "  SELECT iFase, dCantidad, sWbs, dIdFecha,sNumeroActividad FROM bitacoradealcances  WHERE sContrato='$sContrato' 
            AND sNumeroActividad='$sNumeroActividad'  AND sWbs='$swbs'  AND dIdFecha='$fecha' AND sNumeroOrden='$sNumeroOrden'  '' ORDER BY iFase";
      $result = mysql_query($sql);
       while($row = mysql_fetch_array($result)){
       	//if($cantidadIns > $row['dCantidad'] ){
       		mensaje("Cantidad a instalar es mayor que la actual");
       		$instalar = $row['dCantidad']+$cantidadIns;
      		$dAvance = ($instalar*$iFases[$row['iFase']])/$cantidad;
            $sql = "UPDATE bitacoradealcances SET dCantidad='$instalar' , dAvance='$dAvance' WHERE sContrato='$sContrato' 
            AND sNumeroActividad='$sNumeroActividad'  AND sWbs='$swbs'  AND dIdFecha='$fecha' AND iFase='".$row['iFase']."' AND sNumeroOrden='$sNumeroOrden'  " ;
            mysql_query($sql);
            if(mysql_error())mensaje("bitacoradealcances ".mysql_error());
            $sql = "UPDATE bitacoradeactividades SET  dAvance='$dAvance' WHERE sContrato='$sContrato' 
            AND sNumeroActividad='$sNumeroActividad'  AND sWbs='$swbs'  AND dIdFecha='$fecha'  AND sNumeroOrden='$sNumeroOrden'  " ;
            mysql_query($sql);
            if(mysql_error())mensaje("bitacoradeactividades ".mysql_error());
         //}
			$controlador =$row['iFase'];
      }
      mensaje("Salio de aca");
   }
   if(!$iUltimaFase or   $controlador !=0){//si no existen iFases ingresar los primeros
   	mensaje("Entro de acuya - $controlador - $iUltimaFase - $iFase ");
		if($iUltimaFase)$cont=$iUltimaFase+1;
		else $cont = $controlador;
		if(!$iUltimaFase and $controlador==0)$cont=1;		
      for($i =   $cont ; $i <=$iFase;$i++){
      	if($controlador == $iFase)break;
      	//Guardar en bitacora de alcances
      	$dAvance = ($cantidadIns*$iFases[$i])/$cantidad;
     		$sql ="INSERT INTO bitacoradealcances (iIdDiario,sContrato,dIdFecha,sIdTurno,sNumeroOrden,sNumeroActividad,sWbs,dCantidad,mDescripcion,dAvance,iFase) VALUES ($iIdDiario,'$sContrato','$fecha','$sIdTurno','$sNumeroOrden','$sNumeroActividad','$swbs',$cantidadIns,'$comentarios','$dAvance','$i')";
 		   mysql_query($sql);
			$iIdDiario++;
      	if(mysql_error()){$error=true;mensaje("bitacoradealcances ".mysql_error());} ;
   	}
      for($i =   $cont ; $i <=$iFase;$i++){
      	if($controlador == $iFase)break;
      	//Guardar en bitacora de actividades
      	$dAvance = ($cantidadIns*$iFases[$i])/$cantidad;
        	$sql ="INSERT INTO bitacoradeactividades (iIdDiario,sContrato,dIdFecha,sIdTurno,sNumeroOrden,sNumeroActividad,sWbs,dCantidad,mDescripcion,dAvance,sIdTipoMovimiento,lAlcance) VALUES ($iIdDiarioBA,'$sContrato','$fecha','$sIdTurno','$sNumeroOrden','$sNumeroActividad','$swbs',0,'$comentarios','$dAvance','A','NO')";	   // mysql_query($sql);	
 		   mysql_query($sql);
			$iIdDiarioBA++;
      	if(mysql_error()){$error=true;mensaje("bitacoradeactividades ".mysql_error());} ;
   	}   	
   	mensaje("Salio de acuya");
   }
//inserta en bitacoradeactividades y actualiza en actividadesxorden cuando es una instalacion    
if($iFase == count($iFases) and $controlador != $iFase){
	mensaje("insertando "); 	
	$sql ="INSERT INTO bitacoradeactividades (iIdDiario,sContrato,dIdFecha,sIdTurno,sNumeroOrden,sNumeroActividad,sWbs,dCantidad,mDescripcion,dAvance,sIdTipoMovimiento,lAlcance) 
	VALUES ($iIdDiarioBA,'$sContrato','$fecha','$sIdTurno','$sNumeroOrden','$sNumeroActividad','$swbs','$cantidadIns','$comentarios','0','E','SI')";	   // mysql_query($sql);
	mysql_query($sql);
	if(mysql_error()){$error=true;mensaje(mysql_error());} ;
	//actualizar actividadesxorden
	$sql = "SELECT dInstalado,dExcedente,dCantidad  FROM actividadesxorden  WHERE sContrato='$sContrato' AND sWbs='$swbs' AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sIdConvenio='$convenio'";
  	$result=mysql_query($sql);
	if($row = mysql_fetch_array($result)){
		$dInstaladoActual = $row[0];
		$dExcedenteActual = $row[1];
		$dCantidad = $row[2];
		if(($dInstaladoActual + $cantidadIns)>$dCantidad){
			$dInstaladoActual = $dCantidad;
			$dExcedenteActual = ($cantidadIns + $dInstaladoActual)-$dCantidad;
		}
		else{
			$dInstaladoActual = $dInstaladoActual + $cantidadIns;
			$dExcedenteActual = 0 ;//$dCantidad  - ($dInstaladoActual + $cantidadIns);//$dExcedenteActual + $dExcedente;
		}		
		
	}	
   $sql ="UPDATE actividadesxorden SET dInstalado = $dInstaladoActual,dExcedente =$dExcedenteActual WHERE sContrato='$sContrato' AND sWbs='$swbs' AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sIdConvenio='$convenio' LIMIT 1";	
   mysql_query($sql);  
   if(mysql_error()){$error=true;mensaje(mysql_error());} ;
}
else if($iFase == count($iFases) and $controlador == $iFase){
	mensaje("Actualizando");
	$sql="SELECT MAX(iIdDiario) FROM bitacoradealcances 
					WHERE sContrato='$sContrato' AND sNumeroOrden='$sNumeroOrden' 
					AND dIdFecha='$fecha' AND sIdTurno='$sIdTurno' AND  sNumeroActividad='$sNumeroActividad'";
	$result = mysql_query($sql);
	if($row = mysql_fetch_array($result))$iIdDiario = $row[0];
	mensaje($iIdDiario);
	$sql ="UPDATE  bitacoradeactividades SET 
						iIdDiario ='$iIdDiarioBA',sContrato='$sContrato',dIdFecha='$fecha',sIdTurno='$sIdTurno',
						sNumeroOrden='$sNumeroOrden',sNumeroActividad='$sNumeroActividad',sWbs='$swbs',dCantidad='$cantidadIns',
						mDescripcion='$comentarios',dAvance='0',sIdTipoMovimiento='E',lAlcance='SI' WHERE sContrato='$sContrato' AND 
						iIdDiario ='$iIdDiarioBA' AND sNumeroOrden='$sNumeroOrden' AND dIdFecha='$fecha' AND sIdTurno='$sIdTurno' AND
						 sNumeroActividad='$sNumeroActividad' AND sWbs='$swbs' " ; 
	
	mysql_query($sql);
	if(mysql_error()){$error=true;mensaje(mysql_error());} ;
	
	//actualizar actividadesxorden
	$sql = "SELECT dInstalado,dExcedente,dCantidad  FROM actividadesxorden  WHERE sContrato='$sContrato' AND sWbs='$swbs' AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sIdConvenio='$convenio'";
  	$result=mysql_query($sql);
	if($row = mysql_fetch_array($result)){
		$dInstaladoActual = $row[0];
		$dExcedenteActual = $row[1];
		$dCantidad = $row[2];
		if(($dInstaladoActual + $cantidadIns)>$dCantidad){
			$dInstaladoActual = $dCantidad;
			$dExcedenteActual = ($cantidadIns + $dInstaladoActual)-$dCantidad;
		}
		else{
			$dInstaladoActual = $dInstaladoActual + $cantidadIns;
			$dExcedenteActual = 0 ;//$dCantidad  - ($dInstaladoActual + $cantidadIns);//$dExcedenteActual + $dExcedente;
		}		
	}	
   $sql ="UPDATE actividadesxorden SET dInstalado = $dInstaladoActual,dExcedente =$dExcedenteActual WHERE sContrato='$sContrato' AND sWbs='$swbs' AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sIdConvenio='$convenio' LIMIT 1";	
   mysql_query($sql);  
   if(mysql_error()){$error=true;mensaje(mysql_error());} ;
}

	if($error){
			mysql_query("rollback");
			mensaje("Ocurrio error");
			exit();
	}
	else{
		mysql_query("commit");
	}
}

function retornarMenu(){
   $_SESSION['consolidar']="";
   $_SESSION['volumen']="";
   echo "<script language='javascript'>location.href='alcances.php'</script>";
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
if(isset($_POST['iFase']))
   $_SESSION['iFase']=$_POST['iFase'];
$iFase=$_SESSION['iFase'];
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
if($cantidad>0)
	$dAvance = ($cantidadIns*100)/$cantidad;
else
	$dAvance = 0;

if(isset($_POST['volumen']))
   $_SESSION['volumen']=$_POST['volumen'];
$volumen=$_SESSION['volumen'];

if(isset($_POST['convenio']))
   $_SESSION['convenio']=$_POST['convenio'];
$convenio=$_SESSION['convenio'];

if(isset($_POST['consolidar']))
   $_SESSION['consolidar']=$_POST['consolidar'];
$consolidar=$_SESSION['consolidar'];


if ($fecha =="" or $sIdTurno=="" or
		$sNumeroOrden=="" or $sNumeroActividad=="" or
			$swbs=="" or $iFase=="" or $cantidad=="" or
				$cantidadIns=="" or $dPonderado=="" or $comentarios==""){
					print("<center><h3>Faltan Datos</h3></center>");
					print("<center><a href='alcances.php'>[Regresar]</a></center>");
}
else{
   //Buscar numero de actividades a instalar
	$sql = "SELECT dInstalado FROM actividadesxorden WHERE sContrato='$sContrato' AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sWbs='$swbs' AND sIdConvenio='$convenio'";
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
	$sql = "SELECT sum(dAvance) FROM bitacoradealcances WHERE sContrato='$sContrato' AND dIdFecha='$fecha' AND sIdTurno='$sIdTurno' AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sWbs='$swbs' AND iFase='$iFase'";
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
   	$sql = "SELECT sContrato,dIdFecha,sIdTurno,sNumeroOrden,sNumeroActividad,sWbs FROM bitacoradealcances WHERE sContrato='$sContrato' AND dIdFecha='$fecha' AND sIdTurno='$sIdTurno' AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sWbs='$swbs' AND iFase='$iFase'";
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