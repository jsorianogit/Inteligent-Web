<?php

require("../jornadas/functions.php");//sqls.php
require("../../../../include/mysql.inc.php");
require("funciones.php");

#__________________________Iniciando el proceso de validacion de reportes diarios
$sContrato=/*'428237819';//*/(isset($_REQUEST['sContrato']))?$_REQUEST['sContrato']:$_POST['sContrato'] ; //'428236843';
$sNumeroOrden =/*'428237819-CI';//*/(isset($_REQUEST['sNumeroOrden']))?$_REQUEST['sNumeroOrden']:$_POST['sNumeroOrden']; //'428236843';
$sIdTurno = /*'A';//*/(isset($_REQUEST['sIdTurno']))?$_REQUEST['sIdTurno']:$_POST['sIdTurno']; //'A';
$sIdConvenio=/*'A-01';//*/(isset($_REQUEST['sIdConvenio']))?$_REQUEST['sIdConvenio']:$_POST['sIdConvenio'] ;//'A-03';
$dIdFecha=/*'2007-08-20';//*/(isset($_REQUEST['dIdFecha']))?$_REQUEST['dIdFecha']:$_POST['dIdFecha'] ;//'2007-06-13';
$lStatus=/*'Pendiente';//*/(isset($_REQUEST['lStatus']))?$_REQUEST['lStatus']:$_POST['lStatus'] ;//'2007-06-13';

$sIdUsuarioValida = (isset($_POST['sIdUsuarioValida']))?$_POST['sIdUsuarioValida']:$_SESSION['ssUsuario'];
$sPassword=(isset($_POST['sPassword']))?$_POST['sPassword']:'';
$Aceptar=(isset($_POST['aceptar']))?$_POST['aceptar']:NULL;

if($lStatus == "Validado" or $lStatus == "Autorizado"){
   mensaje("Ya ha sido validado o Autorizado : Contrato: $sContrato - Numero de Orden: $sNumeroOrden - Feha: $dIdFecha ");
   location("../?sNumeroOrden=$sNumeroOrden");
   exit(0);
}


#__________________________Verificar el tipo de seguridad
$sql = "SELECT sTipoSeguridad FROM configuracion WHERE sContrato='$sContrato'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   if($row[0]=="Avanzada" AND !isset($Aceptar)){
   ?>
      <script>
        var url = "FormValida.php?sContrato=<?php echo $sContrato ?>&sNumeroOrden=<?php echo $sNumeroOrden ?>&sIdTurno=<?php echo $sIdTurno ?>&sIdConvenio=<?php echo $sIdConvenio ?>&dIdFecha=<?php echo $dIdFecha ?>&lStatus=<?php echo $lStatus ?>";
        window.open(url,"Valida","width=300,height=150,scrollbars=NO,Top=300,Left=450");
      </script>
      <center>
      <h3>Es necesario la autenficacion para realizar esta accion<h3><br>
      </center>   
   <?php
   exit(0);
   }

   if(isset($sIdUsuarioValida) and isset($sPassword) and isset($Aceptar) and $Aceptar!="")
   {
      $sql = "SELECT u.sIdUsuario FROM usuarios u INNER JOIN contratosxusuario c ON (u.sIdUsuario = c.sIdUsuario AND u.lValida='Si')
              WHERE c.sContrato='$sContrato' AND u.sPassword='$sPassword' AND u.sIdUsuario='$sIdUsuarioValida'";
      $result_user = mysql_query($sql);

      if(!$row_user = mysql_fetch_array($result_user)){
         mensaje("El nombre de usuario y/o contraseña son incorrectos o no tiene permitido el acceso al contrato");
            if(isset($_POST['aceptar']) and $_POST['aceptar']=="Aceptar")
               echo "<script>window.close()</script>";
            else
               location("../?sNumeroOrden=$sNumeroOrden");
         exit(0);
      }
   }
   
}

