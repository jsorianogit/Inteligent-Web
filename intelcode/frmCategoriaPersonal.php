<?php
//Includes
//require_once("vcl/vcl.inc.php");
require_once("rpcl/rpcl.inc.php");
require("mysql.inc.php");
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
class frmCategoriaPersonal extends Page
{
   public $CboLaboran = null;
   public $CboPernocta = null;
   public $HiOldId = null;
   public $txtId = null;
   public $GridTipos = null;
   public $Panel2 = null;
   public $HiOpcion = null;
   public $QryPozo = null;
   public $SourPozo = null;
   public $base = null;
   public $cmdImprimir = null;
   public $cmdCancelar = null;
   public $cmdAceptar = null;
   public $cmdEliminar = null;
   public $cmdModificar = null;
   public $cmdAgregar = null;
   public $Panel1 = null;
   public $Label4 = null;
   public $Label3 = null;
   public $Label2 = null;
   public $Label1 = null;

   function frmCategoriaPersonalBeforeShow($sender, $params)
   {
      //      global $sContrato;
      //      global $_SESSION, $Usuario, $Clave, $Servidor;

      //      $this->base->setConnected(false);
      //      $this->base->setDatabaseName($_SESSION['database']);
      //      $this->base->setUserName($Usuario);
      //      $this->base->setUserPassword($Clave);
      //      $this->base->setHost($Servidor);
      //      $this->base->setConnected(true);

      global $Connection;
//      $Connection->base->setConnected(false);
//      $Connection->base->setConnected(true);
        $Connection->conectar();
      $sql = "select * from paquetes_p where sContrato = '" . $Connection->global_sContrato . "' ";
      $this->QryPozo->setActive(false);
      $this->QryPozo->setSQL($sql);
      $this->QryPozo->setActive(true);

      $sql = "select sIdPernocta, sDescripcion
                           from pernoctan";

      $Connection->Query1->Active = false;
      $Connection->Query1->setSQL($sql);
      $Connection->Query1->Prepare();
      $Connection->Query1->open();

      while( ! $Connection->Query1->EOF)
      {
         $item[$Connection->Query1->fields['sIdPernocta']] = $Connection->Query1->fields['sDescripcion'];
         $Connection->Query1->next();
      }

      $this->CboPernocta->setItems($item);

      $sql = "select sIdPlataforma, sDescripcion
                           from plataformas";

      $Connection->Query1->Active = false;
      $Connection->Query1->setSQL($sql);
      $Connection->Query1->Prepare();
      $Connection->Query1->open();

      while( ! $Connection->Query1->EOF)
      {
         $item2[$Connection->Query1->fields['sIdPlataforma']] = $Connection->Query1->fields['sDescripcion'];
         $Connection->Query1->next();
      }
      $this->CboLaboran->setItems($item2);

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
      ?>        //Add your javascript code here
                    Selecciona();
                    return false;
      <?php
   }

   function cmdAceptarJSClick($sender, $params)
   {
      ?>                //Add your javascript code here
                    return true;
      <?php
   }

