<?php
include '../config/koneksi.php';
$id = $_GET['id'];

$cek = $dbh->prepare("SELECT COUNT(*) FROM dosen WHERE prodi_id = ?");
$cek->execute([$id]);
$jumlah = $cek->fetchColumn();

if ($jumlah > 0) {
    echo "<script>alert('Tidak dapat menghapus. Prodi masih digunakan di tabel Dosen.'); window.location='index.php';</script>";
} else {
    $stmt = $dbh->prepare("DELETE FROM prodi WHERE id = ?");
    $stmt->execute([$id]);
    header("Location: index.php");
}
?>
