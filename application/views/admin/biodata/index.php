<section class="content">
  <div class="container bootstrap snippet">
    <div class="row">
      <div class="col-sm-8">
        <div class="tab-content">
          <div class="tab-pane active" id="home">
            <hr>
            <form class="form" action="<?= base_url("biodata/update") ?>" method="post" id="registrationForm">
              <input name="id" value="<?= @$biodata["id"] ?>" type="hidden">

              <!-- <label for="photo">Photo</label> -->
              <div class="form-group">
                <img src="<?= base_url("assets/img/") . @$biodata['photo'] ?>" style="width:150px;"><br>
                <!-- <input type="file" class="form-control" id="photo" name="photo" accept="image/png, image/jpeg, image/jpg"> -->
              </div>

              <div class="form-group">
                <div class="col-xs-6">
                  <label for="fullname">
                    <h4>Nama Lengkap</h4>
                  </label>
                  <input type="text" class="form-control" name="fullname" id="fullname" value="<?= @$biodata['fullname'];  ?>" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-6">
                  <label for="nik">
                    <h4>NIK</h4>
                  </label>
                  <input type="text" class="form-control" name="nik" id="nik" value="<?= @$biodata['nik'];  ?>" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-6">
                  <label for="tempat_lahir">
                    <h4>Tempat Lahir</h4>
                  </label>
                  <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" value="<?= @$biodata['tempat_lahir'];  ?>" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-6">
                  <label for="tgl_lahir">
                    <h4>Tanggal Lahir</h4>
                  </label>
                  <input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= @$biodata['tgl_lahir'];  ?>" placeholder="<?= date('d-m-y H:i:s'); ?>" width="276" />
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-6">
                  <label for="agama">
                    <h4>Agama</h4>
                  </label>
                  <input type="text" class="form-control" name="agama" id="agama" value="<?= @$biodata['agama'];  ?>" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-6">
                  <label for="kewarganegaranaan">
                    <h4>Kewarganegaraan</h4>
                  </label>
                  <input type="text" class="form-control" name="kewarganegaraan" id="kewarganegaraan" value="<?= @$biodata['kewarganegaraan'];  ?>" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-6">
                  <label for="gender">Jenis Kelamin</label>
                  <select class="form-control" id="gender" name="gender" required>
                    <option <?= @$biodata['gender'] == "laki-laki" ? "selected" : "" ?> value="laki-laki">Laki-laki</option>
                    <option <?= @$biodata['gender'] == "perempuan" ? "selected" : "" ?> value="perempuan">Perempuan</option>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-6">
                  <label for="no_telp">
                    <h4>No. Telpon</h4>
                  </label>
                  <input type="text" class="form-control" name="no_telp" id="no_telp" value="<?= @$biodata['no_telp'];  ?>" placeholder="">
                </div>
              </div>

              <div class="form-group">
                <div class="col-xs-12">
                  <br>
                  <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Simpan</button>
                  <!-- <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                </div>
              </div>
            </form>
          </div>

        </div><!--/tab-pane-->
      </div><!--/tab-content-->

    </div><!--/col-9-->
  </div><!--/row-->
</section>