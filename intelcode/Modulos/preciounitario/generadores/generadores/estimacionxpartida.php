<?php
session_cache_limiter("must-revalidate");
session_start();
#cachar el numero de generador
if(isset($_REQUEST['Generador'])) $Generador = $_REQUEST['Generador'];
if(isset($Generador)) $_SESSION['Generador'] = $Generador;

#cachar la fecha de inicio
if(isset($_REQUEST['fInicio'])) $fInicio = $_REQUEST['fInicio'];
if(isset($fInicio)) $_SESSION['fInicio'] = $fInicio;

#cachar la fecha final
if(isset($_REQUEST['fFinal'])) $fFinal = $_REQUEST['fFinal'];
if(isset($fFinal)) $_SESSION['fFinal'] = $fFinal;

//require ("../../../../fnUtilerias.php");
require ("../../../../fnContrato.php");
require ("estimacionxpartida.inc.php");
ob_flush() ;
flush() ;
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";

?>
<html>
<head>
<script>
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
         left = 670;
         break;
      case (1280):
         left = 903;
         break;
      case (1024):
         left = 780;
         break;
   }
   
}

function cambiarWbs(){
   <?php
      if(isset($_REQUEST['operacion']) and $_REQUEST['operacion']!=""){
      ?>
document.location.href="estimacionxpartida.php?sActividad="  + document.Actividad.sActividad.value + "&operacion=" + "<?php echo $_REQUEST['operacion'] ?>" + '&Sql=' + '<?php echo $_REQUEST['Sql']; ?>';
   <?php 
      } 
      ?>
}
function infoWbs(){
   <?php if(isset($_REQUEST['operacion']) and $_REQUEST['operacion']!="m"){ ?>
      var Actividad = document.Actividad.sActividad.value ;
      var Wbs = document.Actividad.wbs.value ;
   <?php  }else{  ?>
      var Actividad = document.estimacionxpartida.sNumeroActividad.value;
      var Wbs = document.estimacionxpartida.sWbs.value;
   <?php  }  ?>
      var NumeroOrden = "<?php echo $_SESSION['NumberOrder'] ?>";

   window.frames['_wbs'].location.href = 'wbs.php?sActividad='+ Actividad + '&sWbs=' + Wbs + '&NumeroOrden=' + NumeroOrden ;
}
function wbs(){
//Resolucion de la Pantalla
   var hz=window.screen.height
   var wz=window.screen.width
   //document.write("La resolución de la pantalla es:<br>");
   //document.write("Ancho: " + wz + "<br>");
   //document.write("Alto: " + hz + "<br>");
   //alert(wz);
   switch(wz){
      case (800):
         wz=250;
         hz= 97;//window.screen.height / 2 -50;
         break;
      case (1280):
         wz=(window.screen.width /2) - 393;
         hz= 97;//window.screen.height / 2 -50;
         break;
      case (1024):
         wz=250;
         hz= 97;//window.screen.height / 2 -50;
         break;
   }
   document.write('<iframe  src="wbs.php" id="_wbs" name="_wbs" frameborder="0" framespacing="0" scrolling="auto" border="1" style="position:absolute; left:674px; top:55px; width:'+(wz+50)+'; height:'+(hz+10)+'; z-index:5; border:1;"></iframe>');
}

</script>
<?php

  $sql ="SELECT sNumeroActividad,sWbs
            FROM actividadesxorden 
            WHERE sContrato='$sContrato' 
               AND sIdConvenio='$sIdConvenioAct'  
               AND sNumeroOrden='".$_SESSION['NumberOrder']."' 
               AND  sTipoActividad ='Actividad' 
            ORDER BY iItemOrden,sNumeroActividad;";
