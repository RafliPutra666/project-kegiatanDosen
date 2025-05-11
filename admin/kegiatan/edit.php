<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$stmt = $dbh->prepare("SELECT * FROM kegiatan WHERE id = ?");
$stmt->execute([$id]);
$data = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $stmt = $dbh->prepare("UPDATE kegiatan SET tanggal_mulai=?, tanggal_selesai=?, tempat=?, deskripsi=?, jenis_kegiatan_id=? WHERE id=?");
    $stmt->execute([
        $_POST['tanggal_mulai'],
        $_POST['tanggal_selesai'],
        $_POST['tempat'],
        $_POST['deskripsi'],
        $_POST['jenis_kegiatan_id'],
        $id
    ]);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Edit Kegiatan</title>
    <link href="../css/styles.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-4">
    <h2>Edit Kegiatan</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Tanggal Mulai</label>
            <input type="date" name="tanggal_mulai" class="form-control" value="<?= $data['tanggal_mulai'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Selesai</label>
            <input type="date" name="tanggal_selesai" class="form-control" value="<?= $data['tanggal_selesai'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Tempat</label>
            <input type="text" name="tempat" class="form-control" value="<?= $data['tempat'] ?>" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="4" required><?= $data['deskripsi'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>Jenis Kegiatan</label>
            <select name="jenis_kegiatan_id" class="form-control" required>
                <?php
                $jenis = $dbh->query("SELECT * FROM jenis_kegiatan");
                while ($j = $jenis->fetch()) {
                    $selected = $j['id'] == $data['jenis_kegiatan_id'] ? "selected" : "";
                    echo "<option value='{$j['id']}' $selected>{$j['nama']}</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
