<?php
//Includes
//require_once("vcl/vcl.inc.php");
require_once("rpcl/rpcl.inc.php");
require_once("mysql.inc.php");
use_unit("buttons.inc.php");
use_unit("menus.inc.php");
use_unit("actnlist.inc.php");
use_unit("comctrls.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
//Class definition
if($_SESSION["complemento"] == "")
   $_SESSION["complemento"] = md5(date("l dS of F Y h:i:s A"));
class FrmLogin extends Page
{
   public $Label1 = null;
   public $txtServidor = null;
   public $txtUsuario = null;
   public $txtPassword = null;
   public $txtBaseDeDatos = null;
   public $hPanel = null;
   public $wLogin = null;
   public $Image1 = null;
   public $Panel1 = null;
   public $Label3 = null;
   public $Label4 = null;
   public $cmbDatabase = null;
   public $cmdAceptar = null;
   public $cmdCancel = null;
   public $lblMensajes2 = null;
   public $txtPasswd = null;
   public $Panel2 = null;
   public $cmdLogin = null;
   public $cmdRegresar = null;
   public $lblMensajes1 = null;
   public $txtUser = null;
   function txtPasswdJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here
                if(event.keyCode=='13'){
                       var md5_pre=hex_md5(document.getElementById("txtPasswd").value);
                       var md5=hex_md5(md5_pre+"<?php echo md5($_SESSION["complemento"] . getenv("REMOTE_ADDR"));?>");
                       document.getElementById("txtPasswd").value=md5;
                       return false;
                }
      <?php

   }

   function cmdLoginJSClick($sender, $params)
   {

      ?>
               //Add your javascript code here
                  document.getElementById("txtUsuario").value = document.getElementById("txtUser").value;
                  return true;
      <?php

   }

   function cmdCancelJSClick($sender, $params)
   {

      ?>
               //Add your javascript code here
//                 document.getElementById("hPanel").value ="";
//                 document.getElementById("Panel1_outer").style.display='none';
//                 document.getElementById("Panel2_outer").style.display='block';
//                 return false;
                 document.getElementById("hPanel").value ="";
                 document.location.href='Modulos/include/termina.php';

                 return false;

      <?php

   }

   function cmdLoginClick($sender, $params)
   {
      //                  $found = false;
      //                  $sql = "select sDatabase from usersdb.usersdb where usersdb.sIdUsuario='".$this->txtUser->getText()."'  ORDER BY sDatabase";
      //                  $rs = mysql_query($sql);
      //                  unset($it[$rw[0]]);
      //                  while($rw = mysql_fetch_array($rs)){
      //                     $found = true;
      //                     $it[$rw[0]] = $rw[0];
      //                  }
      //                  if($found){
      //                     $this->lblMensajes1->setCaption("");
      //                     $this->cmbDatabase->setItems($it);
      //                     $this->Panel2->setVisible(true);
      //                     $this->Panel1->setVisible(false);
      //                     $this->hPanel->Value=2;
      //                  }else{
      //                     $this->lblMensajes1->setCaption("No se encontro el usuario !!");
      //                     $this->lblMensajes1->setColor("#FF0000");
      //                     $this->hPanel->Value="";
      //                  }
      $found = false;
      $sqlDatabases = "show databases ";
      $sqlTablaUsuarios = "show tables from <database> like '%usuarios%'  ";
      $sqlUsuarioExiste = "select sIdUsuario from <database>.usuarios  where sIdUsuario = '" . $this->txtUser->getText() . "' ";
      $rsDatabases = mysql_query($sqlDatabases);
      unset($it[$rw[0]]);
      //Mostrar todas las bases de datos
      while($rwDatabases = mysql_fetch_array($rsDatabases))
      {
         //La base de datos actual contiene una tabla llamada usuarios?
         $TMPsqlTablaUsuarios = str_replace("<database>", $rwDatabases[0], $sqlTablaUsuarios);
         $rsTablaUsuarios = mysql_query($TMPsqlTablaUsuarios);
         if($rwTablaUsuarios = mysql_fetch_array($rsTablaUsuarios))
         {
            //Existe el usuario en la base de datos actual ?
            $TMPUsuarioExiste = str_replace("<database>", $rwDatabases[0], $sqlUsuarioExiste);
            $rsUsuarioExiste = mysql_query($TMPUsuarioExiste);
            if($rwUsuarioExiste = mysql_fetch_array($rsUsuarioExiste))
            {
               //Si la base de datos actual tiene la tabla usuarios y
               //en la tabla usuarios existe el usuario escrito en el campo
               //agregar la base de datos a la listas
               $found = true;
               $it[$rwDatabases[0]] = $rwDatabases[0];
            }
         }
      }
      if($found)
      {
         $this->lblMensajes1->setCaption("");
         $this->cmbDatabase->setItems($it);
         $this->Panel2->setVisible(true);
         $this->Panel1->setVisible(false);
         $this->Label1->setVisible(false);
         $this->hPanel->Value = 2;
      }
      else
      {
         $this->lblMensajes1->setCaption("No se encontro el usuario en ningun centro de datos !!");
         $this->lblMensajes1->setColor("#FF0000");
         $this->hPanel->Value = "";
      }
   }




   function FrmLoginShow($sender, $params)
   {
      if($this->hPanel->Value == "2")
      {
         $this->Panel2->setVisible(false);
         $this->Panel1->setVisible(true);
         $this->Label1->setVisible(false);
      }
      else
      {
         $this->Panel2->setVisible(true);
         $this->Panel1->setVisible(false);
         $this->Label1->setVisible(true);
      }

   }





   function txtPasswdJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here
                                  document.getElementById("txtPasswd").value="";
                                  return false;
      <?php

   }

   function txtPasswdJSBlur($sender, $params)
   {

      ?>
               //var md5_pre=hex_md5(document.getElementById("txtPasswd").value);
               //var md5=hex_md5(md5_pre+"<?php echo md5($_SESSION["complemento"] . getenv("REMOTE_ADDR"));?>");
               //document.getElementById("txtPasswd").value=md5;
               //return false;
               //Add your javascript code here

      <?php

   }

   function txtUserJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtUserJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtUserJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtServerJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtServerJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtServerJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }



   function FrmLoginJSLoad($sender, $params)
   {

      ?>
               //Add your javascript code here
                 document.getElementById("txtUser").focus();
      <?php

   }



   function cmbDatabaseJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here
      <?php
      return false;
   }

   function cmbDatabaseJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here
                return false;
      <?php

   }

   function cmbDatabaseJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here
                   return false;
      <?php

   }

   function cmdCancelarJSClick($sender, $params)
   {

      ?>
               //Add your javascript code here
                 document.location.href='Modulos/include/termina.php';
                 document.getElementById("hPanel").value ="";
                 return false;
      <?php

   }

   function cmdAceptarJSClick($sender, $params)
   {
      ?>
               document.getElementById("txtPassword").value = document.getElementById("txtPasswd").value;
               document.getElementById("txtBaseDeDatos").value   = document.getElementById("cmbDatabase").value;
               document.FrmLogin.submit();
      <?php

   }
   function wLoginJSClose($sender, $params)
   {
      ?>
        //begin js
                 document.location.href='Modulos/include/termina.php';
                 document.getElementById("hPanel").value ="";
                 return false;
        //end
      <?php
   }

}

