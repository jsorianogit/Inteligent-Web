<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("jsval/formvalidator.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require_once("fnUtilerias.php");
        require_once("mysql.inc.php");
        // $sContrato='425027849';
        // $sIdUsuario = 'IJESUS';
        //Class definition
        class frmInsumos extends Page
        {
               public $txtBusca = null;
               public $Buscar = null;
               public $Panel1 = null;
               public $imprimir = null;
               public $cmdImprimir = null;
               public $sIdAlmacen = null;
               public $Label20 = null;
               public $sUbicacion = null;
               public $Label19 = null;
               public $dStockMax = null;
               public $dStockMin = null;
               public $dExistencias = null;
               public $Label18 = null;
               public $Label17 = null;
               public $Label11 = null;
               public $Label16 = null;
               public $dPorcentaje = null;
               public $Memo1 = null;
               public $sOperacion = null;
               public $hsIdInsumo = null;
               public $sTipoActividad = null;
               public $dVentaMN = null;
               public $qryInsumos = null;
               public $dNuevoPrecio = null;
               public $sIdGrupo = null;
               public $sIdFase = null;
               public $dCantidad = null;
               public $sMedida = null;
               public $dVentaDLL = null;
               public $dCostoDLL = null;
               public $dCostoMN = null;
               public $dFechaInicio = null;
               public $mDescripcion = null;
               public $sIdInsumo = null;
               public $Label14 = null;
               public $Label13 = null;
               public $Label12 = null;
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
               public $cmdEliminar = null;
               public $cmdCancelar = null;
               public $cmdAceptar = null;
               public $cmdModificar = null;
               public $cmdNuevo = null;
               public $ddinsumos1 = null;
               public $dsinsumos1 = null;
               public $dbintelcode1 = null;
               function imprimirJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function imprimirJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function imprimirJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtBuscaJSKeyUp($sender, $params)
               {
               ?>   //Add your javascript code here
                    var filas = ddinsumos1.getTableModel().getRowCount();
                    if (filas == 0)
                    {   alert("No eixten Insumos !");
                    }
                    else
                    {   var texto = document.getElementById("txtBusca").value.toUpperCase();
                        MuestraCatalogo(texto);
                    }
                    return false;
               <?php
               }

               function txtBuscaJSKeyPress($sender, $params)
               {
               ?>  //Add your javascript code here
                    if(event.keyCode==9 )
                    {  document.getElementById("dCantidad").focus();
                       return false;
                    }
               <?php
               }

               function txtBuscaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtBuscaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdImprimirJSClick($sender, $params)
               {

               global $sContrato;
               global $_SESSION;
               ?>
               //Add your javascript code here
                var ur ="";
                 ur = "../reporte.php";
                 ur = ur + "?reportesPath=stock";
                 if(document.getElementById("imprimir").value=="min" )
                    ur = ur + "&nombreReporte=stockMin";
                 if(document.getElementById("imprimir").value=="max" )
                    ur = ur + "&nombreReporte=stockMax";
                 if(document.getElementById("imprimir").value=="todos" )
                    ur = ur + "&nombreReporte=stock";
                 ur = ur + "&sContrato=" + "<?php echo $sContrato; ?>";
                 ur = ur + "&sIdAlmacen=" + document.getElementById("sIdAlmacen").value;
                 var status = window.open(ur,"_blank","fullscreen=no,menubar=no,status=no,titlebar=no,toolbar=no,scroolbar=yes");
                 return false;
                 <?php

               }

               function sIdAlmacenChange($sender, $params)
               {
                        $sIdAlmacen = $this->sIdAlmacen->getItemIndex();
                        $this->qryInsumos->setActive(false);
                        $this->qryInsumos->setFilter("sContrato='$sContrato' and sIdAlmacen='$sIdAlmacen'");
                        $this->qryInsumos->setActive(true);


               }


               function sUbicacionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sUbicacionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sUbicacionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dStockMaxJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dStockMaxJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dStockMaxJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dStockMinJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dStockMinJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dStockMinJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }




               function dPorcentajeJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dPorcentajeJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dPorcentajeJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdEliminarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  if(!confirm("Desea eliminar el registro seleccionado ? "))
                     return false;
                  else
                     return true;
               <?php

               }

               function cmdEliminarClick($sender, $params)
               {
                  global $sContrato;
         $rs = mysql_query("select sIdInsumo from recursosanexo where sIdInsumo=sIdInsumo='".($this->hsIdInsumo->getValue())."' and sContrato='$sContrato'");
         if($rw = mysql_fetch_array($rs)){
            $existe=true;
         }
         $rs = mysql_query("select sIdInsumo from recursosanexosnuevos where sIdInsumo=sIdInsumo='".($this->hsIdInsumo->getValue())."' and sContrato='$sContrato'");
         if($rw = mysql_fetch_array($rs)){
            $existe=true;
         }
         if(!$existe){
                     mysql_query("delete from insumos where sContrato='$sContrato'
                                  and sIdInsumo='".$oldsIdInsumos = $this->hsIdInsumo->getValue()."'");
                     if(mysql_error())
                        $this->Memo1->Text=mysql_error();
                     else
                        $this->Memo1->Text="";
         }else{
            $this->Memo1->Text="Existen tablas que estan asociados con este registro, no se puede eliminar";
         }
               }

               function frmInsumosBeforeShow($sender, $params)
               {
                 global $sContrato,$_SESSION,$Usuario,$Clave,$Servidor;
                 $this->dbintelcode1->setConnected(false);
                 $this->dbintelcode1->setDatabaseName($_SESSION['database']);
                 $this->dbintelcode1->setUserName($Usuario);
                 $this->dbintelcode1->setUserPassword($Clave);
                 $this->dbintelcode1->setHost($Servidor);
                 $this->dbintelcode1->setConnected(true);

               }

               function cmdAceptarClick($sender, $params)
               {
                  global $sContrato;
                  $sIdInsumo = strtoupper($this->sIdInsumo->getText());
                  $oldsIdInsumos = strtoupper($this->hsIdInsumo->getValue());
                  $sTipoActividad = ($this->sTipoActividad->getItemIndex()<0)?"":$this->sTipoActividad->getItemIndex();
                  $mDescripcion = strtoupper($this->mDescripcion->Text);
                  $dFechaInicio = formatoFechaPer($this->dFechaInicio->Text,"Y-m-d");
                  $dCostoMN = ($this->dCostoMN->getText()=="")?"0.00":$this->dCostoMN->getText();
                  $dCostoDLL = ($this->dCostoDLL->getText()=="")?"0.00":$this->dCostoMN->getText();
                  $dVentaMN = ($this->dVentaMN->getText()=="")?"0.00":$this->dVentaMN->getText();
                  $dVentaDLL = ($this->dVentaDLL->getText()=="")?"0.00":$this->dVentaDLL->getText();
                  $sMedida   = $this->sMedida->getText();
                  $dCantidad = ($this->dCantidad->getText()=="")?"0":$this->dCantidad->getText();
                  $dPorcentaje = ($this->dPorcentaje->getText()=="")?"0":$this->dPorcentaje->getText();


                  $sIdFase      = ($this->sIdFase->getItemIndex()<0)?"":$this->sIdFase->getItemIndex();
                  $sIdGrupo     = ($this->sIdGrupo->getItemIndex()<0)?"":$this->sIdGrupo->getItemIndex();
                  $dExistencias = ($this->dExistencias->getText()=="")?"0":$this->dExistencias->getText();
                  $dStockMin    = ($this->dStockMin->getText()=="")?"0":$this->dStockMin->getText();
                  $dStockMax    = ($this->dStockMax->getText()=="")?"0":$this->dStockMax->getText();

                  $sUbicacion    = ($this->sUbicacion->getText()=="")?"0":$this->sUbicacion->getText();
                  $sIdAlmacen     = ($this->sIdAlmacen->getItemIndex()<0)?"":$this->sIdAlmacen->getItemIndex();


                  $dNuevoPrecio=$this->dNuevoPrecio->getText();
                  $sOperacion = $this->sOperacion->getValue();
                  if($sOperacion=="agregar"){
                     $sql = "insert into insumos set
                     sContrato='$sContrato',
                     sIdInsumo='$sIdInsumo',
                     sTipoActividad='$sTipoActividad',
                     mDescripcion='$mDescripcion',
                     dFechaInicio='$dFechaInicio',
                     dCostoMN='$dCostoMN',
                     dCostoDLL='$dCostoDLL',
                     dVentaMN='$dVentaMN',
                     dVentaDLL='$dVentaDLL',
                     sMedida='$sMedida',
                     dCantidad='$dCantidad',
                     sIdFase='$sIdFase',
                     dPorcentaje='$dPorcentaje',
                     sIdGrupo='$sIdGrupo',
                     dNuevoPrecio='$dNuevoPrecio',
                     dExistencias='$dExistencias',
                     dStockMin='$dStockMin',
                     dStockMax='$dStockMax',
                     sUbicacion='$sUbicacion',
                     sIdAlmacen='$sIdAlmacen' ";
                     mysql_query($sql);
                     if(mysql_error())
                        $this->Memo1->Text=mysql_error();
                     else
                        $this->Memo1->Text="";
                  }elseif($sOperacion=="modificar"){
                     $sql ="update insumos set
                     sIdInsumo='$sIdInsumo',
                     sTipoActividad='$sTipoActividad',
                     mDescripcion='$mDescripcion',
                     dFechaInicio='$dFechaInicio',
                     dCostoMN='$dCostoMN',
                     dCostoDLL='$dCostoDLL',
                     dVentaMN='$dVentaMN',
                     dVentaDLL='$dVentaDLL',
                     sMedida='$sMedida',
                     dCantidad='$dCantidad',
                     sIdFase='$sIdFase',
                     dPorcentaje='$dPorcentaje',
                     sIdGrupo='$sIdGrupo',
                     dNuevoPrecio='$dNuevoPrecio',
                     dExistencias='$dExistencias',
                     dStockMin='$dStockMin',
                     dStockMax='$dStockMax',
                     sUbicacion='$sUbicacion',
                     sIdAlmacen='$sIdAlmacen'
                     where sContrato='$sContrato'
                     and sIdInsumo='$oldsIdInsumos' ";

                     mysql_query("begin");

                     mysql_query("update recursosanexosnuevos set sIdInsumo='$sIdInsumos' where sContrato='$sContrato' and sIdInsumo='$oldsIdInsumos'");
                     if(mysql_error()){$error=true; $this->Memo1->Text=mysql_error(); }

                     mysql_query("update recursosanexo set sIdInsumo='$sIdInsumos' where sContrato='$sContrato' and sIdInsumo='$oldsIdInsumos'");
                     if(mysql_error()){$error=true; $this->Memo1->Text=mysql_error(); }

                     mysql_query("update bitacoradetallesalida set sIdInsumo='$sIdInsumos' where sContrato='$sContrato' and sIdInsumo='$oldsIdInsumos'");
                     if(mysql_error()){$error=true; $this->Memo1->Text=mysql_error(); }

                     mysql_query("update bitacoradeentrada set sIdInsumo='$sIdInsumos' where sContrato='$sContrato' and sIdInsumo='$oldsIdInsumos'");
                     if(mysql_error()){$error=true; $this->Memo1->Text=mysql_error(); }

                     mysql_query("update anexo_psolicitud set sIdInsumo='$sIdInsumos' where sContrato='$sContrato' and sIdInsumo='$oldsIdInsumos'");
                     if(mysql_error()){$error=true; $this->Memo1->Text=mysql_error(); }

                     mysql_query("update anexo_prequisicion set sIdInsumo='$sIdInsumos' where sContrato='$sContrato' and sIdInsumo='$oldsIdInsumos'");
                     if(mysql_error()){$error=true; $this->Memo1->Text=mysql_error(); }

                     mysql_query("update anexo_ppedido set sIdInsumo='$sIdInsumos' where sContrato='$sContrato' and sIdInsumo='$oldsIdInsumos'");
                     if(mysql_error()){$error=true; $this->Memo1->Text=mysql_error(); }

                     mysql_query("update recursosanexo set sIdInsumo='$sIdInsumos' where sContrato='$sContrato' and sIdInsumo='$oldsIdInsumos'");
                     if(mysql_error()){$error=true; $this->Memo1->Text=mysql_error(); }

                     mysql_query("update recursosanexosnuevos set sIdInsumo='$sIdInsumos' where sContrato='$sContrato' and sIdInsumo='$oldsIdInsumos'");
                     if(mysql_error()){$error=true; $this->Memo1->Text=mysql_error(); }

                     mysql_query($sql);
                     if(mysql_error()){$error=true; $this->Memo1->Text=mysql_error(); }

                     if (!$error)
                        mysql_query("commit");
                     else
                        mysql_query("rollback");

                  }




                  $this->qryInsumos->setActive(false);
                  $this->qryInsumos->setFilter("sContrato='$sContrato'");
                  $this->qryInsumos->setActive(true);


               }

               function cmdCancelarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                 deshabilitar(true);
                 return false;
               <?php

               }

               function cmdAceptarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  if(document.getElementById("sIdAlmacen").value == null || document.getElementById("sIdAlmacen").value == ""){
                     alert("Debe seleccionar un almacen");
                     return false;
                  }
                  else
                     return true;
               <?php

               }

               function cmdModificarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                deshabilitar(false);
                document.getElementById("sOperacion").value='modificar';
                return false;
               <?php

               }

               function cmdNuevoJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  deshabilitar(false);
                  limpiar();
                  document.getElementById("sIdInsumo").focus;
                  document.getElementById("sOperacion").value='agregar';
                  return false;
               <?php

               }

               function ddinsumos1JSClick($sender, $params)
               {
               ?>
                  //deshabilitar(true);
                  ddinsumos1.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = ddinsumos1.getTableModel();


                        document.getElementById("sIdInsumo").value=tableModel.getValue(0, index);
                        document.getElementById("hsIdInsumo").value=tableModel.getValue(0, index);

                        document.getElementById("sTipoActividad").value=tableModel.getValue(1, index);

                        document.getElementById("mDescripcion").value=tableModel.getValue(2, index);

                        document.getElementById("f-calendar-field-1").value=tableModel.getValue(3, index);

                        document.getElementById("dCostoMN").value=tableModel.getValue(4, index);
                        document.getElementById("dCostoDLL").value=tableModel.getValue(5, index);
                        document.getElementById("dVentaMN").value=tableModel.getValue(6, index);
                        document.getElementById("dVentaDLL").value=tableModel.getValue(7, index);
                        document.getElementById("sMedida").value=tableModel.getValue(8, index);
                        document.getElementById("dCantidad").value=tableModel.getValue(9, index);

                        //document.getElementById("sIdFase").value=tableModel.getValue(10, index);



                        document.getElementById("sIdGrupo").value = tableModel.getValue(11, index);


                        document.getElementById("dNuevoPrecio").value=tableModel.getValue(12, index);

                        document.getElementById("dPorcentaje").value=tableModel.getValue(13, index);

                        document.getElementById("dExistencias").value=tableModel.getValue(14, index);

                        document.getElementById("dStockMin").value=tableModel.getValue(15, index);

                        document.getElementById("dStockMax").value=tableModel.getValue(16, index);

                        document.getElementById("sUbicacion").value=tableModel.getValue(17, index);
                        document.getElementById("sIdAlmacen").value=tableModel.getValue(18, index);



                     }

                  );
                 return false;
               <?php
               }

               function dVentaDLLJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dVentaDLLJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dVentaDLLJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCantidadJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCantidadJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCantidadJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dInstaladoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dInstaladoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dInstaladoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdFaseJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdFaseJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdFaseJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdGrupoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdGrupoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdGrupoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dNuevoPrecioJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dNuevoPrecioJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dNuevoPrecioJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sMedidaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sMedidaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sMedidaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dVentaMNJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dVentaMNJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dVentaMNJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCostoDLLJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCostoDLLJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCostoDLLJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCostoMNJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCostoMNJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCostoMNJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function mDescripcionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function mDescripcionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function mDescripcionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoActividadJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoActividadJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoActividadJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdInsumoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdInsumoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdInsumoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function frmInsumosShow($sender, $params)
               {
                        global $sContrato,$_SESSION;
                        //global $sIdUsuario;

                        $sql = "select sIdFamilia,mDescripcion from familias";
                        $rs = mysql_query($sql);
                        unset($it);
                        while($rw = mysql_fetch_array($rs)){
                           $it[$rw['sIdFamilia']]=$rw['mDescripcion'];
                        }
                        $this->sIdGrupo->setItems($it);

                        $sql = "select sIdFase,sDescripcion from fases where sContrato='$sContrato'";
                        $rs = mysql_query($sql);
                        unset($it);
                        while($rw = mysql_fetch_array($rs)){
                           $it[$rw['sIdFase']]=$rw['sDescripcion'];
                        }
                        $this->sIdFase->setItems($it);
                        //".$_SESSION["ssUsuario"]."
                        //$sql = "select sIdAlmacen,sDescripcion from almacenes";
                        $sql = "select al.sIdAlmacen,al.sDescripcion from almacenes al
                                 inner join almacenxusuarios a on (
                                      al.sIdAlmacen=a.sIdAlmacen
                                      and a.sIdUsuario='".$_SESSION["ssUsuario"]."'
                                 ) where a.sContrato='$sContrato'";
                        $rs = mysql_query($sql);
                        unset($it);
                        $it[""]="";
                        while($rw = mysql_fetch_array($rs)){
                           $it[$rw['sIdAlmacen']]=$rw['sDescripcion'];
                        }
                        $this->sIdAlmacen->setItems($it);

                        unset($it);
                        $it['Material']="Material";
                        $it['Consumible']="Consumible";
                        $it['Auxiliares']="Auxiliares";
                        $this->sTipoActividad->setItems($it);
                        if($this->dFechaInicio->getText()=="")
                           $this->dFechaInicio->setText(date("d/m/Y"));

                        $sIdAlmacen = $this->sIdAlmacen->getItemIndex();
                        $this->qryInsumos->setActive(false);
                        $this->qryInsumos->setFilter("sContrato='$sContrato' and sIdAlmacen='$sIdAlmacen'");
                        $this->qryInsumos->setActive(true);

               }
               function dumpJavascript(){
                  echo 'function deshabilitar(B){
                           document.getElementById("sIdInsumo").disabled=B;
                           document.getElementById("sTipoActividad").disabled=B;
                           document.getElementById("mDescripcion").disabled=B;
                           document.getElementById("f-calendar-field-1").disabled=B;
                           document.getElementById("dCostoMN").disabled=B;
                           document.getElementById("dCostoDLL").disabled=B;
                           document.getElementById("dVentaMN").disabled=B;
                           document.getElementById("dVentaDLL").disabled=B;
                           document.getElementById("sMedida").disabled=B;
                           document.getElementById("dCantidad").disabled=B;
                           //document.getElementById("sIdFase").disabled=B;
                           document.getElementById("sIdGrupo").disabled=B;
                           document.getElementById("dNuevoPrecio").disabled=B;
                           document.getElementById("dPorcentaje").disabled=B;
                           document.getElementById("dExistencias").disabled=B;
                           document.getElementById("dStockMin").disabled=B;
                           document.getElementById("dStockMax").disabled=B;
                           document.getElementById("sUbicacion").disabled=B;
                           //document.getElementById("sIdAlmacen").disabled=B;

                           document.getElementById("cmdNuevo").disabled=!B;
                           document.getElementById("cmdModificar").disabled=!B;
                           document.getElementById("cmdAceptar").disabled=B;
                           document.getElementById("cmdCancelar").disabled=B;
                           document.getElementById("cmdEliminar").disabled=!B;
                        }';
                      echo 'function limpiar(){
                           document.getElementById("sIdInsumo").value="";
                           document.getElementById("hsIdInsumo").value="";
                           document.getElementById("mDescripcion").value="";
                           document.getElementById("dCostoMN").value="0";
                           document.getElementById("dCostoDLL").value="0";
                           document.getElementById("dVentaMN").value="0";
                           document.getElementById("dVentaDLL").value="0";
                           document.getElementById("sMedida").value="";
                           document.getElementById("dCantidad").value="0";
                           document.getElementById("dNuevoPrecio").value="0";
                           document.getElementById("dPorcentaje").value="0";
                           document.getElementById("dExistencias").value="0";
                           document.getElementById("dStockMin").value="0";
                           document.getElementById("dStockMax").value="0";
                           document.getElementById("sUbicacion").value="";
                     }';
                     echo 'function resaltar(){
                          document.getElementById("cmdNuevo").style.backgroundColor = "";
                          document.getElementById("cmdModificar").style.backgroundColor = "";
                          document.getElementById("cmdAceptar").style.backgroundColor = "";
                          document.getElementById("cmdCancelar").style.backgroundColor = "";
                          document.getElementById("cmdEliminar").style.backgroundColor = "";
                          document.getElementById("cmdImprimir").style.backgroundColor = "";
                          document.getElementById("txBusca").style.backgroundColor = "";
                          document.getElementById("imprimir").style.backgroundColor = "";
                          document.getElementById("f-calendar-field-1").style.backgroundColor = "";
                          return false;
                   }';

                   echo 'function MuestraCatalogo(letras)
                      {
                           var total = letras.length;
                           var totalFilas = ddinsumos1.getTableModel().getRowCount();
                           var rowData = [];
                           for (i=0;i<totalFilas;i++)
                           {   palabra    = ddinsumos1.getTableModel().getValue(2,i);
                               var separa = palabra.split("");
                               var frase  = "";
                               var aux    = "";
                               var final  = "";
                               for (x=0;x<total;x++)
                               {   aux = final;
                                   frase = separa[x];
                                   final = aux + frase;
                               }
                               if (final==letras)
                               {
                                    document.getElementById("sIdInsumo").value          = ddinsumos1.getTableModel().getValue(0, i);
                                    document.getElementById("hsIdInsumo").value         = ddinsumos1.getTableModel().getValue(0, i);
                                    document.getElementById("sTipoActividad").value     = ddinsumos1.getTableModel().getValue(1, i);
                                    document.getElementById("mDescripcion").value       = ddinsumos1.getTableModel().getValue(2, i);
                                    document.getElementById("f-calendar-field-1").value = ddinsumos1.getTableModel().getValue(3, i);
                                    document.getElementById("dCostoMN").value           = ddinsumos1.getTableModel().getValue(4, i);
                                    document.getElementById("dCostoDLL").value          = ddinsumos1.getTableModel().getValue(5, i);
                                    document.getElementById("dVentaMN").value           = ddinsumos1.getTableModel().getValue(6, i);
                                    document.getElementById("dVentaDLL").value          = ddinsumos1.getTableModel().getValue(7, i);
                                    document.getElementById("sMedida").value            = ddinsumos1.getTableModel().getValue(8, i);
                                    document.getElementById("dCantidad").value          = ddinsumos1.getTableModel().getValue(9, i);
                                    //document.getElementById("sIdFase").value          = ddinsumos1.getTableModel().getValue(10,i);
                                    document.getElementById("sIdGrupo").value           = ddinsumos1.getTableModel().getValue(11,i);
                                    document.getElementById("dNuevoPrecio").value       = ddinsumos1.getTableModel().getValue(12,i);
                                    document.getElementById("dPorcentaje").value        = ddinsumos1.getTableModel().getValue(13,i);
                                    document.getElementById("dExistencias").value       = ddinsumos1.getTableModel().getValue(14,i);
                                    document.getElementById("dStockMin").value          = ddinsumos1.getTableModel().getValue(15,i);
                                    document.getElementById("dStockMax").value          = ddinsumos1.getTableModel().getValue(16,i);
                                    document.getElementById("sUbicacion").value         = ddinsumos1.getTableModel().getValue(17,i);
                                    document.getElementById("sIdAlmacen").value         = ddinsumos1.getTableModel().getValue(18,i);
                                    i = totalFilas;
                               }

                           }
                           return false;
                       }';
               }

        }

        global $application;

        global $frmInsumos;

        //Creates the form
        $frmInsumos=new frmInsumos($application);

        //Read from resource file
        $frmInsumos->loadResource(__FILE__);

        //Shows the form
        $frmInsumos->show();

?>
<script>
deshabilitar(true);
resaltar();
</script>
