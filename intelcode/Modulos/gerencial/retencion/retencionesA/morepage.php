<?php
set_time_limit(0);
define('FPDF_FONTPATH','font/');
require("../../../include/mysql.inc.php");
require("../../../fpdf153/fpdf.php");
require("../fecha.php");
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
   global $Contrato,$iNumeroEstimacion,$link;
   $length = ($this->w - $this->rMargin);
      $sql = "SELECT  
      mDescripcion
     FROM actividadesxestimacion WHERE sContrato='$Contrato' AND iNivel=0";
   $result = mysql_query($sql,$link);
   if($row = mysql_fetch_array($result)){
      $mDescripcion=$row[0];
   }
      $sql = "SELECT  
      sNombre,bImagen
     FROM configuracion WHERE sContrato='$Contrato'";
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
     FROM contratos WHERE sContrato='$Contrato'";
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
   $this->RoundedRect(25,10, $length-28, 90+$linesTitle , 3.5, 'DF');

   //Title
   if(file_exists("imagen2.jpg"))
   $this->image("imagen2.jpg",40,20,70,50);
   $this->Cell(($length-($length/2))-100);
   $this->MultiCell(200,10,trim($mDescripcion2),0,'C',0,0);
   if(file_exists("imagen.jpg"))
   $this->image("imagen.jpg",$length-(28+70),20,70,50);//480
   $posY = $this->getY();
   if($posY<80)
      $posY=80;
   $this->setY($posY);
   $this->cell($length-($length/2));
   $this->Cell(30,10,'CONTRATO :'.trim($Contrato),0,0,0);
   //    retenciones del contrato
   $this->setFillColor(0,0,0);
   $this->setTextColor(254,254,254);
   $this->setY($posY+22);
// $this->cell(15);  
   $this->Cell(100,10,'Retenciones del Contrato :',1,0,'L',1);
   $this->setFillColor(254,254,254);
   $this->setTextColor(0,0,0);
   $this->setY($posY+32);
   $this->cell(25);
    $y = $this->getY();
   $this->MultiCell($length-150,10,$mDescripcion,0,'C',0);
   $y2 = $this->getY();
    $this->RoundedRect(25,$y, $length-28, ((($y2-$y1)/10)*2)+2, 3.5, 'DF');
   $this->setY($posY+32);
   $this->cell(25);
   $this->MultiCell($length-150,10,$mDescripcion,0,'L',0);
   $this->setTextColor(0,0,255);
   $y2 = $this->getY();
   $this->setY($y2+20);
   $this->cell(20);
   $this->Cell($length/2,10,'PROGRAMA DE EROGACIONES ORIGINAL CONTRATADO ',0,'C',0);
   $this->setTextColor(0,0,0);
   $this->ln(20);
}

