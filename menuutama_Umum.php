<?php
	session_start();
	if (empty($_SESSION['username']) or empty($_SESSION['level'])) {
		echo "<script>alert('Maaf, untuk mengakses halaman ini, Anda harus Login terlebih dahulu, Terima Kasih.');
			window.location.href='index.php'</script>";
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Menu Utama · WMS Telkom</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="manifest" href="assets/js/web.webmanifest">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

	<style>
		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
		}

		body {
			font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
			background: #f1f5f9;
			min-height: 100vh;
		}

		/* ===== NAVBAR ===== */
		.navbar-custom {
			background: linear-gradient(135deg, #0a2b5c 0%, #004a99 50%, #0066d9 100%);
			padding: 0.6rem 0;
			box-shadow: 0 4px 20px rgba(0, 40, 100, 0.25);
			border-bottom: 3px solid rgba(255, 255, 255, 0.1);
		}

		.navbar-custom .navbar-brand {
			font-weight: 700;
			font-size: 1.25rem;
			color: #ffffff !important;
			letter-spacing: -0.01em;
			display: flex;
			align-items: center;
			gap: 0.6rem;
		}

		.navbar-custom .navbar-brand i {
			font-size: 1.8rem;
			color: #8ab8ff;
		}

		.navbar-custom .navbar-brand span {
			font-weight: 300;
			color: #8ab8ff;
		}

		.navbar-custom .nav-link {
			color: rgba(255, 255, 255, 0.85) !important;
			font-weight: 500;
			font-size: 0.95rem;
			padding: 0.6rem 1.2rem;
			border-radius: 30px;
			transition: all 0.2s ease;
			display: flex;
			align-items: center;
			gap: 0.5rem;
		}

		.navbar-custom .nav-link:hover {
			background: rgba(255, 255, 255, 0.15);
			color: #ffffff !important;
			transform: translateY(-1px);
		}

		.navbar-custom .nav-link i {
			font-size: 1.1rem;
		}

		/* Dropdown */
		.navbar-custom .dropdown-menu {
			background: #ffffff;
			border: none;
			border-radius: 16px;
			box-shadow: 0 12px 40px rgba(0, 20, 50, 0.15);
			padding: 0.5rem 0;
			margin-top: 0.5rem;
			min-width: 200px;
		}

		.navbar-custom .dropdown-menu .dropdown-item {
			font-weight: 500;
			font-size: 0.9rem;
			color: #1a3a5c;
			padding: 0.6rem 1.5rem;
			display: flex;
			align-items: center;
			gap: 0.6rem;
			transition: all 0.15s;
		}

		.navbar-custom .dropdown-menu .dropdown-item:hover {
			background: #eef4fb;
			color: #004a99;
		}

		.navbar-custom .dropdown-menu .dropdown-item i {
			font-size: 1.1rem;
			color: #0066d9;
		}

		/* Tombol Akun (dropdown toggle) */
		.btn-account {
			background: rgba(255, 255, 255, 0.12);
			border: 1px solid rgba(255, 255, 255, 0.2);
			border-radius: 30px;
			padding: 0.4rem 1.2rem 0.4rem 0.8rem;
			color: #ffffff !important;
			font-weight: 600;
			display: flex;
			align-items: center;
			gap: 0.6rem;
			transition: all 0.2s;
			text-decoration: none;
		}

		.btn-account:hover {
			background: rgba(255, 255, 255, 0.2);
			border-color: rgba(255, 255, 255, 0.35);
		}

		.btn-account .avatar-circle {
			width: 34px;
			height: 34px;
			background: rgba(255, 255, 255, 0.2);
			border-radius: 50%;
			display: flex;
			align-items: center;
			justify-content: center;
			font-weight: 700;
			font-size: 0.9rem;
			color: #ffffff;
		}

		/* ===== CONTAINER IFRAME ===== */
		.main-container {
			padding: 1.5rem 1.8rem;
			max-width: 100%;
		}

		.iframe-wrapper {
			background: #ffffff;
			border-radius: 24px;
			box-shadow: 0 8px 30px rgba(0, 20, 40, 0.06);
			overflow: hidden;
			border: 1px solid #e9edf4;
			height: 700px;
		}

		.iframe-wrapper iframe {
			width: 100%;
			height: 100%;
			border: none;
			display: block;
		}

		/* ===== RESPONSIVE ===== */
		@media (max-width: 768px) {
			.navbar-custom .navbar-brand {
				font-size: 1rem;
			}
			.navbar-custom .navbar-brand i {
				font-size: 1.4rem;
			}
			.navbar-custom .nav-link {
				padding: 0.4rem 1rem;
				font-size: 0.85rem;
			}
			.main-container {
				padding: 0.8rem;
			}
			.iframe-wrapper {
				height: 500px;
				border-radius: 16px;
			}
		}

		@media (max-width: 576px) {
			.btn-account .avatar-circle {
				width: 28px;
				height: 28px;
				font-size: 0.75rem;
			}
			.btn-account span:not(.avatar-circle) {
				font-size: 0.85rem;
			}
		}
	</style>
</head>
<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg navbar-custom">
	<div class="container">
		<!-- Brand tanpa logo gambar -->
		<a class="navbar-brand" href="menuutama_Admin.php">
			<i class="bi bi-boxes"></i>
			SISTEM INFORMASI <span>GUDANG</span>
		</a>

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav ms-auto align-items-lg-center gap-1">
				<!-- Beranda -->
				<li class="nav-item">
					<a class="nav-link" href="menuutama_Umum.php">
						<i class="bi bi-house-door"></i> Beranda
					</a>
				</li>

				<!-- Laporan Dropdown -->
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button">
						<i class="bi bi-file-earmark-text"></i> Laporan
					</a>
					<ul class="dropdown-menu">
						<li>
							<a class="dropdown-item" href="daftarbarang.php" target="frmmenu">
								<i class="bi bi-archive"></i> Daftar Barang
							</a>
						</li>
						<li>
							<a class="dropdown-item" href="daftargudang.php" target="frmmenu">
								<i class="bi bi-building"></i> Daftar Gudang
							</a>
						</li>
					</ul>
				</li>

				<!-- Akun Dropdown dengan tombol lebih rapi -->
				<li class="nav-item dropdown">
					<a class="btn-account dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<span class="avatar-circle">
							<?php 
								// Inisial user untuk avatar
								$initial = 'U';
								if (!empty($_SESSION['username'])) {
									$initial = strtoupper(substr($_SESSION['username'], 0, 1));
								}
								echo $initial;
							?>
						</span>
						<span>Akun</span>
					</a>
					<ul class="dropdown-menu dropdown-menu-end">
						<li>
							<form action="form_password.php" method="post" class="d-inline">
								<button type="submit" class="dropdown-item" style="background:none; border:none; width:100%; text-align:left;">
									<i class="bi bi-key"></i> Reset Password
								</button>
							</form>
						</li>
						<li><hr class="dropdown-divider"></li>
						<li>
							<form action="logout.php" method="post" class="d-inline">
								<button type="submit" class="dropdown-item" style="background:none; border:none; width:100%; text-align:left; color:#d9534f;">
									<i class="bi bi-box-arrow-right"></i> Logout
								</button>
							</form>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
</nav>

<!-- ===== MAIN CONTENT ===== -->
<div class="main-container">
	<div class="iframe-wrapper">
		<iframe src="beranda_Umum.php" name="frmmenu"></iframe>
	</div>
</div>

</body>
</html>