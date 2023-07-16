<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="<?= base_url("tamu/update") ?>" enctype="multipart/form-data">
              <input name="id" value="<?= $tamu["id"] ?>" type="hidden">
              <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" class="form-control" id="nik" value="<?= $tamu["nik"] ?>" name="nik" placeholder="Masukan NIK" required>
              </div>

              <div class="form-group">
                <label for="nama">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" value="<?= $tamu["nama"] ?>" name="nama" placeholder="Masukan Nama Lengkap" required>
              </div>

              <div class="form-group">
                <label for="telp">No Telp</label>
                <input type="text" class="form-control" id="telp" value="<?= $tamu["telp"] ?>" name="telp" placeholder="Masukan No Telp" required>
              </div>

              <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat" required><?= $tamu["alamat"] ?></textarea>
              </div>

              <div class="form-group">
                <label for="tujuan">Tujuan</label>
                <textarea class="form-control" id="tujuan" name="tujuan" placeholder="Masukan Tujuan" required><?= $tamu["tujuan"] ?></textarea>
              </div>

              <div class="form-group">
                <label for="tgl_datang">Tanggal Datang</label>
                <input type="date" class="form-control" id="tgl_datang" value="<?= $tamu["tgl_datang"] ?>" name="tgl_datang" value="<?= date("Y-m-d") ?>" required>
              </div>

              <div class="form-group">
                <label for="tgl_pulang">Tanggal Pulang</label>
                <input type="date" class="form-control" id="tgl_pulang" value="<?= $tamu["tgl_pulang"] ?>" name="tgl_pulang" value="<?= date("Y-m-d") ?>" required>
              </div>

              <div class="form-group">
                <img src="<?= base_url("assets/img/tamu/") . $tamu['photo'] ?>" style="width:150px;"><br>

                <label for="Photo">Photo</label>
                <input type="file" class="form-control" id="Photo" name="photo" accept="image/png, image/jpeg, image/jpg">
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>