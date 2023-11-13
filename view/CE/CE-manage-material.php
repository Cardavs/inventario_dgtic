<?php

/*********************************
 * pantalla: administrar material*
 * date: 29/03/2023              *
 * autor: Roan                   *
 *********************************/

 session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['rol'] != 'CE') {
    session_destroy();

    // Redirige al usuario al login
    header("Location: /inventario_dgtic/index.php");
    exit();
}

 include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
 include(CONNECTION_BD);

 include(BD_SELECT . 'select-material.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <?php include(LAYOUT."/head.php");?>
</head>
<body>
    <?php include(LAYOUT."/header.php");?>
    <?php include(LAYOUT."/navbar-users/navbarCE.php");?>
    <h2 class="titulo">Descarga y Consulta de Material</h2>
    <div class="container search">
        <form class="d-flex col-md-2 form-search needs-validation text-container" role="search" novalidate method="POST">
            <input class="form-control me-2 text-center" type="text" placeholder="Busqueda" name="Busqueda" id="Busqueda" required>
            <select class="form-select me-2 text-center" name="Filas" id="Filas" placeholder="Filas" required>
                <option value="">Filas a mostrar</option>
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="50">50</option>
                <option value="100">100</option>
                <option value="500">500</option>
                <option value="1000">1000</option>
            </select>
            <div class="invalid-feedback">
                Es necesario colocar al menos un filtro.
            </div>
            <button class="btn btn-primary" type="submit" name="searchInput">Buscar</button>
        </form>
    </div>
    <script src="/inventario_dgtic/controllers/validation/js/form-validation-empty.js"></script>
    <?php include(VALIDATION_PHP . '/validate-searchMaterial.php'); ?>
    <?php include(LAYOUT."/templates/manage-material-templateCE.php");?>
    <?php include(LAYOUT."/footer.php");?>
</body>
</html>