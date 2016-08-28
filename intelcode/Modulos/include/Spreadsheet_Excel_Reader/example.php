<?php


require_once 'Excel/reader.php';
require("../migrar.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
//set_time_limit(0); 
// ExcelFile($filename, $encoding);
$data = new Spreadsheet_Excel_Reader();


// Set output Encoding.
$data->setOutputEncoding('CP1251');

/***
* if you want you can change 'iconv' to mb_convert_encoding:
* $data->setUTFEncoder('mb');
*
**/

/***
* By default rows & cols indeces start with 1
* For change initial index use:
* $data->setRowColOffset(0);
*
**/



/***
*  Some function for formatting output.
* $data->setDefaultFormat('%.2f');
* setDefaultFormat - set format for columns with unknown formatting
*
* $data->setColumnFormat(4, '%.3f');
* setColumnFormat - set format for column (apply only to number fields)
*
**/

$data->read('anexoc.xls');

/*


 $data->sheets[0]['numRows'] - count rows
 $data->sheets[0]['numCols'] - count columns
 $data->sheets[0]['cells'][$i][$j] - data from $i-row $j-column

 $data->sheets[0]['cellsInfo'][$i][$j] - extended info about cell
    
    $data->sheets[0]['cellsInfo'][$i][$j]['type'] = "date" | "number" | "unknown"
        if 'type' == "unknown" - use 'raw' value, because  cell contain value with format '0.00';
    $data->sheets[0]['cellsInfo'][$i][$j]['raw'] = value if cell without format 
    $data->sheets[0]['cellsInfo'][$i][$j]['colspan'] 
    $data->sheets[0]['cellsInfo'][$i][$j]['rowspan'] 
*/

error_reporting(E_ALL ^ E_NOTICE);
echo "<table border=2>";
for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
   //hasta encontrar una fila vacia
   $rowvacio = true;
   for ($k = 1; $k <= $data->sheets[0]['numCols']; $k++) {
	   if($data->sheets[0]['cells'][$i][$k] != "")$rowvacio = false;
	}
	if($rowvacio) break;
	//si no hay filas vacias imprimir
   echo "<tr><td>$i</td>";
   for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
		echo "<td>".$data->sheets[0]['cells'][$i][$j]."</td>";
	}
	echo "</tr>";

}
echo "</table>";

//print_r($data);
//print_r($data->formatRecords);
?>
