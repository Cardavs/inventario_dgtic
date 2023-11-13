<?php

/**********************
 * pantalla: logIn     *
 * date: 28/02/2023    *
 * autor: Roan         *
 ***********************/

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['rol'] != 'administrador') {
    session_destroy();

    // Redirige al usuario al login
    header("Location: /inventario_dgtic/index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<?php include(LAYOUT . '/head.php'); ?>

<body>
    <?php include(LAYOUT . '/header.php'); ?>
    <?php include(LAYOUT . "/navbar-users/navbarAdmin.php"); ?>

    <div class="container caja_welcome">
        <h1 class="container col-sm-12 col-md-4">Bienvenid@ <?php echo $_SESSION['nombre'] ?></h1>
    </div>

    <?php include(LAYOUT . '/footer.php'); ?>
</body>

</html>