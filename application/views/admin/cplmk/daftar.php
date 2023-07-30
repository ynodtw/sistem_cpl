<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body d-flex">
						<div class="col-10 d-flex justify-content-start">
							<span style="font-size:x-large;"><?= $nama ?> <?= $nim ?></span>
							<span style="font-size:x-large;"><?= $mk_kd ?> <?= $mk_nama ?></span>
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
									<th>Kode CPL</th>
									<th>Kategori</th>
									<th>Deskripsi</th>
									<th>Nilai</th>
									<?php if ($_SESSION['data_login']['role'] != "mahasiswa") { ?>
										<th></th>
									<?php } ?>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								if (!empty($cplmk)) {
									foreach ($cplmk as $cm) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $cm['cpl_kd'] ?></td>
											<td><?= $cm['cpl_kategori'] ?></td>
											<td><?= $cm['cpl_deskripsi'] ?></td>
											<td><?= $cm['n_cplmk'];  ?></td>
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