<?php

function infoContratoGerencial($sContrato,$sIdConvenio){
#$sContrato='428237819';
#$sIdConvenio='A-01';
global $pdf;
$sql = "SELECT
   co.sContrato as Contrato,
   co.mDescripcion as Descripcion,
   co.sUbicacion as Ubicacion,
   co.mCliente as Cliente,
   c.sDescripcion as DescripcionConvenio,
   c.dMontoMN AS dModificado,
   c.dFechaInicio AS dFechaInicioM,
   c.dFechaFinal AS dFechaFinalM,
   DATEDIFF(c.dFechaFinal, c.dFechaInicio) AS Duracion,
   (SELECT dMontoMN FROM convenios WHERE sContrato='$sContrato' AND sIdConvenio='') AS original,
   (SELECT dFechaInicio FROM convenios WHERE sContrato='$sContrato' AND sIdConvenio='') AS dFechaInicioO,
   (SELECT dFechaFinal FROM convenios WHERE sContrato='$sContrato' AND sIdConvenio='') AS dFechaFinalO,
        CASE (p.sPoliza IS NULL)
            WHEN 0 THEN
               p.sPoliza
            ELSE
                'SIN POLIZA DE SEGURO POR RESPONSABILIDAD CIVIL'
        END
    AS Poliza,
        CASE (p.sFianza IS NULL)
            WHEN 0 THEN
               p.sFianza
            ELSE
                'SIN FIANZA DE CUMPLIMIENTO'
        END
    AS Fianza
FROM
   contratos co
   INNER JOIN
   convenios c
   ON (co.sContrato=c.sContrato)
   LEFT JOIN
   polizas p
   ON (p.sContrato=co.sContrato AND p.dFechaInicio <= '' AND p.dFechaFinal >= '')
WHERE
   co.sContrato='$sContrato' AND
   c.sIdConvenio='$sIdConvenio';";
   $rs = mysql_query($sql);
   $SepEntreLineas=2.5;
   if($row = mysql_fetch_array($rs)){
      $yInicial = $pdf->getY();


      #INFORMACION DEL CONTRATO

      #titulo de la tabla de contrato
      #amarillo
      $pdf->SetFillColor(255,255,128);
/*      #morado
      $pdf->SetFillColor(189,184,248);
      #cafe
     $pdf->SetFillColor(215,217,200);
     #verde claro
     $pdf->SetFillColor(237,243,216) ;
*/   
      $pdf->Cell(150,$SepEntreLineas,"CONTRATO",1,1,'C',1);
      $pdf->SetFillColor(153,230,172);
      #contrato
      $pdf->Cell(30,$SepEntreLineas,"CONTRATO",1,0,'L',1);
      $pdf->Cell(120,$SepEntreLineas,$sContrato,1,1,'L',0);
      #descripcion
      $y = $pdf->getY();
      $pdf->MultiCell(30,$SepEntreLineas,"DESCRIPCIÓN",0,'L',1);
      $pdf->setY($y);
      $pdf->cell(30);
      $pdf->MultiCell(120,$SepEntreLineas,$row['Descripcion'],1,'L',0);
      $altoDescripcion = ($pdf->getY()-$y);
      #marco para etiqueta descripcion
      $pdf->rect($X=10,$Y=$y,$ancho = 30,$alto = $altoDescripcion);
      #fianza de cumplimiento
      $pdf->Cell(30,$SepEntreLineas,"FIANZA DE CUMPLIMIENTO",1,0,'L',1);
      $pdf->Cell(120,$SepEntreLineas,$row['Fianza'],1,1,'L',0);
      #poliza de seguro
      $pdf->Cell(53,$SepEntreLineas,"POLIZA DE SEGURO DE RESPONSABILIDAD CIVIL:",1,0,'L',1);
      $pdf->Cell(97,$SepEntreLineas,$row['Poliza'],1,1,'L',0);
      #ubicacion
      $pdf->Cell(53,$SepEntreLineas,"UBICACION",1,0,'L',1);
      $pdf->Cell(97,$SepEntreLineas,$row['Ubicacion'],1,1,'L',0);
      #Monto Original
      $pdf->Cell(25,$SepEntreLineas,"MONTO ORIGINAL",1,0,'L',1);
      $pdf->Cell(50,$SepEntreLineas,"$".number_format($row['original'],2,".",","),1,0,'R',0);
      #Monto Original
      $pdf->Cell(25,$SepEntreLineas,"MONTO MODIFICADO",1,0,'L',1);
      $pdf->Cell(50,$SepEntreLineas,"$".number_format($row['dModificado'],2,".",","),1,1,'R',0);
      #contratista
      $y = $pdf->getY();
      $pdf->MultiCell(30,$SepEntreLineas,"CONTRATISTA",0,'L',1);
      $pdf->setY($y);
      $pdf->cell(30);
      $pdf->MultiCell(120,$SepEntreLineas,$row['Cliente'],1,'L',0);
      $altoDescripcion = ($pdf->getY()-$y);
      #marco para etiqueta contratista
      $pdf->rect($X=10,$Y=$y,$ancho = 30,$alto = $altoDescripcion);
      $yMax = $pdf->getY();

      #INFORMACION DE LOS CONVENIOS ACTUAL Y ORIGINAL
      $pdf->setY($yInicial);
      $x=191;
      $pdf->SetFillColor(255,255,128);
      $pdf->cell($x);
      $pdf->Cell(75,$SepEntreLineas,"PERIODOS ORIGINALES DE EJECUCION",1,1,'C',1);
      $pdf->SetFillColor(153,230,172);
      $pdf->cell($x);
      $pdf->Cell(37.5,$SepEntreLineas,"INICIO",1,0,'C',1);
      $pdf->Cell(37.5,$SepEntreLineas,"TERMINO",1,1,'C',1);
      $pdf->cell($x);
      $pdf->Cell(37.5,$SepEntreLineas,formatoFecha($row['dFechaInicioO']),1,0,'C',0);
      $pdf->Cell(37.5,$SepEntreLineas,formatoFecha($row['dFechaFinalO']),1,1,'C',0);
      $pdf->SetFillColor(255,255,128);
      $pdf->cell($x);
      $pdf->MultiCell(75,$SepEntreLineas,$row['DescripcionConvenio'],1,'C',1);
      $pdf->SetFillColor(153,230,172);
      $pdf->cell($x);
      $pdf->Cell(37.5,$SepEntreLineas,"INICIO",1,0,'C',1);
      $pdf->Cell(37.5,$SepEntreLineas,"TERMINO",1,1,'C',1);
      $pdf->cell($x);
      $pdf->Cell(37.5,$SepEntreLineas,formatoFecha($row['dFechaInicioM']),1,0,'C',0);
      $pdf->Cell(37.5,$SepEntreLineas,formatoFecha($row['dFechaFinalM']),1,1,'C',0);
      $pdf->cell($x);
      $pdf->Cell(37.5,$SepEntreLineas,"DURACION",1,0,'L',1);
      $pdf->Cell(37.5,$SepEntreLineas,($row['Duracion']+1)." Dias",1,1,'C',0);
      if($yMax > $pdf->getY())
         $pdf->setY($yMax + 1);
      else
         $pdf->setY($pdf->getY() + 1);
   }
}
function responsables($LastY,$sContrato,$Ordenes,$dFecha){
   global $pdf;
   global $sSuperintendente;
   global $sSuperintendentePatio;
   global $sRepresentanteTecnico;
   global $sSupervisor;
   global $sSupervisorPatio;
   global $sSupervisorGenerador;
   global $sSupervisorEstimacion;
   global $sSupervisorTierra;
   global $sResidente;
   global $sSupervisorSubContratista;

   global $sPuestoSuperintendente;
   global $sPuestoSuperintendentePatio;
   global $sPuestoRepresentanteTecnico;
   global $sPuestoSupervisor;
   global $sPuestoSupervisorPatio;
   global $sPuestoSupervisorGenerador;
   global $sPuestoSupervisorEstimacion;
   global $sPuestoSupervisorTierra;
   global $sPuestoResidente;
   global $sPuestoSupervisorSubContratista;
   $SepEntreLineas=3;
   $Responsables = "";
   $ordenes = explode(",",$Ordenes);
   #obtener la lista de los reponsables
   foreach($ordenes as $orden){
      firmantes($sContrato,$orden,$dFecha) ;
      if($Responsables ==""){
         $Responsables.="\nRESIDENTE DE OBRA\t";
         $Responsables.=$sResidente;
         $Responsables.="\nSUPERVISOR DE OBRA EN TIERRA\t";
         $Responsables.=$sSupervisorTierra;
      }
      $Responsables.="\nSUPERVISOR DE OBRA DE LA ORDEN $orden\t";
      $Responsables.=$sSupervisor;
   }
   $Responsables.="\nSUPERINTENDENTE DE LA COMPAÑIA\t";
   $Responsables.=$sSuperintendente;
   
   #formatear la lista
   $lista = explode("\n",$Responsables);
   $fila=0;
   foreach($lista as $linea){
      $puestos = explode("\t",$linea);
      $puesto =$puestos[0];
      $nombre =$puestos[1];
      if($puesto != "" and $nombre != ""){
         $matrizFirmas[$fila][0]=$puesto;
         $matrizFirmas[$fila][1]=$nombre;
         $fila++;
      }
   }
   
   #imprimir la lista
   $pdf->SetFillColor(255,255,128);
   $pdf->setY($LastY);
   if(count($matrizFirmas)<=0)
      return $pdf->getY();
   $pdf->Cell(110,$SepEntreLineas,"RESPONSABLES DE EJECUCION DE LOS TRABAJOS",1,1,'C',1);
   $pdf->SetFillColor(153,230,172);
   $pdf->SetFont('Arial','',5);
   for($k = 0; $k < count($matrizFirmas) ; $k++){
   
   $pdf->Cell(55,$SepEntreLineas,$matrizFirmas[$k][0],1,0,'L',0);
   $pdf->Cell(55,$SepEntreLineas,$matrizFirmas[$k][1],1,1,'L',0);
}
$pdf->SetFont('Arial','',6);
return $pdf->getY();
}


