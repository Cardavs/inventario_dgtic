<?php

/*********************************
 * pantalla: administrar sedes   *
 * date: 30/02/2023              *
 * autor: Roan                   *
 *********************************/

include_once($_SERVER['DOCUMENT_ROOT'] . '/inventario_dgtic/dir.php');
include(CONNECTION_BD);

include(BD_SELECT . 'select-sedes.php');
include(VALIDATION_PHP . '/validate-createSede.php');
include(VALIDATION_PHP. '/validate-updateSede.php');

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
                    <th scope="col"></th>
                    <th scope="col">Sede</th>
                    <th scope="col">Siglas</th>
                    <th scope="col">Estado</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>                                           
                <?php
                    foreach ($infoSedes as $infoSedes){
                ?>
                <form action="" method="post">
                <tr>
                    <th>
                        <input type="hidden" name="IdSede" value="<?php echo $infoSedes['Sede_id']; ?>">
                    </th>
                    <th scope="row"><?php echo $infoSedes['SedeNombre']; ?></th>
                    <td><?php echo $infoSedes['SedeSiglas']; ?></td>
                    <td><?php echo ($infoSedes['SedeEstado'] == 1) ? 'Activo' : 'Inactivo'; ?></td>
                    <td class="btn-tabla-container">
                        <button type="submit" name="editar" class="btn btn-primary btn-tabla">Editar</button>
                        <button type="submit" name="eliminar" class="btn btn-primary btn-tabla">Eliminar</button>
                        <button type="submit" name="<?php echo (!$infoSedes['SedeEstado']) ? "habilitar" : "deshabilitar"; ?>" class="btn btn-primary btn-tabla btn-hab <?php echo (!$infoSedes['SedeEstado']) ? "btn-habilitar" : "btn-inhabilitar"; ?>"><?php echo (!$infoSedes['SedeEstado']) ? "Habilitar" : "Inhabilitar"; ?></button>
                    </td>
                </tr>
                </form>
                <?php } ?>
            </tbody>
        </table>
        <form class="needs-validation" action="" method="POST" novalidate>
            <div id="sedeDynamic" class="row">
            </div>
        </form>
        <div class="container text-center ms-1">
            <div class="row justify-content-start">
                <div class="col-2">
                    <button id="agregarSede" type="button" class="btn btn-primary btn-tabla">Agregar Sede</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/inventario_dgtic/view/js/dynamic_inputs/addSede.js"></script>
    <script src="/inventario_dgtic/controllers/validation/js/form-validation-empty.js"></script>
    <?php include(LAYOUT."/footer.php");?>
</body>
</html>