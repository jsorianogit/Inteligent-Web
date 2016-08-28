<?php
#conexion con el servidr
require("../../../../../Modulos/include/mysql.inc.php");

#variables requeridas
$sContrato=$_REQUEST['contract'];
$convenio=$_REQUEST['convenio'];
$Fecha=$_REQUEST['Fecha'];

#borrar antiguo documento
if(file_exists("$sContrato.pdf"))
   unlink("$sContrato.pdf");

#clase fpdf
define(FPDF_FONTPATH,'../fpdf153/font/');
require('../fpdf153/fpdf.php');

#cabezera del documento
require('rpt_encabezado_Pie.php');
#clase que crea un reporte sencillo
#para modificar la cabezera y pie, redefina los metodos:
#header y footer
#en una nueva clase de reporte
class rPDF extends PDF {

var $tablewidths;
var $headerset;
var $footerset;

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
##encabezado de el estatus
   /*Lee las imagenes y configuracion y las pone en el PDF*/
   function PrintImage()
   {
      global $nameFile;
      $PosX=50;
      $x=$PosX;
      $y=17;//$this->GetY()+1;
      $Ancho=80;
      $Alto=45;
      $NumImg=0;
      $Tamanio=sizeof($nameFile);
      while($NumImg<$Tamanio)
      {
         $NumImg++;
         if(file_exists("photo/".$nameFile[$NumImg][0]))
            $this->image("photo/".$nameFile[$NumImg][0],$x,$y,$Ancho,$Alto);
         if(file_exists("photo/".$nameFile[$NumImg][1]))
            $this->image("photo/".$nameFile[$NumImg][1],$x+590,$y,$Ancho,$Alto);
         $this->setY($y);
         $this->Cell(735,52,"",1,1,'C');
         $this->setY($y+3);
         $this->cell(200);
         $this->SetFont('Arial','',7);
         $this->MultiCell(270,6,$nameFile[$NumImg][4],0,'C');
         $this->setY($y+45);
         $this->cell(280);
         $this->MultiCell(120,3,"CONTRATO No.: ".$nameFile[$NumImg][3],0,'C');
         $this->setY(98);


      }
   }
function Header()
{
    global $maxY;
    global $sContrato;
    global $Fecha;
    global $nameFile;
    // Check if header for this page already exists
    if(!$this->headerset[$this->page]) {
              //Select Arial bold 15
         parent::GetImage($sContrato);
         $this->PrintImage();
         parent::rmImage();
         $this->Ln(5);
         $this->tMargin = $this->GetY();

        foreach($this->tablewidths as $width) {
            $fullwidth += $width;
        }
        $this->SetY(($this->tMargin) - ($this->FontSizePt/$this->k)*2);
        $this->cellFontSize = $this->FontSizePt ;
        $this->SetFont('Arial','',( ( $this->titleFontSize) ? $this->titleFontSize : $this->FontSizePt ));
        //$this->Cell(0,$this->FontSizePt,$this->titleText,0,1,'C');
        $l = ($this->lMargin);
        $this->SetFont('Arial','',$this->cellFontSize);

        $this->RoundedRect(27.5, $this->tMargin-23, 735, 25 , 10, '1001');
        $this->setFillColor(95,174,205);
        $this->setY($this->tMargin-28);
        $this->Cell(20);
       $this->MultiCell(305, 9,"INFORME COMPARATIVO DE CANTIDAD ANEXO CONTRA INSTALADO AL DIA $Fecha",1,1,1);
        $this->setY($this->tMargin-18);
        $this->Cell(20);
        $this->SetFont('Arial','',6);
        $this->MultiCell(700, 9,$nameFile[1][2]);
        $this->SetFont('Arial','',$this->cellFontSize);

        $this->tMargin = $this->GetY()+35;
        $this->RoundedRect(27.5, $this->tMargin-12, 735, 12 , 10, '1001');
        $this->setFillColor(95,174,205);
        $this->setY($this->tMargin-17);
        $this->Cell(20);
        $this->MultiCell(130, 9,"DETALLES DE MOVIMIENTOS",1,1,1);

        foreach($this->colTitles as $col => $txt) {
            $this->SetXY($l,($this->tMargin));
            $this->MultiCell($this->tablewidths[$col], $this->FontSizePt,$txt);
            $l += $this->tablewidths[$col] ;
            $maxY = ($maxY < $this->getY()) ? $this->getY() : $maxY ;
        }
        $this->SetXY($this->lMargin,$this->tMargin);
        $this->setFillColor(95,174,205);
        $l = ($this->lMargin);
        foreach($this->colTitles as $col => $txt) {
            $this->SetXY($l,$this->tMargin);
            $this->cell($this->tablewidths[$col],$maxY-($this->tMargin),'',1,0,'L',1);
            $this->SetXY($l,$this->tMargin);
            $this->MultiCell($this->tablewidths[$col],$this->FontSizePt,$txt,0,'C');
            $l += $this->tablewidths[$col];
        }
        $this->setFillColor(255,255,255);
        // set headerset
        $this->headerset[$this->page] = 1;
    }

    $this->SetY($maxY);
}

function Footer() {
    // Check if footer for this page already exists
    if(!$this->footerset[$this->page]) {
        $this->SetY(-15);
        //Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        // set footerset
        $this->footerset[$this->page] = 1;
    }
}

function morepagestable($lineheight=8) {
    // some things to set and 'remember'
    $l = $this->lMargin;
    $startheight = $h = $this->GetY();
    $startpage = $currpage = $this->page;

    // calculate the whole width
    foreach($this->tablewidths as $width) {
        $fullwidth += $width;
    }

    // Now let's start to write the table
    $row = 0;
    while($data=mysql_fetch_row($this->results)) {
        $this->page = $currpage;
        // write the horizontal borders
        $this->Line($l,$h,$fullwidth+$l,$h);
        // write the content and remember the height of the highest col
        foreach($data as $col => $txt) {
            if(strpos($txt,'$')!==false)
            {
               $txt = str_replace('$','',$txt);
               $txt = "$".number_format($txt,2,'.',',');
            }
            $this->page = $currpage;
            $this->SetXY($l,$h);
            $this->MultiCell($this->tablewidths[$col],$lineheight,$txt,0,$this->colAlign[$col]);

            $l += $this->tablewidths[$col];

            if($tmpheight[$row.'-'.$this->page] < $this->GetY()) {
                $tmpheight[$row.'-'.$this->page] = $this->GetY();
            }
            if($this->page > $maxpage)
                $maxpage = $this->page;
            unset($data[$col]);
        }
        // get the height we were in the last used page
        $h = $tmpheight[$row.'-'.$maxpage];
        // set the "pointer" to the left margin
        $l = $this->lMargin;
        // set the $currpage to the last page
        $currpage = $maxpage;
        unset($data[$row]);
        $row++ ;
    }
    // draw the borders
    // we start adding a horizontal line on the last page
    $this->page = $maxpage;
    $this->Line($l,$h,$fullwidth+$l,$h);
    // now we start at the top of the document and walk down
    for($i = $startpage; $i <= $maxpage; $i++) {
        $this->page = $i;
        $l = $this->lMargin;
        $t = ($i == $startpage) ? $startheight : $this->tMargin;
        $lh = ($i == $maxpage) ? $h : $this->h-$this->bMargin;
        $this->Line($l,$t,$l,$lh);
        foreach($this->tablewidths as $width) {
            $l += $width;
            $this->Line($l,$t,$l,$lh);
        }
    }
    // set it to the last page, if not it'll cause some problems
    $this->page = $maxpage;
}

function connect($host='localhost',$username='',$password='',$db=''){
    $this->conn = mysql_connect($host,$username,$password) or die( mysql_error() );
    mysql_select_db($db,$this->conn) or die( mysql_error() );
    return true;
}

function query($query){
    $this->results = mysql_query($query,$this->conn);
    $this->numFields = mysql_num_fields($this->results);
}

function mysql_report($query,$dump=false,$attr=array()){
    global $sContrato;
    foreach($attr as $key=>$val){
        $this->$key = $val ;
    }

    $this->query($query);

    // if column widths not set
    if(!isset($this->tablewidths)){

        // starting col width
        $this->sColWidth = (($this->w-$this->lMargin-$this->rMargin))/$this->numFields;

        // loop through results header and set initial col widths/ titles/ alignment
        // if a col title is less than the starting col width / reduce that column size
        for($i=0;$i<$this->numFields;$i++){
            $stringWidth = $this->getstringwidth(mysql_field_name($this->results,$i)) + 6 ;
            if( ($stringWidth) < $this->sColWidth){
                $colFits[$i] = $stringWidth ;
                // set any column titles less than the start width to the column title width
            }
            $this->colTitles[$i] = mysql_field_name($this->results,$i) ;
            //echo "<br>  ".mysql_field_name($this->results,$i) ."  ". mysql_field_type($this->results,$i);
            switch (mysql_field_type($this->results,$i)){
                case 'int':
                case 'real':
                case 'unknown':
                    $this->colAlign[$i] = 'R';
                    break;
                default:
                    $this->colAlign[$i] = 'L';
            }


        }

        // loop through the data, any column whose contents is bigger that the col size is
        // resized
        while($row=mysql_fetch_row($this->results)){
            foreach($colFits as $key=>$val){
               #alterado por adal
                if (strpos($row[$key],'%')!==false or strpos($row[$key],'$')!==false){
                  $this->colAlign[$key] = 'R';
                }
                $stringWidth = $this->getstringwidth($row[$key]) + 6 ;
                if( ($stringWidth) > $this->sColWidth ){
                    // any col where row is bigger than the start width is now discarded
                    unset($colFits[$key]);
                }else{
                    // if text is not bigger than the current column width setting enlarge the column
                    if( ($stringWidth) > $val ){
                        $colFits[$key] = ($stringWidth) ;
                    }
                }
            }
        }

        foreach($colFits as $key=>$val){
            // set fitted columns to smallest size
            $this->tablewidths[$key] = $val;
            // to work out how much (if any) space has been freed up
            $totAlreadyFitted += $val;
        }

        $surplus = (sizeof($colFits)*$this->sColWidth) - ($totAlreadyFitted);
        for($i=0;$i<$this->numFields;$i++){
            if(!in_array($i,array_keys($colFits))){
                $this->tablewidths[$i] = $this->sColWidth + ($surplus/(($this->numFields)-sizeof($colFits)));
            }
        }

        ksort($this->tablewidths);

        if($dump){
            Header('Content-type: text/plain');
            for($i=0;$i<$this->numFields;$i++){
                if(strlen(mysql_field_name($this->results,$i))>$flength){
                    $flength = strlen(mysql_field_name($this->results,$i));
                }
            }
            switch($this->k){
                case 72/25.4:
                    $unit = 'millimeters';
                    break;
                case 72/2.54:
                    $unit = 'centimeters';
                    break;
                case 72:
                    $unit = 'inches';
                    break;
                default:
                    $unit = 'points';
            }
            print "All measurements in $unit\n\n";
            for($i=0;$i<$this->numFields;$i++){
                printf("%-{$flength}s : %-10s : %10f\n",
                    mysql_field_name($this->results,$i),
                    mysql_field_type($this->results,$i),
                    $this->tablewidths[$i] );
            }
            print "\n\n";
            print "\$pdf->tablewidths=\n\tarray(\n\t\t";
            for($i=0;$i<$this->numFields;$i++){
                ($i<($this->numFields-1)) ?
                print $this->tablewidths[$i].", /* ".mysql_field_name($this->results,$i)." */\n\t\t":
                print $this->tablewidths[$i]." /* ".mysql_field_name($this->results,$i)." */\n\t\t";
            }
            print "\n\t);\n";
            exit;
        }

    } else { // end of if tablewidths not defined

        for($i=0;$i<$this->numFields;$i++){
            $this->colTitles[$i] = mysql_field_name($this->results,$i) ;
            switch (mysql_field_type($this->results,$i)){
                case 'int':
                case 'real':
                    $this->colAlign[$i] = 'R';
                    break;
                default:
                    $this->colAlign[$i] = 'L';
            }
        }
    }

    mysql_data_seek($this->results,0);
    $this->Open();
    $this->setY($this->tMargin);
    $this->AddPage();
    $this->morepagestable($this->FontSizePt);
    $this->Output("status_partidas_de_$sContrato.pdf");
    location("status_partidas_de_$sContrato.pdf");
}

}

