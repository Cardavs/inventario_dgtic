<?php

/*********************************
 * pantalla: Gestionar diplomados *
 * date: 23/03/2023               *
 * autor: Roan                    *
 **********************************/
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['rol'] != 'editor') {
    session_destroy();

    // Redirige al usuario al login
    header("Location: /inventario_dgtic/index.php");
    exit();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
?>

<!DOCTYPE html>
<html lang="es">
<?php include(LAYOUT . '/head.php'); ?>

<body>
    <?php include(LAYOUT . '/header.php'); ?>
    <?php include(LAYOUT . "/navbar-users/navbarEditor.php"); ?>

    <?php include(LAYOUT . "/templates/manage-diplomados.php"); ?>

    <?php include(LAYOUT . '/footer.php'); ?>
</body>

</html>