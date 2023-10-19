<?php

/********************************
 * pantalla: registrar material *
 * date: 09/03/2023             *
 * autor: Roan                  *
 ********************************/

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');

include(CONNECTION_BD);
include(VALIDATION_PHP . '/validate-createMaterial.php');
include(BD_SELECT . 'select-section.php');
include(BD_SELECT . 'select-area.php');


$datosSeccion = new SelectSection();
$datosArea = new SelectAreas();
$secciones = $datosSeccion->getSection();
$areas = $datosArea->getAreas();
?>

<!DOCTYPE html>
<html lang="es">
<?php include(LAYOUT . '/head.php'); ?>

<body>
    <?php include(LAYOUT . '/header.php'); ?>
    <?php include(LAYOUT . '/navbar-users/navbarAdmin.php'); ?>  

    <?php include(LAYOUT . '/manage-material/material-register.php'); ?>

    <?php include(LAYOUT . '/footer.php'); ?>
</body>

</html>