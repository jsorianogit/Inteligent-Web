<?php session_start();?>
<html>
<head>
<style type='text/css'>@import '../../../estilos/estilo1.css';</style>
<script language="javascript" src="../../../estilos/domtableenhance.js"></script>

<?php
	echo $estilo="<LINK REL='stylesheet' TYPE='text/css' HREF='../../../estilos/estilo1.css'>";
?>
<script  language="javascript" SRC="../../../include/funcionesGen.js"></script>
</head>
<script  language="javascript" SRC="funciones.js"></script>
</head>
<body>
<center>
<?php
require ("../../../include/mysql.inc.php");
if(isset($_REQUEST['reqsIdFase']) and isset($_REQUEST['operacion']) and $_REQUEST['operacion']=="m")
{
	$sIdFase=str_replace("|"," ",$_REQUEST['reqsIdFase']);
	$consulta="SELECT * FROM fasesxproyecto WHERE sIdFase='$sIdFase'";
	$result=mysql_query($consulta,$link);
	if($row=mysql_fetch_array($result)){
		$_SESSION['ssIdFase']=$sIdFase=$row['sIdFase'] ;
		$sDescripcion=$row['sDescripcion'] ;
	}
	$_SESSION['sOperacion']="Modificar";
}
else if($_REQUEST['operacion']=="i")
	$_SESSION['sOperacion']="Insertar";
?>
<form name="fases" action="./"  method="POST"> <!--action="index.php"-->
	<table border=1 class='enhancedtablecolouredrow'>
	
	<caption>Catalogo de Fases X Proyecto</caption>
	
	 <tr><th colspan="2" ><?php echo $_SESSION['sOperacion'] ?> </th></tr>
   <tr><td>Tipo</td><td><input type="text" name="sIdFase" value="<?php echo $sIdFase ?>" maxlength=3 onKeyPress="return NoComillas(event);" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr>
   
	 <tr><td>Descripciòn</td><td><input type="text" name="sDescripcion" value="<?php echo $sDescripcion?>" maxlength=30 onKeyPress="return NoComillas(event);" size="50" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr>
	 
	<tr>
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