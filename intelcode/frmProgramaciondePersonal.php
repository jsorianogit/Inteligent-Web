<?php
//Includes
//require_once("vcl/vcl.inc.php");
require_once("rpcl/rpcl.inc.php");
//        require("mysql.inc.php");
use_unit("comctrls.inc.php");
use_unit("buttons.inc.php");
use_unit("imglist.inc.php");
use_unit("db.inc.php");
use_unit("dbtables.inc.php");
use_unit("dbgrids.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");

require_once("Connection.php");
require_once("fnUtilerias.php");
//        $sUsuario=$_SESSION["ssUsuario"];
//        $sIdConvenio =$sIdConvenioAct;
//$sContrato = '425027849';
//Class definition
class frmProgramaciondePersonal extends Page
{
   public $ChecaPropuesta = null;
   public $txtTotal = null;
   public $CboMes = null;
   public $txtAn = null;
   public $cmdOk = null;
   public $Label7 = null;
   public $Label6 = null;
   public $Label5 = null;
   public $txtCantidad = null;
   public $Fecha = null;
   public $HiOldId = null;
   public $GridTipos = null;
   public $Panel2 = null;
   public $HiOpcion = null;
   public $QryPozo = null;
   public $SourPozo = null;
   public $cmdImprimir = null;
   public $cmdCancelar = null;
   public $cmdAceptar = null;
   public $cmdEliminar = null;
   public $cmdModificar = null;
   public $cmdAgregar = null;
   public $Panel1 = null;
   public $Label3 = null;
   public $Label2 = null;
   public $Label1 = null;

   function cmdOkClick($sender, $params)
   {
      global $Connection;
      try
      {
         $sAn = $this->txtAn->Text;
         $sMes = $this->CboMes->getItemIndex();
         $Cantidad = $this->txtTotal->Text;
         if($sMes == 1 or $sMes == 3 or $sMes == 5 or $sMes == 7 or $sMes == 8 or $sMes == 10 or $sMes == 12)
            $i = 31;
         if($sMes == 4 or $sMes == 6 or $sMes == 9 or $sMes == 11)
            $i = 30;
         if($sMes == 2)
         {
            if((($sAn % 4) == 0) and (($sAn % 100) <> 0 or ($sAn % 400) == 0))
               $i = 29;
            else
               $i = 28;
         }
         for($x = 1; $x <= $i; $x++)
         {
            $Fecha = "$sAn-$sMes-$x";
            $sql = "insert
                              into personalprogramado
                                      (sContrato,
                                       dIdFecha,
                                       dCantidad)
                                 values
                                      ('" . $Connection->global_sContrato . "',
                                       '$Fecha',
                                       '$Cantidad')";
            $Connection->Query1->setActive(false);
            $Connection->Query1->setSQL($sql);
            $Connection->Query1->open();

         }
      }catch(Exception$e)
      {
         echo "Error: " . $e->getMessage();
      }

   }

   function frmProgramaciondePersonalBeforeShow($sender, $params)
   {
      //      global $sContrato;
      //      global $_SESSION, $Usuario, $Clave, $Servidor;
      global $Connection;
      $Connection->conectar();
      //      $this->base->setConnected(false);
      //      $this->base->setDatabaseName($_SESSION['database']);
      //      $this->base->setUserName($Usuario);
      //      $this->base->setUserPassword($Clave);
      //      $this->base->setHost($Servidor);
      //      $this->base->setConnected(true);

      $sql = "select
                                date_format(dIdFecha,'%d/%m/%Y') as dIdFecha,
                                format(dCantidad,0) as dCantidad
                           from personalprogramado
                           where sContrato = '" . $Connection->global_sContrato . "'";
      $this->QryPozo->setActive(false);
      $this->QryPozo->setSQL($sql);
      $this->QryPozo->setActive(true);
   }

   function ChecaPropuestaJSChange($sender, $params)
   {
      ?>                //Add your javascript code here
                   if (document.getElementById("ChecaPropuesta").checked == true)
                   {   controlBotones2(true);
                       controlBotones(false);
                       document.getElementById("txtTotal").focus();
                       fechaActual = new Date();
                       anioActual  = fechaActual.getFullYear();
                       document.getElementById("txtAn").value    = anioActual;
                       document.getElementById("txtTotal").value = 0;
                   } else
                       {
                         controlBotones2(false);
                         document.getElementById("txtTotal").value = "";
                       }

                   return false;
      <?php
   }

   function GridTiposJSClick($sender, $params)
   {
      ?>               //Add your javascript code here
                    Selecciona();
                    return false;
      <?php
   }

   function GridTiposJSRowChanged($sender, $params)
   {
      ?>                //Add your javascript code here
                   Selecciona();
                   return false;
      <?php
   }

   function cmdAceptarJSClick($sender, $params)
   {
      ?>                //Add your javascript code here
                    var fecha="f-calendar-field-1";
                    ComponerFecha(fecha);
                    return true;
      <?php
   }

   function cmdAceptarClick($sender, $params)
   {
      global $Connection;
      try
      {
         $Fecha = $this->Fecha->Text;
         $Cantidad = $this->txtCantidad->Text;
         $Opcion = $this->HiOpcion->Value;
         $FechaOld = $this->HiOldId->Value;

         if($Opcion == "Agregar")
         {
            $sql = "insert
                                 into personalprogramado
                                      (sContrato,
                                       dIdFecha,
                                       dCantidad)
                                 values
                                      ('" . $Connection->global_sContrato . "',
                                       '$Fecha',
                                       '$Cantidad')";
         }

         if($Opcion == "Modificar")
         {
            $sql = "update personalprogramado
                                set
                                   dIdFecha  = '$Fecha',
                                   dCantidad = '$Cantidad'
                                where
                                       dIdFecha  = '$FechaOld'
                                   and sContrato = '" . $Connection->global_sContrato . "'";

         }

         $Connection->Query1->setActive(false);
         $Connection->Query1->setSQL($sql);
         $Connection->Query1->Open();
      }catch(Exception$e)
      {
         echo "Error: " . $e->getMessage();
      }
   }

