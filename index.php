<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>WMS Telkom · Login</title>
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
            background: #f0f4fb;
            font-family: 'Inter', -apple-system, sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
            background-image: linear-gradient(145deg, #e8eef6 0%, #d4e0ed 100%);
        }

        .wms-card {
            background: #ffffff;
            border-radius: 40px;
            box-shadow: 0 30px 60px -15px rgba(0, 20, 50, 0.3);
            padding: 2.5rem 2.8rem;
            max-width: 520px;
            width: 100%;
            border: 1px solid rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(2px);
            transition: 0.2s;
        }

        @media (max-width: 480px) {
            .wms-card {
                padding: 2rem 1.5rem;
                border-radius: 28px;
            }
        }

        .brand-header {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 0.25rem;
        }

        .brand-icon {
            background: #0a2b5c;
            width: 48px;
            height: 48px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 26px;
            box-shadow: 0 8px 16px -6px rgba(0, 40, 100, 0.3);
        }

        .brand-text {
            font-weight: 700;
            font-size: 1.5rem;
            letter-spacing: -0.02em;
            color: #0b2b4a;
        }

        .brand-text span {
            color: #0066d9;
        }

        .badge-version {
            background: #dce6f2;
            color: #1a4170;
            font-weight: 600;
            font-size: 0.7rem;
            padding: 0.2rem 0.8rem;
            border-radius: 100px;
            margin-left: auto;
        }

        .greeting-block {
            margin-top: 0.5rem;
            margin-bottom: 1.8rem;
            border-left: 4px solid #0066d9;
            padding-left: 1.2rem;
        }

        .greeting-block h2 {
            font-size: 1.8rem;
            font-weight: 700;
            color: #0b2b4a;
            letter-spacing: -0.01em;
            margin-bottom: 0.1rem;
        }

        .greeting-block h2 small {
            font-size: 1rem;
            font-weight: 500;
            color: #2c5778;
            margin-left: 0.6rem;
        }

        .greeting-block p {
            color: #3a5b7a;
            font-size: 0.95rem;
            font-weight: 400;
            margin-bottom: 0;
        }

        .stat-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 0.75rem;
            margin: 1.5rem 0 2rem 0;
        }

        .stat-item {
            background: #f0f5fe;
            border-radius: 24px;
            padding: 1rem 0.4rem;
            text-align: center;
            transition: 0.15s;
            border: 1px solid transparent;
        }

        .stat-item:hover {
            background: #e6effb;
            border-color: #b8d0e9;
        }

        .stat-number {
            font-size: 1.9rem;
            font-weight: 700;
            color: #004a99;
            line-height: 1.2;
        }

        .stat-label {
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.03em;
            color: #2f5c85;
            margin-top: 0.15rem;
        }

        .quick-access {
            background: #f8faff;
            padding: 1.5rem 1.2rem;
            border-radius: 28px;
            margin: 1.5rem 0 2rem 0;
            border: 1px solid #e9edf4;
        }

        .quick-access .label {
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #4c6e8e;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .menu-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 0.7rem;
        }

        .menu-buttons .btn-outline-menu {
            background: white;
            border: 1px solid #d7e1ec;
            border-radius: 100px;
            padding: 0.5rem 1.2rem;
            font-weight: 500;
            font-size: 0.9rem;
            color: #1b3f62;
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .menu-buttons .btn-outline-menu i {
            font-size: 1.1rem;
            color: #0066d9;
        }

        .menu-buttons .btn-outline-menu:hover {
            background: #0066d9;
            border-color: #0066d9;
            color: white;
            box-shadow: 0 6px 12px -6px rgba(0, 80, 200, 0.3);
        }

        .menu-buttons .btn-outline-menu:hover i {
            color: white;
        }

        /* FORM LOGIN - TETAP FUNGSIONAL */
        .login-form .form-floating {
            margin-bottom: 1rem;
        }

        .login-form .form-floating > .form-control {
            border-radius: 18px;
            border: 1.5px solid #e2e9f2;
            background: #fafcff;
            padding: 1.2rem 1rem 0.6rem 1rem;
            height: calc(3.8rem + 2px);
            font-weight: 500;
            color: #0b2b4a;
            transition: 0.2s;
        }

        .login-form .form-floating > .form-control:focus {
            border-color: #0066d9;
            box-shadow: 0 0 0 4px rgba(0, 102, 217, 0.15);
            background: white;
        }

        .login-form .form-floating > label {
            padding: 1rem 1rem 0.2rem 1rem;
            font-weight: 500;
            color: #5b7b9a;
        }

        .login-form .form-floating > .form-control:focus + label {
            color: #0066d9;
        }

        .login-form .form-select {
            border-radius: 18px;
            border: 1.5px solid #e2e9f2;
            background: #fafcff;
            padding: 0.8rem 1rem;
            font-weight: 500;
            color: #0b2b4a;
            height: calc(3.8rem + 2px);
            cursor: pointer;
        }

        .login-form .form-select:focus {
            border-color: #0066d9;
            box-shadow: 0 0 0 4px rgba(0, 102, 217, 0.15);
        }

        .btn-login {
            background: #004a99;
            border: none;
            border-radius: 40px;
            padding: 0.9rem 1.5rem;
            font-weight: 700;
            font-size: 1.1rem;
            color: white;
            width: 100%;
            transition: 0.2s;
            box-shadow: 0 8px 18px -6px rgba(0, 60, 150, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.6rem;
        }

        .btn-login:hover {
            background: #00337a;
            transform: scale(1.01);
            box-shadow: 0 12px 24px -8px rgba(0, 60, 150, 0.45);
        }

        .footer-note {
            margin-top: 2rem;
            font-size: 0.8rem;
            color: #6482a0;
            text-align: center;
            border-top: 1px solid #e4ecf5;
            padding-top: 1.5rem;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .footer-note a {
            color: #004a99;
            text-decoration: none;
            font-weight: 500;
        }

        .footer-note a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="wms-card">
        <!-- Brand -->
        <div class="brand-header">
            <div class="brand-icon">
                <i class="bi bi-box-seam"></i>
            </div>
            <div class="brand-text">
                WMS <span>Telkom</span>
            </div>
            <span class="badge-version">v2.0</span>
        </div>

        <!-- Sapaan -->
        <div class="greeting-block">
            <h2>
                Selamat Datang, Mutiara
                <small>Admin</small>
            </h2>
            <p>
                <i class="bi bi-layout-text-window me-1"></i>
                Sistem Manajemen Gudang terintegrasi. Kelola barang, lokasi, transaksi &amp; laporan.
            </p>
        </div>

        <!-- Statistik -->
        <div class="stat-grid">
            <div class="stat-item">
                <div class="stat-number">1.284</div>
                <div class="stat-label">Total Barang</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">24</div>
                <div class="stat-label">Gudang</div>
            </div>
            <div class="stat-item">
                <div class="stat-number">342</div>
                <div class="stat-label">Transaksi</div>
            </div>
        </div>

        <!-- Akses Cepat -->
        <div class="quick-access">
            <div class="label">
                <i class="bi bi-grid-3x3-gap-fill"></i> Akses Cepat
            </div>
            <div class="menu-buttons">
                <a href="#" class="btn-outline-menu"><i class="bi bi-archive"></i> Barang</a>
                <a href="#" class="btn-outline-menu"><i class="bi bi-building"></i> Gudang</a>
                <a href="#" class="btn-outline-menu"><i class="bi bi-arrow-left-right"></i> Transaksi</a>
                <a href="#" class="btn-outline-menu"><i class="bi bi-file-earmark-bar-graph"></i> Laporan</a>
                <a href="#" class="btn-outline-menu"><i class="bi bi-gear"></i> Pengaturan</a>
            </div>
        </div>

        <!-- FORM LOGIN – TETAP MENGIRIM KE cek_login.php -->
        <form method="POST" action="cek_login.php" class="login-form">
            <div class="form-floating mb-3">
                <input type="text" name="username" class="form-control" id="floatingUser" placeholder="Username" required>
                <label for="floatingUser"><i class="bi bi-person me-1"></i> Username / NIK</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" name="password" class="form-control" id="floatingPass" placeholder="Password" required>
                <label for="floatingPass"><i class="bi bi-lock me-1"></i> Password</label>
            </div>
            <div class="form-floating mb-4">
                <select class="form-select" name="level" id="floatingLevel" required>
                    <option value="Admin" selected>Admin</option>
                    <option value="Umum">Umum</option>
                    <option value="Manajer">Manajer</option>
                </select>
                <label for="floatingLevel"><i class="bi bi-shield-lock me-1"></i> Level Akses</label>
            </div>

            <button type="submit" class="btn-login">
                <i class="bi bi-box-arrow-in-right"></i> Masuk ke WMS
            </button>
        </form>

        <!-- Footer -->
        <div class="footer-note">
            <span><i class="bi bi-c-circle"></i> 2026 · Mutiara Anastasya Sihaloho</span>
            <span>
                <i class="bi bi-shield-check"></i>
                <a href="#">Kebijakan</a> · 
                <a href="#">Bantuan</a>
            </span>
            <span class="d-none d-sm-inline">
                <i class="bi bi-windows"></i> Activate Windows
            </span>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>