<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require_once("mysql.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        //$sContrato = '425027849';
        //Class definition
        class frmFamilias extends Page
        {
               public $Panel1 = null;
               public $dbgFamilias = null;
               public $Memo1 = null;
               public $mDescripcion = null;
               public $sIdFamilia = null;
               public $hOldsIdFamilia = null;
               public $hOperacion = null;
               public $cmdImprimir = null;
               public $cmdCancelar = null;
               public $cmdAceptar = null;
               public $cmdEliminar = null;
               public $cmdModificar = null;
               public $cmdAgregar = null;
               public $fdfamilias3 = null;
               public $fdfamilias2 = null;
               public $qryFamilias = null;
               public $database = null;
               public $dsFamilias = null;
               public $Panel2 = null;
               public $Label8 = null;
               function FrmFamiliasShow($sender, $params)
               {
                  global $_SESSION,$Usuario,$Clave,$Servidor,$_REQUEST;
                  //Conectar a la base de datos
                  $this->database->setConnected(false);
                  $this->database->setDatabaseName($_SESSION['database']);
                  $this->database->setUserName($Usuario);
                  $this->database->setUserPassword($Clave);
                  $this->database->setHost($Servidor);
                  $this->database->setConnected(true);
                  $this->qryFamilias->setActive(true);


               }

               function cmdEliminarClick($sender, $params)
               {
                  global $sContrato;

                  $rs = mysql_query("select sIdFamilia from bitacoradeentrada where sIdFamilia='".($this->hOldsIdFamilia->Value)."' ");
                  if($rw = mysql_fetch_array($rs)){
                     $existe=true;
                  }
                  $rs = mysql_query("select sIdFamilia from bitacoradesalida where sIdFamilia='".($this->hOldsIdFamilia->Value)."' ");
                  if($rw = mysql_fetch_array($rs)){
                     $existe=true;
                  }
                  if(!$existe){
                     mysql_query("delete from familias where
                                  sIdFamilia='".$this->hOldsIdFamilia->Value."'");
                     if(mysql_error())
                        $this->Memo1->Text=mysql_error();
                     else
                        $this->Memo1->Text="";
                  }else{
                     $this->Memo1->Text="Existen tablas que estan asociados con este registro, no se puede eliminar";
                  }

                  $this->qryFamilias->setActive(false);
                  $this->qryFamilias->setActive(true);


               }


               function mDescripcionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function mDescripcionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function mDescripcionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdFamiliaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdFamiliaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }



               function sIdFamiliaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dbgFamiliasJSClick($sender, $params)
               {

               ?>
                  dbgFamilias.getSelectionModel().iterateSelection
                    (    function(index)
                         {
                           var Tabla = dbgFamilias.getTableModel();

                           document.getElementById("sIdFamilia").value= Tabla.getValue(0, index);
                           document.getElementById("hOldsIdFamilia").value= Tabla.getValue(0, index);
                           document.getElementById("mDescripcion").value= Tabla.getValue(1, index);

                        }
                     );
                     return false;

               <?php

               }

               function cmdAceptarClick($sender, $params)
               {
                  global $sContrato;
                  $oldsIdFamilia = strtoupper($this->hOldsIdFamilia->Value);
                  $sIdFamilia    = strtoupper($this->sIdFamilia->getText());
                  $mDescripcion  = strtoupper($this->mDescripcion->Text);

                  if($this->hOperacion->Value=="modificar"){
                     mysql_query("begin");

                     $sql = "update bitacoradeentrada set sIdFamilia='$sIdFamilia' where sIdFamilia='$oldsIdFamilia'";
                     mysql_query($sql);
                     if(mysql_error())$error = mysql_error();

                     /*
                     $sql = "update bitacoradesalida set sIdFamilia='$sIdFamilia' where sIdFamilia='$oldsIdFamilia'";
                     mysql_query($sql);
                     if(mysql_error())$error = mysql_error();
                     */
                     $sql="update familias set
                                    sIdFamilia='$sIdFamilia',
                                    mDescripcion='$mDescripcion'
                                  where sIdFamilia='$oldsIdFamilia'";
                     mysql_query($sql);

                     if(mysql_error()){
                        $error =mysql_error();
                        echo $error;
                        $this->Memo1->Text = $error;
                     }
                     if($error)
                        mysql_query("rollback");
                     else{
                        mysql_query("commit");
                     }
                  }else if($this->hOperacion->Value=="agregar"){
                     $sql="insert into familias set
                                    sIdFamilia='$sIdFamilia',
                                    mDescripcion='$mDescripcion' ";
                     mysql_query($sql);
                        if(mysql_error())$this->Memo1->Text = mysql_error();
                  }


                  $this->qryFamilias->setActive(false);
                  $this->qryFamilias->setActive(true);


               }

               function cmdImprimirJSClick($sender, $params)
               {

               global $sContrato;
               ?>
               //Add your javascript code here
                  ruta = "../reporte.php";
                  ruta = ruta + "?sIdFamilia="+ document.getElementById("hOldsIdFamilia").value;
                  ruta = ruta + "&nombreReporte=rptFamilias";
                  ruta = ruta + "&reportesPath=familias" ;
                  var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no");
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



               function cmdModificarJSClick($sender, $params)
               {

               ?>  if (document.getElementById("sIdFamilia").value=="")
                       alert (" Haga Click sobre un Id !!!");
                   else
                      {
                         deshabilitar(false);
                         document.getElementById("sIdFamilia").focus();
                         document.getElementById("hOperacion").value='modificar';
                      }
                   return false;
               <?php

               }

               function cmdAgregarJSClick($sender, $params)
               {
               ?>
               //Add your javascript code here
                    deshabilitar(false);
                    limpiar();
                    document.getElementById("sIdFamilia").focus();
                    document.getElementById("hOperacion").value="agregar";
                    return false;

               <?php

               }

               function dumpJavascript(){
                  echo 'function deshabilitar(val){
                           document.getElementById("sIdFamilia").disabled=val;
                           document.getElementById("mDescripcion").disabled=val;

                           document.getElementById("cmdAgregar").disabled=!val;
                           document.getElementById("cmdModificar").disabled=!val;
                           document.getElementById("cmdAceptar").disabled=val;
                           document.getElementById("cmdCancelar").disabled=val;
                           document.getElementById("cmdImprimir").disabled=!val;
                           document.getElementById("cmdEliminar").disabled=!val;
                     }';
                  echo 'function limpiar(){
                           document.getElementById("sIdFamilia").value="";
                           document.getElementById("mDescripcion").value="";
                     }';
                   echo 'function ResaltarBotones()
                      {
                           document.getElementById("cmdAgregar").style.backgroundColor = "";
                           document.getElementById("cmdModificar").style.backgroundColor = "";
                           document.getElementById("cmdEliminar").style.backgroundColor = "";
                           document.getElementById("cmdAceptar").style.backgroundColor = "";
                           document.getElementById("cmdCancelar").style.backgroundColor = "";
                           document.getElementById("cmdImprimir").style.backgroundColor = "";
                           return false;
                     }';
               }

        }

        global $application;

        global $frmFamilias;

        //Creates the form
        $frmFamilias=new frmFamilias($application);

        //Read from resource file
        $frmFamilias->loadResource(__FILE__);

        //Shows the form
        $frmFamilias->show();

?>
<script>
deshabilitar(true);
ResaltarBotones();
</script>
