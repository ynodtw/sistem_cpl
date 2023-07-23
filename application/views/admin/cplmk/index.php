<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body d-flex">
						<div class="col-10 d-flex justify-content-start">
						</div>
						<div class="col-2 d-flex justify-content-end">
							<a href="<?= base_url("data-cplmk/") ?>" class="btn btn-success">+ Tambah Data</a>
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
									<th>Kode MK</th>
									<th>Mata Kuliah / Kode CPL</th>
									<?php foreach ($cpl as $cpl) { ?>
										<th><?= $cpl['cpl_kd'];  ?></th>
									<?php } ?>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								if (!empty($cplmk)) {
									foreach ($cplmk as $cm) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $cm['mk_kd'] ?></td>
											<td><?= $cm['mk_nama'] ?></td>
											<?php foreach ($cplmk as $cm2) { ?>
												<td>
													<div class="input-group mb-3">
														<div class="input-group-prepend">
															<div class="input-group-text">
																<input type="checkbox" aria-label="Checkbox for following text input">
															</div>
														</div>
													</div>
												</td>
											<?php } ?>
											<td>
												<!-- <a class="btn btn-primary" data-toggle="modal" data-target="#modalLihat-<?= $n['id'] ?>">Lihat</a> -->
												<!-- <a class="btn btn-success" href="<?= base_url() . "#" ?>">+</a>
												<a class="btn btn-warning" href="<?= base_url() . "#" ?>">Ubah</a> -->
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