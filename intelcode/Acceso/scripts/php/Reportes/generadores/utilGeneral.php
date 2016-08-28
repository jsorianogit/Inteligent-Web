<?php


Function sfnSumaHoras ( $sParamHorasMax, $sParamHorasMin) 
{
  global $sfnResultHoras ;
  $sParamHorasMax = Trim($sParamHorasMax) ;
  $sParamHorasMin = Trim($sParamHorasMin) ; 

  $nHorasMax = 0 ;
  $nMinutosMax = 0 ;
  $nHorasMin = 0 ;
  $nMinutosMin = 0 ;
  
  $xPos = 0 ;
//  echo $sParamHorasMax . '*****' ;
//  echo substr($sParamHorasMax , 2, 1 ) . '*****' ; 

  If (substr($sParamHorasMax , 2, 1 ) == ':')
     $xPos = 2 ;
  Else   
     If (substr($sParamHorasMax , 3, 1 ) == ':')
        $xPos = 3 ;
     Else
        If (substr($sParamHorasMax , 4, 1 ) == ':')
           $xPos = 4 ;
        Else
           If (substr($sParamHorasMax , 5, 1 ) == ':')
              $xPos = 5 ;
        

  $nHorasMax = substr($sParamHorasMax , 0, $xPos ) ;
  $nMinutosMax = substr($sParamHorasMax , $xPos + 1 , 2) ;

  $xPos = 0 ;
  If (substr($sParamHorasMin , 2, 1 ) == ':')
     $xPos = 2 ;
  Else   
     If (substr($sParamHorasMin , 3, 1 ) == ':')
        $xPos = 3 ;
     Else
        If (substr($sParamHorasMin , 4, 1 ) == ':')
           $xPos = 4 ;
        Else
           If (substr($sParamHorasMin , 5, 1 ) == ':')
              $xPos = 5 ;

  $nHorasMin = substr($sParamHorasMin , 0, $xPos ) ;
  $nMinutosMin = substr($sParamHorasMin , $xPos + 1, 2) ;

//  echo $sParamHorasMin . ' ==== Horas '  . $nHorasMin . ' Minutos ' . $nMinutosMin .' **** ' ;

//  echo $nHorasMax . '*****' . $nHorasMin ; 

  $nMinutosResult = $nMinutosMax + $nMinutosMin ;
  $nHorasResult = $nHorasMax + $nHorasMin ;

 If ($nMinutosResult >= 60)
  {
      $nHorasResult  = $nHorasResult + 1 ;
      $nMinutosResult = $nMinutosResult - 60 ;
  }

  $sHoras = Trim ($nHorasResult) ;
  If ($nHorasResult >= 10) 
      $sHoras = $sHoras . ':' ;
  Else
      $sHoras = '0' . $sHoras . ':' ;

//  Str( nMinutosResult:2:0 , sMinutos ) ;
  $sMinutos = Trim ($nMinutosResult) ;
  If ($nMinutosResult >=10)
     $sfnResultHoras = $sHoras . $sMinutos ;
  Else
     $sfnResultHoras = $sHoras . '0' . $sMinutos ;
     
}


