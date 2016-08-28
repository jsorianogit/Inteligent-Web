<?php

class keys {
	
	var $user;
	var $password;
	var $host ;
	var $tables;
	var $conId ;
	function keys(){
		if($this->user=="") $this->user = "root" ;
		if($this->password =="") $this->password = "";
		if($this->host=="") $this->host = "localhost";
	}
	function connect(){
		if(!$this->conId = @mysql_connect($this->host,$this->user,$this->password)){
			$this->myerror();		
		}
		if(file_exists("sql.sql"))
			unlink("sql.sql");

	}
	function title($title){
		$title ="\n-- Tabla $title\n";
		$file = fopen("sql.sql",'a+');
		fwrite($file,$title);
		fclose($file);		
	}
	function lis($field){
		$file = fopen("sql.sql",'a+');
		fwrite($file,$field."\n");
		fclose($file);
	}
	function readFile($file){
		$file = fopen($file,'a+');
		mysql_query("begin");
		while(!feof($file)){
			$line = fgets($file);
			if($line[0]!="-" and $line[1]!="-" and $line[2]!=""){
			   echo "\n<br><font size= 1> Ejecutando :".$line."</font>";
			   mysql_query($line,$this->conId);
				if(mysql_error()){
					echo "<br><center><font size=2>Error In: $line</font></center>";
					mysql_query("rollback");
					$this->myerror();
					
				}
			}
		}
		mysql_query("commit");
		fclose($file);
		
	}
	function myerror(){
		echo "<center><font size=2>";
		echo "<br>Error: ".mysql_errno();//$this->conId
		echo "<br>".mysql_error();//$this->conId
		echo "</font></center>";
		exit(0);
	}
	function setInfoCon($user,$password,$host){
		$this->user = $user ;
		$this->password = $password ;
		$this->host = $host ;
		$this->connect();
	}
	function setData($database){
		if(!mysql_select_db($database,$this->conId)){
			$this->myerror();
		}
		else{
			$this->database=$database;
			$file = fopen("sql.sql",'a+');
		}
	}
	function setTables($tables=array("none")){
		$this->tables=$tables;
	}
	//regresa un array con los nombre de las tablas
	function getTables(){
		unset($tables);
		$sql = "show tables";
		if(!$result = @mysql_query($sql,$this->conId))
			$this->myerror();
		while($row = @mysql_fetch_array($result)){
			$tables[]=$row[0];
		}
		return $tables;

	}
	//regresa el Id de consulta de fields
	function getFields($table){
		unset($fields);
		$sql = "show full fields from $table";
		if(!$result = @mysql_query($sql,$this->conId))
			$this->myerror();
		else 
			return $result;
	}
	function showKeys(){
		$tables = $this->getTables();
		unset($fields);
		foreach($tables as $table){
			$fields = $this->getFields($table);
			if(isset($fields)){
				$this->title($table);
				while($row = mysql_fetch_array($fields)){
				 	if($row[8]=="")continue;
					//if($row[3]=="PRI")
					if($row[3]=="NO") $null="NOT";else $null="";
					if($row[2]!="")$collation="CHARACTER SET latin1 COLLATE $collation $row[2]";else $collation="";
					if($row[5]!="")$def = "DEFAULT '$row[5]'"; else $def ="";
					$sql = "ALTER TABLE $table CHANGE $row[0] $row[0] $row[1]  $null NULL $def COMMENT '$row[8]';";
						$this->lis($sql);
				}
			}
			unset($fields);
		}
	}
}

?>