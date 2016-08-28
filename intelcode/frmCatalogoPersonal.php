<?php
//Includes
//require_once("vcl/vcl.inc.php");
require_once("rpcl/rpcl.inc.php");
//require("mysql.inc.php");
use_unit("comctrls.inc.php");
use_unit("buttons.inc.php");
use_unit("imglist.inc.php");
use_unit("db.inc.php");
use_unit("dbtables.inc.php");
use_unit("dbgrids.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("menus.inc.php");

require_once("Connection.php");
//        $sUsuario=$_SESSION["ssUsuario"];
//        $sIdConvenio =$sIdConvenioAct;
//        $sContrato = '425027849';
//        Class definition
class frmCatalogoPersonal extends Page
{
   public $Panel2 = null;
   public $cmdModificar = null;
   public $Panel1 = null;
   public $Label7 = null;
   public $Label8 = null;
   public $Label5 = null;
   public $txtItem = null;
   public $memoDescribe = null;
   public $Label6 = null;
   public $Label9 = null;
   public $txtCostoDLL = null;
   public $Label10 = null;
   public $Label11 = null;
   public $txtVentaMN = null;
   public $txtVentaDLL = null;
   public $Label12 = null;
   public $Label13 = null;
   public $txtJornada = null;
   public $FechaI = null;
   public $FechaF = null;
   public $Distribuye = null;
   public $Jornada = null;
   public $CboTipo = null;
   public $CboDistribuye = null;
   public $Prorrateo = null;
   public $CboProrrateo = null;
   public $Label1 = null;
   public $Label2 = null;
   public $Label3 = null;
   public $Label4 = null;
   public $cmdAgregar = null;
   public $cmdEliminar = null;
   public $cmdAceptar = null;
   public $cmdCancelar = null;
   public $cmdImprimir = null;
   public $txtPersonal = null;
   public $txtMedida = null;
   public $GridTipos = null;
   public $HiOldIdP = null;
   public $HiOpcion = null;
   public $txtCantidad = null;
   public $txtCostoMN = null;
   public $HiOldIdE = null;
   public $base = null;
   public $SourPozo = null;
   public $QryPozo = null;
    public $PopupMenu1 = null;
   function GridTiposJSRowChanged($sender, $params)
   {
      ?>                //Add your javascript code here
                   Selecciona();
                   return false;
      <?php
   }

   function frmCatalogoPersonalBeforeShow($sender, $params)
   {
      global $Connection;
      try
      {
//         $Connection->base->setConnected(false);
//         $Connection->base->setConnected(true);
          $Connection->conectar();
         $sql = "select sIdPersonal, iItemOrden, sDescripcion,
                                  sIdTipoPersonal, sMedida,
                                  format(dCantidad,2) as dCantidad,
                                  dCostoMN, dCostoDLL, dVentaMN,
                                  dVentaDLL,
                                  date_format(dFechaInicio,'%d/%m/%Y') as dFechaInicio,
                                  date_format(dFechaFinal,'%d/%m/%Y') as dFechaFinal,
                                  lProrrateo, iJornada, lDistribuye
                           from personal
                           where  sContrato = '" . $Connection->global_sContrato . "'";

         $this->QryPozo->setActive(false);
         $this->QryPozo->setSQL($sql);
         $this->QryPozo->Open();

         $sql = "select sIdTipoPersonal, sDescripcion
                           from tiposdepersonal";

         $Connection->Query1->setActive(false);
         $Connection->Query1->setSQL($sql);
         $Connection->Query1->Open();

         while( ! $Connection->Query1->EOF)
         {
            $item[$Connection->Query1->Fields['sIdTipoPersonal']] = $Connection->Query1->Fields['sIdTipoPersonal'];
            $Connection->Query1->next();
         }
         $this->CboTipo->setItems($item);
      }catch(Exception $e)
      {
          echo "Error : " . $e->getMessage();
      }

   }

   function GridTiposJSClick($sender, $params)
   {
      ?>               //Add your javascript code here
                    Selecciona();
                    return false;
      <?php
   }

   function cmdAceptarJSClick($sender, $params)
   {
      ?>                //Add your javascript code here
                    var fecha="f-calendar-field-1";
                    ComponerFecha(fecha);
                    var fecha="f-calendar-field-2";
                    ComponerFecha(fecha);
                    return true;
      <?php
   }

   function cmdAceptarClick($sender, $params)
   {
      global $Connection;
      try
      {
//         $Connection->base->setConnected(false);
//         $Connection->base->setConnected(true);
          $Connection->conectar();
         $sPersonal = $this->txtPersonal->Text;
         $sId = $this->txtItem->Text;
         $sDescripcion = $this->memoDescribe->Text;
         $sTipo = $this->CboTipo->getItemIndex();
         $sMedida = $this->txtMedida->Text;
         $sCantidad = $this->txtCantidad->Text;
         $sCostoMN = $this->txtCostoMN->Text;
         $sCostoDLL = $this->txtCostoDLL->Text;
         $sVentaMN = $this->txtVentaMN->Text;
         $sVentaDLL = $this->txtVentaDLL->Text;
         $sFechaI = $this->FechaI->Text;
         $sFechaF = $this->FechaF->Text;
         $sProrrateo = $this->CboProrrateo->getItemIndex();
         $sJornada = $this->txtJornada->Text;
         $sDistribuye = $this->CboDistribuye->getItemIndex();

         $Opcion = $this->HiOpcion->Value;
         $IdOldE = $this->HiOldIdE->Value;
         $IdOldP = $this->HiOldIdP->Value;
         if($Opcion == "Agregar")
         {
            $sql = "insert
                                    into personal
                                        (sContrato, sIdPersonal,
                                         iItemOrden, sDescripcion,
                                         sIdTipoPersonal, sMedida,
                                         dCantidad, dCostoMN,
                                         dCostoDLL, dVentaMN,
                                         dVentaDLL, dFechaInicio,
                                         dFechaFinal, lProrrateo,
                                         iJornada, lDistribuye)
                                    values
                                        ('" . $Connection->global_sContrato . "','$sPersonal',
                                         '$sId','$sDescripcion',
                                         '$sTipo','$sMedida',
                                         '$sCantidad','$sCostoMN',
                                         '$sCostoDLL','$sVentaMN',
                                         '$sVentaDLL','$sFechaI',
                                         '$sFechaF','$sProrrateo',
                                         '$sJornada','$sDistribuye')";

            $Connection->Query1->setActive(false);
            $Connection->Query1->LimitStart = "-1";
            $Connection->Query1->LimitCount = "-1";
            $Connection->Query1->setSQL($sql);
            $Connection->Query1->open();

         }

         if($Opcion == "Modificar")
         {
            $sql = "update personal
                                set
                                    sIdPersonal     = '$sPersonal',
                                    iItemOrden      = '$sId',
                                    sDescripcion    = '$sDescripcion',
                                    sIdTipoPersonal = '$sTipo',
                                    sMedida         = '$sMedida',
                                    dCantidad       = '$sCantidad',
                                    dCostoMN        = '$sCostoMN',
                                    dCostoDLL       = '$sCostoDLL',
                                    dVentaMN        = '$sVentaMN',
                                    dVentaDLL       = '$sVentaDLL',
                                    dFechaInicio    = '$sFechaI',
                                    dFechaFinal     = '$sFechaF',
                                    lProrrateo      = '$sProrrateo',
                                    iJornada        = '$sJornada',
                                    lDistribuye     = '$sDistribuye'
                                where
                                   sIdPersonal    = '$IdOldE'
                                   and sContrato  = '" . $Connection->global_sContrato . "'";
            $Connection->Query1->setActive(false);
            $Connection->Query1->LimitStart = "-1";
            $Connection->Query1->LimitCount = "-1";
            $Connection->Query1->setSQL($sql);
            $Connection->Query1->open();



         }
      }catch(Exception $e)
      {
         echo "Error : " . $e->getMessage();
      }
   }

   function cmdEliminarJSClick($sender, $params)
   {
      ?>               //Add your javascript code here
                    i   = GridTipos.getTableModel().getRowCount();
                    ok  = 0;
                    if (i>0)
                    {   if (!confirm("  Desea ELIMINAR El Personal Seleccionado ?"))
                           ok = 1;
                    }
                    if (ok == 1)
                       return false;
                    else
                       return true;
      <?php
   }

   function cmdEliminarClick($sender, $params)
   {
      global $Connection;
      try{
//          $Connection->base->setConnected(false);
//          $Connection->base->setConnected(true);
           $Connection->conectar();
          $IdOldE = $this->HiOldIdE->Value;
          $IdOldP = $this->HiOldIdP->Value;

          $sql = " delete
                            from personal
                            where     sIdPersonal = '$IdOldE'
                                  and sContrato   = '" . $Connection->global_sContrato . "'";
          $Connection->Query1->setActive(false);
          $Connection->Query1->LimitStart = "-1";
          $Connection->Query1->LimitCount = "-1";
          $Connection->Query1->setSQL($sql);
          $Connection->Query1->open();
      }catch(Exception $e){
        echo "Error : " . $e->getMessage();
      }

   }

   function cmdCancelarJSClick($sender, $params)
   {
      ?>               //Add your javascript code here
                   controlBotones(false);
                   return false;
      <?php
   }

   function cmdModificarJSClick($sender, $params)
   {
      ?>               //Add your javascript code here
                   pozo = document.getElementById("txtPersonal").value;
                   if (pozo == "")
                      alert (" Haga Click en Un Peronal !! ");
                   else
                   {
                        controlBotones(true);
                        document.getElementById("txtPersonal").focus();
                        document.getElementById("HiOpcion").value = "Modificar";
                   }
                   return false;
      <?php
   }

   function cmdAgregarJSClick($sender, $params)
   {
      ?>              //Add your javascript code here
                     controlBotones(true);
                     document.getElementById("txtPersonal").value    = "";
                     document.getElementById("txtItem").value        = "";
                     document.getElementById("memoDescribe").value   = "";
                     document.getElementById("txtMedida").value      = "";
                     document.getElementById("txtCantidad").value    = 0;
                     document.getElementById("txtCostoMN").value     = 0.00;
                     document.getElementById("txtCostoDLL").value    = 0.00;
                     document.getElementById("txtVentaMN").value     = 0.00;
                     document.getElementById("txtVentaDLL").value    = 0.00;
                     document.getElementById("txtJornada").value     = "";
                     document.getElementById("HiOpcion").value       = "Agregar";
                     document.getElementById("txtPersonal").focus();
                 return false;
      <?php
   }

   function cmdImprimirJSClick($sender, $params)
   {

      global $Connection;

      ?>
               //Add your javascript code here

                 var ruta="";

                 ruta = "../reporte.php?";
                 ruta = ruta + "&sContrato=" + "<?php echo $Connection->global_sContrato ;?>";
                 ruta = ruta + "&sIdPersonal=" + document.getElementById("txtPersonal").value;
                // ruta = ruta + "&sFormato="+document.getElementById("sFormato").options[document.getElementById("sFormato").selectedIndex].text;
                 ruta = ruta + "&reportesPath=catalogos";
                 ruta = ruta + "&nombreReporte=rptPersonal";




                 var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no,scroolbar=yes");

                 //var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no");
                 document.getElementById("cmdImprimir").style.width = 40;
                   return false;
      <?php
   }

   function dumpJavascript()
   {
      global $Connection;
      echo 'function controlBotones( habilitar ){
                        if(habilitar){
                           accion = false;
                        }
                        else{
                             accion= true;
                        }
                        document.getElementById("txtPersonal").disabled =accion;
                        document.getElementById("txtItem").disabled =accion;
                        document.getElementById("memoDescribe").disabled =accion;
                        document.getElementById("CboTipo").disabled =accion;
                        document.getElementById("txtMedida").disabled =accion;
                        document.getElementById("txtCantidad").disabled = accion;
                        document.getElementById("txtCostoMN").disabled = accion;
                        document.getElementById("txtCostoDLL").disabled = accion;
                        document.getElementById("txtVentaMN").disabled = accion;
                        document.getElementById("txtVentaDLL").disabled = accion;
                        document.getElementById("txtJornada").disabled = accion;
                        document.getElementById("CboProrrateo").disabled = accion;
                        document.getElementById("CboDistribuye").disabled = accion;
                        document.getElementById("cmdAgregar").disabled =habilitar;
                        document.getElementById("cmdModificar").disabled =habilitar;
                        document.getElementById("cmdEliminar").disabled =habilitar;
                        document.getElementById("cmdAceptar").disabled =accion;
                        document.getElementById("cmdCancelar").disabled =accion;
                        document.getElementById("cmdImprimir").disabled =habilitar;

                        if (habilitar==false){
                                        document.getElementById("cmdAgregar").src="recursos/imagenesMenu/Botones/Symbol-Add.ico";
                                        document.getElementById("cmdModificar").src="recursos/imagenesMenu/Botones/Edit.ico";
                                        document.getElementById("cmdAceptar").src="recursos/imagenesMenu/Botones/_Symbol-Check.ico";
                                        document.getElementById("cmdCancelar").src="recursos/imagenesMenu/Botones/_Undo.ico";
                                        document.getElementById("cmdEliminar").src="recursos/imagenesMenu/Botones/Symbol-Delete.ico";
                                        document.getElementById("cmdImprimir").src="recursos/imagenesMenu/Botones/32px-Crystal_Clear_action_fileprint.ico";
                                }else{
                                        document.getElementById("cmdAgregar").src="recursos/imagenesMenu/Botones/_Symbol-Add.ico";
                                        document.getElementById("cmdModificar").src="recursos/imagenesMenu/Botones/_Edit.ico";
                                        document.getElementById("cmdAceptar").src="recursos/imagenesMenu/Botones/Symbol-Check.ico";
                                        document.getElementById("cmdCancelar").src="recursos/imagenesMenu/Botones/Undo.ico";
                                        document.getElementById("cmdEliminar").src="recursos/imagenesMenu/Botones/_Symbol-Delete.ico";
                                        document.getElementById("cmdImprimir").src="recursos/imagenesMenu/Botones/_32px-Crystal_Clear_action_fileprint.ico";
                                }
                        return false;
                     }';

      echo 'function ResaltarBotones()
                      {
                          document.getElementById("txtPersonal").style.backgroundColor = "";
                          document.getElementById("txtItem").style.backgroundColor = "";
                          document.getElementById("memoDescribe").style.backgroundColor = "";
                          document.getElementById("CboTipo").style.backgroundColor = "";
                          document.getElementById("txtMedida").style.backgroundColor = "";
                          document.getElementById("txtCantidad").style.backgroundColor = "";
                          document.getElementById("txtCostoMN").style.backgroundColor = "";
                          document.getElementById("txtCostoDLL").style.backgroundColor = "";
                          document.getElementById("txtVentaMN").style.backgroundColor = "";
                          document.getElementById("txtVentaDLL").style.backgroundColor = "";
                          document.getElementById("txtJornada").style.backgroundColor = "";
                          document.getElementById("CboProrrateo").style.backgroundColor = "";
                          document.getElementById("CboDistribuye").style.backgroundColor = "";
                          document.getElementById("cmdAgregar").style.backgroundColor = "";
                          document.getElementById("cmdModificar").style.backgroundColor = "";
                          document.getElementById("cmdEliminar").style.backgroundColor = "";
                          document.getElementById("cmdAceptar").style.backgroundColor = "";
                          document.getElementById("cmdCancelar").style.backgroundColor = "";
                          document.getElementById("cmdImprimir").style.backgroundColor = "";
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

      echo 'function Selecciona()
                     {
                      GridTipos.getSelectionModel().iterateSelection
                      (    function(index)
                         {
                              var Tabla      = GridTipos.getTableModel();
                              sPersonal      = Tabla.getValue(1, index);
                              sId            = Tabla.getValue(2, index);
                              sDescripcion   = Tabla.getValue(3, index);
                              sTipoE         = Tabla.getValue(4, index);
                              sMedida        = Tabla.getValue(5, index);
                              sCantidad      = Tabla.getValue(6, index);
                              sCostoMN       = Tabla.getValue(7, index);
                              sCostoDLL      = Tabla.getValue(8, index);
                              sVentaMN       = Tabla.getValue(9, index);
                              sVentaDLL      = Tabla.getValue(10, index);
                              sFechaI        = Tabla.getValue(11,index);
                              sFechaF        = Tabla.getValue(12,index);
                              sProrrateo     = Tabla.getValue(15,index);
                              sJornada       = Tabla.getValue(13,index);
                              sDistribuye    = Tabla.getValue(14,index);

                              document.getElementById("txtPersonal").value        = sPersonal;
                              document.getElementById("txtItem").value            = sId;
                              document.getElementById("memoDescribe").value       = sDescripcion;
                              document.getElementById("txtMedida").value          = sMedida;
                              document.getElementById("CboTipo").value            = sTipoE;
                              document.getElementById("txtCantidad").value        = sCantidad;
                              document.getElementById("txtCostoMN").value         = sCostoMN;
                              document.getElementById("txtCostoDLL").value        = sCostoDLL;
                              document.getElementById("txtVentaMN").value         = sVentaMN;
                              document.getElementById("txtVentaDLL").value        = sVentaDLL;
                              document.getElementById("f-calendar-field-1").value = sFechaI;
                              document.getElementById("f-calendar-field-2").value = sFechaF;
                              document.getElementById("txtJornada").value         = sJornada;
                              document.getElementById("CboProrrateo").value       = sProrrateo;
                              document.getElementById("CboDistribuye").value      = sDistribuye;
                              document.getElementById("HiOldIdE").value           = sPersonal;
                              controlBotones(false);
                              Imagen(true);
                         }
                    );
                  }';
        echo " function imprimirReportes(tag){
                  ruta = '../reporte.php';
                  ruta = ruta + '?sContrato=" . $Connection->global_sContrato . "';
                  ruta = ruta + '&sIdPersonal='+document.getElementById('txtPersonal').value;
                  ruta = ruta + '&sConvenio=". $Connection->global_sIdConvenio ."';


                 // tag=event.getTarget().tag;
                  if (tag==1)
                  {
                      ruta = ruta + '&reportesPath=catalogos';
                      ruta = ruta + '&nombreReporte=rptPersonal';
                  }
                  else
                  if (tag==2)
                  {
                      ruta = ruta + '&reportesPath=catalogos';
                      ruta = ruta + '&nombreReporte=rptDmoPersonal';
                  }

                  var status = window.open(ruta,'_blank','fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no');
                //  return false;

                  }
                 ";

   }

   function txtPersonalJSKeyUp($sender, $params)
   {
      ?>                //Add your javascript code here

      <?php
   }

   function txtMedidaJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtMedidaJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtMedidaJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtDescripcionJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtDescripcionJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtDescripcionJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtPersonalJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtPersonalJSFocus($sender, $params)
   {
      ?>           //Add your javascript code here

      <?php
   }

   function txtPersonalJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtCostoMNJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtCostoMNJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtCostoMNJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtCantidadJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtCantidadJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtCantidadJSBlur($sender, $params)
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

   function cmdCancelarJSMouseOut($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function cmdCancelarJSMouseMove($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function cmdAceptarJSMouseOut($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function cmdAceptarJSMouseMove($sender, $params)
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

   function cmdAgregarJSMouseOut($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function cmdAgregarJSMouseMove($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function CboDistribuyeJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function CboDistribuyeJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function CboDistribuyeJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtVentaDLLJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtVentaDLLJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtVentaDLLJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtVentaMNJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtVentaMNJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtVentaMNJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function CboProrrateoJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function CboProrrateoJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function CboProrrateoJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtCostoDLLJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtCostoDLLJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtCostoDLLJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtJornadaJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtJornadaJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtJornadaJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function CboTipoJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function CboTipoJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function CboTipoJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function memoDescribeJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function memoDescribeJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function memoDescribeJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtItemJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtItemJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtItemJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }
    function frmCatalogoPersonalStartBody($sender, $params)
        {
         echo '
                 <!-- Capa que construye el menu -->
                        <div id="cepilomenu">
                           <hr>
                           <!--
                           <b><a class="menuitem" href=javascript:(return false)><font color = "BLUE">Reportes Parciales</font></a></b>
                           <hr>
                            -->
                           <a class="menuitem" href="javascript:imprimirReportes(1)"><img src="32px-Crystal_Clear_action_fileprint.ico" width=15 height=15></img>Catlogo de personal</a><br>
                           <a class="menuitem" href="javascript:imprimirReportes(2)"><img src="32px-Crystal_Clear_action_fileprint.ico" width=15 height=15></img>DMO Personal(Disribuicion)</a><br>
                           <hr>
                           <!--
                           <b><a class="menuitem" href=javascript:(return false)>nO HAY OPCION</a></b>
                           <hr>
                           -->

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


}

global $application;

global $frmCatalogoPersonal;

//Creates the form
$frmCatalogoPersonal = new frmCatalogoPersonal($application);
//Read from resource file
$frmCatalogoPersonal->loadResource(__FILE__);

//Shows the form
$frmCatalogoPersonal->show();

?>
<script>
controlBotones(false);
ResaltarBotones();
var fecha="f-calendar-field-1";
FechaActual(fecha);
var fecha="f-calendar-field-2";
FechaActual(fecha);
</script>
