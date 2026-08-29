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
  <title>Form Cari Gudang</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<?php 
    if ((isset($_POST['KodeGudang'])) and (!empty($_POST['KodeGudang']))) {
        $KodeGudang=filter_var($_POST['KodeGudang'],FILTER_SANITIZE_STRING);
        include('koneksi.db.php');
        $sql="select * from gudang where KodeGudang ='".$KodeGudang."'";
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
    <form method="post" action="simpankoreksigudang.php">
        <div class="input-group row">
            <label for="KodeGudang" class="col-4 col-form-label">Kode Gudang</label>
            <div class="col-8">
                <input id="KodeGudang" type="text" class="form-control" name="KodeGudang" value="<?php echo $r['KodeGudang'];?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="Alamat" class="col-4 col-form-label">Alamat</label> 
            <div class="col-8">
            <input id="Alamat" name="Alamat" cols="40" rows="5" class="form-control" value="<?php echo $r['Alamat'];?>"></input>
            </div>
        </div><br>
        <div>
            <button type="submit" class="btn btn-primary">Simpan Hasil Koreksi Gudang</button>
            <button type="submit" class="btn btn-success" formaction="hapusbarang.php">Hapus Gudang</button>
            <a href="gudang.php" class="btn btn-primary">Form Gudang</a>
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