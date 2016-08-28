<?php
session_register('ssUsuario','ssContrasena','ssContrato','ssNumeroOrden','sDesde','sHasta','sTotal');
/******************************************************/
/* Funcion paginar
 * actual:          Pagina actual
 * total:           Total de registros
 * por_pagina:      Registros por pagina
 * enlace:          Texto del enlace
 * Devuelve un texto que representa la paginacion
 */
function paginar($actual, $total, $por_pagina, $enlace) {
  $total_paginas = ceil($total/$por_pagina);
  $anterior = $actual - 1;
  $posterior = $actual + 1;
  if ($actual>1)
    $texto = "<a href=\"$enlace$anterior\">&laquo;</a> ";
  else
    $texto = "<b>&laquo;</b> ";
  for ($i=1; $i<$actual; $i++)
    $texto .= "<a href=\"$enlace$i\">$i</a> ";
  $texto .= "<b>$actual</b> ";
  for ($i=$actual+1; $i<=$total_paginas; $i++)
    $texto .= "<a href=\"$enlace$i\">$i</a> ";
  if ($actual<$total_paginas)
    $texto .= "<a href=\"$enlace$posterior\">&raquo;</a>";
  else
    $texto .= "<b>&raquo;</b>";
  return $texto;
}
require("../../../../../Modulos/include/mysql.inc.php");
echo "<center><table border=2><td><font size=4>Reporte Diario</font></td></table></center><br>";
//Si se logro registrar, mostrar todos sus contratos
echo "<center>";
//Mostrar los Numeros de orden del Contrato seleccionado
$_SESSION['ssContrato']="418235943";
if(isset($_POST['sContra']) or isset($_SESSION['ssContrato']))
{
   //if(isset($_POST['sContra']))
    //  $_SESSION['ssContrato']=$_POST['sContra'];
	$sqlOrden="SELECT DISTINCT sNumeroOrden,sContrato 
				  FROM bitacoradeactividades 
				  WHERE sContrato='".$_SESSION['ssContrato']."'
				  ORDER BY sNumeroOrden";
	$resultadoOrden=mysql_query($sqlOrden,$link);
	echo "<form action=rd.php method=post><table><tr><th>Seleccionar No. de Orden</th><td><select name='sOrden'>";
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
    if (!isset($_REQUEST['pag'])) $pag = 1;	 
    $_SESSION['ssNumeroOrden']=$_POST['sOrden'];
      //Obtener Numero de Registros
   	$sqlOrden="	SELECT COUNT(*)FROM reportediario WHERE sContrato='418235943' AND sNumeroOrden='418235943-AKAL-C-PP'";
      $resultadoOrden=mysql_query($sqlOrden,$link);
      list($total) = mysql_fetch_row($resultadoOrden);
		$tampag = 25;
		$reg1 = ($pag-1) * $tampag;
   //Obtener Registros
		$sqlOrden="	SELECT *	FROM reportediario WHERE sContrato='418235943' AND sNumeroOrden='418235943-AKAL-C-PP' order by dIdFecha DESC LIMIT $reg1, $tampag";
		$resultadoOrden=mysql_query($sqlOrden,$link);
		echo "<table border=1>";
		whiLe($rowOrden=mysql_fetch_array($resultadoOrden))
		{	
			echo "<tr>";
			for($i=0;$i<7;$i++)
			{
			 	if($rowOrden[$i]=="")$rowOrden[$i]="-";
				echo "<td><font size=1>".$rowOrden[$i]."</font></td>";
			}
			echo "</tr>";
		}
		echo "</table>";
		echo paginar($pag, $total, $tampag, "rd.php?pag=");
?>