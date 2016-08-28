<?php
//Includes
//require_once("vcl/vcl.inc.php");
require_once("rpcl/rpcl.inc.php");
use_unit("comctrls.inc.php");
use_unit("dbgrids.inc.php");
use_unit("db.inc.php");
use_unit("dbtables.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
#require_once("Modulos/include/config.inc.php");
require_once("Connection.php");
require_once("fnUtilerias.php");

# $sContrato='425027849';
//Class definition
global $sIdConvenioAct;
global $sContrato;
$sContrato = $sContrato;
$sIdConvenio = $sIdConvenioAct;
class FrmReporteDiario extends Page
{
   public $Label16 = null;
   public $sFormato = null;
   public $cmdFinanciero = null;
   public $sTiempoMuertoReal = null;
   public $sInicioPlatica = null;
   public $sTema = null;
   public $sFinalPlatica = null;
   public $sTransporte = null;
   public $sTiempo = null;
   public $sTiempoMuerto = null;
   public $sTiempoEfectivo = null;
   public $sOperacionFinal = null;
   public $sOperacionInicio = null;
   public $sNumeroReporte = null;
   public $sIdTurno = null;
   public $dIdFecha = null;
   public $hOperacion = null;
   public $hsdNuevaFecha = null;
   public $hsNumeroNuevoReporte = null;
   public $cmdImprimir = null;
   public $cmdEliminar = null;
   public $cmdCancelar = null;
   public $cmdAceptar = null;
   public $cmdModificar = null;
   public $cmdAgregar = null;
   public $hlStatus = null;
   public $hdIdFecha = null;
   public $hsIdConvenio = null;
   public $hsNumeroReporte = null;
   public $hsIdTurno = null;
   public $hsNumeroOrden = null;
   public $hsContrato = null;
   public $cmdFotos = null;
   public $cmdPersonal = null;
   public $cmdAlcances = null;
   public $cmdVolumenes = null;
   public $cmdAvisosEmbarques = null;
   public $cmdPermisos = null;
   public $cmdFirmantes = null;
   public $cmdJornadas = null;
   public $dbgReporteDiario = null;
   public $dsRd = null;
   public $qryRd = null;
   public $Button18 = null;
   public $sNumeroOrden = null;
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
   public $Panel3 = null;
   public $Button16 = null;
   public $Panel2 = null;
   public $Label1 = null;
   public $Panel1 = null;
   public $Database1 = null;
   function frmReporteDiarioJSLoad($sender, $params){
        global $_SESSION, $Usuario, $Clave, $Servidor, $_REQUEST;
        global $sContrato, $global_grupo;
        global $Connection;
   ?>
   //Add your javascript code here
   
   <?php

   }


   function cmdFinancieroJSClick($sender, $params)
   {
      global $Connection;
      ?>
               //Add your javascript code here
                 ur = "../reporte.php?";
                 ur = ur + "sIdTurno=" + document.getElementById("hsIdTurno").value;
                 ur = ur + "&sContrato=" + "<?php echo $Connection->global_sContrato ;?>";
                 ur = ur + "&sIdConvenio=" + document.getElementById("hsIdConvenio").value;
                 ur = ur + "&sNumeroOrden=" + document.getElementById("sNumeroOrden").value;
                 ur = ur + "&sIdTurno=" + document.getElementById("hsIdTurno").value;
                 ur = ur + "&lStatus=" + document.getElementById("hlStatus").value;
                 ur = ur + "&sNumeroReporte=" + document.getElementById("hsNumeroReporte").value;
                 ur = ur + "&dIdFecha=" + document.getElementById("hdIdFecha").value;
                 ur = ur + "&reportesPath=financiero&nombreReporte=costoPersonalEquipo";
                 var status = window.open(ur,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no,scroolbar=yes");
                 return false;
      <?php

   }


   function cmdImprimirJSClick($sender, $params)
   {
      global $Connection;
      $sTipoContrato = "PROGRAMADA";//'PROGRAMADA','OPTATIVA','BARCO','MIXTA'
      $sql = "select sTipoObra from contratos where sContrato='" . $Connection->global_sContrato . "' ";
      $rs = mysql_query($sql);
      if($rw = mysql_fetch_array($rs))
      {
         $sTipoContrato = $rw['sTipoObra'];
      }
      #Buscar el contrato de barco
      $sql = "select c.sContrato from contratos c where c.sTipoObra = 'BARCO' order by sContrato ";
      $rs = mysql_query($sql);

      if($rw = mysql_fetch_array($rs))
      {
         $sCodigo = $rw["sContrato"];
      }

        $sNumeroOrden = $_SESSION['ssNumeroOrden'];
        #echo"alert(\"".$sNumeroOrden."\");";
        $ImprimeAvanceFrente = configuracion_frentes('bAvanceFrente', $Connection->global_sContrato, $sNumeroOrden);
        $ImprimeAvanceContrato = configuracion_frentes('bAvanceContrato', $Connection->global_sContrato, $sNumeroOrden);
        $ConfiguracionImpresionAvances = 'Todos';
        if($ImprimeAvanceFrente == 'Si' AND $ImprimeAvanceContrato == 'Si') {
                $ConfiguracionImpresionAvances = 'Todos';
        } else if ($ImprimeAvanceFrente == 'Si' AND $ImprimeAvanceContrato == 'No') {
                $ConfiguracionImpresionAvances = 'Frente';
        } else if ($ImprimeAvanceFrente == 'No' AND $ImprimeAvanceContrato == 'Si') {
                $ConfiguracionImpresionAvances = 'Contrato';
        }

      ?>
                 var sTipoContrato = "<?php echo $sTipoContrato;?>";
                 var ruta="";

                 ruta = "../reporte.php?";
                 ruta = ruta + "sIdTurno=" + document.getElementById("hsIdTurno").value;
                 ruta = ruta + "&sContrato=" + "<?php echo $Connection->global_sContrato;?>";
                 ruta = ruta + "&sContratoBarco=" + "<?php echo $sCodigo;?>";
                 ruta = ruta + "&sIdConvenio=" + document.getElementById("hsIdConvenio").value;
                 ruta = ruta + "&sNumeroOrden=" + document.getElementById("sNumeroOrden").value;
                 ruta = ruta + "&sIdTurno=" + document.getElementById("hsIdTurno").value;
                 ruta = ruta + "&lStatus=" + document.getElementById("hlStatus").value;
                 ruta = ruta + "&lConfAvances=" + "<?php echo $ConfiguracionImpresionAvances; ?>";
                 ruta = ruta + "&sNumeroReporte=" + document.getElementById("hsNumeroReporte").value;
                 ruta = ruta + "&dFecha=" + document.getElementById("hdIdFecha").value;
                 ruta = ruta + "&dIdFecha=" + document.getElementById("hdIdFecha").value;
                ruta = ruta + "&sFormato="+document.getElementById("sFormato").options[document.getElementById("sFormato").selectedIndex].text;



                 if (sTipoContrato == "PROGRAMADA" ){
                    ruta = ruta + "&reportesPath=reportesdiarios/reportediarioprogramadas";
                    ruta = ruta + "&nombreReporte=rptReporteDiarioProgramadas";
                 }
                 else if (sTipoContrato == "BARCO" ){
                    ruta = ruta + "&reportesPath=reportesdiarios/reportediariobarco";
                    ruta = ruta + "&nombreReporte=oceanografia_reporte_diariobarco";
                 }
                 else if (sTipoContrato == "OPTATIVA" ){
                    ruta = ruta + "&reportesPath=reportesdiarios/reportediariooptativas";
                    ruta = ruta + "&nombreReporte=rptReporteDiarioOptativas";
                 }
                 else if (sTipoContrato == "MIXTA" ){
                    ruta = ruta + "&reportesPath=reportesdiarios/reportediariomixtas";
                    ruta = ruta + "&nombreReporte=rptReporteDiarioMixtas";
                 }
                 else{
                  //Viejo codigo de FPDF, muy configurable XD, todo hecho a patin
                  ruta = "Acceso/scripts/php/Reportes/generadores_swbs/rptReporteDiario.php?";
                  ruta = ruta + "sIdTurno=" + document.getElementById("hsIdTurno").value;
                  ruta = ruta + "&sContrato=" + "<?php echo $Connection->global_sContrato;?>";
                  ruta = ruta + "&sIdConvenio=" + document.getElementById("hsIdConvenio").value;
                  ruta = ruta + "&sNumeroOrden=" + document.getElementById("sNumeroOrden").value;
                  ruta = ruta + "&sIdTurno=" + document.getElementById("hsIdTurno").value;
                  ruta = ruta + "&lStatus=" + document.getElementById("hlStatus").value;
                  ruta = ruta + "&sNumeroReporte=" + document.getElementById("hsNumeroReporte").value;
                  ruta = ruta + "&dFecha=" + document.getElementById("hdIdFecha").value;
                 }

                 var status = window.open(ruta,"_blank","fullscreen=yes,menubar=no,status=no,titlebar=no,toolbar=no,scroolbar=yes");
                 return false;

      <?php

   }

   function cmdCancelarJSClick($sender, $params)
   {

      ?>
               //Add your javascript code here
                 habilitar(true);
                 return false;
      <?php

   }

   function cmdEliminarJSClick($sender, $params)
   {

      ?>
               //Add your javascript code here
                    if(document.getElementById("hlStatus").value!="Pendiente"){
                        alert("El Reporte no esta en estado Pendiente, no se puede eliminar");
                        return false;
                    }else{
                        if(confirm("Realmente desea eliminar el reporte ?"))
                                return true;
                        else
                                return false;
                    }
      <?php

   }

   function cmdEliminarClick($sender, $params)
   {
      #global $sContrato, $sIdConvenioAct;
      global $Connection;
      ################## proceso de eliminacion de registro de reporte diario ######################
      $sNumeroOrden = $this->sNumeroOrden->getItemIndex();
      $sIdTurno = $this->hsIdTurno->Value;
      $sIdConvenio = $this->hsIdConvenio->Value;
      $dIdFecha = $this->hdIdFecha->Value;
      $sNumeroReporte = $this->hsNumeroReporte->Value;
      #leer la configuracion para comparar el ultimo folio
      if($sNumeroOrden == $sContrato)
      {
         $sql = "select sPrefijo from turnos where sContrato='" . $Connection->global_sContrato . "'
         and sIdTurno='$sIdTurno' and sOrigenTierra='Si'";
         if($rw = mysql_fetch_array(mysql_query($sql)))
         {
            $sOrigenTierra = 'Si';
            if($rw['sPrefijo'] != "")
               $sFormato = $rw['sPrefijo'] . "-";
            $sql = "Select sFormato from configuracion where sContrato = '" . $Connection->global_sContrato . "'";
            if($rwsFormato = mysql_fetch_array(mysql_query($sql)))
            {
               $sFormato = $rwsFormato['sFormato'] . $sFormato;
            }
            $sql = "Select iConsecutivoTierra from ordenesdetrabajo where sContrato ='" . $Connection->global_sContrato . "'
            and sNumeroOrden = '$sNumeroOrden'";
            if($rwiConsecutivoTierra = mysql_fetch_array(mysql_query($sql)))
            {
               $iConsecutivo = $rwiConsecutivoTierra['iConsecutivoTierra'] - 1;
            }
         }
         else
         {
            $sOrigenTierra = 'No';
            $sql = "SELECT iConsecutivo,sFormato FROM configuracion where sContrato='" . $Connection->global_sContrato . "'
             GROUP BY sContrato";
            $result = mysql_query($sql);
            if($row = mysql_fetch_array($result))
            {
               $sFormato = $row['sFormato'];
               $iConsecutivo = $row['iConsecutivo'] - 1;
            }
         }
      }
      else
      {
         $sql = "select sPrefijo from turnos where sContrato='" . $Connection->global_sContrato . "'
         and sIdTurno='$sIdTurno' and sOrigenTierra='Si'";
         if($rw = mysql_fetch_array(mysql_query($sql)))
         {
            if($rw['sPrefijo'] != "")
               $sFormato = $rw['sPrefijo'] . "-";
            $sOrigenTierra = 'Si';
         }
         else
         {
            $sOrigenTierra = 'No';
         }
         $sql = "SELECT iConsecutivo, iConsecutivoTierra, sFormato FROM ordenesdetrabajo
          where sContrato='" . $Connection->global_sContrato . "' AND sNumeroOrden='$sNumeroOrden' GROUP BY sNumeroOrden";
         $result = mysql_query($sql);
         if($row = mysql_fetch_array($result))
         {
            if($sOrigenTierra == 'Si')
            {
               $iConsecutivo = $row['iConsecutivoTierra'] - 1;
            }
            else
            {
               $iConsecutivo = $row['iConsecutivo'] - 1;
            }
            $sFormato = $row['sFormato'];
         }
      }
      if(strlen($iConsecutivo) == 1)
         $iConsecutivo = "00$iConsecutivo";
      if(strlen($iConsecutivo) == 2)
         $iConsecutivo = "0$iConsecutivo";
      $Folio = trim($sFormato) . trim($iConsecutivo);

      /*########################################*/
      if($lStatus != "Autorizado" and $lStatus != "Validado")
      {

         $sqlC[0] = "select * from bitacoradeactividades where sContrato='" . $Connection->global_sContrato . "' and dIdFecha='$dIdFecha' and sIdTurno='$sIdTurno'  and sNumeroOrden='$sNumeroOrden'";
         $sqlC[1] = "select * from bitacoradealcances where sContrato='" . $Connection->global_sContrato . "' and dIdFecha='$dIdFecha' and sIdTurno='$sIdTurno'  and sNumeroOrden='$sNumeroOrden'";
         $sqlC[2] = "select * from tramitedepermisos  where sContrato='" . $Connection->global_sContrato . "' and dIdFecha='$dIdFecha' and sIdTurno='$sIdTurno'  and sNumeroOrden='$sNumeroOrden'";
         $sqlC[3] = "select * from jornadasdiarias where sContrato='" . $Connection->global_sContrato . "' and dIdFecha='$dIdFecha' and sIdTurno='$sIdTurno'  and sNumeroOrden='$sNumeroOrden'";
         $eliminarReporte = 'Si';
         for($ik = 0; $ik <= 3; $ik++)
         {
            $rsComprobar = mysql_query($sqlC[$ik]);
            if($rwc = mysql_fetch_array($rsComprobar))
            {
               $eliminarReporte = 'No';
               break;
            }
         }

         if($eliminarReporte == 'Si')
         {
            mysql_query("DELETE FROM reportefotografico WHERE sContrato='" . $Connection->global_sContrato . "' AND sNumeroReporte='$sNumeroReporte' ");
            mysql_query("DELETE FROM reportediario WHERE sContrato='" . $Connection->global_sContrato . "' and dIdFecha='$dIdFecha' and sNumeroOrden='$sNumeroOrden'
                                                and sIdTurno='$sIdTurno' and sIdConvenio='$sIdConvenio' AND sNumeroReporte='$sNumeroReporte' ");
            #derementar si ees el ultimo folio
            if(trim($sNumeroReporte) == trim($Folio))
            {
               if($sNumeroOrden == $sContrato)
               {
                  if($this->turnoTierra($sIdTurno) == 'Si')
                  {
                     mysql_query("UPDATE ordenesdetrabajo Set iConsecutivoTierra = iConsecutivoTierra-1 Where sContrato = '" . $Connection->global_sContrato . "' And sNumeroOrden = '$sNumeroOrden' ");
                  }
                  else
                  {
                     mysql_query("UPDATE configuracion  Set iConsecutivo = iConsecutivo-1 Where sContrato = '" . $Connection->global_sContrato . "'");
                  }
               }
               else
               {
                  if($this->turnoTierra($sIdTurno) == 'Si')
                  {
                     mysql_query("UPDATE ordenesdetrabajo Set iConsecutivoTierra = iConsecutivoTierra-1 Where sContrato = '" . $Connection->global_sContrato . "' And sNumeroOrden = '$sNumeroOrden' ");
                  }
                  else
                  {
                     mysql_query("UPDATE ordenesdetrabajo Set iConsecutivo = iConsecutivo-1 Where sContrato = '" . $Connection->global_sContrato . "' And sNumeroOrden = '$sNumeroOrden' ");
                  }
               }
            }

            $sql = "delete from avancesglobalesxorden where sContrato='" . $Connection->global_sContrato . "' and dIdFecha='$dIdFecha' and sIdTurno='$sIdTurno'  and sNumeroOrden='$sNumeroOrden'";
            mysql_query($sql);
         }
         else
         {
            $msg = " bitacora de actividades ,";
            $msg .= " bitacora de alcances ,";
            $msg .= " tramite de permisos   ,";
            $msg .= " jornadas diarias  ";
            ?>
                                        <script>
                                        alert("No se puede elimiar el reporte, existen registros en algunas de estas relaciones:" +"<?php echo $msg?>");
                                        </script>
            <?php
         }
      }
      else
      {
         ?>
                                        <script>
                             alert("El reporte ha sido Autorizado, por lo tanto no puede modificarse");
                                        </script>
         <?php
      }
      #######
   }

   function sInicioPlaticaJSKeyDown($sender, $params)
   {

      ?>
               //Add your javascript code here
                        tecla = (document.all)?event.keyCode:event.which;
                        patron = /\d/;
                        if (tecla==8) return true;
                        if (tecla==0) return true;
                        if (tecla==9) return true;
                        if (tecla==46) return false;//punto
                        if(document.getElementById("sInicioPlatica").length==2){
                           valor=':';
                           document.getElementById("sInicioPlatica").value = document.getElementById("sInicioPlatica").value + valor;
                        }
      <?php

   }

   function sFinalPlaticaJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here
                 if(!mascara(document.getElementById("sFinalPlatica")))
                     document.getElementById("sFinalPlatica").value="00:00";
                 return false;
      <?php

   }

   function sInicioPlaticaJSBlur($sender, $params)
   {

      ?>
               //Add your javascript code here
                   if(!mascara(document.getElementById("sInicioPlatica")))
                      document.getElementById("sInicioPlatica").value="00:00";
                   return false;
      <?php

   }

   function dumpJavascript()
   {
      echo "function mascara(field)
                         {
                               formato = field.value.split(':');
                               horas = formato[0];
                               minuto = formato[1];
                               if( minuto==null || horas ==null || minuto =='' || horas==''){
                                    alert('El formato de hora es incorrecto, verifiquelo nuevamente !');
                                    field.select();
                                    field.focus();
                                    return false;
                               }
                               if ((horas <0 || horas >23) || (minuto<0 || minuto > 59)  || minuto.length != 2 ||  horas.length != 2 ) {
                                    alert('El formato de hora es incorrecto, verifiquelo nuevamente !');
                                    field.select();
                                    field.focus();
                                    return false;
                               }
                               return true;
                         }";

      echo "function habilitar(val){
                                if (val){
                                        document.getElementById('cmdAgregar').src='recursos/imagenesMenu/Botones/Symbol-Add.ico';
                                        document.getElementById('cmdModificar').src='recursos/imagenesMenu/Botones/Edit.ico';
                                        document.getElementById('cmdAceptar').src='recursos/imagenesMenu/Botones/_Symbol-Check.ico';
                                        document.getElementById('cmdCancelar').src='recursos/imagenesMenu/Botones/_Undo.ico';
                                        document.getElementById('cmdEliminar').src='recursos/imagenesMenu/Botones/Symbol-Delete.ico';
                                        document.getElementById('cmdImprimir').src='recursos/imagenesMenu/Botones/32px-Crystal_Clear_action_fileprint.ico';
                                        document.getElementById('cmdFinanciero').src='Modulos/imagenes/pesos.png';
                                }else{
                                        document.getElementById('cmdAgregar').src='recursos/imagenesMenu/Botones/_Symbol-Add.ico';
                                        document.getElementById('cmdModificar').src='recursos/imagenesMenu/Botones/_Edit.ico';
                                        document.getElementById('cmdAceptar').src='recursos/imagenesMenu/Botones/Symbol-Check.ico';
                                        document.getElementById('cmdCancelar').src='recursos/imagenesMenu/Botones/Undo.ico';
                                        document.getElementById('cmdEliminar').src='recursos/imagenesMenu/Botones/_Symbol-Delete.ico';
                                        document.getElementById('cmdImprimir').src='recursos/imagenesMenu/Botones/_32px-Crystal_Clear_action_fileprint.ico';
                                        document.getElementById('cmdFinanciero').src='Modulos/imagenes/_pesos.png';

                                }

                                document.getElementById('cmdAgregar').disabled=!val;
                                document.getElementById('cmdModificar').disabled=!val;
                                document.getElementById('cmdAceptar').disabled=val;
                                document.getElementById('cmdCancelar').disabled=val;
                                document.getElementById('cmdEliminar').disabled=!val;
                                document.getElementById('cmdImprimir').disabled=!val;
                                document.getElementById('cmdFinanciero').disabled=!val;

                                document.getElementById('sIdTurno').disabled=val;
                                document.getElementById('sNumeroReporte').disabled=val;
                                document.getElementById('sTiempo').disabled=val;
                                document.getElementById('sInicioPlatica').disabled=val;
                                document.getElementById('sFinalPlatica').disabled=val;
                                document.getElementById('sTema').disabled=val;


                        }";
   }


   function cmdModificarJSClick($sender, $params)
   {

      ?>

                    if(document.getElementById("hlStatus").value!="Pendiente"){
                        alert("El Reporte no esta en estado Pendiente, no se puede Modificar");
                    }else{
                        document.getElementById("hOperacion").value="modificar";
                        habilitar(false);
                    }
                 return false;
      <?php

   }

   function turnoTierra($turno = "")
   {
      #tipo de turno , tierra o plataforma
      #global $sContrato, $_SESSION;
      global $Connection, $_SESSION;
      if($turno == "")
         $turno = $_SESSION['ssIdTurno'];

      $sql = "select sPrefijo from turnos where sContrato='" . $Connection->global_sContrato . "' and sIdTurno='$turno'
                                        and sOrigenTierra='Si'";
      if($rw = mysql_fetch_array(mysql_query($sql)))
      {
         $sOrigenTierra = 'Si';
      }
      else
      {
         $sOrigenTierra = 'No';
      }
      return $sOrigenTierra;
   }

   function cmdAceptarClick($sender, $params)
   {
      #global $sContrato, $sIdConvenioAct, $_SESSION;
      global $Connection, $_SESSION;
      #valores originales
      $sNumeroOrden = $this->sNumeroOrden->getItemIndex();
      $sIdTurno = $this->sIdTurno->getItemIndex();
      $sIdConvenio = $Connection->global_sContrato;
      $sTiempo = strtoupper($this->sTiempo->getText());
      $sInicioPlatica = $this->sInicioPlatica->getText();
      $sFinalPlatica = $this->sFinalPlatica->getText();
      $sTema = strtoupper($this->sTema->getText());
      $sNumeroReporte = $this->sNumeroReporte->getText();
      $dIdFecha = $this->dIdFecha->getText();
      $sTransporte = $this->sTransporte->getText();

      #temporales
      $oldsNumeroOrden = $this->hsNumeroOrden->Value;
      $oldsIdTurno = $this->hsIdTurno->Value;
      $oldsIdConvenio = $this->hsIdConvenio->Value;
      $oldsNumeroReporte = $this->hsNumeroReporte->Value;
      $olddIdFecha = $this->hdIdFecha->Value;

      if($this->hOperacion->Value == "agregar")
      {
         $error = false;
         mysql_query("begin");
         //$sNumeroReporte=$this->hsNumeroNuevoReporte->Value;
         #guardar un nuevo registro de reportediario
         $sql = "SELECT sNumeroOrden FROM reportediario
                                WHERE sContrato='" . $Connection->global_sContrato . "'
                                AND sNumeroOrden='$sNumeroOrden'
                                AND sNumeroReporte='$sNumeroReporte' ";
         $result = mysql_query($sql);
         if($row = mysql_fetch_array($result))
         {
            $sNumeroReporte = "FOLIO DUPLICADO";
         }
         $sql = "INSERT INTO reportediario (
                                sContrato,
                                dIdFecha,
                                sNumeroOrden,
                                sIdConvenio,
                                sNumeroReporte,
                                sIdTurno,
                                sTiempo ,
                                sInicioPlatica,
                                sFinalPlatica,
                                sTema,
                                sIdUsuario,
                                sTransporte,
                                sIdUsuarioValida,
                                sIdUsuarioAutoriza,
                                sIdUsuarioResidente ) VALUES (
                                        '" . $Connection->global_sContrato . "',
                                        '$dIdFecha',
                                        '$sNumeroOrden',
                                        '$sIdConvenioAct',
                                        '$sNumeroReporte',
                                        '$sIdTurno',
                                        '$sTiempo',
                                        '$sInicioPlatica',
                                        '$sFinalPlatica',
                                        '$sTema',
                                        '" . strtoupper($_SESSION['ssUsuario']) . "',
                                        '',
                                        '',
                                        '',
                                        '')";
         mysql_query($sql);
         if(mysql_error())
         {
            $error = true;
         }
         #incrementar iConsecutivo
         if($sNumeroOrden == $sContrato)
         {
            if($this->turnoTierra() == 'Si')
            {
               mysql_query("UPDATE ordenesdetrabajo Set iConsecutivoTierra = iConsecutivoTierra+1 Where sContrato = '" . $Connection->global_sContrato . "' And sNumeroOrden = '$sNumeroOrden'");
            }
            else
            {
               mysql_query("UPDATE configuracion  Set iConsecutivo = iConsecutivo+1 Where sContrato = '" . $Connection->global_sContrato . "'");
            }
            if(mysql_error())              {$error = true;}
         }
         else
         {
            if($this->turnoTierra() == 'Si')
            {
               mysql_query("UPDATE ordenesdetrabajo Set iConsecutivoTierra = iConsecutivoTierra+1 Where sContrato = '" . $Connection->global_sContrato . "' And sNumeroOrden = '$sNumeroOrden'");
            }
            else
            {
               mysql_query("UPDATE ordenesdetrabajo Set iConsecutivo = iConsecutivo+1 Where sContrato = '" . $Connection->global_sContrato . "' And sNumeroOrden = '$sNumeroOrden'");
            }
            if(mysql_error())              {$error = true;}
         }
         if($error)
            mysql_query("rollback");
         else
            mysql_query("commit");
      }
      else
         if($this->hOperacion->Value == "modificar")
         {
            $error = false;
            #Modificar unregistro
            $sql = "UPDATE reportediario
                                SET
                                sContrato='" . $Connection->global_sContrato . "',
                                dIdFecha='$dIdFecha',
                                sNumeroOrden='$sNumeroOrden',
                                sIdConvenio='$sIdConvenioAct',
                                sNumeroReporte='$sNumeroReporte',
                                sIdTurno='$sIdTurno',
                                sTiempo='$sTiempo',
                                sInicioPlatica='$sInicioPlatica',
                                sFinalPlatica='$sFinalPlatica',
                                sTema='$sTema'
                         WHERE
                                sContrato = '" . $Connection->global_sContrato . "'
                                and sNumeroOrden='$oldsNumeroOrden'
                                and dIdFecha='$olddIdFecha'
                                and sIdTurno='$oldsIdTurno'
                                and sIdConvenio='$oldsIdConvenio'
                                and sNumeroReporte='$oldsNumeroReporte'";
            mysql_query($sql);
            if(mysql_error())              {$error = true;}
            #Update reportefotografico
            $sql = "UPDATE reportefotografico
                               SET
                                  dIdFecha='$dIdFecha',
                                  sIdTurno='$sIdTurno',
                                  sNumeroReporte='$sNumeroReporte'
                               WHERE
                                  sContrato = '" . $Connection->global_sContrato . "'
                                  and dIdFecha='$olddIdFecha'
                                  and sIdTurno='$oldsIdTurno'
                                  and sNumeroReporte='$oldsNumeroReporte'
                                  and sNumeroOrden='$oldsNumeroOrden'";
            mysql_query($sql);
            if(mysql_error())              {$error = true;}
            #actualizar bitacoras
            $sql = "select iIdDiario
                                from bitacoradeactividades
                               Where sContrato = '" . $Connection->global_sContrato . "'
                               And dIdFecha = '$olddIdFecha'
                               And sNumeroOrden = '$oldsNumeroOrden'
                               And sIdTurno = '$oldsIdTurno'";
            $rs = mysql_query($sql);
            if($rw = mysql_fetch_array($rs))
            {
               $diario = $rw['iIdDiario'];
               mysql_query("UPDATE bitacoradepersonal Set dIdFecha ='$dIdFecha'
                                        Where sContrato = '" . $Connection->global_sContrato . "' And dIdFecha ='$olddIdFecha' And iIdDiario = '$diario' ");
               if(mysql_error())                 {$error = true;}
               mysql_query("UPDATE bitacoradeequipos Set dIdFecha = '$dIdFecha'
                                        Where sContrato = '" . $Connection->global_sContrato . "' And dIdFecha ='$olddIdFecha' And iIdDiario = '$diario' ");
               if(mysql_error())                 {$error = true;}

            }
            mysql_query("UPDATE bitacoradeactividades SET dIdFecha='$dIdFecha',sNumeroOrden='$sNumeroOrden',sIdTurno='$sIdTurno'
                                 WHERE sContrato = '" . $Connection->global_sContrato . "' and sNumeroOrden='$oldsNumeroOrden' and dIdFecha='$olddIdFecha' and sIdTurno='$oldsIdTurno'");
            if(mysql_error())              {$error = true;}
            mysql_query("UPDATE bitacoradealcances Set sIdTurno ='$sIdTurno', dIdFecha = '$dIdFecha'
                                 Where sContrato = '" . $Connection->global_sContrato . "' and sNumeroOrden='$oldsNumeroOrden' and dIdFecha='$olddIdFecha' and sIdTurno='$oldsIdTurno'");
            if(mysql_error())              {$error = true;}
            mysql_query("UPDATE tramitedepermisos Set sIdTurno = '$sIdTurno', dIdFecha = '$dIdFecha'
                                 Where sContrato = '" . $Connection->global_sContrato . "' and sNumeroOrden='$oldsNumeroOrden' and dIdFecha='$olddIdFecha' and sIdTurno='$oldsIdTurno'");
            if(mysql_error())              {$error = true;}
            mysql_query("UPDATE jornadasdiarias Set sIdTurno = '$sIdTurno' , dIdFecha ='$dIdFecha'
                                 Where sContrato = '" . $Connection->global_sContrato . "' and sNumeroOrden='$oldsNumeroOrden' and dIdFecha='$olddIdFecha' and sIdTurno='$oldsIdTurno'");
            if(mysql_error())              {$error = true;}
            if($error)
               mysql_query("rollback");
            else
               mysql_query("commit");
         }
   }

   function cmdAgregarJSClick($sender, $params)
   {

      ?>
                 document.getElementById("f-calendar-field-1").value=document.getElementById("hsdNuevaFecha").value;
                 document.getElementById("sNumeroReporte").value=document.getElementById("hsNumeroNuevoReporte").value;
                 document.getElementById("sInicioPlatica").value = "00:00";
                 document.getElementById("sFinalPlatica").value = "00:00";
                 document.getElementById("sTema").value = "N/A";
                 document.getElementById("hOperacion").value="agregar";
                 habilitar(false);
                 return false;
      <?php

   }

   function Button18JSClick($sender, $params)
   {

      ?>
               //Add your javascript code here
                  if(document.getElementById("hsContrato").value == ""){
                        alert("Seleccione un Registro de Reporte Diario!");
                  }else{
                          goto = "frmRelacionPersonalEquipo.php?reportediario=si&pag=1";
                          goto = goto + "&sContrato=" + document.getElementById("hsContrato").value;
                          goto = goto + "&dIdFecha=" + document.getElementById("hdIdFecha").value;
                          goto = goto + "&sNumeroOrden=" + document.getElementById("hsNumeroOrden").value;
                          goto = goto + "&sNumeroReporte=" + document.getElementById("hsNumeroReporte").value;
                          goto = goto + "&sIdConvenio=" + document.getElementById("hsIdConvenio").value;
                          goto = goto + "&sIdTurno="+ document.getElementById("hsIdTurno").value;
                          goto = goto + "&lStatus="+ document.getElementById("hlStatus").value;
                          document.location.href=goto;

                  }

                 return false;
      <?php

   }

   function Button16JSClick($sender, $params)
   {

      ?>
               //Add your javascript code here
                  if(document.getElementById("hsContrato").value == ""){
                        alert("Seleccione un Registro de Reporte Diario!");
                  }else{
                          goto = "frmControlAcarreo.php?reportediario=si&pag=1";
                          goto = goto + "&sContrato=" + document.getElementById("hsContrato").value;
                          goto = goto + "&dIdFecha=" + document.getElementById("hdIdFecha").value;
                          goto = goto + "&sNumeroOrden=" + document.getElementById("hsNumeroOrden").value;
                          goto = goto + "&sNumeroReporte=" + document.getElementById("hsNumeroReporte").value;
                          goto = goto + "&sIdConvenio=" + document.getElementById("hsIdConvenio").value;
                          goto = goto + "&sIdTurno="+ document.getElementById("hsIdTurno").value;
                          goto = goto + "&lStatus="+ document.getElementById("hlStatus").value;
                          document.location.href=goto;

                  }

                 return false;
      <?php

   }

   function cmdFotosJSClick($sender, $params)
   {

      ?>
               //Add your javascript code here
                  if(document.getElementById("hsContrato").value == ""){
                        alert("Seleccione un Registro de Reporte Diario!");
                  }else{
                          goto = "Modulos/preciounitario/actividadesdiarias/reportediario/fotografico/reportefotografico.php?reportediario=si&pag=1";
                          goto = goto + "&sContrato=" + document.getElementById("hsContrato").value;
                          goto = goto + "&Fecha=" + document.getElementById("hdIdFecha").value;
                          goto = goto + "&orden=" + document.getElementById("hsNumeroOrden").value;
                          goto = goto + "&numeroFolio=" + document.getElementById("hsNumeroReporte").value;
                          goto = goto + "&convenio=" + document.getElementById("hsIdConvenio").value;
                          goto = goto + "&sIdTurno="+ document.getElementById("hsIdTurno").value;
                          goto = goto + "&lStatus="+ document.getElementById("hlStatus").value;
                          window.open(goto,'ReporteFotografico','width=500,height=300,scrollbars=yes,resizable=yes,status=0,toolbar=0');
                  }

                 return false;
      <?php

   }

   function cmdPersonalJSClick($sender, $params)
   {

      ?>
               //Add your javascript code here
                  if(document.getElementById("hsContrato").value == ""){
                        alert("Seleccione un Registro de Reporte Diario!");
                  }else{
                          goto = "frmPersonalEquipo.php?reportediario=si&pag=1";
                          goto = goto + "&sContrato=" + document.getElementById("hsContrato").value;
                          goto = goto + "&dFecha=" + document.getElementById("hdIdFecha").value;
                          goto = goto + "&sNumeroOrden=" + document.getElementById("hsNumeroOrden").value;
                          goto = goto + "&convenio=" + document.getElementById("hsIdConvenio").value;
                          goto = goto + "&sIdTurno="+ document.getElementById("hsIdTurno").value;
                          goto = goto + "&lStatus="+ document.getElementById("hlStatus").value;
                          document.location.href=goto;
                  }
                  return false;
      <?php

   }

   function cmdAlcancesJSClick($sender, $params)
   {

      ?>
               //Add your javascript code here
                  if(document.getElementById("hsContrato").value == ""){
                        alert("Seleccione un Registro de Reporte Diario!");
                  }else{
                          goto = "Modulos/preciounitario/actividadesdiarias/reportediario/alcancesxpartida/alcances.php?reportediario=si&pag=1";
                          goto = goto + "&sContrato=" + document.getElementById("hsContrato").value;
                          goto = goto + "&dIdFecha=" + document.getElementById("hdIdFecha").value;
                          goto = goto + "&sNumeroOrden=" + document.getElementById("hsNumeroOrden").value;
                          goto = goto + "&convenio=" + document.getElementById("hsIdConvenio").value;
                          goto = goto + "&sIdTurno="+ document.getElementById("hsIdTurno").value;
                          goto = goto + "&lStatus="+ document.getElementById("hlStatus").value;
                          document.location.href=goto;
                  }
                  return false;
      <?php

   }

   function cmdVolumenesJSClick($sender, $params)
   {

      ?>
               //Add your javascript code here
                  if(document.getElementById("hsContrato").value == ""){
                        alert("Seleccione un Registro de Reporte Diario!");
                  }else{
                          goto = "Modulos/preciounitario/actividadesdiarias/reportediario/volumenes/volumenes.php?reportediario=si&pag=1";
                          goto = goto + "&sContrato=" + document.getElementById("hsContrato").value;
                          goto = goto + "&dIdFecha=" + document.getElementById("hdIdFecha").value;
                          goto = goto + "&sNumeroOrden=" + document.getElementById("hsNumeroOrden").value;
                          goto = goto + "&convenio=" + document.getElementById("hsIdConvenio").value;
                          goto = goto + "&sIdTurno="+ document.getElementById("hsIdTurno").value;
                          goto = goto + "&lStatus="+ document.getElementById("hlStatus").value;
                          document.location.href=goto;
                  }
                  return false;
      <?php

   }

   function cmdAvisosEmbarquesJSClick($sender, $params)
   {

      ?>
               //Add your javascript code here
                  if(document.getElementById("hsContrato").value == ""){
                        alert("Seleccione un Registro de Reporte Diario!");
                  }else{
                          goto = "frmAvisosEmbarques.php?reportediario=si&pag=1";
                          goto = goto + "&sContrato=" + document.getElementById("hsContrato").value;
                          goto = goto + "&fecha=" + document.getElementById("hdIdFecha").value;
                          goto = goto + "&orden=" + document.getElementById("hsNumeroOrden").value;
                          goto = goto + "&convenio=" + document.getElementById("hsIdConvenio").value;
                          goto = goto + "&turno="+ document.getElementById("hsIdTurno").value;
                          document.location.href=goto;
                  }
                  return false;
      <?php

   }

   function cmdPermisosJSClick($sender, $params)
   {

      ?>
               //Add your javascript code here
                  if(document.getElementById("hsContrato").value == ""){
                        alert("Seleccione un Registro de Reporte Diario!");
                  }else{
                          goto = "Modulos/preciounitario/permisosdeseguridad/index.php?reportediario=si&pag=1";
                          goto = goto + "&sContrato=" + document.getElementById("hsContrato").value;
                          goto = goto + "&fecha=" + document.getElementById("hdIdFecha").value;
                          goto = goto + "&orden=" + document.getElementById("hsNumeroOrden").value;
                          goto = goto + "&convenio=" + document.getElementById("hsIdConvenio").value;
                          goto = goto + "&turno="+ document.getElementById("hsIdTurno").value;
                          document.location.href=goto;
                  }
                  return false;
      <?php

   }

   function cmdFirmantesJSClick($sender, $params)
   {

      ?>
               //Add your javascript code here
                  if(document.getElementById("hsContrato").value == ""){
                        alert("Seleccione un Registro de Reporte Diario!");
                  }else{
                          goto = "frmFirmas.php?reportediario=si";
                          goto = goto + "&sContrato=" + document.getElementById("hsContrato").value;
                          goto = goto + "&fecha=" + document.getElementById("hdIdFecha").value;
                          goto = goto + "&orden=" + document.getElementById("hsNumeroOrden").value;
                          goto = goto + "&convenio=" + document.getElementById("hsIdConvenio").value;
                          goto = goto + "&turno="+ document.getElementById("hsIdTurno").value;
                          document.location.href=goto;
                  }
                  return false;
      <?php

   }

   function cmdJornadasJSClick($sender, $params)
   {

      ?>
               //Add your javascript code here
                  if(document.getElementById("hsContrato").value == ""){
                        alert("Seleccione un Registro de Reporte Diario!");
                  }else{
                          goto = "Modulos/preciounitario/actividadesdiarias/reportediario/jornadas/mostrar.php?";
                          goto = goto + "sContrato=" + document.getElementById("hsContrato").value;
                          goto = goto + "&fecha=" + document.getElementById("hdIdFecha").value;
                          goto = goto + "&orden=" + document.getElementById("hsNumeroOrden").value;
                          goto = goto + "&convenio=" + document.getElementById("hsIdConvenio").value;
                          goto = goto + "&turno="+ document.getElementById("hsIdTurno").value;
                          document.location.href=goto;
                  }
                  return false;
      <?php

   }



   function sNumeroOrdenChange($sender, $params)
   {
      global $Connection;
      $sNumeroOrden = $this->sNumeroOrden->getItemIndex();
      $_SESSION['ssNumeroOrden'] =  $sNumeroOrden;
      $this->qryRd->setActive(false);
      $this->qryRd->setFilter("
                        reportediario.sContrato ='" . $Connection->global_sContrato . "'
                        AND reportediario.sNumeroOrden ='$sNumeroOrden'
                        ");
      $this->qryRd->setActive(true);

   }

   function FrmReporteDiarioShow($sender, $params)
   {
      global $_SESSION, $Usuario, $Clave, $Servidor, $_REQUEST;
      global $sContrato, $global_grupo;
      global $Connection;
      #verificar permisos de acceso a botones
      if(fnPrivilegiosBotones($global_grupo, "rDiario", "insertar") != "Si")
         $this->cmdAgregar->setEnabled(false);
      if(fnPrivilegiosBotones($global_grupo, "rDiario", "editar") != "Si")
         $this->cmdModificar->setEnabled(false);
      if(fnPrivilegiosBotones($global_grupo, "rDiario", "eliminar") != "Si")
         $this->cmdEliminar->setEnabled(false);
//      if(fnPrivilegiosBotones($global_grupo, "rDiario", "imprimir") != "Si")
//         $this->cmdImprimir->setEnabled(false);
      if(fnPrivilegiosBotones($global_grupo, "rDiario", "insertar") != "Si"
       and
      fnPrivilegiosBotones($global_grupo, "rDiario", "editar") != "Si")
      {
         $this->cmdAceptar->setEnabled(false);
         $this->cmdCancelar->setEnabled(false);
      }
      //Conectar a la base de datos
      //      $this->Database1->setConnected(false);
      //      $this->Database1->setDatabaseName($_SESSION['database']);
      //      $this->Database1->setUserName($Usuario);
      //      $this->Database1->setUserPassword($Clave);
      //      $this->Database1->setHost($Servidor);
      //      $this->Database1->setConnected(true);
//      $Connection->base->setConnected(false);
//      $Connection->base->setConnected(true);
      $Connection->conectar();



      $sNumeroOrdenInicial = "";
      $sql = "select sNumeroOrden from ordenesdetrabajo
                        where sContrato='" . $Connection->global_sContrato . "'";
      $rs = mysql_query($sql);

      unset($it);
      while($rw = mysql_fetch_array($rs))
      {
         #($sno == "")? $sno = $rw['sNumeroOrden']: "";
         //echo $rw['sNumeroOrden']."<br>";
         $it[$rw['sNumeroOrden']] = $rw['sNumeroOrden'];
         if($sNumeroOrdenInicial == "")
            $sNumeroOrdenInicial = $rw['sNumeroOrden'];
      }
      $this->sNumeroOrden->Clear();
      unset($this->sNumeroOrden->Items);


      $this->sNumeroOrden->setItems($it);
      if($this->sNumeroOrden->getItemIndex() < 0)
      {
         $sNumeroOrden = $sNumeroOrdenInicial;
      }
      else
      {
         $sNumeroOrden = $this->sNumeroOrden->getItemIndex();
      }
      //en ocaciones, no cambia el numero de orden al cambiar el contrato
      //por ello, se busca el seleccionado, si no es encontrado
      //se usa el Numero de orden inicial
      $sql = "select sNumeroOrden from ordenesdetrabajo
                        where sContrato='" . $Connection->global_sContrato . "'
                        and sNumeroOrden='$sNumeroOrden'";
      $rs = mysql_query($sql);

      if (!$rw = mysql_fetch_array($rs)){
         $this->sNumeroOrden->ItemIndex =$sNumeroOrdenInicial;
         $sNumeroOrden = $sNumeroOrdenInicial;
      }

        $_SESSION['ssNumeroOrden'] = $sNumeroOrden;

      //echo $this->sNumeroOrden->getItemIndex();

      $this->qryRd->setActive(false);
      $this->qryRd->setFilter("");
      $this->qryRd->setFilter("
                        reportediario.sContrato ='" . $Connection->global_sContrato . "'
                        AND reportediario.sNumeroOrden ='$sNumeroOrden'
                        ");
      $this->qryRd->setActive(true);


//      foreach ($this->qryRd->SQL as $index => $value)
//      {
//        echo $value ." ";
//      }
//
//      echo $this->qryRd->getFilter();
      ##Crear el Numero de Reporte

      if($sNumeroOrden == $sContrato)
      {
         $sql = "select sPrefijo from turnos where sContrato='" . $Connection->global_sContrato . "' and sIdTurno='" . $_SESSION['ssIdTurno'] . "'
                                and sOrigenTierra='Si'";
         if($rw = mysql_fetch_array(mysql_query($sql)))
         {
            $sOrigenTierra = 'Si';
            if($rw['sPrefijo'] != "")
               $sFormato = $rw['sPrefijo'] . "-";
            $sql = "Select sFormato from configuracion where sContrato = '" . $Connection->global_sContrato . "'";
            if($rwsFormato = mysql_fetch_array(mysql_query($sql)))
            {
               $sFormato = $rwsFormato['sFormato'] . $sFormato;
            }
            $sql = "Select iConsecutivoTierra from ordenesdetrabajo where sContrato ='" . $Connection->global_sContrato . "' and sNumeroOrden = '$sNumeroOrden'";
            if($rwiConsecutivoTierra = mysql_fetch_array(mysql_query($sql)))
            {
               $iConsecutivo = $rwiConsecutivoTierra['iConsecutivoTierra'];
            }
         }
         else
         {
            $sOrigenTierra = 'No';
            $sql = "SELECT iConsecutivo,sFormato FROM configuracion where sContrato='" . $Connection->global_sContrato . "'  GROUP BY sContrato";
            $result = mysql_query($sql);
            if($row = mysql_fetch_array($result))
            {
               $sFormato = $row['sFormato'];
               $iConsecutivo = $row['iConsecutivo'];
            }
         }
      }
      else
      {
         $sql = "select sPrefijo from turnos where sContrato='" . $Connection->global_sContrato . "' and sIdTurno='" . $_SESSION['ssIdTurno'] . "'
                                                and sOrigenTierra='Si'";
         if($rw = mysql_fetch_array(mysql_query($sql)))
         {
            if($rw['sPrefijo'] != "")
               $sFormato = $rw['sPrefijo'] . "-";
            $sOrigenTierra = 'Si';
         }
         else
         {
            $sOrigenTierra = 'No';
         }
         $sql = "SELECT iConsecutivo, iConsecutivoTierra, sFormato FROM ordenesdetrabajo where sContrato='" . $Connection->global_sContrato . "' AND sNumeroOrden='$sNumeroOrden' GROUP BY sNumeroOrden";
         $result = mysql_query($sql);
         if($row = mysql_fetch_array($result))
         {
            if($sOrigenTierra == 'Si')
            {
               $iConsecutivo = $row['iConsecutivoTierra'];
            }
            else
            {
               $iConsecutivo = $row['iConsecutivo'];
            }
            $sFormato = $row['sFormato'];
         }
      }
      if(strlen($iConsecutivo) == 1)
         $iConsecutivo = "00$iConsecutivo";
      if(strlen($iConsecutivo) == 2)
         $iConsecutivo = "0$iConsecutivo";
      $numeroFolio = trim($sFormato) . trim($iConsecutivo);
      $this->hsNumeroNuevoReporte->Value = $numeroFolio;
      ##Seleccionar la ultima fecharegistrada en la orden
      $sql = "SELECT MAX(dIdFecha) FROM reportediario WHERE sContrato='" . $Connection->global_sContrato . "' and sNumeroOrden='$sNumeroOrden' ";
      if($row = mysql_fetch_array($resul = mysql_query($sql)))
         $fecha = $row[0];
      if($fecha == "")
      {
         $fecha = date("Y-m-d");
      }
      else
      {
         if(preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/", $fecha))
            list($ano, $mes, $dia) = split("/", $fecha);
         if(preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/", $fecha))
            list($ano, $mes, $dia) = split("-", $fecha);
         $nueva = mktime(0, 0, 0, $mes, $dia + 1, $ano);// + $ndias * 24 * 60 * 60;
         $fecha = date("Y-m-d", $nueva);
      }
      $this->hsdNuevaFecha->Value = $fecha;
      #cargar los turnos
      $sql = "select sIdTurno,sDescripcion from turnos where sContrato='" . $Connection->global_sContrato . "'";
      $rs = mysql_query($sql);
      unset($it);
      while($rw = mysql_fetch_array($rs))
      {
         $it[$rw['sIdTurno']] = $rw['sDescripcion'];
      }
      $this->sIdTurno->setItems($it);
      $this->sIdTurno->setItemIndex($_SESSION['ssIdTurno']);

   }
   function FrmReporteDiarioBeforeShow($sender, $params)
   {
//      #Conectar a la base de datos
////      global $_SESSION, $Usuario, $Clave, $Servidor, $_REQUEST;
////      global $sContrato;
//      global $Connection;
//      #Conectar a la base de datos
//      //      $this->Database1->setConnected(false);
//      //      $this->Database1->setDatabaseName($_SESSION['database']);
//      //      $this->Database1->setUserName($Usuario);
//      //      $this->Database1->setUserPassword($Clave);
//      //      $this->Database1->setHost($Servidor);
//      //      $this->Database1->setConnected(true);
//      $Connection->base->setConnected(false);
//      $Connection->base->setConnected(true);

   }
    function Button1JSClick($sender, $params)
    {
        ?>
        //begin js
                  aler("ddd");
                  return false;
        //end
        <?php
    }
    function dbgReporteDiarioJSClick($sender, $params)
    {

      ?>
                  dbgReporteDiario.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = dbgReporteDiario.getTableModel();

                        document.getElementById("hsContrato").value = tableModel.getValue(0, index);
                        document.getElementById("hsIdConvenio").value = tableModel.getValue(1, index);
                        document.getElementById("hdIdFecha").value = tableModel.getValue(2, index);
                        document.getElementById("f-calendar-field-1").value = tableModel.getValue(2, index);
                        document.getElementById("hsIdTurno").value = tableModel.getValue(4, index);
                        document.getElementById("sIdTurno").value = tableModel.getValue(4, index);
                        document.getElementById("hsNumeroReporte").value = tableModel.getValue(6, index);
                        document.getElementById("sNumeroReporte").value = tableModel.getValue(6, index);
                        document.getElementById("hsNumeroOrden").value = document.getElementById("sNumeroOrden").value;
                        document.getElementById("hlStatus").value = tableModel.getValue(7, index);

                        document.getElementById("sOperacionInicio").value = tableModel.getValue(10, index);
                        document.getElementById("sOperacionFinal").value = tableModel.getValue(11, index);
                        document.getElementById("sTiempoMuerto").value = tableModel.getValue(12, index);
                        document.getElementById("sTiempoMuertoReal").value = tableModel.getValue(13, index);
                        document.getElementById("sTiempoEfectivo").value = tableModel.getValue(14, index);
                        document.getElementById("sTiempo").value = tableModel.getValue(15, index);
                        document.getElementById("sTransporte").value = tableModel.getValue(16, index);
                        document.getElementById("sInicioPlatica").value = tableModel.getValue(17, index);
                        document.getElementById("sFinalPlatica").value = tableModel.getValue(18, index);
                        document.getElementById("sTema").value = tableModel.getValue(19, index);

                     }

                  );

                 return false;
        <?php
    }

}

global $application;

global $FrmReporteDiario;

//Creates the form
$FrmReporteDiario = new frmReporteDiario($application);

//Read from resource file
$FrmReporteDiario->loadResource(__FILE__);

//Shows the form
$FrmReporteDiario->show();

?>
<script languaje="javascript">
habilitar(true);
</script>
