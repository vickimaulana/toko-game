<div class="container">
	<div class="row justify-content-center mt-4">
		<div class="col-6">
			<div class="card">
				<h5 class="card-header text-center"><strong>Detail Pesanan #<?= $order['invoice'] ?></strong></h5>
				<div class="card-body">
					<ul>
						<li>Tanggal : <?= $order['date'] ?></li>
						<li>Nama : <?= $order['name'] ?></li>
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
								<span> Silakan bayar terlebih dahulu untuk mendapatkan serial number</span>
							<?php elseif ($order['status'] == 'paid') : ?>
								<span> <?= $order['serial_number'] ?> </span>
							<?php elseif ($order['status'] == 'cancel') : ?>
								<span> Pesanan anda telah dibatalkan</span>
							<?php endif; ?>
						</li>
					</ul>

					<hr>
					<div class="text-center text-info">
						<small class="text-dark">Jika Anda memerlukan bantuan atau informasi, Anda dapat menghubungi nomor berikut.</small>
						<br>
						<small>Kelompok 3 | 0821212121</small>
					</div>

					<?php if ($order['status'] == 'waiting') : ?>
						<form action="<?= base_url('myorder/confirm/' .  $order['invoice']) ?>" method="POST">
							<button type="submit" class="btn btn-info btn-sm float-right">Konfirmasi</button>
						</form>
					<?php endif ?>

				</div>
			</div>
		</div>
	</div>
</div>