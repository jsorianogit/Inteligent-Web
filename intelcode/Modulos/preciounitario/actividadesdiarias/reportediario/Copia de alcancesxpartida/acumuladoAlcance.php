<?php require("alcances.inc.php"); 
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
   
if(isset($_REQUEST['sNumeroOrden']))$sNumeroOrden =$_REQUEST['sNumeroOrden'];
if(isset($_REQUEST['sWbs']))$sWbs =$_REQUEST['sWbs']; 
if(isset($_REQUEST['sNumeroActividad']))$sNumeroActividad =$_REQUEST['sNumeroActividad'];

	$sql="SELECT  b.sNumeroActividad,b.sWbs ,a2.sDescripcion, CONCAT(a2.dAvance,' % ') AS dPonderado, SUM(b.dCantidad) as dCantidad
					FROM bitacoradealcances b
					INNER JOIN alcancesxactividad a2 ON (b.sContrato = a2.sContrato AND b.sNumeroActividad = a2.sNumeroActividad AND b.iFase = a2.iFase)
			 		WHERE b.sContrato = '$sContrato' 
			 				AND b.sNumeroOrden = '$sNumeroOrden' 
			 				AND b.sWbs = '$sWbs' 
			 				AND b.sNumeroActividad = '$sNumeroActividad' 
			 		GROUP BY a2.iFase";   

$titulos = array ("Numero de Actividad","Wbs","Fase","Avance","Cantidad");
$reporte = new reporte();
$reporte->opciones($opciones);
$reporte->ponerconsulta($sql,1,$titulos,"Acumulado de Alcances");
echo "<center>";
$result = mysql_query($sql);
if(mysql_fetch_array($result))
        $reporte->visualizar();
  ?>
<input type="button" value="Cerrar Ventana" onClick=window.close();>
 </center>
