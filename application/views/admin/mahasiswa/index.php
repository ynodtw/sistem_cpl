<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body d-flex justify-content-end">

						<!-- <form method="GET">
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
						</form> -->
						<a href="<?= base_url("data-mahasiswa/add") ?>" class=" btn btn-success">+ Tambah Data</a>

					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<!-- <a href="" class="btn btn-success"><i class="fas fa-print"></i> Print</a> -->
						<table class="table table-bordered table-striped" id="example1">
							<thead>
								<tr>
									<th>No.</th>
									<th>NIM</th>
									<th>Nama</th>
									<th>Fakultas</th>
									<th>Jurusan</th>
									<th>Status</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								if (!empty($mahasiswa)) {
									foreach ($mahasiswa as $m) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $m['mhs_nim'] ?></td>
											<td><?= $m['mhs_nama'] ?></td>
											<td><?= $m['mhs_fakultas'] ?></td>
											<td><?= $m['mhs_jurusan'] ?></td>
											<td><?= $m['mhs_status'] ?></td>
											<td>
												<!-- <a class="btn btn-primary" data-toggle="modal" data-target="#modalLihat-<?= $m['id'] ?>">Lihat</a> -->
												<a class="btn btn-success" href="<?= base_url() . "#" ?>">Nilai</a>
												<a class="btn btn-warning" href="<?= base_url() . "data-mahasiswa/edit/" . $m['id'] ?>">Ubah</a>
												<a class="btn btn-danger" href="<?= base_url() . "mahasiswa/delete/" . $m['id'] ?>" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
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
<!-- <?php if (!empty($mahasiswa)) { ?>
	<?php foreach ($mahasiswa as $m) { ?>
		<div class="modal fade" id="modalLihat-<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLihat-<?= $m['id'] ?>Label" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Detail CPL</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<table class="table table-bordered">
							<tr>
								<td>NIM</td>
								<td><?= $m['mhs_nim'] ?></td>
							</tr>
							<tr>
								<td>Nama</td>
								<td><?= $m['mhs_nama'] ?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td><?= $m['mhs_gender'] ?></td>
							</tr>
							<tr>
								<td>Jurusan</td>
								<td><?= $m['mhs_jurusan'] ?></td>
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
<?php } ?> -->