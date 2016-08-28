<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require_once("mysql.inc.php");
        require_once("fnUtilerias.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        //$sContrato='428238909';
        $sUsuario=$_SESSION["ssUsuario"];
        $sIdConvenio =$sIdConvenioAct;
        //Class definition
        class frmRequisiciones extends Page
        {
               public $HidError = null;
               public $hflStatus = null;
               public $Memo1 = null;
               public $HidStrNum = null;
               public $txtRevision = null;
               public $Label25 = null;
               public $txtRecibe = null;
               public $txtVerifica = null;
               public $txtAutoriza = null;
               public $Label24 = null;
               public $Label23 = null;
               public $Label22 = null;
               public $txtSolicita = null;
               public $dtaSolicita = null;
               public $dtaRequerido = null;
               public $Label21 = null;
               public $Label20 = null;
               public $Label19 = null;
               public $txtCosto = null;
               public $Label18 = null;
               public $dtaCatalogo = null;
               public $qryCatalogo = null;
               public $dbgCatalogo = null;
               public $Label17 = null;
               public $Panel5 = null;
               public $hdfFolioActual = null;
               public $hdfMultisesion = null;
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
               public $dbgRequisisiones = null;
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
               public $dtaFecha = null;
               public $txtMedida = null;
               public $txtCantidad = null;
               public $memoCometarios = null;
               public $txtCPT = null;
               public $txtNumPartida = null;
               public $cmdShowPartidas = null;
               public $cmdShowRequisicion = null;
               public $Panel4 = null;
               public $Panel3 = null;
               public $dsAnexo_requisicion = null;
               public $qryAnexo_requisicion = null;
               public $db = null;
               public $Label15 = null;
               public $Label14 = null;
               public $Label10 = null;
               public $Label9 = null;
               public $Label11 = null;
               public $Label8 = null;
               public $Label7 = null;
               public $Panel2 = null;
               public $mComentarios = null;
               public $sReferencia = null;
               public $dIdFecha = null;
               public $sNumeroOrden = null;
               public $iFolioRequisicion = null;
               public $Label6 = null;
               public $Label5 = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Panel1 = null;

               function dbgCatalogoJSDblClick($sender, $params)
               {
               ?>
               //Add your javascript code here
                 i=dbgCatalogo.getFocusedRow();
                 Selecciona(i);
                 document.getElementById("Panel5_outer").style.display = "none";
                 return false;
               <?php
               }

               function txtNumPartidaJSKeyUp($sender, $params)
               {
               ?>
               //Add your javascript code here
                 if (event.keyCode == 27)
                 {   document.getElementById("Panel5_outer").style.display = "none";
                     return false;
                 }
                 if (event.keyCode>47 || event.keyCode == 8)
                 {   var texto = document.getElementById("txtNumPartida").value.toUpperCase();
                     MuestraCatalogo(texto);
                     document.getElementById("Panel5_outer").style.display = "block";
                     return false;
                 }
               <?php
               }

               function cmdAceptaPartidaClick($sender, $params)
               {
                   global $sContrato;
                   $Folio        = $this->iFolioRequisicion->Text;
                   $sActividad   = $this->txtNumPartida->Text;
                   $sItem        = $this->txtCPT->Text;
                   $sDescripcion = str_replace("'","",$this->memoCometarios->Text);
                   $sMedida      = $this->txtMedida->Text;
                   $sRequiere    = $this->dtaFecha->Text;
                   $sCantidad    = $this->txtCantidad->Text;
                   $sCosto       = $this->txtCosto->Text;
                   $i            = $this->sNumeroOrden->getItemIndex();
                   $sNumeroOrden = $this->sNumeroOrden->Items[$i];
                   $error=0;

                   if ($this->hdfOpcionPartida->Value=="Agregar")
                   {   // SE insertan los datos en la tabla anexo_requisicion..
                       $sql=" INSERT INTO
                                     anexo_prequisicion
                                   ( sContrato, iFolioRequisicion, sIdInsumo,
                                     iItem, mDescripcion, sMedida,
                                     dFechaRequerimiento, dCantidad, dCosto,
                                     sNumeroOrden, sNumeroActividad )
                              VALUES
                                   ( '$sContrato', '$Folio', '$sActividad',
                                     '$sItem', '$sDescripcion', '$sMedida',
                                     '$sRequiere' , '$sCantidad', '$sCosto',
                                     '$sNumeroOrden', '')";
                       mysql_query($sql);
                       if (mysql_error())
                         $error=1;

                       if ($error==1)
                       {
                         //Se busca el maximo item de la actividad repetida
                         $sql = "Select Max(iItem) as iItem
                               From anexo_prequisicion
                               Where sContrato = '$sContrato'
                                     And iFolioRequisicion = '$Folio'
                                     and sIdInsumo = '$sActividad'";
                         $rs = mysql_query($sql);
                         if($row = mysql_fetch_array($rs))
                         {
                            $Maximo = $row['iItem'];
                         }
                         $sItem = $Maximo+1;
                         // Se inseta un nuevo registro si se encuentra una partida igual,
                         // solo aqui va incrementando el item, el cual las identifica a cada una
                         $sql=" INSERT INTO
                                    anexo_prequisicion
                                    ( sContrato, iFolioRequisicion, sIdInsumo,
                                      iItem, mDescripcion, sMedida,
                                      dFechaRequerimiento, dCantidad, dCosto,
                                      sNumeroOrden, sNumeroActividad )
                                VALUES
                                    ( '$sContrato', '$Folio', '$sActividad',
                                      '$sItem', '$sDescripcion', '$sMedida',
                                      '$sRequiere' , '$sCantidad', '$sCosto',
                                      '$sNumeroOrden', '' )";
                         mysql_query($sql);
                           ?>
                           <script>
                              alert(" <?php echo "Se encontro una Coincidencia del Insumo en la Requisición Actual, por lo que el SISTEMA creara un Nuevo Registro !!!" ?>");
                           </script>
                           <?php

                       } else
                            {
                              //Insecion de datos en la tabla anexo_pedido... aqui no se repiten los datos..
                              /*$sql=" INSERT INTO
                                       anexo_ppedido
                                       ( sContrato, iFolioPedido, sIdInsumo,
                                         iItem, mDescripcion, sMedida,
                                         dCantidad )
                                   VALUES
                                       ( '$sContrato', '$Folio', '$sActividad',
                                         '$sItem', '$sDescripcion', '$sMedida',
                                         '$sCantidad' )";
                               mysql_query($sql); */
                           }
                    }
                    if ($this->hdfOpcionPartida->Value=="Modificar")
                    {
                        $PartidaOld=$this->hdfPartidaOld->Value;
                        $ItemOld=$this->hdfItemOld->Value;
                       //Actualizacion de los datos en la tabla anexo_prequisicion...
                        $sql = " UPDATE anexo_prequisicion
                                SET sIdInsumo = '$sActividad', iItem = '$sItem',
                                    mDescripcion = '$sDescripcion', sMedida = '$sMedida',
                                    dFechaRequerimiento = '$sRequiere', dCantidad = '$sCantidad',
                                    dCosto = '$sCosto', sNumeroOrden = '$sNumeroOrden',
                                    sNumeroActividad = ''
                                WHERE sContrato = '$sContrato'
                                      And iFolioRequisicion = '$Folio'
                                      And sIdInsumo = '$PartidaOld'
                                      And iItem = '$ItemOld' ";
                       mysql_query($sql);
                       if (mysql_error())
                           $error=1;
                       if ($error==1)
                       {
                          ?>
                          <script>
                             alert(" <?php echo "Ocurrio un Error al Actualizar los Datos: ".mysql_error() ?>");
                          </script>
                          <?php
                       }
                    }
                    $this->LimpiaObjetos();
               }

               function cmdEliminaPartidaClick($sender, $params)
               {
                   global $sContrato;
                   $Folio = $this->iFolioRequisicion->Text;
                   $sActividad = $this->txtNumPartida->Text;
                   $sItem = $this->txtCPT->Text;
                   $error=0;
                   //Eliminacion del registro seleccionado en la tabla anexo_prequisicion
                   $sql = " Delete
                            from anexo_prequisicion
                            where sContrato = '$sContrato'
                            And iFolioRequisicion = '$Folio'
                            And sIdInsumo = '$sActividad'
                            And iItem = '$sItem'";
                   mysql_query($sql);
                   if (mysql_error())
                      $error=1;
                   //Eliminacion tambien del registro seleccionado en la tabla anexo_ppedido
                  /* $sql = " Delete
                            from anexo_ppedido
                            where sContrato = '$sContrato'
                            And iFolioPedido = '$Folio'
                            And sIdInsumo = '$sActividad'
                            And iItem = '$sItem'";
                   mysql_query($sql);
                   if (mysql_error())
                      $error=1; */

                   if ($error==1)
                   {
                     ?>
                     <script>
                       alert(" <?php echo "Ocurrio un error al Eliminar los Datos !!! ".mysql_error() ?>");
                     </script>
                     <?php
                   }
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
                             var sRequerido = Tabla.getValue(6, index);
                             var sMonto = Tabla.getValue(7, index);

                             document.getElementById("txtNumPartida").value = sPartida;
                             document.getElementById("txtCPT").value = sItem;
                             document.getElementById("memoCometarios").value = sDescripcion;
                             document.getElementById("txtCantidad").value = sCantidad;
                             document.getElementById("txtMedida").value = sMedida;
                             document.getElementById("f-calendar-field-4").value = sRequerido;
                             document.getElementById("txtCosto").value = sMonto;
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
                  var Folio = document.getElementById("iFolioRequisicion").value;
                  if (Folio=="")
                  {   alert ("  PRIMERO HAGA CLICK SOBRE LA REQUISICION !!!" );
                      return false;
                  } else
                        {  if (document.getElementById("hflStatus").value != "Pendiente")
                           {   alert("No se puede modificar, Requisicion Autorizada!");
                               resp = 1;
                           }else
                               {   dbgPartidas.getSelectionModel().iterateSelection
                                  (   function(index)
                                      {
                                        //obtenemos los datos del grid Requisiciones
                                        var Tabla = dbgPartidas.getTableModel();
                                        var sPartida = Tabla.getValue(0, index);
                                        var sItem = Tabla.getValue(1, index);
                                        ok=1;
                                        document.getElementById("hdfOpcionPartida").value="Eliminar";
                                        if(!confirm("  Desea ELIMINAR EL ELEMENTO Seleccionado ?"))
                                            resp=1;
                                        document.getElementById("iFolioRequisicion").disabled=false;
                                        document.getElementById("txtNumPartida").value = sPartida;
                                        document.getElementById("txtCPT").value = sItem;
                                        document.getElementById("txtNumPartida").disabled = false;
                                        document.getElementById("txtCPT").disabled = false;
                                        document.getElementById("hdfMultisesion").value="dos";
                                     }
                                  );
                                  if (ok==0)
                                  {  alert("  DEBE HACER CLICK SOBRE UN INSUMO !!!");
                                     return false;
                                  }
                                  if (resp==1)
                                  {
                                     document.getElementById("iFolioRequisicion").disabled=true;
                                     document.getElementById("txtNumPartida").disabled = true;
                                     document.getElementById("txtCPT").disabled = true;
                                  }
                            }
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
                  var Folio = document.getElementById("iFolioRequisicion").value;
                  if (Folio=="")
                  {   alert ("  HAGA CLICK SOBRE UNA REQUISICION !!!" );
                      return false;
                  } else
                        {  if (document.getElementById("hflStatus").value != "Pendiente")
                           {   alert("No se puede modificar, Requisicion Autorizada!");
                           }else
                               {  controlAnexoPartidas(true);
                                  document.getElementById("txtNumPartida").focus();
                                  document.getElementById("hdfOpcionPartida").value = "Modificar";
                               }
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
                   var sCosto = document.getElementById("txtCosto").value;
                   resp=0;
                   if (sPartida=="" || sComentario=="" || sMedida=="")
                   {   alert ("  DEBE LLENAR TODOS LOS CAMPOS !!!");
                       resp=1;
                   }
                   if (sItem=="")
                   {    document.getElementById("txtCPT").value="0";
                   }
                   if (sCantidad=="")
                   {    document.getElementById("txtMedida").value="0";
                   }
                   if (sCosto=="")
                   {    document.getElementById("txtMedida").value="0";
                   }
                   var Fecha="f-calendar-field-4";
                   ComponerFecha(Fecha);
                   document.getElementById("hdfIniciaPartidas").value = 'si';
                   document.getElementById("iFolioRequisicion").disabled = false;
                   document.getElementById("sNumeroOrden").disabled = false;
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
                  if (document.getElementById("hflStatus").value != "Pendiente")
                  {   alert("No se puede modificar, Requisicion Autorizada!");
                      return false;
                  }else
                      {
                        var Folio = document.getElementById("iFolioRequisicion").value;
                        if (Folio=="")
                        {   i=dbgRequisisiones.getFocusedRow();
                            Folio = dbgRequisisiones.getTableModel().getValue(0,i);
                            var sOrden = dbgRequisisiones.getTableModel().getValue(1,i);
                            document.getElementById("iFolioRequisicion").value = Folio;
                            document.getElementById("sNumeroOrden").value = sOrden;
                        }
                        controlAnexoPartidas(true);
                        document.getElementById("txtNumPartida").focus();
                        document.getElementById("txtNumPartida").value = "";
                        document.getElementById("txtCPT").value = "";
                        document.getElementById("memoCometarios").value = "";
                        document.getElementById("txtCantidad").value = "";
                        document.getElementById("txtMedida").value = "";

                        //Funcion que escribe la Fecha actual..
                        var Fecha="f-calendar-field-4";
                        FechaActual(Fecha);
                        document.getElementById("hdfOpcionPartida").value = "Agregar";
                        return false;
                     }
               <?php
               }


               //DE AQUI EN ADELANTE SE HACEN LAS OPERACIONES CON LAS REQUISICIONES....
               function cmdDeleteRequisicionClick($sender, $params)
               {
                   global $sContrato;
                   global $sUsuario;
                   $iFolio=$this->iFolioRequisicion->Text;
                   $dFecha=$this->dIdFecha->Text;
                   $Hora=$this->hdfHoraActual->Value;
                   $FechaActual=$this->hdfFechaActual->Value;
                   $error=0;

                   // Actualizacion del cardex del sistema..
                   $sql= " Insert Into kardex_sistema
                                  ( sContrato, sIdUsuario, dIdFecha,
                                    sHora, sDescripcion, lOrigen )
                           Values ( '$sContrato', '$sUsuario', '$FechaActual' ,
                                    '$Hora' , 'Eliminación de Requisición [ $iFolio ] Registrado el [ $FechaActual ] Usuario [ $sUsuario ]', 'Requisiciones y Compras' )";

                   //Eliminacions de la requisicion en la tabla prequisicion..
                   $sql= " Delete from
                                  anexo_prequisicion
                           where sContrato = '$sContrato'
                                 And iFolioRequisicion = '$iFolio'";
                   mysql_query($sql);
                   if (mysql_error()){
                      $error=1;
                   }

                   //Eliminacions de la requisicion en la tabla anexo_requisicion..
                   $sql= " Delete from
                                  anexo_requisicion
                           where sContrato = '$sContrato'
                           And iFolioRequisicion = '$iFolio'";
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
                   $iFolio       = $this->iFolioRequisicion->Text;
                   $i            = $this->sNumeroOrden->getItemIndex();
                   $sNumeroOrden = $this->sNumeroOrden->Items[$i];
                   $dFecha       = $this->dIdFecha->Text;
                   $dFecha_Sol   = $this->dtaSolicita->Text;
                   $dFecha_Req   = $this->dtaRequerido->Text;
                   $sReferencia  = $this->sReferencia->Text;
                   $mComentarios = str_replace("'","",$this->mComentarios->Text);
                   $Revision     = $this->txtRevision->Text;
                   //$Solicito = $this->txtSolicita->Text;
                   //$Autoriza = $this->txtAutoriza->Text;
                   //$Verifica = $this->txtVerifica->Text;
                   //$Recibe = $this->txtRecibe->Text;
                   $Hora=$this->hdfHoraActual->Value;
                   $FechaActual=$this->hdfFechaActual->Value;
                   $error=0;

                   if ($this->hdfOpcion->Value=="Agregar")
                   {  //Se insertan los datos en la tablarequsisciones..
                      $sql=" INSERT INTO
                                     anexo_requisicion

                                     ( sContrato, iFolioRequisicion, sNumeroOrden,
                                       dIdFecha, dFechaSolicitado, dFechaRequerido,
                                       sRevision, sSolicito, sAutorizo, sVerificacion,
                                       sRecibido,sReferencia, mComentarios,lStatus,sIdUsuarioCreador,
                                       sIdUsuarioAutoriza,sIdUsuarioVerifica,sIdUsuarioRecibio)

                              VALUES ( '$sContrato', '$iFolio', '$sNumeroOrden',
                                       '$dFecha', '$dFecha_Sol', '$dFecha_Req',
                                       '$Revision','$Solicito','$Autoriza','$Verifica',
                                       '$Recibe','$sReferencia', '$mComentarios','Pendiente','$sUsuario','','','')";
                       mysql_query($sql);

                       if (mysql_error()){

                          $error=1;
                       }

                        //Actualizacion del kardex
                       $sql=" Insert Into
                                     kardex_sistema

                                     ( sContrato, sIdUsuario, dIdFecha,
                                       sHora, sDescripcion, lOrigen)

                              Values ( '$sContrato', '$sUsuario', '$FechaActual',
                                       '$Hora', 'Registro de Requisición [ $iFolio ] Registrado el [ $FechaActual ] Usuario [ $sUsuario ]' , 'Requisiciones y Compras' )";
                       mysql_query($sql);

                       //Se insertan los datos en la tabla anexo_pedidos..
                       /*$sql=" INSERT INTO
                                     anexo_pedidos

                                     ( sContrato, iFolioRequisicion, iFolioPedido,
                                       sIdProveedor, sNumeroOrden, dIdFecha,
                                       dFechaEntrega, sReferencia, mComentarios )

                              VALUES ( '$sContrato', '$iFolio', '$iFolio',
                                       '999', '$sNumeroOrden', '$dFecha',
                                       '$dFecha_Req', '$sReferencia', '$mComentarios' )";
                       mysql_query($sql);
                       if (mysql_error())
                           $error=1; */
                   }

                   if ($this->hdfOpcion->Value=="Modificar")
                   {   //Modificacion de loa datos...
                       $sql= "UPDATE
                                  anexo_requisicion
                              SET dIdFecha = '$dFecha', sNumeroOrden = '$sNumeroOrden',
                                  dFechaSolicitado = '$dFecha_Sol', dFechaRequerido = '$dFecha_Req',
                                  sReferencia = '$sReferencia', mComentarios = '$mComentarios',
                                  sRevision = '$Revision' , sSolicito = '$Solicito',
                                  sAutorizo = '$Autoriza' , sVerificacion = '$Verifica',
                                  sRecibido = '$Recibe'
                              WHERE
                                  sContrato = '$sContrato'
                                  And iFolioRequisicion = '$iFolio' ";
                       mysql_query($sql);
                       if (mysql_error())
                           $error=1;

                        //Actualizacion del kardex

                      $sql= "Insert Into
                                  kardex_sistema

                                  ( sContrato, sIdUsuario, dIdFecha,
                                    sHora, sDescripcion, lOrigen )

                            Values( '$sContrato', '$sUsuario', '$FechaActual',
                                    '$Hora', 'Modificacion de Requisición [ $iFolio ] Registrado el [ $FechaActual ] Usuario [ $sUsuario ]' , 'Requisiciones y Compras' )";
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

               function dbgRequisisionesJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                  dbgRequisisiones.getSelectionModel().iterateSelection
                  (    function(index)
                       {
                           //obtenemos los datos del grid Requisiciones
                           var Tabla = dbgRequisisiones.getTableModel();
                           var sFolio = Tabla.getValue(0, index);
                           var NumeroOrden = Tabla.getValue(1, index);
                           var dFechaSolic = Tabla.getValue(2, index);
                           var Referencia = Tabla.getValue(3, index);
                           var Comentarios = Tabla.getValue(4, index);
                           var dFecha = Tabla.getValue(5, index);
                           var dFechaReq = Tabla.getValue(6, index);
                           var sRevision = Tabla.getValue(7, index);
                           var sSolicito = Tabla.getValue(8, index);
                           var sAutorizo = Tabla.getValue(9, index);
                           var sVerifico = Tabla.getValue(10, index);
                           var sRecibe = Tabla.getValue(11, index);
                           //limpiar grid
                           var _rowData = [];
                           _rowData.push(['','','','','','','','','']);
                           var _oData = rowData;
                           dbgPartidas.getTableModel().originalData=_oData;
                           dbgPartidas.getTableModel().setData(_rowData);

                           document.getElementById("iFolioRequisicion").value = sFolio;
                           document.getElementById("sNumeroOrden").value = NumeroOrden;
                           document.getElementById("sReferencia").value = Referencia;
                           document.getElementById("mComentarios").value = Comentarios;
                           document.getElementById("f-calendar-field-4").value = dFechaReq;
                           document.getElementById("f-calendar-field-2").value = dFecha;
                           document.getElementById("f-calendar-field-3").value = dFechaSolic;
                           document.getElementById("txtRevision").value = sRevision;
                           //document.getElementById("txtSolicita").value = sSolicito;
                           //document.getElementById("txtAutoriza").value = sAutorizo;
                           //document.getElementById("txtVerifica").value = sVerifico;
                           //document.getElementById("txtRecibe").value = sRecibe;

                           document.getElementById("hdfFolioActual").value = sFolio;
                           document.getElementById("hflStatus").value =  Tabla.getValue(12, index);
                           MuestraDatos(sFolio);

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
                  controlAnexoPartidas( false );
                  return false;
               <?php
               }

               function cmdCancelRequisicionJSClick($sender, $params)
               {
               ?>
               //Add your javascript code here
                 controlesRequisiciones( false );
                 return false;
               <?php
               }

               function cmdAcceptRequisicionJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                   opcion=0;
                   // Solicita = document.getElementById("txtSolicita").value;
                   Referencia = document.getElementById("sReferencia").value;
                   /*
                   if (Solicita=="")
                   {   alert ("  Debe Escribir el Nombre del Solicitante !!!");
                       opcion = 1;
                   }else*/
                        {
                           if (Referencia=="")
                               document.getElementById("sReferencia").value= "SIN REFERENCIA";
                           //Funcion que valida las fechas antes de guardarlas y las invierte..
                             document.getElementById("HidError").value = 0;
                             var Fecha="f-calendar-field-1";
                             ComponerFecha(Fecha);
                             var Fecha="f-calendar-field-4";
                             ComponerFecha(Fecha);
                             var Fecha="f-calendar-field-2";
                             ComponerFecha(Fecha);
                             var Fecha="f-calendar-field-3";
                             ComponerFecha(Fecha);
                             if (document.getElementById("HidError").value == 1)
                             {    opcion = 1;
                                  var Fecha="f-calendar-field-1";
                                  FechaActual(Fecha);
                                  var Fecha="f-calendar-field-2";
                                  FechaActual(Fecha);
                                  var Fecha="f-calendar-field-3";
                                  FechaActual(Fecha);
                                  var Fecha="f-calendar-field-4";
                                  FechaActual(Fecha);
                             }
                           //var fechaActual = new Date();
                           //var diaActual  = fechaActual.getDate();
                           //var mesActual  = fechaActual.getMonth()+1;
                           //if (mesActual<10)
                           //   mesActual = "0" + mesActual;
                           //if (diaActual<10)
                           //   diaActual = "0" + diaActual;
                           //var anioActual = fechaActual.getFullYear();
                           //var LaFecha = anioActual+"-"+mesActual+"-"+diaActual;
                           //document.getElementById("hdfFechaActual").value = LaFecha;
                           //var Hora = new Date();
                           //var H  = Hora.getHours() ;
                           //var M  = Hora.getMinutes();
                           //var S = Hora.getSeconds() ;
                           //var Hora=H+":"+M+":"+S;
                           //document.getElementById("hdfHoraActual").value=Hora;
                           document.getElementById("hdfMultisesion").value="uno";
                    }
                    if (opcion==0)
                       return true;
                    else
                       return false;
               <?php

               }

               function cmdDeleteRequisicionJSClick($sender, $params)
               {
               ?>
               //Add your javascript code here
                 if(document.getElementById("hflStatus").value != "Pendiente"){
                     alert("no se puede modificar, no esta en estado de pendiente");
                     return false;
                 }else {
                  ok=0;
                  resp=0;
                  controlesPaneles(true);
                  dbgRequisisiones.getSelectionModel().iterateSelection
                  (    function(index)
                       {
                           //obtenemos los datos del grid Requisiciones
                           var Tabla = dbgRequisisiones.getTableModel();
                           var sFolio = Tabla.getValue(0, index);
                           ok=1;
                           if(!confirm("  Desea ELIMINAR LA REQUISICION Seleccionada ?, Se Eliminaran insumos..."))
                           {   resp=1;
                           }
                           document.getElementById("iFolioRequisicion").disabled=false;
                           document.getElementById("hdfMultisesion").value="uno";
                       }
                  );
                  if (ok==0)
                  {  alert("  DEBE HACER CLICK SOBRE UNA REQUISICION  !!!");
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
                 if(document.getElementById("hflStatus").value != "Pendiente"){
                     alert("No se puede modificar, no esta en estado de pendiente");
                     return false;
                 }else {
                    if ( dbgRequisisiones.getFocusedRow()==0
                         && document.getElementById("iFolioRequisicion").value=="" )
                    {   alert("  HAGA CLICK EN UNA REQUISICION !!! ");
                        return false;
                    }
                    //funciones para mostras y ocultar botones y paneles...
                    controlesRequisiciones( true );
                    controlesPaneles(true);
                    document.getElementById("iFolioRequisicion").focus();
                    document.getElementById("hdfOpcion").value="Modificar";
                 }

                 return false;
               <?php
               }

               function cmdAddRequisicionJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                 //funciones para mostras y ocultar botones y paneles...
                  var Folio = document.getElementById("iFolioRequisicion").value;
                  i=dbgRequisisiones.getFocusedRow();
                  if (Folio=="" && i>0)
                  {   Folio = dbgRequisisiones.getTableModel().getValue(0,i);
                      document.getElementById("iFolioRequisicion").value = Folio;
                  }

                 controlesRequisiciones( true );
                 controlesPaneles(true);

                 document.getElementById("iFolioRequisicion").focus();
                 var Folio=document.getElementById("hdfUltimoFolio").value;
                 Folio++;
                 document.getElementById("iFolioRequisicion").value = Folio;
                 document.getElementById("sReferencia").value = "";
                 document.getElementById("mComentarios").value = "";
                 document.getElementById("txtRevision").value = "000";
                 //document.getElementById("txtSolicita").value = "";
                 //document.getElementById("txtAutoriza").value = "";
                 //document.getElementById("txtVerifica").value = "";
                 //document.getElementById("txtRecibe").value = "";

                 //Funcion que escribe la Fecha actual..
                 var Fecha="f-calendar-field-1";
                 FechaActual(Fecha);
                 var Fecha="f-calendar-field-2";
                 FechaActual(Fecha);
                 var Fecha="f-calendar-field-3";
                 FechaActual(Fecha);
                 var Fecha="f-calendar-field-4";
                 FechaActual(Fecha);
                 document.getElementById("hdfOpcion").value="Agregar";
                 return false;

               <?php
               }

               function frmRequisicionesBeforeShow($sender, $params)
               {
                  global $sContrato;
                  global $_SESSION,$Usuario,$Clave,$Servidor;
                  $this->db->setConnected(false);
                  $this->db->setDatabaseName($_SESSION['database']);
                  $this->db->setUserName($Usuario);
                  $this->db->setUserPassword($Clave);
                  $this->db->setHost($Servidor);
                  $this->db->setConnected(true);

                  $this->qryPartidas->setActive(false);
                  $this->qryPartidas->setActive(true);
                  $this->qryCatalogo->setActive(false);
                  $this->qryCatalogo->setActive(true);

                  //Llenado del grid de Requisiciones....
                  $this->qryAnexo_requisicion->setActive(false);
                  $this->qryAnexo_requisicion->setFilter("sContrato='$sContrato'
                                                          order by iFolioRequisicion DESC");
                  $this->qryAnexo_requisicion->setActive(true);
                  $this->llenaCboNumeroOrden();

                  //Calculo del ultimo folio existente, en caso contrario comienza con 1
                   $sql=" select max(iFolioRequisicion) as Maximo
                          from
                                 anexo_requisicion
                          where
                                 sContrato='$sContrato'";
                   $rs = mysql_query($sql);
                   if($row = mysql_fetch_array($rs))
                   {
                       $this->hdfUltimoFolio->Value = $row['Maximo'];

                   }else
                       {
                         $this->hdfUltimoFolio->Value = 1;
                       }

                  //Llenado del Grid General "oculto"
                  global $sIdConvenio;
                  $this->qryActMostrar->setActive(false);
                  $this->qryActMostrar->setFilter(" sContrato ='$sContrato'");
                  $this->qryActMostrar->setActive(true);

                  //Llenado del Grid Actividades a Mostrar "oculto"
                  $this->qryGeneral->setActive(false);
                  $this->qryGeneral->setFilter("sContrato ='$sContrato'");
                  $this->qryGeneral->setActive(true);

                  $this->Panel5->setVisible("false");
               }

               function llenaCboNumeroOrden()
               {    global $sContrato;
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
                    $this->Panel5->Visible="false";
               }

               function LimpiaObjetos()
               {
                   $this->hdfOpcion->Value=="";
                   $this->hdfOpcionPartida->Value="";
                   $this->txtNumPartida->Text="";
                   $this->txtCPT->Text="";
                   $this->memoCometarios->Text="";
                   $this->txtMedida->Text="";
                   $this->dtaFecha->Text="";
                   $this->txtCantidad->Text="";
                   $this->iFolioRequisicion->Text="";
                   $this->sReferencia->Text="";
                   $this->mComentarios->Text="";
                   $this->txtRevision->Text="";
                   $this->txtRecibe->Text="";
                   $this->txtVerifica->Text="";
                   $this->txtAutoriza->Text="";
                   $this->txtSolicita->Text="";
               }

               function dumpJavascript(){
               echo 'function controlesRequisiciones( habilitar ){
                        if(habilitar){
                           accion = false;
                        }
                        else{
                             accion= true;
                        }
                        document.getElementById("iFolioRequisicion").disabled=accion;
                        document.getElementById("sNumeroOrden").disabled=accion;
                        document.getElementById("sReferencia").disabled=accion;
                        document.getElementById("mComentarios").disabled=accion;
                        document.getElementById("txtRevision").disabled=accion;
                        //document.getElementById("txtSolicita").disabled=accion;
                        //document.getElementById("txtAutoriza").disabled=accion;
                        //document.getElementById("txtVerifica").disabled=accion;
                        //document.getElementById("txtRecibe").disabled=accion;

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
                           var SeparaFI = FechaFI.split("/");
                           var diaFI = SeparaFI[0];
                           var mesFI = SeparaFI[1];
                           var anioFI = SeparaFI[2];
                           var ErrorFecha=0;

                           if (mesFI>12 || diaFI>31 || mesFI <=0 || diaFI <= 0)
                               ErrorFecha=1;
                           if (ErrorFecha==1)
                           {  alert("La FECHA ESCRITA Esta Fuera de los LIMITES!!!");
                              return false;
                           }
                           if (ObjetoFecha == "f-calendar-field-4")
                           {   FechaAnt     = document.getElementById("f-calendar-field-3").value;
                               var SeparaFA = FechaAnt.split("/");
                               var diaFA    = SeparaFA[0];
                               var mesFA    = SeparaFA[1];
                               var anioFA   = SeparaFA[2];
                               ErrorRango   = 0;

                               if (diaFI < diaFA && mesFI == mesFA && anioFI == anioFA)
                                   ErrorRango = 1;
                               else
                                   if ( mesFI < mesFA && anioFI == anioFA)
                                        ErrorRango = 1;
                                   else
                                       if (anioFI < anioFA)
                                           ErrorRango = 1;

                               if (ErrorRango == 1)
                               {  alert("La Fecha Requerida no Debe ser Menor a la Solicitada ! ");
                                  document.getElementById("HidError").value = 1;
                                  return false;
                               }
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
                               actividad= dbgActMostrar.getTableModel().getValue(4,i);
                               if (actividad==partida)
                               {
                                  var sDescripcion = dbgActMostrar.getTableModel().getValue(0,i);
                                  var sCantidad    = dbgActMostrar.getTableModel().getValue(1,i);
                                  var sMedida      = dbgActMostrar.getTableModel().getValue(2,i);
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
                          document.getElementById("iFolioRequisicion").style.backgroundColor = "";
                          document.getElementById("sNumeroOrden").style.backgroundColor = "";
                          document.getElementById("sReferencia").style.backgroundColor = "";
                          document.getElementById("mComentarios").style.backgroundColor = "";
                          document.getElementById("txtRevision").style.backgroundColor = "";
                          //document.getElementById("txtSolicita").style.backgroundColor = "";
                          //document.getElementById("txtAutoriza").style.backgroundColor = "";
                          //document.getElementById("txtVerifica").style.backgroundColor = "";
                          //document.getElementById("txtRecibe").style.backgroundColor = "";

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
                          document.getElementById("txtUnidad").style.backgroundColor = "";
                          document.getElementById("txtCantidadAnexo").style.backgroundColor = "";

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
                                 var sCantidad = dbgGeneral.getTableModel().getValue(6,i);
                                 var sRequerido = dbgGeneral.getTableModel().getValue(5,i);

                                 var Filas = dbgActMostrar.getTableModel().getRowCount();
                                 for (x=0;x<Filas;x++)
                                 {
                                       Actividad = dbgActMostrar.getTableModel().getValue(4,x);
                                       if (Actividad==sPartida)
                                       {
                                           var sCantidadAnex = dbgActMostrar.getTableModel().getValue(1,x);
                                           var sMonto        = dbgActMostrar.getTableModel().getValue(3,x);
                                           var sUnidad       = dbgActMostrar.getTableModel().getValue(2,x);
                                       }
                                 }

                                 ConvierteCadNum(sCantidad);
                                 Cant = document.getElementById("HidStrNum").value;
                                 ConvierteCadNum(sMonto);
                                 Monto = document.getElementById("HidStrNum").value;
                                 var sTotal=Cant*Monto;

                                 if (datos==0)
                                 {
                                     document.getElementById("txtNumPartida").value = sPartida;
                                     document.getElementById("txtCPT").value = sItem;
                                     document.getElementById("memoCometarios").value = sDescripcion;
                                     document.getElementById("txtCantidad").value = sCantidad;
                                     document.getElementById("txtMedida").value = sMedida;
                                     document.getElementById("f-calendar-field-4").value = sRequerido;
                                     document.getElementById("txtUnidad").value = sUnidad;
                                     document.getElementById("txtCantidadAnexo").value = sCantidadAnex;
                                     document.getElementById("txtCosto").value = sMonto;
                                     datos=1;
                                 }

                                 //Colocacion de valores al dbgrid Partidas
                                  rowData.push([sPartida,sItem,sMedida,sDescripcion,sCantidad,sCantidadAnex,sRequerido,sMonto,sTotal]);
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
                           var rowData = [];
                           for (i=0;i<totalFilas;i++)
                           {
                               palabra    = dbgActMostrar.getTableModel().getValue(0,i);
                               var separa = palabra.split("");
                               var frase  = "";
                               var aux    = "";
                               var final  = "";
                               for (x=0;x<total;x++)
                               {   aux = final;
                                   frase = separa[x];
                                   final = aux + frase;
                               }

                               if (final==letras)
                               {
                                  var sInsumo      = dbgActMostrar.getTableModel().getValue(4,i);
                                  var sDescripcion = dbgActMostrar.getTableModel().getValue(0,i);
                                  var sCantidad    = dbgActMostrar.getTableModel().getValue(1,i);
                                  var sMedida      = dbgActMostrar.getTableModel().getValue(2,i);
                                  var sCosto       = dbgActMostrar.getTableModel().getValue(3,i);
                                  var sExistencia  = dbgActMostrar.getTableModel().getValue(5,i);
                                  rowData.push([sInsumo,sDescripcion,sCantidad,sMedida,sCosto,sExistencia]);
                                  var oData = rowData;
                                  dbgCatalogo.getTableModel().originalData=oData;
                                  dbgCatalogo.getTableModel().setData(rowData);
                               }

                           }
                           return false;
                       }';
                  echo 'function buscarTexto(){
                           var _rowData = [];
                           _rowData.push(["","","",""]);
                           var _oData = rowData;
                           dbgCatalogo.getTableModel().originalData=_oData;
                           dbgCatalogo.getTableModel().setData(_rowData);

                           var texto = document.getElementById("txtNumPartida").value.toUpperCase();
                           MuestraCatalogo(texto);
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

                  echo 'function Selecciona(i)
                  {     var sInsumo      = dbgCatalogo.getTableModel().getValue(0,i);
                        var sDescripcion = dbgCatalogo.getTableModel().getValue(1,i);
                        var sCantidad    = dbgCatalogo.getTableModel().getValue(2,i);
                        var sMedida      = dbgCatalogo.getTableModel().getValue(3,i);
                        var sCosto       = dbgCatalogo.getTableModel().getValue(4,i);
                        document.getElementById("txtNumPartida").value = sInsumo;
                        document.getElementById("memoCometarios").value = sDescripcion;
                        document.getElementById("txtMedida").value = sMedida;
                        document.getElementById("txtUnidad").value = sMedida;
                        document.getElementById("txtCantidadAnexo").value = sCantidad;
                        document.getElementById("txtCosto").value = sCosto;
                        document.getElementById("txtCantidad").value = 0;
                        return false;
                  }';

               }

               function txtNumPartidaJSChange($sender, $params)
               {
               ?>
                 //Add your javascript code here
                 document.getElementById("txtCPT").value = "";
                 document.getElementById("txtCantidad").value = "0";
                 //Funcion que escribe la Fecha actual..
                 var Fecha="f-calendar-field-4";
                 FechaActual(Fecha);
                 return false;
               <?php
               }

               function cmdPrintRequisicionJSClick($sender, $params)
               {
               global $sContrato;
               global $sIdConvenioAct;
               ?>
                  //Add your javascript code here
                  ruta = "reportes/reportes/requisiciones.php";
                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                  ok= 0;
                  dbgRequisisiones.getSelectionModel().iterateSelection
                  (    function(index)
                       {
                           //obtenemos los datos del grid Requisiciones
                           var Tabla = dbgRequisisiones.getTableModel();
                           var sFolio      = Tabla.getValue(0, index);
                           var sOrden = Tabla.getValue(1, index);
                           ruta = ruta + "&iFolioRequisicion="+sFolio;
                           ruta = ruta + "&NumeroOrden="+sOrden;
                           ruta = ruta + "&nombreReporte=requisiciones";
                           var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                           ok = 1;
                       }
                  );
                  if (ok == 0 )
                     alert(" Haga clic sobre una Requsicion ! ");
                  return false;
               <?php
               }

               function txtNumPartidaJSFocus($sender, $params)
               {
               ?>
               //Add your javascript code here
                     var _rowData = [];
                     _rowData.push(['','','','','']);
                     var _oData = rowData;
                     dbgCatalogo.getTableModel().originalData=_oData;
                     dbgCatalogo.getTableModel().setData(_rowData);
                     return false;
               <?php
               }

               function txtMedidaJSFocus($sender, $params)
               {
               ?>
               //Add your javascript code here
                 return false;
               <?php
               }

               function txtCantidadJSFocus($sender, $params)
               {
               ?>
               //Add your javascript code here
                 return false;
               <?php
               }

               function memoCometariosJSFocus($sender, $params)
               {
               ?>
               //Add your javascript code here
                 return false;
               <?php
               }

               function txtCPTJSFocus($sender, $params)
               {
               ?>
               //Add your javascript code here
                 return false;
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
                     document.getElementById("memoCometarios").focus();
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
                 if(event.keyCode==9)
                 {  document.getElementById("txtRevision").focus();
                    return false;
                 }
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
                 {  document.getElementById("mComentarios").focus();
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

               function iFolioRequisicionJSKeyPress($sender, $params)
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

               function iFolioRequisicionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iFolioRequisicionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }
                function txtRecibeJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtRecibeJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtRecibeJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtVerificaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
                if(event.keyCode==9)
                 {  //document.getElementById("txtRecibe").focus();
                    return false;
                 }
               <?php

               }

               function txtVerificaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtVerificaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtAutorizaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
                if(event.keyCode==9)
                 {  document.getElementById("txtVerifica").focus();
                    return false;
                 }
               <?php

               }

               function txtAutorizaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtAutorizaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtSolicitaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
                if(event.keyCode==9)
                 {  document.getElementById("txtAutoriza").focus();
                    return false;
                 }
               <?php

               }

               function txtSolicitaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtSolicitaJSBlur($sender, $params)
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
                 {  document.getElementById("txtSolicita").focus();
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


               function txtBuscarJSFocus($sender, $params)
               {
               ?>
               //Add your javascript code here

               <?php
               }

               function txtBuscarJSBlur($sender, $params)
               {
               ?>
                //Add your javascript code here

               <?php
               }

               function txtBuscarJSKeyPress($sender, $params)
               {
               ?>
               //Add your javascript code here

               <?php
               }
        }

        global $application;

        global $frmRequisiciones;

        //Creates the form
        $frmRequisiciones=new frmRequisiciones($application);

        //Read from resource file
        $frmRequisiciones->loadResource(__FILE__);

        //Shows the form
        $frmRequisiciones->show();

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
   var fecha="f-calendar-field-4";
   FechaActual(fecha);
   var fecha="f-calendar-field-1";
   FechaActual(fecha);
   var fecha="f-calendar-field-2";
   FechaActual(fecha);
   var fecha="f-calendar-field-3";
   FechaActual(fecha);
</script>
