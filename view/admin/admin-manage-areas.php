<?php

/*********************************
 * pantalla: Gestionar diplomados *
 * date: 21/03/2023               *
 * autor: Roan                    *
 **********************************/
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['rol'] != 'administrador') {
    session_destroy();

    // Redirige al usuario al login
    header("Location: /inventario_dgtic/index.php");
    exit();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
include_once(CONNECTION_BD);
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']); // Limpia la variable de sesión después de usarla

    echo '<script language="javascript">
        alert("' . $message . '");
        </script>';
}
?>

<!DOCTYPE html>
<html lang="es">
<?php include(LAYOUT . '/head.php'); ?>

<body>
    <?php include(LAYOUT . '/header.php'); ?>
    <?php include(LAYOUT . "/navbar-users/navbarAdmin.php"); ?>

    <?php include(LAYOUT . "/templates/manage-areas.php"); ?>

    <?php include(LAYOUT . '/footer.php'); ?>
</body>

</html>