<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="<?= base_url("users/updateBiodata") ?>" enctype="multipart/form-data">
							<input name="id" value="<?= $users["id"] ?>" type="hidden">

							<div class="form-group">
								<img src="<?= base_url("assets/img/") . $users['photo'] ?>" style="width:150px;"><br>
								<label for="Photo">Photo</label>
								<input type="file" class="form-control" id="Photo" name="photo" accept="image/png, image/jpeg, image/jpg">
							</div>

							<div class="form-group">
								<label for="fullname">Nama Lengkap</label>
								<input type="text" class="form-control" id="fullname" name="fullname" placeholder="" value="<?= $users["fullname"] ?>" required>
							</div>

							<div class="form-group">
								<label for="nik">NIK</label>
								<input type="text" class="form-control" id="nik" name="nik" placeholder="" value="<?= $users["nik"] ?>" required>
							</div>

							<div class="form-group">
								<label for="tempat_lahir">Tempat Lahir</label>
								<input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="" value="<?= $users["tempat_lahir"] ?>">
							</div>

							<div class="form-group">
								<label for="tgl_lahir">Tanggal Lahir</label>
								<input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" placeholder="" value="<?= $users["tgl_lahir"] ?>">
							</div>

							<div class="form-group">
								<label for="agama">Agama</label>
								<input type="text" class="form-control" id="agama" name="agama" placeholder="" value="<?= $users["agama"] ?>">
							</div>

							<div class="form-group">
								<label for="kewarganegaraan">Kewarganegaraan</label>
								<input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" placeholder="" value="<?= $users["kewarganegaraan"] ?>">
							</div>

							<!-- <div class="form-group">
								<label for="gender">Gender</label>
								<input type="text" class="form-control" id="gender" name="gender" placeholder="" value="<?= $users["gender"] ?>" required>
							</div> -->

							<div class="form-group">
								<div class="col-xs-6">
									<label for="gender">Jenis Kelamin</label>
									<select class="form-control" id="gender" name="gender" required>
										<option <?= $users['gender'] == "laki-laki" ? "selected" : "" ?> value="laki-laki">Laki-laki</option>
										<option <?= $users['gender'] == "perempuan" ? "selected" : "" ?> value="perempuan">Perempuan</option>
									</select>
								</div>
							</div>

							<div class="form-group">
								<label for="no_telp">No. Telpon</label>
								<input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="" value="<?= $users["no_telp"] ?>">
							</div>

							<button type="submit" class="btn btn-primary">Submit</button>

						</form>
					</div>
				</div>
			</div>

			<!-- <div class="col-6">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="<?= base_url("users/updatePassword") ?>" enctype="multipart/form-data">
							<input name="id" value="<?= $users["id"] ?>" type="hidden">

							<div class="form-group">
								<label for="password">Password Baru</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
							</div>

							<div class="form-group">
								<label for="password2">Ulangi Password</label>
								<input type="password" class="form-control" id="password2" name="password2" placeholder="Ulangi Password">
							</div>

							<button type="submit" class="btn btn-primary">Submit</button>

						</form>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</section>