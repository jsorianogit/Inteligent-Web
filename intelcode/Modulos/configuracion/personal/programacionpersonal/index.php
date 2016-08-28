<?php session_start();session_register('sOperacion','ssIdEmbarcacion'); ?>
<html>
<head>
<style type='text/css'>@import '../../../estilos/estilo1.css';</style>
<script language="javascript" src="../../../estilos/domtableenhance.js"></script>
<script language="javascript" src="funciones.js"></script>
<script language="javascript" >
function Solicitar(){
	var w = window.open("PropuestaMensual.php","PropuestaMensual","width=600,height=400,menubar=no,toolbar=no,resizable=yes,statusbar=no,Toolbar=no,Titlebar=no,top=300,left=500",true)
}
</script>
<title>Catalagos Embarcación</title>
</head>
<body>
<center>
<table>
	<tr><td><a href="form.php?operacion=i"  >[Insertar]</a></td></tr>
</table>
<input type="button" Value="Propuesta Mensual" onclick="Solicitar();" ><br>
<?php
require ("../../../include/mysql.inc.php");
/*numero de Contrato*/
if (isset($_SESSION['ssContrato']))
  $sContrato=$_SESSION['ssContrato'];//"418235943";
//$sContrato="418234964";
/*insertar tipo de embarcacion*/
if(
isset( $_POST['dIdFecha'] ) and
isset( $_POST['dCantidad'] ) and
$_SESSION['sOperacion']=="Insertar")
	{
		$consulta="INSERT INTO personalprogramado VALUES ('";
		$consulta.= $sContrato."','";
		$consulta.= $_POST['dIdFecha']."','";
		$consulta.= $_POST['dCantidad']."')";
		mysql_query($consulta,$link);
		if (mysql_error())
			echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";

	}
/*modifica tipo de embarcacion*/
if(
isset( $_POST['dIdFecha'] ) and
isset( $_POST['dCantidad'] ) and
	$_SESSION['sOperacion']=="Modificar")
	{
		$consulta=" UPDATE personalprogramado SET ";
		$consulta.= " dIdFecha='".$_POST['dIdFecha']."', ";
		$consulta.= " dCantidad='".$_POST['dCantidad']."'";
		$consulta.= " WHERE sContrato='$sContrato' and dIdFecha='".$_SESSION['dIdFecha']."'";
		mysql_query($consulta,$link);
		if (mysql_error())
			echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		$_SESSION['ssIdEmbarcacion']="";
	}
/*eliminar embarcacion*/
if(isset($_REQUEST['reqdIdFecha']) and 
isset($_REQUEST['operacion']) and
$_REQUEST['operacion']=="b")
	{
	    $CampoClave=$_REQUEST['reqdIdFecha'];
		$consulta = "DELETE FROM personalprogramado WHERE sContrato='$sContrato' AND dIdFecha='".$CampoClave."'";
		mysql_query($consulta,$link);
		if (mysql_error())
			echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
	}
/*Mostrar registros*/
if(isset($_REQUEST['order']))
	$OrdenarPor=$_REQUEST['order'];
else
	$OrdenarPor="dIdFecha";

$consulta="SELECT COUNT(*) FROM personalprogramado WHERE sContrato='$sContrato' ORDER BY $OrdenarPor";
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
	
if($reg1<=0)$reg1=0;
$consulta="SELECT dIdFecha,dCantidad FROM personalprogramado WHERE sContrato='$sContrato' ORDER BY $OrdenarPor LIMIT $reg1,$tampag";
$result=mysql_query($consulta,$link);
?>

<table class='enhancedtablerowhover'>
<caption><center><font size='1.5'>Programacion de Personal Diario</font></center></caption>
	<thead>
	<tr>
		<td scope="col" colspan=2></td>
		<th scope="col" ><a href="?order=dIdFecha">Fecha</a></th>
		<th scope="col"><a href="?order=dCantidad">Cantida</a></th>
	</tr>
	</thead>
	<tbody>
<?php
while ($row = mysql_fetch_row($result)) {
	$dIdFecha=str_replace(" ","|",$row[0]);
	echo "<tr>";
	echo "<td class='CrearReporte'>
			<a href='form.php?reqFecha=$dIdFecha&operacion=m'>
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