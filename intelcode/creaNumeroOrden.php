<?php
//require ("generadores.inc.php");
?>
<html>
<head>
<style>
body {
   background:"#FFAA00";
   font: 50% Verdana, Arial, Sans-Serif;
   font-size:10;
}
</style>
 <script>
//Cajas de Chekeo
   function actualizarCampo(TotalCajitas){
      var checados ="";
      var i=1;
      for(i=1;i<=TotalCajitas;i++){
         var cajita = document.getElementById("Cajita" + i);
         if(cajita.checked==true){
            if (checados !="") {
               var temp = checados ;
               checados ="";
               checados = temp + "-" + cajita.value;
            }
            else
               checados = cajita.value;
         }
      }
      //parent.document.estimaciones.sFaseObra.value = checados;

   }
   function VerificarChecados(TotalCajitas){
      setInterval("actualizarCampo("+TotalCajitas+")",100);
   }
   </script>
</head>
<body>
<center><b><font color="#0000FF"> Fases de Obra Afectadas</font></b></center>
<script>

   var nom = navigator.appName;
   var sFase = "0" ;//parent.document.estimaciones.sFaseObra.value ;
   if (nom == "Microsoft Internet Explorer"){
      var evento = "onclick";
   }
   else if (nom == "Netscape"){
      var evento = "onchange";
   }
   else {
      var evento = "onchange";
   }
   document.writeln("<form name='cajas'>");
   <?php
      $i=1;
      mysql_connect("localhost","root","danae");
      mysql_select_db("intelcode");
     $sql = "select sNumeroOrden from ordenesdetrabajo where sContrato='428237819' order by sNumeroOrden";
      $result = mysql_query($sql);
      while($row = mysql_fetch_array($result)){
     echo "//". $sDescripcion = substr($row[0],0,(strlen($row[0])-2)) ;
   ?>

      if(sFase.indexOf("<?php echo $sDescripcion ?>")>=0)
      { paloma = "checked";  }
      else { paloma=""; }
      document.writeln("<input type='checkbox' name='Cajita<?php echo $i?>' id='Cajita<?php echo $i?>' value='<?php echo $row[0]?>' " + paloma + " " + evento +"='VerificarChecados(<?php echo mysql_num_rows($result)?>)' ><?php echo $row[0]?><br>");

   <?php
   $i++;
   }
   ?>
   document.writeln("</font>");
   document.writeln("</form>");

</script>

</body>
</html>