function Footer() {
   global $sBaseCalculo;
    // Check if Footer for this page already exists (do the same for Header())
    if(!$this->footerset[$this->page]){
        //Page number
        $this->SetY(-40);
        $this->setTextColor(0,0,255);
        $this->Cell(25);
        if($sBaseCalculo=="Acumulado")
           $this->Cell(0,10,'Calculo Realizado en base al Acumulado Estimado Real y el Acumulado Programdo a Estimar',0,0,'C');
       else
         $this->Cell(0,10,'Calculo Realizado en base al Mensual Estimado Real y el Mensual Programdo a Estimar',0,0,'C');
        $this->setTextColor(0,0,0);
        $this->SetY(-25);
        $this->Cell(10);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
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
function anios($fila){
   global $años,$pdf;
   $pdf->Cell(20);
   $pdf->Cell(115,9,"  ",0,0,'L',0);
   $pdf->SetFillColor(215,217,200);
   $n=0;
   while ($n < count($años))  {
      if($años[$n]['fila'] == $fila )
         $pdf->Cell(($años[$n]['TamDivFila']*60),9,$años[$n]['AñoDivFila'],1,0,'C' ,1);
      $n++;
   }
   $pdf->ln();
   $pdf->SetFillColor(254,254,254);
   //$pdf->Cell(160,9,"Numero de Divicion: ".$años[$n]['divFila'],1,0,$alineacion ,1);$pdf->ln();
}
function leyenda($k){
   global $pdf;
   $pdf->SetFillColor(215,217,200);
   switch($k){
      case (-1):
         $pdf->Cell(115,9,"  ",0,0,'L',0);
         break;
      case (0):
         //Avance Programado
         $pdf->Cell(115,9,"PROGRAMADO (M.N.)",1,0,'L',1);
         break;
      case (1):
         $pdf->Cell(115,9,"PROGRAMADO ACUMULADO(M.N.)",1,0,'L',1);
         break;
      case (2):
         $pdf->Cell(115,9,"% PROG. ACUMULADO(M.N.)",1,0,'L',1);
         break;
      case (3):
         //Avance de Financiero
         $pdf->Cell(115,9,"REAL (M.N.)",1,0,'L',1);
         break;
      case (4):
         $pdf->Cell(115,9,"REAL ACUMULADO(M.N.)",1,0,'L',1);
         break;
      case (5):
         $pdf->Cell(115,9,"% REAL ACUMULADO (M.N.)",1,0,'L',1);
         break;
      case (6):
         //Avence de Obra
         $pdf->Cell(115,9,"AVANCE DE OBRA (M.N.)",1,0,'L',1);
         break;
      case (7):
         $pdf->Cell(115,9,"AVANCE DE OBRA ACUMULADO (M.N.)",1,0,'L',1);
         break;
      case (8):
         $pdf->Cell(115,9,"% AVANCE DE OBRA (M.N.)",1,0,'L',1);
         break;
      case (9):
         //Penalizaciones Calculadas
         $pdf->Cell(115,9,"RETENCION CALCULADA (M.N.)",1,0,'L',1);
         break;
      case (10):
         $pdf->Cell(115,9,"RETENCION CALC. ACUM. (M.N.)",1,0,'L',1);
         break;
      case (11):
         $pdf->Cell(115,9,"% RETENCION CALCULADA (M.N.)",1,0,'L',1);
         break;
      case (12):
         //Penalizaciones Obtenidas
         $pdf->Cell(115,9,"RETENCION (M.N.)",1,0,'L',1);
         break;
      case (13):
         $pdf->Cell(115,9,"RETENCION ACUM. (M.N.)",1,0,'L',1);
         break;
      case (14):
         $pdf->Cell(115,9,"% RETENCION (M.N.)",1,0,'L',1);
         break;
   }
   $pdf->SetFillColor(255,255,255);
}
//Contrato y convenio
if(isset($_POST['sIdConvenio']) and isset($_SESSION['Contrato'])){
   $Contrato=$_SESSION['Contrato'];
   $sIdConvenio=$_POST['sIdConvenio'];  
}
   
//Año y Mes de Termino
if(isset($_POST['anyo']) and isset($_POST['mes'])){
   $anyo=$_POST['anyo'];
   $mes=$_POST['mes'];  
}
//tipo de documento
if(isset($POST['tipoDocumento'])){
   $tipoDocumento=$POST['tipoDocumento'];
}


//Tamaño de la hoja personalizado o predeterminado
unset($tamnio);
if(isset($_POST['sizepapper']))
   $tamnio = $_POST['sizepapper'];
else
   $tamnio = 'Letter';


$ultimodia=ultimodia($anyo,$mes);
//calcular la fecha menor
$sql = "SELECT  min(dIdFecha)  FROM anexosmensuales WHERE sContrato='$Contrato' and sIdConvenio='$sIdConvenio'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
    $fechaMenor = $row[0];
}
//calcular el monto del contrato en  convenio
$sql = "SELECT  dMontoMN  FROM convenios WHERE sContrato='$Contrato' and sIdConvenio='$sIdConvenio'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
    $dMontoMNContrato = $row[0];
}
$fecha="$anyo-$mes-$ultimodia";
//Matriz que almacena todos los valores
unset($matriz);

