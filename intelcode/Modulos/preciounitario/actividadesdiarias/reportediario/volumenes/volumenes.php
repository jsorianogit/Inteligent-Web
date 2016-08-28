<?php
require("volumenes.inc.php");
require ("fnAcumulados.php");
require("../../../../../fnContrato.php");
/*Obtener los datos del reporte diario*/
$form = new reportediario();

/*obtener el filtro*/
//$Filtro=encrypt($_REQUEST['Sql'],1);
$sContrato;
if(isset($_REQUEST['sNumeroOrden']))
   $_SESSION['NumeroOrden']=$_REQUEST['sNumeroOrden'];
if(isset($_REQUEST['dIdFecha']))
   $_SESSION['fecha']=$_REQUEST['dIdFecha'];
if(isset($_REQUEST['convenio']))
   $_SESSION['convenio'] =$_REQUEST['convenio'];
if(isset($_REQUEST['sIdTurno']))
   $_SESSION['sIdTurno']=$_REQUEST['sIdTurno'];
$Turno = $_SESSION['sIdTurno'];
if(isset($_REQUEST['lStatus']))
   $_SESSION['lStatus']=$_REQUEST['lStatus'];

//recoge la pagina actual para el paginador
if(isset($_REQUEST['pag'])){
   $_SESSION['pagActual']=$_REQUEST['pag'];
   $pag=$_REQUEST['pag'];
}
elseif(isset($_SESSION['pagActual']))
   $pag=$_SESSION['pagActual'];
elseif(!isset($pag))
   $pag=1;
?>
<html>
<head>
<script src="ajax.js" language="JavaScript"></script>
   <SCRIPT>
   function disparition()
   {
   if(document.getElementById)
   document.getElementById("_wbs").style.visibility = 'hidden';
   }
   </SCRIPT>
   <SCRIPT>
   function afficher()
   {
   if(document.getElementById)
   document.getElementById("_wbs").style.visibility = 'visible';
   }
   </SCRIPT>
<?php
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
<script language='javascript'>
function deshabilitar(){
   document.actividad.sNumeroActividad.selectedIndex = 0;
   document.actividad.sNumeroActividad.disabled=true;
   document.wbs.swbs.selectedIndex = 0;
   document.wbs.swbs.disabled=true;
   document.salvar.cantidadIns.value="";
   document.salvar.sNumeroActivdad.value="";
   document.salvar.swbs.value="";
   document.salvar.comentarios.value="";
   document.salvar.cantidadIns.value="";
   document.salvar.cantidadIns.disabled=true;
   document.salvar.comentarios.focus();
}

function habilitar(){
   document.actividad.sNumeroActividad.disabled=false;
   document.wbs.swbs.disabled=false;
   document.salvar.cantidadIns.value="";
   document.salvar.sNumeroActivdad.value="";
   document.salvar.swbs.value="";
   document.salvar.comentarios.value="";
   document.salvar.cantidadIns.value="";
   document.salvar.cantidadIns.disabled=false;
   document.actividad.sNumeroActividad.focus();
}

