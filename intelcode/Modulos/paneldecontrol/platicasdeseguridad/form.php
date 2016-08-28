<?php session_start();?>
<html>
<head>

<style type='text/css'>@import '../../estilos/estilo1.css';</style>
<script language="javascript" src="../../estilos/domtableenhance.js"></script>
<script type="text/javascript" src="acc_calendar/acc_calendar.js"></script>
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
if(isset($_REQUEST['reqsNumeroOrden']) and isset($_REQUEST['reqdIdFecha']) and isset($_REQUEST['operacion']) and $_REQUEST['operacion']=="m")
{
	$sNumeroOrden=str_replace("|"," ",$_REQUEST['reqsNumeroOrden']);
	$didFecha=str_replace("|"," ",$_REQUEST['reqdIdFecha']);
	$consulta="SELECT * FROM platicasdeseguridad WHERE sNumeroOrden='$sNumeroOrden' AND dIdFecha='$dIdFecha' AND sContrato='$sContrato'";
	$result=mysql_query($consulta,$link);
	if($row=mysql_fetch_array($result)){
		$_SESSION['ssNumeroOrden']=$sNumeroOrden=$row['sNumeroOrden'] ;
		$_SESSION['sdIdFecha']=$dIdFecha=$row['dIdFecha'] ;
		$sPlatica=$row['sPlatica'] ;
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
	
	<caption>Platicas de Seguridad</caption>
	
	 <tr><th colspan="2" ><?php echo $_SESSION['sOperacion'] ?></th></tr>
   
	 <tr><td>Numero Orden</td><td>
	 <?php
		$sql="SELECT sNumeroOrden FROM ordenesdetrabajo WHERE sContrato='$sContrato' ORDER BY sNumeroOrden";
		$result=mysql_query($sql,$link);
		$Opciones[]="";
		while($row=mysql_fetch_array($result)){
			$Opciones[$row[0]]=$row[0];
		}
		 crearSelect("sNumeroOrden",$Opciones,$sClasificacion);
	 ?>
	 </td></tr>
 	 
	 <tr><td>Fecha</td><td>
	 	<label for="dIdFecha">
			<input class="fecha rang10" type="text" id="dIdFecha" name="dIdFecha" value="<?php echo $dIdFecha?>" onkeyup=tab(this.form,this)  onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"/>
		</label>
	</td>
	 </tr>

	 <tr><td>Tema</td><td><input type="text" name="sTema" value="<?php echo $sTema?>" maxlength=100 onKeyPress="return NoComillas(event);" onkeyup=tab(this.form,this) onFocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onBlur="style.backgroundColor='white';"></td></tr>

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