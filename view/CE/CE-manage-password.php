<?php

/**********************************
 * pantalla: Configurar password  *
 * date: 29/03/2023               *
 * autor: Roan                    *
 **********************************/
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['rol'] != 'CE') {
    session_destroy();

    // Redirige al usuario al login
    header("Location: /inventario_dgtic/index.php");
    exit();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
include(CONNECTION_BD);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(LAYOUT."/head.php");?>
</head>
<body>
    <?php include(LAYOUT."/header.php");?>
    <?php include(LAYOUT."/navbar-users/navbarCE.php");?>

    <?php include(LAYOUT."/templates/manage-password.php"); ?>
    
    <?php include(LAYOUT."/footer.php");?>
</body>
</html>