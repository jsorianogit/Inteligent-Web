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
echo "<center><table border=2><td><font size=4>Reporte Diario</font></td></table></center><br>";
//Si se logro registrar, mostrar todos sus contratos
echo "<center>";
//Mostrar los Numeros de orden del Contrato seleccionado
if(isset($_POST['sContra']) or isset($_SESSION['ssContrato']))
{
   //if(isset($_POST['sContra']))
    //  $_SESSION['ssContrato']=$_POST['sContra'];
	$sqlOrden="SELECT DISTINCT sNumeroOrden,sContrato 
				  FROM bitacoradeactividades 
				  WHERE sContrato='".$_SESSION['ssContrato']."'
				  ORDER BY sNumeroOrden";
	$resultadoOrden=mysql_query($sqlOrden,$link);
	echo "<form action=selectorReporteDiario.php method=post><table><tr><th>Seleccionar No. de Orden</th><td><select name='sOrden'>";
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
	echo "</select></td><td><input type=submit value='Ir'/></td></tr></table></form>";
}
//Mostrar Lista
if(isset($_POST['sOrden']) or isset($_SESSION['ssNumeroOrden']))
{
   
   if(isset($_POST['sOrden']))
   {
      $_SESSION['ssNumeroOrden']=$_POST['sOrden'];
      //Obtener Numero de Registros
   	$sqlOrden="	SELECT r.dIdFecha
					FROM reportediario r 
					INNER JOIN convenios c ON (r.sContrato=c.sContrato AND r.sIdConvenio=c.sIdConvenio)
					INNER JOIN turnos t	ON (r.sContrato=t.sContrato ANd r.sIdTurno=t.sIdTurno)
					WHERE r.sContrato='".$_SESSION['ssContrato']."' AND r.sNumeroOrden='".$_POST['sOrden']."' 
					ORDER BY r.dIdFecha DESC, r.sIdTurno";
      $resultadoOrden=mysql_query($sqlOrden,$link);
      $_SESSION['sTotal']=mysql_num_rows($resultadoOrden);
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
	$sqlOrden="	SELECT r.dIdFecha,r.sIdTurno,r.lStatus,r.sIdUsuario,r.sIdUsuarioValida,r.sIdUSuarioAutoriza,c.sDescripcion, t.sDescripcion as sDescripcionTurno,c.sIdConvenio
					FROM reportediario r 
					INNER JOIN convenios c ON (r.sContrato=c.sContrato AND r.sIdConvenio=c.sIdConvenio)
					INNER JOIN turnos t	ON (r.sContrato=t.sContrato ANd r.sIdTurno=t.sIdTurno)
					WHERE r.sContrato='".$_SESSION['ssContrato']."' AND r.sNumeroOrden='".$_SESSION['ssNumeroOrden']."' 
					ORDER BY r.dIdFecha DESC, r.sIdTurno LIMIT ".$_SESSION['sDesde'].",".$Limite;
	$resultadoOrden=mysql_query($sqlOrden,$link);
	echo "<font color=#2B2B2B>";
   echo " Mostrando : <font color=#0000FF><b>".$Limite."</b><font color=#2B2B2B> Registros iniciando de: <font color=#0000FF><b>".$_SESSION['sDesde']."</b><font color=#2B2B2B> De un total de: <font color=#0000FF><b>".$_SESSION['sTotal']."</b>";
  ?>
	</table>
        <table border=0 bgcolor="white">
        <tr bgcolor="white">       
           <td align=left bgcolor="white"><form action='#' method=post><abbr title="Anterior"><input type=submit name=PrevPage value='<'></abb></form></td>
           <td align=left bgcolor="white"><form action='#' method=post><abbr title="Primero"><input type=submit name=FirstPage value='<<'></abb></form></td>
           <td colspan=6 bgcolor="white"></td>
           <td align=rigth bgcolor="white"><form action='#' method=post><abbr title="Ultimo"><input type=submit name=LastPage value='>>'></abb></form></td>
           <td align=rigth bgcolor="white"><form action='#' method=post><abbr title="Siguiente"><input type=submit name=NextPage value='>'></abb></form></td>
        </tr>                
        </table>

<?php	
   $TitleColor="#102000";//#100000       
   $titleBackColor="#C9C9F4";
   $ReportColor="#BD92E7";//     
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
					<a href=\"rptReporteDiario.php?sContrato=".$_SESSION['ssContrato']."&sNumeroOrden=".$_SESSION['ssNumeroOrden']."&dFecha=$rowOrden[0]&sIdTurno=$rowOrden[1]&sIdConvenio=$rowOrden[8]&lStatus=".$rowOrden['lStatus']."\" target=_blank >
					
					<img src='../iconos/acroba2t.gif' width='20' height='20' alt='Reporte Diario' border='1'> 
					</a>
				</td>";
		//echo "<td><font color = '#100000' size='1'>R</td>";
		echo "</tr>";
	}
	
	?>
	</tbody>
	</table>
        <table border=0 bgcolor="white">
        <tr bgcolor="white">       
           <td align=left bgcolor="white"><form action='#' method=post><abbr title="Anterior"><input type=submit name=PrevPage value='<'></abb></form></td>
           <td align=left bgcolor="white"><form action='#' method=post><abbr title="Primero"><input type=submit name=FirstPage value='<<'></abb></form></td>
           <td colspan=6 bgcolor="white"></td>
           <td align=rigth bgcolor="white"><form action='#' method=post><abbr title="Ultimo"><input type=submit name=LastPage value='>>'></abb></form></td>
           <td align=rigth bgcolor="white"><form action='#' method=post><abbr title="Siguiente"><input type=submit name=NextPage value='>'></abb></form></td>
        </tr>                
        </table>

	<?php
echo "<font color=#2B2B2B>";
   echo " Mostrando : <font color=#0000FF><b>".$Limite."</b><font color=#2B2B2B> Registros iniciando de: <font color=#0000FF><b>".$_SESSION['sDesde']."</b><font color=#2B2B2B> De un total de: <font color=#0000FF><b>".$_SESSION['sTotal']."</b>";
   }

}

//require("../../Plantilla/Inferior.php");
 ?>
 </body>
</html>