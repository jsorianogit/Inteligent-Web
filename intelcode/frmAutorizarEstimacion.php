<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("auth.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require("mysql.inc.php");
        require("fnContrato.php");
        require("fnUtilerias.php");
        //Class definition
        class Unit1 extends Page
        {
               public $Image1 = null;
               public $BasicAuthentication1 = null;
               public $cmdAutorizarEst = null;
               public $dbgDesEstimaciones = null;
               public $Database1 = null;
               public $Datasource1 = null;
               public $Query1 = null;
               public $cmdEstimaciones = null;
               public $cmdValidarGeneradores = null;
               public $cmdValidarReportes = null;
               public $Panel2 = null;
               public $Label3 = null;
               public $Memo1 = null;
               public $Panel15 = null;
               public $ComboBox1 = null;
               public $Label2 = null;
               function dumpJavascript(){
                 echo "function cargar(){document.location.href='frmAutorizarEstimacion.php';}\n";
               }
               function BasicAuthentication1Authenticate($sender, $params)
               {
                  global $_SESSION;
                  $_SESSION['usuarioAEstimacion'] = "";

                  $sql = "select sIdUsuario from usuarios ";
                  $sql.= "where sIdUsuario='".$params['username']."'";
                  $sql.=" and sPassword='".$params['password']."'";
                  $sql.="  and lAutoriza='Si'";

                  $rs = mysql_query($sql);
                  if ($row = mysql_fetch_array($rs))
                  {
                     $_SESSION['usuarioAEstimacion'] = $row['sIdUsuario'];
                     return(true);
                  }
                  else {
                     $_SESSION['usuarioAEstimacion']="";
                     return(false);
                  }


               }

               function cmdValidarReportesJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  document.location.href="frmValidarReportes.php";
                  return false;
               <?php

               }

               function cmdValidarGeneradoresJSClick($sender, $params)
               {
                ?>
               //Add your javascript code here
                  document.location.href="frmValidarGeneradores.php";
                  return false;
               <?php
               }

               function cmdAutorizarEstJSClick($sender, $params)
               {

                 ?>

               //Add your javascript code here
                  colEstimacion = 0;

                  document.getElementById("Memo1").value="";
                  dbgDesEstimaciones.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = dbgDesEstimaciones.getTableModel();
                        var estimacion = tableModel.getValue(colEstimacion, index);
                        params = estimacion;

                        <?php
                        echo $this->cmdAutorizarEst->ajaxCall("AutorizarEstimacion",array(),array("cmdAutorizarEst","dbgDesEstimaciones","Memo1"));//
                        ?>
                     }

                  );
                  setTimeout("cargar()",3000);
                 return false;
                 <?php

               }

               function Unit1Show($sender, $params)
               {
                  #cargar grid
                  $this->loadgrid();
               }
               #conecta con el servidor MySQL
               function conectar(){
                  global $Usuario;
                  global $Clave;
                  global $_SESSION;
                  $this->Database1->SetUserName($Usuario);
                  $this->Database1->SetUserPassword($Clave);
                  $this->Database1->SetDatabaseName($_SESSION['database']);
                  $this->Database1->setConnected(true);
                  return;
               }
               #carga los datos del Grid
               function loadgrid($sender="",$params=""){
                  global $sIdTurnoAct;
                  global $sContrato;
                  $this->conectar();
                  $sql="Select
                          ep.iNumeroEstimacion as Estimacion,
                          te.sDescripcion as Tipo,
                          date_format(ep.dFechaInicio,'%d/%m/%Y') as Fecha_Inicio,
                          date_format(ep.dFechaFinal,'%d/%m/%Y') as Fecha_Final,
                          ep.dMontoMN as Estimado_MN,
                          ep.dRetencionMN as Rentencion_MN
                        From
                          estimacionperiodo ep
                        inner join tiposdeestimacion te on(
                          ep.sIdTipoEstimacion=te.sIdTipoEstimacion
                        )
                        Where
                          ep.sContrato = '$sContrato'
                          And ep.lEstimado = 'No'
                        Order By ep.iNumeroEstimacion";

                   $this->Query1->Active=false;
                   $this->Query1->setSQL($sql);
                   $this->Query1->Active=true;

               }
               function AutorizarEstimacion($sender, $params){
                  #capturar datos requeridos
                  global $sContrato;
                  global $sIdConvenioAct;
                  global $_SESSION;

                  #obtener datos
                  $iNumeroEstimacion =$params;

                  #verificar si se requiere de autentificacion
                  $sTipoSeguridad  = configuracion($sContrato,'sTipoSeguridad');
                  #verifica si el usuario puede validar
                   if($sTipoSeguridad == 'Avanzada'){
                     $this->BasicAuthentication1->setTitle(" Autorizar Estimaciones");
                     $this->BasicAuthentication1->setErrorMessage(" No Puede Autorizar Estimaciones ");
                     $this->BasicAuthentication1->Execute();
                   }
                   #continua si se autentifico correctamente
                   $this->conectar();
                   $this->Memo1->Text="Estimacion : {$iNumeroEstimacion}\n";
                   $_SESSION['errorTransaccion']="";
                   $_SESSION['errorMySql']="";
                   require("procAutorizarEstimacion.php");

               }


        }

        global $application;

        global $Unit1;

        //Creates the form
        $Unit1=new Unit1($application);

        //Read from resource file
        $Unit1->loadResource(__FILE__);

        //Shows the form
        $Unit1->show();

?>