   function cmdAceptarClick($sender, $params)
   {
      global $Connection;
      try
      {
         $Id = strtoupper($this->txtId->Text);
         $Pernocta = $this->CboPernocta->getItemIndex();
         $Laboran = $this->CboLaboran->getItemIndex();
         $Opcion = $this->HiOpcion->Value;
         $IdOld = $this->HiOldId->Value;

         if($Opcion == "Agregar")
         {
            $sql = "insert
                                 into  paquetes_p
                                      (sContrato,
                                       sNumeroPaquete,
                                       sIdPernocta,
                                       sIdPlataforma)
                                 values
                                      ('" . $Connection->global_sContrato . "',
                                       '$Id',
                                       '$Pernocta',
                                       '$Laboran')";
         }

         if($Opcion == "Modificar")
         {
            $sql = "update paquetes_p
                                set
                                   sNumeroPaquete = '$Id',
                                   sIdPernocta    = '$Pernocta',
                                   sIdPlataforma  = '$Laboran'
                                where
                                   sNumeroPaquete = '$IdOld'
                                   and sContrato  = '" . $Connection->global_sContrato . "' ";
         }
         $Connection->Query1->Active = false;
         $Connection->Query1->setSQL($sql);
         $Connection->Query1->Prepare();
         $Connection->Query1->open();
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
                    {   if (!confirm("  Desea ELIMINAR El Paquete de Categoria de Personal Seleccionado ?"))
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
         $IdOld = $this->HiOldId->Value;
         $sql = "delete from paquetes_p
                           where  sNumeroPaquete = '$IdOld'
                                  and sContrato  = '" . $Connection->global_sContrato . "'";
         $Connection->Query1->Active = false;
         $Connection->Query1->setSQL($sql);
         $Connection->Query1->Prepare();
         $Connection->Query1->open();
      }catch(Exceptio$e)
      {
         echo "Error: " . $e->getMessage();
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
                   pozo = document.getElementById("txtId").value;
                   if (pozo == "")
                      alert (" Haga Click en Un Paquete de Categoria de Personal !! ");
                   else
                   {
                        controlBotones(true);
                        document.getElementById("txtId").focus();
                        document.getElementById("HiOpcion").value = "Modificar";
                   }
                   return false;
      <?php
   }

   function cmdAgregarJSClick($sender, $params)
   {
      ?>              //Add your javascript code here
                 controlBotones(true);
                 document.getElementById("txtId").value       = "";
                 document.getElementById("CboPernocta").value = "";
                 document.getElementById("CboLaboran").value  = "";
                 document.getElementById("HiOpcion").value    = "Agregar";
                 document.getElementById("txtId").focus();
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
                        document.getElementById("txtId").disabled =accion;
                        document.getElementById("CboPernocta").disabled =accion;
                        document.getElementById("CboLaboran").disabled =accion;
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
                          document.getElementById("txtId").style.backgroundColor = "";
                          document.getElementById("CboPernocta").style.backgroundColor = "";
                          document.getElementById("CboLaboran").style.backgroundColor = "";
                          document.getElementById("cmdAgregar").style.backgroundColor = "";
                          document.getElementById("cmdModificar").style.backgroundColor = "";
                          document.getElementById("cmdEliminar").style.backgroundColor = "";
                          document.getElementById("cmdAceptar").style.backgroundColor = "";
                          document.getElementById("cmdCancelar").style.backgroundColor = "";
                          document.getElementById("cmdImprimir").style.backgroundColor = "";
                          return false;
                      }';

      echo 'function Selecciona()
                      {
                          GridTipos.getSelectionModel().iterateSelection
                          (   function(index)
                              {
                                var Tabla      = GridTipos.getTableModel();
                                sId            = Tabla.getValue(1, index);
                                sPernocta      = Tabla.getValue(2, index);
                                sLaboran       = Tabla.getValue(3, index);

                                document.getElementById("txtId").value          = sId;
                                document.getElementById("CboPernocta").value    = sPernocta;
                                document.getElementById("CboLaboran").value     = sLaboran;
                                document.getElementById("HiOldId").value        = sId;
                                controlBotones(false);
                                Imagen(true);
                              }
                           );
                           return false;
                      }';

   }

   function CboLaboranJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function CboLaboranJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function CboLaboranJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function CboPernoctaJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function CboPernoctaJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function CboPernoctaJSBlur($sender, $params)
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

   function txtMascaraJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtMascaraJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtMascaraJSBlur($sender, $params)
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

   function txtIdJSKeyPress($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtIdJSFocus($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }

   function txtIdJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here

      <?php

   }
}

global $application;

global $frmCategoriaPersonal;

//Creates the form
$frmCategoriaPersonal = new frmCategoriaPersonal($application);

//Read from resource file
$frmCategoriaPersonal->loadResource(__FILE__);

//Shows the form
$frmCategoriaPersonal->show();

?>
<script>
controlBotones(false);
ResaltarBotones();
</script>