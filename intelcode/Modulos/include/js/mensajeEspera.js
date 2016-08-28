 	function mostrarEspera() 
 	{ 
 		alert("f");
 		document.all.pleasewaitScreen.style.pixelTop = (document.body.scrollTop + 50); 
	 	document.all.pleasewaitScreen.style.visibility="visible"; 
 	}	 
 	function ocultarEspera() 
 	{ 
 		document.all.pleasewaitScreen.style.visibility="hidden"; 
 	} 
	function imprimeEspera(){
 		document.write('<DIV ID="pleasewaitScreen" STYLE="position:absolute;z-index:5;top:30%;left:42%;visibility:hidden"> <TABLE BGCOLOR="#000000" BORDER=1" BORDERCOLOR="#000000" CELLPADDING="0" CELLSPACING="0" HEIGHT="100" WIDTH="150" ID="Table1"> <TR> <TD WIDTH="100%" HEIGHT="100%" BGCOLOR="silver" ALIGN="CENTER" VALIGN="MIDDLE"><FONT FACE="Arial" SIZE="4" COLOR="blue">Cargando,Espere...</B></FONT></TD></TR></TABLE></DIV>'); 
	}
	//imprimeEspera();
	//mostrarEspera();
	//ocultarEspera();
