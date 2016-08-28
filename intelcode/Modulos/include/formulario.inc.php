<?php
/*
Descripcion:
Crea un formulario web a partir de una consulta proporcionada
   $formulario = new formulario ($sql,$camposocultos,$camposbloqueados, $val, $campollave,$tablasrelaciones)
----------------------------------------------------------------------------------------------------------------------
bandera    | Nombre               |   Tipo     |   Descripcion                                                       |
----------------------------------------------------------------------------------------------------------------------
requerido  | $sql                 |   string   |   Consulta que se usa para crear el formulario                      |
----------------------------------------------------------------------------------------------------------------------
opcional   | $camposocultos       |   array    |   Array de campos que no deben mostrarse en la consulta             |
----------------------------------------------------------------------------------------------------------------------
opcional   | $camposbloqueados    |   array    |   Array de campos que permanecen de sololectura en el formulario    |
           |                      |            |   creado                                                            |
----------------------------------------------------------------------------------------------------------------------
opcional   | $val                 |   array    |   Array asociativo de campos => valor , de los campos que tendran   |
           |                      |            |   un valor                                                          |
           |                      |            |   predefinido en los formularios                                    |
----------------------------------------------------------------------------------------------------------------------
opcional   | $tablasrelaciones    |   array    |   Array de tablas con las que tiene relacion la tabla para          |
           |                      |            |   creacion del form.                                                |
----------------------------------------------------------------------------------------------------------------------
*/

//recoge la pagina actual para el paginador

if(isset($_REQUEST['pag'])){
   $_SESSION['pagActual']=$_REQUEST['pag'];
   $pag=$_REQUEST['pag'];
}
elseif(isset($_SESSION['pagActual']))
   $pag=$_SESSION['pagActual'];
elseif(!isset($pag))
   $pag=1;

require ("mysql.inc.php");
require ("encryptFunction.php");
require ($raiz."intelcode/fnUtilerias.php");


