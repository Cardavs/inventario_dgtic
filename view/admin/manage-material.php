<?php

/*********************************
 * pantalla: administrar material*
 * date: 10/03/2023              *
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
    <?php include(LAYOUT."/navbar-users/navbarAdmin.php");?>

    <h2 class="titulo">Gestionar Material</h2>
    
    <div class="container search">
        <a href="/inventario_dgtic/view/layouts/manage-material/material-register.php">
            <button class="btn btn-primary btn-subir-material" type="button">Subir Material</button>
        </a>
        <form class="d-flex col-md-2 form-search" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-primary" type="submit">Buscar</button>
        </form>
    </div>

    <div class="container sombra gestionar-material">
        <table class="table">
            <thead class="encabezado">
                <tr>
                    <th scope="col">Nombre de material</th>
                    <th scope="col">Año</th>
                    <th scope="col">Autor</th>
                    <th scope="col">Versión</th>
                    <th scope="col"> </th>
                </tr>
            </thead>
            <tbody>
                <tr scope="col">
                    <th>Material 1</th>
                    <td>2023</td>
                    <td>Autor 1</td>
                    <td>1.0</td>
                    <td class="btn-tabla-container">
                       <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-tabla" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Detalles
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title titulo" id="staticBackdropLabel">Nombre de material</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php include(LAYOUT."/manage-material/detalle-material.php"); ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-tabla" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="/inventario_dgtic/view/admin/admin-pdfView.php">
                            <button type="button" class="btn btn-primary btn-tabla">Índice</button>
                        </a>
                        <button type="button" class="btn btn-primary btn-tabla">Habilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Deshabilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Editar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Descargar</button>
                    </td>
                </tr>
                <tr scope="col">
                    <th>Material 2</th>
                    <td>2020</td>
                    <td>Autor 2</td>
                    <td>2.0</td>
                    <td class="btn-tabla-container">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-tabla" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            Detalles
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title titulo" id="staticBackdropLabel">Nombre de material</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php include(LAYOUT."/manage-material/detalle-material.php"); ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-tabla" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="/inventario_dgtic/view/layouts/manage-material/pdfView.php">
                            <button type="button" class="btn btn-primary btn-tabla">Índice</button>
                        </a>
                        <button type="button" class="btn btn-primary btn-tabla">Habilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Deshabilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Editar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Descargar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <?php include(LAYOUT."/footer.php");?>
</body>
</html>