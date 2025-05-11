<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$stmt = $dbh->prepare("DELETE FROM jenis_kegiatan WHERE id = ?");
$stmt->execute([$id]);
header("Location: index.php");
?>
