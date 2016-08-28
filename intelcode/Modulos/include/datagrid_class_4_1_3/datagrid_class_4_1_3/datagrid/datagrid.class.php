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
##  *** (hu) - Hungarian   (es) - Español   (ca) - Català  (fr) - Français
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

////////////////////////////////////////////////////////////////////////////////
//
// Not documented:
// -----------------------------------------------------------------------------
// Property : allow_first_field_focus
// Method   : executeSQL()
//          : selectSQL()
//    $dSet = $dgrid->executeSQL("SELECT * FROM tblPresidents WHERE tblPresidents.CountryID = ".$_GET['f_rid']."");
//    while($row = $dSet->fetchRow()){
//        for($c = 0; ($c < $dSet->numCols()); $c++){
//                    echo $row[$c]." ";
//        }
//        echo "<br>";
//    }
//    $dgrid->selectSQL("SELECT COUNT(tblPresidents.presidentID) FROM tblPresidents WHERE tblPresidents.CountryID = ".$_GET['f_rid']."");
////////////////////////////////////////////////////////////////////////////////

//* Feature: [added] new parameter - condition in setTableEdit()
//* Feature: [added] new method - setEditModeTableProperties()
//* Feature: [added] new method - setDetailsModeTableProperties()
//* Feature: [added] new type in view mode - barchart
//* Feature: [added] executeSQL() method
//* Feature: [added] selectSQL() method
//* Feature: [added] export in XML format
//* Feature: [added] new parameter - readonly for fields in edit mode
//* Feature: [added] new parameter - "default"=>"..." for fields in add mode

//* Feature: [improved] messaging in AddRow/UpdateRow/DeleteRow methods
//* Feature: [improved] view of datetime link & pop-up
//* Feature: [improved] added headers to fields in exporting to *.csv
//* Feature: [improved] translation in german
//* Feature: [improved] added uploading option for image type in Add/Edit/Detail modes
//     and new parameters: "width"=>"...", "height"=>"..." and "default"=>"..." in Add/View/Edit/Detail modes

//# Bug: [Fixed] unexpexted column in add mode, if multirow option is allowed
//# Bug: [Fixed] error while uploading & updating if unique prefix was more then 2 simbols
//# Bug: [Fixed] blocked direct access to all folders by adding a blank index.html file
//# Bug: [Fixed] checkbox shows only 1 or 0 in details mode (instead of 'Yes', 'No')
//# Bug: [Fixed] showing wrong icons and checkboxes in print mode
//# Bug: [Fixed] wrong offset of summarizing column
//# Bug: [Fixed] default maxlength value error in edit mode
//# Bug: [Fixed] colSpan='0' error in FireFox
//# Bug: [Fixed] function lastSubStrOccurence() not handles correctly cases like: tblWhere, tblFrom etc.
//# Bug: [Fixed] default paging didn't work - shows wrong number of row in first viewing
//# Bug: [Fixed] error in details mode: undefined variable curr_url
//# Bug: [Fixed] setLanguage error
//# Bug: [Fixed] missing title parameter in drawModeButton() function in <IMG>
//# Bug: [Fixed] unexpexted comma in field data while exporting to *.csv



class DataGrid
{
    //==========================================================================
    // Data Members
    //==========================================================================
    // directory ---------------------------------------------------------------
    var $directory;

    // language ----------------------------------------------------------------
    var $lang_name;
    var $lang;

    // caption -----------------------------------------------------------------
    var $caption;

    // rows and columns data members -------------------------------------------
    var $rows;
    var $rowLower;
    var $rowUpper;
    var $columns;            
    var $colLower;
    var $colUpper;

    // http get vars -----------------------------------------------------------    
    var $http;
    var $port;
    var $HTTP_URL;
    var $http_get_vars;
    var $another_datagrids;

    // data source -------------------------------------------------------------
    var $db_handler;
    var $sql;
    var $sql_view;
    var $dataSet;

    // direction & encoding ----------------------------------------------------
    var $encoding;
    var $direction;

    // layout style ------------------------------------------------------------
    var $layouts;  
    var $layout_type;
    
    // paging variables --------------------------------------------------------
    var $pages_total;
    var $page_current;
    var $req_page_size;
    var $allow_paging;
    var $rows_numeration;
    var $numeration_sign;           
    var $lower_paging;
    var $upper_paging;
    var $pages_array;
    var $limit_start;
    var $limit_end;
    var $rows_total;

    // sorting variables -------------------------------------------------------
    var $sort_field;
    var $sort_type;
    var $default_sort_field;    
    var $default_sort_type;    
    var $allow_sorting;
    var $sql_sort;

    // filtering variables -----------------------------------------------------
    var $allow_filtering;
    var $filter_fields;
    var $hide_display;

    // columns style parameters ------------------------------------------------            
    var $wrap;

    // css style ---------------------------------------------------------------            
    var $allow_row_highlighting;
    var $css_class;
    var $css_file_path;
    var $css_type;
    var $class_caption;
    var $class_table;
    var $class_filter_table;
    var $class_legend;
    var $class_paging_table;
    var $class_tr;
    var $class_th;
    var $class_th_normal;
    var $class_th_selected;
    var $class_td;
    var $class_td_main;
    var $class_td_selected;    
    var $class_fieldset;
    var $class_a;
    var $class_a2;
    var $class_button;
    var $class_select;
    var $class_label;    
    var $class_textbox;
    var $class_textarea;
    var $class_checkbox;
    var $class_radio;
    var $class_error_message;
    var $class_ok_message;
    
    var $headerColor;
    var $tdColor;
    var $rowColor;
    var $rowColor2;
    var $rowColor3;
    var $rowColor4;
    var $rowColor5;
    var $rowColor6;
    var $rowColor7;

    // table style parameters --------------------------------------------------                        
    var $tblAlign;
    var $tblWidth;
    var $tblBorder;
    var $tblBorderColor;
    var $tblCellSpacing;
    var $tblCellPadding;
    
    // datagrid modes ----------------------------------------------------------                        
    var $modes;
    var $mode;
    var $rid;
    var $tblName;
    var $PrimaryKey;
    var $condition;
    var $fieldsAsHypertextArray;
    var $foreign_keys_array;    
    var $columns_view_mode;
    var $columns_edit_mode;

    // printing & exporting ----------------------------------------------------                        
    var $allow_printing;
    var $allow_exporting;

    // debug mode --------------------------------------------------------------                        
    var $debug;

    // message -----------------------------------------------------------------                        
    var $act_msg;
    var $messaging;
    var $is_error;
    var $is_warning;

    // browser & system types --------------------------------------------------
    var $platform;
    var $browser_name;
    var $browser_version;
    
    // scrolling ---------------------------------------------------------------
    var $scrolling_option;
    var $scrolling_width;
    var $scrolling_height;

    // summarize ---------------------------------------------------------------
    var $summarize_columns;

    // multiline ---------------------------------------------------------------
    var $is_multirow_allowed;

    // first field focus -------------------------------------------------------
    var $allow_first_field_focus;
    
    //==========================================================================
    // Member Functions 
    //==========================================================================

    //--------------------------------------------------------------------------
    // default constructor 
    //--------------------------------------------------------------------------
    function DataGrid($debug_mode = false, $messaging = true, $unique_prefix = "", $datagrid_dir = "datagrid/"){        
        $this->setUniquePrefix($unique_prefix);
        
        $this->directory = $datagrid_dir;

        $this->lang_name = "en";
        $this->lang = array();
        
        $this->caption = "";
        
        $this->setMediaPrint();
        $this->setCommonJavaScript();
        $this->setFormChecking();
        $this->setWYSIWYG();
        $this->setCalendar();

        $this->http = $this->getProtocol();
        $this->port = $this->getPort();
        $this->HTTP_URL = $this->http.$_SERVER['HTTP_HOST'].$this->port.$_SERVER['PHP_SELF'];
        
        $this->http_get_vars = "";
        $this->another_datagrids = "";
        
        $this->css_class = "default";
        $this->css_type = "embedded";
        $this->css_file_path = "";
        
        $this->rows = 0;
        $this->rowLower = 0;
        $this->rowUpper = 0;
        $this->columns = 0;            
        $this->colLower = 0;
        $this->colUpper = 0;
        
        $this->encoding = "utf8";
        $this->direction = "ltr";
        $this->layouts['view'] = 0;
        $this->layouts['edit'] = 1;
        $this->layouts['filter'] = 1;
        $this->layout_type = "view";
        
        $this->pages_total = 0;
        $this->page_current = 0;
        $this->pages_array = array(10, 25, 50, 100, 250, 500, 1000);
        $this->req_page_size = 10;                
        $this->allow_paging = false;
        $this->rows_numeration = false;
        $this->numeration_sign = "N #";       
        $this->lower_paging['results'] = false;
        $this->lower_paging['results_align'] = "left";
        $this->lower_paging['pages'] = false;        
        $this->lower_paging['pages_align'] = "center";
        $this->lower_paging['page_size'] = false;
        $this->lower_paging['page_size_align'] = "right";
        $this->upper_paging['results'] = false;
        $this->upper_paging['results_align'] = "left";
        $this->upper_paging['pages'] = false;        
        $this->upper_paging['pages_align'] = "center";
        $this->upper_paging['page_size'] = false;
        $this->upper_paging['page_size_align'] = "right";
        $this->limit_start = 0;
        $this->limit_end = $this->req_page_size;
        $this->rows_total = 0;
        
        $this->sort_field = "";
        $this->sort_type = "";
        $this->allow_sorting = true;
        $this->sql_view = "";
        $this->sql = "";
        $this->sql_sort = "";
        
        $this->allow_filtering = false;
        $this->filter_fields = array();
        $this->hide_display = "";
        
        $this->tblAlign['view'] = "center";         $this->tblAlign['edit'] = "center";     $this->tblAlign['details'] = "center";
        $this->tblWidth['view'] = "90%";            $this->tblWidth['edit'] = "70%";        $this->tblWidth['details'] = "60%";
        $this->tblBorder['view'] = "1";             $this->tblBorder['edit'] = "1";         $this->tblBorder['details'] = "1";
        $this->tblBorderColor['view'] = "#000000";  $this->tblBorderColor['edit'] = "#000000"; $this->tblBorderColor['details'] = "#000000";
        $this->tblCellSpacing['view'] = "0";        $this->tblCellSpacing['edit'] = "0";    $this->tblCellSpacing['details'] = "0";
        $this->tblCellPadding['view'] = "0";        $this->tblCellPadding['edit'] = "0";    $this->tblCellPadding['details'] = "0";
        
        $this->modes = "";
        $this->mode = "view";
        $this->rid = "";
        $this->tblName ="";
        $this->PrimaryKey = 0;
        $this->condition = "";

        $this->fieldsAsHypertextArray = "";
        $this->foreign_keys_array = array();
        
        $this->columns_view_mode =array();
        $this->columns_edit_mode =array();
              
        $this->allow_printing = true;
        $this->allow_exporting = true;
        
        $this->allow_row_highlighting = true;
        $this->wrap = "wrap";

        $this->scrolling_option = false;
        $this->scrolling_width = "90%";
        $this->scrolling_height = "100%";
        
        $this->summarize_columns = array();        

        $this->is_multirow_allowed = false;

        $this->allow_first_field_focus = false;

        $this->debug = $debug_mode;        
        if($this->debug) error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
        $this->messaging = $messaging;
        $this->is_error = false;
        $this->is_warning = false;

        // set browser definitions  
        $this->setBrowserDefinitions();
    }

    //--------------------------------------------------------------------------
    // set unique names
    //--------------------------------------------------------------------------
    function setUniquePrefix($unique_prefix = ""){
        $this->unique_prefix = $unique_prefix;
    }

    //--------------------------------------------------------------------------
    // set Http Get Vars
    //--------------------------------------------------------------------------
    function setHttpGetVars($http_get_vars = ""){
        $this->http_get_vars = $http_get_vars;
    }

    //--------------------------------------------------------------------------
    // set Another Datagrids
    //--------------------------------------------------------------------------
    function setAnotherDatagrids($another_datagrids = ""){
        $this->another_datagrids = $another_datagrids;
    }

    //--------------------------------------------------------------------------
    // set Scrolling Settings
    //--------------------------------------------------------------------------
    function allowScrollingSettings($scrolling_option = false){
        $this->scrolling_option = $scrolling_option;
    }

    //--------------------------------------------------------------------------
    // set Scrolling Settings
    //--------------------------------------------------------------------------
    function setScrollingSettings($width="", $height=""){
        if($width != "") $this->scrolling_width = $width;
        if($height != "") $this->scrolling_height = $height;
    }

    //--------------------------------------------------------------------------
    // set css class
    //--------------------------------------------------------------------------
    function setCssClass($class = "default", $type = "embedded"){        
        $req_print = $this->getRequestVars('print');
        $this->css_class = $class;
        $this->css_type = $type;
        if($this->css_type == "file"){
            // nothing
            $this->css_file_path = $class;
            $this->css_class = "default";
           
            $this->rowColor  = "#fcfaf6";  
            $this->rowColor2 = "#ffffff";            
            $this->rowColor3 = "#ebeadb"; // dark
            $this->rowColor4 = "#ebeadb"; // lignht
            $this->rowColor5 = "#e2f3fc"; // row mouse over lighting
            $this->rowColor6 = "#0033cc"; // on mouse click
            $this->rowColor7 = "#e2e0cb"; // header (th main) column             
        }else{
            if(strtolower($this->css_class) == "green"){
                $this->class_caption        = ".caption {font-size: 16px; font-family: Arial, Helvetica, sans-serif;  font-weight: bold; text-align:center; Padding-bottom: 0;}";
                $this->class_fieldset       = ".class_fieldset { margin: 0px;width:90%;  }";
                $this->class_filter_table   = ".class_filter_table { font-size: 14px;font-family: Arial, Helvetica, sans-serif;align: center; width: 90%; border-collapse: collapse; border: 0px solid #3f7c5f; font: normal 80%/140% arial, verdana, helvetica, sans-serif; color: #000; background: #fff;}";            
                $this->class_paging_table   = ".class_paging_table { font-size: 14px;font-family: Arial, Helvetica, sans-serif;align: center; width: 90%; border-collapse: collapse; border: 0px solid #3f7c5f; font: normal 80%/140% arial, verdana, helvetica, sans-serif; color: #000; background: #fff;}";
                $this->class_table          = ".class_table { font-size: 12px;font-family: Arial, Helvetica, sans-serif;align: center; width: 90%; border-collapse: collapse; border: 1px solid #3f7c5f; font: normal 80%/140% arial, verdana, helvetica, sans-serif; color: #000; background: #fff;}";
                $this->class_tr             = "";
                $this->class_th             = ".class_th { border: 1px solid #e0e0e0; border-bottom: 1px solid #3f7c5f; text-align: center; font-size: 13px; font-weight: bold; padding: 0.3em;}";
                $this->class_th_normal      = ".class_th_normal { border: 1px solid #e0e0e0; border-bottom: 1px solid #3f7c5f; text-align: center; font-size: 13px; font-weight: bold; background: #c6d7cf; padding: 0.3em;}";
                $this->class_th_selected    = ".class_th_selected { border: 1px solid #e0e0e0; border-bottom: 1px solid #3f7c5f; text-align: center; font-size: 13px; font-weight: bold; background: #c6d7cf; padding: 0.3em;}";
                $this->class_td_main        = ".class_td_main { border: 1px solid #e0e0e0; font-size: 13px; padding: 0.15em;}";
                $this->class_td_selected    = ".class_td_selected { BACKGROUND-COLOR: #e4f5ef; border: 1px solid #e0e0e0; font-size: 14px; padding: 0.15em;}";                
                $this->class_td             = ".class_td { border: 1px solid #e0e0e0; font-size: 14px; padding: 0.15em;}";
                $this->class_radiobutton    = ".class_radiobutton {}";
                $this->class_a   = "a.class_a { background: transparent; color: #3f7c5f; text-decoration: none; font-weight: bold;}";
                $this->class_a  .= "a.class_a:hover { background: transparent; color: #6fac8f; text-decoration: none; font-weight: bold;}";
                $this->class_a2  = "a.class_a2 { background: transparent; color: #3f7c5f; text-decoration: none; }";
                $this->class_a2 .= "a.class_a2:hover { background: transparent; color: #6fac8f; text-decoration: none; }";
                $this->rowColor  = "#ffffff";
                $this->rowColor2 = "#e4f5ef";            
                $this->rowColor3 = "#ffffff";
                $this->rowColor4 = "#e4f5ef";
                $this->rowColor5 = "#d4e5df";
                $this->rowColor6 = "#d4e5df";
                $this->rowColor7 = "#c6d7cf"; // header (th main) column
            }else if(strtolower($this->css_class) == "gray") {
                $this->class_caption        = ".caption {font-size: 16px; font-family: Arial, Helvetica, sans-serif;  font-weight: bold; text-align:center; Padding-bottom: 0;}";
                $this->class_fieldset       = ".class_fieldset { margin: 0px;width:90%;  }";
                $this->class_filter_table   = ".class_filter_table { font-family: Arial, Helvetica, sans-serif;border:0px solid #000000;font-size: 14px;border-collapse:collapse;margin:0;padding:0;}";            
                $this->class_paging_table   = ".class_paging_table { font-family: Arial, Helvetica, sans-serif;border:0px solid #000000;font-size: 14px;border-collapse:collapse;margin:0;padding:0;}";
                $this->class_table          = ".class_table { font-family: Arial, Helvetica, sans-serif;border:1px solid #000000;font-size: 14px;border-collapse:collapse;margin:0;padding:0;}";
                $this->class_th             = ".class_th { line-height: 22px;font-weight: bold;color: #303030;text-indent: 7px;text-align: center;vertical-align:center;border:1px solid #d0d0d0;}";            
                $this->class_th_normal      = ".class_th_normal { line-height: 22px;font-weight: bold;color: #303030;background-color: #dedede;text-indent: 7px;text-align: center;vertical-align:center;border:1px solid #d0d0d0;}";            
                $this->class_th_selected    = ".class_th_selected { line-height: 22px;font-weight: bold;color: #303030;background-color: #dedede;text-indent: 7px;text-align: center;vertical-align:center;border:1px solid #d0d0d0;}";            
                $this->class_td_main        = ".class_td_main { line-height: 18px;font-weight: bold;color: #000000;text-indent: 7px;text-align: center;vertical-align:center;border:1px solid #e0e0e0;}";
                $this->class_td_selected    = ".class_td_selected { BACKGROUND-COLOR: #f0f0f0; vertical-align:center;line-height: 18px;text-indent: 7px;text-align: center;border:1px solid #e0e0e0;}";
                $this->class_td             = ".class_td { vertical-align:center;line-height: 18px;text-indent: 7px;text-align: center;border:1px solid #e0e0e0;}";            
                $this->class_radiobutton    = ".class_radiobutton {}";
                $this->class_a   = "a.class_a { background: transparent; color: #225588; text-decoration: none; }";
                $this->class_a  .= "a.class_a:hover { background: transparent; color: #6699bb; text-decoration: none; }";
                $this->class_a2  = "a.class_a2 { background: transparent; color: #000075; text-decoration: none; }";
                $this->class_a2 .= "a.class_a2:hover { background: transparent; color: #aaaaaa; text-decoration: none; }";
                $this->rowColor  = "#f9f9f9";
                $this->rowColor2 = "#f0f0f0";            
                $this->rowColor3 = "#f0f0f0";
                $this->rowColor4 = "#dedede";
                $this->rowColor5 = "#FEFFE8";
                $this->rowColor6 = "#FEFFE8";
                $this->rowColor7 = "#dedede"; // header (th main) column
            }else if(strtolower($this->css_class) == "blue") {
                $this->class_caption        = ".caption { FONT: NORMAL 14px Tahoma; font-weight: bold; text-align:center; Padding-bottom: 0;}";
                $this->class_fieldset       = ".class_fieldset { margin: 0px;width:90%; BORDER: #BFCDE1 1px solid;}";
                $this->class_filter_table   = ".class_filter_table { BORDER: #BFCDE1 0px solid; FONT: NORMAL 12px Tahoma;}";            
                $this->class_legend         = ".class_legend {FONT: NORMAL 12px Tahoma;}";
                $this->class_paging_table   = ".class_paging_table { BORDER: #BFCDE1 0px solid; FONT: NORMAL 12px Tahoma;}";
                $this->class_table          = ".class_table { BORDER: #BFCDE1 1px solid; FONT: NORMAL 12px Tahoma;}";            
                $this->class_th             = ".class_th { BORDER-RIGHT: #688caf 1px solid; PADDING-RIGHT: 2px; BORDER-TOP: #ffffff 2px solid; PADDING-LEFT: 5px; PADDING-BOTTOM: 2px; FONT: bold 13px Tahoma; BORDER-LEFT: #ffffff 1px solid; COLOR: #333333; PADDING-TOP: 2px; BORDER-BOTTOM: #688caf 1px solid; }";
                $this->class_th_normal      = ".class_th_normal { BORDER-RIGHT: #688caf 1px solid; PADDING-RIGHT: 2px; BORDER-TOP: #ffffff 2px solid; PADDING-LEFT: 5px; PADDING-BOTTOM: 2px; FONT: bold 13px Tahoma; BORDER-LEFT: #ffffff 1px solid; COLOR: #333333; PADDING-TOP: 2px; BORDER-BOTTOM: #688caf 1px solid; BACKGROUND-COLOR: #cdd9ea}";
                $this->class_th_selected    = ".class_th_selected { BORDER-RIGHT: #688caf 1px solid; PADDING-RIGHT: 2px; BORDER-TOP: #ffffff 2px solid; PADDING-LEFT: 5px; PADDING-BOTTOM: 2px; FONT: bold 13px Tahoma; BORDER-LEFT: #ffffff 1px solid; COLOR: #333333; PADDING-TOP: 2px; BORDER-BOTTOM: #688caf 1px solid; BACKGROUND-COLOR: #cdd9ea}";
                $this->class_td_main        = ".class_td_main { BORDER-RIGHT: #d0d7e5 1px solid; PADDING-RIGHT: 2px; PADDING-LEFT: 5px; PADDING-BOTTOM: 2px; FONT: Tahoma; BORDER-LEFT: #ffffff 1px solid; PADDING-TOP: 2px; BORDER-BOTTOM: #d0d7e5 1px solid; }";
                $this->class_td             = ".class_td {BORDER-RIGHT: #d0d7e5 1px solid; PADDING-RIGHT: 2px; PADDING-LEFT: 2px; PADDING-BOTTOM: 1px; PADDING-TOP: 1px; FONT: Tahoma; BORDER-LEFT: #ffffff 1px solid; BORDER-BOTTOM: #d0d7e5 1px solid; }";
                $this->class_td_selected    = ".class_td_selected { BORDER-RIGHT: #d0d7e5 1px solid; PADDING-RIGHT: 2px; PADDING-LEFT: 5px; PADDING-BOTTOM: 2px; FONT: Tahoma; BORDER-LEFT: #ffffff 1px solid; PADDING-TOP: 2px; BORDER-BOTTOM: #d0d7e5 1px solid; }";
                $this->class_button         = ".class_button {BORDER-RIGHT: #688caf 1px solid; PADDING-RIGHT: 2px; BORDER-TOP: #ffffff 2px solid; PADDING-LEFT: 5px; PADDING-BOTTOM: 2px; FONT: bold 12px Tahoma; BORDER-LEFT: #ffffff 1px solid; COLOR: #333333; PADDING-TOP: 2px; BORDER-BOTTOM: #688caf 1px solid; BACKGROUND-COLOR: #cdd9ea}";
                $this->class_select         = ".class_select {BORDER: #BFCDE1 1px solid; FONT: NORMAL 12px Tahoma;background-color: #f7f9fb;}";
                $this->class_label          = ".class_label {FONT-SIZE: 12px; FONT-FAMILY: Tahoma; }";                
                $this->class_textbox        = ".class_textbox {BORDER: #BFCDE1 1px solid; FONT: NORMAL 12px Tahoma;width:210px;padding-left:3px;}";
                $this->class_textarea       = ".class_textarea {BORDER: #BFCDE1 1px solid; FONT: NORMAL 12px Tahoma;width:210px;scrollbar-face-color:#e4ecf7;scrollbar-darkshadow-color:#d0d7e5; scrollbar-3dlight-color:#d0d7e5;padding-left:3px;}";
                $this->class_checkbox       = ".class_checkbox {BORDER:0px; FONT: NORMAL 12px Tahoma;width:20px;}";
                $this->class_radiobutton    = ".class_radiobutton {BORDER:0px; FONT: NORMAL 12px Tahoma;width:20px;}";
                $this->class_error_message  = ".class_error_message {FONT: NORMAL 12px Tahoma; COLOR: #ff3300; }";
                $this->class_ok_message     = ".class_ok_message {FONT: NORMAL 12px Tahoma; COLOR: #44ff44; }";                
                $this->class_a   = "a.class_a { background: transparent; color: #225588; text-decoration: none; FONT-SIZE: 12px; FONT-FAMILY: Tahoma; }";
                $this->class_a  .= "a.class_a:hover { background: transparent; color: #6699bb; text-decoration: none; FONT-SIZE: 12px; FONT-FAMILY: Tahoma; }";
                $this->class_a  .= "a.class_a:visited { background: transparent; color: #225588; text-decoration: none; FONT-SIZE: 12px; FONT-FAMILY: Tahoma; }";
                $this->class_a2  = "a.class_a2 { background: transparent; color: #225588; text-decoration: none; FONT-SIZE: 12px; FONT-FAMILY: Tahoma; }";
                $this->class_a2 .= "a.class_a2:hover { background: transparent; color: #6699bb; text-decoration: none; FONT-SIZE: 12px; FONT-FAMILY: Tahoma; }";
                $this->class_a2 .= "a.class_a2:visited { background: transparent; color: #225588; text-decoration: none; FONT-SIZE: 12px; FONT-FAMILY: Tahoma; }";
                $this->rowColor  = "#f7f9fb";
                $this->rowColor2 = "#ffffff";            
                $this->rowColor3 = "#d9e3f1";
                $this->rowColor4 = "#e4ecf7"; 
                $this->rowColor5 = "#FEFFE8";
                $this->rowColor6 = "#FEFFE8";
                $this->rowColor7 = "#cdd9ea"; // header (th main) column
            }else {
                $this->css_class            = "default";
                $this->class_caption        = ".caption {FONT: NORMAL 14px Tahoma; font-weight: bold; text-align:center; Padding-bottom: 0;}";
                $this->class_fieldset       = ".class_fieldset { margin: 0px;width:90%; BORDER: #dddddd 1px solid;}";
                $this->class_filter_table   = ".class_filter_table {BORDER: #d0d0d0 0px solid; FONT: NORMAL 12px Tahoma;}";            
                $this->class_legend         = ".class_legend {FONT: NORMAL 12px Tahoma;}";
                $this->class_paging_table   = ".class_paging_table {BORDER: #d0d0d0 0px solid; FONT: NORMAL 12px Tahoma;}";                
                $this->class_table          = ".class_table {BORDER-COLLAPSE: collapse; BORDER: #d0d0d0 1px solid; FONT: NORMAL 12px Tahoma;}";            
                $this->class_th             = ".class_th { BORDER-BOTTOM: #ffcc33 2px solid; BORDER-RIGHT: #d2d0bb 2px solid; PADDING-RIGHT: 2px; PADDING-LEFT: 5px; PADDING-BOTTOM: 2px; FONT: bold 13px Tahoma; COLOR: #333333; PADDING-TOP: 2px; }";
                $this->class_th_normal      = ".class_th_normal { BORDER-BOTTOM: #d2d0bb 2px solid; BORDER-RIGHT: #d2d0bb 2px solid; PADDING-RIGHT: 2px; PADDING-LEFT: 5px; PADDING-BOTTOM: 2px; FONT: bold 13px Tahoma; COLOR: #333333; PADDING-TOP: 2px; BACKGROUND-COLOR: #e2e0cb}";                
                $this->class_th_selected    = ".class_th_selected { BORDER-BOTTOM: #cd0000 2px solid; BORDER-RIGHT: #d2d0bb 2px solid; PADDING-RIGHT: 2px; PADDING-LEFT: 5px; PADDING-BOTTOM: 2px; FONT: bold 13px Tahoma; COLOR: #333333; PADDING-TOP: 2px; BACKGROUND-COLOR: #e2e0cb}";                
                $this->class_td_main        = ".class_td_main { BORDER-TOP: #f1efe2 1px solid; BORDER-RIGHT: #fefefe 1px solid; PADDING-RIGHT: 2px; PADDING-LEFT: 2px; PADDING-BOTTOM: 2px; PADDING-TOP: 2px; FONT: Tahoma; }";
                $this->class_td             = ".class_td      { BORDER: #f1efe2 1px solid; PADDING-RIGHT: 2px; PADDING-LEFT: 2px; PADDING-BOTTOM: 2px; PADDING-TOP: 2px; FONT: Tahoma;  }";
                $this->class_td_selected    = ".class_td_selected { BORDER: #f1efe2 1px solid; PADDING-RIGHT: 2px; PADDING-LEFT: 2px; PADDING-BOTTOM: 2px; FONT: Tahoma; PADDING-TOP: 2px; }";
                $this->class_button         = ".class_button {BORDER-RIGHT: #b2b09b 1px solid; PADDING-RIGHT: 2px; BORDER-TOP: #ffffff 2px solid; PADDING-LEFT: 5px; PADDING-BOTTOM: 2px; FONT: bold 12px Tahoma; BORDER-LEFT: #ffffff 1px solid; COLOR: #333333; PADDING-TOP: 2px; BORDER-BOTTOM: #b2b09b 1px solid; BACKGROUND-COLOR: #e2e0cb}";
                $this->class_select         = ".class_select {BORDER: #b2b09b 1px solid; FONT: NORMAL 12px Tahoma;background-color: #fcfaf6;}";
                $this->class_textbox        = ".class_textbox {BORDER: #b2b09b 1px solid; FONT: NORMAL 12px Tahoma;width:210px;padding-left:3px;}";
                $this->class_label          = ".class_label {FONT-SIZE: 12px; FONT-FAMILY: Tahoma; }";                
                $this->class_textarea       = ".class_textarea {BORDER: #b2b09b 1px solid; FONT: NORMAL 12px Tahoma;width:210px;scrollbar-face-color:#e4ecf7;scrollbar-darkshadow-color:#d0d7e5; scrollbar-3dlight-color:#d0d7e5;padding-left:3px;}";                
                $this->class_checkbox       = ".class_checkbox {BORDER:0px; FONT: NORMAL 12px Tahoma;width:20px;}";
                $this->class_radiobutton    = ".class_radiobutton {BORDER:0px; FONT: NORMAL 12px Tahoma;width:20px;}";
                $this->class_error_message  = ".class_error_message {FONT: NORMAL 12px Tahoma; COLOR: #ff8822; }";
                $this->class_ok_message     = ".class_ok_message {FONT: NORMAL 12px Tahoma; COLOR: #449944; }";                
                $this->class_a   = "a.class_a { background: transparent; color: #72705b; text-decoration: none; FONT-SIZE: 12px; FONT-FAMILY: Tahoma;}"; 
                $this->class_a  .= "a.class_a:hover { background: transparent; color: #f0c030; text-decoration: none; FONT-SIZE: 12px; FONT-FAMILY: Tahoma; }";
                $this->class_a2  = "a.class_a2 { background: transparent; color: #72705b; text-decoration: none; FONT-SIZE: 12px; FONT-FAMILY: Tahoma; }";
                $this->class_a2 .= "a.class_a2:hover { background: transparent; color: #ffcc33; text-decoration: none; FONT-SIZE: 12px; FONT-FAMILY: Tahoma;}";
                $this->class_a2 .= "a.class_a2:visited { background: transparent; color: #72705b; text-decoration: none; FONT-SIZE: 12px; FONT-FAMILY: Tahoma;}";
                $this->rowColor  = "#fcfaf6";  
                $this->rowColor2 = "#ffffff";            
                $this->rowColor3 = "#ebeadb"; // dark
                $this->rowColor4 = "#ebeadb"; // lignht
                $this->rowColor5 = "#e2f3fc"; // row mouse over lighting
                $this->rowColor6 = "#0033cc"; // on mouse click
                $this->rowColor7 = "#e2e0cb"; // header (th main) column 
            }
        }
        // if we in Print Mode
        if($req_print == true){
            $this->class_table          = ".class_table {BORDER: #d0d0d0 1px solid; padding: 0px; margin:0px; FONT: NORMAL 12px Tahoma;}";            
            $this->class_th             = ".class_th { BORDER: #d0d0d0 1px solid; padding: 0px; margin:0px; }";
            $this->class_th_normal      = ".class_th_normal { BORDER: #d0d0d0 1px solid; padding: 0px; margin:0px; }";
            $this->class_td_main        = ".class_td_main { BORDER: #d0d0d0 1px solid; FONT:  Tahoma; padding: 0px; margin:0px;   }";
            $this->class_td             = ".class_td { BORDER: #d0d0d0 1px solid; padding: 0px; margin:0px;  FONT: Tahoma;  }";
            $this->class_td_selected    = ".class_td_selected { BORDER: #d0d0d0 1px solid; padding: 0px; margin:0px;  FONT: Tahoma;  }";
            $this->rowColor  = "";
            $this->rowColor2 = "";            
            $this->rowColor3 = ""; // dark
            $this->rowColor4 = ""; // lignht
            $this->rowColor5 = ""; // row mouse over lighting
            $this->rowColor6 = ""; // on mouse click
            $this->rowColor7 = ""; // header (th main) column             
        }
    }