global $application;
global $FrmLogin;
?>
        <script src="recursos/js/md5.js"></script>
<?php
//Creates the form
$FrmLogin = new FrmLogin($application);
//Read from resource file
$FrmLogin->loadResource(__FILE__);
//Shows the form

if((isset($_POST['txtUsuario']) and $_POST['txtUsuario'] != "") and
(isset($_POST['txtPassword']) and $_POST['txtPassword'] != "") and
(isset($_POST['txtBaseDeDatos']) and $_POST['txtBaseDeDatos'] != ""))
{
   $_SESSION['database'] = $_POST['txtBaseDeDatos'];
   $Acceso = true;
   require("mysql.inc.php");
   #Seleccionar el grupo al que pertenece el usuario
   $sql = "select sIdGrupo from usuarios where sIdUsuario = '" . $_SESSION['ssUsuario'] . "'";
   $rs = mysql_query($sql);
   if($rw = mysql_fetch_array($rs))
   {
      $global_grupo = $rw["sIdGrupo"];
   }
   #intentar accesar
   $sql = "select sPassword from usuarios where sIdUsuario='" . $_POST['txtUsuario'] . "'";
   $rs = mysql_query($sql);
   //echo mysql_error();
   $t = md5($_SESSION["complemento"] . getenv("REMOTE_ADDR"));
   $found = false;
   if($row = mysql_fetch_array($rs))
   {
      $found = true;
      //if(md5(md5($row["sPassword"]) . $t)==$_POST['txtPassword']){
      if($row["sPassword"] == $_POST['txtPassword'])
      {
         $_SESSION['ssUsuario'] = $_POST['txtUsuario'];
         $_SESSION['ssContrasena'] = $_POST['txtPassword'];
         $Acceso = false;
         ?>
                     <script>
                     //codigo de javascript
                     document.location.href='./frmSelContrato.php';
                     </script>
         <?php
      }
      else
      {
         $FrmLogin->lblMensajes2->setCaption("Contraseña Incorrecta");
         $FrmLogin->lblMensajes2->setColor("#FF0000");
         $FrmLogin->show();
      }

   }
   if( ! $found)
   {
      $FrmLogin->lblMensajes2->setCaption("No se puede hacer Login !!");
      $FrmLogin->lblMensajes2->setColor("#FF0000");
      $FrmLogin->show();

   }
}

else
   $FrmLogin->show();

?>
