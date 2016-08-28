<?php
require("../../include/mysql.inc.php");
//Iniciando Distribucion Mensual
$sql = "select sWbs, sNumeroActividad, year(dIdFecha), month(dIdfecha), sum(dCantidad) as dDT from distribuciondeanexo Where sContrato = '425026901' and sIdConvenio = '$sIdConvenio' group by sWbs, sNumeroActividad, year(dIdFecha), month(dIdfecha)";
//$sql = "select sWbs, sNumeroActividad, year(dIdFecha), month(dIdfecha), sum(dCantidad) as dDT from distribuciondeanexo Where sContrato = '425026901' and sIdConvenio = '$sIdConvenio' group by sWbs, sNumeroActividad, year(dIdFecha), month(dIdfecha)";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
	echo "<br>";
	echo "sWbs $row[0]";
	echo "Numero de Actividad $row[1]";
	echo "Año $row[2]";
	echo "Mes $row[3]";
//	echo "Fecha ".$HastaFecha = $row[2]."-".$row[3]."-".ultimodia($row[2],$row[3]);;
	echo "Cantidad $row[4]";
}


?>