<?php
session_cache_limiter("must-revalidate"); 
session_start();
require ("../../../../include/formulario.inc.php");
?>
<html>
<head>
<style type='text/css'>@import 'menu.css';</style>
<?php
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
	echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
	echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
	echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
</head>
<body>
<center>Cargando Informacion</center>
<?php
if(isset($_REQUEST['dIdFecha']) and $_REQUEST['dIdFecha']!="")
		$fecha = $_REQUEST['dIdFecha'];
if(isset($_REQUEST['iIdDiario']) and $_REQUEST['iIdDiario']!="")
		$iIdDiario = $_REQUEST['iIdDiario'];
if(isset($_REQUEST['turno']) and $_REQUEST['turno']!="")
		$turno = $_REQUEST['turno'];
if(isset($_REQUEST['orden']) and $_REQUEST['orden']!="")
		$orden = $_REQUEST['orden'];		
//extraer la ultima fecha para ese id diario y una fecha anterior  AND iIdDiario=$iIdDiario
$sql = "SELECT MAX(dIdFecha) FROM bitacoradepersonal WHERE sContrato='$sContrato'  AND dIdFecha<'$fecha'  ORDER BY dIdFecha DESC;";                                                                                                                                                                                                                                                                                                                                                                                                                                                                             
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $UltimaFecha = $row[0];	
}

//extraer el personal de esa fecha optenida AND iIdDiario=$iIdDiario 
$band = false;
$sql ="Select bp.* From bitacoradepersonal bp 
INNER JOIN bitacoradeactividades b ON
(bp.sContrato = b.sContrato 
   And bp.dIdFecha = b.dIdFecha 
   And bp.iIdDiario = b.iIdDiario 
   And b.sNumeroOrden = '$orden'   
   And b.sIdTurno = '$turno') 
Where bp.sContrato = '$sContrato'
And bp.dIdFecha = '$UltimaFecha'
Order By bp.sIdPersonal";
//$sql = "SELECT * FROM bitacoradepersonal WHERE sContrato='$sContrato' AND dIdFecha='$UltimaFecha'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $band = true;
}
//extraer el personal de esa fecha optenida AND iIdDiario=$iIdDiario 
if($band){
  // mysql_query("DELETE FROM bitacoradepersonal WHERE sContrato='$sContrato' AND iIdDiario=$iIdDiario AND dIdFecha='$fecha'");
   $sql ="Select bp.* From bitacoradepersonal bp 
   INNER JOIN bitacoradeactividades b ON
   (bp.sContrato = b.sContrato 
      And bp.dIdFecha = b.dIdFecha 
      And bp.iIdDiario = b.iIdDiario 
      And b.sNumeroOrden = '$orden'   
      And b.sIdTurno = '$turno') 
   Where bp.sContrato = '$sContrato'
   And bp.dIdFecha = '$UltimaFecha'
   Order By bp.sIdPersonal";
   //$sql = "SELECT * FROM bitacoradepersonal WHERE sContrato='$sContrato' AND dIdFecha='$UltimaFecha'";
   $result = mysql_query($sql);
   while($row = mysql_fetch_array($result)){
    //$sContrato = $row['sContrato'];
    //$dIdFecha = $row['dIdFecha'];
    //$iIdDiario = $row['iIdDiario'];
    $sIdPersonal = $row['sIdPersonal'];
    $sDescripcion = $row['sDescripcion'];
    $sIdPernocta = $row['sIdPernocta'];
    $sIdPlataforma = $row['sIdPlataforma'];
    $sHoraInicio = $row['sHoraInicio'];
    $sHoraFinal = $row['sHoraFinal'];  
    $dCantidad = $row['dCantidad'];
    $sFactor = $row['sFactor'];
    $dCostoMN = $row['dCostoMN'];
    $dCostoDLL = $row['dCostoDLL'];
    #a veces la descripcion es nula, por eso esta consulta
    if(trim($sDescripcion)==""){
	    $sqlDesPer = "select sDescripcion from personal where sContrato='$sContrato' and sIdPersonal='$sIdPersonal';";
	    $rsDesPer = mysql_query($sqlDesPer);
	    if($rowDesPer = mysql_fetch_array($rsDesPer)){
			$sDescripcion = $rowDesPer['sDescripcion'];
		}
	}
   $sql = "INSERT INTO bitacoradepersonal
	 VALUES('$sContrato','$fecha','$iIdDiario','$sIdPersonal','$sDescripcion','$sIdPernocta','$sIdPlataforma','$sHoraInicio','$sHoraFinal','$dCantidad','$sFactor','$dCostoMN','$dCostoDLL') ON DUPLICATE KEY UPDATE dCantidad=dCantidad+$dCantidad, dCostoMN = dCostoMN+$dCostoMN , dCostoDLL = dCostoDLL +$dCostoMN , sDescripcion='$sDescripcion', sHoraInicio='$sHoraInicio' , sHoraFinal='$sHoraFinal',sFactor='$sFactor'"; 

    mysql_query($sql);
   }
}

if(mysql_error())
   mensaje(mysql_error());
?>
<script language="javascript">
opener.document.location='index.php?iIdDiario=<?php echo $iIdDiario ?>';
window.close();
</script>
</body>
</html>

