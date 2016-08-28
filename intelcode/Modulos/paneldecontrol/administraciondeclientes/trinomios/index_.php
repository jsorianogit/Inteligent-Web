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
if(isset($_POST['sInstalacion']) and 
isset($_POST['sFondo']) and 
isset($_POST['sPosicionFinanciera']) and 
isset($_POST['sCentroGestorEjecutor']) and 
isset($_POST['sCuentaMayor']) and 
isset($_POST['sElementoPep']) and 
isset($_POST['lVigente']) and 
$_SESSION['sOperacion']=="Insertar")
	{
		$consulta="INSERT INTO contrato_trinomio VALUES ('";
		$consulta.= $sContrato."','";
		$consulta.= $_POST['sInstalacion']."','";
		$consulta.= $_POST['sFondo']."','";
		$consulta.= $_POST['sPosicionFinanciera']."','";
		$consulta.= $_POST['sCentroGestorEjecutor']."','";
		$consulta.= $_POST['sCuentaMayor']."','";
		$consulta.= $_POST['sElementoPep']."','";
		$consulta.= $_POST['lVigente']."')";
		mysql_query($consulta,$link);
		if (mysql_error())
			echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";

	}
/*modifica tipo de embarcacion*/
if(isset($_POST['sInstalacion']) and 
isset($_POST['sFondo']) and 
isset($_POST['sPosicionFinanciera']) and 
isset($_POST['sCentroGestorEjecutor']) and 
isset($_POST['sCuentaMayor']) and 
isset($_POST['sElementoPep']) and 
isset($_POST['lVigente']) and 
$_SESSION['sOperacion']=="Modificar")
	{
		$sInstalacion=$_SESSION['ssInstalacion'];
		$consulta=" UPDATE contrato_trinomio SET ";
		$consulta.= " sInstalacion='".$_POST['sInstalacion']."', ";
		$consulta.= " sFondo='".$_POST['sFondo']."', ";
		$consulta.= " sPosicionFinanciera='".$_POST['sPosicionFinanciera']."', ";
		$consulta.= " sCentroGestorEjecutor='".$_POST['sCentroGestorEjecutor']."', ";
		$consulta.= " sCuentaMayor='".$_POST['sCuentaMayor']."', ";
		$consulta.= " sElementoPep='".$_POST['sElementoPep']."', ";
		$consulta.= " lVigente='".$_POST['lVigente']."' ";
		$consulta.= " WHERE sContrato='$sContrato' AND sInstalacion='$sInstalacion'";
		mysql_query($consulta,$link);
		if (mysql_error())
		{
			echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		}
		else
		{
			$consulta=" UPDATE estimacionxpartida SET ";
			$consulta.= " sInstalacion='".$_POST['sInstalacion']."' ";
			$consulta.= " WHERE sInstalacion='$sInstalacion'";
			mysql_query($consulta,$link);
			if (mysql_error())
			{
				echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
			}	
		}
		$_SESSION['ssInstalacion']="";
	}
/*eliminar embarcacion*/
if(isset($_REQUEST['reqsInstalacion']) and 
isset($_REQUEST['operacion']) and
$_REQUEST['operacion']=="b")
	{
		$sInstalacion=$_REQUEST['reqsInstalacion'];
		$Existe="SELECT sInstalacion FROM estimacionxpartida WHERE sInstalacion='$sInstalacion'";
			if (mysql_error())
				echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		if($row=mysql_fetch_array(mysql_query($Existe,$link)))
		{
			echo "<script language=javaScript>alert(\"Error: No se puede completar la operacion, El registro es Usado\")</script>";
		}
		else	
		{
		    $consulta = "DELETE FROM contrato_trinomio WHERE sContrato='$sContrato' AND sInstalacion='$sInstalacion'";
			mysql_query($consulta,$link);
			if (mysql_error())
				echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		}
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
	$OrdenarPor="sInstalacion";

$consulta="SELECT COUNT(*) FROM contrato_trinomio WHERE sContrato='$sContrato' ORDER BY $OrdenarPor";
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

$consulta="SELECT sInstalacion,sFondo,sPosicionFinanciera,sCentroGestorEjecutor,sCuentaMayor,sElementoPep,lVigente FROM contrato_trinomio WHERE sContrato='$sContrato' ORDER BY $OrdenarPor  LIMIT $reg1,$tampag";
$result=mysql_query($consulta,$link);
?>
<table class='enhancedtablerowhover'>
<caption>Trinomios del Contrato</caption>
	<thead>
	<tr>
		<td scope="col" colspan=2></td>
		<th scope="col" ><a href="?order=sInstalacion">Instalacion</a></th>
		<th scope="col" ><a href="?order=sFondo">Fondo</a></th>
		<th scope="col" ><a href="?order=sPosicionFinanciera">Posicion Financiera</a></th>
		<th scope="col" ><a href="?order=sCentroGestorEjecutor">Cento Gestor Ejecutor</a></th>
		<th scope="col" ><a href="?order=sCuentaMayor">Cuenta Mayor</a></th>
		<th scope="col" ><a href="?order=sElementoPep">Elemento Pep</a></th>
		<th scope="col" ><a href="?order=lVigente">Vigente</a></th>
	</tr>
	</thead>
	<tbody>
<?php
while ($row = mysql_fetch_row($result)) {
	$sInstalacion=str_replace(" ","|",$row[0]);
	echo "<tr>";
	echo "<td class='CrearReporte'>
			<a href=form.php?reqsInstalacion=$sInstalacion&operacion=m>
				<img src='../../../imagenes/editar.png'>
			</a>
		  </td>";
	echo "<td class='CrearReporte' onclick=\"confirmaEliminar('$row[0]');\">
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