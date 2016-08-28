
function confirmaEliminar(valor){
	
	Enviar = confirm("Desea elimar el registro: "+valor+" ?");
    if (Enviar !="0")
   		location.href="index.php?reqsIdTurno="+valor+"&operacion=b";
  
}

function Cancelar()
{
	document.Turnos.reset();
	document.location="index.php";
}