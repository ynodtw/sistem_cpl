<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body d-flex justify-content-end">
						<?php if ($_SESSION['data_login']['role'] == "superadmin" || $_SESSION['data_login']['role'] == "prodi") { ?>
							<a href="<?= base_url("data-cpl/add") ?>" class=" btn btn-success">+ Tambah Data</a>
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
									<th>Kode</th>
									<th>Kategori</th>
									<th>Deskripsi</th>
									<?php if ($_SESSION['data_login']['role'] == "superadmin" || $_SESSION['data_login']['role'] == "prodi") { ?>
										<th></th>
									<?php } ?>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								if (!empty($cpl)) {
									foreach ($cpl as $c) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $c['cpl_kd'] ?></td>
											<td><?= $c['cpl_kategori'] ?></td>
											<td><?= $c['cpl_deskripsi'] ?></td>
											<?php if ($_SESSION['data_login']['role'] == "superadmin" || $_SESSION['data_login']['role'] == "prodi") { ?>
												<td>
													<!-- <a class="btn btn-primary" data-toggle="modal" data-target="#modalLihat-<?= $c['id'] ?>">Lihat</a> -->
													<a class="btn btn-warning" href="<?= base_url() . "data-cpl/edit/" . $c['id'] ?>">Ubah</a>
													<a class="btn btn-danger" href="<?= base_url() . "cpl/delete/" . $c['id'] ?>" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
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