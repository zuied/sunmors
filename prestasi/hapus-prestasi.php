<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

$id = $_GET['id'];
$foto = $_GET['foto'];

mysqli_query($koneksi, "DELETE FROM tbl_capaian WHERE id = '$id'");
if ($foto != 'default.png') {
    unlink('../asset/image/' . $foto);
}

echo "<script>
        alert('Data prestasi berhasil dihapus..');
        document.location.href='prestasi.php';
      </script>";
return;