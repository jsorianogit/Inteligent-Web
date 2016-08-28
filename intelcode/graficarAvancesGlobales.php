<?php
session_start();
if(file_exists("GraficaGlobales.png"))
	unlink("GraficaGlobales.png");
include ("JsGraph/jpgraph.php");
include ("JsGraph/jpgraph_line.php");
include ("JsGraph/jpgraph_bar.php");
include ("JsGraph/jpgraph_gantt.php");
include ("JsGraph/jpgraph_flags.php");

//Etiquetas X
$datax= $_SESSION["Fechas"];

//contenido
$ydata  = $_SESSION["arregloavanceprogramado"]  ;  //$arregloavanceprogramado;
$ydata2 = $_SESSION["arregloavancefisico"]      ;  //$arregloavancefisico;
$ydata3 = $_SESSION["arregloavancefinanciero"]  ;  //$arregloavancefinanciero;

if(empty($datax)) exit();

// Create the graph. These two calls are always required
$graph = new Graph($_SESSION["config_graph"]["Ancho"],$_SESSION["config_graph"]["Alto"],"auto");
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


// Create and add a new text
if(isset($_SESSION["config_graph"]["dMonto"]))
	$graph->footer->left->Set ("Monto: $ ".number_format($_SESSION["config_graph"]["dMonto"],2));

if(isset($_SESSION["config_graph"]["dFechaIni"]) and isset($_SESSION["config_graph"]["dFechaFin"] ))
	$graph->footer->right->Set($_SESSION['config_graph']['dFechaIni']." / ".$_SESSION['config_graph']['dFechaFin'] );

$graph->xaxis->SetTickLabels($datax);
$graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,7);
$graph->xaxis->SetLabelAngle(30);
$graph->yaxis->SetFont(FF_ARIAL,FS_NORMAL,7);
$graph->img->SetMargin(40,20,20,120);
$graph->xaxis->title->SetPos('max');
$graph->xaxis->title->SetFont(FF_ARIAL,FS_NORMAL,2);


//titulo
$graph->title->SetFont(FF_ARIAL,FS_NORMAL);
$graph->title->Set("Grafica Comparativa de Avances Programado/Fisico/Financiero");
if(isset($_SESSION["config_graph"]["mDescripcion"]) or isset($_SESSION["config_graph"]["sNombre"]))
	$graph->subtitle->Set($_SESSION["config_graph"]["mDescripcion"].".\n".$_SESSION["config_graph"]["sNombre"]."\n");
//Set background
#$graph->SetBackgroundImage("fondo2.jpg",1);

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
$graph->Stroke("GraficaGlobales.png");
header("Location:GraficaGlobales.png");
?>