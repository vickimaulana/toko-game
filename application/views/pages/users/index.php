<div class="container">
	<div class="row mt-4 mb-3">
		<div class="col">
			<h2>Daftar Pengguna</h2>
			<a href="<?= base_url('user/cetak_user'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
			<a href="<?= base_url('user/pdf_user'); ?>" class="btn btn-danger mb-3"><i class="far fa-file-pdf"></i> Download Pdf</a>
			<a href="<?= base_url('user/excel_user'); ?>" class="btn btn-success mb-3"><i class="far fa-file-excel"></i> Export ke Excel</a>
		</div>
	</div>

	<?php $this->load->view('layouts/_alert') ?>

	<div class="row mt-3">
		<div class="col">
			<table class="table table-light text-center">
				<thead class="thead-dark">
					<tr>
						<th>#</th>
						<th>Nama</th>
						<th>Email</th>
						<th>Hapus</th>
					</tr>
				</thead>
				<tbody>
					<?php $no = 1;
					foreach ($users as $user) : ?>
						<tr>
							<td><?= $no++ ?></td>
							<td><?= $user['name'] ?></td>
							<td><?= $user['email'] ?></td>
							<td>
								<a href="<?= base_url('user/delete/' . $user['id']) ?>" class="btn btn-danger btn-sm">
									<i class="fas fa-trash"></i>
								</a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>