<?php
session_start();
//session_cache_limiter("must-revalidate");  
/*echo "Depurando modulo ...." ;
foreach ($_SESSION as $valor){
	echo $valor."<br>";
}
exit();
require ("../../../include/mysql.inc.php");*/
require ("../../../include/formulario.inc.php");
?>
<html>
<head>


<?php
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
   

if(isset($_REQUEST['sNumeroOrden']))
   $orden = $_SESSION['orden'] = $_REQUEST['sNumeroOrden'] ;
   
if(isset($_REQUEST['fecha']) AND $_REQUEST['fecha']!=""){
   $fecha=$_REQUEST['fecha'];
   $_SESSION['fecha']=$fecha;
   
} 
if(isset($_REQUEST['dIdFecha'])){
   $fecha =$_REQUEST['dIdFecha'];
}
else if(isset($_SESSION['fecha'])){
   $fecha =$_SESSION['fecha'];
}

if(isset($_REQUEST['Operacion']) and $_REQUEST['Operacion']=="m"){
   $sql = "SELECT * FROM firmas WHERE sContrato='$sContrato' AND sNumeroOrden='$orden' AND dIdFecha='$fecha' ;";
   $result = mysql_query($sql);
   if($row=mysql_fetch_array($result)){
      $fecha=  $dIdFecha =$_SESSION['dIdFecha ']= $row['dIdFecha'];
      $sFirmante1 = $row['sFirmante1'];
      $sFirmante2 = $row['sFirmante2'];
      $sFirmante3 = $row['sFirmante3'];
      $sFirmante4 = $row['sFirmante4'];
      $sFirmante5 = $row['sFirmante5'];
      $sFirmante6 = $row['sFirmante6'];
      $sFirmante7 = $row['sFirmante7'];
      $sFirmante8 = $row['sFirmante8'];
      $sFirmante9 = $row['sFirmante9'];
      $sFirmante10 = $row['sFirmante10'];
      $sPuesto1 = $row['sPuesto1'];
      $sPuesto2 = $row['sPuesto2'];
      $sPuesto3 = $row['sPuesto3'];
      $sPuesto4 = $row['sPuesto4'];
      $sPuesto5 = $row['sPuesto5'];
      $sPuesto6 = $row['sPuesto6'];
      $sPuesto7 = $row['sPuesto7'];
      $sPuesto8 = $row['sPuesto8'];
      $sPuesto9 = $row['sPuesto9'];
      $sPuesto10 = $row['sPuesto10'];
   }
}
else  if(isset($_REQUEST['Operacion']) and $_REQUEST['Operacion']=="a"){
   $sql = "SELECT * FROM firmas WHERE sContrato='$sContrato' AND sNumeroOrden='$orden' AND dIdFecha<='$fecha' Order By dIdFecha DESC";
   $result = mysql_query($sql);
   if($row=mysql_fetch_array($result)){
      //$fecha=  $dIdFecha =$_SESSION['dIdFecha ']= $row['dIdFecha'];
      $sFirmante1 = $row['sFirmante1'];
      $sFirmante2 = $row['sFirmante2'];
      $sFirmante3 = $row['sFirmante3'];
      $sFirmante4 = $row['sFirmante4'];
      $sFirmante5 = $row['sFirmante5'];
      $sFirmante6 = $row['sFirmante6'];
      $sFirmante7 = $row['sFirmante7'];
      $sFirmante8 = $row['sFirmante8'];
      $sFirmante9 = $row['sFirmante9'];
      $sFirmante10 = $row['sFirmante10'];
      $sPuesto1 = $row['sPuesto1'];
      $sPuesto2 = $row['sPuesto2'];
      $sPuesto3 = $row['sPuesto3'];
      $sPuesto4 = $row['sPuesto4'];
      $sPuesto5 = $row['sPuesto5'];
      $sPuesto6 = $row['sPuesto6'];
      $sPuesto7 = $row['sPuesto7'];
      $sPuesto8 = $row['sPuesto8'];
      $sPuesto9 = $row['sPuesto9'];
      $sPuesto10 = $row['sPuesto10'];
   }
}
?>
</head>
<body>
<font size="2">
<center>
<form name="firmas" action="<?php echo ($_REQUEST['Operacion']=='m') ?'modificar.php':'insertar.php';  ?>" method="post" >
<!-- Firmantes de la Compañia -->
<table>
<tr>
   <td colspan=4 bgcolor=#CCCEEE>
      <center>
      <font color=#000055 size="3">
         <code>Firmantes de la Compañia</code>
      </font>
      </center>
   </td>
