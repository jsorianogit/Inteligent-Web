
function confirmaEliminar(valor,valor2){
	
	Enviar = confirm("Desea elimar el registro: "+valor+" ?");
    if (Enviar !="0")
   		location.href="index.php?reqsNumeroOrden="+valor+"&reqdIdFecha="+valor2+"&operacion=b";
  
}

