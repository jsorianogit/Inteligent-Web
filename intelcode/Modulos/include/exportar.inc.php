<?php
require ("migrar.inc.php");
class exportador extends migrar {
   var $tablas;   //array de tablas que deben extraerse
   var $db ;      //base de datos sobre la cual se va a rabajar, default la seleccionada en mysql.inc.php
   var $NombreArchivo ;
   //inicializad variables
   function exportador($BaseDatos='test',$tablas='dual',$NombreArchivo='BaseDatos.sql'){
      $this->tablas = $tablas;
      $this->db = $BaseDatos ;
      $this->NombreArchivo = $NombreArchivo ;
   }
 //crear el archivo sql para el contrato (todas las tablas)
   function exportar(){
      if(!isset($this->tablas) and count($this->tablas)<1){
      	 $todasTablas=$this->relaciones("dual");
          $this->proceso($todasTablas);
      }
      else
        	 $this->proceso($this->tablas);
  } 
  
  //procesa las consultas
  function proceso($tablas,$convenio="|"){
      set_time_limit(0); 
      if(file_exists($this->NombreArchivo))
       	unlink($this->NombreArchivo);
   	echo "\n<br>Procesando :".count($tablas);    	
      foreach($tablas as $index => $tabla){
         if($tabla=="")continue;
         echo "\n<br> Extrayendo Tabla : $tabla";
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
         $sql.=" FROM $this->db.$tabla ";

         //Crear insert para los datos
         $fp = fopen($this->NombreArchivo,"a+");
         $result = parent::query($sql);
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
               if(mysql_field_type($result,$i)=="blob" and $row[$i]!=""){
                  //pasar la imagen a hexadecimal
                  $row[$i]= parent::ascii2hex($row[$i]);
                  $sql .= " $row[$i] ,";
               }
               else {
				  $sql .= " '$row[$i]' ,";
				}
               
            }
            $sql.="<";
            $sql=str_replace(",<"," ",$sql);
            $sql.=" );\n";
            fwrite($fp, $sql);
         }
      }
      fclose($fp);
      if (file_exists($this->NombreArchivo)){
         print("\n<br> Finalizo Esta parte de la Ejecucion");
      }
   }


}
?>
