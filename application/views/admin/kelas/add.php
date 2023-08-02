<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="<?= base_url("kelas/insert") ?>" enctype="multipart/form-data">

							<!-- <div class="form-group">
								<label for="prd_id">Fakultas</label>
								<select class="form-control" id="prd_id" name="prd_id" required>
									<option value="">--Pilih Fakultas--</option>
									<?php foreach ($prodi as $p) { ?>
										<option value=""><?= $p['fk_nama'];  ?></option>
									<?php } ?>
								</select>
							</div> -->

							<div class="form-group">
								<label for="prd_id">Jurusan</label>
								<select class="form-control" id="prd_id" name="prd_id" required>
									<option value="">--Pilih Jurusan--</option>
									<?php foreach ($prodi as $p) { ?>
										<option value="<?= $p['id'];  ?>"><?= $p['prd_jurusan'];  ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label for="dsn_id">Dosen</label>
								<select class="form-control" id="dsn_id" name="dsn_id" required>
									<option value="">--Pilih Dosen--</option>
									<?php foreach ($dosen as $d) { ?>
										<option value="<?= $d['id'];  ?>"><?= $d['dsn_nama'];  ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label for="kelas_nama">Kelas</label>
								<input type="text" class="form-control" id="kelas_nama" name="kelas_nama" placeholder="" required>
							</div>

							<div class="form-group">
								<label for="mk_id">Matakuliah</label>
								<select class="form-control" id="mk_id" name="mk_id" required>
									<option value="">--Pilih Matakuliah--</option>
									<?php foreach ($matakuliah as $mk) { ?>
										<option value="<?= $mk['id'];  ?>"><?= $mk['mk_nama'];  ?></option>
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