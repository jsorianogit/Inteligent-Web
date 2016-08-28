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
        require("fnUtilerias.php");
        //Class definition
        class FrmAbrirReportes extends Page
        {
               public $Image1 = null;
               public $Button1 = null;
               public $cmdValidarGeneradores = null;
               public $cmdValidarReportes = null;
               public $cmdOrdenAbre = null;
               public $aut = null;
               public $Label2 = null;
               public $cmdAutorizaReporte = null;
               public $Memo1 = null;
               public $DBGrid1 = null;
               public $cmdValidaReporte = null;
               public $Datasource1 = null;
               public $Query1 = null;
               public $Database1 = null;
               public $Panel1 = null;
               public $Label1 = null;
               public $Panel2 = null;
               function Button1JSClick($sender, $params)
               {

               ?>
               document.location.href="frmAbrirEstimacion.php";
                return false;
               <?php

               }

               function cmdValidarGeneradoresJSClick($sender, $params)
               {

               ?>
               document.location.href="frmAbrirGeneradores.php";
               return false;
               <?php

               }

               function destruyeAut(){
                     unset($_SERVER['PHP_AUTH_USER']);
                     unset($_SERVER['PHP_AUTH_PW']);
                     return;
               }
               function autAuthenticate($sender, $params)
               {
                  global $_SESSION;
                  $_SESSION['usuario'] = "";

                  if($_SESSION['Proceso']=="validar")
                     $proceso = " and lValida='Si' ";
                  else if($_SESSION['Proceso']=="autorizar")
                     $proceso = " and lAutoriza='Si' ";


                  $sql = "select sIdUsuario from usuarios ";
                  $sql.= "where sIdUsuario='".$params['username']."'";
                  $sql.=" and sPassword='".$params['password']."'";
                  $sql.=" $proceso ";
                  $rs = mysql_query($sql);
                  if ($row = mysql_fetch_array($rs))
                  {
                     $_SESSION['usuario'] = $row['sIdUsuario'];
                     return(true);
                  }
                  else {
                     $_SESSION['usuario']="";
                     return(false);
                  }
               }
               #boton autorizar reporte
               function cmdAutorizaReporteJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  colFecha = 0;
                  colNumReport=1;
                  colConvenio=2;
                  colTurno=4;
                  colStatus=6;
                  document.getElementById("Memo1").value="";
                        <?php
                        echo $this->Memo1->ajaxCall("destruyeAut",array(),array("cmdAutorizaReporte","DBGrid1","Memo1"));
                        ?>
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
                        echo $this->cmdAutorizaReporte->ajaxCall("obtieneReporteAut",array(),array("cmdAutorizaReporte","DBGrid1","Memo1"));
                        ?>
                     }

                  );
                 return false;

               <?php

               }

               function FrmAbrirReportesJSLoad($sender, $params)
               {

               ?>
               //Add your javascript code here
               //   var hz=window.screen.height;
               //   var wz=window.screen.width;
               //   switch(wz){
               //      case(800):
               //         wz=100;
               //         break;
               //      case(1024):
               //         wz=200;
               //         break;
               //      case(1280):
               //         wz=350;
               //         break;
               //      default:
               //         wz=250;
                //        break;
                 // }
                 // document.getElementById("Panel2_outer").style.pixelLeft= wz;
               <?php

               }
               #devueve el numero de orden seleccionado en el bombo box
               function ordenSeleccionada(){
                  global $sContrato;
                  $orden =  $this->cmdOrdenAbre->readItemIndex();
                  if($orden<0){
                     $rs = mysql_query("select sNumeroOrden from ordenesdetrabajo
                                        where sContrato='$sContrato' limit 1");
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
                     and r.lStatus<>'Pendiente'
                     and r.sNumeroOrden='$orden'
                     order by r.dIdFecha desc";
                     //and r.sIdTurno='$sIdTurno'
                   $this->Query1->Active=false;
                   $this->Query1->setSQL($sql);
                   $this->Query1->Active=true;

               }
               #boton Validar Reportes
               function cmdValidaReporteJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  colFecha = 0;
                  colNumReport=1;
                  colConvenio=2;
                  colTurno=4;
                  colStatus=6;
                  document.getElementById("Memo1").value="";
                        <?php
                        echo $this->Memo1->ajaxCall("destruyeAut",array(),array("cmdAutorizaReporte","DBGrid1","Memo1"));
                        ?>
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
                        echo $this->cmdValidaReporte->ajaxCall("obtieneReporteVal",array(),array("cmdValidaReporte","DBGrid1","Memo1"));
                        ?>
                     }

                  );
                 return false;
                 <?php

               }
               #procedimiento de Abrir Autorizacion
               function autorizaReporte($sContrato,$sNumeroOrden,$Convenio,$dIdFecha,$sIdTurno,$status,$sNumeroReporte){
                  $_SESSION['errorTransaccion']="";
                  $_SESSION['errorMySql']="";
                  require("procAbrirAutoriza.php");
                  if(!$lPoder)$this->Memo1->Color="#FF8080";
                   return $finalizado;
               }
               #procedimiento de Abrir Validacion
               function validaReporte($sContrato,$sNumeroOrden,$sIdConvenio,$dIdFecha,$sIdTurno,$status,$sNumeroReporte){
                  $_SESSION['errorTransaccion']="";
                  $_SESSION['errorMySql']="";
                  require("procAbreValida.php");
                  return $finalizado;
               }
               #obtiene los datos y llama al procedimiento de Abrir Autorizacion
               function obtieneReporteAut($sender,$params){
                  #obtiene los datos
                  $orden = $this->ordenSeleccionada();
                  global $sContrato;
                  global $sIdConvenioAct;
                  $_SESSION['Proceso']="autorizar" ;
                  $parametros = explode("]",$params);
                  $fecha = ($parametros[0]=="_")?"":$parametros[0];
                  $numReporte = ($parametros[1]=="_")?"":$parametros[1];
                  $convenio = ($parametros[2]=="_")?"":$parametros[2];
                  $turno = ($parametros[3]=="_")?"":$parametros[3];
                  $status = ($parametros[4]=="_")?"":$parametros[4];
                  #verifica si el usuario puede validar
                  /*$sql = "select sIdUsuario from usuarios ";
                  $sql.= "where sIdUsuario='".$_SESSION['ssUsuario']."'";
                  $sql.=" and lAutoriza='Si' ";
                  $rs = mysql_query($sql);
                  $autoriza = true;
                  if($row = mysql_fetch_array($rs))
                     $autoriza = true;
                  else
                     $autoriza = false;*/
                   #verificar si se requiere de autentificacion
                  $sql = "select sTipoSeguridad from configuracion where sContrato='$sContrato';";
                  $rs = mysql_query($sql);
                  if($row = mysql_fetch_array($rs)){
                     $sTipoSeguridad = $row['sTipoSeguridad'];
                  }

                  if($sTipoSeguridad=='Avanzada'){
                     $this->aut->setTitle(" Autorizar Apertura de Reporte Diarios ");
                     $this->aut->setErrorMessage(" No Puede Autorizar Apertura de Reportes ");
                     $this->aut->Execute();
                   }

                   #continua si se autentifico correctamente
                  $this->Memo1->Color="#C7CCFC";
                  $this->Memo1->Text="Reporte: Fecha[$fecha] NumeroReporte[$numReporte] Convenio[$convenio] Turno[$turno] Status[$status]\n";

                  $this->conectar();

                  if($status=='Autorizado' and $convenio==$sIdConvenioAct/* and $autoriza*/){
                     $finalizado  = $this->autorizaReporte($sContrato,$orden,$convenio,$fecha,$turno,$status,$numReporte);
                     if(!$finalizado){
                        $this->Memo1->Color="#FF8080";
                        $this->Memo1->Text=$_SESSION['errorMySql'];
                     }
                     $this->loadDBgrid();
                   }
                   else{
                     $this->Memo1->Color="#FF8080";
                     $this->Memo1->Text=$this->Memo1->Text."-----:Pertenece a otro convenio o no esta autorizado!!\n";
                   }
                 /*  if(!$autoriza and $sTipoSeguridad!='Avanzada'){
                     $this->Memo1->Color="#F7C8DE";
                     $this->Memo1->Text=$this->Memo1->Text."-----:No puede Autorizar Reportes!!\n";

                   }*/


               }

               function obtieneReporteVal($sender,$params){
                  #recoge los datos
                  $orden = $this->ordenSeleccionada();
                  global $sContrato;
                  global $sIdConvenioAct;
                  $_SESSION['Proceso']="validar";

                  $parametros = explode("]",$params);
                  $fecha = ($parametros[0]=="_")?"":$parametros[0];
                  $numReporte = ($parametros[1]=="_")?"":$parametros[1];
                  $convenio = ($parametros[2]=="_")?"":$parametros[2];
                  $turno = ($parametros[3]=="_")?"":$parametros[3];
                  $status = ($parametros[4]=="_")?"":$parametros[4];

                  #verifica si el usuario puede validar
                  /*$sql = "select sIdUsuario from usuarios ";
                  $sql.= "where sIdUsuario='".$_SESSION['ssUsuario']."'";
                  $sql.=" and lValida='Si' ";
                  $rs = mysql_query($sql);
                  $valida = true;
                  if($row = mysql_fetch_array($rs))
                     $valida = true;
                  else
                     $valida = false;
                    */
                   #verificar si se requiere de autentificacion
                  $sql = "select sTipoSeguridad from configuracion where sContrato='$sContrato';";
                  $rs = mysql_query($sql);
                  if($row = mysql_fetch_array($rs)){
                     $sTipoSeguridad = $row['sTipoSeguridad'];
                  }

                  if($sTipoSeguridad=='Avanzada'){
                     $this->aut->setTitle(" Validar Apertura de Reporte Diarios ");
                     $this->aut->setErrorMessage(" No Puede Validar Apertura de Reportes ");
                     $this->aut->Execute();

                   }

                   #continua si se autentifico correctamente
                  $this->Memo1->Text=$this->Memo1->Text."Reporte: Fecha[$fecha] NumeroReporte[$numReporte] Convenio[$convenio] Turno[$turno] Status[$status]\n";

                  $this->conectar();

                  if($status=='Validado' and $convenio==$sIdConvenioAct/* and $valida*/){
                     $finalizado = $this->validaReporte($sContrato,$orden,$convenio,$fecha,$turno,$status,$numReporte);
                     $this->loadDBgrid();
                     if($finalizado){
                        $this->Memo1->Color="#C7CCFC";
                        $this->Memo1->Text=$this->Memo1->Text."----:Validadacion Abierta\n";
                     }
                     else{
                        $this->Memo1->Color="#F7C8DE";
                        $this->Memo1->Text= $_SESSION['errorMySql'];
                     }

                   }
                   else{
                     $this->Memo1->Color="#F7C8DE";
                     $this->Memo1->Text=$this->Memo1->Text."-----:Pertenece a otro convenio o no esta validado!!\n";
                   }
                   /*
                   if(!$valida and $sTipoSeguridad!='Avanzada'){
                     $this->Memo1->Color="#F7C8DE";
                     $this->Memo1->Text=$this->Memo1->Text."-----:No puede Validar Reportes!!\n";

                   }         */

               }
               function cmdOrdenAbreChange($sender, $params)
               {
                  $this->loadDBgrid();
               }

               function FrmAbrirReportesShow($sender, $params)
               {
                  $this->loadDBgrid();
               }

               function FrmAbrirReportesBeforeShow($sender, $params)
               {
                  $this->conectar();
                  global $sContrato;
                  $sql = "select sNumeroOrden from ordenesdetrabajo where sContrato='$sContrato'";
                  $rs = mysql_query($sql);
                  while($row = mysql_fetch_array($rs))
                     $it[$row[0]]=$row[0];
                  $this->cmdOrdenAbre->setItems($it);
               }
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

        global $FrmAbrirReportes;

        //Creates the form
        $FrmAbrirReportes=new FrmAbrirReportes($application);

        //Read from resource file
        $FrmAbrirReportes->loadResource(__FILE__);
        //Shows the form
        $FrmAbrirReportes->show();

?>
<script>
//poner el grid como solo lectura
function Edit(DBGrid1_tableModel){
   for(var i = 0; i<9; i++)
      DBGrid1_tableModel.setColumnEditable(i, false);
   DBGrid1.setColumnWidth(2,0);
   DBGrid1.setColumnWidth(4,0);
}
setInterval ("Edit(DBGrid1_tableModel)",10);
Edit(DBGrid1_tableModel);
</script>
