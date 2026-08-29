<?php
session_start();

// Cek session
if (empty($_SESSION['username']) || empty($_SESSION['level'])) {
    echo "<script>
        alert('Akses Ditolak! Silakan login terlebih dahulu.');
        window.location.href='index.php';
    </script>";
    exit;
}

// ===== KONEKSI DATABASE =====
$host = "localhost";
$user = "root";
$password = "";
$database = "gudangkita";

$koneksi = mysqli_connect($host, $user, $password, $database);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// ===== AMBIL DATA DARI FORM =====
$username = mysqli_real_escape_string($koneksi, $_POST['username']);
$password_lama = mysqli_real_escape_string($koneksi, $_POST['pass_lama']);
$password_baru = mysqli_real_escape_string($koneksi, $_POST['pass_baru']);
$konfirmasi_password = mysqli_real_escape_string($koneksi, $_POST['konfirmasi_pass']);

// Enkripsi password lama dengan MD5 (sesuai database)
$password_lama_encrypted = md5($password_lama);

// ===== CEK APAKAH PASSWORD LAMA SESUAI =====
$tampil = mysqli_query($koneksi, "SELECT * FROM tuser WHERE username = '$username' AND password = '$password_lama_encrypted'");
$data = mysqli_fetch_array($tampil);

// Jika data ditemukan, password lama sesuai
if ($data) {
    // Cek apakah password baru dan konfirmasi sama
    if ($password_baru == $konfirmasi_password) {
        // Enkripsi password baru dengan MD5
        $pass_ok = md5($konfirmasi_password);
        
        // Update password di database
        $ubah = mysqli_query($koneksi, "UPDATE tuser SET password = '$pass_ok' WHERE id_login = '$data[id_login]'");
        
        if ($ubah) {
            echo "<script>
                alert('✅ Password anda berhasil diubah! Silakan logout untuk menguji password baru.');
                window.location.href='form_password.php';
            </script>";
        } else {
            echo "<script>
                alert('❌ Gagal mengubah password: " . mysqli_error($koneksi) . "');
                window.location.href='form_password.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('❌ Maaf, Password Baru & Konfirmasi Password tidak sama!');
            window.location.href='form_password.php';
        </script>";
    }
} else {
    echo "<script>
        alert('❌ Maaf, password lama anda tidak sesuai!');
        window.location.href='form_password.php';
    </script>";
}

mysqli_close($koneksi);
?>