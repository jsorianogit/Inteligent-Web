<?php
        //Includes
        /*Archivo de inicio creado por usuario*/
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require_once("mysql.inc.php");
        use_unit("buttons.inc.php");
        use_unit("imglist.inc.php");
        use_unit("menus.inc.php");
        use_unit("chart.inc.php");
        use_unit("actnlist.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        /*Variables globales*/
        //$sContrato='425027849';
        $sIdConvenio =$sIdConvenioAct;
        //Class definition
        class frmEstimaciones extends Page
        {      public $dbgPEstimacion = null;
        public $ImageList1 = null;
               public $HiFechaInver = null;
               public $HiNumeroOrden = null;
               public $GrupoMenu = null;
               public $Memo1 = null;
               public $Edit1 = null;
               public $cmdListaVer = null;
               public $cmdSImportes = null;
               public $cmdCImportes = null;
               public $cmdNumGenrador = null;
               public $cmdGenrador = null;
               public $Panel3 = null;
               public $dbgGeneral = null;
               public $dtaGeneral = null;
               public $qryGeneral = null;
               public $dtaFechaF = null;
               public $dtaFechaI = null;
               public $dtaFecha = null;
               public $txtMoneda = null;
               public $cboTipo = null;
               public $txtEstimacion = null;
               public $Label9 = null;
               public $Label8 = null;
               public $Label7 = null;
               public $Label6 = null;
               public $Label5 = null;
               public $Label4 = null;
               public $Panel1 = null;
               public $txtValorAntes = null;
               public $txtQueOpcion = null;
               public $qryEstimacion = null;
               public $qryEstimacionP = null;
               public $Datasource2 = null;
               public $Label1 = null;
               public $Label2 = null;
               public $Datasource1 = null;
               public $Database1 = null;
               public $dbgEstimaciones = null;
        function frmEstimacionesStartBody($sender, $params)
        {
         echo '
                 <!-- Capa que construye el menu -->
                        <div id="cepilomenu">
                           <hr>

                           <b><a class="menuitem" href=javascript:(return false)><font color = "BLUE">Reportes Parciales</font></a></b>

                           <hr>
                           <a class="menuitem" href="javascript:imprimirReportes(1)"><img src="32px-Crystal_Clear_action_fileprint.ico" width=15 height=15></img>Estimacion</a><br>
                           <a class="menuitem" href="javascript:imprimirReportes(2)"><img src="32px-Crystal_Clear_action_fileprint.ico" width=15 height=15></img>Resumen Estimacion</a><br>
                           <a class="menuitem" href="javascript:imprimirReportes(3)"><img src="32px-Crystal_Clear_action_fileprint.ico" width=15 height=15></img>Isometricos</a><br>
                           <a class="menuitem" href="javascript:imprimirReportes(4)"><img src="32px-Crystal_Clear_action_fileprint.ico" width=15 height=15></img>Generadores</a><br>
                           <a class="menuitem" href="javascript:imprimirReportes(5)"><img src="32px-Crystal_Clear_action_fileprint.ico" width=15 height=15></img>Generadores de Obra</a><br>
                           <hr>
                           <b><a class="menuitem" href=javascript:(return false)>Reportes Acumulados</a></b>
                           <hr>
                           <a class="menuitem" href="javascript:imprimirReportes(6)"><img src="32px-Crystal_Clear_action_fileprint.ico" width=15 height=15></img>Isometricos </a><br>
                           <a class="menuitem" href="javascript:imprimirReportes(7)"><img src="32px-Crystal_Clear_action_fileprint.ico" width=15 height=15></img>Concentrado de Generadores x Orden</a><br>
                           <a class="menuitem" href="javascript:imprimirReportes(8)"><img src="32px-Crystal_Clear_action_fileprint.ico" width=15 height=15></img>Detalle de Generadores</a><br>
                           <hr>

                        </div>

                     <!-- Inicializacion de estilos -->
                        <script type="text/javascript" language="JavaScript">
                           if (document.getElementById) {
                              if (menutipo == 0)
                                document.getElementById("cepilomenu").className = "tipo0"
                              else
                                document.getElementById("cepilomenu").className = "tipo1"
                            } else if (document.all) {
                              if (menutipo == 0)
                                document.all.cepilomenu.className = "tipo0"
                              else
                                document.all.cepilomenu.className = "tipo1"
                            }
                        </script>;

         ';


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

        function buttAgregarJSMouseOut($sender, $params)
        {

        ?>
        //Add your javascript code here

        <?php

        }

        function buttAgregarJSMouseMove($sender, $params)
        {

        ?>
        //Add your javascript code here

        <?php

        }



               function ButtonView1JSClick($sender, $params)
               {
               ?>          //add your javascript code here
                  var tag=event.getTarget().tag;
                  if (tag==6)
                  {  if (document.getElementById("txtEstimacion").value == "")
                        alert (" Seleccione una Estimacion !!! ");
                     else
                     {
                        if (document.getElementById("GrupoMenu").style.visibility == 'hidden')
                            document.getElementById("GrupoMenu").style.visibility = 'visible';
                        else
                            document.getElementById("GrupoMenu").style.visibility = 'hidden';
                     }
                  }
                  if (tag==1)
                  {
                        document.getElementById("buttAgregar").click();

                  }
                  return false;
               <?php
               }


               function MainMenu1JSClick($sender, $params)
               {
               ?>
                  imprimirReportes(event.getTarget().tag);
               <?php


              }

            /*  function PopupMenu1JSClick($sender, $params)
              {
               ?>        //Add your javascript code here
                     alert("dddddddd");
                     return false;
               <?php
              }
                */
               function frmEstimacionesJSLoad($sender, $params)
               {
                  ?> //Add your javascript code here
                      Inicio();
                  <?php
               }

               function cmdCancelGeneradorJSClick($sender, $params)
               {
                  ?> //Add your javascript code here
                     controlesGeneradores(false);
                     document.getElementById("txtQueOpcion").value = "";
                     VerFechas();
                     return false;
                  <?php
               }


               function cmdAcceptGeneradorClick($sender, $params)
               {
                   global $sContrato;
                   $Estimacion = trim($this->txtEstimacion->Text);
                   $i = $this->cboTipo->readItemIndex();
                   $TipoEstimacion = trim($this->cboTipo->Items[$i]);
                   $Fecha =  $this->dtaFecha->Text;
                   $FechaI = $this->dtaFechaI->Text;
                   $FechaF = $this->dtaFechaF->Text;
                   $Moneda = $this->txtMoneda->Text;

                   $EstimacionOld= trim($this->txtValorAntes->Text);

                   $sqlTipo = "select * from tiposdeestimacion where sDescripcion='$TipoEstimacion'";
                   $rs = mysql_query($sqlTipo);
                   if($row = mysql_fetch_array($rs))
                   {
                      $TipoE = $row['sIdTipoEstimacion'];
                   }
                    /*Agregar Datos*/
                    if ($this->txtQueOpcion->Text=="Agregar")
                    {  $this->txtQueOpcion->Text=="";
                       $sql = "INSERT INTO estimacionperiodo (
                                 sContrato,
                                 iNumeroEstimacion,
                                 sIdTipoEstimacion,
                                 dIdFecha,
                                 dFechaInicio,
                                 dFechaFinal,
                                 sMoneda,
                                 dFechaInicioContrato,
                                 dFechaFinalContrato
                            )VALUES (
                                 '$sContrato',
                                 '$Estimacion',
                                 '$TipoE',
                                 '$Fecha',
                                 '$FechaI',
                                 '$FechaF',
                                 '$Moneda',
                                 '$Fecha',
                                 '$Fecha')";
                        mysql_query($sql);
                    }
                      /*Modificacion de los datos*/
                    if ($this->txtQueOpcion->Text=="Editar")
                    {
                       $sql = "update estimaciones  set
                                 sContrato='$sContrato',
                                 iNumeroEstimacion = '$Estimacion'
                               where
                                 sContrato='$sContrato'
                                 and iNumeroEstimacion='$EstimacionOld'";
                       mysql_query($sql);
                       $sql = "update estimacionperiodo  set
                                 sContrato='$sContrato',
                                 iNumeroEstimacion = '$Estimacion',
                                 sIdTipoEstimacion ='$TipoE',
                                 dIdFecha = '$Fecha',
                                 dFechaInicio = '$FechaI',
                                 dFechaFinal = '$FechaF',
                                 sMoneda = '$Moneda',
                                 dFechaInicioContrato = '$Fecha',
                                 dFechaFinalContrato = '$Fecha'
                               where
                                 sContrato='$sContrato'
                                 and iNumeroEstimacion='$EstimacionOld'";
                       mysql_query($sql);
                       $this->txtValorAntes->Text="";
                    }
                    if(mysql_error())
                    {
                       ?>
                         <script>
                               alert(" <?php echo " Error al Actualizar los Datos".mysql_error() ?>");
                         </script>
                       <?php
                    }

               }


               function cmdDeleteGeneradorJSClick($sender, $params)
               {
                  ?>//Add your javascript code here
                   document.getElementById("txtQueOpcion").value = "Eliminar";
                   var ok=0;
                   var ok1=0;
                   dbgPEstimacion.getSelectionModel().iterateSelection
                   (    function(index)
                        {
                           var Tabla = dbgPEstimacion.getTableModel();
                           var estimacion = Tabla.getValue(0, index);
                           ok=1;
                           NumOrden = dbgEstimaciones.getTableModel().getValue(0,0);
                           if (NumOrden!="")
                           {  alert("  No se Puede Eliminar la Estimacion [ "+estimacion+" ] Debido  a que contiene Generadores !!!");
                              return false;
                           }
                           if(!confirm("Desea ELIMINAR El No. de Estimacion Seleccionado?"))
                           {
                              return false;
                           }
                           ok1=1;
                           var NumOrden=dbgEstimaciones.getTableModel().getValue(0,0);
                           document.getElementById("txtEstimacion").disabled = false;
                        }
                   );
                   if (ok1==1)
                      return true;
                   if (ok==0)
                      alert("Haga click sobre la Estimacion a Eliminar");
                   return false;

                  <?php
               }

               function cmdDeleteGeneradorClick($sender, $params)
               {
                  /*Eliminar de los datos*/
                    global $sContrato;
                    $Estimacion=$this->txtEstimacion->Text;
                    $this->txtQueOpcion->Text=="";
                       $sql = "select sContrato, iNumeroEstimacion from estimaciones
                               where
                                 sContrato='$sContrato'
                                 and iNumeroEstimacion='$Estimacion'";
                       $result=mysql_query($sql);
                       if (!$row=mysql_fetch_array($result))
                       {
                            $sql = "delete
                                    from estimacionperiodo
                                    where
                                        sContrato='$sContrato'
                                        and iNumeroEstimacion='$Estimacion'";
                            mysql_query($sql);
                       }
                    if(mysql_error())
                    {
                       ?>
                         <script>
                               alert(" <?php echo " Error al Eliminar los Datos".mysql_error() ?>");
                         </script>
                       <?php
                    }
               }


               function cmdChangeGeneradorJSClick($sender, $params)
               {
               ?> //Add your javascript code here
                    controlesGeneradores( true );
                           document.getElementById("txtQueOpcion").value = "Editar";
                           document.getElementById("txtEstimacion").focus();

                           if ( document.getElementById("txtEstimacion").value == "")
                           {
                                 document.getElementById("txtEstimacion").value = dbgPEstimacion.getTableModel().getValue(0,0);
                                 document.getElementById("f-calendar-field-1").value = dbgPEstimacion.getTableModel().getValue(2,0);
                                 document.getElementById("f-calendar-field-2").value = dbgPEstimacion.getTableModel().getValue(3,0);
                                 document.getElementById("txtMoneda").value = dbgPEstimacion.getTableModel().getValue(7,0);
                                 document.getElementById("f-calendar-field-3").value = dbgPEstimacion.getTableModel().getValue(8,0);
                           }
                           document.getElementById("txtValorAntes").value = document.getElementById("txtEstimacion").value;
                           return false;
               <?php
               }


               function frmEstimacionesBeforeShow($sender, $params)
               {

                   if(!$this->conectar())   {
                     echo "Sin conexion";
                     exit(0);
                  }

                  global $sContrato;
                  $this->qryEstimacionP->Active=false;
                  $this->qryEstimacionP->setSQL("select
                           ETP.iNumeroEstimacion as Estimacion,
                           ETP.lEstimado as Estimado,
                           date_format(ETP.dFechaInicio,'%d/%m/%Y') as F_Inicio,
                           date_format(ETP.dFechaFinal,'%d/%m/%Y') as F_Final,
                           TPE.sDescripcion as Tipo,
                           concat('$ ', format(ETP.dMontoMN,2))  as Monto_MN,
                           concat('$ ', format(ETP.dRetencionMN,2))  as Retencion_MN,
                           ETP.sMoneda as Moneda,
                           date_format(ETP.dIdFecha,'%d/%m/%Y') as Fecha,
                           E.sNumeroOrden
                           from
                              estimacionperiodo ETP
                           INNER JOIN
                              tiposdeestimacion TPE
                           ON
                              (TPE.sIdTipoEstimacion=ETP.sIdTipoEstimacion)
                           left join estimaciones E
                           on (E.sContrato = ETP.sContrato
                               and E.iNumeroEstimacion = ETP.iNumeroEstimacion)
                           where
                               ETP.sContrato='$sContrato'
                               order by ETP.iNumeroEstimacion desc");
                  $this->qryEstimacionP->Active=true;

                  $this->qryEstimacion->Active=false;
                  $this->qryEstimacion->setSQL("select
                        '' as Orden,
                        '' as Semana,
                        '' as Generador,
                        '' as Status,
                        '' as Porcentaje,
                        '' as F_Inicio,
                        '' as F_Final,
                        '' as MontoMN,
                        '' as MontDLL,
                        '' as FaseObra ");
                  $this->qryEstimacion->Active=true;
                  $this->LLena_GridGeneral();
               }

                function buttAgregarJSClick($sender, $params)
                {
                ?> //Add your javascript code here
                    controlesGeneradores( true );
                    document.getElementById("txtQueOpcion").value = "Agregar";
                    document.getElementById("txtEstimacion").focus();
                    document.getElementById("txtEstimacion").value = "";
                    document.getElementById("txtMoneda").value = "MONEDA NACIONAL";
                    VerFechas();
                    return false;

                <?php
               }
               function cmdAcceptGeneradorJSClick($sender, $params)
               {
                  ?> //Add your javascript code here
                       var FechaActual=document.getElementById("f-calendar-field-1").value;
                       var FechaInicio=document.getElementById("f-calendar-field-2").value;
                       var FechaFinal=document.getElementById("f-calendar-field-3").value;

                       var Fecha= FechaActual.split("/");
                       var FechaI= FechaInicio.split("/");
                       var FechaF= FechaFinal.split("/");
                       var aux=Fecha[0];
                       Fecha[0]=Fecha[2];
                       Fecha[2]=aux;

                       var aux=FechaI[0];
                       FechaI[0]=FechaI[2];
                       FechaI[2]=aux;

                       var aux=FechaF[0];
                       FechaF[0]=FechaF[2];
                       FechaF[2]=aux;
                       if (FechaI[1]>FechaF[1] || FechaI[2]>FechaF[2] || FechaI[0]>FechaF[0])
                       {
                           alert("La Fecha de INICIO debe ser MENOR a la Fecha FINAL");
                           return false;
                       }

                       FechaActual=Fecha[0]+"-"+Fecha[1]+"-"+Fecha[2];
                       FechaInicio=FechaI[0]+"-"+FechaI[1]+"-"+FechaI[2];
                       FechaFinal=FechaF[0]+"-"+FechaF[1]+"-"+FechaF[2];

                       document.getElementById("f-calendar-field-1").value=FechaActual;
                       document.getElementById("f-calendar-field-2").value=FechaInicio;
                       document.getElementById("f-calendar-field-3").value=FechaFinal;
                       document.getElementById("txtEstimacion").disabled = false;
                       document.getElementById("cboTipo").disabled = false;
                       document.getElementById("txtMoneda").disabled = false;
                       return true;

                  <?php
               }

             function frmEstimacionesShow($sender, $params)
             {
                 //Llenado del combo Tipo de Estimacion
                 $items["uno"]="ADICIONAL";
                 $items["dos"]="ADITIVA/DEDUCTIVA";
                 $items["tres"]="EXTRAORDINARIA";
                 $items["cuatro"]="NORMAL";
                 $this->cboTipo->setItems($items);
                 $this->txtMoneda->Text="MONEDA NACIONAL";
              }

        function dbgPEstimacionJSClick($sender, $params)
        {
        ?>
        //Add your javascript code here
        dbgPEstimacion.getSelectionModel().iterateSelection
        (    function(index)
             {  controlesGeneradores( false );
                 _Dato=[];
                _Dato.push(['','','','','','','','','','']);
                var _OtroDato = _Dato;
                dbgEstimaciones.getTableModel().originalData=_OtroDato;
                dbgEstimaciones.getTableModel().setData(_Dato);

                var Tabla = dbgPEstimacion.getTableModel();
                var estimacion = Tabla.getValue(0, index);
                var FechaI = Tabla.getValue(2, index);
                var FechaF  = Tabla.getValue(3, index);
                var Tipo =  Tabla.getValue(4, index);
                var moneda= Tabla.getValue(7, index);
                var Fecha = Tabla.getValue(8, index);
                document.getElementById("txtEstimacion").value= estimacion;
                if (Tipo=="ADICIONAL")
                    document.getElementById("cboTipo").options[0].selected=true;
                if (Tipo=="ADITIVA/DEDUCTIVA")
                    document.getElementById("cboTipo").options[1].selected=true;
                if (Tipo=="EXTRAORDINARIA")
                    document.getElementById("cboTipo").options[2].selected=true;
                if (Tipo=="NORMAL")
                    document.getElementById("cboTipo").options[3].selected=true;
                document.getElementById("f-calendar-field-1").value=Fecha;
                document.getElementById("f-calendar-field-2").value=FechaI;
                document.getElementById("f-calendar-field-3").value=FechaF;
                document.getElementById("txtMoneda").value= moneda;
                document.getElementById("Label2").innerHTML = "GENERADOES PERTENECIENTES A LA ESTIMACION NO." + " ["+estimacion+"]"

                var TotalFilas=dbgGeneral.getTableModel().getRowCount();
                var NumEstimacion;
                var Dato=[];
                for (i=0;i<TotalFilas;i++)
                {    NumEstimacion= dbgGeneral.getTableModel().getValue(0,i);

                     if (NumEstimacion==estimacion)
                     {
                         var sNumOrden=dbgGeneral.getTableModel().getValue(1,i);
                         var sSemana=dbgGeneral.getTableModel().getValue(2,i);
                         var sGenerador=dbgGeneral.getTableModel().getValue(3,i);
                         var sStatus=dbgGeneral.getTableModel().getValue(4,i);
                         var sPorcent=dbgGeneral.getTableModel().getValue(5,i);
                         var sFeI=dbgGeneral.getTableModel().getValue(6,i);
                         var sFeF=dbgGeneral.getTableModel().getValue(7,i);
                         var sMontoMN=dbgGeneral.getTableModel().getValue(8,i);
                         var sMontDLL=dbgGeneral.getTableModel().getValue(9,i);
                         var sFaseObra=dbgGeneral.getTableModel().getValue(10,i);
                         document.getElementById("HiNumeroOrden").value = sNumOrden;

                         Dato.push([sNumOrden,sSemana,sGenerador,sStatus,sPorcent,sFeI,sFeF,sMontoMN,sMontDLL,sFaseObra]);
                         var OtroDato = Dato;
                         dbgEstimaciones.getTableModel().originalData=OtroDato;
                         dbgEstimaciones.getTableModel().setData(Dato);
                     }
                }

             }
         );
         return false;
        <?php
        }
        /*Funcion para mostrar datos */
        function LLena_GridGeneral()
        {   /*Instruccion de sql que manda los datos al dbgEstimacion*/
            global $sContrato;
            $sql= "select
                      iNumeroEstimacion as Estimacion,
                      sNumeroOrden as No_Orden,
                      iSemana as Sem,
                      sNumeroGenerador as Gen,
                      lStatus as Status,
                      dFinancieroGenerador as Porcent,
                      date_format(dFechaInicio,'%d/%m/%Y') as F_Inicio,
                      date_format(dFechaFinal,'%d/%m/%Y') as F_Final,
                      format(dMontoMN,2) as Monto_MN,
                      format(dMontoDLL,2) as Monto_DLL,
                      sFaseObra as Fase_Obra
                  from
                      estimaciones
                  where
                      sContrato='$sContrato'";
            $this->qryGeneral->Active=false;
            $this->qryGeneral->setSQL($sql);
            $this->qryGeneral->Active=true;
        }

        function dumpJavascript()
        {
         global $sContrato, $sIdConvenio;
         echo " function imprimirReportes(tag){
                  ruta = '../reporte.php';
                  ruta = ruta + '?sContrato=$sContrato';
                  ruta = ruta + '&iNumeroEstimacion='+document.getElementById('txtEstimacion').value;
                  ruta = ruta + '&sNumeroOrden='+document.getElementById('HiNumeroOrden').value;
                  ruta = ruta + '&sConvenio=$sIdConvenio';

                  //Invertir fechas...
                  document.getElementById('HiFechaInver').value = document.getElementById('f-calendar-field-1').value;
                  var fecha = 'HiFechaInver';
                  ComponerFecha(fecha);
                  ruta = ruta + '&sFecha='+document.getElementById('HiFechaInver').value;

                 // tag=event.getTarget().tag;
                  if (tag==1)
                  {   ruta = ruta + '&sTipoActividad='+'Actividad';
                      ruta = ruta + '&reportesPath=estimaciones';
                      ruta = ruta + '&nombreReporte=rptEstimacion';
                      document.getElementById('GrupoMenu').style.visibility = 'hidden';
                  }
                  else
                  if (tag==2)
                  {   ruta = ruta + '&sTipoActividad='+'Paquete';
                      ruta = ruta + '&reportesPath=estimaciones';
                      ruta = ruta + '&nombreReporte=rptResumenEstimacion';
                      document.getElementById('GrupoMenu').style.visibility = 'hidden';
                  }
                  else
                  if (tag==3)
                  {   ruta = ruta + '&reportesPath=estimaciones';
                      ruta = ruta + '&nombreReporte=rptIsometricos';
                      document.getElementById('GrupoMenu').style.visibility = 'hidden';
                  }
                  else
                  if (tag==4)
                  {   ruta = ruta + '&reportesPath=estimaciones';
                      ruta = ruta + '&nombreReporte=rptIsometricoGenerador';
                      document.getElementById('GrupoMenu').style.visibility = 'hidden';
                  }
                  else
                  if (tag==5)
                  {   ruta = ruta + '&reportesPath=estimaciones';
                      ruta = ruta + '&nombreReporte=rptDetalleGenerador';
                      document.getElementById('GrupoMenu').style.visibility = 'hidden';
                  }
                  else
                  if (tag==6)
                  {   ruta = ruta + '&reportesPath=estimaciones';
                      ruta = ruta + '&nombreReporte=rptIsometricosACUM';
                      document.getElementById('GrupoMenu').style.visibility = 'hidden';
                  }
                  else
                  if (tag==7)
                  {   ruta = ruta + '&reportesPath=estimaciones';
                      ruta = ruta + '&nombreReporte=rptIsometricoGeneradorACUM';
                      document.getElementById('GrupoMenu').style.visibility = 'hidden';
                  }
                  else
                  if (tag==8)
                  {   ruta = ruta + '&reportesPath=estimaciones';
                      ruta = ruta + '&nombreReporte=rptDetalleGeneradorACUM';
                      document.getElementById('GrupoMenu').style.visibility = 'hidden';
                  }
                  var status = window.open(ruta,'_blank','fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no');
                //  return false;

                  }
                 ";

              echo 'function controlesGeneradores( habilitar ){
              if(habilitar){
                 accion = false;
              }
              else{
                     accion= true;
                  }
             document.getElementById("buttAgregar").disabled = habilitar;
             document.getElementById("cmdChangeGenerador").disabled = habilitar;
             document.getElementById("cmdDeleteGenerador").disabled = habilitar;
             document.getElementById("cmdImprimir").disabled = habilitar;
             document.getElementById("cmdAcceptGenerador").disabled = accion;
             document.getElementById("cmdCancelGenerador").disabled = accion;
             document.getElementById("txtEstimacion").disabled = accion;
             document.getElementById("cboTipo").disabled = accion;
             document.getElementById("txtMoneda").disabled = accion;
             return false;
           }';

           echo 'function Alinear()
           {
                  for (i=0;i<=7;i++)
                  {   dbgPEstimacion_tableModel.setColumnEditable(i, false);
                  }

                  for (i=0;i<=9;i++)
                  {   dbgEstimaciones_tableModel.setColumnEditable(i, false);
                  }
                 dbgPEstimacion.getTableColumnModel().setColumnWidth(0,65 );
                 dbgPEstimacion.getTableColumnModel().setColumnWidth(7,1 );
                 dbgPEstimacion.getTableColumnModel().setColumnWidth(8,1 );
                 dbgPEstimacion.getTableColumnModel().setColumnWidth(9,0 );

                 var centro=new qx.ui.table.EasyDataCellRenderer();
                 var derecha=new qx.ui.table.EasyDataCellRenderer();
                 var alinea1="center";
                 var alinea2="right";
                 centro.alignment=alinea1;
                 derecha.alignment=alinea2;
                 dbgPEstimacion.getTableColumnModel().setDataCellRenderer(0,derecha);
                 dbgPEstimacion.getTableColumnModel().setDataCellRenderer(1,centro);
                 dbgPEstimacion.getTableColumnModel().setDataCellRenderer(5,derecha);
                 dbgPEstimacion.getTableColumnModel().setDataCellRenderer(6,derecha);
                 return false;
              }';

              echo 'function VerFechas()
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

                    document.getElementById("f-calendar-field-1").value=LaFecha;
                    document.getElementById("f-calendar-field-2").value=LaFecha;
                    document.getElementById("f-calendar-field-3").value=LaFecha;
              }';

              echo 'function Inicio(){

                    document.getElementById("buttAgregar").style.backgroundColor = "";
                    document.getElementById("cmdChangeGenerador").style.backgroundColor = "";
                    document.getElementById("cmdDeleteGenerador").style.backgroundColor = "";
                    document.getElementById("cmdAcceptGenerador").style.backgroundColor = "";
                    document.getElementById("cmdCancelGenerador").style.backgroundColor = "";
                    document.getElementById("cmdImprimir").style.backgroundColor = "";

                    document.getElementById("cmdGenrador").style.backgroundColor = "";
                    document.getElementById("cmdNumGenrador").style.backgroundColor = "";
                    document.getElementById("cmdCImportes").style.backgroundColor = "";
                    document.getElementById("cmdSImportes").style.backgroundColor = "";
                    document.getElementById("cmdListaVer").style.backgroundColor = "";
                    return false;
              }';


              echo 'function imprimirGeneradores(nombre){
                  ok=0;
                  dbgEstimaciones.getSelectionModel().iterateSelection
                  (    function(index)
                      {
                        ok=1;
                        var tablaGeneradores = dbgEstimaciones.getTableModel();
                        ruta = "Acceso/scripts/php/Reportes/generadores_swbs/"+nombre;
                        ruta = ruta + "?sContrato='.$sContrato.'";
                        ruta = ruta + "&sNumeroOrden=" +  tablaGeneradores.getValue(0,index);
                        ruta = ruta + "&sNumeroGenerador=" +  tablaGeneradores.getValue(2,index);
                        var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                      }
                  );
                  if(ok==0)alert("seleccione un generador");
               }';

            /*   echo '
      function clickIE4() {
         if (event.button == 2) {
            ShowPopup(event, 0);
            return false;
         }
      }

      function clickNS4(e) {
         if (document.layers || document.getElementById && !document.all) {
            if (e.which == 2 || e.which == 3) {
               ShowPopup(e, 0);
               return false;
            }
         }
      }

      if (document.layers) {
         document.captureEvents(Event.MOUSEDOWN);
         document.onmousedown = clickNS4;
      }
      else if (document.all && !document.getElementById) {
         document.onmousedown=clickIE4;
      }

      document.oncontextmenu = new Function("ShowPopup(Event.MOUSEDOWN, 0);return false");

      IE4 = (document.all);
      NS4 = (document.layers);

      if (NS4) {
         document.captureEvents(Event.KEYPRESS);
      }

      document.onkeypress = doKey;

      function doKey(e) {
         whichASC = (NS4) ? e.which : event.keyCode;
         whichKey = String.fromCharCode(whichASC).toLowerCase();

         switch (whichASC) {
            case 13:
               document.forms[0].submit();
               break;
            default:
               break;
         }
      }
               ';  */
  /*
  echo'
function checkwhere(e) {
   if (document.layers){
           xCoord = e.x;
           yCoord = e.y;
   }else if (document.all){
           xCoord = event.clientX;
           yCoord = event.clientY;
   }else if (document.getElementById){
           xCoord = e.clientX;
           yCoord = e.clientY;
   }
   self.status = "X= "+ xCoord + "  Y= " + yCoord;
}


document.onmousemove = checkwhere;
if(document.captureEvents) {document.captureEvents(Event.MOUSEMOVE);}
  ' ;     */

           /*    echo '
  function ShowPopup(e, type)
  {
    CreateMenu();
    PopupMenu1.setLeft(xCoord);
    PopupMenu1.setTop(yCoord);
    PopupMenu1.show();
  }';    */

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
               function cmdListaVerJSClick($sender, $params)
               {
                  ?> //Add your javascript code here
                   imprimirGeneradores("rptNumerosGeneradoresCIA.php");
                   return false;
                  <?php
               }

               function cmdSImportesJSClick($sender, $params)
               {
                  ?> //Add your javascript code here
                     imprimirGeneradores("rptSemanalSinImportes.php");
                     return false;
                  <?php
               }

               function cmdCImportesJSClick($sender, $params)
               {
                  ?> //Add your javascript code here
                     imprimirGeneradores("rptSemanalConImportes.php");
                     return false;
                  <?php
               }

               function cmdNumGenradorJSClick($sender, $params)
               {
                  ?> //Add your javascript code here
                     imprimirGeneradores("rptNumerosGeneradores.php");
                     return false;
                  <?php
               }

               function cmdGenradorJSClick($sender, $params)
               {
                  ?>
                  imprimirGeneradores("rptCaratulaGenerador.php");
                  return false;
                  <?php
               }

               function cmdImprimirJSClick($sender, $params)
               {
                  ?> //Add your javascript code here
alert("Ahora tambien puedes dar  clic derecho sobre el registro e imprimirlo !!");
                     if (document.getElementById("txtEstimacion").value == "")
                        alert (" Seleccione una Estimacion !!! ");
                     else
                     {
                        if (document.getElementById("GrupoMenu").style.visibility == 'hidden')
                            document.getElementById("GrupoMenu").style.visibility = 'visible';
                        else
                            document.getElementById("GrupoMenu").style.visibility = 'hidden';
                     }
                     return false;
                  <?php
               }


        function conectar()
        {
            global $Servidor,$Usuario,$Clave,$_SESSION;
            $this->Database1->setUserName($Usuario);
            $this->Database1->setUserPassword($Clave);
            $this->Database1->setDatabaseName($_SESSION['database']);
            $this->Database1->setConnected(true);
            return true;
        }

        function txtMonedaJSKeyPress($sender, $params)
        {

        ?>
        //Add your javascript code here

        <?php

        }

        function txtMonedaJSFocus($sender, $params)
        {

        ?>
        //Add your javascript code here

        <?php

        }

        function txtMonedaJSBlur($sender, $params)
        {

        ?>
        //Add your javascript code here

        <?php

        }

        function cboTipoJSKeyPress($sender, $params)
        {

        ?>
        //Add your javascript code here

        <?php

        }

        function cboTipoJSFocus($sender, $params)
        {

        ?>
        //Add your javascript code here

        <?php

        }

        function cboTipoJSBlur($sender, $params)
        {

        ?>
        //Add your javascript code here

        <?php

        }

        function txtEstimacionJSKeyPress($sender, $params)
        {

        ?>
        //Add your javascript code here

        <?php

        }

        function txtEstimacionJSFocus($sender, $params)
        {

        ?>
        //Add your javascript code here

        <?php

        }

        function txtEstimacionJSBlur($sender, $params)
        {

        ?>
        //Add your javascript code here

        <?php

        }


        }
        global $application;

        global $frmEstimaciones;

        //Creates the form
        $frmEstimaciones=new frmEstimaciones($application);

        //Read from resource file
        $frmEstimaciones->loadResource(__FILE__);

        //Shows the form
        $frmEstimaciones->show();


?>
<script>
controlesGeneradores( false );
document.getElementById("GrupoMenu").style.visibility = 'hidden';
Inicio();

</script>

