<?php
session_start();
require("reportediario.inc.php");
function turnoTierra(){
	global $sContrato,$_SESSION;
	$sql = "select sPrefijo from turnos where sContrato='$sContrato' and sIdTurno='".$_SESSION['ssIdTurno']."'
	  		and sOrigenTierra='Si'";
	if($rw =mysql_fetch_array(mysql_query($sql))){
		$sOrigenTierra='Si';	
	}
	else{
		$sOrigenTierra='No';
	}
	return $sOrigenTierra;
} 
?>
<html>
<head>
<script language="javascript">
   function enlace(){
      document.location="?1=1";
   }
</script>

<?php
   /*destruye algunas varibles*/
   function quitarValor(){
      global $_POST,$_REQUEST,$_SESSION;
      unset($_REQUEST);
      unset($_SESSION['accion']);
      //unset($_SESSION['sNumeroOrden']);
      unset($_SESSION['dIdFecha']);
      unset($_SESSION['sIdTu']);
      unset($_REQUEST['sNumeroOrden']);
      unset($_REQUEST['dIdFecha']);
      unset($_REQUEST['sIdTurno']);
      unset($_REQUEST['operacion']);
     $_REQUEST['sIdTurno']=$_REQUEST['dIdFecha']=NULL;//$_REQUEST['sNumeroOrden']
   }

   echo "\n<style type='text/css'>@import 'menu.css';</style>";
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script language='javascript' src='menu.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";

if(isset($_POST['sNumeroOrden']) )
   $sNumeroOrden=$_SESSION['sNumeroOrden']=$_POST['sNumeroOrden'];
else
   $sNumeroOrden=$_SESSION['sNumeroOrden'];

   $form = new reportediario();
  //Division Actual
   if(isset($_POST['Cancelar'])){
      $_SESSION['sOper']="";
   }
  if(isset($_REQUEST['division'])){
     $_SESSION['division']=$_REQUEST['division'];
  }
//Obtener reporte fotografico
if($HTTP_POST_FILES[$indice]['tmp_name'] !=""){ 
      $imagen = mysql_escape_string(join(@file($HTTP_POST_FILES[$indice]['tmp_name'])));
   }  
   
//Obtener reporte Diario
if(isset($_POST['fecha']) and isset($_POST['sIdTurno']) and
      isset($_POST['numeroFolio']) and isset($_POST['EstadoTiempo']) and 
         isset($_POST['horaInicio']) and isset($_POST['horaTermino']) and 
            isset($_POST['tema'])){
            $fecha=$_POST['fecha'];
            $sIdTurno=$_POST['sIdTurno'];
            $numeroFolio=$_POST['numeroFolio'];
            $EstadoTiempo=$_POST['EstadoTiempo'];
            $horaInicio=$_POST['horaInicio'];
            $horaTermino=$_POST['horaTermino'];
            $tema=$_POST['tema'];
            $Guardar=$_POST['Guardar'];
            $_SESSION['POST']="Si";
            $_REQUEST['operacion']="m";
            
}else if(isset($_REQUEST['sNumeroOrden']) and isset($_REQUEST['dIdFecha']) and isset($_REQUEST['sIdTurno'])){
   $sql = "SELECT sNumeroORden,dIdFecha,sIdTurno,sNumeroReporte,sTiempo,sInicioPlatica,sFinalPlatica,sTema, lStatus,sIdConvenio   FROM reportediario WHERE sContrato='$sContrato' AND sNumeroOrden='".$_REQUEST['sNumeroOrden']."' and dIdFecha='".$_REQUEST['dIdFecha']."' and sIdTurno='".$_REQUEST['sIdTurno']."'";
   $result = mysql_query($sql);
   if($row = mysql_fetch_array($result)){
      $fecha = $row['dIdFecha'];
      $sIdTurno = $row['sIdTurno'];
      $numeroFolio = $row['sNumeroReporte'];
      $EstadoTiempo = $row['sTiempo'];
      $horaInicio = $row['sInicioPlatica'];
      $horaTermino = $row['sFinalPlatica'];
      $tema = $row['sTema'];
      $_SESSION['accion']=$accion = "Modificar";
      if(isset($_REQUEST['sNumeroOrden']))$_SESSION['sNumeroOrden']=$_REQUEST['sNumeroOrden'];
      $_SESSION['dIdFecha']=$_REQUEST['dIdFecha'];
      $_SESSION['sIdTu']=$_REQUEST['sIdTurno'];
      $_SESSION['status'] = $row['lStatus'];
      $_SESSION['sNumreport'] = $row['sNumeroReporte'];
      $_SESSION['sIdConve'] = $row['sIdConvenio'];
       echo "<center><h3><font color='BLUE' >Modificando $numeroFolio</font></h3>  ";
   }
   unset($_REQUEST['sNumeroOrden']);
   $_REQUEST['sNumeroOrden']="";
   unset($_REQUEST['dIdFecha']);
   $_REQUEST['dIdFecha']="";
   unset($_REQUEST['sIdTurno']);
   $_REQUEST['sIdTurno']="";
}
/*obtener el filtro*/
if( isset($_REQUEST['Sql'])){
   $Filtro=encrypt($_REQUEST['Sql'],1);
   $_SESSION['sCondicion']=$Filtro=$form->limpiar($Filtro);
}

