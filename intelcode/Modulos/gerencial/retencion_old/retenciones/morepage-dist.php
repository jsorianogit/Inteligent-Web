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


//Cabecera de p�gina
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
		$file = fopen("imagen.jpg",'a+');
		fwrite($file,$bImagen,10000);
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
		$file = fopen("imagen2.jpg",'a+');
		fwrite($file,$bImagen2,10000);
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
	$this->image("imagen2.jpg",40,20,60,50);
	$this->Cell(($length-($length/2))-100);
	$this->MultiCell(200,10,trim($mDescripcion2),0,'C',0,0);
	$this->image("imagen.jpg",$length-(28+70),20,60,50);//480
	$posY = $this->getY();
	if($posY<80)
		$posY=80;
	$this->setY($posY);
	$this->cell($length-($length/2));
	$this->Cell(30,10,'CONTRATO :'.trim($sContrato),0,0,0);
  	// 	retenciones del contrato
  	$this->setFillColor(0,0,0);
  	$this->setTextColor(254,254,254);
	$this->setY($posY+22);
	$this->cell(20);	
	$this->Cell(100,10,'Retenciones del Contrato',1,0,0,1);
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

    // Check if Footer for this page already exists (do the same for Header())
    if(!$this->footerset[$this->page]) {
        //Page number
        $this->SetY(-40);
        $this->setTextColor(0,0,255);
        $this->Cell(25);
        $this->Cell(0,10,'Calculo Realizado en base al Acumulado Estimado Real y el Acumulado Programdo a Estimar',0,0,'C');
        $this->setTextColor(0,0,0);
        $this->SetY(-25);
        $this->Cell(100);
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
	global $a�os,$pdf;
	$pdf->Cell(20);
	$pdf->Cell(115,9,"  ",0,0,'L',0);
	$pdf->SetFillColor(215,217,200);
	$n=0;
	while ($n < count($a�os))	{
		if($a�os[$n]['fila'] == $fila )
			$pdf->Cell(($a�os[$n]['TamDivFila']*60),9,$a�os[$n]['A�oDivFila'],1,0,'C' ,1);
		$n++;
	}
	$pdf->ln();
	$pdf->SetFillColor(254,254,254);
	//$pdf->Cell(160,9,"Numero de Divicion: ".$a�os[$n]['divFila'],1,0,$alineacion ,1);$pdf->ln();
}
function leyenda($k){
	global $pdf;
	$pdf->SetFillColor(215,217,200);
	switch($k){
		case (-1):
			$pdf->Cell(115,9,"  ",0,0,'L',0);
			break;
		case (0):
			$pdf->Cell(115,9,"PROGRAMADO (M.N.)",1,0,'L',1);
			break;
		case (1):
			$pdf->Cell(115,9,"PROGRAMADO ACUMULADO(M.N.)",1,0,'L',1);
			break;
		case (2):
			$pdf->Cell(115,9,"% PROG. ACUMULADO(M.N.)",1,0,'L',1);
			break;
		case (3):
			$pdf->Cell(115,9,"REAL (M.N.)",1,0,'L',1);
			break;
		case (4):
			$pdf->Cell(115,9,"REAL ACUMULADO(M.N.)",1,0,'L',1);
			break;
		case (5):
			$pdf->Cell(115,9,"% REAL ACUMULADO (M.N.)",1,0,'L',1);
			break;

	}
	$pdf->SetFillColor(255,255,255);
}
if(isset($_POST['anyo']) and isset($_POST['mes'])){
   $anyo=$_POST['anyo'];
   $mes=$_POST['mes'];  
}
unset($tamnio);
/*$tamnio=array(210+$cont,410);
$tamnio='A3';
$tamnio='A4';
$tamnio='Letter';
$tamnio='Legal';
$tamnio='A3';
*/
if(isset($_POST['sizepapper']))
   $tamnio = $_POST['sizepapper'];
else
   $tamnio = 'Letter';


