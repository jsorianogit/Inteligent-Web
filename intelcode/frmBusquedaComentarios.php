<?php
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("dbgrids.inc.php");
use_unit("dbtables.inc.php");
use_unit("db.inc.php");
$sContrato = "ot-12.b.1";
$sIdConvenio = "";
//Class definition
class Unit1 extends Page
{
   public $gridFotografico = null;
   public $Image1 = null;
   public $txtNumeroReporte = null;
   public $dsBitacora = null;
   public $qryBitacora = null;
   public $Label1 = null;
   public $txtTexto = null;
   public $Label2 = null;
   public $gridComentarios = null;
   public $Button1 = null;
   public $Panel1 = null;
   public $MemoComentarios = null;
   public $Database1 = null;
   public $dsReporteFotografico = null;
   public $qryReporteFotografico = null;
   public $Button2 = null;
   public $chkAlbum = null;
   public $qryBusca = null;
    public $memoDescripcionFoto = null;

   function Button2Click($sender, $params)
   {
      $this->BuscarComentario();
   }
   function BuscarComentario()
   {
      global $sContrato, $sIdConvenio;

      $texto = $this->txtTexto->getText();

      if(empty($texto))
         $texto = "-_-_-_-_-_";#Solo para formShow

      if($this->chkAlbum->Checked == false)
      {
         $sql = "Select
              b.iIdDiario,
              b.sNumeroOrden,
              b.dIdFecha,
              b.sIdTurno,
              b.sIdDepartamento,
              b.mDescripcion,
              r.sNumeroReporte,
              r.sIdConvenio
            from bitacoradeactividades b
                           INNER JOIN tiposdemovimiento t ON (
                            b.sContrato = t.sContrato
                            And b.sIdTipoMovimiento = t.sIdTipoMovimiento
                            And t.sClasificacion = 'Notas'
                           )
                           INNER JOIN reportediario r ON (
                            r.sContrato = b.sContrato
                            And r.sNumeroOrden = b.sNumeroOrden
                            And r.dIdFecha = b.dIdFecha
                            And r.sIdTurno = r.sIdTurno
                           )
                           Where
                            b.sContrato = '$sContrato'
                            And b.mDescripcion LIKE '%$texto%'
                            order by b.sNumeroOrden, b.dIdFecha";

      }
      else
      {
         $sql = "Select
                    r.sNumeroOrden,
                    r.sIdConvenio,
                    r.sIdTurno,
                    r.dIdFecha,
                    b.*
                  from reportefotografico b
                  INNER JOIN reportediario r ON (
                    r.sContrato = b.sContrato
                    And r.sNumeroReporte = b.sNumeroReporte
                  )
                  Where
                    b.sContrato =  '$sContrato'
                    And b.sDescripcion
                    LIKE '%$texto%'
                    order by r.sNumeroOrden,
                    r.dIdFecha";
      }
      $this->qryBitacora->Active = False;
      $this->qryBitacora->setSQL($sql);
      $this->qryBitacora->open();
   }
   function BuscarComentarioFotografico($sender, $params)
   {
      #Variable Global
      global $sContrato, $sIdConvenio;
      #obtener de la llamada de Ajax
      $sNumeroReporte = $params;
      #Mostrar los comentarios
      $this->qryBusca->Active = false;
      if($this->chkAlbum->Checked)
         $this->qryBusca->setSQL("
          select sDescripcion from reportefotografico
          where sContrato ='$sContrato' and sNumeroReporte = '$sNumeroReporte' "
         );
      else
         $this->qryBusca->setSQL("
          select mDescripcion as sDescripcion from reportediario r
          inner join bitacoradeactividades b on (
            r.sContrato=b.sContrato and r.dIdFecha=b.dIdFecha
            and r.sNumeroOrden=b.sNumeroOrden and r.sIdTurno=b.sIdTurno
          )
          where r.sContrato ='$sContrato' and r.sNumeroReporte = '$sNumeroReporte' "
         );
      $this->qryBusca->open();
      if($this->qryBusca->RecordCount > 0)
      {
         $this->MemoComentarios->setLines($this->qryBusca->Fields['sDescripcion']);

      }

      #Mostrar la imagen en pantalla
      $sql = "Select
                  iImagen,
                  substr(sDescripcion,1,255) as sDescripcion
                From
                  reportefotografico
                Where
                  sContrato = '$sContrato'
                  And sNumeroReporte = '$sNumeroReporte'
                  Order By iImagen";

      //$this->MemoComentarios->setLines($sql);
      $this->qryReporteFotografico->Active = False;
      $this->qryReporteFotografico->setSQL($sql);
      $this->qryReporteFotografico->open();

   }
   function mostrarImagen($sender, $params)
   {
      global $sContrato;
      $split = split(",", $params);
      $sNumeroReporte = $split[0];
      $iImagen = $split[1];

      $sql = "Select
                  iImagen,
                  bImagen ,
                  substr(sDescripcion,1,255) as sDescripcion
                From
                  reportefotografico
                Where
                  sContrato = '$sContrato'
                  And sNumeroReporte = '$sNumeroReporte'
                  and iImagen = '$iImagen'
                  Order By iImagen";

      $rs = mysql_query($sql);
      if($row = mysql_fetch_array($rs))
      {
         $this->memoDescripcionFoto->setLines($row["sDescripcion"] );
         if($row["bImagen"] != "")
         {
            $this->Image1->ImageSource = "";
            $FileName = "cambiarLogo/$iImagen" . "." . "$iImagen.jpg";
            if(file_exists($FileName))
               unlink($FileName);

            $iImagen = $rw["iImagen"];

            $file = fopen($FileName, "w");
            fwrite($file, $row["bImagen"]);
            fclose($file);
            if(file_exists($FileName))
            {
               $this->Image1->ImageSource = $FileName;
            }
            else
               $this->Image1->ImageSource = "recursos/imagenes/intelcode.png";
         }
      }
   }
   function Unit1Show($sender, $params)
   {
      $this->BuscarComentario();
      $this->BuscarComentarioFotografico("", "");
      $this->mostrarImagen("", "");
   }
   function gridComentariosJSClick($sender, $params)
   {
      ?>

               //Add your javascript code here
                  var iColumnaNumeroReporte = 1;
                  var sNumeroReporte =0;

                  gridComentarios.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = gridComentarios.getTableModel();
                        sNumeroReporte = tableModel.getValue(iColumnaNumeroReporte, index);
                        }
                  );
                  params = sNumeroReporte;


      <?php
      echo $this->gridComentarios->ajaxCall("BuscarComentarioFotografico", array(),
      array(
            "Panel1",
            "MemoComentarios",
            "gridComentarios",
            "gridFotografico",
            "txtNumeroReporte",
            "chkAlbum",
            "memoDescripcionFoto")
      );
      ?>

                 return false;
      <?php
   }
   function gridFotograficoJSClick($sender, $params)
   {
      ?>
               //Add your javascript code here
                  var iColumnaNumeroReporte = 1;
                  var sNumeroReporte = -1;
                  var iColumnaImagen = 0;
                  var iImagen = -1;

                  gridFotografico.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = gridFotografico.getTableModel();
                        iImagen = tableModel.getValue(iColumnaImagen, index);
                        }
                  );

                  gridComentarios.getSelectionModel().iterateSelection(
                     function(index) {
                        var tableModel = gridComentarios.getTableModel();
                        sNumeroReporte = tableModel.getValue(iColumnaNumeroReporte, index);
                        }
                  );

                  params = sNumeroReporte +","+ iImagen;
      <?php
      echo $this->gridFotografico->ajaxCall("mostrarImagen", array(),
      array(
            "Panel1",
            "MemoComentarios",
            "gridComentarios",
            "Image1",
            "chkAlbum",
            "memoDescripcionFoto")
      );
      ?>

                 return false;
      <?php
   }
}

global $application;

global $Unit1;

//Creates the form
$Unit1 = new Unit1($application);

//Read from resource file
$Unit1->loadResource(__FILE__);

//Shows the form
$Unit1->show();

?>
