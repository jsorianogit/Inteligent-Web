<?php
        //Includes
        require_once("vcl/vcl.inc.php");
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
        class FrmAbrirGeneradores extends Page
        {
               public $Image1 = null;
               public $Button1 = null;
               public $autenficacionGenerador = null;
               public $cmdValidaGeneradores = null;
               public $memoMsg = null;
               public $cmdDesautorizar = null;
               public $cmdDesvalidar = null;
               public $dbgGeneradores = null;
               public $cmdValidarReportes = null;
               public $Panel2 = null;
               public $Datasource2 = null;
               public $Query2 = null;
               public $Database2 = null;
               public $Label1 = null;
               public $Panel15 = null;
               function Button1JSClick($sender, $params)
               {

               ?>
                document.location.href="frmAbrirEstimacion.php";
                return false;
               <?php

               }

               #desautorizar generadores
               function cmdDesautorizarJSClick($sender, $params)
               {
               ?>
                  colConsecutivo = 0;
                  colEstimacion = 0+1;
                  colNumeroOrden = 1+1;
                  colGenerador = 2+1;
                  colStatus = 5+1;
                  colFechaFinal = 4+1;
                  colFechaInicio = 4;

                  document.getElementById("memoMsg").value="";
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
                        //alert(estimacion+" : "+numeroOrden+" : "+generador+" : "+status+" : "+fechafinal+" : "+consecutivo+" : "+fechaInicio);
                        <?php
                        echo $this->cmdDesautorizar->ajaxCall("desautorizarGenerador",array(),array("cmdDesautorizar","dbgGeneradores","memoMsg"));
                        ?>
                     }

                  );

                 return false;
                 <?php
               }
               #desautorizar Generador
               function desautorizarGenerador($sender,$params){
                  #capturar datos requeridos
                  global $sContrato;
                  global $sIdConvenioAct;
                  global $_SESSION;
                  $_SESSION['ProcesoDGenerador']="desautorizarGenerador";
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
                     $this->autenficacionGenerador->setTitle(" Desautorizar Generadores ");
                     $this->autenficacionGenerador->setErrorMessage(" No Puede Desautorizar !!");
                     $this->autenficacionGenerador->Execute();
                   }
                   #continua si se autentifico correctamente
                   $this->memoMsg->Text=$this->memoMsg->Text."Generador : {$sNumeroGenerador}\n";

                   $this->conectar();
                   if($lStatus == 'Autorizado'){
                     $sql = "Select
                              iNumeroEstimacion,
                              dFechaInicio,
                              dFechaFinal
                            From
                              estimacionperiodo
                            Where
                              sContrato = '$sContrato'
                              And iNumeroEstimacion = '$iNumeroEstimacion'
                              And lEstimado = 'Si'";
                     $rs = mysql_query($sql);
                     if($row = mysql_fetch_array()){
                        $this->loadDBgrid();
                        $this->memoMsg->Color="#F7C8DE";
                        $this->memoMsg->Text= "No es posible realizar la apertura de un Generador de Obra que pertenezca al periodo de estimacion del
                         $row[1] al $row[2] de la Estimacion No. $row[0] Realiza la DesAutorizacion de la Estimacion para poder
                         realizar esta accion.'";
                     }
                     else{
                        $usuarioValida = ($_SESSION['usuarioDGenerador']=="")?$_SESSION['ssUsuario']:$_SESSION['usuarioDGenerador'];
                        #ponerlo en Validado
                        $sql ="Update estimaciones SET
                                 lStatus = 'Validado',
                                 sIdUsuarioAutoriza = ''
                               Where sContrato = '$sContrato'
                                 And sNumeroOrden = '$sNumeroOrden'
                                 And iNumeroEstimacion = '$iNumeroEstimacion'
                                 And sNumeroGenerador = '$sNumeroGenerador'";
                        mysql_query($sql);
                        $sql = "Insert Into kardex_sistema (
                              sContrato,
                              sIdUsuario,
                              dIdFecha,
                              sHora,
                              sDescripcion,
                              lOrigen)
                            Values (
                              '$sContrato',
                              '$usuarioValida',
                              '".date("Y-m-d")."',
                              '".date("H:i:s")."',
                              'Apertura del Generador No. [$sNumeroGenerador] de la Orden [$sNumeroOrden]. VALIDA $usuarioValida',
                              'Generadores')";
                        mysql_query($sql);
                        $this->loadDBgrid();
                        $this->memoMsg->Color="#C7CCFC";
                        $this->memoMsg->Text=$this->memoMsg->Text."----:Desautorizado\n";
                     }
                   }
                   else{
                     $this->loadDBgrid();
                     $this->memoMsg->Color="#F7C8DE";
                     $this->memoMsg->Text=$this->memoMsg->Text."-----:No se Puede Realizar la Operacion, Posibles Causas:\n";
                     $this->memoMsg->Text=$this->memoMsg->Text."1. El Generador Esta Pendiente/Validado!!\n";
                   }
               }
               #autentificacion
               function autenficacionGeneradorAuthenticate($sender, $params)
               {
                  global $_SESSION;

                  $_SESSION['usuarioDGenerador'] = "";

                  if($_SESSION['ProcesoDGenerador']=="desvalidarGenerador")
                     $proceso = " and lValida='Si' ";
                  else if($_SESSION['ProcesoDGenerador']=="desautorizarGenerador")
                     $proceso = " and lAutoriza='Si' ";

                  $sql = "select sIdUsuario from usuarios ";
                  $sql.= "where sIdUsuario='".$params['username']."'";
                  $sql.=" and sPassword='".$params['password']."'";
                  $sql.="  $proceso ";

                  $rs = mysql_query($sql);
                  if ($row = mysql_fetch_array($rs))
                  {
                     $_SESSION['usuarioDGenerador'] = $row['sIdUsuario'];
                     return(true);
                  }
                  else {
                     $_SESSION['usuarioDGenerador']="";
                     return(false);
                  }
               }

               #desvalidar Generadores
               function desvalidarGenerador($sender,$params){
                  #capturar datos requeridos
                  global $sContrato;
                  global $sIdConvenioAct;
                  global $_SESSION;
                  $_SESSION['ProcesoDGenerador']="desvalidarGenerador";
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
                     $this->autenficacionGenerador->setTitle(" Desvalidar Generadores ");
                     $this->autenficacionGenerador->setErrorMessage(" No Puede Desvalidar Generadores !!");
                     $this->autenficacionGenerador->Execute();
                   }
                   #continua si se autentifico correctamente
                   $this->memoMsg->Text=$this->memoMsg->Text."Generador : {$sNumeroGenerador}\n";

                   $this->conectar();
                   if($lStatus == 'Validado'){
                     //mysql_query("begin");
                     $usuarioValida = ($_SESSION['usuarioDGenerador']=="")?$_SESSION['ssUsuario']:$_SESSION['usuarioDGenerador'];
                     #ponerlo en pendiente
                     $sql="Update estimaciones SET
                                    lStatus ='Pendiente',
                                    sIdUsuarioValida = '$usuarioValida',
                                    dMontoMN = 0,
                                    dMontoDLL = 0
                                 Where
                                    sContrato = '$sContrato'
                                    And sNumeroOrden ='$sNumeroOrden'
                                    And iNumeroEstimacion = '$iNumeroEstimacion'
                                    And sNumeroGenerador = '$sNumeroGenerador'";
                     mysql_query($sql);
                     $sql = "Insert Into kardex_sistema (
                              sContrato,
                              sIdUsuario,
                              dIdFecha,
                              sHora,
                              sDescripcion,
                              lOrigen)
                            Values (
                              '$sContrato',
                              '$usuarioValida',
                              '".date("Y-m-d")."',
                              '".date("H:i:s")."',
                              'Apertura del Generador No. [' +  Estimaciones.FieldValues ['sNumeroGenerador']  + '] de la Orden [' + tsNumeroOrden.Text + ']. AUTORIZA ' + global_autoriza ',
                              'Apertura del Generador No. [$sNumeroGenerador] de la Orden [$sNumeroOrden]. VALIDA $usuarioValida',
                              'Generadores')";
                     mysql_query($sql);
                     $this->loadDBgrid();
                     $this->memoMsg->Color="#C7CCFC";
                     $this->memoMsg->Text=$this->memoMsg->Text."----:Desvalidado\n";
                   }
                   else{
                     $this->loadDBgrid();
                     $this->memoMsg->Color="#F7C8DE";
                     $this->memoMsg->Text=$this->memoMsg->Text."-----:No se Puede Realizar la Operacion, Posibles Causas:\n";
                     $this->memoMsg->Text=$this->memoMsg->Text."1. El Generador Esta Pendiente/Autorizado!!\n";
                   }
               }
               function cmdValidarReportesJSClick($sender, $params)
               {

               ?>
               document.location.href="frmAbrirReportes.php";
               return false;
               <?php

               }

               function cmdDesvalidarJSClick($sender, $params)
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

                  document.getElementById("memoMsg").value="";
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
                        echo $this->cmdDesvalidar->ajaxCall("desvalidarGenerador",array(),array("cmdDesvalidar","dbgGeneradores","memoMsg"));
                        ?>
                     }

                  );

                 return false;
                 <?php
               }

               function FrmAbrirGeneradoresShow($sender, $params)
               {
                  #cargar grid
                  $this->loadDBgrid();
               }

               #carga los datos del Grid
               function loadDBgrid($sender="",$params=""){
                  global $sIdTurnoAct;
                  global $sContrato;
                  $this->conectar();
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
                          and lStatus<>'Pendiente'";
                   $this->Query2->Active=false;
                   $this->Query2->setSQL($sql);
                   $this->Query2->Active=true;
               }
               #conecta con el servidor MySQL
               function conectar(){
                  global $Usuario;
                  global $Clave;
                  global $_SESSION;
                  $this->Database2->setUserName($Usuario);
                  $this->Database2->SetUserPassword($Clave);
                  $this->Database2->SetDatabaseName($_SESSION['database']);
                  $this->Database2->setConnected(true);
               }

        }

        global $application;

        global $FrmAbrirGeneradores;

        //Creates the form
        $FrmAbrirGeneradores=new FrmAbrirGeneradores($application);

        //Read from resource file
        $FrmAbrirGeneradores->loadResource(__FILE__);

        //Shows the form
        $FrmAbrirGeneradores->show();

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
