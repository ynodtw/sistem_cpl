<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="<?= base_url("users/update") ?>" enctype="multipart/form-data">
              <input name="id" value="<?= $users["id"] ?>" type="hidden">
              <div class="form-group">
                <label for="username">Username</label>
                <input type="username" class="form-control" id="username" name="username" placeholder="Masukan username" value="<?= $users["username"] ?>" readonly>
              </div>

              <div class="form-group">
                <label for="fullname">Nama Lengkap</label>
                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Masukan Nama Lengkap" value="<?= $users["fullname"] ?>" required>
              </div>


              <div class="form-group" style='<?= $_SESSION['data_login']['role'] == "admin" ? "display:none" : "" ?>'>
                <label for="role">Hak Akses</label>
                <select class="form-control" id="role" name="role" required>
                  <option <?= $users["role"] == "superadmin" ? "selected" : "" ?> value="superadmin">Super Admin</option>
                  <option <?= $users["role"] == "dosen" ? "selected" : "" ?> value="dosen">Dosen</option>
                  <option <?= $users["role"] == "mahasiswa" ? "selected" : "" ?> value="mahasiswa">Mahasiswa</option>
                </select>
              </div>

              <div class="form-group" style='<?= $_SESSION['data_login']['role'] == "admin" ? "display:none" : "" ?>'>
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                  <option <?= $users["status"] == "active" ? "selected" : "" ?> value="active">Active</option>
                  <option <?= $users["status"] == "inactive" ? "selected" : "" ?> value="inactive">Tidak Aktif</option>
                </select>
              </div>

              <div class="form-group">
                <img src="<?= base_url("assets/img/") . $users['photo'] ?>" style="width:150px;"><br>
                <label for="Photo">Photo</label>
                <input type="file" class="form-control" id="Photo" name="photo" accept="image/png, image/jpeg, image/jpg">
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>

            </form>
          </div>
        </div>
      </div>

      <div class="col-6">
        <div class="card">
          <div class="card-body">
            <form method="POST" action="<?= base_url("users/updatePassword") ?>" enctype="multipart/form-data">
              <input name="id" value="<?= $users["id"] ?>" type="hidden">

              <div class="form-group">
                <label for="password">Password Baru</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
              </div>

              <div class="form-group">
                <label for="password2">Ulangi Password</label>
                <input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Password">
              </div>

              <button type="submit" class="btn btn-primary">Submit</button>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>