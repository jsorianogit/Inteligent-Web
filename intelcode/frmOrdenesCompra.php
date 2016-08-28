<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require("mysql.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        //$sContrato='428238909';
        $sUsuario=$_SESSION["ssUsuario"];
        //$sUsuario='ijesus';
        $sIdConvenio =$sIdConvenioAct;//'C-01';
        //Class definition
        class frmOrdenesCompra extends Page
        {
               public $cmbPart = null;
               public $Label24 = null;
               public $hdlStatus = null;
               public $TxtTotalPagos = null;
               public $TxtAnticipo = null;
               public $TxtInteres = null;
               public $TxtPeriodoPago = null;
               public $Label33 = null;
               public $Label32 = null;
               public $Label31 = null;
               public $Label30 = null;
               public $HidNReq = null;
               public $HidHayInsumo = null;
               public $CmdMostrar = null;
               public $HidStrNum = null;
               public $txtNuevoCosto = null;
               public $Label16 = null;
               public $txtFolioCat = null;
               public $sRequisicion = null;
               public $Label12 = null;
               public $txtCostoInsumo = null;
               public $chkStatus = null;
               public $txtLAB = null;
               public $txtCalidad = null;
               public $txtCosto = null;
               public $txtMTransporte = null;
               public $chkProveedor = null;
               public $txtCredito = null;
               public $txtMoneda = null;
               public $TiempoEntrega = null;
               public $txtFormaPag = null;
               public $txtFactura = null;
               public $Label29 = null;
               public $Label28 = null;
               public $Label27 = null;
               public $Label26 = null;
               public $Label25 = null;
               public $Label23 = null;
               public $Label22 = null;
               public $Label21 = null;
               public $txtReviso1 = null;
               public $txtReviso2 = null;
               public $Label20 = null;
               public $dbgCatalogo = null;
               public $dtaCatalogo = null;
               public $qryCatalogo = null;
               public $Label19 = null;
               public $Label8 = null;
               public $Panel5 = null;
               public $txtAutorizo = null;
               public $txtElaboro = null;
               public $txtRevision = null;
               public $Elaboro = null;
               public $Recibido = null;
               public $Verificacion = null;
               public $Autorizo = null;
               public $Revision = null;
               public $hdfFolioActual = null;
               public $hdfMultisesion = null;
               public $iFolioPedido = null;
               public $qryAnexo_pedidos = null;
               public $dsAnexo_pedidos = null;
               public $dbgPedidos = null;
               public $dtaF_Entrega = null;
               public $sProveedor = null;
               public $Label18 = null;
               public $Label17 = null;
               public $hdfItemOld = null;
               public $hdfPartidaOld = null;
               public $hdfOpcionPartida = null;
               public $dtaPartidas = null;
               public $qryPartidas = null;
               public $dbgPartidas = null;
               public $qryGeneral = null;
               public $dtaGenral = null;
               public $dtaActMostrar = null;
               public $qryActMostrar = null;
               public $dbgActMostrar = null;
               public $dbgGeneral = null;
               public $hdfIniciaPartidas = null;
               public $hdfUltimoFolio = null;
               public $hdfFechaActual = null;
               public $hdfHoraActual = null;
               public $hdfOpcion = null;
               public $cmdCancelRequisicion = null;
               public $cmdAcceptRequisicion = null;
               public $cmdDeleteRequisicion = null;
               public $cmdChangeRequisicion = null;
               public $cmdAddRequisicion = null;
               public $cmdPrintRequisicion = null;
               public $cmdEliminaPartida = null;
               public $cmdCancelaPartida = null;
               public $cmdAceptaPartida = null;
               public $cmdEditPartida = null;
               public $cmdAddPartida = null;
               public $lblTituloAnexo = null;
               public $txtCantidadAnexo = null;
               public $txtUnidad = null;
               public $txtMaterial = null;
               public $txtMedida = null;
               public $txtCantidad = null;
               public $memoCometarios = null;
               public $txtCPT = null;
               public $txtNumPartida = null;
               public $cmdShowPartidas = null;
               public $cmdShowRequisicion = null;
               public $Panel4 = null;
               public $Panel3 = null;
               public $db = null;
               public $Label15 = null;
               public $Label14 = null;
               public $Label13 = null;
               public $Label10 = null;
               public $Label9 = null;
               public $Label11 = null;
               public $Label7 = null;
               public $Panel2 = null;
               public $mComentarios = null;
               public $sReferencia = null;
               public $dIdFecha = null;
               public $sNumeroOrden = null;
               public $Label6 = null;
               public $Label5 = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Panel1 = null;


               function CmdMostrarJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                   i = dbgCatalogo.getTableModel().getRowCount();
                   if (i == 0)
                          alert ("  LA REQUISICION SELECCIONADA NO CONTIENE INSUMOS !!");
                   if (i>0)
                   {   valor = dbgCatalogo.getTableModel().getValue(0,0);
                       if (valor == "")
                          alert ("  DEBE SELECCONAR UNA REQUISICION !!");
                       else
                       {    document.getElementById("Panel5_outer").style.height = 100;
                            document.getElementById("Panel5_outer").style.display = "block";
                       }
                   }
                   return false;
               <?php
               }

               function sRequisicionJSChange($sender, $params)
               {
               ?>
                  //Add your javascript code here
                    params = document.getElementById("sRequisicion").value;
                    document.getElementById("HidNReq").value = params;
                    document.getElementById("Label8").innerHTML = "INSUMOS DE LA REQUISICION NO. "+params;
                    <?php
                        echo $this->sRequisicion->ajaxCall("MuestraInsumos",array(),array("sRequisicion","dbgCatalogo"));
                    ?>
                      return false;
               <?php
               }

               function MuestraInsumos($sender, $params)
               {    /*Eliminar de los datos*/
                    global $sContrato;
                    $FolioReq = $params;
                    $sql = "select
                              PR.sIdInsumo as Insumo,
                              PR.mDescripcion as Descripcion,
                              PR.dCantidad as Cantidad,
                              PR.sMedida as Medida,
                              INSU.dVentaMN as Venta,
                              INSU.dCostoMN as Costo,
                              INSU.dNuevoPrecio as NvoCosto,
                              PR.iItem as Item,
                              INSU.dCantidad as CantInsumo
                           from
                              anexo_prequisicion PR
                           inner join
                               insumos INSU
                           on ( INSU.sContrato = PR.sContrato
                                and INSU.sIdInsumo = PR.sIdInsumo)
                           where PR.sContrato = '$sContrato'
                                 and PR.iFolioRequisicion = '$FolioReq' ";

                  $this->qryCatalogo->setActive(false);
                  $this->qryCatalogo->setSQL($sql);
                  $this->qryCatalogo->setActive(true);
                  $this->HidHayInsumo->Value=1;
               }

               function dbgCatalogoJSDblClick($sender, $params)
               {
               ?>
               //Add your javascript code here
                 document.getElementById("Panel5_outer").style.display = "none";
                 i=dbgCatalogo.getFocusedRow();
                    var sInsumo = dbgCatalogo.getTableModel().getValue(0,i);
                    var sDescripcion = dbgCatalogo.getTableModel().getValue(1,i);
                    var sCantidad = dbgCatalogo.getTableModel().getValue(2,i);
                    var sMedida = dbgCatalogo.getTableModel().getValue(3,i);
                    var sCosto = dbgCatalogo.getTableModel().getValue(4,i);
                    var sNuevoCosto = dbgCatalogo.getTableModel().getValue(5,i);
                    var sCantInsumo = dbgCatalogo.getTableModel().getValue(6,i);
                    document.getElementById("txtCantidad").value = sCantidad;
                    document.getElementById("txtNumPartida").value = sInsumo;
                    document.getElementById("memoCometarios").value = sDescripcion;
                    document.getElementById("txtMedida").value = sMedida;
                    document.getElementById("txtMaterial").value = sCosto;
                    document.getElementById("txtUnidad").value = sMedida;
                    document.getElementById("txtCantidadAnexo").value = sCantInsumo;
                    document.getElementById("txtNuevoCosto").value = sNuevoCosto;
                    document.getElementById("txtCostoInsumo").value = sNuevoCosto;
                    if (sNuevoCosto==0)
                    {   document.getElementById("txtNuevoCosto").value = sCosto;
                        document.getElementById("txtCostoInsumo").value = sCosto;
                    }

                 return false;
               <?php
               }

               function txtNumPartidaJSKeyUp($sender, $params)
               {
               ?>
               //Add your javascript code here
                 //if(event.keyCode>47)
                 //{   var texto = document.getElementById("txtNumPartida").value.toUpperCase();
                 //    MuestraCatalogo(texto);
                 //      document.getElementById("Panel5_outer").style.display = "block";
                 //    return false;
                 // }
                 i = dbgCatalogo.getTableModel().getRowCount();
                   if (i>0)
                   {   valor = dbgCatalogo.getTableModel().getValue(0,0);
                       if (valor == "")
                          alert ("  DEBE SELECCONAR UNA REQUISICION !!");
                       else
                           document.getElementById("Panel5_outer").style.display = "block";
                   }
                   return false;
               <?php
               }

               function cmdAceptaPartidaClick($sender, $params)
               {
                   global $sContrato;
                   $Folio = $this->iFolioPedido->Text;
                   $sActividad = $this->txtNumPartida->Text;
                   $sItem = $this->txtCPT->Text;
                   $sDescripcion = str_replace("'","",$this->memoCometarios->Text);
                   $sMedida = $this->txtMedida->Text;
                   $sCantidad = $this->txtCantidad->Text;
                   $sCostoActual = $this->txtNuevoCosto->Text;
                   $sCosto = $this->txtCostoInsumo->Text;
                   $i = $this->sNumeroOrden->getItemIndex();
                   $sNumeroOrden = $this->sNumeroOrden->Items[$i];
                   $j = $this->cmbPart->getItemIndex();
                   $sNumeroActividad = $this->cmbPart->Items[$j];
                   $error=0;

                   if ($this->hdfOpcionPartida->Value=="Agregar")
                   {   // SE insertan los datos en la tabla anexo_ppedido..
                       $sql=" INSERT INTO
                                     anexo_ppedido
                                   ( sContrato, iFolioPedido, sIdInsumo,
                                     iItem, mDescripcion, sMedida,
                                     dCantidad, dCosto, sNumeroOrden,
                                     sNumeroActividad, lStatus )
                              VALUES
                                   ( '$sContrato', '$Folio', '$sActividad',
                                     '$sItem', '$sDescripcion', '$sMedida',
                                     '$sCantidad', '$sCostoActual', '$sNumeroOrden',
                                     '$sNumeroActividad', 'Pendiente')";
                       mysql_query($sql);
                       if (mysql_error())
                         $error=1;

                       if ($error==1)
                       {
                         //Se busca el maximo item del insumo repetido
                         $sql = "Select Max(iItem) as iItem
                               From anexo_ppedido
                               Where sContrato = '$sContrato'
                                     And iFolioPedido = '$Folio'
                                     and sIdInsumo = '$sActividad'";
                         $rs = mysql_query($sql);
                         if($row = mysql_fetch_array($rs))
                         {
                            $Maximo = $row['iItem'];
                         }
                         $sItem = $Maximo+1;
echo $sItem;
                         // Se inseta un nuevo registro si se encuentra una partida igual,
                         // solo aqui va incrementando el item, el cual las identifica a cada una
                         $sql="INSERT INTO
                                     anexo_ppedido
                                   ( sContrato, iFolioPedido, sIdInsumo,
                                     iItem, mDescripcion, sMedida,
                                     dCantidad, dCosto, sNumeroOrden,
                                     sNumeroActividad, lStatus )
                              VALUES
                                   ( '$sContrato', '$Folio', '$sActividad',
                                     '$sItem', '$sDescripcion', '$sMedida',
                                     '$sCantidad', '$sCostoActual', '$sNumeroOrden',
                                     '$sNumeroActividad', 'Pendiente' )";
                         mysql_query($sql);
                          ?>
                           <script>
                              alert(" <?php echo "Se encontro una Coincidencia del Insumo en la Orden de Compra Actual, por lo que el SISTEMA creara un Nuevo Registro !!!" ?>");
                           </script>
                           <?php

                       }
                       $sql = " UPDATE insumos
                                SET dCostoMN = '$sCosto', dNuevoPrecio = '$sCostoActual'
                                WHERE sContrato = '$sContrato'
                                      And sIdInsumo = '$sActividad'";
                       mysql_query($sql);


                    }
                    if ($this->hdfOpcionPartida->Value=="Modificar")
                    {
                        $PartidaOld=$this->hdfPartidaOld->Value;
                        $ItemOld=$this->hdfItemOld->Value;
                        //Actualizacion de los datos en la tabla anexo_prequisicion...
                        $sql = " UPDATE anexo_ppedido
                                SET sIdInsumo = '$sActividad', sNumeroActividad = '$sNumeroActividad', iItem = '$sItem',
                                    mDescripcion = '$sDescripcion', sMedida = '$sMedida',
                                    dCantidad = '$sCantidad', dCosto = '$sCostoActual',
                                    sNumeroOrden = '$sNumeroOrden'
                                WHERE sContrato = '$sContrato'
                                      And iFolioPedido = '$Folio'
                                      And sIdInsumo = '$PartidaOld'
                                      And iItem = '$ItemOld' ";
                       mysql_query($sql);
                       if (mysql_error())
                           $error=1;

                       $sql = " UPDATE insumos
                                SET dCostoMN = '$sCosto', dNuevoPrecio = '$sCostoActual'
                                WHERE sContrato = '$sContrato'
                                      And sIdInsumo = '$PartidaOld'";
                       mysql_query($sql);

                       if ($error==1)
                       {
                          ?>
                          <script>
                             alert(" <?php echo "Ocurrio un Error al Actualizar los Datos: ".mysql_error() ?>");
                          </script>
                          <?php
                       }

                    }
                    $sql = " select sum(dCantidad * dCosto) as suma
                             from
                                 anexo_ppedido
                             where sContrato= '$sContrato'
                                   and iFolioPedido ='$Folio'";
                    $rs = mysql_query($sql);
                    if ($row = mysql_fetch_array($rs))
                        $CostoPedido = $row['suma'];

                    $sql = " UPDATE  anexo_pedidos
                             SET dCosto = '$CostoPedido'
                             WHERE sContrato = '$sContrato'
                                   And iFolioPedido = '$Folio'";
                    mysql_query($sql);

                    $this->LimpiaObjetos();
               }

               function cmdEliminaPartidaClick($sender, $params)
               {
                   global $sContrato;
                   $Folio = $this->iFolioPedido->Text;
                   $sActividad = $this->txtNumPartida->Text;
                   $sItem = $this->txtCPT->Text;
                   $error=0;
                   //Eliminacion del registro seleccionado en la tabla anexo_prequisicion
                   $sql = " Delete
                            from anexo_ppedido
                            where sContrato = '$sContrato'
                            And iFolioPedido = '$Folio'
                            And sIdInsumo = '$sActividad'
                            And iItem = '$sItem'";
                   mysql_query($sql);
                   if (mysql_error())
                      $error=1;

                    if ($error==1)
                   {
                     ?>
                     <script>
                       alert(" <?php echo "Ocurrio un error al Eliminar los Datos !!! ".mysql_error() ?>");
                     </script>
                     <?php
                   }

                   $sql = " select sum(dCantidad * dCosto) as suma
                             from
                                 anexo_ppedido
                             where sContrato= '$sContrato'
                                   and iFolioPedido ='$Folio'";
                    $rs = mysql_query($sql);
                    if ($row = mysql_fetch_array($rs))
                        $CostoPedido = $row['suma'];

                    $sql = " UPDATE  anexo_pedidos
                             SET dCosto = '$CostoPedido'
                             WHERE sContrato = '$sContrato'
                                   And iFolioPedido = '$Folio'";
                    mysql_query($sql);

                   $this->LimpiaObjetos();
               }

               function dbgPartidasJSClick($sender, $params)
               {
               ?>
               //Add your javascript code here
                 if (document.getElementById("hdfOpcionPartida").value == "Modificar")
                 {   dbgPartidas.getSelectionModel().iterateSelection
                     (    function(index)
                          {
                             //obtenemos los datos del grid Requisiciones
                             var Tabla = dbgPartidas.getTableModel();
                             var sPartida = Tabla.getValue(0, index);
                             var sItem = Tabla.getValue(1, index);
                             var sDescripcion = Tabla.getValue(3, index);
                             var sCantidad = Tabla.getValue(4, index);
                             var sMedida = Tabla.getValue(2, index);
                             var sCosto = Tabla.getValue(6, index);
                             var sCantidadAnexo = Tabla.getValue(5, index);
                             var sNuevoCosto = Tabla.getValue(8, index);

                             document.getElementById("txtNumPartida").value = sPartida;
                             document.getElementById("txtCPT").value = sItem;
                             document.getElementById("memoCometarios").value = sDescripcion;
                             document.getElementById("txtCantidad").value = sCantidad;
                             document.getElementById("txtMedida").value = sMedida;
                             document.getElementById("txtMaterial").value = sCosto;
                             document.getElementById("txtUnidad").value = sMedida;
                             document.getElementById("txtCantidadAnexo").value = sCantidadAnexo;
                             document.getElementById("txtNuevoCosto").value = sNuevoCosto;
                             document.getElementById("txtCostoInsumo").value = sNuevoCosto;
                             document.getElementById("txtNumPartida").focus();
                             return false;
                          }
                     );
                 }
                 return false;
               <?php
               }

               function cmdCancelaPartidaJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                  controlAnexoPartidas(false);
                  document.getElementById("hdfOpcionPartida").value="";
                  document.getElementById("Panel5_outer").style.display = "none";
                  return false;
               <?php
               }

               function cmdEliminaPartidaJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                  ok=0;
                  resp=0;
                  var Folio = document.getElementById("iFolioPedido").value;
                  if (Folio=="")
                  {   alert ("  HAGA CLICK SOBRE UNA ORDEN DE COMPRA !!!" );
                      return false;
                  } else
                        {
                           dbgPartidas.getSelectionModel().iterateSelection
                           (    function(index)
                                {
                                     //obtenemos los datos del grid Requisiciones
                                    var Tabla = dbgPartidas.getTableModel();
                                    var sPartida = Tabla.getValue(0, index);
                                    var sItem = Tabla.getValue(1, index);
                                    ok=1;
                                    document.getElementById("hdfOpcionPartida").value="Eliminar";
                                    if(!confirm("  Desea ELIMINAR El INSUMO Seleccionado ?"))
                                        resp=1;
                                    document.getElementById("iFolioPedido").disabled=false;
                                    document.getElementById("txtNumPartida").value = sPartida;
                                    document.getElementById("txtCPT").value = sItem;
                                    document.getElementById("txtNumPartida").disabled = false;
                                    document.getElementById("txtCPT").disabled = false;
                                    document.getElementById("hdfMultisesion").value="dos";
                                }
                           );
                        }
                  if (ok==0)
                  {  alert("  DEBE HACER CLICK SOBRE UNA ORDEN DE COMPRA !!!");
                     return false;
                  }
                  if (resp==1)
                  {
                      document.getElementById("iFolioPedido").disabled=true;
                      document.getElementById("txtNumPartida").disabled = true;
                      document.getElementById("txtCPT").disabled = true;
                  }
                  if (resp==1)
                     return false;
                  else
                     return true;

               <?php
               }

               function cmdEditPartidaJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                 var Folio = document.getElementById("iFolioPedido").value;
                  if (Folio=="")
                  {   alert ("  HAGA CLICK SOBRE UNA ORDEN DE COMPRA !!!" );
                      return false;
                  } else
                        {  controlAnexoPartidas(true);
                           document.getElementById("txtNumPartida").focus();
                           document.getElementById("hdfOpcionPartida").value = "Modificar";
                        }
                  return false;
               <?php
               }

               function cmdAceptaPartidaJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                   var sPartida = document.getElementById("txtNumPartida").value;
                   var sItem = document.getElementById("txtCPT").value;
                   var sComentario = document.getElementById("memoCometarios").value;
                   var sCantidad = document.getElementById("txtCantidad").value;
                   var sCantidadAnexo = document.getElementById("txtCantidadAnexo").value;
                   var sMedida = document.getElementById("txtMedida").value;
                   var sCosto = document.getElementById("txtNuevoCosto").value;
                   resp=0;
                   if (sPartida=="" || sComentario=="" || sMedida=="")
                   {   alert ("  DEBE LLENAR TODOS LOS CAMPOS !!!");
                       resp=1;
                   }
                   if (sItem=="")
                       document.getElementById("txtCPT").value="0";

                   if (sCantidad=="")
                       document.getElementById("txtCantidad").value="0";

                   var CostoAntes = document.getElementById("txtMaterial").value;
                   if (sCosto=="")
                      document.getElementById("txtNuevoCosto").value = CostoAntes;

                   document.getElementById("txtMaterial").value = document.getElementById("txtCostoInsumo").value;

                   document.getElementById("hdfIniciaPartidas").value='si';
                   document.getElementById("iFolioPedido").disabled=false;
                   var ActAntes = dbgPartidas.getTableModel().getValue(0,dbgPartidas.getFocusedRow());
                   document.getElementById("hdfPartidaOld").value = ActAntes;
                   var ItemAntes = dbgPartidas.getTableModel().getValue(1,dbgPartidas.getFocusedRow());
                   document.getElementById("hdfItemOld").value = ItemAntes;
                   document.getElementById("hdfMultisesion").value="dos";

                   if (resp==1)
                       return false;
                   else
                       return true;

               <?php
               }

               function cmdAddPartidaJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                  var Folio = document.getElementById("iFolioPedido").value;
                  if (Folio=="")
                  {   i=dbgPedidos.getFocusedRow();
                      Folio = dbgPedidos.getTableModel().getValue(0,i);
                      var sOrden = dbgPedidos.getTableModel().getValue(1,i);
                      document.getElementById("iFolioPedido").value = Folio;
                      document.getElementById("sNumeroOrden").value = sOrden;
                  }
                  controlAnexoPartidas(true);
                  document.getElementById("txtNumPartida").focus();
                  document.getElementById("txtNumPartida").value = "";
                  document.getElementById("txtCPT").value = "";
                  document.getElementById("memoCometarios").value = "";
                  document.getElementById("txtCantidad").value = "";
                  document.getElementById("txtMedida").value = "";
                  document.getElementById("txtCostoInsumo").value = "";
                  document.getElementById("hdfOpcionPartida").value = "Agregar";
                 return false;
               <?php
               }


               //DE AQUI EN ADELANTE SE HACEN LAS OPERACIONES CON LAS REQUISICIONES....
               function cmdDeleteRequisicionClick($sender, $params)
               {
                   global $sContrato;
                   global $sUsuario;
                   $iFolio=$this->iFolioPedido->Text;
                   $Hora=$this->hdfHoraActual->Value;
                   $FechaActual=$this->hdfFechaActual->Value;
                   $error=0;

                   // Actualizacion del cardex del sistema..
                   $sql= " Insert Into kardex_sistema
                                  ( sContrato, sIdUsuario, dIdFecha,
                                    sHora, sDescripcion, lOrigen )
                           Values ( '$sContrato', '$sUsuario', '$FechaActual' ,
                                    '$Hora' , 'Eliminación de Pedido [ $iFolio ] Registrado el [ $FechaActual ] Usuario [ $sUsuario ]', 'Requisiciones y Compras' )";

                   //Eliminacions de la requisicion en la tabla prequisicion..
                   $sql= " Delete from
                                  anexo_ppedido
                           where sContrato = '$sContrato'
                                 And iFolioPedido = '$iFolio'";
                   mysql_query($sql);
                   if (mysql_error())
                      $error=1;

                   //Eliminacions de la requisicion en la tabla anexo_requisicion..
                   $sql= " Delete from
                                  anexo_pedidos
                           where sContrato = '$sContrato'
                           And iFolioPedido = '$iFolio'";
                   mysql_query($sql);
                   if (mysql_error())
                      $error=1;

                   if ($error==1)
                   {
                          ?>
                          <script>
                             alert(" <?php echo "Ocurrio un Error al Eliminar los Datos: ".mysql_error() ?>");
                          </script>
                          <?php
                   }
                  $this->LimpiaObjetos();
               }

               function cmdAcceptRequisicionClick($sender, $params)
               {
                   global $sContrato;
                   global $sUsuario;
                   $iFolio = $this->iFolioPedido->Text;
                   $i = $this->sRequisicion->getItemIndex();
                   $FolioReq = $this->sRequisicion->Items[$i];
                   $dFecha = $this->dIdFecha->Text;
                   $dF_Entraga = $this->dtaF_Entrega->Text;

                   //Se saca el indice del proveedor para poner solo el id..
                   $i = $this->sProveedor->getItemIndex();
                   $Proveedor = $this->sProveedor->Items[$i];
                   $sqlRazon = "select * from proveedores where sRazon='$Proveedor'";
                   $rs = mysql_query($sqlRazon);
                   if($row = mysql_fetch_array($rs))
                   {
                      $IdProvee = $row['sIdProveedor'];
                   }
                   $i = $this->sNumeroOrden->getItemIndex();
                   $sNumeroOrden = $this->sNumeroOrden->Items[$i];
                   $sReferencia = $this->sReferencia->Text;
                   //$Elaboro = $this->txtElaboro->Text;
                   //$Reviso1 = $this->txtReviso1->Text;
                   //$Reviso2 = $this->txtReviso2->Text;
                   //$Autoriza = $this->txtAutorizo->Text;
                   $LAB = $this->txtLAB->Text;
                   $MedioTrans = $this->txtMTransporte->Text;
                   $Credito = $this->txtCredito->Text;
                   $FormaPag = $this->txtFormaPag->Text;
                   $Factura = $this->txtFactura->Text;
                   $Costo = $this->txtCosto->Text;
                   $Calidad = $this->txtCalidad->Text;
                   $TiempoEn = $this->TiempoEntrega->Text;
                   if ($this->chkProveedor->Checked == true)
                   {   $ProvUnic = "Si";
                   }else
                       { $ProvUnic = "No";
                       }
                   $Moneda = $this->txtMoneda->Text;
                   $Revision = $this->txtRevision->Text;
                   $mComentarios = str_replace("'","",$this->mComentarios->Text);
                   if ($this->chkStatus->Checked == true)
                   {   $Status = "AUTORIZADO";
                   }else
                       { $Status = "PENDIENTE";
                       }
                   $Hora = $this->hdfHoraActual->Value;
                   $FechaActual = $this->hdfFechaActual->Value;
                   $Periodo = $this->TxtPeriodoPago->Text;
                   $TotalPagos = $this->TxtTotalPagos->Text;
                   $Abono = $this->TxtAnticipo->Text;
                   $Intereses = $this->TxtInteres->Text;
                   $error=0;
                   if ($this->hdfOpcion->Value=="Agregar")
                   {  //Se insertan los datos en la tabla anexo_pedidos..
                      $sql=" INSERT INTO
                                     anexo_pedidos

                                     ( sContrato, iFolioPedido,iFolioRequisicion,
                                       sIdProveedor, sNumeroOrden, dIdFecha,
                                       dFechaEntrega, sReferencia, sElaboro,
                                       sReviso1, sReviso2, sAutorizo,
                                       sLab, sMedioTransporte, sCredito,
                                       sFormaPago, sFactura, sCosto,
                                       sCalidad, sTiempoentrega, lUnicoProveedor,
                                       sMoneda, sRevision, mComentarios,
                                       sStatus, sPeriodoPago, dTotalPagos,
                                       dAbono, dIntereses,sIdUsuarioCreador,
                                       sIdUsuarioAutoriza,sIdUsuarioRevisaAdmin,sIdUsuarioRevisaOper )

                              VALUES ( '$sContrato', '$iFolio', '$FolioReq',
                                       '$IdProvee', '$sNumeroOrden', '$dFecha',
                                       '$dF_Entraga', '$sReferencia', '$Elaboro',
                                       '$Reviso1', '$Reviso2', '$Autoriza',
                                       '$LAB', '$MedioTrans', '$Credito',
                                       '$FormaPag', '$Factura', '$Costo',
                                       '$Calidad', '$TiempoEn', '$ProvUnic',
                                       '$Moneda', '$Revision', '$mComentarios',
                                       '$Status', '$Periodo', '$TotalPagos',
                                       '$Abono', '$Intereses','$sUsuario','','','' )";
                       mysql_query($sql);
                       if (mysql_error())
                          $error=1;
                       echo mysql_error();
                       //Actualizacion del kardex
                       $sql=" Insert Into
                                     kardex_sistema

                                     ( sContrato, sIdUsuario, dIdFecha,
                                       sHora, sDescripcion, lOrigen )

                              Values ( '$sContrato', '$sUsuario', '$FechaActual',
                                       '$Hora', 'Registro de Pedido [ $iFolio ] Registrado el [ $FechaActual ] Usuario [ $sUsuario ]' , 'Requisiciones y Compras' )";
                       mysql_query($sql);
                       if (mysql_error())
                           $error=1;
                        echo mysql_error();
                   }

                   if ($this->hdfOpcion->Value=="Modificar")
                   {   //Modificacion de loa datos...
                       $sql= "UPDATE
                                  anexo_pedidos
                              SET iFolioRequisicion ='$FolioReq',
                                  sIdProveedor = '$IdProvee', dIdFecha = '$dFecha',
                                  dFechaEntrega = '$dF_Entraga', sNumeroOrden = '$sNumeroOrden',
                                  sReferencia = '$sReferencia',
                                  sElaboro = '$Elaboro',  sReviso1 = '$Reviso1',
                                  sReviso2 = '$Reviso2', sAutorizo = '$Autoriza',
                                  sLab = '$LAB', sMedioTransporte = '$MedioTrans',
                                  sCredito = '$Credito', sFormaPago = '$FormaPag',
                                  sFactura = '$Factura', sCosto = '$Costo',
                                  sCalidad = '$Calidad', sTiempoentrega = '$TiempoEn',
                                  lUnicoProveedor = '$ProvUnic', sMoneda = '$Moneda',
                                  sRevision = '$Revision', mComentarios = '$mComentarios',
                                  sStatus ='$Status', sPeriodoPago = '$Periodo',
                                  dTotalPagos = '$TotalPagos', dAbono = '$Abono', dIntereses = '$Intereses'
                              WHERE
                                  sContrato = '$sContrato'
                                  And iFolioPedido = '$iFolio' ";
                       mysql_query($sql);
                       if (mysql_error())
                           $error=1;

                        //Actualizacion del kardex

                      $sql= "Insert Into
                                  kardex_sistema

                                  ( sContrato, sIdUsuario, dIdFecha,
                                    sHora, sDescripcion, lOrigen )

                            Values( '$sContrato', '$sUsuario', '$FechaActual',
                                    '$Hora', 'Modificacion de Pedido [ $iFolio ] Registrado el [ $FechaActual ] Usuario [ $sUsuario ]' , 'Requisiciones y Compras' )";
                      mysql_query($sql);
                   }
                   if ($error==1)
                   {
                          ?>
                          <script>
                             alert(" <?php echo "Ocurrio un Error al Actualizar los Datos: ".mysql_error() ?>");
                          </script>
                          <?php
                   }
                   $this->LimpiaObjetos();
               }

               function dbgPedidosJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                  dbgPedidos.getSelectionModel().iterateSelection
                  (    function(index)
                       {
                           //obtenemos los datos del grid Requisiciones
                           var Tabla = dbgPedidos.getTableModel();
                           var sFolioPedido = Tabla.getValue(0, index);
                           var dIdFecha = Tabla.getValue(1, index);
                           var dFechaEntrega = Tabla.getValue(2, index);
                           var NumeroOrden = Tabla.getValue(3, index);
                           var Proveedor = Tabla.getValue(4, index);
                           var sFolioRequisicion = Tabla.getValue(5, index);
                           var Referencia = Tabla.getValue(6, index);
                           //var sElaboro = Tabla.getValue(7, index);
                           //var sReviso1 = Tabla.getValue(8, index);
                           //var sReviso2 = Tabla.getValue(9, index);
                           //var sAutorizo = Tabla.getValue(10, index);
                           var sLAB = Tabla.getValue(11, index);
                           var sMedioT = Tabla.getValue(12, index);
                           var sCredito = Tabla.getValue(13, index);
                           var sFormaPag = Tabla.getValue(14, index);
                           var sFactura = Tabla.getValue(15, index);
                           var sCosto = Tabla.getValue(16, index);
                           var sCalidad = Tabla.getValue(17, index);
                           var sTiempoEnt = Tabla.getValue(18, index);
                           var sUnicoProv = Tabla.getValue(19, index);
                           var sMoneda = Tabla.getValue(20, index);
                           var sRevision = Tabla.getValue(21, index);
                           var Comentarios = Tabla.getValue(22, index);
                           var Status = Tabla.getValue(24, index);
                           var sPeriodoPag = Tabla.getValue(25, index);
                           var dTotalPagos = Tabla.getValue(26, index);
                           var dAbono = Tabla.getValue(27, index);
                           var dInteres = Tabla.getValue(28, index);

                            //limpiar grid
                           var _rowData = [];
                           _rowData.push(['','','','','','','','']);
                           var _oData = rowData;
                           dbgPartidas.getTableModel().originalData=_oData;
                           dbgPartidas.getTableModel().setData(_rowData);

                           document.getElementById("iFolioPedido").value = sFolioPedido;
                           document.getElementById("sRequisicion").value = sFolioRequisicion;
                           document.getElementById("f-calendar-field-1").value = dIdFecha;
                           document.getElementById("f-calendar-field-2").value = dFechaEntrega;
                           document.getElementById("sNumeroOrden").value = NumeroOrden;
                           document.getElementById("sProveedor").value = Proveedor;
                           document.getElementById("sReferencia").value = Referencia;
                           document.getElementById("mComentarios").value = Comentarios;
                           document.getElementById("txtFactura").value = sFactura;
                           document.getElementById("txtFormaPag").value = sFormaPag;
                           document.getElementById("TiempoEntrega").value = sTiempoEnt;
                           document.getElementById("txtMoneda").value = sMoneda;
                           document.getElementById("txtCredito").value = sCredito;
                           if (Status=="PENDIENTE")
                           {  document.getElementById("chkStatus").checked = false;
                           } else
                                {  document.getElementById("chkStatus").checked = true;
                                }
                           document.getElementById("txtMTransporte").value = sMedioT;
                           document.getElementById("txtCosto").value = sCosto;
                           document.getElementById("txtCalidad").value = sCalidad;
                           document.getElementById("txtRevision").value = sRevision;
                           document.getElementById("txtLAB").value = sLAB;
                           //document.getElementById("txtElaboro").value = sElaboro;
                           //document.getElementById("txtReviso1").value = sReviso1;
                           //document.getElementById("txtReviso2").value = sReviso2;
                           //document.getElementById("txtAutorizo").value = sAutorizo;
                           document.getElementById("hdfFolioActual").value = sFolioPedido;
                           if (sUnicoProv=="Si")
                           {  document.getElementById("chkProveedor").checked = true;
                           } else
                                {  document.getElementById("chkProveedor").checked = false;
                                }
                           document.getElementById("TxtPeriodoPago").value = sPeriodoPag;
                           document.getElementById("TxtTotalPagos").value = dTotalPagos;
                           document.getElementById("TxtInteres").value = dInteres;

                           document.getElementById("hdlStatus").value = Status;
                           document.getElementById("TxtAnticipo").value = dAbono;

                           MuestraDatos(sFolioPedido);

                           if (document.getElementById("sReferencia").disabled==false)
                              controlesRequisiciones(false);
                           return false;
                       }
                  );
               <?php
               }

               function cmdShowPartidasJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                 document.getElementById("Panel2_outer").style.display='block';
                 document.getElementById("Panel1_outer").style.display='none';
                 document.getElementById("cmdShowRequisicion").disabled=false;
                 document.getElementById("cmdShowPartidas").disabled=true;
                 controlesRequisiciones( false );
                 controlAnexoPartidas( false );
                 return false;
               <?php
               }

               function cmdShowRequisicionJSClick($sender, $params)
               {
               ?>
                  //Add your javascript code here
                  document.getElementById("Panel1_outer").style.display='block';
                  document.getElementById("Panel2_outer").style.display='none';
                  document.getElementById("cmdShowRequisicion").disabled=true;
                  document.getElementById("cmdShowPartidas").disabled=false;
                  document.getElementById("hdfIniciaPartidas").value='no';
                  document.getElementById("Panel5_outer").style.display = "none";
                  controlAnexoPartidas( false );
                  return false;
               <?php
               }

               function cmdCancelRequisicionJSClick($sender, $params)
               {
               ?>
               //Add your javascript code here
                 controlesRequisiciones( false );
                 document.getElementById("txtFormaPag").value = "";
                 document.getElementById("TiempoEntrega").value = "";
                 document.getElementById("txtMoneda").value = "";
                 document.getElementById("txtCosto").value = "";
                 document.getElementById("txtRevision").value = "";
                 return false;
               <?php

               }

               function cmdAcceptRequisicionJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                 if (document.getElementById("sRequisicion").value == ""){
                     alert("Por favor, seleccione una requisicion !!");
                     return false;
                 }
                 else{
                   //Funcion que valida las fechas antes de guardarlas y las invierte..
                   var Fecha="f-calendar-field-1";
                   ComponerFecha(Fecha);
                   var Fecha="f-calendar-field-2";
                   ComponerFecha(Fecha);
                   var fechaActual = new Date();
                   var diaActual  = fechaActual.getDate();
                   var mesActual  = fechaActual.getMonth()+1;
                   var anioActual = fechaActual.getFullYear();
                   var LaFecha = anioActual+"-"+mesActual+"-"+diaActual;
                   document.getElementById("hdfFechaActual").value = LaFecha;
                   var Hora = new Date();
                   var H  = Hora.getHours() ;
                   var M  = Hora.getMinutes();
                   var S = Hora.getSeconds() ;
                   var Hora=H+":"+M+":"+S;
                   document.getElementById("hdfHoraActual").value=Hora;
                   document.getElementById("hdfMultisesion").value="uno";

                   var sRef = document.getElementById("sReferencia").value;
                   if (sRef=="")
                      document.getElementById("sReferencia").value = "SIN REF.";

                   return true;
                 }

               <?php

               }

               function cmdDeleteRequisicionJSClick($sender, $params)
               {
               ?>
               //Add your javascript code here
                  if(document.getElementById("hdlStatus").value!="Pendiente"){
                     alert("no se puede modificar, no esta en estatus de pendiente !!");
                     return false;
                  }else{
                     ok=0;
                     resp=0;
                     controlesPaneles(true);
                     dbgPedidos.getSelectionModel().iterateSelection
                     (    function(index)
                          {
                              //obtenemos los datos del grid Requisiciones
                              var Tabla = dbgPedidos.getTableModel();
                              var sFolio = Tabla.getValue(0, index);
                              ok=1;
                                 if(!confirm("  Desea ELIMINAR LA ORDEN DE COMPRA Seleccionada ?, Se Eliminaran los insumos..."))
                              {   resp=1;
                              }
                              document.getElementById("iFolioPedido").disabled=false;
                              document.getElementById("hdfMultisesion").value="uno";
                          }
                     );
                     if (ok==0)
                     {  alert("  DEBE HACER CLICK SOBRE UNA ORDEN DE COMPRA  !!!");
                        return false;
                     }
                     if (resp==1)
                        return false;
                     else
                        return true;
                 }
               <?php
               }

               function cmdChangeRequisicionJSClick($sender, $params)
               {
               ?>
               //Add your javascript code here
                  if(document.getElementById("hdlStatus").value!="Pendiente"){
                     alert("no se puede modificar, no esta en estatus de pendiente !!");
                     return false;
                  }else{
                    if ( dbgPedidos.getFocusedRow()==0
                         && document.getElementById("iFolioPedido").value=="" )
                    {   alert("  HAGA CLICK SOBRE UNA ORDEN DE COMPRA !!! ");
                        return false;
                    }
                    //funciones para mostras y ocultar botones y paneles...
                    controlesRequisiciones( true );
                    controlesPaneles(true);
                    document.getElementById("iFolioPedido").focus();
                    document.getElementById("hdfOpcion").value="Modificar";

                    return false;
                  }
               <?php
               }

               function cmdAddRequisicionJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                 //funciones para mostras y ocultar botones y paneles...
                 var Folio = document.getElementById("iFolioPedido").value;
                 i=dbgPedidos.getFocusedRow();
                 if (Folio=="" && i>0)
                 {   Folio = dbgPedidos.getTableModel().getValue(0,i);
                      document.getElementById("iFolioPedido").value = Folio;
                 }

                 //focoCombo( true );
                 controlesPaneles(true);
                 controlesRequisiciones( true );
                 document.getElementById("iFolioPedido").focus();
                 var Folio=document.getElementById("hdfUltimoFolio").value;
                 Folio++;
                 document.getElementById("iFolioPedido").value=Folio;
                 document.getElementById("sReferencia").value="";
                 document.getElementById("mComentarios").value="";
                 document.getElementById("txtFactura").value="";
                 document.getElementById("txtFormaPag").value="CHEQUE";
                 document.getElementById("TiempoEntrega").value="INMEDIATA";
                 document.getElementById("txtMoneda").value="PESOS MEXICANOS";
                 document.getElementById("txtCredito").value="";
                 document.getElementById("txtMTransporte").value="";
                 document.getElementById("txtCosto").value="X";
                 document.getElementById("txtCalidad").value="";
                 document.getElementById("txtRevision").value="000";
                 document.getElementById("txtLAB").value="";
                 //document.getElementById("txtElaboro").value="";
                 //document.getElementById("txtReviso1").value="";
                 //document.getElementById("txtReviso2").value="";
                 //document.getElementById("txtAutorizo").value="";
                 document.getElementById("TxtPeriodoPago").value = "";
                 document.getElementById("TxtTotalPagos").value = "";
                 document.getElementById("TxtInteres").value = "";
                 document.getElementById("TxtAnticipo").value = "";
                 a= document.getElementById("HidNReq").value;
                 document.getElementById("sRequisicion").value = a;

                 //Funcion que escribe la Fecha actual..
                 var Fecha="f-calendar-field-1";
                 FechaActual(Fecha);
                 var Fecha="f-calendar-field-2";
                 FechaActual(Fecha);
                 document.getElementById("hdfOpcion").value="Agregar";

                 return false;

               <?php
               }

               function frmOrdenesCompraBeforeShow($sender, $params)
               {
                  global $sContrato;
                  global $_SESSION,$Usuario,$Clave,$Servidor;

                  $this->db->setConnected(false);
                  $this->db->setDatabaseName($_SESSION['database']);
                  $this->db->setUserName($Usuario);
                  $this->db->setUserPassword($Clave);
                  $this->db->setHost($Servidor);
                  $this->db->setConnected(true);
                    //Lllenar combo del numero de actividad
                    $sql="Select sNumeroActividad
                         from
                              recursosanexo
                         where
                              sContrato = '$sContrato'
                         order by sNumeroActividad";
                    $rs = mysql_query($sql);

                    while($row = mysql_fetch_array($rs))
                    {
                       $Ordenes[$row['sNumeroActividad']] = $row['sNumeroActividad'];
                    }
                  $this->cmbPart->setItems($Ordenes);

                  $this->qryPartidas->setActive(false);
                  $this->qryPartidas->setActive(true);

                  //Llenado del grid de los Pedidos....
                  $this->qryAnexo_pedidos->setActive(false);
                  $this->qryAnexo_pedidos->setFilter("sContrato='$sContrato'
                                                      order by iFolioPedido DESC");
                  $this->qryAnexo_pedidos->setActive(true);
                  $this->llenaCboNumeroOrden();

                  //Calculo del ultimo folio existente, en caso contrario comienza con 1
                   $sql=" select max(iFolioPedido) as Maximo
                          from
                                 anexo_pedidos
                          where
                                 sContrato='$sContrato'";
                   $rs = mysql_query($sql);
                   if($row = mysql_fetch_array($rs))
                   {
                       $this->hdfUltimoFolio->Value = $row['Maximo'];
                   }else
                       {
                         $this->hdfUltimoFolio->Value =1;
                       }
                  $this->qryActMostrar->setActive(false);
                  $this->qryActMostrar->setFilter("sContrato ='$sContrato'");
                  $this->qryActMostrar->setActive(true);

                  //Llenado del Grid General "oculto"
                  $this->qryGeneral->setActive(false);
                  $this->qryGeneral->setFilter("sContrato ='$sContrato'");
                  $this->qryGeneral->setActive(true);
                  $this->Panel5->setVisible("false");
                  if ($this->HidHayInsumo->Value==0)
                  {
                      $sql= "select max(iFolioRequisicion) as mayor
                             from
                                 anexo_requisicion
                             where sContrato = '$sContrato'";
                      $rs=mysql_query($sql);
                      $Maximo = 0;
                      while($row = mysql_fetch_array($rs))
                      {
                         $Maximo = $row['mayor'];
                      }

                     $this->MuestraInsumos("",$Maximo);
                     $cadena =$Maximo;
                     $this->HidNReq->Value= $cadena;
                     if ($Maximo!=0)
                         $this->sRequisicion->setItemIndex($Maximo);
                  }else
                        $cadena =$this->HidNReq->Value;
                  $this->Label8->Caption = "INSUMOS DE LA REQUISICION NO. $cadena";

               }

               function llenaCboNumeroOrden()
               {    global $sContrato;
                    //Lllenar combo del numero de orden
                    $sql="Select sNumeroOrden
                         from
                              ordenesdetrabajo
                         where
                              sContrato = '$sContrato'
                         order by sNumeroOrden";
                    $rs = mysql_query($sql);

                    $Ordenes["CONTRATO_$sContrato"] = "Contrato No. $sContrato";

                    while($row = mysql_fetch_array($rs))
                    {
                       $Ordenes[$row['sNumeroOrden']] = $row['sNumeroOrden'];
                    }
                    $this->sNumeroOrden->setItems($Ordenes);

                    //Tambien se llena el combo de los proveedores...
                    $sql="Select sRazon, sIdProveedor
                         from
                              proveedores ";
                    $rs = mysql_query($sql);

                    while($row = mysql_fetch_array($rs))
                    {
                       $Proveedor[$row['sIdProveedor']] = $row['sRazon'];
                    }
                    $this->sProveedor->setItems($Proveedor);

                    //llenar combo del folio de requisicion
                    $sql="Select iFolioRequisicion
                         from
                              anexo_requisicion
                         where
                              sContrato = '$sContrato'  and lStatus<>'Pendiente'
                         order by iFolioRequisicion";
                    $rs = mysql_query($sql);
                    $FolioReq[""]="";
                    while($row = mysql_fetch_array($rs))
                    {
                       $FolioReq[$row['iFolioRequisicion']] = $row['iFolioRequisicion'];
                    }
                    $this->sRequisicion->setItems($FolioReq);
               }

               function LimpiaObjetos()
               {
                   $this->hdfOpcion->Value = "";
                   $this->hdfOpcionPartida->Value = "";
                   $this->txtNumPartida->Text = "";
                   $this->txtCPT->Text = "";
                   $this->memoCometarios->Text = "";
                   $this->txtMedida->Text = "";
                   $this->txtCantidad->Text = "";
                   $this->iFolioPedido->Text="";
                   $this->sReferencia->Text="";
                   $this->txtElaboro->Text="";
                   $this->txtReviso1->Text="";
                   $this->txtReviso2->Text="";
                   $this->txtAutorizo->Text="";
                   $this->txtLAB->Text="";
                   $this->txtMTransporte->Text="";
                   $this->txtCredito->Text="";
                   $this->txtFormaPag->Text="";
                   $this->txtFactura->Text="";
                   $this->txtCosto->Text="";
                   $this->txtCalidad->Text="";
                   $this->TiempoEntrega->Text="";
                   $this->chkProveedor->Checked=true;
                   $this->txtMoneda->Text="";
                   $this->txtRevision->Text="";
                   $this->mComentarios->Text="";
                   $this->chkStatus->Checked=false;
               }


               function dumpJavascript(){
               echo 'function controlesRequisiciones( habilitar ){
                        if(habilitar){
                           accion = false;
                        }
                        else{
                             accion= true;
                        }
                        document.getElementById("iFolioPedido").disabled=accion;
                        document.getElementById("sRequisicion").disabled=accion;
                        document.getElementById("sNumeroOrden").disabled=accion;
                        document.getElementById("sProveedor").disabled=accion;
                        document.getElementById("sReferencia").disabled=accion;
                        document.getElementById("mComentarios").disabled=accion;
                        document.getElementById("txtFactura").disabled=accion;
                        document.getElementById("txtFormaPag").disabled=accion;
                        document.getElementById("TiempoEntrega").disabled=accion;
                        document.getElementById("txtMoneda").disabled=accion;
                        document.getElementById("txtCredito").disabled=accion;
                        document.getElementById("chkProveedor").disabled=accion;
                        document.getElementById("txtMTransporte").disabled=accion;
                        document.getElementById("txtCosto").disabled=accion;
                        document.getElementById("txtCalidad").disabled=accion;
                        document.getElementById("txtRevision").disabled=accion;
                        document.getElementById("txtLAB").disabled=accion;
                        //document.getElementById("txtElaboro").disabled=accion;
                        //document.getElementById("txtReviso1").disabled=accion;
                        //document.getElementById("txtReviso2").disabled=accion;
                        //document.getElementById("txtAutorizo").disabled=accion;
                        document.getElementById("chkStatus").disabled=accion;
                        document.getElementById("TxtPeriodoPago").disabled=accion;
                        document.getElementById("TxtTotalPagos").disabled=accion;
                        document.getElementById("TxtInteres").disabled=accion;
                        document.getElementById("TxtAnticipo").disabled=accion;

                        document.getElementById("cmdAddRequisicion").disabled=habilitar;
                        document.getElementById("cmdChangeRequisicion").disabled=habilitar;
                        document.getElementById("cmdDeleteRequisicion").disabled=habilitar;
                        document.getElementById("cmdAcceptRequisicion").disabled=accion;
                        document.getElementById("cmdCancelRequisicion").disabled=accion;
                        document.getElementById("cmdPrintRequisicion").disabled=habilitar;

                        return false;
                     }';

                     echo 'function controlesPaneles(cual){
                          if (cual)
                          {   habilitar1 = "block";
                              habilitar2 = "none";
                              accion1 = false;
                              accion2 = true;
                          }else
                              { habilitar1 = "none";
                                habilitar2 = "block";
                                accion1 = true;
                                accion2 = false;
                              }
                          document.getElementById("Panel1_outer").style.display = habilitar1;
                          document.getElementById("Panel2_outer").style.display = habilitar2;
                          document.getElementById("cmdShowRequisicion").disabled = accion2;
                          document.getElementById("cmdShowPartidas").disabled = accion1;
                          return false;
                     }';

                     echo 'function FechaActual(ObjetoFecha){
                           var fechaActual = new Date();
                           var diaActual  = fechaActual.getDate();
                           var mesActual  = fechaActual.getMonth()+1;
                           var anioActual = fechaActual.getFullYear();
                           if (diaActual<10)
                              diaActual= "0"+diaActual;
                           if (mesActual<10)
                              mesActual= "0"+mesActual;
                           var LaFecha=diaActual+"/"+mesActual+"/"+anioActual;
                           document.getElementById(ObjetoFecha).value=LaFecha;
                           return false;
                     }';

                     echo 'function ComponerFecha(ObjetoFecha)
                     {     FechaFI=document.getElementById(ObjetoFecha).value;
                           var SeparaFI= FechaFI.split("/");
                           var diaFI=SeparaFI[0];
                           var mesFI=SeparaFI[1];
                           var ErrorFecha=0;
                           if (mesFI>12 || diaFI>31)
                               ErrorFecha=1;
                           if (ErrorFecha==1)
                           {  alert("La FECHA ESCRITA Esta Fuera de los LIMITES!!!");
                              return false;
                           }
                           if (ErrorFecha==0)
                           {
                              //Invertir la fecha para ser guardada por año -mes- dia
                              var auxFI=SeparaFI[2];
                              SeparaFI[2]=SeparaFI[0];
                              SeparaFI[0]=auxFI;
                              var JuntaFI=SeparaFI[0]+"-"+SeparaFI[1]+"-"+SeparaFI[2];
                              document.getElementById(ObjetoFecha).value = JuntaFI;
                           }
                           return false;
                      }';

                      echo 'function controlAnexoPartidas( habilitar )
                      {    if(habilitar){
                              accion = false;
                           }
                           else{
                              accion= true;
                           }

                           document.getElementById("txtNumPartida").disabled = accion;
                           document.getElementById("txtCPT").disabled = accion;
                           document.getElementById("memoCometarios").disabled = accion;
                           document.getElementById("txtCantidad").disabled = accion;
                           document.getElementById("txtMedida").disabled = accion;
                           document.getElementById("txtNuevoCosto").disabled = accion;
                           document.getElementById("CmdMostrar").disabled = accion;

                           document.getElementById("cmdAddPartida").disabled=habilitar;
                           document.getElementById("cmdEditPartida").disabled=habilitar;
                           document.getElementById("cmdEliminaPartida").disabled=habilitar;
                           document.getElementById("cmdAceptaPartida").disabled=accion;
                           document.getElementById("cmdCancelaPartida").disabled=accion;
                           return false;
                      }';

                      echo 'function BuscaActividad()
                      {
                           var totalFilas = dbgActMostrar.getTableModel().getRowCount();
                           var partida = document.getElementById("txtNumPartida").value;
                           for (i=0;i<totalFilas;i++)
                           {
                               actividad= dbgActMostrar.getTableModel().getValue(0,i);
                               if (actividad==partida)
                               {
                                  var sDescripcion = dbgActMostrar.getTableModel().getValue(1,i);
                                  var sCantidad = dbgActMostrar.getTableModel().getValue(2,i);
                                  var sMedida = dbgActMostrar.getTableModel().getValue(3,i);
                                  document.getElementById("memoCometarios").value = sDescripcion;
                                  document.getElementById("txtMedida").value = sMedida;
                                  document.getElementById("txtUnidad").value = sMedida;
                                  document.getElementById("txtCantidadAnexo").value = sCantidad;
                                  document.getElementById("txtCantidad").value = 0;
                              }
                          }
                          if (document.getElementById("txtNumPartida").value=="")
                          {
                              document.getElementById("memoCometarios").value = "";
                              document.getElementById("txtMedida").value = "";
                              document.getElementById("txtUnidad").value = "";
                              document.getElementById("txtCantidadAnexo").value = "";
                          }
                          return false;
                      }';

                      echo 'function ResaltarBotones()
                      {
                          document.getElementById("iFolioPedido").style.backgroundColor = "";
                          document.getElementById("sRequisicion").style.backgroundColor = "";
                          document.getElementById("sNumeroOrden").style.backgroundColor = "";
                          document.getElementById("sReferencia").style.backgroundColor = "";
                          document.getElementById("sProveedor").style.backgroundColor = "";
                          document.getElementById("mComentarios").style.backgroundColor = "";
                          document.getElementById("txtFactura").style.backgroundColor = "";
                          document.getElementById("txtFormaPag").style.backgroundColor = "";
                          document.getElementById("TiempoEntrega").style.backgroundColor = "";
                          document.getElementById("txtMoneda").style.backgroundColor = "";
                          document.getElementById("txtCredito").style.backgroundColor = "";
                          document.getElementById("chkProveedor").style.backgroundColor = "";
                          document.getElementById("txtMTransporte").style.backgroundColor = "";
                          document.getElementById("txtCosto").style.backgroundColor = "";
                          document.getElementById("txtCalidad").style.backgroundColor = "";
                          document.getElementById("txtRevision").style.backgroundColor = "";
                          document.getElementById("txtLAB").style.backgroundColor = "";
                          //document.getElementById("txtElaboro").style.backgroundColor = "";
                          //document.getElementById("txtReviso1").style.backgroundColor = "";
                          //document.getElementById("txtReviso2").style.backgroundColor = "";
                          //document.getElementById("txtAutorizo").style.backgroundColor = "";
                          document.getElementById("chkStatus").style.backgroundColor = "";

                          document.getElementById("TxtPeriodoPago").style.backgroundColor = "";
                          document.getElementById("TxtTotalPagos").style.backgroundColor = "";
                          document.getElementById("TxtInteres").style.backgroundColor = "";
                          document.getElementById("TxtAnticipo").style.backgroundColor = "";

                          document.getElementById("cmdAddRequisicion").style.backgroundColor = "";
                          document.getElementById("cmdChangeRequisicion").style.backgroundColor = "";
                          document.getElementById("cmdDeleteRequisicion").style.backgroundColor = "";
                          document.getElementById("cmdAcceptRequisicion").style.backgroundColor = "";
                          document.getElementById("cmdCancelRequisicion").style.backgroundColor = "";
                          document.getElementById("cmdPrintRequisicion").style.backgroundColor = "";

                          document.getElementById("txtNumPartida").style.backgroundColor = "";
                          document.getElementById("txtCPT").style.backgroundColor = "";
                          document.getElementById("memoCometarios").style.backgroundColor = "";
                          document.getElementById("txtCantidad").style.backgroundColor = "";
                          document.getElementById("txtMedida").style.backgroundColor = "";
                          document.getElementById("txtMaterial").style.backgroundColor = "";
                          document.getElementById("txtUnidad").style.backgroundColor = "";
                          document.getElementById("txtCantidadAnexo").style.backgroundColor = "";
                          document.getElementById("txtNuevoCosto").style.backgroundColor = "";
                          document.getElementById("CmdMostrar").style.backgroundColor = "";

                          document.getElementById("cmdAddPartida").style.backgroundColor = "";
                          document.getElementById("cmdEditPartida").style.backgroundColor = "";
                          document.getElementById("cmdEliminaPartida").style.backgroundColor = "";
                          document.getElementById("cmdAceptaPartida").style.backgroundColor = "";
                          document.getElementById("cmdCancelaPartida").style.backgroundColor = "";

                      }';

                      echo 'function MuestraDatos(Folio)
                      {
                           var totalFilas = dbgGeneral.getTableModel().getRowCount();
                           var rowData = [];
                           var datos=0;
                           //Se van a asignar uno a uno los valores que sean igual al folio de la Requisicion
                           for (i=0;i<totalFilas;i++)
                           {
                               GenFolio= dbgGeneral.getTableModel().getValue(0,i);
                               if (GenFolio==Folio)
                               {
                                 //obtencion de valores del dbgrid General el cual esta oculto....
                                 var sPartida = dbgGeneral.getTableModel().getValue(2,i);
                                 var sItem = dbgGeneral.getTableModel().getValue(1,i);
                                 var sMedida = dbgGeneral.getTableModel().getValue(4,i);
                                 var sDescripcion = dbgGeneral.getTableModel().getValue(3,i);
                                 var sCantidad = dbgGeneral.getTableModel().getValue(5,i);
                                 var sMonto = dbgGeneral.getTableModel().getValue(6,i);

                                 var Filas = dbgActMostrar.getTableModel().getRowCount();
                                 for (x=0;x<Filas;x++)
                                 {
                                       Actividad = dbgActMostrar.getTableModel().getValue(0,x);
                                       if (Actividad==sPartida)
                                       {
                                           var sCantidadAnex = dbgActMostrar.getTableModel().getValue(2,x);
                                           var sNvoMonto = dbgActMostrar.getTableModel().getValue(5,x);
                                           var sUnidad = dbgActMostrar.getTableModel().getValue(3,x);
                                       }
                                 }
                                 ConvierteCadNum(sCantidad);
                                 sCantidad = document.getElementById("HidStrNum").value;
                                 ConvierteCadNum(sMonto);
                                 sMonto = document.getElementById("HidStrNum").value;
                                 ConvierteCadNum(sNvoMonto);
                                 sNvoMonto = document.getElementById("HidStrNum").value;

                                 if (sNvoMonto==0)
                                 {    var sTotal = sCantidad*sMonto;
                                      sNvoMonto = sMonto;
                                 }else
                                     {
                                        var sTotal = sCantidad*sNvoMonto;
                                     }

                                 if (datos==0)
                                 {
                                     document.getElementById("txtNumPartida").value = sPartida;
                                     document.getElementById("txtCPT").value = sItem;
                                     document.getElementById("memoCometarios").value = sDescripcion;
                                     document.getElementById("txtCantidad").value = sCantidad;
                                     document.getElementById("txtMedida").value = sMedida;
                                     document.getElementById("txtUnidad").value = sUnidad;
                                     document.getElementById("txtMaterial").value = sMonto;
                                     document.getElementById("txtCantidadAnexo").value = sCantidadAnex;
                                     document.getElementById("txtNuevoCosto").value = sNvoMonto;
                                     datos=1;
                                 }

                                 //Colocacion de valores al dbgrid Partidas
                                  rowData.push([sPartida,sItem,sMedida,sDescripcion,sCantidad,sCantidadAnex,sMonto,sTotal,sNvoMonto]);
                                  var oData = rowData;
                                  dbgPartidas.getTableModel().originalData=oData;
                                  dbgPartidas.getTableModel().setData(rowData);
                               }
                           }
                           return false;
                       }';

                       echo 'function MuestraCatalogo(letras)
                       {
                           var total = letras.length;
                           var totalFilas = dbgActMostrar.getTableModel().getRowCount();
                           var _rowData = [];
                           _rowData.push(["","","","","",""]);
                           var _oData = rowData;
                           dbgCatalogo.getTableModel().originalData=_oData;
                           dbgCatalogo.getTableModel().setData(_rowData);

                           var rowData = [];
                           for (i=0;i<totalFilas;i++)
                           {
                               palabra= dbgActMostrar.getTableModel().getValue(1,i);
                               var separa = palabra.split("");
                               var frase="";
                               var aux="";
                               var final="";
                               for (x=0;x<total;x++)
                               {   aux = final;
                                   frase = separa[x];
                                   final = aux + frase;
                               }
                               if (final==letras)
                               {
                                  var sInsumo = dbgActMostrar.getTableModel().getValue(0,i);
                                  var sDescripcion = dbgActMostrar.getTableModel().getValue(1,i);
                                  var sCantidad = dbgActMostrar.getTableModel().getValue(2,i);
                                  var sMedida = dbgActMostrar.getTableModel().getValue(3,i);
                                  var sCosto =  dbgActMostrar.getTableModel().getValue(4,i);
                                  var NvoCosto =  dbgActMostrar.getTableModel().getValue(5,i);
                                  rowData.push([sInsumo,sDescripcion,sCantidad,sMedida,sCosto,NvoCosto]);
                                  var oData = rowData;
                                  dbgCatalogo.getTableModel().originalData=oData;
                                  dbgCatalogo.getTableModel().setData(rowData);
                               }

                           }
                           return false;
                       }';

                       echo 'function ConvierteCadNum(Numero)
                       {
                              Sum_CantA ="";
                              uno = Numero.split(",");
                              Tam = uno.length;
                              if (Tam==0)
                                  Sum_CantA=Numero;
                              for (a=0;a<Tam;a++)
                              {   aux=Sum_CantA;
                                  cadena = uno[a];
                                 Sum_CantA=aux+cadena;
                              }
                              document.getElementById("HidStrNum").value = Sum_CantA;
                              return false;
                       }';

                       echo 'function focoCombo( habilitar ){
                            if(habilitar){
                              accion = false;
                            }
                             else{
                                   accion= true;
                            }
                            document.getElementById("sRequisicion").disabled=accion;
                     }';
               }

               function txtNumPartidaJSChange($sender, $params)
               {
               ?>
                 //Add your javascript code here
                 document.getElementById("txtCPT").value = "";
                 document.getElementById("txtCantidad").value = "0";
                 //Funcion que escribe la Fecha actual..
                   var Fecha="f-calendar-field-2";
                   FechaActual(Fecha);
                 return false;
               <?php
               }

               function cmdPrintRequisicionJSClick($sender, $params)
               {
                  global $sContrato;
               ?>
                  ruta = "../reporte.php";
                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                  ruta = ruta + "&iFolioRequisicion=" +  document.getElementById("sRequisicion").value;
                  ruta = ruta + "&iFolioPedido=" +document.getElementById("iFolioPedido").value
                  ruta = ruta + "&nombreReporte=ordendecompra";
                  ruta = ruta + "&reportesPath=ordenDeCompra";
                  var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                  return false;
               <?php
               }

               function txtNumPartidaJSFocus($sender, $params)
               {
               ?>
               //Add your javascript code here
                  //   var _rowData = [];
                  //   _rowData.push(['','','','','']);
                  //   var _oData = rowData;
                  //   dbgCatalogo.getTableModel().originalData=_oData;
                  //   dbgCatalogo.getTableModel().setData(_rowData);
                  //   return false;
               <?php
               }

               function txtMedidaJSFocus($sender, $params)
               {
               ?>
               //Add your javascript code here
                 BuscaActividad();
                 return false;
               <?php
               }

               function txtCantidadJSFocus($sender, $params)
               {
               ?>
               //Add your javascript code here

               <?php
               }

               function memoCometariosJSFocus($sender, $params)
               {
               ?>
               //Add your javascript code here

               <?php
               }

               function txtCPTJSFocus($sender, $params)
               {
               ?>
               //Add your javascript code here

               <?php
               }

               function txtMedidaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMedidaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtCantidadJSKeyPress($sender, $params)
               {
               ?>
               //Add your javascript code here
                 if(event.keyCode==9)
                  {
                     document.getElementById("txtMedida").focus();
                     return false;
                  }
               <?php
               }

               function txtCantidadJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function memoCometariosJSKeyPress($sender, $params)
               {
               ?>
               //Add your javascript code here
                 if(event.keyCode==9)
                  {
                     document.getElementById("txtCantidad").focus();
                     return false;
                  }
               <?php
               }

               function memoCometariosJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtCPTJSKeyPress($sender, $params)
               {
               ?>
               //Add your javascript code here

               <?php
               }

               function txtCPTJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtNumPartidaJSKeyPress($sender, $params)
               {
               ?>
                 //Add your javascript code here
                  if(event.keyCode==9)
                  {
                     document.getElementById("mComentarios").focus();
                     return false;
                  }
               <?php
               }


               function txtNumPartidaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function mComentariosJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function mComentariosJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function mComentariosJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sReferenciaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
                 if(event.keyCode==9)
                 {  document.getElementById("sProveedor").focus();
                    return false;
                 }
               <?php

               }

               function sReferenciaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sReferenciaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sNumeroOrdenJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
                 if(event.keyCode==9)
                 {  document.getElementById("sReferencia").focus();
                    return false;
                 }
               <?php

               }

               function sNumeroOrdenJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sNumeroOrdenJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iFolioPedidoJSKeyPress($sender, $params)
               {
               ?>
               //Add your javascript code here
               <?php
               }

               function iFolioPedidoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iFolioPedidoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }
               function sProveedorJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
                 if(event.keyCode==9)
                 {  document.getElementById("mComentarios").focus();
                    return false;
                 }
               <?php

               }

               function sProveedorJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sProveedorJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtLABJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtLABJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtLABJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtAutorizoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
                 if(event.keyCode==9)
                 {  document.getElementById("txtPrecios").focus();
                    return false;
                 }
               <?php

               }

               function txtAutorizoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtAutorizoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtReviso2JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
                 if(event.keyCode==9)
                 {  document.getElementById("txtAutorizo").focus();
                    return false;
                 }
               <?php

               }

               function txtReviso2JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtReviso2JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtElaboroJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
                 if(event.keyCode==9)
                 {  document.getElementById("txtReviso").focus();
                    return false;
                 }
               <?php

               }

               function txtElaboroJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtElaboroJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtRevisionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
                 if(event.keyCode==9)
                 {  document.getElementById("txtElaboro").focus();
                    return false;
                 }
               <?php

               }

               function txtRevisionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtRevisionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtReviso1JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtReviso1JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtReviso1JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtCalidadJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtCalidadJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtCalidadJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtCostoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtCostoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtCostoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMTransporteJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMTransporteJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMTransporteJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtCreditoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtCreditoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtCreditoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMonedaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMonedaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMonedaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TiempoEntregaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TiempoEntregaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TiempoEntregaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFormaPagJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFormaPagJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFormaPagJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFacturaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFacturaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFacturaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRequisicionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
                 if(event.keyCode==9)
                 {  document.getElementById("sNumeroOrden").focus();
                    return false;
                 }
                 return false;
               <?php

               }

               function sRequisicionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRequisicionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtNuevoCostoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtNuevoCostoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtNuevoCostoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtAnticipoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtAnticipoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtAnticipoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtInteresJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtInteresJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtInteresJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtTotalPagosJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtTotalPagosJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtTotalPagosJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtPeriodoPagoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtPeriodoPagoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtPeriodoPagoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

        }

        global $application;

        global $frmOrdenesCompra;

        //Creates the form
        $frmOrdenesCompra=new frmOrdenesCompra($application);

        //Read from resource file
        $frmOrdenesCompra->loadResource(__FILE__);

        //Shows the form
        $frmOrdenesCompra->show();

?>
<script>
   document.getElementById("Panel5_outer").style.display = "none";
   controlesRequisiciones( false );
   if (document.getElementById("hdfMultisesion").value=="uno")
   {    controlesPaneles(true);
   }else
       {  controlesPaneles(false);
          controlAnexoPartidas( false );
       }
   ResaltarBotones();
   var CualFolio = document.getElementById("hdfFolioActual").value;
   MuestraDatos(CualFolio);
   ResaltarBotones();
   var fecha="f-calendar-field-2";
   FechaActual(fecha);
   var fecha="f-calendar-field-1";
   FechaActual(fecha);
</script>
