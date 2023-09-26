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
            <?php foreach ($infoMaterials as $infoMaterials){?>
                <tr scope="col">
                    <th><?php echo $infoMaterials['MaterialNombre']; ?></th>
                    <td><?php echo $infoMaterials['MaterialEdicion']; ?></td>
                    <td><?php echo $infoMaterials['MaterialAutor']; ?></td>
                    <td><?php echo $infoMaterials['MaterialVersion']; ?></td>
                    <td class="btn-tabla-container">
                       <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary btn-tabla" data-bs-toggle="modal" data-bs-target="#staticBackdrop" value=<?php echo $infoMaterials['Material_Id']; ?>>
                            Detalles
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title titulo" id="staticBackdropLabel"><?php echo $infoMaterials['MaterialNombre']; ?></h1>
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
                        <a href=<?php echo $infoMaterials['MaterialIndice']; ?>>
                            <button type="button" class="btn btn-primary btn-tabla">Índice</button>
                        </a>
                        <button type="button" class="btn btn-primary btn-tabla">Descargar</button>
                    </td>
                </tr>
                <?php }?>
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
                        <a href="/inventario_dgtic/public/pdf/DocumentoPrueba.pdf">
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