<?php
//Funciones de Base de datos
function conexion($host,$user,$pass,$bd){
	$h=$host;
	$u=$user;
	$p=$pass;
	$DB=$bd;
//variables
	if(!$link=mysql_connect($h,$u,$p)){
		error(2);
		return false;
	}
	elseif(!mysql_select_db($DB,$link)){
		error(3);
		return false;
	}
	return $link;
}
function consulta($campos,$tabla,$condicion){
	//$link=conexion();
	if(!$condicion){
		$sql="SELECT ".$campos." FROM ".$tabla;
		$query=mysql_query($sql);
		verifica_query($query);
	}
	else{
		$sql="SELECT ".$campos." FROM ".$tabla." WHERE ".$condicion;
		$query=mysql_query($sql);
		verifica_query($query);
	}
	return $query;
}
function inserta($tbla, $campos, $values,$link){
	//$link=conexion();
	$sql="INSERT INTO ".$tbla."(".$campos.") VALUES(".$values.")";
	$query=mysql_query($sql,$link);
	verifica_query($query);
}
function elimina($tbla, $condicion,$link){
	//$link=conexion();
	$sql="DELETE FROM ".$tbla." WHERE ".$condicion;
	$query=mysql_query($sql,$link);
	verifica_query($query);
}
function modifica($tbla, $campos, $cond,$link){
	//$link=conexion();
	$sql="UPDATE ".$tbla." SET ".$campos." WHERE ".$cond;
	$query=mysql_query($sql,$link);
	verifica_query($query);
}
function verifica_query($query){
	if(!$query){
		error(1);
	}
	else{
		return true;
	}
}

//funciones de control
function error($opc){
	switch($opc){
		case 1:
			echo "<script>alert('Error al realizar la consulta, intentelo de nuevo o contacte a su administrador del sistema');</script>";
			break;
		case 2:
			echo "<script>alert('Error al conectar con el servidor de Base de datos');</script>";
			break;
		case 3:
			echo "<script>alert('Error al conectar con la Base de datos');</script>";
			break;
		}	
	return true;
}
?>
