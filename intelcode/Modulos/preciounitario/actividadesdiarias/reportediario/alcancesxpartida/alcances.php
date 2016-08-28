<?php require("alcances.inc.php");
require("../../../../../fnContrato.php");

if(isset($_REQUEST['sNumeroOrden']) and $_REQUEST['sNumeroOrden']!="")
   $_SESSION['sNumeroOrden']=$_REQUEST['sNumeroOrden'];
$sNumeroOrden=$_SESSION['sNumeroOrden'];
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   //echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   //echo "\n<script language='javascript' src='domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
/*Obtener los datos del reporte diario*/
$sql =" select  sTipoAlcance,sTipoOperacion from configuracion where sContrato='$sContrato';";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $sTipoAlcance=$row[0];
   $sTipoOperacion=$row[1];
}
$form = new alcances();

/*obtener el filtro*/
//$Filtro=encrypt($_REQUEST['Sql'],1);
$sContrato;
if(isset($_REQUEST['sNumeroOrden']))
   $_SESSION['NumeroOrden']=$_REQUEST['sNumeroOrden'];
if(isset($_REQUEST['dIdFecha']))
   $_SESSION['fecha']=$_REQUEST['dIdFecha'];
if(isset($_REQUEST['sIdTurno']))
   $_SESSION['sIdTurno']=$_REQUEST['sIdTurno'];
$Turno = $_SESSION['sIdTurno'];
if(isset($_REQUEST['lStatus']))
   $_SESSION['lStatus']=$_REQUEST['lStatus'];
//}

//recoge la pagina actual para el paginador
if(isset($_REQUEST['pag'])){
   $_SESSION['pagActual']=$_REQUEST['pag'];
   $pag=$_REQUEST['pag'];
}
elseif(isset($_SESSION['pagActual']))
   $pag=$_SESSION['pagActual'];
elseif(!isset($pag))
   $pag=1;
?>
<html>
<head>
<script src="ajax.js" language="JavaScript"></script>
<script>
<!--
   var Enlace;
   var Tecla;
   ns4 = (document.layers)? true:false
   ie4 = (document.all)? true:false

   document.onkeydown = Pulsar
   if (ns4) document.captureEvents(Event.KEYDOWN)
   function Pulsar(e) {
           if (ie4)
            Tecla=event.keyCode; 
           else
            Tecla = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;
         if(Tecla==112)
            return false;
         if(Tecla==113)
         {
            var ventana;
            var sNumeroActividad = document.actividad.sNumeroActividad.value;
            var cadenaBuscada = "SUMINI";
            var indice = document.salvar.iFase.selectedIndex ;
            var texto = document.salvar.iFase.options[indice].text;
            var posicion=-1;
            if(texto.indexOf(cadenaBuscada)>=0){
               posicion=texto.indexOf(cadenaBuscada);
               ventana = window.open("historico.php?sNumeroActividad=" + sNumeroActividad + "&Contrato=" + "<?php echo $sContrato ?>","Historico",  "width=600,height=300,status=yes,toolbar=no,menubar=no,location=no");
            }
         }
         if (Tecla==114) {   // si se aprieta la tecla "F3"
            var ventana;
            var formularioVisible = document.getElementById("FormularioPrincipal").style.visibility;
            if(formularioVisible=="visible"){
               var sNumeroActividad=document.actividad.sNumeroActividad.value+ "";
               var sWbs=document.wbs.swbs.value + "";
               if(sNumeroActividad=="" || sWbs=="")
                  alert("Seleccione un numero de actividad y/o una partida (Wbs)");
               else{
               ventana = window.open("acumuladoAlcance.php?Wbs="+sWbs+"&sActividad="+sNumeroActividad+"&sOrden="+"<?php echo $sNumeroOrden?>","Acumulado",  "width=600,height=300,status=yes,toolbar=no,menubar=no,location=no");
                  ventana.focus();
                  }
            }
            else{
               
               if(Enlace==null)
                  alert("Seleccione un registro de la lista");
               else{
                   ventana = window.open("acumuladoAlcance.php?" + Enlace,"Acumulado",  "width=600,height=300,status=yes,toolbar=no,menubar=no,location=no");
                      ventana.focus();
                  }
               //location.reload();
               }
         }
   }
   function historico(){
      var cadena = "PRESS F2 PARA HISTORICO";
      var cadenaBuscada = "SUMINI";
      var index = document.salvar.iFase.selectedIndex ;
      var textoSel = document.salvar.iFase.options[index].text;
      if(textoSel.indexOf(cadenaBuscada)>=0){
         document.salvar.sReferencia.value=cadena;
      }
      else{
         document.salvar.sReferencia.value=" ";
      }

   }
    function getCellByRowCol(rowNum, colNum)
   {
      var tableElem = document.getElementById('a1');
      var rowElem = tableElem.rows[rowNum];
      var tdValue = rowElem.cells[colNum].innerHTML;
      return tdValue;
   }
   function domTableEnhance()
   {
      if(!document.createTextNode){return;}
      var tableClass='enhancedtable';
      var colourClass='enhancedtablecolouredrow';
      var hoverClass='enhancedtablerowhover';
      var activeClass='enhancedtableactive';
      var alltables,bodies,i,j,k,addClass,trs,c,a;
      alltables=document.getElementsByTagName('table');
      for (k=0;k<alltables.length;k++)
      {
         if(!alltables[k].className.match(tableClass)){continue;}
         bodies=alltables[k].getElementsByTagName('tbody');
         for (i=0;i<bodies.length;i++)
         {
            trs=bodies[i].getElementsByTagName('tr')
            for (j=0;j<trs.length;j++)
            {
               
               if(trs[j].getElementsByTagName('td').length>0)
               {
                  totalTds = trs[j].getElementsByTagName('td').length;
                  addClass=j%2==0?' '+colourClass:'';
                  trs[j].className=trs[j].className+addClass;
                  trs[j].onclick=function()
                  {
                     if(totalTds == 11){
                        pos1 = 1;
                        pos2 = 2;
                   }
                   else{
                      pos1 = 3;
                     pos2 = 4;
                   }
                    // alert(totalTds + ":"+pos1 + " . " + this.cells[pos1].innerHTML+ " . " +  pos2 + " . " + this.cells[pos2].innerHTML);
                     Enlace = "sOrden=" + "<?php echo $sNumeroOrden?>" + "&Wbs=" + this.cells[pos1].innerHTML + "&sActividad=" +this.cells[pos2].innerHTML;
                     if(this.className.match(activeClass))
                     {
                        var rep=this.className.match(' '+activeClass)?' '+activeClass:activeClass;
                        this.className=this.className.replace(rep,'');
                     } else {
                        this.className+=this.className?' '+activeClass:activeClass;
                     }
                  }
                  trs[j].onmouseover=function()
                  {
                     this.className=this.className+' '+hoverClass;
                  }
                  trs[j].onmouseout=function()
                  {
                     var rep=this.className.match(' '+hoverClass)?' '+hoverClass:hoverClass;
                     this.className=this.className.replace(rep,'');
               }  
                     
               }  
            }
         }
      }     
   }
   window.onload=domTableEnhance; 
