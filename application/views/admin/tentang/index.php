<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="<?= base_url("tentang/update") ?>" enctype="multipart/form-data">
              <div class="form-group">
                <label for="nama_aplikasi">Nama Aplikasi</label>
                <input type="text" class="form-control" id="nama_aplikasi" name="nama_aplikasi" placeholder="Masukan Nama Aplikasi" value="<?= $tentang['nama_aplikasi'] ?>" required>
              </div>

              <div class="form-group">
                <label for="nama_aplikasi">Nama Aplikasi</label>
                <textarea id="summernote" name="tentang_aplikasi" required><?= $tentang['tentang_aplikasi'] ?></textarea>
              </div>

              <div class="form-group">
                <img src="<?= base_url("assets/img/") . $tentang['logo_aplikasi'] ?>" style="width:150px;"><br>

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