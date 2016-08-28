<?php
session_cache_limiter("must-revalidate");
session_start();
?>
<html>
<head>
<script>
function recargaestimacion(generador,fInicio,fFinal){
   mostrarEspera();
   parent.window.frames['estimacionxpartida'].location.href = "estimacionxpartida.php?Generador=" + generador + "&fInicio="+fInicio+"&fFinal="+fFinal+"";

//   parent.window.location.href = "#?division=2";
   return;
}
function domTableEnhance(url)
{
   if(!document.createTextNode){return;}
   var tableClass='enhancedtable';
   var colourClass='enhancedtablecolouredrow';
   var hoverClass='enhancedtablerowhover';
   var activeClass='enhancedtableactive';
   var alltables,bodies,i,j,k,addClass,trs,c,a;
   alltables=document.getElementsByTagName('table');
   for (k=0;k<alltables.length;k++)
   {
      if(!alltables[k].className.match(tableClass)){continue;}
      bodies=alltables[k].getElementsByTagName('tbody');
      for (i=0;i<bodies.length;i++)
      {
         trs=bodies[i].getElementsByTagName('tr')
         for (j=0;j<trs.length;j++)
         {
            var tds=bodies[i].getElementsByTagName('td');
            if(trs[j].getElementsByTagName('td').length>0)
            {
               
               addClass=j%2==0?' '+colourClass:'';
               trs[j].className=trs[j].className+addClass;
               trs[j].onclick=function()
               {
                  //envia el numero de generador a la seccion Partidas del Generdor
                  recargaestimacion(this.cells[2].innerHTML,this.cells[5].innerHTML,this.cells[6].innerHTML);
                  recargaestimacion(this.cells[2].innerHTML,this.cells[5].innerHTML,this.cells[6].innerHTML);
                  for(w=0;w<trs.length;w++){
                     var rep=trs[w].className.match(' '+activeClass)?' '+activeClass:activeClass;
                     trs[w].className=trs[w].className.replace(rep,'');
                  }
                  if(this.className.match(activeClass)){
                     var rep=this.className.match(' '+activeClass)?' '+activeClass:activeClass;
                     this.className=this.className.replace(rep,'');
                  } else {
                     this.className+=this.className?' '+activeClass:activeClass;
                  }
                  
                  return;
               }
               trs[j].onmouseover=function()
               {
                  this.className=this.className+' '+hoverClass;
               }
               trs[j].onmouseout=function()
               {
                  var rep=this.className.match(' '+hoverClass)?' '+hoverClass:hoverClass;
                  this.className=this.className.replace(rep,'');
               }

            }

         }
         var tds=bodies[i].getElementsByTagName('td');
         for(var j=0;j<tds.length;j++) {
            tds[j].onclick=function(){
               //al dar click en el td y si tiene enlace el onClick, ejecutarlo
               var contenido = this.innerHTML;
               var posicion = contenido.indexOf("onClick");
               var posicionM = contenido.indexOf("onclick");
               var posEliminar = contenido.indexOf("Eliminar");
               //Llama al modulo de modificar
               if(posicion>=0 || posicionM>=0 && posEliminar<0){
                  var trozos = contenido.split("'");
                  var posCadena = trozos[1].indexOf("Aplicado");
                  if(posCadena <0 ){
                     document.location.href=trozos[1];
                  }
               }//Llama al modulo de eliminar
               else if(posicion>=0 || posicionM>=0 && posEliminar>0){
                  var trozos = contenido.split("'");
                  var posCadena = contenido.indexOf("Aplicado");
                  if(posCadena <0 && elimina){
                     document.location.href=trozos[3];
                  }
               }
            }
         }
       
      }
   }     
} 
window.onload = domTableEnhance;

//Crea la parte de los checkBox
function FasesAfectadas(){
//Resolucion de la Pantalla
   var hz=window.screen.height
   var wz=window.screen.width
   //document.write("La resolución de la pantalla es:<br>");
   //document.write("Ancho: " + wz + "<br>");
   //document.write("Alto: " + hz + "<br>");
   switch(wz){
      case (800):
         left = 890;
         break;
      case (1280):
         left = 903;
         break;
      case (1024):
         left = 903;
         break;
   }
   
//Frame Flotante
   document.writeln("<iframe  src=\"fases.php\" id=\"Fases\" name=\"Fases\" frameborder=\"0\" framespacing=\"0\" scrolling=\"auto\" border=\"1\" style=\"position:absolute; left:"+left+"px; top:50px; width:300; height:190; z-index:5\"></iframe>");
}

</script>
<?php
//require ("../../../../fnUtilerias.php");
require ("generadores.inc.php");
ob_flush() ;
flush() ;
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   //echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";

