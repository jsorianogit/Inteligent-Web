<?php session_start(); $Fecha = $_POST['Fecha']; $actividad= $_POST['actividad']; $consolidar= $_POST['consolidar']; 
require ("../../../include/reporteador.inc.php");
?>
<html>
	<head>
		<script type="text/javascript" src="acc_calendar/acc_calendar.js"></script>
		<style type="text/css">@import 'estilo1.css';</style>
		<script language="javascript" >
			parent.frames[1].document.location="coincidencias.php";
		</script>
	</head>
<body bgcolor="red">
<center> 	
<table border=2  class='enhancedtablerowhover'  bgcolor="#D0DDF0"> <!-- class='normalTable'-->
<tr>
<td style="vertical-align: top" >
   <!------------------- Tabla Anidada 1 ------------------->
   <table border=3 class='enhancedtablerowhover' >
      <form name = "formulario" action="<?php echo $PHP_SELF?>" method="post">
      <tr>
         <th><font color='#D58000'>Num. de Concepto</font></th><td><input type = "text" name = "actividad" size=10  value="<?php echo $actividad ?>"></td>
      </tr>
      <tr>
         <th><font color='#D58000'>Fecha</font></th>
       	<td>
      		<label for="Fecha"><input class="fecha rang10" type="text" id="Fecha" name="Fecha" size=10  value="<?php echo ($Fecha=='')?date('Y-m-d'):$Fecha; ?>" ></label>
      	</td>
      </tr>
      <tr>
         <th><font color='#D58000'>Consolidar por Partida Anexo</th>
      	<td>
		    	<input type="checkbox" value="si" <?php echo $consolidar=="si" ? "checked":""; ?> name="consolidar" >
      	</td>
      </tr>
      <tr>
      	<td colspan=2>
           <center>
      	  <input type="submit" value="Aceptar">
      	  </center>
      	</td>
      </tr>
      </form>
   </table>
   <!-------------------Fin Tabla Anidada 1 ------------------->
</td>
<td bgcolor="#D0DDF0" style='vertical-align: top'>
   <!------------------- Tabla Anidada 2 ------------------->
   <form name="resultado">
   <table>
   	<tr>
   		<td><font color='#D58000'>
   			Reportado</font>
   		</td>
   		<td>
   			<input type="text" name="reportado" readonly>
   		</td>
   
   	</tr>
   	<tr>
   		<td><font color='#D58000'>
   			Generado</font>
   		</td>
   		<td>
   			<input type="text" name="generado" readonly>
   		</td>
   
   	</tr>
   	<tr>
   		<td><font color='#D58000'>
   			Por Generar
   			</font>
   		</td>
   		<td>
   			<input type="text" name="porgenerado" readonly>
   		</td>
   
   	</tr>
   </table>
   </form>
   <!------------------- Fin Tabla Anidada 1 ------------------->
</td>

<?php

//get convenio
$sIdConvenio='';
$sql="SELECT c.sIdConvenio,c2.dFechaInicio,c2.dFechaFinal,c2.dMontoMN 
		FROM configuracion c INNER JOIN convenios c2 ON (c.sContrato=c2.sContrato AND c.sIdConvenio=c2.sIdConvenio) 
		WHERE c.sContrato='$sContrato'";
$resultado=mysql_query($sql,$link);
if($row=mysql_fetch_array($resultado)){
	$sIdConvenio=$row['sIdConvenio'];
}
//create the object
$resultado = new reporte();
//imprime los detalles de la actividad
$sql="Select sWbs, dCantidadAnexo, sMedida, dVentaMN, dPonderado, dInstalado, dExcedente , (dCantidadAnexo-dInstalado) 
		from actividadesxanexo 
		Where sContrato = '$sContrato' and sIdConvenio = '$sIdConvenio' and sNumeroActividad='$actividad' and sTipoActividad = 'Actividad'";
