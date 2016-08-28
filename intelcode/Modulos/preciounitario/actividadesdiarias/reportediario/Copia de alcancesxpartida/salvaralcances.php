<?php
require ("../../../../include/reporteador.inc.php");
require ("../avanceFisico.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
   
   //idDiario Real
   function IdReal($aIdba,$idAct,$conId,$continua,$iIdDiario,$fecha,$sNumeroOrden){

   	global $sContrato;

   }
  //Busca si existe un registro en bitacoradeactividades
 function idDuplicado($sNumeroOrden,$fecha,$sNumeroActividad,$sWbs,$sIdTipoMovimiento){
 	global $sContrato;
 	$sql ="SELECT iIdDIario,sIdTipoMovimiento FROM bitacoradeactividades WHERE sContrato='$sContrato' AND sNumeroOrden='$sNumeroOrden' AND dIdFecha='$fecha' 
 					AND sNumeroActividad='$sNumeroActividad' AND sWbs='$sWbs' ";
 	$result = mysql_query($sql);
 	while($row = mysql_fetch_array($result))
 			$a[$row[0]] = $row[1];
  	if(count($a)>0)
		return $a;
	else
		return false;	
 }

  //id diario de bitacora de actividades
 function idDiario($sContrato,$sNumeroOrden,$fecha){
	$sql="SELECT MAX(iIdDiario) FROM bitacoradeactividades WHERE sContrato='$sContrato' and sNumeroOrden='$sNumeroOrden' AND dIdFecha='$fecha' ";
	$result = mysql_query($sql);
	if($row = mysql_fetch_array($result)){
		$iIdDiarioBA = $row[0];
		if($iIdDiarioBA==0)$iIdDiarioBA=1;
		else $iIdDiarioBA = $iIdDiarioBA + 1;
	}
	return  $iIdDiarioBA;
 }
 //Obtiene el total instalado en el dia
function instaladoDia($sNumeroActividad,$swbs,$sNumeroOrden,$fecha,$iFase){
	global $sContrato;
   $dCantidadDeFase=0;
   $sql = "SELECT SUM(dCantidad) FROM bitacoradealcances  
           WHERE sContrato='$sContrato' AND sNumeroActividad='$sNumeroActividad'  
           AND sWbs='$swbs'  AND sNumeroOrden='$sNumeroOrden' AND dIdFecha='$fecha'
           AND iFase='$iFase' "; 
   $result = mysql_query($sql);
   if($row = mysql_fetch_array($result))
   	$dCantidadDeFase = $row[0];
   return $dCantidadDeFase; 
}
//calcula el avance de la partida
 function avancePartida($Complemento,$AcumuladoFaseX,$cantidad,$iFases,$CantActOrden){
	$instalar = $Complemento + $AcumuladoFaseX;
   if($instalar > $CantActOrden)
   	$dAvance=0;
	else
		$dAvance = ($instalar*$iFases/$cantidad);
	
	$dAvance = round($dAvance*10000)/10000; 
	return $dAvance; 
 }  
 
 //Obtiene el total instalado hasta la fecha
 function acumuladoInstalado($sNumeroActividad,$swbs,$sNumeroOrden,$fecha,$iFase){
	global $sContrato;
   $dCantidadDeFase=0;
   $sql = "SELECT SUM(dCantidad) FROM bitacoradealcances  
           WHERE sContrato='$sContrato' AND sNumeroActividad='$sNumeroActividad'  
           AND sWbs='$swbs'  AND sNumeroOrden='$sNumeroOrden' AND dIdFecha<='$fecha'
           AND iFase='$iFase' "; 
   $result = mysql_query($sql);
   if($row = mysql_fetch_array($result))
   	$dCantidadDeFase = $row[0];
   return $dCantidadDeFase; 
}


//Guardar Nuevo Registro
function guardar(){
	$error=false;
	mysql_query("begin");
	global $sTipoAlcance,$sTipoOperacion;
	global $fecha,$sIdTurno,$sNumeroOrden,$sNumeroActividad,$swbs;
	global $cantidad,$cantidadIns,$dPonderado,$comentarios,$dAvance,$sContrato;
	global $convenio	,$dExcedente,$iFase,$sReferencia;
	$controlador = 0;
	$iIdDiario=-1;
	if(trim($sReferencia)==trim("PRESS F2 PARA HISTORICO"))
		$sReferencia="SIN REFERENCIA";
	#idDiario's de bitacoradeactividades
	$aIdba = idDuplicado($sNumeroOrden,$fecha,$sNumeroActividad,$swbs,'A');
	
   #Obtener la cantidad de Actividadesxorden
   $sql ="SELECT dCantidad FROM actividadesxorden 
          WHERE sContrato='$sContrato'  AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sWbs='$swbs'  AND sIdConvenio='$convenio';";
   $result = mysql_query($sql);
   if($row = mysql_fetch_array($result)){
      $dCantidadActividadesxOrden = $row[0];
   }

   #Obtener las fases para ese numero de actividad
   $sql ="SELECT * FROM alcancesxactividad WHERE sContrato='$sContrato' AND sNumeroActividad='$sNumeroActividad';";
   $result=mysql_query($sql);
   while($row = mysql_fetch_array($result)){
   	$iFases[$row['iFase']]=$row['dAvance'];
   }

	#leer el acumulado de la fase seleccionada
	$AcumuladoFaseSel =acumuladoInstalado($sNumeroActividad,$swbs,$sNumeroOrden,$fecha,$iFase);
	$TotalFaseSel  = $AcumuladoFaseSel + $cantidadIns;  
	
	#obtener el calculo de cada fase
	$idAct = 0;
	$conId = 0;
	$continua=-1;

	for($i=1; $i<=$iFase; $i++){

		$Complemento = 0;
		$AcumuladoFaseX =acumuladoInstalado($sNumeroActividad,$swbs,$sNumeroOrden,$fecha,$i);

		#obtener la cantidad a instalar
		if($TotalFaseSel > $AcumuladoFaseX)
			$Complemento = $TotalFaseSel - $AcumuladoFaseX;


		#obtener el avance
		$instaladoDia = instaladoDia($sNumeroActividad,$swbs,$sNumeroOrden,$fecha,$i);
		$dAvance = avancePartida($Complemento,$instaladoDia,$cantidad,$iFases[$i], $dCantidadActividadesxOrden);

		#crear las consultas
		#Obtener el Id Diario
		$sql = "SELECT iIdDiario FROM bitacoradealcances WHERE sContrato='$sContrato' AND sNumeroActividad='$sNumeroActividad' 
						AND sNumeroOrden='$sNumeroOrden' AND sWbs='$swbs' AND dIdFecha='$fecha'	AND sIdTurno='$sIdTurno' AND iFase='$i' ";
		$result = mysql_query($sql);
		if($row = mysql_fetch_array($result)){
			$Diario = $row[0];//$idAct;
		}
		else{
			$Diario = idDiario($sContrato,$sNumeroOrden,$fecha) ;
		}
						
   	$sql ="INSERT INTO bitacoradealcances (iIdDiario,sContrato,dIdFecha,sIdTurno,sNumeroOrden,sNumeroActividad,sWbs,dCantidad,mDescripcion,dAvance,iFase,sReferencia) 
     					VALUES ('$Diario','$sContrato','$fecha','$sIdTurno','$sNumeroOrden','$sNumeroActividad','$swbs',$Complemento,'$comentarios','$dAvance','$i','$sReferencia')
     					ON DUPLICATE KEY UPDATE dCantidad=dCantidad+$Complemento, dAvance='$dAvance' ,sReferencia ='$sReferencia' ";
	   if($Complemento>0)mysql_query($sql);
		if(mysql_error()){$error=true ;mensaje(mysql_error());}
		
	 	$sql ="INSERT INTO bitacoradeactividades (iIdDiario,sContrato,dIdFecha,sIdTurno,sNumeroOrden,sNumeroActividad,sWbs,dCantidad,mDescripcion,dAvance,sIdTipoMovimiento,lAlcance) 
 						VALUES ('$Diario','$sContrato','$fecha','$sIdTurno','$sNumeroOrden','$sNumeroActividad','$swbs',0,'$comentarios','$dAvance','$sTipoAlcance','NO')
 						ON DUPLICATE KEY UPDATE dAvance='$dAvance' ;";//, sIdTipoMovimiento='$sTipoAlcance' , dCantidad='0' , lAlcance='NO' , mDescripcion = '$comentarios'	
		if($Complemento>0)mysql_query($sql);
		if(mysql_error()){$error=true ;mensaje(mysql_error());}

		#insertar la ultima fase en bitacora de actividades
		if($i == count($iFases)){
			
			#Obtener el Id Diario
			$sql = "SELECT iIdDiario FROM bitacoradeactividades WHERE sContrato='$sContrato' AND sNumeroActividad='$sNumeroActividad' 
						AND sNumeroOrden='$sNumeroOrden' AND sWbs='$swbs' AND dIdFecha='$fecha'	AND sIdTurno='$sIdTurno' AND sIdTipoMovimiento='$sTipoOperacion'
						AND  lAlcance='SI' ";
			$result = mysql_query($sql);
			if($row = mysql_fetch_array($result)){
				$Diario = $row[0];//$idAct;
			}
			else{
				$Diario = idDiario($sContrato,$sNumeroOrden,$fecha) ;
			}
			
			$sql ="INSERT INTO bitacoradeactividades (iIdDiario,sContrato,dIdFecha,sIdTurno,sNumeroOrden,sNumeroActividad,sWbs,dCantidad,mDescripcion,dAvance,sIdTipoMovimiento,lAlcance) 
							VALUES ($Diario,'$sContrato','$fecha','$sIdTurno','$sNumeroOrden','$sNumeroActividad','$swbs','$Complemento','$comentarios','0','$sTipoOperacion','SI')
							ON DUPLICATE KEY UPDATE dCantidad=dCantidad+$Complemento, dAvance='0';";

			if($Complemento>0)mysql_query($sql);
			if(mysql_error()){$error=true ;mensaje(mysql_error());}
			
			#actualizar actividadesxorden
			$sql = "SELECT dInstalado,dExcedente,dCantidad  FROM actividadesxorden  WHERE sContrato='$sContrato' AND sWbs='$swbs' 
   			AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sIdConvenio='$convenio'";
  			$result=mysql_query($sql);
			if($row = mysql_fetch_array($result)){
				$dInstaladoActual = $row[0];
				$dExcedenteActual = $row[1];
				$dCantidad = $row[2];
				if(($dInstaladoActual + $cantidadIns)>$dCantidad){
					$dExcedenteActual = ($cantidadIns -$dCantidad)+ $dInstaladoActual ;
					$dInstaladoActual = $dCantidad;
				}
				else{
					$dInstaladoActual = $dInstaladoActual + $cantidadIns;
					$dExcedenteActual = 0 ;
				}		
			}	
   		$sql ="UPDATE actividadesxorden SET dInstalado = '$dInstaladoActual',dExcedente ='$dExcedenteActual' 
   			WHERE sContrato='$sContrato' AND sWbs='$swbs' AND sNumeroOrden='$sNumeroOrden' 
   			AND sNumeroActividad='$sNumeroActividad' AND sIdConvenio='$convenio' LIMIT 1 ;";	
	  		mysql_query($sql);  			
			if(mysql_error()){$error=true ;mensaje(mysql_error());}
		}
	}
	if($error==true){
		mysql_query("rollback");
		mensaje("Error en la Operación , Intentelo de Nuevo");	
	}
	else{mysql_query("commit");}
	
	avanceFisico ($sContrato,sNumeroOrden,$convenio,$sIdTurno,$fecha) ;
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
if(isset($_POST['comentarios']))
   $_SESSION['sReferencia']=$_POST['sReferencia'];
$sReferencia=$_SESSION['sReferencia']; 

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
$sql =" select  sTipoAlcance,sTipoOperacion from configuracion where sContrato='$sContrato';";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
	$sTipoAlcance=$row[0];
	$sTipoOperacion=$row[1];
}
//echo "Fecha: $fecha , Turno : $sIdTurno , Numero Orden: $sNumeroOrden, Actividad :$sNumeroActividad , Wbs : $swbs ,Fase: $iFase, cantidad: $cantidad , cantidadIns: $cantidadIns, Ponderado : $dPonderado";
if ($fecha =="" or $sIdTurno=="" or
		$sNumeroOrden=="" or $sNumeroActividad=="" or
			$swbs=="" or $iFase=="" or $cantidad=="" or
				$cantidadIns=="" or $dPonderado=="" ){//or $comentarios==""
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
	if($_POST['volumen']!='No'){
      guardar();      
   }
   retornarMenu();
   
}


?>