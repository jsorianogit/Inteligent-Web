<?php
/*
Descripcion:
	Crea un formulario web a partir de una consulta proporcionada
*/
	
require("../Modulos/include/mysql.inc.php");
require("encryptFunction.php");

class formulario{
	var $PathImages="http://127.0.0.1/Joomla/intelcode/Modulos/imagenes/";
 	//array asosiativo que contendra las opciones para los valores de los select
	var $select = array(
		"sIdTipoEmbarcacion"=>"select sIdTipoEmbarcacion,sDescripcion from tiposdeembarcacion",
		"sIdEmbarcacion"=>"select sIdEmbarcacion,sDescripcion from embarcaciones");
	//Campos que no deben mostrarse
	var $acampos;
	//valores por default al insertar
	var $val;
	//consulta sql
	var $sql;
	var $read;
	
	function formulario($sqld,$camposNo="",$val=""){
		$this->sql=$sqld;
		$this->acampos=$camposNo;
		$this->val=$val;
	}

	//verifica si un campo es llave en las tablas
	function llave($banderas){
 		if(stripos($banderas,"_key"))
			return true	;
		else
			return false;
	}
	//verifica si es campo primario para los formularios
	function primario($comentario){
		if(strpos($comentario,"*"))
		 	return true;
		else
			return false;	
	}
	//optiene el comentario de la tabla
	function comentarioTabla($Tabla)
	{
		$sql="show table status like '$Tabla%'";
		$result=mysql_query($sql);
		if($row=mysql_fetch_array($result))
		{
		 	$Comentario="";
		 	for($i=0;$i<strlen($row['Comment']);$i++)
		 	{
				if($row['Comment'][$i]==';')
					return $Comentario;
				$Comentario.=$row['Comment'][$i];
			}
				return $row['Comment'];
		}
		//else
	//		return "-";
	}
	//optiene el comentario del campo
	function comentario($Campo,$Tabla)
	{
		$sql="show full columns from $Tabla like '%$Campo%'";
		$result=mysql_query($sql);
		if($row=mysql_fetch_array($result))
		{
			
			return $row['Comment'];
		}
		else
			return "-";
	}
	//develve el nombre de la tabla
	function nombreTabla($result,$indice){
	 if (isset($result) and isset ($indice)){
		return mysql_field_table($result, $indice);
	 }
	}
	//devuelve las banderas del campo
	function banderas($result,$indice){
		return mysql_field_flags($result, $indice);
	}
	//devuelve el tipo de campo
	function tipoCampo($result, $indice){
	 //   echo "<br><br>".mysql_field_type($result, $indice);
		return mysql_field_type($result, $indice);	
	}
	//devuelve el nombre del campo
	function nombreCampo($result, $indice){
	    return mysql_field_name($result, $indice);	
	}
	//devuelve la longitud del campo
	function longCampo($result, $indice){
		return mysql_field_len($result, $indice);	
	}
	
	function mostrarCampo($nombreCampo){
		if($this->acampos!="")
		{
			foreach($this->acampos as $valor)	{
				if($nombreCampo==$valor){
					return false;
					break;
				}
			}
		}
		return true;
			
	}
	//Ejecuta la consulta
	function query($sql){
		mysql_query($sql);
		if (mysql_error())
			echo "<script language=javascript>alert(\"Error:  ".mysql_error()."\")</script>";
	}
	//Crea input type = text
	function CreaTexto($Nombre,$Tamanyo,$Comentario,$valor=""){
	 	$valor=str_replace("\"","",$valor);
		if($Tamanyo<1){$Tamanyo=255;}
	 	if($Tamanyo>100)$size=100;
	 	else $size=$Tamayno;
		echo "\t
			<tr>
					<td>$Comentario</td>\n
				<td>
					<input type='text' size='$size' value='$valor' maxlength='$Tamanyo' $this->read name='$Nombre'>\n
				</td>
			</tr>\n";
	}
	//Crea input type = select a partir de una consulta SELECT
	function CreaSelect($Nombre,$Sql,$Comentario,$valor=""){
		$result = mysql_query($Sql);
		echo "\t<tr><td>$Comentario</td><td><select name='$Nombre'>\n";
		while($row=mysql_fetch_row($result))
		{
		 	if($row[0]==$valor)$seleccionar="selected";
		 	else $seleccionar="";
			echo "\t\t<option $seleccionar value='".$row[0]."'>".$row[1]."</option>\n"	;
		}
			echo "</select></td></tr>\n";
		
	}
	//Procesa Imagen
	function procesarImagen($_POST,$indice){
	  	/*global $_FILES;
		echo "<br><br> nombre:".$_FILES[$indice]['name'];
		if (is_uploaded_file($_POST[$indice]['tmp_name'])) {
			copy($_POST[$indice]['tmp_name'], "./file.jpg");
		}*/ 
	}
	
