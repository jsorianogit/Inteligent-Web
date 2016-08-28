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
      for($i=0;$i<2;$i++){
        $consulta = $this->sql;
         //filas obtenidas
         $total = $this->contarfilas($consulta);
         //tamaño del paginador
         if($total<200):
              $tampag=10;
         elseif ($total<400):
               $tampag=10;
         else:
               $tampag=10;
         endif;
         $iniciaren=($pag-1) * $tampag;   //Registro actual
         if($iniciaren<0)$iniciaren=0;
         
         $this->paginar($pag, $total, $tampag, "?pag="); 
         
         if ($orderby !=""){
            $consulta = $this->sql." ORDER BY $orderby LIMIT $iniciaren,$tampag";
         }
         else {
            $consulta = $this->sql." LIMIT $iniciaren,$tampag";  
         }
         
        $result = $this->query($consulta);
        //obtener descripcion de la tabla
        $tablades = $this->comentarioTabla($this->nombreTabla($result, 0));
        //si no tiene, poner como descripcion el nombre de la misma
        if ($tablades == "") $tablades = $this->nombreTabla($result, 0);
        
        echo "\n<center><table class='enhancedtablerowhover'>
            \n<caption>".$tablades."</caption>
            \n<thead>
            \n<tr>
            \n<td scope='col' colspan=4</td>";
      if(   $this->nombrecampo==""){
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
               echo "\n<th scope='col' ><a href='?order=$campo'>$des</a></th>";
           }
       }
       else{
         foreach($this->nombrecampo as $title){
            print("<th scope='col'>$title</th>");
         }
      }
        echo " \n</tr>
            \n</thead>
            \n<tbody>";
        while ($row = mysql_fetch_array($result))
        {
            $filtro = $this->cifrar($row, $result);
            echo "\n<tr>";
            echo "\n<td class='CrearReporte' >\n<a title='Modificar Caratula de Reporte' href='?sContrato=$sContrato&dIdFecha=".$row['dIdFecha']."&sNumeroOrden=".$row['sNumeroOrden']."&sIdTurno=".$row['sIdTurno']."'>\n<img src='".$this->PathImages."editar.png' width=17 height=17>\n</a></td> ";
            echo "\n<td class='CrearReporte' >\n<a title='Eliminar Caratula de Reporte' href='$_SERVER[PHP_SELF]?operacion=b&$filtro'>\n<img src='".$this->PathImages."eliminar.png' width=17 height=17>\n</a></td> ";
            echo "\n<td class='CrearReporte' >\n<a title='Imprimir el Reporte Diario' href=\"./../../../../Acceso/scripts/php/Reportes/$rptDiario/rptReporteDiario.php?sContrato=".$sContrato."&sNumeroOrden=".$row['sNumeroOrden']."&dFecha=".$row['dIdFecha']."&sIdTurno=".$row['sIdTurno']."&sIdConvenio=".$row['sIdConvenio']."&lStatus=".$row['lStatus']."&sNumeroReporte=".$row['sNumeroReporte']."\"   target=_blank >\n<img src='".$this->PathImages."impresora.png' width=17 height=17>\n</a></td> ";
            echo "\n<td class='CrearReporte' >\n<a title='Analisis Financiero' href=\"./../../../../../reporte.php?sContrato=".$sContrato."&sNumeroOrden=".$row['sNumeroOrden']."&dIdFecha=".$row['dIdFecha']."&sIdTurno=".$row['sIdTurno']."&sIdConvenio=".$row['sIdConvenio']."&lStatus=".$row['lStatus']."&reportesPath=financiero&nombreReporte=costoPersonalEquipo\"   target=_blank >\n<img src='".$this->PathImages."pesos.png' width=17 height=17>\n</a></td> ";
         // acroba2t.gif
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
                   echo "\n<td><img src = '$nombreImagen' width = '100' heigth = '100'</img></td>";  
                   $img = false;
                 }
                 else if($this->tipoCampo($result,$i)=="real" and (strpos($this->nombreCampo($result,$i),"Costo") or strpos($this->nombreCampo($result,$i),"Venta")))
                   echo "\n<td>$ ".number_format($row[$i],2,'.',',')."</td>";
                 else if($this->tipoCampo($result,$i)=="real" and strpos($this->nombreCampo($result,$i),"Avance"))
                   echo "\n<td>".number_format($row[$i],1,'.',',')." % </td>";
                else if(strpos(strtolower($this->nombreCampo($result, $i)), strtolower("fecha"))!==false){//formato de fecha
                   echo "\n<td>".formatoFecha($row[$i])."</td>";
            }
            else
               echo "\n<td>".$row[$i]."</td>";
            }
            #Saber si tiene permisos para validar
            $sql_ ="select lValida from usuarios where sIdUsuario='".$_SESSION['sIdUsuario']."'";
            $result_ = mysql_query($sql_);
            if($row_=mysql_fetch_array($result_))
               $valida = $row_['lValida'];
               
            echo "\n<td class='CrearReporte' >\n<a title='(1) Jornadas y Tiempos' href='jornadas/mostrar.php?sContrato=$sContrato&fecha=".$row['dIdFecha']."&orden=".$row['sNumeroOrden']."&convenio=".$row['sIdConvenio']."&turno=".$row['sIdTurno']."'>\n<img src='".$this->PathImages."jornadasDiarias.png' width=17 height=17>\n</a></td> ";

            echo "\n<td class='CrearReporte' >\n<a title='(2) Firmantes del Dia' href='../../../../frmFirmas.php?reportediario=si&fecha=".$row['dIdFecha']."&orden=".$row['sNumeroOrden']."'>\n<img src='".$this->PathImages."firmantes.png' width=17 height=17>\n</a></td> ";
