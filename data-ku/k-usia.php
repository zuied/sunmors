<?php



session_start();
if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit();
}
require_once "../config.php";
$title = "Kelompok Umur Pemain - Sunday Morning";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";

// $alert = '';
// if ($msg == 'cancel') {
//     $alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
//     <i class="fa-solid fa-circle-check"></i> Data Pelatih berhasil dihapus..
//     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//   </div>';
// }
// if ($msg == 'added') {
//     $alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
//     <i class="fa-solid fa-circle-check"></i> Data Pelatih berhasil diperbarui..
//     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
//   </div>';
// }


?>


<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Kelompok Tim</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Kelompok Tim</li>
            </ol>


            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa-solid fa-plus"></i> Tambah Kelompok
                        </div>
                        <div class="card-body">
                            <form action="proses-k-usia" method="POST">
                                <div class="mb-3">
                                    <label for="nama" class="form-label ps-1">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="nama"
                                        requierd>
                                </div>
                                <div class="mb-3">
                                    <label for="kelompok" class="form-label ps-1">Kelompok</label>
                                    <select name="kelompok" class="form-select" id="kelompok" requierd>
                                        <option value="" selected>--Pilih Tim--</option>
                                        <option value="Utama">Utama</option>
                                        <option value="U35">U35</option>
                                        <option value="U40">U40</option>
                                        <option value="U45">U45</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary" name="simpan"><i
                                        class="fa-solid fa-floppy-disk"></i>
                                    Simpan</button>
                                <button type="reset" class="btn btn-danger" name="reset"><i
                                        class="fa-solid fa-xmark"></i>
                                    Reset</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-header">
                            <i class="fa-solid fa-list"></i> Data Pemain Tim
                        </div>
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">
                                            <center>Nama</center>
                                        </th>
                                        <th scope="col">
                                            <center>NoKTP</center>
                                        </th>
                                        <th scope="col">
                                            <center>Tim</center>
                                        </th>
                                        <th scope="col">
                                            <center>Operasi</center>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Ibrahim</td>
                                        <td>6371010908770004</td>
                                        <td>Utama</td>
                                        <td align="center">
                                            <a href="" class="btn btn-sm btn-warning" title="update tim"><i
                                                    class="fa-solid fa-pen"></i></a>
                                            <button type="button" id="btnHapus" class="btn btn-sm btn-danger"
                                                title="hapus tim"><i class="fa-solid fa-trash"></i></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>




    <?php


    require_once "../template/footer.php";


    ?>