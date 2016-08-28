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
   
     //Obtener Numero de Registros
      $sqlEstima="SELECT iNumeroEstimacion FROM estimacionperiodo WHERE sContrato = '".$_SESSION['ssContrato']."'";
      $resultado = mysql_query($sqlEstima,$link);
      $_SESSION['sTotal']= mysql_num_rows($resultado);
     
   
   //Calcular Paginas
   $Limite=25;
   if(isset($_SESSION['sTotal']) and $_SESSION['sTotal']>$Limite)
   {
      if(!isset($_SESSION['sDesde']))
      {
         $_SESSION['sDesde']=0;
         $_SESSION['sHasta']=$Limite;
      }
      else if(isset($_POST['NextPage']))
      {  
         if($_SESSION['sDesde']>=$_SESSION['sTotal'])
         {
            $_SESSION['sDesde']=$_SESSION['sTotal']-$Limite;
         }
         else
         {
            $_SESSION['sDesde']+=$Limite;
            if($_SESSION['sDesde'] >=$_SESSION['sTotal'])
            {
               $_SESSION['sDesde']=$_SESSION['sTotal']-$Limite;
            }
         }
      }
      else if(isset($_POST['PrevPage']))
      {  
         if($_SESSION['sDesde'] <0)
         {
            $_SESSION['sDesde']=0;
         }
         else
         {
            $_SESSION['sDesde']-=$Limite;
            if($_SESSION['sDesde'] <=0)
            {
               $_SESSION['sDesde']=0;
             }
         }
      }
      else if(isset($_POST['FirstPage']))
      {  
            $_SESSION['sDesde']=0;
      }
      else if(isset($_POST['LastPage']))
      {  
            $_SESSION['sDesde']=$_SESSION['sTotal']-$Limite;
      }
   }
   else if(isset($_SESSION['sTotal']))   
   {
      $_SESSION['sDesde']=0;
      $_SESSION['sHasta']=$_SESSION['sTotal'];
   }

   //Obtener Registros
   if (isset($_SESSION['ssContrato']))
   {
       
      		$sqlEstima="SELECT e.iNumeroEstimacion, t.sDescripcion, e.dFechaInicio, e.dFechaFinal, e.sMoneda, e.dMontoMN, e.dMontoDLL, e.dRetencion, e.dRetencionDLL FROM 
estimacionperiodo e INNER JOIN tiposdeestimacion t ON (e.sIdTipoEstimacion = t.sIdTipoEstimacion) WHERE sContrato='".$_SESSION['ssContrato'] . "' ORDER BY iNumeroEstimacion LIMIT 
".$_SESSION['sDesde'].",".$Limite;

	$resultadoOrden=mysql_query($sqlEstima,$link);
	echo "<table border=0>
				<tr>
					<th>Contrato Seleccionado</th>
					<td>".$_SESSION['ssContrato']."</td>
				</tr>
			</table>";
		echo "<font color=#2B2B2B>";
   echo " Mostrando : <font color=#0000FF><b>".$Limite."</b><font color=#2B2B2B> Registros iniciando de: <font color=#0000FF><b>".$_SESSION['sDesde']."</b><font color=#2B2B2B> De un total de: <font color=#0000FF><b>".$_SESSION['sTotal']."</b>";
	echo "<table><tr>
				<td align=left><form action=selectContractEstima.php method=post><input type=submit name=PrevPage value='<'></form></td>
            <td align=left><form action=selectContractEstima.php method=post><input type=submit name=FirstPage value='<<'></form></td>
				<td colspan=9></td>
				<td align=rigth><form action=selectContractEstima.php method=post><input type=submit name=LastPage value='>>'></form></td>
            <td align=rigth><form action=selectContractEstima.php method=post><input type=submit name=NextPage value='>'></form></td>
		</tr>";
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
		echo "<tr >";
		for($i=0;$i<=8;$i++)
		{

		switch ($i) {
     			case 5:
				$dMontoMN = 0 ;
               			$sqlMonto = "SELECT sum(dMontoMN) as dMontoMN FROM estimaciones Where sContrato='".$_SESSION['ssContrato'] . "' and iNumeroEstimacion = '" . 
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
	echo "<tbody></table><table border=0><tr>
				<td align=left><form action=selectContractEstima.php method=post><input type=submit name=PrevPage value='<'></form></td>
            <td align=left><form action=selectContractEstima.php method=post><input type=submit name=FirstPage value='<<'></form></td>
				<td colspan=9></td>
				<td align=rigth><form action=selectContractEstima.php method=post><input type=submit name=LastPage value='>>'></form></td>
            <td align=rigth><form action=selectContractEstima.php method=post><input type=submit name=NextPage value='>'></form></td>
		</tr></table>";
		echo "<font color=#2B2B2B>";
   echo " Mostrando : <font color=#0000FF><b>".$Limite."</b><font color=#2B2B2B> Registros iniciando de: <font color=#0000FF><b>".$_SESSION['sDesde']."</b><font color=#2B2B2B> De un total de: <font color=#0000FF><b>".$_SESSION['sTotal']."</b>";
   }

}
//require("Plantilla/Inferior.php");
 ?>
