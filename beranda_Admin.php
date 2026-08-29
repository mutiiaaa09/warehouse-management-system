<?php
    session_start();

    if (empty($_SESSION['username']) || empty($_SESSION['level'])) {
        echo "<script>
            alert('Maaf, untuk mengakses halaman ini, Anda harus Login terlebih dahulu, Terima Kasih.');
            window.location.href='index.php';
        </script>";
        exit;
    }

    $username = $_SESSION['username'];
    $level = $_SESSION['level'];
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard Administrator</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background: #f5f7fa;
            color: #263238;
            font-family: "Segoe UI", Arial, sans-serif;
        }


        /* =========================================
           MAIN CONTAINER
        ========================================= */

        .dashboard {
            padding: 30px;
            max-width: 1400px;
            margin: auto;
        }


        /* =========================================
           WELCOME HEADER
        ========================================= */

        .welcome {

            position: relative;

            background: #0b3558;

            border-radius: 12px;

            padding: 30px 35px;

            color: white;

            overflow: hidden;

            margin-bottom: 25px;

        }


        .welcome::before {

            content: "";

            position: absolute;

            width: 280px;
            height: 280px;

            border: 1px solid rgba(255,255,255,.08);

            border-radius: 50%;

            right: -90px;
            top: -120px;

        }


        .welcome::after {

            content: "";

            position: absolute;

            width: 180px;
            height: 180px;

            border: 1px solid rgba(255,255,255,.06);

            border-radius: 50%;

            right: 60px;
            bottom: -110px;

        }


        .welcome-content {

            position: relative;

            z-index: 2;

        }


        .welcome-label {

            font-size: 11px;

            letter-spacing: 1.3px;

            text-transform: uppercase;

            color: #a9c3d8;

            margin-bottom: 8px;

            font-weight: 600;

        }


        .welcome h1 {

            margin: 0 0 8px 0;

            font-size: 26px;

            font-weight: 600;

            color: white;

        }


        .welcome p {

            margin: 0;

            font-size: 13px;

            color: #d3e1eb;

            max-width: 650px;

            line-height: 1.6;

        }


        /* =========================================
           USER INFO
        ========================================= */

        .user-info {

            margin-top: 22px;

            display: inline-flex;

            align-items: center;

            gap: 10px;

            background: rgba(255,255,255,.08);

            border: 1px solid rgba(255,255,255,.10);

            border-radius: 7px;

            padding: 8px 13px;

        }


        .user-avatar {

            width: 30px;

            height: 30px;

            border-radius: 50%;

            background: white;

            color: #0b3558;

            display: flex;

            justify-content: center;

            align-items: center;

            font-size: 12px;

            font-weight: 700;

        }


        .user-name {

            font-size: 12px;

            font-weight: 600;

        }


        .user-role {

            font-size: 10px;

            color: #b8cbd9;

        }


        /* =========================================
           SECTION HEADER
        ========================================= */

        .section-header {

            display: flex;

            justify-content: space-between;

            align-items: center;

            margin-bottom: 15px;

        }


        .section-title {

            font-size: 16px;

            font-weight: 600;

            color: #263238;

            margin: 0;

        }


        .section-subtitle {

            font-size: 11px;

            color: #8a969f;

            margin-top: 3px;

        }


        /* =========================================
           INFORMATION CARDS
        ========================================= */

        .stats {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 16px;

            margin-bottom: 28px;

        }


        .stat-card {

            background: white;

            border: 1px solid #e4e8ec;

            border-radius: 10px;

            padding: 20px;

            display: flex;

            align-items: center;

            gap: 15px;

            transition: .2s ease;

        }


        .stat-card:hover {

            transform: translateY(-2px);

            box-shadow:
                0 5px 16px rgba(30,50,70,.07);

        }


        .stat-icon {

            width: 46px;

            height: 46px;

            flex-shrink: 0;

            border-radius: 8px;

            background: #edf5fb;

            color: #1769aa;

            display: flex;

            justify-content: center;

            align-items: center;

            font-size: 20px;

        }


        .stat-info {

            min-width: 0;

        }


        .stat-label {

            font-size: 11px;

            color: #89949c;

            margin-bottom: 5px;

        }


        .stat-value {

            font-size: 22px;

            font-weight: 650;

            color: #263238;

        }


        .stat-note {

            font-size: 10px;

            color: #9ba5ac;

            margin-top: 3px;

        }


        /* =========================================
           QUICK ACCESS
        ========================================= */

        .quick-section {

            background: white;

            border: 1px solid #e4e8ec;

            border-radius: 10px;

            padding: 23px;

        }


        .quick-grid {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 12px;

        }


        .quick-card {

            text-decoration: none;

            color: #263238;

            border: 1px solid #e6eaee;

            border-radius: 8px;

            padding: 16px;

            display: flex;

            align-items: center;

            transition: .2s ease;

            background: #fff;

        }


        .quick-card:hover {

            background: #f8fbfd;

            border-color: #c8dce9;

            color: #1769aa;

            transform: translateY(-1px);

        }


        .quick-icon {

            width: 40px;

            height: 40px;

            border-radius: 7px;

            background: #edf5fb;

            color: #1769aa;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 17px;

            margin-right: 12px;

            flex-shrink: 0;

        }


        .quick-name {

            font-size: 12px;

            font-weight: 600;

        }


        .quick-description {

            font-size: 10px;

            color: #8c979f;

            margin-top: 3px;

        }


        .arrow {

            margin-left: auto;

            color: #a7b1b8;

            font-size: 13px;

        }


        /* =========================================
           SYSTEM STATUS
        ========================================= */

        .system-status {

            margin-top: 22px;

            display: flex;

            align-items: center;

            gap: 8px;

            font-size: 11px;

            color: #7d8991;

        }


        .status-dot {

            width: 7px;

            height: 7px;

            border-radius: 50%;

            background: #36a269;

        }


        /* =========================================
           FOOTER
        ========================================= */

        .footer {

            text-align: center;

            margin-top: 25px;

            font-size: 10px;

            color: #9ba4ab;

        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 900px) {

            .stats {

                grid-template-columns:
                    repeat(2, 1fr);

            }

            .quick-grid {

                grid-template-columns:
                    repeat(2, 1fr);

            }

        }


        @media (max-width: 600px) {

            .dashboard {

                padding: 18px;

            }

            .welcome {

                padding: 24px;

            }

            .welcome h1 {

                font-size: 22px;

            }

            .stats {

                grid-template-columns: 1fr;

            }

            .quick-grid {

                grid-template-columns: 1fr;

            }

        }

    </style>

