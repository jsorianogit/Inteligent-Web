<?php 
session_start();
   $anyo = $_POST['anyo'];
   $mes = $_POST['mes'];
   $odenar= $_POST['ordenar'];
   $info = $_POST['info'];
?>
<head>
<?php
require ("../../../include/formulario.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
</head>
<html>
<body>
<html>
<head>
<body>
<form name ="form1" action="reporte.php" method ="post" target="derecho">
Mes: 
<select name="mes" >
<?php
switch ($mes){
    case(1):$ene = "selected";break;
    case(2):$feb = "selected";break;
    case(3):$mar = "selected";break;
    case(4):$abr = "selected";break;
    case(5):$may = "selected";break;
    case(6):$jun = "selected";break;
    case(7):$jul= "selected";break;
    case(8):$ago = "selected";break;
    case(9):$sep = "selected";break;
    case(10):$oct = "selected";break;
    case(11):$nov = "selected";break;
    case(12):$dic = "selected";break;
}
?>
   <option value = '1' <?php echo $ene ?> >ENERO</option>
   <option value = '2' <?php echo $feb ?>>FEBRERO</option>
   <option value = '3' <?php echo $mar ?>>MARZO</option>
   <option value = '4' <?php echo $abr ?>>ABRIL</option>
   <option value = '5' <?php echo $may ?> >MAYO</option>
   <option value = '6' <?php echo $jun ?>>JUNIO</option>
   <option value = '7' <?php echo $jul ?>>JULIO</option>
   <option value = '8' <?php echo $ago ?>>AGOSTO</option>
   <option value = '9' <?php echo $sep ?>>SEPTIEMBRE</option>
   <option value = '10' <?php echo $oct ?>>OCTUBRE</option>
   <option value = '11' <?php echo $nov ?>>NOVIEMBRE</option>
   <option value = '12' <?php echo $dic ?>>DICIEMBRE</option>
</select><br><br>
año:
<select name="anyo">
   <?php 
      $anio = date('Y');
      $menosdiez = $anio - 10;
      $masdiez = $anio + 10;
      for ($i = $menosdiez ; $i < $masdiez ; $i++){
            if(isset($anyo))
               $sel = ($anyo == $i ) ? "selected":"";
            else
               $sel = ($anio == $i ) ? "selected":"";
          print ("<option $sel>$i</option>");
      }
      ?>
</select><br><br>
Agrupar la Informacion por contrato? :
<?php
switch ($ordenar){
    case('Si'):$si = "selected";break;
    case('No'):$no = "selected";break;
}
?>
<select name="ordenar">
   <option value="Si" <?php echo $si ?> >Si</option>
   <option value="No" <?php echo $no ?> >no</option>
</select><br>
Informacion Contenida en :
<?php
switch ($info){
    case('volumenes'):$volumenes = "selected";break;
    case('costos'):$costos = "selected";break;
}
?>
<select name="info">
   <option value="volumenes" <?php echo $volumenes ?>>Volumenes</option>
   <option value="costos" <?php	 echo $costos ?>>Importes</option>
</select><br>
<input type="submit" value="Aceptar" />
</form>
   
</body>
</html>