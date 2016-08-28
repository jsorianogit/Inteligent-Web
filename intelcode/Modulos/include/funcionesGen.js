//Simulador Tab con la tecla enter
function tab(form,field,event){
    var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
    if (keyCode == 13) {
       var i;
         for (i = 0; i < field.form.elements.length; i++)
         if (field == field.form.elements[i])
            break;
      i = (i + 1) % field.form.elements.length;
      var j = i;

      if(field.form.elements[i].type =="hidden" || field.form.elements[i].disabled==true)
      {
         for (j = i; j < field.form.elements.length; j++)
            if (field.form.elements[j].type !="hidden" && field.form.elements[j].disabled==false)
               break;   
      }
      if(field.form.elements[j].type !="select-one"){
         field.form.elements[j].select();
        }
        field.form.elements[j].focus();
   }
} 
//onKeyPress="return solonumeros(event);" 
function solonumeros(form,field,e)
 {
      var keyCode = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;
      if (keyCode == 13) {
         tab(form,field,e);
         return false;
         }
      tecla = (document.all)?e.keyCode:e.which;
      patron = /\d/;
      if (tecla==8) return true;
      if (tecla==0) return true;
      if (tecla==9) return true;
      if (tecla==46) return true;
      return patron.test(String.fromCharCode(tecla)); 
}
//onKeyPress="return NoComillas(event);"
function NoComillas(form,field,e)
{  
   //alert("NoComillas " + field.form.elements[1].name);
      var keyCode = e.keyCode ? e.keyCode : e.which ? e.which : e.charCode;
      if (keyCode == 13) {
         tab(form,field,e);
         return false;
         }
      tecla = (document.all)?e.keyCode:e.which;
      if (tecla==34) return false;
      if (tecla==39) return false;
      if (tecla==180) return false;
}
//onKeyPress="return Comillas(event);"
function Comillas(e)
{  
     tecla = (document.all)?e.keyCode:e.which;
      if (tecla==34) return false;
      if (tecla==39) return false;
      if (tecla==180) return false;
}
//CamposCompletos
function Enviar(form) {
   for (i = 0; i < form.elements.length; i++) {
      if (form.elements[i].type == "text" && form.elements[i].value != "") { 
         cadena=form.elements[i].value;
         form.elements[i].value=cadena.toUpperCase();//cadena.toLowerCase();
      }
      if (form.elements[i].type == "text" && form.elements[i].value == "") {  
         alert("Por favor complete todos los campos del formulario"); form.elements[i].focus(); 
         return false; 
      }
   }  
form.submit();
}
//Simulador Tab con la tecla enter Nota: solo para etiquetas tipo select
function tabulador(form,field,event){
    var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
    if (keyCode == 13) {
      tab(form,field,event);
      return false;
   }
   else
      return true;
}     
//Simulador Tab con la tecla enter Nota: solo para etiquetas text
function tabuladorText(form,field,event){
    var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
    if (keyCode == 13) {
      tab(form,field,event);
      return false;
   }
   else
      return true;
} 
//Accion cancelar del Formulario
function Cancelar(form,link)
{
   form.reset();
   document.location=link;
}
//mascara para introducir horas
//onKeyPress='return mascara(this.form,this,event);' 
function mascara(form,field,event)
 {
  
    var keyCode = event.keyCode ? event.keyCode : event.which ? event.which : event.charCode;
    if (keyCode == 13 || keyCode == 9 || keyCode == 8 || keyCode == 0) {
       //Procedimiento para validar que el formato de hora es correcto
       //validar que la hora sea mayor o igual que cero y menor que 23
       //validar que los minutos sean mayor o igual que cero y menor que 59
       formato = field.value.split(':');
       horas = formato[0];
       minuto = formato[1];
       if( minuto==null || horas ==null || minuto =="" || horas==""){
            alert("El formato de hora es incorrecto, verifiquelo nuevamente !");
            field.select();
            field.focus();
            return false;
       }
       if ((horas <0 || horas >23) || (minuto<0 || minuto > 59)  || minuto.length != 2 ||  horas.length != 2 ) {
            alert("El formato de hora es incorrecto, verifiquelo nuevamente !");
            field.select();
            field.focus();
            return false;
       }
      //si el formato de hora es correcto, lanzar el tabulador
      tab(form,field,event);
      return false;
   }
      tecla = (document.all)?event.keyCode:event.which;
      //58 Dos  Puntos
      patron = /\d/;
      if (tecla==8) return true;
      if (tecla==0) return true;
      if (tecla==9) return true;
      if (tecla==46) return false;//punto
      //si se esta escribiendo una hora
      //y ya se escribio la HORA, agregar los dos puntos
      if(field.value.length==2){
         valor=':';
         field.value = field.value + valor;
      }
      
      return patron.test(String.fromCharCode(tecla)) ;   
        
}
function mostrarEspera() { 
   if(document.getElementById("pleasewaitScreen")!=null){
      document.all.pleasewaitScreen.style.pixelTop = (document.body.scrollTop + 50); 
      document.all.pleasewaitScreen.style.visibility="visible"; 
   }
}   
function ocultarEspera() {
   if(document.getElementById("pleasewaitScreen")!=null){ 
      document.all.pleasewaitScreen.style.visibility="hidden"; 
   }
} 
function imprimeEspera(){
   document.write('<DIV ID="pleasewaitScreen" STYLE="position:absolute;z-index:5;top:30%;left:42%;visibility:hidden"> <TABLE BGCOLOR="#000000" BORDER=1" BORDERCOLOR="#000000" CELLPADDING="0" CELLSPACING="0" HEIGHT="100" WIDTH="150" ID="Table1"> <TR> <TD WIDTH="100%" HEIGHT="100%" BGCOLOR="silver" ALIGN="CENTER" VALIGN="MIDDLE"><FONT FACE="Arial" SIZE="4" COLOR="blue">Cargando,Espere...</B></FONT></TD></TR></TABLE></DIV>'); 
}
//operaciones con horas
   function padNmb(nStr, nLen){
    var sRes = String(nStr);
    var sCeros = "0000000000";
    return sCeros.substr(0, nLen - sRes.length) + sRes;
   }

   function stringToSeconds(tiempo){
    var sep1 = tiempo.indexOf(":");
    var sep2 = tiempo.lastIndexOf(":");
    var hor = tiempo.substr(0, sep1);
    var min = tiempo.substr(sep1 + 1, sep2 - sep1 - 1);
    var sec = tiempo.substr(sep2 + 1);
    return (Number(sec) + (Number(min) * 60) + (Number(hor) * 3600));
   }

   function secondsToTime(secs){
    var hor = Math.floor(secs / 3600);
    var min = Math.floor((secs - (hor * 3600)) / 60);
    var sec = secs - (hor * 3600) - (min * 60);
    return padNmb(hor, 2) + ":" + padNmb(min, 2) + ":" + padNmb(sec, 2);
   }

   function substractTimes(t1, t2){
    var secs1 = stringToSeconds(t1);
    var secs2 = stringToSeconds(t2);
    var secsDif = secs1 - secs2;
    return secondsToTime(secsDif);
   }
   function compHora(t1, t2){
    var secs1 = stringToSeconds(t1);
    var secs2 = stringToSeconds(t2);
    //var secsDif = secs1 - secs2;
    if(secs1 > secs2)
      return "mayor";
    else if(secs1 == secs2)
      return "igual";
    else if(secs1 < secs2)
      return "menor";

   }
//   function calcT3(){
//    with (document.frm)
//     t3.value = substractTimes(t1.value, t2.value);
//   }
