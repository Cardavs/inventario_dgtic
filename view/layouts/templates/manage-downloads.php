<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                                <select class="form-select form-select-lg mt-4" name="sedeDescarga" id="sede" required >
                                    <option selected disabled value="">Selecciona una sede</option>
                                    <option value="1">Ciudad Universitaria</option>
                                    <option value="2">Centro Mascarones</option>
                                    <option value="3">Centro Polanco</option>
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
            print_r($materialIds);
            print_r($descargas);
        ?>
        <div style="width: 500px;">
            <canvas  id="chartjs_bar"></canvas> 
        </div>

        <script type="text/javascript">
        var ctx = document.getElementById("chartjs_bar").getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels:<?php echo json_encode($materialIds); ?>,
                            datasets: [{
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