<?php
require_once("rpcl/rpcl.inc.php");
//Includes
require_once("rpcl/rpcl.inc.php");
use_unit("comctrls.inc.php");
use_unit("chart.inc.php");
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("dbtables.inc.php");
use_unit("dbgrids.inc.php");

//Class definition
class Unit1 extends Page
{
    public $SimpleChart1 = null;
    public $DBGrid1 = null;
    function Unit1AfterShow($sender, $params)
    {
          $this->SimpleChart1->Chart->addPoint(new Point("", 23));
          $this->SimpleChart1->Chart->addPoint(new Point("", 12));
          $this->SimpleChart1->Chart->addPoint(new Point("", 45));
    }
}

global $application;

global $Unit1;

//Creates the form
$Unit1=new Unit1($application);

//Read from resource file
$Unit1->loadResource(__FILE__);

//Shows the form
$Unit1->show();

?>
