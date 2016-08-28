<?php
require ("../../include/formulario.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
	#return the final day of a month   
   
	function ultimodia($anho,$mes){
	   if (( fmod($anho,4)==0 or fmod($anho,400)==0) and fmod($anho,100)!=0 ) {
       	$dias_febrero = 29;
   	} else {
       	$dias_febrero = 28;
   	}
   	switch($mes) {
       	case 1: return 31; break;
       	case 2: return $dias_febrero; break;
       	case 3: return 31; break;
       	case 4: return 30; break;
       	case 5: return 31; break;
       	case 6: return 30; break;
       	case 7: return 31; break;
       	case 8: return 31; break;
       	case 9: return 30; break;
       	case 10: return 31; break;
       	case 11: return 30; break;
       	case 12: return 31; break;
   	}
	}	
	#incremente una fecha en un mes
		function incFechas($fecha){
	  	if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
      		list($ano,$mes,$dia)=split("/", $fecha);
  		if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
      		list($ano,$mes,$dia)=split("-",$fecha);
		      
		$ultimoDia = ultimodia($ano,$mes);
	 	$nueva = mktime(0,0,0,$mes,$ultimoDia+1,$ano);
	 	$Fecha = date("Y-m-d",$nueva);
	  	if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$Fecha))
      		list($ano,$mes,$dia)=split("/", $Fecha);
  		if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$Fecha))
      		list($ano,$mes,$dia)=split("-",$Fecha);

		$ultimoDia = ultimodia($ano,$mes);
	 	$nueva = mktime(0,0,0,$mes,$ultimoDia,$ano);
	 	return date("Y-m-d",$nueva);
	}

	#Optiene el rango de fechas
  	$sql  =" SELECT MIN(dIdFecha) as dIdFechaMin,MAX(dIdFecha)  as dIdFechaMax FROM  ordenes_programamensual WHERE sContrato = '425026901' AND sIdConvenio ='' ";
	$result = mysql_query($sql);
	if($row = mysql_fetch_array($result)){
			echo "<br>".$fechaMinima = $row['dIdFechaMin'];
			echo "<br>".$fechaMaxima = $row['dIdFechaMax'];
	}

	#imprime la cantidad mensual por cada Numero de Orden
	unset($filasOrdenes);
	echo "<br>  ";
	$sqlOrden  =" SELECT DISTINCT(sNumeroOrden) FROM  ordenes_programamensual WHERE sContrato = '425026901' AND sIdConvenio =''  ORDER BY sNumeroOrden";
	$resultOrden = mysql_query($sqlOrden);
	while($rowOrden = mysql_fetch_array($resultOrden)){
	   $NumeroOrden = $rowOrden['sNumeroOrden'];
		$fechaMin =  $fechaMinima; 
		$fechaMax = $fechaMaxima;
		while($fechaMin <= $fechaMax)	{
	  		$sql  =" SELECT sum(DEmn) FROM  ordenes_programamensual WHERE sContrato = '425026901' AND sIdConvenio =''  AND sNumeroOrden = '$NumeroOrden' AND year('$fechaMin')=year(dIdFecha) AND month('$fechaMin')=month(dIdFecha) ";
			$result = mysql_query($sql);
			while($row = mysql_fetch_array($result)){
					$filasOrdenes[$NumeroOrden][$fechaMin]=$row[0];
					#echo "<br>$fechaMin ".$row[0];
			}
			$fechaMin = incFechas($fechaMin);
		}
	}
	#Imprime los valores de el array
	$fechaMin =  $fechaMinima; 
	$fechaMax = $fechaMaxima;
	echo "<table><tr><th>Numero de Orden</th>";
	while($fechaMin <= $fechaMax)	{
				echo "<th>$fechaMin</th>";
			
		$fechaMin = incFechas($fechaMin);
	}
	echo "</tr>";
	echo "</table>";
	$sqlOrden  =" SELECT DISTINCT(sNumeroOrden) FROM  ordenes_programamensual WHERE sContrato = '425026901' AND sIdConvenio =''  ORDER BY sNumeroOrden";
	$resultOrden = mysql_query($sqlOrden);
	while($rowOrden = mysql_fetch_array($resultOrden)){
  		$arrayOrden[] = $rowOrden['sNumeroOrden'];
	}

	$fechaMin =  $fechaMinima; 
	$fechaMax = $fechaMaxima;
	while($fechaMin <= $fechaMax)	{
		echo "<br>";
			for($i=0;$i<count($arrayOrden);$i++){
					echo "<br>$arrayOrden[$i] -- $fechaMin ".$filasOrdenes[$arrayOrden[$i]][$fechaMin];
			}
			$fechaMin = incFechas($fechaMin);
	}
	/*
foreach($filasOrdenes as $Orden => $value){
		echo "<br><br>";
	foreach($value as $fecha => $value2)
		echo "--[ $Orden ][ $fecha ]-> $value2";
}
*/
?>