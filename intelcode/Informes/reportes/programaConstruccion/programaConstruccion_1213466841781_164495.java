/*
 * Generated by JasperReports - 14/06/08 01:07 PM
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
public class programaConstruccion_1213466841781_164495 extends JREvaluator
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
    private JRFillParameter parameter_SUBREPORT_DIR = null;
    private JRFillParameter parameter_sContrato = null;
    private JRFillParameter parameter_REPORT_FORMAT_FACTORY = null;
    private JRFillParameter parameter_REPORT_MAX_COUNT = null;
    private JRFillParameter parameter_REPORT_TEMPLATES = null;
    private JRFillParameter parameter_REPORT_RESOURCE_BUNDLE = null;
    private JRFillParameter parameter_sNumeroOrden = null;
    private JRFillField field_sPaquete = null;
    private JRFillField field_Actividad = null;
    private JRFillField field_sSimbolo = null;
    private JRFillField field_TotalMN = null;
    private JRFillField field_lGenerado = null;
    private JRFillField field_dVentaDLL = null;
    private JRFillField field_dCostoMN = null;
    private JRFillField field_dExcedente = null;
    private JRFillField field_mDescripcion = null;
    private JRFillField field_dFechaInicio = null;
    private JRFillField field_iItemOrden = null;
    private JRFillField field_sWbs = null;
    private JRFillField field_dVentaMN = null;
    private JRFillField field_sHoraInicio = null;
    private JRFillField field_dPonderado = null;
    private JRFillField field_sHoraFinal = null;
    private JRFillField field_dDuracion = null;
    private JRFillField field_iNivel = null;
    private JRFillField field_dInstalado = null;
    private JRFillField field_sNumeroOrden = null;
    private JRFillField field_dCargado = null;
    private JRFillField field_sTipoActividad = null;
    private JRFillField field_lCalculo = null;
    private JRFillField field_sNumeroActividad = null;
    private JRFillField field_sWbsAnterior = null;
    private JRFillField field_lGerencial = null;
    private JRFillField field_sIdConvenio = null;
    private JRFillField field_lCancelada = null;
    private JRFillField field_mComentarios = null;
    private JRFillField field_sContrato = null;
    private JRFillField field_dFechaFinal = null;
    private JRFillField field_dCantidad = null;
    private JRFillField field_dCostoDLL = null;
    private JRFillField field_sMedida = null;
    private JRFillField field_sIdPernocta = null;
    private JRFillField field_sIdPlataforma = null;
    private JRFillField field_64iNivel5861a46iNivel = null;
    private JRFillField field_iColor = null;
    private JRFillVariable variable_PAGE_NUMBER = null;
    private JRFillVariable variable_COLUMN_NUMBER = null;
    private JRFillVariable variable_REPORT_COUNT = null;
    private JRFillVariable variable_PAGE_COUNT = null;
    private JRFillVariable variable_COLUMN_COUNT = null;
    private JRFillVariable variable_SUM_TotalMN_1 = null;


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
        parameter_SUBREPORT_DIR = (JRFillParameter)pm.get("SUBREPORT_DIR");
        parameter_sContrato = (JRFillParameter)pm.get("sContrato");
        parameter_REPORT_FORMAT_FACTORY = (JRFillParameter)pm.get("REPORT_FORMAT_FACTORY");
        parameter_REPORT_MAX_COUNT = (JRFillParameter)pm.get("REPORT_MAX_COUNT");
        parameter_REPORT_TEMPLATES = (JRFillParameter)pm.get("REPORT_TEMPLATES");
        parameter_REPORT_RESOURCE_BUNDLE = (JRFillParameter)pm.get("REPORT_RESOURCE_BUNDLE");
        parameter_sNumeroOrden = (JRFillParameter)pm.get("sNumeroOrden");
    }


    /**
     *
     */
    private void initFields(Map fm)
    {
        field_sPaquete = (JRFillField)fm.get("sPaquete");
        field_Actividad = (JRFillField)fm.get("Actividad");
        field_sSimbolo = (JRFillField)fm.get("sSimbolo");
        field_TotalMN = (JRFillField)fm.get("TotalMN");
        field_lGenerado = (JRFillField)fm.get("lGenerado");
        field_dVentaDLL = (JRFillField)fm.get("dVentaDLL");
        field_dCostoMN = (JRFillField)fm.get("dCostoMN");
        field_dExcedente = (JRFillField)fm.get("dExcedente");
        field_mDescripcion = (JRFillField)fm.get("mDescripcion");
        field_dFechaInicio = (JRFillField)fm.get("dFechaInicio");
        field_iItemOrden = (JRFillField)fm.get("iItemOrden");
        field_sWbs = (JRFillField)fm.get("sWbs");
        field_dVentaMN = (JRFillField)fm.get("dVentaMN");
        field_sHoraInicio = (JRFillField)fm.get("sHoraInicio");
        field_dPonderado = (JRFillField)fm.get("dPonderado");
        field_sHoraFinal = (JRFillField)fm.get("sHoraFinal");
        field_dDuracion = (JRFillField)fm.get("dDuracion");
        field_iNivel = (JRFillField)fm.get("iNivel");
        field_dInstalado = (JRFillField)fm.get("dInstalado");
        field_sNumeroOrden = (JRFillField)fm.get("sNumeroOrden");
        field_dCargado = (JRFillField)fm.get("dCargado");
        field_sTipoActividad = (JRFillField)fm.get("sTipoActividad");
        field_lCalculo = (JRFillField)fm.get("lCalculo");
        field_sNumeroActividad = (JRFillField)fm.get("sNumeroActividad");
        field_sWbsAnterior = (JRFillField)fm.get("sWbsAnterior");
        field_lGerencial = (JRFillField)fm.get("lGerencial");
        field_sIdConvenio = (JRFillField)fm.get("sIdConvenio");
        field_lCancelada = (JRFillField)fm.get("lCancelada");
        field_mComentarios = (JRFillField)fm.get("mComentarios");
        field_sContrato = (JRFillField)fm.get("sContrato");
        field_dFechaFinal = (JRFillField)fm.get("dFechaFinal");
        field_dCantidad = (JRFillField)fm.get("dCantidad");
        field_dCostoDLL = (JRFillField)fm.get("dCostoDLL");
        field_sMedida = (JRFillField)fm.get("sMedida");
        field_sIdPernocta = (JRFillField)fm.get("sIdPernocta");
        field_sIdPlataforma = (JRFillField)fm.get("sIdPlataforma");
        field_64iNivel5861a46iNivel = (JRFillField)fm.get("@iNivel:=a.iNivel");
        field_iColor = (JRFillField)fm.get("iColor");
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
        variable_SUM_TotalMN_1 = (JRFillVariable)vm.get("SUM_TotalMN_1");
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
                value = (java.lang.String)("SUNUAPA-302");//$JR_EXPR_ID=1$
                break;
            }
            case 2 : 
            {
                value = (java.lang.String)("C:\\Documents and Settings\\Intel\\Escritorio\\reportes\\reportes\\programaConstruccion\\");//$JR_EXPR_ID=2$
                break;
            }
            case 3 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=3$
                break;
            }
            case 4 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=4$
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
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=9$
                break;
            }
            case 10 : 
            {
                value = (java.lang.Integer)(new Integer(0));//$JR_EXPR_ID=10$
                break;
            }
            case 11 : 
            {
                value = (java.lang.Double)(((java.lang.Double)field_TotalMN.getValue()));//$JR_EXPR_ID=11$
                break;
            }
            case 12 : 
            {
                value = (java.lang.Object)(((java.lang.String)field_sContrato.getValue()));//$JR_EXPR_ID=12$
                break;
            }
            case 13 : 
            {
                value = (java.lang.Object)(((java.lang.String)parameter_sNumeroOrden.getValue()));//$JR_EXPR_ID=13$
                break;
            }
            case 14 : 
            {
                value = (java.sql.Connection)(((java.sql.Connection)parameter_REPORT_CONNECTION.getValue()));//$JR_EXPR_ID=14$
                break;
            }
            case 15 : 
            {
                value = (java.lang.String)(((java.lang.String)parameter_SUBREPORT_DIR.getValue()) + "title.jasper");//$JR_EXPR_ID=15$
                break;
            }
            case 16 : 
            {
                value = (java.lang.Object)(((java.lang.String)field_sContrato.getValue()));//$JR_EXPR_ID=16$
                break;
            }
            case 17 : 
            {
                value = (java.lang.Object)(((java.lang.String)field_sNumeroOrden.getValue()));//$JR_EXPR_ID=17$
                break;
            }
            case 18 : 
            {
                value = (java.sql.Connection)(((java.sql.Connection)parameter_REPORT_CONNECTION.getValue()));//$JR_EXPR_ID=18$
                break;
            }
            case 19 : 
            {
                value = (java.lang.String)(((java.lang.String)parameter_SUBREPORT_DIR.getValue()) + "contrato_trinomio.jasper");//$JR_EXPR_ID=19$
                break;
            }
            case 20 : 
            {
                value = (java.lang.Boolean)(new Boolean(((java.lang.String)field_sTipoActividad.getValue()).equals("Paquete")));//$JR_EXPR_ID=20$
                break;
            }
            case 21 : 
            {
                value = (java.lang.String)(((java.lang.String)field_Actividad.getValue()));//$JR_EXPR_ID=21$
                break;
            }
            case 22 : 
            {
                value = (java.lang.String)(((java.lang.String)field_mDescripcion.getValue()));//$JR_EXPR_ID=22$
                break;
            }
            case 23 : 
            {
                value = (java.lang.Double)(((java.lang.Double)field_dCantidad.getValue()));//$JR_EXPR_ID=23$
                break;
            }
            case 24 : 
            {
                value = (java.lang.String)(((java.lang.String)field_sMedida.getValue()));//$JR_EXPR_ID=24$
                break;
            }
            case 25 : 
            {
                value = (java.lang.Double)(((java.lang.Double)field_dVentaMN.getValue()));//$JR_EXPR_ID=25$
                break;
            }
            case 26 : 
            {
                value = (java.lang.Double)(((java.lang.Double)field_TotalMN.getValue()));//$JR_EXPR_ID=26$
                break;
            }
            case 27 : 
            {
                value = (java.lang.Object)(((java.lang.String)field_sContrato.getValue()));//$JR_EXPR_ID=27$
                break;
            }
            case 28 : 
            {
                value = (java.lang.Object)(((java.lang.String)field_sNumeroOrden.getValue()));//$JR_EXPR_ID=28$
                break;
            }
            case 29 : 
            {
                value = (java.sql.Connection)(((java.sql.Connection)parameter_REPORT_CONNECTION.getValue()));//$JR_EXPR_ID=29$
                break;
            }
            case 30 : 
            {
                value = (java.lang.String)(((java.lang.String)parameter_SUBREPORT_DIR.getValue()) + "firmas.jasper");//$JR_EXPR_ID=30$
                break;
            }
            case 31 : 
            {
                value = (java.lang.String)("Pagina " + ((java.lang.Integer)variable_PAGE_NUMBER.getValue()) + " de ");//$JR_EXPR_ID=31$
                break;
            }
            case 32 : 
            {
                value = (java.lang.String)("" + ((java.lang.Integer)variable_PAGE_NUMBER.getValue()) + "");//$JR_EXPR_ID=32$
                break;
            }
            case 33 : 
            {
                value = (java.lang.Double)(new Double( ((java.lang.String)field_sWbs.getValue()).equals("") ? 0 : ((java.lang.Double)field_TotalMN.getValue())+ ((java.lang.Double)field_TotalMN.getValue())));//$JR_EXPR_ID=33$
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
                value = (java.lang.String)("SUNUAPA-302");//$JR_EXPR_ID=1$
                break;
            }
            case 2 : 
            {
                value = (java.lang.String)("C:\\Documents and Settings\\Intel\\Escritorio\\reportes\\reportes\\programaConstruccion\\");//$JR_EXPR_ID=2$
                break;
            }
            case 3 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=3$
                break;
            }
            case 4 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=4$
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
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=9$
                break;
            }
            case 10 : 
            {
                value = (java.lang.Integer)(new Integer(0));//$JR_EXPR_ID=10$
                break;
            }
            case 11 : 
            {
                value = (java.lang.Double)(((java.lang.Double)field_TotalMN.getOldValue()));//$JR_EXPR_ID=11$
                break;
            }
            case 12 : 
            {
                value = (java.lang.Object)(((java.lang.String)field_sContrato.getOldValue()));//$JR_EXPR_ID=12$
                break;
            }
            case 13 : 
            {
                value = (java.lang.Object)(((java.lang.String)parameter_sNumeroOrden.getValue()));//$JR_EXPR_ID=13$
                break;
            }
            case 14 : 
            {
                value = (java.sql.Connection)(((java.sql.Connection)parameter_REPORT_CONNECTION.getValue()));//$JR_EXPR_ID=14$
                break;
            }
            case 15 : 
            {
                value = (java.lang.String)(((java.lang.String)parameter_SUBREPORT_DIR.getValue()) + "title.jasper");//$JR_EXPR_ID=15$
                break;
            }
            case 16 : 
            {
                value = (java.lang.Object)(((java.lang.String)field_sContrato.getOldValue()));//$JR_EXPR_ID=16$
                break;
            }
            case 17 : 
            {
                value = (java.lang.Object)(((java.lang.String)field_sNumeroOrden.getOldValue()));//$JR_EXPR_ID=17$
                break;
            }
            case 18 : 
            {
                value = (java.sql.Connection)(((java.sql.Connection)parameter_REPORT_CONNECTION.getValue()));//$JR_EXPR_ID=18$
                break;
            }
            case 19 : 
            {
                value = (java.lang.String)(((java.lang.String)parameter_SUBREPORT_DIR.getValue()) + "contrato_trinomio.jasper");//$JR_EXPR_ID=19$
                break;
            }
            case 20 : 
            {
                value = (java.lang.Boolean)(new Boolean(((java.lang.String)field_sTipoActividad.getOldValue()).equals("Paquete")));//$JR_EXPR_ID=20$
                break;
            }
            case 21 : 
            {
                value = (java.lang.String)(((java.lang.String)field_Actividad.getOldValue()));//$JR_EXPR_ID=21$
                break;
            }
            case 22 : 
            {
                value = (java.lang.String)(((java.lang.String)field_mDescripcion.getOldValue()));//$JR_EXPR_ID=22$
                break;
            }
            case 23 : 
            {
                value = (java.lang.Double)(((java.lang.Double)field_dCantidad.getOldValue()));//$JR_EXPR_ID=23$
                break;
            }
            case 24 : 
            {
                value = (java.lang.String)(((java.lang.String)field_sMedida.getOldValue()));//$JR_EXPR_ID=24$
                break;
            }
            case 25 : 
            {
                value = (java.lang.Double)(((java.lang.Double)field_dVentaMN.getOldValue()));//$JR_EXPR_ID=25$
                break;
            }
            case 26 : 
            {
                value = (java.lang.Double)(((java.lang.Double)field_TotalMN.getOldValue()));//$JR_EXPR_ID=26$
                break;
            }
            case 27 : 
            {
                value = (java.lang.Object)(((java.lang.String)field_sContrato.getOldValue()));//$JR_EXPR_ID=27$
                break;
            }
            case 28 : 
            {
                value = (java.lang.Object)(((java.lang.String)field_sNumeroOrden.getOldValue()));//$JR_EXPR_ID=28$
                break;
            }
            case 29 : 
            {
                value = (java.sql.Connection)(((java.sql.Connection)parameter_REPORT_CONNECTION.getValue()));//$JR_EXPR_ID=29$
                break;
            }
            case 30 : 
            {
                value = (java.lang.String)(((java.lang.String)parameter_SUBREPORT_DIR.getValue()) + "firmas.jasper");//$JR_EXPR_ID=30$
                break;
            }
            case 31 : 
            {
                value = (java.lang.String)("Pagina " + ((java.lang.Integer)variable_PAGE_NUMBER.getOldValue()) + " de ");//$JR_EXPR_ID=31$
                break;
            }
            case 32 : 
            {
                value = (java.lang.String)("" + ((java.lang.Integer)variable_PAGE_NUMBER.getOldValue()) + "");//$JR_EXPR_ID=32$
                break;
            }
            case 33 : 
            {
                value = (java.lang.Double)(new Double( ((java.lang.String)field_sWbs.getOldValue()).equals("") ? 0 : ((java.lang.Double)field_TotalMN.getOldValue())+ ((java.lang.Double)field_TotalMN.getOldValue())));//$JR_EXPR_ID=33$
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
                value = (java.lang.String)("SUNUAPA-302");//$JR_EXPR_ID=1$
                break;
            }
            case 2 : 
            {
                value = (java.lang.String)("C:\\Documents and Settings\\Intel\\Escritorio\\reportes\\reportes\\programaConstruccion\\");//$JR_EXPR_ID=2$
                break;
            }
            case 3 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=3$
                break;
            }
            case 4 : 
            {
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=4$
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
                value = (java.lang.Integer)(new Integer(1));//$JR_EXPR_ID=9$
                break;
            }
            case 10 : 
            {
                value = (java.lang.Integer)(new Integer(0));//$JR_EXPR_ID=10$
                break;
            }
            case 11 : 
            {
                value = (java.lang.Double)(((java.lang.Double)field_TotalMN.getValue()));//$JR_EXPR_ID=11$
                break;
            }
            case 12 : 
            {
                value = (java.lang.Object)(((java.lang.String)field_sContrato.getValue()));//$JR_EXPR_ID=12$
                break;
            }
            case 13 : 
            {
                value = (java.lang.Object)(((java.lang.String)parameter_sNumeroOrden.getValue()));//$JR_EXPR_ID=13$
                break;
            }
            case 14 : 
            {
                value = (java.sql.Connection)(((java.sql.Connection)parameter_REPORT_CONNECTION.getValue()));//$JR_EXPR_ID=14$
                break;
            }
            case 15 : 
            {
                value = (java.lang.String)(((java.lang.String)parameter_SUBREPORT_DIR.getValue()) + "title.jasper");//$JR_EXPR_ID=15$
                break;
            }
            case 16 : 
            {
                value = (java.lang.Object)(((java.lang.String)field_sContrato.getValue()));//$JR_EXPR_ID=16$
                break;
            }
            case 17 : 
            {
                value = (java.lang.Object)(((java.lang.String)field_sNumeroOrden.getValue()));//$JR_EXPR_ID=17$
                break;
            }
            case 18 : 
            {
                value = (java.sql.Connection)(((java.sql.Connection)parameter_REPORT_CONNECTION.getValue()));//$JR_EXPR_ID=18$
                break;
            }
            case 19 : 
            {
                value = (java.lang.String)(((java.lang.String)parameter_SUBREPORT_DIR.getValue()) + "contrato_trinomio.jasper");//$JR_EXPR_ID=19$
                break;
            }
            case 20 : 
            {
                value = (java.lang.Boolean)(new Boolean(((java.lang.String)field_sTipoActividad.getValue()).equals("Paquete")));//$JR_EXPR_ID=20$
                break;
            }
            case 21 : 
            {
                value = (java.lang.String)(((java.lang.String)field_Actividad.getValue()));//$JR_EXPR_ID=21$
                break;
            }
            case 22 : 
            {
                value = (java.lang.String)(((java.lang.String)field_mDescripcion.getValue()));//$JR_EXPR_ID=22$
                break;
            }
            case 23 : 
            {
                value = (java.lang.Double)(((java.lang.Double)field_dCantidad.getValue()));//$JR_EXPR_ID=23$
                break;
            }
            case 24 : 
            {
                value = (java.lang.String)(((java.lang.String)field_sMedida.getValue()));//$JR_EXPR_ID=24$
                break;
            }
            case 25 : 
            {
                value = (java.lang.Double)(((java.lang.Double)field_dVentaMN.getValue()));//$JR_EXPR_ID=25$
                break;
            }
            case 26 : 
            {
                value = (java.lang.Double)(((java.lang.Double)field_TotalMN.getValue()));//$JR_EXPR_ID=26$
                break;
            }
            case 27 : 
            {
                value = (java.lang.Object)(((java.lang.String)field_sContrato.getValue()));//$JR_EXPR_ID=27$
                break;
            }
            case 28 : 
            {
                value = (java.lang.Object)(((java.lang.String)field_sNumeroOrden.getValue()));//$JR_EXPR_ID=28$
                break;
            }
            case 29 : 
            {
                value = (java.sql.Connection)(((java.sql.Connection)parameter_REPORT_CONNECTION.getValue()));//$JR_EXPR_ID=29$
                break;
            }
            case 30 : 
            {
                value = (java.lang.String)(((java.lang.String)parameter_SUBREPORT_DIR.getValue()) + "firmas.jasper");//$JR_EXPR_ID=30$
                break;
            }
            case 31 : 
            {
                value = (java.lang.String)("Pagina " + ((java.lang.Integer)variable_PAGE_NUMBER.getEstimatedValue()) + " de ");//$JR_EXPR_ID=31$
                break;
            }
            case 32 : 
            {
                value = (java.lang.String)("" + ((java.lang.Integer)variable_PAGE_NUMBER.getEstimatedValue()) + "");//$JR_EXPR_ID=32$
                break;
            }
            case 33 : 
            {
                value = (java.lang.Double)(new Double( ((java.lang.String)field_sWbs.getValue()).equals("") ? 0 : ((java.lang.Double)field_TotalMN.getValue())+ ((java.lang.Double)field_TotalMN.getValue())));//$JR_EXPR_ID=33$
                break;
            }
           default :
           {
           }
        }
        
        return value;
    }


}
