<?php session_start(); ?>
<html>
<head>
</head>
<body>
<center>
<?php
require ("../../include/mysql.inc.php");
echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";

$sIdUsario = $_SESSION['sIdUsuario'];
$sPassAct = $_POST['sPasswordAct'];
$sPass = $_POST['sPassword'];
$sql = "select * from usuarios where sPassword='$sPassAct' and sIdUsuario='$sIdUsario'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
	$sql = "update usuarios set sPassword='$sPass' where sIdUsuario='$sIdUsario' and sPassword='$sPassAct'";
	$result = mysql_query($sql);
	#Actualizar los campos de mysql
	mysql_select_db("mysql");
	
	$sqlPrivilegios ="DROP USER '$sIdUsario'@'%'"; 
	mysql_query($sqlPrivilegios);
   $sqlUser = "	UPDATE user SET Host='%',User='$sIdUsario',Password=PASSWORD('$sPass') 
   								WHERE Host='%' AND User='$sIdUsario' "; 
	mysql_query($sqlUser);
	$sqlGrant = "GRANT insert,select,update,delete ON intelcode.* TO '$sIdUsario'@'%' IDENTIFIED BY '$sPass'" ;
	mysql_query($sqlGrant);
	mysql_query("FLUSH PRIVILEGES;");
		
	mysql_select_db($BaseDatos);	
	if(mysql_error()){
		echo "<a href=''>Ocurrio un error! <br>Regresar </a>";
	}
	else{
	   $_SESSION['ssUsuario']=$sIdUsario;
	   $_SESSION['ssContrasena']=$sPass;
	   mensaje("Cambios Aplicados con Exito !");
	   location("index.php");
	   //echo "<a href=''><br>Cambis Aplicados<br>[Regresar]</a>";
	}
}
else{
		mensaje("Contraseña Incorrecta !");
		location("index.php");
		//echo "<a href=''><font size=2><br>Contraseña incorrecta <br>[Regresar]</font></a>";
	}
?>
</center>
</body>
</html>