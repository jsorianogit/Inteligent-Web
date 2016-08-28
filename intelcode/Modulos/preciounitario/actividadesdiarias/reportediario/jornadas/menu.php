<?php
session_cache_limiter("must-revalidate"); 
session_start();
require ("../../../../include/formulario.inc.php");
if(isset($_REQUEST['Operacion']))$_SESSION['Operacion']=$Operacion=$_REQUEST['Operacion'];

if(isset($_REQUEST['sNumeroOrden'])) $_SESSION['sNumeroOrden']=$sNumeroOrden = $_REQUEST['sNumeroOrden'];
else $_SESSION['sNumeroOrden']=$sNumeroOrden =$_SESSION['orden'];

if(isset($_REQUEST['sIdTurno'])) $_SESSION['sIdTurno'] =$sIdTurno= $_REQUEST['sIdTurno'];
else  $_SESSION['sIdTurno'] =$sIdTurno= $_SESSION['turno'];

if(isset($_REQUEST['dIdFecha'])) $_SESSION['dIdFecha'] =$sIdFecha= $_REQUEST['dIdFecha'];
else $_SESSION['dIdFecha'] =$sIdFecha= $_SESSION['fecha'];

if(isset($_REQUEST['sArea'])) $_SESSION['sArea'] =$sArea= $_REQUEST['sArea'];
if(isset($_REQUEST['sTipo'])) $_SESSION['sTipo'] =$sTipo= $_REQUEST['sTipo'];
if(isset($_REQUEST['sIdPernocta'])) $_SESSION['sIdPernocta'] =$sIdPernocta= $_REQUEST['sIdPernocta'];
if(isset($_REQUEST['sIdEmbarcacion'])) $_SESSION['sIdEmbarcacion'] =$sIdEmbarcacion= $_REQUEST['sIdEmbarcacion'];
if(isset($_REQUEST['sHoraInicio'])) $_SESSION['sHoraInicio'] =$sHoraInicio= $_REQUEST['sHoraInicio']; 
if(isset($_REQUEST['sHoraFinal'])) $_SESSION['sHoraFinal'] =$sHoraFinal= $_REQUEST['sHoraFinal']; 
if(isset($_REQUEST['sHoraSalida'])) $_SESSION['sHoraSalida'] = $sHoraSalida = $_REQUEST['sHoraSalida'];
/*jornada del dia*/
#OBTENER LA JORNADA DE DIAS ESPECIALES SI EXISTE
$sql = "select iJornada from diasespeciales where sContrato='$sContrato' and dIdFecha='".$_SESSION['dIdFecha']."';";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $iJornadaDiaEspecial = $row['iJornada'];

}

#OBTENER LAS JORNADAS A TRABAJAR EN EL DIA
$sql = "select iJornada from ordenesdetrabajo where sContrato='$sContrato' and sNumeroOrden = '".$_SESSION['sNumeroOrden']."';";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $iJornadaOrdenesdeTrabajo = $row['iJornada'];

}

if($iJornadaDiaEspecial){

   if($iJornadaDiaEspecial >= 10){
      $JornadaDiariaFormat = $iJornadaDiaEspecial.":00";
   }
   else{
      $JornadaDiariaFormat = "0".$iJornadaDiaEspecial.":00";
   }
}
else if($iJornadaOrdenesdeTrabajo <1){
   #Si las jornadas de ordenes de trabajo es igual a cero, sacar
   #las jornadas de la configuracion
   $iJornadas = Jornadas();
   #Obtener la jornada de la fecha
   $JornadasxDia = JornadasDia($_SESSION['dIdFecha'],$iJornadas);
   #convertirlo a formato de hora
   $arrayHora = explode(".",$JornadasxDia);
   $hora = $arrayHora[0];
   $minuto = ($arrayHora[1]*60)/100;
   if($hora < 10) $hora = "0$hora";
   if($minuto < 10)$minuto = "0$minuto";
   $JornadaDiariaFormat = $hora.":".$minuto;
}
else{

   if($iJornadaOrdenesdeTrabajo >= 10){
      $JornadaDiariaFormat = $iJornadaOrdenesdeTrabajo.":00";
   }
   else{
      $JornadaDiariaFormat = "0".$iJornadaOrdenesdeTrabajo.":00";
   }
}



