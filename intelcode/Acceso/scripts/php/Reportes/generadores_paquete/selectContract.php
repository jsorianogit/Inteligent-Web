<?php
session_register('ssUsuario','ssContrasena','ssContrato','ssNumeroOrden','sDesde','sHasta','sTotal');
require("../../../../../Modulos/include/mysql.inc.php");
//require("Plantilla/Superior.php"); 
?>
<html>
<head>
<title></title>
<style type='text/css'>@import '../../../../../Modulos/estilos/estilo1.css';</style>
<script language="javascript" src="../../../../../Modulos/estilos/domtableenhance.js"></script>
</head>
<body class=forma>
<?php 
echo "<center><table border=2><td><font size=4>Generadores de Obra</font></td></table><br>";
if(isset($_SESSION['ssContrato']) )
{
 	$sqlOrden="SELECT sNumeroOrden,sContrato 
			  FROM ordenesdetrabajo 
			  WHERE sContrato='".$_SESSION['ssContrato']."'
			  ORDER BY sNumeroOrden";
	$resultadoOrden=mysql_query($sqlOrden,$link);
	echo "<center>" ;
	echo "<form action=selectContract.php method=post><table><tr><th>Seleccionar No. de Orden</th><td><select name='sOrden'>";
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
	echo "</select></td><td ><center>" ;
	echo "<input type=submit value=ir 	></center></form></td></tr></table>";
}
if(isset($_POST['sOrden']) or isset($_SESSION['ssNumeroOrden']))
{
   if(isset($_POST['sOrden']))
   {
      $_SESSION['ssNumeroOrden']=$_POST['sOrden'];
      //Obtener Numero de Registros
   	  $sqlOrden="SELECT sNumeroGenerador FROM estimaciones  WHERE sContrato = '".$_SESSION['ssContrato']."' AND sNumeroOrden = '".$_POST['sOrden']. "'";
      $resultado = mysql_query($sqlOrden,$link);
      $_SESSION['sTotal']= mysql_num_rows($resultado);
   }
   
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
   if (isset($_SESSION['ssNumeroOrden']))
   {
       
      		$sqlOrden="	SELECT iConsecutivo, sNumeroOrden, sNumeroGenerador, lStatus, dMontoMN, dFechaInicio, dFechaFinal, sIdUsuarioAutoriza FROM estimaciones WHERE sContrato='".$_SESSION['ssContrato']."' AND sNumeroOrden='".$_SESSION['ssNumeroOrden']."' ORDER BY iConsecutivo DESC LIMIT ".$_SESSION['sDesde'].",".$Limite;
	$resultadoOrden=mysql_query($sqlOrden,$link);
	echo "<font color=#2B2B2B>";
   echo " Mostrando : <font color=#0000FF><b>".$Limite."</b><font color=#2B2B2B> Registros iniciando de: <font color=#0000FF><b>".$_SESSION['sDesde']."</b><font color=#2B2B2B> De un total de: <font color=#0000FF><b>".$_SESSION['sTotal']."</b>";

	echo "<font color=blue>";
   echo "<table border=0>";
	echo "<tr>
				<td align=left><form action=selectContract.php method=post><input type=submit name=PrevPage value='<'></form></td>
            <td align=left><form action=selectContract.php method=post><input type=submit name=FirstPage value='<<'></form></td>
				<td colspan=9></td>
				<td align=rigth><form action=selectContract.php method=post><input type=submit name=LastPage value='>>'></form></td>
            <td align=rigth><form action=selectContract.php method=post><input type=submit name=NextPage value='>'></form></td>
		</tr>";
	echo "<table class='enhancedtablerowhover'>
			<thead>
			<tr>
				<th >#</th>
				<th >No. de Orden</th>
				<th >No. de Generador</th>
				<th >Status</th>
				<th >Importe Total</th>
				<th >F. de Inicio</th>
				<th >F. Final</th>
				<th >Autorizado por</th>
				<th class='CrearReporte'>Caratula de Generacion</th>
				<th class='CrearReporte'>Numeros Generadores</th>
				<th class='CrearReporte'>Numeros Generadores CIA</th>
				<th class='CrearReporte'>Semanal Con Importes</th>
				<th class='CrearReporte'>Semanal Sin Importes</th>
			</thead>
			</tr><tbody>";



	while($rowOrden=mysql_fetch_array($resultadoOrden))
	{	
		echo "<tr bgcolor='#FFFFF3'>";
		for($i=0;$i<=7;$i++)
		{

		    If ( $i == 4 )
				echo "<td align='right'>". '$' . number_format($rowOrden[$i],2 , '.', ',') . "</td>";
		    Else
				echo "<td>".$rowOrden[$i]."</td>";
		}

	  	echo "<td class='CrearReporte' ><a href=\"rptCaratulaGenerador.php?sContrato=".$_SESSION['ssContrato']."&sNumeroOrden=".$_SESSION['ssNumeroOrden']."&sNumeroGenerador=" . $rowOrden[2]."\"  target=_blank><img src='../iconos/acroba2t.gif' width='20' height='20' alt='Reporte Diario' border='1'> </a></td>";

	  	echo "<td  class='CrearReporte' ><a href=\"rptNumerosGeneradores.php?sContrato=".$_SESSION['ssContrato']."&sNumeroOrden=".$_SESSION['ssNumeroOrden']."&sNumeroGenerador=" . $rowOrden[2]."\"  target=_blank><img src='../iconos/acroba2t.gif' width='20' height='20' alt='Reporte Diario' border='1'></a></td>";

	  	echo "<td  class='CrearReporte'><a href=\"rptNumerosGeneradoresCIA.php?sContrato=".$_SESSION['ssContrato']."&sNumeroOrden=".$_SESSION['ssNumeroOrden']."&sNumeroGenerador=" . $rowOrden[2]."\"  target=_blank><img src='../iconos/acroba2t.gif' width='20' height='20' alt='Reporte Diario' border='1'></a></td>";

	  	echo "<td class='CrearReporte'  ><a href=\"rptSemanalConImportes.php?sContrato=".$_SESSION['ssContrato']."&sNumeroOrden=".$_SESSION['ssNumeroOrden']."&sNumeroGenerador=" . $rowOrden[2]."\"  target=_blank><img src='../iconos/acroba2t.gif' width='20' height='20' alt='Reporte Diario' border='1'></a></td>";

	  	echo "<td  class='CrearReporte' ><a href=\"rptSemanalSinImportes.php?sContrato=".$_SESSION['ssContrato']."&sNumeroOrden=".$_SESSION['ssNumeroOrden']."&sNumeroGenerador=" . $rowOrden[2]."\"  target=_blank><img src='../iconos/acroba2t.gif' width='20' height='20' alt='Reporte Diario' border='1'></a></td>";

		echo "</tr>";
	}
	echo "</table><table border=0><tr>
				<td align=left><form action=selectContract.php method=post><input type=submit name=PrevPage value='<'></form></td>
            <td align=left><form action=selectContract.php method=post><input type=submit name=FirstPage value='<<'></form></td>
				<td colspan=9></td>
				<td align=rigth><form action=selectContract.php method=post><input type=submit name=LastPage value='>>'></form></td>
            <td align=rigth><form action=selectContract.php method=post><input type=submit name=NextPage value='>'></form></td>
		</tr></tbody></table>";
		echo "<font color=#2B2B2B>";
   echo " Mostrando : <font color=#0000FF><b>".$Limite."</b><font color=#2B2B2B> Registros iniciando de: <font color=#0000FF><b>".$_SESSION['sDesde']."</b><font color=#2B2B2B> De un total de: <font color=#0000FF><b>".$_SESSION['sTotal']."</b>";
   }

}
//require("Plantilla/Inferior.php");
 ?>
 </body>
</html>