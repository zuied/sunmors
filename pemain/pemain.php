<?php


session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";
$title = "Pemain - Sunday Morning";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";


?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Pemain</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Pemain</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Pemain</span>
                    <a href="<?= $main_url ?>pemain/add-pemain.php" class="btn btn-sm btn-primary float-end"><i
                            class="fa-solid fa-plus"></i> Tambah Pemain</a>
                    <div class="dropdown" style="margin-top: -30px;">
                        <button class="btn btn-sm btn-primary dropdown-toggle float-end  me-1" type="button"
                            data-bs-toggle="dropdown"><i class="fa-solid fa-print"></i> Cetak</button>
                        <ul class="dropdown-menu">
                            <li><button type="button" onclick="printDoc()" class="dropdown-item"><i
                                        class="fa-solid fa-magnifying-glass"></i> Cetak Semua Data
                                </button></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><button type="button" class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#mdlCetak"><i class="fa-solid fa-magnifying-glass"></i> Cetak
                                    KU Data
                                </button></li>
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-hover" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">
                                    <center>Foto</center>
                                </th>
                                <th scope="col">
                                    <center>NOA</center>
                                </th>
                                <th scope="col">
                                    <center>Nama</center>
                                </th>
                                <th scope="col">
                                    <center>Tanggal Lahir</center>
                                </th>
                                <th scope="col">
                                    <center>Usia</center>
                                </th>
                                <th scope="col">
                                    <center>Alamat</center>
                                </th>
                                <th scope="col">
                                    <center>NoKTP</center>
                                </th>
                                <th scope="col">
                                    <center>Email</center>
                                </th>
                                <th scope="col">
                                    <center>Telpon</center>
                                </th>
                                <th scope="col">
                                    <center>Operasi</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $queryPemain = mysqli_query($koneksi, "SELECT * FROM tbl_pemain");
                            while ($data = mysqli_fetch_array($queryPemain)) {

                                $tglLahir = $data['tglLahir'];
                                $umur = new DateTime($tglLahir);
                                $now = new DateTime();
                                $usia = $now->diff($umur);

                                ?>
                                <tr>
                                    <th scope="row">
                                        <?= $no++ ?>
                                    </th>
                                    <td align="center"><img src="../asset/image/<?= $data['foto'] ?>" class="rounded-circle"
                                            alt="foto pemain" width="60px"></td>
                                    <td>
                                        <?= $data['noa'] ?>
                                    </td>
                                    <td>
                                        <?= $data['nama'] ?>
                                    </td>
                                    <td>
                                        <?= date(' d M Y', strtotime($data['tglLahir'])) ?>
                                    </td>
                                    <td>
                                        <?= $usia->y . "&nbsp" . "Thn" ?>
                                    </td>
                                    <td>
                                        <?= $data['alamat'] ?>
                                    </td>
                                    <td>
                                        <?= $data['noktp'] ?>
                                    </td>
                                    <td>
                                        <?= $data['email'] ?>
                                    </td>
                                    <td>
                                        <?= $data['telpon'] ?>
                                    </td>
                                    <td align="center">
                                        <a href="edit-pemain.php?noa=<?= $data['noa'] ?>" class="btn btn-sm btn-warning"
                                            title="Update Pemain"><i class="fa-solid fa-pen"></i></a>
                                        <a href="hapus-pemain.php?noa=<?= $data['noa'] ?>&foto=<?= $data['foto'] ?>"
                                            class="btn btn-sm btn-danger" title="Hapus Pemain"
                                            onclick="return confirm('Anda yakin akan menghapus data ini ?')"><i
                                                class="fa-solid fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <div class="modal" tabindex="-1" id="mdlCetak">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <label class="form-label">Pilih KU</label>
                    <select name="ku" id="ku" class="form-select">
                        <option value="">--Kelompok Umur--</option>
                        <?php
                        $dataKU = mysqli_query($koneksi, "SELECT * FROM tbl_pemain");
                        while ($data = mysqli_fetch_array($dataKU)) { ?>
                            <option value="<?= $usia->y . "&nbsp" . "Thn" ?>">UTAMA</option>
                            <option value="<?= $usia->y . "&nbsp" . "Thn" ?>">KU35</option>
                            <option value="<?= $usia->y . "&nbsp" . "Thn" ?>">KU40</option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="previewPDF()">OK</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function printDoc() {
            const myWindow = window.open("../report/r-pemain.php", "", "widht=900, height=600, left=100");
        }
    </script>




    <?php

    require_once "../template/footer.php";

    ?>