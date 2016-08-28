<?php
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("dbtables.inc.php");
use_unit("db.inc.php");
use_unit("dbgrids.inc.php");
use_unit("comctrls.inc.php");
require("Connection.php");
require("fnUtilerias.php");
//Class definition
class frmInformeSincronizador extends Page
{
   public $CheckBox2 = null;
   public $cmdAnalizar = null;
   public $hdFecha = null;
   public $hIid = null;
   public $CheckBox1 = null;
   public $Timer1 = null;
   public $Label2 = null;
   public $Label1 = null;
   public $qryMensajesSincronizacion = null;
   public $dsMensajesSincronizacion = null;
   public $DBGrid1 = null;
   public $cmdActualizar = null;
   public $txtLimite = null;
   public $Descripcion = null;
   function frmInformeSincronizadorShow($sender, $params)
   {
      global $Connection;
      $Connection->conectar();
      $this->cmdActualizarClick($sender, $params);
   }
   function cmdActualizarClick($sender, $params)
   {
      $this->qryMensajesSincronizacion->Active = false;
      if($this->CheckBox2->Checked)
      {
         $this->qryMensajesSincronizacion->SQL = "select * from smensajes where mMensajes  like '%OK%' order by iid desc  limit " . $this->txtLimite->Text;
      }else{
         $this->qryMensajesSincronizacion->SQL = "select * from smensajes order by iid desc limit " . $this->txtLimite->Text;
      }
      //      $this->qryMensajesSincronizacion->LimitCount = $this->txtLimite->Text;
      $this->qryMensajesSincronizacion->open();
   }
   function Timer1JSTimer($sender, $params)
   {
      $componentes = array("DBGrid1", "txtLimite", "CheckBox2", "CheckBox1");
      echo $this->Timer1->ajaxCall("cmdActualizarClick", array(), $componentes);
      ?>
               //Add your javascript code here
                  return(false);

      <?php
   }
   function CheckBox1Click($sender, $params)
   {
      if($this->CheckBox1->Checked)
      {
         $this->Timer1->Enabled = true;
      }
      else
      {
         $this->Timer1->Enabled = false;
      }
   }
   function DBGrid1JSClick($sender, $params)
   {
      ?>
               //Add your javascript code here
                  DBGrid1.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = DBGrid1.getTableModel();

                        document.getElementById("hIid").value = tableModel.getValue(0, index);
                        document.getElementById("hdFecha").value = tableModel.getValue(1, index);
                     }

                  );
                  return(false);

      <?php
   }
   function DBGrid1JSDblClick($sender, $params)
   {
              $componentes = array("Descripcion","hIid","hdFecha","cmdAnalizar");
              echo $this->DBGrid1->ajaxCall("DescribirMensaje", array(), $componentes);
      ?>
        //begin js
         return(false);
        //end
      <?php
   }
   function DescribirMensaje()
   {
      global $Connection;
      $Mensaje = "";

      $Mensaje = "select mMensajes from smensajes
        where iid = '" . $this->hIid->Value . "'   and dFecha = '" . $this->hdFecha->Value . "'";

      $Connection->Query4->Active = false;
      $Connection->Query4->SQL = "select mMensajes from smensajes
        where iid = '" . $this->hIid->Value . "'   and dFecha = '" . $this->hdFecha->Value . "'";
      $Connection->Query4->open();

      if($Connection->Query4->RecordCount > 0)
      {
         $sMensaje = $Connection->Query4->Fields['mMensajes'];
         if(strpos($sMensaje, "INSERT OK") !== false || strpos($sMensaje, "UPDATE OK") !== false)
         {
            $PartesMsg = explode("Tabla", $sMensaje);
            $Tabla = $PartesMsg[1];
            $Tabla = str_replace("[", "", $Tabla);
            $Tabla = str_replace("]", "", $Tabla);
            $Tabla = str_replace("=", "", $Tabla);
            $Tabla = str_replace(" ", "", $Tabla);
            $Tabla = trim($Tabla);

            $PartesLLaves = explode("llave", $sMensaje);
            $LLaves = $PartesLLaves[1];
            $LLaves = str_replace("[", "", $LLaves);
            $LLaves = str_replace("]", "", $LLaves);
            $LLaves = str_replace("=", "", $LLaves);
            $LLaves = str_replace(" ", "", $LLaves);

            $ValoresLLaves = explode("@", $LLaves);

            $Connection->Query4->Active = false;
            $Connection->Query4->SQL = "SHOW INDEXES FROM $Tabla WHERE Key_name = 'PRIMARY' ";
            $Connection->Query4->open();
            $row = 0;
            $Condicion = " ";
            while( ! $Connection->Query4->EOF)
            {
               $Condicion = $Condicion . $Connection->Query4->Fields['Column_name'];
               $Condicion = $Condicion . " = ";
               $Condicion = $Condicion . "'" . $ValoresLLaves[$row] . "'";
               if($Connection->Query4->RecNo < $Connection->Query4->RecordCount - 1)
               {
                  $Condicion = $Condicion . " and ";
               }
               $row++;
               $Connection->Query4->next();
            }
            $sql = "select * from $Tabla";
            if($Condicion != "")
            {
               $sql = $sql . " where " . $Condicion;
            }
            $sql = $sql . " limit 1 ";
            $Connection->Query3->Active = false;
            $Connection->Query3->SQL = $sql;
            $Connection->Query3->open();

            unset($Fields);
            $this->Descripcion->Text = "";
            if($Connection->Query3->RecordCount > 0)
            {
               $Columns = 0;
               foreach($Connection->Query3->Fields as $key=>$Value)
               {
                  $Fields[$Columns] = $key;
                  $Columns++;
               }

               for($i = 0; $i <= $Columns; $i++)
               {

                  $Campo = $Fields[$i];

                  if($Campo == "")
                     continue;

                  $Connection->Query2->Active = false;
                  $Connection->Query2->SQL = " show fields from $Tabla like '$Campo' ";
                  $Connection->Query2->open();

                  if($Connection->Query2->RecordCount > 0)
                  {

                     if($Connection->Query2->Fields["Type"] == "blob" || $Connection->Query2->Fields["Type"] == "mediumblob")
                     {
                        if(file_exists("recursos/$Campo.jpg"))
                        {
                           unlink("recursos/$Campo.jpg");
                        }
                        $file = fopen("recursos/$Campo.jpg", "w+");
                        fwrite($file, $Connection->Query3->Fields[$Campo], 1024 * 1000);
                        fclose($file);

                        $this->Descripcion->Text = $this->Descripcion->Text . " <br><br> " .
                        $Campo . " = " .
                        "<br><img src='recursos/$Campo.jpg' width=100 heigth=100></img>";
                     }
                     else
                     {
                        $this->Descripcion->Text = $this->Descripcion->Text . " <br><br> " .
                        $Campo . " = " .
                        $Connection->Query3->Fields[$Campo];
                     }
                  }
               }
            }
         }
         else
         {
            $this->Descripcion->Text = $sMensaje;
         }

      }

    }
   function cmdAnalizarClick($sender, $params)
   {
      $this->DescribirMensaje();
   }
}

global $application;

global $frmInformeSincronizador;

//Creates the form
$frmInformeSincronizador = new frmInformeSincronizador($application);

//Read from resource file
$frmInformeSincronizador->loadResource(__FILE__);

//Shows the form
$frmInformeSincronizador->show();

?>
