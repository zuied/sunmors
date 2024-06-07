<?php


session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";
$title = " Update Prestasi - Sunday Morning";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$id = $_GET['id'];

$prestasi = mysqli_query($koneksi, "SELECT * FROM tbl_capaian WHERE id = '$id'");
$data = mysqli_fetch_array($prestasi);


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"> Update Prestasi</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="prestasi.php">Achievement</a></li>
                <li class="breadcrumb-item active"> Update Prestasi</li>
            </ol>
            <form action="proses-prestasi.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i> Update Prestasi</span>
                        <button type="submit" name="update" class="btn btn-primary float-end"><i
                                class="fa-solid fa-floppy-disk"></i> Update</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <div class="mb-3 row">
                                    <label for="namaevent" class="col-sm-2 col-form-label">Nama Event</label>
                                    <label for="namaevent" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="namaevent" required
                                            class="form-control border-0 border-bottom ps-2" id="namaevent"
                                            value="<?= $data['namaevent'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="tmpevent" class="col-sm-2 col-form-label">Tempat Event</label>
                                    <label for="tmpevent" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="tmpevent" required
                                            class="form-control border-0 border-bottom ps-2" id="tmpevent"
                                            value="<?= $data['tmpevent'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="tglevent" class="col-sm-2 col-form-label">Tanggal Event</label>
                                    <label for="tglevent" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="tglevent" required
                                            class="form-control border-0 border-bottom ps-2" id="tglevent"
                                            value="<?= $data['tglevent'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="ikutserta" class=" col-sm-2 col-form-label">Tim Peserta</label>
                                    <label for="ikutserta" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="ikutserta" id="ikutserta"
                                            class="form-select border-0 border-bottom" required>
                                            <?php
                                            $ikutserta = ['Tim Utama', 'Tim KU40', 'Tim KU35', 'Tim KU12', 'Tim KU10'];
                                            foreach ($ikutserta as $serta) {
                                                if ($data['ikutserta'] == $serta) { ?>
                                                    <option value="<?= $serta; ?>" selected>
                                                        <?= $serta; ?>
                                                    </option>
                                                <?php } else { ?>
                                                    <option value="<?= $serta; ?>">
                                                        <?= $serta; ?>
                                                    </option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="hasil" class="col-sm-2 col-form-label">Hasil</label>
                                    <label for="hasil" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="hasil" required
                                            class="form-control border-0 border-bottom ps-2" id="hasil"
                                            value="<?= $data['hasil'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center px-5">
                                <input type="hidden" name="fotoasa" value="<?= $data['foto'] ?>">
                                <img src="../asset/image/<?= $data['foto'] ?>" alt="" class=" mb-3 rounded-circle"
                                    width="40%">
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