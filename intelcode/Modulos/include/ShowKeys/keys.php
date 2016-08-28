<?php
set_time_limit(0);
require ("keys.inc.php");
$claves = new keys();
$claves->setInfoCon("root","danae","localhost");
$claves->setData("inteligent");
$claves->showKeys();
?>
