<?php
session_start();
require("contrato.inc.php");
set_time_limit(0); 
unset($arrayContratos);
unset($arrayDatabase);
$tablas = array ("reportediario","reportefotografico","bitacoradeactividades","bitacoradepersonal","bitacoradeequipos","bitacoradepaquetes","avancesglobales","avancesglobalesxorden","tramitedepermisos","jornadasdiarias");

$contrato = new contrato();
if(($fecha = $_POST['fecha']) == ""){
  echo "<center><a href='index.php'>No se especifico una fecha !</a><center>";
  exit(0);
}

if(($con = $_POST['contrato'])==""){
   $result = mysql_query("select sContrato from contratosxusuario where sIdUsuario ='".$_SESSION['ssUsuario']."'");
   while($row = mysql_fetch_array($result)){
      $arrayContratos[] = $row[0];
   }

}
else
   $arrayContratos[] = $con;
   
if(($data = $_POST['database'])==""){
   $result = mysql_query("show databases like 'intel%'");
   while($row = mysql_fetch_array($result)){
      $arrayDatabase[] = $row[0];
   }
}
else
   $arrayDatabase[] = $data;

foreach($arrayDatabase as $datas){
   foreach($arrayContratos as $contratos){
      $contrato->nuevaexportacion($contratos,$tablas,$datas,$fecha);
      $contrato->exportaContrato();
   }
}
mysql_select_db($BaseDatos);
//location('index.php');
?>
<script language="javascript">
	opener.document.location="../menu/";
</script>
<?php
closewindow();
?>