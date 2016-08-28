<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require_once("mysql.inc.php");
        require("fnUtilerias.php");
        use_unit("imglist.inc.php");
        use_unit("menus.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        //Class definition
        class frmActividadesAnexo2 extends Page
        {
               public $fecha = null;
               public $GridComentario = null;
               public $cmdComentario = null;
               public $qryComentario = null;
               public $DataComentario = null;
               public $memoComenta = null;
               public $cmdClose = null;
               public $cmdMenos = null;
               public $cmdMas = null;
               public $Label28 = null;
               public $Panel_Comenta = null;
               public $DataHistorial = null;
               public $qryHistorial = null;
               public $GridHistorial = null;
               public $cmdHistorial = null;
               public $cmdCierra = null;
               public $Label27 = null;
               public $Panel_Historial = null;
               public $HiCopia = null;
               public $HiOpcion = null;
               public $HiMatriz = null;
               public $HiTotal = null;
               public $cmdQuitar = null;
               public $Label26 = null;
               public $cmdOtro = null;
               public $Label23 = null;
               public $txtBuscar = null;
               public $cmdCancel = null;
               public $cmdOk = null;
               public $Label25 = null;
               public $Label24 = null;
               public $Panel_Buscar = null;
               public $cmdAlcance = null;
               public $txtPorcentaje = null;
               public $DataAlcances = null;
               public $qryAlcanes = null;
               public $GridAlcances = null;
               public $cmdCerrar = null;
               public $Panel_Alcances = null;
               public $ImageList1 = null;
               public $GrupoMenu = null;
               public $cmdOpciones = null;
               public $Panel1 = null;
               public $hOperacion = null;
               public $hsWbsAnterior = null;
               public $hsNumeroActividad = null;
               public $hsWbs = null;
               public $dTotalDLL = null;
               public $dTotalMN = null;
               public $dCantidadAnexo = null;
               public $lExtraordinario = null;
               public $sMedida = null;
               public $iColor = null;
               public $dFechaFinal_2 = null;
               public $dPonderado = null;
               public $dDuracion = null;
               public $lCalculo = null;
               public $dFechaInicio_1 = null;
               public $mDescripcion = null;
               public $sIdFase = null;
               public $dVentaDLL = null;
               public $dVentaMN = null;
               public $dCostoDLL = null;
               public $dCostoMN = null;
               public $sEspecificacion = null;
               public $sWbsAnterior = null;
               public $sNumeroActividad = null;
               public $sPaquete = null;
               public $Label22 = null;
               public $Label21 = null;
               public $Label20 = null;
               public $Label19 = null;
               public $Label18 = null;
               public $Label17 = null;
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
               public $cmdImprimir = null;
               public $cmdEliminar = null;
               public $cmdCancelar = null;
               public $cmdAceptar = null;
               public $cmdModificar = null;
               public $cmdNuevo = null;
               public $Label16 = null;
               public $db = null;
               public $dsActividadesxAnexo = null;
               public $qryActividadesxAnexo = null;
               public $ddactividadesxanexo1 = null;
            public $Panel2 = null;

               function memoComentaJSChange($sender, $params)
               {
               ?>                 //Add your javascript code here
                  foco = GridComentario.getFocusedRow();
                  comentario = document.getElementById("memoComenta").value;
                  GridComentario.getTableModel().setValue(3,foco,comentario);
                  return false;
               <?php
               }

               function GridComentarioJSClick($sender, $params)
               {
               ?>               //Add your javascript code here
                  document.getElementById("memoComenta").disabled = true;
                  foco = GridComentario.getFocusedRow();
                  comentario = GridComentario.getTableModel().getValue(3,foco);
                  document.getElementById("memoComenta").value = comentario;
                  return false;
               <?php

               }

               //--------------- Comentarios Adicionales ------------------------
               function cmdComentarioJSClick($sender, $params)
               {
               ?>                //Add your javascript code here
                    i= ddactividadesxanexo1.getFocusedRow();
                    Tabla = ddactividadesxanexo1.getTableModel();
                    Partida = Tabla.getValue(2,i);
                    params = Partida;
                    <?php
                         echo $this->cmdComentario->ajaxCall("Comentario",array(),array("GridComentario","memoComenta"));
                    ?>
                    return false;
               <?php
               }

               function Comentario($sender="",$params="")
               {
                   global $sContrato;
                   $Actividad =$params;
                   $Tiene = "";
                   $sql = "select dIdFecha, sDescripcionCorta, mComentarios, sIdUsuario
                           from
                                 comentariosxanexo
                           where sContrato = '$sContrato'
                                 and sNumeroActividad = '$Actividad'";

                   $this->qryComentario->setActive(false);
                   $this->qryComentario->setSQL($sql);
                   $this->qryComentario->setActive(true);
                   $rs = mysql_query($sql);
                   if($row = mysql_fetch_array($rs)){
                      $Tiene = $row['sDescripcionCorta'];
                   }
                   if ($Tiene == "")
                   {
                       $sql = " select  '' as dIdFecha,'' as sDescripcionCorta,'' as mComentarios,
                                   '' as sIdUsuario
                           from actividadesxanexo   limit 1";
                       $this->qryComentario->setActive(false);
                       $this->qryComentario->setSQL($sql);
                       $this->qryComentario->setActive(true);
                   }
               }

               function cmdMenosJSClick($sender, $params)
               {
               ?>               //Add your javascript code here
                    i= GridComentario.getTableModel().getRowCount();
                    foco = GridComentario.getFocusedRow();
                    if (foco>i-1 || i==0)
                        return false;
                    var rowData = [];
                    for (x=0;x<i;x++)
                    {   if (foco == x)
                        {
                        }
                        else
                        {  descripcion = GridComentario.getTableModel().getValue(1,x);
                           Comentarios = GridComentario.getTableModel().getValue(3,x);
                           Usuario = GridComentario.getTableModel().getValue(2,x);
                           rowData.push([fecha,descripcion,Usuario,Comentarios]);
                        }
                    }
                    var oData = rowData;
                    GridComentario.getTableModel().originalData=oData;
                    GridComentario.getTableModel().setData(rowData);
                    document.getElementById("memoComenta").disabled = true;
                    return false;
               <?php
               }

               function cmdMasJSClick($sender, $params)
               {
                 global $_SESSION;
               ?>               //Add your javascript code here
                   Usuario = "<?php echo $_SESSION['ssUsuario']?>";
                   i= ddactividadesxanexo1.getFocusedRow();
                   Tabla = ddactividadesxanexo1.getTableModel();
                   Tipo_Actividad = Tabla.getValue(3,i);
                   if (Tipo_Actividad == "Paquete")
                       return false;
                   i= GridComentario.getTableModel().getRowCount();
                   datos = GridComentario.getTableModel().getValue(0,0);
                   var rowData = [];
                   if (datos != "")
                   {  for (x=0;x<i;x++)
                      {  fecha =  GridComentario.getTableModel().getValue(0,x);
                         descripcion = GridComentario.getTableModel().getValue(1,x);
                         Cometario = GridComentario.getTableModel().getValue(3,x);
                         Usuario = GridComentario.getTableModel().getValue(2,x);
                         rowData.push([fecha,descripcion,Usuario,Cometario]);
                      }
                   }
                   document.getElementById("memoComenta").disabled = false;
                   fecha = document.getElementById("f-calendar-field-1").value;
                   f = fecha.split("/");
                   fecha = f[2]+"-"+f[1]+"-"+f[0];
                   rowData.push([fecha,'',Usuario,'']);
                   var oData = rowData;
                   GridComentario.getTableModel().originalData=oData;
                   GridComentario.getTableModel().setData(rowData);
                   GridComentario.getSelectionModel().addSelectionInterval(i,i);
                   return false;
               <?php
               }

               function cmdCloseJSClick($sender, $params)
               {
               ?>                //Add your javascript code here
                  indice = 0;
                  matriz = new Array ();
                  i = GridComentario.getTableModel().getRowCount();
                  if (i==0)
                  {  document.getElementById("Panel_Comenta_outer").style.visibility = 'hidden';
                     return false;
                  }
                  esigual = 0;
                  for (x=0; x<i;x++)
                  {   fecha_1 = GridComentario.getTableModel().getValue(0,x);
                      for (y=x+1;y<i;y++)
                      {   fecha_2 = GridComentario.getTableModel().getValue(0,y);
                          if (fecha_1 == fecha_2)
                              esigual++;
                      }
                  }
                  if (esigual>0)
                  {  alert (" Solo Debe Escribir un Comentario por Fecha !!!! ");
                     return false;
                  }
                  for (x=0;x<i;x++)
                  {    fecha =  GridComentario.getTableModel().getValue(0,x);
                       descripcion = GridComentario.getTableModel().getValue(1,x);
                       Comentario = GridComentario.getTableModel().getValue(3,x);
                       Usuario = GridComentario.getTableModel().getValue(2,x);
                       //guardar avances en una matriz....
                       matriz[indice] = new Array (fecha,descripcion,Usuario,Comentario);
                       indice++;
                  }
                  if (GridComentario.getTableModel().getValue(1,0)=="")
                  {   document.getElementById("Panel_Comenta_outer").style.visibility = 'hidden';
                      return false;
                  }
                  else
                  {  //obtencion de la partida....
                     i= ddactividadesxanexo1.getFocusedRow();
                     Tabla = ddactividadesxanexo1.getTableModel();
                     Partida = Tabla.getValue(2,i);
                     params = Partida;

                     //asignar separador a matriz...
                     document.getElementById("HiTotal").value=indice;
                     val="";
                     fila="";
                     for (z=0;z<indice;z++)
                     {   for (y=0;y<4;y++)
                         {
                             uno = val;
                             datos = matriz[z][y];
                             val = uno + datos + "->";
                         }
                         uno = fila;
                         datos = val;
                         fila = uno + datos + ":/";
                         val="";
                     }
                     document.getElementById("HiMatriz").value = fila;
                     var rowData = [];
                     rowData.push(['','','','']);
                     var oData = rowData;
                     GridComentario.getTableModel().originalData=oData;
                     GridComentario.getTableModel().setData(rowData);
                     document.getElementById("Panel_Comenta_outer").style.visibility = 'hidden';
                     <?php
                         echo $this->cmdCerrar->ajaxCall("Guardar_Cometarios",array(),array());
                     ?>
                  }
                  return false;
               <?php
               }

               function Guardar_Cometarios($sender="",$params="")
               {
                   global $sContrato;
                   $Actividad =$params;
                   $Valor = $this->HiMatriz->Value;
                   $limite = $this->HiTotal->Value;
                   $trozos = explode(":/", $Valor);

                   $sql=" delete from comentariosxanexo
                          where sContrato = '$sContrato'
                                and sNumeroActividad = '$Actividad'";
                   mysql_query($sql);

                   for ($i=0 ; $i<$limite ; $i++)
                   {   //Insercion de datos en la bitacora de entrada..
                        $peqtrozos = explode("->", $trozos[$i]);
                       /*for ($x=0; $x<13; $x++)
                         {     echo $peqtrozos[$x];
                               echo "  ";
                         } */
                         $sql=" INSERT INTO
                                    comentariosxanexo
                                    ( sContrato, sNumeroActividad,
                                      dIdFecha, sDescripcionCorta, sIdUsuario, mComentarios )
                                  VALUES
                                      ( '$sContrato', '$Actividad', '$peqtrozos[0]',
                                        '$peqtrozos[1]', '$peqtrozos[2]', '$peqtrozos[3]' )";

                         mysql_query($sql);
                   }
                   $this->refresca();
               }

               // -----------------Buscar Partida----------------------------
               function cmdOkJSClick($sender, $params)
               {
               ?>                //Add your javascript code here
                   i= ddactividadesxanexo1.getTableModel().getRowCount();
                   bus_partida = document.getElementById("txtBuscar").value;
                   encontro = 0;
                   for (x=0;x<i;x++)
                   {   partida = ddactividadesxanexo1.getTableModel().getValue(2,x);
                       if (bus_partida == partida && encontro ==0)
                       {
                         ddactividadesxanexo1.getSelectionModel().removeSelectionInterval(0,x);
                         ddactividadesxanexo1.getSelectionModel().addSelectionInterval(x,x);
                         encontro = 1;
                       }
                   }
                   if (encontro == 1)
                      document.getElementById("Panel_Buscar_outer").style.visibility = 'hidden';
                   return false;
               <?php
               }

               function cmdCancelJSClick($sender, $params)
               {
               ?>                //Add your javascript code here
                   document.getElementById("Panel_Buscar_outer").style.visibility = 'hidden';
                   return false;
               <?php
               }

               //-------------------------Alcanes  de la Partida--------------------------------
               function GridAlcancesJSClick($sender, $params)
               {
               ?>               //Add your javascript code here
                  i= ddactividadesxanexo1.getFocusedRow();
                  Tabla = ddactividadesxanexo1.getTableModel();
                  Tipo_Actividad = Tabla.getValue(3,i);
                  if (Tipo_Actividad == "Paquete")
                  {   GridAlcances.getTableModel().setValue(2,0," ");
                      return false;
                  }
                  suma=0;
                  i = GridAlcances.getTableModel().getRowCount();
                  for (x=0;x<i;x++)
                  {  descripcion  = GridAlcances.getTableModel().getValue(1,x);
                     avance = GridAlcances.getTableModel().getValue(2,x);
                     if (avance != "")
                         suma = suma + parseFloat(avance);
                     if (descripcion == "")
                        GridAlcances.getTableModel().setValue(1,x,"S/DESCRIPCION");
                  }
                  if (suma <= 100)
                      document.getElementById("txtPorcentaje").value = suma + " %";
                  return false;
               <?php
               }

               function cmdCerrarJSClick($sender, $params)
               {
               ?>                //Add your javascript code here
                  suma=0;
                  indice = 0;
                  matriz = new Array ();
                  i = GridAlcances.getTableModel().getRowCount();
                  for (x=0;x<i;x++)
                  {  fase = GridAlcances.getTableModel().getValue(0,x);
                     descripcion = GridAlcances.getTableModel().getValue(1,x);
                     avance = GridAlcances.getTableModel().getValue(2,x);
                     if (avance != "")
                     {    suma = suma + parseFloat(avance);

                         //guardar avances en una matriz....
                          matriz[indice] = new Array (fase,descripcion,avance);
                          indice++;
                     }
                  }
                  if (suma==0)
                  {   document.getElementById("Panel_Alcances_outer").style.visibility = 'hidden';
                      return false;
                  }
                  if (suma <= 100)
                  {  //obtencion de la partida....
                     i= ddactividadesxanexo1.getFocusedRow();
                     Tabla = ddactividadesxanexo1.getTableModel();
                     Partida = Tabla.getValue(2,i);
                     params = Partida;

                     //asignar separador a matriz...
                     document.getElementById("HiTotal").value=indice;
                     val="";
                     fila="";
                     for (z=0;z<indice;z++)
                     {   for (y=0;y<3;y++)
                         {
                             uno = val;
                             datos = matriz[z][y];
                             val = uno + datos + "->";
                         }
                         uno = fila;
                         datos = val;
                         fila = uno + datos + ":/";
                         val="";
                     }
                     document.getElementById("HiMatriz").value = fila;
                     var rowData = [];
                     rowData.push(['','','']);
                     var oData = rowData;
                     GridAlcances.getTableModel().originalData=oData;
                     GridAlcances.getTableModel().setData(rowData);
                     document.getElementById("Panel_Alcances_outer").style.visibility = 'hidden';
                     <?php
                         echo $this->cmdCerrar->ajaxCall("Guardar_Alcance",array(),array());
                     ?>
                  }
                  else
                       alert (" Favor de Checar (%) de los Avances !!! ");

                    return false;
               <?php
               }

               function Guardar_Alcance($sender="",$params="")
               {
                   global $sContrato;
                   $Actividad =$params;
                   $Valor = $this->HiMatriz->Value;
                   $limite = $this->HiTotal->Value;
                   $trozos = explode(":/", $Valor);

                   $sql=" delete from alcancesxactividad
                          where sContrato = '$sContrato'
                                and sNumeroActividad = '$Actividad'";
                   mysql_query($sql);

                   for ($i=0 ; $i<$limite ; $i++)
                   {   //Insercion de datos en la bitacora de entrada..
                        $peqtrozos = explode("->", $trozos[$i]);
                       /*for ($x=0; $x<13; $x++)
                         {     echo $peqtrozos[$x];
                               echo "  ";
                         } */
                         $sql=" INSERT INTO
                                    alcancesxactividad
                                    ( sContrato, sNumeroActividad,
                                      iFase, sDescripcion, dAvance )
                                  VALUES
                                      ( '$sContrato', '$Actividad', '$peqtrozos[0]',
                                        '$peqtrozos[1]', '$peqtrozos[2]')";

                         mysql_query($sql);
                   }
                   $this->refresca();
               }

               function refresca()
               {
                   ?>
                   <script>
                       ResaltarBotones();
                   </script>
                   <?php
               }

               //--------   menu opcion ---------------------------
               function MenuOpcionJSClick($sender, $params)
               {
               global $sContrato,$sIdConvenioAct;
               ?>
                 //Add your javascript code here

                 ruta = "../reporte.php";
                 ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                 ruta = ruta + "&sConvenio=<?php echo $sIdConvenioAct ?>";
                 envia = 0;

                 i= ddactividadesxanexo1.getFocusedRow();
                 Tabla = ddactividadesxanexo1.getTableModel();
                 Partida = Tabla.getValue(2,i);

                 tag=event.getTarget().tag;
                 if (tag==1)
                 {   ruta = ruta + "&reportesPath=CatalogoConceptos";
                     ruta = ruta + "&nombreReporte=rptCatalogoConceptos";
                     envia = 1;
                 }
                 else
                    if (tag==2)
                    {  ruta = ruta + "&reportesPath=AlcancesxPartida";
                       ruta = ruta + "&nombreReporte=rptDetalles_AlcancesxPartida";
                       envia = 1;
                    }
                    else
                        if (tag==3)
                        {
                           document.getElementById("Panel_Buscar_outer").style.visibility = 'visible';
                        }
                        else
                        if (tag==4)
                        {   ruta = ruta + "&sNumeroActividad="+Partida;
                            ruta = ruta + "&reportesPath=Ficha_Tecnica";
                            ruta = ruta + "&nombreReporte=rptFicha_Tecnica";
                            envia = 1;
                        }
                        else
                       if (tag==5)
                       {
                           document.getElementById("Panel_Alcances_outer").style.visibility = 'visible';
                           document.getElementById("cmdAlcance").click();
                       }
                       else
                          if (tag==6)
                          {   document.getElementById("Panel_Historial_outer").style.visibility = 'visible';
                              document.getElementById("cmdHistorial").click();
                          }
                          else
                          if (tag==7)
                          {   document.getElementById("Panel_Comenta_outer").style.visibility = 'visible';
                              document.getElementById("memoComenta").value = "";
                              document.getElementById("memoComenta").disabled = true;
                              document.getElementById("cmdComentario").click();
                          }
                          else
                          if (tag==8)
                          {   params = Partida;

                              <?php
                                 echo $this->MenuOpcion->ajaxCall("Eliminar_Alcance",array(),array());
                              ?>
                          }
                          else
                          if (tag==9)
                          {
                              document.getElementById("HiCopia").value = Partida;
                          }
                          else
                          if (tag==10)
                          {   Partida_Origen = document.getElementById("HiCopia").value;
                              params = Partida+"]"+Partida_Origen;
                              <?php
                                 echo $this->MenuOpcion->ajaxCall("Pegar_Alcance",array(),array());
                              ?>
                          }
                          else
                          if (tag==11)
                          {
                             if(!confirm("Desea PONDERAR los conceptos del Contrato Seleccionado?"))
                             {
                                return false;
                             }else
                                 {
                                    params = Partida;
                                    <?php
                                      echo $this->MenuOpcion->ajaxCall("Ponderado",array(),array("ddactividadesxanexo1"));
                                    ?>
                                 }
                          }
                          else
                          if (tag==12)
                          {   ruta = ruta + "&reportesPath=CatalogoConceptos";
                              ruta = ruta + "&nombreReporte=rptMedidasConcepto";
                              envia = 1;
                          }

                 document.getElementById("GrupoMenu").style.visibility = 'hidden';
                 if (envia==1)
                    var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");

                 return false;
               <?php
               }

               //------------ Alcanes ---------------------------------------
               function Pegar_Alcance($sender="",$params="")
               {
                   global $sContrato;
                   $DatosRecib  = explode("]",$params);
                   $Actividad   = $DatosRecib[0];
                   $Actividad_Origen = $DatosRecib[1];

                   $sql=" INSERT INTO  alcancesxactividad
                               (sContrato, sNumeroActividad, iFase, sDescripcion, dAvance)
                          SELECT a.sContrato, '$Actividad',
                                 a.iFase, a.sDescripcion, a.dAvance
                          FROM alcancesxactividad a
                          WHERE a.sContrato = '$sContrato' and a.sNumeroActividad = '$Actividad_Origen'";
                   mysql_query($sql);
                   $this->refresca();
               }

               function Eliminar_Alcance($sender="",$params="")
               {
                   global $sContrato;
                   $Actividad =$params;

                   $sql=" delete from alcancesxactividad
                          where sContrato = '$sContrato'
                                and sNumeroActividad = '$Actividad'";
                   mysql_query($sql);
                   $this->refresca();
               }

               function GridAlcancesJSDataChanged($sender, $params)
               {
               ?>                 //Add your javascript code here
                    i= GridAlcances.getTableModel().getRowCount();
                    if (i==1)
                    {     GridAlcances.getTableModel().setValue(0,0,"1");

                    }
                    return false;
               <?php
               }

               function cmdOtroJSClick($sender, $params)
               {
               ?>
                                  //Add your javascript code here
                  i= ddactividadesxanexo1.getFocusedRow();
                  Tabla = ddactividadesxanexo1.getTableModel();
                  Tipo_Actividad = Tabla.getValue(3,i);
                  if (Tipo_Actividad == "Paquete")
                  {   GridAlcances.getTableModel().setValue(2,0," ");
                      return false;
                  }
                  i= GridAlcances.getTableModel().getRowCount();
                  mayor = GridAlcances.getTableModel().getValue(0,0);
                  var rowData = [];
                  for (x=0;x<i;x++)
                  {   mayor_fase = GridAlcances.getTableModel().getValue(0,x);
                      if (mayor <= mayor_fase)
                          mayor = mayor_fase;
                  }
                  suma=0;
                  for (x=0;x<i;x++)
                  {  fase =  GridAlcances.getTableModel().getValue(0,x);
                     descripcion = GridAlcances.getTableModel().getValue(1,x);
                     avance = GridAlcances.getTableModel().getValue(2,x);
                     rowData.push([fase,descripcion,avance]);
                     if (avance != "")
                         suma = suma + parseFloat(avance);
                      if (descripcion == "")
                        GridAlcances.getTableModel().setValue(1,x,"S/DESCRIPCION");
                  }
                  if (suma <= 100)
                      document.getElementById("txtPorcentaje").value = suma + " %";
                  rowData.push(['','','']);
                  var oData = rowData;
                  GridAlcances.getTableModel().originalData=oData;
                  GridAlcances.getTableModel().setData(rowData);
                  GridAlcances.getTableModel().setValue(0,x,parseInt(mayor)+1);
                  GridAlcances.getSelectionModel().addSelectionInterval(i-1,i-1);
                  return false
               <?php
               }

               function cmdQuitarJSClick($sender, $params)
               {
               ?>                       //Add your javascript code here
                   i= GridAlcances.getTableModel().getRowCount();
                   foco = GridAlcances.getFocusedRow();
                   fase_selecionada = GridAlcances.getTableModel().getValue(0,foco);
                   var rowData = [];
                   suma=0;
                   for (x=0;x<i;x++)
                   {   fase = GridAlcances.getTableModel().getValue(0,x);
                       if (fase_selecionada == fase)
                       {
                       }
                       else
                       {
                          descripcion = GridAlcances.getTableModel().getValue(1,x);
                          avance = GridAlcances.getTableModel().getValue(2,x);
                          rowData.push([fase,descripcion,avance]);
                          if (avance!= "")
                              suma = suma + parseFloat(avance);
                       }
                   }
                   if (suma <= 100)
                       document.getElementById("txtPorcentaje").value = suma + " %";
                   var oData = rowData;
                   GridAlcances.getTableModel().originalData=oData;
                   GridAlcances.getTableModel().setData(rowData);
                   return false;
               <?php
               }

               function cmdAlcanceJSClick($sender, $params)
               {
               ?>                 //Add your javascript code here
                    i= ddactividadesxanexo1.getFocusedRow();
                    Tabla = ddactividadesxanexo1.getTableModel();
                    Partida = Tabla.getValue(2,i);
                    params = Partida;
                    <?php
                         echo $this->cmdAlcance->ajaxCall("Alcance",array(),array("GridAlcances","txtPorcentaje", "cmdCerrar","cmdOtro"));
                    ?>
                    return false;
               <?php
               }

               function Alcance($sender="",$params="")
               {
                   global $sContrato;
                   $Actividad =$params;
                   $Alcance = 0;
                   $sql = "select  iFase, sDescripcion, dAvance,
                                   (select sum(dAvance) as suma from alcancesxactividad
                                    where sContrato = '$sContrato'
                                          and sNumeroActividad = '$Actividad'
                                    group by sContrato) as porcentaje
                           from
                                alcancesxactividad
                           where sContrato = '$sContrato'
                                 and sNumeroActividad = '$Actividad'";
                   $this->qryAlcanes->setActive(false);
                   $this->qryAlcanes->setSQL($sql);
                   $this->qryAlcanes->setActive(true);

                   $rs = mysql_query($sql);
                   if($row = mysql_fetch_array($rs)){
                      $Alcance = $row['porcentaje'];
                   }
                   $this->txtPorcentaje->Text = "$Alcance %";

                   if ($Alcance == 0)
                   {
                      $sql = " select '' as iFase, '' as sDescripcion, '' as dAvance
                               from estimaciones
                               limit 1";
                      $this->qryAlcanes->setActive(false);
                      $this->qryAlcanes->setSQL($sql);
                      $this->qryAlcanes->setActive(true);
                      $this->txtPorcentaje->Text = "0.0 %";
                      $this->HiOpcion->Value = "Insertar";
                   }
                   if ($Alcance > 0)
                       $this->HiOpcion->Value = "Editar";

               }
               //------------ Historial de la Partida --------------------
               function cmdHistorialJSClick($sender, $params)
               {
                ?>               //Add your javascript code here
                    i= ddactividadesxanexo1.getFocusedRow();
                    Tabla = ddactividadesxanexo1.getTableModel();
                    Partida = Tabla.getValue(2,i);
                    params = Partida;
                    <?php
                         echo $this->cmdHistorial->ajaxCall("Historial",array(),array("GridHistorial","cmdCierra"));
                    ?>
                    return false;
                <?php
               }

                function Historial($sender="",$params="")
               {
                   global $sContrato;
                   $Actividad =$params;
                   $sql = "select c.sDescripcion,
                           a.sIdConvenio, date_format(a.dFechaInicio,'%d/%m/%Y') as dFechaInicio,
                           date_format(a.dFechaFinal,'%d/%m/%Y') as dFechaFinal,
                           format(a.dCantidadAnexo,2) as dCantidadAnexo,
                           concat('$ ',a.dVentaMN) as dVentaMN, a.dPonderado
                           from
                                actividadesxanexo a
                           inner join convenios c
                           on (c.sContrato       = a.sContrato
                               and c.sIdConvenio = a.sIdConvenio)
                           where a.sContrato = '$sContrato'
                                 and a.sNumeroActividad = '$Actividad'";
                   $this->qryHistorial->setActive(false);
                   $this->qryHistorial->setSQL($sql);
                   $this->qryHistorial->setActive(true);
               }

               function cmdCierraJSClick($sender, $params)
               {
               ?>                 //Add your javascript code here
                   document.getElementById("Panel_Historial_outer").style.visibility = 'hidden';
                   return false;
               <?php
               }

               //------------ Calculo de los Ponderados ---------------------------------------
               function Ponderado($sender="",$params="")
               {
                   global $sContrato, $sIdConvenioAct;

                   // Que ponderados se calcularan ?
                   // Sumo todos las partidas anexo que tengan en lCalculo <> Si

                   $sql = "update actividadesxanexo
                           SET dPonderado = 0
                           Where sContrato = '$sContrato'
                                 And sIdConvenio = '$sIdConvenioAct'
                                 and lCalculo = 'Si'";
                   mysql_query($sql);

                   $sql = "Select SUM(dPonderado) as TotalPonderado
                           from actividadesxanexo
                           Where sContrato = '$sContrato'
                                 And sIdConvenio = '$sIdConvenioAct'
                                 And lCalculo = 'No'
                                 And sTipoActividad = 'Actividad'
                           Group By sContrato";
                   $rs = mysql_query($sql);

                   $PonderadoAjuste = 100;
                   $numreg = mysql_num_rows($rs);
                   if ($numreg > 0 )
                   {   $row = mysql_fetch_array($rs);
                       $PonderadoAjuste = $row['TotalPonderado'];
                   }
                   //Actualizacion de Ponderados
                   $dMontoContrato = 0;
                   $sql = " Select sum(dCantidadAnexo * dVentaMN) as dMontoMN
                            From actividadesxanexo
                            Where sContrato = '$sContrato'
                                  And sIdConvenio = '$sIdConvenioAct'
                                  And sTipoActividad = 'Actividad'
                            group by sContrato";
                   $rs = mysql_query($sql);
                   $numreg = mysql_num_rows($rs);
                   if ($numreg > 0 )
                   {   $row = mysql_fetch_array($rs);
                       $dMontoContrato = $row['dMontoMN'];
                   }
                   //  verifica campos de la configuracion
                   $lCalculoPonderado = "";
                   $sql = "select lCalculoPonderado
                           from configuracion
                           where sContrato='$sContrato'";
                   $rs = mysql_query($sql);
                   if($row = mysql_fetch_array($rs))
                      $lCalculoPonderado = $row['lCalculoPonderado'];

                   //Comienzan los if's
                   if ($lCalculoPonderado == "Financiero")
                   {   if ($dMontoContrato > 0)
                       {   $sql = "update actividadesxanexo
                                   SET dPonderado = (((dCantidadAnexo * dVentaMN) / '$dMontoContrato') * '$PonderadoAjuste')
                                   Where sContrato = '$sContrato'
                                         And sIdConvenio = '$sIdConvenioAct'
                                         And sTipoActividad = 'Actividad'
                                         and dCantidadAnexo <> 0";
                           mysql_query($sql);
                       }
                   }
                   else
                      if ($lCalculoPonderado == "Duracion")
                      {   // Se calcula el Monto del Programa....
                          $sql = "Select sum(dDuracion) as dDuracionTotal
                                  From actividadesxanexo
                                  Where sContrato = '$sContrato'
                                        And sIdConvenio = '$sIdConvenioAct'
                                        And sTipoActividad = 'Actividad'
                                  group by sContrato'";
                         $rs = mysql_query($sql);
                         $numreg = mysql_num_rows($rs);
                         if ($numreg > 0 )
                         {   $row = mysql_fetch_array($rs);
                             $DuracionTotal = $row['dDuracionTotal'];
                             $sql = "update actividadesxanexo
                                     SET dPonderado = ((dDuracion / '$DuracionTotal') * '$PonderadoAjuste')
                                     Where sContrato = '$sContrato'
                                     And sIdConvenio = '$sIdConvenioAct'
                                     And sTipoActividad = 'Actividad'
                                     and dDuracion <> 0 ";
                             mysql_query($sql);
                         }
                      }
                      else
                         {  // Primero el Financiero en MN
                            $dMontoContrato = 0;
                            $sql = "Select sum(dCantidadAnexo * dVentaMN) as dMontoMN
                                    From actividadesxanexo
                                    Where sContrato = '$sContrato'
                                          And sIdConvenio = '$sIdConvenioAct'
                                          And sTipoActividad = 'Actividad'
                                    group by sContrato";
                            $rs = mysql_query($sql);
                            $numreg = mysql_num_rows($rs);
                            if ($numreg > 0 )
                            {   $row = mysql_fetch_array($rs);
                                $dMontoContrato = $row['dMontoMN'];
                            }
                            if ($dMontoContrato >  0)
                            {   $sql = "update actividadesxanexo
                                        SET dPonderado = (((dCantidadAnexo * dVentaMN) / '$dMontoContrato') * '$PonderadoAjuste')
                                        Where sContrato = '$sContrato'
                                              And sIdConvenio = '$sIdConvenioAct'
                                              And sTipoActividad = 'Actividad'
                                              And dCantidadAnexo <> 0 ";
                                mysql_query($sql);
                            }
                            // Primero el Financiero en DLL
                            $dMontoContrato = 0;
                            $sql = "Select sum(dCantidadAnexo * dVentaDLL) as dMontoDLL
                                    From actividadesxanexo
                                    Where sContrato = '$sContrato'
                                          And sIdConvenio = '$sIdConvenioAct'
                                          And sTipoActividad = 'Actividad'
                                    group by sContrato";
                            $rs = mysql_query($sql);
                            $numreg = mysql_num_rows($rs);
                            if ($numreg > 0 )
                            {   $row = mysql_fetch_array($rs);
                                $dMontoContrato = $row['dMontoDLL'];
                            }
                            if ($dMontoContrato >  0)
                            {   $sql = "update actividadesxanexo
                                        SET dPonderado = ((dPonderado + (((dCantidadAnexo * dVentaDLL) / '$dMontoContrato') * '$PonderadoAjuste')) / 2)
                                        Where sContrato = '$sContrato'
                                              And sIdConvenio = '$sIdConvenioAct'
                                              And sTipoActividad = 'Actividad'
                                              And dCantidadAnexo <> 0";
                                mysql_query($sql);
                            }
                            // Fisico en Moneda Nacional
                            //Calculo el monto del programa ...
                            $sql = "Select sum(dDuracion) as dDuracionTotal
                                    From actividadesxanexo
                                    Where sContrato = '$sContrato'
                                          And sIdConvenio = '$sIdConvenioAct'
                                          And sTipoActividad = 'Actividad'
                                    group by sContrato";
                            $rs = mysql_query($sql);
                            $numreg = mysql_num_rows($rs);
                            if ($numreg > 0 )
                            {   $row = mysql_fetch_array($rs);
                                $DuracionContrato = $row['dDuracionTotal'];
                                $sql = "update actividadesxanexo
                                        SET dPonderado = (dPonderado + (((dDuracion / '$DuracionContrato') * '$PonderadoAjuste')) / 2)
                                        Where sContrato = '$sContrato'
                                        And sIdConvenio = '$sIdConvenioAct'
                                        And sTipoActividad = 'Actividad'
                                        and dDuracion <> 0 ";
                                mysql_query($sql);
                            }
                        }
                   // Terminan los if's.....
                   $sql = "Select Distinct sWBS
                           From actividadesxanexo
                           Where sContrato = '$sContrato'
                                 And sIdConvenio = '$sIdConvenioAct'
                                 And sTipoActividad = 'Paquete'
                           Order By iNivel DESC";
                   $rs = mysql_query($sql);
                   while($row = mysql_fetch_array($rs))
                   {   $Paquete = $row['sWBS'];
                       $sql = "Select Min(dFechaInicio) as dFechaInicio, Max(dFechaFinal) as dFechaFinal,
                                      sum(dPonderado) as dPonderado, sum(dCantidadAnexo * dVentaMN) as dMontoMN,
                                      sum(dCantidadAnexo * dVentaDLL) as dMontoDLL
                              From actividadesxanexo
                              Where sContrato = '$sContrato'
                                    And sIdConvenio = '$sIdConvenioAct'
                                    And sWBSAnterior = '$Paquete'
                              Group By sWBSAnterior";
                       $rs = mysql_query($sql);
                       $numreg = mysql_num_rows($rs);
                       if ($numreg > 0 )
                       {   $row = mysql_fetch_array($rs);
                           $Inicio = $row['dFechaInicio'];
                           $Final = $row['dFechaFinal'];
                           $Ponderado = $row['dPonderado'];
                           $MontoMN = $row['dMontoMN'];
                           $MontoDLL = $row['dMontoDLL'];
                           if (round($Ponderado)>=100 )
                               $Ponderado = 100;
                           $sql = "Update actividadesxanexo
                                   SET dFechaInicio = '$Inicio', dFechaFinal = '$Final',
                                       dPonderado = '$Ponderado', dVentaMN = '$MontoMN',
                                       dVentaDLL = '$MontoDLL'
                                   Where sContrato = '$sContrato'
                                         And sIdConvenio = '$sIdConvenioAct'
                                         And sWBS = '$Paquete'
                                         And sTipoActividad = 'Paquete'";
                           mysql_query($sql);
                      }
                   }
                    //Actualizo el convenio
                   $sql = "Select dFechaInicio, dFechaFinal
                           From actividadesxanexo
                           Where sContrato = '$sContrato'
                                 And sIdConvenio = '$sIdConvenioAct'
                                 And iNivel = 0 ";
                   $rs = mysql_query($sql);
                   $numreg = mysql_num_rows($rs);
                   if ($numreg > 0 )
                   {   $row = mysql_fetch_array($rs);
                       $Inicio = $row['dFechaInicio'];
                       $Final = $row['dFechaFinal'];
                       $sql = "Update convenios
                               SET dFechaInicio = '$Inicio', dFechaFinal = '$Final',
                                   dMontoMN = '$dMontoContrato'
                               Where sContrato = '$sContrato'
                                     And sIdConvenio = '$sIdConvenioAct'";
                       mysql_query($sql);
                   }

                   // Refrecar el Grid de Actividades x anexo
                   $this->qryActividadesxAnexo->setActive(false);
                   $this->qryActividadesxAnexo->setFilter("sContrato='$sContrato' and sIdConvenio='$sIdConvenioAct'");
                   $this->qryActividadesxAnexo->setActive(true);

               }
               //-----------Termina Calculo de Ponderados-------------------
               function cmdEliminarJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                 document.getElementById("GrupoMenu").style.visibility = 'hidden';
                 return false;
               <?php

               }

               function cmdOpcionesJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                     if (document.getElementById("sNumeroActividad").value == "")
                        alert (" Seleccione un Concepto o Partida !!! ");
                     else
                     {
                        if (document.getElementById("GrupoMenu").style.visibility == 'hidden')
                            document.getElementById("GrupoMenu").style.visibility = 'visible';
                        else
                            document.getElementById("GrupoMenu").style.visibility = 'hidden';
                     }
                     return false;

                 return false;
               <?php

               }

               function cmdAceptarClick($sender, $params)
               {
                  global $sContrato,$sIdConvenioAct;
                  $iColor = $this->iColor->getItemIndex();
                  $sIdConvenio = $sIdConvenioAct;
                  $sNumeroActividad = $this->sNumeroActividad->getText();
                  $sWbsAnterior=$this->sWbsAnterior->getText();
                  $sEspecificacion = $this->sEspecificacion->getText();
                  $dCostoMN = $this->dCostoMN->getText();
                  $dCostoDll = $this->dCostoDLL->getText();
                  $dVentaMN = $this->dVentaMN->getText();
                  $dVentaDLL = $this->dVentaDLL->getText();
                  $sIdFase  = $this->sIdFase->getItemIndex();
                  $mDescripcion = $this->mDescripcion->Text;

                  $dFechaInicio = formatoFechaPer($this->dFechaInicio_1->getText(),"Y-m-d");
                  $dFechaFinal  = formatoFechaPer($this->dFechaFinal_2->getText(),"Y-m-d");

                  $dDuracion = restarFecha($dFechaInicio , $dFechaFinal);

                  $lCalulo = $this->lCalculo->getItemIndex();
                  $dPonderado = $this->dPonderado->getText();
                  $sMedida = $this->sMedida->getText();
                  $lExtraordinario = $this->lExtraordinario->getItemIndex();
                  $dCantidadAnexo = $this->dCantidadAnexo->getText();
                  $dTotalMN = $this->dTotalMN->getText();
                  $dTotalDLL = $this->dTotalDLL->getText();

                  /*
sContrato
sIdConvenio
iNivel
sSimbolo
sWbs
sWbsAnterior
sNumeroActividad
sTipoActividad
sEspecificacion
sActividadAnterior
iItemOrden
mDescripcion
dFechaInicio
dDuracion
dFechaFinal
dPonderado
dCostoMN
dCostoDll
dVentaMN
dVentaDLL
lCalculo
sMedida
dCantidadAnexo
dCargado
dInstalado
dExcedente
iColor
lExtraordinario
sIdFase
                  */

                  //get iItem and iNivel
                  $sql = "Select
                              iNivel,
                              iItemOrden,
                              sWbs,
                              sWbsAnterior,
                              sNumeroActividad,
                              mDescripcion,
                              dFechaInicio,
                              dFechaFinal,
                              dDuracion
                         from
                           actividadesxanexo
                         Where
                           sContrato ='$sContrato'
                           and sIdConvenio = '$sIdConvenioAct'
                           And sTipoActividad = 'Paquete'
                         order by iItemOrden";

                  $rs = mysql_query($sql);
                  while($rw = mysql_fetch_array($rs)){
                     $_iItemOrden = $rw["iItemOrden"];
                     $_iNivel = $rw["iNivel"];
                     $_sWbs=$rw["sWbs"];
                     $_sWbsAnterior = $rw["sWbsAnterior"];
                     $_sNumeroActividad = $rw["sNumeroAtividad"];
                     $_mDescripcion = $rw["mDescripcion"];
                     $_dFechaInicio = $rw["dFechaInicio"];
                     $_dFechaFinal = $rw["dFechaFinal"];
                     $_dDuracion = $rw["dDuracion"];
                  }
                  $sql ="sContrato
                           sIdConvenio,
                           iNivel,
                           sSimbolo,
                           sWbs,
                           sWbsAnterior,
                           sNumeroActividad,
                           sTipoActividad,
                           sEspecificacion,
                           sActividadAnterior,
                           iItemOrden,
                           mDescripcion,
                           dFechaInicio,
                           dDuracion,
                           dFechaFinal,
                           dPonderado,
                           dCostoMN,
                           dCostoDll,
                           dVentaMN,
                           dVentaDLL,
                           lCalculo,
                           sMedida,
                           dCantidadAnexo,
                           dCargado,
                           dInstalado,
                           dExcedente,
                           iColor,
                           lExtraordinario,
                           sIdFase";


               }

               function cmdCancelarJSClick($sender, $params)
               {

               ?>
                  habilitar(true);
                  return false;

               <?php

               }

               function cmdAceptarJSClick($sender, $params)
               {

               ?>
                  if( document.getElementById("sNumeroActividad").value = "" ){
                     alert("Debe Proporcionar un numero de partida.");
                     document.getElementById("sNumeroActividad").focus();
                     return false;
                  }else{

                  }

               <?php

               }

               function cmdModificarJSClick($sender, $params)
               {

               ?>
                  habilitar(false);
                  document.getElementById("GrupoMenu").style.visibility = 'hidden';
                  document.getElementById("hOperacion").value="modificar";
                  document.getElementById("sNumeroActividad").focus();
                  return false;
               <?php

               }

               function cmdNuevoJSClick($sender, $params)
               {

               ?>
                  habilitar(false);
                  document.getElementById("hOperacion").value="agregar";
                  document.getElementById("sNumeroActividad").focus();
                  document.getElementById("GrupoMenu").style.visibility = 'hidden';
                  Limpiar();
                  return false;
               <?php

               }

               function dumpJavascript(){
                  echo 'function habilitar(val){
                           document.getElementById("sPaquete").disabled = val;
                           document.getElementById("sNumeroActividad").disabled = val;
                           document.getElementById("sWbsAnterior").disabled = val;
                           document.getElementById("sEspecificacion").disabled = val;
                           document.getElementById("dCostoMN").disabled = val;
                           document.getElementById("dCostoDLL").disabled = val;
                           document.getElementById("dVentaMN").disabled = val;
                           document.getElementById("dVentaDLL").disabled = val;
                           document.getElementById("sIdFase").disabled = val;
                           document.getElementById("mDescripcion").disabled = val;
                           document.getElementById("f-calendar-field-1").disabled = val;
                           document.getElementById("f-calendar-field-2").disabled = val;
                           document.getElementById("lCalculo").disabled = val;
                           document.getElementById("dDuracion").disabled = val;
                           document.getElementById("dPonderado").disabled = val;
                           document.getElementById("iColor").disabled = val;
                           document.getElementById("sMedida").disabled = val;
                           document.getElementById("dCantidadAnexo").disabled = val;
                           document.getElementById("lExtraordinario").disabled = val;
                           document.getElementById("f-calendar-field-1").disabled = val;

                           document.getElementById("cmdNuevo").disabled = !val;
                           document.getElementById("cmdModificar").disabled = !val;
                           document.getElementById("cmdAceptar").disabled = val;
                           document.getElementById("cmdCancelar").disabled = val;
                           document.getElementById("cmdEliminar").disabled = !val;
                           document.getElementById("cmdImprimir").disabled = !val;
                        }';
                  echo 'function replacechars(entry) {
                           out = "_"; // reemplazar el caracter -
                           add = ""; // por nada
                           temp = "" + entry;

                           while (temp.indexOf(out)>-1) {
                              pos= temp.indexOf(out);
                              temp = "" + (temp.substring(0, pos) + add +
                              temp.substring((pos + out.length), temp.length));
                           }
                           return temp;
                        }';
                   echo 'function ResaltarBotones()
                   {
                          document.getElementById("cmdNuevo").style.backgroundColor = "";
                          document.getElementById("cmdModificar").style.backgroundColor = "";
                          document.getElementById("cmdAceptar").style.backgroundColor = "";
                          document.getElementById("cmdCancelar").style.backgroundColor = "";
                          document.getElementById("cmdEliminar").style.backgroundColor = "";
                          document.getElementById("cmdImprimir").style.backgroundColor = "";
                          document.getElementById("cmdOpciones").style.backgroundColor = "";
                          document.getElementById("sPaquete").style.backgroundColor = "";
                          document.getElementById("sNumeroActividad").style.backgroundColor = "";
                          document.getElementById("sWbsAnterior").style.backgroundColor = "";
                          document.getElementById("sEspecificacion").style.backgroundColor = "";
                          document.getElementById("dCostoMN").style.backgroundColor = "";
                          document.getElementById("dCostoDLL").style.backgroundColor = "";
                          document.getElementById("dVentaMN").style.backgroundColor = "";
                          document.getElementById("dVentaDLL").style.backgroundColor = "";
                          document.getElementById("sIdFase").style.backgroundColor = "";
                          document.getElementById("mDescripcion").style.backgroundColor = "";
                          document.getElementById("lCalculo").style.backgroundColor = "";
                          document.getElementById("dDuracion").style.backgroundColor = "";
                          document.getElementById("dPonderado").style.backgroundColor = "";
                          document.getElementById("iColor").style.backgroundColor = "";
                          document.getElementById("sMedida").style.backgroundColor = "";
                          document.getElementById("lExtraordinario").style.backgroundColor = "";
                          document.getElementById("dCantidadAnexo").style.backgroundColor = "";
                          document.getElementById("dTotalMN").style.backgroundColor = "";
                          document.getElementById("dTotalDLL").style.backgroundColor = "";
                          document.getElementById("txtBuscar").style.backgroundColor = "";
                          document.getElementById("cmdOk").style.backgroundColor = "";
                          document.getElementById("cmdCancel").style.backgroundColor = "";
                          document.getElementById("cmdOtro").style.backgroundColor = "";
                          document.getElementById("cmdQuitar").style.backgroundColor = "";
                          document.getElementById("cmdMas").style.backgroundColor = "";
                          document.getElementById("cmdMenos").style.backgroundColor = "";
                          document.getElementById("memoComenta").style.backgroundColor = "";
                          return false;
                   }';
                   echo 'function Limpiar()
                   {
                          document.getElementById("sNumeroActividad").value = "";
                          document.getElementById("sWbsAnterior").value = "";
                          document.getElementById("sEspecificacion").value = "";
                          document.getElementById("dCostoMN").value = "";
                          document.getElementById("dCostoDLL").value = "";
                          document.getElementById("dVentaMN").value = "";
                          document.getElementById("dVentaDLL").value = "";
                          document.getElementById("mDescripcion").value = "";
                          document.getElementById("dDuracion").value = "";
                          document.getElementById("dPonderado").value = "";
                          document.getElementById("sMedida").value = "";
                          document.getElementById("dCantidadAnexo").value = "";
                          document.getElementById("dTotalMN").value= "";
                          document.getElementById("dTotalDLL").value = "";
                          return false;
                   }';
               }

               function ddactividadesxanexo1JSClick($sender, $params)
               {
               ?>
                 ddactividadesxanexo1.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = ddactividadesxanexo1.getTableModel();

                        if ( document.getElementById("hOperacion").value=="agregar")
                             habilitar(true);
                        if ( document.getElementById("hOperacion").value=="modificar")
                             document.getElementById("sNumeroActividad").focus();
                        document.getElementById("GrupoMenu").style.visibility = 'hidden';

                        document.getElementById("hsWbs").value = replacechars(tableModel.getValue(0, index));
                        document.getElementById("sPaquete").value = tableModel.getValue(1, index);
                        document.getElementById("sNumeroActividad").value=tableModel.getValue(2, index);
                        document.getElementById("hsNumeroActividad").value=tableModel.getValue(2, index);
                        document.getElementById("sWbsAnterior").value=tableModel.getValue(1, index);
                        document.getElementById("hsWbsAnterior").value=tableModel.getValue(1, index);
                        document.getElementById("sEspecificacion").value=tableModel.getValue(4, index);
                        document.getElementById("dCostoMN").value=tableModel.getValue(11, index);
                        document.getElementById("dCostoDLL").value=tableModel.getValue(12, index);
                        document.getElementById("dVentaMN").value=tableModel.getValue(13, index);
                        document.getElementById("dVentaDLL").value=tableModel.getValue(14, index);
                        document.getElementById("sIdFase").value=tableModel.getValue(23, index);
                        document.getElementById("mDescripcion").value=tableModel.getValue(6, index);
                        document.getElementById("f-calendar-field-1").value=tableModel.getValue(7, index);
                        document.getElementById("f-calendar-field-2").value=tableModel.getValue(9, index);
                        document.getElementById("lCalculo").value=tableModel.getValue(15, index);
                        document.getElementById("dDuracion").value=tableModel.getValue(8, index);
                        document.getElementById("dPonderado").value=tableModel.getValue(10, index);
                        document.getElementById("iColor").value=tableModel.getValue(21, index);
                        document.getElementById("sMedida").value=tableModel.getValue(16, index);
                        document.getElementById("dCantidadAnexo").value=tableModel.getValue(17, index);
                        document.getElementById("lExtraordinario").value=tableModel.getValue(22, index);
                        document.getElementById("f-calendar-field-1").value=tableModel.getValue(7, index);
                        sTipo = tableModel.getValue(3, index);
                        if (document.getElementById("Panel_Alcances_outer").style.visibility == 'visible')
                        {   if (sTipo=="Actividad")
                               document.getElementById("cmdAlcance").click();
                        }
                        if (document.getElementById("Panel_Historial_outer").style.visibility == 'visible')
                        {   if (sTipo=="Actividad")
                            {   document.getElementById("cmdHistorial").click();
                            }
                            else
                               {   var rowData=[];
                                   rowData.push(['','','','','','','']);
                                   var oData = rowData;
                                   GridHistorial.getTableModel().originalData=oData;
                                   GridHistorial.getTableModel().setData(rowData);
                               }
                        }
                        if (document.getElementById("Panel_Comenta_outer").style.visibility == 'visible')
                        {   if (sTipo=="Actividad")
                            {
                                document.getElementById("cmdComentario").click();
                            }
                            else
                               {   var rowData=[];
                                   rowData.push(['','','','']);
                                   var oData = rowData;
                                   GridComentario.getTableModel().originalData=oData;
                                   GridComentario.getTableModel().setData(rowData);
                               }
                        }
                   }

                  );

                 return false;

               <?php
               }

               function memoComentaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function memoComentaJSFocus($sender, $params)
               {
               ?>                  //Add your javascript code here
                   i = GridComentario.getFocusedRow();
                   GridComentario.getTableModel().setValue(1,i,"S/TITULO");
                   return false;
               <?php
               }

               function memoComentaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCostoDLLJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCostoDLLJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCostoDLLJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sMedidaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sMedidaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sMedidaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lExtraordinarioJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lExtraordinarioJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lExtraordinarioJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCantidadAnexoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCantidadAnexoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCantidadAnexoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dTotalMNJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dTotalMNJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dTotalMNJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dTotalDLLJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dTotalDLLJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dTotalDLLJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iColorJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iColorJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iColorJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dPonderadoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dPonderadoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dPonderadoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dDuracionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dDuracionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dDuracionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lCalculoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lCalculoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lCalculoJSBlur($sender, $params)
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

               function sIdFaseJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdFaseJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdFaseJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dVentaDLLJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dVentaDLLJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dVentaDLLJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dVentaMNJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dVentaMNJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dVentaMNJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCostoMNJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCostoMNJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dCostoMNJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sEspecificacionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sEspecificacionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sEspecificacionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sWbsAnteriorJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sWbsAnteriorJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sWbsAnteriorJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sNumeroActividadJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sNumeroActividadJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sNumeroActividadJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPaqueteJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPaqueteJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPaqueteJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

                function txtBuscarJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtBuscarJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtBuscarJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function frmActividadesAnexo2BeforeShow($sender, $params)
               {

                   global $_SESSION,$Usuario,$Clave,$Servidor;

                   $this->db->setConnected(false);
                   $this->db->setDatabaseName($_SESSION['database']);
                   $this->db->setUserName($Usuario);
                   $this->db->setUserPassword($Clave);
                   $this->db->setHost($Servidor);
                   $this->db->setConnected(true);

                  global $sContrato,$sIdConvenioAct;

                  $this->qryActividadesxAnexo->setActive(false);
                  $this->qryActividadesxAnexo->setFilter("sContrato='$sContrato' and sIdConvenio='$sIdConvenioAct'");
                  $this->qryActividadesxAnexo->setActive(true);

                  $sql = "select sWbs,mDescripcion from actividadesxanexo where sContrato='$sContrato' and sIdConvenio='$sIdConvenioAct' and sTipoActividad='Paquete'";
                  $rs  = mysql_query($sql);
                  unset($it);
                  while($rw = mysql_fetch_array($rs)){
                     if(strlen($rw["sWbs"]) <10){
                        $length = 10 - strlen($rw["sWbs"]) ;
                        for ($i =0 ; $i<$length; $i++)
                           $rw["sWbs"].=" ";
                     }
                     $it[$rw["sWbs"]] = $rw["sWbs"] . "<-->".$rw["mDescripcion"];
                  }
                  $this->sPaquete->setItems($it);
                  //LAS TABLAS DE DATOS QUE SE TOMAN PARA INICIALIZAR GRIDS SON ERRONEAS, NO SON LAS QUE SE VANA A USAR...

                  $sql = " select '' as iFase, '' as sDescripcion, '' as dAvance
                           from estimaciones
                           limit 1";
                  $this->qryAlcanes->setActive(false);
                  $this->qryAlcanes->setSQL($sql);
                  $this->qryAlcanes->setActive(true);

                  $sql = " select  '' as sDescripcion,'' as sIdConvenio,'' as dFechaInicio,
                                   '' as dFechaFinal, '' as dCantidadAnexo,
                                   '' as dVentaMN, '' as dPonderado
                           from actividadesxanexo limit 1";
                  $this->qryHistorial->setActive(false);
                  $this->qryHistorial->setSQL($sql);
                  $this->qryHistorial->setActive(true);

                  $sql = " select  '' as dIdFecha,'' as sDescripcionCorta,'' as mComentarios,
                                   '' as sIdUsuario
                           from actividadesxanexo   limit 1";
                  $this->qryComentario->setActive(false);
                  $this->qryComentario->setSQL($sql);
                  $this->qryComentario->setActive(true);
               }

               function cmdImprimirJSClick($sender, $params)
               {
               global $sContrato,$sIdConvenioAct;
               ?>
                 //Add your javascript code here
                 ruta = "../reporte.php";
                 ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                 ruta = ruta + "&sConvenio=<?php echo $sIdConvenioAct ?>";
                 ruta = ruta + "&reportesPath=CatalogoConceptos";
                 ruta = ruta + "&nombreReporte=rptCatalogoConceptos";
                 document.getElementById("GrupoMenu").style.visibility = 'hidden';
                 var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");

                 return false;
               <?php
               }

        }

        global $application;

        global $frmActividadesAnexo2;

        //Creates the form
        $frmActividadesAnexo2=new frmActividadesAnexo2($application);

        //Read from resource file
        $frmActividadesAnexo2->loadResource(__FILE__);

        //Shows the form
        $frmActividadesAnexo2->show();

?>
<script>
habilitar(true);
ResaltarBotones();
document.getElementById("GrupoMenu").style.visibility = 'hidden';
document.getElementById("Panel_Buscar_outer").style.visibility = 'hidden';
document.getElementById("Panel_Alcances_outer").style.visibility = 'hidden';
document.getElementById("Panel_Historial_outer").style.visibility = 'hidden';
document.getElementById("Panel_Comenta_outer").style.visibility = 'hidden';
</script>
