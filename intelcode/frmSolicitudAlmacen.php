<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require_once("fnUtilerias.php");
        require_once("mysql.inc.php");
        use_unit("menus.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        $sUsuario=$_SESSION["ssUsuario"];
        //$sContrato='425027849';
        //Class definition
        class frmSolicitudesAlmacen extends Page
        {
               public $HidFoco = null;
               public $HidError = null;
               public $Panel4 = null;
               public $DBGrid1 = null;
               public $hdPestana = null;
               public $cmdCaratula = null;
               public $cmdMateriales = null;
               public $Label9 = null;
               public $hsStatus = null;
               public $hsOperacionInsumo = null;
               public $hsIdInsumo = null;
               public $dbgCatalogo = null;
               public $Panel5 = null;
               public $Label12 = null;
               public $Label11 = null;
               public $ddinsumos1 = null;
               public $dsinsumos1 = null;
               public $tbinsumos1 = null;
               public $dsSolicitadas = null;
               public $qrySolicitadas = null;
               public $tbanexo_psolicitud1 = null;
               public $mDescripcionInsumo = null;
               public $mMensajes = null;
               public $hsOperacion = null;
               public $tbanexo_solicitud1 = null;
               public $hsIdSolicitud = null;
               public $mComentarios = null;
               public $sReferencia = null;
               public $dFechaEntrega = null;
               public $sNumeroOrden = null;
               public $Label6 = null;
               public $cmdCancelarIn = null;
               public $cmdAceptarIn = null;
               public $cmdEliminarIn = null;
               public $cmdModificarIn = null;
               public $cmdAgregarIn = null;
               public $dCantidad = null;
               public $sIdInsumo = null;
               public $Label7 = null;
               public $Label5 = null;
               public $ddanexo_psolicitud1 = null;
               public $dsanexo_psolicitud1 = null;
               public $Panel3 = null;
               public $cmdImprimir = null;
               public $cmdCancelar = null;
               public $cmdAceptar = null;
               public $cmdEliminar = null;
               public $cmdModificar = null;
               public $cmdAgregar = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;
               public $Panel1 = null;
               public $ddanexo_solicitud1 = null;
               public $dsanexo_solicitud1 = null;
               public $dbgeotech1 = null;
               public $Panel2 = null;
               public $Label8 = null;
               function cmdAceptarJSClick($sender, $params)
               {
               ?>   //Add your javascript code here
                     var ref    = document.getElementById('sReferencia').value;
                     var coment = document.getElementById('mComentarios').value;
                     if (ref == '' || coment == '' )
                     {  alert (" Existen Datos en Blanco !");
                        return false;
                     }
                     var Fecha = "f-calendar-field-1";
                     ComponerFecha(Fecha);
                     if (document.getElementById("HidError").value == 0)
                         return true;
                     else
                         return false;
               <?php

               }

               function cmdAceptarInJSClick($sender, $params)
               {

               ?>
                  //Add your javascript code here
                  if(document.getElementById("sIdInsumo").value =="")
                  {  alert(" No ha seleccionado algun insumo !");
                     return false;
                  }
                  else
                  {
                    return true;
                  }
               <?php

               }

               function mComentariosJSFocus($sender, $params)
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

               function sReferenciaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdInsumoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCantidadJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function mDescripcionInsumoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function mDescripcionInsumoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function mDescripcionInsumoJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function mDescripcionInsumoJSBlur($sender, $params)
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

               function dCantidadJSClick($sender, $params)
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

               function sIdInsumoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdInsumoJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdInsumoJSBlur($sender, $params)
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

               function mComentariosJSClick($sender, $params)
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

               <?php

               }

               function sReferenciaJSClick($sender, $params)
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

               <?php

               }

               function sNumeroOrdenJSClick($sender, $params)
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

               function cmdMaterialesJSClick($sender, $params)
               {

               ?>
                  document.getElementById("Panel3_outer").style.display='block';
                  document.getElementById("Panel1_outer").style.display='none';
                  document.getElementById("cmdCaratula").disabled=false;
                  document.getElementById("cmdMateriales").disabled=true;
                  document.getElementById("hdPestana").value="2";
                  deshabilitarSolicitud(true);
                  return false;

               <?php

               }

               function cmdCaratulaJSClick($sender, $params)
               {

               ?>
                  document.getElementById("Panel1_outer").style.display='block';
                  document.getElementById("Panel3_outer").style.display='none';
                  document.getElementById("cmdCaratula").disabled=true;
                  document.getElementById("cmdMateriales").disabled=false;
                  document.getElementById("hdPestana").value="1";
                  return false;
               <?php

               }

               function cmdImprimirJSClick($sender, $params)
               {
               global $sContrato;
               ?>
               //Add your javascript code here
                  ruta = "../reporte.php";
                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                  ruta = ruta + "&sNumeroOrden=" +  document.getElementById("sNumeroOrden").value;
                  ruta = ruta + "&sIdSolicitud=" +  document.getElementById("hsIdSolicitud").value;
                  ruta = ruta + "&nombreReporte=solicitudInsumos";
                  ruta = ruta + "&reportesPath=solicitudes";
                  var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                  return false;

               <?php

               }



               function cmdCancelarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                     deshabilitarSolicitud(true);
                     deshabilitarPSolicitud(true);
                     var fecha="f-calendar-field-1";
                     FechaActual(fecha);
                     return false;
               <?php

               }

               function cmdEliminarInClick($sender, $params)
               {
                  global $sContrato;
                  $sIdSolicitud = $this->hsIdSolicitud->Value;
                  $oldsIdInsumo = $this->hsIdInsumo->Value;

                  $sql =  "delete from anexo_psolicitud
                              where sContrato='$sContrato'
                              and sIdInsumo='$oldsIdInsumo'
                              and sIdSolicitud='$sIdSolicitud'";
                   mysql_query($sql);
                   if(mysql_error()) {
                      $this->mMensajes->Text=mysql_error();
                   }else{
                      $this->mMensajes->Text="";
                   }


               }

               function cmdEliminarInJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                    if(document.getElementById("hsStatus").value == "Autorizado"){
                         alert("no se puede modificar, la solicitud esta autorizada !!");
                        return false;
                     }

                      if(confirm("Realmente desea eliminar el registro seleccionado ?")){
                        return true;
                      }else{
                        return false;
                      }
               <?php

               }

               function cmdAceptarInClick($sender, $params)
               {
                  global $sContrato;
                  $sIdSolicitud = $this->hsIdSolicitud->Value;
                  $oldsIdInsumo = $this->hsIdInsumo->Value;
                  $dCantidad    = $this->dCantidad->getText();
                  $sIdInsumo    = $this->sIdInsumo->getText();
                  $sql = "select
                           *
                         from
                           insumos
                         where
                           sContrato='$sContrato'
                           and sIdInsumo='$sIdInsumo'";
                  $rs = mysql_query($sql);
                  while($rw = mysql_fetch_array($rs)){
                     $mDescripcion = $rw["mDescripcion"];
                     $sMedida      = $rw["sMedida"];
                  }
                  $sql = "select
                           max(iItem) as iItem
                         from
                           anexo_psolicitud
                         where
                           sContrato='$sContrato'";
                  $rs = mysql_query($sql);
                  if($rw = mysql_fetch_array($rs)){
                     $iItem = $rw["iItem"]+1;
                  }
                  if($iItem=="")$iItem=1;
                  if($this->hsOperacionInsumo->Value=="agregar"){
                        $sql = " insert into anexo_psolicitud set
                                    sContrato='$sContrato',
                                    sIdSolicitud='$sIdSolicitud',
                                    sIdInsumo='$sIdInsumo',
                                    iItem='$iItem',
                                    mDescripcion='$mDescripcion',
                                    sMedida='$sMedida',
                                    dCantidad='$dCantidad',
                                    lStatus='Pendiente'";
                   }else if($this->hsOperacionInsumo->Value=="modificar"){
                        $sql = " update anexo_psolicitud set
                                    sIdInsumo='$sIdInsumo',
                                    mDescripcion='$mDescripcion',
                                    sMedida='$sMedida',
                                    dCantidad='$dCantidad'
                                 where
                                    sContrato='$sContrato'
                                    and sIdInsumo='$oldsIdInsumo'
                                    and sIdSolicitud='$sIdSolicitud'";
                   }

                   mysql_query($sql);
                   if(mysql_error()) {
                      $this->mMensajes->Text=mysql_error();
                   }else{
                      $this->mMensajes->Text="";
                   }
                  $this->qrySolicitadas->setActive(false);
                  $this->qrySolicitadas->setFilter(" ap.sContrato='$sContrato' ");
                  $this->qrySolicitadas->setActive(true);


               }

               function cmdCancelarInJSClick($sender, $params)
               {

               ?>
                     deshabilitarSolicitud(true);
                     deshabilitarPSolicitud(true);
                     return false;
               <?php

               }

               function cmdModificarInJSClick($sender, $params)
               {
               ?>
                    if(document.getElementById("hsStatus").value == "Autorizado"){
                         alert("no se puede modificar, la solicitud esta autorizada !!");
                        return false;
                     }
                     document.getElementById("hsOperacionInsumo").value="modificar";
                     deshabilitarSolicitud(true);
                     deshabilitarPSolicitud(false);
                     document.getElementById("sIdInsumo").focus();
                     return false;
               <?php

               }

               function cmdAgregarInJSClick($sender, $params)
               {
               ?>
                     if(document.getElementById("hsStatus").value == "Autorizado"){
                         alert("No se puede modificar la solicitud, esta autorizada !!");
                        return false;
                     }
                     if (document.getElementById('HidFoco').value == '')
                     {  alert (" Primero Haga Clic sobre una Solicitud");
                        return false;
                     }
                     document.getElementById("hsOperacionInsumo").value="agregar";
                     deshabilitarSolicitud(true);
                     deshabilitarPSolicitud(false);
                     document.getElementById("sIdInsumo").focus();
                     return false;
               <?php

               }

               function ddanexo_psolicitud1JSClick($sender, $params)
               {

               ?>
                  ddanexo_psolicitud1.getSelectionModel().iterateSelection
                    (    function(index)
                         {
                           var Tabla = ddanexo_psolicitud1.getTableModel();
                           document.getElementById("hsIdInsumo").value= Tabla.getValue(1, index);
                           document.getElementById("sIdInsumo").value= Tabla.getValue(1, index);
                           document.getElementById("mDescripcionInsumo").value= Tabla.getValue(2, index);
                           document.getElementById("dCantidad").value= Tabla.getValue(4, index);
                         }
                    );
                     return false;


               <?php

               }

               function dbgCatalogoJSDblClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                    document.getElementById("Panel5_outer").style.display = "none";
                    i=dbgCatalogo.getFocusedRow();
                    document.getElementById("sIdInsumo").value          = dbgCatalogo.getTableModel().getValue(0,i);
                    document.getElementById("mDescripcionInsumo").value = dbgCatalogo.getTableModel().getValue(1,i);
                    document.getElementById("dCantidad").value          = dbgCatalogo.getTableModel().getValue(2,i);
                 return false;
               <?php

               }

               function sIdInsumoJSKeyUp($sender, $params)
               {

               ?>
               //Add your javascript code here
                 if (event.keyCode == 27)
                 {   document.getElementById("Panel5_outer").style.display = "none";
                     return false;
                 }
                  MuestraCatalogo(document.getElementById("sIdInsumo").value);
                  document.getElementById("Panel5_outer").style.display = "block";
                  return false;
               <?php

               }


               function frmSolicitudesAlmacenShow($sender, $params)
               {
                  global $sContrato;
                  $this->psolicitud();

                  $this->tbinsumos1->setActive(false);
                  $this->tbinsumos1->setFilter(" sContrato='$sContrato' ");
                  $this->tbinsumos1->setActive(true);

                  $this->qrySolicitadas->setActive(false);
                  $this->qrySolicitadas->setFilter(" ap.sContrato='$sContrato' ");
                  $this->qrySolicitadas->setActive(true);

                  $this->tbanexo_psolicitud1->setActive(false);
                  $this->tbanexo_psolicitud1->setActive(true);

                  $this->tbanexo_solicitud1->setActive(false);
                  $this->tbanexo_solicitud1->setActive(true);
               }

               function cmdEliminarClick($sender, $params)
               {
                  global $sContrato;
                  $sIdSolicitud  = $this->hsIdSolicitud->Value;

                  $sql = "select sIdSolicitud from anexo_psolicitud where sContrato='$sContrato'
                           and sIdSolicitud ='$sIdSolicitud'";
                  $rs = mysql_query($sql);
                  $existe=false;
                  if($row = mysql_fetch_array($rs)){
                     $existe = true;
                  }
                  if($existe){
                     ?>
                     <script>
                        alert("No se puede eliminar el registro ya que tiene referencias relacionadas !");
                     </script>
                     <?php
                  }else{
                     mysql_query("delete from anexo_solicitud where sContrato='$sContrato' and sIdSolicitud='$sIdSolicitud'");
                     if(mysql_error()) {
                        $this->mMensajes->Text=mysql_error();
                     }
                     else{
                        $this->mMensajes->Text="";
                     }
                  }



               }

               function cmdEliminarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  if(document.getElementById("hsStatus").value != "Pendiente"){
                     alert("no se puede modificar, no esta en estatus PENDIENTE !!");
                     return false;
                  }

                  if(confirm("realmente desea eliminar el registro seleccionado ? "))
                     return true;
                  else
                     return false;
               <?php

               }



               function cmdAceptarClick($sender, $params)
               {
                  global $sContrato,$sUsuario;

                  /*get the values*/
                  $sOperacion    = $this->hsOperacion->Value;

                  $sIdSolicitud  = $this->hsIdSolicitud->Value;
                  $sNumeroOrden  = $this->sNumeroOrden->getItemIndex();
                  $sReferencia   = $this->sReferencia->getText();
                  $mComentarios  = $this->mComentarios->Text;
                  $dFechaEntrega = $this->dFechaEntrega->getText();

                  /*get the Id*/
                  $sql =  "select max(sIdSolicitud) as IdSolicitud from anexo_solicitud where sContrato='$sContrato'";
                  $rs = mysql_query($sql);
                  if($row = mysql_fetch_array($rs)){
                     $idSolicitud = $row["IdSolicitud"] + 1;
                  }
                  if($idSolicitud=="")
                     $idSolicitud = 1;

                  /*do it*/
                  if($sOperacion == "agregar"){
                     $sql = "
                        insert into anexo_solicitud set
                           sIdSolicitud=$idSolicitud,
                           sContrato='$sContrato',
                           sNumeroOrden='$sNumeroOrden',
                           dFechaSolicitud='".date("Y-m-d")."',
                           sReferencia='$sReferencia',
                           mComentarios='$mComentarios',
                           lStatus='Pendiente',
                           dFechaEntrega='$dFechaEntrega',
                           sIdUsuarioAutoriza='',
                           sIdUsuarioCreador='$sUsuario',
                           lStatusEntrega='Pendiente'      ";
                     mysql_query($sql);
                     if(mysql_error()) {
                        $this->mMensajes->Text=mysql_error();
                     }
                     else{
                        $this->mMensajes->Text="";
                     }
                  }else if ($sOperacion == "modificar"){
                       $sql = "
                        update anexo_solicitud set
                           sNumeroOrden='$sNumeroOrden',
                           sReferencia='$sReferencia',
                           mComentarios='$mComentarios',
                           dFechaEntrega='$dFechaEntrega'
                        where
                           sContrato='$sContrato'
                           and sIdSolicitud='$sIdSolicitud' ";
                     mysql_query($sql);
                     if(mysql_error()) {
                        $this->mMensajes->Text=mysql_error();
                     }
                     else{
                        $this->mMensajes->Text="";
                     }
                  }

                  $this->llenarSolicitud();
               }

               function cmdModificarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                     if(document.getElementById("hsStatus").value != "Pendiente"){
                        alert("no se puede modificar, no esta en estatus PENDIENTE !!");
                        return false;
                     }
                     document.getElementById("Panel1_outer").style.display='block';
                     document.getElementById("Panel3_outer").style.display='none';
                     document.getElementById("cmdCaratula").disabled=true;
                     document.getElementById("cmdMateriales").disabled=false;
                     document.getElementById("hdPestana").value="1";
                     document.getElementById("hsOperacion").value="modificar";
                     deshabilitarSolicitud(false);
                     deshabilitarPSolicitud(true);
                     return false;
               <?php

               }

               function cmdAgregarJSClick($sender, $params)
               {
               ?>
               //Add your javascript code here

                     document.getElementById('sReferencia').value  = '';
                     document.getElementById('mComentarios').value = '';
                     document.getElementById("Panel1_outer").style.display='block';
                     document.getElementById("Panel3_outer").style.display='none';
                     document.getElementById("cmdCaratula").disabled=true;
                     document.getElementById("cmdMateriales").disabled=false;
                     document.getElementById("hdPestana").value="1";
                     document.getElementById("hsOperacion").value="agregar";
                     deshabilitarSolicitud(false);
                     deshabilitarPSolicitud(true);
                     var fecha="f-calendar-field-1";
                     FechaActual(fecha);
                     return false;
               <?php

               }

               function ddanexo_solicitud1JSClick($sender, $params)
               {

               ?>
                  ddanexo_solicitud1.getSelectionModel().iterateSelection
                    (    function(index)
                         {
                           var Tabla = ddanexo_solicitud1.getTableModel();

                           document.getElementById("hsIdSolicitud").value= Tabla.getValue(0, index);
                           document.getElementById("sNumeroOrden").value= Tabla.getValue(1, index);
                           document.getElementById("f-calendar-field-1").value= Tabla.getValue(3, index);
                           document.getElementById("sReferencia").value= Tabla.getValue(4, index);
                           document.getElementById("mComentarios").value= Tabla.getValue(5, index);
                           document.getElementById("hsStatus").value= Tabla.getValue(6, index);
                           document.getElementById('HidFoco').value = index;

                           var totalFilas = DBGrid1.getTableModel().getRowCount();
                           var _rowData = [];
                           _rowData.push(["","","","","",""]);
                           var _oData = rowData;
                           ddanexo_psolicitud1.getTableModel().originalData=_oData;
                           ddanexo_psolicitud1.getTableModel().setData(_rowData);

                           var rowData = [];
                           for (i=0;i<totalFilas;i++)
                           {
                               palabra= DBGrid1.getTableModel().getValue(0,i);
                               if (palabra==document.getElementById("hsIdSolicitud").value)
                               {
                                  var sIdSolicitud =  DBGrid1.getTableModel().getValue(0,i);
                                  var sIdInsumo    =  DBGrid1.getTableModel().getValue(1,i);
                                  var mDescripcion =  DBGrid1.getTableModel().getValue(2,i);
                                  var sMedida      =  DBGrid1.getTableModel().getValue(3,i);
                                  var dCantidad    =  DBGrid1.getTableModel().getValue(4,i);
                                  var lStatus      =  DBGrid1.getTableModel().getValue(5,i);
                                  rowData.push([sIdSolicitud,sIdInsumo,mDescripcion,sMedida,dCantidad,lStatus]);
                               }

                           }
                          var oData = rowData;
                          ddanexo_psolicitud1.getTableModel().originalData=oData;
                          ddanexo_psolicitud1.getTableModel().setData(rowData);




                        }
                     );
                     return false;

               <?php

               }
               function psolicitud($sender="",$params=""){
                  global $sContrato;
                  $sIdSolicitud = $this->hsIdSolicitud->Value;

                  $this->tbanexo_psolicitud1->setActive(false);
                  //$this->tbanexo_psolicitud1->setSQL("select * from anexo_psolicitud where sContrato='$sContrato' and sIdSolicitud='$sIdSolicitud'");
                  $this->tbanexo_psolicitud1->setSQL("select
                  '' as a,
                   '' as b,
                    '' as c,
                     '' as d,
                      '' as e");
                  $this->tbanexo_psolicitud1->setActive(true);


               }
               function llenarSolicitud(){
                  global $sContrato;
                  $this->tbanexo_solicitud1->setActive(false);
                  $this->tbanexo_solicitud1->setSQL("select
                        sIdSolicitud,
                        sContrato,
                        sNumeroOrden,
                        date_format(dFechaSolicitud,'%d/%m/%Y') as dFechaSolicitud,
                        sReferencia,
                        mComentarios,
                        lStatus,
                        date_format(dFechaEntrega,'%d/%m/%Y') as dFechaEntrega,
                        sIdUsuarioAutoriza,
                        sIdUsuarioCreador,
                        lStatusEntrega
                     from
                         anexo_solicitud
                     where sContrato='$sContrato'
                     order by sIdSolicitud DESC");
                  $this->tbanexo_solicitud1->setActive(true);
               }
               function frmSolicitudesAlmacenBeforeShow($sender, $params)
               {
                  global $sContrato;
                  global $_SESSION,$Usuario,$Clave,$Servidor;

                  $this->dbgeotech1->setConnected(false);
                  $this->dbgeotech1->setDatabaseName($_SESSION['database']);
                  $this->dbgeotech1->setUserName($Usuario);
                  $this->dbgeotech1->setUserPassword($Clave);
                  $this->dbgeotech1->setHost($Servidor);
                  $this->dbgeotech1->setConnected(true);

                  $this->llenarSolicitud();
                  $sql = "select sNumeroOrden from ordenesdetrabajo where sContrato='$sContrato'";
                  $rs = mysql_query($sql);
                  unset($it);
                  while($rw = mysql_fetch_array($rs)){
                     $it[$rw["sNumeroOrden"]]=$rw["sNumeroOrden"];
                  }
                  $this->sNumeroOrden->setItems($it);


                  if($this->dFechaEntrega->Text == "")
                     $this->dFechaEntrega->Text = date("d/m/Y");


               }

               function dumpJavascript(){
                  echo "function deshabilitarSolicitud(val){
                           document.getElementById('cmdAgregar').disabled=!val;
                           document.getElementById('cmdModificar').disabled=!val;
                           document.getElementById('cmdEliminar').disabled=!val;
                           document.getElementById('cmdAceptar').disabled=val;
                           document.getElementById('cmdCancelar').disabled=val;
                           document.getElementById('cmdImprimir').disabled=!val;

                           document.getElementById('sNumeroOrden').disabled=val;
                           document.getElementById('sReferencia').disabled=val;
                           document.getElementById('mComentarios').disabled=val;
                           document.getElementById('f-calendar-field-1').disabled=val;
                       }";

                  echo "function deshabilitarPSolicitud(val){
                           document.getElementById('cmdAgregarIn').disabled=!val;
                           document.getElementById('cmdModificarIn').disabled=!val;
                           document.getElementById('cmdEliminarIn').disabled=!val;
                           document.getElementById('cmdAceptarIn').disabled=val;
                           document.getElementById('cmdCancelarIn').disabled=val;

                           document.getElementById('sIdInsumo').disabled=val;
                           document.getElementById('dCantidad').disabled=val;
                           document.getElementById('mDescripcionInsumo').disabled=val;

                     }";
                  echo 'function MuestraCatalogo(letras)
                       {
                           var total = letras.length;
                           var totalFilas = ddinsumos1.getTableModel().getRowCount();
                           var _rowData = [];
                           _rowData.push(["","",""]);
                           var _oData = rowData;
                           dbgCatalogo.getTableModel().originalData=_oData;
                           dbgCatalogo.getTableModel().setData(_rowData);

                           var rowData = [];
                           for (i=0;i<totalFilas ;i++)
                           {
                               palabra= ddinsumos1.getTableModel().getValue(3,i);

                               if (palabra.match(letras.toUpperCase()) != null)
                               {
                                  var sIdInsumo    = ddinsumos1.getTableModel().getValue(1,i);
                                  var mDescripcion = ddinsumos1.getTableModel().getValue(3,i);
                                  var dExistencias = ddinsumos1.getTableModel().getValue(17,i);

                                  rowData.push([sIdInsumo,mDescripcion,dExistencias]);
                               }

                           }


                           var oData = rowData;
                           dbgCatalogo.getTableModel().originalData=oData;
                           dbgCatalogo.getTableModel().setData(rowData);

                           return false;
                       }';

                      echo 'function ResaltarBotones()
                      {
                           document.getElementById("cmdAgregar").style.backgroundColor = "";
                           document.getElementById("cmdModificar").style.backgroundColor = "";
                           document.getElementById("cmdEliminar").style.backgroundColor = "";
                           document.getElementById("cmdAceptar").style.backgroundColor = "";
                           document.getElementById("cmdCancelar").style.backgroundColor = "";
                           document.getElementById("cmdImprimir").style.backgroundColor = "";
                           document.getElementById("cmdCaratula").style.backgroundColor = "";
                           document.getElementById("cmdMateriales").style.backgroundColor = "";
                           document.getElementById("cmdAgregarIn").style.backgroundColor = "";
                           document.getElementById("cmdModificarIn").style.backgroundColor = "";
                           document.getElementById("cmdEliminarIn").style.backgroundColor = "";
                           document.getElementById("cmdAceptarIn").style.backgroundColor = "";
                           document.getElementById("cmdCancelarIn").style.backgroundColor = "";
                           return false;
                     }';


                     echo 'function Despliega()
                     {
                           var totalFilas = DBGrid1.getTableModel().getRowCount();
                           var _rowData = [];
                           _rowData.push(["","","","","",""]);
                           var _oData = rowData;
                           ddanexo_psolicitud1.getTableModel().originalData=_oData;
                           ddanexo_psolicitud1.getTableModel().setData(_rowData);

                           var rowData = [];
                           for (i=0;i<totalFilas;i++)
                           {
                               palabra= DBGrid1.getTableModel().getValue(0,i);
                               if (palabra==document.getElementById("hsIdSolicitud").value)
                               {
                                  var sIdSolicitud =  DBGrid1.getTableModel().getValue(0,i);
                                  var sIdInsumo    =  DBGrid1.getTableModel().getValue(1,i);
                                  var mDescripcion =  DBGrid1.getTableModel().getValue(2,i);
                                  var sMedida      =  DBGrid1.getTableModel().getValue(3,i);
                                  var dCantidad    =  DBGrid1.getTableModel().getValue(4,i);
                                  var lStatus      =  DBGrid1.getTableModel().getValue(5,i);
                                  rowData.push([sIdSolicitud,sIdInsumo,mDescripcion,sMedida,dCantidad,lStatus]);
                               }

                           }
                          var oData = rowData;
                          ddanexo_psolicitud1.getTableModel().originalData=oData;
                          ddanexo_psolicitud1.getTableModel().setData(rowData);

                     }';

                      echo 'function ComponerFecha(OFecha)
                     {     FechaFI       = document.getElementById(OFecha).value;
                           var SeparaFI  = FechaFI.split("/");
                           var diaFI     = SeparaFI[0];
                           var mesFI     = SeparaFI[1];
                           var anioFI    = SeparaFI[2];
                           var ErrorFecha= 0;
                           var ErrorRango  = 0;
                           document.getElementById("HidError").value = 0;

                           //Determinamos si la fecha es mayor a la solicitada
                           var fechaActual = new Date();
                           var diaActual   = fechaActual.getDate();
                           var mesActual   = fechaActual.getMonth()+1;
                           var anioActual  = fechaActual.getFullYear();

                           if (diaFI < diaActual && mesFI == mesActual && anioFI == anioActual)
                               ErrorRango = 1;
                           else
                               if ( mesFI < mesActual && anioFI == anioActual)
                                    ErrorRango = 1;
                               else
                                   if (anioFI < anioActual)
                                       ErrorRango = 1;

                           if (ErrorRango == 1)
                           {  alert("La Fecha de Entrega es Menor a la Fecha de Solicitud ! ");
                              document.getElementById("HidError").value = 1;
                              return false;
                           }
                           if (mesFI>12 || diaFI>31)
                               ErrorFecha=1;
                           if (ErrorFecha==1)
                           {  alert("La FECHA esta Fuera de los LIMITES!!!");
                              document.getElementById("HidError").value = 1;
                              return false;
                           }
                           if (ErrorFecha==0)
                           {
                              //Invertir la fecha para ser guardada por año -mes- dia
                              var auxFI=SeparaFI[2];
                              SeparaFI[2]=SeparaFI[0];
                              SeparaFI[0]=auxFI;
                              var JuntaFI=SeparaFI[0]+"-"+SeparaFI[1]+"-"+SeparaFI[2];
                              document.getElementById(OFecha).value = JuntaFI;
                           }
                           return false;
                      }';

                     echo 'function FechaActual(ObjetoFecha){
                           var fechaActual = new Date();
                           var diaActual   = fechaActual.getDate();
                           var mesActual   = fechaActual.getMonth()+1;
                           var anioActual  = fechaActual.getFullYear();
                           if (diaActual<10)
                              diaActual= "0"+diaActual;
                           if (mesActual<10)
                              mesActual= "0"+mesActual;
                           var LaFecha=diaActual+"/"+mesActual+"/"+anioActual;
                           document.getElementById(ObjetoFecha).value=LaFecha;
                           return false;
                     }';
               }

        }

        global $application;

        global $frmSolicitudesAlmacen;

        //Creates the form
        $frmSolicitudesAlmacen=new frmSolicitudesAlmacen($application);

        //Read from resource file
        $frmSolicitudesAlmacen->loadResource(__FILE__);

        //Shows the form
        $frmSolicitudesAlmacen->show();

?>
<script>
deshabilitarSolicitud(true);
deshabilitarPSolicitud(true);
var fecha="f-calendar-field-1";
FechaActual(fecha);
document.getElementById("Panel5_outer").style.display = "none";

if (document.getElementById("hdPestana").value==2){
   document.getElementById("Panel3_outer").style.display='block';
   document.getElementById("Panel1_outer").style.display='none';
   document.getElementById("cmdCaratula").disabled=false;
   document.getElementById("cmdMateriales").disabled=true;

}else{

   document.getElementById("Panel3_outer").style.display='none';
   document.getElementById("Panel1_outer").style.display='block';
   document.getElementById("cmdCaratula").disabled=true;
   document.getElementById("cmdMateriales").disabled=false;

}
ResaltarBotones();
Despliega();
document.getElementById('sIdInsumo').value ="";
document.getElementById('dCantidad').value ="";
document.getElementById('mDescripcionInsumo').value = "";
document.getElementById('sReferencia').value = "";
document.getElementById('mComentarios').value = "";
</script>
