<?php include '../db.php';
$koneksi->query("DELETE FROM matakuliah WHERE kodemk='$_GET[kodemk]'");
header("Location: index.php");
?>