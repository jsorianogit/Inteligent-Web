/*
 * Generated by JasperReports - 14/06/08 12:04 PM
 */
import net.sf.jasperreports.engine.*;
import net.sf.jasperreports.engine.fill.*;

import java.util.*;
import java.math.*;
import java.text.*;
import java.io.*;
import java.net.*;

import net.sf.jasperreports.engine.*;
import java.util.*;
import net.sf.jasperreports.engine.data.*;


/**
 *
 */
public class title_1213463061656_532768 extends JREvaluator
{


    /**
     *
     */
    private JRFillParameter parameter_REPORT_LOCALE = null;
    private JRFillParameter parameter_REPORT_TIME_ZONE = null;
    private JRFillParameter parameter_REPORT_VIRTUALIZER = null;
    private JRFillParameter parameter_REPORT_SCRIPTLET = null;
    private JRFillParameter parameter_REPORT_PARAMETERS_MAP = null;
    private JRFillParameter parameter_REPORT_CONNECTION = null;
    private JRFillParameter parameter_REPORT_CLASS_LOADER = null;
    private JRFillParameter parameter_REPORT_DATA_SOURCE = null;
    private JRFillParameter parameter_REPORT_URL_HANDLER_FACTORY = null;
    private JRFillParameter parameter_IS_IGNORE_PAGINATION = null;
    private JRFillParameter parameter_sContrato = null;
    private JRFillParameter parameter_REPORT_FORMAT_FACTORY = null;
    private JRFillParameter parameter_REPORT_MAX_COUNT = null;
    private JRFillParameter parameter_REPORT_TEMPLATES = null;
    private JRFillParameter parameter_REPORT_RESOURCE_BUNDLE = null;
    private JRFillField field_sDuracion = null;
    private JRFillField field_dFfProgramado = null;
    private JRFillField field_sBaseCalculo = null;
    private JRFillField field_sPozo = null;
    private JRFillField field_sTipoSeguridad = null;
    private JRFillField field_sIdFase = null;
    private JRFillField field_sIdTipoOrden = null;
    private JRFillField field_sTipoPartida = null;
    private JRFillField field_iJLunes = null;
    private JRFillField field_sPartidaEfectiva = null;
    private JRFillField field_sPiePagina = null;
    private JRFillField field_sImprimePEP = null;
    private JRFillField field_sImporteRetencion = null;
    private JRFillField field_sFirmasElectronicas = null;
    private JRFillField field_sDevolucion = null;
    private JRFillField field_sIsometricos = null;
    private JRFillField field_iConsecutivoTierra = null;
    private JRFillField field_txtMaterialAutomatico = null;
    private JRFillField field_sIdResidencia = null;
    private JRFillField field_sWeb = null;
    private JRFillField field_sRfc = null;
    private JRFillField field_iConsecutivo = null;
    private JRFillField field_sSeguridadGenerador = null;
    private JRFillField field_iRedondeoPersonal = null;
    private JRFillField field_lExporta = null;
    private JRFillField field_sCentroGestor = null;
    private JRFillField field_sUbicacion = null;
    private JRFillField field_sDepsolicitante = null;
    private JRFillField field_sIdPlataforma = null;
    private JRFillField field_sFirmantecia = null;
    private JRFillField field_iRedondeoEmbarcacion = null;
    private JRFillField field_dRetencion = null;
    private JRFillField field_lIncluyeAvanceOrdenes = null;
    private JRFillField field_sEquipo = null;
    private JRFillField field_sApoyo = null;
    private JRFillField field_sProteccion = null;
    private JRFillField field_lAutomatico = null;
    private JRFillField field_dPenaConvencional = null;
    private JRFillField field_lIncluyeAvanceContrato = null;
    private JRFillField field_sFirmantePep = null;
    private JRFillField field_sDireccion1 = null;
    private JRFillField field_sDireccion2 = null;
    private JRFillField field_sDireccion3 = null;
    private JRFillField field_lGeneraPersonal = null;
    private JRFillField field_lImprimeExtraordinario = null;
    private JRFillField field_sLicitacion = null;
    private JRFillField field_sCampPerf = null;
    private JRFillField field_iRedondeoEquipo = null;
    private JRFillField field_iRedondeoMaterial = null;
    private JRFillField field_dFiProgramado = null;
    private JRFillField field_cStatusSuspendida = null;
    private JRFillField field_sTipsInicial = null;
    private JRFillField field_sTipoContrato = null;
    private JRFillField field_sFolder = null;
    private JRFillField field_sAvanceInicial = null;
    private JRFillField field_iIncremento = null;
    private JRFillField field_cStatusProceso = null;
    private JRFillField field_sNumeroOrden = null;
    private JRFillField field_iJViernes = null;
    private JRFillField field_lAsistencia = null;
    private JRFillField field_lGeneraEquipo = null;
    private JRFillField field_lLicencia = null;
    private JRFillField field_sCuentaMayor = null;
    private JRFillField field_sContrato = null;
    private JRFillField field_dFechaElaboracion = null;
    private JRFillField field_lGeneraConsumibles = null;
    private JRFillField field_sMedida = null;
    private JRFillField field_sHost = null;
    private JRFillField field_sRangoAjusteMenor = null;
    private JRFillField field_sElementoPEP = null;
    private JRFillField field_iJMiercoles = null;
    private JRFillField field_sClaveTierra = null;
    private JRFillField field_sTipoAjusteCosto = null;
    private JRFillField field_sIdFolio = null;
    private JRFillField field_sPaquete = null;
    private JRFillField field_sTipoCIA = null;
    private JRFillField field_iJDomingo = null;
    private JRFillField field_sPoliza = null;
    private JRFillField field_sCodigo = null;
    private JRFillField field_sOrdenExtraordinaria = null;
    private JRFillField field_lComentariosReporte = null;
    private JRFillField field_sFasePrincipal = null;
    private JRFillField field_mDescripcion = null;
    private JRFillField field_iJJueves = null;
    private JRFillField field_sSlogan = null;
    private JRFillField field_sPosicionFinanciera = null;
    private JRFillField field_sTipoEstimacion = null;
    private JRFillField field_sCliente = null;
    private JRFillField field_iFirmas = null;
    private JRFillField field_txtValidaMaterial = null;
    private JRFillField field_sFormato = null;
    private JRFillField field_sTipoOperacion = null;
    private JRFillField field_sTipoAlcance = null;
    private JRFillField field_sIdConvenio = null;
    private JRFillField field_iJornada = null;
    private JRFillField field_sIdActivo = null;
    private JRFillField field_lDistribucion = null;
    private JRFillField field_cImagen = null;
    private JRFillField field_sTipoGeneracion = null;
    private JRFillField field_sClaveSeguridad = null;
    private JRFillField field_sTelefono = null;
    private JRFillField field_sGerencial = null;
    private JRFillField field_sEmail = null;
    private JRFillField field_sTipoObra = null;
    private JRFillField field_lCalculoPonderado = null;
    private JRFillField field_cIdStatus = null;
    private JRFillField field_dFechaInicioT = null;
    private JRFillField field_lCalculaFecha = null;
    private JRFillField field_sReporteDiario = null;
    private JRFillField field_sPuestoPep = null;
    private JRFillField field_iJMartes = null;
    private JRFillField field_sIdPernocta = null;
    private JRFillField field_sRangoEstimacion = null;
    private JRFillField field_sFalta = null;
    private JRFillField field_sDescripcionCorta = null;
    private JRFillField field_sIdEmbarcacion = null;
    private JRFillField field_sOrdenPerEq = null;
    private JRFillField field_sCentroCosto = null;
    private JRFillField field_lStatus = null;
    private JRFillField field_sBaseGeneracion = null;
    private JRFillField field_sAvanceBitacora = null;
    private JRFillField field_sIdGuardia = null;
    private JRFillField field_sTitulo = null;
    private JRFillField field_sNombreCorto = null;
    private JRFillField field_iJSabado = null;
    private JRFillField field_iMeses = null;
    private JRFillField field_sViewIsometrico = null;
    private JRFillField field_mCliente = null;
    private JRFillField field_sFax = null;
    private JRFillField field_lGeneraAnexo = null;
    private JRFillField field_sPuestocia = null;
    private JRFillField field_sIdAnexo = null;
    private JRFillField field_sTerminoPenalizacion = null;
    private JRFillField field_lIncluyeGrafica = null;
    private JRFillField field_sCentroBeneficio = null;
    private JRFillField field_iLongActividad = null;
    private JRFillField field_mComentarios = null;
    private JRFillField field_sAvanceAnterior = null;
    private JRFillField field_coImagen = null;
    private JRFillField field_sNombre = null;
    private JRFillField field_sFotografias = null;
    private JRFillField field_sRangoAjusteMayor = null;
    private JRFillField field_bImagen = null;
    private JRFillField field_sClaveDevolucion = null;
    private JRFillField field_iReportesSinValid = null;
    private JRFillField field_sFondo = null;
    private JRFillField field_sIdDepartamento = null;
    private JRFillField field_sEquipoSeguridad = null;
    private JRFillField field_cStatusTerminada = null;
    private JRFillField field_dFechaSitioM = null;
    private JRFillVariable variable_PAGE_NUMBER = null;
    private JRFillVariable variable_COLUMN_NUMBER = null;
    private JRFillVariable variable_REPORT_COUNT = null;
    private JRFillVariable variable_PAGE_COUNT = null;
    private JRFillVariable variable_COLUMN_COUNT = null;


