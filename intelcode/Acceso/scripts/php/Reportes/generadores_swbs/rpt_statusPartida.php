<?php
#conexion con el servidr
require("../../../../../Modulos/include/mysql.inc.php");

#variables requeridas
/*echo "<br>c: ".*/$filtro = $_REQUEST['filtro'];
/*echo "<br>c: ".*/$sContrato=$_REQUEST['contract'];
/*echo "<br>c: ".*/$convenio = $_REQUEST['convenio'];
/*echo "<br>c: ".*/$Fecha=$_REQUEST['Fecha'];
/*echo "<br>c: ".*/$orden = $_REQUEST['orden'];;
/*echo "<br>c: ".*/$ordenar = $_REQUEST['ordenar'];


#crear la consulta para el reporte
switch($ordenar){
   case('ANEXO'):
      $orderBy = "iItemOrden";
   break;
   case('PONDERADO'):
      $orderBy = "dPonderado DESC";
   break;
   default:
      $orderBy = "(dVentaMN * dCantidadAnexo) DESC";
   break;
}

if(strpos($orden ,"CONTRATO")!==false){
      $conNumeroOrdenA = $conNumeroOrden = "";
      $tabla = "actividadesxanexo";
      $nomCampoCantidad = "dCantidadAnexo";
      $sqlAvance =   "Select
                        ROUND((sum(bac.dAvance) * ao.dCantidad)/@Cantidad,4) as avance
                      From bitacoradeactividades bac
                        INNER JOIN actividadesxorden ao ON (
                           ao.sContrato = bac.sContrato
                           And ao.sNumeroOrden = bac.sNumeroOrden
                           And ao.sWbs = bac.sWbs
                           And ao.sNumeroActividad = bac.sNumeroActividad
                           And ao.sIdConvenio = '$convenio'
                           And ao.sTipoActividad = 'Actividad' )
                     Where
                          bac.sContrato = '$sContrato'
                          And bac.sNumeroActividad = a.sNumeroActividad
                          And bac.sWbs = a.sWbs
                          And bac.dIdFecha <= '$Fecha'
                          And ao.sTipoActividad='Actividad'
                     Group By bac.sWbs";//And bac.sWbs = a.sWbs
//      $sqlAvance = " ((100*@install)/@Cantidad) ";
}
else{
      $conNumeroOrdenBA = "and ba.sNumeroOrden = '$orden'";
      $conNumeroOrdenA = "and a.sNumeroOrden = '$orden'";
      $nomCampoCantidad = "dCantidad";
      $tabla = "actividadesxorden";
      $sqlAvance = "SELECT sum(ba.dAvance)
                    FROM bitacoradeactividades ba
                    where
                        ba.sContrato=a.sContrato
                        and ba.sNumeroActividad=a.sNumeroActividad
                        and ba.sWbs=a.sWbs
                        and ba.dIdFecha<='$Fecha'
                        and ba.lAlcance='No'
                        $conNumeroOrdenBA";
}

 $sql = "
SELECT
   CASE a.sMedida
      WHEN '' THEN CONCAT(repeat(' ',iNivel),a.sWbs)
      ELSE CONCAT(repeat(' ',iNivel),a.sNumeroActividad)
   END
      AS Partida,
   CONCAT(SUBSTR(a.mDescripcion,1,49),'...') AS Descripcion,
   a.sMedida AS Medida,
   CASE a.sMedida
      WHEN '' THEN NULL
      ELSE @Cantidad := a.$nomCampoCantidad
   END
      AS Cantidad,
   CONCAT(a.dPonderado,' %') AS Ponderado,
   TRIM(CONCAT('$  ',a.dVentaMN)) AS Precio_Unitario,
   CASE a.sMedida
      WHEN '' THEN NULL
      ELSE
      CASE  (SELECT (SELECT CASE sum(ba.dCantidad) WHEN NULL THEN 0 ELSE sum(ba.dCantidad) END as CAnt FROM bitacoradeactividades ba where ba.sContrato=a.sContrato and ba.sNumeroActividad=a.sNumeroActividad and ba.dIdFecha<='$Fecha' and ba.sWbs=a.sWbs $conNumeroOrdenBA) IS NULL)
            WHEN 0 THEN
                @install:=(SELECT CASE sum(ba.dCantidad) WHEN NULL THEN 0 ELSE sum(ba.dCantidad) END as CAnt FROM bitacoradeactividades ba where ba.sContrato=a.sContrato and ba.sNumeroActividad=a.sNumeroActividad and ba.dIdFecha<='$Fecha' and ba.sWbs=a.sWbs $conNumeroOrdenBA)
            ELSE
                @install:=0
      END

   END
      AS Instalado,
   CASE a.sMedida
      WHEN '' THEN NULL
      ELSE
          CASE
              WHEN @install>a.$nomCampoCantidad THEN (@install-a.$nomCampoCantidad)
              ELSE 0.0000
          END
   END
      AS Excedente,
   CASE a.sMedida
        WHEN '' THEN NULL
        ELSE
        CASE
            WHEN @install = NULL THEN a.$nomCampoCantidad
            WHEN @Install>a.$nomCampoCantidad THEN 0.0000
            ELSE
                a.$nomCampoCantidad - @Install
        END
   END
      AS Pendiente,
   CASE
       WHEN a.sMedida='' THEN ''
       WHEN @Install>a.$nomCampoCantidad THEN '100.0000 %'
       ELSE
       CASE (SELECT ($sqlAvance) IS NULL)
            WHEN 0 THEN
                 CONCAT(($sqlAvance),' %')
            ELSE
                '0.000 %'
       END
   END
      as Avance
FROM $tabla  a
WHERE a.sContrato='$sContrato' $conNumeroOrdenA
AND a.sIdConvenio='$convenio' order by  $orderBy  ;";
  $file = fopen("query.sql","w+");
   fwrite($file,$sql);
   fclose($file);

#borrar antiguo documento
if(file_exists("status_partidas_de_$sContrato.pdf"))
   unlink("status_partidas_de_$sContrato.pdf");

#clase fpdf
define(FPDF_FONTPATH,'../fpdf153/font/');
require('../fpdf153/fpdf.php');

#cabezera del documento
require('rpt_encabezado_Pie.php');
#clase que crea un reporte sencillo
require("reporte.inc.php");
#redefinicion de metodos


$pdf = new rPDF('L','pt','LETTER');
$pdf->SetFont('Arial','',8);
$pdf->setPrefijo("reports/status_partidas_de_");
$pdf->AliasNbPages();
$pdf->connect($Servidor,$Usuario,$Clave,$BaseDatos);
$attr=array('titleFontSize'=>18,'titleText'=>'Status de Actividades');


$pdf->mysql_report("$sql",false,$attr);
//CONCAT('$',FORMAT(CAST(a.dVentaMN  AS UNSIGNED),4)) as PU,
?>
