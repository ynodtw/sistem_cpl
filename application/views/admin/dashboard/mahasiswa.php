<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="alert alert-info">Selamat Datang <?= $_SESSION['data_login']['username'] ?></div>
      </div>
      <div class="col-6">
        <canvas id="myChart" style="width:100%;"></canvas>
      </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
<script>
  var xValues = ["Tercapai", "Belum Tercapai"];
  var yValues = [2, 10];
  var barColors = [
    "#00aba9",
    "#b91d47",
  ];

  new Chart("myChart", {
    type: "pie",
    data: {
      labels: xValues,
      datasets: [{
        backgroundColor: barColors,
        data: yValues
      }]
    },
    options: {
      title: {
        display: true,
        text: "Sikap"
      }
    }
  });
</script>