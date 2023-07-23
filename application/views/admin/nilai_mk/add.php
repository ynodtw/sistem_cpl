<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="<?= base_url("nilai_mk/insert") ?>" enctype="multipart/form-data">
							<input type="hidden" name="id_mhs" value="<?= $id_mhs; ?>">
							<strong style="">
								<?= $_GET['nama-mhs'];  ?>
								<?= $_GET['nim-mhs'];  ?>
							</strong>
							<br>
							<br>
							<div class="form-group">
								<label for="id_mk">Matakuliah</label>
								<select class="form-control" id="id_mk" name="id_mk" required>
									<?php foreach ($matakuliah as $mk) { ?>
										<option value="<?= $mk['id'] ?>">(<?= $mk['mk_smt'];  ?>) <?= $mk['mk_kd'];  ?> - <?= $mk['mk_nama'];  ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label for="n_absen">Nilai Absen</label>
								<input type="text" class="form-control" id="n_absen" name="n_absen" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="n_tugas">Nilai Tugas</label>
								<input type="text" class="form-control" id="n_tugas" name="n_tugas" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="n_uts">Nilai UTS</label>
								<input type="text" class="form-control" id="n_uts" name="n_uts" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="n_uas">Nilai UAS</label>
								<input type="text" class="form-control" id="n_uas" name="n_uas" placeholder="" required>
							</div>

							<!-- <div class="form-group">
								<label for="n_akumulasi">Akumulai</label>
								<input type="text" class="form-control" id="n_akumulasi" name="n_akumulasi" placeholder="">
							</div> -->

							<!-- <div class="form-group">
								<label for="mk_keterangan">Keterangan</label>
								<input type="text" class="form-control" id="mk_keterangan" name="mk_keterangan" placeholder="">
							</div> -->

							<button type="submit" class="btn btn-primary">Submit</button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>