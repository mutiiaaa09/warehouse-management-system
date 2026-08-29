<?php
    session_start();

    if (empty($_SESSION['username']) || empty($_SESSION['level'])) {
        echo "<script>
            alert('Maaf, untuk mengakses halaman ini, Anda harus Login terlebih dahulu, Terima Kasih.');
            window.location.href='index.php';
        </script>";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">

    <title>Data Gudang | SIM Gudang</title>


    <!-- Bootstrap -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
          rel="stylesheet">


    <!-- Bootstrap Icons -->

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <style>

        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            background: #f5f7fa;

            color: #263238;

            font-family: "Segoe UI", Arial, sans-serif;

        }


        /* =========================================
           PAGE
        ========================================= */

        .page-wrapper {

            padding: 30px;

            max-width: 1000px;

            margin: auto;

        }


        /* =========================================
           PAGE HEADER
        ========================================= */

        .page-header {

            margin-bottom: 22px;

        }


        .breadcrumb-text {

            display: flex;

            align-items: center;

            gap: 7px;

            font-size: 11px;

            color: #8b969e;

            margin-bottom: 8px;

        }


        .breadcrumb-text i {

            font-size: 10px;

        }


        .page-title {

            display: flex;

            align-items: center;

            gap: 12px;

        }


        .title-icon {

            width: 42px;

            height: 42px;

            border-radius: 8px;

            background: #edf5fb;

            color: #1769aa;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 19px;

        }


        .page-title h1 {

            margin: 0;

            font-size: 21px;

            font-weight: 600;

            color: #263238;

        }


        .page-title p {

            margin: 3px 0 0;

            font-size: 11px;

            color: #8b969e;

        }


        /* =========================================
           FORM CARD
        ========================================= */

        .form-card {

            background: #ffffff;

            border: 1px solid #e3e8ed;

            border-radius: 10px;

            overflow: hidden;

        }


        /* =========================================
           FORM HEADER
        ========================================= */

        .form-header {

            padding: 19px 24px;

            border-bottom: 1px solid #e8ecef;

            display: flex;

            justify-content: space-between;

            align-items: center;

        }


        .form-header-title {

            font-size: 14px;

            font-weight: 600;

            color: #263238;

        }


        .required-info {

            font-size: 10px;

            color: #8d989f;

        }


        .required-info span {

            color: #d9534f;

        }


        /* =========================================
           FORM BODY
        ========================================= */

        .form-body {

            padding: 28px 30px;

        }


        /* =========================================
           SECTION
        ========================================= */

        .form-section {

            margin-bottom: 0;

        }


        .section-label {

            display: flex;

            align-items: center;

            gap: 8px;

            font-size: 12px;

            font-weight: 600;

            color: #34434e;

            margin-bottom: 17px;

            padding-bottom: 9px;

            border-bottom: 1px solid #edf0f2;

        }


        .section-number {

            width: 22px;

            height: 22px;

            border-radius: 6px;

            background: #edf5fb;

            color: #1769aa;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 10px;

            font-weight: 700;

        }


        /* =========================================
           LABEL
        ========================================= */

        .form-label {

            font-size: 11px;

            font-weight: 600;

            color: #46545e;

            margin-bottom: 7px;

        }


        .required {

            color: #d9534f;

            margin-left: 2px;

        }


        /* =========================================
           INPUT
        ========================================= */

        .form-control {

            height: 42px;

            border: 1px solid #dce2e7;

            border-radius: 7px;

            font-size: 12px;

            color: #34434e;

            padding: 9px 12px;

            box-shadow: none;

            transition: all .2s ease;

        }


        .form-control:focus {

            border-color: #7eabc7;

            box-shadow:
                0 0 0 3px rgba(23,105,170,.08);

        }


        .form-control::placeholder {

            color: #aab3b9;

            font-size: 11px;

        }


        /* =========================================
           HELPER TEXT
        ========================================= */

        .helper-text {

            margin-top: 6px;

            font-size: 10px;

            color: #9aa4aa;

        }


        /* =========================================
           FORM FOOTER
        ========================================= */

        .form-footer {

            padding: 18px 30px;

            border-top: 1px solid #e8ecef;

            background: #fafbfc;

            display: flex;

            justify-content: space-between;

            align-items: center;

        }


        .footer-note {

            font-size: 10px;

            color: #9aa4aa;

        }


        .footer-buttons {

            display: flex;

            gap: 10px;

        }


        /* =========================================
           BUTTONS
        ========================================= */

        .btn {

            height: 40px;

            border-radius: 7px;

            padding: 0 18px;

            font-size: 11px;

            font-weight: 600;

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 7px;

        }


        .btn-search {

            background: white;

            border: 1px solid #1769aa;

            color: #1769aa;

        }


        .btn-search:hover {

            background: #edf5fb;

            color: #0f578e;

        }


        .btn-primary {

            background: #1769aa;

            border: 1px solid #1769aa;

            color: white;

        }


        .btn-primary:hover {

            background: #0f578e;

            border-color: #0f578e;

            color: white;

        }


        /* =========================================
           ALERT
        ========================================= */

        .alert-container {

            margin-top: 20px;

        }


        .custom-alert {

            border-radius: 8px;

            border: 1px solid;

            padding: 13px 16px;

            font-size: 11px;

            display: flex;

            align-items: center;

            gap: 10px;

        }


        .custom-alert.success {

            background: #f0f9f4;

            border-color: #c9ead7;

            color: #28794d;

        }


        .custom-alert.danger {

            background: #fff5f5;

            border-color: #f0cccc;

            color: #a94442;

        }


        .custom-alert strong {

            font-weight: 700;

        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 768px) {

            .page-wrapper {

                padding: 18px;

            }


            .form-body {

                padding: 22px;

            }


            .form-footer {

                padding: 16px 22px;

            }

        }


        @media (max-width: 576px) {

            .page-title h1 {

                font-size: 18px;

            }


            .form-header {

                display: block;

            }


            .required-info {

                margin-top: 5px;

            }


            .form-footer {

                display: block;

            }


            .footer-note {

                margin-bottom: 12px;

            }


            .footer-buttons {

                flex-direction: column;

            }


            .footer-buttons .btn {

                width: 100%;

            }

        }

    </style>

