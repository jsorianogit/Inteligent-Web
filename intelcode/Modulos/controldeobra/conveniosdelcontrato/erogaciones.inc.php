<?php
require ("../../include/formulario.inc.php");
class formErogaciones extends formulario
{

	//regresa el ultimo dia de un mes
	function ultimodia($ayno,$mes){
		$ultimodia = mktime(0, 0, 0,$mes+1, 0, $ayno);
		return $ultimo = strftime("%d", $ultimodia);
	}
    function CreaSelectMes($Nombre, $Tamanyo, $Comentario, $valor = "")
    {
        $valor = str_replace("\"", "", $valor);
        $mesAct = date('m');
        switch($mesAct){
			case ('01'):$enero ="selected";break;
			case ('02'):$febrero ="selected";break;
			case ('03'):$marzo ="selected";break;
			case ('04'):$abril ="selected";break;
			case ('05'):$mayo ="selected";break;
			case ('06'):$junio ="selected";break;
			case ('07'):$julio ="selected";break;
			case ('08'):$agosto ="selected";break;
			case ('09'):$septiembre ="selected";break;
			case ('10'):$octubre ="selected";break;
			case ('11'):$noviembre ="selected";break;
			case ('12'):$diciembre ="selected";break;
		}
        echo "\n<tr>
				\n<td>Mes</td>
				\n<td>
				\n<select name='mes' onfocus=\"style.backgroundColor='$this->onfocus'\"onblur=\"style.backgroundColor='white'\" >
					\n<option $enero value='01'>ENERO</option>
					\n<option $febrero value='02'>FEBRERO</option>
					\n<option $marzo value='03'>MARZO</option>
					\n<option $abril value='04'>ABRIL</option>
					\n<option $mayo value='05'>MAYO</option>
					\n<option $junio value='06'>JUNIO</option>
					\n<option $julio value='07'>JULIO</option>
					\n<option $agosto value='08'>AGOSTO</option>
					\n<option $septiembre value='09'>SEPTIEMBRE</option>
					\n<option $octubre value='10'>OCTUBRE</option>
					\n<option $noviembre value='11'>NOVIEMBRE</option>
					\n<option $diciembre value='12'>DICIEMBRE</option>
				\n</select>
	            \n</td>
				\n</tr>";
			
		
    }
    function CreaSelectAnio($Nombre, $Tamanyo, $Comentario, $valor = "")
    {
        $valor = str_replace("\"", "", $valor);
        $anioAct = date('Y');
        echo "\n<tr>
			  \n<td>Año</td>
			  \n<td>
			  \n<select name='anio' onfocus=\"style.backgroundColor='$this->onfocus'\"onblur=\"style.backgroundColor='white'\" >";
				for($i=date('Y')-10;$i<=date('Y')+10;$i++){
					$sel = ($anioAct == $i) ? "selected":"";
					echo"\n<option $sel>$i</option>";
				}

		echo "\n</select>
	          \n</td>
			  \n</tr>";
			
		
    }
    //crea la consulta INSERT INTO a partir de la variable $_POST
    function crearInsert($_POST,$HTTP_POST_FILES)
    {
        $result = $this->query($this->sql);
        $tabla = $this->nombreTabla($result, 0);
        $numelementos = count($_POST);
        $contador = 0;
         //obtener imagen
         if(isset($HTTP_POST_FILES)){
             foreach($HTTP_POST_FILES  as $indice => $campImg)
             if($indice!="" and $HTTP_POST_FILES[$indice]['tmp_name'] !="")
                 $imagen = mysql_escape_string(join(@file($HTTP_POST_FILES[$indice]['tmp_name']))); 
                 $indiceImg= $indice;
         }    
        $sql = "INSERT INTO $tabla (\n";
        foreach ($_POST as $indice => $valor)
        {
        	if($indice =="anio"){
        		$anio = $valor;
        		continue;
			}
        	if($indice =="mes"){
        		$mes = $valor;
        		continue;
			}
            if ($valor == "Insertar" or $valor == "Modificar")
                continue;
            if ($contador++ == $numelementos - 2)
                $sql .= "\t$indice\n";
            else
                $sql .= "\t$indice,\n";
        }
        //fecha
        $sql .= "\t dIdFecha \n";
        $fecha = $anio."-".$mes."-".$this->ultimodia($anio,$mes);
         //Si selecciono una imagen agregarla al insert
         if(isset($indiceImg) and isset($imagen)){
            $sql .= "\t, $indiceImg \n";
         }   
        $sql .= " ) VALUES (\n";
        $contador = 0;
        foreach ($_POST as $indice => $valor)
        {
        	if($indice =="anio" or $indice =="mes"){
        		continue;
			}
            if ($valor == "Insertar" or $valor == "Modificar")
                continue;
            if ($contador++ == $numelementos - 2)
                $sql .= "\t'$valor'\n";
            else
                $sql .= "\t'$valor',\n";
        }
         //Si selecciono una imagen agregarla al insert
         $sql .= "\t '$fecha' \n";
         if(isset($indiceImg) and isset($imagen)){
            $sql .= "\t, '$imagen' \n";
         }   
        $sql .= ")";
        $this->query($sql);
    }
    //crea la consulta UPDATE a partir de la variable $_POST
    function crearUpdate($condicion, $_POST , $HTTP_POST_FILES )
    {

        $result = $this->query($this->sql);
        $tabla = $this->nombreTabla($result, 0);
        $numelementos = count($_POST);
        $contador = 0;
         //obtener imagen
         if(isset($HTTP_POST_FILES)){
             foreach($HTTP_POST_FILES  as $indice => $campImg)
                if($indice!="" and $HTTP_POST_FILES[$indice]['tmp_name'] !="")
                    $imagen = mysql_escape_string(join(@file($HTTP_POST_FILES[$indice]['tmp_name']))); 
                 $indiceImg= $indice;
         }    
        $sql = "UPDATE $tabla SET \n";
        foreach ($_POST as $indice => $valor)
        {
            foreach($this->campollave as $campollave)
            	if ($indice == $campollave)
	                $valorcampollave[$campollave] = $valor;
        	if($indice =="anio"){
        		$anio = $valor;
        		continue;
			}
        	if($indice =="mes"){
        		$mes = $valor;
        		continue;
			}	                
            if ($valor == "Insertar" or $valor == "Modificar")
                continue;
            if (++$contador == $numelementos - 1)
                $sql .= "\t$indice='$valor'\n";
            else
                $sql .= "\t$indice='$valor',\n";
        }
        //fecha
        $fecha = $anio."-".$mes."-".$this->ultimodia($anio,$mes);
        $sql .= "\t dIdFecha='$fecha'\n";
        //Si selecciono una imagen agregarla al update
         if(isset($indiceImg) and isset($imagen)){
            $sql .= "\t, $indiceImg='$imagen'\n";
         }   
        $sql .= "WHERE	$condicion";
        $this->initransaccion();
        if (isset($this->campollave) and $this->campollave != "" and $this->query($sql))
        {
            //si no se especifican las tablas relacionadas, buscarlas
            if (!$this->tablasrelaciones and $this->tablasrelaciones[0]!="none"){
            	$tablas = $this->relaciones($tabla);
            }
            else
               $tablas = $this->tablasrelaciones;
           if ($tablas and $this->tablasrelaciones[0]!="none")
                $this->actRelaciones($tablas, $valorcampollave);
        }
		if ( $this->mysql_err == 0 and $this->transaccion==1)
      		$this->aceptransaccion();
        else if ( $this->mysql_err==1 and $this->transaccion==1)
      		$this->destransaccion();
    }
    function CreaFormulario($Filtro = "")
    {

        if ($Filtro != "")
            $sql = $Filtro;
        else
            $sql = $this->sql;
        $sql = $this->seleccionartodo($sql);//seleccionar todos los campos
        $result = $this->query($sql);
        $row = mysql_fetch_array($result);
        $fields = mysql_num_fields($result);
        $table = $this->nombreTabla($result, 0);

        echo "\n<center>\n<form enctype='multipart/form-data' action='$_SERVER[PHP_SELF]'  method='POST'>";
        echo "\n<table>\n<caption>".$this->comentarioTabla($this->nombreTabla($result, 0))."</caption>";

        for ($i = 0; $i < $fields ; $i++)
        {
				//$this->alerta($this->nombreTabla($result, $i)!=$table);
            $tipo = $this->tipoCampo($result, $i);//Tipo de campo
            
            $nombre = $this->nombreCampo($result, $i);//Nombre de Campo
            $long = $this->longCampo($result, $i);//Longitud dle Campo
            $flags = $this->banderas($result, $i);//Banderas del Campo
            $comment = $this->comentario($nombre, $table);//Comentarios del Campo
            $esEnum = $this->tipoEnum($comment);//es campo select ?
            $comment = str_replace("/*", "", $comment);
            //si el comentario es nulo, porner como comentario el nombre de campo
            if($comment == "" )$comment = $nombre;
            
            //$this->read = $this->mostrarCampo($nombre) ? "":"readonly";
            $this->read = $this->bloquearCampo($nombre) ? "":"readonly";

            //poner valor por defecto en el formulario
            if ($Filtro == "" and  $this->val != "")// $Filtro == "" and 
            {
                $row[$i] = $this->valorCampo($nombre);
            }
           // $this->alerta("tipo: ".$tipo);
            //salvar valor del (los) campo (s) llave (s)
            foreach($this->campollave as $nom)
               if ($nom == $nombre)
                	$_SESSION[$nom] = $row[$i];
            //$this->alerta($nombre." - ".$tipo." - ".$flags);
//or strpos($flags, "set")
            //segun tipo de campo, tipo de etiqueta
            if (strpos($flags, "set")  and !$esEnum ){
                 $this->CampoSet(mysql_field_table($result, $i), $nombre, $comment, $row[$i]);
            }
            else if ($tipo == "date" and !$esEnum ){
            	$this->CreaSelectMes($nombre, $long, $comment, $row[$i]);
            	$this->CreaSelectAnio($nombre, $long, $comment, $row[$i]);
//                $this->CreaTextoFecha($nombre, $long, $comment, $row[$i]);
            }
            else if (strpos($nombre, "Color") and !strpos($flags, "enum") and !$esEnum)
                $this->CreaSelectColor($nombre, $comment, $row[$i]);
            else if ($tipo == "int" or $tipo == "real" )
                $this->CreaTextoNumerico($nombre, $long, $comment, $row[$i]);
            else if (!strpos($nombre, "Imagen") and !strpos($flags, "enum") and !$esEnum)
                $this->CreaTexto($nombre, $long, $comment, $row[$i]);
            /*else if (strpos($nombre, "imagen") and !$esEnum and $tipo!="blob")
                $this->CreaImagenRuta($nombre, $comment);*/
            else if (strpos($nombre, "Imagen") and !$esEnum and $tipo=="blob")
                $this->CreaImagen($nombre, $comment);
            else if (strpos($flags, "enum"))
                 $this->CampoEnum(mysql_field_table($result, $i), $nombre, $comment, $row[$i]);
            else if ($esEnum)
            {
               if ($this->select != "")
                  foreach ($this->select as $indice => $contSql)
                  {
                     if ($indice == $nombre and $contSql != "")
                     {
                        if (!isset($Filtro) or $Filtro == "")
                           $row[$i] = "";
                        $this->CreaSelect($nombre, $contSql, $comment, $row[$i]);
                        $CreoSelect = true;
                        break;
                     }
                  }
               if (!$CreoSelect)
               {
                  $this->CreaTexto($nombre, $long, $comment, $row[$i]);
               }
            }
        }
        echo "\n</table>
				\n<input type='submit' value='Cancelar' >
				\n<input type='submit' value='".$_SESSION['sOperacion']."' name='aceptar'>
				\n</form>
				\n</center>";
        mysql_free_result($result);
        exit();
    }
   
}
?> 
