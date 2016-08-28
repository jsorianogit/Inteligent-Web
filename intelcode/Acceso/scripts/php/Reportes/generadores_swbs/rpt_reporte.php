<?php
/**
 * @author Adalberto Reyes Valenzuela
 * @copyright 2007
 */
 //Pasar parametro Numero de orden
 //Tomar de la tabla configuracion el campo sClaveSeguridad
 //Para personal, parametros necesarios: contrato, orden fecha y turno
 //Para equipo =.
/*$sContrato="418235943";
include "../fpdf153/fpdf.php";
include "Servidor.php";
include "Encabezado_Pie.php";*/
function Sumas($Desc,$Valor)
{
   global $PosYpersonal,$posY,$pdf,$lineal;
   $pdf->SetFillColor(215,217,200);
   $pdf->SetY($PosYpersonal);
   $lineal=$PosYpersonal;
   $pdf->MultiCell(54,3,$Desc." ".$PosYpersonal,0,-1);
   $posY=$PosYpersonal;
   $PosYpersonal=$pdf->GetY();
   $pdf->SetY($posY);
   $pdf->Cell(54);
   $pdf->MultiCell(10,3,$Valor,0,0);
   $PosYpersonal=$pdf->GetY();
}
function tituloTablas($Y,$X,$Titulo,$Desc)
{
   global $pdf;
   $pdf->SetFillColor(215,217,200);
   $pdf->SetY($Y);
   $pdf->cell($X);
   $pdf->MultiCell(64,3,$Titulo,1,'C',1); 
   $Y=$pdf->getY();
   $pdf->cell($X);
   $pdf->MultiCell(54,3,$Desc,1,'C');
   $pdf->SetY($Y);
   $pdf->cell($X+54);   
   $pdf->MultiCell(10,3,"CANT.",1,'C');   
}
function Tablas($sContrato,$dFecha,$sNumeroOrden,$sTurno)
{
   global $pdf,$link;//,$lineall,$Limite;
   $ContPersonal=$ContHerramientas=$ContSeguridad=0;
   $yLimit=240;
   $SumaGrupo=0;
   $SumaTotal=0;
   //Leer posicion vertical actual
   if($pdf->getY()>230)
      {
         $pdf->AddPage();
      }
   $pdf->ln();
   $lineal=$pdf->getY();
   $sqlConfiguracion="SELECT sOrdenPerEq,sClaveSeguridad FROM configuracion WHERE  sContrato='$sContrato'";
   $rsVerifica=mysql_query($sqlConfiguracion,$link);
   while($rowVerifica=mysql_fetch_array($rsVerifica))
   {
      
      $sTipoEquipo=$rowVerifica[1];
      if($rowVerifica[0]=="Laboran")
         $sqlPersonal= "SELECT bp.sContrato, bp.sIdPersonal, bp.dCantidad, pe.sDescripcion, p.sDescripcion as sUbicacion
               FROM bitacoradepersonal bp
               INNER JOIN bitacoradeactividades b on (bp.sContrato=b.sContrato AND bp.dIdFecha=b.dIdFecha AND bp.iIdDiario=b.iIdDiario AND b.sNumeroOrden='$sNumeroOrden' AND b.sIdTurno='$sTurno')
               INNER JOIN personal pe on (bp.sContrato=pe.sContrato and bp.sIdPersonal=pe.sIdPersonal)
               INNER JOIN plataformas p on (bp.sIdPlataforma = p.sIdPlataforma)
               WHERE bp.sContrato='$sContrato' AND bp.dIdFecha='$dFecha' and b.sNumeroOrden='$sNumeroOrden' ORDER BY bp.sIdPlataforma, p.sDescripcion desc";
      else
         $sqlPersonal="SELECT bp.sContrato, bp.sIdPersonal, bp.dCantidad, pe.sDescripcion, p.sDescripcion as sUbicacion
               FROM bitacoradepersonal bp
               INNER JOIN bitacoradeactividades b on (bp.sContrato=b.sContrato AND bp.dIdFecha=b.dIdFecha AND bp.iIdDiario=b.iIdDiario AND b.sNumeroOrden='$sNumeroOrden' AND b.sIdTurno='$sTurno')
               INNER JOIN personal pe on (bp.sContrato=pe.sContrato and bp.sIdPersonal=pe.sIdPersonal)
               INNER JOIN pernoctan p on (bp.sIdPernocta = p.sIdPernocta)
               WHERE bp.sContrato='$sContrato' AND bp.dIdFecha='$dFecha' and b.sNumeroOrden='$sNumeroOrden' ORDER BY bp.sIdPernocta, p.sDescripcion desc";
         
   }
   //
   //Verificar Existencia de registros en tabla bitacoradepersonal y personal
   
   //$sqlPersonal="SELECT * FROM proyecto ORDER BY pro_cve ";
   $rsPersonal=mysql_query($sqlPersonal,$link);
   if($rowPersonal=mysql_fetch_array($rsPersonal))
   {
      $ContPersonal=1;
      tituloTablas($lineal,0.01,"CONTROL DE PERSONAL","CATEGORIA");
      $totalPersonal = mysql_num_rows($rsPersonal);
   }
   //Verificar Existencia de registros en tabla  bitacoradeequipos y equipos <> equipo de seguridad
   $sqlHerramientas="SELECT be.sIdEquipo,be.sContrato, be.dCantidad, eq.sDescripcion, p.sDescripcion as sUbicacion FROM bitacoradeequipos be
         INNER JOIN bitacoradeactividades b on (be.sContrato=b.sContrato AND be.dIdFecha=b.dIdFecha AND be.iIdDiario=b.iIdDiario AND b.sNumeroOrden='$sNumeroOrden' AND b.sIdTurno='$sTurno')
         INNER JOIN equipos eq on (be.sContrato=eq.sContrato AND be.sIdEquipo=eq.sIdEquipo)
         INNER JOIN pernoctan p on (be.sIdPernocta = p.sIdPernocta)
         WHERE be.sContrato='$sContrato' and b.sNumeroOrden='$sNumeroOrden' AND be.dIdFecha='$dFecha' AND eq.sIdTipoEquipo<>'$sTipoEquipo'
         ORDER BY be.sIdPernocta, eq.sDescripcion  desc";
   //$sqlHerramientas="SELECT * FROM empresa ORDER BY emp_cve" ;
   $rsHerramientas=mysql_query($sqlHerramientas,$link);
   if($rowHerramientas=mysql_fetch_array($rsHerramientas))
   {
      $ContHerramientas=1;
      tituloTablas($lineal,65,"CONTROL DE HERRAMIENTAS Y EQUIPO","DESCRIPCION");
      $totalHerramientas = mysql_num_rows($rsHerramientas);
   }
   
   //Verificar Existencia de registros en tabla  bitacoradeequipos y equipos = equipo de seguridad
   $sqlSeguridad="SELECT be.sIdEquipo,be.sContrato,be.dCantidad, eq.sDescripcion, p.sDescripcion as sUbicacion FROM bitacoradeequipos be 
         INNER JOIN bitacoradeactividades b on (be.sContrato=b.sContrato AND be.dIdFecha=b.dIdFecha AND be.iIdDiario=b.iIdDiario AND b.sNumeroOrden='$sNumeroOrden' AND b.sIdTurno='$sTurno')
         INNER JOIN equipos eq on (be.sContrato=eq.sContrato AND be.sIdEquipo=eq.sIdEquipo) 
          INNER JOIN pernoctan p on (be.sIdPernocta = p.sIdPernocta)       
         WHERE be.sContrato='$sContrato' and b.sNumeroOrden='$sNumeroOrden'  AND be.dIdFecha='$dFecha' AND eq.sIdTipoEquipo='$sTipoEquipo' 
         ORDER BY be.sIdPernocta, eq.sDescripcion  desc";
// $sqlSeguridad="SELECT * FROM especialidad ORDER BY esp_cve" ;
   $rsSeguridad=mysql_query($sqlSeguridad,$link);
   if($rowSeguridad=mysql_fetch_array($rsSeguridad))
   {
      $ContSeguridad=1;
      tituloTablas($lineal,130,"CONTROL DE EQUIPO DE SEGURIDAD","DESCRIPCION");
      $totalSeguridad= mysql_num_rows($rsSeguridad);
   }
   
   //Ejecutar consultas
        $pdf->SetFont('Arial', '' , 5) ;
   $rsPersonal=mysql_query($sqlPersonal,$link);
   $rsHerramientas=mysql_query($sqlHerramientas,$link);
   $rsSeguridad=mysql_query($sqlSeguridad,$link);
   //Leer posicion vertical actual para comenzar a imprimir las tablas de forma inicial linealmente
   $lineal=$pdf->getY();
   
   $sOrdenPersonal = "";
   $sOrdenHerramientas = "";
   $sOrdenSeguridad = "";  
  $conPersonal=$conHerramientas=$contSeguridad=0;
   while($ContPersonal or $ContHerramientas or $ContSeguridad)//Mientras existan registros en cualquiera de las tablas
   {
      //Asignar coordenada Y de comienzo
      if($lineal!=0)
      {
         $PosYpersonal=$lineal;
         $PosYseguridad=$PosYherramientas=$PosYpersonal;
      }

      
      /*···························Si hay registros de personal Mostrarlos···················*/
      /*··············Posicion X1=10, X2=64 , Y1= Desconocido, Y2=Desconocido················*/

      if($rowPersonal=mysql_fetch_array($rsPersonal))
      {
           $conPersonal++;
         If( $rowPersonal[4] != $sOrdenPersonal)         
         {

            $sOrdenPersonal = $rowPersonal[4] ;
            /*************************************/
            if($SumaGrupo>0)
            {
               $pdf->SetFillColor(215,217,200);
               $pdf->SetY($PosYpersonal);
               $lineal=$PosYpersonal;
               $pdf->MultiCell(54,3,"TOTAL GRUPO:",1,-1,1);
               $posY=$PosYpersonal;
               $PosYpersonal=$pdf->GetY();
               $pdf->SetY($posY);
               $pdf->Cell(54);
               $pdf->MultiCell(10,3,$SumaGrupo,1,0);
               $SumaTotal=$SumaTotal+$SumaGrupo;
               $SumaGrupo=0;
               
            }
            
            /************************************/
            $pdf->SetFillColor(215,217,200);
            $pdf->setY($PosYpersonal);
            $pdf->MultiCell(64,3,$sOrdenPersonal,1,'C',1);  
            $PosYpersonal=$pdf->getY();            
         } 
         
         $pdf->SetY($PosYpersonal);
         $lineal=$PosYpersonal;
         $pdf->MultiCell(54,3,$rowPersonal[3],0,-1);/*Descripcion del personal*/
         $posY=$PosYpersonal;
         $PosYpersonal=$pdf->GetY();
         $pdf->SetY($posY);
         $pdf->Cell(54);
         $pdf->MultiCell(10,3,$rowPersonal[2],0,0);/*Cantidad de personal*/
         $SumaGrupo=$SumaGrupo+$rowPersonal[2];
         //marco
         $pdf->SetTextColor(254,254,254); //letras blancas
         $pdf->SetY($posY);
         $pdf->MultiCell(64,$PosYpersonal-$posY,"",1,-1);//Tamaño = Posicion Y actual -  Posicion Y anterior
         $pdf->SetTextColor(0,0,0); //letras negras
         //end marco 
      }
      else
      {
         if($ContPersonal!=0)
         {
            $pdf->SetFillColor(215,217,200);
            $pdf->SetY($PosYpersonal);
            $lineal=$PosYpersonal;
            $pdf->MultiCell(54,3,"TOTAL GRUPO:",1,-1,1);
            $posY=$PosYpersonal;
            $PosYpersonal=$pdf->GetY();
            $pdf->SetY($posY);
            $pdf->Cell(54);
            $pdf->MultiCell(10,3,$SumaGrupo,1,0);
            $SumaTotal=$SumaTotal+$SumaGrupo;
            $pdf->SetFillColor(215,217,200);
            $pdf->SetY($PosYpersonal);
            $lineal=$PosYpersonal;
            $pdf->MultiCell(54,3,"TOTAL:",1,-1,1);
            $posY=$PosYpersonal;
            $PosYpersonal=$pdf->GetY();
            $pdf->SetY($posY);
            $pdf->Cell(54);
            $pdf->MultiCell(10,3,$SumaTotal,1,0);
         }
         $ContPersonal=0;//Se terminan los registros  
      }
               
      
      /*···························Si hay registros de herramientas Mostrarlos···················*/
      /*··············Posicion X1=65, X2=129 , Y1= Desconocido, Y2=Desconocido···················*/
      if($rowHerramientas=mysql_fetch_array($rsHerramientas))
      {
         $conHerramientas++;
         If( $rowHerramientas[4] != $sOrdenHerramientas)          
         {

            $sOrdenHerramientas= $rowHerramientas[4] ;
            $pdf->SetFillColor(215,217,200);
            $pdf->setY($PosYherramientas);
            $pdf->cell(65);
            $pdf->MultiCell(64,3,$sOrdenHerramientas,1,'C',1); 
            $PosYherramientas=$pdf->getY();           
         } 
         $pdf->SetY($PosYherramientas);
         $pdf->Cell(65);
         $pdf->MultiCell(54,3,$rowHerramientas[3],0,-1);/*Descripcion de equipo*/
         $posY=$PosYherramientas;
         $PosYherramientas=$pdf->GetY();
         $pdf->SetY($posY);
         $pdf->Cell(119);
         $pdf->MultiCell(10,3,$rowHerramientas[2],0,0);/*Cantidad de equipo*/
         //marco
         $pdf->SetTextColor(254,254,254); //letras blancas
         $pdf->SetY($posY);
         $pdf->Cell(65);
         $pdf->MultiCell(64,$PosYherramientas-$posY,"",1,-1);//Tamaño = Posicion Y actual -  Posicion Y anterior
         $pdf->SetTextColor(0,0,0); //letras negras   
      }
      else
      {
         $ContHerramientas=0;//Se terminan los registros
      }  
      
      /*···························Si hay registros de equipo de seguiridad Mostrarlos···················*/
      /*·············   Posicion X1=130, X2=194 , Y1= Desconocido, Y2=Desconocido························*/
      if($rowSeguridad=mysql_fetch_array($rsSeguridad))
      {
         $contSeguridad++;
         If( $rowSeguridad[4] != $sOrdenSeguridad)          
         {

            $sOrdenSeguridad = $rowSeguridad[4] ;
            $pdf->SetFillColor(215,217,200);
            $pdf->setY($PosYseguridad);
            $pdf->cell(130);
            $pdf->MultiCell(64,3,$sOrdenSeguridad,1,'C',1); 
            $PosYseguridad=$pdf->getY();           
         } 
         $pdf->SetY($PosYseguridad);
         $pdf->Cell(130);
         $pdf->MultiCell(54,3,$rowSeguridad[3],0,-1);/*descripcion de equipo de seguridad*/
         $posY=$PosYseguridad;
         $PosYseguridad=$pdf->GetY();
         $pdf->SetY($posY);
         $pdf->Cell(184);
         $pdf->MultiCell(10,3,$rowSeguridad[2],0,0);/*cantidad de equipo de seguridad*/
         //marco
         $pdf->SetTextColor(254,254,254); //letras blancas
         $pdf->SetY($posY);
         $pdf->Cell(130);
         $pdf->MultiCell(64,$PosYseguridad-$posY,"",1,-1);//Tamaño = Posicion Y actual -  Posicion Y anterior
         $pdf->SetTextColor(0,0,0); //letras negras   
      }
      else
      {
         $ContSeguridad=0;//Se terminan los registros
      }
      //Agregar hoja si cualquier tabla excede el limite
      if($PosYpersonal>$yLimit or $PosYherramientas>=$yLimit or $PosYseguridad>=$yLimit)
      {
         if($ContPersonal or $ContHerramientas or $ContSeguridad)
         {
            if($conPersonal<$totalPersonal or $conHerramientas<$totalHerramientas or $contSeguridad<$totalSeguridad){
               $pdf->AddPage();
               $PosYpersonal=$PosYherramientas=$PosYseguridad=$pdf->getY();
            }
         }
      }
      $lineal=0;
   }
}
/*
$pdf=new PDF();
//Agregar pagina
$pdf->AddPage
//Poner fuente
$pdf->SetFont('Arial','',6);
Tablas($sContrato,$dFecha,$sNumeroOrden,$sTurno);
$pdf->Output(); */
?>
