<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="<?= base_url("users/insert") ?>" enctype="multipart/form-data">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="username" class="form-control" id="username" name="username" placeholder="Masukan username" required>
              </div>

              <div class="form-group">
                <label for="fullname">Nama Lengkap</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Masukan Nama Lengkap" required>
              </div>

              <div class="form-group">
                <label for="fullname">Hak Akses</label>
                <select class="form-control" id="role" name="role" required>
                  <option value="admin">Admin</option>
                  <option value="superadmin">Super Admin</option>
                  <option value="dosen">Dosen</option>
                  <option value="mahasiswa">Mahasiswa</option>
                </select>
              </div>

              <div class="form-group">
                <label for="fullname">Status</label>
                <select class="form-control" id="status" name="status" required>
                  <option value="active">Active</option>
                  <option value="inactive">Tidak Aktif</option>
                </select>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
              </div>

              <div class="form-group">
                <label for="password2">Ulangi Password</label>
                <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Password">
              </div>

              <div class="form-group">
                <label for="Photo">Photo</label>
                <input type="file" class="form-control" id="Photo" name="photo" accept="image/png, image/jpeg, image/jpg" required>
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>