<?php session_start();session_register('sOperacion','ssTipo');?>
<html>
<head>
<style type='text/css'>@import '../../estilos/estilo1.css';</style>
<script language="javascript" src="../../estilos/domtableenhance.js"></script>
<script language="javascript" src="funciones.js"></script>
</head>
<body>
<center>
<table>
	<tr><td><a href="form.php?operacion=i"  >[Insertar]</a></td></tr>
</table>
<?php
require ("../../include/mysql.inc.php");
	/*insertar tipo de embarcacion*/
echo $_POST['sNumeroOrden'];
echo $_POST['dIdFecha'];
echo $_POST['sTema'];
if(isset($_POST['sNumeroOrden']) and 
isset($_POST['dIdFecha']) and 
isset($_POST['sTema']) )
{
 if($_SESSION['sOperacion']=="Insertar")
	{
		$consulta="INSERT INTO platicasdeseguridad VALUES ('";
		$consulta.= $sContrato."','";
		$consulta.= $_POST['sNumeroOrden']."','";
		$consulta.= $_POST['dIdFecha']."','";
		$consulta.= $_POST['sTema']."')";
		mysql_query($consulta,$link);
		if (mysql_error())
			echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
	}
 else if($_SESSION['sOperacion']=="Modificar")
	{
		$sNumeroOrden=$_SESSION['ssNumeroOrden'];
		$dIdFecha=$_SESSION['sdIdFecha'];
		$consulta=" UPDATE platicasdeseguridad SET ";
		$consulta.= " sNumeroOrden='".$_POST['sNumeroOrden']."', ";
		$consulta.= " dIdFecha='".$_POST['dIdFecha']."', ";
		$consulta.= " sTema='".$_POST['sTema']."' ";
		$consulta.= " WHERE sNumeroOrden='$sNumerOrden' AND dIdFecha='$dIdFecha' AND sContrato='$sContrato'";
		mysql_query($consulta,$link);
		if (mysql_error())
			echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		
	}
}
/*eliminar embarcacion*/
if(isset($_REQUEST['reqsNumeroOrden']) and 
isset($_REQUEST['reqdIdFecha']) and 
isset($_REQUEST['operacion']) and
$_REQUEST['operacion']=="b")
	{
	 	$sNumeroOrden=trim($_REQUEST['reqsNumeroOrden']);
	 	$dIdFecha=trim($_REQUEST['reqdIdFecha']);
		/*$Existe="SELECT sIdTipoEquipo FROM equipos WHERE sIdTipoEquipo='$CampoClave'";
			if (mysql_error())
				echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		if($row=mysql_fetch_array(mysql_query($Existe,$link)))
		{
			echo "<script language=javaScript>alert(\"Error: No se puede completar la operacion, El registro es Usado\")</script>";
		}
		else	
		{*/
			$consulta = "DELETE FROM platicasdeseguridad WHERE sNumeroOrden='$sNumeroOrden' AND dIdFecha='$dIdFecha' AND sContrato='$sContrato'";
			mysql_query($consulta,$link);
			if (mysql_error())
				echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		//}
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
	$OrdenarPor="sNumeroOrden";

$consulta="SELECT COUNT(*) FROM platicasdeseguridad WHERE sContrato='$sContrato'";
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

$consulta="SELECT sNumeroOrden,dIdFecha,sTema FROM platicasdeseguridad WHERE sContrato='$sContrato' ORDER BY $OrdenarPor  LIMIT $reg1,$tampag";
$result=mysql_query($consulta,$link);
?>
<table class='enhancedtablerowhover'>
<caption>Tipos de Equipos</caption>
	<thead>
	<tr>
		<td scope="col" colspan=2></td>
		<th scope="col" ><a href="?order=sNumeroOrden">Numero de Orden</a></th>
		<th scope="col" ><a href="?order=dIdFecha">Fecha</a></th>
		<th scope="col" ><a href="?order=sTema">Tema</a></th>
	</tr>
	</thead>
	<tbody>
<?php
while ($row = mysql_fetch_row($result)) {
	$sNumeroOrden=str_replace(" ","|",$row[0]);
	$dIdFecha=str_replace(" ","|",$row[1]);
	echo "<tr>";
	echo "<td class='CrearReporte'>
			<a href=form.php?reqsNumeroOrden=$sIdTipoMovimiento&reqdIdFecha=$dIdFecha&operacion=m>
				<img src='../../imagenes/editar.png'>
			</a>
		  </td>";
	echo "<td class='CrearReporte' onclick=\"confirmaEliminar('$row[0]','$row[1]');\">
	      <a href='?reqsIdTipoMovimiento=$sIdTipoMovimiento'>
				<img src='../../imagenes/eliminar.png'>
				</a>
			  </td>
			  ";
		  //?columna=$row[0]&operacion=q 
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