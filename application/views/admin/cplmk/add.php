<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="<?= base_url("cplmk/insert") ?>" enctype="multipart/form-data">
							<input type="hidden" name="id_nilai_mk" value="<?= $id_nilai_mk; ?>">
							<div class="form-group">
								<label for="id_cpl">Kode CPL</label>
								<select class="form-control" id="id_cpl" name="id_cpl" required>
									<?php foreach ($cpl as $c) { ?>
										<option value="<?= $c['id'] ?>">(<?= $c['cpl_kd'];  ?>) <?= $c['cpl_kategori'];  ?></option>
									<?php } ?>
								</select>
							</div>

							<div class="form-group">
								<label for="n_cplmk">Nilai CPL</label>
								<input type="number" class="form-control" id="n_cplmk" name="n_cplmk" placeholder="Masukkan angka 1 - 100" min="0" max="100" required>
							</div>

							<button type="submit" class="btn btn-primary">Submit</button>

						</form>
					</div>
				</div>
			</div>
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<table class="table table-bordered">
							<?php foreach ($cplmk as $cplmk) { ?>
								<tr>
									<td>
										<b><?= $cplmk['cpl_kd'] . " - " . $cplmk['cpl_kategori'] ?></b><br>
										<small>
											<?= $cplmk['cpl_deskripsi'] ?>
										</small>
									</td>
								</tr>
							<?php } ?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>