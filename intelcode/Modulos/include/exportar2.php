<?php
require("exportar.inc.php");
/*
$NombreArchivo='intelcode.0.83.sql';
$Export->exportador($BaseDatos,$tablas,$NombreArchivo);
$Export->exportar();
unset($tablas);
*/

$Export = new exportador();
//20
$tablas['A'] = array (
"actividadescanceladas", 
"actividadesfcanceladas", 
"actividadesxanexo" ,
"actividadesxestimacion", 
"actividadesxgerencial", 
"actividadesxgrupo", 
"actividadesxorden", 
"actividadesxpena", 
"activos", 
"alcancesxactividad", 
"anexo_pedidos", 
"anexo_ppedido" ,
"anexo_prequisicion", 
"anexo_psuministro" ,
"anexo_requisicion" ,
"anexo_suministro" ,
"anexosmensuales" ,
"avancesglobales" ,
"avancesglobalesxorden", 
"avancesxactividad");
 
 //8
 $tablas['B'] = array (
"bitacoradeactividades", 
"bitacoradealcances" ,
"bitacoradeanexo" ,
"bitacoradeequipos", 
"bitacorademateriales", 
"bitacoradepaquetes" ,
"bitacoradepersonal" ,
"bitacoragerencial" );
//18
 $tablas['C'] = array (
"calidad_clasificacion",
"calidad_material",
"calidad_normas",
"calidad_procesos",
"categorias",
"comentariosxanexo",
"conceptos_generales",
"condicionesclimatologicas",
"configuracion",
"contratacion_empleados",
"contratacion_solicitud",
"contrato_trinomio",
"contratos",
"contratosxusuario",
"convenios",
"convenios_adjuntos",
"costodeembarcacion",
"cuentas");
 //7
 $tablas['D'] = array (
"departamentos",
"diasespeciales",
"distribuciondeactividades",
"distribuciondeanexo",
"distribuciondeequipos",
"distribuciondepersonal",
"distritos");
 //18
 $tablas['E'] = array (
"embarcaciones",
"empleados",
"equipos",
"equiposxpersonal",
"erogacionesmensuales",
"estatus",
"estimaciones",
"estimacionperiodo",
"estimacionxequipo",
"estimacionxisometrico",
"estimacionxpartida",
"estimacionxpartidaprov",
"estimacionxpersonal",
"estimacionxproveedor",
"estimaembarcaciones",
"estimaequipos",
"estimagastos",
"estimapersonal");
 //9
 $tablas['F'] = array (
"factordecosto",
"fases",
"fasesxorden",
"fasesxproyecto",
"fasesxsoldadura",
"fichatecnica",
"firmas",
"foliodevolucion",
"foliosdetrabajo");
 //4
 $tablas['G'] = array (
"gastosextras",
"grupos",
"gruposisometrico",
"gruposxprograma");

$tablas['H'] = array("historico_empleados");
//13
$tablas['I']=array(
"inspeccionxjuntas",
"inspeccionxorden",
"inteligent_message",
"inventario",
"inventario_clasificacion",
"inventario_entrada",
"inventario_fentrada",
"inventario_fsalida",
"inventario_historico",
"inventario_salida",
"inventario_unidades",
"isometricos",
"isometricos_partidas");
//5
$tablas['J'] = array(
"jornadasdiarias",
"jornadasespeciales",
"juntasxconcentrado",
"juntasxfase",
"juntasxpiezas");
//1
$tablas['K'] = array("kardex_sistema");
//4
$tablas['M'] = array(
"maquinasdesoldar",
"movimientosdealmacen",
"movimientosdeembarcacion",
"movimientosdepersonal");
//2
$tablas['N'] = array("nomina","nomina_empleados");
//3
$tablas['O'] = array("ordendecambio","ordenes_programamensual","ordenesdetrabajo");
//19
$tablas['P'] = array(
"paquetes_e",
"paquetes_p",
"paquetesdeequipo",
"paquetesdeinventario",
"paquetesdepersonal",
"permisosdeseguridad",
"pernoctan",
"personal",
"personalprogramado",
"plataformas",
"platicasdeseguridad",
"pndxjuntas",
"pndxorden",
"polizas",
"presupuestos",
"presupuestosxpartida",
"programas",
"propuestatemporal",
"proveedores");

//10
$tablas['R'] = array(
"recursosanexo",
"recursosequipo",
"recursosinventario",
"recursospersonal",
"regiones",
"reportediario",
"reportefotografico",
"reportegerencial",
"residencias",
"resultadosxsoldadura");

//10
$tablas['S'] = array(
"sintesis_av_fisico_programado",
"sintesis_comentarios",
"sintesis_fotografico",
"soldadores",
"subactividadesxorden",
"subcontratos",
"subcontratos_anticipos",
"subcuentas",
"suministros");

//15
$tablas['T'] = array(
"tiempomuerto",
"tiposdeconvenio",
"tiposdeembarcacion",
"tiposdeequipo",
"tiposdeestimacion",
"tiposdeinventario",
"tiposdemovimiento",
"tiposdeorden",
"tiposdepermiso",
"tiposdepersonal",
"tiposdeprueba",
"tramitedepermisos",
"tripulacion",
"tripulaciondiaria",
"turnos");
//2
$tablas['U'] = array("usuarios","usuariosxprograma");

foreach($tablas as $index => $arrayTablas){
	$NombreArchivo="sql/intelcode.$index.sql";
	$Export->exportador($BaseDatos,$arrayTablas,$NombreArchivo);
	$Export->exportar();
}
?>