<?php
//incrementar la memora permitida para ejecutar el script
ini_set("memory_limit","120M");
require("../../../JsGraph/jpgraph.php");
require("../../../JsGraph/jpgraph_line.php");
require("../../../JsGraph/jpgraph_bar.php");
require("../../../JsGraph/jpgraph_pie.php");
require("../../../JsGraph/jpgraph_pie3d.php");
if(file_exists("Grafica.png")){                  
       unlink("Grafica.png");                  
}
#$Ancho;
#$Alto;
// Create the graph. These two calls are always required
$graph = new Graph(1024,768,"auto");    
$graph->SetScale("textlin");
$graph->img->SetMargin(40,30,20,40);
$graph->xaxis->SetPos('min');
// Create the linear plot
$band = "";

//if(count($filaOrdenes)>0)
foreach($filasOrdenes as $index => $ydata){
   foreach($ydata as $index2 => $ydata2){
      if($ydata2=="")$ydata2=0;
      if($index =='Total')
         $data[]=$ydata2;
   }
   if($band != $index and $index =='Total'){
      $band = $index;
     # $lineplot[$index]=new LinePlot($data); 
      $lineplot[$index]=new BarPlot($data); 
      $graph->Add($lineplot[$index]);
   }
}

//if(count($filaOrdenes)>0)
foreach($filasOrdenes as $index => $ydata){
   foreach($ydata as $index2 => $ydata2)
      if($index == 'Total')
         $datax[]=nombre_mes($index2)." ".anio($index2);  
}
/*for($index=0;$index<10;$index++){
   $datax[]=$index; 
}*/
//Configurar las eqituetas X
$graph->xaxis->SetTickLabels($datax);
$graph->xaxis->SetFont(FF_ARIAL,FS_NORMAL,7);
$graph->xaxis->SetLabelAngle(30);
$graph->yaxis->SetFont(FF_ARIAL,FS_NORMAL,7);
$graph->img->SetMargin(50,30,50,120);
$graph->xaxis->title->SetPos('max');
$graph->xaxis->title->SetFont(FF_ARIAL,FS_NORMAL,2);

//titulo
$graph->title->SetFont(FF_ARIAL,FS_BOLD);
$graph->title->Set("Cantidad Mensual");

//Set background
$graph->SetBackgroundImage("pldintelcode.png",1);

$graph->yaxis->title->SetFont(FF_ARIAL,FS_NORMAL,7);
$graph->xaxis->title->SetFont(FF_ARIAL,FS_NORMAL,7);
#Opcion para la barra
#$graph->Set90AndMargin(50,40,0,20);
//Crear las lineas
$porcentaje ='%%';
$TamPorcent =9;
$ColorPorcent ="white";//"darkred";
$NumColor = 0;
//if(count($filaOrdenes)>0)
foreach($lineplot as $index => $value){
   $NumColor +=10 ;
   $color = array(0+($NumColor*20),0+($NumColor*3),0+($NumColor*4));
   //$lineplot[$index]->SetColor($color);
   ####Solo para la barra
   $lineplot[$index]->SetFillColor("lightgreen"); 
   $lineplot[$index]->value->SetColor("black","navy"); 
   $lineplot[$index]->SetFillGradient("blue","yellow",GRAD_MIDVER); 
   ####Fin Solo para la barra
   $lineplot[$index]->SetWeight(1);
   $lineplot[$index]->value->SetColor($ColorPorcent);
  // $lineplot[$index]->value->SetFont(FF_ARIAL, FS_NORMAL,$TamPorcent);
   $lineplot[$index]->value->SetFormat( "$ % 0.2f "); //$porcentaje
   $lineplot[$index]->value->Show();
   $lineplot[$index]->value->SetFont(FF_ARIAL,FS_BOLD,$TamPorcent);
   $lineplot[$index]->value->SetColor("white"); 
   // Set the legends for the plots
   #$lineplot[$index]->SetLegend($index);
   $lineplot[$index]->value->SetAngle(45);
}
$graph->yaxis->SetColor("black");
$graph->yaxis->SetWeight(2);

// Adjust the legend position
$graph->legend->Pos(0.4,0.90,"right","center");
$graph->SetShadow();

// Display the graph or Save the graph 
//if(count($filaOrdenes)>0)
	$graph->Stroke("Grafica.png");
#$graph->Stroke();
?>
