<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header('location:../auth/login.php');
    exit();

}


require_once "../config.php";

if (isset($_POST['simpan'])) {
    $nip = $_POST['nip'];
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $telpon = htmlspecialchars($_POST['telpon']);
    $noktp = htmlspecialchars($_POST['noktp']);
    $masaberlaku = htmlspecialchars($_POST['masaberlaku']);
    $foto = htmlspecialchars($_FILES['image']['name']);


    $cekNip = mysqli_query($koneksi, "SELECT nip FROM tbl_pelatih WHERE nip = '$nip'");
    if (mysqli_num_rows($cekNip) > 0) {
        header("location:add-pelatih.php?msg=cancel");
        return;
    }

    if ($foto != null) {
        $url = "add-pelatih.php";
        $foto = uploadimg($url);
    } else {
        $foto = 'default.png';
    }

    mysqli_query($koneksi, "INSERT INTO tbl_pelatih VALUES 
    (null,'$nip', '$nama','$alamat', '$telpon', '$noktp', '$masaberlaku', '$foto')");

    header("location:add-pelatih.php?msg=added");
    return;
}

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $nip = htmlspecialchars($_POST['nip']);
    $nama = htmlspecialchars($_POST['nama']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $telpon = htmlspecialchars($_POST['telpon']);
    $noktp = htmlspecialchars($_POST['noktp']);
    $masaberlaku = htmlspecialchars($_POST['masaberlaku']);
    $foto = htmlspecialchars($_POST['fotoLama']);

    $sqlPelatih = mysqli_query($koneksi, "SELECT * FROM tbl_pelatih WHERE id = $id");
    $data = mysqli_fetch_array($sqlPelatih);
    $curNIP = $data['nip'];

    $newNIP = mysqli_query($koneksi, "SELECT nip FROM tbl_pelatih WHERE nip = '$nip'");

    if ($nip !== $curNIP) {
        if (mysqli_num_rows($newNIP) > 0) {
            header("location:pelatih.php?msg=cancel");
            return;
        }
    }

    if ($_FILES['image']['error'] === 4) {
        $fotoPelatih = $foto;
    } else {
        $url = "pelatih.php";
        $fotoPelatih = uploadimg($url);
        if ($foto !== 'default.png') {
            @unlink('../asset/image/' . $foto);
        }
    }

    mysqli_query($koneksi, "UPDATE tbl_pelatih SET 
                            nip = '$nip',
                            nama = '$nama',
                            alamat = '$alamat',
                            telpon = '$telpon',
                            noktp = '$noktp',
                            masaberlaku = '$masaberlaku',
                            foto = '$fotoPelatih'
                            WHERE id = $id
                         ");

    header("location:pelatih.php?msg=updated");
    return;
}



?>