   function cmdEliminarJSClick($sender, $params)
   {
      ?>               //Add your javascript code here
                    i   = GridTipos.getTableModel().getRowCount();
                    ok  = 0;
                    if (i>0)
                    {   if (!confirm("  Desea ELIMINAR La Fecha Seleccionada ?"))
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
      try
      {
         $FechaOld = $this->HiOldId->Value;
         $sql = "delete from personalprogramado
                           where
                                    dIdFecha  = '$FechaOld'
                                and sContrato = '" . $Connection->global_sContrato . "'";
         $Connection->Query4->setActive(false);
         $Connection->Query4->setSQL($sql);
         $Connection->Query4->open();
      }catch(Exception$e)
      {
         echo "Error: " . $e->getMessage();
      }
   }

   function cmdCancelarJSClick($sender, $params)
   {
      ?>               //Add your javascript code here
                   controlBotones(false);
                   controlBotones2(false);
                   return false;
      <?php
   }



   function cmdModificarJSClick($sender, $params)
   {
      ?>               //Add your javascript code here
                   pozo = document.getElementById("txtCantidad").value;
                   if (pozo == "")
                      alert (" Haga Click en Una Fecha !! ");
                   else
                   {
                        controlBotones(true);
                        controlBotones2(false);
                        document.getElementById("txtCantidad").focus();
                        document.getElementById("HiOpcion").value = "Modificar";
                   }
                   return false;
      <?php
   }

   function cmdAgregarJSClick($sender, $params)
   {
      ?>              //Add your javascript code here
                 controlBotones(true);
                 controlBotones2(false);
                 document.getElementById("txtCantidad").value = "";
                 document.getElementById("HiOpcion").value    = "Agregar";
                 document.getElementById("txtCantidad").focus();
                 return false;
      <?php
   }

   function cmdImprimirJSClick($sender, $params)
   {
      ?>                //Add your javascript code here
                     document.getElementById("cmdImprimir").style.width = 40;
                     return false;
      <?php
   }

   function dumpJavascript()
   {
      echo 'function controlBotones( habilitar ){
                        if(habilitar){
                           accion = false;
                        }
                        else{
                             accion= true;
                        }
                        document.getElementById("txtCantidad").disabled =accion;
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
                          document.getElementById("txtCantidad").style.backgroundColor = "";
                          document.getElementById("txtAn").style.backgroundColor = "";
                          document.getElementById("txtTotal").style.backgroundColor = "";
                          document.getElementById("CboMes").style.backgroundColor = "";
                          document.getElementById("cmdOk").style.backgroundColor = "";
                          document.getElementById("cmdAgregar").style.backgroundColor = "";
                          document.getElementById("cmdModificar").style.backgroundColor = "";
                          document.getElementById("cmdEliminar").style.backgroundColor = "";
                          document.getElementById("cmdAceptar").style.backgroundColor = "";
                          document.getElementById("cmdCancelar").style.backgroundColor = "";
                          document.getElementById("cmdImprimir").style.backgroundColor = "";
                          return false;
                      }';

      echo 'function controlBotones2( habilitar )
                      {
                          if(habilitar)
                          {
                              accion = false;
                          }
                           else{
                                 accion= true;
                               }
                          document.getElementById("txtAn").disabled =accion;
                          document.getElementById("txtTotal").disabled =accion;
                          document.getElementById("CboMes").disabled =accion;
                          document.getElementById("cmdOk").disabled =accion;
                          if (habilitar==false)
                          {
                              document.getElementById("cmdOk").src="recursos/imagenesMenu/Botones/_Symbol-Check.ico";
                          }else{
                                 document.getElementById("cmdOk").src="recursos/imagenesMenu/Botones/Symbol-Check.ico";
                                }
                          return false;
                       }';

      echo 'function Selecciona()
                       {
                          GridTipos.getSelectionModel().iterateSelection
                          (  function(index)
                             {
                                var Tabla   = GridTipos.getTableModel();
                                sFecha      = Tabla.getValue(1, index);
                                sCantidad   = Tabla.getValue(2, index);

                                document.getElementById("f-calendar-field-1").value = sFecha;
                                document.getElementById("txtCantidad").value        = sCantidad;
                                document.getElementById("HiOldId").value            = sFecha;
                                var fecha="HiOldId";
                                ComponerFecha(fecha);
                                controlBotones(false);
                                Imagen(true);
                            }
                         );
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

   }

   function cmdOkJSMouseOut($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function cmdOkJSMouseMove($sender, $params)
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

   function CboMesJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function CboMesJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function CboMesJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtTotalJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtTotalJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtTotalJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtAnJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtAnJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtAnJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function ChecaPropuestaJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function ChecaPropuestaJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function ChecaPropuestaJSBlur($sender, $params)
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

}

global $application;

global $frmProgramaciondePersonal;

//Creates the form
$frmProgramaciondePersonal = new frmProgramaciondePersonal($application);

//Read from resource file
$frmProgramaciondePersonal->loadResource(__FILE__);

//Shows the form
$frmProgramaciondePersonal->show();

?>
<script>
controlBotones(false);
controlBotones2(false);
document.getElementById("ChecaPropuesta").checked = false;
ResaltarBotones();
var fecha="f-calendar-field-1";
FechaActual(fecha);
</script>