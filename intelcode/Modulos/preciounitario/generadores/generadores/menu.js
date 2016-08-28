function init(){
	for(var i=1; i<=2; i++){
		document.getElementById('contenido2').style.display = 'none';
		document.getElementById('menu'+i).style.backgroundColor = '#528AC4'; 
	}
}
function viewSection(id,total){
	for (var i=1; i<=total; i++){
		if(i!=id){
			document.getElementById('menu'+i).style.backgroundColor = 'white'; 
		}else{
			document.getElementById('menu'+i).style.backgroundColor = '#528AC4';
		}
	}
	for (var i=1; i<=total; i++){
		if(i!=id){
			document.getElementById('contenido'+i).style.display = 'none';
		}else{
			document.getElementById('contenido'+i).style.display = 'block';
		}
	}
}
