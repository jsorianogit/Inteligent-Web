<?php
session_start();
if(isset($_SESSION['ssUsuario']))
{
session_destroy();
}
echo "<SCRIPT LANGUAGE=\"javascript\">location.href = \"\";</SCRIPT>;";
?> 
