<?php
require ("../../../../include/reporteador.inc.php");
require ("../avanceFisico.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";

   //idDiario Real
   function IdReal($aIdba,$idAct,$conId,$continua,$iIdDiario,$fecha,$sNumeroOrden){
      global $sContrato;
   }
  //Busca si existe un registro en bitacoradeactividades
 function idDuplicado($sNumeroOrden,$fecha,$sNumeroActividad,$sWbs,$sIdTipoMovimiento){
   global $sContrato;
   $sql ="SELECT iIdDIario,sIdTipoMovimiento FROM bitacoradeactividades WHERE sContrato='$sContrato' AND sNumeroOrden='$sNumeroOrden' AND dIdFecha='$fecha'
               AND sNumeroActividad='$sNumeroActividad' AND sWbs='$sWbs' ";
   $result = queryTransaccion($sql);
   while($row = mysql_fetch_array($result))
         $a[$row[0]] = $row[1];
   if(count($a)>0)
      return $a;
   else
      return false;
 }

  //id diario de bitacora de actividades
 function idDiario($sContrato,$sNumeroOrden,$fecha){
   $sql="SELECT MAX(iIdDiario) as iIdDiario FROM bitacoradeactividades WHERE sContrato='$sContrato'  AND dIdFecha='$fecha' ";
   $result = queryTransaccion($sql);
   if($row = mysql_fetch_array($result)){
      $iIdDiarioBA = $row[0];
      if($iIdDiarioBA==0)$iIdDiarioBA=1;
      else $iIdDiarioBA = $iIdDiarioBA + 1;
   }
   return  $iIdDiarioBA;
 }
#Obtiene el total instalado en el dia
function instaladoDia($sNumeroActividad,$swbs,$sNumeroOrden,$fecha,$iFase){
   global $sContrato;
   $dCantidadDeFase=0;
   $sql = "SELECT SUM(dCantidad) FROM bitacoradealcances
           WHERE sContrato='$sContrato' AND sNumeroActividad='$sNumeroActividad'
           AND sWbs='$swbs'  AND sNumeroOrden='$sNumeroOrden' AND dIdFecha='$fecha'
           AND iFase='$iFase' ";
   $result = queryTransaccion($sql);
   if($row = mysql_fetch_array($result))
      $dCantidadDeFase = $row[0];
   return $dCantidadDeFase;
}

#calcula el avance de la partida
 function avancePartida($Complemento,$AcumuladoFaseX,$cantidad,$iFases,$CantActOrden,$iFase){
 global $sContrato;
 global $sNumeroActividad;
 global $fecha;
 global $sNumeroOrden;
 global $swbs;
 global $sIdTurno;
 global $convenio ;

   #obtener avance de la fase de la actividad
   $dAvanceAlcance=$iFases;
   $sql = "SELECT
            dAvance
           FROM
            alcancesxactividad
           WHERE
            sContrato = '$sContrato'
            And sNumeroActividad = '$sNumeroActividad'
            And iFase = '$iFase'";
   $rs = queryTransaccion($sql);
   if($row = mysql_fetch_array($rs)){
      $dAvanceAlcance = $row['dAvance'];
   }
   $dAvanceAnterior=0;
   #obtener el avance anterior de la actividad
   $sql = "SELECT
              Sum(dAvance) as Avance
           FROM bitacoradeactividades
           WHERE
            sContrato = '$sContrato'
            and dIdFecha < '$fecha'
            And sNumeroOrden = '$sNumeroOrden'
            and sWbs = '$swbs'
            and sNumeroActividad = '$sNumeroActividad'
           Group By sContrato; ";
   $rs = queryTransaccion($sql);
   if($row = mysql_fetch_array($rs)){
      $dAvanceAnterior = $row['Avance'];
   }
   #obtener el avance de el dia actual de la actividad
   $sql = " SELECT
               sum(dAvance) as Avance
            FROM bitacoradeactividades
            WHERE
               sContrato = '$sContrato'
               and dIdFecha = '$fecha'
               and sIdTurno < '$sIdTurno'
               and sNumeroOrden = '$sNumeroOrden'
               and sWbs = '$swbs'
               and sNumeroActividad = '$sNumeroActividad'
            Group By sContrato; ";//
   $rs = queryTransaccion($sql);
   if($row = mysql_fetch_array($rs)){
      $dAvanceAnterior =$dAvanceAnterior+$row['Avance'];
   }

   #obtener el avance de el dia actual de la actividad
   $sqlActividadesIgulales = "SELECT
                     a.sWbsAnterior,
                     a.sWbs,
                     a.sNumeroActividad,
                     a.mDescripcion,
                     a.dCantidad,
                     a.dInstalado,
                     a.dExcedente,
                     a.dPonderado,
                     a.sMedida,
                     (a.dCantidad - a.dInstalado) as dRestante
               FROM actividadesxorden a
               WHERE
                     a.sContrato = '$sContrato'
                     And a.sNumeroOrden = '$sNumeroOrden'
                     And a.sIdConvenio = '$convenio'
                     And a.sNumeroActividad = '$sNumeroActividad'
                     And a.sTipoActividad = 'Actividad'
               Order By a.iItemOrden";
   $rs = queryTransaccion($sqlActividadesIgulales);
   if($rowActividadesIgulales = mysql_fetch_array($rs)){
      $dCantidadActividadesIguales =$rowActividadesIgulales['dCantidad'];
   }
   $sql = "Select
               Sum(dCantidad) as dCantidad,
               Sum(dAvance) as dAvance
            From bitacoradealcances
            Where
               sContrato = '$sContrato'
               And sWbs = '$swbs'
               And sNumeroActividad = '$sNumeroActividad'
               and sNumeroOrden='$sNumeroOrden'
               And iFase = '$iFase'
            Group By sContrato";
     $rs = queryTransaccion($sql);
     if($row = mysql_fetch_array($rs)){
         $dCantAcumFase=$row['dCantidad'];
         $dAvAcumFase=$row['dAvance'];
     }
   $dCantidadAjuste = $Complemento;// + $dCantAcumFase;

   $dAvancePartidaDia = ( $dAvanceAlcance / 100 ) * ( ( 100 * $dCantidadAjuste) / $dCantidadActividadesIguales ) ;
   $dError = ($dCantAcumFase  + $dCantidadAjuste ) - $dCantidadActividadesIguales ;
 /*
   if ($dError >= 0){
     $dAvancePartidaDia = $dAvanceAlcance - $dAvAcumFase ;
   }
 if (($dAvanceAnterior + $dAvancePartidaDia ) >= 100)  {
     $dAvancePartidaDia = 100 - $dAvanceAnterior ;
   }
*/

 if ($dError >= 0){
   if($dAvanceAlcance>=$dAvAcumFase)
        $dAvancePartidaDia = $dAvanceAlcance - $dAvAcumFase ;
 }
 if (($dAvanceAnterior + $dAvancePartidaDia ) >= 100)  {
      if($dAvanceAnterior<=100)
        $dAvancePartidaDia = 100 - $dAvanceAnterior ;
      else
        $dAvancePartidaDia = 0;
   }


/*
echo "<br><br>::dAvanceAlcance = $dAvanceAlcance <br> :::dAvAcumFase $dAvAcumFase";
echo   "<br>:::dCantidadAjuste: ".$dCantidadAjuste = $Complemento;// + $dCantAcumFase;
echo   "<br>:::dAvanceAlcance: ".$dAvanceAlcance;
echo   "<br>:::dAvanceAlcance: ".$dCantidadActividadesIguales;
echo   "<br>:::dError:  ".$dError;
*/
//echo   "<br>:::dAvancePartidaDia:  ".$dAvancePartidaDia;
   return $dAvancePartidaDia;
 }

 #Obtiene el total instalado hasta la fecha
 function acumuladoInstalado($sNumeroActividad,$swbs,$sNumeroOrden,$fecha,$iFase){
   global $sContrato;
   $dCantidadDeFase=0;
   $sql = "SELECT SUM(dCantidad) FROM bitacoradealcances  
           WHERE sContrato='$sContrato' AND sNumeroActividad='$sNumeroActividad'  
           AND sWbs='$swbs'  AND sNumeroOrden='$sNumeroOrden' AND dIdFecha<='$fecha'
           AND iFase='$iFase' "; 
   $result = queryTransaccion($sql);
   if($row = mysql_fetch_array($result))
      $dCantidadDeFase = $row[0];
   return $dCantidadDeFase; 
}


//Guardar Nuevo Registro
function guardar(){
   $error=false;
   $_SESSION['errorTransaccion']="";
   $_SESSION['errorTransaccion']="";
   mysql_query("begin");
   global $sTipoAlcance,$sTipoOperacion;
   global $fecha,$sIdTurno,$sNumeroOrden,$sNumeroActividad,$swbs;
   global $cantidad,$cantidadIns,$dPonderado,$comentarios,$dAvance,$sContrato;
   global $convenio  ,$dExcedente,$iFase,$sReferencia;
   $controlador = 0;
   $iIdDiario=-1;
   if(trim($sReferencia)==trim("PRESS F2 PARA HISTORICO"))
      $sReferencia="SIN REFERENCIA";
   #idDiario's de bitacoradeactividades
   $aIdba = idDuplicado($sNumeroOrden,$fecha,$sNumeroActividad,$swbs,'A');
   
   #Obtener la cantidad de Actividadesxorden
   $sql ="SELECT
            dCantidad
         FROM actividadesxorden
         WHERE
            sContrato='$sContrato'
            AND sNumeroOrden='$sNumeroOrden'
            AND sNumeroActividad='$sNumeroActividad'
            AND sWbs='$swbs'
            AND sIdConvenio='$convenio';";
   $result = queryTransaccion($sql);
   if($row = mysql_fetch_array($result)){
      $dCantidadActividadesxOrden = $row[0];
   }

   #Obtener las fases para ese numero de actividad
   $sql ="SELECT
            *
          FROM
            alcancesxactividad
          WHERE
            sContrato='$sContrato'
            AND sNumeroActividad='$sNumeroActividad';";
   $result=queryTransaccion($sql);
   while($row = mysql_fetch_array($result)){
      $iFases[$row['iFase']]=$row['dAvance'];
   }

   #leer el acumulado de la fase seleccionada
   $AcumuladoFaseSel =acumuladoInstalado($sNumeroActividad,$swbs,$sNumeroOrden,$fecha,$iFase);
   $TotalFaseSel  = $AcumuladoFaseSel + $cantidadIns;
   
   #obtener el calculo de cada fase
   $idAct = 0;
   $conId = 0;
   $continua=-1;

   for($i=1; $i<=$iFase; $i++){

      $Complemento = 0;
      $AcumuladoFaseX =acumuladoInstalado($sNumeroActividad,$swbs,$sNumeroOrden,$fecha,$i);

      #obtener la cantidad a instalar
      if($TotalFaseSel > $AcumuladoFaseX)
         $Complemento = $TotalFaseSel - $AcumuladoFaseX;


      #obtener el avance
      $instaladoDia = instaladoDia($sNumeroActividad,$swbs,$sNumeroOrden,$fecha,$i);
      $dAvance = avancePartida($Complemento,$instaladoDia,$cantidad,$iFases[$i], $dCantidadActividadesxOrden,$i);

      #crear las consultas
      #Obtener el Id Diario
      $sql = "SELECT
               iIdDiario
             FROM
               bitacoradealcances
             WHERE
               sContrato='$sContrato'
               AND dIdFecha='$fecha'
               AND sNumeroActividad='$sNumeroActividad'
               AND sNumeroOrden='$sNumeroOrden'
               AND sWbs='$swbs'
               AND sIdTurno='$sIdTurno'
               AND iFase='$i' ";
      $result = queryTransaccion($sql);
      if($row = mysql_fetch_array($result)){
         $Diario = $row[0] ;//$idAct;
      }
      else{
         $Diario = idDiario($sContrato,$sNumeroOrden,$fecha) ;
      }
      #insertar alcances en bitacora de alcances
      $sql ="INSERT INTO bitacoradealcances (
               iIdDiario,
               sContrato,
               dIdFecha,
               sIdTurno,
               sNumeroOrden,
               sNumeroActividad,
               sWbs,
               dCantidad,
               mDescripcion,
               dAvance,
               iFase,
               sReferencia
            )
            VALUES (
            '$Diario',
            '$sContrato',
            '$fecha',
            '$sIdTurno',
            '$sNumeroOrden',
            '$sNumeroActividad',
            '$swbs',
            '$Complemento',
            '$comentarios',
            '$dAvance',
            '$i',
            '$sReferencia'
            )
            ON DUPLICATE KEY
            UPDATE
               dCantidad=dCantidad+$Complemento,
               dAvance='$dAvance' ,
               sReferencia ='$sReferencia' ";

	   $insertoAlcance = false;
      if($Complemento>0){
         queryTransaccion($sql);
         $insertoAlcance = true;
      }
      else{
      	$insertoAlcance = false;
         $file =fopen("alcancesMonitoreo.txt","a+");
         fwrite($file,"No se ejecuto: \n$sql");
         fclose($file);
      }

      //GuardaQuery($sql,"BitacoraAlcaces.log",true);

      if($_SESSION['errorTransaccion']==true){$error=true ;mensaje("Error al actualizar los registros, comuniquelo al administrador o envie un correo a adal2404@intel-code.com.mx");}
      #insertar alcances en bitacora de actividades
      $sql ="INSERT INTO bitacoradeactividades (
               iIdDiario,
               sContrato,
               dIdFecha,
               sIdTurno,
               sNumeroOrden,
               sNumeroActividad,
               sWbs,
               dCantidad,
               mDescripcion,
               dAvance,
               sIdTipoMovimiento,
               lAlcance           
           )
           VALUES (
           '$Diario',
           '$sContrato',
           '$fecha',
           '$sIdTurno',
           '$sNumeroOrden',
           '$sNumeroActividad',
           '$swbs',
           0,
           '$comentarios',
           '$dAvance',
           '$sTipoAlcance',
           'NO'
           ) ON DUPLICATE KEY UPDATE
           dAvance='$dAvance' ;";

      //if($Complemento>0){
      if($insertoAlcance){ 
         queryTransaccion($sql);
      }
      else{
         $file =fopen("alcancesMonitoreo.txt","a+");
         fwrite($file,"No se ejecuto: \n$sql");
         fclose($file);
      }

      //GuardaQuery($sql,"BitacoraActividades.log",true);

      if($_SESSION['errorTransaccion']==true){$error=true ;mensaje("Error al actualizar los registros, comuniquelo al administrador o envie un correo a adal2404@intel-code.com.mx");}

      #insertar la fase terminal en bitacora de actividades como volumen
      if($i == count($iFases)){
         
         #Obtener el Id Diario
         $sql = "SELECT
                  iIdDiario
                FROM
                  bitacoradeactividades
                WHERE
                  sContrato='$sContrato'
                  AND dIdFecha='$fecha' 
                  AND sNumeroActividad='$sNumeroActividad'
                  AND sNumeroOrden='$sNumeroOrden'
                  AND sWbs='$swbs'
                  AND sIdTurno='$sIdTurno'
                  AND sIdTipoMovimiento='$sTipoOperacion'
                  AND  lAlcance='SI' ";
         $result = queryTransaccion($sql);
         if($row = mysql_fetch_array($result)){
            $Diario = $row[0] ;
         }
         else{
            $Diario = idDiario($sContrato,$sNumeroOrden,$fecha) ;
         }

         $sql ="INSERT INTO bitacoradeactividades (
                  iIdDiario,
                  sContrato,
                  dIdFecha,
                  sIdTurno,
                  sNumeroOrden,
                  sNumeroActividad,
                  sWbs,
                  dCantidad,
                  mDescripcion,
                  dAvance,
                  sIdTipoMovimiento,
                  lAlcance                 
              )
              VALUES (
               $Diario,
               '$sContrato',
               '$fecha',
               '$sIdTurno',
               '$sNumeroOrden',
               '$sNumeroActividad',
               '$swbs',
               '$Complemento',
               '$comentarios',
               '0',
               '$sTipoOperacion',
               'SI')
               ON DUPLICATE KEY UPDATE
               dCantidad=dCantidad+$Complemento,
               dAvance='0';";

      	//if($Complemento>0)
      	if($insertoAlcance)queryTransaccion($sql);
         if($_SESSION['errorTransaccion']==true){$error=true ;mensaje("Error al actualizar los registros, comuniquelo al administrador o envie un correo a adal2404@intel-code.com.mx");}       

         $file =fopen("bitacoradeactividade.txt","a+");
         fwrite($file,"\nNo se ejecuto instalacion: \n$sql");
         fclose($file);
         
         #actualizar actividadesxorden
         $sql = "SELECT
                  dInstalado,
                  dExcedente,
                  dCantidad
                FROM
                  actividadesxorden
                WHERE
                  sContrato='$sContrato'
                  AND sWbs='$swbs'
                  AND sNumeroOrden='$sNumeroOrden'
                  AND sNumeroActividad='$sNumeroActividad'
                  AND sIdConvenio='$convenio'";
         $result=queryTransaccion($sql);
         if($row = mysql_fetch_array($result)){
            $dInstaladoActual = $row[0];
            $dExcedenteActual = $row[1];
            $dCantidad = $row[2];
/*            if(($dInstaladoActual  + $cantidadIns)>$dCantidad){
               $dExcedenteActual = ($cantidadIns -$dCantidad)+ $dInstaladoActual ;
               $dInstaladoActual = $dCantidad;
            }*/
            if(($dInstaladoActual + $dExcedenteActual + $cantidadIns)>$dCantidad){
               $dExcedenteActual = ($dInstaladoActual + $dExcedenteActual + $cantidadIns) -$dCantidad;
               $dInstaladoActual = $dCantidad;
            }

            else{
               $dInstaladoActual = $dInstaladoActual + $cantidadIns;
               $dExcedenteActual = 0 ;
            }     
         }  
         $sql="UPDATE
                  actividadesxorden
              SET
                  dInstalado = '$dInstaladoActual',
                  dExcedente ='$dExcedenteActual'
              WHERE
               sContrato='$sContrato'
               AND sWbs='$swbs'
               AND sNumeroOrden='$sNumeroOrden'
               AND sNumeroActividad='$sNumeroActividad'
               AND sIdConvenio='$convenio'
               AND sTipoActividad='Actividad'
               LIMIT 1 ;";
         queryTransaccion($sql);
         if($_SESSION['errorTransaccion']==true){$error=true ;mensaje("Error al actualizar los registros, comuniquelo al administrador o envie un correo a adal2404@intel-code.com.mx");}
         #actualizar actividadesxanexo
         $sql = "SELECT
                  dInstalado,
                  dExcedente,
                  dCantidadAnexo
                 FROM
                  actividadesxanexo
                 WHERE
                  sContrato='$sContrato'
                  AND sWbs='$swbs'
                  AND sNumeroActividad='$sNumeroActividad'
                  AND sIdConvenio='$convenio'
                  AND sTipoActividad='Actividad'";
         $result=queryTransaccion($sql);
         if($row = mysql_fetch_array($result)){
            $dInstaladoActual = $row['dInstalado'];
            $dExcedenteActual = $row['dExcedente'];
            $dCantidad = $row['dCantidadAnexo'];

            /*if(($dInstaladoActual + $cantidadIns)>$dCantidad){
               $dExcedenteActual = ($cantidadIns -$dCantidad)+ $dInstaladoActual ;
               $dInstaladoActual = $dCantidad;
            }*/
            if(($dExcedenteActual + $dInstaladoActual + $cantidadIns)>$dCantidad){
               $dExcedenteActual = ($dExcedenteActual + $dInstaladoActual + $cantidadIns)-$dCantidad;
               $dInstaladoActual = $dCantidad;
            }

            else{
               $dInstaladoActual = $dInstaladoActual + $cantidadIns;
               $dExcedenteActual = 0 ;
            }
         }
         $sql ="UPDATE actividadesxanexo SET
                  dInstalado = '$dInstaladoActual',
                  dExcedente ='$dExcedenteActual'
            WHERE
                  sContrato='$sContrato'
                  AND sWbs='$swbs'
                  AND sNumeroActividad='$sNumeroActividad'
                  AND sIdConvenio='$convenio'
                  AND sTipoActividad='Actividad'
            LIMIT 1 ;";
         queryTransaccion($sql);
         if($_SESSION['errorTransaccion']==true){$error=true ;mensaje("Error al actualizar los registros, comuniquelo al administrador o envie un correo a adal2404@intel-code.com.mx");}

      }
   }
   if($_SESSION['errorTransaccion']==true){
      mysql_query("rollback");
      mensaje("Error en la Operación : ".$_SESSION['errorMySql']." , Intentelo de Nuevo");
   }
   else{mysql_query("commit");/*mysql_query("commit");*/}

   avanceFisico ($sContrato,sNumeroOrden,$convenio,$sIdTurno,$fecha) ;
}

