<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        require("mysql.inc.php");
        use_unit("dbgrids.inc.php");
        use_unit("db.inc.php");
        use_unit("dbtables.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");

        //Class definition
        class Unit1 extends Page
        {
               public $cmdRegresar = null;
               public $DbgAux = null;
               public $QryAux = null;
               public $DtaAux = null;
               public $ChkNombre = null;
               public $ChkFecha = null;
               public $ChkProductos = null;
               public $ChkFolio = null;
               public $txtBuscar = null;
               public $DbgSolicitud = null;
               public $base = null;
               public $DtaSolicitud = null;
               public $QrySolicitud = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;
               function DbgSolicitudJSDblClick($sender, $params)
               {
               ?>
                  //Add your javascript code here
                  i = DbgSolicitud.getTableModel().getValue(0, DbgSolicitud.getFocusedRow());
                  document.getElementById("ChkFolio").checked = true;
                  document.getElementById("ChkProductos").checked = false;
                  document.getElementById("ChkFecha").checked = false;
                  document.getElementById("ChkNombre").checked = false;
                  document.getElementById("txtBuscar").value = i;
                  var texto = i;
                  MuestraCatalogo(texto);
                  return false;
               <?php
               }

               function cmdRegresarJSClick($sender, $params)
               {
               ?>
                  //Add your javascript code here
                  document.location.href='frmSalidasAlmacen.php';
                  return false;
               <?php
               }


               function Unit1BeforeShow($sender, $params)
               {
                  global $sContrato;
                  global $_SESSION,$Usuario,$Clave,$Servidor;

                  $this->base->setConnected(false);
                  $this->base->setDatabaseName($_SESSION['database']);
                  $this->base->setUserName($Usuario);
                  $this->base->setUserPassword($Clave);
                  $this->base->setHost($Servidor);
                  $this->base->setConnected(true);

                  $sql = "select
                           a.sIdSolicitud,
                           date_format(a.dFechaSolicitud,'%d/%m/%Y') as dFechaSolicitud,
                           p.sIdInsumo,
                           p.iItem,
                           p.mDescripcion,
                           format(p.dCantidad,2) as dCantidad,
                           u.sNombre as Usuario
                         from anexo_solicitud a
                           inner join anexo_psolicitud p
                           on (a.sIdsolicitud = p.sIdSolicitud)
                           left join usuarios u
                           on (u.sIdUsuario = a.sIdUsuarioCreador)
                         where a.sContrato = '$sContrato'";

                  $this->QryAux->setActive(false);
                  $this->QryAux->setSQL($sql);
                  $this->QryAux->setActive(true);

                  $sql ="select * from anexo_solicitud where sContrato = 'ivanvanvan'";

                  $this->QrySolicitud->setActive(false);
                  $this->QrySolicitud->setSQL($sql);
                  $this->QrySolicitud->setActive(true);



               }

               function txtBuscarJSKeyUp($sender, $params)
               {
               ?>
                 //Add your javascript code here
                 if(event.keyCode>47)
                 {   var texto = document.getElementById("txtBuscar").value.toUpperCase();
                     MuestraCatalogo(texto);
                     return false;
                  }
               <?php
               }

               function ChkNombreJSChange($sender, $params)
               {
               ?>
                 //Add your javascript code here
                  if (document.getElementById("ChkNombre").checked == true)
                  {   document.getElementById("ChkFecha").checked = false;
                      document.getElementById("ChkProductos").checked = false;
                      document.getElementById("ChkFolio").checked = false;
                  }
                  return false;
               <?php
               }

               function ChkFechaJSChange($sender, $params)
               {
               ?>
                 //Add your javascript code here
                  if (document.getElementById("ChkFecha").checked == true)
                  {   document.getElementById("ChkNombre").checked = false;
                      document.getElementById("ChkProductos").checked = false;
                      document.getElementById("ChkFolio").checked = false;
                  }
                  return false;
               <?php
               }

               function ChkProductosJSChange($sender, $params)
               {
               ?>
                  //Add your javascript code here
                  if (document.getElementById("ChkProductos").checked == true)
                  {   document.getElementById("ChkNombre").checked = false;
                      document.getElementById("ChkFecha").checked = false;
                      document.getElementById("ChkFolio").checked = false;
                  }
                  return false;
               <?php
               }

               function ChkFolioJSChange($sender, $params)
               {
               ?>
                 //Add your javascript code here
                  if (document.getElementById("ChkFolio").checked == true)
                  {   document.getElementById("ChkProductos").checked = false;
                      document.getElementById("ChkFecha").checked = false;
                      document.getElementById("ChkNombre").checked = false;
                  }
                  return false;
               <?php
               }

               function dumpJavascript()
               {
                     echo 'function ResaltarBotones()
                     {
                           document.getElementById("ChkFolio").style.backgroundColor = "";
                           document.getElementById("ChkProductos").style.backgroundColor = "";
                           document.getElementById("ChkFecha").style.backgroundColor = "";
                           document.getElementById("ChkNombre").style.backgroundColor = "";
                           document.getElementById("txtBuscar").style.backgroundColor = "";
                           document.getElementById("cmdRegresar").style.backgroundColor = "";
                           return false;
                     }';

                     echo 'function MuestraCatalogo(letras)
                     {
                           var total = letras.length;
                           var totalFilas = DbgAux.getTableModel().getRowCount();
                           var _rowData = [];
                           _rowData.push(["","","","","",""]);
                           var _oData = rowData;
                           DbgSolicitud.getTableModel().originalData=_oData;
                           DbgSolicitud.getTableModel().setData(_rowData);

                           var rowData = [];
                           for (i=0;i<totalFilas;i++)
                           {   if (document.getElementById("ChkFolio").checked == true )
                                   palabra= DbgAux.getTableModel().getValue(0,i);
                               if (document.getElementById("ChkFecha").checked == true )
                                   palabra= DbgAux.getTableModel().getValue(1,i);
                               if (document.getElementById("ChkProductos").checked == true )
                                   palabra= DbgAux.getTableModel().getValue(4,i);
                               if (document.getElementById("ChkNombre").checked == true )
                                   palabra= DbgAux.getTableModel().getValue(6,i);
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
                                  var sSolicitud = DbgAux.getTableModel().getValue(0,i);
                                  var sFecha = DbgAux.getTableModel().getValue(1,i);
                                  var sInsumo = DbgAux.getTableModel().getValue(2,i);
                                  var sItem = DbgAux.getTableModel().getValue(3,i);
                                  var sDescripcion =  DbgAux.getTableModel().getValue(4,i);
                                  var sCantidad =  DbgAux.getTableModel().getValue(5,i);
                                  var sUsuario =  DbgAux.getTableModel().getValue(6,i);
                                  rowData.push([sSolicitud,sFecha,sInsumo,sItem,sDescripcion,sCantidad,sUsuario]);
                                  var oData = rowData;
                                  DbgSolicitud.getTableModel().originalData=oData;
                                  DbgSolicitud.getTableModel().setData(rowData);
                               }

                           }
                           return false;
                       }';

               }

               function txtBuscarJSClick($sender, $params)
               {
               ?>
                 //Add your javascript code here

                  return false;
                <?php

               }

               function ChkNombreJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function ChkNombreJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function ChkNombreJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function ChkFechaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function ChkFechaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function ChkFechaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function ChkProductosJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function ChkProductosJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function ChkProductosJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function ChkFolioJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function ChkFolioJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function ChkFolioJSBlur($sender, $params)
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
                  var _rowData = [];
                  _rowData.push(['','','','','','','']);
                  var _oData = rowData;
                  DbgSolicitud.getTableModel().originalData=_oData;
                  DbgSolicitud.getTableModel().setData(_rowData);
                  return false;
               <?php

               }

               function txtBuscarJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function Edit1JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function Edit1JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function Edit1JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

        }

        global $application;

        global $Unit1;

        //Creates the form
        $Unit1=new Unit1($application);

        //Read from resource file
        $Unit1->loadResource(__FILE__);

        //Shows the form
        $Unit1->show();

?>
<script>
ResaltarBotones();
</script>