//-->
</script>   
   <SCRIPT>
   function disparition()
   {
   if(document.getElementById)
   document.getElementById("_wbs").style.visibility = 'hidden';
   }
   </SCRIPT>
   <SCRIPT>
  
   function afficher()
   {
   if(document.getElementById)
   document.getElementById("_wbs").style.visibility = 'visible';
   }
  
   </SCRIPT>

<title>
</title>
</head>
<body>
<center>
<!--
<input type="button" onClick=alert(Enlace) >
-->
<!-- Numero de Orden -->
<!--<form name='sNumeroOrden' action="<?php echo $PHP_SELF?>"  method="post">-->
<?php
if(isset($_REQUEST['convenio']))
   $_SESSION['convenio']=$_REQUEST['convenio'];
$convenio=$_SESSION['convenio'];
?>
<!--</form>-->
<!-- ##################################################################################################################################-->

<?php
$ocultos = array ("sContrato","sPaquete","sNumeroOrden","iFase","sIdTurno","iIdDiario");
//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","iFase","iIdDiario","sWbs","sNumeroActividad","sNumeroOrden","dIdFecha","sIdTurno");
$tablasrelaciones = array ("none");
//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
$sqlGeneral="select 
bitacoradealcances.sContrato,
bitacoradealcances.sNumeroOrden,
bitacoradealcances.dIdFecha,
bitacoradealcances.iIdDiario,
bitacoradealcances.iFase,
bitacoradealcances.sWbs,
bitacoradealcances.sPaquete,
bitacoradealcances.sNumeroActividad,
alcancesxactividad.sDescripcion,
turnos.sDescripcion,
turnos.sIdTurno,
bitacoradealcances.dCantidad,
bitacoradealcances.dAvance,
bitacoradealcances.sReferencia,
actividadesxorden.sMedida,
actividadesxorden.dVentaMN as dVentaMN,
(bitacoradealcances.dCantidad*actividadesxorden.dVentaMN) as dCostoMN
from bitacoradealcances  
INNER JOIN  alcancesxactividad ON ( alcancesxactividad.sContrato = bitacoradealcances.sContrato  
      AND alcancesxactividad.sNumeroActividad =bitacoradealcances.sNumeroActividad  
      AND alcancesxactividad.IFase =bitacoradealcances.IFase  )
