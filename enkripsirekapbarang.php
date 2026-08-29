<?php
session_start();

if (empty($_SESSION['username']) || empty($_SESSION['level'])) {
    echo "<script>
        alert('Maaf, untuk mengakses halaman ini, Anda harus Login terlebih dahulu.');
        window.location.href='index.php';
    </script>";
    exit;
}


/* =========================================
   AMBIL DATA DARI WEB SERVICE
========================================= */

$data = file_get_contents(
    'http://localhost/gudangkita/wsjsongudangbarang.php'
);

$arrahhasil = json_decode($data);

?>

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Rekap Transaksi | SIM Gudang</title>


    <!-- Bootstrap -->

    <link href="assets/css/bootstrap.min.css"
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

            max-width: 1350px;

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
           DATA CARD
        ========================================= */

        .data-card {

            background: #ffffff;

            border: 1px solid #e3e8ed;

            border-radius: 10px;

            overflow: hidden;

        }


        /* =========================================
           CARD HEADER
        ========================================= */

        .data-header {

            padding: 18px 24px;

            border-bottom: 1px solid #e8ecef;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 20px;

        }


        .data-header-title {

            font-size: 14px;

            font-weight: 600;

            color: #263238;

        }


        .data-header-subtitle {

            font-size: 10px;

            color: #9aa4aa;

            margin-top: 3px;

        }


        /* =========================================
           SEARCH
        ========================================= */

        .search-wrapper {

            position: relative;

            width: 280px;

        }


        .search-wrapper i {

            position: absolute;

            left: 12px;

            top: 50%;

            transform: translateY(-50%);

            color: #9aa4aa;

            font-size: 12px;

        }


        #myInput {

            height: 38px;

            padding-left: 34px;

            border: 1px solid #dce2e7;

            border-radius: 7px;

            font-size: 11px;

            box-shadow: none;

        }


        #myInput:focus {

            border-color: #7eabc7;

            box-shadow:
                0 0 0 3px rgba(23,105,170,.08);

        }


        #myInput::placeholder {

            color: #aab3b9;

        }


        /* =========================================
           TABLE
        ========================================= */

        .table-container {

            overflow-x: auto;

        }


        .table {

            margin: 0;

            border-collapse: separate;

            border-spacing: 0;

            font-size: 11px;

            min-width: 900px;

        }


        .table thead th {

            background: #f7f9fb;

            color: #596771;

            font-size: 10px;

            font-weight: 600;

            text-transform: uppercase;

            letter-spacing: .3px;

            padding: 13px 16px;

            border-bottom: 1px solid #dfe5e9;

            white-space: nowrap;

        }


        .table tbody td {

            padding: 14px 16px;

            vertical-align: middle;

            color: #52616b;

            border-bottom: 1px solid #edf0f2;

            background: #ffffff;

        }


        .table tbody tr:last-child td {

            border-bottom: none;

        }


        .table tbody tr:hover td {

            background: #f8fafc;

        }


        /* =========================================
           KODE BARANG
        ========================================= */

        .kode-barang {

            font-weight: 600;

            color: #1769aa;

        }


        /* =========================================
           NAMA BARANG
        ========================================= */

        .nama-barang {

            font-weight: 500;

            color: #34434e;

        }


        /* =========================================
           DATE
        ========================================= */

        .tanggal {

            color: #65727b;

            white-space: nowrap;

        }


        /* =========================================
           STATUS
        ========================================= */

        .status {

            display: inline-flex;

            align-items: center;

            gap: 6px;

            padding: 5px 9px;

            border-radius: 5px;

            font-size: 9px;

            font-weight: 600;

        }


        .status-masuk {

            background: #edf7f1;

            color: #31794f;

        }


        .status-keluar {

            background: #fff4ed;

            color: #a75b32;

        }


        .status-dot {

            width: 5px;

            height: 5px;

            border-radius: 50%;

            background: currentColor;

        }


        /* =========================================
           JUMLAH
        ========================================= */

        .jumlah {

            font-weight: 600;

            color: #34434e;

        }


        /* =========================================
           LOKASI
        ========================================= */

        .lokasi {

            display: flex;

            align-items: center;

            gap: 7px;

            color: #52616b;

        }


        .lokasi i {

            color: #8e9aa1;

            font-size: 11px;

        }


        /* =========================================
           EMPTY STATE
        ========================================= */

        .no-data {

            padding: 55px 20px !important;

            text-align: center;

            color: #9aa4aa;

        }


        .no-data-icon {

            width: 44px;

            height: 44px;

            margin: 0 auto 10px;

            border-radius: 8px;

            background: #f4f6f8;

            display: flex;

            align-items: center;

            justify-content: center;

            color: #9aa4aa;

            font-size: 18px;

        }


        .no-data-title {

            font-size: 12px;

            font-weight: 600;

            color: #68757d;

        }


        .no-data-text {

            font-size: 10px;

            margin-top: 3px;

        }


        /* =========================================
           FOOTER
        ========================================= */

        .data-footer {

            padding: 14px 24px;

            border-top: 1px solid #e8ecef;

            background: #fafbfc;

            display: flex;

            justify-content: space-between;

            align-items: center;

        }


        .footer-info {

            font-size: 10px;

            color: #9aa4aa;

        }


        .footer-info strong {

            color: #65727b;

            font-weight: 600;

        }


        .status-indicator {

            display: flex;

            align-items: center;

            gap: 6px;

            font-size: 10px;

            color: #8b969e;

        }


        .status-indicator .status-dot {

            width: 6px;

            height: 6px;

            border-radius: 50%;

            background: #4f9d69;

        }


        /* =========================================
           RESPONSIVE
        ========================================= */

        @media (max-width: 768px) {

            .page-wrapper {

                padding: 18px;

            }


            .data-header {

                display: block;

            }


            .search-wrapper {

                width: 100%;

                margin-top: 14px;

            }


            .data-footer {

                display: block;

            }


            .status-indicator {

                margin-top: 7px;

            }

        }


        @media (max-width: 576px) {

            .page-title h1 {

                font-size: 18px;

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

            <span>Laporan</span>

            <i class="bi bi-chevron-right"></i>

            <span>Rekap Transaksi</span>

        </div>


        <div class="page-title">


            <div class="title-icon">

                <i class="bi bi-arrow-left-right"></i>

            </div>


            <div>

                <h1>

                    Rekap Transaksi

                </h1>


                <p>

                    Riwayat pergerakan barang masuk dan keluar pada gudang.

                </p>

            </div>


        </div>


    </div>



    <!-- =====================================
         DATA CARD
    ====================================== -->

    <div class="data-card">


        <!-- HEADER -->

        <div class="data-header">


            <div>

                <div class="data-header-title">

                    Data Transaksi Barang

                </div>


                <div class="data-header-subtitle">

                    Informasi transaksi barang berdasarkan gudang dan waktu transaksi.

                </div>

            </div>



            <div class="search-wrapper">


                <i class="bi bi-search"></i>


                <input
                    type="text"
                    id="myInput"
                    onkeyup="myFunction()"
                    class="form-control"
                    placeholder="Cari kode barang...">


            </div>


        </div>



        <!-- TABLE -->

        <div class="table-container">


            <table id="myTable"
                   class="table">


                <thead>

                    <tr>

                        <th style="width: 13%;">

                            Kode Barang

                        </th>


                        <th style="width: 21%;">

                            Nama Barang

                        </th>


                        <th style="width: 14%;">

                            Waktu Transaksi

                        </th>


                        <th style="width: 13%;">

                            Status

                        </th>


                        <th style="width: 10%;">

                            Jumlah

                        </th>


                        <th style="width: 29%;">

                            Lokasi Gudang

                        </th>

                    </tr>

                </thead>


                <tbody>


                <?php

                $jumlah_data = 0;


                if (is_array($arrahhasil) || is_object($arrahhasil)) {

                    foreach ($arrahhasil as $k) {

                        $jumlah_data++;


                        $statusClass = '';

                        if (strtolower($k->StatusTransaksi) == 'masuk') {

                            $statusClass = 'status-masuk';

                        } else {

                            $statusClass = 'status-keluar';

                        }

                        ?>


                        <tr>


                            <!-- KODE -->

                            <td>

                                <span class="kode-barang">

                                    <?php
                                    echo htmlspecialchars(
                                        $k->KodeBarang
                                    );
                                    ?>

                                </span>

                            </td>



                            <!-- NAMA -->

                            <td>

                                <span class="nama-barang">

                                    <?php
                                    echo htmlspecialchars(
                                        $k->NamaBarang
                                    );
                                    ?>

                                </span>

                            </td>



                            <!-- WAKTU -->

                            <td>

                                <span class="tanggal">

                                    <i class="bi bi-calendar3 me-1"></i>

                                    <?php
                                    echo htmlspecialchars(
                                        $k->WaktuTransaksi
                                    );
                                    ?>

                                </span>

                            </td>



                            <!-- STATUS -->

                            <td>

                                <span class="status <?php echo $statusClass; ?>">

                                    <span class="status-dot"></span>

                                    <?php
                                    echo htmlspecialchars(
                                        $k->StatusTransaksi
                                    );
                                    ?>

                                </span>

                            </td>



                            <!-- JUMLAH -->

                            <td>

                                <span class="jumlah">

                                    <?php
                                    echo htmlspecialchars(
                                        $k->Jumlah
                                    );
                                    ?>

                                </span>

                            </td>



                            <!-- LOKASI -->

                            <td>

                                <div class="lokasi">

                                    <i class="bi bi-geo-alt"></i>

                                    <span>

                                        <?php
                                        echo htmlspecialchars(
                                            $k->Alamat
                                        );
                                        ?>

                                    </span>

                                </div>

                            </td>


                        </tr>


                        <?php

                    }

                }


                if ($jumlah_data == 0) {

                    echo "

                    <tr>

                        <td colspan='6'
                            class='no-data'>


                            <div class='no-data-icon'>

                                <i class='bi bi-arrow-left-right'></i>

                            </div>


                            <div class='no-data-title'>

                                Data transaksi tidak tersedia

                            </div>


                            <div class='no-data-text'>

                                Belum terdapat transaksi barang yang tersimpan dalam sistem.

                            </div>


                        </td>

                    </tr>

                    ";

                }

                ?>


                </tbody>


            </table>


        </div>



        <!-- FOOTER -->

        <div class="data-footer">


            <div class="footer-info">

                Total transaksi:

                <strong>

                    <?php echo $jumlah_data; ?> transaksi

                </strong>

            </div>


            <div class="status-indicator">

                <span class="status-dot"></span>

                Data tersinkronisasi dengan sistem

            </div>


        </div>


    </div>


</div>



<!-- =========================================
     SEARCH
========================================= -->

<script>

function myFunction() {

    const input =
        document.getElementById("myInput");


    const filter =
        input.value.toUpperCase();


    const table =
        document.getElementById("myTable");


    const tr =
        table.getElementsByTagName("tr");


    for (let i = 1; i < tr.length; i++) {

        let found = false;


        const td =
            tr[i].getElementsByTagName("td");


        /*
         * Cari berdasarkan:
         * Kode Barang
         * Nama Barang
         * Alamat Gudang
         */

        for (let j = 0; j < td.length; j++) {

            if (td[j]) {

                const txtValue =
                    td[j].textContent ||
                    td[j].innerText;


                if (
                    txtValue
                        .toUpperCase()
                        .indexOf(filter) > -1
                ) {

                    found = true;

                    break;

                }

            }

        }


        tr[i].style.display =
            found ? "" : "none";

    }

}

</script>


<script src="assets/js/bootstrap.bundle.min.js"></script>


</body>

</html>