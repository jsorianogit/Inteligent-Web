<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require("mysql.inc.php");
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
        class frmCatalogoEmbarcacion extends Page
        {
               public $txtJornada = null;
               public $CboFases = null;
               public $CboSuministro = null;
               public $CboStatus = null;
               public $CboTipo = null;
               public $memoDescribe = null;
               public $Label8 = null;
               public $Label7 = null;
               public $Label6 = null;
               public $txtIdEmbarcacion = null;
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
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;


               function frmCatalogoEmbarcacionBeforeShow($sender, $params)
               {
                   global $sContrato;
                   global $_SESSION,$Usuario,$Clave,$Servidor;

                   $this->base->setConnected(false);
                   $this->base->setDatabaseName($_SESSION['database']);
                   $this->base->setUserName($Usuario);
                   $this->base->setUserPassword($Clave);
                   $this->base->setHost($Servidor);
                   $this->base->setConnected(true);

                   $sql = "select * from embarcaciones";
                   $this->QryPozo->setActive(false);
                   $this->QryPozo->setSQL($sql);
                   $this->QryPozo->setActive(true);

                   $sql = "select sIdTipoEmbarcacion, sDescripcion
                           from tiposdeembarcacion";
                   $rs = mysql_query($sql);
                   while($row = mysql_fetch_array($rs))
                   {
                        $item[$row['sIdTipoEmbarcacion']]= $row['sDescripcion'];
                   }
                   $this->CboTipo->setItems($item);

               }


               function GridTiposJSClick($sender, $params)
               {
               ?>               //Add your javascript code here
                    Seleccionar();
                    return false;
               <?php
               }

               function GridTiposJSRowChanged($sender, $params)
               {
               ?>                  //Add your javascript code here
                    Seleccionar();
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
                    $Id          = strtoupper($this->txtIdEmbarcacion->Text);
                    $Descripcion = strtoupper($this->memoDescribe->Text);
                    $Tipo        = $this->CboTipo->getItemIndex();
                    $Status      = $this->CboStatus->getItemIndex();
                    $Suministro  = $this->CboSuministro->getItemIndex();
                    $Fases       = $this->CboFases->getItemIndex();
                    $Jornada     = $this->txtJornada->Text;
                    $Opcion      = $this->HiOpcion->Value;
                    $IdOld       = $this->HiOldId->Value;

                    if ($Opcion == "Agregar")
                    {
                         $sql = "insert
                                 into  embarcaciones
                                      (sContrato,
                                       sIdEmbarcacion,
                                       sDescripcion,
                                       sIdTipoEmbarcacion,
                                       lStatus,
                                       lsuministros,
                                       lFases,
                                       iJornada)
                                 values
                                      ('$sContrato',
                                       '$Id',
                                       '$Descripcion',
                                       '$Tipo',
                                       '$Status',
                                       '$Suministro',
                                       '$Fases',
                                       '$Jornada')";
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
                        $sql = "update embarcaciones
                                set
                                   sIdEmbarcacion     = '$Id',
                                   sDescripcion       = '$Descripcion',
                                   sIdTipoEmbarcacion = '$Tipo',
                                   lStatus            = '$Status',
                                   lsuministros       = '$Suministro',
                                   lFases             = '$Fases',
                                   iJornada           = '$Jornada'
                                where
                                   sIdEmbarcacion = '$IdOld'
                                   and sContrato  = '$sContrato'";
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
                    {   if (!confirm("  Desea ELIMINAR La Embarcacion Seleccionada ?"))
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
                   $sql = "delete from embarcaciones
                           where  sIdEmbarcacion = '$IdOld'
                                  and sContrato  = '$sContrato'";
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
                   pozo = document.getElementById("txtIdEmbarcacion").value;
                   if (pozo == "")
                      alert (" Haga Click en Un Tipo de Embarcacion !! ");
                   else
                   {
                        controlBotones(true);
                        document.getElementById("txtIdEmbarcacion").focus();
                        document.getElementById("HiOpcion").value = "Modificar";
                   }
                   return false;
               <?php
               }


               function cmdAgregarJSClick($sender, $params)
               {
               ?>              //Add your javascript code here
                 controlBotones(true);
                 document.getElementById("txtIdEmbarcacion").value = "";
                 document.getElementById("memoDescribe").value     = "";
                 document.getElementById("txtJornada").value       = "";
                 document.getElementById("HiOpcion").value         = "Agregar";
                 document.getElementById("txtIdEmbarcacion").focus();
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
                        document.getElementById("txtIdEmbarcacion").disabled =accion;
                        document.getElementById("memoDescribe").disabled =accion;
                        document.getElementById("CboTipo").disabled = accion;
                        document.getElementById("CboStatus").disabled = accion;
                        document.getElementById("CboSuministro").disabled = accion;
                        document.getElementById("CboFases").disabled = accion;
                        document.getElementById("txtJornada").disabled = accion;
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
                          document.getElementById("txtIdEmbarcacion").style.backgroundColor = "";
                          document.getElementById("memoDescribe").style.backgroundColor = "";
                          document.getElementById("CboTipo").style.backgroundColor = "";
                          document.getElementById("CboStatus").style.backgroundColor = "";
                          document.getElementById("CboSuministro").style.backgroundColor = "";
                          document.getElementById("CboFases").style.backgroundColor = "";
                          document.getElementById("txtJornada").style.backgroundColor = "";
                          document.getElementById("cmdAgregar").style.backgroundColor = "";
                          document.getElementById("cmdModificar").style.backgroundColor = "";
                          document.getElementById("cmdEliminar").style.backgroundColor = "";
                          document.getElementById("cmdAceptar").style.backgroundColor = "";
                          document.getElementById("cmdCancelar").style.backgroundColor = "";
                          document.getElementById("cmdImprimir").style.backgroundColor = "";
                          return false;
                      }';

                      echo 'function Seleccionar()
                      {     GridTipos.getSelectionModel().iterateSelection
                            (  function(index)
                               {
                                  var Tabla      = GridTipos.getTableModel();
                                  sId            = Tabla.getValue(1, index);
                                  sDescripcion   = Tabla.getValue(2, index);
                                  sTipo          = Tabla.getValue(3, index);
                                  sStatus        = Tabla.getValue(4, index);
                                  sSuministro    = Tabla.getValue(5, index);
                                  sFases         = Tabla.getValue(6, index);
                                  sJornada       = Tabla.getValue(7, index);

                                  document.getElementById("txtIdEmbarcacion").value = sId;
                                  document.getElementById("memoDescribe").value     = sDescripcion;
                                  document.getElementById("CboTipo").value          = sTipo;
                                  document.getElementById("CboStatus").value        = sStatus;
                                  document.getElementById("CboSuministro").value    = sSuministro;
                                  document.getElementById("CboFases").value         = sFases;
                                  document.getElementById("txtJornada").value       = sJornada;
                                  document.getElementById("HiOldId").value          = sId;
                                  controlBotones(false);
                                  Imagen(true);
                               }
                            );
                            return false;
                      }';

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

               function txtJornadaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtJornadaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtJornadaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboFasesJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboFasesJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboFasesJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboSuministroJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboSuministroJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboSuministroJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboStatusJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboStatusJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboStatusJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboTipoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboTipoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboTipoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function memoDescribeJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function memoDescribeJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function memoDescribeJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtIdEmbarcacionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtIdEmbarcacionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtIdEmbarcacionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

        }

        global $application;

        global $frmCatalogoEmbarcacion;

        //Creates the form
        $frmCatalogoEmbarcacion=new frmCatalogoEmbarcacion($application);

        //Read from resource file
        $frmCatalogoEmbarcacion->loadResource(__FILE__);

        //Shows the form
        $frmCatalogoEmbarcacion->show();

?>
<script>
controlBotones(false);
ResaltarBotones();
</script>
