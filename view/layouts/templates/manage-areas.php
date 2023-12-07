<?php
include(BD_SELECT . 'select-area.php');
include(VALIDATION_PHP . '/validate-createArea.php');
include(VALIDATION_PHP . '/validate-update-area.php');
//instancia de la clase SelectDiplomados
$area = new SelectAreas();
//Guardar la información de los areas
$infoAreas = $area->getAllInfoAllAreas();
?>
<h1 class="titulo">Administrar Areas</h1>
<div class="container text-container sombra">
    <table class="table tabla-sede">
        <thead class="encabezado">
            <tr>
                <th> </th>
                <th>Area</th>
                <th>Seccion</th>
                <th>Estado</th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($infoAreas as $infoArea) {
            ?>
                <form action="" method="post">
                    <tr>
                        <th> <input type="hidden" name="areaId" value="<?php echo $infoArea['Area_Id']; ?>"></th>
                        <th><?php echo $infoArea['AreaNombre']; ?></th>
                        <td><?php echo $infoArea['SeccionNombre']; ?></td>
                        <td>
                            <?php echo ($infoArea['AreaEstado'] == 1) ? "Activo" : "Inactivo";  ?>
                        </td>
                        <td class="btn-tabla-container">
                            <input type="hidden" name="estadoArea" value="<?php echo $infoArea['AreaEstado']; ?>">
                            <button type="submit" name="editar" class="btn btn-primary btn-tabla">Editar</button>
                            <button type="submit" name="eliminar" class="btn btn-primary btn-tabla">Eliminar</button>
                            <button type="submit" name="cambio" class="btn btn-primary btn-tabla btn-hab <?php echo (!$infoArea['AreaEstado']) ? "btn-habilitar" : "btn-inhabilitar"; ?>"><?php echo (!$infoArea['AreaEstado']) ? "Habilitar" : "Inhabilitar"; ?></button>
                        </td>
                    </tr>
                </form>
            <?php } ?>
        </tbody>
    </table>
    <form class="needs-validation" action="" method="POST" novalidate>
        <div class="row" id="diplomaedDynamic"></div>
    </form>
    <div class="container text-center">
        <div class="row justify-content-start">
            <div class="col-2 ">
                <button type="button" id="addInput" class="btn btn-primary btn-tabla">Agregar Diplomado</button>
            </div>
        </div>
    </div>
</div>
<script src="/inventario_dgtic/view/js/dynamic_inputs/addDiplomaed.js"></script>
<script src="/inventario_dgtic/controllers/validation/js/form-validation-empty.js"></script>