<?php
   $lPoder = true;
   mysql_query("begin");
   $usuarioValida = ($_SESSION['usuarioVGenerador']=="")?$_SESSION['ssUsuario']:$_SESSION['usuarioVGenerador'];
   $sql = "Update estimaciones SET
         lStatus ='Autorizado',
         sIdUsuarioAutoriza = '$usuarioValida'
        Where
         sContrato ='$sContrato'
         And sNumeroOrden = '$sNumeroOrden'
         And iNumeroEstimacion = '$iNumeroEstimacion'
         And sNumeroGenerador = '$sNumeroGenerador'";


   queryTransaccion($sql);
   // Actualizo Kardex del Sistema ....
   $SQLkardex = "Insert Into kardex_sistema (sContrato, sIdUsuario, dIdFecha, sHora, sDescripcion, lOrigen)
                 Values (
                     '$sContrato',
                     '$usuarioValida',
                     '".date("Y-m-d")."',
                     '".date("h:i:s")."',
                     'Autorización del Generador No. [$sNumeroGenerador] de la Orden [$sNumeroOrden]. AUTORIZA $usuarioValida ',
                     'Generadores'
                  )";

   queryTransaccion($SQLkardex);
#ejcutar transaccion
$finalizado = true;
    if($_SESSION['errorTransaccion']!=true){
       mysql_query("commit");
       $_SESSION['errorTransaccion']="";
       $finalizado = true;
    }
    else{
      mysql_query("rollback");
      $_SESSION['errorMySql'];
      $_SESSION['errorTransaccion']="";
      $finalizado = false;
    }
?>
