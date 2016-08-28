<html>
<body bgcolor = "darkorange">
<head>
<script language="javascript" src="intelcode/Informes/barra_carga_reporte/xp_progress.js">
</script>

</head>
<center>
Espere, se esta generando su reporte...<br><br>
<script type="text/javascript">
var bar=createBar(150,15,"white",1,"black","#333366",85,7,3,"");
</script>
</center>
</body>
</html>

<?php

require_once("C:/Program Files/Apache Software Foundation/Tomcat 7.0/webapps/JavaBridge/java/Java.inc");
require("intelcode/Modulos/include/config.inc.php");

function servidor($url)
{
   global $ServidorWeb;
   $FullUrl =  str_replace($_SERVER['DOCUMENT_ROOT'], "http://$ServidorWeb/", $url);
   return        $FullUrl;

}
require_once("intelcode/fnUtilerias.php");
#formatear fechas
foreach($_REQUEST as $index=>$value)
{
	#echo "$index = $value <br>";
   if(strpos(strtolower($index), strtolower("fecha")) !== false)
   {
      if(strpos($value, "-") !== false)
         $arrayFecha = explode("-", $value);
      if(strpos($value, "/") !== false)
         $arrayFecha = explode("/", $value);

      if(strlen($arrayFecha[0]) == 2)
      {
         if(array_key_exists($index, $_REQUEST))
            $_REQUEST[$index] = formatoFechaPer($value, "Y-m-d");
      }
   }
}
#exit();
##############################################
##############################################
$reportsPath = $_REQUEST['reportesPath'];
$reportes = $raiz."intelcode/Informes/reportes/";
$reportFileName = $_REQUEST['nombreReporte'];
$reportsPath = $reportes . $reportsPath . "/";

$handle = @opendir($jasperReportsLib);

try
{
   #conexcion a traves de JDBC
   $Conn = new Java("org.altic.jasperReports.JdbcConnection");
   $Conn->setDriver("com.mysql.jdbc.Driver");
   $Conn->setConnectString("jdbc:mysql://$Servidor/" . $_SESSION['database']);
   $Conn->setUser($Usuario);
   $Conn->setPassword($Clave);

   #reporte maestro
   $sJcm = new JavaClass("net.sf.jasperreports.engine.JasperCompileManager");
   $report = $sJcm->compileReport($reportsPath . $reportFileName . ".jrxml");

   #parametros del reporte maetro
   $masterParams = new Java("java.util.HashMap");
   foreach($_REQUEST as $index=>$value)
   {
      if($value == "_")
         $masterParams->put($index, "%%");
      else
         $masterParams->put($index, "$value");
   }
   $masterParams->put("SUBREPORT_DIR", "$reportsPath");

   $sJfm = new JavaClass("net.sf.jasperreports.engine.JasperFillManager");
   $print = $sJfm->fillReport($report, $masterParams, $Conn->getConnection());

   if($_REQUEST['sFormato'] == "xls")
   {
      #Exportar en formato xls
      $ext = ".xls";
      if(file_exists($reportsPath . $reportFileName . $ext))
      {
         unlink($reportsPath . $reportFileName . $ext);
      }
      $xlsExporter = new Java("xls.ExportToXls");
      $xlsExporter->setJasperPrint($print);
      $xlsExporter->setFileName($reportsPath . $reportFileName . ".xls");
      $xlsExporter->exportReport();
      mysql_close();

   }
   else
   {
      #Exportar en formato pdf
      $ext = ".pdf";
      if(file_exists($reportsPath . $reportFileName . $ext))
      {
         unlink($reportsPath . $reportFileName . $ext);
      }

      $sJem = new JavaClass("net.sf.jasperreports.engine.JasperExportManager");
      $sJem->exportReportToPdfFile($print, $reportsPath . $reportFileName . ".pdf");
   }
   mysql_close();
   if(file_exists($reportsPath . $reportFileName . $ext))
   {
      ?>
                  <script>document.location.href='<?php echo servidor($reportsPath) . $reportFileName . $ext?>'</script>
      <?php
   }
   echo "done";
}catch(JavaException$ex)
{
   $trace = new Java("java.io.ByteArrayOutputStream");
   $ex->printStackTrace(new Java("java.io.PrintStream", $trace));
   print ("<br><br>");
   print "java stack trace:" . str_replace("\n", "<br>", $trace);
}

?>
