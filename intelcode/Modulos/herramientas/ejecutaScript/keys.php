<?php
set_time_limit(0);
require ("keys.inc.php");
$claves = new keys();
$claves->setInfoCon("root","","localhost");
$claves->setData("intelcode");
$claves->showKeys();
?>