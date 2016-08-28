<?php
session_cache_limiter("must-revalidate"); 
session_start();
//require ("../../../../include/formulario.inc.php");
require ("reporteador.inc.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>
<head>
<style type="text/css">
#capa1{ position:absolute;
 z-index:1;
 background-color:#FFFFFF;
 top:40px;
 left:10px;
 width:100px;
 height:75px;
}
#capa2{
 position:absolute;
 z-index:0;
}
</style>
<title> Recepcion de Materiales</title>
<script language="JavaScript">
function asignarValorEquipo(){
	var indice = document.bitacoradeequipos.sIdEquipo.selectedIndex ;
	var textoEscogido = document.bitacoradeequipos.sIdEquipo.options[indice].text 
//	var enlace ="DescripcionEquipo.php?sIdEquipo="+document.bitacoradeequipos.sIdEquipo.value;
//	mi_ventana = window.open(enlace,"Obtener Descripcion","width=300,height=120,scrollbars=NO");
	document.bitacoradeequipos.sDescripcion.value = textoEscogido;
}
function asignarValorPersonal(){
	var indice = document.bitacoradepersonal.sIdPersonal.selectedIndex ;
	var textoEscogido = document.bitacoradepersonal.sIdPersonal.options[indice].text 
//	var enlace ="DescripcionPersonal.php?sIdPersonal="+document.bitacoradepersonal.sIdPersonal.value;
//	mi_ventana = window.open(enlace,"Obtener Descripcion","width=300,height=120,scrollbars=NO");
	document.bitacoradepersonal.sDescripcion.value = textoEscogido;
}
</script>
<style type='text/css'>@import 'menu.css';</style>
<?php
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
	echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
	echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
	echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";

//Selecctor de pestañas
	if(isset($_REQUEST['cont']) and $_REQUEST['cont']!="")
		$_SESSION['cont'] = $_REQUEST['cont'];
	if(!isset($_SESSION['cont']) or $_SESSION['cont']=="")
	   $_SESSION['cont'] = 1;
//captura los request de reporte diario
	//Contrato
	if(isset($_REQUEST['sContrato']) and $_REQUEST['sContrato']!="")
		$_SESSION['sContrato'] = $_REQUEST['sContrato'];
		$contrato = $_SESSION['sContrato'] ;
	//fecha
	if(isset($_REQUEST['dIdFecha']) and $_REQUEST['dIdFecha']!=""){
		$_SESSION['dIdFecha'] = $_REQUEST['dIdFecha'];
		$_SESSION['iIdDiario']='';
	}
		$fecha = $_SESSION['dIdFecha'];
	//Numero de Orden
	if(isset($_REQUEST['sNumeroOrden']) and $_REQUEST['sNumeroOrden']!="")
		$_SESSION['sNumeroOrden'] = $_REQUEST['sNumeroOrden'];
		$sNumeroOrden = $_SESSION['sNumeroOrden'] ;
	//Convenio
	if(isset($_REQUEST['convenio']) )
		$_SESSION['convenio'] = $_REQUEST['convenio'];
		$convenio = $_SESSION['convenio'];
//turno
	if(isset($_REQUEST['sIdTurno']) )
		$_SESSION['turno'] = $_REQUEST['sIdTurno'];
		$turno = $_SESSION['turno'];
?>

</head>
<body>
<center><input type ="button" onClick="document.location='../'" value="Regresar" title="Regresar a Reporte Diario"></center>
<div id="capa1"><center> Seleccione un Id de la lista Para Agregar Personal o Equipo </center> </div>
<div id="menu">
	<center>
	<!--
<table>
		<tr>
				<th>
						<td>
							Numero de Orden
						</td>
						<td>
							<?php
								$sql = "";
							?>
						</td>
				</th>
		</tr>
