<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require("mysql.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("db.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");

        //Class definition
        class frmControlAcarreo extends Page
        {
               public $Button1 = null;
               public $hiOpcion = null;
               public $hPanel = null;
               public $cmdMostrarViajes = null;
               public $cmdMostrarControlAcarreo = null;
               public $dbgViajes = null;
               public $dbgGeneral = null;
               public $hiIdViaje = null;
               public $cmdCancelarV = null;
               public $cmdAceptarV = null;
               public $cmdEliminarV = null;
               public $cmdModificarV = null;
               public $cmdAgregarV = null;
               public $hiOpcionV = null;
               public $iIdMedida = null;
               public $dCantidadViajes = null;
               public $qryGeneral = null;
               public $dsGeneral = null;
               public $Datasource2 = null;
               public $Query2 = null;
               public $Label15 = null;
               public $Label14 = null;
               public $Panel2 = null;
               public $sFirmanteDestino = null;
               public $Memo1 = null;
               public $GridAcarreos = null;
               public $hiIdMedida = null;
               public $sTipo = null;
               public $sFirmanteOrigen = null;
               public $sDestino = null;
               public $sPropietario = null;
               public $sOrigen = null;
               public $sMaterial = null;
               public $Label8 = null;
               public $Label6 = null;
               public $Label5 = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;
               public $hiIdAcarreo = null;
               public $hsNumeroReporte = null;
               public $hdIdFecha = null;
               public $hsIdTurno = null;
               public $hsIdConvenio = null;
               public $hsNumeroOrden = null;
               public $hsContrato = null;
               public $db = null;
               public $Query1 = null;
               public $Datasource1 = null;
               public $cmdImprimir = null;
               public $cmdCancelar = null;
               public $cmdAceptar = null;
               public $cmdEliminar = null;
               public $cmdModificar = null;
               public $cmdAgregar = null;
               public $Label7 = null;
               public $Panel1 = null;
               function Button1JSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                   //document.location.href="Modulos/preciounitario/actividadesdiarias/reportediario/index.php";
                   document.location.href="frmReporteDiario.php";   
                   return false;
               <?php

               }

               function cmdEliminarVJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                        if(confirm("desea eliminar el registro seleccionado ?!")){
                                return true;
                        }else{
                                return false;
                        }
               <?php

               }

               function cmdEliminarVClick($sender, $params)
               {
                       $sql = "delete from a_viajes
                               where
                                        sContrato='".$this->hsContrato->Value."' and
                                        dIdFecha='".$this->hdIdFecha->Value."' and
                                        sNumeroOrden='".$this->hsNumeroOrden->Value."' and
                                        sIdTurno='".$this->hsIdTurno->Value."' and
                                        sIdConvenio='".$this->hsIdConvenio->Value."' and
                                        sNumeroReporte='".$this->hsNumeroReporte->Value."' and
                                        iIdAcarreo='".$this->hiIdAcarreo->Value."' and
                                        iIdViaje ='".$this->hiIdViaje->Value."'";
                        mysql_query($sql);
                        if(mysql_error()){
                                $this->Memo1->Text = mysql_error();
                        }else{
                                $this->Memo1->Text = "";
                        }
        
               }

               function dbgViajesJSClick($sender, $params)
               {

               ?>
                    dbgViajes.getSelectionModel().iterateSelection
                    (    function(index)
                         {
                          var Tabla      = dbgViajes.getTableModel();
                          document.getElementById('hiIdViaje').value=Tabla.getValue(0, index);
                          document.getElementById('iIdMedida').value=Tabla.getValue(1, index);
                          document.getElementById('hiIdAcarreo').value=Tabla.getValue(2, index);
                          document.getElementById('dCantidadViajes').value=Tabla.getValue(3, index);
                         }
                    );

                    /*deshabilitar controles*/
                    deshabilitar(true);
                    deshabilitarv(true);
                    return false;
               
               <?php

               }

               function cmdMostrarViajesJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                    document.getElementById("hPanel").value=2;
                    panels(2);
                    return false;

               <?php

               }

               function cmdMostrarControlAcarreoJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                    document.getElementById("hPanel").value=1;
                    panels(1);
                    return false;
               <?php

               }

               function cmdAceptarVClick($sender, $params)
               {
                $iIdMedida = $this->iIdMedida->getItemIndex();
                $dCantidadViajes = $this->dCantidadViajes->getText();
                $iIdViaje=$this->hiIdViaje->Value;

                $sql = "select max(iIdViaje) as iIdViaje from a_viajes where
                                sContrato='".$this->hsContrato->Value."' and
                                dIdFecha='".$this->hdIdFecha->Value."' and
                                sNumeroOrden='".$this->hsNumeroOrden->Value."' and
                                sIdTurno='".$this->hsIdTurno->Value."' and
                                sIdConvenio='".$this->hsIdConvenio->Value."' and
                                sNumeroReporte='".$this->hsNumeroReporte->Value."' and
                                iIdAcarreo='".$this->hiIdAcarreo->Value."'";
                $rs = mysql_query($sql);
                if($row = mysql_fetch_array($rs)){
                        $iIdViajeS = $row["iIdViaje"] + 1;
                }
                if($this->hiOpcionV->Value=="agregar"){
                        $sql= "insert into a_viajes set
                                sContrato='".$this->hsContrato->Value."',
                                dIdFecha='".$this->hdIdFecha->Value."',
                                sNumeroOrden='".$this->hsNumeroOrden->Value."',
                                sIdTurno='".$this->hsIdTurno->Value."',
                                sIdConvenio='".$this->hsIdConvenio->Value."',
                                sNumeroReporte='".$this->hsNumeroReporte->Value."',
                                iIdViaje='$iIdViajeS',
                                iIdMedida='$iIdMedida',
                                iIdAcarreo='".$this->hiIdAcarreo->Value."',
                                dCantidadViajes='$dCantidadViajes'";
                }else if($this->hiOpcionV->Value=="modificar"){
                        $sql= "update a_viajes set
                                        iIdMedida='$iIdMedida' ,
                                        dCantidadViajes='$dCantidadViajes'
                               where
                                        sContrato='".$this->hsContrato->Value."' and
                                        dIdFecha='".$this->hdIdFecha->Value."' and
                                        sNumeroOrden='".$this->hsNumeroOrden->Value."' and
                                        sIdTurno='".$this->hsIdTurno->Value."' and
                                        sIdConvenio='".$this->hsIdConvenio->Value."' and
                                        sNumeroReporte='".$this->hsNumeroReporte->Value."' and
                                        iIdAcarreo='".$this->hiIdAcarreo->Value."' and
                                        iIdViaje ='$iIdViaje'";
                }
                mysql_query($sql);
                if(mysql_error()){
                        $this->Memo1->Text = mysql_error();
                }else{
                        $this->Memo1->Text = "";
                }
                $this->qryGeneral->setActive(false);
                $this->qryGeneral->setFilter(
                          " sContrato='".$this->hsContrato->Value."'
                          and sNumeroOrden='".$this->hsNumeroOrden->Value."'
                          and sIdConvenio='".$this->hsIdConvenio->Value."'
                          and dIdFecha='".$this->hdIdFecha->Value."'
                          and sNumeroReporte='".$this->hsNumeroReporte->Value."'
                          and sIdTurno='".$this->hsIdTurno->Value."'"
                );
                $this->qryGeneral->setActive(true);



               }

               function cmdCancelarVJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                 deshabilitar(true);
                 deshabilitarv(true);
                 return false;
               <?php

               }

               function cmdModificarVJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                 deshabilitar(true);
                 deshabilitarv(false);
                 document.getElementById("hiOpcionV").value = "modificar";
                 return false;
               <?php

               }

               function cmdAgregarVJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                 deshabilitar(true);
                 deshabilitarv(false);
                 document.getElementById("hiOpcionV").value = "agregar";
                 return false;
               <?php

               }

               function cmdImprimirJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                    deshabilitarv(true);
                    return false;
               <?php

               }

               function cmdEliminarClick($sender, $params)
               {
                   $iIdAcarreo=$this->hiIdAcarreo->Value;
                   $sql = "delete from a_controlacarreo   where
                                sContrato='".$this->hsContrato->Value."' and
                                dIdFecha='".$this->hdIdFecha->Value."' and
                                sNumeroOrden='".$this->hsNumeroOrden->Value."' and
                                sIdTurno='".$this->hsIdTurno->Value."' and
                                sIdConvenio='".$this->hsIdConvenio->Value."' and
                                sNumeroReporte='".$this->hsNumeroReporte->Value."' and
                                iIdAcarreo='$iIdAcarreo'";
                   mysql_query($sql);
                   if(mysql_error()){
                        $this->Memo1->Text = mysql_error();
                   }else{
                        $this->Memo1->Text = "";
                   }
                   $this->Query1->setActive(false);
                   $this->Query1->setFilter(
                            " sContrato='".$this->hsContrato->Value."'
                              and sNumeroOrden='".$this->hsNumeroOrden->Value."'
                              and sIdConvenio='".$this->hsIdConvenio->Value."'
                              and dIdFecha='".$this->hdIdFecha->Value."'
                              and sNumeroReporte='".$this->hsNumeroReporte->Value."'
                              and sIdTurno='".$this->hsIdTurno->Value."'"
                    );
                    $this->Query1->setActive(true);
               }

               function cmdEliminarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  deshabilitarv(true);
                  if(confirm("Desela eliminar el registro seleccionado ?!")){
                        return true;
                  }else{
                        return false;
                  }
               <?php

               }

               function cmdCancelarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                   deshabilitar(true);
                   return false;
               <?php

               }

               function cmdAceptarClick($sender, $params)
               {
                $sMaterial = strtoupper($this->sMaterial->getText());
                $sOrigen = strtoupper($this->sOrigen->getText());
                $sDestino = strtoupper($this->sDestino->getText());
                $sPropietario = strtoupper($this->sPropietario->getText());
                $sFirmanteOrigen = strtoupper($this->sFirmanteOrigen->getText());
                $sFirmanteDestino = strtoupper($this->sFirmanteDestino->getText());
                $sTipo = $this->sTipo->getItemIndex();
                $iIdAcarreo=$this->hiIdAcarreo->Value;
                $iIdAcarreoS=1;
                $sql = "select max(iIdAcarreo) as iIdAcarreo from a_controlacarreo where
                                sContrato='".$this->hsContrato->Value."' and
                                dIdFecha='".$this->hdIdFecha->Value."' and
                                sNumeroOrden='".$this->hsNumeroOrden->Value."' and
                                sIdTurno='".$this->hsIdTurno->Value."' and
                                sIdConvenio='".$this->hsIdConvenio->Value."' and
                                sNumeroReporte='".$this->hsNumeroReporte->Value."' ";
                $rs = mysql_query($sql);
                if($row = mysql_fetch_array($rs)){
                        $iIdAcarreoS = $row["iIdAcarreo"] + 1;
                }
                if($this->hiOpcion->Value=="agregar"){
                        $sql= "insert into a_controlacarreo set
                                sContrato='".$this->hsContrato->Value."',
                                dIdFecha='".$this->hdIdFecha->Value."',
                                sNumeroOrden='".$this->hsNumeroOrden->Value."',
                                sIdTurno='".$this->hsIdTurno->Value."',
                                sIdConvenio='".$this->hsIdConvenio->Value."',
                                sNumeroReporte='".$this->hsNumeroReporte->Value."',
                                iIdAcarreo='$iIdAcarreoS',
                                sMaterial='$sMaterial',
                                sOrigen='$sOrigen',
                                sDestino='$sDestino',
                                sPropietario='$sPropietario',
                                sFirmanteOrigen='$sFirmanteOrigen',
                                sFirmanteDestino='$sFirmanteDestino',
                                sTipo='$sTipo'";
                }else{
                        $sql= "update a_controlacarreo set
                                sMaterial='$sMaterial',
                                sOrigen='$sOrigen',
                                sDestino='$sDestino',
                                sPropietario='$sPropietario',
                                sFirmanteOrigen='$sFirmanteOrigen',
                                sFirmanteDestino='$sFirmanteDestino',
                                sTipo='$sTipo'

                                where

                                sContrato='".$this->hsContrato->Value."' and
                                dIdFecha='".$this->hdIdFecha->Value."' and
                                sNumeroOrden='".$this->hsNumeroOrden->Value."' and
                                sIdTurno='".$this->hsIdTurno->Value."' and
                                sIdConvenio='".$this->hsIdConvenio->Value."' and
                                sNumeroReporte='".$this->hsNumeroReporte->Value."' and
                                iIdAcarreo='$iIdAcarreo'";
                }
                mysql_query($sql);
                if(mysql_error()){
                        $this->Memo1->Text = mysql_error();
                }else{
                        $this->Memo1->Text = "";
                }
                $this->Query1->setActive(false);
                $this->Query1->setFilter(
                          " sContrato='".$this->hsContrato->Value."'
                          and sNumeroOrden='".$this->hsNumeroOrden->Value."'
                          and sIdConvenio='".$this->hsIdConvenio->Value."'
                          and dIdFecha='".$this->hdIdFecha->Value."'
                          and sNumeroReporte='".$this->hsNumeroReporte->Value."'
                          and sIdTurno='".$this->hsIdTurno->Value."'"
                );
                $this->Query1->setActive(true);


               }

               function frmControlAcarreoBeforeShow($sender, $params)
               {
                  global $sContrato,$_REQUEST;
                  global $_SESSION,$Usuario,$Clave,$Servidor;


                        $this->db->setConnected(false);
                        $this->db->setDatabaseName($_SESSION['database']);
                        $this->db->setUserName($Usuario);
                        $this->db->setUserPassword($Clave);
                        $this->db->setHost($Servidor);
                        $this->db->setConnected(true);

                        if(isset($_REQUEST["sContrato"]) and $_REQUEST["sContrato"]!="")
                                $this->hsContrato->Value = $_REQUEST["sContrato"] ;/*'425027849';*/
                        if(isset($_REQUEST["sNumeroOrden"]) and $_REQUEST["sNumeroOrden"]!="")
                                $this->hsNumeroOrden->Value=$_REQUEST["sNumeroOrden"];/*'JAGUARIN';*/
                        if(isset($_REQUEST["sIdTurno"]) and $_REQUEST["sIdTurno"]!="")
                                $this->hsIdTurno->Value=$_REQUEST["sIdTurno"];/*'A';*/
                        if(isset($_REQUEST["sNumeroReporte"]) and $_REQUEST["sNumeroReporte"]!="")
                                $this->hsNumeroReporte->Value=$_REQUEST["sNumeroReporte"];/*'JAGUARIN-052';*/
                        if(isset($_REQUEST["dIdFecha"]) and $_REQUEST["dIdFecha"]!="")
                                $this->hdIdFecha->Value=$_REQUEST["dIdFecha"];/*'2008-04-30';*/
                        if(isset($_REQUEST["sIdConvenio"]) and $_REQUEST["sIdConvenio"]!="")
                                $this->hsIdConvenio->Value=$_REQUEST["sIdConvenio"];/*'AC-01';*/

                        $this->Query1->setActive(false);
                        $this->Query1->setFilter(
                                " sContrato='".$this->hsContrato->Value."'
                                and sNumeroOrden='".$this->hsNumeroOrden->Value."'
                                and sIdConvenio='".$this->hsIdConvenio->Value."'
                                and dIdFecha='".$this->hdIdFecha->Value."'
                                and sNumeroReporte='".$this->hsNumeroReporte->Value."'
                                and sIdTurno='".$this->hsIdTurno->Value."'"
                        );
                        $this->Query1->setActive(true);

                        $this->Query2->setActive(false);
                        $this->Query2->setActive(true);

                        $this->qryGeneral->setActive(false);
                        $this->qryGeneral->setFilter(
                                " sContrato='".$this->hsContrato->Value."'
                                and sNumeroOrden='".$this->hsNumeroOrden->Value."'
                                and sIdConvenio='".$this->hsIdConvenio->Value."'
                                and dIdFecha='".$this->hdIdFecha->Value."'
                                and sNumeroReporte='".$this->hsNumeroReporte->Value."'
                                and sIdTurno='".$this->hsIdTurno->Value."'"
                        );
                        $this->qryGeneral->setActive(true);

                        $sql = "select * from a_medidasxviaje";
                        $rs = mysql_query($sql);
                        unset($it);
                        while($row=mysql_fetch_array($rs)){
                                $it[$row["iIdMedida"]]=$row["dUnidad"] . " ".$row["mDescripcion"];
                        }
                        $this->iIdMedida->setItems($it);

               }

               function GridAcarreosJSClick($sender, $params)
               {

               ?>
                    GridAcarreos.getSelectionModel().iterateSelection
                    (    function(index)
                         {
                          var Tabla      = GridAcarreos.getTableModel();

                          document.getElementById('sMaterial').value=Tabla.getValue(1, index);
                          document.getElementById('sOrigen').value=Tabla.getValue(2, index);
                          document.getElementById('sDestino').value=Tabla.getValue(3, index);
                          document.getElementById('sPropietario').value=Tabla.getValue(6, index);
                          document.getElementById('sFirmanteDestino').value=Tabla.getValue(5, index);
                          document.getElementById('sFirmanteOrigen').value=Tabla.getValue(4, index);
                          document.getElementById('sTipo').value=Tabla.getValue(0, index);
                          document.getElementById('hiIdAcarreo').value=Tabla.getValue(7, index);
                          llenarGrid(index);
                         }
                    );

                    /*deshabilitar controles*/
                    deshabilitar(true);
                    deshabilitarv(true);
                    return false;

               <?php

               }

               function cmdModificarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                 deshabilitar(false);
                 deshabilitarv(true);
                 document.getElementById("hiOpcion").value = "modificar";
                 return false;
               <?php

               }

               function cmdAgregarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                 deshabilitar(false);
                 deshabilitarv(true);
                 document.getElementById("hiOpcion").value = "agregar";
                 return false;
               <?php

               }
               function dumpJavascript(){
                echo "
                        function deshabilitar(si){
                          document.getElementById('cmdAgregar').disabled=!si;
                          document.getElementById('cmdModificar').disabled=!si;
                          document.getElementById('cmdEliminar').disabled=!si;
                          document.getElementById('cmdAceptar').disabled=si;
                          document.getElementById('cmdCancelar').disabled=si;
                          document.getElementById('cmdImprimir').disabled=!si;

                          document.getElementById('sMaterial').disabled=si;
                          document.getElementById('sOrigen').disabled=si;
                          document.getElementById('sDestino').disabled=si;
                          document.getElementById('sPropietario').disabled=si;
                          document.getElementById('sFirmanteDestino').disabled=si;
                          document.getElementById('sFirmanteOrigen').disabled=si;
                          document.getElementById('sTipo').disabled=si;
                        }
                ";
                echo "
                        function deshabilitarv(si){
                          document.getElementById('cmdAgregarV').disabled=!si;
                          document.getElementById('cmdModificarV').disabled=!si;
                          document.getElementById('cmdEliminarV').disabled=!si;
                          document.getElementById('cmdAceptarV').disabled=si;
                          document.getElementById('cmdCancelarV').disabled=si;

                          document.getElementById('iIdMedida').disabled=si;
                          document.getElementById('dCantidadViajes').disabled=si;
                        }
                ";
                echo "function llenarGrid(i){
                    /*llenar el grid de viajes*/
                    var gen = document.getElementById('hiIdAcarreo').value;

                    //Obtenemos el total de elementos encontrados en el dbgrid General
                    var totalFilas=dbgGeneral.getTableModel().getRowCount();
                    var rowData = [];
                    var tieneDatos  = false;

                    //Se van a asignar uno a uno los valores que sean igual al generador
                    for (i=0;i<totalFilas;i++){
                        var gridGen= dbgGeneral.getTableModel().getValue(2,i);
                        if (gridGen==gen){
                                 tieneDatos = true;
                                 //obtencion de valores del dbgrid general
                                 var iIdViaje=dbgGeneral.getTableModel().getValue(0,i);
                                 var iIdMedida=dbgGeneral.getTableModel().getValue(1,i);
                                 var iIdAcarreo=dbgGeneral.getTableModel().getValue(2,i);
                                 var dCantidadViajes=dbgGeneral.getTableModel().getValue(3,i);

                                 //Colocacion de valores al dbgrid dbgViajes
                                 rowData.push([iIdViaje,iIdMedida,iIdAcarreo,dCantidadViajes]);
                                 var oData = rowData;
                                 dbgViajes.getTableModel().originalData=oData;
                                 dbgViajes.getTableModel().setData(rowData);

                        }

                    }
                    if(!tieneDatos){
                            //primero limpiar el grid si no se encontraron coincidencias
                            rowData.push(['','','','']);
                            var oData = rowData;
                            dbgViajes.getTableModel().originalData=oData;
                            dbgViajes.getTableModel().setData(rowData);
                    }

                }  ";
                echo "function panels(panel){
                        if (panel!=1){
                                    document.getElementById('Panel2_outer').style.visibility='visible';
                                    document.getElementById('Panel1_outer').style.visibility='hidden';
                                    document.getElementById('cmdMostrarControlAcarreo').disabled=false;
                                    document.getElementById('cmdMostrarViajes').disabled=true;
                        }else{
                                    document.getElementById('Panel1_outer').style.visibility='visible';
                                    document.getElementById('Panel2_outer').style.visibility='hidden';
                                    document.getElementById('cmdMostrarControlAcarreo').disabled=true;
                                    document.getElementById('cmdMostrarViajes').disabled=false;
                        }
                }";
               }

        }

        global $application;

        global $frmControlAcarreo;

        //Creates the form
        $frmControlAcarreo=new frmControlAcarreo($application);

        //Read from resource file
        $frmControlAcarreo->loadResource(__FILE__);

        //Shows the form
        $frmControlAcarreo->show();

?>
<script>
deshabilitar(true);
deshabilitarv(true);
llenarGrid(1);
panels(document.getElementById("hPanel").value);
</script>
