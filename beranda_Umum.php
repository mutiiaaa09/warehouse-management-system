<?php 
session_start();

if (empty($_SESSION['username']) || empty($_SESSION['level'])) {
    echo "<script>
        alert('Akses Ditolak! Silakan login terlebih dahulu untuk mengakses halaman ini.');
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

    <title>Dashboard | Sistem Informasi Gudang</title>


    <!-- Bootstrap Icons -->

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
           DASHBOARD CONTAINER
        ========================================= */

        .dashboard {

            padding: 30px;

            max-width: 1400px;

            margin: auto;

        }


        /* =========================================
           WELCOME CARD
        ========================================= */

        .welcome {

            position: relative;

            background: #0b3558;

            border-radius: 12px;

            padding: 30px 35px;

            color: white;

            overflow: hidden;

            margin-bottom: 28px;

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

            width: 170px;

            height: 170px;

            border: 1px solid rgba(255,255,255,.06);

            border-radius: 50%;

            right: 70px;

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


        .welcome-description {

            margin: 0;

            font-size: 13px;

            color: #d3e1eb;

            max-width: 680px;

            line-height: 1.6;

        }


        /* =========================================
           USER INFORMATION
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

            align-items: center;

            justify-content: center;

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

            margin-top: 2px;

        }


        /* =========================================
           SECTION HEADER
        ========================================= */

        .section-header {

            margin-bottom: 15px;

        }


        .section-title {

            font-size: 16px;

            font-weight: 600;

            color: #263238;

            margin-bottom: 3px;

        }


        .section-subtitle {

            font-size: 11px;

            color: #8a969f;

        }


        /* =========================================
           INFORMATION CARDS
        ========================================= */

        .info-grid {

            display: grid;

            grid-template-columns:
                repeat(3, 1fr);

            gap: 16px;

            margin-bottom: 28px;

        }


        .info-card {

            background: white;

            border: 1px solid #e4e8ec;

            border-radius: 10px;

            padding: 22px;

            min-height: 135px;

            transition: .2s ease;

        }


        .info-card:hover {

            transform: translateY(-2px);

            box-shadow:
                0 5px 16px rgba(30,50,70,.07);

        }


        .info-icon {

            width: 42px;

            height: 42px;

            background: #edf5fb;

            color: #1769aa;

            border-radius: 8px;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 18px;

            margin-bottom: 14px;

        }


        .info-title {

            font-size: 12px;

            font-weight: 600;

            color: #263238;

            margin-bottom: 5px;

        }


        .info-description {

            font-size: 11px;

            color: #8b969e;

            line-height: 1.5;

        }


        /* =========================================
           INFORMATION SECTION
        ========================================= */

        .system-section {

            background: white;

            border: 1px solid #e4e8ec;

            border-radius: 10px;

            padding: 25px;

        }


        .system-content {

            display: grid;

            grid-template-columns:
                repeat(2, 1fr);

            gap: 15px;

        }


        .system-item {

            display: flex;

            align-items: center;

            padding: 16px;

            border: 1px solid #e7ebef;

            border-radius: 8px;

            background: #fff;

        }


        .system-item-icon {

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


        .system-item-title {

            font-size: 12px;

            font-weight: 600;

            color: #263238;

        }


        .system-item-text {

            font-size: 10px;

            color: #8c979f;

            margin-top: 3px;

        }


        /* =========================================
           SYSTEM STATUS
        ========================================= */

        .system-status {

            display: flex;

            align-items: center;

            gap: 8px;

            margin-top: 22px;

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

            .info-grid {

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


            .info-grid {

                grid-template-columns: 1fr;

            }


            .system-content {

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

                Selamat Datang,
                <?php echo htmlspecialchars($username); ?>

            </h1>


            <p class="welcome-description">

                Selamat datang di Sistem Informasi Manajemen Gudang.
                Gunakan sistem ini untuk mengakses informasi dan
                mendukung aktivitas pengelolaan gudang secara terintegrasi.

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
         INFORMASI SISTEM
    ====================================== -->

    <div class="section-header">

        <div class="section-title">

            Informasi Sistem

        </div>


        <div class="section-subtitle">

            Informasi dan layanan yang tersedia

        </div>

    </div>



    <div class="info-grid">


        <!-- DATA BARANG -->

        <div class="info-card">

            <div class="info-icon">

                <i class="bi bi-box-seam"></i>

            </div>


            <div class="info-title">

                Informasi Barang

            </div>


            <div class="info-description">

                Akses informasi mengenai data barang
                yang tersedia dalam sistem gudang.

            </div>

        </div>



        <!-- GUDANG -->

        <div class="info-card">

            <div class="info-icon">

                <i class="bi bi-building"></i>

            </div>


            <div class="info-title">

                Informasi Gudang

            </div>


            <div class="info-description">

                Menampilkan informasi terkait
                lokasi dan data gudang.

            </div>

        </div>



        <!-- TRANSAKSI -->

        <div class="info-card">

            <div class="info-icon">

                <i class="bi bi-arrow-left-right"></i>

            </div>


            <div class="info-title">

                Aktivitas Transaksi

            </div>


            <div class="info-description">

                Mendukung pemantauan aktivitas
                transaksi barang pada sistem.

            </div>

        </div>


    </div>



    <!-- =====================================
         SISTEM
    ====================================== -->

    <section class="system-section">


        <div class="section-header">

            <div class="section-title">

                Fitur Sistem

            </div>


            <div class="section-subtitle">

                Fitur yang dapat digunakan oleh pengguna

            </div>

        </div>


        <div class="system-content">


            <div class="system-item">


                <div class="system-item-icon">

                    <i class="bi bi-clipboard-data"></i>

                </div>


                <div>

                    <div class="system-item-title">

                        Informasi Persediaan

                    </div>


                    <div class="system-item-text">

                        Memantau informasi barang dan persediaan gudang.

                    </div>

                </div>


            </div>



            <div class="system-item">


                <div class="system-item-icon">

                    <i class="bi bi-file-earmark-text"></i>

                </div>


                <div>

                    <div class="system-item-title">

                        Laporan Gudang

                    </div>


                    <div class="system-item-text">

                        Menampilkan informasi dan laporan terkait gudang.

                    </div>

                </div>


            </div>



            <div class="system-item">


                <div class="system-item-icon">

                    <i class="bi bi-database-check"></i>

                </div>


                <div>

                    <div class="system-item-title">

                        Data Terintegrasi

                    </div>


                    <div class="system-item-text">

                        Data tersimpan dan dikelola melalui satu sistem.

                    </div>

                </div>


            </div>



            <div class="system-item">


                <div class="system-item-icon">

                    <i class="bi bi-shield-check"></i>

                </div>


                <div>

                    <div class="system-item-title">

                        Akses Pengguna

                    </div>


                    <div class="system-item-text">

                        Sistem menyesuaikan akses berdasarkan hak pengguna.

                    </div>

                </div>


            </div>


        </div>



        <!-- STATUS -->

        <div class="system-status">

            <span class="status-dot"></span>

            Sistem aktif dan siap digunakan

        </div>


    </section>



    <!-- =====================================
         FOOTER
    ====================================== -->

    <div class="footer">

        Sistem Informasi Manajemen Gudang
        &nbsp;•&nbsp;
        Warehouse Management System

    </div>


</div>


</body>

</html>