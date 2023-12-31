<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="<?= base_url("cplmk/update") ?>" enctype="multipart/form-data">
							<input name="id" value="<?= $cplmk["id"] ?>" type="hidden">
							<input name="id_cpl" value="<?= $cplmk["id_cpl"] ?>" type="hidden">
							<input name="id_nilai_mk" value="<?= $cplmk["id_nilai_mk"] ?>" type="hidden">

							<div class="form-group">
								<!-- <label for="id_cpl">Kode CPL</label> -->
								<select class="form-control" id="id_cpl" name="id_cpl" hidden>
									<?php foreach ($cpl as $c) { ?>
										<option value="<?= $c['id'] ?>" <?= $c['id'] == $cplmk['id_cpl'] ? "selected" : ""   ?>>(<?= $c['cpl_kd'];  ?>) <?= $c['cpl_kategori'];  ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label for="cpl_deskripsi">Capaian Pembelajaran Lulusan</label>
								<textarea name="cpl_deskripsi" class="form-control" id="cpl_deskripsi" cols="30" rows="8" readonly><?= $cplmk['cpl_kd'];  ?> - <?= $cplmk['cpl_deskripsi'];  ?></textarea>
							</div>

							<div class="form-group">
								<label for="n_cplmk">Nilai CPL</label>
								<input type="number" class="form-control" id="n_cplmk" name="n_cplmk" placeholder="Masukkan angka 1 - 100" min="0" max="100" value="<?= $cplmk['n_cplmk'];  ?>" required>
							</div>

							<button type="submit" class="btn btn-primary">Submit</button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>