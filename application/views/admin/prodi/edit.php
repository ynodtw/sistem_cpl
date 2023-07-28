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
								<input type="text" class="form-control" id="prd_kd" value="<?= $prodi["prd_kd"] ?>" name="prd_kd" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="prd_jurusan">Jurusan</label>
								<input type="text" class="form-control" id="prd_jurusan" value="<?= $prodi["prd_jurusan"] ?>" name="prd_jurusan" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="prd_kajur">Kepala Jurusan</label>
								<input type="text" class="form-control" id="prd_kajur" value="<?= $prodi["prd_kajur"] ?>" name="prd_kajur" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="fk_id">Fakultas</label>
								<select class="form-control" id="fk_id" name="fk_id" required>
									<?php foreach ($fakultas as $f) { ?>
										<option value="<?= $f['id'] ?>" <?= $f['id'] == $prodi['fk_id'] ? "selected" : ""  ?>><?= $f['fk_nama'];  ?></option>
									<?php } ?>
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