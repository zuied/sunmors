<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

if (isset($_POST['simpan'])) {
    $nis = $_POST['nis'];
    $nama = htmlspecialchars($_POST['nama']);
    $tmplahir = htmlspecialchars($_POST['tmplahir']);
    $tgllahir = htmlspecialchars($_POST['tgllahir']);
    $usia = htmlspecialchars($_POST['usia']);
    $jnskelamin = $_POST['jnskelamin'];
    $namaortu = htmlspecialchars($_POST['namaortu']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $telpon = htmlspecialchars($_POST['telpon']);
    $foto = htmlspecialchars($_FILES['image']['name']);



    if ($foto != null) {
        $url = "add-siswa.php";
        $foto = uploadimg($url);
    } else {
        $foto = 'default.png';
    }


    mysqli_query($koneksi, "INSERT INTO tbl_akademi 
    VALUES('$nis', '$nama', '$tmplahir', '$tgllahir', '$usia', '$jnskelamin', '$namaortu', '$alamat', '$telpon', '$foto')");

    echo "<script>
            alert('Data Siswa Berhasil Disimpan...');
            document.location.href = 'add-siswa.php';
        </script>";
    return;


} else if (isset($_POST['update'])) {
    $nis = $_POST['nis'];
    $nama = htmlspecialchars($_POST['nama']);
    $tmplahir = htmlspecialchars($_POST['tmplahir']);
    $tgllahir = htmlspecialchars($_POST['tgllahir']);
    $usia = htmlspecialchars($_POST['usia']);
    $jnskelamin = $_POST['jnskelamin'];
    $namaortu = htmlspecialchars($_POST['namaortu']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $telpon = htmlspecialchars($_POST['telpon']);
    $foto = htmlspecialchars($_POST['fotoLama']);

    if ($_FILES['image']['error'] === 4) {
        $fotoSiswa = $foto;
    } else {
        $url = "siswa.php";
        $fotoSiswa = uploadimg($url);
        if ($foto != 'default.png') {
            @unlink('../asset/image/' . $foto);
        }
    }


    mysqli_query($koneksi, "UPDATE tbl_akademi SET 
                                nama        = '$nama',
                                tmplahir    = '$tmplahir',
                                tgllahir    = '$tgllahir',
                                usia        = '$usia',
                                jnskelamin  = '$jnskelamin',
                                namaortu    = '$namaortu',
                                alamat      = '$alamat',
                                telpon      = '$telpon',
                                foto        = '$fotoSiswa'
                                WHERE nis = '$nis'
                                ");

    echo "<script>
                alert('Data Siswa berhasil di update..');
                document.location.href='siswa.php';       
        </script>";
    return;

}







