
function confirmaEliminarEquipo(valor){
	
	Enviar = confirm("Desea elimar el registro: "+valor+" ?");
    if (Enviar !="0")
   		location.href="formequipo.php?reqsIdEquipo="+valor+"&operacion=b";
  
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
	var Cadena=document.equipo.sDescripcion.value;
	var i=0;
	if(Cadena!="")
	{
		valores=Cadena.split("|");
		document.equipo.sIdEquipo.value=valores[0];
		document.equipo.sMedida.value=valores[1];
		document.equipo.iJornada.value=valores[2];
		
	}
}