function buscar()
{
   var cadena  = document.salvar.patron.value;
   var patron = "_"  + document.salvar.sIdTipoMovimiento.value;
   var encontrados=cadena.match(patron);
   var bandera=2;
   if(encontrados != null)
   {
      for(cont = 0; cont < encontrados.length ; cont++)
      {
            if(encontrados[cont] != "")
            {
               bandera = 1;
               break;
            }
      }
   }
   if(bandera==1)
   {
      deshabilitar();   
   }else
   {
      habilitar();
   }
}
</script>
</head>
<body>
<center>
<?php
$ocultos = array ("sContrato","sPaquete","sNumeroOrden","lAlcance");
//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","iIdDiario","sWbs","sNumeroActividad","sNumeroOrden","dIdFecha");
$tablasrelaciones = array ("none");
$bloqueados =array("sContrato","dIdFecha","iIdDiario","sIdTurno","sIdDepartamento","sNumeroOrden","sWbs","sPaquete","sNumeroActividad","sIdTipoMovimiento","sHoraInicio","sHoraFinal","sFactor","dCantidad","dAvance",
"lGenerado","lAlcance","sIsometrico","dCantidadAnterior","dAvanceAnterior","dCantidadActual","dAvanceActual","lAlcance");
//$ocultos =array("sContrato","dIdFecha","iIdDiario","sIdTurno","sIdDepartamento","sNumeroOrden","sWbs","sPaquete","sNumeroActividad","sIdTipoMovimiento","sHoraInicio","sHoraFinal","sFactor","dCantidad","dAvance",
//"lGenerado","lAlcance","sIsometrico","dCantidadAnterior","dAvanceAnterior","dCantidadActual","dAvanceActual");
//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
$sql = "SELECT sTipoAlcance FROM configuracion WHERE sContrato='$sContrato'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $sTipoAlcance = $row['sTipoAlcance'];
}
$sqlGeneral="SELECT
bitacoradeactividades.sContrato,
bitacoradeactividades.sNumeroOrden,
bitacoradeactividades.dIdFecha,
bitacoradeactividades.iIdDiario,
bitacoradeactividades.lAlcance,
bitacoradeactividades.sWbs,
bitacoradeactividades.sPaquete,
bitacoradeactividades.sNumeroActividad,
turnos.sDescripcion,
tiposdemovimiento.sDescripcion,
bitacoradeactividades.dCantidad,
bitacoradeactividades.dAvance,
actividadesxorden.sMedida,
actividadesxorden.dVentaMN as dVentaMN,
(bitacoradeactividades.dCantidad*actividadesxorden.dVentaMN) as dCostoMN
from bitacoradeactividades  
INNER JOIN turnos ON (bitacoradeactividades.sContrato=turnos.sContrato AND bitacoradeactividades.sIdTurno=turnos.sIdTurno) 
INNER JOIN tiposdemovimiento  ON (tiposdemovimiento.sContrato=bitacoradeactividades.sContrato AND tiposdemovimiento.sIdTipoMovimiento=bitacoradeactividades.sIdTipoMovimiento) 
LEFT JOIN actividadesxorden  ON 
(actividadesxorden.sContrato=bitacoradeactividades.sContrato 
AND actividadesxorden.sIdConvenio='".$_SESSION['convenio']."'
AND actividadesxorden.sNumeroActividad=bitacoradeactividades.sNumeroActividad   
AND actividadesxorden.sWbs=bitacoradeactividades.sWbs 
AND actividadesxorden.sNumeroOrden=bitacoradeactividades.sNumeroOrden) 
WHERE bitacoradeactividades.sContrato ='$sContrato' and bitacoradeactividades.dIdFecha='".$_SESSION['fecha']."' 
AND bitacoradeactividades.sIdTipoMovimiento <> '$sTipoAlcance' AND bitacoradeactividades.sIdTurno='$Turno'
AND bitacoradeactividades.sNumeroOrden='".$_SESSION['NumeroOrden']."'";

//formulario objeto

