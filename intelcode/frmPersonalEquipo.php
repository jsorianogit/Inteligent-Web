<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        //require_once("vcl/xajax/xajaxResponse.inc.php");
        //require_once("vcl/xajax/xajax.inc.php");
        use_unit("actnlist.inc.php");
        use_unit("buttons.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require("mysql.inc.php");
        require("fnUtilerias.php");
        //Class definition
        class frmPersonalEquipo extends Page
        {
               public $cmdPaqueteEquipo = null;
               public $cmdPaquetePersonal = null;
               public $cboPaquetePersonal = null;
               public $cboPaqueteEquipo = null;
               public $GroupBox3 = null;
               public $GroupBox2 = null;
               public $ActionList1 = null;
               public $Label4 = null;
               public $lblTotalPersonal = null;
               public $lblTotalEquipo = null;
               public $Button1 = null;
               public $qryEquipo = null;
               public $dsEquipo = null;
               public $dbgEquipo = null;
               public $cmdCargarEquipo = null;
               public $cmdEliminarEquipo = null;
               public $cmdRecargaEquipo = null;
               public $cmdEliminarRegistroEquipo = null;
               public $cmdModificarEquipo = null;
               public $cmdNuevoEquipo = null;
               public $Label6 = null;
               public $Label5 = null;
               public $Query1 = null;
               public $Datasource1 = null;
               public $Panel2 = null;
               public $cmdRecargaPersonal = null;
               public $txtIdSeleccionado = null;
               public $txtFechaSeleccionada = null;
               public $cmdModificarPersonal = null;
               public $cmdNuevoPersonal = null;
               public $cmdEliminarRegistroPersonal = null;
               public $Button4 = null;
               public $Label2 = null;
               public $dIdFecha = null;
               public $Label1 = null;
               public $cboNumeroOrden = null;
               public $GroupBox1 = null;
               public $Label3 = null;
               public $cmdEliminarPersonal = null;
               public $cmdCargarPersonal = null;
               public $cmdEquipo = null;
               public $cmdPersonal = null;
               public $qryPersonal = null;
               public $dsPersonal = null;
               public $dbgPersonal = null;
               public $Panel1 = null;
               public $database = null;
               public $qryNotas = null;
               public $dsNotas = null;
               public $dbgNotas = null;


               function cmdPaqueteEquipoJSClick($sender, $params)
               {
               ?>
                  //javascript code
                  if(!confirm("Desea insertar el Paquete Selecionado??")){
                      return false;
                  }
                  colId = 2;
                  ok=0;
                  dbgNotas.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = dbgNotas.getTableModel();
                        var id = tableModel.getValue(colId, index);
                        params = id;
                        ok=1;
                        xajax.doneLoadingFunction=recargar;
                        <?php
                        echo $this->cmdPaqueteEquipo->ajaxCall("paqueteEquipos",array(),array("dbgEquipo"));
                        ?>
                     }

                  );
                  if(ok!=1){
                     alert("De Clic sobre un Conceptos/Partidas/Notas Afectadas  para efectuar esta operacion");
                  }
                  return false;
               <?php
               }
               function paqueteEquipos($sender="",$params=""){
                  global $sContrato;
                  $paqueteEquipo =  $this->cboPaqueteEquipo->readItemIndex();
                  $fecha         =  formatoFechaPer($this->dIdFecha->Text,"Y-m-d");
                  $sNumeroOrden  =  $this->ordenSeleccionada();
                  $IdDiario      =  $params;
                  if($paqueteEquipo!=""){
                     //obtener la cantidad del paquete
                     $sqlE ="select sIdEquipo,dCantidad from paquetesdeequipo where sContrato ='$sContrato' AND sNumeroPaquete='$paqueteEquipo' ";
                     $resultE = mysql_query($sqlE);
                     while($rowE = mysql_fetch_array($resultE)){
                        //Obtener la cantidad actual reportada
                        $sqlC = "SELECT dCantidad FROM bitacoradeequipos WHERE sContrato ='$sContrato' and iIdDiario='$IdDiario' and dIdFecha = '$fecha' AND sIdEquipo='$rowE[0]' ";
                        $resultC = mysql_query($sqlC);
                        if($rowC = mysql_fetch_array($resultC)){
                           $CantEquipo = $rowC[0];
                           $NuevaCantEquipo =$CantEquipo + $rowE[1];
                           //actualizar la cantidad reportada
                           $sqlS = "UPDATE bitacoradeequipos SET dCantidad='$NuevaCantEquipo' WHERE sContrato ='$sContrato' and iIdDiario='$IdDiario' and dIdFecha = '$fecha' AND sIdEquipo='$rowE[0]'";
                           mysql_query($sqlS);
                        }
                        else {
                           //obneter el sIdPernocta
                           $sqlPer = "SELECT sIdPernocta FROM ordenesdetrabajo WHERE sContrato='$sContrato'  and sNumeroOrden='$sNumeroOrden' ";
                           $resultPer = mysql_query($sqlPer);
                           if($rowPer = mysql_fetch_array($resultPer)){
                              $sIdPernota = $rowPer['sIdPernocta'];
                           }
                           //Obtener los datos del Equipo
                           $sqlOb = "SELECT sDescripcion,dCostoMN,dCostoDLL
                                     FROM equipos
                                     WHERE sContrato='$sContrato' and sIdEquipo='$rowE[0]' ";
                           $resultOb = mysql_query($sqlOb);
                           if($rowOb = mysql_fetch_array($resultOb)){
                              $Descripcion = $rowOb['sDescripcion'];
                              $CostoMN = $rowOb['dCostoMN'];
                              $CostoDLL = $rowOb['dCostoDLL'];
                           }
                           $sqlS = "INSERT INTO bitacoradeequipos (sContrato,dIdFecha,iIdDiario,sIdEquipo,sDescripcion,sIdPernocta,sHoraInicio,sHoraFinal,dCantidad,sFactor,dCostoMN,dCostoDLL)
                           VALUES('$sContrato','$fecha','$IdDiario', '$rowE[0]','$Descripcion','$sIdPernota','00:00','00:00',$rowE[1],'','$CostoMN','$CostoDLL')";
                           if($rowE[0]!="")
                              mysql_query($sqlS);
                        }
                     }
                  }
               }
               function cmdPaquetePersonalJSClick($sender, $params)
               {
               ?>
                  //javascript code
                  if(!confirm("Desea insertar el Paquete Selecionado??")){
                      return false;
                  }
                  colId = 2;
                  ok=0;
                  dbgNotas.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = dbgNotas.getTableModel();
                        var id = tableModel.getValue(colId, index);
                        params = id;
                        ok=1;
                        xajax.doneLoadingFunction=recargar;
                        <?php
                        echo $this->cmdPaquetePersonal->ajaxCall("paquetePersonal",array(),array("dbgPersonal"));
                        ?>
                     }

                  );
                  if(ok!=1){
                     alert("De Clic sobre un Conceptos/Partidas/Notas Afectadas  para efectuar esta operacion");
                  }
                  return false;
               <?php
               }

               function paquetePersonal($sender="",$params=""){
                  global $sContrato;
                  $paquetePersonal =  $this->cboPaquetePersonal->readItemIndex();
                  $fecha         =  formatoFechaPer($this->dIdFecha->Text,"Y-m-d");
                  $sNumeroOrden  =  $this->ordenSeleccionada();
                  $IdDiario    =  $params;
                  if($paquetePersonal!=""){
                  //obtener la cantidad del paquete
                  $sqlE ="select sIdPersonal,dCantidad from paquetesdepersonal where sContrato ='$sContrato' AND sNumeroPaquete='$paquetePersonal' ";
                  $resultE = mysql_query($sqlE);
                  while($rowE = mysql_fetch_array($resultE)){
                     //Obtener la cantidad actual reportada
                     $sqlC = "SELECT dCantidad FROM bitacoradepersonal WHERE sContrato ='$sContrato' and iIdDiario='$IdDiario' and dIdFecha = '$fecha' AND sIdPersonal='$rowE[0]' ";
                     $resultC = mysql_query($sqlC);
                     if($rowC = mysql_fetch_array($resultC)){
                        $CantPersonal = $rowC[0];
                        $NuevaCantPersonal =$CantPersonal + $rowE[1];
                        //actualizar la cantidad reportada
                        $sqlS = "UPDATE bitacoradepersonal SET dCantidad='$NuevaCantPersonal' WHERE sContrato ='$sContrato' and iIdDiario='$IdDiario' and dIdFecha = '$fecha' AND sIdPersonal='$rowE[0]'";
                        mysql_query($sqlS);
                     }
                     else {
                        //obneter el sIdPernocta
                        $sqlPer = "SELECT sIdPlataforma,sIdPernocta FROM ordenesdetrabajo WHERE sContrato='$sContrato'  and sNumeroOrden='$sNumeroOrden' ";
                        $resultPer = mysql_query($sqlPer);
                        if($rowPer = mysql_fetch_array($resultPer)){
                           $sIdPernota = $rowPer['sIdPernocta'];
                           $sIdPlataforma = $rowPer['sIdPlataforma'];
                        }
                        //Obtener los datos del Personal
                        $sqlOb = "SELECT sDescripcion,dCostoMN,dCostoDLL
                                  FROM personal
                                  WHERE sContrato='$sContrato' and sIdPersonal='$rowE[0]' ";
                        $resultOb = mysql_query($sqlOb);
                        if($rowOb = mysql_fetch_array($resultOb)){
                           $Descripcion = $rowOb['sDescripcion'];
                           $CostoMN = $rowOb['dCostoMN'];
                           $CostoDLL = $rowOb['dCostoDLL'];
                        }
                        $sqlS = "INSERT INTO bitacoradepersonal (sContrato,dIdFecha,iIdDiario,sIdPersonal,sDescripcion,sIdPernocta,sIdPlataforma,sHoraInicio,sHoraFinal,dCantidad,sFactor,dCostoMN,dCostoDLL)
                                 VALUES('$sContrato','$fecha','$IdDiario', '$rowE[0]','$Descripcion','$sIdPernota','$sIdPlataforma' ,'00:00','00:00',$rowE[1],'','$CostoMN','$CostoDLL')";
                        if($rowE[0]!="")    {
                           mysql_query($sqlS);
                        }
                      }

                  }
                }
               }
               function Button1JSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
               //document.location.href="Modulos/preciounitario/actividadesdiarias/reportediario/index.php";
               document.location.href="frmReporteDiario.php";
               return false;
               <?php

               }

               /*cargar equipo del dia anterior*/
               function cmdCargarEquipoJSClick($sender, $params)
               {
               ?>
                  //javascript code
                  if(!confirm("Desea cargar el equipo del dia anterior?")){
                      return false;
                  }
                  colId = 2;
                  ok=0;
                  dbgNotas.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = dbgNotas.getTableModel();
                        var id = tableModel.getValue(colId, index);
                        params = id;
                        ok=1;
                        xajax.doneLoadingFunction=recargar;
                        alert("Debe esperar hasta que se recargue la pagina");
                        document.getElementById("cmdCargarEquipo").disabled=true;
                        <?php
                        echo $this->cmdCargarPersonal->ajaxCall("equipoDelDiaAnterior",array(),array("dbgEquipo"));
                        ?>
                     }

                  );
                  if(ok!=1){
                     alert("De Clic sobre un Conceptos/Partidas/Notas Afectadas  para efectuar esta operacion");
                  }
                  return false;
               <?php
               }
              function equipoDelDiaAnterior($sender="",$params=""){
                  global $_SESSION,$sContrato;
                  $turno=$_SESSION['ssIdTurno'] ;
                  $fecha = formatoFechaPer($this->dIdFecha->Text,"Y-m-d");
                  $iIdDiario=$params;
                  $sNumeroOrden = $this->ordenSeleccionada();
                  //extraer la ultima fecha para ese id diario y una fecha anterior  AND iIdDiario=$iIdDiario
                  $sql = "SELECT MAX(dIdFecha) FROM bitacoradeequipos WHERE sContrato='$sContrato'  AND dIdFecha<'$fecha' ORDER BY dIdFecha DESC;";
                  $result = mysql_query($sql);
                  if($row = mysql_fetch_array($result)){
                     $UltimaFecha = $row[0];
                  }
                  //extraer el personal de esa fecha optenida AND iIdDiario=$iIdDiario
                  $band = false;
                  $sql ="select
                           bp.sIdPernocta,
                           bp.sDescripcion,
                           bp.sIdEquipo,
                           bp.sHoraInicio,
                           bp.sHoraFinal,
                           bp.sFactor,
                           bp.dCostoMN,
                           bp.dCostoDLL,
                           Sum(bp.dCantidad) as dCantidad
                       From bitacoradeequipos bp
                           INNER JOIN bitacoradeactividades b
                              ON (
                                    bp.sContrato = b.sContrato
                                    And bp.dIdFecha = b.dIdFecha
                                    And bp.iIdDiario = b.iIdDiario
                                    And b.sNumeroOrden = '$sNumeroOrden'
                                    And b.sIdTurno = '$turno')
                       Where bp.sContrato = '$sContrato'
                           And bp.dIdFecha = '$UltimaFecha'
                       Group By  bp.sIdPernocta, bp.sIdEquipo
                       Order By bp.sIdEquipo";
                  $result = mysql_query($sql);
                  if($row = mysql_fetch_array($result)){
                     $band = true;
                  }

                  //extraer el equipo de esa fecha optenida
                  if($band){
                     $result = mysql_query($sql);
                     while($row = mysql_fetch_array($result)){
                         $sIdEquipo = $row['sIdEquipo'];
                         $sDescripcion = $row['sDescripcion'];
                         $sIdPernocta = $row['sIdPernocta'];
                         $sHoraInicio = $row['sHoraInicio'];
                         $sHoraFinal = $row['sHoraFinal'];
                         $dCantidad = $row['dCantidad'];
                         $sFactor = $row['sFactor'];
                         $dCostoMN = $row['dCostoMN'];
                         $dCostoDLL = $row['dCostoDLL'];
                         #a veces la descripcion es nula, por eso esta consulta
                         if(trim($sDescripcion)==""){
                            $sqlDesEq = "select sDescripcion from equipos where sContrato='$sContrato' and sIdEquipo='$sIdEquipo';";
                            $rsDesEq = mysql_query($sqlDesEq);
                            if($rowDesEq = mysql_fetch_array($rsDesEq)){
                              $sDescripcion = $rowDesEq['sDescripcion'];
                            }
                         }
                         $sql = "INSERT INTO bitacoradeequipos VALUES('$sContrato','$fecha','$iIdDiario','$sIdEquipo','$sDescripcion','$sIdPernocta','$sHoraInicio','$sHoraFinal','$dCantidad','$sFactor','$dCostoMN','$dCostoDLL') ON DUPLICATE KEY UPDATE dCantidad=dCantidad+$dCantidad, dCostoMN = dCostoMN+$dCostoMN , dCostoDLL = dCostoDLL +$dCostoMN , sDescripcion='$sDescripcion', sHoraInicio='$sHoraInicio' , sHoraFinal='$sHoraFinal',sFactor='$sFactor'";
                         mysql_query($sql);
                     }

                  }
              }
               /*eliminar todo el equipo*/
               function cmdEliminarEquipoJSClick($sender, $params)
               {
               ?>
                  //javascript code
                  if(!confirm("Desea ELIMINAR todo el equipo asignado?")){
                      return false;
                  }
                  colId = 2;
                  ok=0;
                  dbgNotas.getSelectionModel().iterateSelection(
                     function(index) {
                        params="";
                        var tableModel = dbgNotas.getTableModel();
                        var id = tableModel.getValue(colId, index);
                        params = id;
                        ok=1;
                        if(params==null)alert("Seleccione un Concepto/Partida/Nota");
                        xajax.doneLoadingFunction=recargar;
                        <?php
                        echo $this->cmdEliminarEquipo->ajaxCall("borrarTodoEquipo",array(),array("dbgEquipo"));
                        ?>
                        return false;
                     }

                  );
                  if(ok!=1){
                     alert("De Clic sobre un Conceptos/Partidas/Notas Afectadas  para efectuar esta operacion");
                  }
                  return false;
               <?php
               }
               function borrarTodoEquipo($sender="",$params=""){
                  global $_SESSION,$sContrato;
                  $turno=$_SESSION['ssIdTurno'] ;
                  $fecha = formatoFechaPer($this->dIdFecha->Text,"Y-m-d");
                  $iIdDiario=$params;
                  $sNumeroOrden = $this->ordenSeleccionada();
                  $sql = "DELETE FROM bitacoradeequipos WHERE sContrato='$sContrato' AND dIdFecha='$fecha' AND iIdDiario='$iIdDiario' ;";
                  mysql_query($sql);
               }
               /*eliminar equipos*/
               function cmdEliminarRegistroEquipoJSClick($sender, $params)
               {
               ?>
               //Add your javascript code here
                  if(!confirm("Desea ELIMINAR el equipo seleccionado?")){
                      return false;
                  }
                  colIdEquipo    = 2;
                  colId          = 1;
                  colsIdPernocta = 4;
                  coldCantidad   = 5;
                  ok = 0;
                  dbgEquipo.getSelectionModel().iterateSelection(
                     function(index) {

                        var tableModel   = dbgEquipo.getTableModel();

                        var sIdEquipo    = tableModel.getValue(colIdEquipo, index);
                        var iIdDiario    = tableModel.getValue(colId, index);
                        var sIdPernocta  = tableModel.getValue(colsIdPernocta, index);

                        ok = 1;
                        if(sIdEquipo != "")params = sIdEquipo+ "]"; else params="_]";
                        if(iIdDiario != "")params = params + iIdDiario + "]"; else params = params + "_]";
                        if(sIdPernocta != "")params = params + sIdPernocta + "]"; else params = params + "_]";

                        <?php
                           echo $this->cmdEliminarRegistroEquipo->ajaxCall("eliminarRegistroEquipo",array(),array("dbgEquipo"));
                        ?>
                        return false;
                     }

                  );
                  if(ok!=1)
                     alert("De Clic sobre un Registro de Personal  para efectuar esta operacion");
                 return false;
               <?php
               }

               /*modificar equipo*/
               function cmdModificarEquipoJSClick($sender, $params)
               {
               ?>
               //Add your javascript code here
                  var fecha = document.getElementById("f-calendar-field-1").value;
                  colIdEquipo    = 2  ;
                  colId            = 1;
                  colsIdPernocta = 4;
                  coldCantidad     = 5;
                  ok = 0;
                  dbgEquipo.getSelectionModel().iterateSelection(
                     function(index) {

                        var tableModel  = dbgEquipo.getTableModel();

                        var sIdEquipo   = tableModel.getValue(colIdEquipo, index);
                        var iIdDiario   = tableModel.getValue(colId, index);
                        var sIdPernocta = tableModel.getValue(colsIdPernocta, index);
                        var dCantidad   = tableModel.getValue(coldCantidad, index);

                        ok = 1;
                        var url = "frmBitacoradeEquipos.php?dIdFecha="+fecha;
                        url = url + "&iIdDiario="+iIdDiario;
                        url = url + "&sIdEquipo="+sIdEquipo;
                        url = url + "&sIdPernocta="+sIdPernocta;
                        url = url + "&dCantidad="+dCantidad;
                        url = url + "&operacion=modificar";
                        //alert(url);
                        document.location.href=url;
                     }

                  );
                  if(ok!=1)
                     alert("De Clic sobre un Registro de Equipos para efectuar esta operacion");
                 return false;
               <?php
               }
                /*insertar equipo*/
               function cmdNuevoEquipoJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  var fecha = document.getElementById("f-calendar-field-1").value;
                  var iD= document.getElementById("txtIdSeleccionado").value;
                  var Id = iD.split(":");
                  var ID = Id[Id.length-1]
                  var ok=0;
                  colId = 2;
                  dbgNotas.getSelectionModel().iterateSelection(
                     function(index) {
                        params="";
                        var tableModel = dbgNotas.getTableModel();
                        var id = tableModel.getValue(colId, index);
                        params = id;
                        document.location.href="frmBitacoradeEquipos.php?dIdFecha="+fecha+"&iIdDiario="+params+"&operacion=insertar";
                        ok =1;
                     }

                  );
                  if(ok!=1)
                     alert("De Clic sobre un Conceptos/Partidas/Notas Afectadas  para efectuar esta operacion");
                 return false;
               <?php

               }

                 /*mostrar equipo ocultar personal*/
               function cmdEquipoJSClick($sender, $params)
               {

               ?>
                 document.getElementById("Panel1_outer").style.display  ='none';
                 document.getElementById("Panel2_outer").style.display  ='block';
                 document.getElementById("cmdPersonal").disabled=false;
                 document.getElementById("cmdEquipo").disabled=true;
                 return false;

               <?php

               }
                 /*mostrar personal ocultar equipo*/
               function cmdPersonalJSClick($sender, $params)
               {

               ?>
                 document.getElementById("Panel1_outer").style.display  ='block';
                 document.getElementById("Panel2_outer").style.display  ='none';
                 document.getElementById("cmdPersonal").disabled=true;
                 document.getElementById("cmdEquipo").disabled=false;
                 return false;

               <?php

               }
                /*modificar personal*/
               function cmdModificarPersonalJSClick($sender, $params)
               {
               ?>
               //Add your javascript code here
                  var fecha = document.getElementById("f-calendar-field-1").value;
                  colIdPersonal    = 0;
                  colId            = 1;
                  colsIdPernocta   = 3;
                  colsIdPlataforma = 4;
                  coldCantidad     = 5;
                  ok = 0;
                  dbgPersonal.getSelectionModel().iterateSelection(
                     function(index) {

                        var tableModel      = dbgPersonal.getTableModel();

                        var sIdPersonal     = tableModel.getValue(colIdPersonal, index);
                        var iIdDiario       = tableModel.getValue(colId, index);
                        var sIdPernocta     = tableModel.getValue(colsIdPernocta, index);
                        var sIdPlataforma   = tableModel.getValue(colsIdPlataforma, index);
                        var dCantidad   = tableModel.getValue(coldCantidad, index);

                        ok = 1;
                        var url = "frmBitacoradePersonal.php?dIdFecha="+fecha;
                        url = url + "&iIdDiario="+iIdDiario;
                        url = url + "&sIdPersonal="+sIdPersonal;
                        url = url + "&sIdPernocta="+sIdPernocta;
                        url = url + "&sIdPlataforma="+sIdPlataforma;
                        url = url + "&dCantidad="+dCantidad;
                        url = url + "&operacion=modificar";
                        document.location.href=url;
                     }

                  );
                  if(ok!=1)
                     alert("De Clic sobre un Registro de Personal  para efectuar esta operacion");
                 return false;
               <?php
               }

                 /*eliminar personal*/
               function cmdEliminarRegistroPersonalJSClick($sender, $params)
               {
               ?>
               //Add your javascript code here
                  if(!confirm("Desea ELIMINAR el personal seleccionado?")){
                      return false;
                  }
                  colIdPersonal   = 0;
                  colId           = 1;
                  colsIdPernocta  = 3;
                  colsIdPlataforma = 4;
                  ok = 0;
                  dbgPersonal.getSelectionModel().iterateSelection(
                     function(index) {

                        var tableModel      = dbgPersonal.getTableModel();

                        var sIdPersonal     = tableModel.getValue(colIdPersonal, index);
                        var iIdDiario       = tableModel.getValue(colId, index);
                        var sIdPernocta     = tableModel.getValue(colsIdPernocta, index);
                        var sIdPlataforma   = tableModel.getValue(colsIdPlataforma, index);
                        ok = 1;
                        if(sIdPersonal != "")params = sIdPersonal+ "]"; else params="_]";
                        if(iIdDiario != "")params = params + iIdDiario + "]"; else params = params + "_]";
                        if(sIdPernocta != "")params = params + sIdPernocta + "]"; else params = params + "_]";
                        if(sIdPlataforma != "")params = params + sIdPlataforma + "]"; else params = params + "_]";

                        <?php
                           echo $this->cmdEliminarRegistroPersonal->ajaxCall("eliminarRegistroPersonal",array(),array("dbgPersonal"));
                        ?>
                     }

                  );
                  if(ok!=1)
                     alert("De Clic sobre un Registro de Personal  para efectuar esta operacion");
                 return false;
               <?php
               }
               /*eliminar un personal*/
               function eliminarRegistroPersonal($sender="", $params=""){
                  global $sContrato;
                  $parametros    = explode("]",$params);
                  $sIdPersonal   = ($parametros[0]=="_")?"":$parametros[0];
                  $iIdDiario     = ($parametros[1]=="_")?"":$parametros[1];
                  $sIdPernocta   = ($parametros[2]=="_")?"":$parametros[2];
                  $sIdPlataforma = ($parametros[3]=="_")?"":$parametros[3];
                  $dIdFecha      = $this->txtFechaSeleccionada->Value;
                  $sql = " delete from bitacoradepersonal
                           where
                              sContrato='$sContrato'
                              and sIdPersonal='$sIdPersonal'
                              and dIdFecha='$dIdFecha'
                              and iIdDiario='$iIdDiario'
                              and sIdPernocta='$sIdPernocta'
                              and sIdPlataforma='$sIdPlataforma'";
                  mysql_query($sql);
                  $this->cargaPersonalEquipo($sender, $iIdDiario) ;

               }
               /*eliminar un equipo*/
               function eliminarRegistroEquipo($sender="", $params=""){
                  global $sContrato;
                  $parametros    = explode("]",$params);
                  $sIdEquipo   = ($parametros[0]=="_")?"":$parametros[0];
                  $iIdDiario     = ($parametros[1]=="_")?"":$parametros[1];
                  $sIdPernocta   = ($parametros[2]=="_")?"":$parametros[2];
                  $dIdFecha      = $this->txtFechaSeleccionada->Value;
                  $sql = " delete from bitacoradeequipos
                           where
                              sContrato='$sContrato'
                              and sIdEquipo='$sIdEquipo'
                              and dIdFecha='$dIdFecha'
                              and iIdDiario='$iIdDiario'
                              and sIdPernocta='$sIdPernocta'";
                  mysql_query($sql);
                  $this->cargaPersonalEquipo($sender, $iIdDiario) ;

               }
               /*agregar un personal a la vez*/
               function cmdNuevoPersonalJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  var fecha = document.getElementById("f-calendar-field-1").value;
                  var iD= document.getElementById("txtIdSeleccionado").value;
                  var Id = iD.split(":");
                  var ID = Id[Id.length-1]
                  var ok=0;
                  colId = 2;
                  dbgNotas.getSelectionModel().iterateSelection(
                     function(index) {
                        params="";
                        var tableModel = dbgNotas.getTableModel();
                        var id = tableModel.getValue(colId, index);
                        params = id;
                        document.location.href="frmBitacoradePersonal.php?dIdFecha="+fecha+"&iIdDiario="+params+"&operacion=insertar";
                        ok =1;
                     }

                  );
                  if(ok!=1)
                     alert("De Clic sobre un Conceptos/Partidas/Notas Afectadas  para efectuar esta operacion");
                 return false;
               <?php

               }

               /*eliminar todo el personal*/
               function cmdEliminarPersonalJSClick($sender, $params)
               {
               ?>
                  //javascript code
                  if(!confirm("Desea ELIMINAR todo el personal asignado?")){
                      return false;
                  }
                  colId = 2;
                  ok=0;
                  dbgNotas.getSelectionModel().iterateSelection(
                     function(index) {
                        params="";
                        var tableModel = dbgNotas.getTableModel();
                        var id = tableModel.getValue(colId, index);
                        params = id;
                        ok=1;
                        if(params==null)alert("Seleccione un Concepto/Partida/Nota");
                        xajax.doneLoadingFunction=recargar;
                        <?php
                        echo $this->cmdEliminarPersonal->ajaxCall("borrarTodoPersonal",array(),array("dbgPersonal"));
                        ?>
                     }

                  );
                  if(ok!=1){
                     alert("De Clic sobre un Conceptos/Partidas/Notas Afectadas  para efectuar esta operacion");
                  }
                  return false;
               <?php
               }

               function borrarTodoPersonal($sender="",$params=""){
                  global $_SESSION,$sContrato;
                  $turno=$_SESSION['ssIdTurno'] ;
                  $fecha = formatoFechaPer($this->dIdFecha->Text,"Y-m-d");
                  $iIdDiario=$params;
                  $sNumeroOrden = $this->ordenSeleccionada();
                  $sql = "DELETE FROM bitacoradepersonal WHERE sContrato='$sContrato' AND dIdFecha='$fecha' AND iIdDiario='$iIdDiario' ;";
                  mysql_query($sql);
               }
               /*cargar personal del dia anterior*/
               function cmdCargarPersonalJSClick($sender, $params)
               {
               ?>
                  //javascript code
                  if(!confirm("Desea cargar el personal del dia anterior?")){
                      return false;
                  }
                  colId = 2;
                  ok=0;
                  dbgNotas.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = dbgNotas.getTableModel();
                        var id = tableModel.getValue(colId, index);
                        params = id;
                        ok=1;

                        xajax.doneLoadingFunction=recargar;
                        alert("Debe esperar hasta que se recargue la pagina");
                        document.getElementById("cmdCargarPersonal").disabled=true;
                        <?php
                        echo $this->cmdCargarPersonal->ajaxCall("personalDeDiaAnterior",array(),array("dbgPersonal"));
                        ?>
                     }

                  );
                  if(ok!=1){
                     alert("De Clic sobre un Conceptos/Partidas/Notas Afectadas  para efectuar esta operacion");
                  }
                  return false;
               <?php
               }
               function personalDeDiaAnterior($sender="",$params=""){

                  global $_SESSION,$sContrato;
                  $turno=$_SESSION['ssIdTurno'] ;
                  $fecha = formatoFechaPer($this->dIdFecha->Text,"Y-m-d");
                  $iIdDiario=$params;
                  $sNumeroOrden = $this->ordenSeleccionada();
                  /*
                  $objResponse = new xajaxResponse();
                  $objResponse->addAlert( "Cargando personal en $IdDiario" );
                  $objResponse->addScript("var x = prompt(\"Enter Your Name\");");
                    */
                  #extraer la ultima fecha para ese id diario y una fecha anterior  AND iIdDiario=$iIdDiario
                  $sql = "SELECT MAX(dIdFecha) FROM bitacoradepersonal
                          WHERE sContrato='$sContrato'  AND dIdFecha<'$fecha'  ORDER BY dIdFecha DESC;";
                  $result = mysql_query($sql);
                  if($row = mysql_fetch_array($result)){
                     $UltimaFecha = $row[0];
                  }
                  #extraer el personal de esa fecha optenida AND iIdDiario=$iIdDiario
                  $band = false;
                  $sql ="Select bp.* From bitacoradepersonal bp
                        INNER JOIN bitacoradeactividades b ON
                        (bp.sContrato = b.sContrato
                        And bp.dIdFecha = b.dIdFecha
                        And bp.iIdDiario = b.iIdDiario
                        And b.sNumeroOrden = '$sNumeroOrden'
                        And b.sIdTurno = '$turno')
                        Where bp.sContrato = '$sContrato'
                           And bp.dIdFecha = '$UltimaFecha'
                           Order By bp.sIdPersonal";
                  $result = mysql_query($sql);
                  if($row = mysql_fetch_array($result)){
                     $band = true;
                  }
                  #extraer el personal de esa fecha optenida AND iIdDiario=$iIdDiario
                  if($band){
                     $sql ="  Select bp.* From bitacoradepersonal bp
                              INNER JOIN bitacoradeactividades b ON
                                 (bp.sContrato = b.sContrato
                                 And bp.dIdFecha = b.dIdFecha
                                 And bp.iIdDiario = b.iIdDiario
                                 And b.sNumeroOrden = '$sNumeroOrden'
                                 And b.sIdTurno = '$turno')
                              Where bp.sContrato = '$sContrato'
                                 And bp.dIdFecha = '$UltimaFecha'
                                 Order By bp.sIdPersonal";
                     $result = mysql_query($sql);
                     while($row = mysql_fetch_array($result)){
                         $sIdPersonal = $row['sIdPersonal'];
                         $sDescripcion = $row['sDescripcion'];
                         $sIdPernocta = $row['sIdPernocta'];
                         $sIdPlataforma = $row['sIdPlataforma'];
                         $sHoraInicio = $row['sHoraInicio'];
                         $sHoraFinal = $row['sHoraFinal'];
                         $dCantidad = $row['dCantidad'];
                         $sFactor = $row['sFactor'];
                         $dCostoMN = $row['dCostoMN'];
                         $dCostoDLL = $row['dCostoDLL'];
                         #a veces la descripcion es nula, por eso esta consulta
                         if(trim($sDescripcion)==""){
                            $sqlDesPer = "select sDescripcion from personal where sContrato='$sContrato' and sIdPersonal='$sIdPersonal';";
                            $rsDesPer = mysql_query($sqlDesPer);
                            if($rowDesPer = mysql_fetch_array($rsDesPer)){
                              $sDescripcion = $rowDesPer['sDescripcion'];
                           }
                        }
                        $sql = "INSERT INTO bitacoradepersonal
                                 VALUES('$sContrato','$fecha','$iIdDiario','$sIdPersonal','$sDescripcion','$sIdPernocta','$sIdPlataforma','$sHoraInicio','$sHoraFinal','$dCantidad','$sFactor','$dCostoMN','$dCostoDLL') ON DUPLICATE KEY UPDATE dCantidad=dCantidad+$dCantidad, dCostoMN = dCostoMN+$dCostoMN , dCostoDLL = dCostoDLL +$dCostoMN , sDescripcion='$sDescripcion', sHoraInicio='$sHoraInicio' , sHoraFinal='$sHoraFinal',sFactor='$sFactor'";
                        mysql_query($sql);
                      }
                 }
                 //return $objResponse;
               }

                /*recargar al seleccionar otra orden*/
               function cboNumeroOrdenChange($sender, $params)
               {
                  $this->cargarNotas();

               }
               /*cargar notas al mostrar el form*/
               function frmPersonalEquipoShow($sender, $params)
               {
                  $this->cargarNotas();
               }

               /*leer el numero de orden seleccionado*/
               function ordenSeleccionada(){
                  global $sContrato;
                  $orden =  $this->cboNumeroOrden->readItemIndex();
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
               /*cargar fecha y orden antes de mostrar formulario*/
               function frmPersonalEquipoBeforeShow($sender, $params)
               {
                  global $sContrato;
                  global $_REQUEST;
                  #cargar las ordenes de trabajo
                  $sql = "select sNumeroOrden from ordenesdetrabajo where sContrato='$sContrato'";
                  $rs = mysql_query($sql);
                  while($row = mysql_fetch_array($rs))
                     $it[$row[0]]=$row[0];
                  $this->cboNumeroOrden->setItems($it);
                  if(isset($_REQUEST['sNumeroOrden']))
                     $this->cboNumeroOrden->setItemIndex($_REQUEST['sNumeroOrden']);
                  #poner la fecha

                  if(isset($_REQUEST['dFecha']) and $_REQUEST['dFecha']!="" ){
                    $this->dIdFecha->Text = formatoFecha($_REQUEST['dFecha']);
                    $_REQUEST['dFecha']="";
                  }
                  if($this->dIdFecha->Text == "")
                     $this->dIdFecha->Text = date("d/m/Y");
                  #habilitar o deshabilitar los botones si el dia seleccionado esta validado o autorizado
                  $sql = "select lStatus from reportediario where sContrato='$sContrato'
                           and sNumeroOrden='".$this->ordenSeleccionada()."'
                           and dIdFecha='".formatoFechaPer($this->dIdFecha->Text,"Y-m-d")."'
                           and sIdTurno='".$_SESSION['ssIdTurno']."'";
                  $rs = mysql_query($sql);
                  if($row= mysql_fetch_array($rs)){
                     if($row['lStatus']!="Pendiente"){
                        $this->cmdCargarEquipo->setEnabled(false);
                        $this->cmdEliminarEquipo->setEnabled(false);
                        $this->cmdEliminarRegistroEquipo->setEnabled(false);
                        $this->cmdModificarEquipo->setEnabled(false);
                        $this->cmdNuevoEquipo->setEnabled(false);
                        $this->cmdModificarPersonal->setEnabled(false);
                        $this->cmdNuevoPersonal->setEnabled(false);
                        $this->cmdEliminarRegistroPersonal->setEnabled(false);
                        $this->cmdEliminarPersonal->setEnabled(false);
                        $this->cmdCargarPersonal->setEnabled(false);
                        $this->cmdPaqueteEquipo->setEnabled(false);
                        $this->cmdPaquetePersonal->setEnabled(false);
                     }
                     else{
                        $this->cmdCargarEquipo->setEnabled(true);
                        $this->cmdEliminarEquipo->setEnabled(true);
                        $this->cmdEliminarRegistroEquipo->setEnabled(true);
                        $this->cmdModificarEquipo->setEnabled(true);
                        $this->cmdNuevoEquipo->setEnabled(true);
                        $this->cmdModificarPersonal->setEnabled(true);
                        $this->cmdNuevoPersonal->setEnabled(true);
                        $this->cmdEliminarRegistroPersonal->setEnabled(true);
                        $this->cmdEliminarPersonal->setEnabled(true);
                        $this->cmdCargarPersonal->setEnabled(true);
                        $this->cmdPaqueteEquipo->setEnabled(true);
                        $this->cmdPaquetePersonal->setEnabled(true);
                     }
                  }
                 /*cargar paquete de equipo*/
                 $sql ="select distinct(sNumeroPaquete) from paquetesdeequipo where sContrato ='$sContrato' AND sIdEquipo<>''";
                 $rs = mysql_query($sql);
                 while($row = mysql_fetch_array($rs))
                    $it[$row[0]]=$row[0];
                 $this->cboPaqueteEquipo->setItems($it);

                 /*cargar paquete de personal*/
                 $sql ="select distinct(sNumeroPaquete) from paquetesdepersonal where sContrato ='$sContrato' AND sIdPersonal<>''";
                 $rs = mysql_query($sql);
                 while($row = mysql_fetch_array($rs))
                    $it[$row[0]]=$row[0];
                 $this->cboPaquetePersonal->setItems($it);
               }


               /*dumpear codigo de javascript*/
               function dumpJavascript(){
                  echo "function recargar(){
                           document.location.href='frmPersonalEquipo.php';
                        }\n";
                  echo "function grids(){
                        /// Verificar si hay filas de equipo
                        var equiposTableModel = dbgEquipo.getTableModel();
                        var personalTableModel = dbgPersonal.getTableModel();
                        var totalFilase=equiposTableModel.getRowCount();
                        var totalFilasp=personalTableModel.getRowCount();

                        var rowData = [];
                        rowData.push(['_','_','_','_','_','_','_']);
                        var oData = rowData;
                        if(totalFilase<= 0){
                           equiposTableModel.originalData=oData;
                           equiposTableModel.setData(rowData);
                        }
                        if(totalFilasp <=0){
                           personalTableModel.originalData=oData;
                           personalTableModel.setData(rowData);
                        }

                  }
                  ";
               }
               /*carga los grid de personal y equipo*/
               function cargaPersonalEquipo($sender="", $params=""){
                  global $sContrato;
                  $fecha = formatoFechaPer($this->dIdFecha->Text,"Y-m-d");
                  $queryPersonal ="select
                        sIdPersonal as Personal,
                        iIdDiario as Id,
                        sDescripcion as Descripcion,
                        sIdPernocta as Pernocta,
                        sIdPlataforma as Plataforma,
                        dCantidad as Cantidad,
                        (dCantidad * dCostoMN) as Costo_Total
                     FROM bitacoradepersonal
                     WHERE
                        sContrato='$sContrato'
                        AND dIdFecha='$fecha'
                        AND iIdDiario='$params'";
                  $rs = mysql_query($queryPersonal);
                  if($row = mysql_fetch_array($rs)){
                     $queryPersonal = $queryPersonal;
                  }else{
                     $queryPersonal = "select '' as Personal,'' as ID,'' as Descripcion,'' as Pernocta,'' as Plataforma,'' as Cantidad,'' as Costo_total ";
                  }
                  $this->qryPersonal->setActive(false);
                  $this->qryPersonal->setSQL($queryPersonal);
                  $this->qryPersonal->setActive(true);
                  $sqlEquipo="select
                        dIdFecha as Fecha,
                        iIdDiario as ID,
                        sIdEquipo as Equipo,
                        sDescripcion as Descripcion,
                        sIdPernocta as Pernocta,
                        dCantidad as Cantidad,
                        (dCantidad * dCostoMN) as Costo_Total
                     from bitacoradeequipos
                     where
                        sContrato='$sContrato'
                        and iIdDiario='$params'
                        and dIdFecha='$fecha'";
                  $rs = mysql_query($sqlEquipo);
                  if($row = mysql_fetch_array($rs)){
                     $sqlEquipo = $sqlEquipo;
                  }else{
                     $sqlEquipo = "select '' as Fecha,'' as ID,'' as Equipo,'' as Descripcion,'' as Pernocta,'' as Plataforma,'' as Costo ";
                  }
                  $this->qryEquipo->setActive(false);
                  $this->qryEquipo->setSQL($sqlEquipo);
                  $this->qryEquipo->setActive(true);
                  //totales personal
                  $sql = "select sum(dCantidad)
                          FROM bitacoradepersonal
                          WHERE
                              sContrato='$sContrato'
                              AND dIdFecha='$fecha'
                              AND iIdDiario='$params'";
                  $rs = mysql_query($sql);
                  if($row = mysql_fetch_array($rs)){
                     $this->lblTotalPersonal->Caption= $row[0];
                  }else{
                   $this->lblTotalPersonal->Caption= '0';
                  }
                  //totales equipos
                  $sql = "select sum(dCantidad) from bitacoradeequipos
                     where
                        sContrato='$sContrato'
                        and iIdDiario='$params'
                        and dIdFecha='$fecha'";
                  $rs = mysql_query($sql);
                  if($row = mysql_fetch_array($rs)){
                     $this->lblTotalEquipo->Caption= $row[0];
                  }else{
                     $this->lblTotalEquipo->Caption= '0';
                  }
               }
               #cargar el personal y equipo al dar clic
               function dbgNotasJSClick($sender, $params)
               {
               global $_SESSION;
               ?>
                  //javascript code
                  colId = 2;
                  dbgNotas.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = dbgNotas.getTableModel();
                        var id = tableModel.getValue(colId, index);
                        params = id;
                        document.getElementById("txtIdSeleccionado").value="Seleccionado : "+id;
                        xajax.doneLoadingFunction=grids;
                        <?php
                        echo $this->dbgNotas->ajaxCall("cargaPersonalEquipo",array(),array("dbgPersonal","dbgEquipo","lblTotalEquipo","lblTotalPersonal"));
                        ?>
                     }

                  );
                  <?php
                     /*
                     se recarga la pagina la primera vez
                     que se da clic en una nota
                     */
                     /*if($_SESSION['recargarVez']!="Ok"){
                        ?>
                        setTimeout("recargar()",6);
                        <?php
                        $_SESSION['recargarVez']="Ok";
                     }   */
                  ?>

                  return false;

               <?php

               }

               /*conecta con la base de datos*/
               function conectarMysql(){
                  global $Servidor,$Usuario,$Clave;
                  global $_SESSION;
                  $this->database->setUserName($Usuario);
                  $this->database->setDatabaseName($_SESSION['database']);
                  $this->database->setUserPassword($Clave);
                  $this->database->setHost($Servidor);
               }
               /*carga notas al mostrar formulario*/
               function cargarNotas(){
                  global $sContrato;

                  $fecha = formatoFechaPer($this->dIdFecha->Text,"Y-m-d");
                  $orden =  $this->ordenSeleccionada();
                  $iId = explode(":",$this->txtIdSeleccionado->Text);
                  $idSel = trim($iId[count($iId)-1]);
                  #cargar las notas del dia
                  $queryNotas = "SELECT
                        DATE_FORMAT(b.dIdFecha,'%d/%m/%Y') as Fecha,
                        b.sNumeroOrden as Orden,
                        b.iIdDiario as ID,
                        tu.sDescripcion as Turno,
                        b.sWbs as Wbs,
                        t.sDescripcion as Movimiento
                     FROM bitacoradeactividades  b INNER JOIN tiposdemovimiento t
                        ON (
                           b.sIdTipoMovimiento = t.sIdTipoMovimiento AND t.sContrato=b.sContrato
                        )
                     INNER JOIN turnos tu ON (b.sContrato=tu.sContrato AND b.sIdTurno=tu.sIdTurno)
                     WHERE b.sContrato='$sContrato' AND b.sIdTipoMovimiento<>'A'
                     AND b.sNumeroOrden='$orden' AND b.sIdTurno='".$_SESSION['ssIdTurno']."'
                     AND b.dIdFecha='$fecha'";
                  $this->conectarMysql();
                  $this->qryNotas->setActive(false);
                  $this->qryNotas->setSQL($queryNotas);
                  $this->qryNotas->setActive(true);

                  $rs = mysql_query($queryNotas);
                  if($row = mysql_fetch_array($rs)){
                     $id = $row['ID'];
                  }

                  if($orden==$_SESSION['oldOrden'] and $fecha==$_SESSION['ViejafechaOrden']){
                     $id = ($idSel=="" or trim($idSel)=="Ninguno" )?$id:trim($idSel);
                     $this->txtIdSeleccionado->Text="Seleccionado: ".((trim($id)=="")?"Ninguno":$id);
                     $this->cargaPersonalEquipo("",$id);
                  }else{
                     $this->txtIdSeleccionado->Text="Seleccionado: ".((trim($id)=="")?"Ninguno":$id);
                     $_SESSION['oldOrden']=$orden;
                     $_SESSION['ViejafechaOrden']=$fecha;
                     $this->cargaPersonalEquipo("",$id);
                 }
                 $this->txtFechaSeleccionada->Value=$fecha;
                }
        }

        global $application;

        global $frmPersonalEquipo;

        //Creates the form
        $frmPersonalEquipo=new frmPersonalEquipo($application);

        //Read from resource file
        $frmPersonalEquipo->loadResource(__FILE__);

        //Shows the form
        $frmPersonalEquipo->show();

?>
<script>

//ocultar los paneles
   document.getElementById("Panel1_outer").style.display  ='block';
   document.getElementById("Panel2_outer").style.display  ='none';
   document.getElementById("cmdPersonal").disabled=true;
   document.getElementById("cmdEquipo").disabled=false;

//poner el grid como solo lectura
function Edit(DBGrid1_tableModel,k){
   var valor = DBGrid1_tableModel.getValue(0, 0);
   if(valor != null)
   {
      for(var i = 0; i<k; i++)
         DBGrid1_tableModel.setColumnEditable(i, false);
   }
   if(dbgPersonal_tableModel.getValue(0, 0)!=null){
      dbgPersonal.setColumnWidth(0,0);
      dbgPersonal.setColumnWidth(1,0);
   }
   if(dbgEquipo_tableModel.getValue(0, 0)!=null){
      dbgEquipo.setColumnWidth(0,0);
      dbgEquipo.setColumnWidth(1,0);
      dbgEquipo.setColumnWidth(2,0);
   }
}

setInterval ("Edit(dbgEquipo_tableModel,7)",10);
setInterval ("Edit(dbgPersonal_tableModel,7)",10);
setInterval ("Edit(dbgNotas_tableModel,7)",10);
grids();
</script>
