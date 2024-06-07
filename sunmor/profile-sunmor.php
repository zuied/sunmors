<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

$title = "Profile Sunday Morning";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
} else {
    $msg = '';
}

$alert = '';
if ($msg == 'cancel') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-triangle-exclamation"></i> Tambah user gagal, username sudah ada..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}


if ($msg == 'notimage') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-triangle-exclamation"></i> Update data gagal, file yg anda upload bukan gambar..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}


if ($msg == 'oversize') {
    $alert = '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-triangle-exclamation"></i> Update data gagal, maximal ukuran gambar 1 MB..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

if ($msg == 'updated') {
    $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <i class="fa-solid fa-circle-check"></i> Data berhasil diperbaharui
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
}

$sunmors = mysqli_query($koneksi, "SELECT * FROM tbl_sunmor WHERE id=1");
$data = mysqli_fetch_array($sunmors);

?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Sunday Morning</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php"></a>Home</li>
                <li class="breadcrumb-item active">Profile Sunday Morning</li>
            </ol>
            <form action="proses-sunmor.php" method="POST" enctype="multipart/form-data">
                <?php
                if ($msg !== '') {
                    echo $alert;
                }
                ?>
                <div class="card">
                    <div class="card-header">
                        <span class="h5"><i class="fa-solid fa-pen-to-square"></i>Data SunMor</span>
                        <button type="submit" name="simpan" class="btn btn-primary float-end"><i
                                class="fa-solid fa-floppy-disk"></i> Simpan</button>
                        <button type="reset" name="reset" class="btn btn-danger float-end me-sm-1"><i
                                class="fa-solid fa-xmark"></i> Reset</button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-4 text-center px-5">
                                <input type="hidden" name="gbrLama" value="<?= $data['gambar'] ?>">
                                <img src="../asset/image/<?= $data['gambar'] ?>" alt="gambar SM" class="mb-3"
                                    width="100%">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <small class="text-secondary">Pilih gambar PNG, JPG atau JPEG dgn ukuran max 1
                                    MB</small>
                            </div>
                            <div class="col-8">
                                <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                    <label for="nama" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" class="form-control border-0 border-bottom" id="nama"
                                            name="nama" value="<?= $data['nama'] ?>" placeholder="nama SunMor" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <label for="alamat" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="3"
                                            required><?= $data['alamat'] ?></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="telpon" class="col-sm-2 col-form-label">Telpon</label>
                                    <label for="telpon" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" class="form-control border-0 border-bottom" id="telpon"
                                            name="telpon" value="<?= $data['telpon'] ?>" required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <label for="status" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="status" id="status" class="form-select border-0 border-bottom"
                                            required>
                                            <option value="Yayasan ">Yayasan</option>
                                            <option value="Perusahaan">Perusahaan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <label for="email" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" class="form-control border-0 border-bottom" id="email"
                                            name="email" value="<?= $data['email'] ?>" placeholder="email SunMor"
                                            required>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="visimisi" class="col-sm-2 col-form-label">Visi & Misi</label>
                                    <label for="visimisi" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <textarea name="visimisi" class="form-control" id="visimisi" cols="30" rows="3"
                                            required><?= $data['visimisi'] ?></textarea>
                                    </div>
                                </div>
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



</div>