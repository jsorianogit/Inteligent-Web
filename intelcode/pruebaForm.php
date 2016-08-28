<?php
require_once("rpcl/rpcl.inc.php");
//Includes
use_unit("forms.inc.php");
use_unit("extctrls.inc.php");
use_unit("stdctrls.inc.php");
use_unit("dbtables.inc.php");
use_unit("db.inc.php");
use_unit("dbgrids.inc.php");

//Class definition
class Unit1 extends Page
{
    public $sDescripcion1 = null;
    public $dCantidad1 = null;
    public $personal1 = null;
    public $dspersonal1 = null;
    public $tbpersonal1 = null;
    public $dblancia1 = null;
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
