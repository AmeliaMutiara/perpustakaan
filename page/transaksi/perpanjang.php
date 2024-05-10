<?php
$id_transaksi = $_GET['id'];
$id_judul = $_GET['judul'];
$id_tgl_kembali = $_GET['tgl_kembali'];
$lambat = $_GET['lambat'];

//jika buku yang dipinjam tidak dikembalikan lewat dari 7 hari(terlambat) tidak bisa meminjam buku lagi, 
//sebelum buku yang dipinjam dikembalikan + membayar denda terlebih dahulu
if($lambat > 3) {
    echo "<script>alert('Pinjam buku tidak dapat diperpanjang, karena lebih dari 7 hari. Kembalikan buku yang telah dipinjam 
                        dan membayar denda, lalu bisa dilakukan peminjaman lagi');window.location='?p=transaksi';</script>";
} else {
    $pecah_tgl_kembali = explode('-', $id_tgl_kembali);
    $next7hari = mktime(0,0,0, $pecah_tgl_kembali[1], $pecah_tgl_kembali[0] + 7, $pecah_tgl_kembali[2]);
    $hari_next = date('d-m-Y', $next7hari);

    $sql = $conn->query("UPDATE transaksi SET tgl_kembali = '$hari_next' WHERE id_transaksi = $id_transaksi") 
                        or die(mysqli_error($conn));
    
    if($sql) {
        echo "<script>alert('Perpanjang jangka waktu peminjaman buku Berhasil.');window.location='?p=transaksi';</script>";
    } else {
        echo "<script>alert('Perpanjangan waktu peminjaman buku Gagal');window.location='?p=transaksi';</script>";
    }
}
?>