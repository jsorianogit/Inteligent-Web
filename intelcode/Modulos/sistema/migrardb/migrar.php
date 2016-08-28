<?php
/*
Implementacion
   hace uso de la clase migrar, para transferir informacion entre bases de datos
   identicas
*/
require("../../include/migrar.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
set_time_limit(0); 
//Definir que base de datos tiene la informacion
$dbFuente =$_POST['dbFuente'];
$dbHostFuente = $_POST['servidorf'];
$dbUsuarioFuente = $_POST['usuariof'];
$dbContrasenaFuente =$_POST['passwordf'];
//Definir donde se alojara la informacion obtenida
$dbDestino =$_POST['dbDestino'];
$dbHostDestino = $_POST['servidord'];
$dbUsuarioDestino = $_POST['usuariod'];
$dbContrasenaDestino =$_POST['passwordd'];
//iniciar la transferencia
$vmigrar = new migrar();
$vmigrar->bases($dbFuente,$dbHostFuente,$dbUsuarioFuente,$dbContrasenaFuente,$dbDestino,$dbHostDestino,$dbUsuarioDestino ,$dbContrasenaDestino );
$vmigrar->ejecutar();
mysql_close();
?>