function personal($LastY,$sContrato,$fecha,$sIdConvenio,$Ordenes){
/*$sContrato='428237819';
$fecha = '2007-08-05';
$sIdConvenio='A-01';
$Ordenes="428237819-CI,428237819-AKAL-E,428237819-AKAL-O,428237819-AKAL-F,428237819-TIERRA";
*/
global $pdf;
$SepEntreLineas=2;
$sqlLaboran="
   select pla.sDescripcion as sDescripcion,sum(bp.dCantidad) as dCantidad
   from bitacoradepersonal bp
   inner join plataformas pla on (
      bp.sIdPlataforma=pla.sIdPlataforma
   )
   inner join bitacoradeactividades ba on (
      ba.sContrato=bp.sContrato and ba.dIdFecha=bp.dIdFecha and bp.iIdDiario=ba.iIdDiario
   )
   where
      bp.sContrato='$sContrato'
      and bp.dIdFecha='$fecha'
      and find_in_set(ba.sNumeroOrden,'$Ordenes')
   group by pla.sIdPlataforma; ";

$sqlPernoctan="
   select per.sDescripcion as sDescripcion,sum(bp.dCantidad) as dCantidad
   from bitacoradepersonal bp
   inner join pernoctan per on (
      bp.sIdPernocta=per.sIdPernocta
   )
   inner join bitacoradeactividades ba on (
      ba.sContrato=bp.sContrato and ba.dIdFecha=bp.dIdFecha and bp.iIdDiario=ba.iIdDiario
   )
   where
      bp.sContrato='$sContrato'
      and bp.dIdFecha='$fecha'
      and find_in_set(ba.sNumeroOrden,'$Ordenes')
   group by per.sIdPernocta; ";
#inicializar variables
$pdf->setY($LastY);
$ancho = 75;
$xMaxPernoctan = 115;
$xMaxLaboran = $xMaxPernoctan+$ancho+1;
$yMatriz = $pdf->getY();
#verificar si existen registro de personal o de equipo
$rsLaboran = mysql_query($sqlLaboran);
if($rowLaboran = mysql_fetch_array($rsLaboran)){
   $pdf->SetFillColor(255,255,128);
   $pdf->setY($yMatriz);
   $pdf->cell($xMaxPernoctan);
   $pdf->Cell($ancho*2+1,$SepEntreLineas,"PERSONAL",1,1,'C',1);   
   $yMatriz+=2;
   $pdf->setY($yMatriz);   
   $title = true;
   $lExisteLaboran = true;
   $pdf->SetFillColor(153,230,172);
  // $pdf->setY($yMatriz);
   $pdf->cell($xMaxPernoctan);
   $pdf->Cell($ancho,$SepEntreLineas,"PERNOCTAN EN",1,1,'C',1);
}
$rsPernoctan = mysql_query($sqlPernoctan);
if($rowPernoctan = mysql_fetch_array($rsPernoctan)){
   if(!$title){
      $pdf->SetFillColor(255,255,128);
      $pdf->setY($yMatriz);
      $pdf->cell($xMaxPernoctan);
      $pdf->Cell($ancho*2,$SepEntreLineas,"PERSONAL",1,1,'C',1);        
      $pdf->setY($yMatriz+2);
      $yMatriz+=5;
      $pdf->SetFillColor(153,230,172);
   }
   
   $lExistePernoctan = true;
   $pdf->setY($yMatriz);
   $pdf->cell($xMaxLaboran);
   $pdf->Cell($ancho,$SepEntreLineas,"LABORAN EN",1,1,'C',1);
   
}

#re-ejecutar las consultas
$rsPernoctan = mysql_query($sqlPernoctan);
$rsLaboran = mysql_query($sqlLaboran);
#acumuladores de personal
$sumPernoctan=$sumLaboran=0;
#imprimir registros si existen
while($lExistePernoctan or $lExisteLaboran){

if( !isset($lastYlaboran) or !isset($lastYpernoctan) )
   $lastYlaboran  =  $lastYpernoctan = $pdf->getY();

   #imprimir donde pernoctan
   if($lExistePernoctan){
      if($rowPernoctan = mysql_fetch_array($rsPernoctan)) {
         $pdf->setY($lastYpernoctan);
         $pdf->cell($xMaxPernoctan);
         $pdf->Cell($ancho-10,$SepEntreLineas,$rowPernoctan['sDescripcion'],1,0,'L',0);
         $pdf->Cell($ancho-($ancho-10),$SepEntreLineas,$rowPernoctan['dCantidad'],1,1,'R',0);
         $sumPernoctan+=$rowPernoctan['dCantidad'];
         $lastYpernoctan=$pdf->getY();
      }
      else{
          $lExistePernoctan = false;
          $pdf->setY($lastYpernoctan);
          $pdf->cell($xMaxPernoctan);
          $pdf->Cell($ancho-10,$SepEntreLineas,"TOTAL",1,0,'L',1);
          $pdf->Cell($ancho-($ancho-10),$SepEntreLineas,$sumPernoctan,1,1,'R',0);
      }
   }

   #imprimir donde laboran
   if($lExisteLaboran){
      if($rowLaboran = mysql_fetch_array($rsLaboran)) {
         $pdf->setY($lastYlaboran);
         $pdf->cell($xMaxLaboran);
         $pdf->Cell($ancho-10,$SepEntreLineas,$rowLaboran['sDescripcion'],1,0,'L',0);
         $pdf->Cell($ancho-($ancho-10),$SepEntreLineas,$rowLaboran['dCantidad'],1,1,'R',0);
         $sumLaboran+=$rowLaboran['dCantidad'];
         $lastYlaboran = $pdf->getY();
      }
      else{
         $lExisteLaboran = false;
         $pdf->setY($lastYlaboran);
         $pdf->cell($xMaxLaboran);
         $pdf->Cell($ancho-10,$SepEntreLineas,"TOTAL",1,0,'L',1);
         $pdf->Cell($ancho-($ancho-10),$SepEntreLineas,$sumLaboran,1,1,'R',0);
      }

   }

}
return $pdf->getY();
}

