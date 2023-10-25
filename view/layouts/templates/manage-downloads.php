<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php
include(BD_SELECT . 'select-sedes.php');
include(BD_SELECT . 'select-downloads.php');
?>
<h2 class="titulo">Buscar Descargas</h2>

    <div class="container sombra gestionar-material">
        <form class="needs-validation" novalidate method="POST">
            <table class="table table-borderless">
                <thead>
                    <tr class="text-center">
                        <th scope="col" class="encabezado-col">Periodo</th>
                        <th scope="col" class="encabezado-col" id='sedeCol'>Sede</th>
                        <th scope="col" class="encabezado-col">Datos</th>
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
                                            <input class="form-control form-control-lg" type="date" name="fechainicio" id="finicio" required>
                                            <div class="invalid-feedback">
                                                Es necesario colocar una fecha inicial.
                                            </div>
                                            <div id="errorFecha" class="invalid-feedback">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col p-4">
                                        <label for="inicio">Fecha de Fin</label>
                                        <div class="row">
                                            <input class="form-control form-control-lg" type="date" name="fechafin" id="ffin" required>
                                            <div class="invalid-feedback">
                                                Es necesario colocar una fecha final.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </th>
                        <td class="p-5" id='selectContainer'>
                            <div class="row p-4">
                            <select class="form-select form-select-lg" style="margin-top: 2.3rem;" name="sedeDescarga" id="sede" required>
                                <?php
                                if ($user_type == 'CE'){
                                    echo '<option value="1">' . "Centro Mascarones" . '</option>';
                                }else{
                                    $optionSelect = new SelectSedes();
                                    $options = $optionSelect->getSedes();
                                    echo '<option selected value="all">Todas</option>';
                                    foreach ($options as $option) {
                                        echo '<option value="' . $option['Sede_id'] . '">' . $option['SedeNombre'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                                <div class="invalid-feedback">
                                    Es necesario colocar una sede.
                                </div>
                            </div>
                        </td>
                        <td class="p-5">
                            <div class="col p-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" id="auditoria" value="Descargas" checked>
                                    <label class="form-check-label" for="tipo">
                                        Descargas
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tipo" id="compilacion" value="Copias">
                                    <label class="form-check-label" for="tipo">
                                        Copias
                                    </label>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row display-flex justify-content-center">
                <div class="col-md-4">
                    <button type="submit" id="searchInput" name="searchInput" class="btn btn-primary btn-tabla">Generar Grafico</button>
                </div>
                <div class="col-md-4">
                    <button type="submit" id="downloadInputFilter" name="downloadInputFilter" class="btn btn-primary btn-tabla">Generar Reporte</button>
                </div>
            </div>
        </form>
        <?php
            include(LAYOUT."/graphics/downloadsGraphics.php");
            include(VALIDATION_PHP . '/validate-searchDownloads.php');
            // Asignar un valor predeterminado a $nombreArchivo si es null
            $nombreArchivo = $nombreArchivo ?? null;

            // Verificar si $nombreArchivo no es null y no está vacío
            if ($nombreArchivo !== null && !empty($nombreArchivo)) {
                
                // Enviar el archivo al navegador
                echo '<div style="text-align: center; margin-left: 370px;">';
                echo '<a href="' . $nombreArchivo . '" >Descargar Reporte Excel</a>';
                echo '</div>';

            } else {
                echo '<div style="text-align: center; margin-left: 360px;">---------------------</div>';
            }
        ?>
        
        <div style="width: 1000px; margin: 0 auto; margin-top: 50px;">
            <canvas  id="chartjs_bar"></canvas> 
        </div>
        <script type="text/javascript">
        var ctx = document.getElementById("chartjs_bar").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels:<?php echo json_encode($NombreMaterial); ?>,
                            datasets: [{
                                label:<?php echo json_encode($Consulta); ?> + <?php echo json_encode($SedeNombre); ?>,
                                backgroundColor: [
                                "#5969ff",
                                    "#ff407b",
                                    "#25d5f2",
                                    "#ffc750",
                                    "#2ec551",
                                    "#7040fa",
                                    "#ff004e"
                                ],
                                data:<?php echo json_encode($descargas); ?>,
                            }]
                        },
                        options: {
                            legend: {
                            display: true,
                            position: 'bottom',
    
                            labels: {
                                fontColor: '#71748d',
                                fontFamily: 'Circular Std Book',
                                fontSize: 14,
                            }
                        },
    
    
                    }
                    });
        </script>
        
    </div>
    <script src="/inventario_dgtic/controllers/validation/js/form-validation-empty-report.js"></script>
    <script src="/inventario_dgtic/view/js/validationFrontend/dateValidation.js"></script>