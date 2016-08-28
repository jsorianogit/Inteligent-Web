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
        class FrmDesautorizarEstimacion extends Page
        {
               public $Image1 = null;
               public $memoMensajes2 = null;
               public $dbgEstimaciones22 = null;
               public $autentificacionEstimacion = null;
               public $cmdDesautorizarEstimacion = null;
               public $Button3 = null;
               public $cmdValidaGeneradores = null;
               public $cmdValidarReportes = null;
               public $Panel2 = null;
               public $Datasource1 = null;
               public $Query1 = null;
               public $Database1 = null;
               public $Label2 = null;
               public $Panel16 = null;
               function autentificacionEstimacionAuthenticate($sender, $params)
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

               function DesautorizarEstimacion($sender, $params) {
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
                     $this->autentificacionEstimacion->setTitle(" Desautorizar Estimaciones");
                     $this->autentificacionEstimacion->setErrorMessage(" No Puede Desautorizar Estimaciones ");
                     $this->autentificacionEstimacion->Execute();
                   }
                   #continua si se autentifico correctamente
                   $this->memoMensajes2->Text=$this->memoMensajes2->Text."Estimacion : {$iNumeroEstimacion}\n";

                   $this->conectar();
                   //mysql_query("begin");
                   $sql="UPDATE
                           estimacionperiodo
                         SET
                           lEstimado = 'No',
                           dMontoMNGeneradores = 0,
                           dMontoDLLGeneradores = 0,
                           dMontoMN = 0 ,
                           dMontoDLL = 0,
                           dMontoAcumuladoMN = 0,
                           dMontoAcumuladoDLL = 0,
                           sIdUsuarioAutoriza = ''
                         Where
                           sContrato = '$sContrato'
                           And iNumeroEstimacion ='$iNumeroEstimacion'";
                  mysql_query($sql);

                  //mysql_query("rollback");
                  $this->loadDBgrid();
                  $this->memoMensajes2->Color="#C7CCFC";
                  $this->memoMensajes2->Text=$this->memoMensajes2->Text."----:Desautorizada\n";

               }
               function cmdDesautorizarEstimacionJSClick($sender, $params)
               {

                 ?>

               //Add your javascript code here
                  colEstimacion = 0;

                  document.getElementById("memoMensajes2").value="";
                  dbgEstimaciones2.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = dbgEstimaciones2.getTableModel();
                        var estimacion = tableModel.getValue(colEstimacion, index);
                        params = estimacion;
                        <?php
                        echo $this->cmdDesautorizarEstimacion->ajaxCall("DesautorizarEstimacion",array(),array("cmdDesautorizarEstimacion","dbgEstimaciones2","memoMensajes2"));
                        ?>
                     }

                  );

                 return false;
                 <?php

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
               }
               #carga los datos del Grid
               function loadDBgrid($sender="",$params=""){
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
                          And ep.lEstimado = 'Si'
                        Order By ep.iNumeroEstimacion";
                   $this->Query1->Active=false;
                   $this->Query1->setSQL($sql);
                   $this->Query1->Active=true;
               }
               function FrmDesautorizarEstimacionShow($sender, $params)
               {
                  #cargar grid
                  $this->loadDBgrid();
               }

               function cmdValidaGeneradoresJSClick($sender, $params)
               {

               ?>
                 document.location.href="frmAbrirGeneradores.php";
                 return false;
               <?php

               }


               function cmdValidarReportesJSClick($sender, $params)
               {
               ?>
                  document.location.href="frmAbrirReportes.php";
                  return false;
               <?php

               }

        }

        global $application;

        global $FrmDesautorizarEstimacion;

        //Creates the form
        $FrmDesautorizarEstimacion=new FrmDesautorizarEstimacion($application);

        //Read from resource file
        $FrmDesautorizarEstimacion->loadResource(__FILE__);

        //Shows the form
        $FrmDesautorizarEstimacion->show();

?>
