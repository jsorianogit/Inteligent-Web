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
$sql = "SELECT MAX(dIdFecha) FROM bitacoradeequipos WHERE sContrato='$sContrato'  AND dIdFecha<'$fecha' ORDER BY dIdFecha DESC;";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $UltimaFecha = $row[0];	
}

//extraer el personal de esa fecha optenida AND iIdDiario=$iIdDiario 
$band = false;
$sql ="select 
   bp.sIdPernocta, 
   bp.sDescripcion,
   bp.sIdEquipo, 
   bp.sHoraInicio,
   bp.sHoraFinal,
   bp.sFactor,
   bp.dCostoMN,
   bp.dCostoDLL,
   Sum(bp.dCantidad) as dCantidad
From bitacoradeequipos bp 
INNER JOIN bitacoradeactividades b 
ON (
   bp.sContrato = b.sContrato 
   And bp.dIdFecha = b.dIdFecha 
   And bp.iIdDiario = b.iIdDiario 
   And b.sNumeroOrden = '$orden'
   And b.sIdTurno = '$turno') 
Where bp.sContrato = '$sContrato'
And bp.dIdFecha = '$UltimaFecha'
Group By  bp.sIdPernocta, bp.sIdEquipo 
Order By bp.sIdEquipo";
//$sql = "SELECT * FROM bitacoradeequipos WHERE sContrato='$sContrato' AND dIdFecha='$UltimaFecha'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $band = true;
}
//extraer el personal de esa fecha optenida AND iIdDiario=$iIdDiario 
if($band){
  // mysql_query("DELETE FROM bitacoradeequipos WHERE sContrato='$sContrato' AND iIdDiario=$iIdDiario AND dIdFecha='$fecha'");
   //$sql = "SELECT * FROM bitacoradeequipos WHERE sContrato='$sContrato' AND dIdFecha='$UltimaFecha'";
   $result = mysql_query($sql);
   while($row = mysql_fetch_array($result)){
    //$sContrato = $row['sContrato'];
    //$dIdFecha = $row['dIdFecha'];
    //$iIdDiario = $row['iIdDiario'];
    $sIdEquipo = $row['sIdEquipo'];
    $sDescripcion = $row['sDescripcion'];
    $sIdPernocta = $row['sIdPernocta'];
    $sHoraInicio = $row['sHoraInicio'];
    $sHoraFinal = $row['sHoraFinal'];  
    $dCantidad = $row['dCantidad'];
    $sFactor = $row['sFactor'];
    $dCostoMN = $row['dCostoMN'];
    $dCostoDLL = $row['dCostoDLL'];
    #a veces la descripcion es nula, por eso esta consulta
    if(trim($sDescripcion)==""){
		 $sqlDesEq = "select sDescripcion from equipos where sContrato='$sContrato' and sIdEquipo='$sIdEquipo';";
	    $rsDesEq = mysql_query($sqlDesEq);
	    if($rowDesEq = mysql_fetch_array($rsDesEq)){
			$sDescripcion = $rowDesEq['sDescripcion'];
		}    
	 }
	 $sql = "INSERT INTO bitacoradeequipos VALUES('$sContrato','$fecha','$iIdDiario','$sIdEquipo','$sDescripcion','$sIdPernocta','$sHoraInicio','$sHoraFinal','$dCantidad','$sFactor','$dCostoMN','$dCostoDLL') ON DUPLICATE KEY UPDATE dCantidad=dCantidad+$dCantidad, dCostoMN = dCostoMN+$dCostoMN , dCostoDLL = dCostoDLL +$dCostoMN , sDescripcion='$sDescripcion', sHoraInicio='$sHoraInicio' , sHoraFinal='$sHoraFinal',sFactor='$sFactor'"; 

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

