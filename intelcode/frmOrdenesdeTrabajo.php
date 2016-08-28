<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("EditAdal.inc.php");
        use_unit("menus.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require_once("mysql.inc.php");
        require("fnUtilerias.php");
        //Class definition
        class FrmOrdenTrabajo extends Page
        {
            public $Label12 = null;
            public $ChkTipoA = null;
            public $ChkPermiso = null;
            public $ChkComent = null;
            public $ChkProg = null;
            public $ChkReal = null;
            public $GroupBox2 = null;
            public $txtsNumeroOrden = null;
            public $txtsIdFolio = null;
               public $eliminar = null;
               public $panelMensaje = null;
               public $memoMensaje = null;
               public $cmdOcultarMensaje = null;
               public $sOperacion = null;
               public $sNumeroOrdenOld = null;
               public $dsOrdenTrabajo = null;
               public $dataOrdenTrabajo = null;
               public $qryOrdenTrabajo = null;
               public $txtiConsecutivoTierra = null;
               public $txtiConsecutivo = null;
               public $txtiJornada = null;
               public $txtsFormato = null;
               public $txtmComentarios = null;
               public $cbocIdStatus = null;
               public $cbosIdPernocta = null;
               public $cbosIdPlataforma = null;
               public $timedFfProgramado = null;
               public $timedFiProgramado = null;
               public $cbosApoyo = null;
               public $txtmDescripcion = null;
               public $cbosIdTipoOrden = null;
               public $cmdImprimir = null;
               public $cmdEliminar = null;
               public $cmdCancelar = null;
               public $cmdAceptar = null;
               public $cmdModificar = null;
               public $cmdAgregar = null;
               public $dbgNumeroOrden = null;
               public $Label15 = null;
               public $Label14 = null;
               public $Label13 = null;
               public $Label11 = null;
               public $Label10 = null;
               public $Label9 = null;
               public $Label8 = null;
               public $Label7 = null;
               public $Label6 = null;
               public $Label5 = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;
               public $GroupBox1 = null;
               private $avance_real;
               private $avance_prog;
               private $comentario;
               private $permiso;
               private $tipo_admon;
               public $txtsDescripcionCorta = null;



            function FrmOrdenTrabajoJSLoad($sender, $params)
            {

            ?>
            //Add your javascript code here
            <?php
            }

            function ChkRealJSFocus($sender, $params)
            {

            ?>
            //Add your javascript code here
            <?php

            }

            function ChkRealJSClick($sender, $params)
            {

            ?>
            //Add your javascript code here
            
            
            <?php

            }





               function cmdImprimirJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  document.getElementById("txtmDescripcion").style.background="#FFAD5B";
               <?php

               }

               function txtmComentariosJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtmComentariosJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtmComentariosJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbocIdStatusJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbocIdStatusJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosIdPernoctaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosIdPernoctaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosIdPlataformaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosIdPlataformaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosApoyoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosApoyoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosIdTipoOrdenJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosIdTipoOrdenJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtiConsecutivoTierraJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtiConsecutivoTierraJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtiConsecutivoTierraJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtiConsecutivoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtiConsecutivoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtiConsecutivoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtiJornadaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtiJornadaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtiJornadaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtsFormatoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtsFormatoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtsFormatoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtmDescripcionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtmDescripcionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtmDescripcionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtsDescripcionCortaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtsIdFolioJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtsNumeroOrdenJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtsDescripcionCortaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtsDescripcionCortaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtsIdFolioJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtsIdFolioJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }


               function txtsNumeroOrdenJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtsNumeroOrdenJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function FrmOrdenTrabajoBeforeShow($sender, $params)
               {
               $this->conectar();

               }

               function cmdOcultarMensajeJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                     //document.getElementById("panelFormatos_outer").style.display='none'
                 //document.getElementById("panelMensaje_outer").style.display='block';
                 document.getElementById("panelMensaje_outer").style.display='none';
                 return false;
               <?php

               }

               function cmdEliminarClick($sender, $params)
               {

                  global $sContrato;
                  if($this->eliminar->Value=="no"){
                     return false;
                  }
                  $tablas = array( "actividadescanceladas","actividadesfcanceladas","actividadesxgerencial","actividadesxgrupo","actividadesxorden","anexo_pedidos","anexo_requisicion","anexo_suministro",
                                       "avancesglobales","avancesglobalesxorden","avancesxactividad","bitacoradeactividades","bitacoradealcances","bitacoradepaquetes","bitacoragerencial","distribuciondeactividades",
                                       "estimaciones","estimacionxequipo","estimacionxisometrico","estimacionxpartida","estimacionxpartidaprov","estimacionxpersonal","estimaembarcaciones","estimaequipos","estimagastos","estimapersonal",
                                       "fasesxorden","firmas","gastosextras","inspeccionxjuntas","inspeccionxorden","jornadasdiarias","juntasxconcentrado","juntasxfase","juntasxpiezas","movimientosdepersonal","ordenes_frentes","ordenes_programamensual",
                                       "platicasdeseguridad","pndxjuntas","pndxorden","presupuestos","presupuestosxpartida","puntosdeinspeccion","reportediario","reportefotografico","reportegerencial","subactividadesxorden","tiempomuerto","tramitedepermisos");
                    $asociados = false;
                    foreach($tablas as $tabla){
                       $sql = "select sNumeroOrden from $tabla
                           where sContrato='$sContrato' and sNumeroOrden='".($this->sNumeroOrdenOld->value)."' limit 3";
                        $rs = mysql_query($sql);
                        if(mysql_num_rows($rs)>0){
                           $asociados = true;
                        }

                     }
                     if($asociados == false){
                        $sql = "delete from ordenesdetrabajo
                           where sContrato='$sContrato' and sNumeroOrden='".($this->sNumeroOrdenOld->value)."' ";
                         mysql_query($sql);
                     } else{
                        $this->memoMensaje->Text="EXISTEN REGISTROS ASOCIADOS EN OTROS MODULOS, NO SE ELIMINARÁ EL NUMERO DE ORDEN!";
                        $this->panelMensaje->setVisible(True);
                     }

               }


               function cmdAceptarClick($sender, $params)
               {
                  global $sContrato;
                  $tablas = array( "actividadescanceladas","actividadesfcanceladas","actividadesxgerencial","actividadesxgrupo","actividadesxorden","anexo_pedidos","anexo_requisicion","anexo_suministro",
                                       "avancesglobales","avancesglobalesxorden","avancesxactividad","bitacoradeactividades","bitacoradealcances","bitacoradepaquetes","bitacoragerencial","distribuciondeactividades",
                                       "estimaciones","estimacionxequipo","estimacionxisometrico","estimacionxpartida","estimacionxpartidaprov","estimacionxpersonal","estimaembarcaciones","estimaequipos","estimagastos","estimapersonal",
                                       "fasesxorden","firmas","gastosextras","inspeccionxjuntas","inspeccionxorden","jornadasdiarias","juntasxconcentrado","juntasxfase","juntasxpiezas","movimientosdepersonal","ordenes_frentes","ordenes_programamensual",
                                       "platicasdeseguridad","pndxjuntas","pndxorden","presupuestos","presupuestosxpartida","puntosdeinspeccion","reportediario","reportefotografico","reportegerencial","subactividadesxorden","tiempomuerto","tramitedepermisos");

                  $this->checkboxes();
                  if($this->sOperacion->value=="agregar"){
                     $sql = "insert into ordenesdetrabajo (
                              sContrato,
                              sIdFolio,
                              sNumeroOrden,
                              sDescripcionCorta,
                              mDescripcion,
                              sIdTipoOrden,
                              sApoyo,
                              sIdPlataforma,
                              sIdPernocta,
                              dFiProgramado,
                              dFfProgramado,
                              cIdStatus,
                              mComentarios,
                              sFormato,
                              iConsecutivo,
                              iConsecutivoTierra,
                              iJornada,
                              lGeneraAnexo,
                              lGeneraConsumibles,
                              lGeneraPersonal,
                              lGeneraEquipo,
                              sDepSolicitante,
                              sEquipo,
                              sPozo,
                              bAvanceFrente,
                              bAvanceContrato,
                              bComentarios,
                              bPermisos,
                              bTipoAdmon
                            ) values(
                            '$sContrato',
                            '".($this->txtsIdFolio->Text)."',
                            '".($this->txtsNumeroOrden->Text)."',
                            '".($this->txtsDescripcionCorta->Text)."',
                            '".($this->txtmDescripcion->Text)."',
                            '".($this->cbosIdTipoOrden->readItemIndex())."',
                            '".($this->cbosApoyo->readItemIndex())."',
                            '".($this->cbosIdPlataforma->readItemIndex())."',
                            '".($this->cbosIdPernocta->readItemIndex())."',
                            '".(formatoFechaPer($this->timedFiProgramado->Text,"Y-m-d"))."',
                            '".(formatoFechaPer($this->timedFfProgramado->Text,"Y-m-d"))."',
                            '".($this->cbocIdStatus->readItemIndex())."',
                            '".($this->txtmComentarios->Text)."',
                            '".($this->txtsFormato->Text)."',
                            '".($this->txtiConsecutivo->Text)."',
                            '".($this->txtiConsecutivoTierra->Text)."',
                            '".($this->txtiJornada->Text)."',
                            'No',
                            'No',
                            'No',
                            'No',
                            '',
                            '',
                            '',
                            '".($this->avance_real)."',
                            '".($this->avance_prog)."',
                            '".($this->comentario)."',
                            '".($this->permiso)."',
                            '".($this->tipo_admon)."'
                            );";
                            mysql_query($sql);

                  }else if($this->sOperacion->value=="modificar"){
                     mysql_query("BEGIN;");
                     $sql = "UPDATE  ordenesdetrabajo SET
                              sIdFolio = '".($this->txtsIdFolio->Text)."',
                              sNumeroOrden =  '".($this->txtsNumeroOrden->Text)."',
                              sDescripcionCorta ='".($this->txtsDescripcionCorta->Text)."',
                              mDescripcion='".($this->txtmDescripcion->Text)."',
                              sIdTipoOrden='".($this->cbosIdTipoOrden->readItemIndex())."',
                              sApoyo='".($this->cbosApoyo->readItemIndex())."',
                              sIdPlataforma='".($this->cbosIdPlataforma->readItemIndex())."',
                              sIdPernocta='".($this->cbosIdPernocta->readItemIndex())."',
                              dFiProgramado='".formatFecha(substr($this->timedFiProgramado->Text,0,10),"Y-m-d")."',
                              dFfProgramado='".formatFecha(substr($this->timedFfProgramado->Text,0,10),"Y-m-d")."',
                              cIdStatus='".($this->cbocIdStatus->readItemIndex())."',
                              mComentarios='".($this->txtmComentarios->Text)."',
                              sFormato='".($this->txtsFormato->Text)."',
                              iConsecutivo='".($this->txtiConsecutivo->Text)."',
                              iConsecutivoTierra='".($this->txtiConsecutivoTierra->Text)."',
                              iJornada= '".($this->txtiJornada->Text)."',
                              bAvanceFrente= '".($this->avance_real)."',
                              bAvanceContrato= '".($this->avance_prog)."',
                              bComentarios= '".($this->comentario)."',
                              bPermisos= '".($this->permiso)."',
                              bTipoAdmon= '".($this->tipo_admon)."'
                            WHERE sContrato='$sContrato' AND sNumeroOrden='".($this->sNumeroOrdenOld->value)."'; ";
                     if($this->txtsNumeroOrden->Text <> $this->sNumeroOrdenOld->Value){
                        foreach($tablas as $tabla){
                                $sql2 = "SELECT sNumeroOrden FROM $tabla WHERE sContrato='$sContrato' AND sNumeroOrden='".($this->sNumeroOrdenOld->value)."';";
                                $consulta2 = mysql_query($sql2);
                                if(mysql_num_rows($consulta2) > 0){
                                        $sql .= " UPDATE $tabla SET sNumeroOrden='".($this->txtsNumeroOrden->Text)."' WHERE sContrato='$sContrato' AND sNumeroOrden='".($this->sNumeroOrdenOld->value)."'; ";
                                }
                        }
                     }
                     //echo  $sql;
                     $query = mysql_query($sql);
                     $err = mysql_error();
                     if(!$query){
                           $error=true;
                     }

                     if($error){
                           mysql_query("ROLLBACK;");
                           echo "<script> alert('Ocurrio algun error');
                                </script>";
                                echo $err;
                     }
                     else{
                        mysql_query("COMMIT;");
                        echo "<script> alert('La transaccion se ejecuto corectamente' );</script>";
                     }
                  }
                  $this->qryOrdenTrabajo->Close();
                  $this->qryOrdenTrabajo->Active = False;
                  $this->qryOrdenTrabajo->Open();
                  /*
                  echo  formatFecha(substr($this->timedFiProgramado->Text,0,10),"Y-m-d").' ';
                  echo  formatFecha(substr($this->timedFfProgramado->Text,0,10),"Y-m-d");
                  }
                  */
               }

               function cmdEliminarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                    i = confirm("Realmente desea eliminar : " + document.getElementById("sNumeroOrdenOld").value);
                    if(!i){
                        alert("Operacion Cancelada");
                        document.getElementById("eliminar").value="no";
                        return false;
                    } else{
                        document.getElementById("eliminar").value="si";
                     return true;
                    }
               <?php

               }

               function dbgNumeroOrdenJSClick($sender, $params)
               {

               ?>

               //Add your javascript code here
                  deshabilitar(true,componentes);
                  document.getElementById("sNumeroOrdenOld").value="";
                  dbgNumeroOrden.getSelectionModel().iterateSelection(
                     function(index) {
                        var componentes = new Array("txtsNumeroOrden","txtsIdFolio","txtsDescripcionCorta","txtmDescripcion","cbosIdTipoOrden","cbosApoyo","f-calendar-field-1","f-calendar-field-2","cbosIdPlataforma","cbosIdPernocta","cbocIdStatus","txtmComentarios","txtsFormato","txtiJornada","txtiConsecutivo","txtiConsecutivoTierra","ChkReal","ChkProg","ChkComent","ChkPermiso","ChkTipoA");
                        var tableModel = dbgNumeroOrden.getTableModel();
                        for(i = 0; i<=componentes.length;i++){
                           if(i==0){
                              document.getElementById("sNumeroOrdenOld").value=tableModel.getValue(i, index);
                           }
                           //if(componentes[i]!=null)

                           if(componentes[i][0]=="c" && componentes[i][1]=="b" && componentes[i][2]=="o"){
                                 document.forms["frmOrdenTrabajo"][componentes[i]].value = tableModel.getValue(i, index);
                               //  alert(document.getElementById(componentes[i]).name + document.getElementById(componentes[i]).value);
                           }
                           else if(componentes[i][0]=="C" && componentes[i][1]=="h" && componentes[i][2]=="k"){
                                if(tableModel.getValue(i, index) == "Si"){
                                     document.getElementById(componentes[i]).checked=true;
                                }else{
                                     document.getElementById(componentes[i]).checked=false;
                                }
                                 //alert(document.getElementById(componentes[i]).name + document.getElementById(componentes[i]).value);
                           }
                           else{
                                 document.getElementById(componentes[i]).value=tableModel.getValue(i, index);
                                 //alert(document.getElementById(componentes[i]).name + document.getElementById(componentes[i]).value);
                           }
                        }
                     }

                  );

                 return false;
                 <?php
                 
               }


               function cmdCancelarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                   deshabilitar(true,componentes);
                   return false;

               <?php
               }

               function cmdModificarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                   deshabilitar(false,componentes);
                   document.getElementById("sOperacion").value = "modificar";
                   return false;
               <?php

               }

               function cmdAgregarJSClick($sender, $params)
               {
                   
               ?>
               //Add your javascript code here
                   deshabilitar(false,componentes);
                   limpiar(componentes);
                   document.getElementById("sOperacion").value = "agregar";
                   return false;
               <?php

               }

                function dumpJavascript(){
                  $disable = "function deshabilitar(op,componentes){
                        if(op){
                           document.getElementById(\"cmdAgregar\").disabled=false;
                           document.getElementById(\"cmdModificar\").disabled=false;
                           document.getElementById(\"cmdEliminar\").disabled=false;
                           document.getElementById(\"cmdAceptar\").disabled=true;
                           document.getElementById(\"cmdCancelar\").disabled=true;
                           document.getElementById(\"cmdImprimir\").disabled=false;
                           for(var i=0; i<componentes.length;i++){
                              var tipo = document.getElementById(componentes[i]).type;
                              if(componentes[i]!=null && ( tipo=='text' || tipo=='textarea' || tipo=='select-one' || tipo=='checkbox' )){
                                 document.getElementById(componentes[i]).disabled=true;
                              }
                           }

                        }
                        else{
                           document.getElementById(\"cmdAgregar\").disabled=true;
                           document.getElementById(\"cmdModificar\").disabled=true;
                           document.getElementById(\"cmdEliminar\").disabled=true;
                           document.getElementById(\"cmdAceptar\").disabled=false;
                           document.getElementById(\"cmdCancelar\").disabled=false;
                           document.getElementById(\"cmdImprimir\").disabled=true;
                           for(var i=0; i<componentes.length;i++){
                              var tipo = document.getElementById(componentes[i]).type;
                              if(componentes[i]!=null && ( tipo=='text' || tipo=='textarea' || tipo=='select-one' || tipo=='checkbox' )){
                                 document.getElementById(componentes[i]).disabled=false;
                              }
                           }
                        }
                     }";
                  $limpiar = "function limpiar(componentes){
                           for(var i=0; i<componentes.length;i++){
                              if(componentes[i]!=null){
                                 document.getElementById(componentes[i]).value='';
                                 document.getElementById(componentes[i]).checked=false;
                              }
                           }
                     }";
                  $lostFocus = "function lostfocus(elemento){
                     if(elemento!=null){
                        document.getElementById(elemento).style.background=\"#FFFFFF\";
                     }
                  }";
                  $onFocus = "function focus(elemento){
                     if(elemento!=null){
                        document.getElementById(elemento).select();
                        document.getElementById(elemento).style.background=\"#FFAD5B\";
                     }
                  }";
                  $keyPress= "function press(elemento,keyCode){
                           if(keyCode==13){
                              if(elemento!=null)
                                 document.getElementById(elemento).focus();
                              return false;
                           }
                  }           ";
                  $TAB ="
                  function tab(field,event){
                      var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
                      if (keyCode == 13) {
                         var i;
                         for (i = 0; i < document.forms[0].elements.length; i++)
                           if (field == document.forms[0].elements[i])
                              break;
                         i = (i + 1) % document.forms[0].elements.length;
                        var j = i;

                        if(document.forms[0].elements[i].type ==\"hidden\" || document.forms[0].elements[i].disabled==true)
                        {
                           for (j = i; j < document.forms[0].elements.length; j++)
                              if (document.forms[0].elements[j].type !=\"hidden\" && document.forms[0].elements[j].disabled==false)
                                 break;
                        }
                        if(document.forms[0].elements[j].type !=\"select-one\"){
                           document.forms[0].elements[j].select();
                        }
                        document.forms[0].elements[j].focus();
                        return false;
                     }
                  }";
                  echo $disable.$limpiar.$onFocus.$keyPress ;
               }
               function FrmOrdenTrabajoShow($sender, $params)
               {
                  global $sContrato;
                  $this->conectar();
                  $this->qryOrdenTrabajo->setActive(false);
                  $this->qryOrdenTrabajo->setSQL("
                  select
                     sNumeroOrden as Orden,
                     sIdFolio as Folio,
                     sDescripcionCorta as Descripcion_Corta,
                     mDescripcion as Descripcion,
                     sIdTipoOrden as Tipo_Orden,
                     sApoyo as Apoyo,
                     date_format(dFiProgramado,'%d/%m/%Y') as F_Inicio_Programado,
                     date_format(dFfProgramado,'%d/%m/%Y') as F_Fin_Programado,
                     sIdPlataforma as Plataforma,
                     sIdPernocta as Pernocta,
                     cIdStatus as Status,
                     mComentarios as Comentarios,
                     sFormato as Formato,
                     iJornada as Jornada,
                     iConsecutivo as Consecutivo,
                     iConsecutivoTierra as Consecutivo_Tierra,
                     bAvanceFrente AS avance_frente,
                     bAvanceContrato As avance_contrato,
                     bComentarios AS comentario,
                     bPermisos AS permiso,
                     bTipoAdmon AS tipo_admon
                  from
                     ordenesdetrabajo
                  where sContrato='$sContrato'");
                  $this->qryOrdenTrabajo->setActive(true);
                   /*tipos de ordenes*/
                   $sql = "select * from tiposdeorden";
                   $rs = mysql_query($sql);
                   while($rw = mysql_fetch_array($rs)){
                     $it[$rw['sIdTipoOrden']] =$rw['sDescripcion'];
                   }
                   $this->cbosIdTipoOrden->setItems($it);
                   /*apoyos*/
                   $apoyos["BARCO"]="BARCO";
                   $apoyos["CUADRILLAS"]="CUADRILLAS";
                   $apoyos["TIERRA"]="TIERRA";
                   $this->cbosApoyo->setItems($apoyos);
                   /*plataformas*/
                   unset($it);
                   $sql = "select * from plataformas";
                   $rs = mysql_query($sql);
                   while($rw = mysql_fetch_array($rs)){
                     $it[$rw['sIdPlataforma']] =$rw['sDescripcion'];
                   }
                   $this->cbosIdPlataforma->setItems($it);
                   /*pernoctan*/
                   unset($it);
                   $sql = "select * from pernoctan";
                   $rs = mysql_query($sql);
                   while($rw = mysql_fetch_array($rs)){
                     $it[$rw['sIdPernocta']] =$rw['sDescripcion'];
                   }
                   $this->cbosIdPernocta->setItems($it);
                   /*statuss*/
                   unset($it);
                   $sql = "select * from estatus";
                   $rs = mysql_query($sql);
                   while($rw = mysql_fetch_array($rs)){
                     $it[$rw['cIdStatus']] =$rw['sDescripcion'];
                   }
                   $this->cbocIdStatus->setItems($it);
               }

               #conecta con el servidor MySQL
               function conectar(){
                  global $Usuario;
                  global $Clave;
                  global $_SESSION;
                  $this->dataOrdenTrabajo->SetUserName($Usuario);
                  $this->dataOrdenTrabajo->SetUserPassword($Clave);
                  $this->dataOrdenTrabajo->SetDatabaseName($_SESSION['database']);
                  $this->dataOrdenTrabajo->setConnected(true);
               }
               //valores de los checkbox
               function checkboxes(){
                    if($this->ChkReal->Checked){
                        $this->avance_real = 'Si';
                     }else{
                         $this->avance_real = 'No';
                     }
                     if($this->ChkProg->Checked){
                        $this->avance_prog = 'Si';
                     }else{
                         $this->avance_prog = 'No';
                     }
                     if($this->ChkComent->Checked){
                        $this->comentario = 'Si';
                     }else{
                         $this->comentario = 'No';
                     }
                     if($this->ChkPermiso->Checked){
                        $this->permiso = 'Si';
                     }else{
                         $this->permiso = 'No';
                     }
                     if($this->ChkTipoA->Checked){
                        $this->tipo_admon = 'Si';
                     }else{
                         $this->tipo_admon = 'No';
                     }
               }
        }

        global $application;

        global $FrmOrdenTrabajo;

        //Creates the form
        $FrmOrdenTrabajo=new frmOrdenTrabajo($application);

        //Read from resource file
        $FrmOrdenTrabajo->loadResource(__FILE__);

        //Shows the form
        $FrmOrdenTrabajo->show();
        $FrmOrdenTrabajo->panelMensaje->setVisible(False);
?>
<script>
var componentes = new Array("txtsNumeroOrden","txtsIdFolio","txtsDescripcionCorta","txtmDescripcion","cbosIdTipoOrden","cbosApoyo","f-calendar-field-1","f-calendar-field-2","cbosIdPlataforma","cbosIdPernocta","cbocIdStatus","txtmComentarios","txtsFormato","txtiJornada","txtiConsecutivo","txtiConsecutivoTierra","ChkReal","ChkProg","ChkComent","ChkPermiso","ChkTipoA");
deshabilitar(true,componentes);
</script>
