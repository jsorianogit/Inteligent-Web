
<HEAD>

<SCRIPT LANGUAGE="JavaScript">
<!-- Original:  William Humphreys (billy@technical-solutions.co.uk) -->

<!-- This script and many more are available free online at -->
<!-- The JavaScript Source!! http://javascript.internet.com -->

<!-- Begin
function changeCase(frmObj) {
var index;
var tmpStr;
var tmpChar;
var preString;
var postString;
var strlen;
tmpStr = frmObj.value.toLowerCase();
strLen = tmpStr.length;
if (strLen > 0)  {
for (index = 0; index < strLen; index++)  {
if (index == 0)  {
tmpChar = tmpStr.substring(0,1).toUpperCase();
postString = tmpStr.substring(1,strLen);
tmpStr = tmpChar + postString;
}
else {
tmpChar = tmpStr.substring(index, index+1);
if (tmpChar == " " && index < (strLen-1))  {
tmpChar = tmpStr.substring(index+1, index+2).toUpperCase();
preString = tmpStr.substring(0, index+1);
postString = tmpStr.substring(index+2,strLen);
tmpStr = preString + tmpChar + postString;
         }
      }
   }
}
frmObj.value = tmpStr;
}
//  End -->
</script>
</HEAD>


<BODY>

<center>
<form name=form>
<input type=text name=box value="escriba aquí">
<input type=button value="Convertir" onClick="javascript:changeCase(this.form.box)">
</form>
</center>

<p><center>
