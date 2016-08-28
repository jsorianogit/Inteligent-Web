/*Cancela la insercion/modificacion*/
function Cancelar(){
	location.href="index.php";
}
/*Verifica que se lleno completamente el formulario*/
function CamposLlenos(){
    if (document.programa.dIdFecha.value=="")	
    {
     	alert("Falta la fecha");
     	document.programa.dIdFecha.focus();
    }
	else if (document.programa.dCantidad.value=="") 		
	{
     	alert("Falta la cantidad");
    	document.programa.dCantidad.focus();
	}
	else
	{
        Enviar = confirm("Si realmente desea continuar, acepte")
        if (Enviar !="0")
        	document.programa.submit();  	
	}
		
}


/*confirma borrado*/
function confirmaEliminar(valor){
	
	Enviar = confirm("Desea elimar el registro: "+valor+" ?");
    if (Enviar !="0")
   		location.href="index.php?reqdIdFecha="+valor+"&operacion=b";
  
}
/*optiene el sIdPersonal*/
function CategoriaID()
{
	var sIdPersona;
	var Cadena=document.Personal.sIdTipoPersonal.value;
	if(Cadena!="")
	{
		sIdPersonal=Cadena.split("|")
		document.Personal.sIdPersonal.value=sIdPersonal[1]+document.Personal.iItemOrden.value;
	}
	else
	{
		document.Personal.sIdPersonal.value="";	
	}
}

