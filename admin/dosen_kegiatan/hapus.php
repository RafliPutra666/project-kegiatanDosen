<?php
include '../config/koneksi.php';
$dosen_id = $_GET['dosen_id'];
$kegiatan_id = $_GET['kegiatan_id'];

$stmt = $dbh->prepare("DELETE FROM dosen_kegiatan WHERE dosen_id = ? AND kegiatan_id = ?");
$stmt->execute([$dosen_id, $kegiatan_id]);

header("Location: index.php");
?>
