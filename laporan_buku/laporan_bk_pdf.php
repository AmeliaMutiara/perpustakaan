<?php
ob_start();
require_once '../config/koneksi.php';
require __DIR__.'/../corona/template/assets/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new HTML2PDF();

$semuaAnggota = [];
$sqlBuku = $conn->query("SELECT * FROM buku") or die(mysqli_error($conn));
while ($pecahBuku = $sqlBuku->fetch_assoc()) {
    $semuaBuku[] = $pecahBuku;
}

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export to PDF Buku</title>
</head>
<body>
    <h2>Laporan Buku</h2>
        <table table-border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Judul Buku</th>
                <th>Penulis Buku</th>
                <th>Penerbit Buku</th>
                <th>Jumlah Buku</th>
                <th>Lokasi</th>
            </tr>';
            $no = 1;
            foreach($semuaBuku as $key => $nilai) {
                $html .= '
            <tr>
                <td>'. $no++ .'</td>
                <td>'. $nilai["judul_buku"] .'</td>
                <td>'. $nilai["penulis_buku"] .'</td>
                <td>'. $nilai["penerbit_buku"] .'</td>
                <td>'. $nilai["jumlah_buku"] .'</td>
                <td>'. $nilai["lokasi"] .'</td>
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