function avancesObra($Y,$sContrato,$fecha,$sIdConvenio,$sIdTurno){
/*$sContrato ='428237819';
$fecha = '2007-08-05';
$sIdConvenio ='A-01';
$sIdTurno ='A';      */
global $pdf;
$SepEntreLineas=2;
$xMaxAvances = 191;
/*
$sql="
select
   @status:=(
      select lStatus
      from reportediario
      Where sContrato = '$sContrato' and dIdFecha = '$fecha'  And sIdTurno = '$sIdTurno' And lStatus <> 'Pendiente' limit 1
   ) as status,
   #--avance Real Anterior de la Obra
   case @status when 'Autorizado' then
      @dAvanceRealObraAnterior:=(
         select dAvRealAnteriorContrato
         from reportediario
         Where sContrato = '$sContrato' and dIdFecha = '$fecha'  And sIdTurno = '$sIdTurno' And lStatus <> 'Pendiente' limit 1
      )
   else
      @dAvanceRealObraAnterior:=(
         select sum(dAvance) as dAvance
         from avancesglobalesxorden
         where sContrato = '$sContrato' and sNumeroOrden = '' and dIdFecha < '$fecha' and sIdConvenio = '$sIdConvenio'
         group by sContrato
      )
   end  as dAvanceRealObraAnterior,

   #--avance real actual de la obra
   case @status when 'Autorizado' then
      @dAvanceRealObraActual:=(
         select dAvRealActualContrato
         from reportediario
         Where sContrato = '$sContrato' and dIdFecha = '$fecha'  And sIdTurno = '$sIdTurno' And lStatus <> 'Pendiente' limit 1
      )
   else
      @dAvanceRealObraActual:=(
         Select sum(dAvance) as dAvance
         from avancesglobalesxorden
         where sContrato = '$sContrato' and sNumeroOrden = '' and dIdFecha = '$fecha' and sIdConvenio = '$sIdConvenio'
         group by sContrato
      )
   end as dAvanceRealObraActual,
   #--avance acumulado real de la obra
   FORMAT((@dAvanceRealObraActual + @dAvanceRealObraAnterior ),4) as dAvanceRealObraAcum ,

   #--avance programado anterior de la obra
   case @status when 'Autorizado' then
      @dAvanceProgObraAnterior:=(
         select dAvProgAnteriorContrato
         from reportediario
         Where sContrato = '$sContrato' and dIdFecha = '$fecha'  And sIdTurno = '$sIdTurno' And lStatus <> 'Pendiente' limit 1
      )
   else
      @dAvanceProgObraAnterior:=(
         Select sum(dAvancePonderadoDia) as dAvance
         from avancesglobales
         where sContrato = '$sContrato' and sNumeroOrden = '' and dIdFecha < '$fecha' and sIdConvenio ='$sIdConvenio'
         group by sContrato
      )
   end as dAvanceProgObraAnterior,
   #--avamce programado actual de la obra
   case @status when 'Autorizado' then
      @dAvanceProgObraActual:=(
         select dAvProgActualContrato
         from reportediario
         Where sContrato = '$sContrato' and dIdFecha = '$fecha'  And sIdTurno = '$sIdTurno' And lStatus <> 'Pendiente' limit 1
      )
   else
      @dAvanceProgObraActual:=(
         Select sum(dAvancePonderadoDia) as dAvance
         from avancesglobales
         where sContrato = '$sContrato' and sNumeroOrden = '' and dIdFecha = '$fecha' and sIdConvenio = '$sIdConvenio'
         group by sContrato)
   end as dAvanceProgObraActual,
   #--avance programado acumulado de la obra
   FORMAT((@dAvanceProgObraActual + @dAvanceProgObraAnterior),4) as dAvanceProgObraAcum
";*/
$sql="
select
   #--avance Real Anterior de la Obra
      @dAvanceRealObraAnterior:=(
         select sum(dAvance) as dAvance
         from avancesglobalesxorden
         where sContrato = '$sContrato' and sNumeroOrden = '' and dIdFecha < '$fecha' and sIdConvenio = '$sIdConvenio'
         group by sContrato
      ) as dAvanceRealObraAnterior,

   #--avance real actual de la obra
      @dAvanceRealObraActual:=(
         Select sum(dAvance) as dAvance
         from avancesglobalesxorden
         where sContrato = '$sContrato' and sNumeroOrden = '' and dIdFecha = '$fecha' and sIdConvenio = '$sIdConvenio'
         group by sContrato
      ) as dAvanceRealObraActual,
   #--avance acumulado real de la obra
   FORMAT((@dAvanceRealObraActual + @dAvanceRealObraAnterior ),4) as dAvanceRealObraAcum ,

   #--avance programado anterior de la obra
      @dAvanceProgObraAnterior:=(
         Select sum(dAvancePonderadoDia) as dAvance
         from avancesglobales
         where sContrato = '$sContrato' and sNumeroOrden = '' and dIdFecha < '$fecha' and sIdConvenio ='$sIdConvenio'
         group by sContrato
      ) as dAvanceProgObraAnterior,
   #--avamce programado actual de la obra
      @dAvanceProgObraActual:=(
         Select sum(dAvancePonderadoDia) as dAvance
         from avancesglobales
         where sContrato = '$sContrato' and sNumeroOrden = '' and dIdFecha = '$fecha' and sIdConvenio = '$sIdConvenio'
         group by sContrato) as dAvanceProgObraActual,
   #--avance programado acumulado de la obra
   FORMAT((@dAvanceProgObraActual + @dAvanceProgObraAnterior),4) as dAvanceProgObraAcum
";

$file = fopen("queryAvanceObra.sql","w+");
fwrite($file,$sql);
fclose($file);
$rs = mysql_query($sql);
if($row = mysql_fetch_array($rs)){
   #amarillo
   $pdf->SetFillColor(255,255,128);
  
   $pdf->setY($Y+1);
   $pdf->cell($xMaxAvances+30);
   $pdf->Cell(45,$SepEntreLineas,"AVANCES DE LA OBRA",1,1,'C',1);
   $pdf->SetFillColor(237,243,216) ;
   $pdf->cell($xMaxAvances+30);
   $pdf->Cell($ancho=15,$SepEntreLineas,"ANTERIOR",1,0,'C',1);
   $pdf->Cell($ancho,$SepEntreLineas,"ACTUAL",1,0,'C',1);
   $pdf->Cell($ancho,$SepEntreLineas,"ACUMULADO",1,1,'C',1);
   $pdf->cell($xMaxAvances);
   $pdf->Cell(30,$SepEntreLineas,"AVANCE REAL",1,0,'L',1);
   $pdf->Cell($ancho=15,$SepEntreLineas,$row['dAvanceRealObraAnterior'],1,0,'R',0);
   $pdf->Cell($ancho,$SepEntreLineas,$row['dAvanceRealObraActual'],1,0,'R',0);
   $pdf->Cell($ancho,$SepEntreLineas,$row['dAvanceRealObraAcum'],1,1,'R',0);
   $pdf->cell($xMaxAvances);
   $pdf->Cell(30,$SepEntreLineas,"AVANCE PROGRAMADO",1,0,'L',0);
   $pdf->Cell($ancho=15,$SepEntreLineas,$row['dAvanceProgObraAnterior'],1,0,'R',0);
   $pdf->Cell($ancho,$SepEntreLineas,$row['dAvanceProgObraActual'],1,0,'R',0);
   $pdf->Cell($ancho,$SepEntreLineas,$row['dAvanceProgObraAcum'],1,1,'R',0);
}
return $pdf->getY();
}