//Crear el Numero de Folio

if($numeroFolio=="" or strpos("FOLIO DUPLICADO",$numeroFolio)!==false or $sNumeroOrden!=$_SESSION['oldOrden']){
   $_SESSION['oldOrden']=$sNumeroOrden;
   if($sNumeroOrden == $sContrato){
		$sql = "select sPrefijo from turnos where sContrato='$sContrato' and sIdTurno='".$_SESSION['ssIdTurno']."'
				and sOrigenTierra='Si'";
		if($rw =mysql_fetch_array(mysql_query($sql))){
				$sOrigenTierra='Si';
				if($rw['sPrefijo']!="")$sFormato = $rw['sPrefijo']."-";
				$sql = "Select sFormato from configuracion where sContrato = '$sContrato'";
				if($rwsFormato =mysql_fetch_array(mysql_query($sql))){
					$sFormato=$rwsFormato['sFormato'].$sFormato; 
				}
				$sql = "Select iConsecutivoTierra from ordenesdetrabajo where sContrato ='$sContrato' and sNumeroOrden = '$sNumeroOrden'";
				if($rwiConsecutivoTierra =mysql_fetch_array(mysql_query($sql))){
					$iConsecutivo=$rwiConsecutivoTierra['iConsecutivoTierra']; 
				}				
		}	
		else{
			$sOrigenTierra='No';
      		$sql ="SELECT iConsecutivo,sFormato FROM configuracion where sContrato='$sContrato'  GROUP BY sContrato";
      		$result = mysql_query($sql);
      		if($row = mysql_fetch_array($result)){
      			$sFormato=$row['sFormato']; 
      			$iConsecutivo=$row['iConsecutivo'];
        	}	
      	}
   }
   else{
		$sql = "select sPrefijo from turnos where sContrato='$sContrato' and sIdTurno='".$_SESSION['ssIdTurno']."'
				and sOrigenTierra='Si'";
		if($rw=mysql_fetch_array(mysql_query($sql))){
			if($rw['sPrefijo']!="")$sFormato = $rw['sPrefijo']."-";
			$sOrigenTierra='Si';
		}				
		else{
			$sOrigenTierra='No';
		}   	 
   		$sql ="SELECT iConsecutivo, iConsecutivoTierra, sFormato FROM ordenesdetrabajo where sContrato='$sContrato' AND sNumeroOrden='$sNumeroOrden' GROUP BY sNumeroOrden";
	    $result = mysql_query($sql);
      	if($row = mysql_fetch_array($result)){
      		if($sOrigenTierra=='Si'){
				$iConsecutivo=$row['iConsecutivoTierra'];
			}
			else{
				$iConsecutivo=$row['iConsecutivo'];
			}
			$sFormato=$row['sFormato'];			      			 
	    }  
   }
	if(strlen($iConsecutivo)==1)
		$iConsecutivo="00$iConsecutivo";
	if(strlen($iConsecutivo)==2)
		$iConsecutivo="0$iConsecutivo";
	$numeroFolio = trim($sFormato).trim($iConsecutivo);
}

#........................................................
//lista de campos que permaneceran bloqueados en insert o update
$bloqueados =array("sContrato");

//lista de campos que no deben mostrarse en el grid
$ocultos =array("sContrato","sIdTurno","sIdConvenio");

//campos con los valores que deben contener en el formulario
//de insertar
$valdefaults = array("sContrato"=>$sContrato);

//lista de tablas relacionadas con la actual, para efectos de 
//update y delete
$tablasrelaciones = array ("bitacoradeactividades");

//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","dIdFecha","sNumeroOrden","sIdTurno");

