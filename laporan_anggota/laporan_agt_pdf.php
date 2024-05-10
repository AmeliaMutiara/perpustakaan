<?php
ob_start();
require_once '../config/koneksi.php';
require __DIR__.'/../corona/template/assets/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new HTML2PDF();

$semuaAnggota = [];
$sqlAnggota = $conn->query("SELECT * FROM anggota") or die(mysqli_error($conn));
while ($pecahAnggota = $sqlAnggota->fetch_assoc()) {
    $semuaAnggota[] = $pecahAnggota;
}

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Export to PDF Aanggota</title>
</head>
<body>
    <h2>Laporan Anggota</h2>
        <table table-border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tempat Lahir</th>
                <th>Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
            </tr>';
            $no = 1;
            foreach($semuaAnggota as $key => $value) {
                $html .= '
            <tr>
                <td>'. $no++ .'</td>
                <td>'. $value["nama_anggota"] .'</td>
                <td>'. $value["tempat_lahir"] .'</td>
                <td>'. $value["tgl_lahir"] .'</td>
                <td>'. $value["jk"] .'</td>
                <td>'. $value["jurusan"] .'</td>
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