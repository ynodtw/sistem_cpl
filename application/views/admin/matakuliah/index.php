<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<?php if ($_SESSION['data_login']['role'] == "superadmin" || $_SESSION['data_login']['role'] == "prodi") { ?>
						<div class="card-body d-flex justify-content-end">
							<a href="<?= base_url("data-matakuliah/add") ?>" class=" btn btn-success">+ Tambah Data</a>
						</div>
					<?php } ?>
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
									<th>Bobot Nilai (100%)</th>
									<?php if ($_SESSION['data_login']['role'] == "superadmin" || $_SESSION['data_login']['role'] == "prodi") { ?>
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
											<td><a class="btn btn-primary" data-toggle="modal" data-target="#modalBobot-<?= $mk['id'] ?>">Lihat</a></td>
											<?php if ($_SESSION['data_login']['role'] == "superadmin" || $_SESSION['data_login']['role'] == "prodi") { ?>
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