function confirmaEliminar(valor){
	
	Enviar = confirm("Desea elimar el registro: "+valor+" ?");
    if (Enviar !="0")
   		location.href="index.php?reqsIdTipoConvenio="+valor+"&operacion=b";
  
}
