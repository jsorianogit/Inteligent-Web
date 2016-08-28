function fn(form,field)
{
	var next=0, found=false
	var f=form
	if(event.keyCode!=13) return;
	for(var i=0;i<f.length;i++) {
		if(field.name==f.item(i).name){
			next=i+1;
			found=true
			break;
		}
	}
	while(found){
		if( f.item(next).disabled==false && f.item(next).type!='hidden'){
			f.item(next).focus();
			break;
		}
		else{
			if(next<f.length-1)
				next=next+1;
			else
				break;
		}
	}
}

function handleEnter (field, event) {
	 var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
    if (keyCode == 13) {
	    var i;
   	 for (i = 0; i < field.form.elements.length; i++)
    		if (field == field.form.elements[i])
    			break;
    	i = (i + 1) % field.form.elements.length;
   	field.form.elements[i].focus();
   	return false;
   }
   else
   	return true;
   }     