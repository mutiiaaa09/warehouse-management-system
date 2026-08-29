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
  <title>Form Cari Barang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<?php 
  if ((isset($_POST['KodeBarang'])) and (!empty($_POST['KodeBarang']))) {
    $KodeBarang=filter_var($_POST['KodeBarang'],FILTER_SANITIZE_STRING);
    include('koneksi.db.php');
    $sql="select * from barang where KodeBarang ='".$KodeBarang."'";
    $q=mysqli_query($koneksi,$sql);
    $r=mysqli_fetch_array($q);
    if (empty($r)) {
      echo '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.history.back()"></button>
    <strong>Cari Barang</strong> Barang tidak ditemukan ! </div>';
      exit();
    } else {
      echo '<div class="alert alert-success alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    <strong>Cari Barang</strong> Barang Ditemukan ! </div>';
    }
?>
<div class="container">
  <h2>Form Hasil Cari Barang</h2>
  <form method="post" action="simpankoreksibarang.php">
    <div class="input-group row">
        <label for="KodeBarang" class="col-4 col-form-label">Kode Barang</label>
        <div class="col-8">
            <input id="KodeBarang" type="text" class="form-control" name="KodeBarang" value="<?php echo $r['KodeBarang'];?>">
        </div>
    </div>
    <div class="input-group row">
        <label for="NamaBarang" class="col-4 col-form-label">Nama Barang</label> 
        <div class="col-8">
            <input id="NamaBarang" type="text" class="form-control" name="NamaBarang" value="<?php echo $r['NamaBarang'];?>">
        </div>
    </div>
    <div class="input-group row">
        <label for="JumlahStok" class="col-4 col-form-label">Jumlah Stok Barang</label> 
        <div class="col-8">
            <input id="JumlahStok" type="text" class="form-control" name="JumlahStok" value="<?php echo $r['JumlahStok'];?>">
        </div>
    </div>
    <div class="input-group row">
        <label for="Satuan" class="col-4 col-form-label">Satuan Barang</label>
        <div class="col-8">
            <input id="Satuan" type="text" class="form-control" name="Satuan" value="<?php echo $r['Satuan'];?>">
        </div>
    </div>
    <div class="input-group row">
        <label for="Harga" class="col-4 col-form-label">Harga Satuan Barang</label>
        <div class="col-8">
        <input id="Harga" type="text" class="form-control" name="Harga" value="<?php echo $r['Harga'];?>">
        </div>
    </div><br>
    <div>
        <button type="submit" class="btn btn-primary">Simpan Hasil Koreksi Barang</button>
        <button type="submit" class="btn btn-success" formaction="hapusbarang.php">Hapus Barang</button>
        <a href="barang.php" class="btn btn-primary">Form Barang</a>
        </form>
    </div>
</div>
<?php 
  } else {
    echo '<div class="alert alert-danger alert-dismissible">
    <button type="button" class="btn-close" data-bs-dismiss="alert" onclick="window.history.back()"></button>
    <strong>Cari Barang</strong> Barang Tidak Ditemukan ! Kode Barang tidak boleh kosong. </div>';
  }
?> 
</body>
</html>