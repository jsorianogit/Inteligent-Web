<?php session_start();?>
<html>
<head>
<style type='text/css'>@import '../../../estilos/estilo1.css';</style>
<script language="javascript" src="../../../estilos/domtableenhance.js"></script>

<?php
	echo $estilo="<LINK REL='stylesheet' TYPE='text/css' HREF='../../../estilos/estilo1.css'>";
?>
<title>Calagos de Tipo de Embarcación</title>
<script  language="javascript" SRC="../../../include/funcionesGen.js"></script>
<script  language="javascript" SRC="funciones.js"></script>
</head>
<body>
<center>
<?php
require ("../../../include/mysql.inc.php");
/*****************************************************/
/*Insertar / Moficiar*/
if(isset($_SESSION['ssNumeroPaquete']) and 
isset($_POST['sIdPersonal']) and 
isset($_POST['dCantidad']))
	{
		$Existe="SELECT sIdPersonal FROM paquetesdepersonal WHERE sContrato='".$_SESSION['ssContrato']."' AND sNumeroPaquete='".$_SESSION['ssNumeroPaquete']."' AND sIdPersonal='".$_POST['sIdPersonal']."'";
		$result=mysql_query($Existe,$link);
		if($row=mysql_fetch_array($result))
		{
				$consulta="UPDATE paquetesdepersonal SET dCantidad='".$_POST['dCantidad']."' WHERE sContrato='".$_SESSION['ssContrato']."' AND sNumeroPaquete='".$_SESSION['ssNumeroPaquete']."' AND sIdPersonal='".$_POST['sIdPersonal']."'";
				mysql_query($consulta,$link);
				if (mysql_error())
				echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		}
		else
		{
			$consulta="INSERT INTO paquetesdepersonal VALUES ('";
			$consulta.= $_SESSION['ssContrato']."','";
			$consulta.= $_SESSION['ssNumeroPaquete']."','";
			$consulta.= $_POST['sIdPersonal']."','";
			$consulta.=  $_POST['dCantidad']."','";
			$consulta.="')";
			mysql_query($consulta,$link);
			if (mysql_error())
				echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
		}
	}
/*****************************************************/
/*Eliminar*/
if(isset($_SESSION['ssNumeroPaquete']) and 
isset($_REQUEST['reqsIdPersonal']) and 
$_REQUEST['operacion']=="b")
	{
		$Existe="DELETE FROM paquetesdepersonal WHERE sContrato='".$_SESSION['ssContrato']."' AND sNumeroPaquete='".$_SESSION['ssNumeroPaquete']."' AND sIdPersonal='".$_REQUEST['reqsIdPersonal']."'";
		$result=mysql_query($Existe,$link);
		if (mysql_error())
		echo "<script language=javaScript>alert(\"Error: ".mysql_errno()."-".mysql_error()."\")</script>";
	}
/*****************************************************/
if(isset($_REQUEST['reqsNumeroPaquete']) and isset($_REQUEST['operacion']) and $_REQUEST['operacion']=='add')
{
	$sNumeroPaquete=str_replace("|"," ",$_REQUEST['reqsNumeroPaquete']);
	$_SESSION['ssNumeroPaquete']=$sNumeroPaquete;
}

