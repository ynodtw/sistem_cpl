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
						<div class="col-2 d-flex justify-content-end">
							<a href="<?= base_url("data-nilai-matakuliah/add/" . $id_mhs . "?nama-mhs=" . $nama . "&nim-mhs=" . $nim) ?>" class="btn btn-success">+ Tambah Data</a>
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
									<th>Tugas</th>
									<th>UTS</th>
									<th>UAS</th>
									<th>Akumulasi</th>
									<th>Nilai</th>
									<th></th>
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
											<td><?= $nm['n_tugas'] ?></td>
											<td><?= $nm['n_uts'] ?></td>
											<td><?= $nm['n_uas'] ?></td>
											<td><?= $nm['n_akumulasi'] ?></td>
											<td> <a class="btn btn-success" href="<?= base_url() . "data-cplmk/" . $nm['id'] ?>">CPLMK</a>
											</td>
											<td>
												<!-- <a class="btn btn-primary" data-toggle="modal" data-target="#modalLihat-<?= $nm['id'] ?>">Lihat</a> -->
												<a class="btn btn-warning" href="<?= base_url() . "#" ?>">Ubah</a>
												<a class="btn btn-danger" href="<?= base_url() . "nilai_mk/delete/" . $nm['id'] ?>" onclick="return confirm('Apakah Anda Yakin?')">Hapus</a>
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