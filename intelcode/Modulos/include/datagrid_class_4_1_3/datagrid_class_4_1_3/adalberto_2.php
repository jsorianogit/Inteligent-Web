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
  $DB_NAME='localhost_db';         /* usually like this: prefix_dbName           */

  ob_start();
##  (example of ODBC connection string)
##  $myDB =& DB::factory('odbc');       
##  $myDB -> connect(DB::parseDSN('odbc://root:12345@test_db')); 
##  (examples of connections to another db types see in "docs/db_odbtp.htm" file
##  or check the latest version on - http://odbtp.sourceforge.net/DB_odbtp.html)
  $db_conn =& DB::factory('mysql'); 
  $db_conn -> connect(DB::parseDSN('mysql://'.$DB_USER.':'.$DB_PASS.'@'.$DB_HOST.'/'.$DB_NAME));
##  *** put a primary key on the first place 
  $sql=" SELECT "
   ."tblCountries.CountryID, "
   ."tblCountries.RegionID, "
   ."tblRegions.Name as Region, "
   ."tblCountries.Name, "
   ."tblCountries.Description, "
   ."tblCountries.PictureURL, "
   ."FORMAT(tblCountries.Population, 0) as Population, "   
   ."(SELECT COUNT(tblPresidents.presidentID) FROM tblPresidents WHERE tblPresidents.CountryID = tblCountries.CountryID) as Presidents, "
   ." CASE WHEN tblCountries.is_democracy = 1 THEN 'Yes' ELSE 'No' END as is_democracy "
   ."FROM tblCountries INNER JOIN tblRegions ON tblCountries.RegionID=tblRegions.RegionID ";
##  *** set needed options
  $debug_mode = false;
  $messaging = true;
  $unique_prefix = "f_";  
  $dgrid = new DataGrid($debug_mode, $messaging, $unique_prefix, DATAGRID_DIR);
##  *** set data source with needed options
  $default_order_field = "CountryID";
  $default_order_type = "DESC";
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
  $dg_language = "en";  // (en) - English, (de) - German, (hr) - Bosnian/Croatian 
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
      "details"=>array("view"=>true, "edit"=>false, "type"=>"link"),
      "delete"=>array("view"=>true, "edit"=>true, "type"=>"image")
  );
  $dgrid->setModes($modes);
##  *** allow scrolling on datagrid
//  $scrolling_option = true;
//  $dgrid->allowScrollingSettings($scrolling_option);  
##  *** set scrolling settings (optional)
//  $scrolling_width = "90%";
//  $scrolling_height = "200px";
//  $dgrid->setScrollingSettings($scrolling_width, $scrolling_height);
##  *** allow mulirow operations
  $multirow_option = true;
  $dgrid->allowMultirowOpeartions($multirow_option);
##  *** set CSS class for datagrid: 
  $css_class = "default"; // "default" or "blue" or "gray" or "green" or your css file relative path with name
  $css_type = "embedded"; // "embedded" - use embedded classes, "file" - link external css file
  $dgrid->setCssClass($css_class, $css_type);
##  *** set variables that used to get access to the page (like: my_page.php?act=34&id=56 etc.) 
  $http_get_vars = array("act");
  $dgrid->setHttpGetVars($http_get_vars);
##  *** set another datagrid/s unique prefixes (if you use few datagrids on one page)
##  *** format: array("unique_prefix"=>array("view"=>true|false, "edit"=>true|false, "details"=>true|false));
  $anotherDatagrids = array("fp_"=>array("view"=>false, "edit"=>true, "details"=>true));
  $dgrid->setAnotherDatagrids($anotherDatagrids);  
