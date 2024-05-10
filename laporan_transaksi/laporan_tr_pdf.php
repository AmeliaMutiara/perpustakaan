<?php
ob_start();
require_once '../config/koneksi.php';
require __DIR__.'/../corona/template/assets/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new HTML2PDF();

$semuaAnggota = [];
$sqlTransaksi = $conn->query("SELECT * FROM transaksi INNER JOIN buku ON transaksi.id_buku = buku.id_buku
                                                 INNER JOIN anggota ON transaksi.id_anggota = anggota.id_anggota") 
                            or die(mysqli_error($conn));
while ($pecahTr = $sqlTransaksi->fetch_assoc()) {
    $semuaTr[] = $pecahTr;
}

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export to PDF Transaksi</title>
</head>
<body>
    <h2>Laporan Transaksi</h2>
        <table table-border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Judul</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>';
            $no = 1;
            foreach($semuaTr as $key => $value) {
                $html .= '
            <tr>
                <td>'. $no++ .'</td>
                <td>'. $value["nis"] .'</td>
                <td>'. $value["judul_buku"] .'</td>
                <td>'. $value["tgl_pinjam"] .'</td>
                <td>'. $value["tgl_kembali"] .'</td>
                <td>'. $value["status"] .'</td>
            </tr>
            
            ';
        }
$html .= '
</table>
</body>
</html>';

$html2pdf->writeHTML($html);
ob_end_clean();
$html2pdf->output();
?>