function avancesxOrden($Y,$sContrato,$fecha,$sIdConvenio,$sIdTurno,$Ordenes){
set_time_limit(0);
/*$sContrato='428237819';
$fecha = '2007-08-05';
$sIdConvenio='A-01';
$sIdTurno='A';
$Ordenes="428237819-CI,428237819-AKAL-E";*/
global $pdf;

$SepEntreLineas=2;
$xMaxAvances = 191;


      #amarillo
      $pdf->SetFillColor(255,255,128);
      #morado
      #$pdf->SetFillColor(189,184,248);
      #cafe
     #$pdf->SetFillColor(215,217,200);
     #verde claro
     #$pdf->SetFillColor(237,243,216) ;
     #verde
     #$pdf->SetFillColor(153,230,172);

$pdf->setY($Y+1);
$pdf->cell($xMaxAvances+30);
$pdf->Cell(45,$SepEntreLineas,"AVANCES x ORDEN",1,1,'C',1);
$pdf->SetFillColor(237,243,216) ;
$pdf->cell($xMaxAvances+30);
$pdf->Cell($ancho=15,$SepEntreLineas,"ANTERIOR",1,0,'C',1);
$pdf->Cell($ancho,$SepEntreLineas,"ACTUAL",1,0,'C',1);
$pdf->Cell($ancho,$SepEntreLineas,"ACUMULADO",1,1,'C',1);
$NumerosOrdenes=explode(",",$Ordenes);
foreach($NumerosOrdenes as $sNumeroOrden){
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
            AND dIdFecha='$fecha'
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
               and dIdFecha < '$fecha'
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
               and dIdFecha = '$fecha'
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
               and dIdFecha < '$fecha'
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
               and dIdFecha = '$fecha'
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

   $pdf->SetFillColor(255,255,128);
   $pdf->rect($xMaxAvances-30,$pdf->getY(),40,4,'FD');
   $pdf->SetFillColor(237,243,216) ;
   $pdf->cell($xMaxAvances-30);
   $pdf->Cell(30,$SepEntreLineas,$sNumeroOrden,0,0,'L',0);
   $pdf->Cell(30,$SepEntreLineas,"AVANCE PROGRAMADO",1,0,'L',1);
   $pdf->Cell($ancho=15,$SepEntreLineas,number_format($dAvProgAnteriorOrden,4,".",","),1,0,'R',1);
   $pdf->Cell($ancho,$SepEntreLineas,number_format($dAvProgActualOrden,4,".",","),1,0,'R',1);
   $pdf->Cell($ancho,$SepEntreLineas,number_format($dAvProgAcumOrden,4,".",","),1,1,'R',1);
   $pdf->cell($xMaxAvances);
   $pdf->Cell(30,$SepEntreLineas,"AVANCE REAL",1,0,'L',0);
   $pdf->Cell($ancho=15,$SepEntreLineas,number_format($dAvRealAnteriorOrden,4,".",","),1,0,'R',0);
   $pdf->Cell($ancho,$SepEntreLineas,number_format($dAvRealActualOrden,4,".",","),1,0,'R',0);
   $pdf->Cell($ancho,$SepEntreLineas,number_format($dAvRealAcumOrden,4,".",","),1,1,'R',0);

 }
 return $pdf->getY();
}
function permisosPlaticas($LastY,$sContrato,$fecha,$sIdConvenio,$Ordenes){
/*$sContrato='428237819';
$fecha = '2007-08-05';
$sIdConvenio='A-01';
$Ordenes="428237819-CI,428237819-AKAL-E,428237819-AKAL-O,428237819-AKAL-F,428237819-TIERRA";
  */
  global $pdf;
$SepEntreLineas=2;

$sqlPermisos="SELECT
   @NumeroOrden:=trp.sNumeroOrden as NumeroOrden,
   trp.sContrato,
   trp.sFolios,
   tip.sDescripcion
FROM tramitedepermisos trp
INNER JOIN tiposdepermiso tip ON (trp.sIdTipoPermiso = tip.sIdTipoPermiso)
WHERE
   trp.sContrato = '$sContrato'
   AND trp.dIdFecha = '$fecha'
   AND find_in_set(trp.sNumeroOrden,'$Ordenes')
ORDER BY trp.sIdTipoPermiso";
$sqlPlaticas = "SELECT
   @NumeroOrden:=sNumeroOrden as NumeroOrden,
   sTema
FROM
   reportediario 
WHERE 
   sContrato='$sContrato' 
   AND dIdFecha='$fecha' 
   AND find_in_set(sNumeroOrden,'$Ordenes')";

#inicializar variables
$pdf->setY($LastY+2);
$ancho = 120;
$xMaxPermisos = 0.1;
$xMaxPlaticas = $xMaxPermisos + $ancho + 1;
$yMatriz = $pdf->getY();
#verificar si existen registro de personal o de equipo
$rsPermisos = mysql_query($sqlPermisos);
if($rowPermisos = mysql_fetch_array($rsPermisos)){
   $lExistePermisos = true;
   $pdf->SetFillColor(189,184,248);
   $pdf->setY($yMatriz);
   $pdf->cell($xMaxPermisos);
   $pdf->Cell($ancho,$SepEntreLineas,"PERMISOS DE SEGURIDAD",1,1,'C',1);
   $pdf->SetFillColor(237,243,216) ;
   $pdf->cell($xMaxPermisos);
   $pdf->Cell($ancho-85,$SepEntreLineas,"NUM. ORDEN",1,0,'C',1);
   $pdf->Cell($ancho-85,$SepEntreLineas,"CLASES",1,0,'C',1);
   $pdf->Cell($ancho-70,$SepEntreLineas,"DESCRIPCION",1,1,'C',1);    
   $pdf->SetFillColor(153,230,172);
}
$rsPlaticas = mysql_query($sqlPlaticas);
if($rowPlaticas = mysql_fetch_array($rsPlaticas )){
   $pdf->SetFillColor(189,184,248);
   $lExistePlaticas = true;
   $pdf->setY($yMatriz);
   $pdf->cell($xMaxPlaticas);
   $pdf->Cell($ancho,$SepEntreLineas,"PLATICAS DE SEGURIDAD",1,1,'C',1);
   $pdf->SetFillColor(237,243,216) ;
   $pdf->cell($xMaxPlaticas);
   $pdf->Cell($ancho-85,$SepEntreLineas,"NUM. ORDEN",1,0,'C',1);
   $pdf->Cell($ancho-($ancho-85),$SepEntreLineas,"DESCRIPCION",1,1,'C',1);
   $pdf->SetFillColor(153,230,172);

}

#re-ejecutar las consultas
$rsPlaticas = mysql_query($sqlPlaticas);
$rsPermisos = mysql_query($sqlPermisos);
#imprimir registros si existen
//while($row = mysql_fetch_array($rsPlaticas)){echo $row[0];}
while($lExistePlaticas or $lExistePermisos){
if($lastYpermisos > 240 or $lastYplaticas>240){
   unset($lastYpermisos);
   unset($lastYplaticas);
   $pdf->addPage();
}
if( !isset($lastYpermisos) or !isset($lastYplaticas) )
   $lastYpermisos  =  $lastYplaticas = $pdf->getY();

   #imprimir donde pernoctan
   if($lExistePermisos){
      if($rowPermisos = mysql_fetch_array($rsPermisos)) {
         $pdf->setY($lastYpermisos);
         $pdf->cell($xMaxPermisos);
         $pdf->MultiCell($ancho-85,$SepEntreLineas,$rowPermisos['NumeroOrden'],0,'L',0);
       /*echo "<br>".  */$lastYpr1 = $pdf->getY();

         $pdf->setY($lastYpermisos);
         $pdf->cell($xMaxPermisos+($ancho-85));
         $pdf->MultiCell($ancho-85,$SepEntreLineas,$rowPermisos['sDescripcion'],0,'L',0);
       /*echo "<br>".  */$lastYpr2 = $pdf->getY();

         $pdf->setY($lastYpermisos);
         $pdf->cell($xMaxPermisos+($ancho-85)*2);
         $pdf->MultiCell($ancho-85,$SepEntreLineas,$rowPermisos['sFolios'],0,'L',0);
       /*echo "<br>".  */$lastYpr3 = $pdf->getY();
         
         if($lastYpr1 > $lastYpr2 )
            $Ypr = $lastYpr1;
         else 
            $Ypr = $lastYpr2;
         
         if($Ypr < $lastYpr3 )
            $Ypr = $lastYpr3;
         $pdf->setY($Ypr);    
         
         $pdf->rect($xMaxPermisos+10         ,$lastYpermisos, $ancho-85 , $alto = ($Ypr-$lastYpermisos));
         $pdf->rect($xMaxPermisos+($ancho-75),$lastYpermisos, $ancho-85 , $alto = ($Ypr-$lastYpermisos));            
         $pdf->rect($xMaxPermisos+80         ,$lastYpermisos, $ancho-70 , $alto = ($Ypr-$lastYpermisos));
                  
        /*echo "<br><br>".  */$lastYpermisos=$Ypr;
      }
      else{
         $lExistePermisos=false;
      }
   }

   #imprimir donde laboran
   if($lExistePlaticas){
      if($rowPlaticas = mysql_fetch_array($rsPlaticas)) {
         $pdf->setY($lastYplaticas);
         $pdf->cell($xMaxPlaticas);
         $pdf->MultiCell($ancho-85,$SepEntreLineas,$rowPlaticas['NumeroOrden'],0,'L',0);
         $lastYp1 = $pdf->getY();
         
         $pdf->setY($lastYplaticas);
         $pdf->cell($xMaxPlaticas+($ancho-85));
         $pdf->MultiCell($ancho-($ancho-85),$SepEntreLineas,$rowPlaticas['sTema'],0,'L',0);    
         $lastYp2 = $pdf->getY();
         
         if($lastYp1 > $lastYp2 )
            $Yp = $lastYp1;
         else 
            $Yp = $lastYp2;
         
         $pdf->rect($xMaxPlaticas+10,$lastYplaticas,$ancho-85,$alto = ($Yp-$lastYplaticas));
         $pdf->rect($xMaxPlaticas+($ancho-75),$lastYplaticas,$ancho-($ancho-85),$alto = ($Yp-$lastYplaticas));
         $lastYplaticas = $Yp;

      }
      else{
         $lExistePlaticas=false;
      }
   }

}
return ($lastYpermisos >$lastYplaticas)?$lastYpermisos:$lastYplaticas;

}

