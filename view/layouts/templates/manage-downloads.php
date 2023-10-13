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
                        <th scope="col" class="encabezado-col">Sede</th>
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
                        <td class="p-5">
                            <div class="row p-4">
                            <select class="form-select form-select-lg" style="margin-top: 2.3rem;" name="sedeDescarga" id="sede" required>
                                <option selected disabled value="">Selecciona una sede</option>
                                <?php
                                $optionSelect = new SelectSedes();
                                $options = $optionSelect->getSedes();
                                foreach ($options as $option) {
                                    echo '<option value="' . $option['Sede_id'] . '">' . $option['SedeNombre'] . '</option>';
                                }
                                ?>
                            </select>
                                <div class="invalid-feedback">
                                    Es necesario colocar una sede.
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="col-md-6 offset-md-3">
                    <button type="submit" id="searchInput" name="searchInput" class="btn btn-primary btn-tabla">Buscar</button>
                </div>
            </div>
        </form>
        <?php
            include(VALIDATION_PHP . '/validate-searchDownloads.php');
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
                                label: '<?php echo json_encode($SedeNombre); ?>',
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
    <script src="/inventario_dgtic/controllers/validation/js/form-validation-empty.js"></script>
    <script src="/inventario_dgtic/view/js/validationFrontend/dateValidation.js"></script>