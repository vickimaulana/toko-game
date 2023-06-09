<div class="container">

	<div class="row mt-4">
		<div class="col-10">
			<h3>Daftar Pesanan</h3>
			<a href="<?= base_url('order/cetak_order'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
			<a href="<?= base_url('order/pdf_order'); ?>" class="btn btn-danger mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a>
			<a href="<?= base_url('order/excel_order'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Export ke Excel</a>
		</div>
	</div>

	<?php $this->load->view('layouts/_alert') ?>

	<div class="row mt-4">
		<div class="col bg-light p-4">
			<table class="table table-bordered text-center">
				<thead>
					<tr>
						<th>Faktur</th>
						<th>Tanggal</th>
						<th>Total</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($orders as $o) : ?>
						<tr>
							<td><a href="<?= base_url('order/detail/' . $o['id']) ?>"><strong><?= $o['invoice'] ?></strong></a></td>
							<td><?= $o['date'] ?></td>
							<td>Rp<?= number_format($o['total'], 2, ',', '.') ?></td>
							<td>
								<?php if ($o['status'] == 'waiting') : ?>
									<span class="badge badge-primary"><?= $o['status'] ?></span>
								<?php elseif ($o['status'] == 'paid') : ?>
									<span class="badge badge-warning text-light"><?= $o['status'] ?></span>
								<?php elseif ($o['status'] == 'cancel') : ?>
									<span class="badge badge-danger"><?= $o['status'] ?></span>
								<?php endif; ?>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>

</div>