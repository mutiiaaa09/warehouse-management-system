<?php
session_start();
if (empty($_SESSION['username']) || empty($_SESSION['level'])) {
    echo "<script>
        alert('Akses Ditolak! Silakan login terlebih dahulu.');
        window.location.href='index.php';
    </script>";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganti Kata Sandi | WMS Telkom</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: #f1f5f9;
            font-family: 'Inter', -apple-system, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
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

        .btn-logout {
            background: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 30px;
            padding: 0.4rem 1.2rem;
            color: #ffffff !important;
            font-weight: 600;
            transition: all 0.2s;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-logout:hover {
            background: rgba(255, 255, 255, 0.2);
            border-color: rgba(255, 255, 255, 0.35);
            color: #ffffff !important;
        }

        /* ===== FORM CONTAINER ===== */
        .form-container {
            max-width: 520px;
            margin: 50px auto;
            background: #ffffff;
            padding: 2.5rem 2.8rem;
            border-radius: 32px;
            box-shadow: 0 20px 50px rgba(0, 20, 40, 0.12);
            border: 1px solid #e9edf4;
            flex: 1;
        }

        @media (max-width: 480px) {
            .form-container {
                padding: 2rem 1.5rem;
                border-radius: 24px;
                margin: 20px 1rem;
            }
        }

        .form-container .header-icon {
            background: linear-gradient(135deg, #0a2b5c, #0066d9);
            width: 64px;
            height: 64px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            margin: 0 auto 1.2rem auto;
            box-shadow: 0 8px 20px rgba(0, 40, 100, 0.2);
        }

        .form-container h3 {
            font-weight: 700;
            color: #0b2b4a;
            font-size: 1.6rem;
            text-align: center;
            margin-bottom: 0.3rem;
        }

        .form-container .subtitle {
            color: #5b7b9a;
            font-size: 0.95rem;
            text-align: center;
            margin-bottom: 1.8rem;
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

        .btn-simpan {
            background: linear-gradient(135deg, #198754, #20b86a);
            border: none;
            border-radius: 40px;
            padding: 0.8rem 1.5rem;
            font-weight: 700;
            font-size: 1rem;
            color: white;
            transition: all 0.2s;
            box-shadow: 0 8px 18px -6px rgba(25, 135, 84, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 0.6rem;
        }

        .btn-simpan:hover {
            background: linear-gradient(135deg, #157347, #1aa35a);
            transform: scale(1.02);
            box-shadow: 0 12px 24px -8px rgba(25, 135, 84, 0.4);
            color: white;
        }

        .btn-batal {
            background: transparent;
            border: 1.5px solid #d7e1ec;
            border-radius: 40px;
            padding: 0.8rem 1.5rem;
            font-weight: 600;
            color: #1a3a5c;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-batal:hover {
            background: #eef4fb;
            border-color: #b8d0e9;
        }

        .info-user {
            background: #f0f5fe;
            border-radius: 16px;
            padding: 0.8rem 1.2rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            font-size: 0.9rem;
            color: #0b2b4a;
        }

        .info-user i {
            color: #0066d9;
            font-size: 1.2rem;
        }

        .info-user strong {
            color: #004a99;
        }

        /* ===== FOOTER ===== */
        .footer-custom {
            background: linear-gradient(135deg, #0a2b5c, #004a99);
            color: rgba(255, 255, 255, 0.7);
            text-align: center;
            padding: 0.8rem 0;
            margin-top: auto;
            font-size: 0.85rem;
            border-top: 1px solid rgba(255, 255, 255, 0.05);
        }

        .footer-custom span {
            color: #8ab8ff;
        }
    </style>
</head>

<body>

<!-- ===== NAVBAR ===== -->
<nav class="navbar navbar-expand-lg navbar-custom">
    <div class="container">
        <a class="navbar-brand" href="menuutama_Admin.php">
            <i class="bi bi-boxes"></i>
            SISTEM INFORMASI <span>GUDANG</span>
        </a>
        <div class="ms-auto">
            <form action="logout.php" method="post" class="d-inline">
                <button type="submit" class="btn-logout" style="background:none; border:1px solid rgba(255,255,255,0.2);">
                    <i class="bi bi-box-arrow-right"></i> Keluar
                </button>
            </form>
        </div>
    </div>
</nav>

<!-- ===== FORM ===== -->
<div class="form-container">
    <div class="header-icon">
        <i class="bi bi-key"></i>
    </div>
    <h3>Ganti Kata Sandi</h3>
    <p class="subtitle">Perbarui kata sandi Anda untuk keamanan akun</p>

    <!-- Informasi User -->
    <div class="info-user">
        <i class="bi bi-person-circle"></i>
        <div>
            <strong><?= htmlspecialchars($_SESSION['username']) ?></strong> 
            <span class="text-muted">· Level: <?= htmlspecialchars($_SESSION['level']) ?></span>
        </div>
    </div>

    <form method="post" action="ganti_password.php">
        <input type="hidden" name="username" value="<?= htmlspecialchars($_SESSION['username']) ?>">

        <div class="mb-3">
            <label class="form-label-custom" for="pass_lama">
                <i class="bi bi-lock"></i> Kata Sandi Lama
            </label>
            <input type="password" class="form-control-custom" id="pass_lama" name="pass_lama" 
                   placeholder="Masukkan kata sandi lama" required>
        </div>

        <div class="mb-3">
            <label class="form-label-custom" for="pass_baru">
                <i class="bi bi-key"></i> Kata Sandi Baru
            </label>
            <input type="password" class="form-control-custom" id="pass_baru" name="pass_baru" 
                   placeholder="Masukkan kata sandi baru" required>
        </div>

        <div class="mb-4">
            <label class="form-label-custom" for="konfirmasi_pass">
                <i class="bi bi-check-circle"></i> Konfirmasi Kata Sandi Baru
            </label>
            <input type="password" class="form-control-custom" id="konfirmasi_pass" name="konfirmasi_pass" 
                   placeholder="Masukkan ulang kata sandi baru" required>
        </div>

        <div class="d-flex gap-3 justify-content-between flex-wrap">
            <button type="submit" class="btn-simpan">
                <i class="bi bi-save"></i> Simpan
            </button>
            <a href="menuutama_Admin.php" class="btn-batal">
                <i class="bi bi-x-circle"></i> Batal
            </a>
        </div>
    </form>
</div>

<!-- ===== FOOTER ===== -->
<footer class="footer-custom">
    <div class="container">
        <p class="mb-0">
            <i class="bi bi-c-circle"></i> <?= date('Y') ?> 
            <span>Sistem Informasi Gudang</span> · 
            <i class="bi bi-shield-check"></i> Enterprise v2.0
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>