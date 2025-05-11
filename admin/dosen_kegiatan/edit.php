<?php
include '../config/koneksi.php';

// Ambil nilai kunci lama dari URL
$dosen_id_lama = $_GET['dosen_id'];
$kegiatan_id_lama = $_GET['kegiatan_id'];

// Ambil data lama untuk form
$query = $dbh->prepare("SELECT * FROM dosen_kegiatan WHERE dosen_id = ? AND kegiatan_id = ?");
$query->execute([$dosen_id_lama, $kegiatan_id_lama]);
$data_lama = $query->fetch();

if (!$data_lama) {
    echo "Data tidak ditemukan!";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dosen_id_baru = $_POST['dosen_id'];
    $kegiatan_id_baru = $_POST['kegiatan_id'];

    // Cek apakah kombinasi baru sudah ada
    $cek = $dbh->prepare("SELECT COUNT(*) FROM dosen_kegiatan WHERE dosen_id = ? AND kegiatan_id = ?");
    $cek->execute([$dosen_id_baru, $kegiatan_id_baru]);
    $sudahAda = $cek->fetchColumn();

    if ($sudahAda && ($dosen_id_baru != $dosen_id_lama || $kegiatan_id_baru != $kegiatan_id_lama)) {
        $error = "Kombinasi dosen dan kegiatan sudah ada!";
    } else {
        // Update data
        $update = $dbh->prepare("UPDATE dosen_kegiatan SET dosen_id = ?, kegiatan_id = ? WHERE dosen_id = ? AND kegiatan_id = ?");
        $update->execute([$dosen_id_baru, $kegiatan_id_baru, $dosen_id_lama, $kegiatan_id_lama]);
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Edit Dosen Kegiatan</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand ps-3" href="../index.php">Start Bootstrap</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle"><i class="fas fa-bars"></i></button>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include_once('../layout/sidebar.php') ?>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Edit Dosen Kegiatan</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Edit Dosen Kegiatan</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-body">
                            <?php if (isset($error)): ?>
                                <div class="alert alert-danger"><?= $error ?></div>
                            <?php endif; ?>

                            <form method="POST">
                                <div class="mb-3">
                                    <label>Dosen</label>
                                    <select name="dosen_id" class="form-control" required>
                                        <option value="">-- Pilih Dosen --</option>
                                        <?php
                                        $dosen = $dbh->query("SELECT * FROM dosen");
                                        while ($d = $dosen->fetch()) {
                                            $selected = ($d['id'] == $data_lama['dosen_id']) ? "selected" : "";
                                            echo "<option value='{$d['id']}' $selected>{$d['nama']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Kegiatan</label>
                                    <select name="kegiatan_id" class="form-control" required>
                                        <option value="">-- Pilih Kegiatan --</option>
                                        <?php
                                        $kegiatan = $dbh->query("SELECT * FROM kegiatan");
                                        while ($k = $kegiatan->fetch()) {
                                            $selected = ($k['id'] == $data_lama['kegiatan_id']) ? "selected" : "";
                                            echo "<option value='{$k['id']}' $selected>{$k['tempat']} ({$k['tanggal_mulai']})</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                <a href="index.php" class="btn btn-secondary">Kembali</a>
                            </form>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">&copy; Your Website 2023</div>
                        <div>
                            <a href="#">Privacy Policy</a> &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="../js/scripts.js"></script>
</body>
</html>
