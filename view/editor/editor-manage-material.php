<?php

/*********************************
 * pantalla: administrar material*
 * date: 24/03/2023              *
 * autor: Roan                   *
 *********************************/
session_start();
if (!isset($_SESSION['nombre']) || $_SESSION['rol'] != 'editor') {
    session_destroy();

    // Redirige al usuario al login
    header("Location: /inventario_dgtic/index.php");
    exit();
}
include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
include(CONNECTION_BD);

include(BD_SELECT . 'select-material.php');


/* INSTANCIA PARA LA CLASE "SelectMaterials"*/
$materials = new SelectMaterials();
//Llamás al método sedes y guardar los datos en la variable "infoSedes"
$infoMaterials = $materials->getMaterials();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include(LAYOUT . "/head.php"); ?>
</head>

<body>
    <?php include(LAYOUT . "/header.php"); ?>
    <?php include(LAYOUT . "/navbar-users/navbarEditor.php"); ?>

    <h2 class="titulo">Gestionar Material</h2>
    <div class="container search">
        <a href="/inventario_dgtic/view/editor/editor-material-register.php">
            <button class="btn btn-primary btn-subir-material" type="button">Subir Material</button>
        </a>
        <form class="d-flex col-md-2 form-search needs-validation text-container" role="search" novalidate>
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" required>
            <div class="invalid-feedback">
                Es necesario colocar un filtro.
            </div>
            <button class="btn btn-primary" type="submit">Buscar</button>
        </form>
    </div>
    <?php include(LAYOUT . "/templates/manage-material-template.php"); ?>
    <script src="/inventario_dgtic/controllers/validation/js/form-validation-empty.js"></script>
    <?php include(LAYOUT . "/footer.php"); ?>
</body>

</html>