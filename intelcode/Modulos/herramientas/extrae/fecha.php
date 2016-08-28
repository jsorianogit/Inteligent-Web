<?php
//Regresa el numero de mes a partir de una fecha proporcionada
function mesActual($fecha){
	  if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
              list($ano,$mes,$dia)=split("/", $fecha);
      if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
              list($ano,$mes,$dia)=split("-",$fecha);
	return $mes;
}
//regresa el ultimo dia de un mes
function ultimodia($ayno,$mes){
	$ultimodia = mktime(0, 0, 0,$mes+1, 0, $ayno);
	return $ultimo = strftime("%d", $ultimodia);
}
//incremente una fecha en un dia
function suma_fechas($fecha,$ndias){
  if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("/", $fecha);
  if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
      list($ano,$mes,$dia)=split("-",$fecha);
  $nueva = mktime(0,0,0,$mes,$dia,$ano) + $ndias * 24 * 60 * 60;
  $nuevafecha=date("Y-m-d",$nueva);
  $ultimoDia = ultimodia($ano,$mes);
  $nueva = mktime(0,0,0,$mes+1,$ultimoDia,$ano);
  $nuevafecha=date("Y-m-d",$nueva);
  return $nuevafecha;  
}
//regresa el nombre de un mes a partir de una fecha
function nombre_mes($fecha){
  setlocale(LC_TIME,"es_MX");		
     if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
             list($ano,$mes,$dia)=split("/", $fecha);
     if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
             list($ano,$mes,$dia)=split("-",$fecha);
  $iFecha = mktime(0,0,0,$mes,$dia,$ano);
  $nombreMes = strftime("%b",$iFecha);
  return $nombreMes;
}
//regresa el año a partir de una fecha completa
function anio($fecha){
  setlocale(LC_TIME,"es_MX");		
     if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
             list($ano,$mes,$dia)=split("/", $fecha);
     if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
             list($ano,$mes,$dia)=split("-",$fecha);
	 return $ano;
}
//redondea a dos decimales una cantidad tipo real
function redondear_dos_decimal($valor) {
   $float_redondeado=round($valor * 100) / 100;
   return $float_redondeado;
}
?>