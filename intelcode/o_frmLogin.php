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
         if( $_SESSION["complemento"]=="")
             $_SESSION["complemento"]=md5(date("l dS of F Y h:i:s A"));
        class FrmLogin extends Page
        {
               public $txtServidor = null;
               public $txtUsuario = null;
               public $txtPassword = null;
               public $txtBaseDeDatos = null;
               public $txtPasswd = null;
               public $txtUser = null;
               public $txtServer = null;
               public $lblMensajes = null;
               public $Label9 = null;
               public $cmdCancelar = null;
               public $cmdAceptar = null;
               public $cmbDatabase = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;
               public $Panel1 = null;
               function FrmLoginShow($sender, $params)
               {
               $databases = array(
                  "intelcode"=>"intelcode",
                  "inteligent"=>"inteligent",
                  "proasip"=>"proasip",
                  "geotech"=>"geotech",
		  "iecesaok"=>"iecesaok",
		  "dicomse"=>"dicomse",
		  "rbtec"=>"rbtec",
		  "petronaval"=>"petronaval",
		  "geotechAdal"=>"Base de Prueba, No Usar!!"
                  );
               $this->cmbDatabase->setItems($databases);


               }



               function txtPasswdJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
               
               <?php

               }

               function txtPasswdJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here
                                  document.getElementById("txtPasswd").value="";
               <?php

               }

               function txtPasswdJSBlur($sender, $params)
               {

               ?>
               var md5_pre=hex_md5(document.getElementById("txtPasswd").value);
               var md5=hex_md5(md5_pre+"<?php echo md5($_SESSION["complemento"] .getenv("REMOTE_ADDR")); ?>");
               document.getElementById("txtPasswd").value=md5;
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
                 document.location.href='../';
                 return false;
               <?php

               }

               function cmdAceptarJSClick($sender, $params)
               {
               global $_SESSION;
               ?>
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
        ?>
        <script src="recursos/js/md5.js"></script>
        <?php
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
            $sql = "select sPassword from usuarios where sIdUsuario='".$_POST['txtUsuario']."'";
            $rs = mysql_query($sql);
	    //echo mysql_error();
            $t=md5($_SESSION["complemento"] .getenv("REMOTE_ADDR"));
	    $found=false;
            if($row = mysql_fetch_array($rs)){
		$found=true;
               if(md5(md5($row["sPassword"]) . $t)==$_POST['txtPassword']){
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
	    if(!$found){
                     $FrmLogin->lblMensajes->setCaption("No se puede hacer Login !!");
                     $FrmLogin->lblMensajes->setColor("#FF0000");
                     $FrmLogin->show();

	    }
         }

         else
           $FrmLogin->show();

?>
