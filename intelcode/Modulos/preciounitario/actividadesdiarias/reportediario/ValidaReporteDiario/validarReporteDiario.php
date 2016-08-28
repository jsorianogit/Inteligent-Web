<?php
require ("../../../../include/reporteador.inc.php");

//Obtener el iIdDiario
$sql ="SELECT iIdDiario FROM bitacoradeactividades  
		WHERE sContrato='".$_REQUEST['sContrato']."' AND sIdTipoMovimiento<>'A'
		AND sNumeroOrden='".$_REQUEST['sNumeroOrden']."' 
		AND dIdFecha='".$_REQUEST['dIdFecha']."' " ;
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
	$iIdDiario = $row[0];
}
//Obtener la fecha Mayor y la Menor
$sql = "SELECT MIN(sHoraInicio),MAX(sHoraFinal) from jornadasdiarias where sTipo<>'Tiempo Inactivo' and sContrato='".$_REQUEST['sContrato']."' and sNumeroOrden='".$_REQUEST['sNumeroOrden']."' and dIdFecha='".$_REQUEST['dIdFecha']."' AND sIdTurno='".$_REQUEST['sIdTurno']."' group by sContrato";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
 echo $iIdDiario  . " - " . $row[0]. " - ". $row[1];	
}

$sql =" select SUM(dCantidad) from bitacoradepersonal where sContrato='".$_REQUEST['sContrato']."' and dIdFecha='".$_REQUEST['dIdFecha']."' AND iIdDiario='$iIdDiario';";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
	$dPersonalTotal = $row[0];
}
echo "<br> Personal Total: $dPersonalTotal";

//recalcular los tiempos muertos de toda la orden
######################Actualizar los tiempos muertos
//incluir funciones de obtencion de jornadas diarias
require ("../jornadas/functions.php");
$iJornadas = Jornadas();
$JornadasxDia = JornadasDia($_SESSION['dIdFecha'],$iJornadas);
$DIVIDIRHORA = explode(".",$JornadasxDia);
$hora = $DIVIDIRHORA[0];
$minuto = ($DIVIDIRHORA[1]*60)/100;

if($hora < 10) $hora = "0$hora";
if($minuto < 10)$minuto = "0$minuto";
$JoradaDiariaFormat = $hora.":".$minuto;

  	$sql = "SELECT SUM(dFrente) FROM jornadasdiarias where sContrato='".$_REQUEST['sContrato']."' and sNumeroOrden='".$_REQUEST['sNumeroOrden']."' AND dIdFecha='".$_REQUEST['dIdFecha']."' AND sIdTurno='".$_REQUEST['sIdTurno']."' AND sTipo<>'Tiempo Inactivo'";
	 	$result = mysql_query($sql);
	 	if ($row = mysql_fetch_array($result)){
			$TotalPersonal=$row[0];
		}
		
      if($TotalPersonal> 0){
     
		 		//actualizar  los tiempos muertos de las disponibilidades segun cantidad de personal ingresado
       		$SumadorTiempoMuerto="0";
       		$dFrente=0;
		echo "<br>".  	$sql = "SELECT * FROM jornadasdiarias WHERE sContrato='".$_REQUEST['sContrato']."' and sNumeroOrden='".$_REQUEST['sNumeroOrden']."' AND dIdFecha='".$_REQUEST['dIdFecha']."' AND sIdTurno='".$_REQUEST['sIdTurno']."' AND sTipo<>'Tiempo Inactivo'";
			$result = mysql_query($sql);
			while($row = mysql_fetch_array($result)) {
			 	$tiempoMuertoRowAct = RestarHoras($row['sJornada'],$JoradaDiariaFormat); 
			 	//dividir la hora de los minutos
		 		$DIVIDIRHORA = explode(":",$tiempoMuertoRowAct);
		 		//Total de Minutos Muerto
	      	$MinutosMuertos=($DIVIDIRHORA[0]*60)+$DIVIDIRHORA[1];
	      	//(Total de minutos muertos * cantidad de personal ) / Total de personal
				$TiempoMuerto = ( $row['dFrente'] * ($MinutosMuertos) ) / ($TotalPersonal);
				$SumadorTiempoMuerto += $TiempoMuerto ;
				//convertir los minutos a hora
				$TiempoMuerto = $TiempoMuerto /60;
				//solo dejar dos decimales para calcular bien los minutos
				$TiempoMuerto = round($TiempoMuerto*100)/100;
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
			   			   
			#	$sqlHora ="SELECT ADDTIME('$SumadorTiempoMuerto','$TiempoMuerto') ";
			#	$resultHora = mysql_query($sqlHora);
			#	if($rowHora = mysql_fetch_array($resultHora))
			#		$SumadorTiempoMuerto = $rowHora[0];
			
				$dFrente += $row['dFrente'];
			}
			//Convertir los minutos de tiempos muertos en formato hora
			$minTiemposMuertos =($dFrente*$SumadorTiempoMuerto)/$dPersonalTotal;
			$minTiemposMuertos = $minTiemposMuertos/60;
			
			$DIVIDIRHORA =explode(".",$minTiemposMuertos);
			if(strlen($DIVIDIRHORA[1]) == 1)$DIVIDIRHORA[1]=$DIVIDIRHORA[1]."0";
			$DIVIDIRHORA[1] = (($DIVIDIRHORA[1]*60)/100);
			$DIVIDIRHORA[1] = round($DIVIDIRHORA[1]*1)/1;
			if($DIVIDIRHORA[0] <10)$DIVIDIRHORA[0]="0".$DIVIDIRHORA[0];
			if($DIVIDIRHORA[1]<10)$DIVIDIRHORA[1]="0".$DIVIDIRHORA[1];
			if($DIVIDIRHORA[0] =="")$DIVIDIRHORA[0]="00";
			if($DIVIDIRHORA[1] =="")$DIVIDIRHORA[1]="00";
			$minTiemposMuertos = $DIVIDIRHORA[0] . ":" .$DIVIDIRHORA[1];       
			echo "<br>Horas: $minTiemposMuertos";
			//Formula para calculo de tiempo muerto de la orden
			
		}
echo "<br> Personal = $dFrente ";
echo "<br> Personal Total = $dPersonalTotal ";
echo "<br> Minutos Totales = $minTiemposMuertos ";
//location("index.php");
?>