$titulo = array("sWbs","Cantidad","Medida","Precio MN","Ponderado",
"Instalado","Excedente","Pendiente");
$resultado->ponerconsulta($sql,1,$titulo);
echo "<td style='vertical-align: top' bgcolor='#D0DDF0'><center>";
$resultado->imprimir();
echo "</center></td></tr>";

//imprime las actividades segun la fecha
$sql="Select sNumeroOrden, sWbsAnterior, sWbs, sNumeroActividad, mDescripcion, sMedida, dCantidad, dVentaMN, dFechaInicio, dFechaFinal, dInstalado, dExcedente,(dCantidad-dInstalado) as dPendiente, dPonderado
From actividadesxorden Where sContrato ='$sContrato' And sIdConvenio = '$sIdConvenio' And sNumeroActividad = '$actividad' and sTipoActividad = 'Actividad' order by sNumeroOrden, iItemOrden";
$titulo = array("Orden","sWbs Anterior","Wbs","Actividad","Descripcion",
"Medida","Cantidad","Precio MN","Fecha Inicio","Fecha Final","Instalado","Excedente","Pendiente","Ponderado");
$result = mysql_query($sql);
echo "<tr><td colspan='3'  style='vertical-align: top' bgcolor='#D0DDF0'><center><br><br><br>";
echo "<table class='enhancedtablerowhover' >\n"; //enhancedtablerowhover  }
echo "<tr><th colspan=10><center>Concepto / Partida x Ordendes de Trabajo</center></th></tr><tr>";
echo "<th><font color='#D58000'>Orden</font></th>\n";
echo "<th><font color='#D58000'>Wbs</font></th>\n";
echo "<th><font color='#D58000'>Descripcion</font></th>\n";
echo "<th><font color='#D58000'>Medida</font></th>\n";
echo "<th><font color='#D58000'>Cantidad</font></th>\n";
echo "<th><font color='#D58000'>Precio MN</font></th>\n";
echo "<th><font color='#D58000'>Instalado</font></th>\n";
echo "<th><font color='#D58000'>Excedente</font></th>\n";
echo "<th><font color='#D58000'>Pendiente</font></th>\n";
echo "<th><font color='#D58000'>Ponderado</font></th>\n";
$k = 0;
while($row = mysql_fetch_array($result)){
 	if($k==0)
 		{
			?>
				<script>
					parent.coincidencias.location.href= "coincidencias.php?orden=" + "<?php echo $row['sNumeroOrden'] ?>" + "&wbs=" +  "<?php echo $row['sWbs'] ?>" + "&actividad=" + "<?php echo  $actividad ?>"  + "&fecha="  + "<?php echo $Fecha ?>"  + "&consolidar="  + "<?php echo $consolidar ?>" ;
				</script>
			<?php
		}
	echo "<tr >\n";
	echo "<td>".$row['sNumeroOrden']."</td>\n";
	echo "<td><a href='coincidencias.php?orden=".$row['sNumeroOrden']."&wbs=".$row['sWbs']."&actividad=".$actividad."&fecha=".$Fecha."&consolidar=$consolidar' target='coincidencias'>".$row['sWbs']."</a></td>\n";
	echo "<td>".substr($row['mDescripcion'],0, 50).(strlen($row['mDescripcion'])>50?"...":"")."</td>\n";
	echo "<td>".$row['sMedida']."</td>\n";
	echo "<td>".$row['dCantidad']."</td>\n";
	echo "<td>".$row['dVentaMN']."</td>\n";
	echo "<td>".$row['dInstalado']."</td>\n";
	echo "<td>".$row['dExcedente']."</td>\n";
	echo "<td>".$row['dPendiente']."</td>\n";
	echo "<td>".$row['dPonderado']."</td>\n";
	echo "<tr>\n";
}
echo "</table>\n";

 

mysql_close($link);
?>
</center>
</td>
</tr>
</table>
</center>
<script>
document.formulario.actividad.select();
document.formulario.actividad.focus();
</script>
   </body>
</head>
</html>