    /**
     *
     */
    public void customizedInit(
        Map pm,
        Map fm,
        Map vm
        )
    {
        initParams(pm);
        initFields(fm);
        initVars(vm);
    }


    /**
     *
     */
    private void initParams(Map pm)
    {
        parameter_REPORT_LOCALE = (JRFillParameter)pm.get("REPORT_LOCALE");
        parameter_REPORT_TIME_ZONE = (JRFillParameter)pm.get("REPORT_TIME_ZONE");
        parameter_REPORT_VIRTUALIZER = (JRFillParameter)pm.get("REPORT_VIRTUALIZER");
        parameter_REPORT_SCRIPTLET = (JRFillParameter)pm.get("REPORT_SCRIPTLET");
        parameter_REPORT_PARAMETERS_MAP = (JRFillParameter)pm.get("REPORT_PARAMETERS_MAP");
        parameter_REPORT_CONNECTION = (JRFillParameter)pm.get("REPORT_CONNECTION");
        parameter_REPORT_CLASS_LOADER = (JRFillParameter)pm.get("REPORT_CLASS_LOADER");
        parameter_REPORT_DATA_SOURCE = (JRFillParameter)pm.get("REPORT_DATA_SOURCE");
        parameter_REPORT_URL_HANDLER_FACTORY = (JRFillParameter)pm.get("REPORT_URL_HANDLER_FACTORY");
        parameter_IS_IGNORE_PAGINATION = (JRFillParameter)pm.get("IS_IGNORE_PAGINATION");
        parameter_sContrato = (JRFillParameter)pm.get("sContrato");
        parameter_REPORT_FORMAT_FACTORY = (JRFillParameter)pm.get("REPORT_FORMAT_FACTORY");
        parameter_REPORT_MAX_COUNT = (JRFillParameter)pm.get("REPORT_MAX_COUNT");
        parameter_REPORT_TEMPLATES = (JRFillParameter)pm.get("REPORT_TEMPLATES");
        parameter_REPORT_RESOURCE_BUNDLE = (JRFillParameter)pm.get("REPORT_RESOURCE_BUNDLE");
    }


