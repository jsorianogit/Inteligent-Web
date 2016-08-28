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
if(isset($_REQUEST['columna']) and isset($_REQUEST['operacion']) and $_REQUEST['operacion']=="m")
{
	$consulta="SELECT * FROM categorias WHERE sIdCategoria='".$_REQUEST['columna']."'";
	$result=mysql_query($consulta,$link);
	if($row=mysql_fetch_row($result)){
		$_SESSION['ssIdCategoria']=$sIdCategoria=$row[1] ;
		$sDescripcion=$row[1] ;
	}
	$_SESSION['sOperacion']="Modificar";
}
else if($_REQUEST['operacion']=="i")
	$_SESSION['sOperacion']="Insertar";
?>
<form name="Categoria" action="./"  method="POST"> <!--action="index.php"-->
	<table border=1 class='enhancedtablecolouredrow'>
	<caption>Catalago de Tipos de Categoria de Personal</caption>
	
	 <tr><th colspan="2" ><?php echo $_SESSION['sOperacion'] ?> Tipo</th></tr>
	 
   <tr><td>Categoria</td><td><input type="text" name="sIdCategoria" value="<?php echo $sIdCategoria ?>" maxlength=4 onKeyPress="return NoComillas(event);" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';"  onblur="style.backgroundColor='white';"></td></tr>
   
	 <tr><td>Descripciòn</td><td><input type="text" name="sDescripcion" value="<?php echo $sDescripcion?>" maxlength=50 onKeyPress="return NoComillas(event);"  onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';"  onblur="style.backgroundColor='white';"></td></tr>
	 
	<th colspan=2>
			<input type="button" name="accion" value="<?php echo $_SESSION['sOperacion'] ?>" onclick="return Enviar(this.form)">
			<input type="button" name="cancela" value="Cancelar" onclick="Cancelar(this.form,'index.php')">
		</th>
	</tr>
	
	</table>
</form>
</center>
</body>
</html>