$form->formulario($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);
if($_SESSION['lStatus']!="Pendiente"){
   mensaje("ATENCION:  El reporte Diario Esta Validado/Autorizado No puede realizar Cambios Aqui !!! ");
   echo "<font color=RED>";
   echo "<center><br>Reporte Diario Validado/Autorizado No puede realizar Cambios Aqui !!!<br></center>";
   echo "</font>";
   $form->opciones(0,0);
}
   
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
}
/*Validar Segun enlace seguido para Eliminar bitacora*/
if ( isset($_REQUEST['operacion'])){
    switch($_REQUEST['operacion']){
      case ('m'):
          //crea el formulario para modificar
         $_SESSION['sOperacion']="Modificar";
         $form->CreaFormulario("SELECT sDescripcion FROM bitacoradeactividades WHERE ".$_SESSION['sCondicion']);
      case ('b'):
         #hace un delete de la actividad

         $arraCondicion = explode("AND",$_SESSION['sCondicion']);
         #evaluar las expresiones
         foreach($arraCondicion as $con){
            $con = str_replace("'","\"",$con);
            $evaluacion = "\$".trim($con);
            eval("$evaluacion;");
         }
         #obtener la cantidad instalada
         $sql2 = "SELECT dCantidad  FROM bitacoradeactividades WHERE ".$_SESSION['sCondicion'];
         $result = mysql_query($sql2);
         if($row = mysql_fetch_array($result))
         {
            $bdCantidad = $row[0];
         }
         #actualizar el contrato
         $sql = "select
                  dCantidad,
                  dInstalado,
                  dExcedente
                 from
                  actividadesxorden
                 where
                  sContrato = '$sContrato'
                  and sIdConvenio = '".$_SESSION['convenio']."'
                  and sNumeroOrden = '$sNumeroOrden'
                  and sWbs = '$sWbs'
                  And sNumeroActividad = '$sNumeroActividad'";
         $rs = mysql_query($sql);
         if($row = mysql_fetch_array($rs)){
            fnActualizaAcumuladosOrden($sContrato,
                                       $sNumeroOrden,
                                       $_SESSION['convenio'],
                                       'Eliminar',
                                       $sWbs,
                                       $sNumeroActividad ,
                                       $row['dCantidad'],
                                       $row['dInstalado'],
                                       $row['dExcedente'],
                                       $bdCantidad);

          }
         #actualizar la orden
         $sql ="select
                  dCantidadAnexo,
                  dInstalado,
                  dExcedente
                from
                  actividadesxanexo
                where
                  sContrato = '$sContrato' and
                  sIdConvenio = '".$_SESSION['convenio']."'
                  And sNumeroActividad = '$sNumeroActividad'";

         $rs = mysql_query($sql);
         if($row = mysql_fetch_array($rs)){
           fnActualizaAcumuladosContrato($sContrato,
                                          $_SESSION['convenio'],
                                          "Eliminar",
                                          $sNumeroActividad,
                                          $row['dCantidadAnexo'],
                                          $row['dInstalado'],
                                          $row['dExcedente'],
                                          $bdCantidad);

          }
         $form->crearDelete($_SESSION['sCondicion']);
         $sqlOrden="";

         
         $_REQUEST['operacion']="";
         location("?operacion=1");
         break;
   }
}

   
   /*Realizar accion segun tipo de formulario (insert, update)*/
if(isset($_POST['aceptar'])){
 switch ($_POST['aceptar']){
   case "Insertar":
      //hace un insert
      foreach($_POST as $index => $value) echo "<br>$index => $value";
      //$form->crearInsert( $_POST , $HTTP_POST_FILES );
      $_POST['aceptar']=$_SESSION['sOperacion']="";
      break;
   case "Modificar":
      //hace un update
      $form->crearUpdate( $_SESSION['sCondicion'] , $_POST , $HTTP_POST_FILES); 
      $_POST['aceptar']=$_SESSION['sOperacion']="";
      break;
}
}

