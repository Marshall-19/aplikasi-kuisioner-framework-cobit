<?php
session_start();
require_once "lib/helper.php";
require_once "models/Pengguna.php";
$pengguna = new Pengguna();

$hasil = 0;
if($_SERVER['REQUEST_METHOD'] == "POST")
{
  $username = $_POST['pengguna_username'];
  $password = $_POST['pengguna_password'];
  $data_pengguna = $pengguna->ambilDataDenganKondisi([
    "pengguna_username" => $username,
    "pengguna_password" => $password
  ]);
  
  if(count($data_pengguna) == 1)
  {
    $_SESSION = $data_pengguna[0];
    header("Location: beranda.php");
  }
  else
  {
    $hasil = 1;
  }
}
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <title>Login</title>
  <?php includeTemplate("head.php"); ?>
  <style>
    .container {
      padding-right: 0;
      padding-left: 0;
    }
  </style>
</head>

<body>
<?php
  if($hasil == 1)
  {
    echo "<script>alert('Username atau password salah!')</script>";
  }
?>
<div class="login-content">
    <!-- Login -->
    
    <div class="nk-block toggled" id="l-login">
        <div class="nk-form">
          <form method="POST">
            <div class="input-group">
                <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                <div class="nk-int-st">
                    <input type="text" name="pengguna_username" class="form-control" placeholder="Username">
                </div>
            </div>
            <div class="input-group mg-t-15">
                <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                <div class="nk-int-st">
                    <input type="password" name="pengguna_password" class="form-control" placeholder="Password">
                </div>
            </div>
            <button type="submit" id="btn_login" style="display: none;"></button>
            <button type="button" onclick="document.getElementById('btn_login').click()" class="btn btn-login btn-success btn-float"><i class="notika-icon notika-right-arrow right-arrow-ant"></i></button>
          </form>
        </div>
    </div>
    
</div>

    <?php includeTemplate("script.php"); ?>
    
</body>

</html>