INNER JOIN  turnos  on (bitacoradealcances.sContrato=turnos.sContrato 
      AND bitacoradealcances.sIdTurno=turnos.sIdTurno) 
INNER JOIN actividadesxorden  ON(bitacoradealcances.sContrato=actividadesxorden.sContrato 
      AND bitacoradealcances.sNumeroActividad=actividadesxorden.sNumeroActividad 
      AND bitacoradealcances.sWbs=actividadesxorden.sWbs 
      AND bitacoradealcances.sNumeroOrden=actividadesxorden.sNumeroOrden) 
WHERE bitacoradealcances.sContrato ='$sContrato' 
      AND bitacoradealcances.dIdFecha='".$_SESSION['fecha']."' 
      AND actividadesxorden.sIdConvenio='$convenio' AND bitacoradealcances.sIdTurno='$Turno'
      AND bitacoradealcances.sNumeroOrden='".$_SESSION['NumeroOrden']."'";
//AND bitacoradealcances.sIdTipoMovimiento=tiposdemovimiento.sIdTipoMovimiento)

//formulario objeto
$form->formulario($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);
if($_SESSION['lStatus']!="Pendiente"){
   mensaje("ATENCION:  El reporte Diario Esta Validado/Autorizado No puede realizar Cambios Aqui !!! ");
   echo "<font color=RED>";
   echo "<center><br>Reporte Diario Validado/Autorizado No puede realizar Cambios Aqui !!!<br></center>";
   echo "</font>";
   $form->opciones(0,0);
}
   
/*si se ha iniciado una nueva consulta, destruir la actual*/
if (!isset($_SESSION['sqlAnterior'])){
   $_SESSION['sqlAnterior']=$sqlGeneral;
}
else if ($_SESSION['sqlAnterior'] != $sqlGeneral){
   $_SESSION['sqlAnterior']=$sqlGeneral;
   unset($_SESSION['OrdenarPor']);
   unset($_REQUEST);
   unset($_REQUEST);
   unset($_POST);
}

/*obtener el filtro*/
if( isset($_REQUEST['Sql'])){
   $Filtro=encrypt($_REQUEST['Sql'],1);
   $_SESSION['sCondicion']=$Filtro=$form->limpiar($Filtro);
//exit();
}

/*Validar Segun enlace seguido para Eliminar bitacora*/

//echo "Operacion: ".$_REQUEST['operacion'];       
//echo "Condicional: ".$_SESSION['sCondicion'];
//exit();

