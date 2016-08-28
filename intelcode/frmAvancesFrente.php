<?php
session_start();
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("dbgrids.inc.php");
use_unit("buttons.inc.php");
use_unit("chart.inc.php");
use_unit("dbtables.inc.php");
use_unit("db.inc.php");
require_once("Connection.php");
require_once("fnUtilerias.php");

//$sContrato = "OT-12.b.1";
//$sIdConvenio = "";
//Class definition
class frmAvancesFrente extends Page
{
   public $Label1 = null;
   public $GroupBox1 = null;
   public $DBGrid1 = null;
   public $Datasource1 = null;
   public $Query1 = null;
   public $cboNumeroOrden = null;
   public $Query2 = null;
   public $StoredProc1 = null;
    public $Button1 = null;

   function cboNumeroOrdenChange($sender, $params)
   {
      global $Connection;
//      $Connection->base->setConnected(false);
//      $Connection->base->setConnected(true);
$Connection->conectar();
      $sNumeroOrden = $this->cboNumeroOrden->getItemIndex();
      $this->StoredProc1->Active = false;
      $this->StoredProc1->StoredProcName = "procAvancesOrden ('" .
      $Connection->global_sContrato
       . "', '" .
      $Connection->global_sIdConvenio
       . "', '$sNumeroOrden')";
      $this->StoredProc1->Prepare();
      $this->StoredProc1->Execute();
//      $Connection->base->setConnected(false);
//      $Connection->base->setConnected(true);
$Connection->conectar();
      $this->grafica($sNumeroOrden);
   }
   function frmAvancesFrenteShow($sender, $params)
   {
      global $Connection;
      if($this->cboNumeroOrden->ItemIndex <= 0)
      {
         $this->cboNumeroOrden->clear();

//         $Connection->base->setConnected(false);
//         $Connection->base->setConnected(true);
          $Connection->conectar();
         $this->Query2->Active = false;
         $this->Query2->setSQL("select sNumeroOrden from ordenesdetrabajo where sContrato = '" .
         $Connection->global_sContrato
          . "'");
         $this->Query2->open();

         $sNumeroOrden = "";
         while( ! $this->Query2->EOF)
         {
            if($sNumeroOrden == "")
               $sNumeroOrden = $this->Query2->Fields['sNumeroOrden'];
            $Items[$this->Query2->Fields['sNumeroOrden']] = $this->Query2->Fields['sNumeroOrden'];
            $this->Query2->next();
         }
         $this->cboNumeroOrden->Items = $Items;

         if($this->cboNumeroOrden->getItemIndex() >= 0)
            $sNumeroOrden = $this->cboNumeroOrden->getItemIndex();

         $this->StoredProc1->Active = false;
         $this->StoredProc1->StoredProcName = "procAvancesOrden ('" .
         $Connection->global_sContrato
          . "', '" .
         $Connection->global_sIdConvenio
          . "', '$sNumeroOrden')";
         $this->StoredProc1->Prepare();
         $this->StoredProc1->Execute();
//         $Connection->base->setConnected(false);
//         $Connection->base->setConnected(true);
$Connection->conectar();
      }

      $this->grafica($sNumeroOrden);

   }

