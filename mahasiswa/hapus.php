<?php include '../db.php';
$koneksi->query("DELETE FROM mahasiswa WHERE npm='$_GET[npm]'");
header("Location: index.php");
?>