<?php session_start();session_register('sOperacion','ssTipo');?>
<html>
<head>
<style type='text/css'>@import '../../estilos/estilo1.css';</style>
<script language="javascript" src="../../estilos/domtableenhance.js"></script>
<script language="javascript" src="funciones.js"></script>
<?php
	echo $estilo="<LINK REL='stylesheet' TYPE='text/css' HREF='../../estilos/estilo1.css'>";
?>
</head>
<body>
<center>
<table>
	<tr><td><a href="form.php?operacion=i"  >[Insertar]</a></td></tr>
</table>
<?php
require ("../../include/mysql.inc.php");
/*insertar tipo de embarcacion*/
if(isset($_POST['dIdFecha']) and 
isset($_POST['iJornada']) and 
isset($_POST['sDescripcion']) and 
$_SESSION['sOperacion']=="Insertar")
	{
		$consulta="INSERT INTO diasespeciales VALUES ('";
		$consulta.= $sContrato."','";
		$consulta.= $_POST['dIdFecha']."','";
		$consulta.= $_POST['iJornada']."','";
		$consulta.= $_POST['sDescripcion']."')";
		mysql_query($consulta,$link);
		if (mysql_error())
			echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";

	}
/*modifica tipo de embarcacion*/
if(isset($_POST['dIdFecha']) and 
isset($_POST['iJornada']) and 
isset($_POST['sDescripcion']) and 
$_SESSION['sOperacion']=="Modificar")
	{
		$CampoClave=$_SESSION['sdIdFecha'];//$_POST['sTipo'];
		$consulta=" UPDATE diasespeciales SET ";
		$consulta.= " dIdFecha='".$_POST['dIdFecha']."', ";
		$consulta.= " iJornada='".$_POST['iJornada']."', ";
		$consulta.= " sDescripcion='".$_POST['sDescripcion']."' ";
		$consulta.= " WHERE dIdFecha='".$CampoClave."' AND sContrato='$sContrato'";
		mysql_query($consulta,$link);
		if (mysql_error())
		{
			echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		}
		/*else
		{
			$consulta=" UPDATE equipos SET ";
			$consulta.= " sIdTipoEquipo='".$_POST['sTipoEquipo']."' ";
			$consulta.= " WHERE sIdTipoEquipo='".$CampoClave."'";
			mysql_query($consulta,$link);
			if (mysql_error())
			{
				echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
			}	
		}*/
		$_SESSION['ssIdTurno']="";
	}
/*eliminar embarcacion*/
if(isset($_REQUEST['reqdIdFecha']) and 
isset($_REQUEST['operacion']) and
$_REQUEST['operacion']=="b")
	{
	 	$CampoClave=trim($_REQUEST['reqdIdFecha']);
		/*$Existe="SELECT sIdTipoEquipo FROM equipos WHERE sIdTipoEquipo='$CampoClave'";
			if (mysql_error())
				echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		if($row=mysql_fetch_array(mysql_query($Existe,$link)))
		{
			echo "<script language=javaScript>alert(\"Error: No se puede completar la operacion, El registro es Usado\")</script>";
		}
		else	
		{*/
			$consulta = "DELETE FROM diasespeciales WHERE dIdFecha='".$CampoClave."' AND sContrato='$sContrato'";
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
	$OrdenarPor="dIdFecha";

$consulta="SELECT COUNT(*) FROM diasespeciales WHERE sContrato='$sContrato' ORDER BY $OrdenarPor";
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

$consulta="SELECT dIdFecha,iJornada,sDescripcion FROM diasespeciales WHERE sContrato='$sContrato' ORDER BY $OrdenarPor  LIMIT $reg1,$tampag";
$result=mysql_query($consulta,$link);
?>
<table class='enhancedtablerowhover'>
<caption>Dias Fesrtivos</caption>
	<thead>
	<tr>
		<td scope="col" colspan=2></td>
		<th scope="col" ><a href="?order=dIdFecha">Fecha</a></th>
		<th scope="col" ><a href="?order=iJornada">Jornada</a></th>
		<th scope="col" ><a href="?order=sDescripcion">Descripcion</a></th>
	</tr>
	</thead>
	<tbody>
<?php
while ($row = mysql_fetch_row($result)) {
	$dIdFecha=str_replace(" ","|",$row[0]);
	echo "<tr>";
	echo "<td class='CrearReporte'>
			<a href=form.php?reqdIdFecha=$dIdFecha&operacion=m>
				<img src='../../imagenes/editar.png'>
			</a>
		  </td>";
	echo "<td class='CrearReporte' onclick=\"confirmaEliminar('$row[0]');\">
	      <a href='#?$row[0]'>
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