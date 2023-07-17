<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="<?= base_url("jurusan/insert") ?>" enctype="multipart/form-data">
							<div class="form-group">
								<label for="jrs_kd">Kode</label>
								<input type="jrs_kd" class="form-control" id="jrs_kd" name="jrs_kd" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="jurusan">Jurusan</label>
								<input type="text" class="form-control" id="jrs_nama" name="jrs_nama" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="fakultas">Fakultas</label>
								<select class="form-control" id="jrs_fakultas" name="jrs_fakultas" required>
									<option value="Teknik">Teknik</option>
									<option value="Ekonomi">Ekonomi</option>
									<option value="FISIP">FISIP</option>
									<option value="Perikanan">Perikanan</option>
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