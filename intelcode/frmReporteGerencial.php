<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require_once("Modulos/include/mysql.inc.php");
        //Class definition
        class frmReporteGerencial extends Page
        {
               public $Label7 = null;
               public $txtFecha = null;
               public $Label6 = null;
               public $Label1 = null;
               public $Label5 = null;
               public $Label2 = null;
               public $cmbOrden = null;
               public $Label3 = null;
               public $memoRelevantes = null;
               public $Label4 = null;
               public $memoProblematicas = null;
               public $Button2 = null;
               public $cmdImprimirGerencial = null;
               public $listaOrdenes = null;
               public $Panel1 = null;
               function dumpJavascript(){
                  echo "
                     function navegador(){
                        var navegador = navigator.appName
                        if (navegador == \"Microsoft Internet Explorer\")
                           return 'e';
                        else
                           return 'f';
                     }

                     \rfunction fecha(){
                        if(navegador()=='f') {
                           var fecha = document.getElementsByName(\"txtFecha\")[0].value;
                        }
                        else
                           var fecha = document.getElementById(\"txtFecha\").value;
                        return fecha;
                     }
                     \rfunction listaOrden(){
                        var lista = \"\";

                        for (i=0; i < document.getElementById('listaOrdenes[]').length; i++)
                        {   //alert(lista);
                           if (document.getElementById('listaOrdenes[]').options[i].selected)
                           {
                              if(lista==\"\")
                              lista = document.getElementById('listaOrdenes[]').options[i].value;
                              else
                              lista = lista + \",\" + document.getElementById('listaOrdenes[]').options[i].value;
                           }
                        }

                        return lista;
                     }
                     "  ;
               }
               function cmdImprimirGerencialJSClick($sender, $params)
               {
               global $sContrato;
               global $_SESSION;
               ?>
               //Add your javascript code here
                var url ="";

                if(listaOrden() == ""){ alert("Seleccione por lo menos un Numero de Orden!");return false;}
                ur = "Acceso/scripts/php/Reportes/generadores_swbs/rpt_Gerencial.php";
                ur = ur + "?lista=" + listaOrden() ;
                ur = ur + "&dFecha=" + fecha();
                ur = ur + "&sIdTurno=" + "<?php echo $_SESSION['ssIdTurno']; ?>";
                ur = ur + "&sContrato=" + "<?php echo $sContrato; ?>";
                ur = ur + "&sIdConvenio=" + "<?php echo $_SESSION['ssIdConvenio']; ?>";
                var status = window.open(ur,"_blank","fullscreen=no,menubar=no,status=no,titlebar=no,toolbar=no,scroolbar=yes");
                return false;
               <?php

               }

               function frmReporteGerencialShow($sender, $params)
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
                     $this->cmbOrden->setItems($it);
                     $i++;
                  }
                  $this->listaOrdenes->setItems($it);
                  $this->txtFecha->Text = date("d/m/Y");


               }

               function cmdIrFotograficoJSClick($sender, $params)
               {

               ?>
               document.location.href="frmAlbumFotografico.php";
                return false;
               <?php

               }

        }

        global $application;

        global $frmReporteGerencial;

        //Creates the form
        $frmReporteGerencial=new frmReporteGerencial($application);

        //Read from resource file
        $frmReporteGerencial->loadResource(__FILE__);

        //Shows the form
        $frmReporteGerencial->show();

?>