	//Crea campo para seleccionar imagenes
	function CreaImagen($Nombre,$Comentario){
	  echo "\t<tr><td>
					$Comentario
				\t</td>\n
				\t<td>
					\t\t<input type='file' size='40' name='$Nombre'>
				</td>
			</tr>\n";
	}
	
	//crea los select de campos enum con todos sus posibles valores
	function CampoEnum($tabla,$campo,$Comentario,$valor=""){
		$sql = "DESCRIBE $tabla $campo";
		$result = mysql_query($sql);
		echo "\t<tr><td>$Comentario</td>\n";
		while ($ligne = mysql_fetch_array($result)) {
			extract($ligne, EXTR_PREFIX_ALL, "IN");
			if (substr($IN_Type,0,4)=='enum'){
				$liste = substr($IN_Type,5,strlen($IN_Type));
				$liste = substr($liste,0,(strlen($liste)-2));
				$enums = explode(',',$liste);
				if (sizeof($enums)>0){
					
					echo "\t<td><select name='$campo' >\n";
					for ($i=0; $i<sizeof($enums);$i++){
						$elem = trim(strtr($enums[$i],"'"," "));
						if(trim($elem)==trim($valor))$seleccionar="selected";
					 	else $seleccionar="";
						echo "\t\t<option $seleccionar value='".$elem."'>".$elem."</option>\n";
					}
					echo "\t</select>\n";
				}
			}
		}
		echo "\t</td></tr>\n";
	}
	

	function crearInsert($_POST){
		
		$result = mysql_query($this->sql);
		$tabla = $this->nombreTabla($result,0);
		$numelementos=count( $_POST );
		$contador=0;
		$sql="INSERT INTO $tabla (\n";
		foreach($_POST as $indice => $valor){
			if($valor=="Insertar" or $valor=="Modificar") continue;
			if($contador++==$numelementos-2)
				$sql .= "\t$indice\n";
			else
				$sql .= "\t$indice,\n";
		}
		$sql.=" ) VALUES (\n";
		$contador=0;
		foreach($_POST as $indice => $valor){
			if($valor=="Insertar" or $valor=="Modificar") continue;
			if($contador++==$numelementos-2)
				$sql .= "\t'$valor'\n";
			else
				$sql .= "\t'$valor',\n";
		}
		echo $sql.=")";
	//	break;
		//echo $sql=str_replace(",|",")",$sql);
		$this->query($sql);
	//	mysql_query($sql);
	}
	
	function crearUpdate($condicion,$_POST){
 		$result = mysql_query($this->sql);
		$tabla = $this->nombreTabla($result,0);
		$numelementos=count( $_POST );
		$contador=0;
		$sql="UPDATE $tabla SET \n";
		foreach($_POST as $indice => $valor){
			if($valor=="Insertar" or $valor=="Modificar") continue;
		    if(++$contador==$numelementos-1)
				$sql .= "\t$indice='$valor'\n";
			else
				$sql .= "\t$indice='$valor',\n";
		}
		$sql.="WHERE	$condicion";
		$this->query($sql);
		//mysql_query($sql);
	}
	
