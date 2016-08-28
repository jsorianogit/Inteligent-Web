<?php
/**
 * @author Adalberto Reyes Valenzuela
 * @copyright 2007
 */
/*include "../fpdf153/fpdf.php";
include "Servidor.php";
include "Encabezado_Pie.php";*/
function Tam()
{

  
}
function Comentario($sContrato,$dFecha,$sNumeroOrden,$sIdTurno)
{
	global $pdf,$link;
	//Verificar Existencia de registros en tabla bitacoradepersonal y personal
	$sql="SELECT ba.sContrato, ba.mDescripcion 
	FROM bitacoradeactividades ba 
	INNER JOIN tiposdemovimiento tm ON (ba.sContrato = tm.sContrato AND ba.sIdTipoMovimiento = tm.sIdTipoMovimiento AND tm.sClasificacion = 'Notas')
	WHERE ba.sContrato = '$sContrato' AND ba.dIdFecha = '$dFecha' AND ba.sNumeroOrden = '$sNumeroOrden' AND ba.sIdTurno = '$sIdTurno'";
	$result=mysql_query($sql,$link);
   $anchoCaracter =1 ;
   $NumComentarios=1;
	while($row=mysql_fetch_array($result))
	{
	  // $pdf->ln(195);.

     If ($pdf->getY()>=220)   
     {
			  $pdf->AddPage();
		 }
		  $Y=$pdf->getY();
		  //Obtener el total de enters
		  $Cadena=$row[1];
		  $NumEnters=0;
		  for($i=0;$i<strlen($Cadena);$i++)
		    if($Cadena[$i]=="\n")
		        $NumEnters++;
		  //Contar el numero de lineas posibles
		 $NumLineas=strlen($row[1])/120;
		 //Determinar el total de lineas
     $lineas=$NumLineas+$NumEnters;
		 if($pdf->getY()+$lineas>200)
            $pdf->AddPAge();
	   $pdf->ln(7);
	   $PosY=$pdf->getY()-5;
	   $PosX=$pdf->getX();
     $pdf->SetFont('Arial','',6);
     $pdf->MultiCell(195,3,$row[1],0,1);
	   $posy=$pdf->getY();
	   $Alto=$posy-$PosY;
	   if($NumComentarios<2)
	   	$Angulos='1001';
	   else
	   	$Angulos='0000;';
	   $pdf->RoundedRect($PosX, $PosY, 195, $Alto, 3.50, $Angulos);
	   $pdf->SetY($PosY-1);
	   $pdf->Cell(4);
	   $pdf->SetFillColor(255,255,255);
	   $pdf->SetTextColor(50,100,255);
	   $pdf->SetFont('Arial','B',7);
	   if($NumComentarios<2)$pdf->MultiCell(21,3,"COMENTARIOS",0,'C',1);
	   $pdf->SetFont('Arial','B',7);
	   $pdf->SetTextColor(0,0,0);
	   $pdf->SetY($posy);
	   $NumComentarios++;
	}
	$pdf->ln(3);
}

//$pdf=new PDF();
/*Agregar pagina*/
//$pdf->AddPage();
/*Poner fuente*/
//$pdf->SetFont('Arial','',6);
//Comentario("418235943","418235943-AKAL-C-PP","2007-03-29","A");
//$pdf->Output(); 
?>
