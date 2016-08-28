<?php
require ("../../include/migrar.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
//solo declarado para hacer transacciones
$vtrans = new migrar();
///// Obtener el archivo////////////////////////////////////////////////////////////////
/* if (is_uploaded_file($HTTP_POST_FILES['excelfile']['tmp_name'])) {
      copy($HTTP_POST_FILES['excelfile']['tmp_name'], $HTTP_POST_FILES['excelfile']['name']);
      $subio = true; 
*/
/*
if(file_exists($excelfile_name))
   unlink($excelfile_name);
   */
$extension = explode(".",$HTTP_POST_FILES['excelfile']['name']);
	$num = count($extension)-1;
	if($extension[$num] == "xls"){
     	if(!copy($HTTP_POST_FILES['excelfile']['tmp_name'], $HTTP_POST_FILES['excelfile']['name'])){ //upload_max_filesize = 10M
  	   	echo "<center><h1><font color=red>error al copiar el archivo</font><br><a href='index.php'>Regresar</a><br></center></h1>";
  	   	exit(0);
     	}
		else
		   echo "<center><h1>archivo subido con exito<br>Cargando Datos de Archivo ...<br></h1><center>";

   }
   else{
		echo "<center><h1><font color=red>el formato de archivo no es valido, solo .xls</font><br><a href='index.php'>Regresar</a><br></center></h1>";
		exit(0);   
	}
	
$excelfile_name = $HTTP_POST_FILES['excelfile']['name'];
////////////////////////////////////////////////////////////////////////////////////////
require_once '../../include/Spreadsheet_Excel_Reader/Excel/reader.php';
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

$data->read($excelfile_name);

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
$descripcion=false;
//iniciar transaccion
$vtrans->initransaccion();
for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) {
   //hasta encontrar una fila vacia
   $rowvacio = true;
   for ($k = 1; $k <= $data->sheets[0]['numCols']; $k++) {
	   if($data->sheets[0]['cells'][$i][$k] != "")$rowvacio = false;
	}
	//Si hay filas vacias salir
	if($rowvacio) break;
	//Si la primera celda del documento no es contrato (Es Comentario), saltarla
	if(!is_numeric($data->sheets[0]['cells'][1][1]) and $descripcion==false){
	 $descripcion=true;
	  continue;
	}
	else if($data->sheets[0]['cells'][1][1]!=$sContrato){
       echo "<br><center><h1><font color=red>Contrato Invalido en Documento xls</font></h1><br><a href='index.php'>Regresar</a><br></center>";
       exit(0);
   }
	//si no hay filas vacias imprimir y guardar en bd
	$sql = "INSERT INTO actividadesxanexo (sContrato,iItemOrden,sNumeroActividad,mDescripcion,sEspecificacion,sMedida,dCantidadAnexo,dPonderado,dCostoMN,dVentaMN,sIdFase,dFechaInicio,dFechaFinal)VALUES(";
   echo "<tr><td>$i</td>";
   for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) {
		echo "<td>".$data->sheets[0]['cells'][$i][$j]."</td>";
		$sql .= "'".$data->sheets[0]['cells'][$i][$j]."',";
		
	}
	$sql .="<";
	$sql = str_replace(",<","",$sql);
	$sql .= ")" ;
	$vtrans->query($sql);
	if($vtrans->mysql_err){
       exit(0);
       $vtrans->destransaccion();
   }
/*	echo "</tr>
         <tr>
            <td colspan =14 width=0%>
               $sql
            </td>
	     </tr>";
*/
}
echo "</table>";
$vtrans->aceptransaccion();
//print_r($data);
//print_r($data->formatRecords);
?>
