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
								<label for="prd_jurusan">Jurusan</label>
								<input type="text" class="form-control" id="prd_jurusan" name="prd_jurusan" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="fk_id">Fakultas</label>
								<select class="form-control" id="fk_id" name="fk_id" required>
									<option value="">--Pilih Fakultas--</option>
									<?php foreach ($prodi as $p) { ?>
										<option value="<?= $p['id'] ?>"><?= $p['fk_nama'];  ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label for="dsn_id">Kepala Jurusan</label>
								<select class="form-control" id="dsn_id" name="dsn_id" required>
									<option value="">--Pilih Dosen--</option>
									<?php foreach ($dosen as $d) { ?>
										<option value="<?= $d['id'] ?>"><?= "(" . $d['fk_nama'] . ")" . " " . $d['dsn_nama']  ?></option>
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