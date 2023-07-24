<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="<?= base_url("cpl/insert") ?>" enctype="multipart/form-data">
							<div class="form-group">
								<label for="cpl_kd">Kode CPL</label>
								<input type="text" class="form-control" id="cpl_kd" name="cpl_kd" placeholder="" required>
							</div>

							<!-- <div class="form-group">
								<label for="cpl_kategori">Kategori CPL</label>
								<input type="text" class="form-control" id="cpl_kategori" name="cpl_kategori" placeholder="" required>
							</div> -->

							<div class="form-group">
								<label for="cpl_kategori">Kategori</label>
								<select class="form-control" id="cpl_kategori" name="cpl_kategori" required>
									<option value="Sikap">Sikap</option>
									<option value="Pengetahuan">Pengetahuan</option>
									<option value="Keterampilan Umum">Keterampilan Umum</option>
									<option value="Keterampilan Khusus">Keterampilan Khusus</option>
								</select>
							</div>

							<div class="form-group">
								<label for="cpl_deskripsi">Deskripsi</label>
								<textarea class="form-control" id="cpl_deskripsi" name="cpl_deskripsi" rows="3"></textarea>
							</div>

							<button type="submit" class="btn btn-primary">Submit</button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>