//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
/*
 $sql="select 
 reportediario.sContrato,
 reportediario.dIdFecha,
 reportediario.sNumeroOrden,
 reportediario.sIdTurno,
 turnos.sDescripcion,
 convenios.sDescripcion,
 reportediario.sNumeroReporte,
 reportediario.lStatus,
 reportediario.sIdUsuario,
 reportediario.sIdUsuarioAutoriza
from reportediario inner join convenios on (reportediario.sContrato=convenios.sContrato and reportediario.sIdConvenio=convenios.sIdConvenio) 
inner join configuracion on (convenios.sContrato=configuracion.sContrato and convenios.sIdConvenio=configuracion.sIdConvenio) 
inner join turnos on (reportediario.sContrato=turnos.sContrato) where reportediario.sContrato ='$sContrato'";
*/

$sql="SELECT
 reportediario.sContrato,
 reportediario.sIdConvenio,
 reportediario.dIdFecha,
 reportediario.sNumeroOrden,
 reportediario.sIdTurno,
 turnos.sDescripcion,
 convenios.sDescripcion,
 reportediario.sNumeroReporte,
 reportediario.lStatus,
 reportediario.sIdUsuario,
 reportediario.sIdUsuarioAutoriza
FROM reportediario inner join convenios on (reportediario.sContrato=convenios.sContrato and reportediario.sIdConvenio=convenios.sIdConvenio)  
inner join turnos on (reportediario.sContrato=turnos.sContrato and turnos.sIdTurno=reportediario.sIdTurno) 
WHERE reportediario.sContrato ='$sContrato' AND reportediario.sNumeroOrden ='$sNumeroOrden' ORDER BY reportediario.dIdFecha DESC";

$mostrar=false;
$result=mysql_query($sql);
if($row = mysql_fetch_array($result)){ 
        $mostrar=true;
}


   
$form->formulario($sql,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);
/*$tablas = $form->relaciones("reportediario");
foreach($tablas as $tabla)
 echo "<br> $tabla";*/   
/*si se ha iniciado una nueva consulta, destruir la actual*/
if (!isset($_SESSION['sqlAnterior'])){
   $_SESSION['sqlAnterior']=$sql;
}
else if ($_SESSION['sqlAnterior'] != $sql){
   $_SESSION['sqlAnterior']=$sql;
   unset($_SESSION['OrdenarPor']);
   unset($_REQUEST);
   unset($_REQUEST);
   unset($_POST);
}