function fnFirmasAutorizadas ( $sContrato, $sNumeroOrden, $dIdFecha, $yFilaFirmas, $formato)
{
   global $link, $pdf ;
   global $sFirmante1, $sFirmante2, $sFirmante3, $sFirmante4, $sFirmante5, $sFirmante6, $sFirmante7, $sFirmante8, $sFirmante9, $sFirmante10 ;
   global $sPuesto1, $sPuesto2, $sPuesto3, $sPuesto4, $sPuesto5,  $sPuesto6,  $sPuesto7,  $sPuesto8,  $sPuesto9, $sPuesto10 ;

    $dIdFecha=str_replace("/","-",$dIdFecha);
    If ($sNumeroOrden != '')
        $sqlFirmas = "Select * from firmas where sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden' And dIdFecha = '$dIdFecha'" ;
    Else
        $sqlFirmas = "Select * from firmas where sContrato = '$sContrato' And dIdFecha = '$dIdFecha'" ;


    $QryFirmas = mysql_query($sqlFirmas,$link);
    if($rowFirmas = mysql_fetch_array($QryFirmas)) 
   {
      $sFirmante1 = $rowFirmas['sFirmante1'] ;
      $sFirmante2 = $rowFirmas['sFirmante2'] ;
      $sFirmante3 = $rowFirmas['sFirmante3'] ;
      $sFirmante4 = $rowFirmas['sFirmante4'] ;
      $sFirmante5 = $rowFirmas['sFirmante5'] ;
      $sFirmante6 = $rowFirmas['sFirmante6'] ;
      $sFirmante7 = $rowFirmas['sFirmante7'] ;
      $sFirmante8 = $rowFirmas['sFirmante8'] ;
      $sFirmante9 = $rowFirmas['sFirmante9'] ;
      $sFirmante10 = $rowFirmas['sFirmante10'] ;
      $sPuesto1 = $rowFirmas['sPuesto1'] ;
      $sPuesto2 = $rowFirmas['sPuesto2'] ;
      $sPuesto3 = $rowFirmas['sPuesto3'] ;
      $sPuesto4 = $rowFirmas['sPuesto4'] ;
      $sPuesto5 = $rowFirmas['sPuesto5'] ;
      $sPuesto6 = $rowFirmas['sPuesto6'] ;
      $sPuesto7 = $rowFirmas['sPuesto7'] ;
      $sPuesto8 = $rowFirmas['sPuesto8'] ;
      $sPuesto9 = $rowFirmas['sPuesto9'] ;
      $sPuesto10 = $rowFirmas['sPuesto10'] ;
   }  
   else
   {
       If ($sNumeroOrden != '')
          $sqlFirmas = "Select * from firmas where sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden' And dIdFecha < '$dIdFecha' order by dIdFecha desc" ;
       Else
          $sqlFirmas = "Select * from firmas where sContrato = '$sContrato' And dIdFecha < '$dIdFecha' order by dIdFecha desc" ;
              //echo $sqlFirmas;
       $QryFirmas = mysql_query($sqlFirmas,$link);
      if($rowFirmas = mysql_fetch_array($QryFirmas)) 
      {
         $sFirmante1 = $rowFirmas['sFirmante1'] ;
         $sFirmante2 = $rowFirmas['sFirmante2'] ;
         $sFirmante3 = $rowFirmas['sFirmante3'] ;
         $sFirmante4 = $rowFirmas['sFirmante4'] ;
         $sFirmante5 = $rowFirmas['sFirmante5'] ;
         $sFirmante6 = $rowFirmas['sFirmante6'] ;
         $sFirmante7 = $rowFirmas['sFirmante7'] ;
         $sFirmante8 = $rowFirmas['sFirmante8'] ;
         $sFirmante9 = $rowFirmas['sFirmante9'] ;
         $sFirmante10 = $rowFirmas['sFirmante10'] ;
         $sPuesto1 = $rowFirmas['sPuesto1'] ;
         $sPuesto2 = $rowFirmas['sPuesto2'] ;
         $sPuesto3 = $rowFirmas['sPuesto3'] ;
         $sPuesto4 = $rowFirmas['sPuesto4'] ;
         $sPuesto5 = $rowFirmas['sPuesto5'] ;
         $sPuesto6 = $rowFirmas['sPuesto6'] ;
         $sPuesto7 = $rowFirmas['sPuesto7'] ;
         $sPuesto8 = $rowFirmas['sPuesto8'] ;
         $sPuesto9 = $rowFirmas['sPuesto9'] ;
         $sPuesto10 = $rowFirmas['sPuesto10'] ;       
      }
   }
   

     if(!isset($xFirmas)) $xFirmas=0.1;   
     
     If ($formato == 'L') 
     {
         $xLongFirma = 70 ;
         $xIncremento = 34 ;
     }
     else
     {
         $xLongFirma = 60 ;
         $xIncremento = 5 ;
     }

        $pdf->setY($yFilaFirmas);     
     $pdf->Cell($xFirmas);
      $pdf->SetFont('Arial','',7);              
     $pdf->Cell($xLongFirma,3,'POR LA CONTRATISTA' ,0,0,'C',0);
        $pdf->setY($yFilaFirmas + 3);    
     $pdf->Cell($xLongFirma,3,'REALIZO' ,0,0,'C',0);
      $pdf->SetFont('Arial','B',7);                
        $pdf->setY($yFilaFirmas + 6);    
     $pdf->MultiCell($xLongFirma,3,$sFirmante1 ,0,'C',0);
      $pdf->Line(10, $yFilaFirmas + 9, $xLongFirma + 10, $yFilaFirmas + 9, '') ;   
      $pdf->SetFont('Arial','',7);              
        $pdf->setY($yFilaFirmas + 9);    
     $pdf->MultiCell($xLongFirma,3,$sPuesto1 ,0,'C',0);
     

        $pdf->setY($yFilaFirmas);     
     $pdf->Cell($xFirmas + $xLongFirma + $xIncremento);
     $pdf->Cell($xLongFirma,3,'POR PEMEX' ,0,0,'C',0);
        $pdf->setY($yFilaFirmas + 3);    
     $pdf->Cell($xFirmas + $xLongFirma + $xIncremento);
     $pdf->Cell($xLongFirma,3,'REVISO' ,0,0,'C',0);
      $pdf->SetFont('Arial','B',7);                
        $pdf->setY($yFilaFirmas + 6);    
     $pdf->Cell($xFirmas + $xLongFirma + $xIncremento);
     $pdf->MultiCell($xLongFirma,3,$sFirmante2 ,0,'C',0);
      $pdf->Line($xLongFirma + $xIncremento + 10, $yFilaFirmas + 9, $xLongFirma + $xIncremento + $xLongFirma + 10 , $yFilaFirmas + 9, '') ;    
      $pdf->SetFont('Arial','',7);              
        $pdf->setY($yFilaFirmas + 9);    
     $pdf->Cell($xFirmas + $xLongFirma + $xIncremento);
     $pdf->MultiCell($xLongFirma,3,$sPuesto2 ,0,'C',0);


        $pdf->setY($yFilaFirmas);     
     $pdf->Cell($xFirmas + $xLongFirma + $xLongFirma + $xIncremento + $xIncremento);
     $pdf->Cell($xLongFirma,3,'POR PEMEX' ,0,0,'C',0);
        $pdf->setY($yFilaFirmas + 3);    
     $pdf->Cell($xFirmas + $xLongFirma + $xLongFirma + $xIncremento + $xIncremento);
     $pdf->Cell($xLongFirma,3,'AUTORIZO' ,0,0,'C',0);
      $pdf->SetFont('Arial','B',7);                
        $pdf->setY($yFilaFirmas + 6);    
     $pdf->Cell($xFirmas + $xLongFirma + $xLongFirma + $xIncremento + $xIncremento);
     $pdf->MultiCell($xLongFirma,3,$sFirmante5 ,0,'C',0);
      $pdf->Line($xLongFirma + $xIncremento + $xLongFirma + $xIncremento + 10, $yFilaFirmas + 9, $xLongFirma + $xIncremento + $xLongFirma + $xIncremento + $xLongFirma + 10 , $yFilaFirmas + 9, '') ;   
      $pdf->SetFont('Arial','',7);              
        $pdf->setY($yFilaFirmas + 9);    
     $pdf->Cell($xFirmas + $xLongFirma + $xLongFirma + $xIncremento + $xIncremento );
     $pdf->MultiCell($xLongFirma,3,$sPuesto5 ,0,'C',0);
}

