<?php
set_time_limit(0);
include("../migrar.inc.php")       ;
//mysql_connect("intel-code.com.mx","root","danae");
mysql_connect("intel-code.com.mx","root","danae");
mysql_select_db("intelcode");
mysql_query("begin");
$sContrato='428237814';

function crearSql($table,$field){
   global $sContrato;
   $sql = "select * from $table where sContrato='$sContrato'";
   $rs = mysql_query($sql);
   $fp = fopen("insert.sql","a+");
   while($row = mysql_fetch_array($rs)){
      $insert=  "insert into $table\n (";
      $values="";
      for($i=0; $i<mysql_num_fields($rs);$i++){
         if($i==(mysql_num_fields($rs)-1)){
            $insert .= mysql_field_name($rs,$i).")\n";
//            $values.="'$row[$i]');\n";
            if(mysql_field_name($rs,$i)=="bImagen"){
               $values.=migrar::ascii2hex($row[$i]).")\n";
            }
            else
               $values.="'$row[$i]');\n";
         }
         else{
            $insert .= mysql_field_name($rs,$i).",";
            if(mysql_field_name($rs,$i)=="bImagen"){
               $values.=migrar::ascii2hex($row[$i]).",";
            }
            else
               $values.="'$row[$i]',";
         }
      }
      $insert.=" values ($values";
      fwrite($fp,"$insert\n");

   }
   fclose($fp);
//   header("Location:insert.sql");
}

$sqlTable = "show tables";
$rsTable = mysql_query($sqlTable);
while($rowTable = mysql_fetch_array($rsTable)){
   $encontrato = false;
   if($rowTable[0]!=""){
      $sqlField = "select * from $rowTable[0] limit 1";
      $rsField = mysql_query($sqlField);
      while($rowField = mysql_fetch_array($rsField)){
         for($field=0; $field<mysql_num_fields($rsField);$field++){
            $fieldName = mysql_field_name($rsField,$field);
            mysql_field_name($rsField,1);
            if($fieldName=="sContrato"){
               crearSql($rowTable[0],$fieldName);
            }
         }
      }
   }
}

mysql_close();
?>