?>
</head>
<body>
<center>
<?php
#echo  "OPERACION " .$_REQUEST['operacion']."<br>";
if(isset($_REQUEST['operacion']) and $_REQUEST['operacion']!="m" ){
   if(isset($_REQUEST['sActividad'])) $sActividad=$_REQUEST['sActividad'];
   $result = mysql_query($sql);
   echo "\n<form name='Actividad' action ='$_SERVER[PHP_SELF]' method='POST'>"; 
   echo "\n\tSeleccione Numero de Actividad: <select name='sActividad' onChange='cambiarWbs();' >";
   echo "\n\t\t<option></option>";
   while($row = mysql_fetch_array($result)){
   
      if ($sActividad == $row[0])
         {$sel="selected";$WbsSeleccionado = $row['sWbs'];}
      else
         {$sel="";}
      echo "\n\t\t<option value='$row[0]' $sel>$row[0]</option>";
   }
   echo "\n\t</select>";
    $sqlDescripcion = "SELECT substr(mDescripcion,1,20) as mDescripcion FROM actividadesxorden WHERE sContrato='$sContrato'
                                    AND sIdConvenio='$sIdConvenioAct'
                                    AND sNumeroOrden='".$_SESSION['NumberOrder']."'
                                    AND sTipoActividad ='Paquete'
                                    AND sNumeroActividad='$sActividad';";
   $result = mysql_query($sqlDescripcion);
   if($row = mysql_fetch_array($result)){
      $mDescripcion = ucwords(strtolower(trim($row[0])));
   }
   echo "\n\t<input type='hidden' name='wbs' value='".$WbsSeleccionado."' >";
   echo "\n\t<input type='hidden' name='Descripcion' value='".$mDescripcion."' >";
   echo "\n</form>";
}
//lista de campos que permaneceran bloqueados en insert o update
$bloqueados =array("sContrato","sNumeroOrden","lStatus","sWbs","sNumeroActividad");

//lista de campos que no deben mostrarse en el grid
$ocultos =array(
"sContrato",
"sNumeroOrden",
"sNumeroGenerador",
"lEstima",
"dAcumulado",
"mComentarios");
if(isset($_REQUEST['operacion']) and $_REQUEST['operacion']!="m" ){
   $hidden =array(
   "sContrato",
   "sWbs",
   "sNumeroOrden",
   "sNumeroGenerador",
   "dAcumulado",
   "sNumeroActividad",
   );
}
else{
   $hidden =array(
   "sContrato",
   "sNumeroOrden",
   "sNumeroGenerador",
   "dAcumulado",
   );
}
/*
"sNumeroActividad",
"sWbs",
*/
//campos con los valores que deben contener en el formulario
//de insertar
$valdefaults = array("sContrato"=>$sContrato,
                "sIdUsuario"=>$_SESSION['ssUsuario'],
                "sNumeroOrden"=>$_SESSION['NumberOrder'],
                "sNumeroActividad"=>$sActividad,
                "sWbs"=>$WbsSeleccionado,
                "sNumeroGenerador"=>$_SESSION['Generador'],
                "lEstima"=>"Si");

//lista de tablas relacionadas con la actual, para efectos de 
//update y delete
$tablasrelaciones = array ("");

//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array (
 "sContrato",
 "sNumeroOrden",
 "sNumeroGenerador",
 "sWbs",
 "sNumeroActividad",
 "sIsometrico",
 "sPrefijo"
);



#consulta sql de donde tomar los campos para el formulario
#solo puede tener clausula where
$sqlGeneral = "SELECT  sContrato ,sNumeroOrden,sNumeroGenerador,sWbs,sNumeroActividad,dCantidad,lEstima,sIsometrico,sPrefijo,sInstalacion,iOrdenCambio,sIsometricoReferencia,dAcumulado,mComentarios
               FROM estimacionxpartida
               WHERE sContrato='$sContrato' and sNumeroOrden='".$_SESSION['NumberOrder']."' and sNumeroGenerador='".$_SESSION['Generador']."'";

#formulario objeto
$form = new estimaciones($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);

#Poner los campos ocultos
$form->fcampoHidden($hidden);
$form->ordenarXsql(true);

