<?php
if(file_exists("Grafica.png"))
	unlink("Grafica.png");
include ("../../../../JsGraph/jpgraph.php");
include ("../../../../JsGraph/jpgraph_line.php");
include ("../../../../JsGraph/jpgraph_bar.php");
include ("../../../../JsGraph/jpgraph_gantt.php");
include ("../../../../JsGraph/jpgraph_flags.php");

// Create the graph. These two calls are always required
/*echo $Ancho;
echo "<br>$Alto";
echo "<br>";*/
$graph = new Graph($Ancho,$Alto);    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->xaxis->SetPos('min');
// Create the linear plot
$lineplot1=new LinePlot($ydata1);
$lineplot2=new LinePlot($ydata2);
$lineplot3=new LinePlot($ydata3);
$lineplot4=new LinePlot($ydata4);

// Add the plot to the graph
$graph->Add($lineplot1);
$graph->Add($lineplot2);
$graph->Add($lineplot3);
$graph->Add($lineplot4);


// Create and add a new text
//if(isset($dMonto))
//	$graph->footer->left->Set ("Monto: $ ".number_format($dMonto,2));
//$graph->footer->center->Set("$sNombre");
//if(isset($dFechaIni) and isset($dFechaFin))
//	$graph->footer->right->Set("$dFechaIni/$dFechaFin" );
//Configurar las eqituetas X
$graph->xaxis->SetTickLabels($datax);
$graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,7);
$graph->xaxis->SetLabelAngle(30);
$graph->yaxis->SetFont(FF_ARIAL,FS_NORMAL,7);
$graph->img->SetMargin(40,20,20,120);
$graph->xaxis->title->SetPos('max');
$graph->xaxis->title->SetFont(FF_ARIAL,FS_NORMAL,2);

//titulo
$graph->title->SetFont(FF_ARIAL,FS_NORMAL);
$graph->title->Set("PROGRAMA DE EROGACIONES ORIGIANAL CONTRATADO");
//if(isset($mDescipcion) or isset($sNombre))
//	$graph->subtitle->Set("$mDescipcion.\n$sNombre\n");

//Set background
$graph->SetBackgroundImage("fondo2.jpg",1);

$graph->yaxis->title->SetFont(FF_ARIAL,FS_NORMAL,7);
$graph->xaxis->title->SetFont(FF_ARIAL,FS_NORMAL,7);

//Crear las lineas
$lineplot1->SetColor("red");
$lineplot1->SetWeight(2);
$lineplot1->value->SetColor("darkred");
$lineplot1->value->SetFont(FF_ARIAL, FS_NORMAL,7);
$lineplot1->value->SetFormat( " %0.3f");
$lineplot1->value->Show();

$lineplot2->SetColor("green");
$lineplot2->SetWeight(2);
$lineplot2->value->SetColor("darkred");
$lineplot2->value->SetFont( FF_ARIAL, FS_NORMAL,7);
$lineplot2->value->SetFormat( " %0.3f");
$lineplot2->value->Show();

$lineplot3->SetColor("yellow");
$lineplot3->SetWeight(2);
$lineplot3->value->SetColor("darkred");
$lineplot3->value->SetFont( FF_ARIAL, FS_NORMAL,7);
$lineplot3->value->SetFormat( " %0.3f");
$lineplot3->value->Show();

$lineplot4->SetColor("blue");
$lineplot4->SetWeight(2);
$lineplot4->value->SetColor("darkred");
$lineplot4->value->SetFont( FF_ARIAL, FS_NORMAL,7);
$lineplot4->value->SetFormat( " %0.3f");
$lineplot4->value->Show();

$graph->yaxis->SetColor("red");
$graph->yaxis->SetWeight(2);

// Set the legends for the plots
$lineplot1->SetLegend("Avance Programado");
$lineplot2->SetLegend("Avance Financiero");
$lineplot3->SetLegend("Avance de Obra");
$lineplot4->SetLegend("Retenciones");

// Adjust the legend position
//$graph->legend->SetLayout(LEGEND_HOR);
//$graph->legend->Pos(0.05,0.5,"right","center");
$graph->legend->Pos(0.4,0.90,"right","center");
$graph->SetShadow();

// Display the graph or Save the graph 
$graph->Stroke("Grafica.png");
?>