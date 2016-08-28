<?php
set_time_limit(0);
define('FPDF_FONTPATH','font/');
require("../../include/mysql.inc.php");
require("../../include/fecha.php");
require("../../fpdf153/fpdf.php");
class PDF extends FPDF {

var $tablewidths;
var $footerset;

function PDF($orientation='P',$unit='mm',$format='A4')
{
    //Call parent constructor
    $this->FPDF($orientation,$unit,$format);
}


//Cabecera de página
function Header()
{
   global $sContrato,$iNumeroEstimacion,$link;
   $length = ($this->w - $this->rMargin);
      $sql = "SELECT  
      mDescripcion
     FROM actividadesxestimacion WHERE sContrato='$sContrato' AND iNivel=0";
   $result = mysql_query($sql,$link);
   if($row = mysql_fetch_array($result)){
      $mDescripcion=$row[0];
   }
      $sql = "SELECT  
      sNombre,bImagen
     FROM configuracion WHERE sContrato='$sContrato'";
   $result = mysql_query($sql,$link);
   if($row = mysql_fetch_array($result)){
      $sNombre=$row[0];
      $bImagen = $row[1];
   }
   if($bImagen != ""){
      $file = fopen("imagen.jpg",'w');
      fwrite($file,$bImagen);
      fclose($file);
   }
      $sql = "SELECT  
      mCliente,bImagen
     FROM contratos WHERE sContrato='$sContrato'";
   $result = mysql_query($sql,$link);
   if($row = mysql_fetch_array($result)){
      $mDescripcion2=$row[0];
      $bImagen2 = $row[1];
   }
   if($bImagen2 != ""){
      $file = fopen("imagen2.jpg",'w');
      fwrite($file,$bImagen2);
      fclose($file);
   }
   $this->SetFont('Arial','B',6);
   $this->SetFillColor(215,217,200);

   //Calcular Numero de Lineas
   $tamDescripcion2 = strlen($mDescripcion2)/200;
   $linesTitle = $tamDescripcion2;
   //Rectangulo redondeado
   //$yFinal = $this->getY();
   $this->SetLineWidth(0.5);
   $this->SetFillColor(255);
   $this->RoundedRect(25,10, $length-28, 22+$linesTitle , 3.5, 'DF');

   //Title
   $this->image("imagen2.jpg",40,20,30,10);
   $this->Cell(($length-($length/2))-100);
   $this->MultiCell(200,4,trim($mDescripcion2),0,'C',0,0);
   $this->image("imagen.jpg",$length-(50),20,30,10);//480
   $posY = $this->getY();
   if($posY<80)
      $posY=80;
   //$this->setY($posY);
   $this->cell($length-($length/2)-20);
   $this->Cell(30,4,'CONTRATO :'.trim($sContrato),0,0,0);
   //    retenciones del contrato
   $this->setFillColor(0,0,0);
   $this->setTextColor(254,254,254);
// $this->setY($posY+22);
   $this->ln(8);
}

function Footer() {
   global $sBaseCalculo;
    // Check if Footer for this page already exists (do the same for Header())
    if(!$this->footerset[$this->page]){
        //Page number
        $this->setTextColor(0,0,0);
        $this->SetY(-15);
        $this->Cell(10);
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
        // set footerset
        $this->footerset[$this->page] = 1;
    }
}

function RoundedRect($x, $y, $w, $h,$r, $style = '')
    {
        $k = $this->k;
        $hp = $this->h;
        if($style=='F')
            $op='f';
        elseif($style=='FD' or $style=='DF')
            $op='B';
        else
            $op='S';
        $MyArc = 4/3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2f %.2f m',($x+$r)*$k,($hp-$y)*$k ));
        $xc = $x+$w-$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2f %.2f l', $xc*$k,($hp-$y)*$k ));

        $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
        $xc = $x+$w-$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2f %.2f l',($x+$w)*$k,($hp-$yc)*$k));
        $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
        $xc = $x+$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2f %.2f l',$xc*$k,($hp-($y+$h))*$k));
        $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
        $xc = $x+$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2f %.2f l',($x)*$k,($hp-$yc)*$k ));
        $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }

function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $h = $this->h;
        $this->_out(sprintf('%.2f %.2f %.2f %.2f %.2f %.2f c ', $x1*$this->k, ($h-$y1)*$this->k,
            $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }


}
     /*
   function ultimodia($anho,$mes){
      if (( fmod($anho,4)==0 or fmod($anho,400)==0) and fmod($anho,100)!=0 ) {
         $dias_febrero = 29;
      } else {
         $dias_febrero = 28;
      }
      switch($mes) {
         case 1: return 31; break;
         case 2: return $dias_febrero; break;
         case 3: return 31; break;
         case 4: return 30; break;
         case 5: return 31; break;
         case 6: return 30; break;
         case 7: return 31; break;
         case 8: return 31; break;
         case 9: return 30; break;
         case 10: return 31; break;
         case 11: return 30; break;
         case 12: return 31; break;
      }
   }   */
   #incremente una fecha en un mes
   
