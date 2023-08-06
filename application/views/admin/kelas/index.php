<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body d-flex justify-content-end">

						<a href="<?= base_url("data-kelas/add") ?>" class=" btn btn-success">+ Tambah Data</a>

					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<!-- <a href="" class="btn btn-success"><i class="fas fa-print"></i> Print</a> -->
						<table class="table table-bordered table-striped" id="example1">
							<thead>
								<tr>
									<th>No.</th>
									<!-- <th>Fakultas</th> -->
									<th>Jurusan</th>
									<th>Dosen</th>
									<th>Kelas</th>
									<th>Matakuliah</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								if (!empty($kelas)) {
									foreach ($kelas as $k) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<!-- <td><?= $k['fk_nama'] ?></td> -->
											<td><?= $k['prd_jurusan'] ?></td>
											<td><?= $k['dsn_nama'] ?></td>
											<td><?= $k['kelas_nama'] ?></td>
											<td><?= $k['mk_nama'] ?></td>
											<td>
												<a class="btn btn-success" href="<?= base_url() . "data-kelas/detail/" . $k['mk_id'] . "?kelas=" . $k['kelas_nama'] ?>">Lihat</a>
												<?php if ($_SESSION['data_login']['role'] == "superadmin" || $_SESSION['data_login']['role'] == "prodi" || $_SESSION['data_login']['role'] == "prodi") { ?>
													<a class="btn btn-warning" href="<?= base_url() . "data-kelas/edit/" . $k['id'] ?>">Ubah</a>
													<a class="btn btn-danger" href="<?= base_url() . "kelas/delete/" . $k['id'] ?>" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
												<?php } ?>
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
<!-- <?php if (!empty($kelas)) { ?>
	<?php foreach ($kelas as $k) { ?>
		<div class="modal fade" id="modalLihat-<?= $k['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLihat-<?= $k['id'] ?>Label" aria-hidden="true">
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
								<td><?= $k['dsn_nid'] ?></td>
							</tr>
							<tr>
								<td>Nama</td>
								<td><?= $k['dsn_nama'] ?></td>
							</tr>
							<tr>
								<td>Jenis Kelamin</td>
								<td><?= $k['dsn_fakultas'] ?></td>
							</tr>
							<tr>
								<td>Jurusan</td>
								<td><?= $k['dsn_jurusan'] ?></td>
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