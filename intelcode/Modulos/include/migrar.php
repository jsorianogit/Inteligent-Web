<?php
/*
Implementacion
   hace uso de la clase migrar, para transferir informacion entre bases de datos
   identicas
*/
require("migrar.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
set_time_limit(0); 
//Definir que base de datos tiene la informacion
$dbFuente ="inteligent";
//Definir donde se alojara la informacion obtenida
$dbDestino ="ictradeco";
//iniciar la transferencia
$vmigrar = new migrar();
$vmigrar->bases($dbFuente,$dbDestino);
$vmigrar->ejecutar();
mysql_close();
?>