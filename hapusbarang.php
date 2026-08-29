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
  <title>Hapus Barang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-3">
  <h2>Hapus Barang</h2>
  <?php 
  if ((isset($_POST['KodeBarang'])) and (!empty($_POST['KodeBarang']))) {
    $KodeBarang = filter_var($_POST['KodeBarang'], FILTER_SANITIZE_STRING);
    include('koneksi.db.php');

    // Check for foreign key constraints
    $checkConstraintQuery = "SELECT * FROM barang WHERE KodeBarang = '".$KodeBarang."'";
    $checkConstraintResult = mysqli_query($koneksi, $checkConstraintQuery);

    if (mysqli_num_rows($checkConstraintResult) > 0) {
      echo '<div class="alert alert-danger alert-dismissible">
        <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.history.back()"></button>
        <strong>Hapus Barang</strong> Barang tidak dapat dihapus karena masih digunakan di tabel lain. </div>';
    } else {
      // No foreign key constraints, proceed with deletion
      $deleteQuery = "DELETE FROM barang WHERE KodeBarang ='".$KodeBarang."'";
      $deleteResult = mysqli_query($koneksi, $deleteQuery);

      if ($deleteResult) {
        echo '<div class="alert alert-success alert-dismissible">
          <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.history.back()"></button>
          <strong>Hapus Barang</strong> Barang sudah dihapus ! </div>';
      } else {
        echo '<div class="alert alert-danger alert-dismissible">
          <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.history.back()"></button>
          <strong>Hapus Barang</strong> Barang gagal dihapus ! </div>';
      }
    }
  } else {
    echo '<div class="alert alert-danger alert-dismissible">
      <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.history.back()"></button>
      <strong>Hapus Barang</strong> Kode Barang tidak valid atau tidak disertakan. </div>';
  }
  ?>
</div>

</body>
</html>
