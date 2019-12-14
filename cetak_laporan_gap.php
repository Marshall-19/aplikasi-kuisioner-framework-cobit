<?php
require_once "lib/helper.php";
require_once "models/Gap.php";
$gap = new Gap();
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
            <div class="col-xs-12">
              <div class="sale-statistic-inner notika-shadow mg-tb-30">
                <div class="curved-inner-pro">
                  <div class="curved-ctn">
                    <div class="bsc-tbl-st">
                    <!-- BAGIAN ISI KONTEN -->
                  <a href="cetak_laporan_gap.php" class="btn btn-primary btn-sm">Cetak</a>
                  <table style="width: 100%;"  class="table table-bordered table-stripped">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Domain Id</th>
                        <th>Gap</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                      // ambil data pertanyaan
                      $data_gap = $gap->ambilData();
                      // menampilkan data
                      foreach($data_gap as $no => $im)
                      {
                    ?>
                    
                      <tr>
                        <td><?=$no+1?></td>
                        <td><?=$im['domain_nama']?></td>
                        <td><?=$im['gap']?></td>
                        <td><?=$im['harapan']?></td>
                      </tr>
                    
                  <?php
                      }
                  ?>
                  </tbody>
                  </table>
                  <!-- EOF BAGIAN ISI KONTEN -->
                  </div>
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