    /**
     *
     */
    private void initFields(Map fm)
    {
        field_sDuracion = (JRFillField)fm.get("sDuracion");
        field_dFfProgramado = (JRFillField)fm.get("dFfProgramado");
        field_sBaseCalculo = (JRFillField)fm.get("sBaseCalculo");
        field_sPozo = (JRFillField)fm.get("sPozo");
        field_sTipoSeguridad = (JRFillField)fm.get("sTipoSeguridad");
        field_sIdFase = (JRFillField)fm.get("sIdFase");
        field_sIdTipoOrden = (JRFillField)fm.get("sIdTipoOrden");
        field_sTipoPartida = (JRFillField)fm.get("sTipoPartida");
        field_iJLunes = (JRFillField)fm.get("iJLunes");
        field_sPartidaEfectiva = (JRFillField)fm.get("sPartidaEfectiva");
        field_sPiePagina = (JRFillField)fm.get("sPiePagina");
        field_sImprimePEP = (JRFillField)fm.get("sImprimePEP");
        field_sImporteRetencion = (JRFillField)fm.get("sImporteRetencion");
        field_sFirmasElectronicas = (JRFillField)fm.get("sFirmasElectronicas");
        field_sDevolucion = (JRFillField)fm.get("sDevolucion");
        field_sIsometricos = (JRFillField)fm.get("sIsometricos");
        field_iConsecutivoTierra = (JRFillField)fm.get("iConsecutivoTierra");
        field_txtMaterialAutomatico = (JRFillField)fm.get("txtMaterialAutomatico");
        field_sIdResidencia = (JRFillField)fm.get("sIdResidencia");
        field_sWeb = (JRFillField)fm.get("sWeb");
        field_sRfc = (JRFillField)fm.get("sRfc");
        field_iConsecutivo = (JRFillField)fm.get("iConsecutivo");
        field_sSeguridadGenerador = (JRFillField)fm.get("sSeguridadGenerador");
        field_iRedondeoPersonal = (JRFillField)fm.get("iRedondeoPersonal");
        field_lExporta = (JRFillField)fm.get("lExporta");
        field_sCentroGestor = (JRFillField)fm.get("sCentroGestor");
        field_sUbicacion = (JRFillField)fm.get("sUbicacion");
        field_sDepsolicitante = (JRFillField)fm.get("sDepsolicitante");
        field_sIdPlataforma = (JRFillField)fm.get("sIdPlataforma");
        field_sFirmantecia = (JRFillField)fm.get("sFirmantecia");
        field_iRedondeoEmbarcacion = (JRFillField)fm.get("iRedondeoEmbarcacion");
        field_dRetencion = (JRFillField)fm.get("dRetencion");
        field_lIncluyeAvanceOrdenes = (JRFillField)fm.get("lIncluyeAvanceOrdenes");
        field_sEquipo = (JRFillField)fm.get("sEquipo");
        field_sApoyo = (JRFillField)fm.get("sApoyo");
        field_sProteccion = (JRFillField)fm.get("sProteccion");
        field_lAutomatico = (JRFillField)fm.get("lAutomatico");
        field_dPenaConvencional = (JRFillField)fm.get("dPenaConvencional");
        field_lIncluyeAvanceContrato = (JRFillField)fm.get("lIncluyeAvanceContrato");
        field_sFirmantePep = (JRFillField)fm.get("sFirmantePep");
        field_sDireccion1 = (JRFillField)fm.get("sDireccion1");
        field_sDireccion2 = (JRFillField)fm.get("sDireccion2");
        field_sDireccion3 = (JRFillField)fm.get("sDireccion3");
        field_lGeneraPersonal = (JRFillField)fm.get("lGeneraPersonal");
        field_lImprimeExtraordinario = (JRFillField)fm.get("lImprimeExtraordinario");
        field_sLicitacion = (JRFillField)fm.get("sLicitacion");
        field_sCampPerf = (JRFillField)fm.get("sCampPerf");
        field_iRedondeoEquipo = (JRFillField)fm.get("iRedondeoEquipo");
        field_iRedondeoMaterial = (JRFillField)fm.get("iRedondeoMaterial");
        field_dFiProgramado = (JRFillField)fm.get("dFiProgramado");
        field_cStatusSuspendida = (JRFillField)fm.get("cStatusSuspendida");
        field_sTipsInicial = (JRFillField)fm.get("sTipsInicial");
        field_sTipoContrato = (JRFillField)fm.get("sTipoContrato");
        field_sFolder = (JRFillField)fm.get("sFolder");
        field_sAvanceInicial = (JRFillField)fm.get("sAvanceInicial");
        field_iIncremento = (JRFillField)fm.get("iIncremento");
        field_cStatusProceso = (JRFillField)fm.get("cStatusProceso");
        field_sNumeroOrden = (JRFillField)fm.get("sNumeroOrden");
        field_iJViernes = (JRFillField)fm.get("iJViernes");
        field_lAsistencia = (JRFillField)fm.get("lAsistencia");
        field_lGeneraEquipo = (JRFillField)fm.get("lGeneraEquipo");
        field_lLicencia = (JRFillField)fm.get("lLicencia");
        field_sCuentaMayor = (JRFillField)fm.get("sCuentaMayor");
        field_sContrato = (JRFillField)fm.get("sContrato");
        field_dFechaElaboracion = (JRFillField)fm.get("dFechaElaboracion");
        field_lGeneraConsumibles = (JRFillField)fm.get("lGeneraConsumibles");
        field_sMedida = (JRFillField)fm.get("sMedida");
        field_sHost = (JRFillField)fm.get("sHost");
        field_sRangoAjusteMenor = (JRFillField)fm.get("sRangoAjusteMenor");
        field_sElementoPEP = (JRFillField)fm.get("sElementoPEP");
        field_iJMiercoles = (JRFillField)fm.get("iJMiercoles");
        field_sClaveTierra = (JRFillField)fm.get("sClaveTierra");
        field_sTipoAjusteCosto = (JRFillField)fm.get("sTipoAjusteCosto");
        field_sIdFolio = (JRFillField)fm.get("sIdFolio");
        field_sPaquete = (JRFillField)fm.get("sPaquete");
        field_sTipoCIA = (JRFillField)fm.get("sTipoCIA");
        field_iJDomingo = (JRFillField)fm.get("iJDomingo");
        field_sPoliza = (JRFillField)fm.get("sPoliza");
        field_sCodigo = (JRFillField)fm.get("sCodigo");
        field_sOrdenExtraordinaria = (JRFillField)fm.get("sOrdenExtraordinaria");
        field_lComentariosReporte = (JRFillField)fm.get("lComentariosReporte");
        field_sFasePrincipal = (JRFillField)fm.get("sFasePrincipal");
        field_mDescripcion = (JRFillField)fm.get("mDescripcion");
        field_iJJueves = (JRFillField)fm.get("iJJueves");
        field_sSlogan = (JRFillField)fm.get("sSlogan");
        field_sPosicionFinanciera = (JRFillField)fm.get("sPosicionFinanciera");
        field_sTipoEstimacion = (JRFillField)fm.get("sTipoEstimacion");
        field_sCliente = (JRFillField)fm.get("sCliente");
        field_iFirmas = (JRFillField)fm.get("iFirmas");
        field_txtValidaMaterial = (JRFillField)fm.get("txtValidaMaterial");
        field_sFormato = (JRFillField)fm.get("sFormato");
        field_sTipoOperacion = (JRFillField)fm.get("sTipoOperacion");
        field_sTipoAlcance = (JRFillField)fm.get("sTipoAlcance");
        field_sIdConvenio = (JRFillField)fm.get("sIdConvenio");
        field_iJornada = (JRFillField)fm.get("iJornada");
        field_sIdActivo = (JRFillField)fm.get("sIdActivo");
        field_lDistribucion = (JRFillField)fm.get("lDistribucion");
        field_cImagen = (JRFillField)fm.get("cImagen");
        field_sTipoGeneracion = (JRFillField)fm.get("sTipoGeneracion");
        field_sClaveSeguridad = (JRFillField)fm.get("sClaveSeguridad");
        initFields1(fm);
    }


