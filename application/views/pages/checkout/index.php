<div class="container">
	<div class="row mt-4">
		<div class="col-8">
			<div class="card">
				<h5 class="card-header">Formulir Data Pengguna</h5>
				<div class="card-body">
					<form action="<?= base_url('checkout/create') ?>" method="POST">
						<div class="form-group">
							<label>Nama Pembeli</label>
							<input type="text" class="form-control" name="name">
							<?= form_error('name', '<small class="text-danger mt-1">', '</small>'); ?>
						</div>
						<div class="form-group">
							<label>Nomor HP</label>
							<input type="number" class="form-control" name="phone">
							<?= form_error('phone', '<small class="text-danger mt-1">', '</small>'); ?>
						</div>
						<button type="submit" class="btn btn-info">Simpan</button>
					</form>
				</div>
			</div>
		</div>

		<div class="col">
			<div class="row">
				<div class="card mb-3">
					<h5 class="card-header">Keranjang Anda</h5>
					<div class="card-body">
						<table class="table">
							<thead>
								<tr>
									<th>Produk</th>
									<th>Harga</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($cart as $c) : ?>
									<tr>
										<td><?= $c['name'] ?></td>
										<td>Rp<?= number_format($c['price'], 2, ',', '.') ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
							<tfoot>
								<tr>
									<th>Total</th>
									<th>Rp<?= number_format(array_sum(array_column($cart, 'subtotal')), 2, ',', '.') ?>,-</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>