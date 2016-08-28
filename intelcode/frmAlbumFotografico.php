<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
      //  use_unit("buttons.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require_once("Modulos/include/mysql.inc.php");
        require_once("fnUtilerias.php");
        //Class definition
        class frmAlbumFotografico extends Page
        {
               public $cmdPersonal = null;
               public $cmdTiempos = null;
               public $CheckBox3 = null;
               public $CheckBox2 = null;
               public $CheckBox1 = null;
               public $Label14 = null;
               public $cmdFotografico = null;
               public $listaNumeroOrden = null;
               public $Label15 = null;
               public $Label16 = null;
               public $Label7 = null;
               public $FechaInicio = null;
               public $Label8 = null;
               public $Label9 = null;
               public $FechaFinal = null;
               public $cmdReportesDiarios = null;
               public $Label10 = null;
               public $Label11 = null;
               public $cmbOrdenDiarios = null;
               public $optReportesDiarios = null;
               public $Label12 = null;
               public $Label13 = null;
               public $cmbOrdenTiempos = null;
               public $chkTiemposMuertos = null;
               public $chkPorContrato = null;
               public $Panel1 = null;
               function cmdTiemposJSClick($sender, $params)
               {

               global $sContrato;
               global $_SESSION;
               ?>
               //Add your javascript code here
                var url ="";
                var ordenSeleccionada="";
                ordenSeleccionada = document.getElementById("cmbOrdenTiempos").value;

                ur = "Acceso/scripts/php/Reportes/generadores/rptTiemposMuertos.php";
                 ur = ur + "?ordenSeleccionada=" + ordenSeleccionada ;
                 ur = ur + "&fechaIni=" + finicio();
                 ur = ur + "&fechaTerm=" + ffinal();
                 ur = ur + "&sIdTurno=" + "<?php echo $_SESSION['ssIdTurno']; ?>";
                 ur = ur + "&sContrato=" + "<?php echo $sContrato; ?>";
                 ur = ur + "&sIdConvenio=" + "<?php echo $_SESSION['ssIdConvenio']; ?>";
                 ur = ur + "&ordenSeleccionada=" + ordenSeleccionada
                 var status = window.open(ur,"_blank","fullscreen=no,menubar=no,status=no,titlebar=no,toolbar=no,scroolbar=yes");
                 return false;
               <?php

               }

               function cmdIrGerencialJSClick($sender, $params)
               {

               ?>
               //alert("frmReporteGerencial.php");
               document.location.href="./frmReporteGerencial.php";
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

               function frmAlbumFotograficoShow($sender, $params)
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

        global $frmAlbumFotografico;

        //Creates the form
        $frmAlbumFotografico=new frmAlbumFotografico($application);

        //Read from resource file
        $frmAlbumFotografico->loadResource(__FILE__);

        //Shows the form
        $frmAlbumFotografico->show();

?>
