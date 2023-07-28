<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="<?= base_url("prodi/update") ?>" enctype="multipart/form-data">
							<input name="id" value="<?= $prodi["id"] ?>" type="hidden">
							<div class="form-group">
								<label for="prd_kd">Kode</label>
								<input type="text" class="form-control" id="prd_kd" value="<?= $prodi["prd_kd"] ?>" name="prd_kd" placeholder="" readonly>
							</div>

							<div class="form-group">
								<label for="prd_fakultas">Fakultas</label>
								<select class="form-control" id="prd_fakultas" name="prd_fakultas" required>
									<option <?= $prodi["prd_fakultas"] == "Teknik" ? "selected" : "" ?> value="Teknik">Teknik</option>
									<option <?= $prodi["prd_fakultas"] == "Ekonomi" ? "selected" : "" ?> value="Ekonomi">Ekonomi</option>
									<option <?= $prodi["prd_fakultas"] == "FISIP" ? "selected" : "" ?> value="FISIP">FISIP</option>
									<option <?= $prodi["prd_fakultas"] == "Perikanan" ? "selected" : "" ?> value="Perikanan">Perikanan</option>
								</select>
							</div>

							<div class="form-group">
								<label for="prd_jurusan">Jurusan</label>
								<input type="text" class="form-control" id="prd_jurusan" value="<?= $prodi["prd_jurusan"] ?>" name="prd_jurusan" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="prd_kajur">Kepala Jurusan</label>
								<input type="text" class="form-control" id="prd_kajur" value="<?= $prodi["prd_kajur"] ?>" name="prd_kajur" placeholder="" required>
							</div>

							<button type="submit" class="btn btn-primary">Submit</button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>