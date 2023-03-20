<?php

/**********************
 * pantalla: Ver pdf  *
 * date: 19/03/2023   *
 * autor: Roan        *
 **********************/

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

    <h2 class="titulo">Buscar Descargas</h2>

    <div class="container sombra gestionar-material">
        <table class="table table-borderless">
            <thead>
                <tr class="text-center">
                    <th scope="col" class="encabezado-col">Periodo</th>
                    <th scope="col" class="encabezado-col">Sede</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="p-5">
                        <div class="col-auto">
                            <div class="row">
                                <div class="col p-4">
                                    <label for="inicio">Fecha de Inicio</label>
                                    <div class="row">
                                        <input type="date" name="inicio" id="inicio">
                                    </div>
                                </div>
                                <div class="col p-4">
                                    <label for="inicio">Fecha de Fin</label>
                                    <div class="row">
                                        <input type="date" name="fin" id="fin">
                                    </div>
                                </div>
                            </div>

                        </div>
                    </th>
                    <td class="p-5">
                        <div class="row p-4">
                                <select class="" name="sede" id="sede">
                                    <option value="">Selecciona una sede</option>
                                    <option value="">Ciudad Universitaria</option>
                                    <option value="">Centro Mascarones</option>
                                    <option value="">Centro Polanco</option>
                                </select>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <button type="button" class="btn btn-primary btn-tabla">Buscar</button>
            </div>
        </div>
    </div>

    <?php include(LAYOUT."/footer.php");?>
</body>
</html>