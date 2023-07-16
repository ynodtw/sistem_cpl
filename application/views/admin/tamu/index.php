<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">

            <form method="GET">
              <div class="form-row">
                <div class="form-group col-4">
                  <label for="nik">NIK</label>
                  <input type="text" class="form-control" id="nik" name="nik" value="<?= @$_GET['nik'] ?>" placeholder="Cari NIK">
                </div>

                <div class="form-group col-4">
                  <label for="nama">Nama Lengkap</label>
                  <input type="text" class="form-control" id="nama" name="nama" value="<?= @$_GET['nama'] ?>" placeholder="Cari Nama Lengkap">
                </div>

                <div class="form-group col-4">
                  <label for="telp">No Telp</label>
                  <input type="text" class="form-control" id="telp" name="telp" value="<?= @$_GET['telp'] ?>" placeholder="Cari No Telp">
                </div>

                <div class="form-group col-4">
                  <label for="tgl_datang">Tanggal Datang</label>
                  <input type="date" class="form-control" id="tgl_datang" name="tgl_datang" value="<?= @$_GET['tgl_datang'] ?>">
                </div>

                <div class="form-group col-4">
                  <label for="tgl_pulang">Tanggal Pulang</label>
                  <input type="date" class="form-control" id="tgl_pulang" name="tgl_pulang" value="<?= @$_GET['tgl_pulang'] ?>">
                </div>
              </div>
              <button type="submit" class="btn btn-info float-right">Cari</button>
            </form>

          </div>
        </div>

        <div class="card">
          <div class="card-body">
            <!-- <a href="" class="btn btn-success"><i class="fas fa-print"></i> Print</a> -->
            <table class="table table-bordered table-striped" id="example1">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Photo</th>
                  <th>NIK</th>
                  <th>Nama Lengkap</th>
                  <th>No Telp</th>
                  <th>Tgl Datang</th>
                  <th>Tgl Pulang</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                if (!empty($tamu)) {
                  foreach ($tamu as $t) { ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><img src="<?= base_url("assets/img/tamu/") . $t['photo'] ?>" style="width:100px"></td>
                      <td><?= $t['nik'] ?></td>
                      <td><?= $t['nama'] ?></td>
                      <td><?= $t['telp'] ?></td>
                      <td><?= $t['tgl_datang'] ?></td>
                      <td><?= $t['tgl_pulang'] ?></td>
                      <td>
                        <a class="btn btn-primary" data-toggle="modal" data-target="#modalLihat-<?= $t['id'] ?>">Lihat</a>
                        <a class="btn btn-warning" href="<?= base_url() . "laporan-data-tamu/edit/" . $t['id'] ?>">Ubah</a>
                        <a class="btn btn-danger" href="<?= base_url() . "tamu/delete/" . $t['id'] ?>" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
                      </td>
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


<!-- MODAL -->
<?php if (!empty($tamu)) { ?>
  <?php foreach ($tamu as $t) { ?>
    <div class="modal fade" id="modalLihat-<?= $t['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLihat-<?= $t['id'] ?>Label" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Tamu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <table class="table table-bordered">
              <tr>
                <td>Photo</td>
                <td><img src="<?= base_url("assets/img/tamu/") . $t['photo'] ?>" style="width:150px"></td>
              </tr>
              <tr>
                <td>NIK</td>
                <td><?= $t['nik'] ?></td>
              </tr>
              <tr>
                <td>Nama Lengkap</td>
                <td><?= $t['nama'] ?></td>
              </tr>
              <tr>
                <td>No Telp</td>
                <td><?= $t['telp'] ?></td>
              </tr>
              <tr>
                <td>Alamat</td>
                <td><?= $t['alamat'] ?></td>
              </tr>
              <tr>
                <td>Tujuan</td>
                <td><?= $t['tujuan'] ?></td>
              </tr>
              <tr>
                <td>Durasi</td>
                <td><?= $t['tgl_datang'] . " s/d " . $t['tgl_pulang'] ?></td>
              </tr>
            </table>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>
<?php } ?>