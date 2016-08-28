<?php
   session_start();
?>
<html>
<head>
<?php
require ("../../../include/mysql.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
</head>
<body>
<center><BR><font color="blue"><h3>Retenciones y Penas Convencionales</h3></font></center>
<font size="1">
<form name="contrato" action="menu.php" method="post">
<font size="1">
Contrato:<br>  
<select name='Contrato' onChange="document.contrato.submit();">
<?php
if(isset($_POST['Contrato']))
   $_SESSION['Contrato']=$_POST['Contrato'];
else
   $_SESSION['Contrato']=$sContrato;
$sql ="select sContrato from contratos";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
   $seleccionar = ($_SESSION['Contrato']==$row[0])?"selected":"";
   echo "\n<option $seleccionar>$row[0]</option>";
}
?>
</select>
</font>
</form>
<form name="Fecha" action="morepage.php" method ="post" target="derecho">

Convenio:
<select name='sIdConvenio'>
<?php
$sql ="select sIdConvenio,sDescripcion from convenios Where sContrato ='".$_SESSION['Contrato']."'";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
   echo "<option value=\"$row[0]\">$row[1]</option>";
}
?>
</select>
<center><BR><font size="1" color="blue"><h5>Fecha Final</h5></font></center>
año: 
<select name='anyo'>
<?php
   for($i=date('Y')-100;$i<=date('Y')+100;$i++){
      $seleccionar = date('Y')==$i ?"selected":"";
      echo "<option $seleccionar>$i</option>";
   }
?>
</select>
<br>Mes: 
<?php
$Mes = date('m');
switch($Mes){
   case(01):
      $enero ="selected";
      break;
   case(02):
      $febrero ="selected";
      break;
   case(03):
      $marzo ="selected";
      break;
   case(04):
      $abril ="selected";
      break;
   case(05):
      $mayo ="selected";
      break;
   case(06):
      $junio ="selected";
      break;
   case(07):
      $julio ="selected";
      break;
   case(08):
      $agosto ="selected";
      break;
   case(08):
      $septiembre ="selected";
      break;
   case(10):
      $octubre ="selected";
      break;
   case(11):
      $noviembre ="selected";
      break;
   case(12):
      $diciembre ="selected";
      break;

}
?>
<select name='mes'>
   <option VALUE="01" <?php echo $enero ?> >ENERO</option>
   <option VALUE="02" <?php echo $febrero ?>>FEBRERO</option>
   <option VALUE="03" <?php echo $marzo ?>>MARZO</option>
   <option VALUE="04" <?php echo $abril ?>>ABRIL</option>
   <option VALUE="05" <?php echo $mayo ?>>MAYO</option>
   <option VALUE="06" <?php echo $junio ?>>JUNIO</option>
   <option VALUE="07" <?php echo $julio ?>>JULIO</option>
   <option VALUE="08" <?php echo $agosto ?>>AGOSTO</option>
   <option VALUE="09" <?php echo $septiembre ?>>SEPTIEMBRE</option>
   <option VALUE="10" <?php echo $octubre ?>>OCTUBRE</option>
   <option VALUE="12" <?php echo $noviembre ?>>NOVIEMBRE</option>
   <option VALUE="13" <?php echo $diciembre ?>>DICIEMBRE</option>
</select>
<center><font color="blue"><h5>Configuracion de Hoja</h5></font></center>
Tamaño de Papel:<br>
<select name='sizepapper'>
   <option>A3</option>
   <option>A4</option>
   <option  selected  >Letter</option>
   <option>Legal</option>
</select><BR>
Enviar a:<br>
<select name='tipoDocumento'>
   <option value='pdf' selected>Documento PDF</option>
   <option value='excel'>Documento De Excel</option>
</select>
<center>
<input type="submit" value="Aceptar" />
</center>
</form>
</font>
</body>
</html>
