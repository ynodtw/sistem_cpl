<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body d-flex">
						<div class="col-10 d-flex justify-content-start">
							<!-- <span style="font-size:x-large;"><?= $nama ?> <?= $nim ?></span> -->
						</div>
						<div class="col-2 d-flex justify-content-end">
							<a href="<?= base_url("data-nilai/add/" . $id_mhs . "?nama-mhs=" . $nama . "&nim-mhs=" . $nim) ?>" class="btn btn-success">+ Tambah Data</a>
						</div>
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<!-- <a href="" class="btn btn-success"><i class="fas fa-print"></i> Print</a> -->
						<table class="table table-bordered table-striped datatable">
							<thead>
								<tr>
									<th>No.</th>
									<th>Kode</th>
									<th>Kategori</th>
									<th>Deskripsi</th>
									<th>Nilai</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								if (!empty($nilai_cpl)) {
									foreach ($nilai_cpl as $nc) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $nc['cpl_kd'] ?></td>
											<td><?= $nc['cpl_kategori'] ?></td>
											<td><?= $nc['cpl_deskripsi'] ?></td>
											<td><?= $nc['n_cpl'] ?></td>
											<td>
												<!-- <a class="btn btn-primary" data-toggle="modal" data-target="#modalLihat-<?= $nc['id'] ?>">Lihat</a> -->
												<a class="btn btn-success" href="<?= base_url() . "#" ?>">+</a>
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