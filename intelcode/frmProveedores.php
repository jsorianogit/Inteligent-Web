<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require_once("mysql.inc.php");
        use_unit("menus.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        //$sContrato='425027849';
        //Class definition
        class frmProveedores extends Page
        {
               public $cmdPrint = null;
               public $FechaF = null;
               public $Label18 = null;
               public $FechaI = null;
               public $Label17 = null;
               public $CombUsuario = null;
               public $Label16 = null;
               public $Label14 = null;
               public $sRepresentante = null;
               public $Label13 = null;
               public $mComentarios = null;
               public $Label12 = null;
               public $sBanco = null;
               public $Label11 = null;
               public $Label10 = null;
               public $Label9 = null;
               public $Label7 = null;
               public $Label6 = null;
               public $Label5 = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $sSucursal = null;
               public $sCuenta = null;
               public $sTelefono = null;
               public $sRfc = null;
               public $sEstado = null;
               public $sCiudad = null;
               public $sDomicilio = null;
               public $sRazon = null;
               public $sIdProveedor = null;
               public $dbgOrdenesCompra = null;
               public $Label8 = null;
               public $HidError = null;
               public $Panel3 = null;
               public $Panel1 = null;
               public $sFormato = null;
               public $Label15 = null;
               public $Memo1 = null;
               public $hOperacion = null;
               public $hOldsIdProveedor = null;
               public $qryOrdenes = null;
               public $dsOrdenes = null;
               public $dbgGeneral = null;
               public $dsProveedores = null;
               public $qryProveedores = null;
               public $dsGeneral = null;
               public $qryGeneral = null;
               public $cmdAgregar = null;
               public $cmdModificar = null;
               public $cmdEliminar = null;
               public $cmdAceptar = null;
               public $cmdImprimir = null;
               public $cmdCancelar = null;
               public $Database1 = null;
               public $dbgProveedores = null;
               public $Panel2 = null;
               public $Label1 = null;
               public $items = array("sIdProveedor","sRazon","sDomicilio","sCiudad","sEstado","sRfc","sTelefono","sCuenta","sSucursal","sBanco","mComentarios","sRepresentante");
               function CombUsuarioJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CombUsuarioJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CombUsuarioJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdPrintJSClick($sender, $params)
               {
               ?>  //Add your javascript code here
                   document.getElementById("HidError").value = 0;
                   var Fecha="f-calendar-field-2";
                   ComponerFecha(Fecha);
                   var Fecha="f-calendar-field-1";
                   ComponerFecha(Fecha);
                   if (document.getElementById("HidError").value == 1)
                   {   var fecha="f-calendar-field-2";
                       FechaActual(fecha);
                       var fecha="f-calendar-field-1";
                       FechaActual(fecha);
                       return false;
                   }
                   else
                       {
                         var fecha="f-calendar-field-2";
                         FechaActual(fecha);
                         var fecha="f-calendar-field-1";
                         FechaActual(fecha);
                         return false;

                       }
               <?php
               }

               function cmdImprimirJSClick($sender, $params)
               {
               global $sContrato;
               ?>
               //Add your javascript code here
                 ok=0;
                  dbgProveedores.getSelectionModel().iterateSelection
                  (   function(index)
                      {
                        var tablaProveedores = dbgProveedores.getTableModel();
                        ruta = "../reporte.php";
                        ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                        ruta = ruta + "&sProveedor=" +  tablaProveedores.getValue(0,index);
                        ruta = ruta + "&nombreReporte=rptProveedores";
                        ruta = ruta + "&reportesPath=proveedores";
                        var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                        ok=1;
                      }
                  );
                  if (ok==0)
                     alert (" Haga Click sobre un Proveedor !!! ");

                  return false;
               <?php

               }


               function cmdEliminarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  if(confirm("desea eliminar el proveedor seleccionado ??")){
                     LimpiaTexto();
                     return true;
                  }
                  else{
                     return false;
                  }
               <?php

               }

               function cmdEliminarClick($sender, $params)
               {
                  global $sContrato;
                  $oldProveedor = $this->hOldsIdProveedor->Value;
                  $Existe = 0;
                     $sql = "select sIdProveedor from anexo_pedidos where sIdProveedor='$oldProveedor'";
                     $rw = mysql_query($sql);
                     if($row = mysql_fetch_array($rw)){
                        $Existe = 1;
                     }
                     $sql="select sIdProveedor from anexo_suministro where sIdProveedor='$oldProveedor'";
                     $rw =mysql_query($sql);
                     if($row = mysql_fetch_array($rw)){
                        $Existe = 2;
                     }
                     $sql="select sIdProveedor from inventario_fentrada where sIdProveedor='$oldProveedor'";
                     $rw = mysql_query($sql);
                     if($row = mysql_fetch_array($rw)){
                        $Existe = 3;
                     }
                     $sql="select sIdProveedor from inventario_fsalida where sIdProveedor='$oldProveedor'";
                     $rw = mysql_query($sql);
                     if($row = mysql_fetch_array($rw)){
                        $Existe = 4;
                     }
                     if($Existe > 0){
                        $this->Memo1->Text =" NO SE PUEDE ELIMINAR EL REGISTRO, AUN ESTA REFERENCIADO !!";
                     }else{
                        $this->Memo1->Text =" ";
                        $sql = "delete from proveedores where sIdProveedor='$oldProveedor'";
                        mysql_query($sql);
                     }
                  $this->qryProveedores->setActive(false);
                  $this->qryProveedores->setActive(true);

                  $this->qryGeneral->setActive(false);
                  $this->qryGeneral->setFilter(" sContrato = '$sContrato' ");
                  $this->qryGeneral->setActive(true);


               }



               function cmdAceptarClick($sender, $params)
               {

                  global $sContrato;
                  $oldProveedor = $this->hOldsIdProveedor->Value;

                  foreach($this->items as $valor){
                     if($valor != "mComentarios")
                        eval(" \$".$valor."=strtoupper( \$this->".$valor."->getText() );");
                     else
                        eval(" \$".$valor."=strtoupper( \$this->".$valor."->Text );");
                  }
                  if($this->hOperacion->Value=="modificar"){
                     mysql_query("begin");
                     mysql_query("update anexo_pedidos set sIdProveedor='$sIdProveedor' where sIdProveedor='$oldProveedor'");
                     if(mysql_error())$error = mysql_error();
                     mysql_query("update anexo_suministro set sIdProveedor='$sIdProveedor' where sIdProveedor='$oldProveedor'");
                     if(mysql_error())$error = mysql_error();
                     mysql_query("update inventario_fentrada set sIdProveedor='$sIdProveedor' where sIdProveedor='$oldProveedor'");
                     if(mysql_error())$error = mysql_error();
                     mysql_query("update inventario_fsalida set sIdProveedor='$sIdProveedor' where sIdProveedor='$oldProveedor'");
                     if(mysql_error())$error = mysql_error();
                     mysql_query("update proveedores set
                           sIdProveedor='$sIdProveedor',
                           sRazon='$sRazon',
                           sDomicilio='$sDomicilio',
                           sCiudad='$sCiudad',
                           sEstado='$sEstado',
                           sRfc='$sRfc',
                           sTelefono='$sTelefono',
                           sCuenta='$sCuenta',
                           sSucursal='$sSucursal',
                           sBanco='$sBanco',
                           mComentarios='$mComentarios',
                           sRepresentante='$sRepresentante'
                        where sIdProveedor='$oldProveedor'");
                     if(mysql_error()){
                        $error = mysql_error();
                        $this->Memo1->Text = $error;
                     }
                     if($error)
                        mysql_query("rollback");
                     else
                        mysql_query("commit");
                  }else if($this->hOperacion->Value=="insertar"){
                     $sql="insert into proveedores set
                        sIdProveedor='$sIdProveedor',
                        sRazon='$sRazon',
                        sDomicilio='$sDomicilio',
                        sCiudad='$sCiudad',
                        sEstado='$sEstado',
                        sRfc='$sRfc',
                        sTelefono='$sTelefono',
                        sCuenta='$sCuenta',
                        sSucursal='$sSucursal',
                        sBanco='$sBanco',
                        mComentarios='$mComentarios',
                        sRepresentante='$sRepresentante'";
                     mysql_query($sql);
                        if(mysql_error())$this->Memo1->Text = mysql_error();
                  }
                  $this->qryProveedores->setActive(false);
                  $this->qryProveedores->setActive(true);

                  $this->qryGeneral->setActive(false);
                  $this->qryGeneral->setFilter(" sContrato = '$sContrato' ");
                  $this->qryGeneral->setActive(true);

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
                 if (document.getElementById("sIdProveedor").value=="")
                     alert ("Haga Click en un Proveedor !!! ");
                 else
                    {   deshabilitar(false);
                        document.getElementById("sIdProveedor").focus();
                        document.getElementById("hOperacion").value="modificar";
                    }
                    return false;
               <?php

               }

               function cmdAgregarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                    LimpiaTexto() ;
                    deshabilitar(false);
                    document.getElementById("sIdProveedor").focus();
                    document.getElementById("hOperacion").value="insertar";
                    return false;
               <?php

               }

               function frmProveedoresBeforeShow($sender, $params)
               {
               global $sContrato;

               global $_SESSION,$Usuario,$Clave,$Servidor,$_REQUEST;
               //Conectar a la base de datos
               $this->Database1->setConnected(false);
               $this->Database1->setDatabaseName($_SESSION['database']);
               $this->Database1->setUserName($Usuario);
               $this->Database1->setUserPassword($Clave);
               $this->Database1->setHost($Servidor);
               $this->Database1->setConnected(true);

               $this->qryOrdenes->setActive(false);
               $this->qryOrdenes->setSQL("select '' as Folio,
                                             '' as Orden,
                                             '' as Fecha,
                                             '' as FechaEntrega,
                                             '' as Referencia,
                                             '' as Elaboro
                                             ");
               $this->qryOrdenes->setActive(true);

               $this->qryGeneral->setActive(false);
               $this->qryGeneral->setFilter(" sContrato = '$sContrato' ");
               $this->qryGeneral->setActive(true);

               $this->qryProveedores->setActive(false);
               $this->qryProveedores->setActive(true);

               $sql = "select sIdUsuario, sIdAlmacen from almacenxusuarios
                       where sContrato = '$sContrato' group by sIdUsuario";
               $rs = mysql_query($sql);
               unset($it);
               $it['%%'] = 'Todos';
               while($rw = mysql_fetch_array($rs))
               {     $it[$rw['sIdUsuario']]=$rw['sIdUsuario'];
               }
               $this->CombUsuario->setItems($it);

               }


               function dumpJavascript(){
                  echo 'function deshabilitar(val){
                           document.getElementById("sIdProveedor").disabled=val;
                           document.getElementById("sRazon").disabled=val;
                           document.getElementById("sDomicilio").disabled=val;
                           document.getElementById("sCiudad").disabled=val;
                           document.getElementById("sEstado").disabled=val;
                           document.getElementById("sRfc").disabled=val;
                           document.getElementById("sTelefono").disabled=val;
                           document.getElementById("sCuenta").disabled=val;
                           document.getElementById("sSucursal").disabled=val;
                           document.getElementById("sBanco").disabled=val;
                           document.getElementById("mComentarios").disabled=val;
                           document.getElementById("sRepresentante").disabled=val;

                           document.getElementById("cmdAgregar").disabled=!val;
                           document.getElementById("cmdModificar").disabled=!val;
                           document.getElementById("cmdAceptar").disabled=val;
                           document.getElementById("cmdCancelar").disabled=val;
                           document.getElementById("cmdImprimir").disabled=!val;
                           document.getElementById("cmdEliminar").disabled=!val;
                     }';

                      echo 'function ResaltarBotones()
                      {
                           document.getElementById("cmdAgregar").style.backgroundColor = "";
                           document.getElementById("cmdModificar").style.backgroundColor = "";
                           document.getElementById("cmdEliminar").style.backgroundColor = "";
                           document.getElementById("cmdAceptar").style.backgroundColor = "";
                           document.getElementById("cmdCancelar").style.backgroundColor = "";
                           document.getElementById("cmdImprimir").style.backgroundColor = "";
                           document.getElementById("sFormato").style.backgroundColor = "";
                           return false;
                     }';
                     echo 'function LimpiaTexto()
                     {
                           document.getElementById("sIdProveedor").value = "";
                           document.getElementById("sRazon").value = "";
                           document.getElementById("sDomicilio").value = "";
                           document.getElementById("sCiudad").value = "";
                           document.getElementById("sEstado").value = "";
                           document.getElementById("sRfc").value = "";
                           document.getElementById("sTelefono").value = "";
                           document.getElementById("sCuenta").value = "";
                           document.getElementById("sSucursal").value = "";
                           document.getElementById("sBanco").value = "";
                           document.getElementById("mComentarios").value = "";
                           document.getElementById("sRepresentante").value = "";
                     }';
                      echo 'function FechaActual(ObjetoFecha){
                           var fechaActual = new Date();
                           var diaActual   = fechaActual.getDate();
                           var mesActual   = fechaActual.getMonth()+1;
                           var anioActual  = fechaActual.getFullYear();
                           if (diaActual<10)
                              diaActual= "0"+diaActual;
                           if (mesActual<10)
                              mesActual= "0"+mesActual;
                           var LaFecha=diaActual+"/"+mesActual+"/"+anioActual;
                           document.getElementById(ObjetoFecha).value=LaFecha;
                           return false;
                     }';
                     echo 'function ComponerFecha(ObjetoFecha)
                     {     FechaFI        = document.getElementById(ObjetoFecha).value;
                           var SeparaFI   = FechaFI.split("/");
                           var diaFI      = SeparaFI[0];
                           var mesFI      = SeparaFI[1];
                           var anioFI     = SeparaFI[2];
                           var ErrorFecha = 0;

                           if (mesFI>12 || diaFI>31 || diaFI <= 0 || mesFI <= 0)
                               ErrorFecha=1;
                           if (ErrorFecha==1)
                           {  alert("La FECHA ESCRITA Esta Fuera de los LIMITES!!!");
                              return false;
                           }

                           if (ObjetoFecha == "f-calendar-field-2")
                           {   FechaAnt     = document.getElementById("f-calendar-field-1").value;
                               var SeparaFA = FechaAnt.split("/");
                               var diaFA    = SeparaFA[0];
                               var mesFA    = SeparaFA[1];
                               var anioFA   = SeparaFA[2];
                               ErrorRango   = 0;

                               if (diaFI < diaFA && mesFI == mesFA && anioFI == anioFA)
                                   ErrorRango = 1;
                               else
                                   if ( mesFI < mesFA && anioFI == anioFA)
                                        ErrorRango = 1;
                                   else
                                       if (anioFI < anioFA)
                                           ErrorRango = 1;

                               if (ErrorRango == 1)
                               {  alert("La Fecha de Inicio Debe ser Menor a la Fecha Final ! ");
                                  document.getElementById("HidError").value = 1;
                                  return false;
                               }
                           }
                           if (ErrorFecha==0)
                           {
                              //Invertir la fecha para ser guardada por año -mes- dia
                              var auxFI=SeparaFI[2];
                              SeparaFI[2]=SeparaFI[0];
                              SeparaFI[0]=auxFI;
                              var JuntaFI=SeparaFI[0]+"-"+SeparaFI[1]+"-"+SeparaFI[2];
                              document.getElementById(ObjetoFecha).value = JuntaFI;
                           }
                           return false;
                      }';

               }
               function dbgProveedoresJSClick($sender, $params)
               {

               ?>
                 dbgProveedores.getSelectionModel().iterateSelection
                    (    function(index)
                         {

                            _Dato=[];
                            _Dato.push(['','','','','','','','','','']);
                            var _OtroDato = _Dato;
                            dbgOrdenesCompra.getTableModel().originalData=_OtroDato;
                            dbgOrdenesCompra.getTableModel().setData(_Dato);

                            var Tabla = dbgProveedores.getTableModel();

                           document.getElementById("sIdProveedor").value= Tabla.getValue(0, index);
                           document.getElementById("hOldsIdProveedor").value= Tabla.getValue(0, index);
                           document.getElementById("sRazon").value= Tabla.getValue(1, index);
                           document.getElementById("sDomicilio").value= Tabla.getValue(2, index);
                           document.getElementById("sCiudad").value= Tabla.getValue(3, index);
                           document.getElementById("sEstado").value= Tabla.getValue(4, index);
                           document.getElementById("sRfc").value= Tabla.getValue(5, index);
                           document.getElementById("sTelefono").value= Tabla.getValue(6, index);
                           document.getElementById("sCuenta").value= Tabla.getValue(7, index);
                           document.getElementById("sSucursal").value= Tabla.getValue(8, index);
                           document.getElementById("sBanco").value= Tabla.getValue(9, index);
                           document.getElementById("mComentarios").value= Tabla.getValue(10, index);
                           document.getElementById("sRepresentante").value= Tabla.getValue(11, index);

                            var TotalFilas=dbgGeneral.getTableModel().getRowCount();
                            var NumEstimacion;
                            var Dato=[];
                            for (i=0;i<TotalFilas;i++)
                            {    iFolioRequisicion=dbgGeneral.getTableModel().getValue(0,i);
                                 if (dbgGeneral.getTableModel().getValue(6,i)==Tabla.getValue(0, index))
                                 {
                                     var iFolioRequisicion=dbgGeneral.getTableModel().getValue(0,i);
                                     var sNumeroOrden=dbgGeneral.getTableModel().getValue(1,i);
                                     var dIdFecha=dbgGeneral.getTableModel().getValue(2,i);
                                     var dFechaEntrega=dbgGeneral.getTableModel().getValue(3,i);
                                     var sReferencia=dbgGeneral.getTableModel().getValue(4,i);
                                     var sElaboro=dbgGeneral.getTableModel().getValue(5,i);

                                     Dato.push([iFolioRequisicion,sNumeroOrden,dIdFecha,dFechaEntrega,sReferencia,sElaboro]);
                                     var OtroDato = Dato;
                                     dbgOrdenesCompra.getTableModel().originalData=OtroDato;
                                     dbgOrdenesCompra.getTableModel().setData(Dato);
                                 }
                            }
                        }
                     );
                     return false;

               <?php

               }

               function sRepresentanteJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }



               function sRepresentanteJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRepresentanteJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function mComentariosJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function mComentariosJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function mComentariosJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sBancoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sBancoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sBancoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sSucursalJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sSucursalJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sSucursalJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sCuentaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sCuentaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sCuentaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTelefonoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTelefonoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTelefonoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRfcJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRfcJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }



               function sRfcJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sEstadoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sEstadoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sEstadoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sCiudadJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sCiudadJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sCiudadJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDomicilioJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDomicilioJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDomicilioJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRazonJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRazonJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRazonJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdProveedorJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdProveedorJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdProveedorJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }



        }

        global $application;

        global $frmProveedores;

        //Creates the form
        $frmProveedores=new frmProveedores($application);

        //Read from resource file
        $frmProveedores->loadResource(__FILE__);

        //Shows the form
        $frmProveedores->show();

?>
<script>
document.getElementById("cmdPrint").style.backgroundColor = "";
document.getElementById("CombUsuario").style.backgroundColor = "";
document.getElementById("f-calendar-field-1").style.backgroundColor = "";
document.getElementById("f-calendar-field-2").style.backgroundColor = "";
var fecha="f-calendar-field-1";
FechaActual(fecha);
var fecha="f-calendar-field-2";
FechaActual(fecha);
deshabilitar(true);
ResaltarBotones();
LimpiaTexto();
</script>

