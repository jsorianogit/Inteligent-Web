<?php

/**
 * @author Adalberto Reyes Valenzuela
 * @copyright 2007
 */
/*include "../fpdf153/fpdf.php";
include "Servidor.php";
include "Encabezado_Pie.php";*/
function ContarCabezas($sContrato,$dFecha,$sNumeroOrden,$sIdTurno,$sIdConvenio,$sIdPernocta){
	$sql = "SELECT count(j.sIdPernocta)  
					FROM jornadasdiarias j 
							INNER JOIN plataformas p ON (j.sIdPlataforma = p.sIdPlataforma) 	
							INNER JOIN embarcaciones e ON (e.sContrato=j.sContrato ANd e.sIdEmbarcacion = j.sIdEmbarcacion)
							INNER JOIN pernoctan pe ON (pe.sIdPernocta = j.sIdPernocta) 
					WHERE j.sContrato='$sContrato' AND j.dIdFecha='$dFecha' AND j.sNumeroOrden='$sNumeroOrden' AND j.sIdTurno='$sIdTurno'
						AND j.sIdEmbarcacion<>'s/t' AND j.sIdEmbarcacion<>''  AND j.sIdPernocta='$sIdPernocta' order by j.sIdPernocta; ";
	$result=mysql_query($sql);
	if($row = mysql_fetch_array($result))
		return $row[0];
	else
		return 0;
}
function ContarCabezas2($sContrato,$dFecha,$sNumeroOrden,$sIdTurno,$sIdConvenio,$sIdPernocta,$sIdPlataforma){
	$sql = "SELECT count(j.sIdPernocta)  
					FROM jornadasdiarias j 
							INNER JOIN plataformas p ON (j.sIdPlataforma = p.sIdPlataforma) 	
							INNER JOIN embarcaciones e ON (e.sContrato=j.sContrato ANd e.sIdEmbarcacion = j.sIdEmbarcacion)
							INNER JOIN pernoctan pe ON (pe.sIdPernocta = j.sIdPernocta) 
					WHERE j.sContrato='$sContrato' AND j.dIdFecha='$dFecha' AND j.sNumeroOrden='$sNumeroOrden' AND j.sIdTurno='$sIdTurno'
						AND j.sIdEmbarcacion<>'s/t' AND j.sIdEmbarcacion<>''  AND j.sIdPernocta='$sIdPernocta' AND j.sIdPlataforma='$sIdPlataforma' order by j.sIdPernocta; ";
	$result=mysql_query($sql);
	if($row = mysql_fetch_array($result))
		return $row[0];
	else
		return 0;
}
function ContarCabezas3($sContrato,$dFecha,$sNumeroOrden,$sIdTurno,$sIdConvenio,$sIdPernocta,$sIdPlataforma,$sIdEmbarcacion){
 	$sql = "SELECT count(j.sIdPernocta)  
					FROM jornadasdiarias j 
							INNER JOIN plataformas p ON (j.sIdPlataforma = p.sIdPlataforma) 	
							INNER JOIN embarcaciones e ON (e.sContrato=j.sContrato ANd e.sIdEmbarcacion = j.sIdEmbarcacion)
							INNER JOIN pernoctan pe ON (pe.sIdPernocta = j.sIdPernocta) 
					WHERE j.sContrato='$sContrato' AND j.dIdFecha='$dFecha' AND j.sNumeroOrden='$sNumeroOrden' AND j.sIdTurno='$sIdTurno'
						AND j.sIdEmbarcacion<>'s/t' AND j.sIdEmbarcacion<>''  AND j.sIdPernocta='$sIdPernocta' AND j.sIdEmbarcacion='$sIdEmbarcacion' 
						AND j.sIdPlataforma='$sIdPlataforma' order by j.sIdPernocta; ";
	$result=mysql_query($sql);
	if($row = mysql_fetch_array($result))
		return $row[0];
	else
		return 0;
}
function Periodos_Fechas($sContrato,$dFecha,$sNumeroOrden,$sIdTurno,$sIdConvenio)
{
	global $TodosAutorizado,$pdf,$link;
	#informacion del contrato
	 $sql="SELECT rd.sOperacionInicio,rd.sOperacionFinal,rd.sTiempoEfectivo,rd.sTiempoMuerto,rd.sTiempoMuertoReal,con.dFechaInicio, con.dFechaFinal,ot.sDescripcionCorta
			FROM reportediario rd 
			INNER JOIN ordenesdetrabajo ot ON (rd.sContrato=ot.sContrato AND rd.sNumeroOrden=ot.sNumeroOrden) 
			INNER JOIN convenios con ON (rd.sContrato=con.sContrato AND rd.sNumeroOrden='$sNumeroOrden') 
			WHERE rd.sContrato='$sContrato' AND rd.dIdFecha='$dFecha' AND rd.sIdTurno='$sIdTurno' AND rd.sIdConvenio = '$sIdConvenio'";
	$result=mysql_query($sql,$link);
	$PosY=$pdf->getY();
	if($row=mysql_fetch_array($result))
	{
		if(!isset($xPeriodo))$xPeriodo=0.1;
		$pdf->setY($PosY);
	   /*if(($pdf->getY())>=220)$pdf->AddPage();*/
	   $pdf->SetFillColor(250,250,220);
	      $pdf->Cell($xPeriodo);
	   $pdf->Cell(70,3,$row['sDescripcionCorta'],1,1,'C',1);
	   $pdf->SetFillColor(215,217,200);
   	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(40,3,"PERIODO DE CONTRATO",1,0,'L',1);
	   $pdf->Cell(30,3,$row['dFechaInicio']." AL ".$row['dFechaFinal'],1,1,'L',0);
   	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(40,3,"INICIO DE ACTIVIDADES",1,0,'L',1);
	   $pdf->Cell(30,3,$row['sOperacionInicio'],1,1,'L',0);
   	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(40,3,"CIERRE DE ACTIVIDADES",1,0,'L',1);
	   $pdf->Cell(30,3,$row['sOperacionFinal'],1,1,'L',0);
     	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(40,3,"TIEMPO EFECTIVO DE LA ORDEN",1,0,'L',1);
	   $pdf->Cell(30,3,$row['sTiempoEfectivo'],1,1,'L',0);
     	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(40,3,"TIEMPO MUERTO DE LA ORDEN",1,0,'L',1);
	   $pdf->Cell(30,3,$row['sTiempoMuerto'],1,1,'L',0);
     	   $pdf->Cell($xPeriodo);
     	$pdf->Cell(40,3,"TIEMPO MUERTO DEL CONTRATO",1,0,'L',1);
     	
		if($TodosAutorizado==0){
		 	$pdf->SetFillColor(0,0,0);
		 	$pdf->SetTextColor(255,255,255);
			$pdf->Cell(30,3,"OBSERVACIONES",1,1,'C',1);
		}
		else
			$pdf->Cell(30,3,$row['sTiempoMuertoReal'],1,1,'L',0);
	   $pdf->SetFillColor(250,250,220);
	   $pdf->SetTextColor(0,0,0);

	}
	$yPeriodo=$pdf->getY();
	//informacion del reporte
	$sql="SELECT * 
			FROM reportediario 
			WHERE sContrato='$sContrato' AND dIdFecha='$dFecha' AND sIdTurno='$sIdTurno' AND sNumeroOrden='$sNumeroOrden'";
	$result=mysql_query($sql,$link);
	if($row=mysql_fetch_array($result))
	{
	   /*if(($pdf->getY())>=220)$pdf->AddPage();*/
	   $pdf->setY($PosY);
	   if(!isset($xFecha))$xFecha=125;
	   $pdf->SetFillColor(215,217,200);
   	   $pdf->Cell($xFecha);
	   $pdf->Cell(30,3,"FECHA",1,0,'L',1);
	   $pdf->Cell(40,3,$row['dIdFecha'],1,1,'L',0);
   	   $pdf->Cell($xFecha);
	   $pdf->Cell(30,3,"REPORTE",1,0,'L',1);
	   $pdf->Cell(40,3,$row['sNumeroReporte'],1,1,'L',0);
   	   $pdf->Cell($xFecha);
	   $pdf->Cell(30,3,"ESTADO DEL TIEMPO",1,0,'L',1);
	   $pdf->Cell(40,3,$row['sTiempo'],1,1,'L',0);
     	   $pdf->Cell($xFecha);
	   $pdf->Cell(30,3,"PLATICAS DE SEGURIDAD",1,0,'L',1);
	   $pdf->Cell(40,3,$row['sInicioPlatica']." a ".$row['sFinalPlatica'],1,1,'L',0);
     	   $pdf->Cell($xFecha);
           $yTema = $pdf->getY() ; 		
	   $pdf->MultiCell(30,6,"TEMA",1,'L',1);
           $pdf->setY($yTema);  
           $pdf->Cell($xFecha + 30);  
	   $pdf->MultiCell(40,6,$row['sTema'],1,'L',0);

	}
	$yFecha=$pdf->getY();
	if($yPeriodo>$yFecha)$pdf->setY($yPeriodo+3);
	else if($yFecha>$yPeriodo)$pdf->setY($yFecha+3);
	else if($yFecha==$yPeriodo)$pdf->setY($yFecha+3);
	
	#lanchas
	$sql = "SELECT j.sIdPernocta ,j.sIdPlataforma,j.sIdEmbarcacion, SUBSTRING(e.sDescripcion,1,10) as Embarcacion, j.sHoraInicio , j.sHoraFinal ,j.sHoraSalida , j.sHoraLlegada 
					FROM jornadasdiarias j 
							INNER JOIN plataformas p ON (j.sIdPlataforma = p.sIdPlataforma) 	
							INNER JOIN embarcaciones e ON (e.sContrato=j.sContrato ANd e.sIdEmbarcacion = j.sIdEmbarcacion)
							INNER JOIN pernoctan pe ON (pe.sIdPernocta = j.sIdPernocta) 
					WHERE j.sContrato='$sContrato' AND j.dIdFecha='$dFecha' AND j.sNumeroOrden='$sNumeroOrden' AND j.sIdTurno='$sIdTurno'
						AND j.sIdEmbarcacion<>'s/t' AND j.sIdEmbarcacion<>''  order by j.sIdPernocta,j.sIdPlataforma,j.sIdEmbarcacion; ";
	$result=mysql_query($sql,$link);
	$PosY=$pdf->getY();
	if($row=mysql_fetch_array($result))
	{
		if(!isset($xPeriodo))$xPeriodo=0.1;
		$pdf->setY($PosY);
	   /*if(($pdf->getY())>=220)$pdf->AddPage();*/
	   $pdf->SetFillColor(189,217,200);
   	   $pdf->Cell($xPeriodo+10);
	   $pdf->Cell(15,3,"Pernoctan",1,1,'L',1);
	   $pdf->SetFillColor(215,217,200);
   	   $pdf->Cell($xPeriodo+10);
	   $pdf->Cell(15,3,"Laboran",1,1,'L',1);
   	   $pdf->Cell($xPeriodo+10);
	   $pdf->Cell(15,3,"Embarcacion",1,1,'L',1);
   	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(25,3,"Hora Salida",1,1,'L',1);
   	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(25,3,"Hora de Llegada",1,1,'L',1);
     	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(25,3,"Inicio de Actividades",1,1,'L',1);
     	   $pdf->Cell($xPeriodo);
	   $pdf->Cell(25,3,"Cierre de Actividades",1,1,'L',1);
     	   $pdf->Cell($xPeriodo);
     	$_result = mysql_query($sql);
     	$tmpTam=$xAvance = 25;
     	$tamX = 15 ;
     	$ini=$ini2=$ini3=$i=1;
     	$semilla =$semilla2 =$semilla3 = "*-";
     	while($_row = mysql_fetch_array($_result)){
			
			$pdf->SetFillColor(189,217,200);
			$pdf->setY($PosY);
			
			if($semilla != $_row['sIdPernocta']){
				$cabezas = ContarCabezas($sContrato,$dFecha,$sNumeroOrden,$sIdTurno,$sIdConvenio,$_row['sIdPernocta']);
				$ini = $xPeriodo+$xAvance;
				$tam = $cabezas * $tamX; 
				$semilla = $_row['sIdPernocta'];
			}
	
			if($semilla2 != $_row['sIdPlataforma'] AND $semilla == $_row['sIdPernocta']){
				$cabezas2 = ContarCabezas2($sContrato,$dFecha,$sNumeroOrden,$sIdTurno,$sIdConvenio,$semilla,$_row['sIdPlataforma']);
				$ini2 = $xPeriodo+$xAvance;
				$tam2 = $cabezas2 * $tamX; 
				$semilla2 = $_row['sIdPlataforma'];

				$cabezas3 = ContarCabezas3($sContrato,$dFecha,$sNumeroOrden,$sIdTurno,$sIdConvenio,$semilla,$_row['sIdPlataforma'],$_row['sIdEmbarcacion']);
				$ini3 = $xPeriodo+$xAvance;
				$tam3 = $cabezas3 * $tamX; 
			}

			if($semilla3 != $_row['sIdEmbarcacion']  AND $semilla2 == $_row['sIdPlataforma'] ){
				$cabezas3 = ContarCabezas3($sContrato,$dFecha,$sNumeroOrden,$sIdTurno,$sIdConvenio,$semilla,$_row['sIdPlataforma'],$_row['sIdEmbarcacion']);
				$ini3 = $xPeriodo+$xAvance;
				$tam3 = $cabezas3 * $tamX; 
				$semilla3 = $_row['sIdEmbarcacion'];

			}


			$pdf->Cell($ini);
	   	$pdf->Cell($tam,3,$_row['sIdPernocta'],1,1,'C',1);

	     	$pdf->SetFillColor(215,217,200);
	   	
			$pdf->Cell($ini2);
	   	$pdf->Cell($tam2,3,$_row['sIdPlataforma'],1,1,'C',1);
	   	
			$pdf->Cell($ini3);
	   	$pdf->Cell($tam3,3,$_row['Embarcacion'] ,1,1,'C',1);
	   	
	   	$pdf->Cell($xPeriodo+$xAvance);
	   	$pdf->Cell($tamX,3,$_row['sHoraSalida'],1,1,'C',0);
	   	$pdf->Cell($xPeriodo+$xAvance);
	   	$pdf->Cell($tamX,3,$_row['sHoraLlegada'],1,1,'C',0);
	   	$pdf->Cell($xPeriodo+$xAvance);
	   	$pdf->Cell($tamX,3,$_row['sHoraInicio'],1,1,'C',0);
	   	$pdf->Cell($xPeriodo+$xAvance);
	   	$pdf->Cell($tamX,3,$_row['sHoraFinal'],1,1,'C',0);
	   	$xAvance+=$tamX;		
		} 
	}
	$yPeriodo=$pdf->getY();
	$pdf->setY($yPeriodo+3);
	
}

//$pdf=new PDF();
/*Agregar pagina*/
//$pdf->AddPage();
/*Poner fuente*/
//$pdf->SetFont('Arial','',6);
//Periodos_Fechas("418235943","2007-03-29","A");
//$pdf->Cell(30,3,$pdf->getY(),1,0,'L',1);
//$pdf->Output(); 
?>
