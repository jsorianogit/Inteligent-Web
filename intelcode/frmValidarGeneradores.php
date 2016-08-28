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
        class frmValidarGeneradores extends Page
        {
               public $Image1 = null;
               public $cmdEstimaciones = null;
               public $cmdValidarGeneradores = null;
               public $cmdValidarReportes = null;
               public $Database1 = null;
               public $Datasource1 = null;
               public $Query1 = null;
               public $panelGeneradores = null;
               public $cmbNumeroOrden = null;
               public $autentificacionGenerador = null;
               public $cmdAutorizaGenerador = null;
               public $cmdValidaGenerador = null;
               public $memoMensajes = null;
               public $dbgGeneradores = null;
               public $Panel2 = null;
               public $Label1 = null;
               public $Label3 = null;
               function cmdEstimacionesJSClick($sender, $params)
               {

               ?>
               document.location.href="frmAutorizarEstimacion.php";
               return false;

               <?php

               }

               function cmdAutorizaGeneradorJSClick($sender, $params)
               {
               ?>

               //Add your javascript code here
                  colConsecutivo = 0;
                  colEstimacion = 0+1;
                  colNumeroOrden = 1+1;
                  colGenerador = 2+1;
                  colStatus = 5+1;
                  colFechaFinal = 4+1;
                  colFechaInicio = 4;

                  document.getElementById("memoMensajes").value="";
                  dbgGeneradores.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = dbgGeneradores.getTableModel();

                        var estimacion = tableModel.getValue(colEstimacion, index);
                        var numeroOrden =  tableModel.getValue(colNumeroOrden, index) ;
                        var generador =  tableModel.getValue(colGenerador, index);
                        var status =  tableModel.getValue(colStatus, index) ;
                        var fechafinal =tableModel.getValue(colFechaFinal, index) ;
                        var consecutivo = tableModel.getValue(colConsecutivo,index);
                        var fechaInicio = tableModel.getValue(colFechaInicio,index);

                        if(estimacion != "")params = estimacion+ "]"; else params="_]";
                        if(numeroOrden != "")params = params + numeroOrden + "]"; else params = params + "_]";
                        if(generador != "")params = params + generador + "]"; else params = params + "_]";
                        if(status != "")params = params + status + "]"; else params = params + "_]";
                        if(fechafinal!= "")params = params + fechafinal + "]"; else params = params + "_]";
                        if(consecutivo!= "")params = params + consecutivo + "]"; else params = params + "_]";
                        if(fechaInicio!= "")params = params + fechaInicio + "]"; else params = params + "_]";
                        <?php
                        echo $this->cmdValidaGenerador->ajaxCall("AutorizarGenerador",array(),array("cmdValidaGenerador","dbgGeneradores","memoMensajes"));
                        ?>
                     }

                  );

                 return false;
                 <?php

               }

               function cmdValidarReportesJSClick($sender, $params)
               {

               ?>
                  document.location.href="frmValidarReportes.php";
                  return false;
               <?php

               }



               function autentificacionGeneradorAuthenticate($sender, $params)
               {
                  global $_SESSION;
                  $_SESSION['usuarioVGenerador'] = "";
                  if($_SESSION['ProcesoVGenerador']=="validarGenerador")
                     $proceso = " and lValida='Si' ";
                  else if($_SESSION['ProcesoVGenerador']=="autorizaGenerador")
                     $proceso = " and lAutoriza='Si' ";
                  $sql = "select sIdUsuario from usuarios ";
                  $sql.= "where sIdUsuario='".$params['username']."'";
                  $sql.=" and sPassword='".$params['password']."'";
                  $sql.="  $proceso ";

                  $rs = mysql_query($sql);
                  if ($row = mysql_fetch_array($rs))
                  {
                     $_SESSION['usuarioVGenerador'] = $row['sIdUsuario'];
                     return(true);
                  }
                  else {
                     $_SESSION['usuarioVGenerador']="";
                     return(false);
                  }


               }

               function cmdValidaGeneradorJSClick($sender, $params)
               {
               ?>

               //Add your javascript code here
                  colConsecutivo = 0;
                  colEstimacion = 0+1;
                  colNumeroOrden = 1+1;
                  colGenerador = 2+1;
                  colStatus = 5+1;
                  colFechaFinal = 4+1;
                  colFechaInicio = 4;

                  document.getElementById("memoMensajes").value="";
                  dbgGeneradores.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = dbgGeneradores.getTableModel();

                        var estimacion = tableModel.getValue(colEstimacion, index);
                        var numeroOrden =  tableModel.getValue(colNumeroOrden, index) ;
                        var generador =  tableModel.getValue(colGenerador, index);
                        var status =  tableModel.getValue(colStatus, index) ;
                        var fechafinal =tableModel.getValue(colFechaFinal, index) ;
                        var consecutivo = tableModel.getValue(colConsecutivo,index);
                        var fechaInicio = tableModel.getValue(colFechaInicio,index);

                        if(estimacion != "")params = estimacion+ "]"; else params="_]";
                        if(numeroOrden != "")params = params + numeroOrden + "]"; else params = params + "_]";
                        if(generador != "")params = params + generador + "]"; else params = params + "_]";
                        if(status != "")params = params + status + "]"; else params = params + "_]";
                        if(fechafinal!= "")params = params + fechafinal + "]"; else params = params + "_]";
                        if(consecutivo!= "")params = params + consecutivo + "]"; else params = params + "_]";
                        if(fechaInicio!= "")params = params + fechaInicio + "]"; else params = params + "_]";
                        <?php
                        echo $this->cmdValidaGenerador->ajaxCall("validarGenerador",array(),array("cmdValidaGenerador","dbgGeneradores","memoMensajes"));
                        ?>
                     }

                  );

                 return false;
                 <?php
               }

               #cargar grid con el nuevo numero de orden
               function cmbNumeroOrdenChange($sender, $params)
               {
                  $this->loadDBgrid();
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
               #numero de orden se seleccionada en el combo
               function ordenSeleccionada(){
                  global $sContrato;
                  $orden =  $this->cmbNumeroOrden->readItemIndex();
                  if($orden<0){
                     $sql = "select sNumeroOrden
                              from ordenesdetrabajo
                           where sContrato='$sContrato' limit 1";
                      $rs = mysql_query($sql);
                     if($row = mysql_fetch_array($rs)){
                        $orden=$row['sNumeroOrden'];
                     }

                  }
                  return $orden;
               }
               #carga los datos del Grid
               function loadDBgrid($sender="",$params=""){
                  global $sIdTurnoAct;
                  global $sContrato;
                  $this->conectar();
                 // $orden = $this->ordenSeleccionada();
                  $sql ="select
                           iConsecutivo as Consecutivo,
                           iNumeroEstimacion as Estimacion,
                           sNumeroOrden as Orden,
                           sNumeroGenerador Generador,
                           date_format(dFechaInicio,'%d/%m/%Y') Fecha_Inicio,
                           date_format(dFechaFinal,'%d/%m/%Y') as Fecha_Final,
                           lStatus as Status,
                           sIdUsuario as Creador,
                           sIdUsuarioValida as Valida,
                           sIdUsuarioAutoriza as Autorizar
                        from
                          estimaciones
                        where
                          sContrato='$sContrato'
                          #and sNumeroOrden='$orden'
                          and lStatus<>'Autorizado'";
                   $this->Query1->Active=false;
                   $this->Query1->setSQL($sql);
                   $this->Query1->Active=true;
               }
               #al mostrar el formulario, cargar el grid y el combo
               function frmValidarGeneradoresShow($sender, $params)
               {
                  #cargar grid
                  $this->loadDBgrid();
                  #cargar combo de numeros de orden
                  global $sContrato;
                  $sql = "select
                                sNumeroOrden
                         from
                                ordenesdetrabajo
                         where sContrato='$sContrato'";
                  $rs = mysql_query($sql);
                  while($row = mysql_fetch_array($rs))
                     $it[$row[0]]=$row[0];
                  $this->cmbNumeroOrden->setItems($it);
               }

               #validar generador
               function validarGenerador($sender,$params){
                  #capturar datos requeridos
                  global $sContrato;
                  global $sIdConvenioAct;
                  global $_SESSION;
                  $_SESSION['ProcesoVGenerador']="validarGenerador";
                  //$orden = $this->ordenSeleccionada();
                  #separar datos
                  $parametros = explode("]",$params);
                  #obtener datos
                  $iNumeroEstimacion = ($parametros[0]=="_")?"":$parametros[0];
                  $sNumeroOrden = ($parametros[1]=="_")?"":$parametros[1];
                  $sNumeroGenerador = ($parametros[2]=="_")?"":$parametros[2];
                  $lStatus = ($parametros[3]=="_")?"":$parametros[3];
                  $dFechaFinal =($parametros[4]=="_")?"":formatoFechaPer($parametros[4],"Y-m-d");
                  $iConsecutivoGrid = ($parametros[5]=="_")?"":$parametros[5];
                  $dFechaInicio =($parametros[6]=="_")?"":formatoFechaPer($parametros[6],"Y-m-d");
                  #verificar si se requiere de autentificacion
                  $sTipoSeguridad  = configuracion($sContrato,'sTipoSeguridad');
                  #verifica si el usuario puede validar
                   if($sTipoSeguridad == 'Avanzada'){
                     $this->autentificacionGenerador->setTitle(" Validar Generadores ");
                     $this->autentificacionGenerador->setErrorMessage(" No Puede Validar Generadores ");
                     $this->autentificacionGenerador->Execute();
                   }
                   #continua si se autentifico correctamente
                   $this->memoMensajes->Text=$this->memoMensajes->Text."Generador : {$sNumeroGenerador}\n";

                   $this->conectar();

                  if($lStatus == 'Pendiente'){
                     $_SESSION['errorTransaccion']="";
                     $_SESSION['errorMySql']="";
                     require("procValidarGenerador.php");
                     $this->loadDBgrid();
                     if($lPoder){
                        if($finalizado){
                           $this->memoMensajes->Color="#C7CCFC";
                           $this->memoMensajes->Text=$this->memoMensajes->Text."----:Validadado\n";
                        }
                        else{
                           $this->memoMensajes->Color="#F7C8DE";
                           $this->memoMensajes->Text=$_SESSION['errorMySql'];
                        }
                     }

                   }
                   else{
                     $this->loadDBgrid();
                     $this->memoMensajes->Color="#F7C8DE";
                     $this->memoMensajes->Text=$this->memoMensajes->Text."-----:No se Puede Realizar la Operacion, Posibles Causas:\n";
                     $this->memoMensajes->Text=$this->memoMensajes->Text."1. El Generador Esta Validado/Autorizado!!\n";
                   }
               }
               #bvalidar generador
               function AutorizarGenerador($sender,$params){
                  #capturar datos requeridos
                  global $sContrato;
                  global $sIdConvenioAct;
                  global $_SESSION;
                  $_SESSION['ProcesoVGenerador']="autorizaGenerador";
                  $orden = $this->ordenSeleccionada();
                  #separar datos
                  $parametros = explode("]",$params);
                  #obtener datos
                  $iNumeroEstimacion = ($parametros[0]=="_")?"":$parametros[0];
                  $sNumeroOrden = ($parametros[1]=="_")?"":$parametros[1];
                  $sNumeroGenerador = ($parametros[2]=="_")?"":$parametros[2];
                  $lStatus = ($parametros[3]=="_")?"":$parametros[3];
                  $dFechaFinal =($parametros[4]=="_")?"":formatoFechaPer($parametros[4],"Y-m-d");
                  $iConsecutivoGrid = ($parametros[5]=="_")?"":$parametros[5];
                  $dFechaInicio =($parametros[6]=="_")?"":formatoFechaPer($parametros[6],"Y-m-d");
                  #verificar si se requiere de autentificacion
                  $sTipoSeguridad  = configuracion($sContrato,'sTipoSeguridad');
                  #verifica si el usuario puede validar
                   if($sTipoSeguridad == 'Avanzada'){
                     $this->autentificacionGenerador->setTitle(" Validar Generadores ");
                     $this->autentificacionGenerador->setErrorMessage(" No Puede Autorizar Generadores ");
                     $this->autentificacionGenerador->Execute();
                   }
                   #continua si se autentifico correctamente
                   $this->memoMensajes->Text=$this->memoMensajes->Text."Generador : {$sNumeroGenerador}\n";

                   $this->conectar();

                  if($lStatus == 'Validado'){
                     $_SESSION['errorTransaccion']="";
                     $_SESSION['errorMySql']="";
                     require("procAutorizaGeneradores.php");
                     $this->loadDBgrid();
                     if($lPoder){
                       if($finalizado){
                           $this->memoMensajes->Color="#C7CCFC";
                           $this->memoMensajes->Text=$this->memoMensajes->Text."----:Autorizado\n";
                        }
                        else{
                           $this->memoMensajes->Color="#F7C8DE";
                           $this->memoMensajes->Text=$_SESSION['errorMySql'];
                        }
                     }

                   }
                   else{
                     $this->loadDBgrid();
                     $this->memoMensajes->Color="#F7C8DE";
                     $this->memoMensajes->Text=$this->memoMensajes->Text."-----:No se Puede Realizar la Operacion, Posibles Causas:\n";
                     $this->memoMensajes->Text=$this->memoMensajes->Text."1. El Generador Esta Autorizado!!\n";
                   }
               }

        }

        global $application;

        global $frmValidarGeneradores;

        //Creates the form
        $frmValidarGeneradores=new frmValidarGeneradores($application);

        //Read from resource file
        $frmValidarGeneradores->loadResource(__FILE__);

        //Shows the form
        $frmValidarGeneradores->show();
?>
<script>
//poner el grid como solo lectura
function Edit(dbgGeneradores_tableModel){
   var valor = dbgGeneradores_tableModel.getValue(0, 0);
   if(valor != null)
   {
      for(var i = 0; i<=9; i++)
         dbgGeneradores_tableModel.setColumnEditable(i, false);
      dbgGeneradores.setColumnWidth(0,0);
   }
}
setInterval ("Edit(dbgGeneradores_tableModel)",10);
Edit(DBGrid1_tableModel);
</script>
