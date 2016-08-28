function confirmaEliminarPersonal(valor){
	
	Enviar = confirm("Desea elimar el registro: "+valor+" ?");
    if (Enviar !="0")
   		location.href="formpersonal.php?reqsIdPersonal="+valor+"&operacion=b";
  
}

function confirmaEliminarPaquete(valor){
	
	Enviar = confirm("Desea elimar el registro: "+valor+" ?");
    if (Enviar !="0")
   		location.href="index.php?reqsNumeroPaquete="+valor+"&operacion=b";
  
}
/*Separador*/
function Separador()
{
	var valores;
	var Cadena=document.personal.sDescripcion.value;
	var i=0;
	if(Cadena!="")
	{
		valores=Cadena.split("|");
		document.personal.sIdPersonal.value=valores[0];
		document.personal.sMedida.value=valores[1];
		document.personal.iJornada.value=valores[2];
		
	}
}