function relevantesAcciones($LastY,$sContrato,$fecha,$sIdConvenio,$Ordenes){
global $pdf;
/*$sContrato ='428237819';
$fecha = '2007-08-08';
$sIdConvenio='A-01';
$Ordenes="428237819-CI,428237819-AKAL-E,428237819-AKAL-O,428237819-AKAL-F,428237819-TIERRA";
*/
$SepEntreLineas=2;
$xMax = 0;
$sql="SELECT
   @NumeroOrden:=sNumeroOrden as sNumeroOrden,
   mActividades,
   mProblematica
FROM reportegerencial
WHERE
   sContrato = '$sContrato'
   AND dIdFecha = '$fecha'
   AND find_in_set(sNumeroOrden,'$Ordenes')";

   
#inicializar variables
$pdf->setY($LastY+2);
$LastY=$pdf->getY();
#ejecutar las consultas
$rs = mysql_query($sql);

#imprimir registros si existen
//while($row = mysql_fetch_array($rsPlaticas)){echo $row[0];}
   while($row = mysql_fetch_array($rs)){
      if($LastY > 240){
         unset($LastY);
         $pdf->addPage();
      }
      if(!isset($LastY))
         echo $LastY = $pdf->getY();
   
//      $pdf->SetFillColor(133,230,172);
      $pdf->SetFillColor(209,208,213);
      $pdf->setY($LastY);
      $pdf->cell($xMax+1);
      $pdf->Cell(265,$SepEntreLineas,"TRABAJOS EN $row[0]",1,1,'C',1);
      $pdf->SetFillColor(255,255,128);
      $pdf->cell($xMax+1);
      $pdf->SetFillColor(77,109,243);
      $pdf->Cell(265/2,$SepEntreLineas,"ACTIVIDADES RELEVANTES DEL DIA",1,0,'C',1);
      $pdf->Cell(265/2,$SepEntreLineas,"PROBLEMATICA Y ACCIONES",1,1,'C',1);

      $pdf->setY($LastY+$SepEntreLineas*2);
      $pdf->cell($xMax+1);
      $pdf->MultiCell(265/2,$SepEntreLineas,$row['mActividades'],0,'L',0);
      $lastYp1 = $pdf->getY();
         
      $pdf->setY($LastY+$SepEntreLineas*2);
      $pdf->cell(265/2+1);
      $pdf->MultiCell(265/2,$SepEntreLineas,$row['mProblematica'],0,'L',0);    
      $lastYp2 = $pdf->getY();      
      
      if($lastYp1 > $lastYp2 )
         $Yp = $lastYp1;
      else 
         $Yp = $lastYp2;
        
      $pdf->rect($xMax+11,$LastY+4,265/2,$alto = ($Yp-$LastY));
      $pdf->rect($xMax+(265/2)+11,$LastY+4,265/2,$alto = ($Yp-$LastY));     
      
      $LastY = $Yp ;
   
   }


return $pdf->getY();

}

