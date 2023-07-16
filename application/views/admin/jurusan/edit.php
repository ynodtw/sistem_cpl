<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="<?= base_url("jurusan/update") ?>" enctype="multipart/form-data">
							<input name="id" value="<?= $jurusan["id"] ?>" type="hidden">
							<div class="form-group">
								<label for="jrs_kd">Kode</label>
								<input type="text" class="form-control" id="jrs_kd" value="<?= $jurusan["jrs_kd"] ?>" name="jrs_kd" placeholder="" readonly>
							</div>

							<div class="form-group">
								<label for="jrs_nama">Jurusan</label>
								<input type="text" class="form-control" id="jrs_nama" value="<?= $jurusan["jrs_nama"] ?>" name="jrs_nama" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="jrs_fakultas">Fakultas</label>
								<select class="form-control" id="jrs_fakultas" name="jrs_fakultas" required>
									<option <?= $jurusan["jrs_fakultas"] == "Teknik" ? "selected" : "" ?> value="Teknik">Teknik</option>
									<option <?= $jurusan["jrs_fakultas"] == "Ekonomi" ? "selected" : "" ?> value="Ekonomi">Ekonomi</option>
									<option <?= $jurusan["jrs_fakultas"] == "FISIP" ? "selected" : "" ?> value="FISIP">FISIP</option>
									<option <?= $jurusan["jrs_fakultas"] == "Perikanan" ? "selected" : "" ?> value="Perikanan">Perikanan</option>
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