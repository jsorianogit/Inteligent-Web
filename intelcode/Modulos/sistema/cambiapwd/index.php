<?php
session_cache_limiter("must-revalidate"); 
session_start();
?>
<html>
<head>
<?php
require ("../../include/formulario.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
<script language="javascript">
function comparaPass(){
	if(document.pass.sPassword.value !=document.pass.sPassword2.value ){
		alert("Las contraseñas no coinciden!");
		document.pass.sPasswordAct.focus();
		document.pass.sPasswordAct.select();
	}
	else
		document.pass.submit();
}
</script>
</head>
<body onLoad=document.pass.sPasswordAct.focus();>
<center>
<form name="pass" action="cambiar.php" method="post"> 
	<table>
		<caption>Cambiar Contraseña</caption>
		<tr>
			<td>Usuario</td>
			<td><input type="text" name="sIdUsuario" value="<?php echo $_SESSION['sIdUsuario']?>" readonly ></td>
		</tr>
		<tr>
		<td colspan=2 bgcolor="blue"></td>		
		</tr>
		<tr>
			<td>Contraseña Actual:</td>
			<td><input type="password" name="sPasswordAct"	onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white'"  onKeyPress='return tabuladorText(this.form,this,event);'></td>
		</tr>
		<tr>
		<td colspan=2 bgcolor="blue"></td>		
		</tr>
		<tr>
			<td>Contraseña Nueva:</td>
			<td><input type="password" name="sPassword" onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white'"  onKeyPress='return tabuladorText(this.form,this,event);'></td>
		</tr>
		<tr>
			<td>Repetir Contraseña Nueva:</td>
			<td><input type="password" name="sPassword2" onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white'"  onKeyPress='return tabuladorText(this.form,this,event);'></td>
		</tr>
		<tfoot>
		<tr>
		<td colspan=2 bgcolor="blue"></td>		
		</tr>

		<tr>
			<td colspan="2"><center><input type="button" value="Aceptar" onClick="comparaPass();"></center></td>
		</tr>
		</tfoot>


	</table>
</form>
</center>
</body>
</html>