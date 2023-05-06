<?php

/*********************************
 * pantalla: administrar sedes   *
 * date: 30/02/2023              *
 * autor: Roan                   *
 *********************************/

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
include(BD_SELECT . 'select-sedes.php');

/* INSTANCIA PARA LA CLASE "SelectSedes"*/
$sedes = new SelectSedes();
//Llamás al método sedes y guardar los datos en la variable "infoSedes"
$infoSedes = $sedes -> getSedes();
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
                    <th scope="col">Sede</th>
                    <th scope="col">Siglas</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($infoSedes as $infoSedes){
                ?>
                <tr>
                    <th scope="row"><?php echo $infoSedes['SedeNombre']; ?></th>
                    <td><?php echo $infoSedes['SedeSiglas']; ?></td>
                    <td class="btn-tabla-container">
                        <button type="button" class="btn btn-primary btn-tabla">Habilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Deshabilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Editar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Eliminar</button>
                    </td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
        <div id="sedeDynamic" class="row"></div>
        <div class="container text-center ms-1">
            <div class="row justify-content-start">
                <div class="col-2">
                    <button id="agregarSede" type="button" class="btn btn-primary btn-tabla">Agregar Sede</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/inventario_dgtic/view/js/dynamic_inputs/addSede.js"></script>
    <?php include(LAYOUT."/footer.php");?>
</body>
</html>