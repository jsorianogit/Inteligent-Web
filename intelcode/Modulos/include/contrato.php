<?php
require("contrato.inc.php");
$tablas = array ("actividadesxanexo","actividadesxorden","avancesglobales",
"convenios","anexosmensuales","distribuciondeanexo","distribuciondeactividades",
"avancesxactividad","avancesglobalesxorden");
$contrato = new contrato();
$contrato->nuevaexportacion($sContrato,$tablas,false);
$contrato->exportaContrato();

?>