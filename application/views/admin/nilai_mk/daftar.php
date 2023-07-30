<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body d-flex">
						<div class="col-10 d-flex justify-content-start">
							<span style="font-size:x-large;"><?= $nama ?> <?= $nim ?></span>
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
									<th>Semester</th>
									<th>Kode MK</th>
									<th>Mata Kuliah</th>
									<th>Absensi</th>
									<th>Tugas</th>
									<th>UTS</th>
									<th>UAS</th>
									<th>Akumulasi</th>
									<th>Nilai</th>
									<?php if ($_SESSION['data_login']['role'] != "mahasiswa") { ?>
										<th></th>
									<?php } ?>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								if (!empty($nilai_mk)) {
									foreach ($nilai_mk as $nm) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $nm['mk_smt'] ?></td>
											<td><?= $nm['mk_kd'] ?></td>
											<td><?= $nm['mk_nama'] ?></td>
											<td><?= $nm['n_absen'] ?></td>
											<td><?= $nm['n_tugas'] ?></td>
											<td><?= $nm['n_uts'] ?></td>
											<td><?= $nm['n_uas'] ?></td>
											<td><?= $nm['n_akumulasi'] ?></td>
											<td> <a class="btn btn-success" href="<?= base_url() . "data-cplmk/daftar/" . $nm['id'] ?>">CPLMK</a></td>
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