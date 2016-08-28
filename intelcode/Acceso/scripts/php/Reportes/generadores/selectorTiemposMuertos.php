<?php session_start(); ?>
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<html>
<head>
<?php
   echo $estilo="<LINK REL='stylesheet' TYPE='text/css' HREF='../../../../../Modulos/estilos/estilo1.css'>";
?>
<title></title>
<script type="text/javascript" src="acc_calendar/acc_calendar.js">
</script>
</head>
<body class=forma>
<center>
<?php
echo "<center><table border=2><td><font size=4>Tiempos Muertos</font></td></table></center><br>";
session_register('ssUsuario','ssContrasena','ssContrato','dFechaInicio','dFechaTermino');
require("../../../../../Modulos/include/mysql.inc.php");
//if(isset($_SESSION['ssUsuario']) and isset($_SESSION['ssContrasena']))
//{
   $sqlContrato="SELECT distinct(sNumeroOrden) as sNumeroOrden
              FROM  ordenesdetrabajo
              WHERE sContrato='$sContrato'";
   $resultadoContrato=mysql_query($sqlContrato);
   echo "<form action=rptTiemposMuertos.php  method=post target='_blank'>" ;
   echo "Seleccione el Numero de Orden :<br>" ;
   echo "<select name=ordenSeleccionada>";
   echo "<option value='Todas las Ordenes'>Todas las Ordenes</option>";
   while($rowContrato=mysql_fetch_array($resultadoContrato))
   {
      echo "<option value='".$rowContrato['sNumeroOrden']."'>".$rowContrato['sNumeroOrden']."</option>";
   }
   echo "</select><br>";
//}
?>
Seleccione el rango de fechas, use los calendarios para mayor comodidad
        <div>
                <p>
                <label for="fecha3">
                        <span>
                                Fecha de  inicio
                        </span><input class="fecha prev rang100" type="text" id="fecha3" name="fechaIni" value="" />
                </label>
                </p>
        </div>           
   <div>
      <p>
      <label for="fecha4"> Fecha de termino </td><td>
          </span><input class="fecha prev rang100" type="text" id="fecha4" name="fechaTerm" value="" /> 
      </label>
      </p>
   </div>
   <br>
   <input type=submit value='Seleccionar'/></form>
<?php
?>
</center>
</body>
</html>
