<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header('location:../auth/login.php');
    exit();

}

require_once "../config.php";
$title = "Tambah Pelatih - Sunday Morning";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$id = $_GET['id'];

$queryPelatih = mysqli_query($koneksi, "SELECT * FROM tbl_pelatih WHERE id=$id");
$data = mysqli_fetch_array($queryPelatih);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Update Pelatih</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="pelatih.php">Pelatih</a></li>
                <li class="breadcrumb-item active"> Update Pelatih</li>
            </ol>
            <form action="proses-pelatih.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-pen-to-square"></i> Update Pelatih</span>
                        <button type="submit" name="update" class="btn btn-primary float-end"><i
                                class="fa-solid fa-floppy-disk"></i> Update</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-8">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <div class="mb-3 row">
                                    <label for="nip" class="col-sm-2 col-form-label">NIP</label>
                                    <label for="nip" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px">
                                        <input type="text" name="nip" pattern="[0-9]{10,}" title="minimal 10 angka"
                                            class="form-control ps-2 border-0 border-bottom" value="<?= $data['nip'] ?>"
                                            required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <label for="nama" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px">
                                        <input type="text" name="nama" class="form-control ps-2 border-0 border-bottom"
                                            value="<?= $data['nama'] ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <label for="alamat" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px">
                                        <textarea name="alamat" id="alamat" cols="30" rows="3"
                                            placeholder="alamat pemain" class="form-control"
                                            required><?= $data['alamat'] ?></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="telpon" class="col-sm-2 col-form-label">Telpon</label>
                                    <label for="nama" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px">
                                        <input type="tel" name="telpon" pattern="[0-9]{12,}" title="minimal 12 angka"
                                            class="form-control ps-2 border-0 border-bottom"
                                            value="<?= $data['telpon'] ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="noktp" class="col-sm-2 col-form-label">No KTP</label>
                                    <label for="noktp" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px">
                                        <input type="noktp" name="noktp" pattern="[0-9]{16,}" title="di isikan 16 angka"
                                            class="form-control ps-2 border-0 border-bottom"
                                            value="<?= $data['noktp'] ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="masaberlaku" class="col-sm-2 col-form-label">Masa Berlaku</label>
                                    <label for="masaberlaku" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px">
                                        <input type="masaberlaku" name="masaberlaku"
                                            class="form-control ps-2 border-0 border-bottom"
                                            value="<?= $data['masaberlaku'] ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center px-5">
                                <input type="hidden" name="fotoLama" value="<?= $data['foto'] ?>">
                                <img src="../asset/image/<?= $data['foto'] ?>" class="mb-3 rounded-circle" width="40%"
                                    alt="">
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