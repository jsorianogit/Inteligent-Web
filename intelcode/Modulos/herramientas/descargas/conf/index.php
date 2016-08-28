<?php
function descargar($path,$f){
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=\"$f\"\n");
    $fp=fopen("$path$f", "r");
    fpassthru($fp);
}
if(!$principal)
   $path="../files/";
else
   $path ="../intelcode/Modulos/herramientas/descargas/files/";
#Si se dio clic en un enlace de archivo, descargarlo
$f = ($_GET["file"]!="")?$_GET["file"]:"";

if(!$principal)
   require ("../../../include/mysql.inc.php");
else{
  // require ("../intelcode/Modulos/include/mysql.inc.php");
  $PathEstilos = "../intelcode/Modulos/estilos/";
  $PathInclude = "../intelcode/Modulos/include/";
}

if($f ){//and isset($_SESSION['sIdUsuario'])
   descargar($path,$f);
   exit();
}
#Imprimir los estilos
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
#imprimir archivos en el directorio
echo "<center>\n";
$directorio=dir($path);
echo "<table border = 5 class='enhancedtablerowhover'>\n";
   echo "<caption>Descargas IntelCode.com.mx</option>\n";
   echo "<tr>\n";
      echo "<th>";
         echo "Archivo";
      echo "</th>";
      echo "<th>";
         echo "Tamaño";
      echo "</th>";
      echo "<th>";
         echo "Ultima Modificacion";
      echo "</th>";
   echo "<tr>\n";
while ($archivo = $directorio->read())
{

   if(is_file($path.$archivo)){
     echo "<tr>\n";
         #Nombre
        echo "<td>\n";
           echo "<a href='?file=$archivo'>$archivo</a> \n";;
        echo "</td>\n";
        #Tamanio de archivo
        echo "<td align='RIGHT'>\n";
            $tam =  filesize($path.$archivo) / 1024;
           echo number_format(($tam),2,'.',',') ;
        echo " Mb</td>\n";
         #Fecha y hora de ultima modicicacion
        echo "<td>\n";
            echo  date("F d Y H:i:s.", filemtime($path.$archivo)) ."<br>\n";
        echo "</td>\n";
     echo "</tr>\n";

   }
}
echo "</table>\n</center>\n";
//filesize($nombre_archivo) . ' bytes'
$directorio->close(); 

?>