</table>
-->
		<?php
 		//$titulos = array ("Contrato","Imagenes");
 		$enlaces = array("iIdDiario"=>"index.php");
 		$titulos = array("Contrato","Fecha","Numero de Orden","Id","Turno","Turno Desc","Wbs","Movimiento");
		$reporte = new reporte();
		#Paginar los Resultados
		//Contar el total de registros
		if (!isset($_REQUEST['pagina'])){ $pagina = 1; }
		else {$pagina = $_REQUEST['pagina'];}
		
		$result = mysql_query("SELECT COUNT(sContrato) FROM bitacoradeactividades  
											WHERE sContrato='$sContrato' AND sIdTipoMovimiento<>'A'
											AND sNumeroOrden='$sNumeroOrden' 
											AND dIdFecha='$fecha'"); 
		list($totalpagina) = mysql_fetch_row($result);
		$tampagina = 5;
		$reg1pagina = ($pagina-1) * $tampagina;
		echo "<br>".paginar($pagina, $totalpagina, $tampagina, "?pagina=")."<br>";
		$reporte->ponerconsulta("SELECT b.sContrato,b.dIdFecha,b.sNumeroOrden,b.iIdDiario,tu.sIdTurno,tu.sDescripcion as tsDesc,b.sWbs,t.sDescripcion 
											FROM bitacoradeactividades  b INNER JOIN tiposdemovimiento t 
													ON (b.sIdTipoMovimiento = t.sIdTipoMovimiento AND t.sContrato=b.sContrato)
													INNER JOIN turnos tu ON (b.sContrato=tu.sContrato AND b.sIdTurno=tu.sIdTurno)
											WHERE b.sContrato='$sContrato' AND b.sIdTipoMovimiento<>'A'
											AND b.sNumeroOrden='$sNumeroOrden' AND b.sIdTurno='$turno'
											AND b.dIdFecha='$fecha' LIMIT $reg1pagina ,$tampagina",1,$titulos,"Conceptos / Partidas / Notas Afectadas en el Dia",$enlaces,'Seleccione un Id Diario para Ingresar Equipo/Personal');
		$reporte->imprimir();
		if(isset($_REQUEST['iIdDiario']))
			$_SESSION['iIdDiario'] = $_REQUEST['iIdDiario'];
			$IdDiario = $_SESSION['iIdDiario'];
			unset($_REQUEST['pagina']);
			unset($pagina );
		//require_once("bitacoradeactividades.php");
		?>
		</center>
	<ul>
		<li><a href="index.php?cont=1" >Personal</a></li>
		<li><a href="index.php?cont=2" >Equipo</a></li>
	</ul>
	<br>
	<table>
		<tr>
			<td>
				<b>Id Diario Seleccionado:</b>
			</td>
			<td>
				<?php 
					if(isset($_REQUEST['Des']))
							$_SESSION['Des']=$_REQUEST['Des'];
               echo ($IdDiario=="")? "Ninguno ":$IdDiario; 
               echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Turno:</b>  ".$_SESSION['Des'];
               if($IdDiario==""){
                  mensaje("Seleccion un Id Diario de las lista dando clic sobre la PALOMITA para poder Insertar");
               }
            ?>
			</td>
		</tr>
	</table>
</div>
<?php
if($_SESSION['cont']==1){
   ?>
<div id="contenido1">
	<p>
	  <br><center>
		<font color="#3300FF"><h3>Personal</h3></font>
		<?php
			//$titulos = array ("Contrato","Imagenes");
			//$reporte->ponerconsulta("SELECT sIdPersonal,sDescripcion,sIdPernocta,sIdPlataforma,dCantidad,dCostoMN,(dCostoMn*dCantidad) as Total
			//		FROM bitacoradepersonal WHERE sContrato ='$sContrato' and iIdDiario='$IdDiario' and dIdFecha = '$fecha'",1,$titulos);
			//$reporte->imprimir();
			if($IdDiario==""){
                  echo "<font color='red'>Seleccion un Id Diario de las lista de arriba dando clic sobre el numero del ID para poder Continuar</font>";
                  exit();
         }
			if(isset($_POST['BotonPaquetePersonal']) and $_POST['BotonPaquetePersonal']!="" AND isset($_POST['paquetedepersonal']) and $_POST['paquetedepersonal']!=""){
							if(isset($_POST['paquetedepersonal']) AND $_POST['paquetedepersonal']!=""){
										//obtener la cantidad del paquete 
										$sqlE ="select sIdPersonal,dCantidad from paquetesdepersonal where sContrato ='$sContrato' AND sNumeroPaquete='".$_POST['paquetedepersonal']."' ";
										$resultE = mysql_query($sqlE);
										while($rowE = mysql_fetch_array($resultE)){
											//Obtener la cantidad actual reportada
										   $sqlC = "SELECT dCantidad FROM bitacoradepersonal WHERE sContrato ='$sContrato' and iIdDiario='$IdDiario' and dIdFecha = '$fecha' AND sIdPersonal='$rowE[0]' ";
											$resultC = mysql_query($sqlC);
											if($rowC = mysql_fetch_array($resultC)){
												$CantPersonal = $rowC[0];											
												$NuevaCantPersonal =$CantPersonal + $rowE[1]; 
												//actualizar la cantidad reportada
												$sqlS = "UPDATE bitacoradepersonal SET dCantidad='$NuevaCantPersonal' WHERE sContrato ='$sContrato' and iIdDiario='$IdDiario' and dIdFecha = '$fecha' AND sIdPersonal='$rowE[0]'";
												mysql_query($sqlS);
											}
											else {
												//obneter el sIdPernocta
												$sqlPer = "SELECT sIdPlataforma,sIdPernocta FROM ordenesdetrabajo WHERE sContrato='$sContrato'  and sNumeroOrden='$sNumeroOrden' ";
												$resultPer = mysql_query($sqlPer);
												if($rowPer = mysql_fetch_array($resultPer)){
													$sIdPernota = $rowPer['sIdPernocta'];									
													$sIdPlataforma = $rowPer['sIdPlataforma'];
												}						
												//Obtener los datos del Personal
												$sqlOb = "SELECT sDescripcion,dCostoMN,dCostoDLL 
																		FROM personal 
																		WHERE	sContrato='$sContrato' and sIdPersonal='$rowE[0]' ";
												$resultOb = mysql_query($sqlOb);
												if($rowOb = mysql_fetch_array($resultOb)){
													$Descripcion = $rowOb['sDescripcion'];									
													$CostoMN = $rowOb['dCostoMN'];
													$CostoDLL = $rowOb['dCostoDLL'];
												}						
												$sqlS = "INSERT INTO bitacoradepersonal (sContrato,dIdFecha,iIdDiario,sIdPersonal,sDescripcion,sIdPernocta,sIdPlataforma,sHoraInicio,sHoraFinal,dCantidad,sFactor,dCostoMN,dCostoDLL)
												VALUES('$sContrato','$fecha','$IdDiario', '$rowE[0]','$Descripcion','$sIdPernota','$sIdPlataforma' ,'00:00','00:00',$rowE[1],'','$CostoMN','$CostoDLL')";
												if($rowE[0]!="")
													mysql_query($sqlS);
													echo "<br>".mysql_error();
												}
										}					
							}
			}
			echo "<br>";
			require_once("bitacoradepersonal.php");
		?>			
		</p>
</div>

<?php
}
if($_SESSION['cont']==2){
   ?>
<div id="contenido2">
	<p>
	  <br><center>
			<font color="BLUE"><h3>Equipo</h3></font>
		<?php
			//$reporte->ponerconsulta("select * from bitacoradeequipos where sContrato ='$sContrato' and iIdDiario='$IdDiario' and dIdFecha = '$fecha'",1,$titulos);
			//$reporte->imprimir();
			//require_once("bitacoradeequipo.php");
			echo "<br>";
			if($IdDiario==""){
                  echo "<font color='red'>Seleccion un Id Diario de las lista de arriba dando clic sobre el numero del ID para poder Continuar</font>";
                  exit();
         }
			if(isset($_POST['BotonPaqueteEquipo']) and $_POST['BotonPaqueteEquipo']!="" AND isset($_POST['paquetedeequipo']) and $_POST['paquetedeequipo']!=""){
							if(isset($_POST['paquetedeequipo']) AND $_POST['paquetedeequipo']!=""){
										//obtener la cantidad del paquete 
										$sqlE ="select sIdEquipo,dCantidad from paquetesdeequipo where sContrato ='$sContrato' AND sNumeroPaquete='".$_POST['paquetedeequipo']."' ";
										$resultE = mysql_query($sqlE);
										while($rowE = mysql_fetch_array($resultE)){
											//Obtener la cantidad actual reportada
											$sqlC = "SELECT dCantidad FROM bitacoradeequipos WHERE sContrato ='$sContrato' and iIdDiario='$IdDiario' and dIdFecha = '$fecha' AND sIdEquipo='$rowE[0]' ";
											$resultC = mysql_query($sqlC);
											if($rowC = mysql_fetch_array($resultC)){
												$CantEquipo = $rowC[0];					
												$NuevaCantEquipo =$CantEquipo + $rowE[1]; 						
										//actualizar la cantidad reportada
												$sqlS = "UPDATE bitacoradeequipos SET dCantidad='$NuevaCantEquipo' WHERE sContrato ='$sContrato' and iIdDiario='$IdDiario' and dIdFecha = '$fecha' AND sIdEquipo='$rowE[0]'";
												mysql_query($sqlS);
											}
											else {
												//obneter el sIdPernocta
												$sqlPer = "SELECT sIdPernocta FROM ordenesdetrabajo WHERE sContrato='$sContrato'  and sNumeroOrden='$sNumeroOrden' ";
												$resultPer = mysql_query($sqlPer);
												if($rowPer = mysql_fetch_array($resultPer)){
													$sIdPernota = $rowPer['sIdPernocta'];									
												}						
												//Obtener los datos del Equipo
												$sqlOb = "SELECT sDescripcion,dCostoMN,dCostoDLL 
																		FROM equipos
																		WHERE	sContrato='$sContrato' and sIdEquipo='$rowE[0]' ";
												$resultOb = mysql_query($sqlOb);
												if($rowOb = mysql_fetch_array($resultOb)){
													$Descripcion = $rowOb['sDescripcion'];									
													$CostoMN = $rowOb['dCostoMN'];
													$CostoDLL = $rowOb['dCostoDLL'];
												}						
												$sqlS = "INSERT INTO bitacoradeequipos (sContrato,dIdFecha,iIdDiario,sIdEquipo,sDescripcion,sIdPernocta,sHoraInicio,sHoraFinal,dCantidad,sFactor,dCostoMN,dCostoDLL)
												VALUES('$sContrato','$fecha','$IdDiario', '$rowE[0]','$Descripcion','$sIdPernota','00:00','00:00',$rowE[1],'','$CostoMN','$CostoDLL')";
												if($rowE[0]!="")
													mysql_query($sqlS);
													echo "<br>".mysql_error();
												}
										}					
							}

			}
		 echo "<br>";
		 require_once("bitacoradeequipo.php");
		?>
	</p>
</div>
<?php
}
$_POST['BotonPaqueteEquipo']="";
$_POST['paquetedeequipo']="";
$_POST['BotonPaquetePersonal'] ="";
$_POST['paquetedepersonal']="";
?>
</body>
</html>

