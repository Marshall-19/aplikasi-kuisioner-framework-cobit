<?php
require_once "lib/helper.php";
require_once "models/Gap.php";
$gap = new Gap();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <title>Laporan GAP</title>
  <?php includeTemplate("head.php"); ?>
  <style>
    .container {
      padding-right: 0;
      padding-left: 0;
    }
  </style>
</head>

<body>
    <!-- KONTEN AREA-->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                    <!-- BAGIAN ISI KONTEN -->
                    <div class="normal-table-list">
                      <h2>Laporan GAP</h2>
                      <div class="bsc-tbl-st">
                        <table style="width: 100%;"  class="table table-bordered table-stripped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Domain Id</th>
                              <th>Gap</th>
                              <th>Harapan</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            // ambil data pernyataan
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
                    </div>
                  </div>
                  <!-- EOF BAGIAN ISI KONTEN -->
            </div>
            
        </div>
    </div>
    <!-- END KONTEN AREA-->
    <?php includeTemplate("script.php"); ?>
    <script>
      window.print();
    </script>
</body>

</html>

