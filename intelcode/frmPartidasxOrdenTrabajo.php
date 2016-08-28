<?php
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        //require("mysql.inc.php");
       /* $sContrato = '425027849';
        $sIdConvenio = '';*/
        //Class definition
        require_once("Connection.php");
        class frmPartidasxOrdenTrabajo extends Page
        {
               public $sNumeroOrden = null;
               public $sFormato = null;
               public $HidModifica = null;
               public $HidActividad = null;
               public $HidOrden = null;
               public $HidTipo = null;
               public $HidWbs = null;
               public $DBGActividades = null;
               public $QryActividad = null;
               public $DtaActividad = null;
               public $base = null;
               public $Panel1 = null;
               public $MemoComentarios = null;
               public $TxtDuracion = null;
               public $DatFechaF = null;
               public $DtaFechaI = null;
               public $TxtUnidad = null;
               public $CboColor = null;
               public $TxtCosto = null;
               public $TxtMoneda = null;
               public $TxtCantidad = null;
               public $MemoDescripcion = null;
               public $ChkConcepto = null;
               public $TxtPartida = null;
               public $CboPaquete = null;
               public $CmdImprimir = null;
               public $CmdCancelar = null;
               public $CmdAceptar = null;
               public $CmdEliminar = null;
               public $CmdModificar = null;
               public $CmdAgregar = null;
               public $Label15 = null;
               public $Label14 = null;
               public $Label13 = null;
               public $Label12 = null;
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
               function sNumeroOrdenChange($sender, $params)
               {
                   global $sContrato;
                   global $sIdConvenioAct;
                   global  $Connection;
                   //Lllenar combo de los paquetes y actividades
                   $sNumeroOrden =$this->sNumeroOrden->getItemIndex();
                   $sql="Select mDescripcion, sWbs
                         from
                              actividadesxorden
                         where
                              sContrato = '". $Connection->global_sContrato ."'
                              #and sSimbolo = '-'
                              and sIdConvenio='". $Connection->global_sIdConvenio ."'
                              and sNumeroOrden='$sNumeroOrden'
                              ";
                    $rs = mysql_query($sql);
                    $Paquete[$row['0']] ="<< Paquete Principal >>";
                    while($row = mysql_fetch_array($rs))
                    {
                       $Paquete[$row['sWbs']] = $row['sWbs']." » ".$row['mDescripcion'];
                    }
                    $this->CboPaquete->setItems($Paquete);

                  //Llenado del grid de Actividades....
                  $this->QryActividad->setActive(false);
                  $this->QryActividad->setFilter("sContrato='". $Connection->global_sContrato ."' and sNumeroOrden='$sNumeroOrden'  ");
                  $this->QryActividad->setActive(true);

               }


               function frmPartidasxOrdenTrabajoShow($sender, $params)
               {
                   global $sContrato;
                   global $sIdConvenioAct;
                  //Lllenar combo del Contrato o Programa
                    $sql="Select
                           sNumeroOrden
                         from
                              ordenesdetrabajo
                         where
                              sContrato = '$sContrato'
                         order by sNumeroOrden";
                    $rs = mysql_query($sql);
                    $sNumeroOrden='';
                    $Programa[$sNumeroOrden] = $sNumeroOrden;
                    while($row = mysql_fetch_array($rs))
                    {
                       ($sNumeroOrden=="")?$row['sNumeroOrden']:"";
                       $Programa[$row['sNumeroOrden']] = $row['sNumeroOrden'];
                    }
		    $this->sNumeroOrden->color="#FFFFFF";
                    $this->sNumeroOrden->setItems($Programa);

                   //Lllenar combo de los paquetes y actividades
                    $sNumeroOrden =$this->sNumeroOrden->getItemIndex();
                    $sql="Select
                              mDescripcion, sWbs
                         from
                              actividadesxorden
                         where
                              sContrato = '". $Connection->global_sContrato ."'
                              and sIdConvenio='". $Connection->global_sIdConvenio ."'
                              and sNumeroOrden='$sNumeroOrden'
                              ";
                    $rs = mysql_query($sql);
                    $Paquete[$row['0']] ="<< Paquete Principal >>";
                    while($row = mysql_fetch_array($rs))
                    {
                       $Paquete[$row['sWbs']] = $row['sWbs']." » ".$row['mDescripcion'];
                    }
                    $this->CboPaquete->setItems($Paquete);

                  //Llenado del grid de Actividades....
                  $this->QryActividad->setActive(false);
                  $this->QryActividad->setFilter("sContrato='". $Connection->global_sContrato ."' and sNumeroOrden='$sNumeroOrden'  ");
                  $this->QryActividad->setActive(true);


               }

               function CmdImprimirJSClick($sender, $params)
               {
               global $sContrato;
               global $sIdConvenioAct;
               global $Connection;
               ?>
               //Add your javascript code here
                  ruta = "../reporte.php";
                  ruta = ruta + "?sContrato=<?php echo $Connection->global_sContrato;  ?>";
                  ruta = ruta + "&sIdConvenio=<?php echo $Connection->global_sIdConvenio; ?>";
                  ruta = ruta + "&sNumeroOrden=" +  document.getElementById("sNumeroOrden").value;
                  ruta = ruta + "&nombreReporte=programaConstruccion";
                  ruta = ruta + "&sFormato="+document.getElementById("sFormato").value;
                  ruta = ruta + "&reportesPath=programaConstruccion";
                  var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no");
                  return false;
               <?php

               }



               function CmdEliminarClick($sender, $params)
               {
                  global $sContrato, $sIdConvenio;
                  global $Connection;
                  $Actividad = $this->HidActividad->Value;
                  $Wbs = $this->HidWbs->Value;
                  $Tipo = $this->HidTipo->Value;
                  $NumOrden = $this->HidOrden->Value;
                  $error = 0;
                  //Eliminacion del registro seleccionado ...
                   $sql = " Delete
                            from actividadesxorden
                            where sContrato = '". $Connection->global_sContrato ."'
                                  And sIdConvenio = '". $Connection->global_sIdConvenio ."''
                                  And sNumeroOrden = '$NumOrden'
                                  and sWbs = '$Wbs'
                                  and sNumeroActividad = '$Actividad'
                                  and sTipoActividad = '$Tipo'";
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
                  $this->HidActividad->Value ="";
                  $this->HidWbs->Value = "";
                  $this->HidTipo->Value = "";
                  $this->HidOrden->Value = "";
               }

               function CmdEliminarJSClick($sender, $params)
               {
               ?>
                  //Add your javascript code here
                  ok =0;
                  resp =0;
                  DBGActividades.getSelectionModel().iterateSelection
                  (    function(index)
                       {   //obtenemos los datos del grid Requisiciones
                           var Tabla = DBGActividades.getTableModel();
                           var sNumAct = Tabla.getValue(1, index);
                           var sWbs = Tabla.getValue(17, index);
                           var sTipo = Tabla.getValue(18, index);
                           var sNumeroOrden = Tabla.getValue(19, index);

                           ok=1;
                           if(!confirm("  Desea ELIMINAR EL ELEMENTO Seleccionado ?"))
                              resp=1;
                           alert (sNumAct+sWbs+sTipo+sNumeroOrden);
                           document.getElementById("HidActividad").value = sNumAct;
                           document.getElementById("HidWbs").value = sWbs;
                           document.getElementById("HidTipo").value = sTipo;
                           document.getElementById("HidOrden").value = sNumeroOrden;
                       }
                  );
                  if (ok==0)
                  {  alert("  DEBE HACER CLICK SOBRE UN ELEMENTO  !!!");
                     return false;
                  }
                  if (resp==1)
                     return false;
                  else
                     return true;
               <?php
               }



               function TxtDuracionJSChange($sender, $params)
               {
               ?>
                 //Add your javascript code here
                 Duracion();
                 return false;
               <?php
               }

               function DBGActividadesJSRowChanged($sender, $params)
               {
               ?>
                 //Add your javascript code here
                   MuestraDatos();
               <?php
               }

               function DBGActividadesJSClick($sender, $params)
               {
               ?>
                  //Add your javascript code here
                   MuestraDatos();
                   DBGActividades.getSelectionModel().iterateSelection
                   (   function(index)
                       {    var Tabla = DBGActividades.getTableModel();
                            var sInstalado = Tabla.getValue(20, index);
                            var sExcede = Tabla.getValue(21, index);
                            if ((sInstalado > 0 || sExcede >0) &&  document.getElementById("HidModifica").value == "Modicicar")
                            {   alert ("Realizar modificacion sobre conceptos que hayan sido utilizados en un reporte diario, implica la necesidad de correr proceso de recalculo de avances por partida, si usted modifica la cantidad a instalar en un concepto previamente utilizado en un reporte diario, notifique al administrador del sistema.");
                                ControlObjetos( false );
                            }
                       }
                   );
                   return false;
               <?php
               }

               function CmdCancelarJSClick($sender, $params)
               {
               ?>
                  //Add your javascript code here
                  document.getElementById("HidModifica").value = "";
                  ControlObjetos( false );
                  return false;
               <?php
               }

               function CmdModificarJSClick($sender, $params)
               {
               ?>
                  //Add your javascript code here
                   document.getElementById("HidModifica").value = "Modicicar";
                   DBGActividades.getSelectionModel().iterateSelection
                   (   function(index)
                       {    var Tabla = DBGActividades.getTableModel();
                            var sInstalado = Tabla.getValue(20, index);
                            var sExcede = Tabla.getValue(21, index);
                            if (sInstalado > 0 || sExcede >0)
                               alert ("Realizar modificacion sobre conceptos que hayan sido utilizados en un reporte diario, implica la necesidad de correr proceso de recalculo de avances por partida, si usted modifica la cantidad a instalar en un concepto previamente utilizado en un reporte diario, notifique al administrador del sistema.");
                            else
                            {
                                ControlObjetos( true );
                                document.getElementById("TxtPartida").focus();
                            }
                       }
                   );

                   return false;
               <?php
               }

               function CmdAgregarJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                   ControlObjetos( true );
                   LimpiaObjetos();
                   var fecha="f-calendar-field-1";
                   FechaActual(fecha);
                    var fecha="f-calendar-field-2";
                   FechaActual(fecha);
                   document.getElementById("TxtPartida").focus();
                   return false;
               <?php
               }


               function frmPartidasxOrdenTrabajoBeforeShow($sender, $params)
               {
                  global $sContrato;
                  global $sIdConvenioAct;
                  global $sContrato,$_SESSION,$Usuario,$Clave,$Servidor;
                  global $Connection;

//                  $this->base->setConnected(false);
//                  $this->base->setDatabaseName($_SESSION['database']);
//                  $this->base->setUserName($Usuario);
//                  $this->base->setUserPassword($Clave);
//                  $this->base->setHost($Servidor);
//                  $this->base->setConnected(true);

//                  $Connection->base->setConnected(false);
//                  $Connection->base->setConnected(true);
                  $Connection->conectar();


               }

               function dumpJavascript()
               {
                   echo 'function ControlObjetos( habilitar ){
                        if(habilitar){
                           accion = false;
                        }
                        else{
                             accion= true;
                        }
                        document.getElementById("CboPaquete").disabled=accion;
                        document.getElementById("TxtPartida").disabled=accion;
                        document.getElementById("ChkConcepto").disabled=accion;
                        document.getElementById("MemoDescripcion").disabled=accion;
                        document.getElementById("TxtCantidad").disabled=accion;
                        document.getElementById("TxtMoneda").disabled=accion;
                        document.getElementById("TxtCosto").disabled=accion;
                        document.getElementById("CboColor").disabled=accion;
                        document.getElementById("TxtUnidad").disabled=accion;
                        document.getElementById("TxtDuracion").disabled=accion;
                        document.getElementById("MemoComentarios").disabled=accion;
                        document.getElementById("CmdAgregar").disabled=habilitar;
                        document.getElementById("CmdModificar").disabled=habilitar;
                        document.getElementById("CmdEliminar").disabled=habilitar;
                        document.getElementById("CmdAceptar").disabled=accion;
                        document.getElementById("CmdCancelar").disabled=accion;
                        document.getElementById("CmdImprimir").disabled=habilitar;
                        return false;
                     }';

                   echo 'function MuestraDatos(){
                       DBGActividades.getSelectionModel().iterateSelection
                       (    function(index)
                            {
                              //obtenemos los datos del grid Requisiciones
                              var Tabla = DBGActividades.getTableModel();
                              var sPartida = Tabla.getValue(1, index);
                              var sGerencial = Tabla.getValue(12, index);
                              var sDescripcion = Tabla.getValue(13, index);
                              var sCantidad = Tabla.getValue(4, index);
                              var sMoneda = Tabla.getValue(6, index);
                              var sCostoM = Tabla.getValue(9, index);
                              var sColor = Tabla.getValue(14, index);
                              var sMedida = Tabla.getValue(5, index);
                              var sFechaI = Tabla.getValue(2, index);
                              var sDuracion = Tabla.getValue(15, index);
                              var sFechaF = Tabla.getValue(3, index);
                              var sComentario = Tabla.getValue(16, index);
                              var sWbs = Tabla.getValue(11, index);

                              document.getElementById("CboPaquete").value = sWbs;
                              document.getElementById("TxtPartida").value = sPartida;
                              if (sGerencial == "si")
                                  document.getElementById("ChkConcepto").checked = true;
                              else
                                  document.getElementById("ChkConcepto").checked = false;
                              document.getElementById("MemoDescripcion").value = sDescripcion;
                              document.getElementById("TxtCantidad").value = sCantidad;
                              document.getElementById("TxtMoneda").value = sMoneda;
                              document.getElementById("TxtCosto").value = sCostoM;
                              document.getElementById("CboColor").value = sColor;
                              document.getElementById("TxtUnidad").value = sMedida;
                              document.getElementById("f-calendar-field-2").value = sFechaI;
                              document.getElementById("TxtDuracion").value = sDuracion;
                              document.getElementById("f-calendar-field-1").value = sFechaF;
                              document.getElementById("MemoComentarios").value = sComentario;
                           }
                     );
                     return false;
                   }';

                    echo 'function ResaltarBotones()
                      {
                        document.getElementById("CboPrograma").style.backgroundColor = "";
                        document.getElementById("CboPaquete").style.backgroundColor = "";
                        document.getElementById("TxtPartida").style.backgroundColor = "";
                        document.getElementById("ChkConcepto").style.backgroundColor = "";
                        document.getElementById("MemoDescripcion").style.backgroundColor = "";
                        document.getElementById("TxtCantidad").style.backgroundColor = "";
                        document.getElementById("TxtMoneda").style.backgroundColor = "";
                        document.getElementById("TxtCosto").style.backgroundColor = "";
                        document.getElementById("CboColor").style.backgroundColor = "";
                        document.getElementById("TxtUnidad").style.backgroundColor = "";
                        document.getElementById("TxtDuracion").style.backgroundColor = "";
                        document.getElementById("MemoComentarios").style.backgroundColor = "";
                        document.getElementById("CmdAgregar").style.backgroundColor = "";
                        document.getElementById("CmdModificar").style.backgroundColor = "";
                        document.getElementById("CmdEliminar").style.backgroundColor = "";
                        document.getElementById("CmdAceptar").style.backgroundColor = "";
                        document.getElementById("CmdCancelar").style.backgroundColor = "";
                        document.getElementById("CmdImprimir").style.backgroundColor = "";
                        return false;

                      }';

                      echo 'function LimpiaObjetos()
                      {
                           document.getElementById("TxtPartida").value = "";
                           document.getElementById("ChkConcepto").checked = false;
                           document.getElementById("MemoDescripcion").value = "";
                           document.getElementById("TxtCantidad").value = "";
                           document.getElementById("TxtMoneda").value = "";
                           document.getElementById("TxtCosto").value = "";
                           document.getElementById("TxtUnidad").value = "";
                           document.getElementById("TxtDuracion").value = "";
                           document.getElementById("MemoComentarios").value = "";
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

                     echo 'function Duracion()
                     {
                           var FechaFI=document.getElementById("f-calendar-field-2").value;
                           var SeparaFI=FechaFI.split("/");
                           var diaFI=parseInt(SeparaFI[0]);
                           var mesFI=parseInt(SeparaFI[1]);
                           var AnnFI=parseInt(SeparaFI[2]);
                           ErrorFecha=0;
                           if ((diaFI>30)&&(mesFI==4 ||mesFI==6 || mesFI==9 || mesFI==11))
                              ErrorFecha=1;
                           if ((diaFI>31)&&(mesFI==1 ||mesFI==3 || mesFI==5 || mesFI==7 || mesFI==8 || mesFI==10 || mesFI==12))
                              ErrorFecha=1;
                           if (mesFI==2)
                           {  if ( diaFI>29 && AnnFI % 4 == 0 && (AnnFI % 100 != 0 || AnnFI % 400 == 0) )
                              {   ErrorFecha=1;
                              }else
                                    if (diaFI>28 && AnnFI % 4 != 0)
                                    {   ErrorFecha=1;
                                    }
                           }
                           if (mesFI>12)
                              ErrorFecha=1;

                           if (ErrorFecha==1)
                           {  alert("La FECHA ESCRITA sobrepasa los LIMITES!!!");
                              return false;
                           }else
                                {
                                   i=document.getElementById("TxtDuracion").value;
                                   i= parseInt(i);
                                   while (i>0)
                                   {   if (mesFI==4 ||mesFI==6 || mesFI==9 || mesFI==11)
                                       {
                                          if (i+diaFI>30)
                                          {   mesFI=mesFI+1;
                                              i=(i+diaFI)-31;
                                              diaFI=1;
                                          }
                                          else
                                             { diaFI=diaFI+i;
                                               i=0;
                                             }
                                       }
                                       if (mesFI==1 ||mesFI==3 || mesFI==5 || mesFI==7 || mesFI==8 || mesFI==10 || mesFI==12)
                                       {  if (i+diaFI>31)
                                          {  x=0;
                                             if (mesFI==12)
                                              {   mesFI=1;
                                                  AnnFI=AnnFI+1;
                                                  x=1;
                                              }
                                              if (mesFI!=12 && x==0)
                                                  mesFI=mesFI+1;
                                              i=(i+diaFI)-32;
                                              diaFI=1;
                                          }
                                          else
                                             { diaFI=diaFI+i;
                                               i=0;
                                             }
                                       }
                                       if (mesFI==2)
                                       {  x=0;
                                          if (i+diaFI>29 && AnnFI % 4 == 0 && (AnnFI % 100 != 0 || AnnFI % 400 == 0) )
                                          {   mesFI=mesFI+1;
                                              i=(i+diaFI)-30;
                                              diaFI=1;
                                              x=1;
                                          }
                                          if (i+diaFI>28 && AnnFI % 4 != 0)
                                          {  mesFI=mesFI+1;
                                             i=(i+diaFI)-29;
                                             diaFI=1;
                                             x=1;
                                          }

                                          if (x==0)
                                          {
                                              diaFI=diaFI+i;
                                              i=0;
                                          }
                                       }
                                   }
                                   // Colocar fecha en el objeto...
                                   if (diaFI<10)
                                      diaFI = "0"+diaFI;
                                   if (mesFI<10)
                                      mesFI = "0"+mesFI;
                                   document.getElementById("f-calendar-field-1").value = diaFI + "/" + mesFI + "/"+ AnnFI;

                                }

                     }';
               }

               function MemoComentariosJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function MemoComentariosJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function MemoComentariosJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtDuracionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtDuracionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtDuracionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtUnidadJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtUnidadJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtUnidadJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboColorJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboColorJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboColorJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtCostoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtCostoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtCostoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtMonedaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtMonedaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtMonedaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtCantidadJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtCantidadJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtCantidadJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function MemoDescripcionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function MemoDescripcionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function MemoDescripcionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function ChkConceptoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function ChkConceptoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function ChkConceptoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtPartidaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtPartidaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function TxtPartidaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboPaqueteJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboPaqueteJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here
                 return false;
               <?php

               }

               function CboPaqueteJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboProgramaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboProgramaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboProgramaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

        }

        global $application;

        global $frmPartidasxOrdenTrabajo;

        //Creates the form
        $frmPartidasxOrdenTrabajo=new frmPartidasxOrdenTrabajo($application);

        //Read from resource file
        $frmPartidasxOrdenTrabajo->loadResource(__FILE__);

        //Shows the form
        $frmPartidasxOrdenTrabajo->show();
?>
<script>
  ControlObjetos( false );
  ResaltarBotones();
  LimpiaObjetos();
  var fecha="f-calendar-field-1";
  FechaActual(fecha);
  var fecha="f-calendar-field-2";
  FechaActual(fecha);
</script>
