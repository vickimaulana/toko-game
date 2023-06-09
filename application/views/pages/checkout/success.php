<div class="container">
	<div class="row mt-4">
		<div class="col">
			<div class="card">
				<h5 class="card-header">Sukses Checkout</h5>
				<div class="card-body">
					<h4><strong>Nomor Pesanan : <?= $content['invoice'] ?></strong></h4>
					<p>Terima kasih telah membeli.</p>
					<br>
					<p>Silakan lakukan pembayaran dengan prosedur berikut:</p>
					<ol>
						<li>Lakukan pembayaran ke rekening <strong>BCA 0123456789</strong> An. Kelompok 4</li>
						<li>Sertakan informasi dengan nomor pesanan <strong><?= $content['invoice'] ?></strong></li>
						<li>Total pembayaran <strong>Rp<?= number_format($content['total'], 0, ',', '.') ?></strong></li>
					</ol>
					<p>Jika sudah melakukan pembayaran, mohon kirimkan bukti transfer<a href="<?= base_url('myorder/detail/' . $content['invoice']) ?>"> ke link ini</a></p>
					<a href="<?= base_url('home') ?>" class="btn btn-primary btn-sm">Kembali</a>
				</div>
			</div>
		</div>
	</div>
</div>