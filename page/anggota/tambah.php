<?php
if(isset($_POST['tambah'])) {
    $nis = htmlspecialchars($_POST['nis']);
    $nama = htmlspecialchars($_POST['nama_anggota']);
    $tempat_lahir = htmlspecialchars($_POST['tempat_lahir']);
    $tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
    $jk = htmlspecialchars($_POST['jk']);
    $jurusan = htmlspecialchars($_POST['jurusan']);

    $sql = $conn->query("INSERT INTO anggota VALUES 
                        (null, '$nis', '$nama', '$tempat_lahir', '$tgl_lahir', '$jk', '$jurusan')") 
                        or die(mysqli_error($conn));
    if($sql) {
        echo "<script>alert('Data Berhasil Ditambahkan.');window.location='?p=anggota';</script>";
    } else {
        echo "<script>alert('Data gagal ditambahkan.');</script>";
    }
}
?>

<div class="page-header">
<h1 class="mt-4"> Tambah Data Anggota </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Tambah Data Anggota</li>
        </ol>
    </nav>
</div>
<div class="row">
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <form class="forms-sample" method="POST">
                    <div class="form-group">
                        <label>NIS</label>
                        <input type="number" class="form-control" placeholder="Masukkan NIS" name="nis">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama_anggota">
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" class="form-control" placeholder="Masukkan Tempat Lahir" name="tempat_lahir">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" class="form-control" placeholder="Masukkan Tanggal Lahir" name="tgl_lahir">
                    </div>
                    <div class="form-group">
                        <label class="small mb-1">Jenis Kelamin</label>
                        <div class="form-check form-check-success">                            
                            <input type="radio" class="form-check-input" name="jk" value="L"> 
                            <label class="form-check-label"> Laki-laki </label>
                        </div>
                        <div class="form-check form-check-success">                            
                            <input type="radio" class="form-check-input" name="jk" value="P"> 
                            <label class="form-check-label"> Perempuan </label>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Jurusan</label>
                      <select name="jurusan" class="form-control">
                        <option value="">-- Pilih Jurusan --</option>
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        <option value="Teknik Pemesinan">Teknik Pemesinan</option>
                        <option value="Teknik Ototronik">Teknik Ototronik</option>
                        <option value="Teknik Pembuatan Kain">Teknik Pembuatan Kain</option>
                      </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mr-2" name="tambah">Tambah Data</button>
                    </div>
                      
                </form>
            </div>
        </div>
    </div>   
</div>