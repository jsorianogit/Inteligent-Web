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
if(isset($_REQUEST['reqsIdTurno']) and isset($_REQUEST['operacion']) and $_REQUEST['operacion']=="m")
{
	$sIdTurno=str_replace("|"," ",$_REQUEST['reqsIdTurno']);
	$consulta="SELECT * FROM turnos WHERE sIdTurno='$sIdTurno'";
	$result=mysql_query($consulta,$link);
	if($row=mysql_fetch_row($result)){
		$_SESSION['ssIdTurno']=$sIdTurno=$row[1] ;
		$sDescripcion=$row[2] ;
		$sOrigenTierra=$row[3] ;
		$sPrefijo=$row[4] ;
	}
	$_SESSION['sOperacion']="Modificar";
}
else if($_REQUEST['operacion']=="i")
	$_SESSION['sOperacion']="Insertar";
?>
<form name="Turnos" action="./"  method="POST"> <!--action="index.php"-->
	<table border=1 class='enhancedtablecolouredrow'>
	
	<caption>Turnos</caption>
	
	 <tr><th colspan="2" ><?php echo $_SESSION['sOperacion'] ?> Turno</th></tr>
   <tr><td>Tipo</td><td><input type="text" name="sIdTurno" value="<?php echo $sIdTurno ?>" maxlength=2 onKeyPress="return NoComillas(event);" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr>
   
	 <tr><td>Descripciòn</td><td><input type="text" name="sDescripcion" value="<?php echo $sDescripcion?>" maxlength=30 onKeyPress="return NoComillas(event);" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr>
	 
	 <tr><td>Obra en Tierra?</td><td>
	 <?php
	 	switch($sOrigenTierra){
			case "Si":
				$Si="selected";
				$no="";
				break;
			case "No":
				$Si="";
				$no="";
				break;
		}
	 ?>
	 <select name="sOrigenTierra" onkeyup=tab(this.form,this)>
	 	<option <?php echo $Si ?> value="Si" >Si</option>
	 	<option <?php echo $No ?> value="No" >No</option>
	 </select>
	 </td></tr>
	 
	 <tr><td>Prefijo</td><td><input type="text" name="sPrefijo" value="<?php echo $sPrefijo?>" maxlength=4 onKeyPress="return NoComillas(event);" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr>
	 
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