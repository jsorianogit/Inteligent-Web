<!--<html>
<head> -->
<?php
#require ("../../../../include/formulario.inc.php");
   #echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   #echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   #echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   #echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
<?php
//fecha
//$fecha; 
//numero de orden 
//$sNumeroOrden;
//id diario
//$IdDiario;

//lista de campos que permaneceran bloqueados en insert o update
$bloqueados =array("sContrato","dIdFecha","iIdDiario","sDescripcion","sHoraInicio","sHoraFinal","sFactor","dCostoMN","dCostoDLL");

//lista de campos que no deben mostrarse en el grid
$ocultos =array("sContrato");

//campos con los valores que deben contener en el formulario de insertar
$valdefaults = array("sContrato"=>$sContrato,"dIdFecha"=>$fecha,"iIdDiario"=>$IdDiario);

//lista de tablas relacionadas con la actual, para efectos de 
//update y delete
$tablasrelaciones = array ("none");

//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","dIdFecha","iIdDiario","sIdPersonal","sIdPernocta","sIdPlataforma");

//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
$sqlGeneral = "SELECT sContrato,dIdFecha,iIdDiario,sIdPersonal,sDescripcion,sIdPernocta,sIdPlataforma,dCantidad,dCostoMN,(dCostoMn*dCantidad) as Total_MN FROM bitacoradepersonal WHERE sContrato ='$sContrato' AND iIdDiario='$IdDiario' AND dIdFecha = '$fecha' ";

//formulario objeto
$form = new formulario($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);
$form->editar(1);
$form->borrar(1);
$arrayOpciones = array("sIdPersonal"=>" onChange='asignarValorPersonal();' ");
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
   //mensaje($_SESSION['sCondicion']);
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
         $form->crearDelete($_SESSION['sCondicion']);
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
?>
<center>
<!--<input type ="button" onClick="document.location='<?php $_SERVER[PHP_SELF] ?>?operacion=a'" value="Insertar" title="Inserta Registro">
<input type ="button" onClick="document.location='../'" value="Regresar" title="Regresar a Reporte Diario">-->
<?php
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
   if (confirm("Desea Borrar todo el personal Asignado ??")) {
      document.limpiarP.submit();
   }
}
</script>
<table border=3 >
<tr>
<form name="limpiarP" action="limpiarPersonal.php" method="post" >
   <input type="hidden" name="Fecha" value="<?php echo $fecha ?>" >
   <input type="hidden" name="IdDiario" value="<?php echo $IdDiario ?>" >
   <input type="hidden" name="Contrato" value="<?php echo $sContrato ?>" >
<td bgcolor="red">
   <center>
      <input type ="button" onClick="document.location='<?php $_SERVER[PHP_SELF] ?>?operacion=a'" value="Insertar Personal" title="Inserta Personal">
   </center>
</td>
<td bgcolor="red"> 
  <!-- <input type ="button" onClick="document.location='../'" value="Regresar" title="Regresar a Reporte Diario">-->
   <input type="button" name="Borrar" value="Borrar todo el Personal Asignado"  onclick="borrar();" title="Borra el Personal">
</form>
</td>
<td bgcolor="red">
         <!--Insertar Grupo / Paquete de Categorias-->
         <?php
         $sql ="select distinct(sNumeroPaquete) from paquetesdepersonal where sContrato ='$sContrato' AND sIdPersonal<>'' ";
         $result = mysql_query($sql);
         echo "<form name='personal' method='POST' action ='index.php'>";
         echo "<b>Grupos/Paquetes : </b><select name='paquetedepersonal' >";
         while($row = mysql_fetch_array($result)){
            echo "<option>$row[0]</option>";
         }
         echo "</select>";
         echo "<input type = 'submit' value='Insertar Grupo / Paquete de Categorias de Personal' name='BotonPaquetePersonal'>";
         echo "</form>";
         ?>
</td>       
</tr>
</table>
</p>
<?php
$sql = "SELECT sum(dCantidad),sum(dCostoMN),(sum(dCostoMn)*sum(dCantidad)) FROM bitacoradepersonal WHERE sContrato ='$sContrato' AND iIdDiario='$IdDiario' AND dIdFecha = '$fecha' group by sContrato";
$rs = mysql_query($sql);
$row = mysql_fetch_array($rs);
echo "<center><table><tr><td>Personal Total: </td><td>$row[0]</td></tr></table></center>";
$form->visualizar($pag,$_SESSION['OrdenarPor']);

//mysql_close();
?>
<!--</body>
</html> -->