##  *** set DataGrid caption
  $dg_caption = "My Favorite Lovely PHP DataGrid";
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
      "Country"     =>array("table"=>"tblCountries", "field"=>"Name", "source"=>"self", "operator"=>true, "default_operator"=>"like", "type"=>"textbox", "case_sensitive"=>true,  "comparison_type"=>"string"),
      "Region"      =>array("table"=>"tblRegions",   "field"=>"Name", "source"=>"self", "order"=>"DESC", "operator"=>true, "type"=>"dropdownlist", "case_sensitive"=>false,  "comparison_type"=>"binary"),
      "Date"        =>array("table"=>"tblCountries", "field"=>"PictureURL", "source"=>"self", "operator"=>true, "type"=>"textbox", "case_sensitive"=>false,  "comparison_type"=>"binary"),      
      "Population"  =>array("table"=>"tblCountries", "field"=>"Population", "source"=>$fill_from_array, "order"=>"DESC", "operator"=>true, "type"=>"dropdownlist", "case_sensitive"=>false, "comparison_type"=>"numeric")
  );
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
      "Region"      =>array("header"=>"Region Name",     "width"=>"130px", "type"=>"label", "align"=>"left",   "wrap"=>"nowrap", "text_length"=>"-1", "case"=>"normal"),
      "Name"        =>array("header"=>"Country Name",    "width"=>"130px",  "type"=>"label", "align"=>"left",   "wrap"=>"nowrap", "text_length"=>"-1", "case"=>"normal"),
      "Population"  =>array("header"=>"Population",       "type"=>"label", "summarize"=>true, "align"=>"right",  "wrap"=>"nowrap", "text_length"=>"-1", "case"=>"normal"),
      "Presidents"  =>array("header"=>"Presidents",       "type"=>"label", "summarize"=>true, "align"=>"right",  "wrap"=>"nowrap", "text_length"=>"-1", "case"=>"normal"),
      "Description" =>array("header"=>"Short Description","type"=>"label", "align"=>"left",   "wrap"=>"wrap",   "text_length"=>"30", "case"=>"lower"),
      "PictureURL"  =>array("header"=>"Picture",          "type"=>"link",  "align"=>"center", "wrap"=>"nowrap", "text_length"=>"-1",  "field_key"=>"PictureURL", "field_data"=>"PictureURL", "href"=>"uploads/{0}", "target"=>"_new", "case"=>"normal")
  );
  $dgrid->setColumnsInViewMode($vm_colimns);
##
##
## +---------------------------------------------------------------------------+
## | 7. Edit/Details Mode settings:                                            | 
## +---------------------------------------------------------------------------+
##  ***  set settings for edit/details mode 
  $table_name = "tblCountries";
  $primary_key = "CountryID";  
  $dgrid->setTableEdit($table_name, $primary_key);
##  *** set columns in edit mode
##  *** first letter: r - required, s - simple (not required)
##  *** second letter: t - text(including datetime), n - numeric, a - alphanumeric, e - email, f - float, y -any, l - login, p - password, i - integer, v - verified
##  *** width - optional
  $em_columns = array(
        "RegionID"        =>array("header"=>"Region",           "type"=>"textbox",  "width"=>"210px", "req_type"=>"rt", "title"=>"Region Name"),
        "Name"            =>array("header"=>"Country",          "type"=>"textbox",  "width"=>"210px", "req_type"=>"ry", "title"=>"Country Name"),
        "Description"     =>array("header"=>"Short Descr.",     "type"=>"textarea", "width"=>"210px", "req_type"=>"rt", "title"=>"Short Description", "edit_type"=>"wysiwyg"),
        "Population"      =>array("header"=>"Peoples",          "type"=>"enum",     "source"=>$fill_from_array, "view_type"=>"dropdownlist",  "width"=>"139px", "req_type"=>"ri", "title"=>"Population (Peoples)"),
        "PictureURL"      =>array("header"=>"Image URL",        "type"=>"file",     "target_path"=>"uploads/", "max_file_size"=>"8000", "width"=>"210px", "req_type"=>"st", "title"=>"Image URL"),
        "is_democracy"    =>array("header"=>"Is Democracy",     "type"=>"checkbox", "true_value"=>1, "false_value"=>0,  "width"=>"210px", "req_type"=>"sy", "title"=>"Is Democraty"),
        "independentDate" =>array("header"=>"Independence Day", "type"=>"date",     "width"=>"210px", "req_type"=>"rt", "title"=>"Independence Day")
  );
  $dgrid->setColumnsInEditMode($em_columns);
