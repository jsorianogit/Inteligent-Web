<?php

// Configure

include_once("support/Untitled2.config.php");

// Define page class

class TUntitled2 extends TTpPage
{




  function TpButton1Click(&$inSender)
  {
    echo $inSender->Caption;
  }
}

// Create and display page

$Untitled2 = new TUntitled2($tpTemplateFile);
$Untitled2->Run();

?>
