<?php
require("../../../fnUtilerias.php");
set_time_limit(0);
mysql_connect("intel-code.com.mx","root","danae");
mysql_select_db("intelcode");
mysql_query("begin");
$sContrato='428237843';

function remplazarsWbs($table,$field){
   global $sContrato;
   $sql = "select * from $table where sContrato='$sContrato'";
   $rs = mysql_query($sql);
   while($row = mysql_fetch_array($rs)){
      $condicion = "";
      for($i=0; $i<mysql_num_fields($rs);$i++){
         if($condicion==""){
            $condicion = mysql_field_name($rs,$i)." = '".$row[$i]."'";
         }
         else{
            $condicion .=" and ".mysql_field_name($rs,$i)." = '".$row[$i]."'";
         }
      }
      $newValue = deleteAlt255($row["$field"]);
      echo "<br><br>".$sqlUpdate = "update $table set $field = '$newValue' WHERE $condicion";
      //mysql_query($sqlUpdate);
      if(mysql_error()){
		print("Ocurrio un error");mysql_query("roolback");exit();
	}
      print("\n<br>Actualzando $table");
   }
}

$sqlTable = "show tables";
$rsTable = mysql_query($sqlTable);
while($rowTable = mysql_fetch_array($rsTable)){
      echo "<br><br>";
   $encontrato = false;
   if($rowTable[0]!=""){
      $sqlField = "select * from $rowTable[0] limit 1";
      $rsField = mysql_query($sqlField);
      while($rowField = mysql_fetch_array($rsField)){
         for($field=0; $field<mysql_num_fields($rsField);$field++){
            $fieldName = mysql_field_name($rsField,$field);
            mysql_field_name($rsField,1);
            if($fieldName=="sNumeroActividad"){
               remplazarsWbs($rowTable[0],$fieldName);
            }
         }
      }
   }
}

mysql_query("commit");
mysql_close();
?>
