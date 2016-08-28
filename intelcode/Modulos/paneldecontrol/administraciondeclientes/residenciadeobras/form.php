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
if(isset($_REQUEST['reqsIdResidencia']) and isset($_REQUEST['operacion']) and $_REQUEST['operacion']=="m")
{
	$sIdResidencia=str_replace("|"," ",$_REQUEST['reqsIdResidencia']);
	$consulta="SELECT * FROM residencias WHERE sIdResidencia='$sIdResidencia'";
	$result=mysql_query($consulta,$link);
	if($row=mysql_fetch_array($result)){
		$_SESSION['ssIdResidencia']=$sIdResidencia=$row['sIdResidencia'] ;
		$sDescripcion=$row['sDescripcion'] ;
		$sResponsable=$row['sResponsable'] ;
		$sAdministradordeContrato=$row['sAdministradordeContrato'] ;
	}
	$_SESSION['sOperacion']="Modificar";
}
else if($_REQUEST['operacion']=="i")
	$_SESSION['sOperacion']="Insertar";
?>
<form name="Residencias" action="./"  method="POST"> <!--action="index.php"-->
	<table border=1 class='enhancedtablecolouredrow'>
	
	<caption>Residencias de Obras</caption>
	
	 <tr><th colspan="2" ><?php echo $_SESSION['sOperacion'] ?> </th></tr>
   <tr><td>Tipo</td><td><input type="text" name="sIdResidencia" value="<?php echo $sIdResidencia ?>" maxlength=2 onKeyPress="return NoComillas(event);" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr>
   
	 <tr><td>Descripciòn</td><td><input type="text" name="sDescripcion" value="<?php echo $sDescripcion?>" maxlength=50 onKeyPress="return NoComillas(event);" size="50" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr>
	 
	 <tr><td>Responsable</td><td><input type="text" name="sResponsable" value="<?php echo $sResponsable?>" maxlength=50 onKeyPress="return NoComillas(event);" size="50" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr>

	 <tr><td><b>Administrador de Contratos RMNE</b></td><td><input type="text" name="sAdministradordeContrato" value="<?php echo $sAdministradordeContrato?>" maxlength=50 onKeyPress="return NoComillas(event);"  size="50" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr>

	 
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