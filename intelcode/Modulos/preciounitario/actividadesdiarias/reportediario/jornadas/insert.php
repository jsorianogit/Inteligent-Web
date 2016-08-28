<?php
mysql_query("begin");
$iJornadas = Jornadas();
//Obtener la jornada de la fecha 
$JornadasxDia = JornadasDia($_SESSION['dIdFecha'],$iJornadas);
 //Aplicables para ambos casos(Disponibilidad de Sitio ó Tiempos Muertos)

  //Verificar que la hora de inicio ingresada es menor que la hora final ingresada
	if(CompararHoras($_POST['sHoraInicio'],$_POST['sHoraFinal'])){
		mensaje("La hora de fin de actividades es menor que la hora de inicio !!");
		location("menu.php");
		exit(0);
	}
//Aplicable solo a Disponibilidad de Sitio

if($_POST['sTipo']=="Disponibilidad del Sitio"){

 //Verificar que la hora de salida es mayor o igual a la hora de llegada
	if(CompararHoras($_POST['sHoraSalida'],$_POST['sHoraLlegada'])){
		mensaje("La hora de salida no puede ser mayor a la hora de llegada!!");
		location("menu.php");
		exit(0);
	}
 //Verificar que la hora de salida es mayor o igual a la hora de salida
	if(CompararHoras($_POST['sHoraLlegada'],$_POST['sHoraInicio'])){
		mensaje("La hora de llegada no puede ser mayor a la hora de inicio de actividades !!");
		location("menu.php");
		exit(0);
	}

	//Calcular el tiempo inhabil desde la hora de inicio hast la hora final
 $JornadaHabil = RestarHoras($_POST['sHoraInicio'],$_POST['sHoraFinal']);
 //Verificar que las jornadas trabajadas, son mayores a lor tiempos de comida
	if(!CompararHoras($JornadaHabil,$_POST['sTiempoComida'])){
		mensaje("La Hora de Comida es Mayor que la jornada trabajada !!");
		location("menu.php");
		exit(0);
	}
	//Jornadas habiles menos tiempo de comida
	$JornadaHabil = RestarHoras($_POST['sTiempoComida'],$JornadaHabil);
	$DIVIDIRHORA = explode(".",$JornadasxDia);
	$hora = $DIVIDIRHORA[0];
	$minuto = ($DIVIDIRHORA[1]*60)/100;
	
	if($hora < 10) $hora = "0$hora";
	if($minuto < 10)$minuto = "0$minuto";

	$JoradaDiariaFormat = $hora.":".$minuto;
	//Insertar el tiempo inactivo si existe en la Disponibilidad
	if(!CompararHoras($JornadaHabil,$JoradaDiariaFormat)){
	 	//Sacar el total de personal actual almacenado
	  	$sql = "SELECT SUM(dFrente) FROM jornadasdiarias where sContrato='$sContrato' and sNumeroOrden='".$_SESSION['sNumeroOrden']."' AND dIdFecha='".$_SESSION['dIdFecha']."' AND sIdTurno='".$_SESSION['sIdTurno']."' AND sTipo<>'Tiempo Inactivo'";
	 	$result = mysql_query($sql);
	 	if ($row = mysql_fetch_array($result)){
			$TotalPersonal=$row[0];
		}

      
      if(($TotalPersonal+$_POST['dFrente']) > 0){
       		//actualizar  los tiempos muertos de las disponibilidades segun cantidad de personal ingresado
       		$SumadorTiempoMuerto="00:00";
		   	$sql = "SELECT * FROM jornadasdiarias WHERE sContrato='$sContrato' and sNumeroOrden='".$_SESSION['sNumeroOrden']."' AND dIdFecha='".$_SESSION['dIdFecha']."' AND sIdTurno='".$_SESSION['sIdTurno']."' AND sTipo<>'Tiempo Inactivo'";
			$result = mysql_query($sql);
			while($row = mysql_fetch_array($result)) {
			 	$tiempoMuertoRowAct = RestarHoras($row['sJornada'],$JoradaDiariaFormat); 
			 	//dividir la hora de los minutos
		 		$DIVIDIRHORA = explode(":",$tiempoMuertoRowAct);
		 		//Total de Minutos Muerto
	      	$MinutosMuertos=($DIVIDIRHORA[0]*60)+$DIVIDIRHORA[1];
	      #echo "<br>Personal: ".$row['dFrente'];
	      #echo "<br>Jornada Diaria: ".$JoradaDiariaFormat;
	      #echo "<br>Calculado nuevo: $MinutosMuertos ";
	      #echo "<br>Tiempo Muerto de la Disponibilidad : ".$tiempoMuertoRowAct;
	      	
	      	//(Total de minutos muertos * cantidad de personal ) / Total de personal
				$TiempoMuerto = ( $row['dFrente'] * ($MinutosMuertos) ) / ($TotalPersonal+$_POST['dFrente']);
			#echo "<br>Tiempo Muerto tomando en cuenta el personal : ".$TiempoMuerto;
				//convertir los minutos a hora
				$TiempoMuerto = $TiempoMuerto /60;
				//solo dejar dos decimales para calcular bien los minutos
				$TiempoMuerto = round($TiempoMuerto*100)/100;
			#echo "<br>Tiempo Muerto redondeado y en horas : ".$TiempoMuerto;
				//darle formato de hora
				$DIVIDIRHORA =explode(".",$TiempoMuerto);
				//si en los minutos hay un decimal desaparecerlo
				if(strlen($DIVIDIRHORA[1]) == 1)$DIVIDIRHORA[1]=$DIVIDIRHORA[1]."0";
				$DIVIDIRHORA[1] = (($DIVIDIRHORA[1]*60)/100);
				$DIVIDIRHORA[1] = round($DIVIDIRHORA[1]*1)/1;

				//si solo es un decimal agregarle el complemento cero de la izquierda
				if($DIVIDIRHORA[0] <10)$DIVIDIRHORA[0]="0".$DIVIDIRHORA[0];
				if($DIVIDIRHORA[1]<10)$DIVIDIRHORA[1]="0".$DIVIDIRHORA[1];
				//unir y crear completamente la fecha
			   $TiempoMuerto = $DIVIDIRHORA[0] . ":" .$DIVIDIRHORA[1];
			   
			#echo "<br>Tiempo Muerto de la Disponibilidad : ".$TiempoMuerto;
			   
				$sqlHora ="SELECT ADDTIME('$SumadorTiempoMuerto','$TiempoMuerto') ";
				$resultHora = mysql_query($sqlHora);
				if($rowHora = mysql_fetch_array($resultHora))
					$SumadorTiempoMuerto = $rowHora[0];
			#echo "<br> Sumador de Horas :  ".$row['dIdFecha']." - ".$SumadorTiempoMuerto ;
			}
       
			//restar las jornadas trabajadas de las jornadas que se debe trabajar en el dia
	 		$TiempoInactivoAuto = RestarHoras($JornadaHabil,$JoradaDiariaFormat); 
	 		//dividir la hora de los minutos
	 		$DIVIDIRHORA = explode(":",$TiempoInactivoAuto);
	 		//Total de Minutos Muerto
      	$MinutosMuertos=($DIVIDIRHORA[0]*60)+$DIVIDIRHORA[1];
      	//(Total de minutos muertos * cantidad de personal ) / Total de personal
			$TiempoMuerto = ( $_POST['dFrente'] * ($MinutosMuertos) ) / ($TotalPersonal+$_POST['dFrente']);
			//convertir los minutos a hora
			$TiempoMuerto = $TiempoMuerto /60;
			//solo dejar dos decimales para calcular bien los minutos
			$TiempoMuerto = round($TiempoMuerto*100)/100;
			//darle formato de hora
			$DIVIDIRHORA =explode(".",$TiempoMuerto);
			//si en los minutos hay un decimal desaparecerlo
			$DIVIDIRHORA[1] = (($DIVIDIRHORA[1]*60)/100);
			$DIVIDIRHORA[1] = round($DIVIDIRHORA[1]*1)/1;
			//si solo es un decimal agregarle el complemento cero de la izquierda
			if($DIVIDIRHORA[0] <10)$DIVIDIRHORA[0]="0".$DIVIDIRHORA[0];
			if($DIVIDIRHORA[1]<10)$DIVIDIRHORA[1]="0".$DIVIDIRHORA[1];
			//unir y crear completamente la fecha
		   $TiempoMuerto = $DIVIDIRHORA[0] . ":" .$DIVIDIRHORA[1];
			
		 	$sqlHora ="SELECT ADDTIME('$SumadorTiempoMuerto','$TiempoMuerto') ";
			$resultHora = mysql_query($sqlHora);
			if($rowHora = mysql_fetch_array($resultHora))
				$SumadorTiempoMuerto = $rowHora[0];
	
			
			$sql ="	INSERT INTO 
		jornadasdiarias (sContrato,dIdFecha,sNumeroOrden,sIdTurno,sTipo,dFrente,sIdTipoMovimiento,mDescripcion,sJornada) 
		VALUES ('$sContrato','".$_SESSION['dIdFecha']."','".$_SESSION['sNumeroOrden']."','".$_SESSION['sIdTurno']."','Tiempo Inactivo','".$_POST['dFrente']."' ,'TMDS' ,'".$_POST['mDescripcion']."','$SumadorTiempoMuerto' ) ON DUPLICATE KEY UPDATE dFrente=dFrente + '".$_POST['dFrente']."' , sJornada='$SumadorTiempoMuerto';";
			mysql_query($sql);
			if(mysql_error()){
				mensaje(mysql_error());
				mysql_query("rollback");
				location("mostrar.php");
				exit(0);
			}
		}
	}
}