?>
</head>
<body   bgcolor="#FFAA00">
<script>
imprimeEspera();
mostrarEspera();
</script>
<?php
ob_flush();
flush();
#obtener el generador que se desea modificar
if(isset($_REQUEST['Sql'])){
  $SQL =  $_REQUEST['Sql'] ;
  $filtro = encrypt($_REQUEST['Sql'],1);
  $filtro=formulario::limpiar($filtro);
  $cadena = explode("=",$filtro);
  $cad =  explode("'",$cadena[2]);
  $generador = $cad[1];
}

#obtener el grupo al que pertenece el usuario
$sql = "select sIdGrupo from usuarios where sIdUsuario='".$_SESSION['ssUsuario']."'";
$rs = mysql_query($sql);
if($row = mysql_fetch_array($rs)){$sIdGrupo = $row['sIdGrupo'];}

#verificar si el generador tiene partidas
$sql = "Select a.iItemOrden, e1.sWbs, e1.sNumeroActividad, e1.sIsometrico, e1.sPrefijo,
        e1.dCantidad as dGenerado, e1.sIsometricoReferencia,e1.sInstalacion, e1.mComentarios,
        e1.lEstima, e1.iOrdenCambio, a.sMedida, a.mDescripcion, a.dVentaMN
        from estimacionxpartida e1
        inner join actividadesxorden a on (a.sContrato = e1.sContrato and a.sNumeroOrden = e1.sNumeroOrden and
        a.sWbs = e1.sWbs and a.sNumeroActividad = e1.sNumeroActividad And a.sTipoActividad = 'Actividad')
        Where e1.sContrato = '$sContrato' And e1.sNumeroOrden = '".$_SESSION['NumberOrder']."'
        And e1.sNumeroGenerador = '$generador' ";
$rs = mysql_query($sql);
if($sIdGrupo<>"INTEL-CODE"){
   if($row = mysql_fetch_array($rs)){
      mensaje("Existen partidas registradas en el generador, no podra modificar el periodo de generación.");
      $bloqueados =array("sContrato","sNumeroOrden","lStatus","dFechaInicio","dFechaFinal");
   }
   else{
      $bloqueados =array("sContrato","sNumeroOrden","lStatus");
   }
}
else{
      $bloqueados =array("sContrato","sNumeroOrden","lStatus");
}
//lista de campos que permaneceran bloqueados en insert o update


//lista de campos que no deben mostrarse en el grid
$ocultos =array(
"sContrato",
"sNumeroOrden",
"iConsecutivo",
"dBitacoraInicio",
"dBitacoraFinal",
"sFaseObra",
"dFinancieroGenerador",
"sIdUsuarioValida",
"sIdUsuarioResidente");

$hidden =array(
"sContrato",
"sNumeroOrden",
"iSemana",
"iConsecutivo",
"dBitacoraInicio",
"dBitacoraFinal",
"sFaseObra",
"lStatus",
"dMontoMN",
"dMontoDLL",
"dFinancieroGenerador",
"sIdUsuario",
"sIdUsuarioValida",
"sIdUsuarioAutoriza",
"sIdUsuarioResidente"
);
//campos con los valores que deben contener en el formulario de insertar

#obtener el consecutivo

$sql ="Select Max(iConsecutivo) as iConsecutivo From estimaciones Where sContrato = '$sContrato' Group By sContrato";
$rs = mysql_query($sql);
if($row = mysql_fetch_array($rs)){
		$consecutivo = $row['iConsecutivo']+1;
}
if(!$consecutivo)$consecutivo = 1;

#obtener el rango de periodo de generacion
$sql = "select sRangoEstimacion from configuracion where sContrato='$sContrato'";
$rs = mysql_query($sql);
if($row = mysql_fetch_array($rs)){$sRangoEstimacion = $row['sRangoEstimacion'];}

if($sRangoEstimacion=="Diario"){
   $fechaFinal = fecha_mas_dias(date("Y-m-d"),1);
}
else if($sRangoEstimacion=="Semanal"){
   $fechaFinal = fecha_mas_dias(date("Y-m-d"),7);
}
else if($sRangoEstimacion=="Mensual"){
   $fechaFinal = fecha_mas_dias(date("Y-m-d"),30);
}
$fechaFinal = str_replace("-","/",$fechaFinal);

#asignar los valores predeterminados al insertar
$valdefaults = array(
   "sContrato"=>$sContrato,
   "sIdUsuario"=>$_SESSION['ssUsuario'],
   "sNumeroOrden"=>$_SESSION['NumberOrder'],
   "iConsecutivo"=>$consecutivo,
   "dFechaFinal"=>$fechaFinal);

//lista de tablas relacionadas con la actual, para efectos de
//update y delete
$tablasrelaciones = array ("estimacionxpartida","estimacionxisometrico");

//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","sNumeroOrden","sNumeroGenerador");