	function crearDelete($condicion){
 		$result = mysql_query($this->sql);
		$tabla = $this->nombreTabla($result,0);
		$numelementos=count($_POST);
		$contador=0;
		$sql="DELETE FROM  $tabla WHERE $condicion\n";
		//mysql_query($sql);
		$this->query($sql);
	}	
	//verifica si tiene valor por default
	function valorCampo($nombreCampo){
	   if($this->val!="")
		foreach($this->val as $indice => $valor){
			if($nombreCampo==$indice){
				return $valor;
				break;
			}
		}
		
	}
	//cambia los caracteres siquientes
	function limpiar($cadena){
		$cadena=str_replace("_"," ",$cadena);//alt + 15
		$cadena=str_replace("|","=",$cadena);//alt + 10
		return $cadena=str_replace("*","'",$cadena);//alt + 16
	}
	//Crea el formulario
	function CreaFormulario($Filtro=""){

		if($Filtro!="")
			$sql=$Filtro;
		else 
			$sql=$this->sql;
		//echo $sql;
		$result=mysql_query($sql);
		$row  = mysql_fetch_array($result);
		$fields = mysql_num_fields($result);
		//$rows   = mysql_num_rows($result);
		$table = $this->nombreTabla($result, 0);
		echo "<center>\n<form action='$_SERVER[PHP_SELF]'  method='POST'>\n\n";
		echo "\n<table><caption>".$this->comentarioTabla($this->nombreTabla($result,0))."</caption>\n";
		for ($i=0; $i < $fields and mysql_field_table($result,$i)==$table; $i++) {
		  	$type  = $this->tipoCampo($result, $i);
		    $name  = $this->nombreCampo($result, $i);
			$len   = $this->longCampo($result, $i);
			$flags = $this->banderas($result, $i);
			$comment = $this->comentario($name,$table);
			$band =$this->primario($comment);
			$comment=str_replace("/*","",$comment);
		    //echo "<br>".$type . " " . $name . " " . $len . " " . $flags . "\n";
		    if(!$this->mostrarCampo($name))$this->read="readonly";
		    else $this->read="";
		    
		    //valor por default
		    if($Filtro=="" and $this->val!="" and !$band)
			 		$row[$i]=$this->valorCampo($name);

		    if(!stripos($name,"imagen") and !strpos($flags, "enum") and !$band){
		      $this->CreaTexto($name,$len,$comment,$row[$i]);
		    }
		    else  if(stripos($name,"imagen") and !$band)
			    	$this->CreaImagen($name,$comment);
			 else if(strpos($flags, "enum")){
			 		$this->CampoEnum(mysql_field_table($result, $i),$name,$comment,$row[$i]);
			}
		    else  if($band)
			 { 		
			  		if($this->select!="")
			  		foreach($this->select as $indice => $valor){
						if($indice==$name and $valor!=""){
							if(!isset($Filtro) or $Filtro=="")$row[$i]="";
							$this->CreaSelect($name,$valor,$comment,$row[$i]);			
							$CreoSelect=true;
							break;
						}
					}
			  	   if(!$CreoSelect){
			   			$this->CreaTexto($name,$len,$comment,$row[$i]);		   
			   	}
		    }
		    
		}
		echo "</table>\n";
		echo "\n<input type='submit' value='Cancelar' >\n\n";
		echo "\n<input type='submit' value='".$_SESSION['sOperacion']."' name='aceptar'>\n\n";
		echo "\n</form>\n\n</center>\n";
		mysql_free_result($result);
		exit();
	}
	//cifrar el url
	function cifrar($array,$result){
		$filtro="";
		$prefijo="Sql=";
		//obtener acmpos llaves y mezclar
		foreach($array as $indice => $valor)
		{
		 	if(is_numeric($indice))
		 	{
				$bandera=$this->banderas($result,$indice);
				$this->llave($bandera);
			}
			if($this->llave($bandera) and !is_numeric($indice))
		 	{
				$filtro.= "_$indice|*$valor*_AND";
			}
		}
		$filtro.="<";
		$filtro=str_replace("AND<","",$filtro);
		//cifrar el contenido
		$filtro=encrypt($filtro,0);
		$filtro=$prefijo.$filtro;
		return $filtro;
	}
	
	
	//muestra los registros de la tabla
	function visualizar(){
		$consulta=$this->sql;
		$result=mysql_query($consulta);
		
		echo "<center><table class='enhancedtablerowhover'>
			<caption>".$this->comentarioTabla($this->nombreTabla($result,0))."</caption>
			<thead>
			<tr>
			<td scope='col' colspan=2></td>
			";
		for($i=0;$i<mysql_num_fields($result);$i++)
		{	
		 	if(!$this->mostrarCampo($this->nombreCampo($result,$i)) or stripos($this->nombreCampo($result,$i),"imagen"))continue;
		 	$des = str_replace("/*","",$this->comentario($this->nombreCampo($result, $i), $this->nombreTabla($result,  $i)));
			echo "<th scope='col' ><a href='?order='>$des</a></th>";
		}
		echo"	
		</tr>
		</thead>
		<tbody>";
		while ($row = mysql_fetch_array($result)) {
		$filtro=$this->cifrar($row,$result);
		echo "<tr>";
		echo "<td class='CrearReporte'>
				<a href='$_SERVER[PHP_SELF]?operacion=m&$filtro'>
				<img src='".$this->PathImages."editar.png'>
			</a>
		  </td>";
		echo "<td class='CrearReporte' >
	      <a href='$_SERVER[PHP_SELF]?operacion=b&$filtro'>
				<img src='".$this->PathImages."eliminar.png'>
				</a>
			  </td>
			  ";
		  //?columna=$row[0]&operacion=q 
		for ($i = 0; $i < mysql_num_fields($result); $i++){
		 	if(!$this->mostrarCampo($this->nombreCampo($result,$i)) or stripos($this->nombreCampo($result,$i),"imagen"))continue;
			echo "<td>".$row[$i]."</td>";
		}
		echo "</tr>";
	}
	echo "</tr></tbody></table></center>";
	}
}
?> 