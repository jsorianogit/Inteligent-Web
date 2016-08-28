<?php
session_start();
//require ("../../../include/mysql.inc.php");
//Obtener las variables POST del formulario
require ("../../../include/formulario.inc.php");//dIdFecha
if(isset($_POST['dIdFecha']))
   $dIdFecha = $_POST['dIdFecha'];
if(isset($_POST['sFirmante1']))
   $sFirmante1 = $_POST['sFirmante1'];
if(isset($_POST['sFirmante2']))
   $sFirmante2 = $_POST['sFirmante2'];
if(isset($_POST['sFirmante3']))
   $sFirmante3 = $_POST['sFirmante3'];
if(isset($_POST['sFirmante4']))
   $sFirmante4 = $_POST['sFirmante4'];
if(isset($_POST['sFirmante5']))
   $sFirmante5 = $_POST['sFirmante5'];
if(isset($_POST['sFirmante6']))
   $sFirmante6 = $_POST['sFirmante6'];
if(isset($_POST['sFirmante7']))
   $sFirmante7 = $_POST['sFirmante7'];
if(isset($_POST['sFirmante8']))
   $sFirmante8 = $_POST['sFirmante8'];
if(isset($_POST['sFirmante9']))
   $sFirmante9 = $_POST['sFirmante9'];
if(isset($_POST['sFirmante10']))
   $sFirmante10 = $_POST['sFirmante10'];
if(isset($_POST['sPuesto1']))
   $sPuesto1 = $_POST['sPuesto1'];
if(isset($_POST['sPuesto2']))
   $sPuesto2 = $_POST['sPuesto2'];
if(isset($_POST['sPuesto3']))
   $sPuesto3 = $_POST['sPuesto3'];
if(isset($_POST['sPuesto4']))
   $sPuesto4 = $_POST['sPuesto4'];
if(isset($_POST['sPuesto5']))
   $sPuesto5 = $_POST['sPuesto5'];
if(isset($_POST['sPuesto6']))
   $sPuesto6 = $_POST['sPuesto6'];
if(isset($_POST['sPuesto7']))
   $sPuesto7 = $_POST['sPuesto7'];
if(isset($_POST['sPuesto8']))
   $sPuesto8 = $_POST['sPuesto8'];
if(isset($_POST['sPuesto9']))
   $sPuesto9 = $_POST['sPuesto9'];
if(isset($_POST['sPuesto10']))
   $sPuesto10 = $_POST['sPuesto10'];

if($_SESSION['orden']==""){
   mensaje("Debe seleccionar un numero de orden !!");
   location("mostrar.php");
   exit();
}
 $sql = "INSERT INTO
      firmas (sContrato,dIdFecha,sNumeroOrden,sFirmante1,sFirmante2,sFirmante3,sFirmante4,sFirmante5,sFirmante6,sFirmante7,sFirmante8,sFirmante9,sFirmante10,sPuesto1,sPuesto2,sPuesto3,sPuesto4,sPuesto5,sPuesto6,sPuesto7,sPuesto8,sPuesto9,sPuesto10)
      VALUES ('$sContrato','$dIdFecha','".$_SESSION['orden']."','$sFirmante1','$sFirmante2','$sFirmante3','$sFirmante4','$sFirmante5','$sFirmante6','$sFirmante7','$sFirmante8','$sFirmante9','$sFirmante10','$sPuesto1','$sPuesto2','$sPuesto3','$sPuesto4','$sPuesto5','$sPuesto6','$sPuesto7','$sPuesto8','$sPuesto9','$sPuesto10')";
      mysql_query($sql);
      if(mysql_error())
         mensaje(mysql_error());
   location("mostrar.php");
?>
