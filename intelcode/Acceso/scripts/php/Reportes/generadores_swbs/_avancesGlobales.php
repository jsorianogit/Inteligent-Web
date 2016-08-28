<?php
/*
CONTRATO
;complemento del reporte diario de avances globales x orden y del contrato
;esta es una correccion al calculo de los avances, anteriormente, 
;se hacia solo de las avancesglobales y avancesglobalesxorden
;ahora se usan esas dos incluyendo la tabla reportediario
*/
$dAvanceRealObraAnterior ="0.00";
$dAvanceRealObraActual   ="0.00";
$dAvanceRealObraAcum     ="0.00";
$dAvanceProgObraAnterior ="0.00";
$dAvanceProgObraActual   ="0.00";
$dAvanceProgObraAcum     ="0.00";
$sql = "select
				dAvProgAnteriorContrato,
				dAvProgActualContrato,
				dAvRealAnteriorContrato,
				dAvRealActualContrato
         from
            reportediario
           Where
            sContrato = '$sContrato'
            and sNumeroOrden='$sNumeroOrden'
            And sIdTurno = '$sIdTurno'
            AND dIdFecha='$dIdFecha'
            And lStatus <> 'Pendiente'";
$rs = mysql_query($sql);
if($row = mysql_fetch_array($rs)){
	   $dAvanceRealObraAnterior =$row['dAvRealAnteriorContrato'];
	   $dAvanceRealObraActual   =$row['dAvRealActualContrato'];
	   $dAvanceRealObraAcum     =$dAvanceRealObraAnterior+$dAvanceRealObraActual;
	   
	   $dAvanceProgObraAnterior =$row['dAvProgAnteriorContrato'];
	   $dAvanceProgObraActual   =$row['dAvProgActualContrato'];
	   $dAvanceProgObraAcum     =$dAvanceProgObraActual+$dAvanceProgObraAnterior;
}
else{
	$sql="
	select
   	#--avance Real Anterior de la Obra
      @dAvanceRealObraAnterior:=(
         select sum(dAvance) as dAvance
         from avancesglobalesxorden
         where sContrato = '$sContrato' and sNumeroOrden = '' and dIdFecha < '$dIdFecha' and sIdConvenio = '$sIdConvenio'
         group by sContrato
      ) as dAvanceRealObraAnterior,

	   #--avance real actual de la obra
      @dAvanceRealObraActual:=(
         Select sum(dAvance) as dAvance
         from avancesglobalesxorden
         where sContrato = '$sContrato' and sNumeroOrden = '' and dIdFecha = '$dIdFecha' and sIdConvenio = '$sIdConvenio'
         group by sContrato
      ) as dAvanceRealObraActual,
   	#--avance acumulado real de la obra
	   FORMAT((@dAvanceRealObraActual + @dAvanceRealObraAnterior ),4) as dAvanceRealObraAcum ,

   	#--avance programado anterior de la obra
      @dAvanceProgObraAnterior:=(
         Select sum(dAvancePonderadoDia) as dAvance
         from avancesglobales
         where sContrato = '$sContrato' and sNumeroOrden = '' and dIdFecha < '$dIdFecha' and sIdConvenio ='$sIdConvenio'
         group by sContrato
      ) as dAvanceProgObraAnterior,
	   #--avamce programado actual de la obra
      @dAvanceProgObraActual:=(
         Select sum(dAvancePonderadoDia) as dAvance
         from avancesglobales
         where sContrato = '$sContrato' and sNumeroOrden = '' and dIdFecha = '$dIdFecha' and sIdConvenio = '$sIdConvenio'
         group by sContrato) as dAvanceProgObraActual,
	   #--avance programado acumulado de la obra
	   FORMAT((@dAvanceProgObraActual + @dAvanceProgObraAnterior),4) as dAvanceProgObraAcum";

	$rs = mysql_query($sql);
	if($row = mysql_fetch_array($rs)){
	   $dAvanceRealObraAnterior =$row['dAvanceRealObraAnterior'];
	   $dAvanceRealObraActual   =$row['dAvanceRealObraActual'];
	   $dAvanceRealObraAcum     =$row['dAvanceRealObraAcum'];
	   $dAvanceProgObraAnterior =$row['dAvanceProgObraAnterior'];
	   $dAvanceProgObraActual   =$row['dAvanceProgObraActual'];
	   $dAvanceProgObraAcum     =$row['dAvanceProgObraAcum'];
	}
}
/*
ORDENES DE TRABAJO
;complemento del reporte diario de avances globales x orden y del contrato
;esta es una correccion al calculo de los avances, anteriormente, 
;se hacia solo de las avancesglobales y avancesglobalesxorden
;ahora se usan esas dos incluyendo la tabla reportediario
*/
   $dAvProgAnteriorOrden = 0.0000;
   $dAvProgActualOrden = 0.0000;
   $dAvRealAnteriorOrden = 0.0000;
   $dAvRealActualOrden = 0.0000;
   #si el status <> autorizado, tomar de reportediario
   #si no,tomar de avances globales
   $sql = "select
            dAvProgAnteriorOrden,
            dAvProgActualOrden,
            dAvRealAnteriorOrden,
            dAvRealActualOrden
           from
            reportediario
           Where
            sContrato = '$sContrato'
            and sNumeroOrden='$sNumeroOrden'
            And sIdTurno = '$sIdTurno'
            AND dIdFecha='$dIdFecha'
            And lStatus <> 'Pendiente'";
   $rs = mysql_query($sql);
   if($row = mysql_fetch_array($rs)){
          $dAvProgAnteriorOrden = $row['dAvProgAnteriorOrden'];
          $dAvProgActualOrden = $row['dAvProgActualOrden'];
          $dAvRealAnteriorOrden = $row['dAvRealAnteriorOrden'];
          $dAvRealActualOrden = $row['dAvRealActualOrden'];
   }
   else{
      #avance programado anterior de la orden
      $sql ="select sum(dAvancePonderadoDia) as dAvProgAnteriorOrden
            from avancesglobales
            where
               sContrato = '$sContrato'
               and sNumeroOrden = '$sNumeroOrden'
               and dIdFecha < '$dIdFecha'
               and sIdConvenio = '$sIdConvenio'
            group by sContrato";
      $rs = mysql_query($sql);

      if($row = mysql_fetch_array($rs)){
         $dAvProgAnteriorOrden = $row['dAvProgAnteriorOrden'];
      }
      #avance programado actual de la orden
      $sql ="select sum(dAvancePonderadoDia) as dAvProgActualOrden
            from avancesglobales
            where
               sContrato = '$sContrato'
               and sNumeroOrden = '$sNumeroOrden'
               and dIdFecha = '$dIdFecha'
               and sIdConvenio = '$sIdConvenio'
            group by sContrato";
      $rs = mysql_query($sql);
      if($row = mysql_fetch_array($rs)){
         $dAvProgActualOrden = $row['dAvProgActualOrden'];
      }
      #avance real anterior de la orden
      $sql ="select sum(dAvance) as dAvRealAnteriorOrden
            from avancesglobalesxorden
            where sContrato = '$sContrato'
               and sNumeroOrden = '$sNumeroOrden'
               and dIdFecha < '$dIdFecha'
               and sIdConvenio = '$sIdConvenio'
               and sIdTurno = '$sIdTurno'
            group by sContrato ";
          /*  
         $file = fopen("queryAvanceOrdenProgAnt.sql","a+");
      fwrite($file,$sql."\n\n");
      fclose($file);
      */
      $rs = mysql_query($sql);
      if($row = mysql_fetch_array($rs)){
         $dAvRealAnteriorOrden = $row['dAvRealAnteriorOrden'];
      }
      #avance real anterior de la orden
      $sql ="select sum(dAvance) as dAvRealActualOrden
            from avancesglobalesxorden
            where
               sContrato =  '$sContrato'
               and sNumeroOrden = '$sNumeroOrden'
               and dIdFecha = '$dIdFecha'
               and sIdConvenio = '$sIdConvenio'
               and sIdTurno = '$sIdTurno'
            group by sContrato ";
      $rs = mysql_query($sql);
      if($row = mysql_fetch_array($rs)){
         $dAvRealActualOrden = $row['dAvRealActualOrden'];
      }
   }
   #acumulados
   $dAvProgAcumOrden = $dAvProgActualOrden + $dAvProgAnteriorOrden;
   $dAvRealAcumOrden = $dAvRealAnteriorOrden + $dAvRealActualOrden;
   
	$dAvanceRealOrdenAnterior 		=$dAvRealAnteriorOrden;
	$dAvanceRealOrdenActual 		=$dAvRealActualOrden ;
	$dAvanceRealOrdenAcum			=$dAvRealAcumOrden;
	
	$dAvanceProgOrdenAnterior 		=$dAvProgAnteriorOrden;
	$dAvanceProgOrdenActual			=$dAvProgActualOrden;
	$dAvanceProgOrdenAcum 			=$dAvProgAcumOrden;

?>