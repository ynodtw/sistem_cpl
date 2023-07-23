<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="<?= base_url("Mahasiswa/update") ?>" enctype="multipart/form-data">
							<input name="id" value="<?= $mahasiswa["id"] ?>" type="hidden">
							<div class="form-group">
								<label for="mhs_nim">NIM</label>
								<input type="text" class="form-control" id="mhs_nim" value="<?= $mahasiswa["mhs_nim"] ?>" name="mhs_nim" placeholder="" readonly>
							</div>

							<div class="form-group">
								<label for="mhs_nama">Nama</label>
								<input type="text" class="form-control" id="mhs_nama" value="<?= $mahasiswa["mhs_nama"] ?>" name="mhs_nama" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="mhs_fakultas">Fakultas</label>
								<select class="form-control" id="mhs_fakultas" name="mhs_fakultas" required>
									<option <?= $mahasiswa["mhs_fakultas"] == "Teknik" ? "selected" : "" ?> value="Teknik">Teknik</option>
									<!-- <option <?= $mahasiswa["mhs_fakultas"] == "Ekonomi" ? "selected" : "" ?> value="Ekonomi">Ekonomi</option>
									<option <?= $mahasiswa["mhs_fakultas"] == "FISIP" ? "selected" : "" ?> value="FISIP">FISIP</option>
									<option <?= $mahasiswa["mhs_fakultas"] == "Perikanan" ? "selected" : "" ?> value="Perikanan">Perikanan</option> -->
								</select>
							</div>

							<div class="form-group">
								<label for="mhs_jurusan">jurusan</label>
								<select class="form-control" id="mhs_jurusan" name="mhs_jurusan" required>
									<option <?= $mahasiswa["mhs_jurusan"] == "Teknik Informatika" ? "selected" : "" ?> value="Teknik Informatika">Teknik Informatika</option>
									<option <?= $mahasiswa["mhs_jurusan"] == "Sistem Informasi" ? "selected" : "" ?> value="Sistem Informasi">Sistem Informasi</option>
									<option <?= $mahasiswa["mhs_jurusan"] == "Teknik Lingkungan" ? "selected" : "" ?> value="Teknik Lingkungan">Teknik Lingkungan</option>
									<option <?= $mahasiswa["mhs_jurusan"] == "Manajemen Informasi" ? "selected" : "" ?> value="Manajemen Informasi">Manajemen Informasi</option>
								</select>
							</div>

							<div class="form-group">
								<label for="mhs_status">Status</label>
								<select class="form-control" id="mhs_status" name="mhs_status" required>
									<option <?= $mahasiswa["mhs_status"] == "Aktif" ? "selected" : "" ?> value="aktif">Aktif</option>
									<option <?= $mahasiswa["mhs_status"] == "Non Aktif" ? "selected" : "" ?> value="Non Aktif">Non Aktif</option>
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