$ultimodia=ultimodia($anyo,$mes);
//calcular la fecha menor
$sql = "SELECT	 min(dIdFecha)  FROM anexosmensuales WHERE sContrato='$sContrato'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
	 $fechaMenor = $row[0];
}
//calcular el monto del convenio
$sql = "SELECT	 dMontoMN  FROM convenios WHERE sContrato='$sContrato'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
	 $dMontoMN = $row[0];
}
$fecha="$anyo-$mes-$ultimodia";
//Matriz que almacena todos los valores
unset($matriz);
//programado Mn, Programado Acumulado, % programado Acumulado
$programado[]="";
$aprogramado[]="";
$pprogramado[]="";
$fechaM = $fechaMenor;
$cont = $acumulado = 0;
while ($fechaM <= $fecha){
	$sql = "SELECT SUM(DEmn) FROM anexosmensuales WHERE sContrato='$sContrato' AND dIdFecha='$fechaM'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result)){
			$acumulado +=$row[0];
			$programado[$cont]=$row[0];
			$aprogramado[$cont]=$acumulado;
			$pprogramado[$cont]=($acumulado/$dMontoMN)*100;
			$matriz[-1][$cont]= $fechaM;
			$matriz[0][$cont]= $programado[$cont];
			$matriz[1][$cont]= $aprogramado[$cont];
			$matriz[2][$cont]= $pprogramado[$cont];
	}
	$cont++;
	$fechaM=suma_fechas($fechaM,1);
}
//calcular el monto del contrato
$sql = "SELECT	dMontoContratoMN  FROM estimacionperiodo WHERE sContrato='$sContrato'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
	$dMontoMN = $row[0];
}
//Real, Real Acumulado, % Real Acumulado
$real[]="";
$areal[]="";
$preal[]="";
$fechaM = $fechaMenor;
$cont = $acumuladoReal = 0;
if($fechaM > $fecha){
   echo "<center><h1>No Existen fechas inferiores a la seleccionada</h1></center>";
   echo "<center><h3>intente seleccionando un a�o y mes superior a ".nombre_mes($fecha)."</h3></center>";
   exit(0);
}
while ($fechaM <= $fecha){
	$sql = "SELECT dMontoMN FROM estimacionperiodo WHERE sContrato='$sContrato' AND dFechaFinal='$fechaM'";
	$result = mysql_query($sql);
	while($row = mysql_fetch_array($result)){
			$acumuladoReal +=$row[0];
			$real[$cont]=$row[0];
			$areal[$cont]=$acumuladoReal;
			$preal[$cont]=($acumuladoReal/$dMontoMN)*100;
			$matriz[3][$cont]=$real[$cont];
			$matriz[4][$cont]=$areal[$cont];
			$matriz[5][$cont]=$preal[$cont];
	}
	$cont++;
	$fechaM=suma_fechas($fechaM,1);
}

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

//calcular el tam�o de divisiones de a�os
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
	$a�os[$divAnio]['fila']=$fila;
	$a�os[$divAnio]['divFila']=$divAnio;
	$a�os[$divAnio]['TamDivFila']=$divMeses[$divAnio];
	$a�os[$divAnio]['A�oDivFila']=anio($fechaM);
	if(mesActual($fechaM)==12)
	{
		$divAnio++;
	}
	$fechaM=suma_fechas($fechaM,1);
}
/*
for($n=0;$n<count($a�os);$n++){
	echo "<br><br>";
	echo "<br>Fila: ".$a�os[$n]['fila'];
	echo "<br>Numero de Divicion: ".$a�os[$n]['divFila'];
	echo "<br>Tama�o de Division: ".$a�os[$n]['TamDivFila'];
	echo "<br>A�o de Division: ".$a�os[$n]['A�oDivFila'];
}*/
//comenzar a crear el reporte
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetMargins(28.5,20);
$pdf->SetFont('Arial','',6);
for($k=0;$k<=$vNumPag[0]-1;$k++){
	anios($k);
	for($i=-1;$i<6;$i++){
		$pdf->Cell(20);
		leyenda($i);
		for($j=($k*$fields);$j<($k*$fields)+$fields;$j++){
			$pdf->SetFillColor(255,255,255);
			$alineacion = 'L';
			if($i==-1){
				$matriz[$i][$j]=nombre_mes($matriz[$i][$j]);
				$pdf->SetFillColor(215,217,200);
				$alineacion = 'C';
			}

			else if($i==2 or $i==5)
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
		for($i=-1;$i<6;$i++){
  			$pdf->Cell(20);
			leyenda($i);
			for($j=($ki*$fields);$j<(($ki*$fields)+$vNumPag[1]);$j++){
				if($j>=$cont)break;
				$pdf->SetFillColor(255,255,255);
				$alineacion = 'L';
				if($i==-1){
					$matriz[$i][$j]=nombre_mes($matriz[$i][$j]);
					$pdf->SetFillColor(215,217,200);
					$alineacion = 'C';
				}
				else if($i==2 or $i==5)
					$matriz[$i][$j]=number_format($matriz[$i][$j],2,'.',',')." %";
				else
				   $matriz[$i][$j]="$ ".number_format($matriz[$i][$j],2,'.',',');

				$pdf->Cell(60,9,$matriz[$i][$j],1,0,$alineacion ,1);
			}
		$pdf->ln();
		}
	}
	$pdf->ln(25);
/*	
for($n=0;$n<count($a�os);$n++){
	$pdf->ln(2);
	$pdf->Cell(160,9,"Fila: ".$a�os[$n]['fila'],1,0,$alineacion ,1);$pdf->ln();
	$pdf->Cell(160,9,"Numero de Divicion: ".$a�os[$n]['divFila'],1,0,$alineacion ,1);$pdf->ln();
	$pdf->Cell(160,9,"Tama�o de Division: ".$a�os[$n]['TamDivFila'],1,0,$alineacion ,1);$pdf->ln();
	$pdf->Cell(160,9,"A�o de Division: ".$a�os[$n]['A�oDivFila'],1,0,$alineacion ,1);$pdf->ln();
}
*/
mysql_close();
$pdf->Output();
?>