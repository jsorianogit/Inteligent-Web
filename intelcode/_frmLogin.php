<?php
        //Includes
        require_once("vcl/vcl.inc.php");
        use_unit("buttons.inc.php");
        use_unit("menus.inc.php");
        use_unit("actnlist.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        //Class definition
        class FrmLogin extends Page
        {
               public $lblMensajes = null;
               public $Label9 = null;
               public $cmdCancelar = null;
               public $cmdAceptar = null;
               public $txtUser = null;
               public $txtPasswd = null;
               public $cmbDatabase = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;
               public $txtServer = null;
               public $Panel1 = null;
               public $txtBaseDeDatos = null;
               public $txtPassword = null;
               public $txtUsuario = null;
               public $txtServidor = null;
               public $Label8 = null;
               public $Label7 = null;
               public $Label6 = null;
               public $Label5 = null;




               function Button1Click($sender, $params)
               {
               $this->lblMensajes->setCaption("hola");


               }



               function cmbDatabaseJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here
                document.getElementById("cmbDatabase").style.background="#FFAD5B";
                  <?php

               }

               function txtPasswdJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here
               document.getElementById("txtPasswd").select();
               document.getElementById("txtPasswd").style.background="#FFAD5B";

               <?php

               }

               function txtUserJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here
               document.getElementById("txtUser").select();
               document.getElementById("txtUser").style.background="#FFAD5B";

               <?php

               }

               function cmbDatabaseJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here
                 document.getElementById("cmbDatabase").style.background="#FFFFFF";
               <?php

               }

               function txtPasswdJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here
               document.getElementById("txtPasswd").style.background="#FFFFFF";
               <?php

               }

               function txtUserJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here
                 document.getElementById("txtUser").style.background="#FFFFFF";
               <?php

               }

               function txtServerJSBlur($sender, $params)
               {
               ?>
               //Add your javascript code here
                    document.getElementById("txtServer").style.background="#FFFFFF";
               <?php

               }

               function txtServerJSFocus($sender, $params)
               {
                ?>
               //Add your javascript code here
               document.getElementById("txtServer").select();
               document.getElementById("txtServer").style.background="#FFAD5B";

               <?php

               }

               function cmbDatabaseJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
               var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
               if(keyCode==13){
                  document.getElementById("cmdAceptar").focus();
                  return false;
               }
               <?php

               }

               function txtPasswdJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
                var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
               if(keyCode==13){
                  document.getElementById("cmbDatabase").focus();
                   return false;
               }
               <?php

               }

               function txtUserJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
                var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
               if(keyCode==13){
                  document.getElementById("txtPasswd").focus();
                  return false;
               }
               <?php

               }

               function txtServerJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
               var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
               if(keyCode==13) {
                  document.getElementById("txtUser").focus();
                  return false;
               }

               <?php

               }

               function cmdCancelarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                 document.location.href='../';
                 return false;
               <?php

               }

               function cmdAceptarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                document.getElementById("txtServidor").value = document.getElementById("txtServer").value;
                document.getElementById("txtUsuario").value = document.getElementById("txtUser").value;
                document.getElementById("txtPassword").value = document.getElementById("txtPasswd").value;
                document.getElementById("txtBaseDeDatos").value = document.getElementById("cmbDatabase").value;
                document.FrmLogin.submit();

               <?php

               }


        }

        global $application;
        global $FrmLogin;
        //Creates the form
        $FrmLogin=new FrmLogin($application);
        //Read from resource file
        $FrmLogin->loadResource(__FILE__);
        //Shows the form
        if(isset($_POST['txtServidor']) or
            isset($_POST['txtUsuario']) or
            isset($_POST['txtPassword']) or
            isset($_POST['txtBaseDeDatos']) )
         {
            $_SESSION['database'] = $_POST['txtBaseDeDatos'];
            $Acceso=true;
            require_once("mysql.inc.php");
            $sql = "select sIdUsuario from usuarios where sIdUsuario='".$_POST['txtUsuario']."'";
            $sql.= " and sPassword='".$_POST['txtPassword']."'";
            $rs = mysql_query($sql);
            if($row = mysql_fetch_array($rs)){
               $_SESSION['ssUsuario'] = $_POST['txtUsuario'];
               $_SESSION['ssContrasena'] = $_POST['txtPassword'];
               $Acceso=false;
               ?>
                  <script>
                  //codigo de javascript
                  document.location.href='./frmSelContrato.php';
                  </script>
               <?php
            }
            else{
                  $FrmLogin->lblMensajes->setCaption("Usuario o Contraseña Incorrectos");
                  $FrmLogin->lblMensajes->setColor("#FF0000");
                  $FrmLogin->show();             
            }
         }
         else
           $FrmLogin->show();
?>
