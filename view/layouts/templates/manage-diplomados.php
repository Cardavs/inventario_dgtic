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
                <tr>
                    <th>Diplomado 1</th>
                    <td>8</td>
                    <td>Activo</td>
                    <td class="btn-tabla-container">
                        <button type="button" class="btn btn-primary btn-tabla">Habilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Deshabilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Editar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Eliminar</button>
                    </td>
                </tr>
                <tr>
                    <th>Diplomado 2</th>
                    <td>10</td>
                    <td>Activo</td>
                    <td class="btn-tabla-container">
                         <button type="button" class="btn btn-primary btn-tabla">Habilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Deshabilitar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Editar</button>
                        <button type="button" class="btn btn-primary btn-tabla">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="row" id="diplomaedDynamic"></div>
        <div class="container text-center">
            <div class="row justify-content-start">
                <div class="col-2 ">
                    <button type="button" id="addInput" class="btn btn-primary btn-tabla">Agregar Diplomado</button>
                </div>
            </div>
        </div>
    </div>
    <script src="/inventario_dgtic/view/js/dynamic_inputs/addDiplomaed.js"></script>