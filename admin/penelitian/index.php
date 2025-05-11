<?php
include '../config/koneksi.php';
?>
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
                <h1 class="mt-4">Data Penelitian</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Penelitian</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table me-1"></i>Data Penelitian</div>
                    <a href="tambah.php" class="btn btn-primary btn-sm my-2">Tambah +</a>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Judul</th>
                                    <th>Mulai</th>
                                    <th>Akhir</th>
                                    <th>Tahun Ajaran</th>
                                    <th>Bidang Ilmu</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = "SELECT p.*, b.nama AS bidang FROM penelitian p
                                        LEFT JOIN bidang_ilmu b ON p.bidang_ilmu_id = b.id";
                                $stmt = $dbh->prepare($sql);
                                $stmt->execute();
                                foreach ($stmt->fetchAll() as $row) {
                                    echo "<tr>
                                            <td>{$row['judul']}</td>
                                            <td>{$row['mulai']}</td>
                                            <td>{$row['akhir']}</td>
                                            <td>{$row['tahun_ajaran']}</td>
                                            <td>{$row['bidang']}</td>
                                            <td>
                                                <a href='edit.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                                <a href='hapus.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                                            </td>
                                          </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
       
    </div>
</div>
<script src="../js/scripts.js"></script>
<script src="../js/datatables-simple-demo.js"></script>
</body>
</html>
