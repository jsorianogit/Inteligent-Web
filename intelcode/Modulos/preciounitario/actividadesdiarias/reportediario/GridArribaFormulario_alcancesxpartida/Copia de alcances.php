<?php require("alcances.inc.php"); 
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
/*Obtener los datos del reporte diario*/
$form = new alcances();

/*obtener el filtro*/
//$Filtro=encrypt($_REQUEST['Sql'],1);
$sContrato;
$_REQUEST['sNumeroOrden'];
if(isset($_REQUEST['dIdFecha']))
	$_SESSION['fecha']=$_REQUEST['dIdFecha'];
if(isset($_REQUEST['sIdTurno']))
	$_SESSION['sIdTurno']=$_REQUEST['sIdTurno'];
$Turno = $_SESSION['sIdTurno'];
//}
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
<title>
</title>
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
?>
</form>
<table>
<caption>Bitacora de Alcances x Partida</caption>
<form name='actividad' action="<?php echo $PHP_SELF?>"  method="post">
<tr>
<td>Numero de Activiad</td>
<td colspan=2>
<?php
if(isset($_POST['sNumeroActividad']))
	$_SESSION['sNumeroActividad']=$_POST['sNumeroActividad'];
$sNumeroActividad=$_SESSION['sNumeroActividad'];
$sql ="select DISTINCT sNumeroActividad from alcancesxactividad where sContrato ='$sContrato' ";
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
<td>Concepto</td>
<td colspan=2 ID="Wbs">
<!-- sWbs -->
<form name='wbs' action="<?php echo $PHP_SELF?>" method="post">
<table>
<tr>
<td>
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
<td  ID="wbs">
<!-- Descripcion del sWbs -->
<?php
	$reporte = new reporte();
	$sql="select sWbs,sNumeroActividad,dCantidad,sMedida,dInstalado,dExcedente,(dCantidad-dInstalado),dPonderado from actividadesxorden where sContrato ='$sContrato' and sNumeroOrden='$sNumeroOrden'  and sNumeroActividad='$sNumeroActividad' and sTipoActividad='Actividad' and sWbs = '$swbs' AND sIdConvenio='$convenio'";
	//$titulotabla="Detalles de la Actividad";
	$nomcampos = array("sWbs","Partida","Cantidad","Medida","Instalado","Excedente","Restante","Ponderado");
	$reporte->ponerconsulta($sql,1,$nomcampos,$titulotabla);
	$reporte->imprimir();
?>
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
<!--</table>-->
<!-- Formulario de Almacenamiento -->
<!--<table>-->
<form name='salvar' action="salvaralcances.php" method="post">
	<input type="hidden" name="sNumeroActivdad" value="<?php echo $sNumeroActividad?>" readonly>
	<input type="hidden" name="swbs" value="<?php echo $swbs?>" readonly>
	<input type="hidden" name="cantidad" value="<?php echo $dCantidad?>" readonly>
   <input type="hidden" name="dPonderado" value="<?php echo $dPonderado?>" readonly>
   <input type="hidden" name="convenio" value="<?php echo $convenio 	?>" readonly>
<tr>
	<td>
		Fecha
	</td>
	<td>
		<input type="text" name="fecha" value="<?php echo $_SESSION['fecha']?>"  readonly>
	</td>

		<?php
			$sql =" select sIdTurno,sDescripcion from turnos where sContrato='$sContrato' and sIdTurno='$Turno'";
			$result = mysql_query($sql);
			print("<select name='sIdTurno' style='visibility:hidden'>");
			while($row=mysql_fetch_array($result)){
				print("<option value=$row[0]>$row[1]</option>");
			}
			print("</select>");
		?>

</tr>
<tr>
	<td>
		Numero de Orden
	</td>
	<td>
		<input type="text" name="sNumeroOrden" value="<?php echo $sNumeroOrden?>" readonly>
	</td>

</tr>
<tr>

		<td>
		Fase
	</td>
	<td>
		<?php
			$sql ="select distinct(iFase) , sDescripcion,dAvance from alcancesxactividad where sContrato='$sContrato' AND sNumeroActividad='$sNumeroActividad' order by iFase";
			$result = mysql_query($sql);
			print("<select name = 'iFase'>\n");//sIdTipoMovimiento
			while($row = mysql_fetch_array($result)){
				//$seleccionar =(trim($row[1])=="VOLUMEN DE OBRA")?"selected":"";
				print("<option $seleccionar value='$row[0]'>$row[1]  -> $row[2] %</option>\n");
			}
			print("</select>\n");
		?>
	</td>
</tr>
<tr>

	<td>
		Cantidad a Instalar
	</td>
	<td>
		<input type="text" name="cantidadIns" value="0">
	</td>
</tr>
<tr>
	<td>
		Comentarios
	</td>
	<td>
		<textarea name="comentarios"   rows="3" cols="80" onKeyUp="document.salvar.comentarios.value=document.salvar.comentarios.value.toUpperCase()"><?php echo $mDescripcion?></textarea>
	</td>