//Recoge el campo para el ORDER BY (En esta Seccion no es Aplicable)
if(isset($_REQUEST['order'])){
   $_SESSION['OrdenarPor'] = $_REQUEST['order'];
}
$nombres = array("Fecha","Id","Wbs","Concepto","Turno/Origen","Movimiento","Cantidad","Avance","Unidad","P. Unitario","Total");
//echo "<center><a href ='../reportediario.php'>[Regresar]</a></center>";
?>
   <script language='javascript'>
   function mostrarForm(){setTimeout ('mForm();', 500); }
   function mForm(){
      afficher();
      document.getElementById('FormularioPrincipal').style.visibility='visible';
      <?php 
         $result = mysql_query($sqlGeneral);
         if($row = mysql_fetch_array($result)){
      ?>
      document.getElementById('ReporteVolumenes').style.visibility='hidden';
      document.getElementById('paginadorSuperior').style.visibility='hidden';
      document.getElementById('paginadorInferior').style.visibility='hidden';
      <?php
         }
         else
         {
      ?>
         document.getElementById('Vacio').style.visibility='hidden'
      <?php
         }
      ?>
      document.getElementById('tablaWbs').style.visibility='visible';
      document.getElementById('Insertar').disabled=true;
      document.getElementById('regresar').disabled=true;
      cargaXML("insert_ini.php");
      if(document.all){
         if(window.screen.width ==800){
            izq=0;
         }
         else if(window.screen.width ==1024){
            izq=150;
         }
         else{
            izq=(300+window.screen.width )-window.screen.width;
         }
      }
      else {
         if(window.screen.width ==800){
            izq=0;
         }
         else if(window.screen.width ==1024){
            izq=150;
         }
         else{
            izq=(300+window.screen.width )-window.screen.width;
         }
      }
      document.getElementById('FormularioPrincipal').style.pixelTop='45';
      document.getElementById('FormularioPrincipal').style.pixelLeft=izq;
   // document.getElementById('FormularioPrincipal').style.pixelTop='80px';//position:absolute;top:23px;left:45px;
   }
   function ocultarForm(){
      document.getElementById('FormularioPrincipal').style.visibility='hidden';
      <?php 
         $result = mysql_query($sqlGeneral);
         if($row = mysql_fetch_array($result)){
      ?>
      document.getElementById('ReporteVolumenes').style.visibility='visible';
      document.getElementById('paginadorSuperior').style.visibility='visible';
      document.getElementById('paginadorInferior').style.visibility='visible';
      <?php
         }
         else
         {
      ?>
         document.getElementById('Vacio').style.visibility='visible'
      <?php
         }
      ?>
      document.getElementById('tablaWbs').style.visibility='hidden';
      document.getElementById('Insertar').disabled=false;
      document.getElementById('regresar').disabled=false;
      cargaXML("insert_destroy.php");
      document.getElementById('FormularioPrincipal').style.pixelTop='19080';
      if(document.all)izq=65;
      else izq=0;
      document.getElementById('FormularioPrincipal').style.pixelLeft=izq;
      disparition();
   // document.getElementById('FormularioPrincipal').style.pixelTop='80px';//position:absolute;top:23px;left:45px;
   }
   </script>
<center>
<input type ="button" name='Insertar' id='Insertar' onClick="javascript:mostrarForm();" value="Insertar" title="Insertar Registro">
<!--<input type ="button" name='regresar' id='regresar' onClick="cargaXML('insert_destroy.php');document.location='../';" value="Regresar" title="Regresar a Reporte Diario">-->
<input type ="button" name='regresar' id='regresar' onClick="cargaXML('insert_destroy.php');document.location='../../../../../frmReporteDiario.php';" value="Regresar" title="Regresar a Reporte Diario">
</center>

<?php

$result = mysql_query($sqlGeneral);
if($row = mysql_fetch_array($result))
   $form->visualizar($pag,$_SESSION['OrdenarPor'],$nombres);
else
   echo "<br><br><br><center><table id='Vacio' borer=2 bgcolor='#00AA00'><tr><td><font color='BLUE'><h3>Sin Registros</h3></font></td></tr></table></center>";

?>
<!-- Numero de Orden -->
<form name='sNumeroOrden' action="<?php echo $PHP_SELF?>"  method="post">
<?php
if(isset($_REQUEST['sNumeroOrden']))
   $_SESSION['sNumeroOrden']=$_REQUEST['sNumeroOrden'];
$sNumeroOrden=$_SESSION['sNumeroOrden'];
if(isset($_REQUEST['convenio']))
   $_SESSION['convenio']=$_REQUEST['convenio'];
$convenio=$_SESSION['convenio'];

