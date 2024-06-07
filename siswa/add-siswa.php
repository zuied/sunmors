<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";
$title = "Tambah Siswa - Sunday Morning";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

$queryNis = mysqli_query($koneksi, "SELECT max(nis) as maxnis FROM tbl_akademi");
$data = mysqli_fetch_array($queryNis);
$maxnis = $data["maxnis"];

$noUrut = (int) substr($maxnis, 3, 3);
$noUrut++;
$maxnis = "AKM" . sprintf("%03s", $noUrut);


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Tambah Siswa</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="siswa.php">Siswa</a></li>
                <li class="breadcrumb-item active">Tambah Siswa</li>
            </ol>
            <form action="proses-siswa.php" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <span class="h5 my-2"><i class="fa-solid fa-square-plus"></i> Tambah Siswa</span>
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
                                    <label for="nis" class=" col-sm-2 col-form-label">NIS</label>
                                    <label for="nis" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="nis" readonly
                                            class="form-control-plaintext border-bottom ps-2" id="nis"
                                            value="<?= $maxnis ?>">
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
                                    <label for="tmplahir" class=" col-sm-2 col-form-label">Tempat Lahir</label>
                                    <label for="tmplahir" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="tmplahir" required
                                            class="form-control border-0 border-bottom ps-2" id="tmplahir">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="tgllahir" class=" col-sm-2 col-form-label">Tgl Lahir</label>
                                    <label for="tgllahir" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="date" name="tgllahir" required
                                            class="form-control border-0 border-bottom ps-2" id="tgllahir">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="usia" class=" col-sm-2 col-form-label">Usia</label>
                                    <label for="usia" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="usia" readonly
                                            class="form-control-plaintext border-bottom ps-2" id="usia" value="">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="jnskelamin" class=" col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <label for="jnskelamin" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <select name="jnskelamin" id="jnskelamin"
                                            class="form-select border-0 border-bottom" required>
                                            <option selected>--Pilih--</option>
                                            <option value="Laki-Laki">Laki-Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="namaortu" class=" col-sm-2 col-form-label">Nama Orang Tua</label>
                                    <label for="namaortu" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="namaortu" required
                                            class="form-control border-0 border-bottom ps-2" id="namaortu">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="alamat" class=" col-sm-2 col-form-label">Alamat</label>
                                    <label for="alamat" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <textarea name="alamat" id="alamat" cols="30" rows="3"
                                            placeholder="alamat siswa" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="telpon" class=" col-sm-2 col-form-label">Telpon</label>
                                    <label for="telpon" class="col-sm-1 col-form-label">:</label>
                                    <div class="col-sm-9" style="margin-left: -50px;">
                                        <input type="text" name="telpon" pattern="[0-9]{12,}" title="minimal 12 angka"
                                            required class="form-control border-0 border-bottom ps-2" id="telpon">
                                    </div>
                                </div>
                            </div>
                            <div class="col-4 text-center px-5">
                                <img src="../asset/image/default.png" alt="" class="mb-3" width="40%"
                                    style="margin-top:30px">
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