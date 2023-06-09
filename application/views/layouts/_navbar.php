<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<div class="container">
		<a class="navbar-brand" href="<?= base_url('home') ?>">
			<img src="<?= base_url() ?>/images/logo/logo.png" width="170" height="57" class="d-inline-block align-top" alt="logo" loading="lazy">
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<div class="navbar-nav ml-auto">
				<?php if ($this->session->login == TRUE) : ?>
					<!-- Jika yg login user -->
					<?php if ($this->session->userdata('role') == 2) : ?>

						<a class="nav-item nav-link mr-4 active" href="<?= base_url('cart') ?>">
							<i class="fas fa-shopping-cart"></i>
						</a>

						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle mr-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-user"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?= base_url('profile') ?>">
									<i class="fas fa-user-cog"></i>
									Profil
								</a>
								<a class="dropdown-item" href="<?= base_url('myorder') ?>">
									<i class="fas fa-shopping-bag"></i>
									Pesanan Saya
								</a>
								<a class="dropdown-item" href="<?= base_url('profile/password') ?>">
									<i class="fas fa-key"></i>
									Ubah Kata Sandi
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?= base_url('logout') ?>">
									<i class="fas fa-sign-out-alt"></i>
									Keluar
								</a>
							</div>
						</li>
						<!-- Jika admin -->
					<?php else : ?>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle mr-3" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Data Master
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="<?= base_url('banner') ?>">Data Banner</a>
								<a class="dropdown-item" href="<?= base_url('Data_product') ?>">Data Produk</a>
							</div>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle mr-3" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								Laporan
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" href="<?= base_url('product') ?>">Laporan Produk</a>
								<a class="dropdown-item" href="<?= base_url('order') ?>">Laporan Pesanan</a>
								<a class="dropdown-item" href="<?= base_url('user') ?>">Laporan Pengguna</a>
							</div>
						</li>

						<a class="nav-item nav-link mr-4 active" href="<?= base_url('cart') ?>">
							<i class="fas fa-shopping-cart"></i>
						</a>

						<li class="nav-item dropdown active">
							<a class="nav-link dropdown-toggle mr-3" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="fas fa-user"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="<?= base_url('profile') ?>">
									<i class="fas fa-user-cog"></i>
									Profil
								</a>
								<a class="dropdown-item" href="<?= base_url('myorder') ?>">
									<i class="fas fa-shopping-bag"></i>
									Pesanan Saya
								</a>
								<a class="dropdown-item" href="<?= base_url('profile/password') ?>">
									<i class="fas fa-key"></i>
									Ubah Kata Sandi
								</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="<?= base_url('logout') ?>">
									<i class="fas fa-sign-out-alt"></i>
									Keluar
								</a>
							</div>
						</li>


					<?php endif ?>
				<?php else : ?>
					<a class="nav-item nav-link mr-3 active" href="<?= base_url('login') ?>">MASUK</a>
					<a class="nav-item nav-link mr-3 active" href="<?= base_url('register') ?>">DAFTAR</a>
				<?php endif ?>
			</div>
		</div>
	</div>
</nav>