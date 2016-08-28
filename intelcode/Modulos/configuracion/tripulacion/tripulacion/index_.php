<?php session_start();session_register('sOperacion','ssIdEmbarcacion'); ?>
<html>
<head>
<style type='text/css'>@import '../../../estilos/estilo1.css';</style>
<script language="javascript" src="../../../estilos/domtableenhance.js"></script>
<script language="javascript" src="funciones.js"></script>
<title>Catalagos Embarcación</title>
</head>
<body>
<center>
<table>
	<tr><td><a href="form.php?operacion=i"  >[Insertar]</a></td></tr>
</table>
<?php
require ("../../../include/mysql.inc.php");
/*numero de Contrato*/
if (isset($_SESSION['ssContrato']))
  $sContrato=$_SESSION['ssContrato'];
  
/*insertar */
if(
isset( $_POST['sIdTripulacion'] ) and
isset( $_POST['sIdCategoria'] ) and
isset( $_POST['sDescripcion'] ) and
isset( $_POST['iNacionales'] ) and
isset( $_POST['iExtranjeros'] ) and 
$_SESSION['sOperacion']=="Insertar")
	{
		$consulta="INSERT INTO tripulacion VALUES ('";
		$consulta.= $sContrato."','";
		$consulta.= $_POST['sIdCategoria']."','";
		$consulta.= $_POST['sIdTripulacion']."','";
		$consulta.= $_POST['sDescripcion']."',";
		$consulta.= $_POST['iNacionales'].",";
		$consulta.= $_POST['iExtranjeros'].")";
		mysql_query($consulta,$link);
		if (mysql_error())
			echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";

	}
/*modifica*/
if(
isset( $_POST['sIdTripulacion'] ) and
isset( $_POST['sIdCategoria'] ) and
isset( $_POST['sDescripcion'] ) and
isset( $_POST['iNacionales'] ) and
isset( $_POST['iExtranjeros'] ) and 
	$_SESSION['sOperacion']=="Modificar")
	{
		$CampoClave=$_SESSION['ssIdTripulacion'];
		$consulta=" UPDATE tripulacion SET ";
		$consulta.= " sIdTripulacion='".$_POST['sIdTripulacion']."', ";
		$consulta.= " sIdCategoria=".$_POST['sIdCategoria'].", ";
		$consulta.= " sDescripcion='".$_POST['sDescripcion']."', ";
		$consulta.= " iNacionales=".$_POST['iNacionales'].", ";
		$consulta.= " iExtranjeros='".$_POST['iExtranjeros']."' ";
		$consulta.= " WHERE sContrato='$sContrato' AND sIdTripulacion='".$CampoClave."' ";
		mysql_query($consulta,$link);
		if (mysql_error())
			echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		$_SESSION['ssIdEmbarcacion']="";
	}
/*eliminar*/
if(isset($_REQUEST['reqIdTripulacion']) and 
isset($_REQUEST['operacion']) and
$_REQUEST['operacion']=="b")
	{
	    $CampoClave=$_REQUEST['reqIdTripulacion'];
		$Existe="SELECT sIdTripulacion FROM  tripulaciondiaria WHERE sIdTripulacion='$CampoClave' AND sContrato='$sContrato'";
		if($row=mysql_fetch_array(mysql_query($Existe,$link)))
		{			
				echo "<script language=javaScript>alert(\"Error: No se puede completar la operacion,el registro es Usada\")</script>";
		}
		else	
		{
			$consulta = "DELETE FROM tripulacion WHERE sContrato='$sContrato' AND sIdTripulacion='".$CampoClave."'";
			mysql_query($consulta,$link);
			if (mysql_error())
				echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		}
		if (mysql_error())
		echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		
	}
/*Mostrar registros*/
if(isset($_REQUEST['order']))
	$OrdenarPor=$_REQUEST['order'];
else
	$OrdenarPor="sIdTripulacion";
	
$consulta="SELECT COUNT(*) FROM tripulacion WHERE sContrato='$sContrato'";
$result=mysql_query($consulta,$link);

if(isset($_REQUEST['pag'])){
	$_SESSION['pagActual']=$_REQUEST['pag'];
	$pag=$_REQUEST['pag'];
}
elseif(isset($_SESSION['pagActual']))
	$pag=$_SESSION['pagActual'];
elseif(!isset($pag))
	$pag=1;

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

$consulta="SELECT sIdTripulacion,sIdCategoria,sDescripcion,iNacionales,iExtranjeros FROM tripulacion WHERE sContrato='$sContrato' ORDER BY $OrdenarPor LIMIT $reg1,$tampag";
$result=mysql_query($consulta,$link);
?>
<table class='enhancedtablerowhover'>
<caption>Catalago de Tripulacion</caption>
	<thead>
	<tr>
		<td scope="col" colspan=2></td>
		<th scope="col" ><a href="?order=sIdTripulacion">Tripulacion</a></th>
		<th scope="col" ><a href="?order=sIdCategoria">Grupo</a></th>
		<th scope="col"><a href="?order=sDescripcion">Descripcion</a></th>
		<th scope="col"><a href="?order=iNacionales">Nacionales</a></th>
		<th scope="col"><a href="?order=iExtranjeros">Extranjeros</a></th>
	</tr>
	</thead>
	<tbody>
<?php
while ($row = mysql_fetch_row($result)) {
	$columna=$row[0];
	echo "<tr>";
	echo "<td class='CrearReporte'>
			<a href='form.php?reqContrato=$sContrato&reqIdTripulacion=$row[0]&operacion=m'>
				<img src='../../../imagenes/editar.png'>
			</a>
		  </td>";
	echo "<td class='CrearReporte' onclick=\"confirmaEliminar('$row[0]');\">
	      <a href='#?$row[0]'>
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
echo "</tr></tbody></table>";
echo paginar($pag, $total, $tampag, "?pag=");
$Servidor=$ipTmp;
$_SESSION['sOperacion']="";
?>

</center>
</body>
</html>