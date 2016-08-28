<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require("mysql.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("buttons.inc.php");
        use_unit("imglist.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        $sUsuario=$_SESSION["ssUsuario"];
        $sIdConvenio =$sIdConvenioAct;
        /*$sContrato = '425027849';
        $sIdConvenioAct = 'AC-01';    */
        //Class definition
        class frmAutorizacionEstimacion extends Page
        {
               public $Label24 = null;
               public $cmdRefres = null;
               public $HiEstimacion = null;
               public $HiPaquete = null;
               public $GridEditar = null;
               public $QryEditar = null;
               public $SourEditar = null;
               public $cdmClose = null;
               public $Label15 = null;
               public $Panel_Editar = null;
               public $HiImprime = null;
               public $F_Final = null;
               public $F_Inicio = null;
               public $QryDatos = null;
               public $SourDatos = null;
               public $Panel_Datos = null;
               public $cmdCerrar = null;
               public $cmdActualizar = null;
               public $txtRetencion = null;
               public $txtAcumulado = null;
               public $txtMensual = null;
               public $txtFinanzReal = null;
               public $txtFinanzProg = null;
               public $txtFisicoReal = null;
               public $txtFisicoProg = null;
               public $txtMonto = null;
               public $memoComenta = null;
               public $txtProyecto = null;
               public $txtBeneficio = null;
               public $txtCosto = null;
               public $txtGestor = null;
               public $txtMayor = null;
               public $txtPFinaciera = null;
               public $txtFondo = null;
               public $txtPEP = null;
               public $Label23 = null;
               public $Label22 = null;
               public $Label21 = null;
               public $Label20 = null;
               public $Label19 = null;
               public $Label18 = null;
               public $Label17 = null;
               public $Label16 = null;
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
               public $GridEstimaciones = null;
               public $cdmDatos = null;
               public $cmdEliminarConceptos = null;
               public $cmdActualizaAcum = null;
               public $cmdEstimacionxGen = null;
               public $cmdEstimacionVacia = null;
               public $Memo1 = null;
               public $HiOpcion = null;
               public $HiConsecutivo = null;
               public $QryPozo = null;
               public $SourPozo = null;
               public $base = null;
               public $cmdImprimir = null;
               public $cmdEliminar = null;
               public $cmdModificar = null;
               public $Panel1 = null;
               public $Label1 = null;

               //------------------ REFRESCH -----------------
               function cmdRefresJSClick($sender, $params)
               {
               ?>                  //Add your javascript code here
                    document.getElementById("Memo1").value = "";
               <?php
               }


               //----------------- ELIMINAR ESTIMACION -------------------------
               function cmdEliminarJSClick($sender, $params)
               {
               ?>               //Add your javascript code here
                    var Tabla  = GridEstimaciones.getTableModel();
                    estimado = Tabla.getValue(3,GridEstimaciones.getFocusedRow());
                    if (estimado == "No")
                    {   if (confirm(" Desea eliminar la Estimacion seleccionada?"))
                           return true;
                        else
                           return false;
                    }else
                        {
                          alert(" Estimacion AUTORIZADA, no se pueden realizar cambios !!! ");
                          return false;
                        }
               <?php
               }

               function cmdEliminarClick($sender, $params)
               {    global $sContrato,$sIdConvenioAct;
                    $Estimacion = $this->HiEstimacion->Value;

                    $sql = " Delete from actividadesxestimacion
                             where     sContrato         = '$sContrato'
                                   And iNumeroEstimacion = '$Estimacion'";
                    mysql_query($sql);
               }

               //------------- ELIMINA CONCEPTOS EN CERO -----------------------
               function cmdEliminarConceptosJSClick($sender, $params)
               {
               ?>                 //Add your javascript code here
                    var Tabla  = GridEstimaciones.getTableModel();
                    estimado = Tabla.getValue(3,GridEstimaciones.getFocusedRow());
                    if (estimado == "No")
                    {  if (confirm(" Desea eliminar todas aquellas partidas que no se han estimado de la estimacion seleccionada?"))
                       {   var Tabla  = GridEstimaciones.getTableModel();
                           params     = Tabla.getValue(1,GridEstimaciones.getFocusedRow());
                           <?php
                              echo $this->cmdEliminarConceptos->ajaxCall("Elimina_Ceros",array(),array());
                           ?>
                           return false;
                       }
                    }else
                        {
                           alert(" Estimacion AUTORIZADA, no se puede generar una nueva estimacion");
                           return false;
                        }

                    return false;
               <?php
               }

               function Elimina_Ceros($sender="",$params="")
               {
                   global $sContrato,$sIdConvenioAct;
                   $Estimacion = $params;
                   //Todas las partidas decencientes
                   $sql = "Delete from actividadesxestimacion
                           where     sContrato = '$sContrato'
                                 And iNumeroEstimacion  = '$Estimacion'
                                 And dMontoAcumuladoMN  = 0
                                 And dMontoAcumuladoDLL = 0";
                   mysql_query($sql);
               }

               //----------------- CLICK EN GRID EDITAR ------------------------
               function GridEditarJSClick($sender, $params)
               {
               ?>               //Add your javascript code here
                   i = GridEditar.getTableModel().getRowCount();
                   if (document.getElementById("HiPaquete").value == 0)
                   {   for (x=0;x<i;x++)
                       {   tipo = GridEditar.getTableModel().getValue(12,x);
                           if (tipo == "Paquete")
                              GridEditar.getTableModel().setValue(0,x,"-");
                       }
                       document.getElementById("HiPaquete").value = 1;
                   }
                   return false;
               <?php
               }

               //--------------- EDITAR ESTIMACION -----------------------------
               function cmdModificarJSClick($sender, $params)
               {
                   global $sContrato, $sIdConvenioAct;
               ?>                //Add your javascript code here
                   if (document.getElementById("Panel_Editar_outer").style.visibility == 'visible')
                       document.getElementById("Panel_Editar_outer").style.visibility = 'hidden';
                   else
                       document.getElementById("Panel_Editar_outer").style.visibility = 'visible';
                   document.getElementById("HiPaquete").value = 0;
                   Dato=[];
                   Dato.push(['','','','','','','','','','','','','']);
                   var OtroDato = Dato;
                   GridEditar.getTableModel().originalData =OtroDato;
                   GridEditar.getTableModel().setData(Dato);
                   var Tabla  = GridEstimaciones.getTableModel();
                   params     = Tabla.getValue(1,GridEstimaciones.getFocusedRow());
                   <?php
                         echo $this->cmdModificar->ajaxCall("Editar_Estimacion",array(),array("GridEditar"));
                   ?>
                   return false;
               <?php
               }

               function Editar_Estimacion($sender="",$params="")
               {
                   global $sContrato,$sIdConvenioAct;
                   $Estimacion = $params;
                   $sql = " select
                                 '' as p,
                                 sWbs, sNumeroActividad,
                                 format(dCantidadAnexo,1) as Cantidad,
                                 sMedida, dVentaMN, dCantidadAnexo,
                                 dAcumuladoAnterior,
                                 dMontoAcumuladoAnteriorMN,
                                 dCantidad, dAcumuladoActual,
                                 dMontoMN, dMontoAcumuladoMN,
                                 sTipoActividad, mDescripcion
                           from
                                 actividadesxestimacion
                           where
                                     sContrato         = '$sContrato'
                                 and iNumeroEstimacion = '$Estimacion'
                           order by iItemOrden";
                   $this->QryEditar->setActive(false);
                   $this->QryEditar->setSQL($sql);
                   $this->QryEditar->setActive(true);

               }

               function cdmCloseJSClick($sender, $params)
               {
               ?>                     //Add your javascript code here
                    document.getElementById("Panel_Editar_outer").style.visibility = 'hidden';
                    return false;
               <?php
               }

               //--------------- IMPRIMIR REPORTE  -----------------------------
               function cmdImprimirJSClick($sender, $params)
               {
                   global $sContrato, $sIdConvenioAct;
               ?>                //Add your javascript code here
                   var Tabla   = GridEstimaciones.getTableModel();
                   estimacion  = Tabla.getValue(1,GridEstimaciones.getFocusedRow());
                   NumeroOrden = Tabla.getValue(11,GridEstimaciones.getFocusedRow());
                   params      = estimacion;
                   ruta = "../reporte.php";
                   ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                   ruta = ruta + "&iNumeroEstimacion="+estimacion;
                   ruta = ruta + "&sNumeroOrden="+NumeroOrden;
                   ruta = ruta + "&sConvenio=<?php echo $sIdConvenioAct ?>";
                   ruta = ruta + "&sTipoActividad="+"Actividad";
                   ruta = ruta + "&reportesPath=estimaciones";
                   ruta = ruta + "&nombreReporte=rptEstimacion";
                   var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                   <?php
                         echo $this->cmdImprimir->ajaxCall("Imprimir_reporte",array(),array());
                   ?>
                   return false;
               <?php
               }

               function Imprimir_reporte($sender="",$params="")
               {
                   global $sContrato,$sIdConvenioAct;
                   $Estimacion =$params;

                   //Buscar sIdUsuarioAutoriza..
                   $sql = "select sIdUsuarioAutoriza
                           from estimacionperiodo
                           where     sContrato         = '$sContrato'
                                 and iNumeroEstimacion = '$Estimacion'";
                   $rs  = mysql_query($sql);
                   $row = mysql_fetch_array($rs);
                   $UsuarioAutoriza = $row['sIdUsuarioAutoriza'];
                   // Ahora vienen los acumulados de paquetes ...
                   $sql = " Select Distinct sWbs
                            From actividadesxestimacion
                            Where    sContrato         = '$sContrato'
                                 And iNumeroEstimacion = '$Estimacion'
                                 And sTipoActividad    = 'Paquete'
                            Order By iNivel DESC";
                   $rs = mysql_query($sql);
                   while ($row = mysql_fetch_array($rs))
                   {      $Wbs = $row['sWbs'];
                          $sql2 = "Select sum(dMontoAcumuladoAnteriorMN) as dMontoAnteriorMN,
                                         sum(dMontoAcumuladoAnteriorDLL) as dMontoAnteriorDLL,
                                         sum(dMontoMN) as dMontoMN, sum(dMontoDLL) as dMontoDLL
                                  From actividadesxestimacion
                                  Where     sContrato         = '$sContrato'
                                        And iNumeroEstimacion = '$Estimacion'
                                        And sWbsAnterior      = '$Wbs'
                                  Group By sWbsAnterior";
                          $rs2  = mysql_query($sql2);
                          $num  = mysql_num_rows($rs2);
                          if ($num > 0 )
                          {   $fila = mysql_fetch_array($rs2);
                              $MontoAnteriorMN  = $fila['dMontoAnteriorMN'];
                              $MontoAnteriorDLL = $fila['dMontoAnteriorDLL'];
                              $MontoMN          = $fila['dMontoMN'];
                              $MontoDLL         = $fila['dMontoDLL'];
                              $AcumuladoMN      = $fila['dMontoAnteriorMN']  + $fila['dMontoMN'];
                              $AcumuladoDLL     = $fila['dMontoAnteriorDLL'] + $fila['dMontoDLL'];

                              $sql3 = "Update actividadesxestimacion
                                       SET dMontoAcumuladoAnteriorMN  = '$MontoAnteriorMN',
                                           dMontoAcumuladoAnteriorDLL = '$MontoAnteriorDLL',
                                           dMontoMN           = '$MontoMN',
                                           dMontoAcumuladoMN  = '$AcumuladoMN',
                                           dMontoDLL          = '$MontoDLL',
                                           dMontoAcumuladoDLL = '$AcumuladoDLL'
                                       Where     sContrato         = '$sContrato'
                                             And iNumeroEstimacion = '$Estimacion'
                                             And sWbs              = '$Wbs' ";
                              mysql_query($sql3);
                          }
                   }
                   $sql = " Select sum(dMontoAcumuladoAnteriorMN) as dMontoAnteriorMN,
                                   sum(dMontoAcumuladoAnteriorDLL) as dMontoAnteriorDLL,
                                   Sum(dMontoMN) as dMontoMN, Sum(dMontoDLL) as dMontoDLL
                            From actividadesxestimacion
                            Where     sContrato         = '$sContrato'
                                  And iNumeroEstimacion = '$Estimacion'
                                  and sTipoActividad    = 'Paquete'
                                  And iNivel            = 0
                            Group By sContrato";
                   $rs  = mysql_query($sql);
                   $num = mysql_num_rows($rs);
                   if ($num > 0)
                   {   $row = mysql_fetch_array($rs);
                       $dMontoEstimacionMN      = $row['dMontoMN'];
                       $dMontoEstimacionDLL     = $row['dMontoDLL'];
                       $dMontoEstimacionAcumMN  = $row['dMontoAnteriorMN'] + $dMontoEstimacionMN;
                       $dMontoEstimacionAcumDLL = $row['dMontoAnteriorDLL']+ $dMontoEstimacionDLL;

                   }else
                       {  $dMontoEstimacionMN      = 0;
                          $dMontoEstimacionDLL     = 0;
                          $dMontoEstimacionAcumMN  = 0;
                          $dMontoEstimacionAcumDLL = 0;
                       }
                   $sql = " UPDATE estimacionperiodo
                            SET dMontoMN  = '$dMontoEstimacionMN',
                                dMontoDLL = '$dMontoEstimacionDLL',
                                dMontoAcumuladoMN  = '$dMontoEstimacionAcumMN',
                                dMontoAcumuladoDLL = '$dMontoEstimacionAcumDLL'
                            Where     sContrato         = '$sContrato'
                                  And iNumeroEstimacion = '$Estimacion'";
                   mysql_query($sql);
                   $sql = "Update actividadesxestimacion
                           SET sSimbolo = "-"
                           Where     sContrato         = '$sContrato'
                                 And iNumeroEstimacion = '$Estimacion'
                                 and sTipoActividad    = 'Paquete'";
                   mysql_query($sql);
               }

               //---------------- DATOS GENERALES ------------------------------
               function cdmDatosJSClick($sender, $params)
               {
               ?>                //Add your javascript code here
                   if (document.getElementById("Panel_Datos_outer").style.visibility == 'visible')
                       document.getElementById("Panel_Datos_outer").style.visibility = 'hidden';
                   else
                       document.getElementById("Panel_Datos_outer").style.visibility = 'visible';
                   document.getElementById("txtPEP").value         = "";
                   document.getElementById("txtFondo").value       = "";
                   document.getElementById("txtPFinaciera").value  = "";
                   document.getElementById("txtMayor").value       = "";
                   document.getElementById("txtGestor").value      = "";
                   document.getElementById("txtCosto").value       = "";
                   document.getElementById("txtBeneficio").value   = "";
                   document.getElementById("txtProyecto").value    = "";
                   document.getElementById("memoComenta").value    = "";
                   document.getElementById("txtMonto").value       = "0.00";
                   document.getElementById("txtFisicoProg").value  = "0.00";
                   document.getElementById("txtFisicoReal").value  = "0.00";
                   document.getElementById("txtFinanzProg").value  = "0.00";
                   document.getElementById("txtFinanzReal").value  = "0.00";
                   document.getElementById("txtMensual").value     = "0.00";
                   document.getElementById("txtAcumulado").value   = "0.00";
                   document.getElementById("txtRetencion").value   = "0.00";
                   fecha = "f-calendar-field-1";
                   FechaActual(fecha);
                   fecha = "f-calendar-field-2";
                   FechaActual(fecha);
                   var Tabla      = GridEstimaciones.getTableModel();
                   params = Tabla.getValue(1,GridEstimaciones.getFocusedRow());
                   <?php
                         echo $this->cdmDatos->ajaxCall("Datos_Generales",array(),array("txtPEP","txtFondo","txtPFinaciera","txtMayor","txtGestor","txtCosto","txtBeneficio","txtProyecto","memoComenta","txtMonto","txtFisicoProg","txtFisicoReal","txtFinanzProg","txtFinanzReal","txtMensual","txtAcumulado","txtRetencion","F_Inicio","F_Final"));
                   ?>
                   return false;
               <?php
               }

               function Datos_Generales($sender="",$params="")
               {
                   global $sContrato,$sIdConvenioAct;
                   $Estimacion =$params;
                   $sql = "select
                                 sElementoPEP,
                                 sFondo,
                                 sPosicionFinanciera,
                                 sCuentaMayor,
                                 sCentroGestor,
                                 sCentroCosto,
                                 sCentroBeneficio,
                                 sProyecto,
                                 mComentarios,
                                 concat('$',format(dMontoContratoMN,2)) as dMontoContratoMN,
                                 date_format(dFechaInicioContrato,'%d/%m/%y') as dFechaInicioContrato,
                                 date_format(dFechaFinalContrato,'%d/%m/%y')as dFechaFinalContrato,
                                 concat(dAvanceFisicoProgramado,'%') as dAvanceFisicoProgramado,
                                 concat(dAvanceFisicoReal,'%') as dAvanceFisicoReal,
                                 concat(dAvanceFinancieroProgramado,'%') as dAvanceFinancieroProgramado,
                                 concat(dAvanceFinancieroReal,'%') as dAvanceFinancieroReal,
                                 concat('$',dMontoProgramadoMensualMN) as dMontoProgramadoMensualMN,
                                 concat('$',dMontoProgramadoAcumuladoMN) as dMontoProgramadoAcumuladoMN,
                                 concat('$',dRetencionMN) as dRetencionMN
                          from estimacionperiodo
                          where      sContrato = '$sContrato'
                                 and iNumeroEstimacion = '$Estimacion'";
                  $rs     = mysql_query($sql);
                  $total  = mysql_num_rows($rs);
                  if ($total > 0)
                  {   if($row = mysql_fetch_array($rs))
                      {
                           $this->txtPEP->Text     = $row['sElementoPEP'];
                           $this->txtFondo->Text   = $row['sFondo'];
                           $this->txtPFinaciera->Text = $row['sPosicionFinanciera'];
                           $this->txtMayor->Text   = $row['sCuentaMayor'];
                           $this->txtGestor->Text  = $row['sCentroGestor'];
                           $this->txtCosto->Text   = $row['sCentroCosto'];
                           $this->txtBeneficio->Text  = $row['sCentroBeneficio'];
                           $this->txtProyecto->Text   = $row['sProyecto'];
                           $this->memoComenta->Text   = $row['mComentarios'];
                           $this->txtMonto->Text   = $row['dMontoContratoMN'];
                           $this->F_Inicio->Text   = $row['dFechaInicioContrato'];
                           $this->F_Final->Text    = $row['dFechaFinalContrato'];
                           $this->txtFisicoProg->Text = $row['dAvanceFisicoProgramado'];
                           $this->txtFisicoReal->Text = $row['dAvanceFisicoReal'];
                           $this->txtFinanzProg->Text = $row['dAvanceFinancieroProgramado'];
                           $this->txtFinanzReal->Text = $row['dAvanceFinancieroReal'];
                           $this->txtMensual->Text    = $row['dMontoProgramadoMensualMN'];
                           $this->txtAcumulado->Text  = $row['dMontoProgramadoAcumuladoMN'];
                           $this->txtRetencion->Text  = $row['dRetencionMN'];
                      }
                  }

               }
               //---------------  GUARDAR DATOS GENERALES ----------------------
               function cmdActualizarJSClick($sender, $params)
               {
               ?>                 //Add your javascript code here
                   var Tabla      = GridEstimaciones.getTableModel();
                   params = Tabla.getValue(1,GridEstimaciones.getFocusedRow());
                   <?php
                         echo $this->cmdActualizar->ajaxCall("Guardar_Datos_Generales",array(),array());
                   ?>
                   document.getElementById("Panel_Datos_outer").style.visibility = 'hidden';
                   return false;
               <?php
               }
                                      //------ Faltan las primeras dos instrucciones!!!!!
               function Guardar_Datos_Generales($sender="",$params="")
               {
                   global $sContrato,$sIdConvenioAct;
                   $Estimacion =$params;

                   $sql = " select dFechaFinal, dAvanceFisicoReal, dAvanceFisicoProgramado
                            from estimacionperiodo
                            where     sContrato = '$sContrato'
                                 and iNumeroEstimacion = '$Estimacion' ";
                   $rs  = mysql_query($sql);
                   $row = mysql_fetch_array($rs);
                   $AvanceFisicoReal = $row['dAvanceFisicoReal'];
                   $AvanceFisicoProg = $row['dAvanceFisicoProgramado'];
                   $FechaFinal       = $row['dFechaFinal'];

                   // Acumulados Mensuales del Anexo DE
                   $sql = " select sum(DEmn)  as dMontoMN,
                                   sum(DEdll) as dMontoDLL
                            from anexosmensuales
                            Where     sContrato   = '$sContrato'
                                  And sIdConvenio = '$sIdConvenioAct'
                                  and dIdFecha    = '$FechaFinal'
                            group by sContrato";
                   $rs    = mysql_query($sql);
                   $total = mysql_num_rows($rs);
                   if ($total > 0)
                   {   $row = mysql_fetch_array($rs);
                       $MontoProgMensualMN  = $row['dMontoMN'];
                       $MontoProgMensualDLL = $row['dMontoDLL'];
                   }
                   // Acumulados Mensuales del Anexo DE
                   $sql = " select sum(DEmn)  as dMontoMN,
                                   sum(DEdll) as dMontoDLL
                            from anexosmensuales
                            Where     sContrato   =  '$sContrato'
                                  And sIdConvenio =  '$sIdConvenioAct'
                                  And dIdFecha    <= '$FechaFinal'
                            group by sContrato";
                   $rs    = mysql_query($sql);
                   $total = mysql_num_rows($rs);
                   if ($total > 0)
                   {   $row = mysql_fetch_array($rs);
                       $MontoProgAcumMN  = $row['dMontoMN'];
                       $MontoProgAcumDLL = $row['dMontoDLL'];
                   }
                   // datos restantes....
                   $sql = "select sElementoPEP, sFondo,
                                  sPosicionFinanciera, sCuentaMayor,
                                  sCentroGestor, sCentroCosto,
                                  sCentroBeneficio, sProyecto
                          from estimacionperiodo
                          Where     sContrato         = '$sContrato'
                                and iNumeroEstimacion < '$Estimacion'
                          Order By iNumeroEstimacion DESC";
                   $rs    = mysql_query($sql);
                   $total = mysql_num_rows($rs);
                   if ($total > 0)
                   {   $row = mysql_fetch_array($rs);
                       $ElementoPEP  = $row['sElementoPEP'];
                       $Fondo        = $row['sFondo'];
                       $PosFinanz    = $row['sPosicionFinanciera'];
                       $CuentaMayor  = $row['sCuentaMayor'];
                       $CentroGestor = $row['sCentroGestor'];
                       $CentroCosto  = $row['sCentroCosto'];
                       $CentroBenef  = $row['sCentroBeneficio'];
                       $Proyecto     = $row['sProyecto'];
                   }
                   $sql = " Select Sum(dMontoMN) as dMontoMN,
                                   Sum(dMontoDLL) as dMontoDLL
                            From actividadesxestimacion
                            Where     sContrato         = '$sContrato'
                                  And iNumeroEstimacion = '$Estimacion'
                                  and sTipoActividad = 'Actividad'
                            Group By sContrato";
                   $rs    = mysql_query($sql);
                   $total = mysql_num_rows($rs);
                   if ($total > 0)
                   {   $row = mysql_fetch_array($rs);
                       $MontoMN  = $row['dMontoMN'];
                       $MontoDLL = $row['dMontoDLL'];
                   }else
                       {
                          $MontoMN  = 0;
                          $MontoDLL = 0;
                       }
                  // Obtener el monto acumulado de todas las estimaciones aplicadas ...
                  $sql = " Select Sum(a.dMontoMN)  as dMontoMN,
                                  Sum(a.dMontoDLL) as dMontoDLL
                           From actividadesxestimacion a
                           inner join estimacionperiodo e
                           on (     a.sContrato          = e.sContrato
                                and a.iNumeroEstimacion  = e.iNumeroEstimacion)
                           Where    a.sContrato          = '$sContrato'
                                And a.iNumeroEstimacion <= '$Estimacion'
                                and a.sTipoActividad     = 'Actividad'
                           Group By a.sContrato";
                  $rs    = mysql_query($sql);
                  $total = mysql_num_rows($rs);
                  if ($total > 0)
                  {   $row = mysql_fetch_array($rs);
                      $MontoAcumMN  = $row['dMontoMN'];
                      $MontoAcumDLL = $row['dMontoDLL'];
                  }else
                      {
                         $MontoAcumMN  = 0;
                         $MontoAcumDLL = 0;
                      }
                  $sql = " select dFechaInicio, dFechaFinal,
                                  dMontoMN, dMontoDLL
                           from convenios
                           Where     sContrato = '$sContrato'
                                 and sIdConvenio = '$sIdConvenioAct'";
                  $rs    = mysql_query($sql);
                  $total = mysql_num_rows($rs);
                  if ($total > 0)
                  {   $row = mysql_fetch_array($rs);
                      $FechaIContrato  = $row['dFechaInicio'];
                      $FechaFContrato  = $row['dFechaFinal'];
                      $MontoContratoMN = $row['dMontoMN'];
                      $MontoContratoLL = $row['dMontoDLL'];
                  }else
                      {
                         $FechaIContrato  = date("Y-m-d");
                         $FechaFContrato  = date("Y-m-d");
                         $MontoContratoMN = 0;
                         $MontoContratoLL = 0;
                      }
                  $sql = " update estimacionperiodo
                           set dAvanceFisicoProgramado      = '$AvanceFisicoProg',
                               dAvanceFisicoReal            = '$AvanceFisicoReal',
                               dMontoProgramadoMensualMN    = '$MontoProgMensualMN',
                               dMontoProgramadoMensualDLL   = '$MontoProgMensualDLL',
                               dMontoProgramadoAcumuladoMN  = '$MontoProgAcumMN',
                               dMontoProgramadoAcumuladoDLL = '$MontoProgAcumDLL',
                               sElementoPEP         = '$ElementoPEP',
                               sFondo               = '$Fondo',
                               sPosicionFinanciera  = '$PosFinanz',
                               sCuentaMayor         = '$CuentaMayor',
                               sCentroGestor        = '$CentroGestor',
                               sCentroCosto         = '$CentroCosto',
                               sCentroBeneficio     = '$CentroBenef',
                               sProyecto            = '$Proyecto',
                               dMontoMN             = '$MontoMN',
                               dMontoDLL            = '$MontoDLL',
                               dMontoAcumuladoMN    = '$MontoAcumMN',
                               dMontoAcumuladoDLL   = '$MontoAcumDLL',
                               dFechaInicioContrato = '$FechaIContrato',
                               dFechaFinalContrato  = '$FechaFContrato',
                               dMontoContratoMN     = '$MontoContratoMN',
                               dMontoContratoDLL    = '$MontoContratoLL'
                          where     sContrato = '$sContrato'
                                and iNumeroEstimacion = '$Estimacion'";
                  mysql_query($sql);
               }

               function cmdCerrarJSClick($sender, $params)
               {
               ?>                //Add your javascript code here
                   document.getElementById("Panel_Datos_outer").style.visibility = 'hidden';
                   return false;
               <?php
               }

               //-------------------- BEFORE SHOW ------------------------------

               function frmAutorizacionEstimacionBeforeShow($sender, $params)
               {
                   global $sContrato;
                   global $_SESSION,$Usuario,$Clave,$Servidor;

                   $this->base->setConnected(false);
                   $this->base->setDatabaseName($_SESSION['database']);
                   $this->base->setUserName($Usuario);
                   $this->base->setUserPassword($Clave);
                   $this->base->setHost($Servidor);
                   $this->base->setConnected(true);
                   $sql = "select e.iNumeroEstimacion,
                                  e.sNumeroOrden,
                                  t.sDescripcion,
                                  p.lEstimado,
                                  date_format(p.dFechaInicio,'%d/%m/%Y') as dFechaInicio,
                                  date_format(p.dFechaFinal,'%d/%m/%Y')  as dFechaFinal,
                                  p.dMontoMNGeneradores, p.dMontoDLLGeneradores,
                                  p.dMontoMN, p.dMontoDLL, dRetencionMN
                          from estimaciones e
                          inner join estimacionperiodo p
                          on (    p.sContrato        = e.sContrato
                              and p.iNumeroEstimacion = e.iNumeroEstimacion)
                          inner join tiposdeestimacion t
                          on (    t.sIdTipoEstimacion = p.sIdTipoEstimacion)
                          where e.sContrato = '$sContrato'
                          group by iNumeroEstimacion";
                   $this->QryPozo->setActive(false);
                   $this->QryPozo->setSQL($sql);
                   $this->QryPozo->setActive(true);

                   $sql = " select
                                 '' as p
                           from
                                 actividadesxestimacion
                           where
                                     sContrato         = '$sContrato'
                           limit 1";
                   $this->QryEditar->setActive(false);
                   $this->QryEditar->setSQL($sql);
                   $this->QryEditar->setActive(true);
               }

               function GridEstimacionesJSClick($sender, $params)
               {
               ?>               //Add your javascript code here
                    GridEstimaciones.getSelectionModel().iterateSelection
                    (    function(index)
                         {  var Tabla  = GridEstimaciones.getTableModel();
                            estimacion = Tabla.getValue(1, index);
                            document.getElementById("Panel_Datos_outer").style.visibility  = 'hidden';
                            document.getElementById("Panel_Editar_outer").style.visibility = 'hidden';
                            document.getElementById("HiEstimacion").value = estimacion;
                         }
                    );
                    return false;
               <?php
               }

               //------------------ ESTIMACION VACIA----------------------------
               function cmdEstimacionVaciaJSClick($sender, $params)
               {
               ?>              //Add your javascript code here
                   var Tabla      = GridEstimaciones.getTableModel();
                   Estimado       = Tabla.getValue(3,GridEstimaciones.getFocusedRow());
                   if (Estimado == "Si")
                   {   alert (" Estimacion AUTORIZADA, no se pueden realizar cambios!!!");
                   }else
                       {   params = Tabla.getValue(1,GridEstimaciones.getFocusedRow());
                            <?php
                                echo $this->cmdEstimacionVacia->ajaxCall("Estimacion_Vacia",array(),array());
                            ?>
                       }
                   return false;
               <?php
               }

               function Estimacion_Vacia($sender="",$params="")
               {
                   global $sContrato,$sIdConvenioAct;
                   $Estimacion =$params;
                   $dAcumulado = 0;

                   $sql=" Delete from actividadesxestimacion
                          where sContrato = '$sContrato'
                          And iNumeroEstimacion = '$Estimacion'";
                   mysql_query($sql);
                   // Inserccion de todos los paquetes en 0 a la fecha seleccionada...
                   $sql = "insert into actividadesxestimacion
                                 (sContrato, iNumeroEstimacion, iNivel,
                                  sSimbolo, sWbs, sWbsAnterior,
                                  sNumeroActividad, sTipoActividad, sEspecificacion,
                                  iItemOrden, mDescripcion, dCostoMN,
                                  dCostoDLL, dVentaMN, dVentaDLL,
                                  sMedida, dCantidadAnexo, iColor,
                                  dAcumuladoAnterior, dMontoAcumuladoAnteriorMN,
                                  dMontoAcumuladoAnteriorDLL, dCantidad, dMontoMN,
                                  dMontoDLL, dAcumuladoActual, dMontoAcumuladoMN,
                                  dMontoAcumuladoDLL)
                           select sContrato, '$Estimacion', iNivel,
                                  sSimbolo, sWbs, sWbsAnterior,
                                  sNumeroActividad, sTipoActividad, sEspecificacion,
                                  iItemOrden, mDescripcion, dCostoMN,
                                  dCostoDLL, dVentaMN, dVentaDLL,
                                  sMedida, dCantidadAnexo, iColor,
                                  0, 0, 0,
                                  0, 0, 0,
                                  0, 0, 0
                           from actividadesxanexo
                           Where sContrato = '$sContrato'
                                 And sIdConvenio = '$sIdConvenioAct'";
                   mysql_query($sql);

                   $sql = "select * from actividadesxestimacion
                           where     sContrato = '$sContrato'
                                 and iNumeroEstimacion = '$Estimacion'";
                   $rs  = mysql_query($sql);
                   while($row = mysql_fetch_array($sr))
                   {    if ($row['sTipoActividad']=="Actividad")
                        {
                            $NumeroActividad  = $row['sNumeroActividad'];
                            $Wbs              = $row['sWbs'];
                            $WbsAnterior      = $row['sWbsAnterior'];
                            $TipoActividad    = $row['sTipoActividad'];
                            $VentaMN          = $row['dVentaMN'];
                            $VentaDLL         = $row['dVentaDLL'];

                            $sql2 = " Select Sum(a.dCantidad) as Generado
                                      From actividadesxestimacion  a
                                      inner join estimacionperiodo e
                                      on (    a.sContrato         = e.sContrato
                                          and a.iNumeroEstimacion = e.iNumeroEstimacion)
                                      Where   a.sContrato         = '$sContrato'
                                          And a.iNumeroEstimacion < '$Estimacion'
                                          And a.sNumeroActividad  = '$NumeroActividad'
                                      Group By a.sNumeroActividad ";
                            $vec  = mysql_query($sql2);
                            $fila = mysql_fetch_array($vec);
                            $registros = mysql_num_rows($vec);
                            if ($registros > 0 )
                                $dAcumulado = $fila['Generado'];
                            else
                                $dAcumulado = 0;
                            if ($dAcumulado > 0)
                            {   $sql3 = " update actividadesxestimacion
                                          set dAcumuladoAnterior  = '$dAcumulado',
                                              dMontoAcumuladoAnteriorMN  = '$dAcumulado' * '$VentaMN',
                                              dMontoAcumuladoAnteriorDLL = '$dAcumulado' * '$VentaDLL',
                                              dCantidad = 0,
                                              dMontoMN  = 0,
                                              dMontoDLL = 0,
                                              dAcumuladoActual   = '$dAcumulado',
                                              dMontoAcumuladoMN  = '$dAcumulado' * '$VentaMN',
                                              dMontoAcumuladoDLL = '$dAcumulado' * '$VentaDLL'
                                          where
                                                  sContrato = '$sContrato'
                                              and iNumeroEstimacion = '$Estimacion'
                                              and sNumeroActividad  = '$NumeroActividad'
                                              and sWbs = '$Wbs'
                                              and sWbsAnterior   = '$WbsAnterior'
                                              and sTipoActividad = '$TipoActividad'";
                                mysql_query($sql3);
                            }

                        }
                   }
               }

               //-------------  ESTIMACION SEGUN GENERADOR -------------------------

               function cmdEstimacionxGenJSClick($sender, $params)
               {
               ?>                //Add your javascript code here
                    var Tabla  = GridEstimaciones.getTableModel();
                    estimado   = Tabla.getValue(3,GridEstimaciones.getFocusedRow());
                    if (estimado == "No")
                    {   var Tabla  = GridEstimaciones.getTableModel();
                        params     = Tabla.getValue(1,GridEstimaciones.getFocusedRow());
                        <?php
                            echo $this->cmdEstimacionxGen->ajaxCall("Estimacion_Generador",array(),array());
                        ?>
                    }else
                        {
                           alert(" Estimacion AUTORIZADA, No se Pueden Realizar Cambios !! ");
                        }
                    return false;
               <?php
               }

               function Estimacion_Generador($sender="",$params="")
               {   global $sContrato,$sIdConvenioAct;
                   $Estimacion  = $params;

                   $sql = " Select sContrato
                            From estimaciones
                            Where    sContrato         = '$sContrato'
                                 And iNumeroEstimacion = '$Estimacion'
                                 And lStatus <> 'Autorizado' ";
                   $rs  = mysql_query($sql);
                   $num = mysql_num_rows($rs);
                   if ($num > 0 )
                   {
                       $this->Memo1->Text = " Estimacion AUTORIZADA, no se pueden realizar cambios...";
                   }else
                       {   $sql2 = " Delete from actividadesxestimacion
                                     where    sContrato         = '$sContrato'
                                          And iNumeroEstimacion = '$Estimacion'";
                           mysql_query($sql2);

                           // Insersion de todos los paquetes en 0 a la fecha seleccionada ....
                           $sql2 = " insert into actividadesxestimacion
                                           (sContrato, iNumeroEstimacion, iNivel,
                                            sSimbolo, sWbs, sWbsAnterior,
                                            sNumeroActividad, sTipoActividad,
                                            sEspecificacion, iItemOrden, mDescripcion,
                                            dCostoMN, dCostoDLL, dVentaMN,
                                            dVentaDLL, sMedida, dCantidadAnexo,
                                            iColor, dAcumuladoAnterior,
                                            dMontoAcumuladoAnteriorMN,
                                            dMontoAcumuladoAnteriorDLL, dCantidad,
                                            dMontoMN, dMontoDLL, dAcumuladoActual,
                                            dMontoAcumuladoMN, dMontoAcumuladoDLL)
                                     select sContrato, '$Estimacion', iNivel,
                                            sSimbolo, sWbs, sWbsAnterior,
                                            sNumeroActividad, sTipoActividad,
                                            sEspecificacion, iItemOrden, mDescripcion,
                                            dCostoMN, dCostoDLL, dVentaMN,
                                            dVentaDLL, sMedida, dCantidadAnexo,
                                            iColor, 0, 0, 0, 0, 0, 0, 0, 0, 0
                                    from actividadesxanexo
                                    Where     sContrato   = '$sContrato'
                                          And sIdConvenio = '$Estimacion'";
                           mysql_query($sql2);

                           $sql2 = " Select sTipoActividad, sNumeroActividad, dVentaMN, dVentaDLL,
                                            sWbs, sWbsAnterior
                                     from  actividadesxestimacion
                                     where     sContrato         = '$sContrato'
                                           and iNumeroEstimacion = '$Estimacion'";
                           $rs2 = mysql_query($sql2);
                           while ($row = mysql_fetch_array($rs2))
                           {     $TipoActividad = $row['sTipoActividad'];
                                 $Actividad     = $row['sNumeroActividad'];
                                 $VentaMN       = $row['dVentaMN'];
                                 $VentaDLL      = $row['dVentaDLL'];
                                 $Wbs           = $row['sWbs'];
                                 $WbsAnterior   = $row['sWbsAnterior'];
                                 if ($TipoActividad == "Actividad")
                                 {
                                     $sql3 = " Select Sum(e.dCantidad) as Generado
                                               From estimacionxpartida e
                                               inner join estimaciones e2
                                               on (    e.sContrato    = e2.sContrato
                                                   and e.sNumeroOrden = e2.sNumeroOrden
                                                   and e.sNumeroGenerador   = e2.sNumeroGenerador
                                                   And e2.iNumeroEstimacion = '$Estimacion')
                                               Where    e.sContrato         = '$sContrato'
                                                    And e.sNumeroActividad  = '$Estimacion'
                                                    And e.lEstima = 'Si'
                                               Group By e.sNumeroActividad";
                                     $rs3  = mysql_query($sql3);
                                     $cant = mysql_num_rows($rs3);
                                     if ($cant > 0)
                                     {   $row3     = mysql_fetch_array($rs3);
                                         $Estimado = $row3['Generado'];
                                     }else
                                         {
                                            $Estimado = 0;
                                         }
                                     $sql3 = " Select Sum(a.dCantidad) as Generado
                                               From actividadesxestimacion a
                                               inner join estimacionperiodo e
                                               on (    a.sContrato = e.sContrato
                                                   and a.iNumeroEstimacion = e.iNumeroEstimacion)
                                               Where     a.sContrato = '$sContrato'
                                                     And a.iNumeroEstimacion <= '$Estimacion'
                                                     And a.sNumeroActividad   = '$Actividad'
                                                     And a.sTipoActividad     = 'Actividad'
                                               Group By a.sWbs, a.sNumeroActividad";
                                     $rs3  = mysql_query($sql3);
                                     $cant = mysql_num_rows($rs3);
                                     if ($cant > 0)
                                     {   $row3 = mysql_fetch_array($rs3);
                                         $Acumulado = $row3['Generado'];
                                     }else
                                         {
                                           $Acumulado = 0;
                                         }
                                     //   If dAcumulado <= ActividadesxEstimacion.FieldValues['dCantidadAnexo'] Then
                                     if ($Acumulado > 0  or $Estimado > 0)
                                     {   $sql3 = " update actividadesxestimacion
                                                  set dAcumuladoAnterior  = '$Acumulado',
                                                      dMontoAcumuladoAnteriorMN  = '$Acumulado' * '$VentaMN',
                                                      dMontoAcumuladoAnteriorDLL = '$Acumulado' * '$VentaDLL',
                                                      dCantidad          =  '$Estimado',
                                                      dMontoMN           =  '$Estimado'  * '$VentaMN',
                                                      dMontoDLL          =  '$Estimado'  * '$VentaDLL',
                                                      dAcumuladoActual   =  '$Acumulado' + '$Estimado',
                                                      dMontoAcumuladoMN  = ('$Acumulado' + '$Estimado') * '$VentaMN',
                                                      dMontoAcumuladoDLL = ('$Acumulado' + '$Estimado') * '$VentaDLL'
                                                where
                                                          sContrato         = '$sContrato'
                                                      and iNumeroEstimacion = '$Estimacion'
                                                      and sNumeroActividad  = '$Actividad'
                                                      and sWbs              = '$Wbs'
                                                      and sWbsAnterior      = '$WbsAnterior'
                                                      and sTipoActividad    = '$TipoActividad'";
                                          mysql_query($sql3);
                                     }
                                 }
                           }

                       }
               }

               //------------- ACTUALIZA ACUMULADOS ANTERIORES -----------------
               function cmdActualizaAcumJSClick($sender, $params)
               {
               ?>               //Add your javascript code here
                   var Tabla   = GridEstimaciones.getTableModel();
                   Estimado    = Tabla.getValue(3,GridEstimaciones.getFocusedRow());
                   Estimacion  = Tabla.getValue(1,GridEstimaciones.getFocusedRow());
                   params      = Estimacion+"]"+Estimado;
                   <?php
                        echo $this->cmdActualizaAcum->ajaxCall("Actualiza_Estimacion",array(),array());
                   ?>
                   return false;
               <?php
               }

               function Actualiza_Estimacion($sender="",$params="")
               {
                   global $sContrato,$sIdConvenioAct;
                   $DatosRecib  = explode("]",$params);
                   $Estimacion  = $DatosRecib[0];
                   $Estimado    = $DatosRecib[1];

                   if ($Estimado == "No")
                   {   $sql=" Select a.sContrato, a.iNivel, a.sSimbolo,
                                     a.sWbs, a.sWbsAnterior, a.sNumeroActividad,
                                     a.sTipoActividad, a.sEspecificacion, a.iItemOrden,
                                     a.mDescripcion, a.dCostoMN,
                                     a.dCostoDLL, a.dVentaMN, a.dVentaDLL, a.sMedida,
                                     a.dCantidadAnexo, a.iColor
                              from actividadesxanexo a
                              where not exists
                                    (select b.sContrato, b.iNivel, b.sSimbolo,
                                            b.sWbs, b.sWbsAnterior, b.sNumeroActividad,
                                            b.sTipoActividad, b.sEspecificacion, b.iItemOrden,
                                            b.mDescripcion, b.dCostoMN,
                                            b.dCostoDLL, b.dVentaMN, b.dVentaDLL,
                                            b.sMedida, b.dCantidadAnexo, b.iColor
                                    from actividadesxestimacion b
                                    Where
                                           a.sContrato = b.sContrato
                                       and a.sWbs = b.sWbs
                                       and a.sNumeroActividad  = b.sNumeroActividad
                                       and a.sTipoActividad    = b.sTipoActividad
                                       and b.iNumeroEstimacion = '$Estimacion')
                                   and a.sContrato      = '$sContrato'
                                   and a.sTipoActividad = 'Actividad'
                                   And sIdConvenio      = '$sIdConvenioAct'";
                       $rs  = mysql_query($sql);
                       while($row = mysql_fetch_array($rs))
                       {    $Nivel          = $row['iNivel'];
                            $Simbolo        = $row['sSimbolo'];
                            $Wbs            = $row['sWbs'];
                            $WbsAnterior    = $row['sWbsAnterior'];
                            $NumActividad   = $row['sNumeroActividad'];
                            $Tipo           = $row['sTipoActividad'];
                            $Especificacion = $row['sEspecificacion'];
                            $ItemOrden      = $row['iItemOrden'];
                            $Descripcion    = $row['mDescripcion'];
                            $CostoMN        = $row['dCostoMN'];
                            $CostoDLL       = $row['dCostoDLL'];
                            $VentaMN        = $row['dVentaMN'];
                            $VentaDLL       = $row['dVentaDLL'];
                            $Medida         = $row['sMedida'];
                            $CantidadAnexo  = $row['dCantidadAnexo'];
                            $Color          = $row['iColor'];

                            $sql2 = "insert into actividadesxestimacion
                                            (sContrato, iNumeroEstimacion, iNivel,
                                             sSimbolo, sWbs, sWbsAnterior,
                                             sNumeroActividad, sTipoActividad, sEspecificacion,
                                             iItemOrden, mDescripcion, dCostoMN,
                                             dCostoDLL, dVentaMN, dVentaDLL,
                                             sMedida, dCantidadAnexo, iColor,
                                             dAcumuladoAnterior, dMontoAcumuladoAnteriorMN,
                                             dMontoAcumuladoAnteriorDLL, dCantidad, dMontoMN,
                                             dMontoDLL, dAcumuladoActual, dMontoAcumuladoMN,
                                             dMontoAcumuladoDLL)
                                    VALUES ('$sContrato', '$Estimacion', '$Nivel',
                                            '$Simbolo', '$Wbs', '$WbsAnterior',
                                            '$NumActividad', '$Tipo', '$Especificacion',
                                            '$ItemOrden', '$Descripcion', '$CostoMN',
                                            '$CostoDLL', '$VentaMN', '$VentaDLL',
                                            '$Medida', '$CantidadAnexo', '$Color',
                                            0, 0, 0, 0, 0, 0 , 0 , 0 , 0 ) ";
                            mysql_query($sql2);
                        }
                   }
                   $sql = " Delete from actividadesxestimacion
                            where    sContrato         = '$sContrato'
                                 And iNumeroEstimacion = '$Estimacion'
                                 and sTipoActividad    = 'Paquete'";
                   mysql_query($sql);

                   $sql = "insert into actividadesxestimacion
                                 (sContrato, iNumeroEstimacion, iNivel,
                                  sSimbolo, sWbs, sWbsAnterior,
                                  sNumeroActividad, sTipoActividad, sEspecificacion,
                                  iItemOrden, mDescripcion, dCostoMN,
                                  dCostoDLL, dVentaMN, dVentaDLL,
                                  sMedida, dCantidadAnexo, iColor,
                                  dAcumuladoAnterior, dMontoAcumuladoAnteriorMN,
                                  dMontoAcumuladoAnteriorDLL, dCantidad, dMontoMN,
                                  dMontoDLL, dAcumuladoActual, dMontoAcumuladoMN,
                                  dMontoAcumuladoDLL)
                             select sContrato, '$Estimacion', iNivel,
                                    sSimbolo, sWbs, sWbsAnterior,
                                    sNumeroActividad, sTipoActividad, sEspecificacion,
                                    iItemOrden, mDescripcion, dCostoMN,
                                    dCostoDLL, dVentaMN, dVentaDLL,
                                    sMedida, dCantidadAnexo, iColor,
                                    0, 0, 0, 0, 0, 0 , 0 , 0 , 0
                             from actividadesxanexo
                             Where    sContrato      = '$sContrato'
                                  And sIdConvenio    = '$sIdConvenioAct'
                                  And sTipoActividad = 'Paquete'";
                   mysql_query($sql);
                   $sql = "select sWbs, sWbsAnterior, sNumeroActividad, sTipoActividad, dCantidad,
                                  dVentaMN, dVentaDLL
                           from  actividadesxestimacion
                           where     sContrato         = '$sContrato'
                                 and iNumeroEstimacion = '$Estimacion'";
                   $rs = mysql_query($sql);
                   while ($row = mysql_fetch_array($rs))
                   {     $TipoActividad = $row['sTipoActividad'];
                         if ($TipoActividad == "Actividad")
                         {   $Wbs           = $row['sWbs'];
                             $WbsAnterior   = $row['sWbsAnterior'];
                             $Actividad     = $row['sNumeroActividad'];
                             $TipoActividad = $row['sTipoActividad'];
                             $VentaMN       = $row['dVentaMN'];
                             $VentaDLL      = $row['dVentaDLL'];
                             $Cantidad      = $row['dCantidad'];
                             $sql2 = "Select Sum(a.dCantidad) as Generado
                                      From actividadesxestimacion a
                                      inner join estimacionperiodo e
                                      on (    a.sContrato = e.sContrato
                                          and a.iNumeroEstimacion = e.iNumeroEstimacion)
                                      Where     a.sContrato         = '$sContrato'
                                            And a.iNumeroEstimacion < '$Estimacion'
                                            And a.sNumeroActividad  = '$Actividad'
                                      Group By a.sNumeroActividad";
                             $rs2  = mysql_query($sql2);
                             $num  = mysql_num_rows($rs2);
                             $row2 = mysql_fetch_array($rs2);
                             if ($num > 0)
                                 $Acumulado = $row2['Generado'];
                             else
                                 $Acumulado = 0;
                             $sql3 = " update actividadesxestimacion
                                          set dAcumuladoAnterior  = '$Acumulado',
                                              dMontoAcumuladoAnteriorMN  = '$dAcumulado' * '$VentaMN',
                                              dMontoAcumuladoAnteriorDLL = '$dAcumulado' * '$VentaDLL',
                                              dAcumuladoActual   = '$dAcumulado' + '$Cantidad',
                                              dMontoAcumuladoMN  = ('$dAcumulado' + '$Cantidad') * '$VentaMN',
                                              dMontoAcumuladoDLL = ('$dAcumulado' + '$Cantidad') * '$VentaDLL'
                                          where
                                                  sContrato         = '$sContrato'
                                              and iNumeroEstimacion = '$Estimacion'
                                              and sNumeroActividad  = '$Actividad'
                                              and sWbs              = '$Wbs'
                                              and sWbsAnterior      = '$WbsAnterior'
                                              and sTipoActividad    = '$TipoActividad'";
                             mysql_query($sql3);
                         }
                   }
                   // Ahora vienen los acumulados de paquetes ....
                   $sql = " Select Distinct sWbs
                            From actividadesxestimacion
                            Where     sContrato         = '$sContrato'
                                  And iNumeroEstimacion = '$Estimacion'
                                  And sTipoActividad    = 'Paquete'
                            Order By iNivel DESC";
                   $rs = mysql_query($sql);
                   while($row = mysql_fetch_array($rs))
                   {    $Paquete = $row['sWbs'];

                        $sql2 = " Select sum(dMontoAcumuladoAnteriorMN) as dMontoAnteriorMN,
                                         sum(dMontoAcumuladoAnteriorDLL) as dMontoAnteriorDLL,
                                         sum(dMontoMN) as dMontoMN, sum(dMontoDLL) as dMontoDLL
                                  From actividadesxestimacion
                                  Where     sContrato         = '$sContrato'
                                        And iNumeroEstimacion = '$Estimacion'
                                        And sWbsAnterior      = '$Paquete'
                                  Group By sWbsAnterior";
                        $rs2 = mysql_query($sql2);
                        $num = mysql_num_rows($rs2);
                        if ($num > 0)
                        {   $MontoAnteriorMN  = $row['dMontoAnteriorMN'];
                            $MontoAnteriorDLL = $row['dMontoAnteriorDLL'];
                            $MontoMN          = $row['dMontoMN'];
                            $MontoDLL         = $row['dMontoDLL'];

                            $sql3 = " Update actividadesxestimacion
                                      SET dMontoAcumuladoAnteriorMN  = '$MontoAnteriorMN',
                                          dMontoAcumuladoAnteriorDLL = '$MontoAnteriorDLL',
                                          dMontoMN  = '$MontoMN',
                                          dMontoAcumuladoMN  = '$MontoAnteriorMN'  + '$MontoMN',
                                          dMontoDLL = '$MontoDLL',
                                          dMontoAcumuladoDLL = '$MontoAnteriorDLL' + '$MontoDLL'
                                      Where    sContrato         = '$sContrato'
                                           And iNumeroEstimacion = '$Estimacion'
                                           And sWbs              = '$Paquete' ";
                            mysql_query($sql3);
                        }
                   }
                   $sql = " Select sum(dMontoAcumuladoAnteriorMN) as dMontoAnteriorMN,
                                   sum(dMontoAcumuladoAnteriorDLL) as dMontoAnteriorDLL,
                                   Sum(dMontoMN) as dMontoMN, Sum(dMontoDLL) as dMontoDLL
                            From actividadesxestimacion
                            Where     sContrato         = '$sContrato'
                                  And iNumeroEstimacion = '$Estimacion'
                                  and sTipoActividad    = 'Paquete'
                                  And iNivel            = 0
                            Group By sContrato";
                   $rs  = mysql_query($sql);
                   $num = mysql_num_rows($rs);
                   if ($num > 0)
                   {   $row = mysql_fetch_array($rs);
                       $MontoEstimacionMN      = $row['dMontoMN'] ;
                       $MontoEstimacionDLL     = $row['dMontoDLL'] ;
                       $MontoEstimacionAcumMN  = $row['dMontoAnteriorMN']  + $MontoEstimacionMN ;
                       $MontoEstimacionAcumDLL = $row['dMontoAnteriorDLL'] + $MontoEstimacionDLL ;
                   }else
                       {
                           $MontoEstimacionMN      = 0;
                           $MontoEstimacionDLL     = 0;
                           $MontoEstimacionAcumMN  = 0;
                           $MontoEstimacionAcumDLL = 0;
                       }
                   $sql = " Select Sum(dMontoMN) as dMontoMN,
                                   Sum(dMontoDLL) as dMontoDLL
                            From estimaciones
                            Where    sContrato         = '$sContrato'
                                 And iNumeroEstimacion = '$Estimacion'
                                 and lStatus           = 'Autorizado'
                            Group By sContrato";
                   $rs  =  mysql_query($sql);
                   $num =  mysql_num_rows($rs);
                   if ($num >0)
                   {   $row =  mysql_fetch_array($rs);
                       $MontoGeneradoMN  = $row['dMontoMN'];
                       $MontoGeneradoDLL = $row['dMontoDLL'];
                   }else
                       {  $MontoGeneradoMN  = 0;
                          $MontoGeneradoDLL = 0;
                       }

                   $sql = " UPDATE estimacionperiodo
                            SET dMontoMNGeneradores  = '$MontoGeneradoMN',
                                dMontoDLLGeneradores = '$MontoGeneradoDLL',
                                dMontoMN             = '$MontoEstimacionMN',
                                dMontoDLL            = '$MontoEstimacionDLL',
                                dMontoAcumuladoMN    = '$MontoEstimacionAcumMN',
                                dMontoAcumuladoDLL   = '$MontoEstimacionAcumDLL'
                            Where     sContrato         = '$sContrato'
                                  And iNumeroEstimacion = '$Estimacion'";
                   mysql_query($sql);
               }

               function dumpJavascript()
               {
                      echo 'function ResaltarBotones()
                      {
                          document.getElementById("cmdEstimacionxGen").style.backgroundColor = "";
                          document.getElementById("cmdModificar").style.backgroundColor = "";
                          document.getElementById("cmdEliminar").style.backgroundColor = "";
                          document.getElementById("cmdEstimacionxGen").style.backgroundColor = "";
                          document.getElementById("cmdActualizaAcum").style.backgroundColor = "";
                          document.getElementById("cmdImprimir").style.backgroundColor = "";
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


               }

               function cdmDatosJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cdmDatosJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdEliminarConceptosJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdEliminarConceptosJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdImprimirJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdImprimirJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdActualizaAcumJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdActualizaAcumJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdEstimacionxGenJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdEstimacionxGenJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdEliminarJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdEliminarJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdModificarJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdModificarJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdEstimacionVaciaJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdEstimacionVaciaJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

                //--------------- FOCUS DATOS GENRALES ESTIMACION----------------
               function txtRetencionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtAcumuladoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMensualJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFinanzRealJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFinanzProgJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFisicoRealJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFisicoProgJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMontoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function memoComentaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtProyectoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtBeneficioJSFocus($sender, $params)
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

               function txtGestorJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMayorJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtPFinacieraJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFondoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtPEPJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

                //------------- ON BLUR DE DATOS GENERALES------------------------
               function txtRetencionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtAcumuladoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMensualJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFinanzRealJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFinanzProgJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFisicoRealJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFisicoProgJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMontoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function memoComentaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtProyectoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtBeneficioJSBlur($sender, $params)
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

               function txtGestorJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMayorJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtPFinacieraJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFondoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtPEPJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

                 //--------- KEY PRESS DATOS GENRALES-----------------------------
               function txtRetencionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtAcumuladoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMensualJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFinanzRealJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFinanzProgJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFisicoRealJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFisicoProgJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMontoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function memoComentaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtProyectoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtBeneficioJSKeyPress($sender, $params)
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

               function txtGestorJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMayorJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtPFinacieraJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtFondoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtPEPJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

                function cmdActualizarJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdActualizarJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }
               function cmdRefresJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdRefresJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }
        }

        global $application;

        global $frmAutorizacionEstimacion;

        //Creates the form
        $frmAutorizacionEstimacion=new frmAutorizacionEstimacion($application);

        //Read from resource file
        $frmAutorizacionEstimacion->loadResource(__FILE__);

        //Shows the form
        $frmAutorizacionEstimacion->show();

?>
<script>
ResaltarBotones();
document.getElementById("Panel_Datos_outer").style.visibility = 'hidden';
document.getElementById("Panel_Editar_outer").style.visibility = 'hidden';
</script>
