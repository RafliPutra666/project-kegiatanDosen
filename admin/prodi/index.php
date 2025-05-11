<?php include '../config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Prodi</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../css/styles.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js"></script>
</head>
<body class="sb-nav-fixed">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand ps-3" href="../index.php">Kegiatan Dosen</a>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <?php include_once('../layout/sidebar.php') ?>
    </div>
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Data Prodi</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item"><a href="../index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Prodi</li>
                </ol>
                <div class="card mb-4">
                    <div class="card-header"><i class="fas fa-table me-1"></i>Data Prodi</div>
                    <a href="tambah.php" class="btn btn-primary btn-sm my-2">Tambah +</a>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Prodi</th>
                                    <th>Alamat</th>
                                    <th>Telpon</th>
                                    <th>Ketua</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stmt = $dbh->query("SELECT * FROM prodi");
                                while ($row = $stmt->fetch()) {
                                    echo "<tr>
                                            <td>{$row['kode']}</td>
                                            <td>{$row['nama']}</td>
                                            <td>{$row['alamat']}</td>
                                            <td>{$row['telpon']}</td>
                                            <td>{$row['ketua']}</td>
                                            <td>
                                                <a href='edit.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                                                <a href='hapus.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a>
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
</body>
</html>
