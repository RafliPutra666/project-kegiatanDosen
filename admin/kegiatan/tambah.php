<?php
include '../config/koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tgl_mulai = $_POST['tanggal_mulai'];
    $tgl_selesai = $_POST['tanggal_selesai'];
    $tempat = $_POST['tempat'];
    $deskripsi = $_POST['deskripsi'];
    $jenis = $_POST['jenis_kegiatan_id'];

    $stmt = $dbh->prepare("INSERT INTO kegiatan (tanggal_mulai, tanggal_selesai, tempat, deskripsi, jenis_kegiatan_id) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$tgl_mulai, $tgl_selesai, $tempat, $deskripsi, $jenis]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tambah Kegiatan</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-4">
    <h2>Tambah Kegiatan</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tempat</label>
            <input type="text" name="tempat" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label>Jenis Kegiatan</label>
            <select name="jenis_kegiatan_id" class="form-control" required>
                <option value="">-- Pilih Jenis --</option>
                <?php
                $jenis = $dbh->query("SELECT * FROM jenis_kegiatan");
                while ($j = $jenis->fetch()) {
                    echo "<option value='{$j['id']}'>{$j['nama']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