//fotografico gerencial
function GetImageFotografico($sContrato,$dFecha,$Ordenes,$sIdTurno)
{
   global $FotosXorden,$Foto,$sDescripcion,$sql2,$sNumeroReporte;
   //$Ordenes="428237819-CI,428237819-AKAL-E,428237819-AKAL-O,428237819-AKAL-F,428237819-TIERRA";

   $sql= "SELECT
         rd.dIdFecha,
         rd.sNumeroOrden,
         rf.sContrato,
         rf.sNumeroReporte,
         rf.iImagen,
         rf.bImagen,
         if(length(rf.sDescripcion)>40,(concat(substr(rf.sDescripcion,1,40),'...')),(rf.sDescripcion))
          as sDescripcion
      FROM reportefotografico rf
      INNER JOIN reportediario rd ON(
         rf.sNumeroReporte=rd.sNumeroReporte
         and rf.sContrato=rd.sContrato
      )
      WHERE
        rf.sContrato='$sContrato'
        and rd.dIdFecha='$dFecha'
        and rd.sIdTurno='$sIdTurno'
        And find_in_set(rd.sNumeroOrden,'$Ordenes')
      order by rd.sNumeroReporte";
   $result = mysql_query($sql);
   $NumImg=$NumDes=0;
   $semillaOrden = "";
   while($row = mysql_fetch_array($result))
   {
      if($semillaOrden!=$row["sNumeroOrden"]){
           $NumImg=0;
           $semillaOrden=$row["sNumeroOrden"];
      }
      if($row['bImagen']=="")continue;
      $NumImg++;
      $NumDes++;
      $car = "._.";
      $FotosXorden[$row["sNumeroOrden"]."$car".$NumImg]=$sContrato."_".$row['sNumeroReporte']."_".$NumImg.".jpg";
      $FotosXorden[$row["sNumeroOrden"]."$car".$NumImg]=str_replace("/","",$FotosXorden[$row["sNumeroOrden"]."$car".$NumImg]);
      $sDescripcion[$NumDes]=$row['sDescripcion'];
      $fp = fopen("./photo/".$FotosXorden[$row["sNumeroOrden"]."$car".$NumImg],"w+");
      fwrite($fp, $row['bImagen']);
      fclose($fp);
   }
   if($semillaOrden!=""){
      PrintImageFotografico();
   }
   else{
      return;
   }

}
/*Lee las imagenes y las pone en el PDF*/
function PrintImageFotografico()
{
   global $FotosXorden,$Foto,$sDescripcion,$pdf,$sql2,$sNumeroReporte;

   $NumDes=0;
   $Tamanio=sizeof($FotosXorden);
   $yTexto=$ContadorImagenxLinea=$ContadorImagenxHoja=$ContadorImagen=0;
   $PosX=27;
   $Separacion=7.5;
   $x=$PosX;
   $y=$pdf->GetY()+10;
   $Ancho=50;
   $Alto=54;   
   if($NumDes<$Tamanio){
      if( ($pdf->getY()-220) > 60){    
        $pdf->AddPage();
      }
      else{
        $x=$PosX;
        $y=$pdf->GetY()+10;
        $ContadorImagenxHoja=4;
        $ContadorImagenxLinea=0;       
      }
   }

   $lNuevaOrden=false;

   $semillaOrden="";

   foreach($FotosXorden as $Ordenes=>$imagen){
      $aOrden = explode("._.",$Ordenes);
      $Orden = $aOrden[0];
      $Tamanio=0;

      if($semillaOrden!=$Orden){

          $lNuevoTitulo = true;
           $NumImg=0;
           $semillaOrden=$Orden;
           foreach($FotosXorden as $index=>$Nimagen){
               if(strpos($index,$Orden)!==false)$Tamanio++;
            }

      }

      while($NumImg<$Tamanio)
      {
         if($lNuevoTitulo){
               if($ContadorImagenxHoja>4){
                  $pdf->addPage();
                  $x=$PosX;
                  $y=$pdf->GetY()+($Alto+$yTexto+10);
                  $ContadorImagenxHoja=0;
                  $ContadorImagenxLinea=0;
               }
               elseif(($ContadorImagenxHoja>0) and ($ContadorImagenxHoja<=4) ){
                  $x=$PosX;
                  $y=$pdf->GetY()+10;
                  $ContadorImagenxHoja=4;
                  $ContadorImagenxLinea=0;
               }
               $pdf->SetY($pdf->GetY()+2);
               $pdf->setFillColor(200,125,325);
               $pdf->cell(260,3,"ACTIVIDADES EN TRABAJO EN $Orden",1,1,'C',1);
               $lNuevaOrden = false;
               $lNuevoTitulo=false;
         }

         $NumImg++;
         $NumDes++;
         $aImagen = explode("_",$imagen);
         $nImagen="";
         for($posNom=0;$posNom<count($aImagen)-1;$posNom++)
            $nImagen .=$aImagen[$posNom]."_";
         $nImagen=$nImagen.$NumImg.".jpg";

         $pdf->image("photo/".$nImagen,$x,$y,$Ancho,$Alto);
         #Contar imagenes impresas
         $ContadorImagenxLinea++;
         $ContadorImagenxHoja++;
         $ContadorImagen++;;
         #Imprimir descripcion
         $pdf->setY($y+$Alto+1);
         $pdf->Cell($x-10);
         $yTextoSup=$pdf->getY();
         $pdf->SetFont('Arial','',5) ;
         $pdf->MultiCell($Ancho,3,$sDescripcion[$NumDes],0,'C',0);
         $yTexto=$pdf->getY()-$yTextoSup;
         $pdf->setDrawColor(0,0,255);
         $pdf->Rect($x-2,$y-2,$Ancho+4,$Alto+3);
         $pdf->Rect($x-2,$y+$Alto+1,$Ancho+4,7/*alto*/,'D');
         $pdf->setDrawColor(0,0,0);
            #Calcular las nuevas posiciones de imagenes en la hoja
            switch($ContadorImagenxLinea){
               case 4:
                  $x=$PosX;
                  $y+=($Alto+$yTexto+10);
                  $ContadorImagenxLinea=0;
               break;
               default:
                  $x+=($Ancho+$Separacion);
               break;

            }
            #calcular el numero de imagenes en la hoja actual
               if($ContadorImagenxHoja>=8 ){
                  $pdf->addPage();
                  $x=$PosX;
                  $y=$pdf->GetY()+10;
                  $ContadorImagenxHoja=0;
              }
         }
    }
    rmImageFotografico();
}
/*Borra las imagenes temporales*/
function rmImageFotografico()
{
   global $FotosXorden;
   foreach($FotosXorden as $foto)
   {
      if(file_exists("photo/".$foto))
         unlink("photo/".$foto);
   }
}