#Codigo de javascript que se carga al terminar de crear el formulario
$form->jsCodeCharge("wbs();infoWbs();document.Actividad.sActividad.focus();","codigo");

#Campos que son de tipo select
$sqlWbs ="SELECT sWbs,sWbs
          FROM actividadesxorden
          WHERE sContrato='$sContrato' AND sIdConvenio='$sIdConvenioAct'  AND sNumeroOrden='".$_SESSION['NumberOrder']."'
            AND  sTipoActividad ='Actividad' and sNumeroActividad='$sActividad'
          ORDER BY iItemOrden,sNumeroActividad";

$sqlIsometricoR ="SELECT sIsometrico,sIsometrico
               FROM isometricos
               WHERE sContrato='$sContrato'";

$sqlOrdenCambio = "SELECT iCedulaProcedencia,concat('O.C. No. [', iCedulaProcedencia,']') as iCedula
                  FROM ordendecambio WHERE sContrato='$sContrato' ;";

$sqlInstalacion ="select sInstalacion,sInstalacion from contrato_trinomio where sContrato='$sContrato' ;";

$rs = mysql_query($sqlInstalacion);
if($row = mysql_fetch_array($rs)){
   $sqlInstalacion ="select  sInstalacion, sInstalacion from contrato_trinomio where sContrato='$sContrato' ;";
}else{
   $sqlInstalacion ="select '$sContrato' as sInstalacion,'$sContrato' as sInstalacionDes from dual ;";
}
$selects = array("iOrdenCambio"=>$sqlOrdenCambio,"sIsometricoReferencia"=>$sqlIsometricoR,"sWbs"=>$sqlWbs,"sInstalacion"=>$sqlInstalacion);
$form->ponerselectPersonalizado($selects);
//codigo de javascript que se agrega a la etiqueta
$arrayOpciones = array("sNumeroActividad"=>" onChange=\"infoWbs();\" ");
$form->OpcionesExtras($arrayOpciones);

//verifica las ralaciones
//$tablas = $form->relaciones("cuentas");
//foreach($tablas as $tabla)
// echo "<br> $tabla";
   
/*si se ha iniciado una nueva consulta, destruir la actual*/
if (!isset($_SESSION['sqlAnterior'])){
   $_SESSION['sqlAnterior']=$sqlGeneral;
}
else if ($_SESSION['sqlAnterior'] != $sqlGeneral){
   $_SESSION['sqlAnterior']=$sqlGeneral;
   unset($_SESSION['OrdenarPor']);
   unset($_REQUEST);
   unset($_REQUEST);
   unset($_POST);
}

/*obtener el filtro*/
if( isset($_REQUEST['Sql'])){
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
    switch($_REQUEST['operacion']){
      case ('a'):
          //crea el formulario para insertar
         $_SESSION['sOperacion']="Insertar";
         $form->CreaFormulario();
         break;
      case ('m'):
          //crea el formulario para modificar
          $_SESSION['sOperacion']="Modificar";
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
         
      $form->crearInsert($_POST , $HTTP_POST_FILES );
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
$sqlG = "select sIdUsuario , lStatus from estimaciones WHERE sContrato='$sContrato' and sNumeroOrden='".$_SESSION['NumberOrder']."' and sNumeroGenerador='".$_SESSION['Generador']."';";
         
$rs = mysql_query($sqlG);
if($rw = mysql_fetch_array($rs)){
   $usuario = $rw['sIdUsuario'];
   $estatus = $rw['lStatus'];
}
if($estatus == "Pendiente")
   $click = "document.location='$_SERVER[PHP_SELF]?operacion=a'";
else
   $click = "alert('Generador Apliacado, No puede Realizar Cambios')";
?>
<center>
<input type="button" name="button" value="<?php echo $_SESSION['sOperacion'] ?>" onClick="<?php echo $click ?>" >
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
</body>
</html>
<script>parent.window.generadores.ocultarEspera();</script>
