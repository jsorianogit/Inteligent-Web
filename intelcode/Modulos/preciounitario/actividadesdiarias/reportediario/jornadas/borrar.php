<?php
require ("../../../../include/mysql.inc.php");
$sql = "DELETE FROM jornadasdiarias WHERE sContrato='".$_REQUEST['sContrato']."' AND dIdFecha = '".$_REQUEST['dIdFecha']."' AND sNumeroOrden = '".$_REQUEST['sNumeroOrden']."' AND sIdTurno = '".$_REQUEST['sIdTurno']."' AND sArea='".$_REQUEST['sArea']."' AND sTipo='".$_REQUEST['sTipo']."' AND sIdPernocta='".$_REQUEST['sIdPernocta']."' AND sIdEmbarcacion='".$_REQUEST['sIdEmbarcacion']."' AND sHoraInicio='".$_REQUEST['sHoraInicio']."' AND sHoraFinal = '".$_REQUEST['sHoraFinal']."' AND sHoraSalida = '".$_REQUEST['sHoraSalida']."'; ";
mysql_query($sql);
if(mysql_error())
   mensaje(mysql_error());
   
######################Actualizar los tiempos muertos
//incluir funciones de obtencion de jornadas diarias
require ("functions.php");
#OBTENER LA JORNADA DE DIAS ESPECIALES SI EXISTE
$sql = "select iJornada from diasespeciales where sContrato='$sContrato' and dIdFecha='".$_SESSION['dIdFecha']."';";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
	$iJornadaDiaEspecial = $row['iJornada'];

}
#OBTENER LAS JORNADAS A TRABAJAR EN EL DIA
$sql = "select iJornada from ordenesdetrabajo where sContrato='$sContrato' and sNumeroOrden = '".$_SESSION['sNumeroOrden']."';";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
	$iJornadaOrdenesdeTrabajo = $row['iJornada'];

}
if($iJornadaDiaEspecial){
  
 	if($iJornadaDiaEspecial >= 10){
		$JornadaDiariaFormat = $iJornadaDiaEspecial.":00";
	}
	else{
		$JornadaDiariaFormat = "0".$iJornadaDiaEspecial.":00";
	}  
}
else if($iJornadaOrdenesdeTrabajo <1){
 	#Si las jornadas de ordenes de trabajo es igual a cero, sacar
 	#las jornadas de la configuracion
	$iJornadas = Jornadas();
	#Obtener la jornada de la fecha 
	$JornadasxDia = JornadasDia($_SESSION['dIdFecha'],$iJornadas);
	#convertirlo a formato de hora
	$arrayHora = explode(".",$JornadasxDia);
	$hora = $arrayHora[0];
	$minuto = ($arrayHora[1]*60)/100;
	if($hora < 10) $hora = "0$hora";
	if($minuto < 10)$minuto = "0$minuto";
	$JornadaDiariaFormat = $hora.":".$minuto;
}
else{
 
 	if($iJornadaOrdenesdeTrabajo >= 10){
		$JornadaDiariaFormat = $iJornadaOrdenesdeTrabajo.":00";
	}
	else{
		$JornadaDiariaFormat = "0".$iJornadaOrdenesdeTrabajo.":00";
	}
}



	  	$sql = "SELECT SUM(dFrente) FROM jornadasdiarias where sContrato='".$_REQUEST['sContrato']."' and sNumeroOrden='".$_REQUEST['sNumeroOrden']."' AND dIdFecha='".$_REQUEST['dIdFecha']."' AND sIdTurno='".$_REQUEST['sIdTurno']."' AND sTipo<>'Tiempo Inactivo'";
	 	$result = mysql_query($sql);
	 	if ($row = mysql_fetch_array($result)){
			$TotalPersonal=$row[0];
		}
		
      if($TotalPersonal> 0){
     
		 		//actualizar  los tiempos muertos de las disponibilidades segun cantidad de personal ingresado
       		$SumadorJornada="0";
       		$dFrente=0;
		  	$sql = "SELECT * 
			  		  FROM jornadasdiarias 
					  WHERE sContrato='".$_REQUEST['sContrato']."' AND sNumeroOrden='".$_REQUEST['sNumeroOrden']."' 
					  AND dIdFecha='".$_REQUEST['dIdFecha']."' AND sIdTurno='".$_REQUEST['sIdTurno']."' AND sTipo<>'Tiempo Inactivo'";
			$result = mysql_query($sql);
			while($row = mysql_fetch_array($result)) {
	      	$MinutosJornada=HourToMinutes($row['sJornada']);
	      	//(Total de minutos muertos * cantidad de personal ) / Total de personal
				$TiempoHabil = ( $row['dFrente'] * $MinutosJornada ) / ($TotalPersonal);
				$SumadorJornada += $TiempoHabil ;
				$dFrente += $row['dFrente'];
			}
			//Convertir los minutos de tiempos muertos en formato hora
			$SumadorJornada = $SumadorJornada /60;
			$SumadorJornada = NumberToHour($SumadorJornada);

		//Si la jornada total laborada es menor que la jornada de configuracion, insertar un TMDS
		if(CompararHoras($JornadaDiariaFormat,$SumadorJornada)){
		 	$sTiempoMuerto = RestarHoras($SumadorJornada,$JornadaDiariaFormat);
			$sql ="INSERT INTO 
				jornadasdiarias 	
				(sContrato,dIdFecha,sNumeroOrden,sIdTurno,sTipo,dFrente,sIdTipoMovimiento,mDescripcion,sJornada) 
				VALUES ('".$_REQUEST['sContrato']."','".$_REQUEST['dIdFecha']."',
					'".$_REQUEST['sNumeroOrden']."','".$_REQUEST['sIdTurno']."','Tiempo Inactivo',
					'$dFrente' ,'TMDS' ,'".$_POST['mDescripcion']."','$sTiempoMuerto' ) 
				ON DUPLICATE KEY UPDATE dFrente='$dFrente' , sJornada='$sTiempoMuerto';";
			mysql_query($sql);
			if(mysql_error()){
				mensaje(mysql_error());
				mysql_query("rollback");
				location("mostrar.php");
				exit(0);
			}
		}else{//Si la jornada total a laborar es mayor que la jornada de configuracion, no hay TMDS
		   $sql="DELETE FROM jornadasdiarias 
							WHERE sContrato='".$_REQUEST['sContrato']."' AND dIdFecha='".$_REQUEST['dIdFecha']."' 
							AND sNumeroOrden='".$_REQUEST['sNumeroOrden']."'	AND sIdTurno='".$_REQUEST['sIdTurno']."' AND sTipo='Tiempo Inactivo' 
							AND sIdTipoMovimiento='TMDS'";
			mysql_query($sql);
		}
					
			
		}
		else{
			$sql ="DELETE FROM jornadasdiarias WHERE sContrato='".$_REQUEST['sContrato']."' AND dIdFecha='".$_REQUEST['dIdFecha']."' AND sNumeroOrden='".$_REQUEST['sNumeroOrden']."' AND sIdTurno='".$_REQUEST['sIdTurno']."' AND sTipo='Tiempo Inactivo' AND sIdTipoMovimiento='TMDS'";
			mysql_query($sql);
			if(mysql_error()){
				mensaje(mysql_error());
				mysql_query("rollback");
				location("mostrar.php");
				exit(0);
			}
		}
location("mostrar.php");
?>