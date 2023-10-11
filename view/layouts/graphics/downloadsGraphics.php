<!-- Tu código PHP para generar el JSON -->
<?php echo "var datosGrafico = " . $infoDownloads . ";"; ?>

<!-- Tu script JavaScript para generar el gráfico -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

<canvas id="myChart" width="4100" height="400"></canvas>

<script>
var ctx = document.getElementById("myChart").getContext("2d");

var data = {
  labels: [], // Inicialmente vacío, se llenará en el bucle siguiente
  datasets: [{
    label: "Porcentaje de descargas",
    data: [], // Inicialmente vacío, se llenará en el bucle siguiente
    backgroundColor: ["#FF0000", "#00FF00", "#0000FF"]
  }]
};

// Llenar el array de labels y el array de datos del gráfico
for (var i = 0; i < datosGrafico.length; i++) {
  data.labels.push("Material " + datosGrafico[i].material_id);
  data.datasets[0].data.push(datosGrafico[i].descargas);
}

var myChart = new Chart(ctx, {
  type: "pie",
  data: data,
  options: {
    title: {
      text: "Porcentaje de descargas por material"
    }
  }
});
</script>