</head>


<body>


<div class="dashboard">


    <!-- =====================================
         WELCOME
    ====================================== -->

    <section class="welcome">

        <div class="welcome-content">

            <div class="welcome-label">
                Warehouse Management System
            </div>


            <h1>
                Selamat Datang, <?php echo htmlspecialchars($username); ?>
            </h1>


            <p>
                Selamat datang di Sistem Informasi Manajemen Gudang.
                Kelola data barang, gudang, transaksi, dan laporan
                operasional secara terintegrasi melalui sistem ini.
            </p>


            <div class="user-info">

                <div class="user-avatar">

                    <?php
                        echo strtoupper(
                            substr($username, 0, 1)
                        );
                    ?>

                </div>


                <div>

                    <div class="user-name">

                        <?php
                            echo htmlspecialchars($username);
                        ?>

                    </div>

                    <div class="user-role">

                        <?php
                            echo htmlspecialchars($level);
                        ?>

                    </div>

                </div>

            </div>

        </div>

    </section>



    <!-- =====================================
         SUMMARY
    ====================================== -->

    <div class="section-header">

        <div>

            <div class="section-title">
                Ringkasan Sistem
            </div>

            <div class="section-subtitle">
                Informasi utama pengelolaan gudang
            </div>

        </div>

    </div>


    <div class="stats">


        <!-- BARANG -->

        <div class="stat-card">

            <div class="stat-icon">

                <i class="bi bi-box-seam"></i>

            </div>

            <div class="stat-info">

                <div class="stat-label">
                    TOTAL BARANG
                </div>

                <div class="stat-value">
                    —
                </div>

                <div class="stat-note">
                    Data barang terdaftar
                </div>

            </div>

        </div>


        <!-- GUDANG -->

        <div class="stat-card">

            <div class="stat-icon">

                <i class="bi bi-building"></i>

            </div>

            <div class="stat-info">

                <div class="stat-label">
                    TOTAL GUDANG
                </div>

                <div class="stat-value">
                    —
                </div>

                <div class="stat-note">
                    Lokasi gudang terdaftar
                </div>

            </div>

        </div>


        <!-- TRANSAKSI -->

        <div class="stat-card">

            <div class="stat-icon">

                <i class="bi bi-arrow-left-right"></i>

            </div>

            <div class="stat-info">

                <div class="stat-label">
                    TRANSAKSI
                </div>

                <div class="stat-value">
                    —
                </div>

                <div class="stat-note">
                    Aktivitas transaksi
                </div>

            </div>

        </div>


    </div>



    <!-- =====================================
         QUICK ACCESS
    ====================================== -->

    <section class="quick-section">


        <div class="section-header">

            <div>

                <div class="section-title">
                    Akses Cepat
                </div>

                <div class="section-subtitle">
                    Akses menu utama sistem
                </div>

            </div>

        </div>


        <div class="quick-grid">


            <!-- TRANSAKSI -->

            <a href="transaksibarang.php"
               target="frmmenu"
               class="quick-card">

                <div class="quick-icon">

                    <i class="bi bi-arrow-left-right"></i>

                </div>

                <div>

                    <div class="quick-name">
                        Transaksi Barang
                    </div>

                    <div class="quick-description">
                        Kelola transaksi barang
                    </div>

                </div>

                <i class="bi bi-chevron-right arrow"></i>

            </a>


            <!-- BARANG -->

            <a href="barang.php"
               target="frmmenu"
               class="quick-card">

                <div class="quick-icon">

                    <i class="bi bi-box"></i>

                </div>

                <div>

                    <div class="quick-name">
                        Data Barang
                    </div>

                    <div class="quick-description">
                        Kelola data barang
                    </div>

                </div>

                <i class="bi bi-chevron-right arrow"></i>

            </a>


            <!-- GUDANG -->

            <a href="gudang.php"
               target="frmmenu"
               class="quick-card">

                <div class="quick-icon">

                    <i class="bi bi-building"></i>

                </div>

                <div>

                    <div class="quick-name">
                        Data Gudang
                    </div>

                    <div class="quick-description">
                        Kelola data gudang
                    </div>

                </div>

                <i class="bi bi-chevron-right arrow"></i>

            </a>


            <!-- DAFTAR BARANG -->

            <a href="daftarbarang.php"
               target="frmmenu"
               class="quick-card">

                <div class="quick-icon">

                    <i class="bi bi-boxes"></i>

                </div>

                <div>

                    <div class="quick-name">
                        Daftar Barang
                    </div>

                    <div class="quick-description">
                        Lihat daftar barang
                    </div>

                </div>

                <i class="bi bi-chevron-right arrow"></i>

            </a>


            <!-- DAFTAR GUDANG -->

            <a href="daftargudang.php"
               target="frmmenu"
               class="quick-card">

                <div class="quick-icon">

                    <i class="bi bi-list-columns"></i>

                </div>

                <div>

                    <div class="quick-name">
                        Daftar Gudang
                    </div>

                    <div class="quick-description">
                        Lihat data gudang
                    </div>

                </div>

                <i class="bi bi-chevron-right arrow"></i>

            </a>


            <!-- REKAP -->

            <a href="rekapbarang.php"
               target="frmmenu"
               class="quick-card">

                <div class="quick-icon">

                    <i class="bi bi-bar-chart"></i>

                </div>

                <div>

                    <div class="quick-name">
                        Rekap Barang
                    </div>

                    <div class="quick-description">
                        Lihat rekapitulasi
                    </div>

                </div>

                <i class="bi bi-chevron-right arrow"></i>

            </a>


        </div>


        <!-- SYSTEM STATUS -->

        <div class="system-status">

            <span class="status-dot"></span>

            Sistem aktif dan siap digunakan

        </div>


    </section>


    <div class="footer">

        Sistem Informasi Manajemen Gudang
        &nbsp;•&nbsp;
        Warehouse Management System

    </div>


</div>


<script src="assets/js/script.js"></script>

</body>

</html>