//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
$sqlGeneral="SELECT  sContrato,sNumeroGenerador,iNumeroEstimacion,
                     sNumeroOrden,iSemana,iConsecutivo,dFechaInicio,
                     dFechaFinal,dBitacoraInicio,dBitacoraFinal,sFaseObra,
                     mComentarios,lStatus,dMontoMN,dMontoDLL,dFinancieroGenerador,
                     sIdUsuario,sIdUsuarioValida,sIdUsuarioAutoriza,sIdUsuarioResidente
            FROM estimaciones WHERE sContrato='$sContrato' and sNumeroOrden='".$_SESSION['NumberOrder']."'";

//formulario objeto
$form = new generadores($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);
$form->fcampoHidden($hidden);
$form->ordenarXsql(true);
$form->jsCodeCharge("FasesAfectadas();","codigo");
$sqlEstimacion ="select iNumeroEstimacion,iNumeroEstimacion from estimacionperiodo where sContrato='$sContrato' ;";

$selects = array("iNumeroEstimacion"=>$sqlEstimacion);
$form->ponerselectPersonalizado($selects);
//verifica las ralaciones
//$tablas = $form->relaciones("cuentas");
//foreach($selects as $i=>$tabla)
// echo "<br>$i $tabla";

/*si se ha iniciado una nueva consulta, destruir la actual*/
if (!isset($_SESSION['sqlAnterior'])){
   $_SESSION['sqlAnterior']=$sqlGeneral;
}
else if ($_SESSION['sqlAnterior'] != $sqlGeneral){
   $_SESSION['sqlAnterior']=$sqlGeneral;
   unset($_SESSION['OrdenarPor']);
   unset($_REQUEST);
   unset($_REQUEST);
   //unset($_POST);
}

/*obtener el filtro*/
if(isset($_REQUEST['Sql'])){
   $Filtro=encrypt($_REQUEST['Sql'],1);
   $_SESSION['sCondicion']=$Filtro=$form->limpiar($Filtro);
   if(strpos($sqlGeneral,'WHERE') or strpos($sqlGeneral,'where'))
   {
      $sqlFiltro=$sqlGeneral." and ".$Filtro;
   }
   else
   {
      $sqlFiltro=$sqlGeneral." where ".$Filtro;
   }
}

/*Validar Segun enlace seguido*/
if ( isset($_REQUEST['operacion'])){
  // echo    $_REQUEST['operacion'];
    switch($_REQUEST['operacion']){
      case ('a'):
         ?>
         <script>parent.window.generadores.ocultarEspera();</script>
         <?php
          //crea el formulario para insertar
         $_SESSION['sOperacion']="Insertar";
         $form->CreaFormulario();
         break;
      case ('m'):
          //crea el formulario para modificar
          $_SESSION['sOperacion']="Modificar";
         ?>
         <script>parent.window.generadores.ocultarEspera();</script>
         <?php
         $form->CreaFormulario($sqlFiltro);
         break;
      case ('b'):
         //hace un delete segun link seguido 
         $form->crearDelete( $_SESSION['sCondicion'] );
         break;
   }
}

/*Realizar accion segun tipo de formulario (insert, update)*/
if(isset($_POST['aceptar'])){
 switch ($_POST['aceptar']){
   case "Insertar":
      //hace un insert
      $form->crearInsert( $_POST , $HTTP_POST_FILES );
      $_POST['aceptar']=$_SESSION['sOperacion']="";
      break;
   case "Modificar":
      //hace un update
      $form->crearUpdate( $_SESSION['sCondicion'] , $_POST , $HTTP_POST_FILES);
      $_POST['aceptar']=$_SESSION['sOperacion']="";
      break;
}

}
$_SESSION['sOperacion']="Insertar";
?>
<center>
<input type="button" name="button" value="<?php echo $_SESSION['sOperacion'] ?>" onClick="document.location='<?php echo $_SERVER[PHP_SELF]?>?operacion=a'" >
<?php
//echo "\n<center><a href='".$_SERVER[PHP_SELF]."?operacion=a'>".$_SESSION['sOperacion']."</a>";
//recoge la pagina actual para el paginador
if(isset($_REQUEST['pag'])){
   $_SESSION['pagActual']=$_REQUEST['pag'];
   $pag=$_REQUEST['pag'];
}
elseif(isset($_SESSION['pagActual']))
   $pag=$_SESSION['pagActual'];
elseif(!isset($pag))
   $pag=1;
//Recoge el campo para el ORDER BY
if(isset($_REQUEST['order'])){
   $_SESSION['OrdenarPor'] = $_REQUEST['order'];
}

//mostrar grid 
//unset($_REQUEST);
//unset($_REQUEST);
//unset($HTTP_POST_FILES);
//unset($_POST);
//unset($HTTP_POST_VARS);
$form->visualizar($pag,$_SESSION['OrdenarPor']);
mysql_close();
?>
<script>ocultarEspera()</script>
</body>
</html>
