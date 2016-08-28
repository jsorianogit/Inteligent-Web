<?php session_start();?>
<html>
<head>

<style type='text/css'>@import '../../estilos/estilo1.css';</style>
<script language="javascript" src="../../estilos/domtableenhance.js"></script>

<?php
	echo $estilo="<LINK REL='stylesheet' TYPE='text/css' HREF='../../estilos/estilo1.css'>";
?>
<script  language="javascript" SRC="../../include/funcionesGen.js"></script>
</head>
<script  language="javascript" SRC="funciones.js"></script>
</head>
<body>
<center>
<?php
require ("../../include/mysql.inc.php");
if(isset($_REQUEST['reqsIdTipoMovimiento']) and isset($_REQUEST['operacion']) and $_REQUEST['operacion']=="m")
{
	$sIdTipoMovimiento=str_replace("|"," ",$_REQUEST['reqsIdTipoMovimiento']);
	$consulta="SELECT * FROM tiposdemovimiento WHERE sIdTipoMovimiento='$sIdTipoMovimiento' AND sContrato='$sContrato'";
	$result=mysql_query($consulta,$link);
	if($row=mysql_fetch_array($result)){
		$_SESSION['ssIdTipoMovimiento']=$sIdTipoMovimiento=$row['sIdTipoMovimiento'] ;
		$sDescripcion=$row['sDescripcion'] ;
		$sClasificacion=$row['sClasificacion'] ;
		$iOrden=$row['iOrden'] ;
		$lGrafica=$row['lGrafica'];
		$iColor=$row['iColor'];
		$dVentaMN=$row['dVentaMN'];
		$dVentaDLL=$row['dVentaDLL'];
	}
	$_SESSION['sOperacion']="Modificar";
}
else if($_REQUEST['operacion']=="i")
	$_SESSION['sOperacion']="Insertar";
	
function crearSelect($Nombre,$Opciones,$Comparador=""){
print "<select name='$Nombre'>";
foreach($Opciones as $indice => $valor) {
 	$Seleccionar= ($Comparador==$valor or $Comparador==$indice) ? "Selected":"";
	print "<option value='$indice' class='$valor' $Seleccionar>$valor</option>\n";
} 
print "</select>";
	
}
?>
<form name="Movimiento" action="./"  method="POST"> <!--action="index.php"-->
	<table border=1 class='enhancedtablecolouredrow'>
	
	<caption>Movimientos</caption>
	
	 <tr><th colspan="2" ><?php echo $_SESSION['sOperacion'] ?></th></tr>
   <tr><td>Tipo</td><td><input type="text" name="sIdTipoMovimiento" value="<?php echo $sIdTipoMovimiento ?>" maxlength=4 onKeyPress="return NoComillas(event);" onkeyup=tab(this.form,this) onFocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onBlur="style.backgroundColor='white';"></td></tr>
   
	 <tr><td>Descripciòn</td><td><input type="text" name="sDescripcion" value="<?php echo $sDescripcion?>" maxlength=50 onKeyPress="return NoComillas(event);" onkeyup=tab(this.form,this) onFocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onBlur="style.backgroundColor='white';"></td></tr>


	 <tr><td>Clasificación</td><td>
	 <?php
	 $Opciones = array(	"Tiempo en Operacion" => "Tiempo en Operacion", 
	 					"Recursos" => "Recursos", 
						"Tiempo Muerto" =>"Tiempo Muerto", 
						"Notas" => "Notas");
	 crearSelect("sClasificacion",$Opciones,$sClasificacion);
	 ?>
	 </td></tr>
	 <tr><td>Grafica</td><td>
	 <?php
	 $Opciones = array(	"Si" => "Si","No" => "No");
	 crearSelect("lGrafica",$Opciones,$lGrafica);
	 ?>
	 </td></tr>
	 <tr><td>Color</td><td>
	 <?php
	 $Opciones = array(	1 =>"Black","Maroon","Green","Olive","Navy","Purple","Teal","Gray","Silver",
							"Red","Lime","Yellow","Blue","Fuchsia","Aqua","White");
	 crearSelect("iColor",$Opciones,$iColor);
	 ?>
	 </td></tr>

	 <tr><td>Orden</td><td>
	  <?php
	 $Opciones = array(	1=>"1","2","3","4");
	 crearSelect("iOrden",$Opciones,$iColor);
	 ?>
	 </td></tr>
	 	 
	 <tr><td>VentaMN</td><td><input type="text" name="dVentaMN" value="<?php echo $dVentaMN?>" maxlength=30 onKeyPress="return NoComillas(event);" onkeyup=tab(this.form,this) onFocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onBlur="style.backgroundColor='white';"></td></tr>

	 <tr><td>VentaDLL</td><td><input type="text" name="dVentaDLL" value="<?php echo $dVentaDLL?>" maxlength=30 onKeyPress="return NoComillas(event);" onkeyup=tab(this.form,this) onFocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onBlur="style.backgroundColor='white';"></td></tr>

	<tr>
		<th colspan=2>
			<input type="button" name="accion" value="<?php echo $_SESSION['sOperacion'] ?>" onClick="return Enviar(this.form)">
			<input type="button" name="cancela" value="Cancelar" onClick="Cancelar(this.form,'index.php')">
		</th>
	</tr>
	
	</table>
</form>
</center>
</body>
</html>