$fechaM = $fechaMenor;
//eenviar error de fechas o contrato en blanco
if($fechaM > $fecha){
   echo "<center><h1>No Existen fechas inferiores a la seleccionada</h1></center>";
   echo "<center><h3>intente seleccionando un año y mes superior</h3></center>";
   exit(0);
}else if($Contrato==""){
   echo "<center><h3>No ha Seleccionado un Contrato</h3></center>";
   exit(0);

}
//anexosmensuales------------------->Avance Programado
$programado[]="";
$aprogramado[]="";
$pprogramado[]="";
$cont = $acumulado = 0;
while ($fechaM <= $fecha){
// $sql = "SELECT SUM(DEmn) FROM anexosmensuales WHERE sContrato='$Contrato' AND dIdFecha='$fechaM'";
   $anyo = anio($fechaM);
   $mes = mesActual($fechaM);
   $sql = "SELECT SUM(DEmn) FROM anexosmensuales WHERE sContrato='$Contrato' AND YEAR(dIdFecha)='$anyo' AND MONTH(dIdFecha)='$mes'  and sIdConvenio='$sIdConvenio'";
   $result = mysql_query($sql);
   while($row = mysql_fetch_array($result)){
         $acumulado +=$row[0];
         $programado[$cont]=$row[0];
         $aprogramado[$cont]=$acumulado;
         if($acumulado>0)
            $pprogramado[$cont]=($acumulado/$dMontoMNContrato)*100;
         $matriz[-2][$cont]= strtoupper(nombre_mes($fechaM)." ".anio($fechaM));
         $matriz[-1][$cont]= $fechaM;
         $matriz[0][$cont]= $programado[$cont];
         $matriz[1][$cont]= $aprogramado[$cont];
         $matriz[2][$cont]= $pprogramado[$cont];
   }
   $cont++;
   $fechaM=suma_fechas($fechaM,1);
}
//calcular el monto del contrato
/*
$sql = "SELECT dMontoContratoMN  FROM estimacionperiodo WHERE sContrato='$Contrato'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $dMontoMN = $row[0];
}*/

//estimacion periodo------------------->Avance Financiero
$real[]=$areal[]=$preal[]="";
$fechaM = $fechaMenor;
$cont = $acumuladoReal = 0;
while ($fechaM <= $fecha){
// $sql = "SELECT dMontoMN FROM estimacionperiodo WHERE sContrato='$Contrato' AND dFechaFinal='$fechaM'";
   $anyo = anio($fechaM);
   $mes = mesActual($fechaM);
$sql = "SELECT dMontoMN FROM estimacionperiodo WHERE sContrato='$Contrato' AND YEAR(dFechaFinal)='$anyo' AND MONTH(dFechaFinal)='$mes'";
   $result = mysql_query($sql);
   while($row = mysql_fetch_array($result)){
         $acumuladoReal +=$row[0];
         $real[$cont]=$row[0];
         $areal[$cont]=$acumuladoReal;
         $preal[$cont]=($acumuladoReal/$dMontoMNContrato)*100;
         $matriz[3][$cont]=$real[$cont];
         $matriz[4][$cont]=$areal[$cont];
         $matriz[5][$cont]=$preal[$cont];
   }
   $cont++;
   $fechaM=suma_fechas($fechaM,1);
}

//estimaciones  ------------------->Avance de Obra
$fechaM = $fechaMenor;
$importeM[]=$aimporteM[]=$pimporteM[]="";
$cont = $acumulado = 0;
while ($fechaM <= $fecha){
//    $sql = "SELECT dMontoMN FROM estimaciones WHERE sContrato='$Contrato' AND dFechaFinal='$fechaM'";
   $anyo = anio($fechaM);
   $mes = mesActual($fechaM);
   $sql = "SELECT dMontoMN FROM estimaciones WHERE sContrato='$Contrato' AND YEAR(dFechaFinal)='$anyo' AND MONTH(dFechaFinal)='$mes'";
   $result = mysql_query($sql);
   while($row = mysql_fetch_array($result)){
         $acumulado +=$row[0];
         $importeM[$cont]=$row[0];
         $aimporteM[$cont]=$acumulado;
         $pimporteM[$cont]=($acumulado/$dMontoMNContrato)*100;
         $matriz[6][$cont]= $importeM[$cont];
         $matriz[7][$cont]= $aimporteM[$cont];
         $matriz[8][$cont]= $pimporteM[$cont];
   }
   $cont++;
   $fechaM=suma_fechas($fechaM,1);
}

//rentencioes --------------------->retenciones calculadas

