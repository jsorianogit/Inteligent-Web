<?php session_start();?>
<html lang="es" xml:lang="es">
<head>
<?php
	echo $estilo="<LINK REL='stylesheet' TYPE='text/css' HREF='../../estilos/estilo1.css'>";
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
if(isset($_REQUEST['reqFecha']) and isset($_REQUEST['operacion']) and $_REQUEST['operacion']=="m")
{	
	$dIdFecha=str_replace("|"," ",$_REQUEST['reqFecha']);
	$consulta="SELECT dIdFecha,dCantidad FROM personalprogramado WHERE sContrato='".$_SESSION['ssContrato']."' AND dIdFecha='$dIdFecha' ";
	$result=mysql_query($consulta,$link);
	if($row=mysql_fetch_array($result)){
		$dIdFecha=$row['dIdFecha'];
		$dCantidad=$row['dCantidad'];
		$_SESSION['dIdFecha']=$dIdFecha;
		$_SESSION['sOperacion']="Modificar";
	}
}
else
	$_SESSION['sOperacion']="Insertar";
?>
<form name="programa" action="./"  method="POST"> <!--action="MostrarEmbarcaciones.php-->
	<table border=1 >
	<caption><center><font size='1.5'>Programacion de Personal Diario</font></center></caption>
	<thead>
	 <tr><th colspan="4" ><?php echo $_SESSION['sOperacion'] ?> Categorias de Personal</th></tr>
	 </thead>
	 <tbody>
	 <tr><td>Fecha</td><td>
	 	<label for="dIdFecha">
			<input class="fecha prev rang100" type="text" id="dIdFecha" name="dIdFecha" value="<?php echo $dIdFecha?>" onkeyup=tab(this.form,this)  onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"/>
		</label>
	</td>
	 </tr>
	 <tr>
   <td>Cantidad</td><td><input type="text" name="dCantidad" value="<?php echo $dCantidad?>" maxlength=21 size=23	 onKeyPress="return solonumeros(event);"  onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onkeyup=tab(this.form,this)  onblur="style.backgroundColor='white';"></td></tr>

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