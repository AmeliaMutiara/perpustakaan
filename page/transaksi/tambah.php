<?php
$tampilNamaBuku = $conn->query("SELECT * FROM buku ORDER BY id_buku") or die(mysqli_error($conn));
$tampilNamaAnggota = $conn->query("SELECT * FROM anggota ORDER BY id_anggota") or die(mysqli_error($conn));

$tgl_pinjam = date('d-m-Y');
$tujuh_hari = mktime(0,0,0, date('n'), date('j') + 7, date('Y'));
$kembali = date('d-m-Y', $tujuh_hari);

if(isset($_POST['tambah'])) {
    $tgl_pinjam = htmlspecialchars($_POST['tgl_pinjam']);
    $tgl_kembali = htmlspecialchars($_POST['tgl_kembali']);

    $nama_buku = $_POST['buku'];
    $pecahB = explode(".", $nama_buku);
    $id = $pecahB[0];
    $judul = $pecahB[1];
    

    $nama_anggota = $_POST['nama'];
    $pecahN = explode(".", $nama_anggota);
    $nis = $pecahN[0];
    $nama = $pecahN[1];

    $sql = $conn->query("INSERT INTO transaksi VALUES(null, '$id', '$nis', '$nis', '$tgl_pinjam', '$tgl_kembali', 'pinjam')") 
                        or die(mysqli_error($conn));
    echo "<script>alert('Data Transaksi berhasil ditambahkan.');window.location='?p=transaksi';</script>";
}
?>

<div class="page-header">
<h1 class="mt-4"> Tambah Data Transaksi </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data Transaksi</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" method="POST" action="">
                    <div class="form-group">
                        <label for="nama_buku">Buku</label>
                        <select name="buku" class="form-control">
                            <option value="">--Pilih Buku--</option>
                            <?php
                            while($pecahBuku = $tampilNamaBuku->fetch_assoc()) {
                                echo "<option value='$pecahBuku[id_buku].$pecahbuku[judul_buku]'>$pecahBuku[judul_buku]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_anggota">Nama</label>
                        <select name="nama" class="form-control">
                            <option value="">--Pilih Anggota--</option>
                            <?php
                            while($pecahAnggota = $tampilNamaAnggota->fetch_assoc()) {
                                echo "<option value='$pecahAnggota[id_anggota].$pecahAnggota[nama_anggota]'>$pecahAnggota[nis].
                                $pecahAnggota[nama_anggota]</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Pinjam</label>
                        <input type="text" class="form-control" name="tgl_pinjam" value="<?= $tgl_pinjam ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Kembali</label>
                        <input type="text" class="form-control" name="tgl_kembali" value="<?= $kembali ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mr-2" name="tambah">Tambah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>   
</div>