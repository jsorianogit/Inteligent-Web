<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require("mysql.inc.php");
        require("fnUtilerias.php");
        //Class definition
        class frmMisPendientes extends Page
        {
               public $txtPendiente = null;
               public $txtAvanceProyecto = null;
               public $txtTranscurridos = null;
               public $winPendientes = null;
               public $Label10 = null;
               public $Label9 = null;
               public $Label8 = null;
               public $Label7 = null;
               public $txtFisico = null;
               public $txtGlobal = null;
               public $txtLaborados = null;
               public $txtFechaFinal = null;
               public $Label6 = null;
               public $txtFechaIinicio = null;
               public $Label5 = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;
               public $Memo1 = null;
               function frmMisPendientesShow($sender, $params)
               {
               #descripcion del contrato
               $sql ="select mDescripcion from contratos
                     where sContrato ='".$_SESSION['ssContrato']."'";
               $result = mysql_query($sql);
               if($row = mysql_fetch_array($result)){
                  $this->Memo1->setLines($row['mDescripcion']);  
               }
               #obtner las fechas y avances en los dias
                $sql = "select dFechaInicio, dFechaFinal from convenios
                       where sContrato ='".$_SESSION['ssContrato']."'
                       and sIdConvenio='".$_SESSION['ssIdConvenio']."'";
                $result = mysql_query($sql);
                if($row = mysql_fetch_array($result)){
                  $this->txtFechaIinicio->Text = $row['dFechaInicio'];
                  $this->txtFechaFinal->Text = $row['dFechaFinal'];
                  $this->txtLaborados->Text = restarFecha($row['dFechaInicio'],date("Y-m-d"))+1;
                  $this->txtTranscurridos->Text = restarFecha(date("Y-m-d"),$row['dFechaFinal']);
                  if(comparaFecha(date("Y-m-d"),$row['dFechaFinal'])){
                     $avance = restarFecha($row['dFechaInicio'],$row['dFechaFinal'])+1;
                     $avance = ($this->txtLaborados->Text / $avance) *100 ;
                     $this->txtAvanceProyecto->Text = $avance;
                     $this->txtPendiente->Text = 100 - $avance;
                  }
                  else{
                     $this->txtAvanceProyecto->Text = 100;
                     $this->txtPendiente->Text = 0;

                  }
               }
               else{
                  $this->txtFechaIinicio->Text = date("Y-m-d");
                  $this->txtFechaFinal->Text = date("Y-m-d");

               }
               #calcular los avances globales y fisicos
               $sql = "select dAvancePonderadoGlobal from avancesglobales where
                        sContrato ='".$_SESSION['ssContrato']."'
                        and sIdConvenio='".$_SESSION['ssIdConvenio']."'
                        and dIdFecha='".date("y-m-d")."'";
               $result = mysql_query($sql);
               if($row = mysql_fetch_array($result)){
                 $this->txtGlobal->Text = $row['dAvancePonderadoGlobal'];
               }
               $sql = "select sum(dAvance) as dAvance from avancesglobalesxorden where
                        sContrato ='".$_SESSION['ssContrato']."'
                        and sIdConvenio='".$_SESSION['ssIdConvenio']."'
                        and dIdFecha<='".date("y-m-d")."'
                        and sNumeroOrden=''";
               $result = mysql_query($sql);
               if($row = mysql_fetch_array($result)){
                 $this->txtFisico->Text = $row['dAvance'];
               }
               }



        }

        global $application;

        global $frmMisPendientes;

        //Creates the form
        $frmMisPendientes=new frmMisPendientes($application);

        //Read from resource file
        $frmMisPendientes->loadResource(__FILE__);

        //Shows the form
        $frmMisPendientes->show();

?>
