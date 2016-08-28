<?php
  require_once("vcl/vcl.inc.php");
  use_unit("designide.inc.php");

    setPackageTitle("Package that contain Line");
  //Change this setting to the path where the icons for the components reside
  setIconPath("./icons");

  //Change yourunit.inc.php to the php file which contains the component code
  registerComponents("Standard",array("line"),"/line/line.inc.php");
?>