function retornarMenu(){
   $_SESSION['consolidar']="";
   $_SESSION['volumen']="";
   echo "<script language='javascript'>location.href='alcances.php'</script>";
   //print("<center><a href='volumenes.php'>[Regresar]</a></center>");
}
//Obtener variables POST
#fecha
$fecha=$_SESSION['fecha'];
#turno
if(isset($_POST['sIdTurno']))
   $_SESSION['sIdTurno']=$_POST['sIdTurno'];
$sIdTurno=$_SESSION['sIdTurno'];
#numero de orden
if(isset($_POST['sNumeroOrden']))
   $_SESSION['sNumeroOrden']=$_POST['sNumeroOrden'];
$sNumeroOrden=$_SESSION['sNumeroOrden'];
#numero de actividad
if(isset($_POST['sNumeroActivdad']))
   $_SESSION['sNumeroActivdad']=$_POST['sNumeroActivdad'];
$sNumeroActividad=$_SESSION['sNumeroActivdad'];
#sWbs
if(isset($_POST['swbs']))
   $_SESSION['swbs']=$_POST['swbs'];
$swbs=$_SESSION['swbs'];
#fase
if(isset($_POST['iFase']))
   $_SESSION['iFase']=$_POST['iFase'];
$iFase=$_SESSION['iFase'];
#cantidad
if(isset($_POST['cantidad']))
   $_SESSION['cantidad']=$_POST['cantidad'];
