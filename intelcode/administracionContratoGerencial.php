<?php
        //Includes
        require_once("vcl/vcl.inc.php");
        /*Archivo de inicio creado por usuario*/
        use_unit("dbgrids.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require("mysql.inc.php");
        require("fnUtilerias.php");
        /*Variables globales*/
        global $sIdConvenioAct;
        global $sContrato;
        $sContrato=$sContrato;
        $sIdConvenio=$sIdConvenioAct;

        //Class definition
        class Unit1 extends Page
        {
                public $Label4 = null;
                public $sFormato = null;
                public $dMontoMN = null;
                public $Memo1 = null;
                public $Label3 = null;
                public $cmdImprimir = null;
                public $cmdRecargar = null;
                public $qryPartidas = null;
                public $cbgPartidas = null;
                public $cboNumeroOrden = null;
                public $dtpFecha = null;
                public $Datasource3 = null;
                public $Datasource1 = null;
                public $Database1 = null;
                public $Label2 = null;
                public $Label1 = null;
                public $Panel1 = null;
                function cmdImprimirJSClick($sender, $params)
                {
                  global $sContrato;
                  global $sIdConvenioAct;
                  ?>
                  //Add your javascript code here
                     ruta = "../reporte.php";
                     ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                     ruta = ruta + "&sIdConvenio=<?php echo $sIdConvenioAct ?>";
                     ruta = ruta + "&dIdFecha=" + date();
                     ruta = ruta + "&sNumeroOrden=" +  numeroOrden();
                     ruta = ruta + "&dMontoMN="+document.getElementById("dMontoMN").value;
                     ruta = ruta + "&nombreReporte=avanceGerencial";
                     ruta = ruta + "&sFormato="+document.getElementById("sFormato").value;
                      if(numeroOrden()=="CONTRATO_<?php echo $sContrato ?>"){
                        ruta = ruta + "&reportesPath=avanceGerencial204";
                      }
                      else{
                        ruta = ruta + "&reportesPath=avanceGerencialxOrden204";
                      }
                     //  alert(ruta);
                     var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no");
                     return false;
                  <?php

                }
               function dumpJavascript(){
                  echo "
                     \rfunction date(){return document.getElementById(\"f-calendar-field-1\").value;}
                     \rfunction numeroOrden(){return document.getElementById(\"cboNumeroOrden\").value;}
                     ";
               }

                function Unit1JSLoad($sender, $params)
                {

                ?>
                //Add your javascript code here

                 cbgPartidas_tableModel.setColumnEditable(0, false);
                 cbgPartidas_tableModel.setColumnEditable(1, false);
                 cbgPartidas_tableModel.setColumnEditable(2, false);
                 cbgPartidas_tableModel.setColumnEditable(3, false);
                 cbgPartidas_tableModel.setColumnEditable(4, false);
                 cbgPartidas_tableModel.setColumnEditable(5, false);
                 cbgPartidas_tableModel.setColumnEditable(6, false);
                 cbgPartidas_tableModel.setColumnEditable(7, false);
                 cbgPartidas_tableModel.setColumnEditable(8, false);
                 cbgPartidas_tableModel.setColumnEditable(9, false);
                 cbgPartidas_tableModel.setColumnEditable(10, false);
                 cbgPartidas_tableModel.setColumnEditable(11, false);
                 cbgPartidas_tableModel.setColumnEditable(12, false);
                 cbgPartidas_tableModel.setColumnEditable(13, false);
                 cbgPartidas_tableModel.setColumnEditable(14, false);

                 cbgPartidas_tableModel.setColumnWidth(0,0 );
                 cbgPartidas.getTableColumnModel().setColumnWidth(0,0 );
                 cbgPartidas.getTableColumnModel().setColumnWidth(1,50 );
                 cbgPartidas.getTableColumnModel().setColumnWidth(2,60 );
                 cbgPartidas.getTableColumnModel().setColumnWidth(4,75 );
                 cbgPartidas.getTableColumnModel().setColumnWidth(5,75 );
                 cbgPartidas.getTableColumnModel().setColumnWidth(6,80 );
                 cbgPartidas.getTableColumnModel().setColumnWidth(7,80 );
                 cbgPartidas.getTableColumnModel().setColumnWidth(8,80 );
                 cbgPartidas.getTableColumnModel().setColumnWidth(9,80 );
                 cbgPartidas.getTableColumnModel().setColumnWidth(10,110 );
                 cbgPartidas.getTableColumnModel().setColumnWidth(11,110 );
                 cbgPartidas.getTableColumnModel().setColumnWidth(12,110 );
                 cbgPartidas.getTableColumnModel().setColumnWidth(13,82 );
                 cbgPartidas.getTableColumnModel().setColumnWidth(14,110 );


                 var renderer=new qx.ui.table.EasyDataCellRenderer();
                 var alignment='right';
                 renderer.alignment=alignment;

                 cbgPartidas.getTableColumnModel().setDataCellRenderer(6,renderer);
                 cbgPartidas.getTableColumnModel().setDataCellRenderer(8,renderer);
                 cbgPartidas.getTableColumnModel().setDataCellRenderer(10,renderer);
                 cbgPartidas.getTableColumnModel().setDataCellRenderer(11,renderer);
                 cbgPartidas.getTableColumnModel().setDataCellRenderer(12,renderer);
                 cbgPartidas.getTableColumnModel().setDataCellRenderer(14,renderer);

                 var rendererColor=new qx.ui.table.EasyDataCellRenderer();
                 var color='blue';//'black'
                 rendererColor.fontcolor=color;
                 cbgPartidas.getTableColumnModel().setDataCellRenderer(7,rendererColor);
                 cbgPartidas.getTableColumnModel().setDataCellRenderer(9,rendererColor);
                 cbgPartidas.getTableColumnModel().setDataCellRenderer(13,rendererColor);

                 //var rendererFondoColor=new qx.ui.table.EasyDataCellRenderer();
                 //var fondocolor='BLUE';//'#B7DBFF'
                 //rendererFondoColor.color=fondocolor;
                 //cbgPartidas.getTableColumnModel().setDataCellRenderer(7,rendererFondoColor);
                 //cbgPartidas.getTableColumnModel().setDataCellRenderer(9,rendererFondoColor);
                 //cbgPartidas.getTableColumnModel().setDataCellRenderer(13,rendererFondoColor);


                <?php

                }


                /*funcion actualiza el grid cuando se haga click en cboNumeroOrden*/
                function cboNumeroOrdenChange($sender, $params)
                {
                  $this->recargarGrid($this->OrdenSeleccionada());
                }
                /*funcion que lee el indice del cboNumeroOrden*/
                function OrdenSeleccionada(){
                  global $sContrato;
                  $sNumeroOrden = $this->cboNumeroOrden->readItemIndex();
                  if($sNumeroOrden==-1){
                      /* retorna la vaiable $sContrato antecedida de CONTRATO_*/
                      return "CONTRATO_$sContrato";
                  }
                  else{
                     return  $this->cboNumeroOrden->readItemIndex();
                  }
                }
                /*funcion que genera la consulta a la BD para actualizar grid*/
                function recargarGrid($sNumeroOrden){
                    global $sContrato;
                    global $sIdConvenio;
                    $sFecha =formatoFechaPer($this->dtpFecha->Text,"Y-m-d");
                    $this->conector() ;
                    //buscar el convenio
                    $sql = "Select sIdConvenio from reportediario where sContrato = '$sContrato' And dIdFecha = '$sFecha'";
                    $rs = mysql_query($sql);
                    if($rw = mysql_query($rs)){
                        $sIdConvenioRD = $rw['sIdConvenio'];
                    }else{
                        $sIdConvenioRD = $sIdConvenio;
                    }
                    //Obtener el monto del contrato en e convenio obtenido
                    $dMontoMN="0";
                    $sql = "Select dMontoMN from convenios where sContrato = '$sContrato' And sIdConvenio='$sIdConvenioRD'";
                    $rs = mysql_query($sql);
                    if($rw = mysql_fetch_array($rs)){
                        $this->dMontoMN->Value = $rw['dMontoMN'];
                    }

                    /*si $NumeroOrden NO contiene la palabra CONTRATO*/
                    if(strpos($sNumeroOrden,"CONTRATO")!==false){
                        /*realiza la consulta*/
                        $sql = "Select
                                 iNivel as Nivel,
                                 @sWbs:=sWbs as Wbs,
                                 aa.sNumeroActividad as Concepto,
                                 mDescripcion as Descripcion,

                                 date_format(dFechaInicio,'%d/%m/%Y') as FInicio,
                                 date_format(dFechaFinal,'%d/%m/%Y') as FTermino,

                                 concat(dPonderado,' %') as Ponderado,
                                 repeat('|',((dPonderado*20)/100)) as Porcent_Pond,

                                 concat(format(ifnull(@dab:=( Select
                                      Sum(dAvance) as dAvanceGlobal
                                      From
                                      bitacoradepaquetes
                                 Where
                                       sContrato = '$sContrato'
                                       And sIdConvenio = '$sIdConvenio'
                                       And sNumeroOrden=''
                                       And sWbs=@sWbs
                                       And dIdFecha <= '$sFecha'
                                       Group By sContrato ),@dab:=0),4),' %') as AvanceFisico,
                                repeat('|',((@dab*20)/100)) as Porcent_AvFis,

                                concat('$ ',format((dVentaMN),2)) as MonedaNacional,

                                concat('$ ',format(ifnull(@dMontoP:=(Select
                                      sum(a4.dVentaMN * e4.dCantidad) as dMontoMN
                                      From
                                      distribuciondeanexo e4
                                      INNER JOIN
                                          actividadesxanexo a4
                                      ON
                                         (e4.sContrato = a4.sContrato
                                          And e4.sIdConvenio = a4.sIdConvenio
                                          And e4.sWbs = a4.sWbs
                                          And e4.sNumeroActividad = a4.sNumeroActividad
                                          And a4.sTipoActividad = 'Actividad')
                                      Where
                                          e4.sContrato = '$sContrato'
                                          And e4.sIdConvenio = '$sIdConvenio'
                                          And e4.dIdFecha <= '$sFecha'
                                          And e4.sWbs Like concat(@sWbs,'.%')
                                      Group By e4.sContrato),@dMontoP:=0),2)) as MontoProgramado,

                                      #concat(format(@total:=(@dMontoP/dVentaMN)*100,4),' %') as AvanceProgramado,
                                      #repeat('|',((@total*20)/100)) as Porcent_AvProg,
                                      concat(format(@total:=(@dMontoP/".$this->dMontoMN->Value.")*100,4),' %') as AvanceProgramado,
                                      repeat('|',( ((@total/dPonderado)*100)*20/100) ) as Porcent_AvProg,


                                concat('$ ',format(ifnull((Select
                                       sum(a.dVentaMN * e.dCantidad) as dMontoMN
                                       From
                                       estimacionxpartida e
                                       INNER JOIN
                                           actividadesxanexo a
                                       ON
                                          (e.sContrato = a.sContrato
                                           And a.sIdConvenio = '$sIdConvenio'
                                           And e.sNumeroActividad = a.sNumeroActividad
                                           And a.sTipoActividad = 'Actividad'
                                           And a.sWbs Like concat(@sWbs,'.%'))
                                       INNER JOIN
                                           estimaciones e2
                                       ON
                                          (e.sContrato = e2.sContrato
                                           And e.sNumeroOrden = e2.sNumeroOrden
                                           And e.sNumeroGenerador = e2.sNumeroGenerador
                                            And e2.dFechaFinal <= '$sFecha'
                                           And e2.lStatus = 'Autorizado' )
                                       Where
                                           e.sContrato = '$sContrato'
                                       Group By e.sContrato),0),2)) as MontoGenerado
                               from
                                 actividadesxanexo aa
                               Where
                                 sContrato = '$sContrato'
                                 and sIdConvenio = '$sIdConvenio'
                                 And sTipoActividad = 'Paquete'
                                 And iNivel <= 1
                               order by iItemOrden ";


                    }
                    else{
                        $sql = "Select
                                 iNivel as Nivel,
                                 @sWbs:=sWbs as Wbs,
                                 sNumeroActividad as Concepto,
                                 mDescripcion as Descripcion,
                                 dFechaInicio as FInicio,
                                 dFechaFinal as FTermino,
                                 concat(dPonderado,' %') as Ponderado,
                                 repeat('|',((dPonderado*20)/100)) as Porcent_Pond,

                                 concat(format(ifnull(@dav:=( Select
                                        Sum(dAvance) as dAvanceGlobal
                                        From
                                        bitacoradepaquetes
                                        Where
                                            sContrato = '$sContrato'
                                            And sIdConvenio = '$sIdConvenio'
                                            And sNumeroOrden = '$sNumeroOrden'
                                            And sWbs = @sWbs
                                            And dIdFecha <= '$sFecha'
                                        Group By sContrato),@dav:=0),4),' %') as AvanceFisico,
                                repeat('|',((@dav*20)/100)) as Porcent_AvFis,

                                concat('$ ',format((dVentaMN),2)) as MonedaNacional,

                                 concat('$ ',format(ifnull((Select
                                       sum(a1.dVentaMN * e1.dCantidad) as dMontoMN
                                       From
                                       distribuciondeactividades e1
                                       INNER JOIN
                                           actividadesxorden a1
                                       ON
                                           (e1.sContrato = a1.sContrato
                                            And a1.sIdConvenio = e1.sIdConvenio
                                            And a1.sNumeroOrden = e1.sNumeroOrden
                                            And e1.sWbs = a1.sWbs
                                            And e1.sNumeroActividad = a1.sNumeroActividad
                                            And a1.sTipoActividad = 'Actividad')
                                      Where
                                            e1.sContrato = '$sContrato'
                                            And e1.sNumeroOrden = '$sNumeroOrden'
                                            And e1.sIdConvenio = '$sIdConvenio'
                                            And e1.dIdFecha <= '$sFecha'
                                            And e1.sWbs Like concat(@sWbs,'.%')
                                     Group By e1.sContrato),0),2)) as MontoProgramado,

                                concat(format(ifnull(@avprog:=(Select
                                       Sum(dPonderadoDiario) as dPonderadoGlobal
                                       From
                                       avancesxactividad
                                       Where
                                           sContrato = '$sContrato'
                                           And sIdConvenio = '$sIdConvenio'
                                           And sNumeroOrden ='$sNumeroOrden'
                                           And sWbs = @sWbs
                                           And dIdFecha <= '$sFecha'
                                      Group By sContrato),@avprog:=0),4),' %') as AvProgramado,
                                repeat('|',((@avprog*20)/100)) as Porcent_AvProg,

                                 concat('$ ',format(ifnull((Select
                                      sum(a.dVentaMN * e.dCantidad) as dMontoMN
                                      From
                                      estimacionxpartida e
                                      INNER JOIN
                                          actividadesxorden a
                                      ON
                                         (e.sContrato = a.sContrato
                                          And a.sIdConvenio = '$sIdConvenio'
                                          And a.sNumeroOrden = e.sNumeroOrden
                                          And e.sWbs = a.sWbs
                                          And e.sNumeroActividad = a.sNumeroActividad
                                          And a.sTipoActividad = 'Actividad')
                                      INNER JOIN
                                          estimaciones e2
                                      ON
                                          (e.sContrato = e2.sContrato
                                           And e.sNumeroOrden = e2.sNumeroOrden
                                           And e.sNumeroGenerador = e2.sNumeroGenerador
                                           And e2.dFechaFinal <= '$sFecha'
                                           And e2.lStatus = 'Autorizado' )
                                      Where
                                           e.sContrato = '$sContrato'
                                           And e2.sNumeroOrden = '$sNumeroOrden'
                                           And e.sWbs Like concat(@sWbs,'.%')
                                      Group By e.sContrato),0),2)) as MontoGenerado

                               from
                                 actividadesxorden  aa
                               Where
                                 sContrato = '$sContrato'
                                 and sIdConvenio = '$sIdConvenio'
                                 And sTipoActividad = 'Paquete'
                                 and sNumeroOrden='$sNumeroOrden'
                                 And iNivel <= 1
                               order by iItemOrden ";


                    }
                     $this->Memo1->Text=$sql;
                    $this->qryPartidas->setActive(false);
                    $this->qryPartidas->setSQL($sql);
                    $this->qryPartidas->setActive(true);

                }
                /*Funcion antes de ser mostrada unidad1*/
                function Unit1BeforeShow($sender, $params)
                {
                  global $sContrato;

                  $sContrato;
                  if($this->dtpFecha->Text=="")$this->dtpFecha->Text = date("d/m/Y");
                  $this->conector() ;

                  $sqlTipo = "select sNumeroOrden from ordenesdetrabajo where sContrato='$sContrato' order by sNumeroOrden";
                  $rs = mysql_query($sqlTipo);

                  unset($TipoE);
                  $Ordenes["CONTRATO_$sContrato"] = "Contrato No. $sContrato";

                  while($row = mysql_fetch_array($rs))
                  {
                     $Ordenes[$row['sNumeroOrden']] = $row['sNumeroOrden'];
                  }
                  $this->cboNumeroOrden->setItems($Ordenes);
                }

                function Unit1Show($sender, $params)
                {
                  $this->recargarGrid($this->OrdenSeleccionada()) ;
                }

                 /*Apertura de la base de datos*/
                function conector()
                {   global $Servidor,$Usuario,$Clave,$_SESSION;
                     $_SESSION['database']="intelcode";
                    $this->Database1->setUserName($Usuario);
                    $this->Database1->setHost($Servidor);
                    $this->Database1->setUserPassword($Clave);
                    $this->Database1->setDatabaseName($_SESSION['database']);
                    $this->Database1->setConnected(true);
                }

        }

        global $application;

        global $Unit1;

        //Creates the form
        $Unit1=new Unit1($application);

        //Read from resource file
        $Unit1->loadResource(__FILE__);

        //Shows the form
        $Unit1->show();

?>