</tr>
<tr>
   <td>Fecha</td>
   <td colspan=3>
   
   <label for='dIdFecha'>
      
<input class='fecha rang100' id='dIdFecha' type='text' size='' value="<?php echo ($fecha=='')?date('Y/m/d'):$fecha; ?>"
                  onKeyPress='return solonumeros(this.form,this,event);'   
                  onfocus="style.backgroundColor='#FFCC99'"
                  onblur="style.backgroundColor='white'"
                  maxlength='10'  name='dIdFecha' 
                  >
               
</label>

</tr>
<tr>
   <td>Nombre del Representante de la Compañia</td>
   <td><input type="text" name="sFirmante1" value="<?php echo $sFirmante1; ?>" size="60" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
   <td>Puesto</td>
   <td><input type="text" name="sPuesto1" value="<?php echo $sPuesto1; ?>" size="70" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
</tr>
<tr>
   <td>Nombre Supervisor de la Compañia de Patio</td>
   <td><input type="text" name="sFirmante7" value="<?php echo $sFirmante7; ?>" size="60" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
   <td>Puesto</td>
   <td><input type="text" name="sPuesto7" value="<?php echo $sPuesto7; ?>" size="70" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
</tr>
<tr>
   <td>Nombre del Representante Tecnico</td>
   <td><input type="text" name="sFirmante9" value="<?php echo $sFirmante9; ?>" size="60" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
   <td>Puesto</td>
   <td><input type="text" name="sPuesto9" value="<?php echo $sPuesto9; ?>" size="70" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
</tr>
<tr>
   <td>Nombre de la Subcontrista</td>
   <td><input type="text" name="sFirmante10" value="<?php echo $sFirmante10; ?>" size="60" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
   <td>Puesto</td>
   <td><input type="text" name="sPuesto10" value="<?php echo $sPuesto10; ?>" size="70" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
</tr>
</table>
<!-- firmantes de la dependencia -->
<table >
<tr>
   <td colspan=4 bgcolor=#CCCEEE>
      <center>
      <font color=#000055 size="3">
         <code>Firmantes de la dependencia</code>
      </font>
      </center>
   </td>
</tr>
<tr>
   <td>Revisa Reportes Diarios / Estimaciones</td>
   <td><input type="text" name="sFirmante2" value="<?php echo $sFirmante2; ?>" size="60" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
   <td>Puesto</td>
   <td><input type="text" name="sPuesto2" value="<?php echo $sPuesto2; ?>" size="70" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
</tr>
<tr>
   <td>Revisa Generadores de Obra</td>
   <td><input type="text" name="sFirmante3" value="<?php echo $sFirmante3; ?>" size="60" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
   <td>Puesto</td>
   <td><input type="text" name="sPuesto3" value="<?php echo $sPuesto3; ?>" size="70" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
</tr>
<tr>
   <td>Revisa Resumenes de Generadores</td>
   <td><input type="text" name="sFirmante4" value="<?php echo $sFirmante4; ?>" size="60" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
   <td>Puesto</td>
   <td><input type="text" name="sPuesto4" value="<?php echo $sPuesto4; ?>" size="70" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
</tr>
<tr>
   <td>Autoriza Reportes Diarios/Generadores/Estimaciones</td>
   <td><input type="text" name="sFirmante5" value="<?php echo $sFirmante5; ?>" size="60" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
   <td>Puesto</td>
   <td><input type="text" name="sPuesto5" value="<?php echo $sPuesto5; ?>" size="70" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
</tr>
<tr>
   <td>Residente de Obra</td>
   <td><input type="text" name="sFirmante6" value="<?php echo $sFirmante6; ?>" size="60" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
   <td>Puesto</td>
   <td><input type="text" name="sPuesto6" value="<?php echo $sPuesto6; ?>" size="70" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
</tr>
<tr>
   <td>Puesto Sub. Obra Patio</td>
   <td><input type="text" name="sFirmante8" value="<?php echo $sFirmante8; ?>" size="60" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
   <td>Puesto</td>
   <td><input type="text" name="sPuesto8" value="<?php echo $sPuesto8; ?>" size="70" onKeyPress='return tabuladorText(this.form,this,event);' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white';this.value = this.value.toUpperCase();"></td>
</tr>
</table>
<!-- botones de acciones -->
<table>
<tr>
<td >
<input type="submit" value="Aceptar" />
</td>
<td>
<input type="button" value="Cancelar" onClick="document.location='mostrar.php'"/>
<td>
</tr>
</table>
</form>
</center>
</font>
<SCRIPT>
document.firmas.sFirmante1.select();
document.firmas.sFirmante1.focus();
</SCRIPT>
</body>
</html>
