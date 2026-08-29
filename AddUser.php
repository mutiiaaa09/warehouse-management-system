<?php
session_start();

// Cek apakah admin yang login
if (empty($_SESSION['username']) or $_SESSION['level'] != 'Admin') {
    echo "<script>alert('Maaf, hanya Admin yang dapat mengakses halaman ini.');
        window.location.href='menuutama_Admin.php'</script>";
    exit;
}

// Koneksi ke database
$host = "localhost";
$user = "root";
$password = "";
$database = "gudangkita"; // Nama database Anda

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

$message = "";
$message_type = "";

// Proses tambah user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $level = mysqli_real_escape_string($conn, $_POST['level']);
    $nama_lengkap = mysqli_real_escape_string($conn, $_POST['nama_lengkap']);

    // Cek apakah username sudah ada di tabel tuser
    $check_sql = "SELECT * FROM tuser WHERE username = '$username'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        $message = "❌ Username '$username' sudah terdaftar! Gunakan username lain.";
        $message_type = "danger";
    } else {
        // Hash password dengan MD5 (karena di database Anda pakai MD5)
        $hashed_password = md5($password);

        $sql = "INSERT INTO tuser (username, password, level, nama_lengkap) 
                VALUES ('$username', '$hashed_password', '$level', '$nama_lengkap')";

        if (mysqli_query($conn, $sql)) {
            $message = "✅ User '$username' berhasil ditambahkan!";
            $message_type = "success";
        } else {
            $message = "❌ Gagal menambahkan user: " . mysqli_error($conn);
            $message_type = "danger";
        }
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Add User · WMS Telkom</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,400;14..32,500;14..32,600;14..32,700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, sans-serif;
            background: #f1f5f9;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .card-custom {
            background: #ffffff;
            border-radius: 32px;
            box-shadow: 0 20px 50px rgba(0, 20, 40, 0.12);
            padding: 2.5rem 2.8rem;
            max-width: 520px;
            width: 100%;
            border: 1px solid #e9edf4;
        }

        @media (max-width: 480px) {
            .card-custom {
                padding: 2rem 1.5rem;
                border-radius: 24px;
            }
        }

        .card-custom .header-icon {
            background: linear-gradient(135deg, #0a2b5c, #0066d9);
            width: 64px;
            height: 64px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            margin-bottom: 1.2rem;
            box-shadow: 0 8px 20px rgba(0, 40, 100, 0.2);
        }

        .card-custom h2 {
            font-weight: 700;
            color: #0b2b4a;
            font-size: 1.6rem;
            margin-bottom: 0.3rem;
        }

        .card-custom .subtitle {
            color: #5b7b9a;
            font-size: 0.95rem;
            margin-bottom: 1.8rem;
        }

        .form-control-custom {
            border-radius: 14px;
            border: 1.5px solid #e2e9f2;
            background: #fafcff;
            padding: 0.8rem 1rem;
            font-weight: 500;
            color: #0b2b4a;
            transition: all 0.2s;
            width: 100%;
        }

        .form-control-custom:focus {
            border-color: #0066d9;
            box-shadow: 0 0 0 4px rgba(0, 102, 217, 0.12);
            background: white;
            outline: none;
        }

        .form-control-custom::placeholder {
            color: #a0b8ce;
        }

        .form-label-custom {
            font-weight: 600;
            font-size: 0.85rem;
            color: #1a3a5c;
            margin-bottom: 0.4rem;
            display: flex;
            align-items: center;
            gap: 0.4rem;
        }

        .form-label-custom i {
            color: #0066d9;
        }

        .btn-add-user {
            background: linear-gradient(135deg, #004a99, #0066d9);
            border: none;
            border-radius: 40px;
            padding: 0.9rem 1.5rem;
            font-weight: 700;
            font-size: 1rem;
            color: white;
            width: 100%;
            transition: all 0.2s;
            box-shadow: 0 8px 18px -6px rgba(0, 60, 150, 0.3);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
            margin-top: 0.5rem;
        }

        .btn-add-user:hover {
            background: linear-gradient(135deg, #00337a, #0055b3);
            transform: scale(1.01);
            box-shadow: 0 12px 24px -8px rgba(0, 60, 150, 0.4);
        }

        .btn-back {
            background: transparent;
            border: 1.5px solid #d7e1ec;
            border-radius: 40px;
            padding: 0.7rem 1.5rem;
            font-weight: 600;
            color: #1a3a5c;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-back:hover {
            background: #eef4fb;
            border-color: #b8d0e9;
        }

        .alert-custom {
            border-radius: 16px;
            padding: 0.8rem 1.2rem;
            font-weight: 500;
            font-size: 0.9rem;
            margin-bottom: 1.2rem;
        }

        .footer-note {
            margin-top: 1.5rem;
            font-size: 0.8rem;
            color: #6482a0;
            text-align: center;
            border-top: 1px solid #e4ecf5;
            padding-top: 1.2rem;
        }
    </style>
</head>
<body>

<div class="card-custom">
    <!-- Header -->
    <div class="header-icon">
        <i class="bi bi-person-plus"></i>
    </div>
    <h2>Tambah User Baru</h2>
    <p class="subtitle">
        <i class="bi bi-shield-lock me-1"></i> Hanya Admin yang dapat menambahkan user
    </p>

    <!-- Alert Message -->
    <?php if ($message): ?>
        <div class="alert alert-<?= $message_type ?> alert-custom d-flex align-items-center" role="alert">
            <i class="bi bi-<?= $message_type == 'success' ? 'check-circle' : 'exclamation-triangle' ?> me-2"></i>
            <?= $message ?>
        </div>
    <?php endif; ?>

    <!-- Form Tambah User -->
    <form method="POST" action="">
        <div class="mb-3">
            <label class="form-label-custom" for="username">
                <i class="bi bi-person"></i> Username
            </label>
            <input type="text" class="form-control-custom" id="username" name="username" 
                   placeholder="Masukkan username" required>
        </div>

        <div class="mb-3">
            <label class="form-label-custom" for="password">
                <i class="bi bi-key"></i> Password
            </label>
            <input type="password" class="form-control-custom" id="password" name="password" 
                   placeholder="Masukkan password" required>
        </div>

        <div class="mb-3">
            <label class="form-label-custom" for="nama_lengkap">
                <i class="bi bi-person-badge"></i> Nama Lengkap
            </label>
            <input type="text" class="form-control-custom" id="nama_lengkap" name="nama_lengkap" 
                   placeholder="Masukkan nama lengkap" required>
        </div>

        <div class="mb-4">
            <label class="form-label-custom" for="level">
                <i class="bi bi-shield"></i> Level Akses
            </label>
            <select class="form-control-custom" id="level" name="level" required>
                <option value="Admin">Admin</option>
                <option value="Operator">Operator</option>
                <option value="Umum" selected>Umum</option>
            </select>
        </div>

        <button type="submit" class="btn-add-user">
            <i class="bi bi-person-plus"></i> Tambah User
        </button>
    </form>

    <!-- Tombol Kembali -->
    <div class="text-center mt-3">
        <a href="menuutama_Admin.php" class="btn-back">
            <i class="bi bi-arrow-left"></i> Kembali ke Menu Utama
        </a>
    </div>

    <div class="footer-note">
        <i class="bi bi-database me-1"></i> Data tersimpan di database 
        <span style="color:#004a99; font-weight:600;">gudangkita</span> · tabel 
        <span style="color:#004a99; font-weight:600;">tuser</span>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>