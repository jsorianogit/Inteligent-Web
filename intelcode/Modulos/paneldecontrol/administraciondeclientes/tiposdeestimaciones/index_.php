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
if(isset($_POST['sIdTipoEstimacion']) and 
isset($_POST['sDescripcion']) and 
isset($_POST['iGrupo']) and 
isset($_POST['mComentarios']) and 
$_SESSION['sOperacion']=="Insertar")
	{
		$consulta="INSERT INTO tiposdeestimacion VALUES ('";
		$consulta.= $_POST['sIdTipoEstimacion']."','";
		$consulta.= $_POST['sDescripcion']."','";
		$consulta.= $_POST['iGrupo']."','";
		$consulta.= $_POST['mComentarios']."')";
		mysql_query($consulta,$link);
		if (mysql_error())
			echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";

	}
/*modifica tipo de embarcacion*/
if(isset($_POST['sIdTipoEstimacion']) and 
isset($_POST['sDescripcion']) and 
isset($_POST['iGrupo']) and 
isset($_POST['mComentarios']) and  
$_SESSION['sOperacion']=="Modificar")
	{
		$CampoClave=$_SESSION['ssIdTipoEstimacion'];
		$consulta=" UPDATE tiposdeestimacion SET ";
		$consulta.= " sIdTipoEstimacion='".$_POST['sIdTipoEstimacion']."', ";
		$consulta.= " sDescripcion='".$_POST['sDescripcion']."', ";
		$consulta.= " iGrupo='".$_POST['iGrupo']."', ";
		$consulta.= " mComentarios='".$_POST['mComentarios']."' ";
		$consulta.= " WHERE sIdTipoEstimacion='$CampoClave'";
		mysql_query($consulta,$link);
		if (mysql_error())
		{
			echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		}
		else
		{
			$consulta=" UPDATE estimacionperiodo SET ";
			$consulta.= " sIdTipoEstimacion='".$_POST['sIdTipoEstimacion']."' ";
			$consulta.= " WHERE sIdTipoEstimacion='$CampoClave'";
			mysql_query($consulta,$link);
			if (mysql_error())
			{
				echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
			}	
		}
		$_SESSION['ssIdTurno']="";
	}
/*eliminar embarcacion*/
if(isset($_REQUEST['reqsIdTipoEstimacion']) and 
isset($_REQUEST['operacion']) and
$_REQUEST['operacion']=="b")
	{
	 	$CampoClave=trim($_REQUEST['reqsIdTipoEstimacion']);
		$Existe="SELECT sIdTipoEstimacion FROM estimacionperiodo WHERE sIdTipoEstimacion='$CampoClave'";
			if (mysql_error())
				echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		if($row=mysql_fetch_array(mysql_query($Existe,$link)))
		{
			echo "<script language=javaScript>alert(\"Error: No se puede completar la operacion, El registro es Usado\")</script>";
		}
		else	
		{
			$consulta = "DELETE FROM tiposdeestimacion WHERE sIdTipoEstimacion='$CampoClave'";
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
	$OrdenarPor="sIdTipoEstimacion";

$consulta="SELECT COUNT(*) FROM tiposdeestimacion ORDER BY $OrdenarPor";
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

$consulta="SELECT * FROM tiposdeestimacion ORDER BY $OrdenarPor  LIMIT $reg1,$tampag";
$result=mysql_query($consulta,$link);
?>
<table class='enhancedtablerowhover'>
<caption>Tipos de Estimaciones</caption>
	<thead>
	<tr>
		<td scope="col" colspan=2></td>
		<th scope="col" ><a href="?order=sIdTipoEstimacion">Id Estimacion</a></th>
		<th scope="col" ><a href="?order=sDescripcion">Descripcion</a></th>
		<th scope="col" ><a href="?order=iGrupo">Grupo</a></th>
		<th scope="col" ><a href="?order=mComentarios">Comentarios</a></th>
	</tr>
	</thead>
	<tbody>
<?php
while ($row = mysql_fetch_row($result)) {
	$sIdTipoEstimacion=str_replace(" ","|",$row[0]);
	echo "<tr>";
	echo "<td class='CrearReporte'>
			<a href=form.php?reqsIdTipoEstimacion=$sIdTipoEstimacion&operacion=m>
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
echo "</tbody></table>";
echo paginar($pag, $total, $tampag, "?pag="); 
$Servidor=$ipTmp;
$_SESSION['sOperacion']="";
?>

</center>
</body>
</html>