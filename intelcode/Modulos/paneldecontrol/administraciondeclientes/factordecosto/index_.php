<?php session_start();session_register('sOperacion','ssTipo');?>
<html>
<head>
<style type='text/css'>@import '../../../estilos/estilo1.css';</style>
<script language="javascript" src="../../../estilos/domtableenhance.js"></script>
<script language="javascript" src="funciones.js"></script>
<?php
	echo $estilo="<LINK REL='stylesheet' TYPE='text/css' HREF='../../../estilos/estilo1.css'>";
?>
</head>
<body>
<center>
<table>
	<tr><td><a href="form.php?operacion=i"  >[Insertar]</a></td></tr>
</table>
<?php
require ("../../../include/mysql.inc.php");
/*insertar tipo de embarcacion*/
if(isset($_POST['iAnno']) and 
isset($_POST['iMes']) and 
isset($_POST['dFactor']) and 
$_SESSION['sOperacion']=="Insertar")
	{
		$consulta="INSERT INTO factordecosto VALUES ('";
		$consulta.= $sContrato."',";
		$consulta.= $_POST['iAnno'].",";
		$consulta.= $_POST['iMes'].",";
		$consulta.= $_POST['dFactor'].")";
		mysql_query($consulta,$link);
		if (mysql_error())
			echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";

	}
/*modifica tipo de embarcacion*/
if(isset($_POST['iAnno']) and 
isset($_POST['iMes']) and 
isset($_POST['dFactor']) and 
$_SESSION['sOperacion']=="Modificar")
	{
		$iAnno=$_SESSION['siAnno'];
		$iMes=$_SESSION['siMes'];
		$consulta=" UPDATE factordecosto SET ";
		$consulta.= " iMes=".$_POST['iMes'].", ";
		$consulta.= " iAnno=".$_POST['iAnno'].", ";
		$consulta.= " dFactor=".$_POST['dFactor']." ";
		$consulta.= " WHERE sContrato='$sContrato' AND iAnno=$iAnno AND iMes=$iMes";
		mysql_query($consulta,$link);
		if (mysql_error())
		{
			echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		}
	/*	else
		{
			$consulta=" UPDATE convenios SET ";
			$consulta.= " sIdTipoConvenio='".$_POST['sIdTipoConvenio']."' ";
			$consulta.= " WHERE sIdTipoConvenio='$CampoClave'";
			mysql_query($consulta,$link);
			if (mysql_error())
			{
				echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
			}	
		}*/
		$_SESSION['ssIdTurno']="";
	}
/*eliminar embarcacion*/
if(isset($_REQUEST['reqiAnno']) and 
isset($_REQUEST['reqiMes']) and 
isset($_REQUEST['operacion']) and
$_REQUEST['operacion']=="b")
	{
		$iAnno=$_REQUEST['reqiAnno'];
		$iMes=$_REQUEST['reqiMes'];
	/*	$Existe="SELECT sFaseObra FROM estimaciones WHERE sFaseObra like '%$CampoClave%'";
			if (mysql_error())
				echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		if($row=mysql_fetch_array(mysql_query($Existe,$link)))
		{
			echo "<script language=javaScript>alert(\"Error: No se puede completar la operacion, El registro es Usado\")</script>";
		}
		else	
		{*/
			$consulta = "DELETE FROM factordecosto WHERE sContrato='$sContrato' AND iAnno=$iAnno AND iMes=$iMes";
			mysql_query($consulta,$link);
			if (mysql_error())
				echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
	//	}
	}
/*Mostrar registros*/
if(isset($_REQUEST['pag'])){
	$_SESSION['pagActual']=$_REQUEST['pag'];
	$pag=$_REQUEST['pag'];
}
elseif(isset($_SESSION['pagActual']))
	$pag=$_SESSION['pagActual'];
elseif(!isset($pag))
	$pag=1;
if(isset($_REQUEST['order']))
	$OrdenarPor=$_REQUEST['order'];
else
	$OrdenarPor="iAnno";

$consulta="SELECT COUNT(*) FROM factordecosto WHERE sContrato='$sContrato' ORDER BY $OrdenarPor";
$result=mysql_query($consulta,$link);
list($total)=mysql_fetch_row($result);//Total de Registros calculados
if($total<200):
	$tampag=20;
elseif ($total<400):
	$tampag=40;
else:
	$tampag=60;
endif;
$reg1=($pag-1) * $tampag;	//Registro actual
echo paginar($pag, $total, $tampag, "?pag="); 

$consulta="SELECT iAnno,iMes,dFactor FROM factordecosto WHERE sContrato='$sContrato' ORDER BY $OrdenarPor  LIMIT $reg1,$tampag";
$result=mysql_query($consulta,$link);
?>
<table class='enhancedtablerowhover'>
<caption>Factores de Costo</caption>
	<thead>
	<tr>
		<td scope="col" colspan=2></td>
		<th scope="col" ><a href="?order=iAnno">Año</a></th>
		<th scope="col" ><a href="?order=iMes">Mes</a></th>
		<th scope="col" ><a href="?order=dFactor">Factor</a></th>
	</tr>
	</thead>
	<tbody>
<?php
while ($row = mysql_fetch_row($result)) {
	$iAnno=str_replace(" ","|",$row[0]);
	$iMes=str_replace(" ","|",$row[1]);
	echo "<tr>";
	echo "<td class='CrearReporte'>
			<a href=form.php?reqiAnno=$iAnno&reqiMes=$iMes&operacion=m>
				<img src='../../../imagenes/editar.png'>
			</a>
		  </td>";
	echo "<td class='CrearReporte' onclick=\"confirmaEliminar('$row[0]','$row[1]');\">
	      <a href='#?$row[0]'>
				<img src='../../../imagenes/eliminar.png'>
				</a>
			  </td>
			  ";
	for ($i = 0; $i < mysql_num_fields($result); $i++){
		echo "<td>".$row[$i]."</td>";
	}
	echo "</tr>";
}
echo "</tbody></table>";
echo paginar($pag, $total, $tampag, "?pag="); 
$Servidor=$ipTmp;
$_SESSION['sOperacion']="";
?>

</center>
</body>
</html>