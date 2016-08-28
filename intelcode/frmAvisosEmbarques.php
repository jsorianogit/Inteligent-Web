<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require_once("fnUtilerias.php");
        require_once("mysql.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        //$sContrato='428237814';
        $sIdConvenioAct= $sIdConvenioAct;//'A-03';
        //Class definition
        class frmAvisosEmbarques extends Page
        {
               public $Button2 = null;
               public $hdfOcultarVentana = null;
               public $Button1 = null;
               public $Memo1 = null;
               public $Window1 = null;
               public $hdfOperacion = null;
               public $hdfOldNumeroActividad = null;
               public $hdfOldFolio = null;
               public $dbgGeneral = null;
               public $dtaGeneral = null;
               public $qryGeneral = null;
               public $dbgSuministros = null;
               public $qryAnexo_psuministro = null;
               public $dsAnexo_psuministro = null;
               public $dsAnexo_suministro = null;
               public $qryAnexo_suministro = null;
               public $data = null;
               public $sOrigen = null;
               public $dCantidad = null;
               public $mDescripcion = null;
               public $dCantidadAnexo = null;
               public $sMedida = null;
               public $sNumeroActividad = null;
               public $Label6 = null;
               public $Label2 = null;
               public $mComentarios = null;
               public $Label22 = null;
               public $Label19 = null;
               public $sIdProveedor = null;
               public $Label16 = null;
               public $sReferencia = null;
               public $Label15 = null;
               public $sIdTipo = null;
               public $Label11 = null;
               public $sNumeroOrden = null;
               public $dFechaAviso = null;
               public $dIdFecha = null;
               public $Label1 = null;
               public $iFolio = null;
               public $cmdCancelarP = null;
               public $cmdAceptarP = null;
               public $cmdEliminarP = null;
               public $cmdModificarP = null;
               public $cmdAgregarP = null;
               public $cmdImprimirS = null;
               public $cmdCancelarS = null;
               public $cmdAceptarS = null;
               public $cmdEliminarS = null;
               public $cmdModificarS = null;
               public $cmdAgregarS = null;
               public $dbgPsuministros = null;
               public $hdfRefrsPartida = null;
               public $hdfPartidas = null;
               public $hdfRangoEstimacion = null;
               public $hdfRecomienda = null;
               public $Panel3 = null;
               public $Button15 = null;
               public $Button14 = null;
               public $Panel5 = null;
               public $Label18 = null;
               public $Edit7 = null;
               public $Edit6 = null;
               public $Panel1 = null;
               public $Label17 = null;
               public $Label14 = null;
               public $Label13 = null;
               public $Label12 = null;
               public $Label10 = null;
               public $Panel2 = null;
               public $Label9 = null;
               public $Label5 = null;
               public $Label4 = null;
               public $Label3 = null;

               function frmAvisosEmbarquesShow($sender, $params)
               {
                  global $sContrato,$sIdConvenioAct;
                  /*Suministros*/

                  if($this->hdfOldFolio->Value=="") $folio='-1';
                  else $folio=$this->hdfOldFolio->Value;

                     $this->qryAnexo_psuministro->setActive(false);
                     $this->qryAnexo_psuministro->setFilter("
                        an.sContrato='$sContrato'
                        and an.sTipoActividad='Actividad'
                        and an.sIdConvenio='$sIdConvenioAct'
                        and ap.iFolio='$folio'
                     ");
                     $this->qryAnexo_psuministro->setActive(true);
                   //Llenado del grid general
                  $this->qryGeneral->setActive(false);
                  $this->qryGeneral->setFilter("ap.sContrato='$sContrato' and an.sIdConvenio='$sIdConvenioAct' ");
                  $this->qryGeneral->setActive(true);


               }

               function cmdAceptarPClick($sender, $params)
               {
               $this->aceptarPsuministro("","");
               }

               function Button2JSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  //document.location.href="Modulos/preciounitario/actividadesdiarias/reportediario/";
                  document.location.href="frmReporteDiario.php";
                  return false;
               <?php

               }

               function cmdImprimirSJSClick($sender, $params)
               {
                global $sIdConvenioct,$sContrato;
               ?>
               //Add your javascript code here
                  ruta = "Modulos/preciounitario/actividadesdiarias/reportediario/avisosdeembarques/reporte/rptEmbarques.php";
                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                  ruta = ruta + "&sIdConvenio=<?php echo $sIdConvenioAct ?>";
                  ruta = ruta + "&dIdFecha=" + document.getElementById("f-calendar-field-1").value;
                  ruta = ruta + "&iFolio=" + document.getElementById("hdfOldFolio").value;
                  ruta = ruta + "&sNumeroOrden=" +  document.getElementById("sNumeroOrden").value;
                  var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                  return false;
               <?php

               }



               function cmdEliminarPJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                if(!confirm("Desea eliminar el registro Seleccionado ?"))
                  return false;
                else{
                   document.getElementById("cmdAgregarP").disabled=true;
                   document.getElementById("cmdModificarP").disabled=true;
                   document.getElementById("cmdEliminarP").disabled=true;
                   xajax.doneLoadingFunction=ventana;
                  <?php
                     echo $this->cmdEliminarP->ajaxCall("eliminarPsuministro",array(),array("dbgPsuministros","Window1","Memo1","hdfOcultarVentana","dbgGeneral"))
                  ?>
                }
                return false;
               <?php

               }
               function eliminarPsuministro($sender="",$params=""){
                  global $sContrato,$sIdConvenioct;
                  $oldFolio            = $this->hdfOldFolio->Value;
                  $oldsNumeroActividad = $this->hdfOldNumeroActividad->Value;
                  $sNumeroActividad    = $this->sNumeroActividad->getItemIndex();
                  $sql="delete from anexo_psuministro
                        where sContrato='$sContrato' and sNumeroActividad='$oldsNumeroActividad'
                              and iFolio='$oldFolio'";
                  mysql_query($sql);
                  if(mysql_error()){
                     $this->Memo1->Text=mysql_error();
                     $this->hdfOcultarVentana->Value="No";
                  }else{
                     $this->hdfOcultarVentana->Value="Si";
                  }
                  $this->qryAnexo_psuministro->setActive(false);
                  $this->qryAnexo_psuministro->setFilter("
                        an.sContrato='$sContrato'
                        and an.sTipoActividad='Actividad'
                        and an.sIdConvenio='$sIdConvenioAct'
                        and ap.iFolio='$oldFolio'
                   ");
                   $this->qryAnexo_psuministro->setActive(true);
                   //Llenado del grid general
                  $this->qryGeneral->setActive(false);
                  $this->qryGeneral->setFilter("ap.sContrato='$sContrato' and an.sIdConvenio='$sIdConvenioAct'");
                  $this->qryGeneral->setActive(true);
               }
               function cmdAceptarPJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                   document.getElementById("cmdAceptarP").disabled=true;
                   document.getElementById("cmdCancelarP").disabled=true;
                   document.getElementById("hdfOcultarVentana").value="";
                  //xajax.doneLoadingFunction=ventana;
                  <?php
                     //echo $this->cmdAceptarP->ajaxCall("aceptarPsuministro",array(),array("dbgPsuministros","Window1","Memo1","hdfOcultarVentana","dbgGeneral"));
                  ?>
                return true;
               <?php

               }
               function aceptarPsuministro($sender="", $params="") {
                  global $sContrato,$sIdConvenioAct;
                  $oldFolio            = $this->hdfOldFolio->Value;
                  $oldsNumeroActividad = $this->hdfOldNumeroActividad->Value;
                  $sNumeroActividad    = $this->sNumeroActividad->getItemIndex();
                  $dCantidad           = $this->dCantidad->getText();
                  $error               = "";
                  if($this->hdfOperacion->Value=="agregar"){
                     $sql="insert into anexo_psuministro set
                              sContrato='$sContrato',
                              iFolio='$oldFolio',
                              sNumeroActividad='$sNumeroActividad',
                              dCantidad='$dCantidad'";
                     mysql_query($sql);
                     if(mysql_error()){
                        $this->Memo1->Text=mysql_error();
                        $this->hdfOcultarVentana->Value="No";
                     }else{
                        $this->hdfOcultarVentana->Value="Si";
                     }
                  }else{
                      $sql="update anexo_psuministro set
                              sNumeroActividad='$sNumeroActividad',
                              dCantidad='$dCantidad'
                           where sContrato='$sContrato' and sNumeroActividad='$oldsNumeroActividad'
                                 and iFolio='$oldFolio'";
                     mysql_query($sql);
                     if(mysql_error()){
                        $this->Memo1->Text=mysql_error();
                        $this->hdfOcultarVentana->Value="No";
                     }else{
                        $this->hdfOcultarVentana->Value="Si";
                     }

                  }
                  /*Suministros*/

                  if($this->hdfOldFolio->Value=="") $folio='-1';
                  else $folio=$this->hdfOldFolio->Value;

                     $this->qryAnexo_psuministro->setActive(false);
                     $this->qryAnexo_psuministro->setFilter("
                        an.sContrato='$sContrato'
                        and an.sTipoActividad='Actividad'
                        and an.sIdConvenio='$sIdConvenioAct'
                        and ap.iFolio='$folio'
                     ");
                     $this->qryAnexo_psuministro->setActive(true);
                   //Llenado del grid general
                  $this->qryGeneral->setActive(false);
                  $this->qryGeneral->setFilter("ap.sContrato='$sContrato' and an.sIdConvenio='$sIdConvenioAct' ");
                  $this->qryGeneral->setActive(true);
                   //Llenado del grid general


               }
               function Button1JSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  Window1.close();
                  return false;
               <?php

               }

               function cmdEliminarSClick($sender, $params)
               {
               global $sContrato;
               $oldFolio     = $this->hdfOldFolio->Value;

               $sql = "select sNumeroActividad from anexo_psuministro where sContrato='$sContrato' and iFolio='$oldFolio'";
               $rs  = mysql_query("$sql");
               if($row = mysql_fetch_array($rs)){
                  $this->Memo1->Text=" Existen Actividades Registradas en este Folio, No se Puede Eiminar !! ";
                  $this->Window1->setIsVisible(true);
               }else{
                  $sql="delete from anexo_suministro where sContrato='$sContrato' and iFolio='$oldFolio'";
                  mysql_query($sql);
                  if(mysql_error()){
                     $this->Memo1->Text=mysql_error();
                     $this->Window1->setIsVisible(true);
                  }else{
                     $this->Window1->setIsVisible(false);
                  }
               }
               }

               function cmdEliminarSJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                document.getElementById('Panel1_outer').style.display='block';
                document.getElementById('Panel2_outer').style.display='none';
                document.getElementById('hdfPartidas').value="no";

                if(!confirm("Desea eliminar el registro Seleccionado ?"))
                  return false;
                else
                  return true;
               <?php

               }



               function cmdAceptarSClick($sender, $params)
               {
               global $sContrato;
               $oldFolio     = $this->hdfOldFolio->Value;
               $iFolio       = $this->iFolio->getText();
               $sNumeroOrden = $this->sNumeroOrden->getItemIndex();
               $dIdFecha     = formatoFechaPer($this->dIdFecha->getText(),"Y-m-d");
               $dFechaAviso  = formatoFechaPer($this->dFechaAviso->getText(),"Y-m-d");;
               $sIdTipo      = $this->sIdTipo->getItemIndex();
               $sReferencia  = $this->sReferencia->getText();
               $sIdProveedor = $this->sIdProveedor->getItemIndex();
               $sOrigen      = $this->sOrigen->getText();
               $mComentarios = $this->mComentarios->Text;
               $error        = "";
               if($this->hdfOperacion->Value=="agregar"){
                  $sql="insert into anexo_suministro set
                           sContrato='$sContrato',
                           iFolio='$iFolio',
                           sNumeroOrden='$sNumeroOrden',
                           dIdFecha='$dIdFecha',
                           dFechaAviso='$dFechaAviso',
                           sIdTipo='$sIdTipo',
                           sReferencia='$sReferencia',
                           sIdProveedor='$sIdProveedor',
                           sOrigen='$sOrigen',
                           mComentarios='$mComentarios'";
                  mysql_query($sql);
                  if(mysql_error()){
                     $this->Memo1->Text=mysql_error();
                     $this->Window1->setIsVisible(true);
                  }else{
                     $this->Window1->setIsVisible(false);
                  }
               }else{
                  mysql_query("begin");
                  $sql="update anexo_suministro set
                           sContrato='$sContrato',
                           iFolio='$iFolio',
                           sNumeroOrden='$sNumeroOrden',
                           dIdFecha='$dIdFecha',
                           dFechaAviso='$dFechaAviso',
                           sIdTipo='$sIdTipo',
                           sReferencia='$sReferencia',
                           sIdProveedor='$sIdProveedor',
                           sOrigen='$sOrigen',
                           mComentarios='$mComentarios'
                        where sContrato='$sContrato' and iFolio='$oldFolio'";
                  mysql_query($sql);
                  if(mysql_error()){$error=mysql_error();}

                  mysql_query("update anexo_psuministro set iFolio='$iFolio' where sContrato='$sContrato' and iFolio='$oldFolio'");
                  if(mysql_error()){$error=mysql_error();}

                  if($error != ""){
                     $this->Memo1->Text=$error;
                     $this->Window1->setIsVisible(true);
                     mysql_query("rollback");
                  }else{
                     mysql_query("commit");
                     $this->Window1->setIsVisible(false);
                  }
               }


               }

               function cmdCancelarPJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                    deshabilitarAvisos(false);
                    deshabilitarPartidas(false);
                    return false;
               <?php

               }

               function cmdModificarPJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                   if(document.getElementById("hdfOldFolio").value=="" || document.getElementById("hdfOldNumeroActividad").value==""){
                        alert("No ha seleccionado ningun folio o una actividad!!");
                        return false;
                     }else{
                       deshabilitarAvisos(false);
                       deshabilitarPartidas(true);

                       document.getElementById("hdfOperacion").value="modificar";
                     }
                     return false;
               <?php

               }

               function cmdAgregarPJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                     if(document.getElementById("hdfOldFolio").value=="" ){
                        alert("No ha seleccionado ningun folio !!");
                        return false;
                     }else{
                       deshabilitarAvisos(false);
                       deshabilitarPartidas(true);
                       document.getElementById("sMedida").value ="";
                       document.getElementById("dCantidadAnexo").value ="";
                       document.getElementById("mDescripcion").value ="";
                       document.getElementById("dCantidad").value ="";
                       document.getElementById("hdfOperacion").value="agregar";
                     }
                     return false;
               <?php

               }

               function cmdCancelarSJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                    deshabilitarAvisos(false);
                    deshabilitarPartidas(false);
                    document.getElementById('hdfPartidas').value="no";
                    return false;
               <?php

               }

               function cmdModificarSJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                 if (document.getElementById("iFolio").value=="")
                    alert (" Haga Click sobre un Folio !!!");
                 else
                    {
                       deshabilitarAvisos(true);
                       deshabilitarPartidas(false);
                       document.getElementById('Panel1_outer').style.display='block';
                       document.getElementById('Panel2_outer').style.display='none';
                       document.getElementById('hdfPartidas').value="no";
                       document.getElementById("iFolio").focus();
                       document.getElementById("hdfOperacion").value="modificar";
                     }
                    return false;
               <?php

               }

               function cmdAgregarSJSClick($sender, $params)
               {
                global $_SESSION,$sContrato;
                if(!$_SESSION['orden']==""){
                  $orden = $_SESSION['orden'];
                }
                else{
                   $orden = "CONTRATO NO. $sContrato";
                }
               ?>
               //Add your javascript code here
                    deshabilitarAvisos(true);
                    deshabilitarPartidas(false);
                    document.getElementById('Panel1_outer').style.display='block';
                    document.getElementById('Panel2_outer').style.display='none';
                    document.getElementById('hdfPartidas').value="no";
                    document.getElementById("hdfOperacion").value="agregar";
                    document.getElementById("iFolio").focus();
                    LimpiarCampos();
                    document.getElementById("sNumeroOrden").value="<?php echo $_SESSION['orden']; ?>";
                    return false;
               <?php

               }


               function Button15JSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  document.getElementById('Panel1_outer').style.display='none';
                  document.getElementById('Panel2_outer').style.display='block';
                   document.getElementById("Button14").disabled = false;
                  document.getElementById("Button15").disabled = true;
                  document.getElementById('hdfPartidas').value="si";
                  deshabilitarAvisos(false);
                  return false ;

               <?php

               }

               function Button14JSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  document.getElementById('Panel1_outer').style.display='block';
                  document.getElementById('Panel2_outer').style.display='none';
                  document.getElementById("Button14").disabled = true;
                  document.getElementById("Button15").disabled = false;
                  document.getElementById('hdfPartidas').value="no";
                  return false ;
               <?php

               }

               function dbgPsuministrosJSClick($sender, $params)
               {

               ?>
                  deshabilitarAvisos(false);
                  deshabilitarPartidas(false);

                  dbgPsuministros.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = dbgPsuministros.getTableModel();
                        //Llenar el formulario
                        document.getElementById("sNumeroActividad").value      = tableModel.getValue(0, index);
                        document.getElementById("hdfOldNumeroActividad").value = tableModel.getValue(0, index);
                        document.getElementById("sMedida").value               = tableModel.getValue(1, index);
                        document.getElementById("dCantidadAnexo").value        = tableModel.getValue(3, index);
                        document.getElementById("dCantidad").value             = tableModel.getValue(2, index);
                        document.getElementById("mDescripcion").value          = tableModel.getValue(8, index);
                     }
                  );

                 return false;
               <?php

               }

               function sNumeroActividadJSChange($sender, $params)
               {
                  echo $this->sNumeroActividad->ajaxCall("fnInfoPartida",array(),array("sMedida","dCantidadAnexo","mDescripcion","dCantidad"));
               ?>
                  return false;
               <?php
               }

               function fnInfoPartida($sender="", $params=""){
                  global $sContrato,$sIdConvenioAct;
                  $sNumeroActividad= $this->sNumeroActividad->ItemIndex;
                  $sql = "select mDescripcion, dCantidadAnexo, sMedida from actividadesxanexo
                          where sContrato = '$sContrato'
                           And sIdConvenio = '$sIdConvenioAct'
                           and sNumeroActividad = '$sNumeroActividad' ";
                  $rs = mysql_query($sql);
                  if($rw = mysql_fetch_array($rs)){
                     $this->sMedida->setText($rw['sMedida']);
                     $this->dCantidadAnexo->setText($rw['dCantidadAnexo']);
                     $this->mDescripcion->Text=$rw['mDescripcion'];
                     $this->dCantidad->setText("0");
                  }else{
                     $this->sMedida->setText("");
                     $this->dCantidadAnexo->setText("");
                     $this->mDescripcion->Text="";
                     $this->dCantidad->setText("0");
                  }
               }
               function dbgSuministrosJSClick($sender, $params)
               {

               ?>
                  deshabilitarAvisos(false);
                  deshabilitarPartidas(false);

                  dbgSuministros.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = dbgSuministros.getTableModel();

                        //Llenar el formulario
                        document.getElementById("iFolio").value             = tableModel.getValue(0, index);
                        document.getElementById("hdfOldFolio").value        = document.getElementById("iFolio").value;
                        document.getElementById("f-calendar-field-1").value = tableModel.getValue(1, index);
                        document.getElementById("f-calendar-field-2").value = tableModel.getValue(2, index);
                        document.getElementById("sNumeroOrden").value       = tableModel.getValue(3, index);
                        document.getElementById("sIdTipo").value            = tableModel.getValue(5, index);
                        document.getElementById("sReferencia").value        = tableModel.getValue(4, index);
                        document.getElementById("sIdProveedor").value       = tableModel.getValue(7, index);
                        document.getElementById("sOrigen").value            = tableModel.getValue(6, index);
                        document.getElementById("mComentarios").value = tableModel.getValue(8, index);
                        llenarPsuministro(document.getElementById("iFolio").value);
                     }

                  );
                 return false;
               <?php
               }

               function fnCargarPsuministros($sender="", $params=""){
                  global $sContrato,$sIdConvenioAct;
                  $iFolio=$params;
                  $this->qryAnexo_psuministro->setActive(false);
                  $this->qryAnexo_psuministro->setFilter("
                     an.sContrato='$sContrato'
                     and an.sTipoActividad='Actividad'
                     and an.sIdConvenio='$sIdConvenioAct'
                     and ap.iFolio='$iFolio'
                  ");
                  $this->qryAnexo_psuministro->setActive(true);
               }

               function dumpJavascript(){
                  echo "function ventana(){
                           if(document.getElementById('hdfOcultarVentana').value=='Si'){
                              Window1.close();
                           }
                           else if(document.getElementById('hdfOcultarVentana').value=='No'){
                              Window1.show();
                           }
                           llenarPsuministro(document.getElementById('iFolio').value);
                           deshabilitarAvisos(false);
                           deshabilitarPartidas(false);
                        }";

                  echo 'function deshabilitarAvisos(deshabilitar){
                          document.getElementById("cmdAgregarS").disabled=deshabilitar;
                          document.getElementById("cmdModificarS").disabled=deshabilitar;
                          document.getElementById("cmdEliminarS").disabled=deshabilitar;
                          document.getElementById("cmdImprimirS").disabled=deshabilitar;
                          document.getElementById("cmdAceptarS").disabled=!deshabilitar;
                          document.getElementById("cmdCancelarS").disabled=!deshabilitar;

                          document.getElementById("iFolio").disabled=!deshabilitar;
                          document.getElementById("f-calendar-field-1").disabled=!deshabilitar;
                          document.getElementById("f-calendar-field-2").disabled=!deshabilitar;
                          document.getElementById("sNumeroOrden").disabled=!deshabilitar;
                          document.getElementById("sIdTipo").disabled=!deshabilitar;
                          document.getElementById("sReferencia").disabled=!deshabilitar;
                          document.getElementById("sIdProveedor").disabled=!deshabilitar;
                          document.getElementById("sOrigen").disabled=!deshabilitar;
                          document.getElementById("mComentarios").disabled=!deshabilitar;

                  }' ;
                  echo 'function deshabilitarPartidas(deshabilitar){
                          document.getElementById("cmdAgregarP").disabled=deshabilitar;
                          document.getElementById("cmdModificarP").disabled=deshabilitar;
                          document.getElementById("cmdEliminarP").disabled=deshabilitar;
                          document.getElementById("cmdAceptarP").disabled=!deshabilitar;
                          document.getElementById("cmdCancelarP").disabled=!deshabilitar;

                          document.getElementById("sNumeroActividad").disabled=!deshabilitar;
                          document.getElementById("sMedida").disabled=true;
                          document.getElementById("dCantidadAnexo").disabled=true;
                          document.getElementById("mDescripcion").disabled=true;
                          document.getElementById("dCantidad").disabled=!deshabilitar;
                  }' ;
                  echo 'function llenarPsuministro(Folio){
                        //limpiar grid
                        var _rowData = [];
                        _rowData.push(["","","","","","","","",""]);
                        var _oData = rowData;
                        dbgPsuministros.getTableModel().originalData=_oData;
                        dbgPsuministros.getTableModel().setData(_rowData);

                        var totalFilas = dbgGeneral.getTableModel().getRowCount();
                        var rowData = [];
                        var datos=0;
                           //Se van a asignar uno a uno los valores que sean igual al folio...
                           for (i=0;i<totalFilas;i++)
                           {
                               GenFolio= dbgGeneral.getTableModel().getValue(0,i);
                               if (GenFolio==Folio)
                               {
                                   //obtencion de valores del dbgrid General el cual esta oculto....
                                   var sPartida      = dbgGeneral.getTableModel().getValue(1,i);
                                   var sCantidad     = dbgGeneral.getTableModel().getValue(2,i);
                                   var sCantidadAnex = dbgGeneral.getTableModel().getValue(7,i);
                                   var sMontoMN      = dbgGeneral.getTableModel().getValue(3,i);
                                   var sMontoDLL     = dbgGeneral.getTableModel().getValue(4,i);
                                   var sMedida       = dbgGeneral.getTableModel().getValue(8,i);
                                   var sDescripcion  = dbgGeneral.getTableModel().getValue(9,i);
                                   var sTotalMN      = dbgGeneral.getTableModel().getValue(5,i);;
                                   var sTotalDLL     = dbgGeneral.getTableModel().getValue(6,i);;

                                   if (datos==0)
                                   {
                                       document.getElementById("sNumeroActividad").value = sPartida;
                                       document.getElementById("sMedida").value          = sMedida;
                                       document.getElementById("dCantidadAnexo").value   = sCantidadAnex;
                                       document.getElementById("dCantidad").value        = sCantidad;
                                       document.getElementById("mDescripcion").value     = sDescripcion;
                                      datos=1;
                                   }

                                  //Colocacion de valores al dbgrid Partidas
                                   rowData.push([sPartida,sMedida,sCantidad,sCantidadAnex,sMontoMN,sMontoDLL,sTotalMN,sTotalDLL,sDescripcion]);
                                   var oData = rowData;
                                   dbgPsuministros.getTableModel().originalData=oData;
                                   dbgPsuministros.getTableModel().setData(rowData);
                               }
                           }
                  }';

                   echo 'function ResaltarBotones()
                      {
                           document.getElementById("cmdAgregarS").style.backgroundColor = "";
                           document.getElementById("cmdModificarS").style.backgroundColor = "";
                           document.getElementById("cmdEliminarS").style.backgroundColor = "";
                           document.getElementById("cmdAceptarS").style.backgroundColor = "";
                           document.getElementById("cmdCancelarS").style.backgroundColor = "";
                           document.getElementById("cmdImprimirS").style.backgroundColor = "";
                           document.getElementById("cmdAgregarP").style.backgroundColor = "";
                           document.getElementById("cmdModificarP").style.backgroundColor = "";
                           document.getElementById("cmdEliminarP").style.backgroundColor = "";
                           document.getElementById("cmdAceptarP").style.backgroundColor = "";
                           document.getElementById("cmdCancelarP").style.backgroundColor = "";
                           document.getElementById("Button2").style.backgroundColor = "";
                           return false;
                     }';

                    echo 'function LimpiarCampos()
                    {
                          document.getElementById("iFolio").value ="";
                          document.getElementById("f-calendar-field-1").value ="";
                          document.getElementById("f-calendar-field-2").value ="";
                          document.getElementById("sIdTipo").value ="";
                          document.getElementById("sReferencia").value ="";
                          document.getElementById("sOrigen").value ="";
                          document.getElementById("mComentarios").value ="";
                    }';
               }
               function frmAvisosEmbarquesBeforeShow($sender, $params)
               {
                  global $sContrato,$sIdConvenioAct;
                  global $_SESSION,$Usuario,$Clave,$Servidor,$_REQUEST;
                  //orden seleccionada
                  if(isset($_REQUEST['orden']))
                     $_SESSION['orden']=$_REQUEST['orden'];
                  //Conectar a la base de datos
                  $this->data->setConnected(false);
                  $this->data->setDatabaseName($_SESSION['database']);
                  $this->data->setUserName($Usuario);
                  $this->data->setUserPassword($Clave);
                  $this->data->setHost($Servidor);
                  $this->data->setConnected(true);

                  /*cargar combo de las ordenes*/
                  $sql = "select sNumeroOrden from ordenesdetrabajo where sContrato='$sContrato'";
                  $rs = mysql_query($sql);
                  unset($it);
                  $it["CONTRATO NO. $sContrato"]="CONTRATO NO. $sContrato";
                  while($rw = mysql_fetch_array($rs)){
                     $it[$rw['sNumeroOrden']]=$rw['sNumeroOrden'];
                  }
                  $this->sNumeroOrden->setItems($it);
                  /*cargar combo de los tipos de movimientos*/
                  $sql = "SELECT sIdTipo,sDescripcion FROM movimientosdealmacen WHERE sClasificacion='Entrada'";
                  $rs = mysql_query($sql);
                  unset($it);
                  while($rw = mysql_fetch_array($rs)){
                     $it[$rw['sIdTipo']]=$rw['sDescripcion'];
                  }
                  $this->sIdTipo->setItems($it);
                  /*cargar combo de los proveedores*/
                  $sql = "select sIdProveedor,sRazon from proveedores";
                  $rs = mysql_query($sql);
                  unset($it);
                  while($rw = mysql_fetch_array($rs)){
                     $it[$rw['sIdProveedor']]=$rw['sRazon'];
                  }
                  $this->sIdProveedor->setItems($it);
                  /*cargar combo de las partidas*/
                  $sql = "select sNumeroActividad,mDescripcion from actividadesxanexo where sContrato='$sContrato'
                           and sIdConvenio='$sIdConvenioAct' and sTipoActividad='Actividad'";
                  $rs = mysql_query($sql);
                  unset($it);
                  $it["-_-"]="Selecionar Partida";
                  while($rw = mysql_fetch_array($rs)){
                     $it[$rw['sNumeroActividad']]=$rw['sNumeroActividad']." <=> ".$rw['mDescripcion'];
                  }
                  $this->sNumeroActividad->setItems($it);

                  /*Avisos de embarques*/
                  $this->qryAnexo_suministro->setActive(false);
                  $this->qryAnexo_suministro->setFilter("sContrato='$sContrato'
                                                         order by iFolio DESC");
                  $this->qryAnexo_suministro->setActive(true);




               }

                function dCantidadJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCantidadJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCantidadJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

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

               function dCantidadAnexoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCantidadAnexoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCantidadAnexoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sMedidaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sMedidaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sMedidaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sNumeroActividadJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sNumeroActividadJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sNumeroActividadJSBlur($sender, $params)
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

               function sOrigenJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sOrigenJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sOrigenJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdProveedorJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdProveedorJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdProveedorJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sReferenciaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

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

               function sIdTipoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdTipoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdTipoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sNumeroOrdenJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

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

               function iFolioJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iFolioJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iFolioJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }



        }

        global $application;

        global $frmAvisosEmbarques;

        //Creates the form
        $frmAvisosEmbarques=new frmAvisosEmbarques($application);

        //Read from resource file
        $frmAvisosEmbarques->loadResource(__FILE__);

        //Shows the form
        $frmAvisosEmbarques->show();

?>
<script>
deshabilitarAvisos(false);
deshabilitarPartidas(false);
ventana();
if(document.getElementById('hdfPartidas').value=="si"){
   document.getElementById('Panel1_outer').style.display='none';
   document.getElementById('Panel2_outer').style.display='block';
}else{
   document.getElementById('Panel1_outer').style.display='block';
   document.getElementById('Panel2_outer').style.display='none';
}
ResaltarBotones();
LimpiarCampos();
</script>