    /**
     *
     */
    private void initFields1(Map fm)
    {
        field_sTelefono = (JRFillField)fm.get("sTelefono");
        field_sGerencial = (JRFillField)fm.get("sGerencial");
        field_sEmail = (JRFillField)fm.get("sEmail");
        field_sTipoObra = (JRFillField)fm.get("sTipoObra");
        field_lCalculoPonderado = (JRFillField)fm.get("lCalculoPonderado");
        field_cIdStatus = (JRFillField)fm.get("cIdStatus");
        field_dFechaInicioT = (JRFillField)fm.get("dFechaInicioT");
        field_lCalculaFecha = (JRFillField)fm.get("lCalculaFecha");
        field_sReporteDiario = (JRFillField)fm.get("sReporteDiario");
        field_sPuestoPep = (JRFillField)fm.get("sPuestoPep");
        field_iJMartes = (JRFillField)fm.get("iJMartes");
        field_sIdPernocta = (JRFillField)fm.get("sIdPernocta");
        field_sRangoEstimacion = (JRFillField)fm.get("sRangoEstimacion");
        field_sFalta = (JRFillField)fm.get("sFalta");
        field_sDescripcionCorta = (JRFillField)fm.get("sDescripcionCorta");
        field_sIdEmbarcacion = (JRFillField)fm.get("sIdEmbarcacion");
        field_sOrdenPerEq = (JRFillField)fm.get("sOrdenPerEq");
        field_sCentroCosto = (JRFillField)fm.get("sCentroCosto");
        field_lStatus = (JRFillField)fm.get("lStatus");
        field_sBaseGeneracion = (JRFillField)fm.get("sBaseGeneracion");
        field_sAvanceBitacora = (JRFillField)fm.get("sAvanceBitacora");
        field_sIdGuardia = (JRFillField)fm.get("sIdGuardia");
        field_sTitulo = (JRFillField)fm.get("sTitulo");
        field_sNombreCorto = (JRFillField)fm.get("sNombreCorto");
        field_iJSabado = (JRFillField)fm.get("iJSabado");
        field_iMeses = (JRFillField)fm.get("iMeses");
        field_sViewIsometrico = (JRFillField)fm.get("sViewIsometrico");
        field_mCliente = (JRFillField)fm.get("mCliente");
        field_sFax = (JRFillField)fm.get("sFax");
        field_lGeneraAnexo = (JRFillField)fm.get("lGeneraAnexo");
        field_sPuestocia = (JRFillField)fm.get("sPuestocia");
        field_sIdAnexo = (JRFillField)fm.get("sIdAnexo");
        field_sTerminoPenalizacion = (JRFillField)fm.get("sTerminoPenalizacion");
        field_lIncluyeGrafica = (JRFillField)fm.get("lIncluyeGrafica");
        field_sCentroBeneficio = (JRFillField)fm.get("sCentroBeneficio");
        field_iLongActividad = (JRFillField)fm.get("iLongActividad");
        field_mComentarios = (JRFillField)fm.get("mComentarios");
        field_sAvanceAnterior = (JRFillField)fm.get("sAvanceAnterior");
        field_coImagen = (JRFillField)fm.get("coImagen");
        field_sNombre = (JRFillField)fm.get("sNombre");
        field_sFotografias = (JRFillField)fm.get("sFotografias");
        field_sRangoAjusteMayor = (JRFillField)fm.get("sRangoAjusteMayor");
        field_bImagen = (JRFillField)fm.get("bImagen");
        field_sClaveDevolucion = (JRFillField)fm.get("sClaveDevolucion");
        field_iReportesSinValid = (JRFillField)fm.get("iReportesSinValid");
        field_sFondo = (JRFillField)fm.get("sFondo");
        field_sIdDepartamento = (JRFillField)fm.get("sIdDepartamento");
        field_sEquipoSeguridad = (JRFillField)fm.get("sEquipoSeguridad");
        field_cStatusTerminada = (JRFillField)fm.get("cStatusTerminada");
        field_dFechaSitioM = (JRFillField)fm.get("dFechaSitioM");
    }


