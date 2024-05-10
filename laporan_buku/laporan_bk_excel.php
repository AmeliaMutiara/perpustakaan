<?php
require_once '../config/koneksi.php';

$filename = "buku_excel-(". date('d-m-Y') .").xls";

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$filename");

//menampilkan DB anggota
$ambilBuku = $conn->query("SELECT * FROM buku ORDER BY id_buku DESC") or die(mysqli_error($conn));

?>

<h2>Laporan Buku</h2>
<table class="table table-bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Judul Buku</th>
            <th>Penulis Buku</th>
            <th>Penerbit Buku</th>
            <th>Jumlah Buku</th>
            <th>Lokasi</th>
        </tr>
        <tbody>
            <?php
            $no = 1;
            while ($masukBuku = $ambilBuku->fetch_assoc()) { 
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $masukBuku['judul_buku']; ?></td>
                <td><?= $masukBuku['penulis_buku']; ?></td>
                <td><?= $masukBuku['penerbit_buku']; ?></td>
                <td><?= $masukBuku['jumlah_buku']; ?></td>                            
                <td><?= $masukBuku['lokasi']; ?></td>                            
            </tr>    
            <?php $no++; } ?>                       
        </tbody>
    </thead>
</table>