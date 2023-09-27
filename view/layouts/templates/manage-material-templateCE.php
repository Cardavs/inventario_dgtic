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
            <?php
            $i = 0;
            foreach ($infoMaterials as $infoMaterials) {
                $i = $i + 1; ?>
                <tr scope="col">
                    <th><?php echo $infoMaterials['MaterialNombre']; ?></th>
                    <td><?php echo $infoMaterials['MaterialEdicion']; ?></td>
                    <td><?php echo $infoMaterials['MaterialAutor']; ?></td>
                    <td><?php echo $infoMaterials['MaterialVersion']; ?></td>
                    <td>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-tabla btn-CE" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $infoMaterials['Material_Id']; ?>" value=<?php echo $infoMaterials['Material_Id']; ?>>
                            Detalles
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop<?php echo $infoMaterials['Material_Id']; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title titulo" id="staticBackdropLabel"><?php echo $infoMaterials['MaterialNombre']; ?></h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                    </div>
                                    <div class="modal-body">
                                        <?php include(LAYOUT . "/manage-material/detalle-material.php"); ?>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary btn-tabla" data-bs-dismiss="modal">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-tabla-container">
                            <a href=<?php echo $infoMaterials['MaterialIndice']; ?>>
                                <button type="button" class="btn btn-primary btn-tabla">Índice</button>
                            </a>
                            <button type="button" class="btn btn-primary btn-tabla">Descargar</button>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>

    </table>
</div>