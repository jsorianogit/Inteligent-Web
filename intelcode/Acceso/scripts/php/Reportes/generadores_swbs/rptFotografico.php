<?php

/*
include "../fpdf153/fpdf.php"; 
include "Servidor.php";
include "Encabezado_Pie.php";*/
/*Obtiene las imagenes de la BD y las guarda en disco*/

function GetImageFotografico($sContrato,$dFecha,$sNumeroOrden,$sIdTurno)
{
   global $Foto,$sDescripcion,$sql2,$sNumeroReporte;
   $sql2="SELECT *
           FROM reportediario
        WHERE sContrato='$sContrato' AND dIdFecha='$dFecha' AND sIdTurno='$sIdTurno' AND sNumeroOrden='$sNumeroOrden'";
      $result = mysql_query($sql2);
      if($row = mysql_fetch_array($result))
   {
      $sNumeroReporte=$row[5];
   }
   else
       $sNumeroReporte ="";
   //$sNumeroReporte='418235943-AKAL-C-PP-134';
  $sql="SELECT rf.sContrato, rf.sNumeroReporte, rf.iImagen, rf.bImagen, rf.sDescripcion
         FROM reportefotografico rf
         WHERE rf.sContrato = '$sContrato' AND rf.sNumeroReporte='$sNumeroReporte' AND rf.lIncluye = 'Si' 
         ORDER BY iImagen";
   $result = mysql_query($sql);
   $NumImg=0;
   while($row = mysql_fetch_array($result))
   {
      if($row['bImagen']=="")continue;
      $NumImg++;
      $Foto[$NumImg]=$row['sContrato']."_".$row['sNumeroReporte']."_".$NumImg.".jpg";
      $Foto[$NumImg] = str_replace("/","",$Foto[$NumImg]);
      $sDescripcion[$NumImg]=$row['sDescripcion'];
      $fp = fopen("./photo/".$Foto[$NumImg],"w+");
      fwrite($fp, $row['bImagen']);
      fclose($fp); 
   }  
   PrintImageFotografico();
  // rmImageFotografico();
}
/*Lee las imagenes y las pone en el PDF*/
function PrintImageFotografico()
{
   global $Foto,$sDescripcion,$pdf,$sql2,$sNumeroReporte;
   $NumImg=0;
   $Tamanio=sizeof($Foto);
   if($NumImg<$Tamanio)
        $pdf->AddPage();
   $PosX=27;
   $Separacion=15;
   $x=$PosX;
   $y=$pdf->GetY()+10;
   $Ancho=73;
   $Alto=54;
   $yTexto=$Contador=0;
   //$pdf->MultiCell($Ancho,3,$sql2,1,'C',0);
   while($NumImg<$Tamanio)
   {
      $NumImg++;
      $pdf->image("photo/".$Foto[$NumImg],$x,$y,$Ancho,$Alto);
      //Contar imagenes impresas
      $Contador++;
      //Imprimir descripcion
      $pdf->setY($y+55);      
      $pdf->Cell($x-10);
      $yTextoSup=$pdf->getY();
      $pdf->SetFont('Arial','',5) ;
      $pdf->MultiCell($Ancho,3,$sDescripcion[$NumImg],1,'C',0);
      $yTexto=$pdf->getY()-$yTextoSup;
      //Marco de cada imagen con su comentario
      /*$AltoMarco=($pdf->getY()-$y)+10;
      $Xmarco=$x-5;
      $Ymarco=$y-5;
      $AnchoMarco=83;
     $pdf->RoundedRect($Xmarco, $Ymarco, $AnchoMarco, $AltoMarco, 3.50, '1111');*/
      //Calcular las nuevas posiciones de imagenes
      if($x==$PosX)
      {
         $x+=($Ancho+$Separacion);
      }
      else
      {
         $x=$PosX;$y+=($Alto+$yTexto+10+5);
         if($Contador<4)
         {
            $pdf->RoundedRect(22, $y-($Alto+$yTexto+20), 83,$y-($Alto-10) , 3.50, '1111');
            $pdf->RoundedRect(109, $y-($Alto+$yTexto+20), 83, $y-($Alto-10), 3.50, '1111');
         }
         else
         {
            $pdf->RoundedRect(22, $y-($Alto+$yTexto+20), 83,$y-($Alto+$yTexto+50), 3.50, '1111');
            $pdf->RoundedRect(109, $y-($Alto+$yTexto+20), 83, $y-($Alto+$yTexto+50), 3.50, '1111');
            
         }
         
      }
      //Reinicializar variables
      if($pdf->getY()>230 or ($Contador==4 and $Contador<$Tamanio)) //$Tamanio
      {
         $pdf->AddPage();
         $Contador=0;
         $y=$pdf->GetY()+10;
      }
      
      
   }
      if($x!=$PosX)
      {
         $y+=($Alto+$yTexto+10+5);
         if($Contador<3)
         {
            $pdf->RoundedRect(22, $y-($Alto+$yTexto+20), 83,$y-($Alto-10) , 3.50, '1111');
         }
         else
         {
            $pdf->RoundedRect(22, $y-($Alto+$yTexto+20), 83,$y-($Alto+$yTexto+50), 3.50, '1111');
         }
         
      }
}
/*Borra las imagenes temporales*/
function rmImageFotografico()
{
   global $Foto;
   $NumImg=0;
   while($NumImg<sizeof($Foto))
   {
      $NumImg++;
      unlink("photo/".$Foto[$NumImg]); 
   }  
}
/*
$pdf=new PDF();
//$pdf->AddPage();   
$pdf->SetFont('Arial','',6);
$sContrato='418235943';
$reporte='418235943-AKAL-C-PP-134';
GetImageFotografico($sContrato,$reporte);
PrintImageFotografico();
$nameReport=$sContrato."_".$reporte."_".date("Ymd").".pdf";
$pdf->Output("reports/".$nameReport);
echo "<SCRIPT LANGUAGE=\"javascript\">location.href = \"./reports/$nameReport\";</SCRIPT>;";*/
?>