$iJornadas = Jornadas();
//Obtener la jornada de la fecha
$JornadasxDia = JornadasDia($_SESSION['dIdFecha'],$iJornadas);
$sJornadasParaElDia = NumberToHour($JornadasxDia);
/*fin jornada del dia*/
if($_SESSION['Operacion'] == 'm'){
 $sql = "SELECT * FROM jornadasdiarias WHERE sContrato='".$_REQUEST['sContrato']."' AND dIdFecha = '".$_REQUEST['dIdFecha']."' AND    sNumeroOrden = '".$_REQUEST['sNumeroOrden']."' AND sIdTurno = '".$_REQUEST['sIdTurno']."' AND sTipo='".$_REQUEST['sTipo']."' AND sIdPernocta='".$_REQUEST['sIdPernocta']."' AND sIdEmbarcacion='".$_REQUEST['sIdEmbarcacion']."' AND sHoraInicio='".$_REQUEST['sHoraInicio']."' AND sHoraFinal = '".$_REQUEST['sHoraFinal']."' AND sHoraSalida = '".$_REQUEST['sHoraSalida']."' ; ";
   $result = mysql_query($sql);
   if($row = mysql_fetch_array($result)){
     $sTipo = $row['sTipo'] ;
     $sIdPernocta = $row['sIdPernocta'];
     $sHoraSalida = $row['sHoraSalida'];
     $sIdPlataforma = $row['sIdPlataforma'];
     $sIdEmbarcacion = $row['sIdEmbarcacion'];
     $sHoraLlegada =  $row['sHoraLlegada'];
     $sHoraInicio = $row['sHoraInicio'];
     $sHoraFinal = $row['sHoraFinal'];
     $sTiempoComida = $row['sTiempoComida'];
     $dPersonal = $row['dPersonal'];
     $dFrente = $row['dFrente'];
     $sIdTipoMovimiento  = $row['sIdTipoMovimiento'];
     $sArea = $row['sArea'];
     $mDescripcion = $row['mDescripcion'];
   }
}
?>
<html>
<head>

