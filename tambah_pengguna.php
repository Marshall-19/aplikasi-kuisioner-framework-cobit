<?php
session_start();
require_once "lib/helper.php";
cekLogin();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <?php includeTemplate("head.php"); ?>
  <style>
    .container {
      padding-right: 0;
      padding-left: 0;
    }
  </style>
</head>

<body>
    
    <?php includeTemplate("header.php"); ?>
    <?php includeTemplate("menu.php"); ?>
    
    <!-- KONTEN AREA-->
    <div class="container">
        <div class="row">
            <?php includeTemplate("sidebar.php"); ?>
            <div class="col-sm-9 col-xs-12">
              <div class="sale-statistic-inner">
                <div class="curved-inner-pro">
                  <div class="curved-ctn">
                    <!-- BAGIAN ISI KONTEN -->
                    <h2>Tambah Pengguna</h2>
                  <form action="proses_tambah_pengguna.php" method="POST">
                    <div class="form-group">
                      <label>Username</label>
                      <input type="text" name="pengguna_username" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="pengguna_password" class="form-control" />
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="pengguna_email" class="form-control" />
                    </div>
                    <div class="form-group">
                      <button type="submit" class="btn btn-primary">Simpan</button>
                      <button type="button" class="btn btn-success" onclick="window.history.back();">Kembali</button>
                    </div>
                  </form>
                  <!-- EOF BAGIAN ISI KONTEN -->
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
    <!-- END KONTEN AREA-->
    
    <?php includeTemplate("footer.php"); ?>
    <?php includeTemplate("script.php"); ?>
</body>

</html>

