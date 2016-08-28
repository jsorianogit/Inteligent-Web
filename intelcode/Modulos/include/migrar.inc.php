<?php
/*
Archivo de Clase
Descripcion:
   migra la informacion de una base de datos a otra.

Proceso:
   A partor de dos bases de datos proporcionadas como parametros, 
   se buscan tablas con el mismo nombe en ambas, y campos con mismos nombres 
   en las tablas, haciendo la transferencia si se cumplen ambas condiciones.
   
   las transferencias se hacen contransacciones en tablas InnoDB, asi que el mas minimo
   error, provocara un rollback en todas las operaciones.

limitaciones:
  -No deben existir campos llaves con mismos valores en ambas base de datos, ya que no
   se hace comprobacion de ello, el resultado sera que la operacion no se realizara en lo 
   minimo
  -No se hacen verificaciones de tipos de campos.
  -No se hacen verificaciones de Tamaños de Campos.
  -no se hacen update automaticos on exist
*/
require ("reporteador.inc.php");
class migrar extends reporte {
   var $dbFuente;   //base de datos Fuente
   var $dbDestino;      //base de datos destino
   var $rsTablasFuente;   //Record de bd Fuente        (de tablas)
   var $rsTablasDestino;      //Record de bd destino           (de tabla)
   var $rowTablasFuente;  //Filas de la bd Fuente      (de tablas)
   var $rowTablasDestino;     //Filas de la bd Destino         (de tablas)
   var $rsCamposFuente;   //Record de bd Fuente        (de campos)
   var $rsCamposDestino;      //Record de bd destino           (de campos)
   var $rowCamposFuente;  //Filas de la bd Fuente      (de campos)
   var $rowCamposDestino;     //Filas de la bd Destino         (de campos)
   var $TablasFuente = array("");  //Tablas de la bd Fuente      (de campos)
   var $TablasDestino = array("");     //Tablas de la bd Destino         (de campos)
   var $dbServidorF;
   var $dbUsuarioF;
   var $dbContrasenaF;
   var $dbServidorD;
   var $dbUsuarioD;
   var $dbContrasenaD;
   
