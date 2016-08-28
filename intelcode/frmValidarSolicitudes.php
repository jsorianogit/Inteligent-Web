<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require_once("mysql.inc.php");
        require "fnEnviarCorreo.php";
        use_unit("dbgrids.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        //$sContrato='425027849';
        $sIdUsuario=$_SESSION["ssUsuario"];//'adal2404';
        //Class definition
        class frmValidarSolicitudes extends Page
        {
               public $cmdOC = null;
               public $cmdRequisiciones = null;
               public $cmdSolicitudes = null;
               public $cmdRecargar = null;
               public $cmdImprimeCompra = null;
               public $cmdAutorizaCompra = null;
               public $cmdRevAdmin = null;
               public $cmdRevCompra = null;
               public $cmdImprimirRequisicion = null;
               public $cmdAutorizaRequisicion = null;
               public $cmdRecibirRequisicion = null;
               public $cmdVerificar = null;
               public $cmdImprimirSolicitud = null;
               public $Memo1 = null;
               public $cmdAutorizarSolicitud = null;
               public $dbgSolicitud = null;
               public $dsPedidos = null;
               public $tablePedidos = null;
               public $dsRequisicion = null;
               public $tableRequisicion = null;
               public $dsSolicitud = null;
               public $database = null;
               public $tableSolicitud = null;
               public $ddanexo_pedidos1 = null;
               public $ddanexo_requisicion1 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;
               public $Panel3 = null;
               public $Panel2 = null;
               public $Panel1 = null;
               function cmdOCJSClick($sender, $params)
               {

               ?>
                  document.getElementById("Panel1_outer").style.display='none';
                  document.getElementById("Panel2_outer").style.display='none';
                  document.getElementById("Panel3_outer").style.display='block';
                  document.getElementById("cmdSolicitudes").disabled=false;
                  document.getElementById("cmdRequisiciones").disabled=false;
                  document.getElementById("cmdOC").disabled=true;
                  return false;

               <?php

               }

               function cmdRequisicionesJSClick($sender, $params)
               {

               ?>
                  document.getElementById("Panel1_outer").style.display='none';
                  document.getElementById("Panel2_outer").style.display='block';
                  document.getElementById("Panel3_outer").style.display='none';
                  document.getElementById("cmdSolicitudes").disabled=false;
                  document.getElementById("cmdRequisiciones").disabled=true;
                  document.getElementById("cmdOC").disabled=false;
                  return false;

               <?php

               }

               function cmdSolicitudesJSClick($sender, $params)
               {

               ?>
                  document.getElementById("Panel1_outer").style.display='block';
                  document.getElementById("Panel2_outer").style.display='none';
                  document.getElementById("Panel3_outer").style.display='none';
                  document.getElementById("cmdSolicitudes").disabled=true;
                  document.getElementById("cmdRequisiciones").disabled=false;
                  document.getElementById("cmdOC").disabled=false;
                  return false;

               <?php

               }

               function cmdRecargarClick($sender, $params)
               {
                  global $sContrato,$sIdUsuario;


                  $this->tableSolicitud->setActive(false);
                  $this->tableSolicitud->setFilter(" sContrato='$sContrato' and lStatus='Pendiente' ");
                  $this->tableSolicitud->setActive(true);

                  $this->tableRequisicion->setActive(false);
                  $this->tableRequisicion->setFilter(" sContrato='$sContrato' and lStatus<>'Autorizado' ");
                  $this->tableRequisicion->setActive(true);

                  $this->tablePedidos->setActive(false);
                  $this->tablePedidos->setFilter(" sContrato='$sContrato' and sStatus<>'Autorizado'");
                  $this->tablePedidos->setActive(true);


               }



               function frmValidarSolicitudesBeforeShow($sender, $params)
               {
                  global $_SESSION,$Usuario,$Clave,$Servidor;


                  $this->database->setConnected(false);
                  $this->database->setDatabaseName($_SESSION['database']);
                  $this->database->setUserName($Usuario);
                  $this->database->setUserPassword($Clave);
                  $this->database->setHost($Servidor);
                  $this->database->setConnected(true);


               }

               ####################### ORDENES DE COMPRA
               function cmdImprimeCompraJSClick($sender, $params)
               {
               global $sContrato;
               ?>
                 ok=0;
                  ddanexo_pedidos1.getSelectionModel().iterateSelection
                  (    function(index)
                       {
                           //obtenemos los datos del grid Compras
                           var Tabla = ddanexo_pedidos1.getTableModel();
                           var sFolio = Tabla.getValue(0, index);
                           var sRequisicion = Tabla.getValue(1, index);
                           ruta = "../reporte.php";
                           ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                           ruta = ruta + "&iFolioRequisicion=" +  sRequisicion;
                           ruta = ruta + "&iFolioPedido=" + sFolio;
                           ruta = ruta + "&nombreReporte=ordendecompra";
                           ruta = ruta + "&reportesPath=ordenDeCompra";
                           var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                           ok=1;
                      }
                  );
                  if (ok==0)
                      alert (" Haga Click sobre una Orden de Compra !!! ");
                  return false;
               <?php
               }


               function cmdAutorizaCompraJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here

                  ddanexo_pedidos1.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = ddanexo_pedidos1.getTableModel();

                        var sIdPedido      = tableModel.getValue(0, index);
                        var sIdRequisicion = tableModel.getValue(1, index);
                        var sNumeroOrden   = tableModel.getValue(2, index);


                        if(sIdPedido != "")params = sIdPedido+ "]"; else params="_]";
                        if(sIdRequisicion != "")params = params + sIdRequisicion + "]"; else params = params + "_]";
                        if(sNumeroOrden != "")params = params + sNumeroOrden + "]"; else params = params + "_]";
                        //xajax.doneLoadingFunction=recargar;
                        document.getElementById("cmdAutorizaCompra").value="Espere..."
                        document.getElementById("cmdAutorizaCompra").disabled=true;
                        <?php
                        echo $this->cmdAutorizaCompra->ajaxCall("fnAutorizaCompra",array(),array("cmdAutorizaCompra","ddanexo_pedidos1","Memo1"));
                        ?>
                        return false;
                     }

                  );

                 return false;

               <?php

               }
               function fnAutorizaCompra($sender="", $params=""){
                  #obtiene los datos necesarios
                  global $sContrato,$sIdUsuario;

                  $parametros = explode("]",$params);

                  $iFolioPedido = ($parametros[0]=="_")?"":$parametros[0];
                  $iFolioRequisicion = ($parametros[1]=="_")?"":$parametros[1];
                  $sNumeroOrden = ($parametros[2]=="_")?"":$parametros[2];
                  $sendMail=false;
                  $sql ="select sStatus from anexo_pedidos
                     where sContrato='$sContrato'
                     and iFolioRequisicion='$iFolioRequisicion'
                     and iFolioPedido='$iFolioPedido'
                     and sNumeroOrden='$sNumeroOrden'";
                  $rs = mysql_query($sql);
                  if(mysql_error()){
                        $this->Memo1->Text=mysql_error();
                  }else{
                        $this->Memo1->Text="";
                  }
                  if($rw = mysql_fetch_array($rs)){
                     $lStatus               = $rw["sStatus"];
                  }

                  if($lStatus == "Revisado"){
                       $sql = "update
                                   anexo_pedidos
                               set
                                   sStatus='Autorizado'
                               where sContrato='$sContrato'
                                   and iFolioRequisicion='$iFolioRequisicion'
                                   and iFolioPedido='$iFolioPedido'
                                   and sNumeroOrden='$sNumeroOrden'";
                           mysql_query($sql);
                           if(mysql_error()){
                            $this->Memo1->Text=mysql_error();
                           }else{
                              $this->Memo1->Text="";
                              $sendMail=true;
                              $this->kardex("Cambio de Status de Autorizado a Revisado de la Orden de Compra No $iFolioPedido");
                           }
               }else{
                 $this->Memo1->Text="La Orden de Compra Aun no ha sido Revisada!!";
               }

                  $this->tablePedidos->setActive(false);
                  $this->tablePedidos->setFilter(" sContrato='$sContrato' and sStatus<>'Autorizado'");
                  $this->tablePedidos->setActive(true);
                  if($sendMail){
                    $sqlMail = "select
                                       u.sNombre,
                                       u.sMail
                                   from usuarios u
                                      inner join
                                   contratosxusuario cu
                                   on (cu.sContrato='$sContrato'
                                   and u.sMail<>''
                                   and cu.sIdUsuario=u.sIdUsuario)";
                    $rs = mysql_query($sqlMail);
                    while($rw = mysql_fetch_array($rs)){
                     if($rw["sMail"] !="" ){
                        if($rw["sNombre"]=="")$rw["sNombre"]=" Usuario de Intelcode ";
                           $msg=$rw["sNombre"]."<br>
                                      Le avisamos que existe una Orden de Compra marcada como 'Autorizada' registrada en el sistema.<br><br>

                                          No. Orden de Compra : $iFolioPedido<br>
                                          No. de Orden        : $sNumeroOrden<br>
                                          Contrato            : $sContrato<br><br>

                                      Por favor no responda este mensaje.
                                    ";
                           $Subject="$sContrato, Orden de Compra";
                           enviarCorreo($rw["sMail"],$msg,$Subject,$mail = new phpmailer() );
                          }
                    }
                  }

               }
               function cmdRevAdminJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here

                  ddanexo_pedidos1.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = ddanexo_pedidos1.getTableModel();

                        var sIdPedido      = tableModel.getValue(0, index);
                        var sIdRequisicion = tableModel.getValue(1, index);
                        var sNumeroOrden   = tableModel.getValue(2, index);


                        if(sIdPedido != "")params = sIdPedido+ "]"; else params="_]";
                        if(sIdRequisicion != "")params = params + sIdRequisicion + "]"; else params = params + "_]";
                        if(sNumeroOrden != "")params = params + sNumeroOrden + "]"; else params = params + "_]";
                        //xajax.doneLoadingFunction=recargar;
                        document.getElementById("cmdRevAdmin").value="Espere..."
                        document.getElementById("cmdRevAdmin").disabled=true;
                        <?php
                        echo $this->cmdRevCompra->ajaxCall("fnRevisaCompraAdmin",array(),array("cmdRevAdmin","ddanexo_pedidos1","Memo1"));
                        ?>
                        return false;
                     }

                  );

                 return false;

               <?php

               }
               function fnRevisaCompraAdmin($sender="", $params=""){
                  #obtiene los datos necesarios
                  global $sContrato,$sIdUsuario;

                  $parametros = explode("]",$params);

                  $iFolioPedido = ($parametros[0]=="_")?"":$parametros[0];
                  $iFolioRequisicion = ($parametros[1]=="_")?"":$parametros[1];
                  $sNumeroOrden = ($parametros[2]=="_")?"":$parametros[2];
                  $sendMail=false;
                  $sql ="select sStatus,sIdUsuarioRevisaOper,sIdUsuarioRevisaAdmin from anexo_pedidos
                     where sContrato='$sContrato'
                     and iFolioRequisicion='$iFolioRequisicion'
                     and iFolioPedido='$iFolioPedido'
                     and sNumeroOrden='$sNumeroOrden'";
                  $rs = mysql_query($sql);
                  if(mysql_error()){
                        $this->Memo1->Text=mysql_error();
                  }else{
                        $this->Memo1->Text="";
                  }
                  if($rw = mysql_fetch_array($rs)){
                     $lStatus               = $rw["sStatus"];
                     $sIdUsuarioRevisaOper  = $rw["sIdUsuarioRevisaOper"];
                     $sIdUsuarioRevisaAdmin = $rw["sIdUsuarioRevisaAdmin"];
                  }

                  if($lStatus == "Pendiente"){
                     if($sIdUsuarioRevisaAdmin!="" ){
                        $this->Memo1->Text="Ya estaba Verificado por el Coordinador Administrativo!!";
                     }else{
                        if($sIdUsuarioRevisaOper!=""){
                           $sql = "update
                                     anexo_pedidos
                                   set
                                       sStatus='Revisado'
                                     where sContrato='$sContrato'
                                       and iFolioRequisicion='$iFolioRequisicion'
                                       and iFolioPedido='$iFolioPedido'
                                       and sNumeroOrden='$sNumeroOrden'";
                           mysql_query($sql);
                           if(mysql_error()){
                            $this->Memo1->Text=mysql_error();
                           }else{
                              $this->Memo1->Text="";
                              $this->kardex("Cambio de Status de Pendiente a Revisado de la Orden de Compra No $iFolioPedido");
                           }
                        }
                        $sql = "update
                                  anexo_pedidos
                               set
                                sIdUsuarioRevisaAdmin='$sIdUsuario'
                               where sContrato='$sContrato'
                                 and iFolioPedido='$iFolioPedido'
                                 and iFolioRequisicion='$iFolioRequisicion'
                                 and sNumeroOrden='$sNumeroOrden'";
                        mysql_query($sql);
                        if(mysql_error()){
                         $this->Memo1->Text=mysql_error();
                        }else{
                           $this->Memo1->Text="";
                           $sendMail=true;
                        }
                   }
               }else{
                 $this->Memo1->Text="La Orden de Compra esta en Status Revisado !!";
               }

                  $this->tablePedidos->setActive(false);
                  $this->tablePedidos->setFilter(" sContrato='$sContrato' and sStatus<>'Autorizado'");
                  $this->tablePedidos->setActive(true);
                  if($sendMail){
                    $sqlMail = "select
                                       u.sNombre,
                                       u.sMail
                                   from usuarios u
                                      inner join
                                   contratosxusuario cu
                                   on (cu.sContrato='$sContrato'
                                   and u.sMail<>''
                                   and cu.sIdUsuario=u.sIdUsuario)";
                    $rs = mysql_query($sqlMail);
                    while($rw = mysql_fetch_array($rs)){
                     if($rw["sMail"] !="" ){
                        if($rw["sNombre"]=="")$rw["sNombre"]=" Usuario de Intelcode ";
                           $msg=$rw["sNombre"]."<br>
                                      Le avisamos que existe una Orden de Compra marcada como 'Revisada' por parte del Coordinador Administrativo registrada en el sistema.<br><br>

                                          No. Orden de Compra : $iFolioPedido<br>
                                          No. de Orden        : $sNumeroOrden<br>
                                          Contrato            : $sContrato<br><br>

                                      Por favor no responda este mensaje.
                                    ";
                           $Subject="$sContrato, Orden de Compra";
                           enviarCorreo($rw["sMail"],$msg,$Subject,$mail = new phpmailer() );
                          }
                    }
                  }

               }
               function cmdRevCompraJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here

                  ddanexo_pedidos1.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = ddanexo_pedidos1.getTableModel();

                        var sIdPedido      = tableModel.getValue(0, index);
                        var sIdRequisicion = tableModel.getValue(1, index);
                        var sNumeroOrden   = tableModel.getValue(2, index);


                        if(sIdPedido != "")params = sIdPedido+ "]"; else params="_]";
                        if(sIdRequisicion != "")params = params + sIdRequisicion + "]"; else params = params + "_]";
                        if(sNumeroOrden != "")params = params + sNumeroOrden + "]"; else params = params + "_]";
                        //xajax.doneLoadingFunction=recargar;
                        document.getElementById("cmdRevCompra").value="Espere..."
                        document.getElementById("cmdRevCompra").disabled=true;
                        <?php
                        echo $this->cmdRevCompra->ajaxCall("fnRevisaCompra",array(),array("cmdRevCompra","ddanexo_pedidos1","Memo1"));
                        ?>
                        return false;
                     }

                  );

                 return false;

               <?php

               }
               function fnRevisaCompra($sender="", $params=""){

                  #obtiene los datos necesarios
                  global $sContrato,$sIdUsuario;

                  $parametros = explode("]",$params);

                  $iFolioPedido = ($parametros[0]=="_")?"":$parametros[0];
                  $iFolioRequisicion = ($parametros[1]=="_")?"":$parametros[1];
                  $sNumeroOrden = ($parametros[2]=="_")?"":$parametros[2];
                  $sendMail=false;
                  $sql ="select sStatus,sIdUsuarioRevisaOper,sIdUsuarioRevisaAdmin from anexo_pedidos
                     where sContrato='$sContrato'
                     and iFolioRequisicion='$iFolioRequisicion'
                     and iFolioPedido='$iFolioPedido'
                     and sNumeroOrden='$sNumeroOrden'";
                  $rs = mysql_query($sql);
                  if(mysql_error()){
                        $this->Memo1->Text=mysql_error();
                  }else{
                        $this->Memo1->Text="";
                  }
                  if($rw = mysql_fetch_array($rs)){
                     $lStatus               = $rw["sStatus"];
                     $sIdUsuarioRevisaOper  = $rw["sIdUsuarioRevisaOper"];
                     $sIdUsuarioRevisaAdmin = $rw["sIdUsuarioRevisaAdmin"];
                  }

                  if($lStatus == "Pendiente"){
                     if($sIdUsuarioRevisaOper!="" ){
                        $this->Memo1->Text="Ya estaba Verificado por la Gerencia de Operaciones!!";
                     }else{
                        if($sIdUsuarioRevisaAdmin!=""){
                           $sql = "update
                                     anexo_pedidos
                                   set
                                       sStatus='Revisado'
                                     where sContrato='$sContrato'
                                       and iFolioRequisicion='$iFolioRequisicion'
                                       and iFolioPedido='$iFolioPedido'
                                       and sNumeroOrden='$sNumeroOrden'";
                           mysql_query($sql);
                           if(mysql_error()){
                            $this->Memo1->Text=mysql_error();
                           }else{
                              $this->Memo1->Text="";
                              $this->kardex("Cambio de Status de Pendiente a Revisado de la Orden de Compra No $iFolioPedido");
                           }
                        }
                        $sql = "update
                                  anexo_pedidos
                               set
                                sIdUsuarioRevisaOper='$sIdUsuario'
                               where sContrato='$sContrato'
                                 and iFolioPedido='$iFolioPedido'
                                 and iFolioRequisicion='$iFolioRequisicion'
                                 and sNumeroOrden='$sNumeroOrden'";
                        mysql_query($sql);
                        if(mysql_error()){
                         $this->Memo1->Text=mysql_error();
                        }else{
                           $this->Memo1->Text="";
                           $sendMail=true;
                        }
                   }
               }else{
                 $this->Memo1->Text="La Orden de Compra esta en Status Revisado !!";
               }

                  $this->tablePedidos->setActive(false);
                  $this->tablePedidos->setFilter(" sContrato='$sContrato' and sStatus<>'Autorizado'");
                  $this->tablePedidos->setActive(true);
                  if($sendMail){
                    $sqlMail = "select
                                       u.sNombre,
                                       u.sMail
                                   from usuarios u
                                      inner join
                                   contratosxusuario cu
                                   on (cu.sContrato='$sContrato'
                                   and u.sMail<>''
                                   and cu.sIdUsuario=u.sIdUsuario)";
                    $rs = mysql_query($sqlMail);
                    while($rw = mysql_fetch_array($rs)){
                     if($rw["sMail"] !="" ){
                        if($rw["sNombre"]=="")$rw["sNombre"]=" Usuario de Intelcode ";
                           $msg=$rw["sNombre"]."<br>
                                      Le avisamos que existe una Orden de Compra marcada como 'Revisada' por parte de la Gerencia Administrativa registrada en el sistema.<br><br>

                                          No. Orden de Compra : $iFolioPedido<br>
                                          No. de Orden        : $sNumeroOrden<br>
                                          Contrato            : $sContrato<br><br>

                                      Por favor no responda este mensaje.
                                    ";
                           $Subject="$sContrato, Orden de Compra";
                           enviarCorreo($rw["sMail"],$msg,$Subject,$mail = new phpmailer() );
                          }
                    }
                  }

               }
               ####################### REQUISICIONES
               function cmdImprimirRequisicionJSClick($sender, $params)
               {
               global $sContrato;
               ?>
                  //Add your javascript code here
                  ok=0;
                  ddanexo_requisicion1.getSelectionModel().iterateSelection
                  (    function(index)
                       {
                           //obtenemos los datos del grid Requisiciones
                           var Tabla = ddanexo_requisicion1.getTableModel();
                           var sFolio = Tabla.getValue(0, index);
                           ruta = "../reporte.php";
                           ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                           ruta = ruta + "&iFolioRequisicion="+sFolio;

                           ruta = ruta + "&reportesPath=requisiciones";
                           ruta = ruta + "&nombreReporte=requisiciones";
                           var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                           ok=1;
                       }
                  );
                  if (ok==0)
                     alert (" Haga Click sobre Una Requisicion !!! ");
                  return false;
               <?php

               }

               function cmdAutorizaRequisicionJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here

                  ddanexo_requisicion1.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = ddanexo_requisicion1.getTableModel();

                        var sIdRequisicion = tableModel.getValue(0, index);
                        var sNumeroOrden   = tableModel.getValue(1, index);


                        if(sIdRequisicion != "")params = sIdRequisicion+ "]"; else params="_]";
                        if(sNumeroOrden != "")params = params + sNumeroOrden + "]"; else params = params + "_]";
                        //xajax.doneLoadingFunction=recargar;
                        document.getElementById("cmdAutorizaRequisicion").value="Espere..."
                        document.getElementById("cmdAutorizaRequisicion").disabled=true;
                        <?php
                        echo $this->cmdAutorizaRequisicion->ajaxCall("fnAutorizaRequisicion",array(),array("cmdAutorizaRequisicion","ddanexo_requisicion1","Memo1"));
                        ?>
                        return false;
                     }

                  );

                 return false;
               <?php

               }
               function fnAutorizaRequisicion($sender="", $params=""){
                  #obtiene los datos necesarios
                  global $sContrato,$sIdUsuario;

                  $parametros = explode("]",$params);

                  $iFolioRequisicion = ($parametros[0]=="_")?"":$parametros[0];
                  $sNumeroOrden = ($parametros[1]=="_")?"":$parametros[1];
                  $sendMail=false;
                  $this->Memo1->Text=$sql ="select lStatus from anexo_requisicion where sContrato='$sContrato' and iFolioRequisicion='$iFolioRequisicion' and sNumeroOrden='$sNumeroOrden'";
                  $rs = mysql_query($sql);
                  if($rw = mysql_fetch_array($rs)){
                     $lStatus = $rw["lStatus"];
                  }
                  if($lStatus == "Recibido"){
                     $sql = "update
                                 anexo_requisicion
                            set
                                lStatus='Autorizado',
                                sIdUsuarioAutoriza='$sIdUsuario'
                            where sContrato='$sContrato'
                                 and iFolioRequisicion='$iFolioRequisicion'
                                 and sNumeroOrden='$sNumeroOrden'";
                      mysql_query($sql);
                     if(mysql_error()){
                        $this->Memo1->Text=mysql_error();
                     }else{
                        $this->Memo1->Text="";
                        $sendMail=true;
                        $this->kardex("Cambio de Status de Recibido a Autorizado de la Requisicion No $iFolioRequisicion");
                     }
                  }else{
                     $this->Memo1->Text="La requisicion ya estaba en Status Autorizada aun esta en Status Recibido o Pendiente !!";
                  }

                  $this->tableRequisicion->setActive(false);
                  $this->tableRequisicion->setFilter(" sContrato='$sContrato' and lStatus<>'Autorizado'");
                  $this->tableRequisicion->setActive(true);
                  if($sendMail){
                    $sqlMail = "select
                                       u.sNombre,
                                       u.sMail
                                   from usuarios u
                                      inner join
                                   contratosxusuario cu
                                   on (cu.sContrato='$sContrato'
                                   and u.sMail<>''
                                   and cu.sIdUsuario=u.sIdUsuario)";
                    $rs = mysql_query($sqlMail);
                    while($rw = mysql_fetch_array($rs)){
                     if($rw["sMail"] !="" ){
                        if($rw["sNombre"]=="")$rw["sNombre"]=" Usuario de Intelcode ";
                           $msg=$rw["sNombre"]."<br>
                                      Le avisamos que existe una requisicion de materiales de almacen marcada como 'Autorizada' registrada en el sistema.<br><br>

                                          No. Solicitud : $iFolioRequisicion<br>
                                          No. de Orden  : $sNumeroOrden<br>
                                          Contrato      : $sContrato<br><br>

                                      Por favor no responda este mensaje.
                                    ";
                           $Subject="$sContrato, Requisiciones";
                           enviarCorreo($rw["sMail"],$msg,$Subject,$mail = new phpmailer() );
                          }
                    }
                  }
               }
               function cmdRecibirRequisicionJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here

                  ddanexo_requisicion1.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = ddanexo_requisicion1.getTableModel();

                        var sIdRequisicion = tableModel.getValue(0, index);
                        var sNumeroOrden   = tableModel.getValue(1, index);


                        if(sIdRequisicion != "")params = sIdRequisicion+ "]"; else params="_]";
                        if(sNumeroOrden != "")params = params + sNumeroOrden + "]"; else params = params + "_]";
                        //xajax.doneLoadingFunction=recargar;
                        document.getElementById("cmdRecibirRequisicion").value="Espere..."
                        document.getElementById("cmdRecibirRequisicion").disabled=true;

                        <?php
                        echo $this->cmdRecibirRequisicion->ajaxCall("fnRecibeRequisicion",array(),array("cmdRecibirRequisicion","ddanexo_requisicion1","Memo1"));
                        ?>
                        return false;
                     }

                  );

                 return false;

               <?php

               }
               function fnRecibeRequisicion($sender="", $params=""){
                  #obtiene los datos necesarios
                  global $sContrato,$sIdUsuario;

                  $parametros = explode("]",$params);

                  $iFolioRequisicion = ($parametros[0]=="_")?"":$parametros[0];
                  $sNumeroOrden = ($parametros[1]=="_")?"":$parametros[1];
                  $sendMail=false;
                  $this->Memo1->Text=$sql ="select lStatus from anexo_requisicion where sContrato='$sContrato' and iFolioRequisicion='$iFolioRequisicion' and sNumeroOrden='$sNumeroOrden'";
                  $rs = mysql_query($sql);
                  if($rw = mysql_fetch_array($rs)){
                     $lStatus = $rw["lStatus"];
                  }
                  if($lStatus == "Verificado"){
                     $sql = "update
                                 anexo_requisicion
                            set
                                lStatus='Recibido',
                                sIdUsuarioRecibio='$sIdUsuario'
                            where sContrato='$sContrato'
                                 and iFolioRequisicion='$iFolioRequisicion'
                                 and sNumeroOrden='$sNumeroOrden'";
                      mysql_query($sql);
                     if(mysql_error()){
                        $this->Memo1->Text=mysql_error();
                     }else{
                        $this->Memo1->Text="";
                        $sendMail=true;
                        $this->kardex("Cambio de Status de Verificadoo a Recibido de la Requisicion No $iFolioRequisicion");
                     }
                  }else{
                     $this->Memo1->Text="La requisicion ya estaba en Status Recibido aun esta en Status Pendiente !!";
                  }

                  $this->tableRequisicion->setActive(false);
                  $this->tableRequisicion->setFilter(" sContrato='$sContrato' and lStatus<>'Autorizado'");
                  $this->tableRequisicion->setActive(true);
                  if($sendMail){
                    $sqlMail = "select
                                       u.sNombre,
                                       u.sMail
                                   from usuarios u
                                      inner join
                                   contratosxusuario cu
                                   on (cu.sContrato='$sContrato'
                                   and u.sMail<>''
                                   and cu.sIdUsuario=u.sIdUsuario)";
                    $rs = mysql_query($sqlMail);
                    while($rw = mysql_fetch_array($rs)){
                     if($rw["sMail"] !="" ){
                        if($rw["sNombre"]=="")$rw["sNombre"]=" Usuario de Intelcode ";
                           $msg=$rw["sNombre"]."<br>
                                      Le avisamos que existe una requisicion de materiales de almacen marcada como 'Recibida' registrada en el sistema.<br><br>

                                          No. Solicitud : $iFolioRequisicion<br>
                                          No. de Orden  : $sNumeroOrden<br>
                                          Contrato      : $sContrato<br><br>

                                      Por favor no responda este mensaje.
                                    ";
                           $Subject="$sContrato, Requisiciones";
                           enviarCorreo($rw["sMail"],$msg,$Subject,$mail = new phpmailer() );
                          }
                    }
                  }
               }

               function cmdVerificarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here

                  ddanexo_requisicion1.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = ddanexo_requisicion1.getTableModel();

                        var sIdRequisicion = tableModel.getValue(0, index);
                        var sNumeroOrden   = tableModel.getValue(1, index);


                        if(sIdRequisicion != "")params = sIdRequisicion+ "]"; else params="_]";
                        if(sNumeroOrden != "")params = params + sNumeroOrden + "]"; else params = params + "_]";
                        //xajax.doneLoadingFunction=recargar;
                        document.getElementById("cmdVerificar").value="Espere..."
                        document.getElementById("cmdVerificar").disabled=true;
                        <?php
                        echo $this->cmdVerificar->ajaxCall("fnVerificaRequisicion",array(),array("cmdVerificar","ddanexo_requisicion1","Memo1"));
                        ?>
                        return false;
                     }

                  );

                 return false;

               <?php

               }
               function fnVerificaRequisicion($sender="", $params=""){
                  #obtiene los datos necesarios
                  global $sContrato,$sIdUsuario;

                  $parametros = explode("]",$params);

                  $iFolioRequisicion = ($parametros[0]=="_")?"":$parametros[0];
                  $sNumeroOrden = ($parametros[1]=="_")?"":$parametros[1];
                  $sendMail=false;
                  $this->Memo1->Text=$sql ="select lStatus from anexo_requisicion where sContrato='$sContrato' and iFolioRequisicion='$iFolioRequisicion' and sNumeroOrden='$sNumeroOrden'";
                  $rs = mysql_query($sql);
                  if($rw = mysql_fetch_array($rs)){
                     $lStatus = $rw["lStatus"];
                  }
                  if($lStatus == "Pendiente"){
                     $sql = "update
                                 anexo_requisicion
                            set
                                lStatus='Verificado',
                                sIdUsuarioVerifica='$sIdUsuario'
                            where sContrato='$sContrato'
                                 and iFolioRequisicion='$iFolioRequisicion'
                                 and sNumeroOrden='$sNumeroOrden'";
                      mysql_query($sql);
                     if(mysql_error()){
                        $this->Memo1->Text=mysql_error();
                     }else{
                        $this->Memo1->Text="";
                        $sendMail=true;
                        $this->kardex("Cambio de Status de Pendiente a Verificado de la Requisicion No $iFolioRequisicion");
                     }
                  }else{
                     $this->Memo1->Text="La requisicion ya estaba en Status Verificada !!";
                  }

                  $this->tableRequisicion->setActive(false);
                  $this->tableRequisicion->setFilter(" sContrato='$sContrato' and lStatus<>'Autorizado'");
                  $this->tableRequisicion->setActive(true);
                  if($sendMail){
                    $sqlMail = "select
                                       u.sNombre,
                                       u.sMail
                                   from usuarios u
                                      inner join
                                   contratosxusuario cu
                                   on (cu.sContrato='$sContrato'
                                   and u.sMail<>''
                                   and cu.sIdUsuario=u.sIdUsuario)";
                    $rs = mysql_query($sqlMail);
                    while($rw = mysql_fetch_array($rs)){
                     if($rw["sMail"] !="" ){
                        if($rw["sNombre"]=="")$rw["sNombre"]=" Usuario de Intelcode ";
                           $msg=$rw["sNombre"]."<br>
                                      Le avisamos que existe una requisicion de materiales de almacen marcada como 'Verificada' registrada en el sistema.<br><br>

                                          No. Solicitud : $iFolioRequisicion<br>
                                          No. de Orden  : $sNumeroOrden<br>
                                          Contrato      : $sContrato<br><br>

                                      Por favor no responda este mensaje.
                                    ";
                           $Subject="$sContrato, Requisiciones";
                           enviarCorreo($rw["sMail"],$msg,$Subject,$mail = new phpmailer() );
                          }
                    }
                  }
               }
               ####################### SOLICITUDES
               function cmdImprimirSolicitudJSClick($sender, $params)
               {
               global $sContrato;
               ?> //Ejemplo de aldal....
                  ok=0;
                  dbgSolicitud.getSelectionModel().iterateSelection
                    (    function(index)
                         {
                           var Tabla = dbgSolicitud.getTableModel();

                           ruta = "../reporte.php";
                           //parametros
                           ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                           ruta = ruta + "&sNumeroOrden=" + Tabla.getValue(1, index);
                           ruta = ruta + "&sIdSolicitud=" + Tabla.getValue(0, index);
                           //ruta... y nombre del  reporte...
                           ruta = ruta + "&nombreReporte=solicitudInsumos";
                           ruta = ruta + "&reportesPath=solicitudes";
                           var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                           ok=1;
                        }
                     );

                     if (ok==0)
                        alert(" Haga Click Sobre una Solicitud !!! ");

                     return false;

               <?php

               }

               function cmdAutorizarSolicitudJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here

                  dbgSolicitud.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = dbgSolicitud.getTableModel();

                        var sIdSolicitud = tableModel.getValue(0, index);
                        var sNumeroOrden = tableModel.getValue(1, index);


                        if(sIdSolicitud != "")params = sIdSolicitud+ "]"; else params="_]";
                        if(sNumeroOrden != "")params = params + sNumeroOrden + "]"; else params = params + "_]";
                        //xajax.doneLoadingFunction=recargar;

                        //deshabilitar boton mientras se autoriza solicitud
                        document.getElementById("cmdAutorizarSolicitud").value="Espere..."
                        document.getElementById("cmdAutorizarSolicitud").disabled=true;
                        <?php
                        echo $this->cmdAutorizarSolicitud->ajaxCall("fnAutorizarSolicitud",array(),array("cmdAutorizarSolicitud","dbgSolicitud","Memo1"));
                        ?>
                        return false;
                     }

                  );

                 return false;

               <?php

               }
               function fnAutorizarSolicitud($sender="", $params=""){
                  #obtiene los datos necesarios
                  global $sContrato,$sIdUsuario;

                  $parametros = explode("]",$params);

                  $sIdSolicitud = ($parametros[0]=="_")?"":$parametros[0];
                  $sNumeroOrden = ($parametros[1]=="_")?"":$parametros[1];
                  $sendMail = true;
                  #
                  $sql = "select
                              lStatus
                         from
                           anexo_solicitud
                         where
                           sContrato='$sContrato'
                           and sIdSolicitud='$sIdSolicitud'
                           and sNumeroOrden='$sNumeroOrden'";
                  $rs = mysql_query($sql);
                  if($row = mysql_fetch_array($rs)){
                     $lStatus = $row["lStatus"];
                  }
                  if($lStatus == "Pendiente"){
                     #autorizar las solicitudes
                     $sql = "update anexo_solicitud set lStatus='Autorizado', sIdUsuarioAutoriza='$sIdUsuario'
                           where sContrato='$sContrato' and sIdSolicitud='$sIdSolicitud' and sNumeroOrden='$sNumeroOrden'";
                     mysql_query($sql);
                     if(mysql_error()){
                        $this->Memo1->Text=mysql_error();
                     }else{
                        $this->Memo1->Text="";
                        $sendMail = true;
                        $this->kardex("Cambio de Status de Pendiente a Autorizado de la Solcitud de Material No $sIdSolicitud");
                     }
                  }
                  else{
                     $this->Memo1->Text="La solicitud ya estaba en Status Autorizada !!";
                  }
                  $this->tableSolicitud->setActive(false);
                  $this->tableSolicitud->setFilter(" sContrato='$sContrato' and lStatus='Pendiente'");
                  $this->tableSolicitud->setActive(true);

                  if($sendMail){
                    $sqlMail = "select
                                       u.sNombre,
                                       u.sMail
                                   from usuarios u
                                      inner join
                                   contratosxusuario cu
                                   on (cu.sContrato='$sContrato'
                                   and u.sMail<>''
                                   and cu.sIdUsuario=u.sIdUsuario)";
                    $rs = mysql_query($sqlMail);
                    while($rw = mysql_fetch_array($rs)){
                     if($rw["sMail"] !="" ){
                        if($rw["sNombre"]=="")$rw["sNombre"]=" Usuario de Intelcode ";
                           $msg=$rw["sNombre"]."<br>
                                      Le avisamos que existe una solicitud de materiales de almacen autorizada registrada en el sistema.<br><br>

                                          No. Solicitud : $sIdSolicitud<br>
                                          No. de Orden  : $sNumeroOrden<br>
                                          Contrato      : $sContrato<br><br>

                                      Por favor no responda este mensaje.
                                    ";
                           $Subject="$sContrato, Solicitud de Materiales de Almacen";
                           enviarCorreo($rw["sMail"],$msg,$Subject,$mail = new phpmailer() );
                          }
                    }
                  }

               }
               function frmValidarSolicitudesShow($sender, $params)
               {
                  global $sContrato,$sIdUsuario;


                  $this->tableSolicitud->setActive(false);
                  $this->tableSolicitud->setFilter(" sContrato='$sContrato' and lStatus='Pendiente' ");
                  $this->tableSolicitud->setActive(true);

                  $this->tableRequisicion->setActive(false);
                  $this->tableRequisicion->setFilter(" sContrato='$sContrato' and lStatus<>'Autorizado' ");
                  $this->tableRequisicion->setActive(true);

                  $this->tablePedidos->setActive(false);
                  $this->tablePedidos->setFilter(" sContrato='$sContrato' and sStatus<>'Autorizado'");
                  $this->tablePedidos->setActive(true);
                  /*habilitar o deshabilitar botones segun el usurio tiene permisos*/

                  $sql = "select * from usuarios where sIdUsuario='$sIdUsuario'";
                  $rs = mysql_query($sql);
                  if($rw = mysql_fetch_array($rs)){
                     $lAutorizaReq = $rw["lAutorizaReq"];
                     $lVerificaReq= $rw["lVerificaReq"];
                     $lRecibeReq= $rw["lRecibeReq"];
                     $lAutorizaSolicitudMat= $rw["lAutorizaSolicitudMat"];
                     $lAutorizaPedido= $rw["lAutorizaPedido"];
                     $llRevisaGOperacion= $rw["llRevisaGOperacion"];
                     $lRevisaCoordAdmin= $rw["lRevisaCoordAdmin"];
                  }
                  if($lAutorizaReq != "Si" )$this->cmdAutorizaRequisicion->setEnabled(false);
                  if($lVerificaReq != "Si" )$this->cmdVerificar->setEnabled(false);
                  if($lRecibeReq   != "Si" )$this->cmdRecibirRequisicion->setEnabled(false);
                  if($lAutorizaSolicitudMat!= "Si" )$this->cmdAutorizarSolicitud->setEnabled(false);
                  if($lAutorizaPedido != "Si" )$this->cmdAutorizaCompra->setEnabled(false);
                  if($llRevisaGOperacion != "Si" )$this->cmdRevCompra->setEnabled(false);
                  if($lRevisaCoordAdmin != "Si" )$this->cmdRevAdmin->setEnabled(false);

               }
               function kardex($descripcion){
                     global $sContrato,$sIdUsuario;
                     $sql = "insert into kardex_sistema
                               set
                                 sContrato='$sContrato',
                                 sIdUsuario='$sIdUsuario',
                                 dIdFecha='".date("Y-m-d")."',
                                 sHora='".date("H:i:s")."',
                                 sDescripcion = '$descripcion',
                                 lOrigen='Otros Movimientos'";
                     mysql_query($sql);
                     if(mysql_error()){
                        $this->Memo1->Text=mysql_error();
                     }else{
                        $this->Memo1->Text="";
                     }

               }
               function dumpJavascript(){
                  echo "function recargar(){
                           document.location.href='frmValidarSolicitudes.php';
                        }\n";

                  echo 'function ResaltarBotones()
                  {
                          document.getElementById("cmdAutorizarSolicitud").style.backgroundColor = "";
                          document.getElementById("cmdImprimirSolicitud").style.backgroundColor = "";
                          document.getElementById("cmdRevCompra").style.backgroundColor = "";
                          document.getElementById("cmdRevAdmin").style.backgroundColor = "";
                          document.getElementById("cmdAutorizaCompra").style.backgroundColor = "";
                          document.getElementById("cmdImprimeCompra").style.backgroundColor = "";
                          document.getElementById("cmdVerificar").style.backgroundColor = "";
                          document.getElementById("cmdRecibirRequisicion").style.backgroundColor = "";
                          document.getElementById("cmdAutorizaRequisicion").style.backgroundColor = "";
                          document.getElementById("cmdImprimirRequisicion").style.backgroundColor = "";
                          document.getElementById("cmdSolicitudes").style.backgroundColor = "";
                          document.getElementById("cmdRequisiciones").style.backgroundColor = "";
                          document.getElementById("cmdOC").style.backgroundColor = "";
                  }';
               }


        }

        global $application;

        global $frmValidarSolicitudes;

        //Creates the form
        $frmValidarSolicitudes=new frmValidarSolicitudes($application);

        //Read from resource file
        $frmValidarSolicitudes->loadResource(__FILE__);

        //Shows the form
        $frmValidarSolicitudes->show();

?>

<script>
                  document.getElementById("Panel1_outer").style.display='block';
                  document.getElementById("Panel2_outer").style.display='none';
                  document.getElementById("Panel3_outer").style.display='none';
                  document.getElementById("cmdSolicitudes").disabled=true;
                  document.getElementById("cmdRequisiciones").disabled=false;
                  document.getElementById("cmdOC").disabled=false;
                  ResaltarBotones();
</script>
