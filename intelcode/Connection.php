<?php
session_start();
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("db.inc.php");
use_unit("dbtables.inc.php");
include("Modulos/include/config.inc.php");
//Class definition

class Connection extends DataModule
{
   public $Query4 = null;
   public $Query3 = null;
   public $Query2 = null;

   public $global_sIdUsuario = null;
   public $global_sPassword = null;
   public $global_database = null;
   public $global_sContrato = null;
   public $global_sIdConvenio = null;
   public $global_sIdTurno = null;
   public $global_grupo = null;
   public $base = null;
   public $Query1 = null;

   function __construct($aowner = null)
   {
      parent::__construct($aowner);
      $this->inicializar();
   }
   public function inicializar()
   {
      if($this->global_sIdUsuario == null)
      {
         if($_SESSION['ssUsuario'] <> "")
         {
            $this->global_sIdUsuario = $_SESSION['ssUsuario'];
         }
         else
         {
            $this->global_sIdUsuario = "adal2404";
         }
      }
      if($this->global_sPassword == null)
      {
         if($_SESSION['ssContrasena'] <> "")
         {
            $this->global_sPassword = $_SESSION['ssContrasena'];
         }
         else
         {
            $this->global_sPassword = "04082011";
         }
      }
      if($this->global_database == null)
      {
         if($_SESSION['ssContrato'] <> "")
         {
            $this->global_database = $_SESSION['database'];
         }
         else
         {
            $this->global_database = "oceanografia";
         }
      }
      if(empty($this->global_sContrato))
      {
         if($_SESSION['ssContrato'] != "")
         {
            $this->global_sContrato = $_SESSION['ssContrato'];
         }
         else
         {

            $this->global_sContrato = "428231821";
         }
      }
      if($this->global_sIdConvenio == null)
      {
         if($_SESSION['ssIdConvenio'] <> "")
         {
            $this->global_sIdConvenio = $_SESSION['ssIdConvenio'];
         }
         else
         {
            $this->global_sIdConvenio = "";
         }
      }
      if($this->global_sIdTurno == null)
      {
         if($_SESSION['ssIdTurno'] <> "")
         {
            $this->global_sIdTurno = $_SESSION['ssIdTurno'];
         }
         else
         {
            $this->global_sIdTurno = "A";
         }
      }
      if($this->global_grupo == null)
      {
         if($_SESSION['global_grupo'] <> "")
         {
            $this->global_grupo = $_SESSION['global_grupo'];
         }
         else
         {
            $this->global_grupo = "INTEL-CODE";
         }
      }

   }
   //      Conectar
   function conectar()
   {
      global $Servidor, $Usuario, $Clave;
      //$this->base = new Database($this);
      $this->base->setConnected(false);
      $this->base->setDatabaseName($this->global_database);
      $this->base->setUserName($Usuario);
      $this->base->setUserPassword($Clave);
      $this->base->setHost($Servidor);
      $this->base->setConnected(true);
   }




}

global $application;

global $Connection;

//Creates the form
$Connection = new Connection($application);
$Connection->init();
$Connection->inicializar();
//$Connection->conectar();
//Read from resource file
$Connection->loadResource(__FILE__);
?>
