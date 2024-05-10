<?php
require_once '../config/koneksi.php';

$filename = "transaksi_excel-(". date('d-m-Y') .").xls";

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$filename");

//menampilkan DB anggota
$ambilBuku = $conn->query("SELECT * FROM transaksi INNER JOIN buku ON transaksi.id_buku = buku.id_buku
                                                   INNER JOIN anggota ON transaksi.id_anggota = anggota.id_anggota
                                                   ORDER BY id_transaksi DESC") or die(mysqli_error($conn));
?>

<h2>Laporan Transaksi</h2>
<table class="table table-bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Judul</th>
            <th>Tanggal Pinjam</th>
            <th>Tanggal Kembali</th>
            <th>Status</th>
        </tr>
        <tbody>
            <?php
            $no = 1;
            while ($masukBuku = $ambilBuku->fetch_assoc()) {
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $masukBuku['nis']; ?></td>
                <td><?= $masukBuku['judul_buku']; ?></td>
                <td><?= $masukBuku['tgl_pinjam']; ?></td>
                <td><?= $masukBuku['tgl_kembali']; ?></td>                                                      
                <td><?= $masukBuku['status']; ?></td>                            
            </tr>    
            <?php $no++; } ?>                       
        </tbody>
    </thead>
</table>