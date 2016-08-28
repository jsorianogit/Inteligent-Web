<?php
	function Acortar($variable)
	{
	$longitud=80;
	$cont=0;
	$variablen="";
	if(strlen($variable)>$longitud){
	 	for($i=0;$i<strlen($variable);$i++)
	 	{
	 	 	if($j==$longitud){
				$agregar=$variable[$i]."\n";
				$j=0;
			}
			else{
				$agregar=$variable[$i];
			}
			$variablen.=$agregar;
			$j++;
		}
	return $variable=$variablen;	
	}
	
	}
 $consulta="SELECT ct.mDescripcion,cf.sNombre,cf.bImagen FROM contratos ct INNER JOIN configuracion cf ON (ct.sContrato=cf.sContrato) WHERE cf.sContrato='$sContrato'";
	$result=mysql_query($consulta,$link);
	if ($row = mysql_fetch_array($result)) {
	 	$mDescipcion=$row['mDescripcion'];
	 	//,ct.dMontoMN,,ct.dFechaInicio,ct.dFechaFinal
	 //	$dMontoMN=$row['dMontoMn'];
	 //	$dFechainicio=$row['dFechaInicio'];
	 //	$dFechaFinal=$row['dFechaFinal'];
	 	$sNombre=$row['sNombre'];
		 //Guardar Imagen
		$FileImg=fopen("logo.jpg",w);
		fwrite($FileImg, $row['bImagen'], 10000); 
		fclose($FileImg); 
		//imagen('logo.jpg');
		$bImagen='logo.jpg';
		//echo "<img src=$bImagen>";
	}
	 $mDescipcion = Acortar($mDescipcion);
	 $sNombre = Acortar($sNombre);
?>