$sql = "SELECT sBaseCalculo,dRetencion FROM configuracion WHERE sContrato='$Contrato' and sIdConvenio='$sIdConvenio'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $sBaseCalculo = $row['sBaseCalculo'];  
   $dRetencion = $row['dRetencion'];
   if($sBaseCalculo=="Mensual"){
      $n=$acumulado=0;
      while($n < count($matriz)){
         $matriz[9][$n]= ($matriz[0][$n]-$matriz[3][$n])*$dRetencion;      
         $acumulado+=$matriz[9][$n];
         $matriz[10][$n]= $acumulado;     
         if($acumulado>0)
            $matriz[11][$n]= ($acumulado/$dMontoMNContrato)*100;  
         $n++;
      }
   }
   else if($sBaseCalculo=="Acumulado"){
      $n=$acumulado=0;
      while($n < count($matriz)){
         $matriz[9][$n]= ($matriz[1][$n]-$matriz[4][$n])*$dRetencion;      
         $acumulado+=$matriz[9][$n];
         $matriz[10][$n]= $acumulado;  //($acumulado/$dMontoMNContrato)*100;  
         $matriz[11][$n]= ($acumulado/$dMontoMNContrato)*100;     
         $n++;
      }  
   }
}
//rentencioes --------------------->retenciones obtenidas

$sql = "SELECT sBaseCalculo,dRetencion FROM configuracion WHERE sContrato='$Contrato' and sIdConvenio='$sIdConvenio'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $sBaseCalculo = $row['sBaseCalculo'];  
   $dRetencion = $row['dRetencion'];
   $sql = "SELECT dIdFecha,dMontoMN from erogacionesmensuales WHERE sContrato='$Contrato' AND sIdConvenio='$sIdConvenio' AND YEAR(dIdFecha)='$anyo' AND MONTH(dIdFecha)='$mes'";
   $result = mysql_query($sql);
   $n=0;
   unset($acumulado);
   $acumulado=0;
   while($row = mysql_fetch_array($result)){
      $matriz[12][$n]= $row['dMontoMN'];     
      $acumulado+=$row['dMontoMN'];
      $matriz[13][$n]= $acumulado;     
      if($acumulado>0)
         $matriz[14][$n]= ($acumulado/$dMontoMNContrato)*100;  
      $n++;
   }
   if($n < count($matriz)){
      while($n < count($matriz)){
         $matriz[13][$n]= $acumulado;     
         if($acumulado>0)
            $matriz[14][$n]= ($acumulado/$dMontoMNContrato)*100;  
         $n++;
      }
   }
}

if($tipoDocumento=='excel'){
   //comenzar a crear el reporte en excel
   require_once("../../../include/Spreadsheet_Excel_Creator/excel.php");
   require_once("../../../include/Spreadsheet_Excel_Creator/excel_ext.php");
   // Generamos el Excel
   $data[]= array("RETENCIONES APLICADAS");
   $data[]= array("Contrato: ","$sContrato");
   $data[]= array("Convenio: ","$sIdConvenio");
   for($j=-2;$j<=11;$j++){
      if($j==-1)continue;
      $i=0;
      $fechaM = $fechaMenor;
      unset($data1);
      switch($j){
          case (-2):$data1[0]="------------------------------------------";break;
          case (-1):$data1[0]="------------------------------------------";break;
          case (0):$data1[0]="PROGRAMADO MN";break;
          case (1):$data1[0]="PROGRAMADO ACUMULADO MN";break;
          case (2):$data1[0]="PORCENTAJE PROGRAMADO ACUMULADO MN";break;
          case (3):$data1[0]="REAL MN";break;
          case (4):$data1[0]="REAL ACUMULADO MN";break;
          case (5):$data1[0]="PORCENTAJE REAL  MN";break;
          case (6):$data1[0]="AVANCE DE OBRA MN";break;
          case (7):$data1[0]="AVANCE DE OBRA ACUMULADO MN";break;
          case (8):$data1[0]="PORCENTAJE AVANCE DE OBRA MN";break;
          case (9):$data1[0]="RETENCION CALCULADA MN";break;
          case (10):$data1[0]="RETENCION CALCULADA ACUMULADA MN";break;
          case (11):$data1[0]="PORCENTAJE RETENCION CALCULADA ACUMULADA MN";break;
      }
      while ($fechaM <= $fecha){
         $i++;
         if($j<0)
            $val = $matriz[$j][$i-1];
         else
            $val = number_format($matriz[$j][$i-1],2,".",",");
         switch($j){
             case (-2):$data1[$i]=$val;break;
             case (-1):$data1[$i]=$val;break;
             case (0):$data1[$i]="$ $val";break;
             case (1):$data1[$i]="$ $val";break;
             case (2):$data1[$i]="$val %";break;
             case (3):$data1[$i]="$ $val";break;
             case (4):$data1[$i]="$ $val";break;
             case (5):$data1[$i]="$val %";break;
             case (6):$data1[$i]="$ $val";break;
             case (7):$data1[$i]="$ $val";break;
             case (8):$data1[$i]="$val %";break;
             case (9):$data1[$i]="$ $val";break;
             case (10):$data1[$i]="$ $val";break;
             case (11):$data1[$i]="$val %";break;
         }
         $fechaM=suma_fechas($fechaM,1);
      }
      $data[]= $data1;
   }
   createExcel("excel-mysql.xls", $data);
   exit();
}
//Crear PDF -----------------------> Fpdf
$fechaM = $fechaMenor;
//cuadros por pagina
$pdf = new PDF('L','pt',$tamnio);
//calcular el numero de filas de fechas
$veces = number_format(($cont*60)/($pdf->w-$pdf->rMargin),8);
//calcular cuantas fechas caben en una fila
$fields = (($cont/$veces))-4;
if(strpos($fields,'.')!==false){
      $etiquetas = explode(".",$fields);
      if($etiquetas[1]>0)
          $etiquetas[0]++;
}
$fields =$etiquetas[0];
//si el numero de fechas es mayor que las fechas por filas
if($cont > $fields ){
   $numPag = number_format(($cont / $fields),1);
   if(strpos($numPag,'.')!==false){
      $vNumPag = explode(".",$numPag);
   }
}
else
   $vNumPag[1]=$cont;

