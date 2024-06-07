<?php

session_start();

if (!isset($_SESSION["ssLogin"])) {
    header("location:../auth/login.php");
    exit;
}

require_once "../config.php";



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pemain Sunday Morning</title>
</head>

<body>
    <div style="text-align:center">
        <h2 style="margin-bottom:-15px">Data Pemain</h2>
        <h2 style="margin-bottom:15px">Sunday Morning</h2>

    </div>

    <table>
        <thead>
            <tr>
                <td colspan="7" style="height: 5px;">
                    <hr style="margin-bottom: 2px;margin-left: -5px;" ,size="3" color="grey">
                </td>
            </tr>
            <tr>
                <th style="width: 20px;">Noa</th>
                <th style="width: 100px;">Foto</th>
                <th style="width: 100px;">Nama</th>
                <th style="width: 200px;">Alamat</th>
                <th style="width: 200px;">No KTP</th>
                <th style="width: 200px;">Telpon</th>
            </tr>
            <tr>
                <td colspan="7">
                    <hr style="margin-bottom: 2px;margin-top:1px; margin-left: -5px;" ,size="3" color="grey">
                </td>
            </tr>
        </thead>
        <tbody>
            <?php
            $dataPemain = mysqli_query($koneksi, "SELECT * FROM tbl_pemain");
            while ($data = mysqli_fetch_array($dataPemain)) { ?>
                <tr>
                    <td align="center">
                        <?= $data['noa'] ?>
                    </td>
                    <td align="center">
                        <img src="../asset/image/<?= $data['foto'] ?>" class="thumbnail" alt="foto pemain" width="60px">
                    </td>
                    <td align="center">
                        <?= $data['nama'] ?>
                    </td>
                    <td align="center">
                        <?= $data['alamat'] ?>
                    </td>
                    <td align="center">
                        <?= $data['noktp'] ?>
                    </td>
                    <td align="center">
                        <?= $data['telpon'] ?>
                    </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="7">
                    <hr style="margin-top: 1px; margin-bottom: 2px; margin-left: -5px;" , size="3" , color="grey">
                    <p>Banjarmasin,
                        <?= date('j F Y') ?>
                    </p>
                </td>
            </tr>
        </tfoot>
    </table>

    <script type="text/javascript">
        window.print();
    </script>

</body>

</html>