if ( isset($_REQUEST['operacion'])){
    switch($_REQUEST['operacion']){
      case ('b'):
         $error=false;  
          mysql_query("begin");
          #Obtener la Condicion sin el iFase ni el iIdDiario
          $condicion = explode("AND",$_SESSION['sCondicion']);
          foreach($condicion as $con){
             #Capturar el iFase que se desea eliminar
             if(strpos($con,"iFase")!==false){
                  $iFaseEliminar = explode("=",$con);
                  $iFaseEliminar = trim(str_replace("'","",$iFaseEliminar[1]));
                  continue ;
             }
             #Capturar el Numero de Actividad de la jornada que se desea borrar
             if(strpos($con,"sNumeroActividad")!==false){
                  $sNumeroActividadEliminar = explode("=",$con);
                  $sNumeroActividadEliminar = trim(str_replace("'","",$sNumeroActividadEliminar[1]));
             }
             #Capturar el Contrato de la jornada que se desea borrar
             if(strpos($con,"sContrato")!==false){
                  $sContratoEliminar = explode("=",$con);
                  $sContratoEliminar = trim(str_replace("'","",$sContratoEliminar[1]));
             }
             #Saltar si el campo es iIdDiario
             if(strpos($con,"iIdDiario")!==false ){
                $iIdDiarioEliminar = explode("=",$con);
                $iIdDiarioEliminar = trim(str_replace("'","",$iIdDiarioEliminar[1]));
                continue;
              } 
             
             $sNuevaCondicion .= " $con AND";
          }
          $sNuevaCondicion.="<";
          $sNuevaCondicion = str_replace("AND<","",$sNuevaCondicion);
         #Obtener el numero total de fases y el numero de fases para el contrato y numero de orden
          $sql ="SELECT * FROM alcancesxactividad WHERE sContrato='$sContratoEliminar' AND sNumeroActividad='$sNumeroActividadEliminar';";         
         $result=mysql_query($sql);
         if(mysql_error()){$error=true ;mensaje(mysql_error());}
         while($row = mysql_fetch_array($result)){
           $iFases[$row['iFase']]=$row['iFase'];
         }
         #obtener los iIdDiarios de los registros a eliminar
         $sql ="  SELECT iIdDiario FROM bitacoradealcances WHERE $sNuevaCondicion and iFase>='$iFaseEliminar' ; ";
         $result = mysql_query($sql);
         if(mysql_error()){$error=true ;mensaje(mysql_error());}
         while($row = mysql_fetch_array($result)){
            $iIdDiarios[] = $row['iIdDiario'];
          }  
          
         #si el numero de Fase del registro que se va a eliminar es igual al numero final de fases de alcancesxactividad
         #se debe decrementar tambien en actividadesxorden
         #Obtener el iFase Mayor de esta partida y Wbs que se ingreso
         $sql ="  SELECT max(iFase) as iFase FROM bitacoradealcances WHERE $sNuevaCondicion ; ";
         $result = mysql_query($sql);
         if($row = mysql_fetch_array($result))
          $iUltimaFase = $row['iFase'];

         #Actualizar actividadesxorden    y actividadesxanexo
         $k=0;
         for($i=$iFaseEliminar ; $i<= $iUltimaFase ;$i++){
            if(count($iFases)==$i){
               #obtener la condicion para actividadesxorden , eliminando los campos innecesarios
               $arraCondicion = explode("AND",$_SESSION['sCondicion']);
               foreach($arraCondicion as $con){
                  if(strpos($con,"dIdFecha") !==false or strpos($con,"iIdDiario") !==false or strpos($con,"iFase") !==false or strpos($con,"sIdTurno") !==false)continue;
                  $condition.=   $con." AND";
               }
              foreach($arraCondicion as $con){
                  if(strpos($con,"dIdFecha") !==false or strpos($con,"iIdDiario") !==false or strpos($con,"iFase") !==false or strpos($con,"sIdTurno") !==false or strpos($con,"sNumeroOrden") !==false )continue;
                  $conditionAnexo.=$con." AND";
               }
               $condition.="<";
               $condition=str_replace("AND<"," ",$condition);
               $conditionAnexo.="<";
               $conditionAnexo=str_replace("AND<"," ",$conditionAnexo);
               #obtener la condicion para bitacoradeactividades , eliminando los campos innecesarios
               $arraCon = explode("AND",$_SESSION['sCondicion']);
               foreach($arraCon as $con){
                  if(strpos($con,"iFase") !==false or strpos($con,"iIdDiario") !==false )continue;
                  $cond.=  $con." AND";      
               }
               $cond.="<";
               $cond=str_replace("AND<"," ",$cond);        
               #ejecutar las consultas con las condiciones obtenidas                                         ################# Aqui iva E
               $sql2 = "SELECT dCantidad  FROM bitacoradeactividades WHERE $cond AND sIdTipoMovimiento='$sTipoOperacion' AND lAlcance='Si' ; ";
               $result = mysql_query($sql2);
               if(mysql_error()){$error=true ;mensaje(mysql_error());}
               if($row = mysql_fetch_array($result))
                  $bdCantidad = $row[0];
               #actualizar actividadesxorden
               $sql = "SELECT dCantidad,dInstalado,dExcedente  FROM actividadesxorden  WHERE $condition AND sIdConvenio='$convenio' ; ";
               $result = mysql_query($sql);
               if(mysql_error()){$error=true ;mensaje(mysql_error());}
               if($row = mysql_fetch_array($result))
               {
                  $adCantidad = $row[0] ;
                  $adInstalado = $row[1] ;
                  $adExcedente = $row[2];
               }
               $instalado = ($adInstalado + $adExcedente) - $bdCantidad ;
               if($instalado > $adCantidad){
                  $excedente = $instalado - $adCantidad;
                  $restante = 0 ;
                  $instalado = $adCantidad;
               }
               else{
                  $excedente = 0;
                  $restante=$adCantidad - $instalado ;
                  
               }
               $sql ="UPDATE actividadesxorden SET dInstalado='$instalado' , dExcedente='$excedente'  WHERE $condition AND sIdConvenio='$convenio' ; ";
               mysql_query($sql);
               GuardaQuery($sql,"ActualizarOrden.log",true);
               if(mysql_error()){$error=true ;mensaje(mysql_error());}
               if(mysql_error())mensaje(mysql_error());
               #actualizar actividadesxanexo
               $sql = "SELECT dCantidadAnexo,dInstalado,dExcedente FROM actividadesxanexo  WHERE $conditionAnexo AND sIdConvenio='$convenio' ; ";
               $result = mysql_query($sql);
               if(mysql_error()){$error=true ;mensaje(mysql_error());}
               if($row = mysql_fetch_array($result))
               {
                  $adCantidad = $row[0] ;
                  $adInstalado = $row[1] ;
                  $adExcedente = $row[2];
               }
               $instalado = ($adInstalado + $adExcedente) - $bdCantidad ;
               if($instalado > $adCantidad){
                  $excedente = $instalado - $adCantidad;
                  $restante = 0 ;
                  $instalado = $adCantidad;
               }
               else{
                  $excedente = 0;
                  $restante=$adCantidad - $instalado ;

               }
               $sql ="UPDATE actividadesxanexo SET dInstalado='$instalado' , dExcedente='$excedente'  WHERE $conditionAnexo AND sIdConvenio='$convenio' ; ";
               mysql_query($sql);
               GuardaQuery($sql,"ActualizarAnexo.log",true);
               if(mysql_error()){$error=true ;mensaje(mysql_error());}
               if(mysql_error())mensaje(mysql_error());
               #Obtener el Id Diario de la ultima fase en Bitacoradeactividades
               $sql = "SELECT iIdDiario FROM bitacoradeactividades WHERE $sNuevaCondicion AND sIdTipoMovimiento='$sTipoOperacion' AND  lAlcance='SI' ;";
               $result = mysql_query($sql);
               if($row = mysql_fetch_array($result)){
                  $Diario = $row[0];
               }
               #eliminar la fase terminal
               $sql = "DELETE FROM bitacoradeactividades WHERE $sNuevaCondicion AND iIdDiario='$Diario' ; ";
               mysql_query($sql);
               if(mysql_error()){$error=true ;mensaje(mysql_error());}

               $valoresCamposPerEqui = explode("AND",$sNuevaCondicion);
               $conPersonalEquipo=" ";
               foreach($valoresCamposPerEqui as $value){
                  if(strpos($value,"sContrato")!==false) $conPersonalEquipo.=$value. " AND ";
                  if(strpos($value,"dIdFecha")!==false) $conPersonalEquipo.=$value. " AND ";
               }             
               $conPersonalEquipo.=" iIdDiario='$Diario'  ";
               #eliminar el personal de bitacoradepersonal relacionado con ese iIdDiario
               $sqlDeletePersonal = "DELETE FROM bitacoradepersonal WHERE $conPersonalEquipo";
               mysql_query($sqlDeletePersonal);
               if(mysql_error()){$error=true ;mensaje(mysql_error());}              
   
               #ahora el equipo de bitacoradeequipos
               $sqlDeleteEquipo = "DELETE FROM bitacoradeequipos WHERE $conPersonalEquipo";
               mysql_query($sqlDeleteEquipo);
               if(mysql_error()){$error=true ;mensaje(mysql_error());}
            }
            $sql = "DELETE FROM bitacoradealcances WHERE $sNuevaCondicion AND iFase='$i' AND iIdDiario='$iIdDiarios[$k]' ;";
            $sql2 = "DELETE FROM bitacoradeactividades WHERE $sNuevaCondicion AND iIdDiario='$iIdDiarios[$k]' ; ";

            $sqlIdDiario  ="SELECT iIdDiario FROM bitacoradealcances WHERE $sNuevaCondicion AND iFase='$i' AND iIdDiario='$iIdDiarios[$k]';";
            $rs = mysql_query($sqlIdDiario);
            if($rw = mysql_fetch_array($rs))
               $k++;

            mysql_query($sql);
            if(mysql_error()){$error=true ;mensaje(mysql_error());}
            mysql_query($sql2);
            if(mysql_error()){$error=true ;mensaje(mysql_error());}   
         }
         if($error==true){
            mysql_query("rollback");
            mensaje("Error en la Operación , Intentelo de Nuevo");  
         }
         else{mysql_query("commit");}
         location("alcances.php?1=1");
         //hace un delete segun link seguido 
         #$form->crearDelete( $_SESSION['sCondicion'] );
         break;
   }
}

   

