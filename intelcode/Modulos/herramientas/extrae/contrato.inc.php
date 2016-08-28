<?php

require ("../../include/migrar.inc.php");
require("config.inc.php");
class contrato extends migrar {
   var $cotrato;   //Contrato seleccionado
   var $tablas;   //array de tablas que deben extraerse
   var $db ;      //base de datos sobre la cual se va a rabajar, default la seleccionada en mysql.inc.php
   var $fecha ;
   //constructor por defecto   
   function contrato(){
      global $pathFileSql;
      global $sContrato;
      $this->contrato = $sContrato;
      $this->creaDir($pathFileSql);
   }
   //inicializad variables
   function nuevaexportacion($contrato,$tablas,$BaseDatos,$fecha){
      global $pathFileSql ;
      $this->contrato = $contrato;
      $this->tablas = $tablas;
      $this->db = $BaseDatos ;
      $this->fecha = $fecha ;
      
   }
   //crear el archivo sql para el contrato
   function exportaContrato(){
      global $pathFileSql ;
      if (file_exists("$pathFileSql$this->db.$this->contrato.sql")){
         unlink("$pathFileSql$this->db.$this->contrato.sql");
      }
    $this->exportar($this->tablas);
  }
 //crear el archivo sql para el contrato (todas las tablas)
   function exportaDB(){
      global $pathFileSql ;
      if (file_exists("$this->db.$this->contrato.sql")){
         unlink("$pathFileSql$this->db.$this->contrato.sql");
      }
      $this->campollave[0] ='sContrato';
      $todasTablas=$this->relaciones("dual");
      $this->exportar($todasTablas);
  } 
  function creaDir($pathFileSql){
      // habre un directorio, borra su contenido, despues borra el mismo directorio
      $dir =$pathFileSql;
      if (is_dir($dir)) {
         if ($dh = opendir($dir)) {
            $this->limpiaDir($pathFileSql);
         }
      }
      else
         mkdir($pathFileSql);      
   }
  function limpiaDir($pathFileSql){
      // habre un directorio, borra su contenido, despues borra el mismo directorio
      $dir =$pathFileSql;
      if (is_dir($dir)) {
         if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
               if(filetype($dir.$file)=="file"){
                  unlink($dir.$file);
               }
            }
            closedir($dh);
         }
      }
   }
  //procesa las consultas
  function exportar($tablas,$convenio="|"){
     global $pathFileSql ,$BaseDatos;
      set_time_limit(0); 
      if(file_exists("$pathFileSql$this->db.$this->contrato.sql"))
       	unlink("$pathFileSql$this->db.$this->contrato.sql");
       mysql_select_db($this->db);	
       //$fp = fopen("$pathFileSql$this->db.$this->contrato.sql","a+");
       //fwrite($fp,"USE $this->db ;");
       //fclose($fp);
      foreach($tablas as $index => $tabla){
         if($tabla=="")continue;
         unset($campos);
         $sql = "show fields from $this->db.$tabla";
         $campos = mysql_query($sql);
         $cont = 0;
         unset($camposArray);
         //Crear el select para optener los datos
         while ($row = mysql_fetch_array($campos)){
               $camposArray[$cont]=$row[0];
               $cont++;
         }
         $sql ="SELECT ";
         foreach($camposArray as $nombre){
            $sql .= " $this->db.$tabla.$nombre ,";
            
         }
         $sql.="<";
         $sql=str_replace(",<"," ",$sql);
         $fechaActual = date('Y-m-d');
         $sqlDel = "DELETE ";
         if(strpos($tabla,"reportefotografico")!==false){
            $sql.=" FROM $this->db.$tabla WHERE $this->db.$tabla.sContrato = '$this->contrato'";
            $sqlDel.=" FROM $this->db.$tabla WHERE $this->db.$tabla.sContrato = '$this->contrato' \n";
         }
         else if($convenio=="|"){
	         $sql.=" FROM $this->db.$tabla WHERE $this->db.$tabla.sContrato = '$this->contrato' AND $this->db.$tabla.dIdFecha>='$this->fecha' AND $this->db.$tabla.dIdFecha<='$fechaActual';";
        	   $sqlDel.=" FROM $this->db.$tabla WHERE $this->db.$tabla.sContrato = '$this->contrato' AND $this->db.$tabla.dIdFecha>='$this->fecha' AND $this->db.$tabla.dIdFecha<='$fechaActual'; \n";
	      }
	      else{
	     	   $sql.=" FROM $this->db.$tabla WHERE $this->db.$tabla.sContrato = '$this->contrato' AND $this->db.$tabla.dIdFecha>='$this->fecha' AND $this->db.$tabla.dIdFecha<='$fechaActual';";
	     	   $sqlDel.=" FROM $this->db.$tabla.$tabla WHERE $this->db.$tabla.sContrato = '$this->contrato' AND $this->db.$tabla.dIdFecha>='$this->fecha' AND $this->db.$tabla.dIdFecha<='$fechaActual'; \n";
	     	}
         //print ("<br><br>".$sql) ;
         //Crear insert para los datos
        
         $fp = fopen("$pathFileSql$this->db.$this->contrato.sql","a+");
         $result = parent::query($sql);
         if(mysql_num_rows($result)>0){
            fwrite($fp, "\n".$sqlDel,5000000);
         }
         while($row=mysql_fetch_array($result)){
            $sql ="INSERT INTO $this->db.$tabla (";
            foreach($camposArray as $nombre){
              $sql .= " $this->db.$tabla.$nombre ,";
            }
            $sql.="<";
            $sql=str_replace(",<"," ",$sql);
            $sql.=" ) VALUES (";
            for($i=0;$i<mysql_num_fields($result);$i++){
               $nombre = parent::nombreCampo($result,$i);
               //if(stripos($nombre,"Imagen")){
               if(mysql_field_type($result,$i)=="blob" and $row[$i]!=""){
                  //pasar la imagen a hexadecimal
                  $row[$i]= parent::ascii2hex($row[$i]);
                  $sql .= " $row[$i] ,";
               }
               else {
				      $sql .= " '$row[$i]' ,";
				}
               
            }
            if(strpos($sqlDel,"dIdFecha")===false)$sqlDel = str_replace("AND","",$sqlDel);
            $sql.="<";
            $sql=str_replace(",<"," ",$sql);
            $sql.=" );\n";
            $sqlDel.="\n";
           // fwrite($fp, "-- ".$row['sContrato']." , ".$row['dIdFecha'],5000000);
            fwrite($fp, $sql,5000000);
         }
      }
      mysql_select_db($BaseDatos);
      fclose($fp);
   }


}

?>
