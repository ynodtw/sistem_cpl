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
								<label for="dsn_fakultas">Fakultas</label>
								<select class="form-control" id="dsn_fakultas" name="dsn_fakultas" required>
									<option <?= $dosen["dsn_fakultas"] == "Teknik" ? "selected" : "" ?> value="Teknik">Teknik</option>
									<!-- <option <?= $dosen["dsn_fakultas"] == "Ekonomi" ? "selected" : "" ?> value="Ekonomi">Ekonomi</option>
									<option <?= $dosen["dsn_fakultas"] == "FISIP" ? "selected" : "" ?> value="FISIP">FISIP</option>
									<option <?= $dosen["dsn_fakultas"] == "Perikanan" ? "selected" : "" ?> value="Perikanan">Perikanan</option> -->
								</select>
							</div>

							<div class="form-group">
								<label for="dsn_jurusan">jurusan</label>
								<select class="form-control" id="dsn_jurusan" name="dsn_jurusan" required>
									<option <?= $dosen["dsn_jurusan"] == "Teknik Informatika" ? "selected" : "" ?> value="Teknik Informatika">Teknik Informatika</option>
									<option <?= $dosen["dsn_jurusan"] == "Sistem Informasi" ? "selected" : "" ?> value="Sistem Informasi">Sistem Informasi</option>
									<option <?= $dosen["dsn_jurusan"] == "Teknik Lingkungan" ? "selected" : "" ?> value="Teknik Lingkungan">Teknik Lingkungan</option>
									<option <?= $dosen["dsn_jurusan"] == "Manajemen Informasi" ? "selected" : "" ?> value="Manajemen Informasi">Manajemen Informasi</option>
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