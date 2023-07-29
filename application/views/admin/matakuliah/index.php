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
						<?php if ($_SESSION['data_login']['role'] == "superadmin" || $_SESSION['data_login']['role'] == "prodi") { ?>
							<a href="<?= base_url("data-matakuliah/add") ?>" class=" btn btn-success">+ Tambah Data</a>
						<?php } ?>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<!-- <a href="" class="btn btn-success"><i class="fas fa-print"></i> Print</a> -->
						<table class="table table-bordered table-striped" id="example1">
							<thead>
								<tr>
									<th>No.</th>
									<th>Semester</th>
									<th>Fakultas</th>
									<th>Jurusan</th>
									<th>Kode MK</th>
									<th>Mata Kuliah</th>
									<th>SKS</th>
									<th>Prasyarat</th>
									<th>Keterangan</th>
									<?php if ($_SESSION['data_login']['role'] == "superadmin" || $_SESSION['data_login']['role'] == "prodi") { ?>
										<th>Bobot Nilai (100%)</th>
										<!-- <th>Bobot Absensi (%)</th>
										<th>Bobot Tugas (%)</th>
										<th>Bobot UTS (%)</th>
										<th>Bobot UAS (%)</th> -->
										<th></th>
									<?php } ?>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								if (!empty($matakuliah)) {
									foreach ($matakuliah as $mk) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $mk['mk_smt'] ?></td>
											<td><?= $mk['prd_jurusan'] ?></td>
											<td><?= $mk['fk_nama'] ?></td>
											<td><?= $mk['mk_kd'] ?></td>
											<td><?= $mk['mk_nama'] ?></td>
											<td><?= $mk['mk_sks'] ?></td>
											<td><?= $mk['mk_prasyarat'] ?></td>
											<td><?= $mk['mk_keterangan'] ?></td>
											<?php if ($_SESSION['data_login']['role'] == "superadmin" || $_SESSION['data_login']['role'] == "prodi") { ?>
												<td><a class="btn btn-primary" data-toggle="modal" data-target="#modalBobot-<?= $mk['id'] ?>">Lihat</a></td>
												<!-- <td><?= $mk['bobot_absen'] ?></td>
												<td><?= $mk['bobot_tugas'] ?></td>
												<td><?= $mk['bobot_uts'] ?></td>
												<td><?= $mk['bobot_uas'] ?></td> -->
												<td>
													<a class="btn btn-warning" href="<?= base_url() . "data-matakuliah/edit/" . $mk['id'] ?>">Ubah</a>
													<a class="btn btn-danger" href="<?= base_url() . "matakuliah/delete/" . $mk['id'] ?>" onclick="return confirm('Are you sure?')">Hapus</a>
												</td>
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


<!-- MODAL -->
<?php if (!empty($matakuliah)) { ?>
	<?php foreach ($matakuliah as $mk) { ?>
		<div class="modal fade" id="modalBobot-<?= $mk['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalBobot-<?= $mk['id'] ?>Label" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Bobot Nilai</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<table class="table table-bordered">
							<tr>
								<td>Bobot Absen %</td>
								<td><?= $mk['bobot_absen'] ?></td>
							</tr>
							<tr>
								<td>Bobot Tugas %</td>
								<td><?= $mk['bobot_tugas'] ?></td>
							</tr>
							<tr>
								<td>Bobot UTS %</td>
								<td><?= $mk['bobot_uts'] ?></td>
							</tr>
							<tr>
								<td>Bobot UAS %</td>
								<td><?= $mk['bobot_uas'] ?></td>
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