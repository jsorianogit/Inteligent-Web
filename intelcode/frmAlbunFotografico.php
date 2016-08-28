<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("buttons.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require_once("Modulos/include/mysql.inc.php");
        //Class definition
        class frmAlbunFotografico extends Page
        {
               public $cmdPersonal = null;
               public $cmdReportesDiarios = null;
               public $cmdTiempos = null;
               public $cmdFotografico = null;
               public $cmbOrdenTiempos = null;
               public $cmbOrdenDiarios = null;
               public $Label10 = null;
               public $listaNumeroOrden = null;
               public $CheckBox3 = null;
               public $CheckBox2 = null;
               public $CheckBox1 = null;
               public $chkTiemposMuertos = null;
               public $chkPorContrato = null;
               public $Label9 = null;
               public $Label8 = null;
               public $Label7 = null;
               public $optReportesDiarios = null;
               public $Label6 = null;
               public $Label5 = null;
               public $Label4 = null;
               public $FechaFinal = null;
               public $FechaInicio = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Panel1 = null;
               public $Label1 = null;
               public $PageControl1 = null;


               function cmdFotograficoJSClick($sender, $params)
               {
               global $sContrato;
               global $_SESSION;
               ?>
               //Add your javascript code here
                var url ="";
                if(listaOrdenes() == ""){ alert("Seleccione por lo menos un Numero de Orden!");return false;}

                ur = "Acceso/scripts/php/Reportes/generadores_swbs/rptReporteFotografico.php";
                 ur = ur + "?lista=" + listaOrdenes() ;
                 ur = ur + "&FechaInicio=" + finicio();
                 ur = ur + "&FechaFinal=" + ffinal();
                 ur = ur + "&sIdTurno=" + "<?php echo $_SESSION['ssIdTurno']; ?>";
                 ur = ur + "&sContrato=" + "<?php echo $sContrato; ?>";
                 ur = ur + "&sIdConvenio=" + "<?php echo $_SESSION['ssIdConvenio']; ?>";
                 var status = window.open(ur,"_blank","fullscreen=no,menubar=no,status=no,titlebar=no,toolbar=no,scroolbar=yes");
                 return false;
               <?php

               }


               function dumpJavascript(){
                  echo "
                     function navegador(){
                        var navegador = navigator.appName
                        if (navegador == \"Microsoft Internet Explorer\")
                           return 'e';
                        else
                           return 'f';
                     }

                     \rfunction finicio(){
                        if(navegador()=='f') {
                           var fInicio = document.getElementsByName(\"FechaInicio\")[0].value;
                        }
                        else
                           var fInicio = document.getElementById(\"FechaInicio\").value;
                        return fInicio;
                     }
                     \rfunction ffinal(){
                        if(navegador()=='f')
                           var fFinal = document.getElementsByName(\"FechaFinal\")[0].value;
                        else
                           var fFinal = document.getElementById(\"FechaFinal\").value;
                        return fFinal;
                     }
                     \rfunction listaOrdenes(){
                        var lista = \"\";
                        for (i=0; i < document.getElementById('listaNumeroOrden[]').length; i++)
                        {
                           if (document.getElementById('listaNumeroOrden[]').options[i].selected)
                           {
                              if(lista==\"\")
                              lista = document.getElementById('listaNumeroOrden[]').options[i].value;
                              else
                              lista = lista + \"*\" + document.getElementById('listaNumeroOrden[]').options[i].value;
                           }
                        }
                        return lista;
                     }
                     "  ;
               }
               function frmAlbunFotograficoShow($sender, $params)
               {
                  global $sContrato;
                  $sql = " select sNumeroOrden from ordenesdetrabajo
                           where sContrato='$sContrato'
                           order by sNumeroOrden ";
                  $rs = mysql_query($sql);
                  $i = 0;
                  while($row = mysql_fetch_array($rs)){
                     $it[$row[0]]=$row[0];
                     $lista[$i]=$row[0];
                     $this->cmbOrdenDiarios->setItems($it);
                     $this->cmbOrdenTiempos->setItems($it);
                     $i++;
                  }
                  $this->listaNumeroOrden->setItems($it);
                  $this->FechaFinal->Text = date("d/m/Y");
                  $this->FechaInicio->Text = date("d/m/Y");


               }

        }

        global $application;

        global $frmAlbunFotografico;

        //Creates the form
        $frmAlbunFotografico=new frmAlbunFotografico($application);

        //Read from resource file
        $frmAlbunFotografico->loadResource(__FILE__);

        //Shows the form
        $frmAlbunFotografico->show();

?>