    //--------------------------------------------------------------------------
    // write css class
    //--------------------------------------------------------------------------
    function writeCssClass(){
        if($this->css_type == "file"){
            echo "<link rel='stylesheet' type='text/css' href='".$this->css_file_path."' />\n";
        }else{            
            echo "<!--[if IE]>\n";
            echo "<style type='text/css'>\n";
            echo $this->class_textarea;
            echo "</style>\n";
            echo "<![endif]-->\n";
            echo "<style type='text/css'>\n";
            echo $this->class_fieldset."\n";
            echo $this->class_filter_table."\n";
            echo $this->class_legend."\n";
            echo $this->class_paging_table."\n";
            echo $this->class_table."\n";
            echo $this->class_tr."\n";
            echo $this->class_th."\n";
            echo $this->class_th_normal."\n";
            echo $this->class_th_selected."\n";         
            echo $this->class_td_main."\n";
            echo $this->class_td_selected."\n";
            echo $this->class_td."\n";
            echo $this->class_a."\n";
            echo $this->class_a2."\n";
            echo $this->class_button."\n";
            echo $this->class_select."\n";
            echo $this->class_label."\n";
            echo $this->class_textbox."\n";        
            echo $this->class_checkbox."\n";
            echo $this->class_radiobutton."\n";
            echo $this->class_caption."\n";
            echo $this->class_error_message."\n";
            echo $this->class_ok_message."\n";
            echo "</style>\n";
        }    
    }

    //--------------------------------------------------------------------------
    // set title for datagrid
    //--------------------------------------------------------------------------
    function setCaption($dg_title = ""){
        $this->caption = $dg_title;
    }

    //--------------------------------------------------------------------------
    // set data source 
    //--------------------------------------------------------------------------
    function dataSource(&$db_handl, $sql = "", $start_order = "", $start_order_type = ""){
        $this->setInterfaceLang();
        
        $req_sort_field = $this->getRequestVars('sort_field');
        $req_sort_type = $this->getRequestVars('sort_type');
        $this->db_handler = $db_handl;       
        $this->db_handler->setFetchMode(DB_FETCHMODE_ORDERED);  
        $this->sql_view = str_replace(";", "", $sql);        
        // handle SELECT statments with sub-SELECTs 
        if($this->lastSubStrOccurence($this->sql_view, " from ") < $this->lastSubStrOccurence($this->sql_view, " where ")){
            $this->sql_view .= " WHERE 1=1 ";
        }
        $this->sql = $this->sql_view;        
        if($req_sort_field){
            if(!substr_count($this->sql, "ORDER BY")){
              $this->sql_sort = " ORDER BY ".$req_sort_field." ".$req_sort_type;
            }else{
              $this->sql_sort = " , ".$req_sort_field." ".$req_sort_type;
            }
        }else if($start_order != ""){
            $this->sql_sort = " ORDER BY ".$start_order." ".$start_order_type;
        }else{
            $this->sql_sort = " ORDER BY 1 ASC";            
        }
        $this->default_sort_field = $start_order;            
        if((strtolower($start_order_type) != "desc") && (strtolower($start_order_type) != "asc")) {
            $this->default_sort_type = "desc";
        }else{
            $this->default_sort_type = $start_order_type;
        }
        $this->getDataSet($this->sql_sort);
    }    

    //--------------------------------------------------------------------------
    // get DataSet
    //--------------------------------------------------------------------------
    function getDataSet($fsort, $limit = ""){
	$sqlVariables=array( 'character_set_client'=>$this->encoding,
            'character_set_server'=>$this->encoding,
            'character_set_results'=>$this->encoding,
            'character_set_database'=>$this->encoding,
            'character_set_connection'=>$this->encoding,
            'collation_server'=>'utf8_unicode_ci',
            'collation_database'=>'utf8_unicode_ci',
            'collation_connection'=>'utf8_unicode_ci'
	);
	foreach($sqlVariables as $var => $value){
		$sql="SET $var=$value;";
		$this->db_handler->query($sql);
	}       
        $this->dataSet = & $this->db_handler->query($this->sql." ".$fsort." ".$limit);
        $this->rows_total = $this->numberRows();
        if($limit == ""){
            $this->setSqlLimit(); 
            $limit = "LIMIT ".$this->limit_start.", ".$this->limit_end." ";
            $this->dataSet = & $this->db_handler->query($this->sql." ".$fsort." ".$limit);
        }        
        
        if($this->db_handler->isError($this->dataSet) == 1){
            $this->is_error = true;
        }

        $this->rows = $this->numberRows();
        $this->columns = $this->numberCols();
        
        if($this->debug)
            echo "<b>search sql (".strtolower($this->lang['total']).": ".$this->rows.") </b>". $this->sql.$fsort." ".$limit."<br><br>";
        if ((!$this->dataSet) || ($this->rows <= 0) ){
            //exit;
        }

        $this->rowLower = 0;
        $this->rowUpper = $this->rows;

        $this->colLower = 0;
        $this->colUpper = $this->columns;        
    }

    //--------------------------------------------------------------------------
    // selectSQL - return a field after executing custom SELECT SQL statement
    //--------------------------------------------------------------------------
    function selectSQL($sql = ""){
        $dataField = "";
        if($sql != ""){
            $sqlVariables=array( 'character_set_client'=>$this->encoding,
                'character_set_server'=>$this->encoding,
                'character_set_results'=>$this->encoding,
                'character_set_database'=>$this->encoding,
                'character_set_connection'=>$this->encoding,
                'collation_server'=>'utf8_unicode_ci',
                'collation_database'=>'utf8_unicode_ci',
                'collation_connection'=>'utf8_unicode_ci'
            );
            foreach($sqlVariables as $var => $value){
                    $s_sql="SET $var=$value;";
                    $this->db_handler->query($s_sql);
            }
            $dataSet = & $this->db_handler->query($sql);
            if($dataSet->numCols() > 0){
               $row = $dataSet->fetchRow();
               $dataField = $row[0];
            }
        }        
        return $dataField;                
    }

    //--------------------------------------------------------------------------
    // executeSQL - return dataSet after executing custom SQL statement
    //--------------------------------------------------------------------------
    function executeSQL($sql = ""){
        $dataSet = "";
        if($sql != ""){
            $sqlVariables=array( 'character_set_client'=>$this->encoding,
                'character_set_server'=>$this->encoding,
                'character_set_results'=>$this->encoding,
                'character_set_database'=>$this->encoding,
                'character_set_connection'=>$this->encoding,
                'collation_server'=>'utf8_unicode_ci',
                'collation_database'=>'utf8_unicode_ci',
                'collation_connection'=>'utf8_unicode_ci'
            );
            foreach($sqlVariables as $var => $value){
                    $s_sql="SET $var=$value;";
                    $this->db_handler->query($s_sql);
            }
            $dataSet = & $this->db_handler->query($sql);
        }        
        return $dataSet;                
    }

    //--------------------------------------------------------------------------
    // bind data and draw 
    //--------------------------------------------------------------------------
    function bind(){
        $req_mode = $this->getRequestVars('mode');
        $req_rid = $this->getRequestVars('rid');
        $req_new = $this->getRequestVars('new');
        $req_page_size = $this->getRequestVars('page_size');
        $req_sort_field = $this->getRequestVars('sort_field');
        $req_sort_type = $this->getRequestVars('sort_type');
        $req_print = $this->getRequestVars('print');        

        // first opening
        if($req_mode == ""){
            $this->getDataSet($this->sql_sort);
            $view_limit = "LIMIT 0, ".$req_page_size;
        }
        
        // DELETE mode processing 
        if(($req_mode == "delete") && ($req_rid != "")){          
            $this->rid = $req_rid;
            $this->sql = $this->sql_view;
            $this->getDataSet($this->sql_sort);
            if($req_print != true){
                $this->deleteRow($this->rid);
            }
            $this->mode = "view";
        }

        // EDIT & DETAILS modes processing 
        if((($req_mode == "edit") || ($req_mode == "details")) && ($req_rid != "")){          
            if($req_new == 1){
                $this->dataSet = $this->db_handler->query($this->sql);            
            }
            $this->rid = $req_rid;
            $this->allowSorting(false);
            $this->allowPaging(false);            
            $this->sql_sort = " ORDER BY " . $this->PrimaryKey . " DESC";
            if(($this->layouts['view'] == 0) && ($this->layouts['edit'] == 1) && ($req_mode == "details")){
                $view_limit = "LIMIT 0, ".$req_page_size;
                $where = "WHERE ".$this->PrimaryKey." = ".$req_rid." ";
                $this->sql_sort = "";
                $this->sql = "SELECT * FROM $this->tblName ".$where;                 
            }else if(($this->layouts['view'] == 0) && ($this->layouts['edit'] == 1) && ($req_mode == "edit")){
                $view_limit = "LIMIT 0, ".$req_page_size;
                $where = "WHERE ".$this->PrimaryKey." = ".$req_rid." ";
                $this->sql_sort = "";
                $this->sql = "SELECT * FROM $this->tblName ".$where; 
            }else if(($this->layouts['view'] == 0) && ($this->layouts['edit'] == 0) && ($req_mode == "details")){
                $view_limit = "LIMIT 0, 1";
                $where = "WHERE ".$this->PrimaryKey." = ".$req_rid." ";
                $this->sql_sort = "";
                $this->sql = "SELECT * FROM $this->tblName ".$where; 
            }else if(($this->layouts['view'] == 0) && ($this->layouts['edit'] == 0) && ($req_mode == "edit")){
                $view_limit = "";                
                if($this->condition != "") $where = " WHERE ". $this->condition;
                else $where = "";
                if($req_sort_field != "") $this->sql_sort = " ORDER BY " . $req_sort_field . " " . $req_sort_type;
                $this->sql = "SELECT * FROM $this->tblName ".$where;
            }else{
                $view_limit = "LIMIT 0, ".$req_page_size;
                $where = "WHERE ".$this->PrimaryKey." = ".$req_rid." ";
                $this->sql = "SELECT * FROM $this->tblName ".$where;                 
            }            

            $this->getDataSet($this->sql_sort, $view_limit);
            if($req_mode == "edit") $this->mode = "edit";
            else $this->mode = "details";           
        }

        if($req_mode == "cancel"){
            $this->rid = "";
            $this->sql = $this->sql_view;
            $this->getDataSet($this->sql_sort);            
            $this->mode = "view";
        }

        if($req_mode == "update"){
            $this->rid = $req_rid;
            $this->sql = "SELECT * FROM $this->tblName ";
            $this->getDataSet($this->sql_sort);
            if($req_print != true){
                if($req_new != 1){
                     $this->updateRow($this->rid, "");
                }else{
                     $this->addRow();
                }                
            }
            $this->sql = $this->sql_view; $this->getDataSet($this->sql_sort);                                  
            $this->mode = "view";          
        }

        // ADD mode processing 
        if($req_mode == "add"){
            // we don't need multirow option allowed when we add new record
            $this->is_multirow_allowed = false;
            if(($this->layouts['view'] == 0) && ($this->layouts['edit'] == 0)){
                // we need
                $view_limit = "";
                if($this->condition != "") $where = " WHERE ". $this->condition;
                else $where = "";
                $this->sql = "SELECT * FROM $this->tblName ".$where;                
            }else{
                $view_limit = "";
                $this->sql = "SELECT * FROM $this->tblName ";                
            }            
            $this->getDataSet($this->sql_sort, $view_limit);
            $this->rid = -1;
            $this->allowSorting(false);
            $this->allowPaging(false);
            $this->mode = "edit";
        }

        if($this->dataSet){            
            if(($this->mode === "edit") || ($this->mode === "add")){
                $this->layout_type = "edit";
                $this->allowHighlighting(false);
            }else if($this->mode === "details") $this->layout_type = "show";
            else $this->layout_type = "view";            
            if($this->layouts[$this->layout_type] == 0) $this->draw_tabular();
            else if($this->layouts[$this->layout_type] == 1) $this->draw_columnar();
            else $this->draw_tabular();
        }
        
    }

    //--------------------------------------------------------------------------
    // set encoding
    //--------------------------------------------------------------------------
    function setEncoding($dg_encoding = ""){
        $this->encoding = ($dg_encoding != "") ? $dg_encoding : $this->encoding;
    }

    //--------------------------------------------------------------------------
    // set direction
    //--------------------------------------------------------------------------
    function setDirection($direction = "ltr"){
        $this->direction = $direction;
    }

    //--------------------------------------------------------------------------
    // set settings functions
    //--------------------------------------------------------------------------
    function setLayouts($layouts = ""){
        $this->layouts['view']  = (isset($layouts['view'])) ? $layouts['view'] : 0;
        $this->layouts['edit']  = (isset($layouts['edit'])) ? $layouts['edit'] : 0;
        $this->layouts['filter'] = (isset($layouts['filter'])) ? $layouts['filter'] : 0;
        $this->layouts['show'] = 1;        
    }
    function setTableSettings($parameters){
        if(isset($parameters['view']['align'])) $this->tblAlign['view'] = $parameters['view']['align'];
        if(isset($parameters['view']['width'])) $this->tblWidth['view'] = $parameters['view']['width'];
        if(isset($parameters['view']['border'])) $this->tblBorder['view'] = $parameters['view']['border'];
        if(isset($parameters['view']['bordercolor'])) $this->tblBorderColor['view'] = $parameters['view']['bordercolor'];
        if(isset($parameters['view']['cellspacing'])) $this->tblCellSpacing['view'] = $parameters['view']['cellspacing'];
        if(isset($parameters['view']['cellpadding'])) $this->tblCellPadding['view'] = $parameters['view']['cellpadding'];

        if(isset($parameters['edit']['align'])) $this->tblAlign['edit'] = $parameters['edit']['align']; else $parameters['view']['align'];
        if(isset($parameters['edit']['width'])) $this->tblWidth['edit'] = $parameters['edit']['width']; else $parameters['view']['width'];
        if(isset($parameters['edit']['border'])) $this->tblBorder['edit'] = $parameters['border']; else $parameters['view']['border'];
        if(isset($parameters['edit']['bordercolor'])) $this->tblBorderColor['edit'] = $parameters['edit']['bordercolor']; else $parameters['view']['bordercolor'];
        if(isset($parameters['edit']['cellspacing'])) $this->tblCellSpacing['edit'] = $parameters['edit']['cellspacing']; else $parameters['view']['cellspacing'];
        if(isset($parameters['edit']['cellpadding'])) $this->tblCellPadding['edit'] = $parameters['edit']['cellpadding']; else $parameters['view']['cellpadding'];

    }
    function setPagingSettings($lower=false, $upper=false, $pages_array=false, $default_page_size=""){
        if($lower){
            if($lower['results']) $this->lower_paging['results'] = $lower['results'];
            if($lower['results_align']) $this->lower_paging['results_align'] = $lower['results_align'];
            if($lower['pages']) $this->lower_paging['pages'] = $lower['pages'];            
            if($lower['pages_align']) $this->lower_paging['pages_align'] = $lower['pages_align'];
            if($lower['page_size']) $this->lower_paging['page_size'] = $lower['page_size'];
            if($lower['page_size_align']) $this->lower_paging['page_size_align'] = $lower['page_size_align'];
        }
        if($upper){
            if($upper['results']) $this->upper_paging['results'] = $upper['results'];
            if($upper['results_align']) $this->upper_paging['results_align'] = $upper['results_align'];
            if($upper['pages']) $this->upper_paging['pages'] = $upper['pages'];            
            if($upper['pages_align']) $this->upper_paging['pages_align'] = $upper['pages_align'];
            if($upper['page_size']) $this->upper_paging['page_size'] = $upper['page_size'];
            if($upper['page_size_align']) $this->upper_paging['page_size_align'] = $upper['page_size_align'];
        }
        if($pages_array){
            if(is_array($pages_array) && (count($pages_array) > 0)){                
                for($i=0; $i < count($pages_array); $i++){
                    if (intval($pages_array[$i]) == 0) $pages_array[$i] = 1;
                }
                $this->pages_array = $pages_array;
                $this->req_page_size = ($pages_array[0] > 0) ? $pages_array[0] : $this->req_page_size;                
            }
        }
        if(($default_page_size != "") && ($default_page_size > 0)) { $this->req_page_size = $default_page_size; }
    }

    function allowHighlighting($option = true){ $this->allow_row_highlighting = $option; }    
    function allowPrinting($option = true){ $this->allow_printing = $option; }    
    function allowExporting($option = true){ $this->allow_exporting = $option; }    
    function allowSorting($option = true){ $this->allow_sorting = $option; }    
    function allowFiltering($option = false){ $this->allow_filtering = $option; }
    function allowPaging($option = true, $rows_numeration = false, $numeration_sign = "N #"){
        $this->allow_paging = $option;
        $this->rows_numeration = $rows_numeration;
        $this->numeration_sign = $numeration_sign;       
    }
    function allowMultirowOpeartions($multirow_option = false){
        $this->is_multirow_allowed = $multirow_option;
    }
    
