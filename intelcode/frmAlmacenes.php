<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("jsval/formvalidator.inc.php");
        require_once("mysql.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");

        //Class definition
        class frmAlmacenes extends Page
        {
               public $Memo1 = null;
               public $dsAlmacenes = null;
               public $qryAlmacenes = null;
               public $dbgAlmacenes = null;
               public $hOldsIdAlmacen = null;
               public $hOperacion = null;
               public $cmdImprimir = null;
               public $cmdCancelar = null;
               public $cmdAceptar = null;
               public $cmdEliminar = null;
               public $cmdModificar = null;
               public $cmdAgregar = null;
               public $Panel2 = null;
               public $Label8 = null;
               public $FormValidator1 = null;
               public $Label7 = null;
               public $Label6 = null;
               public $Label5 = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;
               public $sFax = null;
               public $sDireccion = null;
               public $sDescripcion = null;
               public $sTelefono = null;
               public $sCp = null;
               public $sCiudad = null;
               public $sIdAlmacen = null;
               public $items = array("sIdAlmacen","sCiudad","sCp","sTelefono","sDescripcion","sDireccion","sFax");
            public $database = null;
               function sDireccionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDireccionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDireccionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDescripcionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDescripcionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDescripcionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFaxJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFaxJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFaxJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTelefonoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTelefonoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTelefonoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sCpJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sCpJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sCpJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sCiudadJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sCiudadJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sCiudadJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdAlmacenJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }


               function sIdAlmacenJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdAlmacenJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }
               function cmdEliminarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  if(!confirm("Desea eliminar el registro seleccionado ? "))
                     return false;
                  else
                     return true;
               <?php

               }


               function cmdEliminarClick($sender, $params)
               {
                  global $sContrato;

                  $rs = mysql_query("select sIdAlmacen from bitacoradeentrada where sIdAlmacen='".($this->hOldsIdAlmacen->Value)."' ");
                  if($rw = mysql_fetch_array($rs)){
                     $existe=true;
                  }
                  $rs = mysql_query("select sIdAlmacen from foliodevolucion where sIdAlmacen='".($this->hOldsIdAlmacen->Value)."' ");
                  if($rw = mysql_fetch_array($rs)){
                     $existe=true;
                  }
                  $rs = mysql_query("select sIdAlmacen from bitacoradetallesalida where sIdAlmacen='".($this->hOldsIdAlmacen->Value)."' ");
                  if($rw = mysql_fetch_array($rs)){
                     $existe=true;
                  }
                  $rs = mysql_query("select sIdAlmacen from devoluciones where sIdAlmacen='".($this->hOldsIdAlmacen->Value)."' ");
                  if($rw = mysql_fetch_array($rs)){
                     $existe=true;
                  }
                  $rs = mysql_query("select sIdAlmacen from insumos where sIdAlmacen='".($this->hOldsIdAlmacen->Value)."' ");
                  if($rw = mysql_fetch_array($rs)){
                     $existe=true;
                  }



                  if(!$existe){
                     mysql_query("delete from almacenes where
                                  sIdAlmacen='".$this->hOldsIdAlmacen->Value."'");
                     if(mysql_error())
                        $this->Memo1->Text=mysql_error();
                     else
                        $this->Memo1->Text="";
                  }else{
                     $this->Memo1->Text="Existen tablas que estan asociados con este registro, no se puede eliminar";
                  }

                  $this->qryAlmacenes->setActive(false);
                  $this->qryAlmacenes->setActive(true);
               }

               function cmdImprimirJSClick($sender, $params)
               {

               global $sContrato;
               ?>
               //Add your javascript code here
                  ruta = "../reporte.php";
                  ruta = ruta + "?nombreReporte=rptAlmacen";
                  ruta = ruta + "&reportesPath=almacenes";
                  var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no");
                  return false;

               <?php

               }


               function cmdModificarJSClick($sender, $params)
               {

               ?>
                   deshabilitar(false);
                   document.getElementById("hOperacion").value='modificar';
                   return false;
               <?php

               }

               function cmdCancelarJSClick($sender, $params)
               {

               ?>
                    deshabilitar(true);
                    return false;
               <?php

               }

               function dbgAlmacenesJSClick($sender, $params)
               {

               ?>
                  dbgAlmacenes.getSelectionModel().iterateSelection
                    (    function(index)
                         {
                           var Tabla = dbgAlmacenes.getTableModel();

                           document.getElementById("sIdAlmacen").value= Tabla.getValue(0, index);
                           document.getElementById("hOldsIdAlmacen").value= Tabla.getValue(0, index);
                           document.getElementById("sCiudad").value= Tabla.getValue(1, index);
                           document.getElementById("sCp").value= Tabla.getValue(2, index);
                           document.getElementById("sTelefono").value= Tabla.getValue(3, index);
                           document.getElementById("sDescripcion").value= Tabla.getValue(4, index);
                           document.getElementById("sDireccion").value= Tabla.getValue(5, index);
                           document.getElementById("sFax").value= Tabla.getValue(6, index);

                        }
                     );
                     return false;

               <?php

               }

               function cmdAgregarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                    deshabilitar(false);
                    limpiar();
                    document.getElementById("hOperacion").value="agregar";
                    return false;
               <?php

               }

               function cmdAceptarClick($sender, $params)
               {
                  global $sContrato;
                  $oldsIdAlmacen = $this->hOldsIdAlmacen->Value;

                  foreach($this->items as $valor){
                      eval(" \$".$valor."=strtoupper( \$this->".$valor."->getText() );");
                  }

                  if($this->hOperacion->Value=="modificar"){
                     mysql_query("begin");

                     $sql = "update insumos set sIdAlmacen='$sIdAlmacen' where sIdAlmacen='$oldsIdAlmacen'";
                     mysql_query($sql);
                     if(mysql_error())$error = mysql_error();

                     $sql = "update devoluciones set sIdAlmacen='$sIdAlmacen' where sIdAlmacen='$oldsIdAlmacen'";
                     mysql_query($sql);
                     if(mysql_error())$error = mysql_error();


                     $sql = "update bitacoradetallesalida set sIdAlmacen='$sIdAlmacen' where sIdAlmacen='$oldsIdAlmacen'";
                     mysql_query($sql);
                     if(mysql_error())$error = mysql_error();


                     $sql = "update bitacoradeentrada set sIdAlmacen='$sIdAlmacen' where sIdAlmacen='$oldsIdAlmacen'";
                     mysql_query($sql);
                     if(mysql_error())$error = mysql_error();

                     $sql = "update foliodevolucion set sIdAlmacen='$sIdAlmacen' where sIdAlmacen='$oldsIdAlmacen'";
                     mysql_query($sql);
                     if(mysql_error())$error = mysql_error();

                     mysql_query("update almacenes set
                                    sIdAlmacen='$sIdAlmacen',
                                    sCiudad='$sCiudad',
                                    sCp='$sCp',
                                    sTelefono='$sTelefono',
                                    sDescripcion='$sDescripcion',
                                    sDireccion='$sDireccion',
                                    sFax='$sFax'
                        where sIdAlmacen='$oldsIdAlmacen'");
                     if(mysql_error()){
                        $error = mysql_error();
                        $this->Memo1->Text = $error;
                     }
                     if($error)
                        mysql_query("rollback");
                     else
                        mysql_query("commit");
                  }else if($this->hOperacion->Value=="agregar"){
                     $sql="insert into almacenes set
                                    sIdAlmacen='$sIdAlmacen',
                                    sCiudad='$sCiudad',
                                    sCp='$sCp',
                                    sTelefono='$sTelefono',
                                    sDescripcion='$sDescripcion',
                                    sDireccion='$sDireccion',
                                    sFax='$sFax'";
                     mysql_query($sql);
                        if(mysql_error())$this->Memo1->Text = mysql_error();
                  }


                  $this->qryAlmacenes->setActive(false);
                  $this->qryAlmacenes->setActive(true);
               }






               function frmAlmacenesJSSubmit($sender, $params)
               {

               ?>
               //Add your javascript code here
                  return (FormValidator1_validate());
               <?php

               }

               function frmAlmacenesBeforeShow($sender, $params)
               {
                  global $_SESSION,$Usuario,$Clave,$Servidor,$_REQUEST;
                  //Conectar a la base de datos
                  $this->database->setConnected(false);
                  $this->database->setDatabaseName($_SESSION['database']);
                  $this->database->setUserName($Usuario);
                  $this->database->setUserPassword($Clave);
                  $this->database->setHost($Servidor);
                  $this->database->setConnected(true);
                  $this->qryAlmacenes->setActive(true);


               }
               function dumpJavascript(){
                  echo 'function deshabilitar(val){
                           document.getElementById("sIdAlmacen").disabled=val;
                           document.getElementById("sCiudad").disabled=val;
                           document.getElementById("sCp").disabled=val;
                           document.getElementById("sTelefono").disabled=val;
                           document.getElementById("sDescripcion").disabled=val;
                           document.getElementById("sDireccion").disabled=val;
                           document.getElementById("sFax").disabled=val;

                           document.getElementById("cmdAgregar").disabled=!val;
                           document.getElementById("cmdModificar").disabled=!val;
                           document.getElementById("cmdAceptar").disabled=val;
                           document.getElementById("cmdCancelar").disabled=val;
                           document.getElementById("cmdImprimir").disabled=!val;
                           document.getElementById("cmdEliminar").disabled=!val;
                     }';
                  echo 'function limpiar(){
                           document.getElementById("sIdAlmacen").value="";
                           document.getElementById("sCiudad").value="";
                           document.getElementById("sCp").value="";
                           document.getElementById("sTelefono").value="";
                           document.getElementById("sDescripcion").value="";
                           document.getElementById("sDireccion").value="";
                           document.getElementById("sFax").value="";
                     }';
               }

        }

        global $application;

        global $frmAlmacenes;

        //Creates the form
        $frmAlmacenes=new frmAlmacenes($application);

        //Read from resource file
        $frmAlmacenes->loadResource(__FILE__);

        //Shows the form
        $frmAlmacenes->show();

?>
<script>
deshabilitar(true);
</script>