//Recoge el campo para el ORDER BY (En esta Seccion no es Aplicable)
if(isset($_REQUEST['order'])){
   $_SESSION['OrdenarPor'] = $_REQUEST['order'];
}
$nombres = array("Fecha","Wbs","Concepto","Alcance","Turno/Origen","Cantidad","Avance","Referencia","Unidad","P. Unitario","Total");
//echo "<center><a href ='../reportediario.php'>[Regresar]</a></center>";
?>
   <script language='javascript'>
   function mostrarForm(){setTimeout ('mForm();', 500); }
   function mForm(){
      afficher();
      document.getElementById('FormularioPrincipal').style.visibility='visible';
      <?php 
         $result = mysql_query($sqlGeneral);
         if($row = mysql_fetch_array($result)){
      ?>
      if(document.getElementById('ReporteAlcances')!=null)
         document.getElementById('ReporteAlcances').style.visibility='hidden';
      document.getElementById('msgF3').style.visibility='hidden';
      document.getElementById('paginadorSuperior').style.visibility='hidden';
      document.getElementById('paginadorInferior').style.visibility='hidden';
      <?php
         }
         else
         {
      ?>
      if(document.getElementById('vacio')!=null)
         document.getElementById('vacio').style.visibility='hidden'
      <?php
         }
      ?>
      document.getElementById('tablaWbs').style.visibility='visible';
      document.getElementById('Insertar').disabled=true;
      document.getElementById('regresar').disabled=true;
      afficher();
      cargaXML("insert_ini.php");
            if(document.all){
         if(window.screen.width ==800){
            izq=80;
         }
         else if(window.screen.width ==1024){
            izq=150;
         }
         else{
            izq=(300+window.screen.width )-window.screen.width;
         }
      }
      else {
         if(window.screen.width ==800){
            izq=80;
         }
         else if(window.screen.width ==1024){
            izq=150;
         }
         else{
            izq=(300+window.screen.width )-window.screen.width;
         }
      }
      document.getElementById('FormularioPrincipal').style.pixelLeft=izq;
      document.getElementById('FormularioPrincipal').style.pixelTop='65';
      


   }
   function ocultarForm(){
      document.getElementById('FormularioPrincipal').style.visibility='hidden';
      <?php 
         $result = mysql_query($sqlGeneral);
         if($row = mysql_fetch_array($result)){
      ?>
      
      document.getElementById('msgF3').style.visibility='visible';
      document.getElementById('paginadorSuperior').style.visibility='visible';
      document.getElementById('paginadorInferior').style.visibility='visible';
      <?php
         }
         else
         {
      ?>
      if(document.getElementById('vacio')!=null)
         document.getElementById('vacio').style.visibility='visible'
      <?php
         }
      ?>
      document.getElementById('tablaWbs').style.visibility='hidden';
      if(document.getElementById('ReporteAlcances')!=null)
         document.getElementById('ReporteAlcances').style.visibility='visible';
      document.getElementById('Insertar').disabled=false;
      document.getElementById('regresar').disabled=false;
      document.getElementById('FormularioPrincipal').style.pixelTop='19080';//position:absolute;top:23px;left:45px;
   // document.getElementById('FormularioPrincipal').style.pixelLeft='1080';
      disparition();
      cargaXML("insert_destroy.php");
   // document.getElementById('FormularioPrincipal').style.pixelTop='80px';//position:absolute;top:23px;left:45px;
   }
   </script>