    function setFieldsFiltering($filter_fields_array = ""){
        if(is_array($filter_fields_array)){
            foreach($filter_fields_array as $fldName => $fldValue){
                $this->filter_fields[$fldName] = $fldValue;
            }                   
            if(isset($_REQUEST[$this->unique_prefix."_ff_".'onSUBMIT_FILTER'])){
                $search_type_start = "AND";
                if(isset($_REQUEST[$this->unique_prefix."_ff_".'selSearchType']) && ($_REQUEST[$this->unique_prefix."_ff_".'selSearchType'] == "0")){
                    $search_type = "AND";                    
                }else{
                    $search_type = "OR";
                }
                if(!substr_count(strtolower($this->sql_view), "where")) $this->sql_view .= " WHERE 1=1 ";
                foreach($filter_fields_array as $fldName => $fldValue){
                    $table_field_name="";
                    $table_field_name = $fldValue['table']."_".$fldValue['field'];
                    //if(isset($_REQUEST[$table_field_name]) AND ($_REQUEST[$table_field_name] != ""))
                    if(isset($_REQUEST[$this->unique_prefix."_ff_".$table_field_name]) && trim($_REQUEST[$this->unique_prefix."_ff_".$table_field_name]) !== ""){                        
                            $filter_field_operator =  $table_field_name."_operator";
                            if(isset($fldValue['case_sensitive']) && ($fldValue['case_sensitive'] != true)){
                                $fldTableField = "lcase(".$fldValue['table'].".".$fldValue['field'].")";
                                $fldTableFieldName = strtolower($_REQUEST[$this->unique_prefix."_ff_".$table_field_name]);
                            }else{
                                $fldTableField = $fldValue['table'].'.'.$fldValue['field'];
                                $fldTableFieldName = $_REQUEST[$this->unique_prefix."_ff_".$table_field_name];
                            }
                            if(isset($fldValue['comparison_type']) && (strtolower($fldValue['comparison_type']) == "numeric")){
                                $left_geresh =""; $right_geresh ="";
                            }else{
                                $left_geresh ="'"; $right_geresh ="'";
                            }                            
                            if(isset($_REQUEST[$this->unique_prefix."_ff_".$filter_field_operator])){                                
                                if(isset($fldValue['comparison_type']) && (strtolower($fldValue['comparison_type']) == "binary")) $comparison_type = "BINARY";
                                else $comparison_type ="";
                                if($_REQUEST[$this->unique_prefix."_ff_".$filter_field_operator] == "like"){
                                    $this->sql_view .= " $search_type_start $fldTableField ".$_REQUEST[$this->unique_prefix."_ff_".$filter_field_operator]." ".$comparison_type." '%".$fldTableFieldName."%'";
                                }else if($_REQUEST[$this->unique_prefix."_ff_".$filter_field_operator] == "like%"){
                                    $this->sql_view .= " $search_type_start $fldTableField ".substr($_REQUEST[$this->unique_prefix."_ff_".$filter_field_operator], 0, 4)." ".$comparison_type." '".$fldTableFieldName."%'";
                                }else if($_REQUEST[$this->unique_prefix."_ff_".$filter_field_operator] == "%like"){
                                    $this->sql_view .= " $search_type_start $fldTableField ".substr($_REQUEST[$this->unique_prefix."_ff_".$filter_field_operator], 1, 4)." ".$comparison_type." '%".$fldTableFieldName."'";
                                }else{
                                    $this->sql_view .= " $search_type_start $fldTableField ".$_REQUEST[$this->unique_prefix."_ff_".$filter_field_operator]." $left_geresh".$fldTableFieldName."$left_geresh ";
                                }
                            }else{
                                $this->sql_view .= " $search_type_start $fldTableField = $left_geresh".$fldTableFieldName."$left_geresh ";                                    
                            }                                                        
                            if($search_type_start !== $search_type){
                               $search_type_start = $search_type; 
                            }
                        }
                }
                $this->dataSource($this->db_handler, $this->sql_view);
            }
        }        
    }
    
    //--------------------------------------------------------------------------
    // set mode add/edit/cancel/delete
    //--------------------------------------------------------------------------
    function setModes($parameters){
        $this->modes = array();
        if(is_array($parameters)){
            foreach($parameters as $modeName => $modeValue){
                $this->modes[$modeName] = $modeValue;
            }            
        }
        $this->mode = "view";
    }  	    

    //--------------------------------------------------------------------------
    // set editing table & primary key Id
    //--------------------------------------------------------------------------
    function setTableEdit($tbl_name, $field_name, $condition = ""){
        $this->tblName = $tbl_name;
        $this->PrimaryKey = $field_name;
        $this->condition = $condition;
    }

    //--------------------------------------------------------------------------
    // set Fields As Hypertext
    //--------------------------------------------------------------------------    
    function setFieldsAsHypertext($fieldsArray = ""){
        $this->fieldsAsHypertextArray = array();
        if(is_array($fieldsArray)){                                
            $this->fieldsAsHypertextArray = array_merge($this->fieldsAsHypertextArray, $fieldsArray);
        }
    }   

    //--------------------------------------------------------------------------
    // set set Foreign Keys Editing
    //--------------------------------------------------------------------------    
    function setForeignKeysEdit($foreign_keys_array = ""){
        if(is_array($foreign_keys_array)){                
            foreach($foreign_keys_array as $fldName => $fldValue){
                $this->foreign_keys_array[$fldName] = $fldValue;
            }
        }
    }

    //--------------------------------------------------------------------------
    // set View Mode Table Properties
    //--------------------------------------------------------------------------    
    function setViewModeTableProperties($vmt_properties = ""){        
        if(is_array($vmt_properties) && (count($vmt_properties) > 0)){
            if(isset($vmt_properties['width'])) $this->tblWidth['view'] = $vmt_properties['width'];    
        }
    }

    //--------------------------------------------------------------------------
    // set Add/Edit/Details Mode Table Properties
    //--------------------------------------------------------------------------    
    function setEditModeTableProperties($emt_properties = ""){        
        if(is_array($emt_properties) && (count($emt_properties) > 0)){
            if(isset($emt_properties['width'])) $this->tblWidth['edit'] = $emt_properties['width'];    
        }
    }

    //--------------------------------------------------------------------------
    // set Details Mode Table Properties
    //--------------------------------------------------------------------------    
    function setDetailsModeTableProperties($dmt_properties = ""){        
        if(is_array($dmt_properties) && (count($dmt_properties) > 0)){
            if(isset($dmt_properties['width'])) $this->tblWidth['details'] = $dmt_properties['width'];    
        }
    }
    
    //--------------------------------------------------------------------------
    // set Columns in View Mode
    //--------------------------------------------------------------------------    
    function setColumnsInViewMode($columns = ""){
        if(is_array($columns)){        
            foreach($columns as $fldName => $fldValue){
                $this->columns_view_mode[$fldName] = $fldValue;
            }
        }
    }

    //--------------------------------------------------------------------------
    // set Columns in Edit Mode
    //--------------------------------------------------------------------------    
    function setColumnsInEditMode($columns = ""){
        if(is_array($columns)){                
            foreach($columns as $fldName => $fldValue){
                $this->columns_edit_mode[$fldName] = $fldValue;
            }
        }
    }

    //--------------------------------------------------------------------------
    // table drawing functions 
    //--------------------------------------------------------------------------
    function showCaption() {
        echo ($this->caption != "") ? "<div class='caption'>". $this->caption ."</div>" : "";
    }

    function tblOpen(){
        if($this->scrolling_option == true) {
            $width = ($this->mode == "view") ?  "100%" : $this->tblWidth[$this->mode];
        }else{
            $width = $this->tblWidth[$this->mode];
        }        
        echo "<table dir='".$this->direction."' class='class_table' align='".$this->tblAlign[$this->mode]."' width='".$width."'>".chr(13);
        echo $this->tbodyOpen().chr(13);
    }    

    function tblClose(){
        echo $this->tbodyClose().chr(13);        
        echo "</table>".chr(13);
    }

    function scrollDivOpen(){
        if($this->scrolling_option == true){
            echo "<center><div style='text-align:center; padding:0px; width:".$this->scrolling_width."; height:".$this->scrolling_height."; overflow:auto;'>";
            echo chr(13);
        }
    }

    function scrollDivClose(){
        if($this->scrolling_option == true){        
            echo "</div></center>"; echo chr(13);
        }
    }

    function theadOpen() { echo "<thead>".chr(13);  }    
    function theadClose(){ echo "</thead>".chr(13); }
    function tbodyOpen() { echo "<tbody>".chr(13);  }    
    function tbodyClose(){ echo "</tbody>".chr(13); }
    function tfootOpen() { echo "<tfoot>".chr(13);  }    
    function tfootClose(){ echo "</tfoot>".chr(13); }    
    
    function rowOpen($id, $rowColor){
        $req_print = $this->getRequestVars('print');
        $text = "<tr class='class_tr' bgcolor='$rowColor' id='row_".$id."'";       
        if($req_print != true){
            if($this->allow_row_highlighting){
                $text .= " onclick=\"bgColor='".$this->rowColor6."'\" ";                
                $text .= " onmouseover=\"bgColor='".$this->rowColor5."';\" onmouseout=\"bgColor='".$rowColor."';\" ";                
            }            
        }else{
            $text .= " ";
        }
        $text .= ">".chr(13);
        echo $text;        
    }
    
    function rowClose(){
        echo "</tr>".chr(13);
    }
    
    function mainColOpen($align='left', $colSpan=0, $wrap='', $width='', $class='class_th', $style=''){
        $wrap = ($wrap == '') ? $this->wrap : $wrap;
        $text = "<th class='".$class."' bgColor='".$this->rowColor7."' ";
        $text .= ($this->mode != "edit") ? "onmouseover=\"bgColor='".$this->rowColor4."';\" onmouseout=\"bgColor='".$this->rowColor7."';\" " : "";
        $text .= ($width !=='')? " width='$width'" : "";
        $text .= (($colSpan != 0) ? "colspan='$colSpan'" : "")." $wrap $style>";
        echo $text;                
    }
    
    function mainColClose(){
        echo "</th>".chr(13);
    }   
    
    function colOpen($align='left', $colSpan=0, $wrap='', $bgcolor='', $class_td='class_td'){
        $req_print = $this->getRequestVars('print');
        $wrap = ($wrap == '') ? $this->wrap : $wrap;        
        $text = "<td class='$class_td'";
        if($req_print != true){
            if($this->allow_row_highlighting){
                $text .= " onmouseover=\"bgColor='".$this->rowColor5."';\" onmouseout=\"bgColor='".$bgcolor."';\" ";
            }                        
        }else{
            $text .= " ";
        }        
        $text .= ($bgcolor !== '')? "bgcolor='$bgcolor'":""; $text .= " style='text-align: ".$align.";' ".(($colSpan != 0) ? "colspan='$colSpan'" : "")."  $wrap>";
        echo $text;                
    }
    
    function colClose(){
        echo "</td>".chr(13);
    }
    
    function emptyRow(){
        $this->rowOpen("","");
        $this->colOpen();$this->colClose();
        $this->rowClose();                              
    }

