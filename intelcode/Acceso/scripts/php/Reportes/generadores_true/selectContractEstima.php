<?php
session_register('ssUsuario','ssContrasena','ssContrato','ssNumeroOrden','sDesde','sHasta','sTotal');
require("../../../../../Modulos/include/mysql.inc.php");
//require("Plantilla/Superior.php"); 
?>
<html>
<head>
<style type='text/css'>@import '../../../../../Modulos/estilos/estilo1.css';</style>
<script language="javascript" src="../../../../../Modulos/estilos/domtableenhance.js"></script>
<title></title>
</head>
<body class=forma>
<?php 
echo "<center><table border=2><td><font size=4>Estimaciones del Contrato</font></td></table><br>";
if(isset($_POST['sContra']) or isset($_SESSION['ssContrato']) )
{
	if(isset($_POST['sContra']))
   	$_SESSION['ssContrato']=$_POST['sContra'];
//   if(!isset($pag))$pag=1;
       if(!isset($_REQUEST['pag']))$pag=1;
        else if (isset($_REQUEST['pag']))$pag=$_REQUEST['pag'];
        else $pag=1;   
   //Obtener Numero de Registros
   $sqlEstima="SELECT COUNT(*) 
					FROM estimacionperiodo e 
					INNER JOIN tiposdeestimacion t ON (e.sIdTipoEstimacion = t.sIdTipoEstimacion) 
					WHERE sContrato='".$_SESSION['ssContrato']."' ORDER BY iNumeroEstimacion ";
   $resultado = mysql_query($sqlEstima,$link);
	list($total) = mysql_fetch_row($resultado) ;
		   
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
   $sqlEstima="SELECT e.iNumeroEstimacion, t.sDescripcion, e.dFechaInicio, e.dFechaFinal, e.sMoneda, 
					e.dMontoMN, e.dMontoDLL, e.dRetencion, e.dRetencionDLL 
					FROM estimacionperiodo e 
					INNER JOIN tiposdeestimacion t ON (e.sIdTipoEstimacion = t.sIdTipoEstimacion) 
					WHERE sContrato='".$_SESSION['ssContrato'] . "' ORDER BY iNumeroEstimacion 
					LIMIT $reg1,$tampag";

	$resultadoOrden=mysql_query($sqlEstima,$link);

	echo "<table  class='enhancedtablerowhover'>
			<thead>
			<tr>
				<th  >No. de Est.</th>
				<th  >Tipo de Est.</th>
				<th  >Fecha Inicio</th>
				<th  >Fecha Final</th>
				<th  >Moneda</th>
				<th  >Monto M.N.</th>
				<th  >Monto DLL</th>
				<th  >Retencion Aplicada en M.N.</th>
            	<th  >Retencion Aplicada en DLL</th>
				<th  class='CrearReporte'>Resumen de Estimacion </th>
				<th  class='CrearReporte'>Concentrado de Isometricos</th>
				<th  class='CrearReporte'>Concentrado de Generadores</th>
				<th  class='CrearReporte'>Concentrado de Estimaciones</th>
				<th  class='CrearReporte'>Retenciones</th>
			</tr>
			</thead><tbody>";

	while($rowOrden=mysql_fetch_array($resultadoOrden))
	{	
		echo "<tr>";
		for($i=0;$i<=8;$i++)
		{
			switch ($i) {
   		case 5:
				$dMontoMN = 0 ;
     			$sqlMonto = "SELECT sum(dMontoMN) as dMontoMN 
				  				 FROM estimaciones 
								 Where sContrato='".$_SESSION['ssContrato'] . "' and iNumeroEstimacion = '" . 
				$rowOrden['iNumeroEstimacion'] . "' and lStatus = 'Autorizado' group by sContrato" ;
        		$QryMonto = mysql_query($sqlMonto,$link);
				If ($rowMonto=mysql_fetch_array($QryMonto))
				$dMontoMN = $rowMonto['dMontoMN'] ;
  		  	   echo "<td >". '$' . number_format( $dMontoMN ,2 , '.', ',') . "</td>";
  	       	break	;
     		case 6:
            echo "<td >". '$' . number_format($rowOrden[$i],2 , '.', ',') . "</td>";
       		break;
     		case 7:
         	echo "<td >". '$' . number_format($rowOrden[$i],2 , '.', ',') . "</td>";
         	break;
         case 8:
            echo "<td >". '$' . number_format($rowOrden[$i],2 , '.', ',') . "</td>";
            break;
     		default:
         	echo "<td>".$rowOrden[$i]."</td>";
				break ;
			}
		}

	  	echo "<td class='CrearReporte'' ><a href=\"rptResumendeEstimacion.php?sContrato=".$_SESSION['ssContrato']."&iNumeroEstimacion=".$rowOrden[0]."\"  target=_blank ><img 
src='../iconos/acroba2t.gif' width='20' height='20' alt='Resumen de Estimacion' border='1'> </a></td>";

	  	echo "<td  class='CrearReporte'><a href=\"selectContractEstima.php\"><img src='../iconos/acroba2t.gif' width='20' height='20' alt='Concentrado de 
Isometricos' 
border='1'></a></td>";

	  	echo "<td  class='CrearReporte' ><a href=\"selectContractEstima.php\"><img src='../iconos/acroba2t.gif' width='20' height='20' alt='Concentrado de 
Generadores' 
border='1'></a></td>";

	  	echo "<td class='CrearReporte'><a href=\"selectContractEstima.php\"><img src='../iconos/acroba2t.gif' width='20' height='20' alt='Concentrado de 
Estimaciones' 
border='1'></a></td>";

	  	echo "<td  class='CrearReporte' ><a href=\"selectContractEstima.php\"><img src='../iconos/acroba2t.gif' width='20' height='20' alt='Retenciones Aplicadas' 
border='1'></a></td>";

		echo "</tr>";
	}
	echo "</table>";
echo paginar($pag, $total, $tampag, "?pag=");  
}
//require("Plantilla/Inferior.php");
 ?>
