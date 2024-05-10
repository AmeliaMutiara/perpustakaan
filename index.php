<?php
session_start();
require_once('config/koneksi.php');

if(!isset($_SESSION['login'])) {
  header("Location: login.php");
  exit;
}

$page = @$_GET['p'];
$aksi = @$_GET['aksi']; 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>
      <?php
        if($page == 'buku') {
          if($aksi == 'tambah') {
            echo "Tambah Buku";
          } else if($aksi == 'ubah') {
            echo "Ubah Buku";
          } else {
            echo "Halaman Buku";
          }
        } else if($page == 'anggota') {
          if($aksi == 'tambah') {
            echo "Tambah Anggota";
          }else if($aksi == 'ubah') {
            echo "Ubah Anggota";
          }else {
            echo "Halaman Anggota";
          }
        } else if($page == 'transaksi') {
          if($aksi == 'tambah') {
            echo "Tambah Transaksi";
          } else {
            echo "Halaman Transaksi";
          }
        } else {
          echo "Dashboard";
        }
      ?>
    </title>
    <!-- plugins:css -->
    <?php require_once('layout/_css.php'); ?>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <?php require_once('layout/sidebar.php'); ?>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <?php require_once('layout/navbar.php'); ?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper"> 
            <?php          
              if($page == 'buku') {
                if($aksi == '') {
                  require_once ('page/buku/buku.php');
                } else if ($aksi == 'tambah') {
                  require_once ('page/buku/tambah.php');
                } else if ($aksi == 'ubah') {
                  require_once ('page/buku/ubah.php');
                } else if ($aksi == 'hapus') {
                  require_once ('page/buku/hapus.php');
                }
              } else if ($page == 'anggota') {
                if($aksi == '') {
                  require_once ('page/anggota/anggota.php');
                } else if ($aksi == 'tambah') {
                  require_once ('page/anggota/tambah.php');
                } else if ($aksi == 'ubah') {
                  require_once ('page/anggota/ubah.php');
                } else if ($aksi == 'hapus') {
                  require_once ('page/anggota/hapus.php');
                }
              } else if ($page == 'transaksi') {
                if($aksi == '') {
                  require_once ('page/transaksi/transaksi.php');
                } else if ($aksi == 'tambah') {
                  require_once ('page/transaksi/tambah.php');
                } else if ($aksi == 'kembali') {
                  require_once ('page/transaksi/kembali.php');
                } else if ($aksi == 'perpanjang') {
                  require_once ('page/transaksi/perpanjang.php');
                }
              } else { ?>
                  <h1 class="mt-4">Dashboard</h1>
                  <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">dashboard</li>
                  </ol>
              <?php
              }
            ?> 
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <?php require_once('layout/footer.php'); ?>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <?php require_once('layout/_js.php'); ?>
    <!-- End custom js for this page -->
  </body>
</html>