//cuadros totales calculados y divididos
$calculados = ($vNumPag[1]+($vNumPag[0]*$fields));
if($calculados<$cont){
   //Si faltaron cuadros sobrantes sumarlos
   $vNumPag[1]+=($cont-$calculados);
}

//calcular el tamño de divisiones de años
$fechaM = $fechaMenor;
$divAnio=0;
$divMeses[]=0;
$fila=0;
$acumulado=0;
while ($fechaM <= $fecha){
   $acumulado++;
   $divMeses[$divAnio]++;
   if($divMeses[$divAnio]>$fields or $acumulado>$fields){
      $fila++;
      $acumulado=1;
      $divAnio++;
      $divMeses[$divAnio]++;
   }
   $años[$divAnio]['fila']=$fila;
   $años[$divAnio]['divFila']=$divAnio;
   $años[$divAnio]['TamDivFila']=$divMeses[$divAnio];
   $años[$divAnio]['AñoDivFila']=anio($fechaM);
   if(mesActual($fechaM)==12)
   {
      $divAnio++;
   }
   $fechaM=suma_fechas($fechaM,1);
}
/*
for($n=0;$n<count($años);$n++){
   echo "<br><br>";
   echo "<br>Fila: ".$años[$n]['fila'];
   echo "<br>Numero de Divicion: ".$años[$n]['divFila'];
   echo "<br>Tamaño de Division: ".$años[$n]['TamDivFila'];
   echo "<br>Año de Division: ".$años[$n]['AñoDivFila'];
}*/
//comenzar a crear el reporte
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetMargins(28.5,20);
$pdf->SetFont('Arial','',6);
$MaxFilas = 15;
for($k=0;$k<=$vNumPag[0]-1;$k++){
   anios($k);
   for($i=-1;$i<$MaxFilas;$i++){
      $pdf->Cell(20);
      leyenda($i);
      for($j=($k*$fields);$j<($k*$fields)+$fields;$j++){
         $pdf->SetFillColor(255,255,255);
         $alineacion = 'L';
         if($i==-1){
            $matriz[$i][$j]=strtoupper(nombre_mes($matriz[$i][$j]));
            $pdf->SetFillColor(215,217,200);
            $alineacion = 'C';
         }

         else if($i==2 or $i==5 or $i==8  or $i==11 or $i==14)
            $matriz[$i][$j]=number_format($matriz[$i][$j],2,'.',',')." %";
         else
            $matriz[$i][$j]="$ ".number_format($matriz[$i][$j],2,'.',',');
         $pdf->Cell(60,9,$matriz[$i][$j],1,0,$alineacion,1);
      }
      $pdf->ln();
   }
   $pdf->ln(3);
}
if($vNumPag[1]!="" and $vNumPag[1]>0)
   for($ki=$k;$ki<$k+1;$ki++){
      anios($ki);
      for($i=-1;$i<$MaxFilas;$i++){
         $pdf->Cell(20);
         leyenda($i);
         for($j=($ki*$fields);$j<(($ki*$fields)+$vNumPag[1]);$j++){
            if($j>=$cont)break;
            $pdf->SetFillColor(255,255,255);
            $alineacion = 'L';
            if($i==-1){
               $matriz[$i][$j]=strtoupper(nombre_mes($matriz[$i][$j]));
               $pdf->SetFillColor(215,217,200);
               $alineacion = 'C';
            }
            else if($i==2 or $i==5  or $i==8 or $i==11  or $i==14)
               $matriz[$i][$j]=number_format($matriz[$i][$j],2,'.',',')." %";
            else
               $matriz[$i][$j]="$ ".number_format($matriz[$i][$j],2,'.',',');

            $pdf->Cell(60,9,$matriz[$i][$j],1,0,$alineacion ,1);
         }
      $pdf->ln();
      }
   }
