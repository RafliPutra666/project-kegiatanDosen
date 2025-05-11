<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$stmt = $dbh->prepare("SELECT * FROM prodi WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telpon = $_POST['telpon'];
    $ketua = $_POST['ketua'];

    $stmt = $dbh->prepare("UPDATE prodi SET kode=?, nama=?, alamat=?, telpon=?, ketua=? WHERE id=?");
    $stmt->execute([$kode, $nama, $alamat, $telpon, $ketua, $id]);

    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Prodi</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Prodi</h2>
        <form method="POST">
            <div class="mb-3">
                <label>Kode</label>
                <input type="text" name="kode" class="form-control" value="<?= $data['kode'] ?>" required />
            </div>
            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required />
            </div>
            <div class="mb-3">
                <label>Alamat</label>
                <input type="text" name="alamat" class="form-control" value="<?= $data['alamat'] ?>" required />
            </div>
            <div class="mb-3">
                <label>Telpon</label>
                <input type="text" name="telpon" class="form-control" value="<?= $data['telpon'] ?>" required />
            </div>
            <div class="mb-3">
                <label>Ketua</label>
                <input type="text" name="ketua" class="form-control" value="<?= $data['ketua'] ?>" required />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</body>
</html>
