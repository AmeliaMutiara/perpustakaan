<?php
require_once '../config/koneksi.php';

$filename = "anggota_excel-(". date('d-m-Y') .").xls";

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=$filename");

//menampilkan DB anggota
$ambilAnggota = $conn->query("SELECT * FROM anggota ORDER BY id_anggota DESC") or die(mysqli_error($conn));

?>

<h2>Laporan Anggota</h2>
<table class="table table-bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Tempat Lahir</th>
            <th>Tanggal Lahir</th>
            <th>Jenis Kelamin</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <tbody>
            <?php
            $no = 1;
            while ($pecahAnggota = $ambilAnggota->fetch_assoc()) {
            $jk = ($pecahAnggota['jk'] == 'L') ? 'Laki-laki' : 'Perempuan';
            ?>
            <tr>
                <td><?= $no; ?></td>
                <td><?= $pecahAnggota['nama_anggota']; ?></td>
                <td><?= $pecahAnggota['tempat_lahir']; ?></td>
                <td><?= $pecahAnggota['tgl_lahir']; ?></td>
                <td><?= $jk; ?></td>
                <td><?= $pecahAnggota['jurusan']; ?></td>                            
            </tr>    
            <?php $no++; } ?>                       
        </tbody>
    </thead>
</table>