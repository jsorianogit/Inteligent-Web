<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require_once("mysql.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        //$sContrato="425027849";
        $sIdUsuario=$_SESSION["ssUsuario"];//'adal2404';
        //Class definition
        class frmSalidasAlmacen extends Page
        {
               public $cmdBuscar = null;
               public $cmdImprimir = null;
               public $cmdCrearRequisicion = null;
               public $dFechaSalida = null;
               public $sIdAlmacen = null;
               public $label = null;
               public $mDescripcion = null;
               public $cmdAceptar = null;
               public $sRecibe = null;
               public $dCantidad = null;
               public $dbgBitacora = null;
               public $dbgSolicitudes = null;
               public $hsIdInsumo = null;
               public $sIdSolicitud = null;
               public $sNumeroOrden = null;
               public $Label7 = null;
               public $dsSolicitudes = null;
               public $qrySolicitudes = null;
               public $qryBitacorasalida = null;
               public $db = null;
               public $dsBitacorasalida = null;
               public $Label6 = null;
               public $Label5 = null;
               public $Label4 = null;
               public $Label1 = null;
               public $Label2 = null;
               public $Label3 = null;
               public $Label8 = null;
               function cmdBuscarJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                 document.location.href='frmBuscarSolicitud.php';
                 return false;
               <?php
               }

               function cmdImprimirJSClick($sender, $params)
               {
               global $sContrato;
               ?>
                  //Add your javascript code here
                  ok=0;
                  if (document.getElementById("sIdAlmacen").value == "--" )
                  {  alert (" No ha Seleccionado un Almacen !!!");
                     ok=1;
                  }
                  if (document.getElementById("sIdSolicitud").value == "--" )
                  {  alert (" Seleccione El Folio de la Solicitud !!! ");
                     ok=1;
                  }
                  if (ok==0)
                  {   ruta = "../reporte.php";
                      ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                      ruta = ruta + "&sAlmacen="+document.getElementById("sIdAlmacen").value;
                      ruta = ruta + "&sSolicitud="+document.getElementById("sIdSolicitud").value;
                      ruta = ruta + "&sNumeroOrden="+document.getElementById("sNumeroOrden").value;
                      ruta = ruta + "&reportesPath=SalidasAlmacen";
                      ruta = ruta + "&nombreReporte=rptValeSalida";
                      var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                  }
                  return false;
               <?php
               }


               function cmdCrearRequisicionJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                     if(confirm("Probablemente ya existan requisiciones donde se esten solicitando los insumos de este Numero de Pedido, desea cancelar la operacion de creacion para que pueda verificar en requisiciones?")){
                        return false;
                     }else{
                        return true;
                     }
               <?php

               }

               function cmdCrearRequisicionClick($sender, $params)
               {
                  global $sContrato,$sIdUsuario;
                  $sNumeroOrden = $this->sNumeroOrden->getItemIndex();
                  $sIdSolicitud = $this->sIdSolicitud->getItemIndex();
                  /*persona que solicita los insumos*/
                  mysql_query("begin");
                  $sql = "select aso.sIdUsuarioCreador,u.sNombre from anexo_solicitud aso inner join usuarios u on (
                                 aso.sIdUsuarioCreador=u.sIdUsuario
                           )
                           where aso.sContrato='$sContrato'
                              and aso.sIdSolicitud='$sIdSolicitud'";
                  $rs = mysql_query($sql);
                  if(mysql_error())$error = mysql_error();

                  if($row = mysql_fetch_array($rs)){
                     $sIdSolicita = $row["sIdUsuarioCreador"] ;
                     $sNombreSolicitante = $row["sNombre"] ;
                  }
                  /*crear folio de la requisicion*/
                  $sql = "select max(iFolioRequisicion)+1 as iFolioRequisicion from anexo_requisicion
                           where sContrato='$sContrato' ";
                  $rs = mysql_query($sql);
                   if(mysql_error())$error = mysql_error();

                  if($row = mysql_fetch_array($rs)){
                     $iFolioRequisicion = $row["iFolioRequisicion"] ;
                  }

                  if ($iFolioRequisicion==""){
                     $iFolioRequisicion=1;
                  }
                  /*insumos requeridos*/
                  $sql = "select
                              i.*,
                              if((ifnull(d.dCantidad,0))=0,ax.dCantidad-sum(b.dCantidad),(ax.dCantidad-sum(b.dCantidad)-d.dCantidad)) as total
                           from anexo_psolicitud ax
                                inner join bitacoradetallesalida b on (
                                  ax.sContrato=b.sContrato
                                  and ax.sIdSolicitud=b.sIdSolicitud
                                  and ax.sIdInsumo=b.sIdInsumo
                                )
                                inner join insumos i on (
                                  i.sContrato=b.sContrato
                                  and i.sIdInsumo=b.sIdInsumo
                                  and i.sIdAlmacen='ALM1'
                                )
                                left  join devoluciones d          on (
                                  d.sContrato=b.sContrato
                                  and d.sIdInsumo=b.sIdInsumo
                                  and b.sIdSolicitud=d.sIdSolicitud
                                )
                        where
                             i.sContrato='$sContrato'
                             and ax.sIdSolicitud='$sIdSolicitud'
                        group by b.sIdInsumo";
                        $rs = mysql_query($sql);
                        if(mysql_error())$error = mysql_error();
                        $existenPartidas=false;
                        while($rw = mysql_fetch_array($rs)){
                           if($rw["total"]>0 and $rw["dExistencias"]<$rw["total"]){

                              $sIdInsumo = $rw["sIdInsumo"];
                              $mDescripcion = $rw["mDescripcion"];
                              $sMedida = $rw["sMedida"];
                              $dCantidad= $rw["total"]-$rw["dExistencias"];
                              $dVentaMN= $rw["dVentaMN"];
                              $sql = "insert into anexo_prequisicion set
                                    sContrato='$sContrato',
                                    iFolioRequisicion='$iFolioRequisicion',
                                    sIdInsumo='$sIdInsumo',
                                    iItem=(select if(ifnull(max(a.iItem),0)=0,1,max(a.iItem)+1) from anexo_prequisicion as a where a.sContrato='$sContrato' ),
                                    mDescripcion='$mDescripcion',
                                    sMedida='$sMedida',
                                    dFechaRequerimiento='".date("Y-m-d")."',
                                    dCantidad='$dCantidad',
                                    dCosto='$dVentaMN',
                                    sModelo='',
                                    sNumeroActividad='',
                                    sNumeroOrden='$sNumeroOrden'
                                 ";
                              mysql_query($sql);
                              if(mysql_error())$error = mysql_error();
                              $existenPartidas=true;
                           }
                        }

                  /*caratula de requisicion*/
                 $sql = "insert into anexo_requisicion values (
                           '$sContrato',
                            $iFolioRequisicion,
                           '$sNumeroOrden',
                           '".date("Y-m-d")."',
                           '".date("Y-m-d")."',
                           '".date("Y-m-d")."',
                           '',
                           '',
                           '$sNombreSolicitante',
                           '',
                           '',
                           '',
                           'Requisicion creada desde Salidas de Almacen, debido a que no hay existencias de estos elementos',
                           'Pendiente',
                           '',
                           '',
                           '',
                           '',
                           'Pendiente')";
                  $creada=false;
                  if($existenPartidas){
                     mysql_query($sql);
                     if(mysql_error())$error = mysql_error();
                     $creada = true;
                  }

                  if($error){
                     echo $error;
                      ?>
                        <script>
                           alert("Ocurrieron errores en las operaciones, no se creará la requisicion !!");
                        </script>
                      <?php
                     mysql_query("rollback");
                  }else{
                      mysql_query("commit");
                      if($creada){
                      ?>
                        <script>
                           alert("se ha creado la Requisicion correctamente con el numero de Requisicion: <?php echo $iFolioRequisicion ?>");
                        </script>
                      <?php
                      } else{
                      ?>
                        <script>
                           alert("no se creo la Requisicion ya que se cuenta con suficiente existencia o los insumos han sido entregados completamente en este numero de solicitud");
                        </script>
                      <?php
                      }
                  }


               }

               function dbgBitacoraJSClick($sender, $params)
               {

               ?>
                  dbgBitacora.getSelectionModel().iterateSelection
                    (    function(index)
                         {
                           var Tabla = dbgBitacora.getTableModel();

                           document.getElementById("hsIdInsumo").value= Tabla.getValue(0, index);
                           document.getElementById("mDescripcion").value= Tabla.getValue(1, index);
                           if(Tabla.getValue(4, index) == null || Tabla.getValue(4, index) == "")
                              document.getElementById("dCantidad").value= Tabla.getValue(3, index);
                           else
                              document.getElementById("dCantidad").value= Tabla.getValue(4, index);
                        }
                     );
                     return false;
               <?php

               }


               function cmdAceptarClick($sender, $params)
               {
                  global $sContrato;
                  $dCantidad    = $this->dCantidad->getText();
                  $sIdInsumo    = $this->hsIdInsumo->Value;
                  $sIdSolicitud = $this->sIdSolicitud->getItemIndex();
                  $sRecibe      = $this->sRecibe->getText();
                  $sNumeroOrden = $this->sNumeroOrden->getItemIndex();
                  $sIdAlmacen   = $this->sIdAlmacen->getItemIndex();
                  $dExistencias = 0;
                  $dFaltante    = 0;
                  $dEntregado   = 0;
                  #obtener el precio que se le asigno al insumo la ultima vez
                  $sql = "select
                              @fecha:=(  select max(dFechaEntrega)
                                         from
                                          bitacoradeentrada
                                        where
                                          sContrato='$sConteato'
                                          and sIdInsumo='$sIdInsumo'
                                          and sIdAlmacen = '$sIdAlmacen'
                                        group by sIdInsumo
                                       ) as fecha,
                                      ( select dNuevoPrecio   from
                                          bitacoradeentrada
                                        where
                                          sContrato='$sConteato'
                                          and sIdInsumo='$sIdInsumo'
                                          and sIdAlmacen = '$sIdAlmacen'
                                          and dFechaEntrega=@fecha
                                       group by sIdInsumo
                                      ) as dPrecio";

                  $rs = mysql_query($sql);
                  if($rw = mysql_fetch_array($rs)){
                     $dPrecio = $rw["dPrecio"]==""?0:$rw["dPrecio"];
                  }

                  #obtener la cantidad entregada,la existencia y lo que falta por entregar
                 $sql = "select
                              b.dCantidad as dCantidadSolicitada,
                              i.dExistencias as dExistencias,
                              b.dCantidad-sum(bs.dCantidad) as faltante,
                              b.dCantidad as solicitado,
                              sum(bs.dCantidad) as entregado
                         from
                           anexo_psolicitud b inner join insumos i
                              on(i.sContrato=b.sContrato and i.sIdInsumo=b.sIdInsumo)
                          left join bitacoradetallesalida bs
                              on(b.sContrato=bs.sContrato and b.sIdInsumo=bs.sIdInsumo and bs.sIdSolicitud=b.sIdSolicitud)
                         where
                           b.sContrato='$sContrato'
                           and b.sIdInsumo='$sIdInsumo'
                           and b.sIdSolicitud='$sIdSolicitud'
                           and i.sIdAlmacen = '$sIdAlmacen'
                         group by b.sIdInsumo";

                  $rs = mysql_query($sql);
                  if($rw = mysql_fetch_array($rs)){
                     $dExistencias = $rw["dExistencias"]==""?0:$rw["dExistencias"];
                     $dCantidadSolicitada   = $rw["dCantidadSolicitada"]==""?0:$rw["dCantidadSolicitada"];
                     $dFaltante    = $rw["faltante"]==""?$dCantidadSolicitada:$rw["faltante"];
                     $dEntregado   = $rw["entregado"]==""?0:$rw["entregado"];
                  }

                  if($dCantidad <=0){

                     ?>
                        <script>
                        alert("Debe especificar una cantidad mayor que cero");
                        </script>
                     <?php

                  }else if($dCantidad > $dExistencias ){

                     ?>
                        <script>
                        alert( "Existencias insuficientes en el almacen seleccionado!!");
                        </script>
                     <?php

                  }else if($dCantidad > $dFaltante){
                     ?>
                        <script>
                        alert("La cantidad que escribió, es mayor a la cantidad de material que se debe de dar salida");
                        </script>
                     <?php

                  }else{
                     $tmpFaltante =  $dFaltante-$dCantidad;

                     if($tmpFaltante<0)$tmpFaltante=0;

                     mysql_query("begin");

                     mysql_query("insert into bitacoradesalida values(
                                 '$sContrato',
                                 '".date("Y-m-d")."',
                                 '$sIdUsuario',
                                 '$sRecibe',
                                 '$sIdSolicitud',
                                 '$sNumeroOrden') on duplicate key update sRecibe='$sRecibe'");
                     if(mysql_error())$error =mysql_error();

                     $sql="insert into bitacoradetallesalida set
                                    sContrato='$sContrato',
                                    sIdInsumo='$sIdInsumo',
                                    dCantidad='$dCantidad',
                                    dCantidadAnterior='$dEntregado',
                                    dPrecio='$dPrecio',
                                    iItem=(select (select max(a.iItem) from bitacoradetallesalida as a where a.sContrato='425027849' )+1),
                                    sIdSolicitud='$sIdSolicitud',
                                    dIdFecha='".date("Y-m-d")."',
                                    sIdAlmacen='$sIdAlmacen'";
                     mysql_query($sql);
                     if(mysql_error())$error =mysql_error();

                     if($tmpFaltante > 0 )$lStatus='Incompleto';
                     else if($tmpFaltante == $dCantidadSolicitada )$lStatus='Pendiente';
                     else if($tmpFaltante <= 0 )$lStatus='Completo';

                     mysql_query("update anexo_psolicitud set lStatus = '$lStatus'
                                  where sContrato='$sContrato'
                                       and sIdSolicitud='$sIdSolicitud'
                                       and sIdInsumo='$sIdInsumo'");
                     if(mysql_error())$error =mysql_error();

                     mysql_query("update anexo_psolicitud set lStatus = '$lStatus'
                                  where sContrato='$sContrato'
                                       and sIdSolicitud='$sIdSolicitud'
                                       and sIdInsumo='$sIdInsumo'");
                     if(mysql_error())$error =mysql_error();

                     mysql_query("update insumos set dExistencias = dExistencias-$dCantidad
                                  where sContrato='$sContrato'
                                        and sIdInsumo='$sIdInsumo'
                                        and sIdAlmacen='$sIdAlmacen'");
                     if(mysql_error())$error =mysql_error();

                     #verificar que se entrego todo
                     $sql = " select
                                 lStatus
                              from anexo_psolicitud
                              where
                                 sContrato='$sContrato'
                                 and sIdSolicitud='$sIdSolicitud'
                                 and sIdInsumo='$sIdInsumo'";
                     $rs = mysql_query($sql);
                     $lPendientes=false;
                     while($rw = mysql_fetch_array($rs)){
                        if($rw['lStatus'] == "Pendiente"){
                           $lPendientes=true;
                           break;
                        }
                     }

                     if(!$lPendiente){
                         mysql_query("update anexo_solicitud set lStatusEntrega='Entregado'
                                       where sContrato='$sContrato'
                                          and sIdSolicitud='$sIdSolicitud'");
                        if(mysql_error())$error = mysql_error();
                     }

                     if($error=="")mysql_query("commit");
                     else  mysql_query("rollback");
                  }

               }

               function dbgSolicitudesJSClick($sender, $params)
               {

               ?>
                  dbgSolicitudes.getSelectionModel().iterateSelection
                    (    function(index)
                         {
                           var Tabla = dbgSolicitudes.getTableModel();

                           document.getElementById("hsIdInsumo").value= Tabla.getValue(0, index);
                           document.getElementById("mDescripcion").value= Tabla.getValue(1, index);
                           if(Tabla.getValue(4, index) == null || Tabla.getValue(4, index) == "")
                              document.getElementById("dCantidad").value= Tabla.getValue(3, index);
                           else
                              document.getElementById("dCantidad").value= Tabla.getValue(4, index);
                        }
                     );
                     return false;
               <?php

               }

               function sIdSolicitudChange($sender, $params)
               {
                  global $sContrato;
                  $sIdSolicitud = $this->sIdSolicitud->getItemIndex();
                  $sql = "select * from bitacoradesalida where sContrato='$sContrato' and sIdSolicitud='$sIdSolicitud'";
                  $rs = mysql_query($sql);
                  if($rw = mysql_fetch_array($rs)){
                     $this->sRecibe->setText($rw["sRecibe"]);
                     $this->dFechaSalida->setText($rw["dFechaSalida"]);
                     $this->sNumeroOrden->setItemIndex($sNumeroOrden);
                  }else{
                     $this->dFechaSalida->setText(date("Y-m-d"));

                  }
                  $this->cargarGridSalida();


               }

               function frmSalidasAlmacenBeforeShow($sender, $params)
               {
                  global $sContrato,$_SESSION;
                  global $_SESSION,$Usuario,$Clave,$Servidor;

                  $this->db->setConnected(false);
                  $this->db->setDatabaseName($_SESSION['database']);
                  $this->db->setUserName($Usuario);
                  $this->db->setUserPassword($Clave);
                  $this->db->setHost($Servidor);
                  $this->db->setConnected(true);

                  $sql = "select sIdSolicitud from anexo_solicitud where sContrato='$sContrato' and lStatus='Autorizado'";
                  $rs = mysql_query($sql);
                  unset($it);
                  $it["--"]="";
                  while($rw = mysql_fetch_array($rs)){
                     $it[$rw[0]]=$rw[0];
                  }
                  $this->sIdSolicitud->setItems($it);

                  $sql = "select sNumeroOrden from ordenesdetrabajo where sContrato='$sContrato' ";
                  $rs = mysql_query($sql);
                  unset($it);
                  while($rw = mysql_fetch_array($rs)){
                     $it[$rw[0]]=$rw[0];
                  }
                  $this->sNumeroOrden->setItems($it);

                  $sql = "select al.sIdAlmacen,al.sDescripcion from almacenes al
                                 inner join almacenxusuarios a on (
                                      al.sIdAlmacen=a.sIdAlmacen
                                      and a.sIdUsuario='".$_SESSION["ssUsuario"]."'
                                 ) where a.sContrato='$sContrato' ";
                  $rs = mysql_query($sql);
                  unset($it);
                  $it["--"]="";
                  while($rw = mysql_fetch_array($rs)){
                     $it[$rw[0]]=$rw[1];
                  }
                  $this->sIdAlmacen->setItems($it);

                  $this->cargarGridSalida();

               }
               function cargarGridSalida(){
                  global $sContrato;

                  $this->qrySolicitudes->setActive(false);
                  $this->qrySolicitudes->setSQL("select
                             i.mDescripcion as md,b.*,
                             b.dCantidad-sum(bs.dCantidad) as faltante,
                             b.dCantidad as solicitado,
                             bs.dCantidad as entregado
                           from
                             anexo_psolicitud b inner join insumos i
                               on(i.sContrato=b.sContrato and i.sIdInsumo=b.sIdInsumo)
                             left join bitacoradetallesalida bs on(
                              b.sContrato=bs.sContrato
                              and b.sIdInsumo=bs.sIdInsumo
                              and bs.sIdSolicitud=b.sIdSolicitud)
                             where
                              b.sIdSolicitud='".$this->sIdSolicitud->getItemIndex()."'
                              #and b.lStatus<>'Completo'
                              and b.sContrato='$sContrato'
                             group by sIdInsumo");

                  $this->qrySolicitudes->setActive(true);

                  $this->qryBitacorasalida->setActive(false);
                  $sql = "select *,sum(b.dCantidad) as dc
                     from bitacoradetallesalida b
                        inner join insumos i on(i.sContrato=b.sContrato and i.sIdInsumo=b.sIdInsumo)
                     where
                        b.sIdSolicitud='".$this->sIdSolicitud->getItemIndex()."'
                        and b.sContrato='$sContrato'
                     group by b.sIdInsumo";
                  $this->qryBitacorasalida->setSQL($sql);
                  $this->qryBitacorasalida->setActive(true);

               }

               function dumpJavascript()
               {      echo 'function ResaltarBotones()
                      {
                           document.getElementById("sIdAlmacen").style.backgroundColor = "";
                           document.getElementById("sIdSolicitud").style.backgroundColor = "";
                           document.getElementById("sRecibe").style.backgroundColor = "";
                           document.getElementById("dFechaSalida").style.backgroundColor = "";
                           document.getElementById("sNumeroOrden").style.backgroundColor = "";
                           document.getElementById("mDescripcion").style.backgroundColor = "";
                           document.getElementById("dCantidad").style.backgroundColor = "";
                           document.getElementById("cmdAceptar").style.backgroundColor = "";
                           document.getElementById("cmdCrearRequisicion").style.backgroundColor = "";
                           document.getElementById("cmdImprimir").style.backgroundColor = "";
                           document.getElementById("cmdBuscar").style.backgroundColor = "";
                           return false;
                     }';
               }
                function dCantidadJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCantidadJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCantidadJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function mDescripcionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function mDescripcionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function mDescripcionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sNumeroOrdenJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sNumeroOrdenJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sNumeroOrdenJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dFechaSalidaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dFechaSalidaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dFechaSalidaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRecibeJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRecibeJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRecibeJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdSolicitudJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdSolicitudJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdSolicitudJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdAlmacenJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdAlmacenJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdAlmacenJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

        }

        global $application;

        global $frmSalidasAlmacen;

        //Creates the form
        $frmSalidasAlmacen=new frmSalidasAlmacen($application);

        //Read from resource file
        $frmSalidasAlmacen->loadResource(__FILE__);

        //Shows the form
        $frmSalidasAlmacen->show();

?>
<script>
ResaltarBotones();
</script>

