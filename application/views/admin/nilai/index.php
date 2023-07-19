<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body d-flex justify-content-end">
						<?= $nama ?>
						<?= $nim ?>
						<!-- <pre><?php print_r($nilai) ?></pre> -->
						<!-- <form method="GET">
							<div class="form-row">
								<div class="form-group col-4">
									<label for="nik">NIK</label>
									<input type="text" class="form-control" id="nik" name="nik" n="<?= @$_GET['nik'] ?>" placeholder="Cari NIK">
								</div>

								<div class="form-group col-4">
									<label for="nama">Nama Lengkap</label>
									<input type="text" class="form-control" id="nama" name="nama" n="<?= @$_GET['nama'] ?>" placeholder="Cari Nama Lengkap">
								</div>

								<div class="form-group col-4">
									<label for="telp">No Telp</label>
									<input type="text" class="form-control" id="telp" name="telp" n="<?= @$_GET['telp'] ?>" placeholder="Cari No Telp">
								</div>

								<div class="form-group col-4">
									<label for="tgl_datang">Tanggal Datang</label>
									<input type="date" class="form-control" id="tgl_datang" name="tgl_datang" n="<?= @$_GET['tgl_datang'] ?>">
								</div>

								<div class="form-group col-4">
									<label for="tgl_pulang">Tanggal Pulang</label>
									<input type="date" class="form-control" id="tgl_pulang" name="tgl_pulang" n="<?= @$_GET['tgl_pulang'] ?>">
								</div>
							</div>
							<button type="submit" class="btn btn-info float-right">Cari</button>
						</form> -->
						<a href="<?= base_url("data-nilai/add/" . $id_mhs . "?nama-mhs=" . $nama . "&nim-mhs=" . $nim) ?>" class=" btn btn-success">+ Tambah Data</a>

					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<!-- <a href="" class="btn btn-success"><i class="fas fa-print"></i> Print</a> -->
						<table class="table table-bordered table-striped datatable">
							<thead>
								<tr>
									<th>No.</th>
									<th>Semester</th>
									<th>Kode MK</th>
									<th>Mata Kuliah</th>
									<th>NIM</th>
									<th>Nama</th>
									<th>Tugas</th>
									<th>UTS</th>
									<th>UAS</th>
									<th>Akumulasi</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								if (!empty($nilai)) {
									foreach ($nilai as $n) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $n['mk_smt'] ?></td>
											<td><?= $n['mk_kd'] ?></td>
											<td><?= $n['mk_nama'] ?></td>
											<td><?= $n['mhs_nim'] ?></td>
											<td><?= $n['mhs_nama'] ?></td>
											<td><?= $n['n_tugas'] ?></td>
											<td><?= $n['n_uts'] ?></td>
											<td><?= $n['n_uas'] ?></td>
											<td><?= $n['n_akumulasi'] ?></td>
											<td>
												<!-- <a class="btn btn-primary" data-toggle="modal" data-target="#modalLihat-<?= $n['id'] ?>">Lihat</a> -->
												<a class="btn btn-warning" href="<?= base_url() . "#" ?>">Ubah</a>
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
<?php if (!empty($nilai)) { ?>
	<?php foreach ($nilai as $n) { ?>
		<div class="modal fade" id="modalLihat-<?= $n['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLihat-<?= $n['id'] ?>Label" aria-hidden="true">
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
								<td>Kode n</td>
								<td><?= $n['n_kd'] ?></td>
							</tr>
							<tr>
								<td>Nama</td>
								<td><?= $n['n_nama'] ?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td><?= $n['n_sks'] ?></td>
							</tr>
							<tr>
								<td>Jurusan</td>
								<td><?= $n['n_prasyarat'] ?></td>
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