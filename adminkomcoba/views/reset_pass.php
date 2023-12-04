<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Passwors Reset | SB ADMIN</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="vendors/iconfonts/ionicons/css/ionicons.css">
  <link rel="stylesheet" href="vendors/iconfonts/typicons/src/font/typicons.css">
  <link rel="stylesheet" href="vendors/iconfonts/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="vendors/css/vendor.bundle.addons.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href=""><b>Admin</b>Kominfo</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body">
        <p class="login-box-msg">Reset Password</p>
        <?php
        if ($_GET['key'] && $_GET['reset']) {
          include('koneksi.php');
          $ml = $_GET['key'];
          $pass = $_GET['reset'];

          $select = mysqli_query($koneksi, "SELECT email,passwords FROM tb_admin WHERE email='$ml' AND md5(passwords)='$pass'");
          if (mysqli_num_rows($select) == 1) {
        ?>
            <form action="" method="POST">
              <div class="form-group">
                <label class="label">Password Baru</label>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" name="passwords" id="passwords" onkeyup='check();' placeholder="*********" required>
                  <input type="hidden" name="email" value="<?php echo $ml; ?>">
                  <input type="hidden" name="pass" value="<?php echo $pass; ?>">
                  <!-- <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline"></i>
                    </span>
                  </div> -->
                </div>
              </div>
              <div class="form-group">
                <label class="label">Konfirmasi Password</label>
                <div class="form-floating mb-3">
                  <input type="password" name="konfirmasi" class="form-control" id="confirm_password" onkeyup='check();' placeholder="*********" required>
                  <!-- <div class="input-group-append">
                    <span class="input-group-text">
                      <i class="mdi mdi-check-circle-outline"></i>
                    </span>
                  </div> -->
                </div>
              </div>
              <div class="form-group">

                <span id='message'></span>
              </div>
              <div class="form-group">
                <button class="btn btn-danger submit-btn btn-block" id="btnSubmit" name="submit_password">Reset</button>
              </div>
            </form>
        <?php
          } else {
            echo "Data Tidak Ditemukan";
          }
        }
        ?>

        <?php
        // if (isset($_POST['submit_password'])) {
        //   include('koneksi.php');
        //   $email = $_POST['email'];
        //   $pass = $_POST['passwords'];

        //   $select = mysqli_query($koneksi, "UPDATE tb_admin SET passwords='$pass' WHERE email='$ml'");
        //   if ($select) {
        //     echo "<script> alert('Reset password berhasil'); window.location = 'login.php'; </script>"; //jika pesan terkirim

        //   } else {
        //     echo "<script>alert('Gagal Menyimpan '); window.location = 'login.php';</script>";
        //   }
        // }
        if (isset($_POST['submit_password'])) {
          //membuat variabel untuk menyimpan data inputan yang di isikan di form
          $password_baru      = $_POST['passwords'];
          $konfirmasi_password  = $_POST['konfirmasi'];

          if (strlen($password_baru) >= 5) {
            if ($password_baru == $konfirmasi_password) {
              $email = $_POST['email'];
              $pass = $_POST['passwords'];
              $update = mysqli_query($koneksi, "UPDATE tb_admin SET passwords='$pass' WHERE email='$ml'");
              if ($update) {
                //kondisi jika proses query UPDATE berhasil
                echo "<script> alert('Reset password berhasil'); window.location = 'login.php'; </script>"; //jika pesan terkirim
              } else {
                //kondisi jika proses query gagal
                echo 'Gagal merubah password';
              }
            } else {
              //kondisi jika password baru beda dengan konfirmasi password
              echo 'Konfirmasi password tidak cocok';
            }
          } else {
            //kondisi jika password baru yang dimasukkan kurang dari 5 karakter
            echo 'Minimal password baru adalah 5 karakter';
          }
        }
        ?>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->
  <script src="vendor.bundle.base.js"></script>
  <script src="vendor.bundle.addons.js"></script>
  <script src="off-canvas.js"></script>
  <script src="misc.js"></script>
  <!-- jQuery -->
  <script src="admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="admin/dist/js/adminlte.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

  <script type="text/javascript">
    var check = function() {
      if (document.getElementById('passwords').value ==
        document.getElementById('confirm_password').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Password dan Konfirmasi Sama';
      } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Password dan Konfirmasi Tidak Sama';
      }
    }
  </script>
</body>

</html>