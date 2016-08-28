function init(){
	for(var i=2; i<=2; i++){
		document.getElementById('contenido'+i).style.display = 'none';
	}
}
function viewSection(id){
	
	for (var i=1; i<=2; i++){
		if(i!=id){
			document.getElementById('contenido'+i).style.display = 'none';
		}else{
			document.getElementById('contenido'+i).style.display = 'block';
		}
	}
	alert("Hola ");
}
