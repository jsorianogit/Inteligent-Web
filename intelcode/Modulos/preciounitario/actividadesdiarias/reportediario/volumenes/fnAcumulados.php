<?php
#actualiza acumulados del contrato
function fnActualizaAcumuladosContrato ($sContrato,$sIdConvenio,$sOpcion,$sNumeroActividad,$dCantidadInstalar,$dInstalado,$dExcedente,$dCantidad)
{
         if($sOpcion == 'Eliminar'){
              if ($dExcedente > 0)
                  if ($dExcedente > $dCantidad){
                     $dExcedente= $dExcedente - $dCantidad;
                  }
                  Else{
                     $dCantidadInstalar= $dCantidadInstalar - ( $dCantidad - $dExcedente ) ;
                     $dExcedente=0;
                  }
              Else{
                  $dCantidadInstalar=$dInstalado - $dCantidad ;
                  $dExcedente=0 ;
              }
         }
         else If ($dExcedente <= 0){
                  $dCantidadInstalar = $dInstalado + $dCantidad;
                  $dExcedente = 0 ;
             }

     $sql="UPDATE actividadesxanexo SET
               dInstalado = '$dCantidadInstalar',
               dExcedente = '$dExcedente'
            WHERE
               sContrato = '$sContrato'
               And sIdConvenio = '$sIdConvenio'
               And sNumeroActividad = '$sNumeroActividad'
               And sTipoActividad = 'Actividad'";
      if( mysql_query($sql) )
         return  True;
      else
         return false;

}
#actualiza acumulados de la orden
function fnActualizaAcumuladosOrden ($sContrato,$sNumeroOrden,$sIdConvenio,$sOpcion, $sWbs, $sNumeroActividad ,$dCantidadInstalar, $dInstalado,$dExcedente, $dCantidad)
{

        if ($sOpcion == 'Eliminar'){
              if ($dExcedente > 0 ){
                  If ($dExcedente > $dCantidad)
                  {
                     $dExcedente =  $dExcedente - $dCantidad;
                  }
                  Else
                  {
                     $dCantidadInstalar = $dCantidadInstalar - ( $dCantidad - $dExcedente ) ;
                     $dExcedente = 0 ;
                  }
              }
              Else
              {
                  $dCantidadInstalar =  $dInstalado - $dCantidad ;
                  $dExcedente = 0 ;
              }
        }
        Else
            If ($dExcedente <= 0) {
               $dCantidadInstalar = $dInstalado + $dCantidad ;
               $dExcedente = 0;
            }
      $sql = "UPDATE actividadesxorden SET
               dInstalado = '$dCantidadInstalar',
               dExcedente = '$dExcedente'
             where
                sContrato = '$sContrato'
                And sIdConvenio = '$sIdConvenio'
                And sNumeroOrden = '$sNumeroOrden'
                And sWbs = '$sWbs'
                And sNumeroActividad = '$sNumeroActividad'
                And sTipoActividad = 'Actividad'";
      if( mysql_query($sql) )
         return True;
      else
         return false;

}
#valida si se excedio de la cantidad anexo
function fnValidaPartidaAnexo ($sContrato,$sIdConvenio,$sNumeroActividad)
{
    global $dExcedenteAnexo;
    global $dInstaladoAnexo;
    global $dCantidadAnexo;
    global $cantidadIns;

    $dExcedenteAnexo = 0 ;
    $dInstaladoAnexo = 0 ;
    $dCantidadAnexo = 0 ;
    $sql = "Select
               (dInstalado + dExcedente) as dInstalado,
               dCantidadAnexo
           from
               actividadesxanexo
           where
               sContrato = '$sContrato'
               And sIdConvenio = '$sIdConvenio'
               And sNumeroActividad = '$sNumeroActividad'
               And sTipoActividad = 'Actividad'";
   $rs = mysql_query($sql);
   if($row = mysql_fetch_array($rs))
   {
      $dInstaladoAnexo = $row['dInstalado'];
      $dCantidadAnexo =  $row['dCantidadAnexo'] ;
      $dError = ($dInstaladoAnexo + $cantidadIns)  ;
      $dError = $dError - $dCantidadAnexo ;
        If ( $dError > 0)
        {
            $dExcedenteAnexo = ( $dInstaladoAnexo + $cantidadIns ) - $dCantidadAnexo ;
            return false ;
        }
        Else
           return true;
    }
    Else
       return False ;
}
#valida si se excedio de la cantidad de la orden
function fnValidaPartidaOrden ($sContrato,$sNumeroOrden,$sIdConvenio,$sWbs, $sNumeroActividad,$sIdTipoActividad)
{
    global $dExcedenteOrden;
    global $dInstaladoOrden;
    global $dCantidadOrden;
    global $cantidadIns;

    $dExcedenteOrden = 0 ;
    $dInstaladoOrden = 0 ;
    $dCantidadOrden = 0 ;

   $sql = "Select
               (dInstalado + dExcedente) as dInstalado ,
               dCantidad
          from actividadesxorden
          where
               sContrato = '$sContrato'
               And sIdConvenio = '$sIdConvenio'
               And sNumeroOrden = '$sNumeroOrden'
               And sWbs = '$sWbs'
               And sNumeroActividad = '$sNumeroActividad'
               And sTipoActividad = 'Actividad'";
   $rs = mysql_query($sql);
   if($row = mysql_fetch_array($rs))
   {
      $dInstaladoOrden = $row['dInstalado'] ;
      $dCantidadOrden = $row['dCantidad'] ;
      $dError = ($dInstaladoOrden + $cantidadIns)  ;
      $dError = $dError - $dCantidadOrden ;
         If ( $dError > 0)
         {
            $dExcedenteOrden = ( $dInstaladoOrden + $cantidadIns) - $dCantidadOrden ;
            return False;
         }
         else
            return True;
    }
    else
         return False;
}


