<?php
$rutaTermina="termina.php";
if(isset($_SESSION['ssUsuario']) and isset($_SESSION['ssContrasena']))
{
   $sql="SELECT sIdUsuario,sPassword,sNombre,lAcceso FROM usuarios WHERE sIdUsuario='".$_SESSION['ssUsuario']."' ";
	
   $resul=mysql_query($sql,$link);
   //AND sPassword='".$_SESSION['ssContrasena']."'
   $t=md5($_SESSION["complemento"] .getenv("REMOTE_ADDR"));
    while($row = mysql_fetch_array($resul)){
    #   if(md5(md5($row["sPassword"]) . $t)!=$_SESSION['ssContrasena']){
if($row["sPassword"]!=$_SESSION['ssContrasena']){
	 #if($row["sPassword"]!=$_SESSION['ssContrasena']){
         mensaje("El usuario no Existe o escribio incorrectamente el Id y el Password");
         require("$rutaTermina");   
         exit();
      }else if($row['lAcceso']=='No'){
         mensaje("Por causas de fuerzas mayor su acceso ha sido restringido");
         require("$rutaTermina");   
      }
      else{
         $_SESSION['sIdUsuario']=$row['sIdUsuario'];
         $_SESSION['sNombreUsuario']=$row['sNombre'];
      }
   }
}
else
{
   mensaje("La Sesion Finalizo, Probablemente  Por Mantener la Pagina Demasiado Tiempo en Inactividad!!!");
   require("$rutaTermina");   
   exit();
}
?>
