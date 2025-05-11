<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tambah Prodi</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>

<body>
    <div class="container mt-4">
        <h2>Tambah Prodi</h2>
        <?php
        include '../config/koneksi.php';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $kode = $_POST['kode'];
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $telpon = $_POST['telpon'];
            $ketua = $_POST['ketua'];

            $stmt = $dbh->prepare("INSERT INTO prodi (kode, nama, alamat, telpon, ketua) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute([$kode, $nama, $alamat, $telpon, $ketua]);

            header("Location: index.php");
        }
        ?>
        <form method="POST">
            <div class="mb-3">
                <label>Kode</label>
                <input type="text" name="kode" class="form-control" required />
            </div>
            <div class="mb-3">
                <label>Nama Prodi</label>
                <input type="text" name="nama" class="form-control" required />
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" required />
            </div>
            <div class="mb-3">
                <label>Telpon</label>
                <input type="text" name="telpon" class="form-control" required />
            </div>
            <div class="mb-3">
                <label>Ketua</label>
                <input type="text" name="ketua" class="form-control" required />
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>

</html>