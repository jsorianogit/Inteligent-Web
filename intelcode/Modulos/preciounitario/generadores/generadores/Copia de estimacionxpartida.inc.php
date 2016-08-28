<?php
   require ("../../../include/formulario.inc.php");
   class estimaciones extends formulario{
      function crearInsert($_POST,$HTTP_POST_FILES){
         global $sIdConvenioAct;
         #poner la instalacion afectada
         if($_POST['sInstalacion']=="")
            $_POST['sInstalacion']=$_POST['sContrato'];
         #Leer el instalado actual
         $sql = "SELECT dInstalado 
         FROM actividadesxorden 
         WHERE sContrato='".$_POST['sContrato']."' AND sIdConvenio='$sIdConvenioAct' 
            AND sNumeroActividad='".$_POST['sNumeroActividad']."'
            AND sNumeroOrden='".$_POST['sNumeroOrden']."' AND sTipoActividad='Actividad' 
            AND sWbs='".$_POST['sWbs']."'";
         $result = mysql_query($sql);
         if($row = mysql_fetch_array($result)){
            $instalado = $row['dInstalado'];
         }
         #Obtener cuanto se quiere generar
         $dCantidadEstimar = $_POST['dCantidad'];
         #Obtener el Generado actual
         $sql = "SELECT sum(dCantidad) as dCantidad
         FROM estimacionxpartida 
         WHERE sContrato ='".$_POST['sContrato']."'
            AND sNumeroOrden='".$_POST['sNumeroOrden']."' 
            AND sNumeroActividad='".$_POST['sNumeroActividad']."' 
            AND sWbs='".$_POST['sWbs']."'
            AND sNumeroGenerador='".$_POST['sNumeroGenerador']."';";
         $result = mysql_query($sql);
         if($row = mysql_fetch_array($result)){
            $dCantidadEstimado = $row['dCantidad'];
         }
         #Permitir el insert si es menor lo que se quiere instalar
         if($instalado < ($dCantidadEstimar+$dCantidadEstimado)){
            $resta = ($dCantidadEstimar+$dCantidadEstimado)-$instalado;
            $l1 = "La cantidad acumulada en los generadores de obra es superior a la cantidad manitestada en los reportes diarios. ";
            $l1 .= "Cantidad acumulada hasta el Generador de Obra [".$_POST['sNumeroGenerador']."] (Acumulado + Cantidad a Generar) =".($dCantidadEstimar+$dCantidadEstimado).", Cantidad ";
            $l1 .= "Manifestada en Reportes Diarios = $instalado, Necesita Reportar la cantidad de ".($resta)." , ";
            $l1 .= "No se hace nada !!! ";
            //$l1 .= "Desea ir a la Bitacora de Actividades y Reportar el Faltante ?? Si        No";
            mensaje($l1);
            return ;
         }
         if(   $_POST['sInstalacion']=="" OR  $_POST['sIsometricoReferencia']==""){
            $l2 = "Debera seleccionar un isometrico de ingenieria que ampare la instalacion de la partida anexo asi como ";
            $l2 .= "la plataforma de instalacion para el direccionamiento de costos";
            mensaje($l2);
            return ;  
         }

         if($_POST['sWbs']!="" AND 
            $_POST['sNumeroActividad']!="" AND 
               $_POST['sInstalacion']!="" AND  
                  $_POST['sIsometricoReferencia']!="" AND
                     $_POST['dCantidad']>0){
                        parent::crearInsert($_POST,$HTTP_POST_FILES);
         }
      }
      function crearUpdate( $condicion , $_POST , $HTTP_POST_FILES){
         global $sIdConvenioAct;
         #poner la instalacion afectada
         if($_POST['sInstalacion']=="")
            $_POST['sInstalacion']=$_POST['sContrato'];
         #Leer el instalado actual
         $sql = "SELECT dInstalado 
         FROM actividadesxorden 
         WHERE sContrato='".$_POST['sContrato']."' AND sIdConvenio='$sIdConvenioAct' 
            AND sNumeroActividad='".$_POST['sNumeroActividad']."'
            AND sNumeroOrden='".$_POST['sNumeroOrden']."' AND sTipoActividad='Actividad' 
            AND sWbs='".$_POST['sWbs']."'";
         $result = mysql_query($sql);
         if($row = mysql_fetch_array($result)){
            $instalado = $row['dInstalado'];
         }
         #Obtener cuanto se quiere generar
         $dCantidadEstimar = $_POST['dCantidad'];

         #Permitir el insert si es menor lo que se quiere instalar
         if($instalado < ($dCantidadEstimar)){
            $resta = ($dCantidadEstimar)-$instalado;
            $l1 = "La cantidad acumulada en los generadores de obra es superior a la cantidad manitestada en los reportes diarios. ";
            $l1 .= "Cantidad acumulada hasta el Generador de Obra [".$_POST['sNumeroGenerador']."] (Acumulado + Cantidad a Generar) =".($dCantidadEstimar).", Cantidad ";
            $l1 .= "Manifestada en Reportes Diarios = $instalado, Necesita Reportar la cantidad de ".($resta)." , ";
            //$l1 .= "Desea ir a la Bitacora de Actividades y Reportar el Faltante ?? Si        No";
            mensaje($l1);
            return ;
         }
         if(   $_POST['sInstalacion']=="" OR  $_POST['sIsometricoReferencia']==""){
            $l2 = "Debera seleccionar un isometrico de ingenieria que ampare la instalacion de la partida anexo asi como ";
            $l2 .= "la plataforma de instalacion para el direccionamiento de costos";
            mensaje($l2);
            return ;
         }

         if($_POST['sWbs']!="" AND 
            $_POST['sNumeroActividad']!="" AND 
               $_POST['sInstalacion']!="" AND  
                  $_POST['sIsometricoReferencia']!="" AND
                     $_POST['dCantidad']>0){
                        parent::crearUpdate( $condicion , $_POST , $HTTP_POST_FILES);
         }
      }
       //muestra los registros de la tabla
       function visualizar($pag="",$orderby="")
       {
         global $sContrato;
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
               echo "\n<th scope='col' ><a href='http://Intel-Code.com.mx' title='Ordenar Por: $des' onClick=\"window.location.href='?order=$campo'; return false\">$des</a></th>";
           }
           echo " \n</tr>
               \n</thead>
               \n<tbody>";
           while ($row = mysql_fetch_array($result))
         {
            $filtro = $this->cifrar($row, $result);
            $sqlG = "   select sIdUsuario , lStatus from estimaciones where sContrato='$sContrato' and sNumeroGenerador='".$row['sNumeroGenerador']."'  and sNumeroOrden='".$_SESSION['NumberOrder']."' ;";
         
            $rs = mysql_query($sqlG);
            if($rw = mysql_fetch_array($rs)){
               $usuario = $rw['sIdUsuario'];
               $estatus = $rw['lStatus'];
            }
            if($estatus=="Pendiente")
               $Cadena = "window.location.href='$_SERVER[PHP_SELF]?operacion=m&$filtro'";
              else
               $Cadena = "alert('Generador Aplicado , No puede Realizar Cambios')";
              
            if(strtoupper($usuario)==strtoupper($_SESSION["sIdUsuario"]) and $estatus=="Pendiente")
               $Cadena2 = "if( confirm('Realmente Desea Eliminar el Registro?') ){ window.location.href='$_SERVER[PHP_SELF]?operacion=b&$filtro' }";
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
                   else
                      echo "\n<td>".$row[$i]."</td>";
   
               }
               echo "\n</tr>";
           }
           echo "\n</tr></tbody></table></center>";
           $this->paginar($pag, $total, $tampag, "?pag="); 
           }
       }
   }
?>
