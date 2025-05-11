<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Data Dosen - SB Admin</title>

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="admin/index.php">Start Bootstrap</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
            <div class="input-group">
                <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#!">Settings</a></li>
                    <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                    <li>
                        <hr class="dropdown-divider" />
                    </li>
                    <li><a class="dropdown-item" href="#!">Logout</a></li>
                </ul>
            </li>
        </ul>
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
                                $dosen_id = $_POST['dosen_id'];
                                $penelitian_id = $_POST['penelitian_id'];
                                $peran = $_POST['peran'];
                            
                            
                                $cek = $dbh->prepare("SELECT COUNT(*) FROM tim_penelitian WHERE dosen_id = ? AND penelitian_id = ?");
                                $cek->execute([$dosen_id, $penelitian_id]);
                                $sudahAda = $cek->fetchColumn();
                            
                                if ($sudahAda) {
                                    echo "<div class='alert alert-warning'>Dosen yang anda isi sudah ada! silahkan pilih dosen lain</div>";
                                } else {
                                    $stmt = $dbh->prepare("INSERT INTO tim_penelitian (dosen_id, penelitian_id, peran) VALUES (?, ?, ?)");
                                    $stmt->execute([$dosen_id, $penelitian_id, $peran]);
                                    header("Location: index.php");
                                    exit;
                                }
                            }
                            
                            ?>

                            <form method="post">
                                <div class="mb-3">
                                    <label>Dosen</label>
                                    <select name="dosen_id" class="form-control">
                                        <?php
                                        foreach ($dbh->query("SELECT * FROM dosen") as $d) {
                                            echo "<option value='{$d['id']}'>{$d['nama']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Penelitian</label>
                                    <select name="penelitian_id" class="form-control">
                                        <?php
                                        foreach ($dbh->query("SELECT * FROM penelitian") as $p) {
                                            echo "<option value='{$p['id']}'>{$p['judul']}</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label>Peran</label>
                                    <input type="text" name="peran" class="form-control" required>
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