#__________________________Verificar que el usuario tenga permisos para validar el reporte diario
      $sql="SELECT u.lValida FROM usuarios u WHERE u.sIdUsuario='$sIdUsuarioValida '";
      $result_user = mysql_query($sql);
      if($row_user = mysql_fetch_array($result_user)){
         if($row_user[0]!="Si"){
            mensaje("No tiene Permitido Validar");
            if(isset($_POST['aceptar']) and $_POST['aceptar']=="Aceptar")
               echo "<script>window.close()</script>";
            else
               location("../?sNumeroOrden=$sNumeroOrden");
            exit(0);
         }
      }
      
#__________________________Proceso
echo "<br><center><h3>Espere...</h3></center>";

#--1: Primero Elimino todo de la Bitacora de Paquetes de ese dia ...
mysql_query("DELETE FROM bitacoradepaquetes
             WHERE sContrato='$sContrato' AND sIdConvenio='$sIdConvenio'
             AND sNumeroOrden='$sNumeroOrden' AND dIdFecha='$dIdFecha'");
if(mysql_error())mensaje(mysql_error());

#--2: Inserccion de todos los paquetes en 0 a la fecha seleccionada ....
 $sql = "SELECT sContrato,sIdConvenio,'$dIdFecha' as dIdFecha, sNumeroOrden,sWbs,sNumeroActividad,0
        FROM actividadesxorden 
        WHERE sContrato = '$sContrato' AND sIdConvenio='$sIdConvenio' AND sNumeroOrden='$sNumeroOrden' AND sTipoActividad='Paquete'";
$result = mysql_query($sql);
if(mysql_error())mensaje("29: ".mysql_error());
while($row = mysql_fetch_array($result)){
   $sql ="INSERT INTO bitacoradepaquetes 
          (sContrato,sIdConvenio,dIdFecha,sNumeroOrden,sWbs,sNumeroActividad,dAvance)
         VALUES('".$row['sContrato']."','".$row['sIdConvenio']."','".$row['dIdFecha']."','".$row['sNumeroOrden']."','".$row['sWbs']."','".$row['sNumeroActividad']."','0')";
   mysql_query($sql);
   if(mysql_error())mensaje("29.1: ".mysql_error());
}


#--3: Inicia Proceso de Reajuste de Paquetes ....bitacora de alcances

AjustaBitacoraAlcances ($sContrato,$sNumeroOrden,$sIdTurno,$dIdFecha);


#--4: Inicia Proceso de Reajuste de Paquetes ....bitacora de actividades:
AjustaBitacoraActividades ($sContrato,$sNumeroOrden,$sIdTurno,$sIdConvenio,$dIdFecha);

#--5:
$sql = "UPDATE bitacoradepaquetes SET dAvance = dAvance / 100
         WHERE sContrato = '$sContrato' And dIdFecha = '$dIdFecha' And sIdConvenio = '$sIdConvenio'
         And sNumeroOrden = '$sNumeroOrden'";
mysql_query($sql);

if(mysql_error())mensaje("38: ".mysql_error());

# --6: Primero Elimino todo de la Bitacora de Paquetes de ese dia ...

$sql = "Delete from bitacoradepaquetes where sContrato = '$sContrato'
            And sIdConvenio = '$sIdConvenio'
            And sNumeroOrden = ''
            And dIdFecha = '$dIdFecha';";
mysql_query($sql);
if(mysql_error())mensaje("39: ".mysql_error());

#--7: Avances del Contrato ....
$sql ="Insert Into bitacoradepaquetes (sContrato, sIdConvenio, dIdFecha, sNumeroOrden, sWbs, sNumeroActividad, dAvance)
       Select sContrato, sIdConvenio, '$dIdFecha', '', sWbs, sNumeroActividad, 0
       From actividadesxanexo
       Where sContrato = '$sContrato' And sIdConvenio = '$sIdConvenio' And sTipoActividad = 'Paquete'";
mysql_query($sql);

if(mysql_error())mensaje("40: ".mysql_error());

#--8: llama el p rocedimiento de ajusta contrato
ajustaContrato($sContrato, $sIdConvenio, $dIdFecha) ;

#--9:
$sql = "UPDATE bitacoradepaquetes SET dAvance = dAvance / 100
        WHERE sContrato = '$sContrato' And dIdFecha = '$dIdFecha' And sIdConvenio = '$sIdConvenio'
        And sNumeroOrden = '' ";
mysql_query($sql);
if(mysql_error())mensaje("41: ".mysql_error());

#--10: Determino la jornada a laborar en el dia ...
$sql= " select iJornada from ordenesdetrabajo Where sContrato='$sContrato' and sNumeroOrden='$sNumeroOrden'";
$result = mysql_query($sql);
if(mysql_error())mensaje("42: ".mysql_error());
if($row = mysql_fetch_array($result)){
   $iJornadaxOrden = $row['iJornada'];
}
if($iJornadaxOrden == 0 ){
   $iJornadas = Jornadas();
   $JornadasxDia = JornadasDia($_SESSION['dIdFecha'],$iJornadas);
}
else
   $JornadasxDia = $iJornadaxOrden;
#Crear formato en horas de las jornadas de trabajo
if($JornadasxDia < 10)
   $sJornada = "0$JornadasxDia:00";
else
   $sJornada = "$JornadasxDia:00";

#--11: Proceso para actualizacion de avances ...

$CantidadDeOrdenes = 0;
$sql= " select count(sNumeroOrden) as dTotal from ordenesdetrabajo Where sContrato='$sContrato'";
$result = mysql_query($sql);
if(mysql_error())mensaje("43: ".mysql_error());
if($row = mysql_fetch_array($result)){
   $CantidadDeOrdenes = $row['dTotal'];
}
If ($CantidadDeOrdenes > 1 )
   AvancesHistorico ($sContrato, $sNumeroOrden, $sIdConvenio, $sIdTurno, $dIdFecha, True );
Else
   AvancesHistorico ($sContrato, $sNumeroOrden, $sIdConvenio, $sIdTurno, $dIdFecha, False ) ;
#--12:
   //este paso esta incluido en la funcion AvancesHistoricos();
#--13: Actualizo los avances globales de todos reportes del dia ....
   //este paso esta incluido en la funcion AvancesHistoricos();
#--14: Termino de Identificar la Jornada
$sql =" select * from turnos where sContrato='$sContrato' and sIdTurno='$sIdTurno';";
$result = mysql_query($sql);
if(mysql_error())mensaje("44: ".mysql_error());
if($row = mysql_fetch_array($result)){
   $sOrigenTierra = $row['sOrigenTierra'];
}

if($sOrigenTierra == "No" ){
   InicializaJornadas( $sContrato, $sNumeroOrden, $sIdTurno, $sJornada, $dIdFecha ) ;
   ActualizaJornadas ( $sContrato, $sNumeroOrden,$dIdFecha ) ;
}
$sql = "select sNumeroReporte from reportediario where sContrato='$sContrato'
and sNumeroOrden='$sNumeroOrden' and dIdFecha='$dIdFecha' and sIdTurno='$sIdTurno'
and sIdConvenio='$sIdConvenio' and sIdTurno='$sIdTurno'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $sNumeroReporte=$row[0];
}
#--15: Termina Proceso de Actualizacion de Avances ......
$sql ="insert Into kardex_sistema (sContrato, sIdUsuario, dIdFecha, sHora, sDescripcion, lOrigen)
      Values ('$sContrato', '$sIdUsuarioValida', '".date('Y-m-d')."','".date('H:i:s')."','Validación del Reporte Diario No. $sNumeroReporte VALIDA $sIdUsuarioValida','Reporte Diario')";
   mysql_query($sql);

mensaje("Ha finalizado la operacion !!");

if(isset($_POST['aceptar']) and $_POST['aceptar']=="Aceptar")
   echo "<script>window.close()</script>";
else
   location("../?sNumeroOrden=$sNumeroOrden");

?>
