<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body d-flex">
						<div class="col-10 d-flex justify-content-start">
							<span style="font-size:x-large;"><?= @$cpl[0]['mhs_nama'] ?> <?= @$cpl[0]['mhs_nim'] ?></span>
						</div>
						<!-- <div class="col-2 d-flex justify-content-end">
							<a href="<?= base_url("data-nilai/add/" . $id_mhs . "?nama-mhs=" . $nama . "&nim-mhs=" . $nim) ?>" class="btn btn-success">+ Tambah Data</a>
						</div> -->
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<!-- <a href="" class="btn btn-success"><i class="fas fa-print"></i> Print</a> -->
						<table class="table table-bordered table-striped datatable">
							<thead>
								<tr>
									<th>No.</th>
									<th>Kode Matkul</th>
									<th>Nama Mata Kuliah</th>
									<th>Kode CPL</th>
									<th>Deskripsi</th>
									<th>Nilai</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								if (!empty($nilai_cpl)) {
									foreach ($nilai_cpl as $nc) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<td><?= $nc['mk_kd'] ?></td>
											<td><?= $nc['mk_nama'] ?></td>
											<td><?= $nc['cpl_kd'] ?></td>
											<td><?= $nc['cpl_deskripsi'] ?></td>
											<td><?= $nc['cpl_akumulasi'] ?></td>
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