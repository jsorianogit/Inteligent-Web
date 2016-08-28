<?php
//require_once ("../../../include/formulario.inc.php");

class reporteador extends formulario{
    
    var $consulta ;
    var $border ;
    var $titulo ;
    var $contreg ;
    var $result ;
    var $tituloTabla;
    var $arrayLinks;
    
   function reporte(){
      $this->consulta = "show tables";
      $this->border = 0;
   }
   
   function ponerconsulta($sql,$border,$titulo,$tituloTabla='',$arrayLinks=""){
      $this->consulta = $sql;
      $this->border = $border;
      $this->titulo = $titulo;
      $this->tituloTabla = $tituloTabla;
      $this->arrayLinks =$arrayLinks; 
   }
   
   function titulo(){
      print ("\n<tr>");
      for($i =0; $i <mysql_num_fields($this->result);$i++){
         print ("\n<th>".$this->nombreCampo($this->result,$i)."</th>");
      }
      print ("\n<tr>");
   }
   
   function titulopersonal(){
      /*if(count($this->titulo) > mysql_num_fields($this->result) or
         count($this->titulo) < mysql_num_fields($this->result))
         parent::alerta("El numero de etiquetas supera o es inferior el numero de campo");*/
      print ("\n<tr>");
      if($this->titulo !="")
      foreach ($this->titulo as $titulo){
          print ("\n<th>$titulo</th>");
      }
      print ("\n<tr>");   
   }
   function imprimir(){
      $this->result = $this->query($this->consulta);
      print ("\n<table border = $this->border class='enhancedtablerowhover'>");
      print ("\n<th colspan='".mysql_num_fields($this->result)."'><center>$this->tituloTabla</center></th>");
      if(isset($this->titulo))
         $this->titulopersonal();
      else
         $this->titulo();
      $this->contReg=0;
      while ($row = mysql_fetch_array($this->result)){
         
         for($i =0; $i <mysql_num_fields($this->result);$i++){
            if(strpos(strtolower(parent::nombreCampo($this->result, $i)), "imagen") and  $tipo = parent::tipoCampo($this->result, $i)=="blob")							
			   {
			    	$nombreImagen="";
			    	if($this->campollave !=  ""){
   			    	foreach( $this->campollave as $claves ){
   				    	$nombreImagen.=$row[$claves];	
   					}
   				}
   				else
   				  $nombreImagen =$row[0]."_".$this->contReg;
					$nombreImagen.=".jpg";
               $img = $this->procesarImagen($row[$i],$nombreImagen);
            }
            if ($img){
               print ("\n<td><img src = '$nombreImagen' width = '100' heigth = '100'</img></td>");  
               $img = false;
            }
            else{
               if(parent::tipoCampo($this->result, $i) == "real")//dar dos decimales si es flotante
                  $row[$i]=number_format($row[$i],2,".",",");
               if(strpos(strtolower(parent::nombreCampo($this->result, $i)), "enta"))//dar dos decimales si es venta
                  $row[$i]="$ ".$row[$i];
               if(strpos(strtolower(parent::nombreCampo($this->result, $i)), "osto"))//dar dos decimales si es costo
                  $row[$i]="$ ".$row[$i];
               else if(strpos(strtolower(parent::nombreCampo($this->result, $i)), "Wbs")){//sangrar segu nivel sWbs
                  $nivel = explode(".", $row[$i]);
                  $numnivel = count ($nivel);
                  $espacios = ($numnivel-1) * 4;
                  $tam = strlen($row[$i]);
                  $row[$i] = str_pad($row[$i], $espacios+$tam, " ", STR_PAD_LEFT); //alt + 255 ->caracter en blanco
               }
               if(strpos(strtolower(parent::nombreCampo($this->result, $i)), "Ponderado")){//dar formato de pocentaje
                  $row[$i]=$row[$i]."   %";
               }
               if($this->arrayLinks!="")
               	foreach($this->arrayLinks as $campo => $enlace){
               		if(parent::nombreCampo($this->result, $i)== $campo){
								$row[$i] = "<a href ='$enlace?$campo=$row[$i]' >$row[$i]</a>";
								break;
							}
               	}
               print ("\n<td>$row[$i]</td>");
            }
         }
         print ("\n<tr>");
         $this->contReg++;
      }     
      print ("\n</table>");
   }
}
?>
