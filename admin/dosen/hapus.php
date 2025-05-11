<?php
include '../config/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $dbh->prepare("DELETE FROM dosen WHERE id = ?");
    $stmt->execute([$id]);
}

header("Location: index.php");
exit;
?>
