<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card col-6">
					<div class="card-body d-flex justify-content-end">
						<div>
							<a href="<?= base_url("data-fakultas/add") ?>" class=" btn btn-success">+ Tambah Data</a>
						</div>
					</div>

				</div>

				<div class="card col-6">
					<div class="card-body">
						<!-- <a href="" class="btn btn-success"><i class="fas fa-print"></i> Print</a> -->
						<table class="table table-bordered table-striped" id="example1">
							<thead>
								<tr>
									<th>No.</th>
									<th>Fakultas</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								if (!empty($fakultas)) {
									foreach ($fakultas as $f) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $f['fk_nama'] ?></td>
											<td>
												<a class="btn btn-warning" href="<?= base_url() . "data-fakultas/edit/" . $f['id'] ?>">Ubah</a>
												<a class="btn btn-danger" href="<?= base_url() . "fakultas/delete/" . $f['id'] ?>" onclick="return confirm('Apakah Anda Yakin??')">Hapus</a>
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