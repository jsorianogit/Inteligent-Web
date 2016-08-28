<?php
require ("../../../../include/formulario.inc.php");
$sql ="show tables like '%%' ";
$result = mysql_query($sql);
while($row = mysql_fetch_array($result)){
	$sql2 = "describe $row[0]  ;";
	$result2 = mysql_query($sql2);
	echo "<br>$row[0] <br>";
	while($row2 = mysql_fetch_array($result2)){
		
			echo "  $row2[0]  <br>"; 
	}
	echo "<br><br>";
	
}

?>