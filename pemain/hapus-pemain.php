<?php

session_start();

if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

$id = $_GET['noa'];
$foto = $_GET['foto'];

mysqli_query($koneksi, "DELETE FROM tbl_pemain WHERE noa = '$id'");
if ($foto != 'default.png') {
    unlink('../asset/image/' . $foto);
}

echo "<script>
        alert('Data pemain berhasil dihapus..');
        document.location.href='pemain.php';
      </script>";
return;





?>