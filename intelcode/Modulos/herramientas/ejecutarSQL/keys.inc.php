<?php
require("../../include/mysql.inc.php");
class ejecutor {
	function readFile($file,$pathFileSql="./"){
	   global $link,$BaseDatos;
	   echo "\nArchivo $file <br><br>";
		$file = fopen($file,'a+');
		mysql_query("begin",$link);
		while(!feof($file)){
			$line = fgets($file);
			if($line[0]!="-" and $line[1]!="-" and $line[2]!=""){
			   echo "\n<br><font size= 1> Ejecutando :".$line."</font>";
			   mysql_query($line,$link);
				if(mysql_error()){
					echo "<br><center><font size=2>Error In: $line</font></center>";
					mysql_query("rollback",$link);
					$this->myerror();
					
				}
			}
		}
		echo "\n<br><br>";
		mysql_query("commit");
		mysql_select_db($BaseDatos);
		fclose($file);
	}
	function leeDir($pathFileSql){
      // habre un directorio, borra su contenido, despues borra el mismo directorio
  		$dir =$pathFileSql;
		echo "<center>Procesando Directorio: ".  $dir ."</center>";      
      if (is_dir($dir)) {
       	if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
               if(filetype($dir.$file)=="file"){
                  $this->readFile($dir.$file,$pathFileSql);
               }
            }
            closedir($dh);
            $this->limpiaDir($pathFileSql);
         }
      }
   }
	function limpiaDir($pathFileSql){
      // habre un directorio, borra su contenido, despues borra el mismo directorio
      $dir =$pathFileSql;
      if (is_dir($dir)) {
         if ($dh = opendir($dir)) {
            while (($file = readdir($dh)) !== false) {
               if(filetype($dir.$file)=="file"){
                  unlink($dir.$file);
               }
            }
            closedir($dh);
         }
      }
   }
	function myerror(){
	   global $link;
		echo "<center><font size=2>";
		echo "<br>Error: ".mysql_errno($link);
		echo "<br>".mysql_error($link);
		echo "</font></center>";
		exit(0);
	}
}

?>