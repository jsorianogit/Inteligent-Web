<?php
set_time_limit(0);
require ("keys.inc.php");
$claves = new keys();
$claves->setInfoCon("root","danae","localhost");
$claves->setData("intelcode");
if (is_uploaded_file($HTTP_POST_FILES['archivo']['tmp_name'])) {
	copy($HTTP_POST_FILES['archivo']['tmp_name'], $HTTP_POST_FILES['archivo']['name']);
    $subio = true;
}

if($subio) {
//    echo "El archivo subio con exito";
    $claves->readFile($HTTP_POST_FILES['archivo']['name']);
} else {
    echo "El archivo no cumple con las reglas establecidas";
}

?>