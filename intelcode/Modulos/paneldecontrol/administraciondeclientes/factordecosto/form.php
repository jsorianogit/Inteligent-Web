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
if(isset($_REQUEST['reqiAnno']) and isset($_REQUEST['reqiMes']) and isset($_REQUEST['operacion']) and $_REQUEST['operacion']=="m")
{
	$iAnno=str_replace("|"," ",$_REQUEST['reqiAnno']);
	$iMes=str_replace("|"," ",$_REQUEST['reqiMes']);
	$consulta="SELECT * FROM factordecosto WHERE iAnno=$iAnno AND iMes=$iMes AND sContrato='$sContrato'";
	$result=mysql_query($consulta,$link);
	if($row=mysql_fetch_array($result)){
		$_SESSION['siAnno']=$iAnno=$row['iAnno'] ;
		$_SESSION['siMes']=$iMes=$row['iMes'] ;
		$dFactor=$row['dFactor'] ;
	}
	$_SESSION['sOperacion']="Modificar";
}
else if($_REQUEST['operacion']=="i")
	$_SESSION['sOperacion']="Insertar";
?>
<form name="Factor" action="./"  method="POST"> <!--action="index.php"-->
	<table border=1 class='enhancedtablecolouredrow'>
	
	<caption>Catalogo de Factor de Costos</caption>
	
	 <tr><th colspan="2" ><?php echo $_SESSION['sOperacion'] ?> </th></tr>
   <tr><td>Año</td><td><input type="text" name="iAnno" value="<?php echo $iAnno ?>" maxlength=4 onKeyPress="return solonumeros(event);" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr>
   
	 <tr><td>Mes</td><td><input type="text" name="iMes" value="<?php echo $iMes?>" maxlength=2 onKeyPress="return solonumeros(event);" size="2" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr>

	 <tr><td>Factor</td><td><input type="text" name="dFactor" value="<?php echo $dFactor?>" maxlength=13 onKeyPress="return solonumeros(event);" size="13" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr> 
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