require("../avanceFisico.php");
//$dAvanceObra = avanceFisico ($sContrato,$sNumeroOrden,$convenio,$Turno ,$_SESSION['fecha']) ;
$dAvanceObra =avances($sContrato,$sNumeroOrden,$convenio,$_SESSION['fecha'],$Turno,'Avanzada');
?>
</form>
<!-- Numero de Actividad -->
<center><!--style="visibility:hidden;position: absolute; top:65px;left:15%"-->
<table  id='FormularioPrincipal' style="visibility:hidden;position:absolute; top:66px;left:15%" bgcolor="#D0DDF0">
<!--<caption>Volumenes de Obra y Notas</caption>-->
<tr><td colspan=4><center><font size=2 color="#FFAA00"><b>Volumenes de Obra y Notas</b></font></center></td></tr>
<tr>
   <td >
      Fecha
   </td>
   <td width=1>
      <input type="text" name="fecha" value="<?php echo $_SESSION['fecha']?>"  readonly>
   </td>
<td width=30>
   <font size="-3" color="#8000AA"><b>Avances Del Dia:  </b></font><font size="+0" color='#D52B00' ><?php echo ($dAvanceObra=='')?'0.00 %':$dAvanceObra.'%' ?></font>
</td>
</tr>
<tr>
   <td>
      Numero de Orden
   </td>
   <td colspan=3>
      <input type="text" name="sNumeroOrden" value="<?php echo $sNumeroOrden?>" readonly>
   </td>
</tr>
<tr>
<td>Numero de concepto</td>
<td colspan=3 >
<form name='actividad' action="<?php echo $PHP_SELF?>"  method="post">
<?php
if(isset($_POST['sNumeroActividad']))
   $_SESSION['sNumeroActividad']=$_POST['sNumeroActividad'];
$sNumeroActividad=$_SESSION['sNumeroActividad'];
//$sql ="select DISTINCT sNumeroActividad from actividadesxorden where sContrato ='$sContrato' and sNumeroOrden='$sNumeroOrden' and sTipoActividad='Actividad' AND sIdConvenio='$convenio' ";
$sql = "SELECT DISTINCT ao.sNumeroActividad FROM actividadesxorden ao
        WHERE NOT EXISTS (SELECT distinct a.sNumeroActividad 
                      FROM alcancesxactividad  a 
                      WHERE a.sContrato = ao.scontrato and a.sNumeroActividad = ao.sNumeroActividad) 
                        AND ao.sContrato = '$sContrato' And ao.sNumeroOrden = '$sNumeroOrden' And ao.sIdConvenio = '$convenio' 
                        AND ao.sTipoActividad ='Actividad' Order By ao.iItemOrden";
$result = mysql_query($sql);
print ("<select name='sNumeroActividad' onChange='document.actividad.submit()'>");
print ("<option></option>");
while ($row=mysql_fetch_array($result)){
   $seleccionar = ($sNumeroActividad==$row[0]) ?"selected":"";
   print ("<option $seleccionar >$row[0]</option>");  
}
print ("</select>");
?>
</form>
</td>
</tr>
<tr>
<td>Wbs</td>
<td colspan=3 >
<table id='tablaWbs'>
<tr ><td width="1%">
<!-- sWbs -->
<form name='wbs' action="<?php echo $PHP_SELF?>" method="post">
<?php
$swbs=$_POST['swbs'];
$sql ="select sWbs,dCantidad,dPonderado,mDescripcion from actividadesxorden where sContrato ='$sContrato' and sNumeroOrden='$sNumeroOrden'  and sNumeroActividad='$sNumeroActividad' and sTipoActividad='Actividad' AND sIdConvenio='$convenio' ";
$result = mysql_query($sql);
print ("<select name='swbs' onChange='document.wbs.submit()'>");
print ("<option></option>");
$semilla = "";
while ($row=mysql_fetch_array($result)){
   if($semilla=="")$semilla=$row[0];
   if($swbs==$row[0]){
      $seleccionar="selected";
      $dCantidad=$row[1];
      $dPonderado=$row[2];
      $mDescripcion=$row[3];
   }
    else if($swbs ==""){
       $swbs = $semilla;
       $dCantidad=$row[1];
       $dPonderado=$row[2];
       $mDescripcion=$row[3];
       $seleccionar="selected";
    }
   else
      $seleccionar="";
   print ("<option $seleccionar>$row[0]</option>");   
}
print ("</select>");
?>
</td>
<!-- Descripcion del sWbs -->
 <td id="_wbs" width=1> 
 <center>
