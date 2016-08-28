<!--<html>
<head> -->
<?php
#require ("../../../../include/formulario.inc.php");
   #echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   #echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   #echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   #echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
</head>
<body>
<?php
//fecha
$fecha; 
//numero de orden 
$sNumeroOrden;

//lista de campos que permaneceran bloqueados en insert o update
$bloqueados =array("sContrato","dIdFecha","iIdDiario","sDescripcion","sHoraInicio","sHoraFinal","sFactor","dCostoMN","dCostoDLL");

//lista de campos que no deben mostrarse en el grid
$ocultos =array("sContrato","dIdFecha","iIdDiario","sHoraInicio","sHoraFinal","sFactor","dCostoDLL");

//campos con los valores que deben contener en el formulario de insertar
$valdefaults = array("sContrato"=>$sContrato,"dIdFecha"=>$fecha,"iIdDiario"=>$IdDiario);

//lista de tablas relacionadas con la actual, para efectos de 
//update y delete
$tablasrelaciones = array ("none");

//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","dIdFecha","iIdDiario","sIdEquipo","sIdPernocta");

//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
$sqlGeneral = "SELECT *,(dCostoMN*dCantidad) as Total_MN FROM bitacoradeequipos WHERE sContrato ='$sContrato' and iIdDiario='$IdDiario' and dIdFecha = '$fecha' ";
//formulario objeto
$form = new formulario($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);
$form->editar(1);
$form->borrar(1);
$arrayOpciones = array("sIdEquipo"=>" onChange='asignarValorEquipo();' ");
$form->OpcionesExtras($arrayOpciones);
$bloqueados =array("sContrato","dIdFecha","iIdDiario","sHoraInicio","sHoraFinal","sFactor","dCostoMN","dCostoDLL");
$form->fcampoHidden($bloqueados);
//verifica las ralaciones
#$tablas = $form->relaciones("jornadasdiarias");
#foreach($tablas as $tabla)
#  echo "<br> $tabla";
   
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
//echo $sqlFiltro;
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
//echo "\n<center><a href='".$_SERVER[PHP_SELF]."?operacion=a'>[".$_SESSION['sOperacion']."]</a>";
//echo "\n<a href='../'>[Regresar]</a>";
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
?>
<p>
<script language="javascript" >
function borrar(){
   if (confirm("Desea Borrar todo el equipo Asignado ??")) {
      document.limpiarE.submit();
   }
}
</script>
<table border=3 >
<tr>
<form name="limpiarE" action="limpiarEquipo.php" method="post" >
   <input type="hidden" name="Fecha" value="<?php echo $fecha ?>" >
   <input type="hidden" name="IdDiario" value="<?php echo $IdDiario ?>" >
   <input type="hidden" name="Contrato" value="<?php echo $sContrato ?>" >
   <td  bgcolor="red">
      <input type ="button" onClick="document.location='<?php $_SERVER[PHP_SELF] ?>?operacion=a'" value="Insertar Equipo" title="Inserta Registro">
   </td>
   <td  bgcolor="red">
  <!-- <input type ="button" onClick="document.location='../'" value="Regresar" title="Regresar a Reporte Diario"> -->
   <input type="button" name="Borrar" value="Borrar todo el Equipo Asignado"  onclick="borrar();" title="Borra el Equipo">
   </form>
   </td>
   <td  bgcolor="red">
   <?php
         $sql ="select distinct(sNumeroPaquete) from paquetesdeequipo where sContrato ='$sContrato' AND sIdEquipo<>'' ";
         $result = mysql_query($sql);
         echo "<form name='equipo' method='POST' action ='index.php'>";
         echo "<b>Grupos/Paquetes : </b><select name='paquetedeequipo' >";
         while($row = mysql_fetch_array($result)){
            echo "<option>$row[0]</option>";
         }
         echo "</select>";
         echo "<input type = 'submit' value='Insertar Grupo / Paquete de Categorias de Equipos' name='BotonPaqueteEquipo'>";
         echo "</form>";
      ?> 
   </td>

</tr>
</table>
</p>
<?php
$sql = "SELECT sum(dCantidad) FROM bitacoradeequipos WHERE sContrato ='$sContrato' and iIdDiario='$IdDiario' and dIdFecha = '$fecha' ";
$rs = mysql_query($sql);
$row = mysql_fetch_array($rs);
echo "<center><table><tr><td>Equipo Total: </td><td>$row[0]</td></tr></table></center>";
$form->visualizar($pag,$_SESSION['OrdenarPor']);
//mysql_close();
?>
<!--</body>
</html> -->
