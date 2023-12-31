<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <table style="">
              <tr>
                <th>Nama</th>
                <td>: <?= $mhs_nama;  ?></td>
              </tr>
              <tr>
                <th>NIM</th>
                <td>: <?= $mhs_nim;  ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <?php if (!empty($sks)) { ?>
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <canvas id="sks" style="width:100%; height:400px"></canvas>
              <br>
              <table class="table table-bordered">
                <tr>
                  <td>SKS Diambil</td>
                  <td><b><?= $sks['sks'] ?>/144</b></td>
                </tr>
                <!-- <tr>
                  <td>SKS Belum Diambil</td>
                  <td><b><?= 144 - $sks['sks'] ?></b></td>
                </tr> -->
              </table>
            </div>
          </div>
        </div>

        <hr>
        <?php foreach ($cpl as $k => $v) { ?>
          <div class="col-3">
            <div class="card">
              <div class="card-body">
                <canvas id="<?= $k ?>" style="width:100%; height:400px"></canvas>
                <br>
                <table class="table table-bordered">
                  <tr>
                    <td>CPL Diambil</td>
                    <td><b><?= $v['cpl_ambil'] ?></b></td>
                  </tr>
                  <tr>
                    <td>Total CPL</td>
                    <td><b><?= $v['cpl_ambil'] + $v['cpl_belom'] ?></b></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
        <?php } ?>
      <?php } ?>

    </div>
</section>

<script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/chart.js/Chart.js"></script>
<?php foreach ($cpl as $k => $v) { ?>
  <script>
    var xValues = ["Tercapai", "Belum Tercapai"];
    var yValues = ["<?= $v['cpl_ambil'] ?>", "<?= $v['cpl_belom'] ?>"];
    var barColors = [
      "#00aba9",
      "#b91d47",
    ];

    new Chart("<?= $v['cpl_id'] ?>", {
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
          text: "<?= $v['cpl_kategori'] ?>"
        }
      }
    });
  </script>
<?php } ?>

<script>
  var xValues = ["Diambil", "Belum"];
  var yValues = ["<?= $sks['sks'] ?>", "<?= 144 - $sks['sks'] ?>"];
  var barColors = [
    "#00aba9",
    "#b91d47",
  ];

  new Chart("sks", {
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
        text: "SKS Tercapai"
      }
    }
  });
</script>