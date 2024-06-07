<?php


session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";
$title = "Tambah Prestasi - Sunday Morning";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"> Tambah Prestasi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="prestasi.php">Achievement</a></li>
                <li class="breadcrumb-item active"> Tambah Prestasi</li>
            </ol>
            <form action="proses-prestasi.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Tambah Prestasi</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i
                                class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i
                                class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3 row">
                                    <label for="namaevent" class="col-sm-2 col-form-label">Nama Event</label>
                                    <label for="namaevent" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="namaevent" required
                                            class="form-control border-0 border-bottom ps-2" id="namaevent">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="tmpevent" class="col-sm-2 col-form-label">Tempat Event</label>
                                    <label for="tmpevent" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="tmpevent"
                                            class="form-control border-0 border-bottom ps-2" id="tmpevent" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="tglevent" class="col-sm-2 col-form-label">Tanggal Event</label>
                                    <label for="tglevent" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="date" name="tglevent" class="form-control" id="tglevent" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="ikutserta" class="col-sm-2 col-form-label">Tim Peserta</label>
                                    <label for="ikutserta" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="ikutserta" id="ikutserta"
                                            class="form-select border-0 border-bottom" required>
                                            <option selected>--Pilih--</option>
                                            <option value="Tim Utama">Tim Utama</option>
                                            <option value="Tim KU40">Tim KU40</option>
                                            <option value="Tim KU35">Tim KU35</option>
                                            <option value="Tim KU12">Tim KU12</option>
                                            <option value="Tim KU10">Tim KU10</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="hasil" class="col-sm-2 col-form-label">Hasil</label>
                                    <label for="hasil" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="type" name="hasil" class="form-control border-0 border-bottom ps-2"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center px-5">
                                <img src="../asset/image/default.png" alt="" class="mb-3" width="40%">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <small class="text-secondary">Pilih foto PNG, JPG atau JPEG dengan ukuran maximal 1
                                    MB</small>
                                <div><small class="text-secondary">widht = height</small></div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>






    <?php

    require_once "../template/footer.php";

    ?>