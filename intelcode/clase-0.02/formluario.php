<?php
/*
Descripcion:
	Crea un formulario web a partir de una consulta proporcionada
*/
session_start();
$_SESSION['ssUsuario']="imolina";
$_SESSION['ssContrasena']="danae";
echo "<style type='text/css'>@import '../Modulos/estilos/estilo1.css';</style>";
if($_SESSION['sOperacion']=="Modificar")
	echo "<center>Actualizando</center>";	
else if($_SESSION['sOperacion']=="Insertar")
	echo "<center>insertar";
else
	echo "<center><a href='$_SERVER[PHP_SELF]?opcion=a'>insertar</a>";
require("../Modulos/include/mysql.inc.php");
//cambia los caracteres siquientes
 		//valor campo
		//_ => espacio
		//| => igual
		//* => comillas simples

function limpiar($sql){
		$sql=str_replace("_"," ",$sql);
		$sql=str_replace("|","=",$sql);
		return $sql=str_replace("*","'",$sql);
}
//verifica si un campo es llave en las tablas
function llave($banderas){
 	$banderas;
	if(strpos($banderas,"_key"))
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
	return mysql_field_table($result, $indice);
}
//devuelve las banderas del campo
function banderas($result,$indice){
	return mysql_field_flags($result, $indice);
}
//devuelve el tipo de campo
function tipoCampo($result, $indice){
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


//Crea input type = text
function CreaTexto($Nombre,$Tamanyo,$Comentario,$valor=""){
 	if($Tamanyo>50)$size=50;
 	else $size=$Tamayno;
	echo "\t
		<tr>
				<td>$Comentario</td>\n
			<td>
				<input type='text' size='$size' maxlength='$Tamanyo' name='$Nombre' value='$valor'>\n
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
//Crea campo para seleccionar imagenes
function CreaImagen($Nombre,$Comentario){
  echo "\t<tr><td>
				$Comentario
			\t</td>\n
			\t<td>
				\t\t<input type='text' size='20' name='$Nombre'>
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
			 	 	if(trim($row[0])==trim($valor))$seleccionar="selected";
				 	else $seleccionar="";
					$elem = strtr($enums[$i],"'"," ");
					echo "\t\t<option $seleccionar value='".$elem."'>".$elem."</option>\n";
				}
				echo "\t</select>\n";
			}
		}
	}
	echo "\t</td></tr>\n";
}

//muestra los registros de la tabla
function visualizar($sql){
$consulta=$sql;
$result=mysql_query($consulta);

	echo "<table class='enhancedtablerowhover'>
			<caption>Embarcaciones</caption>
			<thead>
			<tr>
			<td scope='col' colspan=2></td>
			";
			for($i=0;$i<mysql_num_fields($result);$i++)
			{	
			 	$des = str_replace("/*","",comentario(nombreCampo($result, $i), nombreTabla($result,  $i)));
				echo "<th scope='col' ><a href='?order='>$des</a></th>";
			}
	echo"	
		</tr>
		</thead>
		<tbody>";
while ($row = mysql_fetch_row($result)) {
 	//crear filtro
 	$tabla=nombreTabla($result,0);
 	$filtro="";
	$filtro.="Sql=";
	for ($i = 0; $i < mysql_num_fields($result); $i++){
		//nombre campo
		$campo=nombreCampo($result,$i);
		$banderas=banderas($result,$i);
		$band=llave($banderas);
		if($band)
		{
				$filtro.= "_$tabla.$campo|*$row[$i]*_AND";
		}
	}
	$filtro.=">";
	$filtro=str_replace("AND>","",$filtro);
	echo "<tr>";
	echo "<td class='CrearReporte'>
			<a href='$_SERVER[PHP_SELF]?operacion=m&$filtro'>
				<img src='../../../imagenes/editar.png'>
			</a>
		  </td>";
	echo "<td class='CrearReporte' onclick=\"confirmaEliminar('$row[0]');\">
	      <a href='#?$row[0]'>
				<img src='../../../imagenes/eliminar.png'>
				</a>
			  </td>
			  ";
		  //?columna=$row[0]&operacion=q 
	for ($i = 0; $i < mysql_num_fields($result); $i++){
		echo "<td>".$row[$i]."</td>";
	}
	echo "</tr>";

}
echo "</tr></tbody></table>";
}

function CreaFormulario($Sql,$select,$Filtro=""){
	$result = mysql_query($Sql);
	$row=mysql_fetch_array($result);
	$fields = mysql_num_fields($result);
	//$rows   = mysql_num_rows($result);
	$table = nombreTabla($result, 0);


	echo "\n<form action='ejecutor.php'  method='POST'>\n\n";
	echo "<center>\n<table>\n";
	for ($i=0; $i < $fields and mysql_field_table($result,$i)==$table; $i++) {
	    $type  = tipoCampo($result, $i);
	    $name  = nombreCampo($result, $i);
		$len   = longCampo($result, $i);
		$flags = banderas($result, $i);
		$comment = comentario($name,$table);
		$band=primario($comment);
		$comment=str_replace("/*","",$comment);
	    //echo "<br>".$type . " " . $name . " " . $len . " " . $flags . "\n";
	    
	    if($type=="string"  and !strpos($flags, "enum") and !$band)
	        	CreaTexto($name,$len,$comment,$row[$i]);
	    else  if($type=="blob")
		    	CreaImagen($name,$comment);
		 else if(strpos($flags, "enum"))
		 		CampoEnum(mysql_field_table($result, $i),$name,$comment,$row[$i]);
	    else  if($band)
		 { 	
		  		foreach($select as $indice => $valor){
					if($indice==$name and $valor!=""){
						CreaSelect($name,$valor,$comment,$row[$i]);			
						$CreoSelect=true;
						break;
					}
				}
		  	   if(!$CreoSelect)
		   			CreaTexto($name,$len,$comment,$row[$i]);		   
	    }
	    
	}
	echo "</table>\n";
	echo "\n<input type='button' value='Cancelar'>\n\n";
	echo "\n<input type='submit' value='Aceptar'>\n\n";
	echo "\n</form>\n\n</center>\n";
	mysql_free_result($result);
}


/*esto debe de ir en el archivo de modulo*/
$sqlselect = array("sIdTipoEmbarcacion"=>"select sIdTipoEmbarcacion,sDescripcion from tiposdeembarcacion");

$sqlformulario="SELECT embarcaciones.*, tiposdeembarcacion.sDescripcion FROM embarcaciones inner join tiposdeembarcacion on (embarcaciones.sIdTipoEmbarcacion = tiposdeembarcacion.sIdTipoEmbarcacion )";

if($_REQUEST['opcion']=="a"){
	CreaFormulario($sqlformulario,&$sqlselect);
	$_SESSION['sOperacion']="Insertar";
}
if($_REQUEST['operacion']=="m"){
   $sqlFinal=$sqlformulario."\n where ".limpiar($_REQUEST['Sql']);
   CreaFormulario($sqlFinal,&$sqlselect);	
   $_SESSION['sOperacion']="Modificar";
}
else
	visualizar($sqlformulario);

mysql_close();
?> 
