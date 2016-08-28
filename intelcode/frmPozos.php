<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        //require("mysql.inc.php");
        use_unit("buttons.inc.php");
        use_unit("imglist.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        //$sUsuario=$_SESSION["ssUsuario"];
        ///$sIdConvenio =$sIdConvenioAct;
        require_once("Connection.php");
        //Class definition
        class frmPozos extends Page
        {
               public $HiOpcion = null;
               public $HiConsecutivo = null;
               public $QryPozo = null;
               public $SourPozo = null;
               public $base = null;
               public $GridPozos = null;
               public $cmdImprimir = null;
               public $cmdCancelar = null;
               public $cmdAceptar = null;
               public $cmdEliminar = null;
               public $cmdModificar = null;
               public $cmdAgregar = null;
               public $txtEquipo = null;
               public $txtDescripcion = null;
               public $txtPozo = null;
               public $Panel1 = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;
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


               function frmPozosBeforeShow($sender, $params)
               {
                   global $sContrato;
                   global $_SESSION,$Usuario,$Clave,$Servidor;
                   global $Connection ;

//                   $this->base->setConnected(false);
//                   $this->base->setDatabaseName($_SESSION['database']);
//                   $this->base->setUserName($Usuario);
//                   $this->base->setUserPassword($Clave);
//                   $this->base->setHost($Servidor);
//                   $this->base->setConnected(true);

//                  $Connection->base->setConnected(false);
//                  $Connection->base->setConnected(true);
                     $Connection->conectar();
                   $this->QryPozo->setActive(false);
                   $this->QryPozo->setFilter("nConsecutivo <> '????'
                                              order by nConsecutivo DESC");
                   $this->QryPozo->setActive(true);

               }


               function GridPozosJSClick($sender, $params)
               {
               ?>               //Add your javascript code here

                    GridPozos.getSelectionModel().iterateSelection
                    (    function(index)
                         {
                              var Tabla      = GridPozos.getTableModel();
                              sPozo          = Tabla.getValue(0, index);
                              sDescripcion   = Tabla.getValue(1, index);
                              sEquipo        = Tabla.getValue(2, index);

                              document.getElementById("txtPozo").value = sPozo;
                              document.getElementById("txtDescripcion").value = sDescripcion;
                              document.getElementById("txtEquipo").value = sEquipo;
                              controlBotones(false);
                              Imagen(true);
                         }
                    );

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
                    $Consecutivo = $this->HiConsecutivo->Value;
                    $Pozo        = $this->txtPozo->Text;
                    $Descripcion = $this->txtDescripcion->Text;
                    $Equipo      = $this->txtEquipo->Text;
                    $Opcion      = $this->HiOpcion->Value;

                    if ($Opcion == "Agregar")
                    {
                         $sql = "select max(nConsecutivo) as ultimo
                                 from  pozos ";
                         $rs  = mysql_query($sql);
                         $Maximo = 0;
                         if( $row = mysql_fetch_array($rs))
                             $Maximo = $row['ultimo'];

                         $Consecutivo = $Maximo + 1;

                         $sql = "insert
                                 into pozos
                                      (nConsecutivo,
                                       sIdPozo,
                                       sDescripcion,
                                       sEquipo)
                                 values
                                      ('$Consecutivo',
                                       '$Pozo',
                                       '$Descripcion',
                                       '$Equipo')";
                         mysql_query($sql);
                         if (mysql_error())
                         {
                            ?>
                            <script>
                               alert(" <?php echo " Error al Insertar los Datos".mysql_error() ?>");
                            </script>
                            <?php
                         }
                    }

                    if ($Opcion == "Modificar")
                    {
                        $sql = "update pozos
                                set
                                   sIdPozo      = '$Pozo',
                                   sDescripcion = '$Descripcion',
                                   sEquipo      = '$Equipo'
                                where
                                   nConsecutivo = '$Consecutivo'";
                         mysql_query($sql);
                         if (mysql_error())
                         {
                            ?>
                            <script>
                               alert(" <?php echo " Error al Modificar los Datos".mysql_error() ?>");
                            </script>
                            <?php
                         }

                    }
               }


               function cmdEliminarJSClick($sender, $params)
               {
               ?>               //Add your javascript code here
                    i   = GridPozos.getTableModel().getRowCount();
                    ok  = 0;
                    if (i>0)
                    {
                        var Tabla = GridPozos.getTableModel();
                        sConsecutivo = Tabla.getValue(3,GridPozos.getFocusedRow());
                        document.getElementById("HiConsecutivo").value = sConsecutivo;

                        if (!confirm("  Desea ELIMINAR El POZO Seleccionado ?"))
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
                   $Consecutivo = $this->HiConsecutivo->Value;
                   $sql = "delete from pozos
                           where nConsecutivo = '$Consecutivo'";
                   mysql_query($sql);
                   if (mysql_error())
                   {
                       ?>
                       <script>
                               alert(" <?php echo " Error al Eliminar los Datos".mysql_error() ?>");
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
                   pozo = document.getElementById("txtPozo").value;
                   if (pozo == "")
                      alert (" Haga Click en Un Pozo !! ");
                   else
                   {
                        controlBotones(true);
                        var Tabla      = GridPozos.getTableModel();
                        sConsecutivo   = Tabla.getValue(3,GridPozos.getFocusedRow());
                        document.getElementById("HiConsecutivo").value = sConsecutivo;
                        document.getElementById("txtPozo").focus();
                        document.getElementById("HiOpcion").value        = "Modificar";
                   }
                   return false;
               <?php
               }


               function cmdAgregarJSClick($sender, $params)
               {
               ?>              //Add your javascript code here
                 controlBotones(true);
                 document.getElementById("txtPozo").value         = "";
                 document.getElementById("txtDescripcion").value  = "";
                 document.getElementById("txtEquipo").value       = "";
                 document.getElementById("HiOpcion").value       = "Agregar";
                 document.getElementById("txtPozo").focus();
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
                           Color1="gray";
                           Color2="";
                        }
                        else{
                             accion= true;
                             Color1="";
                             Color2="gray";
                        }
                        document.getElementById("txtPozo").disabled =accion;
                        document.getElementById("txtDescripcion").disabled =accion;
                        document.getElementById("txtEquipo").disabled =accion;
                        document.getElementById("cmdAgregar").disabled =habilitar;
                        document.getElementById("cmdModificar").disabled =habilitar;
                        document.getElementById("cmdEliminar").disabled =habilitar;
                        document.getElementById("cmdAceptar").disabled =accion;
                        document.getElementById("cmdCancelar").disabled =accion;
                        document.getElementById("cmdImprimir").disabled =habilitar;
                        return false;
                     }';

                      echo 'function ResaltarBotones()
                      {
                          document.getElementById("txtPozo").style.backgroundColor = "";
                          document.getElementById("txtDescripcion").style.backgroundColor = "";
                          document.getElementById("txtEquipo").style.backgroundColor = "";
                          document.getElementById("cmdAgregar").style.backgroundColor = "";
                          document.getElementById("cmdModificar").style.backgroundColor = "";
                          document.getElementById("cmdEliminar").style.backgroundColor = "";
                          document.getElementById("cmdAceptar").style.backgroundColor = "";
                          document.getElementById("cmdCancelar").style.backgroundColor = "";
                          document.getElementById("cmdImprimir").style.backgroundColor = "";
                          return false;
                      }';

               }


               function txtEquipoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtEquipoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtEquipoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

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

               function txtPozoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtPozoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtPozoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }



        }

        global $application;

        global $frmPozos;

        //Creates the form
        $frmPozos=new frmPozos($application);

        //Read from resource file
        $frmPozos->loadResource(__FILE__);

        //Shows the form
        $frmPozos->show();

?>
<script>
controlBotones(false);
ResaltarBotones();
</script>
