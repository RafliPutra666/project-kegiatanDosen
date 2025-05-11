<?php 
$url = "/project-uts/admin"; 
$current_page = basename($_SERVER['REQUEST_URI']);
?>

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">

            <div class="sb-sidenav-menu-heading">Menu</div>

            <a class="nav-link <?= $current_page == 'index.php' ? 'active' : '' ?>" href="<?= $url ?>/index.php">
                <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                Dashboard
            </a>

            <div class="sb-sidenav-menu-heading">Manajemen Data</div>

            <a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/dosen') !== false ? 'active' : '' ?>" href="<?= $url ?>/dosen">
                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                Dosen
            </a>

            <a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/prodi') !== false ? 'active' : '' ?>" href="<?= $url ?>/prodi">
                <div class="sb-nav-link-icon"><i class="fas fa-building"></i></div>
                Prodi
            </a>

            <a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/kegiatan') !== false ? 'active' : '' ?>" href="<?= $url ?>/kegiatan">
                <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                Kegiatan
            </a>

            <a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/jenis_kegiatan') !== false ? 'active' : '' ?>" href="<?= $url ?>/jenis_kegiatan">
                <div class="sb-nav-link-icon"><i class="fas fa-layer-group"></i></div>
                Jenis Kegiatan
            </a>

            <a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/dosen_kegiatan') !== false ? 'active' : '' ?>" href="<?= $url ?>/dosen_kegiatan">
                <div class="sb-nav-link-icon"><i class="fas fa-user-friends"></i></div>
                Dosen Kegiatan
            </a>

            <a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/penelitian') !== false ? 'active' : '' ?>" href="<?= $url ?>/penelitian">
                <div class="sb-nav-link-icon"><i class="fas fa-flask"></i></div>
                Penelitian
            </a>

            <a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/tim_penelitian') !== false ? 'active' : '' ?>" href="<?= $url ?>/tim_penelitian">
                <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                Tim Penelitian
            </a>

            <a class="nav-link <?= strpos($_SERVER['REQUEST_URI'], '/bidang_ilmu') !== false ? 'active' : '' ?>" href="<?= $url ?>/bidang_ilmu">
                <div class="sb-nav-link-icon"><i class="fas fa-lightbulb"></i></div>
                Bidang Ilmu
            </a>

        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        Dosen
    </div>
</nav>
