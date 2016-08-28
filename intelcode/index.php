<?php
session_start();
//header("Location:PanelAdministracion.html");

if(isset($_SESSION['ssUsuario']))
  header("Location:frmMenu.php");
else
  header("Location:frmLogin.php");
?>