</tr>
<tr>
	<td>
		Referencias
	</td>
	<td>
		<textarea name="sReferencia"   rows="1" cols="80" onKeyUp="document.salvar.sReferencia.value=document.salvar.sReferencia.value.toUpperCase()"></textarea>
	</td>
</tr>
<tr>
</tr>
<tr>
	<td colspan="2">
		<center>
			<input type="submit" value="Aceptar">
		</center>
	</td>
</tr>
</table>
</form>
<?php
$ocultos = array ("sContrato","sPaquete","sNumeroOrden","iFase");
//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","iFase","iIdDiario","sWbs","sNumeroActividad","sNumeroOrden","dIdFecha","sIdTurno");
$tablasrelaciones = array ("none");
//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
$sqlGeneral="select 
bitacoradealcances.sContrato,
bitacoradealcances.sNumeroOrden,
bitacoradealcances.dIdFecha,
bitacoradealcances.iIdDiario,
bitacoradealcances.iFase,
bitacoradealcances.sWbs,
bitacoradealcances.sPaquete,
bitacoradealcances.sNumeroActividad,
alcancesxactividad.sDescripcion,
turnos.sDescripcion,
bitacoradealcances.dCantidad,
bitacoradealcances.dAvance,
actividadesxorden.sMedida,
actividadesxorden.dVentaMN as dVentaMN,
(bitacoradealcances.dCantidad*actividadesxorden.dVentaMN) as dCostoMN 
from bitacoradealcances  
INNER JOIN  alcancesxactividad ON ( alcancesxactividad.sContrato = bitacoradealcances.sContrato  
		AND alcancesxactividad.sNumeroActividad =bitacoradealcances.sNumeroActividad  
		AND alcancesxactividad.IFase =bitacoradealcances.IFase  )
INNER JOIN  turnos  on (bitacoradealcances.sContrato=turnos.sContrato 
		AND bitacoradealcances.sIdTurno=turnos.sIdTurno) 
INNER JOIN actividadesxorden  ON(bitacoradealcances.sContrato=actividadesxorden.sContrato 
		AND bitacoradealcances.sNumeroActividad=actividadesxorden.sNumeroActividad 
		AND bitacoradealcances.sWbs=actividadesxorden.sWbs 
		AND bitacoradealcances.sNumeroOrden=actividadesxorden.sNumeroOrden) 
WHERE bitacoradealcances.sContrato ='$sContrato' 
      AND bitacoradealcances.dIdFecha='".$_SESSION['fecha']."' 
      AND actividadesxorden.sIdConvenio='$convenio' ";
