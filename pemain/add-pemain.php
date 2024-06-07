<?php


session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";
$title = " Tambah Pemain - Sunday Morning";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$queryNoa = mysqli_query($koneksi, "SELECT max(noa) as maxnoa FROM tbl_pemain");
$data = mysqli_fetch_array($queryNoa);
$maxnoa = $data["maxnoa"];

$noUrut = (int) substr($maxnoa, 3, 3);
$noUrut++;
$maxnoa = "SMY" . sprintf("%03s", $noUrut);


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"> Tambah Pemain</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="pemain.php">Pemain</a></li>
                <li class="breadcrumb-item active"> Tambah Pemain</li>
            </ol>
            <form action="proses-pemain.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Tambah Pemain</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i
                                class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-1"><i
                                class="fa-solid fa-xmark"></i>
                            Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3 row">
                                    <label for="noa" class="col-sm-2 col-form-label">NOA</label>
                                    <label for="noa" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="noa" readonly
                                            class="form-control-plaintext border-bottom ps-2" id="noa"
                                            value="<?= $maxnoa ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <label for="nama" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="nama" required
                                            class="form-control border-0 border-bottom ps-2" id="nama">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="tgllahir" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <label for="tgllahir" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="date" name="tglLahir" required
                                            class="form-control border-0 border-bottom ps-2" id="tglLahir">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <label for="alamat" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <textarea name="alamat" id="alamat" cols="30" rows="3"
                                            placeholder="alamat pemain" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="noktp" class="col-sm-2 col-form-label">No KTP</label>
                                    <label for="noktp" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="noktp" pattern="[0-9]{6}-[0-9]{6}-[0-9]{4}"
                                            placeholder="xxxxxx-xxxxxx-xxxx" title="isikan 16 angka" required
                                            class="form-control border-0 border-bottom ps-2" id="noktp">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <label for="email" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="email" required
                                            class="form-control border-0 border-bottom ps-2" id="email">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="telpon" class="col-sm-2 col-form-label">Telpon</label>
                                    <label for="telpon" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="tel" name="telpon" pattern="62[0-9]{3}-[0-9]{4}-[0-9]{4}"
                                            title="isikan 11 angka setelah 62" placeholder="62xxx-xxxx-xxxx" required
                                            class="form-control border-0 border-bottom ps-2" id="telpon">
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