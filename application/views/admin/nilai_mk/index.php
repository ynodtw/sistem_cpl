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
						<!-- <?php if ($_SESSION['data_login']['role'] != "mahasiswa") { ?>
							<div class="col-2 d-flex justify-content-end">
								<a href="<?= base_url("data-nilai-matakuliah/add/" . $id_mhs . "?nama-mhs=" . $nama . "&nim-mhs=" . $nim) ?>" class="btn btn-success">+ Tambah Data</a>
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
									<th>Semester</th>
									<th>Kode MK</th>
									<th>Mata Kuliah</th>
									<th>Absensi</th>
									<th>Tugas</th>
									<th>UTS</th>
									<th>UAS</th>
									<th>Akumulasi</th>
									<th>Nilai</th>
									<!-- <?php if ($_SESSION['data_login']['role'] != "mahasiswa") { ?>
										<th></th>
									<?php } ?> -->
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
											<td>
												<?php
												if ($nm['n_absen'] < 50) {
													echo "<span style='color:red'>" . $nm['n_absen'] . "</span>";
												} else {
													echo "<span>" . $nm['n_absen'] . "</span>";
												}
												?>
											</td>
											<td>
												<?php
												if ($nm['n_tugas'] < 50) {
													echo "<span style='color:red'>" . $nm['n_tugas'] . "</span>";
												} else {
													echo "<span>" . $nm['n_tugas'] . "</span>";
												}
												?>
											</td>
											<td>
												<?php
												if ($nm['n_uts'] < 50) {
													echo "<span style='color:red'>" . $nm['n_uts'] . "</span>";
												} else {
													echo "<span>" . $nm['n_uts'] . "</span>";
												}
												?>
											</td>
											<td>
												<?php
												if ($nm['n_uas'] < 50) {
													echo "<span style='color:red'>" . $nm['n_uas'] . "</span>";
												} else {
													echo "<span>" . $nm['n_uas'] . "</span>";
												}
												?>
											</td>
											<td>
												<?php
												if ($nm['n_akumulasi'] < 50) {
													echo "<span style='color:red'>" . $nm['n_akumulasi'] . "</span>";
												} else {
													echo "<span>" . $nm['n_akumulasi'] . "</span>";
												}
												?>
											</td>
											<td> <a class="btn btn-success" href="<?= base_url() . "data-cplmk/" . $nm['id'] ?>">CPLMK</a></td>
											<!-- <?php if ($_SESSION['data_login']['role'] != "mahasiswa") { ?>
												<td>
													<a class="btn btn-warning" href="<?= base_url() . "data-nilai-matakuliah/edit/" . $nm['id'] ?>">Ubah</a>
													<a class="btn btn-danger" href="<?= base_url() . "nilai_mk/delete/" . $nm['id'] ?>" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
												</td>
											<?php } else { ?>
												<td></td>
											<?php } ?> -->
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