<script language="javascript">
function enviarForm(){
   <?php
      //Buscar plataformas destino y advertirle al usuario
      $sql ="SELECT o.sIdPlataforma,p.sDescripcion FROM ordenesdetrabajo o INNER JOIN plataformas p ON (o.sIdPlataforma=p.sIdPlataforma) WHERE sContrato='$sContrato' AND sNumeroOrden='".$_SESSION['sNumeroOrden']."';";
      $result = mysql_query($sql);
      if ($row = mysql_fetch_array($result)){
       $PlataformaID = $row[0];
      }
   ?>
   
   valor = "<?php echo $PlataformaID ; ?>" ;
   if(valor != document.jornadasdiarias.sIdPlataforma.value && document.jornadasdiarias.sTipo.value !="Tiempo Inactivo"){
      valor = confirm ("Esta Ingresando una Disponibilidad con una Plataforma Destino Diferente a la Predeterminada (<?php echo $PlataformaID  ?>), desea Continuar?") ? "siAceptar" : "siCancelar";
      if(valor=="siAceptar"){
         document.jornadasdiarias.submit();
      }
   }
   else{
      document.jornadasdiarias.submit();
   }
}
// fin de verificacion
function Deshabilitar(){
   if(document.jornadasdiarias.sTipo.value=="Tiempo Inactivo"){
      document.jornadasdiarias.sHoraSalida.value="";
      document.jornadasdiarias.sHoraSalida.disabled=true;
      document.jornadasdiarias.sIdEmbarcacion.selectedIndex = -1;
      document.jornadasdiarias.sIdEmbarcacion.disabled=true;
      document.jornadasdiarias.sIdPlataforma.selectedIndex = -1;
      document.jornadasdiarias.sIdPlataforma.disabled=true;
      document.jornadasdiarias.sIdTipoMovimiento.disabled=false;
      //document.jornadasdiarias.sArea.value="";
      document.jornadasdiarias.sHoraLlegada.disabled = true;
      document.jornadasdiarias.sHoraLlegada.value = "";
      document.jornadasdiarias.sArea.disabled=false;
      document.getElementById("SinTransporte").disable=true;
   }
   else{
      document.jornadasdiarias.sArea.value="";
      document.jornadasdiarias.sArea.disabled=true;
      document.jornadasdiarias.sHoraLlegada.disabled = false;
      <?php
         if($sHoraLlegada==""){
         ?>
      document.jornadasdiarias.sHoraLlegada.value = "00:00";
      <?php
         }
      ?>
      document.jornadasdiarias.sHoraSalida.disabled=false;
      <?php
         if($sHoraSalida==""){
         ?>
      document.jornadasdiarias.sHoraSalida.value = "00:00";
      <?php
         }
      ?>
      document.jornadasdiarias.sIdEmbarcacion.disabled=false;
      document.jornadasdiarias.sIdPlataforma.disabled=false;
      document.jornadasdiarias.sHoraLlegada.disabled=false;
      document.jornadasdiarias.sIdTipoMovimiento.selectedIndex = -1;
      document.jornadasdiarias.sIdTipoMovimiento.disabled=true;
      document.getElementById("SinTransporte").disable=false;      
      
   }

}
function Descripcion(event){
   var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
   if (keyCode == 13) {
      document.jornadasdiarias.mDescripcion.select();
      document.jornadasdiarias.mDescripcion.focus();
      return false;
   }
   else
      return true;
}

function sTransporte(){

   if(document.getElementById("SinTransporte").checked){
      document.jornadasdiarias.sHoraSalida.value="";
      document.jornadasdiarias.sHoraSalida.disabled=true;
      document.jornadasdiarias.sIdPernocta.selectedIndex = -1;
      document.jornadasdiarias.sIdPernocta.disabled=true;
      document.jornadasdiarias.sIdEmbarcacion.selectedIndex = -1;
      document.jornadasdiarias.sIdEmbarcacion.disabled=true;
      document.jornadasdiarias.sIdPlataforma.selectedIndex = -1;
      document.jornadasdiarias.sIdPlataforma.disabled=true;
   }
   else{
      document.jornadasdiarias.sHoraSalida.value="00:00";
      document.jornadasdiarias.sHoraSalida.disabled=false;
      document.jornadasdiarias.sIdPernocta.disabled=false;
      document.jornadasdiarias.sIdEmbarcacion.disabled=false;
      document.jornadasdiarias.sIdPlataforma.disabled=false;
   }
   if(document.jornadasdiarias.sTipo.value=="Tiempo Inactivo"){
      document.jornadasdiarias.sHoraSalida.value="";
      document.jornadasdiarias.sHoraSalida.disabled=true;
      document.jornadasdiarias.sIdEmbarcacion.selectedIndex = -1;
      document.jornadasdiarias.sIdEmbarcacion.disabled=true;
      document.jornadasdiarias.sIdPlataforma.selectedIndex = -1;
      document.jornadasdiarias.sIdPlataforma.disabled=true;
      document.jornadasdiarias.sIdTipoMovimiento.disabled=false;
      //document.jornadasdiarias.sArea.value="";
      document.jornadasdiarias.sHoraLlegada.disabled = true;
      document.jornadasdiarias.sHoraLlegada.value = "";
      document.jornadasdiarias.sArea.disabled=false;
   }
}
function motivoTM(){
   if(document.jornadasdiarias.sTipo.value=="Disponibilidad del Sitio"){
      var inicio = document.jornadasdiarias.sHoraInicio.value;
      var hfinal = document.jornadasdiarias.sHoraFinal.value;
      var jornada = substractTimes(hfinal+":00",inicio+":00");
      var comp = compHora(jornada, document.getElementById("jornadasXdia").value+":00");
      var motivo = "";
      //alert(jornada+ " <-->" + document.getElementById("jornadasXdia").value+":00");
      if(comp=="menor"){
         while(motivo=="" || motivo=="undefined" ){
            motivo=prompt("Se detecto que no se completo la jornada del dia, escriba aqui el motivo:");
            //document.getElementById.("motivoTM").value=motivo;
            document.jornadasdiarias.motivo.value = motivo;
         }
         
         if(document.jornadasdiarias.motivo.value=="" || document.jornadasdiarias.motivo.value=="null"){
          	alert("Debe Especificar los motivos por el cual no se completo la jornada");  
		 }else{
			enviarForm();
		}          
      }
      else
          enviarForm();
   }
   else{
        enviarForm();
   }

}

