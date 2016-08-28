<?php
set_time_limit(0);
define('FPDF_FONTPATH','font/');
require("../../fpdf153/fpdf.php");

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
	global $sContrato,$iNumeroEstimacion,$link;
   	$sql = "SELECT	 
		mDescripcion
	  FROM actividadesxestimacion WHERE iNumeroEstimacion='$iNumeroEstimacion' and sContrato='$sContrato' AND iNivel=0";
	$result = mysql_query($sql,$link);
	if($row = mysql_fetch_array($result)){
		$mDescripcion=$row[0];
	}
   	$sql = "SELECT	 
		dMontoMN
	  FROM convenios WHERE sContrato='$sContrato'";
	$result = mysql_query($sql,$link);
	if($row = mysql_fetch_array($result)){
		$dMontoMN="$  ".number_format($row[0],2,'.',',');
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
	global $sContrato,$link;
	//$sql =" select sNombre from usuarios where sIdUsuario='IMOLINA'";
	$sql = "select sIdUsuarioValida,sIdUsuarioAutoriza from estimaciones where sContrato='$sContrato'";
	$result = mysql_query($sql,$link);
	if($row = mysql_fetch_array($result)){
		$sIdUsuarioValida=$row['sIdUsuarioValida'];
		$sIdUsuarioAutoriza=$row['sIdUsuarioAutoriza'];
	}
	if(isset($sIdUsuarioAutoriza) and isset($sIdUsuarioValida)){
		$sql = "select sNombre from usuarios where sIdUsuario='$sIdUsuarioValida'";
		$result = mysql_query($sql,$link);
		if($row = mysql_fetch_array($result)){
			$UsuarioValida=$row['sIdUsuarioValida'];
		}
		$sql = "select sNombre from usuarios where sIdUsuario='$sIdUsuarioAutoriza'";
		$result = mysql_query($sql,$link);
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
        $this->SetFont('Arial','',6);
        foreach($data AS $col => $txt) {
        	if($posicion == 0 AND strpos($txt,".")===false or $data[2]==""){
         	$fil=1;
            $this->SetFont('Arial','B',6);
         }
         else if($data[2]!="")
          	$this->SetFont('Arial','',6);

         $fil=0;//Siempre poner fondo blanco
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

require("../../include/mysql.inc.php");
if(isset($_POST['iNumeroEstimacion']))
   $iNumeroEstimacion=$_POST['iNumeroEstimacion'];
 $sql = "SELECT	 
 		sTipoActividad,
		sNumeroActividad,
		mDescripcion,
		sMedida,
		dVentaMN,
		dCantidadAnexo,
		dCantidad,
		dAcumuladoAnterior,
		dAcumuladoActual,
		dMontoMN,
		dMontoAcumuladoMN,
		sWbsAnterior
	  FROM actividadesxestimacion WHERE iNumeroEstimacion='$iNumeroEstimacion' and sContrato='$sContrato' AND iNivel>0 order by iItemOrden";
$result = mysql_query($sql,$link);
$pdf = new PDF('P','pt');
$pdf->Open();
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetMargins(28.5,20);
// set the tablewidths like this or write an extra function
$pdf->tablewidths = array(30,180,30,45,45,45,45,45,45,45);

$j=0;
while($row = mysql_fetch_array($result)){
	$datas[$j][0]=$row['sNumeroActividad'];
	$datas[$j][1]=$row['mDescripcion'];
	$datas[$j][2]=$row['sMedida'];
	$datas[$j][3]="$ ".number_format($row['dVentaMN'],2,'.','.');
	$datas[$j][4]=$row['dCantidadAnexo'];
	$datas[$j][5]=$row['dCantidad'];
	$datas[$j][6]=$row['dAcumuladoAnterior'];
	$datas[$j][7]=$row['dAcumuladoActual'];
	$datas[$j][8]="$ ".number_format($row['dMontoMN'],2,'.','.');
	$datas[$j][9]="$ ".number_format($row['dMontoAcumuladoMN'],2,'.','.');
	$j++;
	
}

$pdf->SetFont('Arial','',6);
if($datas){
	$pdf->morepagestable($datas);
	
	$sql ="SELECT 
dAvanceFisicoProgramado,
dAvanceFisicoReal,
dAvanceFinancieroProgramado,
dAvanceFinancieroReal,
sElementoPEP,
sFondo,
sPosicionFinanciera,
sCuentaMayor,
sCentroGestor,
sCentroCosto,
sCentroBeneficio,
sProyecto,
dFechaInicio,
dFechaFinal,
dMontoMN,
dMontoDLL,
dMontoAcumuladoMN,
dMontoAcumuladoDLL,
dMontoMNGeneradores,
dMontoDLLGeneradores,
dMontoContratoMN,
dMontoContratoDLL,
dMontoProgramadoMensualMN,
dMontoProgramadoMensualDLL,
dMontoProgramadoAcumuladoMN,
dMontoProgramadoAcumuladoDLL
	 FROM estimacionperiodo WHERE sContrato='$sContrato' AND iNumeroEstimacion='$iNumeroEstimacion'";
	$result = mysql_query($sql,$link);
	$pdf->ln(30);
	if($row = mysql_fetch_array($result)){
		//for($i=0;$i<mysql_num_fields($result);$i++)	{
			$dAvanceFisicoProgramado= number_format($row['dAvanceFisicoProgramado'],2,'.',',')."  %";
			$dAvanceFisicoReal= number_format($row['dAvanceFisicoReal'],2,'.',',')."  %";
			$dAvanceFinancieroProgramado= number_format($row['dAvanceFinancieroProgramado'],2,'.',',')."  %";
			$dAvanceFinancieroReal= number_format($row['dAvanceFinancieroReal'],2,'.',',')."  %";
			$sElementoPEP= $row['sElementoPEP'];
			$sFondo= $row['sFondo'];
			$sPosicionFinanciera= $row['sPosicionFinanciera'];
			$sCuentaMayor= $row['sCuentaMayor'];
			$sCentroGestor= $row['sCentroGestor'];
			$sCentroCosto= $row['sCentroCosto'];
			$sCentroBeneficio= $row['sCentroBeneficio'];
			$sProyecto= $row['sProyecto'];
			$dFechaInicio= $row['dFechaInicio'];
			$dFechaFinal= $row['dFechaFinal'];
			$dMontoMN= "$  ".number_format($row['dMontoMN'],2,'.',',');
			$dMontoDLL="$  ".number_format($row['dMontoDLL'],2,'.',',');
			$dMontoAcumuladoMN= "$  ".number_format($row['dMontoAcumuladoMN'],2,'.',',');
			$dMontoAcumuladoDLL= "$  ".number_format($row['dMontoAcumuladoDLL'],2,'.',',');
			$dMontoMNGeneradores="$  ".number_format($row['dMontoMNGeneradores'],2,'.',',');
			$dMontoDLLGeneradores="$  ".number_format($row['dMontoDLLGeneradores'],2,'.',',');
			$dMontoContratoMN="$  ".number_format($row['dMontoContratoMN'],2,'.',',');
			$dMontoContratoDLL="$  ".number_format($row['dMontoContratoDLL'],2,'.',',');
			$dMontoProgramadoMensualMN="$  ".number_format($row['dMontoProgramadoMensualMN'],2,'.',',');
			$dMontoProgramadoMensualDLL="$  ".number_format($row['dMontoProgramadoMensualDLL'],2,'.',',');
			$dMontoProgramadoAcumuladoMN="$  ".number_format($row['dMontoProgramadoAcumuladoMN'],2,'.',',');
			$dMontoProgramadoAcumuladoDLL="$  ".number_format($row['dMontoProgramadoAcumuladoDLL'],2,'.',',');
	//	}
	}
$pdf->SetFillColor(215,217,200);
if($pdf->getY()>250)
{
   $pdf->addPage();
   $y = $pdf->getY()+20;
}
else
{
   $y = $pdf->getY();
}
$pdf->setY($y); 
$pdf->Cell(60,9,"Elemento PEP",1,'C',1);
$pdf->Cell(100,9,$sElementoPEP,1,'C',1);$pdf->ln();

$pdf->Cell(60,9,"Fondo",1,'C',1);
$pdf->Cell(100,9,$sFondo,1,'C',1);$pdf->ln();

$pdf->Cell(60,9,"Posicion Financiera",1,'C',1);
$pdf->Cell(100,9,$sPosicionFinanciera,1,'C',1);$pdf->ln();

$pdf->Cell(60,9,"Cuenta Mayor",1,'C',1);
$pdf->Cell(100,9,$sCuentaMayor,1,'C',1);$pdf->ln();

$pdf->Cell(60,9,"Centro Gestor",1,'C',1);
$pdf->Cell(100,9,$sCentroGestor,1,'C',1);$pdf->ln();

$pdf->Cell(60,9,"Centro de Costo",1,'C',1); 	
$pdf->Cell(100,9,$sCentroCosto,1,'C',1);$pdf->ln();

$pdf->Cell(60,9,"Centro Beneficio",1,'C',1);
$pdf->Cell(100,9,$sCentroBeneficio,1,'C',1);$pdf->ln();

$pdf->Cell(60,9,"Proyecto",1,'C',1);
$pdf->Cell(100,9,$sProyecto,1,'C',1);$pdf->ln(20);

$pdf->Cell(120,9,"VIGENCIA DEL CONTRATO",1,1,'C',1);
$pdf->Cell(60,9,"FECHA INICIO",1,0,'L',1);
$pdf->Cell(60,9,$dFechaInicio,1,0,1);$pdf->ln();
$pdf->Cell(60,9,"FECHA TERMINO",1,0,'L',1);
$pdf->Cell(60,9,$dFechaFinal,1,0,1);$pdf->ln(20);

$avance = 100 + 70;
$avance2 = 85;
$pdf->setY($y); 
$pdf->Cell(180+$avance+$avance2);
$pdf->Cell(120,9,"AVANCE DE OBRA",1,1,'C',1);
$pdf->setY($y+9); 
$pdf->Cell(180+$avance+$avance2);
$pdf->Cell(60,9,"FISICO",1,1,'C',1);
$pdf->setY($y+9); 
$pdf->Cell(240+$avance+$avance2);
$pdf->Cell(60,9,"FINANCIERO",1,1,'C',1);$pdf->ln();
$pdf->setY($y+18); 
$pdf->Cell(130+$avance+$avance2);
$pdf->Cell(50,9,"REAL",1,1,'L',1);
$pdf->setY($y+27); 
$pdf->Cell(130+$avance+$avance2);
$pdf->Cell(50,9,"PROGRAMADO",1,1,'L',1);$pdf->ln();
$pdf->setY($y+18); 
$pdf->Cell(180+$avance+$avance2);
$pdf->Cell(60,9,$dAvanceFisicoProgramado,1,'C',1);
$pdf->setY($y+18); 
$pdf->Cell(240+$avance+$avance2);
$pdf->Cell(60,9,$dAvanceFinancieroProgramado,1,'C',1);$pdf->ln(20);
$pdf->setY($y+27); 
$pdf->Cell(180+$avance+$avance2);
$pdf->Cell(60,9,$dAvanceFisicoReal,1,'C',1);
$pdf->setY($y+27); 
$pdf->Cell(240+$avance+$avance2);
$pdf->Cell(60,9,$dAvanceFinancieroReal,1,'C',1);$pdf->ln(20);

$avance2 = 35;
$pdf->setY($y+39); 
$pdf->Cell(180+$avance+$avance2);
$pdf->Cell(170,9,"CALCULO DE RETENCION",1,1,'C',1);

$pdf->setY($y+39+9); 
$pdf->Cell(180+$avance+$avance2);
$pdf->Cell(100,9,"Monto Programado Mensual",1,1,'L',1);
$pdf->setY($y+39+9); 
$pdf->Cell(180+$avance+100+$avance2);
$pdf->Cell(70,9,$dMontoProgramadoMensualMN,1,1,'L',0);$pdf->ln();

$pdf->setY($y+48+9); 
$pdf->Cell(180+$avance+$avance2);
$pdf->Cell(100,9,"Monto Programado Acumulado",1,1,'L',1);
$pdf->setY($y+48+9); 
$pdf->Cell(180+$avance+100+$avance2);
$pdf->Cell(70,9,$dMontoProgramadoAcumuladoMN,1,1,'L',0);$pdf->ln();

$pdf->setY($y+39+9+9+9); 
$pdf->Cell(180+$avance+$avance2);
$pdf->Cell(100,9,"Monto Ejercido",1,1,'L',1);
$pdf->setY($y+39+9+9+9); 
$pdf->Cell(180+$avance+100+$avance2);
$pdf->Cell(70,9,$dMontoMN,1,1,'L',0);$pdf->ln();

$pdf->setY($y+48+9+9+9); 
$pdf->Cell(180+$avance+$avance2);
$pdf->Cell(100,9,"Monto Ejercido Acumulado",1,1,'L',1);
$pdf->setY($y+48+9+9+9); 
$pdf->Cell(180+$avance+100+$avance2);
$pdf->Cell(70,9,$dMontoAcumuladoMN,1,1,'L',0);$pdf->ln();
}

$pdf->Output();
mysql_close();
?>