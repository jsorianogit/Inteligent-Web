<?php
set_time_limit(0);
define('FPDF_FONTPATH','font/');
require("../../../fpdf153/fpdf.php");

class PDF extends FPDF {

var $tablewidths;
var $footerset;

function PDF($orientation='P',$unit='mm',$format='A4')
{
    //Call parent constructor
    $this->FPDF($orientation,$unit,$format);
}

function _beginpage($orientation) {
    $this->page++;
    if(!$this->pages[$this->page]) // solved the problem of overwriting a page, if it already exists
        $this->pages[$this->page]='';
    $this->state=2;
    $this->x=$this->lMargin;
    $this->y=$this->tMargin;
    $this->lasth=0;
    $this->FontFamily='';
    //Page orientation
    if(!$orientation)
        $orientation=$this->DefOrientation;
    else
    {
        $orientation=strtoupper($orientation{0});
        if($orientation!=$this->DefOrientation)
            $this->OrientationChanges[$this->page]=true;
    }
    if($orientation!=$this->CurOrientation)
    {
        //Change orientation
        if($orientation=='P')
        {
            $this->wPt=$this->fwPt;
            $this->hPt=$this->fhPt;
            $this->w=$this->fw;
            $this->h=$this->fh;
        }
        else
        {
            $this->wPt=$this->fhPt;
            $this->hPt=$this->fwPt;
            $this->w=$this->fh;
            $this->h=$this->fw;
        }
        $this->PageBreakTrigger=$this->h-$this->bMargin;
        $this->CurOrientation=$orientation;
    }
}

//Cabecera de página
function Header()
{
	global $sContrato,$iNumeroEstimacion;
   	$sql = "SELECT	 
		mDescripcion
	  FROM actividadesxestimacion WHERE iNumeroEstimacion='$iNumeroEstimacion' and sContrato='$sContrato' AND iNivel=0";
	$result = mysql_query($sql);
	if($row = mysql_fetch_array($result)){
		$mDescripcion=$row[0];
	}
   	$sql = "SELECT	 
		dMontoMN
	  FROM convenios WHERE sContrato='$sContrato'";
	$result = mysql_query($sql);
	if($row = mysql_fetch_array($result)){
		$dMontoMN="$  ".number_format($row[0],2,'.',',');
	}
   	$sql = "SELECT	 
		sNombre,bImagen
	  FROM configuracion WHERE sContrato='$sContrato'";
	$result = mysql_query($sql);
	if($row = mysql_fetch_array($result)){
		$sNombre=$row[0];
		$bImagen = $row[1];
	}
	if($bImagen != ""){
		$file = fopen("imagen.jpg",'a+');
		fwrite($file,$bImagen,500000);
		fclose($file);
	}
   	$sql = "SELECT	 
		mCliente,bImagen
	  FROM contratos WHERE sContrato='$sContrato'";
	$result = mysql_query($sql);
	if($row = mysql_fetch_array($result)){
		$mDescripcion2=$row[0];
		$bImagen2 = $row[1];
	}
	if($bImagen2 != ""){
		$file = fopen("imagen2.jpg",'a+');
		fwrite($file,$bImagen2,500000);
		fclose($file);
	}
	$this->SetFont('Arial','B',6);
	$this->SetFillColor(215,217,200);

	//Calcular Numero de Lineas
	$tamDescripcion2 = strlen($mDescripcion2)/200;
	$tamsNombre = strlen($sNombre)/180;
	$tamDescripcion = strlen($mDescripcion)/180;
   $linesTitle = $tamDescripcion2 + $tamsNombre +  $tamDescripcion ;
	//Rectangulo redondeado
   //$yFinal = $this->getY();
	$this->SetLineWidth(0.5);
   $this->SetFillColor(255);
   $this->RoundedRect(25,10, 560, 120+$linesTitle, 3.5, 'DF');

   //Title
	$this->image("imagen2.jpg",40,20,60,50);
	$this->Cell(150);
	$this->MultiCell(200,10,trim($mDescripcion2),0,'C',0,0);
	$this->image("imagen.jpg",480,20,60,50);
	$posY = $this->getY();
	if($posY<80)
		$posY=80;
	$this->setY($posY);
	$this->Cell(30,10,'OBRA:',0,0,'C',0);
	$this->setY($posY);
	$this->Cell(40);
	$this->MultiCell(180,10,trim($mDescripcion),0,1,0,0);
	$yDescripcion = $this->getY();
	$this->setY($posY);
	$this->cell(400);
	$this->Cell(30,10,'ESTIMACION NO.:',0,0,0);
	$this->setY($posY);
	$this->cell(435);
	$this->MultiCell(180,10,trim($iNumeroEstimacion),0,1,0,0);
	$this->setY($posY+10);
	$this->cell(400);
	$this->Cell(30,10,'CONTRATO :',0,0,0);
	$this->setY($posY+10);
	$this->cell(435);
	$this->MultiCell(180,10,trim($sContrato),0,1,0,0);
	$this->setY($posY+20);
	$this->cell(400);
	$this->Cell(30,10,'VALOR DEL CONTRATO :',0,0,0);
	$this->setY($posY+20);
	$yContrato = $this->getY();
	$this->cell(435);
	$this->MultiCell(180,10,$dMontoMN,0,1,0,0);
	$this->setY($yDescripcion + 2);
	$this->cell(22);
	$this->Cell(30,10,'CONTRATISTA:',0,0,0);
	$this->setY($yDescripcion  + 2 );
	$this->cell(50);
	$this->MultiCell(180,10,$sNombre,0,1,0,0);
	if($yDescripcion > $yContrato)$this->setY($yDescripcion);
	else $this->setY($yContrato);
   
	//Titulos de columnas
	$posY = $this->getY();
	$posY=$posY+40;
	$this->setY($posY);
	$this->Cell(30,20,'PART.',1,0,'C',1);
	$this->Cell(180,20,'CONCEPTO DE OBRA',1,0,'C',1);
	$this->Cell(30,20,'UNIDAD',1,0,'C',1);
	$this->setY($posY);
	$this->Cell(240);
	$this->MultiCell(45,10,'PRECIO UNITARIO',1,'C',1);
	$this->SetFillColor(215,217,200);
	$this->setY($posY);
	$this->Cell(285);
	$this->MultiCell(180,10,'VOLUMENES DE OBRA',1,'C',1);
	$this->SetFont('Arial','',5);
	$this->SetFillColor(215,240,200);
	$this->setY($posY+10);
	$this->Cell(285);
	$this->MultiCell(45,5,'CONTRATO ANEXO "C"',1,'C',1);
	$this->setY($posY+10);
	$this->Cell(330);
	$this->MultiCell(45,10,'ESTA EST.',1,'C',1);
	$this->setY($posY+10);
	$this->Cell(375);
	$this->MultiCell(45,5,'ACUMULADO ANTERIOR',1,'C',1);
	$this->setY($posY+10);
	$this->Cell(420);
	$this->MultiCell(45,10,'ACUMULADO',1,'C',1);
	$this->SetFillColor(215,217,200);
	$this->SetFont('Arial','B',6);
	$this->setY($posY);
	$this->Cell(465);
	$this->MultiCell(90,10,'IMPORTE',1,'C',1);
	$this->SetFillColor(215,240,200);
	$this->SetFont('Arial','',5);
	$this->setY($posY+10);
	$this->Cell(465);
	$this->MultiCell(45,10,'ESTA EST.',1,'C',1);
	$this->setY($posY+10);
	$this->Cell(510);
	$this->MultiCell(45,10,'ACUMULADO',1,'C',1);
	
}

function Footer() {
	global $sContrato;
	//$sql =" select sNombre from usuarios where sIdUsuario='IMOLINA'";
	$sql = "select sIdUsuarioValida,sIdUsuarioAutoriza from estimaciones where sContrato='$sContrato'";
	$result = mysql_query($sql);
	if($row = mysql_fetch_array($result)){
		$sIdUsuarioValida=$row['sIdUsuarioValida'];
		$sIdUsuarioAutoriza=$row['sIdUsuarioAutoriza'];
	}
	if(isset($sIdUsuarioAutoriza) and isset($sIdUsuarioValida)){
		$sql = "select sNombre from usuarios where sIdUsuario='$sIdUsuarioValida'";
		$result = mysql_query($sql);
		if($row = mysql_fetch_array($result)){
			$UsuarioValida=$row['sIdUsuarioValida'];
		}
		$sql = "select sNombre from usuarios where sIdUsuario='$sIdUsuarioAutoriza'";
		$result = mysql_query($sql);
		if($row = mysql_fetch_array($result)){
			$UsuarioAutoriza=$row['sIdUsuarioAutoriza'];
		}

	}
    // Check if Footer for this page already exists (do the same for Header())
    if(!$this->footerset[$this->page]) {
        $this->SetY(-40);
   	  $this->Cell(1);
        $this->Cell(10,10,"Elaboro: $UsuarioValida",0,0,'C');
        //Page number
        $this->SetY(-40);
        $this->Cell(100);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        // set footerset
        $this->SetY(-40);	
        $this->Cell(450);
        $this->Cell(10,10,"Autorizo: $UsuarioAutoriza",0,0,'C');
        $this->footerset[$this->page] = 1;
    }
}

function morepagestable($datas,$lineheight=8) {
    // some things to set and 'remember'
    $l = $this->lMargin;
    $startheight = $h = $this->GetY();
    $startpage = $currpage = $this->page;
    // calculate the whole width
    foreach($this->tablewidths AS $width) {
        $fullwidth += $width;
    }
   $this->SetFont('Arial','',6);
    // Now let's start to write the table
    foreach($datas AS $row => $data) {
        $this->page = $currpage;
        // write the horizontal borders
        $this->Line($l,$h,$fullwidth+$l,$h);
        // write the content and remember the height of the highest col
        $posicion = 0;
        $fil=0;
        foreach($data AS $col => $txt) {
        	if($posicion == 0 AND strpos($txt,".")===false){
        		$fil=1;
        	}
        	
        	$posicion++;
         	$this->SetFillColor(60,100,200);
         	$this->SetTextColor(0,0,0);
            $this->page = $currpage;
            $this->SetXY($l,$h);
            $this->MultiCell($this->tablewidths[$col],$lineheight,$txt,0,1,$fil);
            $l += $this->tablewidths[$col];
			$this->SetFillColor(0,0,0);
            if($tmpheight[$row.'-'.$this->page] < $this->GetY()) {
                $tmpheight[$row.'-'.$this->page] = $this->GetY();
            }
            if($this->page > $maxpage)
                $maxpage = $this->page;
        }

        // get the height we were in the last used page
        $h = $tmpheight[$row.'-'.$maxpage];
        // set the "pointer" to the left margin
        $l = $this->lMargin;
        // set the $currpage to the last page
        $currpage = $maxpage;
    }
    // draw the borders
    // we start adding a horizontal line on the last page
    $this->page = $maxpage;
    $this->Line($l,$h,$fullwidth+$l,$h);
    // now we start at the top of the document and walk down
    for($i = $startpage; $i <= $maxpage; $i++) {
        $this->page = $i;
        $l = $this->lMargin;
        $t  = ($i == $startpage) ? $startheight : $this->tMargin+140;
        $lh = ($i == $maxpage)   ? $h : $this->h-$this->bMargin;
        $this->Line($l,$t,$l,$lh);
        foreach($this->tablewidths AS $width) {
            $l += $width;
            $this->Line($l,$t,$l,$lh);
        }
    }
    // set it to the last page, if not it'll cause some problems
    $this->page = $maxpage;
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

require("../../../include/mysql.inc.php");
require("../fecha.php");
if(isset($_POST['anyo']) and isset($_POST['mes'])){
   $anyo=$_POST['anyo'];
   $mes=$_POST['mes'];  
}
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
echo "<br>$cont";
//calcular el monto del contrato
$sql = "SELECT	dMontoContratoMN  FROM estimacionperiodo WHERE sContrato='$sContrato'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
	$dMontoMN = $row[0];
}
echo "<br><br>";
//Real, Real Acumulado, % Real Acumulado
$real[]="";
$areal[]="";
$preal[]="";
$fechaM = $fechaMenor;
$cont = $acumuladoReal = 0;
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
//calcular el tamño de divisiones de años
$fechaM = $fechaMenor;
$divAnio=0;
$divMeses[]=0;
while ($fechaM <= $fecha){
	$divMeses[$divAnio]++;
	if(mesActual($fechaM)==12)
	{
		$divAnio++;
	}
	$fechaM=suma_fechas($fechaM,1);
}
$fechaM = $fechaMenor;
//cuadros por pagina
if($cont > 10 ){
	$numPag = ($cont / 10);
	if(strpos($numPag,'.')!==false){
		$vNumPag = explode(".",$numPag);
	}
}

for($k=0;$k<=$vNumPag[0]-1;$k++){
	echo "\n<table border=2>";
	if($divMeses[$k]>10){
		$divMeses[$k+1]+=($divMeses[$k]-10);
		$divMeses[$k]=10;
	}else if($divMeses[$k]<10){
		$divMeses[$k+1]+=(10-$divMeses[$k]);
		$divMeses[$k]=10;
	}
	echo "\n\t\t<td colspan=$divMeses[$k]>$divMeses[$k]</td>";
	for($i=-1;$i<6;$i++){
		echo "\n\t<tr>";
		for($j=($k*10);$j<($k*10)+10;$j++){
			echo "\n\t\t<td>".$matriz[$i][$j]."</td>";
		}
		echo "\n\t</tr>";
	}
	echo "\n</table>";
}
if($vNumPag[1]!="" and $vNumPag[1]>0)
	for($ki=$k;$ki<$k+1;$ki++){
		echo "\n<table border=2>";
		echo "\n\t\t<td colspan=$divMeses[$ki]>$divMeses[$ki]</td>";
		for($i=-1;$i<6;$i++){
			echo "\n\t<tr>";
			for($j=($ki*10);$j<(($ki*10)+$vNumPag[1])-1;$j++){
				echo "\n\t\t<td>".$matriz[$i][$j]."</td>";
			}
			echo "\n\t</tr>";
		}
		echo "\n</table>";
	}

/*
$fechaM = $fechaMenor;
$divAnio=0;
$divMeses[]=0;
while ($fechaM <= $fecha){
	$divMeses[$divAnio]++;
	if(mesActual($fechaM)==12)
	{
		$divAnio++;
	}
	$fechaM=suma_fechas($fechaM,1);
}
echo "<br>Años".count($divMeses);
foreach($divMeses as $cantMeses){
	echo "<br>Meses".$cantMeses;
	$divMes +=$cantMeses;
}
echo "<br>div Años".$divMes;
$fechaM = $fechaMenor;

echo "<table BORDER=2>";
echo "<tr>";
foreach($divMeses as $cantMeses){
	echo "<td COLSPAN=$cantMeses>$cantMeses";
	echo "</td>";

}
echo "</tr>";
echo "<tr>";
for($i=0;$i<$divMes;$i++){
	echo "<td>$divMes";
	echo "</td>";

}
echo "<td>";
echo "</td>";
echo "</tr>";
echo "</table>";*/
mysql_close();
?>