<?php
//Includes
//require_once("vcl/vcl.inc.php");
require_once("rpcl/rpcl.inc.php");
use_unit("comctrls.inc.php");
use_unit("auth.inc.php");
use_unit("db.inc.php");
use_unit("dbtables.inc.php");
use_unit("dbgrids.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
//require("mysql.inc.php");
require("fnContrato.php");
require("fnUtilerias.php");
require("Connection.php");
//Class definition
class FrmGeneradorBarco extends Page
{
   public $RadioButton21 = null;
   public $RadioButton20 = null;
   public $RadioButton19 = null;
   public $RadioButton18 = null;
   public $RadioButton17 = null;
   public $RadioButton16 = null;
   public $RadioButton15 = null;
   public $RadioButton14 = null;
   public $RadioButton13 = null;
   public $RadioButton12 = null;
   public $RadioButton11 = null;
   public $RadioButton10 = null;
   public $RadioButton9 = null;
   public $RadioButton8 = null;
   public $RadioButton7 = null;
   public $RadioButton6 = null;
   public $RadioButton5 = null;
   public $RadioButton4 = null;
   public $RadioButton3 = null;
   public $RadioButton2 = null;
   public $RadioButton1 = null;
   public $RadioButton25 = null;
   public $RadioButton24 = null;
   public $RadioButton23 = null;
   public $Label1 = null;
   public $Label9 = null;
   public $Window1 = null;
   public $Label8 = null;
    public $AplicaVigenciaBarco = null;


   function CargarPlataformas($sender, $params)
   {
      global $Connection;
      $contrato = $params;

//      $Connection->base->setConnected(false);
//      $Connection->base->setConnected(true);
      $Connection->conectar();
      $sql = "select sNumeroOrden from ordenesdetrabajo where sContrato = '$contrato'  ";
      $Label8->Caption = $sql;
      $Connection->Query4->Active=false;
      $Connection->Query4->SQL=$sql;
      $Connection->Query4->open();

      $array["_"] = "_";
      while( !$Connection->Query4->EOF )
      {
         $array[$Connection->Query4->Fields["sNumeroOrden"]] = $Connection->Query4->Fields["sNumeroOrden"];
         $Connection->Query4->next();
      }
      $this->Plataforma->Items = $array;
      return false;
   }

   function FrmGeneradorBarcoShow($sender, $params)
   {
      global $Connection;
//      $Connection->base->setConnected(false);
//      $Connection->base->setConnected(true);
      $Connection->conectar();
      $sql = "select sContrato from contratos order by sContrato";
      $Connection->Query4->Active=false;
      $Connection->Query4->SQL=$sql;
      $Connection->Query4->open();


      $array["_"] = "_";
      while( !$Connection->Query4->EOF )
      {
         $array[] = $Connection->Query4->Fields["sContrato"];
         $Connection->Query4->next();
      }
      $this->Optativa->Items = $array;

      $this->CargarPlataformas(null, '');
      $this->dFechaInicio->setText(date("d/m/Y"));
      $this->dFechaFinal->setText(date("d/m/Y"));

   }
   function dumpJavascript()
   {
      echo "function mayor(fecha, fecha2){
                      var xMes=fecha.substring(3, 5);
                      var xDia=fecha.substring(0, 2);
                      var xAnio=fecha.substring(6,10);
                      var yMes=fecha2.substring(3, 5);
                      var yDia=fecha2.substring(0, 2);
                      var yAnio=fecha2.substring(6,10);
                      if (xAnio > yAnio){
                          return(true);
                      }else{
                          if (xAnio == yAnio){
                            if (xMes > yMes){
                                return(true);
                            }
                            if (xMes == yMes){
                              if (xDia >= yDia){
                                return(true);
                              }else{
                                return(false);
                              }
                            }else{
                              return(false);
                            }
                          }else{
                            return(false);
                          }
                      }
                }";
   }
   function cmdImprimirJSClick($sender, $params)
   {
      global $sContrato;
      global $sIdConvenioAct;
      global $Connection;

//      $Connection->base->setConnected(false);
//      $Connection->base->setConnected(true);
      $Connection->conectar();
      #Buscar el contrato de barco
      $sql = "select c.sContrato from contratos c where c.sTipoObra = 'BARCO' order by sContrato ";



      $Connection->Query4->Active= false;
      $Connection->Query4->SQL = $sql;
      $Connection->Query4->open();


      if($Connection->Query4->RecordCount > 0 )
      {
         $sCodigo = $Connection->Query4->fields["sContrato"];
      }

      #Buscar la embarcacion vigente

      $sql = "select sIdEmbarcacion,
      DATE_FORMAT(dFechaFinal, '%d/%m%/%Y') as dFechaFinal,
      DATE_FORMAT(dFechaInicio, '%d/%m%/%Y') as dFechaInicio
      from embarcacion_vigencia
      where sContrato ='".  $Connection->global_sContrato ."' order by dFechaInicio,dFechaFinal";



      $Connection->Query1->Active= false;
      $Connection->Query1->SQL = $sql;
      $Connection->Query1->open();

      //$rs = mysql_query($sql);

      echo "var Matriz=new Array(" .$Connection->Query1->RecordCount . ");\n";
      $i = 0;
      while(!$Connection->Query1->EOF)
      {
         echo "var AInterno =new Array(3);\n";
         echo "AInterno[0]='" . $Connection->Query1->fields["sIdEmbarcacion"] . "';\n";
         echo "AInterno[1]='" . $Connection->Query1->fields["dFechaFinal"] . "';\n";
         echo "AInterno[2]='" . $Connection->Query1->fields["dFechaInicio"] . "';\n";
         echo "Matriz[$i] =AInterno;";
         $i++;
         $Connection->Query1->next();
      }

      ?>
                   //Add your javascript code here

                       var elementos = document.getElementsByName("RB");
                       var ruta ;
                       var Embarcacion = "" ;



                       var fecha = document.getElementById("f-calendar-field-1").value;
                       var fechainicial = document.getElementById("f-calendar-field-2").value;
                       var fechafinal = document.getElementById("f-calendar-field-1").value;;


                       for(var i=0;i< <?php echo $Connection->Query1->RecordCount;?>;i++)
                       {
                             //alert(fechafinal + ' : inicio ' + Matriz[i][2] + ' : final ' + Matriz[i][1] );
                            if ( mayor(fechafinal,Matriz[i][2]) &&  mayor(Matriz[i][1],fechafinal) )
                            {
                              Embarcacion = Matriz[i][0];
                              break;
                            }
                       }
                       //alert(Embarcacion);

                       if ( !document.getElementById("AplicaVigenciaBarco").checked )
                            Embarcacion ="_" ;

                       //alert(Embarcacion);

                       var iAnio = fecha.split("/")[2];
                       var iMes = fecha.split("/")[1];

                       fechainicial  = fechainicial.split("/")[2] +"-" + fechainicial.split("/")[1] + "-" + fechainicial.split("/")[0];
                       fechafinal  = fechafinal.split("/")[2] +"-" + fechafinal.split("/")[1] + "-" + fechafinal.split("/")[0];
                       var encontrado = false;

                       var Orden=document.getElementById("Plataforma").options[document.getElementById("Plataforma").selectedIndex].text;
                       var ContratoSeleccionado=document.getElementById("Optativa").options[document.getElementById("Optativa").selectedIndex].text;
                       var Optativa = ContratoSeleccionado;
                       if( ContratoSeleccionado == "_" )ContratoSeleccionado="<?php echo $sCodigo;?>";

                       //alert(Optativa + ContratoSeleccionado);
                       ruta = "../reporte.php";
                       ruta = ruta + "?dFechaInicial="+fechainicial;
                       ruta = ruta + "&dFechaFinal="+fechafinal;
                       ruta = ruta + "&ContratoSeleccionado="+ContratoSeleccionado;
                       ruta = ruta + "&sContrato="+Optativa;
                       ruta = ruta + "&Plataforma="+Orden;
                       ruta = ruta + "&sNumeroOrden="+Orden;
                       //ruta = ruta + "&PersonalCategoria="+document.getElementById("PersonalCategoria").value;
                       //ruta = ruta + "&PU="+document.getElementById("PU").value;
                       //ruta = ruta + "&SeCobra="+document.getElementById("SeCobra").value;
                       //ruta = ruta + "&sContrato=<?php echo $sContrato;?>";
                       ruta = ruta + "&sCodigo=<?php echo $sCodigo;?>";
                       ruta = ruta + "&iAnio=" + iAnio;
                       ruta = ruta + "&iMes=" + iMes;
                       ruta = ruta + "&Embarcacion=" + Embarcacion ;
                       ruta = ruta + "&reportesPath=OceanografiaBarco/generadores_volumenes";

                       ruta = ruta + "&sFormato="+document.getElementById("sFormato").options[document.getElementById("sFormato").selectedIndex].text;;;

                       for(var i=0; i<elementos.length; i++) {
                           ///Volumenes
                          if ( elementos[i].value=="Generador de Personal por Tipo de Obra"  &&  elementos[i].checked){
                                ruta = ruta + "&nombreReporte=oceanografia_generadorpersonalxtipo_plataforma_grupo_contrato";
                                encontrado = true;
                          }
                          if ( elementos[i].value=="Generador de Equipos por Tipo de Obra"  &&  elementos[i].checked){
                                ruta = ruta + "&nombreReporte=oceanografia_generadorequipoxtipocontrato";
                                encontrado = true;
                          }
                          if ( elementos[i].value=="Generador de Pernoctas por Tipo de Obra"  &&  elementos[i].checked){
                                ruta = ruta + "&nombreReporte=oceanografia_generadorpernoctaxtipo";
                                encontrado = true;
                          }
                          if ( elementos[i].value=="Generador de Equipos por Plataforma"  &&  elementos[i].checked){
                                ruta = ruta + "&nombreReporte=oceanografia_generadorequipoxplataformacontrato";
                                encontrado = true;
                          }
                          if ( elementos[i].value=="Generador de Personal por Plataforma"  &&  elementos[i].checked){
                                ruta = ruta + "&nombreReporte=oceanografia_generadorpersonalxtipo_plataforma_grupo";
                                encontrado = true;
                          }
                          if ( elementos[i].value=="Generador de Pernoctas por Plataformas"  &&  elementos[i].checked){
                                ruta = ruta + "&nombreReporte=oceanografia_generadorpernoctaxtipo_plataforma_grupo";
                                encontrado = true;
                          }
                          if ( elementos[i].value=="Generador General de Barco"  &&  elementos[i].checked){
                                ruta = ruta + "&nombreReporte=oceanografia_generadorbarco";
                                encontrado = true;
                          }
                          if ( elementos[i].value=="Generador de Barco por Tipo de Obra"  &&  elementos[i].checked){
                                ruta = ruta + "&nombreReporte=oceanografia_generadorbarcotipo";
                                encontrado = true;
                          }
                         if ( elementos[i].value=="Generador de Barco por Plataforma"  &&  elementos[i].checked){
                                ruta = ruta + "&nombreReporte=oceanografia_generadorbarcoplataforma ";
                                encontrado = true;
                          }
                         if ( elementos[i].value=="Generador de Barco por Fase"  &&  elementos[i].checked){
                                ruta = ruta + "&nombreReporte=oceanografia_generadorbarcofase";
                                encontrado = true;
                          }
                          if ( elementos[i].value=="Reporte de Tripulacion Diaria"  &&  elementos[i].checked){
                                 ruta = ruta + "&nombreReporte=oceanografia_generadortripulaciondiaria";
                                 encontrado = true;
                          }
                          if ( elementos[i].value=="Reporte de Tripulacion Por Grupo"  &&  elementos[i].checked){
                                 ruta = ruta + "&nombreReporte=oceanografia_generadortripulaciondiaria_grupo";
                                 encontrado = true;
                          }

                      }

                        if (!encontrado){
                              //importes
                               ruta = "../reporte.php";
                               ruta = ruta + "?dFechaInicial="+fechainicial;
                               ruta = ruta + "&dFechaFinal="+fechafinal;
                               ruta = ruta + "&ContratoSeleccionado="+ContratoSeleccionado;
                               ruta = ruta + "&sContrato="+Optativa;
                               ruta = ruta + "&Plataforma="+Orden;
                               ruta = ruta + "&sNumeroOrden="+Orden;
                               //ruta = ruta + "&PersonalCategoria="+document.getElementById("PersonalCategoria").value;
                               //ruta = ruta + "&PU="+document.getElementById("PU").value;
                               //ruta = ruta + "&SeCobra="+document.getElementById("SeCobra").value;
                               //ruta = ruta + "&sContrato=<?php echo $sContrato;?>";
                               ruta = ruta + "&sCodigo=<?php echo $sCodigo;?>";
                               ruta = ruta + "&iAnio=" + iAnio;
                               ruta = ruta + "&iMes=" + iMes;
                               ruta = ruta + "&reportesPath=OceanografiaBarco/generadores_importes";

                               ruta = ruta + "&sFormato="+document.getElementById("sFormato").options[document.getElementById("sFormato").selectedIndex].text;;;

                               for(var i=0; i<elementos.length; i++) {

                                  ///importes
                                 if ( elementos[i].value=="Generador General de Barco v"  &&  elementos[i].checked){
                                        ruta = ruta + "&nombreReporte=oceanografia_generadorbarco_master";
                                        encontrado = true;
                                  }
                                  if ( elementos[i].value=="Generador de Barco x Orden"  &&  elementos[i].checked){
                                        ruta = ruta + "&nombreReporte=oceanografia_generadorbarcoxorden_master";
                                        encontrado = true;
                                  }
                                  if ( elementos[i].value=="Generador de Barco x Plataforma"  &&  elementos[i].checked){
                                        ruta = ruta + "&nombreReporte=oceanografia_generadorbarcoxplataforma_master";
                                        encontrado = true;
                                  }
                                  if ( elementos[i].value=="Generador de Equipos x Orden"  &&  elementos[i].checked){
                                        ruta = ruta + "&nombreReporte=oceanografia_generadorbarcoequiposxorden_master";
                                        encontrado = true;
                                  }
                                  if ( elementos[i].value=="Generador de Equipos x Plataforma"  &&  elementos[i].checked){
                                        ruta = ruta + "&nombreReporte=oceanografia_generadorbarcoequiposxplataforma_master";
                                        encontrado = true;
                                  }
                                 if ( elementos[i].value=="Generador de Personal x Orden"  &&  elementos[i].checked){
                                        ruta = ruta + "&nombreReporte=oceanografia_generadorbarcopersonalxorden_master";
                                        encontrado = true;
                                  }
                                 if ( elementos[i].value=="Generador de Personal x Plataforma"  &&  elementos[i].checked){
                                        ruta = ruta + "&nombreReporte=oceanografia_generadorbarcopersonalxplataforma_master";
                                        encontrado = true;
                                  }
                                 if ( elementos[i].value=="Generador de Pernoctas x Plataforma"  &&  elementos[i].checked){
                                        ruta = ruta + "&nombreReporte=oceanografia_generadorbarcopernoctaxplataforma_master";
                                        encontrado = true;
                                  }
                                 if ( elementos[i].value=="Generador de Pernoctas x Orden"  &&  elementos[i].checked){
                                        ruta = ruta + "&nombreReporte=oceanografia_generadorbarcopernoctaxorden_master";
                                        encontrado = true;
                                  }

                              }
                      }
                      if (encontrado)
                      {
                              var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no");
                      }
                      return false;
      <?php

   }
    function OptativaJSChange($sender, $params)
    {
        ?>
                  var params=document.getElementById("Optativa").options[document.getElementById("Optativa").selectedIndex].text;
      <?php
      $componentes = array("Plataforma","Label8",  "Window1");
      echo $this->Optativa->ajaxCall("CargarPlataformas", array(), $componentes);
      ?>
                 return(false);
        <?php
    }



}
global $application;

global $FrmGeneradorBarco;

//Creates the form
$FrmGeneradorBarco = new FrmGeneradorBarco($application);

//Read from resource file
$FrmGeneradorBarco->loadResource(__FILE__);

//Shows the form
$FrmGeneradorBarco->show();

?>
<script>
//poner el grid como solo lectura
function Edit(dbgGeneradores_tableModel){
   var valor = dbgGeneradores_tableModel.getValue(0, 0);
   if(valor != null)
   {
      for(var i = 0; i<=9; i++)
         dbgGeneradores_tableModel.setColumnEditable(i, false);
      dbgGeneradores.setColumnWidth(0,0);
   }
}
setInterval ("Edit(dbgGeneradores_tableModel)",10);
Edit(DBGrid1_tableModel);
</script>