function SetLineStyle($style) 
{  
   global $pdf ;
   extract($style);
   if (isset($width)) 
   {
      $width_prev = $pdf->LineWidth;
      $pdf->SetLineWidth($width);
      $pdf->LineWidth = $width_prev;
   }
   if (isset($cap)) 
   {
      $ca = array('butt' => 0, 'round'=> 1, 'square' => 2);
      if (isset($ca[$cap]))
         $pdf->_out($ca[$cap] . ' J');
   }
   if (isset($join)) 
   {
      $ja = array('miter' => 0, 'round' => 1, 'bevel' => 2);
      if (isset($ja[$join]))
         $pdf->_out($ja[$join] . ' j');
   }
   if (isset($dash)) 
   {
      $dash_string = '';
      if ($dash) 
      {
         if(ereg('^.+,', $dash))
            $tab = explode(',', $dash);
         else
            $tab = array($dash);
         $dash_string = '';
         foreach ($tab as $i => $v) 
         {
            if ($i > 0)
               $dash_string .= ' ';
            $dash_string .= sprintf('%.2f', $v);
         }
      }
      if (!isset($phase) || !$dash)
         $phase = 0;
      $pdf->_out(sprintf('[%s] %.2f d', $dash_string, $phase));
   }
   if (isset($color)) 
   {
      list($r, $g, $b) = $color;
      $pdf->SetDrawColor($r, $g, $b);
   }
}

