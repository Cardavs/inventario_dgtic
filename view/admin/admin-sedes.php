<?php

/*********************************
 * pantalla: administrar sedes   *
 * date: 30/02/2023              *
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

    <h2 class="titulo">Administrar Sedes</h2>
    
    <div class="container text-container sombra">
        <table class="table tabla-sede">
            <thead class="encabezado">
                <tr>
                    <th>Sede</th>
                    <th>Siglas</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Ciudad Universitaria</th>
                    <td>CU</td>
                    <td class="btn-tabla-container">
                        <button type="button" class="btn btn-primary btn-tabla">Habilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Deshabilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Editar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <th>Centro Mascarones</th>
                    <td>CM</td>
                    <td class="btn-tabla-container">
                         <button type="button" class="btn btn-primary btn-tabla">Habilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Deshabilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Editar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <th>Centro Polanco</th>
                    <td>CP</td>
                    <td class="btn-tabla-container">
                        <button type="button" class="btn btn-primary btn-tabla">Habilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Deshabilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Editar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="container text-center">
            <div class="row justify-content-start">
                <div class="col-2 ">
                    <button type="button" class="btn btn-primary btn-tabla">Agregar Sede</button>
                </div>
            </div>
        </div>
    </div>
    <?php include(LAYOUT."/footer.php");?>
</body>
</html>