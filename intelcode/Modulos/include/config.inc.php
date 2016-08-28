<?php
session_start();

###########  configuracion del servidor de base de datos
$Servidor="127.0.0.1";
$Usuario="root";
$Clave="danae";

###########  Configuracion del servidor web
$ServidorWeb="localhost";

###########  configuracion del directorio raiz (index o pagina principal)
$pathAbsolute = "http://$ServidorWeb/Inteligentweb/";

###########  raiz para el sistema
$raiz = "E:/www/Inteligentweb/";

###########  captura del contrato (no tocar)
if(isset($_SESSION['ssContrato']))$sContrato=$_SESSION['ssContrato'];
else $sContrato = "OT-01.G";

###########  captura del convenio actual (no tocar)
if(isset($_SESSION['ssIdConvenio'])) $sIdConvenioAct=$_SESSION['ssIdConvenio'];
else $sIdConvenioAct ="";

###########  captura del turno  (no tocar)
if(isset($_SESSION['ssIdTurno']))$sIdTurnoAct=$_SESSION['ssIdTurno'];
else $sIdTurnoAct = "A";


###########  configuracion de las rutas (no tocar)

if (function_exists("get_browser") and ini_get('browscap ') !="" )
{
   #configuracion de las rutas (no tocar)
   $browser = get_browser(null , true);

   if(strpos(strtolower($browser['browser_name_regex']), "msie")or
   strpos(strtolower($browser['browser_name_pattern']), "msie"))
   {
      $PathEstilos = $pathAbsolute . "intelcode/Modulos/estilos_ie/";
   }
   else
   {
      $PathEstilos = $pathAbsolute . "intelcode/Modulos/estilos_firefox/";
   }
}
else
{
   $PathEstilos = $pathAbsolute . "intelcode/Modulos/estilos_firefox/";
}


$PathInclude = $pathAbsolute."intelcode/Modulos/include/";
$PathImagenes = $pathAbsolute."intelcode/Modulos/imagenes/";
$PathModulos = $pathAbsolute."intelcode/Modulos/";

###########  color de los cuadros de textos
$ColorTextBox="#FFCC99";

?>
