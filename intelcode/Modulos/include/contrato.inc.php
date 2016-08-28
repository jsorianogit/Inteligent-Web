<?php

require ("migrar.inc.php");
class contrato extends migrar {
   var $cotrato;   //Contrato seleccionado
   var $tablas;   //array de tablas que deben extraerse
   var $db ;      //base de datos sobre la cual se va a rabajar, default la seleccionada en mysql.inc.php
   //constructor por defecto   
   function contrato(){
      global $sContrato;
      $this->contrato = $sContrato;
   }
   //inicializad variables
   function nuevaexportacion($contrato,$tablas){
      global $BaseDatos;
      $this->contrato = $contrato;
      $this->tablas = $tablas;
      $this->db = $BaseDatos ;
   }
   //crear el archivo sql para el contrato
   function exportaContrato(){
      if (file_exists("$this->db.$this->contrato.sql")){
         unlink("$this->db.$this->contrato.sql");
      }
	$sql="SELECT c.sIdConvenio FROM $this->db.configuracion c INNER JOIN $this->db.convenios c2 ON (c.sContrato=c2.sContrato AND c.sIdConvenio=c2.sIdConvenio) WHERE c.sContrato='$this->contrato'";
	$resultado=mysql_query($sql);
	if($row=mysql_fetch_array($resultado)){
		$sIdConvenio=$row['sIdConvenio'];
	}
    $this->exportar($this->tablas,$sIdConvenio);
  }
 //crear el archivo sql para el contrato (todas las tablas)
   function exportaDB(){
      if (file_exists("$this->db_$this->contrato.sql")){
         unlink("$this->db_$this->contrato.sql");
      }
      $this->campollave[0] ='sContrato';
      if(!isset($this->tablas) and count($this->tablas)<1){
      	 $todasTablas=$this->relaciones("dual");
          $this->exportar($todasTablas);
        }
        else
        	$this->exportar($this->tablas);
  } 
  
  //procesa las consultas
  function exportar($tablas,$convenio="|"){
      global $BaseDatos;
      set_time_limit(0); 
      if(file_exists("$this->db_$this->contrato.sql"))
       	unlink("$this->db_$this->contrato.sql");
      $fp = fopen("$this->db_$this->contrato.sql","a+");
      fwrite($fp, "\nUSE $this->db ;\n",200);
      fclose($fp);
      foreach($tablas as $index => $tabla){
         if($tabla=="")continue;
         unset($campos);
         //echo "<br>$this->db.$tabla";
         $sql = "show fields from $this->db.$tabla";
         $campos = mysql_query($sql);
         if(mysql_error())continue;
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
         if($convenio=="|")
	         $sql.=" FROM $this->db.$tabla WHERE $this->db.$tabla.sContrato = '$this->contrato';";
	     else
	     	 $sql.=" FROM $this->db.$tabla WHERE $this->db.$tabla.sContrato = '$this->contrato' AND sIdConvenio='$convenio';";
         //print ("<br><br>".$sql) ;
         //Crear insert para los datos

         $fp = fopen("$this->db_$this->contrato.sql","a+");
         $result = parent::query($sql);
         while($row=mysql_fetch_array($result)){
            $sql ="INSERT INTO $tabla (";
            foreach($camposArray as $nombre){
              $sql .= " $nombre ,";
            }
            $sql.="<";
            $sql=str_replace(",<"," ",$sql);
            $sql.=" ) VALUES (";
            $dupKey="";
            for($i=0;$i<mysql_num_fields($result);$i++){
               $nombre = parent::nombreCampo($result,$i);
               //if(stripos($nombre,"Imagen")){
               if(mysql_field_type($result,$i)=="blob" and $row[$i]!=""){
                  //pasar la imagen a hexadecimal
                  $row[$i]= parent::ascii2hex($row[$i]);
                  $sql .= " $row[$i] ,";
                  $dupKey .=" $nombre = '$row[$i]' ,";
               }
               else {
				  $sql .= " '$row[$i]' ,";
				  $dupKey .=" $nombre = '$row[$i]' ,";
				}
               
            }
            $sql.="<";
            $dupKey.="<";
            $sql=str_replace(",<"," ",$sql);
            $dupKey=str_replace(",<"," ",$dupKey);
            $sql.=" ) ON DUPLICATE KEY UPDATE $dupKey;\n";
            
            fwrite($fp, $sql,5000000);
         }
      }
      fclose($fp);
      if (file_exists("$this->db_$this->contrato.sql")){
         print("
         <script language='javascript'>
           window.open('openfile.php?name=$this->db_$this->contrato.sql','Sql','left=50,top=20,width=500,height=500,toolbar=1,resizable=1,scrollbars=YES,status=0,menubar=1');
         </script>");

         /*print("
         <script language='javascript'>
            window.open('$this->db_$this->contrato.sql','Sql','left=50,top=20,width=500,height=500,toolbar=1,resizable=1,scrollbars=YES,status=0,menubar=1');
         </script>");*/
      }
   }


}
?>
