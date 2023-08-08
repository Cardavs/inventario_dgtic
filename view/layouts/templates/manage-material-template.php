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
                <tr scope="col">
                    <th>Material 1</th>
                    <td>2023</td>
                    <td>Autor 1</td>
                    <td>1.0</td>
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
        <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    </div>