    //--------------------------------------------------------------------------
    // draw Control Panel
    //--------------------------------------------------------------------------
    function drawControlPanel(){
        $req_print = $this->getRequestVars('print');
        $req_export = $this->getRequestVars('export');        
        
        $margin_bottom = ($this->layout_type == "edit") ? "margin-bottom: 7px;" : "margin-bottom: 5px;";
        echo "<table border='0' align='center' id='printTbl' style='margin-left: auto; margin-right: auto; $margin_bottom' width='".$this->tblWidth[$this->mode]."' cellspacing='1' cellpadding='1'>";
        echo "<tr>";
        echo "<td align='left'>";
        if($this->mode == "edit"){
            echo "<label class='class_label'>".$this->lang['required_fields_msg']."</label>";
        }
        echo "</td>";        
        if($this->allow_filtering && (($this->mode != "edit") && ($this->mode != "details"))){
            echo "<td align='right' nowrap width='20px'>";
            echo "<script type='text/javascript'>\n";
            echo  "<!--//\n";
            echo "function isCookieAllowed(){
                setCookie('cookie_allowed',1,10); 
                if(readCookie('cookie_allowed') != 1) {alert('This operation requires that your browser accepts cookies! Please turn on cookies accepting.'); return false; }; 
                return true; 
            }
            function hideUnHideFiltering(type){
                if(!isCookieAllowed()) return false;
                if(type == 'hide'){
                    document.getElementById('".$this->unique_prefix."searchset').style.display = 'none'; 
                    document.getElementById('".$this->unique_prefix."a_hide').style.display = 'none'; 
                    document.getElementById('".$this->unique_prefix."a_unhide').style.display = ''; 
                    setCookie('hide_search',1,10); 
                }else{
                    document.getElementById('".$this->unique_prefix."searchset').style.display = ''; 
                    document.getElementById('".$this->unique_prefix."a_hide').style.display = ''; 
                    document.getElementById('".$this->unique_prefix."a_unhide').style.display = 'none'; 
                    setCookie('hide_search',0,10); 
                }
                return true;
            }\n";
            echo "-->\n";
            echo "</script>";    
            $hide_display = "";
            $unhide_display = "display: none; ";            
            if(isset($_COOKIE['hide_search'])) {
                if($_COOKIE['hide_search'] == 1){    
                    $this->hide_display = "display: none;";
                    $hide_display = "display: none; ";
                    $unhide_display = "";                    
                }else{
                    $this->hide_display = "";
                    $hide_display = "";
                    $unhide_display = "display: none; ";                    
                }
            }
            if($req_print != true){
                echo "<a id='".$this->unique_prefix."a_hide' style='cursor:pointer; ".$hide_display."' onClick=\"return hideUnHideFiltering('hide');\"><img src='".$this->directory."images/".$this->css_class."/search_hide_b.gif' onmouseover='this.src=\"".$this->directory."images/".$this->css_class."/search_hide_r.gif\"' onmouseout='this.src=\"".$this->directory."images/".$this->css_class."/search_hide_b.gif\"' alt='".$this->lang['hide_search']."' /></a>";
                echo "<a id='".$this->unique_prefix."a_unhide' style='cursor:pointer; ".$unhide_display."' onClick=\"return hideUnHideFiltering('unhide');\"><img src='".$this->directory."images/".$this->css_class."/search_unhide_b.gif' onmouseover='this.src=\"".$this->directory."images/".$this->css_class."/search_unhide_r.gif\"' onmouseout='this.src=\"".$this->directory."images/".$this->css_class."/search_unhide_b.gif\"' alt='".$this->lang['unhide_search']."' /></a>";
            }
            echo "</td>";
        }
        echo "<td align='right' width='20px'>";
            if($this->allow_exporting){ 
                if((($req_export == "") || ($req_print != true)) && ($req_print == "")){
                    echo "<a style='cursor:pointer;' onClick=\"myRef=window.open(''+self.location+'".(($_SERVER['QUERY_STRING'] == "")?"?":"&").$this->unique_prefix."export=true&".$this->unique_prefix."export_type=csv','ExportToExcel','left=100,top=100,width=600,height=400,toolbar=0,resizable=0,location=0,scrollbars=1');myRef.focus();\" class='class_a'>";
                    echo "<img src='".$this->directory."images/".$this->css_class."/excel_b.gif'  onmouseover='this.src=\"".$this->directory."images/".$this->css_class."/excel_r.gif\"' onmouseout='this.src=\"".$this->directory."images/".$this->css_class."/excel_b.gif\"' alt='".$this->lang['export_to_excel']."' /></a>";
                    echo "</td>";
                    echo "<td align='right' width='20px'>";
                    echo "<a style='cursor:pointer;' onClick=\"myRef=window.open(''+self.location+'".(($_SERVER['QUERY_STRING'] == "")?"?":"&").$this->unique_prefix."export=true&".$this->unique_prefix."export_type=xml','ExportToExcel','left=100,top=100,width=600,height=400,toolbar=0,resizable=0,location=0,scrollbars=1');myRef.focus();\" class='class_a'>";
                    echo "<img src='".$this->directory."images/".$this->css_class."/xml_b.png'  onmouseover='this.src=\"".$this->directory."images/".$this->css_class."/xml_r.png\"' onmouseout='this.src=\"".$this->directory."images/".$this->css_class."/xml_b.png\"' alt='".$this->lang['export_to_xml']."' /></a>";
                }
            }
        echo "</td>";
        if($this->allow_printing){
            if(($req_export == "") && ($req_print != true)){
                echo "<td align='right' width='20px'>";
                echo "<a style='cursor:pointer;' onClick=\"myRef=window.open(''+self.location+'".(($_SERVER['QUERY_STRING'] == "")?"?":"&").$this->unique_prefix."print=true','PrintableView','left=20,top=20,width=840,height=630,toolbar=0,menubar=0,resizable=0,location=0,scrollbars=1');myRef.focus()\" class='class_a'><img src='".$this->directory."images/".$this->css_class."/print_b.gif' onmouseover='this.src=\"".$this->directory."images/".$this->css_class."/print_r.gif\"' onmouseout='this.src=\"".$this->directory."images/".$this->css_class."/print_b.gif\"' alt='".$this->lang['printable_view']."' /></a>";
            }else{
                echo "<td align='right' nowrap>";                    
                echo "<a style='cursor:pointer; ' onClick='window:print();' class='class_a no_print'  title='".$this->lang['print_now_title']."'>".$this->lang['print_now']."</a>";
            }
        }
        echo "</td>";        
        echo "</tr>";
        echo "</table>";
    }

    //--------------------------------------------------------------------------
    // Export to CSV
    //--------------------------------------------------------------------------    
    function exportToCsv($type = "tabular"){
        // Let's make sure the we create the file first
        $this->req_page_size = (isset($_REQUEST[$this->unique_prefix.'page_size']))?$_REQUEST[$this->unique_prefix.'page_size']:$this->req_page_size;
        $fe = fopen("export.csv", "w+");
        if($fe){            
            $somecontent = "";       
            if($type == "tabular"){
                // fields headers    
                for($c = $this->colLower; $c < $this->colUpper; $c++){
                    if($this->canViewField($this->getFieldName($c))){
                        $somecontent .= ucfirst($this->getHeaderName($this->getFieldName($c)));
                        if($c < $this->colUpper - 1) $somecontent .= ",";                                    
                    }
                }
                $somecontent .= "\n";                                            
                // fields data
                for($r = $this->rowLower; (($r >=0 && $this->rowUpper >=0) && ($r < $this->rowUpper) && ($r < ($this->rowLower + $this->req_page_size))); $r++){                   
                    $row = $this->dataSet->fetchRow();                
                    for($c = $this->colLower; $c < $this->colUpper; $c++){
                        if($this->canViewField($this->getFieldName($c))){
                            $somecontent .= str_replace(",", "",$row[$c]);
                            if($c < $this->colUpper - 1) $somecontent .= ",";                        
                        }
                    }
                    $somecontent .= "\n";                
                }
            }else{
                $row = $this->dataSet->fetchRow();
                for($c = $this->colLower; $c < $this->colUpper; $c++){
                    $somecontent .= ucfirst($this->getFieldName($c));
                    $somecontent .= ",";
                    $somecontent .= str_replace(",", "",$row[$c]);
                    if($c < $this->colUpper - 1) $somecontent .= "\n";                
                }
            }
        
            // write some content to the opened file.
            if (fwrite($fe, $somecontent) === FALSE) {
                echo $this->lang['file_writing_error']." (export.csv)";
                exit;
            }                        
            fclose($fe);
            
            echo "<script type='text/javascript'>\n<!--//\n "
            ."if(confirm('Do you want to export datagrid content into export.csv file?')){ "
            ." document.location = 'export.csv';  "
            ."} else {"
            ." window.close();"
            ."}"
            ."\n//-->\n</script>";
        }else{
            echo "<label class='class_error_message'>".$this->lang['file_opening_error']."</lable>";
            exit;
        }
        
    }

    //--------------------------------------------------------------------------
    // Export to XML
    //--------------------------------------------------------------------------    
    function exportToXml($type = "tabular"){
        // Let's make sure the we create the file first
        $this->req_page_size = (isset($_REQUEST[$this->unique_prefix.'page_size']))?$_REQUEST[$this->unique_prefix.'page_size']:$this->req_page_size;
        $fe = fopen("export.xml", "w+");        
        if($fe){
            $somecontent = "<?xml version='1.0' encoding='ISO-8859-1' ?>";        
            if($type == "tabular"){
                // fields data
                $somecontent .= "<page>";            
                for($r = $this->rowLower; (($r >=0 && $this->rowUpper >=0) && ($r < $this->rowUpper) && ($r < ($this->rowLower + $this->req_page_size))); $r++){                   
                    $row = $this->dataSet->fetchRow();               
                    $somecontent .= "<row".$r.">";
                    for($c = $this->colLower; $c < $this->colUpper; $c++){
                        if($this->canViewField($this->getFieldName($c))){
                            $header_name = $this->getFieldName($c);
                            $somecontent .= "<".$header_name.">";
                            $somecontent .= $row[$c];
                            $somecontent .= "</".$header_name.">";
                        }
                    }
                    $somecontent .= "</row".$r.">";
                }
                $somecontent .= "</page>";                        
            }else{
                // nothing
            }
        
            // write somecontent to the opened file.
            if (fwrite($fe, $somecontent) === FALSE) {
                echo $this->lang['file_writing_error']." (export.xml)";
                exit;
            }                        
            fclose($fe);
            
            echo "<script type='text/javascript'>\n<!--//\n "
            ."if(confirm('Do you want to export datagrid content into export.xml file?')){ "
            ." document.location = 'export.xml';  "
            ."} else {"
            ." window.close();"
            ."}"
            ."\n//-->\n</script>";            
        }else{
            echo "<label class='class_error_message'>".$this->lang['file_opening_error']."</lable>";
            exit;
        }
    }

    //--------------------------------------------------------------------------
    // draw filtering
    //--------------------------------------------------------------------------
    function draw_filtering(){
        $req_print = $this->getRequestVars('print');
        $selSearchType = $this->getRequestVars("_ff_selSearchType");

        if($this->allow_filtering){
            echo "<table id='".$this->unique_prefix."searchset' style='".$this->hide_display."' width='".(($this->browser_name == "Firefox") ? "98%" : "100%" )."' align='center'><tr><td align='center'>\n";
            if($req_print != true){
                echo "<fieldset class='class_fieldset' dir='".$this->direction."'  align='".$this->tblAlign[$this->mode]."'>\n";
                echo "<legend class='class_legend'>".$this->lang['search_d']."</legend>\n";
            }
            echo "<form name='frmFiltering".$this->unique_prefix."' action='' method='get' style='margin: 10px;'>\n";
            $this->saveHttpGetVars();
            echo "<table class='class_filter_table' border='0' id='filterTbl".$this->unique_prefix."' style='margin-left: auto; margin-right: auto;' width='".$this->tblWidth[$this->mode]."' cellspacing='1' cellpadding='1'>\n";
            if($this->layouts['filter'] == 0) echo "<tr>";
            foreach($this->filter_fields as $fldName => $fldValue){
                if($this->layouts['filter'] == 1) echo "<tr valign='middle'>\n";
                $table_field_name = "".$fldValue['table']."_".$fldValue['field'];
                if(isset($_REQUEST[$this->unique_prefix."_ff_".$table_field_name]) AND ($_REQUEST[$this->unique_prefix."_ff_".$table_field_name] != "")){
                    $filter_field_value = $_REQUEST[$this->unique_prefix."_ff_".$table_field_name];    
                }else{
                    $filter_field_value = "";
                }                
                $filter_field_operator =  $table_field_name."_operator";                
                echo "<td align='";                
                if($this->layouts['filter'] == 1){
                    echo ($this->direction == "rtl")?"left":"right"; echo "' width='50%'>".$fldName."";
                    echo "</td><td>&nbsp;</td><td>";
                }else if($this->layouts['filter'] == 0){
                    echo ($this->direction == "rtl")?"center":"center"; echo "' >".$fldName."";
                    echo " ";   
                }else {
                    echo ($this->direction == "rtl")?"left":"right"; echo "' width='50%'>".$fldName."";
                    echo "</td><td>&nbsp;</td><td>";
                }                                
                if(isset($fldValue['operator']) && $fldValue['operator'] != false){
                    if($req_print != true){
                        if(isset($_REQUEST[$this->unique_prefix."_ff_".$filter_field_operator]) && $_REQUEST[$this->unique_prefix."_ff_".$filter_field_operator] != ""){
                            $filter_operator = $_REQUEST[$this->unique_prefix."_ff_".$filter_field_operator];                            
                        }else if(isset($fldValue['default_operator']) && $fldValue['default_operator'] != ""){
                            $filter_operator = $fldValue['default_operator'];                            
                        }else{
                            $filter_operator = "=";
                        }
                        echo "<select class='class_select' name='".$this->unique_prefix."_ff_".$filter_field_operator."' id='".$this->unique_prefix."_ff_".$filter_field_operator."'>";
                        echo "<option value='='"; echo ($filter_operator == "=")? "selected" : ""; echo ">=</option>";
                        echo "<option value='>'"; echo ($filter_operator == ">")? "selected" : ""; echo ">></option>";
                        echo "<option value='<'"; echo ($filter_operator == "<")? "selected" : ""; echo "><</option>";                        
                        echo "<option value='like'"; echo ($filter_operator == "like")? "selected" : ""; echo ">".$this->lang['like']."</option>";
                        echo "<option value='like%'"; echo ($filter_operator == "like%")? "selected" : ""; echo ">".$this->lang['like']."%</option>";
                        echo "<option value='%like'"; echo ($filter_operator == "%like")? "selected" : ""; echo ">%".$this->lang['like']."</option>";
                        echo "<option value='not like'"; echo ($filter_operator == "not like")? "selected" : ""; echo ">".$this->lang['not_like']."</option>";
                        echo "</select>";
                    }else{
                        echo (isset($_REQUEST[$this->unique_prefix."_ff_".$filter_field_operator])) ? "[".$_REQUEST[$this->unique_prefix."_ff_".$filter_field_operator]."]" : "";                        
                    }
                }else{
                    // set default operator
                    if(isset($fldValue['default_operator']) && $fldValue['default_operator'] != ""){
                        echo "<input type='hidden' name='".$this->unique_prefix."_ff_".$filter_field_operator."' id='".$this->unique_prefix."_ff_".$filter_field_operator."' value='".$fldValue['default_operator']."'>";
                    }else{
                        echo "<input type='hidden' name='".$this->unique_prefix."_ff_".$filter_field_operator."' id='".$this->unique_prefix."_ff_".$filter_field_operator."' value='='>";                        
                    }
                }
                if($this->layouts['filter'] == 1){
                    echo "</td><td>&nbsp;</td>\n";
                    echo "<td  width='50%' align='"; echo ($this->direction == "rtl")?"right":"left"; echo "'>";
                }else if($this->layouts['filter'] == 0){
                    echo "<br>";   
                }else {
                    echo "</td><td>&nbsp;</td>\n";
                    echo "<td  width='50%' align='"; echo ($this->direction == "rtl")?"right":"left"; echo "'>";
                }
                $filter_field_type = (isset($fldValue['type'])) ? $fldValue['type'] : "" ;
                switch($filter_field_type){
                    case "textbox":
                        if($req_print != true){
                            echo "<input class='class_textbox' type='text' value='".$filter_field_value."' name='".$this->unique_prefix."_ff_".$fldValue['table']."_".$fldValue['field']."' id='".$this->unique_prefix."_ff_".$fldValue['table']."_".$fldValue['field']."' />";                    
                        }else{
                            echo $filter_field_value;                    
                        }
                        break;
                    case "dropdownlist":
                        if($req_print != true){
                            echo "<select class='class_select' name='".$this->unique_prefix."_ff_".$fldValue['table']."_".$fldValue['field']."' id='".$this->unique_prefix."_ff_".$fldValue['table']."_".$fldValue['field']."'>";
                            echo "<option value=''>-- ".$this->lang['any']." --</option>";
                            if(is_array($fldValue['source'])){                                
                                foreach ($fldValue['source'] as $val){
                                    if($val === $filter_field_value) 
                                        echo "<option selected value='".$val."'>".$val."</option>";
                                    else
                                        echo "<option value='".$val."'>".$val."</option>";                                    
                                }
                            }else{                                
                                $sql = "SELECT DISTINCT ".$fldValue['field']." FROM ".$fldValue['table']." ORDER BY ".$fldValue['field']." ".((strtolower($fldValue['order']) == "DESC")?"DESC":"ASC")." ;";
                                $this->db_handler->setFetchMode(DB_FETCHMODE_ASSOC);
                                $dSet = $this->db_handler->query($sql);                                
                                while($row = $dSet->fetchRow()){
                                    if($row[$fldValue['field']] === $filter_field_value) 
                                        echo "<option selected value='".$row[$fldValue['field']]."'>".$row[$fldValue['field']]."</option>";
                                    else
                                        echo "<option value='".$row[$fldValue['field']]."'>".$row[$fldValue['field']]."</option>";
                                }
                            }
                            echo "</select>";
                        }else{
                            echo $filter_field_value;
                        }
                        break;                    
                    default:
                        if($req_print != true){
                            echo "<input class='class_textbox' type='text' value='".$filter_field_value."' name='".$this->unique_prefix."_ff_".$fldValue['table']."_".$fldValue['field']."' id='".$this->unique_prefix."_ff_".$fldValue['table']."_".$fldValue['field']."' />";                                        
                        }else{
                            echo $filter_field_value;
                        }
                        break;                                       
                }                
                echo "</td>\n";
                //value='$_POST[$fldValue]'
                if($this->layouts['filter'] == 1) echo "</tr>\n";
            }
            if($this->layouts['filter'] == 0) echo "</tr>\n";
            echo "<tr><td colspan='10' height='6px' align='center'></td></tr>\n";
            echo "<tr><td colspan='10' align='center'>";
            echo $this->lang['search_type'].":&nbsp;&nbsp;";
            if(count($this->filter_fields) > 1){
                if($req_print != true){                
                    echo "<select class='class_select' name='".$this->unique_prefix."_ff_"."selSearchType' id='".$this->unique_prefix."_ff_"."selSearchType'>";
                    echo "<option value='0' "; echo (($selSearchType != "") && ($selSearchType == 0)) ? "selected" : ""; echo ">".$this->lang['and']."</option>";
                    echo "<option value='1' "; echo ($selSearchType == 1) ? "selected" : ""; echo ">".$this->lang['or']."</option>";            
                    echo "</select>&nbsp;&nbsp;&nbsp;";
                }else{
                    if(($selSearchType != "") && ($selSearchType == 0)) echo "[and]";
                    else if($selSearchType == 1) echo "[or]";
                    else echo "[none]";
                }
            }
            if($req_print != true){
                echo "<input class='class_button' type='submit' name='".$this->unique_prefix."_ff_"."onSUBMIT_FILTER' id='".$this->unique_prefix."_ff_"."onSUBMIT_FILTER' value='".$this->lang['search']."'>";
            }
            echo "</td></tr>\n";            
            $this->tblClose();  
            echo "</form>\n";
            if($req_print != true){
                echo "</fieldset>\n";
            }
            echo "</td></tr></table>\n";
        }               
    }

    
    //--------------------------------------------------------------------------
    // draw in tabular layout
    //--------------------------------------------------------------------------
    function draw_tabular(){
        $req_print = $this->getRequestVars('print');
        $req_export = $this->getRequestVars('export');
        $req_mode = $this->getRequestVars('mode');
        $export_type = $this->getRequestVars('export_type');
       
        $this->writeCssClass();
        if($req_export == true){
            if($export_type == "csv"){
                $this->exportToCsv("tabular");                
            }else{
                $this->exportToXml("tabular");    
            }            
        }
        $this->showCaption($this->caption);
        $this->drawControlPanel();
        if($this->mode != "edit") $this->draw_filtering();   
        if(($req_mode !== "add") || ($req_mode == "")) $this->paging_part_1();  
        $this->draw_messages();
        if($this->allow_paging) $this->paging_part_2($this->upper_paging, false, true, "Upper");
        if($this->rowLower == $this->rowUpper) echo "<br>";        
        $this->setVerifyJsFunctions();

        //prepare summarize columns array
        foreach ($this->columns_view_mode as $key => $val){        
            if(isset($val['summarize']) && ($val['summarize'] === true)){
                $this->summarize_columns[$key] = 0;
            }
        }
        
        $this->scrollDivOpen();
        $this->tblOpen();        
        
        // *** START DRAWING HEADERS -------------------------------------------
        $this->rowOpen(0, $this->headerColor);

            // draw multi-row checkboxes header
            if(($this->is_multirow_allowed) && (!$this->is_error) && ($this->rows_total > 0)){
                $this->colOpen("center",0,"nowrap",$this->rowColor,"class_td");
                echo "&nbsp;";
                $this->colClose();
            }            
            
            // draw add link-button cell
            if(isset($this->modes['add'][$this->mode]) && $this->modes['add'][$this->mode]){            
                $curr_url = $this->combine_url("add");
                $this->setUrlString($curr_url, "filtering", "sorting", "paging");
                $this->mainColOpen("center",0,"nowrap", "1%", "class_th_normal");
                $this->drawModeButton("add", $curr_url, $this->lang['add_new'], $this->lang['add_new_record'], "add.gif", "\"javascript:document.location.href='".$this->HTTP_URL.$curr_url."';\"", false, $nbsp="");                        
                $this->mainColClose();
            }else{            
                if(isset($this->modes['edit'][$this->mode]) && $this->modes['edit'][$this->mode]){
                    $this->mainColOpen("center",0,"nowrap", "1%", "class_th_normal"); echo "&nbsp;"; $this->mainColClose();                
                }
            }
    
            if(($this->rows_numeration)){ 
                $this->mainColOpen("center",0,"nowrap", ""); echo $this->numeration_sign; $this->mainColClose();                
            }

            // draw column headers in add mode
            if(($this->rid == -1) && ($req_mode == "add")){
                foreach($this->columns_edit_mode as $key => $val){
                    $this->mainColOpen("center",0);
                    echo "<b>".ucfirst($this->getHeaderName($key))."</b>";                        
                    $this->mainColClose();
                }
            }else{
                $req_sort_field = $this->getRequestVars('sort_field');
                $req_sort_type = $this->getRequestVars('sort_type');    
                if($req_sort_field){
                    $sort_img = (strtolower($req_sort_type) == "desc") ? $this->directory."images/".$this->css_class."/s_desc.png" : $this->directory."images/".$this->css_class."/s_asc.png" ;
                    $sort_img_back = (strtolower($req_sort_type) == "desc") ? $this->directory."images/".$this->css_class."/s_asc.png" : $this->directory."images/".$this->css_class."/s_desc.png" ;
                    $sort_alt = (strtolower($req_sort_type) == "desc") ? $this->lang['descending'] : $this->lang['ascending'] ;
                }
                if($this->mode === "view"){                
                    // draw column headers in view mode    
                    for($c = $this->colLower; ($c < $this->colUpper); $c++){
                        if($this->canViewField($this->getFieldName($c))){
                        $wrap = isset($this->columns_view_mode[$this->getFieldName($c)]['wrap']) ? $this->columns_view_mode[$this->getFieldName($c)]['wrap'] : $this->wrap;
                        $width = isset($this->columns_view_mode[$this->getFieldName($c)]['width']) ? $this->columns_view_mode[$this->getFieldName($c)]['width'] : "";
                        if($this->allow_sorting && ($req_print != true) && $req_sort_field && ($c == ($req_sort_field -1))){ $th_css_class = "class_th_selected"; } else { $th_css_class = "class_th" ;};                
                            $this->mainColOpen("center", 0, $wrap, $width, $th_css_class);
                                if($this->allow_sorting){
                                    $href_string = $this->combine_url("view");
                                    $this->setUrlString($href_string, "filtering", "", "paging");
                                    if(isset($_REQUEST[$this->unique_prefix.'sort_type']) && $_REQUEST[$this->unique_prefix.'sort_type'] == "asc") $sort_type="desc";
                                    else $sort_type="asc";
                                    $href_string .= "&".$this->unique_prefix."sort_field=".($c+1)."&".$this->unique_prefix."sort_type=".$sort_type;
                                    if($req_print != true){
                                        echo "<b><a class='class_a' href='$href_string' title='Sort' ";
                                        if($req_sort_field && ($c == ($req_sort_field -1))){
                                            echo "onmouseover=\"if(document.getElementById('soimg".$c."')){ document.getElementById('soimg".$c."').src='".$sort_img_back."';  }\" ";
                                            echo "onmouseout=\"if(document.getElementById('soimg".$c."')){ document.getElementById('soimg".$c."').src='".$sort_img."';  }\" ";                                
                                        }
                                        echo ">".ucfirst($this->getHeaderName($this->getFieldName($c)))." ";
                                        if($req_sort_field && ($c == ($req_sort_field -1))){
                                            echo "&nbsp;<img id='soimg".$c."' src='".$sort_img."' alt='".$sort_alt."' border='0'>&nbsp;";
                                        }
                                        echo "</a></b>";
                                    }else{
                                        echo "<b>".ucfirst($this->getHeaderName($this->getFieldName($c)))."</b>";                            
                                    }
                                }else{
                                    echo "<b>".ucfirst($this->getHeaderName($this->getFieldName($c)))."</b>";                        
                                }
                            $this->mainColClose();
                        }
                    }//for
                }else if($this->mode === "edit"){                    
                    foreach($this->columns_edit_mode as $key => $val){
                        $this->mainColOpen("center",0);
                        // alow/disable sorting by headers                    
                        echo "<b>".ucfirst($this->getHeaderName($key))."</b>";                        
                        $this->mainColClose();
                    }
                }            
            }
            if(isset($this->modes['details'][$this->mode]) && $this->modes['details'][$this->mode]){
                $this->mainColOpen("center",0,"nowrap", "", "class_th_normal");echo $this->lang['view'];$this->mainColClose();
            }                        
            if(isset($this->modes['delete'][$this->mode]) && $this->modes['delete'][$this->mode]){
                $this->mainColOpen("center",0,"nowrap", "", "class_th_normal");echo $this->lang['delete'];$this->mainColClose();
            }                
        $this->rowClose();
        // *** END HEADERS -----------------------------------------------------

        //if we add a new row on linked tabular view mode table (mode 0 <-> 0)
        $quick_exit = false;        
        if((isset($_REQUEST[$this->unique_prefix.'mode']) && ($_REQUEST[$this->unique_prefix.'mode'] == "add")) && ($this->rowLower == 0) && ($this->rowUpper == 0)){
            $this->rowUpper = 1;
            $quick_exit = true;
        }        

        // draw data rows
        $first_field_name = "";
        $curr_url = "";
        for($r = $this->rowLower; (($r >=0 && $this->rowUpper >=0) && ($r < $this->rowUpper) && ($r < ($this->rowLower + $this->req_page_size))); $r++){            
            // add new row (ADD MODE)
            if(($r == $this->rowLower) && ($this->rid == -1) && ($req_mode == "add")){
                if($r % 2 == 0){$this->rowOpen($r, $this->rowColor); $main_td_color=$this->rowColor3;}
                else  {$this->rowOpen($r, $this->rowColor2); $main_td_color=$this->rowColor4;}
                $curr_url = $this->combine_url("update", -1);
                $this->setUrlString($c_curr_url, "filtering", "sorting", "paging");                
                $curr_url .= $c_curr_url;
                $curr_url .= "&".$this->unique_prefix."new=1";
                echo "<form name='".$this->unique_prefix."frmEditRow' method='post' action='".$this->HTTP_URL."'>";
                $this->setEditFieldsFormScript($curr_url);
                // draw multi-row empty cell
                if(($this->is_multirow_allowed) && (!$this->is_error)){$this->colOpen("center",0,"nowrap",$this->rowColor,"class_td");echo "&nbsp;";$this->colClose();}                            
                $this->colOpen("center",0,"nowrap",$main_td_color,"class_td_main");
                $this->drawModeButton("edit", $curr_url, $this->lang['create'], $this->lang['create_new_record'], "update.gif", "\"".$this->unique_prefix."sendEditFields(); return false;\"", false, $nbsp="&nbsp;");                    
                $cancel_url = $this->combine_url("cancel", -1);                
                $this->setUrlString($cancel_url, "filtering", "sorting", "paging");                                
                $cancel_url .= "&".$this->unique_prefix."new=1";
                $this->drawModeButton("cancel", $cancel_url, $this->lang['cancel'], $this->lang['cancel'], "cancel.gif", "\"return ".$this->unique_prefix."verifyCancel('".$cancel_url."'); javascript:document.location.href='".$this->HTTP_URL.$cancel_url."'\"", false, $nbsp="&nbsp;");
                $this->colClose();                
                
                foreach($this->columns_edit_mode as $key => $val){
                    $this->colOpen("center",0,"nowrap");
                    if($this->isForeignKey($key)){
                        echo "&nbsp;";
                        $this->drawForeignKeyInput(-1, $key, '-1', "edit");
                        echo "&nbsp;";
                    }else{
                        echo $this->getFieldValueByType('', 0, '', $key);
                    }
                    $this->colClose();                    
                }                 
                
                if($this->modes['delete'][$this->mode])$this->colOpen("center",0,"nowrap");echo"";$this->colClose();                
                echo "</form>"; 
                $this->rowClose();                
            }
                            
            //if we add a new row on linked tabular view mode table (mode 0 <-> 0) 
            if($quick_exit == true){
                $this->tblClose();
                if(($this->allow_first_field_focus) && ($first_field_name != "")) echo "<script type='text/javascript'>\n<!--//\n document.".$this->unique_prefix."frmEditRow.".$this->getFieldRequiredType($first_field_name).$first_field_name.".focus(); \n-->\n</script>";                
                return;            
            }
            
            $row = $this->dataSet->fetchRow();
            if($r % 2 == 0){$this->rowOpen($r, $this->rowColor); $main_td_color=$this->rowColor3;}
            else  {$this->rowOpen($r, $this->rowColor2); $main_td_color=$this->rowColor4;}
            
            // draw multi-row row checkboxes
            if($this->is_multirow_allowed){
                $this->colOpen("center",0,"nowrap","","");                
                if($req_print == true){
                    $disable = "disabled";
                }else{
                    $disable = "";
                }
                echo "<input type='checkbox' name='".$this->unique_prefix."checkbox_".$r."' id='".$this->unique_prefix."checkbox_".$r."' value='".$row[$this->getFieldOffset($this->PrimaryKey)]."' ".$disable."/>";
                $this->colClose();                
            }
            
            if(isset($this->modes['edit'][$this->mode]) && $this->modes['edit'][$this->mode]){
                if(($this->mode == "edit") && (intval($this->rid) == intval($row[$this->getFieldOffset($this->PrimaryKey)]))){
                    $curr_url = $this->combine_url("update", $row[$this->getFieldOffset($this->PrimaryKey)]);
                    $cancel_url = $this->combine_url("cancel", $row[$this->getFieldOffset($this->PrimaryKey)]);
                    $this->setUrlString($c_curr_url, "filtering", "sorting", "paging");
                    $curr_url .= $c_curr_url;
                    $cancel_url .= $c_curr_url;                                  
                    if(isset($_REQUEST[$this->unique_prefix.'mode']) && $_REQUEST[$this->unique_prefix.'mode'] === "add") { $curr_url .= "&".$this->unique_prefix."new=1"; $cancel_url .= "&".$this->unique_prefix."new=1";}
                    echo "<form name='".$this->unique_prefix."frmEditRow' method='post' action='".$this->HTTP_URL."'>";
                    $this->setEditFieldsFormScript($curr_url);                    
                    $this->colOpen("center",0,"nowrap",$main_td_color,"class_td_main");
                    $this->drawModeButton("edit", $curr_url, $this->lang['update'], $this->lang['update_record'], "update.gif", "\"".$this->unique_prefix."sendEditFields(); return false;\"", false, $nbsp="&nbsp;");                                        
                    if(isset($_REQUEST[$this->unique_prefix.'mode']) && $_REQUEST[$this->unique_prefix.'mode'] === "add") {
                        $cancel_url = $this->combine_url("delete", $row[$this->PrimaryKey]);
                        $this->setUrlString($cancel_url, "filtering", "sorting", "paging");                        
                        if(isset($this->modes['cancel'][$this->mode]) && $this->modes['cancel'][$this->mode]){
                            $this->drawModeButton("cancel", $cancel_url, $this->lang['cancel'], $this->lang['cancel'], "cancel.gif", "\"return ".$this->unique_prefix."verifyCancel('".$cancel_url."'); javascript:document.location.href='".$this->HTTP_URL.$cancel_url."'\"", false, $nbsp="&nbsp;");
                        }
                    }else{
                        $this->drawModeButton("cancel", $cancel_url, $this->lang['cancel'], $this->lang['cancel'], "cancel.gif", "\"javascript:document.location.href='".$this->HTTP_URL.$cancel_url."'\"", false, $nbsp="&nbsp;");
                    }                    
                    $this->colClose();
                }else {                                                            
                    $row_id = ($this->getFieldOffset($this->PrimaryKey) != "-1") ? $row[$this->getFieldOffset($this->PrimaryKey)] : $this->getFieldOffset($this->PrimaryKey);
                    $curr_url = $this->combine_url("edit", $row_id);
                    $this->setUrlString($curr_url, "filtering", "sorting", "paging");                                            
                    if(isset($_REQUEST[$this->unique_prefix.'new']) && (isset($_REQUEST[$this->unique_prefix.'new']) == 1)){
                        $curr_url .= "&".$this->unique_prefix."new=1";
                    }
                    if(isset($this->modes['edit'][$this->mode]) && $this->modes['edit'][$this->mode]){
                        // by field Value - link on Edit mode page
                        if (isset($this->modes['edit']['byFieldValue']) && ($this->modes['edit']['byFieldValue'] != "")){
                            if($this->getFieldOffset($this->modes['edit']['byFieldValue']) == "-1"){
                                if($this->debug == true){
                                    $this->colOpen(($this->direction == "rtl")?"right":"left",0,"nowrap",$main_td_color,"class_td_main");
                                    echo "&nbsp;".$this->lang['wrong_field_name']." - ".$this->modes['edit']['byFieldValue']."&nbsp;";
                                }else{
                                    $this->colOpen("center",0,"nowrap",$main_td_color,"class_td_main");                                    
                                    $this->drawModeButton("edit", $curr_url, $this->lang['edit'], $this->lang['edit_record'], "edit.gif", "\"javascript:document.location.href='".$this->HTTP_URL.$curr_url."'\"", false, $nbsp="&nbsp;");
                                }
                            }else{
                                $this->colOpen(($this->direction == "rtl")?"right":"left",0,"nowrap",$main_td_color,"class_td_main");
                                echo "&nbsp;<a class='class_a' href='$curr_url'>".$row[$this->getFieldOffset($this->modes['edit']['byFieldValue'])]."</a>&nbsp;";
                            }                            
                        }else{
                            $this->colOpen("center",0,"nowrap",$main_td_color,"class_td_main");                            
                            $this->drawModeButton("edit", $curr_url, $this->lang['edit'], $this->lang['edit_record'], "edit.gif", "\"javascript:document.location.href='".$this->HTTP_URL.$curr_url."'\"", false, $nbsp="&nbsp;");
                        }
                        $this->colClose();                            
                    }                
                }
               
            }else{
                if(isset($this->modes['add'][$this->mode]) && $this->modes['add'][$this->mode]){                    
                    $this->colOpen("center",0,"nowrap",$this->rowColor3,"class_td_main");$this->colClose();                    
                }
            }
            
            if($this->rows_numeration){
                $this->colOpen("center",0,"nowrap"); echo "<label class='class_label'>".($r+1)."</label>"; $this->colClose();
            }
            
            // draw columns
            for($c = $this->colLower; $c < $this->colUpper; $c++){
                $col_align = $this->getFieldAlign($c, $row);               
                if(($this->mode === "view") && ($this->canViewField($this->getFieldName($c)))){
                    $wrap = isset($this->columns_view_mode[$this->getFieldName($c)]['wrap']) ? $this->columns_view_mode[$this->getFieldName($c)]['wrap'] : $this->wrap;
                    if($req_sort_field == $c+1){
                        $this->colOpen($col_align,0,$wrap, $this->rowColor, 'class_td_selected'); 
                    }else{
                        $this->colOpen($col_align,0,$wrap);
                    }                    
                    $field_value = $this->getFieldValueByType($row[$c], $c, $row);
                    if(isset($this->columns_view_mode[$this->getFieldName($c)]['summarize']) && ($this->columns_view_mode[$this->getFieldName($c)]['summarize'] === true)){                        
                        $this->summarize_columns[$this->getFieldName($c)] += str_replace(",", "", $row[$c]);
                    }
                    echo $field_value;
                    $this->colClose();                    
                }else if(($this->mode === "edit") && ($this->canViewField($this->getFieldName($c)))){
                    if($first_field_name == "") $first_field_name = $this->getFieldName($c);
                    if(intval($this->rid) === intval($row[$this->getFieldOffset($this->PrimaryKey)])){
                        $this->colOpen($col_align,0,$this->columns_edit_mode[$this->getFieldName($c)]);
                        if($this->isForeignKey($this->getFieldName($c))){
                            echo "&nbsp;"; $this->drawForeignKeyInput($row[$this->getFieldOffset($this->PrimaryKey)], $this->getFieldName($c), $row[$c], "edit"); echo "&nbsp;";
                        }else{
                            echo $this->getFieldValueByType($row[$c], $c, $row);
                        }                                
                        $this->colClose();
                    }else{
                        $this->colOpen($col_align,0,$this->columns_edit_mode[$this->getFieldName($c)]);
                        if($this->isForeignKey($this->getFieldName($c))){
                            echo "&nbsp;";$this->drawForeignKeyInput($row[$this->getFieldOffset($this->PrimaryKey)], $this->getFieldName($c), $row[$c],"view");echo "&nbsp;";
                        }else{
                            echo "&nbsp;".trim($row[$c])."&nbsp;";
                        }                                                                 
                        $this->colClose();
                    }
                }
            }
            $row_id = ($this->getFieldOffset($this->PrimaryKey) != "-1") ? $row[$this->getFieldOffset($this->PrimaryKey)] : $this->getFieldOffset($this->PrimaryKey);
            if(isset($this->modes['details'][$this->mode]) && $this->modes['details'][$this->mode]){
                $curr_url = $this->combine_url("details", $row_id);
                $this->setUrlString($curr_url, "filtering", "sorting", "paging");                                                            
                $this->colOpen("center",0,"nowrap");
                $this->drawModeButton("details", $curr_url, $this->lang['details'], $this->lang['view_details'], "details.gif", "\"javascript:document.location.href='".$this->HTTP_URL.$curr_url."';\"", false, $nbsp="");                        
                $this->colClose();
            }
            if(isset($this->modes['delete'][$this->mode]) && $this->modes['delete'][$this->mode]){
                $curr_url = $this->combine_url("delete", $row_id);
                $this->setUrlString($curr_url, "filtering", "sorting", "paging");                                                                            
                $this->colOpen("center",0,"nowrap");
                $this->drawModeButton("delete", $curr_url, $this->lang['delete'], $this->lang['delete_record'], "delete.gif", "\"return ".$this->unique_prefix."verifyDelete('$curr_url');\"", false, $nbsp="");                        
                $this->colClose();
            }       

            if(($this->mode == "edit") && (intval($this->rid) == intval($row[$this->getFieldOffset($this->PrimaryKey)]))){ echo "</form>"; }
            $this->rowClose();
        }// end drawing rows
       
        
        // draw summarizing row
        if($r != $this->rowLower){ $this->drawSummarizeRow($r); }         
        $this->tblClose();
        
        // draw empty table       
        if($r == $this->rowLower){ $this->noDataFound(); }
        $this->scrollDivClose();        
        
        // draw multi-row row footer cell
        $this->drawMultiRowBar($r, $curr_url);

        if($this->allow_paging) $this->paging_part_2($this->lower_paging, true, true, "Lower");               
        if(($this->allow_first_field_focus) && ($first_field_name != "")) echo "<script type='text/javascript'>\n<!--//\n document.".$this->unique_prefix."frmEditRow.".$this->getFieldRequiredType($first_field_name).$first_field_name.".focus(); \n-->\n</script>";
    }    
  
    //--------------------------------------------------------------------------
    // draw in columnar layout
    //--------------------------------------------------------------------------
    function draw_columnar(){
        $r = ""; //???
        $req_export = $this->getRequestVars('export');
        $export_type = $this->getRequestVars('export_type');
       
        $this->writeCssClass();
        if($req_export == true){
            if($export_type == "csv"){
                $this->exportToCsv("tabular");                
            }else{
                $this->exportToXml("tabular");    
            }            
        }
        
        $this->showCaption($this->caption);        
        $this->drawControlPanel();        
        if((isset($_REQUEST[$this->unique_prefix.'mode']) &&  ($_REQUEST[$this->unique_prefix.'mode'] !== "add") && ($_REQUEST[$this->unique_prefix.'mode'] !== "details")) || (!isset($_REQUEST[$this->unique_prefix.'mode']))) $this->paging_part_1();  
        $this->draw_messages();       

        $this->setVerifyJsFunctions();                        
        $this->tblOpen();
        $this->rowOpen($r, $this->rowColor);
        //echo $this->mode;
        if(isset($this->modes['add'][$this->mode]) && $this->modes['add'][$this->mode]){
            $curr_url = $this->combine_url("add");
            $this->setUrlString($curr_url, "filtering", "sorting", "paging");                                                                                        
            $this->mainColOpen("center",0,"nowrap", "", "class_th_normal");
            $this->drawModeButton("add", $curr_url, $this->lang['add_new'], $this->lang['add_new'], "add.gif", "\"javascript:document.location.href='".$this->HTTP_URL.$curr_url."';\"", true, $nbsp="");                        
            $this->mainColClose();
        }
        $this->rowClose();
        $this->tblClose();

        if($this->allow_paging) $this->paging_part_2($this->upper_paging, false, true, "Upper");
        echo "<form name='".$this->unique_prefix."frmEditRow' method='post' action='".$this->HTTP_URL."'>";        
        $this->tblOpen();
        // draw header
        $this->rowOpen($r, $this->headerColor);
        $this->mainColOpen("center",0,"nowrap","32%"); echo "<b>".$this->lang['field']."</b>"; $this->mainColClose();
        $this->mainColOpen("center",0,"nowrap","68%"); echo "<b>".$this->lang['field_value']."</b>"; $this->mainColClose();
        $this->rowClose();        

        if(($this->layouts['view'] == 0) && ($this->layouts['edit'] == 1) && ($this->mode == "edit")){
             $this->req_page_size = 1;            
        }else if(($this->layouts['view'] == 1) && ($this->layouts['edit'] == 1) && ($this->mode == "edit")){
            $this->req_page_size = 1;  // ???          
        }else if(($this->layouts['edit'] == 1) && ($this->mode == "details")){
            $this->req_page_size = 1;              
        }         
                
        $first_field_name = ""; /* we need it to set a focus on this field */
        // draw rows in ADD MODE
        if($this->rid == -1){            
            foreach($this->columns_edit_mode as $key => $val){
                if(($first_field_name == "") && (($this->mode === "edit") || ($this->mode === "add"))) $first_field_name = $key;
                if($r % 2 == 0) $this->rowOpen($r, $this->rowColor);
                else $this->rowOpen($r, $this->rowColor2);
                // column's header
                $this->colOpen(($this->direction == "rtl")?"right":"left",0,"nowrap");                
                echo "&nbsp;";echo "<b>".ucfirst($this->getHeaderName($key))."</b>";                        
                $this->colClose();
                // column's data
                $col_align = ($this->direction == "rtl")?"right":"left";
                $this->colOpen($col_align,0,"nowrap");
                if($this->isForeignKey($key)){
                    echo "&nbsp;";
                    $this->drawForeignKeyInput(-1, $key, '-1', "edit");
                    echo "&nbsp;";
                }else{
                    echo $this->getFieldValueByType('', 0, '', $key);
                }
                $this->colClose();
                $this->rowClose();
            }
        }     
        // draw rows in edit mode    
        for($r = $this->rowLower; (($this->rid != -1) && ($r < $this->rowUpper) && ($r < ($this->rowLower + $this->req_page_size))); $r++){                   
            $row = $this->dataSet->fetchRow();            
            for($c = $this->colLower; $c < $this->colUpper; $c++){                
                if($this->canViewField($this->getFieldName($c))){
                    if(($first_field_name == "") && (($this->mode === "edit") || ($this->mode === "add"))) $first_field_name = $this->getFieldName($c);
                    if($r % 2 == 0) $this->rowOpen($r, $this->rowColor);
                    else $this->rowOpen($r, $this->rowColor2);
                        
                    // column headers
                    if(($this->mode === "view") && ($this->canViewField($this->getFieldName($c)))){
                        $this->colOpen(($this->direction == "rtl")?"right":"left",0,"nowrap");                   
                        //echo "&nbsp;<b>".ucfirst($this->getFieldName($c))."</b>";
                        echo "&nbsp;";echo "<b>".ucfirst($this->getHeaderName($this->getFieldName($c)))."</b>";                        
                        $this->colClose();
                    }else if(($this->mode === "edit") && ($this->canViewField($this->getFieldName($c)))){
                        $this->colOpen(($this->direction == "rtl")?"right":"left",0,"nowrap");                   
                        echo "&nbsp;";echo "<b>".ucfirst($this->getHeaderName($this->getFieldName($c)))."</b>";                        
                        $this->colClose();
                    }else if(($this->mode === "details") && ($this->canViewField($this->getFieldName($c)))){
                        $this->colOpen(($this->direction == "rtl")?"right":"left",0,"nowrap");                   
                        echo "&nbsp;";echo "<b>".ucfirst($this->getHeaderName($this->getFieldName($c)))."</b>";                        
                        $this->colClose();
                    }
                    
                    // column data                
                    $col_align = ($this->direction == "rtl")?"right":"left";
                    if(($this->mode === "view") && ($this->canViewField($this->getFieldName($c)))){
                        $this->colOpen($col_align,0,$this->columns_view_mode[$this->getFieldName($c)]['wrap']);
                        echo $this->getFieldValueByType($row[$c], $c, $row);
                        $this->colClose();                    
                    }else if(($this->mode === "details") && ($this->canViewField($this->getFieldName($c)))){
                            $this->colOpen($col_align,0);
                            if($this->isForeignKey($this->getFieldName($c))){
                                echo "&nbsp;";echo $this->drawForeignKeyInput($row[$this->getFieldOffset($this->PrimaryKey)], $this->getFieldName($c), $row[$c],"view"); echo "&nbsp;";
                            }else{
                                echo $this->getFieldValueByType($row[$c], $c, $row);
                            }
                            $this->colClose();
                    }else if(($this->mode === "edit") && ($this->canViewField($this->getFieldName($c)))){
                            if(intval($this->rid) === intval($row[$this->getFieldOffset($this->PrimaryKey)])){
                                    $this->colOpen($col_align,0,"nowrap");
                                    if($this->isForeignKey($this->getFieldName($c))){
                                        echo "&nbsp;";$this->drawForeignKeyInput($row[$this->getFieldOffset($this->PrimaryKey)], $this->getFieldName($c), $row[$c], "edit");echo "&nbsp;";
                                    }else{
                                        echo $this->getFieldValueByType($row[$c], $c, $row);
                                    }
                                    $this->colClose();
                            }else{
                                $this->colOpen($col_align,0,"nowrap");
                                if($this->rid == -1){
                                    //aaa add new row                                    
                                    if($this->isForeignKey($this->getFieldName($c))){
                                        echo "&nbsp;";$this->drawForeignKeyInput(-1, $this->getFieldName($c), '-1', "edit"); echo "&nbsp;";
                                    }else{
                                        echo $this->getFieldValueByType('', $c, $row);
                                    }                                    
                                }else{
                                    if($this->isForeignKey($this->getFieldName($c))){
                                        echo "&nbsp;";$this->drawForeignKeyInput($row[$this->getFieldOffset($this->PrimaryKey)], $this->getFieldName($c), $row[$c],"view"); echo "&nbsp;";
                                    }else{
                                        echo "&nbsp;".trim($row[$c])."&nbsp;";    
                                    }                                    
                                }
                                $this->colClose();
                            }
                    }
                    $this->rowClose();
                }
            }// for 
            //$this->emptyRow();
        }
        $this->tblClose();
        echo "<br />";        
        if(($r == $this->rowLower) && ($this->rid != -1)){
            $this->noDataFound();
            echo "<br /><center>";
            if($this->getRequestVars('print') != ""){
                echo "<span class='class_a'><b>".$this->lang['back']."</b></span>";                                        
            }else{
                echo "<a class='class_a' href='javascript:history.go(-1);'><b>".$this->lang['back']."</b></a>";                    
            }                
            echo "</center>";        
        }else{            
            $this->tblOpen();
            $this->rowOpen($r, $this->rowColor2);
            $this->mainColOpen('left', 0, '', '', 'class_th', "style='BORDER-RIGHT: #d2d0bb 0px solid;'");
            if($this->mode === "details"){
                $cancel_url = $this->combine_url("cancel", $row[$this->getFieldOffset($this->PrimaryKey)]);
                $this->setUrlString($c_curr_url, "filtering", "sorting", "paging");                                                                                                        
                $cancel_url .= $c_curr_url;                
                echo "<div style='float:";
                echo ($this->direction == "rtl")?"left":"right";
                if($this->getRequestVars('print') != ""){
                    echo ";'><span class='class_a'><b>".$this->lang['back']."</b></span>";                                        
                }else{
                    echo ";'><a class='class_a' href='$cancel_url'><b>".$this->lang['back']."</b></a>";                    
                }                
            }else{
                // if not new row
                if(($this->rid != -1) && isset($this->modes['delete'][$this->mode]) && $this->modes['delete'][$this->mode]){
                    $curr_url = $this->combine_url("delete", $row[$this->getFieldOffset($this->PrimaryKey)]);
                    $this->setUrlString($curr_url, "filtering", "sorting", "paging");
                    $this->drawModeButton("delete", $curr_url, $this->lang['delete'], $this->lang['delete_record'], "delete.gif", "\"return ".$this->unique_prefix."verifyDelete('$curr_url');\"", true, $nbsp="");                        
                    $this->mainColClose();
                    $this->mainColOpen();
                }
                if(isset($this->modes['edit'][$this->mode]) && $this->modes['edit'][$this->mode]){
                    if($this->rid != -1){
                        $rid = $row[$this->getFieldOffset($this->PrimaryKey)];
                    }else{
                        $rid = -1;
                    }
                    $curr_url = $this->combine_url("update", $rid);
                    $cancel_url = $this->combine_url("cancel", $rid);
                    $this->setUrlString($c_curr_url, "filtering", "sorting", "paging");                                                                                                                                                
                    $cancel_url .= $c_curr_url;
                    $curr_url .= $c_curr_url;
                    if(isset($_REQUEST[$this->unique_prefix.'mode']) &&  $_REQUEST[$this->unique_prefix.'mode'] === "add") { $curr_url .= "&".$this->unique_prefix."new=1"; $cancel_url .= "&".$this->unique_prefix."new=1";}                    
                    $this->setEditFieldsFormScript($curr_url);
                                    
                    echo "<div style='float:"; echo ($this->direction == "rtl")?"left":"right"; echo ";'>";    
                    if(isset($_REQUEST[$this->unique_prefix.'mode']) &&  $_REQUEST[$this->unique_prefix.'mode'] === "add") {
                        if($this->rid == -1){
                            //aaa add new row 
                            $cancel_url = $this->combine_url("cancel", $rid);
                        }else{
                            //aaa old cancel format after adding 
                            $cancel_url = $this->combine_url("delete", $rid);
                        }
                        $this->setUrlString($cancel_url, "filtering", "sorting", "paging");                                                                                                                                                                        
                        $this->drawModeButton("cancel", $cancel_url, $this->lang['cancel'], $this->lang['cancel'], "cancel.gif", "\"return ".$this->unique_prefix."verifyCancel('$cancel_url'); javascript:document.location.href='".$this->HTTP_URL.$cancel_url."'\"", false, $nbsp="&nbsp;");                        
                    }else{
                        $this->drawModeButton("cancel", $cancel_url, $this->lang['cancel'], $this->lang['cancel'], "cancel.gif", "\"javascript:document.location.href='".$this->HTTP_URL.$cancel_url."'\"", false, $nbsp="&nbsp;");
                    }                    
                    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                    if($this->rid == -1){ //aaa new record
                       $this->drawModeButton("edit", $curr_url, $this->lang['create'], $this->lang['create_new_record'], "update.gif", "\"".$this->unique_prefix."sendEditFields(); return false;\"", false, $nbsp="&nbsp;");                        
                    }else{
                       $this->drawModeButton("edit", $curr_url, $this->lang['update'], $this->lang['update_record'], "update.gif", "\"".$this->unique_prefix."sendEditFields(); return false;\"", false, $nbsp="&nbsp;");
                    }
                    echo "</div>";
                }
            }
            $this->mainColClose();
        }
        $this->rowClose();
        $this->tblClose();        
  
        echo "</form>";
        if($this->allow_paging) $this->paging_part_2($this->lower_paging, true, true, "Lower");               
        if(($this->allow_first_field_focus) && ($first_field_name != "")) echo "<script type='text/javascript'>\n<!--//\n document.".$this->unique_prefix."frmEditRow.".$this->getFieldRequiredType($first_field_name).$first_field_name.".focus(); \n-->\n</script>";
    } 


    //--------------------------------------------------------------------------
    // draw Multi-Row Bar
    //--------------------------------------------------------------------------
    function drawMultiRowBar($r, $curr_url){    
        if(($this->is_multirow_allowed) && ($r != $this->rowLower)){
            echo "<script type='text/javascript'>
            function ".$this->unique_prefix."verifyDeleteSelected(param){
                if(confirm('".$this->lang['delete_selected_records']."')){
                    selected_rows = '&".$this->unique_prefix."rid=';
                    selected_rows_ids = '';
                    found = 0;
                    for(i=".$this->rowLower."; i < ".$this->rowUpper."; i++){
                        if(document.getElementById(\"".$this->unique_prefix."checkbox_\"+i).checked == true){
                            if(found == 1){ selected_rows_ids += '-'; }
                            selected_rows_ids += document.getElementById(\"".$this->unique_prefix."checkbox_\"+i).value;
                            found = 1;
                        }
                    }
                    document.location.href=param+selected_rows+selected_rows_ids;
                } else {
                    return false;
                }
            };
            function ".$this->unique_prefix."setCheckboxes(check){
                if(check){
                    for(i=".$this->rowLower."; i < ".$this->rowUpper."; i++){
                        if(document.getElementById(\"".$this->unique_prefix."checkbox_\"+i).checked == false)
                           document.getElementById(\"".$this->unique_prefix."checkbox_\"+i).checked = true;
                    }
                }else{
                    for(i=".$this->rowLower."; i < ".$this->rowUpper."; i++){
                        if(document.getElementById(\"".$this->unique_prefix."checkbox_\"+i).checked == true)
                           document.getElementById(\"".$this->unique_prefix."checkbox_\"+i).checked = false;
                    }                
                }
            }
            </script>
            ";
            echo "<table dir='".$this->direction."' border='0' align='".$this->tblAlign[$this->mode]."' width='".$this->tblWidth[$this->mode]."'>";
            echo "<tr>";
            echo "<td align='left'>";
            echo "<table border='0' align='left'>
                    <tr>
                        <td align='left' valign='center' >
                            <img style='padding:0px; margin:0px;' src='".$this->directory."images/".$this->css_class."/arrow_ltr.png' border='0' width='38' height='22' alt='".$this->lang['with_selected'].":' />
                            <a class='class_a' href='#' onClick='".$this->unique_prefix."setCheckboxes(true); return false;'>".$this->lang['check_all']."</a>
                            &nbsp;/&nbsp;
                            <a class='class_a' href='#' onClick='".$this->unique_prefix."setCheckboxes(false); return false;'>".$this->lang['uncheck_all']."</a>
                            &nbsp;&nbsp;&nbsp;
                            <label class='class_label'><i>".$this->lang['with_selected'].":</i></label>&nbsp;&nbsp;
                        </td>
                        <td align='left' valign='bottom' >";
                            $curr_url = $this->combine_url("delete", "");
                            $this->setUrlString($curr_url, "filtering", "sorting", "paging");
                            $this->drawModeButton("delete", $curr_url, $this->lang['delete_selected'], $this->lang['delete_selected'], "delete.gif", "\"return ".$this->unique_prefix."verifyDeleteSelected('$curr_url');\"", false, $nbsp="");
                            //<img src='".$this->directory."images/".$this->css_class."/delete.gif' style='cursor:pointer;' alt='".$this->lang['delete_selected']."' title='".$this->lang['delete_selected']."' onClick='SubmitDeleteSelected()' />                            
            echo "
                            
                        </td>
                    </tr>
               </table>
            ";
            echo "</td>";
            echo "</tr>";
            echo "</table>";
        }
    }

    //--------------------------------------------------------------------------
    // draw Summarize Row
    //--------------------------------------------------------------------------
    function drawSummarizeRow($r){
        if(count($this->summarize_columns) > 0){
            $this->rowOpen($r, $this->rowColor);            
            // draw multi-row row footer cell
            if($this->is_multirow_allowed){
                $this->colOpen("center",0,"nowrap","","");
                echo "&nbsp;";
                $this->colClose();            
            }            
            for($c = $this->colLower; $c < $this->colUpper; $c++){                
                if($c == $this->colLower){
                    if((isset($this->modes['add'][$this->mode]) && $this->modes['add'][$this->mode]) ||
                       (isset($this->modes['edit'][$this->mode]) && $this->modes['edit'][$this->mode]))  
                    {
                        $this->colOpen("center",0,"nowrap",$this->rowColor3,"class_td_main");
                        echo "<a class='class_a'><b>".$this->lang['total'].":</b></a>";
                        $this->colClose();                    
                    }
                    if($this->rows_numeration){
                       $this->colOpen("center",0,"nowrap"); echo ""; $this->colClose();
                    }
                }                
                if($this->canViewField($this->getFieldName($c))){    
                    $this->colOpen("right",0,"nowrap");
                    if(isset($this->columns_view_mode[$this->getFieldName($c)]['summarize']) && ($this->columns_view_mode[$this->getFieldName($c)]['summarize'] === true))
                        echo "&nbsp;=&nbsp;<a class='class_a'><b>".number_format($this->summarize_columns[$this->getFieldName($c)], 2)."</b></a>";
                    $this->colClose();                
                }
                
            }
            if((isset($this->modes['details'][$this->mode]) && $this->modes['details'][$this->mode]))
            {
                $this->colOpen("right",0,"nowrap");$this->colClose();
            }        
            if((isset($this->modes['delete'][$this->mode]) && $this->modes['delete'][$this->mode]))
            {
                $this->colOpen("right",0,"nowrap");$this->colClose();
            }        
            $this->rowClose();
        }    
    }
        
    //--------------------------------------------------------------------------
    // draw messages
    //--------------------------------------------------------------------------
    function draw_messages(){
        if($this->messaging && $this->act_msg){
            $css_class = "class_ok_message";
            if($this->is_error) $css_class= "class_error_message";
            if($this->is_warning) $css_class= "class_error_message";            
            echo "<div style='margin-top:10px;margin-bottom:10px;'><center><font class='".$css_class."'>$this->act_msg</font></center></div>";
            $this->act_msg = "";
        }        
    }
 
    //--------------------------------------------------------------------------
    // save Http Get Vars
    //--------------------------------------------------------------------------
    function saveHttpGetVars(){
        if(is_array($this->http_get_vars) && (count($this->http_get_vars) > 0)){
            foreach($this->http_get_vars as $key){
                echo "<input type='hidden' name='".$key."' id='".$key."' value='".((isset($_REQUEST[$key]))?$_REQUEST[$key]:"")."'>";                            
            }
        }
        echo "<input type='hidden' name='".$this->unique_prefix."page_size'  id='".$this->unique_prefix."page_size'  value='".((isset($_REQUEST[$this->unique_prefix.'page_size']))?$_REQUEST[$this->unique_prefix.'page_size']:$this->req_page_size)."'>";                            
        echo "<input type='hidden' name='".$this->unique_prefix."sort_field' id='".$this->unique_prefix."sort_field' value='".((isset($_REQUEST[$this->unique_prefix.'sort_field']))?$_REQUEST[$this->unique_prefix.'sort_field']:"")."'>";                            
        echo "<input type='hidden' name='".$this->unique_prefix."sort_type'  id='".$this->unique_prefix."sort_type'  value='".((isset($_REQUEST[$this->unique_prefix.'sort_type']))?$_REQUEST[$this->unique_prefix.'sort_type']:"")."'>";                            
    }
    
    //--------------------------------------------------------------------------
    // combine url 
    //--------------------------------------------------------------------------
    function combine_url($mode, $rid=""){
        $ind = 0;
        if(is_array($this->http_get_vars) && (count($this->http_get_vars) > 0)){
            foreach($this->http_get_vars as $key){
                if($ind == 0){ $a_url = "?"; $ind = 1; }
                else $a_url .= "&"; 
                $a_url .= $key."=".((isset($_REQUEST[$key]))?$_REQUEST[$key]:"");
            }
        }
        if($ind == 0) $a_url = "?".$this->unique_prefix."mode=".$mode."";
        else $a_url .= "&".$this->unique_prefix."mode=".$mode."";
        if($rid !== "") $a_url .= "&".$this->unique_prefix."rid=".$rid;
        
        // get URL vars from another  DG
        if(is_array($this->another_datagrids) && (count($this->another_datagrids) > 0)){
            foreach($this->another_datagrids as $key => $val){
                if($val[$this->mode] == true){
                    $a_url .= "&".$key."mode=".((isset($_REQUEST[$key.'mode']))?$_REQUEST[$key.'mode']:"");
                    $a_url .= "&".$key."rid=".((isset($_REQUEST[$key.'rid']))?$_REQUEST[$key.'rid']:"");
                    $a_url .= "&".$key."sort_field=".((isset($_REQUEST[$key.'sort_field']))?$_REQUEST[$key.'sort_field']:"");
                    $a_url .= "&".$key."sort_type=".((isset($_REQUEST[$key.'sort_type']))?$_REQUEST[$key.'sort_type']:"");
                    $a_url .= "&".$key."page_size=".((isset($_REQUEST[$key.'page_size']))?$_REQUEST[$key.'page_size']:"");
                    $a_url .= "&".$key."p=".((isset($_REQUEST[$key.'p']))?$_REQUEST[$key.'p']:"");
                    foreach($_REQUEST as $r_key => $r_val){                    
                        if(strstr($r_key, $key."_ff_")){
                           //d echo  $r_key."=".$_REQUEST[$r_key]."<br>";
                           $a_url .= "&".$r_key."=".((isset($_REQUEST[$r_key]))?$_REQUEST[$r_key]:"");                        
                        }                
                    }                    
                }
            }

        }        
        return $a_url;         
    }

    //--------------------------------------------------------------------------
    // set SQL limit 
    //--------------------------------------------------------------------------
    function setSqlLimit(){        
        $req_page_num  = "";
        $req_page_size = $this->getRequestVars('page_size');
        $req_p = $this->getRequestVars('p');
        if($req_page_size != "") $this->req_page_size = $req_page_size;
        if($req_p != "") $req_page_num  = $req_p;        
        if(is_numeric($req_page_num)){
            if($req_page_num > 0) $this->page_current = $req_page_num;
            else $this->page_current = 1;
        }else{
            $this->page_current = 1;
        }        
        $this->limit_start = ($this->page_current - 1) * $this->req_page_size;
        $this->limit_end = $this->req_page_size;    
    }

    //--------------------------------------------------------------------------
    // paging function - part 1
    //--------------------------------------------------------------------------
    function paging_part_1(){
        // (1) if we got a wrong number of page -> set page=1
        $req_page_num  = "";
        $req_page_size = $this->getRequestVars('page_size');
        $req_p = $this->getRequestVars('p');

        if($req_page_size != "") $this->req_page_size = $req_page_size;
        if($req_p != "") $req_page_num  = $req_p;
        
        if(is_numeric($req_page_num)){
            if($req_page_num > 0) $this->page_current = $req_page_num;
            else $this->page_current = 1;
        }else{
            $this->page_current = 1;
        }
                
        // (2) set pages_total & page_current vars for paging        
        if($this->rows_total > 0){            
            if(is_float($this->rows_total / $this->req_page_size))
                $this->pages_total = intval(($this->rows_total / $this->req_page_size) + 1);
            else
                $this->pages_total = intval($this->rows_total / $this->req_page_size);
        }else{
            $this->pages_total = 0;
        }   
        if($this->page_current > $this->pages_total) $this->page_current = $this->pages_total;
    }

    //--------------------------------------------------------------------------
    // paging function - part 2
    //--------------------------------------------------------------------------    
    function paging_part_2($lu_paging=false, $upper_br, $lower_br, $type="1"){
        // (4) display paging line
        $req_print = $this->getRequestVars('print');
        if($req_print != true) {$a_tag = "a";} else {$a_tag = "span";};
        $text = "";

        if($this->pages_total >= 1){
            $href_string = $this->combine_url("view");
            $this->setUrlString($href_string, "filtering", "sorting", "");            
            $text .= "<script type='text/javascript'>\n<!--//\n";
            $text .= "function ".$this->unique_prefix."setPageSize".$type."(){document.location.href = '$href_string&".$this->unique_prefix."page_size='+document.frmPaging$this->unique_prefix".$type.".page_size".$type.".value;}";
            $text .= "\n-->\n </script>";
            $href_string .= "&".$this->unique_prefix."page_size=".$this->req_page_size;
            $text .= "<form name='frmPaging$this->unique_prefix".$type."' action='' style='margin:0px; padding:5px; '>";
            if($lu_paging['results'] || $lu_paging['pages'] || $lu_paging['page_size']) if($upper_br) $text .= "";  //<br>
            $text .= "<table class='class_paging_table' dir='".$this->direction."' align='".$this->tblAlign[$this->mode]."' width='".$this->tblWidth[$this->mode]."' border='0' >";
            $text .= "<tr><td align='".$lu_paging['results_align']."' nowrap>";
            if($lu_paging['results']){
                $text .= "&nbsp;".$this->lang['results'].":&nbsp;";
                if(($this->page_current * $this->req_page_size) <= $this->rows_total) $total = ($this->page_current * $this->req_page_size);
                else $total = $this->rows_total;
                $text .= ($this->page_current * $this->req_page_size - $this->req_page_size + 1)." - ".$total;
                $text .= "&nbsp;".$this->lang['of']."&nbsp;";
                $text .= $this->rows_total;
                $text .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";            
            }
            $text .= "</td><td align='".$lu_paging['pages_align']."' nowrap>";
            if($lu_paging['pages']){
                $text .= "&nbsp;".$this->lang['pages'].":&nbsp;";                
                $href_prev1 = $href_prev2 = $href_first = "";
                if($this->page_current > 1){
                    $href_prev1 = "href='$href_string&".$this->unique_prefix."p=".($this->page_current - 1)."'";
                    $href_prev2 = "href='$href_string&".$this->unique_prefix."p=".$this->page_current."'";
                    $href_first = "href='$href_string&".$this->unique_prefix."p=1'";
                }
                $text .= "&nbsp;<".$a_tag." title='".$this->lang['first']."' class='class_a' style='text-decoration: none;' ".$href_first.">|<<</".$a_tag.">";
                if($this->page_current > 1) $text .= "&nbsp;<".$a_tag." class='class_a' style='text-decoration: none;' title='".$this->lang['previous']."' ".$href_prev1."><<</".$a_tag.">";
                else $text .= "&nbsp;<".$a_tag." class='class_a' style='text-decoration: none;' title='".$this->lang['previous']."' ".$href_prev2."><<</".$a_tag.">";
                $text .= "&nbsp;";
                $low_window_ind = $this->page_current - 3;
                $high_window_ind = $this->page_current + 3;
                if($low_window_ind > 1){ $start_index = $low_window_ind; $text .= "..."; }
                else $start_index = 1;
                if($high_window_ind < $this->pages_total) $end_index = $high_window_ind;
                else $end_index = $this->pages_total;
                for($ind=$start_index; $ind <= $end_index; $ind++){
                    if($ind == $this->page_current) $text .= "&nbsp;<".$a_tag." class='class_a' style='text-decoration: underline;' title='".$this->lang['current']."' href='$href_string&".$this->unique_prefix."p=".$ind."'><b><u>" . $ind . "</u></b></".$a_tag.">";
                    else $text .= "&nbsp;<".$a_tag." class='class_a' style='text-decoration: none;' href='$href_string&".$this->unique_prefix."p=".$ind."'>".$ind."</".$a_tag.">";
                    if($ind < $this->pages_total) $text .= ",&nbsp;";
                    else $text .= "&nbsp;";
                }
                if($high_window_ind < $this->pages_total) $text .= "...";
                $href_next1 = $href_next2 = $href_last = "";
                if($this->page_current < $this->pages_total){
                    $href_next1 = "href='$href_string&".$this->unique_prefix."p=".($this->page_current + 1)."'";
                    $href_next2 = "href='$href_string&".$this->unique_prefix."p=".$this->page_current."'";
                    $href_last = "href='$href_string&".$this->unique_prefix."p=".$this->pages_total."'";
                }
                if($this->page_current < $this->pages_total) $text .= "&nbsp;<".$a_tag." class='class_a' style='text-decoration: none;' title='".$this->lang['next']."' ".$href_next1.">>></".$a_tag.">";
                else $text .= "&nbsp;<".$a_tag." class='class_a' style='text-decoration: none;' title='".$this->lang['next']."' ".$href_next2.">>></".$a_tag.">";
                $text .= "&nbsp;<".$a_tag." class='class_a' style='text-decoration: none;' title='".$this->lang['last']."' ".$href_last.">>>|</".$a_tag.">";
            }
            $text .= "</td><td align='".$lu_paging['page_size_align']."' nowrap>";            
            if($lu_paging['page_size']){
                $text .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";            
                $text .= "&nbsp;".$this->lang['page_size'].":&nbsp;"; 
                $text .= $this->drawDropDownList('page_size'.$type, 'setPageSize'.$type.'()', $this->pages_array, $this->req_page_size);
            }
            $text .= "</td></tr>";            
            $text .= "</table>";
            $text .= "</form>";
            if($lu_paging['results'] || $lu_paging['pages'] || $lu_paging['page_size']) if($lower_br) $text .= ""; //<br>
            echo $text;
        }else{
            echo "<br /><br />";    
        }
    }
   
    //--------------------------------------------------------------------------
    // function - number rows
    //--------------------------------------------------------------------------
    function numberRows(){
        if($this->db_handler->isError($this->dataSet)){
            return 0;
        }else{
            return $this->dataSet->numRows();
        }        
    }
    
    //--------------------------------------------------------------------------
    // function - number columns
    //--------------------------------------------------------------------------
    function numberCols(){
        if($this->db_handler->isError($this->dataSet)){
            return 0;
        }else{
            return $this->dataSet->numCols();        
        }        
    }

    //--------------------------------------------------------------------------
    // function - no data found
    //--------------------------------------------------------------------------
    function noDataFound(){
        $this->tblOpen();
        $this->rowOpen(0, $this->rowColor);
            $add_column = 0;
            if((isset($this->modes['add'][$this->mode]) && ($this->modes['add'][$this->mode])) || $this->modes['edit'][$this->mode]) $add_column += 1;
            if(isset($this->mode['delete']) && $this->mode['delete']) $add_column += 1;
            $this->colOpen("center", ($this->colUpper + $add_column),""); 
                if($this->is_error) echo "<br><span class='class_error_message'>".$this->lang['no_data_found_error']."</span><br>&nbsp;";
                else  echo "<br>".$this->lang['no_data_found']."<br>&nbsp;";
            $this->colClose();                   
        $this->rowClose();
        $this->tblClose();
    }

    //--------------------------------------------------------------------------
    // delete row
    //--------------------------------------------------------------------------
    function deleteRow($rid){
        $rids = split("-", $rid);
        $sql = "DELETE FROM $this->tblName WHERE $this->PrimaryKey IN (-1 ";         
        foreach ($rids as $key){
            $sql .= ",".$key;
        }
        $sql .= ");";        
        $this->db_handler->query($sql);
        $affectedRows = $this->db_handler->affectedRows();
        if($affectedRows > 0){
            $this->act_msg = $this->lang['deleting_operation_completed'];
        }else{
            $this->is_warning = true;
            $this->act_msg = $this->lang['deleting_operation_uncompleted'];
        }
        if($this->debug) $this->act_msg .= " ".$this->lang['record_n']." ".$this->rid;        
        $this->getDataSet($this->sql_sort);        
        if($this->debug)
            echo "<b>delete sql (".strtolower($this->lang['total']).": ".$affectedRows.") </b>".$sql."<br><br>";        
    }

    //--------------------------------------------------------------------------
    // update row
    //--------------------------------------------------------------------------
    function updateRow($rid, $new_row){
        $sql = "UPDATE $this->tblName SET ";
            $ind = 0;
            $this->addCheckBoxesValues();            
            $max = count($_POST);
            foreach($_POST as $fldName => $fldValue){
                $ind ++;                
                // update all fields, excepting uploading fields
                if(!strpos($fldName, "file_act")){                 
                    $fldName = substr($fldName, 2, strlen($fldName));
                    $fldValue = $this->isDatePrepare($fldName,$fldValue);                
                    if($this->isText($fldName))
                        $sql .=  "$fldName = '$fldValue' ";
                    else{
                        $sql .=  "$fldName = $fldValue ";                                                
                    }
                    if (intval($ind) < intval($max)) $sql .= " , ";                    
                }
            }
        $sql .= " WHERE $this->PrimaryKey=$rid";
        $this->db_handler->query($sql);
        //echo mysql_error();
        $affectedRows = $this->db_handler->affectedRows();
        if($this->debug) echo "<b>update sql (".strtolower($this->lang['total']).": ".$affectedRows.") </b>".$sql."<br><br>";        
        if($affectedRows >= 0){
            $this->act_msg = $this->lang['updating_operation_completed'];
        }else{
            $this->is_warning = true;
            $this->act_msg = $this->lang['updating_operation_uncompleted'];
        }
        if($this->debug) $this->act_msg .= " ".$this->lang['record_n']." ".$this->rid;        
        $this->getDataSet($this->sql_sort);        
        if($new_row == 1){
            $fsort = " ORDER BY " . $this->PrimaryKey . " DESC";
            $this->getDataSet($fsort);        
        }
    }

    //--------------------------------------------------------------------------
    // add row
    //--------------------------------------------------------------------------
    function addRow(){
        $this->addCheckBoxesValues();                    
        $sql = "INSERT INTO $this->tblName ( ";
            $ind = 0;
            $max = count($_POST);
            foreach($_POST as $fldName => $fldValue){
                $ind ++;
                // all fields, excepting uploading fields
                if(!strpos($fldName, "file_act")){                 
                    $fldName = substr($fldName, 2, strlen($fldName));
                    $sql .=  "$fldName ";
                    if (intval($ind) < intval($max) ) $sql .= " , ";                                        
                }
            }
        $sql .= " ) VALUES ( ";
            $ind = 0;
            $max = count($_POST);
            foreach($_POST as $fldName => $fldValue){
                $ind ++;
                // all fields, excepting uploading fields
                if(!strpos($fldName, "file_act")){                 
                    $fldName = substr($fldName, 2, strlen($fldName));                    
                    $fldValue = $this->isDatePrepare($fldName,$fldValue);
                    if($this->isText($fldName)) { $sql .=  " '$fldValue' "; }
                    else{ $sql .=  (trim($fldValue) != "") ? $fldValue : 0;  }
                    if (intval($ind) < intval($max) ) $sql .= " , ";                                        
                }
            }
        $sql .= " ) ";
        $this->db_handler->query($sql);
        
        $affectedRows = $this->db_handler->affectedRows();
        if($this->debug) echo "<b>insert sql (".strtolower($this->lang['total']).": ".$affectedRows.") </b>".$sql."<br><br>";
            
        if($affectedRows > 0){
            $res = $this->db_handler->query("SELECT MAX(".$this->PrimaryKey.") as mmm FROM ".$this->tblName." ");
            $row = $res->fetchRow();
            $this->rid = $row[0];                        
            $this->act_msg = $this->lang['adding_operation_completed'];
            if($this->debug) $this->act_msg .= " ".$this->lang['record_n']." ".$this->rid;
        }else{
            $this->is_warning = true;            
            $this->act_msg = $this->lang['adding_operation_uncompleted'];
        }
        $this->getDataSet($this->sql_sort);
        
        $this->sql = "SELECT * FROM $this->tblName ";       
        $fsort = " ORDER BY " . $this->PrimaryKey . " DESC";        
        $this->getDataSet($fsort);
    }   

    //--------------------------------------------------------------------------
    // get field offset
    //--------------------------------------------------------------------------
    function getFieldOffset($field_name){
        if(!$this->is_error){
            $fields = $this->dataSet->tableInfo();
            for($ind=0; $ind < $this->dataSet->numCols(); $ind++){
                if($fields[$ind]['name'] === $field_name) return $ind;  
            }            
        }
        return -1;
    }

    //--------------------------------------------------------------------------
    // get field info
    //--------------------------------------------------------------------------
    function getFieldInfo($field, $parameter='', $type=0){        
        if(!$this->is_error){
            $fields = $this->dataSet->tableInfo();            
            if($type == 0){
                if($this->getFieldOffset($field) != -1)
                   return $fields[$this->getFieldOffset($field)][$parameter];
                else
                   return '';
            }else{
                return $fields[$field][$parameter];
            }
        }
        return -1;
    }
   
    //--------------------------------------------------------------------------
    // check if field can Be Hypertext
    //--------------------------------------------------------------------------
    function canBeHypertext($field_name){
        if(array_key_exists($field_name, $this->fieldsAsHypertextArray)){
           return $this->fieldsAsHypertextArray[$field_name]; 
        }
        return false;
    }

    //--------------------------------------------------------------------------
    // set Datetime field in right format (dd-mm-yyyy)|(yyyy-mm-dd)
    //--------------------------------------------------------------------------
    function isDatePrepare($field_name, $fldValue){
        $field_type = $this->columns_edit_mode[$field_name]['type'];
        switch (strtolower($field_type)){
            case 'date':    // date: DATE
            case 'datetime':    // date: DATE
                break;
            case 'datetimedmy':    // date: DATETIME
                $time1   = substr(trim($fldValue), 10, 9);
                $year1   = substr(trim($fldValue), 6, 4);
		$month1  = substr(trim($fldValue), 3, 2);
                $day1    = substr(trim($fldValue), 0, 2);
                $fldValue   = $year1."-".$month1."-".$day1." ".$time1;
                break;
            case 'datedmy':    // date: DATE
                $year1   = substr(trim($fldValue), 6, 4);
                $month1  = substr(trim($fldValue), 3, 2);
                $day1    = substr(trim($fldValue), 0, 2);
                $fldValue   = $year1."-".$month1."-".$day1;
                break;
            //case 'textarea': 
            //    $fldValue = addslashes($fldValue); 
            //    break; 
            //case 'textbox': 
            //    $fldValue = addslashes($fldValue); 
            //    break;             
            default:
                break;
        }
        return $fldValue;
    }

    //--------------------------------------------------------------------------
    // check if field type needs ''(text) or not (numeric...)
    //--------------------------------------------------------------------------
    function isText($field_name){
        $field_type = $this->getFieldInfo($field_name, 'type', 0);
        $result = true;
        switch (strtolower($field_type)){
            case 'int':     // int: TINYINT, SMALLINT, MEDIUMINT, INT, INTEGER, BIGINT, TINY, SHORT, LONG, LONGLONG, INT24
            case 'real':    // real: FLOAT, DOUBLE, DECIMAL, NUMERIC
            case 'null':    // empty: NULL            
                $result = false; break;
            case 'string':  // string: CHAR, VARCHAR, TINYTEXT, TEXT, MEDIUMTEXT, LONGTEXT, ENUM, SET, VAR_STRING
            case 'blob':    // blob: TINYBLOB, MEDIUMBLOB, LONGBLOB, BLOB, TEXT
            case 'date':    // date: DATE
            case 'timestamp':    // date: TIMESTAMP
            case 'year':    // date: YEAR
            case 'time':    // date: TIME
            case 'datetime':    // date: DATETIME
                $result = true; break;
            default:
                $result = true; break;
        }
        return $result;
    }

    //--------------------------------------------------------------------------
    // check if a field is a foreign key
    //--------------------------------------------------------------------------
    function isForeignKey($field_name){
        if(array_key_exists($field_name, $this->foreign_keys_array)){
           return true; 
        }
        return false;
    }

    //--------------------------------------------------------------------------
    // draw dropdownlist for foreign key
    //--------------------------------------------------------------------------
    function drawForeignKeyInput($keyFieldValue, $fk_field_name, $fk_field_value, $mode="edit"){
        $req_print = $this->getRequestVars('print');
        $req_mode = $this->getRequestVars('mode');
        // check if foreign key field is readonly or disabled
        $readonly = "";
        $disabled = "";
        if($req_mode == "edit"){
            if(isset($this->columns_edit_mode[$fk_field_name]['readonly']) && ((($this->columns_edit_mode[$fk_field_name]['readonly']) == true) || (($this->columns_edit_mode[$field_name]['readonly']) == "true"))) { $readonly = "readonly='readonly'"; $disabled = "disabled"; }
        }
        
        $sql  = " SELECT ".$fk_field_name;
        $sql .= " FROM ".$this->tblName;
        $sql .= " WHERE ".$this->PrimaryKey."=".$keyFieldValue;
        $this->db_handler->setFetchMode(DB_FETCHMODE_ASSOC);
        $dSet = $this->db_handler->query($sql);        
        if($dSet->numRows() > 0){
            $row = $dSet->fetchRow();            
            $kFieldValue = $row[$fk_field_name];
        }else{
            $kFieldValue = -1;
        }
        // select from outer table
        $sql  = " SELECT ".$this->foreign_keys_array[$fk_field_name]['field_key'].",".$this->foreign_keys_array[$fk_field_name]['field_name'].", ".$this->foreign_keys_array[$fk_field_name]['table'].".* ";
        $sql .= " FROM ".$this->foreign_keys_array[$fk_field_name]['table'] ;
        $sql .= " WHERE 1=1 ";
        if($mode !== "edit")
            $sql .= " AND " .$this->foreign_keys_array[$fk_field_name]['field_key']."=".$kFieldValue;
        if(isset($this->foreign_keys_array[$fk_field_name]['condition']) && ($this->foreign_keys_array[$fk_field_name]['condition'] != ""))
            $sql .= " AND " .$this->foreign_keys_array[$fk_field_name]['condition'];
        $sql .= " ORDER BY ".$this->foreign_keys_array[$fk_field_name]['field_key'];

        $dSet = $this->db_handler->query($sql);
        if($mode === "edit"){
            //'view_type"=>"radiobutton"
            if(isset($this->foreign_keys_array[$fk_field_name]['view_type']) && $this->foreign_keys_array[$fk_field_name]['view_type'] == "radiobutton"){
                echo $this->drawRadioButtons($this->getFieldRequiredType($fk_field_name).$fk_field_name, $fk_field_name, $dSet, $kFieldValue, 'field_key', 'field_name', $disabled);
            //'view_type"=>"dropdownlist" - default   
            }else{
                // get dafault value of field
                if($req_mode == "add"){
                    if(isset($this->columns_edit_mode[$fk_field_name]['default'])) $kFieldValue = $this->columns_edit_mode[$fk_field_name]['default'];
                }                
                echo $this->drawDropDownList($this->getFieldRequiredType($fk_field_name).$fk_field_name, '', $dSet, $kFieldValue, $fk_field_name, 'field_key', 'field_name', $disabled);
            }
        }else{
            $row = $dSet->fetchRow();
            echo "&nbsp;".$row[$this->foreign_keys_array[$fk_field_name]['field_name']]."&nbsp;";
        }        
    }

    ////////////////////////////////////////////////////////////////////////////
    // URL string creating
    ////////////////////////////////////////////////////////////////////////////
    //--------------------------------------------------------------------------
    // setUrl
    //--------------------------------------------------------------------------  
    function setUrlString(&$curr_url, $filtering = "", $sorting = "", $paging =""){
        if($filtering != "") $this->setUrlStringFiltering($curr_url);
        if($sorting != "") $this->setUrlStringSorting($curr_url);
        if($paging != "") $this->setUrlStringPaging($curr_url);
    }
    
    //--------------------------------------------------------------------------
    // setUrlString Filtering
    //--------------------------------------------------------------------------  
    function setUrlStringFiltering(&$curr_url){
        //d echo "++".$curr_url; 
        if($this->allow_filtering){
            foreach($this->filter_fields as $fldField){
                $table_field_name = "".$fldField['table']."_".$fldField['field'];
                if(isset($_REQUEST[$this->unique_prefix."_ff_".$table_field_name]) AND ($_REQUEST[$this->unique_prefix."_ff_".$table_field_name] != "")){
                    $curr_url .= "&".$this->unique_prefix."_ff_".$fldField['table'].'_'.$fldField['field']."=".$_REQUEST[$this->unique_prefix."_ff_".$table_field_name]."";
                }
                $table_field_name_operator = "".$fldField['table']."_".$fldField['field']."_operator";
                if(isset($_REQUEST[$this->unique_prefix."_ff_".$table_field_name_operator]) AND ($_REQUEST[$this->unique_prefix."_ff_".$table_field_name_operator] != "")){
                    $curr_url .= "&".$this->unique_prefix."_ff_".$fldField['table'].'_'.$fldField['field']."_operator=".$_REQUEST[$this->unique_prefix."_ff_".$table_field_name_operator]."";
                }
            }
            if(isset($_REQUEST[$this->unique_prefix."_ff_".'selSearchType']) && (trim($_REQUEST[$this->unique_prefix."_ff_".'selSearchType']) != ""))
                $curr_url .= "&".$this->unique_prefix."_ff_"."selSearchType=".$_REQUEST[$this->unique_prefix."_ff_".'selSearchType']."";            
            if(isset($_REQUEST[$this->unique_prefix."_ff_".'selSearchType']) && (trim($_REQUEST[$this->unique_prefix."_ff_".'selSearchType']) != ""))
                $curr_url .= "&".$this->unique_prefix."_ff_"."selSearchType=".$_REQUEST[$this->unique_prefix."_ff_".'selSearchType']."";
            if(isset($_REQUEST[$this->unique_prefix."_ff_".'onSUBMIT_FILTER']) && (trim($_REQUEST[$this->unique_prefix."_ff_".'onSUBMIT_FILTER']) != ""))
                $curr_url .= "&".$this->unique_prefix."_ff_"."onSUBMIT_FILTER=search";    
        }
    }

    //--------------------------------------------------------------------------
    // setUrlString Sorting
    //--------------------------------------------------------------------------  
    function setUrlStringSorting(&$curr_url){
        $sort_field = $this->getRequestVars('sort_field');
        $sort_type = $this->getRequestVars('sort_type');                
        if($sort_field != "") {
           $this->sort_field = $sort_field;
           $curr_url .= "&".$this->unique_prefix."sort_field=".$this->sort_field;
        }else {
            if(!is_numeric($this->default_sort_field)){ $this->default_sort_field = $this->getFieldOffset($this->default_sort_field) + 1; }
            $curr_url .= "&".$this->unique_prefix."sort_field=".$this->default_sort_field;
        }; // make pKey      
        if($sort_type != "") {
            $this->sort_type = $sort_type;
            $curr_url .= "&".$this->unique_prefix."sort_type=".$this->sort_type;
        } else {
            $curr_url .= "&".$this->unique_prefix."sort_type=".$this->default_sort_type;
        };          
    }

    //--------------------------------------------------------------------------
    // setUrlString Pading
    //--------------------------------------------------------------------------  
    function setUrlStringPaging(&$curr_url){
        $page_size = $this->getRequestVars('page_size');
        $p = $this->getRequestVars('p');
        if($this->layouts['edit'] == 0){            
            if($page_size != ""){
                $this->req_page_size = $_REQUEST[$this->unique_prefix.'page_size'];
                $curr_url .= "&".$this->unique_prefix."page_size=".$this->req_page_size;
            }else{ 
                $curr_url .= "&".$this->unique_prefix."page_size=".$this->req_page_size;
            }            
        }else{            
            if($this->mode === "view"){
                $curr_url .= "&".$this->unique_prefix."page_size=".$this->req_page_size;
            }else{
                if(isset($_REQUEST[$this->unique_prefix.'page_size'])) $this->req_page_size = $_REQUEST[$this->unique_prefix.'page_size']; 
                $curr_url .= "&".$this->unique_prefix."page_size=".$this->req_page_size;
            }
        }
        if($p != "") {
            $this->page_current = $_REQUEST[$this->unique_prefix.'p'];
            $curr_url .= "&".$this->unique_prefix."p=".$this->page_current;
        }else {
            $this->page_current = 1;
            $curr_url .= "&".$this->unique_prefix."p=1";
        };
    } 

    ////////////////////////////////////////////////////////////////////////////
    // View & Edit mode methods
    ////////////////////////////////////////////////////////////////////////////
    //--------------------------------------------------------------------------
    // get enum values
    //--------------------------------------------------------------------------
    function getEnumValues( $table , $field ){
        $query = " SHOW COLUMNS FROM $table LIKE '$field' ";
        $this->db_handler->setFetchMode(DB_FETCHMODE_ORDERED);  
        $result = $this->db_handler->query($query);        
        if($row = $result->fetchRow()){            
            // extract the values, the values are enclosed in single quotes and separated by commas
            $regex = "/'(.*?)'/";
            preg_match_all( $regex , $row[1], $enum_array );            
            $enum_fields = $enum_array[1];            
            return $enum_fields ;
        }else{
            return array();
        }
    } 
  
    //--------------------------------------------------------------------------
    // check if field exists & can be viewed
    //--------------------------------------------------------------------------
    function canViewField($field_name){
        if($this->mode === "view"){
            if(array_key_exists($field_name, $this->columns_view_mode)) return true;    
        }else if($this->mode === "edit"){
            if(array_key_exists($field_name, $this->columns_edit_mode)) return true;
        }else if($this->mode === "details"){
            if(array_key_exists($field_name, $this->columns_edit_mode)) return true;
        }
        return false;
    }
    //--------------------------------------------------------------------------
    // check if field exists & can be viewed
    //--------------------------------------------------------------------------
    function getHeaderName($field_name){        
        if($this->mode === "view"){
            if(array_key_exists($field_name, $this->columns_view_mode) && isset($this->columns_view_mode[$field_name]['header']))
                return $this->columns_view_mode[$field_name]['header']; 
        }else if($this->mode === "edit"){
            if(array_key_exists($field_name, $this->columns_edit_mode) && isset($this->columns_edit_mode[$field_name]['header'])){
                if(substr($this->getFieldRequiredType($field_name), 0, 1) == "r")
                    return "<font color='#cd0000'>*</font> ".$this->columns_edit_mode[$field_name]['header'];
                else
                    return $this->columns_edit_mode[$field_name]['header'];
            }                
        }else if($this->mode === "details"){
            if(array_key_exists($field_name, $this->columns_edit_mode) && isset($this->columns_edit_mode[$field_name]['header']))
                return $this->columns_edit_mode[$field_name]['header']; 
        }        
        return $field_name;
    }

    //--------------------------------------------------------------------------
    // Returns field name
    //--------------------------------------------------------------------------
    function getFieldName($field_offset){
        $fields = $this->dataSet->tableInfo();
        $field_name = $fields[$field_offset]['name'];        
        if($field_name) return $field_name;
        else return $field_offset;
    }  

    //--------------------------------------------------------------------------
    // get Field Required Type
    //--------------------------------------------------------------------------
    function getFieldRequiredType($field_name){
        if(!isset($this->columns_edit_mode[$field_name]['req_type'])){
            return "sy";
        }else{
            return $this->columns_edit_mode[$field_name]['req_type'];
        }
    }

    //--------------------------------------------------------------------------
    // get Field Title
    //--------------------------------------------------------------------------
    function getFieldTitle($field_name){
        if(!isset($this->columns_edit_mode[$field_name]['title'])){
            return $field_name;
        }else{
            return $this->columns_edit_mode[$field_name]['title'];
        }
    }

    //--------------------------------------------------------------------------
    // get Field Alignment
    //--------------------------------------------------------------------------
    function getFieldAlign($ind, $row){
        $field_name = $this->getFieldName($ind);
        if(isset($this->columns_view_mode[$field_name]['align'])){
            return $this->columns_view_mode[$field_name]['align'];    
        }else{
            if(is_numeric($row[$ind]))
                return ($this->direction == "rtl")?"left":"right";
            else
                return ($this->direction == "rtl")?"right":"left";            
        }
    }

    //--------------------------------------------------------------------------
    // get Field Value By Type
    //--------------------------------------------------------------------------
    function getFieldValueByType($field_value, $ind, $row, $field_name=""){
        // show as text/html
        //$field_value = str_replace("<", "&lt;", $field_value);
        //$field_value = str_replace(">", "&gt;", $field_value);
        
        $req_print = $this->getRequestVars('print');
        $req_mode = $this->getRequestVars('mode');
        
        if($field_name == "") $field_name = $this->getFieldName($ind);        
        if($this->mode === "view"){
            $title = "";
            if(isset($this->columns_view_mode[$field_name]['text_length']) && ($this->columns_view_mode[$field_name]['text_length'] != "-1") && ($field_value != "")){
                if((strlen($field_value)) > $this->columns_view_mode[$field_name]['text_length']){
                    $field_value = str_replace('"', "&quot;", $field_value); // double quotation mark
                    $field_value = str_replace("'", "&#039;", $field_value); // single quotation mark                    
                    if($req_print != true){
                        $title = "title='".$field_value."' style='cursor: help;'";	
                    }
                    $field_value = substr($field_value, 0, $this->columns_view_mode[$field_name]['text_length'])."...";
                }
            }
            if(array_key_exists($field_name, $this->columns_view_mode)){
                if(!isset($this->columns_view_mode[$field_name]['type'])) $field_type = "label";
                else $field_type = $this->columns_view_mode[$field_name]['type'];
                // format case of field value
                if(!isset($this->columns_view_mode[$field_name]['case'])) $field_value = $field_value;
                else if(strtolower($this->columns_view_mode[$field_name]['case']) == "upper") $field_value = strtoupper($field_value);
                else if(strtolower($this->columns_view_mode[$field_name]['case']) == "lower") $field_value = strtolower($field_value);
                if($req_print == true){ $field_type = "label"; }

                switch($field_type){
                    case "barchart":
                        $field = (isset($this->columns_view_mode[$field_name]['field']) ? $this->columns_view_mode[$field_name]['field'] : "");
                        if(($field != "") && ($this->getFieldOffset($field) != -1)) $field_value = $row[$this->getFieldOffset($field)];
                        $maximum_value = (isset($this->columns_view_mode[$field_name]['maximum_value']) ? $this->columns_view_mode[$field_name]['maximum_value'] : "");
                        $barchart_result ="
                        <table width='110px;' bgcolor='##0000ff' height='10px' align='center' cellpadding='0' cellspacing='0'>
                        <tr title='".$field_value."'>
                        <td style='font-size:9px;' align='center' width='".($field_value/$maximum_value * 100)."px' bgcolor='#ff0000' nowrap>
                        ".(($field_value > 0) ? $field_value : "")."
                        </td>
                        <td style='font-size:9px;' width='".(100 - ($field_value/$maximum_value * 100))."px' align='center' nowrap>
                        ".(($field_value == 0) ? $field_value : "")."
                        </td>
                        </tr>
                        </table>
                        ";
                        return $barchart_result;
                        break;
                    case "image":
                        $img_target_path = (isset($this->columns_view_mode[$field_name]['target_path']) ? $this->columns_view_mode[$field_name]['target_path'] : "");
                        $img_width      = (isset($this->columns_view_mode[$field_name]['width']) ? $this->columns_view_mode[$field_name]['width'] : "50px");
                        $img_height     = (isset($this->columns_view_mode[$field_name]['height']) ? $this->columns_view_mode[$field_name]['height'] : "30px");
                        $img_default    = ((isset($this->columns_view_mode[$field_name]['default']) && ($this->columns_view_mode[$field_name]['default'] != "") && file_exists($img_target_path.trim($this->columns_view_mode[$field_name]['default']))) ? "<img src='".$img_target_path.$this->columns_view_mode[$field_name]['default']."' width='".$img_width."' height='".$img_height."' alt='' />" : "<span class='class_label'>".$this->lang['no_image']."</span>");                    
                        if((trim($field_value) !== "") && file_exists($img_target_path.trim($field_value))){
                            return "&nbsp;<img src='".$img_target_path.trim($field_value)."' border='1' width='".$img_width."' height='".$img_height."' align='middle' />&nbsp;";
                        }else{                            
                            return "<table style='border: solid 1px #000000;' width='".$img_width."' height='".$img_height."'><tr><td align='center'>".$img_default."</td></tr></table>";
                        }
                        break;
                    case "label": 
                        return "&nbsp;<label class='class_label' ".$title.">".trim($field_value)."</label>&nbsp;";
                        break;                    
                    case "link":                        
                        if(isset($this->columns_view_mode[$field_name]['field_data']) && (trim($this->columns_view_mode[$field_name]['field_data']) != "")){
                            if(isset($this->columns_view_mode[$field_name]['field_key'])){
                                $field_inner = $row[$this->getFieldOffset($this->columns_view_mode[$field_name]['field_key'])];
                            }else{
                                $field_inner = "";
                            }
                            $href_inner = (isset($this->columns_view_mode[$field_name]['href']))?$this->columns_view_mode[$field_name]['href']:"";
                            if(strpos($href_inner, "{0}") >= 0){
                                $href = str_replace("{0}", $field_inner, $href_inner);
                            }else{
                                $href = $href_inner;
                            }
                            $target_inner = (isset($this->columns_view_mode[$field_name]['target']))?$this->columns_view_mode[$field_name]['target']:"";
                            return "&nbsp;<a class='class_a2' href='".$href."' target='".$target_inner."' ".$title.">".trim($row[$this->getFieldOffset($this->columns_view_mode[$field_name]['field_data'])])."</a>&nbsp;";
                        }else{
                            return '&nbsp;';   
                        }                        
                        break;
                    case "linktoview";
                        $curr_url = $this->combine_url("details", intval($row[$this->getFieldOffset($this->PrimaryKey)]));                         
                        $this->setUrlStringPaging($curr_url);
                        $this->setUrlStringSorting($curr_url);
                        $this->setUrlStringFiltering($curr_url);                    
                        return "&nbsp;<a class='class_a' href='$curr_url' ".$title.">".trim($field_value)."</a>&nbsp;";
                        break;
                    case "password":
                        return "&nbsp;<label class='class_label' ".$title.">******</label>&nbsp;";
                        break;                    
                    default:
                        return "&nbsp;<label class='class_label' ".$title.">".trim($field_value)."</label>&nbsp;"; break;
                }
            }            
        }else if(($this->mode === "edit") || ($this->mode === "details")){

            if(array_key_exists($field_name, $this->columns_edit_mode)){
                if(!$this->isText($field_name)) $field_maxlength = "50";
                else $field_maxlength = $this->getFieldInfo($field_name, 'len', 0);                
                
                if(!isset($this->columns_edit_mode[$field_name]['type'])){ $field_type = "label"; }
                else $field_type = $this->columns_edit_mode[$field_name]['type'];
                if(isset($this->columns_edit_mode[$field_name]['req_type'])) $field_req_type = $this->columns_edit_mode[$field_name]['req_type'];
                else  $field_req_type = "";
                if(isset($this->columns_edit_mode[$field_name]['width']) && (trim($this->columns_edit_mode[$field_name]['width']) != "")) $field_width = "style='width:".$this->columns_edit_mode[$field_name]['width'].";'";
                else  $field_width = "";
                if(isset($this->columns_edit_mode[$field_name]['readonly']) && ((($this->columns_edit_mode[$field_name]['readonly']) == true) || (($this->columns_edit_mode[$field_name]['readonly']) == "true"))) { $readonly = "readonly='readonly'"; $disabled = "disabled"; }
                else { $readonly = ""; $disabled = ""; }
                if($req_print == true){ $field_type = "print"; }
                // get dafault value of field
                if($req_mode == "add"){
                    if(isset($this->columns_edit_mode[$field_name]['default'])) $field_value = $this->columns_edit_mode[$field_name]['default'];
                }
            
                if ($this->mode === "edit"){
                    switch($field_type){
                        case "checkbox":                        
                            $checked = "";
                            if(isset($this->columns_edit_mode[$field_name]['true_value']) && isset($this->columns_edit_mode[$field_name]['false_value'])){
                                if($field_value == $this->columns_edit_mode[$field_name]['true_value']){
                                    $checked = "checked";
                                }
                            }
                            echo "<input class='class_checkbox' type='checkbox' name='".$this->getFieldRequiredType($field_name).$field_name."' id='".$this->getFieldRequiredType($field_name).$field_name."' title='".$this->getFieldTitle($field_name)."' value='".trim($field_value)."' ".$checked." ".$readonly.">&nbsp;";
                            break;                                                
                        case "date":
                            $ret_date  ="&nbsp;<input class='class_textbox' ".$field_width." readonly type='text' title='".$this->getFieldTitle($field_name)."' id='".$this->getFieldRequiredType($field_name).$field_name."' name='".$this->getFieldRequiredType($field_name).$field_name."' value='".trim($field_value)."' maxlength='".$field_maxlength."'>";
                            $ret_date .="<a class='class_a2' title='".$this->getFieldTitle($field_name)."' href=\"javascript: ".$this->unique_prefix."openCalendar('', '".$this->unique_prefix."frmEditRow', '$field_req_type', '".$field_name."', '$field_type')\"><img src='".$this->directory."images/".$this->css_class."/cal.gif' border='0' alt='".$this->lang['set_date']."' align='top' style='margin:3px;margin-left:6px;margin-right:6px;' /></a>&nbsp;";
                            $ret_date .="<a class='class_a2' style='cursor: pointer;' onClick='document.getElementById(\"".$this->getFieldRequiredType($field_name).$field_name."\").value=\"".date("Y-m-d")."\"'>[".date("Y-m-d")."]</a>";
                            return $ret_date;
                            break;                        
                        case "datedmy":    
                            $ret_date  ="&nbsp;<input class='class_textbox' ".$field_width." readonly type='text' title='".$this->getFieldTitle($field_name)."' id='".$this->getFieldRequiredType($field_name).$field_name."' name='".$this->getFieldRequiredType($field_name).$field_name."' value='".$this->myDate($field_value, "datedmy")."' maxlength='".$field_maxlength."'>";
                            $ret_date .="<a class='class_a2' title='".$this->getFieldTitle($field_name)."' href=\"javascript: ".$this->unique_prefix."openCalendar('', '".$this->unique_prefix."frmEditRow', '$field_req_type', '".$field_name."', '$field_type')\"><img src='".$this->directory."images/".$this->css_class."/cal.gif' border='0' alt='".$this->lang['set_date']."' align='top' style='margin:3px;margin-left:6px;margin-right:6px;' /></a>&nbsp;";
                            $ret_date .="<a class='class_a2' style='cursor: pointer;' onClick='document.getElementById(\"".$this->getFieldRequiredType($field_name).$field_name."\").value=\"".date("d-m-Y")."\"'>[".date("d-m-Y")."]</a>";                            
                            return $ret_date;
                            break;                        
                        case "datetime":
                            $ret_date  ="&nbsp;<input class='class_textbox' ".$field_width." readonly type='text' title='".$this->getFieldTitle($field_name)."' id='".$this->getFieldRequiredType($field_name).$field_name."' name='".$this->getFieldRequiredType($field_name).$field_name."' value='".trim($field_value)."' maxlength='".$field_maxlength."'>";
                            $ret_date .="<a class='class_a2' title='".$this->getFieldTitle($field_name)."' href=\"javascript: ".$this->unique_prefix."openCalendar('', '".$this->unique_prefix."frmEditRow', '$field_req_type', '".$field_name."', '$field_type')\"><img src='".$this->directory."images/".$this->css_class."/cal.gif' border='0' alt='".$this->lang['set_date']."' align='top' style='margin:3px;margin-left:6px;margin-right:6px;' /></a>&nbsp;";
                            $ret_date .="<a class='class_a2' style='cursor: pointer;' onClick='document.getElementById(\"".$this->getFieldRequiredType($field_name).$field_name."\").value=\"".date("Y-m-d H:i:s")."\"'>[".date("Y-m-d H:i:s")."]</a>";
                            return $ret_date;
                            break;                        
                        case "datetimedmy":
                            $ret_date  ="&nbsp;<input class='class_textbox' ".$field_width." readonly type='text' title='".$this->getFieldTitle($field_name)."' id='".$this->getFieldRequiredType($field_name).$field_name."' name='".$this->getFieldRequiredType($field_name).$field_name."' value='".$this->myDate($field_value, "datetimedmy")."' maxlength='".$field_maxlength."'>";
                            $ret_date .="<a class='class_a2' title='".$this->getFieldTitle($field_name)."' href=\"javascript: ".$this->unique_prefix."openCalendar('', '".$this->unique_prefix."frmEditRow', '$field_req_type', '".$field_name."', '$field_type')\"><img src='".$this->directory."images/".$this->css_class."/cal.gif' border='0' alt='".$this->lang['set_date']."' align='top' style='margin:3px;margin-left:6px;margin-right:6px;' /></a>&nbsp;";
                            $ret_date .="<a class='class_a2' style='cursor: pointer;' onClick='document.getElementById(\"".$this->getFieldRequiredType($field_name).$field_name."\").value=\"".date("d-m-Y H:i:s")."\"'>[".date("d-m-Y H:i:s")."]</a>";                            
                            return $ret_date;
                            break;
                        case "enum":
                            $ret_enum = "";
                            $enum_view_type = (isset($this->columns_edit_mode[$field_name]['view_type'])) ? $this->columns_edit_mode[$field_name]['view_type'] : "";
                            switch($enum_view_type){
                                case "radiobutton":
                                    if(isset($this->columns_edit_mode[$field_name]['source']) && is_array($this->columns_edit_mode[$field_name]['source'])){
                                        $ret_enum .= "&nbsp;".$this->drawRadioButtons($this->getFieldRequiredType($field_name).$field_name, $field_name, $this->columns_edit_mode[$field_name]['source'], $field_value, 'source', "", $disabled)."&nbsp;";
                                    }else{
                                        $ret_enum .= "&nbsp;".$this->drawRadioButtons($this->getFieldRequiredType($field_name).$field_name, $field_name, $this->getEnumValues($this->tblName, $field_name), $field_value, 'source', "", $disabled)."&nbsp;";
                                    }                                        
                                    break;                            
                                case "dropdownlist":
                                default:
                                    if(isset($this->columns_edit_mode[$field_name]['source']) && is_array($this->columns_edit_mode[$field_name]['source'])){                                
                                        $ret_enum .= "&nbsp;".$this->drawDropDownList($this->getFieldRequiredType($field_name).$field_name, '', $this->columns_edit_mode[$field_name]['source'], $field_value, "", "", "", $disabled)."&nbsp;";
                                    }else{
                                        $ret_enum .= "&nbsp;".$this->drawDropDownList($this->getFieldRequiredType($field_name).$field_name, '', $this->getEnumValues($this->tblName, $field_name), trim($field_value), "", "", "", $disabled)."&nbsp;";
                                    }
                                    break;
                            }
                            return $ret_enum;
                            break;
                        case "image":
                        case "file":
                            $ret_file = "";
                            $file = false;
                            $file_error_msg = "";
                            $file_name_view = $field_value;
                            $file_act = $this->getRequestVars('file_act');
                            $rid = $this->getRequestVars('rid');                                                        
                            $ret_file =  "<script type='text/javascript'>
                            <!--//
                            function fileAction(){
                                document.".$this->unique_prefix."frmEditRow.action='".$this->HTTP_URL."?".$_SERVER['QUERY_STRING']."';
                                document.".$this->unique_prefix."frmEditRow.encoding='multipart/form-data';
                                document.".$this->unique_prefix."frmEditRow.method='POST';                                
                                document.".$this->unique_prefix."frmEditRow.submit();
                            }
                            -->
                            </script>";
                            if(trim($field_value) == ""){
                                $file = true;
                                $file_name = $this->getFieldRequiredType($field_name).$field_name;                                
                                if(count($_FILES) > 0){
                                    if ($_FILES[$file_name]["error"] > 0){
                                        //debug? $file_error_msg = "Error: ".$_FILES[$file_name]["error"]."";
                                        $file_error_msg = $this->lang['file_uploading_error'];
                                        $file = false;
                                    }else{
                                        // check file's max size
                                        if(isset($this->columns_edit_mode[$field_name]['max_file_size'])){
                                            if($_FILES[$file_name]["size"] > $this->columns_edit_mode[$field_name]['max_file_size']){
                                               $file = false;
                                               $file_error_msg = $this->lang['file_invalid file_size'].": ".number_format(($_FILES[$file_name]["size"]/1024),3,".",",")." Kb (".$this->lang['max'].". ".number_format(($this->columns_edit_mode[$field_name]['max_file_size']/1024),3,".",",")." Kb) ";
                                            }
                                        }                                        
                                    }
                                    if($file == true){
                                        // where the file is going to be placed 
                                        $target_path = "";
                                        if(isset($this->columns_edit_mode[$field_name]['target_path'])){
                                            $target_path = $this->columns_edit_mode[$field_name]['target_path'];
                                        }    
                                        // add the original filename to our target path. Result is "uploads/filename.extension" 
                                        $target_path = $target_path . basename( $_FILES[$file_name]['name']);                                    
                                        $_FILES[$file_name]['tmp_name'];  
                                        if(move_uploaded_file($_FILES[$file_name]['tmp_name'], $target_path)) {
                                            $sql = "UPDATE $this->tblName SET ".$field_name;
                                            $sql .= " = '".$_FILES[$file_name]['name']."' ";
                                            $sql .= " WHERE $this->PrimaryKey=".$rid;
                                            $this->db_handler->query($sql);
                                            //debug? mysql_error();
                                            $file = true;
                                            $file_name_view = $_FILES[$file_name]['name'];
                                        } else{
                                            $file_error_msg = $this->lang['file_uploading_error'];
                                            $file = false;
                                        }
                                    }
                                }else{
                                    $file = false;                                    
                                }
                            }else{          
                                if($file_act == "remove"){
                                    $sql = "UPDATE $this->tblName SET ".$field_name." = '' ";
                                    $sql .= " WHERE $this->PrimaryKey=".$rid;
                                    $this->db_handler->query($sql);
                                    // delete file from target path
                                    $file = false;
                                }else{
                                    $file = true;
                                }
                            }
                            // if there is a file (uploaded or exists)
                            if($file == true){
                                if(strlen($field_value) > 40){
                                    $str_start = strlen($field_value) - 40;
                                    $str_prefix = "...";
                                }else{
                                    $str_start = 0;
                                    $str_prefix = "";
                                }
                                $ret_file .= "<input type='hidden' name='".$this->unique_prefix."file_act' id='".$this->unique_prefix."file_act' value='remove' />";                                
                                $ret_file .= "&nbsp;".$str_prefix.substr($file_name_view, $str_start, 40)." &nbsp;[<a class='class_a' href='#' onclick='fileAction()'><b>".$this->lang['remove']."</b></a>]"."&nbsp;";
                            }else{
                                $ret_file .= "<input type='hidden' name='".$this->unique_prefix."file_act' id='".$this->unique_prefix."file_act' value='upload' />";
                                if($file_error_msg != "") $ret_file .= "&nbsp;<label class='class_error_message'>".$file_error_msg."</label><br />";
                                $ret_file .= "&nbsp;<input type='file' class='class_textbox' width='210px' title='".$this->getFieldTitle($field_name)."' name='".$this->getFieldRequiredType($field_name).$field_name."' id='".$this->getFieldRequiredType($field_name).$field_name."' ".$disabled.">&nbsp;&nbsp;";
                                $ret_file .= "[<a class='class_a' ".(($disabled == "disabled") ? "" : "href='#' onclick='fileAction()'")."><b>".$this->lang['upload']."</b></a>]&nbsp;";                                
                            }
                            return $ret_file;                                                           
                            break;                        
                        case "label":
                            return "&nbsp;<label class='class_textbox' ".$field_width.">".trim($field_value)."</label>&nbsp;"; 
                            break;
                        case "password":                    
                            return "&nbsp;<input class='class_textbox' ".$field_width." type='password' title='".$this->getFieldTitle($field_name)."' id='".$this->getFieldRequiredType($field_name).$field_name."' name='".$this->getFieldRequiredType($field_name).$field_name."' value='".trim($field_value)."' maxlength='".$field_maxlength."' ".$readonly.">&nbsp;";
                            break;
                        case "print":
                            return "<table style='margin:auto;'><tr><td><label class='class_textbox' ".$field_width.">".trim($field_value)."</label></td></tr></table>"; 
                            break;                        
                        case "textarea":
                            $field_value = str_replace('"', "&quot;", $field_value); // double quotation mark
                            $field_value = str_replace("'", "&#039;", $field_value); // single quotation mark                        
                            $texarea  = "&nbsp;<textarea id='".$this->getFieldRequiredType($field_name).$field_name."' name='".$this->getFieldRequiredType($field_name).$field_name."' rows='3' cols='23' ".$field_width." ".$readonly.">".trim($field_value)."</textarea>&nbsp;";
                            if($this->columns_edit_mode[$field_name]['edit_type'] == "wysiwyg"){
                                $texarea .= "&nbsp;<script type='text/javascript'>\n<!--//\n generate_wysiwyg('".$this->getFieldRequiredType($field_name).$field_name."'); \n-->\n </script>";
                            }
                            return $texarea;    
                            break;                    
                        case "textbox":
                            $field_value = str_replace('"', "&quot;", $field_value); // double quotation mark
                            $field_value = str_replace("'", "&#039;", $field_value); // single quotation mark
                            return "&nbsp;<input class='class_textbox' ".$field_width." type='text' title='".$this->getFieldTitle($field_name)."' id='".$this->getFieldRequiredType($field_name).$field_name."' name='".$this->getFieldRequiredType($field_name).$field_name."' value='".trim($field_value)."' maxlength='".$field_maxlength."' ".$readonly.">&nbsp;";
                            break;
                        default:
                            return "&nbsp;<input type='text' class='class_textbox' ".$field_width." title='".$this->getFieldTitle($field_name)."' id='".$this->getFieldRequiredType($field_name).$field_name."' name='".$this->getFieldRequiredType($field_name).$field_name."' value='".trim($field_value)."' maxlength='".$field_maxlength."' ".$readonly.">&nbsp;";
                            break;
                    }
                }else if ($this->mode === "details"){
                    switch($field_type){
                        case "checkbox":
                            return "&nbsp;".(($field_value == 1) ? $this->lang['yes'] : $this->lang['no'])."&nbsp;";
                            break;                        
                        case "date":
                            return "&nbsp;".substr(trim($field_value), 0, 10)."&nbsp;";
                            break;
                        case "datedmy":
                            return "&nbsp;".$this->myDate($field_value, "datedmy")."&nbsp;";
                            break;                        
                        case "datetime":
                            return "&nbsp;".trim($field_value)."&nbsp;";
                            break;                        
                        case "datetimedmy":
                            return "&nbsp;".$this->myDate($field_value, "datetimedmy")."&nbsp;";
                            break;                            
                        case "image":
                            $img_target_path = (isset($this->columns_edit_mode[$field_name]['target_path']) ? $this->columns_edit_mode[$field_name]['target_path'] : "" );
                            $img_width       = (isset($this->columns_edit_mode[$field_name]['width']) ? $this->columns_edit_mode[$field_name]['width'] : "50px" );
                            $img_height      = (isset($this->columns_edit_mode[$field_name]['height']) ? $this->columns_edit_mode[$field_name]['height'] : "30px" );
                            $img_default     = ((isset($this->columns_edit_mode[$field_name]['default']) && ($this->columns_edit_mode[$field_name]['default'] != "") && file_exists($img_target_path.trim($this->columns_edit_mode[$field_name]['default']))) ? "<img src='".$img_target_path.$this->columns_edit_mode[$field_name]['default']."' width='".$img_width."' height='".$img_height."' alt='' />" : "<span class='class_label'>".$this->lang['no_image']."</span>");                    
                            if((trim($field_value) !== "") && file_exists($img_target_path.trim($field_value))){
                                return "&nbsp;<img src='".$img_target_path.trim($field_value)."' border='1' width='".$img_width."' height='".$img_height."' align='middle' />&nbsp;";
                            }else{
                                return "<table style='border: solid 1px #000000;' width='".$img_width."' height='".$img_height."'><tr><td align='center'>".$img_default."</td></tr></table>";
                            }
                            break;
                        case "label":
                            return "&nbsp;".trim($field_value).""; 
                            break;                                                
                        case "password":
                            return "&nbsp;<label class='class_label'>******</label>&nbsp;";
                            break;                    
                        case "print":
                            return "<table style='margin:auto;'><tr><td><label class='class_textbox' ".$field_width.">".trim($field_value)."</label></td></tr></table>"; 
                            break;
                        case "textarea":
                        case "textbox":
                            return "&nbsp;".trim($field_value).""; 
                            break;                                                                        
                        default:
                            return "&nbsp;".trim($field_value).""; 
                            break;
                    }                                        
                }
            }                        
        }
        return false;
    }

    //--------------------------------------------------------------------------
    // add Check Boxes Values
    //--------------------------------------------------------------------------
    function addCheckBoxesValues(){
        foreach($this->columns_edit_mode as $itemName => $itemValue){
            if(isset($itemValue['type']) && $itemValue['type'] == "checkbox"){
                $found = false;
                foreach($_POST as $i => $v){
                    if($i == $this->getFieldRequiredType($itemName).$itemName){
                        $found = true;
                    }
                }
                if(!$found){                    
                    $_POST[$this->getFieldRequiredType($itemName).$itemName] = $itemValue['false_value'];
                }else{
                    $_POST[$this->getFieldRequiredType($itemName).$itemName] = $itemValue['true_value'];
                }
            }            
        }
    }

    //--------------------------------------------------------------------------
    // get $_REQUEST variable
    //--------------------------------------------------------------------------
    function getRequestVars($var = ""){
        return isset($_REQUEST[$this->unique_prefix.$var]) ? $_REQUEST[$this->unique_prefix.$var] : "";        
    }

    //--------------------------------------------------------------------------
    // draw RadioButtons
    //--------------------------------------------------------------------------
    function drawRadioButtons($tag_name, $field_name, &$select_array, $compare = "", $sub_field_value="", $sub_field_name="", $disabled=""){
        $req_print = $this->getRequestVars('print');
        $text = "";
        if($req_print != true){
            if(is_object($select_array)){
                while($row = $select_array->fetchRow()){
                    if($row[$this->foreign_keys_array[$field_name][$sub_field_value]] === $compare)                    
                        $text .= "<input class='class_radiobutton' type='radio' title='".$this->getFieldTitle($field_name)."' name='".$tag_name."' id='".$tag_name."' value='".$row[$this->foreign_keys_array[$field_name][$sub_field_value]]."' checked ".$disabled.">".$row[$this->foreign_keys_array[$field_name][$sub_field_name]]."&nbsp;";                    
                    else
                        $text .= "<input class='class_radiobutton' type='radio' title='".$this->getFieldTitle($field_name)."' name='".$tag_name."' id='".$tag_name."' value='".$row[$this->foreign_keys_array[$field_name][$sub_field_value]]."'  ".$disabled.">".$row[$this->foreign_keys_array[$field_name][$sub_field_name]]."&nbsp;";                    
                }                
            }else{
                foreach ($select_array as $val){
                    if($val === $compare){
                        $text .= "<input class='class_radiobutton' type='radio' id='".$tag_name."' name='".$tag_name."' value='".$val."' title='".$this->getFieldTitle($field_name)."' checked  ".$disabled.">".$val."&nbsp;";                    
                    }else{
                        $text .= "<input class='class_radiobutton' type='radio' id='".$tag_name."' name='".$tag_name."' value='".$val."' title='".$this->getFieldTitle($field_name)."'  ".$disabled.">".$val."&nbsp;";
                    }
                }                
            }
        }else{
            if(is_object($select_array)){
                $found = 0;
                while(($row = $select_array->fetchRow()) && (!$found)){                    
                    if($row[$this->foreign_keys_array[$field_name][$sub_field_value]] == $compare){ 
                        $text .= "<span>".$row[$this->foreign_keys_array[$field_name][$sub_field_name]]."</span>";
                        $found = 1;
                    }                        
                }
                if($found == 0) $text .= "<span>none</span>";                
            }else{
                $text = $compare;        
            }            
        }
        return $text;
    }
    
    //--------------------------------------------------------------------------
    // draw DropDownList
    //--------------------------------------------------------------------------
    function drawDropDownList($tag_name, $foo_name, &$select_array, $compare = "", $field_name="", $sub_field_value="", $sub_field_name="", $disabled=""){
        $req_print = $this->getRequestVars('print');
        $text = "";        
        if($req_print != true){
            if(is_object($select_array)){
                $text = "<select class='class_select' name='".$tag_name."' id='".$tag_name."' title='".$this->getFieldTitle($field_name)."' onChange='".(($foo_name != "") ? $this->unique_prefix.$foo_name : "")."' ".$disabled.">";
                $text .= "<option value=''>-- ".$this->lang['select']." --</option>";
                while($row = $select_array->fetchRow()){
                    if($row[$this->foreign_keys_array[$field_name][$sub_field_value]] == $compare) 
                        $text .= "<option selected value='".$row[$this->foreign_keys_array[$field_name][$sub_field_value]]."'>".$row[$this->foreign_keys_array[$field_name][$sub_field_name]]."</option>";
                    else 
                        $text .= "<option value='".$row[$this->foreign_keys_array[$field_name][$sub_field_value]]."'>".$row[$this->foreign_keys_array[$field_name][$sub_field_name]]."</option>";
                }                
            }else{
                $text = "<select class='class_select' name='".$tag_name."' id='".$tag_name."' onChange='".(($foo_name != "") ? $this->unique_prefix.$foo_name : "")."' ".$disabled.">";                                     
                foreach($select_array as $opt){
                    $text .= "<option value='".$opt."' ";
                    if($compare == $opt) $text .= "selected";
                    $text .= ">".$opt."</option>";
                }                
            }
            $text .= "</select>";
        }else{
            if(is_object($select_array)){
                $found = 0;
                while(($row = $select_array->fetchRow()) && (!$found)){                    
                    if($row[$this->foreign_keys_array[$field_name][$sub_field_value]] == $compare){ 
                        $text .= "<span>".$row[$this->foreign_keys_array[$field_name][$sub_field_name]]."</span>";
                        $found = 1;
                    }                        
                }
                if($found == 0) $text .= "<span>none</span>";                
            }else{
                $text = $compare;        
            }            
        }
        return $text;
    }

    //--------------------------------------------------------------------------
    // draw Mode Button
    //--------------------------------------------------------------------------
    function drawModeButton($mode, $mode_url, $botton_name, $alt_name, $image_file, $onClick, $div_align=false, $nbsp=""){
        $req_print = $this->getRequestVars('print');
        $mode_type = (isset($this->modes[$mode]['type'])) ? $this->modes[$mode]['type'] : "";
        if(!$this->is_error){                
            if($req_print != true){
                switch($mode_type){
                    case "button":
                        echo $nbsp."<input class='class_button' type='button' ";
                        if($div_align){ echo "style='float: "; echo ($this->direction == "rtl")?"right":"left"; echo "' "; }                    
                        echo "onClick=$onClick value='".$botton_name."' />".$nbsp;
                        break;
                    case "image": 
                        echo $nbsp."<img style='cursor:pointer;' align='middle' ";
                        if($div_align){ echo "style='float: "; echo ($this->direction == "rtl")?"right":"left"; echo "' "; }
                        echo "onClick=$onClick src='".$this->directory."images/".$this->css_class."/".$image_file."' alt='$alt_name' title='$alt_name' />".$nbsp;
                        break;                        
                    default:
                        if($div_align){ echo "<div style='float:"; echo ($this->direction == "rtl")?"right":"left"; echo ";'>"; }
                        echo $nbsp."<a class='class_a' href='$mode_url' onClick=$onClick title='$alt_name'>".$botton_name."</a>".$nbsp;
                        if($div_align) echo "</div>"; 
                        break;
                }
            }else{
                switch($mode_type){                    
                    case "button":
                        echo "<span ";
                        if($div_align){ echo "style='float: "; echo ($this->direction == "rtl")?"right":"left"; echo "' "; }                                        
                        echo ">".$botton_name."</span>";
                        break;
                    case "image":                        
                        echo "<img align='middle' ";
                        if($div_align){ echo "style='float: "; echo ($this->direction == "rtl")?"right":"left"; echo "' "; }
                        echo "src='".$this->directory."images/".$this->css_class."/".$image_file."' readonly />";
                        break;                        
                    default:
                        if($div_align){ echo "<div style='float:"; echo ($this->direction == "rtl")?"right":"left"; echo ";'>"; }
                        echo $nbsp."<span class='class_a' >".$botton_name."</span>".$nbsp;
                        if($div_align) echo "</div>"; 
                        break;
                }
            }
        }
    }

    //--------------------------------------------------------------------------
    // return last substring occurence
    //--------------------------------------------------------------------------
    function lastSubStrOccurence($string, $substring){
        $string = strrev(strtolower($string));
        $substring = strrev(strtolower($substring));
        return strpos($string, $substring);
    }

    //--------------------------------------------------------------------------
    // set Browser Definitions
    //--------------------------------------------------------------------------
    function setBrowserDefinitions(){
        $agent = $_SERVER['HTTP_USER_AGENT'];
        // initialize properties
        $bd['platform'] = "Windows";
        $bd['browser'] = "MSIE";
        $bd['version'] = "6.0";            
  
        // find operating system
        if (eregi("win", $agent))       $bd['platform'] = "Windows";
        elseif (eregi("mac", $agent))   $bd['platform'] = "MacIntosh";
        elseif (eregi("linux", $agent)) $bd['platform'] = "Linux";
        elseif (eregi("OS/2", $agent))  $bd['platform'] = "OS/2";
        elseif (eregi("BeOS", $agent))  $bd['platform'] = "BeOS";

        // test for Opera
        if (eregi("opera",$agent)){
            $val = stristr($agent, "opera");
            if (eregi("/", $val)){
                $val = explode("/",$val); $bd['browser'] = $val[0]; $val = explode(" ",$val[1]); $bd['version'] = $val[0];
            }else{
                $val = explode(" ",stristr($val,"opera")); $bd['browser'] = $val[0]; $bd['version'] = $val[1];
            }
        // test for MS Internet Explorer version 1
        }elseif(eregi("microsoft internet explorer", $agent)){
            $bd['browser'] = "MSIE"; $bd['version'] = "1.0"; $var = stristr($agent, "/");
            if (ereg("308|425|426|474|0b1", $var)) $bd['version'] = "1.5";
        // test for MS Internet Explorer
        }elseif(eregi("msie",$agent) && !eregi("opera",$agent)){
            $val = explode(" ",stristr($agent,"msie")); $bd['browser'] = $val[0]; $bd['version'] = $val[1];
        // test for MS Pocket Internet Explorer
        }elseif(eregi("mspie",$agent) || eregi('pocket', $agent)){
            $val = explode(" ",stristr($agent,"mspie")); $bd['browser'] = "MSPIE"; $bd['platform'] = "WindowsCE";
            if (eregi("mspie", $agent))
                $bd['version'] = $val[1];
            else {
                $val = explode("/",$agent);     $bd['version'] = $val[1];
            }
        // test for Firebird
        }elseif(eregi("firebird", $agent)){
            $bd['browser']="Firebird"; $val = stristr($agent, "Firebird"); $val = explode("/",$val); $bd['version'] = $val[1];
        // test for Firefox
        }elseif(eregi("Firefox", $agent)){
            $bd['browser']="Firefox"; $val = stristr($agent, "Firefox"); $val = explode("/",$val); $bd['version'] = $val[1];
        // test for Mozilla Alpha/Beta Versions
        }elseif(eregi("mozilla",$agent) && eregi("rv:[0-9].[0-9][a-b]",$agent) && !eregi("netscape",$agent)){
            $bd['browser'] = "Mozilla"; $val = explode(" ",stristr($agent,"rv:")); eregi("rv:[0-9].[0-9][a-b]",$agent,$val); $bd['version'] = str_replace("rv:","",$val[0]);
        // test for Mozilla Stable Versions
        }elseif(eregi("mozilla",$agent) && eregi("rv:[0-9]\.[0-9]",$agent) && !eregi("netscape",$agent)){
            $bd['browser'] = "Mozilla"; $val = explode(" ",stristr($agent,"rv:")); eregi("rv:[0-9]\.[0-9]\.[0-9]",$agent,$val); $bd['version'] = str_replace("rv:","",$val[0]);
        // remaining two tests are for Netscape
        }elseif(eregi("netscape",$agent)){
            $val = explode(" ",stristr($agent,"netscape")); $val = explode("/",$val[0]); $bd['browser'] = $val[0]; $bd['version'] = $val[1];
        }elseif(eregi("mozilla",$agent) && !eregi("rv:[0-9]\.[0-9]\.[0-9]",$agent)){
            $val = explode(" ",stristr($agent,"mozilla")); $val = explode("/",$val[0]); $bd['browser'] = "Netscape"; $bd['version'] = $val[1];
        }
        // clean up extraneous garbage that may be in the name
        $bd['browser'] = ereg_replace("[^a-z,A-Z]", "", $bd['browser']);
        $bd['version'] = ereg_replace("[^0-9,.,a-z,A-Z]", "", $bd['version']);
        
        // finally assign our properties
        $this->browser_name = $bd['browser'];
        $this->browser_version = $bd['version'];
        $this->platform = $bd['platform'];        
    }

    //--------------------------------------------------------------------------
    // get Protocol (http/s)
    //--------------------------------------------------------------------------
    function getProtocol(){        
        $protocol = "http://";
        if(isset($_SERVER['HTTPS']) || strtolower(substr($_SERVER['SERVER_PROTOCOL'], 0, 5)) == "https"){
            $protocol = "https://";
        }
        return $protocol;        
    }
    
    //--------------------------------------------------------------------------
    // get http port 
    //--------------------------------------------------------------------------
    function getPort(){        
        $port = "";
        if(isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] != "80"){
            $port = ":".$_SERVER['SERVER_PORT'];
        }
        return $port;        
    }    

    //--------------------------------------------------------------------------
    // set Common JavaScript
    //--------------------------------------------------------------------------
    function setCommonJavaScript(){
        echo "\n<!-- This script was generated by datagrid.class.php v.4.1.3 (http://phpbuilder.blogspot.com) -->\n";
        echo "<script type='text/javascript'>\n";
        echo "<!--//\n";
        echo "  function setCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = '; expires='+date.toGMTString();
	}
	else var expires = '';
	document.cookie = name+'='+value+expires+'; path=/';
        }
        function readCookie(name) {
	var nameEQ = name + '=';
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
        }\n";
        echo "-->\n";
        echo "</script>\n";
    }
  
    function setMediaPrint(){
        echo "<style type='text\css'> @media print { .no_print {DISPLAY: none! important};  }</style>";
    }         
        
    //--------------------------------------------------------------------------
    // set Form Checking
    //--------------------------------------------------------------------------
    function setFormChecking(){
        echo "<script type='text/javascript' src='".$this->directory."scripts/form.scripts.js'></script>\n";
    }

    //--------------------------------------------------------------------------
    // set WYSIWYG
    //--------------------------------------------------------------------------
    function setWYSIWYG(){        
        echo "<script type='text/javascript'>\n";
        echo "<!--//\n";
        echo "imagesDir = '".$this->directory."wysiwyg/icons/';\n";  // Images Directory
        echo "cssDir = '".$this->directory."wysiwyg/styles/';\n";    // CSS Directory
        echo "popupsDir = '".$this->directory."wysiwyg/popups/';\n"; // Popups Directory
        echo "-->\n";
        echo "</script>\n";
        echo "<script type='text/javascript' src='".$this->directory."wysiwyg/wysiwyg.js'></script>\n";     
    }

    //--------------------------------------------------------------------------
    // set verify JS functions
    //--------------------------------------------------------------------------
    function setVerifyJsFunctions(){
        //common js functions
        echo "\n<script type='text/javascript'>\n<!--//\n";        
        if(isset($this->modes['delete'][$this->mode]) && $this->modes['delete'][$this->mode]){
            echo "function ".$this->unique_prefix."verifyDelete(param){if(confirm('".$this->lang['delete_this_record']."')){document.location.href=param;} else { return false;}};";
        }
        if(isset($this->modes['cancel'][$this->mode]) && $this->modes['cancel'][$this->mode]){
            echo "function ".$this->unique_prefix."verifyCancel(param){if(confirm('".$this->lang['cancel_creating_new_record']."')){document.location.href=param;} else { return false;}};";
        }        
        echo "\n-->\n</script>\n";        
    }


    //--------------------------------------------------------------------------
    // set Edit Fields Form Script
    //--------------------------------------------------------------------------
    function setEditFieldsFormScript($url){
        echo "<script type='text/javascript'>\n";
        echo "<!--//\n";
        echo "function ".$this->unique_prefix."sendEditFields(){
            document.".$this->unique_prefix."frmEditRow.action ='".$url."';
            if(onSubmitCheck(document.".$this->unique_prefix."frmEditRow)){
                for (var idx=0; idx < document.".$this->unique_prefix."frmEditRow.length; idx++) {
                    field_name = ".$this->unique_prefix."frmEditRow.elements[idx].name;
                    field_full_name = 'wysiwyg' + ".$this->unique_prefix."frmEditRow.elements[idx].name;
                    if(document.getElementById(field_full_name)){        
                        document.getElementById(field_name).value = document.getElementById(field_full_name).contentWindow.document.body.innerHTML;
                    }
                };   
                document.".$this->unique_prefix."frmEditRow.submit();
            }else{
                return false;
            }
        }\n";
        echo "-->\n";
        echo "</script>\n";
    }  
    
    //--------------------------------------------------------------------------
    // set Calendar
    //--------------------------------------------------------------------------
    function setCalendar(){
        echo "<script type='text/javascript'>\n";
        echo "<!--//\n";
        echo "function ".$this->unique_prefix."openCalendar(params, form, req_type, field, type) {
            window.open('".$this->directory."scripts/calendar.php?' + params, 'calendar', 'width=220,height=240,status=yes');
            dateField = eval('document.' + form + '.' + req_type + field);
            dateType = type;
        }\n";
        echo "-->\n";
        echo "</script>";        
    }

    //--------------------------------------------------------------------------
    // return date format
    //--------------------------------------------------------------------------
    function myDate($field_value, $type="datedmy"){
        $ret_date = "";
        if($type == "datedmy"){
            $year1   = substr(trim($field_value), 0, 4);
            $month1  = substr(trim($field_value), 5, 2);
            $day1    = substr(trim($field_value), 8, 2);    
            if($day1 != ""){
                $ret_date = $day1."-".$month1."-".$year1;
            }                                    
        }else if($type == "datetimedmy"){
            $year1   = substr(trim($field_value), 0, 4);
            $month1  = substr(trim($field_value), 5, 2);
            $day1    = substr(trim($field_value), 8, 2);
            $time1   = substr(trim($field_value), 11, 2);
            $time2   = substr(trim($field_value), 14, 2);
            $time3   = substr(trim($field_value), 17, 2);    
            if($day1 != ""){
                $ret_date = $day1."-".$month1."-".$year1." ".$time1.":".$time2.":".$time3;
            }                        
        }else{
            $ret_date = $field_value;            
        }
        return $ret_date;
    }

    //--------------------------------------------------------------------------
    // set Language
    //--------------------------------------------------------------------------
    function setInterfaceLang($lang_name = "en"){
        $default_language = false;
	if (file_exists($this->directory.'languages/lang.php')) { 
	    include_once($this->directory.'languages/lang.php');
            $this->lang_name = (strlen($lang_name) == 2) ? $lang_name : "en";
            if (function_exists('setLanguage')) {
                $this->lang = setLanguage($this->lang_name);
            }else{
	       echo "<label class='class_error_message'>Your language interface option is turned on, but the system was failed to open correctly stream: <b>'".$this->directory."languages/lang.php'</b>. <br>The structure of the file is corrupted or invalid. Please check it or return the language option to default value: <b>'en'</b>!</label><br>";
               $default_language = true;
            }
	} else { 
            if (strtolower($lang_name) != "en"){
	       echo "<label class='class_error_message'>Your language interface option is turned on, but the system was failed to open stream: <b>'".$this->directory."languages/lang.php'</b>. <br>No such file or directory. Please check it or return the language option to default value: <b>'en'</b>!</label><br>";  
               $default_language = true;
            }
	}
        if($default_language){        
            $this->lang['add'] = "Add";
            $this->lang['add_new'] = "+ Add New";
            $this->lang['add_new_record'] = "Add new record";
            $this->lang['adding_operation_completed'] = "The adding operation completed successfully!";
            $this->lang['adding_operation_uncompleted'] = "The adding operation uncompleted!";                                    
            $this->lang['and'] = "and";
            $this->lang['any'] = "any";                         
            $this->lang['ascending'] = "Ascending"; 
            $this->lang['back'] = "Back";
            $this->lang['cancel'] = "Cancel";
            $this->lang['cancel_creating_new_record'] = "Are you sure you want to cancel creating new record?";
            $this->lang['check_all'] = "Check All";
            $this->lang['create'] = "Create";
            $this->lang['create_new_record'] = "Create new record";            
            $this->lang['current'] = "current";
            $this->lang['delete'] = "Delete";
            $this->lang['delete_record'] = "Delete record";
            $this->lang['delete_selected'] = "Delete selected";
            $this->lang['delete_selected_records'] = "Are you sure you want to delete the selected records?";
            $this->lang['delete_this_record'] = "Are you sure you want to delete this record?";                             
            $this->lang['deleting_operation_completed'] = "The deleting operation completed successfully!";
            $this->lang['deleting_operation_uncompleted'] = "The deleting operation uncompleted!";                                    
            $this->lang['descending'] = "Descending";
            $this->lang['details'] = "Details";
            $this->lang['edit'] = "Edit";                
            $this->lang['edit_record'] = "Edit record";
            $this->lang['export_to_excel'] = "Export to Excel";
            $this->lang['export_to_xml'] = "Export to XML";            
            $this->lang['field'] = "Field";
            $this->lang['field_value'] = "Field Value";
            $this->lang['file_opening_error'] = "Cannot open a file. Check your permissions.";            
            $this->lang['file_writing_error'] = "Cannot write to file. Check writing permissions.";
            $this->lang['file_invalid file_size'] = "Invalid file size: ";
            $this->lang['file_uploading_error'] = "There was an error while uploading, please try again!";
            $this->lang['first'] = "first";
            $this->lang['hide_search'] = "Hide Search";
            $this->lang['last'] = "last";
            $this->lang['like'] = "like";
            $this->lang['max'] = "max";                            
            $this->lang['next'] = "next";
            $this->lang['no'] = "No";
            $this->lang['no_data_found'] = "No data found";
            $this->lang['no_data_found_error'] = "No data found! Please, check carefully your code syntax!<br />It may be case sensitive or there are some unexpected symbols.";                                
            $this->lang['no_image'] = "No Image";
            $this->lang['not_like'] = "not like";
            $this->lang['of'] = "of";
            $this->lang['or'] = "or";                                                
            $this->lang['pages'] = "Pages";                    
            $this->lang['page_size'] = "Page size";
            $this->lang['previous'] = "previous";
            $this->lang['printable_view'] = "Printable View";
            $this->lang['print_now'] = "Print Now";            
            $this->lang['print_now_title'] = "Click here to print this page";
            $this->lang['record_n'] = "Record # ";
            $this->lang['remove'] = "Remove";            
            $this->lang['results'] = "Results";
            $this->lang['required_fields_msg'] = "Items marked with a <font color='#cd0000'>*</font> are required";            
            $this->lang['search'] = "Search";
            $this->lang['search_d'] = "Search"; // (description)
            $this->lang['search_type'] = "Search type";
            $this->lang['select'] = "select";
            $this->lang['set_date'] = "Set date";
            $this->lang['total'] = "Total";
            $this->lang['uncheck_all'] = "Uncheck All";
            $this->lang['unhide_search'] = "Unhide Search";
            $this->lang['update'] = "Update";
            $this->lang['update_record'] = "Update record";
            $this->lang['updating_operation_completed'] = "The updating operation completed successfully!";
            $this->lang['updating_operation_uncompleted'] = "The updating operation uncompleted!";                                    
            $this->lang['upload'] = "Upload";            
            $this->lang['view'] = "View";
            $this->lang['view_details'] = "View details";
            $this->lang['with_selected'] = "With selected";
            $this->lang['wrong_field_name'] = "Wrong field name";
            $this->lang['yes'] = "Yes";
        }
    }

}// end class

?>     
