<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js"></script>

<canvas id="myChart" width="4100" height="400"></canvas>

<script>
var ctx = document.getElementById("myChart").getContext("2d");

var data = {
  labels: ["Sede 1", "Sede 2", "Sede 3"],
  datasets: [{
    label: "Porcentaje de descargas",
    data: [50, 25, 25],
    backgroundColor: ["#FF0000", "#00FF00", "#0000FF"]
  }]
};

var myChart = new Chart(ctx, {
  type: "pie",
  data: data,
  options: {
    title: {
      text: "Porcentaje de descargas por sede"
    }
  }
});
</script>