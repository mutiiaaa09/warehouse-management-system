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
	  <title>Menu Utama</title>
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="manifest" href="assets/js/web.webmanifest">
	  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	  <link rel="stylesheet" href="assets/css/styles.css">
	  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

	  <style>
body {
	background-image: url('assets/images/');
	background-size: cover; 
}	
body {
    background-color: #F0ECE5;
  }
.navbar{
    background-color: #008B8B;
  }
.container-fluid{
    padding-right: 5px;
  }
img.avatar {
    margin: 5px;
    margin-right: 10px;
    width: 10%;
    border-radius: 15%;
  }

</style>
</head>
<body>

<nav class="navbar navbar-expand-sm  navbar-dark">
	<div class="container">
		<a class="navbar-brand" href="menuutama_Admin.php"><img src="assets/images/logogudang.gif" width="70px" height="70px" alt="Logo" class="logo">&nbsp;SISTEM INFORMASI GUDANG</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
		  <span class="navbar-toggler-icon"></span>
		</button>
			<div class="cart-items-container" id="collapsibleNavbar">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="menuutama_Operator.php" style="color: white">Beranda</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="transaksibarang.php" target="frmmenu" style="color: white">Transaksi</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" style="color: white">Laporan</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="daftarbarang.php" target="frmmenu">Daftar Barang</a></li>
						<li><a class="dropdown-item" href="daftargudang.php" target="frmmenu">Daftar Gudang</a></li>
					</ul>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link btn btn-success dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" style="color: white">Akun</a>
					<ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<li>
							<form class="dropdown-item" action="form_password.php" method="post">
								<button class="dropdown-item" >Reset Password</button>
							</form>
						</li>
						<li>
							<form class="dropdown-item" action="logout.php" method="post">
								<button class="dropdown-item" >Logout</button>
							</form>
						</li>
					</ul>
				</li>
			</ul>
			</div>
	</div>
</nav>
	
	<div class="container-fluid mt-3">
		<iframe src="beranda_Operator.php" name="frmmenu" width="100%" height="700px"></iframe>
	</div>
	
</body>
</html>