   function grafica($sNumeroOrden)
   {
      global $Connection;
      $sIdConvenioTmp = "";

      unset($_SESSION["Fechas"]);
      unset($_SESSION["arregloavanceprogramado"]);
      unset($_SESSION["arregloavancefisico"]);
      unset($_SESSION["arregloavancefinanciero"]);
      //Acumulado
      $Acumulado = 0;
      //_Get convenio
//      $Connection->base->setConnected(false);
//      $Connection->base->setConnected(true);
$Connection->conectar();
      //leemos la configuracion
      $sql = "SELECT c.sIdConvenio,c2.dFechaInicio,c2.dFechaFinal,c2.dMontoMN FROM configuracion c
         INNER JOIN convenios c2 ON (c.sContrato=c2.sContrato AND c.sIdConvenio=c2.sIdConvenio)
         WHERE c.sContrato='" . $Connection->global_sContrato . "'";
      $this->Query2->Active = false;
      $this->Query2->setSQL($sql);
      $this->Query2->open();
      if($this->Query2->RecordCount > 0)
      {
         $sIdConvenioTmp = $_SESSION["config_graph"]["sIdConvenio"] = $this->Query2->Fields['sIdConvenio'];
         $_SESSION["config_graph"]["dFechaIni"] = $this->Query2->Fields['dFechaInicio'];
         $_SESSION["config_graph"]["dFechaFin"] = $this->Query2->Fields['dFechaFinal'];
         $_SESSION["config_graph"]["dMonto"] = $this->Query2->Fields['dMontoMN'];
      }
//      $Connection->base->setConnected(false);
//      $Connection->base->setConnected(true);
$Connection->conectar();
      //obtener el array de fechas de los datos de la grafica
      $FechaInicial = $this->StoredProc1->Fields["dIdFecha"];
      while( ! $this->StoredProc1->EOF)
      {
         $FechaFinal = $this->StoredProc1->Fields["dIdFecha"];
         $this->StoredProc1->next();
      }

      $FecInicioAvance = $FechaInicial;
      $i = 0;
      while($FecInicioAvance < $FechaFinal)
      {
         $cadena = explode("-", $FecInicioAvance);
         $anyo = $cadena[0];
         $mes = $cadena[1];
         $mesActual = $mes + 1;
         $ultimo = mktime(0, 0, 0, $mesActual, 0, $anyo);
         $ultimodia = strftime("%d", $ultimo);
         $Fechas[$i] = $anyo . "-" . $mes . "-" . $ultimodia;
         $_SESSION["Fechas"][] = $Fechas[$i];
         if($mes < 12)
         {
            if($mes + 1 < 10)
            {
               $FecInicioAvance = $anyo . "-0" . ($mes + 1) . "-01";
            }
            else
            {
               $FecInicioAvance = $anyo . "-" . ($mes + 1) . "-01";
            }
         }
         else
         {
            $FecInicioAvance = ($anyo + 1) . "-01-01";
         }
         $i++;
      }
      //es necesario desconectar el db y conectarlo despues de ejecutar un proc
      //ya que mandaria error
//      $Connection->base->setConnected(false);
//      $Connection->base->setConnected(true);
$Connection->conectar();
      //Avance Programado
      $ultimo_programado = 0;
      $arregloavanceprogramado[] = 0;
      for($cont = 0; $cont <= $i - 1; $cont++)
      {
         $sql = "select max(dAvancePonderadoGlobal) as dAvancePonderadoGlobal
         from avancesglobales
         Where sContrato = '". $Connection->global_sContrato ."' and sNumeroOrden = '$sNumeroOrden'
         and dIdFecha <= '" . $Fechas[$cont] . "'
         and sIdConvenio ='$sIdConvenioTmp'
         order by dIdFecha DESC";
         $this->Query2->Active = false;
         $this->Query2->setSQL($sql);
         $this->Query2->open();
         if($this->Query2->RecordCount > 0)
         {
            $ultimo_programado = $this->Query2->Fields['dAvancePonderadoGlobal'];
         }
         $arregloavanceprogramado[$cont] = $ultimo_programado;
         $_SESSION["arregloavanceprogramado"][$cont] = $ultimo_programado;
      }

      //Avance Fisico
      $ultimo_fisico = 0;
      $arregloavancefisico[] = 0;
      for($cont = 0; $cont <= $i - 1; $cont++)
      {
         $sql = "select sum(dAvance) as dAvance
         from avancesglobalesxorden
         Where sContrato = '". $Connection->global_sContrato ."' and sNumeroOrden = '$sNumeroOrden'
         and dIdFecha <= '" . $Fechas[$cont] . "' and sIdConvenio ='$sIdConvenioTmp'
         group by sNumeroOrden";
         $this->Query2->Active = false;
         $this->Query2->setSQL($sql);
         $this->Query2->open();
         if($this->Query2->RecordCount > 0)
         {
            $ultimo_fisico = $this->Query2->Fields['dAvance'];
         }
         $arregloavancefisico[$cont] = $ultimo_fisico;
         $_SESSION["arregloavancefisico"][$cont] = $ultimo_fisico;
      }

      //Avance Financiero  (incluye adicionales)
      $MontoOrden = 0;
      $ultimo_financiero = 0;
      $arregloavancefinanciero[] = 0;
      $Sql = "SELECT sum(a.dCantidad * b.dVentaMN)  as dSuma
      FROM actividadesxorden a
      INNER JOIN actividadesxanexo b ON (
        a.sContrato=b.sContrato AND a.sIdConvenio=b.sIdConvenio
        AND a.sNumeroActividad=b.sNumeroActividad AND a.sTipoActividad='Actividad')
      WHERE a.sContrato = '". $Connection->global_sContrato."' and a.sNumeroOrden = '$sNumeroOrden'
      and a.sIdConvenio ='$sIdConvenioTmp'
      GROUP BY a.sNumeroOrden";
      $this->Query2->Active = false;
      $this->Query2->setSQL($sql);
      $this->Query2->open();
      if($this->Query2->RecordCount > 0)
      {
         $MontoOrden = $this->Query2->Fields['dSuma'];
      }

      if($MontoOrden == "")
         $MontoOrden = 0;
      for($cont = 0; $cont <= $i - 1; $cont++)
      {
         $sql = "select (sum(dMontoMN)/$MontoOrden)*100 as dAvance
         from estimaciones
         Where sContrato = '". $Connection->global_sContrato ."' and sNumeroOrden = '$sNumeroOrden'
         and dFechaFinal <= '" . $Fechas[$cont] . "' AND lStatus='Autorizado'
         group by sNumeroOrden";
         $this->Query2->Active = false;
         $this->Query2->setSQL($sql);
         $this->Query2->open();
         if($this->Query2->RecordCount > 0)
         {

            $ultimo_financiero = $this->Query2->Fields['dAvance'];
         }
         $arregloavancefinanciero[$cont] = $ultimo_financiero;
         $_SESSION["arregloavancefinanciero"][$cont] = $ultimo_financiero;
      }
      //Informacion de la empresa
      $sql = "SELECT ct.mDescripcion,cf.sNombre
      FROM contratos ct
      INNER JOIN configuracion cf ON (ct.sContrato=cf.sContrato)
      WHERE cf.sContrato='" . $Connection->global_sContrato . "'";
      $this->Query2->Active = false;
      $this->Query2->setSQL($sql);
      $this->Query2->open();
      if($this->Query2->RecordCount > 0)
      {
         $_SESSION["config_graph"]["mDescipcion"] = Acortar($this->Query2->Fields['mDescripcion']);
         $_SESSION["config_graph"]["sNombre"] = Acortar($this->Query2->Fields['sNombre']);
      }
      $_SESSION["config_graph"]["Ancho"] = 530;
      $_SESSION["config_graph"]["Alto"] = 350;

      $this->dumpJavaScript();

   }
   function dumpJavaScript()
   {
      echo "



       ";
   }
    function Button1JSClick($sender, $params)
    {
      global $Connection;
      $sNumeroOrden = $this->cboNumeroOrden->getItemIndex();
      if ( $sNumeroOrden < 0 ){
//         $Connection->base->setConnected(false);
//         $Connection->base->setConnected(true);
          $Connection->conectar();
         $this->Query2->Active = false;
         $this->Query2->setSQL("select sNumeroOrden from ordenesdetrabajo where sContrato = '" .
         $Connection->global_sContrato
          . "' limit 1");
         $this->Query2->open();
         if( $this->Query2->RecordCount > 0 ){
             $sNumeroOrden = $this->Query2->Fields["sNumeroOrden"];
         }
      }

      ?>


                 var ruta="";

                 ruta = "../reporte.php?";
                 ruta = ruta + "&sContrato=" + "<?php echo $Connection->global_sContrato ;?>";
                 ruta = ruta + "&sNumeroOrden=" + "<?php echo $sNumeroOrden ;?>";
                 ruta = ruta + "&sIdConvenio=" + "<?php echo $Connection->global_sIdConvenio ;?>";
                // ruta = ruta + "&sFormato="+document.getElementById("sFormato").options[document.getElementById("sFormato").selectedIndex].text;
                 ruta = ruta + "&reportesPath=avances";
                 ruta = ruta + "&nombreReporte=rptAvancesOrden";




                 var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no,scroolbar=yes");
                 return false;
      <?php

    }


}

global $application;

global $frmAvancesFrente;

//Creates the form
$frmAvancesFrente = new frmAvancesFrente($application);

//Read from resource file
$frmAvancesFrente->loadResource(__FILE__);

//Shows the form
$frmAvancesFrente->show();

?>
<!--
<iframe src=\"graficarAvancesGlobales.php\" boder=\"3\"  '+ 'scrolling=\"no\"  style=\"position:absolute;color:blue; left:450px;top:10px;width:'+ 550  +'px;height:' + 370 + 'px;\"></iframe>;
    -->
<iframe src="graficarAvancesGlobales.php" boder="3"  scrolling="no"  style="position:absolute;color:blue; left:450px;top:10px;width:550px;height:370px;"></iframe>;

