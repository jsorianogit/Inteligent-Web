<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
       // require("mysql.inc.php");
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
        //Class definition
        class frmFichaTecnica extends Page
        {
               public $cmdRefresca = null;
               public $Label7 = null;
               public $Label6 = null;
               public $Image2 = null;
               public $Image1 = null;
               public $txtLink = null;
               public $txtReferencia = null;
               public $txtPartida = null;
               public $memoPartida = null;
               public $memoDescripcion = null;
               public $Carga2 = null;
               public $Carga1 = null;
               public $QryFicha = null;
               public $SourFicha = null;
               public $Label5 = null;
               public $HiOpcion = null;
               public $HiConsecutivo = null;
               public $base = null;
               public $cmdImprimir = null;
               public $cmdCancelar = null;
               public $cmdAceptar = null;
               public $cmdEliminar = null;
               public $cmdModificar = null;
               public $cmdAgregar = null;
               public $Panel1 = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;

               function cmdRefrescaJSClick($sender, $params)
               {
               ?>               //Add your javascript code here

               <?php
               }

               function cmdRefrescaJSMouseMove($sender, $params)
               {
               ?>               //Add your javascript code here

               <?php
               }

               function cmdRefrescaJSMouseOut($sender, $params)
               {
               ?>                 //Add your javascript code here

               <?php
               }


               function memoPartidaJSFocus($sender, $params)
               {
               ?>                 //Add your javascript code here
                    document.getElementById("Image1").src ="";
                    document.getElementById("Image2").src ="";
                    params = document.getElementById("txtPartida").value;
                     <?php
                         echo $this->memoPartida->ajaxCall("Partida",array(),array("memoPartida","txtPartida","Image1","Image2","txtLink","txtReferencia","memoDescripcion"));
                     ?>
                    return false;
               <?php
               }

               function Partida($sender="",$params="")
               {
                   global $sContrato,$sIdConvenio;
                   global $Connection;

                   $Partida =$params;
                   $this->memoDescripcion->Text = "";
                   $this->txtLink->Text         = "";
                   $this->txtReferencia->Text   = "";

                   $this->Image1->setDataField("bImagen");
                   $this->Image1->setDataSource("SourFicha");
                   $this->Image2->setDataField("bImagenAux");
                   $this->Image2->setDataSource("SourFicha");

                   $sql = "select '' as bImagen, '' as bImagenAux from estimaciones";
                   $this->QryFicha->setActive(false);
                   $this->QryFicha->setSQL($sql);
                   $this->QryFicha->setActive(true);

                   $sql=" select f.sReferencia, f.mComentarios, f.sLink,
                                 f.bImagen, f.bImagenAux,
                                 a.mDescripcion
                          from actividadesxanexo a
                          left join fichatecnica f
                          on(    a.sContrato        = f.sContrato
                             and a.sNumeroActividad = f.sNumeroActividad)
                          where a.sContrato       = '". $Connection->global_sContrato ."'
                                and a.sIdConvenio = '". $Connection->global_sIdConvenio ."'
                                and a.sNumeroActividad = '$Partida'";
                   $rs = mysql_query($sql);
                   $Imagen1 = null;
                   $Imagen2 = null;
                   $row = mysql_fetch_array($rs);
                   $Referencia   = $row['sReferencia'];
                   $Comentarios  = $row['mComentarios'];
                   $Link         = $row['sLink'];
                   $Descripcion  = $row['mDescripcion'];
                   $Imagen1      = $row['bImagen'];
                   $Imagen2      = $row['bImagenAux'];

                   if ($Imagen1<>null or $Imagen2<> null)
                   {   $this->QryFicha->setActive(false);
                       $this->QryFicha->setSQL($sql);
                       $this->QryFicha->setActive(true);
                   }
                   $this->memoPartida->Text     = $Descripcion;
                   $this->memoDescripcion->Text = $Comentarios;
                   $this->txtLink->Text         = $Link;
                   $this->txtReferencia->Text   = $Referencia;
               }


               function Carga2JSClick($sender, $params)
               {
               ?>               //Add your javascript code here
                   alert ("No se Puede cargar la Imagen.. !!!");
                   document.getElementById("Carga2").value = "";
                   return false;
               <?php
               }

               function Carga1JSClick($sender, $params)
               {
               ?>                //Add your javascript code here
                   alert ("No se Puede cargar la Imagen.. !!!");
                   document.getElementById("Carga1").value = "";
                   return false;
               <?php

               }

               function frmFichaTecnicaBeforeShow($sender, $params)
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
//                  $Connection->base->setConnected(false);
//                  $Connection->base->setConnected(true);
$Connection->conectar();
               }

               function cmdAceptarJSClick($sender, $params)
               {
               ?>                //Add your javascript code here
                    return true;
               <?php
               }

               function cmdAceptarClick($sender, $params)
               {    global $sContrato;
                    global $Connection ;
                    $Actividad   = $this->txtPartida->Text;
                    $Referencia  = $this->txtReferencia->Text;
                    $Descripcion = $this->memoDescripcion->Text;
                    $Link        = $this->txtLink->Text;
                    $Opcion      = $this->HiOpcion->Value;

                    if ($Opcion == "Agregar")
                    {   $sql = "insert
                                 into fichatecnica
                                      (sContrato,
                                       sNumeroActividad,
                                       sReferencia,
                                       mComentarios,
                                       sLink)
                                 values
                                      ('". $Connection->global_sContrato ."',
                                       '$Actividad',
                                       '$Referencia',
                                       '$Descripcion',
                                       '$Link')";
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
                        $sql = "update fichatecnica
                                set
                                   sReferencia  = '$Referencia',
                                   mComentarios = '$Descripcion',
                                   sLink        = '$Link'
                                where
                                       sContrato        = '". $Connection->global_sContrato ."'
                                   and sNumeroActividad = '$Actividad'";
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
                    actividad = document.getElementById("txtPartida").value;
                    descripcion = document.getElementById("memoPartida").value;
                    ok=0;
                    if (actividad == "" || descripcion == "")
                        return false;
                    if (!confirm("  Desea ELIMINAR La Ficha Tecnica de la Actividad Seleccionada ?"))
                        ok = 1;
                    if (ok == 1)
                    {   return false;
                    }else
                    {  document.getElementById("txtLink").value = "";
                       document.getElementById("txtReferencia").value = "";
                       document.getElementById("memoDescripcion").value = "";
                       return true;
                    }
               <?php
               }

               function cmdEliminarClick($sender, $params)
               {   global $sContrato;
                    global $Connection;
                   $Consecutivo = $this->HiConsecutivo->Value;
                   $Actividad   = $this->txtPartida->Text;
                   $sql = "delete from fichatecnica
                           where     sContrato        = '". $Connection->global_sContrato ."'
                                 and sNumeroActividad = '$Actividad'";
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
                    actividad   = document.getElementById("txtPartida").value;
                    descripcion = document.getElementById("memoPartida").value;
                    if (actividad == "" || descripcion == "")
                        return false;
                   controlBotones(true);
                   document.getElementById("txtReferencia").focus();
                   document.getElementById("HiOpcion").value        = "Modificar";
                   return false;
               <?php
               }


               function cmdAgregarJSClick($sender, $params)
               {
               ?>              //Add your javascript code here
                 actividad   = document.getElementById("txtPartida").value;
                 descripcion = document.getElementById("memoPartida").value;
                 if (actividad == "" || descripcion == "")
                     return false;
                 Referencia  = document.getElementById("txtReferencia").value;
                 Liga        = document.getElementById("txtLink").value;
                 Descripcion = document.getElementById("memoDescripcion").value;
                 if (Liga!="" && Referencia!="" && Descripcion !="")
                 {   return false;
                 }else
                      {  controlBotones(true);
                         document.getElementById("HiOpcion").value = "Agregar";
                         document.getElementById("txtReferencia").focus();
                      }
                 return false;
               <?php
               }

               function cmdImprimirJSClick($sender, $params)
               {
                global $sContrato,$sIdConvenioAct;
                global $Connection ;
               ?>                //Add your javascript code here
                     actividad   = document.getElementById("txtPartida").value;
                     descripcion = document.getElementById("memoPartida").value;
                     if (actividad == "" || descripcion == "")
                         return false;
                     ruta = "../reporte.php";
                     ruta = ruta + "?sContrato=<?php echo $Connection->global_sContrato ?>";
                     ruta = ruta + "&sConvenio=<?php echo $Connection->global_sIdConvenio ?>";
                     ruta = ruta + "&sNumeroActividad="+actividad;
                     ruta = ruta + "&reportesPath=Ficha_Tecnica";
                     ruta = ruta + "&nombreReporte=rptFicha_Tecnica";
                     var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no");
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
                        document.getElementById("txtReferencia").disabled =accion;
                        document.getElementById("txtLink").disabled = accion;
                        document.getElementById("memoPartida").disabled = false;
                        document.getElementById("memoDescripcion").disabled =accion;
                        document.getElementById("Carga1").disabled =accion;
                        document.getElementById("Carga2").disabled =accion;
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
                          document.getElementById("txtPozo").style.backgroundColor = "";
                          document.getElementById("txtDescripcion").style.backgroundColor = "";
                          document.getElementById("txtEquipo").style.backgroundColor = "";
                          document.getElementById("cmdAgregar").style.backgroundColor = "";
                          document.getElementById("cmdModificar").style.backgroundColor = "";
                          document.getElementById("cmdEliminar").style.backgroundColor = "";
                          document.getElementById("cmdAceptar").style.backgroundColor = "";
                          document.getElementById("cmdCancelar").style.backgroundColor = "";
                          document.getElementById("cmdImprimir").style.backgroundColor = "";
                          document.getElementById("Carga1").style.backgroundColor = "";
                          document.getElementById("Carga2").style.backgroundColor = "";
                          document.getElementById("memoPartida").style.backgroundColor = "";
                          document.getElementById("memoDescripcion").style.backgroundColor = "";
                          return false;
                      }';

               }


               function txtLinkJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtLinkJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtLinkJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtReferenciaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtReferenciaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtReferenciaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtPartidaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtPartidaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtPartidaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

                function memoDescripcionJSKeyPress($sender, $params)
               {
               ?>               //Add your javascript code here

               <?php
               }

               function memoDescripcionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function memoDescripcionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function Carga2JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function Carga2JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function Carga2JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function Carga1JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function Carga1JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function Carga1JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function memoPartidaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function memoPartidaJSBlur($sender, $params)
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

        global $frmFichaTecnica;

        //Creates the form
        $frmFichaTecnica=new frmFichaTecnica($application);

        //Read from resource file
        $frmFichaTecnica->loadResource(__FILE__);

        //Shows the form
        $frmFichaTecnica->show();

?>
<script>
controlBotones(false);
ResaltarBotones();
document.getElementById("Image1").src ="";
document.getElementById("Image2").src ="";
</script>