function tituloTiemposMuertos()
{
      global $pdf ;
      $x=13;
      $y = 11 ;
      $tmpLimiteHoja = 200;
      $saltopag = 12 ;
      $xContrato = 0.1;
      $pdf->SetFont('Arial','B',7);
      if($pdf->getY()>150){
         $pdf->addPage();
      }
      $pdf->ln(15);
     // Cabecera de las Partidas
     $yFilaCabecera = $pdf->getY() + 1 ;
     $PosY=$pdf->getY();
     $pdf->setY($yFilaCabecera);
     $pdf->Cell($xContrato);
     $pdf->SetFont('Arial','B',6);
     $pdf->SetFillColor(189,184,248);
     $pdf->SetFillColor(215,217,200);

       $pdf->setY($yFilaCabecera + 3);
     $pdf->Cell($xContrato);
     $pdf->MultiCell(15,6,"ORDEN",1,'C',1);
       $pdf->setY($yFilaCabecera + 3);
     $pdf->Cell($xContrato+15);
     $pdf->MultiCell(20,6,"CLASIFICACION",1,'C',1);
        $pdf->setY($yFilaCabecera + 3);
     $pdf->Cell($xContrato+35);
     $pdf->MultiCell(10,3,"HORA INICIO",1,'C',1);
        $pdf->setY($yFilaCabecera + 3);
     $pdf->Cell($xContrato+45);
     $pdf->MultiCell(10,3,"HORA FINAL",1,'C',1);
         $pdf->setY($yFilaCabecera + 3);
     $pdf->Cell($xContrato+55);
     $pdf->MultiCell(15,3,"TIEMPO MUERTO",1,'C',1);
         $pdf->setY($yFilaCabecera + 3);
     $pdf->Cell($xContrato+70);
     $pdf->MultiCell(95,6,"DESCRIPCION",1,'C',1);
         $posy=$pdf->getY();
      $Alto=$posy-$PosY;
      $pdf->RoundedRect(10, $PosY, 165, $Alto, 3.50, '1001');
      $pdf->SetY($PosY-1);
      $pdf->Cell(4);
      $pdf->SetFillColor(255,255,255);
      $pdf->SetTextColor(50,100,255);
      $pdf->SetFont('Arial','B',7);
      $pdf->MultiCell(31,3,"TIEMPOS MUERTOS",0,'L',1);
      $pdf->SetTextColor(0,0,0);
      //$pdf->SetY($posy);
    $pdf->ln(8);
  }

function tiemposMuertos($sContrato,$dFecha,$Ordenes,$sIdTurno,$sIdConvenio){
global $pdf;
/*$sContrato='428237819';
$dFecha='2007-08-05';
$sIdTurno='A';
$sIdConvenio='A-01';
$sIdStatus='Autorizado';
$Ordenes="428237819-CI,428237819-AKAL-E,428237819-AKAL-O,428237819-AKAL-F,428237819-TIERRA";
*/
 $sqlTiempos = "
   select
         j.sNumeroOrden,
         t.sDescripcion,
         j.sHoraInicio,
         j.sHoraFinal,
         j.sTiempoMuerto,
         j.mDescripcion
   from
       jornadasdiarias j
   inner join tiposdemovimiento t on (
        j.sContrato=t.sContrato
        and t.sIdTipoMovimiento=j.sIdTipoMovimiento
   )
   where
        j.sContrato='$sContrato'
        And find_in_set(j.sNumeroOrden,'$Ordenes')
        AND j.dIdFecha='$dFecha'
   ";





     $xColumna =0.1;
     $pdf->SetFillColor(237,243,216) ;
     $qryTiempos = mysql_query($sqlTiempos);
     $pdf->SetFont('Arial','',5) ;
     if($row = mysql_fetch_array($qryTiempos))
       tituloTiemposMuertos();
     $qryTiempos = mysql_query($sqlTiempos);         
     $yLineaAnterior = $pdf->getY();
     while($rowTiempos = mysql_fetch_array($qryTiempos))
     {
     //echo  $pdf->addPage();
      if($yLineaAnterior>150){
         $pdf->addPage();
         $yLineaAnterior = $pdf->getY();
      }
        $pdf->setY($yLineaAnterior);
        $pdf->Cell($xColumna);
        $pdf->MultiCell(15,3 ,$rowTiempos['sNumeroOrden'],0,'L',0);
        $yArea = $pdf->getY();
           $pdf->setY($yLineaAnterior);
        $pdf->Cell($xColumna+15);
        $pdf->MultiCell(20,2 ,$rowTiempos['sDescripcion'],0,'L',0);
        $ytmDescripcion = $pdf->getY();
           $pdf->setY($yLineaAnterior);
        $pdf->Cell($xColumna+35);
        $pdf->MultiCell(10,3 ,$rowTiempos['sHoraInicio'],0,'C',0);
            $pdf->setY($yLineaAnterior);
        $pdf->Cell($xColumna+45);
        $pdf->MultiCell(10,3 ,$rowTiempos['sHoraFinal'],0,'C',0);
            $pdf->setY($yLineaAnterior);
        $pdf->Cell($xColumna+55);
        $pdf->MultiCell(15,3 ,$rowTiempos['sTiempoMuerto'],0,'C',0);
            $pdf->setY($yLineaAnterior);
        $pdf->Cell($xColumna+75);
        $pdf->MultiCell(95,3 ,$rowTiempos['mDescripcion'],0,'L',0);
        $yDescripcion = $pdf->getY();
        $alto = 0;
        $Mayor=0;

        if($yDescripcion > $ytmDescripcion){
            $Mayor = $yDescripcion;
        }
        else{
            $Mayor = $ytmDescripcion;
        }
        if($yArea > $Mayor ){
            $Mayor = $yArea;
        }

        $alto =  $Mayor- $yLineaAnterior;
        $pdf->setY($Mayor);
        $pdf->rect(10,$yLineaAnterior,15,$alto);
        $pdf->rect(25,$yLineaAnterior,20,$alto);
        $pdf->rect(45,$yLineaAnterior,10,$alto);
        $pdf->rect(55,$yLineaAnterior,10,$alto);
        $pdf->rect(65.1,$yLineaAnterior,15,$alto);
        $pdf->rect(80.1,$yLineaAnterior,95,$alto);
        $yLineaAnterior =$pdf->getY();
      }
    $pdf->setY($yLineaAnterior);
    $pdf->ln(5);
  }

#avisos de embarques
function tituloAvisosEmabarques()
{
      global $pdf ;
      $x=13;
      $y = 11 ;
      $tmpLimiteHoja = 150;
      if($pdf->getY()>$tmpLimiteHoja){
         $pdf->addPage();
      }
      $saltopag = 12 ;
      $xContrato = 0.1;
      $pdf->SetFont('Arial','B',7);
      $pdf->ln(5);
     // Cabecera de las Partidas
     $yFilaCabecera = $pdf->getY() + 1 ;
     $PosY=$pdf->getY();
     $pdf->setY($yFilaCabecera);
     $pdf->Cell($xContrato);
     $pdf->SetFont('Arial','B',6);
     $pdf->SetFillColor(189,184,248);
     $pdf->SetFillColor(215,217,200);

       $pdf->setY($yFilaCabecera + 3);
     $pdf->Cell($xContrato);
     $pdf->MultiCell(40,6,"NO. AVISO",1,'C',1);
       $pdf->setY($yFilaCabecera + 3);
     $pdf->Cell($xContrato+15+25);
     $pdf->MultiCell(20,6,"RECIBIDO",1,'C',1);
        $pdf->setY($yFilaCabecera + 3);
     $pdf->Cell($xContrato+35+25);
     $pdf->MultiCell(40,6,"ORDEN DE TRABAJO",1,'C',1);
         $pdf->setY($yFilaCabecera + 3);
     $pdf->Cell($xContrato+70+25);
     $pdf->MultiCell(95,6,"DESCRIPCION",1,'C',1);
         $posy=$pdf->getY();

         $posy=$pdf->getY();
      $Alto=$posy-$PosY;
      $pdf->RoundedRect(10, $PosY, 190, $Alto, 3.50, '1001');
      $pdf->SetY($PosY-1);
      $pdf->Cell(4);
      $pdf->SetFillColor(255,255,255);
      $pdf->SetTextColor(50,100,255);
      $pdf->SetFont('Arial','B',7);
      $pdf->MultiCell(41,3,"AVISOS DE EMBARQUES",0,'l',1);
      $pdf->SetTextColor(0,0,0);

      $pdf->SetY($posy);
    //$pdf->ln(8);
  }
