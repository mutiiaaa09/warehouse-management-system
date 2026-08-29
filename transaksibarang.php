<!DOCTYPE html>
<html lang="id">

<head>

    <title>Transaksi Barang | SIM Gudang</title>

    <meta charset="utf-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1">


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

            background: #ffffff;

            display: flex;

            align-items: center;

            justify-content: space-between;

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
           FORM LABEL
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

        .form-control,
        .form-select {

            height: 42px;

            border: 1px solid #dce2e7;

            border-radius: 7px;

            font-size: 12px;

            color: #34434e;

            background-color: #fff;

            padding: 9px 12px;

            box-shadow: none;

            transition: all .2s ease;

        }


        .form-control:focus,
        .form-select:focus {

            border-color: #7eabc7;

            box-shadow:
                0 0 0 3px rgba(23,105,170,.08);

        }


        .form-control::placeholder {

            color: #aab3b9;

            font-size: 11px;

        }


        textarea.form-control {

            height: auto;

            min-height: 90px;

            resize: vertical;

        }


        /* =========================================
           READ ONLY
        ========================================= */

        .form-control[readonly] {

            background-color: #f6f8fa;

            color: #6f7c85;

            cursor: not-allowed;

        }


        /* =========================================
           INPUT GROUP
        ========================================= */

        .input-group-text {

            height: 42px;

            background: #f6f8fa;

            border: 1px solid #dce2e7;

            color: #7d8991;

            font-size: 12px;

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
           STATUS SELECT
        ========================================= */

        .status-wrapper {

            position: relative;

        }


        .status-info {

            margin-top: 7px;

            display: flex;

            align-items: center;

            gap: 6px;

            font-size: 10px;

            color: #8b969e;

        }


        .status-dot {

            width: 6px;

            height: 6px;

            border-radius: 50%;

            background: #1769aa;

        }


        /* =========================================
           FORM FOOTER
        ========================================= */

        .form-footer {

            padding: 18px 30px;

            border-top: 1px solid #e8ecef;

            background: #fafbfc;

            display: flex;

            justify-content: flex-end;

            gap: 10px;

        }


        /* =========================================
           BUTTON
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


        .btn-cancel {

            background: white;

            border: 1px solid #dce2e7;

            color: #65727b;

        }


        .btn-cancel:hover {

            background: #f2f4f6;

            color: #3f4c54;

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

                flex-direction: column-reverse;

            }


            .form-footer .btn {

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

            <span>Transaksi</span>

            <i class="bi bi-chevron-right"></i>

            <span>Input Transaksi</span>

        </div>


        <div class="page-title">


            <div class="title-icon">

                <i class="bi bi-arrow-left-right"></i>

            </div>


            <div>

                <h1>

                    Form Transaksi Barang

                </h1>


                <p>

                    Tambahkan transaksi barang masuk atau keluar dari gudang.

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

                Informasi Transaksi

            </div>


            <div class="required-info">

                <span>*</span> Wajib diisi

            </div>


        </div>



        <!-- BODY -->

        <div class="form-body">


            <!-- ================================
                 SECTION 1
            ================================= -->

            <div class="form-section">


                <div class="section-label">

                    <div class="section-number">
                        01
                    </div>

                    Lokasi Gudang

                </div>


                <div class="row">


                    <div class="col-md-12">


                        <label for="KodeGudang"
                               class="form-label">

                            Kode Gudang

                            <span class="required">*</span>

                        </label>


                        <select id="KodeGudang"
                                name="KodeGudang"
                                class="form-select"
                                required>


                            <option value="">
                                Silakan pilih gudang
                            </option>


                            <?php

                            include('koneksi.db.php');

                            $sql = "SELECT * FROM gudang";

                            $q = mysqli_query(
                                $koneksi,
                                $sql
                            );

                            while ($r = mysqli_fetch_assoc($q)) {

                                echo '<option value="' .
                                    $r['KodeGudang'] .
                                    '">
                                    Gudang ' .
                                    $r['KodeGudang'] .
                                    ' - ' .
                                    $r['Alamat'] .
                                    '</option>';

                            }

                            ?>


                        </select>


                        <div class="helper-text">

                            Pilih lokasi gudang tempat transaksi dilakukan.

                        </div>


                    </div>


                </div>

            </div>



            <!-- ================================
                 SECTION 2
            ================================= -->

            <div class="form-section">


                <div class="section-label">

                    <div class="section-number">
                        02
                    </div>

                    Informasi Barang

                </div>


                <div class="row g-3">


                    <!-- KODE BARANG -->

                    <div class="col-md-6">


                        <label for="KodeBarang"
                               class="form-label">

                            Kode Barang

                            <span class="required">*</span>

                        </label>


                        <input type="text"
                               class="form-control"
                               id="KodeBarang"
                               name="KodeBarang"
                               placeholder="Masukkan kode barang"
                               onkeyup="cari()"
                               required>


                        <div class="helper-text">

                            Masukkan kode barang untuk mencari nama barang.

                        </div>


                    </div>



                    <!-- NAMA BARANG -->

                    <div class="col-md-6">


                        <label for="NamaBarang"
                               class="form-label">

                            Nama Barang

                        </label>


                        <input type="text"
                               class="form-control"
                               id="NamaBarang"
                               name="NamaBarang"
                               placeholder="Nama barang akan muncul otomatis"
                               readonly>


                        <div class="helper-text">

                            Nama barang diambil berdasarkan kode barang.

                        </div>


                    </div>


                </div>

            </div>



            <!-- ================================
                 SECTION 3
            ================================= -->

            <div class="form-section">


                <div class="section-label">

                    <div class="section-number">
                        03
                    </div>

                    Detail Transaksi

                </div>


                <div class="row g-3">


                    <!-- TANGGAL -->

                    <div class="col-md-4">


                        <label for="WaktuTransaksi"
                               class="form-label">

                            Waktu Transaksi

                            <span class="required">*</span>

                        </label>


                        <input type="date"
                               class="form-control"
                               id="WaktuTransaksi"
                               name="WaktuTransaksi"
                               value="<?php echo date('Y-m-d'); ?>"
                               required>


                    </div>



                    <!-- STATUS -->

                    <div class="col-md-4">


                        <label for="StatusTransaksi"
                               class="form-label">

                            Status Transaksi

                            <span class="required">*</span>

                        </label>


                        <select id="StatusTransaksi"
                                name="StatusTransaksi"
                                class="form-select"
                                required>


                            <option value="Masuk">

                                Barang Masuk

                            </option>


                            <option value="Keluar">

                                Barang Keluar

                            </option>


                        </select>


                        <div class="status-info">

                            <span class="status-dot"></span>

                            Tentukan jenis transaksi barang.

                        </div>


                    </div>



                    <!-- JUMLAH -->

                    <div class="col-md-4">


                        <label for="Jumlah"
                               class="form-label">

                            Jumlah

                            <span class="required">*</span>

                        </label>


                        <input type="number"
                               min="1"
                               class="form-control"
                               id="Jumlah"
                               name="Jumlah"
                               placeholder="0"
                               required>


                    </div>


                </div>

            </div>



            <!-- ================================
                 SECTION 4
            ================================= -->

            <div class="form-section"
                 style="margin-bottom: 0;">


                <div class="section-label">

                    <div class="section-number">
                        04
                    </div>

                    Keterangan

                </div>


                <label for="Keterangan"
                       class="form-label">

                    Keterangan Transaksi

                </label>


                <textarea
                    class="form-control"
                    id="Keterangan"
                    name="Keterangan"
                    rows="3"
                    placeholder="Tambahkan keterangan jika diperlukan..."></textarea>


                <div class="helper-text">

                    Isi keterangan tambahan mengenai transaksi.

                </div>


            </div>


        </div>



        <!-- =====================================
             FOOTER
        ====================================== -->

        <div class="form-footer">


            <button type="button"
                    class="btn btn-cancel"
                    onclick="history.back()">

                <i class="bi bi-arrow-left"></i>

                Kembali

            </button>


            <button type="submit"
                    name="submit"
                    class="btn btn-primary">

                <i class="bi bi-check2"></i>

                Simpan Transaksi

            </button>


        </div>


    </div>


</div>



<!-- =========================================
     SCRIPT
========================================= -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<script>

function cari() {

    var val_cari =
        $('#KodeBarang').val();


    $.ajax({

        url: "caribarang.php",

        type: "POST",

        data: {
            KodeBarang: val_cari
        },

        success: function(output) {

            $('#NamaBarang')
                .val(output);

        },

        error: function() {

            $('#NamaBarang')
                .val('Gagal mengambil data');

        }

    });

}

</script>


</body>

</html>