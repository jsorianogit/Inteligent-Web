<?php require("volumenes.inc.php"); 

/*Obtener los datos del reporte diario*/
$form = new reportediario();

/*obtener el filtro*/
//$Filtro=encrypt($_REQUEST['Sql'],1);
$sContrato;
$_REQUEST['sNumeroOrden'];
if(isset($_REQUEST['dIdFecha']))
	$_SESSION['fecha']=$_REQUEST['dIdFecha'];
if(isset($_REQUEST['convenio']))
	$_SESSION['convenio'] =$_REQUEST['convenio']; 
if(isset($_REQUEST['sIdTurno']))
	$_SESSION['sIdTurno']=$_REQUEST['sIdTurno'];
$Turno = $_SESSION['sIdTurno'];
?>
<html>
<head>
   <SCRIPT>
   function disparition()
   {
   if(document.getElementById)
   document.getElementById("wbs").style.visibility = 'hidden';
   }
   </SCRIPT>
   <SCRIPT>
   function afficher()
   {
   if(document.getElementById)
   document.getElementById("wbs").style.visibility = 'visible';
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
<table>
<caption>Volumenes de Obra y Notas</caption>
<tr>
	<td>
		Fecha
	</td>
	<td >
		<input type="text" name="fecha" value="<?php echo $_SESSION['fecha']?>"  readonly>
	</td>
<td>
	<font size="-3" color="#8000AA"><b>Avances Del Dia:  </b></font><font size="+0" color=#D52B00 ><?php echo ($dAvanceObra=='')?'0.00 %':$dAvanceObra.'%' ?></font>
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
<td colspan=3>
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
<td colspan=3>
<table>
<tr ><td >
<!-- sWbs -->
<form name='wbs' action="<?php echo $PHP_SELF?>" method="post">
<?php
$swbs=$_POST['swbs'];
$sql ="select sWbs,dCantidad,dPonderado,mDescripcion from actividadesxorden where sContrato ='$sContrato' and sNumeroOrden='$sNumeroOrden'  and sNumeroActividad='$sNumeroActividad' and sTipoActividad='Actividad' AND sIdConvenio='$convenio' ";
$result = mysql_query($sql);
print ("<select name='swbs' onChange='document.wbs.submit()'>");
print ("<option></option>");
while ($row=mysql_fetch_array($result)){
	if($swbs==$row[0]){
		$seleccionar="selected";
		$dCantidad=$row[1];	
		$dPonderado=$row[2];
		$mDescripcion=$row[3];
	}
	else
		$seleccionar="";
	print ("<option $seleccionar>$row[0]</option>");	
}
print ("</select>");
?>
</td>
<!-- Descripcion del sWbs -->
 <td ID="wbs"> 
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
   <A HREF=# onClick='disparition();return(false)'>Ocultar Detalles</A>            
   <A HREF=# onClick='afficher();return(false)'>Ver Detalles</A> </font></b>
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
<!--	</td>
</tr>-->
<tr>
	<td>
		Tipo
	</td>
	<td colspan=3>
		<?php
			$sql ="SELECT sIdTipoMovimiento , sDescripcion , sClasificacion FROM tiposdemovimiento WHERE sContrato='$sContrato'
			AND (sClasificacion like 'Tiempo en Operacion' OR sClasificacion like 'Notas')  AND sIdTipoMovimiento <> 'A' ORDER BY sDescripcion";
			$result = mysql_query($sql);
			print("<select name = 'sIdTipoMovimiento' onChange='buscar();'>\n");
			while($row = mysql_fetch_array($result)){
				if($row['sClasificacion']=="Notas")
						$Notas .= "_".$row[0];
				$seleccionar =(trim($row[1])=="VOLUMEN DE OBRA")?"selected":"";
				print("<option $seleccionar value='$row[0]'>$row[1]</option>\n");
			}
			print("</select>\n");
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
		<textarea name="comentarios"   rows="8" cols="120" onKeyUp="document.salvar.comentarios.value=document.salvar.comentarios.value.toUpperCase()"><?php echo $mDescripcion?></textarea>
	</td>

</tr>
<tr>
	<td colspan="3">
		<center>
			<input type="submit" value="Aceptar">
		</center>
	</td>
</tr>
</form>
<!-- traerComentarios.php-->
	<tr>
		<td>
				Traer comentarios del dia anterior
		</td>
		<td colspan=3	>
			<input type="button" name="diaanterior" value= "Traer" onClick="window.open('traerComentarios.php?sNumeroOrden=<?php echo $_SESSION['sNumeroOrden']?>&sIdTurno=<?php echo $_SESSION['sIdTurno'] ?>&dIdFecha=<?php echo $_SESSION['fecha'] ?>','DiaAnterior','width=500,height=300,scrollbars=yes,resizable=yes,status=0,toolbar=0')">
		</td>
	</tr>
</table>
<?php
$ocultos = array ("sContrato","sPaquete","sNumeroOrden");
//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","iIdDiario","sWbs","sNumeroActividad","sNumeroOrden","dIdFecha");
$tablasrelaciones = array ("none");
$bloqueados =array("sContrato","dIdFecha","iIdDiario","sIdTurno","sIdDepartamento","sNumeroOrden","sWbs","sPaquete","sNumeroActividad","sIdTipoMovimiento","sHoraInicio","sHoraFinal","sFactor","dCantidad","dAvance",           
"lGenerado","lAlcance","sIsometrico","dCantidadAnterior","dAvanceAnterior","dCantidadActual","dAvanceActual");
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
AND bitacoradeactividades.sIdTipoMovimiento <> '$sTipoAlcance' ";

//formulario objeto

$form->formulario($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);

	
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
		   //hace un delete segun link seguido 
		   
		   $arraCondicion = explode("AND",$_SESSION['sCondicion']);
		   foreach($arraCondicion as $con){
		   	if(strpos($con,"dIdFecha") !==false or strpos($con,"iIdDiario") !==false)continue;
				$condicion.=	$con." AND";	   
		   }
		   $condicion.="<";
		   $condicion=str_replace("AND<"," ",$condicion);		   
   	   $sql2 = "SELECT dCantidad  FROM bitacoradeactividades WHERE ".$_SESSION['sCondicion'];
  	      $result = mysql_query($sql2);
		   if($row = mysql_fetch_array($result))
		   {
				$bdCantidad = $row[0];	   
		   } 
   	   $sql = "SELECT dCantidad,dInstalado,dExcedente  FROM actividadesxorden  WHERE $condicion AND sIdConvenio='$convenio'";
	     $result = mysql_query($sql);
		   if($row = mysql_fetch_array($result))
		   {
		   		$adCantidad = $row[0] ;
		   		$adInstalado = $row[1] ;
		   		$adExcedente = $row[2];	   
		   } 
		   $instalado = ($adInstalado + $adExcedente) - $bdCantidad ;
		   if($instalado > $adCantidad){
		   	$excedente = $instalado - $adCantidad;
		   	$restante = 0 ;
		   	$instalado = $adCantidad;
		   }
		   else{
		   	$excedente = 0;
		   	$restante=$adCantidad - $instalado ;
		   	
		   }
		    $sql ="UPDATE actividadesxorden SET dInstalado='$instalado' , dExcedente='$excedente'  WHERE $condicion AND sIdConvenio='$convenio' ";
		   $form->crearDelete($_SESSION['sCondicion']);
			mysql_query($sql);
			location("?operacion=l");
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
//recoge la pagina actual para el paginador
if(isset($_REQUEST['pag'])){
	$_SESSION['pagActual']=$_REQUEST['pag'];
	$pag=$_REQUEST['pag'];
}
elseif(isset($_SESSION['pagActual']))
	$pag=$_SESSION['pagActual'];
elseif(!isset($pag))
	$pag=1;
//Recoge el campo para el ORDER BY (En esta Seccion no es Aplicable)
if(isset($_REQUEST['order'])){
	$_SESSION['OrdenarPor'] = $_REQUEST['order'];
}
$nombres = array("Fecha","Id","Wbs","Concepto","Turno/Origen","Movimiento","Cantidad","Avance","Unidad","P. Unitario","Total");
echo "<center><a href ='../reportediario.php'>[Regresar]</a></center>";
$result = mysql_query($sqlGeneral);
if($row = mysql_fetch_array($result))
	$form->visualizar($pag,$_SESSION['OrdenarPor'],$nombres);
else
	echo "<br><br><br>Vacio";
unset($_REQUEST);
mysql_close();
?>
</table>
</center>
<script language="javascript">
//habilitar();
</script>
</body>
</html>