</script>
<?php

   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
</head>
<body>
<center>
<input type='hidden' name='jornadasXdia' id='jornadasXdia' value="<?php echo $sJornadasParaElDia?>">
<input type='hidden' name='jornadaLaborada'  id='jornadaLaborada' value="<?php echo $sJornadasParaElDia?>">

<form name="jornadasdiarias" method="post" action="<?php echo ($_SESSION['Operacion'] == 'm')? 'actualizar.php':'insertar.php' ; ?>">
<input type='hidden' name='motivo' id='motivo' size=5 >
<table class='none' bgcolor=#6E6E6E>
<tr>
   <td bgcolor=#CCCEEE>
      <font size=1 >
        <center>
         <font color=#000055 size="3" >
           <b>
              <code>(PASO 1) Tipo de Afectación  </code>
        </center>  
   </td>
   <td bgcolor=#CCCEEE>
      <font size=1 >
        <center>
         <font color=#000055 size="3">
           <b>
            <code>(PASO 2) Horarios / Tiempo</code>
           </b>    
         </font>
        </center>  
    </td>
    <td bgcolor=#CCCEEE>
      <center>   
        <font color=#000055 size="3">
           <b>
              <code>(PASO 3) Cantidad de Personal</code>
           </b>    
        </font>
     </center> 
    </td>
    </tr>
    <tr>
         <td>
        Tipo de Afectacion 
        <?php
         if(isset($sTipo)){
            if($sTipo == 'Disponibilidad del Sitio'){
               $selDispo = "selected";
               $selMuerto="";
            }
            else{
               $selMuerto = "selected";
               $selDispo = "";
            }
         }
        ?>
        <select name='sTipo' onChange='Deshabilitar();' onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white'" onKeyPress='return tabulador(this.form,this,event);'  > 
            <option <?php echo $selDispo ?> value = 'Disponibilidad del Sitio'>Disponibilidad del Sitio</option>
            <option <?php echo $selMuerto ?> value = 'Tiempo Inactivo'>Tiempo Inactivo</option>
        </select>
      </font>
      <table border=2>
      <tr>
      <td width=400>
      <font color=#FF7F00>
         <ul>
            <li>
            </font>
            <font color=#2B5500>
            <b>Disponibilidad del Sitio:</b>
            </font>
            <font color=#FF7F00 size="0.1">
               Registro de los Horarios de Inicio y de Cierre de<br>Actividades de Una de las de Personal<br>en el Sitio De los Trabajos.
            </li>
            <li>
            </font>
            <font color=#2B5500 >
            <b>Tiempo Inactivo:</b>
            </font>
            <font color=#FF7F00 size="0.1">
               Todas las Jornadas Inactivas Ocurridas<br>en la orden de Trabajo.
            </li>

         </ul>
      </font>
      </td>
      </tr>
      </table>
   </td>
   <td>
  
      <table>

         <tr>
         <td>
               El Personal Pernocta en:
            </td>
            <td>            
               <?php
                  $sql ="SELECT sIdPernocta FROM pernoctan order by sIdPernocta";
                  $result = mysql_query($sql);
                  echo "<select name='sIdPernocta' onfocus=\"style.backgroundColor='#FFCC99'\" onblur=\"style.backgroundColor='white'\"  onKeyPress='return tabuladorText(this.form,this,event);'> ";
                   while($row = mysql_fetch_array($result)){
                     if($row[0] == $sIdPernocta)$seleccionar = "selected";
                     else $seleccionar = "";
                      echo "<option $seleccionar value = '$row[0]'>$row[0]</option>";
                  }
                  echo "</select>";
               ?>
            </td>
         </tr>
         <tr>
            <td>
               Hora de Salida
            </td>
            <td>
               <?php
                  if(isset($sHoraSalida))$value = $sHoraSalida ;
                  else $value = $sHoraSalida ;
                 // mensaje($sHoraSalida." - ".$value);
               ?>
               <input type="text" name="sHoraSalida" value='<?php echo $sHoraSalida ?>' maxlength=5 size=5 onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white'"  onKeyPress='return mascara(this.form,this,event);'>
               <input type="checkbox" id="SinTransporte" onChange=sTransporte()>Sin Transporte
            </td>
         </tr>
         <tr>
            <td>
               Embarcacion:
            </td>   
            <td>
               <?php
                  $sql ="SELECT sIdEmbarcacion,sDescripcion FROM embarcaciones WHERE sContrato='$sContrato' ";
                  $result = mysql_query($sql);
                  echo "<select name='sIdEmbarcacion' onfocus=\"style.backgroundColor='#FFCC99'\" onblur=\"style.backgroundColor='white'\"  onKeyPress='return tabulador(this.form,this,event);'>";
                  while($row = mysql_fetch_array($result)){
                  if($row[0] == $sIdEmbarcacion) $seleccionar ="selected";
                  else $seleccionar = "";
                   echo "<option $seleccionar value = '$row[0]'>$row[1]</option>";
                  }
               echo "</select>";
               ?>      
            </td>   
         </tr>
         <tr>
            <td>
               Plataforma:
            </td>
            <td>
               <?php
                  $sql ="SELECT o.sIdPlataforma,p.sDescripcion FROM ordenesdetrabajo o INNER JOIN plataformas p ON (o.sIdPlataforma=p.sIdPlataforma) WHERE sContrato='$sContrato' AND sNumeroOrden='".$_SESSION['sNumeroOrden']."';";
                  $result = mysql_query($sql);
                  if($row = mysql_fetch_array($result)){
                     $sIsPlataformaDefault = $row[0];
                  }
                  if($sIdPlataforma =="")$sIdPlataforma=$sIsPlataformaDefault;
                  
                  $sql ="SELECT sIdPlataforma,sDescripcion FROM plataformas order by sDescripcion";
                  $result = mysql_query($sql);
                  echo "<select name='sIdPlataforma' onfocus=\"style.backgroundColor='#FFCC99'\" onblur=\"style.backgroundColor='white'\"  onKeyPress='return tabuladorText(this.form,this,event);'>";
                  while($row = mysql_fetch_array($result)){
                        if($sIdPlataforma == $row['sIdPlataforma']) $seleccionar = "selected";
                        else $seleccionar = "";
                      echo "<option $seleccionar value = '$row[0]'>$row[1]</option>";
                  }
                  echo "</select>";
               ?>   
            </td>      
         </tr>
         <tr>
            <td>
               Hora de Llegada
            </td>
            <td>
               
               <input type="text" name="sHoraLlegada" value="<?php echo ($sHoraLlegada =="")?"00:00":$sHoraLlegada; ?>" maxlength=5 size=5 onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white'"  onKeyPress='return mascara(this.form,this,event);'>
            </td>
         </tr>
         <tr>
            <td>
               Inicio de Actividades
            </td>
            <td>   
               <input type="text" name="sHoraInicio" value="<?php echo ($sHoraInicio =="")?"00:00":$sHoraInicio;?>" maxlength=5 size=5 onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white'"  onKeyPress='return mascara(this.form,this,event);'>      
            </td>   
         </tr>
         <tr>
            <td>
               Cierre de Actividades
            </td>
            <td>   
               <input type="text" name="sHoraFinal" value="<?php echo ($sHoraFinal =="")?"00:00":$sHoraFinal;?>" maxlength=5 size=5 onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white'"  onKeyPress='return mascara(this.form,this,event);'>      
            </td>
         </tr>
         <tr>
            <td>
               Tiempo Inhabil por Alimentacion
            </td>
            <td>
               <input type="text" name="sTiempoComida" value="<?php echo ($sTiempoComida =="")?"00:00":$sTiempoComida;?>" maxlength=5 size=5 onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white'"  onKeyPress='return mascara(this.form,this,event);' >      
            </td>
         </tr>
      </table>
   </td>
   <td>
      <script>