//          echo "\n<td class='CrearReporte' >\n<a title='(2) Firmantes del Dia' href='../firmantes/mostrar.php?reportediario=si&fecha=".$row['dIdFecha']."&orden=".$row['sNumeroOrden']."'>\n<img src='".$this->PathImages."firmantes.png' width=17 height=17>\n</a></td> ";
         //   echo "\n<td class='CrearReporte' >\n<a title='(2) Firmantes del Dia' href='../firmantes/index.php?reportediario=si&fecha=".$row['dIdFecha']."&orden=".$row['sNumeroOrden']."'>\n<img src='".$this->PathImages."firmantes.png' width=17>\n</a></td> ";

            echo "\n<td class='CrearReporte' >\n<a title='(3) Permisos' href='../../permisosdeseguridad/index.php?sContrato=$sContrato&fecha=".$row['dIdFecha']."&orden=".$row['sNumeroOrden']."&convenio=".$row['sIdConvenio']."&pag=1'>\n<img src='".$this->PathImages."permisos.png' width=17 height=17>\n</a></td> ";
            //echo "\n<td class='CrearReporte' >\n<a title='(4) Aviso de Embarque' href='avisosdeembarques/?sContrato=$sContrato&dIdFecha=".$row['dIdFecha']."&orden=".$row['sNumeroOrden']."&convenio=".$row['sIdConvenio']."&pag=1'>\n<img src='".$this->PathImages."embarques.png' width=17 height=17>\n</a></td> ";
            echo "\n<td class='CrearReporte' >\n<a title='(4) Aviso de Embarque' href='../../../../frmAvisosEmbarques.php?orden=".$row['sNumeroOrden']."'>\n<img src='".$this->PathImages."embarques.png' width=17 height=17>\n</a></td> ";
            echo "\n<td class='CrearReporte' >\n<a title='(5) Volumenes de Obra y Notas' href='volumenes/volumenes.php?sContrato=$sContrato&dIdFecha=".$row['dIdFecha']."&sNumeroOrden=".$row['sNumeroOrden']."&convenio=".$row['sIdConvenio']."&sIdTurno=".$row['sIdTurno']."&lStatus=".$row['lStatus']."&pag=1'>\n<img src='".$this->PathImages."volumenes.png' width=17 height=17>\n</a></td> ";
            echo "\n<td class='CrearReporte' >\n<a title='(6) Alcances por Partida Anexo' href='alcancesxpartida/alcances.php?sContrato=$sContrato&dIdFecha=".$row['dIdFecha']."&sNumeroOrden=".$row['sNumeroOrden']."&convenio=".$row['sIdConvenio']."&sIdTurno=".$row['sIdTurno']."&lStatus=".$row['lStatus']."&pag=1'>\n<img src='".$this->PathImages."alcances.png' width=17 height=17>\n</a></td> ";
