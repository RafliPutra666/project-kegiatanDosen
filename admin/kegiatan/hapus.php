<?php
include '../config/koneksi.php';
$id = $_GET['id'];

$stmt = $dbh->prepare("DELETE FROM dosen_kegiatan WHERE kegiatan_id = ?");
$stmt->execute([$id]);

$stmt = $dbh->prepare("DELETE FROM kegiatan WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
?>
