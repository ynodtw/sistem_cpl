<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="<?= base_url("dosen/update") ?>" enctype="multipart/form-data">
							<input name="id" value="<?= $dosen["id"] ?>" type="hidden">
							<div class="form-group">
								<label for="dsn_nid">NID</label>
								<input type="text" class="form-control" id="dsn_nid" value="<?= $dosen["dsn_nid"] ?>" name="dsn_nid" placeholder="" readonly>
							</div>

							<div class="form-group">
								<label for="dsn_nama">Nama</label>
								<input type="text" class="form-control" id="dsn_nama" value="<?= $dosen["dsn_nama"] ?>" name="dsn_nama" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="fk_id">Fakultas</label>
								<select class="form-control" id="fk_id" name="fk_id" required>
									<?php foreach ($fakultas as $f) { ?>
										<option value="<?= $f['id'] ?>" <?= $f['id'] == $dosen['fk_id'] ? "selected" : ""  ?>><?= $f['fk_nama'];  ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label for="prd_id">Jurusan</label>
								<select class="form-control" id="prd_id" name="prd_id" required>
									<?php foreach ($prodi as $p) { ?>
										<option value="<?= $p['id'] ?>" <?= $p['id'] == $dosen['prd_id'] ? "selected" : ""  ?>>(<?= $p['prd_kd'];  ?>)<?= $p['prd_jurusan'];  ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label for="dsn_status">Status</label>
								<select class="form-control" id="dsn_status" name="dsn_status" required>
									<option <?= $dosen["dsn_status"] == "Aktif" ? "selected" : "" ?> value="aktif">Aktif</option>
									<option <?= $dosen["dsn_status"] == "Non Aktif" ? "selected" : "" ?> value="Non Aktif">Non Aktif</option>
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