class formulario
{
    var $contrato;
    var $acampos;//Campos que no deben mostrarse
    var $bcampos;//Campos que se bloquean en eel formulario
    var $val;//valores por default al insertar
    var $sql;//consulta sql general
    var $read;//indica si la etiqueta input es de solo lectura
    var $campollave;//Arrat de campo llave de de la tabla en cuestion
    var $mysql_err; //captura el error generado por el servidor mysql
    var $transaccion ; //indica si se esta realizando una tansaccion
    //array asosiativo que contendra las opciones para los valores de los select
    var $onfocus="#FFCC99"; //color d texto al recibir el foto
    var $tablasrelaciones; //array proporcionado que contendra las demas tablas relacionadas (opcional)
    var $select;
    //ruta de las imagenes eliminar, modificar, etc
    var $PathImages;// = "http://127.0.0.1/Joomla/intelcode/Modulos/imagenes/";
   //variables que indican si el row puede ser editado o borrad
   var $edit;
   var $delete;
   //Permite imprimir Opciones extras a los input's (por ejemplo una funcion de javascript)
   var $arrayOpciones;
   var $selectPersonalizado ;
   //array de campos ocultos
   var $hidden;
   //Variable que indica si el campo es tipo oculto
   var $Hidden;
   //Contiene codigo de javascript del usuario y es insertado al final de formulario creado
   var $Code;
   //Indica si el codigo de javascript se encuentra en un archivo externo
   var $TypeCode;
   //indica si se debe ordenar el formulario de acuerdo a la consulta especificada
   var $ordenarFormxSQL;
    //constructutor
    function formulario($sql, $camposNo = "",$camposBlo="", $val = "", $campollave = "",$tablasrelaciones)
    {
         global $sContrato,$pathAbsolute;
        $this->contrato =  $sContrato;
        $this->sql = $sql;
        $this->acampos = $camposNo;
        $this->val = $val;
        $this->campollave = $campollave;
        $this->mysql_err = false ;
        $this->tablasrelaciones = $tablasrelaciones;
        $this->bcampos = $camposBlo;
        $this->ponerselect();
        $this->editar(1);
        $this->borrar(1);
        $this->PathImages = $pathAbsolute."intelcode/Modulos/imagenes/";
    }
    //actualiza el kardex del sistema
    function kardexSistema($sContrato,$sIdUsuario,$sDescripcion,$lOrigen){
      $sIdUsuario = strtoupper($sIdUsuario);
      $sql = "Insert Into kardex_sistema (sContrato, sIdUsuario, dIdFecha, sHora, sDescripcion, lOrigen)
              Values ('$sContrato','$sIdUsuario','".date("Y-m-d")."','".date("H:i:s")."','$sDescripcion', '$lOrigen')";
      mysql_query($sql);
    }
    //indica si los resultados pueden ser editados
    function editar($valor = 1){
         $this->edit = $valor;
    }
    //indica si los resultados pueden ser borrado
    function borrar($valor = 1){
         $this->delete = $valor;
    }
    //imprime Opciones extras con los imput's
    function OpcionesExtras($arrayOpciones){
         $this->arrayOpciones = $arrayOpciones;
    }
    function ponerselectPersonalizado($arraySelect){
      $this->selectPersonalizado=$arraySelect;//array($campo=>$sql);
    }
    //variables select
    function ponerselect(){
    $this->select = array(
   "sIdEmbarcacion"=>"select sIdEmbarcacion,sDescripcion from embarcaciones",
   "sNumeroOrden"=>"SELECT sNumeroOrden,sNumeroOrden FROM ordenesdetrabajo WHERE sContrato='$this->contrato' ORDER BY sNumeroOrden",
   "sContrato"=>"SELECT sContrato,sContrato FROM contratos ORDER BY sContrato",
   "sIdUsuario"=>"SELECT sIdUsuario,sNombre FROM usuarios ORDER BY sNombre",
   "sIdDepartamento"=>"SELECT sIdDepartamento,sDescripcion  FROM departamentos ORDER BY sDescripcion",
   "sIdPrograma"=>"SELECT sIdPrograma,sDescripcion FROM programas ORDER BY sDescripcion",
   "sIdDepartamento"=>"SELECT sIdDepartamento,sDescripcion FROM departamentos ORDER BY sDescripcion",
   "sIdGrupo"=>"SELECT sIdGrupo,sDescripcion FROM grupos ORDER BY sDescripcion",
   "sIdPlataforma"=>"SELECT sIdPlataforma,sDescripcion FROM plataformas ORDER BY sDescripcion",
   "sIdTipoPersonal"=>"SELECT sIdTipoPersonal,sDescripcion FROM tiposdepersonal ORDER BY sDescripcion",
   "sIdTipoEquipo"=>"SELECT sIdTipoEquipo,sDescripcion FROM tiposdeequipo ORDER BY sDescripcion",
   "sIdTipoEmbarcacion"=>"select sIdTipoEmbarcacion,sDescripcion from tiposdeembarcacion",
   "sIdTipoConvenio"=>"SELECT sIdTipoConvenio,sDescripcion FROM tiposdeconvenio ORDER BY sDescripcion",
   "sIdTipoEstimacion"=>"SELECT sIdTipoEstimacion,sDescripcion FROM tiposdeestimacion ORDER BY sDescripcion",
   "sIdTipoInventario"=>"SELECT sIdTipoInventario,sDescripcion FROM tiposdeinventario ORDER BY sDescripcion",
   "sIdTipoEstimacion"=>"SELECT sIdTipoEstimacion,sDescripcion FROM tiposdeestimacion ORDER BY sDescripcion",
   "sIdTipoMovimiento"=>"SELECT sIdTipoMovimiento,sDescripcion FROM tiposdemovimiento WHERE sContrato='$this->contrato' ORDER BY sDescripcion",
   "sIdTipoOrden"=>"SELECT sIdTipoOrden,sDescripcion FROM tiposdeorden ORDER BY sDescripcion",
   "sIdTipoPermiso"=>"SELECT sIdTipoPermiso,sDescripcion FROM tiposdepermiso ORDER BY sDescripcion",
   "sIdPrueba"=>"SELECT sIdPrueba,sDescripcion FROM tiposdeprueba WHERE sContrato='$this->contrato' ORDER BY sDescripcion",
   "sIdCuenta"=>"SELECT sIdCuenta,sDescripcion FROM cuentas ORDER BY sDescripcion",
   "sIdCategoria"=>"SELECT sIdCategoria,sDescripcion FROM categorias ORDER BY sDescripcion",
   "cIdStatus"=>"SELECT cIdStatus,sDescripcion FROM estatus ORDER BY sDescripcion",
   "sIdPernocta"=>"SELECT sIdPernocta,sDescripcion FROM pernoctan ORDER BY sDescripcion",
   "sIdResidencia"=>"SELECT sIdResidencia,sDescripcion FROM residencias ORDER BY sDescripcion",
   "sIdDistrito"=>"SELECT sIdDistrito,sDescripcion FROM distritos ORDER BY sDescripcion",
   "sIdProveedor"=>"SELECT sIdProveedor,sRazon FROM proveedores ORDER BY sRazon",
   "sIdPersonal"=>"SELECT sIdPersonal,sDescripcion FROM personal WHERE sContrato='$this->contrato' ORDER BY sDescripcion",
   "sIdEquipo"=>"SELECT sIdEquipo,sDescripcion FROM equipos WHERE sContrato='$this->contrato'   ORDER BY sDescripcion",
   "sIdTurno"=>"SELECT sIdTurno,sDescripcion FROM turnos WHERE sContrato='$this->contrato'   ORDER BY sDescripcion",
   "sIdTipo"=>"SELECT sIdTipo,sDescripcion FROM movimientosdealmacen    ORDER BY sDescripcion",
   "iNumeroEstimacion"=>"SELECT iNumeroEstimacion,iNumeroEstimacion FROM estimacionperiodo WHERE sContrato='$this->contrato'"

   );
   }
    //envia una alerta al usuario
    function alerta($alerta = "")
    {
        if ($alerta == "")
            $alerta = "Mensaje de Alerta!";
        echo "\n<script language='javascript'>\nalert(\" $alerta \" );\n</script>";
    }
    //verifica si un campo es llave en las tablas
    function llave($banderas)
    {
        if (strpos($banderas, "_key")!==false)
            return true;
        else
            return false;
    }
    //verifica si el campo debe ser creado como select
    function tipoEnum($comentario)
    {
        if (strpos($comentario, "*")!==false)
            return true;
        else
            return false;
    }
    //optiene el comentario de la tabla
    function comentarioTabla($Tabla)
    {
        if ( $Tabla =="" ) return ;
        $sql = "show table status like '$Tabla%'";
        $result = $this->query($sql);
        if ($row = mysql_fetch_array($result))
        {
            $Comentario = "";
            for ($i = 0; $i < strlen($row['Comment']); $i++)
            {
                if ($row['Comment'][$i] == ';')
                    return $Comentario;
                $Comentario .= $row['Comment'][$i];
            }
            return $row['Comment'];
        }
    }
    //optiene el comentario del campo
    function comentario($Campo, $Tabla)
    {
        if ( $Campo == "" or $Tabla == "" ) return 0;
        $sql = "show full columns from $Tabla like '%$Campo%'";
        $result = $this->query($sql);
        if ($row = mysql_fetch_array($result))
        {
           return $row['Comment'];
        }
        else
            return "-";
    }
    //develve el nombre de la tabla
    function nombreTabla($result, $indice)
    {
        if (isset($result) and isset($indice))
        {
            return mysql_field_table($result, $indice);
        }
        else
            return ;
    }
    //devuelve las banderas del campo
    function banderas($result, $indice)
    {
        return mysql_field_flags($result, $indice);
    }
    //devuelve el tipo de campo
    function tipoCampo($result, $indice)
    {
        return mysql_field_type($result, $indice);
    }
    //devuelve el nombre del campo
    function nombreCampo($result, $indice)
    {
        return mysql_field_name($result, $indice);
    }
    //devuelve la longitud del campo
    function longCampo($result, $indice)
    {
        return mysql_field_len($result, $indice);
    }
    //devuelte true si el campo debe mostrarse en el grid
    function mostrarCampo($nombreCampo)
    {
        if ($this->acampos != "")
        {
            foreach ($this->acampos as $valor)
            {
                if ($nombreCampo == $valor)
                {
                    return false;
                    break;
                }
            }
        }
        return true;
    }
    //devuelte true si el campo debe bloquearse para editar
    function bloquearCampo($nombreCampo)
    {
        if ($this->bcampos != "")
        {
            foreach ($this->bcampos as $valor)
            {
                if ($nombreCampo == $valor)
                {
                    return false;
                    break;
                }
            }
        }
        return true;
    }
    //Ejecuta una consulta
    function query($sql)
    {
      global $link;
       //$this->alerta($sql);
        if ($sql == "") return ;

        // echo "<br>".$sql;
       //if ($this->mysql_err == 1 ) return ;
      // echo "<br>$sql";
        $resultado = mysql_query($sql,$link);
        if (mysql_error())
        {
            $this->alerta("Error Num. ".mysql_errno()."  ".mysql_error());
            $this->mysql_err = 1 ;
            if(mysql_errno()==1146)
               exit(0);
        }
        return $resultado;
    }
    //convertir a mayusculas
    //Crea etiqueta input type = text tipo fecha
    function CreaTextoFecha($Nombre, $Tamanyo, $Comentario, $valor = "",$OpcionExtra="")
    {
        $valor = str_replace("\"", "", $valor);
        if ($Tamanyo < 1)
            $Tamanyo = 255;
        if ($Tamanyo > 100)
            $size = 100;
        else
            $size = $Tamayno;
          if($this->Hidden=="hidden"){$Type = "hidden";$Comentario="";}else $Type="text";
        //Fecha por default si el valor es nulo
        if($valor=="")$valor = date("Y/m/d");
        if($this->read=="" and $Type=="text")
         echo "\n<tr>
               \n<td>$Comentario</td>
               \n<td>
               \n<label for='$Nombre'>
               \n<input class='fecha rang100' id='$Nombre' type='$Type' size='$size' value='$valor'
                  onKeyPress='return solonumeros(this.form,this,event);'
                  onfocus=\"style.backgroundColor='$this->onfocus'\"
                  onblur=\"style.backgroundColor='white'\"
                  maxlength='$Tamanyo' $this->read name='$Nombre' $OpcionExtra
                  >
               \n</label>
               \n</td>
               \n</tr>";
         else if($this->read!=""  and $Type=="text")
            echo "
               \n<tr>
               \n<td>$Comentario</td>
               \n<td>
                     \n<input  type='$Type' size='$size' value='$valor'
                     onKeyPress='return solonumeros(this.form,this,event);'
                     onfocus=\"style.backgroundColor='$this->onfocus'\"
                     onblur=\"style.backgroundColor='white'\"
                     maxlength='$Tamanyo' $this->read name='$Nombre' $OpcionExtra
                     >
               \n</td>
               \n</tr>";
         else   if($Type=="hidden")
            echo "
                     \n<input  type='$Type' size='$size' value='$valor'
                     onKeyPress='return solonumeros(this.form,this,event);'
                     onfocus=\"style.backgroundColor='$this->onfocus'\"
                     onblur=\"style.backgroundColor='white'\"
                     maxlength='$Tamanyo' $this->read name='$Nombre' $OpcionExtra
                     >";

    }
    //Crea etiqueta input type = text que solo acepta numeros
    function CreaTextoNumerico($Nombre, $Tamanyo, $Comentario, $valor = "",$OpcionExtra="")
    {
        $valor = str_replace("\"", "", $valor);
        if ($Tamanyo < 1)
            $Tamanyo = 255;
        if ($Tamanyo > 100)
            $size = 100;
        else
            $size = $Tamayno;
        if($this->Hidden=="hidden"){
         $Type = "hidden";
         $Comentario="";
         echo "
            \n<input type='$Type' size='$size' value='$valor'
               onfocus=\"style.backgroundColor='$this->onfocus'\"
               onblur=\"style.backgroundColor='white'\"
               onKeyPress='return solonumeros(this.form,this,event);'
               maxlength='$Tamanyo' $this->read name='$Nombre' $OpcionExtra
                >";
      }else{
         $Type="text";
         echo "\n<tr>
            \n<td>$Comentario</td>
            \n<td>
            \n<input type='$Type' size='$size' value='$valor'
               onfocus=\"style.backgroundColor='$this->onfocus'\"
               onblur=\"style.backgroundColor='white'\"
               onKeyPress='return solonumeros(this.form,this,event);'
               maxlength='$Tamanyo' $this->read name='$Nombre' $OpcionExtra
                >
            \n</td>
            \n</tr>";
      }
    }
    //Crea etiqueta input type = text
    function CreaTexto($Nombre, $Tamanyo, $Comentario, $valor = "",$OpcionExtra="")
    {
        $valor = str_replace("\"", "", $valor);
        if($this->Hidden=="hidden"){$Type = "hidden";$Comentario="";}else $Type="text";
        if ($Tamanyo < 1)
            $Tamanyo = 255;
        if ($Tamanyo < 100 or $Type=="hidden"){
           $size = $Tamanyo;
           if($Type=="hidden")
           echo "
               \n<input type='$Type' size='$size' value='$valor'
                  onfocus=\"style.backgroundColor='$this->onfocus'\"
                  onblur=\"style.backgroundColor='white';this.value = this.value.toUpperCase();\"
                  onKeyPress='return NoComillas(this.form,this,event);' maxlength='$Tamanyo' $this->read name='$Nombre' $OpcionExtra
                  >
               \n";
         else
           echo "\n<tr>
               \n<td>$Comentario</td>
               \n<td>
               \n<input type='$Type' size='$size' value='$valor'
                  onfocus=\"style.backgroundColor='$this->onfocus'\"
                  onblur=\"style.backgroundColor='white';this.value = this.value.toUpperCase();\"
                  onKeyPress='return NoComillas(this.form,this,event);' maxlength='$Tamanyo' $this->read name='$Nombre' $OpcionExtra
                  >
               \n</td>
               \n</tr>";

       }
        else{
            $size = $Tamayno;
           echo "\n<tr>
               \n<td>$Comentario</td>
               \n<td>
               \n<TEXTAREA COLS=80 ROWS=5
                  onfocus=\"style.backgroundColor='$this->onfocus'\"
                  onblur=\"style.backgroundColor='white';this.value = this.value.toUpperCase();\"
                  onKeyPress='return Comillas(event);' $this->read name='$Nombre' $OpcionExtra
                  >$valor</TEXTAREA>
               \n</td>
               \n</tr>";
        }
    }
    #Etiqueta Text con validacion para horas
    //Crea etiqueta input type = text
    function CampoHora($Nombre, $Tamanyo, $Comentario, $valor = "",$OpcionExtra="")
    {
        $valor = str_replace("\"", "", $valor);
        if($this->Hidden=="hidden"){$Type = "hidden";$Comentario="";}else $Type="text";
        $size = 5;
        echo "\n<tr>
               \n<td>$Comentario</td>
               \n<td>
            \n<input type='$Type' size='$size' value='$valor' maxlength=5
               onfocus=\"style.backgroundColor='$this->onfocus'\"
               onblur=\"style.backgroundColor='white';this.value = this.value.toUpperCase();\"
               onKeyPress='return mascara(this.form,this,event);'  maxlength='$Tamanyo' $this->read name='$Nombre' $OpcionExtra
               >
               \n</td>
               \n</tr>";
    }
    //Crea etiqueta input type = password
    function CreaTextoPasswd($Nombre, $Tamanyo, $Comentario, $valor = "",$OpcionExtra="")
    {
        $valor = str_replace("\"", "", $valor);
         if($this->Hidden=="hidden"){$Type = "hidden";$Comentario="";}else $Type="password";
        if ($Tamanyo < 1)
            $Tamanyo = 255;
        if ($Tamanyo > 100)
            $size = 100;
        else
            $size = $Tamayno;
        echo "\n<tr>
            \n<td>$Comentario</td>
            \n<td>
            \n<input type='$Type' size='$size' value='$valor'
               onfocus=\"style.backgroundColor='$this->onfocus'\"
               onblur=\"style.backgroundColor='white';this.value = this.value.toUpperCase();\"
               onKeyPress='return NoComillas(this.form,this,event);' maxlength='$Tamanyo' $this->read name='$Nombre' $OpcionExtra
                >
            \n</td>
            \n</tr>";
    }
    //Crea etiqueta input type = select a partir de una consulta SELECT
    function CreaSelect($Nombre, $Sql, $Comentario, $valor='',$OpcionExtra="")
    {
        $result = $this->query($Sql);
        echo "\n<tr>\n<td>\n$Comentario</td>\n<td>\n<select name='$Nombre' $OpcionExtra onKeyPress='tabuladorText(this.form,this,event)'>";
        echo "\n\t\t<option></option>";
        while ($row = mysql_fetch_row($result))
        {
            if (trim("$row[0]") == trim("$valor"))
                $seleccionar = "selected='selected'";
            else
                $seleccionar = "";
            $row[1]=trim($row[1]);
            $row[0]=trim($row[0]);
            echo "\n\t\t<option  value='".$row[0]."' $seleccionar>".$row[1]."</option>";
        }
        echo "\n</select>\n</td></tr>";

    }
    //Crea etiqueta input type = select para selccionar colores
    function CreaSelectColor($Nombre, $Comentario,$valor,$OpcionExtra="")
    {
      $Opciones = array(   1 =>"Black","Maroon","Green","Olive","Navy","Purple","Teal","Gray","Silver",
                     "Red","Lime","Yellow","Blue","Fuchsia","Aqua","White");
      print "\n<tr>\n<td>\n$Comentario</td><td>\n";
      print "<select name='$Nombre' $OpcionExtra onKeyPress='return tabulador(this.form,this,event);' >";
      foreach($Opciones as $indice => $val) {
         $Seleccionar= ($valor==$val or $valor==$indice) ? "Selected":"";
         print "<option value='$indice' class='$val' $Seleccionar>$val</option>\n";
      }
      print "</select>\n</td></tr>";
   }
    //Procesa Imagen
    function procesarImagen($contImaen,$nombre)
    {
      if (file_exists($nombre))
         unlink($nombre);
      $archivoImg = fopen($nombre,"w+");
      fwrite($archivoImg,$contImaen);
      return true;
    }

