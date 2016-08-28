<html>
<style>
body {
	background:"#FFAA00";
	font: 50% Verdana, Arial, Sans-Serif;
	font-size:10;
}
</style>
<body>
<center><b><font color="#0000FF"> Fases de Obra Afectadas</font></b></center>
<script>
//Cajas de Chekeo
	function VerificarChecados(){
		var checados ="";
		//Arquitectura
		if(document.cajas.ARQUITECTURA.checked==true){
			if (checados !="")
				checados = checados + "-" + document.cajas.ARQUITECTURA.value;
			else
				checados = document.cajas.ARQUITECTURA.value;
		}
		//Asbult
		if(document.cajas.ASBUILT.checked==true){
			if (checados !="")
				checados = checados + "-" + document.cajas.ASBUILT.value;
			else
				checados = document.cajas.ASBUILT.value;
		}
		//Capacitacion
		if(document.cajas.CAPACITACION.checked==true){
			if (checados !="")
				checados = checados + "-" + document.cajas.CAPACITACION.value;
			else
				checados = document.cajas.CAPACITACION.value;
		}
		//Civil
		if(document.cajas.CIVIL.checked==true){
			if (checados !="")
				checados = checados + "-" + document.cajas.CIVIL.value;
			else
				checados = document.cajas.CIVIL.value;
		}
		//Electrica
		if(document.cajas.ELECTRICA.checked==true){
			if (checados !="")
				checados = checados + "-" + document.cajas.ELECTRICA.value;
			else
				checados = document.cajas.ELECTRICA.value;
		}
		//Instrumentacion
		if(document.cajas.INSTRUMENTACION.checked==true){
			if (checados !="")
				checados = checados + "-" + document.cajas.INSTRUMENTACION.value;
			else
				checados = document.cajas.INSTRUMENTACION.value;
		}
		//Mecanica
		if(document.cajas.MECANICA.checked==true){
			if (checados !="")
				checados = checados + "-" + document.cajas.MECANICA.value;
			else
				checados = document.cajas.MECANICA.value;
		}
		//Seguridad
		if(document.cajas.SEGURIDAD.checked==true){
			if (checados !="")
				checados = checados + "-" + document.cajas.SEGURIDAD.value;
			else
				checados = document.cajas.SEGURIDAD.value;
		}
		//Tuberias
		if(document.cajas.TUBERIAS.checked==true){
			if (checados !="")
				checados = checados + "-" + document.cajas.TUBERIAS.value;
			else
				checados = document.cajas.TUBERIAS.value;
		}
		parent.document.estimaciones.sFaseObra.value = checados;
	}
	var sFase =  parent.document.estimaciones.sFaseObra.value ;
	
	if(sFase.indexOf("ARQUITECTURA")>=0) Arquitectura = "checked";else Arquitectura="";
	document.writeln("<form name='cajas'>");
	document.writeln("<input type='checkbox' name='ARQUITECTURA' value='ARQUITECTURA' "+Arquitectura+" onChange='VerificarChecados()'><font size='-12'>Arquitectura<br>");
	
	if(sFase.indexOf("ASBUILT")>=0) Asbult = "checked";else Asbult="";
	document.writeln("<input type='checkbox' name='ASBUILT' value='ASBUILT' "+Asbult+" onChange='VerificarChecados()'>Asbuilt<br>");
	
	if(sFase.indexOf("CAPACITACI")>=0) Capacitacion = "checked";else Capacitacion="";
	document.writeln("<input type='checkbox' name='CAPACITACION' value='CAPACITACIÓN' "+Capacitacion+" onChange='VerificarChecados()'>Capacitacion<br>");
	
	if(sFase.indexOf("CIVIL")>=0) Civil = "checked";else Civil="";
	document.writeln("<input type='checkbox' name='CIVIL' value='CIVIL' "+Capacitacion+" onChange='VerificarChecados()'>Civil<br>");
	
	if(sFase.indexOf("ELECTRICA")>=0) Electrica = "checked";else Electrica="";
	document.writeln("<input type='checkbox' name='ELECTRICA' value='ELECTRICA'"+Electrica+" onChange='VerificarChecados()'>Electrica<br>");
	
	if(sFase.indexOf("INSTRUMENTAC")>=0) Instrumentacion = "checked";else Instrumentacion="";
	document.writeln("<input type='checkbox' name='INSTRUMENTACION' value='INSTRUMENTACIÓN' "+Instrumentacion+" onChange='VerificarChecados()'>Instrumentacion<br>");
	
	if(sFase.indexOf("MECANICA")>=0) Mecanica =  "checked";else Mecanica="";
	document.writeln("<input type='checkbox' name='MECANICA' value='MECANICA' "+Mecanica+" onChange='VerificarChecados()'>Mecanica<br>");
	
	if(sFase.indexOf("SEGURIDAD")>=0) Seguridad = "checked";else Seguridad="";
	document.writeln("<input type='checkbox' name='SEGURIDAD' value='SEGURIDAD' "+Seguridad+" onChange='VerificarChecados()'>Seguridad<br>");
	
	if(sFase.indexOf("TUBERIAS")>=0) Tuberias = "checked";else Tuberias="";
	document.writeln("<input type='checkbox' name='TUBERIAS' value='TUBERIAS' "+Tuberias+" onChange='VerificarChecados()'>Tuberias<br>");
	document.writeln("</font>");
	document.writeln("</form>");

</script>

</body>
</html>