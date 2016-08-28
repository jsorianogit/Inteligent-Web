function confirmaEliminar(valor){
	
	Enviar = confirm("Desea elimar el registro: "+valor+" ?");
    if (Enviar !="0")
   		location.href="index.php?reqsIdTipoEstimacion="+valor+"&operacion=b";
  
}