    //Crea etiqueta input = file para seleccionar imagenes
    function CreaImagen($Nombre, $Comentario,$OpcionExtra="")
    {
        echo " \n<tr><td>
            \n$Comentario
            \n</td><td>
            \n<input type='file' size='40' name='$Nombre'
               onfocus=\"style.backgroundColor='$this->onfocus'\"
               onblur=\"style.backgroundColor='white'\"
               onKeyPress='return NoComillas(this.form,this,event);'
               $OpcionExtra
               >
            \n</td></tr>";
    }
    //Crea etiqueta input = file para seleccionar imagenes
    function CreaImagenRuta($Nombre, $Comentario,$OpcionExtra="")
    {
        echo " \n<tr><td>
            \n$Comentario
            \n</td><td>
            \n<input type='file' size='40' name='$Nombre'
               onfocus=\"style.backgroundColor='$this->onfocus'\"
               onblur=\"style.backgroundColor='white'\"
               onKeyPress='return NoComillas(this.form,this,event);'
               $OpcionExtra
               >
            \n</td></tr>";
    }
    //crea etiqueta input = select de campos enum con todos sus posibles valores
    function CampoEnum($tabla, $campo, $Comentario, $valor = "",$OpcionExtra="")
    {
        $sql = "DESCRIBE $tabla $campo";
        $result = $this->query($sql);
      if($this->read =="" or $this->Hidden!="hidden")
         echo "\n<tr><td>$Comentario</td>";
        while ($ligne = mysql_fetch_array($result))
        {
            extract($ligne, EXTR_PREFIX_ALL, "IN");
            if (substr($IN_Type, 0, 4) == 'enum')
            {
                $liste = substr($IN_Type, 5, strlen($IN_Type));
                $liste = substr($liste, 0, (strlen($liste) - 2));
                $enums = explode(',', $liste);
                if (sizeof($enums) > 0)
                {
                  if($this->read !="" or $this->Hidden=="hidden") { $disabled="disabled";$visible="style='visibility:hidden'";}
                    if($this->read =="" or $this->Hidden!="hidden")
                  echo "\n<td>";
               echo "<select name='$campo' $OpcionExtra $visible $disabled onKeyPress='return tabulador(this.form,this,event);'>";
                    echo "\n<option></option>";
                    for ($i = 0; $i < sizeof($enums); $i++)
                    {
                        $elem = trim(strtr($enums[$i], "'", " "));
                        if (trim($elem) == trim($valor))
                            $seleccionar = "selected";
                        else
                            $seleccionar = "";
                        echo "\n<option $seleccionar value='".$elem."'>".$elem."</option>";
                    }
                    echo "\n</select>";
                }
            }
        }
        if($this->read =="" or $this->Hidden!="hidden")echo "\n</td></tr>";
    }
    //crea etiqueta input = select de campos set con todos sus posibles valores
    function CampoSet($tabla, $campo, $Comentario="", $valor = "",$OpcionExtra="")
    {
        $sql = "DESCRIBE $tabla $campo";
        $result = $this->query($sql);
        if($this->read =="" or $this->Hidden!="hidden")
           echo "\n<tr><td>$Comentario</td>";

        while ($ligne = mysql_fetch_array($result))
        {
           extract($ligne, EXTR_PREFIX_ALL, "IN");
           if (substr($IN_Type, 0, 3) == 'set')
            {
                $liste = substr($IN_Type, 4, strlen($IN_Type));
                $liste = substr($liste, 0, (strlen($liste) - 2));
                $enums = explode(',', $liste);
                if (sizeof($enums) > 0)
                {
                     if($this->read !="" or $this->Hidden=="hidden"){ $disabled="disabled";$visible="style='visibility:hidden'";}
                    if($this->read =="" or $this->Hidden!="hidden")echo "\n<td>";
               echo "<select name='$campo' $OpcionExtra  $disabled $visible onKeyPress='return tabulador(this.form,this,event);'>";
                    echo "\n<option></option>";
                    for ($i = 0; $i < sizeof($enums); $i++)
                    {
                        $elem = trim(strtr($enums[$i], "'", " "));
                        if (trim($elem) == trim($valor))
                            $seleccionar = "selected";
                        else
                            $seleccionar = "";
                        echo "\n<option $seleccionar value='".$elem."'>".$elem."</option>";
                    }
                    echo "\n</select>";
                }
            }
        }
       if($this->read =="" or $this->Hidden!="hidden") echo "\n</td></tr>";
    }
    //Inicia la transaccion
    function initransaccion(){
      $this->query("begin");
      $this->mysql_err = 0 ;
      $this->transaccion = 1 ;
   }
   //acepta la transaccion
    function aceptransaccion(){
      $this->query("commit");
      $this->transaccion = 0 ;
   }
   //destruye la transaccion
    function destransaccion(){
      $this->query("rollback");
      $this->transaccion = 0 ;
      $this->alerta("No se completo la operacion");
   }
   // busca las tablas relacionadas con la actual
   function relaciones($tablaO)
   {
      if ($tablaO == "") return;
        $arraytablas[] = "";
        $ocurrencias=$numtabla = 0;
        //recorrer todas las tablas
        $sql = " SHOW TABLES ";
        $listatablas = $this->query($sql);
        while ($filastablas = mysql_fetch_array($listatablas))
        {
            if ($filastablas[0] == $tablaO)
                continue;
            //recorrer los campos de cada tabla
            $sql = "SHOW FIELDS FROM ".$filastablas[0];
            $listacampos = $this->query($sql);
            while ($filascampos = mysql_fetch_array($listacampos))
            {
                  foreach($this->campollave as $campo)
                   if ($filascampos[0] == $campo){
                  $ocurrencias++;
               }
            }
            //si la tabla contiene todos los campos llaves proporcionados
         if($ocurrencias == $numcampos = count($this->campollave)) {
            $arraytablas[++$numtabla] = $filastablas[0];
         }
         $ocurrencias = 0;

        }
        return $arraytablas;
    }
    //actualiza  todas las tablas que tienen el mismo campo
    function     actRelaciones($tablas, $campos)
    {
        foreach ($tablas as $indice => $tabla)
        {
            if ($tabla != ""){
               $sql = " UPDATE $tabla SET ";
            foreach($campos as $nombre => $valor){
               $sql .= " $nombre = '$valor' ,";
            }
            $sql = "$sql<";
            $sql = str_replace(",<","",$sql);
            $sql .= " WHERE  ";
            foreach($this->campollave as $campo){
               $sql .= "  $campo = '".$_SESSION[$campo]."' AND";
            }
            $sql = "$sql<";
               $sql = str_replace("AND<","",$sql);
               $this->query($sql);
         }
        }
    }
    //busca antes de eliminar
    function busRelaciones($tablaO,$tablas, $campos)
    {
      if($tabla !="none")
        foreach ($tablas as $indice => $tabla)
        {
            if($tablaO == $tabla)continue;
            if ($tabla != "")
         {
            $sql="SELECT * FROM $tabla where";
            foreach($campos as $campo => $valor){
               if(!is_numeric($campo))
                  $sql .= " $campo = '".trim($valor)."' AND";
            }
            $sql = "$sql<";
            $sql = str_replace("AND<","",$sql);
            //$this->alerta($sql);
               $resultados = $this->query($sql);
               if($row = mysql_fetch_array($resultados)){
                     $this->alerta("Existe relacion en ".$this->comentarioTabla($tabla));
                     return true;
               }
            }
      }
       return false;
    }
    //Extrae el valor de (los) campo (s) llave(s) de partir de una cadena url proporcinada
    function extraervalor($url){
      //$this->alerta($url);
      $url=explode("AND",$url);
      $arrayllaves[]="";
      foreach($url as $var){
         $var="-$var";
         foreach($this->campollave as $campo){
            if($campo!="")
            $encontrado=strpos(trim($var),trim($campo));
         if($encontrado !== false){
            $var = strstr($var,"=");
            $caracter = array("'","=");
            $arrayllaves[$campo]=str_replace($caracter,"",$var);
         // $this->alerta($arrayllaves[$campo].$campo);

         }
      }
     }

     return $arrayllaves;
    }
    //crea la consulta INSERT INTO a partir de la variable $_POST
    function crearInsert($_POST,$HTTP_POST_FILES)
    {
        $result = $this->query($this->sql);
        $tabla = $this->nombreTabla($result, 0);
        $numelementos = count($_POST);
        $contador = 0;
         //obtener imagen
         if(isset($HTTP_POST_FILES)){
             foreach($HTTP_POST_FILES  as $indice => $campImg)
             if($indice!="" and $HTTP_POST_FILES[$indice]['tmp_name'] !="") {//image/jpeg
                  //mensaje($HTTP_POST_FILES[$indice]['tmp_name']);
                  $nombre_archivo=$HTTP_POST_FILES["foto"]["name"];
                  $tipo_archivo=$HTTP_POST_FILES[$indice]["type"];
                  $tamanio_archivo=$HTTP_POST_FILES[$indice]["size"];
               // mensaje($nombre_archivo);
               // mensaje($tipo_archivo);
               // mensaje($tamanio_archivo);

                  if($HTTP_POST_FILES[$indice]["type"] != "image/jpeg" and $HTTP_POST_FILES[$indice]["type"] != "image/pjpeg"){
                     mensaje("Las imagenes deben ser JPG");
                     return;
                  }
                  if($HTTP_POST_FILES[$indice]["size"] >102400){
                     mensaje("Las imagenes deben ser menores de 100 kb");
                     return;
                  }

                 $imagen = mysql_escape_string(join(@file($HTTP_POST_FILES[$indice]['tmp_name'])));
                 $indiceImg= $indice;
              }
         }
        $sql = "INSERT INTO $tabla (\n";
        foreach ($_POST as $indice => $valor)
        {
            if ($valor == "Insertar" or $valor == "Modificar")
                continue;
            if ($contador++ == $numelementos - 2)
                $sql .= "\t$indice\n";
            else
                $sql .= "\t$indice,\n";
        }
         //Si selecciono una imagen agregarla al update
         if(isset($indiceImg) and isset($imagen)){
            $sql .= "\t, $indiceImg \n";
         }
        $sql .= " ) VALUES (\n";
        $contador = 0;
        foreach ($_POST as $indice => $valor)
        {
            if ($valor == "Insertar" or $valor == "Modificar")
                continue;
            if ($contador++ == $numelementos - 2)
                $sql .= "\t'$valor'\n";
            else
                $sql .= "\t'$valor',\n";
        }
         //Si selecciono una imagen agregarla al update
         if(isset($indiceImg) and isset($imagen)){
            $sql .= "\t, '$imagen' \n";
         }
        $sql .= ")";
        $this->query($sql);
        location($PHP_SELF."?operacion=a");
    }
    //crea la consulta UPDATE a partir de la variable $_POST
    function crearUpdate($condicion, $_POST , $HTTP_POST_FILES )
    {

        $result = $this->query($this->sql);
        $tabla = $this->nombreTabla($result, 0);
        $numelementos = count($_POST);
        $contador = 0;
         //obtener imagen
         if(isset($HTTP_POST_FILES)){
             foreach($HTTP_POST_FILES  as $indice => $campImg)
                if($indice!="" and $HTTP_POST_FILES[$indice]['tmp_name'] !=""){
                  //checar que solo sea del tipo JPG y menor de 100 kb
                  $tipo_archivo=$HTTP_POST_FILES[$indice]["type"];
                  $tamanio_archivo=$HTTP_POST_FILES[$indice]["size"];
                  if($HTTP_POST_FILES[$indice]["type"] != "image/jpeg" and $HTTP_POST_FILES[$indice]["type"] != "image/pjpeg"){
                     mensaje("Las imagenes deben ser JPG");
                     return;
                  }
                  if($HTTP_POST_FILES[$indice]["size"] >102400){
                     mensaje("Las imagenes deben ser menores de 100 kb");
                     return;
                  }
                    $imagen = mysql_escape_string(join(@file($HTTP_POST_FILES[$indice]['tmp_name'])));
                  }
                 $indiceImg= $indice;
         }
        $sql = "UPDATE $tabla SET \n";
        foreach ($_POST as $indice => $valor)
        {
            foreach($this->campollave as $campollave)
               if ($indice == $campollave)
                   $valorcampollave[$campollave] = $valor;
            if ($valor == "Insertar" or $valor == "Modificar")
                continue;
            if (++$contador == $numelementos - 1)
                $sql .= "\t$indice='$valor'\n";
            else
                $sql .= "\t$indice='$valor',\n";
        }
        //Si selecciono una imagen agregarla al update
         if(isset($indiceImg) and isset($imagen)){
            $sql .= "\t, $indiceImg='$imagen'\n";
         }
        $sql .= "WHERE  $condicion";
        $this->initransaccion();
        if (isset($this->campollave) and $this->campollave != "" and $this->query($sql))
        {
            //si no se especifican las tablas relacionadas, buscarlas
            if (!$this->tablasrelaciones and $this->tablasrelaciones[0]!="none"){
               $tablas = $this->relaciones($tabla);
            }
            else
               $tablas = $this->tablasrelaciones;
           if ($tablas and $this->tablasrelaciones[0]!="none")
                $this->actRelaciones($tablas, $valorcampollave);
        }
      if ( $this->mysql_err == 0 and $this->transaccion==1)
            $this->aceptransaccion();
        else if ( $this->mysql_err==1 and $this->transaccion==1)
            $this->destransaccion();
    }

