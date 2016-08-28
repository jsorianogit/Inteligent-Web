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
if(isset($_REQUEST['reqsIdPernocta']) and isset($_REQUEST['operacion']) and $_REQUEST['operacion']=="m")
{
	$sIdPernocta=str_replace("|"," ",$_REQUEST['reqsIdPernocta']);
	$consulta="SELECT * FROM pernoctan WHERE sIdPernocta='$sIdPernocta'";
	$result=mysql_query($consulta,$link);
	if($row=mysql_fetch_row($result)){
		$_SESSION['ssIdPernocta']=$sIdPernocta=$row[0] ;
		$sDescripcion=$row[1] ;
		$sClasificacion=$row[2];
	}
	$_SESSION['sOperacion']="Modificar";
}
else if($_REQUEST['operacion']=="i")
	$_SESSION['sOperacion']="Insertar";
?>
<form name="Pernoctan" action="./"  method="POST"> <!--action="index.php"-->
	<table border=1 class='enhancedtablecolouredrow'>
	<caption>Catalago de Pernoctas</caption>
	
	 <tr><th colspan="2" ><?php echo $_SESSION['sOperacion'] ?> Pernoctas</th></tr>
	 
   <tr><td>Pernocta</td><td><input type="text" name="sIdPernocta" value="<?php echo $sIdPernocta ?>" maxlength=10 onKeyPress="return NoComillas(event);" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';"  onblur="style.backgroundColor='white';"></td></tr>
   
	 <tr><td>Descripciòn</td><td><input type="text" name="sDescripcion" value="<?php echo $sDescripcion?>" maxlength=50 onKeyPress="return NoComillas(event);" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';"  onblur="style.backgroundColor='white';"></td></tr>

	 <tr><td>Clasificacion</td><td>
	 <?php 
	 	switch($sClasificacion){
			case "COMPLEJO":
				$selComplejo="selected";
				$selFlotel="";
				$selOtros="";
				break;
			case "FLOTEL":
				$selComplejo="";
				$selFlotel="selected";
				$selOtros="";
				break;
			case "OTROS":
				$selComplejo="";
				$selFlotel="";
				$selOtros="selected";
				break;
		}
	 ?>
	<select name="sClasificacion" onkeyup=tab(this.form,this)>
		<option <?php echo $selComplejo?> >COMPLEJO</option>
		<option <?php echo $selFlotel?>>FLOTEL</option>
		<option <?php echo $selOtros?>>OTROS</option>
	</select>
		 
	</td></tr>
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