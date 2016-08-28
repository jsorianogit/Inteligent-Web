<?php session_start();?>
<html>
<head>
<style type='text/css'>@import '../../estilos/estilo1.css';</style>
<script language="javascript" src="../../estilos/domtableenhance.js"></script>
<script type="text/javascript" src="acc_calendar/acc_calendar.js"></script>
<script  language="javascript" src="../../include/funcionesGen.js"></script>
</head>
<script  language="javascript" src="funciones.js"></script>
</head>
<body>
<center>
<?php
require ("../../include/mysql.inc.php");
if(isset($_REQUEST['reqdIdFecha']) and isset($_REQUEST['operacion']) and $_REQUEST['operacion']=="m")
{
	$dIdFecha=str_replace("|"," ",$_REQUEST['reqdIdFecha']);
	$consulta="SELECT * FROM diasespeciales WHERE dIdFecha='$dIdFecha' AND sContrato='$sContrato'";
	$result=mysql_query($consulta,$link);
	if($row=mysql_fetch_array($result)){
		$_SESSION['sdIdFecha']=$dIdFecha=$row['dIdFecha'] ;
		$iJornada=$row['iJornada'] ;
		$sDescripcion=$row['sDescripcion'] ;
	}	
	$_SESSION['sOperacion']="Modificar";
}
else if($_REQUEST['operacion']=="i")
	$_SESSION['sOperacion']="Insertar";
?>
<form name="SpecialDays" action="./"  method="POST"> <!--action="index.php"-->
	<table border=1 class='enhancedtablecolouredrow'>
	
	<caption>Turnos</caption>
	
	 <tr><th colspan="2" ><?php echo $_SESSION['sOperacion'] ?> Turno</th></tr>
	 
	 <tr><td>Fecha</td><td>
	 	<label for="dIdFecha">
			<input class="fecha prev rang100" type="text" id="dIdFecha" name="dIdFecha" value="<?php echo $dIdFecha?>" onkeyup=tab(this.form,this)  onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"/>
		</label>
	</td>
	 </tr>
	 <tr><td>Jornada</td><td>
	 
	 	<input type="text" name="iJornada" value="<?php echo $iJornada?>" maxlength=9 onKeyPress="return solonumeros(event);" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';">
		 
		 </td></tr>
	 
	 <tr><td>Descripcion</td><td><input type="text" name="sDescripcion" value="<?php echo $sDescripcion?>" maxlength=35 size=35 onKeyPress="return NoComillas(event);" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr>
	 
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