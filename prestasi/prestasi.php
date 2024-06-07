<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit();
}

require_once "../config.php";
$title = "Achievement - Sunday Morning";
require_once "../template/header.php";
require_once "../template/navbar.php";
require_once "../template/sidebar.php";



?>

<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4">
            <h1 class="mt-4">Achievement</h1>
            <ol class="breadcrumb mb-4">
                <li class="breadcrumb-item"><a href="../index.php">Home</a></li>
                <li class="breadcrumb-item active">Achievement</li>
            </ol>
            <div class="card">
                <div class="card-header">
                    <span class="h5 my-2"><i class="fa-solid fa-list"></i> Data Prestasi</span>
                    <a href="<?= $main_url ?>prestasi/add-prestasi.php" class="btn btn-sm btn-primary float-end"><i
                            class="fa-solid fa-plus"></i> Tambah Prestasi</a>
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <form action="" method="GET" class="col-3">
                            <?php
                            if (@$_GET['cari']) {
                                $cari = @$_GET['cari'];
                            } else {
                                $cari = "";
                            }
                            ?>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="keyword" name="cari"
                                    value="<?= $cari ?>">
                                <button class="btn btn-secondary" type="submit" id="btnCari"><i
                                        class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </form>
                        <?php
                        $page = 5;
                        if (isset($_GET['hal'])) {
                            $halaktif = $_GET['hal'];
                        } else {
                            $halaktif = 1;
                        }

                        if (@$_GET['cari']) {
                            $keyword = @$_GET['cari'];
                        } else {
                            $keyword = "";
                        }

                        $start = ($page * $halaktif) - $page;
                        $no = $start + 1;
                        $queryPrestasi = mysqli_query($koneksi, "SELECT *  FROM tbl_capaian WHERE namaevent like '%$keyword%' or tmpevent like '%$keyword%' or ikutserta like '%$keyword%' limit $page offset $start");

                        $queryJmlData = mysqli_query($koneksi, "SELECT *  FROM tbl_capaian WHERE namaevent like '%$keyword%' or tmpevent like '%$keyword%' or ikutserta like '%$keyword%'");
                        $jmlData = mysqli_num_rows($queryJmlData);
                        $pages = ceil($jmlData / $page);
                        ?>
                        <div class="col-4 text-end">
                            <label class="col-8 col-form-label text-end">Jumlah Data :
                                <?= $jmlData ?>
                            </label>
                        </div>
                    </div>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">
                                    <center>Foto</center>
                                </th>
                                <th scope="col">
                                    <center>Nama Event</center>
                                </th>
                                <th scope="col">
                                    <center>Tempat Event</center>
                                </th>
                                <th scope="col">
                                    <center>Tanggal Event</center>
                                </th>
                                <th scope="col">
                                    <center>Tim Peserta</center>
                                </th>
                                <th scope="col">
                                    <center>Hasil</center>
                                </th>
                                <th scope="col">
                                    <center>Operasi</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (mysqli_num_rows($queryPrestasi) > 0) {
                                while ($data = mysqli_fetch_array($queryPrestasi)) { ?>
                                    <tr>
                                        <th scope="row">
                                            <?= $no++ ?>
                                        </th>
                                        <td align="center"><img src="../asset/image/<?= $data['foto'] ?>" class="rounded-circle"
                                                alt="foto prestasi" width="60px"></td>
                                        <td>
                                            <?= $data['namaevent'] ?>
                                        </td>
                                        <td>
                                            <?= $data['tmpevent'] ?>
                                        </td>
                                        <td>
                                            <?= $data['tglevent'] ?>
                                        </td>
                                        <td>
                                            <?= $data['ikutserta'] ?>
                                        </td>
                                        <td>
                                            <?= $data['hasil'] ?>
                                        </td>
                                        <td align="center">
                                            <a href="edit-prestasi.php?id=<?= $data['id'] ?>" class="btn btn-sm btn-warning"
                                                title="Update Prestasi"><i class="fa-solid fa-pen"></i></a>
                                            <a href="hapus-prestasi.php?id=<?= $data['id'] ?>&foto=<?= $data['foto'] ?>"
                                                class="btn btn-sm btn-danger" title="Hapus Prestasi"
                                                onclick="return confirm('Anda yakin akan menghapus data ini ?')"><i
                                                    class="fa-solid fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="6" align="center">Tidak ada data...masukan keyword yang benar</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <?php if ($halaktif > 1) { ?>
                                <li class="page-item">
                                    <a class="page-link" href="?hal=<?= $halaktif - 1 ?>&cari=<?= $keyword ?>"
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                            <?php }
                            for ($hal = 1; $hal <= $pages; $hal++) {
                                if ($hal == $halaktif) { ?>
                                    <li class="page-item active"><a class="page-link"
                                            href="?hal=<?= $hal ?>&cari=<?= $keyword ?>">
                                            <?= $hal ?>
                                        </a></li>
                                <?php } else { ?>
                                    <li class="page-item"><a class="page-link" href="?hal=<?= $hal ?>&cari=<?= $keyword ?>">
                                            <?= $hal ?>
                                        </a></li>
                                <?php }
                            }
                            if ($halaktif < $pages) { ?>
                                <li class="page-item">
                                    <a class="page-link" href="?hal=<?= $halaktif + 1 ?>&cari=<?= $keyword ?>"
                                        aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </main>





    <?php

    require_once "../template/footer.php";

    ?>