   //imprime mensaje en pagina
   function mensaje($mensaje){
       print("<p><br><center><h1>$mensaje</h1></center></p>");
   }
   //constructor por defecto   
   function migrar(){
      $this->dbFuente = "";
      $this->dbDestino = "";
   }
   //poner las base de datos
   function bases($Fuente,$servidorf,$usuariof,$contrasenaf,$Destino,$servidord,$usuariod,$contrasenad){
      $this->dbFuente = $Fuente;
      $this->dbServidorF = $servidorf;
      $this->dbUsuarioF = $usuariof;
      $this->dbContrasenaF = $contrasenaf;
      
      $this->dbDestino = $Destino;
      $this->dbServidorD = $servidord;
      $this->dbUsuarioD = $usuariod;
      $this->dbContrasenaD = $contrasenad;
   }
   //extrae las tablas de una base de datos
   function extraerTablas($db,$dbserver,$dbuser,$dbpassword){
//		echo $db."<br>".$dbserver."<br>".$dbuser."<br>".$dbpassword;
			
   	  $enlace = mysql_connect($dbserver,$dbuser,$dbpassword);
   	  mysql_select_db($db);
      return mysql_query("show tables from $db",$enlace);
      mysql_close($enlace);
   }
   //extrae los campos de una tabla
   function extraerCampo($table,$db,$dbserver,$dbuser,$dbpassword){
   	  $enlace = mysql_connect($dbserver,$dbuser,$dbpassword);
   	  mysql_select_db($db);
   	  return mysql_query("show fields from $db.$table",$enlace);
   	   mysql_close($enlace);
   }
   //descubre las tablas que son de mismo nombre
   function cmpTbl($tb1,$tb2){
       if(trim($tb1)==trim($tb2)){return true;}
       else {return false;}
   }
   //imprime un array
   function mostrarArray($array){
       if(isset($array))
       foreach($array as $indice => $valor){
         parent::ponerconsulta("select '$indice' as indice,'$valor' as valor from dual",3,'');
         parent::imprimir();
      }
   }
   //crear consulta select para obtener registros con campos de mismo nombre y sus valores
   //y la ejecuta
   function crearSelect($tablaFuente, $tablaDestino){
       $camposFuente = $this->extraerCampo($tablaFuente,$this->dbFuente,$this->dbServidorF,$this->dbUsuarioF,$this->dbContrasenaF);
       $camposDestino = $this->extraerCampo($tablaDestino,$this->dbDestino,$this->dbServidorD,$this->dbUsuarioD,$this->dbContrasenaD);
       $camposFa[]="";
       $camposDa[]="";
       $cont = 0;
       while ($rowF = mysql_fetch_array($camposFuente)){
          $camposFa[$cont]=$rowF[0];
          $cont++;
      }
      $cont = 0;
       while ($rowD = mysql_fetch_array($camposDestino)){
          $camposDa[$cont]=$rowD[0];
          $cont++;
      }
      $sqlSel ="SELECT ";
      $sqlIns ="INSERT INTO $this->dbDestino.$tablaDestino (";
      foreach($camposFa as $campoF){
         foreach($camposDa as $campoD){
            if($campoF == $campoD){
                $sqlSel .= " $this->dbFuente.$tablaFuente.$campoF ,";
                $sqlIns .= " $this->dbDestino.$tablaDestino.$campoD ,";
            }
         }
      }
      $sqlSel.="<";
      $sqlIns.="<";
      $sqlSel=str_replace(",<"," ",$sqlSel);
      $sqlIns=str_replace(",<"," ",$sqlIns);
      $sqlSel.=" FROM $this->dbFuente.$tablaFuente";
      $sqlIns.=" ) VALUES (";
      mysql_close();
      $enlace = mysql_connect($this->dbServidorF,$this->dbUsuarioF,$this->dbContrasenaF);
      mysql_select_db($this->dbFuente,$enlace);
      $result = mysql_query($sqlSel,$enlace);
      while($row = mysql_fetch_array($result)){
      	unset($columna);
      	unset($sql);
      	for($i=0;$i<mysql_num_fields($result);$i++){
      		//if(strpos($row[$i],'Image')){
      		if(mysql_field_type($result,$i)=="blob" and $row[$i]!=""){	
	      		$row[$i]= $this->ascii2hex($row[$i]);
				$columna.= "$row[$i],";
			}
			else{
				$row[$i] = str_replace("'","",$row[$i]);
				$columna.= "'$row[$i]',";
		
			}
		}
      	$columna.="<";
      	$columna=str_replace(",<"," ",$columna);
		echo "\n<br>".$sql =$sqlIns.$columna.")";
		$query = parent::query($sql);
		if(!$query){
			echo mysql_error();
			return 0;
		}
	  }
      return 1;
   }
   //ejecuta el proceso
   function ejecutar(){
      if($this->dbFuente=="" or $this->dbDestino==""){
          parent::alerta("Debe definir las bases de datos");
          $this->mensaje("<font color=red>Debe definir las bases de datos</font>");
          exit(0);
      }
      $this->mensaje("Espere alguna señal...");
      parent::initransaccion();
      //Extraer los nombres de tablas de ambas db

      $this->rsTablasFuente=$this->extraerTablas($this->dbFuente,$this->dbServidorF,$this->dbUsuarioF,$this->dbContrasenaF);
      $this->rsTablasDestino=$this->extraerTablas($this->dbDestino,$this->dbServidorD,$this->dbUsuarioD,$this->dbContrasenaD);
      //salir en caso de error, notificando el error
      if($this->mysql_err){
        parent::destransaccion();
        parent::alerta("Error en la obtencion de tablas");
        $this->mensaje("<font color=red>Error en la obtencion de tablas</font>");
        exit(0);  
      } 
      parent::aceptransaccion();
      //Guardar las tablas de la base de datos Fuente
      unset($this->TablasFuente);
      $cont = 0;
      while($this->rowTablasFuente = mysql_fetch_array($this->rsTablasFuente)){
         for($i=0 ; $i < mysql_num_fields($this->rsTablasFuente);$i++){
            $this->TablasFuente[$cont]=$this->rowTablasFuente[$i];
            
         }
         $cont ++;
      }
      //Guardar las tablas de la base de datos destino
      unset($this->TablasDestino);
      $cont = 0;
      while($this->rowTablasDestino = mysql_fetch_array($this->rsTablasDestino)){
         for($i=0 ; $i < mysql_num_fields($this->rsTablasDestino);$i++){
            $this->TablasDestino[$cont]=$this->rowTablasDestino[$i];
         }
         $cont ++;
      }
      //imprimir las tablas 
      //$this->mostrarArray($this->TablasFuente);
      //$this->mostrarArray($this->TablasDestino);

      //comienza la transferencia de datos
      $cont=$sumador=0;
      $consulta[]="";
      $i=0;
      parent::initransaccion();
      foreach($this->TablasFuente as $nomTablaC){
         foreach($this->TablasDestino as $nomTablaD){
            if($this->cmpTbl($nomTablaD,$nomTablaC)){
               $consulta = $this->crearSelect($nomTablaC, $nomTablaD);
               $i++;
               if($consulta==0){
                    parent::destransaccion();
                    parent::alerta("Error en las transferencias, se anula todo");
                    $this->mensaje("<font color=red>Error en las transferencias, se anula todo</font>");
                 exit(0);  
               }   
               break;
            }
            
         }
     }
     parent::aceptransaccion();
     $this->mensaje("Proceso Finalizo Correctamente");
   }
   function ascii2hex($ascii) {
   	  //convierte de ascii a hexadecimal	
      $hex = '0x';
      for ($i = 0; $i < strlen($ascii); $i++) {
         $byte = dechex(ord($ascii{$i}));
         $byte = str_repeat('0', 2 - strlen($byte)).$byte;
         $hex.=$byte;
      }
      return $hex;
   }
  	  //convierte de hexadecimal a ascii
   function hex2ascii($hex){
      $ascii='';
      $hex=str_replace(" ", "", $hex);
      for($i=0; $i<strlen($hex); $i=$i+2) {
         $ascii.=chr(hexdec(substr($hex, $i, 2)));
      }
   return($ascii);
   }
}
?>