<?php
   $reporte = new reporte();
   $sql="select sWbs,sNumeroActividad,dCantidad,sMedida,dInstalado,dExcedente,(dCantidad-dInstalado),dPonderado from actividadesxorden where sContrato ='$sContrato' and sNumeroOrden='$sNumeroOrden'  and sNumeroActividad='$sNumeroActividad' and sTipoActividad='Actividad' and sWbs = '$swbs' AND sIdConvenio='$convenio'  ";
   //$titulotabla="Detalles de la Actividad";
   $nomcampos = array("sWbs","Partida","Cantidad","Medida","Instalado","Excedente","Restante","Ponderado");
   $reporte->ponerconsulta($sql,1,$nomcampos,$titulotabla);
   $reporte->imprimir();
?>
</center>
</td>
</tr>
</table>
<center>
   <A HREF='#' onClick='disparition();return(false)'>Ocultar Detalles</A>            
   <A HREF='#' onClick='afficher();return(false)'>Ver Detalles</A> </font></b>
</center>
</td>
</tr>
</form>


<!-- </table> -->
<!-- Formulario de Almacenamiento -->
<!-- <table> -->
<form name='salvar' action="salvarvolumenes.php" method="post">
<input type="hidden" name="fecha" value="<?php echo $_SESSION['fecha']?>"  readonly>
<input type="hidden" name="sNumeroOrden" value="<?php echo $sNumeroOrden?>" readonly>
<input type="hidden" name="sNumeroActivdad" value="<?php echo $sNumeroActividad?>" readonly>
<input type="hidden" name="swbs" value="<?php echo $swbs?>" readonly>
<input type="hidden" name="convenio" value="<?php echo $convenio?>" readonly>
<input type="hidden" name="dPonderado" value="<?php echo $dPonderado?>" readonly>
<input type="hidden" name="cantidad" value="<?php echo $dCantidad?>" readonly>
<!--<tr>
   <td>
      Turno
   </td>
   <td>-->
      <?php
         if(isset($_REQUEST['sIdTurno']))
               $_SESSION['sIdTurno']=$_REQUEST['sIdTurno'];
         $sql =" select sIdTurno,sDescripcion from turnos where sContrato='$sContrato' AND sIdTurno='".$_SESSION['sIdTurno']."'";
         $result = mysql_query($sql);
         print("<select name='sIdTurno' style='visibility:hidden'>");
         while($row=mysql_fetch_array($result)){
            print("<option value=$row[0]>$row[1]</option>");
         }
         print("</select>");
      ?>
<!--  </td>
</tr>-->
<tr>
   <td>
      Tipo
   </td>
   <td colspan=3>
      <?php
         $sql ="SELECT sIdTipoMovimiento , sDescripcion , sClasificacion FROM tiposdemovimiento WHERE sContrato='$sContrato'
         AND (sClasificacion like '%Tiempo en Operacion%' OR sClasificacion like '%Notas%')  AND sIdTipoMovimiento <> 'A' ORDER BY sDescripcion";
         $result = mysql_query($sql);
         print("<select name = 'sIdTipoMovimiento' onChange='buscar();'>\n");
         while($row = mysql_fetch_array($result)){
            #Guardar todas las clasificaciones "Notas"
            if(trim($row['sClasificacion'])=="Notas")
                  $Notas .= "_".$row[0];
            $seleccionar =(trim($row['sClasificacion'])!="Notas")?"selected":"";
            print("<option $seleccionar value='$row[0]'>$row[1]</option>\n");
         }
         print("</select>\n");
         #Poner aqui todas las clasificaciones "Notas" concatenado con el caracter " _ "
         echo "<input type='hidden' name='patron' value='$Notas' >"; 
      ?>
         
   </td>