$cantidad=$_SESSION['cantidad'];
#cantidad a instalar
if(isset($_POST['cantidadIns']))
   $_SESSION['cantidadIns']=$_POST['cantidadIns'];
$cantidadIns=$_SESSION['cantidadIns'];
#ponderado de la actividad
if(isset($_POST['dPonderado']))
   $_SESSION['dPonderado']=$_POST['dPonderado'];
$dPonderado=$_SESSION['dPonderado'];
#comentarios de la actividad
if(isset($_POST['comentarios']))
   $_SESSION['comentarios']=$_POST['comentarios'];
$comentarios=$_SESSION['comentarios'];
#referencia
if(isset($_POST['sReferencia']))
   $_SESSION['sReferencia']=$_POST['sReferencia'];
$sReferencia=$_SESSION['sReferencia'];
#volumen ()verifica si ya existia la partida
if(isset($_POST['volumen']))
   $_SESSION['volumen']=$_POST['volumen'];
$volumen=$_SESSION['volumen'];
#convenio
if(isset($_POST['convenio']))
   $_SESSION['convenio']=$_POST['convenio'];
$convenio=$_SESSION['convenio'];
#cheka si se desea consolidar
if(isset($_POST['consolidar']))
   $_SESSION['consolidar']=$_POST['consolidar'];
