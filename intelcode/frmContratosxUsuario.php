<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require_once("Connection.php");
        use_unit("dbgrids.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");

        //Class definition
        class frmContratosxUsuario extends Page
        {
               public $Memo1 = null;
               public $Label5 = null;
               public $sIdUsuario = null;
               public $Label4 = null;
               public $Label8 = null;
               public $Label3 = null;
               public $cmdEliminar = null;
               public $ddcontratosxusuario1 = null;
               public $Panel1 = null;
               public $cmdAsignar = null;
               public $Label2 = null;
               public $Label1 = null;
               public $ddcontratos1 = null;
               public $Panel2 = null;
               public $dscontratos1 = null;
               public $tbcontratos1 = null;
               public $dscontratosxusuario1 = null;
               public $dbgeotechAdal1 = null;
               public $tbcontratosxusuario1 = null;
               function cmdAsignarJSClick($sender, $params)
               {
               ?>
               //Add your javascript code here

                  ddcontratos1.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = ddcontratos1.getTableModel();

                        var sContrato = tableModel.getValue(0, index);
                        var sIdUsuario = document.getElementById("sIdUsuario").value;

                        if(sContrato==null){
                           alert("Seleccione un almacen");
                           return false;
                        }

                        if(sIdUsuario != "")params = sIdUsuario+ "]"; else params="_]";
                        if(sContrato != "")params = params + sContrato + "]"; else params = params + "_]";
                        <?php
                        echo $this->cmdAsignar->ajaxCall("fnAsignar",array(),array("cmdAsignar","ddcontratosxusuario1","Memo1"));
                        ?>
                        return false;
                     }

                  );
                 return false;

               <?php

               }
               function fnAsignar($sender="", $params=""){
                  #obtiene los datos necesarios
                  $parametros = explode("]",$params);

                  $sIdUsuario = ($parametros[0]=="_")?"":$parametros[0];
                  $sContrato = ($parametros[1]=="_")?"":$parametros[1];

                  $sql = "insert into
                                contratosxusuario
                            set
                                sContrato ='$sContrato',
                                sIdUsuario='$sIdUsuario'
                           on duplicate key update  sIdUsuario='$sIdUsuario', sContrato ='$sContrato'";
                  mysql_query($sql);
                  if(mysql_error()){
                        $this->Memo1->Text=mysql_error();
                  }else{
                        $this->Memo1->Text="";
                  }

                  $this->tbcontratosxusuario1->setActive(false);
                  $this->tbcontratosxusuario1->setActive(true);

               }

               function cmdEliminarJSClick($sender, $params)
               {


               ?>
               //Add your javascript code here

                   ddcontratosxusuario1.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = ddcontratosxusuario1.getTableModel();

                        var sIdUsuario = tableModel.getValue(0, index);
                        var sContrato = tableModel.getValue(1, index);

                        if(sContrato==null){
                           alert("Seleccione un almacen");
                           return false;
                        }

                        if(sIdUsuario != "")params = sIdUsuario+ "]"; else params="_]";
                        if(sContrato != "")params = params + sContrato + "]"; else params = params + "_]";
                        <?php
                        echo $this->cmdEliminar->ajaxCall("fnRevocarContrato",array(),array("cmdEliminar","ddcontratosxusuario1","Memo1"));
                        ?>
                        return false;
                     }

                  );
                 return false;

               <?php

               }
               function fnRevocarContrato($sender="", $params=""){
                  #obtiene los datos necesarios

                  $parametros = explode("]",$params);

                  $sIdUsuario = ($parametros[0]=="_")?"":$parametros[0];
                  $sContrato = ($parametros[1]=="_")?"":$parametros[1];

                  $sql = "delete from
                                 contratosxusuario
                          where
                                sIdUsuario='$sIdUsuario'
                                and sContrato ='$sContrato'";
                  mysql_query($sql);
                  if(mysql_error()){
                        $this->Memo1->Text=mysql_error();
                  }else{
                        $this->Memo1->Text="";
                  }

                  $this->tbcontratosxusuario1->setActive(false);
                  $this->tbcontratosxusuario1->setActive(true);

               }

               function frmContratosxUsuarioShow($sender, $params)
               {
                  global $_SESSION,$Usuario,$Clave,$Servidor,$_REQUEST;
                  global $Connection;
                  //Conectar a la base de datos
//                  $this->dbgeotechAdal1->setConnected(false);
//                  $this->dbgeotechAdal1->setDatabaseName($_SESSION['database']);
//                  $this->dbgeotechAdal1->setUserName($Usuario);
//                  $this->dbgeotechAdal1->setUserPassword($Clave);
//                  $this->dbgeotechAdal1->setHost($Servidor);
//                  $this->dbgeotechAdal1->setConnected(true);

//                  $Connection->base->setConnected(false);
//                  $Connection->base->setConnected(true);
                  $Connection->conectar();
                  $this->tbcontratosxusuario1->setActive(false);
                  $this->tbcontratosxusuario1->setActive(true);

                  $this->tbcontratos1->setActive(false);
                  $this->tbcontratos1->setActive(true);

                $sql="select sIdUsuario,sNombre from usuarios order by sNombre";
                $rs=mysql_query($sql);
                unset($it);
                while($rw =mysql_fetch_array($rs)){
                     $it[$rw["sIdUsuario"]]=$rw["sNombre"];
                }
                $this->sIdUsuario->setItems($it);


               }

               function cmdEliminarJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdEliminarJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdAsignarJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdAsignarJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }
            function sIdUsuarioChange($sender, $params)
            {
                $Usuario = $this->sIdUsuario->getItemIndex();
                $this->tbcontratosxusuario1->setActive(false);
                $this->tbcontratosxusuario1->setFilter(" sIdUsuario = '$Usuario' ");
                $this->tbcontratosxusuario1->setActive(true);
            }



        }

        global $application;

        global $frmContratosxUsuario;

        //Creates the form
        $frmContratosxUsuario=new frmContratosxUsuario($application);

        //Read from resource file
        $frmContratosxUsuario->loadResource(__FILE__);

        //Shows the form
        $frmContratosxUsuario->show();

?>
