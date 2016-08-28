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
}
else{
      $conNumeroOrdenBA = "and ba.sNumeroOrden = '$orden'";
      $conNumeroOrdenA = "and a.sNumeroOrden = '$orden'";
      $nomCampoCantidad = "dCantidad";
      $tabla = "actividadesxorden";
}
$sql = "
SELECT
   CASE a.sMedida
      WHEN '' THEN CONCAT(repeat(' ',iNivel),a.sWbs)
      ELSE CONCAT(repeat(' ',iNivel),a.sNumeroActividad)
   END
      AS Partida,
   CONCAT(SUBSTR(a.mDescripcion,1,49),'...') AS Descripcion,
   DATE_FORMAT(a.dFechaInicio,'%d/%m/%Y') as F_Inicio,
   DATE_FORMAT(a.dFechaFinal,'%d/%m/%Y') as F_Final,
   a.sMedida AS Medida,
   CASE a.sMedida
      WHEN '' THEN NULL
      ELSE a.$nomCampoCantidad
   END
      AS Cantidad,
   CONCAT(a.dPonderado,' %') AS Ponderado,
   CONCAT('$ ',(a.dVentaMN)) AS Precio_Unitario,
   CONCAT('$ ',(a.dVentaMN*a.$nomCampoCantidad)) as TOTAL_MN,
   CASE a.sMedida
      WHEN '' THEN NULL
      ELSE
      CASE  (SELECT 
            (SELECT sum(ap.dCantidad)
            FROM anexo_psuministro ap
            inner join anexo_suministro an on (ap.sContrato=an.sContrato and ap.iFolio=an.iFolio)
            inner join movimientosdealmacen ti on (ti.sIdTipo = an.sIdTipo)
            WHERE ap.sContrato=a.sContrato and ap.sNumeroActividad=a.sNumeroActividad) 
         IS NULL)
            WHEN 0 THEN
                @suministro:= (SELECT sum(ap.dCantidad)
                        FROM anexo_psuministro ap
                        inner join anexo_suministro an on (ap.sContrato=an.sContrato and ap.iFolio=an.iFolio)
                        inner join movimientosdealmacen ti on (ti.sIdTipo = an.sIdTipo)
                        WHERE ap.sContrato=a.sContrato and ap.sNumeroActividad=a.sNumeroActividad )
            ELSE
                @suministro:=0
      END

   END
      AS Suministrado,
    CASE a.sMedida
      WHEN '' THEN NULL
      ELSE CONCAT('$' ,(a.dVentaMN*@suministro))
   END as Total_Suministrado,

   
   CASE a.sMedida
      WHEN '' THEN NULL
      ELSE
      CASE  (SELECT (SELECT CASE sum(ba.dCantidad) WHEN NULL THEN 0 ELSE sum(ba.dCantidad) END as CAnt FROM bitacoradeactividades ba where ba.sContrato=a.sContrato and ba.sNumeroActividad=a.sNumeroActividad and ba.dIdFecha<='$Fecha' $conNumeroOrdenBA) IS NULL)
            WHEN 0 THEN
                @reportado:=(SELECT CASE sum(ba.dCantidad) WHEN NULL THEN 0 ELSE sum(ba.dCantidad) END as CAnt FROM bitacoradeactividades ba where ba.sContrato=a.sContrato and ba.sNumeroActividad=a.sNumeroActividad and ba.dIdFecha<='$Fecha' $conNumeroOrdenBA)
            ELSE
                @reportado:=0
      END

   END
      AS Reportado,
    CASE a.sMedida
      WHEN '' THEN NULL
      ELSE CONCAT('$',(a.dVentaMN * @reportado))
   END as Total_Reportado,

   CASE a.sMedida
      WHEN '' THEN NULL
      ELSE
      CASE  (SELECT (
               select CASE sum(e1.dCantidad) WHEN NULL THEN 0 ELSE sum(e1.dCantidad) END as CAnt2
               from estimacionxpartida e1  
               where e1.sContrato=a.sContrato and e1.sNumeroActividad=a.sNumeroActividad and e1.sWbs=a.sWbs
               ) 
         IS NULL)
           WHEN 0 THEN
                @generado:=(
               select CASE sum(e1.dCantidad) WHEN NULL THEN 0 ELSE sum(e1.dCantidad) END as CAnt2
               from estimacionxpartida e1  
               where e1.sContrato=a.sContrato and e1.sNumeroActividad=a.sNumeroActividad and e1.sWbs=a.sWbs          
            )
            ELSE
                @generado:=0
      END

   END
      AS Generado,
    CASE a.sMedida
      WHEN '' THEN NULL
      ELSE CONCAT('$',(a.dVentaMN * @generado))
   END as Total_Generado
   
FROM $tabla  a
WHERE a.sContrato='$sContrato' $conNumeroOrdenA
AND a.sIdConvenio='$convenio' order by  $orderBy  ;";
//exit();
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
$pdf->setPrefijo("reports/reportado_vs_generado_");
$pdf->AliasNbPages();
$pdf->connect($Servidor,$Usuario,$Clave,$BaseDatos);
$attr=array('titleFontSize'=>18,'titleText'=>'Status de Actividades');

$pdf->mysql_report("$sql",false,$attr);
//CONCAT('$',FORMAT(CAST(a.dVentaMN  AS UNSIGNED),4)) as PU,
?>