<center>
<input type ="button" name='Insertar' id='Insertar' onClick="javascript:mostrarForm();" value="Insertar" title="Insertar Registro">
<!--<input type ="button" name='regresar' id='regresar' onClick="cargaXML('insert_destroy.php');document.location='../';" value="Regresar" title="Regresar a Reporte Diario">-->
<input type ="button" name='regresar' id='regresar' onClick="cargaXML('insert_destroy.php');document.location='../../../../../frmReporteDiario.php';" value="Regresar" title="Regresar a Reporte Diario">
<?php
$result = mysql_query($sqlGeneral);
if($row = mysql_fetch_array($result)){
      echo "<div id='msgF3'><br><font color='RED'>F3 Para Ver Acumulado de la Partida</font><br></div>";
      $form->visualizar($pag,$_SESSION['OrdenarPor'],$nombres);
}
else{
   echo "<br><br><br><center><table id='Vacio' border=2 bgcolor='#00AA00'><tr><td>
         <font color='BLUE'><h3>Sin Registros</h3></font></td></tr></table></center>";

}


?>

<!-- ##################################################################################################################################-->
<table style="visibility:hidden;position: absolute; top:65px;left:15%" id="FormularioPrincipal">
<!--<caption>Bitacora de Alcances x Partida</caption>-->
<tr><td colspan=4><center><font size=2 color="#FFAA00"><b>Bitacora de Alcances x Partida</b></font></center></td></tr>
<tr>

