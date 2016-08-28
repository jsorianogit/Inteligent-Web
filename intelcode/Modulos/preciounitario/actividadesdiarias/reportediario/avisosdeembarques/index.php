<?php
session_cache_limiter("must-revalidate"); 
session_start();
require ("../../../../include/formulario.inc.php");
//recoge la pagina actual para el paginador
if(isset($_REQUEST['pag'])){
	$_SESSION['pagActual']=$_REQUEST['pag'];
	$pag=$_REQUEST['pag'];
}
elseif(isset($_SESSION['pagActual']))
	$pag=$_SESSION['pagActual'];
elseif(!isset($pag))
	$pag=1;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<title> Recepcion de Materiales</title>
<style type='text/css'>@import 'menu.css';</style>
<script type='text/javascript' src='menu.js'></script>
<?php
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
	echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
	echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
	echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";

	if(isset($_REQUEST['cont']) and $_REQUEST['cont']!="")
		$_SESSION['cont'] = $_REQUEST['cont'];
	if(!isset($_SESSION['cont']) or $_SESSION['cont']=="")
	   $_SESSION['cont'] = 1;

if(isset($_REQUEST['fecha']) AND $_REQUEST['fecha']!=""){
	$fecha=$_REQUEST['fecha'];
	$_SESSION['fecha']=$fecha;
	
} 
if(isset($_SESSION['fecha'])){
	$fecha =$_SESSION['fecha'];
}
//obtener numero de orden	
if(isset($_REQUEST['orden']) AND $_REQUEST['orden']!=""){
	$orden=$_REQUEST['orden'];
	$_SESSION['orden']=$orden;
	
}
if(isset($_SESSION['orden'])){
	$orden=$_SESSION['orden'];
}
//obtener numero de turno
	
if(isset($_REQUEST['turno']) AND $_REQUEST['turno']!=""){
	$turno=$_REQUEST['turno'];
	$_SESSION['turno']=$_REQUEST['turno'];
}	
if(isset($_SESSION['turno'])){
	$turno=$_SESSION['turno'];
}
?>

</head>
<body>
<center>
<?php
	if(isset($_REQUEST['iFolioSuministro']))
		$_SESSION['iFolioSuministro']=$_REQUEST['iFolioSuministro'];
	if(isset($_SESSION['iFolioSuministro']))
		$iFolioSuministro=$_SESSION['iFolioSuministro'];
	/*	///////////
	#Paginar los Resultados
	//Contar el total de registros
	if (!isset($_REQUEST['pagina'])){ $pagina = 1; }
	else {$pagina = $_REQUEST['pagina'];}
	
	$result = mysql_query("SELECT COUNT(sContrato) FROM anexo_suministro  WHERE sContrato='$sContrato'"); 
	list($totalpagina) = mysql_fetch_row($result);
	$tampagina = 5;
	$reg1pagina = ($pagina-1) * $tampagina;
	$sql="SELECT * FROM anexo_suministro  WHERE sContrato='$sContrato' LIMIT $reg1pagina, $tampagina";
	$result = mysql_query($sql);
		echo "<br>".paginar($pagina, $totalpagina, $tampagina, "?pagina=")."<br>";
	 	echo "<table border=1 class='enhancedtablerowhover'>";
	 	echo "<tr>";
	 	echo "<th>Folio</th>";
	 	echo "<th>Fecha de Captura</th>";
	 	echo "<th>Fecha de Recepcion</th>";
	 	echo "<th>Numero de Orden</th>";
	 	echo "<th>Referencia</th>";
	 	echo "<th>Descripcion</th>";
	 	echo "<th>Origen</th>";
	 	echo "</tr>";
	while ($row = mysql_fetch_array($result)){

	 	echo "<tr>";
	 	echo "<td>";
	 	echo "<a href='?iFolioSuministro=".$row['iFolio']."' title='De click para Seleccionar el folio e ingresar Partidas Anexos'>";
		echo  ($row['iFolio']=="")?"-":$row['iFolio'];
		echo "</td>";
		echo "<td>";
		echo  ($row['dIdFecha']=="")?"-":$row['dIdFecha'];
		echo "</td>";
		echo "<td>";
		echo  ($row['dIdFechaAviso']=="")?"-":$row['dIdFechaAviso'];
		echo "</td>";
		echo "<td>";
		echo  ($row['sNumeroOrden']=="")?"-":$row['sNumeroOrden'];
		echo "</td>";
		echo "<td>";
		echo  ($row['sReferencia']=="")?"-":$row['sReferencia'];
		echo "</td>";
		echo "<td>";
		echo  ($row['mComentarios']=="")?"-":$row['mComentarios'];
		echo "</td>";
		echo "<td>";
		echo  ($row['sOrigen']=="")?"-":$row['sOrigen'];
		echo "</td>";

		echo "</tr>";

	}
		echo "</table>";
		*/
?>

</center>
<div id="menu">
	<ul>
		<li id="menu1"><a href="?cont=1" onclick="">Folio de Avisos de Embarque</a></li>
		<li id="menu2"><a href="?cont=2" onclick="">Partida por Avisos de Embarque</a></li>
	</ul>
</div>
<?php
if($_SESSION['cont']==1){
   ?>
<div id="contenido1">
	<script>viewSection('1','2');</script>
	<p>
	  <br><center>
		<h3>Folio de Avisos de Embarque</h3>
		<?php
  	      require_once("visualiza_anexo_suministro.php");
			require_once("anexos_suministro.php");
		?>
	</p>
</div>

<?php
}
if($_SESSION['cont']==2){
   ?>
<div id="contenido2">
	<script>viewSection('2','2');</script>
	<p>
	  <br><center>
			<h3>Partida por Avisos de Embarque</h3>
		<?php
			require_once("anexos_psuministro.php");
		?>
	</p>
</div>
<?php
}
?>
<script language='javascript'>
         //		document.location='#?division=1' ;
	        //		viewSection('1','2');
</script> 

</body>
</html>

