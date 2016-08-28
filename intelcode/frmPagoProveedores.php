<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require("mysql.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        //Class definition
        class frmPagoProveedores extends Page
        {
               public $Panel1 = null;
               public $HidMensaje = null;
               public $HidMuestra = null;
               public $CmdMostrar = null;
               public $ChkMuestra = null;
               public $HidItem = null;
               public $Label7 = null;
               public $HidMatriz = null;
               public $HidTotal = null;
               public $TxtCantidad = null;
               public $Label6 = null;
               public $HidFolio = null;
               public $HidContrato = null;
               public $DbgGeneral = null;
               public $QryGeneral = null;
               public $DtaGeneral = null;
               public $HidStrNum = null;
               public $QryLista = null;
               public $DtaLista = null;
               public $DbgPendiente = null;
               public $DbgLista = null;
               public $DbgPagos = null;
               public $DtaFecha = null;
               public $TxtMonto = null;
               public $CmdEliminarPago = null;
               public $CmdImprimirPago = null;
               public $CmdAceptar = null;
               public $CmdImprimePendiente = null;
               public $CmdRegresar = null;
               public $CmdAgregar = null;
               public $Label5 = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;
               public $QryPedidos = null;
               public $DtaPedidos = null;
               public $base = null;


               function CmdImprimirPagoJSClick($sender, $params)
               {
                  global $sContrato;
                  ?>
                     total = DbgLista.getTableModel().getRowCount();
                     if (total==0)
                         alert (" DEBE AGREGAR UN PAGO A LA LISTA !!!");
                     else
                         {  //Add your javascript code here
                            ruta = "../reporte.php";
                            ruta = ruta + "?sContrato=<?php echo $sContrato ?>";

                            ruta = ruta + "&nombreReporte=rptMontoPagos";
                            ruta = ruta + "&reportesPath=rptProveedores";
                            var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                         }
                      return false;
                  <?php
               }

               function CmdMostrarJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                 if (document.getElementById("ChkMuestra").checked ==true)
                    document.getElementById("HidMuestra").value="si";
                 else
                    document.getElementById("HidMuestra").value="no";
                 return true;
               <?php
               }

               function CmdMostrarClick($sender, $params)
               {
                   $this->Mostrar();
               }

               function frmPagoProveedoresBeforeShow($sender, $params)
               {
                  global $sContrato;

                  global $_SESSION,$Usuario,$Clave,$Servidor;


                  $this->base->setConnected(false);
                  $this->base->setDatabaseName($_SESSION['database']);
                  $this->base->setUserName($Usuario);
                  $this->base->setUserPassword($Clave);
                  $this->base->setHost($Servidor);
                  $this->base->setConnected(true);

                  $sql="update anexo_pedidos
                       set lElegido = 'no'
                       where sContrato = '$sContrato'";
                   mysql_query($sql);

                  $this->Mostrar();


                  $sql = "select
                              pag.sContrato,
                              pag.iFolioPedido,
                              pag.iItem,
                              pag.dCostoPago,
                              date_format(pag.dFechaPago,'%d/%m/%Y') as dFechaPago,
                              date_format(pag.dFechaProxima,'%d/%m/%Y') as dFechaProxima
                              from pago_proveedor pag
                              where pag.sContrato='$sContrato'";
                  $this->QryGeneral->setActive(false);
                  $this->QryGeneral->setSQL($sql);
                  $this->QryGeneral->setActive(true);

                  $this->QryLista->setActive(false);
                  $this->QryLista->setActive(true);

               }

               function Mostrar()
               {
                  global $sContrato;
                  if ($this->HidMuestra->Value=="no")
                  {  $sql= "select
                           p.sContrato ,
                           p.iFolioPedido,
                           pro.sRazon,
                           date_format(p.dIdFecha,'%d/%m/%Y') as dIdFecha,
                           p.sCredito,
                           p.dCosto,
                           p.sPeriodoPago,
                           p.dTotalPagos,
                           format(((p.dCosto - p.dAbono)/p.dTotalPagos),2) as TotalPago,
                           p.dAbono,
                           p.dIntereses
                        from anexo_pedidos p
                           inner join proveedores pro
                           on (p.sIdProveedor = pro.sIdProveedor)
                        where p.dCosto > p.dCostoAcumulado
                        and p.sContrato='$sContrato'
                        order by p.dIdFecha DESC";
                  }else
                       {
                         $sql= "select
                              p.sContrato ,
                              p.iFolioPedido,
                              pro.sRazon,
                              date_format(p.dIdFecha,'%d/%m/%Y') as dIdFecha,
                              p.sCredito,
                              p.dCosto,
                              p.sPeriodoPago,
                              p.dTotalPagos,
                              format(((p.dCosto - p.dAbono)/p.dTotalPagos),2) as TotalPago,
                              p.dAbono,
                              p.dIntereses
                           from anexo_pedidos p
                              inner join proveedores pro
                              on (p.sIdProveedor = pro.sIdProveedor)
                           and p.sContrato='$sContrato'
                           order by p.dIdFecha DESC";
                       }
                  $this->QryPedidos->setActive(false);
                  $this->QryPedidos->setSQL($sql);
                  $this->QryPedidos->setActive(true);

               }


               function CmdAceptarClick($sender, $params)
               {
                  global $sContrato;
                  $Fecha = $this->DtaFecha->Text;
                  $Valor = $this->HidMatriz->Value;
                  $limite = $this->HidTotal->Value;
                  $trozos = explode(":/", $Valor);
                  /*for ($i=0 ; $i<$limite ; $i++)
                      echo $trozos[$i];
                  echo "    ";*/

                  for ($i=0 ; $i<$limite ; $i++)
                  {   //Insercion de datos en pago a proveedores..
                      $error=0;
                      $sItem=0;
                      $peqtrozos = explode("->", $trozos[$i]);
                       /*for ($x=0; $x<13; $x++)
                       {     echo $peqtrozos[$x];
                             echo "  ";
                       } */
                      $sql ="select sIdProveedor
                            from proveedores
                            where sRazon = '$peqtrozos[2]'
                            and sContrato='$sContrato'";
                      $rs = mysql_query($sql);
                      if($row = mysql_fetch_array($rs))
                         $IdProveedor = $row['sIdProveedor'];

                      $sql ="select adddate('$Fecha','$peqtrozos[4]') as nuevo";
                      $rs = mysql_query($sql);
                      if($row = mysql_fetch_array($rs))
                         $ProximaFecha = $row['nuevo'];

                      $sql=" INSERT INTO
                               pago_proveedor
                               ( sContrato, iFolioPedido, sIdProveedor, iItem,
                                 dCostoPago, dFechaPago , dFechaProxima )
                             VALUES
                               ( '$peqtrozos[0]', '$peqtrozos[1]','$IdProveedor',
                                 '$sItem', '$peqtrozos[3]', '$Fecha',
                                 '$ProximaFecha'))";
                      mysql_query($sql);
                      if (mysql_error())
                          $error=1;

                      if ($error==1)
                      {
                          //Se busca el maximo item del insumo repetido
                          $sql = "Select Max(iItem) as iItem
                                  From pago_proveedor
                                  Where sContrato = '$peqtrozos[0]'
                                        And iFolioPedido = '$peqtrozos[1]'";
                          $rs = mysql_query($sql);
                          if($row = mysql_fetch_array($rs))
                          {
                              $Maximo = $row['iItem'];
                          }
                          $sItem = $Maximo+1;
                          $error=0;
                          $sql=" INSERT INTO
                                 pago_proveedor
                                    ( sContrato, iFolioPedido, sIdProveedor, iItem,
                                      dCostoPago, dFechaPago , dFechaProxima )
                                 VALUES
                                    ( '$peqtrozos[0]', '$peqtrozos[1]','$IdProveedor',
                                      '$sItem', '$peqtrozos[3]', '$Fecha',
                                      '$ProximaFecha')";
                          mysql_query($sql);
                          if (mysql_error())
                              $error=1;
                      }
                      $sql = "Select dCostoAcumulado as CostoAcum, dCosto as Costo
                                  From anexo_pedidos
                                  Where sContrato = '$peqtrozos[0]'
                                        And iFolioPedido = '$peqtrozos[1]'";
                      $rs = mysql_query($sql);
                      if($row = mysql_fetch_array($rs))
                      {
                          $Suma = $row['CostoAcum'];
                      }
                      $Suma = $Suma+$peqtrozos[3];

                      $sql = " UPDATE  anexo_pedidos
                               SET dCostoAcumulado = '$Suma'
                               WHERE sContrato = '$peqtrozos[0]'
                                     And iFolioPedido = '$peqtrozos[1]'";
                      mysql_query($sql);
                   }
                   if ($error==1)
                   {
                      ?>
                        <script>
                            alert("  <?php echo " Ocurrio un error al Insertar los Datos !!! " ?>");
                        </script>
                      <?php
                   }
                   $this->TxtMonto->Text="$ 0";
               }

               function CmdAceptarJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                   total = DbgLista.getTableModel().getRowCount();
                   matriz = new Array ();
                   i=0;
                   indice = 0;
                   for (x=0;x<total;x++)
                   {
                       sContrato = DbgLista.getTableModel().getValue(0,x);
                       sPedido = DbgLista.getTableModel().getValue(1,x);
                       sTotalPag = DbgLista.getTableModel().getValue(4,x);
                       sPeriodo = DbgLista.getTableModel().getValue(5,x);
                       sProveedor = DbgLista.getTableModel().getValue(9,x);
                       matriz[indice] = new Array (sContrato,sPedido,sProveedor,sTotalPag,sPeriodo);
                       indice++;
                   }
                   if (indice==0)
                   {   alert (" DEBE AGREGAR UN PAGO A LA LISTA !!!");
                       return false;
                   }
                   else
                   {
                        document.getElementById("HidTotal").value=indice;
                        val="";
                        fila="";
                        for (x=0;x<indice;x++)
                        {   for (y=0;y<5;y++)
                           {
                              uno = val;
                              datos = matriz[x][y];
                              val = uno + datos + "->";
                           }
                           uno = fila;
                           datos = val;
                           fila = uno + datos + ":/";
                           val="";
                        }
                        document.getElementById("HidMatriz").value = fila;
                        var fecha = "f-calendar-field-1";
                        ComponerFecha(fecha);
                        return true;
                   }
               <?php
               }



               function CmdEliminarPagoClick($sender, $params)
               {
                   $sContrato = $this->HidContrato->Value;
                   $Pedido = $this->HidFolio->Value;
                   $Item = $this->HidItem->Value;
                   $error=0;
                   //Eliminacion del registro seleccionado ...
                   $sql = " Delete
                            from pago_proveedor
                            where sContrato = '$sContrato'
                                  And iFolioPedido = '$Pedido'
                                  And iItem = '$Item'";
                   mysql_query($sql);
                   if (mysql_error())
                      $error=1;

                   $sql = "Select sum(dCostoPago) as Costo
                           From pago_proveedor
                           Where sContrato = '$sContrato'
                                 And iFolioPedido = '$Pedido'";
                   $rs = mysql_query($sql);
                   if($row = mysql_fetch_array($rs))
                   {
                      $Suma = $row['Costo'];
                   }

                   $sql = " UPDATE  anexo_pedidos
                            SET dCostoAcumulado = '$Suma'
                            WHERE sContrato = '$sContrato'
                                  And iFolioPedido = '$Pedido'";
                   mysql_query($sql);

                   if ($error==1)
                   {
                     ?>
                     <script>
                       alert(" <?php echo "Ocurrio un error al Eliminar los Datos !!! ".mysql_error() ?>");
                     </script>
                     <?php
                   }
                   $this->TxtMonto->Text="";
               }

               function CmdEliminarPagoJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                 ok =0;
                 resp =0;
                 DbgPagos.getSelectionModel().iterateSelection
                 (    function(index)
                      {   //obtenemos los datos del grid Requisiciones
                          var Tabla = DbgPagos.getTableModel();
                          var sContrato = Tabla.getValue(0, index);
                          var sPedido = Tabla.getValue(1, index);
                          var sItem = Tabla.getValue(2, index);
                          ok=1;
                          if(!confirm("  Desea ELIMINAR EL PAGO Seleccionado ?"))
                          { resp=1;
                          }
                          document.getElementById("HidContrato").value = sContrato;
                          document.getElementById("HidFolio").value = sPedido;
                          document.getElementById("HidItem").value = sItem;
                      }
                 );
                  if (ok==0)
                  {  alert("  DEBE HACER CLICK SOBRE UN ELEMENTO  !!!");
                     return false;
                  }
                  if (resp==1)
                     return false;
                  else
                     return true;
               <?php
               }

               function CmdImprimePendienteJSClick($sender, $params)
               {
               global $sContrato;
               ?>
               //Add your javascript code here
                  ruta = "../reporte.php";
                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                  ruta = ruta + "&nombreReporte=rptPagos";
                  ruta = ruta + "&reportesPath=rptProveedores";
                  var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                  return false;
               <?php
               }

               function DbgPendienteJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                  DbgPendiente.getSelectionModel().iterateSelection
                  (    function(index)
                       {   //obtenemos los datos del grid Requisiciones
                           var Tabla = DbgPendiente.getTableModel();
                           var sContrato = Tabla.getValue(0, index);
                           var sPedido = Tabla.getValue(1, index);
                           var sProveedor = Tabla.getValue(2, index);
                           var sCostoPedido = Tabla.getValue(5, index);
                           var rowData = [];
                           sum=0;
                           var totalFilas = DbgGeneral.getTableModel().getRowCount();
                           for (i=0;i<totalFilas;i++)
                           {   var Contrato = DbgGeneral.getTableModel().getValue(0,i);
                               var Pedido = DbgGeneral.getTableModel().getValue(1,i);
                               var Item =  DbgGeneral.getTableModel().getValue(2,i);
                               if (sContrato == Contrato && sPedido == Pedido)
                               {  var sCosto = DbgGeneral.getTableModel().getValue(3,i);
                                  sum = parseFloat(sCosto) + parseFloat(sum);
                                  var sFechaP = DbgGeneral.getTableModel().getValue(4,i);
                                  var sProxFcha =  DbgGeneral.getTableModel().getValue(5,i);
                                  rowData.push([sContrato,sPedido,Item,sProveedor,sCosto,sFechaP,sProxFcha]);
                               }
                           }
                           var oData = rowData;
                           DbgPagos.getTableModel().originalData=oData;
                           DbgPagos.getTableModel().setData(rowData);

                           var Filas = DbgPagos.getTableModel().getRowCount();
                           if (sum>=sCostoPedido && Filas > 0)
                           {   document.getElementById("Label7").innerHTML = "PAGADO";
                               var totalFilas = DbgPagos.getTableModel().getRowCount();
                               mayor=0;
                               indice=0;
                               for (x=0;x<totalFilas;x++)
                               {
                                   item = DbgPagos.getTableModel().getValue(2,x);
                                   if (item>mayor)
                                   {   mayor=item;
                                       indice=x;
                                   }
                               }
                               DbgPagos.getTableModel().setValue(6,indice,"");
                           }
                           else
                              document.getElementById("Label7").innerHTML = "";
                           document.getElementById("TxtCantidad").value=sum;
                           Cadena="TxtCantidad";
                           ColocaSigo(Cadena);
                       }
                  );
                  return false;
               <?php
               }

               function CmdRegresarJSClick($sender, $params)
               {
               ?>
                  //Add your javascript code here
                   j= DbgLista.getTableModel().getRowCount();
                   if (j==1)
                       document.getElementById("CmdRegresar").disabled=true;
                   else
                       document.getElementById("CmdRegresar").disabled=false;
                   document.getElementById("CmdAgregar").disabled=false;
                   i = DbgLista.getFocusedRow();
                   var sContrato = DbgLista.getTableModel().getValue(0,i);
                   var sPedido = DbgLista.getTableModel().getValue(1,i);
                   QuitarElemento(sContrato,sPedido);
                   params = sPedido;
                   <?php
                     echo $this->CmdRegresar->ajaxCall("ElegidoDel",array(),array("Label4"));
                   ?>
                 return false;
               <?php
               }

               function ElegidoDel($sender="",$params="")
               {
                   global $sContrato;
                   $Folio =$params;
                   $sql="update anexo_pedidos
                       set lElegido = 'no'
                       where sContrato = '$sContrato'
                             and iFolioPedido = $Folio";
                   mysql_query($sql);
               }

               function CmdAgregarJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                   j= DbgPendiente.getTableModel().getRowCount();
                   if (j==1)
                       document.getElementById("CmdAgregar").disabled=true;
                   else
                       document.getElementById("CmdAgregar").disabled=false;
                   document.getElementById("CmdRegresar").disabled=false;
                   if (document.getElementById("Label7").innerHTML == "PAGADO")
                      alert (" NO PUEDE AGREGAR A LA LISTA ESTE PEDIDO.. YA ESTA PAGADO !!!!");
                   else
                      {
                        i = DbgPendiente.getFocusedRow();
                        var sContrato = DbgPendiente.getTableModel().getValue(0,i);
                        var sPedido = DbgPendiente.getTableModel().getValue(1,i);
                        AgregaLista(sContrato,sPedido);
                        params = sPedido;
                        <?php
                           echo $this->CmdAgregar->ajaxCall("ElegidoAg",array(),array("Label4"));
                        ?>
                      }
                 return false;

               <?php
               }

               function ElegidoAg($sender="",$params="")
               {
                   global $sContrato;
                   $Folio =$params;
                   $sql="update anexo_pedidos
                       set lElegido = 'si'
                       where sContrato = '$sContrato'
                             and iFolioPedido = $Folio";
                   mysql_query($sql);
               }

               function dumpJavascript()
               {   echo 'function AgregaLista(Contrato,Pedido)
                   {
                         var rowData = DbgLista.getTableModel().getData();
                         var Datos = [];
                         var totalFilas = DbgPendiente.getTableModel().getRowCount();
                         for (i=0;i<totalFilas;i++)
                         {   var sContrato = DbgPendiente.getTableModel().getValue(0,i);
                             var sPedido = DbgPendiente.getTableModel().getValue(1,i);
                             var sProveedor = DbgPendiente.getTableModel().getValue(2,i);
                             var sFechaP = DbgPendiente.getTableModel().getValue(3,i);
                             var sCredito =  DbgPendiente.getTableModel().getValue(4,i);
                             var sCosto = DbgPendiente.getTableModel().getValue(5,i);
                             var sPeriodo = DbgPendiente.getTableModel().getValue(6,i);
                             var sNumPag = DbgPendiente.getTableModel().getValue(7,i);
                             var sTotalPag = DbgPendiente.getTableModel().getValue(8,i);
                             var sAbono =  DbgPendiente.getTableModel().getValue(9,i);
                             var sInteres =  DbgPendiente.getTableModel().getValue(10,i);


                             if (sContrato == Contrato && sPedido == Pedido)
                             {
                                ConvierteCadNum(sTotalPag);
                                sTotalPag = document.getElementById("HidStrNum").value;
                                if (sTotalPag == "" || sTotalPag==0)
                                   sTotalPag = sCosto;

                                rowData.push([sContrato,sPedido,sFechaP,sCredito,sTotalPag,
                                              sPeriodo,sNumPag,sAbono,sInteres,sProveedor,sCosto]);
                                var oData = rowData;
                                DbgLista.getTableModel().originalData=oData;
                                DbgLista.getTableModel().setData(rowData);
                             } else
                                  {
                                     Datos.push([sContrato,sPedido,sProveedor,sFechaP,sCredito,
                                              sCosto,sPeriodo,sNumPag,sTotalPag,sAbono,sInteres]);
                                  }
                         }
                         var Otro = Datos;
                         DbgPendiente.getTableModel().originalData=Otro;
                         DbgPendiente.getTableModel().setData(Datos);

                         //Hacer la suma de las cantidades....
                         var totalFilas = DbgLista.getTableModel().getRowCount();
                         suma = 0;
                         for (i=0;i<totalFilas;i++)
                         {
                             TPago = DbgLista.getTableModel().getValue(4,i);
                             suma = parseFloat(TPago) + parseFloat(suma);
                         }
                         document.getElementById("TxtMonto").value = suma;
                         Cadena="TxtMonto";
                         ColocaSigo(Cadena);
                         return false;
                   }';

                   echo 'function QuitarElemento(Contrato,Pedido)
                   {
                         var rowData = DbgPendiente.getTableModel().getData();
                         var Datos = [];
                         var totalFilas = DbgLista.getTableModel().getRowCount();
                         for (i=0;i<totalFilas;i++)
                         {   var sContrato = DbgLista.getTableModel().getValue(0,i);
                             var sPedido = DbgLista.getTableModel().getValue(1,i);
                             var sFechaP = DbgLista.getTableModel().getValue(2,i);
                             var sCredito =  DbgLista.getTableModel().getValue(3,i);
                             var sTotalPag = DbgLista.getTableModel().getValue(4,i);
                             var sPeriodo = DbgLista.getTableModel().getValue(5,i);
                             var sNumPag = DbgLista.getTableModel().getValue(6,i);
                             var sAbono =  DbgLista.getTableModel().getValue(7,i);
                             var sInteres =  DbgLista.getTableModel().getValue(8,i);
                             var sProveedor = DbgLista.getTableModel().getValue(9,i);
                             var sCosto = DbgLista.getTableModel().getValue(10,i);

                             if (sContrato == Contrato && sPedido == Pedido)
                             {
                                if (sTotalPag == sCosto)
                                    sTotalPag ="";
                                rowData.push([sContrato,sPedido,sProveedor,sFechaP,sCredito,
                                              sCosto,sPeriodo,sNumPag,sTotalPag,sAbono,sInteres]);
                                var oData = rowData;
                                DbgPendiente.getTableModel().originalData=oData;
                                DbgPendiente.getTableModel().setData(rowData);
                             } else
                                  {
                                     Datos.push([sContrato,sPedido,sFechaP,sCredito,sTotalPag,
                                              sPeriodo,sNumPag,sAbono,sInteres,sProveedor,sCosto]);
                                  }
                         }
                         var Otro = Datos;
                         DbgLista.getTableModel().originalData=Otro;
                         DbgLista.getTableModel().setData(Datos);

                         //Hacer la suma de las cantidades....
                         var totalFilas = DbgLista.getTableModel().getRowCount();
                         suma = 0;
                         for (i=0;i<totalFilas;i++)
                         {
                             TPago = DbgLista.getTableModel().getValue(4,i);
                             suma = parseFloat(TPago) + parseFloat(suma);
                         }
                         document.getElementById("TxtMonto").value = suma;
                         Cadena="TxtMonto";
                         ColocaSigo(Cadena);
                         return false;
                   }';

                   echo 'function FechaActual(ObjetoFecha){
                           var fechaActual = new Date();
                           var diaActual  = fechaActual.getDate();
                           var mesActual  = fechaActual.getMonth()+1;
                           var anioActual = fechaActual.getFullYear();
                           if (diaActual<10)
                              diaActual= "0"+diaActual;
                           if (mesActual<10)
                              mesActual= "0"+mesActual;
                           var LaFecha=diaActual+"/"+mesActual+"/"+anioActual;
                           document.getElementById(ObjetoFecha).value=LaFecha;
                           return false;
                     }';

                     echo 'function ComponerFecha(ObjetoFecha)
                     {     FechaFI=document.getElementById(ObjetoFecha).value;
                           var SeparaFI= FechaFI.split("/");
                           var diaFI=SeparaFI[0];
                           var mesFI=SeparaFI[1];
                           var ErrorFecha=0;
                           if (mesFI>12 || diaFI>31)
                               ErrorFecha=1;
                           if (ErrorFecha==1)
                           {  alert("La FECHA ESCRITA Esta Fuera de los LIMITES!!!");
                              return false;
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

                      echo 'function ConvierteCadNum(Numero)
                      {
                              Sum_CantA ="";
                              uno = Numero.split(",");
                              Tam = uno.length;
                              if (Tam==0)
                                  Sum_CantA=Numero;
                              for (a=0;a<Tam;a++)
                              {   aux=Sum_CantA;
                                  cadena = uno[a];
                                 Sum_CantA=aux+cadena;
                              }
                              document.getElementById("HidStrNum").value = Sum_CantA;
                              return false;
                      }';

                       echo 'function ColocaSigo(ObjetoCadena)
                       {      cad = document.getElementById(ObjetoCadena).value;
                              Tam = cad.length;
                              indice = cad.indexOf(".");
                              punto="";
                              if (indice == -1)
                                 i=Tam;
                              else
                                 i=indice;
                              while (i>=0)
                              {    if (i>=3)
                                   {  j=i-3;
                                      if (i==3)
                                          punto = cad.substring(i,j)+ punto;
                                      else
                                          punto = "," + cad.substring(i,j)+ punto;
                                   }else
                                       {  j=0;
                                          punto = cad.substring(i,j)+ punto;
                                       }

                                   i=i-3;
                              }
                              if (indice!=-1)
                                  punto = "$ "+ punto + cad.substring(indice,Tam);
                              else
                                  punto = "$ "+ punto;
                              document.getElementById(ObjetoCadena).value = punto;
                              return false;
                       }';

                      echo 'function ResaltarBotones()
                      {
                           document.getElementById("TxtCantidad").style.backgroundColor = "";
                           document.getElementById("TxtMonto").style.backgroundColor = "";
                           document.getElementById("CmdEliminarPago").style.backgroundColor = "";
                           document.getElementById("CmdImprimirPago").style.backgroundColor = "";
                           document.getElementById("CmdAceptar").style.backgroundColor = "";
                           document.getElementById("CmdImprimePendiente").style.backgroundColor = "";
                           document.getElementById("CmdRegresar").style.backgroundColor = "";
                           document.getElementById("CmdAgregar").style.backgroundColor = "";
                           document.getElementById("CmdMostrar").style.backgroundColor = "";
                           document.getElementById("ChkMuestra").style.backgroundColor = "";
                           return false;
                     }';
               }
        }

        global $application;

        global $frmPagoProveedores;

        //Creates the form
        $frmPagoProveedores=new frmPagoProveedores($application);

        //Read from resource file
        $frmPagoProveedores->loadResource(__FILE__);

        //Shows the form
        $frmPagoProveedores->show();

?>
<script>
    fecha = "f-calendar-field-1";
    FechaActual(fecha);
    if (document.getElementById("HidMuestra").value=="si")
        document.getElementById("ChkMuestra").checked=true;
    else
        document.getElementById("ChkMuestra").checked=false;
    ResaltarBotones();
</script>
