<?php
require ("../../../include/formulario.inc.php");
class jornadas extends formulario{
    //muestra los registros de la tabla
    function visualizar($pag="",$orderby="")
    {
     	for($i=0;$i<2;$i++){
        $consulta = $this->sql;
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
            $consulta = $this->sql." ORDER BY $orderby LIMIT $iniciaren,$tampag";
         }
         else {
            $consulta = $this->sql." LIMIT $iniciaren,$tampag";  
         }
         
        $result = $this->query($consulta);
        //obtener descripcion de la tabla
        $tablades = $this->comentarioTabla($this->nombreTabla($result, 0));
        //si no tiene, poner como descripcion el nombre de la misma
        if ($tablades == "") $tablades = $this->nombreTabla($result, 0);
        
        echo "\n<center><table class='enhancedtablerowhover'>
				\n<caption><center><font size='1.5'>".$tablades."</font></center></caption>
				\n<thead>
				\n<tr>
				\n<td scope='col' colspan=2></td>";
				
        for ($i = 0; $i < mysql_num_fields($result); $i++)
        {
            $campo=$this->nombreCampo($result, $i);
            //los campos imagen no mostrarlos
            if (!$this->mostrarCampo($campo))
                continue;
             //obtener descripcion del campo   
            $des = str_replace("/*", "", $this->comentario($this->nombreCampo($result, $i),
                $this->nombreTabla($result, $i)));
            //si no tiene, poner como descripcion el nombre del mismo
            if ($des == "" ) $des = $campo;
            echo "\n<th scope='col' ><a href='?order=$campo'>$des</a></th>";
        }
        echo " \n</tr>
				\n</thead>
				\n<tbody>";
        while ($row = mysql_fetch_array($result))
        {
            $filtro = $this->cifrar($row, $result);
            echo "\n<tr>";
            echo "\n<td class='CrearReporte'>
				   \n<a href='$_SERVER[PHP_SELF]?operacion=m&$filtro'>
			   	\n<img src='".$this->PathImages."editar.png'></a></td>";
            echo "\n<td class='CrearReporte' >
	         	\n<a href='$_SERVER[PHP_SELF]?operacion=b&$filtro'>
   				\n<img src='".$this->PathImages."eliminar.png'>
	     			\n</a></td> ";
            for ($i = 0; $i < mysql_num_fields($result); $i++)
            {
               if(strpos(strtoupper($this->nombreCampo($result, $i)),strtoupper("Imagen")) and  $tipo = $this->tipoCampo($result, $i)=="blob")							
			   {
			    	$nombreImagen="";
			    	foreach($this->campollave as $claves){
				    	$nombreImagen.=$row[$claves];	
					}
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
                 else
                   echo "\n<td>".trim($row[$i])."</td>";
            }
            echo "\n</tr>";
        }
        echo "\n</tr></tbody></table></center>";
        $this->paginar($pag, $total, $tampag, "?pag="); 
        }
    }
}
?>