function Line($x1, $y1, $x2, $y2, $style = null) 
{
   global $pdf ;
   if ($style)
      $pdf->SetLineStyle($style);
   BifContainer::Line($x1, $y1, $x2, $y2,$style=null);
}


function Rect($x, $y, $w, $h, $style = '', $border_style = null, $fill_color = null) 
{
   global $pdf ;
   if (!(false === strpos($style, 'F')) && $fill_color) 
   {
      list($r, $g, $b) = $fill_color;
      $pdf->SetFillColor($r, $g, $b);
   }
   switch ($style) 
   {
      case 'F':
         $border_style = null;
         BifContainer::Rect($x, $y, $w, $h, $style);
         break;
      case 'DF': case 'FD':
         if (!$border_style || isset($border_style['all'])) 
         {
            if (isset($border_style['all'])) 
            {
               $pdf->SetLineStyle($border_style['all']);
                  $border_style = null;
            }
         } 
         else
            $style = 'F';
         BifContainer::Rect($x, $y, $w, $h, $style);
         break;
      default:
         if (!$border_style || isset($border_style['all'])) 
         {
            if (isset($border_style['all']) && $border_style['all']) 
            {
               $pdf->SetLineStyle($border_style['all']);
               $border_style = null;
            }
            BifContainer::Rect($x, $y, $w, $h, $style);
         }
         break;
   }
   if ($border_style) 
   {
      if (isset($border_style['L']) && $border_style['L'])
         $pdf->Line($x, $y, $x, $y + $h, $border_style['L']);
      if (isset($border_style['T']) && $border_style['T'])
         $pdf->Line($x, $y, $x + $w, $y, $border_style['T']);
      if (isset($border_style['R']) && $border_style['R'])
         $pdf->Line($x + $w, $y, $x + $w, $y + $h, $border_style['R']);
      if (isset($border_style['B']) && $border_style['B'])
         $pdf->Line($x, $y + $h, $x + $w, $y + $h, $border_style['B']);
   }
}

function Curve($x0, $y0, $x1, $y1, $x2, $y2, $x3, $y3, $style = '', $line_style = null, $fill_color = null) 
{
   global $pdf ;
   if (!(false === strpos($style, 'F')) && $fill_color) {
      list($r, $g, $b) = $fill_color;
      $pdf->SetFillColor($r, $g, $b);
   }
   switch ($style) {
      case 'F':
         $op = 'f';
         $line_style = null;
         break;
      case 'FD': case 'DF':
         $op = 'B';
         break;
      default:
         $op = 'S';
         break;
   }
   if ($line_style)
      $pdf->SetLineStyle($line_style);
   $pdf->_Point($x0, $y0);
   $pdf->_Curve($x1, $y1, $x2, $y2, $x3, $y3);
   $pdf->_out($op);
}


