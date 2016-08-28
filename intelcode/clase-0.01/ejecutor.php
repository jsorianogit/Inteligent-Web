<?php
$Operacion="a";
$espacios="&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; ";
if($_SESSION['sOperacion']=="Insertar")
{
	$numelementos=count( $_POST );
	$contador=0;
	$sql="INSERT INTO tabla1 VALUES(\n";
	foreach($_POST as $indice => $valor){
		//echo "\n<br>$indice = $valor";
		if(++$contador==$numelementos)
			$sql .= "\t'$valor'\n";
		else
			$sql .= "\t'$valor',\n";
	}
	$sql.=")";
}
else if($_SESSION['sOperacion']=="Modificar")
{
	$numelementos=count( $_POST );
	$contador=0;
	$sql="UPDATE tabla1 SET \n";
	foreach($_POST as $indice => $valor){
		//echo "\n<br>$indice = $valor";
		if(++$contador==$numelementos)
			$sql .= "\t$indice='$valor'\n";
		else
			$sql .= "\t$indice='$valor',\n";
	}
	$sql.=" WHERE sContrato='$sContrato'";
	mysql_query($sql);
}
else if($Operacion=="b")
{
	$numelementos=count( $_POST );
	$contador=0;
	$sql="DELETE FROM  tabla1 WHERE \n";
	foreach($_POST as $indice => $valor){
		//echo "\n<br>$indice = $valor";
		if(++$contador==$numelementos)
			$sql .= "\t$indice='$valor'\n";
		else
			$sql .= "\t$indice='$valor' AND \n";
	}
	mysql_query($sql);
}
$sqlhtml=str_replace("\n","<br>",$sql);
$sqlhtml=str_replace("\t",$espacios,$sqlhtml);
echo $sqlhtml;
?>
<center>
<input type=button onclick="location.href='formluario.php'" value="regresar">
</center>