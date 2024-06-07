<?php


session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";
$title = " Update Siswa - Sunday Morning";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$nis = $_GET['nis'];

$siswa = mysqli_query($koneksi, "SELECT * FROM tbl_akademi WHERE nis = '$nis'");
$data = mysqli_fetch_array($siswa);


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4"> Update Siswa</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="siswa.php">Siswa</a></li>
                <li class="breadcrumb-item active"> Update Siswa</li>
            </ol>
            <form action="proses-siswa.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i> Update Siswa</span>
                        <button type="submit" name="update" class="btn btn-primary float-end"><i
                                class="fa-solid fa-floppy-disk"></i> Update</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <div class="mb-3 row">
                                    <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                                    <label for="nis" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="nis" readonly
                                            class="form-control-plaintext border-bottom ps-2" id="nis"
                                            value="<?= $nis ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <label for="nama" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="nama" required
                                            class="form-control border-0 border-bottom ps-2" id="nama"
                                            value="<?= $data['nama'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="tmplahir" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <label for="tmplahir" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="tmplahir" required
                                            class="form-control border-0 border-bottom ps-2" id="tmplahir"
                                            value="<?= $data['tmplahir'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="tgllahir" class="col-sm-2 col-form-label">Tgl Lahir</label>
                                    <label for="tgllahir" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="date" name="tgllahir" required
                                            class="form-control border-0 border-bottom ps-2" id="tgllahir"
                                            value="<?= $data['tgllahir'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jnskelamin" class=" col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <label for="jnskelamin" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="jnskelamin" id="jnskelamin"
                                            class="form-select border-0 border-bottom" required>
                                            <?php
                                            $jnskelamin = ["Laki-Laki", "Perempuan"];
                                            foreach ($jnskelamin as $klm) {
                                                if ($data['jnskelamin'] == $klm) { ?>
                                                    <option value="<?= $klm ?>" selected>
                                                        <?= $klm ?>
                                                    </option>
                                                <?php } else { ?>
                                                    <option value="<?= $klm ?>">
                                                        <?= $klm ?>
                                                    </option>
                                                    <?php
                                                }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="namaortu" class="col-sm-2 col-form-label">Nama Orang Tua</label>
                                    <label for="namaortu" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="namaortu" required
                                            class="form-control border-0 border-bottom ps-2" id="namaortu"
                                            value="<?= $data['namaortu'] ?>">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <label for="alamat" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <textarea name="alamat" id="alamat" cols="30" rows="3"
                                            placeholder="alamat pemain" class="form-control"
                                            required><?= $data['alamat'] ?></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="telpon" class="col-sm-2 col-form-label">Telpon</label>
                                    <label for="telpon" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="telpon" required
                                            class="form-control border-0 border-bottom ps-2" id="telpon"
                                            value="<?= $data['telpon'] ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center px-5">
                                <input type="hidden" name="fotoLama" value="<?= $data['foto'] ?>">
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