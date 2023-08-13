<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body d-flex">
						<div class="col-10 d-flex justify-content-start">
							<span style="font-size:x-large;"><?= $mhs_nama ?> <?= $mhs_nim ?> | </span>
							<span style="font-size:x-large;"><?= $mk_kd ?> <?= $mk_nama ?></span>
						</div>
						<!-- <?php if ($_SESSION['data_login']['role'] != "mahasiswa") { ?>
							<div class="col-2 d-flex justify-content-end">
								<a href="<?= base_url("data-cplmk/add/" . $id_nilai_mk) ?>" class="btn btn-success">+ Tambah Data</a>
							</div>
						<?php } ?> -->
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
											<td>
												<?php
												if ($cm['n_cplmk'] < 50) {
													echo "<span style='color:red'>" . $cm['n_cplmk'] . "</span>";
												} else {
													echo "<span'>" . $cm['n_cplmk'] . "</span>";
												}
												?>
											</td>
											<?php if ($_SESSION['data_login']['role'] != "mahasiswa") { ?>
												<td>
													<a class="btn btn-warning btn-sm" href="<?= base_url() . "data-cplmk/edit/" . $cm['id'] ?>">Ubah</a>
													<!-- <a class="btn btn-danger btn-sm" href="<?= base_url() . "cplmk/delete/" . $cm['id'] ?>" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a> -->
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