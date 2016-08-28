<?php
require ("../../../../include/reporteador.inc.php"); 
if(isset($_REQUEST['sContrato']))
   $sContrato=$_REQUEST['sContrato'] ; 
if (isset($_REQUEST['sNumeroOrden']))
   $sNumeroOrden = $_REQUEST['sNumeroOrden']; 
if(isset($_REQUEST['sIdTurno']))
   $sIdTurno = $_REQUEST['sIdTurno'];
if(isset($_REQUEST['sIdConvenio']))
   $sIdConvenio=$_REQUEST['sIdConvenio'] ;
if(isset($_REQUEST['dIdFecha']))
   $dIdFecha=$_REQUEST['dIdFecha'] ;
if(isset($_REQUEST['lStatus']))
   $lStatus=$_REQUEST['lStatus'] ;  
?>
<html>
   <head>
   <script>
      function enviar(){
         var   cadena = "sqls.php?sContrato=" + document.frmValida.sContrato.value +"&sIdTurno="+document.frmValida.sIdTurno.value + "&sNumeroOrden=" + document.frmValida.sNumeroOrden.value + "&sIdConvenio=" + document.frmValida.sIdConvenio.value+"&dIdFecha=" + document.frmValida.dIdFecha.value + "&lSatus=" + document.frmValida.lStatus.value  + "&sIdUsuarioValida=" + document.frmValida.sIdUsuarioValida.value + "&sPassword=" + document.frmValida.sPassword.value + "&validar=si"; 

         document.frmValida.submit();
         window.opener.document.location=cadena;
         window.close();
      }
   </script>
   </head>
   <body><!-- JavaScript:parent.window.document JavaScript:parent.window.document-->
      <form name="frmValida" action="sqls.php" method="post"  onSubmit="javascript:window.opener.document.location='../index.php';">
      <!--target="javascript:parent"  onSubmit="javascript:window.close();" -->
      <input type="hidden" name="sContrato" value="<?php echo $sContrato ?>" >
      <input type="hidden" name="sIdConvenio" value="<?php echo $sIdConvenio ?>" >
      <input type="hidden" name="sNumeroOrden" value="<?php echo $sNumeroOrden ?>" >
      <input type="hidden" name="sIdTurno" value="<?php echo $sIdTurno ?>" >
      <input type="hidden" name="dIdFecha" value="<?php echo $dIdFecha ?>" >
      <input type="hidden" name="lStatus" value="<?php echo $lStatus ?>" >
      <table>
         <tr>
            <td>
               Usuario
            </td>
            <td>
               <input type="text" name="sIdUsuarioValida" >
            </td>
         </tr>
         <tr>
            <td>
               Contraseña
            </td>
            <td>
               <input type="password" name="sPassword" >
            </td>
         </tr>
         <tr>
            <td colspan=2>
            <center>
               <input type="submit" value="Aceptar" id="aceptar" name = "aceptar" >
               <!-- onClick="enviar();" -->
               <input type="button" value="Cancelar" name = "cancelar" onClick="window.opener.document.location='../index.php?sNumeroOrden=<?php echo $sNumeroOrden ?>';window.close();">
            </center>
            </td>
         </tr>
      </table>
      </form>
   </body>
</html>