   function incFechas($fecha){
      if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
            list($ano,$mes,$dia)=split("/", $fecha);
      if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
            list($ano,$mes,$dia)=split("-",$fecha);
            
      $ultimoDia = ultimodia($ano,$mes);
      $nueva = mktime(0,0,0,$mes,$ultimoDia+1,$ano);
      $Fecha = date("Y-m-d",$nueva);
      if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$Fecha))
            list($ano,$mes,$dia)=split("/", $Fecha);
      if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$Fecha))
            list($ano,$mes,$dia)=split("-",$Fecha);

      $ultimoDia = ultimodia($ano,$mes);
      $nueva = mktime(0,0,0,$mes,$ultimoDia,$ano);
      return date("Y-m-d",$nueva);
   }
function imprimeMeses($fechaMinima,$fechaMaxima){
   global $pdf;
   #imprime los meses
   $fechaMin =  $fechaMinima; 
   $fechaMax = $fechaMaxima;
   $x=40;
   $Y=$pdf->getY();
   while($fechaMin <= $fechaMax) {
         if( $pdf->getX() >=240){
               $pdf->setY($pdf->getY()+5);
               return $fechaMin;
         }
         $pdf->setY($Y);
         $pdf->setX($x);
         $pdf->SetFillColor(228,228,228);
         $pdf->SetFont('Arial','B',10);
         $pdf->Cell(30,5,nombre_mes($fechaMin)." ".anio($fechaMin),1,0,'C',1);
         $pdf->SetFont('Arial','',11);
         $fechaMin = incFechas($fechaMin);
         $x+=30;
   }
   $pdf->setY($pdf->getY()+5);
   return $fechaMin;
}
function valoresMeses($fechaMinima,$fechaMaxima,$Y){
   #imprime los valores de cada mes
   global $arrayOrden,$filasOrdenes,$pdf;
   $pdf->setY($Y);
   $fechaMin =  $fechaMinima; 
   $fechaMax = $fechaMaxima;
   $x=40;
   $pdf->setX($x);
   $Y=$pdf->getY();
   while($fechaMin < $fechaMax)  {
         if( $pdf->getX() >=240){
               break;
         }
         $y = $Y ;
         for($i=0;$i<count($arrayOrden);$i++){
               $pdf->setY($y);
               $pdf->setX($x);
               $pdf->SetFont('Arial','',9);
               if($arrayOrden[$i]=="Total"){
               $pdf->SetFillColor(217,238,255);
                  $fondo = 1;
               }
               else{
                  $fondo = 0;
               }
               $pdf->Cell(30,4, "$ ".number_format($filasOrdenes[$arrayOrden[$i]][$fechaMin],2,'.',','),1,0,'R',$fondo);
               $pdf->SetFont('Arial','',11);
               $y+=4;
         }
         $fechaMin = incFechas($fechaMin);
         $x+=30;
   }
}
function numerosOrden(){
   global $pdf,$arrayOrden;
   $x=10;
   $y=$Y=$pdf->getY();
   for($i=0;$i<count($arrayOrden);$i++){
         $pdf->setY($y);
         $pdf->setX($x);
         if($arrayOrden[$i]=="Total")
            $pdf->SetFillColor(217,238,255);
         else
            $pdf->SetFillColor(228,228,228);
         $pdf->Cell(30,4,$arrayOrden[$i],1,0,'L',1);
         $y+=4;
   }
   return $Y;
}
#Crear PDF 
$pdf=new PDF('L','mm','Letter');
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',11);

   #Optiene el rango de fechas
   $sql  =" SELECT MIN(dIdFecha) as dIdFechaMin,MAX(dIdFecha)  as dIdFechaMax FROM  ordenes_programamensual WHERE sContrato = '$sContrato' AND sIdConvenio ='$sIdConvenioAct' ";
   $result = mysql_query($sql);
   if($row = mysql_fetch_array($result)){
         $fechaMinima = $row['dIdFechaMin'];
         $fechaMaxima = $row['dIdFechaMax'];
   }
   if($fechaMinima =="" and $fechaMaxima==""){
      mensaje("No se ha podido determinar las fechas de las actividades, posiblemente no existe programacion mensual !");
      location("index.php");
      exit(0);
   }

   #Captura los numeros de orden
   unset($filasOrdenes);
   $sqlOrden  =" SELECT DISTINCT(sNumeroOrden) FROM  ordenes_programamensual WHERE sContrato = '$sContrato' AND sIdConvenio ='$sIdConvenioAct'  ORDER BY sNumeroOrden";
   $resultOrden = mysql_query($sqlOrden);
   while($rowOrden = mysql_fetch_array($resultOrden)){
      $NumeroOrden = $rowOrden['sNumeroOrden'];
      //Obtener el total mensual de cada Numero de Orden
      $fechaMin =  $fechaMinima; 
      $fechaMax = $fechaMaxima;
      while($fechaMin <= $fechaMax) {
         $sql  =" SELECT sum(DEmn) FROM  ordenes_programamensual WHERE sContrato = '$sContrato' AND sIdConvenio ='$sIdConvenioAct'  AND sNumeroOrden = '$NumeroOrden' AND year('$fechaMin')=year(dIdFecha) AND month('$fechaMin')=month(dIdFecha) ";
         $result = mysql_query($sql);
         while($row = mysql_fetch_array($result)){
               if($row[0]=="")$row[0]=0;
               $filasOrdenes[$NumeroOrden][$fechaMin]=trim($row[0]);
         }
         $fechaMin = incFechas($fechaMin);
      }
      //Obtener el total mensual
      $fechaMin =  $fechaMinima;
      $fechaMax = $fechaMaxima;
      while($fechaMin <= $fechaMax) {
         $sql  =" SELECT sum(DEmn) FROM  ordenes_programamensual WHERE sContrato = '$sContrato' AND sIdConvenio ='$sIdConvenioAct' AND year('$fechaMin')=year(dIdFecha) AND month('$fechaMin')=month(dIdFecha) ";
         $result = mysql_query($sql);
         while($row = mysql_fetch_array($result)){
               if($row[0]=="")$row[0]=0;
               $filasOrdenes['Total'][$fechaMin]=trim($row[0]);
         }
         $fechaMin = incFechas($fechaMin);
      }
   }

   $pdf->ln();
   $sqlOrden  =" SELECT DISTINCT(sNumeroOrden) FROM  ordenes_programamensual WHERE sContrato = '$sContrato' AND sIdConvenio ='$sIdConvenioAct'  ORDER BY sNumeroOrden";
   $resultOrden = mysql_query($sqlOrden);
   while($rowOrden = mysql_fetch_array($resultOrden)){
      $arrayOrden[] = $rowOrden['sNumeroOrden'];
   }
   $arrayOrden[]='Total';
#controladores de paginas
$fechaBreakCantidad = $fechaMinima;
$fechaM = $fechaMinima;
while($fechaBreakCantidad<$fechaMaxima){
   #imprime las fechas y devuelve la ultima fecha donde dejo de imprimir
   if($fechaBreakCantidad=="")break;
   $fechaBreakCantidad = imprimeMeses($fechaBreakCantidad,$fechaMaxima);
   #imprime numero de ordenes y devuelve la posicion Y donde empezo a imprimir
   $Y=numerosOrden();
   #imprime los valores de cada mes
   valoresMeses($fechaM,$fechaBreakCantidad,$Y);
   $fechaM = $fechaBreakCantidad;
   #$fechaBreakCantidad = incFechas($fechaBreakCantidad);
   $pdf->ln(5);
}
$Ancho = ($pdf->w - $pdf->rMargin)-10;
$Alto = ($pdf->h - $pdf->bMargin)-45;
if(count($filaOrdenes)>0)
   require("grafica.php");
if(file_exists("Grafica.png")){
   $pdf->AddPage();
   $pdf->image("Grafica.png",15,$pdf->GetY()+10,$Ancho,$Alto);
}
$pdf->Output();
?>
