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

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Daftar Gudang | SIM Gudang</title>


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

            max-width: 1200px;

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

            padding: 0;

        }


        .table {

            margin: 0;

            border-collapse: separate;

            border-spacing: 0;

            font-size: 11px;

        }


        .table thead th {

            background: #f7f9fb;

            color: #596771;

            font-size: 10px;

            font-weight: 600;

            text-transform: uppercase;

            letter-spacing: .3px;

            padding: 13px 18px;

            border-top: none;

            border-bottom: 1px solid #dfe5e9;

            white-space: nowrap;

        }


        .table tbody td {

            padding: 15px 18px;

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
           KODE GUDANG
        ========================================= */

        .kode-gudang {

            font-weight: 600;

            color: #1769aa;

        }


        /* =========================================
           ALAMAT
        ========================================= */

        .alamat {

            color: #52616b;

        }


        .alamat-icon {

            color: #9aa4aa;

            margin-right: 7px;

            font-size: 11px;

        }


        /* =========================================
           EMPTY DATA
        ========================================= */

        .no-data {

            padding: 50px 20px !important;

            text-align: center;

            color: #9aa4aa;

        }


        .no-data-icon {

            width: 42px;

            height: 42px;

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
           CARD FOOTER
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


        .status-dot {

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


            .table {

                min-width: 600px;

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

            <span>Daftar Gudang</span>

        </div>


        <div class="page-title">


            <div class="title-icon">

                <i class="bi bi-building"></i>

            </div>


            <div>

                <h1>

                    Daftar Gudang

                </h1>


                <p>

                    Informasi lokasi dan alamat gudang yang terdaftar dalam sistem.

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

                    Data Gudang

                </div>


                <div class="data-header-subtitle">

                    Gunakan pencarian untuk menemukan gudang berdasarkan kode.

                </div>

            </div>



            <div class="search-wrapper">


                <i class="bi bi-search"></i>


                <input
                    type="text"
                    id="myInput"
                    onkeyup="myFunction()"
                    class="form-control"
                    placeholder="Cari kode gudang...">


            </div>


        </div>



        <!-- TABLE -->

        <div class="table-container table-responsive">


            <table id="myTable"
                   class="table">


                <thead>

                    <tr>

                        <th style="width: 30%;">

                            Kode Gudang

                        </th>


                        <th style="width: 70%;">

                            Alamat Gudang

                        </th>

                    </tr>

                </thead>


                <tbody>


                <?php

                include('koneksi.db.php');


                $sql = "SELECT * FROM gudang";

                $q = mysqli_query(
                    $koneksi,
                    $sql
                );


                $data_ada = false;

                $jumlah_data = 0;


                while ($r = mysqli_fetch_array($q)) {

                    $data_ada = true;

                    $jumlah_data++;


                    echo "

                    <tr>

                        <td>

                            <span class='kode-gudang'>

                                {$r['KodeGudang']}

                            </span>

                        </td>


                        <td>

                            <span class='alamat'>

                                <i class='bi bi-geo-alt alamat-icon'></i>

                                {$r['Alamat']}

                            </span>

                        </td>

                    </tr>

                    ";

                }


                if (!$data_ada) {

                    echo "

                    <tr>

                        <td colspan='2'
                            class='no-data'>


                            <div class='no-data-icon'>

                                <i class='bi bi-building-x'></i>

                            </div>


                            <div class='no-data-title'>

                                Data gudang tidak tersedia

                            </div>


                            <div class='no-data-text'>

                                Belum terdapat data gudang yang tersimpan dalam sistem.

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

                Total data:

                <strong>

                    <?php echo $jumlah_data; ?> gudang

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
     SEARCH SCRIPT
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

        const td =
            tr[i].getElementsByTagName("td")[0];


        if (td) {

            const txtValue =
                td.textContent ||
                td.innerText;


            tr[i].style.display =
                txtValue
                    .toUpperCase()
                    .indexOf(filter) > -1
                    ? ""
                    : "none";

        }

    }

}

</script>


<script src="assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>