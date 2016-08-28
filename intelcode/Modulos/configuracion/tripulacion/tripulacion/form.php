<?php session_start();?>
<html lang="es" xml:lang="es">
<head>
<?php
	echo $estilo="<LINK REL='stylesheet' TYPE='text/css' HREF='../../../estilos/estilo1.css'>";
?>
<title>Calagos de Tipo de Embarcación</title>
<style type='text/css'>@import '../../../estilos/estilo1.css';</style>
<script language="javascript" src="../../../estilos/domtableenhance.js"></script>
<script  language="javascript" SRC="../../../include/funcionesGen.js"></script>
<script  language="javascript" SRC="funciones.js"></script>
<script type="text/javascript" src="acc_calendar/acc_calendar.js"></script>
</head>
<body>
<center>
<?php
require ("../../../include/mysql.inc.php");
$sContrato=$_SESSION['ssContrato'];
if(isset($_REQUEST['reqContrato']) and isset($_REQUEST['reqIdTripulacion']) and isset($_REQUEST['operacion']) and $_REQUEST['operacion']=="m")
{
	$consulta="SELECT * FROM tripulacion
				WHERE sContrato='$sContrato' and 
				sIdTripulacion='".$_REQUEST['reqIdTripulacion']."'";
	$result=mysql_query($consulta,$link);
	if($row=mysql_fetch_array($result)){
		$_SESSION['ssIdTripulacion']=$sIdTripulacion=$row['sIdTripulacion'] ;
		$sIdCategoria=$row['sIdCategoria'] ;
		$sDescripcion=$row['sDescripcion'] ;
		$iNacionales=$row['iNacionales'] ;
		$iExtranjeros=$row['iExtranjeros'] ;
	}
	$_SESSION['sOperacion']="Modificar";
}
else if($_REQUEST['operacion']=="i")
{
	$_SESSION['sOperacion']="Insertar";
}
?>
<form name="Tripulacion" action="./"  method="POST"> <!--action="MostrarEmbarcaciones.php-->
	<table border=1 class='enhancedtablecolouredrow'>
	<caption>Catalogo de Tripulacion</caption>
	<thead>
	 <tr><th colspan="4" ><?php echo $_SESSION['sOperacion'] ?>  Tripulacion</th></tr>
	 </thead>
	 <tbody>
	 <tr><td >Tripulacion ID</td><td colspan="3"><input type="text" name="sIdTripulacion" value="<?php echo $sIdTripulacion ?>" maxlength=4 size=4 onKeyPress="return NoComillas(event);" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr>
	 
	 <tr><td>Categoria</td><td colspan="3">
	  	<?php 
	  		
			$rs=mysql_query("SELECT sIdCategoria,sDescripcion FROM categorias WHERE sContrato='$sContrato'",$link);
			echo "<select name='sIdCategoria' onkeyup=tab(this.form,this)>";
			while($row = mysql_fetch_array($rs))
			{
			  	if($sIdCategoria==$row['sIdCategoria'])$Seleccionar="selected";else $Seleccionar="";
				echo "<option $Seleccionar value=\"$row[sIdCategoria]\">$row[sDescripcion]</option>";
			}
			echo "</select>";
	  ?>
	</td></tr>
	  
	 <tr><td>Descripciòn</td><td colspan="3"><input type="text" name="sDescripcion" value="<?php echo $sDescripcion?>" maxlength=50 size=50 onKeyPress="return NoComillas(event);" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr>


	 <td>Nacionales</td><td><input type="text" name="iNacionales" value="<?php echo $iNacionales?>" maxlength=9 size=9 onKeyPress="return solonumeros(event);" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr>

	 <td>Extranjeros</td><td><input type="text" name="iExtranjeros" value="<?php echo $iExtranjeros?>" maxlength=9 size=9 onKeyPress="return solonumeros(event);" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr>

	 </tbody>
	 <tfoot>
	<tr>
		<th colspan=4 >
			<input type="button" name="accion" value="<?php echo $_SESSION['sOperacion'] ?>" onclick="return Enviar(this.form)">
			<input type="button" name="cancela" value="Cancelar" onclick="Cancelar(this.form,'index.php')">
		</th>
	</tr>
	 </tfoot>
	</table>
</form>
</center>
</body>
</html>