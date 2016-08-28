<?php
include("../migrar.inc.php")       ;
$sContrato='428237826';
$dir =  getcwd();
$dir = str_replace("\\","/",$dir);

mysql_connect("127.0.0.1","root","danae");
mysql_select_db("intelcode");
mysql_query("source insert.sql");

if(mysql_error())
   echo mysql_error();
?>
