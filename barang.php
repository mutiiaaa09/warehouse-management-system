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

    <title>Data Barang | SIM Gudang</title>


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

            margin-bottom: 28px;

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
           INPUT PREFIX
        ========================================= */

        .input-group-text {

            height: 42px;

            background: #f6f8fa;

            border: 1px solid #dce2e7;

            color: #7d8991;

            font-size: 12px;

        }


        /* =========================================
           HELPER
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


        .btn-secondary-custom {

            background: white;

            border: 1px solid #dce2e7;

            color: #65727b;

        }


        .btn-secondary-custom:hover {

            background: #f2f4f6;

            color: #3f4c54;

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

            <span>Barang</span>

        </div>


        <div class="page-title">


            <div class="title-icon">

                <i class="bi bi-box-seam"></i>

            </div>


            <div>

                <h1>

                    Data Barang

                </h1>


                <p>

                    Kelola informasi barang dan persediaan yang tersimpan dalam sistem.

                </p>

            </div>


        </div>


    </div>



    <!-- =====================================
         FORM
    ====================================== -->

    <div class="form-card">


        <!-- HEADER -->

        <div class="form-header">


            <div class="form-header-title">

                Tambah Data Barang

            </div>


            <div class="required-info">

                <span>*</span> Wajib diisi

            </div>


        </div>



        <!-- BODY -->

        <div class="form-body">


            <form method="post">


                <!-- ================================
                     INFORMASI BARANG
                ================================= -->

                <div class="form-section">


                    <div class="section-label">

                        <div class="section-number">

                            01

                        </div>

                        Informasi Barang

                    </div>


                    <div class="row g-3">


                        <!-- KODE -->

                        <div class="col-md-6">


                            <label for="KodeBarang"
                                   class="form-label">

                                Kode Barang

                                <span class="required">*</span>

                            </label>


                            <input
                                id="KodeBarang"
                                name="KodeBarang"
                                type="text"
                                class="form-control"
                                placeholder="Masukkan kode barang"
                                required>


                            <div class="helper-text">

                                Gunakan kode barang yang sesuai dengan identifikasi barang.

                            </div>


                        </div>



                        <!-- NAMA -->

                        <div class="col-md-6">


                            <label for="NamaBarang"
                                   class="form-label">

                                Nama Barang

                                <span class="required">*</span>

                            </label>


                            <input
                                id="NamaBarang"
                                name="NamaBarang"
                                type="text"
                                class="form-control"
                                placeholder="Masukkan nama barang"
                                required>


                        </div>


                    </div>

                </div>



                <!-- ================================
                     PERSEDIAAN
                ================================= -->

                <div class="form-section">


                    <div class="section-label">

                        <div class="section-number">

                            02

                        </div>

                        Informasi Persediaan

                    </div>


                    <div class="row g-3">


                        <!-- STOK -->

                        <div class="col-md-4">


                            <label for="JumlahStok"
                                   class="form-label">

                                Jumlah Stok

                            </label>


                            <input
                                id="JumlahStok"
                                name="JumlahStok"
                                type="number"
                                min="0"
                                class="form-control"
                                placeholder="0">


                            <div class="helper-text">

                                Jumlah stok awal barang.

                            </div>


                        </div>



                        <!-- SATUAN -->

                        <div class="col-md-4">


                            <label for="Satuan"
                                   class="form-label">

                                Satuan

                            </label>


                            <input
                                id="Satuan"
                                name="Satuan"
                                type="text"
                                class="form-control"
                                placeholder="Contoh: Unit, Pcs, Box">


                        </div>



                        <!-- HARGA -->

                        <div class="col-md-4">


                            <label for="Harga"
                                   class="form-label">

                                Harga

                            </label>


                            <div class="input-group">


                                <span class="input-group-text">

                                    Rp

                                </span>


                                <input
                                    id="Harga"
                                    name="Harga"
                                    type="number"
                                    min="0"
                                    class="form-control"
                                    placeholder="0">


                            </div>


                            <div class="helper-text">

                                Masukkan harga barang dalam Rupiah.

                            </div>


                        </div>


                    </div>

                </div>



                <!-- ================================
                     AUDIT
                ================================= -->

                <div class="form-section"
                     style="margin-bottom: 0;">


                    <div class="section-label">

                        <div class="section-number">

                            03

                        </div>

                        Informasi Audit

                    </div>


                    <div class="row">


                        <div class="col-md-6">


                            <label for="TglAuditTerakhir"
                                   class="form-label">

                                Tanggal Audit Terakhir

                            </label>


                            <input
                                id="TglAuditTerakhir"
                                name="TglAuditTerakhir"
                                type="date"
                                class="form-control"
                                value="<?php echo date('Y-m-d');?>">


                            <div class="helper-text">

                                Tanggal terakhir dilakukan pemeriksaan terhadap data barang.

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

                        Pastikan informasi barang telah diperiksa sebelum disimpan.

                    </div>


                    <div class="footer-buttons">


                        <button
                            type="submit"
                            class="btn btn-search"
                            formaction="mencaribarang.php">

                            <i class="bi bi-search"></i>

                            Cari Barang

                        </button>


                        <button
                            name="submit"
                            type="submit"
                            class="btn btn-primary">

                            <i class="bi bi-check2"></i>

                            Simpan Barang

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

            $KodeBarang =
                filter_var(
                    $_POST['KodeBarang'],
                    FILTER_SANITIZE_STRING
                );

            $NamaBarang =
                filter_var(
                    $_POST['NamaBarang'],
                    FILTER_SANITIZE_STRING
                );

            $JumlahStok =
                filter_var(
                    $_POST['JumlahStok'],
                    FILTER_SANITIZE_STRING
                );

            $Harga =
                filter_var(
                    $_POST['Harga'],
                    FILTER_SANITIZE_STRING
                );

            $Satuan =
                filter_var(
                    $_POST['Satuan'],
                    FILTER_SANITIZE_STRING
                );

            $TglAuditTerakhir =
                filter_var(
                    $_POST['TglAuditTerakhir'],
                    FILTER_SANITIZE_STRING
                );


            include('koneksi.db.php');


            $sql =
                "INSERT INTO `barang`
                (`KodeBarang`,
                 `NamaBarang`,
                 `JumlahStok`,
                 `Harga`,
                 `Satuan`,
                 `TglAuditTerakhir`)
                VALUES
                ('".$KodeBarang."',
                 '".$NamaBarang."',
                 '".$JumlahStok."',
                 '".$Harga."',
                 '".$Satuan."',
                 '".$TglAuditTerakhir."')";


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

                        Barang telah berhasil ditambahkan ke dalam sistem.

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