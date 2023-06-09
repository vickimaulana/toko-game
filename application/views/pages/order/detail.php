<div class="container">
	<div class="row justify-content-center mt-4">
		<div class="col-12">
			<div class="card">
				<h5 class="card-header text-center"><strong>Detail Pesanan #<?= $order['invoice'] ?></strong></h5>
				<div class="card-body">
					<ul>
						<li>Tanggal: <?= $order['date'] ?></li>
						<li>Nama: <?= $order['name'] ?></li>
						<li>Nomor HP : <?= $order['phone'] ?></li>
						<li>Status :
							<?php if ($order['status'] == 'waiting') : ?>
								<span class="badge badge-primary"><?= $order['status'] ?></span>
							<?php elseif ($order['status'] == 'paid') : ?>
								<span class="badge badge-warning text-light"><?= $order['status'] ?></span>
							<?php elseif ($order['status'] == 'cancel') : ?>
								<span class="badge badge-danger"><?= $order['status'] ?></span>
							<?php endif; ?>
						</li>
						<li>Serial Number :
							<?php if ($order['status'] == 'waiting') : ?>
								<span> Pengguna belum mengkonfirmasi pembayaran</span>
							<?php elseif ($order['status'] == 'paid') : ?>
								<span> <?= $order['serial_number'] ?> </span>
							<?php elseif ($order['status'] == 'cancel') : ?>
								<span> Pesanan telah dibatalkan</span>
							<?php endif; ?>
						</li>
					</ul>

					<table class="table table-bordered text-center">
						<thead class="thead-dark">
							<tr>
								<th>Game</th>
								<th>Harga</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($order_detail as $od) : ?>
								<tr>
									<td>
										<img src="<?= base_url('images/game/' . $od['image']) ?>" style="width:200px">
									</td>
									<td>
										<h5>Rp<?= number_format($od['price'], 2, ',', '.') ?></h5>
									</td>
								</tr>
							<?php endforeach ?>
						</tbody>
						<tfoot class="bg-success text-light">
							<tr>
								<td><strong>Total</strong></td>
								<td>
									<h5><strong>Rp<?= number_format(array_sum(array_column($order_detail, 'subtotal')), 2, ',', '.') ?></strong></h5>
								</td>
							</tr>
						</tfoot>
					</table>
				</div>
				<div class="card-footer">
					<form action="<?= base_url("order/update/" . $order['id']) ?>" method="post">
						<input type="hidden" name="id" value="<?= $order['id'] ?>">
						<div class="input-group">
							<select name="status" class="form-control">
								<option value="waiting" <?= $order['status'] == 'waiting' ? 'selected' : '' ?>>Waiting</option>
								<option value="paid" <?= $order['status'] == 'paid' ? 'selected' : '' ?>>Paid</option>
								<option value="cancel" <?= $order['status'] == 'cancel' ? 'selected' : '' ?>>Cancel</option>
							</select>
							<div class="input-group-append">
								<button class="btn btn-info" type="submit">Simpan</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php if (isset($order_confirm)) : ?>
		<div class="row mt-3 mb-5">
			<div class="col-8">
				<div class="card">
					<h5 class="card-header">Konfirmasi Pembayaran</h5>
					<div class="card-body">
						<p>Account Name: <strong class="text-info"><?= $order_confirm['account_name'] ?></strong></p>
						<p>Account Number: <strong class="text-info"><?= $order_confirm['account_number'] ?></strong></p>
					</div>
				</div>
			</div>

			<div class="col-4 text-center">
				<img src="<?= base_url('images/payments/' . $order_confirm['image']) ?>" height="200px">
			</div>
		</div>
	<?php endif ?>
</div>