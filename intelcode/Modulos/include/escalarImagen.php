<?php

// Función para cambiar el tamaño de una imágen JPG 
//   (imagen1) y genera una nueva (imagen2)
ini_set("memory_limit","32M"); 
function thumbjpegXY($imagen1,$anchura, $altura, $imagen2)
{
	$img = imagecreatefromjpeg($imagen1) or die("No se encuentra la imagen $camino$nombre<br>\n");
	 // miramos el tamaño de la imagen original...
	$datos = getimagesize($imagen1) or die("Problemas al leer $imagen1<br>\n");
	// intentamos escalar la imagen original utilizando la ALTURA como base
	$ratio = ($datos[1] / $altura);
	$anchuraX = round($datos[0] / $ratio);
	$alturaX=$altura;
	$xpos=($anchura-$anchuraX)/2;
	$ypos=0;
	// Si quedó muy ancha entonces calculamos con el ANCHO
	if($anchuraX >$anchura)
	{
		$ratio = ($datos[0] / $anchura);
		$alturaX = round($datos[1] / $ratio);
		$anchuraX=$anchura;
		$xpos=0;
		$ypos=($altura-$alturaX)/2;
	}
	// esta será la nueva imagen reescalada
	$thumb = imagecreatetruecolor($anchura,$altura);
	//Color de relleno
	$rellenoclr = imagecolorallocate($thumb, 255, 255,255); //<-- rgb:0,0,0 = negro 
	imagefill($thumb, 0, 0, $rellenoclr);
	// con esta función la reescalamos
	imagecopyresized($thumb, $img, $xpos, $ypos, 0, 0, $anchuraX, $alturaX, $datos[0], $datos[1]);
	// La salvamos con el nombre y en el lugar que nos interesa.
	imagejpeg($thumb,$imagen2);
}
// escalamos la imagen para que mida 100 por 200 pixeles
//thumbjpegXY("428237820.jpg",100, 120, "428237820_.jpg");
// mostramos la foto
//echo "<img src='428237820_.jpg'>";
?>