//AND bitacoradealcances.sIdTipoMovimiento=tiposdemovimiento.sIdTipoMovimiento)

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
		case ('b'):
		    #Obtener la Condicion sin el iFase ni el iIdDiario
		    $condicion = explode("AND",$_SESSION['sCondicion']);
		    foreach($condicion as $con){
		       #Capturar el iFase que se desea eliminar
		       if(strpos($con,"iFase")!==false){
                  $iFaseEliminar = explode("=",$con);
                  $iFaseEliminar = trim(str_replace("'","",$iFaseEliminar[1]));
                  continue ;
             }
		       #Capturar el Numero de Actividad de la jornada que se desea borrar
		       if(strpos($con,"sNumeroActividad")!==false){
                  $sNumeroActividadEliminar = explode("=",$con);
                  $sNumeroActividadEliminar = trim(str_replace("'","",$sNumeroActividadEliminar[1]));
             }
             #Capturar el Contrato de la jornada que se desea borrar
		       if(strpos($con,"sContrato")!==false){
                  $sContratoEliminar = explode("=",$con);
                  $sContratoEliminar = trim(str_replace("'","",$sContratoEliminar[1]));
             }
             #Saltar si el campo es iIdDiario
             if(strpos($con,"iIdDiario")!==false ){
                $iIdDiarioEliminar = explode("=",$con);
                $iIdDiarioEliminar = trim(str_replace("'","",$iIdDiarioEliminar[1]));
                continue;
              } 
		       
		       $sNuevaCondicion .= " $con AND";
		    }
		    $sNuevaCondicion.="<";
		    $sNuevaCondicion = str_replace("AND<","",$sNuevaCondicion);
		   #Obtener el numero total de fases y el numero de fases para el contrato y numero de orden
         $sql ="SELECT * FROM alcancesxactividad WHERE sContrato='$sContratoEliminar' AND sNumeroActividad='$sNumeroActividadEliminar';";         
         $result=mysql_query($sql);
         while($row = mysql_fetch_array($result)){
   	     $iFases[$row['iFase']]=$row['iFase'];
         }
         #obtener los iIdDiarios de los registros a eliminar
         $sql ="  SELECT iIdDiario FROM bitacoradealcances WHERE $sNuevaCondicion and iIdDiario>=$iIdDiarioEliminar";
         $result = mysql_query($sql);
         while($row = mysql_fetch_array($result)){
            $iIdDiarios[] = $row['iIdDiario'];
          }  
         #si el numero de Fase del registro que se va a eliminar es igual al numero final de fases de alcancesxactividad
         #se debe decrementar tambien en actividadesxorden
         #Obtener el iFase Mayor de esta partida y Wbs que se ingreso
         $sql ="  SELECT max(iFase) as iFase FROM bitacoradealcances WHERE $sNuevaCondicion ";
         $result = mysql_query($sql);
         if($row = mysql_fetch_array($result))
            $iUltimaFase = $row['iFase'];
         #Actualizar actividadesxorden
         $k=0;
         for($i=$iFaseEliminar ; $i<= $iUltimaFase ;$i++){
            if(count($iFases)==$i){
      		   $arraCondicion = explode("AND",$_SESSION['sCondicion']);
   	     	   foreach($arraCondicion as $con){
   		        	if(strpos($con,"dIdFecha") !==false or strpos($con,"iIdDiario") !==false or strpos($con,"iFase") !==false)continue;
      				$condition.=	$con." AND";	   
      		   }
      		   $condition.="<";
      		   $condition=str_replace("AND<"," ",$condition);		   
      		   $arraCon = explode("AND",$_SESSION['sCondicion']);
   	     	   foreach($arraCon as $con){
   		        	if(strpos($con,"iFase") !==false or strpos($con,"iIdDiario") !==false )continue;
      				$cond.=	$con." AND";	   
      		   }
      		   $cond.="<";
      		   $cond=str_replace("AND<"," ",$cond);		  
         	   $sql2 = "SELECT dCantidad  FROM bitacoradeactividades WHERE $cond AND sIdTipoMovimiento='E' AND lAlcance='Si'";
        	      $result = mysql_query($sql2);
      		   if($row = mysql_fetch_array($result))
        				$bdCantidad = $row[0];	  
               #mensaje("leido de bitacoradeactividades: ".$bdCantidad); 
              //exit();
           	   $sql = "SELECT dCantidad,dInstalado,dExcedente  FROM actividadesxorden  WHERE $condition AND sIdConvenio='$convenio'";
       	      $result = mysql_query($sql);
      		   if($row = mysql_fetch_array($result))
      		   {
      		   	$adCantidad = $row[0] ;
      		   	$adInstalado = $row[1] ;
   	  	   		$adExcedente = $row[2];	   
      		   } 
      		   $instalado = ($adInstalado + $adExcedente) - $bdCantidad ;
      		   #mensaje("leido de actividadesxorden: ".$instalado);
      		   if($instalado > $adCantidad){
      		   	$excedente = $instalado - $adCantidad;
      		   	$restante = 0 ;
      		   	$instalado = $adCantidad;
      		   }
      		   else{
      		   	$excedente = 0;
      		   	$restante=$adCantidad - $instalado ;
      		   	
      		   }
   	  	      $sql ="UPDATE actividadesxorden SET dInstalado='$instalado' , dExcedente='$excedente'  WHERE $condition AND sIdConvenio='$convenio' ";
   	     	  	mysql_query($sql);
   	     	  	if(mysql_error())mensaje(mysql_error());
 	  	         $j=$iIdDiarios[$k]+1;
   	     	  	$sql = "DELETE FROM bitacoradeactividades WHERE $sNuevaCondicion AND iIdDiario='$j'";
   	     	  	mysql_query($sql);
            }
            $sql = "DELETE FROM bitacoradealcances WHERE $sNuevaCondicion AND iFase='$i' AND iIdDiario='$iIdDiarios[$k]' ";
            $sql2 = "DELETE FROM bitacoradeactividades WHERE $sNuevaCondicion AND iIdDiario='$iIdDiarios[$k]'";
            $k++;
            mysql_query($sql);
            mysql_query($sql2);
            if(mysql_error())mensaje(mysql_error());
         }
         //exit();
         location("alcances.php?1=1");
		   //hace un delete segun link seguido 
			#$form->crearDelete( $_SESSION['sCondicion'] );
			
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
$nombres = array("Fecha","Id","Wbs","Concepto","Alcance","Turno/Origen","Cantidad","Avance","Unidad","P. Unitario","Total");
echo "<center><a href ='../reportediario.php'>[Regresar]</a></center>";
$result = mysql_query($sqlGeneral);
if($row = mysql_fetch_array($result))
	$form->visualizar($pag,$_SESSION['OrdenarPor'],$nombres);
else
	echo "<br><br><br>Vacio";
//$form->visualizar($pag,$_SESSION['OrdenarPor'],$nombres);
unset($_REQUEST);
mysql_close();
?>
</table>
</center>
</body>
</html>