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
	<title>Simpan Barang Baru</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
	<h2>Simpan Barang Baru</h2>
	<div class="alert alert-success alert-dismissible">
	<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	<strong>Simpan Barang Baru</strong> 
		<?php 
		if ((isset($_POST['KodeBarang'])) and (!empty($_POST['KodeBarang']))) {
			$KodeBarang=filter_var($_POST['KodeBarang'],FILTER_SANITIZE_STRING);
			$NamaBarang=filter_var($_POST['NamaBarang'],FILTER_SANITIZE_STRING);
			$JumlahStok=filter_var($_POST['JumlahStok'],FILTER_SANITIZE_STRING);
			$Satuan=filter_var($_POST['Satuan'],FILTER_SANITIZE_STRING);
			$Harga=filter_var($_POST['Harga'],FILTER_SANITIZE_STRING);
			include('koneksi.db.php');
			$sql="update barang set NamaBarang='".$NamaBarang."',JumlahStok='".$JumlahStok."',Satuan='".$Satuan."',Harga='".$Harga."' WHERE KodeBarang='".$KodeBarang."'";
			if (mysqli_query($koneksi,$sql)) {
				echo 'Rekord barang sudah disimpan !';
			} else {
				echo 'Rekord barang gagal disimpan !';
			}
		}
		?>
</div>
	<a href="barang.php" class="btn btn-success">Form Barang</a>
</div>

</body>
</html>