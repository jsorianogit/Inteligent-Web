<?php
   require_once ("../../../include/formulario.inc.php");
   class generadores extends formulario{

      function crearInsert($_POST,$HTTP_POST_FILES)
      {
         #contar las semanas
         $_POST['iSemana']= semanasEntreFechas($_POST['dFechaInicio'],$_POST['dFechaFinal']);
         #armar la descripcion
         $Descripcion = "Creacion del Generador No. [".$_POST['sNumeroGenerador']. "] de la orden [".$_POST['sNumeroOrden']."]" ;
         #insertar el kardex
         parent::kardexSistema($_POST['sContrato'],$_POST['sIdUsuario'],$Descripcion,'Generadores');
         #insertar generador
         parent::crearInsert($_POST,$HTTP_POST_FILES);
      }
      function crearUpdate($condicion, $_POST , $HTTP_POST_FILES )
      {
         #contar semanas
        $_POST['iSemana']= semanasEntreFechas($_POST['dFechaInicio'],$_POST['dFechaFinal']);
        #obtener generador a modificar
        $sep = explode("=",$condicion);
        $gen = explode("'",$sep[2]);
        $genActual = $gen[1];
        #armar la descripcion
        $Descripcion = "Modificación del Generador Original No. [$genActual] de la Orden [".$_POST['sNumeroOrden']."], No. de Generador Final [".$_POST['sNumeroGenerador']. "] "; ;
        #insertar kardex
        parent::kardexSistema($_POST['sContrato'],$_POST['sIdUsuario'],$Descripcion,'Generadores');
        #actualizar
        parent::crearUpdate($condicion, $_POST , $HTTP_POST_FILES );
      }
      function crearDelete($condicion)
      {
        #separar la condicion
        $sep = explode("=",$condicion);
        # foreach($sep  as $index => $value)
        #  echo "<br>$index $value";

        #obtener el contrato
        $gen = explode("'",$sep[1]);
        $contrato = $gen[1];

        #obtener el generador
        $gen = explode("'",$sep[2]);
        $genActual = $gen[1];

        #obtener el Numero de Orden
        $gen = explode("'",$sep[3]);
        $orden = $gen[1];

        #insertar kardex
        $Descripcion = "Eliminacion del Generador No. [$genActual] de la Orden [$orden]"; ;
        parent::kardexSistema($contrato,$_SESSION['ssUsuario'],$Descripcion,'Generadores');

        #eliminar generador
        parent::crearDelete($condicion);
      }
       //muestra los registros de la tabla
       function visualizar($pag="",$orderby="")
       {
         for($i=0;$i<2;$i++){
           $consulta = $this->sql;
            //filas obtenidas
            $total = $this->contarfilas($consulta);
            //tamaño del paginador
            if($total<200):
                 $tampag=20;
            elseif ($total<400):
                  $tampag=40;
            else:
                  $tampag=60;
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
           else if($this->edit==1 and $this->delete==1) $espacio = 2;
           else if($this->edit==1 and $this->delete==0) $espacio = 1;
           else if($this->edit==0 and $this->delete==1) $espacio = 1;
          else $espacio = 0;
           echo "\n<center><table class='enhancedtablerowhover'>
               \n<caption><center><font size='1.5'>".$tablades."</font></center></caption>
               \n<thead>
               \n<tr>
               \n<td scope='col' colspan=$espacio></td>";
               
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
               if ($des == "" or is_numeric($des)) $des = $campo;
               echo "\n<th scope='col' ><a title='Ordenar Por: $des'  href='http://Intel-Code.com.mx' onClick=\"window.location.href='?order=$campo'; return false\">$des</a></th>";
           }
           echo " \n</tr>
               \n</thead>
               \n<tbody>";
           while ($row = mysql_fetch_array($result))
         {
               $filtro = $this->cifrar($row, $result);
            if($row["lStatus"]=="Pendiente")
               $Cadena = "window.location.href='$_SERVER[PHP_SELF]?operacion=m&$filtro'";
              else
               $Cadena = "alert('Generador Aplicado , No puede Realizar Cambios')";
              
            if(strtoupper($row["sIdUsuario"])==strtoupper($_SESSION["sIdUsuario"]) and $row["lStatus"]=="Pendiente")
               $Cadena2 = "if( elimina = confirm('Realmente Desea Eliminar el Registro?') ){ window.location.href='$_SERVER[PHP_SELF]?operacion=b&$filtro' }";
              else
               $Cadena2 = "alert('Generador Aplicado o Fue creado por un Usuario Distintio, No puede  Eliminarlo')";
              
            
               
               echo "\n<tr>";
                  if($this->edit==1)
               echo "\n<td class='CrearReporte'>
                  \n<a title = 'Modificar Registro ' href='http://Intel-Code.com.mx' onClick=\"$Cadena; return false;\">
                  \n<img src='".$this->PathImages."editar.png' width=11></a></td>";
               if($this->delete==1)//'href='$_SERVER[PHP_SELF]?operacion=b&$filtro'
                  echo "\n<td class='CrearReporte'  >
                  \n<a title = 'Eliminar el  Registro'  href='http://Intel-Code.com.mx'
                  onClick=\" $Cadena2;return false;\" >
                  \n<img src='".$this->PathImages."eliminar.png' width=11>
                  \n</a></td> ";
               for ($i = 0; $i < mysql_num_fields($result); $i++)
               {
                  if(strpos(strtoupper($this->nombreCampo($result, $i)),strtoupper("Imagen")) and  $tipo = $this->tipoCampo($result, $i)=="blob")                    
               {
                  $nombreImagen="";
                  foreach($this->campollave as $claves){
                     $nombreImagen.=$row[$claves]; 
                  }
                  $nombreImagen = str_replace("/","-",$nombreImagen);
                  $nombreImagen.=".jpg";
                    //$nombreImagen=$row[$this->campollave].".jpg";
                   $img = $this->procesarImagen($row[$i],$nombreImagen);
                  }
                   if (!$this->mostrarCampo($this->nombreCampo($result, $i)))
                       continue;
                   if ($img){
                      echo "\n<td><img border=1 src = '$nombreImagen' width = '90' heigth = '90'</img></td>";  
                      $img = false;
                    }
                    else  if(( strpos(strtoupper($this->nombreCampo($result, $i)),"DLL")!==false  or  strpos(strtoupper($this->nombreCampo($result, $i)),"MN")!==false )
                                    AND $this->tipoCampo($result, $i)=="real"){
                      $row[$i] = number_format($row[$i], 4, '.', ',');
                      echo "\n<td class ='derecha'>$ ".$row[$i]."</td>";
                    }
                   else if( strpos($this->tipoCampo($result, $i),"real")!==false ){
                      $row[$i] = number_format($row[$i], 4, '.', ',');
                      echo "\n<td class ='derecha'> ".$row[$i]."</td>";
                   }
                else if(strpos(strtolower($this->nombreCampo($result, $i)), strtolower("fecha"))!==false){//formato de fecha
                   echo "\n<td>".formatoFecha($row[$i])."</td>";
				}
				else
					echo "\n<td>".$row[$i]."</td>";
   
               }
               echo "\n<td><a href=\"../../../../Acceso/scripts/php/Reportes/generadores_swbs/rptCaratulaGenerador.php?sContrato=".$_SESSION['ssContrato']."&sNumeroOrden=".$_SESSION['NumberOrder']."&sNumeroGenerador=" . $row['sNumeroGenerador']."\"  target=_blank><img src='acrobat.gif' width='20' height='20' title='Imprimir Generador' border='1'> </a></td>";
               echo "\n<td><a href=\"../../../../Acceso/scripts/php/Reportes/generadores_swbs/rptNumerosGeneradores.php?sContrato=".$_SESSION['ssContrato']."&sNumeroOrden=".$_SESSION['NumberOrder']."&sNumeroGenerador=" . $row['sNumeroGenerador']."\"  target=_blank><img src='acrobat.gif' width='20' height='20' title='Imprimir Numeros Generadores' border='1'></a></td>";
               echo "\n<td><a href=\"../../../../Acceso/scripts/php/Reportes/generadores_swbs/rptNumerosGeneradoresCIA.php?sContrato=".$_SESSION['ssContrato']."&sNumeroOrden=".$_SESSION['NumberOrder']."&sNumeroGenerador=" . $row['sNumeroGenerador']."\"  target=_blank><img src='acrobat.gif' width='20' height='20' title='Imprimir Numeros Generadores CIA' border='1'></a></td>";
               echo "\n<td><a href=\"../../../../Acceso/scripts/php/Reportes/generadores_swbs/rptSemanalConImportes.php?sContrato=".$_SESSION['ssContrato']."&sNumeroOrden=".$_SESSION['NumberOrder']."&sNumeroGenerador=" . $row['sNumeroGenerador']."\"  target=_blank><img src='acrobat.gif' width='20' height='20' title='Imprimir Resumen Semanal Con Importes' border='1'></a></td>";
               echo "\n<td><a href=\"../../../../Acceso/scripts/php/Reportes/generadores_swbs/rptSemanalSinImportes.php?sContrato=".$_SESSION['ssContrato']."&sNumeroOrden=".$_SESSION['NumberOrder']."&sNumeroGenerador=" . $row['sNumeroGenerador']."\"  target=_blank><img src='acrobat.gif' width='20' height='20' title='Imprimir Resumen Semanal Sin Importes' border='1'></a></td>";
               echo "\n</tr>";
           }
           echo "\n</tr></tbody></table></center>";
           $this->paginar($pag, $total, $tampag, "?pag="); 
           }
       }
   }
?>
