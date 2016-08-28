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
class frmCategoriasTripulacionBase extends Page
{
   public $HiOldFecha = null;
   public $txtGrupoResumen = null;
   public $txtFecha = null;
   public $Label5 = null;
   public $Label4 = null;
   public $txtDescripcion = null;
   public $txtId = null;
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

   function frmCategoriasTripulacionBaseBeforeShow($sender, $params)
   {
      //                   global $sContrato;
      //                   global $_SESSION,$Usuario,$Clave,$Servidor;
      //
      //                   $this->base->setConnected(false);
      //                   $this->base->setDatabaseName($_SESSION['database']);
      //                   $this->base->setUserName($Usuario);
      //                   $this->base->setUserPassword($Clave);
      //                   $this->base->setHost($Servidor);
      //                   $this->base->setConnected(true);
      global $Connection;
      $Connection->conectar();

      $sql = "select *
                           from categorias
                           ";
      $this->QryPozo->setActive(false);
      $this->QryPozo->setSQL($sql);
      $this->QryPozo->setActive(true);
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
                    return true;
      <?php
   }

   function cmdAceptarClick($sender, $params)
   {
      global $Connection;
      try
      {

         $Opcion = $this->HiOpcion->Value;
         $FechaOld = $this->HiOldFecha->Value;

         $Id = $this->txtId->Text;
         $Descripcion = $this->txtDescripcion->Text;
         $IdOld = $this->HiOldId->Value;
         $MigrupoResumen = $this->txtGrupoResumen->Text;
         $Fecha = $this->txtFecha->Text;



         if($Opcion == "Agregar")
         {
            $sql = "insert
                                 into categorias
                                      (sIdCategoria,
                                       sDescripcion,
                                       dFechaVigencia,
                                       sMiGrupoResumen)
                                 values
                                      ('$Id',
                                       '$Descripcion',
                                       '$Fecha',
                                       '$MigrupoResumen')";

         }

         else
            if($Opcion == "Modificar")
            {
               $sql = "update categorias
                                set
                                   sIdCategoria = '$Id',
                                   sDescripcion = '$Descripcion' ,
                                   dFechaVigencia =  '$Fecha' ,
                                   sMiGrupoResumen= '$MigrupoResumen'
                                where
                                   sIdCategoria = '$IdOld'
                                   and dFechaVigencia    = '$FechaOld'";

            }
         $Connection->Query1->close();
         $Connection->Query1->SQL = $sql;
         $Connection->Query1->Prepare();
         $Connection->Query1->open();
         $Connection->Query1->close();

      }catch(Exception$e)
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
                    {   if (!confirm("  Desea ELIMINAR La Categoria Seleccionada ?"))
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
         $FechaOld = $this->HiOldFecha->Value;
         $sql = "delete from categorias
                           where
                                    sIdCategoria = '$IdOld'
                                and dFechaVigencia    = '$FechaOld'";
         $Connection->Query4->close();
         $Connection->Query4->SQL = $sql;
         $Connection->Query4->open();
         $Connection->Query4->close();
      }catch(Exception$e)
      {
         echo "Error: " . $e->getMessage();
      }
   }

   function cmdCancelarJSClick($sender, $params)
   {
      ?>               //Add your javascript code here
                   controlBotones(false);
                   document.getElementById("HiOpcion").value = "----";
                   return false;
      <?php
   }



   function cmdModificarJSClick($sender, $params)
   {
      ?>               //Add your javascript code here
                   pozo = document.getElementById("txtId").value;
                   if (pozo == "")
                      alert (" Haga Click en Una Categoria !! ");
                   else
                   {
                        controlBotones(true);
                        document.getElementById("HiOpcion").value = "Modificar";
                        document.getElementById("txtId").focus();

                   }
                   return false;
      <?php
   }

   function cmdAgregarJSClick($sender, $params)
   {
      ?>              //Add your javascript code here
                 controlBotones(true);
                 document.getElementById("txtId").value          = "";
                 document.getElementById("txtDescripcion").value = "";
                 document.getElementById("f-calendar-field-1").value = "";
                 document.getElementById("txtGrupoResumen").value = "";
                 document.getElementById("HiOpcion").value = "Agregar";
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
                        document.getElementById("txtDescripcion").disabled =accion;
                        document.getElementById("f-calendar-field-1").disabled =accion;
                        document.getElementById("txtGrupoResumen").disabled =accion;

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
                          document.getElementById("txtGrupoResumen").style.backgroundColor = "";
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
                          (  function(index)
                             {
                                var Tabla       = GridTipos.getTableModel();
                                sId             = Tabla.getValue(1, index);
                                sDescribir      = Tabla.getValue(2, index);
                                dFecha          = Tabla.getValue(3, index);
                                sMiGrupoResumen = Tabla.getValue(4,index);

                                document.getElementById("txtId").value          = sId;
                                document.getElementById("txtDescripcion").value = sDescribir;
                                document.getElementById("f-calendar-field-1").value     = dFecha;
                                document.getElementById("txtGrupoResumen").value     = sMiGrupoResumen;

                                document.getElementById("HiOldId").value        = sId;
                                document.getElementById("HiOldFecha").value     = dFecha;
                                controlBotones(false);
                                Imagen(true);
                            }
                         );
                         return false;
                      }';

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

global $frmCategoriasTripulacionBase;

//Creates the form
$frmCategoriasTripulacionBase = new frmCategoriasTripulacionBase($application);

//Read from resource file
$frmCategoriasTripulacionBase->loadResource(__FILE__);

//Shows the form
$frmCategoriasTripulacionBase->show();

?>
<script>
controlBotones(false);
ResaltarBotones();
</script>
