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
require ("../../include/mysql.inc.php");
#get the post vars
if(isset($_POST['usuario'])) $usuario = $_POST['usuario'];
if(isset($_POST['clave'])) $clave = $_POST['clave'];
if(isset($_POST['host'])) $host = $_POST['host'];
echo "<br>Copiando Archivo";
flush();
ob_flush ();

#cargar el archivo
if (is_uploaded_file($HTTP_POST_FILES['archivo']['tmp_name'])) {
   copy($HTTP_POST_FILES['archivo']['tmp_name'], $HTTP_POST_FILES['archivo']['name']);
   $subio = true;
}
echo "<br>LAS OPERACIONES SE ESTAN REALIZANDO SOBRE   : <FONT COLOR=BLUE>".$_SESSION['database']."</FONT><br>";
echo "<br>Ejecutando espere...<br>";
flush();
ob_flush ();

if($subio) {
   #leer el archivo
   $archivo = $HTTP_POST_FILES['archivo']['name'];
   $file  = fopen("$archivo","a+");
   $contents = fread($file , filesize($archivo));
   fclose($file);

   #separar los enter's
   $lineas = explode("\n",$contents);
   mysql_query("begin");

   #formar los querys
   foreach($lineas as $linea){
     $linea = trim($linea);
     if($linea[strlen($linea)-1]==";") {
         $sqlAction .= "\n$linea ";
         mysql_query($sqlAction);
         if(mysql_error()){
            echo "<center>";
            echo "<p><font color=black size=2># ERROR EN :</font></p>";
            echo "<p><font color=blue size=2>$sqlAction</font></p>";
            echo "<p><font color=red size=2>".mysql_error()."</font></p>";
            echo "</center>";
            $error = true;
            break;
         }
         $sqlAction ="";
     }
     else{
          $sqlAction.="\n$linea " ;
     }
   }
   #aceptar transaccion
   if($error == false){
      mysql_query("commit");
      echo "Proceso finalizado con exito...";
      echo "<a href='index.php'>Regresar</a>";
   }else{
      mysql_query("rollback");
      echo "Hay errores en el archivo, verifiquelo e intentelo nuevamente...";
      echo "<a href='index.php'>Regresar</a>";
   }
   unlink($archivo);
} else {
    echo "<br>El archivo no cumple con las reglas establecidas";
}

?>
