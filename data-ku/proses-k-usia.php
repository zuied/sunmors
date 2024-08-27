<?php



session_start();
if (!isset($_SESSION['ssLogin'])) {
    header("location:../auth/login.php");
    exit();
}
require_once "../config.php";

if (isset($_POST['simpan'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $noktp = htmlspecialchars($_POST['noktp']);
    $tim = $_POST['tim'];

    $cekTim = mysqli_query($koneksi, "SELECT * FROM tbl_tim WHERE tim = '$tim'");
    if (mysqli_num_rows($cekTim) > 0) {
        header("location:k-usia.php?msg=cancel");
        return;
    }

    mysqli_query($koneksi, "INSERT INTO tbl_tim VALUES(null,'$nama','$noktp','$guru')");

    header("location:k-usia.php?msg=added");
    return;

}

?>