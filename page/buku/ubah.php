<?php
//menangkap id_buku di url
$id_buku = $_GET['id'];

//menampilkan data DB sesuai id_buku
$sql = $conn->query("SELECT * FROM buku WHERE id_buku = $id_buku") or die(mysqli_error($conn));
$pecahSql = $sql->fetch_assoc();

$tahun = $pecahSql['tahun_terbit'];

if(isset($_POST['ubah'])) {
    $judul = htmlspecialchars($_POST['judul_buku']);
    $penulis = htmlspecialchars($_POST['penulis_buku']);
    $penerbit = htmlspecialchars($_POST['penerbit_buku']);
    $tahun_terbit = htmlspecialchars($_POST['tahun_terbit']);
    $isbn = htmlspecialchars($_POST['isbn']);
    $jumlah = htmlspecialchars($_POST['jumlah_buku']);
    $lokasi = htmlspecialchars($_POST['lokasi']);
    $tgl_input = htmlspecialchars($_POST['tgl_input']);

    $sql = $conn->query("UPDATE buku SET 
                        judul_buku = '$judul',
                        penulis_buku = '$penulis',
                        penerbit_buku = '$penerbit',
                        tahun_terbit = '$tahun_terbit',
                        isbn = '$isbn',
                        jumlah_buku = '$jumlah',
                        lokasi = '$lokasi',
                        tgl_input = '$tgl_input'
                        WHERE id_buku = $id_buku") or die(mysqli_error($conn));
    if($sql) {
        echo "<script>alert('Data Berhasil Diubah.');window.location='?p=buku';</script>";
    } else {
        echo "<script>alert('Data gagal Diubah.');window.location='?p=buku';</script>";
    }
}
?>

<div class="page-header">
<h1 class="mt-4"> Ubah Data Buku </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Data Buku</li>
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
                        <input type="text" 
                               class="form-control" 
                               placeholder="Masukkan judul buku" 
                               name="judul_buku" 
                               value="<?= $pecahSql['judul_buku']; ?>" >
                    </div>
                    <div class="form-group">
                        <label>Penulis</label>
                        <input type="text" 
                               class="form-control" 
                               placeholder="Masukkan penulis buku" 
                               name="penulis_buku" 
                               value="<?= $pecahSql['penulis_buku']; ?>" >
                    </div>
                    <div class="form-group">
                        <label>Penerbit</label>
                        <input type="text" 
                               class="form-control" 
                               placeholder="Masukkan penerbit buku" 
                               name="penerbit_buku" 
                               value="<?= $pecahSql['penerbit_buku']; ?>" >
                    </div>
                    <div class="form-group">
                        <label>Tahun Terbit</label>
                        <select name="tahun_terbit" class="form-control">
                            <option value="">--Pilih Tahun--</option>
                            <?php
                            //menampilkan tahun terbit dari tahun 1994 hingga tahhun sekarang
                            $tahun = date('Y');

                            for ($i = $tahun - 29; $i <= $tahun; $i++) { ?>
                                <option value="<?= $i ?>" <?php if($pecahSql['tahun_terbit'] == $i ) {echo "selected";} ?> >
                                    <?= $i ?>
                                </option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>ISBN</label>
                        <input type="text" 
                               class="form-control" 
                               placeholder="Masukkan ISBN buku" 
                               name="isbn" 
                               value="<?= $pecahSql['isbn']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Buku</label>
                        <input type="number" 
                               class="form-control" 
                               placeholder="Masukkan jumlah buku" 
                               name="jumlah_buku" 
                               value="<?= $pecahSql['jumlah_buku']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="small mb-1">Lokasi</label>
                        <select name="lokasi" class="form-control">
                            <option value="">--Pilih Rak--</option>
                            <option value="Rak 1" <?php if($pecahSql['lokasi'] == 'Rak 1'){echo "selected";} ?> >Rak 1</option>
                            <option value="Rak 2" <?php if($pecahSql['lokasi'] == 'Rak 2'){echo "selected";} ?> >Rak 2</option>
                            <option value="Rak 3" <?php if($pecahSql['lokasi'] == 'Rak 3'){echo "selected";} ?> >Rak 3</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label>Tanggal Input</label>
                      <input type="date" class="form-control" name="tgl_input" value="<?= $pecahSql['tgl_input']; ?>">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mr-2" name="ubah">Ubah Data</button>
                    </div>
                      
                </form>
            </div>
        </div>
    </div>   
</div>