//Insertar la disponibilidad o Tiempo inactivo
$sql = "
INSERT INTO 
jornadasdiarias (sContrato,dIdFecha,sNumeroOrden,sIdTurno,sTipo,sIdPernocta,sHoraSalida,sIdPlataforma,sIdEmbarcacion,sHoraLlegada,sHoraInicio,sHoraFinal,sTiempoComida,dFrente,sIdTipoMovimiento,sArea,mDescripcion,sJornada) 
VALUES ('".$sContrato."','".$_SESSION['dIdFecha']."','".$_SESSION['sNumeroOrden']."','".$_SESSION['sIdTurno']."','".$_POST['sTipo']."','".$_POST['sIdPernocta']."','".$_POST['sHoraSalida']."','".$_POST['sIdPlataforma']."' ,'".$_POST['sIdEmbarcacion']."' ,'".$_POST['sHoraLlegada']."' ,'".$_POST['sHoraInicio']."' ,'".$_POST['sHoraFinal']."' ,'".$_POST['sTiempoComida']."' ,'".$_POST['dFrente']."' ,'".$_POST['sIdTipoMovimiento']."' ,'".$_POST['sArea']."' ,'".$_POST['mDescripcion']."','$JornadaHabil')";
mysql_query($sql);
if(mysql_error()){
   mensaje(mysql_error());
   mysql_query("rollback");
	location("mostrar.php");
	exit(0);
}

mysql_query("commit");

location("mostrar.php");
?>