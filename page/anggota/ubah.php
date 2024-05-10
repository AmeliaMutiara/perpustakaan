<?php
$id_anggota = $_GET['id'];

$tampilAnggota = $conn->query("SELECT * FROM anggota WHERE id_anggota = $id_anggota") or die(mysqli_error($conn));
$pecahAnggota = $tampilAnggota->fetch_assoc();

if(isset($_POST['ubah'])) {
    $nis = htmlspecialchars($_POST['nis']);
    $nama = htmlspecialchars($_POST['nama_anggota']);
    $tempat_lahir = htmlspecialchars($_POST['tempat_lahir']);
    $tgl_lahir = htmlspecialchars($_POST['tgl_lahir']);
    $jk = htmlspecialchars($_POST['jk']);
    $jurusan = htmlspecialchars($_POST['jurusan']);

    $sql = $conn->query("UPDATE anggota SET 
                        nis = '$nis',
                        nama_anggota = '$nama',
                        tempat_lahir = '$tempat_lahir',
                        tgl_lahir = '$tgl_lahir',
                        jk = '$jk',
                        jurusan = '$jurusan'
                        WHERE id_anggota = $id_anggota") or die(mysqli_error($conn));
    if($sql) {
        echo "<script>alert('Data Berhasil Diubah.');window.location='?p=anggota';</script>";
    } else {
        echo "<script>alert('Data gagal Diubah.');window.location='?p=anggota';</script>";
    }
}
?>

<div class="page-header">
<h1 class="mt-4"> Ubah Data Anggota </h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ubah Data Anggota</li>
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
                        <input type="number" 
                               class="form-control" 
                               placeholder="Masukkan NIS" 
                               name="nis"
                               value="<?= $pecahAnggota['nis']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" 
                               class="form-control" 
                               placeholder="Masukkan Nama" 
                               name="nama_anggota" 
                               value="<?= $pecahAnggota['nama_anggota']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tempat Lahir</label>
                        <input type="text" 
                               class="form-control" 
                               placeholder="Masukkan Tempat Lahir" 
                               name="tempat_lahir" 
                               value="<?= $pecahAnggota['tempat_lahir']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir</label>
                        <input type="date" 
                               class="form-control" 
                               placeholder="Masukkan Tanggal Lahir" 
                               name="tgl_lahir" 
                               value="<?= $pecahAnggota['tgl_lahir']; ?>">
                    </div>
                    <div class="form-group">
                        <label class="small mb-1">Jenis Kelamin</label>
                        <div class="form-check form-check-success">                            
                            <input type="radio" 
                                   class="form-check-input" 
                                   name="jk" 
                                   value="L" <?php if($pecahAnggota['jk'] == 'L'){echo "checked";} ?> > 
                            <label class="form-check-label"> Laki-laki </label>
                        </div>
                        <div class="form-check form-check-success">                            
                            <input type="radio" 
                                   class="form-check-input" 
                                   name="jk" 
                                   value="P" <?php if($pecahAnggota['jk'] == 'P'){echo "checked";} ?>> 
                            <label class="form-check-label"> Perempuan </label>
                        </div>
                    </div>
                    <div class="form-group">
                      <label>Jurusan</label>
                      <select name="jurusan" class="form-control">
                        <option value="">-- Pilih Jurusan --</option>
                        <option value="Rekayasa Perangkat Lunak" 
                                <?php if($pecahAnggota['jurusan'] == 'Rekayasa Perangkat Lunak'){echo "selected";} ?> >
                                Rekayasa Perangkat Lunak
                        </option>
                        <option value="Teknik Pemesinan" 
                                <?php if($pecahAnggota['jurusan'] == 'Teknik Pemesinan'){echo "selected";} ?> >
                                Teknik Pemesinan
                        </option>
                        <option value="Teknik Ototronik" 
                                <?php if($pecahAnggota['jurusan'] == 'Teknik Ototronik'){echo "selected";} ?> >
                                Teknik Ototronik
                        </option>
                        <option value="Teknik Pembuatan Kain" 
                                <?php if($pecahAnggota['jurusan'] == 'Teknik Pembuatan Kain'){echo "selected";} ?> >
                                Teknik Pembuatan Kain
                        </option>
                      </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mr-2" name="ubah">Ubah Data</button>
                    </div>
                      
                </form>
            </div>
        </div>
    </div>   
</div>