    /**
     *
     */
    private void initVars(Map vm)
    {
        variable_PAGE_NUMBER = (JRFillVariable)vm.get("PAGE_NUMBER");
        variable_COLUMN_NUMBER = (JRFillVariable)vm.get("COLUMN_NUMBER");
        variable_REPORT_COUNT = (JRFillVariable)vm.get("REPORT_COUNT");
        variable_PAGE_COUNT = (JRFillVariable)vm.get("PAGE_COUNT");
        variable_COLUMN_COUNT = (JRFillVariable)vm.get("COLUMN_COUNT");
    }


    /**
     *
     */
    public Object evaluate(int id) throws Throwable
    {
        Object value = null;

        switch (id)
        {
            case 0 : 
            {
                value = (java.lang.String)("425027849");//$JR_EXPR_ID=0$
                break;
            }
            case 1 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=1$
                break;
            }
            case 2 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=2$
                break;
            }
            case 3 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=3$
                break;
            }
            case 4 : 
            {
                value = (java.lang.Integer)(new Integer(0));//$JR_EXPR_ID=4$
                break;
            }
            case 5 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=5$
                break;
            }
            case 6 : 
            {
                value = (java.lang.Integer)(new Integer(0));//$JR_EXPR_ID=6$
                break;
            }
            case 7 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=7$
                break;
            }
            case 8 : 
            {
                value = (java.lang.Integer)(new Integer(0));//$JR_EXPR_ID=8$
                break;
            }
            case 9 : 
            {
                value = (java.io.InputStream)(((java.io.InputStream)field_cImagen.getValue()));//$JR_EXPR_ID=9$
                break;
            }
            case 10 : 
            {
                value = (java.io.InputStream)(((java.io.InputStream)field_coImagen.getValue()));//$JR_EXPR_ID=10$
                break;
            }
            case 11 : 
            {
                value = (java.lang.String)(((java.lang.String)field_mCliente.getValue()));//$JR_EXPR_ID=11$
                break;
            }
            case 12 : 
            {
                value = (java.util.Date)(((java.sql.Date)field_dFechaInicioT.getValue()));//$JR_EXPR_ID=12$
                break;
            }
            case 13 : 
            {
                value = (java.util.Date)(((java.sql.Date)field_dFechaSitioM.getValue()));//$JR_EXPR_ID=13$
                break;
            }
            case 14 : 
            {
                value = (java.lang.String)(((java.lang.String)field_sContrato.getValue()));//$JR_EXPR_ID=14$
                break;
            }
            case 15 : 
            {
                value = (java.lang.String)(((java.lang.String)field_sDepsolicitante.getValue()));//$JR_EXPR_ID=15$
                break;
            }
            case 16 : 
            {
                value = (java.util.Date)(((java.sql.Date)field_dFiProgramado.getValue()));//$JR_EXPR_ID=16$
                break;
            }
            case 17 : 
            {
                value = (java.util.Date)(((java.sql.Date)field_dFfProgramado.getValue()));//$JR_EXPR_ID=17$
                break;
            }
            case 18 : 
            {
                value = (java.lang.String)(((java.lang.String)field_sIdPlataforma.getValue()));//$JR_EXPR_ID=18$
                break;
            }
            case 19 : 
            {
                value = (java.lang.String)(((java.lang.String)field_sPozo.getValue()));//$JR_EXPR_ID=19$
                break;
            }
            case 20 : 
            {
                value = (java.lang.String)(((java.lang.String)field_sEquipo.getValue()));//$JR_EXPR_ID=20$
                break;
            }
           default :
           {
           }
        }
        
        return value;
    }


    /**
     *
     */
    public Object evaluateOld(int id) throws Throwable
    {
        Object value = null;

        switch (id)
        {
            case 0 : 
            {
                value = (java.lang.String)("425027849");//$JR_EXPR_ID=0$
                break;
            }
            case 1 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=1$
                break;
            }
            case 2 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=2$
                break;
            }
            case 3 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=3$
                break;
            }
            case 4 : 
            {
                value = (java.lang.Integer)(new Integer(0));//$JR_EXPR_ID=4$
                break;
            }
            case 5 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=5$
                break;
            }
            case 6 : 
            {
                value = (java.lang.Integer)(new Integer(0));//$JR_EXPR_ID=6$
                break;
            }
            case 7 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=7$
                break;
            }
            case 8 : 
            {
                value = (java.lang.Integer)(new Integer(0));//$JR_EXPR_ID=8$
                break;
            }
            case 9 : 
            {
                value = (java.io.InputStream)(((java.io.InputStream)field_cImagen.getOldValue()));//$JR_EXPR_ID=9$
                break;
            }
            case 10 : 
            {
                value = (java.io.InputStream)(((java.io.InputStream)field_coImagen.getOldValue()));//$JR_EXPR_ID=10$
                break;
            }
            case 11 : 
            {
                value = (java.lang.String)(((java.lang.String)field_mCliente.getOldValue()));//$JR_EXPR_ID=11$
                break;
            }
            case 12 : 
            {
                value = (java.util.Date)(((java.sql.Date)field_dFechaInicioT.getOldValue()));//$JR_EXPR_ID=12$
                break;
            }
            case 13 : 
            {
                value = (java.util.Date)(((java.sql.Date)field_dFechaSitioM.getOldValue()));//$JR_EXPR_ID=13$
                break;
            }
            case 14 : 
            {
                value = (java.lang.String)(((java.lang.String)field_sContrato.getOldValue()));//$JR_EXPR_ID=14$
                break;
            }
            case 15 : 
            {
                value = (java.lang.String)(((java.lang.String)field_sDepsolicitante.getOldValue()));//$JR_EXPR_ID=15$
                break;
            }
            case 16 : 
            {
                value = (java.util.Date)(((java.sql.Date)field_dFiProgramado.getOldValue()));//$JR_EXPR_ID=16$
                break;
            }
            case 17 : 
            {
                value = (java.util.Date)(((java.sql.Date)field_dFfProgramado.getOldValue()));//$JR_EXPR_ID=17$
                break;
            }
            case 18 : 
            {
                value = (java.lang.String)(((java.lang.String)field_sIdPlataforma.getOldValue()));//$JR_EXPR_ID=18$
                break;
            }
            case 19 : 
            {
                value = (java.lang.String)(((java.lang.String)field_sPozo.getOldValue()));//$JR_EXPR_ID=19$
                break;
            }
            case 20 : 
            {
                value = (java.lang.String)(((java.lang.String)field_sEquipo.getOldValue()));//$JR_EXPR_ID=20$
                break;
            }
           default :
           {
           }
        }
        
        return value;
    }


    /**
     *
     */
    public Object evaluateEstimated(int id) throws Throwable
    {
        Object value = null;

        switch (id)
        {
            case 0 : 
            {
                value = (java.lang.String)("425027849");//$JR_EXPR_ID=0$
                break;
            }
            case 1 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=1$
                break;
            }
            case 2 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=2$
                break;
            }
            case 3 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=3$
                break;
            }
            case 4 : 
            {
                value = (java.lang.Integer)(new Integer(0));//$JR_EXPR_ID=4$
                break;
            }
            case 5 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=5$
                break;
            }
            case 6 : 
            {
                value = (java.lang.Integer)(new Integer(0));//$JR_EXPR_ID=6$
                break;
            }
            case 7 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=7$
                break;
            }
            case 8 : 
            {
                value = (java.lang.Integer)(new Integer(0));//$JR_EXPR_ID=8$
                break;
            }
            case 9 : 
            {
                value = (java.io.InputStream)(((java.io.InputStream)field_cImagen.getValue()));//$JR_EXPR_ID=9$
                break;
            }
            case 10 : 
            {
                value = (java.io.InputStream)(((java.io.InputStream)field_coImagen.getValue()));//$JR_EXPR_ID=10$
                break;
            }
            case 11 : 
            {
                value = (java.lang.String)(((java.lang.String)field_mCliente.getValue()));//$JR_EXPR_ID=11$
                break;
            }
            case 12 : 
            {
                value = (java.util.Date)(((java.sql.Date)field_dFechaInicioT.getValue()));//$JR_EXPR_ID=12$
                break;
            }
            case 13 : 
            {
                value = (java.util.Date)(((java.sql.Date)field_dFechaSitioM.getValue()));//$JR_EXPR_ID=13$
                break;
            }
            case 14 : 
            {
                value = (java.lang.String)(((java.lang.String)field_sContrato.getValue()));//$JR_EXPR_ID=14$
                break;
            }
            case 15 : 
            {
                value = (java.lang.String)(((java.lang.String)field_sDepsolicitante.getValue()));//$JR_EXPR_ID=15$
                break;
            }
            case 16 : 
            {
                value = (java.util.Date)(((java.sql.Date)field_dFiProgramado.getValue()));//$JR_EXPR_ID=16$
                break;
            }
            case 17 : 
            {
                value = (java.util.Date)(((java.sql.Date)field_dFfProgramado.getValue()));//$JR_EXPR_ID=17$
                break;
            }
            case 18 : 
            {
                value = (java.lang.String)(((java.lang.String)field_sIdPlataforma.getValue()));//$JR_EXPR_ID=18$
                break;
            }
            case 19 : 
            {
                value = (java.lang.String)(((java.lang.String)field_sPozo.getValue()));//$JR_EXPR_ID=19$
                break;
            }
            case 20 : 
            {
                value = (java.lang.String)(((java.lang.String)field_sEquipo.getValue()));//$JR_EXPR_ID=20$
                break;
            }
           default :
           {
           }
        }
        
        return value;
    }


}
