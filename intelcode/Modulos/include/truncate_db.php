<?php

/**
 * @author LulaPresidente
 * @copyright 2007
 */

$enlace=mysql_connect("127.0.0.1","root","danae");
mysql_select_db("ictradeco",$enlace);
$result = mysql_query("show tables");
while($row = mysql_fetch_array($result)){
	mysql_query("truncate $row[0]");
}

?>