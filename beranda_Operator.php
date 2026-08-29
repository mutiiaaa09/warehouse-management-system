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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Page Title</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/beranda.css">

    <style>
        body {
            margin: 0;
            padding: 0;
            background-image: url('assets/images/gudang2.jpg');
            background-size: cover;
            color: white; /* Set text color to white */
        }
    </style>
</head>
<body>
    <section class="ftco-section dobleh2">
        <div class="text-center">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <h1>Selamat Datang di Sistem informasi Management Gudang.</h1>
                </div>
                <div class="row justify-content-center">
                    <h2>Anda sedang Login sebagai User Operator.</h2>
                    <h2>Semangat Bekerja !! </h2>
                </div>
            </div>
        </div>
    </section>

    <script src="assets/js/script.js"></script>
</body>
</html>