<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <a href="<?= base_url("users/add") ?>" class="btn btn-success float-right"><i class="nav-icon fas fa-plus fa-sm"></i> Tambah User</a>
            <div class="clearfix"></div><br>
            <table class="table table-bordered table-striped datatable">
              <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama Lengkap</th>
                  <th>Email</th>
                  <th>Role</th>
                  <th>Status</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1;
                if (!empty($users)) {
                  foreach ($users as $user) { ?>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $user['fullname'] ?></td>
                      <td><?= $user['email'] ?></td>
                      <td><?= $user['role'] ?></td>
                      <td><?= $user['status'] ?></td>
                      <td>
                        <a class="btn btn-primary" data-toggle="modal" data-target="#modalLihat-<?= $user['id'] ?>">Lihat</a>
                        <a class="btn btn-warning" href="<?= base_url() . "users/edit/" . $user['id'] ?>">Ubah</a>
                        <a class="btn btn-danger" href="<?= base_url() . "users/delete/" . $user['id'] ?>" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
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
<?php foreach ($users as $user) { ?>
  <div class="modal fade" id="modalLihat-<?= $user['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLihat-<?= $user['id'] ?>Label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"><?= $user['fullname'] ?></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <table class="table table-bordered">
            <tr>
              <td>Photo</td>
              <td><img src="<?= base_url("assets/img/") . $user['photo'] ?>" style="width:150px"></td>
            </tr>
            <tr>
              <td>Nama Lengkap</td>
              <td><?= $user['fullname'] ?></td>
            </tr>
            <tr>
              <td>Email</td>
              <td><?= $user['email'] ?></td>
            </tr>
            <tr>
              <td>Role</td>
              <td><?= $user['role'] ?></td>
            </tr>
            <tr>
              <td>Status</td>
              <td><?= $user['status'] ?></td>
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