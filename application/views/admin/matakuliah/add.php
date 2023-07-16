<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="<?= base_url("mahasiswa/insert") ?>" enctype="multipart/form-data">
							<div class="form-group">
								<label for="mhs_nim">NIM</label>
								<input type="mhs_nim" class="form-control" id="mhs_nim" name="mhs_nim" placeholder="Masukan NIM" required>
							</div>

							<div class="form-group">
								<label for="fullname">Nama Lengkap</label>
								<input type="text" class="form-control" id="mhs_nama" name="mhs_nama" placeholder="Masukan Nama Lengkap" required>
							</div>

							<div class="form-group">
								<label for="Jenis Kelamin">Jenis Kelamin</label>
								<select class="form-control" id="mhs_gender" name="mhs_gender" required>
									<option value="Laki-laki">Laki-laki</option>
									<option value="Perempuan">Perempuan</option>
								</select>
							</div>

							<div class="form-group">
								<label for="jurusan">Jurusan</label>
								<select class="form-control" id="mhs_jurusan" name="mhs_jurusan" required>
									<option value="Teknik Informatika">Teknik Informatika</option>
									<option value="Sistem Informasi">Sistem Informasi</option>
									<option value="Teknik Lingkungan">Teknik Lingkungan</option>
									<option value="Manajemen Informasi">Manajemen Informasi</option>
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