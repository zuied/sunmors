<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header('location:../auth/login.php');
    exit();
}

require_once "../config.php";

$id = $_GET["id"];
$foto = $_GET["foto"];

mysqli_query($koneksi, "DELETE FROM tbl_pelatih WHERE id=$id");
if ($foto != 'default.png') {
    unlink("../asset/image/" . $foto);
}

header("location:pelatih.php?msg=deleted");



?>