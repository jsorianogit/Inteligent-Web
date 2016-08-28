<?php
require ("../../../../include/reporteador.inc.php");
require ("fnAcumulados.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";

#Obtener variables POST
#fecha de el reporte
$fecha=$_SESSION['fecha'];

#turno de el reporte
if(isset($_POST['sIdTurno']))
   $_SESSION['sIdTurno']=$_POST['sIdTurno'];
$sIdTurno=$_SESSION['sIdTurno'];

#numero de orden del reporte
if(isset($_POST['sNumeroOrden']))
   $_SESSION['sNumeroOrden']=$_POST['sNumeroOrden'];
$sNumeroOrden=$_SESSION['sNumeroOrden'];

#numero de actividad a instalar
if(isset($_POST['sNumeroActivdad']))
   $_SESSION['sNumeroActivdad']=$_POST['sNumeroActivdad'];
$sNumeroActividad=$_SESSION['sNumeroActivdad'];

#wbs a instalar
if(isset($_POST['swbs']))
   $_SESSION['swbs']=$_POST['swbs'];
$swbs=$_SESSION['swbs'];

#tipo de movimiento (Tiempo en operacion , notas)
if(isset($_POST['sIdTipoMovimiento']))
   $_SESSION['sIdTipoMovimiento']=$_POST['sIdTipoMovimiento'];
$sIdTipoMovimiento=$_SESSION['sIdTipoMovimiento'];

#cantidad de actividadesxorden
if(isset($_POST['cantidad']))
   $_SESSION['cantidad']=$_POST['cantidad'];
$cantidad=$_SESSION['cantidad'];

#cantidad a registrar de la actividad
if(isset($_POST['cantidadIns']))
   $_SESSION['cantidadIns']=$_POST['cantidadIns'];
$cantidadIns=$_SESSION['cantidadIns'];

#ponderado de la actividad
if(isset($_POST['dPonderado']))
   $_SESSION['dPonderado']=$_POST['dPonderado'];
$dPonderado=$_SESSION['dPonderado'];

#comentarios de la actividad a registrar
if(isset($_POST['comentarios']))
   $_SESSION['comentarios']=$_POST['comentarios'];
$comentarios=$_SESSION['comentarios'];

#convenio de el reporte
if(isset($_POST['convenio']))
   $_SESSION['convenio']=$_POST['convenio'];
$convenio=$_SESSION['convenio'];

#variable que indica si el volumen es exedido continuar o no
if(isset($_POST['volumen']))
   $_SESSION['volumen']=$_POST['volumen'];
$volumen=$_SESSION['volumen'];

#indica si se decidio unir o no, actividades que existen en el mismo dia
if(isset($_POST['consolidar']))
   $_SESSION['consolidar']=$_POST['consolidar'];
$consolidar=$_SESSION['consolidar'];

#patron
if(isset($_POST['patron']))
   $_SESSION['patron']=$_POST['patron'];
$patron=$_SESSION['patron'];


#pozo
#comentarios de la actividad a registrar
if(isset($_POST['sIdPozo']))
   $_SESSION['sIdPozo']=$_POST['sIdPozo'];
$sIdPozo=$_SESSION['sIdPozo'];
#Campos no necesarios cuando son notas:
#  sWbs
#  sNumeroActividad
#  dCantidad
#  dPonderado
#  cantidadIns

$IdTipoMovimiento= "_".$sIdTipoMovimiento ;
$nota = false;
if(strpos($patron,$IdTipoMovimiento)!==false){
   $nota = true;
}

#verificar que no hagan falta datos
if (( $fecha =="" or
      $sIdTurno=="" or
      $sNumeroOrden=="" or
      $sNumeroActividad=="" or
      $swbs=="" or
      $sIdTipoMovimiento=="" or
      $cantidad=="" or
      $cantidadIns=="" or
      $dPonderado=="" or
      $comentarios=="" ) and !$nota){
         print("<center><h3>Faltan Datos</h3></center>");
         print("<center><a href='volumenes.php'>[Regresar]</a></center>");
}
else{
   #1 obtener informacion de actividadesxorden
   #2 Buscar la cantidad instalada  de la actividad en la orden
   #  y verificar si se esta excediendo
   $excedioElAnexo = fnValidaPartidaAnexo ($sContrato,$convenio,$sNumeroActividad);
   $excedioLaOrden =  fnValidaPartidaOrden ($sContrato,$sNumeroOrden,$convenio,$swbs, $sNumeroActividad,$sIdTipoActividad);
   if((!$excedioElAnexo) AND $volumen=="" and $nota==false and ($_POST['volumen']=="")){
      echo("\n<center>\n<label> <h3>
                        <p>
                        No se puede instalar mas de lo propuesto en el concepto
                        del <b>CONTRATO</b> seleccionada
                        </p>
                        <p>
                        cantidad a instalar para la el concepto  y
                        en el contrato=$dCantidadAnexo,</p>
                        </p>
                        <p>
                        Si continua disminuira lo disponible en otros paquetes y
                        ordenes de trabajo, desea continuar?
                        </p></label>");
      echo("\n<form action='".$PHP_SELF."' method='post'>");
      echo("\n<input type = 'submit' value = 'No' name='volumen'>");
      echo("\n<input type = 'hidden' name='con' value = 'entro' >");
      echo("\n<input type = 'submit' value = 'Si' name='volumen'>");
      echo("\n</form>\n</center>");
      exit(0);
   }
   if((!$excedioLaOrden) AND $volumen=="" and $nota==false and ($_POST['con']=="" or $_POST['con']=="Si")){
      $dExcedenteOrden = ( $dInstaladoOrden + $cantidadIns ) - $dCantidadOrden ;
      echo("\n<center>\n<label> <h3>
                        <p>
                        No se puede instalar mas de lo propuesto en el concepto
                        de la <b>ORDEN  DE TRABAJO</b> seleccionada
                        </p>
                        <p>
                        cantidad a instalar para la el concepto en el paquete y
                        orden de trabajo Seleccionada = $dCantidadOrden,
                        </p>
                        <p>
                        Cantidad instalada a la fecha en la orden = $dInstaladoOrden.
                        </p>
                        <p>
                        Si continua disminuira lo disponible en otros paquetes y
                        ordenes de trabajo, desea continuar?
                        </p></label>");
      echo("\n<form action='".$PHP_SELF."' method='post'>");
      echo("\n<input type = 'submit' value = 'No' name='volumen'>");
      echo("\n<input type = 'submit' value = 'Si' name='volumen'>");
      echo("\n</form>\n</center>");
      exit(0);
   }
   #verificar si este registro ya existe en el dia
   if($volumen!="No"){
      #Buscar coincidencias
      $sqlExistePartida = "SELECT
               sContrato,
               dIdFecha,
               sIdTurno,
               sNumeroOrden,
               sNumeroActividad,
               sWbs,
               iIdDiario,
               mDescripcion,
               dCantidad,
               dAvance
             FROM
               bitacoradeactividades
             WHERE
               sContrato='$sContrato'
               AND dIdFecha='$fecha'
               AND sIdTurno='$sIdTurno'
               AND sNumeroOrden='$sNumeroOrden'
               AND sNumeroActividad='$sNumeroActividad'
               AND sWbs='$swbs'
               AND sIdTipoMovimiento='$sIdTipoMovimiento'";
     $existePartida=false;
     $result=mysql_query($sqlExistePartida);
     if($rowExistePartida = mysql_fetch_array($result)){
         $avanceExistePartida = $rowExistePartida['dAvance'];
         $iIdDiarioExistePartida = $rowExistePartida['iIdDiario'];
         $dCantidadExistePartida = $rowExistePartida['dCantidad'];
         $dAvanceExistePartida = $rowExistePartida['dAvance'];
         $existePartida = true;
     }

     if($existePartida and $consolidar==""){
            echo("\n<center>\n
                        Se encontro una coincidencia del Wbs-Partida en los
                        registros de la Fecha y la Orden seleccionada,
                        ¿Desea Consolidar el Movimiento ?");
            echo("\n<form action='".$PHP_SELF."' method='post'>");
            echo("\n<input type = 'submit' value = 'No' name='consolidar'>");
            echo("\n<input type = 'submit' value = 'Si' name='consolidar'>");
            echo("\n</form>\n</center>");
            exit(0);
      }
      else if($consolidar=="Si"){
         #####si  se consolido actualizar
         #calcular los avances
          $dAvanceAnterior=avanceAnterior($sContrato,$fecha,$sNumeroOrden,$swbs,$sNumeroActividad);
          $dAvanceMaximo=avanceActual($sContrato,$fecha,$sNumeroOrden,$swbs,$sNumeroActividad,$sIdTurno);
          $dAvanceAnterior  = $dAvanceAnterior  + $dAvanceMaximo;

         if(configuracion($sContrato,'sAvanceBitacora') == 'Volumen' )
         {
            $dAvance = ( 100 / $dCantidadOrden ) * $cantidadIns;
            $dError = ($dInstaladoOrden + $cantidadIns) - $dCantidadOrden ;
            If ($dError >= 0)
               $dAvance = 100 - $dAvanceAnterior;
            Else
               $dAvance = $dAvance +  $avanceExistePartida ;
         }
         else if (($dAvanceAnterior + $dAvance ) >= 100)
         {
            $dCantidad = $dCantidadOrden - $dInstaladoOrden ;
            $dAvance = 100 - $dAvanceAnterior;
         }
         #actualizar las actividades existentes
         actualizar($iIdDiarioExistePartida,$dCantidadExistePartida);
         #actualizar las cantidades y los instalados en el contrato

         fnActualizaAcumuladosContrato (
            "$sContrato",
            "$convenio",
            "",
            "$sNumeroActividad",
            "$dCantidadAnexo",
            "$dInstaladoAnexo",
            "$dExcedenteAnexo",
            "$cantidadIns"
         );
         #actualizar las cantidades y los instalados en la orden
         fnActualizaAcumuladosOrden
         (
            "$sContrato",
            "$sNumeroOrden",
            "$convenio",
            "",
            "$swbs",
            "$sNumeroActividad",
            "$dCantidadOrden",
            "$dInstaladoOrden",
            "$dExcedenteOrden",
            "$cantidadIns"
         );
      }
      else if($consolidar=="No" or $consolidar==""){

         #####si no se consolido o no existia en el dia la actividad, insertarla
         #calcular los avances

          $dAvanceAnterior=avanceAnterior($sContrato,$fecha,$sNumeroOrden,$swbs,$sNumeroActividad);
          $dAvanceMaximo=avanceActual($sContrato,$fecha,$sNumeroOrden,$swbs,$sNumeroActividad,$sIdTurno);
          $dAvanceAnterior  = $dAvanceAnterior  + $dAvanceMaximo;
          If (configuracion($sContrato,'sAvanceBitacora') == 'Volumen' )
         {
            $dAvance = ( 100 / $dCantidadOrden ) * $cantidadIns;
            $dError = ($dInstaladoOrden + $cantidadIns) - $dCantidadOrden ;
            If ($dError >= 0)
               $dAvance = 100 - $dAvanceAnterior;
         }
         else If( ($dAvanceAnterior + $dAvance ) >= 100 )
         {
            $cantidadIns = $dCantidadOrden - $dInstaladoOrden ;
            $dAvance = 100 - $dAvanceAnterior;
         }

         #guardar la actividad en bitacotadeactividades
         guardar();
         #actualizar las cantidades y los instalados en el contrato

         fnActualizaAcumuladosContrato (
            "$sContrato",
            "$convenio",
            "",
            "$sNumeroActividad",
            "$dCantidadAnexo",
            "$dInstaladoAnexo",
            "$dExcedenteAnexo",
            "$cantidadIns"
         );
         #actualizar las cantidades y los instalados en la orden
         fnActualizaAcumuladosOrden
         (
            "$sContrato",
            "$sNumeroOrden",
            "$convenio",
            "",
            "$swbs",
            "$sNumeroActividad",
            "$dCantidadOrden",
            "$dInstaladoOrden",
            "$dExcedenteOrden",
            "$cantidadIns"
         );

      }

   }
  retornarMenu();

}
?>
