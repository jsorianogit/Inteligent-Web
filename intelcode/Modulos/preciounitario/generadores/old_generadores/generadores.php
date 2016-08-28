<?php
session_cache_limiter("must-revalidate"); 
session_start();
?>
<html>
<head>
<script>
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
					addClass=j%2==0?' '+colourClass:'';
					trs[j].className=trs[j].className+addClass;
					trs[j].onclick=function()
					{
						
						for(w=0;w<trs.length;w++){
							//addClass=w%2==0?' '+colourClass:'';
							//trs[w].className=trs[w].className+addClass;
							var rep=trs[w].className.match(' '+activeClass)?' '+activeClass:activeClass;
							trs[w].className=trs[w].className.replace(rep,'');
							//trs[w].className=trs[w].className+' '+colourClass;
						}
						parent.window.frames['estimacionxpartida'].location.href = "estimacionxpartida.php?Generador=" + this.cells[3].innerHTML + "";		
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
//Crea la parte de los checkBox
function FasesAfectadas(){
//Resolucion de la Pantalla
	var hz=window.screen.height
	var wz=window.screen.width
	//document.write("La resolución de la pantalla es:<br>");
	//document.write("Ancho: " + wz + "<br>");
	//document.write("Alto: " + hz + "<br>");
	switch(wz){
		case (800):
			left = 890;
			break;
		case (1280):
			left = 903;
			break;
		case (1024):
			left = 903;
			break;
	}
	
//Frame Flotante
	document.writeln("<iframe  src=\"fases.php\" id=\"Fases\" name=\"Fases\" frameborder=\"0\" framespacing=\"0\" scrolling=\"auto\" border=\"1\" style=\"position:absolute; left:"+left+"px; top:50px; width:300; height:190; z-index:5\"></iframe>");
}
</script>
<?php
require ("../../../include/formulario.inc.php");
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   //echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   echo "\n<script language='javascript' src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";

?>
</head>
<body   bgcolor="#FFAA00">
<?php
//lista de campos que permaneceran bloqueados en insert o update
$bloqueados =array("sContrato","sNumeroOrden","lStatus");

//lista de campos que no deben mostrarse en el grid
$ocultos =array(
"sContrato",
"sNumeroOrden",
"iConsecutivo",
"dBitacoraInicio",
"dBitacoraFinal",
"sFaseObra",
"dFinancieroGenerador",
"sIdUsuarioValida",
"sIdUsuarioResidente");

$hidden =array(
"sContrato",
"iSemana",
"iConsecutivo",
"dBitacoraInicio",
"dBitacoraFinal",
"sFaseObra",
"lStatus",
"dMontoMN",
"dMontoDLL",
"dFinancieroGenerador",
"sIdUsuario",
"sIdUsuarioValida",
"sIdUsuarioAutoriza",
"sIdUsuarioResidente"
);
//campos con los valores que deben contener en el formulario
//de insertar
$valdefaults = array("sContrato"=>$sContrato,"sIdUsuario"=>$_SESSION['ssUsuario'],"sNumeroOrden"=>$_SESSION['NumberOrder']);

//lista de tablas relacionadas con la actual, para efectos de 
//update y delete
$tablasrelaciones = array ("");

//Array de campos llaves que relacinan a las tablas
$camposrelaciones = array ("sContrato","iNumeroEstimacion","sNumeroGenerador");

//consulta sql de donde tomar los campos para el formulario
//solo puede tener clausula where
$sqlGeneral="SELECT * FROM estimaciones WHERE sContrato='$sContrato' and sNumeroOrden='".$_SESSION['NumberOrder']."'";

//formulario objeto
$form = new formulario($sqlGeneral,$ocultos,$bloqueados,$valdefaults,$camposrelaciones,$tablasrelaciones);
$form->fcampoHidden($hidden);
$form->jsCodeCharge("FasesAfectadas();","codigo");
//verifica las ralaciones
//$tablas = $form->relaciones("cuentas");
//foreach($tablas as $tabla)
//	echo "<br> $tabla";
	
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
	if(strpos($sqlGeneral,'WHERE') or strpos($sqlGeneral,'where'))
	{
		$sqlFiltro=$sqlGeneral." and ".$Filtro;
	}
	else
	{
		$sqlFiltro=$sqlGeneral." where ".$Filtro;
	}
}
/*Validar Segun enlace seguido*/
if ( isset($_REQUEST['operacion'])){
	 switch($_REQUEST['operacion']){
		case ('a'):
		    //crea el formulario para insertar
			$_SESSION['sOperacion']="Insertar";
			$form->CreaFormulario();
			break;
		case ('m'):
		    //crea el formulario para modificar
		    $_SESSION['sOperacion']="Modificar";
		 	$form->CreaFormulario($sqlFiltro);
			break;
		case ('b'):
		   //hace un delete segun link seguido 
			$form->crearDelete( $_SESSION['sCondicion'] );
		   break;
	}
}

/*Realizar accion segun tipo de formulario (insert, update)*/
if(isset($_POST['aceptar'])){
 switch ($_POST['aceptar']){
	case "Insertar":
	   //hace un insert
		$form->crearInsert( $_POST , $HTTP_POST_FILES );
		$_POST['aceptar']=$_SESSION['sOperacion']="";
		break;
	case "Modificar":
	   //hace un update
		$form->crearUpdate( $_SESSION['sCondicion'] , $_POST , $HTTP_POST_FILES); 
		$_POST['aceptar']=$_SESSION['sOperacion']="";
		break;
}
	
}
$_SESSION['sOperacion']="Insertar";
?>
<center>
<input type="button" name="button" value="<?php echo $_SESSION['sOperacion'] ?>" onClick="document.location='<?php echo $_SERVER[PHP_SELF]?>?operacion=a'" >
<?php
//echo "\n<center><a href='".$_SERVER[PHP_SELF]."?operacion=a'>".$_SESSION['sOperacion']."</a>";
//recoge la pagina actual para el paginador
if(isset($_REQUEST['pag'])){
	$_SESSION['pagActual']=$_REQUEST['pag'];
	$pag=$_REQUEST['pag'];
}
elseif(isset($_SESSION['pagActual']))
	$pag=$_SESSION['pagActual'];
elseif(!isset($pag))
	$pag=1;
//Recoge el campo para el ORDER BY
if(isset($_REQUEST['order'])){
	$_SESSION['OrdenarPor'] = $_REQUEST['order'];
}

//mostrar grid	
//unset($_REQUEST);
//unset($_REQUEST);
//unset($HTTP_POST_FILES);
//unset($_POST);
//unset($HTTP_POST_VARS);
$form->visualizar($pag,$_SESSION['OrdenarPor']);
mysql_close();
?>
<center>Detalles de Generadores</center>
</body>
</html>
