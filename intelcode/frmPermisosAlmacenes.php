<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
       require_once("mysql.inc.php");
       /* $sContrato="425027849";*/
        //Class definition
        class Unit4 extends Page
        {
               public $cmdRevocar = null;
               public $Memo1 = null;
               public $cmdAsignar = null;
               public $sIdAlmacen = null;
               public $Panel1 = null;
               public $qryUsuarios = null;
               public $dsUsuarios = null;
               public $db = null;
               public $qryPermisos = null;
               public $dsPermisos = null;
               public $ddcontratosxusuario1 = null;
               public $Almacen = null;
               public $Usuarios = null;
               public $Panel2 = null;
               public $Label8 = null;
               public $ddalmacenxusuarios1 = null;
               function cmdRevocarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here

                  ddalmacenxusuarios1.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = ddalmacenxusuarios1.getTableModel();

                        var sIdUsuario = tableModel.getValue(0, index);
                        var sIdAlmacen = tableModel.getValue(1, index);

                        if(sIdAlmacen==null){
                           alert("Seleccione un almacen");
                           return false;
                        }

                        if(sIdUsuario != "")params = sIdUsuario+ "]"; else params="_]";
                        if(sIdAlmacen != "")params = params + sIdAlmacen + "]"; else params = params + "_]";
                        <?php
                        echo $this->cmdRevocar->ajaxCall("fnRevocar",array(),array("cmdRevocar","ddalmacenxusuarios1","Memo1"));
                        ?>
                        return false;
                     }

                  );
                   ResaltarBotones();
                 return false;

               <?php

               }
               function fnRevocar($sender="", $params=""){
                  #obtiene los datos necesarios
                  global $sContrato;

                  $parametros = explode("]",$params);

                  $sIdUsuario = ($parametros[0]=="_")?"":$parametros[0];
                  $sIdAlmacen = ($parametros[1]=="_")?"":$parametros[1];

                  $sql = "delete from
                                 almacenxusuarios
                          where
                                sIdUsuario='$sIdUsuario'
                                and sIdAlmacen='$sIdAlmacen'
                                and sContrato ='$sContrato'";
                  mysql_query($sql);
                  if(mysql_error()){
                        $this->Memo1->Text=mysql_error();
                  }else{
                        $this->Memo1->Text="";
                  }

                  $this->qryPermisos->setActive(false);
                  $this->qryPermisos->setFilter(" sContrato='$sContrato'");
                  $this->qryPermisos->setActive(true);

               }

               function Unit4Show($sender, $params)
               {
                  global $sContrato;

                  global $_SESSION,$Usuario,$Clave,$Servidor,$_REQUEST;
                  //Conectar a la base de datos
                  $this->db->setConnected(false);
                  $this->db->setDatabaseName($_SESSION['database']);
                  $this->db->setUserName($Usuario);
                  $this->db->setUserPassword($Clave);
                  $this->db->setHost($Servidor);
                  $this->db->setConnected(true);

                  $this->qryPermisos->setActive(false);
                  $this->qryPermisos->setFilter(" sContrato='$sContrato' ");
                  $this->qryPermisos->setActive(true);

                  $this->qryUsuarios->setActive(false);
                  $this->qryUsuarios->setFilter(" cu.sContrato='$sContrato' ");
                  $this->qryUsuarios->setActive(true);

                  $sql = "select sIdAlmacen,sDescripcion from almacenes";
                  $rs = mysql_query($sql);
                  unset($it);
                  while($rw = mysql_fetch_array($rs)){
                        $it[$rw["sIdAlmacen"]]=$rw["sDescripcion"];
                  }
                  $this->sIdAlmacen->setItems($it);



               }

               function cmdAsignarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here

                  ddcontratosxusuario1.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = ddcontratosxusuario1.getTableModel();

                        var sIdUsuario = tableModel.getValue(0, index);
                        var sIdAlmacen = document.getElementById("sIdAlmacen").value;

                        if(sIdAlmacen==null){
                           alert("Seleccione un almacen");
                           return false;
                        }

                        if(sIdUsuario != "")params = sIdUsuario+ "]"; else params="_]";
                        if(sIdAlmacen != "")params = params + sIdAlmacen + "]"; else params = params + "_]";
                        <?php
                        echo $this->cmdAsignar->ajaxCall("fnAsignar",array(),array("cmdAsignar","ddalmacenxusuarios1","Memo1"));
                        ?>
                        return false;
                     }

                  );
                  ResaltarBotones();
                 return false;

               <?php

               }
               function fnAsignar($sender="", $params=""){
                  #obtiene los datos necesarios
                  global $sContrato;

                  $parametros = explode("]",$params);

                  $sIdUsuario = ($parametros[0]=="_")?"":$parametros[0];
                  $sIdAlmacen = ($parametros[1]=="_")?"":$parametros[1];

                  $sql = "insert into
                                 almacenxusuarios
                            set
                                sContrato ='$sContrato',
                                sIdUsuario='$sIdUsuario',
                                sIdAlmacen='$sIdAlmacen'
                           on duplicate key update  sIdUsuario='$sIdUsuario', sIdAlmacen='$sIdAlmacen'";
                  mysql_query($sql);
                  if(mysql_error()){
                        $this->Memo1->Text=mysql_error();
                  }else{
                        $this->Memo1->Text="";
                  }

                  $this->qryPermisos->setActive(false);
                  $this->qryPermisos->setFilter(" sContrato='$sContrato'");
                  $this->qryPermisos->setActive(true);

               }

               function dumpJavascript(){

                  echo 'function ResaltarBotones()
                  {
                        document.getElementById("cmdRevocar").style.backgroundColor = "";
                        document.getElementById("cmdAsignar").style.backgroundColor = "";
                  }';
               }

        }

        global $application;

        global $Unit4;

        //Creates the form
        $Unit4=new Unit4($application);

        //Read from resource file
        $Unit4->loadResource(__FILE__);

        //Shows the form
        $Unit4->show();

?>
<script>
   ResaltarBotones();
</script>