</head>


<body>


<div class="page-wrapper">


    <!-- =====================================
         PAGE HEADER
    ====================================== -->

    <div class="page-header">


        <div class="breadcrumb-text">

            <span>Dashboard</span>

            <i class="bi bi-chevron-right"></i>

            <span>Master Data</span>

            <i class="bi bi-chevron-right"></i>

            <span>Gudang</span>

        </div>


        <div class="page-title">


            <div class="title-icon">

                <i class="bi bi-building"></i>

            </div>


            <div>

                <h1>

                    Data Gudang

                </h1>


                <p>

                    Kelola informasi lokasi dan alamat gudang yang terdaftar dalam sistem.

                </p>

            </div>


        </div>


    </div>



    <!-- =====================================
         FORM CARD
    ====================================== -->

    <div class="form-card">


        <!-- HEADER -->

        <div class="form-header">


            <div class="form-header-title">

                Tambah Data Gudang

            </div>


            <div class="required-info">

                <span>*</span> Wajib diisi

            </div>


        </div>



        <!-- BODY -->

        <div class="form-body">


            <form method="post">


                <div class="form-section">


                    <div class="section-label">

                        <div class="section-number">

                            01

                        </div>

                        Informasi Gudang

                    </div>



                    <div class="row g-3">


                        <!-- KODE GUDANG -->

                        <div class="col-md-6">


                            <label for="KodeGudang"
                                   class="form-label">

                                Kode Gudang

                                <span class="required">*</span>

                            </label>


                            <input
                                id="KodeGudang"
                                name="KodeGudang"
                                type="text"
                                class="form-control"
                                placeholder="Masukkan kode gudang"
                                required>


                            <div class="helper-text">

                                Gunakan kode unik untuk mengidentifikasi gudang.

                            </div>


                        </div>



                        <!-- ALAMAT -->

                        <div class="col-md-6">


                            <label for="Alamat"
                                   class="form-label">

                                Alamat Gudang

                            </label>


                            <input
                                id="Alamat"
                                name="Alamat"
                                type="text"
                                class="form-control"
                                placeholder="Masukkan alamat gudang">


                            <div class="helper-text">

                                Masukkan alamat lengkap lokasi gudang.

                            </div>


                        </div>


                    </div>


                </div>


                <!-- =====================================
                     FOOTER
                ====================================== -->

                <div class="form-footer"
                     style="margin: 28px -30px -28px;">


                    <div class="footer-note">

                        Pastikan kode dan alamat gudang telah sesuai.

                    </div>


                    <div class="footer-buttons">


                        <button
                            type="submit"
                            class="btn btn-search"
                            formaction="mencarigudang.php">

                            <i class="bi bi-search"></i>

                            Cari Gudang

                        </button>


                        <button
                            name="submit"
                            type="submit"
                            class="btn btn-primary">

                            <i class="bi bi-check2"></i>

                            Simpan Gudang

                        </button>


                    </div>


                </div>


            </form>


        </div>


    </div>



    <!-- =====================================
         PROCESS RESULT
    ====================================== -->

    <div class="alert-container">


        <?php 

        if (isset($_POST['submit'])) {

            $KodeGudang =
                filter_var(
                    $_POST['KodeGudang'],
                    FILTER_SANITIZE_STRING
                );


            $Alamat =
                filter_var(
                    $_POST['Alamat'],
                    FILTER_SANITIZE_STRING
                );


            include('koneksi.db.php');


            $sql =
                "INSERT INTO `gudang`
                (`KodeGudang`, `Alamat`)
                VALUES
                ('".$KodeGudang."',
                 '".$Alamat."')";


            $q =
                mysqli_query(
                    $koneksi,
                    $sql
                );


            if ($q) {

                echo '

                <div class="custom-alert success">

                    <i class="bi bi-check-circle-fill"></i>

                    <div>

                        <strong>Data berhasil disimpan.</strong>

                        Gudang telah berhasil ditambahkan ke dalam sistem.

                    </div>

                </div>

                ';

            } else {

                echo '

                <div class="custom-alert danger">

                    <i class="bi bi-exclamation-circle-fill"></i>

                    <div>

                        <strong>Data gagal disimpan.</strong>

                        Silakan periksa kembali data yang dimasukkan.

                    </div>

                </div>

                ';

            }

        }

        ?>


    </div>


</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>