<td width="81">Numero de Activiad</td>
<td width="12%" colspan>
<form name='actividad' action="<?php echo $PHP_SELF?>"  method="post">
<?php
if(isset($_POST['sNumeroActividad']))
   $_SESSION['sNumeroActividad']=$_POST['sNumeroActividad'];
$sNumeroActividad=$_SESSION['sNumeroActividad'];

require("../avanceFisico.php");
//$dAvanceObra = avanceFisico ($sContrato,$sNumeroOrden,$convenio,$Turno ,$_SESSION['fecha']) ;
$dAvanceObra =avances($sContrato,$sNumeroOrden,$convenio,$_SESSION['fecha'],$Turno,'Avanzada');
//$sql ="select DISTINCT sNumeroActividad from alcancesxactividad where sContrato ='$sContrato' ";
$sql = "SELECT DISTINCT ao.sNumeroActividad FROM actividadesxorden ao
        WHERE EXISTS (SELECT distinct a.sNumeroActividad 
                      FROM alcancesxactividad  a 
                      WHERE a.sContrato = ao.scontrato and a.sNumeroActividad = ao.sNumeroActividad) 
                        AND ao.sContrato = '$sContrato' And ao.sNumeroOrden = '$sNumeroOrden' And ao.sIdConvenio = '$convenio' 
                        AND ao.sTipoActividad ='Actividad' Order By ao.iItemOrden";

$result = mysql_query($sql);
print ("<select name='sNumeroActividad' onChange='document.actividad.submit()'>");
print ("<option></option>");
while ($row=mysql_fetch_array($result)){
   $seleccionar = ($sNumeroActividad==$row[0]) ?"selected":"";
   print ("<option $seleccionar value='".$row[0]."' >".$row[0]."</option>"); 
}
print ("</select>");
?>
</form>    
</td>
<td>
<font size="-3" color="#8000AA" ><b>Avances Del Dia:</b></font><font size="+0" color="#D52B00" ><?php echo ($dAvanceObra=='')?'0.00 %':$dAvanceObra.'%' ?></font>
</td>
</tr>
<tr>
<td>Concepto</td>
<td  colspan=3>
<!-- sWbs -->
<form name='wbs' action="<?php echo $PHP_SELF?>" method="post">
   <table id='tablaWbs' style="visibility:hidden;">
      <tr>
         <td >
         <?php
            $swbs=$_POST['swbs'];
            $semilla = "";
            $sql ="select sWbs,dCantidad,dPonderado,mDescripcion from actividadesxorden where sContrato ='$sContrato' and sNumeroOrden='$sNumeroOrden'  and sNumeroActividad='$sNumeroActividad' and sTipoActividad='Actividad' AND sIdConvenio='$convenio' ";
            $result = mysql_query($sql);
            print ("<select name='swbs' onChange='document.wbs.submit()'>");
            print ("<option></option>");
            while ($row=mysql_fetch_array($result)){
               if($semilla=="")$semilla=$row[0];
               if($swbs==$row[0]){
                  $seleccionar="selected";
                  $dCantidad=$row[1];
                  $dPonderado=$row[2];
                  $mDescripcion=$row[3];
               }
               else if($swbs ==""  and $sNumeroActividad!=""){
                  $swbs = $semilla;
                  $dCantidad=$row[1];
                  $dPonderado=$row[2];
                  $mDescripcion=$row[3];
                  $seleccionar="selected";
               }
               else
                  $seleccionar="";
               print ("<option $seleccionar value='".$row[0]."'>".$row[0]."</option>");  
            }
            
            print ("</select>");
         ?>
         </td>
         <td  ID="_wbs" width=600 >
            <!-- Descripcion del sWbs -->
            <?php
               $reporte = new reporte();
               $sql="select sWbs,sNumeroActividad,dCantidad,sMedida,dInstalado,dExcedente,(dCantidad-dInstalado),dPonderado from actividadesxorden where sContrato ='$sContrato' and sNumeroOrden='$sNumeroOrden'  and sNumeroActividad='$sNumeroActividad' and sTipoActividad='Actividad' and sWbs = '$swbs' AND sIdConvenio='$convenio'";
   //$titulotabla="Detalles de la Actividad";
               $nomcampos = array("sWbs","Partida","Cantidad","Medida","Instalado","Excedente","Restante","Ponderado");
               $reporte->ponerconsulta($sql,1,$nomcampos,$titulotabla);
               $reporte->imprimir();
            ?>
         </td>
      </tr>
   </table>
