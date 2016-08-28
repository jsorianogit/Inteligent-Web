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
if(isset($_REQUEST['reqsNumeroPaquete']) and isset($_REQUEST['operacion']) and $_REQUEST['operacion']=="m")
{
	$sNumeroPaquete=str_replace("|"," ",$_REQUEST['reqsNumeroPaquete']);
	$consulta="SELECT * FROM paquetes_e WHERE sNumeroPaquete='$sNumeroPaquete' and sContrato='".$_SESSION['ssContrato']."'";	
	$result=mysql_query($consulta,$link);
	if($row=mysql_fetch_array($result)){
		$_SESSION['ssNumeroPaquete']=$sNumeroPaquete=$row['sNumeroPaquete'] ;
		$sIdPernocta=$row['sIdPernocta'] ;
	} 
	$_SESSION['sOperacion']="Modificar";
}
else if($_REQUEST['operacion']=="i")
	$_SESSION['sOperacion']="Insertar";
?>
<form name="Paquete" action="./"  method="POST"> <!--action="index.php"-->
	<table border=0 class='enhancedtablecolouredrow'>
	<caption>Catalago de Paquetes de Equipos</caption>
	
	 <tr><th colspan="2" ><?php echo $_SESSION['sOperacion'] ?> Tipo</th></tr>
	 
   <tr><td>Paquete ID</td><td><input type="text" name="sNumeroPaquete" maxlength=15 value="<?php echo $sNumeroPaquete?>"  onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onkeydown='if (event.keyCode==13) {event.keyCode=9;}' onblur="style.backgroundColor='white';" >

	</td></tr>
   
	 <tr><td>Pernocta</td><td>
	  <?php 
			$rs=mysql_query("SELECT sIdPernocta,sDescripcion FROM pernoctan",$link);
			echo "<select name='sIdPernocta' onkeyup=tab(this.form,this) >";
			while($row = mysql_fetch_array($rs))
			{
			  if($sIdPernocta==$row['sIdPernocta'])$Seleccionar="selected";else $Seleccionar="";
				echo "<option $Seleccionar value='$row[sIdPernocta]'>$row[sDescripcion]</option>";
			}
			echo "</select>";
	  ?>
	 </td></tr>
	<tr>
		<th colspan=2>
			<input type="button" name="accion" value="<?php echo $_SESSION['sOperacion'] ?>" onClick="return Enviar(this.form)">
			<input type="button" name="cancela" value="Cancelar" onclick=Cancelar(this.form,'index.php')>
		</th>
	</tr>
	
	</table>
</form>
</center>
</body>
</html>