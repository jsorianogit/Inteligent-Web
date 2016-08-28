<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require_once("mysql.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        //$sContrato='425027849';
        $sIdUsuario=$_SESSION["ssUsuario"];//'adal2404';

        //Class definition
        class frmAbrirAutorizaSolicitudes extends Page
        {
               public $cmdOC = null;
               public $cmdRequisiciones = null;
               public $cmdSolicitudes = null;
               public $cmdAbreAutorizaCompra = null;
               public $cmdAbreRevAdmin = null;
               public $ddanexo_pedidos1 = null;
               public $cmdAbreRevCompra = null;
               public $cmdAbrirAutorizaRequisicion = null;
               public $cmdAbrirRecibirRequisicion = null;
               public $ddanexo_requisicion1 = null;
               public $cmdAbrirVerificarReq = null;
               public $dbgSolicitud = null;
               public $cmdImprimirSolicitud = null;
               public $cmdAbrirSolicitud = null;
               public $dsPedidos = null;
               public $tablePedidos = null;
               public $dsRequisicion = null;
               public $tableRequisicion = null;
               public $dsSolicitud = null;
               public $database = null;
               public $tableSolicitud = null;
               public $Memo1 = null;
               public $Panel3 = null;
               public $Button7 = null;
               public $Label4 = null;
               public $Panel2 = null;
               public $Button5 = null;
               public $Label1 = null;
               public $Panel1 = null;
               public $Label2 = null;


               function Button7JSClick($sender, $params)
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
                  global $sContrato;
                  $this->tableSolicitud->setActive(false);
                  $this->tableSolicitud->setFilter(" sContrato='$sContrato' and lStatus<>'Pendiente' ");
                  $this->tableSolicitud->setActive(true);

                  $this->tableRequisicion->setActive(false);
                  $this->tableRequisicion->setFilter(" sContrato='$sContrato' and lStatus<>'Pendiente' ");
                  $this->tableRequisicion->setActive(true);

                  $this->tablePedidos->setActive(false);
                  $this->tablePedidos->setFilter(" sContrato='$sContrato' and sStatus<>'Pendiente' ");
                  $this->tablePedidos->setActive(true);


               }

               function dumpJavascript(){
                  echo "function recargar(){
                           document.location.href='frmAbrirAutorizaSolicitudes.php';
                        }\n";
                  echo 'function ResaltarBotones()
                  {
                          document.getElementById("cmdAbrirSolicitud").style.backgroundColor = "";
                          document.getElementById("cmdImprimirSolicitud").style.backgroundColor = "";
                          document.getElementById("cmdAbreRevCompra").style.backgroundColor = "";
                          document.getElementById("cmdAbreRevAdmin").style.backgroundColor = "";
                          document.getElementById("cmdAbreAutorizaCompra").style.backgroundColor = "";
                          document.getElementById("Button7").style.backgroundColor = "";
                          document.getElementById("cmdAbrirVerificarReq").style.backgroundColor = "";
                          document.getElementById("cmdAbrirRecibirRequisicion").style.backgroundColor = "";
                          document.getElementById("cmdAbrirAutorizaRequisicion").style.backgroundColor = "";
                          document.getElementById("Button5").style.backgroundColor = "";
                          document.getElementById("cmdSolicitudes").style.backgroundColor = "";
                          document.getElementById("cmdRequisiciones").style.backgroundColor = "";
                          document.getElementById("cmdOC").style.backgroundColor = "";
                  }';
               }
               function cmdAbreAutorizaCompraJSClick($sender, $params)
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
                        document.getElementById("cmdAbreAutorizaCompra").value="Espere..."
                        document.getElementById("cmdAbreAutorizaCompra").disabled=true;
                        <?php
                        echo $this->cmdAbreAutorizaCompra->ajaxCall("fnAbreAutorizaCompra",array(),array("cmdAbreAutorizaCompra","ddanexo_pedidos1","Memo1"));
                        ?>
                        return false;
                     }

                  );

                 return false;

               <?php

               }
               function fnAbreAutorizaCompra($sender="", $params=""){
                  #obtiene los datos necesarios
                  global $sContrato,$sIdUsuario;

                  $parametros = explode("]",$params);

                  $iFolioPedido = ($parametros[0]=="_")?"":$parametros[0];
                  $iFolioRequisicion = ($parametros[1]=="_")?"":$parametros[1];
                  $sNumeroOrden = ($parametros[2]=="_")?"":$parametros[2];

                  $sql ="select sStatus,lStatusPedido from anexo_pedidos
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
                     $lStatusPedido         = $rw["lStatusPedido"];
                  }
                  if($lStatusPedido=="Recibido"){
                     $this->Memo1->Text="No se puede realizar esta operacion porque la OC ya fue procesada !!";
                  }else if($lStatus == "Autorizado"){
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
                              $this->kardex("Cambio de Status de Autorizado a Revisado de la Orden de Compra No $iFolioPedido");
                           }
               }else{
                 $this->Memo1->Text="La Orden de Compra Aun no ha sido Autorizada!!";
               }

                  $this->tablePedidos->setActive(false);
                  $this->tablePedidos->setFilter(" sContrato='$sContrato' and sStatus<>'Pendiente'");
                  $this->tablePedidos->setActive(true);

               }

               function cmdAbreRevAdminJSClick($sender, $params)
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
                        document.getElementById("cmdAbreRevAdmin").value="Espere..."
                        document.getElementById("cmdAbreRevAdmin").disabled=true;
                        <?php
                        echo $this->cmdAbreRevAdmin->ajaxCall("fnAbreRevisaCompraAdmin",array(),array("cmdAbreRevAdmin","ddanexo_pedidos1","Memo1"));
                        ?>
                        return false;
                     }

                  );

                 return false;
               <?php

               }

               function fnAbreRevisaCompraAdmin($sender="", $params=""){

                  #obtiene los datos necesarios
                  global $sContrato,$sIdUsuario;

                  $parametros = explode("]",$params);

                  $iFolioPedido = ($parametros[0]=="_")?"":$parametros[0];
                  $iFolioRequisicion = ($parametros[1]=="_")?"":$parametros[1];
                  $sNumeroOrden = ($parametros[2]=="_")?"":$parametros[2];

                  $sql ="select sStatus,sIdUsuarioRevisaOper,sIdUsuarioRevisaAdmin,lStatusPedido from anexo_pedidos
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
                     $lStatusPedido         = $rw["lStatusPedido"];
                     $sIdUsuarioRevisaOper  = $rw["sIdUsuarioRevisaOper"];
                     $sIdUsuarioRevisaAdmin = $rw["sIdUsuarioRevisaAdmin"];
                  }
                  if($lStatusPedido=="Recibido"){
                     $this->Memo1->Text="No se puede realizar esta operacion porque la OC ya fue procesada !!";
                  }else if($lStatus == "Revisado"){
                     if($sIdUsuarioRevisaOper=="" and $sIdUsuarioRevisaAdmin==""){
                           $sql = "update
                                     anexo_pedidos
                                   set
                                       sStatus='Pendiente'
                                     where sContrato='$sContrato'
                                       and iFolioRequisicion='$iFolioRequisicion'
                                       and iFolioPedido='$iFolioPedido'
                                       and sNumeroOrden='$sNumeroOrden'";
                           mysql_query($sql);
                           if(mysql_error()){
                            $this->Memo1->Text=mysql_error();
                           }else{
                              $this->Memo1->Text="";
                              $this->kardex("Cambio de Status de Revisado a Pendiente de la Orden de Compra No $iFolioPedido");
                           }
                     }else  if($sIdUsuarioRevisaAdmin=="" ){
                        $this->Memo1->Text="No ha sido Verificado por Coordinador Adminisrativo!!";
                     }else{
                        if($sIdUsuarioRevisaOper==""){
                           $sql = "update
                                     anexo_pedidos
                                   set
                                       sStatus='Pendiente'
                                     where sContrato='$sContrato'
                                       and iFolioRequisicion='$iFolioRequisicion'
                                       and iFolioPedido='$iFolioPedido'
                                       and sNumeroOrden='$sNumeroOrden'";
                           mysql_query($sql);
                           if(mysql_error()){
                            $this->Memo1->Text=mysql_error();
                           }else{
                              $this->Memo1->Text="";
                              $this->kardex("Cambio de Status de Revisado a Pendiente de la Orden de Compra No $iFolioPedido");
                           }
                        }
                        $sql = "update
                                  anexo_pedidos
                               set
                                sIdUsuarioRevisaAdmin=''
                               where sContrato='$sContrato'
                                 and iFolioPedido='$iFolioPedido'
                                 and iFolioRequisicion='$iFolioRequisicion'
                                 and sNumeroOrden='$sNumeroOrden'";
                        mysql_query($sql);
                        if(mysql_error()){
                         $this->Memo1->Text=mysql_error();
                        }else{
                           $this->Memo1->Text="";

                        }
                   }
               }else{
                 $this->Memo1->Text="La Orden de Compra no esta en status Revisado !!";
               }

                  $this->tablePedidos->setActive(false);
                  $this->tablePedidos->setFilter(" sContrato='$sContrato' and sStatus<>'Pendiente'");
                  $this->tablePedidos->setActive(true);

               }


               function cmdAbreRevCompraJSClick($sender, $params)
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
                        document.getElementById("cmdAbreRevCompra").value="Espere..."
                        document.getElementById("cmdAbreRevCompra").disabled=true;
                        <?php
                        echo $this->cmdAbreRevCompra->ajaxCall("fnAbreRevisaCompra",array(),array("cmdAbreRevCompra","ddanexo_pedidos1","Memo1"));
                        ?>
                        return false;
                     }

                  );

                 return false;

               <?php

               }


               function fnAbreRevisaCompra($sender="", $params=""){

                  #obtiene los datos necesarios
                  global $sContrato,$sIdUsuario;

                  $parametros = explode("]",$params);

                  $iFolioPedido = ($parametros[0]=="_")?"":$parametros[0];
                  $iFolioRequisicion = ($parametros[1]=="_")?"":$parametros[1];
                  $sNumeroOrden = ($parametros[2]=="_")?"":$parametros[2];

                  $sql ="select sStatus,sIdUsuarioRevisaOper,sIdUsuarioRevisaAdmin,lStatusPedido from anexo_pedidos
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
                     $lStatusPedido         = $rw["lStatusPedido"];
                     $sIdUsuarioRevisaOper  = $rw["sIdUsuarioRevisaOper"];
                     $sIdUsuarioRevisaAdmin = $rw["sIdUsuarioRevisaAdmin"];
                  }
                  if($lStatusPedido=="Recibido"){
                         $this->Memo1->Text="No se puede realizar esta operacion porque la OC ya fue procesada !!";
                  }else if($lStatus == "Revisado"){
                     if($sIdUsuarioRevisaOper=="" and $sIdUsuarioRevisaAdmin==""){
                           $sql = "update
                                     anexo_pedidos
                                   set
                                       sStatus='Pendiente'
                                     where sContrato='$sContrato'
                                       and iFolioRequisicion='$iFolioRequisicion'
                                       and iFolioPedido='$iFolioPedido'
                                       and sNumeroOrden='$sNumeroOrden'";
                           mysql_query($sql);
                           if(mysql_error()){
                            $this->Memo1->Text=mysql_error();
                           }else{
                              $this->Memo1->Text="";
                              $this->kardex("Cambio de Status de Revisado a Pendiente de la Orden de Compra No $iFolioPedido");
                           }
                     }else if($sIdUsuarioRevisaOper=="" ){
                        $this->Memo1->Text="No ha sido Verificado por la Gerencia de Operaciones!!";
                     }else{
                        if($sIdUsuarioRevisaAdmin=="" ){
                           $sql = "update
                                     anexo_pedidos
                                   set
                                       sStatus='Pendiente'
                                     where sContrato='$sContrato'
                                       and iFolioRequisicion='$iFolioRequisicion'
                                       and iFolioPedido='$iFolioPedido'
                                       and sNumeroOrden='$sNumeroOrden'";
                           mysql_query($sql);
                           if(mysql_error()){
                            $this->Memo1->Text=mysql_error();
                           }else{
                              $this->Memo1->Text="";
                              $this->kardex("Cambio de Status de Revisado a Pendiente de la Orden de Compra No $iFolioPedido");
                           }
                        }
                        $sql = "update
                                  anexo_pedidos
                               set
                                sIdUsuarioRevisaOper=''
                               where sContrato='$sContrato'
                                 and iFolioPedido='$iFolioPedido'
                                 and iFolioRequisicion='$iFolioRequisicion'
                                 and sNumeroOrden='$sNumeroOrden'";
                        mysql_query($sql);
                        if(mysql_error()){
                         $this->Memo1->Text=mysql_error();
                        }else{
                           $this->Memo1->Text="";
                        }
                 }
               }else{
                 $this->Memo1->Text="La Orden de Compra no esta en status Revisado !!";
               }

                  $this->tablePedidos->setActive(false);
                  $this->tablePedidos->setFilter(" sContrato='$sContrato' and sStatus<>'Pendiente'");
                  $this->tablePedidos->setActive(true);

               }

               function Button5JSClick($sender, $params)
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

               function cmdAbrirAutorizaRequisicionJSClick($sender, $params)
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
                        document.getElementById("cmdAbrirAutorizaRequisicion").value="Espere..."
                        document.getElementById("cmdAbrirAutorizaRequisicion").disabled=true;

                        <?php
                        echo $this->cmdAbrirAutorizaRequisicion->ajaxCall("fnAbrirAutorizaRequisicion",array(),array("cmdAbrirAutorizaRequisicion","ddanexo_requisicion1","Memo1"));
                        ?>
                        return false;
                     }

                  );

                 return false;

               <?php

               }
               function fnAbrirAutorizaRequisicion($sender="", $params=""){
                  #obtiene los datos necesarios
                  global $sContrato,$sIdUsuario;

                  $parametros = explode("]",$params);

                  $iFolioRequisicion = ($parametros[0]=="_")?"":$parametros[0];
                  $sNumeroOrden = ($parametros[1]=="_")?"":$parametros[1];
                  $this->Memo1->Text=$sql ="select lStatus,lStatusRequisicion from anexo_requisicion where sContrato='$sContrato' and iFolioRequisicion='$iFolioRequisicion' and sNumeroOrden='$sNumeroOrden'";
                  $rs = mysql_query($sql);
                  if($rw = mysql_fetch_array($rs)){
                     $lStatus = $rw["lStatus"];
                     $lStatusRequisicion = $rw["lStatusRequisicion"];
                  }
                  if($lStatusRequisicion=="Entregado"){
                     $this->Memo1->Text="La requisicion ya fue procesada, no se puede efectuar esa operacion!!";
                  }else if($lStatus == "Autorizado"){
                     $sql = "update
                                 anexo_requisicion
                            set
                                lStatus='Recibido',
                                sIdUsuarioAutoriza=''
                            where sContrato='$sContrato'
                                 and iFolioRequisicion='$iFolioRequisicion'
                                 and sNumeroOrden='$sNumeroOrden'";
                      mysql_query($sql);
                     if(mysql_error()){
                        $this->Memo1->Text=mysql_error();
                     }else{
                        $this->Memo1->Text="";
                        $this->kardex("Cambio de Status de Autorizado a Recibido de la requisicion No $iFolioRequisicion");
                     }

                  }else{
                     $this->Memo1->Text="La requisicion No esta en Status Autorizada !!";
                  }
                  $this->tableRequisicion->setActive(false);
                  $this->tableRequisicion->setFilter(" sContrato='$sContrato' and lStatus<>'Pendiente'");
                  $this->tableRequisicion->setActive(true);

               }
               function cmdAbrirRecibirRequisicionJSClick($sender, $params)
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
                        document.getElementById("cmdAbrirRecibirRequisicion").value="Espere..."
                        document.getElementById("cmdAbrirRecibirRequisicion").disabled=true;
                        <?php
                        echo $this->cmdAbrirRecibirRequisicion->ajaxCall("fnAbreRecibeRequisicion",array(),array("cmdAbrirRecibirRequisicion","ddanexo_requisicion1","Memo1"));
                        ?>
                        return false;
                     }

                  );

                 return false;

               <?php

               }
               function fnAbreRecibeRequisicion($sender="", $params=""){
                  #obtiene los datos necesarios
                  global $sContrato,$sIdUsuario;

                  $parametros = explode("]",$params);

                  $iFolioRequisicion = ($parametros[0]=="_")?"":$parametros[0];
                  $sNumeroOrden = ($parametros[1]=="_")?"":$parametros[1];
                  $this->Memo1->Text=$sql ="select lStatus,lStatusRequisicion from anexo_requisicion where sContrato='$sContrato' and iFolioRequisicion='$iFolioRequisicion' and sNumeroOrden='$sNumeroOrden'";
                  $rs = mysql_query($sql);
                  if($rw = mysql_fetch_array($rs)){
                     $lStatus = $rw["lStatus"];
                     $lStatusRequisicion = $rw["lStatusRequisicion"];
                  }
                  if($lStatusRequisicion=="Entregado"){
                     $this->Memo1->Text="La requisicion ya fue procesada, no se puede efectuar esa operacion!!";
                  }else if($lStatus == "Recibido"){
                     $sql = "update
                                 anexo_requisicion
                            set
                                lStatus='Verificado',
                                sIdUsuarioRecibio=''
                            where sContrato='$sContrato'
                                 and iFolioRequisicion='$iFolioRequisicion'
                                 and sNumeroOrden='$sNumeroOrden'";
                      mysql_query($sql);
                     if(mysql_error()){
                        $this->Memo1->Text=mysql_error();
                     }else{
                        $this->Memo1->Text="";
                        $this->kardex("Cambio de Status de Recibido a Verificado de la requisicion No $iFolioRequisicion");
                     }
                  }else{
                     $this->Memo1->Text="La requisicion No esta en Status Recibido  !!";
                  }

                  $this->tableRequisicion->setActive(false);
                  $this->tableRequisicion->setFilter(" sContrato='$sContrato' and lStatus<>'Pendiente'");
                  $this->tableRequisicion->setActive(true);

               }
               function cmdAbrirVerificarReqJSClick($sender, $params)
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
                        document.getElementById("cmdAbrirVerificarReq").value="Espere..."
                        document.getElementById("cmdAbrirVerificarReq").disabled=true;
                        <?php
                        echo $this->cmdAbrirVerificarReq->ajaxCall("fnAbreVerificaRequisicion",array(),array("cmdAbrirVerificarReq","ddanexo_requisicion1","Memo1"));
                        ?>
                        return false;
                     }

                  );

                 return false;


               <?php

               }
               function fnAbreVerificaRequisicion($sender="", $params=""){
                  #obtiene los datos necesarios
                  global $sContrato,$sIdUsuario;

                  $parametros = explode("]",$params);

                  $iFolioRequisicion = ($parametros[0]=="_")?"":$parametros[0];
                  $sNumeroOrden = ($parametros[1]=="_")?"":$parametros[1];
                  $this->Memo1->Text=$sql ="select lStatus,lStatusRequisicion from anexo_requisicion where sContrato='$sContrato' and iFolioRequisicion='$iFolioRequisicion' and sNumeroOrden='$sNumeroOrden'";
                  $rs = mysql_query($sql);
                  if($rw = mysql_fetch_array($rs)){
                     $lStatus            = $rw["lStatus"];
                     $lStatusRequisicion = $rw["lStatusRequisicion"];
                  }
                  if($lStatusRequisicion=="Entregado"){
                     $this->Memo1->Text="La requisicion ya fue procesada, no se puede efectuar esa operacion!!";
                  }else if($lStatus == "Verificado"){
                     $sql = "update
                                 anexo_requisicion
                            set
                                lStatus='Pendiente',
                                sIdUsuarioVerifica='$sIdUsuario'
                            where sContrato='$sContrato'
                                 and iFolioRequisicion='$iFolioRequisicion'
                                 and sNumeroOrden='$sNumeroOrden'";
                      mysql_query($sql);
                     if(mysql_error()){
                        $this->Memo1->Text=mysql_error();
                     }else{
                        $this->Memo1->Text="";
                        $this->kardex("Cambio de Status de Verificado a Pendiente de la requisicion No $iFolioRequisicion");
                     }
                  }else{
                     $this->Memo1->Text="La requisicion No esta en Status Verificada !!";
                  }

                  $this->tableRequisicion->setActive(false);
                  $this->tableRequisicion->setFilter(" sContrato='$sContrato' and lStatus<>'Pendiente'");
                  $this->tableRequisicion->setActive(true);


               }

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

               function cmdAbrirSolicitudJSClick($sender, $params)
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
                        document.getElementById("cmdAbrirSolicitud").value="Espere..."
                        document.getElementById("cmdAbrirSolicitud").disabled=true;
                        <?php
                        echo $this->cmdAbrirSolicitud->ajaxCall("fnAbrirSolicitud",array(),array("cmdAbrirSolicitud","dbgSolicitud","Memo1"));
                        ?>
                        return false;
                     }

                  );

                 return false;

               <?php

               }
               function fnAbrirSolicitud($sender="", $params=""){
                  #obtiene los datos necesarios
                  global $sContrato,$sIdUsuario;

                  $parametros = explode("]",$params);

                  $sIdSolicitud = ($parametros[0]=="_")?"":$parametros[0];
                  $sNumeroOrden = ($parametros[1]=="_")?"":$parametros[1];
                  #status de la solicitud, si esta autorizada o no
                  $sql = "select
                              lStatus,
                              lStatusEntrega
                         from
                           anexo_solicitud
                         where
                           sContrato='$sContrato'
                           and sIdSolicitud='$sIdSolicitud'
                           and sNumeroOrden='$sNumeroOrden'";
                  $rs = mysql_query($sql);
                  if($row = mysql_fetch_array($rs)){
                     $lStatus        = $row["lStatus"];
                     $lStatusEntrega = $row["lStatusEntrega"];
                  }

                  if($lStatusEntrega=="Entregado"){
                     $this->Memo1->Text="No se puede abrir la solicitud por que ya fue procesada!!";

                  }else if($lStatus != "Pendiente"){
                     #autorizar las solicitudes
                     $sql = "update anexo_solicitud set lStatus='Pendiente', sIdUsuarioAutoriza=''
                           where sContrato='$sContrato' and sIdSolicitud='$sIdSolicitud' and sNumeroOrden='$sNumeroOrden'";
                     mysql_query($sql);
                     if(mysql_error()){
                        $this->Memo1->Text=mysql_error();
                     }else{
                        $this->Memo1->Text="";
                        $this->kardex("Cambio de Status de Autorizado a Pendiente de la solicitud No $sIdSolicitud");
                     }

                  }else{
                     $this->Memo1->Text="La solicitud ya estaba en Status Autorizada !!";
                  }
                  $this->tableSolicitud->setActive(false);
                  $this->tableSolicitud->setFilter(" sContrato='$sContrato' and lStatus<>'Pendiente'");
                  $this->tableSolicitud->setActive(true);
               }

               function frmAbrirAutorizaSolicitudesShow($sender, $params){
                  global $sContrato,$sIdUsuario;
                  global $_SESSION,$Usuario,$Clave,$Servidor;


                  $this->database->setConnected(false);
                  $this->database->setDatabaseName($_SESSION['database']);
                  $this->database->setUserName($Usuario);
                  $this->database->setUserPassword($Clave);
                  $this->database->setHost($Servidor);
                  $this->database->setConnected(true);

                  $this->tableSolicitud->setActive(false);
                  $this->tableSolicitud->setFilter(" sContrato='$sContrato' and lStatus<>'Pendiente' ");
                  $this->tableSolicitud->setActive(true);

                  $this->tableRequisicion->setActive(false);
                  $this->tableRequisicion->setFilter(" sContrato='$sContrato' and lStatus<>'Pendiente' ");
                  $this->tableRequisicion->setActive(true);

                  $this->tablePedidos->setActive(false);
                  $this->tablePedidos->setFilter(" sContrato='$sContrato' and sStatus<>'Pendiente' ");
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
                  if($lAutorizaSolicitudMat!= "Si" )$this->cmdAbrirSolicitud->setEnabled(false);
                  if($lAutorizaReq != "Si" )$this->cmdAbrirAutorizaRequisicion->setEnabled(false);
                  if($lVerificaReq != "Si" )$this->cmdAbrirVerificarReq->setEnabled(false);
                  if($lRecibeReq   != "Si" )$this->cmdAbrirRecibirRequisicion->setEnabled(false);
                  if($lAutorizaPedido != "Si" )$this->cmdAbreAutorizaCompra->setEnabled(false);
                  if($llRevisaGOperacion != "Si" )$this->cmdAbreRevCompra->setEnabled(false);
                  if($lRevisaCoordAdmin != "Si" )$this->cmdAbreRevAdmin->setEnabled(false);




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
//                              $this->kardex("Cambio de Status de Revisado a Pendiente de la Orden de Compra No $iFolioPedido");

        }

        global $application;

        global $frmAbrirAutorizaSolicitudes;

        //Creates the form
        $frmAbrirAutorizaSolicitudes=new frmAbrirAutorizaSolicitudes($application);

        //Read from resource file
        $frmAbrirAutorizaSolicitudes->loadResource(__FILE__);

        //Shows the form
        $frmAbrirAutorizaSolicitudes->show();

?>
<script>
                  document.getElementById("Panel1_outer").style.display='block';
                  document.getElementById("Panel2_outer").style.display='none';
                  document.getElementById("Panel3_outer").style.display='none';
                  document.getElementById("cmdSolicitudes").disabled=true;
                  document.getElementById("cmdRequisiciones").disabled=false;
                  document.getElementById("cmdOC").disabled=false;
                  document.getElementById("Memo1").value = "";
                  ResaltarBotones();
</script>
