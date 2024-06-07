<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion bg-light" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Home</div>
                    <a class="nav-link" href="<?= $main_url ?>index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <hr class="mb-0">
                    <div class="sb-sidenav-menu-heading">Admin</div>
                    <a class="nav-link" href="<?= $main_url ?>user/add-user.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                        User
                    </a>
                    <a class="nav-link" href="<?= $main_url ?>user/password.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-key"></i></div>
                        Ganti Password
                    </a>
                    <hr class="mb-0">
                    <div class="sb-sidenav-menu-heading">Data</div>
                    <a class="nav-link" href="<?= $main_url ?>pemain/pemain.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-users"></i></div>
                        Pemain
                    </a>
                    <a class="nav-link" href="<?= $main_url ?>pelatih/pelatih.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                        Pelatih
                    </a>
                    <a class="nav-link" href="<?= $main_url ?>siswa/siswa.php">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user-graduate"></i></div>
                        Siswa Akademi
                        <a class="nav-link" href="<?= $main_url ?>prestasi/prestasi.php">
                            <div class="sb-nav-link-icon"><i class="fa-solid fa-trophy"></i></div>
                            Achievement
                        </a>
                        <hr class="mb-0">
                </div>
                <div class="sb-sidenav-footer border">
                    <div class="small">Logged in as:</div>
                    <?= $_SESSION["ssUser"] ?>
                </div>
            </div>
        </nav>
    </div>