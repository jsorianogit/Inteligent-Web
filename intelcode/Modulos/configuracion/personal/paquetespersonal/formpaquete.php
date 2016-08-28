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
	$consulta="SELECT * FROM paquetes_p WHERE sNumeroPaquete='$sNumeroPaquete' and sContrato='".$_SESSION['ssContrato']."'";	
	$result=mysql_query($consulta,$link);
	if($row=mysql_fetch_array($result)){
		$_SESSION['ssNumeroPaquete']=$sNumeroPaquete=$row['sNumeroPaquete'] ;
		$sIdPernocta=$row['sIdPernocta'] ;
		$sIdPlataforma=$row['sIdPlataforma'] ;
	}
	$_SESSION['sOperacion']="Modificar";
}
else if($_REQUEST['operacion']=="i")
	$_SESSION['sOperacion']="Insertar";
?>
<form name="Paquete" action="./"  method="POST"> <!--action="index.php"-->
	<table border=1 >
	<caption><center><font size='1.5'>Catalago de Paquetes de Personal</font></center></caption>
	
	 <tr><th colspan="2" ><?php echo $_SESSION['sOperacion'] ?> Tipo</th></tr>
	 
   <tr><td>Paquete ID</td><td><input type="text" name="sNumeroPaquete" maxlength=15 value="<?php echo $sNumeroPaquete?>"   onKeyPress="return NoComillas(event);" onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onkeyup=tab(this.form,this)  onblur="style.backgroundColor='white';" >

	</td></tr>
   
	 <tr><td>Pernocta</td><td>
	  <?php 
			$rs=mysql_query("SELECT sIdPernocta,sDescripcion FROM pernoctan",$link);
			echo "<select name='sIdPernocta' onkeyup=tab(this.form,this)  >";
			while($row = mysql_fetch_array($rs))
			{
			  if($sIdPernocta==$row['sIdPernocta'])$Seleccionar="selected";else $Seleccionar="";
				echo "<option $Seleccionar value='$row[sIdPernocta]'>$row[sDescripcion]</option>";
			}
			echo "</select>";
	  ?>
	 </td></tr>
	 
	 <tr><td>Laboran</td><td>
	 	  <?php 
			$rs=mysql_query("SELECT sIdPlataforma,sDescripcion FROM plataformas",$link);
			echo "<select name='sIdPlataforma' onkeyup=tab(this.form,this) >";
			while($row = mysql_fetch_array($rs))
			{
			  if($sIdPlataforma==$row['sIdPlataforma'])$Seleccionar="selected";else $Seleccionar="";
				echo "<option $Seleccionar value='$row[sIdPlataforma]'>$row[sDescripcion]</option>";
			}
			echo "</select>";
	  ?>
	 </td></tr>
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