/*Validar Segun enlace seguido para Eliminar bitacora*/
if (isset($_REQUEST['operacion']) and $_SESSION['POST']!="Si"){

    switch($_REQUEST['operacion']){
      case ('a'):
          //crea el formulario para insertar
         $_SESSION['sOperacion']="Insertar";
         $form->CreaFormulario();
         break;
      case ('m'):
          //crea el formulario para modificar
         $_SESSION['sOperacion']="Modificar";
         echo $sqlFiltro;
         if($_SESSION['status']!="Autorizado"){
            $form->CreaFormulario($sqlFiltro);
         }
         else
            mensaje("El reporte ha sido Autorizado, por lo tanto no puede modificarse");
         break;
      case ('b'):
         //hace un delete segun link seguido
         //mensaje($_SESSION['sCondicion']);
         $ordenes = explode( "AND" ,$_SESSION['sCondicion']) ;
         $ordenE = explode("=" , $ordenes[2]);
         $orden = trim(str_replace("'","",$ordenE[1]));
         /*########################################*/
                  //leer la configuracion para comprar el ultimo folio
   		if($orden == $sContrato){
			$sql = "select sPrefijo from turnos where sContrato='$sContrato' and sIdTurno='".$_SESSION['ssIdTurno']."'
				and sOrigenTierra='Si'";
			if($rw =mysql_fetch_array(mysql_query($sql))){
				$sOrigenTierra='Si';
				if($rw['sPrefijo']!="")$sFormato = $rw['sPrefijo']."-";
				$sql = "Select sFormato from configuracion where sContrato = '$sContrato'";
				if($rwsFormato =mysql_fetch_array(mysql_query($sql))){
					$sFormato=$rwsFormato['sFormato'].$sFormato; 
				}
				$sql = "Select iConsecutivoTierra from ordenesdetrabajo where sContrato ='$sContrato' and sNumeroOrden = '$orden'";
				if($rwiConsecutivoTierra =mysql_fetch_array(mysql_query($sql))){
					$iConsecutivo=$rwiConsecutivoTierra['iConsecutivoTierra']-1; 
				}				
			}	
			else{
				$sOrigenTierra='No';
    	  		$sql ="SELECT iConsecutivo,sFormato FROM configuracion where sContrato='$sContrato'  GROUP BY sContrato";
      			$result = mysql_query($sql);
	      		if($row = mysql_fetch_array($result)){
    	  			$sFormato=$row['sFormato']; 
	      			$iConsecutivo=$row['iConsecutivo']-1;
	        	}	
	      	}
	    }
   		else{
			$sql = "select sPrefijo from turnos where sContrato='$sContrato' and sIdTurno='".$_SESSION['ssIdTurno']."'
					and sOrigenTierra='Si'";
			if($rw=mysql_fetch_array(mysql_query($sql))){
				if($rw['sPrefijo']!="")$sFormato = $rw['sPrefijo']."-";
				$sOrigenTierra='Si';
			}				
			else{
				$sOrigenTierra='No';
			}   	 
	   		$sql ="SELECT iConsecutivo, iConsecutivoTierra, sFormato FROM ordenesdetrabajo where sContrato='$sContrato' AND sNumeroOrden='$orden' GROUP BY sNumeroOrden";
		    $result = mysql_query($sql);
	      	if($row = mysql_fetch_array($result)){
	      		if($sOrigenTierra=='Si'){
					$iConsecutivo=$row['iConsecutivoTierra']-1;
				}
				else{
					$iConsecutivo=$row['iConsecutivo']-1;
				}
				$sFormato=$row['sFormato'];			      			 
		    }  
   		}
		if(strlen($iConsecutivo)==1)
			$iConsecutivo="00$iConsecutivo";
		if(strlen($iConsecutivo)==2)
			$iConsecutivo="0$iConsecutivo";
		$Folio = trim($sFormato).trim($iConsecutivo);
         
         /*########################################*/

  
         //Leer el ultimo numero de folio guardao
         //$sqlUltimo ="SELECT sNumeroReporte FROM reportediario where sContrato='$sContrato' AND sNumeroOrden='$orden'  ORDER BY dIdFecha DESC  limit 1 ";//$_SESSION['sCondicion']
         $sqlUltimo ="SELECT sNumeroReporte,lStatus FROM reportediario WHERE ".$_SESSION['sCondicion'];
         $resultUltimo = mysql_query($sqlUltimo);
         while($rowUltimo = mysql_fetch_array($resultUltimo)){
            $FolioAct = $rowUltimo[0];    
            $status = $rowUltimo[1];
         }
         if($status!="Autorizado" and $status!="Validado"){
               $FolioAct=trim($FolioAct); 

               
               $sqlC[0]="select * from bitacoradeactividades where ".$_SESSION['sCondicion'];
               $sqlC[1]="select * from bitacoradealcances where ".$_SESSION['sCondicion'];
               $sqlC[2]="select * from tramitedepermisos  where ".$_SESSION['sCondicion'];
               $sqlC[3]="select * from jornadasdiarias where ".$_SESSION['sCondicion'];
               $eliminarReporte = 'Si';
               for($ik = 0; $ik<=3;$ik++){
					$rsComprobar = mysql_query($sqlC[$ik]);
	 				if($rwc = mysql_fetch_array($rsComprobar)){
						$eliminarReporte='No';
						break;
					}
			   }
			   
			   if($eliminarReporte=='Si'){
               	$sqlUltimo ="SELECT sNumeroReporte FROM reportediario WHERE ".$_SESSION['sCondicion'];
               	$resultUltimo = mysql_query($sqlUltimo);
               	if($rowUltimo = mysql_fetch_array($resultUltimo)){
	                  mysql_query("DELETE FROM reportefotografico WHERE sContrato='$sContrato' AND sNumeroReporte='$FolioAct' ");
	                  //mensaje($_SESSION['sCondicion']);
	                  //derementar si ees el ultimo folio
	                  $FolioAct."  -  ".$Folio;
	                  if(trim($FolioAct) == trim($Folio)){
	                  	//	mensaje("$orden-$sContrato");
							if($orden  == $sContrato){
		  						if( turnoTierra()=='Si'){
									mysql_query("UPDATE ordenesdetrabajo Set iConsecutivoTierra = iConsecutivoTierra-1 Where sContrato = '$sContrato' And sNumeroOrden = '$orden' ");	
		  						}
		  						else{
									mysql_query("UPDATE configuracion  Set iConsecutivo = iConsecutivo-1 Where sContrato = '$sContrato'");		
		  						}
		  						if(mysql_error())mensaje("No se puedo Actualizar elConsecutivo");
	   						}
	   						else{
	   							if( turnoTierra()=='Si'){
									mysql_query("UPDATE ordenesdetrabajo Set iConsecutivoTierra = iConsecutivoTierra-1 Where sContrato = '$sContrato' And sNumeroOrden = '$orden' ");
								}
								else{
									mysql_query("UPDATE ordenesdetrabajo Set iConsecutivo = iConsecutivo-1 Where sContrato = '$sContrato' And sNumeroOrden = '$orden' ");
								}
	        					if(mysql_error())mensaje("No se puedo Actualizar el Consecutivo");
	   						}                  	
	                  }
	               }
	              $sql = "delete from avancesglobalesxorden where ".$_SESSION['sCondicion'];
	              mysql_query($sql);
    	           $form->crearDelete($_SESSION['sCondicion']);
	         }else{
				$msg = " bitacora de actividades ,"; 	
				$msg .= " bitacora de alcances ,";
				$msg .= " tramite de permisos   ,";
				$msg .= " jornadas diarias  ";
			 	mensaje("No se puede elimiar el reporte, existen registros en algunas de estas relaciones:".$msg);
			 }
	     }
         else
            mensaje("El reporte ha sido Autorizado, por lo tanto no puede modificarse");
         //exit();
         
         echo "<script language='javascript'>enlace();</script>";
         break;
   }
   $_REQUEST['operacion']="";
   unset($_REQUEST['operacion']);
   quitarValor();
   $_SESSION['sCondicion']="";
}
   $_SESSION['POST']="";
   
