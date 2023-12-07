<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
include_once(CONNECTION_BD);

include(BD_SELECT . 'select-section.php');


$seccion = new SelectSection();
$infoSecciones = $seccion->getSection();
header('Content-Type: application/json');
$jsonData = json_encode($infoSecciones);
echo $jsonData;
?>