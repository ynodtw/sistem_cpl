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
						<a href="<?= base_url("data-prodi/add") ?>" class=" btn btn-success">+ Tambah Data</a>

					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<!-- <a href="" class="btn btn-success"><i class="fas fa-print"></i> Print</a> -->
						<table class="table table-bordered table-striped" id="example1">
							<thead>
								<tr>
									<th>No.</th>
									<th>Kode</th>
									<th>Jurusan</th>
									<th>Fakultas</th>
									<th>Kepala Jurusan</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								if (!empty($prodi)) {
									foreach ($prodi as $p) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $p['prd_kd'] ?></td>
											<td><?= $p['prd_jurusan'] ?></td>
											<td><?= $p['fk_nama'] ?></td>
											<td><?= $p['prd_kajur'] ?></td>
											<td>
												<!-- <a class="btn btn-primary" data-toggle="modal" data-target="#modalLihat-<?= $p['id'] ?>">Lihat</a> -->
												<a class="btn btn-warning" href="<?= base_url() . "data-prodi/edit/" . $p['id'] ?>">Ubah</a>
												<a class="btn btn-danger" href="<?= base_url() . "prodi/delete/" . $p['id'] ?>" onclick="return confirm('Apakah Anda Yakin??')">Hapus</a>
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
<?php if (!empty($jurusan)) { ?>
	<?php foreach ($jurusan as $j) { ?>
		<div class="modal fade" id="modalLihat-<?= $j['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLihat-<?= $j['id'] ?>Label" aria-hidden="true">
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
								<td><?= $j['jrs_kd'] ?></td>
							</tr>
							<tr>
								<td>Nama</td>
								<td><?= $j['jrs_nama'] ?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td><?= $j['jrs_fakultas'] ?></td>
							</tr>
							<tr>
								<td>Jurusan</td>
								<td><?= $j['mhs_jurusan'] ?></td>
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