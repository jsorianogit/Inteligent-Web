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
function Comentario($sContrato,$sNumeroOrden,$sIdConvenio,$iFolio)
{
   global $pdf,$link;
   //Verificar Existencia de registros en tabla bitacoradepersonal y personal
   $sql="
      SELECT
         a.iFolio AS sNumeroEntrada,
         a.sNumeroOrden,
         a.dIdFecha AS FechaCaptura,
         a.dFechaAviso AS dFechaRecepcion,
         ma.sDescripcion AS sTipoEntrada,
         a.sReferencia 
      FROM 
         anexo_suministro a INNER JOIN movimientosdealmacen ma ON (a.sIdTipo=ma.sIdTipo) 
      WHERE a.sContrato='$sContrato' and a.iFolio='$iFolio';";
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
      
      $pdf->SetFont('Arial','B',6);
      $LENGTH=30;
      $spacing=5;
      $pdf->Cell($spacing);
      $pdf->Cell($LENGTH,3,'TIPO DE ENTRADA:' ,0,0,'L',0);
      $pdf->SetFont('Arial','',6);
      $pdf->Cell($LENGTH,3,$row['sTipoEntrada'] ,0,1,'L',0);
    
      $pdf->SetFont('Arial','B',6);   
      $pdf->Cell($spacing); 
      $pdf->Cell($LENGTH,3,'No. DE ENTRADA:' ,0,0,'L',0);
      $pdf->SetFont('Arial','',6);
      $pdf->Cell($LENGTH,3,$row['sNumeroEntrada'] ,0,1,'L',0);    

      $pdf->SetFont('Arial','B',6);
      $pdf->Cell($spacing);
      $pdf->Cell($LENGTH,3,'No. DE ORDEN:' ,0,0,'L',0);
      $pdf->SetFont('Arial','',6);
      $pdf->Cell($LENGTH,3,$row['sNumeroOrden'] ,0,1,'L',0);  

      $pdf->SetFont('Arial','B',6);
      $pdf->Cell($spacing);
      $pdf->Cell($LENGTH,3,'REFERENCIA:' ,0,0,'L',0);
      $pdf->SetFont('Arial','',6);
      $pdf->Cell($LENGTH,3,$row['sReferencia'] ,0,1,'L',0);  
                
      $pdf->SetFont('Arial','B',6);
      $pdf->Cell($spacing);
      $pdf->Cell($LENGTH,3,'FECHA DE RECEPCIÓN:' ,0,0,'L',0);
      $pdf->SetFont('Arial','',6);
      $pdf->Cell($LENGTH,3,$row['dFechaRecepcion'] ,0,1,'L',0); 
      
      $pdf->SetFont('Arial','B',6);
      $pdf->Cell($spacing);
      $pdf->Cell($LENGTH,3,'FECHA DE CAPTURA:' ,0,0,'L',0);
      $pdf->SetFont('Arial','',6);
      $pdf->Cell($LENGTH,3,$row['FechaCaptura'] ,0,1,'L',0); 
   
   
      $posy=$pdf->getY();
      $pdf->RoundedRect($PosX, $PosY, 195, 25, 3.50, '1111');
      $pdf->SetY($PosY-1);
      $pdf->Cell(4);
      $pdf->SetFillColor(0,200,255);
      $pdf->SetTextColor(0,0,0);
      $pdf->SetFont('Arial','B',7);
      $pdf->MultiCell(75,3,"LISTA DE VERIFICACIÓN DE RECEPCIÓN DE MATERIALES",1,'C',1);
      $pdf->SetFont('Arial','B',7);
      $pdf->SetTextColor(0,0,0);
      $pdf->SetY($posy);
      $NumComentarios++;
   }
   $pdf->ln(3);
    $sql = "select 
            ap.iFolio,
            ao.sNumeroOrden,
            ap.sNumeroActividad,
            ao.mDescripcion as mDescripcion,
            ao.sMedida,
            aa.dCantidadAnexo, 
            ap.dCantidad as dCantidadRecibida
         from  
            anexo_psuministro ap 
            INNER JOIN actividadesxorden ao ON (ap.sContrato=ao.sContrato and ap.sNumeroActividad=ao.sNumeroActividad)
            INNER JOIN actividadesxanexo aa ON (ap.sContrato=aa.sContrato and ap.sNumeroActividad=aa.sNumeroActividad and aa.sIdConvenio=ao.sIdConvenio)
         where 
            ap.sContrato='$sContrato'  
            and ao.sIdConvenio='$sIdConvenio'  
            and ao.sTipoActividad='Actividad'
            and aa.sTipoActividad='Actividad'
            and ap.iFolio='$iFolio';";

   $sql ="Select a1.dCantidad as cantidad, a2.*, a.sNumeroActividad, a.mDescripcion, a.sMedida, a.dCantidadAnexo as Canexo, a.dVentaMN, a.dVentaDLL
         from anexo_psuministro a1
         inner join anexo_suministro a2  on (a1.sContrato = a2.sContrato And a1.iFolio = a2.iFolio)
         inner join actividadesxanexo a on (a1.sContrato = a.sContrato And a.sIdConvenio = '$sIdConvenio' And a1.sNumeroActividad = a.sNumeroActividad)
         Where a1.sContrato = '$sContrato' And a1.iFolio = '$iFolio' Order By a.sIdFase, a.iItemOrden";

   $pdf->SetFont('Arial','B',6);
   $pdf->SetFillColor(192,192,192);
   
   $pdf->Cell(12,3,'#' ,1,0,'L',1);
   $pdf->Cell(20,3,'PARTIDA ANEXO' ,1,0,'C',1);
   $pdf->Cell(82,3,'DESCRIPCION' ,1,0,'C',1);
   $pdf->Cell(20,3,'UNIDAD' ,1,0,'C',1);
   $pdf->Cell(20,3,'CANT. ANEXO' ,1,0,'C',1);
   $pdf->Cell(20,3,'CANT. RACIBIDA' ,1,0,'C',1);
   $pdf->Cell(20,3,'ACUM. RACIBIDO' ,1,1,'C',1);
   $pdf->SetFillColor(255,255,255);
   
   $pdf->SetFont('Arial','',6);
   $result = mysql_query($sql);
   $i=0;
   $MaxLetraxLinea=63;
   $anterior = "_";
   $acumulado = 0;
   $y = $pdf->getY();
   while($row = mysql_fetch_array($result)){
      if($anterior!=$row['sNumeroActividad']){
         $anterior = $row['sNumeroActividad'];
         $acumulado = $row['cantidad'];
      }
      else
         $acumulado+=$row['cantidad'];

      if($y>=240){
         $pdf->AddPage();
         $y = $pdf->getY();
      };
      $entero = 3;
      $pdf->setY($y);
      $pdf->Cell(12,$entero,(++$i),0,0,'L',1);

      $pdf->setY($y);
      $pdf->Cell(12);
      $pdf->Cell(20,$entero,$row['sNumeroActividad'] ,0,0,'C',1);

      $pdf->setY($y);
      $pdf->Cell(32);
      $pdf->MultiCell(82,3,$row['mDescripcion'] ,1,'L','L',1);
      $yInferior = $pdf->getY();

      $pdf->setY($y);
      $pdf->Cell(114);
      $pdf->Cell(20,$entero,$row['sMedida'] ,0,0,'C',1);

      $pdf->setY($y);
      $pdf->Cell(134);
      $pdf->Cell(20,$entero,$row['Canexo'] ,0,0,'R',1);

      $pdf->setY($y);
      $pdf->Cell(154);
      $pdf->Cell(20,$entero,$row['cantidad'] ,0,0,'R',1);

      $pdf->setY($y);
      $pdf->Cell(174);
      $pdf->Cell(20,$entero,$acumulado ,0,1,'R',1);

      #marcos de textos
      $alto =$yInferior-$y;
      $pdf->rect(10,$y,12,$alto);
      $pdf->rect(22,$y,20,$alto);
      $pdf->rect(124,$y,20,$alto);
      $pdf->rect(144,$y,20,$alto);
      $pdf->rect(164,$y,20,$alto);
      $pdf->rect(184,$y,20,$alto);
      $y = $yInferior;

   }
}

?>
