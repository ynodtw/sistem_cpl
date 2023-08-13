<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body d-flex">
            <canvas id="cplmk" style="width:100%; height:400px"></canvas>
          </div>
        </div>

        <div class="card">
          <div class="card-body d-flex">
            <table class="table table-bordered">
              <tr>
                <td><b>Rata-rata Nilai Akumulasi Nilai Matakuliah</b></td>
                <td>
                  <?php
                  if ($avg_nilai_mk < 50) {
                    echo "<b style='color:red'>" . number_format($avg_nilai_mk, 2) . "</b>";
                  } else {
                    echo "<b>" . number_format($avg_nilai_mk, 2) . "</b>";
                  }
                  ?>
                </td>
              </tr>

              <?php foreach ($avg_cplmk as $avg) { ?>
                <tr>
                  <td style="width:70%">
                    <b><?= $avg['cpl_kategori'] ?> - <?= $avg['cpl_kd'] ?></b><br>
                    <small>
                      <?= $avg['cpl_deskripsi'] ?>
                    </small>
                  </td>
                  <!-- <td><b><?= number_format($avg['avg_cplmk'], 2) ?></b></td> -->
                  <td>
                    <?php
                    if ($avg['avg_cplmk'] < 50) {
                      echo "<b style='color:red'>" . number_format($avg['avg_cplmk'], 2) . "</b>";
                    } else {
                      echo "<b>" . number_format($avg['avg_cplmk'], 2) . "</b>";
                    }
                    ?>
                  </td>

                </tr>
              <?php } ?>

              <!-- <tr>
                  <td>Rata-rata Nilai Akumulasi Nilai CPL</td>
                  <td><b><?= number_format($avg_nilai_cpl, 2) ?></b></td>
              </tr> -->
            </table>

          </div>
        </div>
        <div class="card">
          <div class="card-body d-flex">
            <div class="col-10 d-flex justify-content-start">
              <h4><?= $mk_nama ?></h4>
            </div>
            <?php if ($_SESSION['data_login']["role"] != "dosen") { ?>
              <div class="col-2 d-flex justify-content-end">
                <a href="<?= base_url("data-nilai-matakuliah/add/" . $id_mk) ?>" class="btn btn-success">+ Tambah Data</a>
              </div>
            <?php } ?>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <!-- <a href="" class="btn btn-success"><i class="fas fa-print"></i> Print</a> -->
            <table class="table table-bordered table-striped datatable">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>NIM</th>
                  <th>Nama Mahasiswa</th>
                  <th>Absensi</th>
                  <th>Tugas</th>
                  <th>UTS</th>
                  <th>UAS</th>
                  <th>Akumulasi</th>
                  <th>Nilai</th>
                  <?php if ($_SESSION['data_login']['role'] != "mahasiswa") { ?>
                    <th></th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                if (!empty($nilai_mk)) {
                  foreach ($nilai_mk as $nm) { ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $nm['mhs_nim'] ?></td>
                      <td><?= $nm['mhs_nama'] ?></td>
                      <td>
                        <?php
                        if ($nm['n_absen'] < 50) {
                          echo "<span style='color:red'>" . $nm['n_absen'] . "</span>";
                        } else {
                          echo "<span>" . $nm['n_absen'] . "</span>";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        if ($nm['n_tugas'] < 50) {
                          echo "<span style='color:red'>" . $nm['n_tugas'] . "</span>";
                        } else {
                          echo "<span>" . $nm['n_tugas'] . "</span>";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        if ($nm['n_uts'] < 50) {
                          echo "<span style='color:red'>" . $nm['n_uts'] . "</span>";
                        } else {
                          echo "<span>" . $nm['n_uts'] . "</span>";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        if ($nm['n_uas'] < 50) {
                          echo "<span style='color:red'>" . $nm['n_uas'] . "</span>";
                        } else {
                          echo "<span>" . $nm['n_uas'] . "</span>";
                        }
                        ?>
                      </td>
                      <td>
                        <?php
                        if ($nm['n_akumulasi'] < 50) {
                          echo "<span style='color:red'>" . $nm['n_akumulasi'] . "</span>";
                        } else {
                          echo "<span>" . $nm['n_akumulasi'] . "</span>";
                        }
                        ?>
                      </td>
                      <td> <a class="btn btn-success" href="<?= base_url() . "data-cplmk/" . $nm['id'] . "?mhs_nim=" . $nm['mhs_nim'] . "&mhs_nama=" . $nm['mhs_nama'] ?>">CPLMK</a></td>
                      <?php if ($_SESSION['data_login']['role'] != "mahasiswa") { ?>
                        <td>
                          <a class="btn btn-warning" href="<?= base_url() . "data-nilai-matakuliah/edit/" . $nm['id'] ?>">Ubah</a>
                          <?php if ($_SESSION['data_login']['role'] != "dosen") { ?>

                            <a class="btn btn-danger" href="<?= base_url() . "nilai_mk/delete/" . $nm['id'] ?>" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
                          <?php } ?>
                        </td>
                      <?php } else { ?>
                        <td></td>
                      <?php } ?>
                    </tr>
                  <?php } ?>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="<?= base_url("assets/AdminLTE-3.2.0/") ?>plugins/chart.js/Chart.js"></script>

<script>
  var ctx = document.getElementById("cplmk");
  var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: <?= $title_cplmk ?>,
      datasets: [{
        label: 'CPL',
        data: <?= $num_cplmk ?>,
        // backgroundColor: [
        //     'rgba(255, 99, 132, 0.2)',
        //     'rgba(54, 162, 235, 0.2)',
        //     'rgba(255, 206, 86, 0.2)',
        //     'rgba(75, 192, 192, 0.2)',
        //     'rgba(153, 102, 255, 0.2)',
        //     'rgba(255, 159, 64, 0.2)'
        // ],
        // borderColor: [
        //     'rgba(255,99,132,1)',
        //     'rgba(54, 162, 235, 1)',
        //     'rgba(255, 206, 86, 1)',
        //     'rgba(75, 192, 192, 1)',
        //     'rgba(153, 102, 255, 1)',
        //     'rgba(255, 159, 64, 1)'
        // ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  });
</script>