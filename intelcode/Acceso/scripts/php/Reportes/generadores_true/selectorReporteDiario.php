<?php
session_register('ssUsuario','ssContrasena','ssContrato','ssNumeroOrden','sDesde','sHasta','sTotal');
?>
<html>
<head>
<title>Reporte Diario</title>
<style type='text/css'>@import '../../../../../Modulos/estilos/estilo1.css';</style>
<script language="javascript" src="../../../../../Modulos/estilos/domtableenhance.js"></script>
</head>
<body class=forma>
<?php
require("../../../../../Modulos/include/mysql.inc.php");

echo "<center><table border=2 ><td><font size=4>Reporte Diario</font></td></table></center><br>";
//Si se logro registrar, mostrar todos sus contratos
echo "<center>";
//Mostrar los Numeros de orden del Contrato seleccionado
if(isset($_POST['sContra']) or isset($_SESSION['ssContrato']) or isset($_SESSION['ssNumeroOrden']))
{
	$sqlOrden="SELECT sNumeroOrden
				  FROM ordenesdetrabajo
				  WHERE sContrato='".$_SESSION['ssContrato']."'
				  ORDER BY sNumeroOrden";
	$resultadoOrden=mysql_query($sqlOrden,$link);
	echo "<form action=selectorReporteDiario.php method=post name='rp'>
				<table class='enhancedtablerowhover'><tr><th>Seleccionar No. de Orden</th><td>
					<select name='sOrden' onchange='document.rp.submit();'>";
					echo "<option></option>";
	while($rowOrden=mysql_fetch_array($resultadoOrden))
	{	
		 if(isset($_POST['sOrden']))
      			$_SESSION['ssNumeroOrden']=$_POST['sOrden'];
                if(isset($_SESSION['ssNumeroOrden']) and $_SESSION['ssNumeroOrden']==$rowOrden['sNumeroOrden'])
                        $Seleccionar="selected";
                else
                        $Seleccionar="";

		echo "<option $Seleccionar>".$rowOrden['sNumeroOrden']."</option>";
	}
	echo "</select></td></tr></table></form>";
}
//Mostrar Lista
if(isset($_POST['sOrden']) or isset($_SESSION['ssNumeroOrden']))
{
	if(!isset($_REQUEST['pag']))$pag=1;
	else if (isset($_REQUEST['pag']))$pag=$_REQUEST['pag'];
	else $pag=1;
   if(isset($_POST['sOrden']))$_SESSION['ssNumeroOrden']=$_POST['sOrden'];
   if (isset($_SESSION['ssNumeroOrden']))
   {
   	//Obtener Numero de Registros
	   $sqlOrden="	SELECT COUNT(*)
						FROM reportediario r 
						INNER JOIN convenios c ON (r.sContrato=c.sContrato AND r.sIdConvenio=c.sIdConvenio)
						INNER JOIN turnos t	ON (r.sContrato=t.sContrato ANd r.sIdTurno=t.sIdTurno)
						WHERE r.sContrato='".$_SESSION['ssContrato']."' AND r.sNumeroOrden='".$_SESSION['ssNumeroOrden']."' 
						ORDER BY r.dIdFecha DESC, r.sIdTurno";
	   $resultadoOrden=mysql_query($sqlOrden,$link);
	   
	   list($total)=mysql_fetch_row($resultadoOrden);//Total de Registros calculados
	   
	   if($total<200):
			$tampag=20;
		elseif ($total<400):
			$tampag=40;
		else:
			$tampag=60;
		endif;
		
		$reg1=($pag-1) * $tampag;	//Registro actual
		
	   //Obtener Registros
		echo paginar($pag, $total, $tampag, "?pag="); 
		$sqlOrden="	SELECT r.dIdFecha,r.sIdTurno,r.lStatus,r.sIdUsuario,r.sIdUsuarioValida,r.sIdUSuarioAutoriza,c.sDescripcion, t.sDescripcion as sDescripcionTurno,c.sIdConvenio
					FROM reportediario r 
					INNER JOIN convenios c ON (r.sContrato=c.sContrato AND r.sIdConvenio=c.sIdConvenio)
					INNER JOIN turnos t	ON (r.sContrato=t.sContrato ANd r.sIdTurno=t.sIdTurno)
					WHERE r.sContrato='".$_SESSION['ssContrato']."' AND r.sNumeroOrden='".$_SESSION['ssNumeroOrden']."' 
					ORDER BY r.dIdFecha DESC, r.sIdTurno LIMIT $reg1,$tampag";
		$resultadoOrden=mysql_query($sqlOrden,$link);

	    
		echo "<table class='enhancedtablerowhover' >
			<thead>
			<tr>
				<th >Fecha</th>
				<th >Turno</th>
				<th >Status</th>
				<th >Usuario</th>
				<th >Valida</th>
				<th >Autoriza</th>
				<th >Descripcion</th>
				<th >Descripcion Turno</th>
				<th >Convenio</th>
            <th class='CrearReporte'>Imprimir</th>
			</thead>
		</tr><tbody>";
		while($rowOrden=mysql_fetch_array($resultadoOrden))
		{	
			echo "<tr bgcolor='#FFFFF3'>";
			for($i=0;$i<=8;$i++)
			{
				echo "<td>".$rowOrden[$i]."</td>";
			}
		  	echo "<td class='CrearReporte' align=center bgcolor='$ReportColor'>
						<a href=\"rptReporteDiario.php?sContrato=".$_SESSION['ssContrato']."&sNumeroOrden=".$_SESSION['ssNumeroOrden']."&dFecha=$rowOrden[0]&sIdTurno=$rowOrden[1]&sIdConvenio=$rowOrden[8]&lStatus=".$rowOrden['lStatus']."\"	 target=_blank >
						
						<img src='../iconos/acroba2t.gif' width='20' height='20' alt='Reporte Diario' border='1'> 
						</a>
					</td>";
			echo "</tr>";
		}
		echo "</table></tbody>";
		echo paginar($pag, $total,$tampag,"?pag=");
	   }
		

}

?>
 </body>
</html>
