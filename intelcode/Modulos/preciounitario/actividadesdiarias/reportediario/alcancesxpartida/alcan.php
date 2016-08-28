<?php
#Seleccionar el ultimo id diario de bitacoradeactividades 
$sql="SELECT MAX(iIdDiario) FROM bitacoradeactividades WHERE sContrato='$sContrato' and sNumeroOrden='$sNumeroOrden' AND dIdFecha='$fecha' ";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
	$iIdDiarioBA = $row[0];
	$iIdDiarioBA = $iIdDiarioBA + 1;
}
#seleccionar el ultimo id diario de bitacoradalcances
$sql="SELECT MAX(iIdDiario) FROM bitacoradealcances WHERE sContrato='$sContrato' and sNumeroOrden='$sNumeroOrden' AND dIdFecha='$fecha'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
	$iIdDiario = $row[0];
	$iIdDiario = $iIdDiario + 1;
}
#leer el acumulado de la fase seleccionada
$AcumuladoFaseSel = leerAcumuladoFase($iFaseSeleccionada);
$TotalFaseSel  = $AcumuladoFaseSel + $CantInstFaseSel;  
#obtener el calculo de cada fase
for($i=1; $i<=$iFaseSeleccionada; $i++){
	$Complemento = 0;
	$AcumuladoFaseX =leerAcumuladoFase($i);
	if($TotalFaseSel > $AcumuladoFaseX)
		$Complemento = $TotalFaseSel - $AcumuladoFaseX;
	#crear las consultas
   $sql ="INSERT INTO bitacoradealcances (iIdDiario,sContrato,dIdFecha,sIdTurno,sNumeroOrden,sNumeroActividad,sWbs,dCantidad,mDescripcion,dAvance,iFase,sReferencia) 
     				VALUES ('$iIdDiario','$sContrato','$fecha','$sIdTurno','$sNumeroOrden','$sNumeroActividad','$swbs',$Complemento,'$comentarios','$dAvance','$i','$sReferencia')
     				ON DUPLICATE KEY UPDATE dCantidad=dCantidad+ $Complemento, dAvance='$dAvance' ,sReferencia ='$sReferencia' ";
     				
 	$sql ="INSERT INTO bitacoradeactividades (iIdDiario,sContrato,dIdFecha,sIdTurno,sNumeroOrden,sNumeroActividad,sWbs,dCantidad,mDescripcion,dAvance,sIdTipoMovimiento,lAlcance) 
 					VALUES ($iIdDiarioBA,'$sContrato','$fecha','$sIdTurno','$sNumeroOrden','$sNumeroActividad','$swbs',0,'$comentarios','$dAvance','$sTipoAlcance','NO')";	
	$iIdDiarioBA++;
	$iIdDiario++;
	if($i == $UltimaFase){
	 	$sql ="INSERT INTO bitacoradeactividades (iIdDiario,sContrato,dIdFecha,sIdTurno,sNumeroOrden,sNumeroActividad,sWbs,dCantidad,mDescripcion,dAvance,sIdTipoMovimiento,lAlcance) 
 						VALUES ($iIdDiarioBA,'$sContrato','$fecha','$sIdTurno','$sNumeroOrden','$sNumeroActividad','$swbs',0,'$comentarios','$dAvance','$sTipoAlcance','NO')";	
	}
}
?>