//////////////
      </script>
      Personal que Inicia:
      <input type="text" name="dFrente" size=3 maxlength=3 value="<?php echo ($dFrente =="")?"0":$dFrente;?> " onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white'"   onKeyPress='return Descripcion(event);'>
   </td>
</tr>
<tr>
   <td colspan = "3"  bgcolor=#CCCEEE>
         <center>   
        <font color=#000055 size="3">
           <b>
              <code>(PASO 4) Inforamación General del Tiempo Inactivo / Disponibilidad del Sitio</code><br>
           </b>    
        </font>
     </center> 
      <br><!--bgcolor=#FFAA00-->
   </td>
   </tr>
   <tr>
   <td colspan=3>
      Clasificacion:
      <?php
         $sql ="SELECT sIdTipoMovimiento,sDescripcion FROM tiposdemovimiento WHERE sContrato='$sContrato' AND sClasificacion='Tiempo Muerto' ORDER BY sDescripcion";
         $result = mysql_query($sql);
         echo "<select name='sIdTipoMovimiento' onfocus=\"style.backgroundColor='#FFCC99'\" onblur=\"style.backgroundColor='white'\">  onKeyPress='return tabuladorText(this.form,this,event);'";
         while($row = mysql_fetch_array($result)){
              $seleccionar = ($row[0]==$sIdTipoMovimiento)?"selected":"";
              echo "<option $seleccionar value='$row[0]'>$row[1]</option>"; 
         }
         echo "</select>";
      ?>

      Area <input type="text" name="sArea" maxlength=35 value="<?php echo ($sArea =="")?"":$sArea;?> " onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white'" onKeyUp="document.jornadasdiarias.sArea.value=document.jornadasdiarias.sArea.value.toUpperCase()"  onKeyPress='return tabuladorText(event);'>
   <br>

      <center>
      Descripcion:<br>
      <textarea name="mDescripcion" cols=150 rows=5 onfocus="style.backgroundColor='#FFCC99'" onblur="style.backgroundColor='white'" onKeyUp="document.jornadasdiarias.mDescripcion.value=document.jornadasdiarias.mDescripcion.value.toUpperCase()"><?php echo ($mDescripcion =="")?"":$mDescripcion;?></textarea>
      </center>
   </td>
</tr>
<tr>
<td colspan=3>
   <center>
      <input type="button" value="Aceptar" onClick="motivoTM()">
      <input type="button" value="Cancelar" onClick="document.location='mostrar.php';">
   
   </center>
</td>
</tr>
</table>
</form>
<script language="javascript">
Deshabilitar();
document.jornadasdiarias.sTipo.focus();
</script>
</center>
</body>
</html>
