<?php


session_start();
if (!isset($_SESSION["ssLogin"])) {
    header("Location: auth/login.php");
    exit;
}


require_once "config.php";

$title = "Dashboard - Sunday Morning";
require_once "template/header.php";
require_once "template/navbar.php";
require_once "template/sidebar.php";

$queryPemain = mysqli_query($koneksi, "SELECT * FROM tbl_pemain");
$jmlPemain = mysqli_num_rows($queryPemain);

$queryPelatih = mysqli_query($koneksi, "SELECT * FROM tbl_pelatih");
$jmlPelatih = mysqli_num_rows($queryPelatih);

$querySiswa = mysqli_query($koneksi, "SELECT * FROM tbl_akademi");
$jmlSiswa = mysqli_num_rows($querySiswa);

$queryPrestasi = mysqli_query($koneksi, "SELECT * FROM tbl_capaian");
$jmlPrestasi = mysqli_num_rows($queryPrestasi);



?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Dashboard</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item active">Home</li>
            </ol>
            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-primary text-white mb-4">
                        <div class="card-body">Pemain <i class="fa-solid fa-basketball col-6 fa-2x "></i></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">
                                <?= $jmlPemain . ' Orang' ?>
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-warning text-white mb-4">
                        <div class="card-body">Pelatih <i class="fa-solid fa-person-chalkboard col-6 fa-2x "></i></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">
                                <?= $jmlPelatih . ' Orang' ?>
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-success text-white mb-4">
                        <div class="card-body">Akademi <i class="fa-solid fa-graduation-cap col-6 fa-2x"></i></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">
                                <?= $jmlSiswa . ' Orang' ?>
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card bg-danger text-white mb-4">
                        <div class="card-body">Prestasi <i class="fa-regular fa-star col-6 fa-2x"></i></div>
                        <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="#">
                                <?= $jmlPrestasi . ' Prestasi' ?>
                            </a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl">
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-chart-bar me-1"></i>
                            Achievement
                        </div>
                        <div class="card-body"><canvas id="myBarChart" height="70"></canvas></div>
                    </div>
                </div>
            </div>
        </div>
    </main>




    <?php
    require_once "template/footer.php";
    ?>
</div>