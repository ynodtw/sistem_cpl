<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="<?= base_url("matakuliah/update") ?>" enctype="multipart/form-data">
							<input name="id" value="<?= $matakuliah["id"] ?>" type="hidden">
							<div class="form-group">
								<label for="mk_smt">Semester</label>
								<select class="form-control" id="mk_smt" name="mk_smt" required>
									<option <?= $matakuliah["mk_smt"] == "1" ? "selected" : "" ?> value="1">1</option>
									<option <?= $matakuliah["mk_smt"] == "2" ? "selected" : "" ?> value="2">2</option>
									<option <?= $matakuliah["mk_smt"] == "3" ? "selected" : "" ?> value="3">3</option>
									<option <?= $matakuliah["mk_smt"] == "4" ? "selected" : "" ?> value="4">4</option>
									<option <?= $matakuliah["mk_smt"] == "5" ? "selected" : "" ?> value="5">5</option>
									<option <?= $matakuliah["mk_smt"] == "6" ? "selected" : "" ?> value="6">6</option>
									<option <?= $matakuliah["mk_smt"] == "7" ? "selected" : "" ?> value="7">7</option>
									<option <?= $matakuliah["mk_smt"] == "8" ? "selected" : "" ?> value="8">8</option>
								</select>
							</div>

							<div class="form-group">
								<label for="mk_kd">Kode MK</label>
								<input type="text" class="form-control" id="mk_kd" value="<?= $matakuliah["mk_kd"] ?>" name="mk_kd" placeholder="" readonly>
							</div>

							<div class="form-group">
								<label for="mk_nama">Matakuliah</label>
								<input type="text" class="form-control" id="mk_nama" value="<?= $matakuliah["mk_nama"] ?>" name="mk_nama" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="mk_sks">SKS</label>
								<input type="text" class="form-control" id="mk_sks" value="<?= $matakuliah["mk_sks"] ?>" name="mk_sks" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="mk_prasyarat">Prasyarat</label>
								<input type="text" class="form-control" id="mk_prasyarat" value="<?= $matakuliah["mk_prasyarat"] ?>" name="mk_prasyarat" placeholder="">
							</div>

							<div class="form-group">
								<label for="mk_keterangan">Keterangan</label>
								<input type="text" class="form-control" id="mk_keterangan" value="<?= $matakuliah["mk_keterangan"] ?>" name="mk_keterangan" placeholder="">
							</div>

							<div class="form-group">
								<label for="bobot_absen">Bobot Absen (%)</label>
								<input type="text" class="form-control" id="bobot_absen" value="<?= $matakuliah["bobot_absen"] ?>" name="bobot_absen" placeholder="">
							</div>

							<div class="form-group">
								<label for="bobot_tugas">Bobot Tugas (%)</label>
								<input type="text" class="form-control" id="bobot_tugas" value="<?= $matakuliah["bobot_tugas"] ?>" name="bobot_tugas" placeholder="">
							</div>

							<div class="form-group">
								<label for="bobot_uts">Bobot UTS (%)</label>
								<input type="text" class="form-control" id="bobot_uts" value="<?= $matakuliah["bobot_uts"] ?>" name="bobot_uts" placeholder="">
							</div>

							<div class="form-group">
								<label for="bobot_uas">Bobot UAS (%)</label>
								<input type="text" class="form-control" id="bobot_uas" value="<?= $matakuliah["bobot_uas"] ?>" name="bobot_uas" placeholder="">
							</div>

							<button type="submit" class="btn btn-primary">Submit</button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>