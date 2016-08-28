<?php
set_time_limit(0);
require ("keys.inc.php");
require ("configEjecutar.inc.php");
$claves = new ejecutor();
$claves->leeDir($pathFileSql);
location("../menu/");
?>