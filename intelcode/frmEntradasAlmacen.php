<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require("mysql.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require_once("mysql.inc.php");
        $sUsuario=$_SESSION["ssUsuario"];
        //$sUsuario='ivan';
        $sIdConvenio =$sIdConvenioAct;//'C-01';
        //$sContrato='18575069-020-06';
        //$sUsuario='ivan';
        //Class definition
        class frmEntradasAlmacen extends Page
        {
               public $HidFechaInv = null;
               public $HidFechaF = null;
               public $HidFechaI = null;
               public $HidStrNum = null;
               public $HidMusFolio = null;
               public $HidFolioActual = null;
               public $ChkTodosUbic = null;
               public $ChkTodosAlm = null;
               public $HidAlmacen = null;
               public $HidPedido = null;
               public $HidFecha = null;
               public $HidInsumo = null;
               public $HidItem = null;
               public $HidOpcion = null;
               public $HidModif = null;
               public $HidTotal = null;
               public $HidMatriz = null;
               public $HidMostrarxFecha = null;
               public $HidProductos = null;
               public $ShpMascara = null;
               public $lblNoProductos = null;
               public $DtaProductos = null;
               public $QryProductos = null;
               public $DbgProductos = null;
               public $cmdAgregarProductos = null;
               public $DtaFechaFinal = null;
               public $DtaFechaInicio = null;
               public $DtaFechaEntrega = null;
               public $mComentarios = null;
               public $txtUbicacion = null;
               public $txtPrecio = null;
               public $txtCantidad = null;
               public $CboAlmacen = null;
               public $CboFamilia = null;
               public $CboProveedor = null;
               public $CboFolioPedido = null;
               public $ChkIncompleto = null;
               public $ChkNoEntregado = null;
               public $ChkEntregado = null;
               public $lblFechaFinal = null;
               public $lblFechaInicial = null;
               public $CmdMostrar = null;
               public $cmdImprimeProdcuto = null;
               public $CmdEliminaProducto = null;
               public $lblSuntitulo = null;
               public $lblTitulo = null;
               public $lblFamilia = null;
               public $lblUbicacion_Producto = null;
               public $lblComentarios = null;
               public $lblProveedor = null;
               public $lblAlmacen = null;
               public $lblPrecio = null;
               public $lblCantidad = null;
               public $lblFecha_Entrega = null;
               public $lblFolio_Pedido = null;
               public $CmdImprimir = null;
               public $CmdCancelar = null;
               public $CmdAceptar = null;
               public $CmdModificar = null;
               public $DbgEntradas = null;
               public $DtaEntrada = null;
               public $QryEntrada = null;
               public $base = null;


               function cmdImprimeProdcutoJSClick($sender, $params)
               {
               global $sContrato;
               ?>
               //Add your javascript code here
                    ruta = "../reporte.php";
                    ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                    ruta = ruta + "&sAlmacen="+document.getElementById("CboAlmacen").value;
                    ruta = ruta + "&sProveedor="+document.getElementById("CboProveedor").value;
                    ruta = ruta + "&sPedido="+document.getElementById("CboFolioPedido").value;
                    ruta = ruta + "&FechaI="+document.getElementById("HidFechaI").value;
                    ruta = ruta + "&FechaF="+document.getElementById("HidFechaF").value;

                    //Invertir fechas...
                    document.getElementById("HidFechaInv").value = document.getElementById("HidFechaI").value;
                    var fecha = "HidFechaInv";
                    ComponerFecha(fecha);
                    ruta = ruta + "&dFechaInicio="+document.getElementById("HidFechaInv").value;

                    document.getElementById("HidFechaInv").value = document.getElementById("HidFechaF").value;
                    var fecha = "HidFechaInv";
                    ComponerFecha(fecha);
                    ruta = ruta + "&dFechaFinal="+document.getElementById("HidFechaInv").value;

                    ruta = ruta + "&reportesPath=EntradasAlmacen";
                    ruta = ruta + "&nombreReporte=rptGeneralEntradas";
                    var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");

                  return false;
               <?php

               }

               function CmdImprimirJSClick($sender, $params)
               {
               global $sContrato;
               ?>
                      ruta = "../reporte.php";
                      ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                      ruta = ruta + "&iFolioPedido="+document.getElementById("CboFolioPedido").value;
                      ruta = ruta + "&sAlmacen="+document.getElementById("CboAlmacen").value;
                      ruta = ruta + "&sProveedor="+document.getElementById("CboProveedor").value;
                      ruta = ruta + "&reportesPath=EntradasAlmacen";
                      ruta = ruta + "&nombreReporte=rptEntradaInsumos";
                      var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
                      return false;
               <?php
               }

               function ChkTodosUbicJSChange($sender, $params)
               {
               ?>
                  //Add your javascript code here
                  if (document.getElementById("ChkTodosUbic").checked == true)
                     document.getElementById("txtUbicacion").disabled = true;
                  else
                     document.getElementById("txtUbicacion").disabled = false;
                  return false;
               <?php
               }

               function ChkTodosAlmJSChange($sender, $params)
               {
               ?>
                  //Add your javascript code here
                  if (document.getElementById("ChkTodosAlm").checked == true)
                     document.getElementById("CboAlmacen").disabled = true;
                  else
                     document.getElementById("CboAlmacen").disabled = false;
                  return false;
               <?php
               }

               function CmdAceptarClick($sender, $params)
               {
                    global $sContrato, $sUsuario;

                    $idAlmacen = $this->CboAlmacen->getItemIndex();
                    $idProveedor = $this->CboProveedor->getItemIndex();
                    $idFamilia = $this->CboFamilia->getItemIndex();
                    $Precio = $this->txtPrecio->Text;
                    $Comentario = $this->mComentarios->Text;
                    $Ubicacion = $this->txtUbicacion->Text;

                    $FolioPedido = $this->HidPedido->Value;
                    $Insumo = $this->HidInsumo->Value;
                    $Item = $this->HidItem->Value;
                    $Fecha = $this->HidFecha->Value;
                    $AlmacenOld = $this->HidAlmacen->Value;

                   $error=0;
                   if ($this->HidOpcion->Value=="Modificar")
                   {
                       //Actualizacion de los Precios..
                       $sql = " UPDATE insumos
                                SET dNuevoPrecio = '$Precio'
                                WHERE sContrato = '$sContrato'
                                      And sIdInsumo = '$Insumo'
                                      And sIdAlmacen = '$AlmacenOld' ";
                       mysql_query($sql);
                      //Actualizacion de los datos en la tabla bitacoradeentrada...
                       $sql = " UPDATE bitacoradeentrada
                                  SET dNuevoPrecio = '$Precio', sIdAlmacen = '$idAlmacen',
                                      sIdProveedor = '$idProveedor', mComentarios = '$Comentario',
                                      sUbicacion = '$Ubicacion', sIdFamilia = '$idFamilia',
                                      sIdUsuario = '$sUsuario'
                               where sContrato = '$sContrato'
                                     And iFolioPedido = '$FolioPedido'
                                     And sIdInsumo = '$Insumo'
                                     And iItem = '$Item'
                                     And dFechaEntrega = '$Fecha'
                                     And sIdAlmacen  = '$AlmacenOld'";
                       mysql_query($sql);
                       if (mysql_error())
                           $error=1;
                    }
                    if ($error==1)
                    {
                       ?>
                       <script>
                          alert(" <?php echo " Ocurrio un error al Actualizar los Datos !!!" ?>");
                       </script>
                       <?php
                    }
                  $this->HidMostrarxFecha->Value=0;
                  $this->HidPedido->Value="";
                  $this->HidInsumo->Value="";
                  $this->HidItem->Value="";
                  $this->HidFecha->Value="";
                  $this->HidOpcion->Value="";
               }

               function CmdAceptarJSClick($sender, $params)
               {
               ?>  //Add your javascript code here
                   if (document.getElementById("CboProveedor").value == "Todos")
                   {
                      alert ("  Seleccione un Proveedor para Este INSUMO !!!");
                      return false;
                   }else
                        {

                          fecha = "HidFecha";
                          ComponerFecha(fecha);
                          document.getElementById("HidModif").value = 0;
                          return true;
                      }
               <?php
               }

               function CmdEliminaProductoClick($sender, $params)
               {
                   global $sContrato;
                   $FolioPedido = $this->HidPedido->Value;
                   $Insumo = $this->HidInsumo->Value;
                   $Item = $this->HidItem->Value;
                   $Fecha = $this->HidFecha->Value;
                   $Almacen = $this->HidAlmacen->Value;
                   if ($Almacen!="999")
                   {
                      //Se busca la cantidad entregada del insumo eliminado...
                      $sql = "Select dEntregado as Entregado
                             From anexo_ppedido
                             Where sContrato = '$sContrato'
                                   And iFolioPedido = '$FolioPedido'
                                   and sIdInsumo = '$Insumo'
                                   and iItem = '$Item'";
                      $rs = mysql_query($sql);
                      $CantEntregada=0;
                      if($row = mysql_fetch_array($rs))
                          $CantEntregada = $row['Entregado'];

                      //Se busca la exitencia...
                      $sql = " Select dExistencias as Existencia
                                 From insumos
                                 WHERE sContrato = '$sContrato'
                                       And sIdInsumo = '$Insumo'
                                      And sIdAlmacen = '$Almacen' ";
                      $rs = mysql_query($sql);
                      $Existencia=0;
                      if($row = mysql_fetch_array($rs))
                          $Existencia = $row['Existencia'];

                       $CantidadExistente = 0;
                       //Resta de cantidades..
                       $CantidadExistente = $Existencia - $CantEntregada;

                          //Actualizacion de las exiatencias..
                           $sql = " UPDATE insumos
                                SET dExistencias = '$CantidadExistente'
                                WHERE sContrato = '$sContrato'
                                      And sIdInsumo = '$Insumo'
                                      And sIdAlmacen = '$Almacen' ";
                           mysql_query($sql);
                   }
                   //Actualizacion del estado de los insumos en el pedido
                   $sql = " UPDATE anexo_ppedido
                            SET lStatus = 'Pendiente', dEntregado = '0'
                            Where sContrato = '$sContrato'
                                  And iFolioPedido = '$FolioPedido'
                                  and sIdInsumo = '$Insumo'
                                  and iItem = '$Item'";
                   mysql_query($sql);

                   $error=0;
                   //Eliminacion del registro seleccionado en la tabla anexo_prequisicion
                   $sql = " Delete
                            from bitacoradeentrada
                            where sContrato = '$sContrato'
                            And iFolioPedido = '$FolioPedido'
                            And sIdInsumo = '$Insumo'
                            And iItem = '$Item'
                            And dFechaEntrega = '$Fecha'
                            And sIdAlmacen = '$Almacen'";
                   mysql_query($sql);
                   if (mysql_error())
                      $error=1;
                  if ($error==1)
                  {
                     ?>
                     <script>
                       alert(" <?php echo " Ocurrio un error al Eliminar los Datos !!!" ?>");
                     </script>
                     <?php
                  }
                  $this->HidMostrarxFecha->Value=0;
                  $this->HidPedido->Value="";
                  $this->HidInsumo->Value="";
                  $this->HidItem->Value="";
                  $this->HidFecha->Value="";
               }

               function CmdEliminaProductoJSClick($sender, $params)
               {
               ?>
                  //Add your javascript code here
                  ok=0;
                  resp=0;
                  DbgEntradas.getSelectionModel().iterateSelection
                  (    function(index)
                       {
                          //obtenemos los datos del grid Requisiciones
                            var Tabla = DbgEntradas.getTableModel();
                            var sFolioPedido = Tabla.getValue(2, index);
                            var sInsumo = Tabla.getValue(0, index);
                            var sItem = Tabla.getValue(1, index);
                            var sFecha = Tabla.getValue(3, index);
                            var sAlmacen = Tabla.getValue(16, index);
                            ok=1;
                            document.getElementById("HidOpcion").value="Eliminar";
                            if(!confirm("  Desea ELIMINAR DEL ALMACEN ACTUAL El INSUMO Seleccionado ?"))
                                resp=1;
                            else
                                {
                                   document.getElementById("HidPedido").value = sFolioPedido;
                                   document.getElementById("HidInsumo").value = sInsumo;
                                   document.getElementById("HidItem").value = sItem;
                                   document.getElementById("HidFecha").value = sFecha;
                                   document.getElementById("HidAlmacen").value = sAlmacen;
                                   var fecha = "HidFecha";
                                   ComponerFecha(fecha);
                                }
                        }
                  );
                  if (ok==0)
                  {  alert("  DEBE HACER CLICK SOBRE UN INSUMO !!!");
                     return false;
                  }

                  if (resp==1)
                     return false;
                  else
                     return true;
               <?php
               }

               function CmdCancelarJSClick($sender, $params)
               {
               ?>
                  //Add your javascript code here
                   controlHabilitarBotones(false);
                   controlHabilitar( false );
                   document.getElementById("HidModif").value = 0;
                   return false;
               <?php
               }

               function DbgEntradasJSClick($sender, $params)
               {
               ?>
                  //Add your javascript code here
                   if (document.getElementById("HidModif").value == 1)
                   {
                       DbgEntradas.getSelectionModel().iterateSelection
                       (    function(index)
                           {
                              //obtenemos los datos del grid Requisiciones
                              var Tabla = DbgEntradas.getTableModel();
                              var sInsumo = Tabla.getValue(0, index);
                              var sItem = Tabla.getValue(1, index);
                              var sFecha = Tabla.getValue(3, index);
                              var sFolioPedido = Tabla.getValue(2, index);
                              var sProveedor = Tabla.getValue(10, index);
                              var sAlmacen = Tabla.getValue(16, index);
                              var sCantidad = Tabla.getValue(4, index);
                              var sPrecio = Tabla.getValue(6, index);
                              var sFamilia = Tabla.getValue(15, index);
                              var sUbicacion = Tabla.getValue(14, index);
                              var sComentarios = Tabla.getValue(13, index);
                              var sExistencia = Tabla.getValue(8, index);

                              document.getElementById("CboFolioPedido").value = sFolioPedido;
                              document.getElementById("CboProveedor").value = sProveedor;
                              document.getElementById("CboAlmacen").value = sAlmacen;
                              document.getElementById("txtCantidad").value = sCantidad;
                              document.getElementById("txtPrecio").value = sPrecio;
                              document.getElementById("CboFamilia").value = sFamilia;
                              document.getElementById("txtUbicacion").value = sUbicacion;
                              document.getElementById("mComentarios").value = sComentarios;

                              document.getElementById("HidPedido").value = sFolioPedido;
                              document.getElementById("HidInsumo").value = sInsumo;
                              document.getElementById("HidItem").value = sItem;
                              document.getElementById("HidFecha").value = sFecha;
                              document.getElementById("HidAlmacen").value = sAlmacen;
                              document.getElementById("CboAlmacen").focus();
                              return false;
                          }
                      );

                   }
                   return false;
               <?php
               }


               function CmdModificarJSClick($sender, $params)
               {
               ?>
                  //Add your javascript code here
                    controlHabilitarBotones(true);
                    controlHabilitar( true );
                    document.getElementById("ChkEntregado").disabled="true";
                    document.getElementById("ChkNoEntregado").disabled="true";
                    document.getElementById("ChkIncompleto").disabled="true";
                    document.getElementById("cmdAgregarProductos").disabled="true";
                    document.getElementById("CmdImprimir").disabled="true";
                    document.getElementById("txtCantidad").disabled="true";
                    document.getElementById("HidOpcion").value = "Modificar";
                    document.getElementById("HidModif").value = 1;
                   return false;
               <?php
               }

               function CboFolioPedidoJSChange($sender, $params)
               {
               ?>
                 //Add your javascript code here
                 valor = document.getElementById("CboFolioPedido").value;
                 if (valor=="Todos")
                    return false;
                 else
                    return true;

               <?php
               }

               function CmdMostrarJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                   document.getElementById("txtCantidad").value="";
                   document.getElementById("txtPrecio").value="";
                   document.getElementById("CboFamilia").value="";
                   document.getElementById("txtUbicacion").value="";
                   document.getElementById("mComentarios").value="";
                   document.getElementById("ChkEntregado").checked=false;
                   document.getElementById("ChkNoEntregado").checked=false;
                   document.getElementById("ChkIncompleto").checked=false;

                   document.getElementById("HidFechaI").value = document.getElementById("f-calendar-field-2").value;
                   document.getElementById("HidFechaF").value = document.getElementById("f-calendar-field-3").value;

                   var fecha = "f-calendar-field-2";
                   ComponerFecha(fecha);
                   var fecha = "f-calendar-field-3";
                   ComponerFecha(fecha);
                   return true;
               <?php
               }

               function CmdImprimirClick($sender, $params)
               {
                   date("Y-m-d");
               }

               function cmdAgregarProductosClick($sender, $params)
               {
                  global $sContrato;
                  global $sUsuario;

                  $ItemAlmacen =$this->CboAlmacen->getItemIndex();
                  $Almacen = $this->CboAlmacen->Items[$ItemAlmacen];
                  $this->HidAlmacen->Value = $ItemAlmacen;
                  $i = $this->CboFolioPedido->getItemIndex();
                  $Folio = $this->CboFolioPedido->Items[$i];
                  $FechaEntrega = $this->DtaFechaEntrega->Text;
                  $Valor = $this->HidMatriz->Value;
                  $limite = $this->HidTotal->Value;
                  $trozos = explode(":/", $Valor);
                  /*for ($i=0 ; $i<$limite ; $i++)
                      echo $trozos[$i];
                  echo "    ";*/
                  //SE busca si los productos realmente exiten en el almacen
                  //para poder guardarlos y aumentar exitencias...
                  $SumInsumos=0;
                  if ($ItemAlmacen != "W999")
                  {
                     for ($i=0 ; $i<$limite ; $i++)
                     {   $peqtrozos = explode("->", $trozos[$i]);
                         $Suma=0;
                         $sql = "select sum(sIdInsumo) as SumaInsu
                                 from
                                     insumos
                                 where
                                     sContrato = '$sContrato'
                                    and sIdInsumo = '$peqtrozos[0]'
                                    and sIdAlmacen = '$peqtrozos[9]'
                                 group by sIdInsumo";
                         $rs = mysql_query($sql);
                         if($row = mysql_fetch_array($rs))
                           $Suma = $row['SumaInsu'];

                         if ($Suma==0)
                           $SumInsumos++;
                      }
                  }

                  if ($SumInsumos>0)
                  {
                      ?>
                     <script>
                       alert("  <?php echo "El $Almacen no Tiene Registrado $SumInsumos Insumo(s), y no entraran a dicho almacen.. " ?>");
                     </script>
                     <?php

                  }else
                      {
                        $RepiteInsumos=0;
                        $error=0;
                        for ($i=0 ; $i<$limite ; $i++)
                        {   //Insercion de datos en la bitacora de entrada..
                            $peqtrozos = explode("->", $trozos[$i]);
                            /*for ($x=0; $x<13; $x++)
                            {     echo $peqtrozos[$x];
                                  echo "  ";
                            } */
                            $sql=" INSERT INTO
                                     bitacoradeentrada
                                   ( sContrato, iFolioPedido, sIdInsumo,
                                     iItem, dFechaEntrega , dCantidad,
                                     dPrecio, dNuevoPrecio, dCantidadAnterior,
                                     sNumeroOrden, sIdProveedor, sIdAlmacen,
                                     sIdUsuario, sUbicacion, mComentarios,
                                     sIdFamilia )
                              VALUES
                                   ( '$sContrato', '$Folio', '$peqtrozos[0]',
                                     '$peqtrozos[1]', '$FechaEntrega', '$peqtrozos[2]',
                                     '$peqtrozos[3]', '$peqtrozos[4]', '$peqtrozos[5]',
                                     '$peqtrozos[7]', '$peqtrozos[8]', '$peqtrozos[9]',
                                     '$sUsuario', '$peqtrozos[10]', '$peqtrozos[11]',
                                     '$peqtrozos[12]')";

                            mysql_query($sql);
                            if (mysql_error())
                               $error=1;

                            if ($error==1)
                            {
                              //Se busca el maximo item del insumo repetido
                              $sql = "Select Max(iItem) as iItem
                                     From bitacoradeentrada
                                     Where sContrato = '$sContrato'
                                          And iFolioPedido = '$Folio'
                                          and sIdInsumo = '$peqtrozos[0]'
                                          and iItem = '$peqtrozos[1]'
                                          and dFechaEntrega = '$FechaEntrega'";
                              $rs = mysql_query($sql);
                              if($row = mysql_fetch_array($rs))
                              {
                                  $Maximo = $row['iItem'];
                              }
                              $sItem = $Maximo+1;
                              // Se inseta un nuevo registro si se encuentra un insumo igual,
                              // solo aqui va incrementando el item, el cual las identifica a cada una
                              $sql="INSERT INTO
                                     bitacoradeentrada
                                   ( sContrato, iFolioPedido, sIdInsumo,
                                     iItem, dFechaEntrega , dCantidad,
                                     dPrecio, dNuevoPrecio, dCantidadAnterior,
                                     sNumeroOrden, sIdProveedor, sIdAlmacen,
                                     sIdUsuario, sUbicacion, mComentarios,
                                     sIdFamilia )
                                   VALUES
                                   ( '$sContrato', '$Folio', '$peqtrozos[0]',
                                     '$sItem', '$FechaEntrega', '$peqtrozos[2]',
                                     '$peqtrozos[3]', '$peqtrozos[4]', '$peqtrozos[5]',
                                     '$peqtrozos[7]', '$peqtrozos[8]', '$peqtrozos[9]',
                                     '$sUsuario', '$peqtrozos[10]', '$peqtrozos[11]',
                                     '$peqtrozos[12]')";
                              mysql_query($sql);

                              $RepiteInsumos++;
                            }
                            if ($ItemAlmacen == "W999")
                            {
                                $sql = " INSERT INTO
                                            bitacoradesalida
                                         ( sContrato, dFechaSalida, sIdUsuario,
                                           sRecibe, sIdSolicitud, sNumeroOrden )
                                         VALUES
                                         ( '$sContrato', '$FechaEntrega', '$sUsuario',
                                           '$sUsuario', '$Folio', '$peqtrozos[7]')";
                                mysql_query($sql);
                            }else
                                {
                                   //Actualizacion de las exiatencias..
                                    $sql = " UPDATE insumos
                                           SET dNuevoPrecio = '$peqtrozos[4]', dExistencias = '$peqtrozos[6]',
                                               sUbicacion = '$peqtrozos[10]'
                                          WHERE sContrato = '$sContrato'
                                                And sIdInsumo = '$peqtrozos[0]'
                                                And sIdAlmacen = '$peqtrozos[9]' ";
                                    mysql_query($sql);
                                }

                            //Actualizacion del estado de los insumos en el pedido
                            $sql = " UPDATE anexo_ppedido
                                 SET lStatus = '$peqtrozos[13]', dEntregado = '$peqtrozos[5]'
                                 Where sContrato = '$sContrato'
                                        And iFolioPedido = '$Folio'
                                        and sIdInsumo = '$peqtrozos[0]'
                                        and iItem = '$peqtrozos[1]'";
                            mysql_query($sql);
                        }
                        if ($RepiteInsumos>0)
                        {
                           ?>
                           <script>
                              alert("  <?php echo " Se encontro una coincidencia en $RepiteInsumos Id's de los Insumos agregados al ALMACEN en la orden de compra seleccionada, por lo que el SISTEMA creo un Nuevos Registros !!!" ?>");
                           </script>
                           <?php
                        }
                   }
                   $this->HidMostrarxFecha->Value=0;
               }

               function cmdAgregarProductosJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                 if (document.getElementById("CboAlmacen").value == "")
                 {   alert ("No se Encontro un Almacen para Guardar los Insumos !!! ");
                     return false;
                 }
                 else
                 {
                   document.getElementById("CboAlmacen").disabled = false;
                   document.getElementById("txtUbicacion").disabled = false;
                   total = DbgProductos.getTableModel().getRowCount();
                   conteo = 0;
                   suma =0;
                   indice = 0;
                   TieneUbic =0;
                   matriz = new Array ();
                   for (x=0;x<total;x++)
                   {
                       ubicacion = DbgProductos.getTableModel().getValue(12,x);
                       proveedor = DbgProductos.getTableModel().getValue(10,x);
                       estado = DbgProductos.getTableModel().getValue(9,x);
                       if (estado=="Entregado" || estado == "Incompleto")
                       {
                          if (ubicacion=="")
                              conteo++;
                          if (proveedor=="Todos")
                              suma++;
                          insumo = DbgProductos.getTableModel().getValue(0,x);
                          item = DbgProductos.getTableModel().getValue(1,x);
                          cant_entregada = DbgProductos.getTableModel().getValue(5,x);
                          Costo = DbgProductos.getTableModel().getValue(16,x);
                          Nuevocosto = DbgProductos.getTableModel().getValue(6,x);
                          cant_anterior = DbgProductos.getTableModel().getValue(7,x);

                          //Covertir cadenas a numeros...
                          sCantidadE =0;
                          sCantidadAnt =0;
                          ConvierteCadNum(cant_entregada);
                          sCantidadE = document.getElementById("HidStrNum").value;
                          ConvierteCadNum(cant_anterior);
                          sCantidadAnt = document.getElementById("HidStrNum").value;
                          existencia =0;
                          existencia = parseFloat(sCantidadE) + parseFloat(sCantidadAnt);

                          num_orden = DbgProductos.getTableModel().getValue(8,x);
                          if (document.getElementById("ChkTodosAlm").checked==true)
                             almacen = document.getElementById("CboAlmacen").value;
                          else
                             almacen = DbgProductos.getTableModel().getValue(11,x);
                          comentario = DbgProductos.getTableModel().getValue(14,x);
                          familia = DbgProductos.getTableModel().getValue(15,x);

                          if (document.getElementById("ChkTodosUbic").checked==true)
                          {  UbicarTodos = document.getElementById("txtUbicacion").value;
                             if (UbicarTodos!="")
                             {   ubicacion = UbicarTodos;
                                 TieneUbic = 1;
                             }
                          }

                          matriz[indice] = new Array (insumo,item,sCantidadE,Costo,Nuevocosto,sCantidadAnt,
                                                 existencia,num_orden,proveedor,almacen,ubicacion,
                                                 comentario,familia,estado);
                          indice++;
                       }
                   }
                   if (indice==0)
                      alert (" DEBE MARCAR LOS INSUMOS QUE FUERON ENTREGADOS !!!");
                   else
                   {
                        document.getElementById("HidTotal").value=indice;
                        val="";
                        fila="";
                        for (x=0;x<indice;x++)
                        {   for (y=0;y<14;y++)
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
                        if (suma>0)
                        {
                           alert ("  NO DEBE HABER INSUMOS CON EL PROVEEDOR -TODOS- FAVOR DE CHECAR...");
                           return false;
                        }

                        var respuesta = 0;
                        if (conteo>0 && TieneUbic == 0)
                        {  if (!confirm(" Hay "+conteo+" Insumo(s) Sin una Ubiacion.. ¿ Desea Continuar ?"))
                              respuesta = 1;
                        }

                        if (respuesta == 1)
                           return false;
                        else
                        {   var fecha = "f-calendar-field-1";
                            ComponerFecha(fecha);
                            return true;
                        }
                   }
                 }

               <?php
               }

               function CboFamiliaJSChange($sender, $params)
               {
               ?>
                 //Add your javascript code here
                   var texto = document.getElementById("CboFamilia").value;
                   var Foco = DbgProductos.getFocusedRow();
                   DbgProductos.getTableModel().setValue(15,Foco,texto);
                   return false;
               <?php
               }

               function CboAlmacenJSChange($sender, $params)
               {
               ?>
                 //Add your javascript code here
                   document.getElementById("CboFolioPedido").value = 'Todos';
                   document.getElementById("CboProveedor").value = 'Todos';
                   var texto = document.getElementById("CboAlmacen").value;
                   var Foco = DbgProductos.getFocusedRow();
                   DbgProductos.getTableModel().setValue(11,Foco,texto);
                   return false;
               <?php
               }

               function CboProveedorJSChange($sender, $params)
               {
               ?>
                 //Add your javascript code here
                   var texto = document.getElementById("CboProveedor").value;
                   var Foco = DbgProductos.getFocusedRow();
                   DbgProductos.getTableModel().setValue(10,Foco,texto);
                   return false;
               <?php
               }

               function txtUbicacionJSKeyUp($sender, $params)
               {
               ?>
                 //Add your javascript code here
                   var texto = document.getElementById("txtUbicacion").value;
                   var Foco = DbgProductos.getFocusedRow();
                   DbgProductos.getTableModel().setValue(12,Foco,texto);
                   return false;
               <?php
               }

               function mComentariosJSKeyUp($sender, $params)
               {
               ?>
                 //Add your javascript code here
                   var texto = document.getElementById("mComentarios").value;
                   var Foco = DbgProductos.getFocusedRow();
                   DbgProductos.getTableModel().setValue(14,Foco,texto);
                   return false;
               <?php
               }

               function txtPrecioJSKeyUp($sender, $params)
               {
               ?>
                  //Add your javascript code here
                   if ( (event.keyCode>=48 && event.keyCode<=57) || event.keyCode==190
                         || event.keyCode==9 || event.keyCode==13)
                   {
                      var texto = document.getElementById("txtPrecio").value;
                      var Foco = DbgProductos.getFocusedRow();
                      DbgProductos.getTableModel().setValue(6,Foco,texto);
                   }else
                        document.getElementById("txtPrecio").value="";
                  return false;
               <?php
               }

               function txtCantidadJSKeyUp($sender, $params)
               {
               ?>
                 //Add your javascript code here
                   if (event.keyCode>=48 && event.keyCode<=57 || event.keyCode==190
                      || event.keyCode==9 || event.keyCode==13)
                   {
                      var texto = document.getElementById("txtCantidad").value;
                      var Foco = DbgProductos.getFocusedRow();
                      DbgProductos.getTableModel().setValue(5,Foco,texto);
                  }else
                      document.getElementById("txtCantidad").value="";
                  return false;
               <?php
               }

               function DbgProductosJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here
                   controlHabilitarBotones(false);
                   controlHabilitar( true );
                   if (document.getElementById("ChkTodosUbic").checked == true)
                       document.getElementById("txtUbicacion").disabled = true;
                   document.getElementById("HidModif").value=0;
                  DbgProductos.getSelectionModel().iterateSelection
                  (    function(index)
                       {
                           //obtenemos los datos del grid Requisiciones
                           var Tabla = DbgProductos.getTableModel();
                           var sFolioPedido = Tabla.getValue(17, index);
                           var sProveedor = Tabla.getValue(10, index);
                           var sAlmacen = Tabla.getValue(11, index);
                           var sCantidad = Tabla.getValue(5, index);
                           var sPrecio = Tabla.getValue(6, index);
                           var sUbicacion = Tabla.getValue(12, index);
                           var sFamilia = Tabla.getValue(15, index);
                           var sComentarios = Tabla.getValue(14, index);
                           var sEstado = Tabla.getValue(9, index);
                           var sExistencia = Tabla.getValue(7, index);

                           document.getElementById("CboFolioPedido").value = sFolioPedido;
                           document.getElementById("CboProveedor").value = sProveedor;
                           if (document.getElementById("ChkTodosAlm").checked == false)
                               document.getElementById("CboAlmacen").value = sAlmacen;
                           document.getElementById("txtCantidad").value = sCantidad;
                           document.getElementById("txtPrecio").value = sPrecio;
                           document.getElementById("CboFamilia").value = sFamilia;
                           if (document.getElementById("ChkTodosUbic").checked == false)
                               document.getElementById("txtUbicacion").value = sUbicacion;
                           document.getElementById("mComentarios").value = sComentarios;
                           if (sEstado == "Entregado")
                           {   document.getElementById("ChkEntregado").checked = true;
                               document.getElementById("ChkNoEntregado").checked = false;
                               document.getElementById("ChkIncompleto").checked = false;
                           }
                           if (sEstado == "Pendiente")
                           {   document.getElementById("ChkNoEntregado").checked = true;
                               document.getElementById("ChkEntregado").checked = false;
                               document.getElementById("ChkIncompleto").checked = false;
                           }
                           if (sEstado == "Incompleto")
                           {   document.getElementById("ChkIncompleto").checked = true;
                               document.getElementById("ChkEntregado").checked = false;
                               document.getElementById("ChkNoEntregado").checked = false;
                           }
                           document.getElementById("txtCantidad").focus();
                           return false;
                       }
                  );
               <?php
               }

               function ChkIncompletoJSChange($sender, $params)
               {
               ?>
                 //Add your javascript code here
                  if (document.getElementById("ChkIncompleto").checked == true)
                  {
                     document.getElementById("ChkEntregado").checked = false;
                     document.getElementById("ChkNoEntregado").checked = false;
                     var Foco = DbgProductos.getFocusedRow();
                     DbgProductos.getTableModel().setValue(9,Foco,"Incompleto");
                  }
                  return false;
               <?php
               }

               function ChkNoEntregadoJSChange($sender, $params)
               {
               ?>
                 //Add your javascript code here
                  if (document.getElementById("ChkNoEntregado").checked == true)
                  {
                     document.getElementById("ChkEntregado").checked = false;
                     document.getElementById("ChkIncompleto").checked = false;
                     var Foco = DbgProductos.getFocusedRow();
                     DbgProductos.getTableModel().setValue(9,Foco,"Pendiente");
                  }
                  return false;
               <?php
               }

               function ChkEntregadoJSChange($sender, $params)
               {
               ?>
                 //Add your javascript code here
                  if (document.getElementById("ChkEntregado").checked == true)
                  {
                     document.getElementById("ChkNoEntregado").checked = false;
                     document.getElementById("ChkIncompleto").checked = false;
                     var Foco = DbgProductos.getFocusedRow();
                     DbgProductos.getTableModel().setValue(9,Foco,"Entregado");
                  }
                  return false;
               <?php
               }

               function frmEntradasAlmacenAfterShow($sender, $params)
               {
                   ?>
                   <script>
                        var TotalProductos = DbgProductos.getTableModel().getRowCount();
                        if (TotalProductos >0)
                        {
                           document.getElementById("HidProductos").value = TotalProductos;
                           document.getElementById("ShpMascara_outer").style.display = "none";
                           document.getElementById("lblNoProductos_outer").style.display = "none";
                        } else
                             document.getElementById("HidProductos").value = TotalProductos;

                   </script>
                   <?php
               }


               function frmEntradasAlmacenJSLoad($sender, $params)
               {
               ?>
                 //Add your javascript code here
                   document.getElementById("CboFolioPedido").focus();
                   return false;
               <?php
               }

               function CboFolioPedidoChange($sender, $params)
               {
                    $this->HidFolioActual->Value = $this->PedidoSeleccionado();
               }

               function MuestraTodoPedido($FolioSeleccionado)
               {
                   global $sContrato;
                   $sql = "select
                              PPE.sIdInsumo as Folio,
                              PPE.iItem as Item,
                              PPE.mDescripcion as Descripcion,
                              PPE.sMedida  as Medida,
                              format(@dCantidad:= PPE.dCantidad,2) as Cantidad,
                              @dEntregado:= PPE.dEntregado as Entrego,
                              format(@dCantidad - @dEntregado ,2) as Cantidad_Entreg,
                              PPE.dCosto as Costo,
                              format(INSU.dExistencias,2) as Existencia,
                              PPE.sNumeroOrden as Numero_Orden,
                              PPE.lStatus as Estado,
                              PE.sIdProveedor as Proveedor,
                              INSU.sIdAlmacen as Almacen,
                              INSU.sUbicacion as Ubicacion,
                              INSU.sIdGrupo as Familia,
                              '' as Cometarios,
                              PPE.dCosto as NCosto,
                              PPE.iFolioPedido as FolioPedido
                           from
                              anexo_ppedido PPE
                           inner join
                              anexo_pedidos PE
                           on (PE.sContrato = '$sContrato'
                               and PE.iFolioPedido ='$FolioSeleccionado' )
                           inner join
                              insumos INSU
                           on (INSU.sContrato = '$sContrato'
                               and INSU.sIdInsumo = PPE.sIdInsumo )
                           where
                              PPE.sContrato='$sContrato'
                              and PPE.iFolioPedido = '$FolioSeleccionado'
                              and PPE.lStatus = 'Pendiente'
                              or  PPE.lStatus = 'Incompleto'";

                   $this->QryProductos->setActive(false);
                   $this->QryProductos->setSQL($sql);
                   $this->QryProductos->setActive(true);
               }

               function frmEntradasAlmacenBeforeShow($sender, $params)
               {
                   global $sContrato;
                   global $_SESSION,$Usuario,$Clave,$Servidor;
                   //Conectar a la base de datos
                   $this->base->setConnected(false);
                   $this->base->setDatabaseName($_SESSION['database']);
                   $this->base->setUserName($Usuario);
                   $this->base->setUserPassword($Clave);
                   $this->base->setHost($Servidor);
                   $this->base->setConnected(true);

                   $this->LLenarCombos();

                   $Folio = $this->HidFolioActual->Value;
                   $this->MuestraTodoPedido($Folio);

                   if ($this->HidMostrarxFecha->Value==0)
                   {
                      if ($this->HidAlmacen->Value =="")
                      {   //Buscar el primer almacen
                         $sql="Select sIdAlmacen
                               from
                                 almacenes
                               limit 1";
                         $rs = mysql_query($sql);
                         while($row = mysql_fetch_array($rs))
                         {
                           $IdAlmacen= $row['sIdAlmacen'];
                         }
                      }else
                           $IdAlmacen=$this->HidAlmacen->Value;

                      //Colocar las fechas actuales
                      $F_Inicial=date("Y-m-d");
                      $F_Final=date("Y-m-d");
                      $IndiceProveedor = '%%';
                      $IndicePedido = '%%';
                      $this->ProductosAlmacenProveedor($F_Inicial,$F_Final,$IdAlmacen,$IndiceProveedor,$IndicePedido);
                   }

               }

               function CmdMostrarClick($sender, $params)
               {
                   $this->HidMostrarxFecha->Value=1;
                   $F_Inicial= $this->DtaFechaInicio->Text;
                   $F_Final= $this->DtaFechaFinal->Text;
                   $IdAlmacen = $this->CboAlmacen->getItemIndex();
                   $IndiceProveedor = $this->CboProveedor->getItemIndex();
                   $CualProveedor = $this->CboProveedor->Items[$IndiceProveedor];
                   $IndicePedido = $this->CboFolioPedido->getItemIndex();
                   $CualPedido = $this->CboFolioPedido->Items[$IndicePedido];
                   if ($CualProveedor == "Todos")
                       $IndiceProveedor = '%%';
                   if ($CualPedido == "Todos")
                       $IndicePedido = '%%';
                   $this->ProductosAlmacenProveedor($F_Inicial,$F_Final,$IdAlmacen,$IndiceProveedor,$IndicePedido);
               }

               function ProductosAlmacenProveedor($FechaI,$FechaF,$sIdAlmacen,$sIdProveedor,$sIdPedido)
               {
                   global $sContrato;
                   $sql = "select
                              BE.sIdInsumo as Insumo,
                              BE.iItem as Item,
                              BE.iFolioPedido as Folio_Pedido,
                              date_format(BE.dFechaEntrega,'%d/%m/%Y')as Fecha_Entrega,
                              format(BE.dCantidad,2) as Cantidad,
                              BE.dPrecio as Precio,
                              BE.dNuevoPrecio as Nuevo_Precio,
                              format(BE.dCantidadAnterior,2) as Cant_Anterior,
                              format(INSU.dExistencias,2) as Existencia,
                              ALM.sDescripcion as Almacen,
                              PRO.sRazon as Proveedor,
                              BE.sNumeroOrden as Numero_Orden,
                              BE.sIdUsuario as Usuario,
                              BE.mComentarios as Comentarios,
                              BE.sUbicacion as Ubicacion,
                              BE.sIdFamilia as Familia,
                              BE.sIdAlmacen as IdAlmacen
                           from
                              bitacoradeentrada BE

                           inner join
                              insumos INSU
                           on (INSU.sIdInsumo = BE.sIdInsumo
                               and INSU.sContrato = BE.sContrato)

                           left join
                               proveedores PRO
                           on (PRO.sIdProveedor = BE.sIdProveedor)

                           inner join
                               almacenes ALM
                           on (ALM.sIdAlmacen = BE.sIdAlmacen)
                           where
                              BE.sContrato='$sContrato'
                              and BE.dFechaEntrega >= '$FechaI'
                              and BE.dFechaEntrega <= '$FechaF'
                              and BE.sIdAlmacen = '$sIdAlmacen'
                              and BE.sIdProveedor like '$sIdProveedor'
                              and BE.iFolioPedido like '$sIdPedido'";

                   $this->QryEntrada->setActive(false);
                   $this->QryEntrada->setSQL($sql);
                   $this->QryEntrada->setActive(true);
               }

               function LLenarCombos()
               {    global $sContrato;
                    global $sUsuario;
                    //Lllenar combo del Numero de Pedidos
                    $sql="Select iFolioPedido
                         from
                              anexo_pedidos
                         where
                              sContrato = '$sContrato' and sStatus='Autorizado'
                         order by iFolioPedido";
                    $rs = mysql_query($sql);
                    $Pedidos["%%"] = "Todos";
                    while($row = mysql_fetch_array($rs))
                    {
                       $Pedidos[$row['iFolioPedido']] = $row['iFolioPedido'];
                    }
                    $this->CboFolioPedido->setItems($Pedidos);

                    //Llenar combo de proveedores...
                    $sql="Select sRazon, sIdProveedor
                         from
                              proveedores ";
                    $rs = mysql_query($sql);
                    $Proveedor["%%"] = "Todos";
                    while($row = mysql_fetch_array($rs))
                    {
                       $Proveedor[$row['sIdProveedor']] = $row['sRazon'];
                    }
                    $this->CboProveedor->setItems($Proveedor);

                    //llenar combo de los almacenes...
                    $sql=" SELECT a.sIdAlmacen,a.sDescripcion
                              from
                           almacenes a
                           inner join almacenxusuarios au
                           on (a.sIdAlmacen=au.sIdAlmacen)
                           WHERE au.sIdUsuario='$sUsuario'
                                 and au.sContrato='$sContrato'";
                    $rs = mysql_query($sql);
                    while($row = mysql_fetch_array($rs))
                    {
                       $FolioReq[$row['sIdAlmacen']] = $row['sDescripcion'];
                    }
                    $this->CboAlmacen->setItems($FolioReq);

                     //llenar combo de la familia de productos...
                    $sql="Select sIdFamilia, mDescripcion
                         from
                              familias
                         order by sIdFamilia";
                    $rs = mysql_query($sql);
                    while($row = mysql_fetch_array($rs))
                    {
                       $IdFamily[$row['sIdFamilia']] = $row['mDescripcion'];
                    }
                    //Continua el llenado del combo familia...
                    $sql="Select sIdFase, sDescripcion
                         from
                             fasesxproyecto
                         order by sIdFase";
                    $rs = mysql_query($sql);
                    while($row = mysql_fetch_array($rs))
                    {
                       $IdFamily[$row['sIdFase']] = $row['sDescripcion'];
                    }
                    $this->CboFamilia->setItems($IdFamily);
               }

               function PedidoSeleccionado()
               {
                  global $sContrato;
                  if($this->CboFolioPedido->getItemIndex() <0)
                  {
                     $sql = "select iFolioPedido from anexo_ppedido where sContrato='$sContrato' limit 1";
                     $rs = mysql_query( $sql ) ;
                     if($rw = mysql_fetch_array( $rs ) )
                     {  return $rw["iFolioPedido"];
                     } else
                          {
                             return "";
                          }
                  } else
                       {
                         return $this->CboFolioPedido->getItemIndex();
                       }
               }


               function dumpJavascript(){
               echo 'function controlHabilitar( habilitar ){
                        if(habilitar){
                           accion = false;
                        }
                        else{
                             accion= true;
                        }
                         document.getElementById("txtCantidad").disabled=accion;
                         document.getElementById("txtPrecio").disabled=accion;
                         document.getElementById("CboFamilia").disabled=accion;
                         document.getElementById("txtUbicacion").disabled=accion;
                         document.getElementById("mComentarios").disabled=accion;
                         document.getElementById("ChkEntregado").disabled=accion;
                         document.getElementById("ChkNoEntregado").disabled=accion;
                         document.getElementById("ChkIncompleto").disabled=accion;
                         document.getElementById("ChkTodosAlm").disabled=accion;
                         document.getElementById("ChkTodosUbic").disabled=accion;
                         document.getElementById("cmdAgregarProductos").disabled=accion;
                         document.getElementById("CmdImprimir").disabled=accion;
                         return false;
                     }';
                     echo 'function controlHabilitarBotones( habilitar )
                     {
                        if(habilitar){
                           accion = false;
                        }
                        else{
                             accion= true;
                        }
                         document.getElementById("CmdMostrar").disabled=habilitar;
                         //document.getElementById("CmdAgregar").disabled=habilitar;
                         document.getElementById("CmdModificar").disabled=habilitar;
                         document.getElementById("CmdEliminaProducto").disabled=habilitar;
                         document.getElementById("CmdAceptar").disabled=accion;
                         document.getElementById("CmdCancelar").disabled=accion;
                         document.getElementById("cmdImprimeProdcuto").disabled=habilitar;
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



                      echo 'function ResaltarBotones()
                      {
                          document.getElementById("CboFolioPedido").style.backgroundColor = "";
                          document.getElementById("CboProveedor").style.backgroundColor = "";
                          document.getElementById("CboAlmacen").style.backgroundColor = "";
                          document.getElementById("txtCantidad").style.backgroundColor = "";
                          document.getElementById("txtPrecio").style.backgroundColor = "";
                          document.getElementById("CboFamilia").style.backgroundColor = "";
                          document.getElementById("txtUbicacion").style.backgroundColor = "";
                          document.getElementById("mComentarios").style.backgroundColor = "";
                          document.getElementById("ChkEntregado").style.backgroundColor = "";
                          document.getElementById("ChkNoEntregado").style.backgroundColor = "";
                          document.getElementById("ChkIncompleto").style.backgroundColor = "";
                          document.getElementById("ChkTodosAlm").style.backgroundColor = "";
                          document.getElementById("ChkTodosUbic").style.backgroundColor = "";
                          document.getElementById("cmdAgregarProductos").style.backgroundColor = "";
                          document.getElementById("CmdImprimir").style.backgroundColor = "";
                          document.getElementById("CmdMostrar").style.backgroundColor = "";
                          //document.getElementById("CmdAgregar").style.backgroundColor = "";
                          document.getElementById("CmdModificar").style.backgroundColor = "";
                          document.getElementById("CmdEliminaProducto").style.backgroundColor = "";
                          document.getElementById("CmdAceptar").style.backgroundColor = "";
                          document.getElementById("CmdCancelar").style.backgroundColor = "";
                          document.getElementById("cmdImprimeProdcuto").style.backgroundColor = "";
                      }';

                      echo 'function ModificaDatosProductos(Dato,Colum)
                      {

                           return false;
                      }';

                       echo 'function MuestraCatalogo(letras)
                       {
                           var total = letras.length;
                           var totalFilas = dbgActMostrar.getTableModel().getRowCount();
                           var _rowData = [];
                           _rowData.push(["","","","",""]);
                           var _oData = rowData;
                           dbgCatalogo.getTableModel().originalData=_oData;
                           dbgCatalogo.getTableModel().setData(_rowData);

                           var rowData = [];
                           for (i=0;i<totalFilas;i++)
                           {
                               palabra= dbgActMostrar.getTableModel().getValue(1,i);
                               var separa = palabra.split("");
                               var frase="";
                               var aux="";
                               var final="";
                               for (x=0;x<total;x++)
                               {   aux = final;
                                   frase = separa[x];
                                   final = aux + frase;
                               }
                               if (final==letras)
                               {
                                  var sInsumo = dbgActMostrar.getTableModel().getValue(0,i);
                                  var sDescripcion = dbgActMostrar.getTableModel().getValue(1,i);
                                  var sCantidad = dbgActMostrar.getTableModel().getValue(2,i);
                                  var sMedida = dbgActMostrar.getTableModel().getValue(3,i);
                                  var sCosto =  dbgActMostrar.getTableModel().getValue(4,i);
                                  var NvoCosto =  dbgActMostrar.getTableModel().getValue(5,i);
                                  rowData.push([sInsumo,sDescripcion,sCantidad,sMedida,sCosto,NvoCosto]);
                                  var oData = rowData;
                                  dbgCatalogo.getTableModel().originalData=oData;
                                  dbgCatalogo.getTableModel().setData(rowData);
                               }
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

               function txtUbicacionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtUbicacionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtUbicacionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboFamiliaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboFamiliaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboFamiliaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtPrecioJSKeyPress($sender, $params)
               {
               ?>
                 //Add your javascript code here

               <?php
               }

               function txtPrecioJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtPrecioJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtCantidadJSKeyPress($sender, $params)
               {
               ?>
                 //Add your javascript code here

               <?php
               }

               function txtCantidadJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtCantidadJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboAlmacenJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboAlmacenJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboAlmacenJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboProveedorJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboProveedorJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboProveedorJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboFolioPedidoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboFolioPedidoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboFolioPedidoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

        }

        global $application;

        global $frmEntradasAlmacen;

        //Creates the form
        $frmEntradasAlmacen=new frmEntradasAlmacen($application);

        //Read from resource file
        $frmEntradasAlmacen->loadResource(__FILE__);

        //Shows the form
        $frmEntradasAlmacen->show();

?>
<script>
   if (document.getElementById("HidProductos").value ==0)
       controlHabilitar(false);
   else
       controlHabilitar(true);

   controlHabilitarBotones(false);
   ResaltarBotones();
   var fecha="f-calendar-field-1";
   FechaActual(fecha);
   var fecha="f-calendar-field-2";
   FechaActual(fecha);
   var fecha="f-calendar-field-3";
   FechaActual(fecha);
   document.getElementById("ChkTodosAlm").checked = false;
   document.getElementById("ChkTodosUbic").checked = false;
   if (document.getElementById("HidFechaI").value == "")
   {  fecha = document.getElementById("f-calendar-field-3").value;
      document.getElementById("HidFechaI").value = fecha;
      document.getElementById("HidFechaF").value = fecha;
   }


</script>
