<?php
session_start();
set_time_limit(0);
ini_set("register_long_arrays","On");
ini_set("register_argc_argv","On");
ini_set("post_max_size","200M");
ini_set("magic_quotes_gpc","On");
ini_set("magic_quotes_runtime","Off");
ini_set("magic_quotes_sybase","Off");
flush();
ob_flush ();
require ("keys.inc.php");
#get the post vars
if(isset($_POST['usuario'])) $usuario = $_POST['usuario'];
if(isset($_POST['clave'])) $clave = $_POST['clave'];
if(isset($_POST['host'])) $host = $_POST['host'];
echo "<br>Copiando Archivo";
flush();
ob_flush ();
   
#load the file sumited
if (is_uploaded_file($HTTP_POST_FILES['archivo']['tmp_name'])) {
   copy($HTTP_POST_FILES['archivo']['tmp_name'], $HTTP_POST_FILES['archivo']['name']);
    $subio = true;
}
echo "<br>Ejecutando Archivo";
flush();
ob_flush ();

if($subio) {
   #create a new claves objet
   $claves = new keys();
   $claves->setInfoCon($usuario,$clave,$host);
   #Set the database
   echo "<br>Base de Datos: ".$_SESSION['database']."<br>";
   if (isset($_SESSION['database']))
      $claves->setData($_SESSION['database']);
   else
      $claves->setData("intelcode");
   $claves->readFile($HTTP_POST_FILES['archivo']['name']);
} else {
    echo "El archivo no cumple con las reglas establecidas";
}
//$claves = new keys();
//$claves->setInfoCon("root","danae","localhost");
//$claves->setData("intelcode");
//$claves->readFile("intelcode.0.83.sql");
?>
