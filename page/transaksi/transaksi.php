<?php
require_once ('function.php');
require_once('config/koneksi.php');

$sql = $conn->query("SELECT * FROM transaksi INNER JOIN buku ON transaksi.id_buku = buku.id_buku
                                             INNER JOIN anggota ON transaksi.id_anggota = anggota.id_anggota
                                             WHERE status = 'pinjam'
                                             ") or die(mysqli_error($conn)); 
?>
<!-- <pre>
     <?php var_dump($pecah); ?>
</pre> -->

<div class="page-header">
<h1 class="mt-4"> Data Transaksi </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Transaksi</li>
        </ol>
    </nav>
</div>
<div class="col-md-12">
    <a href="?p=transaksi&aksi=tambah" class="btn btn-primary mb-3"><i class="mdi mdi-plus"></i> Tambah Transaksi</a>
    <a href="./laporan_transaksi/laporan_tr_excel.php" target="_blank" class="btn btn-success mb-3">
        <i class="mdi mdi-file-excel"></i> 
        Export ke Excel
    </a>
    <a href="./laporan_transaksi/laporan_tr_pdf.php" target="_blank" class="btn btn-danger mb-3">
        <i class="mdi mdi-file-pdf"></i> 
        Export ke PDF
    </a>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card mb-4">
            <div class="card-header">
                <i class="mdi mdi-table mr-1"></i>
                Data Transaksi
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Judul</th>
                                <th>Tanggal Pinjam</th>
                                <th>Tanggal Kembali</th>
                                <th>Terlambat</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($pecah = $sql->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $pecah['nis']; ?></td>
                                <td><?= $pecah['judul_buku']; ?></td>
                                <td><?= $pecah['tgl_pinjam']; ?></td>
                                <td><?= $pecah['tgl_kembali']; ?></td>
                                <td>
                                    <?php
                                    $denda = 1000;
                                    $tgl_dateline = $pecah['tgl_kembali'];
                                    $tgl_kembali = date('d-m-Y');

                                    $lambat = terlambat($tgl_dateline, $tgl_kembali);
                                    $denda1 = $lambat * $denda;

                                    if($lambat > 0) { ?>
                                        <div style='color: red;'>
                                            <?= $lambat ?> Hari<br> (Rp. <?= number_format($denda1); ?>)
                                        </div>
                                    <?php
                                    } else {
                                        echo $lambat . "Hari";
                                    }
                                    ?>
                                </td>
                                <td><?= $pecah['status']; ?></td>
                                <td>
                                    <a href="?p=transaksi&aksi=kembali&id=<?= $pecah['id_transaksi']; ?>
                                            &judul=<?= $pecah['judul_buku']; ?>" class="btn btn-info btn-small">
                                            Kembali
                                    </a>
                                    <a href="?p=transaksi&aksi=perpanjang&id=<?= $pecah['id_transaksi']; ?>
                                            &judul=<?= $pecah['judul_buku']; ?>&lambat=<?= $lambat ?>
                                            &tgl_kembali=<?= $pecah['tgl_kembali']; ?>" 
                                        class="btn btn-success btn-small">
                                        Perpanjang
                                    </a>
                                </td>
                            </tr>    
                            <?php $no++; } ?>                       
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
