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
if(isset($_REQUEST['reqcIdStatus']) and isset($_REQUEST['operacion']) and $_REQUEST['operacion']=="m")
{
	$cIdStatus=str_replace("|"," ",$_REQUEST['reqcIdStatus']);
	$consulta="SELECT * FROM estatus WHERE cIdStatus='$cIdStatus'";
	$result=mysql_query($consulta,$link);
	if($row=mysql_fetch_array($result)){
		$_SESSION['scIdStatus']=$cIdStatus=$row['cIdStatus'] ;
		$sDescripcion=$row['sDescripcion'] ;
	}
	$_SESSION['sOperacion']="Modificar";
}
else if($_REQUEST['operacion']=="i")
	$_SESSION['sOperacion']="Insertar";
?>
<form name="Status" action="./"  method="POST"> <!--action="index.php"-->
	<table border=1 class='enhancedtablecolouredrow'>
	
	<caption>Turnos</caption>
	
	 <tr><th colspan="2" ><?php echo $_SESSION['sOperacion'] ?> Turno</th></tr>
   <tr><td>Tipo</td><td><input type="text" name="cIdStatus" value="<?php echo $cIdStatus ?>" maxlength=1 onKeyPress="return NoComillas(event);" onkeyup=tab(this.form,this) onFocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onBlur="style.backgroundColor='white';"></td></tr>
   
	 <tr><td>Descripciòn</td><td><input type="text" name="sDescripcion" value="<?php echo $sDescripcion?>" maxlength=30 onKeyPress="return NoComillas(event);" onkeyup=tab(this.form,this) onFocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onBlur="style.backgroundColor='white';"></td></tr>
	 
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