// $pdf->ln(25);
$Ancho = ($pdf->w - $pdf->rMargin)-50;
$Alto = ($pdf->h - $pdf->bMargin)-160;
$n = 0;
while($n < count($matriz)){
   if($n>=$cont)break;
   //Etiquetas X
   if($matriz[-2][$n]=="")$matriz[-2][$n]="-";
   $datax[$n]  = $matriz[-2][$n];
   //contenido
   //Get Pos = 2 and $ydata = 1
   if($matriz[2][$n]!=""){
      $ydata1[$n] = trim(str_replace("%","",$matriz[2][$n]));
   }
   //Get Pos = 5 and $ydata = 2
   if($matriz[5][$n]!=""){
      $ydata2[$n] = trim(str_replace("%","",$matriz[5][$n]));
   }

   //Get Pos = 8 and $ydata = 3
   if($matriz[8][$n]!="" ){
      $ydata3[$n] = trim(str_replace("%","",$matriz[8][$n]));
   }

   //Get Pos = 11 and $ydata = 4
   if($matriz[11][$n]!=""){
      $ydata4[$n] = trim(str_replace("%","",$matriz[11][$n]));
   }

   $n++;
}
unset($ultimo);
for($i=1;$i<count($ydata1);$i++){
   if($ydata1[$i-1]<=$ydata1[$i]){
      $ydata1[$i]= $ydata1[$i];
      $ultimo = $ydata1[$i];
   }
   else
      $ydata1[$i]=$ultimo;
}
unset($ultimo);
for($i=1;$i<count($ydata2);$i++){
   if($ydata2[$i-1]<=$ydata2[$i]){
      $ydata2[$i]= $ydata2[$i];
      $ultimo = $ydata2[$i];
   }
   else
      $ydata2[$i]=$ultimo;
}
unset($ultimo);
for($i=1;$i<count($ydata3);$i++){
   if($ydata3[$i-1]<=$ydata3[$i]){
      $ydata3[$i]= $ydata3[$i];
      $ultimo = $ydata3[$i];
   }
   else
      $ydata3[$i]=$ultimo;
}
unset($ultimo);
for($i=1;$i<count($ydata4);$i++){
   if($ydata4[$i-1]<=$ydata4[$i]){
      $ydata4[$i]= $ydata4[$i];
      $ultimo = $ydata4[$i];
   }
   else
      $ydata4[$i]=$ultimo;
}
/*
for($i=0;$i<$n;$i++){
   echo "<br>MES: $datax[$i]  Data1: $ydata1[$i] Data2: $ydata2[$i] Data3: $ydata3[$i] Data4: $ydata4[$i]";
}
echo "<br>";*/
unset($matriz);
require_once("grafica.php");
$Ancho = 700;//($pdf->w - $pdf->rMargin)-50;
$Alto = 400;//($pdf->h - $pdf->bMargin)-160; 
if(file_exists("Grafica.png")){
   $pdf->AddPage();
   ini_set("memory_limit","1700M");
   $pdf->image("Grafica.png",40,$pdf->GetY()+10,$Ancho,$Alto);
   ini_set("memory_limit","32M");
}
mysql_close();
$pdf->Output();
?>
