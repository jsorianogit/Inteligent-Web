<?php
$fila = 0;
$años[$fila]['fila']=1;
$años[$fila]['divFila']=1;
$años[$fila]['TamDivFila']=3;
$años[$fila]['AñoDivFila']=2006;
$años[$fila+1]['fila']=1;
$años[$fila+1]['divFila']=2;
$años[$fila+1]['TamDivFila']=6;
$años[$fila+1]['AñoDivFila']=2007;


for($n=0;$n<count($años);$n++){
	echo "<br><br>";
	echo "<br>Fila: ".$años[$n]['fila'];
	echo "<br>Numero de Divicion: ".$años[$n]['divFila'];
	echo "<br>Tamaño de Division: ".$años[$n]['TamDivFila'];
	echo "<br>Año de Division: ".$años[$n]['AñoDivFila'];
}
?>