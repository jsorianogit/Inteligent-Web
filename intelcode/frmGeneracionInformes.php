<?php
session_start();
    //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("/line/line.inc.php");
        use_unit("/editdate/editdate.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require("mysql.inc.php");
        //Class definition
        class FrmGeneracionInformes extends Page
        {
               public $btnrecxcon = null;
               public $sFormato = null;
               public $txtFecha = null;
               public $cmdSinGenerar = null;
               public $cmdSinTerminar = null;
               public $cmdGeneradas = null;
               public $cmdAdicionales = null;
               public $cmdTerminadas = null;
               public $GroupBox5 = null;
               public $Panel2 = null;
               public $RadioGroup1 = null;
               public $cmbEstimacion = null;
               public $GroupBox1 = null;
               public $Label8 = null;
               public $cmbOrden = null;
               public $cmbFiltro = null;
               public $cmbNumeroOrden = null;
               public $cmdEquipo = null;
               public $cmdPersonal = null;
               public $cmdGeneracionxTrinomio = null;
               public $cmdGeneracionxEstimacion = null;
               public $cmdSuministro = null;
               public $cmdRetraso = null;
               public $cmdAnexoVsEstimacionesSub = null;
               public $cmdAnexoVsEstimaciones = null;
               public $cmdAnexoVsGenerado = null;
               public $cmdReportadoVsGenerado = null;
               public $cmdStatus = null;
               public $Label4 = null;
               public $Label3 = null;
               public $Label2 = null;
               public $Label1 = null;
               public $Label7 = null;
               public $GroupBox4 = null;
               public $Label5 = null;
               public $GroupBox3 = null;
               public $GroupBox2 = null;
               public $Panel1 = null;
            public $Label6 = null;
               function btnrecxconJSClick($sender, $params)
               {
                                global $sContrato;
               ?>
               //Add your javascript code here
                  ruta = "Reportes/recursosxconcepto.php?contrato=<?php echo $sContrato ?>";
                  document.getElementById("Panel2_outer").style.display='none';
                  imprimir(ruta);
                  //var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no");
                  return false;
               <?php

               }


               function cmdSinGenerarJSClick($sender, $params)
               {
               global $sContrato;
               global $sIdConvenioAct;
               ?>
               //Add your javascript code here
                  ruta = "../reporte.php";
                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                  ruta = ruta + "&sIdConvenio=<?php echo $sIdConvenioAct ?>";
                  ruta = ruta + "&dIdFecha=" + date();
                  ruta = ruta + "&sNumeroOrden=" +  numeroOrden();
                  ruta = ruta + "&ordenarPor=" + orden();
                  ruta = ruta + "&filtrarPor=" + filtro();
                  ruta = ruta + "&nombreReporte=anexoVsGenerado_SinGenerar";
                  ruta = ruta + "&sFormato="+document.getElementById("sFormato").value;
                   if(numeroOrden()=="CONTRATO"){
                     ruta = ruta + "&reportesPath=anexoVsGenerado";
                   }
                   else{
                     ruta = ruta + "&reportesPath=anexoVsGeneradoOrden";
                   }
                  document.getElementById("Panel2_outer").style.display='none';
                  imprimir(ruta);
                  //var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no");
                  return false;
               <?php

               }

               function cmdSinTerminarJSClick($sender, $params)
               {
               global $sContrato;
               global $sIdConvenioAct;
               ?>
               //Add your javascript code here
                  ruta = "../reporte.php";
                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                  ruta = ruta + "&sIdConvenio=<?php echo $sIdConvenioAct ?>";
                  ruta = ruta + "&dIdFecha=" + date();
                  ruta = ruta + "&sNumeroOrden=" +  numeroOrden();
                  ruta = ruta + "&ordenarPor=" + orden();
                  ruta = ruta + "&filtrarPor=" + filtro();
                  ruta = ruta + "&nombreReporte=anexoVsGenerado_SinTerminar";
                  ruta = ruta + "&sFormato="+document.getElementById("sFormato").value;
                   if(numeroOrden()=="CONTRATO"){
                     ruta = ruta + "&reportesPath=anexoVsGenerado";
                   }
                   else{
                     ruta = ruta + "&reportesPath=anexoVsGeneradoOrden";
                   }
                  document.getElementById("Panel2_outer").style.display='none';
                  imprimir(ruta);
                  //var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no");
                  return false;
               <?php

               }

               function cmdGeneradasJSClick($sender, $params)
               {
               global $sContrato;
               global $sIdConvenioAct;
               ?>
               //Add your javascript code here
                  ruta = "../reporte.php";
                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                  ruta = ruta + "&sIdConvenio=<?php echo $sIdConvenioAct ?>";
                  ruta = ruta + "&dIdFecha=" + date();
                  ruta = ruta + "&sNumeroOrden=" +  numeroOrden();
                  ruta = ruta + "&ordenarPor=" + orden();
                  ruta = ruta + "&filtrarPor=" + filtro();
                  ruta = ruta + "&nombreReporte=anexoVsGenerado_Generado";
                  ruta = ruta + "&sFormato="+document.getElementById("sFormato").value;
                   if(numeroOrden()=="CONTRATO"){
                     ruta = ruta + "&reportesPath=anexoVsGenerado";
                   }
                   else{
                     ruta = ruta + "&reportesPath=anexoVsGeneradoOrden";
                   }
                  document.getElementById("Panel2_outer").style.display='none';
                  imprimir(ruta);
                  //var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no");
                  return false;
               <?php

               }

               function cmdAdicionalesJSClick($sender, $params)
               {
               global $sContrato;
               global $sIdConvenioAct;
               ?>
               //Add your javascript code here
                  ruta = "../reporte.php";
                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                  ruta = ruta + "&sIdConvenio=<?php echo $sIdConvenioAct ?>";
                  ruta = ruta + "&dIdFecha=" + date();
                  ruta = ruta + "&sNumeroOrden=" +  numeroOrden();
                  ruta = ruta + "&ordenarPor=" + orden();
                  ruta = ruta + "&filtrarPor=" + filtro();
                  ruta = ruta + "&nombreReporte=anexoVsGenerado_Adicionales";
                  ruta = ruta + "&sFormato="+document.getElementById("sFormato").value;
                   if(numeroOrden()=="CONTRATO"){
                     ruta = ruta + "&reportesPath=anexoVsGenerado";
                   }
                   else{
                     ruta = ruta + "&reportesPath=anexoVsGeneradoOrden";
                   }
                  document.getElementById("Panel2_outer").style.display='none';
                  imprimir(ruta);
                  //var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no");
                  return false;
               <?php

               }

               function cmdRetrasoJSClick($sender, $params)
               {

               global $sContrato;
               global $sIdConvenioAct;
               ?>
               //Add your javascript code here
//                  if(document.getElementById("sFormato").value == "xls")
//                     alert("Desafortunadamente este reporte solo puede generarse en Documento PDF !");
//                  ruta = "Acceso/scripts/php/Reportes/generadores_swbs/rpt_PartidasConRetrazo.php";
//                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
//                  ruta = ruta + "&sIdConvenio=<?php echo $sIdConvenioAct ?>";
//                  ruta = ruta + "&dFecha=" + date();
//                  ruta = ruta + "&sNumeroOrden=" +  numeroOrden();
//                  ruta = ruta + "&ordenarPor=" + orden();
//                  ruta = ruta + "&filtrarPor=" + filtro();
//                  ruta = ruta + "&sFormato="+document.getElementById("sFormato").value;
//                  imprimir(ruta);
//                  //var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no");
//                  return false;
                  ruta = "../reporte.php";
                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                  ruta = ruta + "&sIdConvenio=<?php echo $sIdConvenioAct ?>";
                  ruta = ruta + "&dFecha=" + date();
                  ruta = ruta + "&sNumeroOrden=" +  numeroOrden();
                  ruta = ruta + "&ordenarPor=" + orden();
                  ruta = ruta + "&filtrarPor=" + filtro();
                 if( numeroOrden()=="CONTRATO"){
                        ruta = ruta + "&nombreReporte=rptPartidasConRetraso";
                        ruta = ruta + "&reportesPath=rptPartidasConRetraso";
                  }
                  else{
                        ruta = ruta + "&nombreReporte=rptPartidasConRetrasoOrden";
                        ruta = ruta + "&reportesPath=rptPartidasConRetrasoOrden";
                  }

                  ruta = ruta + "&sFormato="+document.getElementById("sFormato").value;
                  imprimir(ruta);
                  //var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no");
                  return false;

               <?php

               }

               function FrmGeneracionInformesJSLoad($sender, $params)
               {

               ?>
               //Add your javascript code here
                  document.getElementById("Panel2_outer").style.display='none';
               <?php

               }

               function cmdAnexoVsGeneradoJSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                  document.getElementById("Panel2_outer").style.display='block';
                  return false;
               <?php

               }

               function cmdTerminadasJSClick($sender, $params)
               {
               global $sContrato;
               global $sIdConvenioAct;
               ?>
               //Add your javascript code here
                  ruta = "../reporte.php";
                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                  ruta = ruta + "&sIdConvenio=<?php echo $sIdConvenioAct ?>";
                  ruta = ruta + "&dIdFecha=" + date();
                  ruta = ruta + "&sNumeroOrden=" +  numeroOrden();
                  ruta = ruta + "&ordenarPor=" + orden();
                  ruta = ruta + "&filtrarPor=" + filtro();
                  ruta = ruta + "&nombreReporte=anexoVsGenerado_Terminadas";
                  ruta = ruta + "&sFormato="+document.getElementById("sFormato").value;

                   if(numeroOrden()=="CONTRATO"){
                     ruta = ruta + "&reportesPath=anexoVsGenerado";
                   }
                   else{
                     ruta = ruta + "&reportesPath=anexoVsGeneradoOrden";
                   }
                  document.getElementById("Panel2_outer").style.display='none';
                  imprimir(ruta);
                  //var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no");
                  return false;
               <?php

               }

               function cmdAnexoVsEstimacionesSubJSClick($sender, $params)
               {
               global $sContrato;
               global $sIdConvenioAct;
               ?>
               //Add your javascript code here
                  var iItemOrden = orden();
                  if(iItemOrden=="ANEXO")iItemOrden="iItemOrden";
                  if(iItemOrden=="PONDERADO")iItemOrden="dPonderado";
                  if(iItemOrden=="UNITARIO")iItemOrden="(dVentaMN * dCantidadAnexo)";

                  ruta = "../reporte.php";
                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                  ruta = ruta + "&sIdConvenio=<?php echo $sIdConvenioAct ?>";
                  ruta = ruta + "&dIdFecha=" + date();
                  ruta = ruta + "&iItemOrden=" + iItemOrden
                  ruta = ruta + "&sFormato="+document.getElementById("sFormato").value;
                 if( numeroOrden()=="CONTRATO"){
                     ruta = ruta + "&sNumeroOrden=<?php echo $sContrato ?>";
                  }
                  else{
                     ruta = ruta + "&sNumeroOrden=" + numeroOrden();
                  }
                   if(numeroOrden()=="CONTRATO"){
                     ruta = ruta + "&reportesPath=anexoVsEstimacionesVsSubcontrato";
                     ruta = ruta + "&nombreReporte=anexoVsEstimacionesVsSubcontrato";
                   }
                   else{
                     ruta = ruta + "&reportesPath=anexoVsEstimacionesVsOrden";
                     ruta = ruta + "&nombreReporte=anexoVsEstimacionesVsSubcontrato";

                   }
                   imprimir(ruta);
                  //var status = window.open(ruta,"_blank","fullscreen=no,menubar=no,status=no,titlebar=no,toolbar=no");
                  return false;
               <?php
               }

               function cmdAnexoVsEstimacionesJSClick($sender, $params)
               {
               global $sContrato;
               global $sIdConvenioAct;
               ?>
               //Add your javascript code here
                  ruta = "../reporte.php";
                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                  ruta = ruta + "&sIdConvenio=<?php echo $sIdConvenioAct ?>";
                  ruta = ruta + "&dIdFecha=" + date();
                  ruta = ruta + "&sFormato="+document.getElementById("sFormato").value;
                 if( numeroOrden()=="CONTRATO"){
                     ruta = ruta + "&sNumeroOrden=<?php echo $sContrato ?>";
                  }
                  else{
                     ruta = ruta + "&sNumeroOrden=" + numeroOrden();
                  }


                  ruta = ruta + "&reportesPath=anexoVsestimaciones";
                  ruta = ruta + "&nombreReporte=anexoVsestimaciones";
                  imprimir(ruta);
                  //var status = window.open(ruta,"_blank","fullscreen=no,menubar=no,status=no,titlebar=no,toolbar=no");
                  return false;
               <?php

               }

               function cmdSuministroJSClick($sender, $params)     {
               global $sContrato;
               global $sIdConvenioAct;
               ?>
               //Add your javascript code here
                  ruta = "../reporte.php";
                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                  ruta = ruta + "&sIdConvenio=<?php echo $sIdConvenioAct ?>";
                  ruta = ruta + "&dIdFecha=" + date();
                  ruta = ruta + "&sFormato="+document.getElementById("sFormato").value;
                 if( numeroOrden()=="CONTRATO"){
                     ruta = ruta + "&sNumeroOrden=<?php echo $sContrato ?>";
                  }
                  else{
                     ruta = ruta + "&sNumeroOrden=" + numeroOrden();
                  }


                  ruta = ruta + "&reportesPath=rptConcentradoSuministro";
                  ruta = ruta + "&nombreReporte=rptConcentradoSuministros";
                  imprimir(ruta);
                  //var status = window.open(ruta,"_blank","fullscreen=no,menubar=no,status=no,titlebar=no,toolbar=no");
                  return false;
               <?php

               }

               function cmdReportadoVsGeneradoJSClick($sender, $params)
               {
               global $sContrato;
               global $sIdConvenioAct;
               ?>
               //Add your javascript code here
                 // ruta = "Acceso/scripts/php/Reportes/generadores_swbs/rpt_reportadoVsGenerado.php";
                 // ruta = ruta + "?contract=<?php echo $sContrato ?>";
                 // ruta = ruta + "&convenio=<?php echo $sIdConvenioAct ?>";
                 // ruta = ruta + "&Fecha=" + date();
                 // ruta = ruta + "&orden=" + numeroOrden();
                 // ruta = ruta + "&ordenar=" + orden();
                 // ruta = ruta + "&filtro=" + filtro();
                 // var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no");
                 // return false;

                  ruta = "../reporte.php";
                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                  ruta = ruta + "&sIdConvenio=<?php echo $sIdConvenioAct ?>";
                  ruta = ruta + "&dIdFecha=" + date();
                  ruta = ruta + "&sFormato="+document.getElementById("sFormato").value;
                  ruta = ruta + "&iItemOrden=iItemOrden";
                 if( numeroOrden()=="CONTRATO"){
                     ruta = ruta + "&nombreReporte=reportadoVSgenerado_contrato";
                  }
                  else{
                     ruta = ruta + "&nombreReporte=reportadoVSgenerado_orden";
                     ruta = ruta + "&sNumeroOrden=" + numeroOrden();
                  }


                  ruta = ruta + "&reportesPath=reportadoVSgenerado";

                  imprimir(ruta);
                  //var status = window.open(ruta,"_blank","fullscreen=no,menubar=no,status=no,titlebar=no,toolbar=no");
                  return false;
               <?php
               }

               function cmdStatusJSClick($sender, $params)
               {
               global $sContrato;
               global $sIdConvenioAct;
               ?>
               //Add your javascript code here
                 //   ruta = "Acceso/scripts/php/Reportes/generadores_swbs/rpt_statusPartida.php";
                 // ruta = ruta + "?contract=<?php echo $sContrato ?>";
                 // ruta = ruta + "&convenio=<?php echo $sIdConvenioAct ?>";
                 // ruta = ruta + "&Fecha=" + date();
                 // ruta = ruta + "&orden=" +  numeroOrden();
                 // ruta = ruta + "&ordenar=" + orden();
                 // ruta = ruta + "&filtro=" + filtro();

                 // var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no");
                 // return false;

                  ruta = "../reporte.php";
                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                  ruta = ruta + "&sIdConvenio=<?php echo $sIdConvenioAct ?>";
                  ruta = ruta + "&dIdFecha=" + date();
                  ruta = ruta + "&sFormato="+document.getElementById("sFormato").value;
                  ruta = ruta + "&iItemOrden=iItemOrden";
                 if( numeroOrden()=="CONTRATO"){
                     ruta = ruta + "&nombreReporte=statusConceptos_contrato";
                  }
                  else{
                     ruta = ruta + "&nombreReporte=statusConceptos_orden";
                     ruta = ruta + "&sNumeroOrden=" + numeroOrden();
                  }


                  ruta = ruta + "&reportesPath=statusConceptos";

                  imprimir(ruta);
                  //var status = window.open(ruta,"_blank","fullscreen=no,menubar=no,status=no,titlebar=no,toolbar=no");
                  return false;
               <?php

               }

               function dumpJavascript(){
                  echo "
                     \rfunction date(){return document.getElementById(\"f-calendar-field-1\").value;}
                     \rfunction numeroOrden(){return document.getElementById(\"cmbNumeroOrden\").value;}
                     \rfunction filtro(){return document.getElementById(\"cmbFiltro\").value;}
                     \rfunction orden(){return document.getElementById(\"cmbOrden\").value;}
                     \rfunction estimacion(){return document.getElementById(\"cmbEstimacion\").value;}
                     \rfunction cantidad(){return document.getElementById(\"RadioGroup1_0\").checked;}
                     \rfunction costo(){return document.getElementById(\"RadioGroup1_1\").checked;}\n\n
                     \rfunction imprimir(ruta){
                        var status = window.open(ruta,\"_blank\",\"fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=nom,resizable =yes,location=no\");

                     }\n\n"  ;

               }
               function cmdEquipoJSClick($sender, $params)
               {
               global $sContrato;
               global $sIdConvenioAct;
               ?>
               //Add your javascript code here
                  ruta = "../reporte.php";
                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                  ruta = ruta + "&sIdConvenio=<?php echo $sIdConvenioAct ?>";
                  ruta = ruta + "&dIdFecha=" + date();
                  ruta = ruta + "&sNumeroOrden=" +  numeroOrden();
                  ruta = ruta + "&ordenarPor=" + orden();
                  ruta = ruta + "&filtrarPor=" + filtro();
                  ruta = ruta + "&reportesPath=equipoProgReal";
                  ruta = ruta + "&libsVersion=2.0.3";
                  ruta = ruta + "&sFormato="+document.getElementById("sFormato").value;
                  if(cantidad()){
                     ruta = ruta + "&nombreReporte=eqipoRealCantI";
                  }
                  if(costo()){
                     ruta = ruta + "&nombreReporte=eqipoRealCostoI";
                  }
                  imprimir(ruta);
                  //var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no");
                  return false;
               <?php

               }

               function cmdPersonalJSClick($sender, $params)
               {


               //Add your javascript code here

               global $sContrato;
               global $sIdConvenioAct;
               ?>
               //Add your javascript code here
                  ruta = "../reporte.php";
                  ruta = ruta + "?sContrato=<?php echo $sContrato ?>";
                  ruta = ruta + "&sIdConvenio=<?php echo $sIdConvenioAct ?>";
                  ruta = ruta + "&dIdFecha=" + date();
                  ruta = ruta + "&sNumeroOrden=" +  numeroOrden();
                  ruta = ruta + "&ordenarPor=" + orden();
                  ruta = ruta + "&filtrarPor=" + filtro();
                  ruta = ruta + "&reportesPath=personalProgReal";
                  ruta = ruta + "&libsVersion=2.0.3";
                  ruta = ruta + "&sFormato="+document.getElementById("sFormato").value;
                  if(cantidad()){
                     ruta = ruta + "&nombreReporte=personalRealCantI";
                  }
                  if(costo()){
                     ruta = ruta + "&nombreReporte=personalRealCostoI";
                  }
                  imprimir(ruta);
                  //var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no");
                  return false;
               <?php

               }


               function FrmGeneracionInformesBeforeShow($sender, $params)
               {
                  global $sContrato;
                  //mysql_connect("localhost","root","danae");
                  //mysql_select_db("intelcode");

                  #cargar el combo de numeros de ordenes
                  $sql = "select sNumeroOrden from ordenesdetrabajo where sContrato='$sContrato' order by sNumeroOrden";
                  $rs = mysql_query($sql);
                  $orden['CONTRATO'] = "CONTRATO No. $sContrato";
                  while($row = mysql_fetch_array($rs)){
                     $orden[$row['sNumeroOrden']] = $row['sNumeroOrden'];
                     $this->cmbNumeroOrden->setItems($orden);
                  }

                  #cargar el combo de numero de estimaciones
                  $sql = "select iNumeroEstimacion from estimacionperiodo where sContrato='$sContrato' ;";
                  $rs = mysql_query($sql);
                  while($row = mysql_fetch_array($rs)){
                     $Estimaciones[$row['iNumeroEstimacion']] = $row['iNumeroEstimacion'];
                     $this->cmbEstimacion->setItems($Estimaciones);
                  }

                  #poner la fecha por default
                  $this->txtFecha->Text=date('Y-m-d');

               }



        }
        //$sContrato='428237819';
        //global $sContrato;
        global $application;

        global $FrmGeneracionInformes;

        //Creates the form
        $FrmGeneracionInformes=new FrmGeneracionInformes($application);

        //Read from resource file
        $FrmGeneracionInformes->loadResource(__FILE__);

        //Shows the form
        $FrmGeneracionInformes->show();

?>
<script>
document.getElementById("Panel2_outer").style.display='none';
</script>
