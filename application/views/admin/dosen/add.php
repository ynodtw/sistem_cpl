<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="<?= base_url("dosen/insert") ?>" enctype="multipart/form-data">
							<div class="form-group">
								<label for="dsn_nid">NID</label>
								<input type="dsn_nid" class="form-control" id="dsn_nid" name="dsn_nid" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="fullname">Nama Lengkap</label>
								<input type="text" class="form-control" id="dsn_nama" name="dsn_nama" placeholder="" required>
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
								<label for="status">Status</label>
								<select class="form-control" id="dsn_status" name="dsn_status" required>
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