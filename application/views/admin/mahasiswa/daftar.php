<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<?php if ($_SESSION['data_login']['role'] == "superadmin" || $_SESSION['data_login']['role'] == "prodi" || $_SESSION['data_login']['role'] == "prodi") { ?>
					<div class="card">
						<div class="card-body d-flex justify-content-end">
							<a href="<?= base_url("data-mahasiswa/add") ?>" class=" btn btn-success">+ Tambah Data</a>
						</div>
					</div>
				<?php } ?>

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
									<th>Dosen PA</th>
									<th>Status</th>
									<th>Nilai</th>
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
											<td><?= $m['fk_nama'] ?></td>
											<td><?= $m['prd_jurusan'] ?></td>
											<td><?= $m['dsn_nama'] ?></td>
											<td><?= $m['mhs_status'] ?></td>
											<td>
												<a class="btn btn-success" href="<?= base_url() . "data-nilai-matakuliah/daftar/" . $m['id'] ?>?edit=yes">Matakuliah</a>
												<a class="btn btn-success" href="<?= base_url() . "data-nilai-cpl/" . $m['id'] ?>?edit=yes">CPL</a>
												<a class="btn btn-success" href="<?= base_url() . "data-nilai-chart/" . $m['mhs_nim'] ?>">Chart</a>
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