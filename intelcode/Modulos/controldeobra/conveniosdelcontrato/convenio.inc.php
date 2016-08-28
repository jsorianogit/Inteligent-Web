<?php
require ("../../include/formulario.inc.php");
class convenio extends formulario {
	
	function convenio($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones){
		$this->formulario($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);
	}
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
				\n<caption>".$tablades."</caption>
				\n<thead>
				\n<tr>
				\n<td scope='col' colspan=3></td>";
				
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
            echo "\n<td class='CrearReporte' colspan='3'>
				\n<a href='erogaciones.php?operacion=e&$filtro'>
				\n<img width='15' height='15' alt='Erogaciones' src='".$this->PathImages."anexar.ico'></a></td>";
           // echo "\n<td class='CrearReporte'>
		//		\n<a href='$_SERVER[PHP_SELF]?operacion=m&$filtro'>
		//		\n<img width='15' height='15' alt='Editar' src='".$this->PathImages."editar.png'></a></td>";
           // echo "\n<td class='CrearReporte' >
	    //  	\n<a href='$_SERVER[PHP_SELF]?operacion=b&$filtro'>
		//		\n<img width='15' height='15' alt='Modificar' src='".$this->PathImages."eliminar.png'>
		//		\n</a></td> ";
            for ($i = 0; $i < mysql_num_fields($result); $i++)
            {
               if(strpos($this->nombreCampo($result, $i), "Imagen") and  $tipo = $this->tipoCampo($result, $i)=="blob")							
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
                   echo "\n<td><img src = '$nombreImagen' width = '100' heigth = '100'</img></td>";  
                   $img = false;
                 }
                else if( strpos($this->tipoCampo($result, $i),"real")!==false ){
                   $row[$i] = number_format($row[$i], 4, '.', ',');
                   echo "\n<td class ='derecha'> $".$row[$i]."</td>";
                }
                else
                   echo "\n<td>".$row[$i]."</td>";

            }
            echo "\n</tr>";
        }
        echo "\n</tr></tbody></table></center>";
        $this->paginar($pag, $total, $tampag, "?pag="); 
        }
    }
}
?>
