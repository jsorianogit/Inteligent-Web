<?php
require("../Modulos/include/mysql.inc.php");
if(!isset($link))
{
	$link = mysql_connect($Servidor, $Usuario,$Clave);
	mysql_select_db($BaseDatos, $link);
	if(mysql_error())
	  {
			  echo mysql_error();
	  }
}
$dbhost=$Servidor;
if($dbhost=="127.0.0.1" or $dbhost=="localhost")
{
  $ipTmp=$dbhost;
  $ip = $HTTP_SERVER_VARS['SERVER_ADDR'];
  /*echo "ip: ".$ip."<br>";
  $nombredeip= gethostbyaddr($ip);
  echo $nombredeip."<br>";*/
  $dbhost=$ip;
}
if($dbhost=="")
 $dbhost="localhost";
 
?>
