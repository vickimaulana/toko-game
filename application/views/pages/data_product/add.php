<div class="container">
	<div class="row mt-4">
		<div class="col">
			<h2 class="text-center">Tambah Game Baru</h2>
		</div>
	</div>

	<div class="row bg-light p-3 mt-4">
		<div class="col">

			<?= form_open_multipart(base_url('data_product/add')) ?>
			<div class="form-group row">
				<label for="name" class="col-sm-2 col-form-label font-weight-bold">Nama Game</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="name">
					<?= form_error('name', '<small class="form-text text-danger">', '</small>') ?>
				</div>
			</div>
			<div class="row">
				<div class="col-5 offset-2">
					<div class="form-group">
						<label class="font-weight-bold">Harga</label>
						<input type="number" class="form-control" name="price">
						<?= form_error('price', '<small class="form-text text-danger">', '</small>') ?>
					</div>
				</div>
				<div class="col-5">
					<div class="form-group">
						<label class="font-weight-bold">Edisi</label>
						<select class="form-control" name="edition">
							<option value="reguler" selected>Reguler</option>
							<option value="premium">Premium</option>
						</select>
					</div>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label font-weight-bold">Deskripsi</label>
				<div class="col-sm-10">
					<textarea class="form-control" id="summernote" name="description" rows="3"></textarea>
					<?= form_error('description', '<small class="form-text text-danger">', '</small>') ?>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label font-weight-bold">Persyaratan Sistem</label>
				<div class="col-sm-10">
					<textarea class="form-control" id="summernote2" name="requirements" rows="3"></textarea>
					<?= form_error('requirements', '<small class="form-text text-danger">', '</small>') ?>
				</div>
			</div>
			<div class="form-group row">
				<label for="" class="col-sm-2 col-form-label font-weight-bold">Gambar</label>
				<br>
				<div class="col-sm-10">
					<input name="image" type="file" class="form-control-file">
					<?php if ($this->session->flashdata('image_error')) :  ?>
						<small class="form-text text-danger">
							<?= $this->session->flashdata('image_error') ?>
						</small>
					<?php endif ?>
				</div>
			</div>
			<div class="row">
				<div class="col">
					<a href="<?= base_url('data_product') ?>" class="btn btn-secondary btn-sm">
						<i class="fa fa-arrow-left mr-1"></i>
						Kembali
					</a>
					<button type="submit" class="btn btn-info btn-sm float-right">
						<i class="fa fa-save mr-2"></i>
						Simpan
					</button>
				</div>
			</div>
			<?= form_close() ?>
		</div>
	</div>
</div>