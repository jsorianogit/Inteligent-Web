<?php
session_cache_limiter("must-revalidate"); 
session_start();
require ("../../../include/reporteador.inc.php");
?>
<html>
<style>
body {
	font: 10% Verdana, Arial, Sans-Serif;
}
</style>
<body bgcolor="#AA7FFF">
<center>
<?php
  echo "\n<style type='text/css'>@import 'estilos/estilo1.css';</style>";
  #Cachar los valores url
  if(isset($_REQUEST['sActividad'])) $sActividad = $_REQUEST['sActividad'] ;
  if(isset($_REQUEST['Wbs'])) $Wbs = $_REQUEST['Wbs'] ;
  if(isset($_REQUEST['NumeroOrden'])) $Orden = $_REQUEST['NumeroOrden'] ;
  if(isset($_REQUEST['mDescripcion'])) $mDescripcion= $_REQUEST['mDescripcion'] ;
  if($mDescripcion == ""){
	  $sql = "SELECT substr(mDescripcion,1,20) as mDescripcion
			FROM actividadesxorden 
			WHERE 
				sContrato='$sContrato' AND 
				sNumeroActividad='$sActividad' AND 
				sNumeroOrden='$Orden' AND 
				sTipoActividad='Actividad' AND 
				sIdConvenio='$sIdConvenioAct'
			ORDER BY sWbs,sNumeroActividad;";
		$result = mysql_query($sql);
		if($row = mysql_fetch_array($result)){
			$mDescripcion = ucwords(strtolower(trim($row[0])));
		}
	}
  $sql = "SELECT sWbs,dCantidad,sMedida,dInstalado,dExcedente
		FROM actividadesxorden 
		WHERE 
			sContrato='$sContrato' AND 
			sNumeroActividad='$sActividad' AND 
			sNumeroOrden='$Orden' AND 
			sTipoActividad='Actividad' AND 
			sIdConvenio='$sIdConvenioAct'
		ORDER BY sWbs,sNumeroActividad;";
$result = mysql_query($sql) ;
echo "<table class='enhancedtablerowhover'>";
echo "<tr><td colspan=5><center>$mDescripcion<center></td></tr>";
echo "<tr>";
echo "<th>Wbs</th>";
echo "<th>Cant.</th>";
echo "<th>Med.</th>";
echo "<th>Inst.</th>";
echo "<th>Exc.</th>";
echo "</tr>";
while ($row = mysql_fetch_array($result)){
	echo "<tr>";
	for($i = 0;$i<mysql_num_fields($result);$i++){
	//	if($i == 3 or $i == 4 )
		//	$row[$i] = number_format($row[$i],4,',','.');
		echo "<td>$row[$i]</td>";
	}
	echo "</tr>";
}
echo "</table>";
?>
</center>
</body>
</html>