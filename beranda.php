<?php
  require_once "lib/helper.php";
  require_once "models/IndeksMaturity.php";
  $domain = new IndeksMaturity();
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
                    <h1 class="text-center">Selamat Datang!</h1>
                  <!-- EOF BAGIAN ISI KONTEN -->
                  </div>
                </div>
              </div>
            </div>
            
        </div>
    </div>
    <!-- END KONTEN AREA-->

</html>

