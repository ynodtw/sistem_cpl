<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="<?= base_url("mahasiswa/insert") ?>" enctype="multipart/form-data">
							<div class="form-group">
								<label for="mhs_nim">NIM</label>
								<input type="mhs_nim" class="form-control" id="mhs_nim" name="mhs_nim" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="mhs_nama">Nama Lengkap</label>
								<input type="text" class="form-control" id="mhs_nama" name="mhs_nama" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="fk_id">Fakultas</label>
								<select class="form-control" id="fk_id" name="fk_id" required>
									<option value="">--Pilih Fakultas--</option>
									<?php foreach ($fakultas as $f) { ?>
										<option value="<?= $f['id'] ?>"><?= $f['fk_nama'];  ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label for="prd_id">Jurusan</label>
								<select class="form-control" id="prd_id" name="prd_id" required>
									<option value="">--Pilih Jurusan--</option>
									<?php foreach ($prodi as $p) { ?>
										<option value="<?= $p['id'] ?>">(<?= $p['prd_kd'];  ?>)<?= $p['prd_jurusan'];  ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label for="dsn_id">Dosen PA</label>
								<select class="form-control" id="dsn_id" name="dsn_id" required>
									<option value="">--Dosen PA--</option>
									<?php foreach ($dosen as $d) { ?>
										<option value="<?= $d['id'] ?>"><?= $d['dsn_nama'];  ?> - <?= $d['prd_jurusan'] ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label for="mhs_status">Status</label>
								<select class="form-control" id="mhs_status" name="mhs_status" required>
									<option value="Aktif">Aktif</option>
									<option value="Non Aktif">Non Aktif</option>
								</select>
							</div>

							<button type="submit" class="btn btn-primary">Submit</button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>