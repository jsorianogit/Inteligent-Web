<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("actnlist.inc.php");
        use_unit("buttons.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("mysql.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require_once("mysql.inc.php");
        require_once("Connection.php");
        require_once("fnUtilerias.php");
        /*$sContrato='428237864';
        $sIdConvenioAct='AC-01';
        $sIdUsuario='Ivan';
        $sIdAutoriza='WCORDOVA';   */
        //Class definition
        class FrmGeneradores extends Page
        {
               public $dbgGeneral = null;
               public $cmdCancelaPartida = null;
               public $cmdAceptaDatosPartida = null;
               public $cmdEliminaPartida = null;
               public $cmdModificaPartida = null;
               public $cmdAgregaPartida = null;
               public $HiCantidad = null;
               public $HDIsometrico = null;
               public $HDCantidad = null;
               public $HDWbs = null;
               public $HDPartida = null;
               public $HidGenAntes = null;
               public $cmdListaVer = null;
               public $cmdSImportes = null;
               public $cmdNumGenrador = null;
               public $cmdGenrador = null;
               public $cmdCImportes = null;
               public $hdfRefrsPartida = null;
               public $hdfPartidas = null;
               public $hdfRangoEstimacion = null;
               public $hdfRecomienda = null;
               public $memoComentaGenerador = null;
               public $lblTituloFases = null;
               public $lblRecomienda = null;
               public $Label17 = null;
               public $Label16 = null;
               public $cmdPartidas = null;
               public $cmdInformacion = null;
               public $Panel3 = null;
               public $cbosNumeroOrden = null;
               public $Panel1 = null;
               public $dbgGeneralComboAct = null;
               public $qryComboActividades = null;
               public $dtaComboActividades = null;
               public $txtFechasBitacoras = null;
               public $txtsNumActPartidas = null;
               public $txtsWbsPartida = null;
               public $txtGenerAnterior = null;
               public $txtValorAntes = null;
               public $txtSemanas = null;
               public $qryActxOrden = null;
               public $dtaActividadesxOrd = null;
               public $qryGeneral = null;
               public $dtaGeneral = null;
               public $qryEstimaxpartida = null;
               public $dtaEstimaxPartida = null;
               public $dsEstimaciones = null;
               public $base = null;
               public $qryEstimaciones = null;
               public $memoComentarios = null;
               public $cbosIsomtricoReferencia = null;
               public $cbosOrdenCambio = null;
               public $cbosInstalacionAfectada = null;
               public $dbgPartidasEstimacion = null;
               public $dbgPartidas = null;
               public $Label15 = null;
               public $Label14 = null;
               public $Label13 = null;
               public $Label12 = null;
               public $txtsPrefijo = null;
               public $cbosNumeroActividad = null;
               public $txtsIsometrico = null;
               public $lEstima = null;
               public $txtdCantidadPartida = null;
               public $Label9 = null;
               public $Label1 = null;
               public $Label8 = null;
               public $Label7 = null;
               public $Label11 = null;
               public $Panel5 = null;
               public $Label2 = null;
               public $Panel2 = null;


               function cmdListaVerJSClick($sender, $params)
               {
               global $Connection;
               ?>
                  dbgGeneradores.getSelectionModel().iterateSelection
                  (   function(index)
                      {
                        var tablaGeneradores = dbgGeneradores.getTableModel();
                        ruta = "Acceso/scripts/php/Reportes/generadores_swbs/rptNumerosGeneradoresCIA.php";
                        ruta = ruta + "?sContrato="+<?php echo  '"'.$Connection->global_sContrato.'"' ?>;
                        ruta = ruta + "&sNumeroOrden=" + document.getElementById("cbosNumeroOrden").value;
                        ruta = ruta + "&sNumeroGenerador=" +  tablaGeneradores.getValue(1,index);
                        var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                      }
                  );
                  return false;

               <?php

               }

               function cmdSImportesJSClick($sender, $params)
               {

               global $Connection;
               ?>
                  dbgGeneradores.getSelectionModel().iterateSelection
                  (   function(index)
                      {
                        var tablaGeneradores = dbgGeneradores.getTableModel();
                        ruta = "Acceso/scripts/php/Reportes/generadores_swbs/rptSemanalSinImportes.php";
                        ruta = ruta + "?sContrato="+<?php echo  '"'.$Connection->global_sContrato.'"' ?>;
                        ruta = ruta + "&sNumeroOrden=" + document.getElementById("cbosNumeroOrden").value;
                        ruta = ruta + "&sNumeroGenerador=" +  tablaGeneradores.getValue(1,index);
                        var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                      }
                  );
                  return false;

               <?php

               }

               function cmdCImportesJSClick($sender, $params)
               {

               global $Connection;
               ?>
                  dbgGeneradores.getSelectionModel().iterateSelection
                  (   function(index)
                      {
                        var tablaGeneradores = dbgGeneradores.getTableModel();
                        ruta = "Acceso/scripts/php/Reportes/generadores_swbs/rptSemanalConImportes.php";
                        ruta = ruta + "?sContrato="+<?php echo  '"'.$Connection->global_sContrato.'"' ?>;
                        ruta = ruta + "&sNumeroOrden=" + document.getElementById("cbosNumeroOrden").value;
                        ruta = ruta + "&sNumeroGenerador=" +  tablaGeneradores.getValue(1,index);
                        var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                      }
                  );
                  return false;

               <?php

               }

               function cmdNumGenradorJSClick($sender, $params)
               {

               global $Connection;
               ?>
                  dbgGeneradores.getSelectionModel().iterateSelection
                  (   function(index)
                      {
                        var tablaGeneradores = dbgGeneradores.getTableModel();
                        ruta = "Acceso/scripts/php/Reportes/generadores_swbs/rptNumerosGeneradores.php";
                        ruta = ruta + "?sContrato="+<?php echo  '"'.$Connection->global_sContrato.'"' ?>;
                        ruta = ruta + "&sNumeroOrden=" + document.getElementById("cbosNumeroOrden").value;
                        ruta = ruta + "&sNumeroGenerador=" +  tablaGeneradores.getValue(1,index);
                        var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                      }
                  );
                  return false;

               <?php

               }

               function cmdGenradorJSClick($sender, $params)
               {

               global $Connection;
               ?>
                  dbgGeneradores.getSelectionModel().iterateSelection
                  (   function(index)
                      {
                        var tablaGeneradores = dbgGeneradores.getTableModel();
                        ruta = "Acceso/scripts/php/Reportes/generadores_swbs/rptCaratulaGenerador.php";
                        ruta = ruta + "?sContrato="+<?php echo  '"'.$Connection->global_sContrato.'"' ?>;
                        ruta = ruta + "&sNumeroOrden=" + document.getElementById("cbosNumeroOrden").value;
                        ruta = ruta + "&sNumeroGenerador=" +  tablaGeneradores.getValue(1,index);
                        var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                      }
                  );
                  return false;

               <?php

               }

               function cmdPrintGeneradorJSClick($sender, $params)
               {
               global $Connection;
               ?>
                  dbgGeneradores.getSelectionModel().iterateSelection
                  (   function(index)
                      {
                        var tablaGeneradores = dbgGeneradores.getTableModel();
                        ruta = "Acceso/scripts/php/Reportes/generadores_swbs/rptCaratulaGenerador.php";
                        ruta = ruta + "?sContrato="+<?php echo  '"'.$Connection->global_sContrato.'"' ?>;
                        ruta = ruta + "&sNumeroOrden=" + document.getElementById("cbosNumeroOrden").value;
                        ruta = ruta + "&sNumeroGenerador=" +  tablaGeneradores.getValue(1,index);
                        var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                      }
                  );
                  return false;
               <?php

               }

               function FrmGeneradoresBeforeShow($sender, $params)
               {
                  global $Connection;
                 // global $sContrato,$_SESSION,$Usuario,$Clave,$Servidor;

//                  $Connection->base->setConnected(false);
//                  $Connection->base->setConnected(true);
                $Connection->conectar();

                  $Connection->Query4->setActive(false);
                  $Connection->Query4->setSQL("update actividadesxanexo set sWbs=replace(sWbs,' ','' ) ,
                        sNumeroActividad=replace(sNumeroActividad,' ','' ) where sContrato = '". $Connection->global_sContrato ."' ");
                  $Connection->Query4->open();

                  $Connection->Query4->setActive(false);
                  $Connection->Query4->setSQL("update actividadesxorden set sWbs=replace(sWbs,' ','' ) , sWbsContrato=replace(sWbsContrato,' ','' ) ,
                        sNumeroActividad=replace(sNumeroActividad,' ','' ) where sContrato = '". $Connection->global_sContrato ."' ");
                  $Connection->Query4->open();

                  $Connection->Query4->setActive(false);
                  $Connection->Query4->setSQL("update estimacionxpartida set sWbs=replace(sWbs,' ','' ) , sWbsContrato=replace(sWbsContrato,' ','' ) ,
                        sNumeroActividad=replace(sNumeroActividad,' ','' ) where sContrato = '". $Connection->global_sContrato ."' ");
                  $Connection->Query4->open();
                  $Connection->Query4->setActive(false);





                  $sql = "select * from fasesxproyecto";
                  $rs = mysql_query($sql);
                  unset($items);
                  while($row = mysql_fetch_array($rs)){
                     $items[$row["sIdFase"]]=$row["sDescripcion"];
                  }
                  $this->listFases->setItems($items);

                  $sql = "select sNumeroOrden from ordenesdetrabajo where sContrato='". $Connection->global_sContrato ."'";
                  $rs = mysql_query($sql);
                  unset($items);
                  while($row = mysql_fetch_array($rs)){
                     $items[$row["sNumeroOrden"]]=$row["sNumeroOrden"];
                  }
                  $this->cbosNumeroOrden->setItems($items);

                  //Asiganacion del rango de la estimacion...
                  $sql = "select sRangoEstimacion from configuracion where sContrato='". $Connection->global_sContrato ."'";
                  $rs = mysql_query($sql);
                  $row = mysql_fetch_array($rs);
                  $this->hdfRangoEstimacion->Value=$row["sRangoEstimacion"];

                  $this->llenarGrid();
                  $this->llenarGridGeneral();
                  $this->llenarGridExP();
                  $this->llenarGridActxOrd();
                  $this->llenarGridComboActividasdes();

               }

               function cbosNumeroOrdenJSChange($sender, $params)
               {
                ?>
               //Add your javascript code here
                  Inicio();
                  return true;
               <?php

               }

               //Parte del programa en que se dan de alta, modifican y eliminan las partidas!!!
               function cmdAceptaDatosPartidaJSClick($sender, $params)
               {
                 ?>    //Add your javascript code here
                        var estimado=document.getElementById("lEstima").checked;
                        if (estimado==true)
                          document.getElementById("txtEstimado").value="Si";
                        else
                             document.getElementById("txtEstimado").value="No";
                        //Invertir la fecha para ser comparada por año -mes- dia
                        fecha = "f-calendar-field-2";
                        ComponerFecha(fecha);

                        document.getElementById("txtsNumeroGenerador").disabled=false;
                        document.getElementById("cbosInstalacionAfectada").disabled=false;
                        document.getElementById("cbosIsomtricoReferencia").disabled=false;
                        document.getElementById("hdfPartidas").value="si";
                        document.getElementById("hdfRefrsPartida").value=document.getElementById("txtsNumeroGenerador").value;
                        if (document.getElementById("txtsWbsPartida").value=="")
                        {  alert("  Para poder GUARDAR LOS DATOS debe hacer click en un PAQUETE !!!");
                           return false;
                        }
                       return true;
               <?php
               }

               function cmdAceptaDatosPartidaClick($sender, $params)
               {
                   global $Connection;
                   $cantidadReportada = 0;
                   $cantidadGenerada = 0;
                   $dCantidad=0;

                   $i = $this->cbosNumeroActividad->getItemIndex();
                   $sNumeroActividad = $this->cbosNumeroActividad->Items[$i];
                   $Fecha = $this->dateFinal->Text;
                   $dCantidad = $this->txtdCantidadPartida->Text;
                   $Wbs=$this->txtsWbsPartida->Text;

                   #obtener el tipo de seguridad desde configuracion
                   $sql1 = "select sSeguridadGenerador from configuracion where sContrato='".$Connection->global_sContrato."'";
                   $rs = mysql_query($sql1);
                   if($row = mysql_fetch_array($rs)){
                      $seguridadGenerador = $row['sSeguridadGenerador'];
                   }

                   #obtener la cantidad reportada
                   if($Wbs ==""){
                      $sql2 = "Select
                               Sum(dCantidad) as dReportado
                           from bitacoradeactividades
                           Where
                                sContrato = '".$Connection->global_sContrato."'
                                and sNumeroOrden = '". $this->ordenSeleccionada() ."'
                                and sNumeroActividad = '$sNumeroActividad'
                                And dIdFecha <= '$Fecha'
                           Group By sContrato";
                     }else{
                      $sql2 = "Select
                               Sum(dCantidad) as dReportado
                           from bitacoradeactividades
                           Where
                                sContrato = '".$Connection->global_sContrato."'
                                and sNumeroOrden = '". $this->ordenSeleccionada() ."'
                                and sNumeroActividad = '$sNumeroActividad'
                                And dIdFecha <= '$Fecha'
                                and sWbs='$Wbs'
                           Group By sContrato";
                     }
                    $rs = mysql_query($sql2);
                    if($row = mysql_fetch_array($rs)){
                         $cantidadReportada = $row['dReportado'];
                    }

                    #obtener la cantidad generada
                    if($Wbs ==""){
                       $sql = "Select
                                Sum(e.dCantidad) as dGenerado
                            from estimacionxpartida e
                            Where
                                e.sContrato = '".$Connection->global_sContrato."'
                                and e.sNumeroOrden = '". $this->ordenSeleccionada() ."'
                                and e.sNumeroActividad = '$sNumeroActividad'
                            Group By e.sContrato";
                     }else{
                       $sql = "Select
                                Sum(e.dCantidad) as dGenerado
                            from estimacionxpartida e
                            Where
                                e.sContrato = '".$Connection->global_sContrato."'
                                and e.sNumeroOrden = '". $this->ordenSeleccionada() ."'
                                and e.sNumeroActividad = '$sNumeroActividad'
                                and e.sWbs='$Wbs'
                            Group By e.sContrato";

                     }
                    $rs =mysql_query($sql);
                    if($row = mysql_fetch_array($rs)){
                         $cantidadGenerada = $row['dGenerado'];
                    }
                    $cantidadGenerada = $cantidadGenerada - $this->HiCantidad->Value;

                    #comparar los resultados

                      if( ($cantidadGenerada + $dCantidad) > $cantidadReportada and $seguridadGenerador=="Con Seguridad")
                      {
                              ?>
                               <script>
                                   alert(" <?php echo "La cantidad acumulada en los generadores de obra es superior a la cantidad manifestada en los reportes diarios. Cantidad acumulada hasta el Momento de la actividad [$sNumeroActividad] (Acumulado + Cantidad a Generar) = ".($cantidadGenerada + $dCantidad).", Cantidad Manifestada en Reportes Diarios = $cantidadReportada, necesita reportar la cantidad de ".(($cantidadGenerada + $dCantidad) - $cantidadReportada) .". Debe ir a reporte diario y reportar la cantidad necesaria, No se guardara la información!!"?>");
                               </script>
                              <?php
                              $this->txtsIsometrico->text="";
                              $this->txtsPrefijo->text="";
                              $this->memoComentarios->text="";
                              $this->txtdCantidadPartida->text="";

                      }  else
                             {   $Generador = trim($this->txtsNumeroGenerador->Text);
                                 $Isometrico = trim($this->txtsIsometrico->Text);
                                 $Prefijo = trim($this->txtsPrefijo->Text);
                                 $i = $this->cbosIsomtricoReferencia->getItemIndex();
                                 $IsometricoRef = $this->cbosIsomtricoReferencia->Items[$i];
                                 $i = $this->cbosInstalacionAfectada->getItemIndex();
                                 $Instalacion = $this->cbosInstalacionAfectada->Items[$i];
                                 $comentario= $this->memoComentarios->Text;
                                 $Estimado=$this->txtEstimado->Text;

                                 /*Agregar Partida.....*/
                                 if ($this->txtQueOpcion->Text=="Agregar")
                                 {
                                    $this->txtQueOpcion->Text="";
                                    $sql = "INSERT INTO estimacionxpartida (
                                          sContrato,
                                          sNumeroOrden,
                                          sNumeroGenerador,
                                          sWbs,
                                          sNumeroActividad,
                                          sIsometrico,
                                          sPrefijo,
                                          dCantidad,
                                          sIsometricoReferencia,
                                          sInstalacion,
                                          mComentarios,
                                          lEstima
                                          )VALUES (
                                          '".$Connection->global_sContrato."',
                                          '". $this->ordenSeleccionada() ."',
                                          '$Generador',
                                          '$Wbs',
                                          '$sNumeroActividad',
                                          '$Isometrico',
                                          '$Prefijo',
                                          '$dCantidad',
                                          '$IsometricoRef',
                                          '$Instalacion',
                                          '$comentario',
                                          '$Estimado'
                                           )";
                                    mysql_query($sql);
                                    if (mysql_error())
                                    {  $error=1;
                                    }
                                 }
                                 else  /*Modificacion de las partidas*/
                                       if ($this->txtQueOpcion->Text=="Editar")
                                       {
                                             $PartidaOLD=$this->txtsNumActPartidas->Text;

                                             $this->txtQueOpcion->Text="";
                                             $sql = "update estimacionxpartida  set
                                                      sNumeroActividad = '$sNumeroActividad',
                                                      sWbs='$Wbs',
                                                      sIsometrico='$Isometrico',
                                                      sPrefijo='$Prefijo',
                                                      dCantidad='$dCantidad',
                                                      mComentarios='$comentario',
                                                      lEstima='$Estimado'
                                                   where
                                                      sContrato='".$Connection->global_sContrato."'
                                                      and sNumeroOrden='". $this->ordenSeleccionada() ."'
                                                      and sNumeroGenerador='$Generador'
                                                      and sNumeroActividad='$PartidaOLD'";
                                             mysql_query($sql);
                                             $this->txtValorAntes->Text="";
                                              if (mysql_error())
                                              {  $error=1;
                                              }
                                       }

                                     if($error==1)
                                     {
                                       ?>
                                       <script>
                                          alert(" <?php echo " Ocurrio un error al Actualizar los Datos !!!" ?>");
                                       </script>
                                       <?php
                                     }
                                    $this->llenarGridGeneral();
                                    $this->HiCantidad->Value = 0;
                             }
               }

               function cmdModificaPartidaJSClick($sender, $params)
               {
                 global $_SESSION;
                 ?>     //Add your javascript code here
                   document.getElementById("HiCantidad").value = document.getElementById("txtdCantidadPartida").value;
                   ok1=0;
                   if (document.getElementById("txtsNumeroGenerador").value=="")
                       alert("  HAGA CLICK EN UN GENERADOR Y DESPUES SELECCIONE UN PAQUETE !!!");
                   else
                   {
                       i = dbgGeneradores.getFocusedRow();
                       var aplicado = dbgGeneradores.getTableModel().getValue(5,i);
                       var creador =dbgGeneradores.getTableModel().getValue(8,i);
                       ok1=1;

                       if (aplicado=="Autorizado")
                       {
                           alert("  Generador Aplicado, No puede realizar Cambios !!");
                           return false;
                       }
                       else
                       {
                           ok=0;
                           dbgPartidasEstimacion.getSelectionModel().iterateSelection
                           (    function(index)
                                {
                                     //obtenemos los datos de la Tabla Estimaciones
                                     var Tabla = dbgPartidasEstimacion.getTableModel();
                                     var Actividad = Tabla.getValue(1, index);
                                     var Wbs= Tabla.getValue(0, index);
                                     document.getElementById("txtsNumActPartidas").value = Actividad;
                                     document.getElementById("txtsWbsPartida").value     = Wbs;
                                     ok=1;
                                     if (Wbs=="")
                                     {    alert("  NO HAY NINGUNA PARTIDA A MODIFICAR !!");
                                          return false;
                                     }
                                     controlPartidas( true );

                                     document.getElementById("txtQueOpcion").value="Editar";
                                     document.getElementById("txtdCantidadPartida").focus();
                                     document.getElementById("cmdAgregaPartida").disabled       = true;
                                     document.getElementById("cmdModificaPartida").disabled     = true;
                                     document.getElementById("cmdEliminaPartida").disabled      = true;
                                     document.getElementById("cmdAceptaDatosPartida").disabled  = false;
                                     document.getElementById("cmdCancelaPartida").disabled      = false;
                                     document.getElementById("cbosInstalacionAfectada").disabled= false;
                                     document.getElementById("cbosOrdenCambio").disabled        = false;
                                     document.getElementById("cbosIsomtricoReferencia").disabled= false;
                                }
                           );
                           if (ok==0)
                              alert ("  NO HA SELECCIONADO NINGUNA PARTIDA DEL GENERADOR !!!");
                       }
                   }
                   return false;
                 <?php
               }


               function cmdAgregaPartidaJSClick($sender, $params)
               {
                  global $_SESSION;
               ?>
                  //Add your javascript code here
                   if (document.getElementById("txtsNumeroGenerador").value=="")
                       alert("  HAGA CLICK EN UN GENERADOR Y DESPUES SELECCIONE UN PAQUETE !!!");
                   else
                   {
                       i = dbgGeneradores.getFocusedRow();
                       var aplicado = dbgGeneradores.getTableModel().getValue(5,i);
                       if (aplicado=="Autorizado")
                          alert("  Generador Aplicado, No puede realizar Cambios !!");
                       else
                       {
                           controlPartidas( true );
                           document.getElementById("txtQueOpcion").value="Agregar";
                           document.getElementById("cmdAgregaPartida").disabled=true;
                           document.getElementById("cmdModificaPartida").disabled=true;
                           document.getElementById("cmdEliminaPartida").disabled=true;
                           document.getElementById("cmdAceptaDatosPartida").disabled=false;
                           document.getElementById("cmdCancelaPartida").disabled=false;
                           document.getElementById("cbosInstalacionAfectada").disabled=false;
                           document.getElementById("cbosOrdenCambio").disabled=false;
                           document.getElementById("cbosIsomtricoReferencia").disabled=false;
                           document.getElementById("txtdCantidadPartida").value="";
                           document.getElementById("txtsIsometrico").value="";
                           document.getElementById("txtsPrefijo").value="";
                           document.getElementById("lEstima").checked =true;
                           document.getElementById("memoComentarios").value="";
                           document.getElementById("txtdCantidadPartida").focus();
                       }
                   }
                   return false;
               <?php
               }

               function cmdCancelaPartidaJSClick($sender, $params)
               {
               ?> //Add your javascript code here
                     document.getElementById("cmdAgregaPartida").disabled=false;
                     document.getElementById("cmdModificaPartida").disabled=false;
                     document.getElementById("cmdEliminaPartida").disabled=false;
                     document.getElementById("cmdAceptaDatosPartida").disabled=true;
                     document.getElementById("cmdCancelaPartida").disabled=true;
                     document.getElementById("cbosInstalacionAfectada").disabled=true;
                     document.getElementById("cbosOrdenCambio").disabled=true;
                     document.getElementById("cbosIsomtricoReferencia").disabled=true;
                     controlPartidas( false );
                     return false;
               <?php

               }

               function cmdEliminaPartidaJSClick($sender, $params)
               {
               global $_SESSION;
               ?> //Add your javascript code here
                   ok1=0;
                   if (document.getElementById("txtsNumeroGenerador").value=="")
                       alert("  HAGA CLICK EN UN GENERADOR !!!");
                   else
                   {
                       i = dbgGeneradores.getFocusedRow();
                       var aplicado = dbgGeneradores.getTableModel().getValue(5,i);
                       var creador =dbgGeneradores.getTableModel().getValue(8,i);

                           ok1=1;
                           if (aplicado=="Autorizado")
                           {
                                alert("  Generador Aplicado, No puede realizar Cambios !!");
                                return false;
                           }
                           else{
                                    ok=0;
                                    dbgPartidasEstimacion.getSelectionModel().iterateSelection
                                    (    function(index)
                                         {  //obtenemos los datos del generador
                                             var Tabla = dbgPartidasEstimacion.getTableModel();
                                             var sPartida = Tabla.getValue(1,index);
                                             var sWbs = Tabla.getValue(0,index);
                                             var sCantidad = Tabla.getValue(2,index);
                                             var sIsometrico = Tabla.getValue(3,index);
                                             ok=1;
                                             if (sWbs=="")
                                             {   alert("  NO EXISTE NINGUNA PARTIDA A ELIMINAR !!!");
                                                 return false;
                                             }
                                             if(!confirm(" Desea ELIMINAR LA PARTIDA Seleccionada?"))
                                             {
                                                return false;
                                             }
                                             document.getElementById("HDPartida").value = sPartida;
                                             document.getElementById("HDWbs").value = sWbs;
                                             document.getElementById("HDCantidad").value = sCantidad;
                                             document.getElementById("HDIsometrico").value = sIsometrico;
                                             document.getElementById("txtsNumeroGenerador").disabled = false;
                                             document.getElementById("txtsPrefijo").disabled = false;
                                             document.getElementById("hdfPartidas").value='si';
                                        }
                                    );
                                    if (ok==0)
                                       alert ("  NO HA SELECCIONADO NINGUNA PARTIDA DEL GENERADOR !!!");
                                }
                   }

                   if (ok1==1 && ok==1)
                      return true;
                   else
                      return false;

               <?php
               }

               function cmdEliminaPartidaClick($sender, $params)
               {    /*Eliminar de los datos*/
                    global $Connection;
                    global $sIdConvenioAct;
                    $Partida = $this->HDPartida->Value;
                    $Wbs = $this->HDWbs->Value;
                    $Cantidad = $this->HDCantidad->Value;
                    $Isometrico = $this->HDIsometrico->Value;
                    $Generador=trim($this->txtsNumeroGenerador->Text);
                    $Prefijo = $this->txtsPrefijo->Text;

                    //aqui se elimina la partida perteneciente al genrador seleccionado
                    if ($Wbs!="")
                    {   $sql = "delete
                              from estimacionxpartida
                              where
                                   sContrato='".$Connection->global_sContrato."'
                                   and sNumeroOrden='". $this->ordenSeleccionada() ."'
                                   and sNumeroGenerador='$Generador'
                                   and sNumeroActividad='$Partida'
                                   and sWbs='$Wbs'
                                   and sIsometrico='$Isometrico'
                                   and sPrefijo = '$Prefijo'
                              ";
                       mysql_query($sql);
                    }
                    if (mysql_error())
                    {
                        ?>
                       <script>
                          alert(" <?php echo " Ocurrio un error al Eliminar los Datos !!!" ?>");
                       </script>
                       <?php
                    }
                    else
                       {  $sql = "select
                                 EPP.sWbs as Wbs,
                                 EPP.sNumeroActividad as Partida,
                                 format(EPP.dCantidad,3) as Cantidad,
                                 EPP.sIsometrico as Isometrico,
                                 EPP.sIsometricoReferencia as Isom_Refer,
                                 EPP.sInstalacion as Instalacion,
                                 EPP.iOrdenCambio as O_Cambio,
                                 format(EPP.dCantidad*APO.dVentaMN,2) as Total
                           from
                                 estimacionxpartida EPP
                           INNER JOIN
                                 actividadesxorden APO
                           ON
                                 ( EPP.sContrato=APO.sContrato
                                 and EPP.sNumeroOrden=APO.sNumeroOrden
                                 and EPP.sWbs=APO.sWbs
                                 and APO.sIdConvenio='".$Connection->global_sIdConvenio."'
                                 and APO.sTipoActividad='Actividad')
                           where
                                 EPP.sContrato='".$Connection->global_sContrato."'
                                 and EPP.sNumeroOrden='". $this->ordenSeleccionada() ."'
                                 and EPP.sNumeroGenerador='$Generador'";
                          $this->qryEstimaxpartida->setActive(false);
                          $this->qryEstimaxpartida->setSql($sql);
                          $this->qryEstimaxpartida->setActive(true);
                          $this->llenarGridGeneral();
                     }
               }

               function cbosNumeroActividadJSChange($sender, $params)
               {
               ?> //Add your javascript code here
                   var totalFilas = dbgGeneralComboAct.getTableModel().getRowCount();
                   var gridGen;
                   var Dato=[];
                   var actividad = document.getElementById("cbosNumeroActividad").value;
                   //Se van a asignar uno a uno los valores que sean igual al generador
                   for (i=0;i<totalFilas;i++)
                   {   gridGen= dbgGeneralComboAct.getTableModel().getValue(1,i);
                       if (gridGen==actividad)
                       {    //obtencion de valores del dbgrid general
                               var sWbs = dbgGeneralComboAct.getTableModel().getValue(0,i);
                               var sPartida = dbgGeneralComboAct.getTableModel().getValue(1,i);
                               var sCantidad = dbgGeneralComboAct.getTableModel().getValue(2,i);
                               var sMedida = dbgGeneralComboAct.getTableModel().getValue(3,i);
                               var sInstalado = dbgGeneralComboAct.getTableModel().getValue(4,i);
                               var sExcedente = dbgGeneralComboAct.getTableModel().getValue(5,i);

                               var CuantasFilas = dbgPartidas.getTableModel().getRowCount();
                               var existe=0;
                               var sWbs_Actividad;
                               for (a=0;a<CuantasFilas;a++)
                               {   sWbs_Actividad = dbgPartidas.getTableModel().getValue(0,a);
                                    if (sWbs==sWbs_Actividad)
                                    {  existe++;
                                    }
                               }
                               if (existe==0)
                               {  Dato.push([sWbs,sPartida,sCantidad,sMedida,sInstalado,sExcedente]);
                                  var OtroDato = Dato;
                                  dbgPartidas.getTableModel().originalData=OtroDato;
                                  dbgPartidas.getTableModel().setData(Dato);
                               }
                               var Elprimero=0;
                               if (gridGen==actividad && Elprimero == 0)
                               {    //obtencion del primer valor valores del dbgrid generalcomboAct
                                    document.getElementById("txtsWbsPartida").value=sWbs;
                                    document.getElementById("txtdCantidadPartida").value="0.00";
                                    var sDescribir = dbgGeneralComboAct.getTableModel().getValue(6,i);
                                    document.getElementById("memoComentarios").value=sDescribir;

                                    Elprimero = 1;
                               }
                       }
                   }
                   document.getElementById("txtsIsometrico").value="";
                   document.getElementById("txtsPrefijo").value="";
                   return true;
               <?php
               }

               // DE AQUI EN ADELANTE ES PARA AGREGAR,MODIFICAR ELIMINAR..GENERADORES...

               function cmdAcceptGeneradorJSClick($sender, $params)
               {
                ?>  var FechaFF=document.getElementById("f-calendar-field-2").value;
                    var FechaFI=document.getElementById("f-calendar-field-1").value;

                    var SeparaFF= FechaFF.split("/");
                    var SeparaFI= FechaFI.split("/");
                    var diaFI=SeparaFI[0];
                    var diaFF=SeparaFF[0];
                    var mesFI=SeparaFI[1];
                    var mesFF=SeparaFF[1];
                    var AnnFI=SeparaFI[2];
                    var AnnFF=SeparaFF[2];
                    var error=0;
                    var ErrorFecha=0;
                    var limiteGen=0;

                        if (mesFI<mesFF)
                        {  limiteGen=1;
                        }
                        if (diaFI>diaFF || mesFI>mesFF || AnnFI>AnnFF)
                        {  error=1;
                        }
                        if ((diaFI>30)&&(mesFI==4 ||mesFI==6 || mesFI==9 || mesFI==11))
                        {  ErrorFecha=1;
                        }
                        if ((diaFF>30)&&(mesFF==4 ||mesFF==6 || mesFF==9 || mesFF==11))
                        {  ErrorFecha=1;
                        }
                        if ((diaFI>31)&&(mesFI==1 ||mesFI==3 || mesFI==5 || mesFI==7 || mesFI==8 || mesFI==10 || mesFI==12))
                        {  ErrorFecha=1;
                        }
                        if ((diaFF>31)&&(mesFF==1 ||mesFF==3 || mesFF==5 || mesFF==7 || mesFF==8 || mesFF==10 || mesFF==12))
                        {  ErrorFecha=1;
                        }
                        if (mesFI==2)
                        {  if ( diaFI>29 && AnnFI % 4 == 0 && (AnnFI % 100 != 0 || AnnFI % 400 == 0) )
                            {   ErrorFecha=1;
                            }else
                                 if (diaFI>28 && AnnFI % 4 != 0)
                                 {   ErrorFecha=1;
                                 }
                        }
                        if (mesFF==2)
                        {  if ( diaFF>29 && AnnFF % 4 == 0 && (AnnFF % 100 != 0 || AnnFF % 400 == 0) )
                           {   ErrorFecha=1;
                           }else
                              if (diaFF>28 && AnnFF % 4 != 0)
                              {   ErrorFecha=1;
                              }
                        }

                        if (mesFI>12 || mesFF>12)
                        {   ErrorFecha=1;
                        }

                    if (limiteGen==1)
                    {  alert("EL Generador No puede Abarcar un Periodo de 2 Meses !!!");
                       error=0;
                       return false;
                    }
                    if (error==1)
                    {  alert("La Fecha de INICIO debe ser MENOR a La Fecha FINAL!!!");
                       return false;
                    }
                    if (ErrorFecha==1)
                    {  alert("La FECHA ESCRITA sobrepasa los LIMITES!!!");
                       return false;
                    }
                    if (limiteGen==0 && error==0 && ErrorFecha==0)
                    {
                        //Invertir la fecha para ser guardada por año -mes- dia
                        FechaFF=document.getElementById("f-calendar-field-2").value;
                        FechaFI=document.getElementById("f-calendar-field-1").value;
                        SeparaFF= FechaFF.split("/");
                        SeparaFI= FechaFI.split("/");
                        auxFI="";
                        auxFF="";
                        auxFI=SeparaFI[2];
                        SeparaFI[2]=SeparaFI[0];
                        SeparaFI[0]=auxFI;
                         auxFF=SeparaFF[2];
                        SeparaFF[2]=SeparaFF[0];
                        SeparaFF[0]=auxFF;

                        var diaFI=SeparaFI[2];
                        var diaFF=SeparaFF[2];
                        var TotalSemanas=0;
                        var i=0;

                        for (x=diaFI;x<=diaFF;x++)
                        {   i++;
                            if (i==1)
                            {  TotalSemanas++;
                            }
                            if (i==7)
                            {  i=0;
                            }
                        }
                        document.getElementById("txtSemanas").value = TotalSemanas;

                        var JuntaFI="";
                        var JuntaFF="";
                           for (x=0;x<3;x++)
                           {   if (x==0)
                               {  JuntaFI=JuntaFI+SeparaFI[x];
                                  JuntaFF=JuntaFF+SeparaFF[x];
                               }else
                                   { JuntaFI=JuntaFI+"-"+SeparaFI[x];
                                     JuntaFF=JuntaFF+"-"+SeparaFF[x];
                                   }
                           }
                           document.getElementById("f-calendar-field-1").value = JuntaFI;
                           document.getElementById("f-calendar-field-2").value = JuntaFF;

                           // esto es para insertar fecha actual en bitacoras de inicio y fin
                           var fechaActual = new Date();
                           fechaActual = fechaActual.getFullYear() + "-" +
                           (fechaActual.getMonth()+1) + "-" +
                           fechaActual.getDate();
                           var separa=fechaActual.split("-");
                           if (separa[1]<10)
                           {  separa[1]="0"+separa[1];
                           }
                           if (separa[2]<10)
                           {  separa[2]="0"+separa[2];
                           }
                           var fechAct=separa[0]+"-"+separa[1]+"-"+separa[2];
                           document.getElementById("txtFechasBitacoras").value = fechAct;

                           //para seleccionar elementos de la lista de Fases
                           var listFases = document.getElementById("listFases[]");
                           var textosSeleccionados = "";
                           for (i = 0; i< listFases.length; i++)
                           {
                              if (listFases.options[i].selected == true)
                                 textosSeleccionados = textosSeleccionados+ listFases.options[i].text+"-";
                           }
                           document.getElementById("Edit1").value = textosSeleccionados;
                    }
                    return true;

               <?php

               }

               //Funcion para agregar o modificar generadores...
               function cmdAcceptGeneradorClick($sender, $params)
               {
                   global $sContrato;
                   global $sIdConvenioAct;
                   global $sIdUsuario;
                   global $sIdAutoriza;

                   $Generador = trim($this->txtsNumeroGenerador->Text);
                   $i = $this->cboiNumeroEstimacion->getItemIndex();
                   $Estimacion = $this->cboiNumeroEstimacion->Items[$i];

                   $FechaI = $this->dateInicio->Text;
                   $FechaF = $this->dateFinal->Text;
                   //Verificar rango de fechas del generador....
                   $sql = " select dFechaInicio, dFechaFinal
                            from estimacionperiodo
                            where     sContrato         = '".$Connection->global_sContrato."'
                                  and iNumeroEstimacion = '$Estimacion'";
                   $rs  = mysql_query($sql);
                   $row = mysql_fetch_array($rs);
                   $Fecha_Inicio = $row['dFechaInicio'];
                   $Fecha_Final  = $row['dFechaFinal'];
                   $Entra1 = 0;
                   $Entra2 = 0;
                   if ($Fecha_Inicio <= $FechaI)
                       $Entra1 = 1;
                   if ($Fecha_Final  >= $FechaF)
                       $Entra2 = 1;

                   if ($Entra1 == 1 and $Entra2 == 1)
                   {    $Fases = trim($this->Edit1->Text);
                        $Consecutivo = trim($this->txtNumeroConsecutivo->Text);
                        $Semanas= trim($this->txtSemanas->Text);
                        $FechaBitacoras=trim($this->txtFechasBitacoras->Text);
                        $Comentarios=$this->memoComentaGenerador->Text;

                        $ValorAnterior=trim($this->txtValorAntes->Text);
                        $GeneradorOLD=trim($this->txtGenerAnterior->Text);
                        /*Agregar Generadores.....*/
                        if ($this->txtQueOpcion->Text=="Agregar")
                        {
                           $this->txtQueOpcion->Text="";
                           $sql = "INSERT INTO estimaciones (
                                    sContrato,
                                    iNumeroEstimacion,
                                    sNumeroOrden,
                                    sNumeroGenerador,
                                    iSemana,
                                    iConsecutivo,
                                    dFechaInicio,
                                    dFechaFinal,
                                    dBitacoraInicio,
                                    dBitacoraFinal,
                                    sFaseObra,
                                    mComentarios,
                                    lStatus,
                                    sIdUsuario,
                                    sIdUsuarioAutoriza

                                 )VALUES (
                                    '".$Connection->global_sContrato."',
                                    '$Estimacion',
                                    '". $this->ordenSeleccionada() ."',
                                    '$Generador',
                                    '$Semanas',
                                    '$Consecutivo',
                                    '$FechaI',
                                    '$FechaF',
                                    '$FechaBitacoras',
                                    '$FechaBitacoras',
                                    '$Fases',
                                    '$Comentarios',
                                    'Pendiente',
                                    '$sIdUsuario',
                                    '$sIdAutoriza')";
                           mysql_query($sql);
                        }
                        else  /*Modificacion de los datos*/
                        if ($this->txtQueOpcion->Text=="Editar")
                        {
                           $this->txtQueOpcion->Text="";
                           $sql = "update estimaciones  set
                                   iNumeroEstimacion = '$Estimacion',
                                   sNumeroGenerador='$Generador',
                                   dFechaInicio='$FechaI',
                                   dFechaFinal='$FechaF',
                                   sFaseObra='$Fases',
                                   mComentarios='$Comentarios'
                                 where
                                   sContrato='".$Connection->global_sContrato."'
                                   and sNumeroOrden='". $this->ordenSeleccionada() ."'
                                   and iConsecutivo='$ValorAnterior' ";
                           mysql_query($sql);
                           $sql = "update estimacionxpartida  set
                                    sNumeroGenerador='$Generador'
                                 where
                                    sContrato='".$Connection->global_sContrato."'
                                    and sNumeroOrden='". $this->ordenSeleccionada() ."'
                                    and sNumeroGenerador='$GeneradorOLD'";
                           mysql_query($sql);
                           $this->txtValorAntes->Text="";
                        }

                        if(mysql_error())
                        {
                           ?>
                           <script>
                              alert(" <?php echo " Ocurrio un error al Actualizar los Datos !!!" ?>");
                           </script>
                           <?php
                        }
                        $this->llenarGrid();
                        $this->llenarGridGeneral();
                   }else
                       {  ?>
                           <script>
                              alert(" <?php echo "Favor de Checar las Fechas de Inicio y Fin para el Generador $Generador, las Cuales deben estar dentro del Rango de Fechas de la Estimacion $Estimacion" ?>");
                           </script>
                           <?php
                       }
               }

              //Elimina una estimacion del dbgird Generadores....
               function cmdDeleteGeneradorJSClick($sender, $params)
               {
               global $_SESSION;
               ?> //Add your javascript code here
                     ok=0;
                    //Se hace referencia al generador seleccionado
                    dbgGeneradores.getSelectionModel().iterateSelection
                    (    function(index)
                         {  //obtenemos los datos del generador
                            var Tabla = dbgGeneradores.getTableModel();
                            var sConsecutivo = Tabla.getValue(11,index);
                            var creador = Tabla.getValue(8, index);
                            ok=1;
                            if(!confirm("Desea ELIMINAR El Generador Seleccionado?"))
                            {    return false;
                            }
                            var sWbs=dbgPartidasEstimacion.getTableModel().getValue(0,0);
                            if (sWbs!="")
                            {   alert(" EL GENERADOR CONTIENE ACTIVIDADES.. NO SE PUEDE ELIMINAR!!");
                                return false;
                            }
                            params=sConsecutivo+"]"+sWbs;
                            <?php
                                echo $this->dbgGeneradores->ajaxCall("EliminaFila",array(),array("dbgGeneradores"));
                            ?>
                         }
                    );
                    if (ok==0)
                    {    alert ("No ha Seleccionado un Generador!!!");
                    }
                    return false;
               <?php
               }

               function EliminaFila($sender="", $params="")
               {    /*Eliminar de los datos*/
                    global $sContrato;
                    $DatosRecib=explode("]",$params);
                    $Consecutivo=$DatosRecib[0];
                    $Wbs=$DatosRecib[1];

                    //Si no datos que dependan.. se elimina el generador
                    if ($Wbs=="")
                    {  $sql = "delete
                              from estimaciones
                              where
                                   sContrato='".$Connection->global_sContrato."'
                                   and sNumeroOrden='". $this->ordenSeleccionada() ."'
                                   and iConsecutivo='$Consecutivo'
                              ";
                       mysql_query($sql);
                    }
                    if ($Wbs!="")
                    {
                       ?>
                       <script>
                          alert(" <?php echo " Ocurrio un error al Eliminar los Datos !!!" ?>");
                       </script>
                       <?php
                    }
                    $this->llenarGrid();
                    $this->llenarGridActxOrd();
               }

               function dbgPartidasEstimacionJSClick($sender, $params)
               {
               ?> //Add your javascript code here

                    dbgPartidasEstimacion.getSelectionModel().iterateSelection
                    (    function(index)
                         {
                           //obtenemos los datos del grid Estimacion partida
                           var Tabla = dbgPartidasEstimacion.getTableModel();
                           var wbs = Tabla.getValue(0, index);
                           var Isometrico = Tabla.getValue(3, index);
                           var Prefijo = document.getElementById("txtsPrefijo").value;

                           //Obtenemos el total de elementos encontrados en el dbgrid General
                           var totalFilas=dbgGeneral.getTableModel().getRowCount();
                           var gridGen;

                           fin =0;
                           //Se van a asignar uno a uno los valores que sean igual al wbs
                           for (i=0;i<totalFilas;i++)
                           {   gridGen= dbgGeneral.getTableModel().getValue(0,i);
                               gridIso= dbgGeneral.getTableModel().getValue(3,i);
                               gridPref= dbgGeneral.getTableModel().getValue(16,i);

                               if (gridGen==wbs && gridIso==Isometrico && gridPref==Prefijo && fin==0)
                               {
                                 //obtencion de valores
                                 var sWbs=dbgGeneral.getTableModel().getValue(0,i);
                                 var sPartida=dbgGeneral.getTableModel().getValue(1,i);
                                 var sCantidad=dbgGeneral.getTableModel().getValue(2,i);
                                 var sIsometrico=dbgGeneral.getTableModel().getValue(3,i);
                                 var sIsometricoRef=dbgGeneral.getTableModel().getValue(4,i);
                                 var sInstalacion=dbgGeneral.getTableModel().getValue(5,i);
                                 var sOCambio=dbgGeneral.getTableModel().getValue(6,i);
                                 var sCantidad2=dbgGeneral.getTableModel().getValue(9,i);
                                 var sMedida=dbgGeneral.getTableModel().getValue(10,i);
                                 var sInstalado=dbgGeneral.getTableModel().getValue(11,i);
                                 var sExcedente=dbgGeneral.getTableModel().getValue(12,i);
                                 var sComentario=dbgGeneral.getTableModel().getValue(13,i);
                                 var sEstimado=dbgGeneral.getTableModel().getValue(15,i);
                                 var sPrefijo=dbgGeneral.getTableModel().getValue(16,i);

                                 //Colocacion de datos a los combos y textos....
                                 document.getElementById("cbosNumeroActividad").value = sPartida;
                                 document.getElementById("txtdCantidadPartida").value = sCantidad;
                                 document.getElementById("txtsIsometrico").value = sIsometrico;
                                 document.getElementById("txtsPrefijo").value  = sPrefijo;
                                 if (sEstimado=="Si")
                                       {  document.getElementById("lEstima").checked = true;
                                       } else
                                            {  document.getElementById("lEstima").checked = false;
                                            }
                                 document.getElementById("cbosInstalacionAfectada").value = sInstalacion;
                                 document.getElementById("cbosOrdenCambio").value = sOCambio;
                                 document.getElementById("cbosIsomtricoReferencia").value = sIsometricoRef;
                                 document.getElementById("memoComentarios").value = sComentario;

                                    var Dato=[];
                                    Dato.push([sWbs,sPartida,sCantidad,sMedida,sInstalado,sExcedente]);
                                    var OtroDato = Dato;
                                    dbgPartidas.getTableModel().originalData=OtroDato;
                                    dbgPartidas.getTableModel().setData(Dato);

                                   //colocacion devalores al grid Partidas
                                  dbgPartidas.getTableModel().setValue(0,0,sWbs);
                                  dbgPartidas.getTableModel().setValue(1,0,sPartida);
                                  dbgPartidas.getTableModel().setValue(2,0,sCantidad2);
                                  dbgPartidas.getTableModel().setValue(3,0,sMedida);
                                  dbgPartidas.getTableModel().setValue(4,0,sInstalado);
                                  dbgPartidas.getTableModel().setValue(5,0,sExcedente);

                                  //Definicion del ancho de columnas
                                  dbgPartidas.getTableColumnModel().setColumnWidth(0,100);
                                  dbgPartidas.getTableColumnModel().setColumnWidth(1,70);
                                  dbgPartidas.getTableColumnModel().setColumnWidth(2,70);
                                  dbgPartidas.getTableColumnModel().setColumnWidth(3,70);
                                  dbgPartidas.getTableColumnModel().setColumnWidth(4,70);
                                  dbgPartidas.getTableColumnModel().setColumnWidth(5,70);
                                  fin=1;

                                }
                            }
                         }
                     );
                     return false;
               <?php
               }


               function dbgGeneradoresJSClick($sender, $params)
               {
               ?> //Add your javascript code here

                  dbgGeneradores.getTableColumnModel().setColumnWidth(10,0);
                  dbgGeneradores.getTableColumnModel().setColumnWidth(11,0);

                  dbgGeneradores.getSelectionModel().iterateSelection
                  (    function(index)
                       {
                           //obtenemos los datos de la Tabla Estimaciones
                           var Tabla = dbgGeneradores.getTableModel();
                           var est = Tabla.getValue(0, index);
                           var gen = Tabla.getValue(1, index);
                           var FInicio = Tabla.getValue(3, index);
                           var FFinal = Tabla.getValue(4, index);
                           var Fase = Tabla.getValue(10,index);
                           var consecutivo=Tabla.getValue(11,index);

                           //objetos que seran usados en modificaciones..
                           document.getElementById("txtValorAntes").value =consecutivo;
                           document.getElementById("txtGenerAnterior").value =gen;

                           //objetos para mostrar datos al hacer click
                           document.getElementById("txtsNumeroGenerador").value = gen;
                           document.getElementById("cboiNumeroEstimacion").value = est;
                           document.getElementById("f-calendar-field-1").value = FInicio;
                           document.getElementById("f-calendar-field-2").value = FFinal;
                           document.getElementById("Edit1").value = Fase;

                           //Aqui se separan los elementos de la Fase de Obra y se van a seleccionar
                           //en la lista
                           var Elementos= Fase.split("-");
                           var listFases = document.getElementById("listFases[]");

                           //Se deseleccioan primero todos los elementos
                           for (a=0;a<listFases.length;a++)
                           {   listFases.options[a].selected= false;
                           }

                           //Se seleccionan el o los elementos en la lista
                           for (a=0;a<listFases.length;a++)
                           {   for ( b=0; b<Elementos.length; b++)
                               {   if (Elementos[b]==listFases.options[a].text)
                                      listFases.options[a].selected= true;
                               }
                           }

                           //Obtenemos el total de elementos encontrados en el dbgrid General
                           var totalFilas=dbgGeneral.getTableModel().getRowCount();
                           var i;
                           var gridGen;
                           var rowData = [];
                           var TieneDatos=0;

                           //Se van a asignar uno a uno los valores que sean igual al generador
                           for (i=0;i<totalFilas;i++)
                           {   gridGen= dbgGeneral.getTableModel().getValue(14,i);

                               if (gridGen==gen)
                               {
                                 //obtencion de valores del dbgrid general

                                 var sWbs=dbgGeneral.getTableModel().getValue(0,i);
                                 var sPartida=dbgGeneral.getTableModel().getValue(1,i);
                                 var sCantidad=dbgGeneral.getTableModel().getValue(2,i);
                                 var sIsometrico=dbgGeneral.getTableModel().getValue(3,i);
                                 var sIsometricoRef=dbgGeneral.getTableModel().getValue(4,i);
                                 var sInstalacion=dbgGeneral.getTableModel().getValue(5,i);
                                 var sOCambio=dbgGeneral.getTableModel().getValue(6,i);
                                 var sTotal=dbgGeneral.getTableModel().getValue(7,i);

                                 var sCantidad2=dbgGeneral.getTableModel().getValue(9,i);
                                 var sMedida=dbgGeneral.getTableModel().getValue(10,i);
                                 var sInstalado=dbgGeneral.getTableModel().getValue(11,i);
                                 var sExcedente=dbgGeneral.getTableModel().getValue(12,i);
                                 var sEstimado=dbgGeneral.getTableModel().getValue(15,i);
                                 var sPrefijo=dbgGeneral.getTableModel().getValue(16,i);

                                 //Colocacion de valores al dbgrid PartidasEstimacion
                                  rowData.push([sWbs,sPartida,sCantidad,sIsometrico,sIsometricoRef,sInstalacion,sOCambio,sTotal]);
                                  var oData = rowData;
                                  dbgPartidasEstimacion.getTableModel().originalData=oData;
                                  dbgPartidasEstimacion.getTableModel().setData(rowData);

                                  if (TieneDatos==0)
                                  {
                                     //colocacion de valores al dbgrid Partidas

                                       var Dato=[];
                                       Dato.push([sWbs,sPartida,sCantidad,sMedida,sInstalado,sExcedente]);
                                       var OtroDato = Dato;
                                       dbgPartidas.getTableModel().originalData=OtroDato;
                                       dbgPartidas.getTableModel().setData(Dato);

                                     //colocacion de valores a los combos, textos, etc...
                                       document.getElementById("cbosNumeroActividad").value  = sPartida;
                                       if (sEstimado=="Si")
                                       {  document.getElementById("lEstima").checked = true;
                                       } else
                                            {  document.getElementById("lEstima").checked = false;
                                            }
                                       document.getElementById("txtdCantidadPartida").value  = sCantidad;
                                       document.getElementById("txtsIsometrico").value  = sIsometrico;
                                       document.getElementById("txtsPrefijo").value  = sPrefijo;
                                       document.getElementById("cbosInstalacionAfectada").value  = sInstalacion;
                                       if (sOCambio==0)
                                       {  document.getElementById("cbosOrdenCambio").options[0].text  = "SIN ORDEN DE CAMBIO"
                                       }else
                                          { document.getElementById("cbosOrdenCambio").options[0].text  = sOCambio;
                                          }
                                       document.getElementById("cbosIsomtricoReferencia").options[0].text  = sIsometricoRef;
                                       document.getElementById("memoComentarios").value  = dbgGeneral.getTableModel().getValue(13,i);
                                  }

                                  TieneDatos=1;
                               }
                           }

                           //Se limpia el dbgrid si no hay datos....
                           if (TieneDatos==0)
                           {
                                  rowData.push(['-','','','','','','','']);
                                  var oData = rowData;
                                  dbgPartidasEstimacion.getTableModel().originalData=oData;
                                  dbgPartidasEstimacion.getTableModel().setData(rowData);

                           }

                           //Estas lineas con para activar los botones de las Partidas
                           if (document.getElementById("cmdCancelaPartida").disabled==false)
                           {
                              document.getElementById("cmdAgregaPartida").disabled=false;
                              document.getElementById("cmdModificaPartida").disabled=false;
                              document.getElementById("cmdEliminaPartida").disabled=false;
                              document.getElementById("cmdAceptaDatosPartida").disabled=true;
                              document.getElementById("cmdCancelaPartida").disabled=true;
                           }
                           return false;
                        }
                   );
                   return false;
               <?php
               }

               function listFasesJSClick($sender, $params)
               {
               ?> // Add your javascript code here
                    if (document.getElementById("hdfRecomienda").value<4)
                    {   document.getElementById("lblRecomienda").innerHTML="Presione CTRL y de Click sobre los elementos";
                        var sum=document.getElementById("hdfRecomienda").value;
                        sum++;
                        document.getElementById("hdfRecomienda").value=sum;
                    }
                     return false;
               <?php
               }


               function Edit1JSChange($sender, $params)
               {
               ?> //Add your javascript code here
                  alert(document.getElementById("Edit1").value);
               <?php
               }

               function cbosNumeroOrdenChange($sender, $params)
               {
                  $this->llenarGrid();
                  $this->llenarGridGeneral();
                  $this->llenarGridExP();
                  $this->llenarGridActxOrd();
                  $this->llenarGridComboActividasdes();
               }

               function cmdCancelGeneradorJSClick($sender, $params)
               {
               ?>  //Add your javascript code here
                  controlesGeneradores( true );
                  return false;
               <?php
               }


               function cmdChangeGeneradorJSClick($sender, $params)
               {
               global $_SESSION;
               ?> //Add your javascript code here
                   document.getElementById("hdfRecomienda").value=1;
                   ok=0;
                   dbgGeneradores.getSelectionModel().iterateSelection
                   (    function(index)
                        {
                           //obtenemos los datos de la Tabla Estimaciones
                           var Tabla = dbgGeneradores.getTableModel();
                           var creador = Tabla.getValue(8, index);

                           var generador = Tabla.getValue(1, index);
                           document.getElementById("txtQueOpcion").value = "Editar";
                           document.getElementById("txtGenerAnterior").value = generador;
                           controlesGeneradores( false );
                           document.getElementById("txtsNumeroGenerador").focus();
                           ok=1;
                        }
                   );
                   if (ok==0)
                   {  alert("No ha Seleccionado NINGUN GENERADOR !! ");
                   }
                   return false;
               <?php
               }

               function FrmGeneradoresJSLoad($sender, $params)
               {

               ?>
               //Add your javascript code here
                  Inicio();
               <?php

               }

               function cmdAddGeneradorJSClick($sender, $params)
               {
               ?> //Add your javascript code here
                   controlesGeneradores( false );
                   document.getElementById("hdfRecomienda").value=1;
                   document.getElementById("txtsNumeroGenerador").focus();
                   totalFilas=dbgGeneradores.getTableModel().getRowCount();
                   if (totalFilas==0)
                   {  var sConsecut =1;
                   }else
                       {
                          var sConsecut = dbgGeneradores.getTableModel().getValue(11,0);
                          for(var i=1;i<totalFilas;i++)
                          {   var consecut = dbgGeneradores.getTableModel().getValue(11,i);
                              if (Number(consecut)>=Number(sConsecut))
                                 sConsecut=consecut;
                          }
                       }

                   dbgGeneradores.getSelectionModel().iterateSelection
                   (    function(index)
                        {
                           //obtenemos los datos de la Tabla Estimaciones
                           var Tabla = dbgGeneradores.getTableModel();
                           var FechaFI = Tabla.getValue(3, index);
                           var FechaFF = Tabla.getValue(4, index);
                           var error=1;
                           var ValidaDia=1;
                           var EsDic=1;
                           var SeparaFF= FechaFF.split("/");
                           var SeparaFI= FechaFI.split("/");

                           if ( (SeparaFF[1]=='04' || SeparaFF[1]=='06' || SeparaFF[1]=='09' || SeparaFF[1]=='11') && (SeparaFF[0]=='30'))
                           {  ValidaDia=0;
                              error=0;
                           }
                           if ( (SeparaFF[1]=='01' || SeparaFF[1]=='03' || SeparaFF[1]=='05' || SeparaFF[1]=='07' || SeparaFF[1]=='08' || SeparaFF[1]=='10' || SeparaFF[1]=='12') && (SeparaFF[0]=='31'))
                           {  ValidaDia=0;
                              if (SeparaFF[1]=='12')
                              {  EsDic=0;
                              }
                              error=0;
                           }
                           if ( (SeparaFF[1]=='02') && (SeparaFF[0]=='28' || SeparaFF[0]=='29'))
                           {  ValidaDia=0;
                              error=0;
                           }

                           if (ValidaDia==0)
                           {
                              if (EsDic==0)
                              {  var Ann=SeparaFF[2];
                                 Ann++;
                                 SeparaFI[0]='01';
                                 SeparaFI[1]='01';
                                 SeparaFF[0]='07';
                                 SeparaFF[1]='01';
                                 SeparaFI[2]=Ann;
                                 SeparaFF[2]=Ann;
                              }
                              else
                              {  var mes=SeparaFF[1];
                                 mes++;
                                 SeparaFI[0]='01';
                                 SeparaFF[0]='07';
                                 if (mes<10)
                                 {  SeparaFI[1]='0'+ mes;
                                    SeparaFF[1]='0'+ mes;
                                 }else
                                     { SeparaFI[1]=mes;
                                       SeparaFF[1]=mes;
                                     }
                              }
                           }
                           else
                               {  var Ann=SeparaFF[2];
                                  var mes=SeparaFF[1];
                                  var dia=SeparaFF[0];
                                  var sumDia=dia;
                                  dia++;
                                  for (x=0;x<7;x++)
                                      sumDia++;
                                  var cumple=1;
                                  if ( (sumDia<=31) && (mes==1 || mes==3 || mes==5 || mes==7 || mes==8 || mes==10 || mes==12) )
                                  {    SeparaFI[0]=dia;
                                       SeparaFF[0]=sumDia;
                                       cumple=0;
                                  }
                                  if ( (sumDia<=30) && (mes==4 || mes==6 || mes==9 || mes==11) )
                                  {    SeparaFI[0]=dia;
                                       SeparaFF[0]=sumDia;
                                       cumple=0;
                                  }
                                  if (mes==2)
                                  {  if ( sumDia<=29  && Ann % 4 == 0 && (Ann % 100 != 0 || Ann % 400 == 0) )
                                     {    SeparaFI[0]=dia;
                                          SeparaFF[0]=sumDia;
                                          cumple=0;
                                     }else  if ( (sumDia<=28) && Ann % 4 !=0 )
                                            {    SeparaFI[0]=dia;
                                                 SeparaFF[0]=sumDia;
                                                 cumple=0;
                                            }
                                  }
                                  if (cumple==1)
                                  {  alert("EL Generador No puede Abarcar un Periodo de 2 Meses !!");
                                  }

                               }

                           JuntaFI="";
                           JuntaFF="";
                           for (x=0;x<3;x++)
                           {   if (x==0)
                               {  JuntaFI=JuntaFI+SeparaFI[x];
                                  JuntaFF=JuntaFF+SeparaFF[x];
                               }else
                                   { JuntaFI=JuntaFI+"/"+SeparaFI[x];
                                     JuntaFF=JuntaFF+"/"+SeparaFF[x];
                                   }
                           }
                           document.getElementById("f-calendar-field-1").value = JuntaFI;
                           document.getElementById("f-calendar-field-2").value = JuntaFF;
                     }
                );
                sConsecut++;
                document.getElementById("txtNumeroConsecutivo").value = sConsecut ;
                document.getElementById("txtQueOpcion").value = "Agregar";
                document.getElementById("txtsNumeroGenerador").value="";
                document.getElementById("Edit1").value="";
                return false;
               <?php
               }


               function FrmGeneradoresShow($sender, $params)
               {
                  global $sContrato;


               }

               //se llena el dbgrid de las estimaciones
               function llenarGrid(){
                  global $Connection,$sIdConvenioAct;
                  $sql = "select
                          iNumeroEstimacion as Est,
                          sNumeroGenerador as Generador,
                          iSemana as Semanas,
                          date_format(dFechaInicio,'%d/%m/%Y') as F_Inicio,
                          date_format(dFechaFinal,'%d/%m/%Y') as F_Final,
                          lStatus as Estatus,
                          concat('$ ',format(dMontoMN,2)) as MontoMN,
                          concat('$ ',format(dMontoDLL,2)) as MontoDLL,
                          sIdUsuario as Creador,
                          sIdUsuarioAutoriza as Autoriza,
                          sFaseObra as FaseObra,
                          iConsecutivo as Consecutivo
                        from
                          estimaciones
                        where
                            sContrato='".$Connection->global_sContrato."'
                            and sNumeroOrden='". $this->ordenSeleccionada() ."'
                        order by sNumeroGenerador desc";
                  $this->qryEstimaciones->setActive(false);
                  $this->qryEstimaciones->setSql($sql);
                  $this->qryEstimaciones->setActive(true);

                  //Llenado del combo Numero de Actividad
                  $sql = "select sNumeroActividad from actividadesxorden
                          where sContrato='".$Connection->global_sContrato."'
                                and sNumeroOrden='". $this->ordenSeleccionada() ."'
                                and sIdConvenio='".$Connection->global_sIdConvenio."'
                                and sTipoActividad='Actividad'
                          order by iItemOrden,sNumeroActividad asc";
                  $rs = mysql_query($sql);
                  unset($items);
                  $items["-/-/-/"]="";
                  while($row = mysql_fetch_array($rs)){
                     $items[$row["sNumeroActividad"]]=$row["sNumeroActividad"];
                  }
                  $this->cbosNumeroActividad->setItems($items);

                  //Llenado del combo de la Instalacion afectada
                  $sql = "select distinct sInstalacion from contrato_trinomio
                          Where sContrato = '".$Connection->global_sContrato."'
                                and lVigente = 'Si'";
                  $rs = mysql_query($sql);
                  unset($items);
                  while($row = mysql_fetch_array($rs)){
                     $items[$row["sInstalacion"]]=$row["sInstalacion"];
                  }
                  $this->cbosInstalacionAfectada->setItems($items);

                  //Llenado del combo orden de cambio
                  $sql = "select distinct iOrdenCambio from estimacionxpartida
                          where sContrato='".$Connection->global_sContrato."'";
                  $rs = mysql_query($sql);
                  unset($items);
                  while($row = mysql_fetch_array($rs)){
                     $items[$row["iOrdenCambio"]]=$row["iOrdenCambio"];
                  }
                  $this->cbosOrdenCambio->setItems($items);

                  //Llenado del combo isometrico de referencia
                  $sql = "select distinct sIsometricoReferencia from estimacionxpartida
                          where sContrato='".$Connection->global_sContrato."' ";
                  $rs = mysql_query($sql);
                  unset($items);
                  while($row = mysql_fetch_array($rs)){
                     $items[$row["sIsometricoReferencia"]]=$row["sIsometricoReferencia"];
                  }
                  $this->cbosIsomtricoReferencia->setItems($items);

                   //Llenado del combo Numero de Estimacion
                  $sql = "select iNumeroEstimacion from estimacionperiodo
                          where sContrato='".$Connection->global_sContrato."' ";
                  $rs = mysql_query($sql);
                  unset($items);
                  while($row = mysql_fetch_array($rs)){
                     $items[$row["iNumeroEstimacion"]]=$row["iNumeroEstimacion"];
                  }
                  $this->cboiNumeroEstimacion->setItems($items);
               }

               //Aqui se llena un dbgrid general en el que se almacenan todos los datos y
               //posteriormente usarlos... para el grid actividadesxorden y estimacionxperiodo
               function llenarGridGeneral()
               {
                  global $Connection;
                  global $sIdConvenioAct;
                  $sql = "select sTipoObra from contratos where sContrato = '$sContrato' ";

                  $Connection->Query4->setActive(false);
                  $Connection->Query4->setSQL($sql);
                  $Connection->Query4->open();
                  if ( $Connection->Query4->RecordCount > 0 )
                  {
                    $sTipoObra = $Connection->Query4->Fields["sTipoObra"];

                  }

                  if ($sTipoObra == "PROGRAMADA" OR $sTipoObra == "MIXTA")
                    $sql = "Select
                              e1.sWbs as Wbs,
                              e1.sNumeroActividad as Partida,
                              format(e1.dCantidad,3) as Cantidad,
                              e1.sIsometrico as Isometrico,
                              e.sIsometricoReferencia as Isom_Refer,
                              e1.sInstalacion as Instalacion,
                              e1.iOrdenCambio as O_Cambio,
                              format(e1.dCantidad*a.dVentaMN,2) as Total,
                              a.sWbs as WBS_1,
                              format(a.dCantidad,3) as Cantidad_2,
                              a.sMedida as Medida,
                              format(a.dInstalado,3) as Instalado,
                              format(a.dExcedente,3) as Excedente ,
                              a.mDescripcion as Descripcion,
                              e1.sNumeroGenerador as N_Generador,
                              e1.lEstima as Estimado,
                              e1.sPrefijo
                        from estimacionxpartida e1
                            inner join actividadesxorden a on (a.sContrato = e1.sContrato and a.sIdConvenio = '".$Connection->global_sIdConvenio."'
                              and a.sNumeroOrden = e1.sNumeroOrden and
                            replace(a.sWbs,' ','') = replace(e1.sWbsContrato ,' ','')
                            and replace(a.sNumeroActividad ,' ','') = replace(e1.sNumeroActividad ,' ','') And a.sTipoActividad = 'Actividad')
                            Where e1.sContrato = '".$Connection->global_sContrato."' And e1.sNumeroOrden ='". $this->ordenSeleccionada() ."'
                            Order By sNumeroGenerador ASC";
                    else
                     $sql = "Select
                              e1.sWbs as Wbs,
                              e1.sNumeroActividad as Partida,
                              format(e1.dCantidad,3) as Cantidad,
                              e1.sIsometrico as Isometrico,
                              e1.sIsometricoReferencia as Isom_Refer,
                              e1.sInstalacion as Instalacion,
                              e1.iOrdenCambio as O_Cambio,
                              format(e1.dCantidad*a.dVentaMN,2) as Total,
                              a.sWbs as WBS_1,
                              format(a.dCantidadAnexo,3) as Cantidad_2,
                              a.sMedida as Medida,
                              format(a.dInstalado,3) as Instalado,
                              format(a.dExcedente,3) as Excedente ,
                              a.mDescripcion as Descripcion,
                              e1.sNumeroGenerador as N_Generador,
                              e1.lEstima as Estimado,
                              e1.sPrefijo
                     from estimacionxpartida e1
                            inner join actividadesxanexo a on (a.sContrato = e1.sContrato And a.sIdConvenio ='".$Connection->global_sIdConvenio."' And
                            replace(a.sWbs,' ','') = replace(e1.sWbsContrato ,' ','') and replace(a.sNumeroActividad ,' ','') = replace(e1.sNumeroActividad ,' ','')  And a.sTipoActividad = 'Actividad' )
                            Where e1.sContrato = '".$Connection->global_sContrato."' And e1.sNumeroOrden = '". $this->ordenSeleccionada() ."'  Order By sNumeroGenerador ASC";

                    $sql;
//                  $sql = "select
//                          EPP.sWbs as Wbs,
//                          EPP.sNumeroActividad as Partida,
//                          format(EPP.dCantidad,3) as Cantidad,
//                          EPP.sIsometrico as Isometrico,
//                          EPP.sIsometricoReferencia as Isom_Refer,
//                          EPP.sInstalacion as Instalacion,
//                          EPP.iOrdenCambio as O_Cambio,
//                          format(EPP.dCantidad*APO.dVentaMN,2) as Total,
//                          APO.sWbs as WBS_1,
//                          format(APO.dCantidad,3) as Cantidad_2,
//                          APO.sMedida as Medida,
//                          format(APO.dInstalado,3) as Instalado,
//                          format(APO.dExcedente,3) as Excedente ,
//                          APO.mDescripcion as Descripcion,
//                          EPP.sNumeroGenerador as N_Generador,
//                          EPP.lEstima as Estimado,
//                          EPP.sPrefijo
//                        from
//                          estimacionxpartida EPP
//
//                        INNER JOIN
//                          actividadesxorden APO
//                        ON
//                        ( EPP.sContrato=APO.sContrato
//                          and EPP.sNumeroOrden=APO.sNumeroOrden
//                          and EPP.sWbs=APO.sWbs
//                          and APO.sIdConvenio='".$Connection->global_sIdConvenio."'
//                          and APO.sTipoActividad='Actividad')
//                        where
//                            EPP.sContrato='".$Connection->global_sContrato."'
//                            and EPP.sNumeroOrden='". $this->ordenSeleccionada() ."'
//                        order by sNumeroGenerador desc";

                  $this->qryGeneral->setActive(false);
                  $this->qryGeneral->setSql($sql);
                  $this->qryGeneral->setActive(true);

               }

               //Aqui se hace este llenado unicamente para obtener las columnas del dbgid estimacionxperiodo
               //obteniendo solo un dato, del cual no se muestra nada por el uso del LEFT
               function llenarGridExP()
               {
                  global $sContrato;
                  global $sIdConvenioAct;
                  //Solo es para obtener los nombres de las columnas..
                  $sql = "select
                          '' as Wbs,
                          '' as Partida,
                          '' as Cantidad,
                          '' as Isometrico,
                          '' as Isom_Refer,
                          '' as Instalacion,
                          '' as O_Cambio,
                          '' as Total
                        from
                          estimacionxpartida EPP
                        where
                            EPP.sContrato='".$Connection->global_sContrato."'
                            and EPP.sNumeroOrden='". $this->ordenSeleccionada() ."'
                        ";
                  $this->qryEstimaxpartida->setActive(false);
                  $this->qryEstimaxpartida->setSql($sql);
                  $this->qryEstimaxpartida->setActive(true);
               }

               //Aqui tambien se hace este llenado unicamente para obtener las columnas del dbgid actividadesxorden
               //obteniendo solo un dato, del cual no se muestra nada por el uso del LEFT
               function llenarGridActxOrd()
               {
                  global $sContrato;
                  global $sIdConvenioAct;
                  //Solo es para obtener los nombres de las columnas..
                  $sql = "select
                          '' as WBS,
                          '' as Partida,
                          '' as Cantidad,
                          '' as Medida,
                          '' as Instalado,
                          '' as Excedente
                        from
                          actividadesxorden APO
                        where
                            APO.sContrato='".$Connection->global_sContrato."'
                            and APO.sNumeroOrden='". $this->ordenSeleccionada() ."'
                        ";
                  $this->qryActxOrden->setActive(false);
                  $this->qryActxOrden->setSql($sql);
                  $this->qryActxOrden->setActive(true);
               }

               //Este grid contendra todas las actividades con sus sWbs..., etc
               function llenarGridComboActividasdes()
               {
                  global $sContrato;
                  global $sIdConvenioAct;
                  $sql = "select
                          APO.sWbs as WBS,
                          APO.sNumeroActividad as Partida,
                          APO.dCantidad as Cantidad,
                          APO.sMedida as Medida,
                          APO.dInstalado as Instalado,
                          APO.dExcedente as Excedente,
                          APO.mDescripcion as Describir
                        from
                          actividadesxorden APO
                        where
                            APO.sContrato='".$Connection->global_sContrato."'
                            and APO.sNumeroOrden='". $this->ordenSeleccionada() ."'
                            and APO.sIdConvenio='".$Connection->global_sIdConvenio."'
                            and APO.sTipoActividad='Actividad'
                        order by sNumeroActividad asc
                        ";
                  $this->qryComboActividades->setActive(false);
                  $this->qryComboActividades->setSql($sql);
                  $this->qryComboActividades->setActive(true);
               }

               function ordenSeleccionada()
               {
                  global $Connection;
                  if($this->cbosNumeroOrden->getItemIndex() <0)
                  {
                     $sql = "select sNumeroOrden from ordenesdetrabajo where sContrato='".$Connection->global_sContrato."' and sNumeroOrden <>'' limit 1";
                     $rs = mysql_query( $sql ) ;
                     if($rw = mysql_fetch_array( $rs ) )
                     {
                        return $rw["sNumeroOrden"];
                     }else{
                        return "";
                     }
                  }else
                  {     return $this->cbosNumeroOrden->getItemIndex();
                  }
               }

               function dumpJavascript(){
               echo 'function controlesGeneradores( habilitar ){

                        if(habilitar){
                           accion = false;
                           document.getElementById("Panel2_outer").style.visibility="hidden";
                           document.getElementById("Panel1_outer").style.visibility="visible";
                        }
                        else{
                             accion= true;
                             document.getElementById("Panel1_outer").style.visibility="visible";
                             document.getElementById("Panel2_outer").style.visibility="hidden";
                             document.getElementById("cmdInformacion").disabled=accion;
                             document.getElementById("cmdPartidas").disabled=habilitar;
                        }

                        document.getElementById("txtsNumeroGenerador").disabled=habilitar;
                        document.getElementById("cboiNumeroEstimacion").disabled=habilitar;
                        //document.getElementById("f-calendar-field-1").disabled=habilitar;
                        //document.getElementById("f-calendar-field-2").disabled=habilitar;
                        //document.getElementById("listFases").disabled=habilitar;

                        document.getElementById("cmdAddGenerador").disabled=accion;
                        document.getElementById("cmdChangeGenerador").disabled=accion;
                        document.getElementById("cmdDeleteGenerador").disabled=accion;
                        document.getElementById("cmdAcceptGenerador").disabled=habilitar;
                        document.getElementById("cmdCancelGenerador").disabled=habilitar;
                        document.getElementById("cmdPrintGenerador").disabled=accion;
                        document.getElementById("cmdInformacion").disabled=true;

                        return false;
                     }';

                     echo 'function VerDetalles( habilitar ){
                           if(habilitar){
                               accion = false;
                               document.getElementById("Panel2_outer").style.visibility="visible";
                               document.getElementById("Panel1_outer").style.visibility="hidden";
                           }
                           else{
                               accion= true;
                               document.getElementById("Panel2_outer").style.visibility="hidden";
                               document.getElementById("Panel1_outer").style.visibility="visible";
                        }
                           document.getElementById("cmdInformacion").disabled=accion;
                           document.getElementById("cmdPartidas").disabled=habilitar;
                           dbgPartidas.getTableColumnModel().setColumnWidth(1,50);
                           dbgPartidas.getTableColumnModel().setColumnWidth(2,70);
                           dbgPartidas.getTableColumnModel().setColumnWidth(3,60);
                           dbgPartidas.getTableColumnModel().setColumnWidth(4,70);
                           dbgPartidas.getTableColumnModel().setColumnWidth(5,70);
                           return false;
                     }';

                      echo 'function Inicio(){
                            document.getElementById("cmdAddGenerador").style.backgroundColor = "";
                            document.getElementById("cmdChangeGenerador").style.backgroundColor = "";
                            document.getElementById("cmdDeleteGenerador").style.backgroundColor = "";
                            document.getElementById("cmdAcceptGenerador").style.backgroundColor = "";
                            document.getElementById("cmdCancelGenerador").style.backgroundColor = "";
                            document.getElementById("cmdPrintGenerador").style.backgroundColor = "";
                            document.getElementById("cbosNumeroOrden").style.backgroundColor = "";

                            document.getElementById("cbosNumeroActividad").style.backgroundColor = "";
                            document.getElementById("txtdCantidadPartida").style.backgroundColor = "";
                            document.getElementById("txtsIsometrico").style.backgroundColor = "";
                            document.getElementById("lEstima").style.backgroundColor = "";
                            document.getElementById("txtsPrefijo").style.backgroundColor = "";
                            document.getElementById("memoComentarios").style.backgroundColor = "";

                            document.getElementById("cmdAgregaPartida").style.backgroundColor = "";
                            document.getElementById("cmdModificaPartida").style.backgroundColor = "";
                            document.getElementById("cmdEliminaPartida").style.backgroundColor = "";
                            document.getElementById("cmdAceptaDatosPartida").style.backgroundColor = "";
                            document.getElementById("cmdCancelaPartida").style.backgroundColor = "";

                            document.getElementById("cmdGenrador").style.backgroundColor = "";
                            document.getElementById("cmdNumGenrador").style.backgroundColor = "";
                            document.getElementById("cmdCImportes").style.backgroundColor = "";
                            document.getElementById("cmdSImportes").style.backgroundColor = "";
                            document.getElementById("cmdListaVer").style.backgroundColor = "";

                            return false;
                      }';
                    echo 'function FechaActual(ObjetoFecha)
                      {
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
                  echo 'function controlPartidas( habilitar ){
                        if(habilitar){
                           accion = false;
                        }
                        else{
                             accion= true;
                        }
                        document.getElementById("cbosNumeroActividad").disabled=accion;
                        document.getElementById("txtdCantidadPartida").disabled=accion;
                        document.getElementById("txtsIsometrico").disabled=accion;
                        document.getElementById("lEstima").disabled=accion;
                        document.getElementById("txtsPrefijo").disabled=accion;
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

               }

                function cmdPartidasJSClick($sender, $params)
               {
               ?>  //Add your javascript code here
                   VerDetalles( true );
                   if (document.getElementById("cmdAddGenerador").disabled==true)
                   {   controlesGeneradores( true);
                       document.getElementById("cmdPartidas").disabled=false;
                   }
                   return false;
               <?php
               }


               function cmdInformacionJSClick($sender, $params)
               {
               ?> //Add your javascript code here
                    VerDetalles( false );
                    document.getElementById("hdfPartidas").value='no';
                    document.getElementById("hdfRefrsPartida").value='';
                    return false;
               <?php
               }

               /*Aqui solamente es para que al hacer click desaparezca el detalle de la actividad
               al hacer click sobre el Dbgrid*/
               function dbgPartidasJSClick($sender, $params)
               {
               ?> //Add your javascript code here
                    //document.getElementById("Label9").innerHTML ="  << Seleccione un Paquete>>";
                    dbgPartidas.getSelectionModel().iterateSelection
                    (    function(index)
                         {  //obtenemos los datos del generador
                            var Tabla = dbgPartidas.getTableModel();
                            var sWbs = Tabla.getValue(0,index);
                            document.getElementById("txtsWbsPartida").value=sWbs;

                            var totalFilas = dbgGeneralComboAct.getTableModel().getRowCount();
                            var gridGen;
                            //Se van a asignar uno a uno los valores que sean igual al generador
                            for (i=0;i<totalFilas;i++)
                            {   gridGen= dbgGeneralComboAct.getTableModel().getValue(0,i);
                                if (gridGen==sWbs)
                                {    //obtencion de valores del dbgrid general
                                      var sDescribir = dbgGeneralComboAct.getTableModel().getValue(6,i);
                                      var sCantidad = dbgGeneralComboAct.getTableModel().getValue(2,i);
                                      document.getElementById("txtdCantidadPartida").value=sCantidad;
                                      document.getElementById("memoComentarios").value=sDescribir;
                                      document.getElementById("txtsIsometrico").value="";
                                      document.getElementById("txtsPrefijo").value="";
                                      document.getElementById("lEstima").checked=false;
                                      return false;
                                }
                            }

                         }
                    );
                    return false;
               <?php
               }

               function memoComentariosJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function memoComentariosJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function memoComentariosJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosIsomtricoReferenciaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosIsomtricoReferenciaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosIsomtricoReferenciaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosOrdenCambioJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosOrdenCambioJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosOrdenCambioJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosInstalacionAfectadaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosInstalacionAfectadaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosInstalacionAfectadaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtsPrefijoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtsPrefijoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtsPrefijoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtsIsometricoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtsIsometricoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtsIsometricoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtdCantidadPartidaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtdCantidadPartidaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here
                   document.getElementById("lEstima").checked =true;
                   return false;
               <?php

               }

               function txtdCantidadPartidaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosNumeroActividadJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosNumeroActividadJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosNumeroActividadJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function listFasesJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
               <?php

               }

               function listFasesJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function listFasesJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here
               <?php

               }

               function cboiNumeroEstimacionJSKeyPress($sender, $params)
               {
                ?>
                //Add your javascript code here
                if(event.keyCode==9)
                {
                  document.getElementById("memoComentaGenerador").focus();
                  return false;
                }
                <?php
               }

               function cboiNumeroEstimacionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cboiNumeroEstimacionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtsNumeroGeneradorJSKeyPress($sender, $params)
               {
               ?>
               //Add your javascript code here
               if(event.keyCode==9)
               {
                  document.getElementById("cboiNumeroEstimacion").focus();
                  return false;
               }

               <?php
               }

               function txtsNumeroGeneradorJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtsNumeroGeneradorJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosNumeroOrdenJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cbosNumeroOrdenJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }
               function cbosNumeroOrdenJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

                function listFasesJSMouseMove($sender, $params)
               {
               ?>
               //Add your javascript code here
                   document.getElementById("lblRecomienda").innerHTML="";
                  return false;

               <?php

               }

               function memoComentaGeneradorJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  document.getElementById("lblRecomienda").caption="";
                  return false;
               <?php

               }

               function memoComentaGeneradorJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here
               <?php

               }

               function memoComentaGeneradorJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here
                if(event.keyCode==9)
               {
                  document.getElementById("txtsNumeroGenerador").focus();
                  return false;
               }

               <?php

               }

               function memoComentaGeneradorJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

                 function cmdCancelaPartidaJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdCancelaPartidaJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdAceptaDatosPartidaJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdAceptaDatosPartidaJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }



               function cmdEliminaPartidaJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdEliminaPartidaJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdModificaPartidaJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdModificaPartidaJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdAgregaPartidaJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdAgregaPartidaJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdPrintGeneradorJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdPrintGeneradorJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdCancelGeneradorJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdCancelGeneradorJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdAcceptGeneradorJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdAcceptGeneradorJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdDeleteGeneradorJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdDeleteGeneradorJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdChangeGeneradorJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdChangeGeneradorJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdAddGeneradorJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdAddGeneradorJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }


        }

        global $application;

        global $FrmGeneradores;

        //Creates the form
        $FrmGeneradores=new FrmGeneradores($application);

        //Read from resource file
        $FrmGeneradores->loadResource(__FILE__);

        //Shows the form
        $FrmGeneradores->show();