$consulta="SELECT * FROM paquetesdepersonal WHERE sNumeroPaquete='$_SESSION[ssNumeroPaquete]' and sContrato='".$_SESSION['ssContrato']."'";	
$result=mysql_query($consulta,$link);
if($row=mysql_fetch_array($result)){
	$_SESSION['ssNumeroPaquete']=$sNumeroPaquete=$row['sNumeroPaquete'] ;
}
if(isset($_SESSION['ssNumeroPaquete']))$sNumeroPaquete=$_SESSION['ssNumeroPaquete'] ;	
?>
<form name="personal" action="formpersonal.php"  method="POST"> <!--action="index.php"-->
	<table border=1 >
	<caption><center><font size='1.5'>Insertar Personal</font></center></caption>
	
	 <tr><th colspan="2" ><?php echo $_SESSION['sOperacion'] ?> Tipo</th></tr>
	 <tr><td>
			Paquete
	</td><td>
			<input type="text" readonly="readonly" value="<?php echo $sNumeroPaquete?>" onkeyup=tab(this.form,this)/>
	</td></tr>
	 <tr><td>
		Personal
	</td><td>
	 		<?php
	 			$consulta="SELECT sIdPersonal,sDescripcion,sMedida,iJornada FROM personal WHERE sContrato='".$_SESSION['ssContrato']."'ORDER BY sDescripcion";	
				$result=mysql_query($consulta,$link);
				echo "<select name='sDescripcion' onchange='Separador();' onkeyup=tab(this.form,this)> " ;
				echo "<option onclick='document.personal.reset();'></option>";
				while($row=mysql_fetch_array($result)){
					echo "<option value='$row[sIdPersonal]|$row[sMedida]|$row[iJornada]'>$row[sDescripcion]</option>";
				}
				echo "</select>";
	 		?>
	</td></tr>
   <tr><td>
			Personal ID
	</td><td>
			<input type="text" name="sIdPersonal" readonly="readonly" value="" onkeyup=tab(this.form,this) >
	</td></tr>
   <tr><td>
			Medida
	</td><td>
			<input type="text" name="sMedida" readonly="readonly" value="" onkeyup=tab(this.form,this) >
	</td></tr>
   <tr><td>
			Jornada
	</td><td>
			<input type="text" name="iJornada"  readonly="readonly" value="" onkeyup=tab(this.form,this)>
	</td></tr>
   <tr><td>
			Cantidad
	</td><td>
			<input type="text" name="dCantidad" onKeyPress="return solonumeros(event);" maxlength="11" onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';" onkeyup=tab(this.form,this) >
	</td></tr>

 <tr>
		<th colspan=2>
			<input type="button" name="accion" value="Insertar" onclick="return Enviar(this.form)">
			<input type="button" name="cancela" value="Cancelar" onclick="Cancelar(this.form,'')">
			<input type="button" name="regresa" value="Regresar" onclick="self.location.href='index.php';">
		</th>
	</tr>
	
	</table>
</form>
<?php
/*Mostrar registros*/
if(isset($_REQUEST['order']))
	$OrdenarPor=$_REQUEST['order'];
else
	$OrdenarPor="pp.sNumeroPaquete";
	
$consulta="SELECT COUNT(*) FROM paquetesdepersonal pp INNER JOIN personal p ON (pp.sContrato=p.sContrato AND pp.sIdPersonal = p.sIdPersonal) WHERE pp.sContrato='".$_SESSION['ssContrato']."' AND pp.sNumeroPaquete='".$_SESSION['ssNumeroPaquete']."' ORDER BY $OrdenarPor";
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

   $consulta="SELECT pp.sIdPersonal, p.sDescripcion,p.sMedida, p.iJornada,pp.dCantidad FROM paquetesdepersonal pp INNER JOIN personal p ON (pp.sContrato=p.sContrato AND pp.sIdPersonal = p.sIdPersonal) WHERE pp.sContrato='".$_SESSION['ssContrato']."' AND pp.sNumeroPaquete='".$_SESSION['ssNumeroPaquete']."' ORDER BY $OrdenarPor  LIMIT $reg1,$tampag";
$result=mysql_query($consulta,$link);
?>
<table >
<caption><font size='1.5'>Actuales</font></center></caption>
	<thead>
	<tr>
		<td scope="col" ></td>
		<th scope="col" ><a href="?order=sNumeroPaquete">Personal</a></th>
		<th scope="col" ><a href="?order=perDes">Descripcion</a></th>
		<th scope="col" ><a href="?order=plaDes">Medida</a></th>
		<th scope="col" ><a href="?order=plaDes">Jornada</a></th>
		<th scope="col" ><a href="?order=plaDes">Cantidad</a></th>
	</tr>
	</thead>
	<tbody>
<?php
while ($row = mysql_fetch_row($result)) {
	$sNumeroPersonal=str_replace(" ","|",$row[0]);
	echo "<tr>";
	echo "<td class='CrearReporte' onclick=\"confirmaEliminarPersonal('$row[0]');\">
	      <a href='#?$sNumeroPersonal'>
				<img src='../../../imagenes/eliminar.png'>
				</a>
			  </td>
			  ";
		  //?columna=$row[0]&operacion=q 
	for ($i = 0; $i < mysql_num_fields($result); $i++){
		if($i==4)$Total=$Total+$row[$i];
		echo "<td>".$row[$i]."</td>";
	}
	echo "</tr>";
}
echo "</tbody>
	<tfoot>
	<tr>
		<th scope='col' colspan='5' >Total</th>
		<th scope='col' >$Total</th>
	</tr>
	</tfoot></table>";
echo paginar($pag, $total, $tampag, "?pag="); 
$Servidor=$ipTmp;
?>



</center>
</body>
</html>