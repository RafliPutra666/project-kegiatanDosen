<?php
include '../config/koneksi.php';
$dosen_id = $_GET['dosen_id'];
$penelitian_id = $_GET['penelitian_id'];

$stmt = $dbh->prepare("DELETE FROM tim_penelitian WHERE dosen_id=? AND penelitian_id=?");
$stmt->execute([$dosen_id, $penelitian_id]);

header("Location: index.php");
?>
