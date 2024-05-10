<?php
if(isset($_POST['tambah'])) {
    $judul = htmlspecialchars($_POST['judul_buku']);
    $penulis = htmlspecialchars($_POST['penulis_buku']);
    $penerbit = htmlspecialchars($_POST['penerbit_buku']);
    $tahun_terbit = htmlspecialchars($_POST['tahun_terbit']);
    $isbn = htmlspecialchars($_POST['isbn']);
    $jumlah = htmlspecialchars($_POST['jumlah_buku']);
    $lokasi = htmlspecialchars($_POST['lokasi']);
    $tgl_input = htmlspecialchars($_POST['tgl_input']);

    $sql = $conn->query("INSERT INTO buku VALUES 
                       (NULL, '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$isbn', '$jumlah', '$lokasi', '$tgl_input');") 
                       or die(mysqli_error($conn));
    if($sql) {
        echo "<script>alert('Data " . $judul . " Berhasil Ditambahkan.');window.location='?p=buku';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan.');</script>";
    }
}
?>

<div class="page-header">
<h1 class="mt-4"> Tambah Data Buku </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data Buku</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" method="POST">
                    <div class="form-group">
                        <label>Judul Buku</label>
                        <input type="text" class="form-control" placeholder="Masukkan judul buku" name="judul_buku">
                    </div>
                    <div class="form-group">
                        <label>Penulis</label>
                        <input type="text" class="form-control" placeholder="Masukkan penulis buku" name="penulis_buku">
                    </div>
                    <div class="form-group">
                        <label>Penerbit</label>
                        <input type="text" class="form-control" placeholder="Masukkan penerbit buku" name="penerbit_buku">
                    </div>
                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <select name="tahun_terbit" class="form-control">
                            <option value="">--Pilih Tahun--</option>
                            <?php
                            //menampilkan tahun terbit dari tahun 1994 hingga tahhun sekarang
                            $tahun = date('Y');

                            for ($i = $tahun - 29; $i <= $tahun; $i++) { ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>ISBN</label>
                        <input type="text" class="form-control" placeholder="Masukkan ISBN buku" name="isbn">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Buku</label>
                        <input type="number" class="form-control" placeholder="Masukkan jumlah buku" name="jumlah_buku">
                    </div>
                    <div class="form-group">
                        <label class="small mb-1">Lokasi</label>
                        <select name="lokasi" class="form-control">
                            <option value="">--Pilih Rak--</option>
                            <option value="Rak 1">Rak 1</option>
                            <option value="Rak 2">Rak 2</option>
                            <option value="Rak 3">Rak 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Input</label>
                      <input type="date" class="form-control" name="tgl_input">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mr-2" name="tambah">Tambah Data</button>
                    </div>  
                </form>
            </div>
        </div>
    </div>   
</div>