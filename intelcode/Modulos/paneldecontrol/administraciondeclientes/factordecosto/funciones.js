function confirmaEliminar(anio,mes){
	
	Enviar = confirm("Desea elimar el registro: Año: "+anio+" Mes:"+mes+"?");
    if (Enviar !="0")
   		location.href="index.php?reqiAnno="+anio+"&reqiMes="+mes+"&operacion=b";
  
}
