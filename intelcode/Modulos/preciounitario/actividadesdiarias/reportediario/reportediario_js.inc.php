<?php
require("../../../include/reporteador.inc.php");
class reportediario extends reporte {
	var $nombrecampo;
	//imprimir nombre de los campos
	function nombres(){
		foreach($this->nombrecampo as $nombre){
			print("<th>$nombre</th>");
		}
	}
	
    //cifrar el url
    function cifrar($array, $result)
    {
    	   $prefijo="Sql=";
    	   $cadCifrar="";
           foreach ($array as $indice => $valor){
              foreach ($this->campollave as  $campo){
                  if ($campo==$indice and !is_numeric($indice)){
                      $cadCifrar .= "_$indice|*$valor*_AND";
                  }
              }
            }

        $cadCifrar .= "<";
        $cadCifrar = str_replace("AND<", "", $cadCifrar);
        //cifrar el contenido
        $cadCifrar = encrypt($cadCifrar, 0);
        return $prefijo.$cadCifrar;
    }	
	
 //muestra los registros de la tabla
    function visualizar($pag="",$orderby="",$nombrecampo="")
    {
    	global $sContrato,$sIdConvenioAct,$rptDiario;
    	$this->nombrecampo = $nombrecampo ;
     	for($i=0;$i<1;$i++){
     	//////
     	  //filas obtenidas
         $total = $this->contarfilas($this->sql);
         //tamaño del paginador
         if($total<200):
	           $tampag=20;
         elseif ($total<400):
               $tampag=20;
         else:
            	$tampag=20;
         endif;
         $iniciaren=($pag-1) * $tampag;	//Registro actual
         if($iniciaren<0)$iniciaren=0;
         
         $this->paginar($pag, $total, $tampag, "?pag="); 
         
         if ($orderby !=""){
            $consulta = $this->sql." ORDER BY $orderby LIMIT $iniciaren,$tampag";
         }
         else {
            $consulta = $this->sql." LIMIT $iniciaren,$tampag";  
         }

     	//////
        //$consulta = $this->sql. " LIMIT 10";
        $result = $this->query($consulta);
        //obtener descripcion de la tabla
        $tablades = $this->comentarioTabla($this->nombreTabla($result, 0));
        //si no tiene, poner como descripcion el nombre de la misma
        if ($tablades == "") $tablades = $this->nombreTabla($result, 0);
        
        echo '"
			<script src="../../../../ActiveWidgets/runtime/lib/aw.js"></script>
			<link href="../../../../ActiveWidgets/runtime/styles/xp/aw.css" rel="stylesheet"></link>"';
		echo "<style>\n
				.aw-grid-control {height: 350; width: 980  ; margin: 0px; border: none; font: menu;}\n
				.aw-row-selector {text-align: center;color: #2A8000;}\n ";
		$ancho = 25;
		for($i=0 ; $i<2;$i++)
			echo ".aw-column-$i {width: $ancho px;text-align: right;}\n";
		for($i=2 ; $i<9;$i++)
			echo ".aw-column-$i {width: 75px;text-align: right;}\n";
		for($i=10 ; $i<21;$i++)
			echo ".aw-column-$i {width: $ancho px;text-align: right;}\n";
		echo "</style>\n";

		
		echo "<script>";
		echo "\n var myHeaders = ['Editar','Eliminar',";
		if(	$this->nombrecampo==""){
	        for ($i = 0; $i < mysql_num_fields($result); $i++)
	        {
	            $campo=$this->nombreCampo($result, $i);
	            //los campos imagen no mostrarlos
	            if (!$this->mostrarCampo($campo))
	                continue;
	             //obtener descripcion del campo   
			           $des = str_replace("/*", "", $this->comentario($this->nombreCampo($result, $i),
			                $this->nombreTabla($result, $i)));
			            //si no tiene, poner como descripcion el nombre del mismo
	    	        if ($des == "" ) $des = $campo;
	            echo "\n 'des',";
	        }
	    }
	    else{
			foreach($this->nombrecampo as $title){
				echo "\n '$title',";
			}
		}
		echo "'1','2','3','4','5','6','7','8','9','10',]";
		
		echo "\nvar myCells = [";

        while ($row = mysql_fetch_array($result))
        {
            $filtro = $this->cifrar($row, $result);
            echo "['<a title=\"Modificar Caratula de Reporte\" href=\"?sContrato=$sContrato&dIdFecha=".$row['dIdFecha']."&sNumeroOrden=".$row['sNumeroOrden']."&sIdTurno=".$row['sIdTurno']."\"><img src=\"".$this->PathImages."editar.png\" width=17></a>', \n";
            echo "'<a title=\"Eliminar Caratula de Reporte\" href=\"$_SERVER[PHP_SELF]?operacion=b&$filtro\"><img src=\"".$this->PathImages."eliminar.png\" width=17></a>', \n";

            for ($i = 0; $i < mysql_num_fields($result); $i++)
            {
               if(strpos($this->nombreCampo($result, $i), "Imagen") and  $tipo = $this->tipoCampo($result, $i)=="blob")							
			   {
			    	$nombreImagen="";
			    	foreach($this->campollave as $claves){
				    	$nombreImagen.=$row[$claves];	
					}
					$nombreImagen.=".jpg";
                 //$nombreImagen=$row[$this->campollave].".jpg";
                 $img = $this->procesarImagen($row[$i],$nombreImagen);
               }
                if (!$this->mostrarCampo($this->nombreCampo($result, $i)))
                    continue;
                if ($img){
                   echo ",<img src = \"$nombreImagen\" width =100 heigth = 100</img>',\n";  
                   $img = false;
                 }
                 else if($this->tipoCampo($result,$i)=="real" and (strpos($this->nombreCampo($result,$i),"Costo") or strpos($this->nombreCampo($result,$i),"Venta")))
                   echo "'$ ".number_format($row[$i],2,'.',',')."',";
                 else if($this->tipoCampo($result,$i)=="real" and strpos($this->nombreCampo($result,$i),"Avance"))
                   echo "'".number_format($row[$i],1,'.',',')." %',";
                 else
	               echo "'".$row[$i]."',";
            }
            #Saber si tiene permisos para validar
            $sql_ ="select lValida from usuarios where sIdUsuario='".$_SESSION['sIdUsuario']."'";
            $result_ = mysql_query($sql_);
            if($row_=mysql_fetch_array($result_))
            	$valida = $row_['lValida'];
            	
            echo "'<a title=\"(1) Jornadas y Tiempos\" href=\"jornadas/mostrar.php?sContrato=$sContrato&fecha=".$row['dIdFecha']."&orden=".$row['sNumeroOrden']."&convenio=".$row['sIdConvenio']."&turno=".$row['sIdTurno']."\"><img src=\"".$this->PathImages."jornadasDiarias.png\" width=17></a>', \n";

            echo "'<a title=\"(2) Firmantes del Dia\" href=\"../firmantes/mostrar.php?reportediario=si&fecha=".$row['dIdFecha']."&orden=".$row['sNumeroOrden']."\"><img src=\"".$this->PathImages."firmantes.png\" width=17></a>',\n ";
				            
         //   echo "\n<td class='CrearReporte' >\n<a title='(2) Firmantes del Dia' href='../firmantes/index.php?reportediario=si&fecha=".$row['dIdFecha']."&orden=".$row['sNumeroOrden']."'>\n<img src='".$this->PathImages."firmantes.png' width=17>\n</a></td> ";
            
            echo "'<a title=\"(3) Permisos\" href=\"../../permisosdeseguridad/index.php?sContrato=$sContrato&fecha=".$row['dIdFecha']."&orden=".$row['sNumeroOrden']."&convenio=".$row['sIdConvenio']."\"><img src=\"".$this->PathImages."permisos.png\" width=17></a>', \n";
            echo "'<a title=\"(4) Aviso de Embarque\" href=\"avisosdeembarques/?sContrato=$sContrato&dIdFecha=".$row['dIdFecha']."&orden=".$row['sNumeroOrden']."&convenio=".$row['sIdConvenio']."\"><img src=\"".$this->PathImages."embarques.png\" width=17></a>', \n";
            echo "'<a title=\"(5) Volumenes de Obra y Notas\" href=\"volumenes/volumenes.php?sContrato=$sContrato&dIdFecha=".$row['dIdFecha']."&sNumeroOrden=".$row['sNumeroOrden']."&convenio=".$row['sIdConvenio']."&sIdTurno=".$row['sIdTurno']."&lStatus=".$row['lStatus']."\"><img src=\"".$this->PathImages."volumenes.png\" width=17></a>',\n ";
         	echo "'<a title=\"(6) Alcances por Partida Anexo\" href=\"alcancesxpartida/alcances.php?sContrato=$sContrato&dIdFecha=".$row['dIdFecha']."&sNumeroOrden=".$row['sNumeroOrden']."&convenio=".$row['sIdConvenio']."&sIdTurno=".$row['sIdTurno']."&lStatus=".$row['lStatus']."\"><img src=\"".$this->PathImages."alcances.png\" width=17></a>',\n";
            echo "'<a title=\"(7) Personal y Equipo\" href=\"personalyequipo/?sContrato=$sContrato&dIdFecha=".$row['dIdFecha']."&sNumeroOrden=".$row['sNumeroOrden']."&convenio=".$row['sIdConvenio']."&sIdTurno=".$row['sIdTurno']."\"><img src=\"".$this->PathImages."personal.png\" width=17></a>',\n ";
            echo "'<a title=\"(8) Reporte Fotografico\" onClick=\"window.open(\'reportefotografico.php?numeroFolio=".$row['sNumeroReporte']."\',\'ReporteFotografico\',\'width=500,height=300,scrollbars=yes,resizable=yes,status=0,toolbar=0\');\" href=\"#\"><img src=\"".$this->PathImages."camara.png\" width=17></a>',\n ";
            if($valida=='Si')            
            	echo "'<a title=\"(9) Validar Reporte Diario\" href=\"ValidaReporteDiario/sqls.php?sContrato=".$sContrato."&sNumeroOrden=".$row['sNumeroOrden']."&dIdFecha=".$row['dIdFecha']."&sIdTurno=".$row['sIdTurno']."&sIdConvenio=".$sIdConvenioAct."&lStatus=".$row['lStatus']."\"><img src=\"".$this->PathImages."validar.jpg\" width=17></a>',\n";            
            else 
            	echo "'',";
            echo "'<a title=\"(10) Reporte Diario\" href=\"./../../../../Acceso/scripts/php/Reportes/$rptDiario/rptReporteDiario.php?sContrato=".$sContrato."&sNumeroOrden=".$row['sNumeroOrden']."&dFecha=".$row['dIdFecha']."&sIdTurno=".$row['sIdTurno']."&sIdConvenio=".$row['sIdConvenio']."&lStatus=".$row['lStatus']."\"	 target=_blank ><img src=\"".$this->PathImages."acroba2t.gif\" width=17></a>'],\n ";
            //$sIdConvenioAct mensaje($row['sIdConvenio']);            
           // echo "\n</tr>";// ../../../../Acceso/scripts/php/Reportes/generadores
        }
        echo "]";
        echo "
		   // create grid object
		   var grid = new AW.UI.Grid;
	    
		   //	enable row selectors
		   grid.setSelectorVisible(true);
		   grid.setSelectorText(function(i){return this.getRowPosition(i)+1});
		   //	set headers width/height
		   grid.setSelectorWidth(28);
		   grid.setHeaderHeight(20);
		   // assign cells and headers text
		   grid.setCellText(myCells);
		   grid.setHeaderText(myHeaders);
		   // Use setControlLink(url) method.
		   grid.setControlLink('http://www.google.com');
		   // set number of columns/rows
		   grid.setColumnCount(20);
		   grid.setRowCount(".mysql_num_rows($result).");
		
		   // write grid to the page
		    
		   document.write(grid);
		
		</script>";
        }
    }
    //retorna solo los campos que existen en actividadesxorden
    function actiOrdenes($condicion){
    	$nuevaCondicion="";
    	$array = explode("AND",$condicion);
    	$sql = "show fields from actividadesxorden";
    	$result = mysql_query($sql);
    	while($row=mysql_fetch_array($result)){
    		foreach($array as $valor){
    			if(strpos($valor,$row[0])!==false){
					$nuevaCondicion.= " $valor AND";
				}
				
			}
			
		}
		$nuevaCondicion.="<";
		return $condicion=str_replace("AND<","",$nuevaCondicion);
		
	}

	//crea la consulta DELETE 
    function crearDelete($condicion)
    {
		global $sIdConvenioAct;
        $result = $this->query($this->sql);
        $tabla = $this->nombreTabla($result, 0);
        //eliminar el actual
        $sql = "DELETE FROM  $tabla WHERE $condicion\n";
        $contenido = $this->extraervalor($condicion);
        //checar que no se este usando
        //si no se especifican las tablas relacionadas, buscarlas
        if (!$this->tablasrelaciones and $this->tablasrelaciones!="none")
            $tablas = $this->relaciones($tabla);
        else
            $tablas = $this->tablasrelaciones;
        //buscar concurrencias de registro en tablas relacionadas    
        $relacionado=false;
        if($this->tablasrelaciones[0]!="none")
           $relacionado = $this->busRelaciones($tabla,$tablas,$contenido);
        //si no hay , eliminar el registro
        if(!$relacionado)
        {   
            $this->initransaccion();
               	$this->query($sql);
            if($this->mysql_err)
               $this->destransaccion();     
            else
               $this->aceptransaccion();      
        }
    }
 	
  
}
?>