</form>
   <center>
      <A HREF=# onClick='disparition();return(false)'>Ocultar Detalles</A>            
      <A HREF=# onClick='afficher();return(false)'>Ver Detalles</A> </font></b>
   </center>
</td>
</tr>

<!--</table>-->
<!-- Formulario de Almacenamiento -->
<!--<table>-->
<form name='salvar' action="salvaralcances.php" method="post">
   <input type="hidden" name="sNumeroActivdad" value="<?php echo $sNumeroActividad?>" readonly>
   <input type="hidden" name="swbs" value="<?php echo $swbs?>" readonly>
   <input type="hidden" name="cantidad" value="<?php echo $dCantidad?>" readonly>
   <input type="hidden" name="dPonderado" value="<?php echo $dPonderado?>" readonly>
   <input type="hidden" name="convenio" value="<?php echo $convenio  ?>" readonly>
<tr>
   <td>
      Fecha
   </td>
   <td colspan=3>
      <input type="text" name="fecha" value="<?php echo $_SESSION['fecha']?>"  readonly>
   </td>

      <?php
         $sql =" select sIdTurno,sDescripcion from turnos where sContrato='$sContrato' and sIdTurno='$Turno'";
         $result = mysql_query($sql);
         print("<select name='sIdTurno' style='visibility:hidden'>");
         while($row=mysql_fetch_array($result)){
            print("<option value=$row[0]>$row[1]</option>");
         }
         print("</select>");
      ?>

</tr>
<tr>
   <td>
      Numero de Orden
   </td>
   <td colspan=3>
      <input type="text" name="sNumeroOrden" value="<?php echo $sNumeroOrden?>" readonly>
   </td>

</tr>
<tr>

      <td>
      Fase
   </td>
   <td colspan=3>
      <?php
         $sql ="select distinct(iFase) , sDescripcion,dAvance from alcancesxactividad where sContrato='$sContrato' AND sNumeroActividad='$sNumeroActividad' order by iFase";
         $result = mysql_query($sql);
         print("<select name = 'iFase' onChange=\"historico();\">\n");//sIdTipoMovimiento
         while($row = mysql_fetch_array($result)){
            //$seleccionar =(trim($row[1])=="VOLUMEN DE OBRA")?"selected":"";
            print("<option $seleccionar value='$row[0]'>$row[1]  -> $row[2] %</option>\n");
         }
         print("</select>\n");
      ?>
   </td>
</tr>
<tr>

   <td>
      Cantidad a Instalar
   </td >
   <td colspan=3>
      <input type="text" name="cantidadIns" value="0">
   </td>
</tr>
<tr>
   <td>
      Referencias
   </td>
   <td colspan=3>
      <textarea name="sReferencia"   rows="1" cols="80" onKeyUp="document.salvar.sReferencia.value=document.salvar.sReferencia.value.toUpperCase()"></textarea>
   </td>
</tr>
<tr>
   <td>
      Comentarios
   </td>
   <td colspan=3>
      <textarea name="comentarios"   rows="3" cols="80" onBlur="document.salvar.comentarios.value=document.salvar.comentarios.value.toUpperCase()"><?php echo $mDescripcion?></textarea>
   </td>
</tr>

<tr>
</tr>
<tr>
   <td colspan="3">
      <center>
             <?php
         if($_SESSION['lStatus']!="Pendiente")
             $enable = "disabled"; 
        ?>
         <input type="submit" value="Aceptar" <?php echo $enable ?>>
         <input type ="button" name='Cancelar' id='Cancelar' onClick="javascript:ocultarForm();" value="Cancelar" title="Cancelar Insertar">
      </center>
   </td>
</tr>
</form>
</table>
</center>
<div id='detalles'>
<div>
<?php 
#avances globales del contrato y de la orden
$CantidadDeOrdenes = 0;
$sql= "select count(sNumeroOrden) as dTotal from ordenesdetrabajo Where sContrato='$sContrato'";
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
   $CantidadDeOrdenes = $row['dTotal'];
}
If ($CantidadDeOrdenes > 1 )
 $avanceGlobal = cfnCalculaAvances($sContrato,$_SESSION['NumeroOrden'],NULL,$_SESSION['sIdTurno'],true,$_SESSION['fecha'],"Avanzada");
else
 $avanceGlobal = cfnCalculaAvances($sContrato,$_SESSION['NumeroOrden'],NULL,$_SESSION['sIdTurno'],false,$_SESSION['fecha'],"Avanzada");

   if($_SESSION['insertar']==true){
      echo "<script>mostrarForm();</script>";
   }
   else {
      echo "<script>ocultarForm();</script>";
   }

   mysql_close();
?>
</body>
</html>

