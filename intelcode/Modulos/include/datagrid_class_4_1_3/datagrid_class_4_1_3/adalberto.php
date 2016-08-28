<html >
<head>
    <meta name="keywords" content="php, datagrid" />
    <meta name="description" content="php datagrid" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHP DG version 4.0.0</title>

</head>

<body>
<?

################################################################################   
## +---------------------------------------------------------------------------+
## | 1. Creating & Calling:                                                    | 
## +---------------------------------------------------------------------------+
  define ("DATAGRID_DIR", "datagrid/");
  define ("PEAR_DIR", "datagrid/pear/");
  
  require_once(DATAGRID_DIR.'datagrid.class.php');
  require_once(PEAR_DIR.'PEAR.php');
  require_once(PEAR_DIR.'DB.php');
##
##  *** creating variables that we need for database connection 
  $DB_USER='root';            /* usually like this: prefix_name             */
  $DB_PASS='danae';                /* must be already enscrypted (recommended)   */
  $DB_HOST='localhost';       	   /* usually localhost                          */
  $DB_NAME='ictradeco';         /* usually like this: prefix_dbName           */

  ob_start();
  $db_conn =& DB::factory('mysql'); 
  $db_conn -> connect(DB::parseDSN('mysql://'.$DB_USER.':'.$DB_PASS.'@'.$DB_HOST.'/'.$DB_NAME));
##  *** put a primary key on the first place 
  $sql=" SELECT    sContrato,sCodigo,mDescripcion,mCliente,bImagen,sIdActivo,sIdResidencia,sUbicacion,mComentarios,
 sCentroGestor,sCentroBeneficio,sPosicionFinanciera,sElementoPEP,sCentroCosto,sFondo,sCuentaMayor,sTipoObra,sPoliza,lStatus  FROM contratos ";
$sql ="select 
 reportediario.sContrato,
 reportediario.dIdFecha,
 reportediario.sNumeroOrden,
 turnos.sDescripcion,
 convenios.sDescripcion,
 reportediario.sNumeroReporte,
 reportediario.lStatus,
 reportediario.sIdUsuario,
 reportediario.sIdUsuarioAutoriza
from reportediario inner join convenios on (reportediario.sContrato=convenios.sContrato and reportediario.sIdConvenio=convenios.sIdConvenio) inner join configuracion on (convenios.sContrato=configuracion.sContrato and convenios.sIdConvenio=configuracion.sIdConvenio) inner join turnos on (reportediario.sContrato=turnos.sContrato) where reportediario.sContrato ='$sContrato'";
##  *** set needed options
  $debug_mode = false;
  $messaging = true;
  $unique_prefix = "s_";  
  
  $dgrid = new DataGrid($debug_mode, $messaging, $unique_prefix, DATAGRID_DIR);
##  *** set data source with needed options
  $default_order_field = "reportediario.sContrato";
  $default_order_type = "ASC";
  $dgrid->dataSource($db_conn, $sql, $default_order_field, $default_order_type);	    
##
##
## +---------------------------------------------------------------------------+
## | 2. General Settings:                                                      | 
## +---------------------------------------------------------------------------+
##  *** set encoding (default - utf8)
  $dg_encoding = "utf8"; 
  $dgrid->setEncoding($dg_encoding);
##  *** set interface language (default - English)
  $dg_language = "es";  // (en) - English, (de) - German, (hr) - Bosnian/Croatian 
  $dgrid->setInterfaceLang($dg_language);
##  *** set direction: "ltr" or "rtr" (default - "ltr")
  $direction = "ltr";
  $dgrid->setDirection($direction);
##  *** set layouts: 0 - tabular(horizontal) - default, 1 - columnar(vertical) 
  $layouts = array("view"=>0, "edit"=>1, "filter"=>1); 
  $dgrid->setLayouts($layouts);
##  *** set other modes ("type" => "link|button|image") 
##  *** "byFieldValue"=>"fieldName" - make the field to be a link to edit mode page
  $modes = array(
      "add"=>array("view"=>true, "edit"=>false, "type"=>"link"),
      "edit"=>array("view"=>true, "edit"=>true, "type"=>"link", "byFieldValue"=>""),
      "cancel"=>array("view"=>true, "edit"=>true, "type"=>"link"),
      "details"=>array("view"=>true, "edit"=>true, "type"=>"link"),
      "delete"=>array("view"=>true, "edit"=>true, "type"=>"image")
  );
  $dgrid->setModes($modes);
##  *** allow mulirow operations
  $multirow_option = true;
  $dgrid->allowMultirowOpeartions($multirow_option);
##  *** set CSS class for datagrid: 
  $css_class = "blue"; // "default" or "blue" or "gray" or "green" or your css file relative path with name
  $css_type = "embedded"; // "embedded" - use embedded classes, "file" - link external css file
  $dgrid->setCssClass($css_class, $css_type);