//            echo "\n<td class='CrearReporte' >\n<a title='(7) Personal y Equipo' href='personalyequipo/?sContrato=$sContrato&dIdFecha=".$row['dIdFecha']."&sNumeroOrden=".$row['sNumeroOrden']."&convenio=".$row['sIdConvenio']."&sIdTurno=".$row['sIdTurno']."&pag=1'>\n<img src='".$this->PathImages."personal.png' width=17 height=17>\n</a></td> ";
            echo "\n<td class='CrearReporte' >\n<a title='(7) Personal y Equipo' href='../../../../frmPersonalEquipo.php?sContrato=$sContrato&dFecha=".$row['dIdFecha']."&sNumeroOrden=".$row['sNumeroOrden']."&convenio=".$row['sIdConvenio']."&sIdTurno=".$row['sIdTurno']."&pag=1'>\n<img src='".$this->PathImages."personal.png' width=17 height=17>\n</a></td> ";
            echo "\n<td class='CrearReporte' >\n<a title='(8) Reporte Fotografico' onClick=\"window.open('fotografico/reportefotografico.php?numeroFolio=".$row['sNumeroReporte']."&Fecha=".$row['dIdFecha']."&sIdTurno=".$row['sIdTurno']."&orden=".$row['sNumeroOrden']."&pag=1','ReporteFotografico','width=500,height=300,scrollbars=yes,resizable=yes,status=0,toolbar=0');\" href='#'>\n<img src='".$this->PathImages."camara.png' width=17 height=17>\n</a></td> ";

            $url="sContrato=$sContrato&dIdFecha=".$row['dIdFecha']."&sNumeroOrden=".$row['sNumeroOrden']."&sIdConvenio=".$row['sIdConvenio']."&sIdTurno=".$row['sIdTurno']."&sNumeroReporte=".$row['sNumeroReporte'];

           /* echo "\n</tr>";
            echo "\n<tr>";
                        echo "\n<td colspan=12 >\n</td> ";*/
			if($_SESSION['database']=='geotech' or $_SESSION['database']=='geotechAdal'){                        
                        echo "\n<td class='CrearReporte'  >\n<a title='(9) Control de Acarreos' href='../../../../frmControlAcarreo.php?$url'>\n<img src='".$this->PathImages."embarques.png' width=17 height=17>\n</a></td> ";
                        echo "\n<td class='CrearReporte' >\n<a title='(10) Relacion Personal Equipo' href='../../../../frmRelacionPersonalEquipo.php?$url'>\n<img src='".$this->PathImages."embarques.png' width=17 height=17>\n</a></td> ";
            }
			//echo "\n</tr>";


          #  if($valida=='Si')

          #     echo "\n<td class='CrearReporte' >\n<a title='(9) Validar Reporte Diario' href=\"ValidaReporteDiario/sqls.php?sContrato=".$sContrato."&sNumeroOrden=".$row['sNumeroOrden']."&dIdFecha=".$row['dIdFecha']."&sIdTurno=".$row['sIdTurno']."&sIdConvenio=".$sIdConvenioAct."&lStatus=".$row['lStatus']."\">\n<img src='".$this->PathImages."validar.jpg' width=17 height=17>\n</a></td> ";
            //$sIdConvenioAct mensaje($row['sIdConvenio']);
            echo "\n</tr>";// ../../../../Acceso/scripts/php/Reportes/generadores
        }
        echo "\n</tr></tbody></table></center>";
        $this->paginar($pag, $total, $tampag, "?pag="); 
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