function Ellipse($x0, $y0, $rx, $ry = 0, $angle = 0, $astart = 0, $afinish = 360, $style = '', $line_style = null, $fill_color = null, $nSeg = 8) {
   global $pdf ;
   if ($rx) 
   {
      if (!(false === strpos($style, 'F')) && $fill_color) 
      {
         list($r, $g, $b) = $fill_color;
         $pdf->SetFillColor($r, $g, $b);
      }
      switch ($style) 
      {
         case 'F':
            $op = 'f';
            $line_style = null;
            break;
         case 'FD': case 'DF':
            $op = 'B';
            break;
         case 'C':
            $op = 's'; // small 's' means closing the path as well
            break;
         default:
            $op = 'S';
            break;
      }
      if ($line_style)
         $pdf->SetLineStyle($line_style);
      if (!$ry)
         $ry = $rx;
      $rx *= $pdf->k;
      $ry *= $pdf->k;
      if ($nSeg < 2)
         $nSeg = 2;

      $astart = deg2rad((float) $astart);
      $afinish = deg2rad((float) $afinish);
      $totalAngle = $afinish - $astart;

      $dt = $totalAngle/$nSeg;
      $dtm = $dt/3;

      $x0 *= $pdf->k;
      $y0 = ($pdf->h - $y0) * $pdf->k;
      if ($angle != 0) 
      {
         $a = -deg2rad((float) $angle);
         $pdf->_out(sprintf('q %.2f %.2f %.2f %.2f %.2f %.2f cm', cos($a), -1 * sin($a), sin($a), cos($a), $x0, $y0));
         $x0 = 0;
         $y0 = 0;
      }

      $t1 = $astart;
      $a0 = $x0 + ($rx * cos($t1));
      $b0 = $y0 + ($ry * sin($t1));
      $c0 = -$rx * sin($t1);
      $d0 = $ry * cos($t1);
      $pdf->_Point($a0 / $pdf->k, $pdf->h - ($b0 / $pdf->k));
      for ($i = 1; $i <= $nSeg; $i++) 
      {
         $t1 = ($i * $dt) + $astart;
         $a1 = $x0 + ($rx * cos($t1));
         $b1 = $y0 + ($ry * sin($t1));
         $c1 = -$rx * sin($t1);
         $d1 = $ry * cos($t1);
         $pdf->_Curve(($a0 + ($c0 * $dtm)) / $pdf->k, $pdf->h - (($b0 + ($d0 * $dtm)) / $pdf->k), ($a1 - ($c1 * $dtm)) / $pdf->k,
                     $pdf->h - (($b1 - ($d1 * $dtm)) / $pdf->k), $a1 / $pdf->k, $pdf->h - ($b1 / $pdf->k));
         $a0 = $a1;
         $b0 = $b1;
         $c0 = $c1;
         $d0 = $d1;
      }
      $pdf->_out($op);
      if ($angle !=0)
         $pdf->_out('Q');
   }
}

function Circle($x0, $y0, $r, $astart = 0, $afinish = 360, $style = '', $line_style = null, $fill_color = null, $nSeg = 8) 
{
   global $pdf ;
   $pdf->Ellipse($x0, $y0, $r, 0, 0, $astart, $afinish, $style, $line_style, $fill_color, $nSeg);
}

function Polygon($p, $style = '', $line_style = null, $fill_color = null) 
{
   global $pdf ;
   $np = count($p) / 2;
   if (!(false === strpos($style, 'F')) && $fill_color) 
   {
      list($r, $g, $b) = $fill_color;
      $pdf->SetFillColor($r, $g, $b);
   }
   switch ($style) 
   {
      case 'F':
         $line_style = null;
         $op = 'f';
         break;
      case 'FD': case 'DF':
         $op = 'B';
         break;
      default:
         $op = 'S';
         break;
   }
   $draw = true;
   if ($line_style)
      if (isset($line_style['all']))
         $pdf->SetLineStyle($line_style['all']);
      else 
      { 
         $draw = false;
         if ('B' == $op) 
         {
            $op = 'f';
            $pdf->_Point($p[0], $p[1]);
            for ($i = 2; $i < ($np * 2); $i = $i + 2)
               $pdf->_Line($p[$i], $p[$i + 1]);
            $pdf->_Line($p[0], $p[1]);
            $pdf->_out($op);
         }
         $p[$np * 2] = $p[0];
         $p[($np * 2) + 1] = $p[1];
         for ($i = 0; $i < $np; $i++)
            if (!empty($line_style[$i]))
               $pdf->Line($p[$i * 2], $p[($i * 2) + 1], $p[($i * 2) + 2], $p[($i * 2) + 3], $line_style[$i]);
      }

   if ($draw) 
   {
      $pdf->_Point($p[0], $p[1]);
      for ($i = 2; $i < ($np * 2); $i = $i + 2)
         $pdf->_Line($p[$i], $p[$i + 1]);
      $pdf->_Line($p[0], $p[1]);
      $pdf->_out($op);
   }
}


function RegularPolygon($x0, $y0, $r, $ns, $angle = 0, $circle = false, $style = '', $line_style = null, $fill_color = null, $circle_style = '', $circle_line_style = null, $circle_fill_color = null) 
{
   global $pdf ;
   if ($ns < 3)
      $ns = 3;
   if ($circle)
      $pdf->Circle($x0, $y0, $r, 0, 360, $circle_style, $circle_line_style, $circle_fill_color);
   $p = null;
   for ($i = 0; $i < $ns; $i++) {
      $a = $angle + ($i * 360 / $ns);
      $a_rad = deg2rad((float) $a);
      $p[] = $x0 + ($r * sin($a_rad));
      $p[] = $y0 + ($r * cos($a_rad));
   }
   $pdf->Polygon($p, $style, $line_style, $fill_color);
}


