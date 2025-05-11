<?php
include '../config/koneksi.php';
$id = $_GET['id'];
$stmt = $dbh->prepare("DELETE FROM bidang_ilmu WHERE id = ?");
$stmt->execute([$id]);
header("Location: index.php");
?>
