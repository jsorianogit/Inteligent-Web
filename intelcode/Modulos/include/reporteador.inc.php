<?php
require ("formulario.inc.php");
class reporte extends formulario{
    
    var $consulta ;
    var $border ;
    var $titulo ;
    var $contreg ;
    var $result ;
    var $tituloTabla;
    
   function reporte(){

      $this->consulta = "show tables";
      $this->border = 0;
   }
   
   function ponerconsulta($sql,$border,$titulo,$tituloTabla=''){
      $this->consulta = $sql;
      $this->border = $border;
      $this->titulo = $titulo;
      $this->tituloTabla = $tituloTabla;
   }
   
   function titulo(){
      print ("\n<tr>");
      for($i =0; $i <mysql_num_fields($this->result);$i++){
         print ("\n<th><font color='#D58000'>".$this->nombreCampo($this->result,$i)."</font></th>");
      }
      print ("\n</tr>");
   }
   function titulopersonal(){
      /*if(count($this->titulo) > mysql_num_fields($this->result) or
         count($this->titulo) < mysql_num_fields($this->result))
         parent::alerta("El numero de etiquetas supera o es inferior el numero de campo");*/
      print ("\n<tr>");
      if($this->titulo !="")
      foreach ($this->titulo as $titulo){
          print ("\n<th><font color='#D58000'>$titulo</font></th>");
      }
      print ("\n</tr>");   
   }
   function imprimir(){
      $this->result = $this->query($this->consulta);
      print ("\n<table border = '$this->border' class='enhancedtablerowhover' nowrap>");
      print ("\n<th colspan='".mysql_num_fields($this->result)."'><center>$this->tituloTabla</center></th>");
      if(isset($this->titulo))
         $this->titulopersonal();
      else
         $this->titulo();
      $this->contReg=0;
      while ($row = mysql_fetch_array($this->result)){
         $img=-1;
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
            if ($img!=-1){
             	
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
               print ("\n<td nowrap>$row[$i]</td>");
            }
   
         }
         print ("\n<tr>");
         $this->contReg++;
      }     
      print ("\n</table>");
   }
   //opciones 
   function opciones($opciones){
		$this->opciones = $opciones;
	}
   //muestra los registros de la tabla
    function visualizar($pag="",$orderby="")
    {
     	for($i=0;$i<2;$i++){
         $consulta = $this->consulta;
         //filas obtenidas
         $total = $this->contarfilas($consulta);
         //tamaño del paginador
         if($total<200):
	           $tampag=20;
         elseif ($total<400):
               $tampag=40;
         else:
            	$tampag=60;
         endif;
         $iniciaren=($pag-1) * $tampag;	//Registro actual
         if($iniciaren<0)$iniciaren=0;
         
         $this->paginar($pag, $total, $tampag, "?pag="); 
         
         if ($orderby !=""){
            $consulta = $this->consulta." ORDER BY $orderby LIMIT $iniciaren,$tampag";
         }
         else {
            $consulta = $this->consulta." LIMIT $iniciaren,$tampag";  
         }
        // echo $this->consulta;
        $result = mysql_query($this->consulta);
        //obtener descripcion de la tabla
        $tablades = $this->comentarioTabla($this->nombreTabla($result, 0));

       /* echo "\n<center><table class='enhancedtablerowhover'>
				\n<caption><center><font size='1.5'>".$tablades."</font></center></caption>
				\n<thead>";*/
				echo "\n<center><table class='enhancedtablerowhover'>";
      print ("\n<th colspan='".mysql_num_fields($result)."'><center>$this->tituloTabla</center></th>");
      if(isset($this->titulo))
         $this->titulopersonal();
      else
         $this->titulo();
		//	echo "\n<tr>";
				
       /* for ($i = 0; $i < mysql_num_fields($result); $i++)
        {
            $campo=$this->nombreCampo($result, $i);
            //los campos imagen no mostrarlos
            if (!$this->mostrarCampo($campo))
                continue;
             //obtener descripcion del campo   
            $des = str_replace("/*", "", $this->comentario($this->nombreCampo($result, $i),
                $this->nombreTabla($result, $i)));
            //si no tiene, poner como descripcion el nombre del mismo
            if ($des == "" or is_numeric($des)) $des = $campo;
            echo "\n<th scope='col' ><a href='?order=$campo'>$des</a></th>";
        }*/
      	$filas=-1;
			if($this->opciones!=""){
				foreach($this->opciones as $fila)
					$filas++;
				$filas++;
			}

			//if($fila!=-1)
			//	echo "\n<th colspan=$filas></th>";
				
        //echo " \n</tr>
			echo " 	\n</thead>
				\n<tbody>";
        while ($row = mysql_fetch_array($result))
        {
				echo "\n<tr>";
				$img = false;
            for ($i = 0; $i < mysql_num_fields($result); $i++)
            {
               if(strpos(strtoupper(mysql_field_name($result, $i)),strtoupper("Imagen")) and  $tipo = mysql_field_name($result, $i)=="blob")							
			   {
			    	$nombreImagen="";
			    	foreach($this->campollave as $claves){
				    	$nombreImagen.=$row[$claves];	
					}
					$nombreImagen = str_replace("/","-",$nombreImagen);
					$nombreImagen.=".jpg";
                 //$nombreImagen=$row[$this->campollave].".jpg";
                 $img = $this->procesarImagen($row[$i],$nombreImagen);
               }
                if (!$this->mostrarCampo($this->nombreCampo($result, $i)))
                    continue;
                if ($img){
                   echo "\n<td><img border=1 src = '$nombreImagen' width = '90' heigth = '90'</img></td>";  
                   $img = false;
                 }
                 else  if(( strpos(strtoupper($this->nombreCampo($result, $i)),"DLL")!==false  or  strpos(strtoupper($this->nombreCampo($result, $i)),"MN")!==false )
                 						AND $this->tipoCampo($result, $i)=="real"){
                   $row[$i] = number_format($row[$i], 4, '.', ',');
                   echo "\n<td class ='derecha'>$ ".$row[$i]."</td>";
                 }
                else if( strpos($this->tipoCampo($result, $i),"real")!==false ){
                   $row[$i] = number_format($row[$i], 4, '.', ',');
                   echo "\n<td class ='derecha'> ".$row[$i]."</td>";
                }
                else
                   echo "\n<td nowrap>".$row[$i]."</td>";
 
 					if($this->opciones!="" and $i == mysql_num_fields($result)-1){
					 	
						foreach($this->opciones as $fila){
						 	$destino = $fila[0]."?";
							for ($i = 0; $i < mysql_num_fields($result); $i++){
								if(strpos($fila[3],$this->nombreCampo($result, $i)) !== false ){
									$destino .= $this->nombreCampo($result, $i)."=$row[$i]&";
								}
							}
							$destino.="1=1";
							echo "\n<td>\n<a href='$destino' title='$fila[1]'>";
							echo ($fila[2]=="")?$fila[1]:$img = "<img src='$fila[2]'>" ;
							echo "</a>\n</td>";
						}
					}
            }


            echo "\n</tr>";
        }
        echo "\n</tr></tbody></table></center>";
        $this->paginar($pag, $total, $tampag, "?pag="); 
        }
    }
}
?>
