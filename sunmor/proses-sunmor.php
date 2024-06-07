<?php


session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

//jika tombol simpan ditekan
if (isset($_POST['simpan'])) {
    // ambil value yg diposting
    $id = $_POST['id'];
    $nama = trim(htmlspecialchars($_POST['nama']));
    $alamat = trim(htmlspecialchars($_POST['alamat']));
    $telpon = trim(htmlspecialchars($_POST['telpon']));
    $status = $_POST['status'];
    $email = trim(htmlspecialchars($_POST['email']));
    $visimisi = trim(htmlspecialchars($_POST['visimisi']));
    $gbr = trim(htmlspecialchars($_POST['gbrLama']));



    //cek apakah gambar user
    if ($_FILES['image']['error'] === 4) {
        $gbrSunmor = $gbr;
    } else {
        $url = 'profile-sunmor.php';
        $gbrSunmor = uploadimg($url);
        @unlink('../asset/image/' . $gbr);

    }

    //update data
    mysqli_query($koneksi, "UPDATE tbl_sunmor SET
                           nama = '$nama',
                           email = '$email',
                           status = '$status',
                           telpon = '$telpon',
                           alamat = '$alamat',
                           visimisi = '$visimisi',
                           gambar = '$gbrSunmor'
                           WHERE id = '$id'
                            ");
    header("location:profile-sunmor.php?msg=updated");
    return;
}

?>