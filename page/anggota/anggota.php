<?php
//menampilkan DB anggota
$ambilAnggota = $conn->query("SELECT * FROM anggota ORDER BY id_anggota DESC") or die(mysqli_error($conn));
?>

<div class="page-header">
    <h1 class="mt-4"> Data Anggota </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Data Anggota</li>
        </ol>
    </nav>
</div>
<div class="col-md-12">
    <a href="?p=anggota&aksi=tambah" class="btn btn-primary mb-3">
        <i class="mdi mdi-plus"></i> 
        Tambah Anggota
    </a>
    <a href="./laporan_anggota/laporan_agt_excel.php" target="_blank" class="btn btn-success mb-3">
        <i class="mdi mdi-file-excel"></i> 
        Export ke Excel
    </a>
    <a href="./laporan_anggota/laporan_agt_pdf.php" target="_blank" class="btn btn-danger mb-3">
        <i class="mdi mdi-file-pdf"></i> 
        Export ke PDF
    </a>
</div>
<div class="row">
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card mb-4">
            <div class="card-header">
                <i class="mdi mdi-table mr-1"></i>
                Data Anggota
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable">
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
                        </thead>
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
                                <td>
                                    <a href="?p=anggota&aksi=ubah&id=<?= $pecahAnggota['id_anggota']; ?>" 
                                        class="btn btn-info btn-small">
                                        <i class="mdi mdi-pencil"></i>
                                    </a>
                                    <a href="?p=anggota&aksi=hapus&id=<?= $pecahAnggota['id_anggota']; ?>" 
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