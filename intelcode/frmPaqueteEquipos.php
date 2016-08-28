<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        //require("mysql.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("buttons.inc.php");
        use_unit("imglist.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require_once("Connection.php");
        //$sUsuario=$_SESSION["ssUsuario"];
        //$sIdConvenio =$sIdConvenioAct;
        //$sContrato = '425027849';
        //Class definition
        class frmPaqueteEquipos extends Page
        {
               public $cmdCerrar = null;
               public $GridEquipos = null;
               public $QryEquipo = null;
               public $SourEquipo = null;
               public $Label9 = null;
               public $PanEquipo = null;
               public $HiOldIdP = null;
               public $HiOldIdE = null;
               public $SourTodo = null;
               public $QryTodo = null;
               public $GridTodos = null;
               public $Lista = null;
               public $CboPernocta = null;
               public $txtPaquete = null;
               public $txtJornada = null;
               public $txtMedida = null;
               public $txtCantidad = null;
               public $txtEquipo = null;
               public $Label8 = null;
               public $Label7 = null;
               public $Label6 = null;
               public $Label5 = null;
               public $GridTipos = null;
               public $Panel2 = null;
               public $HiOpcion = null;
               public $QryPozo = null;
               public $SourPozo = null;
               public $base = null;
               public $cmdImprimir = null;
               public $cmdCancelar = null;
               public $cmdAceptar = null;
               public $cmdEliminar = null;
               public $cmdModificar = null;
               public $cmdAgregar = null;
               public $txtDescripcion = null;
               public $Panel1 = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;

               function cmdCerrarJSClick($sender, $params)
               {
               ?>                //Add your javascript code here
                   document.getElementById("PanEquipo_outer").style.visibility = 'hidden';
                   return false;
               <?php
               }

               function GridEquiposJSDblClick($sender, $params)
               {
               ?>               //Add your javascript code here
                    document.getElementById("txtCantidad").focus();
                    i = GridEquipos.getFocusedRow();
                    sEquipo      = GridEquipos.getTableModel().getValue(0,i);
                    sDescripcion = GridEquipos.getTableModel().getValue(1,i);
                    sMedida      = GridEquipos.getTableModel().getValue(2,i);
                    sJornada     = GridEquipos.getTableModel().getValue(3,i);
                    document.getElementById("txtEquipo").value      = sEquipo;
                    document.getElementById("txtDescripcion").value = sDescripcion;
                    document.getElementById("txtMedida").value      = sMedida;
                    document.getElementById("txtJornada").value     = sJornada;
                    document.getElementById("txtCantidad").value    = 0;
                    document.getElementById("PanEquipo_outer").style.visibility = 'hidden';
                    return false;
               <?php
               }

               function txtEquipoJSKeyUp($sender, $params)
               {
               ?>                //Add your javascript code here
                  if(event.keyCode>47)
                  {
                     if (document.getElementById("HiOpcion").value == "Agregar" )                         {
                         document.getElementById("PanEquipo_outer").style.visibility = 'visible';
                         return false;
                     }
                     return false;
                  }
               <?php
               }


               function ListaJSClick($sender, $params)
               {
               ?>               //Add your javascript code here
                    //para seleccionar elementos de la lista...
                    var _Dato = [];
                    _Dato.push(['']);
                    GridTipos.getTableModel().setData(_Dato);

                    var lista = document.getElementById("Lista");
                    for (i = 0; i<lista.length; i++)
                    {    if (lista.options[i].selected == true)
                         {   paquete = lista.options[i].value;
                             document.getElementById("txtPaquete").value = paquete;
                         }
                    }

                    j = GridTodos.getTableModel().getRowCount();
                    var Dato = [];
                    for (x=0; x<j; x++)
                    {   paq = GridTodos.getTableModel().getValue(5,x);
                        if (paq == paquete)
                        {   equipo      = GridTodos.getTableModel().getValue(0,x);
                            descripcion = GridTodos.getTableModel().getValue(1,x);
                            medida      = GridTodos.getTableModel().getValue(2,x);
                            jornada     = GridTodos.getTableModel().getValue(3,x);
                            cantidad    = GridTodos.getTableModel().getValue(4,x);
                            pernocta    = GridTodos.getTableModel().getValue(6,x);

                            document.getElementById("txtPaquete").value  = paquete;
                            document.getElementById("CboPernocta").value = pernocta;
                            Dato.push(['',equipo,descripcion,medida,jornada,cantidad,paquete,pernocta]);
                        }
                    }
                    GridTipos.getTableModel().setData(Dato);
                    return false;
               <?php
               }

               function CboPernoctaJSClick($sender, $params)
               {
               ?>               //Add your javascript code here
                    var _Dato=[];
                    _Dato.push(['']);
                    var _OtroDato = _Dato;
                    GridTipos.getTableModel().originalData = _OtroDato;
                    GridTipos.getTableModel().setData(_Dato);
                    return false;
               <?php
               }


               function frmPaqueteEquiposBeforeShow($sender, $params)
               {
                   global $sContrato;
                   global $_SESSION,$Usuario,$Clave,$Servidor;
                   global $Connection;
//
//                   $this->base->setConnected(false);
//                   $this->base->setDatabaseName($_SESSION['database']);
//                   $this->base->setUserName($Usuario);
//                   $this->base->setUserPassword($Clave);
//                   $this->base->setHost($Servidor);
//                   $this->base->setConnected(true);
//                    $Connection->base->setConnected(false);
//                    $Connection->base->setConnected(true);
                      $Connection->conectar();
                   $sql = "select e.sIdEquipo, e.sDescripcion, e.sMedida, e.iJornada,
                                  p.dCantidad, paq.sNumeroPaquete, paq.sIdPernocta
                           from   equipos e
                           inner join paquetesdeequipo p
                           on (    p.sIdEquipo      = e.sIdEquipo
                               and p.sContrato      = e.sContrato)
                           inner join paquetes_e  paq
                           on (    paq.sContrato      = e.sContrato
                               and paq.sNumeroPaquete = p.sNumeroPaquete)
                           where e.sContrato =  '". $Connection->global_sContrato ."'";
                   $this->QryTodo->setActive(false);
                   $this->QryTodo->setSQL($sql);
                   $this->QryTodo->setActive(true);

                   $sql = "select distinct sNumeroPaquete
                           from paquetes_e
                           where sContrato =  '". $Connection->global_sContrato ."'
                           order by sNumeroPaquete DESC";
                   $rs  = mysql_query($sql);
                   while($row = mysql_fetch_array($rs))
                   {
                     $Paq = $row["sNumeroPaquete"];
                     $item[$row["sNumeroPaquete"]]= ". P A Q U E T E    > >  $Paq ";
                   }
                   $this->Lista->setItems($item);

                   $sql = "select max(sNumeroPaquete) as sNumeroPaquete
                           from paquetes_e
                           where sContrato =  '". $Connection->global_sContrato ."'";
                   $rs  = mysql_query($sql);
                   $row = mysql_fetch_array($rs);
                   $Paq = $row['sNumeroPaquete'];
                   $this->txtPaquete->Text = $Paq;

                   $sql = "select e.sIdEquipo, e.sDescripcion, e.sMedida, e.iJornada,
                                  p.dCantidad, paq.sNumeroPaquete, paq.sIdPernocta
                           from   equipos e
                           inner join paquetesdeequipo p
                           on (    p.sIdEquipo      = e.sIdEquipo
                               and p.sNumeroPaquete = '$Paq'
                               and p.sContrato      = e.sContrato)
                           inner join paquetes_e  paq
                           on (    paq.sContrato      = e.sContrato
                               and paq.sNumeroPaquete = p.sNumeroPaquete)
                           where e.sContrato =  '". $Connection->global_sContrato ."'";
                   $this->QryPozo->setActive(false);
                   $this->QryPozo->setSQL($sql);
                   $this->QryPozo->setActive(true);

                   $sql = "select sIdPernocta, sDescripcion from pernoctan";
                   $rs  = mysql_query($sql);
                   while ($row = mysql_fetch_array($rs))
                   {
                       $items[$row["sIdPernocta"]]=$row["sDescripcion"];
                   }
                   $this->CboPernocta->setItems($items);

                   $sql= " select sIdEquipo, sDescripcion, sMedida, iJornada
                           from equipos
                           where sContrato =  '". $Connection->global_sContrato ."'";
                   $this->QryEquipo->setActive(false);
                   $this->QryEquipo->setSQL($sql);
                   $this->QryEquipo->setActive(true);

               }


               function GridTiposJSClick($sender, $params)
               {
               ?>               //Add your javascript code here

                    GridTipos.getSelectionModel().iterateSelection
                    (    function(index)
                         {
                              var Tabla      = GridTipos.getTableModel();
                              sEquipo        = Tabla.getValue(1, index);
                              sDescripcion   = Tabla.getValue(2, index);
                              sMedida        = Tabla.getValue(3, index);
                              sJornada       = Tabla.getValue(4,index);
                              sCantidad      = Tabla.getValue(5,index);
                              sPaquete       = Tabla.getValue(6,index);

                              document.getElementById("txtEquipo").value      = sEquipo;
                              document.getElementById("txtDescripcion").value = sDescripcion;
                              document.getElementById("txtMedida").value      = sMedida;
                              document.getElementById("txtJornada").value     = sJornada;
                              document.getElementById("txtCantidad").value    = sCantidad;
                              document.getElementById("HiOldIdE").value       = sEquipo;
                              document.getElementById("HiOldIdP").value       = sPaquete;
                              controlBotones(false);
                              Imagen(true);
                         }
                    );

                    return false;
               <?php
               }


               function cmdAceptarJSClick($sender, $params)
               {
               ?>                //Add your javascript code here
                    return true;
               <?php
               }

               function cmdAceptarClick($sender, $params)
               {
                    global $sContrato;
                    $Equipo    = $this->txtEquipo->Text;
                    $Cantidad  = $this->txtCantidad->Text;
                    $Paquete   = $this->txtPaquete->Text;
                    $Pernocta  = $this->CboPernocta->getItemIndex();
                    $Opcion    = $this->HiOpcion->Value;
                    $IdOldE    = $this->HiOldIdE->Value;
                    $IdOldP    = $this->HiOldIdP->Value;
                    if ($Opcion == "Agregar")
                    {
                        $sql = "insert
                                    into paquetes_e
                                        (sContrato,
                                         sNumeroPaquete,
                                         sIdPernocta)
                                    values
                                        ( '". $Connection->global_sContrato ."',
                                         '$Paquete',
                                         '$Pernocta')";
                        mysql_query($sql);

                        $sql = "insert
                                into paquetesdeequipo
                                     (sContrato,
                                      sNumeroPaquete,
                                      sIdEquipo,
                                      dCantidad)
                                values
                                     ( '". $Connection->global_sContrato ."',
                                      '$Paquete',
                                      '$Equipo',
                                      '$Cantidad')";
                         mysql_query($sql);
                         if (mysql_error())
                         {
                            ?>
                            <script>
                               alert(" <?php echo " Error al Insertar los Datos".mysql_error() ?>");
                            </script>
                            <?php
                         }
                    }

                    if ($Opcion == "Modificar")
                    {
                        $sql = "update paquetes_e
                                set
                                   sNumeroPaquete = '$Paquete',
                                   sIdPernocta    = '$Pernocta'
                                where
                                   sNumeroPaquete = '$IdOldP'
                                   and sContrato =  '". $Connection->global_sContrato ."'";
                         mysql_query($sql);

                         $sql = "update paquetesdeequipo
                                set
                                    sNumeroPaquete = '$Paquete',
                                    sIdEquipo      = '$Equipo',
                                    dCantidad      = '$Cantidad'
                                where
                                    sNumeroPaquete = '$IdOldP'
                                    and sIdEquipo  = '$IdOldE'
                                    and sContrato  =  '". $Connection->global_sContrato ."'";
                         mysql_query($sql);

                         if (mysql_error())
                         {
                            ?>
                            <script>
                               alert(" <?php echo " Error al Modificar los Datos".mysql_error() ?>");
                            </script>
                            <?php
                         }

                    }
               }

               function cmdEliminarJSClick($sender, $params)
               {
               ?>               //Add your javascript code here
                    i   = GridTipos.getTableModel().getRowCount();
                    ok  = 0;
                    if (i>0)
                    {   if (!confirm("  Desea ELIMINAR El Equipo Seleccionado ?"))
                           ok = 1;
                    }
                    if (ok == 1)
                       return false;
                    else
                       return true;
               <?php
               }

               function cmdEliminarClick($sender, $params)
               {
                   global $sContrato;
                   $IdOldE    = $this->HiOldIdE->Value;
                   $IdOldP    = $this->HiOldIdP->Value;

                   $sql = " delete
                            from paquetesdeequipo
                            where
                                  sNumeroPaquete = '$IdOldP'
                                  and sIdEquipo  = '$IdOldE'
                                  and sContrato  =  '". $Connection->global_sContrato ."'";
                   mysql_query($sql);

                   if (mysql_error())
                   {
                       ?>
                       <script>
                               alert(" <?php echo " Error al Eliminar los Datos".mysql_error() ?>");
                       </script>
                       <?php
                   }
               }

               function cmdCancelarJSClick($sender, $params)
               {
               ?>               //Add your javascript code here
                   controlBotones(false);
                   return false;
               <?php
               }

               function cmdModificarJSClick($sender, $params)
               {
               ?>               //Add your javascript code here
                   pozo = document.getElementById("txtEquipo").value;
                   if (pozo == "")
                      alert (" Haga Click en Un Equipo !! ");
                   else
                   {
                        controlBotones(true);
                        document.getElementById("txtEquipo").focus();
                        document.getElementById("HiOpcion").value = "Modificar";
                   }
                   return false;
               <?php
               }


               function cmdAgregarJSClick($sender, $params)
               {
               ?>              //Add your javascript code here
                 if (document.getElementById("txtPaquete").value == "")
                 {   alert (" Escriba un Numero de Paquete o Seleccione un Paquete!! ");
                 }else
                     {
                        controlBotones(true);
                        document.getElementById("txtEquipo").value      = "";
                        document.getElementById("txtDescripcion").value = "";
                        document.getElementById("txtMedida").value      = "";
                        document.getElementById("txtJornada").value     = "";
                        document.getElementById("txtCantidad").value    = "";
                        document.getElementById("HiOpcion").value       = "Agregar";
                        document.getElementById("txtEquipo").focus();
                     }
                 return false;
               <?php
               }

               function cmdImprimirJSClick($sender, $params)
               {
               ?>                //Add your javascript code here
                     document.getElementById("cmdImprimir").style.width = 40;
                     return false;
               <?php
               }


               function dumpJavascript()
               {
                    echo 'function controlBotones( habilitar ){
                        if(habilitar){
                           accion = false;
                           Color1="gray";
                           Color2="";
                        }
                        else{
                             accion= true;
                             Color1="";
                             Color2="gray";
                        }
                        document.getElementById("txtEquipo").disabled =accion;
                        document.getElementById("txtDescripcion").disabled =accion;
                        document.getElementById("txtMedida").disabled =accion;
                        document.getElementById("txtJornada").disabled = accion;
                        document.getElementById("txtCantidad").disabled = accion;
                        document.getElementById("cmdAgregar").disabled =habilitar;
                        document.getElementById("cmdModificar").disabled =habilitar;
                        document.getElementById("cmdEliminar").disabled =habilitar;
                        document.getElementById("cmdAceptar").disabled =accion;
                        document.getElementById("cmdCancelar").disabled =accion;
                        document.getElementById("cmdImprimir").disabled =habilitar;

                        if (habilitar==false){
                                        document.getElementById("cmdAgregar").src="recursos/imagenesMenu/Botones/Symbol-Add.ico";
                                        document.getElementById("cmdModificar").src="recursos/imagenesMenu/Botones/Edit.ico";
                                        document.getElementById("cmdAceptar").src="recursos/imagenesMenu/Botones/_Symbol-Check.ico";
                                        document.getElementById("cmdCancelar").src="recursos/imagenesMenu/Botones/_Undo.ico";
                                        document.getElementById("cmdEliminar").src="recursos/imagenesMenu/Botones/Symbol-Delete.ico";
                                        document.getElementById("cmdImprimir").src="recursos/imagenesMenu/Botones/32px-Crystal_Clear_action_fileprint.ico";
                                }else{
                                        document.getElementById("cmdAgregar").src="recursos/imagenesMenu/Botones/_Symbol-Add.ico";
                                        document.getElementById("cmdModificar").src="recursos/imagenesMenu/Botones/_Edit.ico";
                                        document.getElementById("cmdAceptar").src="recursos/imagenesMenu/Botones/Symbol-Check.ico";
                                        document.getElementById("cmdCancelar").src="recursos/imagenesMenu/Botones/Undo.ico";
                                        document.getElementById("cmdEliminar").src="recursos/imagenesMenu/Botones/_Symbol-Delete.ico";
                                        document.getElementById("cmdImprimir").src="recursos/imagenesMenu/Botones/_32px-Crystal_Clear_action_fileprint.ico";
                                }
                        return false;
                     }';

                      echo 'function ResaltarBotones()
                      {
                          document.getElementById("txtEquipo").style.backgroundColor = "";
                          document.getElementById("txtDescripcion").style.backgroundColor = "";
                          document.getElementById("txtMedida").style.backgroundColor = "";
                          document.getElementById("txtJornada").style.backgroundColor = "";
                          document.getElementById("txtCantidad").style.backgroundColor = "";
                          document.getElementById("txtPaquete").style.backgroundColor = "";
                          document.getElementById("CboPernocta").style.backgroundColor = "";
                          document.getElementById("cmdAgregar").style.backgroundColor = "";
                          document.getElementById("cmdModificar").style.backgroundColor = "";
                          document.getElementById("cmdEliminar").style.backgroundColor = "";
                          document.getElementById("cmdAceptar").style.backgroundColor = "";
                          document.getElementById("cmdCancelar").style.backgroundColor = "";
                          document.getElementById("cmdImprimir").style.backgroundColor = "";
                          return false;
                      }';

               }


               function txtMedidaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMedidaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMedidaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtDescripcionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtDescripcionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtDescripcionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtEquipoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtEquipoJSFocus($sender, $params)
               {
               ?>           //Add your javascript code here

               <?php
               }

               function txtEquipoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboPernoctaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboPernoctaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function CboPernoctaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtPaqueteJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtPaqueteJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtPaqueteJSBlur($sender, $params)
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

               function txtJornadaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtJornadaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtJornadaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }


               function cmdImprimirJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdImprimirJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdCancelarJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdCancelarJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdAceptarJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdAceptarJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdEliminarJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdEliminarJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdModificarJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdModificarJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdAgregarJSMouseOut($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cmdAgregarJSMouseMove($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }
        }

        global $application;

        global $frmPaqueteEquipos;

        //Creates the form
        $frmPaqueteEquipos=new frmPaqueteEquipos($application);

        //Read from resource file
        $frmPaqueteEquipos->loadResource(__FILE__);

        //Shows the form
        $frmPaqueteEquipos->show();

?>
<script>
controlBotones(false);
ResaltarBotones();
document.getElementById("PanEquipo_outer").style.visibility = 'hidden';
</script>