?>
<script>
        if (document.getElementById("hdfPartidas").value=='si')
        {
            document.getElementById("Panel1_outer").style.visibility="hidden";
            document.getElementById("Panel2_outer").style.visibility="visible";
            document.getElementById("cmdInformacion").disabled=false;
            document.getElementById("cmdPartidas").disabled=true;
            document.getElementById("cmdAddGenerador").disabled=false;
            document.getElementById("cmdChangeGenerador").disabled=false;
            document.getElementById("cmdDeleteGenerador").disabled=false;
            document.getElementById("cmdAcceptGenerador").disabled=true;
            document.getElementById("cmdCancelGenerador").disabled=true;
            document.getElementById("cmdPrintGenerador").disabled=false;
            document.getElementById("cmdAgregaPartida").disabled=false;
            document.getElementById("cmdModificaPartida").disabled=false;
            document.getElementById("cmdEliminaPartida").disabled=false;
            document.getElementById("cmdAceptaDatosPartida").disabled=true;
            document.getElementById("cmdCancelaPartida").disabled=true;

            var _rowData = [];
            _rowData.push(['','','','','','','','']);
            var _oData = _rowData;
            dbgPartidasEstimacion.getTableModel().originalData=_oData;
            dbgPartidasEstimacion.getTableModel().setData(_rowData);

            var totalFilas=dbgGeneral.getTableModel().getRowCount();
            var gridGen;
            var rowData = [];
            var gen=document.getElementById("hdfRefrsPartida").value;

            //Se van a asignar uno a uno los valores que sean igual al generador
            for (i=0;i<totalFilas;i++)
            {   gridGen= dbgGeneral.getTableModel().getValue(14,i);
                if (gridGen==gen)
                {
                   //obtencion de valores del dbgrid general
                   var sWbs=dbgGeneral.getTableModel().getValue(0,i);
                   var sPartida=dbgGeneral.getTableModel().getValue(1,i);
                   var sCantidad=dbgGeneral.getTableModel().getValue(2,i);
                   var sIsometrico=dbgGeneral.getTableModel().getValue(3,i);
                   var sIsometricoRef=dbgGeneral.getTableModel().getValue(4,i);
                   var sInstalacion=dbgGeneral.getTableModel().getValue(5,i);
                   var sOCambio=dbgGeneral.getTableModel().getValue(6,i);
                   var sTotal=dbgGeneral.getTableModel().getValue(7,i);

                   //Colocacion de valores al dbgrid PartidasEstimacion
                   rowData.push([sWbs,sPartida,sCantidad,sIsometrico,sIsometricoRef,sInstalacion,sOCambio,sTotal]);
                   var oData = rowData;
                   dbgPartidasEstimacion.getTableModel().originalData=oData;
                   dbgPartidasEstimacion.getTableModel().setData(rowData);
                }
             }
           }
        else
           {  controlesGeneradores( true );
           }
</script>
<script>
 var fecha="f-calendar-field-1";
 FechaActual(fecha);
 var fecha="f-calendar-field-2";
 FechaActual(fecha);
 controlPartidas( false );
 Inicio();
 </script>
