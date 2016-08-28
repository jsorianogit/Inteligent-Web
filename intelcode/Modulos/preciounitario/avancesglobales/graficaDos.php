<?php
if(file_exists("Grafica.png"))
	unlink("Grafica.png");
include ("../../../../JsGraph/jpgraph.php");
include ("../../../../JsGraph/jpgraph_line.php");
include ("../../../../JsGraph/jpgraph_bar.php");
include ("../../../../JsGraph/jpgraph_gantt.php");
include ("../../../../JsGraph/jpgraph_flags.php");
//Etiquetas X
$datax= $Fechas;

//contenido
$ydata=$arregloavanceprogramado;
$ydata2 = $arregloavancefisico;
$ydata3 = $arregloavancefinanciero;

// Create the graph. These two calls are always required
$graph = new Graph($Ancho,$Alto,"auto");    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->xaxis->SetPos('min');
// Create the linear plot
$lineplot=new LinePlot($ydata);
$lineplot2=new LinePlot($ydata2);
$lineplot3=new LinePlot($ydata3);

// Add the plot to the graph
$graph->Add($lineplot);
$graph->Add($lineplot2);
$graph->Add($lineplot3);

//logo
//$icon = new IconPlot('$bImagen',0.5,0.5); 
//$icon->SetCountryFlag('spain',0.1,0.1); 
//$icon->SetScale(0.8); 
//$icon->SetAnchor('center','center'); 
//$graph->Add($icon);

// Create and add a new text
if(isset($dMonto))
	$graph->footer->left->Set ("Monto: $ ".number_format($dMonto,2));
//$graph->footer->center->Set("$sNombre");
if(isset($dFechaIni) and isset($dFechaFin))
	$graph->footer->right->Set("$dFechaIni/$dFechaFin" );
//
$graph->xaxis->SetTickLabels($datax);
$graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,7);
$graph->xaxis->SetLabelAngle(30);
$graph->yaxis->SetFont(FF_ARIAL,FS_NORMAL,7);
$graph->img->SetMargin(40,20,20,120);
$graph->xaxis->title->SetPos('max');
$graph->xaxis->title->SetFont(FF_ARIAL,FS_NORMAL,2);
//$graph->xaxis->title->Set("$mDescipcion - $sNombre");
//$graph->yaxis->title->Set("Titulo Y");

//titulo
$graph->title->SetFont(FF_ARIAL,FS_NORMAL);
$graph->title->Set("Grafica Comparativa de Avances Programado/Fisico/Financiero");
if(isset($mDescipcion) or isset($sNombre))
	$graph->subtitle->Set("$mDescipcion.\n$sNombre\n");
//Set background
$graph->SetBackgroundImage("fondo2.jpg",1);

$graph->yaxis->title->SetFont(FF_ARIAL,FS_NORMAL,7);
$graph->xaxis->title->SetFont(FF_ARIAL,FS_NORMAL,7);

$lineplot->SetColor("red");
$lineplot->SetWeight(2);
$lineplot->value ->SetColor("darkred");
$lineplot->value->SetFont(FF_ARIAL, FS_NORMAL,7);
$lineplot->value->SetFormat( " %0.3f");
$lineplot->value-> Show();

$lineplot2->SetColor("green");
$lineplot2->SetWeight(2);
$lineplot2->value ->SetColor("darkred");
$lineplot2->value->SetFont( FF_ARIAL, FS_NORMAL,7);
$lineplot2->value->SetFormat( " %0.3f");
$lineplot2->value-> Show();

$lineplot3->SetColor("yellow");
$lineplot3->SetWeight(2);
$lineplot3->value ->SetColor("darkred");
$lineplot3->value->SetFont( FF_ARIAL, FS_NORMAL,7);
$lineplot3->value->SetFormat( " %0.1f");
$lineplot3->value-> Show();

$graph->yaxis->SetColor("red");
$graph->yaxis->SetWeight(2);

// Set the legends for the plots
$lineplot->SetLegend("Avance Programado");
$lineplot2->SetLegend("Avance Fisico");
$lineplot3->SetLegend("Avance Financiero");

// Adjust the legend position
//$graph->legend->SetLayout(LEGEND_HOR);
//$graph->legend->Pos(0.05,0.5,"right","center");
$graph->legend->Pos(0.4,0.90,"right","center");
$graph->SetShadow();

// Display the graph
$graph->Stroke("Grafica.png");
?>