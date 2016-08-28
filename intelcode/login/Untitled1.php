<?php
session_start();
// Configure

include_once("support/Untitled1.config.php");

// Define page class

class TUntitled1 extends TTpPage
{


  function TpButton1Click(&$inSender)
  {
  	 $_SESSION['database']=$this->esquema->Value;
  	 $_SESSION['ssUsuario']=$this->a->Value;
    $_SESSION['ssContrasena']=$this->b->Value;
    #conectar al servidor
    mysql_connect("127.0.0.1","root","danae");
    #seleccionae esquema
    mysql_select_db($this->esquema->Value);
    #consulta de login
    $sql = "select * from usuarios where sIdUsuario='".$this->a->Value."'";
    $sql.= "and sPassword='".$this->b->Value."'";
    #realizar busqueda
    $rs = mysql_query($sql);
    if($row = mysql_fetch_array($rs)){
      header("Location:../frmSelContrato.php");
    }
    else{
      $this->error->Caption = "Login Fallo";
    }

  }
}

// Create and display page

$Untitled1 = new TUntitled1($tpTemplateFile);
$Untitled1->Run();

?>