$consolidar=$_SESSION['consolidar'];

$sql =" select  sTipoAlcance,sTipoOperacion from configuracion where sContrato='$sContrato';";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $sTipoAlcance=$row[0];
   $sTipoOperacion=$row[1];
}
#verificar si hacen falta datos
if ($fecha =="" or $sIdTurno=="" or
      $sNumeroOrden=="" or $sNumeroActividad=="" or
         $swbs=="" or $iFase=="" or $cantidad=="" or
            $cantidadIns=="" or $dPonderado=="" ){
               print("<center><h3>Faltan Datos</h3></center>");
               print("<center><a href='alcances.php'>[Regresar]</a></center>");
}
else{
   #Buscar numero de actividades a instalar
   #contrato
   $sql = "SELECT
               dCantidadAnexo,
               dInstalado,
               dExcedente
           FROM
               actividadesxanexo
           WHERE
               sContrato='$sContrato'
               AND sNumeroActividad='$sNumeroActividad'
               AND sWbs='$swbs'
               AND sIdConvenio='$convenio'
               AND sTipoActividad='Actividad'";
   $result=mysql_query($sql);
   if($row = mysql_fetch_array($result)){
      $dCantidadContrato=$row['dCantidadAnexo'];
      $dInstaladoContrato=$row['dInstalado'];
      $dExcedenteContrato=$row['dExcedente'];
   }
   $AinstalarMasInstaladoContrato=$dInstaladoContrato+$dExcedenteContrato+$cantidadIns;
   #orden
   $sql = "SELECT
               dCantidad,
               dInstalado,
               dExcedente
           FROM
               actividadesxorden
           WHERE
               sContrato='$sContrato'
               AND sNumeroOrden='$sNumeroOrden'
               AND sNumeroActividad='$sNumeroActividad'
               AND sWbs='$swbs'
               AND sIdConvenio='$convenio'
               AND sTipoActividad='Actividad'";
   $result=mysql_query($sql);
   if($row = mysql_fetch_array($result)){
      $dCantidad = $row[0];
      $AinstalarMasInstalado =($row[1]+$row[2]+$cantidadIns);
      if( (($AinstalarMasInstalado > $cantidad) or ($AinstalarMasInstaladoContrato > $cantidad) ) AND $volumen==""){
         $dExcedente =$AinstalarMasInstalado - $cantidad ;
         echo ("\n<center>\n<b>No se puede asignar una cantidad mayor a la estipulada
                            en el contrato vigente<br><br>
                            <table bgcolor='blue'>
                            <tr><td bgcolor='black'><font color='white' size='1.5px'>Cantidad a Instalar segun la <b>Contrato</b></td><td align='right'>$dCantidadContrato</td></tr>
                            <tr><td bgcolor='black'><font color='white' size='1.5px'>Cantidad Instalada en el <b>contrato</b></td><td align='right'>".($dInstaladoContrato+$dExcedenteContrato)."</td></tr>
                            <tr><td bgcolor='black'><font color='white' size='1.5px'>Cantidad a Instalar segun la <b>Orden</b></td><td align='right'>$dCantidad</td></tr>
                            <tr><td bgcolor='black'><font color='white' size='1.5px'>Cantidad Instalada en la <b>orden</b></td><td align='right'>".($row[1]+$row[2])."</td></tr>
                            <tr><td bgcolor='black'><font color='white' size='1.5px'><b>Cantidad que se desea instalar</b></td><td align='right'>$cantidadIns</td></tr>
                            </table>
                            <br>si continua se creara un volumen adicional,
                            desea Continuar ?</b>");
         echo ("\n<form action='".$PHP_SELF."' method='post'>");
         echo ("\n<input type = 'submit' value = 'No' name='volumen'>");
         echo ("\n<input type = 'submit' value = 'Si' name='volumen'>");
         echo ("\n</form>\n</center>");
         exit(0);
      }
   }

   if($_POST['volumen']!='No'){
      guardar();
   }
   retornarMenu();

}


?>