//recoge la pagina actual para el paginador
if(isset($_REQUEST['pag'])){
   $_SESSION['pagActualReporte']=$_REQUEST['pag'];
   $pagReporte=$_REQUEST['pag'];
}
elseif(isset($_SESSION['pagActualReporte']))
   $pagReporte=$_SESSION['pagActualReporte'];
elseif(!isset($pagReporte))
   $pagReporte=1;

#$_REQUEST['pag'] = 1;
//Recoge el campo para el ORDER BY (En esta Seccion no es Aplicable)
if(isset($_REQUEST['order'])){
   $_SESSION['OrdenarPor'] = $_REQUEST['order'];
}
unset($_SESSION['fecha']);
$_REQUEST['operacion']="";
unset($_REQUEST['operacion']);
$nombres = array("Fecha","Numero de Orden","Turno","Convenio","No. Reporte","Status","Creator","Autoriza");

?>
<!-- Numero de Orden -->
<center>
<form name='sNumeroOrden' action="<?php echo $PHP_SELF?>"  method="post">
<?php
$sql ="select o.sContrato,o.sIdTipoOrden,o.sNumeroOrden from ordenesdetrabajo o INNER JOIN configuracion c on(o.sContrato=c.sContrato AND o.sIdTipoOrden<>c.sOrdenExtraordinaria)  WHERE o.sContrato='$sContrato';";
//$sql ="select o.sContrato,o.sIdTipoOrden,o.sNumeroOrden from ordenesdetrabajo  o WHERE o.sContrato='$sContrato';";
$result = mysql_query($sql);
print ("Numero de Orden<select name='sNumeroOrden' onChange='document.sNumeroOrden.submit();'>");
print ("<option></option>");
while ($row=mysql_fetch_array($result)){
   $seleccionar = ($sNumeroOrden==$row['sNumeroOrden']) ?"selected":"";
   print ("<option $seleccionar >".$row['sNumeroOrden']."</option>");   
}
print ("</select>");
?>

</form>
<?php
if($sNumeroOrden!="" AND $mostrar)
   $form->visualizar($pagReporte,$_SESSION['OrdenarPor'],$nombres);
else
   echo "<font color='red'><b>Seleccion un Numero de Orden</b></font>";
#.......................................................
?>

<title>
</title>
</head>
<body>
<center>

</tr>
</table>
   <div id="menu">
   <ul>
      <li><a href="#?division=1"  onclick="viewSection('1','2');">Caratula del Reporte Diario</a></li> 
      <!-- <li><a href="#?division=2" onclick="viewSection('2','2');">Reporte Fotografico</a></li> --> 
   </ul>
</div>
               
