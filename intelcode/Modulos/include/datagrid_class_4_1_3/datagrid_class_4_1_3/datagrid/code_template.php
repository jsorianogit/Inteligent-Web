<?php

################################################################################
##                                                                             #
##  PHP DataGrid version 4.1.3 (22.05.2007)                                    #
##  Author: Leumas Naypoka <leumas.a@gmail.com>                                #
##  Lisence: GNU GPL                                                           #
##  Site: http://phpbuilder.blogspot.com                                       #
##                                                                             #
##  Additional modules (embedded):                                             #
##  -- openWYSIWYG 1.01 (free cross-browser) http://openWebWare.com            #
##  -- PEAR::DB (PHP Extension and Application Repository) http://pear.php.net #
##  -- JS AFV 1.0.3 (JS Auto From Validator) http://phpbuilder.blogspot.com    #            
##                                                                             #
################################################################################
## +---------------------------------------------------------------------------+
## | 1. Creating & Calling:                                                    | 
## +---------------------------------------------------------------------------+
##  *** only relative (virtual) path (to the current document)
//  define ("DATAGRID_DIR", "datagrid/");
##  *** relative path recommended, but you can use a physical path too
##  *** example: define ("PEAR_DIR", "C:\\Apache2\\htdocs\\dgproject\\datagrid\\pear\\");
//  define ("PEAR_DIR", "datagrid/pear/");
//  
//  require_once(DATAGRID_DIR.'datagrid.class.php');
//  require_once(PEAR_DIR.'PEAR.php');
//  require_once(PEAR_DIR.'DB.php');
##
##  *** creating variables that we need for database connection 
//  $DB_USER='name';            /* usually like this: prefix_name             */
//  $DB_PASS='';                /* must be already enscrypted (recommended)   */
//  $DB_HOST='localhost';       /* usually localhost                          */
//  $DB_NAME='dbName';          /* usually like this: prefix_dbName           */
//
//  ob_start();
##  *** (example of ODBC connection string)
##  *** $result_conn = $db_conn -> connect(DB::parseDSN('odbc://root:12345@test_db'));
##  *** (example of Oracle connection string)
##  *** $result_conn = $db_conn -> connect(DB::parseDSN('oci8://root:12345@localhost:1521/mydatabase)); 
##  *** (example of PostgreSQL connection string)
##  *** $result_conn = $db_conn -> connect(DB::parseDSN('pgsql://root:12345@localhost/mydatabase)); 
##  === (Examples of Connections to other db types see in "docs/pear/" folder)
//  $db_conn =& DB::factory('mysql'); 
//  $result_conn = $db_conn -> connect(DB::parseDSN('mysql://'.$DB_USER.':'.$DB_PASS.'@'.$DB_HOST.'/'.$DB_NAME));
//  if(DB::isError($result_conn)){ die($result_conn->getMessage()); }
##  *** put a primary key on the first place 
//  $sql = "SELECT primary_key, field_1, field_2 ... FROM tableName ;";         
##  *** set needed options and create new class instance 
//  $debug_mode = false;        /* display SQL statements while processing */    
//  $messaging = true;          /* display system messages on a screen */ 
//  $unique_prefix = "_abc";    /* prevent overlays - can not begin with a digit */
//  $dgrid = new DataGrid($debug_mode, $messaging, $unique_prefix, DATAGRID_DIR);
##  *** set data source with needed options
//  $default_order_field = "field_name";
//  $default_order_type = "ASC|DESC";
//  $dgrid->dataSource($db_conn, $sql, $default_order_field, $default_order_type);	    
##
##
## +---------------------------------------------------------------------------+
## | 2. General Settings:                                                      | 
## +---------------------------------------------------------------------------+
##  *** set encoding (default - utf8)
//  $dg_encoding = "utf8"; 
//  $dgrid->setEncoding($dg_encoding);
##  *** set interface language (default - English)
##  *** (en) - English     (de) - German    (se) Swedish   (hr) - Bosnian/Croatian
##  *** (hu) - Hungarian   (es) - Espa�ol   (ca) - Catal�  (fr) - Fran�ais
##  *** (nl) - Netherlands / "Vlaams" (Flemish) (it) - Italiano 
//  $dg_language = "en";  
//  $dgrid->setInterfaceLang($dg_language);
##  *** set direction: "ltr" or "rtr" (default - "ltr")
//  $direction = "ltr";
//  $dgrid->setDirection($direction);
##  *** set layouts: 0 - tabular(horizontal) - default, 1 - columnar(vertical) 
//  $layouts = array("view"=>0, "edit"=>1, "filter"=>1); 
//  $dgrid->setLayouts($layouts);
##  *** set other modes ("type" => "link|button|image") 
##  *** "byFieldValue"=>"fieldName" - make the field to be a link on edit mode page
//  $modes = array(
//      "add"	  =>array("view"=>true, "edit"=>false, "type"=>"link"),
//      "edit"	  =>array("view"=>true, "edit"=>true,  "type"=>"link", "byFieldValue"=>""),
//      "cancel"  =>array("view"=>true, "edit"=>true,  "type"=>"link"),
//      "details" =>array("view"=>true, "edit"=>false, "type"=>"link"),
//      "delete"  =>array("view"=>true, "edit"=>true,  "type"=>"image")
//  );
//  $dgrid->setModes($modes);
##  *** allow scrolling on datagrid
//  $scrolling_option = false;
//  $dgrid->allowScrollingSettings($scrolling_option);  
##  *** set scrolling settings (optional)
//  $scrolling_width = "90%";
//  $scrolling_height = "100%";
//  $dgrid->setScrollingSettings($scrolling_width, $scrolling_height);
##  *** allow mulirow operations
//  $multirow_option = false;
//  $dgrid->allowMultirowOpeartions($multirow_option);
##  *** set CSS class for datagrid
//  $css_class = "default"; // "default" or "blue" or "gray" or "green" or your css file relative path with name
//  $css_type = "embedded"; // "embedded" - use embedded classes, "file" - link external css file
//  $dgrid->setCssClass($css_class, $css_type);
##  *** set variables that used to get access to the page (like: my_page.php?act=34&id=56 etc.) 
//  $http_get_vars = array("act", "id");
//  $dgrid->setHttpGetVars($http_get_vars);
##  *** set another datagrid/s unique prefixes (if you use few datagrids on one page)
##  *** format (in wich mode to allow processing of another datagrids)
##  *** array("unique_prefix"=>array("view"=>true|false, "edit"=>true|false, "details"=>true|false));
//  $anotherDatagrids = array("abcd_"=>array("view"=>true, "edit"=>true, "details"=>true));
//  $dgrid->setAnotherDatagrids($anotherDatagrids);  
##  *** set DataGrid caption
//  $dg_caption = "My Favorite Lovely PHP DataGrid";
//  $dgrid->setCaption($dg_caption);
##
##
## +---------------------------------------------------------------------------+
## | 3. Printing & Exporting Settings:                                         | 
## +---------------------------------------------------------------------------+
##  *** set printing option: true(default) or false 
//  $printing_option = true;
//  $dgrid->allowPrinting($printing_option);
##  *** set exporting option: true(default) or false 
//  $exporting_option = true;
//  $dgrid->allowExporting($exporting_option);
##
##
## +---------------------------------------------------------------------------+
## | 4. Sorting & Paging Settings:                                             | 
## +---------------------------------------------------------------------------+
##  *** set sorting option: true(default) or false 
//  $sorting_option = true;
//  $dgrid->allowSorting($sorting_option);               
##  *** set paging option: true(default) or false 
//  $paging_option = true;
//  $rows_numeration = false;
//  $numeration_sign = "N #";       
//  $dgrid->allowPaging($paging_option, $rows_numeration, $numeration_sign);
##  *** set paging settings
//  $bottom_paging = array("results"=>true, "results_align"=>"left", "pages"=>true, "pages_align"=>"center", "page_size"=>true, "page_size_align"=>"right");
//  $top_paging = array("results"=>true, "results_align"=>"left", "pages"=>true, "pages_align"=>"center", "page_size"=>true, "page_size_align"=>"right");
//  $pages_array = array(10, 25, 50, 100, 250, 500, 1000);
//  $default_page_size = 10;
//  $dgrid->setPagingSettings($bottom_paging, $top_paging, $pages_array, $default_page_size);
##
##
## +---------------------------------------------------------------------------+
## | 5. Filter Settings:                                                       | 
## +---------------------------------------------------------------------------+
##  *** set filtering option: true or false(default)
//  $filtering_option = true;
//  $dgrid->allowFiltering($filtering_option);
##  *** set aditional filtering settings
//  $fill_from_array = array("1", "2", "3", "4", "5");
//  $filtering_fields = array(
//      "FieldName_1"=>array("table"=>"tableName_1", "field"=>"fieldName_1", "source"=>"self"|$fill_from_array, "operator"=>false|true, "default_operator"=>"=|<|>|like|%like|like%|not like", "order"=>"ASC|DESC" (optional), "type"=>"textbox|dropdownlist", "case_sensitive"=>false|true, "comparison_type"=>"string|numeric|binary"),
//      "FieldName_2"=>array("table"=>"tableName_2", "field"=>"fieldName_2", "source"=>"self"|$fill_from_array, "operator"=>false|true, "default_operator"=>"=|<|>|like|%like|like%|not like", "order"=>"ASC|DESC" (optional), "type"=>"textbox|dropdownlist", "case_sensitive"=>false|true, "comparison_type"=>"string|numeric|binary"),
//      "FieldName_3"=>array("table"=>"tableName_3", "field"=>"fieldName_3", "source"=>"self"|$fill_from_array, "operator"=>false|true, "default_operator"=>"=|<|>|like|%like|like%|not like", "order"=>"ASC|DESC" (optional), "type"=>"textbox|dropdownlist", "case_sensitive"=>false|true, "comparison_type"=>"string|numeric|binary")
//  );
//  $dgrid->setFieldsFiltering($filtering_fields);
##
##
## +---------------------------------------------------------------------------+
## | 6. View Mode Settings:                                                    | 
## +---------------------------------------------------------------------------+
##  *** set view mode table properties
//  $vm_table_properties = array("width"=>"90%");
//  $dgrid->setViewModeTableProperties($vm_table_properties);  
##  *** set columns in view mode
//  $vm_colimns = array(
//      "FieldName_1"=>array("header"=>"Name_A", "type"=>"label",      "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "case"=>"normal|upper|lower", "summarize"=>true|false),
//      "FieldName_2"=>array("header"=>"Name_B", "type"=>"image",      "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "case"=>"normal|upper|lower", "summarize"=>true|false, "target_path"=>"uploads/", "default"=>"default_image.ext", "width"=>"50px", "height"=>"30px"),
//      "FieldName_3"=>array("header"=>"Name_C", "type"=>"linktoview", "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "case"=>"normal|upper|lower", "summarize"=>true|false),
//      "FieldName_4"=>array("header"=>"Name_D", "type"=>"link",       "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "case"=>"normal|upper|lower", "summarize"=>true|false, "field_key"=>"field_name_1", "field_data"=>"field_name_2", "href"=>"{0}", "target"=>"_new"),
//      "FieldName_5"=>array("header"=>"Name_E", "type"=>"link",       "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "case"=>"normal|upper|lower", "summarize"=>true|false, "field_key"=>"field_name_1", "field_data"=>"field_name_2", "href"=>"mailto:{0}", "target"=>"_new"),
//      "FieldName_6"=>array("header"=>"Name_F", "type"=>"link",       "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "case"=>"normal|upper|lower", "summarize"=>true|false, "field_key"=>"field_name_1", "field_data"=>"field_name_2", "href"=>"http://mydomain.com?act={0}&code=ABC", "target"=>"_new"),
//      "FieldName_7"=>array("header"=>"Name_G", "type"=>"password",   "align"=>"left", "width"=>"X%|Xpx", "wrap"=>"wrap|nowrap", "text_length"=>"-1", "case"=>"normal|upper|lower", "summarize"=>true|false)
//  );
//  $dgrid->setColumnsInViewMode($vm_colimns);
##
##
## +---------------------------------------------------------------------------+
## | 7. Add/Edit/Details Mode Settings:                                        | 
## +---------------------------------------------------------------------------+
##  *** set add/edit mode table properties
//  $em_table_properties = array("width"=>"70%");
//  $dgrid->setEditModeTableProperties($em_table_properties);
##  *** set details mode table properties
//  $dm_table_properties = array("width"=>"70%");
//  $dgrid->setDetailsModeTableProperties($dm_table_properties);
##  ***  set settings for add/edit/details mode
//  $table_name  = "table_name";
//  $primary_key = "primary_key";
//  $condition   = "table_name.filed = ".$_REQUEST['abc_rid'];
//  $dgrid->setTableEdit($table_name, $primary_key, $condition);
##  *** set columns in edit mode
##  *** first letter: r - required, s - simple (not required)
##  *** second letter: t - text(including datetime), n - numeric, a - alphanumeric, e - email, f - float, y - any, l - login, z - zipcode, p - password, i - integer, v - verified, z - zip code
##  *** width: optional
##  *** type: textbox|textarea|label|date(yyyy-mm-dd)|datedmy(dd-mm-yyyy)|datetime(yyyy-mm-dd hh:mm:ss)|datetimedmy(dd-mm-yyyy hh:mm:ss)|image|password|enum|print|checkbox
##  *** make sure your WYSIWYG dir has 755 permissions
//  $fill_from_array = array("Yes", "No", "Don't know", "My be");
//  $em_columns = array(
//      "FieldName_1" =>array("header"=>"Name_A", "type"=>"textbox",  "req_type"=>"rt", "width"=>"210px", "title"=>"Short Description", "readonly"=>false|true),
//      "FieldName_2" =>array("header"=>"Name_B", "type"=>"textarea", "req_type"=>"rt", "width"=>"210px", "title"=>"Short Description", "readonly"=>false|true), "edit_type"=>"simple|wysiwyg"),
//      "FieldName_3" =>array("header"=>"Name_C", "type"=>"label",    "req_type"=>"rt", "width"=>"210px", "title"=>"Short Description", "readonly"=>false|true),
//      "FieldName_4" =>array("header"=>"Name_D", "type"=>"date",     "req_type"=>"rt", "width"=>"210px", "title"=>"Short Description", "readonly"=>false|true),
//      "FieldName_5" =>array("header"=>"Name_E", "type"=>"datetime", "req_type"=>"st", "width"=>"210px", "title"=>"Short Description", "readonly"=>false|true),
//      "FieldName_6" =>array("header"=>"Name_F", "type"=>"image",    "req_type"=>"st", "width"=>"210px", "title"=>"Short Description", "readonly"=>false|true, "target_path"=>"uploads/", "default"=>"default_image.ext", "max_file_size"=>"100000", "width"=>"Xpx", "height"=>"Ypx"),
//      "FieldName_7" =>array("header"=>"Name_G", "type"=>"password", "req_type"=>"rp", "width"=>"210px", "title"=>"Short Description", "readonly"=>false|true),
//      "FieldName_8" =>array("header"=>"Name_H", "type"=>"enum",     "req_type"=>"st", "width"=>"210px", "title"=>"Short Description", "readonly"=>false|true, "source"=>"self"|$fill_from_array, "view_type"=>"dropdownlist(defailt)|radiobutton"),
//      "FieldName_9" =>array("header"=>"Name_I", "type"=>"print",    "req_type"=>"st", "width"=>"210px", "title"=>"Short Description", "readonly"=>false|true),
//      "FieldName_10"=>array("header"=>"Name_J", "type"=>"checkbox", "req_type"=>"st", "width"=>"210px", "title"=>"Short Description", "readonly"=>false|true, "true_value"=>1, "false_value"=>0),
//      "FieldName_11"=>array("header"=>"Name_K", "type"=>"file",     "req_type"=>"st", "width"=>"210px", "title"=>"Short Description", "readonly"=>false|true, "target_path"=>"uploads/", "max_file_size"=>"100000"),
//      "FieldName_12"=>array("header"=>"Name_L", "type"=>"barchart", "req_type"=>"ri", "width"=>"210px", "title"=>"Short Description", "readonly"=>false|true, "field"=>"field_name", "maximum_value"=>"value")
//  );
//  $dgrid->setColumnsInEditMode($em_columns);
##  *** set foreign keys for edit/details mode (if there are linked tables)
##  *** condition example: "condition"=>"TableName_1.FieldName > 'a' AND TableName_1.FieldName < 'c'"
//  $foreign_keys = array(
//      "ForeignKey_1"=>array("table"=>"TableName_1", "field_key"=>"FieldKey_1", "field_name"=>"FieldName_1", "view_type"=>"dropdownlist(defailt)|radiobutton", "condition"=>""),
//      "ForeignKey_2"=>array("table"=>"TableName_2", "field_key"=>"FieldKey_2", "field_name"=>"FieldName_2", "view_type"=>"dropdownlist(defailt)|radiobutton", "condition"=>"")
//  ); 
//  $dgrid->setForeignKeysEdit($foreign_keys);
##
##
## +---------------------------------------------------------------------------+
## | 8. Bind the DataGrid:                                                     | 
## +---------------------------------------------------------------------------+
##  *** set debug mode & messaging options
//  $dgrid->bind();        
//  ob_end_flush();
##
################################################################################   


?>