<?php
//menampilkan DB buku
$ambilBuku = $conn->query("SELECT * FROM buku ORDER BY id_buku DESC") or die(mysqli_error($conn));
?>

<div class="page-header">
<h1 class="mt-4"> Data Buku </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Buku</li>
        </ol>
    </nav>
</div>
<div class="col-md-12">
    <a href="?p=buku&aksi=tambah" class="btn btn-primary mb-3">
        <i class="mdi mdi-plus"></i> 
        Tambah Buku
    </a>
    <a href="./laporan_buku/laporan_bk_excel.php" target="_blank" class="btn btn-success mb-3">
        <i class="mdi mdi-file-excel"></i> 
        Export ke Excel
    </a>
    <a href="./laporan_buku/laporan_bk_pdf.php" target="_blank" class="btn btn-danger mb-3">
        <i class="mdi mdi-file-pdf"></i> 
        Export ke PDF
    </a>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card mb-4">
            <div class="card-header">
                <i class="mdi mdi-table mr-1"></i>
                Data Buku
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Penulis</th>
                                <th>Penerbit</th>
                                <th>ISBN</th>
                                <th>Jumlah Buku</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            while ($pecahBuku = $ambilBuku->fetch_assoc()) {
                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $pecahBuku['judul_buku']; ?></td>
                                <td><?= $pecahBuku['penulis_buku']; ?></td>
                                <td><?= $pecahBuku['penerbit_buku']; ?></td>
                                <td><?= $pecahBuku['isbn']; ?></td>
                                <td><?= $pecahBuku['jumlah_buku']; ?></td>
                                <td>
                                    <a href="?p=buku&aksi=ubah&id=<?= $pecahBuku['id_buku']; ?>" 
                                       class="btn btn-info btn-small">
                                       <i class="mdi mdi-pencil"></i>
                                    </a>
                                    <a href="?p=buku&aksi=hapus&id=<?= $pecahBuku['id_buku']; ?>" 
                                       class="btn btn-danger btn-small">
                                    <i class="mdi mdi-delete-forever" onclick="return confirm('Yakiiin?')"></i>
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