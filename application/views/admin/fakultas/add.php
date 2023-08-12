<section class="content">
	<div class="container-fluid">
		<div class="row">
			<div class="col-6">
				<div class="card">
					<div class="card-body">
						<form method="POST" action="<?= base_url("fakultas/insert") ?>" enctype="multipart/form-data">
							<div class="form-group">
								<label for="fk_nama">Fakultas</label>
								<input type="text" class="form-control" id="fk_nama" name="fk_nama" placeholder="" required>
							</div>

							<button type="submit" class="btn btn-primary">Submit</button>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>