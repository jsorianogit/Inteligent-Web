function confirmaEliminar(sInstalacion){
	
	Enviar = confirm("Desea elimar el registro:  "+sInstalacion+"?");
    if (Enviar !="0")
   		location.href="index.php?reqsInstalacion="+sInstalacion+"&operacion=b";
  
}
