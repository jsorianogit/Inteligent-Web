<?php
require ("../../../../include/reporteador.inc.php");
require ("../avanceFisico.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";

//Guardar Nuevo Registro
function guardar(){
	$error=false;
	mysql_query("begin");
	global $sTipoAlcance,$sTipoOperacion;
	global $fecha,$sIdTurno,$sNumeroOrden,$sNumeroActividad,$swbs;
	global $cantidad,$cantidadIns,$dPonderado,$comentarios,$dAvance,$sContrato;
	global $convenio	,$dExcedente,$iFase,$sReferencia;
	#Seleccionar el ultimo id diario de bitacoradeactividades 
	$sql="SELECT MAX(iIdDiario) FROM bitacoradeactividades WHERE sContrato='$sContrato' and sNumeroOrden='$sNumeroOrden' ";
	$result = mysql_query($sql);
	if($row = mysql_fetch_array($result)){
		$iIdDiarioBA = $row[0];
		$iIdDiarioBA = $iIdDiarioBA + 1;
	}
	#seleccionar el ultimo id diario de bitacoradalcances
	$sql="SELECT MAX(iIdDiario) FROM bitacoradealcances WHERE sContrato='$sContrato' and sNumeroOrden='$sNumeroOrden' ";
	$result = mysql_query($sql);
	if($row = mysql_fetch_array($result)){
		$iIdDiario = $row[0];
		$iIdDiario = $iIdDiario + 1;
	}

	#Seleccionar la ultima fase
   $sql ="  SELECT max(iFase) as iFase FROM bitacoradealcances  WHERE sContrato='$sContrato' AND sNumeroActividad='$sNumeroActividad' 
         AND sWbs='$swbs'   AND sNumeroOrden='$sNumeroOrden' AND dIdFecha='$fecha'";
   $result = mysql_query($sql);
   if($row = mysql_fetch_array($result)){
      $iUltimaFase = $row['iFase'];
      
   }
   
   #Obtener las fases para ese numero de actividad
   $sql ="SELECT * FROM alcancesxactividad WHERE sContrato='$sContrato' AND sNumeroActividad='$sNumeroActividad';";
   $result=mysql_query($sql);
   while($row = mysql_fetch_array($result)){
   	$iFases[$row['iFase']]=$row['dAvance'];
   }
   #Obtener la cantidad de Actividadesxorden
   $sql ="SELECT dCantidad FROM actividadesxorden 
          WHERE sContrato='$sContrato' 
          AND sNumeroOrden='$sNumeroOrden' 
          AND sNumeroActividad='$sNumeroActividad'
          AND sWbs='$swbs' 
          AND sIdConvenio='$convenio';";
   $result = mysql_query($sql);
   if($row = mysql_fetch_array($result)){
      $dCantidadActividadesxOrden = $row[0];
   }
   #Obtener la cantidad instalada hasta el momento en la fase seleccionada
   $dCantidadDeFase=0;
   $sql = "SELECT dCantidad FROM bitacoradealcances  
           WHERE sContrato='$sContrato' AND sNumeroActividad='$sNumeroActividad'  
           AND sWbs='$swbs'  AND sNumeroOrden='$sNumeroOrden' AND dIdFecha<='$fecha'
           AND iFase='$iFase' "; 
   $result = mysql_query($sql);
   if($row = mysql_fetch_array($result))
   	$dCantidadDeFase = $row[0];
      
   #Si existian ya registros con esas fases
   $controlador = 0;
   if($iFase >= $iUltimaFase and $iUltimaFase!=""){
     $sql = "  SELECT iFase, dCantidad, sWbs, dIdFecha,sNumeroActividad FROM bitacoradealcances  WHERE sContrato='$sContrato' 
            AND sNumeroActividad='$sNumeroActividad'  AND dIdFecha<='$fecha' AND sWbs='$swbs' AND sNumeroOrden='$sNumeroOrden' ORDER BY iFase";
      
      $result = mysql_query($sql);
      if($iFase == count($iFases)){                #Si se Esta ingresando la ultima fase
        while($row = mysql_fetch_array($result)){  #Checar si las cantidades de las fases anteriores son menores
           if(($cantidadIns+$dCantidadDeFase) > $row['dCantidad'] ){
          		$instalar = ($cantidadIns+$dCantidadDeFase);
          		if($instalar > $dCantidadActividadesxOrden)
          		   $dAvance=0;
          		else
            		$dAvance = ($instalar*$iFases[$row['iFase']])/$cantidad;
         		#Actualizar bitacoradealcances
               $sql = "UPDATE bitacoradealcances SET dCantidad='$instalar' , dAvance='$dAvance',mDescripcion='$comentarios',sReferencia='$sReferencia' WHERE sContrato='$sContrato' 
               AND sNumeroActividad='$sNumeroActividad'  AND sWbs='$swbs'  AND dIdFecha='$fecha' AND iFase='".$row['iFase']."' AND sNumeroOrden='$sNumeroOrden'" ;
               mysql_query($sql);
               if(mysql_error())mensaje("Error en Bitacora de Alcances : ".mysql_error());
               #Actualizar bitacoradeactividades
               $sql = "UPDATE bitacoradeactividades SET  dAvance='$dAvance' ,mDescripcion='$comentarios' WHERE sContrato='$sContrato' 
               AND sNumeroActividad='$sNumeroActividad'  AND sWbs='$swbs'  AND dIdFecha='$fecha'  AND sNumeroOrden='$sNumeroOrden'  " ;
               mysql_query($sql);
               if(mysql_error())mensaje("Error en Bitacora de Actividades : ".mysql_error());
           }
           #Obtener la ultima fase procesada
           $controlador =$row['iFase'];
         }
     }
     else{                                         #Si se Esta ingresando una fase que no es la ultima
        while($row = mysql_fetch_array($result)){  
       		$instalar = $row['dCantidad']+$cantidadIns;
        		if($instalar > $dCantidadActividadesxOrden)
        		   $dAvance=0;
        		else
           		$dAvance = ($instalar*$iFases[$row['iFase']])/$cantidad;
            $sql = "UPDATE bitacoradealcances SET dCantidad='$instalar' , dAvance='$dAvance' ,mDescripcion='$comentarios',sReferencia='$sReferencia' WHERE sContrato='$sContrato' 
            AND sNumeroActividad='$sNumeroActividad'  AND sWbs='$swbs'  AND dIdFecha='$fecha' AND iFase='".$row['iFase']."' AND sNumeroOrden='$sNumeroOrden'  " ;
            mysql_query($sql);
            if(mysql_error())mensaje("bitacoradealcances ".mysql_error());
            $sql = "UPDATE bitacoradeactividades SET  dAvance='$dAvance' ,mDescripcion='$comentarios' WHERE sContrato='$sContrato' 
            AND sNumeroActividad='$sNumeroActividad'  AND sWbs='$swbs'  AND dIdFecha='$fecha'  AND sNumeroOrden='$sNumeroOrden'  " ;
            mysql_query($sql);
            if(mysql_error())mensaje("bitacoradeactividades ".mysql_error());
            $controlador =$row['iFase'];
         }
      }
   }
   #si no existen REgistros con esas Fases ingresar los primeros
   #Si ya Existian registros con fases insertar a partir del ultimo encontrado

   if(!$iUltimaFase or   $controlador !=0){
     
		if($iUltimaFase)$cont=$iUltimaFase+1;
		else $cont = $controlador;
		if(!$iUltimaFase and $controlador==0)$cont=1;		
		$iIdDia = $iIdDiarioBA ;
      for($i =   $cont ; $i <=$iFase;$i++){
      	if($controlador == $iFase)break;
      	//Guardar en bitacora de alcances
     		if($cantidadIns > $dCantidadActividadesxOrden)
     		   $dAvance=0;
     		else
         	$dAvance = ($cantidadIns*$iFases[$i])/$cantidad;
     		$sql ="INSERT INTO bitacoradealcances (iIdDiario,sContrato,dIdFecha,sIdTurno,sNumeroOrden,sNumeroActividad,sWbs,dCantidad,mDescripcion,dAvance,iFase,sReferencia) 
     				VALUES ($iIdDia,'$sContrato','$fecha','$sIdTurno','$sNumeroOrden','$sNumeroActividad','$swbs',$cantidadIns,'$comentarios','$dAvance','$i','$sReferencia')";
 		   mysql_query($sql);
			$iIdDia++;
      	if(mysql_error()){$error=true;mensaje("bitacoradealcances ".mysql_error());} ;
   	}
   	$iIdDia = $iIdDiarioBA ;
      for($i =   $cont ; $i <=$iFase;$i++){
      	if($controlador == $iFase)break;
      	//Guardar en bitacora de actividades
     		if($cantidadIns > $dCantidadActividadesxOrden)
     		   $dAvance=0;
     		else
         	$dAvance = ($cantidadIns*$iFases[$i])/$cantidad;
        	$sql ="INSERT INTO bitacoradeactividades (iIdDiario,sContrato,dIdFecha,sIdTurno,sNumeroOrden,sNumeroActividad,sWbs,dCantidad,mDescripcion,dAvance,sIdTipoMovimiento,lAlcance) VALUES ($iIdDia,'$sContrato','$fecha','$sIdTurno','$sNumeroOrden','$sNumeroActividad','$swbs',0,'$comentarios','$dAvance','$sTipoAlcance','NO')";	   // mysql_query($sql);	 ################################################# A  
 		   mysql_query($sql);
			$iIdDia++;
      	if(mysql_error()){$error=true;mensaje("bitacoradeactividades ".mysql_error());} ;
   	}   	
   }
//inserta en bitacoradeactividades y actualiza en actividadesxorden cuando es una instalacion    
if($iFase == count($iFases) and $controlador != $iFase){
	#mensaje("insertando "); 	
	$sql ="INSERT INTO bitacoradeactividades (iIdDiario,sContrato,dIdFecha,sIdTurno,sNumeroOrden,sNumeroActividad,sWbs,dCantidad,mDescripcion,dAvance,sIdTipoMovimiento,lAlcance) 
	VALUES ($iIdDia,'$sContrato','$fecha','$sIdTurno','$sNumeroOrden','$sNumeroActividad','$swbs','$cantidadIns','$comentarios','0','$sTipoOperacion','SI')";	   // mysql_query($sql);
	#################################################################################################### E 
	mysql_query($sql);
	if(mysql_error()){$error=true;mensaje(mysql_error());};
	//actualizar actividadesxorden
   $sql = "SELECT dInstalado,dExcedente,dCantidad  FROM actividadesxorden  WHERE sContrato='$sContrato' AND sWbs='$swbs' AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sIdConvenio='$convenio'";
  	$result=mysql_query($sql);
	while($row = mysql_fetch_array($result)){
		$dInstaladoActual = $row['dInstalado'];
		$dExcedenteActual = $row['dExcedente'];
		$dCantidad = $row['dCantidad'];
		if(($dInstaladoActual + $cantidadIns)>$dCantidad){
			$dExcedenteActual = ($cantidadIns -$dCantidad)+ $dInstaladoActual ;
			$dInstaladoActual = $dCantidad;
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
	#mensaje("Actualizando");
	$sql="SELECT MAX(iIdDiario) FROM bitacoradealcances 
					WHERE sContrato='$sContrato' AND sNumeroOrden='$sNumeroOrden' 
					AND dIdFecha='$fecha' AND sIdTurno='$sIdTurno' AND  sNumeroActividad='$sNumeroActividad'";
	$result = mysql_query($sql);
	if($row = mysql_fetch_array($result))$iIdDiario = $row[0];
	$iIdDiario++;
   $sql ="UPDATE  bitacoradeactividades SET 
						dCantidad=($cantidadIns+$dCantidadDeFase),mDescripcion='$comentarios' 
                  WHERE sContrato='$sContrato' AND iIdDiario ='$iIdDiario' AND sNumeroOrden='$sNumeroOrden' 
                  AND dIdFecha='$fecha' AND sIdTurno='$sIdTurno' AND sNumeroActividad='$sNumeroActividad' AND sWbs='$swbs' 
                  AND sIdTipoMovimiento='$sTipoOperacion' AND lAlcance='SI' AND dAvance='0'" ; 
                  ############################################################################ E 
	
	mysql_query($sql);
	if(mysql_error()){$error=true;mensaje(mysql_error());} ;
	
	//actualizar actividadesxorden
	$sql = "SELECT dInstalado,dExcedente,dCantidad  FROM actividadesxorden  WHERE sContrato='$sContrato' AND sWbs='$swbs' 
   AND sNumeroOrden='$sNumeroOrden' AND sNumeroActividad='$sNumeroActividad' AND sIdConvenio='$convenio'";
  	$result=mysql_query($sql);
	if($row = mysql_fetch_array($result)){
		$dInstaladoActual = $row[0];
		$dExcedenteActual = $row[1];
		$dCantidad = $row[2];
		if(($dInstaladoActual + $cantidadIns)>$dCantidad){
			$dExcedenteActual = ($cantidadIns -$dCantidad)+ $dInstaladoActual ;
    		mensaje("Modificando ".$dExcedenteActual);
			$dInstaladoActual = $dCantidad;
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
echo "Fecha: $fecha , Turno : $sIdTurno , Numero Orden: $sNumeroOrden, Actividad :$sNumeroActividad , Wbs : $swbs ,Fase: $iFase, cantidad: $cantidad , cantidadIns: $cantidadIns, Ponderado : $dPonderado";
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