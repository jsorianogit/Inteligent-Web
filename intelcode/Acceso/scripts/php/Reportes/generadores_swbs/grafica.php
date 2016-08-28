<?php
//incrementar la memora permitida para ejecutar el script
ini_set("memory_limit","2000M");
require("../../../../../JsGraph/jpgraph.php");
require("../../../../../JsGraph/jpgraph_line.php");
/*
require("../../../../../../fnUtilerias.php");
$link=mysql_connect("127.0.0.1","root","danae");
mysql_select_db("intelcode");
$sContrato='428236875';
$sIdConvenio='A-02';
$fecha = "2007-11-26";
*/
#seleccionar los meses de cada año
$sql="SELECT
        YEAR(dIdFecha) as Anio,
        MONTH(dIdFecha) as Mes
      FROM
        avancesglobales
      WHERE
        sContrato = '$sContrato'
        and sNumeroOrden = ''
        and sIdConvenio = '$sIdConvenio'
      GROUP BY sContrato,YEAR(dIdFecha),MONTH(dIdFecha);";
$rs = mysql_query($sql);
unset($avReal);
unset($avProg);
$avAcumReal = 0;
$avAcumProg = 0;
while($row = mysql_fetch_array($rs)){
   #Mes
  if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
         list($ano,$mes,$dia)=split("-", $fecha);
  if(strlen($row['Mes'])==1)
      $row['Mes']="0".$row['Mes'];

  $Anio = $row['Anio'];
  $Mes = $row['Mes'];
  $finDeMes = ultimodia($Anio,$Mes);

  $datax[]=nombre_mes_espanol($Anio."-".$Mes."-01")."/".$Anio;

  if($Anio == $ano and $Mes==$mes){
      $datax[]=nombre_mes_espanol($Anio."-".$Mes."-01")."/".$Anio;
      #avances Reales al dia
      $sqlAvReal = " select
                    sum(dAvance) as dAvance
                  from
                    avancesglobalesxorden
                  where
                       sContrato = '$sContrato'
                       and sNumeroOrden = ''
                       and dIdFecha <= '$fecha'
                       and sIdConvenio = '$sIdConvenio'
                     group by sContrato;";
      $rsAvReal = mysql_query($sqlAvReal);
      if($rowAvReal = mysql_fetch_array($rsAvReal)){
        $avReal[]=$rowAvReal['dAvance'];
      }
      #avances programados al dia
      $sqlAvProg="Select
                 sum(dAvancePonderadoDia) as dAvance
               from
                 avancesglobales
               where
                 sContrato = '$sContrato'
                 and sNumeroOrden = ''
                 and sIdConvenio ='$sIdConvenio'
                 and dIdFecha <= '$fecha'
               group by sContrato";
      $rsAvProg = mysql_query($sqlAvProg);
      if($rowAvProg = mysql_fetch_array($rsAvProg)){
        $avProg[]=$rowAvProg['dAvance'];
      }

  }
  #avances reales
  $sqlAvReal = " select
                    sum(dAvance) as dAvance
                  from
                    avancesglobalesxorden
                  where
                       sContrato = '$sContrato'
                       and sNumeroOrden = ''
                       and dIdFecha <= '".$Anio."-".$Mes."-".$finDeMes."'
                       and sIdConvenio = '$sIdConvenio'
                     group by sContrato;";
   $rsAvReal = mysql_query($sqlAvReal);
   if($rowAvReal = mysql_fetch_array($rsAvReal)){
      $avReal[]=$rowAvReal['dAvance'];
   }
   #avances programados
   $sqlAvProg="Select
                 sum(dAvancePonderadoDia) as dAvance
               from
                 avancesglobales
               where
                 sContrato = '$sContrato'
                 and sNumeroOrden = ''
                 and sIdConvenio ='$sIdConvenio'
                 and dIdFecha <= '".$Anio."-".$Mes."-".$finDeMes."'
               group by sContrato";
   $rsAvProg = mysql_query($sqlAvProg);
   if($rowAvProg = mysql_fetch_array($rsAvProg)){
      $avProg[]=$rowAvProg['dAvance'];
   }
}

$datax = $datax;
$ydata1 =$avReal;
$ydata2 =$avProg;
/*
echo "<br>xdata: ".count($datax);
echo "<br>ydata1: ".count($ydata1);
echo "<br>ydata2: ".count($ydata2);

foreach($datax as $index => $value)
	echo "<br>:$index = $value";
*/
$Ancho=800;
$Alto=800;
if(file_exists("Grafica.png")){
       unlink("Grafica.png");
}

// Create the graph. These two calls are always required
$graph = new Graph($Ancho,$Alto);
$graph->SetScale("textlin");
#$graph->img->SetMargin(40,30,20,40);
$graph->img->SetMargin(65,70,70,180);
$graph->xaxis->SetPos('min');
// Create the linear plot
$lineplot1=new LinePlot($ydata1);
$lineplot2=new LinePlot($ydata2);
// Add the plot to the graph
$graph->Add($lineplot1);
$graph->Add($lineplot2);
// Create and add a new text
$graph->xaxis->SetTickLabels($datax);
$graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,7);
$graph->xaxis->SetLabelAngle(30);
$graph->yaxis->SetFont(FF_ARIAL,FS_NORMAL,7);
#$graph->img->SetMargin(40,20,20,120);
$graph->xaxis->title->SetPos('max');
$graph->xaxis->title->SetFont(FF_ARIAL,FS_NORMAL,7);

//titulo
$graph->title->SetFont(FF_ARIAL,FS_NORMAL);
$graph->title->Set("PROGRAMA DE EROGACIONES ORIGINAL CONTRATADO");
//Set background
$graph->SetBackgroundImage("fondo2.jpg",1);

$graph->yaxis->title->SetFont(FF_ARIAL,FS_NORMAL,7);
$graph->xaxis->title->SetFont(FF_ARIAL,FS_NORMAL,7);

//Crear las lineas
$porcentaje ='%%';
$TamPorcent =12;
$ColorPorcent ="black";//"darkred"
$lineplot1->SetColor("red");
$lineplot1->SetWeight(1);
$lineplot1->value->SetColor($ColorPorcent);
$lineplot1->value->SetFont(FF_ARIAL, FS_NORMAL,$TamPorcent);
$lineplot1->value->SetFormat( "%0.4f $porcentaje");
$lineplot1->value->Show();

$lineplot2->SetColor("blue");
$lineplot2->SetWeight(1);
$lineplot2->value->SetColor($ColorPorcent);
$lineplot2->value->SetFont( FF_ARIAL, FS_NORMAL,$TamPorcent);
$lineplot2->value->SetFormat( " %0.4f $porcentaje");
$lineplot2->value->Show();

$graph->yaxis->SetColor("green");
$graph->yaxis->SetWeight(2);

// Set the legends for the plots
$lineplot1->SetLegend("Avance Fisico");
$lineplot2->SetLegend("Avance Programado");
//$lineplot3->SetLegend("Avance de Obra");

// Adjust the legend position
//$graph->legend->SetLayout(LEGEND_HOR);
$graph->legend->Pos(0.4,0.94,"right","center");
$graph->SetShadow();

// Display the graph or Save the graph
$graph->Stroke("Grafica.png");
#$graph->Stroke();
?>
