<?php
  session_start();
  require_once('config/koneksi.php');
  if(isset($_SESSION['login'])) {
    header("Location: index.php");
    exit;
  }
  //periksa login
  if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM user WHERE username = '$username'") or die(mysqli_error($conn));
    if($result->num_rows === 1) {
      $row = $result->fetch_assoc();
      //memeriksa apakah password user sudah benar atau belum
      if(password_verify($password, $row['password'])) {
        //pasang session
        $_SESSION['login'] = $row;

        header("Location: index.php");
        exit;
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    <?php require_once('layout/_css.php'); ?>
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="row w-100 m-0">
          <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
            <div class="card col-lg-4 mx-auto">
              <div class="card-body px-5 py-5">
                <h3 class="card-title text-center mb-3">Login</h3>
                <form method="POST">
                  <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control p_input" name="username">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control p_input" name="password">
                  </div>
                  <div class="text-center">
                    <button type="submit" name="login" class="btn btn-primary btn-block enter-btn">Login</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
        </div>
        <!-- row ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <?php require_once('layout/_js.php'); ?>
    <!-- endinject -->
  </body>
</html>