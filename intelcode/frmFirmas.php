<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require_once("fnUtilerias.php");
        require_once("mysql.inc.php");
        //Class definition
        class frmFirmas extends Page
        {
               public $Button1 = null;
               public $Memo1 = null;
               public $hsOperacion = null;
               public $hdIdFecha = null;
               public $Label23 = null;
               public $cbodIdFecha = null;
               public $qryFirmas1 = null;
               public $cbosNumeroOrden = null;
               public $sPuesto8 = null;
               public $sFirmante8 = null;
               public $sPuesto6 = null;
               public $sFirmante6 = null;
               public $sPuesto5 = null;
               public $sFirmante5 = null;
               public $sPuesto4 = null;
               public $sFirmante4 = null;
               public $sPuesto3 = null;
               public $sFirmante3 = null;
               public $sPuesto2 = null;
               public $sFirmante2 = null;
               public $sPuesto10 = null;
               public $sFirmante10 = null;
               public $sPuesto9 = null;
               public $sFirmante9 = null;
               public $sPuesto7 = null;
               public $sFirmante7 = null;
               public $sPuesto1 = null;
               public $sFirmante1 = null;
               public $cmdReporteDiario = null;
               public $cmdEliminar = null;
               public $cmdCancelar = null;
               public $cmdAceptar = null;
               public $cmdModificar = null;
               public $cmdNuevo = null;
               public $Label24 = null;
               public $Label22 = null;
               public $Label21 = null;
               public $Label20 = null;
               public $Label19 = null;
               public $Label18 = null;
               public $Label17 = null;
               public $Label16 = null;
               public $Label15 = null;
               public $Label14 = null;
               public $Label13 = null;
               public $Label12 = null;
               public $Label11 = null;
               public $Label10 = null;
               public $Label9 = null;
               public $Label8 = null;
               public $Label7 = null;
               public $Label6 = null;
               public $Label5 = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;
               public $ddfirmas1 = null;
               public $dsfirmas1 = null;
               public $dbintelcode1 = null;
               function cmdEliminarClick($sender, $params)
               {
                  global $sContrato;
                  $sNumeroOrden = $this->getsNumeroOrden();
                  $dIdFecha     = formatoFechaPer($this->hdIdFecha->Value,"Y-m-d");
                  $sql = "delete from firmas where sContrato='$sContrato' and dIdFecha='$dIdFecha' and sNumeroOrden='$sNumeroOrden'";
                  mysql_query($sql);
                  if(mysql_error()){
                     $this->Memo1->Text=mysql_error();
                  }else{
                     $this->Memo1->Text="";
                  }


               }

               function cmdAceptarClick($sender, $params)
               {
                  global $sContrato;
                  $sNumeroOrden = $this->getsNumeroOrden();
                  $dIdFecha     = formatoFechaPer($this->cbodIdFecha->getText(),"Y-m-d");
                  $dIdFechaOld  = formatoFechaPer($this->hdIdFecha->Value,"Y-m-d");

                  for($i=1;$i<=10;$i++){
                     eval ("\$fir =  strtoupper(\$this->sFirmante".$i."->getText());");
                     eval ("\$pues =  strtoupper(\$this->sPuesto".$i."->getText()) ;");
                     $firmas .=" sFirmante$i='$fir' , ";
                     if($i<10)
                        $puestos .=" sPuesto$i='$pues' , ";
                     else
                        $puestos .=" sPuesto$i='$pues' ";

                  }

                  if($this->hsOperacion->Value == "agregar"){
                     $sql = "insert into firmas set sContrato='$sContrato',dIdFecha='$dIdFecha',sNumeroOrden='$sNumeroOrden',";
                     $sql.= $firmas.$puestos;
                  }else if($this->hsOperacion->Value == "modificar"){
                     $sql = "update firmas set dIdFecha='$dIdFecha',";
                     $sql.= $firmas.$puestos;
                     $sql.=" where sContrato='$sContrato' and dIdFecha='$dIdFechaOld ' and sNumeroOrden='$sNumeroOrden'";
                  }
                  mysql_query($sql);
                  if(mysql_error()){
                     $this->Memo1->Text=mysql_error();
                  }else{
                        $this->Memo1->Text="";
                  }

               }

               function cmdEliminarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  if(!confirm("desea eliminar el registro seleccionado ? ")){
                      return false;
                  }  else{
                     return true;
                  }
               <?php

               }

               function cmdCancelarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  deshabilitar(true);
                  return false;
               <?php

               }

               function cmdModificarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                 deshabilitar(false);
                 document.getElementById("hsOperacion").value="modificar";
                 return false;
               <?php

               }

               function cmdNuevoJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                 defaultAdd();
                 deshabilitar(false);
                 document.getElementById("hsOperacion").value="agregar";
                 return false;
               <?php

               }

               function cmdReporteDiarioJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  //document.location.href="Modulos/preciounitario/actividadesdiarias/reportediario/index.php";
                  document.location.href="frmReporteDiario.php";
                  return false;
               <?php

               }

               function cbosNumeroOrdenChange($sender, $params)
               {
                  $this->cargarGrid();
               }

               function frmFirmasBeforeShow($sender, $params)
               {
                  global $sContrato;
                  global $_REQUEST;

                  $this->conectar();

                  if(isset($_REQUEST['orden']) AND $_REQUEST['orden']!=""){
                     $this->cbosNumeroOrden->setItemIndex($_REQUEST['orden']);
                  }

                  $sql = "select sNumeroOrden from ordenesdetrabajo where sContrato='$sContrato'";
                  $rs = mysql_query($sql);
                  unset($it);
                  while($rw = mysql_fetch_array($rs)){
                     $it[$rw["sNumeroOrden"]]=$rw["sNumeroOrden"];

                  }
                  $this->cbosNumeroOrden->setItems($it);


               }

               function conectar(){
                  global $Servidor,$Usuario,$Clave,$_SESSION;
                  $this->dbintelcode1->setConnected(false);
                  $this->dbintelcode1->setUserName($Usuario);
                  $this->dbintelcode1->setUserPassword($Clave);
                  $this->dbintelcode1->setDatabaseName($_SESSION['database']);
                  $this->dbintelcode1->setHost($Servidor);
                  $this->dbintelcode1->setConnected(true);
               }
               function ddfirmas1JSClick($sender, $params)
               {

               ?>
                  deshabilitar(true);
                  ddfirmas1.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = ddfirmas1.getTableModel();
                        document.getElementById("f-calendar-field-1").value=tableModel.getValue(0, index);
                        document.getElementById("hdIdFecha").value=tableModel.getValue(0, index);
                        for(var i=1;i<=10;i++){
                           document.getElementById("sFirmante"+i).value=tableModel.getValue(i, index);
                           document.getElementById("sPuesto"+i).value=tableModel.getValue(i+10, index);
                        }
                     }

                  );
                 return false;
               <?php

               }



               function frmFirmasShow($sender, $params)
               {

                     $this->cargarGrid();
               }

               function getsNumeroOrden(){
                     global $sContrato;
                    if($this->cbosNumeroOrden->getItemIndex() == -1){
                         $sql = "select sNumeroOrden from ordenesdetrabajo where sContrato='$sContrato' limit 1";
                         $rs = mysql_query($sql);
                         if($rw = mysql_fetch_array($rs)){
                           return $rw["sNumeroOrden"];
                         }
                    }
                    else{
                     return $this->cbosNumeroOrden->getItemIndex();
                    }
               }


               function cargarGrid($sender="",$params=""){
                  global $sContrato;
                  $sNumeroOrden = $this->getsNumeroOrden();
                  for($i=1;$i<=10;$i++){
                     $firmas  .="if(sFirmante$i='','*',sFirmante$i) as Firmante$i ,";
                     $puestos .="if(sPuesto$i='','*',sPuesto$i) as Puesto$i ";
                     if($i<10)$puestos.=",";
                  }
                  $sql = "select
                              date_format(dIdFecha,'%d/%m/%Y') as Fecha,
                              $firmas
                              $puestos
                         from firmas
                         where sContrato='$sContrato'
                         and sNumeroOrden='$sNumeroOrden'
                         order by dIdFecha desc";
                  $this->qryFirmas1->setActive(false);
                  $this->qryFirmas1->setSQL($sql);
                  $this->qryFirmas1->setActive(true);
               }
               function dumpJavaScript(){
                  global $sContrato;
                  global $_REQUEST;
                  global $_SESSION;
                  $sNumeroOrden =$this->getsNumeroOrden();
                  echo "\n\rfunction deshabilitar(opcion){
                           document.getElementById('f-calendar-field-1').disabled=opcion;
                           for(var i=1;i<=10;i++){
                              document.getElementById('sFirmante'+i).disabled=opcion;
                              document.getElementById('sPuesto'+i).disabled=opcion;
                           }
                           document.getElementById('cmdNuevo').disabled=!opcion;
                           document.getElementById('cmdModificar').disabled=!opcion;
                           document.getElementById('cmdAceptar').disabled=opcion;
                           document.getElementById('cmdCancelar').disabled=opcion;
                           document.getElementById('cmdEliminar').disabled=!opcion;
                       }";

                  for($i=1;$i<=10;$i++){
                     $firmas  .="if(sFirmante$i='','*',sFirmante$i) as sFirmante$i ,";
                     $puestos .="if(sPuesto$i='','*',sPuesto$i) as sPuesto$i ";
                     if($i<10)$puestos.=",";
                  }
                  $sql = "select
                              date_format(dIdFecha,'%d/%m/%Y') as f_calendar_field_1,
                              $firmas
                              $puestos
                         from firmas
                         where sContrato='$sContrato'
                         and sNumeroOrden='$sNumeroOrden'
                         order by dIdFecha desc";

                  if(isset($_REQUEST['fecha']) AND $_REQUEST['fecha']!=""){
                     $_SESSION['fecha']=formatoFecha($_REQUEST['fecha']);
                  }else{
                     $_SESSION['fecha']=date("d/m/Y");
                  }

                  $String="";
                  $rs = mysql_query($sql);
                  if($row=mysql_fetch_array($rs)){
                     foreach($row as $index => $valor){
                        if(!is_numeric($index)){
                           if($index =="f_calendar_field_1")
                              $String .= "\n\tdocument.getElementById('f-calendar-field-1').value='".$_SESSION['fecha']."'; ";
                           else
                              $String .= "\n\tdocument.getElementById('".$index."').value='$valor'; ";
                        }
                     }
                  }
                  echo "\n\rfunction defaultAdd(){
                          $String
                     \n\r}\n\r";
               }
               function sPuesto8JSBlur($sender, $params)
                     {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto8JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto8JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante8JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante8JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante8JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto6JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto6JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto6JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante6JSChange($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante6JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante6JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante6JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto5JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto5JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto5JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante5JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante5JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante5JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto4JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto4JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto4JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante4JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante4JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante4JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto3JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto3JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto3JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante3JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante3JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante3JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto2JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto2JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto2JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante2JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante2JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante2JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto10JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto10JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto10JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante10JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante10JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante10JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto9JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto9JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto9JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante9JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante9JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante9JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto7JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto7JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto7JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante7JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante7JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante7JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto1JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto1JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPuesto1JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante1JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante1JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmante1JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }




        }

        global $application;

        global $frmFirmas;

        //Creates the form
        $frmFirmas=new frmFirmas($application);

        //Read from resource file
        $frmFirmas->loadResource(__FILE__);

        //Shows the form
        $frmFirmas->show();

?>
<script>
deshabilitar(true);
</script>