function avisosEmbarques($sContrato,$dFecha,$Ordenes,$sIdTurno,$sIdConvenio){
global $pdf;
/*
$sContrato='428237819';
$dFecha='2007-08-10';
$sIdTurno='A';
$sIdConvenio='A-01';
$sIdStatus='Autorizado';
$Ordenes="428237819-CI,428237819-AKAL-E,428237819-AKAL-O,428237819-AKAL-F,428237819-TIERRA";
*/
  $sql = "
   select
      sReferencia,
      sNumeroOrden,
      dIdFecha,
      mComentarios
   from
      anexo_suministro
   where sContrato='$sContrato' and dIdFecha='$dFecha';
";

     $xColumna =0.1;
     $pdf->SetFillColor(237,243,216) ;
       // detalle de tiempos inactivos ....
        $pdf->SetFont('Arial','',5) ;
        
        $qry = mysql_query($sql);        
        if($row = mysql_fetch_array($qry))
           tituloAvisosEmabarques();
           
        $yLineaAnterior = $pdf->getY();
        $qry = mysql_query($sql);
        while($row = mysql_fetch_array($qry))
         {
            if($pdf->getY()>150){
               $pdf->addPage();
               $yLineaAnterior = $pdf->getY();
            }
           $pdf->setY($yLineaAnterior);
           $pdf->Cell($xColumna);
           $pdf->MultiCell(40,3 ,$row['sReferencia'],0,'L',0);
           $yArea = $pdf->getY();

              $pdf->setY($yLineaAnterior);
           $pdf->Cell($xColumna+15+25);
           $pdf->MultiCell(20,2 ,$row['dIdFecha'],0,'L',0);
           $ytmDescripcion = $pdf->getY();

              $pdf->setY($yLineaAnterior);
           $pdf->Cell($xColumna+35+25);
           $pdf->MultiCell(35,3 ,$row['sNumeroOrden'],0,'C',0);

              $pdf->setY($yLineaAnterior);
           $pdf->Cell($xColumna+45+50);
           $pdf->MultiCell(95,3 ,$row['mComentarios'],0,'L',0);

           $alto = 0;
           $Mayor=0;

           if($yDescripcion > $ytmDescripcion){
               $Mayor = $yDescripcion;
           }
           else{
               $Mayor = $ytmDescripcion;
           }
           if($yArea > $Mayor ){
               $Mayor = $yArea;
           }

           $alto =  $Mayor- $yLineaAnterior;
           $pdf->setY($Mayor);
        $pdf->rect(10,$yLineaAnterior,15+25,$alto);
        $pdf->rect(25+25,$yLineaAnterior,20+35,$alto);
        $pdf->rect(45+25,$yLineaAnterior,130,$alto);
        $yLineaAnterior =$pdf->getY();
      }

     $pdf->setY($yLineaAnterior);
   //  $pdf->ln(5);

   }
function grafica($sContrato,$dFecha,$sIdConvenio){
   global $pdf;
   $sIdConvenio=$sIdConvenio;
   $fecha = $dFecha;
   require("grafica.php");
   if(file_exists("Grafica.png")){
         $x=45;
         $Ancho = 170;
         $Alto = 90;
         $restoPag = (220-$pdf->getY());
         if( ($Alto+10) > $restoPag ){
           $pdf->AddPage();
           $y = 35;
         }
         else{
           $y=$pdf->GetY();
           $ContadorImagenxHoja=4;
           $ContadorImagenxLinea=0;
         }

      $pdf->image("Grafica.png",$x,$y,$Ancho,$Alto);
   }
}

function titulosComentarios()
{
      global $pdf ;
      $x=13;
      $y = 11 ;
      $tmpLimiteHoja = 150;
      if($pdf->getY()>$tmpLimiteHoja){
         $pdf->addPage();
      }
      $saltopag = 12 ;
      $xContrato = 0.1;
      $pdf->SetFont('Arial','B',7);
      $pdf->ln(5);
     // Cabecera de las Partidas
     $yFilaCabecera = $pdf->getY() + 1 ;
     $PosY=$pdf->getY();
     $pdf->setY($yFilaCabecera);
     $pdf->Cell($xContrato);
     $pdf->SetFont('Arial','B',6);
     $pdf->SetFillColor(189,184,248);
     $pdf->SetFillColor(215,217,200);

       $pdf->setY($yFilaCabecera + 3);
     $pdf->Cell($xContrato);
     $pdf->MultiCell(35,6,"NO. ORDEN",1,'C',1);
       $pdf->setY($yFilaCabecera + 3);
     $pdf->Cell($xContrato+35);
     $pdf->MultiCell(200,6,"COMENTARIOS",1,'C',1);
       $posy=$pdf->getY();
      $Alto=$posy-$PosY;
      $pdf->RoundedRect(10, $PosY, 235, $Alto, 3.50, '1001');
      $pdf->SetY($PosY-1);
      $pdf->Cell(4);
      $pdf->SetFillColor(255,255,255);
      $pdf->SetTextColor(50,100,255);
      $pdf->SetFont('Arial','B',7);
      $pdf->MultiCell(31,3,"NOTAS DEL DIA",0,'l',1);
      $pdf->SetTextColor(0,0,0);

      $pdf->SetY($posy);
    //$pdf->ln(8);
  }
function comentarios($sContrato,$fecha,$sIdConvenio,$Ordenes){
/*
   $sContrato='428237819';
   $fecha = '2007-08-08';
   $sIdConvenio='A-01';
   $Ordenes="428237819-CI,428237819-AKAL-E,428237819-AKAL-O,428237819-AKAL-F,428237819-TIERRA";
*/
   global $pdf;
   $SepEntreLineas=2;

   $sqlComentarios="
   select
      b.sNumeroOrden,
      b.mDescripcion
   from
      bitacoradeactividades b inner join tiposdemovimiento t on (
          b.sContrato=t.sContrato
          and t.sClasificacion='Notas'
          and t.sIdTipoMovimiento=b.sIdTipoMovimiento
        )
   where
        b.sContrato='$sContrato'
        and b.dIdFecha='$fecha'
        and find_in_set(sNumeroOrden,'$Ordenes') ";

   #titulos
   $rsComentarios = mysql_query($sqlComentarios)  ;
   if($rowtitle = mysql_fetch_array($rsComentarios)){
     titulosComentarios();
   }
   #obtener datos
   $yActual = $pdf->getY();
   $rsComentarios = mysql_query($sqlComentarios) ;
   while($rowComentarios = mysql_fetch_array($rsComentarios)){

     if( $pdf->getY() >220){
           $pdf->AddPage();
           $yActual = $pdf->getY();
      }

      $pdf->setY($yActual);
      $pdf->cell(35,3,$rowComentarios['sNumeroOrden'],0,0,'L',0);

      $pdf->setY($yActual);
      $pdf->cell(35);
      $pdf->Multicell(200,3,$rowComentarios['mDescripcion'],0,'L',0);

      $yInferior = $pdf->getY();
      #marco del numero de orden
      $pdf->rect(10,$yActual,35,$yInferior-$yActual);
      #marco de los comentarios
      $pdf->rect(45,$yActual,200,$yInferior-$yActual);
      $yActual =$yInferior;

   }
}
?>
