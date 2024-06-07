<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";

if (isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $namaevent = htmlspecialchars($_POST['namaevent']);
    $tmpevent = htmlspecialchars($_POST['tmpevent']);
    $tglevent = htmlspecialchars($_POST['tglevent']);
    $ikutserta = $_POST['ikutserta'];
    $hasil = htmlspecialchars($_POST['hasil']);
    $foto = htmlspecialchars($_FILES['image']['name']);



    if ($foto != null) {
        $url = "add-prestasi.php";
        $foto = uploadimg($url);
    } else {
        $foto = 'default.png';
    }


    mysqli_query($koneksi, "INSERT INTO tbl_capaian 
    VALUES(null,'$namaevent', '$tmpevent', '$tglevent', '$ikutserta', '$hasil', '$foto')");

    echo "<script>
            alert('Data Prestasi Berhasil Disimpan...');
            document.location.href = 'add-prestasi.php';
        </script>";
    return;


} else if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $namaevent = htmlspecialchars($_POST['namaevent']);
    $tmpevent = htmlspecialchars($_POST['tmpevent']);
    $tglevent = htmlspecialchars($_POST['tglevent']);
    $ikutserta = $_POST['ikutserta'];
    $hasil = htmlspecialchars($_POST['hasil']);
    $foto = htmlspecialchars($_POST['fotoasa']);
}

if ($_FILES['image']['error'] === 4) {
    $fotoPrestasi = $foto;
} else {
    $url = "prestasi.php";
    $fotoPrestasi = uploadimg($url);
    if ($foto != 'default.png') {
        @unlink('../asset/image/' . $foto);
    }
}


mysqli_query($koneksi, "UPDATE tbl_capaian SET
                            namaevent   = '$namaevent',
                            tmpevent    = '$tmpevent',
                            tglevent    = '$tglevent',
                            ikutserta   = '$ikutserta',
                            hasil       = '$hasil',
                            foto        = '$fotoPrestasi'
                            WHERE id    = '$id'
                                ");

echo "<script>
                alert('Data Prestasi telah di update..');
                document.location.href='prestasi.php';       
        </script>";
return;








?>