<div id="contenido1"> 
   <!-- Formulario de Almacenamiento -->
   <table>
   <form name='salvar' action="<?php echo $PHP_SELF ?>" method="post">
   <tr>
      <td>
         Fecha
      </td>
      <td>
      <?php
         if($fecha==""){
            $sql ="SELECT MAX(dIdFecha) FROM reportediario WHERE sContrato='$sContrato' and sNumeroOrden='$sNumeroOrden' ";
            if($row = mysql_fetch_array($resul = mysql_query($sql)))
               $fecha = $row[0];
            if($fecha==""){
               $fecha=date("Y-m-d");
               }
            else{ 
               if (preg_match("/([0-9][0-9]){1,2}\/[0-9]{1,2}\/[0-9]{1,2}/",$fecha))
               list($ano,$mes,$dia)=split("/", $fecha);
               if (preg_match("/([0-9][0-9]){1,2}-[0-9]{1,2}-[0-9]{1,2}/",$fecha))
               list($ano,$mes,$dia)=split("-",$fecha);
               $nueva = mktime(0,0,0,$mes,$dia+1,$ano);// + $ndias * 24 * 60 * 60;
               $fecha=date("Y-m-d",$nueva);
            }
         
         }
         
      ?>
         <label for="fecha"><input class="fecha rang10" type="text" id="fecha" name="fecha" size="20" value="<?php echo $fecha;?>" onKeyPress='return NoComillas(this.form,this,event);'></label>
      </td>
      <td>
         Turno
      </td>
      <td>
         <?php
            $sql =" select sIdTurno,sDescripcion from turnos where sContrato='$sContrato'";
            $result = mysql_query($sql);
            print("<select name='sIdTurno' onKeyPress='return NoComillas(this.form,this,event);'>");
            while($row=mysql_fetch_array($result)){
               $seleccionar = ($_SESSION['ssIdTurno']==$row["sIdTurno"])?"selected":"";
               print("<option value='$row[0]' $seleccionar>$row[1]</option>");
            }
            print("</select>");
         ?>
      </td>
   </tr>
   <tr>
      <td>
         Numero de Folio
      </td>
      <td>
         <input type="text" name="numeroFolio" value="<?php echo $numeroFolio?>" onKeyPress='return NoComillas(this.form,this,event);'>
      </td>
      <td>
         Estado del Tiempo
      </td>
      <td>
         <input type="text" name="EstadoTiempo" value="<?php echo $EstadoTiempo?>" onKeyPress='return NoComillas(this.form,this,event);'  onKeyUp="document.salvar.EstadoTiempo.value=document.salvar.EstadoTiempo.value.toUpperCase();" >
      </td>
   </tr>
   <tr>
      <td>
         Platicas de Seguridad
      </td>
      <td>
         <?php
            $v1 = ($horaInicio=="")?"00:00":$horaInicio;
            $v2 = ($horaTermino=="")?"00:00":$horaTermino;
         ?>
         <input type="text" name="horaInicio" size="6" value ="<?php echo $v1 ?>" onKeyPress='return mascara(this.form,this,event);' > a
         <input type="text" name="horaTermino" size="6" value ="<?php echo $v2 ?>" onKeyPress='return mascara(this.form,this,event);' >
      </td>
      <td>
         Tema
      </td>
      <td>
         <input type="text" name="tema" value ="<?php echo $tema?>" onKeyPress='return NoComillas(this.form,this,event);' onKeyUp="document.salvar.tema.value=document.salvar.tema.value.toUpperCase();">
      </td>
   </tr>
      <tr>
      <td colspan="4">
         <center>
            <input type = "submit" name="Guardar" value="Guardar" >
         </center>
      </td>
   </tr>
   </table>
   </form>
 </div>
<div id="contenido2"> 
<script language="javascript">
   function fotografico(){
      ventana = window.open("reportefotografico.php?numeroFolio=<?php echo $numeroFolio ?>"," ",'width=800,height=600,scrollbars=yes,resizable=yes,status=0,toolbar=0');   
   //window.open('reportefotografico.php?numeroFolio=$numeroFolio',' ','width=800,height=600,scrollbars=yes,resizable=yes,status=0,toolbar=0');
   }
   </script>
   <?php    if($_SESSION['status']!="Autorizado"){ ?>
   <a alt="Inserta, Modifica o Borra Reporte Fotografico" href="javascript:fotografico();" >Operaciones</a>
   <?php
      }
     //$enlaces = array("iImagen"=>"index.php");
      //$titulos = array("Contrato","Fecha","Id","Turno","Numero de Orden","Wbs");
      $reporte = new reporte();
      $numeroFolio=trim($numeroFolio);
      $sql ="SELECT * FROM reportefotografico WHERE sContrato='$sContrato' AND sNumeroReporte='$numeroFolio'  ";
      $reporte->ponerconsulta($sql,1,$titulos,"Reporte Fotografico",$enlaces);
      $reporte->imprimir();
      
?>
 </div> 

<?php
//echo "<br>".$_POST['Guardar'];
 //reporte diario
