<?php

/*********************************
 * pantalla: administrar material*
 * date: 28/03/2023              *
 * autor: Roan                   *
 *********************************/

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(LAYOUT."/head.php");?>
</head>
<body>
    <?php include(LAYOUT."/header.php");?>
    <?php include(LAYOUT."/navbar-users/navbarConsultor.php");?>
    <h2 class="titulo">Gestionar Material</h2>
    <div class="container search">
        <a href="/inventario_dgtic/view/consultor/consultor-material-register.php">
            <button class="btn btn-primary btn-subir-material" type="button">Subir Material</button>
        </a>
        <form class="d-flex col-md-2 form-search" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </form>
    </div>
    <?php include(LAYOUT."/templates/manage-material-template.php");?>

    <?php include(LAYOUT."/footer.php");?>
</body>
</html>