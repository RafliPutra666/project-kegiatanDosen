<!DOCTYPE html>
<html lang="en">
<head>
    <!-- head content same as your template -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Data Penelitian - SB Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>
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
                    <h1 class="mt-4">Data Dosen</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dosen</li>
                    </ol>

                    <div class="card mb-4">
                        <div class="card-header"><i class="fas fa-table me-1"></i>Data Dosen</div>
                        <div class="container-fluid px-4">
                            <h1 class="mt-4">Tambah Dosen</h1>
                            <?php
                            include '../config/koneksi.php';

                            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                                $judul = $_POST['judul'];
                                $mulai = $_POST['mulai'];
                                $akhir = $_POST['akhir'];
                                $tahun = $_POST['tahun_ajaran'];
                                $bidang = $_POST['bidang_ilmu_id'];

                                $sql = "INSERT INTO penelitian (judul, mulai, akhir, tahun_ajaran, bidang_ilmu_id) 
                                  VALUES (?, ?, ?, ?, ?)";
                                $stmt = $dbh->prepare($sql);
                                $stmt->execute([$judul, $mulai, $akhir, $tahun, $bidang]);
                                header("Location: index.php");
                            }
                            ?>

                            <form method="post">
                                <div class="mb-3">
                                    <label>Judul</label>
                                    <textarea name="judul" class="form-control" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label>Mulai</label>
                                    <input type="date" name="mulai" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Akhir</label>
                                    <input type="date" name="akhir" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Tahun Ajaran</label>
                                    <input type="text" name="tahun_ajaran" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label>Bidang Ilmu</label>
                                    <select name="bidang_ilmu_id" class="form-control">
                                        <?php
                                        $bidang = $dbh->query("SELECT * FROM bidang_ilmu");
                                        foreach ($bidang as $b) {
                                            echo "<option value='{$b['id']}'>{$b['nama']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <button class="btn btn-success" type="submit">Simpan</button>
                                <a href="index.php" class="btn btn-secondary">Batal</a>
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
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Scripts -->
    <script src="../js/scripts.js"></script>
    <script src="../js/datatables-simple-demo.js"></script>
</body>

</html>