<?php 
session_start();
require ("../../../../include/reporteador.inc.php"); 
if(isset($_REQUEST['sNumeroOrden']) and $sNumeroOrden=="")
	$sNumeroOrden=$_REQUEST['sNumeroOrden'];
?>
<center>
Seleccion el Numero de Orden
<form name="NumeroOrden" method="POST" action="index.php">
	<select name="sNumeroOrden" onChange="document.NumeroOrden.submit();">
		<?php 
			if(isset($_POST['sNumeroOrden']) and $_POST['sNumeroOrden']!="") $_SESSION['sOrden']=$_POST['sNumeroOrden'];
			else if(isset($sNumeroOrden) and $sNumeroOrden!="")$_POST['sNumeroOrden']=$sNumeroOrden;
			
			$sql = "SELECT sNumeroOrden FROM ordenesdetrabajo WHERE sContrato='$sContrato'";
			$result=mysql_query($sql);
			echo "<option></option>";
			while($row = mysql_fetch_array($result))
			{
				$sel = ($_SESSION['sOrden']==$row[0])?"selected":"";
				echo "<option $sel>$row[0]</option>";
			}
		?>
	</select>
</form>
</center>
<?php
	echo "<center>";
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
   $sql_ ="select lValida from usuarios where sIdUsuario='".$_SESSION['sIdUsuario']."'";
   $result_ = mysql_query($sql_);
   if($row_=mysql_fetch_array($result_))
	  	$valida = $row_['lValida'];
	if($valida=='Si')
	$opciones= 	array(
			array("sqls.php","Validar Reporte Diario","../../../../imagenes/validar.jpg","sContrato,dIdFecha,sNumeroOrden,sIdTurno,sIdConvenio,lStatus"),
			array("","Autoriza Reporte Diario","../../../../imagenes/autorizar.jpg","sContrato,dIdFecha,sNumeroOrden,sIdTurno,sIdConvenio,lStatus")//sqls.php
		);
$titulos = array ("Contrato","Fecha","Numero de Orden","Numero Reporte","Convenio","Status","Creador","Autorizo","Turno");
$reporte = new reporte();
$reporte->opciones($opciones);
if (isset($_POST['sNumeroOrden']))
	$sNumeroOrden = $_POST['sNumeroOrden'];
$reporte->ponerconsulta("SELECT sContrato,dIdFecha,sNumeroOrden,sNumeroReporte,sIdConvenio,lStatus,sIdUsuario,sIdUsuarioAutoriza,sIdTurno FROM reportediario WHERE sContrato='$sContrato' and sNumeroOrden='".$_SESSION['sOrden']."' and lStatus<>'Autorizado' order by dIdFecha DESC",1,$titulos,"Validar Reporte Diario");
$sql ="SELECT sContrato,dIdFecha,sNumeroOrden,sNumeroReporte,sIdConvenio,lStatus,sIdUsuario,sIdUsuarioAutoriza,sIdTurno FROM reportediario WHERE sContrato='$sContrato' and sNumeroOrden='".$_SESSION['sOrden']."' and lStatus<>'Autorizado' ";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result))
	$reporte->visualizar();
else{
?>
	<center><p><font color="red" size="3"><b>
	No hay reportes para validar en este Frente
	</b></font></p></center>	
<?php
}
?>