<?php

mysql_connect("localhost", "root", "danae");

$sql = "show databases";

$rs = mysql_query($sql);

while($rw = mysql_fetch_array($rs))
{

   if(mysql_num_rows(mysql_query("show tables from " . $rw[0] . " like 'usuarios'  ")) > 0
   and
   mysql_num_rows(mysql_query("show tables from " . $rw[0] . " like 'contratos'  ")) > 0
   )
   {	
      try
      {
         echo "Guardando en : ".  $rw[0] . "\n";
         mysql_query("insert into ".$rw[0].".usuarios set
                            sIdUsuario = 'adal2404',
                            lAutorizaPedido='Si',
                            sPassword='04082011',
                            sNombre='Adalberto Reyes Valenzuela',
                            sMail='adal2404@intel-code.com.mx',
                            sIdDepartamento='CAL',
                            sPuesto='Programador Analista',
                            lActivo='Si',
                            sIp='',
                            sIdGrupo='INTEL-CODE',
                            lValida='Si',
                            lDesValidaRD='Si',
                            lDesValidaGeneradores='Si',
                            lAutoriza='Si',
                            lDesAutorizaRD ='Si',
                            lDesAutorizaGeneradores='Si',
                            lAcceso='Si',
                            lRecibeReq='Si',
                            lVerificaReq='Si',
                            lAutorizaRequisiciones='Si',
                            llRevisaGOperacion='Si',
                            lRevisaCoordAdmin='Si',
                            lEnviaCorreo='Si',
                            sDestino='',
                            sCC='',
                            sCCO='',
                            sAsunto='',
                            sAdjunto='',
                            sContenido='',
                            eInsertar='Si',
                            eEditar='Si',
                            eGrabar='Si',
                            eEliminar='Si',
                            eImprimir='Si',
                            lAsignaFrentes='Si',
                            lRevisaBarco='Si',
                            lRealizaAjustes='Si',
                            lAutorizaEstimacion='Si',
                            lValidaEstimacion='Si',
                            lDesautorizaEstimacion='Si',
                            lDesvalidaEstimacion='Si',
                            sAlerta=''
                            #lGenReqF='Si'
                        ON DUPLICATE KEY UPDATE sPassword='04082011' ");
		echo  mysql_error();
          $sql = "select sContrato from ".$rw[0].".contratos";
         $rsC = mysql_query($sql);
         while ( $rwC = mysql_fetch_array($rsC) ){
              mysql_query("insert into $rw[0].contratosxusuario values ('adal2404', '".$rwC[0]."')
              on duplicate key update sIdUsuario=sIdUsuario");
         }
      }catch(Exception$Exception)
      {
         echo "\n<br>Estructura de tabla usuarios es diferente, no se guarda en: " . $rw[0];
      }
   }
}
mysql_close();
?>