##  *** set foreign keys for edit/details mode (if there are linked tables)
  $foreign_keys = array(
      "RegionID"=>array("table"=>"tblRegions", "field_key"=>"RegionID", "field_name"=>"Name", "view_type"=>"dropdownlist")
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


// if we in EDIT mode of the first datagrid
if(isset($_GET['f_mode']) && (($_GET['f_mode'] == "edit") || ($_GET['f_mode'] == "details"))){

    ################################################################################       
    ## +---------------------------------------------------------------------------+
    ## | 1. Creating & Calling:                                                    | 
    ## +---------------------------------------------------------------------------+
    
      ob_start();
    ##  *** put a primary key on the first place 
      $sql=" SELECT "
       ."tblPresidents.presidentID, "
       ."tblPresidents.CountryID, "
       ."tblPresidents.Name, "
       ."tblPresidents.BirthDate, "
       ."tblPresidents.Status "
       ."FROM tblPresidents INNER JOIN tblCountries ON tblPresidents.CountryID=tblCountries.CountryID "       
       ."WHERE tblPresidents.CountryID = ".$dgrid->rid." ";
       
    ##  *** set needed options
      $debug_mode = false;
      $messaging = true;
      $unique_prefix = "fp_";  
      $dgrid1 = new DataGrid($debug_mode, $messaging, $unique_prefix, DATAGRID_DIR);
    ##  *** set data source with needed options
      $default_order_field = "presidentID";
      $default_order_type = "DESC";
      $dgrid1->dataSource($db_conn, $sql, $default_order_field, $default_order_type);	    
    ##
    ##
    ## +---------------------------------------------------------------------------+
    ## | 2. General Settings:                                                      | 
    ## +---------------------------------------------------------------------------+
    ##  *** set encoding (default - utf8)
      $dg_encoding = "utf8"; 
      $dgrid1->setEncoding($dg_encoding);
    ##  *** set interface language (default - English)
      $dg_language = "en";  // (en) - English, (de) - German, (hr) - Bosnian/Croatian 
      $dgrid1->setInterfaceLang($dg_language);
    ##  *** set direction: "ltr" or "rtr" (default - "ltr")
      $direction = "ltr";
      $dgrid1->setDirection($direction);
    ##  *** set layouts: 0 - tabular(horizontal) - default, 1 - columnar(vertical) 
      $layouts = array("view"=>0, "edit"=>0, "filter"=>1); 
      $dgrid1->setLayouts($layouts);
    ##  *** set other modes ("type" => "link|button|image") 
    ##  *** "byFieldValue"=>"fieldName" - make the field to be a link to edit mode page
      if($_GET['f_mode'] == "edit"){    
        $modes = array(
            "add"=>array("view"=>true, "edit"=>false, "type"=>"link"),
            "edit"=>array("view"=>true, "edit"=>true, "type"=>"link", "byFieldValue"=>""),
            "cancel"=>array("view"=>true, "edit"=>true, "type"=>"link"),
            "details"=>array("view"=>false, "edit"=>false, "type"=>"link"),
            "delete"=>array("view"=>true, "edit"=>false, "type"=>"image")
        );
      }else{
        $modes = array(
            "add"=>array("view"=>false, "edit"=>false, "type"=>"link"),
            "edit"=>array("view"=>false, "edit"=>false, "type"=>"link", "byFieldValue"=>""),
            "cancel"=>array("view"=>false, "edit"=>true, "type"=>"link"),
            "details"=>array("view"=>false, "edit"=>false, "type"=>"link"),
            "delete"=>array("view"=>false, "edit"=>false, "type"=>"image")
        );
      }
      $dgrid1->setModes($modes);
    ##  *** allow scrolling on datagrid
    //  $scrolling_option = true;
    //  $dgrid1->allowScrollingSettings($scrolling_option);  
    ##  *** set scrolling settings (optional)
    //  $scrolling_width = "90%";
    //  $scrolling_height = "200px";
    //  $dgrid1->setScrollingSettings($scrolling_width, $scrolling_height);
    ##  *** allow mulirow operations
      $multirow_option = true;
      $dgrid1->allowMultirowOpeartions($multirow_option);
    ##  *** set CSS class for datagrid: 
      $css_class = "default"; // "default" or "gray" or "like adwords" or "salomon" or your css file relative path with name
      $css_type = "embedded"; // "embedded" - use embedded classes, "file" - link external css file
      $dgrid1->setCssClass($css_class, $css_type);
    ##  *** set variables that used to get access to the page (like: my_page.php?act=34&id=56 etc.) 
      $http_get_vars = array("act");
      $dgrid1->setHttpGetVars($http_get_vars);
    ##  *** set another datagrid/s unique prefixes (if you use few datagrids on one page)
    ##  *** format: array("unique_prefix"=>array("view"=>true|false, "edit"=>true|false, "details"=>true|false));
      $anotherDatagrids = array("f_"=>array("view"=>true, "edit"=>true, "details"=>true));
      $dgrid1->setAnotherDatagrids($anotherDatagrids);  
    ##  *** set DataGrid caption
      $dg_caption = "Presidents";
      $dgrid1->setCaption($dg_caption);
    ##
    ##
    ## +---------------------------------------------------------------------------+
    ## | 3. Printing & Exporting Settings:                                         | 
    ## +---------------------------------------------------------------------------+
    ##  *** set printing option: true(default) or false 
      $printing_option = false;
      $dgrid1->allowPrinting($printing_option);
    ##  *** set exporting option: true(default) or false 
      $exporting_option = false;
      $dgrid1->allowExporting($exporting_option);
    ##
    ##
    ## +---------------------------------------------------------------------------+
    ## | 4. Sorting & Paging Settings:                                             | 
    ## +---------------------------------------------------------------------------+
    ##  *** set sorting option: true(default) or false 
      $sorting_option = true;
      $dgrid1->allowSorting($sorting_option);               
    ##  *** set paging option: true(default) or false 
      $paging_option = true;
      $rows_numeration = false;
      $numeration_sign = "N #";       
      $dgrid1->allowPaging($paging_option, $rows_numeration, $numeration_sign);
    ##  *** set paging settings
      $bottom_paging = array();
      $top_paging = array();
      $pages_array = array(10, 25, 50, 100, 250, 500, 1000);
      $default_page_size = 10;
      $dgrid1->setPagingSettings($bottom_paging, $top_paging, $pages_array, $default_page_size);
    ##
    ##
    ## +---------------------------------------------------------------------------+
    ## | 6. View Mode Settings:                                                       | 
    ## +---------------------------------------------------------------------------+
    ##  *** set table properties
      $vm_table_properties = array("width"=>"70%");
      $dgrid1->setViewModeTableProperties($vm_table_properties);  
    ##  *** set columns in view mode
      $vm_colimns = array(
          "Name"       =>array("header"=>"Name",        "type"=>"lable", "align"=>"left",  "wrap"=>"wrap",   "text_length"=>"20", "case"=>"normal"),
          "BirthDate"  =>array("header"=>"Birth Date",  "type"=>"label", "align"=>"center",  "wrap"=>"nowrap", "text_length"=>"-1", "case"=>"normal"),
          "Status"     =>array("header"=>"Status",      "type"=>"label", "align"=>"center",  "wrap"=>"nowrap", "text_length"=>"30", "case"=>"normal")
      );
      $dgrid1->setColumnsInViewMode($vm_colimns);
    ##
    ##
    ## +---------------------------------------------------------------------------+
    ## | 7. Edit/Details Mode settings:                                            | 
    ## +---------------------------------------------------------------------------+
    ##  ***  set settings for edit/details mode 
      $table_name = "tblPresidents";
      $primary_key = "presidentID";  
      $dgrid1->setTableEdit($table_name, $primary_key);
    ##  *** set columns in edit mode
    ##  *** first letter: r - required, s - simple (not required)
    ##  *** second letter: t - text(including datetime), n - numeric, a - alphanumeric, e - email, f - float, y -any, l - login, p - password, i - integer, v - verified
    ##  *** width - optional
      $em_columns = array(
            "CountryID"  =>array("header"=>"Country",    "type"=>"textbox",  "width"=>"210px", "req_type"=>"ri", "title"=>"Country"),      
            "Name"       =>array("header"=>"Name",       "type"=>"textbox",  "width"=>"140px", "req_type"=>"ry", "title"=>"Name"),
            "BirthDate"  =>array("header"=>"Birth Date", "type"=>"date",     "width"=>"80px", "req_type"=>"rt", "title"=>"Birth Date"),
            "Status"     =>array("header"=>"Status",     "type"=>"enum",     "width"=>"210px", "req_type"=>"st", "title"=>"Status")
      );
      $dgrid1->setColumnsInEditMode($em_columns);
    ##  *** set foreign keys for edit/details mode (if there are linked tables)
      $foreign_keys = array(
          "CountryID"=>array("table"=>"tblCountries ", "field_key"=>"CountryID", "field_name"=>"Name", "view_type"=>"dropdownbox", "condition"=>"")
      ); 
      $dgrid1->setForeignKeysEdit($foreign_keys);
    ##
    ##
    ## +---------------------------------------------------------------------------+
    ## | 8. Bind the DataGrid:                                                     | 
    ## +---------------------------------------------------------------------------+
    ##  *** set debug mode & messaging options
      $dgrid1->bind();        
      ob_end_flush();
    ##
    ################################################################################   
    
}

?>

</body>
</html>