<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("/line/line.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("dbgrids.inc.php");
       // use_unit("PEAR/peardatagrid.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require("fnUtilerias.php");
        require("mysql.inc.php");
        //Class definition
        class Unit2 extends Page
        {
               public $sCedulaAntefirman = null;
               public $sCedulaAreaResponsable = null;
               public $cedulaProcedencia = null;
               public $lCedulaProcede = null;
               public $cmdEliminar = null;
               public $cmdImprimir = null;
               public $cmdCancelar = null;
               public $cmdAceptar = null;
               public $cmdModificar = null;
               public $cmdNuevo = null;
               public $mOrdenContratista = null;
               public $dOrdenFechaFirma = null;
               public $sOrdenAntefirman = null;
               public $mOrdenResidente = null;
               public $mOrdenSupervisor = null;
               public $sOrdenNotificacionesdeCambio = null;
               public $sOrdenAnalisisdePrecios = null;
               public $sOrdenSancionesdeCampo = null;
               public $sOrdenPreciosExtraordinarios = null;
               public $sOrdenModificacionProgramas = null;
               public $sOrdenNotasBitacora = null;
               public $sOrdenIngenieria = null;
               public $sOrdenOficios = null;
               public $mOrdenOtros = null;
               public $iOrdenPlazo = null;
               public $dOrdenMonto = null;
               public $dOrdenFecha = null;
               public $sOrdenCambio = null;
               public $sOrdenOficio = null;
               public $Label55 = null;
               public $Label54 = null;
               public $Label53 = null;
               public $Label51 = null;
               public $Label50 = null;
               public $Edit7 = null;
               public $Label49 = null;
               public $Label48 = null;
               public $Label47 = null;
               public $Label46 = null;
               public $Label45 = null;
               public $Label44 = null;
               public $Label43 = null;
               public $Label42 = null;
               public $Label41 = null;
               public $Label40 = null;
               public $panelOrdenCambio = null;
               public $sDictamenAntefirman = null;
               public $mDictamenResidente = null;
               public $mDictamenVerificacionPresupuestal = null;
               public $mDictamenJustificacion = null;
               public $mDictamenAntecedentes = null;
               public $mDictamenFundamento = null;
               public $mDictamenDescripcion = null;
               public $Label39 = null;
               public $Label38 = null;
               public $Label37 = null;
               public $Label36 = null;
               public $Label35 = null;
               public $Label34 = null;
               public $Label33 = null;
               public $Label32 = null;
               public $panelDictamenTecnico = null;
               public $cmdOrdenCambio = null;
               public $cmdDictamenTecnico = null;
               public $cmdNotificacionCambio = null;
               public $cmdCedulaProcedencia = null;
               public $lNotificacionPropuesta = null;
               public $lNotificacionComentarios = null;
               public $dNotificacionFechaFirma = null;
               public $mNotificacionContratista = null;
               public $sNotificacionOficio = null;
               public $sNotificacionAntefirman = null;
               public $mNotificacionResidente = null;
               public $mNotificacionSupervisor = null;
               public $sNotificacionPlanosAdjuntos = null;
               public $sNotificacionOtroRequerimiento = null;
               public $iNotificacionEntregaPropuesta = null;
               public $sNotificacionExtiendeTiempo = null;
               public $sNotificacionRequierePrecios = null;
               public $sNotificacionProcede = null;
               public $Label31 = null;
               public $Label30 = null;
               public $Label29 = null;
               public $Label28 = null;
               public $Label27 = null;
               public $Label26 = null;
               public $Label25 = null;
               public $Label24 = null;
               public $Label23 = null;
               public $Label22 = null;
               public $Label21 = null;
               public $Label20 = null;
               public $Label19 = null;
               public $mNotificacionDescripcion = null;
               public $dNotificacionFecha = null;
               public $Label18 = null;
               public $Label17 = null;
               public $panelNotificacionCambio = null;
               public $Label16 = null;
               public $Label15 = null;
               public $Label14 = null;
               public $mCedulaAccionesPropuestas = null;
               public $Label13 = null;
               public $Label12 = null;
               public $sCedulaSoporte = null;
               public $Label11 = null;
               public $iCedulaDiasProrroga = null;
               public $iCedulaDiasPlazo = null;
               public $Label10 = null;
               public $Label9 = null;
               public $Label8 = null;
               public $Label7 = null;
               public $dCedulaMontoRequerido = null;
               public $Label6 = null;
               public $Label5 = null;
               public $mCedulaCambioPropuesto = null;
               public $Label4 = null;
               public $mCedulaProblematica = null;
               public $Label3 = null;
               public $Label2 = null;
               public $mCedulaMotivo = null;
               public $Label1 = null;
               public $iCedulaProcedencia = null;
               public $panelCedulaProcedencia = null;
               public $DBGrid1 = null;
               public $Datasource1 = null;
               public $Query1 = null;
               public $Database1 = null;
               public $noExisten;
               public $Combos;
               public $Fechas;
               public $checkBox;
               public $Radio;
               function dOrdenMontoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here
               document.getElementById("dOrdenMonto").select();
               document.getElementById("dOrdenMonto").style.background="#FFAD5B";
               <?php

               }

               function sOrdenOficioJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here
               document.getElementById("sOrdenOficio").select();
               document.getElementById("sOrdenOficio").style.background="#FFAD5B";
               <?php

               }

               function sOrdenOficioJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here
                document.getElementById("sOrdenOficio").style.background="#FFFFFF";
               <?php

               }

               function sOrdenAntefirmanJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
               var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
               if(keyCode==13) {
                  document.getElementById("mOrdenContratista").focus();
                  return false;
               }

               <?php

               }

               function mOrdenResidenteJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
               var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
               if(keyCode==13) {
                  document.getElementById("mOrdenAntefirman").focus();
                  return false;
               }

               <?php

               }

               function mOrdenSupervisorJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
               var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
               if(keyCode==13) {
                  document.getElementById("mOrdenResidente").focus();
                  return false;
               }

               <?php

               }

               function sOrdenNotificacionesdeCambioJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
               var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
               if(keyCode==13) {
                  document.getElementById("mOrdenSupervisor").focus();
                  return false;
               }

               <?php

               }

               function mOrdenOtrosJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
               var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
               if(keyCode==13) {
                  document.getElementById("sOrdenNotificacionesdeCambio").focus();
                  return false;
               }

               <?php

               }



               function iOrdenPlazoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
               var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
               if(keyCode==13) {
                  document.getElementById("mOrdenOtros").focus();
                  return false;
               }
               <?php

               }

               function dOrdenMontoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
               var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
               if(keyCode==13) {
                  document.getElementById("iOrdenPlazo").focus();
                  return false;
               }
               <?php

               }

               function sOrdenCambioJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
               var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
               if(keyCode==13) {
                  document.getElementById("dOrdenFecha").focus();
                  return false;
               }
               <?php

               }

               function sOrdenOficioJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
               var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
               if(keyCode==13) {
                  document.getElementById("sOrdenCambio").focus();
                  return false;
               }
               <?php

               }



               function cmdAceptarClick($sender, $params)
               {
                  if($this->cedulaProcedencia->Value==""){
                     $this->insertarRegistro();
                  }
                  else{
                     $this->actualizarRegistro();
                  }


               }

               function cmdImprimirJSClick($sender, $params)
               {
               global $sContrato;
               ?>
                  //obtener el campo iCedulaProcedencia del Grid

                  coliCedulaProcedencia = 0;

                  DBGrid1.getSelectionModel().iterateSelection(
                     function(index) {
                        ruta = "../reporte.php";
                        ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                        var tableModel = DBGrid1.getTableModel();

                        var iCedulaProcedencia = tableModel.getValue(coliCedulaProcedencia, index);
                        ruta = ruta + "&iCedulaProcedencia=" + iCedulaProcedencia;
                        ruta = ruta + "&reportesPath=ordenDeCambio";
                        ruta = ruta + "&nombreReporte=index";
                        var status = window.open(ruta,"_blank","fullscreen=no,menubar=no,status=no,titlebar=no,toolbar=no");
                     }

                  );

                 return false;

               <?php

               }

               function cmdEliminarJSClick($sender, $params)
               {

               ?>
                  //obtener el campo iCedulaProcedencia del Grid
                   if(!confirm("realmente desea eliminar el registro?"))
                     return false;
                  coliCedulaProcedencia = 0;

                  DBGrid1.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = DBGrid1.getTableModel();

                        var iCedulaProcedencia = tableModel.getValue(coliCedulaProcedencia, index);

                        if(iCedulaProcedencia != "")params = iCedulaProcedencia+ "]"; else params="_]";
                        <?php
                        echo $this->DBGrid1->ajaxCall("eliminarRegistro");
                        ?>
                     }

                  );

                 return false;

               <?php

               }



               function Unit2JSLoad($sender, $params)
               {

               ?>
               document.getElementById("cmdNuevo").disabled=false;
               document.getElementById("cmdModificar").disabled=false;
               document.getElementById("cmdAceptar").disabled=true;
               document.getElementById("cmdImprimir").disabled=false;
               document.getElementById("cmdEliminar").disabled=false;
               document.getElementById("cmdCancelar").disabled=true;
               document.getElementById("panelCedulaProcedencia_outer").style.display='block';
               document.getElementById("panelDictamenTecnico_outer").style.display='none';
               document.getElementById("panelNotificacionCambio_outer").style.display='none' ;
               document.getElementById("panelOrdenCambio_outer").style.display='none';

              var formInputs = document.getElementsByTagName('input');
                     for (var i = 0; i < formInputs.length; i++) {
                    var theInput = formInputs[i];
                    if (theInput.type == 'text' ) {
                        theInput.disabled=true;
                    }
               }
               return false;
               <?php

               }



               function cmdModificarJSClick($sender, $params)
               {

               ?>
               document.getElementById("cmdNuevo").disabled=true;
               document.getElementById("cmdModificar").disabled=true;
               document.getElementById("cmdAceptar").disabled=false;
               document.getElementById("cmdImprimir").disabled=true;
               document.getElementById("cmdEliminar").disabled=true;
               document.getElementById("cmdCancelar").disabled=false;
               document.getElementById("cedulaProcedencia").value=document.getElementById("iCedulaProcedencia").value;
               //habilitar  textarea
               var formInputs = document.getElementsByTagName('textarea');
                  for (var i = 0; i < formInputs.length; i++) {
                  var theInput = formInputs[i];
                  if (theInput.type == 'textarea' ) {
                      theInput.disabled=false;
                  }
               }

               //habilitar  text
               var formInputs = document.getElementsByTagName('input');
                  for (var i = 0; i < formInputs.length; i++) {
                  var theInput = formInputs[i];
                  if (theInput.type == 'text' ) {
                      theInput.disabled=false;
                  }
               }
               return false;
               <?php

               }

               function cmdCancelarJSClick($sender, $params)
               {

               ?>
               document.getElementById("cmdNuevo").disabled=false;
               document.getElementById("cmdModificar").disabled=false;
               document.getElementById("cmdAceptar").disabled=true;
               document.getElementById("cmdImprimir").disabled=false;
               document.getElementById("cmdEliminar").disabled=false;
               document.getElementById("cmdCancelar").disabled=true;

               //habilitar  textarea
               var formInputs = document.getElementsByTagName('textarea');
                  for (var i = 0; i < formInputs.length; i++) {
                  var theInput = formInputs[i];
                  if (theInput.type == 'textarea' ) {
                      theInput.disabled=true;
                  }
               }

               //habilitar  text
               var formInputs = document.getElementsByTagName('input');
                  for (var i = 0; i < formInputs.length; i++) {
                  var theInput = formInputs[i];
                  if (theInput.type == 'text' ) {
                      theInput.disabled=true;
                  }
               }
               return false;
               <?php

               }

               function cmdNuevoJSClick($sender, $params)
               {

               ?>
               document.getElementById("cmdNuevo").disabled=true;
               document.getElementById("cmdModificar").disabled=true;
               document.getElementById("cmdAceptar").disabled=false;
               document.getElementById("cmdImprimir").disabled=true;
               document.getElementById("cmdEliminar").disabled=true;
               document.getElementById("cmdCancelar").disabled=false;
                document.getElementById("cedulaProcedencia").value="";
               //habilitar  textarea
               var formInputs = document.getElementsByTagName('textarea');
                  for (var i = 0; i < formInputs.length; i++) {
                  var theInput = formInputs[i];
                  if (theInput.type == 'textarea' ) {
                      theInput.disabled=false;
                  }
               }

               //habilitar  text
               var formInputs = document.getElementsByTagName('input');
                  for (var i = 0; i < formInputs.length; i++) {
                  var theInput = formInputs[i];
                  if (theInput.type == 'text' ) {
                      theInput.disabled=false;
                  }
               }

               //limpiar  textarea
               var formInputs = document.getElementsByTagName('textarea');
               for (var i = 0; i < formInputs.length; i++) {
                 var theInput = formInputs[i];
                 if (theInput.type == 'textarea' ) {
                     theInput.value ='';
                 }
               }

               //limpiar  text
               var formInputs = document.getElementsByTagName('input');
               for (var i = 0; i < formInputs.length; i++) {
                 var theInput = formInputs[i];
                 if (theInput.type == 'text' ) {
                     theInput.value ='';
                 }
               }
               //limpar
               var formInputs = document.getElementsByTagName('textarea');
               for (var i = 0; i < formInputs.length; i++) {
                 var theInput = formInputs[i];
                 if (theInput.type == 'textarea' ) {
                      theInput.innerHTML='';
                 }
               }
               return false;
               <?php

               }



               function Unit2Show($sender, $params)
               {
                  global $sContrato;
                  $this->cargarCampos();
                  $this->llenarForm();
                  $this->cargarGrid();

               }
               function ponerCheckBox($Check,$Value){
                  if($Value=="Si"){
                     eval($Check."->Checked=true;");
                  }else{
                     eval($Check."->Checked=false;");
                  }
               }

               function leerCheckBox($Check){
                  eval("\$Valor = ".$Check."->Checked;");
                  $file = fopen("leerCheckBox.txt","a+");
                  fwrite($file,"\n$Check = $Valor ");
                  fclose($file);
                  if($Valor){
                     return "Si";
                  }
                  else{
                     return "No";
                  }
               }

               function LeerTextoCombo($Combo){
                  eval("\$indice=".$Combo."->readItemIndex();");
                  eval("\$valor=".$Combo."->readItems();");
                  foreach($valor as $i => $v){
                     if($i == $indice) {
                         return $v;
                     }
                  }
                  return -1;
               }
               function ponerCombo($combo,$valor){
                  #poner o seleccionar el valor de un combo
                  eval("\$Combo=".$combo."->getItems();");
                  foreach ($Combo as $index=>$value){
                     if($value==$valor){
                        $evaluacion =  $combo."->setItemIndex($index);";
                        eval($evaluacion);
                     }
                  }
               }
               function DBGrid1JSClick($sender, $params)
               {

               ?>
                  //obtener el campo iCedulaProcedencia del Grid

                  coliCedulaProcedencia = 0;

                  DBGrid1.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = DBGrid1.getTableModel();

                        var iCedulaProcedencia = tableModel.getValue(coliCedulaProcedencia, index);

                        if(iCedulaProcedencia != "")params = iCedulaProcedencia+ "]"; else params="_]";
                        <?php
                        echo $this->DBGrid1->ajaxCall("llenarForm");
                        ?>
                     }

                  );
                  var formInputs = document.getElementsByTagName('input');
                     for (var i = 0; i < formInputs.length; i++) {
                    var theInput = formInputs[i];
                    if (theInput.type == 'text' ) {
                        theInput.disabled=true;
                    }
                  }
                 // setTimeOut(document.getElementById("cmdNuevo").disabled=false);
                 // document.getElementById("cmdModificar").disabled=false;
                 // document.getElementById("cmdAceptar").disabled=true;
                 // document.getElementById("cmdImprimir").disabled=false;
                 // document.getElementById("cmdEliminar").disabled=false;

                  setTimeout("document.getElementById('cmdCancelar').disabled=true;",2500)
                 return false;
               <?php

               }

               function llenarForm($sender="", $params=""){
                  global $sContrato;
                  $this->conectar();
                  if($params=="")
                     $sql="select * from ordendecambio where sContrato='$sContrato' limit 1";
                  else
                     $sql="select * from ordendecambio where sContrato='$sContrato' and iCedulaProcedencia='$params'";
                  $rs = mysql_query($sql);
                  if($row = mysql_fetch_array($rs)){
                     for($iCampo=0;$iCampo<mysql_num_fields($rs);$iCampo++){
                       $campo = mysql_field_name($rs,$iCampo);
                       $row[$campo]= str_replace('"',"'",$row[$campo]);
                       $nombre ="$"."this->".$campo;
                       $evaluacion = $nombre."->Text=\"".$row[$campo]."\";";

                       if (in_array($campo,$this->noExisten)){
                        continue;
                       }
                       if (in_array($campo, $this->Fechas)){
                          $evaluacion = $nombre."->Text=\"".formatoFecha($row[$campo])."\";";
                       }
                       if (in_array($campo, $this->checkBox)){
                        $this->ponerCheckBox($nombre,$row[$campo]);
                        continue;
                       }
                       if (in_array($campo, $this->Radio)){
                        //con esto se valua el otro campo lNotificacionConComentarios
                        if($campo=="lNotificacionSinComentarios"){
                           if($row[$campo]=="Si")
                              $this->lNotificacionComentarios->ItemIndex=0;
                           else
                              $this->lNotificacionComentarios->ItemIndex=1;
                        }
                        //con esto se valua el otro campo lNotificacionConPropuesta
                        if($campo=="lNotificacionSinPropuesta"){
                           if($row[$campo]=="Si")
                              $this->lNotificacionPropuesta->ItemIndex=0;
                           else
                              $this->lNotificacionPropuesta->ItemIndex=1;
                        }
                        //con esto se valua el otro campo lCedulaNoProcede
                        if($campo=="lCedulaProcede"){
                           if($row[$campo]=="Si")
                              $this->lCedulaProcede->ItemIndex=0;
                           else
                              $this->lCedulaProcede->ItemIndex=1;
                        }
                        continue;
                       }
                       if (in_array($campo, $this->Combos)) {
                           $this->ponerCombo($nombre,$row[$campo]) ;
                           continue;
                        }
                        eval($nombre."->Enabled=False;");
                        eval($evaluacion);
                    }
                  }
                 // $this->cmdAceptar->Enabled=false;
                 // $this->cmdCancelar->Enabled=false;
               }
               function actualizarRegistro(){
                  global $sContrato;
                  $this->conectar();
                  $this->cargarCampos();
                  $rs = mysql_query("describe ordendecambio");
                  $update = "\nupdate ordendecambio set ";
                  while($row = mysql_fetch_array($rs)){
                     $campo = $row[0];//mysql_field_name($rs,0);
                     $nombreField ="$"."this->".$campo;
                     $valor = "";
                     if (in_array($campo,$this->noExisten)){
                       continue;
                     }
                     else if (in_array($campo, $this->Fechas)){
                          eval("\$valor = ". $nombreField."->Text;");
                          if($valor=="")$valor=date("d/m/Y");
                          $valor = formatoFechaPer($valor,"Y-m-d") ;
                     }
                     else if (in_array($campo, $this->checkBox)){
                          $valor = $this->leerCheckBox($nombreField);
                     }
                     else if (in_array($campo, $this->Radio)){
                        //con esto se valua el otro campo lNotificacionConComentarios
                        if($campo=="lNotificacionSinComentarios"){
                           if($this->lNotificacionComentarios->ItemIndex==0)
                              $valor="Si";
                           else
                              $valor="No";
                        }
                        if($campo=="lNotificacionConComentarios"){
                           if($this->lNotificacionComentarios->ItemIndex==1)
                              $valor="Si";
                           else
                              $valor="No";
                        }
                        //con esto se valua el otro campo lNotificacionConPropuesta
                        if($campo=="lNotificacionSinPropuesta"){
                           if($this->lNotificacionPropuesta->ItemIndex==0)
                              $valor="Si";
                           else
                              $valor="No";
                        }
                        if($campo=="lNotificacionConPropuesta"){
                           if($this->lNotificacionPropuesta->ItemIndex==1)
                              $valor="Si";
                           else
                              $valor="No";
                        }

                        //con esto se valua el otro campo lCedulaNoProcede
                        if($campo=="lCedulaProcede"){
                           if($this->lCedulaProcede->ItemIndex==0)
                              $valor="Si";
                           else
                              $valor="No";
                        }
                        if($campo=="lCedulaNoProcede"){
                           if($this->lCedulaProcede->ItemIndex==1)
                              $valor="Si";
                           else
                              $valor="No";
                        }

                     }
                     else if (in_array($campo, $this->Combos)) {
                           $valor = $this->LeerTextoCombo($nombreField);

                     }
                     else{
                        $evaluar ="\$valor = ".$nombreField."->Text;";
                        eval($evaluar);
                     }

                     $valor = str_replace("\"","'",$valor);
                     $update .="\n$campo = \"$valor\",";
                  }
                  $update.="<";
                  $update = str_replace(",<"," ",$update);
                  $cp=$this->cedulaProcedencia->Value;
                  $this->cedulaProcedencia->Value="";
                  $update .= " \nwhere sContrato='$sContrato' and iCedulaProcedencia='$cp'";
                  /*
                  $file = fopen("actualiza.txt","a+");
                  fwrite($file,$update);
                  fclose($file);        */

                  mysql_query($update);
                  $this->llenarForm();
                  $this->cargarGrid();
               }
               function insertarRegistro(){
                  global $sContrato;
                  $this->conectar();
                  $this->cargarCampos();
                  $rs = mysql_query("describe ordendecambio");
                  $insert = "\ninsert into  ordendecambio (sContrato,";
                  $ValoresTabla .="\n\"$sContrato\",";
                  while($row = mysql_fetch_array($rs)){
                     $campo = $row[0];//mysql_field_name($rs,0);
                     $nombreField ="$"."this->".$campo;
                     $valor = "";
                     if (in_array($campo,$this->noExisten)){
                       continue;
                     }
                     else if (in_array($campo, $this->Fechas)){
                          eval("\$valor = ". $nombreField."->Text;");
                          if($valor=="")$valor=date("d/m/Y");
                          $valor = formatoFechaPer($valor,"Y-m-d") ;
                     }
                     else if (in_array($campo, $this->checkBox)){
                          $valor = $this->leerCheckBox($nombreField);
                     }
                     else if (in_array($campo, $this->Radio)){
                        //con esto se valua el otro campo lNotificacionConComentarios
                        if($campo=="lNotificacionSinComentarios"){
                           if($this->lNotificacionComentarios->ItemIndex==0)
                              $valor="Si";
                           else
                              $valor="No";
                        }
                        if($campo=="lNotificacionConComentarios"){
                           if($this->lNotificacionComentarios->ItemIndex==1)
                              $valor="Si";
                           else
                              $valor="No";
                        }
                        //con esto se valua el otro campo lNotificacionConPropuesta
                        if($campo=="lNotificacionSinPropuesta"){
                           if($this->lNotificacionPropuesta->ItemIndex==0)
                              $valor="Si";
                           else
                              $valor="No";
                        }
                        if($campo=="lNotificacionConPropuesta"){
                           if($this->lNotificacionPropuesta->ItemIndex==1)
                              $valor="Si";
                           else
                              $valor="No";
                        }

                        //con esto se valua el otro campo lCedulaNoProcede
                        if($campo=="lCedulaProcede"){
                           if($this->lCedulaProcede->ItemIndex==0)
                              $valor="Si";
                           else
                              $valor="No";
                        }
                        if($campo=="lCedulaNoProcede"){
                           if($this->lCedulaProcede->ItemIndex==1)
                              $valor="Si";
                           else
                              $valor="No";
                        }

                     }
                     else if (in_array($campo, $this->Combos)) {
                           $valor = $this->LeerTextoCombo($nombreField);

                     }
                     else{
                        $evaluar ="\$valor = ".$nombreField."->Text;";
                        eval($evaluar);
                     }
                     $CamposTabla.= "\n$campo,";
                     $valor = str_replace("\"","'",$valor);
                     $ValoresTabla .="\n\"$valor\",";
                  }
                  $insert.=$CamposTabla;
                  $insert.="<";
                  $insert = str_replace(",<"," ) values (",$insert);
                  $insert.=$ValoresTabla;
                  $insert.="<";
                  $insert = str_replace(",<"," ) ",$insert);

                  $this->cedulaProcedencia->Value="";

                  /*$file = fopen("insertar.txt","a+");
                  fwrite($file,$insert);
                  fclose($file);*/
                  mysql_query($insert);
                  $this->llenarForm();
                  $this->cargarGrid();

               }
               function eliminarRegistro($sender="",$params=""){
                  global $sContrato;
                  mysql_query("delete from ordendecambio where sContrato='$sContrato' and iCedulaProcedencia='$params'");
                  $this->llenarForm();
                  $this->cargarGrid();

               }
               function cargarGrid(){
                  $this->conectar();
                  global $sContrato;
                  $sql = "select
                        iCedulaProcedencia as Notifiacion_No,
                        sCedulaAreaResponsable as Responsable,
                        dOrdenMonto as Monto_Requerido,
                        sOrdenOficio as  Oficio_De_Notificacion,
                        sOrdenCambio as Orden_De_Cambio,
                        dNotificacionFecha as Fecha_Efectiva
                       from ordendecambio
                       where sContrato='$sContrato'";
                     //   and r.sIdTurno='$sIdTurno'
                   $this->Query1->Active=false;
                   $this->Query1->setSQL($sql);
                   $this->Query1->Active=true;
               }
               function cargarCampos(){
                        $this->Fechas = array(
                           "dNotificacionFecha",
                           "dNotificacionFechaFirma",
                           "dOrdenFecha",
                           "dOrdenFechaFirma"
                        );
                       $this->Combos = array(
                           "sNotificacionProcede",
                           "sNotificacionRequierePrecios",
                           "sNotificacionExtiendeTiempo"

                       );
                       $this->checkBox = array(
                           "sNotificacionPlanosAdjuntos",
                           "sOrdenOficios",
                           "sOrdenIngenieria",
                           "sOrdenNotasBitacora",
                           "sOrdenModificacionProgramas",
                           "sOrdenPreciosExtraordinarios",
                           "sOrdenSancionesdeCampo",
                           "sOrdenAnalisisdePrecios"

                       );
                       $this->Radio= array(
                           "lNotificacionSinComentarios",
                           "lNotificacionConComentarios",
                           "lNotificacionConPropuesta",
                           "lNotificacionSinPropuesta",
                           "lCedulaProcede",
                           "lCedulaNoProcede",
                       );
                       //lNotificacionSinComentarios
                       //lNotificacionPropuesta
                       //lCedulaProcede
                        $this->noExisten=array(
                           "sContrato",
                           "lStatus");
               }
               function cmdOrdenCambioJSClick($sender, $params)
               {

               ?>
                 document.getElementById("panelCedulaProcedencia_outer").style.display=  'none';
                 document.getElementById("panelDictamenTecnico_outer").style.display='none' ;
                 document.getElementById("panelNotificacionCambio_outer").style.display='none';
                 document.getElementById("panelOrdenCambio_outer").style.display='block';
                  document.getElementById("cmdCedulaProcedencia").enabled='true';
                  document.getElementById("cmdNotificacionCambio").enabled='true';
                  document.getElementById("cmdDictamenTecnico").enabled='true';
                  document.getElementById("cmdOrdenCambio").enabled='false';
                 return false;


               <?php

               }

               function cmdDictamenTecnicoJSClick($sender, $params)
               {

               ?>
                 document.getElementById("panelCedulaProcedencia_outer").style.display=  'none';
                 document.getElementById("panelDictamenTecnico_outer").style.display='block';
                 document.getElementById("panelNotificacionCambio_outer").style.display='none' ;
                 document.getElementById("panelOrdenCambio_outer").style.display='none';

                  document.getElementById("cmdCedulaProcedencia").enabled='true';
                  document.getElementById("cmdNotificacionCambio").enabled='true';
                  document.getElementById("cmdDictamenTecnico").enabled='false';
                  document.getElementById("cmdOrdenCambio").enabled='true';

                 return false;



               <?php

               }

               function cmdNotificacionCambioJSClick($sender, $params)
               {

               ?>
                 document.getElementById("panelCedulaProcedencia_outer").style.display=  'none';
                 document.getElementById("panelDictamenTecnico_outer").style.display='none' ;
                 document.getElementById("panelNotificacionCambio_outer").style.display='block';
                 document.getElementById("panelOrdenCambio_outer").style.display='none';
                  document.getElementById("cmdCedulaProcedencia").enabled='true';
                  document.getElementById("cmdNotificacionCambio").enabled='false';
                  document.getElementById("cmdDictamenTecnico").enabled='true';
                  document.getElementById("cmdOrdenCambio").enabled='true';
                 return false;

               <?php

               }

               function cmdCedulaProcedenciaJSClick($sender, $params)
               {

               ?>
                  document.getElementById("cmdCedulaProcedencia").enabled='false';
                  document.getElementById("cmdNotificacionCambio").enabled='true';
                  document.getElementById("cmdDictamenTecnico").enabled='true';
                  document.getElementById("cmdOrdenCambio").enabled='true';

                 document.getElementById("panelCedulaProcedencia_outer").style.display='block';
                 document.getElementById("panelDictamenTecnico_outer").style.display='none';
                 document.getElementById("panelNotificacionCambio_outer").style.display='none' ;
                 document.getElementById("panelOrdenCambio_outer").style.display='none';


                 return false;

               <?php

               }
                              #conecta con el servidor MySQL
               function conectar(){
                  global $Usuario;
                  global $Clave;
                  global $_SESSION;
                  $this->Database1->SetUserName($Usuario);
                  $this->Database1->SetUserPassword($Clave);
                  $this->Database1->SetDatabaseName($_SESSION['database']);
                  $this->Database1->setConnected(true);
                  mysql_connect("127.0.0.1",$Usuario,$Clave);
                  mysql_select_db($_SESSION['database']);
               }


        }

        global $application;

        global $Unit2;
//        $sContrato = "428237813";
        //Creates the form
        $Unit2=new Unit2($application);

        //Read from resource file
        $Unit2->loadResource(__FILE__);

        //Shows the form
        $Unit2->show();

?>
<script>
//poner el grid como solo lectura
function Edit(DBGrid1_tableModel){
   var valor = DBGrid1_tableModel.getValue(0, 0);
   if(valor != null)
   {
      for(var i = 0; i<=6; i++)
         DBGrid1_tableModel.setColumnEditable(i, false);
      //DBGrid1.setColumnWidth(0,0);
   }
}
setInterval ("Edit(DBGrid1_tableModel)",10);
Edit(DBGrid1_tableModel);
</script>
