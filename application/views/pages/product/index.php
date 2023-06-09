<div class="container">
	<div class="row mt-4 mb-3">
		<div class="col-lg-12">
			<h2>Daftar Game</h2>
			<a href="<?= base_url('product/cetak_product'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
			<a href="<?= base_url('product/pdf_product'); ?>" class="btn btn-danger mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a>
			<a href="<?= base_url('product/excel_product'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Export ke Excel</a>
		</div>
	</div>

	<?php $this->load->view('layouts/_alert') ?>

	<div class="row mt-3">
		<div class="col">
			<table class="table table-light text-center">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Gambar</th>
						<th>Nama</th>
						<th>Harga</th>
						<th>Edisi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($product as $p) : ?>
						<tr>
							<td><?= $no++ ?></td>
							<td>
								<picture>
									<source srcset="" type="image/svg+xml">
									<img src="<?= base_url('images/game/') . $p['image']; ?>" class="img-fluid img-thumbnail" alt="..." style="width:100px;height:120px;">
								</picture>
							</td>
							<td><?= $p['name'] ?></td>
							<td>Rp<?= number_format($p['price'], 2, ',', '.'); ?></td>
							<td><?= ucfirst($p['edition']) ?></td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>