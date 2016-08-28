<?php
require ("../mysql.inc.php");
$tables = "show tables ; ";
$result = mysql_query($tables);
while($row = mysql_fetch_array($result)){
	$describe = "describe $row[0]";
	$result2 = mysql_query($describe);
	while($row2 = mysql_fetch_array($result2)){
		if(strpos($row2[0],"talacion")!==false){
			echo "<br>$row[0].$row2[0]";
		}
	}
}
?>