#devuelve el avance anterior existente en las fechas anteriores
function avanceAnterior($sContrato,$dIdFecha,$sNumeroOrden,$sWbs,$sNumeroActividad){
   $sql ="SELECT Sum(dAvance) as Avance
          FROM bitacoradeactividades
          WHERE
            sContrato = '$sContrato'
             and dIdFecha < '$dIdFecha'
             And sNumeroOrden = '$sNumeroOrden'
             and sWbs = '$sWbs'
             and sNumeroActividad = '$sNumeroActividad'
          Group By sContrato";
   $rs = mysql_query($sql);
   if($row = mysql_fetch_array($rs)){
      return $dAvanceAnterior = $row[0];
   }
   else
      return 0;
}
#devuelve el avance existente en el dia
function avanceActual($sContrato,$dIdFecha,$sNumeroOrden,$sWbs,$sNumeroActividad,$sIdTurno){
  $sql = "SELECT Sum(dAvance) as Avance
           FROM bitacoradeactividades
           where
               sContrato = '$sContrato'
              and dIdFecha = '$dIdFecha'
              And sNumeroOrden = '$sNumeroOrden'
              and sWbs = '$sWbs'
              and sNumeroActividad = '$sNumeroActividad'
           Group By sContrato";
      //and sIdTurno < '$sIdTurno'
   $rs = mysql_query($sql);
   if($row = mysql_fetch_array($rs)){
     return $dAvanceMaximo = $row[0];
   }
   else
      return 0;
}

#devuelve true si el tipo de movimiento es de Nota
function TipoMovimiento($sIdTipoMovimiento){
   global $sContrato;
   $sql = " SELECT
               sClasificacion
            FROM
               tiposdemovimiento
            WHERE
               sContrato='$sContrato'
               AND sIdTipoMovimiento='$sIdTipoMovimiento'";
   $result = mysql_query($sql);
   if($row = mysql_fetch_array($result))
      $sClasificacion = $row['sClasificacion'];

   if($sClasificacion == 'Notas')
      return true;
   else
      return false;
}

