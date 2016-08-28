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
if(isset($_REQUEST['reqsInstalacion']) and isset($_REQUEST['operacion']) and $_REQUEST['operacion']=="m")
{
	$sInstalacion=str_replace("|"," ",$_REQUEST['reqsInstalacion']);
    $consulta="SELECT * FROM contrato_trinomio WHERE sInstalacion='$sInstalacion' AND sContrato='$sContrato'";
	$result=mysql_query($consulta,$link);
	if($row=mysql_fetch_array($result)){
		$_SESSION['ssInstalacion']=$sInstalacion=$row['sInstalacion'] ;
		$sFondo=$row['sFondo'] ;
		$sPosicionFinanciera=$row['sPosicionFinanciera'] ;
		$sCentroGestorEjecutor=$row['sCentroGestorEjecutor'] ;
		$sCuentaMayor=$row['sCuentaMayor'] ;
		$sElementoPep=$row['sElementoPep'] ; 	
		$lVigente=$row['lVigente'] ;
	}
	$_SESSION['sOperacion']="Modificar";
}
else if($_REQUEST['operacion']=="i")
	$_SESSION['sOperacion']="Insertar";
?>
<form name="Trinomio" action="./"  method="POST"> <!--action="index.php"-->
	<table border=1 class='enhancedtablecolouredrow'>
	
	<caption>Trinomios del Contrato</caption>
	
	 <tr><th colspan="2" ><?php echo $_SESSION['sOperacion'] ?> </th></tr>
   <tr><td>Instalacion</td><td><input type="text" name="sInstalacion" value="<?php echo $sInstalacion ?>" maxlength=15 onKeyPress="return NoComillas(event);" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr>
   
	 <tr><td>Fondo</td><td><input type="text" name="sFondo" value="<?php echo $sFondo?>" maxlength=10 onKeyPress="return NoComillas(event);" size="10" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr>

	 <tr><td>Posicion Financiera</td><td><input type="text" name="sPosicionFinanciera" value="<?php echo $sPosicionFinanciera?>" maxlength=9 onKeyPress="return NoComillas(event);" size="13" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr> 

	 <tr><td>Centro de Gestor Ejecutor</td><td><input type="text" name="sCentroGestorEjecutor" value="<?php echo $sCentroGestorEjecutor?>" maxlength=16 onKeyPress="return NoComillas(event);" size="16" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr> 
	
	 <tr><td>Cuenta Mayor</td><td><input type="text" name="sCuentaMayor" value="<?php echo $sCentroGestorEjecutor?>" maxlength=8 onKeyPress="return NoComillas(event);" size="8" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr> 
	 
	 <tr><td>Elemento Pep</td><td><input type="text" name="sElementoPep" value="<?php echo $sElementoPep?>" maxlength=17 onKeyPress="return NoComillas(event);" size="17" onkeyup=tab(this.form,this) onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr> 
	<tr>
	
	 <tr><td>Vigente</td><td>
	 <?php
	 	switch(lVigente){
			case "Si";
				$si="selected";
				$no="";
				break;
			case "No":
				$si="";
				$no="selected";
				break;
		}
	 ?>
	 <select name="lVigente" onkeyup=tab(this.form,this)>
	 	<option value="Si" <? echo $si ?>>Si</option>
	 	<option value="No" <? echo $no ?>>No</option>
	 </select>
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