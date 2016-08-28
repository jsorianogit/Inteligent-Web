<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require("mysql.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("buttons.inc.php");
        use_unit("imglist.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        $sUsuario=$_SESSION["ssUsuario"];
        $sIdConvenio =$sIdConvenioAct;
        //$sContrato = '425027849';
        //Class definition
        class frmCatalogodeCategorias extends Page
        {
               public $txtDescripcion = null;
               public $txtId = null;
               public $HiOldId = null;
               public $GridTipos = null;
               public $Panel2 = null;
               public $HiOpcion = null;
               public $QryPozo = null;
               public $SourPozo = null;
               public $base = null;
               public $cmdImprimir = null;
               public $cmdCancelar = null;
               public $cmdAceptar = null;
               public $cmdEliminar = null;
               public $cmdModificar = null;
               public $cmdAgregar = null;
               public $Panel1 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;

               function frmCatalogodeCategoriasBeforeShow($sender, $params)
               {
                   global $sContrato;
                   global $_SESSION,$Usuario,$Clave,$Servidor;

                   $this->base->setConnected(false);
                   $this->base->setDatabaseName($_SESSION['database']);
                   $this->base->setUserName($Usuario);
                   $this->base->setUserPassword($Clave);
                   $this->base->setHost($Servidor);
                   $this->base->setConnected(true);

                   $sql = "select *
                           from categorias
                           where sContrato = '$sContrato'";
                   $this->QryPozo->setActive(false);
                   $this->QryPozo->setSQL($sql);
                   $this->QryPozo->setActive(true);
               }

               function GridTiposJSClick($sender, $params)
               {
               ?>               //Add your javascript code here
                    Selecciona();
                    return false;
               <?php
               }

               function GridTiposJSRowChanged($sender, $params)
               {
               ?>                //Add your javascript code here
                   Selecciona();
                   return false;
               <?php
               }


               function cmdAceptarJSClick($sender, $params)
               {
               ?>                //Add your javascript code here
                    return true;
               <?php
               }

               function cmdAceptarClick($sender, $params)
               {
                    global $sContrato;
                    $Id          = $this->txtId->Text;
                    $Descripcion = $this->txtDescripcion->Text;
                    $Opcion      = $this->HiOpcion->Value;
                    $IdOld       = $this->HiOldId->Value;

                    if ($Opcion == "Agregar")
                    {
                         $sql = "insert
                                 into categorias
                                      (sContrato,
                                       sIdCategoria,
                                       sDescripcion)
                                 values
                                      ('$sContrato',
                                       '$Id',
                                       '$Descripcion')";
                         mysql_query($sql);
                         if (mysql_error())
                         {
                            ?>
                            <script>
                               alert(" <?php echo " Error al Insertar los Datos ".mysql_error() ?>");
                            </script>
                            <?php
                         }
                    }

                    if ($Opcion == "Modificar")
                    {
                        $sql = "update categorias
                                set
                                   sIdCategoria = '$Id',
                                   sDescripcion = '$Descripcion'
                                where
                                       sIdCategoria = '$IdOld'
                                   and sContrato    = '$sContrato'";
                         mysql_query($sql);
                         if (mysql_error())
                         {
                            ?>
                            <script>
                               alert(" <?php echo " Error al Modificar los Datos ".mysql_error() ?>");
                            </script>
                            <?php
                         }

                    }
               }


               function cmdEliminarJSClick($sender, $params)
               {
               ?>               //Add your javascript code here
                    i   = GridTipos.getTableModel().getRowCount();
                    ok  = 0;
                    if (i>0)
                    {   if (!confirm("  Desea ELIMINAR La Categoria Seleccionada ?"))
                           ok = 1;
                    }
                    if (ok == 1)
                       return false;
                    else
                       return true;
               <?php
               }

               function cmdEliminarClick($sender, $params)
               {
                   global $sContrato;
                   $IdOld = $this->HiOldId->Value;
                   $sql = "delete from categorias
                           where
                                    sIdCategoria = '$IdOld'
                                and sContrato    = '$sContrato'";
                   mysql_query($sql);
                   if (mysql_error())
                   {
                       ?>
                       <script>
                               alert(" <?php echo " Error al Eliminar los Datos ".mysql_error() ?>");
                       </script>
                       <?php
                   }
               }

               function cmdCancelarJSClick($sender, $params)
               {
               ?>               //Add your javascript code here
                   controlBotones(false);
                   return false;
               <?php
               }



               function cmdModificarJSClick($sender, $params)
               {
               ?>               //Add your javascript code here
                   pozo = document.getElementById("txtId").value;
                   if (pozo == "")
                      alert (" Haga Click en Una Categoria !! ");
                   else
                   {
                        controlBotones(true);
                        document.getElementById("txtId").focus();
                        document.getElementById("HiOpcion").value = "Modificar";
                   }
                   return false;
               <?php
               }


               function cmdAgregarJSClick($sender, $params)
               {
               ?>              //Add your javascript code here
                 controlBotones(true);
                 document.getElementById("txtId").value          = "";
                 document.getElementById("txtDescripcion").value = "";
                 document.getElementById("HiOpcion").value    = "Agregar";
                 document.getElementById("txtId").focus();
                 return false;
               <?php
               }

               function cmdImprimirJSClick($sender, $params)
               {
               ?>                //Add your javascript code here
                     document.getElementById("cmdImprimir").style.width = 40;
                     return false;
               <?php
               }


               function dumpJavascript()
               {
                    echo 'function controlBotones( habilitar ){
                        if(habilitar){
                           accion = false;
                        }
                        else{
                             accion= true;
                        }
                        document.getElementById("txtId").disabled =accion;
                        document.getElementById("txtDescripcion").disabled =accion;
                        document.getElementById("cmdAgregar").disabled =habilitar;
                        document.getElementById("cmdModificar").disabled =habilitar;
                        document.getElementById("cmdEliminar").disabled =habilitar;
                        document.getElementById("cmdAceptar").disabled =accion;
                        document.getElementById("cmdCancelar").disabled =accion;
                        document.getElementById("cmdImprimir").disabled =habilitar;

                        if (habilitar==false){
                                        document.getElementById("cmdAgregar").src="recursos/imagenesMenu/Botones/Symbol-Add.ico";
                                        document.getElementById("cmdModificar").src="recursos/imagenesMenu/Botones/Edit.ico";
                                        document.getElementById("cmdAceptar").src="recursos/imagenesMenu/Botones/_Symbol-Check.ico";
                                        document.getElementById("cmdCancelar").src="recursos/imagenesMenu/Botones/_Undo.ico";
                                        document.getElementById("cmdEliminar").src="recursos/imagenesMenu/Botones/Symbol-Delete.ico";
                                        document.getElementById("cmdImprimir").src="recursos/imagenesMenu/Botones/32px-Crystal_Clear_action_fileprint.ico";
                                }else{
                                        document.getElementById("cmdAgregar").src="recursos/imagenesMenu/Botones/_Symbol-Add.ico";
                                        document.getElementById("cmdModificar").src="recursos/imagenesMenu/Botones/_Edit.ico";
                                        document.getElementById("cmdAceptar").src="recursos/imagenesMenu/Botones/Symbol-Check.ico";
                                        document.getElementById("cmdCancelar").src="recursos/imagenesMenu/Botones/Undo.ico";
                                        document.getElementById("cmdEliminar").src="recursos/imagenesMenu/Botones/_Symbol-Delete.ico";
                                        document.getElementById("cmdImprimir").src="recursos/imagenesMenu/Botones/_32px-Crystal_Clear_action_fileprint.ico";
                                }
                        return false;
                     }';

                      echo 'function ResaltarBotones()
                      {
                          document.getElementById("txtId").style.backgroundColor = "";
                          document.getElementById("txtDescripcion").style.backgroundColor = "";
                          document.getElementById("cmdAgregar").style.backgroundColor = "";
                          document.getElementById("cmdModificar").style.backgroundColor = "";
                          document.getElementById("cmdEliminar").style.backgroundColor = "";
                          document.getElementById("cmdAceptar").style.backgroundColor = "";
                          document.getElementById("cmdCancelar").style.backgroundColor = "";
                          document.getElementById("cmdImprimir").style.backgroundColor = "";
                          return false;
                      }';

                       echo 'function Selecciona()
                       {
                          GridTipos.getSelectionModel().iterateSelection
                          (  function(index)
                             {
                                var Tabla   = GridTipos.getTableModel();
                                sId         = Tabla.getValue(1, index);
                                sDescribir  = Tabla.getValue(2, index);

                                document.getElementById("txtId").value          = sId;
                                document.getElementById("txtDescripcion").value = sDescribir;
                                document.getElementById("HiOldId").value        = sId;
                                controlBotones(false);
                                Imagen(true);
                            }
                         );
                         return false;
                      }';

               }

               function txtDescripcionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtDescripcionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtDescripcionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdImprimirJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdImprimirJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdCancelarJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdCancelarJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdAceptarJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdAceptarJSMouseMove($sender, $params)
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

               function cmdEliminarJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdModificarJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdModificarJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdAgregarJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdAgregarJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtIdJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtIdJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtIdJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }


        }

        global $application;

        global $frmCatalogodeCategorias;

        //Creates the form
        $frmCatalogodeCategorias=new frmCatalogodeCategorias($application);

        //Read from resource file
        $frmCatalogodeCategorias->loadResource(__FILE__);

        //Shows the form
        $frmCatalogodeCategorias->show();

?>
<script>
controlBotones(false);
ResaltarBotones();
</script>
