<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("auth.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require("mysql.inc.php");
        require("fnContrato.php");
        require("fnUtilerias.php");

        //Class definition
        class FrmValidarReportes extends Page
        {
               public $cmbNumeroOrdenValii = null;
               public $Image1 = null;
               public $cmdEstimaciones = null;
               public $cmdValidarGeneradores = null;
               public $cmdValidarReportes = null;
               public $autenficacion = null;
               public $Label2 = null;
               public $Mensajes = null;
               public $cmdAutoriza = null;
               public $cmdValida = null;
               public $DBGrid1 = null;
               public $Datasource1 = null;
               public $Query1 = null;
               public $Database1 = null;
               public $Panel1 = null;
               public $Label1 = null;
               public $Panel2 = null;
               function cmbNumeroOrdenValiChange($sender, $params)
               {

                   $this->loadDBgrid();

               }


               function cmdEstimacionesJSClick($sender, $params)
               {

               ?>
               document.location.href="frmAutorizarEstimacion.php";
               return false;
               <?php

               }

               function cmdValidarGeneradoresJSClick($sender, $params)
               {

               ?>
                  document.location.href="frmValidarGeneradores.php";
                  return false;

               <?php

               }


               function autenficacionAuthenticate($sender, $params)
               {
                  global $_SESSION;
                  $_SESSION['usuarioValida'] = "";
                  if($_SESSION['ProcesoA']=="AbreValidar")
                     $proceso = " and lValida='Si' ";
                  else if($_SESSION['ProcesoA']=="AbreAutorizar")
                     $proceso = " and lAutoriza='Si' ";

                  $sql = "select sIdUsuario from usuarios ";
                  $sql.= "where sIdUsuario='".$params['username']."'";
                  $sql.=" and sPassword='".$params['password']."'";
                  $sql.="  $proceso ";

                  $rs = mysql_query($sql);
                  if ($row = mysql_fetch_array($rs))
                  {
                     $_SESSION['usuarioValida'] = $row['sIdUsuario'];
                     return(true);
                  }
                  else {
                     $_SESSION['usuarioValida']="";
                     return(false);
                  }
               }

               #devuelve el status del proceso del contrato
               function cStatusProceso($sContrato){
                  $sql = "select cStatusProceso from configuracion where sContrato='$sContrato'";
                  if($row=mysql_fetch_array(mysql_query($sql))){
                     return $row[0];
                  }
                  else
                     return false;
               }
               #devuelve el departamento del usuario logueado
               function departamento(){
                  global $_SESSION;
                  $sIdUsuario = $_SESSION['ssUsuario'];
                  $sql = "select sIdDepartamento from usuarios where sIdUsuario='$sIdUsuario'";
                  $rs = mysql_query($sql);
                  if($row = mysql_fetch_array($rs)){
                     return $row[0];
                  }
                  else
                     return false;
               }

               function cmdAutorizaJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  colFecha = 0;
                  colNumReport=1;
                  colConvenio=2;
                  colTurno=4;
                  colStatus=6;
                  document.getElementById("Mensajes").value="";
                  DBGrid1.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = DBGrid1.getTableModel();

                        var fecha = tableModel.getValue(colFecha, index);
                        var numReporte =  tableModel.getValue(colNumReport, index) ;
                        var convenio =  tableModel.getValue(colConvenio, index);
                        var turno =  tableModel.getValue(colTurno, index) ;
                        var status =  tableModel.getValue(colStatus, index) ;

                        if(fecha != "")params = fecha+ "]"; else params="_]";
                        if(numReporte != "")params = params + numReporte + "]"; else params = params + "_]";
                        if(convenio != "")params = params + convenio + "]"; else params = params + "_]";
                        if(turno != "")params = params + turno + "]"; else params = params + "_]";
                        if(status != "")params = params + status + "]"; else params = params + "_]";

                          //params=index+1;
                        <?php
                        echo $this->cmdAutoriza->ajaxCall("obtieneReporteAut",array(),array("cmdAutoriza","DBGrid1","Mensajes"));
                        ?>
                     }

                  );
                 return false;

               <?php

               }

               function FrmValidarReportesJSLoad($sender, $params)
               {

               ?>
               //Add your javascript code here
               //   var hz=window.screen.height;
               //   var wz=window.screen.width;
               //   switch(wz){
               //      case(800):
                //        wz=100;
                //        break;
                //     case(1024):
                //        wz=200;
                //        break;
                //     case(1280):
                //        wz=350;
                //        break;
                //     default:
                //        wz=250;
                //        break;
                 // }
                 // document.getElementById("Panel2_outer").style.pixelLeft= wz;
               <?php

               }
               function ordenSeleccionada(){
                  global $sContrato,$orden;
                  $orden =  $this->cmbNumeroOrdenVali->readItemIndex();
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
                  $this->conectar();
                  $orden = $this->ordenSeleccionada();
                  global $sIdTurnoAct;
                  $sIdTurno=$sIdTurnoAct;
                  global $sContrato;
                  $sql = "select r.dIdFecha as Fecha,
                        r.sNumeroReporte as No_Reporte,
                        c.sIdConvenio as Cve_Convenio,
                        c.sDescripcion as Convenio,
                        t.sIdTurno as Cve_Turno,
                        t.sDescripcion as Turno,
                        r.lStatus as Status,
                        r.sIdUsuario as Creador,
                        r.sIdUsuarioAutoriza as Autoriza
                     from reportediario r
                     inner join turnos t
                        on (t.sContrato=r.sContrato and r.sIdTurno=t.sIdTurno)
                     inner join convenios c
                     on (c.sContrato=r.sContrato and c.sIdConvenio=r.sIdConvenio)
                     where
                     r.sContrato='$sContrato'
                     and r.lStatus<>'Autorizado'
                     and r.sNumeroOrden='$orden'
                     order by r.dIdFecha desc";
                     //   and r.sIdTurno='$sIdTurno'
                   $this->Query1->Active=false;
                   $this->Query1->setSQL($sql);
                   $this->Query1->Active=true;
               }
               #boton valida
               function cmdValidaJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  colFecha = 0;
                  colNumReport=1;
                  colConvenio=2;
                  colTurno=4;
                  colStatus=6;
                  document.getElementById("Mensajes").value="";
                  DBGrid1.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = DBGrid1.getTableModel();

                        var fecha = tableModel.getValue(colFecha, index);
                        var numReporte =  tableModel.getValue(colNumReport, index) ;
                        var convenio =  tableModel.getValue(colConvenio, index);
                        var turno =  tableModel.getValue(colTurno, index) ;
                        var status =  tableModel.getValue(colStatus, index) ;

                        if(fecha != "")params = fecha+ "]"; else params="_]";
                        if(numReporte != "")params = params + numReporte + "]"; else params = params + "_]";
                        if(convenio != "")params = params + convenio + "]"; else params = params + "_]";
                        if(turno != "")params = params + turno + "]"; else params = params + "_]";
                        if(status != "")params = params + status + "]"; else params = params + "_]";

                          //params=index+1;
                        <?php
                        echo $this->cmdValida->ajaxCall("obtieneReporteVal",array(),array("cmdValida","DBGrid1","Mensajes"));
                        ?>
                     }

                  );

                 return false;
                 <?php

               }
               #procedimiento de autorizacion de reportes
               function autorizaReporte($sContrato,$sNumeroOrden,$Convenio,$dIdFecha,$sIdTurno,$status,$sNumeroReporte){
                  global $sIdConvenioAct;

                  $sIdUsuario = ($_SESSION['usuarioValida']!="")?$_SESSION['usuarioValida']:$_SESSION['ssUsuario'];
                  #iniciar transaccion
                  $_SESSION['errorTransaccion']="";
                  $_SESSION['errorMySql']="";
                  mysql_query("begin");
                  #--1:
                  require("procAutoriza.php");

                  #--2:
                  $sql ="Update reportediario SET lStatus = 'Autorizado' , sIdUsuarioAutoriza = '$sIdUsuario'
                         Where sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden' And dIdFecha = '$dIdFecha' And sIdTurno = '$sIdTurno'";
                  queryTransaccion($sql);

                  #--3: Actualizo Kardex del Sistema


                  $sql ="Insert Into kardex_sistema (sContrato, sIdUsuario, dIdFecha, sHora, sDescripcion, lOrigen)
                         Values ('$sContrato', '$sIdUsuario', '".date('Y-m-d')."','".date('H:i:s')."','Autorización del Reporte Diario No. $sNumeroReporte del dia $dIdFecha AUTORIZA $sIdUsuario ','Reporte Diario')";
                  queryTransaccion($sql);
                  $cadena = "### 70: $sql \n query: " . $sql;
                  GuardaQuery($cadena);

                  #ejcutar transaccion
                  $finalizado = true;
                   if($_SESSION['errorTransaccion']!=true){
                      mysql_query("commit");
                      $_SESSION['errorTransaccion']="";
                      $finalizado = true;
                   }
                   else{
                     mysql_query("rollback");
                     $_SESSION['errorMySql'];
                     $_SESSION['errorTransaccion']="";
                     $finalizado = false;
                   }
                   return $finalizado;
               }
               #procedimiento de validacion de reportes
               function validaReporte($sContrato,$sNumeroOrden,$sIdConvenio,$dIdFecha,$sIdTurno,$status,$sNumeroReporte){
                  global $sContrato;
                  global $sIdConvenioAct;
                  $_SESSION['errorTransaccion']="";
                  $_SESSION['errorMySql']="";
                  require("procValida.php");
                  return $finalizado;

               }
               #obtiene los datos y llama a el procedimiento de autorizacion
               function obtieneReporteAut($sender,$params){
                  #obtiene los datos necesarios
                  $orden = $this->ordenSeleccionada();
                  global $sContrato;
                  global $sIdConvenioAct;
                  $_SESSION['ProcesoA']="AbreAutorizar";
                  $parametros = explode("]",$params);
                  $fecha = ($parametros[0]=="_")?"":$parametros[0];
                  $numReporte = ($parametros[1]=="_")?"":$parametros[1];
                  $convenio = ($parametros[2]=="_")?"":$parametros[2];
                  $turno = ($parametros[3]=="_")?"":$parametros[3];
                  $status = ($parametros[4]=="_")?"":$parametros[4];
                  #verificar si se requiere de autentificacion
                  $sql = "select sTipoSeguridad from configuracion where sContrato='$sContrato';";
                  $rs = mysql_query($sql);
                  if($row = mysql_fetch_array($rs)){
                     $sTipoSeguridad = $row['sTipoSeguridad'];
                  }

                  if($sTipoSeguridad=='Avanzada'){
                     $this->autenficacion->setTitle(" Autorizar Reporte Diarios ");
                     $this->autenficacion->setErrorMessage(" No Puede Autorizar Reportes ");
                     $this->autenficacion->Execute(" and lValida='Si' ");
                   }

                   #continua si se autentifico correctamente
                  $this->Mensajes->Color="#C7CCFC";
                  $this->Mensajes->Text="Reporte: Fecha[$fecha] NumeroReporte[$numReporte] Convenio[$convenio] Turno[$turno] Status[$status]\n";

                  $this->conectar();

                  if($status=='Validado' and $convenio==$sIdConvenioAct /*and $autoriza*/){
                     $finalizado = $this->autorizaReporte($sContrato,$orden,$convenio,$fecha,$turno,$status,$numReporte);
                     if($finalizado){
                        $this->Mensajes->Text=$this->Mensajes->Text."-----:Autorizado!!\n";
                      }
                     else{
                        $this->Mensajes->Color="#F7C8DE";
                        $this->Mensajes->Text=  $_SESSION['errorMySql'];
                     }
                     $this->loadDBgrid();
                   }
                   else{
                     $this->Mensajes->Color="#FF8080";
                     $this->Mensajes->Text.="-----:No se Puede Realizar la Operacion, Posibles Causas:\n ";
                     $this->Mensajes->Text.="1. El Reporte Pertenece a otro convenio!!\n";
                     $this->Mensajes->Text.="2. El Reporte No Esta Validad!!\n";
                   }
                  /* if(!$autoriza and $sTipoSeguridad!='Avanzada'){
                     $this->Mensajes->Color="#FF8080";
                     $this->Mensajes->Text=$this->Mensajes->Text."-----:No puede Autorizar Reportes!!\n";
                   }*/



               }
               #obtiene los datos y llama al procedimiento de validacion
               function obtieneReporteVal($sender,$params){
                  #capturar datos requeridos
                  global $sContrato;
                  global $sIdConvenioAct;
                  global $_SESSION;
                   $_SESSION['ProcesoA']="AbreValidar";
                  $orden = $this->ordenSeleccionada();
                  $parametros = explode("]",$params);
                  $fecha = ($parametros[0]=="_")?"":$parametros[0];
                  $numReporte = ($parametros[1]=="_")?"":$parametros[1];
                  $convenio = ($parametros[2]=="_")?"":$parametros[2];
                  $turno = ($parametros[3]=="_")?"":$parametros[3];
                  $status = ($parametros[4]=="_")?"":$parametros[4];
                  #verificar si se requiere de autentificacion
                  $sql = "select sTipoSeguridad from configuracion where sContrato='$sContrato';";
                  $rs = mysql_query($sql);
                  if($row = mysql_fetch_array($rs)){
                     $sTipoSeguridad = $row['sTipoSeguridad'];
                  }
                  #verifica si el usuario puede validar
                   if($sTipoSeguridad=='Avanzada'){
                     $this->autenficacion->setTitle(" Validar Reporte Diarios ");
                     $this->autenficacion->setErrorMessage(" No Puede Validar Reportes ");
                     $this->autenficacion->Execute();
                   }
                   #continua si se autentifico correctamente
                   $this->Mensajes->Text=$this->Mensajes->Text."Reporte: Fecha[$fecha] NumeroReporte[$numReporte] Convenio[$convenio] Turno[$turno] Status[$status]\n";

                   $this->conectar();

                  if($status=='Pendiente' and $convenio==$sIdConvenioAct/* and $valida*/){
                     $finalizado = $this->validaReporte($sContrato,$orden,$convenio,$fecha,$turno,$status,$numReporte);
                     $this->loadDBgrid();
                     if($finalizado){
                        $this->Mensajes->Color="#C7CCFC";
                        $this->Mensajes->Text=$this->Mensajes->Text."----:Validadado\n";
                     }
                     else{
                        $this->Mensajes->Color="#F7C8DE";
                        $this->Mensajes->Text=  $_SESSION['errorMySql'];
                     }

                   }
                   else{
                     $this->Mensajes->Color="#F7C8DE";
                     $this->Mensajes->Text=$this->Mensajes->Text."-----:No se Puede Realizar la Operacion, Posibles Causas:\n";
                     $this->Mensajes->Text=$this->Mensajes->Text."1. El Reporte Esta Pertenece a otro convenio!!\n";
                     $this->Mensajes->Text=$this->Mensajes->Text."2. El Reporte Esta Validado/Autorizado!!\n";
                   }
                   /*if(!$valida and $sTipoSeguridad!='Avanzada'){
                     $this->Mensajes->Color="#F7C8DE";
                     $this->Mensajes->Text=$this->Mensajes->Text."-----:No puede Validar Reportes!!\n";

                   } */


               }
               function cmbNumeroOrdenValiiChange($sender, $params)
               {
                  $this->loadDBgrid();
               }

               function FrmValidarReportesShow($sender, $params)
               {
                  $this->loadDBgrid();
               }
               #carga los numeros de ordenes en el combo box
               function FrmValidarReportesBeforeShow($sender, $params)
               {
                  $this->conectar();
                  global $sContrato;
                  $sql = "select sNumeroOrden from ordenesdetrabajo where sContrato='$sContrato'";
                  $rs = mysql_query($sql);
                  while($row = mysql_fetch_array($rs))
                     $it[$row[0]]=$row[0];
                  $this->cmbNumeroOrdenVali->setItems($it);
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


        }

        global $application;

        global $FrmValidarReportes;

        //Creates the form
        $FrmValidarReportes=new FrmValidarReportes($application);

        //Read from resource file
        $FrmValidarReportes->loadResource(__FILE__);
        //Shows the form
        $FrmValidarReportes->show();

?>
<script>
//poner el grid como solo lectura
function Edit(DBGrid1_tableModel){
   var valor = DBGrid1_tableModel.getValue(0, 0);
   if(valor != null)
   {
      for(var i = 0; i<9; i++)
         DBGrid1_tableModel.setColumnEditable(i, false);
      DBGrid1.setColumnWidth(2,0);
      DBGrid1.setColumnWidth(4,0);
   }
}
setInterval ("Edit(DBGrid1_tableModel)",10);
Edit(DBGrid1_tableModel);
</script>
