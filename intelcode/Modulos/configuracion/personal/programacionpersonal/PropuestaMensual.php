<?php session_start();?>
<html lang="es" xml:lang="es">
<head>
<?php
	echo $estilo="<LINK REL='stylesheet' TYPE='text/css' HREF='../../../estilos/estilo1.css'>";
	require ("../../../include/mysql.inc.php");
?>
<title>Calagos de Tipo de Embarcación</title>
<style type='text/css'>@import '../../../estilos/estilo1.css';</style>
<script  language="javascript" SRC="../../../include/funcionesGen.js"></script>
<script  language="javascript" SRC="funciones.js"></script>
<script  language="javascript" SRC="funciones.js"></script>
<script  language="javascript" SRC="acc_calendar2/acc_calendar.js"></script>
<script>
function Campospropuesta(){
		var cadena;
		var anyomes;
		var anyo;
		var mes;
    if (document.propuesta.anyo.value=="")	
    {
     	alert("Falta la el Mes y Año");
     	document.propuesta.anyo.focus();
    }
	else if (document.propuesta.dCantidad.value=="") 		
	{
     	alert("Falta la cantidad");
    	document.propuesta.dCantidad.focus();
	}
	else
	{
		cadena=document.propuesta.anyo.value;
		anyomes=cadena.split("/");
		anyo=anyomes[0];
		mes=anyomes[1];
		
		if(anyomes.length!=2)	
		 	alert("Fecha Incorrecta")	;
		else if(anyo.length != 4 || mes.length != 2)
		 	alert("Fecha Incorrecta")	;
		else if(mes <1 || mes >12)
		 	alert("Mes Incorrecto")	;
		else if(anyo <1000)
		 	alert("Año Incorrecto")	;
		else
		{
        
        if (Enviar = confirm("Si realmente desea continuar, acepte")){
        	 document.propuesta.submit();
        	 document.close();
        }
      }
	}
		
}
</script>
</head>
<body>
<center>
<?php
function error($numError,$desError){
	echo "<script language=javaScript>alert(\"Error: $numError-$desError.\")</script>";
}
if (!isset($_POST['anyo']) and !isset($_POST['dCantidad']))
{
?>
<form name="propuesta" action="PropuestaMensual.php"  method="POST"> <!--action="MostrarEmbarcaciones.php-->
	<table border=1  ><!--class='enhancedtablecolouredrow'-->
	<caption>Propuesta Mensual</caption>
	<thead>
	 <tr><td colspan="4" nowrap="nowrap"><center>Propuesta Mensual</center></td></tr>
	 </thead>
	 <tbody>
	 <tr><td>Año y Mes </td><td>
	 <?php
	         /*	echo "
					\n<label for='anyo'><input class='fecha rang100' id='anyo' type='text' size='12' value='".date('Y/m')."' onKeyPress='return solonumeros(this.form,this,event);' onfocus=\"style.backgroundColor='$ColorTextBox'\" onblur=\"style.backgroundColor='white'\" maxlength='12' name='anyo'></label>";*/
	 ?>
 <input type="text" name="anyo" value="<?php echo date('Y/m')?>" maxlength=8 size=8  onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';"  onblur="style.backgroundColor='white';" onKeyup="tab(this.form,this,event);">(p.e. 2005/02)
 
 </td></tr>
	 <tr>
   <td>Cantidad</td><td><input type="text" name="dCantidad" value="<?php echo $dCantidad?>" maxlength=13 size=13	onKeyPress="return solonumeros(this.form,this,event);"  onfocus="style.backgroundColor='<?php echo $ColorTextBox ?>';" onblur="style.backgroundColor='white';"></td></tr>

 	 </tbody>
	 <tfoot>
	<tr>
		<td colspan=4 >
			<center>
				<input type="button" name="Aceptar" value="Aceptar" onclick="Campospropuesta();"><!--return Enviar(this.form)-->
				<input type="button" name="cancela" value="Cerrar" onclick="window.close();">
			</center>
		</td>
	</tr>
	 </tfoot>
	</table>
</form>
<?php
}
else
{
	if(isset($_SESSION['ssContrato']))
		$sContrato=$_SESSION['ssContrato'];
	$_POST['anyo'] ;
	$_POST['dCantidad'];
	$cadena=explode("/",$_POST['anyo']);
	$anyo=$cadena[0];
	$mes=$cadena[1];
	$mesActual=$mes+1;
	$ultimo=mktime(0,0,0,$mesActual,0,$anyo);
	$ultimodia=strftime("%d",$ultimo);
	for($i=1;$i<=$ultimodia;$i++)
	{
		if($i<10)
			$dIdFecha=$_POST['anyo']."/0".$i;
		else
			$dIdFecha=$_POST['anyo']."/".$i;
			
		$Existe="SELECT * FROM personalprogramado WHERE sContrato='$sContrato' AND dIdFecha='$dIdFecha'";
   	$resultExiste=mysql_query($Existe,$link);
		if($row=mysql_fetch_row($resultExiste))
		{
			$actualiza="UPDATE personalprogramado SET dCantidad='".$_POST['dCantidad']."' WHERE sContrato='$sContrato' AND dIdFecha='$dIdFecha'";
			mysql_query($actualiza,$link);
			if (mysql_error())
				error(mysql_errno(),mysql_error());
	
		}
		else
		{
			$inserta="INSERT INTO personalprogramado VALUES ('$sContrato','$dIdFecha','".$_POST['dCantidad']."')	";
			mysql_query($inserta,$link);
				if (mysql_error())
					error(mysql_errno(),mysql_error());
			}
	}
?>
<script language="javascript">
opener.document.location="index.php";
window.close();
</script>
<?php
}
?>
</center>
</body>
</html>