//echo $sContrato."  -  ".$fecha."  -  oprden".$sNumeroOrden."  -  ".$numeroFolio."  -  ".$sIdTurno."  -  ".$EstadoTiempo."  -  ".$horaInicio."  -  ".$horaTermino."  -  ".$tema;
if(
   ($fecha=="" or  
         $sNumeroOrden=="" or  
            $numeroFolio=="" or  
               $sIdTurno=="" or  
                  $EstadoTiempo=="" or  
                     $horaInicio=="" or  
                        $horaTermino=="" or  
                           $tema=="" ) and $Guardar=="Guardar")
                                 {
                                    mensaje("Faltan Datos por LLenar");
                                 }
else if(isset($sContrato) and 
   isset($fecha) and 
      isset($sNumeroOrden) and 
            isset($numeroFolio) and 
               isset($sIdTurno) and 
                  isset($EstadoTiempo) and 
                     isset($horaInicio) and 
                        isset($horaTermino) and 
                           isset($tema) and
                              $_SESSION['accion']!="Modificar"){
 $sql = "SELECT sNumeroOrden FROM reportediario WHERE sContrato='$sContrato' AND sNumeroOrden='$sNumeroOrden' AND sNumeroReporte='$numeroFolio' ";
 $result = mysql_query($sql);
 if($row = mysql_fetch_array($result)){
    $numeroFolio = "FOLIO DUPLICADO";
 }
 $sql ="INSERT INTO reportediario (sContrato,dIdFecha,sNumeroOrden,sIdConvenio,sNumeroReporte,sIdTurno,sTiempo ,sInicioPlatica,sFinalPlatica,sTema,sIdUsuario ) VALUES ('$sContrato','$fecha','$sNumeroOrden','$sIdConvenioAct','$numeroFolio','$sIdTurno','$EstadoTiempo','$horaInicio','$horaTermino','$tema','".strtoupper($_SESSION['ssUsuario'])."')";
   mysql_query($sql);
   if(mysql_error()){
     mensaje(mysql_error());
     exit();
   }
   //incrementar iConsecutivo

if($sNumeroOrden  == $sContrato){
	  if( turnoTierra()=='Si'){
			mysql_query("UPDATE ordenesdetrabajo Set iConsecutivoTierra = iConsecutivoTierra+1 Where sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden'");	
	  }
	  else{
			mysql_query("UPDATE configuracion  Set iConsecutivo = iConsecutivo+1 Where sContrato = '$sContrato'");		
	  }
	  if(mysql_error())mensaje("No se puedo Actualizar elConsecutivo");
   }
   else{
   		if( turnoTierra()=='Si'){
			mysql_query("UPDATE ordenesdetrabajo Set iConsecutivoTierra = iConsecutivoTierra+1 Where sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden'");
		}
		else{
			mysql_query("UPDATE ordenesdetrabajo Set iConsecutivo = iConsecutivo+1 Where sContrato = '$sContrato' And sNumeroOrden = '$sNumeroOrden'");
		}
        if(mysql_error())mensaje("No se puedo Actualizar el Consecutivo");
   }

   //limpiar formulario
   echo "<script language='javascript'>document.salvar.fecha.value='';</script>";
   echo "<script language='javascript'>document.salvar.numeroFolio.value='';</script>";
   echo "<script language='javascript'>document.salvar.estadoTiempo.value='';</script>";
   quitarValor();
   echo "<script language='javascript'>document.salvar.tema.value='';</script>";
   echo "<script language='javascript'>enlace();</script>";
   //Guardar el reporte fotografico
}//Guardar Modificacion de un reporte diario
else if(isset($sContrato) and 
   isset($fecha) and 
      isset($sNumeroOrden) and 
            isset($numeroFolio) and
               isset($sIdTurno) and 
                  isset($EstadoTiempo) and 
                     isset($horaInicio) and 
                        isset($horaTermino) and 
                           isset($tema) and
                              $_SESSION['accion']=="Modificar" and
                                 $Guardar=="Guardar"){
   if($_SESSION['status']!="Autorizado"){

      //update reportediario
         $sql ="UPDATE reportediario
               SET
                  sContrato='$sContrato',
                  dIdFecha='$fecha',
                  sNumeroOrden='$sNumeroOrden',
                  sIdConvenio='$sIdConvenioAct',
                  sNumeroReporte='$numeroFolio',
                  sIdTurno='$sIdTurno',
                  sTiempo='$EstadoTiempo',
                  sInicioPlatica='$horaInicio',
                  sFinalPlatica='$horaTermino',
                  sTema='$tema'
               WHERE
                  sContrato = '$sContrato'
                  and sNumeroOrden='".$_SESSION['sNumeroOrden']."'
                  and dIdFecha='".$_SESSION['dIdFecha']."'
                  and sIdTurno='".$_SESSION['sIdTu']."'
                  and sIdConvenio='".$_SESSION['sIdConve']."'";
                  //and sIdConvenio='$sIdConvenioAct'";
         mysql_query($sql);
         //Update reportefotografico
         $sql ="UPDATE reportefotografico
               SET
                  dIdFecha='$fecha',
                  sIdTurno='$sIdTurno',
                  sNumeroReporte='$numeroFolio'
               WHERE
                  sContrato = '$sContrato'
                  and dIdFecha='".$_SESSION['dIdFecha']."'
                  and sIdTurno='".$_SESSION['sIdTu']."'
                  and sNumeroReporte='".$_SESSION['sNumreport']."'
				  and sNumeroOrden='".$_SESSION['sNumeroOrden']."'";
         mysql_query($sql);
		//actualizar bitacoras
		$sql ="select iIdDiario from bitacoradeactividades 
               Where sContrato = '$sContrato' And dIdFecha = '".$_SESSION['dIdFecha']."' And sNumeroOrden = '".$_SESSION['sNumeroOrden']."' And sIdTurno = '".$_SESSION['sIdTu']."'";
		$rs = mysql_query($sql);
		if($rw = mysql_fetch_array($rs))
		{
			$diario = $rw['iIdDiario'];
			mysql_query("UPDATE bitacoradepersonal Set dIdFecha ='$fecha'
                         	Where sContrato = '$sContrato' And dIdFecha ='".$_SESSION['dIdFecha']."' And iIdDiario = '$diario' ");
			mysql_query("UPDATE bitacoradeequipos Set dIdFecha = '$fecha'
                         	Where sContrato = '$sContrato' And dIdFecha ='".$_SESSION['dIdFecha']."' And iIdDiario = '$diario' ");
		
		}
        mysql_query("UPDATE bitacoradeactividades SET dIdFecha='$fecha',sNumeroOrden='$sNumeroOrden',sIdTurno='$sIdTurno' 
		 WHERE sContrato = '$sContrato' and sNumeroOrden='".$_SESSION['sNumeroOrden']."' and dIdFecha='".$_SESSION['dIdFecha']."' and sIdTurno='".$_SESSION['sIdTu']."'");
        mysql_query("UPDATE bitacoradealcances Set sIdTurno ='$sIdTurno', dIdFecha = '$fecha'
         Where sContrato = '$sContrato' and sNumeroOrden='".$_SESSION['sNumeroOrden']."' and dIdFecha='".$_SESSION['dIdFecha']."' and sIdTurno='".$_SESSION['sIdTu']."'");
		mysql_query("UPDATE tramitedepermisos Set sIdTurno = '$sIdTurno', dIdFecha = '$fecha'
         Where sContrato = '$sContrato' and sNumeroOrden='".$_SESSION['sNumeroOrden']."' and dIdFecha='".$_SESSION['dIdFecha']."' and sIdTurno='".$_SESSION['sIdTu']."'");         
		mysql_query("UPDATE jornadasdiarias Set sIdTurno = '$sIdTurno' , dIdFecha ='$fecha'
         Where sContrato = '$sContrato' and sNumeroOrden='".$_SESSION['sNumeroOrden']."' and dIdFecha='".$_SESSION['dIdFecha']."' and sIdTurno='".$_SESSION['sIdTu']."'");
        if(mysql_error())
               mensaje(mysql_error());
         else
            mensaje("se actualizo el reporte diario no $numeroFolio");
      }
      else
         mensaje("El reporte ha sido Autorizado, por lo tanto no puede modificarse");
      $_SESSION['accion']="";
      $fecha="";
   echo "<script language='javascript'>document.salvar.fecha.value='';</script>";
   echo "<script language='javascript'>document.salvar.numeroFolio.value='';</script>";
   echo "<script language='javascript'>document.salvar.EstadoTiempo.value='';</script>";
   echo "<script language='javascript'>document.salvar.tema.value='';</script>";
   quitarValor();
   echo "<script language='javascript'>enlace();</script>";
}

#············································..
#..............................................
//unset($_REQUEST);

//unset($_SESSION['sNumeroOrden']);

mysql_close();
?>

<script language='javascript'>
               document.location='#?division=1' ;
               viewSection('1','2');
</script> 

</table>
</center>
</body>
</html>