$pdf = new rPDF('L','pt','LETTER');
$pdf->SetFont('Arial','',8);
$pdf->AliasNbPages();
$pdf->connect('localhost','root','danae','intelcode');
$attr=array('titleFontSize'=>18,'titleText'=>'Status de Actividades');
$sql="SELECT
   CASE a.sMedida
      WHEN '' THEN CONCAT(repeat(' ',iNivel),a.sWbs)
      ELSE CONCAT(repeat(' ',iNivel),a.sNumeroActividad)
   END
      AS Partida,
   CONCAT(SUBSTR(a.mDescripcion,1,50),'...') AS Descripcion,
   a.sMedida AS Medida,
   CASE a.sMedida
      WHEN '' THEN NULL
      ELSE a.dCantidadAnexo
   END
      AS Cantidad,
   a.dPonderado AS Ponderado,
   TRIM(CONCAT('$  ',a.dVentaMN)) AS Precio_Unitario,
   CASE a.sMedida
      WHEN '' THEN NULL
      ELSE a.dInstalado
   END
      AS Instalado,
   CASE a.sMedida
      WHEN '' THEN NULL
      ELSE a.dExcedente
   END
      AS Excedente,
   (SELECT b.dCantidadAnexo-b.dInstalado FROM actividadesxanexo b WHERE a.sContrato=b.sContrato AND a.sIdConvenio=b.sIdConvenio AND a.sWbs=b.sWbs AND a.sNumeroActividad=b.sNumeroActividad AND b.sMedida<>'')  AS Pendiente,
   CONCAT( ROUND( (((SELECT c.dInstalado FROM actividadesxanexo c WHERE a.sContrato=c.sContrato AND a.sIdConvenio=c.sIdConvenio AND a.sWbs=c.sWbs AND a.sNumeroActividad=c.sNumeroActividad AND c.sMedida<>'') * 100)/a.dCantidadAnexo),4),' %') AS Avance
FROM actividadesxanexo a
WHERE a.sContrato='$sContrato'
AND a.sIdConvenio='$sIdConvenio' ORDER BY a.sWbs;";
$pdf->mysql_report("$sql",false,$attr);
//CONCAT('$',FORMAT(CAST(a.dVentaMN  AS UNSIGNED),4)) as PU,
?>
