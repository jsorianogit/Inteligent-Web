<?php
class ftp {
	var $user;
	var $password;
	var $server;
	var $port;
	var $id_ftp;

	function ftp(){
		$this->user="anonymous";
		$this->password="";
		$this->server="localhost";
		$this->port=21;
	}
	function info($user,$password,$server,$port=21){
		$this->user=$user;
		$this->password=$password;
		$this->server=$server;
		$this->port=$port;
	}
	function ConectarFTP(){
		$this->id_ftp=ftp_connect($this->server,$this->port); 
		$login = ftp_login($this->id_ftp,$this->user,$this->password); 
		ftp_pasv($this->id_ftp,MODO); //Establece el modo de conexión
		if(!$this->id_ftp or !$login)
			$this->error("001");
	}
	function obtenerArchivo($Remotefile,$Destinationfile){
		//ini_set("error_reporting"," E_ALL & ~E_NOTICE");
		$Remote = $Remotefile;
		$Destination = fopen($Destinationfile, 'w');
		if (!ftp_fget($this->id_ftp, $Destination, $Remote, FTP_ASCII, 0)) 
			$this->error("002");		
		fclose($Destination);
	}
	function CerrarFTP(){
		ftp_quit($this->id_ftp); //Cierra la conexion FTP
	}
	function SubirArchivo($archivo_local,$archivo_remoto){
		$this->imprime("Subiendo: $archivo_local");
		if(!ftp_put($this->id_ftp,$archivo_remoto,$archivo_local,FTP_BINARY))
			$this->error("003");
		
	}
	function borrarArchivo($file){
		if(!ftp_delete($this->id_ftp,$file))
			$this->error("004"); 
	}
	function moveraRuta($ruta){
		if(!ftp_chdir($this->id_ftp,$ruta))
			$this->error("005"); 
	}
	function borrarRuta($ruta){
		if(!ftp_rmdir($this->id_ftp,$ruta))
			$this->error("006"); 
	}
	function listar(){//rawlist
		if(!$content = ftp_nlist($this->id_ftp,"./"))
			$this->error("007");
		else{
			foreach($content as $file)
				$this->imprime($file);
		}
	}
	function SubirArchivos($path){
      if (is_dir($path)) {
         if ($dh = opendir($path)) {
            while (($file = readdir($dh)) !== false) {
               if(filetype($path.$file)=="file" and $file!="" and $file !=".."){
                  $this->SubirArchivo($path.$file,$file);
               }
            }
            closedir($dh);
         }
      }
	}
	function obtenerArchivos($pathDestination="./",$path="./"){
  		if($content = ftp_nlist($this->id_ftp,$path))
			foreach($content as $file)
				 $this->obtenerArchivo($file,$pathDestination.$file);
	}
	function limpiarDir()
   {
  		if($content = ftp_nlist($this->id_ftp,"./"))
			foreach($content as $file)
				 $this->borrarArchivo($file);
   }
	function obtenerRuta(){
		$Directorio=ftp_pwd($this->id_ftp); 
		return $Directorio; 
	}
	function error($numError){
		$error = array(
			"001"=>"No se puede establecer la coneccion",
			"002"=>"No se puede Descargar el Archivo",
			"003"=>"No se puede Subir el Archivo",
			"004"=>"No se puede Eliminar el Archivo",
			"005"=>"No se puede Mover al Directorio",
			"006"=>"No se puede Eliminar el Directorio",
			"007"=>"No se puede Mostrar el Contenido o Esta vacio"
			);
			echo "<br><center><font color='red'>".$error[$numError]."</font></center>";
	}
	function imprime($mensaje){
			echo "<br><font color='blue' size =2>$mensaje</font>";
	}
}
?>

