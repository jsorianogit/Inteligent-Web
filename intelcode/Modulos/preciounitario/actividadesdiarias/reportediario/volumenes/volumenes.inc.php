<?php
require("../../../../include/reporteador.inc.php");
class reportediario extends reporte {
	var $nombrecampo;
	var $editar=1;
	var $borrar=1;
	//imprimir nombre de los campos
	function nombres(){
		foreach($this->nombrecampo as $nombre){
			print("<th>$nombre</th>");
		}
	}
	//decide si se edita o no, si se elimina o no
	function opciones($editar=1,$borrar=1){
      $this->editar=$editar;
      $this->borrar=$borrar;
   }
    //cifrar el url
    function cifrar($array, $result)
    {
    	   $prefijo="Sql=";
    	   $cadCifrar="";
           foreach ($array as $indice => $valor){
              foreach ($this->campollave as  $campo){
                  if ($campo==$indice and !is_numeric($indice)){
                      $cadCifrar .= "_$indice|*$valor*_AND";
                  }
              }
            }

        $cadCifrar .= "<";
        $cadCifrar = str_replace("AND<", "", $cadCifrar);
        //cifrar el contenido
        $cadCifrar = encrypt($cadCifrar, 0);
        return $prefijo.$cadCifrar;
    }	
	#devuelve true si la operacion es lAlcance = true
	function fnlAlcance(){
		$sql = "SELECT lAlcance FROM bitacoradeactividades WHERE ";
		$result = mysql_query($sql);
		if($row = mysql_fetch_array($sql)){
			$lAlcance = $row['lAlcance'];
		}
		if($lAlcance == "Si")
			return true;
		else
			return false;
	}
 //muestra los registros de la tabla
    function visualizar($pag="",$orderby="",$nombrecampo="")
    {
    	$this->nombrecampo = $nombrecampo ;
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
         echo "<div id='paginadorSuperior'>";
         $this->paginar($pag, $total, $tampag, "?pag="); 
          echo "</div>";
         if ($orderby !=""){
            $consulta = $this->sql." ORDER BY $orderby LIMIT $iniciaren,$tampag";
         }
         else {
            $consulta = $this->sql." LIMIT $iniciaren,$tampag";  
         }
        // echo "<br>".$this->sql;
        $result = $this->query($consulta);
        //obtener descripcion de la tabla
        $tablades = $this->comentarioTabla($this->nombreTabla($result, 0));
        //si no tiene, poner como descripcion el nombre de la misma
        if ($tablades == "") $tablades = $this->nombreTabla($result, 0);
        $conlspan =2;
        if($this->editar==0)$conlspan--;
        if($this->borrar==0)$conlspan--;
        
        echo "\n<center><table class='enhancedtablerowhover'  name='ReporteVolumenes' id='ReporteVolumenes'>
				\n<caption>".$tablades."</caption>
				\n<thead>
				\n<tr>";
				if($conlspan!=0)
			echo "\n<td scope='col' colspan=$conlspan></td>";
   		if($this->nombrecampo==""){
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
	    }
	    else{
			foreach($this->nombrecampo as $title){
				print("<th scope='col'>$title</th>");
			}
		}
        echo " \n</tr>
				\n</thead>
				\n<tbody>";
        while ($row = mysql_fetch_array($result))
        {
            $filtro = $this->cifrar($row, $result);
            echo "\n<tr>";
            if($this->editar!=0)      
            echo "\n<td class='CrearReporte'>
				   \n<a title='Editar Comentarios' onClick=\"window.open('comentarios.php?$filtro','Comentarios','width=500,height=300,scrollbars=yes,resizable=yes,status=0,toolbar=0');return false\" href='http://www.intel-code.com.mx'> 
				    	\n<img src='".$this->PathImages."editar.png' width=11></a></td>";
				if($this->borrar!=0){
				 	if($row['lAlcance'] == 'No'){
				 		$UrlEliminar = "$_SERVER[PHP_SELF]?operacion=b&$filtro";
				 		$onClick = "";
				 	}
				 	else{
				 		$UrlEliminar = "http://www.intel-code.com.mx";
				 		$onClick = "javascript:alert(\"La partida no Puede Eliminarse, Elimine los Alcances Registrados  a la Partida  en el dia para poder realizar el borrado\"); return false;";
				 	}
	            echo "\n<td class='CrearReporte' >
		      	\n<a title='Eliminar Registro' href='$UrlEliminar' onClick='$onClick'>
					\n<img src='".$this->PathImages."eliminar.png'>
					\n</a></td> ";
				}
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
                 else if($this->tipoCampo($result,$i)=="real" and (strpos($this->nombreCampo($result,$i),"Costo") or strpos($this->nombreCampo($result,$i),"Venta")))
                   echo "\n<td>$ ".number_format($row[$i],2,'.',',')."</td>";
                 else if($this->tipoCampo($result,$i)=="real" and strpos($this->nombreCampo($result,$i),"Avance"))
                   echo "\n<td>".number_format($row[$i],1,'.',',')." % </td>";
                else if(strpos(strtolower($this->nombreCampo($result, $i)), strtolower("fecha"))!==false){//formato de fecha
                   echo "\n<td>".formatoFecha($row[$i])."</td>";
				}
				else
					echo "\n<td>".$row[$i]."</td>";
            }
            echo "\n</tr>";
        }
        echo "\n</tr></tbody></table></center>";
        echo "<div id='paginadorInferior'>";
        $this->paginar($pag, $total, $tampag, "?pag="); 
        echo "</div>";
        }
    }
    //retorna solo los campos que existen en actividadesxorden
    function actiOrdenes($condicion){
    	$nuevaCondicion="";
    	$array = explode("AND",$condicion);
    	$sql = "show fields from actividadesxorden";
    	$result = mysql_query($sql);
    	while($row=mysql_fetch_array($result)){
    		foreach($array as $valor){
    			if(strpos($valor,$row[0])!==false){
					$nuevaCondicion.= " $valor AND";
				}
				
			}
			
		}
		$nuevaCondicion.="<";
		return $condicion=str_replace("AND<","",$nuevaCondicion);
		
	}

	//crea la consulta DELETE 
    function crearDelete($condicion)
    {
    	global $sIdConvenioAct;
        $result = $this->query($this->sql);
        $tabla = $this->nombreTabla($result, 0);
        //actualizar los instalados
        $sql = "SELECT dCantidad FROM $tabla WHERE $condicion\n";
        $result = mysql_query($sql);
        if($row = mysql_fetch_array($result)){
			$dCantidad = $row[0] ;
		}
		$con = $this->actiOrdenes($condicion);
		$sql = "SELECT dInstalado FROM actividadesxorden WHERE $con\n";
		$result = mysql_query($sql);
        if($row = mysql_fetch_array($result)){
			$dCantidadac = $row[0] ;
		}
		$NuevodInstalado = $dCantidadac - $dCantidad;
		$NuevodInstalado;
		$sqlorden = "UPDATE actividadesxorden SET dInstalado=$NuevodInstalado WHERE $con\n";
		//return;
        //eliminar el actual
        $sql = "DELETE FROM  $tabla WHERE $condicion\n";
        $contenido = $this->extraervalor($condicion);
        //checar que no se este usando
        //si no se especifican las tablas relacionadas, buscarlas
        if (!$this->tablasrelaciones and $this->tablasrelaciones!="none")
            $tablas = $this->relaciones($tabla);
        else
            $tablas = $this->tablasrelaciones;
	#eliminar de bitacoradepersonal y de bitacoradeequipos
	$valores = explode("AND",$condicion);
	$conPersonalEquipo=" ";
	foreach($valores as $value){
		if(strpos($value,"sContrato")!==false) $conPersonalEquipo.=$value. " AND ";
		if(strpos($value,"dIdFecha")!==false) $conPersonalEquipo.=$value. " AND ";
		if(strpos($value,"iIdDiario")!==false) $conPersonalEquipo.=$value;
	}

	//$this->destransaccion();  
	//exit();
        //buscar concurrencias de registro en tablas relacionadas    
        $relacionado=false;
        if($this->tablasrelaciones[0]!="none")
           $relacionado = $this->busRelaciones($tabla,$tablas,$contenido);
        //si no hay , eliminar el registro
        if(!$relacionado)
        {   
            $this->initransaccion();
            	//$this->query($sqlorden);
               	$this->query($sql);
		#primero de bitacoradepersonal
		$sqlDeletePersonal = "DELETE FROM bitacoradepersonal WHERE $conPersonalEquipo";
		mysql_query($sqlDeletePersonal);
		if(mysql_error()){$this->mysql_err=true;};
		#ahora de bitacoradeequipos
		$sqlDeleteEquipo = "DELETE FROM bitacoradeequipos WHERE $conPersonalEquipo";
		mysql_query($sqlDeleteEquipo);
		if(mysql_error()){$this->mysql_err=true;};
            if($this->mysql_err)
               $this->destransaccion();     
            else{
               $this->aceptransaccion();      
	    }
        }
    }	
  
}
?>
