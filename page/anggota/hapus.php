<?php
//menangkap id anggota di url
$id_anggota = $_GET['id'];

$conn->query("DELETE FROM anggota WHERE id_anggota = $id_anggota") or die(mysqli_error($conn));
echo "<script>alert('Data Berhasil Dihapus.');window.location='?p=anggota';</script>";
?>