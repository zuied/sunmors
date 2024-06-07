<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

if (isset($_POST['simpan'])) {
    $noa = $_POST['noa'];
    $nama = htmlspecialchars($_POST['nama']);
    $tglLahir = htmlspecialchars($_POST['tglLahir']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $noktp = htmlspecialchars($_POST['noktp']);
    $email = htmlspecialchars($_POST['email']);
    $telpon = htmlspecialchars($_POST['telpon']);
    $foto = htmlspecialchars($_FILES['image']['name']);

    if ($foto != null) {
        $url = "add-pemain.php";
        $foto = uploadimg($url);
    } else {
        $foto = 'default.png';
    }



    mysqli_query($koneksi, "INSERT INTO tbl_pemain 
    VALUES('$noa', '$nama', '$tglLahir', '$alamat', '$noktp', '$email', '$telpon', '$foto')");

    echo "<script>
                alert('Data Pemain Berhasil Disimpan...');
                document.location.href = 'add-pemain.php';
        </script>";
    return;
} else if (isset($_POST['update'])) {
    $noa = $_POST['noa'];
    $nama = htmlspecialchars($_POST['nama']);
    $tglLahir = htmlspecialchars($_POST['tglLahir']);
    $alamat = htmlspecialchars($_POST['alamat']);
    $noktp = htmlspecialchars($_POST['noktp']);
    $email = htmlspecialchars($_POST['email']);
    $telpon = htmlspecialchars($_POST['telpon']);
    $foto = htmlspecialchars($_POST['fotojadul']);
}
if ($_FILES['image']['error'] === 4) {
    $fotoPemain = $foto;
} else {
    $url = "pemain.php";
    $fotoPemain = uploadimg($url);
    if ($foto != 'default.png') {
        @unlink('../asset/image/' . $foto);
    }
}

mysqli_query($koneksi, "UPDATE tbl_pemain SET 
                                nama        = '$nama',
                                tglLahir    = '$tglLahir',
                                alamat      = '$alamat',
                                noktp       = '$noktp',
                                email       = '$email',
                                telpon      = '$telpon',
                                foto        = '$fotoPemain'
                                WHERE noa = '$noa'
                                ");

echo "<script>
                alert('Data pemain berhasil di update..');
                document.location.href='pemain.php';       
        </script>";
return;


?>