##  *** set variables that used to get access to the page (like: my_page.php?act=34&id=56 etc.) 
  $http_get_vars = array("sContrato");
  $dgrid->setHttpGetVars($http_get_vars);
##  *** set another datagrid/s unique prefixes (if you use few datagrids on one page)
##  *** format: array("unique_prefix"=>array("view"=>true|false, "edit"=>true|false, "details"=>true|false));
  $anotherDatagrids = array("fp_"=>array("view"=>false, "edit"=>true, "details"=>true));
  $dgrid->setAnotherDatagrids($anotherDatagrids);  
##  *** set DataGrid caption
  $dg_caption = "Contratos";
  $dgrid->setCaption($dg_caption);
##
##
## +---------------------------------------------------------------------------+
## | 3. Printing & Exporting Settings:                                         | 
## +---------------------------------------------------------------------------+
##  *** set printing option: true(default) or false 
  $printing_option = true;
  $dgrid->allowPrinting($printing_option);
##  *** set exporting option: true(default) or false 
  $exporting_option = true;
  $dgrid->allowExporting($exporting_option);
##
##
## +---------------------------------------------------------------------------+
## | 4. Sorting & Paging Settings:                                             | 
## +---------------------------------------------------------------------------+
##  *** set sorting option: true(default) or false 
  $sorting_option = true;
  $dgrid->allowSorting($sorting_option);               
##  *** set paging option: true(default) or false 
  $paging_option = true;
  $rows_numeration = false;
  $numeration_sign = "N #";       
  $dgrid->allowPaging($paging_option, $rows_numeration, $numeration_sign);
##  *** set paging settings
  $bottom_paging = array("results"=>true, "results_align"=>"left", "pages"=>true, "pages_align"=>"center", "page_size"=>true, "page_size_align"=>"right");
  $top_paging = array();
  $pages_array = array(10, 25, 50, 100, 250, 500, 1000);
  $default_page_size = 10;
  $dgrid->setPagingSettings($bottom_paging, $top_paging, $pages_array, $default_page_size);
##
##
## +---------------------------------------------------------------------------+
## | 5. Filter Settings:                                                       | 
## +---------------------------------------------------------------------------+
##  *** set filtering option: true or false(default)
  $filtering_option = true;
  $dgrid->allowFiltering($filtering_option);
##  *** set fields in filtering mode:
  $fill_from_array = array("10000", "250000", "5000000", "25000000", "100000000");
  $filtering_fields = array(
      "reportediario.mDescripcion"=>array("table"=>"contratos", "field"=>"mDescripcion", "source"=>"self", "operator"=>true));
  $dgrid->setFieldsFiltering($filtering_fields);
##
##
## +---------------------------------------------------------------------------+
## | 6. View Mode Settings:                                                       | 
## +---------------------------------------------------------------------------+
##  *** set table properties
//  $vm_table_properties = array("width"=>"90%");
//  $dgrid->setViewModeTableProperties($vm_table_properties);  
##  *** set columns in view mode
  $vm_colimns = array(
      "reportediario.sContrato"=>array("header"=>"Contrato", "width"=>"130px", "type"=>"label", "align"=>"left",   "wrap"=>"nowrap", "text_length"=>"-1", "case"=>"normal"),
      "reportediario.sNumeroOrden"=>array("header"=>"Codigo", "width"=>"130px", "type"=>"label", "align"=>"left",   "wrap"=>"nowrap", "text_length"=>"-1", "case"=>"normal"),
       "reportediario.sNumeroReporte"=>array("header"=>"Logotipo", "type"=>"image",  "req_type"=>"rt", "title"=>"Logo")
  );
  $dgrid->setColumnsInViewMode($vm_colimns);
##
##
## +---------------------------------------------------------------------------+
## | 7. Edit/Details Mode settings:                                            | 
## +---------------------------------------------------------------------------+
##  ***  set settings for edit/details mode 
  $table_name = "contratos";
  $primary_key = "sContrato";  
  $dgrid->setTableEdit($table_name, $primary_key);
##  *** width - optional
//Vista de Detalles
  $em_columns = array(
        "sContrato" =>array("header"=>"Contrato", "type"=>"textbox",  "width"=>"210px", "req_type"=>"rt", "title"=>"Contrato")
  );
  $dgrid->setColumnsInEditMode($em_columns);
##  *** set foreign keys for edit/details mode (if there are linked tables)
  $foreign_keys = array(
      "sContrato"=>array("table"=>"contratos", "field_key"=>"sContrato", "field_name"=>"sContrato", "view_type"=>"dropdownlist")
  ); 
  $dgrid->setForeignKeysEdit($foreign_keys);
##
##
## +---------------------------------------------------------------------------+
## | 8. Bind the DataGrid:                                                     | 
## +---------------------------------------------------------------------------+
##  *** set debug mode & messaging options
  $dgrid->bind();        
  ob_end_flush();
##
################################################################################   


?>

</body>
</html>