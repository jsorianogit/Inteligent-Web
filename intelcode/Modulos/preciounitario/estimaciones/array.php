<?php
$fila = 0;
$a�os[$fila]['fila']=1;
$a�os[$fila]['divFila']=1;
$a�os[$fila]['TamDivFila']=3;
$a�os[$fila]['A�oDivFila']=2006;
$a�os[$fila+1]['fila']=1;
$a�os[$fila+1]['divFila']=2;
$a�os[$fila+1]['TamDivFila']=6;
$a�os[$fila+1]['A�oDivFila']=2007;


for($n=0;$n<count($a�os);$n++){
	echo "<br><br>";
	echo "<br>Fila: ".$a�os[$n]['fila'];
	echo "<br>Numero de Divicion: ".$a�os[$n]['divFila'];
	echo "<br>Tama�o de Division: ".$a�os[$n]['TamDivFila'];
	echo "<br>A�o de Division: ".$a�os[$n]['A�oDivFila'];
}
?>