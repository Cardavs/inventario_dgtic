    <div class="container sombra gestionar-material">
        <?php if (count($infoMaterials) > 0) { ?>

            <table class="table">
                <thead class="encabezado">
                    <tr>
                        <th scope="col">Nombre de material</th>
                        <th scope="col">Año</th>
                        <th scope="col">Autor</th>
                        <th scope="col">Versión</th>
                        <th scope="col">Estado</th>
                        <th scope="col"> </th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($infoMaterials as $infoMaterials) { ?>

                        <tr scope="col">

                            <th><?php echo $infoMaterials['MaterialNombre']; ?></th>
                            <td><?php echo $infoMaterials['MaterialEdicion']; ?></td>
                            <td><?php echo $infoMaterials['MaterialAutor']; ?></td>
                            <td><?php echo $infoMaterials['MaterialVersion']; ?></td>
                            <td><?php echo ($infoMaterials['MaterialEstado']) ? "Habilitado" : "Inhabilitado"; ?> </td>

                            <td>
                                <div class="btn-tabla-container">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary btn-tabla" data-bs-toggle="modal" data-bs-target="#staticBackdrop<?php echo $infoMaterials['Material_Id']; ?>">
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
                                    <a href=<?php echo $infoMaterials['MaterialIndice']; ?>>
                                        <button type="button" class="btn btn-primary btn-tabla">Índice</button>
                                    </a>
                                </div>

                                <form action="/inventario_dgtic\controllers\validation\php\validate-UpdateMaterial.php" method="post">
                                    <input type="hidden" name="idMaterial" value="<?php echo $infoMaterials['Material_Id']; ?>">

                                    <input type="hidden" name="estadoMaterial" value="<?php echo $infoMaterials['MaterialEstado']; ?>">

                                    <button type="submit" name="cambio" class="btn btn-primary btn-tabla btn-CE <?php echo (!$infoMaterials['MaterialEstado']) ? "btn-habilitar" : "btn-inhabilitar"; ?>"><?php echo (!$infoMaterials['MaterialEstado']) ? "Habilitar" : "Inhabilitar"; ?></button>

                                    <div class="btn-tabla-container">
                                        <button type="submit" name="editar" class="btn btn-primary btn-tabla ">Editar</button>
                                        <button type="submit" name="download" class="btn btn-primary btn-tabla">Descargar</button>
                                    </div>
                                </form>
                            </td>

                        </tr>


                    <?php } ?>
                </tbody>

            </table>
        <?php }else{ ?>
            <h2 class="titulo">Aún no hay registros por mostrar</h2>
        <?php }?>
    </div>