function init(){
//	for(var i=2; i<=4; i++){
		document.getElementById('contenido2').style.display = 'none';
//	}

}
function viewSection(id,total){
	for (var i=1; i<=total; i++){
		if(i!=id){
			document.getElementById('contenido'+i).style.display = 'none';
		}else{
			document.getElementById('contenido'+i).style.display = 'block';
		}
	}
}