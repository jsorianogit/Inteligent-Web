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
?>

</body>
</html>