<?php session_start();session_register('sOperacion','ssTipo');?>
<html>
<head>
<style type='text/css'>@import '../../../estilos/estilo1.css';</style>
<script language="javascript" src="../../../estilos/domtableenhance.js"></script>
<script language="javascript" src="funciones.js"></script>
<?php
	echo $estilo="<LINK REL='stylesheet' TYPE='text/css' HREF='../../../estilos/estilo1.css'>";
?>
	<title>Calagos de Tipo de Embarcación</title>
</head>
<body>
<center>
<table>
	<tr><td><a href="formpaquete.php?operacion=i"  >[Insertar]</a></td></tr>
</table>
<?php
require ("../../../include/mysql.inc.php");
if(isset($_SESSION['ssContrato']))
	$sContrato=$_SESSION['ssContrato'];
/*insertar tipo de embarcacion*/
if(isset($_POST['sNumeroPaquete']) and 
isset($_POST['sIdPernocta']) and 
isset($_POST['sIdPlataforma']) and 
$_SESSION['sOperacion']=="Insertar")
	{
		$consulta="INSERT INTO paquetes_p VALUES ('";
		$consulta.= $sContrato."','";
		$consulta.= $_POST['sNumeroPaquete']."','";
		$consulta.= $_POST['sIdPernocta']."','";
		$consulta.= $_POST['sIdPlataforma']."')";
		mysql_query($consulta,$link);
		if (mysql_error())
			echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";

	}
/*modifica tipo de embarcacion*/
if(isset($_POST['sNumeroPaquete']) and 
isset($_POST['sIdPernocta']) and 
isset($_POST['sIdPlataforma']) and  	
$_SESSION['sOperacion']=="Modificar")
	{
		$CampoClave=$_SESSION['ssNumeroPaquete'];//$_POST['sTipo'];
		$consulta=" UPDATE paquetes_p SET ";
		$consulta.= " sNumeroPaquete='".$_POST['sNumeroPaquete']."', ";
		$consulta.= " sIdPernocta='".$_POST['sIdPernocta']."',";
		$consulta.= " sIdPlataforma='".$_POST['sIdPlataforma']."' ";
		$consulta.= " WHERE sContrato='$sContrato' AND sNumeroPaquete='$CampoClave'";
		mysql_query($consulta,$link);
		if (mysql_error())
		{
			echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		}
		else
		{
			$consulta=" UPDATE paquetesdepersonal SET ";
			$consulta.= " sNumeroPaquete='".$_POST['sNumeroPaquete']."' ";
			$consulta.= " WHERE sNumeroPaquete='".$CampoClave."'";
			mysql_query($consulta,$link);
			if (mysql_error())
			{
				echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
			}	
		}
		$_SESSION['ssNumeroPaquete']="";
	}
/*eliminar embarcacion*/
if(isset($_REQUEST['reqsNumeroPaquete']) and 
isset($_REQUEST['operacion']) and
$_REQUEST['operacion']=="b")
	{
	 	$CampoClave=trim($_REQUEST['reqsNumeroPaquete']);
		$Existe="SELECT sNumeroPaquete FROM paquetesdepersonal WHERE sNumeroPaquete='$CampoClave'";
			if (mysql_error())
				echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		if($row=mysql_fetch_array(mysql_query($Existe,$link)))
		{
			echo "<script language=javaScript>alert(\"Error: No se puede completar la operacion, El registro es Usado\")</script>";
		}
		else	
		{
			$consulta = "DELETE FROM paquetes_p WHERE sNumeroPaquete='$CampoClave' AND sContrato='$sContrato'";
			mysql_query($consulta,$link);
			if (mysql_error())
				echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		}
	}
/*Mostrar registros*/
if(isset($_REQUEST['order']))
	$OrdenarPor=$_REQUEST['order'];
else
	$OrdenarPor="sNumeroPaquete";
   $consulta="SELECT p.sNumeroPaquete,per.sDescripcion as perDes, pla.sDescripcion as plaDes FROM paquetes_p p 
	INNER JOIN pernoctan per ON (p.sIdPernocta=per.sIdPernocta )
	INNER JOIN plataformas pla ON (p.sIdPlataforma=pla.sIdPlataforma) WHERE p.sContrato ='$sContrato' ORDER BY $OrdenarPor";
   
     // $consulta="SELECT sNumeroPaquete,sIdPernocta,sIdPlataforma FROM paquetes_p WHERE  sContrato ='$sContrato' ORDER BY $OrdenarPor";
$result=mysql_query($consulta,$link);
?>
<table class='enhancedtablerowhover'>
<caption>Paquetes de Categoria de Personal</caption>
	<thead>
	<tr>
		<td scope="col" colspan=3></td>
		<th scope="col" ><a href="?order=sNumeroPaquete">Id Paquete</a></th>
		<th scope="col" ><a href="?order=perDes">Pernocta</a></th>
		<th scope="col" ><a href="?order=plaDes">Laboran</a></th>
	</tr>
	</thead>
	<tbody>
<?php
while ($row = mysql_fetch_row($result)) {
	$sNumeroPaquete=str_replace(" ","|",$row[0]);
	echo "<tr>";
	echo "<td class='CrearReporte'>
			<a href=formpaquete.php?reqsNumeroPaquete=$sNumeroPaquete&operacion=add>
				<img src='../../../imagenes/anexar.ico' width=14>
			</a>
		  </td>";
	echo "<td class='CrearReporte'>
			<a href=formpaquete.php?reqsNumeroPaquete=$sNumeroPaquete&operacion=m>
				<img src='../../../imagenes/editar.png'>
			</a>
		  </td>";
	echo "<td class='CrearReporte' onclick=\"confirmaEliminarPaquete('$row[0]');\">
	      <a href='#?$sNumeroPaquete'>
				<img src='../../../imagenes/eliminar.png'>
				</a>
			  </td>
			  ";
		  //?columna=$row[0]&operacion=q 
	for ($i = 0; $i < mysql_num_fields($result); $i++){
		echo "<td>".$row[$i]."</td>";
	}
	echo "</tr>";
}
echo "</tbody>";
$Servidor=$ipTmp;
$_SESSION['sOperacion']="";
?>
</table>
</center>
</body>
</html>