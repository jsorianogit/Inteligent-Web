<?php require("alcances.inc.php"); 
if(isset($_REQUEST['Contrato']))$Contrato =$_REQUEST['Contrato']; 
if(isset($_REQUEST['sNumeroActividad']))$sNumeroActividad =$_REQUEST['sNumeroActividad'];
  $sql="SELECT an.dFechaAviso,an.sReferencia,ap.sNumeroActividad,ti.sDescripcion,ap.iFolio,ap.dCantidad,
 			(select sum(ap2.dCantidad) as Acumulado from 
			 	anexo_psuministro ap2 inner join anexo_suministro an2 on (ap2.sContrato=an2.sContrato and ap2.iFolio=an2.iFolio)
			 where ap2.sContrato='$sContrato' 
			 	and ap2.sNumeroActividad='$sNumeroActividad'
				and ap2.iFolio<=ap.iFolio) as acumulado
		FROM
		anexo_psuministro ap 
		inner join anexo_suministro an on (ap.sContrato=an.sContrato and ap.iFolio=an.iFolio)
		inner join movimientosdealmacen ti on (ti.sIdTipo = an.sIdTipo)
		WHERE ap.sContrato='$sContrato'
	      and ap.sNumeroActividad='$sNumeroActividad'
	   order by an.dFechaAviso,ap.iFolio;";   
$result = mysql_query($sql);
if($row = mysql_fetch_array($result)){
	$sReferencia = $row['sReferencia'];
}
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
						opener.document.salvar.sReferencia.value = this.cells[1].innerHTML;
						opener.document.salvar.sReferencia.style.background="#FFD400"; 
						opener.document.salvar.sReferencia.style.color="#00002B";
						if(this.className.match(activeClass))
						{
							var rep=this.className.match(' '+activeClass)?' '+activeClass:activeClass;
							//this.className=this.className.replace(rep,'');
						} 
						//else {
						//	this.className+=this.className?' '+activeClass:activeClass;
						//}
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
</script>
<?php
   echo "\n<style type='text/css'>@import '".$PathEstilos."estilo1.css';</style>";
   //echo "\n<script language='javascript' src='".$PathEstilos."domtableenhance.js'></script>";
   //echo "\n<script language='javascript' src='".$PathInclude."domtableenhance.js'></script>";
   echo "\n<script languaje=javascript src='".$PathInclude."funcionesGen.js'></script>";
   echo "\n<script type='text/javascript' src='".$PathInclude."acc_calendar/acc_calendar.js'></script>";
?>
<script>
function PonerReferencia(){
	var Referencia = "<?php echo $sReferencia ?>";
	if(Referencia!="")
		opener.document.salvar.sReferencia.value=Referencia;
	else	
		opener.document.salvar.sReferencia.value="Sin Referencia";
}
</script>
</head>
<body onUnload="opener.document.salvar.sReferencia.style.background='#FFFFFF';opener.document.salvar.sReferencia.focus();"> <!-- onUnLoad="javascript:PonerReferencia();" -->
<?php

$titulos = array ("Fecha","Referencia","Numero Actividad","Descripcion","Folio","Cantidad","Acumulado");
$reporte = new reporte();
$reporte->opciones($opciones);
$reporte->ponerconsulta($sql,1,$titulos,"Acumulado de Alcances");
echo "<center>";
$result = mysql_query($sql);
if(mysql_fetch_array($result))
        $reporte->visualizar();
  ?>
<input type="button" value="Cerrar" onClick=window.close();>
</center>
</body>
</html>