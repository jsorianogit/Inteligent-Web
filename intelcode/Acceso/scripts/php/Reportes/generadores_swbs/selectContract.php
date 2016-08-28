<?php
session_register('ssUsuario','ssContrasena','ssContrato','ssNumeroOrden','sDesde','sHasta','sTotal');
require("../../../../../Modulos/include/mysql.inc.php");
//require("Plantilla/Superior.php"); 
?>
<html>
<head>
<title>Generadores</title>
<style type='text/css'>@import '../../../../../Modulos/estilos/estilo1.css';</style>
<script language="javascript" src="../../../../../Modulos/estilos/domtableenhance.js"></script>
</head>
<body class=forma>
<?php 
echo "<center><table border=2 class='enhancedtablerowhover'><td><font size=4>Generadores de Obra</font></td></table><br>";
/*Crear el input select*/
if(isset($_SESSION['ssContrato']) )
{
 	$sqlOrden="SELECT sNumeroOrden,sContrato 
			  FROM ordenesdetrabajo 
			  WHERE sContrato='".$_SESSION['ssContrato']."'
			  ORDER BY sNumeroOrden";
	$resultadoOrden=mysql_query($sqlOrden,$link);
	echo "<center>" ;
	echo "<form action=selectContract.php method=post  name='go'>
			<table  class='enhancedtablerowhover'><tr><th>Seleccionar No. de Orden</th><td>
			<select name='sOrden'  onchange='document.go.submit();'>";
			echo "<option></option>";
	while($rowOrden=mysql_fetch_array($resultadoOrden))
	{	
		if(isset($_POST['sOrden']))  
			$_SESSION['ssNumeroOrden']=$_POST['sOrden'];        
		if(isset($_SESSION['ssNumeroOrden']) and $_SESSION['ssNumeroOrden']==$rowOrden['sNumeroOrden'])   
			$Seleccionar="selected";
		else
			$Seleccionar="";
		echo "<option $Seleccionar>".$rowOrden['sNumeroOrden']."</option>";
	}
	echo "</select></td></tr></table></form>";
}
/*Mostrar registros*/
if(isset($_POST['sOrden']) or isset($_SESSION['ssNumeroOrden']))
{
//	if(!isset($pag))$pag=1;
       if(!isset($_REQUEST['pag']))$pag=1;
        else if (isset($_REQUEST['pag']))$pag=$_REQUEST['pag'];
        else $pag=1;   
	if(isset($_POST['sOrden']))
		$_SESSION['ssNumeroOrden']=$_POST['sOrden'];
   //Obtener Numero de Registros
   $sqlOrden="SELECT count(*) FROM estimaciones WHERE sContrato='".$_SESSION['ssContrato']."' AND sNumeroOrden='".$_SESSION['ssNumeroOrden']."' ORDER BY iConsecutivo DESC";
   $resultado = mysql_query($sqlOrden,$link);
	list($total) = mysql_fetch_row($resultado) ;
		   
	if($total<200):
		$tampag=20;
	elseif ($total<400):
		$tampag=40;
	else:
		$tampag=60;
	endif;
	
	$reg1=($pag-1) * $tampag;	//Registro actual
	echo paginar($pag, $total, $tampag, "?pag=");  
   //Obtener Registros
 
   $sqlOrden="	SELECT iConsecutivo, sNumeroOrden, sNumeroGenerador, lStatus, dMontoMN, dFechaInicio, dFechaFinal, sIdUsuarioAutoriza FROM estimaciones WHERE sContrato='".$_SESSION['ssContrato']."' AND sNumeroOrden='".$_SESSION['ssNumeroOrden']."' ORDER BY iConsecutivo DESC LIMIT $reg1,$tampag";
	$resultadoOrden=mysql_query($sqlOrden,$link);
	
	echo "<table class='enhancedtablerowhover'>
			<thead>
			<tr>
				<th >#</th>
				<th >No. de Orden</th>
				<th >No. de Generador</th>
				<th >Status</th>
				<th >Importe Total</th>
				<th >F. de Inicio</th>
				<th >F. Final</th>
				<th >Autorizado por</th>
				<th class='CrearReporte'>Caratula de Generacion</th>
				<th class='CrearReporte'>Numeros Generadores</th>
				<th class='CrearReporte'>Numeros Generadores CIA</th>
				<th class='CrearReporte'>Semanal Con Importes</th>
				<th class='CrearReporte'>Semanal Sin Importes</th>
			</thead>
			</tr><tbody>";



	while($rowOrden=mysql_fetch_array($resultadoOrden))
	{	
		echo "<tr bgcolor='#FFFFF3'>";
		for($i=0;$i<=7;$i++)
		{

		    If ( $i == 4 )
				echo "<td align='right'>". '$' . number_format($rowOrden[$i],2 , '.', ',') . "</td>";
		    Else
				echo "<td>".$rowOrden[$i]."</td>";
		}

	  	echo "<td class='CrearReporte' ><a href=\"rptCaratulaGenerador.php?sContrato=".$_SESSION['ssContrato']."&sNumeroOrden=".$_SESSION['ssNumeroOrden']."&sNumeroGenerador=" . $rowOrden[2]."\"  target=_blank><img src='../iconos/acroba2t.gif' width='20' height='20' alt='Reporte Diario' border='1'> </a></td>";

	  	echo "<td  class='CrearReporte' ><a href=\"rptNumerosGeneradores.php?sContrato=".$_SESSION['ssContrato']."&sNumeroOrden=".$_SESSION['ssNumeroOrden']."&sNumeroGenerador=" . $rowOrden[2]."\"  target=_blank><img src='../iconos/acroba2t.gif' width='20' height='20' alt='Reporte Diario' border='1'></a></td>";

	  	echo "<td  class='CrearReporte'><a href=\"rptNumerosGeneradoresCIA.php?sContrato=".$_SESSION['ssContrato']."&sNumeroOrden=".$_SESSION['ssNumeroOrden']."&sNumeroGenerador=" . $rowOrden[2]."\"  target=_blank><img src='../iconos/acroba2t.gif' width='20' height='20' alt='Reporte Diario' border='1'></a></td>";

	  	echo "<td class='CrearReporte'  ><a href=\"rptSemanalConImportes.php?sContrato=".$_SESSION['ssContrato']."&sNumeroOrden=".$_SESSION['ssNumeroOrden']."&sNumeroGenerador=" . $rowOrden[2]."\"  target=_blank><img src='../iconos/acroba2t.gif' width='20' height='20' alt='Reporte Diario' border='1'></a></td>";

	  	echo "<td  class='CrearReporte' ><a href=\"rptSemanalSinImportes.php?sContrato=".$_SESSION['ssContrato']."&sNumeroOrden=".$_SESSION['ssNumeroOrden']."&sNumeroGenerador=" . $rowOrden[2]."\"  target=_blank><img src='../iconos/acroba2t.gif' width='20' height='20' alt='Reporte Diario' border='1'></a></td>";

		echo "</tr>";
	}
	echo "</table>";
}
 ?>
</body>
</html>