    //crea la consulta DELETE a partir de la variable $_POST
    function crearDelete($condicion)
    {
    //   mensaje($condicion);
        $result = $this->query($this->sql);
        $tabla = $this->nombreTabla($result, 0);
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
            if($this->mysql_err){
               $this->destransaccion();
               return 0;
             }
            else{
               $this->aceptransaccion();
               return 1;
             }
        }
    }

    //verifica si alguna equiteta input debe tener valor predeterminado al insertar
    function valorCampo($nombreCampo)
    {
        if ($this->val != "")
        {
            foreach ($this->val as $indice => $valor)
            {
                if ($nombreCampo == $indice)
                {
                    return $valor;
                    break;
                }
            }
        }
    }
    //cambia caracteres
    function limpiar($cadena)
    {
        $cadena = str_replace("_", " ", $cadena);//alt + 15
        $cadena = str_replace("|", "=", $cadena);//alt + 10
        return $cadena = str_replace("*", "'", $cadena);//alt + 16
    }
    //cifrar el url
    function cifrar($array, $result)
    {
        $cadCifrar = "";
        $prefijo = "Sql=";
        foreach ($array as $indice => $valor)
        {
            if (is_numeric($indice))
            {
                $bandera = $this->banderas($result, $indice);
                $this->llave($bandera);
            }
            if ($this->llave($bandera) and !is_numeric($indice))
            {
                //$cadCifrar .= "_$indice|*$valor*_AND";
            }
        }
         if($cadCifrar == "" ){//OR $this->campollave !=""
           foreach ($array as $indice => $valor){
              foreach ($this->campollave as  $campo){
                 if ($campo==$indice and !is_numeric($indice)){
                      $cadCifrar .= "_$indice|*$valor*_AND";
                  }
              }
            }
         }
        // mensaje($cadCifrar);
        $cadCifrar .= "<";
        $cadCifrar = str_replace("AND<", "", $cadCifrar);
        //mensaje($cadCifrar);
        //cifrar el contenido
        $cadCifrar = encrypt($cadCifrar, 0);
        return $prefijo.$cadCifrar;
    }
    //crea un SELECT * FROM tabla, para crear el formulario
    function seleccionartodo($sql){
       //   echo "<br><br>Consulta :$sql<br><br>";
         if(strpos($sql,"inner")!==false or strpos($sql,"INNER")!==false ){
            $result = $this->query($sql);
            $nuevosql = "SELECT * FROM ".$this->nombreTabla($result,0);
      }
      else if(strpos($sql,"*")===false and $this->ordenarForm()==true){
         $nuevosql = $sql;
      }
      else{
        $consulta = strstr($sql,"FROM");
        $nuevosql = "SELECT * $consulta";
      }
        return $nuevosql;
    }
    //Asigna los campos tipo Hidden
    function fcampoHidden($Campos=""){
      $this->hidden=$Campos;
    }
    //Devuelve true si el campo es oculto
    function fhidden($Campo){
       if($this->hidden!=""){
         foreach($this->hidden as $campo){
            if($Campo==$campo){
               return true;
            }
         }
      }
      else
         return false;
    }
    //Carga codigo de javascript en una variable
    function jsCodeCharge($Code,$TypeCode){
      if($Code!="")$this->Code = $Code ;
      if($TypeCode!="")$this->TypeCode = $TypeCode ;
   }
    //inserta codigo de javascript al final del formulario
    function jsCodeEndOfForm(){
      if($this->Code!="" and $this->TypeCode=="codigo"){
         echo "<script language='javascript'>";
         echo $this->Code;
         echo "</script>";
      }
      else if($this->Code!="" and $this->TypeCode=="archivo"){
         $file = fopen($this->Code);
         echo "<script language='javascript'>\n";
         while($line = fgets($file))
            echo "$line\n";
         echo "</script>\n";
      }


   }
   #asigna true si se debe ordenar por sql
   function ordenarXsql($ordenarFormxSQL=false){
      $this->ordenarFormxSQL = $ordenarFormxSQL;
   }
   #devuelve true si se debe ordenar x sql el formulario
   function ordenarForm(){
      return $this->ordenarFormxSQL;
   }
    //Crea el formulario
    function CreaFormulario($Filtro = "")
    {

        if ($Filtro != "")
            $sql = $Filtro;
        else
            $sql = $this->sql;

        $sql = $this->seleccionartodo($sql);//seleccionar todos los campos o los definidos por el usuario

        $result = $this->query($sql);
        $row = mysql_fetch_array($result);
        $fields = mysql_num_fields($result);
        $table = $this->nombreTabla($result, 0);
        echo "\n<center>\n<form name ='$table' enctype='multipart/form-data' action='$_SERVER[PHP_SELF]'  method='POST'>";
       // echo "\n<table >\n<caption><center><font size='1.5'>".$this->comentarioTabla($this->nombreTabla($result, 0))."</font></center></caption>";
        echo "\n<table>";
        echo "\n<tr>\n<td colspan=2 bgcolor='#CCCEEE'>\n<center>\n";
        echo $this->comentarioTabla($this->nombreTabla($result, 0));
        echo "\n</center>\n</td>\n</tr>\n";
         $focus = false ;
        for ($i = 0; $i < $fields ; $i++)
        {
            //$this->alerta($this->nombreTabla($result, $i)!=$table);
            $tipo = $this->tipoCampo($result, $i);//Tipo de campo

            $nombre = $this->nombreCampo($result, $i);//Nombre de Campo
            $long = $this->longCampo($result, $i);//Longitud dle Campo
            $flags = $this->banderas($result, $i);//Banderas del Campo
            $comment = $this->comentario($nombre, $table);//Comentarios del Campo
            $esEnum = $this->tipoEnum($comment);//es campo select ?
            $comment = str_replace("/*", "", $comment);
            //si el comentario es nulo, porner como comentario el nombre de campo
            if($comment == "" )$comment = $nombre;
            //$this->alerta($flags);
            //$this->read = $this->mostrarCampo($nombre) ? "":"readonly";
            //dice si el campo es de solo lectura
            $this->read = $this->bloquearCampo($nombre) ? "":"readonly";
            //dice si el campo es oculto
            $this->Hidden = $this->fhidden($nombre) ? "hidden":"";
            if($this->read =="" and $this->Hidden=="" and $focus==false){
               $focus=true;
               $setFocusOn = $nombre;
            }
            //poner valor por defecto en el formulario
            if ($Filtro == "" and  $this->val != "")// $Filtro == "" and
            {
                $row[$i] = $this->valorCampo($nombre);
            }
           // $this->alerta("tipo: ".$tipo);
            //salvar valor del (los) campo (s) llave (s)
            foreach($this->campollave as $nom)
               if ($nom == $nombre)
                  $_SESSION[$nom] = $row[$i];

            //$this->alerta($nombre." - ".$tipo." - ".$flags);
            //or strpos($flags, "set")
            if($this->arrayOpciones!="")
            foreach($this->arrayOpciones as $campo => $opcion){
                  if($campo == $nombre){
                     $OpcionExtra = $opcion;
                     break;
                  }
                  else
                     $OpcionExtra = "";
            }
            //mensaje("$nombre - $tipo");
            //segun tipo de campo, tipo de etiqueta
           //  CampoHora($Nombre, $Tamanyo, $Comentario, $valor = "",$OpcionExtra="")
            if (strpos(strtoupper($nombre),strtoupper("hora"))!==false){ # Text tipo Hora
                 $this->CampoHora($nombre, $long, $comment, $row[$i],$OpcionExtra);
            }  #  select
            else if (strpos($flags, "set")!==false  and !$esEnum ){
                 $this->CampoSet(mysql_field_table($result, $i), $nombre, $comment, $row[$i],$OpcionExtra);
            }  #  fecha
            else if ($tipo == "date" and !$esEnum ){
                $this->CreaTextoFecha($nombre, $long, $comment, $row[$i],$OpcionExtra);
            }
            else if ($tipo == "string" and strpos(strtoupper($nombre),strtoupper("Password"))!==false ){
                $this->CreaTextoPasswd($nombre, $long, $comment, $row[$i],$OpcionExtra);
            }  # Select de Color
            else if (strpos(strtoupper($nombre),strtoupper("Color"))!==false and strpos(strtoupper($flags),strtoupper("enum"))===false and !$esEnum){
                $this->CreaSelectColor($nombre, $comment, $row[$i],$OpcionExtra);
            }  #Solo Numeros
            else if (($tipo == "int" or $tipo == "real") and !$esEnum){

                $this->CreaTextoNumerico($nombre, $long, $comment, $row[$i],$OpcionExtra);
            }  #texto Normal
            else if (strpos(strtoupper($nombre),strtoupper("Imagen"))===false and strpos(strtoupper($flags),strtoupper("enum"))===false and !$esEnum){

               $this->CreaTexto($nombre, $long, $comment, $row[$i],$OpcionExtra);
            }
            /*else if (strpos($nombre, "imagen") and !$esEnum and $tipo!="blob")
                $this->CreaImagenRuta($nombre, $comment);*/
                # Campo para seleccionar imagen
            else if (strpos(strtoupper($nombre),strtoupper("Imagen"))!==false and !$esEnum and $tipo=="blob"){
                $this->CreaImagen($nombre, $comment,$OpcionExtra);
            }# select de campo enum
            else if (strpos(strtoupper($flags),strtoupper("enum")) !==false ){
                 $this->CampoEnum(mysql_field_table($result, $i), $nombre, $comment, $row[$i],$OpcionExtra);
            }
            else if ($esEnum)
            {
               $Val = $row[$i];
               $CreoSelect = false;
               if ($this->selectPersonalizado != "")
                  foreach ($this->selectPersonalizado as $indice => $contSql)
                  {

                     if ($indice == $nombre and $contSql != "")
                     {
                        if (!isset($Filtro) or $Filtro == "")
                           $row[$i] = "";
                          $this->CreaSelect($nombre, $contSql, $comment, $Val,$OpcionExtra);
                        $CreoSelect = true;
                        break;
                    }
                  }
               if ($this->select != "" and $CreoSelect !=true)
                  foreach ($this->select as $indice => $contSql)
                  {
                     if ($indice == $nombre and $contSql != "")
                     {
                        if (!isset($Filtro) or $Filtro == "")
                           $row[$i] = "";
                        $this->CreaSelect($nombre, $contSql, $comment, $Val,$OpcionExtra);
                        $CreoSelect = true;
                        break;
                     }
                  }
               if (!$CreoSelect)
               {
                  mensaje("$nombre - $tipo");
                  $this->CreaTexto($nombre, $long, $comment, $Val,$OpcionExtra);
               }
            }
        }
        echo "\n</table>
            \n<input type='submit' value='".$_SESSION['sOperacion']."' name='aceptar'>
            \n<input type='submit' name='Cancelar' value='Cancelar' >
            \n</form>
            \n</center>";
         #seleccionar el primer elemento del formularios  y poner el cursor en el
         echo "<script language='javascript'>\n
               try{\n
                  document.$table.$setFocusOn.select(); \n
                  document.$table.$setFocusOn.focus();\n
               }catch(error){}
            </script>\n";
      $this->jsCodeEndOfForm();
        mysql_free_result($result);
        exit();
    }
   //paginador de consultas
   /******************************************************/
   /* Funcion paginar
    * actual:          Pagina actual
    * total:           Total de registros
    * por_pagina:      Registros por pagina
    * enlace:          Texto del enlace
    * Devuelve un texto que representa la paginacion
    */
   function paginar($actual, $total, $por_pagina, $enlace) {
     $_SESSION['pagActual']=$actual;
     $total_paginas = ceil($total/$por_pagina);
     $anterior = $actual - 1;
     $posterior = $actual + 1;
     if ($actual>1)
       $texto .= "<a href=\"$enlace$anterior\">&laquo;</a> ";
     else
       $texto .= "<b>&laquo;</b> ";
     for ($i=1; $i<$actual; $i++)
       $texto .= "<a href=\"$enlace$i\">$i</a> ";
     $texto .= "<b>$actual</b> ";
     for ($i=$actual+1; $i<=$total_paginas; $i++)
       $texto .= "<a href=\"$enlace$i\">$i</a> ";
     if ($actual<$total_paginas)
       $texto .= "<a href=\"$enlace$posterior\">&raquo;</a>";
     else
       $texto .= "<b>&raquo;</b>";

     echo "\n<br><br>".$texto."\n<br><br>";
   }

    //cuenta el numero de filas resultantes
    function contarfilas($sql){
        //$corte = strstr($sql,"FROM");
        if($sql == "")return;
        $condiciones = explode("from",strtolower($sql));
        $nuevosql = "SELECT COUNT(*) FROM ".($condiciones[count($condiciones)-1]);
        //$this->alerta($nuevosql);
        $result=$this->query($nuevosql);
        list($total)=mysql_fetch_row($result);
        return $total;
    }
    /*
    #poner porcentaje total para la grafica
    function ponerValoresGrafica($camposxciento){
      $this->camposxciento = $camposxciento;
   }
   #Crear la Grafica
   function crearGrafica($Campo,$Value){
      foreach($this->camposxciento as $campo => $cienxciento){
         if($campo == $Campo){
            if(is_numeric($cienxciento)){
               $tamGrafica = ($Value*100)/$cienxciento;
            }
            else{
               $result = mysql_query($cienxciento);
            }
         }
      }
   }*/
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
            echo "\n<th scope='col' ><a href='http://Intel-Code.com.mx' title='Ordenar Por: $des' onClick=\"window.location='?order=$campo'; return false\">$des</a></th>";
        }
        echo " \n</tr>
            \n</thead>
            \n<tbody>";
        while ($row = mysql_fetch_array($result))
        {
            $filtro = $this->cifrar($row, $result);
            echo "\n<tr>";
            if($this->edit==1)
            echo "\n<td class='CrearReporte'>
               \n<a title = 'Modificar Registro ' href='http://Intel-Code.com.mx' onClick=\"window.location.href='$_SERVER[PHP_SELF]?operacion=m&$filtro'; return false;\">
               \n<img src='".$this->PathImages."editar.png' width=11></a></td>";
            if($this->delete==1)//'href='$_SERVER[PHP_SELF]?operacion=b&$filtro'
            echo "\n<td class='CrearReporte'  >
               \n<a title = 'Eliminar el  Registro'  href='http://Intel-Code.com.mx'
               onClick=\" if( confirm('Realmente Desea Eliminar el Registro?') ){ window.location.href='$_SERVER[PHP_SELF]?operacion=b&$filtro' };return false;\" >
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
                                 AND $this->tipoCampo($result, $i)=="real"
                               AND strpos(strtolower($this->nombreCampo($result, $i)), strtolower("ponderado"))===false){
                   $row[$i] = number_format($row[$i], 4, '.', ',');
                   echo "\n<td class ='derecha'>$ ".$row[$i]."</td>";
                 }
                else if( strpos($this->tipoCampo($result, $i),"real")!==false AND strpos(strtolower($this->nombreCampo($result, $i)), strtolower("ponderado"))===false){
                   $row[$i] = number_format($row[$i], 4, '.', ',');
                   echo "\n<td class ='derecha'> ".$row[$i]."</td>";
                }
                else if(strpos(strtolower($this->nombreCampo($result, $i)), strtolower("sWbs"))!==false){//sangrar segu nivel sWbs
                   $nivel = explode(".", $row[$i]);
                   $numnivel = count ($nivel);
                   $espacios = ($numnivel-1) * 4;
                   $tam = strlen($row[$i]);
                   $row[$i] = str_pad($row[$i], $espacios+$tam, " ", STR_PAD_LEFT); //alt + 255 ->caracter en blanco
                   echo "\n<td>".$row[$i]."</td>";
                }
                else if(strpos(strtolower($this->nombreCampo($result, $i)), strtolower("ponderado"))!==false){//formato de porcentaje
                   echo "\n<td class ='derecha'>".$row[$i]." %</td>";
                }
                else if(strpos(strtolower($this->nombreCampo($result, $i)), strtolower("fecha"))!==false){//formato de fecha
                   echo "\n<td>".formatoFecha($row[$i])."</td>";
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
