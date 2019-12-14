<?php
require_once "lib/helper.php";
require_once "models/IndeksMaturity.php";
$indeks_maturity = new IndeksMaturity();
?>
<!doctype html>
<html class="no-js" lang="">

<head>
  <title>Laporan Indeks Maturity</title>
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
                      <h2>Laporan Indeks Maturity</h2>
                      <div class="bsc-tbl-st">
                        <table style="width: 100%;"  class="table table-bordered table-stripped">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Domain Id</th>
                              <th>Total Pernyataan</th>
                              <th>Total Responden</th>
                              <th>Total Nilai</th>
                              <th>Indeks Maturity</th>
                              <th>Keterangan</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php
                            // ambil data pernyataan
                            $data_indeks_maturity = $indeks_maturity->ambilData();
                            // menampilkan data
                            foreach($data_indeks_maturity as $no => $im)
                            {
                          ?>
                          
                            <tr>
                              <td><?=$no+1?></td>
                              <td><?=$im['domain_nama']?></td>
                              <td><?=$im['pernyataan_total']?></td>
                              <td><?=$im['responden_total']?></td>
                              <td><?=$im['nilai_total']?></td>
                              <td><?=$im['indeks_maturity']?></td>
                              <td><?=$im['keterangan']?></td>
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