function StarPolygon($x0, $y0, $r, $nv, $ng, $angle = 0, $circle = false, $style = '', $line_style = null, $fill_color = null, $circle_style = '', $circle_line_style = null, $circle_fill_color = null) 
{
   global $pdf ;
   if ($nv < 2)
      $nv = 2;
   if ($circle)
      $pdf->Circle($x0, $y0, $r, 0, 360, $circle_style, $circle_line_style, $circle_fill_color);
   $p2 = null;
   $visited = null;
   for ($i = 0; $i < $nv; $i++) 
   {
      $a = $angle + ($i * 360 / $nv);
      $a_rad = deg2rad((float) $a);
      $p2[] = $x0 + ($r * sin($a_rad));
      $p2[] = $y0 + ($r * cos($a_rad));
      $visited[] = false;
   }
   $p = null;
   $i = 0;
   do 
   {
      $p[] = $p2[$i * 2];
      $p[] = $p2[($i * 2) + 1];
      $visited[$i] = true;
      $i += $ng;
      $i %= $nv;
   } while (!$visited[$i]);
   $pdf->Polygon($p, $style, $line_style, $fill_color);
}

function _Line($x, $y) 
{
   global $pdf ;
   $pdf->_out(sprintf('%.2f %.2f l', $x * $pdf->k, ($pdf->h - $y) * $pdf->k));
}

function _Curve($x1, $y1, $x2, $y2, $x3, $y3) 
{
   global $pdf ;
   $pdf->_out(sprintf('%.2f %.2f %.2f %.2f %.2f %.2f c', $x1 * $pdf->k, ($pdf->h - $y1) * $pdf->k, $x2 * $pdf->k, ($pdf->h - $y2) * $pdf->k, $x3 * $pdf->k, ($pdf->h - $y3) * $pdf->k));
}
 
function _Point($x, $y) 
{
   global $pdf ;
   $pdf->_out(sprintf('%.2f %.2f m', $x * $pdf->k, ($pdf->h - $y) * $pdf->k));
}
function RoundedRect($x, $y, $w, $h, $r, $round_corner = '1111', $style = '', $border_style = null, $fill_color = null) 
{
   global $pdf ;
   if ('0000' == $round_corner) 
      $pdf->Rect($x, $y, $w, $h, $style, $border_style, $fill_color);
   else 
   { 
      if (!(false === strpos($style, 'F')) && $fill_color) 
      {
         list($red, $g, $b) = $fill_color;
         $pdf->SetFillColor($red, $g, $b);
      }
      switch ($style) 
      {
         case 'F':
            $border_style = null;
            $op = 'f';
            break;
         case 'FD': case 'DF':
            $op = 'B';
            break;
         default:
            $op = 'S';
            break;
      }
      if ($border_style)
         $pdf->SetLineStyle($border_style);

      $MyArc = 4 / 3 * (sqrt(2) - 1);
      _Point($x + $r, $y);
      $xc = $x + $w - $r;
      $yc = $y + $r;
      _Line($xc, $y);
      if ($round_corner[0])
         _Curve($xc + ($r * $MyArc), $yc - $r, $xc + $r, $yc - ($r * $MyArc), $xc + $r, $yc);
      else
         _Line($x + $w, $y);
      $xc = $x + $w - $r ;
      $yc = $y + $h - $r;
      _Line($x + $w, $yc);

      if ($round_corner[1])
         _Curve($xc + $r, $yc + ($r * $MyArc), $xc + ($r * $MyArc), $yc + $r, $xc, $yc + $r);
      else
         _Line($x + $w, $y + $h);

      $xc = $x + $r;
      $yc = $y + $h - $r;
      _Line($xc, $y + $h);
      if ($round_corner[2])
         _Curve($xc - ($r * $MyArc), $yc + $r, $xc - $r, $yc + ($r * $MyArc), $xc - $r, $yc);
      else
         _Line($x, $y + $h);

      $xc = $x + $r;
      $yc = $y + $r;
      _Line($x, $yc);
      if ($round_corner[3])
         _Curve($xc - $r, $yc - ($r * $MyArc), $xc - ($r * $MyArc), $yc - $r, $xc, $yc - $r);
      else 
      {
         _Line($x, $y);
         _Line($x + $r, $y);
      }
      $pdf->_out($op);
   }
}

?>
