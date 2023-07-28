<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="<?= base_url("prodi/insert") ?>" enctype="multipart/form-data">
							<div class="form-group">
								<label for="prd_kd">Kode</label>
								<input type="prd_kd" class="form-control" id="prd_kd" name="prd_kd" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="prd_fakultas">Fakultas</label>
								<select class="form-control" id="prd_fakultas" name="prd_fakultas" required>
									<option value="">--Pilih Jurusan--</option>
									<option value="Teknik">Teknik</option>
									<option value="Ekonomi">Ekonomi</option>
									<option value="FISIP">FISIP</option>
									<option value="Perikanan">Perikanan</option>
								</select>
							</div>

							<div class="form-group">
								<label for="prd_jurusan">Jurusan</label>
								<input type="text" class="form-control" id="prd_jurusan" name="prd_jurusan" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="prd_kajur">Kajur</label>
								<input type="text" class="form-control" id="prd_kajur" name="prd_kajur" placeholder="" required>
							</div>

							<button type="submit" class="btn btn-primary">Submit</button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>