#Guardar Nuevo Registro
function guardar(){
   $error=false;
   mysql_query("{");
   global $fecha,$sIdTurno,$sNumeroOrden,$sNumeroActividad,$swbs,$sIdTipoMovimiento;
   global $cantidad,$cantidadIns,$dPonderado,$comentarios,$dAvance,$sContrato;
   global $convenio,$dExcedente,$sIdPozo;
   #Asegurarse que la cantidad, el wbs, el avance, y otras variables sean nulas
   #si el movimiento es nota
   if(TipoMovimiento($sIdTipoMovimiento)){
      $cantidad=$cantidadIns=$dPonderado=$dAvance=$dExcedente=0;
      $swbs=$sNumeroActividad='';
   }
   #verificar si existe el campo sIdPozo en bitacoradeactividades
   $existe = false;
   $sql = "describe bitacoradeactividades";
   $rs  = mysql_query($sql);
   while($rw = mysql_fetch_array($rs)){
   	$sCampo = $rw["Field"];
   	if($sCampo == "sIdPozo"){
   		$existe = true;
   		break;
   	}
   }
   if($existe){
		$insertField  = ",sIdPozo";
		$insertValue = ",'$sIdPozo'";
	   $updateField = ",sIdPozo = '$sIdPozo'";
 
   }
   #Leer el siguiente idDiario
   $sql="SELECT
            MAX(iIdDiario)
         FROM
            bitacoradeactividades
         WHERE
            sContrato='$sContrato'
            and dIdFecha='$fecha'";
   $result = mysql_query($sql);
   if($row = mysql_fetch_array($result)){
      $iIdDiario = $row[0];
      $iIdDiario = $iIdDiario + 1;
   }
   #insertar el movimiento
   $sql ="INSERT INTO bitacoradeactividades
            (
               iIdDiario,
               sContrato,
               dIdFecha,
               sIdTurno,
               sNumeroOrden,
               sNumeroActividad,
               sWbs,
               sIdTipoMovimiento,
               dCantidad,
               mDescripcion,
               dAvance
               $insertField 
            )
         VALUES (
            $iIdDiario,
            '$sContrato',
            '$fecha',
            '$sIdTurno',
            '$sNumeroOrden',
            '$sNumeroActividad',
            '$swbs',
            '$sIdTipoMovimiento',
            '$cantidadIns',
            '$comentarios',
            '$dAvance'
            $insertValue
         )";
   mysql_query($sql);
   if(mysql_error()){$error=true; mensaje("Error: ".mysql_error());}

   if($error==true){
         mysql_query("rollback");
         mensaje("Error no se Guarda el Registro");
   }
   else{

      mysql_query("commit");
   }

}

#Actualizar Registro
function actualizar($iIdDiarioExistePartida,$dCantidadExistePartida){
   $error=false;
   mysql_query("begin");
   global $fecha,$sIdTurno,$sNumeroOrden,$sNumeroActividad,$swbs,$sIdTipoMovimiento;
   global $cantidad,$cantidadIns,$dPonderado,$comentarios,$dAvance,$sContrato;
   global $convenio;
   #Actualizar en bitacoradeactividades

   $sql ="UPDATE bitacoradeactividades SET
            dCantidad='".($cantidadIns+$dCantidadExistePartida)."' ,
            dAvance='$dAvance' ,
            mDescripcion='$mDescripcion'
         WHERE
            sContrato='$sContrato'
            AND dIdFecha='$fecha'
            AND sIdTurno='$sIdTurno'
            AND sNumeroOrden='$sNumeroOrden'
            AND sNumeroActividad='$sNumeroActividad'
            AND sWbs='$swbs'
            AND sIdTipoMovimiento='$sIdTipoMovimiento'
            AND iIdDiario='$iIdDiarioExistePartida'
         LIMIT 1";
   $result = mysql_query($sql);
   if(mysql_error())$error=true ;

   if($error==true){
         mysql_query("rollback");
         mensaje("Error no se Actualiza el Registro");
   }
   else{
      mysql_query("commit");
   }
}
#regresa al menu de volumenes de notas y obras
function retornarMenu(){
   $_SESSION['consolidar']="";
   $_SESSION['volumen']="";
   echo "<script language='javascript'>location.href='volumenes.php'</script>";
}
?>
