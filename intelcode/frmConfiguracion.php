<?php
        //Includes
        //require_once("vcl/vcl.inc.php");
        require_once("rpcl/rpcl.inc.php");
        use_unit("interbase.inc.php");
        use_unit("clock.inc.php");
        use_unit("/edituploadfile/edituploadfile.inc.php");
        use_unit("comctrls.inc.php");
        use_unit("forms.inc.php");
        use_unit("extctrls.inc.php");
        use_unit("stdctrls.inc.php");
        require("mysql.inc.php");
        require("fnUtilerias.php");
        //Class definition
        class FrmConfiguracion extends Page
        {
               public $cmdLoadImagen = null;
               public $Label71 = null;
               public $sOrdenPerEq = null;
               public $lIncluyeAvanceOrdenes = null;
               public $lCalculaFecha = null;
               public $cmdSalvar = null;
               public $panelCompania = null;
               public $sIdPernocta = null;
               public $sImprimePEP = null;
               public $sRangoAjusteMayor = null;
               public $sRangoAjusteMenor = null;
               public $iRedondeoEmbarcacion = null;
               public $iRedondeoPersonal = null;
               public $iRedondeoEquipo = null;
               public $iRedondeoMaterial = null;
               public $sAvanceAnterior = null;
               public $sAvanceInicial = null;
               public $sTipoAjusteCosto = null;
               public $sTerminoPenalizacion = null;
               public $dPenaConvencional = null;
               public $sImporteRetencion = null;
               public $sBaseCalculo = null;
               public $dRetencion = null;
               public $sIdFase = null;
               public $sTipoCIA = null;
               public $sTipoAlcance = null;
               public $sTipoOperacion = null;
               public $sIdEmbarcacion = null;
               public $sIdDepartamento = null;
               public $sOrdenExtraordinaria = null;
               public $cStatusSuspendida = null;
               public $cStatusTerminada = null;
               public $cStatusProceso = null;
               public $bImagen = null;
               public $sEmail = null;
               public $sWeb = null;
               public $sFax = null;
               public $sTelefono = null;
               public $sPiePagina = null;
               public $sSlogan = null;
               public $sDireccion3 = null;
               public $sDireccion2 = null;
               public $sDireccion1 = null;
               public $sRfc = null;
               public $sNombre = null;
               public $sNombreCorto = null;
               public $sMedida = null;
               public $sIdAnexo = null;
               public $txtMaterialAutomatico = null;
               public $txtValidaMaterial = null;
               public $sDevolucion = null;
               public $sClaveDevolucion = null;
               public $Upload1 = null;
               public $Image1 = null;
               public $Label84 = null;
               public $Label83 = null;
               public $Label82 = null;
               public $Label81 = null;
               public $Label79 = null;
               public $Label78 = null;
               public $Label76 = null;
               public $Label73 = null;
               public $Label72 = null;
               public $Label70 = null;
               public $panelAlmacen = null;
               public $Label68 = null;
               public $Label80 = null;
               public $Label69 = null;
               public $Label66 = null;
               public $Label65 = null;
               public $Label64 = null;
               public $Label62 = null;
               public $panelFormatos = null;
               public $Label196 = null;
               public $Label195 = null;
               public $Label194 = null;
               public $Label193 = null;
               public $Label192 = null;
               public $Label191 = null;
               public $Label190 = null;
               public $Label189 = null;
               public $Label188 = null;
               public $Label187 = null;
               public $Label186 = null;
               public $Label185 = null;
               public $Label184 = null;
               public $Label183 = null;
               public $Label182 = null;
               public $Label181 = null;
               public $Label180 = null;
               public $Label179 = null;
               public $Label178 = null;
               public $Label177 = null;
               public $Label176 = null;
               public $Label175 = null;
               public $Label174 = null;
               public $Label173 = null;
               public $Label172 = null;
               public $Label171 = null;
               public $Label170 = null;
               public $Label169 = null;
               public $Label168 = null;
               public $Label167 = null;
               public $Label198 = null;
               public $panelArchivos = null;
               public $lIncluyeAvanceContrato = null;
               public $lIncluyeGrafica = null;
               public $lComentariosReporte = null;
               public $sFotografias = null;
               public $lDistribucion = null;
               public $iMeses = null;
               public $iFirmas = null;
               public $sViewIsometrico = null;
               public $sTipsInicial = null;
               public $sFirmasElectronicas = null;
               public $Label61 = null;
               public $lExporta = null;
               public $sTipoSeguridad = null;
               public $sIsometricos = null;
               public $sGerencial = null;
               public $sReporteDiario = null;
               public $Label60 = null;
               public $Label59 = null;
               public $Label58 = null;
               public $Label57 = null;
               public $Label56 = null;
               public $Label55 = null;
               public $Label54 = null;
               public $Label53 = null;
               public $Label52 = null;
               public $Label51 = null;
               public $Label49 = null;
               public $Label47 = null;
               public $Label46 = null;
               public $Label44 = null;
               public $Label67 = null;
               public $Label50 = null;
               public $Label48 = null;
               public $Label45 = null;
               public $sEquipoSeguridad = null;
               public $sClaveSeguridad = null;
               public $sClaveTierra = null;
               public $sFalta = null;
               public $sIdGuardia = null;
               public $lAsistencia = null;
               public $iJDomingo = null;
               public $iJSabado = null;
               public $iJViernes = null;
               public $iJJueves = null;
               public $iJMiercoles = null;
               public $iJMartes = null;
               public $iJLunes = null;
               public $iReportesSinValid = null;
               public $sPartidaEfectiva = null;
               public $sTipoPartida = null;
               public $sAvanceBitacora = null;
               public $lImprimeExtraordinario = null;
               public $iConsecutivo = null;
               public $sFormato = null;
               public $sTipoEstimacion = null;
               public $sSeguridadGenerador = null;
               public $sTipoGeneracion = null;
               public $sBaseGeneracion = null;
               public $lAutomatico = null;
               public $sDuracion = null;
               public $iLongActividad = null;
               public $lCalculoPonderado = null;
               public $sIdConvenio = null;
               public $iIncremento = null;
               public $sRangoEstimacion = null;
               public $sTipoContrato = null;
               public $Label43 = null;
               public $Label42 = null;
               public $Label41 = null;
               public $Label40 = null;
               public $Label39 = null;
               public $Label38 = null;
               public $Label37 = null;
               public $Label36 = null;
               public $Label35 = null;
               public $Label31 = null;
               public $Label34 = null;
               public $Label33 = null;
               public $Label32 = null;
               public $Label29 = null;
               public $Label28 = null;
               public $Label27 = null;
               public $Label26 = null;
               public $Label25 = null;
               public $Label24 = null;
               public $Label23 = null;
               public $Label22 = null;
               public $Label21 = null;
               public $Label20 = null;
               public $Label19 = null;
               public $panelSistema = null;
               public $Label30 = null;
               public $cmdPersonal = null;
               public $cmdSistema = null;
               public $cmdSeguridad = null;
               public $cmdFormatos = null;
               public $cmdAlmacen = null;
               public $cmdCompania = null;
               public $panelPersonal = null;
               public $Label18 = null;
               public $Label17 = null;
               public $Label16 = null;
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
               public $Label1 = null;
               public $noExisten;
               public $Combos;
               function sImprimePEPJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sImprimePEPJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sImprimePEPJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdPernoctaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdPernoctaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdPernoctaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sEquipoSeguridadJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sEquipoSeguridadJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sEquipoSeguridadJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sClaveSeguridadJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sClaveSeguridadJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sClaveSeguridadJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sClaveTierraJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sClaveTierraJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sClaveTierraJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFaltaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFaltaJSKeyDown($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFaltaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFaltaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdGuardiaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdGuardiaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdGuardiaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lAsistenciaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lAsistenciaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lAsistenciaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJDomingoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJDomingoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJDomingoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJSabadoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJSabadoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJSabadoJSKeyUp($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJSabadoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJViernesJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJViernesJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJViernesJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJJuevesJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJJuevesJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJJuevesJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJMiercolesJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJMiercolesJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJMiercolesJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJMartesJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJMartesJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJMartesJSKeyUp($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJMartesJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJLunesJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJLunesJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iJLunesJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iReportesSinValidJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iReportesSinValidJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iReportesSinValidJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sOrdenPerEqJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sOrdenPerEqJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sOrdenPerEqJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPartidaEfectivaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPartidaEfectivaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPartidaEfectivaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoPartidaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoPartidaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoPartidaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoEstimacionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoEstimacionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoEstimacionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sSeguridadGeneradorJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sSeguridadGeneradorJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sSeguridadGeneradorJSKeyUp($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sSeguridadGeneradorJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoGeneracionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoGeneracionJSKeyDown($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoGeneracionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoGeneracionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sBaseGeneracionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sBaseGeneracionJSKeyUp($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sBaseGeneracionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sBaseGeneracionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sAvanceBitacoraJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sAvanceBitacoraJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sAvanceBitacoraJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lImprimeExtraordinarioJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lImprimeExtraordinarioJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lImprimeExtraordinarioJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iConsecutivoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iConsecutivoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iConsecutivoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFormatoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFormatoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFormatoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lAutomaticoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lAutomaticoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lAutomaticoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDuracionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDuracionJSKeyDown($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDuracionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDuracionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lCalculaFechaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lCalculaFechaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lCalculaFechaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iLongActividadJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iLongActividadJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iLongActividadJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lCalculoPonderadoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lCalculoPonderadoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lCalculoPonderadoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdConvenioJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdConvenioJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdConvenioJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iIncrementoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iIncrementoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iIncrementoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRangoEstimacionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRangoEstimacionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRangoEstimacionJSChange($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoContratoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoContratoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoContratoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lIncluyeAvanceOrdenesJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lIncluyeAvanceOrdenesJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lIncluyeAvanceOrdenesJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lIncluyeAvanceContratoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lIncluyeAvanceContratoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lIncluyeAvanceContratoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lIncluyeGraficaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lIncluyeGraficaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lIncluyeGraficaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lComentariosReporteJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lComentariosReporteJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lComentariosReporteJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFotografiasJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFotografiasJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFotografiasJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lExportaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lExportaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lExportaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lDistribucionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lDistribucionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function lDistribucionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iMesesJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iMesesJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iMesesJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iFirmasJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iFirmasJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iFirmasJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sViewIsometricoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sViewIsometricoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sViewIsometricoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipsInicialJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipsInicialJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipsInicialJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmasElectronicasJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmasElectronicasJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFirmasElectronicasJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoSeguridadJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoSeguridadJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoSeguridadJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIsometricosJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIsometricosJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIsometricosJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sGerencialJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sGerencialJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sGerencialJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sReporteDiarioJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sReporteDiarioJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sReporteDiarioJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sAvanceAnteriorJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sAvanceAnteriorJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sAvanceAnteriorJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sAvanceInicialJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sAvanceInicialJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sAvanceInicialJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRangoAjusteMayorJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRangoAjusteMayorJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRangoAjusteMayorJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRangoAjusteMenorJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRangoAjusteMenorJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRangoAjusteMenorJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iRedondeoEmbarcacionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iRedondeoEmbarcacionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iRedondeoEmbarcacionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iRedondeoPersonalJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iRedondeoPersonalJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iRedondeoPersonalJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iRedondeoEquipoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iRedondeoEquipoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iRedondeoEquipoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iRedondeoMaterialJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iRedondeoMaterialJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function iRedondeoMaterialJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoAjusteCostoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoAjusteCostoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoAjusteCostoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTerminoPenalizacionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTerminoPenalizacionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTerminoPenalizacionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dPenaConvencionalJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dPenaConvencionalJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dPenaConvencionalJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sImporteRetencionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sImporteRetencionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sImporteRetencionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sBaseCalculoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sBaseCalculoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sBaseCalculoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dRetencionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dRetencionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function dRetencionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdFaseJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdFaseJSKeyDown($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdFaseJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdFaseJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoCIAJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoCIAJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoCIAJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoAlcanceJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoAlcanceJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoAlcanceJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoOperacionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoOperacionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTipoOperacionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdEmbarcacionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdEmbarcacionJSKeyUp($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdEmbarcacionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdEmbarcacionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdDepartamentoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdDepartamentoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdDepartamentoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sOrdenExtraordinariaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sOrdenExtraordinariaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sOrdenExtraordinariaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cStatusSuspendidaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cStatusSuspendidaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cStatusSuspendidaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cStatusTerminadaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cStatusTerminadaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cStatusTerminadaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cStatusProcesoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cStatusProcesoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function cStatusProcesoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sMedidaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sMedidaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sMedidaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdAnexoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdAnexoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sIdAnexoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMaterialAutomaticoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMaterialAutomaticoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtMaterialAutomaticoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtValidaMaterialJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtValidaMaterialJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtValidaMaterialJSKeyDown($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function txtValidaMaterialJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDevolucionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDevolucionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDevolucionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sClaveDevolucionJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sClaveDevolucionJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sClaveDevolucionJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sEmailJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sEmailJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sEmailJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sWebJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sWebJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sWebJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFaxJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFaxJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sFaxJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTelefonoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTelefonoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sTelefonoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPiePaginaJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPiePaginaJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sPiePaginaJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sSloganJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sSloganJSKeyDown($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sSloganJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sSloganJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDireccion3JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDireccion3JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDireccion3JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDireccion2JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDireccion2JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDireccion2JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDireccion1JSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDireccion1JSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sDireccion1JSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRfcJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRfcJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sRfcJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sNombreJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sNombreJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sNombreJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sNombreCortoJSKeyPress($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sNombreCortoJSFocus($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function sNombreCortoJSBlur($sender, $params)
               {

               ?>
               //Add your javascript code here

               <?php

               }

               function FrmConfiguracionJSLoad($sender, $params)
               {

               ?>
                 document.getElementById("panelCompania_outer").style.display  ='block';
                 document.getElementById("panelAlmacen_outer").style.display   ='none';
                 document.getElementById("panelFormatos_outer").style.display  ='none';
                 document.getElementById("panelArchivos_outer").style.display  ='none';
                 document.getElementById("panelSistema_outer").style.display   ='none';
                 document.getElementById("panelPersonal_outer").style.display  ='none';
                 return false;
               <?php

               }

               function loadImagen(){
                  global $sContrato;
                  $sql = "select bImagen from configuracion where sContrato='$sContrato'";
                  $rs = mysql_query($sql);
                  if($row = mysql_fetch_array($rs)){
                       if($row["bImagen"]!=""){
                              $file = fopen("cambiarLogo/$sContrato.jpg","w");
                              fwrite($file,$row["bImagen"]);
                              fclose($file);
                              if(file_exists("cambiarLogo/$sContrato.jpg")){
                                 $this->Image1->ImageSource="cambiarLogo/$sContrato.jpg";
                              }
                              else
                                 $this->Image1->ImageSource="recursos/imagenes/intelcode.png";
                       }
                  }

               }
               function cmdLoadImagenJSClick($sender, $params)
               {
                echo $this->cmdLoadImagen->ajaxCall("loadImagen",array(),array("Image1"));
               ?>
               //Add your javascript code here
                  return false;
               <?php

               }

               function Image1JSClick($sender, $params)
               {

               ?>
               //Add your javascript code here
                   window.open("cambiarLogo/cambiarLogo.php","_blank","fullscreen=no,menubar=no,status=no,titlebar=no,toolbar=no,heigth=300,width=300");
                   return false;
               <?php

               }

               function LeerTextoCombo($Combo){
                  eval("\$indice=".$Combo."->readItemIndex();");
                  eval("\$valor=".$Combo."->readItems();");
                  foreach($valor as $i => $v){
                     if($i == $indice) {
                         return $v;
                     }
                  }
                  return -1;
               }
               function LeerIndexCombo($combo){
                  eval("\$valor = ".$combo."->readItemIndex();");
                  return $valor;
               }
               function ponerCombo($combo,$valor,$compararX="valor"){
                  #poner o seleccionar el valor de un combo
                 eval("\$Combo=".$combo."->getItems();");
                 foreach ($Combo as $index=>$value){
                     #seleccionar segun valor del indice
                    if($compararX=="indice"){
                         if(trim($index)==trim($valor)){
                            $evaluacion =  $combo."->setItemIndex('$index');";
                            eval($evaluacion);
                         }
                    }
                     #seleccionar segun valor del texto
                    if($compararX=="valor"){
                       if(trim($value)==trim($valor)){
                           $evaluacion =  $combo."->setItemIndex('$index');";
                           eval($evaluacion);
                        }
                    }
                  }
               }

               function cargarCombo($combo,$valor,$indice,$sql){
                  #cargar la lista de valordes de un combo con un sql
                  $rs = mysql_query($sql);
                  while($row = mysql_fetch_array($rs))
                     $it[$row[$indice]]=$row[$valor];
                    eval($combo."->setItems(\$it);");
               }
               function cmdSalvarClick($sender, $params)
               {
                  global $sContrato;
                  $this->cargarCampos();
                  $insert = "insert into configuracion (";
                  $campos = "sContrato,bImagen,sFolder,sFasePrincipal,sPaquete,sProteccion,sHost,";
                  $valores = "'$sContrato','','','','','','',";
                  $duplicado = "";
                  $sql = "select * from configuracion limit 1;";
                  $rs = mysql_query($sql);
                  if($row = mysql_fetch_array($rs)){
                     for($iCampo=0;$iCampo<mysql_num_fields($rs);$iCampo++){

                       $campo = mysql_field_name($rs,$iCampo);
                       $nombreInput ="$"."this->".$campo;
                       $valor = "/**/";
                       #checkBox
                       if($campo=='lExporta'){
                            if($this->lExporta->Checked == true){
                               $val = "Si";
                            }
                            else{
                               $val = "No";
                            }
                           #$val = strtoupper($val);
                           $campos .= "\n$campo,";
                           $valores .=   "\n'$val',";
                           $duplicado .=  "\n$campo = '$val',";
                       }
                       if (in_array($campo,$this->noExisten)){
                           continue;
                       }
                       else if (in_array($campo, $this->Combos) and $campo=="sIdConvenio"){
                           $valor = $this->LeerIndexCombo($nombreInput);
                       }
                       else if (in_array($campo, $this->Combos)) {
                           $valor =$this->LeerTextoCombo($nombreInput);
                        }
                        else {
                            eval("\$valor=".$nombreInput."->Text;");
                        }
                        #$valor = strtoupper($valor);
                        if($valor != "/**/") {
                               $campos .= "\n$campo,";
                               $valores .=   "\n'$valor',";
                               $duplicado .=  "\n$campo = '$valor',";
                        }
                    }
                  }


                  $campos.="<_";
                  $valores.="<_";
                   $duplicado.="<_";
                  $campos=str_replace(",<_",") ",$campos);
                  $valores=str_replace(",<_",") ",$valores);
                  $duplicado=str_replace(",<_"," ",$duplicado);
                  $insert .= $campos." values (".$valores." on duplicate key update $duplicado";
                  if(!mysql_query($insert)){
                    $this->Label71->Caption = mysql_error();
                  }
                  $file = fopen("query.txt","w");
                  fwrite($file,$insert);
                  fclose($file);

               }
               function cargarCampos(){
                       $this->Combos = array(
                              "lAsistencia",
                              "sImprimePEP",
                              "sBaseCalculo",
                              "sImporteRetencion",
                              "sTerminoPenalizacion",
                              "sTipoAjusteCosto",
                              "iRedondeoMaterial",
                              "iRedondeoEquipo",
                              "iRedondeoPersonal",
                              "iRedondeoEmbarcacion",
                              "sTipoSeguridad",
                              "sFirmasElectronicas",
                              "sTipsInicial",
                              "sViewIsometrico",
                              "iFirmas",
                              "iMeses",
                              "sFotografias",
                              "lComentariosReporte",
                              "lIncluyeGrafica",
                              "lIncluyeAvanceContrato",
                              "lIncluyeAvanceOrdenes",
                              "lDistribucion",
                              "sTipoContrato",
                              "sRangoEstimacion",
                              "iIncremento",
                              "sIdConvenio",
                              "lCalculoPonderado",
                              "lImprimeExtraordinario",
                              "sAvanceBitacora",
                              "sDuracion",
                              "lAutomatico",
                              "sBaseGeneracion",
                              "sTipoGeneracion",
                              "sSeguridadGenerador",
                              "sTipoEstimacion",
                              "sTipoPartida",
                              "sPartidaEfectiva",
                              "sOrdenPerEq",
                              "lCalculaFecha");
                        $this->noExisten=array(
                              "sContrato",
                              "bImagen",
                              "lLicencia",
                              "sHost",
                              "sFolder",
                              "lExporta",
                              "sFasePrincipal",
                              "sPaquete",
                              "sProteccion",
			      "sCampPerf");
               }
               function FrmConfiguracionShow($sender, $params)
               {
                  global $sContrato;
                  $this->cargarCampos();
                  $sql="select * from convenios where sContrato='$sContrato'";
                  $this->cargarCombo("\$this->sIdConvenio","sDescripcion","sIdConvenio",$sql);

                  $sql = "select * from configuracion where sContrato='$sContrato'";
                  $rs = mysql_query($sql);
                  if($row = mysql_fetch_array($rs)){
                     for($iCampo=0;$iCampo<mysql_num_fields($rs);$iCampo++){
                       $campo = mysql_field_name($rs,$iCampo);
                       $nombre ="$"."this->".$campo;
                       $evaluacion = $nombre."->Text=\"".$row[$campo]."\";";
                       if($campo == "bImagen"){
                           if($row[$campo]!=""){
                              $file = fopen("cambiarLogo/$sContrato.jpg","w");
                              fwrite($file,$row[$campo]);
                              fclose($file);
                              if(file_exists("cambiarLogo/$sContrato.jpg")){
                                 $this->Image1->ImageSource="cambiarLogo/$sContrato.jpg";
                              }
                           }
                       }
                       if($campo=='lExporta'){
                           if($row[$campo]=='Si'){
                              $this->lExporta->Checked = true;
                           }
                           else{
                              $this->lExporta->Checked = false;
                           }
                       }
                       if (in_array($campo,$this->noExisten)){
                        continue;
                       }
                       if (in_array($campo, $this->Combos)) {
                           if(strpos($nombre,"sIdConvenio")!==false){
                              $this->ponerCombo($nombre,$row[$campo],"indice") ;
                           }
                           else{
                              $this->ponerCombo($nombre,$row[$campo],"valor") ;
                           }
                           continue;
                        }
                        eval($evaluacion);
                    }
                  }
               }

               function cmdSeguridadJSClick($sender, $params)
               {

               ?>
                 document.getElementById("panelCompania_outer").style.display='none'
                 document.getElementById("panelAlmacen_outer").style.display='none';
                 document.getElementById("panelFormatos_outer").style.display='none'
                 document.getElementById("panelArchivos_outer").style.display='block'
                 document.getElementById("panelSistema_outer").style.display='none'
                 document.getElementById("panelPersonal_outer").style.display='none'
                 return false;


               <?php

               }

               function cmdFormatosJSClick($sender, $params)
               {

               ?>
                 document.getElementById("panelCompania_outer").style.display='none'
                 document.getElementById("panelAlmacen_outer").style.display='none';
                 document.getElementById("panelFormatos_outer").style.display='block'
                 document.getElementById("panelArchivos_outer").style.display='none'
                 document.getElementById("panelSistema_outer").style.display='none'
                 document.getElementById("panelPersonal_outer").style.display='none'
                 return false;


               <?php

               }

               function cmdAlmacenJSClick($sender, $params)
               {

               ?>
                 document.getElementById("panelCompania_outer").style.display='none'
                 document.getElementById("panelAlmacen_outer").style.display='block';
                 document.getElementById("panelFormatos_outer").style.display='none'
                 document.getElementById("panelArchivos_outer").style.display='none'
                 document.getElementById("panelSistema_outer").style.display='none'
                 document.getElementById("panelPersonal_outer").style.display='none'
                 return false;

               <?php

               }

               function cmdCompaniaJSClick($sender, $params)
               {

               ?>
                 document.getElementById("panelCompania_outer").style.display='block'
                 document.getElementById("panelAlmacen_outer").style.display='none';
                 document.getElementById("panelFormatos_outer").style.display='none'
                 document.getElementById("panelArchivos_outer").style.display='none'
                 document.getElementById("panelSistema_outer").style.display='none'
                 document.getElementById("panelPersonal_outer").style.display='none'
                 return false;

               <?php

               }

               function cmdSistemaJSClick($sender, $params)
               {

               ?>
                 document.getElementById("panelCompania_outer").style.display='none'
                 document.getElementById("panelAlmacen_outer").style.display='none';
                 document.getElementById("panelFormatos_outer").style.display='none'
                 document.getElementById("panelArchivos_outer").style.display='none'
                 document.getElementById("panelSistema_outer").style.display='block'
                 document.getElementById("panelPersonal_outer").style.display='none'
                 return false;


               <?php

               }

               function cmdPersonalJSClick($sender, $params)
               {

               ?>
                 document.getElementById("panelCompania_outer").style.display='none'
                 document.getElementById("panelAlmacen_outer").style.display='none';
                 document.getElementById("panelFormatos_outer").style.display='none'
                 document.getElementById("panelArchivos_outer").style.display='none'
                 document.getElementById("panelSistema_outer").style.display='none'
                 document.getElementById("panelPersonal_outer").style.display='block'
                 return false;

               <?php

               }




        }

        global $application;

        global $FrmConfiguracion;

        //Creates the form
        $FrmConfiguracion=new FrmConfiguracion($application);

        //Read from resource file
        $FrmConfiguracion->loadResource(__FILE__);

        //Shows the form
        $FrmConfiguracion->show();

?>
