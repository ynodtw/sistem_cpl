<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body d-flex">
						<div class="col-10 d-flex justify-content-start">
							<span style="font-size:x-large;"><?= @$nama ?> <?= @$nim ?></span>
						</div>
						<!-- <div class="col-2 d-flex justify-content-end">
							<a href="<?= base_url("data-nilai/add/" . $id_mhs . "?nama-mhs=" . $nama . "&nim-mhs=" . $nim) ?>" class="btn btn-success">+ Tambah Data</a>
						</div> -->
					</div>
				</div>

				<div class="card">
					<div class="card-body">
						<!-- <a href="" class="btn btn-success"><i class="fas fa-print"></i> Print</a> -->
						<table class="table table-bordered datatable">
							<thead>
								<tr>
									<th>No.</th>
									<!-- <th>Kode Matkul</th>
									<th>Nama Mata Kuliah</th> -->
									<th>Kode CPL</th>
									<th>Deskripsi</th>
									<th>Nilai</th>
									<th>Detail</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
								if (!empty($nilai_cpl)) {
									foreach ($nilai_cpl as $nc) { ?>
										<tr>
											<td><?= $no++ ?></td>
											<!-- <td><?= $nc['mk_kd'] ?></td>
											<td><?= $nc['mk_nama'] ?></td> -->
											<td><?= $nc['cpl_kd'] ?></td>
											<td><?= $nc['cpl_deskripsi'] ?></td>
											<!-- <td><?= number_format($nc['cpl_akumulasi'], 1) ?></td> -->
											<td>
												<?php
												if ($nc['cpl_akumulasi'] < 50) {
													echo "<span style='color:red'>" . $nc['cpl_akumulasi'] . "</span>";
												} else {
													echo "<span>" . $nc['cpl_akumulasi'] . "</span>";
												}
												?>
											</td>
											<td>
												<a class="btn btn-primary" data-toggle="modal" data-target="#modalLihat-<?= $nc['cpl_kd'] ?>">Lihat</a>
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

<?php $no = 1;
if (!empty($nilai_cpl)) {
	foreach ($nilai_cpl as $nc) { ?>
		<div class="modal fade" id="modalLihat-<?= $nc['cpl_kd'] ?>" tabindex="-1" role="dialog" aria-labelledby="modalLihat-<?= $nc['cpl_kd'] ?>Label" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Detail Nilai</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<table class="table table-bordered">
							<tr>
								<td>Kode Matakuliah</td>
								<td>Matakuliah</td>
								<td>Nilai</td>
							</tr>
							<?php foreach ($nc['detail'] as $detail) { ?>
								<tr>
									<td><?= $detail['mk_kd'] ?></td>
									<td><?= $detail['mk_nama'] ?></td>
									<!-- <td><?= $detail['n_cplmk'] ?></td> -->
									<td>
										<?php
										if ($detail['n_cplmk'] < 50) {
											echo "<span style='color:red'>" . $detail['n_cplmk'] . "</span>";
										} else {
											echo "<span>" . $detail['n_cplmk'] . "</span>";
										}
										?>
									</td>
								</tr>
							<?php } ?>
						</table>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
<?php } ?>