</tr>
<tr>
   <td>
      Cantidad a Instalar
   </td>
   <td colspan=3>
      <input type="text" name="cantidadIns" value="0">
   </td>
</tr>
<tr>
   <td>
      Comentarios
   </td>
   <td colspan=3>
      <textarea name="comentarios"   rows="8" cols="120" onBlur="document.salvar.comentarios.value=document.salvar.comentarios.value.toUpperCase()"><?php echo $mDescripcion?></textarea>
   </td>

</tr>
<?php
   #verificar si existe el campo sIdPozo en bitacoradeactividades
   $existe = false;
   $sql = "describe bitacoradeactividades";
   $rs  = mysql_query($sql);
   while($rw = mysql_fetch_array($rs)){
   	$sCampo = $rw["Field"];
   	if($sCampo == "sIdPozo"){
   		$existe = true;
   		break;
   	}
   }
   if($existe){
		echo "
						<tr>
							<td >Equipo al que se le dara manteminiento</td>
							<td colspan=2>
								<select name='sIdPozo'>";
							$sql ="select sIdPozo,sDescripcion from pozos";
							$rs = mysql_query($sql);
							echo "<option value=''></option>";
							while($rw = mysql_fetch_array($rs)){
									echo "<option value='$rw[0]'>$rw[1]</option>";
							}
					
		echo "		</select>		
							</td>		
						</tr>";
 
   }
 ?>
<tr>
   <td colspan="3">
      <center>
       <?php
         if($_SESSION['lStatus']!="Pendiente")
             $enable = "disabled"; 
        ?>
         <input type="submit" value="Aceptar" <?php echo $enable ?>>
         <input type ="button" name='Cancelar' id='Cancelar' onClick="javascript:ocultarForm();" value="Cancelar" title="Cancelar Insertar">
      </center>
   </td>
</tr>
</form>
<!-- traerComentarios.php-->
   <tr>
      <td>
            Traer comentarios del dia anterior
      </td>
      <td colspan=3  >
         <input type="button" name="diaanterior" <?php echo $enable ?> value= "Traer" onClick="window.open('traerComentarios.php?sNumeroOrden=<?php echo $_SESSION['sNumeroOrden']?>&sIdTurno=<?php echo $_SESSION['sIdTurno'] ?>&dIdFecha=<?php echo $_SESSION['fecha'] ?>','DiaAnterior','width=500,height=300,scrollbars=yes,resizable=yes,status=0,toolbar=0')">
      </td>
   </tr>
</table>


</table>
</center>
<script language="javascript">
//habilitar();
</script>
<div id='detalles'>
<div>
<?php
#avances globales del contrato y de la orden
$CantidadDeOrdenes = 0;
$sql= "select count(sNumeroOrden) as dTotal from ordenesdetrabajo Where sContrato='$sContrato'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $CantidadDeOrdenes = $row['dTotal'];
}
If ($CantidadDeOrdenes > 1 )
 $avanceGlobal = cfnCalculaAvances($sContrato,$_SESSION['NumeroOrden'],NULL,$_SESSION['sIdTurno'],true,$_SESSION['fecha'],"Avanzada");
else
 $avanceGlobal = cfnCalculaAvances($sContrato,$_SESSION['NumeroOrden'],NULL,$_SESSION['sIdTurno'],false,$_SESSION['fecha'],"Avanzada");

   sleep(1);
   if($_SESSION['insertar']==true)
      echo "<script language='javascript'>mostrarForm();</script>";
   else if($_SESSION['insertar']==false)
      echo "<script language='javascript'>ocultarForm();</script>";

unset($_REQUEST);
mysql_close();
?>
</body>
</html>
