<?php 
    include(BD_SELECT . 'select-diplomados.php');
    include(VALIDATION_PHP . '/validate-createDiplomado.php');
    
    //instancia de la clase SelectDiplomados
    $diplomado = new SelectDiplomados();
    //Guardar la información de los diplomados
    $infoDiplomado = $diplomado -> getDiplomado();
?>
<h1 class="titulo">Administrar Diplomados</h1>
    <div class="container text-container sombra">
        <table class="table tabla-sede">
            <thead class="encabezado">
                <tr>
                    <th>Diplomado</th>
                    <th>Emisión</th>
                    <th>Estado</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($infoDiplomado as $infoDiplomado) {
                ?>
                <tr>
                    <th><?php echo $infoDiplomado['DiplomadoNombre']; ?></th>
                    <td><?php echo $infoDiplomado['DiplomadoEmision']; ?></td>
                    <td>
                        <?php echo ($infoDiplomado['DiplomadoEstado'] == 1) ? "Activo": "Inactivo" ;  ?>
                    </td>
                    <td class="btn-tabla-container">
                        <button type="button" class="btn btn-primary btn-tabla">Habilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Deshabilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Editar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Eliminar</button>
                    </td>
                </tr>
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