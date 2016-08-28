<?php
require_once("rpcl/rpcl.inc.php");
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

//$sUsuario = $Connection->global_sIdUsuario;
//$sIdConvenio = $Connection->global_sIdConvenio ;//$sIdConvenioAct;
//Class definition
class frmTiposdeEquipos extends Page
{
   public $HiOldId = null;
   public $txtId = null;
   public $txtMascara = null;
   public $Panel2 = null;
   public $HiOpcion = null;
   public $dsTiposEquipos = null;
   public $cmdImprimir = null;
   public $cmdCancelar = null;
   public $cmdAceptar = null;
   public $cmdEliminar = null;
   public $cmdModificar = null;
   public $cmdAgregar = null;
   public $txtDescripcion = null;
   public $Panel1 = null;
   public $Label4 = null;
   public $Label3 = null;
   public $Label2 = null;
   public $Label1 = null;
   public $qryTiposEquipos = null;
   public $GridTipos = null;

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

   function frmTiposdeEquiposBeforeShow($sender, $params)
   {
      global $Connection;

//      $Connection->base->setConnected(false);
//      $Connection->base->setConnected(true);
      $Connection->conectar();
      $sql = "select * from tiposdeequipo";
      $this->qryTiposEquipos->setActive(false);
      $this->qryTiposEquipos->setSQL($sql);
      $this->qryTiposEquipos->setActive(true);
   }

   function GridTiposJSClick($sender, $params)
   {
      ?>               //Add your javascript code here

                    GridTipos.getSelectionModel().iterateSelection
                    (    function(index)
                         {
                              var Tabla      = GridTipos.getTableModel();
                              sId            = Tabla.getValue(0, index);
                              sDescripcion   = Tabla.getValue(1, index);
                              sMascara       = Tabla.getValue(2, index);

                              document.getElementById("txtId").value          = sId;
                              document.getElementById("txtDescripcion").value = sDescripcion;
                              document.getElementById("txtMascara").value     = sMascara;
                              document.getElementById("HiOldId").value        = sId;
                              controlBotones(false);
                              Imagen(true);
                         }
                    );

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
//         $Connection->base->setConnected(false);
//         $Connection->base->setConnected(true);
        $Connection->conectar();
         $Id = $this->txtId->Text;
         $Descripcion = $this->txtDescripcion->Text;
         $Mascara = $this->txtMascara->Text;
         $Opcion = $this->HiOpcion->Value;
         $IdOld = $this->HiOldId->Value;

         if($Opcion == "Agregar")
         {
            $sql = "insert
                                 into tiposdeequipo
                                      (sIdTipoEquipo,
                                       sDescripcion,
                                       sMascara)
                                 values
                                      ('$Id',
                                       '$Descripcion',
                                       '$Mascara')";

         }

         if($Opcion == "Modificar")
         {
            $sql = "update tiposdeequipo
                                set
                                   sIdTipoEquipo = '$Id',
                                   sDescripcion  = '$Descripcion',
                                   sMascara      = '$Mascara'
                                where
                                   sIdTipoEquipo = '$IdOld'";
         }
         $Connection->Query1->setActive(false);
         $Connection->Query1->setSQL($sql);
         $Connection->Query1->Prepare();
         $Connection->Query1->open();
         $Connection->Query1->close();
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
                    {   if (!confirm("  Desea ELIMINAR El Tipo de Equipo Seleccionado ?"))
                           ok = 1;
                        else
                            document.getElementById("HiOldId").disabled  = false;
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
      $IdOld = $this->HiOldId->Value;
      $sql = "delete from tiposdeequipo
                           where  sIdTipoEquipo = '$IdOld'";
//      $Connection->base->setConnected(false);
//      $Connection->base->setConnected(true);
      $Connection->conectar();
      $Connection->Query1->setActive(false);
      $Connection->Query1->setSQL($sql);
      $Connection->Query1->Prepare();
      $Connection->Query1->open();
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
                      alert (" Haga Click en Un Equipo !! ");
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
                 document.getElementById("txtId").value           = "";
                 document.getElementById("txtDescripcion").value  = "";
                 document.getElementById("txtMascara").value      = "";
                 document.getElementById("HiOpcion").value        = "Agregar";
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
                           Color1="gray";
                           Color2="";
                        }
                        else{
                             accion= true;
                             Color1="";
                             Color2="gray";
                        }
                        document.getElementById("txtId").disabled =accion;
                        document.getElementById("txtDescripcion").disabled =accion;
                        document.getElementById("txtMascara").disabled =accion;
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
                          document.getElementById("txtDescripcion").style.backgroundColor = "";
                          document.getElementById("txtMascara").style.backgroundColor = "";
                          document.getElementById("cmdAgregar").style.backgroundColor = "";
                          document.getElementById("cmdModificar").style.backgroundColor = "";
                          document.getElementById("cmdEliminar").style.backgroundColor = "";
                          document.getElementById("cmdAceptar").style.backgroundColor = "";
                          document.getElementById("cmdCancelar").style.backgroundColor = "";
                          document.getElementById("cmdImprimir").style.backgroundColor = "";
                          return false;
                      }';

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

global $frmTiposdeEquipos;

//Creates the form
$frmTiposdeEquipos = new frmTiposdeEquipos($application);

//Read from resource file
$frmTiposdeEquipos->loadResource(__FILE__);

//Shows the form
$frmTiposdeEquipos->show();

?>
<script>
controlBotones(false);
ResaltarBotones();
</script>